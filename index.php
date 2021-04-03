<!DOCTYPE html>
<html lang="eng">
  
 <head>
    <title> Superworkmates: You Don't Have To Work Alone! </title>
    <link rel="stylesheet" href="css/mainstyles.css">
    <link rel="stylesheet" href="css/workstyles.css">
    

</head>

<body>
<?php
include_once 'parts/header.php';
// include_once 'home.html';
?>
      
<div class="body">
<!--Part 2-->
    <div class="sehemu2">
      <!--start of class a-->
      <div class="a" style="background-image:url(images/flower1.jpg);"> 
          <div class="welcome-text">
              <h2>Welcome<br>To<br>Superworkmates</h2>
              <h3>You Don't Have To Work Alone!</h3>
          </div>

          <div class="search-tab">
            <form>
              <input type="search" name="search-tab-input" id="search-tab-input" placeholder="Search Superworkmates">
            </form>

          </div>

          <div class="happening">
             <p class="search-results-tab">Results Here</p>

          </div>
      </div> <!--end of class a-->
      
      <!--start of class b-->
      <!--log in-->
      <div class="b"> 
          <div class="b-image">
            <img src="./images/slogo.png" alt="Superworkmates">
          </div>
<!-- New -- Log in or sign up -->

<?php

  if (isset ($_SESSION ['username'])) {
    include_once 'loggedin.php';
    
  }
  else {
   include_once 'loginorsignup.php';
  }
  ?>
      </div> <!-- end of class b-->

</div> <!--end of class sehemu 2-->

<hr>
<!--More About Superworkmates-->
<div class="s-more">
    <div class="superworkmates-more">
      <h4 class="swmh4">Who are Superworkmates</h4>
      <p>
      Every day we wake up to do something. It could be something personal, like watering your garden, something social, for instance visiting a friend, or something to do with our jobs, for example to prepare a delivery. Whatever it is, usually, we are up to something.
      </p>
      <p>
      By the end of the day we are happy when we have accomplished what we planned to do. Sometimes sad that we ran into a problem we were not able to solve as timely as we had expected, and so we didn’t accomplish the objective we had aimed at. And sometimes the feeling is neutral because we accomplished part of our objectives and realized that it requires a bit more (time, effort, skill etc.) to complete the rest.
      </p>
      <p>
      Whichever the case, it is always comforting, and even exciting, to have a workmate. Someone to work with, share ideas with, build something with, share experiences with and even celebrate with. It could be just one, a friend maybe, or the few you work with at your workplace, or many – for instance the workforce at a company.
      </p>
      <p>
      But, a real workmate is one who helps you accomplish your objectives. Someone with the same concern, someone who shares the same dream, someone ready and there to actively contribute, someone who is there for you both to work and grow with you, and also celebrate with you the achievements and lessons learnt along the way. We call that someone a Superworkmate.
      </p>
      <p>
      And we built the place for you to meet, work and celebrate with that Superworkmate. We call it,  <a href="#">The Superworkmates Community</a>. Because we believe that, in that good thing you are up to, you don’t have to work alone!
      </p>
      <p class="spantag" style="font-weight: bold;">
        | From the Pioneers of The Superworkmates Community 
      </p>
    </div>
</div>

<hr>

<!--Work Tabs-->
<?php
include_once 'worktabs.php';
?>

<hr>

<!--Part 3-->
<div class="part3"> 
  <div class="p3a">
    <div class="p3inner">
        <h2>Contact Us</h2> 
        <div class="p3atext">
          <p>Reach us on WhatsApp on +254 729 515 273 Or +254 758 826 552.</p>
          <p>Email us at <a href="mailto: support@superworkmates.com">support@superworkmates.com.</a> </p>
          <p>Visit us at Climax Electronics and Cyber, Ngorika.</p>
        </div>
      </div>
  </div>

  <div class="p3b">
    <div class="p3inner">
        <h2>About Us</h2>
        <div class="p3btext">
          <p>We believe that each of our expertise, knowledge and daily experiences put together productively are the builders of a better tomorrow.</p>
          <a href="about.php"> <button class="btn btn-warning">Read More <i class="fa fa-caret-right"></i><i class="fa fa-caret-right"></i></button> </a>
        </div>
    </div>
  </div>
  
</div>

<hr>
<!--The Superworkmates Community-->

<!--Part 4-->
<div class="part4">
  <div class="p4head">
      <h2>Trends</h2>
  </div>
<div class="carousel slide" data-ride="carousel" id="carousel_trends">
  <div class="carousel-inner">
  <div class="carousel-item active">
  <img src="images/flower1.jpg" alt="Image missing" class="d-block w-100">
  <div class="carousel-caption">
  <h3>Trend 1</h3>
  <p>Start Now. The future has began!</p>
  </div>
  </div>
  <div class="carousel-item">
  <img src="images/lights.jpg" alt="Image missing" class="d-block w-100">
  <div class="carousel-caption">
  <h3>Trend 2</h3>
  <p>For guidance on personal, business and social projects - Superworkmates is the place!</p>
  </div>
  </div>
  <div class="carousel-item">
  <img src="images/flower.jpg" alt="Image missing" class="d-block w-100">
  <div class="carousel-caption">
  <h3>Trend 3</h3>
  <p>Stronger Together!</p>
  </div>
  </div>
<!--carousel controls-->
<a href="#carousel_trends" class="carousel-control-next" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
<a href="#carousel_trends" class="carousel-control-prev" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
</div>

</div>

</div>

<div class="test">
<button onclick="login()"> Call Modal</button>
</div>

<!--footer-->
</div>

<?php
include_once 'parts/footer.php';
?>
