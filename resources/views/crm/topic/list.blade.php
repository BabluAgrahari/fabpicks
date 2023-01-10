@extends('crm.layout.app')
@section('content')

<div id="messageRemove"></div>
<div class="card">
    <div class="card-header ">
        <div class="row">

            <div class="col-md-6">
                <h5><x-icon type="list" />Topic</h5>
            </div>

            <div class="col-md-6 product-btn-group d-flex justify-content-end">
                @if(!empty($filter))
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
                @else
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
                @endif
                @can('isAdmin')
                <a href="{{url('crm/topic-export')}}{{ !empty($_SERVER['QUERY_STRING'])?'?'.$_SERVER['QUERY_STRING']:''}}" class="btn btn-sm btn-success" id="">
                    <x-icon type="export" />Export
                </a>
                <a href="javascript:void(0);" class="btn btn-sm btn-success" id="addTopic">
                    <x-icon type="add" />Add
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card-body">
        @include('crm.topic.filter')
        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table class="table products-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Topic</th>
                                <th scope="col">Description</th>
                                <th scope="col">Sort</th>
                                <th scope="col">Status</th>

                                @if(isAdmin())
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td><img src="{{$list->logo ?? defaultImg()}}" style="height:50px; width:60px;"></td>
                                <td>{{ucWords($list->name)}}</td>
                                <td>{!!$list->description!!}</td>
                                <td>{{$list->sort}}</td>
                                <td>{!!listStatus($list->status,$list->_id)!!}</td>
                                @can('isAdmin')
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
                                @endcan
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
<div class="modal fade" id="topicModal" tabindex="-1" aria-labelledby="productcategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-6" id="topicLabel">Add Topic</h1>
                <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container-flude">

                    <div id="message"></div>

                    <div class="row">

                        <form id="saveTopic" action="{{url('crm/topic')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="put"></div>
                            <div class="row">

                                <div class="field-group">
                                    <label for="category-name ">Topic Name</label>
                                    <input type="text" name="name" id="brandName" placeholder="Enter Name" class="form-control">
                                    <span class="text-danger" id="name_msg"></span>
                                </div>

                                <div class="field-group">
                                    <label for="description ">Description</label>
                                    <textarea name="description" id="description" rows="3" placeholder="Enter Description" rows="1" class="textediter form-control"></textarea>
                                    <span class="text-danger" id="description_msg"></span>
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

                                <div class="field-group col-md-9">
                                    <label for="banner">Logo</label>
                                    <input type="file" name="logo" id="" class="imgInp form-control">
                                    <span class="text-danger" id="logo_msg"></span>
                                </div>

                                <div class="field-group col-md-3"><img src="{{defaultImg('80x80')}}" id="avatar" style="width:80px; height:80px;"></div>


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
    $(document).on('click', '.activeVer', function() {
        let id = $(this).attr('_id');
        let val = $(this).attr('val');
        let selector = $(this);
        //let url = "{{ url('crm/brand-status') }}";
        chagneStatus(id, val, selector, url);
    })


    $('#addTopic').click(function(e) {
        e.preventDefault();
        $('#topicLabel').html('Add Topic');
        $('#save').html(`<x-icon type="save" />Add`);
        $('form#saveTopic').attr('action', '{{ url("crm/topic") }}');
        $('#put').html('');
        $('#topicModal').modal('show');
        texteditor(`description`);
    });

    /*start form submit functionality*/
    $("form#saveTopic").submit(function(e) {
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
                    $('form#saveTopic').trigger('reset');
            }
        });
    });
    /*end form submit functionality*/

    //for edit
    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "{{url('crm/topic')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#brandName').val(res.record.name);
                    $('#description').val(res.record.description);
                    $('#sort').val(res.record.sort);
                    $('#status').val(res.record.status);

                    $('#topicLabel').html('Edit topic');
                    $('#save').html(`<x-icon type="update" />Update`);
                    $('form#saveTopic').attr('action', '{{ url("crm/topic") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#topicModal').modal('show');
                    texteditor(`description`);
                }
            }
        })
    });

    //for remove record
    $(document).on('click', '.remove', function(e) {
        e.preventDefault(0);
        let id = $(this).attr('_id');
        let url = "{{url('crm/topic')}}/" + id;
        let tr = $(this).parent().parent().parent();
        removeRecord(tr, url);
    })
   
</script>
@endpush

@endsection