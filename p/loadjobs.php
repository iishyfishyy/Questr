<?php

						$servername = "localhost";
						$s_username = "root";
						$s_password = "658860";
						$db_name = "questr";

						$conn = new mysqli($servername, $s_username, $s_password, $db_name);

						if($conn->connect_error){
							die("Connection failed: " . $conn->connect_error);
						}

						if(isset($_GET['sortBy'])){
							if($_GET['sortBy'] === "category"){
								$sql = "SELECT * FROM jobs ORDER BY category";
							}
						} else {
							$sql = "SELECT * FROM jobs";
						}

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
										      <th><a href=\"\">Category</a></th>
										      <th>Payment</th>
										      <th>Location</th>
										      <th>Status</th>
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