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
$sys_certifications_delete = new sys_certifications_delete();

// Run the page
$sys_certifications_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_certifications_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsys_certificationsdelete = currentForm = new ew.Form("fsys_certificationsdelete", "delete");

// Form_CustomValidate event
fsys_certificationsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_certificationsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_certifications_delete->showPageHeader(); ?>
<?php
$sys_certifications_delete->showMessage();
?>
<form name="fsys_certificationsdelete" id="fsys_certificationsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_certifications_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_certifications_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_certifications">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_certifications_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_certifications->id->Visible) { // id ?>
		<th class="<?php echo $sys_certifications->id->headerCellClass() ?>"><span id="elh_sys_certifications_id" class="sys_certifications_id"><?php echo $sys_certifications->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_certifications->name->Visible) { // name ?>
		<th class="<?php echo $sys_certifications->name->headerCellClass() ?>"><span id="elh_sys_certifications_name" class="sys_certifications_name"><?php echo $sys_certifications->name->caption() ?></span></th>
<?php } ?>
<?php if ($sys_certifications->description->Visible) { // description ?>
		<th class="<?php echo $sys_certifications->description->headerCellClass() ?>"><span id="elh_sys_certifications_description" class="sys_certifications_description"><?php echo $sys_certifications->description->caption() ?></span></th>
<?php } ?>
<?php if ($sys_certifications->HospID->Visible) { // HospID ?>
		<th class="<?php echo $sys_certifications->HospID->headerCellClass() ?>"><span id="elh_sys_certifications_HospID" class="sys_certifications_HospID"><?php echo $sys_certifications->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_certifications_delete->RecCnt = 0;
$i = 0;
while (!$sys_certifications_delete->Recordset->EOF) {
	$sys_certifications_delete->RecCnt++;
	$sys_certifications_delete->RowCnt++;

	// Set row properties
	$sys_certifications->resetAttributes();
	$sys_certifications->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_certifications_delete->loadRowValues($sys_certifications_delete->Recordset);

	// Render row
	$sys_certifications_delete->renderRow();
?>
	<tr<?php echo $sys_certifications->rowAttributes() ?>>
<?php if ($sys_certifications->id->Visible) { // id ?>
		<td<?php echo $sys_certifications->id->cellAttributes() ?>>
<span id="el<?php echo $sys_certifications_delete->RowCnt ?>_sys_certifications_id" class="sys_certifications_id">
<span<?php echo $sys_certifications->id->viewAttributes() ?>>
<?php echo $sys_certifications->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_certifications->name->Visible) { // name ?>
		<td<?php echo $sys_certifications->name->cellAttributes() ?>>
<span id="el<?php echo $sys_certifications_delete->RowCnt ?>_sys_certifications_name" class="sys_certifications_name">
<span<?php echo $sys_certifications->name->viewAttributes() ?>>
<?php echo $sys_certifications->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_certifications->description->Visible) { // description ?>
		<td<?php echo $sys_certifications->description->cellAttributes() ?>>
<span id="el<?php echo $sys_certifications_delete->RowCnt ?>_sys_certifications_description" class="sys_certifications_description">
<span<?php echo $sys_certifications->description->viewAttributes() ?>>
<?php echo $sys_certifications->description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_certifications->HospID->Visible) { // HospID ?>
		<td<?php echo $sys_certifications->HospID->cellAttributes() ?>>
<span id="el<?php echo $sys_certifications_delete->RowCnt ?>_sys_certifications_HospID" class="sys_certifications_HospID">
<span<?php echo $sys_certifications->HospID->viewAttributes() ?>>
<?php echo $sys_certifications->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_certifications_delete->Recordset->moveNext();
}
$sys_certifications_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_certifications_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_certifications_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_certifications_delete->terminate();
?>