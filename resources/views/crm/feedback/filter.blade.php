<div class="row mb-2" id="filter" <?= (empty($filter)) ? "style='display:none'" : "" ?>>
    <div class="col-md-12 ml-auto">
        <form action="{{ url('crm/feedback') }}">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" value="<?= !empty($filter['date_range']) ? $filter['date_range'] : '' ?>" name="date_range" id="daterange-btn" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Review" value="<?= !empty($filter['review']) ? $filter['review'] : '' ?>" name="review" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Quality" value="<?= !empty($filter['quality']) ? $filter['quality'] : '' ?>" name="quality" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Price" value="<?= !empty($filter['price']) ? $filter['price'] : '' ?>" name="price" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Value" value="<?= !empty($filter['value']) ? $filter['value'] : '' ?>" name="value" />
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-sm mt-2"><i class="fas fa-search"></i>&nbsp;Search</button>
                    <a href="{{ url('crm/feedback') }}" class="btn btn-danger btn-sm mt-2"><i class="fas fa-eraser"></i>&nbsp;Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>