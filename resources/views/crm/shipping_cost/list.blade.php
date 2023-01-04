@extends('crm.layout.app')
@section('content')

<div id="messageRemove"></div>
<div class="card">
    <div class="card-header ">
        <div class="row">

            <div class="col-md-9">
                <h5><x-icon type="list" />Shipping Cost</h5>
            </div>

            <div class="col-md-3 product-btn-group d-flex justify-content-end">
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12 ">
                <div id="message"></div>
                <form id="shippingCost" method="post" action="{{url('crm/shipping-cost')}}">
                    @csrf
                    <div id="put"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Origin State <cspan class="text-danger">*</cspan></label>
                            <input type="text" value="Delhi" disabled name="origin_state" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Destination State <cspan class="text-danger">*</cspan></label>
                            <select name="destination_state" id="destinationState" class="form-select">
                                <option value="">Select</option>
                                @foreach(config('global.state') as $state)
                                <option value="{{$state}}">{{ucwords($state)}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="destination_state_msg"></span>
                        </div>
                        <div class="col-md-3">
                            <label>Shipping Amount <cspan class="text-danger">*</cspan></label>
                            <input type="text" value="" name="shipping_amount" id="shippingAmount" class="form-control" placeholder="Shipping Amount">
                            <span class="text-danger" id="shipping_amount_msg"></span>
                        </div>
                        <div class="col-md-3 mt-4">
                            <button type="submit" class='btn btn-sm btn-success' id="save">Add</button>
                        </div>
                    </div>
                </form>

                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table products-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Origin State</th>
                                        <th>Destination State</th>
                                        <th>Shipping Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="list"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@push('js')
<script>
    // //for edit
    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "{{url('crm/shipping-cost')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('form#shippingCost').attr('action', '{{ url("crm/shipping-cost") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#destinationState').val(res.record.destination_state);
                    $('#shippingAmount').val(res.record.shipping_amount);
                    $('span.text-danger').html('');
                }
            }
        })
    });

    $("form#shippingCost").submit(function(e) {
        e.preventDefault();
        formData = new FormData(this);
        var url = $(this).attr('action');
        $.ajax({
            data: formData,
            type: "post",
            url: url,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Adding`).attr('disabled', true);
            },
            success: function(res) {

                //hide loader
                $('#save').html(`<x-icon type="save"/>Add`).removeAttr('disabled');

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
                    $('#put').html('');
                    $('form#shippingCost').attr('action', '{{ url("crm/shipping-cost") }}').trigger('reset');
                    getList();
                    alertMsg(res.status, res.msg, 2000);
                }
            }
        });
    });

    getList();

    function getList() {
        let url = "{{url('crm/shipping-cost-list')}}";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    let list = '';
                    $.each(res.record, (index, val) => {
                        list += `<tr><td>${++index}</td>
                        <td>${val.origin_state}</td>
                        <td>${val.destination_state}</td>
                        <td>${val.shipping_amount}</td>
                        <td> <a href="javascript:void(0)" _id="${val._id}" class="edit text-info"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>`;
                    })
                    $('#list').html(list);
                }

            }
        })
    }
</script>
@endpush

@endsection