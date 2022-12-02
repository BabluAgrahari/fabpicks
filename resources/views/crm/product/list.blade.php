@extends('crm.layout.app')
@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-3">
            <h4>All Products </h4>
        </div>

        <div class="col-md-9 product-btn-group ml-auto">
            <a href="{{url('crm/product/create')}}" class="btn btn-success btn-sm"><i class="ri-add-circle-line"></i> Add</a>
        </div>

        <div class="col-md-12 mt-5">
            <table class="table table-light table-striped custom-table">
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
                        <td>{{$list->trail_point}}</td>
                        <td>{{$list->sale_price}}</td>
                        <td>{{$list->rewards_point}}</td>
                        <td>
                            <div class="action-group">
                                <a href="{{url('crm/product/'.$list->_id)}}/edit"  class="edit text-info"><i class="ri-pencil-line"></i></a>
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

@endsection