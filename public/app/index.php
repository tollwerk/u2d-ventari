<?php

/**
 * u2d-ventari
 *
 * @author     Philip Saa <philip@tollwerk.de> / @cowglow
 * @copyright  Copyright © 2019 Philip Saa <philip@tollwerk.de> / @cowglow
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

/***********************************************************************************
 *  The MIT License (MIT)
 *
 *  Copyright © 2019 Philip Saa <philip@tollwerk.de>
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy of
 *  this software and associated documentation files (the "Software"), to deal in
 *  the Software without restriction, including without limitation the rights to
 *  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 *  the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 *  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 ***********************************************************************************/

//Require once the Composer Autoload
if (file_exists(dirname(__DIR__, 2).'/vendor/autoload.php')) {
    require_once dirname(__DIR__, 2).'/vendor/autoload.php';
}
//Load the .env file into application
\Dotenv\Dotenv::create(dirname(__DIR__, 2))->load();
?>

<?php include 'assets/partials/header.php'; ?>
<?php include 'assets/partials/navigation.php'; ?>

    <div class="content">
        <?php
        $methodFile = 'includes/'.strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $_GET['method'])).'.php';

        if (file_exists($methodFile)) {
            $App = new Tollwerk\Ventari\Ports\Client();
            require $methodFile;
        } else {
            echo 'File does not exists: '.$methodFile;
        }
        ?>
    </div>

<?php include 'assets/partials/footer.php'; ?>