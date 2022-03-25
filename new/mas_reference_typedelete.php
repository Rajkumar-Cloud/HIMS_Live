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
$mas_reference_type_delete = new mas_reference_type_delete();

// Run the page
$mas_reference_type_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_reference_type_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_reference_typedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmas_reference_typedelete = currentForm = new ew.Form("fmas_reference_typedelete", "delete");
	loadjs.done("fmas_reference_typedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_reference_type_delete->showPageHeader(); ?>
<?php
$mas_reference_type_delete->showMessage();
?>
<form name="fmas_reference_typedelete" id="fmas_reference_typedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_reference_type_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_reference_type_delete->id->Visible) { // id ?>
		<th class="<?php echo $mas_reference_type_delete->id->headerCellClass() ?>"><span id="elh_mas_reference_type_id" class="mas_reference_type_id"><?php echo $mas_reference_type_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type_delete->reference->Visible) { // reference ?>
		<th class="<?php echo $mas_reference_type_delete->reference->headerCellClass() ?>"><span id="elh_mas_reference_type_reference" class="mas_reference_type_reference"><?php echo $mas_reference_type_delete->reference->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type_delete->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<th class="<?php echo $mas_reference_type_delete->ReferMobileNo->headerCellClass() ?>"><span id="elh_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo"><?php echo $mas_reference_type_delete->ReferMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type_delete->ReferClinicname->Visible) { // ReferClinicname ?>
		<th class="<?php echo $mas_reference_type_delete->ReferClinicname->headerCellClass() ?>"><span id="elh_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname"><?php echo $mas_reference_type_delete->ReferClinicname->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type_delete->ReferCity->Visible) { // ReferCity ?>
		<th class="<?php echo $mas_reference_type_delete->ReferCity->headerCellClass() ?>"><span id="elh_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity"><?php echo $mas_reference_type_delete->ReferCity->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_reference_type_delete->RecordCount = 0;
$i = 0;
while (!$mas_reference_type_delete->Recordset->EOF) {
	$mas_reference_type_delete->RecordCount++;
	$mas_reference_type_delete->RowCount++;

	// Set row properties
	$mas_reference_type->resetAttributes();
	$mas_reference_type->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_reference_type_delete->loadRowValues($mas_reference_type_delete->Recordset);

	// Render row
	$mas_reference_type_delete->renderRow();
?>
	<tr <?php echo $mas_reference_type->rowAttributes() ?>>
<?php if ($mas_reference_type_delete->id->Visible) { // id ?>
		<td <?php echo $mas_reference_type_delete->id->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCount ?>_mas_reference_type_id" class="mas_reference_type_id">
<span<?php echo $mas_reference_type_delete->id->viewAttributes() ?>><?php echo $mas_reference_type_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type_delete->reference->Visible) { // reference ?>
		<td <?php echo $mas_reference_type_delete->reference->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCount ?>_mas_reference_type_reference" class="mas_reference_type_reference">
<span<?php echo $mas_reference_type_delete->reference->viewAttributes() ?>><?php echo $mas_reference_type_delete->reference->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type_delete->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td <?php echo $mas_reference_type_delete->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCount ?>_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo">
<span<?php echo $mas_reference_type_delete->ReferMobileNo->viewAttributes() ?>><?php echo $mas_reference_type_delete->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type_delete->ReferClinicname->Visible) { // ReferClinicname ?>
		<td <?php echo $mas_reference_type_delete->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCount ?>_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname">
<span<?php echo $mas_reference_type_delete->ReferClinicname->viewAttributes() ?>><?php echo $mas_reference_type_delete->ReferClinicname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type_delete->ReferCity->Visible) { // ReferCity ?>
		<td <?php echo $mas_reference_type_delete->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCount ?>_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity">
<span<?php echo $mas_reference_type_delete->ReferCity->viewAttributes() ?>><?php echo $mas_reference_type_delete->ReferCity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_reference_type_delete->Recordset->moveNext();
}
$mas_reference_type_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_reference_type_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_reference_type_delete->showPageFooter();
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
$mas_reference_type_delete->terminate();
?>