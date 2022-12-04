@extends('crm.layout.app')
@section('content')

<div class="container ">
  <div class="row">
    <div class="col-md-12">
      <h4>Order List</h4>
    </div>
    <div class="col-md-12">
      <table class="table customer-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Order Number</th>
            <th scope="col">Order Date</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection