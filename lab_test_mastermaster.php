<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($lab_test_master->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_lab_test_mastermaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($lab_test_master->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $lab_test_master->TableLeftColumnClass ?>"><?php echo $lab_test_master->id->caption() ?></td>
			<td<?php echo $lab_test_master->id->cellAttributes() ?>>
<span id="el_lab_test_master_id">
<span<?php echo $lab_test_master->id->viewAttributes() ?>>
<?php echo $lab_test_master->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_test_master->TestName->Visible) { // TestName ?>
		<tr id="r_TestName">
			<td class="<?php echo $lab_test_master->TableLeftColumnClass ?>"><?php echo $lab_test_master->TestName->caption() ?></td>
			<td<?php echo $lab_test_master->TestName->cellAttributes() ?>>
<span id="el_lab_test_master_TestName">
<span<?php echo $lab_test_master->TestName->viewAttributes() ?>>
<?php echo $lab_test_master->TestName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_test_master->TestType->Visible) { // TestType ?>
		<tr id="r_TestType">
			<td class="<?php echo $lab_test_master->TableLeftColumnClass ?>"><?php echo $lab_test_master->TestType->caption() ?></td>
			<td<?php echo $lab_test_master->TestType->cellAttributes() ?>>
<span id="el_lab_test_master_TestType">
<span<?php echo $lab_test_master->TestType->viewAttributes() ?>>
<?php echo $lab_test_master->TestType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_test_master->Cost->Visible) { // Cost ?>
		<tr id="r_Cost">
			<td class="<?php echo $lab_test_master->TableLeftColumnClass ?>"><?php echo $lab_test_master->Cost->caption() ?></td>
			<td<?php echo $lab_test_master->Cost->cellAttributes() ?>>
<span id="el_lab_test_master_Cost">
<span<?php echo $lab_test_master->Cost->viewAttributes() ?>>
<?php echo $lab_test_master->Cost->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_test_master->Created->Visible) { // Created ?>
		<tr id="r_Created">
			<td class="<?php echo $lab_test_master->TableLeftColumnClass ?>"><?php echo $lab_test_master->Created->caption() ?></td>
			<td<?php echo $lab_test_master->Created->cellAttributes() ?>>
<span id="el_lab_test_master_Created">
<span<?php echo $lab_test_master->Created->viewAttributes() ?>>
<?php echo $lab_test_master->Created->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_test_master->CreatedBy->Visible) { // CreatedBy ?>
		<tr id="r_CreatedBy">
			<td class="<?php echo $lab_test_master->TableLeftColumnClass ?>"><?php echo $lab_test_master->CreatedBy->caption() ?></td>
			<td<?php echo $lab_test_master->CreatedBy->cellAttributes() ?>>
<span id="el_lab_test_master_CreatedBy">
<span<?php echo $lab_test_master->CreatedBy->viewAttributes() ?>>
<?php echo $lab_test_master->CreatedBy->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_test_master->Modified->Visible) { // Modified ?>
		<tr id="r_Modified">
			<td class="<?php echo $lab_test_master->TableLeftColumnClass ?>"><?php echo $lab_test_master->Modified->caption() ?></td>
			<td<?php echo $lab_test_master->Modified->cellAttributes() ?>>
<span id="el_lab_test_master_Modified">
<span<?php echo $lab_test_master->Modified->viewAttributes() ?>>
<?php echo $lab_test_master->Modified->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
		<tr id="r_ModifiedBy">
			<td class="<?php echo $lab_test_master->TableLeftColumnClass ?>"><?php echo $lab_test_master->ModifiedBy->caption() ?></td>
			<td<?php echo $lab_test_master->ModifiedBy->cellAttributes() ?>>
<span id="el_lab_test_master_ModifiedBy">
<span<?php echo $lab_test_master->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_test_master->ModifiedBy->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>