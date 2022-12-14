<!--Survay Question Modal -->
<div class="modal fade" id="survaryQuestionModel" tabindex="-1" aria-labelledby="survayLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="survayLabel">Survay Question</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div id="messageRem"></div>
          <form id="saveSingleChoise" action="{{url('crm/survay-question')}}" enctype="multipart/form-data" class="custom-form">
            @csrf
            <input type="hidden" id="survay_id" name="survay_id" value="">
            <div class="row">
              <div class="col-md-4">
                <div class="field-group">
                  <label for="type-of-questions">Type of Questions: </label>
                  <select name="survay_type" class="form-select " id="question_type">
                    <option value="">Please select user group</option>
                    <option value="single_choise">Signle Choice</option>
                    <option value="multi_choise">Multi Choice</option>
                    <option value="yes_no">Yes/No</option>
                    <option value="rating">Rating</option>
                    <option value="upload_image">Upload Image</option>
                    <option value="subjective_question">Subjective Question</option>
                  </select>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12">

                <div class="feedback-question d-none" id="question">
                  <div class="row">
                  <div class="field-group col-md-8">
                    <label for="question">Write Your Question <span class="required">*</span></label>
                    <div class="required-feild">
                      <input type="text" name="survay_question" id="question" class="form-control" placeholder="Write Your Question">
                      <input type="checkbox" class="checkbox-required" value="1" name="required">
                    </div>
                  </div>

                  <div class="field-group col-md-4">
                    <label for="question">Rewards Point <span class="required">*</span></label>
                    <div class="required-feild">
                      <input type="number" name="reward" id="reward" class="form-control" placeholder="Enter Rewards Point">
                    </div>
                  </div>

                </div>
                </div>

                <div id="content"></div>

              </div>

              <div class="row d-none" id="showBtn">
                <div class="col-md-4">
                  <button type="submit" id="saveBtn" class="btn btn-success btn-sm">Save</button>
                </div>
              </div>

          </form>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- End survay Type Modal -->


<script>
  $(document).ready(function() {

    //hides dropdown content
    $(".size_chart").hide();

    //listen to dropdown for change
    $("#question_type").change(function() {

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
                          <input type="text" name="data[option][]" class="form-control" placeholder="write your option">
                        </label>
                      </div>
                    
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="data[answer]" value="1" id="feedbackoption1">
                        <label class="form-check-label " for="feedbackoption1">
                          <input type="text" name="data[option][]" class="form-control" placeholder="write your option">
                        </label>
                      </div>
                   
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="data[answer]" value="2" id="feedbackoption1">
                        <label class="form-check-label " for="feedbackoption1">
                          <input type="text" name="data[option][]" class="form-control" placeholder="write your option">
                        </label>
                      </div>
                    
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="data[answer]" value="3" id="feedbackoption1">
                        <label class="form-check-label " for="feedbackoption1">
                          <input type="text" name="data[option][]" class="form-control" placeholder="write your option">
                        </label>
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
                          <input type="text" name="data[option][]" class="form-control" placeholder="write your option">
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="data[answer][]" value="1" id="feedbackcheckbox2">
                        <label class="form-check-label" for="feedbackcheckbox2">
                          <input type="text" name="data[option][]" class="form-control" placeholder="write your option">
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="data[answer][]" value="2" id="feedbackcheckbox3">
                        <label class="form-check-label" for="feedbackcheckbox3">
                          <input type="text" name="data[option][]" class="form-control" placeholder="write your option">
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="data[answer][]" value="3" id="feedbackcheckbox4">
                        <label class="form-check-label" for="feedbackcheckbox4">
                          <input type="text" name="data[option][]" class="form-control" placeholder="write your option">
                        </label>
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

                    </div>
                  </div>`;
      } else if (val == 'upload_image') {
        html += `<div id="Upload_Image" class="size_chart">
                    <div class="feedback-container">
                      <div class="feedback-option mt-3">
                        <input type="file" name="image" class="form-control">
                      </div>
                    </div>
                  </div>`;
      } else if(val=='subjective_question'){
       }else {
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
  $("form#saveSingleChoise").submit(function(e) {
    e.preventDefault();
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
        $('#saveBtn').html('Save').removeAttr('disabled');

        /*Start Validation Error Message*/
        $('span.text-danger').html('');
        if (res.validation) {
          $.each(res.validation, (index, msg) => {
            $(`#${index}_msg`).html(`${msg}`);
          })
          return false;
        }
        /*End Validation Error Message*/

        /*Start Status message*/
        if (res.status || !res.status) {
          alertMsg(res.status, res.msg, 2000);
        }
        /*End Status message*/

        //for reset all field
        if (res.status)
          $('form#saveSingleChoise').trigger('reset');
      }
    });
  });
</script>