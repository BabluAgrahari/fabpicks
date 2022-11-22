@extends('crm.layout.app')
@section('content')


<div class="container ">
    <div class="row">
        <div class="col-md-11">
            <h4>Brand Store</h4>
        </div>
        <div class="col-md-1 mb-3 product-btn-group">
            <button type="button" class="btn btn-success" id="AddBrandStore" data-bs-toggle="modal" data-bs-target="#BrandStoreModal">
                <i class="ri-add-circle-line"></i> Add
            </button>
        </div>
        <div class="col-md-12 ">
            <table class="table table-dark table-striped custom-table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Store Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Country</th>
                        <th scope="col">State</th>
                        <th scope="col">City</th>
                        <th scope="col">Pin Code</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($lists as $key=>$list)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$list->store_name}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->phone}}</td>
                        <td>{{$list->address}}</td>
                        <td>{{$list->country}}</td>
                        <td>{{$list->state}}</td>
                        <td>{{$list->city}}</td>
                        <td>{{$list->pincode}}</td>
                        <td><img src="{{asset('brandstore/'.$list->logo)}}" style="height:50px; width:60px;"></td>
                       <td> 
                                <a href="javascript:void(0)" _id="{{$list->_id}}" class="edit"><i class="ri-pencil-line"></i></a>                               
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('modal')
<div class="modal fade" id="BrandStoreModal" tabindex="-1" aria-labelledby="BrandStoreLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="BrandStoreLabel">Brand Store</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container ">
                    <div id="message"></div>
                    <div class="row">
                        <form id="SaveBrandStore" action="{{url('crm/brand-store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="put"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="store-owner ">Store Owner: <span class="required">*</span></label>
                                        <select name="store_owner" id="store_owner" class="form-select js-example-basic-single">
                                            <option value="" selected>Select</option>
                                            <option value="Store Owner -1">Store Owner -1</option>
                                            <option value="Store Owner -2">Store Owner -2</option>
                                            <option value="Store Owner -3">Store Owner -3</option>
                                            <option value="Store Owner -4">Store Owner -4</option>
                                            <option value="Store Owner -5">Store Owner -5</option>
                                            <option value="Store Owner -6">Store Owner -6</option>

                                        </select>
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Choose Store Owner</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="store-name ">Store Name: <span class="required">*</span></label>
                                        <input type="text" id="store_name" name="store_name" class="form-control" placeholder="Store Name" required>
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Enter Store Name</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="business-email ">Business Email: <span class="required">*</span></label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Business Email" required>
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Please enter business email</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="vat/gstin ">VAT/GSTIN No: </label>
                                        <input type="text" id="gstin" name="gstin" class="form-control" placeholder="Please enter your VAT/GSTIN No. ">
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Please enter your VAT/GSTIN No. </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="phone ">Phone: </label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Please enter your phone No. ">
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Please enter your phone No. </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="mobile ">Mobile: <span class="required">*</span></label>
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Please enter your mobile No. " required>
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Please enter your mobile No. </span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="address ">Store Address: <span class="required">*</span></label>
                                        <textarea name="address" id="address" class="form-control" required></textarea>
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Please enter store address </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="country ">Country: <span class="required">*</span></label>
                                        <select name="country" id="country" class="form-select js-example-basic-single">
                                            <option value="" selected>Please Choose</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-leste">Timor-leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>

                                        </select>
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Please select Country</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="state ">State: <span class="required">*</span></label>
                                        <select name="state" id="state" class="form-select js-example-basic-single">
                                            <option value="" selected>Please Choose</option>
                                            <option value="State 1">State 1 </option>
                                            <option value="State 2">State 2 </option>
                                        </select>
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Please select State</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="city ">City: <span class="required">*</span></label>
                                        <select name="city" id="city" class="form-select js-example-basic-single">
                                            <option value="" selected>Please Choose</option>
                                            <option value="city 1">city 1 </option>
                                            <option value="city 2">city 2 </option>
                                        </select>
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Please select city</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="pincode/zipcode ">Pincode/Zipcode: </label>
                                        <input type="text" id="pincode" name="pincode" class="form-control" placeholder="Pincode/Zipcode">
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Enter Store Name</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="logo ">Logo: </label>
                                        <input type="file" id="logo" name="logo" class="form-control">
                                        <span class="note"><i class="fa-solid fa-circle-info"></i>Please upload your store logo</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="field-group">
                                        <div class="form-check form-switch custom-switch custom-switch-1">
                                            <label class="form-check-label" for="store">Store</label>
                                            <input class="form-check-input" type="checkbox" role="switch" value="1" name="store" id="store" checked>
                                            <span class="note">(Toggle the store status.)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="field-group">
                                        <div class="form-check form-switch custom-switch custom-switch-1">
                                            <label class="form-check-label" for="verified-store">Verified Store:</label>
                                            <input class="form-check-input" type="checkbox" role="switch" name="" id="verified-store">
                                            <span class="note">(On The Product Details page if store if verified than it will and () Symbol next to the store name)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-sm" id="save">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
    $('#AddBrandStore').click(function(e) {
        e.preventDefault();
        $('#BrandStoreLabel').html('Add Sub Attribute');
        $('#save').html('Save');
        $('form#SaveBrandStore').attr('action', '{{ url("crm/brand-store") }}');
        $('#put').html('');
        $('#BrandStoreModal').modal('show');
    });

    /*start form submit functionality*/
    $("form#SaveBrandStore").submit(function(e) {
        e.preventDefault();

        formData = new FormData(this);
        var url = $(this).attr('action');
        let update = $('#putInput').val();
        let label1 = update == 'PUT' ? 'Update' : 'Save';
        let label2 = update == 'PUT' ? 'Updating...' : 'Saving...';
        $.ajax({
            data: formData,
            type: "POST",
            url: url,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;${label2}`).attr('disabled', true);
            },
            success: function(res) {

                //hide loader
                $('#save').html(label1).removeAttr('disabled');

                /*Start Validation Error Message*/
                $('span.text-danger').html('');
                if (res.validation) {
                    $.each(res.validation, (index, msg) => {
                        $(`#${index}_msg`).html(`${msg}`);
                    })
                    return false;
                }
                /*End Validation Error Message*/

                /*Start Status message*/
                if (res.status || !res.status) {
                    alertMsg(res.status, res.msg, 2000);
                }
                /*End Status message*/

                //for reset all field
                if (res.status)
                    $('form#SaveBrandStore').trigger('reset');
            }
        });
    });
    /*end form submit functionality*/

     //for edit 

     $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "{{url('crm/brand-store')}}/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#store_owner').val(res.record.store_owner);
                    $('#store_name').val(res.record.store_name);
                    $('#email').val(res.record.email);
                    $('#gstin').val(res.record.gstin);
                    $('#phone').val(res.record.phone);
                    $('#mobile').val(res.record.mobile);
                    $('#address').val(res.record.address);
                    $('#country').val(res.record.country);
                    $('#state').val(res.record.state);
                    $('#city').val(res.record.city);
                    $('#pincode').val(res.record.pincode);
                    let store = res.record.store ? true : false;
                    $('#store').prop('checked', store);

                    $('#BrandStoreLabel').html('Edit Attribute');
                    $('#save').html('Update');
                    $('form#SaveBrandStore').attr('action', '{{ url("crm/brand-store") }}/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#BrandStoreModal').modal('show');
                }
            }
        })
    });
</script>
@endpush

@endsection