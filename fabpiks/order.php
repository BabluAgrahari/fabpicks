<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order</title>
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
            <div class="col-md-3">
              <h4>All Orders </h4>
            </div>



            <div class="col-md-12 mt-5">
              <table class="table table-light table-striped products-table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Order Id</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sold</th>
                    <th scope="col">Sales</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Product - 1</td>
                    <td>#4545</td>
                    <td>Rs. 455</td>
                    <td>984</td>
                    <td>Rs. 12984</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Product - 2</td>
                    <td>#45455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Product - 3</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Product - 4</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Product - 5</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Product - 6</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Product - 7</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Product - 7</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Product - 7</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Product - 7</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Product - 7</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Product - 7</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Product - 7</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Product - 7</td>
                    <td>#455</td>
                    <td>Rs. 4565</td>
                    <td>9834</td>
                    <td>Rs. 129384</td>
                  </tr>
                </tbody>
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
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="https://npmcdn.com/chart.js@latest/dist/chart.min.js"></script>
  <script src="https://d3js.org/d3.v3.min.js"></script>
  <script src="./assets/js/revenue-chart.js"></script>
  <script src="./assets/js/sale-chart.js"></script>
  <script src="./assets/js/total-order-chart.js"></script>
  <script src="./assets/js/short-chart.js"></script>
  <script src="./assets/js/product-chart.js"></script>
  <script src="./assets/js/custom.js"></script>

  <script src="./assets/js/main.js"></script>
</body>

</html>