<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($pharmacy->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacymaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($pharmacy->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $pharmacy->TableLeftColumnClass ?>"><?php echo $pharmacy->id->caption() ?></td>
			<td <?php echo $pharmacy->id->cellAttributes() ?>>
<span id="el_pharmacy_id">
<span<?php echo $pharmacy->id->viewAttributes() ?>><?php echo $pharmacy->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy->op_id->Visible) { // op_id ?>
		<tr id="r_op_id">
			<td class="<?php echo $pharmacy->TableLeftColumnClass ?>"><?php echo $pharmacy->op_id->caption() ?></td>
			<td <?php echo $pharmacy->op_id->cellAttributes() ?>>
<span id="el_pharmacy_op_id">
<span<?php echo $pharmacy->op_id->viewAttributes() ?>><?php echo $pharmacy->op_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy->ip_id->Visible) { // ip_id ?>
		<tr id="r_ip_id">
			<td class="<?php echo $pharmacy->TableLeftColumnClass ?>"><?php echo $pharmacy->ip_id->caption() ?></td>
			<td <?php echo $pharmacy->ip_id->cellAttributes() ?>>
<span id="el_pharmacy_ip_id">
<span<?php echo $pharmacy->ip_id->viewAttributes() ?>><?php echo $pharmacy->ip_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy->patient_id->Visible) { // patient_id ?>
		<tr id="r_patient_id">
			<td class="<?php echo $pharmacy->TableLeftColumnClass ?>"><?php echo $pharmacy->patient_id->caption() ?></td>
			<td <?php echo $pharmacy->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_patient_id">
<span<?php echo $pharmacy->patient_id->viewAttributes() ?>><?php echo $pharmacy->patient_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy->charged_date->Visible) { // charged_date ?>
		<tr id="r_charged_date">
			<td class="<?php echo $pharmacy->TableLeftColumnClass ?>"><?php echo $pharmacy->charged_date->caption() ?></td>
			<td <?php echo $pharmacy->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_charged_date">
<span<?php echo $pharmacy->charged_date->viewAttributes() ?>><?php echo $pharmacy->charged_date->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $pharmacy->TableLeftColumnClass ?>"><?php echo $pharmacy->status->caption() ?></td>
			<td <?php echo $pharmacy->status->cellAttributes() ?>>
<span id="el_pharmacy_status">
<span<?php echo $pharmacy->status->viewAttributes() ?>><?php echo $pharmacy->status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>