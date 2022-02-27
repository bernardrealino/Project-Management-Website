<?php 
    // connect
    $conn = mysqli_connect("localhost", "root", "", "administration");

    function addUser($query){
        global $conn;
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function addTask($query){
        global $conn;
        $UnitOwner = htmlspecialchars($query["UnitOwner"]);
        $TaskName = htmlspecialchars($query["TaskName"]);
        $TaskDate = htmlspecialchars($query["TaskDate"]);
        $TaskType = htmlspecialchars($query["TaskType"]);
        $TaskDescription = htmlspecialchars($query["TaskDescription"]);
        $TaskExcecutor = htmlspecialchars($query["TaskExcecutor"]);
        // $TaskApprove = htmlspecialchars($query["TaskApprove"]);
        $TaskApprove = 2;
        // $TaskDone = htmlspecialchars($query["TaskDone"]);
        $TaskDone = 0;

        $query = "INSERT INTO tasks VALUES (
            '',
            '$UnitOwner',
            '$TaskName',
            '$TaskDate',
            '$TaskType',
            '$TaskDescription',
            '$TaskExcecutor',
            '$TaskApprove',
            '$TaskDone'
        )";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
        
    }

    function approveAccept($query){
        global $conn;
        mysqli_query($conn, $query);
    }

    if (isset($_GET['logout'])){
        header("Location: logout.php");
    }
?>