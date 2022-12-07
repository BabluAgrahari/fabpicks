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
                <a href="{{url('crm/product/create')}}" class="btn btn-success btn-sm"><i class="ri-add-circle-line"></i> Add</a>
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
                                <td><img src="{{$list->thumbnail ?? defaultImg()}}" style="height:50px; width:60px;"> </td>
                                <td>{{ucwords($list->name)}}</td>
                                <td>{{ucwords(str_replace('_',' ',$list->product_type))}}</td>
                                <td>{{!empty($list->SubCategory->Category->name)?$list->SubCategory->Category->name:''}}/{{ !empty($list->SubCategory->name)?$list->SubCategory->name:''}}</td>
                                <td>{{$list->trail_point}}</td>
                                <td>{{$list->sale_price}}</td>
                                <td>{{$list->rewards_point}}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="javascript:void(0)" class="view text-info"><i class="ri-add-circle-line"></i></a>
                                        <a href="{{url('crm/product/'.$list->_id)}}/edit" class="edit text-info"><i class="ri-pencil-line"></i></a>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">

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
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><img src="{{defaultImg('50x50')}}"></td>
                                    <td>Product Name</td>
                                    <td><input type="number" class="form-control" name="sort" value="1"></td>
                                </tr>
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
@endsection