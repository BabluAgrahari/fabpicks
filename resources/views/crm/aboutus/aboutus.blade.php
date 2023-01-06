@extends('crm.layout.app')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@section('content')

<div class="card " id="test">
    <div class="card-header">
        <h5><x-icon type="list" />About Us</h5>
    </div>

    <div class="card-body">
        <div class="row">
            @include('crm.message')
            <form action="{{url('crm/aboutus/'.$res->id)}}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="search-field">
                        <input type="hidden" value="{{$res->id}}">
                        <div class="field-group">
                            <label for="about-us-content">About Us Content</label>
                            <textarea name="aboutus" id="aboutus" class="textediter form-control">{{$res->aboutus}}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-success mt-5 text-center"><x-icon type="update" />Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection