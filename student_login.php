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
    $mode="std";
    $stdid = "";
    $password = "";
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stdid = test_input($_POST['student_id']);
        $password = test_input($_POST['password']);
        $conn = new mysqli('localhost','root','','library');
        if($conn->connect_error){
            die('Connection failed');
        }
        else {
            $sql = "SELECT std_id, std_name, std_password FROM student Where std_id ='".$stdid."'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            if (strcasecmp($row["std_id"], $stdid) == 0) {
               
                if (strcasecmp($row["std_password"], $password) == 0){
                    session_start();
                    $_SESSION['login_user'] = $row["std_name"];
					$_SESSION['login_mode'] = $mode;
					$_SESSION['login_id'] = $row["std_id"];
					header("location: student_home.php");
                    $conn -> close();
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Wrong password Entered")';
                    echo '</script>';
                }
            } else {
                    echo '<script language="javascript">';
                    echo 'alert("User Id not exist")';
                    echo '</script>';
            }
            
        }
    }
    ?>

	<table>
		<tr>
			<th id="box">
			  	<div>
			  		<h4 id="header">STUDENT LOGIN</h4>
			  		<form method="post"   name="student_login" autocomplete="off">
						<input type="text" class="inputs" placeholder= "Student ID"pattern=".{5,}" title="Five or more characters" name="student_id" required><br>
						<input type="password" placeholder="Password" class="inputs" pattern=".{5,}" title="Five or more characters" name="password" required><br><br>
						<button class="login_button" type="submit">Login</button>
			  		</form>
                    <button class="back" onclick="document.location = 'main_page.html'" target="_blank">Back</button>
			  	</div>
			</th>
		</tr>
	</table>
</body>
</html>