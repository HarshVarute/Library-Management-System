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
			height: 500px;
			margin: auto;
			position: absolute;
			top:0;
			bottom: 0;
			left: 0;
			right: 0;
			box-shadow: 0px 0px 30px 5px;
			margin-top: 120px;
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
	</style>
</head>
<body>
    <?php
		session_start();
        if(!isset($_SESSION['login_user']))
        {
            header("location: main_page.html");
        }
        $username=$_SESSION['login_user'];
		$mode=$_SESSION['login_mode'];
		$uniqueid = $_SESSION['login_id'];
     $oldpass = "";
     $confpass = "";
     $pass = "";
     $s="std";
     $l="lib";
     $a="adm";
     
     function test_input($data) {
                 $data = trim($data);
                 $data = stripslashes($data);
                 $data = htmlspecialchars($data);
                 return $data;
             }
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $oldpass = test_input($_POST['old']);
          $pass = test_input($_POST['new']);
          $confpass = test_input($_POST['confirm']);
          $conn = new mysqli('localhost','root','','library');
          if($conn->connect_error){
              die('Connection failed');
          }
          else {
                if(strcasecmp($mode, $a) == 0){
                    $change = "SELECT password FROM admin WHERE username='".$username."'";
                    $result = $conn->query($change);
                    $row = mysqli_fetch_assoc($result);
                    if(strcasecmp($row["password"], $oldpass) == 0){
                        if($pass == $confpass){
                            $conn->query("UPDATE admin SET password='".$pass."' WHERE username='".$username."'");
                            echo '<script language="javascript">';
                            echo 'alert("Password Changed Successfully")';
                            echo '</script>';
                            $conn -> close();
                        }
                        else{
                            echo '<script language="javascript">';
                            echo 'alert("Confirm password not matched")';
                            echo '</script>';
                        }
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Old password Entered Incorrectly")';
                        echo '</script>';
                    }
                }
                else if(strcasecmp($mode, $l) == 0){
					$change = "SELECT l_password FROM librarian WHERE l_id='".$uniqueid."'";
                    $result = $conn->query($change);
                    $row = mysqli_fetch_assoc($result);
                    if(strcasecmp($row["l_password"], $oldpass) == 0){
                        if($pass == $confpass){
                            $conn->query("UPDATE librarian SET l_password='".$pass."' WHERE l_id ='".$uniqueid."'");
                            echo '<script language="javascript">';
                            echo 'alert("Password Changed Successfully")';
                            echo '</script>';
                            $conn -> close();
                        }
                        else{
                            echo '<script language="javascript">';
                            echo 'alert("Confirm password not matched")';
                            echo '</script>';
                        }
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Old password Entered Incorrectly")';
                        echo '</script>';
                    }
                }
                else{
					$change = "SELECT std_password FROM student WHERE std_id='".$uniqueid."'";
                    $result = $conn->query($change);
                    $row = mysqli_fetch_assoc($result);
                    if(strcasecmp($row["std_password"], $oldpass) == 0){
                        if($pass == $confpass){
                            $conn->query("UPDATE student SET std_password='".$pass."' WHERE std_id ='".$uniqueid."'");
                            echo '<script language="javascript">';
                            echo 'alert("Password Changed Successfully")';
                            echo '</script>';
                            $conn -> close();
                        }
                        else{
                            echo '<script language="javascript">';
                            echo 'alert("Confirm password not matched")';
                            echo '</script>';
                        }
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Old password Entered Incorrectly")';
                        echo '</script>';
                    }
                }
          }
      }
	?>
	<table>
		<tr>
			<th id="box">
			  	<div>
			  		<h4 id="header">Change Password</h4>
			  		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  autocomplete="off">
                          <input type="text" placeholder="Old Password" class="inputs" name="old" required><br><br>
                          <input type="text" placeholder="New password" class="inputs" name="new" required><br><br>
                          <input type="text" placeholder="Confirm new password" class="inputs" name="confirm" required ><br><br>
						<button class="login_button" type="submit">Change Password</button>
			  		</form>
			  		<button class="back" onclick="javascript:history.go(-1)" target="_blank">Back</button>
			  	</div>
			</th>
		</tr>
	</table>
	
</body>
</html>