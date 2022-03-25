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
$hr_salarycomponenttype_delete = new hr_salarycomponenttype_delete();

// Run the page
$hr_salarycomponenttype_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_salarycomponenttype_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_salarycomponenttypedelete = currentForm = new ew.Form("fhr_salarycomponenttypedelete", "delete");

// Form_CustomValidate event
fhr_salarycomponenttypedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_salarycomponenttypedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_salarycomponenttype_delete->showPageHeader(); ?>
<?php
$hr_salarycomponenttype_delete->showMessage();
?>
<form name="fhr_salarycomponenttypedelete" id="fhr_salarycomponenttypedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_salarycomponenttype_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_salarycomponenttype_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_salarycomponenttype">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_salarycomponenttype_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_salarycomponenttype->id->Visible) { // id ?>
		<th class="<?php echo $hr_salarycomponenttype->id->headerCellClass() ?>"><span id="elh_hr_salarycomponenttype_id" class="hr_salarycomponenttype_id"><?php echo $hr_salarycomponenttype->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_salarycomponenttype->code->Visible) { // code ?>
		<th class="<?php echo $hr_salarycomponenttype->code->headerCellClass() ?>"><span id="elh_hr_salarycomponenttype_code" class="hr_salarycomponenttype_code"><?php echo $hr_salarycomponenttype->code->caption() ?></span></th>
<?php } ?>
<?php if ($hr_salarycomponenttype->name->Visible) { // name ?>
		<th class="<?php echo $hr_salarycomponenttype->name->headerCellClass() ?>"><span id="elh_hr_salarycomponenttype_name" class="hr_salarycomponenttype_name"><?php echo $hr_salarycomponenttype->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_salarycomponenttype->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_salarycomponenttype->HospID->headerCellClass() ?>"><span id="elh_hr_salarycomponenttype_HospID" class="hr_salarycomponenttype_HospID"><?php echo $hr_salarycomponenttype->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_salarycomponenttype_delete->RecCnt = 0;
$i = 0;
while (!$hr_salarycomponenttype_delete->Recordset->EOF) {
	$hr_salarycomponenttype_delete->RecCnt++;
	$hr_salarycomponenttype_delete->RowCnt++;

	// Set row properties
	$hr_salarycomponenttype->resetAttributes();
	$hr_salarycomponenttype->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_salarycomponenttype_delete->loadRowValues($hr_salarycomponenttype_delete->Recordset);

	// Render row
	$hr_salarycomponenttype_delete->renderRow();
?>
	<tr<?php echo $hr_salarycomponenttype->rowAttributes() ?>>
<?php if ($hr_salarycomponenttype->id->Visible) { // id ?>
		<td<?php echo $hr_salarycomponenttype->id->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponenttype_delete->RowCnt ?>_hr_salarycomponenttype_id" class="hr_salarycomponenttype_id">
<span<?php echo $hr_salarycomponenttype->id->viewAttributes() ?>>
<?php echo $hr_salarycomponenttype->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_salarycomponenttype->code->Visible) { // code ?>
		<td<?php echo $hr_salarycomponenttype->code->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponenttype_delete->RowCnt ?>_hr_salarycomponenttype_code" class="hr_salarycomponenttype_code">
<span<?php echo $hr_salarycomponenttype->code->viewAttributes() ?>>
<?php echo $hr_salarycomponenttype->code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_salarycomponenttype->name->Visible) { // name ?>
		<td<?php echo $hr_salarycomponenttype->name->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponenttype_delete->RowCnt ?>_hr_salarycomponenttype_name" class="hr_salarycomponenttype_name">
<span<?php echo $hr_salarycomponenttype->name->viewAttributes() ?>>
<?php echo $hr_salarycomponenttype->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_salarycomponenttype->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_salarycomponenttype->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponenttype_delete->RowCnt ?>_hr_salarycomponenttype_HospID" class="hr_salarycomponenttype_HospID">
<span<?php echo $hr_salarycomponenttype->HospID->viewAttributes() ?>>
<?php echo $hr_salarycomponenttype->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_salarycomponenttype_delete->Recordset->moveNext();
}
$hr_salarycomponenttype_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_salarycomponenttype_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_salarycomponenttype_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_salarycomponenttype_delete->terminate();
?>