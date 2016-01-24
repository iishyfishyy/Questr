<!DOCTYPE html>
<html lang="en">
	<head>

	  <meta charset="utf-8">
	  <title>Questr | Work</title>
	  <meta name="description" content="">
	  <meta name="author" content="">

	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

	  <link rel="stylesheet" href="../res/normalize.css">
	  <link rel="stylesheet" href="../res/skeleton.css">
	  <link rel="stylesheet" href="../res/hover.css">
	  <link rel="stylesheet" href="../res/private.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	</head>
	<body>

		<div id="_open">
		</div>

	  <div class="container index-font">
	   		<div class="row">
	   			<div class="two-thirds column" style="margin-top:5%">
	   				<h3>Quest Postings</h3>
	   				<h6>Feel free to sort or search jobs.</h6>
	   			</div>
	   		</div>
	  </div>

		<div class="container index-font">
			<div class="row" id="dispinf">
				<?php

						$servername = "localhost";
						$s_username = "root";
						$s_password = "658860";
						$db_name = "questr";

						$conn = new mysqli($servername, $s_username, $s_password, $db_name);

						if($conn->connect_error){
							die("Connection failed: " . $conn->connect_error);
						}

						switch($_GET['dir']){
							case "asccont": $orderby = " ORDER BY category ASC"; break;
							case "status": $orderby = " ORDER BY status ASC"; break;
							case "pmnt": $orderby = " ORDER BY payment ASC"; break;
							default: $orderby = "";
						}

						$sql = "SELECT * FROM jobs" . $orderby;
						

						$return = $conn->query($sql);

						if(!$return){
							die("Could not get data: " . mysql_error());
						}

						if($return->num_rows > 0){
							echo "$return->numrows";
							echo "<table class=\"u-full-width\">
										  <thead>
										    <tr>
										      <th>Title</th>
										      <th><a class\"a-noeffects\" href=\"work.php?dir=asccont\">Category</a></th>
										      <th><a class\"a-noeffects\" href=\"work.php?dir=pmnt\">Payment</a></th>
										      <th>Location</th>
										      <th><a class\"a-noeffects\" href=\"work.php?dir=status\">Status</a></th>
										    </tr>
										  </thead>
										  <tbody>";

							while($row = $return->fetch_assoc()){	
								$status = ($row['status'] == 0 ? "Available" : "Taken");
								$pay = ($row['payment'] == "Free" ? "UNPAID" : "\${$row['payment']}");
								echo "<tr class=\"tr-rowlink c_{$row['id']}_open\" id=\"{$row['id']}\">
										      <td>{$row['title']}</td>
										      <td>{$row['category']}</td>
										      <td>{$pay}</td>
										      <td>{$row['location']}</td>
										      <td>{$status}</td>
										    </tr>";
										    /*<div class=\"container limit\">
										      <div id=\"expand_{$row['id']}\"></div>
										      </div>*/
							}

							echo "</tbody>
								</table>";

						} 

							$conn->close();
					?>
			</div>
	 	 </div>	

	 	 <script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.10/jquery.popupoverlay.js"></script>
			<script> 
                function show(id) { 
                    if(document.getElementById(id).style.display=='none') { 
                        document.getElementById(id).style.display='block'; 
                    } 
                    return false;
                } 
                function hide(id) { 
                    if(document.getElementById(id).style.display=='block') { 
                        document.getElementById(id).style.display='none'; 
                    } 
                    return false;
                }   
            </script> 

            <script type="text/javascript">
			  	 $(document).ready(function(){
			  	 	$('.tr-rowlink').on('click',function(e){
			  	 		e.preventDefault();
			  	 		var ID = $(this).attr('id');
			  	 		$.ajax({
			  	 			type:'GET',
			  	 			url:'more.php',
			  	 			data:{'id':ID},
			  	 			success : function(response, textStatus, jqXHR) {
								console.log(response);
								document.getElementById("_open").setAttribute("id","c_" + ID);
								$('#c_'+ID).html(response);
								$('#c_'+ID).popup({
									color: '#cccccc',
									transition: 'all 0.3s', 
									horizontal: 'left',
									vertical: 'top',
									opacity: 1,
									autoopen: true,
									onclose: function(){
										window.location.replace("work.php");
									}
								});
	                   		},
                    		error: function(jqXHR, textStatus, errorThrown){
                    			console.error(errorThrown);
                    		}
			  	 		});
			  			console.log("AJAX script finished.")
			  	 	});
			  	 });
			  </script>

	</body>
</html>