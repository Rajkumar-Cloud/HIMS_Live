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
$pharmacy_services_delete = new pharmacy_services_delete();

// Run the page
$pharmacy_services_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_services_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_servicesdelete = currentForm = new ew.Form("fpharmacy_servicesdelete", "delete");

// Form_CustomValidate event
fpharmacy_servicesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_servicesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_servicesdelete.lists["x_pharmacy_id"] = <?php echo $pharmacy_services_delete->pharmacy_id->Lookup->toClientList() ?>;
fpharmacy_servicesdelete.lists["x_pharmacy_id"].options = <?php echo JsonEncode($pharmacy_services_delete->pharmacy_id->lookupOptions()) ?>;
fpharmacy_servicesdelete.lists["x_name"] = <?php echo $pharmacy_services_delete->name->Lookup->toClientList() ?>;
fpharmacy_servicesdelete.lists["x_name"].options = <?php echo JsonEncode($pharmacy_services_delete->name->lookupOptions()) ?>;
fpharmacy_servicesdelete.lists["x_status"] = <?php echo $pharmacy_services_delete->status->Lookup->toClientList() ?>;
fpharmacy_servicesdelete.lists["x_status"].options = <?php echo JsonEncode($pharmacy_services_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_services_delete->showPageHeader(); ?>
<?php
$pharmacy_services_delete->showMessage();
?>
<form name="fpharmacy_servicesdelete" id="fpharmacy_servicesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_services_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_services_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_services_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_services->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_services->id->headerCellClass() ?>"><span id="elh_pharmacy_services_id" class="pharmacy_services_id"><?php echo $pharmacy_services->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
		<th class="<?php echo $pharmacy_services->pharmacy_id->headerCellClass() ?>"><span id="elh_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id"><?php echo $pharmacy_services->pharmacy_id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $pharmacy_services->patient_id->headerCellClass() ?>"><span id="elh_pharmacy_services_patient_id" class="pharmacy_services_patient_id"><?php echo $pharmacy_services->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_services->name->Visible) { // name ?>
		<th class="<?php echo $pharmacy_services->name->headerCellClass() ?>"><span id="elh_pharmacy_services_name" class="pharmacy_services_name"><?php echo $pharmacy_services->name->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_services->amount->Visible) { // amount ?>
		<th class="<?php echo $pharmacy_services->amount->headerCellClass() ?>"><span id="elh_pharmacy_services_amount" class="pharmacy_services_amount"><?php echo $pharmacy_services->amount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_services->charged_date->Visible) { // charged_date ?>
		<th class="<?php echo $pharmacy_services->charged_date->headerCellClass() ?>"><span id="elh_pharmacy_services_charged_date" class="pharmacy_services_charged_date"><?php echo $pharmacy_services->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_services->status->Visible) { // status ?>
		<th class="<?php echo $pharmacy_services->status->headerCellClass() ?>"><span id="elh_pharmacy_services_status" class="pharmacy_services_status"><?php echo $pharmacy_services->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_services_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_services_delete->Recordset->EOF) {
	$pharmacy_services_delete->RecCnt++;
	$pharmacy_services_delete->RowCnt++;

	// Set row properties
	$pharmacy_services->resetAttributes();
	$pharmacy_services->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_services_delete->loadRowValues($pharmacy_services_delete->Recordset);

	// Render row
	$pharmacy_services_delete->renderRow();
?>
	<tr<?php echo $pharmacy_services->rowAttributes() ?>>
<?php if ($pharmacy_services->id->Visible) { // id ?>
		<td<?php echo $pharmacy_services->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_delete->RowCnt ?>_pharmacy_services_id" class="pharmacy_services_id">
<span<?php echo $pharmacy_services->id->viewAttributes() ?>>
<?php echo $pharmacy_services->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
		<td<?php echo $pharmacy_services->pharmacy_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_delete->RowCnt ?>_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services->pharmacy_id->viewAttributes() ?>>
<?php echo $pharmacy_services->pharmacy_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
		<td<?php echo $pharmacy_services->patient_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_delete->RowCnt ?>_pharmacy_services_patient_id" class="pharmacy_services_patient_id">
<span<?php echo $pharmacy_services->patient_id->viewAttributes() ?>>
<?php echo $pharmacy_services->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_services->name->Visible) { // name ?>
		<td<?php echo $pharmacy_services->name->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_delete->RowCnt ?>_pharmacy_services_name" class="pharmacy_services_name">
<span<?php echo $pharmacy_services->name->viewAttributes() ?>>
<?php echo $pharmacy_services->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_services->amount->Visible) { // amount ?>
		<td<?php echo $pharmacy_services->amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_delete->RowCnt ?>_pharmacy_services_amount" class="pharmacy_services_amount">
<span<?php echo $pharmacy_services->amount->viewAttributes() ?>>
<?php echo $pharmacy_services->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_services->charged_date->Visible) { // charged_date ?>
		<td<?php echo $pharmacy_services->charged_date->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_delete->RowCnt ?>_pharmacy_services_charged_date" class="pharmacy_services_charged_date">
<span<?php echo $pharmacy_services->charged_date->viewAttributes() ?>>
<?php echo $pharmacy_services->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_services->status->Visible) { // status ?>
		<td<?php echo $pharmacy_services->status->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_delete->RowCnt ?>_pharmacy_services_status" class="pharmacy_services_status">
<span<?php echo $pharmacy_services->status->viewAttributes() ?>>
<?php echo $pharmacy_services->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_services_delete->Recordset->moveNext();
}
$pharmacy_services_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_services_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_services_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_services_delete->terminate();
?>