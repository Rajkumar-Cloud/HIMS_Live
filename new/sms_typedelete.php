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
$sms_type_delete = new sms_type_delete();

// Run the page
$sms_type_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_type_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsms_typedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fsms_typedelete = currentForm = new ew.Form("fsms_typedelete", "delete");
	loadjs.done("fsms_typedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sms_type_delete->showPageHeader(); ?>
<?php
$sms_type_delete->showMessage();
?>
<form name="fsms_typedelete" id="fsms_typedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_type">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sms_type_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sms_type_delete->id->Visible) { // id ?>
		<th class="<?php echo $sms_type_delete->id->headerCellClass() ?>"><span id="elh_sms_type_id" class="sms_type_id"><?php echo $sms_type_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($sms_type_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $sms_type_delete->Name->headerCellClass() ?>"><span id="elh_sms_type_Name" class="sms_type_Name"><?php echo $sms_type_delete->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sms_type_delete->RecordCount = 0;
$i = 0;
while (!$sms_type_delete->Recordset->EOF) {
	$sms_type_delete->RecordCount++;
	$sms_type_delete->RowCount++;

	// Set row properties
	$sms_type->resetAttributes();
	$sms_type->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sms_type_delete->loadRowValues($sms_type_delete->Recordset);

	// Render row
	$sms_type_delete->renderRow();
?>
	<tr <?php echo $sms_type->rowAttributes() ?>>
<?php if ($sms_type_delete->id->Visible) { // id ?>
		<td <?php echo $sms_type_delete->id->cellAttributes() ?>>
<span id="el<?php echo $sms_type_delete->RowCount ?>_sms_type_id" class="sms_type_id">
<span<?php echo $sms_type_delete->id->viewAttributes() ?>><?php echo $sms_type_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_type_delete->Name->Visible) { // Name ?>
		<td <?php echo $sms_type_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $sms_type_delete->RowCount ?>_sms_type_Name" class="sms_type_Name">
<span<?php echo $sms_type_delete->Name->viewAttributes() ?>><?php echo $sms_type_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sms_type_delete->Recordset->moveNext();
}
$sms_type_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sms_type_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sms_type_delete->showPageFooter();
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
$sms_type_delete->terminate();
?>