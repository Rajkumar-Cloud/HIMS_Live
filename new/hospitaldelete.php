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
$hospital_delete = new hospital_delete();

// Run the page
$hospital_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhospitaldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fhospitaldelete = currentForm = new ew.Form("fhospitaldelete", "delete");
	loadjs.done("fhospitaldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospital_delete->showPageHeader(); ?>
<?php
$hospital_delete->showMessage();
?>
<form name="fhospitaldelete" id="fhospitaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hospital_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hospital_delete->id->Visible) { // id ?>
		<th class="<?php echo $hospital_delete->id->headerCellClass() ?>"><span id="elh_hospital_id" class="hospital_id"><?php echo $hospital_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->hospital->Visible) { // hospital ?>
		<th class="<?php echo $hospital_delete->hospital->headerCellClass() ?>"><span id="elh_hospital_hospital" class="hospital_hospital"><?php echo $hospital_delete->hospital->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->street->Visible) { // street ?>
		<th class="<?php echo $hospital_delete->street->headerCellClass() ?>"><span id="elh_hospital_street" class="hospital_street"><?php echo $hospital_delete->street->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->area->Visible) { // area ?>
		<th class="<?php echo $hospital_delete->area->headerCellClass() ?>"><span id="elh_hospital_area" class="hospital_area"><?php echo $hospital_delete->area->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->town->Visible) { // town ?>
		<th class="<?php echo $hospital_delete->town->headerCellClass() ?>"><span id="elh_hospital_town" class="hospital_town"><?php echo $hospital_delete->town->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->province->Visible) { // province ?>
		<th class="<?php echo $hospital_delete->province->headerCellClass() ?>"><span id="elh_hospital_province" class="hospital_province"><?php echo $hospital_delete->province->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $hospital_delete->postal_code->headerCellClass() ?>"><span id="elh_hospital_postal_code" class="hospital_postal_code"><?php echo $hospital_delete->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->phone_no->Visible) { // phone_no ?>
		<th class="<?php echo $hospital_delete->phone_no->headerCellClass() ?>"><span id="elh_hospital_phone_no" class="hospital_phone_no"><?php echo $hospital_delete->phone_no->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->status->Visible) { // status ?>
		<th class="<?php echo $hospital_delete->status->headerCellClass() ?>"><span id="elh_hospital_status" class="hospital_status"><?php echo $hospital_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->PreFixCode->Visible) { // PreFixCode ?>
		<th class="<?php echo $hospital_delete->PreFixCode->headerCellClass() ?>"><span id="elh_hospital_PreFixCode" class="hospital_PreFixCode"><?php echo $hospital_delete->PreFixCode->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->BillingGST->Visible) { // BillingGST ?>
		<th class="<?php echo $hospital_delete->BillingGST->headerCellClass() ?>"><span id="elh_hospital_BillingGST" class="hospital_BillingGST"><?php echo $hospital_delete->BillingGST->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_delete->pharmacyGST->Visible) { // pharmacyGST ?>
		<th class="<?php echo $hospital_delete->pharmacyGST->headerCellClass() ?>"><span id="elh_hospital_pharmacyGST" class="hospital_pharmacyGST"><?php echo $hospital_delete->pharmacyGST->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hospital_delete->RecordCount = 0;
$i = 0;
while (!$hospital_delete->Recordset->EOF) {
	$hospital_delete->RecordCount++;
	$hospital_delete->RowCount++;

	// Set row properties
	$hospital->resetAttributes();
	$hospital->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hospital_delete->loadRowValues($hospital_delete->Recordset);

	// Render row
	$hospital_delete->renderRow();
?>
	<tr <?php echo $hospital->rowAttributes() ?>>
<?php if ($hospital_delete->id->Visible) { // id ?>
		<td <?php echo $hospital_delete->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_id" class="hospital_id">
<span<?php echo $hospital_delete->id->viewAttributes() ?>><?php echo $hospital_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->hospital->Visible) { // hospital ?>
		<td <?php echo $hospital_delete->hospital->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_hospital" class="hospital_hospital">
<span<?php echo $hospital_delete->hospital->viewAttributes() ?>><?php echo $hospital_delete->hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->street->Visible) { // street ?>
		<td <?php echo $hospital_delete->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_street" class="hospital_street">
<span<?php echo $hospital_delete->street->viewAttributes() ?>><?php echo $hospital_delete->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->area->Visible) { // area ?>
		<td <?php echo $hospital_delete->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_area" class="hospital_area">
<span<?php echo $hospital_delete->area->viewAttributes() ?>><?php echo $hospital_delete->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->town->Visible) { // town ?>
		<td <?php echo $hospital_delete->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_town" class="hospital_town">
<span<?php echo $hospital_delete->town->viewAttributes() ?>><?php echo $hospital_delete->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->province->Visible) { // province ?>
		<td <?php echo $hospital_delete->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_province" class="hospital_province">
<span<?php echo $hospital_delete->province->viewAttributes() ?>><?php echo $hospital_delete->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->postal_code->Visible) { // postal_code ?>
		<td <?php echo $hospital_delete->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_postal_code" class="hospital_postal_code">
<span<?php echo $hospital_delete->postal_code->viewAttributes() ?>><?php echo $hospital_delete->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->phone_no->Visible) { // phone_no ?>
		<td <?php echo $hospital_delete->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_phone_no" class="hospital_phone_no">
<span<?php echo $hospital_delete->phone_no->viewAttributes() ?>><?php echo $hospital_delete->phone_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->status->Visible) { // status ?>
		<td <?php echo $hospital_delete->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_status" class="hospital_status">
<span<?php echo $hospital_delete->status->viewAttributes() ?>><?php echo $hospital_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->PreFixCode->Visible) { // PreFixCode ?>
		<td <?php echo $hospital_delete->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_PreFixCode" class="hospital_PreFixCode">
<span<?php echo $hospital_delete->PreFixCode->viewAttributes() ?>><?php echo $hospital_delete->PreFixCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->BillingGST->Visible) { // BillingGST ?>
		<td <?php echo $hospital_delete->BillingGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_BillingGST" class="hospital_BillingGST">
<span<?php echo $hospital_delete->BillingGST->viewAttributes() ?>><?php echo $hospital_delete->BillingGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_delete->pharmacyGST->Visible) { // pharmacyGST ?>
		<td <?php echo $hospital_delete->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCount ?>_hospital_pharmacyGST" class="hospital_pharmacyGST">
<span<?php echo $hospital_delete->pharmacyGST->viewAttributes() ?>><?php echo $hospital_delete->pharmacyGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hospital_delete->Recordset->moveNext();
}
$hospital_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospital_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hospital_delete->showPageFooter();
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
$hospital_delete->terminate();
?>