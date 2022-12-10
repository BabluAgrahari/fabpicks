@extends('crm.layout.app')
@section('content')

<div class="container ">
          <div class="row">


            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8 mx-auto">
                  <div class="user-profile-info">
                  <div id="message"></div>
                    <div class="row">
                      <div class="col-md-8 border-right">
                        <div class="user-profile-details">
                          <h4>User Information</h4>
                          <form id="profileUpdate" action="{{url('crm/profile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="fName">First Name <span class="required">*</span></label>
                                  <input type="text" name="fname" value="{{$res->name}}" id="fName" placeholder="First Name">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="lName">Last Name <span class="required">*</span></label>
                                  <input type="text" id="lName" name="lname" value="{{$res->lname}}" placeholder="Last Name">
                                </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="uEmail">Email <span class="required">*</span></label>
                                  <input type="email" disabled id="uEmail" value="{{$res->email}}" name="email" placeholder="Email">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="phone">Phone <span class="required">*</span></label>
                                  <input type="text" id="phone" name="phone" value="{{$res->phone}}" placeholder="Phone">
                                </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="nPassword">New Password <span class="required">*</span></label>
                                  <input type="password" id="nPassword" placeholder="New Password">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="user-field-group">
                                  <label for="cPassword">Confirm Password <span class="required">*</span></label>
                                  <input type="password" id="cPassword" placeholder="Confirm Password">
                                </div>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col-12">
                                <div class="user-field-group">
                                  <label for="profile-pic">Upload Profile Pic </label>
                                  <input type="file" name="profile_img"  id="profile-pic">
                                </div>
                              </div>
                            </div>

                            <div class="row mt-5 mb-4">
                              <div class="col-12 d-flex justify-content-center">
                                <button type="submit" id="save" class="btn btn-success"> Update</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="user-profile-box">
                          <div class="user-profile-pic">
                            <div class="user-profile-img">
                              <img src="{{$res->profile_img ?? defaultImg()}}" class="img-fluid" alt="">
                            </div>
                            <div class="user-name">
                              <p>{{ucwords(Auth::User()->name)}} {{ucwords(Auth::User()->lname)}}</p>
                              <span><a href="mailto:sunil@gmail.com">{{ucwords(Auth::User()->email)}}</a></span>
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
        </div>

        @push('js')
<script>
    // //for edit

    $("form#profileUpdate").submit(function(e) {
        e.preventDefault();
        formData = new FormData(this);
        var url = $(this).attr('action');
        $.ajax({
            data: formData,
            type: "post",
            url: url,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Updating`).attr('disabled', true);
            },
            success: function(res) {

                //hide loader
                $('#save').html('Update').removeAttr('disabled');
              
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
            }
        });
    });
</script>
@endpush

@endsection
