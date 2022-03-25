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
$hr_clients_delete = new hr_clients_delete();

// Run the page
$hr_clients_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_clients_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_clientsdelete = currentForm = new ew.Form("fhr_clientsdelete", "delete");

// Form_CustomValidate event
fhr_clientsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_clientsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_clientsdelete.lists["x_status"] = <?php echo $hr_clients_delete->status->Lookup->toClientList() ?>;
fhr_clientsdelete.lists["x_status"].options = <?php echo JsonEncode($hr_clients_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_clients_delete->showPageHeader(); ?>
<?php
$hr_clients_delete->showMessage();
?>
<form name="fhr_clientsdelete" id="fhr_clientsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_clients_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_clients_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_clients">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_clients_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_clients->id->Visible) { // id ?>
		<th class="<?php echo $hr_clients->id->headerCellClass() ?>"><span id="elh_hr_clients_id" class="hr_clients_id"><?php echo $hr_clients->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_clients->name->Visible) { // name ?>
		<th class="<?php echo $hr_clients->name->headerCellClass() ?>"><span id="elh_hr_clients_name" class="hr_clients_name"><?php echo $hr_clients->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_clients->first_contact_date->Visible) { // first_contact_date ?>
		<th class="<?php echo $hr_clients->first_contact_date->headerCellClass() ?>"><span id="elh_hr_clients_first_contact_date" class="hr_clients_first_contact_date"><?php echo $hr_clients->first_contact_date->caption() ?></span></th>
<?php } ?>
<?php if ($hr_clients->created->Visible) { // created ?>
		<th class="<?php echo $hr_clients->created->headerCellClass() ?>"><span id="elh_hr_clients_created" class="hr_clients_created"><?php echo $hr_clients->created->caption() ?></span></th>
<?php } ?>
<?php if ($hr_clients->contact_number->Visible) { // contact_number ?>
		<th class="<?php echo $hr_clients->contact_number->headerCellClass() ?>"><span id="elh_hr_clients_contact_number" class="hr_clients_contact_number"><?php echo $hr_clients->contact_number->caption() ?></span></th>
<?php } ?>
<?php if ($hr_clients->contact_email->Visible) { // contact_email ?>
		<th class="<?php echo $hr_clients->contact_email->headerCellClass() ?>"><span id="elh_hr_clients_contact_email" class="hr_clients_contact_email"><?php echo $hr_clients->contact_email->caption() ?></span></th>
<?php } ?>
<?php if ($hr_clients->status->Visible) { // status ?>
		<th class="<?php echo $hr_clients->status->headerCellClass() ?>"><span id="elh_hr_clients_status" class="hr_clients_status"><?php echo $hr_clients->status->caption() ?></span></th>
<?php } ?>
<?php if ($hr_clients->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_clients->HospID->headerCellClass() ?>"><span id="elh_hr_clients_HospID" class="hr_clients_HospID"><?php echo $hr_clients->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_clients_delete->RecCnt = 0;
$i = 0;
while (!$hr_clients_delete->Recordset->EOF) {
	$hr_clients_delete->RecCnt++;
	$hr_clients_delete->RowCnt++;

	// Set row properties
	$hr_clients->resetAttributes();
	$hr_clients->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_clients_delete->loadRowValues($hr_clients_delete->Recordset);

	// Render row
	$hr_clients_delete->renderRow();
?>
	<tr<?php echo $hr_clients->rowAttributes() ?>>
<?php if ($hr_clients->id->Visible) { // id ?>
		<td<?php echo $hr_clients->id->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_delete->RowCnt ?>_hr_clients_id" class="hr_clients_id">
<span<?php echo $hr_clients->id->viewAttributes() ?>>
<?php echo $hr_clients->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_clients->name->Visible) { // name ?>
		<td<?php echo $hr_clients->name->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_delete->RowCnt ?>_hr_clients_name" class="hr_clients_name">
<span<?php echo $hr_clients->name->viewAttributes() ?>>
<?php echo $hr_clients->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_clients->first_contact_date->Visible) { // first_contact_date ?>
		<td<?php echo $hr_clients->first_contact_date->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_delete->RowCnt ?>_hr_clients_first_contact_date" class="hr_clients_first_contact_date">
<span<?php echo $hr_clients->first_contact_date->viewAttributes() ?>>
<?php echo $hr_clients->first_contact_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_clients->created->Visible) { // created ?>
		<td<?php echo $hr_clients->created->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_delete->RowCnt ?>_hr_clients_created" class="hr_clients_created">
<span<?php echo $hr_clients->created->viewAttributes() ?>>
<?php echo $hr_clients->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_clients->contact_number->Visible) { // contact_number ?>
		<td<?php echo $hr_clients->contact_number->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_delete->RowCnt ?>_hr_clients_contact_number" class="hr_clients_contact_number">
<span<?php echo $hr_clients->contact_number->viewAttributes() ?>>
<?php echo $hr_clients->contact_number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_clients->contact_email->Visible) { // contact_email ?>
		<td<?php echo $hr_clients->contact_email->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_delete->RowCnt ?>_hr_clients_contact_email" class="hr_clients_contact_email">
<span<?php echo $hr_clients->contact_email->viewAttributes() ?>>
<?php echo $hr_clients->contact_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_clients->status->Visible) { // status ?>
		<td<?php echo $hr_clients->status->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_delete->RowCnt ?>_hr_clients_status" class="hr_clients_status">
<span<?php echo $hr_clients->status->viewAttributes() ?>>
<?php echo $hr_clients->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_clients->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_clients->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_delete->RowCnt ?>_hr_clients_HospID" class="hr_clients_HospID">
<span<?php echo $hr_clients->HospID->viewAttributes() ?>>
<?php echo $hr_clients->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_clients_delete->Recordset->moveNext();
}
$hr_clients_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_clients_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_clients_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_clients_delete->terminate();
?>