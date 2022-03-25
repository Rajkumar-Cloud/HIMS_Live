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
$hospital_pharmacy_delete = new hospital_pharmacy_delete();

// Run the page
$hospital_pharmacy_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_pharmacy_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhospital_pharmacydelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fhospital_pharmacydelete = currentForm = new ew.Form("fhospital_pharmacydelete", "delete");
	loadjs.done("fhospital_pharmacydelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospital_pharmacy_delete->showPageHeader(); ?>
<?php
$hospital_pharmacy_delete->showMessage();
?>
<form name="fhospital_pharmacydelete" id="fhospital_pharmacydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_pharmacy">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hospital_pharmacy_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hospital_pharmacy_delete->id->Visible) { // id ?>
		<th class="<?php echo $hospital_pharmacy_delete->id->headerCellClass() ?>"><span id="elh_hospital_pharmacy_id" class="hospital_pharmacy_id"><?php echo $hospital_pharmacy_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->pharmacy->Visible) { // pharmacy ?>
		<th class="<?php echo $hospital_pharmacy_delete->pharmacy->headerCellClass() ?>"><span id="elh_hospital_pharmacy_pharmacy" class="hospital_pharmacy_pharmacy"><?php echo $hospital_pharmacy_delete->pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->street->Visible) { // street ?>
		<th class="<?php echo $hospital_pharmacy_delete->street->headerCellClass() ?>"><span id="elh_hospital_pharmacy_street" class="hospital_pharmacy_street"><?php echo $hospital_pharmacy_delete->street->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->area->Visible) { // area ?>
		<th class="<?php echo $hospital_pharmacy_delete->area->headerCellClass() ?>"><span id="elh_hospital_pharmacy_area" class="hospital_pharmacy_area"><?php echo $hospital_pharmacy_delete->area->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->town->Visible) { // town ?>
		<th class="<?php echo $hospital_pharmacy_delete->town->headerCellClass() ?>"><span id="elh_hospital_pharmacy_town" class="hospital_pharmacy_town"><?php echo $hospital_pharmacy_delete->town->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->province->Visible) { // province ?>
		<th class="<?php echo $hospital_pharmacy_delete->province->headerCellClass() ?>"><span id="elh_hospital_pharmacy_province" class="hospital_pharmacy_province"><?php echo $hospital_pharmacy_delete->province->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $hospital_pharmacy_delete->postal_code->headerCellClass() ?>"><span id="elh_hospital_pharmacy_postal_code" class="hospital_pharmacy_postal_code"><?php echo $hospital_pharmacy_delete->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->phone_no->Visible) { // phone_no ?>
		<th class="<?php echo $hospital_pharmacy_delete->phone_no->headerCellClass() ?>"><span id="elh_hospital_pharmacy_phone_no" class="hospital_pharmacy_phone_no"><?php echo $hospital_pharmacy_delete->phone_no->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->PreFixCode->Visible) { // PreFixCode ?>
		<th class="<?php echo $hospital_pharmacy_delete->PreFixCode->headerCellClass() ?>"><span id="elh_hospital_pharmacy_PreFixCode" class="hospital_pharmacy_PreFixCode"><?php echo $hospital_pharmacy_delete->PreFixCode->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->status->Visible) { // status ?>
		<th class="<?php echo $hospital_pharmacy_delete->status->headerCellClass() ?>"><span id="elh_hospital_pharmacy_status" class="hospital_pharmacy_status"><?php echo $hospital_pharmacy_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $hospital_pharmacy_delete->createdby->headerCellClass() ?>"><span id="elh_hospital_pharmacy_createdby" class="hospital_pharmacy_createdby"><?php echo $hospital_pharmacy_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $hospital_pharmacy_delete->createddatetime->headerCellClass() ?>"><span id="elh_hospital_pharmacy_createddatetime" class="hospital_pharmacy_createddatetime"><?php echo $hospital_pharmacy_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $hospital_pharmacy_delete->modifiedby->headerCellClass() ?>"><span id="elh_hospital_pharmacy_modifiedby" class="hospital_pharmacy_modifiedby"><?php echo $hospital_pharmacy_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $hospital_pharmacy_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_hospital_pharmacy_modifieddatetime" class="hospital_pharmacy_modifieddatetime"><?php echo $hospital_pharmacy_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->pharmacyGST->Visible) { // pharmacyGST ?>
		<th class="<?php echo $hospital_pharmacy_delete->pharmacyGST->headerCellClass() ?>"><span id="elh_hospital_pharmacy_pharmacyGST" class="hospital_pharmacy_pharmacyGST"><?php echo $hospital_pharmacy_delete->pharmacyGST->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy_delete->HospId->Visible) { // HospId ?>
		<th class="<?php echo $hospital_pharmacy_delete->HospId->headerCellClass() ?>"><span id="elh_hospital_pharmacy_HospId" class="hospital_pharmacy_HospId"><?php echo $hospital_pharmacy_delete->HospId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hospital_pharmacy_delete->RecordCount = 0;
$i = 0;
while (!$hospital_pharmacy_delete->Recordset->EOF) {
	$hospital_pharmacy_delete->RecordCount++;
	$hospital_pharmacy_delete->RowCount++;

	// Set row properties
	$hospital_pharmacy->resetAttributes();
	$hospital_pharmacy->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hospital_pharmacy_delete->loadRowValues($hospital_pharmacy_delete->Recordset);

	// Render row
	$hospital_pharmacy_delete->renderRow();
?>
	<tr <?php echo $hospital_pharmacy->rowAttributes() ?>>
<?php if ($hospital_pharmacy_delete->id->Visible) { // id ?>
		<td <?php echo $hospital_pharmacy_delete->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_id" class="hospital_pharmacy_id">
<span<?php echo $hospital_pharmacy_delete->id->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->pharmacy->Visible) { // pharmacy ?>
		<td <?php echo $hospital_pharmacy_delete->pharmacy->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_pharmacy" class="hospital_pharmacy_pharmacy">
<span<?php echo $hospital_pharmacy_delete->pharmacy->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->street->Visible) { // street ?>
		<td <?php echo $hospital_pharmacy_delete->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_street" class="hospital_pharmacy_street">
<span<?php echo $hospital_pharmacy_delete->street->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->area->Visible) { // area ?>
		<td <?php echo $hospital_pharmacy_delete->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_area" class="hospital_pharmacy_area">
<span<?php echo $hospital_pharmacy_delete->area->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->town->Visible) { // town ?>
		<td <?php echo $hospital_pharmacy_delete->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_town" class="hospital_pharmacy_town">
<span<?php echo $hospital_pharmacy_delete->town->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->province->Visible) { // province ?>
		<td <?php echo $hospital_pharmacy_delete->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_province" class="hospital_pharmacy_province">
<span<?php echo $hospital_pharmacy_delete->province->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->postal_code->Visible) { // postal_code ?>
		<td <?php echo $hospital_pharmacy_delete->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_postal_code" class="hospital_pharmacy_postal_code">
<span<?php echo $hospital_pharmacy_delete->postal_code->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->phone_no->Visible) { // phone_no ?>
		<td <?php echo $hospital_pharmacy_delete->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_phone_no" class="hospital_pharmacy_phone_no">
<span<?php echo $hospital_pharmacy_delete->phone_no->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->phone_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->PreFixCode->Visible) { // PreFixCode ?>
		<td <?php echo $hospital_pharmacy_delete->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_PreFixCode" class="hospital_pharmacy_PreFixCode">
<span<?php echo $hospital_pharmacy_delete->PreFixCode->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->PreFixCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->status->Visible) { // status ?>
		<td <?php echo $hospital_pharmacy_delete->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_status" class="hospital_pharmacy_status">
<span<?php echo $hospital_pharmacy_delete->status->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $hospital_pharmacy_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_createdby" class="hospital_pharmacy_createdby">
<span<?php echo $hospital_pharmacy_delete->createdby->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $hospital_pharmacy_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_createddatetime" class="hospital_pharmacy_createddatetime">
<span<?php echo $hospital_pharmacy_delete->createddatetime->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $hospital_pharmacy_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_modifiedby" class="hospital_pharmacy_modifiedby">
<span<?php echo $hospital_pharmacy_delete->modifiedby->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $hospital_pharmacy_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_modifieddatetime" class="hospital_pharmacy_modifieddatetime">
<span<?php echo $hospital_pharmacy_delete->modifieddatetime->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->pharmacyGST->Visible) { // pharmacyGST ?>
		<td <?php echo $hospital_pharmacy_delete->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_pharmacyGST" class="hospital_pharmacy_pharmacyGST">
<span<?php echo $hospital_pharmacy_delete->pharmacyGST->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->pharmacyGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy_delete->HospId->Visible) { // HospId ?>
		<td <?php echo $hospital_pharmacy_delete->HospId->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCount ?>_hospital_pharmacy_HospId" class="hospital_pharmacy_HospId">
<span<?php echo $hospital_pharmacy_delete->HospId->viewAttributes() ?>><?php echo $hospital_pharmacy_delete->HospId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hospital_pharmacy_delete->Recordset->moveNext();
}
$hospital_pharmacy_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospital_pharmacy_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hospital_pharmacy_delete->showPageFooter();
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
$hospital_pharmacy_delete->terminate();
?>