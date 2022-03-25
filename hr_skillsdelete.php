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
$hr_skills_delete = new hr_skills_delete();

// Run the page
$hr_skills_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_skills_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_skillsdelete = currentForm = new ew.Form("fhr_skillsdelete", "delete");

// Form_CustomValidate event
fhr_skillsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_skillsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_skills_delete->showPageHeader(); ?>
<?php
$hr_skills_delete->showMessage();
?>
<form name="fhr_skillsdelete" id="fhr_skillsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_skills_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_skills_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_skills">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_skills_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_skills->id->Visible) { // id ?>
		<th class="<?php echo $hr_skills->id->headerCellClass() ?>"><span id="elh_hr_skills_id" class="hr_skills_id"><?php echo $hr_skills->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_skills->name->Visible) { // name ?>
		<th class="<?php echo $hr_skills->name->headerCellClass() ?>"><span id="elh_hr_skills_name" class="hr_skills_name"><?php echo $hr_skills->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_skills->description->Visible) { // description ?>
		<th class="<?php echo $hr_skills->description->headerCellClass() ?>"><span id="elh_hr_skills_description" class="hr_skills_description"><?php echo $hr_skills->description->caption() ?></span></th>
<?php } ?>
<?php if ($hr_skills->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_skills->HospID->headerCellClass() ?>"><span id="elh_hr_skills_HospID" class="hr_skills_HospID"><?php echo $hr_skills->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_skills_delete->RecCnt = 0;
$i = 0;
while (!$hr_skills_delete->Recordset->EOF) {
	$hr_skills_delete->RecCnt++;
	$hr_skills_delete->RowCnt++;

	// Set row properties
	$hr_skills->resetAttributes();
	$hr_skills->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_skills_delete->loadRowValues($hr_skills_delete->Recordset);

	// Render row
	$hr_skills_delete->renderRow();
?>
	<tr<?php echo $hr_skills->rowAttributes() ?>>
<?php if ($hr_skills->id->Visible) { // id ?>
		<td<?php echo $hr_skills->id->cellAttributes() ?>>
<span id="el<?php echo $hr_skills_delete->RowCnt ?>_hr_skills_id" class="hr_skills_id">
<span<?php echo $hr_skills->id->viewAttributes() ?>>
<?php echo $hr_skills->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_skills->name->Visible) { // name ?>
		<td<?php echo $hr_skills->name->cellAttributes() ?>>
<span id="el<?php echo $hr_skills_delete->RowCnt ?>_hr_skills_name" class="hr_skills_name">
<span<?php echo $hr_skills->name->viewAttributes() ?>>
<?php echo $hr_skills->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_skills->description->Visible) { // description ?>
		<td<?php echo $hr_skills->description->cellAttributes() ?>>
<span id="el<?php echo $hr_skills_delete->RowCnt ?>_hr_skills_description" class="hr_skills_description">
<span<?php echo $hr_skills->description->viewAttributes() ?>>
<?php echo $hr_skills->description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_skills->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_skills->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_skills_delete->RowCnt ?>_hr_skills_HospID" class="hr_skills_HospID">
<span<?php echo $hr_skills->HospID->viewAttributes() ?>>
<?php echo $hr_skills->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_skills_delete->Recordset->moveNext();
}
$hr_skills_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_skills_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_skills_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_skills_delete->terminate();
?>