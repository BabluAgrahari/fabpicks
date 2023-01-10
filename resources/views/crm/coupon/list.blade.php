@extends('crm.layout.app')
@section('content')

<div class="card">
    <div class="card-header ">
        <div class="row">

            <div class="col-md-10">
                <h5><x-icon type="list" />Coupon</h5>
            </div>

            <div class="col-md-2 float-right">
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
                                <th scope="col">Coupon Code</th>
                                <th scope="col">Coupon Qty</th>
                                <th scope="col">Expiry Time</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Expiry Status</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$list->coupon_code}}</td>
                                <td>{{$list->coupon_qty}}</td>
                                <td>{{date('d-m-Y H:i A',$list->expiry)}}</td>
                                <td>{{$list->amount}}</td>
                                <td>@if($list->expiry_status)
                                    <span class="activeVer badge bg-success">Active</span>
                                    @else
                                    <span class="activeVer badge bg-danger">Expired</span>
                                    @endif
                                </td>
                                <td>{!!listStatus($list->status,$list->_id)!!}</td>
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
                <h1 class="modal-title fs-6" id="couponLabel">Add Coupon</h1>
                <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="message"></div>

                <div class="row">

                    <form id="savecoupon" action="{{url('crm/coupon')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="put"></div>
                        <div class="field-group">
                            <label>Coupon Code</label>
                            <input type="text" name="coupon_code" value="FAB{{rand(1111,9999)}}" id="coupon_code" placeholder="Coupon Code" class="form-control">
                            <span class="text-danger" id="coupon_code_msg"></span>
                        </div>

                        <div class="field-group">
                            <label>Coupon Qty</label>
                            <input type="text" name="coupon_qty" id="coupon_qty" class="form-control" placeholder="Coupon Qty">
                            <span class="text-danger" id="coupon_qty_msg"></span>
                        </div>

                        <div class="field-group ">
                                <label>Link</label>
                                <input type="text" value="" name="link" id="link" class="form-control" placeholder="Enter Link">
                                <span class="text-danger" id="link_msg"></span>
                            </div>


                        <div class="row">
                            <div class="field-group col-md-6">
                                <label>Expiry Datetime</label>
                                <input type="datetime-local" value="" name="expiry" id="expiry" class="form-control" placeholder="Expiry Datetime">
                                <span class="text-danger" id="expiry_msg"></span>
                            </div>

                            <div class="field-group col-md-6">
                                <label>Cart Value</label>
                                <input type="text" name="cart_value" id="cart_value" class="form-control" placeholder="Cart Value">
                                <span class="text-danger" id="cart_value_msg"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="field-group col-md-6">
                                <label>Discount Type</label>
                                <select class="form-select" name="discount_type" id="discount_type">
                                    <option value="flat">Flat</option>
                                    <option value="percentage">Percentage</option>
                                </select>
                                <span class="text-danger" id="discount_type_msg"></span>
                            </div>
                            <div class="field-group col-md-6" id="amount">
                                <label>Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount">
                                <span class="text-danger" id="amount_msg"></span>
                            </div>
                        </div>

                        <div class="row">
                        
                        <div class="field-group col-md-7">
                                <label for="banner">Image</label>
                                <input type="file" name="image" id="" class="imgInp form-control">
                                <span class="text-danger" id="image_msg"></span>
                            </div>
                            <div class="field-group col-md-5"><img src="{{defaultImg('80x80')}}" id="avatar" style="width:80px; height:80px;"></div>
                        </div>
                        
                       
                        <div class="field-group">
                            <label>Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                            <span class="text-danger" id="amount_msg"></span>
                        </div>

                        <div class="field-group">
                            <label>Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactivce</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-2 mb-2 text-center">
                            <button type="reset" class="btn btn-danger">
                                <x-icon type="reset" />Reset
                            </button>
                            <button type="submit" class="btn btn-success" id="save">Add</button>
                        </div>

                    </form>
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
    $('#discount_type').change(function() {
        let val = $(this).val();
        if (val == 'percentage') {
            $('#amount').html(` <label>Percentage(%)</label>
                                <input type="text" name="percentage" id="percentage" class="form-control" placeholder="Percentage(%)">
                                <span class="text-danger" id="percentage_msg"></span>`);
        } else if (val == 'flat') {
            $('#amount').html(` <label>Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount">
                                <span class="text-danger" id="amount_msg"></span>`);
        }
    });
    $(document).on('click', '.activeVer', function() {
        let id = $(this).attr('_id');
        let val = $(this).attr('val');
        let selector = $(this);
        let url = "{{ url('crm/coupon-status') }}";
        chagneStatus(id, val, selector, url);
    })

    $('#addcoupon').click(function(e) {
        e.preventDefault();
        $('#couponLabel').html('Add Coupon');
        $('#save').html(`<x-icon type="save"/>Add`);
        $('form#savecoupon').attr('action', '{{ url("crm/coupon") }}');
        $('#put').html('');
        $('#couponModal').modal('show');
        texteditor(`description`);
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
                    $('#coupon_code').val(res.record.coupon_code);
                    // $('#expiry').val(res.record.expiry);
                    $('#amount').val(res.record.amount);
                    $('#coupon_qty').val(res.record.coupon_qty);
                    $('#avatar').attr('src',res.record.image);
                    $('#status').val(res.record.status);
                    $('#description').val(res.record.description);
                    $('#discount_type').val(res.record.discount_type);
                    $('#cart_value').val(res.record.cart_value);
                    var now = new Date(res.record.expiry * 1000);
                    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                    $('#expiry').val(now.toISOString().slice(0, 16));

                    $('#couponLabel').html('Edit Coupon');
                    $('#save').html(`<x-icon type="update"/>Update`);
                    $('form#savecoupon').attr('action', '{{ url("crm/coupon") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#couponModal').modal('show');
                    texteditor(`description`);
                }
            }
        })
    });
</script>
@endpush

@endsection