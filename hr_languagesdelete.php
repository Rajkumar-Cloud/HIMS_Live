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
$hr_languages_delete = new hr_languages_delete();

// Run the page
$hr_languages_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_languages_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_languagesdelete = currentForm = new ew.Form("fhr_languagesdelete", "delete");

// Form_CustomValidate event
fhr_languagesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_languagesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_languages_delete->showPageHeader(); ?>
<?php
$hr_languages_delete->showMessage();
?>
<form name="fhr_languagesdelete" id="fhr_languagesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_languages_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_languages_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_languages">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_languages_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_languages->id->Visible) { // id ?>
		<th class="<?php echo $hr_languages->id->headerCellClass() ?>"><span id="elh_hr_languages_id" class="hr_languages_id"><?php echo $hr_languages->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_languages->name->Visible) { // name ?>
		<th class="<?php echo $hr_languages->name->headerCellClass() ?>"><span id="elh_hr_languages_name" class="hr_languages_name"><?php echo $hr_languages->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_languages->description->Visible) { // description ?>
		<th class="<?php echo $hr_languages->description->headerCellClass() ?>"><span id="elh_hr_languages_description" class="hr_languages_description"><?php echo $hr_languages->description->caption() ?></span></th>
<?php } ?>
<?php if ($hr_languages->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_languages->HospID->headerCellClass() ?>"><span id="elh_hr_languages_HospID" class="hr_languages_HospID"><?php echo $hr_languages->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_languages_delete->RecCnt = 0;
$i = 0;
while (!$hr_languages_delete->Recordset->EOF) {
	$hr_languages_delete->RecCnt++;
	$hr_languages_delete->RowCnt++;

	// Set row properties
	$hr_languages->resetAttributes();
	$hr_languages->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_languages_delete->loadRowValues($hr_languages_delete->Recordset);

	// Render row
	$hr_languages_delete->renderRow();
?>
	<tr<?php echo $hr_languages->rowAttributes() ?>>
<?php if ($hr_languages->id->Visible) { // id ?>
		<td<?php echo $hr_languages->id->cellAttributes() ?>>
<span id="el<?php echo $hr_languages_delete->RowCnt ?>_hr_languages_id" class="hr_languages_id">
<span<?php echo $hr_languages->id->viewAttributes() ?>>
<?php echo $hr_languages->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_languages->name->Visible) { // name ?>
		<td<?php echo $hr_languages->name->cellAttributes() ?>>
<span id="el<?php echo $hr_languages_delete->RowCnt ?>_hr_languages_name" class="hr_languages_name">
<span<?php echo $hr_languages->name->viewAttributes() ?>>
<?php echo $hr_languages->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_languages->description->Visible) { // description ?>
		<td<?php echo $hr_languages->description->cellAttributes() ?>>
<span id="el<?php echo $hr_languages_delete->RowCnt ?>_hr_languages_description" class="hr_languages_description">
<span<?php echo $hr_languages->description->viewAttributes() ?>>
<?php echo $hr_languages->description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_languages->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_languages->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_languages_delete->RowCnt ?>_hr_languages_HospID" class="hr_languages_HospID">
<span<?php echo $hr_languages->HospID->viewAttributes() ?>>
<?php echo $hr_languages->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_languages_delete->Recordset->moveNext();
}
$hr_languages_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_languages_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_languages_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_languages_delete->terminate();
?>