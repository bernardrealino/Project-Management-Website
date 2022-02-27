<?php 
    // connect
    $conn = mysqli_connect("localhost", "root", "", "administration");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($query){
        global $conn;
        $TaskId = htmlspecialchars($query["TaskId"]);
        $UnitOwner = htmlspecialchars($query["UnitOwner"]);
        $TaskName = htmlspecialchars($query["TaskName"]);
        $TaskDate = htmlspecialchars($query["TaskDate"]);
        $TaskType = htmlspecialchars($query["TaskType"]);
        $TaskDescription = htmlspecialchars($query["TaskDescription"]);
        $TaskExcecutor = htmlspecialchars($query["TaskExcecutor"]);
        $TaskApprove = htmlspecialchars($query["TaskApprove"]);
        $TaskDone = htmlspecialchars($query["TaskDone"]);

        $query = "INSERT INTO tasks VALUES (
            '$TaskId',
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
?>