@switch($list->survay_type)
@case('single_choise')

<div class="question-box mb-2">
    <span>Q-{{$counter}} {{$list->survay_question}}&nbsp;{{ ($list->required)?'(Required)':''}} </span>
    <div class="ans-group">
        <div class="all-feedback-options">
            @foreach($list->data['option'] as $key=>$val)
            <?php $checked = $key == $list->data['answer'] ? '<i class="fa-solid fa-circle-check text-success"></i>' : '<i class="fa-regular fa-circle"></i>' ?>
            <div class="form-check">
                {!!$checked!!}
                <label class="form-check-label " for="ans1"> {{$val}} </label>
            </div>
            @endforeach
        </div>

        <div class="ans-group-action">
            <!-- <button class="ans-edit-btn ans-btn"><i class="ri-pencil-line"></i></button> -->
            <!-- <a href="javascript:void(0);" _id="{{$list->_id}}" class="removQuestio text-danger">
                <x-icon type="remove" />
            </a> -->
        </div>
    </div>
</div>
@break

@case('multi_choise')

<div class="question-box mb-2">
    <span>Q-{{$counter}} {{$list->survay_question}}&nbsp;{{ ($list->required)?'(Required)':''}}</span>
    <div class="ans-group">
        <div class="all-feedback-options">
            @foreach($list->data['option'] as $key=>$val)
            <?php $checked = in_array($key, $list->data['answer']) ? '<i class="fa-solid fa-circle-check text-success"></i>' : '<i class="fa-regular fa-circle"></i>' ?>
            <div class="form-check">
                {!!$checked!!}
                <label class="form-check-label">{{$val}}</label>
            </div>
            @endforeach
        </div>
        <div class="ans-group-action">
            <!-- <button class="ans-edit-btn ans-btn"><i class="ri-pencil-line"></i></button> -->
            <!-- <a href="javascript:void(0);" _id="{{$list->_id}}" class="removQuestio text-danger">
                <x-icon type="remove" />
            </a> -->
        </div>

    </div>
</div>
@break

@case('yes_no')
<div class="question-box mb-2">
    <span>Q-{{$counter}} {{$list->survay_question}}&nbsp;{{ ($list->required)?'(Required)':''}}</span>
    <div class="ans-group">
        <?php $checked1 = ($list->data['answer'] == "1") ? '<i class="fa-solid fa-circle-check text-success"></i>' : '<i class="fa-regular fa-circle"></i>'; ?>
        <?php $checked2 = ($list->data['answer'] == "0") ? '<i class="fa-solid fa-circle-check text-success"></i>' : '<i class="fa-regular fa-circle"></i>'; ?>
        <div class="form-check">
            {!!$checked1!!}
            <label class="form-check-label">Yes</label>
        </div>
        <div class="form-check">
            {!!$checked2!!}
            <label class="form-check-label">No</label>
        </div>

        <div class="ans-group-action">
            <!-- <button class="ans-edit-btn ans-btn"><i class="ri-pencil-line"></i></button> -->
            <!-- <a href="javascript:void(0);" _id="{{$list->_id}}" class="removQuestio text-danger">
                <x-icon type="remove" />
            </a> -->
        </div>
    </div>
</div>

@break

@case('rating')
<div class="question-box mb-2">
    <span>Q-{{$counter}} {{$list->survay_question}}&nbsp;{{ ($list->required)?'(Required)':''}}</span>
    <div class="ans-group">
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

        <div class="ans-group-action">
            <!-- <button class="ans-edit-btn ans-btn"><i class="ri-pencil-line"></i></button> -->
            <!-- <a href="javascript:void(0);" _id="{{$list->_id}}" class="removQuestio text-danger">
                <x-icon type="remove" />
            </a> -->
        </div>
    </div>
</div>
@break

@case('upload_image')

<div class="question-box mb-2">
    <span>Q-{{$counter}} {{$list->survay_question}}&nbsp;{{ ($list->required)?'(Required)':''}}</span>
    <div class="ans-group">
        <div class="all-feedback-img-option">
            <img src="{{$list->data['image'] ?? defaultImg('400x300')}}" alt="">
        </div>

        <div class="ans-group-action">
            <!-- <button class="ans-edit-btn ans-btn"><i class="ri-pencil-line"></i></button> -->
            <!-- <a href="javascript:void(0);" _id="{{$list->_id}}" class="removQuestio text-danger">
                <x-icon type="remove" />
            </a> -->
        </div>
    </div>
</div>
@break

@case('subjective_question')
<div class="question-box mb-2">
    <div class="ans-group">
        <span>Q-{{$counter}} {{$list->survay_question}}&nbsp;{{ ($list->required)?'(Required)':''}}</span>
        <div class="ans-group-action">
            <!-- <button class="ans-edit-btn ans-btn"><i class="ri-pencil-line"></i></button> -->
            <!-- <a href="javascript:void(0);" _id="{{$list->_id}}" class="removQuestio text-danger">
                <x-icon type="remove" />
            </a> -->
        </div>
    </div>
</div>
@break
@default
<span class="status">Trash</span>
@endswitch