<?php require("functions/functions.php")?>
<?php
    session_start();
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE UserId = '$username'");
        if ( mysqli_num_rows($result) === 1 ){
            $row = mysqli_fetch_assoc($result);
            if( $password = $row['UserPassword']){
                $_SESSION['login'] = true;
                $_SESSION['usertype'] = $row['UserType'];
                $_SESSION['userid'] = $row['UserId'];

                header("Location: index.php");
                // exit;
            }
        }
    }
    
?>  

<?php require("header.php")?>

<h2>Login</h2>
<form action="login.php" method="POST">
    <table border='1' cellpadding='10' cellspacing='0'>
        <tr>
            <td><label for="username">User ID:</label></td>
            <td><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <button type="submit" name="submit">Login</button>
            </td>
        </tr>
    </table>
</form>
<?php require("footer.php")?>