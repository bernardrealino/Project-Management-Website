<?php 
    session_start();

    if(!$_SESSION['login']){
        header("Location: login.php");
        exit;
    }else{
        echo $_SESSION['usertype'];
        if($_SESSION['usertype'] == 'ADM'){
            header("Location: admin.php");
        }elseif($_SESSION['usertype'] == 'UNT'){
            header("Location: unit.php");
        }elseif($_SESSION['usertype'] == 'USR'){
            header("Location: executor.php");
        }
    }
?>
<?php require("functions/functions.php")?>
<?php require("header.php")?>

<?php require("footer.php")?>