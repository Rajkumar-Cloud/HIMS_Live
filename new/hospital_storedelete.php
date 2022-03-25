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
$hospital_store_delete = new hospital_store_delete();

// Run the page
$hospital_store_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_store_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhospital_storedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fhospital_storedelete = currentForm = new ew.Form("fhospital_storedelete", "delete");
	loadjs.done("fhospital_storedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospital_store_delete->showPageHeader(); ?>
<?php
$hospital_store_delete->showMessage();
?>
<form name="fhospital_storedelete" id="fhospital_storedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hospital_store_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hospital_store_delete->id->Visible) { // id ?>
		<th class="<?php echo $hospital_store_delete->id->headerCellClass() ?>"><span id="elh_hospital_store_id" class="hospital_store_id"><?php echo $hospital_store_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->pharmacy->Visible) { // pharmacy ?>
		<th class="<?php echo $hospital_store_delete->pharmacy->headerCellClass() ?>"><span id="elh_hospital_store_pharmacy" class="hospital_store_pharmacy"><?php echo $hospital_store_delete->pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->street->Visible) { // street ?>
		<th class="<?php echo $hospital_store_delete->street->headerCellClass() ?>"><span id="elh_hospital_store_street" class="hospital_store_street"><?php echo $hospital_store_delete->street->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->area->Visible) { // area ?>
		<th class="<?php echo $hospital_store_delete->area->headerCellClass() ?>"><span id="elh_hospital_store_area" class="hospital_store_area"><?php echo $hospital_store_delete->area->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->town->Visible) { // town ?>
		<th class="<?php echo $hospital_store_delete->town->headerCellClass() ?>"><span id="elh_hospital_store_town" class="hospital_store_town"><?php echo $hospital_store_delete->town->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->province->Visible) { // province ?>
		<th class="<?php echo $hospital_store_delete->province->headerCellClass() ?>"><span id="elh_hospital_store_province" class="hospital_store_province"><?php echo $hospital_store_delete->province->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $hospital_store_delete->postal_code->headerCellClass() ?>"><span id="elh_hospital_store_postal_code" class="hospital_store_postal_code"><?php echo $hospital_store_delete->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->phone_no->Visible) { // phone_no ?>
		<th class="<?php echo $hospital_store_delete->phone_no->headerCellClass() ?>"><span id="elh_hospital_store_phone_no" class="hospital_store_phone_no"><?php echo $hospital_store_delete->phone_no->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->PreFixCode->Visible) { // PreFixCode ?>
		<th class="<?php echo $hospital_store_delete->PreFixCode->headerCellClass() ?>"><span id="elh_hospital_store_PreFixCode" class="hospital_store_PreFixCode"><?php echo $hospital_store_delete->PreFixCode->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->status->Visible) { // status ?>
		<th class="<?php echo $hospital_store_delete->status->headerCellClass() ?>"><span id="elh_hospital_store_status" class="hospital_store_status"><?php echo $hospital_store_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $hospital_store_delete->createdby->headerCellClass() ?>"><span id="elh_hospital_store_createdby" class="hospital_store_createdby"><?php echo $hospital_store_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $hospital_store_delete->createddatetime->headerCellClass() ?>"><span id="elh_hospital_store_createddatetime" class="hospital_store_createddatetime"><?php echo $hospital_store_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $hospital_store_delete->modifiedby->headerCellClass() ?>"><span id="elh_hospital_store_modifiedby" class="hospital_store_modifiedby"><?php echo $hospital_store_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $hospital_store_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_hospital_store_modifieddatetime" class="hospital_store_modifieddatetime"><?php echo $hospital_store_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->pharmacyGST->Visible) { // pharmacyGST ?>
		<th class="<?php echo $hospital_store_delete->pharmacyGST->headerCellClass() ?>"><span id="elh_hospital_store_pharmacyGST" class="hospital_store_pharmacyGST"><?php echo $hospital_store_delete->pharmacyGST->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store_delete->HospId->Visible) { // HospId ?>
		<th class="<?php echo $hospital_store_delete->HospId->headerCellClass() ?>"><span id="elh_hospital_store_HospId" class="hospital_store_HospId"><?php echo $hospital_store_delete->HospId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hospital_store_delete->RecordCount = 0;
$i = 0;
while (!$hospital_store_delete->Recordset->EOF) {
	$hospital_store_delete->RecordCount++;
	$hospital_store_delete->RowCount++;

	// Set row properties
	$hospital_store->resetAttributes();
	$hospital_store->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hospital_store_delete->loadRowValues($hospital_store_delete->Recordset);

	// Render row
	$hospital_store_delete->renderRow();
?>
	<tr <?php echo $hospital_store->rowAttributes() ?>>
<?php if ($hospital_store_delete->id->Visible) { // id ?>
		<td <?php echo $hospital_store_delete->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_id" class="hospital_store_id">
<span<?php echo $hospital_store_delete->id->viewAttributes() ?>><?php echo $hospital_store_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->pharmacy->Visible) { // pharmacy ?>
		<td <?php echo $hospital_store_delete->pharmacy->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_pharmacy" class="hospital_store_pharmacy">
<span<?php echo $hospital_store_delete->pharmacy->viewAttributes() ?>><?php echo $hospital_store_delete->pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->street->Visible) { // street ?>
		<td <?php echo $hospital_store_delete->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_street" class="hospital_store_street">
<span<?php echo $hospital_store_delete->street->viewAttributes() ?>><?php echo $hospital_store_delete->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->area->Visible) { // area ?>
		<td <?php echo $hospital_store_delete->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_area" class="hospital_store_area">
<span<?php echo $hospital_store_delete->area->viewAttributes() ?>><?php echo $hospital_store_delete->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->town->Visible) { // town ?>
		<td <?php echo $hospital_store_delete->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_town" class="hospital_store_town">
<span<?php echo $hospital_store_delete->town->viewAttributes() ?>><?php echo $hospital_store_delete->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->province->Visible) { // province ?>
		<td <?php echo $hospital_store_delete->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_province" class="hospital_store_province">
<span<?php echo $hospital_store_delete->province->viewAttributes() ?>><?php echo $hospital_store_delete->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->postal_code->Visible) { // postal_code ?>
		<td <?php echo $hospital_store_delete->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_postal_code" class="hospital_store_postal_code">
<span<?php echo $hospital_store_delete->postal_code->viewAttributes() ?>><?php echo $hospital_store_delete->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->phone_no->Visible) { // phone_no ?>
		<td <?php echo $hospital_store_delete->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_phone_no" class="hospital_store_phone_no">
<span<?php echo $hospital_store_delete->phone_no->viewAttributes() ?>><?php echo $hospital_store_delete->phone_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->PreFixCode->Visible) { // PreFixCode ?>
		<td <?php echo $hospital_store_delete->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_PreFixCode" class="hospital_store_PreFixCode">
<span<?php echo $hospital_store_delete->PreFixCode->viewAttributes() ?>><?php echo $hospital_store_delete->PreFixCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->status->Visible) { // status ?>
		<td <?php echo $hospital_store_delete->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_status" class="hospital_store_status">
<span<?php echo $hospital_store_delete->status->viewAttributes() ?>><?php echo $hospital_store_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $hospital_store_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_createdby" class="hospital_store_createdby">
<span<?php echo $hospital_store_delete->createdby->viewAttributes() ?>><?php echo $hospital_store_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $hospital_store_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_createddatetime" class="hospital_store_createddatetime">
<span<?php echo $hospital_store_delete->createddatetime->viewAttributes() ?>><?php echo $hospital_store_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $hospital_store_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_modifiedby" class="hospital_store_modifiedby">
<span<?php echo $hospital_store_delete->modifiedby->viewAttributes() ?>><?php echo $hospital_store_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $hospital_store_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_modifieddatetime" class="hospital_store_modifieddatetime">
<span<?php echo $hospital_store_delete->modifieddatetime->viewAttributes() ?>><?php echo $hospital_store_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->pharmacyGST->Visible) { // pharmacyGST ?>
		<td <?php echo $hospital_store_delete->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_pharmacyGST" class="hospital_store_pharmacyGST">
<span<?php echo $hospital_store_delete->pharmacyGST->viewAttributes() ?>><?php echo $hospital_store_delete->pharmacyGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store_delete->HospId->Visible) { // HospId ?>
		<td <?php echo $hospital_store_delete->HospId->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCount ?>_hospital_store_HospId" class="hospital_store_HospId">
<span<?php echo $hospital_store_delete->HospId->viewAttributes() ?>><?php echo $hospital_store_delete->HospId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hospital_store_delete->Recordset->moveNext();
}
$hospital_store_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospital_store_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hospital_store_delete->showPageFooter();
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
$hospital_store_delete->terminate();
?>