<?php session_start();

// Client library (network/authentication)
require_once './_apiClient.php';

// Whitli resource/method library
 require_once './contrib/apiWhitliapiService.php';

// Instantiate client
$client = new apiClient();

// Set credentials
$client->setDeveloperKey("YOUR_KEY_HERE");

// Instantiate service
$service = new apiWhitliapiService($client);

// Initialize keyResponse variable
$keyResponse = new KeyResponse;

// Check for request params uid and key_id
if (isset($_GET['uid']) && (isset($_GET['key_id']))) {
	$uid = $_GET['uid'];
	$key_id = $_GET['key_id'];
	$optParams = array('schema' => $_GET['schema'],'format' => $_GET['format']);
	
	// Make the API call with the required parameters
	$keyResponse = $service->Key->Get($key_id, $uid);
}
?>

<!doctype html>
<html>
	<head>
		<title>Whit.li API - Mashery I/O Wraps Example</title>
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css" media="screen" />
	</head>
	<body>
		<div class="container" id="mainwrap">
			<header>
				<h1>Whit.li API - Mashery I/O Wraps Example</h1>
			</header>

			<div class="request">
				<form id="key" method="GET" action="whitli.php" class="well">
					<div>
						<label>uid:</label>
						<input type="text" id="uid" name="uid" value="1" placeholder="required" />
					</div>
					<div>
						<label>keyid:</label>
						<input type="text" id="key_id" name="key_id" value="1" />
					</div>
					<div>
						<label>schema:</label>
						<select name="schema" id="schema">
							<option value="fb">fb</option>
							<option value="generic" selected="selected">generic</option>
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

				<?php if (isset($_GET['key_id'])):
				?>
				<hr />
				
				<?php
					// Send output to the browser
					echo("We have made a successful API call to Whit.li:<br /><br />");
					echo('<code>$keyResponse->getStatus()</code> yields <b>' . $keyResponse->getStatus() . '</b><br />');
					echo('<code>$keyResponse->getMessage()</code> yields <b>'. $keyResponse->getMessage() . '</b><br />');
					echo('<code>$keyResponse->getBody()->getKey()</code> yields <b>' .$keyResponse->getBody()->getKey() . '</b><br />');
					echo('<code>$keyResponse->getTimestamp()</code> yields <b>'. $keyResponse->getTimestamp() . '</b><br />');
				?>
				<?php endif
				?>
			</div>
		</div>
	</body>
</html>

