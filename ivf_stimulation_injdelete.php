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
$ivf_stimulation_inj_delete = new ivf_stimulation_inj_delete();

// Run the page
$ivf_stimulation_inj_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_inj_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_stimulation_injdelete = currentForm = new ew.Form("fivf_stimulation_injdelete", "delete");

// Form_CustomValidate event
fivf_stimulation_injdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_stimulation_injdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_stimulation_inj_delete->showPageHeader(); ?>
<?php
$ivf_stimulation_inj_delete->showMessage();
?>
<form name="fivf_stimulation_injdelete" id="fivf_stimulation_injdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_stimulation_inj_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_stimulation_inj_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_inj">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_stimulation_inj_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_stimulation_inj->id->Visible) { // id ?>
		<th class="<?php echo $ivf_stimulation_inj->id->headerCellClass() ?>"><span id="elh_ivf_stimulation_inj_id" class="ivf_stimulation_inj_id"><?php echo $ivf_stimulation_inj->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_inj->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_stimulation_inj->Name->headerCellClass() ?>"><span id="elh_ivf_stimulation_inj_Name" class="ivf_stimulation_inj_Name"><?php echo $ivf_stimulation_inj->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_stimulation_inj_delete->RecCnt = 0;
$i = 0;
while (!$ivf_stimulation_inj_delete->Recordset->EOF) {
	$ivf_stimulation_inj_delete->RecCnt++;
	$ivf_stimulation_inj_delete->RowCnt++;

	// Set row properties
	$ivf_stimulation_inj->resetAttributes();
	$ivf_stimulation_inj->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_stimulation_inj_delete->loadRowValues($ivf_stimulation_inj_delete->Recordset);

	// Render row
	$ivf_stimulation_inj_delete->renderRow();
?>
	<tr<?php echo $ivf_stimulation_inj->rowAttributes() ?>>
<?php if ($ivf_stimulation_inj->id->Visible) { // id ?>
		<td<?php echo $ivf_stimulation_inj->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_inj_delete->RowCnt ?>_ivf_stimulation_inj_id" class="ivf_stimulation_inj_id">
<span<?php echo $ivf_stimulation_inj->id->viewAttributes() ?>>
<?php echo $ivf_stimulation_inj->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_inj->Name->Visible) { // Name ?>
		<td<?php echo $ivf_stimulation_inj->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_inj_delete->RowCnt ?>_ivf_stimulation_inj_Name" class="ivf_stimulation_inj_Name">
<span<?php echo $ivf_stimulation_inj->Name->viewAttributes() ?>>
<?php echo $ivf_stimulation_inj->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_stimulation_inj_delete->Recordset->moveNext();
}
$ivf_stimulation_inj_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_stimulation_inj_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_stimulation_inj_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_stimulation_inj_delete->terminate();
?>