<div class="navbar_outer_wrap">  
      <div class="container-fluid pr-0 pl-0 ">
          <nav class="navbar navbar-light navbar-expand-md bg-light  header">
              <a href=""><img src="images/logo.png" height="42" width="75"></a> 
              <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
                  <ul class="navbar-nav  text-center nav_wrap">
                      <li class="nav-item active">
                          <a class="nav-link" href="admin.php">Home </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="adminproduct.php">Products</a>
                      </li>
                      
                   </ul>
                    <ul class="nav navbar-nav  flex-nowrap right_side_content">
                        <li class="nav-item">
                              <?php
                              if(isset($_SESSION['username'])) : ?>
                                hi, <strong><?php echo $_SESSION['username']; ?></strong>
                            <?php endif ?>
                        </li>
                        <li class="nav-item">
                              <?php
                              if(isset($_SESSION['username'])) : ?>
                                <a href="index.php?logout='1'" style="color: red;"><strong>logout</strong></a>
                            <?php endif ?> 
                        </li>
                    </ul>
              </div>
          </nav>
      </div>
    </div>