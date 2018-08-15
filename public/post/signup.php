<?php
/**
 * Test-Script for nueww
 *
 * @author     Ronny Donnerhak
 * @version    2018-14-08-11-30
 */

function createFrontendLink($eventId, $participantId, $participantHash, $languageId) {
    $link  = "/tms/frontend/index.cfm";
    $link .= "?l=" . $eventId;
    $link .= "&amp;id=" . $participantId;
    $link .= "&amp;sp_id=" . $languageId;
    $link .= "&amp;dat_h=" . $participantHash;

    return $link;
}

// 3 = zugesagt dhg / 4 = zugesagt / 9 = warteliste / 11 = nachnominiert
define("STATUS_ZUGESAGT", array(3, 4, 9, 11));

$frmEmail = isset($_POST["email"]) ? $_POST["email"] : "ft@u2d.de";
$frmEvent = isset($_POST["event"]) ? $_POST["event"] : "";

$username = "nueww_interface";
$password = "E24C45166E503DDE23169435BEBB3B4C";
//$apiUrl = "https://nueww-10-0.test.ventari.de"; //"https://events.nueww.de";
$apiUrl = "https://events.nueww.de";

$personalizedLink = "";
$personId = 0;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>NUEWW-TEST</title>

        <style type="text/css">
            html { font-family: 'Arial'; font-size: 12px; }
            label { display: inline-block; width: 100px; }

            .formField { margin: 2px; }
            .info { color: #FF0000; }
        </style>
    </head>

    <body>
        <h1>NUEWW - TEST - SZENARIO</h1>

        <h2>Test-Cases</h2>
        <ul>
            <li>Teilnehmer existiert noch garnicht im System</li>
            <li>Teilnehmer existiert nur in anderen Events</li>
            <li>Teilnehmer existiert in aktuellem Event mit Status ungleich zugesagt</li>
            <li>Teilnehmer existiert in aktuellem Event mit Status zugesagt</li>
        </ul>

        <h2>Test-Mask</h2>
        <strong>
            1. Teilnehmer kommt unbekannt auf die nueww.de Seite. Beim Klick auf Anmelden zu irgendeiner VA	bekommt<br>
            er von der Website (nueww.de) ein Formular vorgeblendet auf dem nur die Emailadresse abgefragt wird.<br><br>

            API-URL <span class="info"><?php echo $apiUrl; ?></span><br><br>
        </strong>

        <form method="post">
            <div class="formField">
                <label for="email">E-Mail:</label>
                <input type="text" id="email" name="email" value="<?php echo $frmEmail; ?>">
            </div>

            <div class="formField">
                <label for="event">Event:</label>
                <input type="text" id="event" name="event" value="<?php echo $frmEvent; ?>">
            </div>

            <input type="submit"><br><br>
        </form>

        <?php
        if (strlen($frmEmail) && strlen($frmEvent)) {
            $apiUrl_2 = $apiUrl . "/rest/participants/?filterEventId=" . $frmEvent . "&filterFields={\"pa_email\":\"" . $frmEmail . "\"}";

            printf("
				<strong>
					2. Über die Teilnehmerschnittstelle wird geprüft, ob es bereits einen Datensatz für diese<br>
					Emailadresse in dieser VA gibt.<br><br>
					&gt;&gt; GET <span class=\"info\">%s</span><br><br>
				</strong>
			", $apiUrl_2);


            $process = curl_init($apiUrl_2);

            curl_setopt($process, CURLOPT_USERPWD, $username . ":" . $password);
            curl_setopt($process, CURLOPT_TIMEOUT, 30);
            curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($process, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($process);
            $json = json_decode($result);
            $responseData_2 = $json->responseData;

            echo "<pre>";
            print_r(curl_getinfo($process));
            print_r($responseData_2);
            echo "</pre>";
            echo 'Curl error: ' . curl_error($process) . "<br><br>";

            curl_close($process);


            // more than one participant with the same email in the same event
            if (isset($responseData_2->resultCount) && $responseData_2->resultCount > 1) {
                printf("<strong>ERROR: more than one participant with email %s in evnet %d</strong>", $frmEmail, $frmEvent);

                // only one participant exists
            } else if (isset($responseData_2->resultCount) && $responseData_2->resultCount == 1) {
                $participantData = $responseData_2->participants[0];
                $personalizedLink = createFrontendLink($frmEvent, $participantData->id, $participantData->hash, $participantData->languageId);

                // participant is in status promised
                if (in_array($participantData->status, STATUS_ZUGESAGT)) {
                    // use personalized Link to change data
                } else {
                    printf("
						<strong>
							5. nueww.de sendet nun eine standardisierte Email mit dem personalisierten Link für diese<br>
							Veranstaltung an die  bekannte Emailadresse. Beim Klick auf den Link geht die Anmeldeseite<br>
							für das entsprechende Event auf und der TN kann seine Daten vervollständigen und sich anmelden.<br>
							Auf diese Weise haben wir auch das Double-Opt-In erschlagen.<br><br>
						</strong>
					");
                }

                printf("
					<strong>
						&gt;&gt; Personalisierter Link <a href=\"%1\$s\" target=\"_blank\"><span class=\"info\">%1\$s</span></a><br><br>
					</strong>
				", $apiUrl . $personalizedLink);
            } else {
                $apiUrl_3 = $apiUrl . "/rest/participants/?filterActiveEvents=1&filterFields={\"pa_email\":\"" . $frmEmail . "\"}";
                $apiUrl_4 = $apiUrl . "/rest/participants/";

                printf("
					<strong>
						3. Über die Teilnehmerschnittstelle wird geprüft, ob über alle Events schon ein Teilnehmer<br>
						mit dieser Email vorhanden ist<br><br>
						&gt;&gt; GET <span class=\"info\">%s</span><br><br>
					</strong>
				", $apiUrl_3);


                $process = curl_init($apiUrl_3);

                curl_setopt($process, CURLOPT_USERPWD, $username . ":" . $password);
                curl_setopt($process, CURLOPT_TIMEOUT, 30);
                curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($process, CURLOPT_RETURNTRANSFER, true);

                $result = curl_exec($process);
                $json = json_decode($result);
                $responseData_3 = $json->responseData;

                echo "<pre>";
                print_r(curl_getinfo($process));
                print_r($responseData_3);
                echo "</pre>";
                echo 'Curl error: ' . curl_error($process) . "<br><br>";

                curl_close($process);


                if (isset($responseData_3->resultCount) && $responseData_3->resultCount > 0) {
                    $participantData = $responseData_3->participants;

                    // get the first personId
                    for ($i = 0; $i < count($participantData); ++$i) {
                        if (is_numeric($participantData[$i]->personId)) {
                            $personId = $participantData[$i]->personId;
                            break;
                        }
                    }
                } else {
                    // do nothing
                }

                printf("
					<strong>
						4. Jetzt kann über die Teilnehmerschnittstelle ein neuer Teilnehmer für die gewählte<br>
						Veranstaltung angelegt werden, hierbei wird auch die Personen-ID übergeben, falls vorhanden.<br>
						Nach dem Anlegen eines Teilnehmers wird der personalisierte Link an nueww.de zurückgeliefert.<br><br>
						&gt;&gt; POST <span class=\"info\">%s</span><br><br>
						&gt;&gt; PersonId <span class=\"info\">%d</span><br><br>
					</strong>
				", $apiUrl_4, $personId);


                $data = array(
                    "eventId" => $frmEvent,
                    "fields" => array(
                        "pa_email" => $frmEmail
                    )
                );

                if ($personId > 0) {
                    $data["personId"] = $personId;
                }

                $requestData = json_encode($data);

                echo "<pre>";
                print_r($data);
                print_r($requestData);
                echo "</pre>";


                $process = curl_init($apiUrl_4);

                curl_setopt($process, CURLOPT_USERPWD, $username . ":" . $password);
                curl_setopt($process, CURLOPT_POST, 1);
                curl_setopt($process, CURLOPT_POSTFIELDS, $requestData);
                curl_setopt($process, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                curl_setopt($process, CURLOPT_TIMEOUT, 30);
                curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($process, CURLOPT_RETURNTRANSFER, true);

                $result = curl_exec($process);
                $json = json_decode($result);
                $responseData_4 = $json->responseData;

                echo "<pre>";
                print_r(curl_getinfo($process));
                print_r($responseData_4);
                echo "</pre>";
                echo 'Curl error: ' . curl_error($process) . "<br><br>";

                curl_close($process);

                $participantData = $responseData_4->participants[0];
                $personalizedLink = createFrontendLink($frmEvent, $participantData->id, $participantData->hash, $participantData->languageId);

                printf("
					<strong>
						&gt;&gt; Personalisierter Link <a href=\"%1\$s\" target=\"_blank\"><span class=\"info\">%1\$s</span></a><br><br>
					</strong>
				", $apiUrl . $personalizedLink);
            }
        }
        ?>
    </body>
</html>
