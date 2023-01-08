<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brand</title>
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



                <!-- <div class="container ">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-title">Brand</h4>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="brand-name ">Brand Name</label>
                                        <input type="text" id="brand-name" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" name="" id="logo" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="field-group">
                                        <div class="form-check form-switch custom-switch">
                                            <label class="form-check-label" for="active">Active/Inactive</label>
                                            <input class="form-check-input" type="checkbox" role="switch" id="active"
                                                checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->


                <div class="container ">
                    <div class="row">

                        <div class="col-md-11">
                            <h4>Brand</h4>
                        </div>

                        <div class="col-md-1 mb-3 product-btn-group">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#productcategory">
                                <i class="ri-add-circle-line"></i> Add
                            </button>

                        </div>

                        <div class="col-md-12 ">
                            <table class="table table-light table-striped custom-table" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Logo</th>
                                        <!-- <th scope="col">Banner</th>
                                        <th scope="col">Icon</th> -->
                                        <th scope="col">Sort</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>here</td>
                                        <td>here</td>
                                        <!-- <td>here</td>
                                        <td>here</td> -->
                                        <td>here</td>
                                        <td>
                                            <div class="action-group">
                                                <a href="#"><i class="ri-pencil-line"></i></a>
                                                <a href="#"><i class="ri-delete-bin-line"></i>
                                                </a>
                                            </div>
                                        </td>
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

    <script src="./assets/js/main.js"></script>



</body>

</html>



<div class="modal fade" id="productcategory" tabindex="-1" aria-labelledby="productcategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="productcategoryLabel">Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container ">
                    <div class="row">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="field-group">
                                        <label for="category-name ">Brand Name</label>
                                        <input type="text" id="category-name" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <div class="field-group">
                                        <label for="discription ">Discription</label>
                                        <textarea name="" id="discription" cols="10" rows="1"
                                            class="form-control"></textarea>
                                    </div>
                                </div> -->
                                <div class="col-md-3">
                                    <div class="field-group">
                                        <label for="banner">Logo</label>
                                        <input type="file" name="" id="banner" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <div class="field-group">
                                        <label for="icon">Icon</label>
                                        <input type="file" name="" id="icon" class="form-control">
                                    </div>
                                </div> -->

                                <div class="col-md-3">
                                    <div class="field-group">
                                        <label for="sort ">Sort</label>
                                        <input type="text" id="sort" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                </div>
            </div>

        </div>
    </div>
</div>