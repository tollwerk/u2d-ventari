<?php
//Require once the Composer Autoload
if (file_exists(__DIR__.'/vendor/autoload.php')) {
    require_once __DIR__.'/vendor/autoload.php';
}
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <body>
        <div class="content">
            <?php
            if (isset($_GET['function'])) {
                $function = $_GET['function'];
                $params   = $_GET;
                unset($params['function']);

                $App    = new Tollwerk\Ventari\Ports\Client();
                $Events = $App->makeRequest($function, $params);

                foreach ($Events as $event) {
                    echo '<h1>'.$event->getEventName().'</h1>';
                    echo '<blockquote>';
                    echo '<p>Event Date: '.$event->getEventStartDate()->format('d/m/Y').'</p>';
                    echo '<p>Event Id: '.$event->getEventFrontendLink().'</p>';
                    echo '<p>Event Id: '.$event->getId().'</p>';
                    echo '</blockquote>';
                }
            } else { ?>
                <div class="launch">
                    <a href="app.php?function=events&param=1080">Run it!</a>
                </div>
            <?php } ?>
        </div>
    </body>
</html>