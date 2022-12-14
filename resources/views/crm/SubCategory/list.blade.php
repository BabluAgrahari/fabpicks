@extends('crm.layout.app')
@section('content')

<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-9"> 
                <h5>Sub Category</h5>
            </div>
            <div class="col-md-3 product-btn-group d-flex justify-content-end">
                @if(!empty($filter))
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
                @else
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
                @endif
                <a href="javascript:void(0);" class="btn btn-sm btn-success ri-add-circle-line" data-bs-toggle="modal" data-bs-target="#Attribute" id="AddSubCategory">Add</a>
            </div>
        </div>
    </div>

    <div class="card-body">
    @include('crm.subCategory.filter')
        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table class="table products-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sub Category Name</th>
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
                                <td>{{$list->name}}</td>
                                <td>{{$list->discription}}</td>
                                <td>{{$list->sort}}</td>
                                <td><img src="{{$list->banner ?? defaultImg()}}" style="height:50px; width:60px;"></td>
                                <td><img src="{{$list->icon ?? defaultImg()}}" style="height:50px; width:60px;"></td>
                                <td>
                                    <div class="action-group">
                                        <a href="javascript:void(0)" _id="{{$list->_id}}" class="edit text-info"><i class="ri-pencil-line"></i></a>
                                        <a href="javascript:void(0)" _id="{{$list->_id}}" class="remove text-info"><i class="ri-delete-bin-line"></i>
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
        {{ $lists->appends($_GET)->links()}}
    </div>
</div>

        @push('modal')
        <div class="modal fade" id="SubCategory" tabindex="-1" aria-labelledby="SubCategoryLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="SubCategoryLabel"> Sub Category</h1>
                        <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div id="message"></div>
                            <form id="SaveSubCategory" action="{{url('crm/sub-category')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div id="put"></div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="field-group">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                <option value="">Select</option>
                                                @foreach($categories as $cat)
                                                <option value="{{$cat->_id}}">{{ucwords($cat->name)}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger" id="category_id_msg"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="field-group">
                                            <label>Sub Category Name</label>
                                            <input type="text" id="name" name="name" placeholder="Enter Name" class="form-control">
                                        </div>
                                        <span class="text-danger" id="name_msg"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="field-group">
                                            <label for="discription ">Discription</label>
                                            <textarea id="discription" name="discription" cols="10" rows="1" placeholder="Enter Discription" class="form-control"></textarea>
                                        </div>
                                        <span class="text-danger" id="discription_msg"></span>
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
                                            <input type="number" name="sort" id="sort" placeholder="Enter Sort" class="form-control">
                                        </div>
                                        <span class="text-danger" id="sort_msg"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="field-group">
                                            <div class="form-check form-switch custom-switch">
                                                <label class="form-check-label" for="active">Active/Inactive</label>
                                                <input class="form-check-input" type="checkbox" role="switch" value="1" name="status" id="status" checked>
                                            </div>
                                            <span class="text-danger" id="status_msg"></span>
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
            $('#AddSubCategory').click(function(e) {
                e.preventDefault();
                $('#SubCategoryLabel').html('Add Sub Category');
                $('#save').html('Save');
                $('form#SaveSubCategory').attr('action', '{{ url("crm/sub-category") }}');
                $('#put').html('');
                $('#SubCategory').modal('show');
            });

            $("form#SaveSubCategory").submit(function(e) {
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
                            $('form#SaveSubCategory').trigger('reset');
                    }
                });
            });
            //for edit 
            $(document).on('click', '.edit', function(e) {
                e.preventDefault(0);

                let id = $(this).attr('_id');
                let url = "{{url('crm/sub-category')}}/" + id + "/edit";
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(res) {

                        if (res.status) {
                            $('#category_id').val(res.record.category_id);
                            $('#name').val(res.record.name);
                            $('#discription').val(res.record.discription);
                            $('#sort').val(res.record.sort);
                            $('#category').val(res.category);
                            let status = res.record.status ? true : false;
                            $('#status').prop('checked', status);

                            $('#SubCategoryLabel').html('Edit Sub Category');
                            $('#save').html('Update');
                            $('form#SaveSubCategory').attr('action', '{{ url("crm/sub-category") }}/' + id);
                            $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                            $('#SubCategory').modal('show');
                        }
                    }
                })
            });

            //for remove record
            $(document).on('click', '.remove', function(e) {
                e.preventDefault(0);
                let id = $(this).attr('_id');
                let url = "{{url('crm/sub-category')}}/" + id;
                let tr = $(this).parent().parent().parent();
                removeRecord(tr, url);
            })
        </script>

        @endpush


        @endsection