@extends('crm.layout.app')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@section('content')

<div class="container " id="test">
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-title">About Us</h4>
        </div>
        @include('crm.message')
       <form action="{{url('crm/aboutus/'.$res->id)}}" method="post">
        @csrf
       <div class="col-md-12">
            <div class="search-field">
                <input type="hidden" value="{{$res->id}}">
                <div class="field-group">
                    <label for="about-us-content">About Us Content</label>
                    <textarea name="aboutus" id="aboutus" class="form-control" required>{{$res->aboutus}}</textarea>
                </div>
            </div>
            <button class="btn btn-success mt-5 text-center">Update</button>
        </div>
       </form>

    </div>
</div>

@endsection