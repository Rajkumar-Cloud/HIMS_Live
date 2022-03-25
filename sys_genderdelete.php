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
$sys_gender_delete = new sys_gender_delete();

// Run the page
$sys_gender_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_gender_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsys_genderdelete = currentForm = new ew.Form("fsys_genderdelete", "delete");

// Form_CustomValidate event
fsys_genderdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_genderdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_gender_delete->showPageHeader(); ?>
<?php
$sys_gender_delete->showMessage();
?>
<form name="fsys_genderdelete" id="fsys_genderdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_gender_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_gender_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_gender">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_gender_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_gender->id->Visible) { // id ?>
		<th class="<?php echo $sys_gender->id->headerCellClass() ?>"><span id="elh_sys_gender_id" class="sys_gender_id"><?php echo $sys_gender->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_gender->Name->Visible) { // Name ?>
		<th class="<?php echo $sys_gender->Name->headerCellClass() ?>"><span id="elh_sys_gender_Name" class="sys_gender_Name"><?php echo $sys_gender->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_gender_delete->RecCnt = 0;
$i = 0;
while (!$sys_gender_delete->Recordset->EOF) {
	$sys_gender_delete->RecCnt++;
	$sys_gender_delete->RowCnt++;

	// Set row properties
	$sys_gender->resetAttributes();
	$sys_gender->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_gender_delete->loadRowValues($sys_gender_delete->Recordset);

	// Render row
	$sys_gender_delete->renderRow();
?>
	<tr<?php echo $sys_gender->rowAttributes() ?>>
<?php if ($sys_gender->id->Visible) { // id ?>
		<td<?php echo $sys_gender->id->cellAttributes() ?>>
<span id="el<?php echo $sys_gender_delete->RowCnt ?>_sys_gender_id" class="sys_gender_id">
<span<?php echo $sys_gender->id->viewAttributes() ?>>
<?php echo $sys_gender->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_gender->Name->Visible) { // Name ?>
		<td<?php echo $sys_gender->Name->cellAttributes() ?>>
<span id="el<?php echo $sys_gender_delete->RowCnt ?>_sys_gender_Name" class="sys_gender_Name">
<span<?php echo $sys_gender->Name->viewAttributes() ?>>
<?php echo $sys_gender->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_gender_delete->Recordset->moveNext();
}
$sys_gender_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_gender_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_gender_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_gender_delete->terminate();
?>