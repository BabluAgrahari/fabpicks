<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products</title>
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
              <h4>All Products </h4>
            </div>

            <div class="col-md-9 product-btn-group">
              <button type="button" class="btn btn-success  " data-bs-toggle="modal" data-bs-target="#productcategory">
                <i class="ri-add-circle-line"></i> Product Category
              </button>
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#product-sub-category">
                <i class="ri-add-circle-line"></i> Product Sub-Category
              </button>
              <button type="button" class="btn btn-success  " data-bs-toggle="modal" data-bs-target="#product-child-category">
                <i class="ri-add-circle-line"></i> Product Child-Category
              </button>
              <button type="button" class="btn btn-success  " data-bs-toggle="modal" data-bs-target="#brand">
                <i class="ri-add-circle-line"></i> Brand
              </button>
            </div>

            <div class="col-md-12 mt-5">
              <div class="filter-container">
                <div class="left-side">
                  <form action="#">
                    <div class="search-field">
                      <input type="text" placeholder="Search By Customer/ Vendor">
                      <div class="search-btn">
                        <button type="submit"><i class="ri-search-line"></i></button>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="right-side ">
                  <form action="">
                    <div class="custom-search-container pr-5">
                      <div class="custom-search-field ">
                        <select>
                          <option value="" selected>Select Vendor</option>
                          <option value="">Vendor 1</option>
                        </select>
                      </div>
                      <div class="custom-search-field">

                        <input type="date" id="start-date">
                      </div>
                      <div class="custom-search-field">

                        <input type="date" id="end-date">
                      </div>
                    </div>
                  </form>
                </div>

                <div class="search-btn-group">
                  <button type="submit" class="filter-btn">Filter</button>
                  <button type="reset" class="reset-btn"><i class="ri-restart-line"></i></button>
                </div>
              </div>
            </div>

            <div class="col-md-12 mt-5">
              <table class="table table-light   table-striped products-table" id="myTable">
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
  <script src="./assets/js/custom.js"></script>
  <script src="./assets/js/main.js"></script>
</body>

</html>


<!-- Product Category Modal -->
<div class="modal fade" id="productcategory" tabindex="-1" aria-labelledby="productcategoryLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="productcategoryLabel">Product Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container ">
          <div class="row">
            <form action="#">
              <div class="row">
                <div class="col-md-4">
                  <div class="field-group">
                    <label for="category-name ">Category Name</label>
                    <input type="text" id="category-name" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="field-group">
                    <label for="discription ">Discription</label>
                    <textarea name="" id="discription" cols="10" rows="1" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="field-group">
                    <label for="banner">Banner</label>
                    <input type="file" name="" id="banner" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="field-group">
                    <label for="icon">Icon</label>
                    <input type="file" name="" id="icon" class="form-control">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="field-group">
                    <label for="sort ">Sort</label>
                    <input type="text" id="sort" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="field-group">
                    <div class="form-check form-switch custom-switch">
                      <label class="form-check-label" for="active">Active/Inactive</label>
                      <input class="form-check-input" type="checkbox" role="switch" id="active" checked>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="row">
            <div class="col-md-12">
              <button class="btn btn-success">Save</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!--Sub Category Modal -->
<div class="modal fade" id="product-sub-category" tabindex="-1" aria-labelledby="product-sub-categoryLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="product-sub-categoryLabel">Product Sub Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="row">
          <form action="#">
            <div class="row">
              <div class="col-md-4">
                <div class="field-group">
                  <label for="category-name ">Sub Category Name</label>
                  <input type="text" id="category-name" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="field-group">
                  <label for="discription ">Discription</label>
                  <textarea name="" id="discription" cols="10" rows="1" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="field-group">
                  <label for="discription ">Category</label>
                  <select name="" id="" class="form-select">
                    <option value="" selected>Category</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="field-group">
                  <label for="banner">Banner</label>
                  <input type="file" name="" id="banner" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="field-group">
                  <label for="icon">Icon</label>
                  <input type="file" name="" id="icon" class="form-control">
                </div>
              </div>

              <div class="col-md-2">
                <div class="field-group">
                  <label for="sort ">Sort</label>
                  <input type="text" id="sort" class="form-control">
                </div>
              </div>
              <div class="col-md-2">
                <div class="field-group ">
                  <div class="form-check form-switch custom-switch " style="padding-left:0!important ;">
                    <label class="form-check-label" for="active">Active/Inactive</label>
                    <input class="form-check-input" type="checkbox" role="switch" id="active" checked>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-success">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<!--Child Category Modal -->
<div class="modal fade" id="product-child-category" tabindex="-1" aria-labelledby="product-child-categoryLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="product-child-categoryLabel">Product Child Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="row">
          <form action="#">
            <div class="row">
              <div class="col-md-4">
                <div class="field-group">
                  <label for="category-name ">Child Category Name</label>
                  <input type="text" id="category-name" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="field-group">
                  <label for="discription ">Discription</label>
                  <textarea name="" id="discription" cols="10" rows="1" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="field-group">
                  <label for="discription ">Category</label>
                  <select name="" id="" class="form-select">
                    <option value="" selected>Category</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="field-group">
                  <label for="banner">Banner</label>
                  <input type="file" name="" id="banner" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="field-group">
                  <label for="icon">Icon</label>
                  <input type="file" name="" id="icon" class="form-control">
                </div>
              </div>

              <div class="col-md-2">
                <div class="field-group">
                  <label for="sort ">Sort</label>
                  <input type="text" id="sort" class="form-control">
                </div>
              </div>
              <div class="col-md-2">
                <div class="field-group">
                  <div class="form-check form-switch custom-switch" style="padding-left: 0 !important;">
                    <label class="form-check-label" for="active">Active/Inactive</label>
                    <input class="form-check-input" type="checkbox" role="switch" id="active" checked>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-success">Save</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!--Brand Modal -->
<div class="modal fade" id="brand" tabindex="-1" aria-labelledby="brandLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="brandLabel">Brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container ">
          <div class="row">

            <form action="#">
              <div class="row">
                <div class="col-md-6">
                  <div class="field-group">
                    <label for="brand-name ">Brand Name</label>
                    <input type="text" id="brand-name" class="form-control">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="field-group">
                    <label for="logo">Logo</label>
                    <input type="file" name="" id="logo" class="form-control">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="field-group">
                    <label for="sort ">Sort</label>
                    <input type="text" id="sort" class="form-control">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="field-group">
                    <div class="form-check form-switch custom-switch " style="padding-left: 0 !important ;">
                      <label class="form-check-label" for="active">Active/Inactive</label>
                      <input class="form-check-input" type="checkbox" role="switch" id="active" checked>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-success">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>