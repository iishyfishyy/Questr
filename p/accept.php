<!DOCTYPE html>
<html lang="en">
	<head>

	  <meta charset="utf-8">
	  <title>Questr | Job Accept</title>
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

	  <div class="container index-font">

	  <div class="row">

	  	 <div class="container index-font">
	    <div class="row">
	      <div class="two-thirds column" style="margin-top: 25%">
	        <h1>Thank you!</h1>
	        <h5>You are THIS close to finishing! Just enter your name and phone number so we can notify the job poster!</h5>
	      </div>

	      <?php
	      	$theid = $_GET['id'];
	      ?>

	    </div>
	    <div class="row">
	    	<form action="confirmsend.php" method="post">
	    			<div class="one-half column">
			    		<label for="nameinput">Name</label>
						<input class="u-full-width interior-font" placeholder="Mary Jane" name="nameinput" id="nameinput" type="text">
			    	</div>
			    	<div class="one-half column">
			    		<label for="numberinput">Phone Number</label>
						<input class="u-full-width interior-font" placeholder="ex. 1234567890 or +11234567890" name="numberinput" id="numberinput" type="tel">
			    	</div>
			    	<input class="u-full-width interior-font" name="idinput" <?php echo "value=\"$theid\""?> id="idinput" type="hidden">
			    	<input class="button-primary interior-font" value="Submit" type="submit">
	    	</form>
	    </div>
	  </div>
	  	
	    </div>
	  </div>


	</body>
</html>