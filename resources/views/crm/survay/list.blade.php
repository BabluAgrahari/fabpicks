@extends('crm.layout.app')
@section('content')

<div class="card">
  <div class="card-header ">
    <div class="row">
      <div class="col-md-6">
        <h5>Survay </h5>
      </div>
      <div class="col-md-6 ">
        <div class="product-btn d-flex justify-content-end">

          <button type="button" class="btn btn-success" data-bs-toggle="modal" id="addSurvay" data-bs-target="#survayModel">
            <i class="ri-add-circle-line"></i> Add
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-md-12 ">
        <div class="table-responsive">
          <table class="table products-table">
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
              @foreach($lists as $keys=> $list)
              <tr>
                <th scope="row">{{++$keys}}</th>
                <td>{{$list->title}}</td>
                <td>{{$list->discription}}</td>
                <td>{{$list->type}}</td>
                <td>
                  <div class="action-group ">
                    <a href="javascript:void(0)" _id="{{$list->_id}}" class="text-info edit"><i class="ri-pencil-line"></i></a>
                    <!-- <a href="#"><i class="ri-delete-bin-line"></i></a> -->
                    <a href="javascript:void(0);" class="addQuestion text-info" _id="{{$list->_id}}"><i class="ri-add-circle-line"></i></a>
                    <a href="javascript:void(0);" class="text-primary viewQuestion" _id="{{$list->_id}}"><i class="ri-eye-line"></i></a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@push('modal')

<!--Survay Add Modal -->
<div class="modal fade" id="survayModel" tabindex="-1" aria-labelledby="survayLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="survayLabel">Survay Add</h1>
        <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container ">
          <div id="message"></div>
          <form id="saveSurvay" action="{{url('crm/survay')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="put"></div>
            <div class="row">
              <div class="col-md-6">
                <div class="field-group">
                  <label>Title</label>
                  <input type="text" name="title" id="title" placeholder="Enter Title Name" class="form-control">
                  <span class="text-danger" id="title_msg"></span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="field-group">
                  <label for="type-of-survay">Type of Survay</label>
                  <select name="type" id="type" class="form-select ">
                    <option value="">Select</option>
                    <option value="pre_qulifing_question">Pre-Qulifing Questions</option>
                    <option value="no_feedback">Feedback</option>
                  </select>
                  <span class="text-danger" id="type_msg"></span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="field-group">
                  <label for="type-of-survay">Discription </label>
                  <textarea name="discription" id="discription" placeholder="Enter Discription" class="form-control"></textarea>
                </div>
                <span class="text-danger" id="discription_msg"></span>
              </div>

              <div class="col-md-6 mt-3">
                <div class="field-group text-center">
                  <button type="submit" class="btn btn-success btn-sm" id="save">Save</button>
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
<div class="modal fade" id="allSurvay" tabindex="-1" aria-labelledby="survayLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="survayLabel">All Survay Question</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">

          <div id="allQuestion"></div>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- end all survay Type Modal -->

@endpush

@push('js')

<script>
  $('#addSurvay').click(function(e) {
    e.preventDefault();
    $('#survayLabel').html('Add Survay');
    $('#save').html('Save');
    $('form#saveSurvay').attr('action', '{{ url("crm/survay") }}');
    $('#put').html('');
    $('#survayModel').modal('show');
  });
  /*start form submit functionality*/
  $("form#saveSurvay").submit(function(e) {
    e.preventDefault();

    formData = new FormData(this);
    var url = $(this).attr('action');
    let update = $('#putInput').val();
    let label1 = update == 'PUT' ? 'Update' : 'Save';
    let label2 = update == 'PUT' ? 'Updating...' : 'Saving...';
    $.ajax({
      data: formData,
      type: "POST",
      url: url,
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function() {
        $('#save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;${label2}`).attr('disabled', true);
      },
      success: function(res) {

        //hide loader
        $('#save').html(label1).removeAttr('disabled');

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
          $('form#saveSurvay').trigger('reset');
      }
    });
  });

  //for edit
  $(document).on('click', '.edit', function(e) {
    e.preventDefault(0);

    let id = $(this).attr('_id');
    let url = "{{url('crm/survay')}}/" + id + "/edit";
    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'JSON',
      success: function(res) {

        if (res.status) {
          $('#title').val(res.record.title);
          $('#discription').val(res.record.discription);
          $('#type').val(res.record.type);
          $('#survayLabel').html('Edit Survay');
          $('#save').html('Update');
          $('form#saveSurvay').attr('action', '{{ url("crm/survay") }}/' + id);
          $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
          $('#survayModel').modal('show');
        }
      }
    })
  });
</script>

<script>
  $(document).on('click', '.viewQuestion', function(e) {

    let id = $(this).attr('_id');
    let url = "{{url('crm/survay-question')}}/" + id;
    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'JSON',
      success: function(res) {

        let html = '';
        let record = res.record;
        if (record == '') {
          html += `<div class="row">
            <div class="col-md-12 text-center">Not Added Any Question.</div></div>`;
        }
        $.each(record, (index, val) => {

          html += `<div class="row">
            <div class="col-md-12">
              <div class="all-feedback-container">
                <div class="all-feedback-question">
                  <p>Q-${++index} ${val.survay_question} </p>
                </div>

                <div class="all-feedback-options">`;

          if (val.survay_type == 'single_choise') {
            $.each(val.data.option, (ind, option) => {
              let checked = (ind == val.data.answer) ? 'checked' : 'disabled';
              html += `<div class="form-check">
                    <input class="form-check-input" type="radio" ${checked}>
                    <label class="form-check-label">${option}</label>
                  </div>`;
            })
          } else if (val.survay_type == 'multi_choise') {
            $.each(val.data.option, (ind, option) => {
              let checked = (val.data.answer.hasOwnProperty(ind)) ? 'checked' : 'disabled'
              html += `<div class="form-check">
                    <input class="form-check-input" type="checkbox" ${checked}>
                    <label class="form-check-label">${option}</label>
                  </div>`;
            })
          } else if (val.survay_type == 'yes_no') {
            let checked = (val.data.answer == "1") ? 'checked' : 'disabled';
            html += `<div class="form-check">
                    <input class="form-check-input" type="radio" ${checked}>
                    <label class="form-check-label">Yes</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" ${checked}>
                    <label class="form-check-label">No</label>
                  </div>`;
          } else if (val.survay_type == 'rating') {
            html += `
                  <div class="hello mt-0">
                    <div class="star-rating js-star-rating">
                      <input class="star-rating__input" type="radio" name="rating" value="1"><i class="star-rating__star"></i>
                      <input class="star-rating__input" type="radio" name="rating" value="2"><i class="star-rating__star"></i>
                      <input class="star-rating__input" type="radio" name="rating" value="3"><i class="star-rating__star"></i>
                      <input class="star-rating__input" type="radio" name="rating" value="4"><i class="star-rating__star"></i>
                      <input class="star-rating__input" type="radio" name="rating" value="5"><i class="star-rating__star"></i>
                      <div class="current-rating current-rating--${val.data.rating} js-current-rating"><i class="star-rating__star">AAA</i></div>
                    </div>
                  </div>`;
          } else if (val.survay_type == 'upload_image') {

            let image = (val.data != null) ? "{{asset('survay')}}/" + val.data.image : defaultImg('400x300');
            let src = image;
            html += `<div class="all-feedback-img-option">
                    <img src="${src}" alt="">
                  </div>`;
          } else if (val.survay_type == 'subjective_question') {
            html += `<div class="form-check">---</div>`;
          }
          html += `</div>
              </div>
            </div>
          </div>`;
        });
        $('#allQuestion').html(html);
        $('#allSurvay').modal('show');
      }
    })

  })
</script>
@include('crm.survay.survayQuestion')

@endpush


@endsection