@extends('crm.layout.app')
@section('content')

<div id="message"></div>
<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-6">
                <h5>Edit Product</h5>
            </div>
            <div class="col-md-6" style="text-align: right;">
                <a href="{{url('crm/product')}}" class="btn btn-warning btn-sm"> <x-icon type="back" /> Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">

            <form id="updateProduct" action="{{url('crm/product/'.$res->_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="putInput" name="_method" value="PUT">
                <div class="row">

                    <div class="col-md-6">
                        <div class="field-group">
                            <label for="product-name">Product Name </label>
                            <input type="text" name="name" value="{{$res->name}}" id="name" class="form-control" placeholder="Product Name">
                            <span class="text-danger" id="name_msg"></span>
                        </div>

                        <div class="field-group">
                            <label for="product-name">Tags</label>
                            <input type="text" name="tags" id="tags" value="{{$res->tags}}" class="form-control" placeholder="Enter Tags">
                            <span class="text-danger" id="tags_msg"></span>
                        </div>

                        <div class="row">
                            <div class="field-group col-md-6">
                                <label for="product-brand">Brand</label>
                                <select name="brand_id" id="product-brand" class="form-select js-example-basic-single">
                                    <option value="">Select</option>
                                    @foreach($brands as $val)
                                    <option value="{{$val->_id}}" {{$val->_id==$res->brand_id?'selected':''}}>{{ucwords($val->name)}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="brand_id_msg"></span>
                            </div>

                            <div class="field-group col-md-6">
                                <label for="sub-category">Category</label>
                                <select name="sub_category" id="sub_category" class="form-select js-example-basic-single">
                                    <option value="">Select Category</option>
                                    @foreach($subCategories as $val)
                                    <option value="{{$val->_id}}" {{$val->_id==$res->sub_category?'selected':''}}>{{!empty($val->Category->name)?ucwords($val->Category->name):''}}/{{ucwords($val->name)}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="sub_category_msg"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label for="mrp">MRP</label>
                                    <input type="text" value="{{$res->mrp}}" name="mrp" id="mrp" class="form-control" placeholder="Enter MRP">
                                    <span class="text-danger" id="mrp_msg"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label for="offer-price">Offer Price</label>
                                    <input type="text" name="offer_price" value="{{$res->offer_price}}" id="offer-price" class="form-control" placeholder="Enter Price">
                                    <span class="text-danger" id="offer_price_msg"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label for="minimum-qty">Maximum Qty/User</label>
                                    <input type="text" name="maximum_qty" value="{{$res->maximum_qty}}" id="minimum-qty" class="form-control" placeholder="Enter Qty">
                                    <span class="text-danger" id="maximum_qty_msg"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label for="product-expire-date">Expire Date</label>
                                    <input type="date" name="expire_date" value="{{date('Y-m-d',$res->expire_date)}}" id="product-expire-date" class="form-control">
                                    <span class="text-danger" id="expire_date_msg"></span>
                                </div>
                            </div>
                        </div>

                        <div class="field-group ">
                            <label for="product-description ">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control">{{$res->description}}</textarea>
                            <span class="text-danger" id="description_msg"></span>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="field-group">
                            <label for="product-type">Product Type </label>
                            <select name="product_type" id="productType" class="form-select">
                                <option value="trial_store" @selected($res->product_type=='trial_store')>Trial Store</option>
                                <option value="brand_store" @selected($res->product_type=='brand_store')>Brand Store</option>
                                <option value="fixed_price" @selected($res->product_type=='fixed_price')>Fixed Price</option>
                                <option value="rewards_store" @selected($res->product_type=='rewards_store')>Rewards Store</option>
                            </select>
                            <span class="text-danger" id="product_type_msg"></span>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="field-group" id="saleTrail">
                                    <label for="market-price1">Trial Point</label>
                                    <input type="text" name="trial_point" value="{{$res->trial_point}}" class="form-control" placeholder="Trial Point">
                                    <span class="note">Trial Point should not greater than 6.</span>
                                    <span class="text-danger" id="trial_point_msg"></span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="field-group">
                                    <label for="market-price1">Rewards Point<span class="text-danger" id="rewareField"></span></label>
                                    <input type="text" name="rewards_point" value="{{$res->rewards_point}}" id="market-price1" class="form-control" placeholder="Rewards Point">
                                    <span class="text-danger" id="rewards_point_msg"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="field-group col-md-6">
                                <label>Feedback</label>
                                <select name="no_feedback" id="product-feedback-form" class="form-select js-example-basic-single">
                                    <option value="">No Feedback</option>
                                    @foreach($survay as $val)
                                    @if($val->type=='no_feedback')
                                    <option value="{{$val->_id}}" @selected($val->_id==$res->no_feedback)>{{ucwords($val->title)}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <span class="text-danger" id="no_feedback_msg"></span>
                            </div>

                            <div class="field-group col-md-6">
                                <label for="pre-qulifing-questions">Pre-Qulifing Questions</label>
                                <select name="pre_qulifing_question" id="pre-qulifing-questions" class="form-select js-example-basic-single">
                                    <option value="">No Pre-Qulifing Questions</option>
                                    @foreach($survay as $val)
                                    @if($val->type=='pre_qulifing_question')
                                    <option value="{{$val->_id}}" @selected($val->_id==$res->pre_qulifing_question)>{{ucwords($val->title)}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <span class="text-danger" id="pre_qulifing_question_msg"></span>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Thumbnail</label>
                                <div class="input-group">
                                    <input type="file" name="thumbnail" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                                <span class="text-danger" id="thumbnail_msg"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="box-body"><img src="{{$res->thumbnail ?? defaultImg('150x100')}}" class="img-fluid" alt=""></div>
                            </div>

                            <div class="form-group mt-3 col-md-12">
                                <!-- <div class="box-body"><img src="{{$res->thumbnail ?? defaultImg('150x100')}}" class="img-fluid" alt=""></div> -->
                            </div>

                            <div class="form-group col-md-12">
                                <label>Images</label>
                                <div class="input-group">
                                    <input type="file" multiple="multiple" name="images" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                                <span class="text-danger" id="thumbnail_msg"></span>
                            </div>


                        </div>
                    </div>

                </div>

                <div class="" id="stock">
                    @forelse($res->Inventory as $inv_key=>$inv)
                    <div class="row">

                        <div class="field-group col-md-2">
                            @if($loop->first)<label for="stock">Stock </label>@endif
                            <input type="text" name="inventory[{{$inv_key}}][stock]" value="{{$inv->stock}}" class="form-control" placeholder="Stock">
                        </div>

                        <div class="field-group col-md-2">
                            @if($loop->first)<label for="unit">Unit</label>@endif
                            <select name="inventory[{{$inv_key}}][unit]" id="unit" class="form-select  ">
                                <option value="">Select</option>
                                <option value="kg" @selected($inv->unit =='kg')>KG</option>
                                <option value="pc" @selected($inv->unit =='pc')>PC</option>
                                <option value="box" @selected($inv->unit =='box')>Box</option>
                                <option value="bottle" @selected($inv->unit =='bottle')>Bottle</option>
                                <option value="4_units" @selected($inv->unit =='4_units')>Box(4 Units)</option>

                            </select>
                        </div>

                        <div class="field-group col-md-2">
                            @if($loop->first) <label for="add-size">Attributes</label>@endif
                            <select name="inventory[{{$inv_key}}][attribute]" id="attribute" option='{{$inv_key}}' class="form-select attribute">
                                <option value="">Select</option>
                                @foreach($attributes as $val)
                                <option value="{{$val->_id}}" @selected($inv->attribute ==$val->_id)>{{ucwords($val->name)}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="field-group col-md-2">
                            @if($loop->first)<label for="product-color">Sub Attribute</label>@endif
                            <select name="inventory[{{$inv_key}}][sub_attribute]" id="subAttribute-{{$inv_key}}" class="form-select">
                                <option value="">Select</option>
                            </select>
                        </div>

                        <div class="field-group mt-4 col-md-2">
                            @if($loop->first)
                            <button type="button" class="btn btn-success" id="add_more">+</button>
                            @else
                            <a href="javascript:void(0)" onClick="removeRow(<?= $inv_key ?>);" class="btn btn-xs btn-danger"><span class="mdi mdi-delete-forever">-</span></a>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="row">
                        <div class="field-group col-md-2">
                            <label for="stock">Stock </label>
                            <input type="text" name="inventory[0][stock]" id="stock" class="form-control" placeholder="Stock">
                        </div>

                        <div class="field-group col-md-2">
                            <label for="unit">Unit</label>
                            <select name="inventory[0][unit]" id="unit" class="form-select  ">
                                <option value="" selected>Select</option>
                                <option value="kg">KG</option>
                                <option value="pcs">PC</option>
                                <option value="pcs">Box</option>
                                <option value="pcs">Bottle</option>
                                <option value="pcs">Box(4 Units)</option>

                            </select>
                        </div>

                        <div class="field-group col-md-2">
                            <label for="add-size">Attributes</label>
                            <select name="inventory[0][attribute]" id="attribute" option='0' class="form-select attribute">
                                <option value="">Select</option>
                                @foreach($attributes as $val)
                                <option value="{{$val->_id}}">{{ucwords($val->name)}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="field-group col-md-2">
                            <label for="product-color">Sub Attribute</label>
                            <select name="inventory[0][sub_attribute]" id="subAttribute-0" class="form-select">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="field-group mt-4 col-md-2">
                            <button type="button" class="btn btn-success" id="add_more">+</button>
                        </div>
                    </div>
                    @endforelse
                </div>


                <div class="row">
                    <hr>
                    <table class="table table-borderless" id="myproductTable">
                        <tbody id="field_wrapper1">
                            @if(!empty($res->details))
                            @foreach($res->details as $key=>$detail)
                            <tr class="product-table-row" id="row-{{$key}}">

                                <td>
                                    <div> @if($loop->first)<label>Label</label>@endif
                                        <input type="text" name="details[{{$key}}][label]" value="{{!empty($detail['label'])?$detail['label']:''}}" class="form-control" placeholder="Label">
                                    </div>
                                </td>

                                <td>
                                    <div> @if($loop->first)<label>Description</label>@endif
                                        <textarea name="details[{{$key}}][description]" rows="1" placeholder="Description" class="form-control">{{!empty($detail['description'])?$detail['description']:''}}</textarea>
                                    </div>
                                </td>

                                <td>
                                    @if($loop->first)
                                    <button type="button" class="btn btn-success mt-4" id="myaddBtn">+</button>
                                    @else
                                    <a href="javascript:void(0)" onClick="removeRow(<?= $key ?>);" class="btn btn-xs btn-danger"><span class="mdi mdi-delete-forever">-</span></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr class="product-table-row">
                                <td>
                                    <div>
                                        <label>Label</label>
                                        <input type="text" name="details[0][label]" id="product-name" class="form-control" placeholder="Label">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <label>Description</label>
                                        <textarea name="details[0][description]" id="description" class="form-control"></textarea>
                                    </div>
                                </td>

                                <td><button type="button" class="btn btn-success mt-4" id="myaddBtn">+</button></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" id="save" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('js')

<script>
    $('#productType').change(function() {

        let val = $(this).val();

        if (val == 'trial_store' || val == 'brand_store') {
            let disabled = (val == 'brand_store') ? 'disabled' : '';
            let value = (val == 'brand_store') ? 0 : '';
            let span = (val == 'trial_store') ? '<span class="note">Trial Point should not greater than 6.</span>' : '';

            $('#saleTrail').html(`<label for="market-price1">Trial Point</label>
                            <input type="text" name="trial_point" value="${value}" class="form-control" placeholder="Trial Point" ${disabled}>
                            <span class="text-danger" id="trial_point_msg"></span>${span}`);
        } else if (val == 'fixed_price' || val == 'rewards_store') {

            let required = (val == 'rewards_store') ? '*' : '';
            $('#rewareField').html(required);

            $('#saleTrail').html(` <label for="market-price1">Sale Price</label>
                            <input type="text" name="sale_price" class="form-control" placeholder="Sale Price">
                            <span class="text-danger" id="sale_price_msg"></span>`);
        }
    })


    var j = "{{!empty($inv_key)?++$inv_key:1}}";
    $('#add_more').click(function() {
        i = parseInt(j);
        var vendor_id = $(this).attr('vendor_id');
        var fieldHTML = `<div class="row" id="row-${i}"> 
                                                <div class="col-md-2 field-group">
                                                    <input type="text" name="inventory[${i}][stock]" class="form-control" placeholder="stock">
                                                </div>
                                                <div class="col-md-2 field-group">
                                                    <select name="inventory[${i}][unit]" id="unit" class="form-select  ">
                                                        <option value="" selected>Select</option>
                                                        <option value="kg">KG</option>
                                                        <option value="pcs">PC</option>
                                                        <option value="pcs">Box</option>
                                                        <option value="pcs">Bottle</option>
                                                        <option value="pcs">Box(4 Units)</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 field-group">
                                                    <select name="inventory[${i}][attribute]" option='${i}' class="form-select attribute">
                                                        <option value="">Select</option>
                                                        @foreach($attributes as $val)
                                                        <option value="{{$val->_id}}">{{ucwords($val->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2 field-group">
                                                    <select name="inventory[${i}][sub_attribute]" id="subAttribute-${i}" class="form-select">
                                                    <option value="">Select</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1 field-group">           
                                <a href="javascript:void(0)" onClick="removeRow(${i});" class="btn btn-xs btn-danger"><span class="mdi mdi-delete-forever">-</span></a>
                              </div>
                                </div>`;
        $('#stock').append(fieldHTML);
        i++;
    });

    function removeRow(id) {
        var element = document.getElementById("row-" + id);
        element.parentNode.removeChild(element);
    }

    var i = "{{!empty($key)?++$key:1}}";
    $('#myaddBtn').click(function() {
        i = parseInt(i);
        var vendor_id = $(this).attr('vendor_id');
        var fieldHTML = `<tr id="row-${i}">
                        <td>
                            <div>
                                <input type="text" name="details[${i}][label]" class="form-control" placeholder="Label" required>
                            </div>
                        </td>
                        <td>
                            <div>
                                <textarea name="details[${i}][description]" rows="1" id="product-description" class="form-control" required></textarea>
                            </div>
                            </td>
                                <td>
                                <a href="javascript:void(0)" onClick="removeRow(${i});" class="btn btn-xs btn-danger"><span class="mdi mdi-delete-forever">-</span></a>
                                </td>
                            </tr>`;
        $('#field_wrapper1').append(fieldHTML);
        i++;
    });

    function removeRow(id) {
        var element = document.getElementById("row-" + id);
        element.parentNode.removeChild(element);
    }

    $(document).on('change', '#attribute', function() {
        let attribute_id = $(this).val();
        $.ajax({
            url: "{{url('crm/sub-attributes')}}/" + attribute_id,
            type: "GET",
            dataType: "JSON",
            success: function(res) {
                let record = res.record;
                let option = '<option value="">Select</option>';
                $.each(record, (index, val) => {
                    option += `<option name="${val._id}">${val.name}</option>`;
                });
                $('#subAttribute').html(option);

            }
        })
    });


    $("form#updateProduct").submit(function(e) {
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
                $('#save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Updating`).attr('disabled', true);
            },
            success: function(res) {

                //hide loader
                $('#save').html('Update').removeAttr('disabled');

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
            }
        });
    });
</script>
@endpush