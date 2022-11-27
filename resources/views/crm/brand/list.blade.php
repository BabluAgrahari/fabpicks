@extends('crm.layout.app')
@section('content')

<div class="container ">
    <div class="row">

    <div id="messageRemove"></div>
        <div class="col-md-11">
            <h4>Brand</h4>
        </div>

        <div class="col-md-1 mb-3 product-btn-group">
            <button type="button" class="btn btn-success" id="addBrand">
                <i class="ri-add-circle-line"></i> Add
            </button>
        </div>

        <div class="col-md-12 ">
            <table class="table table-light table-striped custom-table" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Sort</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lists as $key=>$list)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$list->name}}</td>
                        <td><img src="{{asset('brand/'.$list->logo)}}" style="height:50px; width:60px;"></td>
                        <td>{{$list->sort}}</td>
                        <td>
                            <div class="action-group">
                                <a href="javascript:void(0)" _id="{{$list->_id}}" class="edit"><i class="ri-pencil-line"></i></a>
                                <a href="javascript:void(0)" _id="{{$list->_id}}" class="remove"><i class="ri-delete-bin-line"></i>
                                </a>
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
<div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="productcategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="brandLabel">Add Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container ">

                    <div id="message"></div>

                    <div class="row">

                        <form id="saveBrand" action="{{url('crm/brand')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="put"></div>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="field-group">
                                        <label for="category-name ">Brand Name</label>
                                        <input type="text" name="name" id="brandName" class="form-control">
                                        <span class="text-danger" id="name_msg"></span> 
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="field-group">
                                        <label for="banner">Logo</label>
                                        <input type="file" name="logo" id="" class="form-control">
                                        <span class="text-danger" id="logo_msg"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="field-group">
                                        <label for="sort ">Sort</label>
                                        <input type="number" name="sort" id="sort" class="form-control">
                                        <span class="text-danger" id="sort_msg"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="field-group">
                                        <div class="form-check form-switch custom-switch">
                                            <label class="form-check-label" for="active">Active/Inactive</label>
                                            <input class="form-check-input" name="status" type="checkbox" value="1" role="switch" id="status" checked>
                                            <span class="text-danger" id="status_msg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-sm" id="save">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endpush

@push('js')
<script>
    $('#addBrand').click(function(e) {
        e.preventDefault();
        $('#brandLabel').html('Add Brand');
        $('#save').html('Save');
        $('form#saveBrand').attr('action', '{{ url("crm/brand") }}');
        $('#put').html('');
        $('#brandModal').modal('show');
    });

    /*start form submit functionality*/
    $("form#saveBrand").submit(function(e) {
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
                    $('form#saveBrand').trigger('reset');
            }
        });
    });
    /*end form submit functionality*/

    //for edit
    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "{{url('crm/brand')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#brandName').val(res.record.name);
                    $('#sort').val(res.record.sort);
                    let status = res.record.status ? true : false;
                    $('#status').prop('checked', status);

                    $('#brandLabel').html('Edit Brand');
                    $('#save').html('Update');
                    $('form#saveBrand').attr('action', '{{ url("crm/brand") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#brandModal').modal('show');
                }
            }
        })
    });

    //for remove record
    $(document).on('click', '.remove', function(e) {
        e.preventDefault(0);
        let id = $(this).attr('_id');
        let url = "{{url('crm/brand')}}/" + id;
        let tr = $(this).parent().parent().parent();
        removeRecord(tr, url);
    })
    //fetch all record
    // $('#dataTable').DataTable({
    //     lengthMenu: [
    //         [10, 30, 50, 100, 500],
    //         [10, 30, 50, 100, 500]
    //     ], // page length options
    //     bProcessing: true,
    //     serverSide: true,
    //     scrollY: "auto",
    //     scrollCollapse: true,
    //     'ajax': {
    //         "dataType": "json",
    //         url: "{{ url('crm/all-brand') }}",
    //         data: {}
    //     },
    //     columns: [{
    //             data: "sl_no"
    //         },
    //         {
    //             data: 'bank_name'
    //         },
    //         {
    //             data: "account_no"
    //         },
    //         {
    //             data: 'ifsc'
    //         },
    //         {
    //             data: 'holder_name'
    //         },
    //         {
    //             data: "created_date"
    //         },
    //         {
    //             data: "status"
    //         },
    //         {
    //             data: "action"
    //         }
    //     ],
    //     columnDefs: [{
    //         orderable: false,
    //         targets: [0, 1, 2, 3, 4, 5, 6, 7]
    //     }],
    // });
</script>
@endpush

@endsection