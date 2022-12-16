@extends('crm.layout.app')
@section('content')

<div class="card">
    <div class="card-header ">
        <div class="row">

            <div class="col-md-9">
                <h4>Sub Attributes</h4>
            </div>

            <div class="col-md-3 product-btn-group d-flex justify-content-end">
                @if(!empty($filter))
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
                @else
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
                @endif
                <a href="{{url('crm/sub-attribute-export')}}{{ !empty($_SERVER['QUERY_STRING'])?'?'.$_SERVER['QUERY_STRING']:''}}" class="btn btn-sm btn-success" id="">
                    <x-icon type="export" />Export
                </a>
                <button type="button" class="btn btn-success" id="AddSubAttribute" data-bs-toggle="modal" data-bs-target="#SubAttribute">
                    <i class="ri-add-circle-line"></i> Add
                </button>

            </div>
        </div>
    </div>

    <div class="card-body">
    @include('crm.subattribute.filter')
        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table class="table products-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sub Attributes</th>
                                <th scope="col">Sort</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{ucWords($list->name)}}</td>
                                <td>{{$list->sort}}</td>
                                <td><img src="{{$list->icon ?? defaultImg()}}" style="height:50px; width:60px;"> </td>
                                <td>
                                    <div class="action-group">
                                        <a href="javascript:void(0)" _id="{{$list->_id}}" class="edit text-info"><x-icon type="edit"/></a>
                                    </div>
                                </td>
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
<div class="modal fade" id="SubAttributemodal" tabindex="-1" aria-labelledby="SubAttributeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="SubAttributeLabel">Sub Attributes</h1>
                <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div id="message"></div>
                    <form id="SaveSubAttribute" action="{{url('crm/sub-attribute')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="put"></div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="field-group">
                                    <label>Attribute</label>
                                    <select name="attribute_id" class="form-control" id="attribute_id">
                                        <option value="">Select</option>
                                        @foreach($attributes as $attr)
                                        <option value="{{$attr->_id}}">{{ucwords($attr->name)}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="attribute_id_msg"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="field-group">
                                    <label>Sub Attribute Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                                </div>
                                <span class="text-danger" id="name_msg"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-group">
                                    <label for="icon">Icon</label>
                                    <input type="file" name="icon" id="icon" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label for="sort ">Sort</label>
                                    <input type="number" name="sort" id="sort" placeholder="Enter Sort" class="form-control">
                                </div>
                                <span class="text-danger" id="sort_msg"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                <label>Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactivce</option>
                                    </select>
                                    <span class="text-danger" id="status_msg"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                            <button type="reset" class="btn btn-danger">
                                    <x-icon type="reset" />Reset
                                </button>
                                <button type="submit" class="btn btn-success btn-sm" id="save">Add</button>
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

@endpush

@push('js')

<script>
    $('#AddSubAttribute').click(function(e) {
        e.preventDefault();
        $('#SubAttributeLabel').html('Add Sub Attribute');
        $('#save').html(`<x-icon type="save" />Add`);
        $('form#SaveSubAttribute').attr('action', '{{ url("crm/sub-attribute") }}');
        $('#put').html('');
        $('#SubAttributemodal').modal('show');
    });

    $("form#SaveSubAttribute").submit(function(e) {
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
                    $('form#SaveSubAttribute').trigger('reset');
            }
        });
    });
    //for edit 

    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "{{url('crm/sub-attribute')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#attribute_id').val(res.record.attribute_id);
                    $('#name').val(res.record.name);
                    $('#sort').val(res.record.sort);
                    let status = res.record.status ? true : false;
                    $('#status').prop('checked', status);

                    $('#SubAttributeLabel').html('Edit Sub Attribute');
                    $('#save').html(`<x-icon type="update" />Update`);
                    $('form#SaveSubAttribute').attr('action', '{{ url("crm/sub-attribute") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#SubAttributemodal').modal('show');
                }
            }
        })
    });
</script>

@endpush

@endsection