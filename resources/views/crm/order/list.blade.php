@extends('crm.layout.app')
@section('content')


<div class="card">
  <div class="card-header ">
    <div class="row">
      <div class="col-md-9">
        <h5>Order List</h5>
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
                <td>

                  <select _id="{{$list->_id}}" class="status form-select form-select-sm">
                    <option value="pending" {{$list->order_status =='pending'?'selected':''}}>Pending</option>
                    <option value="accept" {{$list->order_status =='accept'?'selected':''}}>Accept</option>
                    <option value="dispatch" {{$list->order_status =='dispatch'?'selected':''}}>Dispatch</option>
                    <option value="delivared" {{$list->order_status =='delivared'?'selected':''}}>Delivared</option>
                  </select>
                </td>
                <td><a href="{{url('crm/order-details/'.$list->_id)}}" class="orderDetails text-info" _id="{{$list->_id}}"> <x-icon type="details" /></a></td>
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
  $(document).on('change', '.status', function(e) {
    e.preventDefault(0);
    // alert('hellow');
    let id = $(this).attr('_id');
    let order_status = $(this).val();
    $.ajax({
      url: "{{url('crm/order')}}/" + id,
      type: 'post',
      datatype: 'JSON',
      data: {
        _token: '{{ csrf_token() }}',
        'order_status': order_status,
      },
      success: function(res) {
        if (res.status || !res.status) {
          let status = res.status ? 'success' : 'error';
          $.toast({
            text: res.msg,
            heading: ucwords(status),
            icon: status,
            position: 'top-right',
          })
        }
      }

    });
  });
</script>
@endpush

@endsection