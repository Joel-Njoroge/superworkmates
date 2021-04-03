<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="bootstrap/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
                setInterval(function(){
                $('#online-Status-Sender').load('autosender.php');
                }, 10000) /* time in milliseconds (ie 1000 = 1 seconds)*/
    </script>
    <script>
                setInterval(function(){
                $('#online-Status-Receiver').load('autoreceiver.php');
                }, 12000) /* time in milliseconds (ie 1000 = 1 seconds)*/
    </script>
    <script>
                setInterval(function(){
                $('#chatChecker').load('myChatChecker.php');
                }, 1000) /* time in milliseconds (ie 1000 = 1 seconds)*/
    </script>

    <script>
                window.addEventListener("load", function(event) {
                $('#chatBox').load('myChatBox.php');
                });
    </script>


<title>Live Chat</title>
</head>

<body>
    
<?php
 include 'parts/header.php';
?>

<!--sender part-->
<div class="sender">
    <h4>Sender Part</h4>
        <div id="online-Status-Sender">

        </div>
    
</div>
<!--receiver part-->   
<div class="receiver">
    <h4>Receiver Part</h4>

        <div id="online-Status-Receiver">
        
        </div>

</div>

<!--Chat Checker-->
<div class="chatting">
        <h4>Chat Box</h4>
        
            <div id="chatChecker">
            
            </div>

<!--Chat Box-->
            <div id="chatBox">
            
            </div>
            
        
</div>


<?php

include_once 'parts/footer.php';

?>

</body>
</html>