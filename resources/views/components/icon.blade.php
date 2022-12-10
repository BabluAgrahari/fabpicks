@switch($type)
@case('add')
<i class="fa-solid fa-plus"></i>&nbsp;
@break
@case('edit')
<i class="fa-solid fa-pen-to-square text-info"></i>
@break
@case('remove')
<i class="fa-solid fa-trash text-dager"></i>
@break
@case('import')
<i class="fa-solid fa-cloud-arrow-up"></i>&nbsp;
@break
@case('export')
<i class="fa-solid fa-cloud-arrow-down"></i>&nbsp;
@break
@default
''
@endswitch