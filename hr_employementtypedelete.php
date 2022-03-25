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
$hr_employementtype_delete = new hr_employementtype_delete();

// Run the page
$hr_employementtype_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_employementtype_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_employementtypedelete = currentForm = new ew.Form("fhr_employementtypedelete", "delete");

// Form_CustomValidate event
fhr_employementtypedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_employementtypedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_employementtype_delete->showPageHeader(); ?>
<?php
$hr_employementtype_delete->showMessage();
?>
<form name="fhr_employementtypedelete" id="fhr_employementtypedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_employementtype_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_employementtype_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_employementtype">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_employementtype_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_employementtype->id->Visible) { // id ?>
		<th class="<?php echo $hr_employementtype->id->headerCellClass() ?>"><span id="elh_hr_employementtype_id" class="hr_employementtype_id"><?php echo $hr_employementtype->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_employementtype->name->Visible) { // name ?>
		<th class="<?php echo $hr_employementtype->name->headerCellClass() ?>"><span id="elh_hr_employementtype_name" class="hr_employementtype_name"><?php echo $hr_employementtype->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_employementtype->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_employementtype->HospID->headerCellClass() ?>"><span id="elh_hr_employementtype_HospID" class="hr_employementtype_HospID"><?php echo $hr_employementtype->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_employementtype_delete->RecCnt = 0;
$i = 0;
while (!$hr_employementtype_delete->Recordset->EOF) {
	$hr_employementtype_delete->RecCnt++;
	$hr_employementtype_delete->RowCnt++;

	// Set row properties
	$hr_employementtype->resetAttributes();
	$hr_employementtype->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_employementtype_delete->loadRowValues($hr_employementtype_delete->Recordset);

	// Render row
	$hr_employementtype_delete->renderRow();
?>
	<tr<?php echo $hr_employementtype->rowAttributes() ?>>
<?php if ($hr_employementtype->id->Visible) { // id ?>
		<td<?php echo $hr_employementtype->id->cellAttributes() ?>>
<span id="el<?php echo $hr_employementtype_delete->RowCnt ?>_hr_employementtype_id" class="hr_employementtype_id">
<span<?php echo $hr_employementtype->id->viewAttributes() ?>>
<?php echo $hr_employementtype->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_employementtype->name->Visible) { // name ?>
		<td<?php echo $hr_employementtype->name->cellAttributes() ?>>
<span id="el<?php echo $hr_employementtype_delete->RowCnt ?>_hr_employementtype_name" class="hr_employementtype_name">
<span<?php echo $hr_employementtype->name->viewAttributes() ?>>
<?php echo $hr_employementtype->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_employementtype->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_employementtype->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_employementtype_delete->RowCnt ?>_hr_employementtype_HospID" class="hr_employementtype_HospID">
<span<?php echo $hr_employementtype->HospID->viewAttributes() ?>>
<?php echo $hr_employementtype->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_employementtype_delete->Recordset->moveNext();
}
$hr_employementtype_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_employementtype_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_employementtype_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_employementtype_delete->terminate();
?>