<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alerts</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/css-pro-layout.css" />
  <link rel="stylesheet" href="assets/css/remixicon.css" />
  <!-- Font Awesome  -->
  <!-- boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/bootstrap-icons.svg" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div class="page-container ">
          <div class="alr-container">


            <div class="alert alert-box alert-danger d-flex align-items-center w-50 " role="alert">
              <i class="bi bi-exclamation-circle"></i>
              <div class="alr-mgs">
                <p> This is an error alert - check it out!</p>
              </div>
            </div>
            <div class="alert alert-box alert-warning d-flex align-items-center w-50 " role="alert">
              <i class="bi bi-exclamation-triangle"></i>
              <div class="alr-mgs">
                <p> This is an warning alert - check it out!</p>
              </div>
            </div>
            <div class="alert alert-box alert-info d-flex align-items-center w-50 " role="alert">
              <i class="bi bi-info-circle"></i>
              <div class="alr-mgs">
                <p> This is an info alert - check it out!</p>
              </div>
            </div>
            <div class="alert alert-box alert-success d-flex align-items-center w-50 " role="alert">
              <i class="bi bi-check2-circle"></i>
              <div class="alr-mgs">
                <p> This is an success alert - check it out!</p>
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