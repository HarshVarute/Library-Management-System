
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		html, body {
			margin: 0;
			height: 100%; 
			background-color: #C8C8C8; 
		}
		table, tr, th {
			border-collapse: collapse;
		}
		table {
			width: 600px;
			height: 600px;
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
			padding-bottom: 10px;
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
	</style>
</head>
<body>
<?php 
           
           $done = 0;
           $fullname = "";
           $username = "";
           $password = "";
           $confirm_password = "";
           $fullname_err = "";
           $username_err = "";
           $password_err = "";
           $confirm_password_err1 = "";
           $confirm_password_err2 = "";
           function test_input($data) {
                       $data = trim($data);
                       $data = stripslashes($data);
                       $data = htmlspecialchars($data);
                       return $data;
                   }
           if ($_SERVER["REQUEST_METHOD"] == "POST") {
               if (empty($_POST['fullname'])) {
                   $fullname_err = "Name is required";
               }
               else {
                   $fullname = test_input($_POST['fullname']);
                   $done = $done + 1;
               }
               if (empty($_POST['username'])) {
                   $username_err = "Username is required";
               }
               else {
                   $username = test_input($_POST['username']);
                   $done = $done + 1;
               }
               if (empty($_POST['password'])) {
                   $password_err = "Password required";
               }
               else {
                   $password = test_input($_POST['password']);
                   $done = $done + 1;
               }
               if (empty($_POST['confirm_password'])) {
                    $confirm_password_err1 = "Configuration of password required";
                }
                else if ( test_input($_POST['password']) !== test_input($_POST['confirm_password'])){
                    $confirm_password_err2 = "Password not matched";
                }
                else {
                    $confirm_password = test_input($_POST['confirm_password']);
                    $done = $done + 1;
                }
           }		
       ?>

	<table>
		<tr>
			<th id="box">
			  	<div>
			  		<h4 id="header">ADD ADMIN</h4>
			  		
			  		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" autocomplete="off">
                          <input type="text"  class="inputs" placeholder="Full Name" name="fullname" required><br>
                          <p id="mode_error" style="color:red"><?php echo $fullname_err;?></p>
                        <input type="text" class="inputs" placeholder= "Username" pattern=".{5,}"  name="username" required> <br>
                        <p id="mode_error" style="color:red"><?php echo $username_err;?></p>
                        <input type="password" placeholder="Password" class="inputs" pattern=".{5,}"  name="password" required ><br>
                        <p id="mode_error" style="color:red"><?php echo $password_err;?></p>
                        <input type="password" placeholder="Confirm Password" class="inputs" pattern=".{5,}"  name="confirm_password" required><br>
                        <p id="mode_error" style="color:red"><?php echo $confirm_password_err1;?></p>
                        <p id="mode_error" style="color:red"><?php echo $confirm_password_err2;?></p>
						<button class="login_button" type="submit">Add As Admin</button>
			  		</form>
                    <button class="back" onclick="document.location = 'main_page.html'" target="_blank">Back</button>
			  	</div>
			</th>
		</tr>
    </table>
    <?php
    if ($done == 4) {
        $conn = new mysqli('localhost','root','','library');
        if($conn->connect_error){
            die('Connection failed');
        }
        else {
            $sql = "SELECT name FROM admin";
            if ($result = mysqli_query($conn, $sql)) {
                $row = mysqli_num_rows($result);
                if ($row == 0) {
                    $conn -> query("INSERT INTO admin(name, username, password) VALUES ('$_POST[fullname]', '$_POST[username]', '$_POST[password]')");
                    echo '<script language="javascript">';
                    echo 'alert("Admin added successfully")';
                    echo '</script>';
                    $conn -> close();
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Admin already exist!")';
                    echo '</script>';
                }
            }
        }
    }
    

?>
</body>
</html>







