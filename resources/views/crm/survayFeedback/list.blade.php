@extends('crm.layout.app')
@section('content')

<div class="container ">
          <div class="row">
            <div class="col-md-12">
              <h4 class="page-title">Survay Feedback</h4>
            </div>
            <div class="col-md-12 ">
              <table class="table table-light table-striped custom-table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">User</th>
                    <th scope="col">Review</th>
                    <th scope="col">Quality</th>
                    <th scope="col">Price</th>
                    <th scope="col">Value</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Product - 1</td>
                    <td>Sandeep</td>
                    <td>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, culpa.</p>
                    </td>
                    <td>Quality</td>
                    <td>Rs. 12984</td>
                    <td>Rs. 11984</td>
                    <td>Remark</td>
                    <td>Status</td>
                    <td>
                      <div class="action-group">
                        <a href="#"><i class="ri-pencil-line"></i></a>
                        <a href="#"><i class="ri-delete-bin-line"></i>
                        </a>
                      </div>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>

@endsection