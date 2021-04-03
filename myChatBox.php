<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/chatboxstyles.css">
<script src="bootstrap/jquery/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#theChatBox").submit(function(event){
                event.preventDefault();
                var theText = $("#theTextArea").val();
                var theSubmit = $("#refresh").val();
                $(".form-response").load("postChat.php", {
                    theText: theText,
                    theSubmit: theSubmit
                });
            });
        });
    </script>
  
</head>

<body>

<div class="messagehere">
    
<!--The Form -->
    <form action="processPostChat.php" name="chatMessanger" method="post" id="theChatBox">
        <label for="message">
            <textarea type="text" name="themessage" rows="4" id="theTextArea"></textarea>
        </label>
        <button type="submit" name="sendtheMessage" id="refresh">Send</button>
        <p class="form-response"></p>
    </form>

</div>

</body>
</html>