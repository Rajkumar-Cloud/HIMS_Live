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
$sms_cintent_delete = new sms_cintent_delete();

// Run the page
$sms_cintent_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_cintent_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsms_cintentdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fsms_cintentdelete = currentForm = new ew.Form("fsms_cintentdelete", "delete");
	loadjs.done("fsms_cintentdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sms_cintent_delete->showPageHeader(); ?>
<?php
$sms_cintent_delete->showMessage();
?>
<form name="fsms_cintentdelete" id="fsms_cintentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sms_cintent_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sms_cintent_delete->id->Visible) { // id ?>
		<th class="<?php echo $sms_cintent_delete->id->headerCellClass() ?>"><span id="elh_sms_cintent_id" class="sms_cintent_id"><?php echo $sms_cintent_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($sms_cintent_delete->SMSType->Visible) { // SMSType ?>
		<th class="<?php echo $sms_cintent_delete->SMSType->headerCellClass() ?>"><span id="elh_sms_cintent_SMSType" class="sms_cintent_SMSType"><?php echo $sms_cintent_delete->SMSType->caption() ?></span></th>
<?php } ?>
<?php if ($sms_cintent_delete->Content->Visible) { // Content ?>
		<th class="<?php echo $sms_cintent_delete->Content->headerCellClass() ?>"><span id="elh_sms_cintent_Content" class="sms_cintent_Content"><?php echo $sms_cintent_delete->Content->caption() ?></span></th>
<?php } ?>
<?php if ($sms_cintent_delete->Enabled->Visible) { // Enabled ?>
		<th class="<?php echo $sms_cintent_delete->Enabled->headerCellClass() ?>"><span id="elh_sms_cintent_Enabled" class="sms_cintent_Enabled"><?php echo $sms_cintent_delete->Enabled->caption() ?></span></th>
<?php } ?>
<?php if ($sms_cintent_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $sms_cintent_delete->HospID->headerCellClass() ?>"><span id="elh_sms_cintent_HospID" class="sms_cintent_HospID"><?php echo $sms_cintent_delete->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sms_cintent_delete->RecordCount = 0;
$i = 0;
while (!$sms_cintent_delete->Recordset->EOF) {
	$sms_cintent_delete->RecordCount++;
	$sms_cintent_delete->RowCount++;

	// Set row properties
	$sms_cintent->resetAttributes();
	$sms_cintent->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sms_cintent_delete->loadRowValues($sms_cintent_delete->Recordset);

	// Render row
	$sms_cintent_delete->renderRow();
?>
	<tr <?php echo $sms_cintent->rowAttributes() ?>>
<?php if ($sms_cintent_delete->id->Visible) { // id ?>
		<td <?php echo $sms_cintent_delete->id->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_delete->RowCount ?>_sms_cintent_id" class="sms_cintent_id">
<span<?php echo $sms_cintent_delete->id->viewAttributes() ?>><?php echo $sms_cintent_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_cintent_delete->SMSType->Visible) { // SMSType ?>
		<td <?php echo $sms_cintent_delete->SMSType->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_delete->RowCount ?>_sms_cintent_SMSType" class="sms_cintent_SMSType">
<span<?php echo $sms_cintent_delete->SMSType->viewAttributes() ?>><?php echo $sms_cintent_delete->SMSType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_cintent_delete->Content->Visible) { // Content ?>
		<td <?php echo $sms_cintent_delete->Content->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_delete->RowCount ?>_sms_cintent_Content" class="sms_cintent_Content">
<span<?php echo $sms_cintent_delete->Content->viewAttributes() ?>><?php echo $sms_cintent_delete->Content->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_cintent_delete->Enabled->Visible) { // Enabled ?>
		<td <?php echo $sms_cintent_delete->Enabled->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_delete->RowCount ?>_sms_cintent_Enabled" class="sms_cintent_Enabled">
<span<?php echo $sms_cintent_delete->Enabled->viewAttributes() ?>><?php echo $sms_cintent_delete->Enabled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_cintent_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $sms_cintent_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_delete->RowCount ?>_sms_cintent_HospID" class="sms_cintent_HospID">
<span<?php echo $sms_cintent_delete->HospID->viewAttributes() ?>><?php echo $sms_cintent_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sms_cintent_delete->Recordset->moveNext();
}
$sms_cintent_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sms_cintent_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sms_cintent_delete->showPageFooter();
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
$sms_cintent_delete->terminate();
?>