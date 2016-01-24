<!DOCTYPE html>
<html lang="en">
	<head>

	  <meta charset="utf-8">
	  <title>Questr | Hire</title>
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
		  	<div class="two-thirds column" style="margin-top: 2%">
		  		<h3>Post a quest!</h3>
		  	</div>
	  	</div>

	    <div class="row">
	    	<div class="two-thirds column" style="margin-top: 0%">
	    		<form method="post" action="cjb/addinfo.php">
					  <div class="row">
					  	<div class="six columns">
					      <label for="nameinput">Name</label>
					      <input class="u-full-width interior-font" placeholder="John Doe" name="nameinput" id="nameinput" type="text">
					    </div>

					    <div class="six columns">
					      <label for="caregoryinput">Select Category</label>
					      <select class="u-full-width interior-font" name="categoryinput" id="categoryinput">
					        <option value="technical">Technical</option>
					        <option value="business">Business</option>
					        <option value="art">Art</option>
					        <option value="home">Home</option>
					        <option value="hobby">Hobby</option>
					        <option value="music">Music</option>
					        <option value="sports">Sports</option>
					        <option value="learning">Learning</option>
					        <option value="fun">Fun</option>
					        <option value="fashion">Fashion</option>
					        <option value="emergency">Emergency</option>
					      </select>
					    </div>
					  </div>

					 <div class="row">
						<div class="six columns">
					  		<label for="numberinput">Phone Number</label>
					  		<input class="u-full-width interior-font" placeholder="ex. 1234567890 or +11234567890" name="numberinput" id="numberinput" type="tel">
					  	</div>

						<div class="six columns">
					  		<label for="emailinput">E-mail</label>
					  		<input class="u-full-width interior-font" placeholder="something@somethingelse.com" name="emailinput" id="emailinput" type="email">
					  	</div>
					</div>				  
					  
					<div class="row">
					  	<div class="twelve columns">
					  		<label for="titleinput">Job Title</label>
					  		<input class="u-full-width interior-font" placeholder="Give your job a title here." id="titleinput" name="titleinput" type="text">
				  		</div>

						<label for="descriptioninput">Description</label>
						<textarea class="u-full-width interior-font" placeholder="Describe your job here." name="descriptioninput" id="descriptioninput" style="height: 175px"></textarea>

						  <div class="row">

						  <div class="six columns">
					  		<label for="paymentinput">Payment</label>
					  		<input class="u-full-width interior-font" placeholder="'Free' or a number" id="paymentinput" name="paymentinput" type="text">
					      </select>
				  			</div>
				  			<div class="six columns">
					  		<label for="locationinput">Location</label>
					  		<input class="u-full-width interior-font" placeholder="Etobicoke, ON" id="locationinput" name="locationinput" type="text">
					      </select>
				  			</div>

						  </div>

						  <input class="button-primary interior-font" value="Submit" type="submit">
					

					</div>
				</form>

	    	</div>

	    </div>
	  </div>


	</body>
</html>