<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($op_admission->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_op_admissionmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($op_admission->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $op_admission->TableLeftColumnClass ?>"><?php echo $op_admission->id->caption() ?></td>
			<td<?php echo $op_admission->id->cellAttributes() ?>>
<span id="el_op_admission_id">
<span<?php echo $op_admission->id->viewAttributes() ?>>
<?php echo $op_admission->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($op_admission->patient_id->Visible) { // patient_id ?>
		<tr id="r_patient_id">
			<td class="<?php echo $op_admission->TableLeftColumnClass ?>"><?php echo $op_admission->patient_id->caption() ?></td>
			<td<?php echo $op_admission->patient_id->cellAttributes() ?>>
<span id="el_op_admission_patient_id">
<span<?php echo $op_admission->patient_id->viewAttributes() ?>>
<?php echo $op_admission->patient_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($op_admission->physician_id->Visible) { // physician_id ?>
		<tr id="r_physician_id">
			<td class="<?php echo $op_admission->TableLeftColumnClass ?>"><?php echo $op_admission->physician_id->caption() ?></td>
			<td<?php echo $op_admission->physician_id->cellAttributes() ?>>
<span id="el_op_admission_physician_id">
<span<?php echo $op_admission->physician_id->viewAttributes() ?>>
<?php echo $op_admission->physician_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($op_admission->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $op_admission->TableLeftColumnClass ?>"><?php echo $op_admission->status->caption() ?></td>
			<td<?php echo $op_admission->status->cellAttributes() ?>>
<span id="el_op_admission_status">
<span<?php echo $op_admission->status->viewAttributes() ?>>
<?php echo $op_admission->status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>