<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Profile</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/css-pro-layout.css" />
  <link rel="stylesheet" href="assets/css/remixicon.css" />
  <!-- Font Awesome  -->
  <!-- boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" />
  <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
  <div class="layout has-sidebar fixed-sidebar fixed-header">
    <!-- header include start -->
    <?php include "sidebar.php" ?>
    <!-- header include end -->
    <div id="overlay" class="overlay"></div>
    <div class="layout">
      <!-- header include start -->
      <?php include "header.php" ?>
      <!-- header include end -->

      <main class="content">
        <div class="container ">
          <div class="row">


            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8 mx-auto">
                  <div class="user-profile-info">
                    <div class="row">
                      <div class="col-md-8 border-right">
                        <div class="user-profile-details">
                          <h4>User Information</h4>
                          <form action="">
                            <div class="row mb-3">
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="fName">First Name <span class="required">*</span></label>
                                  <input type="text" id="fName" placeholder="First Name">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="lName">Last Name <span class="required">*</span></label>
                                  <input type="text" id="lName" placeholder="Last Name">
                                </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="uEmail">Email <span class="required">*</span></label>
                                  <input type="email" id="uEmail" placeholder="Email">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="phone">Phone <span class="required">*</span></label>
                                  <input type="text" id="phone" placeholder="Phone">
                                </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="nPassword">New Password <span class="required">*</span></label>
                                  <input type="password" id="nPassword" placeholder="New Password">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="cPassword">Confirm Password <span class="required">*</span></label>
                                  <input type="password" id="cPassword" placeholder="Confirm Password">
                                </div>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col-12">
                                <div class="user-field-group">
                                  <label for="profile-pic">Upload Profile Pic </label>
                                  <input type="file" id="profile-pic">
                                </div>
                              </div>
                            </div>

                            <div class="row mt-5 mb-4">
                              <div class="col-12 d-flex justify-content-center">
                                <button type="button" class="btn btn-success  ">
                                  Update Profile
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="user-profile-box">
                          <div class="user-profile-pic">
                            <div class="user-profile-img">
                              <img src="./assets/img/user/user.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="user-name">
                              <p>Sunil Kumar</p>
                              <span><a href="mailto:sunil@gmail.com">Sunil@gmail.com</a></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>


        <!-- footer include start -->
        <?php include "footer.php" ?>
        <!-- footer include end -->
      </main>

    </div>
  </div>
  <!-- Jquery -->
  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>

  <script src="./assets/js/custom.js"></script>

  <script src="./assets/js/main.js"></script>
</body>

</html>