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
$ivf_oocytedenudation_stage_delete = new ivf_oocytedenudation_stage_delete();

// Run the page
$ivf_oocytedenudation_stage_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_stage_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_oocytedenudation_stagedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_oocytedenudation_stagedelete = currentForm = new ew.Form("fivf_oocytedenudation_stagedelete", "delete");
	loadjs.done("fivf_oocytedenudation_stagedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_oocytedenudation_stage_delete->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_stage_delete->showMessage();
?>
<form name="fivf_oocytedenudation_stagedelete" id="fivf_oocytedenudation_stagedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_oocytedenudation_stage_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_oocytedenudation_stage_delete->OocyteNo->Visible) { // OocyteNo ?>
		<th class="<?php echo $ivf_oocytedenudation_stage_delete->OocyteNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo"><?php echo $ivf_oocytedenudation_stage_delete->OocyteNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_delete->Stage->Visible) { // Stage ?>
		<th class="<?php echo $ivf_oocytedenudation_stage_delete->Stage->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage"><?php echo $ivf_oocytedenudation_stage_delete->Stage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_delete->ReMarks->Visible) { // ReMarks ?>
		<th class="<?php echo $ivf_oocytedenudation_stage_delete->ReMarks->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks"><?php echo $ivf_oocytedenudation_stage_delete->ReMarks->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_oocytedenudation_stage_delete->RecordCount = 0;
$i = 0;
while (!$ivf_oocytedenudation_stage_delete->Recordset->EOF) {
	$ivf_oocytedenudation_stage_delete->RecordCount++;
	$ivf_oocytedenudation_stage_delete->RowCount++;

	// Set row properties
	$ivf_oocytedenudation_stage->resetAttributes();
	$ivf_oocytedenudation_stage->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_oocytedenudation_stage_delete->loadRowValues($ivf_oocytedenudation_stage_delete->Recordset);

	// Render row
	$ivf_oocytedenudation_stage_delete->renderRow();
?>
	<tr <?php echo $ivf_oocytedenudation_stage->rowAttributes() ?>>
<?php if ($ivf_oocytedenudation_stage_delete->OocyteNo->Visible) { // OocyteNo ?>
		<td <?php echo $ivf_oocytedenudation_stage_delete->OocyteNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_stage_delete->RowCount ?>_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo">
<span<?php echo $ivf_oocytedenudation_stage_delete->OocyteNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_delete->OocyteNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_delete->Stage->Visible) { // Stage ?>
		<td <?php echo $ivf_oocytedenudation_stage_delete->Stage->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_stage_delete->RowCount ?>_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage">
<span<?php echo $ivf_oocytedenudation_stage_delete->Stage->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_delete->Stage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_delete->ReMarks->Visible) { // ReMarks ?>
		<td <?php echo $ivf_oocytedenudation_stage_delete->ReMarks->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_stage_delete->RowCount ?>_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks">
<span<?php echo $ivf_oocytedenudation_stage_delete->ReMarks->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_delete->ReMarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_oocytedenudation_stage_delete->Recordset->moveNext();
}
$ivf_oocytedenudation_stage_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_oocytedenudation_stage_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_oocytedenudation_stage_delete->showPageFooter();
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
$ivf_oocytedenudation_stage_delete->terminate();
?>