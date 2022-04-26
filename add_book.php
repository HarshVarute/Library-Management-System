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
	</style>
</head>
<body>
<?php 
     
     $title = "";
     $author = "";
     $edition = "";
     $no = "";
     $bookid = "";
     function test_input($data) {
                 $data = trim($data);
                 $data = stripslashes($data);
                 $data = htmlspecialchars($data);
                 return $data;
             }
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $title = test_input($_POST['title']);
          $author = test_input($_POST['author']);
          $edition = test_input($_POST['edition']);
          $no = test_input($_POST['numbers']);
          $conn = new mysqli('localhost','root','','library');
          if($conn->connect_error){
              die('Connection failed');
          }
          else {
              $sql = "SELECT book_id, title, author, edition, books FROM book WHERE title = '".$title."' AND author= '".$author."' AND edition = '".$edition."'";
              $result = $conn->query($sql);
              
                  if($result->num_rows == 0){
                      $conn -> query("INSERT INTO book(title, author, edition, books) VALUES ('$_POST[title]', '$_POST[author]', '$_POST[edition]', '$_POST[numbers]')");
                      $last_id = $conn->insert_id;
                      echo '<script>alert("Book added successfully.\nBook id is '.$last_id.'")</script>';
                      $conn -> close();
                  }
                  else{
					  $row = mysqli_fetch_assoc($result);
					  $ald= $row["books"];
					  $numbers= $ald + $no;
					  $iddd=$row["book_id"];
					$conn -> query("UPDATE book SET books = '".$numbers."' WHERE book_id= '".$iddd."'");
					echo '<script>alert("New '.$no.' books added")</script>';
                  }
              
          }
      }
                 
 ?>
	<table>
		<tr>
			<th id="box">
			  	<div>
			  		<h4 id="header">ADD NEW BOOK</h4>
			  		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  name="add_book" autocomplete="off">
			  			<input type="text" placeholder="Title" class="inputs" name="title" required><br><br>
						<input type="text" placeholder="Author" class="inputs" name="author" required><br><br>
						<input type="text" placeholder="Edition" class="inputs" name="edition" required><br><br>
						<input type="number" placeholder="Number of Books" class="inputs" name="numbers" required><br><br>
						<button class="login_button" type="submit">Add Book</button>
			  		</form>
			  		<button class="back" onclick="javascript:history.go(-1)" target="_blank">Back</button>
			  	</div>
			</th>
		</tr>
	</table>
	
</body>
</html>