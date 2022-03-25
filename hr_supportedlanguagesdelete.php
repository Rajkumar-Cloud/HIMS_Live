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
$hr_supportedlanguages_delete = new hr_supportedlanguages_delete();

// Run the page
$hr_supportedlanguages_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_supportedlanguages_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_supportedlanguagesdelete = currentForm = new ew.Form("fhr_supportedlanguagesdelete", "delete");

// Form_CustomValidate event
fhr_supportedlanguagesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_supportedlanguagesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_supportedlanguages_delete->showPageHeader(); ?>
<?php
$hr_supportedlanguages_delete->showMessage();
?>
<form name="fhr_supportedlanguagesdelete" id="fhr_supportedlanguagesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_supportedlanguages_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_supportedlanguages_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_supportedlanguages">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_supportedlanguages_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_supportedlanguages->id->Visible) { // id ?>
		<th class="<?php echo $hr_supportedlanguages->id->headerCellClass() ?>"><span id="elh_hr_supportedlanguages_id" class="hr_supportedlanguages_id"><?php echo $hr_supportedlanguages->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_supportedlanguages->name->Visible) { // name ?>
		<th class="<?php echo $hr_supportedlanguages->name->headerCellClass() ?>"><span id="elh_hr_supportedlanguages_name" class="hr_supportedlanguages_name"><?php echo $hr_supportedlanguages->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_supportedlanguages->description->Visible) { // description ?>
		<th class="<?php echo $hr_supportedlanguages->description->headerCellClass() ?>"><span id="elh_hr_supportedlanguages_description" class="hr_supportedlanguages_description"><?php echo $hr_supportedlanguages->description->caption() ?></span></th>
<?php } ?>
<?php if ($hr_supportedlanguages->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_supportedlanguages->HospID->headerCellClass() ?>"><span id="elh_hr_supportedlanguages_HospID" class="hr_supportedlanguages_HospID"><?php echo $hr_supportedlanguages->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_supportedlanguages_delete->RecCnt = 0;
$i = 0;
while (!$hr_supportedlanguages_delete->Recordset->EOF) {
	$hr_supportedlanguages_delete->RecCnt++;
	$hr_supportedlanguages_delete->RowCnt++;

	// Set row properties
	$hr_supportedlanguages->resetAttributes();
	$hr_supportedlanguages->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_supportedlanguages_delete->loadRowValues($hr_supportedlanguages_delete->Recordset);

	// Render row
	$hr_supportedlanguages_delete->renderRow();
?>
	<tr<?php echo $hr_supportedlanguages->rowAttributes() ?>>
<?php if ($hr_supportedlanguages->id->Visible) { // id ?>
		<td<?php echo $hr_supportedlanguages->id->cellAttributes() ?>>
<span id="el<?php echo $hr_supportedlanguages_delete->RowCnt ?>_hr_supportedlanguages_id" class="hr_supportedlanguages_id">
<span<?php echo $hr_supportedlanguages->id->viewAttributes() ?>>
<?php echo $hr_supportedlanguages->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_supportedlanguages->name->Visible) { // name ?>
		<td<?php echo $hr_supportedlanguages->name->cellAttributes() ?>>
<span id="el<?php echo $hr_supportedlanguages_delete->RowCnt ?>_hr_supportedlanguages_name" class="hr_supportedlanguages_name">
<span<?php echo $hr_supportedlanguages->name->viewAttributes() ?>>
<?php echo $hr_supportedlanguages->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_supportedlanguages->description->Visible) { // description ?>
		<td<?php echo $hr_supportedlanguages->description->cellAttributes() ?>>
<span id="el<?php echo $hr_supportedlanguages_delete->RowCnt ?>_hr_supportedlanguages_description" class="hr_supportedlanguages_description">
<span<?php echo $hr_supportedlanguages->description->viewAttributes() ?>>
<?php echo $hr_supportedlanguages->description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_supportedlanguages->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_supportedlanguages->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_supportedlanguages_delete->RowCnt ?>_hr_supportedlanguages_HospID" class="hr_supportedlanguages_HospID">
<span<?php echo $hr_supportedlanguages->HospID->viewAttributes() ?>>
<?php echo $hr_supportedlanguages->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_supportedlanguages_delete->Recordset->moveNext();
}
$hr_supportedlanguages_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_supportedlanguages_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_supportedlanguages_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_supportedlanguages_delete->terminate();
?>