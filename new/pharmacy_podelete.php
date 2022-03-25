<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$pharmacy_po_delete = new pharmacy_po_delete();

// Run the page
$pharmacy_po_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_po_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_podelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_podelete = currentForm = new ew.Form("fpharmacy_podelete", "delete");
	loadjs.done("fpharmacy_podelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_po_delete->showPageHeader(); ?>
<?php
$pharmacy_po_delete->showMessage();
?>
<form name="fpharmacy_podelete" id="fpharmacy_podelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_po_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_po_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_po_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_po_id" class="pharmacy_po_id"><?php echo $pharmacy_po_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->ORDNO->Visible) { // ORDNO ?>
		<th class="<?php echo $pharmacy_po_delete->ORDNO->headerCellClass() ?>"><span id="elh_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO"><?php echo $pharmacy_po_delete->ORDNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->DT->Visible) { // DT ?>
		<th class="<?php echo $pharmacy_po_delete->DT->headerCellClass() ?>"><span id="elh_pharmacy_po_DT" class="pharmacy_po_DT"><?php echo $pharmacy_po_delete->DT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->YM->Visible) { // YM ?>
		<th class="<?php echo $pharmacy_po_delete->YM->headerCellClass() ?>"><span id="elh_pharmacy_po_YM" class="pharmacy_po_YM"><?php echo $pharmacy_po_delete->YM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->PC->Visible) { // PC ?>
		<th class="<?php echo $pharmacy_po_delete->PC->headerCellClass() ?>"><span id="elh_pharmacy_po_PC" class="pharmacy_po_PC"><?php echo $pharmacy_po_delete->PC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->Customercode->Visible) { // Customercode ?>
		<th class="<?php echo $pharmacy_po_delete->Customercode->headerCellClass() ?>"><span id="elh_pharmacy_po_Customercode" class="pharmacy_po_Customercode"><?php echo $pharmacy_po_delete->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->Customername->Visible) { // Customername ?>
		<th class="<?php echo $pharmacy_po_delete->Customername->headerCellClass() ?>"><span id="elh_pharmacy_po_Customername" class="pharmacy_po_Customername"><?php echo $pharmacy_po_delete->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<th class="<?php echo $pharmacy_po_delete->pharmacy_pocol->headerCellClass() ?>"><span id="elh_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol"><?php echo $pharmacy_po_delete->pharmacy_pocol->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->Address1->Visible) { // Address1 ?>
		<th class="<?php echo $pharmacy_po_delete->Address1->headerCellClass() ?>"><span id="elh_pharmacy_po_Address1" class="pharmacy_po_Address1"><?php echo $pharmacy_po_delete->Address1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->Address2->Visible) { // Address2 ?>
		<th class="<?php echo $pharmacy_po_delete->Address2->headerCellClass() ?>"><span id="elh_pharmacy_po_Address2" class="pharmacy_po_Address2"><?php echo $pharmacy_po_delete->Address2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->Address3->Visible) { // Address3 ?>
		<th class="<?php echo $pharmacy_po_delete->Address3->headerCellClass() ?>"><span id="elh_pharmacy_po_Address3" class="pharmacy_po_Address3"><?php echo $pharmacy_po_delete->Address3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->State->Visible) { // State ?>
		<th class="<?php echo $pharmacy_po_delete->State->headerCellClass() ?>"><span id="elh_pharmacy_po_State" class="pharmacy_po_State"><?php echo $pharmacy_po_delete->State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $pharmacy_po_delete->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_po_Pincode" class="pharmacy_po_Pincode"><?php echo $pharmacy_po_delete->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->Phone->Visible) { // Phone ?>
		<th class="<?php echo $pharmacy_po_delete->Phone->headerCellClass() ?>"><span id="elh_pharmacy_po_Phone" class="pharmacy_po_Phone"><?php echo $pharmacy_po_delete->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->Fax->Visible) { // Fax ?>
		<th class="<?php echo $pharmacy_po_delete->Fax->headerCellClass() ?>"><span id="elh_pharmacy_po_Fax" class="pharmacy_po_Fax"><?php echo $pharmacy_po_delete->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->EEmail->Visible) { // EEmail ?>
		<th class="<?php echo $pharmacy_po_delete->EEmail->headerCellClass() ?>"><span id="elh_pharmacy_po_EEmail" class="pharmacy_po_EEmail"><?php echo $pharmacy_po_delete->EEmail->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_po_delete->HospID->headerCellClass() ?>"><span id="elh_pharmacy_po_HospID" class="pharmacy_po_HospID"><?php echo $pharmacy_po_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_po_delete->createdby->headerCellClass() ?>"><span id="elh_pharmacy_po_createdby" class="pharmacy_po_createdby"><?php echo $pharmacy_po_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_po_delete->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime"><?php echo $pharmacy_po_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_po_delete->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby"><?php echo $pharmacy_po_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_po_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime"><?php echo $pharmacy_po_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_po_delete->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE"><?php echo $pharmacy_po_delete->BRCODE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_po_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_po_delete->Recordset->EOF) {
	$pharmacy_po_delete->RecordCount++;
	$pharmacy_po_delete->RowCount++;

	// Set row properties
	$pharmacy_po->resetAttributes();
	$pharmacy_po->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_po_delete->loadRowValues($pharmacy_po_delete->Recordset);

	// Render row
	$pharmacy_po_delete->renderRow();
?>
	<tr <?php echo $pharmacy_po->rowAttributes() ?>>
<?php if ($pharmacy_po_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_po_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_id" class="pharmacy_po_id">
<span<?php echo $pharmacy_po_delete->id->viewAttributes() ?>><?php echo $pharmacy_po_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->ORDNO->Visible) { // ORDNO ?>
		<td <?php echo $pharmacy_po_delete->ORDNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO">
<span<?php echo $pharmacy_po_delete->ORDNO->viewAttributes() ?>><?php echo $pharmacy_po_delete->ORDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->DT->Visible) { // DT ?>
		<td <?php echo $pharmacy_po_delete->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_DT" class="pharmacy_po_DT">
<span<?php echo $pharmacy_po_delete->DT->viewAttributes() ?>><?php echo $pharmacy_po_delete->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->YM->Visible) { // YM ?>
		<td <?php echo $pharmacy_po_delete->YM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_YM" class="pharmacy_po_YM">
<span<?php echo $pharmacy_po_delete->YM->viewAttributes() ?>><?php echo $pharmacy_po_delete->YM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->PC->Visible) { // PC ?>
		<td <?php echo $pharmacy_po_delete->PC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_PC" class="pharmacy_po_PC">
<span<?php echo $pharmacy_po_delete->PC->viewAttributes() ?>><?php echo $pharmacy_po_delete->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->Customercode->Visible) { // Customercode ?>
		<td <?php echo $pharmacy_po_delete->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_Customercode" class="pharmacy_po_Customercode">
<span<?php echo $pharmacy_po_delete->Customercode->viewAttributes() ?>><?php echo $pharmacy_po_delete->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->Customername->Visible) { // Customername ?>
		<td <?php echo $pharmacy_po_delete->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_Customername" class="pharmacy_po_Customername">
<span<?php echo $pharmacy_po_delete->Customername->viewAttributes() ?>><?php echo $pharmacy_po_delete->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td <?php echo $pharmacy_po_delete->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol">
<span<?php echo $pharmacy_po_delete->pharmacy_pocol->viewAttributes() ?>><?php echo $pharmacy_po_delete->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->Address1->Visible) { // Address1 ?>
		<td <?php echo $pharmacy_po_delete->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_Address1" class="pharmacy_po_Address1">
<span<?php echo $pharmacy_po_delete->Address1->viewAttributes() ?>><?php echo $pharmacy_po_delete->Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->Address2->Visible) { // Address2 ?>
		<td <?php echo $pharmacy_po_delete->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_Address2" class="pharmacy_po_Address2">
<span<?php echo $pharmacy_po_delete->Address2->viewAttributes() ?>><?php echo $pharmacy_po_delete->Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->Address3->Visible) { // Address3 ?>
		<td <?php echo $pharmacy_po_delete->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_Address3" class="pharmacy_po_Address3">
<span<?php echo $pharmacy_po_delete->Address3->viewAttributes() ?>><?php echo $pharmacy_po_delete->Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->State->Visible) { // State ?>
		<td <?php echo $pharmacy_po_delete->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_State" class="pharmacy_po_State">
<span<?php echo $pharmacy_po_delete->State->viewAttributes() ?>><?php echo $pharmacy_po_delete->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->Pincode->Visible) { // Pincode ?>
		<td <?php echo $pharmacy_po_delete->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_Pincode" class="pharmacy_po_Pincode">
<span<?php echo $pharmacy_po_delete->Pincode->viewAttributes() ?>><?php echo $pharmacy_po_delete->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->Phone->Visible) { // Phone ?>
		<td <?php echo $pharmacy_po_delete->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_Phone" class="pharmacy_po_Phone">
<span<?php echo $pharmacy_po_delete->Phone->viewAttributes() ?>><?php echo $pharmacy_po_delete->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->Fax->Visible) { // Fax ?>
		<td <?php echo $pharmacy_po_delete->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_Fax" class="pharmacy_po_Fax">
<span<?php echo $pharmacy_po_delete->Fax->viewAttributes() ?>><?php echo $pharmacy_po_delete->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->EEmail->Visible) { // EEmail ?>
		<td <?php echo $pharmacy_po_delete->EEmail->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_EEmail" class="pharmacy_po_EEmail">
<span<?php echo $pharmacy_po_delete->EEmail->viewAttributes() ?>><?php echo $pharmacy_po_delete->EEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $pharmacy_po_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_HospID" class="pharmacy_po_HospID">
<span<?php echo $pharmacy_po_delete->HospID->viewAttributes() ?>><?php echo $pharmacy_po_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $pharmacy_po_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_createdby" class="pharmacy_po_createdby">
<span<?php echo $pharmacy_po_delete->createdby->viewAttributes() ?>><?php echo $pharmacy_po_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $pharmacy_po_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime">
<span<?php echo $pharmacy_po_delete->createddatetime->viewAttributes() ?>><?php echo $pharmacy_po_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $pharmacy_po_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby">
<span<?php echo $pharmacy_po_delete->modifiedby->viewAttributes() ?>><?php echo $pharmacy_po_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $pharmacy_po_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime">
<span<?php echo $pharmacy_po_delete->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_po_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $pharmacy_po_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCount ?>_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE">
<span<?php echo $pharmacy_po_delete->BRCODE->viewAttributes() ?>><?php echo $pharmacy_po_delete->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_po_delete->Recordset->moveNext();
}
$pharmacy_po_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_po_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_po_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_po_delete->terminate();
?>