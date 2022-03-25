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
$pharmacy_billing_transfer_delete = new pharmacy_billing_transfer_delete();

// Run the page
$pharmacy_billing_transfer_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_transfer_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_billing_transferdelete = currentForm = new ew.Form("fpharmacy_billing_transferdelete", "delete");

// Form_CustomValidate event
fpharmacy_billing_transferdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_transferdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_transferdelete.lists["x_PharID"] = <?php echo $pharmacy_billing_transfer_delete->PharID->Lookup->toClientList() ?>;
fpharmacy_billing_transferdelete.lists["x_PharID"].options = <?php echo JsonEncode($pharmacy_billing_transfer_delete->PharID->lookupOptions()) ?>;
fpharmacy_billing_transferdelete.autoSuggests["x_PharID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_billing_transferdelete.lists["x_transfer"] = <?php echo $pharmacy_billing_transfer_delete->transfer->Lookup->toClientList() ?>;
fpharmacy_billing_transferdelete.lists["x_transfer"].options = <?php echo JsonEncode($pharmacy_billing_transfer_delete->transfer->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_billing_transfer_delete->showPageHeader(); ?>
<?php
$pharmacy_billing_transfer_delete->showMessage();
?>
<form name="fpharmacy_billing_transferdelete" id="fpharmacy_billing_transferdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_transfer_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_transfer_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_billing_transfer_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_billing_transfer->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_billing_transfer->id->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id"><?php echo $pharmacy_billing_transfer->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->PharID->Visible) { // PharID ?>
		<th class="<?php echo $pharmacy_billing_transfer->PharID->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID"><?php echo $pharmacy_billing_transfer->PharID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->pharmacy->Visible) { // pharmacy ?>
		<th class="<?php echo $pharmacy_billing_transfer->pharmacy->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy"><?php echo $pharmacy_billing_transfer->pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_billing_transfer->createdby->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby"><?php echo $pharmacy_billing_transfer->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_billing_transfer->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime"><?php echo $pharmacy_billing_transfer->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_billing_transfer->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby"><?php echo $pharmacy_billing_transfer->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_billing_transfer->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime"><?php echo $pharmacy_billing_transfer->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_billing_transfer->HospID->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID"><?php echo $pharmacy_billing_transfer->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->transfer->Visible) { // transfer ?>
		<th class="<?php echo $pharmacy_billing_transfer->transfer->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer"><?php echo $pharmacy_billing_transfer->transfer->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->area->Visible) { // area ?>
		<th class="<?php echo $pharmacy_billing_transfer->area->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area"><?php echo $pharmacy_billing_transfer->area->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->town->Visible) { // town ?>
		<th class="<?php echo $pharmacy_billing_transfer->town->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town"><?php echo $pharmacy_billing_transfer->town->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->province->Visible) { // province ?>
		<th class="<?php echo $pharmacy_billing_transfer->province->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province"><?php echo $pharmacy_billing_transfer->province->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $pharmacy_billing_transfer->postal_code->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code"><?php echo $pharmacy_billing_transfer->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer->phone_no->Visible) { // phone_no ?>
		<th class="<?php echo $pharmacy_billing_transfer->phone_no->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no"><?php echo $pharmacy_billing_transfer->phone_no->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_billing_transfer_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_billing_transfer_delete->Recordset->EOF) {
	$pharmacy_billing_transfer_delete->RecCnt++;
	$pharmacy_billing_transfer_delete->RowCnt++;

	// Set row properties
	$pharmacy_billing_transfer->resetAttributes();
	$pharmacy_billing_transfer->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_billing_transfer_delete->loadRowValues($pharmacy_billing_transfer_delete->Recordset);

	// Render row
	$pharmacy_billing_transfer_delete->renderRow();
?>
	<tr<?php echo $pharmacy_billing_transfer->rowAttributes() ?>>
<?php if ($pharmacy_billing_transfer->id->Visible) { // id ?>
		<td<?php echo $pharmacy_billing_transfer->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id">
<span<?php echo $pharmacy_billing_transfer->id->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->PharID->Visible) { // PharID ?>
		<td<?php echo $pharmacy_billing_transfer->PharID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID">
<span<?php echo $pharmacy_billing_transfer->PharID->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->pharmacy->Visible) { // pharmacy ?>
		<td<?php echo $pharmacy_billing_transfer->pharmacy->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy">
<span<?php echo $pharmacy_billing_transfer->pharmacy->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->createdby->Visible) { // createdby ?>
		<td<?php echo $pharmacy_billing_transfer->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby">
<span<?php echo $pharmacy_billing_transfer->createdby->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $pharmacy_billing_transfer->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime">
<span<?php echo $pharmacy_billing_transfer->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $pharmacy_billing_transfer->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby">
<span<?php echo $pharmacy_billing_transfer->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $pharmacy_billing_transfer->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime">
<span<?php echo $pharmacy_billing_transfer->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->HospID->Visible) { // HospID ?>
		<td<?php echo $pharmacy_billing_transfer->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID">
<span<?php echo $pharmacy_billing_transfer->HospID->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->transfer->Visible) { // transfer ?>
		<td<?php echo $pharmacy_billing_transfer->transfer->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer">
<span<?php echo $pharmacy_billing_transfer->transfer->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->transfer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->area->Visible) { // area ?>
		<td<?php echo $pharmacy_billing_transfer->area->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area">
<span<?php echo $pharmacy_billing_transfer->area->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->town->Visible) { // town ?>
		<td<?php echo $pharmacy_billing_transfer->town->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town">
<span<?php echo $pharmacy_billing_transfer->town->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->province->Visible) { // province ?>
		<td<?php echo $pharmacy_billing_transfer->province->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province">
<span<?php echo $pharmacy_billing_transfer->province->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->postal_code->Visible) { // postal_code ?>
		<td<?php echo $pharmacy_billing_transfer->postal_code->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code">
<span<?php echo $pharmacy_billing_transfer->postal_code->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer->phone_no->Visible) { // phone_no ?>
		<td<?php echo $pharmacy_billing_transfer->phone_no->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCnt ?>_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no">
<span<?php echo $pharmacy_billing_transfer->phone_no->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->phone_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_billing_transfer_delete->Recordset->moveNext();
}
$pharmacy_billing_transfer_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_transfer_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_billing_transfer_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_transfer_delete->terminate();
?>