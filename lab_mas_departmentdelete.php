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
$lab_mas_department_delete = new lab_mas_department_delete();

// Run the page
$lab_mas_department_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_mas_department_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flab_mas_departmentdelete = currentForm = new ew.Form("flab_mas_departmentdelete", "delete");

// Form_CustomValidate event
flab_mas_departmentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_mas_departmentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_mas_department_delete->showPageHeader(); ?>
<?php
$lab_mas_department_delete->showMessage();
?>
<form name="flab_mas_departmentdelete" id="flab_mas_departmentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_mas_department_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_mas_department_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_mas_department">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_mas_department_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_mas_department->id->Visible) { // id ?>
		<th class="<?php echo $lab_mas_department->id->headerCellClass() ?>"><span id="elh_lab_mas_department_id" class="lab_mas_department_id"><?php echo $lab_mas_department->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_mas_department->Department->Visible) { // Department ?>
		<th class="<?php echo $lab_mas_department->Department->headerCellClass() ?>"><span id="elh_lab_mas_department_Department" class="lab_mas_department_Department"><?php echo $lab_mas_department->Department->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_mas_department_delete->RecCnt = 0;
$i = 0;
while (!$lab_mas_department_delete->Recordset->EOF) {
	$lab_mas_department_delete->RecCnt++;
	$lab_mas_department_delete->RowCnt++;

	// Set row properties
	$lab_mas_department->resetAttributes();
	$lab_mas_department->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_mas_department_delete->loadRowValues($lab_mas_department_delete->Recordset);

	// Render row
	$lab_mas_department_delete->renderRow();
?>
	<tr<?php echo $lab_mas_department->rowAttributes() ?>>
<?php if ($lab_mas_department->id->Visible) { // id ?>
		<td<?php echo $lab_mas_department->id->cellAttributes() ?>>
<span id="el<?php echo $lab_mas_department_delete->RowCnt ?>_lab_mas_department_id" class="lab_mas_department_id">
<span<?php echo $lab_mas_department->id->viewAttributes() ?>>
<?php echo $lab_mas_department->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_mas_department->Department->Visible) { // Department ?>
		<td<?php echo $lab_mas_department->Department->cellAttributes() ?>>
<span id="el<?php echo $lab_mas_department_delete->RowCnt ?>_lab_mas_department_Department" class="lab_mas_department_Department">
<span<?php echo $lab_mas_department->Department->viewAttributes() ?>>
<?php echo $lab_mas_department->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_mas_department_delete->Recordset->moveNext();
}
$lab_mas_department_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_mas_department_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_mas_department_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_mas_department_delete->terminate();
?>