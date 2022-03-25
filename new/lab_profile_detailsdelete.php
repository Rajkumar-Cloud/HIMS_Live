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
$lab_profile_details_delete = new lab_profile_details_delete();

// Run the page
$lab_profile_details_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_details_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_profile_detailsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flab_profile_detailsdelete = currentForm = new ew.Form("flab_profile_detailsdelete", "delete");
	loadjs.done("flab_profile_detailsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_profile_details_delete->showPageHeader(); ?>
<?php
$lab_profile_details_delete->showMessage();
?>
<form name="flab_profile_detailsdelete" id="flab_profile_detailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_profile_details_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_profile_details_delete->id->Visible) { // id ?>
		<th class="<?php echo $lab_profile_details_delete->id->headerCellClass() ?>"><span id="elh_lab_profile_details_id" class="lab_profile_details_id"><?php echo $lab_profile_details_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details_delete->ProfileCode->Visible) { // ProfileCode ?>
		<th class="<?php echo $lab_profile_details_delete->ProfileCode->headerCellClass() ?>"><span id="elh_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode"><?php echo $lab_profile_details_delete->ProfileCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details_delete->SubProfileCode->Visible) { // SubProfileCode ?>
		<th class="<?php echo $lab_profile_details_delete->SubProfileCode->headerCellClass() ?>"><span id="elh_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode"><?php echo $lab_profile_details_delete->SubProfileCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details_delete->ProfileTestCode->Visible) { // ProfileTestCode ?>
		<th class="<?php echo $lab_profile_details_delete->ProfileTestCode->headerCellClass() ?>"><span id="elh_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode"><?php echo $lab_profile_details_delete->ProfileTestCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details_delete->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
		<th class="<?php echo $lab_profile_details_delete->ProfileSubTestCode->headerCellClass() ?>"><span id="elh_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode"><?php echo $lab_profile_details_delete->ProfileSubTestCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details_delete->TestOrder->Visible) { // TestOrder ?>
		<th class="<?php echo $lab_profile_details_delete->TestOrder->headerCellClass() ?>"><span id="elh_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder"><?php echo $lab_profile_details_delete->TestOrder->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details_delete->TestAmount->Visible) { // TestAmount ?>
		<th class="<?php echo $lab_profile_details_delete->TestAmount->headerCellClass() ?>"><span id="elh_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount"><?php echo $lab_profile_details_delete->TestAmount->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_profile_details_delete->RecordCount = 0;
$i = 0;
while (!$lab_profile_details_delete->Recordset->EOF) {
	$lab_profile_details_delete->RecordCount++;
	$lab_profile_details_delete->RowCount++;

	// Set row properties
	$lab_profile_details->resetAttributes();
	$lab_profile_details->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_profile_details_delete->loadRowValues($lab_profile_details_delete->Recordset);

	// Render row
	$lab_profile_details_delete->renderRow();
?>
	<tr <?php echo $lab_profile_details->rowAttributes() ?>>
<?php if ($lab_profile_details_delete->id->Visible) { // id ?>
		<td <?php echo $lab_profile_details_delete->id->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCount ?>_lab_profile_details_id" class="lab_profile_details_id">
<span<?php echo $lab_profile_details_delete->id->viewAttributes() ?>><?php echo $lab_profile_details_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details_delete->ProfileCode->Visible) { // ProfileCode ?>
		<td <?php echo $lab_profile_details_delete->ProfileCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCount ?>_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details_delete->ProfileCode->viewAttributes() ?>><?php echo $lab_profile_details_delete->ProfileCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details_delete->SubProfileCode->Visible) { // SubProfileCode ?>
		<td <?php echo $lab_profile_details_delete->SubProfileCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCount ?>_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode">
<span<?php echo $lab_profile_details_delete->SubProfileCode->viewAttributes() ?>><?php echo $lab_profile_details_delete->SubProfileCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details_delete->ProfileTestCode->Visible) { // ProfileTestCode ?>
		<td <?php echo $lab_profile_details_delete->ProfileTestCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCount ?>_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode">
<span<?php echo $lab_profile_details_delete->ProfileTestCode->viewAttributes() ?>><?php echo $lab_profile_details_delete->ProfileTestCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details_delete->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
		<td <?php echo $lab_profile_details_delete->ProfileSubTestCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCount ?>_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode">
<span<?php echo $lab_profile_details_delete->ProfileSubTestCode->viewAttributes() ?>><?php echo $lab_profile_details_delete->ProfileSubTestCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details_delete->TestOrder->Visible) { // TestOrder ?>
		<td <?php echo $lab_profile_details_delete->TestOrder->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCount ?>_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder">
<span<?php echo $lab_profile_details_delete->TestOrder->viewAttributes() ?>><?php echo $lab_profile_details_delete->TestOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details_delete->TestAmount->Visible) { // TestAmount ?>
		<td <?php echo $lab_profile_details_delete->TestAmount->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCount ?>_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount">
<span<?php echo $lab_profile_details_delete->TestAmount->viewAttributes() ?>><?php echo $lab_profile_details_delete->TestAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_profile_details_delete->Recordset->moveNext();
}
$lab_profile_details_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_profile_details_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_profile_details_delete->showPageFooter();
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
$lab_profile_details_delete->terminate();
?>