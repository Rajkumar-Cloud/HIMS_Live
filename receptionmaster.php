<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($reception->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_receptionmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($reception->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->id->caption() ?></td>
			<td<?php echo $reception->id->cellAttributes() ?>>
<span id="el_reception_id">
<span<?php echo $reception->id->viewAttributes() ?>>
<?php echo $reception->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($reception->PatientID->Visible) { // PatientID ?>
		<tr id="r_PatientID">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->PatientID->caption() ?></td>
			<td<?php echo $reception->PatientID->cellAttributes() ?>>
<span id="el_reception_PatientID">
<span<?php echo $reception->PatientID->viewAttributes() ?>>
<?php echo $reception->PatientID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($reception->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->PatientName->caption() ?></td>
			<td<?php echo $reception->PatientName->cellAttributes() ?>>
<span id="el_reception_PatientName">
<span<?php echo $reception->PatientName->viewAttributes() ?>>
<?php echo $reception->PatientName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($reception->OorN->Visible) { // OorN ?>
		<tr id="r_OorN">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->OorN->caption() ?></td>
			<td<?php echo $reception->OorN->cellAttributes() ?>>
<span id="el_reception_OorN">
<span<?php echo $reception->OorN->viewAttributes() ?>>
<?php echo $reception->OorN->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($reception->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
		<tr id="r_PRIMARY_CONSULTANT">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->PRIMARY_CONSULTANT->caption() ?></td>
			<td<?php echo $reception->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el_reception_PRIMARY_CONSULTANT">
<span<?php echo $reception->PRIMARY_CONSULTANT->viewAttributes() ?>>
<?php echo $reception->PRIMARY_CONSULTANT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($reception->CATEGORY->Visible) { // CATEGORY ?>
		<tr id="r_CATEGORY">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->CATEGORY->caption() ?></td>
			<td<?php echo $reception->CATEGORY->cellAttributes() ?>>
<span id="el_reception_CATEGORY">
<span<?php echo $reception->CATEGORY->viewAttributes() ?>>
<?php echo $reception->CATEGORY->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($reception->PROCEDURE->Visible) { // PROCEDURE ?>
		<tr id="r_PROCEDURE">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->PROCEDURE->caption() ?></td>
			<td<?php echo $reception->PROCEDURE->cellAttributes() ?>>
<span id="el_reception_PROCEDURE">
<span<?php echo $reception->PROCEDURE->viewAttributes() ?>>
<?php echo $reception->PROCEDURE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($reception->Amount->Visible) { // Amount ?>
		<tr id="r_Amount">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->Amount->caption() ?></td>
			<td<?php echo $reception->Amount->cellAttributes() ?>>
<span id="el_reception_Amount">
<span<?php echo $reception->Amount->viewAttributes() ?>>
<?php echo $reception->Amount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($reception->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
		<tr id="r_MODE_OF_PAYMENT">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->MODE_OF_PAYMENT->caption() ?></td>
			<td<?php echo $reception->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el_reception_MODE_OF_PAYMENT">
<span<?php echo $reception->MODE_OF_PAYMENT->viewAttributes() ?>>
<?php echo $reception->MODE_OF_PAYMENT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($reception->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
		<tr id="r_NEXT_REVIEW_DATE">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->NEXT_REVIEW_DATE->caption() ?></td>
			<td<?php echo $reception->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el_reception_NEXT_REVIEW_DATE">
<span<?php echo $reception->NEXT_REVIEW_DATE->viewAttributes() ?>>
<?php echo $reception->NEXT_REVIEW_DATE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($reception->REMARKS->Visible) { // REMARKS ?>
		<tr id="r_REMARKS">
			<td class="<?php echo $reception->TableLeftColumnClass ?>"><?php echo $reception->REMARKS->caption() ?></td>
			<td<?php echo $reception->REMARKS->cellAttributes() ?>>
<span id="el_reception_REMARKS">
<span<?php echo $reception->REMARKS->viewAttributes() ?>>
<?php echo $reception->REMARKS->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>