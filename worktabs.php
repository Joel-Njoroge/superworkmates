<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="bootstrap/jquery/jquery-3.2.1.min.js"></script>
    <script>
                window.addEventListener("load", function(event) {
                $('#theJobCentre').load('jobCentre.php');
                });
    </script>
    

    
   
</head>
<body>
    

<div class="work-tab">
    <div class="worktabs">
        <div  class="tab">
              <div class="tab-head">
                <a href="#">
                <div class="job-centre">
                    <h4>Job Centre</h4>
                    <span>Offer Jobs | Get Jobs</span>
                </div>
                </a>
              </div>
              
              <div class="tab-handle">
                <span class="success"></span>
                  <div id="theJobCentre">
                  
                  
                  </div>
              </div>
        </div>

        <div  class="tab">
              <div class="tab-head">
                <a href="#">
                <div class="assets-at-work">
                    <h4>Assets at Work</h4>
                    <span>Hire | Rent</span>
                </div>
                </a>
              </div>

              <div class="tab-handle">
                <h5>Post Something and Start Earning...</h5>
                    <?php
                          
                        if (!isset($_SESSION['username'])) {echo'
                            <button onclick="login()"> Please Sign In to Continue </button>
                            ';
                              }
                    ?>
              </div>
        </div>

        <div  class="tab">
            <div class="tab-head">
              <a href="#">
              <div class="projects-at-hand">
                  <h4>Projects at Hand</h4>
                  <span>Done Projects | Projects in Progress</span>
              </div>
              </a>
            </div>

            <div class="tab-handle">
                <h5>What are you working on</h5>
                <span>We can help...</span> <br>
                  <?php
                            
                          if (!isset($_SESSION['username'])) {echo'
                              <button onclick="login()"> Please Sign In to Continue </button>
                              ';
                                }
                  ?>
            </div>
        </div>

    </div>
</div>
</body>
</html>