<?php require("functions/functions.php")?>
<?php 
    $tasks = query("SELECT * FROM tasks ORDER BY TaskId");
    $users = query("SELECT * FROM users ORDER BY UserName");
    if(isset($_POST["submit"])){
        
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        }
       
        
       
    }
?>
<?php require("header.php")?>
<h1>Unit</h1>
<h2>Tasks</h2>
    <table border='1' cellpadding='10' cellspacing='0'>
        <tr>
            <th>Task ID</th>
            <th>Excecutor</th>
            <th>Task Name</th>
            <th>Due Date</th>
            <th>Type</th>
            <th>Description</th>
            <th>Approval</th>
            <th>Status</th>
        </tr>
        <?php foreach($tasks as $task):?>
            <tr>
                <td><?= $task["TaskId"]?></td>
                <td><?= $task["TaskExcecutor"]?></td>
                <td><?= $task["TaskName"]?></td>
                <td><?= $task["TaskDate"]?></td>
                <td><?= $task["TaskType"]?></td>
                <td><?= $task["TaskDescription"]?></td>
                <?php if($task["TaskApprove"] == 1):?>
                    <td>Accepted</td>
                <?php elseif($task["TaskApprove"] == 0):?>
                    <td>Declined</td>
                <?php elseif($task["TaskApprove"] == 2):?>
                    <td><button>Accept</button> <button>Decline</button></td>        
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
    
    <h2>Permintaan</h2>
    <form border='1' cellpadding='10' cellspacing='0' action="unit.php" method="POST">
        <table>
            <tr>
                <td><label for="TaskId">TaskId:</label></td>
                <td><input type="text" name="TaskId" id="TaskId"></td>
            </tr>
            <tr>
                <td><label for="UnitOwner">Unit Owner:</label></td>
                <td><input type="text" name="UnitOwner" id="UnitOwner"></td>
            </tr>
            <tr>
                <td><label for="TaskName">Task Name:</label></td>
                <td><input type="text" name="TaskName" id="TaskName"></td>
            </tr>
            <tr>
                <td><label for="TaskDate">Due Date:</label></td>
                <td><input type="date" name="TaskDate" id="TaskDate"></td>
            </tr>
            <tr>
                <td><label for="TaskType">Type:</label></td>
                <td><input type="text" name="TaskType" id="TaskType"></td>
            </tr>
            <tr>
                <td><label for="TaskDescription">Description:</label></td>
                <td><input type="text" name="TaskDescription" id="TaskDescription"></td>
            </tr>
            <tr>
                <td><label for="TaskExcecutor">Excecutor:</label></td>
                <td><input type="text" name="TaskExcecutor" id="TaskExcecutor"></td>
            </tr>
            <tr>
                <td><label for="TaskApprove">Approve:</label></td>
                <td><input type="text" name="TaskApprove" id="TaskApprove"></td>
            </tr>
            <tr>
                <td><label for="TaskDone">Status:</label></td>
                <td><input type="text" name="TaskDone" id="TaskDone"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Add</button></td>
            </tr>
        </table>
    </form>

<?php require("footer.php")?>