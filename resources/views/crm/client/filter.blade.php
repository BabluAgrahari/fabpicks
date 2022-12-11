<div class="row mb-2" id="filter" <?= (empty($filter)) ? "style='display:none'" : "" ?>>
    <div class="col-md-12 ml-auto">
        <form action="{{ url('crm/client') }}">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" value="<?= !empty($filter['date_range']) ? $filter['date_range'] : '' ?>" name="date_range" id="daterange-btn" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Store Name" value="<?= !empty($filter['store_name']) ? $filter['store_name'] : '' ?>" name="store_name"/>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Email" value="<?= !empty($filter['email']) ? $filter['email'] : '' ?>" name="email"/>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Phone No." value="<?= !empty($filter['phone']) ? $filter['phone'] : '' ?>" name="phone"/>
                </div>
                <div class="col-md-2">
                     <input type="text" class="form-control" placeholder="State." value="<?= !empty($filter['state']) ? $filter['state'] : '' ?>" name="state"/>
                </div>
                <div class="col-md-2">
                     <input type="text" class="form-control mt-2" placeholder="City." value="<?= !empty($filter['city']) ? $filter['city'] : '' ?>" name="city"/>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control mt-2" placeholder="Pin Code" value="<?= !empty($filter['pincode']) ? $filter['pincode'] : '' ?>" name="pincode"/>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-sm mt-2"><i class="fas fa-search"></i>&nbsp;Search</button>
                    <a href="{{ url('crm/client') }}" class="btn btn-danger btn-sm mt-2"><i class="fas fa-eraser"></i>&nbsp;Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>