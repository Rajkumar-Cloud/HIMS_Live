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
$mas_clinicaldetails_delete = new mas_clinicaldetails_delete();

// Run the page
$mas_clinicaldetails_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_clinicaldetails_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_clinicaldetailsdelete = currentForm = new ew.Form("fmas_clinicaldetailsdelete", "delete");

// Form_CustomValidate event
fmas_clinicaldetailsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_clinicaldetailsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_clinicaldetails_delete->showPageHeader(); ?>
<?php
$mas_clinicaldetails_delete->showMessage();
?>
<form name="fmas_clinicaldetailsdelete" id="fmas_clinicaldetailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_clinicaldetails_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_clinicaldetails_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_clinicaldetails">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_clinicaldetails_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_clinicaldetails->id->Visible) { // id ?>
		<th class="<?php echo $mas_clinicaldetails->id->headerCellClass() ?>"><span id="elh_mas_clinicaldetails_id" class="mas_clinicaldetails_id"><?php echo $mas_clinicaldetails->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_clinicaldetails->ClinicalDetails->Visible) { // ClinicalDetails ?>
		<th class="<?php echo $mas_clinicaldetails->ClinicalDetails->headerCellClass() ?>"><span id="elh_mas_clinicaldetails_ClinicalDetails" class="mas_clinicaldetails_ClinicalDetails"><?php echo $mas_clinicaldetails->ClinicalDetails->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_clinicaldetails_delete->RecCnt = 0;
$i = 0;
while (!$mas_clinicaldetails_delete->Recordset->EOF) {
	$mas_clinicaldetails_delete->RecCnt++;
	$mas_clinicaldetails_delete->RowCnt++;

	// Set row properties
	$mas_clinicaldetails->resetAttributes();
	$mas_clinicaldetails->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_clinicaldetails_delete->loadRowValues($mas_clinicaldetails_delete->Recordset);

	// Render row
	$mas_clinicaldetails_delete->renderRow();
?>
	<tr<?php echo $mas_clinicaldetails->rowAttributes() ?>>
<?php if ($mas_clinicaldetails->id->Visible) { // id ?>
		<td<?php echo $mas_clinicaldetails->id->cellAttributes() ?>>
<span id="el<?php echo $mas_clinicaldetails_delete->RowCnt ?>_mas_clinicaldetails_id" class="mas_clinicaldetails_id">
<span<?php echo $mas_clinicaldetails->id->viewAttributes() ?>>
<?php echo $mas_clinicaldetails->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_clinicaldetails->ClinicalDetails->Visible) { // ClinicalDetails ?>
		<td<?php echo $mas_clinicaldetails->ClinicalDetails->cellAttributes() ?>>
<span id="el<?php echo $mas_clinicaldetails_delete->RowCnt ?>_mas_clinicaldetails_ClinicalDetails" class="mas_clinicaldetails_ClinicalDetails">
<span<?php echo $mas_clinicaldetails->ClinicalDetails->viewAttributes() ?>>
<?php echo $mas_clinicaldetails->ClinicalDetails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_clinicaldetails_delete->Recordset->moveNext();
}
$mas_clinicaldetails_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_clinicaldetails_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_clinicaldetails_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_clinicaldetails_delete->terminate();
?>