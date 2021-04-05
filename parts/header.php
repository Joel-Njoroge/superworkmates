<?php
session_start();
?>
<!DOCTYPE html>
<html lang="eng">
  
  <head>
      
      <link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
      <link rel="manifest" href="icons/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
              
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
            <meta charset="utf-8">
            <meta name= "description" content="This website provides methods of doing personal, business and social projects">
            <meta name="keywords" content="social projects, personal projects, business projects,how to, method, methods, workmates, superworkmates, collaborations on projects">
          <!-- <title>Superworkmates: You Don't Have To Work Alone! </title> -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
            <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="css/mainstyles.css">
            <link rel="stylesheet" href="css/workstyles.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="bootstrap/jquery/jquery-3.2.1.min.js"></script>

<script>
    $(document).ready(function(){
            $("#bYes").click(function() {
            $(".change-prof-pic").hide();
            $("#profLikeButtons").toggle();
            $(".cool-pic").show();
        });
            $("#bNo").click(function(){
            $(".change-prof-pic").show();
            $("#profLikeButtons").toggle();
            $("#closeOpenForm").css("color","rgba(255, 0, 102, 1)");
            $(".cool-pic").hide();
        });
        $(".p-pic").click(function(){
            $("#profLikeButtons").toggle();
            $(".cool-pic").hide();
            $("#openCloseForm").hide();
        });
        $("#openCloseForm").click(function(){
          $("#profLikeButtons").toggle();
        });
    });
</script>

  </head>

  <body>
    <!--getting user profile image-->
    <?php
if (isset ($_SESSION ['username'])) {
        $uid = $_SESSION['userid'];
        require_once 'connections/dbconnect.php';
        
        $getprofpic = "SELECT profpic FROM theusers WHERE id = '$uid'";
        $query = mysqli_query ($connect, $getprofpic);
        $result = mysqli_fetch_array($query);
        $imagename=$result['profpic'];

        $usersName = $_SESSION['username'];
}
        $Hi = "<strong>Hi'</strong>";
        ?>
       
<!--Top of page (header) -->
<div class="pagetop">

    <div class = "topbar">
        <div class = "top1">
            <div class = "logo">
              <a href="index.php"> <img src="SuperworkmatesSmallLogo.png" alt="Logo Not Found"> </a>
            </div>
          </div>

          <div class = "top2">
            <div class = "greeting">
              <h1 class="greeting-name"><strong>Superworkmates</strong></h1>
              <h4 class="greeting-phrase"><?php  if (isset ($_SESSION ['username'])) {echo $_SESSION ['username'] ."," ." ";}?>You Don't Have to Work Alone!</h4>
            </div>
          </div>

          <div class = "top3">
            <div class = "user-image" onclick="login()">
              <a href="<?php if (isset ($_SESSION ['username'])) {echo 'office.php';} else {echo '#';}?>">
                <div class="user-image-pic" style="background-image:url(<?php if (isset ($_SESSION ['username'])) {echo $imagename;} else {echo 'SuperworkmatesSmallLogo.png';} ?>); background-size:cover;"> </div>
              </a>
            </div>
          </div>
    </div> <!--end of class top bar -->
</div> <!--new end of class page top -->

<hr class="plainline">

<!--phone-menu nav-->
<div class="phone-nav-bar">

      <div class="phone-menu"> <div class="phone-nav-label">&#9776 Menu</div>
            <div class="phone-menu-nav">
                <div class="phone-menu-nav-items">
                      <div class="phone-nav-item"> <a href="index.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">home</i> Home </div> </a> </div>
                      <div class="phone-nav-item"> <a href="myOffice.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">work</i> My Office </div> </a> </div>
                      <div class="phone-nav-item"> <a href="liveChat.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">chat</i> Live Chat </div> </a> </div>
                      <div class="phone-nav-item"> <a href="pricelist.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">local_offer</i> Price List </div> </a> </div>
                      <div class="phone-nav-item"> <a href="equipments.php"> <div class = "phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">construction</i> Equipment </div> </a> </div>
                      <div class="phone-nav-item"> <a href="trends.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">timeline</i> Trends & Tech </div> </a> </div>
                      <div class="phone-nav-item"> <a href="about.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">contact_page</i> About Us </div> </a> </div>
                      <div class="phone-nav-item"> <?php if (isset ($_SESSION ['username'])) {echo '<a href="logout.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">account_circle</i> Sign Out </div> </a>';}
                      else {echo '<a href="#"> <div class="phone-menu-item" onclick="login()"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">account_circle</i> Sign In </div> </a>';}?> </div>
                </div>
            </div>
      </div> <!-- end of class phone-menu -->

      <div class="phone-user-image-title">
        <div class="icon-and-name">

          <div class="phone-user-title-side">
              <div class="user-title">
                  <?php if (isset ($_SESSION ['username'])) {echo $_SESSION ['username'];}
                  else {echo '<div class="check-in-modal" onclick="login()">Check In</div>';}?>
              </div>
          </div> <!-- end of class phone-user-title-side -->
          
          <div class="image-icon">
            <?php
                if (isset($_SESSION['username'])){
                  echo '<a href="office.php"> <div class="prof-icon-image" style="background-image:url('.$imagename.'); background-size:cover;">
                         </div> </a>' ;
                } else {
                  $sLogoSmall = "SuperworkmatesSmallLogo.png";
                  echo '<div class="prof-icon-image" style="background-image:url('.$sLogoSmall.'); background-size:cover;" onclick="login()">
                        </div>';
                }
                ?>
          </div> <!--end of class image-icon-->

        </div> <!--end of class icon-and-name-->
              <div class="phone-user-options-dropdown"> <!-- dropdown for log out and profile-->
                  <?php if (isset($_SESSION['username'])){ echo '
                    <div id="phone-acc-options">
                                <div class="acc-options-item"> <a href="myOffice.php"> Profile </a> </div>
                                <div class="mid-line"></div>
                                <div class="acc-options-item"> <a href="logout.php"> Sign Out </a> </div>
                    </div>
                  ';} else {echo '
                    <div id="phone-acc-options">
                            <div class="acc-options-item" onclick="login()"> Sign In </div>
                            <div class="mid-line"></div>
                            <div class="acc-options-item" onclick="register()"> Create Account </div>
                    </div>
                  ';}?>
                </div> <!-- end of class phone-user-options-dropdown -->
      </div> <!--end of class phone-user-image-title-->

</div> <!-- end of class phone-nav-bar -->

<!--navbar-->    
<div class = "navbar">
    <div class="navbar-in"> <a href="index.php"> <div class = "sehemu1"><i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">home</i> Home </div> </a> </div>
    <div class="navbar-in"> <a href="myOffice.php"> <div class = "sehemu1"><i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">work</i> My Office </div> </a> </div>
    <!-- <div class="navbar-in"> <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">build</i> Projects </div> </a> </div> -->
    <!-- <div class="navbar-in"> <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">groups</i> Workmates </div> </a> </div> -->
    <div class="navbar-in"> <a href="liveChat.php"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">chat</i> Live Chat </div> </a> </div>
    <div class="navbar-in"> <a href="pricelist.php"> <div class = "sehemu1">  <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">local_offer</i> Price List </div> </a> </div>
    <div class="navbar-in"> <a href="equipments.php"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">construction</i> Equipment </div> </a> </div>
    <!-- <div class="navbar-in"> <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">forum</i> Forums </div> </a> </div> -->
    <!-- <div class="navbar-in"> <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">class</i> Learn </div> </a> </div> -->
    <!-- <div class="navbar-in"> <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">tour</i> Places </div> </a> </div> -->
    <div class="navbar-in"> <a href="trends.php"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">timeline</i> Trends $ Tech </div> </a> </div>
    <?php if (isset($_SESSION['username'])){ echo '
    <div id="my-account"> <div class="navbar-in"> <a href="#"> <div class="sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">account_circle</i> '.$Hi. ' ' .$usersName .' </div> </a> </div>
          <div id="acc-options">
                      <div class="acc-options-item"> <a href="myOffice.php"> Profile </a> </div>
                      <div class="mid-line"></div>
                      <div class="acc-options-item"> <a href="logout.php"> Sign Out </a> </div>
          </div>
    </div>  <!-- end of class my-account -->
    ';} else echo '
    <div id="my-account"> <div class="navbar-in"> <a href="#"> <div class="sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">account_circle</i> My Account </div> </a> </div>
          <div id="acc-options">
                      <div class="acc-options-item" onclick="login()"> Sign In </div>
                      <div class="mid-line"></div>
                      <div class="acc-options-item" onclick="register()"> Create Account </div>
          </div>
    </div> <!-- end of class my-account -->
    ';?>
    <!-- <div class="navbar-in"> <a href="#" data-toggle="dropdown" >
                              <i class="fa fa-user" ></i> My Account
                              <div class="dropdown">
                                <ul class="dropdown-menu">
                                  <li class="dropdown-item" onclick="login()">Login</li>
                                  <li class="dropdown-divider"></li>
                                  <li class="dropdown-item" onclick="register()">Register</li>
                                </ul>
                              </div>
    </a> </div> -->
    
</div> <!-- end of class navbar -->

            <!--Old end of class pagetop was here-->

<!--Modal -->
    <div class="modal fade" id="modal_login" role="modal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
          <h3 class="text-center"></h3>
          </div>
          <div class="modal-body">
          <div class="row">
            <div class="container">
              <form action="" method="POST">
                <div class="form-group">
                 <label>Phone/Email</label>
                  <input type="text" name="email_phone" placeholder="Email/Phone" class="form-control">
                </div>
                <div class="form-group">
                 <label>Password</label>
                  <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="login"><i class="fa fa-sign-in"></i> Login</button>
                </div>
              </form>
            </div>
          </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_register">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    
