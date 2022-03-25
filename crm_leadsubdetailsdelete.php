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
$crm_leadsubdetails_delete = new crm_leadsubdetails_delete();

// Run the page
$crm_leadsubdetails_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadsubdetails_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcrm_leadsubdetailsdelete = currentForm = new ew.Form("fcrm_leadsubdetailsdelete", "delete");

// Form_CustomValidate event
fcrm_leadsubdetailsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadsubdetailsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leadsubdetails_delete->showPageHeader(); ?>
<?php
$crm_leadsubdetails_delete->showMessage();
?>
<form name="fcrm_leadsubdetailsdelete" id="fcrm_leadsubdetailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadsubdetails_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadsubdetails_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadsubdetails">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($crm_leadsubdetails_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($crm_leadsubdetails->leadsubscriptionid->Visible) { // leadsubscriptionid ?>
		<th class="<?php echo $crm_leadsubdetails->leadsubscriptionid->headerCellClass() ?>"><span id="elh_crm_leadsubdetails_leadsubscriptionid" class="crm_leadsubdetails_leadsubscriptionid"><?php echo $crm_leadsubdetails->leadsubscriptionid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadsubdetails->website->Visible) { // website ?>
		<th class="<?php echo $crm_leadsubdetails->website->headerCellClass() ?>"><span id="elh_crm_leadsubdetails_website" class="crm_leadsubdetails_website"><?php echo $crm_leadsubdetails->website->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$crm_leadsubdetails_delete->RecCnt = 0;
$i = 0;
while (!$crm_leadsubdetails_delete->Recordset->EOF) {
	$crm_leadsubdetails_delete->RecCnt++;
	$crm_leadsubdetails_delete->RowCnt++;

	// Set row properties
	$crm_leadsubdetails->resetAttributes();
	$crm_leadsubdetails->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$crm_leadsubdetails_delete->loadRowValues($crm_leadsubdetails_delete->Recordset);

	// Render row
	$crm_leadsubdetails_delete->renderRow();
?>
	<tr<?php echo $crm_leadsubdetails->rowAttributes() ?>>
<?php if ($crm_leadsubdetails->leadsubscriptionid->Visible) { // leadsubscriptionid ?>
		<td<?php echo $crm_leadsubdetails->leadsubscriptionid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsubdetails_delete->RowCnt ?>_crm_leadsubdetails_leadsubscriptionid" class="crm_leadsubdetails_leadsubscriptionid">
<span<?php echo $crm_leadsubdetails->leadsubscriptionid->viewAttributes() ?>>
<?php echo $crm_leadsubdetails->leadsubscriptionid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadsubdetails->website->Visible) { // website ?>
		<td<?php echo $crm_leadsubdetails->website->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsubdetails_delete->RowCnt ?>_crm_leadsubdetails_website" class="crm_leadsubdetails_website">
<span<?php echo $crm_leadsubdetails->website->viewAttributes() ?>>
<?php echo $crm_leadsubdetails->website->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$crm_leadsubdetails_delete->Recordset->moveNext();
}
$crm_leadsubdetails_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leadsubdetails_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$crm_leadsubdetails_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leadsubdetails_delete->terminate();
?>