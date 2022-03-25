<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($mas_pharmacy->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_mas_pharmacymaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($mas_pharmacy->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $mas_pharmacy->TableLeftColumnClass ?>"><?php echo $mas_pharmacy->id->caption() ?></td>
			<td <?php echo $mas_pharmacy->id->cellAttributes() ?>>
<span id="el_mas_pharmacy_id">
<span<?php echo $mas_pharmacy->id->viewAttributes() ?>><?php echo $mas_pharmacy->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($mas_pharmacy->name->Visible) { // name ?>
		<tr id="r_name">
			<td class="<?php echo $mas_pharmacy->TableLeftColumnClass ?>"><?php echo $mas_pharmacy->name->caption() ?></td>
			<td <?php echo $mas_pharmacy->name->cellAttributes() ?>>
<span id="el_mas_pharmacy_name">
<span<?php echo $mas_pharmacy->name->viewAttributes() ?>><?php echo $mas_pharmacy->name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($mas_pharmacy->amount->Visible) { // amount ?>
		<tr id="r_amount">
			<td class="<?php echo $mas_pharmacy->TableLeftColumnClass ?>"><?php echo $mas_pharmacy->amount->caption() ?></td>
			<td <?php echo $mas_pharmacy->amount->cellAttributes() ?>>
<span id="el_mas_pharmacy_amount">
<span<?php echo $mas_pharmacy->amount->viewAttributes() ?>><?php echo $mas_pharmacy->amount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($mas_pharmacy->charged_date->Visible) { // charged_date ?>
		<tr id="r_charged_date">
			<td class="<?php echo $mas_pharmacy->TableLeftColumnClass ?>"><?php echo $mas_pharmacy->charged_date->caption() ?></td>
			<td <?php echo $mas_pharmacy->charged_date->cellAttributes() ?>>
<span id="el_mas_pharmacy_charged_date">
<span<?php echo $mas_pharmacy->charged_date->viewAttributes() ?>><?php echo $mas_pharmacy->charged_date->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($mas_pharmacy->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $mas_pharmacy->TableLeftColumnClass ?>"><?php echo $mas_pharmacy->status->caption() ?></td>
			<td <?php echo $mas_pharmacy->status->cellAttributes() ?>>
<span id="el_mas_pharmacy_status">
<span<?php echo $mas_pharmacy->status->viewAttributes() ?>><?php echo $mas_pharmacy->status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>