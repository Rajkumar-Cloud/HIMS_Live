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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_billing_transferdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_billing_transferdelete = currentForm = new ew.Form("fpharmacy_billing_transferdelete", "delete");
	loadjs.done("fpharmacy_billing_transferdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_billing_transfer_delete->showPageHeader(); ?>
<?php
$pharmacy_billing_transfer_delete->showMessage();
?>
<form name="fpharmacy_billing_transferdelete" id="fpharmacy_billing_transferdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_billing_transfer_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_billing_transfer_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id"><?php echo $pharmacy_billing_transfer_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->PharID->Visible) { // PharID ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->PharID->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID"><?php echo $pharmacy_billing_transfer_delete->PharID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->pharmacy->Visible) { // pharmacy ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->pharmacy->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy"><?php echo $pharmacy_billing_transfer_delete->pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->createdby->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby"><?php echo $pharmacy_billing_transfer_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime"><?php echo $pharmacy_billing_transfer_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby"><?php echo $pharmacy_billing_transfer_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime"><?php echo $pharmacy_billing_transfer_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->HospID->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID"><?php echo $pharmacy_billing_transfer_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->transfer->Visible) { // transfer ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->transfer->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer"><?php echo $pharmacy_billing_transfer_delete->transfer->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->area->Visible) { // area ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->area->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area"><?php echo $pharmacy_billing_transfer_delete->area->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->town->Visible) { // town ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->town->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town"><?php echo $pharmacy_billing_transfer_delete->town->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->province->Visible) { // province ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->province->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province"><?php echo $pharmacy_billing_transfer_delete->province->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->postal_code->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code"><?php echo $pharmacy_billing_transfer_delete->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->phone_no->Visible) { // phone_no ?>
		<th class="<?php echo $pharmacy_billing_transfer_delete->phone_no->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no"><?php echo $pharmacy_billing_transfer_delete->phone_no->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_billing_transfer_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_billing_transfer_delete->Recordset->EOF) {
	$pharmacy_billing_transfer_delete->RecordCount++;
	$pharmacy_billing_transfer_delete->RowCount++;

	// Set row properties
	$pharmacy_billing_transfer->resetAttributes();
	$pharmacy_billing_transfer->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_billing_transfer_delete->loadRowValues($pharmacy_billing_transfer_delete->Recordset);

	// Render row
	$pharmacy_billing_transfer_delete->renderRow();
?>
	<tr <?php echo $pharmacy_billing_transfer->rowAttributes() ?>>
<?php if ($pharmacy_billing_transfer_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_billing_transfer_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id">
<span<?php echo $pharmacy_billing_transfer_delete->id->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->PharID->Visible) { // PharID ?>
		<td <?php echo $pharmacy_billing_transfer_delete->PharID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID">
<span<?php echo $pharmacy_billing_transfer_delete->PharID->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->pharmacy->Visible) { // pharmacy ?>
		<td <?php echo $pharmacy_billing_transfer_delete->pharmacy->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy">
<span<?php echo $pharmacy_billing_transfer_delete->pharmacy->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $pharmacy_billing_transfer_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby">
<span<?php echo $pharmacy_billing_transfer_delete->createdby->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $pharmacy_billing_transfer_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime">
<span<?php echo $pharmacy_billing_transfer_delete->createddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $pharmacy_billing_transfer_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby">
<span<?php echo $pharmacy_billing_transfer_delete->modifiedby->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $pharmacy_billing_transfer_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime">
<span<?php echo $pharmacy_billing_transfer_delete->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $pharmacy_billing_transfer_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID">
<span<?php echo $pharmacy_billing_transfer_delete->HospID->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->transfer->Visible) { // transfer ?>
		<td <?php echo $pharmacy_billing_transfer_delete->transfer->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer">
<span<?php echo $pharmacy_billing_transfer_delete->transfer->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->transfer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->area->Visible) { // area ?>
		<td <?php echo $pharmacy_billing_transfer_delete->area->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area">
<span<?php echo $pharmacy_billing_transfer_delete->area->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->town->Visible) { // town ?>
		<td <?php echo $pharmacy_billing_transfer_delete->town->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town">
<span<?php echo $pharmacy_billing_transfer_delete->town->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->province->Visible) { // province ?>
		<td <?php echo $pharmacy_billing_transfer_delete->province->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province">
<span<?php echo $pharmacy_billing_transfer_delete->province->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->postal_code->Visible) { // postal_code ?>
		<td <?php echo $pharmacy_billing_transfer_delete->postal_code->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code">
<span<?php echo $pharmacy_billing_transfer_delete->postal_code->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_transfer_delete->phone_no->Visible) { // phone_no ?>
		<td <?php echo $pharmacy_billing_transfer_delete->phone_no->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_transfer_delete->RowCount ?>_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no">
<span<?php echo $pharmacy_billing_transfer_delete->phone_no->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_delete->phone_no->getViewValue() ?></span>
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
$pharmacy_billing_transfer_delete->terminate();
?>