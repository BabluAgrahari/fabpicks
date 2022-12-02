<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>General Settings</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/css-pro-layout.css" />
  <link rel="stylesheet" href="assets/css/remixicon.css" />
  <!-- Font Awesome  -->
  <!-- boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
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
            <div class="col-md-12">
              <h4 class="page-title">General Setting</h4>
            </div>


            <div class="col-md-12">
              <form action="">

                <div class="row general-setting-field">
                  <div class="col-md-6">
                    <div class="field-group">
                      <label for="company-name">Company Name</label>
                      <input type="text" id="company-name" class="form-control" placeholder="Please enter Company name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="field-group">
                      <label for="company-email">Company Email</label>
                      <input type="text" id="company-email" class="form-control" placeholder="Please enter Company Email">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="field-group">
                      <label for="contact-number">Contact Number</label>
                      <input type="text" id="contact-number" class="form-control" placeholder="Please enter Contact Number">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="field-group">
                      <label for="company-logo">Company Logo</label>
                      <input type="file" id="company-logo" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="field-group">
                      <label for="company-address">Company Address</label>
                      <textarea name="" id="company-address" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button class="btn btn-success">Save</button>
                  </div>
                </div>

              </form>
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
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script src="./assets/js/main.js"></script>



</body>

</html>