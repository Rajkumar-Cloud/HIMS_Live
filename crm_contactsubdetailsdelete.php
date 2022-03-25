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
$crm_contactsubdetails_delete = new crm_contactsubdetails_delete();

// Run the page
$crm_contactsubdetails_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_contactsubdetails_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcrm_contactsubdetailsdelete = currentForm = new ew.Form("fcrm_contactsubdetailsdelete", "delete");

// Form_CustomValidate event
fcrm_contactsubdetailsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_contactsubdetailsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_contactsubdetails_delete->showPageHeader(); ?>
<?php
$crm_contactsubdetails_delete->showMessage();
?>
<form name="fcrm_contactsubdetailsdelete" id="fcrm_contactsubdetailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_contactsubdetails_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_contactsubdetails_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_contactsubdetails">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($crm_contactsubdetails_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($crm_contactsubdetails->contactsubscriptionid->Visible) { // contactsubscriptionid ?>
		<th class="<?php echo $crm_contactsubdetails->contactsubscriptionid->headerCellClass() ?>"><span id="elh_crm_contactsubdetails_contactsubscriptionid" class="crm_contactsubdetails_contactsubscriptionid"><?php echo $crm_contactsubdetails->contactsubscriptionid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactsubdetails->birthday->Visible) { // birthday ?>
		<th class="<?php echo $crm_contactsubdetails->birthday->headerCellClass() ?>"><span id="elh_crm_contactsubdetails_birthday" class="crm_contactsubdetails_birthday"><?php echo $crm_contactsubdetails->birthday->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactsubdetails->laststayintouchrequest->Visible) { // laststayintouchrequest ?>
		<th class="<?php echo $crm_contactsubdetails->laststayintouchrequest->headerCellClass() ?>"><span id="elh_crm_contactsubdetails_laststayintouchrequest" class="crm_contactsubdetails_laststayintouchrequest"><?php echo $crm_contactsubdetails->laststayintouchrequest->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactsubdetails->laststayintouchsavedate->Visible) { // laststayintouchsavedate ?>
		<th class="<?php echo $crm_contactsubdetails->laststayintouchsavedate->headerCellClass() ?>"><span id="elh_crm_contactsubdetails_laststayintouchsavedate" class="crm_contactsubdetails_laststayintouchsavedate"><?php echo $crm_contactsubdetails->laststayintouchsavedate->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactsubdetails->leadsource->Visible) { // leadsource ?>
		<th class="<?php echo $crm_contactsubdetails->leadsource->headerCellClass() ?>"><span id="elh_crm_contactsubdetails_leadsource" class="crm_contactsubdetails_leadsource"><?php echo $crm_contactsubdetails->leadsource->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$crm_contactsubdetails_delete->RecCnt = 0;
$i = 0;
while (!$crm_contactsubdetails_delete->Recordset->EOF) {
	$crm_contactsubdetails_delete->RecCnt++;
	$crm_contactsubdetails_delete->RowCnt++;

	// Set row properties
	$crm_contactsubdetails->resetAttributes();
	$crm_contactsubdetails->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$crm_contactsubdetails_delete->loadRowValues($crm_contactsubdetails_delete->Recordset);

	// Render row
	$crm_contactsubdetails_delete->renderRow();
?>
	<tr<?php echo $crm_contactsubdetails->rowAttributes() ?>>
<?php if ($crm_contactsubdetails->contactsubscriptionid->Visible) { // contactsubscriptionid ?>
		<td<?php echo $crm_contactsubdetails->contactsubscriptionid->cellAttributes() ?>>
<span id="el<?php echo $crm_contactsubdetails_delete->RowCnt ?>_crm_contactsubdetails_contactsubscriptionid" class="crm_contactsubdetails_contactsubscriptionid">
<span<?php echo $crm_contactsubdetails->contactsubscriptionid->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->contactsubscriptionid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactsubdetails->birthday->Visible) { // birthday ?>
		<td<?php echo $crm_contactsubdetails->birthday->cellAttributes() ?>>
<span id="el<?php echo $crm_contactsubdetails_delete->RowCnt ?>_crm_contactsubdetails_birthday" class="crm_contactsubdetails_birthday">
<span<?php echo $crm_contactsubdetails->birthday->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->birthday->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactsubdetails->laststayintouchrequest->Visible) { // laststayintouchrequest ?>
		<td<?php echo $crm_contactsubdetails->laststayintouchrequest->cellAttributes() ?>>
<span id="el<?php echo $crm_contactsubdetails_delete->RowCnt ?>_crm_contactsubdetails_laststayintouchrequest" class="crm_contactsubdetails_laststayintouchrequest">
<span<?php echo $crm_contactsubdetails->laststayintouchrequest->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->laststayintouchrequest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactsubdetails->laststayintouchsavedate->Visible) { // laststayintouchsavedate ?>
		<td<?php echo $crm_contactsubdetails->laststayintouchsavedate->cellAttributes() ?>>
<span id="el<?php echo $crm_contactsubdetails_delete->RowCnt ?>_crm_contactsubdetails_laststayintouchsavedate" class="crm_contactsubdetails_laststayintouchsavedate">
<span<?php echo $crm_contactsubdetails->laststayintouchsavedate->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->laststayintouchsavedate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactsubdetails->leadsource->Visible) { // leadsource ?>
		<td<?php echo $crm_contactsubdetails->leadsource->cellAttributes() ?>>
<span id="el<?php echo $crm_contactsubdetails_delete->RowCnt ?>_crm_contactsubdetails_leadsource" class="crm_contactsubdetails_leadsource">
<span<?php echo $crm_contactsubdetails->leadsource->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->leadsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$crm_contactsubdetails_delete->Recordset->moveNext();
}
$crm_contactsubdetails_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_contactsubdetails_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$crm_contactsubdetails_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_contactsubdetails_delete->terminate();
?>