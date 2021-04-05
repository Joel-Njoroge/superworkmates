<div class="bb">
  <h4>Sign In</h4>
  
  <div class="errortab">
      <?php
      
      if (isset ($_GET['error'])) {
              if ($_GET['error'] == "emptyfields") {
             echo '<p class="loginerror">Please fill in your <strong>email/phone</strong> and <strong>password</strong>.</p>';
          }
          elseif ($_GET['error'] == "passworderror") {
              echo '<p class="loginerror">Wrong<strong> password</strong>. <br>Please enter the <strong>correct</strong> password.</p>';
          }
          elseif ($_GET['error'] == "sqlerror") {
              echo '<p class="loginerror">Sorry, <br>Connection to the database failed. <br>Our developers are working on it.</p>';
          }
          elseif ($_GET['error'] == "nosuchuserhere") {
              echo '<p class="loginerror"><strong>No such user here at the moment</strong>. <br>No account? <br> Do not worry, <a href="signup.php">create your account <strong>easily</strong> here</a>.</p>';
          }
          elseif ($_GET['error'] == "unknown") {
              echo '<p class="loginerror">Wrong log in protocol! <br><strong>Our developers will check on it</strong>.</p>';
          }           
      }
      
      ?>
  </div>
    <form action="connections/processLogin.php" method="POST" class="theloginform">
      <label for="userid">Phone or Email:</label> </br>
      <input type="text" name="userid" class="weka1" placeholder="Phone/Email">
      </br>
      </br>
      <label for="password">Password:</label> </br>
      <input type="password" name="password" class="weka2">
      </br>
      <br>
        <button type="submit" name="submit"> Sign In </button>
    </form>
<!--Forgot Password-->
      
      <?php
      if (isset($_GET['success'])) {
        if ($_GET['success'] == "password=reset=successful") {
          echo '<br> <p class="signupsucess">Your password has been reset successfully. <br>Now log in ith your new password!</p> <br>';
        }
      }
      ?>
      <br>
      <div class="forgot-password"> <a href="resetpassword.php"> I forgot my password!</a> </div>
<!--Sign Up-->
  <h4>Sign Up</h4>
  <a href="signup.php"> <button> Create Account </button> </a> 
</div>

