<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($pharmacy_purchase_request->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_purchase_requestmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($pharmacy_purchase_request->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->id->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->id->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_id">
<span<?php echo $pharmacy_purchase_request->id->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->DT->Visible) { // DT ?>
		<tr id="r_DT">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->DT->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_DT">
<span<?php echo $pharmacy_purchase_request->DT->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->DT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->EmployeeName->Visible) { // EmployeeName ?>
		<tr id="r_EmployeeName">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->EmployeeName->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->EmployeeName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_EmployeeName">
<span<?php echo $pharmacy_purchase_request->EmployeeName->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->EmployeeName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->Department->Visible) { // Department ?>
		<tr id="r_Department">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->Department->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->Department->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_Department">
<span<?php echo $pharmacy_purchase_request->Department->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->Department->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<tr id="r_ApprovedStatus">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->ApprovedStatus->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->ApprovedStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_ApprovedStatus">
<span<?php echo $pharmacy_purchase_request->ApprovedStatus->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<tr id="r_PurchaseStatus">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->PurchaseStatus->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->PurchaseStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_PurchaseStatus">
<span<?php echo $pharmacy_purchase_request->PurchaseStatus->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->HospID->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->HospID->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_HospID">
<span<?php echo $pharmacy_purchase_request->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->createdby->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->createdby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_createdby">
<span<?php echo $pharmacy_purchase_request->createdby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->createdby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->createddatetime->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_createddatetime">
<span<?php echo $pharmacy_purchase_request->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->modifiedby->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_modifiedby">
<span<?php echo $pharmacy_purchase_request->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->modifiedby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->modifieddatetime->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_modifieddatetime">
<span<?php echo $pharmacy_purchase_request->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->modifieddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->BRCODE->Visible) { // BRCODE ?>
		<tr id="r_BRCODE">
			<td class="<?php echo $pharmacy_purchase_request->TableLeftColumnClass ?>"><?php echo $pharmacy_purchase_request->BRCODE->caption() ?></td>
			<td<?php echo $pharmacy_purchase_request->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_BRCODE">
<span<?php echo $pharmacy_purchase_request->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->BRCODE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>