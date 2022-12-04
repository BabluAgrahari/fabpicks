@extends('crm.layout.app')
@section('content')

<div class="container ">
          <div class="row">
            <div class="col-md-12">
              <h4 class="page-title">Survay Feedback</h4>
            </div>
            <div class="col-md-12 ">
              <table class="table table-light table-striped custom-table">
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

@endsection