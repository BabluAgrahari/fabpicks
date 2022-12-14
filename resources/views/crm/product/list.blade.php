@extends('crm.layout.app')
@section('content')

<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-3">
                <h5>All Products </h5>
            </div>
            <div class="col-md-9 product-btn-group d-flex justify-content-end">
                @if(!empty($filter))
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
                @else
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
                @endif
                <a href="{{url('crm/product/create')}}" class="btn btn-success btn-sm">
                    <x-icon type="add" /> Add
                </a>
            </div>
        </div>
    </div>



    <div class="card-body">
        @include('crm.product.filter')
        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table class="table products-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Trail Point</th>
                                <th>Sale Price</th>
                                <th>Rewards Point</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td><img src="{{$list->image ?? defaultImg()}}" style="height:50px; width:60px;"> </td>
                                <td>{{ucwords($list->name)}}</td>
                                <td>{{ucwords(str_replace('_',' ',$list->product_type))}}</td>
                                <td>{{!empty($list->SubCategory->Category->name)?$list->SubCategory->Category->name:''}}/{{ !empty($list->SubCategory->name)?$list->SubCategory->name:''}}</td>
                                <td>{{$list->trial_point}}</td>
                                <td>{{$list->sale_price}}</td>
                                <td>{{$list->rewards_point}}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="javascript:void(0)" _id="{{$list->sub_category}}" product_id="{{$list->_id}}" class="view text-info"><i class="ri-add-circle-line"></i></a>
                                        <a href="{{url('crm/product/'.$list->_id)}}/edit" class="edit text-info">
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

@push('js')
<script>
    $('.view').click(function() {
        $('#relatedProducts').modal('show');
    })
</script>
@endpush
@push('modal')
<!-- related products start -->
<div class="modal fade" id="relatedProducts" tabindex="-1" aria-labelledby="related-product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="related-product">Related products</h1>
                <button type="button" onclick="javascript:window.location.reload()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div id="message"></div>
                    <div class="col-md-12">
                        <table class="table table-light table-striped products-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Sort</th>

                                </tr>
                            </thead>
                            <tbody id="list">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- related products End -->
@endpush

@push('js')
<script>
    // //for edit
    $(document).on('click', '.view', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let product_id = $(this).attr('product_id');
        let url = "{{url('crm/product-view')}}/" + id;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: {
                'product_id': product_id
            },
            success: function(res) {

                if (res.status) {
                    let list = '';
                    $.each(res.record, (index, val) => {
                        list += `<tr><td>${++index}</td>
                        <td><img src="${val.image}" style="height:50px; width:60px;"></td>
                        <td>${val.name}</td>
                        <td> <input type="text" _id="${val._id}" value="${val.sort}" name="sort" class="updatesort form-control form-control-sm" > </td>
                        
                        </tr>`;
                    });
                    $('#list').html(list);

                }
            }
        });
    });

    $(document).on('keyup', '.updatesort', function(e) {
        e.preventDefault(0);
        let id = $(this).attr('_id');
        let sort = $(this).val();
        $.ajax({
            url: "{{url('crm/product-update')}}/" + id,
            type: 'post',
            datatype: 'JSON',
            data: {
                _token: '{{ csrf_token() }}',
                'sort': sort,
            },
            success: function(res) {
                if (res.status || !res.status) {
                    alertMsg(res.status, res.msg, 2000);
                }
            }

        });
    });
</script>
@endpush;

@endsection