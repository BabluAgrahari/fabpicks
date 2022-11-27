@extends('crm.layout.app')
@section('content')

<div class="container product-type product-listing ">
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-title">Add Product</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="field-group">
                <label for="product-name ">Product Name </label>
                <input type="text" id="product-name" class="form-control" placeholder="Product Name" required>
            </div>
            <div class="field-group ">
                <label for="product-description ">Description</label>
                <textarea name="" id="product-description" class="form-control " ;></textarea>
                <span class="note"> Do not exceed 100 characters when entring the product name.</span>
            </div>
            <div class="field-group">
                <label for="product-name ">Size </label>
                <input type="text" id="product-name" class="form-control" placeholder="Size" required>
            </div>

        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-6">
                    <div class="field-group">
                        <label for="product-type">Product Listing Type </label>
                        <select name="" id="product-type" class="form-select js-example-basic-single">
                            <option value="" selected>Trial Store</option>
                            <option value="product-type -1">Brand Store</option>
                            <option value="product-type -2">Fixed Price</option>
                            <option value="product-type -4">Rewards Store</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="field-group">
                        <label for="market-price1">Sale Price/ Trial Point</label>

                        <input type="text" class="form-control" placeholder="Sale Price/ Trial Point">
                    </div>
                </div>
                <div class="col-6">
                    <div class="field-group">
                        <label for="market-price1">Rewards Point</label>
                        <input type="text" id="market-price1" class="form-control" placeholder="Rewards Point">
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
                                    <input type="text" id="stock" class="form-control" placeholder="500" required>
                                </div>
                            </td>

                            <td style="width: 100px;">
                                <div class="field-group">
                                    <label for="unit">Unit</label>
                                    <select name="" id="unit" class="form-select  ">
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
                                    <select name="" id="add-size" class="form-select  ">
                                        <option value="">Select</option>
                                        @foreach($attributes as $val)
                                        <option value="{{$val->_id}}">{{ucwords($val->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="field-group">
                                    <label for="product-color">Color</label>

                                </div>
                            </td>
                            <td>
                                <button class="btn btn-success" id="add_more">+</button>
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
                                <input type="text" id="product-name" class="form-control" placeholder="Product Name" required>
                            </div>
                        </td>
                        <td>

                            <div class="field-group">
                                <label for="product-description ">Description</label>
                                <textarea name="" id="product-description" class="form-control"></textarea>
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
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-image">
                <section>
                    <form action="" method="POST" enctype="multipart/form-data">
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
                                    <input type="file" name="img_logo" class="dropzone">
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

                <div class="field-group">
                    <label for="product-brand">Brand</label>
                    <select name="" id="product-brand" class="form-select js-example-basic-single">
                        <option value="">Select</option>
                        @foreach($brands as $val)
                        <option value="{{$val->_id}}">{{ucwords($val->name)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-group">
                    <label for=" "> </label>
                    <select name="" id="product-feedback-form" class="form-select js-example-basic-single">
                        <option value="">No Feedback</option>
                        @foreach($survay as $val)
                        @if($val->type=='no_feedback')
                        <option value="{{$val->_id}}">{{ucwords($val->title)}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="field-group">
                    <label for="pre-qulifing-questions">Pre-Qulifing Questions</label>
                    <select name="" id="pre-qulifing-questions" class="form-select js-example-basic-single">
                        <option value="">No Pre-Qulifing Questions</option>
                        @foreach($survay as $val)
                        @if($val->type=='pre_qulifing_question')
                        <option value="{{$val->_id}}">{{ucwords($val->title)}}</option>
                        @endif
                        @endforeach
                    </select>
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
                        <input type="text" id="mrp" class="form-control" placeholder="1000" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-group">
                        <label for="offer-price">Offer Price</label>
                        <input type="text" id="offer-price" class="form-control" placeholder="200" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="field-group">
                        <label for="minimum-qty">Maximum Qty per User</label>
                        <input type="text" id="minimum-qty" class="form-control" placeholder="1000" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-group">
                        <label for="product-expire-date">Product Expire Date</label>
                        <input type="date" id="product-expire-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-6 mt-5">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#related-products">Add Related Products</button>
        </div> -->
    </div>

    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-success">Save</button>
        </div>
    </div>
</div>

@endsection

@push('js')

<script>
    var i = 1;
    $('#add_more').click(function() {
        var vendor_id = $(this).attr('vendor_id');
        var fieldHTML = `<tr id="row-${i}">
                                            <td style="width: 100px;">
                                                <div class="field-group">
                                                    <label for="stock">Stock </label>
                                                    <input type="text" id="stock" class="form-control" placeholder="500" required>
                                                </div>
                                            </td>

                                            <td style="width: 100px;">
                                                <div class="field-group">
                                                    <label for="unit">Unit</label>
                                                    <select name="" id="unit" class="form-select  ">
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
                                                    <select name="" id="add-size" class="form-select  ">
                                                        <option value="">Select</option>
                                                        @foreach($attributes as $val)
                                                        <option value="{{$val->_id}}">{{ucwords($val->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="field-group">
                                                    <label for="product-color">Color</label>
                                                   
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
</script>
@endpush