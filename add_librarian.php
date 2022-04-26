<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		html, body {
			margin: 0;
			height: 100%; 
			/*overflow: hidden;
*/			background-color: #C8C8C8; 
		}
		table, tr, th {
			border-collapse: collapse;
		}
		table {
			width: 600px;
			height: 650px;
			margin: auto;
			position: absolute;
			top:0;
			bottom: 0;
			left: 0;
			right: 0;
			box-shadow: 0px 0px 30px 5px;
			margin-top: 50px;
			margin-bottom: 50px;
		}
		#box {
			width: 500px;
			background-color: white;
			padding-bottom: 50px;
		}
		button.login_button {
			width: 250px;
			color: #fff !important;
			text-transform: uppercase;
			text-decoration: none;
			background: #FF0000;
			padding: 20px;
			border-radius: 5px;
			display: inline-block;
			border: none;
			transition: all 0.4s ease 0s;
			font-family: Verdana;
			font-size: 15px; 
		}
		button.login_button:hover {
			background: #434343;
			width: 300px;
			letter-spacing: 1px;
			box-shadow: 0px 0px 30px 5px #FF0000 ;
			transition: all 0.1s ease 0s;
		}
		button.login_button:active {
			background-color: #434343 ;
            color: rgba(255, 255, 255, 1);
  			box-shadow: 0px 0px 30px 5px #434343 ;
		}
		input.inputs {
			height: 30px;
			width: 250px;
			border-radius: 5px;
			border : solid 2px #FF0000;
			padding: 10px 20px;
  			margin: 14px 0;
  			font-family: Arial;
  			font-size: 18px;
		}
		#header {
			font-family:  Trebuchet MS;
			font-size: 30px;
			line-height: 20px;
		}
		button.back {
			width: 60px;
			height: 30px;
			float: left;
			text-transform: uppercase;
			background: #FF0000;
			font-family: Verdana;
			font-size: 15px;
			color: #fff !important;
			border: none;
			border-radius: 5px;
			margin: 40px;
		}
		button.back:hover {
			width: 65px;
			background: #434343;
			letter-spacing: 1px;
			box-shadow: 0px 0px 30px 5px #FF0000 ;
			transition: all 0.1s ease 0s;
		}
		label.gend {
			font-size: 20px;
			font-family: Arial;
		}
		#gender_err {
			color: #FF0000;
		}
	</style>
</head>
<body>
<?php 
     
           $fullname = "";
           $address = "";
           $email = "";
           $contact = "";
           $id = "";
           function test_input($data) {
                       $data = trim($data);
                       $data = stripslashes($data);
                       $data = htmlspecialchars($data);
                       return $data;
                   }
           if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = test_input($_POST['id']);
                $fullname = test_input($_POST['full_name']);
                $address = test_input($_POST['address']);
                $email = test_input($_POST['email']);
                $contact = test_input($_POST['contact']);
                $conn = new mysqli('localhost','root', '','library');
                if($conn->connect_error){
                    die('Connection failed');
                }
                else {
                    $sql = "SELECT l_email FROM librarian WHERE l_email = '".$email."'";
                    $result = $conn->query($sql);
                    if($result->num_rows == 0){
                        
                        $conn -> query("INSERT INTO librarian(l_id, l_name, l_address, l_email, l_contact, l_password) VALUES ('$_POST[id]', '$_POST[full_name]', '$_POST[address]', '$_POST[email]', '$_POST[contact]', '$_POST[email]')");
                       // $last_id = $conn->insert_id;
                       // $id = "SELECT l_id FROM librarian WHERE l_email = '".$email."'";
                       // $res = $conn->query($sql);
                       // $rowid = mysqli_fetch_assoc($res);
                       //echo " id is $last_id";

                        echo '<script>alert("Librarian added successfully.\nYour id is '.$id.'\nPassword is Email Id.")</script>';
                        $conn -> close();
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Librarian already exist!")';
                        echo '</script>';
                    }
                }
            }
               		
       ?>
	<table>
		<tr>
			<th id="box">
			  	<div>
			  		<h4 id="header">ADD NEW Librarian</h4>
			  		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  name="add_lirbrarian" autocomplete="off">
                        <input type="number" placeholder="ID" class="inputs" name="id" required><br><br>
                        <input type="text" placeholder="Name" class="inputs" name="full_name" required><br><br>
						<input type="text" placeholder="Address" class="inputs" name="address" required><br><br>
						<input type="text" placeholder="Email Id" class="inputs" name="email" required><br><br>
                        <input type="tel" placeholder="Contact Number" class="inputs" name="contact" required><br><br>
						<button class="login_button" type="submit">Add Librarian</button>
			  		</form>
			  		<button class="back" onclick="document.location = 'admin_home.php'" target="_blank">Back</button>
			  	</div>
			</th>
		</tr>
	</table>
	
</body>
</html>