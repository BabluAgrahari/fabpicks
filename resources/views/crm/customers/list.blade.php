@extends('crm/layout/app')
@section('content')

<div class="container ">
          <div class="row">
            <div class="col-md-12">
              <h4>Customers List</h4>
            </div>
            <div class="col-md-12">
              <table class="table customer-table">
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
@endsection