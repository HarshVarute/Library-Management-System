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

     $book_id = "";
     $issue_id = "";
     function test_input($data) {
                 $data = trim($data);
                 $data = stripslashes($data);
                 $data = htmlspecialchars($data);
                 return $data;
             }
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $issue_id = test_input($_POST['issue_id']);
          $conn = new mysqli('localhost','root','','library');
          if($conn->connect_error){
              die('Connection failed');
          }
          else {
            $issue = "SELECT issue_id, book_id FROM issue WHERE issue_id = '".$issue_id."'";
            $resultissue = $conn->query($issue);
            $row = mysqli_fetch_assoc($resultissue);
            if($resultissue->num_rows == 0){
                echo '<script language="javascript">';
                echo 'alert("Issue id is Incorrect.")';
                echo '</script>';
            }
            else{
              $ret_date = date('Y-m-d');
              $book_id = $row["book_id"];
              $book = "SELECT book_id, books FROM book WHERE book_id = '".$book_id."'";
              $resultbook = $conn->query($book);
              $row1 = mysqli_fetch_assoc($resultbook);
              $numbers = $row1["books"];
            $conn -> query("UPDATE  issue SET return_date = '".$ret_date."' where issue_id = '".$issue_id."'");
            $digit="1";
            $temp = $numbers + $digit;
            $conn->query("UPDATE book SET books= '".$temp."'  WHERE book_id = '".$book_id."'");
            echo '<script>alert("Book Returned.")</script>';
            $conn -> close();
            }
          }
      }
                 
 ?>
	<table>
		<tr>
			<th id="box">
			  	<div>
			  		<h4 id="header">Return Book</h4>
			  		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  name="add_lirbrarian" autocomplete="off">
			  			<input type="number" placeholder="Issue Id" class="inputs" name="issue_id"><br><br>
					<!--	<input type="number" placeholder="Book Id" class="inputs" name="book_id" value="#"><br><br>-->
						<button class="login_button" type="submit">Return Book</button>
			  		</form>
			  		<button class="back" onclick="javascript:history.go(-1)" target="_blank">Back</button>
			  	</div>
			</th>
		</tr>
	</table>
	
</body>
</html>