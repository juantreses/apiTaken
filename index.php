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
