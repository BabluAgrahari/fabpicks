@extends('crm.layout.app')
@section('content')

<div id="messageRemove"></div>
<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-6">
                <h5>Tex</h5>
            </div>

            <div class="col-md-6 product-btn-group d-flex justify-content-end">
               
                <a href="javascript:void(0);" class="btn btn-sm btn-success" id="addTex">
                    <x-icon type="add" />Add
                </a>
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
                                <th scope="col">Tex Name</th>
                                <th scope="col">Tex Amount</th>
                                <th scope="col">Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{ucWords($list->name)}}</td>
                                <td>{{$list->amount}}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="javascript:void(0)" _id="{{$list->_id}}" class="edit text-info">
                                            <x-icon type="edit" />
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
    </div>
</div>


@push('modal')
<div class="modal fade" id="texModal" tabindex="-1" aria-labelledby="productcategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="texLabel">Add Brand</h1>
                <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container ">

                    <div id="message"></div>

                    <div class="row">

                        <form id="texsave" action="{{url('crm/tex')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="put"></div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="category-name ">Tex Name</label>
                                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                                        <span class="text-danger" id="name_msg"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="sort ">Tex Amount</label>
                                        <input type="text" name="amount" id="amount" placeholder="Enter Amount" class="form-control">
                                        <span class="text-danger" id="amount_msg"></span>
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
    $('#addTex').click(function(e) {
        e.preventDefault();
        $('#texLabel').html('Add Tex');
        $('#save').html('Save');
        $('form#texsave').attr('action', '{{ url("crm/tex") }}');
        $('#put').html('');
        $('#texModal').modal('show');
    });

    /*start form submit functionality*/
    $("form#texsave").submit(function(e) {
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
                    $('form#texsave').trigger('reset');
            }
        });
    });
    /*end form submit functionality*/

    //for edit
    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "{{url('crm/tex')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#name').val(res.record.name);
                    $('#amount').val(res.record.amount);

                    $('#texLabel').html('Edit Tex');
                    $('#save').html('Update');
                    $('form#texsave').attr('action', '{{ url("crm/tex") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#texModal').modal('show');
                }
            }
        })
    });

    // //for remove record
    // $(document).on('click', '.remove', function(e) {
    //     e.preventDefault(0);
    //     let id = $(this).attr('_id');
    //     let url = "{{url('crm/brand')}}/" + id;
    //     let tr = $(this).parent().parent().parent();
    //     removeRecord(tr, url);
    // })
</script>
@endpush

@endsection