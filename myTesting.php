<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="bootstrap/jquery/jquery-3.2.1.min.js"></script>

<script>
        $('#refresh'). click(function() {
            $("#clearTextArea").trigger('reset');
        });

</script>
<script>
        $(document).ready(function() {
            $("#clickMe").click(function() {
            $("#chatBox").load("myChatBox.php");
            });
        });
</script>
</head>
<body>
    
</body>
</html>


<button id="refresh">Refresh</button>

Mambo poa poa
<?php
$tr= random_bytes(5);
echo $tr;
?>
<br>
<button id="clickMe">Click Me</button>
<div id="chatBox">
    
</div>

