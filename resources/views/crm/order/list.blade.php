@extends('crm.layout.app')
@section('content')

<div class="card">
  <div class="card-header ">
    <div class="row">
      <div class="col-md-9">
        <h4>Order List</h4>
      </div>
      <div class="col-md-3 ">
        <div class=" product-btn-group d-flex justify-content-end">
          @if(!empty($filter))
          <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
          @else
          <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    @include('crm.order.filter')
    <div class="row">
      <div class="col-md-12 ">
        <div class="table-responsive">
          <table class="table products-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Order Number</th>
                <th scope="col">Order Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lists as $key=>$list)
              <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$list->order_number}}</td>
                <td>{{date('d-m-Y',(int)$list->order_date)}}</td>
                <td>{{$list->amount}}</td>
                <td>{{$list->status}}</td>
                <td><a href="{{url('crm/order-details/'.$list->_id)}}" class="orderDetails text-info" _id="{{$list->_id}}"><i class="ri-add-circle-line"></i></a></td>
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


@endsection