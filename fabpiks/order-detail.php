<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order Details</title>
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
        <div class="page-container">
          <div class="order-info-container">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="order-wrapper">
                    <div class="order-detail-left-side">
                      <span class="order-nav"><a href="#"><i class="ri-arrow-left-line"></i> Orders</a></span>
                      <div class="order-info">
                        <h2 class="order-number">
                          Order <span>#1002</span>
                        </h2>
                        <button class="btn btn-sm paid-btn">Paid</button>
                        <button class="btn btn-sm unfulfilled-btn">Unfulfilled</button>

                        <div class="order-date-group">
                          <i class='bx bxs-calendar'></i>
                          <p>06, 22 2019 at 10:14 am</p>
                        </div>
                      </div>
                    </div>
                    <div class="order-detail-right-side">
                      <button class="btn btn-sm fulfill-btn">Fulfill</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="order-detail-container">
            <div class="row">
              <div class="col-md-8">
                <div class="order-product-info-details">
                  <p class="unfulfilled-bedge"> <span class="unfulfilled-icon"></span> <span class=" Unfulfilled-text"> Unfulfilled 2</span></p>
                  <div class="order-product-table">
                    <table class="table">
                      <tr>
                        <td>
                          <div class="order-product-info">
                            <div class="order-product-img">
                              <img src="./assets/img/product/product-image.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="order-product-details">
                              <p class="product-name">Nike Air Force 1 LV8 2</p>
                              <div class="order-product-specification">
                                <p>Color: Black</p>
                                <p>Size: US10</p>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="order-product-price">
                            <span class="new-price">$80.00</span>
                            <span class="old-price">$130.00</span>
                          </div>
                        </td>
                        <td>
                          <div class="order-product-quantity">
                            <p>1</p>
                          </div>
                        </td>
                        <td>
                          <div class="order-total-price">
                            <p>$80.00</p>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="order-product-info">
                            <div class="order-product-img">
                              <img src="./assets/img/product/product-image.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="order-product-details">
                              <p class="product-name">Nike Air Force 1 LV8 2</p>
                              <div class="order-product-specification">
                                <p>Color: Black</p>
                                <p>Size: US10</p>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="order-product-price">
                            <span class="new-price">$80.00</span>
                            <span class="old-price">$130.00</span>
                          </div>
                        </td>
                        <td>
                          <div class="order-product-quantity">
                            <p>1</p>
                          </div>
                        </td>
                        <td>
                          <div class="order-total-price">
                            <p>$80.00</p>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="order-delivery-details">
                  <h4>Delivery</h4>
                  <div class="order-devlivery-group">
                    <div class="order-delivery">
                      <div class="order-delivery-icon">
                        <img src="./assets/img/icon/fedex.png" alt="">
                      </div>
                      <div class="order-delivery-title">
                        <h4>FedEx</h4>
                        <span>First class package</span>
                      </div>
                    </div>

                    <div class="order-delivery-price">
                      <h5>$20.00</h5>
                    </div>
                  </div>
                </div>

                <div class="order-payment-summary">
                  <h4>
                    Payment Summary
                  </h4>
                  <div class="order-payment-summary-table">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Subtotal <span>(2 items)</span></td>
                          <td>$314.00</td>
                        </tr>
                        <tr>
                          <td>Delivery </td>
                          <td>$20.00</td>
                        </tr>
                        <tr>
                          <td>Tax </td>
                          <td>$000.00</td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>Total paid by customer</td>
                          <td>$334.00</td>
                        </tr>
                      </tfoot>

                    </table>
                  </div>
                </div>


                <div class="order-tracking-box">
                  <h4>Tracking</h4>

                  <div class="order-tracking-timeline">
                    <div class="horizontal timeline">
                      <div class="steps">
                        <div class="step current">
                          <span>To be prepared</span>
                        </div>
                        <div class="step">
                          <span>Sent to logistics</span>
                        </div>
                        <div class="step ">
                          <span>In preparation</span>
                        </div>
                        <div class="step">
                          <span>Shipped</span>
                        </div>
                        <div class="step">
                          <span>Delivered</span>
                        </div>
                      </div>

                      <div class="line"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="customer-details">
                  <h4>
                    Customer
                  </h4>

                  <div class="customer-profile">
                    <div class="customer-profile-box">
                      <div class="customer-profile-group">
                        <div class="customer-profile-icon">
                          <img src="assets/img/user/user.jpg" alt="">
                        </div>
                        <div class="customer-profile-name">
                          <p>Adarsh reddy</p>
                        </div>
                      </div>
                      <div class="customer-profile-link">
                        <a href="#"><i class='bx bx-right-arrow-alt'></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="customer-order-number">
                    <div class="customer-order-group">
                      <div class="customer-order-icon">
                        <i class="fa-solid fa-rectangle-list"></i>
                      </div>
                      <div class="customer-order-number-box">
                        <span>5 Orders</span>
                      </div>
                    </div>
                    <div class="customer-order-link">
                      <a href="#"><i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                  </div>

                  <div class="customer-info-box">
                    <h6>Costomer Info</h6>

                    <div class="cutomer-info-group">
                      <i class='bx bx-envelope'></i> <a href="mailto:abc@gmail.com">abc@gmail.com</a>
                    </div>
                    <div class="cutomer-info-group">
                      <i class='bx bx-phone'></i> <a href="tel:+918888888888">+91 8888-888-888</a>
                    </div>
                  </div>

                  <div class="customer-address">
                    <h6>Shipping Address</h6>
                    <address>
                      <p>Smith Rhodos</p>
                      <p>15 Hodgos Mews, High Wycombo</p>
                      <p>Hp123JL</p>
                      <p>United Kingdom</p>
                    </address>
                  </div>
                  <div class="customer-address">
                    <h6>Billing Address</h6>
                    <address>
                      <p>Smith Rhodos</p>
                      <p>15 Hodgos Mews, High Wycombo</p>
                      <p>Hp123JL</p>
                      <p>United Kingdom</p>
                    </address>
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