<!DOCTYPE html>
<html>
<head>
	<style>
		body {
		  	margin: 0;
		}

		ul {
		  	list-style-type: none;
		  	margin: 0;
		  	padding: 0;
		  	width: 20%;
		  	background-color: #C8C8C8;
		  	position: fixed;
		  	height: 100%;
		  	overflow: auto;
		  	box-shadow: 0px 0px 5px 1px;
		}

		li a {
		  	display: block;
		  	color: #000;
		  	padding: 10px 25px;
		  	text-decoration: none;
		  	height: 25px;
		  	line-height: 25px;
		}
		button.nav_button {
			width: 100%;
			height: 50px; 
			text-align: left;
			padding: 10px 25px;
			border : none;
			font-family: Luminari;
			font-size: 20px;
			background-color: #C8C8C8;
		}
		button.nav_button.active {
		  	background-color: #FF0000 !important;
		  	color: white;
		  	font-size: 21px;
		  	letter-spacing: 1px;
		}

		button.nav_button:hover {
		  	background-color: #555;
		  	color: white;
		  	font-size: 21px;
		  	letter-spacing: 1px;
		  	transition: all 0.1s ease 0s;
		}
		#header {
			width: 100%;
			position: fixed;
			height: 60px;
			background-color: #555 ;
			line-height: 60px;
			padding-left: 30px;
			color: white; 
		  	font-size: 40px;
		  	font-family: Trebuchet MS;
		  	padding-right: 80px;
		}
		#nav_bar {
			margin-top: 60px;
		}
		#main_box {
			margin-left:20%;
			padding:1px 16px;
			padding-top: 60px;
			height: auto;
		}
		#log_out {
			margin-right: 60px;
			float: right;
			height: 60px;
		}
		#username {
			padding-right: 20px;
			float: right;
		}
		#log_out {
			width: 120px;
			color: #fff;
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
		#log_out:hover {
			background: #434343;
			letter-spacing: 1px;
			box-shadow: 0px 0px 30px 5px #FF0000 ;
			transition: all 0.1s ease 0s;
		}
		#log_out:active {
			background-color: #434343 ;
			color: #FF0000;
  			box-shadow: 0px 0px 30px 5px white ;
		}
		.add_button {
			width: 230px;
			color: #fff;
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
			margin-top: 20px;
		}
		.add_button:hover {
			background: #434343;
			letter-spacing: 1px;
			transition: all 0.1s ease 0s;
		}
		.add_button:active {
			background-color: #434343 ;
			color: #FF0000;
		}
		.sub_header {
			font-size: 30px;
			font-family: Arial;
		}
		#about {
			font-size: 20px;
			font-family: Arial;
		}
		table, td, tr, th {
			border-collapse: collapse;
			border : solid black 2px;
			line-height: 30px;
		}
		table.counter {
			min-width: 800px;
		}
		table.stock {
			min-width: 900px;
		}
		th {
			color: white;
			background-color: #505050 ;
			font-size: 20px;
		}
		td {
			font-size: 20px;
			padding-left: 5px;
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
        $adminname=$_SESSION['login_user'];
        $mode=$_SESSION['login_mode'];
	?>
	<script>
        function home_f() {
          document.getElementById('home_but').classList.add('active');
		  document.getElementById('books_but').classList.remove('active');
		  document.getElementById('librarian_but').classList.remove('active');
		  document.getElementById('department_but').classList.remove('active');
		  document.getElementById('student_but').classList.remove('active');
		  document.getElementById('about_but').classList.remove('active');
          document.getElementById("home").style.display = "inline-block";
          document.getElementById("books").style.display = "none";
          document.getElementById("librarian").style.display = "none";
          document.getElementById("student").style.display = "none";
          document.getElementById("about").style.display = "none";
          document.getElementById("department").style.display = "none";
		  document.getElementById("issued").style.display = "none";
		  document.getElementById('issue_but').classList.remove('active');
        }
        function book_f() {
          document.getElementById('home_but').classList.remove('active');
		  document.getElementById('books_but').classList.add('active');
		  document.getElementById('librarian_but').classList.remove('active');
		  document.getElementById('department_but').classList.remove('active');
		  document.getElementById('student_but').classList.remove('active');
		  document.getElementById('about_but').classList.remove('active');  
          document.getElementById("home").style.display = "none";
          document.getElementById("books").style.display = "inline-block";
          document.getElementById("librarian").style.display = "none";
          document.getElementById("student").style.display = "none";
          document.getElementById("about").style.display = "none";
          document.getElementById("department").style.display = "none";
		  document.getElementById("issued").style.display = "none";
		  document.getElementById('issue_but').classList.remove('active');
        }
        function librarian_f() {
          document.getElementById('home_but').classList.remove('active');
		  document.getElementById('books_but').classList.remove('active');
		  document.getElementById('librarian_but').classList.add('active');
		  document.getElementById('department_but').classList.remove('active');
		  document.getElementById('student_but').classList.remove('active');
		  document.getElementById('about_but').classList.remove('active');
          document.getElementById("home").style.display = "none";
          document.getElementById("books").style.display = "none";
          document.getElementById("librarian").style.display = "inline-block";
          document.getElementById("student").style.display = "none";
          document.getElementById("about").style.display = "none";
          document.getElementById("department").style.display = "none";
		  document.getElementById("issued").style.display = "none";
		  document.getElementById('issue_but').classList.remove('active');
        }
        function student_f() {
          document.getElementById('home_but').classList.remove('active');
		  document.getElementById('books_but').classList.remove('active');
		  document.getElementById('librarian_but').classList.remove('active');
		  document.getElementById('department_but').classList.remove('active');
		  document.getElementById('student_but').classList.add('active');
		  document.getElementById('about_but').classList.remove('active');
          document.getElementById("home").style.display = "none";
          document.getElementById("books").style.display = "none";
          document.getElementById("librarian").style.display = "none";
          document.getElementById("student").style.display = "inline-block";
          document.getElementById("about").style.display = "none";
          document.getElementById("department").style.display = "none";
		  document.getElementById("issued").style.display = "none";
		  document.getElementById('issue_but').classList.remove('active');
        }
        function about_f() {
          document.getElementById('home_but').classList.remove('active');
		  document.getElementById('books_but').classList.remove('active');
		  document.getElementById('librarian_but').classList.remove('active');
		  document.getElementById('department_but').classList.remove('active');
		  document.getElementById('student_but').classList.remove('active');
		  document.getElementById('about_but').classList.add('active');
          document.getElementById("home").style.display = "none";
          document.getElementById("books").style.display = "none";
          document.getElementById("librarian").style.display = "none";
          document.getElementById("student").style.display = "none";
          document.getElementById("about").style.display = "inline-block";
          document.getElementById("department").style.display = "none";
		  document.getElementById("issued").style.display = "none";
		  document.getElementById('issue_but').classList.remove('active');
        }
        function department_f() {
          document.getElementById('home_but').classList.remove('active');
		  document.getElementById('books_but').classList.remove('active');
		  document.getElementById('librarian_but').classList.remove('active');
		  document.getElementById('department_but').classList.add('active');
		  document.getElementById('student_but').classList.remove('active');
		  document.getElementById('about_but').classList.remove('active');
          document.getElementById("home").style.display = "none";
          document.getElementById("books").style.display = "none";
          document.getElementById("librarian").style.display = "none";
          document.getElementById("student").style.display = "none";
          document.getElementById("about").style.display = "none";
          document.getElementById("department").style.display = "inline-block";
		  document.getElementById("issued").style.display = "none";
		  document.getElementById('issue_but').classList.remove('active');
        }
		function issue_f() {
          document.getElementById('home_but').classList.remove('active');
		  document.getElementById('books_but').classList.remove('active');
		  document.getElementById('department_but').classList.remove('active');
		  document.getElementById('student_but').classList.remove('active');
		  document.getElementById('about_but').classList.remove('active');
		  document.getElementById('issue_but').classList.add('active');
          document.getElementById("home").style.display = "none";
          document.getElementById("books").style.display = "none";
          document.getElementById("student").style.display = "none";
          document.getElementById("about").style.display = "none";
          document.getElementById("dpt").style.display = "none";
		  document.getElementById("librarian").style.display = "none";
		  document.getElementById('librarian_but').classList.remove('active');
		  document.getElementById("issued").style.display = "inline-block";
        }
        </script>
	
	<div id="header">LIBRARY<button id="log_out" onclick="document.location = 'logout.php'">Log Out</button><span id="username"><?php echo $adminname;?></span></div>   /* type name of login by php-->*/
	<ul id="nav_bar">
        <li><button class="nav_button active" onclick="home_f()" id="home_but">Home</button></li>
        <li><button class="nav_button" onclick="book_f()"id="books_but">Books</button></li>
        <li><button class="nav_button" onclick="librarian_f()" id="librarian_but">Librarians</button></li>
        <li><button class="nav_button" onclick="department_f()"id="department_but">Departments</button></li>
		<li><button class="nav_button" onclick="student_f()" id="student_but">Students</button></li>
		<!--<li><button class="nav_button" onclick="issue_f()"id="issue_but">Issue</button></li>-->
		<li><button class="nav_button" onclick="about_f()" id="about_but">About</button></li>

	</ul>

	<div id="main_box">
	  	<div id="home">
		  <table style="border:none; width:100%;" >
			   <tr style="border:none;" >
				   <td style="border:none;">
				   <button class="add_button" onclick="document.location = 'change_password.php'">CHANGE PASSWORD</button><br>
					</td>
					<td style="border:none;">
				<b>	<p style="text-align-last: right;">Date: <span id="date"></span></p></b>
					<script>
								var dt = new Date();
								document.getElementById("date").innerHTML = dt.toLocaleDateString();
						</script>
				<b>	<p style="text-align-last: right;">Time: <span id="time"></span></p></b>
					<script>
						var dt = new Date();
						document.getElementById("time").innerHTML = dt.toLocaleTimeString();
					</script>
					</td>
				</tr>
			</table>
           <!-- <button class="add_button" onclick="document.location = '#'">MY INFORMATION</button> 
            <button class="add_button" onclick="document.location = 'change_password.php'">CHANGE PASSWORD</button>
	  		<h>write something if you want to write</h> -->
	  	</div>
	  	<div id="books" style="display: none;">
	  		<button class="add_button" onclick="document.location = 'add_book.php'">Add New Book</button>
	  		<button class="add_button" onclick="document.location = 'remove_book.php'">Remove Book</button>
			<h2 class="sub_header">Books : </h2>
			<?php
                
                $conn = new mysqli('localhost', 'root', '', 'library');
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                else{
                    $sql = "SELECT book_id, title, author, edition, books FROM book";
                    if ($result = $conn->query($sql)) {
                        if ($result->num_rows > 0) {
                            echo "<table class='counter'><tr><th>Book Id</th><th>Title</th><th>Author</th><th>Edition</th><th>Books</th></tr>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {                           	
                                echo "<tr><td>" . $row["book_id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["author"]. "</td><td>" . $row["edition"]. "</td><td>" . $row["books"]. "</td></tr>";
                               
                            }
                            echo "</table>";
                        } else {
                            echo "No Books Available";
                        }
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Database error")';
                        echo '</script>';
                    }
                    $conn->close();
                }

            ?>
		</div>
	  	
	  	<div id="librarian" style="display: none;">
	  		<button class="add_button" onclick="document.location = 'add_librarian.php'">Add New Librarian</button>
	  		<button class="add_button" onclick="document.location = 'remove_librarian.php'">Remove Librarian</button>
			<h2 class="sub_header">Librarians : </h2>
			<?php
                
                $conn = new mysqli('localhost', 'root', '', 'library');
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                else{
                    $sql = "SELECT  l_id, l_name, l_email, l_contact FROM librarian";
                    if ($result = $conn->query($sql)) {
                        if ($result->num_rows > 0) {
                            echo "<table class='counter'><tr><th>Id</th><th>Name</th><th>Email Address</th><th>Contact Number</th></tr>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {                           	
                                echo "<tr><td>" . $row["l_id"]. "</td><td>" . $row["l_name"]. "</td><td>" . $row["l_email"]. "</td><td>" . $row["l_contact"]. "</td></tr>";
                               
                            }
                            echo "</table>";
                        } else {
                            echo "";
                        }
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Database error")';
                        echo '</script>';
                    }
                    $conn->close();
                }

            ?>
		</div>	
        
        <div id="department" style="display: none;">
            <button class="add_button" onclick="document.location = 'add_department.php'">Add Department</button>
            <button class="add_button" onclick="document.location = 'remove_department.php'">Remove Department</button>
			<h2 class="sub_header">Departments : </h2>
			<?php
                
                $conn = new mysqli('localhost', 'root', '', 'library');
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                else{
                    $sql = "SELECT  dept_id, dept_name FROM Department";
                    if ($result = $conn->query($sql)) {
                        if ($result->num_rows > 0) {
                            echo "<table class='counter'><tr><th>Id</th><th>Department Name</th></tr>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {                           	
                                echo "<tr><td>" . $row["dept_id"]. "</td><td>" . $row["dept_name"]. "</td></tr>";
                               
                            }
                            echo "</table>";
                        } else {
							echo "<table class='counter'>";
							echo "<tr><td>No Department Exist</td></tr>";
							echo "</table>";
                        }
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Database error")';
                        echo '</script>';
                    }
                    $conn->close();
                }

            ?>
        </div>

        <div id="student" style="display: none;">
            <button class="add_button" onclick="document.location = 'add_student.php'">Add New Student</button>
            <button class="add_button" onclick="document.location = 'remove_student.php'">Remove Student</button>
			<h2 class="sub_header">Students : </h2>
			<?php
                
                $conn = new mysqli('localhost', 'root', '', 'library');
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                else{
                    $sql = "SELECT  std_id,std_name, std_address, std_email,std_contact,dept_id FROM student";
                    if ($result = $conn->query($sql)) {
                        if ($result->num_rows > 0) {
                            echo "<table class='counter'><tr><th>ID</th><th>Name</th><th>Address</th><th>Email Id</th><th>Contact Number</th><th>Department Id</th></tr>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {                           	
                                echo "<tr><td>" . $row["std_id"]. "</td><td>" . $row["std_name"]. "</td><td>" . $row["std_address"]. "</td><td>" . $row["std_email"]. "</td><td>" . $row["std_contact"]. "</td><td>" . $row["dept_id"]. "</td></tr>";
                               
                            }
                            echo "</table>";
                        } else {
                            echo "Librarian is not Assigned";
                        }
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Database error")';
                        echo '</script>';
                    }
                    $conn->close();
                }

            ?>
        </div>  
		<div id="issued" style="display:none;">
		<h1> issued books</h1>

		</div>
		<div id="about" style="display:none;">
		<h1>about</h1>

		</div>
	  
	</div>

</body>
</html>