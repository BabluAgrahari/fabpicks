@extends('crm.layout.app')
@section('content')

<div class="card">
  <div class="card-header ">
    <div class="row">
      <div class="col-md-9">
        <h4>Survay Feedback</h4>
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
  @include('crm.feedback.filter')
    <div class="row">
      <div class="col-md-12 ">
        <div class="table-responsive">
          <table class="table products-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <!-- <th scope="col">Product</th> -->
                <th scope="col">User</th>
                <th scope="col">Review</th>
                <th scope="col">Quality</th>
                <th scope="col">Price</th>
                <th scope="col">Value</th>
                <th scope="col">Status</th>
                <th scope="col">Remark</th>

                <!-- <th scope="col">Action</th> -->
              </tr>
            </thead>
            <tbody>
              @foreach($lists as $key => $list)
              <tr>
                <td>{{++$key}}</td>
                <td>{{$list->User->name}}</td>
                <td>{{$list->review}}</td>
                <td>{{$list->quality}}</td>
                <td>{{$list->price}}</td>
                <td>{{$list->value}}</td>
                <td>{{$list->status}}</td>
                <td>{{$list->remarks}}</td>


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