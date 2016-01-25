<!DOCTYPE html>
<html lang="en">
	<head>

	  <meta charset="utf-8">
	  <title>Questr | Confirmation</title>
	  <meta name="description" content="">
	  <meta name="author" content="">

	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

	  <link rel="stylesheet" href="../res/normalize.css">
	  <link rel="stylesheet" href="../res/skeleton.css">
	  <link rel="stylesheet" href="../res/hover.css">
	  <link rel="stylesheet" href="../res/private.css">

	</head>
	<body>

		<?php

			require('Services/Twilio.php');

	      	$servername = "localhost";
			$s_username = "root";
			$s_password = "658860";
			$db_name = "questr";

			$conn = new mysqli($servername, $s_username, $s_password, $db_name);

			if($conn->connect_error){
				die("Connection failed: " . $conn->connect_error);
			}

			$theid = $_POST['idinput'];

			$sql = "UPDATE jobs SET status=1 WHERE id=$theid";
			$return = $conn->query($sql);
			if(!$return){
				die("Could not get data: " . mysql_error());
			}

			$sql = "SELECT * FROM jobs WHERE id=$theid LIMIT 1";
			$return = $conn->query($sql);
			if(!$return){
				die("Could not get data: " . mysql_error());
			} else {
				$row = $return->fetch_assoc();
				$AccountSid = 'removed'; 
			    $AuthToken = 'removed'; 
			 
			    $client = new Services_Twilio($AccountSid, $AuthToken);

			    $poster_number = $row['number'];
			    $helper_number = $_POST['numberinput'];
			    if(substr($helper_number, 0, 2) === "+1"){
					$helper_number = $helper_number;	
				} else if (preg_match("[\d{10}]", $helper_number, $matches)){
					$helper_number = "+1" . $helper_number;
				} else {
					die("Faulty Number : " . $helper_number);
				}

			     try {
			            $client->account->messages->create(
			                [
			                    'From' => "+12048179140",
			                    'To' => $poster_number,
			                    'Body' => "Hey {$row['name']}, {$_POST['nameinput']} has volunteered for your posting! Get in touch with him at $helper_number!"
			                ]
			            );
			            $client->account->messages->create(
			            	[
			            		'From' => "+12048179140",
			            		'To' => $helper_number,
			            		'Body' => "Hey {$_POST['nameinput']}, {$row['name']} has been notified of your decision. Get in touch with him before he gets in touch with you at $poster_number!"  
			            	]
			            	);
			        }
			        catch(Services_Twilio_RestException $e) {
			            echo "$e";
			        }

			}

	    ?>

	  <div class="container index-font">

	  <div class="row">

	  	 <div class="container index-font">
	    <div class="row">
	      <div class="two-thirds column" style="margin-top: 25%">
	        <h1>Success!</h1>
	        <h5><?php echo $_POST['nameinput']?>, the job owner has been notified of your acceptance. Thanks again.</h5>
	      	<h6>You will be redirected to homepage soon. Click <a href="../index.html">here</a> if you are not redirected.</h6>
	      </div>

	      <?php

	      	header("Refresh:7;url=../index.html");

	      ?>

	    </div>
	  	
			    </div>
			  </div>
		</div>

	</body>
</html>
