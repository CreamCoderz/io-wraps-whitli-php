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
$importResponse = new ImportResponse;

// Check for request params uid and key_id
if (isset($_GET['requestBody'])) {
	
	// Make the API call with the required parameters
	$importResponse = $service->User->ImportGeneric($_GET['requestBody']);
	
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
				<form id="import" method="GET" action="whitli_import_generic.php" class="well">
					<div>
						<label>JSON request object</label>
						<textarea id="requestBody" name="requestBody" width="300" height="30"></textarea>
					</div>
					<div>
						<label></label>
						<input type="submit" value="Import Generic Profile">
					</div>

				</form>

				<?php if (isset($_GET['requestBody'])):
				?>
				<hr />
				
				<?php
					// Send output to the browser
					echo("We have made a successful API call to Whit.li:<br /><br />");					
					echo('<code>$importResponse->getStatus()</code> yields <b>' . $importResponse->getStatus() . '</b><br />');
					echo('<code>$importResponse->getMessage()</code> yields <b>'. $importResponse->getMessage() . '</b><br />');
					echo('<code>$importResponse->getBody()->getLikesCount()</code> yields <b>' . $importResponse->getBody()->getLikesCount() . '</b><br />');
					echo('<code>$importResponse->getBody()->userFields()</code> yields <b>' . $importResponse->getBody()->getUserFields() . '</b><br />');
					echo('<code>$importResponse->getBody()->postsCount()</code> yields <b>' . $importResponse->getBody()->getPostsCount() . '</b><br />');
					echo('<code>$importResponse->getTimestamp()</code> yields <b>'. $importResponse->getTimestamp() . '</b><br />');
				?>
				<?php endif
				?>
			</div>
		</div>
	</body>
</html>

