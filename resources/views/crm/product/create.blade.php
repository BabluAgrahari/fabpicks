@extends('crm.layout.app')
@section('content')

<div class="container product-type product-listing ">
    <div class="row">
        <div class="col-md-6">
            <h4 class="page-title">Add Product</h4>
        </div>
        <div class="col-md-6"  style="text-align: right;">
            <a href="{{url('crm/product')}}" class="btn btn-primary btn-sm ">Back</a>
        </div>
    </div>
    <div id="message"></div>
    <form id="saveProduct" action="{{url('crm/product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-6">
                <div class="field-group">
                    <label for="product-name ">Product Name </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Product Name">
                    <span class="text-danger" id="name_msg"></span>
                </div>

                <div class="field-group ">
                    <label for="product-description ">Description</label>
                    <textarea name="description" id="description" class="form-control " ;></textarea>
                    <span class="note"> Do not exceed 100 characters when entring the product name.</span>
                    <span class="text-danger" id="description_msg"></span>
                </div>

                <div class="field-group">
                    <label for="product-name ">Size </label>
                    <input type="text" id="size" name="size" class="form-control" placeholder="Size">
                    <span class="text-danger" id="size_msg"></span>
                </div>
            </div>

            <div class="col-md-6">

                <div class="field-group">
                    <label for="product-type">Product Type </label>
                    <select name="product_type" id="productType" class="form-control">
                        <option value="trial_store">Trial Store</option>
                        <option value="brand_store">Brand Store</option>
                        <option value="fixed_price">Fixed Price</option>
                        <option value="rewards_store">Rewards Store</option>
                    </select>
                    <span class="text-danger" id="product_type_msg"></span>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="field-group" id="saleTrail">
                            <label for="market-price1">Trial Point</label>
                            <input type="text" name="trial_point" class="form-control" placeholder="Trial Point">
                            <span class="note">Trial Point should not greater than 6.</span>
                            <span class="text-danger" id="trial_point_msg"></span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="field-group">
                            <label for="market-price1">Rewards Point<span class="text-danger" id="rewareField"></span></label>
                            <input type="text" name="rewards_point" id="market-price1" class="form-control" placeholder="Rewards Point">
                            <span class="text-danger" id="rewards_point_msg"></span>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <table id="MyTable" class="table">
                        <tbody id="field_wrapper">
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
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">

                <table class="table table-borderless" id="myproductTable">
                    <tbody id="field_wrapper1">
                        <tr class="product-table-row">

                            <td>
                                <div class="field-group">
                                    <label for="product-name ">Product Tittle </label>
                                    <input type="text" name="product_title" id="product-name" class="form-control" placeholder="Product Name">
                                </div>
                            </td>
                            <td>

                                <div class="field-group">
                                    <label for="product-description">Description</label>
                                    <textarea name="product_description" id="description" class="form-control"></textarea>
                                    <span class="note"> Do not exceed 100 characters when entring the product name.</span>
                                </div>
                            </td>

                            <td><button class="btn btn-success mt-4" id="myaddBtn">+</button></td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <div class="col-md-6">
                <div class="field-group">
                    <label for="sub-category">Category/Sub Category</label>
                    <select name="sub_category" id="sub_category" class="form-select js-example-basic-single">
                        <option value="">Select Category</option>
                        @foreach($subCategories as $val)
                        <option value="{{$val->_id}}">{{!empty($val->Category->name)?ucwords($val->Category->name):''}}/{{ucwords($val->name)}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="sub_category_msg"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-image">
                    <section>
                        <div class="form-group">
                            <label class="control-label">Product Image</label>
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
                                    <input type="file" name="thumbnail" class="dropzone">
                                    <span class="text-danger" id="thumbnail_msg"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="field-group">
                        <label for="product-brand">Brand</label>
                        <select name="brand_id" id="product-brand" class="form-select js-example-basic-single">
                            <option value="">Select</option>
                            @foreach($brands as $val)
                            <option value="{{$val->_id}}">{{ucwords($val->name)}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="brand_id_msg"></span>
                    </div>

                    <div class="field-group">
                        <label>No Feedback</label>
                        <select name="no_feedback" id="product-feedback-form" class="form-select js-example-basic-single">
                            <option value="">No Feedback</option>
                            @foreach($survay as $val)
                            @if($val->type=='no_feedback')
                            <option value="{{$val->_id}}">{{ucwords($val->title)}}</option>
                            @endif
                            @endforeach
                        </select>
                        <span class="text-danger" id="no_feedback_msg"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-group">
                        <label for="pre-qulifing-questions">Pre-Qulifing Questions</label>
                        <select name="pre_qulifing_question" id="pre-qulifing-questions" class="form-select js-example-basic-single">
                            <option value="">No Pre-Qulifing Questions</option>
                            @foreach($survay as $val)
                            @if($val->type=='pre_qulifing_question')
                            <option value="{{$val->_id}}">{{ucwords($val->title)}}</option>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="field-group">
                            <label for="mrp">MRP</label>
                            <input type="text" name="mrp" id="mrp" class="form-control" placeholder="Enter MRP">
                            <span class="text-danger" id="mrp_msg"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-group">
                            <label for="offer-price">Offer Price</label>
                            <input type="text" name="offer_price" id="offer-price" class="form-control" placeholder="Enter Price">
                            <span class="text-danger" id="offer_price_msg"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="field-group">
                            <label for="minimum-qty">Maximum Qty per User</label>
                            <input type="text" name="maximum_qty" id="minimum-qty" class="form-control" placeholder="Enter Qty">
                            <span class="text-danger" id="maximum_qty_msg"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-group">
                            <label for="product-expire-date">Product Expire Date</label>
                            <input type="date" name="expire_date" id="product-expire-date" class="form-control">
                            <span class="text-danger" id="expire_date_msg"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-6 mt-5">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#related-products">Add Related Products</button>
        </div> -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" id="save" class="btn btn-success">Save</button>
            </div>
        </div>+
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
    var i = 1;
    $('#add_more').click(function() {
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

    var i = 1;
    $('#myaddBtn').click(function() {
        var vendor_id = $(this).attr('vendor_id');
        var fieldHTML = `<tr id="row-${i}">
                        <td>
                            <div class="field-group">
                                <input type="text" id="product-name" class="form-control" placeholder="Product Name" required>
                            </div>
                        </td>
                        <td>
                            <div class="field-group">
                                <textarea name="" id="product-description" class="form-control"></textarea>
                            </div>
                            </td>
                                <td class="field-group">
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

    $(document).on('change', '.attribute', function() {
        let attribute_id = $(this).val();
        let selector = $(this).attr('option');
        $.ajax({
            url: "{{url('crm/sub-attributes')}}/" + attribute_id,
            type: "GET",
            dataType: "JSON",
            success: function(res) {
                let record = res.record;
                let option = '<option value="">Select</option>';
                $.each(record, (index, val) => {
                    option += `<option value="${val._id}">${val.name}</option>`;
                });
                $('#subAttribute-'+selector).html(option);

            }
        })
    });


    $("form#saveProduct").submit(function(e) {
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
                    $('form#saveProduct').trigger('reset');
            }
        });
    });
</script>
@endpush