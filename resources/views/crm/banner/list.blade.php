@extends('crm.layout.app')
@section('content')

<div id="messageRemove"></div>
<div class="card">
    <div class="card-header ">
        <div class="row">

            <div class="col-md-9">
                <h5><x-icon type="list" />Banner</h5>
            </div>

            <div class="col-md-3 product-btn-group d-flex justify-content-end">
                
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
                                <th scope="col">Banner Name</th>
                                <th scope="col">URL</th>
                                <th scope="col">Banner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{ucWords($list->name)}}</td>
                                <td>{{ucWords($list->url)}}</td>
                                <td><img src="{{$list->banner ?? defaultImg()}}" style="height:50px; width:60px;"></td>

                                @if(isAdmin())
                                <td>
                                    <div class="action-group">
                                        <a href="javascript:void(0)" _id="{{$list->_id}}"  class="edit text-info"><x-icon type="edit"/></a>

                                    </div>
                                </td>
                                @endif
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
<div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="productcategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-6" id="brandLabel">Update Banner</h1>
                <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- <div class="container "> -->

                    <div id="message"></div>

                    <div class="row">

                        <form id="bannerupdate" action="{{url('crm/banner/'.$res->_id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="putInput" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="field-group">
                                        <label>Name</label>
                                        <input type="text" id="name" name="name" class=" form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="field-group">
                                        <label>URL</label>
                                        <input type="text" id="url" name="url" class=" form-control" placeholder="Enter URL">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="field-group">
                                        <label>Banner</label>
                                        <input type="file" id="banner" name="banner" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button class="btn btn-success" id="update">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <!-- </div> -->
            </div>

        </div>
    </div>
</div>
@endpush

@push('js')
<script>
    // //for edit
    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "{{url('crm/banner')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('form#bannerupdate').attr('action', '{{ url("crm/banner") }}/' + id);
                    $('#name').val(res.record.name);
                    $('#url').val(res.record.url);
                    $('#bannerModal').modal('show');
                }
            }
        })
    });

    $("form#bannerupdate").submit(function(e) {
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
                $('#update').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Updating`).attr('disabled', true);
            },
            success: function(res) {

                //hide loader
                $('#update').html('Update').removeAttr('disabled');

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