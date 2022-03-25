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
$mas_services_delete = new mas_services_delete();

// Run the page
$mas_services_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_services_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_servicesdelete = currentForm = new ew.Form("fmas_servicesdelete", "delete");

// Form_CustomValidate event
fmas_servicesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_servicesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_servicesdelete.lists["x_status"] = <?php echo $mas_services_delete->status->Lookup->toClientList() ?>;
fmas_servicesdelete.lists["x_status"].options = <?php echo JsonEncode($mas_services_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_services_delete->showPageHeader(); ?>
<?php
$mas_services_delete->showMessage();
?>
<form name="fmas_servicesdelete" id="fmas_servicesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_services_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_services_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_services_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_services->id->Visible) { // id ?>
		<th class="<?php echo $mas_services->id->headerCellClass() ?>"><span id="elh_mas_services_id" class="mas_services_id"><?php echo $mas_services->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services->name->Visible) { // name ?>
		<th class="<?php echo $mas_services->name->headerCellClass() ?>"><span id="elh_mas_services_name" class="mas_services_name"><?php echo $mas_services->name->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services->amount->Visible) { // amount ?>
		<th class="<?php echo $mas_services->amount->headerCellClass() ?>"><span id="elh_mas_services_amount" class="mas_services_amount"><?php echo $mas_services->amount->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services->charged_date->Visible) { // charged_date ?>
		<th class="<?php echo $mas_services->charged_date->headerCellClass() ?>"><span id="elh_mas_services_charged_date" class="mas_services_charged_date"><?php echo $mas_services->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services->status->Visible) { // status ?>
		<th class="<?php echo $mas_services->status->headerCellClass() ?>"><span id="elh_mas_services_status" class="mas_services_status"><?php echo $mas_services->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_services_delete->RecCnt = 0;
$i = 0;
while (!$mas_services_delete->Recordset->EOF) {
	$mas_services_delete->RecCnt++;
	$mas_services_delete->RowCnt++;

	// Set row properties
	$mas_services->resetAttributes();
	$mas_services->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_services_delete->loadRowValues($mas_services_delete->Recordset);

	// Render row
	$mas_services_delete->renderRow();
?>
	<tr<?php echo $mas_services->rowAttributes() ?>>
<?php if ($mas_services->id->Visible) { // id ?>
		<td<?php echo $mas_services->id->cellAttributes() ?>>
<span id="el<?php echo $mas_services_delete->RowCnt ?>_mas_services_id" class="mas_services_id">
<span<?php echo $mas_services->id->viewAttributes() ?>>
<?php echo $mas_services->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services->name->Visible) { // name ?>
		<td<?php echo $mas_services->name->cellAttributes() ?>>
<span id="el<?php echo $mas_services_delete->RowCnt ?>_mas_services_name" class="mas_services_name">
<span<?php echo $mas_services->name->viewAttributes() ?>>
<?php echo $mas_services->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services->amount->Visible) { // amount ?>
		<td<?php echo $mas_services->amount->cellAttributes() ?>>
<span id="el<?php echo $mas_services_delete->RowCnt ?>_mas_services_amount" class="mas_services_amount">
<span<?php echo $mas_services->amount->viewAttributes() ?>>
<?php echo $mas_services->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services->charged_date->Visible) { // charged_date ?>
		<td<?php echo $mas_services->charged_date->cellAttributes() ?>>
<span id="el<?php echo $mas_services_delete->RowCnt ?>_mas_services_charged_date" class="mas_services_charged_date">
<span<?php echo $mas_services->charged_date->viewAttributes() ?>>
<?php echo $mas_services->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services->status->Visible) { // status ?>
		<td<?php echo $mas_services->status->cellAttributes() ?>>
<span id="el<?php echo $mas_services_delete->RowCnt ?>_mas_services_status" class="mas_services_status">
<span<?php echo $mas_services->status->viewAttributes() ?>>
<?php echo $mas_services->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_services_delete->Recordset->moveNext();
}
$mas_services_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_services_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_services_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_services_delete->terminate();
?>