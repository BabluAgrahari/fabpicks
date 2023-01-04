@extends('crm.layout.app')
@section('content')

<div class="card">
    <div class="card-header ">
        <div class="row">

            <div class="col-md-11">
                <h5>Discount</h5>
            </div>

            <div class="col-md-1 ">
                <button type="button" class="btn btn-success" id="addcoupon">
                    <x-icon type="add" /> Add
                </button>
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
                                <th scope="col">From Amount</th>
                                <th scope="col">To Amount</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$list->from_amount}}</td>
                                <td>{{$list->to_amount}}</td>
                                <td>{{$list->discount}}</td>
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
        {{ $lists->appends($_GET)->links()}}
    </div>
</div>


@push('modal')
<div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="productcategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="couponLabel">Add Discount</h1>
                <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container ">

                    <div id="message"></div>

                    <div class="row">

                        <form id="savecoupon" action="{{url('crm/coupon')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="put"></div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="field-group">
                                        <label>From Amount</label>
                                        <input type="text" name="from_amount" id="from_amount" placeholder="From Amount" class="form-control">
                                        <span class="text-danger" id="from_amount_msg"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="field-group">
                                        <label>To Amount</label>
                                        <input type="text" name="to_amount" id="to_amount" class="form-control" placeholder="To Amount">
                                        <span class="text-danger" id="to_amount_msg"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="field-group">
                                        <label>Discount</label>
                                        <input type="text" name="discount" id="discount" class="form-control" placeholder="Discount">
                                        <span class="text-danger" id="discount_msg"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4 text-center">
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
    $('#addcoupon').click(function(e) {
        e.preventDefault();
        $('#couponLabel').html('Add Discount');
        $('#save').html(`<x-icon type="save"/>Add`);
        $('form#savecoupon').attr('action', '{{ url("crm/coupon") }}');
        $('#put').html('');
        $('#couponModal').modal('show');
    });

    /*start form submit functionality*/
    $("form#savecoupon").submit(function(e) {
        e.preventDefault();

        formData = new FormData(this);
        var url = $(this).attr('action');
        let update = $('#putInput').val();
        let label1 = update == 'PUT' ? 'Update' : `<x-icon type="save"/>Add`;
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
                    $('form#savecoupon').trigger('reset');
            }
        });
    });
    /*end form submit functionality*/

    //for edit
    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');

        let url = "{{url('crm/coupon')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#from_amount').val(res.record.from_amount);
                    $('#to_amount').val(res.record.to_amount);
                    $('#discount').val(res.record.discount);

                    $('#couponLabel').html('Edit Discount');
                    $('#save').html(`<x-icon type="update"/>Update`);
                    $('form#savecoupon').attr('action', '{{ url("crm/coupon") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#couponModal').modal('show');
                }
            }
        })
    });
</script>
@endpush

@endsection