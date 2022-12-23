@extends('crm.layout.app')
@section('content')


<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-12">
                <h4>Refund Policy</h4>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            @include('crm.message')
            <form action="{{url('crm/refund/'.$res->id)}}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="search-field">
                        <input type="hidden" value="{{$res->id}}">
                        <div class="field-group">
                            <label for="about-us-content">Refund Policy Content</label>
                            <textarea name="refund" id="refund" class="form-control textediter" required>{{$res->refund}}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-success mt-5 text-center"><x-icon type="update"/>Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection