<!DOCTYPE html>
<html>
<head>
    <title>Taken via API</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/opmaak.css">
</head>

<body>
<div class="list">
    <h1 class="header">Tasklist</h1>
    <ul class="list-unstyled items" id="tasks">
<?php
require_once "service/Taken.php";
require_once "lib/viewFunctions.php";
$taskService = new Taken();
$data = $taskService->getTaken();

$todo = loadTemplate("taak");

foreach ( $data as $key => $val )
{

    $mark = "<form action='lib/done.php' method='post' class='mark'>
                <input type=\"hidden\" id=\"formname\" name=\"formname\" value=\"done\">
                <input type=\"hidden\" id=\"tablename\" name=\"tablename\" value=\"todoItem\">
                <input type='hidden' id='itm_id' name='itm_id' value=" . $data[$key]['itm_id'] . ">
                <input type='submit' name='markdone' value='Mark as done' class='done-button'></form>";

    $delete = "<form action='lib/delete.php' method='post' class='mark'>
                <input type=\"hidden\" id=\"formname\" name=\"formname\" value=\"delete\">
                <input type=\"hidden\" id=\"tablename\" name=\"tablename\" value=\"todoItem\">
                <input type='hidden' id='itm_id' name='itm_id' value=" . $data[$key]['itm_id'] . ">
                <input type='submit' name='delete' value='Delete' class='done-button'></form>";


    if($data[$key]['taa_status'] == 1){
        $data[$key]['done'] = "done";
        $data[$key]['delete'] = $delete;
    }else{
        $data[$key]['done'] = " ";
        $data[$key]['delete'] = $mark;
    }

}

print replaceContent($data, $todo);
?>
    </ul>
    <form action="lib/add.php" method="post" class="item-add">
        <div class="to-add">
            <label for="taa_omschr"></label>
            <input type="text" name="taa_omschr" id="taa_omschr" placeholder="Type a new task here" class="input" autocomplete="off" required>
            <label for="taa_datum"></label>
            <input type="date" name="taa_datum" id="taa_datum" class="input" autocomplete="off" required>
        </div>
        <input type="submit" name="addtask" value="Add" class="submit">
    </form>
</div>
<script src="js/main.js"></script>
</body>
</html>
