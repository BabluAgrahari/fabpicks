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

                <div class="container product-type ">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-title">Product Type 2</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="product-type">Prodyct Type </label>
                                        <select name="" id="product-type" class="form-select js-example-basic-single">
                                            <option value="" selected>Select</option>
                                            <option value="product-type -1">product-type -1</option>
                                            <option value="product-type -2">product-type -2</option>
                                            <option value="product-type -3">product-type -3</option>
                                            <option value="product-type -4">product-type -4</option>
                                            <option value="product-type -5">product-type -5</option>
                                            <option value="product-type -6">product-type -6</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="pre-qulifing-questions">Pre-Qulifing Questions</label>
                                        <select name="" id="pre-qulifing-questions" class="form-select js-example-basic-single">
                                            <option value="" selected>Select</option>
                                            <option value="pre-qulifing-questions -1">pre-qulifing-questions -1</option>
                                            <option value="pre-qulifing-questions -2">pre-qulifing-questions -2</option>
                                            <option value="pre-qulifing-questions -3">pre-qulifing-questions -3</option>
                                            <option value="pre-qulifing-questions -4">pre-qulifing-questions -4</option>
                                            <option value="pre-qulifing-questions -5">pre-qulifing-questions -5</option>
                                            <option value="pre-qulifing-questions -6">pre-qulifing-questions -6</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="product-feedback">Product Feedback </label>
                                        <select name="" id="product-feedback" class="form-select js-example-basic-single">
                                            <option value="" selected>Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for=" "> </label>
                                        <select name="" id="product-feedback-form" class="form-select js-example-basic-single">
                                            <option value="" selected>Select Feedback Form</option>
                                            <option value="Feedback Form 1">Feedback Form 1</option>
                                            <option value="Feedback Form 2">Feedback Form 2</option>
                                            <option value="Feedback Form 3">Feedback Form 3</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="product-category">Category </label>
                                        <select name="" id="product-category" class="form-select js-example-basic-single">
                                            <option value="" selected>Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="sub-category">Sub Category</label>
                                        <select name="" id="sub-category" class="form-select js-example-basic-single">
                                            <option value="" selected>Select Feedback Form</option>
                                            <option value="sub-category 1">sub-category 1</option>
                                            <option value="sub-category 2">sub-category 2</option>
                                            <option value="sub-category 3">sub-category 3</option>

                                        </select>
                                    </div>
                                </div>
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
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-group">
                                <label for="product-name ">Product Name </label>
                                <input type="text" id="product-name" class="form-control" placeholder="Product Name" required>
                            </div>
                            <div class="field-group mt-3">
                                <label for="product-description ">Description</label>
                                <textarea name="" id="product-description" class="form-control"></textarea>
                                <span class="note"> Do not exceed 100 characters when entring the product name.</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="stock">Stock </label>
                                        <input type="text" id="stock" class="form-control" placeholder="500" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="add-size">Add Size </label>
                                        <select name="" id="add-size" class="form-select  ">
                                            <option value="" selected>Select</option>
                                            <option value="EU-44">EU-44</option>
                                            <option value="EU-36">EU-36</option>
                                            <option value="EU-30">EU-30</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="product-color">Product Color </label>
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

                                            <div>
                                                <input type="radio" id="color-4" name="color" value="color-4">
                                                <label for="color-4">
                                                    <span>
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="stock">Stock </label>
                                        <input type="text" id="stock" class="form-control" placeholder="500" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="add-size">Add Size </label>
                                        <select name="" id="add-size" class="form-select  ">
                                            <option value="" selected>Select</option>
                                            <option value="EU-44">EU-44</option>
                                            <option value="EU-36">EU-36</option>
                                            <option value="EU-30">EU-30</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="product-color">Product Color </label>
                                        <div class="custom-radios">
                                            <div>
                                                <input type="radio" id="color-4" name="color1" value="color-1" checked>
                                                <label for="color-4">
                                                    <span>
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                    </span>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="radio" id="color-5" name="color1" value="color-2">
                                                <label for="color-5">
                                                    <span>
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                    </span>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="radio" id="color-6" name="color1" value="color-3">
                                                <label for="color-6">
                                                    <span>
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                    </span>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="radio" id="color-7" name="color1" value="color-4">
                                                <label for="color-7">
                                                    <span>
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                        <label for="minimum-qty">Minimum Qty</label>
                                        <input type="text" id="minimum-qty" class="form-control" placeholder="1000" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="product-expire-date">Product Expire Date</label>
                                        <input type="date" id="product-expire-date" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary">Add Product</button>
                            <button class="btn btn-success">Save Product</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/drag-drop.js"></script>

    <script src="./assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>


</body>

</html>