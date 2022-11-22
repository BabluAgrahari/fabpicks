@extends('crm.layout.app')
@section('content')

<div class="container ">
    <div class="row">
        <div id="messageRemove"></div>
        <div class="col-md-11">
            <h4>All Category </h4>
        </div>

        <div class="col-md-1 mb-3 product-btn-group">
            <button type="button" class="btn btn-success" id="AddCategory" data-bs-toggle="modal" data-bs-target="#Category">
                <i class="ri-add-circle-line"></i>Add
            </button>
        </div>

        <div class="col-md-12">
            <table class="table table-dark table-striped custom-table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Discription</th>
                        <th scope="col">Sort</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lists as $key=>$list)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$list->category_name}}</td>
                        <td>{{$list->discription}}</td>
                        <td>{{$list->sort}}</td>

                        <td><img src="{{asset('Category/'.$list->banner)}}" style="height:50px; width:60px;"></td>
                        <td><img src="{{asset('Category/'.$list->icon)}}" style="height:50px; width:60px;"></td>
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

<div class="modal fade" id="Category" tabindex="-1" aria-labelledby="CategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="CategoryLabel">Product Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div id="message"></div>
                    <form id="saveCategory" action="{{url('crm/category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="put"></div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="field-group">
                                    <label for="category-name ">Category Name</label>
                                    <input type="text" id="category_name" name="category_name" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="field-group">
                                    <label for="discription ">Discription</label>
                                    <textarea name="discription" id="discription" cols="10" rows="1" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="field-group">
                                    <label for="banner">Banner</label>
                                    <input type="file" name="banner" id="banner" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="field-group">
                                    <label for="icon">Icon</label>
                                    <input type="file" name="icon" id="icon" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="field-group">
                                    <label for="sort ">Sort</label>
                                    <input type="text" id="sort" name="sort" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="field-group">
                                    <div class="form-check form-switch custom-switch">
                                        <label class="form-check-label" for="active">Active/Inactive</label>
                                        <input class="form-check-input" name="status" type="checkbox" value="1" role="switch" id="status" checked>
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

@endpush

@push('js')
<script>
    $('#AddCategory').click(function(e) {
        e.preventDefault();
        $('#CategoryLabel').html('Add Category');
        $('#save').html('Save');
        $('form#saveCategory').attr('action', '{{ url("crm/category") }}');
        $('#put').html('');
        $('#Category').modal('show');
    });
    /*start form submit functionality*/
    $("form#saveCategory").submit(function(e) {
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
                    $('form#saveCategory').trigger('reset');
            }
        });
    });

    //for edit

    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "{{url('crm/category')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#category_name').val(res.record.category_name);
                    $('#discription').val(res.record.discription);
                    $('#sort').val(res.record.sort);
                    let status = res.record.status ? true : false;
                    $('#status').prop('checked', status);

                    $('#CategoryLabel').html('Edit Category');
                    $('#save').html('Update');
                    $('form#saveCategory').attr('action', '{{ url("crm/category") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#Category').modal('show');
                }
            }
        })
    });

    //for remove record
    $(document).on('click', '.remove', function(e) {
        e.preventDefault(0);
        let id = $(this).attr('_id');
        let url = "{{url('crm/category')}}/" + id;
        let tr = $(this).parent().parent().parent();
        removeRecord(tr, url);
    })
</script>


@endpush


@endsection