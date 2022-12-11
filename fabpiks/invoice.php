<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Invoice</title>
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
        <div class="page-container ">
          <div class="invoice-container">
            <div class="invoice-header">
              <div class="invoice-logo">
                <h3><img src="./assets/img/logo/logo.png" class="invoice-logo" alt=""></h3>
              </div>
              <div class="invoice-title">
                <h4>Invoice</h4>
              </div>
            </div>

            <div class="invoice-detail">
              <div class="invoice-date">
                <p><strong>Date:</strong> 5/12/2019</p>
              </div>
              <div class="invoice-number">
                <p><strong>Invoice No.:</strong> 16835</p>
              </div>
            </div>

            <div class="invoice-address-group">
              <div class="invoice-to-address">
                <p class="address-title"><Strong>Invoiced To:</Strong></p>
                <address>
                  <p>Smith Rhodos</p>
                  <p>15 Hodgos Mews, High Wycombo</p>
                  <p>Hp123JL</p>
                  <p>United Kingdom</p>
                </address>
              </div>
              <div class="invoice-pay-to-address">
                <p class="address-title"><Strong>Pay To:</Strong></p>
                <address>
                  <p>Koice Inc</p>
                  <p>2705 N.Enterprise St</p>
                  <p>Orange, CA 92865</p>
                  <p>contact@koiceinc.com</p>
                </address>
              </div>
            </div>

            <div class="invoice-order-table">
              <table class="table">
                <thead>

                  <tr>
                    <th>Service</th>
                    <th>Description</th>
                    <th>Rate</th>
                    <th>
                      QTY
                    </th>
                    <th>Amount</th>
                  </tr>

                </thead>
                <tbody>
                  <tr>
                    <td>Design </td>
                    <td>Creating a website design</td>
                    <td>$50.00</td>
                    <td>10</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                    <td>Development </td>
                    <td>Creating a website design</td>
                    <td>$50.00</td>
                    <td>10</td>
                    <td>$500.00</td>
                  </tr>
                  <tr>
                    <td>Seo </td>
                    <td>Creating a website design</td>
                    <td>$50.00</td>
                    <td>10</td>
                    <td>$500.00</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4"><strong>Sub Total:</strong> </td>
                    <td> $2150.00</td>

                  </tr>
                  <tr>
                    <td colspan="4"><strong>Tax:</strong> </td>
                    <td> $215.00</td>
                  </tr>
                  <tr>
                    <td colspan="4"><strong>Grand Total:</strong> </td>
                    <td> $23165.00</td>
                  </tr>
                </tfoot>
              </table>
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