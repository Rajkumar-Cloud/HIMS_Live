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
$ivf_agency_delete = new ivf_agency_delete();

// Run the page
$ivf_agency_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_agency_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_agencydelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_agencydelete = currentForm = new ew.Form("fivf_agencydelete", "delete");
	loadjs.done("fivf_agencydelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_agency_delete->showPageHeader(); ?>
<?php
$ivf_agency_delete->showMessage();
?>
<form name="fivf_agencydelete" id="fivf_agencydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_agency">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_agency_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_agency_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_agency_delete->id->headerCellClass() ?>"><span id="elh_ivf_agency_id" class="ivf_agency_id"><?php echo $ivf_agency_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_agency_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_agency_delete->Name->headerCellClass() ?>"><span id="elh_ivf_agency_Name" class="ivf_agency_Name"><?php echo $ivf_agency_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_agency_delete->Street->Visible) { // Street ?>
		<th class="<?php echo $ivf_agency_delete->Street->headerCellClass() ?>"><span id="elh_ivf_agency_Street" class="ivf_agency_Street"><?php echo $ivf_agency_delete->Street->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_agency_delete->Town->Visible) { // Town ?>
		<th class="<?php echo $ivf_agency_delete->Town->headerCellClass() ?>"><span id="elh_ivf_agency_Town" class="ivf_agency_Town"><?php echo $ivf_agency_delete->Town->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_agency_delete->State->Visible) { // State ?>
		<th class="<?php echo $ivf_agency_delete->State->headerCellClass() ?>"><span id="elh_ivf_agency_State" class="ivf_agency_State"><?php echo $ivf_agency_delete->State->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_agency_delete->Pin->Visible) { // Pin ?>
		<th class="<?php echo $ivf_agency_delete->Pin->headerCellClass() ?>"><span id="elh_ivf_agency_Pin" class="ivf_agency_Pin"><?php echo $ivf_agency_delete->Pin->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_agency_delete->RecordCount = 0;
$i = 0;
while (!$ivf_agency_delete->Recordset->EOF) {
	$ivf_agency_delete->RecordCount++;
	$ivf_agency_delete->RowCount++;

	// Set row properties
	$ivf_agency->resetAttributes();
	$ivf_agency->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_agency_delete->loadRowValues($ivf_agency_delete->Recordset);

	// Render row
	$ivf_agency_delete->renderRow();
?>
	<tr <?php echo $ivf_agency->rowAttributes() ?>>
<?php if ($ivf_agency_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_agency_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCount ?>_ivf_agency_id" class="ivf_agency_id">
<span<?php echo $ivf_agency_delete->id->viewAttributes() ?>><?php echo $ivf_agency_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_agency_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_agency_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCount ?>_ivf_agency_Name" class="ivf_agency_Name">
<span<?php echo $ivf_agency_delete->Name->viewAttributes() ?>><?php echo $ivf_agency_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_agency_delete->Street->Visible) { // Street ?>
		<td <?php echo $ivf_agency_delete->Street->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCount ?>_ivf_agency_Street" class="ivf_agency_Street">
<span<?php echo $ivf_agency_delete->Street->viewAttributes() ?>><?php echo $ivf_agency_delete->Street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_agency_delete->Town->Visible) { // Town ?>
		<td <?php echo $ivf_agency_delete->Town->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCount ?>_ivf_agency_Town" class="ivf_agency_Town">
<span<?php echo $ivf_agency_delete->Town->viewAttributes() ?>><?php echo $ivf_agency_delete->Town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_agency_delete->State->Visible) { // State ?>
		<td <?php echo $ivf_agency_delete->State->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCount ?>_ivf_agency_State" class="ivf_agency_State">
<span<?php echo $ivf_agency_delete->State->viewAttributes() ?>><?php echo $ivf_agency_delete->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_agency_delete->Pin->Visible) { // Pin ?>
		<td <?php echo $ivf_agency_delete->Pin->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCount ?>_ivf_agency_Pin" class="ivf_agency_Pin">
<span<?php echo $ivf_agency_delete->Pin->viewAttributes() ?>><?php echo $ivf_agency_delete->Pin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_agency_delete->Recordset->moveNext();
}
$ivf_agency_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_agency_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_agency_delete->showPageFooter();
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
$ivf_agency_delete->terminate();
?>