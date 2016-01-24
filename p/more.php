	<?php
		$post_id = $_GET['id'];

		$servername = "localhost";
		$s_username = "root";
		$s_password = "658860";
		$db_name = "questr";
				
		$conn  = new mysqli($servername, $s_username, $s_password, $db_name);
				
		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM jobs WHERE id=$post_id LIMIT 1";
		$return = $conn->query($sql);
		
		if($return){
			$row = $return->fetch_assoc();
			
			?>

			<div class="container">
			    <div class="row" style="margin-top: 5%">
			      <div class="two-thirds columns">
			        <h1 class="interior-font"><?php echo $row['title']; ?></h1>
			    </div>
			    <div class="row">
			      <div class="u-full-width column">
			      	<h5 class="interior-font">Description</h5>
			        <h6 class="layover-font"><?php echo $row['description']; ?></h6>
			      </div>
			    </div>
			    <div class="row">
			      <div class="u-full-width column">
			      	<h5 class="interior-font">Contact E-mail</h5>
			        <h6 class="layover-font"><pre><?php echo $row['email']; ?></pre></h6>
			      </div>
			    </div>
			    <div class="row">
			    	<div class="u-full-width column">
				       	<a <?php echo "href=\"accept.php?id=$post_id\""; ?>><button class="button hvr-fade layover-button u-pull-left">Accept</button></a>
				       	<a href="work.php"><button class="button hvr-fade layover-button u-pull-right">Decline</button></a>
		      		</div>
			    </div>
		  </div>

			<?php

		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	?>