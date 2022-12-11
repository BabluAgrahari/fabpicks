<div class="row mb-2" id="filter" <?= (empty($filter)) ? "style='display:none'" : "" ?>>
    <div class="col-md-12 ml-auto">
        <form action="{{ url('crm/survay') }}">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" value="<?= !empty($filter['date_range']) ? $filter['date_range'] : '' ?>" name="date_range" id="daterange-btn" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Title" value="<?= !empty($filter['title']) ? $filter['title'] : '' ?>" name="title"/>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Discription" value="<?= !empty($filter['discription']) ? $filter['discription'] : '' ?>" name="discription" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Type" value="<?= !empty($filter['type']) ? $filter['type'] : '' ?>" name="type" />
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-sm mt-2"><i class="fas fa-search"></i>&nbsp;Search</button>
                    <a href="{{ url('crm/survay') }}" class="btn btn-danger btn-sm mt-2"><i class="fas fa-eraser"></i>&nbsp;Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>