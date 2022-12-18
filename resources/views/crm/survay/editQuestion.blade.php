
    <div class="row">
        <div class="field-group col-md-8">
            <label for="question">Write Your Question <span class="required">*</span></label>
            <div class="required-feild">
                <input type="text" name="survay_question" value="{{$list->survay_question}}" class="form-control" placeholder="Write Your Question">
                <input type="checkbox" class="checkbox-required" value="1" name="required">
            </div>
        </div>

        <div class="field-group col-md-4">
            <label for="question">Rewards Point <span class="required">*</span></label>
            <div class="required-feild">
                <input type="number" name="reward" value="{{$list->reward}}" class="form-control" placeholder="Enter Rewards Point">
            </div>
        </div>
    </div>

    @switch($list->survay_type)
    @case('single_choise')
    <div class="feedback-options mt-2">

        @if(!empty($list->data['option']))
        @foreach($list->data['option'] as $key=>$option)
        <?php $checked = $key == $list->data['answer'] ? 'checked' : '' ?>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="data[answer]" value="0" id="feedbackoption1" {{$checked}}>
            <label class="form-check-label " for="feedbackoption1">
                <input type="text" name="data[option][]" value="{{$option}}" class="form-control" placeholder="Option1">
            </label>
        </div>
        @endforeach
        @endif
        <div class="form-check d-flex">
            <button type="button" class="btn btn-sm btn-success" id="save"><i class="fa-solid fa-circle-check"></i></button>
            <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                <x-icon type="reset" />
            </a>
        </div>
    </div>
    </div>
    @break
    @case('multi_choise')

    @break

    @default

    @endswitch
