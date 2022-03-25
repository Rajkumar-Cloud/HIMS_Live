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
$lab_unit_mast_delete = new lab_unit_mast_delete();

// Run the page
$lab_unit_mast_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_unit_mast_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flab_unit_mastdelete = currentForm = new ew.Form("flab_unit_mastdelete", "delete");

// Form_CustomValidate event
flab_unit_mastdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_unit_mastdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_unit_mast_delete->showPageHeader(); ?>
<?php
$lab_unit_mast_delete->showMessage();
?>
<form name="flab_unit_mastdelete" id="flab_unit_mastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_unit_mast_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_unit_mast_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_unit_mast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_unit_mast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_unit_mast->id->Visible) { // id ?>
		<th class="<?php echo $lab_unit_mast->id->headerCellClass() ?>"><span id="elh_lab_unit_mast_id" class="lab_unit_mast_id"><?php echo $lab_unit_mast->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_unit_mast->Code->Visible) { // Code ?>
		<th class="<?php echo $lab_unit_mast->Code->headerCellClass() ?>"><span id="elh_lab_unit_mast_Code" class="lab_unit_mast_Code"><?php echo $lab_unit_mast->Code->caption() ?></span></th>
<?php } ?>
<?php if ($lab_unit_mast->Name->Visible) { // Name ?>
		<th class="<?php echo $lab_unit_mast->Name->headerCellClass() ?>"><span id="elh_lab_unit_mast_Name" class="lab_unit_mast_Name"><?php echo $lab_unit_mast->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_unit_mast_delete->RecCnt = 0;
$i = 0;
while (!$lab_unit_mast_delete->Recordset->EOF) {
	$lab_unit_mast_delete->RecCnt++;
	$lab_unit_mast_delete->RowCnt++;

	// Set row properties
	$lab_unit_mast->resetAttributes();
	$lab_unit_mast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_unit_mast_delete->loadRowValues($lab_unit_mast_delete->Recordset);

	// Render row
	$lab_unit_mast_delete->renderRow();
?>
	<tr<?php echo $lab_unit_mast->rowAttributes() ?>>
<?php if ($lab_unit_mast->id->Visible) { // id ?>
		<td<?php echo $lab_unit_mast->id->cellAttributes() ?>>
<span id="el<?php echo $lab_unit_mast_delete->RowCnt ?>_lab_unit_mast_id" class="lab_unit_mast_id">
<span<?php echo $lab_unit_mast->id->viewAttributes() ?>>
<?php echo $lab_unit_mast->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_unit_mast->Code->Visible) { // Code ?>
		<td<?php echo $lab_unit_mast->Code->cellAttributes() ?>>
<span id="el<?php echo $lab_unit_mast_delete->RowCnt ?>_lab_unit_mast_Code" class="lab_unit_mast_Code">
<span<?php echo $lab_unit_mast->Code->viewAttributes() ?>>
<?php echo $lab_unit_mast->Code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_unit_mast->Name->Visible) { // Name ?>
		<td<?php echo $lab_unit_mast->Name->cellAttributes() ?>>
<span id="el<?php echo $lab_unit_mast_delete->RowCnt ?>_lab_unit_mast_Name" class="lab_unit_mast_Name">
<span<?php echo $lab_unit_mast->Name->viewAttributes() ?>>
<?php echo $lab_unit_mast->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_unit_mast_delete->Recordset->moveNext();
}
$lab_unit_mast_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_unit_mast_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_unit_mast_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_unit_mast_delete->terminate();
?>