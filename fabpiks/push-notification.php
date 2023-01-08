<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Push Notification</title>
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

          <div class="row">
            <div class="col-md-6">
              <h4 class="page-title"> Push Notification</h4>
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pushnotification">
                Add Push Notification
              </button>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mt-5">
              <table class="table table-light table-striped push-notification" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Total </th>
                    <th scope="col">Send </th>
                    <th scope="col">Subject </th>
                    <th scope="col">Message</th>
                    <th scope="col">icon</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>10</td>
                    <td>10</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>
                      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis suscipit possimus facilis quis consequuntur nesciunt.</p>
                    </td>
                    <td>icon</td>
                    <td>Send</td>
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

  <script src="./assets/js/main.js"></script>
  <script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
  </script>


</body>

</html>


<!-- push notification Modal -->
<div class="modal fade" id="pushnotification" tabindex="-1" aria-labelledby="pushnotificationLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="pushnotificationLabel">Add Push Notification</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" class="custom-form">
          <div class="row">
            <div class="col-md-6">
              <div class="field-group">
                <label for="user-group ">Select User Group: <span class="required">*</span></label>
                <select name="" id="user-group" class="form-select  ">
                  <option value="" selected>Please select user group</option>
                  <option value="usergroup-1">usergroup-1</option>
                  <option value="usergroup-2">usergroup-2</option>
                  <option value="usergroup-3">usergroup-3</option>
                  <option value="usergroup-4">usergroup-4</option>
                  <option value="usergroup-5">usergroup-5</option>
                  <option value="usergroup-6">usergroup-6</option>

                </select>

              </div>
            </div>
            <div class="col-md-6">
              <div class="field-group">
                <label for="subject">Subject: <span class="required">*</span></label>
                <input type="text" id="subject" class="form-control" placeholder="Hey! New stock arrived!">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="field-group">
                <label for="notification-body">Notification Body: <span class="required">*</span></label>
                <textarea name="" id="notification-body" placeholder="Hey I want to tell you something awesome thing!" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="field-group">
                <label for="notification-icon">Notification Icon: <span class="required">*</span></label>
                <input type="file" id="notification-icon" class="form-control">
                <span class="note"><i class="fa-solid fa-circle-info"></i> If not enter than default icon will use which you upload at time of create one signal app.</span>
              </div>
            </div>
          </div>




          <div class="row">
            <div class="col-md-4">

              <button type="submit" class="btn btn-success ml-4">Submit</button>
            </div>



          </div>

        </form>
      </div>

    </div>
  </div>
</div>