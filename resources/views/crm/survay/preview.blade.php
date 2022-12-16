@switch($list->survay_type)
@case('single_choise')
<div class="row">
    <div class="col-md-12">
        <div class="card p-2">

            <div class="all-feedback-question">
                <span>Q- {{$list->survay_question}}</span>
            </div>
            <div class="all-feedback-options">
                @foreach($list->data['option'] as $key=>$val)
                <?php $checked = $key == $list->data['answer'] ? 'checked' : '' ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{$checked}}>
                    <label class="form-check-label">{{$val}}</label>
                </div>
                @endforeach
            </div>

            <div>
                <a href="javascript:void(0);" class="btn btn-sm btn-info edit" _id="{{$list->_id}}">Edit</a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger remove" _id="{{$list->_id}}">Remove</a>
            </div>
        </div>
    </div>
</div>
@break

@case('multi_choise')

<div class="row">
    <div class="col-md-12">
        <div class="card p-2">
            <div class="all-feedback-question">
                <p>Q- {{$list->survay_question}}</p>
            </div>
            <div class="all-feedback-options">
                @foreach($list->data['option'] as $key=>$val)
                <?php $checked = in_array($key, $list->data['answer']) ? 'checked' : '' ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" {{$checked}}>
                    <label class="form-check-label">{{$val}}</label>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@break

@case('yes_no')
<div class="row">
    <div class="col-md-12">
        <div class="card p-2">
            <div class="all-feedback-question">
                <p>Q- {{$list->survay_question}}</p>
            </div>
            <?php $checked1 = ($list->data['answer'] == "1") ? 'checked' : 'disabled'; ?>
            <?php $checked2 = ($list->data['answer'] == "0") ? 'checked' : 'disabled'; ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" {{$checked1}}>
                <label class="form-check-label">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" {{$checked2}}>
                <label class="form-check-label">No</label>
            </div>
        </div>
    </div>
</div>

@break

@case('rating')
<div class="row">
    <div class="col-md-12">
        <div class="card p-2">
            <div class="all-feedback-question">
                <p>Q- {{$list->survay_question}}</p>
            </div>
            <div class="hello mt-0">
                <div class="star-rating js-star-rating">
                    <input class="star-rating__input" type="radio" name="rating" value="1"><i class="star-rating__star"></i>
                    <input class="star-rating__input" type="radio" name="rating" value="2"><i class="star-rating__star"></i>
                    <input class="star-rating__input" type="radio" name="rating" value="3"><i class="star-rating__star"></i>
                    <input class="star-rating__input" type="radio" name="rating" value="4"><i class="star-rating__star"></i>
                    <input class="star-rating__input" type="radio" name="rating" value="5"><i class="star-rating__star"></i>
                    <div class="current-rating current-rating--{{$list->data['rating']}} js-current-rating"><i class="star-rating__star">AAA</i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@break

@default
<span class="status">Trash</span>
@endswitch