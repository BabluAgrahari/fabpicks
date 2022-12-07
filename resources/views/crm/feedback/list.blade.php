@extends('crm.layout.app')
@section('content')

<div class="card">
  <div class="card-header ">
    <div class="row">
      <div class="col-md-12">
        <h4>Survay Feedback</h4>
      </div>
    </div>
  </div>

  <div class="card-body">
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
    <div class="row align-items-center mb-3">
            <div class="col-md-1">
                <div class="list-number">
                    <select name="" id="" class="form-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
            </div>

            <div class="col-md-5 ">
                <p class="mb-0">Showing 1 to 6 of 25 Results</p>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <nav aria-label="Page navigation  pagination-sm">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
  </div>
</div>

@endsection