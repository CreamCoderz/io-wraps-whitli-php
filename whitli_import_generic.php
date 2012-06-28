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
	$importResponse = $service->UserMethods->ImportGeneric($_GET['requestBody']);
	
}
?>

<!doctype html>
<html>
	<head>
		<title>Whit.li API - Mashery I/O Wraps (Beta) Example</title>
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css" media="screen" />
	</head>
	<body>
		<div class="container" id="mainwrap">
			<header>
				<h1>Whit.li API - Mashery I/O Wraps (Beta) Example</h1>
			</header>

			<div class="request">
				<form id="import" method="GET" action="whitli_import_generic.php" class="well">
					<div>
						<label>JSON request object</label>
						<textarea id="requestBody" name="requestBody" width="300" height="30">{
  "schema":"generic",
  "uid":"1",
  "profile_data":{
    "first_name":"John",
    "last_name":"Whitli",
    "hometown_location":"Austin, Tx",
    "work_history":[
      {
        "location":{
          "city":"Austin",
          "state":"Texas"
        },
        "company_name":"Whit.li- Explore Minds Like Yours",
        "position":"Emperor",
        "description":"",
        "start_date":"2011-04"
      }
    ]
  },
  "posts":[
    {
      "id":"152543539_10150215025383600",
      "message":"this is a post",
      "created_time":"2011-12-09T15:46:23+0000"
    },
    {
      "id":"152543539_10150107473533600",
      "message":"this is a post",
      "created_time":"2011-12-08T15:46:23+0000"
    }
  ],
  "likes":[
    {
      "name":"The Black Keys",
      "id":"8746730308",
      "category":"Musician/band",
      "created_time":"2010-05-07T16:35:29+0000"
    },
    {
      "name":"Austin, Texas",
      "id":"4034730278",
      "category":"Community",
      "created_time":"2010-05-06T16:35:29+0000"
    },
    {
      "name":"Michio Kaku",
      "id":"111722405511675",
      "category":"Author",
      "created_time":"2010-05-07T16:35:29+0000"
    }
  ]
}</textarea>
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

