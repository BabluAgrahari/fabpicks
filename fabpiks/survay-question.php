<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Survay Question</title>
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
        <div class="container ">
          <!-- <div class="row">
            <div class="col-md-12">
              <h4 class="page-title">Survay Question</h4>
            </div>
            <form action="#" class="custom-form">

              <div class="row">
                <div class="col-md-4">
                  <div class="field-group">
                    <label for="type-of-questions">Type of Questions: </label>
                    <select name="" class="form-select js-example-basic-single" id="size_select">
                      <option value="" selected>Please select user group</option>
                      <option value="option1">Signle Choice</option>
                      <option value="option2">Multi Choice</option>
                      <option value="option3">Yes/No</option>
                      <option value="option4">Rating</option>
                      <option value="option5">Upload Image</option>
                    </select>

                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-8">
                  <div id="option1" class="size_chart">
                    <div class="feedback-container">
                      <form action="">
                        <div class="feedback-question">
                          <div class="field-group">
                            <label for="question">Write Your Question <span class="required">*</span></label>
                            <input type="text" id="question" class="form-control" placeholder="Write Your Question">
                          </div>
                        </div>
                        <div class="feedback-option mt-4">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="feedbackoption" id="feedbackoption1" checked>
                            <label class="form-check-label" for="feedbackoption1">
                              <input type="text" class="form-control" placeholder="write your option">
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="feedbackoption" id="feedbackoption2">
                            <label class="form-check-label" for="feedbackoption2">
                              <input type="text" class="form-control" placeholder="write your option">
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="feedbackoption" id="feedbackoption3">
                            <label class="form-check-label" for="feedbackoption3">
                              <input type="text" class="form-control" placeholder="write your option">
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="feedbackoption" id="feedbackoption4">
                            <label class="form-check-label" for="feedbackoption4">
                              <input type="text" class="form-control" placeholder="write your option">
                            </label>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success ml-4 mt-4">Submit</button>
                      </form>
                    </div>
                  </div>
                  <div id="option2" class="size_chart">
                    <div class="feedback-container">
                      <form action="">
                        <div class="feedback-question">
                          <div class="field-group">
                            <label for="question1">Write Your Question <span class="required">*</span></label>
                            <input type="text" id="question1" class="form-control" placeholder="Write Your Question">
                          </div>
                        </div>
                        <div class="feedback-options mt-4">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="feedbackoption" id="feedbackcheckbox1" checked>
                            <label class="form-check-label" for="feedbackcheckbox">
                              <input type="text" class="form-control" placeholder="write your option">
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="feedbackoption" id="feedbackcheckbox2">
                            <label class="form-check-label" for="feedbackcheckbox2">
                              <input type="text" class="form-control" placeholder="write your option">
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="feedbackoption" id="feedbackcheckbox3">
                            <label class="form-check-label" for="feedbackcheckbox3">
                              <input type="text" class="form-control" placeholder="write your option">
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="feedbackoption" id="feedbackcheckbox4">
                            <label class="form-check-label" for="feedbackcheckbox4">
                              <input type="text" class="form-control" placeholder="write your option">
                            </label>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success ml-4 mt-4">Submit</button>
                      </form>
                    </div>
                  </div>
                  <div id="option3" class="size_chart">
                    <div class="feedback-container">

                      <form action="">
                        <div class="feedback-question">
                          <div class="field-group">
                            <label for="question1">Write Your Question <span class="required">*</span></label>
                            <input type="text" id="question1" class="form-control" placeholder="Write Your Question">
                          </div>
                        </div>
                        <div class="feedback-options mt-4">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="feedbackoptionyesno" id="feedbackyesno1" checked>
                            <label class="form-check-label" for="feedbackyesno1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="feedbackoptionyesno" id="feedbackyesno2">
                            <label class="form-check-label" for="feedbackyesno2">
                              No
                            </label>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success ml-4 mt-4">Submit</button>
                      </form>
                    </div>
                  </div>
                  <div id="option4" class="size_chart">
                    <div class="feedback-container">
                      <form action="">
                        <div class="feedback-question">
                          <div class="field-group">
                            <label for="question1">Write Your Question <span class="required">*</span></label>
                            <input type="text" id="question1" class="form-control" placeholder="Write Your Question">
                          </div>
                        </div>
                        <div class="feedback-options">
                          <div class=hello>
                            <div class="star-rating js-star-rating">
                              <input class="star-rating__input" type="radio" name="rating" value="1"><i class="star-rating__star"></i>
                              <input class="star-rating__input" type="radio" name="rating" value="2"><i class="star-rating__star"></i>
                              <input class="star-rating__input" type="radio" name="rating" value="3"><i class="star-rating__star"></i>
                              <input class="star-rating__input" type="radio" name="rating" value="4"><i class="star-rating__star"></i>
                              <input class="star-rating__input" type="radio" name="rating" value="5"><i class="star-rating__star"></i>
                              <div class="current-rating current-rating--3-5 js-current-rating"><i class="star-rating__star">AAA</i></div>
                            </div>
                          </div>
                        </div><button type="submit" class="btn btn-success ml-4 mt-4">Submit</button>
                      </form>
                    </div>
                  </div>
                  <div id="option5" class="size_chart">
                    <div class="feedback-container">
                    
                      <form action="" method="post">  
                        <input type="file" name="imahge" class="form-control" id="">
                        <input type="submit" class="btn btn-success my-4" value="submit" name="submit">
                      </form>
                    </div>
                  </div>

                </div>

              </div>




            </form>
          </div> -->
          <div class="row">
            <div class="col-md-6">
              <h4 class="page-title">Survay Question</h4>

            </div>
            <div class="col-md-6 ">
              <div class="product-btn d-flex justify-content-end">

                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#survay-add">
                  <i class="ri-add-circle-line"></i> Add
                </button>
              </div>
            </div>

            <div class="col-md-12 ">
              <table class="table table-light table-striped products-table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Survay Type</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Survay Title</td>
                    <td>Survay Discription</td>
                    <td>Survay Type</td>
                    <td>
                      <div class="action-group">
                        <a href="#"><i class="ri-pencil-line"></i></a>
                        <a href="#"><i class="ri-delete-bin-line"></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#survay-type"><i class="ri-add-circle-line"></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#all-survay"><i class="ri-eye-line"></i></a>
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script src="./assets/js/rating.js"></script>
  <script src="./assets/js/main.js"></script>
  <script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });

    $(document).ready(function() {

      //hides dropdown content
      $(".size_chart").hide();

      //unhides first option content
      // $("#option1").show();

      //listen to dropdown for change
      $("#size_select").change(function() {
        //rehide content on change
        $('.size_chart').hide();
        //unhides current item
        $('#' + $(this).val()).show();
      });

    });
  </script>




</body>

</html>


<!--Survay Add Modal -->
<div class="modal fade" id="survay-add" tabindex="-1" aria-labelledby="survayLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="survayLabel">Survay Add</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container ">
          <div class="row">

            <form action="#">
              <div class="row">
                <div class="col-md-6">
                  <div class="field-group">
                    <label for="survay-title">Title</label>
                    <input type="text" id="survay-title" class="form-control">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="field-group">
                    <label for="type-of-survay">Type of Survay </label>
                    <select name="" id="type-of-survay" class="form-select ">
                      <option value="" selected>Select</option>
                      <option value="type-1">type-1</option>
                      <option value="type-2">type-2</option>
                      <option value="type-3">type-3</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="field-group">
                    <label for="type-of-survay">Discription </label>
                    <textarea name="" id="type-of-survay" class="form-control"></textarea>
                  </div>
                </div>

                <div class="col-md-6 mt-3">
                  <div class="field-group">
                    <button class="btn btn-success">Submit</button>
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

<!--Survay Type Modal -->
<div class="modal fade" id="survay-type" tabindex="-1" aria-labelledby="survayLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="survayLabel">Survay Type</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">

          <form action="#" class="custom-form">
            <div class="row">
              <div class="col-md-4">
                <div class="field-group">
                  <label for="type-of-questions">Type of Questions: </label>
                  <select name="" class="form-select " id="size_select">
                    <option value="" selected>Please select user group</option>
                    <option value="option1">Signle Choice</option>
                    <option value="option2">Multi Choice</option>
                    <option value="option3">Yes/No</option>
                    <option value="option4">Rating</option>
                    <option value="option5">Upload Image</option>
                  </select>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12">
                <div id="option1" class="size_chart">
                  <div class="feedback-container">
                    <form action="">
                      <div class="feedback-question">
                        <div class="field-group">
                          <label for="question">Write Your Question <span class="required">*</span></label>
                          <div class="required-feild">
                            <input type="text" id="question" class="form-control" placeholder="Write Your Question">
                            <input type="checkbox" class="checkbox-required ">
                          </div>
                        </div>
                      </div>
                      <div class="feedback-options mt-4">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="feedbackoption" id="feedbackoption1" checked>
                          <label class="form-check-label " for="feedbackoption1">
                            <input type="text" class="form-control" placeholder="write your option">

                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="feedbackoption" id="feedbackoption2">
                          <label class="form-check-label" for="feedbackoption2">
                            <input type="text" class="form-control" placeholder="write your option">
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="feedbackoption" id="feedbackoption3">
                          <label class="form-check-label" for="feedbackoption3">
                            <input type="text" class="form-control" placeholder="write your option">
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="feedbackoption" id="feedbackoption4">
                          <label class="form-check-label" for="feedbackoption4">
                            <input type="text" class="form-control" placeholder="write your option">
                          </label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success ml-4 mt-4">Submit</button>
                    </form>
                  </div>
                </div>
                <div id="option2" class="size_chart">
                  <div class="feedback-container">
                    <form action="">
                      <div class="feedback-question">
                        <div class="field-group">
                          <label for="question1">Write Your Question <span class="required">*</span></label>
                          <div class="required-feild">
                            <input type="text" id="question1" class="form-control" placeholder="Write Your Question">
                            <input type="checkbox" class="checkbox-required ">
                          </div>
                        </div>
                      </div>
                      <div class="feedback-options mt-4">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="feedbackoption" id="feedbackcheckbox1" checked>
                          <label class="form-check-label" for="feedbackcheckbox">
                            <input type="text" class="form-control" placeholder="write your option">
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="feedbackoption" id="feedbackcheckbox2">
                          <label class="form-check-label" for="feedbackcheckbox2">
                            <input type="text" class="form-control" placeholder="write your option">
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="feedbackoption" id="feedbackcheckbox3">
                          <label class="form-check-label" for="feedbackcheckbox3">
                            <input type="text" class="form-control" placeholder="write your option">
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="feedbackoption" id="feedbackcheckbox4">
                          <label class="form-check-label" for="feedbackcheckbox4">
                            <input type="text" class="form-control" placeholder="write your option">
                          </label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success ml-4 mt-4">Submit</button>
                    </form>
                  </div>
                </div>
                <div id="option3" class="size_chart">
                  <div class="feedback-container">

                    <form action="">
                      <div class="feedback-question">
                        <div class="field-group">
                          <label for="question3">Write Your Question <span class="required">*</span></label>
                          <div class="required-feild">
                            <input type="text" id="question3" class="form-control" placeholder="Write Your Question">
                            <input type="checkbox" class="checkbox-required ">
                          </div>
                        </div>
                      </div>
                      <div class="feedback-options mt-4">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="feedbackoptionyesno" id="feedbackyesno1" checked>
                          <label class="form-check-label" for="feedbackyesno1">
                            Yes
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="feedbackoptionyesno" id="feedbackyesno2">
                          <label class="form-check-label" for="feedbackyesno2">
                            No
                          </label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success ml-4 mt-4">Submit</button>
                    </form>
                  </div>
                </div>
                <div id="option4" class="size_chart">
                  <div class="feedback-container">
                    <form action="">
                      <div class="feedback-question">
                        <div class="field-group">
                          <label for="question4">Write Your Question <span class="required">*</span></label>
                          <div class="required-feild">
                            <input type="text" id="question4" class="form-control" placeholder="Write Your Question">
                            <input type="checkbox" class="checkbox-required ">
                          </div>
                        </div>
                      </div>
                      <div class="feedback-options">
                        <div class="hello">
                          <div class="star-rating js-star-rating">
                            <input class="star-rating__input" type="radio" name="rating" value="1"><i class="star-rating__star"></i>
                            <input class="star-rating__input" type="radio" name="rating" value="2"><i class="star-rating__star"></i>
                            <input class="star-rating__input" type="radio" name="rating" value="3"><i class="star-rating__star"></i>
                            <input class="star-rating__input" type="radio" name="rating" value="4"><i class="star-rating__star"></i>
                            <input class="star-rating__input" type="radio" name="rating" value="5"><i class="star-rating__star"></i>
                            <div class="current-rating current-rating--3-5 js-current-rating"><i class="star-rating__star">AAA</i></div>
                          </div>
                        </div>
                      </div><button type="submit" class="btn btn-success ml-4 mt-4">Submit</button>
                    </form>
                  </div>
                </div>
                <div id="option5" class="size_chart">
                  <div class="feedback-container">
                    <form action="" method="post">
                      <div class="feedback-question">
                        <div class="field-group">
                          <label for="question5">Write Your Question <span class="required">*</span></label>
                          <div class="required-feild">
                            <input type="text" id="question5" class="form-control" placeholder="Write Your Question">
                            <input type="checkbox" class="checkbox-required ">
                          </div>
                        </div>
                      </div>
                      <div class="feedback-option mt-3">
                        <input type="file" name="imahge" class="form-control" id="">
                        <input type="submit" class="btn btn-success my-4" value="submit" name="submit">
                      </div>

                    </form>
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

<!--All Survay Type Modal -->
<div class="modal fade" id="all-survay" tabindex="-1" aria-labelledby="survayLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="survayLabel">All Survay Question</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">


          <div class="row">
            <div class="col-md-12">
              <div class="all-feedback-container">
                <div class="all-feedback-question">
                  <p>Q-1 Which brand is best for laptop? </p>
                </div>
                <div class="all-feedback-options">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="feedbackoption" id="allfeedbackoption1" checked>
                    <label class="form-check-label" for="allfeedbackoption1">
                      Dell
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="feedbackoption" id="allfeedbackoption2">
                    <label class="form-check-label" for="allfeedbackoption2">
                      Lenova
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="feedbackoption" id="allfeedbackoption3">
                    <label class="form-check-label" for="allfeedbackoption3">
                      HP
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="feedbackoption" id="allfeedbackoption4">
                    <label class="form-check-label" for="allfeedbackoption4">
                      Asus
                    </label>
                  </div>
                </div>


              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="all-feedback-container">
                <div class="all-feedback-question">
                  <p>Q-2 Which brand is best for laptop? </p>
                </div>
                <div class="all-feedback-options">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="feedbackoption" id="allcheckboxoption1" checked>
                    <label class="form-check-label" for="allcheckboxoption1">
                      Dell
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="feedbackoption" id="allcheckboxoption2">
                    <label class="form-check-label" for="allcheckboxoption2">
                      Lenova
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="feedbackoption" id="allcheckboxoption3">
                    <label class="form-check-label" for="allcheckboxoption3">
                      HP
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="feedbackoption" id="allcheckboxoption4">
                    <label class="form-check-label" for="allcheckboxoption4">
                      Asus
                    </label>
                  </div>
                </div>


              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="all-feedback-container">
                <div class="all-feedback-question">
                  <p>Q-3 Which brand is best for laptop? </p>
                </div>
                <div class="all-feedback-options">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="yesnooption" id="allyesnooption1" checked>
                    <label class="form-check-label" for="allyesnooption1">
                      Yes
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="yesnooption" id="allyesnooption2">
                    <label class="form-check-label" for="allyesnooption2">
                      No
                    </label>
                  </div>

                </div>


              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="all-feedback-container">
                <div class="all-feedback-question">
                  <p>Q-4 Which brand is best for laptop? </p>
                </div>
                <div class="all-feedback-options">
                  <div class="hello mt-0">
                    <div class="star-rating js-star-rating">
                      <input class="star-rating__input" type="radio" name="rating" value="1"><i class="star-rating__star"></i>
                      <input class="star-rating__input" type="radio" name="rating" value="2"><i class="star-rating__star"></i>
                      <input class="star-rating__input" type="radio" name="rating" value="3"><i class="star-rating__star"></i>
                      <input class="star-rating__input" type="radio" name="rating" value="4"><i class="star-rating__star"></i>
                      <input class="star-rating__input" type="radio" name="rating" value="5"><i class="star-rating__star"></i>
                      <div class="current-rating current-rating--3-5 js-current-rating"><i class="star-rating__star">AAA</i></div>
                    </div>
                  </div>

                </div>


              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="all-feedback-container">
                <div class="all-feedback-question">
                  <p>Q-5 Which brand is best for laptop? </p>
                </div>
                <div class="all-feedback-options">
                  <div class="all-feedback-img-option">
                    <img src="data:image/jpeg;base64,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" alt="">
                  </div>

                </div>


              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>