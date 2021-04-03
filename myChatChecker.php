<?php
session_start();
//include 'parts/header.php';
require 'connections/dbconnect.php';

if(isset($_SESSION['username'])) {

$usersid = $_SESSION['userid'];


$chatSql = "SELECT * FROM themessaging WHERE receiversid=?;";

$stmt = mysqli_stmt_init($connect);
if (!mysqli_stmt_prepare($stmt, $chatSql)) {
    header ("Location: refresh.php?error=unable-to-receive-message");
    exit();
    }
else {
    mysqli_stmt_bind_param($stmt, "i", $usersid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultChats = mysqli_stmt_num_rows($stmt);

    if ($resultChats > 0) {
        echo "You have ".$resultChats ." Messages in Total";

        $theChatsSql = "SELECT * FROM themessaging WHERE receiversid=? AND mReadStat=?;";

        $theMReadStatus = 0;

        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt, $theChatsSql)) {
            header ("Location: refresh.php?error=unable-to-receive-unread-message");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ii", $usersid, $theMReadStatus);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultUnreadChats = mysqli_stmt_num_rows($stmt);

            if ($resultUnreadChats > 0) {
                echo '<br>';
                echo 'Unread Messages are '.$resultUnreadChats .' in Total';

                //reading the messages now

                $theChatMessagesSql = "SELECT * FROM themessaging WHERE receiversid =?;";

                $stmt = mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($stmt, $theChatMessagesSql)) {
                    header ("Location: refresh.php?error=unable-to-read-unread-chat-message");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "i", $usersid);
                    mysqli_stmt_execute($stmt);
                    $resultAllChatMessages = mysqli_stmt_get_result($stmt);

                    while ($chatRow = mysqli_fetch_assoc($resultAllChatMessages)) {
                        
                        $theChatMessage = $chatRow['themessage'];
                        $theSendersId = $chatRow['sendersid'];

                        $theSendersNameSql = "SELECT * FROM theusers WHERE id =?;";

                        $stmt = mysqli_stmt_init($connect);
                        if(!mysqli_stmt_prepare($stmt, $theSendersNameSql)) {
                            header ("Location: refresh.php?error=unable-to-read-identity-of-sender");
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt, "i", $theSendersId);
                            mysqli_stmt_execute($stmt);
                            $resultUserId = mysqli_stmt_get_result($stmt);

                            while ($userRow = mysqli_fetch_assoc($resultUserId)) {
                                $theSender = $userRow['username'];
                            
                        echo "
                        <table>
                            <tr
                            <tr>
                                <td>
                                    <strong>$theSender</strong>
                                </td>
                                <td>
                                    $theChatMessage
                                </td>
                            </tr>
                        </table>
                        ";
                        }
                    }

                    }

                }
                //Mark Read Chats as read - code not written

            }
            else {
                echo '<br>You have no Unread Messages';
            }
        }


    }
    else {
        echo 'You have no message at the moment';
    }
}

} else {
    echo '<button onclick="login()"> Log In to Start Chatting </button>';
}

?>