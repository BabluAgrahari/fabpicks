<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Type 2</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/css-pro-layout.css" />
    <link rel="stylesheet" href="assets/css/remixicon.css" />
    <!-- Font Awesome  -->
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
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

            <main class="content product-type">
                <div class="page-container">

                    <div class="container-fluid product-type product-listing ">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="page-title">Product Listing</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label for="product-name ">Product Name </label>
                                    <input type="text" id="product-name" class="form-control" placeholder="Product Name" required>
                                </div>
                                <div class="field-group ">
                                    <label for="product-description ">Description</label>
                                    <textarea name="" id="product-description" class="form-control " ;></textarea>
                                    <span class="note"> Do not exceed 100 characters when entring the product name.</span>
                                </div>
                                <div class="field-group">
                                    <label for="product-name ">Size </label>
                                    <input type="text" id="product-name" class="form-control" placeholder="Size" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="field-group">
                                            <label for="product-type">Package Type </label>
                                            <select name="" id="product-type" class="form-select js-example-basic-single">
                                                <option value="" selected>Select</option>
                                                <option value="product-type -1">Bottle</option>
                                                <option value="product-type -2">Box</option>
                                                <option value="product-type -3">Role</option>
                                            </select>
                                        </div>


                                    </div>

                                    <div class="col-6">
                                        <div class="field-group">
                                            <label for="product-type">Product Listing Type </label>
                                            <select name="" id="product-type" class="form-select js-example-basic-single">
                                                <option value="" selected>Trial Store</option>
                                                <option value="product-type -1">Brand Store</option>
                                                <option value="product-type -2">Fixed Price</option>
                                                <option value="product-type -4">Rewards Store</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="field-group">
                                            <label for="market-price1">Sale Price/ Trial Point</label>

                                            <input type="text" class="form-control" placeholder="Sale Price/ Trial Point">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="field-group">
                                            <label for="market-price1">Rewards Point</label>
                                            <input type="text" id="market-price1" class="form-control" placeholder="Rewards Point">
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-18">

                                    <table id="MyTable" class="table">
                                        <tbody id="field_wrapper">
                                            <tr>
                                                <td style="width: 100px;">
                                                    <div class="field-group">
                                                        <label for="stock">Stock </label>
                                                        <input type="text" id="stock" class="form-control" placeholder="500" required>
                                                    </div>
                                                </td>

                                                <td style="width: 100px;">
                                                    <div class="field-group">
                                                        <label for="unit">Unit</label>
                                                        <select name="" id="unit" class="form-select  ">
                                                            <option value="" selected>Select</option>
                                                            <option value="kg">KG</option>
                                                            <option value="pcs">PC</option>
                                                            <option value="pcs">Box</option>
                                                            <option value="pcs">Bottle</option>
                                                            <option value="pcs">Box(4 Units)</option>

                                                        </select>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="field-group">
                                                        <label for="add-size">Attributes</label>
                                                        <select name="" id="add-size" class="form-select  ">
                                                            <option value="" selected>Select</option>
                                                            <option value="EU-44">Color</option>
                                                            <option value="EU-36">Size</option>
                                                            <option value="EU-30">Storage</option>

                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="field-group">
                                                        <label for="product-color">Color</label>
                                                        <div class="custom-radios">
                                                            <div>
                                                                <input type="radio" id="color-1" name="color" value="color-1" checked>
                                                                <label for="color-1">
                                                                    <span>
                                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                    </span>
                                                                </label>
                                                            </div>

                                                            <div>
                                                                <input type="radio" id="color-2" name="color" value="color-2">
                                                                <label for="color-2">
                                                                    <span>
                                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                    </span>
                                                                </label>
                                                            </div>

                                                            <div>
                                                                <input type="radio" id="color-3" name="color" value="color-3">
                                                                <label for="color-3">
                                                                    <span>
                                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                    </span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success" id="add_more">+</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <table class="table" id="myproductTable">
                                    <tbody id="field_wrapper1">
                                        <tr class="product-table-row">

                                            <td>
                                                <div class="field-group">
                                                    <label for="product-name ">Product Tittle </label>
                                                    <input type="text" id="product-name" class="form-control" placeholder="Product Name" required>
                                                </div>
                                            </td>
                                            <td>

                                                <div class="field-group">
                                                    <label for="product-description ">Description</label>
                                                    <textarea name="" id="product-description" class="form-control"></textarea>
                                                    <span class="note"> Do not exceed 100 characters when entring the product name.</span>
                                                </div>
                                            </td>

                                            <td><button class="btn btn-success mt-4" id="myaddBtn">+</button></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                            <div class="col-md-6">
                                <div class="field-group">
                                    <label for="sub-category">Category/Sub Category</label>
                                    <select name="" id="sub-category" class="form-select js-example-basic-single">
                                        <option value="" selected>Select Category</option>
                                        <option value="sub-category 1">Category/sub-category 1</option>
                                        <option value="sub-category 2">category/sub-category 2</option>
                                        <option value="sub-category 3">Category/sub-category 3</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-image">
                                    <section>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label">Product Image</label>
                                                <div class="product-image-upload-container">
                                                    <div class="preview-zone hidden">
                                                        <div class="box box-solid">

                                                            <div class="box-body"><img src="https://m.media-amazon.com/images/I/81+l0HJ-iFL._AC_SS450_.jpg" class="img-fluid" alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone-wrapper">
                                                        <div class="dropzone-desc">
                                                            <i class="glyphicon glyphicon-download-alt"></i>
                                                            <p>Choose an image file or drag it here.</p>
                                                        </div>
                                                        <input type="file" name="img_logo" class="dropzone">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="field-group">
                                        <label for="product-brand">Brand</label>
                                        <select name="" id="product-brand" class="form-select js-example-basic-single">
                                            <option value="" selected>Select</option>
                                            <option value="product-brand -1">product-brand -1</option>
                                            <option value="product-brand -2">product-brand -2</option>
                                            <option value="product-brand -3">product-brand -3</option>
                                            <option value="product-brand -4">product-brand -4</option>
                                            <option value="product-brand -5">product-brand -5</option>
                                            <option value="product-brand -6">product-brand -6</option>

                                        </select>
                                    </div>
                                    <div class="field-group">
                                        <label for=" "> </label>
                                        <select name="" id="product-feedback-form" class="form-select js-example-basic-single">
                                            <option value="" selected>No Feedback</option>
                                            <option value="Feedback Form 1">Feedback Form 1</option>
                                            <option value="Feedback Form 2">Feedback Form 2</option>
                                            <option value="Feedback Form 3">Feedback Form 3</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="pre-qulifing-questions">Pre-Qulifing Questions</label>
                                        <select name="" id="pre-qulifing-questions" class="form-select js-example-basic-single">
                                            <option value="" selected>No Pre-Qulifing Questions</option>
                                            <option value="pre-qulifing-questions -1">pre-qulifing-questions -1</option>
                                            <option value="pre-qulifing-questions -2">pre-qulifing-questions -2</option>
                                            <option value="pre-qulifing-questions -3">pre-qulifing-questions -3</option>
                                            <option value="pre-qulifing-questions -4">pre-qulifing-questions -4</option>
                                            <option value="pre-qulifing-questions -5">pre-qulifing-questions -5</option>
                                            <option value="pre-qulifing-questions -6">pre-qulifing-questions -6</option>

                                        </select>
                                    </div>
                                    <!-- <div class="field-group">
                                    <label for="product-feedback">Product Feedback </label>
                                    <select name="" id="product-feedback" class="form-select js-example-basic-single">
                                        <option value="" selected>Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div> -->
                                </div>

                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="field-group">
                                            <label for="mrp">MRP</label>
                                            <input type="text" id="mrp" class="form-control" placeholder="1000" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="field-group">
                                            <label for="offer-price">Offer Price</label>
                                            <input type="text" id="offer-price" class="form-control" placeholder="200" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="field-group">
                                            <label for="minimum-qty">Maximum Qty per User</label>
                                            <input type="text" id="minimum-qty" class="form-control" placeholder="1000" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="field-group">
                                            <label for="product-expire-date">Product Expire Date</label>
                                            <input type="date" id="product-expire-date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-30">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#related-products">Add Related Products</button>


                                <div class="col-md-12 mt-25">

                                    <div class="field-group">
                                        <label for="tags">Tags</label>
                                        <input type="text" class="form-control" id="tag-input1">
                                    </div>

                                </div>

                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-success">Add Product</button>
                                <button class="btn btn-success">Save Product</button>
                            </div>
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
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/drag-drop.js"></script>
    <script src="./assets/js/tags.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        $('#add_more').click(function() {

            var fieldHTML = ` <tr class="mt-4">
                                    <td>
                                                <div class="field-group">
                                                    <label for="stock">Stock </label>
                                                    <input type="text" id="stock" class="form-control" placeholder="500" required>
                                                </div>
                                            </td>
 <td>
                                                <div class="field-group">
                                                    <label for="unit">Unit</label>
                                                    <select name="" id="unit" class="form-select  ">
                                                        <option value="kg">KG</option>
                                                        <option value="pcs">PC</option>
                                                       	<option value="pcs">Box</option>
                                                      	<option value="pcs">Bottle</option>
                                                     	<option value="pcs">Box(4 Units)</option>

                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="field-group">
                                                    <label for="add-size">Add Size </label>
                                                    <select name="" id="add-size" class="form-select  ">
                                                        <option value="" selected>Select</option>
                                                        <option value="kg">Color</option>
                                                        <option value="pcs">Size</option>
                                                       	<option value="pcs">Storage</option>
                                                      	
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="field-group">
                                                    <label for="product-color">Color </label>
                                                    <div class="custom-radios">
                                                        <div>
                                                            <input type="radio" id="color-1" name="color" value="color-1" checked>
                                                            <label for="color-1">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span>
                                                            </label>
                                                        </div>

                                                        <div>
                                                            <input type="radio" id="color-2" name="color" value="color-2">
                                                            <label for="color-2">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span>
                                                            </label>
                                                        </div>

                                                        <div>
                                                            <input type="radio" id="color-3" name="color" value="color-3">
                                                            <label for="color-3">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span>
                                                            </label>
                                                        </div>

                                                     
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger DeleteButton">-</button>
                                            </td>
                                        </tr>`;

            $('#field_wrapper').append(fieldHTML);
            i++;
        });
        $('#myaddBtn').click(function() {

            let fieldHTML = `<tr>
                                    <td>
                                        <div class="field-group">
                                            <label for="product-name ">Product Tittle </label>
                                            <input type="text" id="product-name" class="form-control" placeholder="Product Name" required>
                                        </div>
                                    </td>
                                    <td>

                                        <div class="field-group">
                                            <label for="product-description ">Description</label>
                                            <textarea name="" id="product-description" class="form-control"></textarea>
                                            <span class="note"> Do not exceed 100 characters when entring the product name.</span>
                                        </div>
                                    </td>
  
                                    <td><button class="btn btn-danger mt-4 myDeleteButton"  >-</button></td>
                                </tr>  `;

            $('#field_wrapper1').append(fieldHTML);
            i++;
        });


        $("#MyTable").on("click", ".DeleteButton", function() {
            $(this).closest("tr").remove();
        });
        $("#myproductTable").on("click", ".myDeleteButton", function() {
            $(this).closest("tr").remove();
        });
    </script>

</body>

</html>

<!-- related products start -->

<div class="modal fade" id="related-products" tabindex="-1" aria-labelledby="related-product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="related-product">Related products</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="field-group related-product-field">
                                <label for="related-products1">Related Products</label>
                                <!-- <select name="" id="related-products1" class="form-select js-example-basic-single" multiple> -->
                                <select name="" id="related-products1" class="form-select " multiple>
                                    <option value="">Select Product </option>
                                    <option value="product 1">Product 1</option>
                                    <option value="product 2">Product 2</option>
                                    <option value="product 3">Product 3</option>
                                    <option value="product 4">Product 4</option>
                                    <option value="product 5">Product 5</option>
                                </select>
                            </div>


                        </div>
                    </div>

                    <div class="col-md-12 mt-5">
                        <table class="table table-light table-striped products-table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Sort</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><img src="https://m.media-amazon.com/images/I/81+l0HJ-iFL._AC_SS450_.jpg" width="100px" alt=""></td>
                                    <td>Product Name</td>
                                    <td>1</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<!-- related products End -->