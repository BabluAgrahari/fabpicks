@extends('crm.layout.app')
@section('content')


<div class="container product-type product-listing ">
    <div class="row">
        <div class="col-md-6">
            <h4 class="page-title">Edit Product</h4>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <a href="{{url('crm/product')}}" class="btn btn-primary btn-sm ">Back</a>
        </div>
    </div>
    <div id="message"></div>
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
                        <label for="sub-category">Category/Sub Category</label>
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
                            <label for="minimum-qty">Maximum Qty per User</label>
                            <input type="text" name="maximum_qty" value="{{$res->maximum_qty}}" id="minimum-qty" class="form-control" placeholder="Enter Qty">
                            <span class="text-danger" id="maximum_qty_msg"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-group">
                            <label for="product-expire-date">Product Expire Date</label>
                            <input type="date" name="expire_date" value="{{date('Y-m-d',$res->expire_date)}}" id="product-expire-date" class="form-control">
                            <span class="text-danger" id="expire_date_msg"></span>
                        </div>
                    </div>
                </div>

                <div class="field-group ">
                    <label for="product-description ">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control">{{$res->description}}</textarea>
                    <span class="note"> Do not exceed 100 characters when entring the product name.</span>
                    <span class="text-danger" id="description_msg"></span>
                </div>

            </div>

            <div class="col-md-6">

                <div class="field-group">
                    <label for="product-type">Product Type </label>
                    <select name="product_type" id="productType" class="form-control">
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
                    <table id="MyTable" class="table">
                        <tbody id="field_wrapper">

                            @forelse($res->Inventory as $inv_key=>$inv)
                            <tr>
                                <td style="width: 100px;">
                                    <div class="field-group">
                                        @if($loop->first)<label for="stock">Stock </label>@endif
                                        <input type="text" name="inventory[{{$inv_key}}][stock]" value="{{$inv->stock}}" class="form-control" placeholder="Stock">
                                    </div>
                                </td>

                                <td style="width: 100px;">
                                    <div class="field-group">
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
                                </td>

                                <td>
                                    <div class="field-group">
                                        @if($loop->first) <label for="add-size">Attributes</label>@endif
                                        <select name="inventory[{{$inv_key}}][attribute]" id="attribute" option='{{$inv_key}}' class="form-select attribute">
                                            <option value="">Select</option>
                                            @foreach($attributes as $val)
                                            <option value="{{$val->_id}}" @selected($inv->attribute ==$val->_id)>{{ucwords($val->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="field-group">
                                        @if($loop->first)<label for="product-color">Sub Attr</label>@endif
                                        <select name="inventory[{{$inv_key}}][sub_attribute]" id="subAttribute-{{$inv_key}}" class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    @if($loop->first)
                                    <button type="button" class="btn btn-success" id="add_more">+</button>
                                    @else
                                    <a href="javascript:void(0)" onClick="removeRow(<?= $inv_key ?>);" class="btn btn-xs btn-danger"><span class="mdi mdi-delete-forever">-</span></a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td style="width: 100px;">
                                    <div class="field-group">
                                        <label for="stock">Stock </label>
                                        <input type="text" name="inventory[0][stock]" id="stock" class="form-control" placeholder="Stock">
                                    </div>
                                </td>

                                <td style="width: 100px;">
                                    <div class="field-group">
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
                                </td>

                                <td>
                                    <div class="field-group">
                                        <label for="add-size">Attributes</label>
                                        <select name="inventory[0][attribute]" id="attribute" option='0' class="form-select attribute">
                                            <option value="">Select</option>
                                            @foreach($attributes as $val)
                                            <option value="{{$val->_id}}">{{ucwords($val->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="field-group">
                                        <label for="product-color">Sub Attr</label>
                                        <select name="inventory[0][sub_attribute]" id="subAttribute-0" class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success" id="add_more">+</button>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="field-group">
                        <label>No Feedback</label>
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

                    <div class="field-group">
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
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">

                <div class="product-image">
                    <section>
                        <div class="form-group">
                            <label class="control-label">Thumbnail</label>
                            <div class="product-image-upload-container">
                                <div class="preview-zone hidden">
                                    <div class="box box-solid">
                                        <div class="box-body"><img src="{{$res->thumbnail ?? defaultImg('250x200')}}" class="img-fluid" alt=""></div>
                                    </div>
                                </div>
                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <p>Choose an image file or drag it here.</p>
                                    </div>
                                    <input type="file" name="thumbnail" class="dropzone">
                                    <span class="text-danger" id="thumbnail_msg"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="col-md-6">
                <!-- <div class="product-image">
                    <section>
                        <div class="form-group">
                            <label class="control-label">Images</label>
                            <div class="product-image-upload-container">
                                <div class="preview-zone hidden">
                                    <div class="box box-solid">

                                        <div class="box-body"><img src="https://m.media-amazon.com/images/I/81+l0HJ-iFL._AC_SS450_.jpg" class="img-fluid" alt=""></div>
                                    </div>
                                </div>
                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <p>Choose an image file or drag it here.</p>
                                    </div>
                                    <input type="file" multiple="multiple" name="images" class="dropzone">
                                    <span class="text-danger" id="images_msg"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div> -->
            </div>
        </div>

        <div class="row">
            <hr>
            <table class="table table-borderless" id="myproductTable">
                <tbody id="field_wrapper1">
                    @forelse($res->details as $key=>$detail)
                    <tr class="product-table-row" id="row-{{$key}}">

                        <td>
                            <div> @if($loop->first)<label>Label</label>@endif
                                <input type="text" name="details[{{$key}}][label]" value="{{!empty($detail['label'])?$detail['label']:''}}" class="form-control" placeholder="Label">
                            </div>
                        </td>

                        <td>
                            <div> @if($loop->first)<label>Description</label>@endif
                                <textarea name="details[{{$key}}][description]" class="form-control">{{!empty($detail['description'])?$detail['description']:''}}</textarea>
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
                    @empty
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
                    @endforelse
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
        var fieldHTML = `<tr id="row-${i}">
                                            <td style="width: 100px;">
                                                <div class="field-group">
                                                    <label for="stock">Stock </label>
                                                    <input type="text" name="inventory[${i}][stock]" class="form-control" placeholder="stock">
                                                </div>
                                            </td>

                                            <td style="width: 100px;">
                                                <div class="field-group">
                                                    <label for="unit">Unit</label>
                                                    <select name="inventory[${i}][unit]" id="unit" class="form-select  ">
                                                        <option value="" selected>Select</option>
                                                        <option value="kg">KG</option>
                                                        <option value="pc">PC</option>
                                                        <option value="box">Box</option>
                                                        <option value="bottle">Bottle</option>
                                                        <option value="4_units">Box(4 Units)</option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="field-group">
                                                    <label for="add-size">Attributes</label>
                                                    <select name="inventory[${i}][attribute]" option='${i}' class="form-select attribute">
                                                        <option value="">Select</option>
                                                        @foreach($attributes as $val)
                                                        <option value="{{$val->_id}}">{{ucwords($val->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="field-group">
                                                    <label for="product-color">Sub Attr</label>
                                                    <select name="inventory[${i}][sub_attribute]" id="subAttribute-${i}" class="form-control">
                                               <option value="">Select</option>
                                              </select>
                                                    </div>
                                                </div>
                                            </td>
                                <td>
                                <a href="javascript:void(0)" onClick="removeRow(${i});" class="btn btn-xs btn-danger"><span class="mdi mdi-delete-forever">-</span></a>
                                </td>
                            </tr>`;
        $('#field_wrapper').append(fieldHTML);
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
                                <textarea name="details[${i}][description]" id="product-description" class="form-control" required></textarea>
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