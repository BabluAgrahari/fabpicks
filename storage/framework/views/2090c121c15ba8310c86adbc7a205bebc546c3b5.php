<?php switch($type):
case ('add'): ?>
<i class="fa-solid fa-plus"></i>&nbsp;
<?php break; ?>
<?php case ('edit'): ?>
<i class="fa-solid fa-pen-to-square text-info"></i>
<?php break; ?>
<?php case ('remove'): ?>
<i class="fa-solid fa-trash text-dager"></i>
<?php break; ?>
<?php case ('import'): ?>
<i class="fa-solid fa-cloud-arrow-up"></i>&nbsp;
<?php break; ?>
<?php case ('export'): ?>
<i class="fa-solid fa-cloud-arrow-down"></i>&nbsp;
<?php break; ?>
<?php case ('save'): ?>
<i class="fa-regular fa-circle-check"></i>&nbsp;
<?php break; ?>
<?php case ('back'): ?>
<i class="fa-solid fa-hand-point-left"></i>&nbsp;
<?php break; ?>
<?php case ('reset'): ?>
<i class="fa-solid fa-arrow-rotate-right"></i>&nbsp;
<?php break; ?>
<?php default: ?>
''
<?php endswitch; ?><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/components/icon.blade.php ENDPATH**/ ?>