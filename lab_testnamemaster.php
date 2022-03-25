<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($lab_testname->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_lab_testnamemaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($lab_testname->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $lab_testname->TableLeftColumnClass ?>"><?php echo $lab_testname->id->caption() ?></td>
			<td<?php echo $lab_testname->id->cellAttributes() ?>>
<span id="el_lab_testname_id">
<span<?php echo $lab_testname->id->viewAttributes() ?>>
<?php echo $lab_testname->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_testname->TestCode->Visible) { // TestCode ?>
		<tr id="r_TestCode">
			<td class="<?php echo $lab_testname->TableLeftColumnClass ?>"><?php echo $lab_testname->TestCode->caption() ?></td>
			<td<?php echo $lab_testname->TestCode->cellAttributes() ?>>
<span id="el_lab_testname_TestCode">
<span<?php echo $lab_testname->TestCode->viewAttributes() ?>>
<?php echo $lab_testname->TestCode->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_testname->Name->Visible) { // Name ?>
		<tr id="r_Name">
			<td class="<?php echo $lab_testname->TableLeftColumnClass ?>"><?php echo $lab_testname->Name->caption() ?></td>
			<td<?php echo $lab_testname->Name->cellAttributes() ?>>
<span id="el_lab_testname_Name">
<span<?php echo $lab_testname->Name->viewAttributes() ?>>
<?php echo $lab_testname->Name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_testname->SampleType->Visible) { // SampleType ?>
		<tr id="r_SampleType">
			<td class="<?php echo $lab_testname->TableLeftColumnClass ?>"><?php echo $lab_testname->SampleType->caption() ?></td>
			<td<?php echo $lab_testname->SampleType->cellAttributes() ?>>
<span id="el_lab_testname_SampleType">
<span<?php echo $lab_testname->SampleType->viewAttributes() ?>>
<?php echo $lab_testname->SampleType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_testname->Department->Visible) { // Department ?>
		<tr id="r_Department">
			<td class="<?php echo $lab_testname->TableLeftColumnClass ?>"><?php echo $lab_testname->Department->caption() ?></td>
			<td<?php echo $lab_testname->Department->cellAttributes() ?>>
<span id="el_lab_testname_Department">
<span<?php echo $lab_testname->Department->viewAttributes() ?>>
<?php echo $lab_testname->Department->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_testname->schedule->Visible) { // schedule ?>
		<tr id="r_schedule">
			<td class="<?php echo $lab_testname->TableLeftColumnClass ?>"><?php echo $lab_testname->schedule->caption() ?></td>
			<td<?php echo $lab_testname->schedule->cellAttributes() ?>>
<span id="el_lab_testname_schedule">
<span<?php echo $lab_testname->schedule->viewAttributes() ?>>
<?php echo $lab_testname->schedule->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_testname->Created->Visible) { // Created ?>
		<tr id="r_Created">
			<td class="<?php echo $lab_testname->TableLeftColumnClass ?>"><?php echo $lab_testname->Created->caption() ?></td>
			<td<?php echo $lab_testname->Created->cellAttributes() ?>>
<span id="el_lab_testname_Created">
<span<?php echo $lab_testname->Created->viewAttributes() ?>>
<?php echo $lab_testname->Created->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_testname->CreatedBy->Visible) { // CreatedBy ?>
		<tr id="r_CreatedBy">
			<td class="<?php echo $lab_testname->TableLeftColumnClass ?>"><?php echo $lab_testname->CreatedBy->caption() ?></td>
			<td<?php echo $lab_testname->CreatedBy->cellAttributes() ?>>
<span id="el_lab_testname_CreatedBy">
<span<?php echo $lab_testname->CreatedBy->viewAttributes() ?>>
<?php echo $lab_testname->CreatedBy->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_testname->Modified->Visible) { // Modified ?>
		<tr id="r_Modified">
			<td class="<?php echo $lab_testname->TableLeftColumnClass ?>"><?php echo $lab_testname->Modified->caption() ?></td>
			<td<?php echo $lab_testname->Modified->cellAttributes() ?>>
<span id="el_lab_testname_Modified">
<span<?php echo $lab_testname->Modified->viewAttributes() ?>>
<?php echo $lab_testname->Modified->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($lab_testname->ModifiedBy->Visible) { // ModifiedBy ?>
		<tr id="r_ModifiedBy">
			<td class="<?php echo $lab_testname->TableLeftColumnClass ?>"><?php echo $lab_testname->ModifiedBy->caption() ?></td>
			<td<?php echo $lab_testname->ModifiedBy->cellAttributes() ?>>
<span id="el_lab_testname_ModifiedBy">
<span<?php echo $lab_testname->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_testname->ModifiedBy->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>