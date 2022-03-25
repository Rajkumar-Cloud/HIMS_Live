<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_oocytedenudation_stagedelete = currentForm = new ew.Form("fivf_oocytedenudation_stagedelete", "delete");

// Form_CustomValidate event
fivf_oocytedenudation_stagedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_oocytedenudation_stagedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_oocytedenudation_stagedelete.lists["x_Stage"] = <?php echo $ivf_oocytedenudation_stage_delete->Stage->Lookup->toClientList() ?>;
fivf_oocytedenudation_stagedelete.lists["x_Stage"].options = <?php echo JsonEncode($ivf_oocytedenudation_stage_delete->Stage->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_oocytedenudation_stage_delete->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_stage_delete->showMessage();
?>
<form name="fivf_oocytedenudation_stagedelete" id="fivf_oocytedenudation_stagedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_oocytedenudation_stage_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_oocytedenudation_stage_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_oocytedenudation_stage_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
		<th class="<?php echo $ivf_oocytedenudation_stage->OocyteNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo"><?php echo $ivf_oocytedenudation_stage->OocyteNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
		<th class="<?php echo $ivf_oocytedenudation_stage->Stage->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage"><?php echo $ivf_oocytedenudation_stage->Stage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
		<th class="<?php echo $ivf_oocytedenudation_stage->ReMarks->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks"><?php echo $ivf_oocytedenudation_stage->ReMarks->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_oocytedenudation_stage_delete->RecCnt = 0;
$i = 0;
while (!$ivf_oocytedenudation_stage_delete->Recordset->EOF) {
	$ivf_oocytedenudation_stage_delete->RecCnt++;
	$ivf_oocytedenudation_stage_delete->RowCnt++;

	// Set row properties
	$ivf_oocytedenudation_stage->resetAttributes();
	$ivf_oocytedenudation_stage->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_oocytedenudation_stage_delete->loadRowValues($ivf_oocytedenudation_stage_delete->Recordset);

	// Render row
	$ivf_oocytedenudation_stage_delete->renderRow();
?>
	<tr<?php echo $ivf_oocytedenudation_stage->rowAttributes() ?>>
<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
		<td<?php echo $ivf_oocytedenudation_stage->OocyteNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_stage_delete->RowCnt ?>_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo">
<span<?php echo $ivf_oocytedenudation_stage->OocyteNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->OocyteNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
		<td<?php echo $ivf_oocytedenudation_stage->Stage->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_stage_delete->RowCnt ?>_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage">
<span<?php echo $ivf_oocytedenudation_stage->Stage->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->Stage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
		<td<?php echo $ivf_oocytedenudation_stage->ReMarks->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_stage_delete->RowCnt ?>_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks">
<span<?php echo $ivf_oocytedenudation_stage->ReMarks->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->ReMarks->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_oocytedenudation_stage_delete->terminate();
?>