<?php
/**
 * get_key.php
 *
 * I/O Wraps PHP Client Library Sample App for Whit.li API 
 *
 * PHP version 5
 * 
 * @category Examples
 * @package  Mashery_IO_Wraps_Whitli
 * @author   Neil Mansilla <neil@mashery.com>
 * @license  https://raw.github.com/mashery/io-wraps-whitli-php/master/LICENSE.txt MIT License
 * @version  GIT: $Id:$
 * @link     https://github.com/mashery/io-wraps-whitli-php/
 * 
 */

// Client library (network/authentication)
require_once "../google-api-php-client/src/apiClient.php";

// USA TODAY resource/method library
require_once "../google-api-php-client/src/contrib/apiWhitliapiService.php";

// Instantiate client
$client = new apiClient();

// Set credentials
$client->setDeveloperKey("YOUR_KEY_HERE");

// Instantiate service
$service = new apiWhitliapiService($client);

// Initialize keyResponse variable
$keyResponse = new KeyResponse;

// Fetch form vars
$uid = $_GET['uid'];
$key_id = $_GET['key_id'];

// Check for request params uid and key_id
if ($uid && $key_id) {
    $optParams = array(
        'schema' => $_GET['schema'],
        'format' => $_GET['format']
    );
    
    // Make the API call with the required parameters
    $keyResponse = $service->KeyMethods->Get(
        $key_id,
        $uid
    );
}
?>

<!doctype html>
<html>
    <head>
        <title>Whit.li API - Get Key Example App</title>
        <link rel="stylesheet" 
            href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" />
    </head>
    <body>
        <div class="container" id="mainwrap">
            <header>
                <h1>Whit.li API - Get Key Example App</h1>
            </header>

            <div class="request">
                <form id="key" method="GET" action="./get_key.php" class="well">
                    <div>
                        <label>uid:</label>
                        <input type="text" id="uid" name="uid" value="1" 
                            placeholder="required" />
                    </div>
                    <div>
                        <label>keyid:</label>
                        <input type="text" id="key_id" name="key_id" value="1" />
                    </div>
                    <div>
                        <label>schema:</label>
                        <select name="schema" id="schema">
                            <option value="fb">fb</option>
                            <option value="generic" 
                                selected="selected">generic</option>
                        </select>
                    </div>
                    <div>
                        <label>format:</label>
                        <select name="format" id="format">
                            <option value="json" selected="selected">json</option>
                        </select>
                    </div>
                    <div>
                        <label></label>
                        <input type="submit" value="Get Whit.li Key">
                    </div>

                </form>

<?php
if ($key_id) {
    // Send output to the browser
    echo("<hr />Results:<br /><br />");
    echo('<code>$keyResponse->getStatus()</code> yields <b>' . 
        $keyResponse->getStatus() . '</b><br />');
    echo('<code>$keyResponse->getMessage()</code> yields <b>'. 
        $keyResponse->getMessage() . '</b><br />');
    echo('<code>$keyResponse->getBody()->getKey()</code> yields <b>' . 
        $keyResponse->getBody()->getKey() . '</b><br />');
    echo('<code>$keyResponse->getTimestamp()</code> yields <b>' . 
        $keyResponse->getTimestamp() . '</b><br />');
}
?>
            </div>
        </div>
    </body>
</html>

