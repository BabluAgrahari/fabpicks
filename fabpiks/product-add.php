<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product Add</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/css-pro-layout.css" />
  <link rel="stylesheet" href="assets/css/remixicon.css" />
  <!-- Font Awesome  -->
  <!-- boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
        <div class="page-container">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <h4 class="page-title"><i class="ri-add-circle-line"></i> Product Add</h4>
              </div>
              <form action="#" class="custom-form">

                <div class="row">

                  <div class="col-md-6">
                    <div class="field-group">
                      <label for="prodcut-name ">Product Name: <span class="required">*</span> </label>
                      <input type="text" id="prodcut-name" class="form-control" placeholder="Please enter product name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="field-group">
                      <label for="select-brand ">Select Brand: <span class="required">*</span></label>
                      <select name="" id="select-brand" class="form-select js-example-basic-single">
                        <option value="" selected>Select</option>
                        <option value="brand-1">brand-1</option>
                        <option value="brand-2">brand-2</option>
                        <option value="brand-3">brand-3</option>
                        <option value="brand-4">brand-4</option>
                        <option value="brand-5">brand-5</option>
                        <option value="brand-6">brand-6</option>
                        <option value="brand-7">brand-7</option>

                      </select>

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="select-category ">Category: <span class="required">*</span></label>
                      <select name="" id="select-category" class="form-select js-example-basic-single">
                        <option value="" selected>Select</option>
                        <option value="category-1">category-1</option>
                        <option value="category-2">category-2</option>
                        <option value="category-3">category-3</option>
                        <option value="category-4">category-4</option>
                        <option value="category-5">category-5</option>
                        <option value="category-6">category-6</option>
                        <option value="category-7">category-7</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="select-subcategory ">Sub Category: <span class="required">*</span></label>
                      <select name="" id="select-subcategory" class="form-select js-example-basic-single">
                        <option value="" selected>Select</option>
                        <option value="subcategory-1">subcategory-1</option>
                        <option value="subcategory-2">subcategory-2</option>
                        <option value="subcategory-3">subcategory-3</option>
                        <option value="subcategory-4">subcategory-4</option>
                        <option value="subcategory-5">subcategory-5</option>
                        <option value="subcategory-6">subcategory-6</option>
                        <option value="subcategory-7">subcategory-7</option>

                      </select>

                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="select-childcategory ">ChildCategory: <span class="required">*</span></label>
                      <select name="" id="select-childcategory" class="form-select js-example-basic-single">
                        <option value="" selected>Select</option>
                        <option value="childcategory-1">childcategory-1</option>
                        <option value="childcategory-2">childcategory-2</option>
                        <option value="childcategory-3">childcategory-3</option>
                        <option value="childcategory-4">childcategory-4</option>
                        <option value="childcategory-5">childcategory-5</option>
                        <option value="childcategory-6">childcategory-6</option>
                        <option value="childcategory-7">childcategory-7</option>

                      </select>

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="field-group">
                    <label for="also ">Also: <span class="required">*</span></label>
                    <select name="" id="also" class="form-select js-example-basic-single" multiple="multiple">
                      <option value="" selected>Select</option>
                      <option value="category-1">category-1</option>
                      <option value="category-2">category-2</option>
                      <option value="category-3">category-3</option>
                      <option value="category-4">category-4</option>
                      <option value="category-5">category-5</option>
                      <option value="category-6">category-6</option>
                      <option value="category-7">category-7</option>
                    </select>
                  </div>
                  <span class="note"><i class="fa-solid fa-circle-info"></i>if in list primary category is also present then it will auto remove from this after create product.</span>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="select-store ">Select Store: <span class="required">*</span></label>
                      <select name="" id="select-store" class="form-select js-example-basic-single">
                        <option value="" selected>Select</option>
                        <option value="store-1">store-1</option>
                        <option value="store-2">store-2</option>
                        <option value="store-3">store-3</option>
                        <option value="store-4">store-4</option>
                        <option value="store-5">store-5</option>
                        <option value="store-6">store-6</option>
                        <option value="store-7">store-7</option>
                      </select>
                      <span class="note"><i class="fa-solid fa-circle-info"></i>(Please Choose Store Name)</span>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="product-image ">Upload Product Image</label>
                      <input type="file" id="product-image" class="form-control">
                      <span class="note"><i class="fa-solid fa-circle-info"></i>Image max size: 1MB</span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="product-gallery-image ">Upload Product Gallery Image</label>
                      <input type="file" id="product-gallery-image" class="form-control">
                      <span class="note"><i class="fa-solid fa-circle-info"></i>Image max size: 1MB</span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="field-group">
                    <label for="description">Description: </label>
                    <textarea name="" id="description" class="form-control"></textarea>
                    <span class="note"><i class="fa-solid fa-circle-info"></i>Please Enter Product Description</span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="selling-date">Start Selling From:</label>
                      <input type="date" id="selling-date" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="tags">Tags: </label>
                      <input type="text" id="tags" class="form-control" placeholder="Please enter tag seprated by Comma(,)">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="model">Model:</label>
                      <input type="text" id="model" class="form-control" placeholder="Please enter model number">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="hsn/sac">HSN/SAC: <span class="required">*</span></label>
                      <input type="text" id="hsn/sac" class="form-control" placeholder="Please enter HSN/SAC Code">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="sku">SKU: <span class="required">*</span></label>
                      <input type="text" id="sku" class="form-control" placeholder="Please enter SKU Code">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="field-group">
                      <div class="form-check form-switch custom-switch custom-switch-1">
                        <label class="form-check-label" for="tax">Price Including Tax ?</label>
                        <input class="form-check-input" type="checkbox" role="switch" id="tax" checked>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="price">Price: <span class="required">*</span></label>
                      <div class="input-group ">
                        <span class="input-group-text" id="price">INR</span>
                        <input type="text" class="form-control" id="price" aria-describedby="price">
                      </div>
                      <span class="note"><i class="fa-solid fa-circle-info"></i>Do not put comma with entring price</span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="offer-price">Offer Price: <span class="required">*</span></label>
                      <div class="input-group ">
                        <span class="input-group-text" id="offer-price">INR</span>
                        <input type="text" class="form-control" id="price" aria-describedby="offer-price">
                      </div>
                      <span class="note"><i class="fa-solid fa-circle-info"></i>Do not put comma with entring offer price</span>
                    </div>

                  </div>
                  <div class="col-md-4">
                    <div class="field-group">
                      <label for="tax-apply">Tax Applied(In %) <span class="required">*</span></label>
                      <div class="input-group ">
                        <input type="text" class="form-control" id="price" aria-describedby="tax-apply">
                        <span class="input-group-text" id="tax-apply">%</span>
                      </div>
                      <span class="note"><i class="fa-solid fa-circle-info"></i>Do not put comma with entring offer price</span>
                    </div>
                  </div>

                </div>



                <div class="row">
                  <div class="col-md-4">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success ml-4">Create</button>
                  </div>



                </div>

              </form>
            </div>


          </div>


          <!-- footer include start -->
          <?php include "footer.php" ?>
          <!-- footer include end -->
        </div>
      </main>

    </div>
  </div>
  <!-- Jquery -->
  <script src="./assets/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script src="./assets/js/main.js"></script>
  <script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
  </script>


</body>

</html>