<div class="row mb-2" id="filter" <?= (empty($filter)) ? "style='display:none'" : "" ?>>
    <div class="col-md-12 ml-auto">
        <form action="{{ url('crm/push-notification') }}">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" value="<?= !empty($filter['date_range']) ? $filter['date_range'] : '' ?>" name="date_range" id="daterange-btn" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="User Group" value="<?= !empty($filter['user_group']) ? $filter['user_group'] : '' ?>" name="user_group"/>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Subject" value="<?= !empty($filter['subject']) ? $filter['subject'] : '' ?>" name="subject" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Notification" value="<?= !empty($filter['Notification']) ? $filter['Notification'] : '' ?>" name="Notification" />
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-sm mt-2"><i class="fas fa-search"></i>&nbsp;Search</button>
                    <a href="{{ url('crm/push-notification') }}" class="btn btn-danger btn-sm mt-2"><i class="fas fa-eraser"></i>&nbsp;Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>