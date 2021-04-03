<?php
    session_start();
    require 'connections/dbconnect.php';
    //echo $_SESSION['userid'];

    if (isset($_POST['sendtheMessage'])) {
        
       // <!--Checking number of messages before send-->

        $sendersid = $_SESSION['userid'];
        $receiversid = 12;
        $usermessage = mysqli_real_escape_string($connect, $_POST['themessage']);

        $sentMSql = "SELECT * FROM themessaging WHERE sendersid=?;";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sentMSql)) {
            header ("Location: refresh.php?error=unable-to-get-sent-msgs");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "i", $sendersid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultMSentStats1 = mysqli_stmt_num_rows($stmt);
        }

        //sending the message
        $messageSql = "INSERT INTO themessaging (sendersid, receiversid, themessage) VALUES (?,?,?);";
        $stmt = mysqli_stmt_init($connect);
         if (!mysqli_stmt_prepare($stmt, $messageSql)) {
            header ("Location: refresh.php?error=messagenotsent");
            exit();
         }
         else {
                mysqli_stmt_bind_param($stmt, "iis", $sendersid, $receiversid, $usermessage);
                mysqli_stmt_execute($stmt);
               // header ("Location: liveChat.php");
         }
        
        //Checking number of messages after send
        $ifSentMSql = "SELECT * FROM themessaging WHERE sendersid=?;";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $ifSentMSql)) {
            header ("Location: refresh.php?error=unable-to-get-sent-msgs");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "i", $sendersid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultMSentStats2 = mysqli_stmt_num_rows($stmt);
        }

                if ($resultMSentStats2 - $resultMSentStats1 == 0) {
                    $_SESSION['senderror'] = 'Message not Sent';
                    
                    //header ("Location: myChatBox.php");
                }
                elseif ($resultMSentStats2 - $resultMSentStats1 == 1) {
                
                    $_SESSION['sendsuccess'] = 'Message Sent';
                    
                    //header ("Location: myChatBox.php");
                }

        
        mysqli_stmt_close($stmt);
        mysqli_close($connect);
    }
    else {
        header ("Location: refresh.php?error=came-here-without-using-button");
        exit();
    }
   
?>