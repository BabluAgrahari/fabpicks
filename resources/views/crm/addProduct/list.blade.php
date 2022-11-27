@extends('crm.layout.app')
@section('content')

<div class="container ">
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-title"><i class="ri-add-circle-line"></i> Product Add</h4>
        </div>
        <div id="message"></div>
        <form id="addproduct" action="{{url('crm/product-add')}}" method="post" class="custom-form">
            @csrf
            <div class="row">

                <div class="col-md-6">
                    <div class="field-group">
                        <label for="prodcut-name ">Product Name: <span class="required">*</span> </label>
                        <input type="text" id="prodcut_name" name="prodcut_name" class="form-control" placeholder="Please enter product name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-group">
                        <label for="select-brand ">Select Brand: <span class="required">*</span></label>
                        <select name="brand_id" id="select-brand" class="form-select js-example-basic-single">
                            <option value="">Select</option>
                            @foreach($brands as $res)
                            <option value="{{$res->id}}">{{ucwords($res->brand_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="select-category ">Category: <span class="required">*</span></label>
                        <select name="category_id" id="select-category" class="form-select js-example-basic-single">
                            <option value="">Select</option>
                            @foreach($categories as $res)
                            <option value="{{$res->id}}">{{ucwords($res->category_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="field-group">
                        <label for="select-subcategory ">Sub Category: <span class="required">*</span></label>
                        <select name="sub_category_id" id="select-subcategory" class="form-select js-example-basic-single">
                            <option value="">Select</option>
                            @foreach($subcategories as $res)
                            <option value="{{$res->id}}">{{ucwords($res->sub_category_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="field-group">
                        <label for="select-childcategory ">ChildCategory: <span class="required">*</span></label>
                        <select name="chind_category_id" id="select-childcategory" class="form-select js-example-basic-single">
                            <option value="">Select</option>
                            @foreach($childcategories as $res)
                            <option value="{{$res->id}}">{{ucwords($res->child_category_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="field-group">
                    <label for="also ">Also: <span class="required">*</span></label>
                    <select name="also" id="also" class="form-select js-example-basic-single" multiple="multiple">
                        <option value="" selected>Select</option>
                        <option value="category-1">category-1</option>
                        <option value="category-2">category-2</option>
                        <option value="category-3">category-3</option>
                        <option value="category-4">category-4</option>
                        <option value="category-5">category-5</option>
                        <option value="category-6">category-6</option>
                        <option value="category-7">category-7</option>
                    </select>
                </div>
                <span class="note"><i class="fa-solid fa-circle-info"></i>if in list primary category is also present then it will auto remove from this after create product.</span>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="select-store ">Select Store: <span class="required">*</span></label>
                        <select name="store" id="select-store" class="form-select js-example-basic-single">
                            <option value="" selected>Select</option>
                            <option value="store-1">store-1</option>
                            <option value="store-2">store-2</option>
                            <option value="store-3">store-3</option>
                            <option value="store-4">store-4</option>
                            <option value="store-5">store-5</option>
                            <option value="store-6">store-6</option>
                            <option value="store-7">store-7</option>
                        </select>
                        <span class="note"><i class="fa-solid fa-circle-info"></i>(Please Choose Store Name)</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="field-group">
                        <label for="product-image ">Upload Product Image</label>
                        <input type="file" name="product_image" id="product-image" class="form-control">
                        <span class="note"><i class="fa-solid fa-circle-info"></i>Image max size: 1MB</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="product-gallery-image ">Upload Product Gallery Image</label>
                        <input type="file" name="product_gallery_image" id="product-gallery-image" class="form-control">
                        <span class="note"><i class="fa-solid fa-circle-info"></i>Image max size: 1MB</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="field-group">
                    <label for="description">Description: </label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                    <span class="note"><i class="fa-solid fa-circle-info"></i>Please Enter Product Description</span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="selling-date">Start Selling From:</label>
                        <input type="date" name="date" id="selling-date" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="tags">Tags: </label>
                        <input type="text" name="tag" id="tags" class="form-control" placeholder="Please enter tag seprated by Comma(,)">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="model">Model:</label>
                        <input type="text" name="model" id="model" class="form-control" placeholder="Please enter model number">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="hsn/sac">HSN/SAC: <span class="required">*</span></label>
                        <input type="text" name="hsn" id="hsn/sac" class="form-control" placeholder="Please enter HSN/SAC Code">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="sku">SKU: <span class="required">*</span></label>
                        <input type="text" name="sku" id="sku" class="form-control" placeholder="Please enter SKU Code">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-group">
                        <div class="form-check form-switch custom-switch custom-switch-1">
                            <label class="form-check-label" for="tax">Price Including Tax ?</label>
                            <input class="form-check-input" name="status" value="1" type="checkbox" role="switch" id="tax" checked>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="price">Price: <span class="required">*</span></label>
                        <div class="input-group ">
                            <span class="input-group-text" id="price">INR</span>
                            <input type="text" name="price" class="form-control" id="price" aria-describedby="price">
                        </div>
                        <span class="note"><i class="fa-solid fa-circle-info"></i>Do not put comma with entring price</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="offer-price">Offer Price: <span class="required">*</span></label>
                        <div class="input-group ">
                            <span class="input-group-text" id="offer-price">INR</span>
                            <input type="text" name="offer_price" class="form-control" id="price" aria-describedby="offer-price">
                        </div>
                        <span class="note"><i class="fa-solid fa-circle-info"></i>Do not put comma with entring offer price</span>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="field-group">
                        <label for="tax-apply">Tax Applied(In %) <span class="required">*</span></label>
                        <div class="input-group ">
                            <input type="text" name="text_applied" class="form-control" id="price" aria-describedby="tax-apply">
                            <span class="input-group-text" id="tax-apply">%</span>
                        </div>
                        <span class="note"><i class="fa-solid fa-circle-info"></i>Do not put comma with entring offer price</span>
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-4">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success ml-4" id="save">save</button>
                </div>



            </div>

        </form>
    </div>


</div>


@endsection


@push('js')
<script>
    /*start form submit functionality*/
    $("form#addproduct").submit(function(e) {
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
                    $('form#addproduct').trigger('reset');
            }
        });
    });
</script>
@endpush