@extends('crm.layout.app')
@section('content')
<div class="container ">

    <div class="row">
        <div class="col-md-6">
            <h4 class="page-title"> Push Notification</h4>
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" id="addPush" data-bs-target="#pushNotification">
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
                        <th scope="col">User Group </th>
                        <th scope="col">Subject </th>
                        <th scope="col">Push Notification </th>
                        <th scope="col">icon</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lists as $key=>$list)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$list->user_group}}</td>
                        <td>{{$list->subject}}</td>
                        <td>{{$list->notification}}</td>
                        <td><img src="{{asset('pushNotification/'.$list->icon)}}" style="height:50px; width:60px;"></td>
                        <td>
                            <div class="action-group">
                                <a href="javascript:void(0)" _id="{{$list->_id}}" class="edit"><i class="ri-pencil-line"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('modal')

<!-- push notification Modal -->
<div class="modal fade" id="pushNotification" tabindex="-1" aria-labelledby="pushNotificationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pushNotificationLabel">Add Push Notification</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="message"></div>
                <form id="savePush" action="{{url('crm/push-notification')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="put"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-group">
                                <label for="user-group ">Select User Group: <span class="required">*</span></label>
                                <select name="user_group" id="user_group" class="form-select  ">
                                    <option value="" selected>Please select user group</option>
                                    <option value="usergroup-1">usergroup-1</option>
                                    <option value="usergroup-2">usergroup-2</option>
                                    <option value="usergroup-3">usergroup-3</option>
                                    <option value="usergroup-4">usergroup-4</option>
                                    <option value="usergroup-5">usergroup-5</option>
                                    <option value="usergroup-6">usergroup-6</option>
                                </select>
                            </div>
                            <span class="text-danger" id="user_group_msg"></span>
                        </div>

                        <div class="col-md-6">
                            <div class="field-group">
                                <label for="subject">Subject: <span class="required">*</span></label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Hey! New stock arrived!">
                            </div>
                            <span class="text-danger" id="subject_msg"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-group">
                                <label for="notification-body">Notification Body: <span class="required">*</span></label>
                                <textarea name="notification" id="notification" placeholder="Hey I want to tell you something awesome thing!" class="form-control"></textarea>
                            </div>
                            <span class="text-danger" id="notification_msg"></span>
                        </div>

                        <div class="col-md-6">
                            <div class="field-group">
                                <label for="notification-icon">Notification Icon: <span class="required">*</span></label>
                                <input type="file" id="icon" name="icon" class="form-control">
                                <span class="note"><i class="fa-solid fa-circle-info"></i> If not enter than default icon will use which you upload at time of create one signal app.</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="field-group text-center">
                            <button type="submit" class="btn btn-success btn-sm" id="save">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
    $('#addPush').click(function(e) {
        e.preventDefault();
        $('#pushNotificationLabel').html('Add Push Notification');
        $('#save').html('Save');
        $('form#savePush').attr('action', '{{ url("crm/push-notification") }}');
        $('#put').html('');
        $('#pushNotification').modal('show');
    });
    /*start form submit functionality*/
    $("form#savePush").submit(function(e) {
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
                    $('form#savePush').trigger('reset');
            }
        });
    });
    //for edit
    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "{{url('crm/push-notification')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#user_group').val(res.record.user_group);
                    $('#notification').val(res.record.notification);
                    $('#subject').val(res.record.subject);
                    $('#pushNotificationLabel').html('Edit Push Notification');
                    $('#save').html('Update');
                    $('form#savePush').attr('action', '{{ url("crm/push-notification") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#pushNotification').modal('show');
                }
            }
        })
    });
</script>
@endpush


@endsection