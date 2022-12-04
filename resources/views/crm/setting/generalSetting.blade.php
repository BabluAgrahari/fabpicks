@extends('crm.layout.app')
@section('content')

<div class="container ">
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-title">General Setting</h4>
        </div>

        <div class="col-md-12">
        @include('crm.message')
            <form action="{{url('crm/generalupdate/'.$res->id)}}" method="post">
                @csrf
                <div class="row general-setting-field">
                    <div class="col-md-6">
                        <input type="hidden" name="id" value="{{$res->_id}}">
                        <div class="field-group">
                            <label for="company-name">Company Name</label>
                            <input type="text" id="company-name" name="general_setting[company_name]" value="{{!empty($res->general_setting['company_name'])?$res->general_setting['company_name']:'';}}" class=" form-control" placeholder="Please enter Company name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-group">
                            <label for="company-email">Company Email</label>
                            <input type="text" id="company-email" name="general_setting[company_email]" value="{{!empty($res->general_setting['company_email'])?$res->general_setting['company_email']:'';}}" class="form-control" placeholder="Please enter Company Email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-group">
                            <label for="contact-number">Contact Number</label>
                            <input type="text" id="contact-number" name="general_setting[company_phone]" value="{{!empty($res->general_setting['company_phone'])?$res->general_setting['company_phone']:'';}}" class="form-control" placeholder="Please enter Contact Number"required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-group">
                            <label for="company-logo">Company Logo</label>
                            <input type="file" id="company-logo" name="general_setting[company_logo]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-group">
                            <label for="company-address">Company Address</label>
                            <textarea id="company-address" name="general_setting[company_address]" value="" class="form-control" required >{{!empty($res->general_setting['company_address'])?$res->general_setting['company_address']:'';}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-success" id="update">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@push('js')





@endpush


@endsection