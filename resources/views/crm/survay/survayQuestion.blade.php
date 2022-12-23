<style>
  .custom-form .row {
    margin-bottom: 0px !important;
  }

  /* question box start */

  .question-box {
    border: 1px solid lightgray;
    padding: 10px;
  }

  .ans-options {
    display: flex;
    align-items: center;
  }

  .ans-options .form-check {
    margin-right: 25px;
  }

  .ans-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .ans-group .ans-group-action .ans-btn {
    background-color: transparent;
    border: none;
    outline: none;
    margin: 0 10px;
  }

  /* question box end */

  .star-rating {
    margin: 0px !important;
  }
</style>
<!--Survay Question Modal -->
<div class="modal fade" id="survaryQuestionModel" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-6" id="survayLabel">Survay Question</h1>
        <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-flude">
          <div id="messageRem"></div>

          <form name="form1" id="saveSingleChoise" action="{{url('crm/survay-question')}}" enctype="multipart/form-data" class="custom-form">
            @csrf
            <div id="counter"></div>
            <input type="hidden" id="survay_id" name="survay_id" value="">
            <div class="row">
              <div class="col-md-6">
                <div class="field-group">
                  <label for="type-of-questions">Questions Type <span class="required">*</span></label>
                  <select name="survay_type" class="form-select " id="survay_type">
                    <option selected value="">Select</option>
                    <option value="single_choise">Signle Choice</option>
                    <option value="multi_choise">Multi Choice</option>
                    <option value="yes_no">Yes/No</option>
                    <option value="rating">Rating</option>
                    <option value="upload_image">Upload Image</option>
                    <option value="subjective_question">Subjective Question</option>
                  </select>
                  <span id="survay_type_msg" class="text-danger"></span>
                </div>
              </div>

              <div id="previewQuestion">
              </div>

              <div class="col-md-12">

                <div class="feedback-question d-none" id="question">
                  <hr>
                  <div class="row">
                    <div class="field-group col-md-8">
                      <label for="question">Write Your Question <span class="required">*</span></label>
                      <div class="required-feild">
                        <input type="text" name="survay_question" id="question" class="form-control" placeholder="Write Your Question">
                        <input type="checkbox" class="checkbox-required" value="1" name="required">
                      </div>
                      <span id="survay_question_msg" class="text-danger"></span>
                    </div>

                    <div class="field-group col-md-4">
                      <label for="question">Rewards Point <span class="required">*</span></label>
                      <div class="required-feild">
                        <input type="number" name="reward" id="reward" class="form-control" placeholder="Rewards Point">
                      </div>
                      <span id="reward_msg" class="text-danger"></span>
                    </div>

                  </div>
                </div>

                <div id="content"></div>

              </div>
            </div>

            <!-- <div class="row d-none mt-2" id="showBtn">
              <div class="col-md-4 text center">
                <button type="" class="btn btn-danger">Cancle</button>
                <button type="submit" id="saveBtn" class="btn btn-success">Save</button>
              </div>
            </div> -->

          </form>
        </div>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<!-- End survay Type Modal -->


<div class="modal fade" id="editQuestionModel" tabindex="-1" aria-labelledby="survayLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-6" id="survayLabel">Edit Survay Question</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="formContent">

      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    //hides dropdown content
    $(".size_chart").hide();

    //listen to dropdown for change
    $("#survay_type").change(function() {

      $('span.text-danger').html('');
      let val = $(this).val();
      let html = '';
      $('#question').removeClass('d-none');
      $('#showBtn').removeClass('d-none');
      if (val == 'single_choise') {
        html += `<div id="Single_Choise" class="size_chart">
                  <div class="feedback-container">

                    <div class="feedback-options mt-4">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="data[answer]" value="0" id="feedbackoption1" checked>
                        <label class="form-check-label " for="feedbackoption1">
                          <input type="text" name="data[option][]" class="form-control" placeholder="Option1">
                        </label>
                        <span id="single_option_0_msg" class="text-danger"></span>
                      </div>
                    
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="data[answer]" value="1" id="feedbackoption1">
                        <label class="form-check-label " for="feedbackoption1">
                          <input type="text" name="data[option][]" class="form-control" placeholder="Option2">
                        </label>
                        <span id="single_option_1_msg" class="text-danger"></span>
                      </div>
                   
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="data[answer]" value="2" id="feedbackoption1">
                        <label class="form-check-label " for="feedbackoption1">
                          <input type="text" name="data[option][]" class="form-control" placeholder="Option3">
                        </label>
                        <span id="single_option_2_msg" class="text-danger"></span>
                      </div>
                    
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="data[answer]" value="3" id="feedbackoption1">
                        <label class="form-check-label " for="feedbackoption1">
                          <input type="text" name="data[option][]" class="form-control" placeholder="Option4">
                        </label>
                        <span id="single_option_3_msg" class="text-danger"></span>
                      </div>

                      <div class="form-check">
                      <button type="submit" class="btn btn-sm btn-success" id="saveBtn" id="singleChoice"><x-icon type="save" />Save</button>
                      </div>

                    </div>

                  </div>
                </div>`;
      } else if (val == 'multi_choise') {
        html += `<div id="Multi_Choise" class="size_chart">
                  <div class="feedback-container">

                    <div class="feedback-options mt-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="data[answer][]" value="0" id="feedbackcheckbox1" checked>
                        <label class="form-check-label" for="feedbackcheckbox">
                          <input type="text" name="data[option][]" class="form-control" placeholder="Option1">
                        </label>
                        <span id="multi_option_0_msg" class="text-danger"></span>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="data[answer][]" value="1" id="feedbackcheckbox2">
                        <label class="form-check-label" for="feedbackcheckbox2">
                          <input type="text" name="data[option][]" class="form-control" placeholder="Option2">
                        </label>
                        <span id="multi_option_1_msg" class="text-danger"></span>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="data[answer][]" value="2" id="feedbackcheckbox3">
                        <label class="form-check-label" for="feedbackcheckbox3">
                          <input type="text" name="data[option][]" class="form-control" placeholder="Option3">
                        </label>
                        <span id="multi_option_2_msg" class="text-danger"></span>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="data[answer][]" value="3" id="feedbackcheckbox4">
                        <label class="form-check-label" for="feedbackcheckbox4">
                          <input type="text" name="data[option][]" class="form-control" placeholder="Option4">
                        </label>
                        <span id="multi_option_3_msg" class="text-danger"></span>
                      </div>

                      <div class="form-check">
                      <button type="submit" class="btn btn-sm btn-success" id="saveBtn" id="singleChoice"><x-icon type="save" />Save</button>
                      </div>

                    </div>
                  </div>
                </div>`;
      } else if (val == 'yes_no') {
        html += `<div id="Yes_No" class="size_chart">
                  <div class="feedback-container">

                    <div class="feedback-options mt-4">
                      <div class="form-check">
                        <input class="form-check-input" name="data[answer]" value="1" type="radio" id="feedbackyesno1" checked>
                        <label class="form-check-label" for="feedbackyesno1">Yes</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="data[answer]" value="0" id="feedbackyesno2">
                        <label class="form-check-label" for="feedbackyesno2">No</label>
                      </div>

                      <div class="form-check">
                      <button type="submit" class="btn btn-sm btn-success" id="saveBtn" id="singleChoice"><x-icon type="save" />Save</button>
                      </div>

                    </div>
                  </div>
                </div>`;
      } else if (val == 'rating') {
        html += `<div id="Rating" class="size_chart">
                  <div class="feedback-container">

                    <div class="feedback-options">
                      <div class="hello">
                        <div class="star-rating js-star-rating">
                          <input class="star-rating__input" type="radio" name="data[rating]" value="1"><i class="star-rating__star"></i>
                          <input class="star-rating__input" type="radio" name="data[rating]" value="2"><i class="star-rating__star"></i>
                          <input class="star-rating__input" type="radio" name="data[rating]" value="3"><i class="star-rating__star"></i>
                          <input class="star-rating__input" type="radio" name="data[rating]" value="4"><i class="star-rating__star"></i>
                          <input class="star-rating__input" type="radio" name="data[rating]" value="5"><i class="star-rating__star"></i>
                          <div class="current-rating current-rating--3 js-current-rating"><i class="star-rating__star">AAA</i></div>
                        </div>
                      </div>

                       <div class="form-check">
                      <button type="submit" class="btn btn-sm btn-success" id="saveBtn" id="singleChoice"><x-icon type="save" />Save</button>
                      </div>

                      </div>
                    </div>
                  </div>`;
      } else if (val == 'upload_image') {
        html += `<div id="Upload_Image" class="size_chart">
        <div class="row">            
        <div class="col-md-8 feedback-container">
                      <div class="feedback-option mt-3">
                        <input type="file" name="image" class="form-control">
                        <span id="image_msg" class="text-danger"></span>
                      </div>
                    </div>

                    <div class="col-md-4 mt-4 form-check">
                      <button type="submit" class="btn btn-sm btn-success" id="saveBtn" id="singleChoice"><x-icon type="save" />Save</button>
                      </div>
                      </div>

                  </div>`;
      } else if (val == 'subjective_question') {
        html += `<div class="size_chart">
                  <div class="row">            
                    <div class="col-md-12 mt-2 text-center form-check">
                      <button type="submit" class="btn btn-sm btn-success" id="saveBtn" id="singleChoice"> <x-icon type="save" />Save</button>
                      </div>
                      </div>
                  </div>`;
      } else {
        $('#question').addClass('d-none');
        $('#showBtn').addClass('d-none');
      }

      $('#content').html(html);
    });

  });


  $(document).on('click', '.addQuestion', function(e) {
    e.preventDefault(0);
    $('#survay_id').val($(this).attr('_id'));
    $('#survaryQuestionModel').modal('show');
  })

  /*start form submit functionality*/
  var i = 1;
  $("form#saveSingleChoise").submit(function(e) {
    e.preventDefault();
    var survay_type = $('#survay_type').val();
    $('#counter').html(`<input type="hidden" name="counter" value="${i}"> `);
    //alert('Your book is overdue');
    formData = new FormData(this);
    var url = $(this).attr('action');
    let update = $('#putInput').val();
    $.ajax({
      data: formData,
      type: "POST",
      url: url,
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function() {
        $('#saveBtn').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Saving`).attr('disabled', true);
      },
      success: function(res) {
        //hide loader
        $('#saveBtn').html(`<x-icon type="save" />Save`).removeAttr('disabled');

        /*Start Validation Error Message*/
        $('span.text-danger').html('');
        if (res.validation) {
          ValidationMsg(res.validation, res.type)
          return false;
        }
        /*End Validation Error Message*/

        /*Start Status message*/
        if (res.status || !res.status) {
          if (res.response) {
            $('#previewQuestion').append(res.response);
          }
          alertMsg(res.status, res.msg, 2000);
        }
        /*End Status message*/

        //for reset all field
        if (res.status)
          $('form#saveSingleChoise').trigger('reset');
          $('#survay_type').val(survay_type)
      }
    });
    i++;
  });

  function ValidationMsg(validation, type) {

    if (type == 'single_choise') {
      $.each(validation, (index, msg) => {
        if (index == 'data.option.0') {
          $('#single_option_0_msg').html(`${msg}`);
        } else if (index == 'data.option.1') {
          $('#single_option_1_msg').html(`${msg}`);
        } else if (index == 'data.option.2') {
          $('#single_option_2_msg').html(`${msg}`);
        } else if (index == 'data.option.3') {
          $('#single_option_3_msg').html(`${msg}`);
        }
        $(`#${index}_msg`).html(`${msg}`);
      });

    } else if (type == 'multi_choise') {
      $.each(validation, (index, msg) => {
        if (index == 'data.option.0') {
          $('#multi_option_0_msg').html(`${msg}`);
        } else if (index == 'data.option.1') {
          $('#multi_option_1_msg').html(`${msg}`);
        } else if (index == 'data.option.2') {
          $('#multi_option_2_msg').html(`${msg}`);
        } else if (index == 'data.option.3') {
          $('#multi_option_3_msg').html(`${msg}`);
        }
        $(`#${index}_msg`).html(`${msg}`);
      });

    } else {
      $.each(validation, (index, msg) => {

        $(`#${index}_msg`).html(`${msg}`);
      });
    }
  }

  /*edit questions*/
  // $(document).on('click', '.question-edit', function(e) {
  //   e.preventDefault(0);

  //   let id = $(this).attr('_id');
  //   var selector = $(this);
  //   $.ajax({
  //     url: "{{url('crm/edit-question')}}/" + id,
  //     type: "GET",
  //     dataType: 'JSON',
  //     success: function(res) {

  //       if (res.status) {
  //         $('#formContent').html(res.response);
  //         $('#editQuestionModel').modal('show');
  //       }
  //     }
  //   })
  // })
</script>