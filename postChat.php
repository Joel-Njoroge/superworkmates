<?php
    if (isset($_POST['theSubmit'])) {
        $theMessage = $_POST['theText'];

        $errorEmpty = false;

        if (empty($theMessage)) {
            echo '<span class="form-error">Write something to send...</span>';
            $errorEmpty = true;
        }
        else {
            //Actually send the message
            session_start();
            require 'connections/dbconnect.php';
            $sendersid = $_SESSION['userid'];
            $receiversid = 12;
            $usermessage = mysqli_real_escape_string($connect, $_POST['theText']);

                $messageSql = "INSERT INTO themessaging (sendersid, receiversid, themessage) VALUES (?,?,?);";
                $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $messageSql)) {
                    header ("Location: refresh.php?error=messagenotsent");
                    exit();
                }
                else {
                        mysqli_stmt_bind_param($stmt, "iis", $sendersid, $receiversid, $usermessage);
                        mysqli_stmt_execute($stmt);
                        echo '<span class="form-success">Message sent</span>';
                }
        }
    }
    else {
        echo '<span class="form-error">There was an error...</span>';
    }
?>
<script>
    $("#theTextArea").removeClass("input-error");

    var errorEmpty = "<?php echo "$errorEmpty" ?>";

    if (errorEmpty == true) {
        $("#theTextArea").addClass("input-error");
    }
    if (errorEmpty == false) {
        $("#theTextArea").val("");
    }
</script>