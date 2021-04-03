    <div class="bb">

        <!--Upload Profile Picture or Show Profile Picture-->
        <?php
        $uid = $_SESSION['userid'];
        include_once 'connections/dbconnect.php';
        if(isset($_SESSION['username']))
        $getprofpic = "SELECT profpic FROM theusers WHERE id = '$uid'";
        $query = mysqli_query ($connect, $getprofpic);
        $result = mysqli_fetch_array($query);
        $imagename=$result['profpic'];
        ?>
        <div class="profileimage">
            <img src="<?php echo $imagename;?>" alt="No Image Found">
        </div>
        <!--log out button-->
        <!--
        <form action="logout.php" method="post">
            <button type="submit" name="logout">Log Out</button>
        </form>
        <br>
        -->
        <!--end of log out button-->
        <?php
        if (isset($_SESSION['error'])) {
        ?>
<p style= "color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></p>
        <?php
        }
        ?>
        <?php
        if ($result['profpic'] == 'profileimages/user.png') {
        ?>
        <h4 id = "closeOpenForm" style="cursor: pointer;" onclick="openUploadForm()">Upload Profile Picture</h4>
        <form id="formUploadProfilePic" action="getimage.php" method="POST" enctype="multipart/form-data" class="hide">
            <input type="file" name="file"> <br> <br>
            <button type="submit" name="submitnow">Upload</button>
        </form>
        <?php
        }else{
        ?>

            <h4 class="p-pic">Profile Picture</h4>          

            <div id="profLikeButtons">
                <h4>Do you like your profile picture?</h4>
                <div> <button id="bYes">Yes</button> <button id="bNo"> No </button> </div>
            </div>
            <div class="change-prof-pic">
                <h4 id = "closeOpenForm" style="cursor: pointer; font-weight: bold" onclick="openChangeForm()">Change Profile Picture</h4>
                <form id="formChangeProfilePic" action="getimage.php" method="POST" enctype="multipart/form-data" class="hide">
                    <input type="file" name="file"> <br> <br>
                    <button type="submit" name="submitnow">Change</button>
                </form>
            </div>

            <div class="cool-pic"><h4> Cool </h4></div>
        <?php
        }
        ?>
    </div> <!--end of class bb-->

<script>
function openUploadForm(){
    document.getElementById('formUploadProfilePic').classList.toggle('hide');
}
function openChangeForm(){
    document.getElementById('formChangeProfilePic').classList.toggle('hide');
}
function changeBackground(color){
    document.querySelectorAll('#closeOpenForm')[0].style.color=color;
    document.querySelectorAll('#closeOpenForm')[1].style.color=color;
}
</script>