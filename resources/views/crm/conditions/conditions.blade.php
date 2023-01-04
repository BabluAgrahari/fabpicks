@extends('crm.layout.app')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@section('content')

<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-12">
                <h5><x-icon type="list" />Teams and Conditions</h5>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            @include('crm.message')
            <form action="{{url('crm/conditions/'.$res->id)}}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="search-field">
                        <input type="hidden" value="{{$res->id}}">
                        <div class="field-group">
                            <label for="about-us-content">Teams and Conditions Content</label>
                            <textarea name="conditions" id="conditions" class="form-control textediter" required>{{$res->conditions}}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-success mt-5 text-center"><x-icon type="update"/>Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
    @endsection