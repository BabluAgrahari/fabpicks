@extends('crm.layout.app')
@section('content')

<div id="messageRemove"></div>
<div class="card">
    <div class="card-header ">
        <div class="row">

            <div class="col-md-6">
                <h5>Brand</h5>
            </div>

            <div class="col-md-6 product-btn-group d-flex justify-content-end">
                @if(!empty($filter))
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
                @else
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
                @endif
                @can('isAdmin')
                <a href="{{url('crm/brand-export')}}{{ !empty($_SERVER['QUERY_STRING'])?'?'.$_SERVER['QUERY_STRING']:''}}" class="btn btn-sm btn-success" id="">
                    <x-icon type="export" />Export
                </a>
                <a href="javascript:void(0);" class="btn btn-sm btn-success" id="addBrand">
                    <x-icon type="add" />Add
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card-body">
        @include('crm.brand.filter')
        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table class="table products-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Sort</th>
                                @if(isAdmin())
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{ucWords($list->name)}}</td>
                                <td><img src="{{$list->logo ?? defaultImg()}}" style="height:50px; width:60px;"></td>
                                <td>{{$list->sort}}</td>
                                @if(isAdmin())
                                <td>
                                    <div class="action-group">
                                        <a href="javascript:void(0)" _id="{{$list->_id}}" class="edit text-info">
                                            <x-icon type="edit" />
                                        </a>
                                        <a href="javascript:void(0)" _id="{{$list->_id}}" class="remove text-danger">
                                            <x-icon type="remove" />
                                        </a>
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
        {{ $lists->appends($_GET)->links()}}
    </div>
</div>


@push('modal')
<div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="productcategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-6" id="brandLabel">Add Brand</h1>
                <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container-flude">

                    <div id="message"></div>

                    <div class="row">

                        <form id="saveBrand" action="{{url('crm/brand')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="put"></div>
                            <div class="row">

                                <div class="field-group">
                                    <label for="category-name ">Brand Name</label>
                                    <input type="text" name="name" id="brandName" placeholder="Enter Name" class="form-control">
                                    <span class="text-danger" id="name_msg"></span>
                                </div>

                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="sort ">Sort</label>
                                        <input type="number" name="sort" id="sort" placeholder="Enter Sort" class="form-control">
                                        <span class="text-danger" id="sort_msg"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label>Status</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactivce</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="field-group">
                                    <label for="banner">Logo</label>
                                    <input type="file" name="logo" id="" class="form-control">
                                    <span class="text-danger" id="logo_msg"></span>
                                </div>


                                <div class="col-md-12 mb-1 text-center">
                                    <button type="reset" class="btn btn-danger">
                                        <x-icon type="reset" />Reset
                                    </button>
                                    <button type="submit" class="btn btn-success" id="save">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">

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
        $('#save').html(`<x-icon type="save" />Add`);
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
        let label1 = update == 'PUT' ? 'Update' : `<x-icon type="save" />Add`;
        let label2 = update == 'PUT' ? 'Updating...' : 'Adding...';
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
                    $('#save').html(`<x-icon type="update" />Update`);
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