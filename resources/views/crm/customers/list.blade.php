@extends('crm/layout/app')
@section('content')

<div class="card">
  <div class="card-header ">
    <div class="row">
      <div class="col-md-9">
        <h5><x-icon type="list" />Customers List</h5>
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
    @include('crm.customers.filter')
    <div class="row">
      <div class="col-md-12 ">
        <div class="table-responsive">
          <table class="table products-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">City</th>
                <th scope="col">Address</th>
                <th scope="col">Pincode</th>
                <th scope="col">State</th>

              </tr>
            </thead>
            <tbody>
              @foreach($lists as $key => $list)
              <tr>
                <td>{{++$key}}</td>
                <td>{{$list->name}}</td>
                <td>{{$list->email}}</td>
                <td>{{$list->role}}</td>
                <td>{{$list->city}}</td>
                <td>{{$list->address}}</td>
                <td>{{$list->pincode}}</td>
                <td>{{$list->state}}</td>

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