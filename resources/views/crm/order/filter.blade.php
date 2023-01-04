<div class="row mb-2" id="filter" <?= (empty($filter)) ? "style='display:none'" : "" ?>>
    <div class="col-md-12 ml-auto">
        <form action="{{ url('crm/order') }}">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" value="<?= !empty($filter['date_range']) ? $filter['date_range'] : '' ?>" name="date_range" id="daterange-btn" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Order Number" value="<?= !empty($filter['order_number']) ? $filter['order_number'] : '' ?>" name="order_number" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Order Date" value="<?= !empty($filter['order_date']) ? $filter['order_date'] : '' ?>" name="order_date" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Amount" value="<?= !empty($filter['amount']) ? $filter['amount'] : '' ?>" name="amount" />
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="status">
                        <option class="pending" @selected(!empty($filter['status']) && $filter['status']=='pending')>Pending</option>
                        <option class="shipped" @selected(!empty($filter['status']) && $filter['status']=='shipped')>Shipped</option>
                        <option class="delivered" @selected(!empty($filter['status']) && $filter['status']=='delivered')>Delivered</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-sm mt-2"><i class="fas fa-search"></i>&nbsp;Search</button>
                    <a href="{{ url('crm/order') }}" class="btn btn-danger btn-sm mt-2"><i class="fas fa-eraser"></i>&nbsp;Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>