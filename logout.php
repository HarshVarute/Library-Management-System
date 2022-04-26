<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
    </head>
    <body>
        <?php 
            session_start();
            echo "<script>alert('Logout Successful');</script>";
            if (isset($_SESSION['login_user'])) {
                unset($_SESSION['login_user']);
            }
            if (isset($_SESSION['login_type'])) {
                unset($_SESSION['login_type']);
            }
            header("Location: main_page.html");
        ?>
    </body>
</html>