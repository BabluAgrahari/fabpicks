@switch($type)
@case('add')
<i class="fa-solid fa-plus"></i>&nbsp;
@break
@case('edit')
<i class="fa-solid fa-pen-to-square text-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
@break
@case('remove')
<i class="fa-solid fa-trash text-dager" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove"></i>
@break
@case('import')
<i class="fa-solid fa-cloud-arrow-up"></i>&nbsp;
@break
@case('export')
<i class="fa-solid fa-cloud-arrow-down"></i>&nbsp;
@break
@case('save')
<i class="fa-regular fa-circle-check"></i>&nbsp;
@break
@case('back')
<i class="fa-solid fa-hand-point-left"></i>&nbsp;
@break
@case('reset')
<i class="fa-solid fa-arrow-rotate-right"></i>&nbsp;
@break
@case('details')
<i class="fa-regular fa-eye" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View"></i>&nbsp;
@break
@case('list')
<i class="fa-solid fa-square"></i>&nbsp;
@break
@case('update')

@break
@default
''
@endswitch