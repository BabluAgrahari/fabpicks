@extends('crm.layout.app')
@section('content')

<div id="messageRemove"></div>
<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-6">
                <h5>Tax</h5>
            </div>

            <div class="col-md-6 product-btn-group d-flex justify-content-end">

                <a href="javascript:void(0);" class="btn btn-sm btn-success" id="addTax">
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
                                <th scope="col">Tax Name</th>
                                <th scope="col">Tax Amount</th>
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
<div class="modal fade" id="taxModal" tabindex="-1" aria-labelledby="productcategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="taxLabel">Add Brand</h1>
                <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container ">

                    <div id="message"></div>

                    <div class="row">

                        <form id="taxsave" action="{{url('crm/tax')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="put"></div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="category-name ">Tax Name</label>
                                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                                        <span class="text-danger" id="name_msg"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field-group">
                                        <label for="sort ">Tax Amount</label>
                                        <input type="text" name="amount" id="amount" placeholder="Enter Amount" class="form-control">
                                        <span class="text-danger" id="amount_msg"></span>
                                    </div>
                                </div>

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
            </div>

        </div>
    </div>
</div>
@endpush

@push('js')
<script>
    $('#addTax').click(function(e) {
        e.preventDefault();
        $('#taxLabel').html('Add Tax');
        $('#save').html(`<x-icon type="save" />Add`);
        $('form#taxsave').attr('action', '{{ url("crm/tax") }}');
        $('#put').html('');
        $('#taxModal').modal('show');
    });

    /*start form submit functionality*/
    $("form#taxsave").submit(function(e) {
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
                    $('form#taxsave').trigger('reset');
            }
        });
    });
    /*end form submit functionality*/

    //for edit
    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "{{url('crm/tax')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#name').val(res.record.name);
                    $('#amount').val(res.record.amount);

                    $('#taxLabel').html('Edit Tax');
                    $('#save').html(`<x-icon type="update" />Update`);
                    $('form#taxsave').attr('action', '{{ url("crm/tax") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#taxModal').modal('show');
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