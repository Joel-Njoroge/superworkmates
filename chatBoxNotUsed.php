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
<!--
    <script>
                $(document).ready(function() {
                    $("#refresh").click(function() {
                    $("#chatBox").load("myChatBox.php");
                    });
                });
    </script>
            -->
    <script>
        $(document).ready(function(){
            $("#whichJob").submit(function(event){
                event.preventDefault();
                $('.uKazi').each(function() {
                var uwJob = $(this).val();
                $(".uJob-response").load("processWorkAi.php", {
                    uwJob: uwJob
                });
                });
            });
        });
    </script>
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
<?php
if (isset($_SESSION['senderror'])) {
        ?>
        <small style= "color:red; background-color:black; padding:3px; border-radius:10%;"><?php echo $_SESSION['senderror']; unset($_SESSION['senderror']);?></small>
        <?php
        }
elseif (isset($_SESSION['sendsuccess'])) {
    ?>
    <small style= "color: chartreuse; background-color:black; padding:3px; border-radius:10%;"><?php echo $_SESSION['sendsuccess']; unset($_SESSION['sendsuccess']);?></small>
    <?php
    }
        ?>
<!--The Form -->
    <form action="processPostChat.php" name="chatMessanger" method="post" id="theChatBox">
        <label for="message">
            <textarea type="text" name="themessage" rows="4" id="theTextArea"></textarea>
        </label>
        <button type="submit" name="sendtheMessage" id="refresh">Send</button>
        <p class="form-response"></p>
    </form>

</div>
<!--
    <iframe name="noreload" style="display:none;"></iframe>
    <form action="processPostChat.php" name="chatMessanger" method="post" target="noreload" id="theChatBox">
        <label for="message">
            <textarea type="text" name="themessage" rows="4" id="theTextArea"></textarea>
        </label>
        <button type="submit" value="submit" name="sendtheMessage" id="refresh">Send</button>
        <p class="form-response"></p>

    </form>
-->

</body>
</html>