<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_podelete = currentForm = new ew.Form("fpharmacy_podelete", "delete");

// Form_CustomValidate event
fpharmacy_podelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_podelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_podelete.lists["x_PC"] = <?php echo $pharmacy_po_delete->PC->Lookup->toClientList() ?>;
fpharmacy_podelete.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_po_delete->PC->lookupOptions()) ?>;
fpharmacy_podelete.lists["x_BRCODE"] = <?php echo $pharmacy_po_delete->BRCODE->Lookup->toClientList() ?>;
fpharmacy_podelete.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_po_delete->BRCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_po_delete->showPageHeader(); ?>
<?php
$pharmacy_po_delete->showMessage();
?>
<form name="fpharmacy_podelete" id="fpharmacy_podelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_po_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_po_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_po_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_po->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_po->id->headerCellClass() ?>"><span id="elh_pharmacy_po_id" class="pharmacy_po_id"><?php echo $pharmacy_po->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->ORDNO->Visible) { // ORDNO ?>
		<th class="<?php echo $pharmacy_po->ORDNO->headerCellClass() ?>"><span id="elh_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO"><?php echo $pharmacy_po->ORDNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->DT->Visible) { // DT ?>
		<th class="<?php echo $pharmacy_po->DT->headerCellClass() ?>"><span id="elh_pharmacy_po_DT" class="pharmacy_po_DT"><?php echo $pharmacy_po->DT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->YM->Visible) { // YM ?>
		<th class="<?php echo $pharmacy_po->YM->headerCellClass() ?>"><span id="elh_pharmacy_po_YM" class="pharmacy_po_YM"><?php echo $pharmacy_po->YM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->PC->Visible) { // PC ?>
		<th class="<?php echo $pharmacy_po->PC->headerCellClass() ?>"><span id="elh_pharmacy_po_PC" class="pharmacy_po_PC"><?php echo $pharmacy_po->PC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->Customercode->Visible) { // Customercode ?>
		<th class="<?php echo $pharmacy_po->Customercode->headerCellClass() ?>"><span id="elh_pharmacy_po_Customercode" class="pharmacy_po_Customercode"><?php echo $pharmacy_po->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->Customername->Visible) { // Customername ?>
		<th class="<?php echo $pharmacy_po->Customername->headerCellClass() ?>"><span id="elh_pharmacy_po_Customername" class="pharmacy_po_Customername"><?php echo $pharmacy_po->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<th class="<?php echo $pharmacy_po->pharmacy_pocol->headerCellClass() ?>"><span id="elh_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol"><?php echo $pharmacy_po->pharmacy_pocol->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->Address1->Visible) { // Address1 ?>
		<th class="<?php echo $pharmacy_po->Address1->headerCellClass() ?>"><span id="elh_pharmacy_po_Address1" class="pharmacy_po_Address1"><?php echo $pharmacy_po->Address1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->Address2->Visible) { // Address2 ?>
		<th class="<?php echo $pharmacy_po->Address2->headerCellClass() ?>"><span id="elh_pharmacy_po_Address2" class="pharmacy_po_Address2"><?php echo $pharmacy_po->Address2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->Address3->Visible) { // Address3 ?>
		<th class="<?php echo $pharmacy_po->Address3->headerCellClass() ?>"><span id="elh_pharmacy_po_Address3" class="pharmacy_po_Address3"><?php echo $pharmacy_po->Address3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->State->Visible) { // State ?>
		<th class="<?php echo $pharmacy_po->State->headerCellClass() ?>"><span id="elh_pharmacy_po_State" class="pharmacy_po_State"><?php echo $pharmacy_po->State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $pharmacy_po->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_po_Pincode" class="pharmacy_po_Pincode"><?php echo $pharmacy_po->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->Phone->Visible) { // Phone ?>
		<th class="<?php echo $pharmacy_po->Phone->headerCellClass() ?>"><span id="elh_pharmacy_po_Phone" class="pharmacy_po_Phone"><?php echo $pharmacy_po->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->Fax->Visible) { // Fax ?>
		<th class="<?php echo $pharmacy_po->Fax->headerCellClass() ?>"><span id="elh_pharmacy_po_Fax" class="pharmacy_po_Fax"><?php echo $pharmacy_po->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->EEmail->Visible) { // EEmail ?>
		<th class="<?php echo $pharmacy_po->EEmail->headerCellClass() ?>"><span id="elh_pharmacy_po_EEmail" class="pharmacy_po_EEmail"><?php echo $pharmacy_po->EEmail->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_po->HospID->headerCellClass() ?>"><span id="elh_pharmacy_po_HospID" class="pharmacy_po_HospID"><?php echo $pharmacy_po->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_po->createdby->headerCellClass() ?>"><span id="elh_pharmacy_po_createdby" class="pharmacy_po_createdby"><?php echo $pharmacy_po->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_po->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime"><?php echo $pharmacy_po->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_po->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby"><?php echo $pharmacy_po->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_po->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime"><?php echo $pharmacy_po->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_po->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_po->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE"><?php echo $pharmacy_po->BRCODE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_po_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_po_delete->Recordset->EOF) {
	$pharmacy_po_delete->RecCnt++;
	$pharmacy_po_delete->RowCnt++;

	// Set row properties
	$pharmacy_po->resetAttributes();
	$pharmacy_po->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_po_delete->loadRowValues($pharmacy_po_delete->Recordset);

	// Render row
	$pharmacy_po_delete->renderRow();
?>
	<tr<?php echo $pharmacy_po->rowAttributes() ?>>
<?php if ($pharmacy_po->id->Visible) { // id ?>
		<td<?php echo $pharmacy_po->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_id" class="pharmacy_po_id">
<span<?php echo $pharmacy_po->id->viewAttributes() ?>>
<?php echo $pharmacy_po->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->ORDNO->Visible) { // ORDNO ?>
		<td<?php echo $pharmacy_po->ORDNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO">
<span<?php echo $pharmacy_po->ORDNO->viewAttributes() ?>>
<?php echo $pharmacy_po->ORDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->DT->Visible) { // DT ?>
		<td<?php echo $pharmacy_po->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_DT" class="pharmacy_po_DT">
<span<?php echo $pharmacy_po->DT->viewAttributes() ?>>
<?php echo $pharmacy_po->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->YM->Visible) { // YM ?>
		<td<?php echo $pharmacy_po->YM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_YM" class="pharmacy_po_YM">
<span<?php echo $pharmacy_po->YM->viewAttributes() ?>>
<?php echo $pharmacy_po->YM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->PC->Visible) { // PC ?>
		<td<?php echo $pharmacy_po->PC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_PC" class="pharmacy_po_PC">
<span<?php echo $pharmacy_po->PC->viewAttributes() ?>>
<?php echo $pharmacy_po->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->Customercode->Visible) { // Customercode ?>
		<td<?php echo $pharmacy_po->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_Customercode" class="pharmacy_po_Customercode">
<span<?php echo $pharmacy_po->Customercode->viewAttributes() ?>>
<?php echo $pharmacy_po->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->Customername->Visible) { // Customername ?>
		<td<?php echo $pharmacy_po->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_Customername" class="pharmacy_po_Customername">
<span<?php echo $pharmacy_po->Customername->viewAttributes() ?>>
<?php echo $pharmacy_po->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td<?php echo $pharmacy_po->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol">
<span<?php echo $pharmacy_po->pharmacy_pocol->viewAttributes() ?>>
<?php echo $pharmacy_po->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->Address1->Visible) { // Address1 ?>
		<td<?php echo $pharmacy_po->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_Address1" class="pharmacy_po_Address1">
<span<?php echo $pharmacy_po->Address1->viewAttributes() ?>>
<?php echo $pharmacy_po->Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->Address2->Visible) { // Address2 ?>
		<td<?php echo $pharmacy_po->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_Address2" class="pharmacy_po_Address2">
<span<?php echo $pharmacy_po->Address2->viewAttributes() ?>>
<?php echo $pharmacy_po->Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->Address3->Visible) { // Address3 ?>
		<td<?php echo $pharmacy_po->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_Address3" class="pharmacy_po_Address3">
<span<?php echo $pharmacy_po->Address3->viewAttributes() ?>>
<?php echo $pharmacy_po->Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->State->Visible) { // State ?>
		<td<?php echo $pharmacy_po->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_State" class="pharmacy_po_State">
<span<?php echo $pharmacy_po->State->viewAttributes() ?>>
<?php echo $pharmacy_po->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->Pincode->Visible) { // Pincode ?>
		<td<?php echo $pharmacy_po->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_Pincode" class="pharmacy_po_Pincode">
<span<?php echo $pharmacy_po->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_po->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->Phone->Visible) { // Phone ?>
		<td<?php echo $pharmacy_po->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_Phone" class="pharmacy_po_Phone">
<span<?php echo $pharmacy_po->Phone->viewAttributes() ?>>
<?php echo $pharmacy_po->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->Fax->Visible) { // Fax ?>
		<td<?php echo $pharmacy_po->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_Fax" class="pharmacy_po_Fax">
<span<?php echo $pharmacy_po->Fax->viewAttributes() ?>>
<?php echo $pharmacy_po->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->EEmail->Visible) { // EEmail ?>
		<td<?php echo $pharmacy_po->EEmail->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_EEmail" class="pharmacy_po_EEmail">
<span<?php echo $pharmacy_po->EEmail->viewAttributes() ?>>
<?php echo $pharmacy_po->EEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->HospID->Visible) { // HospID ?>
		<td<?php echo $pharmacy_po->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_HospID" class="pharmacy_po_HospID">
<span<?php echo $pharmacy_po->HospID->viewAttributes() ?>>
<?php echo $pharmacy_po->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->createdby->Visible) { // createdby ?>
		<td<?php echo $pharmacy_po->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_createdby" class="pharmacy_po_createdby">
<span<?php echo $pharmacy_po->createdby->viewAttributes() ?>>
<?php echo $pharmacy_po->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $pharmacy_po->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime">
<span<?php echo $pharmacy_po->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_po->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $pharmacy_po->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby">
<span<?php echo $pharmacy_po->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_po->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $pharmacy_po->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime">
<span<?php echo $pharmacy_po->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_po->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_po->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $pharmacy_po->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_delete->RowCnt ?>_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE">
<span<?php echo $pharmacy_po->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_po->BRCODE->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_po_delete->terminate();
?>