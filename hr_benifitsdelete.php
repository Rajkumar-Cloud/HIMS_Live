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
$hr_benifits_delete = new hr_benifits_delete();

// Run the page
$hr_benifits_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_benifits_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_benifitsdelete = currentForm = new ew.Form("fhr_benifitsdelete", "delete");

// Form_CustomValidate event
fhr_benifitsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_benifitsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_benifits_delete->showPageHeader(); ?>
<?php
$hr_benifits_delete->showMessage();
?>
<form name="fhr_benifitsdelete" id="fhr_benifitsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_benifits_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_benifits_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_benifits">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_benifits_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_benifits->id->Visible) { // id ?>
		<th class="<?php echo $hr_benifits->id->headerCellClass() ?>"><span id="elh_hr_benifits_id" class="hr_benifits_id"><?php echo $hr_benifits->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_benifits->name->Visible) { // name ?>
		<th class="<?php echo $hr_benifits->name->headerCellClass() ?>"><span id="elh_hr_benifits_name" class="hr_benifits_name"><?php echo $hr_benifits->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_benifits->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_benifits->HospID->headerCellClass() ?>"><span id="elh_hr_benifits_HospID" class="hr_benifits_HospID"><?php echo $hr_benifits->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_benifits_delete->RecCnt = 0;
$i = 0;
while (!$hr_benifits_delete->Recordset->EOF) {
	$hr_benifits_delete->RecCnt++;
	$hr_benifits_delete->RowCnt++;

	// Set row properties
	$hr_benifits->resetAttributes();
	$hr_benifits->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_benifits_delete->loadRowValues($hr_benifits_delete->Recordset);

	// Render row
	$hr_benifits_delete->renderRow();
?>
	<tr<?php echo $hr_benifits->rowAttributes() ?>>
<?php if ($hr_benifits->id->Visible) { // id ?>
		<td<?php echo $hr_benifits->id->cellAttributes() ?>>
<span id="el<?php echo $hr_benifits_delete->RowCnt ?>_hr_benifits_id" class="hr_benifits_id">
<span<?php echo $hr_benifits->id->viewAttributes() ?>>
<?php echo $hr_benifits->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_benifits->name->Visible) { // name ?>
		<td<?php echo $hr_benifits->name->cellAttributes() ?>>
<span id="el<?php echo $hr_benifits_delete->RowCnt ?>_hr_benifits_name" class="hr_benifits_name">
<span<?php echo $hr_benifits->name->viewAttributes() ?>>
<?php echo $hr_benifits->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_benifits->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_benifits->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_benifits_delete->RowCnt ?>_hr_benifits_HospID" class="hr_benifits_HospID">
<span<?php echo $hr_benifits->HospID->viewAttributes() ?>>
<?php echo $hr_benifits->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_benifits_delete->Recordset->moveNext();
}
$hr_benifits_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_benifits_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_benifits_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_benifits_delete->terminate();
?>