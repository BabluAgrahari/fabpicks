@extends('crm.layout.app')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@section('content')


<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-12">
                <h4>Privacy Policy</h4>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            @include('crm.message')
            <form action="{{url('crm/privacy/'.$res->id)}}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="search-field">
                        <input type="hidden" value="{{$res->id}}">
                        <div class="field-group">
                            <label for="about-us-content">Privacy Policy Content</label>
                            <textarea name="privacy" id="privacy" class="form-control" required>{{$res->privacy}}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-success mt-5 text-center"><x-icon type="update"/>Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection