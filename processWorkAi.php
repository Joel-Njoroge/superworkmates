<?php
    if (isset($_POST['theUpdate'])) {
       // $theEmpState = $_POST['theEmpState'];
        if (isset($_POST['empSt'])) {
            $errorEmpty = false;
            session_start();
            
                $uid = $_SESSION['userid'];
                require_once 'connections/dbconnect.php';

                $eStatus = mysqli_real_escape_string($connect, $_POST['empSt']);
                $updateEmpSt = "UPDATE theusers SET theEmpStatus =? WHERE id = ?;";
                $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $updateEmpSt)) {
                    echo "Sorry, Connection Error";
                    exit();
                    }
                    else {
                        mysqli_stmt_bind_param($stmt, "ss", $eStatus, $uid);
                        mysqli_stmt_execute($stmt);
                        echo '<span class="form-success">Cool</span>';
                       // header("Location:jobCentre.php"); //Funny behavior there. 
                    }
            
        } else {
            echo '<span class="form-error">Which of the above do you consider yourself..?</span>';
            $errorEmpty = true;
        }
    } elseif (isset($_POST['workOp'])) {
        $errorUnselectP = false;
        $errorUnselectS = false;
        $errorEmptyWC = false;

            if (isset($_POST['oP'])) {
                
                if (isset($_POST['eS'])) {
                        
                        if (!empty($_POST['wT']) && ($_POST['wC'])) {
                           
                        //echo 'Cool';
                                session_start();
                                require_once 'connections/dbconnect.php';
                                $uid = $_SESSION['userid'];
                                $jobName = mysqli_real_escape_string($connect, $_POST['wT']);
                                $jobLove = mysqli_real_escape_string($connect, $_POST['oP']);
                                $theEmployer = mysqli_real_escape_string($connect, $_POST['wC']);
                                $theEStatus = mysqli_real_escape_string($connect, $_POST['eS']);
                            
                                $saveJob = "INSERT INTO thejobshave (theuserid, thejobname, workLove, employer, empState) VALUES (?,?,?,?,?);";
                                $stmt = mysqli_stmt_init($connect);
                                if (!mysqli_stmt_prepare($stmt, $saveJob)) {
                                    echo "Sorry, Connection Error - Registering Job";
                                    exit();
                                    }
                                    else {
                                        mysqli_stmt_bind_param($stmt, "issss", $uid, $jobName, $jobLove, $theEmployer, $theEStatus);
                                        mysqli_stmt_execute($stmt);
                                       // echo '<span class="form-success">Job Registration Successful</span>'; // No need as the divs content is replaced on reload called by jQuery on script below
                                    // header("Location:jobCentre.php"); //Funny behavior there. 
                                    }
                        } else {
                            echo '<span class="form-error">Please fill all fields...</span>';
                            $errorEmptyWC = true;
                        }
                } else {
                    echo '<span class="form-error">Please select one of the above...</span>';
                    $errorUnselectS = true;
                }
            }
            else {
                echo '<span class="form-error">Please select one of the above...</span>';
                $errorUnselectP = true;
            }
    } elseif (isset($_POST['uwJob'])) {
        $errorNotChoosen = false;
        //echo 'Fab <br>'.$userJob;
        $userJob = $_POST['uwJob'];
        echo $userJob;
        echo '<br> Fabulous';
    }
    else {
        echo '<span class="form-error">There was an error...</span>';
    }
?>
<script>
    $("#jobState").removeClass("input-error");
    $("#theJobCentre").removeClass("success-much");

    var errorEmpty = "<?php echo "$errorEmpty" ?>";

    if (errorEmpty == true) {
        $("#jobState").addClass("input-error");
    }
    if (errorEmpty == false) {
        $(document).ready(function() {
            $("#theJobCentre").load("jobCentre.php");   
         });
         $("#theJobCentre").addClass("success-much");
    }
</script>
<script>
    $(".opinions").removeClass("input-error");
    $(".options").removeClass("successful");
    $(".jInput").removeClass("successful");
    $("#theJobCentre").removeClass("successful");
    
    var errorUnselectP = "<?php echo "$errorUnselectP"; ?>";
    var errorUnselectS = "<?php echo "$errorUnselectS"; ?>";
    var errorEmptyWC = "<?php echo "$errorEmptyWC"; ?>";

    if (errorUnselectP == true) {
        $(".opinions").addClass("input-error");
    }
    if (errorUnselectS == true) {
        $(".options").addClass("input-error");
    }
    if (errorEmptyWC == true) {
        $(".jInput").addClass("input-error");
    }
    if (errorUnselectP == false && errorUnselectS == false && errorEmptyWC == false) {
        $(document).ready(function() {
            $("#theJobCentre").load("jobCentre.php");
            $("#theJobCentre").addClass("successful");
            $(".success").html("New Job Registered");
         });
    }
</script>
<script>
    /*
  //  $("#workLike").removeClass("input-error");
    $("#theJobCentre").removeClass("successful");

    var errorNotChoosen = "<?php //echo "$errorNotChoosen";?>";

   // if (errorNotChoosen == true) {
     //   $("#workLike").addClass("input-error");
    //}
   if (errorNotChoosen == false) {
        $(document).ready(function() {
            $("#theJobCentre").load("jobCentre.php");   
         });
         $("#theJobCentre").addClass("successful");
    }
    */
</script>