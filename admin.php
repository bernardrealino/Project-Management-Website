
<?php require("functions/functions.php")?>
<?php 
    $tasks = query("SELECT * FROM tasks ORDER BY TaskId");
    $users = query("SELECT * FROM users ORDER BY UserName");

    if(isset($_GET["submit"])){
        $TaskId = $_GET["TaskId"];
        $value = $_GET["submit"];
        $edit = "UPDATE tasks SET TaskApprove='$value' WHERE TaskId='$TaskId'";
        
        if($_GET > 0){
            approveAccept($edit);
            echo "
                <script>
                    document.location.href = 'admin.php';
                </script>
            ";
        }
    }
    if(isset($_GET["reset"])){
        $edit = "UPDATE tasks SET TaskApprove='2'";
        
        if($_GET > 0){
            approveAccept($edit);
            // echo "
            //     <script>
            //         document.location.href = 'admin.php';
            //     </script>
            // ";
        }
    }
    if(isset($_GET["adduser"])){
        $UserId = $_GET['UserId'];
        $UserPassword = $_GET['UserPassword'];
        $UserType = $_GET['UserType'];
        $UserName = $_GET['UserName'];
        $UserEmail = $_GET['UserEmail'];
        // $adduser = "INSERT INTO users VALUES ('', '$UserId', '$UserPassword', '$UserName', '$UserEmail', '$UserType')";
        $adduser = "INSERT INTO users (UserId, UserPassword, UserName, UserEmail, UserType)
                    VALUES ('$UserId', '$UserPassword', '$UserName', '$UserEmail', '$UserType');";

        if($_GET > 0){
            addUser($adduser);
            echo "
                <script>
                    alert('User Added!');
                    document.location.href = 'admin.php';
                </script>
            ";
        }
    }
?>
<?php require("header.php")?>
<!-- tampilkan semua data, acc, pilih pelaksana dari list -->

<h1>Admin</h1>
<h2>Tasks</h2>
<table border='1' cellpadding='10' cellspacing='0'>
    <tr>
        <th>Task ID</th>
        <th>Unit Name</th>
        <th>Task Name</th>
        <th>Due Date</th>
        <th>Type</th>
        <th>Description</th>
        <th>Excecutor</th>
        <th>Approval</th>
        <th>Status</th>
    </tr>
    <?php foreach($tasks as $task):?>
        <tr>
            <td><?= $task["TaskId"]?></td>
            <td><?= $task["UnitOwner"]?></td>
            <td><?= $task["TaskName"]?></td>
            <td><?= $task["TaskDate"]?></td>
            <td><?= $task["TaskType"]?></td>
            <td><?= $task["TaskDescription"]?></td>
            <td><?= $task["TaskExcecutor"]?></td>
            <?php if($task["TaskApprove"] == 1):?>
                <td>Accepted</td>
            <?php elseif($task["TaskApprove"] == 0):?>
                <td>Declined</td>
            <?php elseif($task["TaskApprove"] == 2):?>
                <form action="admin.php" method="GET">
                    <input type="hidden" name="TaskId" value="<?= $task["TaskId"]?>"/>
                    <td><button type="submit" name="submit" value="1">Accept</button> <button type="submit" name="submit" value="0">Decline</button></td>        
                </form>
            <?php endif?>
            <?php if($task["TaskDone"] == 1):?>
                <td>Done</td>
            <?php elseif($task["TaskDone"] == 0):?>
                <td>Working</td>        
            <?php endif?>
        </tr>
    <?php endforeach?>  
    </tr>
</table>
<form action="admin.php" method="GET">
    <td><button type="submit" name="reset" value="1">Reset</button></td>        
</form>

<h2>Users List</h2>
<table border='1' cellpadding='10' cellspacing='0'>
    <tr>
        <th>User ID</th>
        <th>UserPassword</th>
        <th>Name</th>
        <th>Email</th>
        <th>User Type</th>
    </tr>
    <?php foreach($users as $user):?>    
    <tr>
        <td><?= $user["UserId"]?></td>
        <td><?= $user["UserPassword"]?></td>
        <td><?= $user["UserName"]?></td>
        <td><?= $user["UserEmail"]?></td>
        <td><?= $user["UserType"]?></td>
    </tr>
    <?php endforeach?>
</table>

<h2>Add User</h2>
<form action="admin.php" method="GET">
    <table>
        <tr>
            <td><label for="UserName">Full Name:</label></td>
            <td><input type="text" name="UserName" id="UserName" required></td>
        </tr>
        <tr>
            <td><label for="UserEmail">Email:</label></td>
            <td><input type="text" name="UserEmail" id="UserEmail" required></td>
        </tr>
        <tr>
            <td><label for="UserType">User Type:</label></td>
            <td>
                <select name="UserType" id="UserType">
                    <option value="ADM">Admin</option>
                    <option value="UNT">Unit</option>
                    <option value="USR">User</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="UserId">Username:</label></td>
            <td><input type="text" name="UserId" id="UserId" required></td>
        </tr>
        <tr>
            <td><label for="UserPassword">UserPassword:</label></td>
            <td><input type="password" name="UserPassword" id="UserPassword" required></td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="adduser" value="1">Add User</button>
            </td>
        </tr>
    </table>
</form>
<?php require("footer.php")?>