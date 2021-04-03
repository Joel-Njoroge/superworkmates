<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        $(document).ready(function(){
            $("#jobState").submit(function(event){
                event.preventDefault();
                var theEmpState = $(".emp").val();
                var theUpdate = $("#updateEmp").val();
                var empSt = $(".emp:checked").val();
                $(".emp-response").load("processWorkAi.php", {
                    theEmpState: theEmpState,
                    theUpdate: theUpdate,
                    empSt: empSt
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#workLike").submit(function(event){
                event.preventDefault();
                var workOp = $("#workOp").val();
                var wT = $("#workType").val();
                var wC = $("#workCo").val();
                var eS = $(".eSt:checked").val();
                var oP = $(".jOpinion:checked").val();
                $(".wor-response").load("processWorkAi.php", {
                    workOp: workOp,
                    wT:wT,
                    wC:wC,
                    eS:eS,
                    oP: oP
                });
            });
        });
    </script>
     <script>
        $(document).ready(function(){
            $("#whichJob").submit(function(event){
                event.preventDefault();
              //  $('.uKazi').each(function() {
                var uwJob = $(".uKazi:focus").val();
                $(".uJob-response").load("processWorkAi.php", {
                    uwJob: uwJob
                });
              //  });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
                $("#moreJobs").click(function() {
                $("#otherJob").show();
                $("#moreJobs").addClass("hide");
            });
                $("#noMoreJobs").click(function(){
                $("#otherJob").hide();
                $("#moreJobs").removeClass("hide");
            });
        });
    </script>
</head>

<body>
<?php
session_start();  
if (!isset($_SESSION['username'])) {echo'
    <button onclick="login()"> Please Sign In to Continue </button>
    ';
} else {
$uid = $_SESSION['userid'];
require_once 'connections/dbconnect.php';
//check employment status
$getEmpStatus = "SELECT theEmpStatus FROM theusers WHERE id = '$uid';";
$query = mysqli_query ($connect, $getEmpStatus);
$result = mysqli_fetch_array($query);
$eStatus=$result['theEmpStatus'];

if ($eStatus == "blank") {
    echo '
    <h5>You are :_ </h5>
    <form action="processWorkAi.php" name="employmentState" method="post" id="jobState">
            <input type="radio" id="emp1" name="employment" value="Employed" class="emp">
        <label for="employed">Employed</label>
        <br>
            <input type="radio" id="emp2" name="employment" value="Unemployed" class="emp">
        <label for="not-employed">Unemployed</label>
        <br>
            <input type="radio" id="emp3" name="employment" value="Self-Employed" class="emp">
        <label for="self-employed">Self Employed</label>
        <br>
            <input type="radio" id="emp4" name="employment" value="Student" class="emp">
        <label for="student">A Student</label>
        <br>
            <input type="radio" id="emp5" name="employment" value="Retired" class="emp">
        <label for="retired">Retired</label>
        <br>
        <button type="submit" name="updateState" id="updateEmp">Next</button>
        <br>
        <p class="emp-response"></p>
    </form>'
;} elseif ($eStatus == "Employed") {

                    $ifJobRegistered = "SELECT * FROM thejobshave WHERE theuserid =?;";

                    $stmt = mysqli_stmt_init($connect);
                    if (!mysqli_stmt_prepare($stmt, $ifJobRegistered)) {
                        echo "Connection Error";
                        exit();
                        }
                    else {
                        mysqli_stmt_bind_param($stmt, "i", $uid);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultJobs = mysqli_stmt_num_rows($stmt);
                    }

    if ($resultJobs == 0) {
        echo '<h5>You registered as Employed</h5>';
        echo '<strong>Tell us about your Job</strong>';
        /*echo '<form action="processWorkAi.php" name="whichJob" method="post" id="whichJob">
                <label for="uJob">Which work do you do..?</label>
                    <input type="submit" id ="uJob1" name="uJob" value="Programmer" class="uKazi">
                    <input type="submit" id ="uJob2" name="uJob" value="Farmer" class="uKazi">
                
                <br>
                <p class="uJob-response"></p>
            </form>';*/

        echo '<form action="processWorkAi.php" name="workLike" method="post" id="workLike">
                    <div class="jInput">
                    <label for="workType">Which work do you do..?</label>
                        <input type="text" id ="workType" name="workType" placeholder="e.g. Electrician" class="jText" required>
                    <label for="workCo">Name of your Employer..?</label>
                        <input type="text" id ="workCo" name="workCo" placeholder="e.g. Climax Electricians" class="jText" required>
                    </div>
                    <br>
                    <span>Employment Basis</span>
                    <br>
                    <div class="options">
                    <input type="radio" id="optionA" name="option" value="Permanently-Employed" class="eSt">
                        <label for="optionA">Permenently Employed</label>
                    <br>
                    <input type="radio" id="opinionB" name="option" value="Contract-Employment" class="eSt">
                        <label for="opinionB">Employed on Contract</label>
                    <br>
                    <input type="radio" id="opinionC" name="option" value="Volunteer" class="eSt">
                        <label for="opinionC">Volunteer</label>
                    <br>
                    <input type="radio" id="opinionD" name="option" value="Casual-Employment" class="eSt">
                        <label for="opinionD">Casual Employment</label>
                    <br>
                    <input type="radio" id="opinionE" name="option" value="Not-Sure" class="eSt">
                        <label for="opinionE">Not Sure</label>
                    </div>
                    <br>
                    <span>Do you like your job? </span>
                    <br>
                    <div class="opinions">
                        <input type="radio" id="opinion5" name="opinion" value="Yes-Favourite" class="jOpinion">
                    <label for="opinion">Yes, I love my job</label>
                    <br>
                        <input type="radio" id="opinion4" name="opinion" value="Yes-Normal" class="jOpinion">
                    <label for="opinion">Yes, I like my job</label>
                    <br>
                        <input type="radio" id="opinion3" name="opinion" value="No" class="jOpinion">
                    <label for="opinion">No, I do not like my job</label>
                    <br>
                        <input type="radio" id="opinion2" name="opinion" value="Getting-Along" class="jOpinion">
                    <label for="opinion">I am getting along</label>
                    <br>
                        <input type="radio" id="opinionX" name="opinion" value="New-to-Job" class="jOpinion">
                    <label for="opinion">I am new to the Job</label>
                    <br>
                        <input type="radio" id="opinion1" name="opinion" value="Hate-Job" class="jOpinion">
                    <label for="opinion">I hate the job</label>
                    </div>
                    <br>
                    <button type="submit" name="workOp" id="workOp">Next</button>
                    <br>
                    <p class="wor-response"></p>
            </form>';
    } elseif ($resultJobs >= 1) {
        echo '<span>You have registered '.$resultJobs .' job(s),</span><br>';
        echo '<p>Is there any other job you would like to register now?<p>';
        echo '<div class="thebuttons"> <button id="moreJobs">Yes</button> <button id="noMoreJobs"> No </button> </div>';
        echo '<br>';
        echo '
        <div id="otherJob">
            <form action="processWorkAi.php" name="workLike" method="post" id="workLike">
                <div class="jInput">
                <label for="workType">Which work do you do..?</label>
                    <input type="text" id ="workType" name="workType" placeholder="e.g. Electrician" class="jText" required>
                <label for="workCo">Name of your Employer..?</label>
                    <input type="text" id ="workCo" name="workCo" placeholder="e.g. Climax Electricians" class="jText" required>
                </div>
                <br>
                <span>Employment Basis</span>
                <br>
                <div class="options">
                <input type="radio" id="optionA" name="option" value="Permanently-Employed" class="eSt">
                    <label for="optionA">Permenently Employed</label>
                <br>
                <input type="radio" id="opinionB" name="option" value="Contract-Employment" class="eSt">
                    <label for="opinionB">Employed on Contract</label>
                <br>
                <input type="radio" id="opinionC" name="option" value="Volunteer" class="eSt">
                    <label for="opinionC">Volunteer</label>
                <br>
                <input type="radio" id="opinionD" name="option" value="Casual-Employment" class="eSt">
                    <label for="opinionD">Casual Employment</label>
                <br>
                <input type="radio" id="opinionE" name="option" value="Not-Sure" class="eSt">
                    <label for="opinionE">Not Sure</label>
                </div>
                <br>
                <span>Do you like your job? </span>
                <br>
                <div class="opinions">
                    <input type="radio" id="opinion5" name="opinion" value="Yes-Favourite" class="jOpinion">
                <label for="opinion">Yes, I love my job</label>
                <br>
                    <input type="radio" id="opinion4" name="opinion" value="Yes-Normal" class="jOpinion">
                <label for="opinion">Yes, I like my job</label>
                <br>
                    <input type="radio" id="opinion3" name="opinion" value="No" class="jOpinion">
                <label for="opinion">No, I do not like my job</label>
                <br>
                    <input type="radio" id="opinion2" name="opinion" value="Getting-Along" class="jOpinion">
                <label for="opinion">I am getting along</label>
                <br>
                    <input type="radio" id="opinionX" name="opinion" value="New-to-Job" class="jOpinion">
                <label for="opinion">I am new to the Job</label>
                <br>
                    <input type="radio" id="opinion1" name="opinion" value="Hate-Job" class="jOpinion">
                <label for="opinion">I hate the job</label>
                </div>
                <br>
                <button type="submit" name="workOp" id="workOp">Next</button>
                <br>
                <p class="wor-response"></p>
            </form>
    </div>';

    }
   
}
elseif ($eStatus == "Unemployed") {
    echo '<h5>You registered as Unemployed</h5>';
    echo '<span> Would you like to get a job or start? </span>';
}
elseif ($eStatus == "Self-Employed") {
    echo '<h5>You registered as Self-Employed</h5>';
    echo 'Congratulations! Are you Employing..?';
}
elseif ($eStatus == "Student") {
    echo '<h5>You registered as A Student</h5>';
    echo 'Are you looking for internship...?';
}
elseif ($eStatus == "Retired") {
    echo '<h5>You registered as Retired</h5>';
    echo 'Would you like to get mentor or train someone..?';
}
}
?>
</body>
</html>
