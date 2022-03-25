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
$services_delete = new services_delete();

// Run the page
$services_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$services_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fservicesdelete = currentForm = new ew.Form("fservicesdelete", "delete");

// Form_CustomValidate event
fservicesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fservicesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $services_delete->showPageHeader(); ?>
<?php
$services_delete->showMessage();
?>
<form name="fservicesdelete" id="fservicesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($services_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $services_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="services">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($services_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($services->Id->Visible) { // Id ?>
		<th class="<?php echo $services->Id->headerCellClass() ?>"><span id="elh_services_Id" class="services_Id"><?php echo $services->Id->caption() ?></span></th>
<?php } ?>
<?php if ($services->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<th class="<?php echo $services->DEPARTMENT->headerCellClass() ?>"><span id="elh_services_DEPARTMENT" class="services_DEPARTMENT"><?php echo $services->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($services->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<th class="<?php echo $services->SERVICE_TYPE->headerCellClass() ?>"><span id="elh_services_SERVICE_TYPE" class="services_SERVICE_TYPE"><?php echo $services->SERVICE_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($services->SERVICE->Visible) { // SERVICE ?>
		<th class="<?php echo $services->SERVICE->headerCellClass() ?>"><span id="elh_services_SERVICE" class="services_SERVICE"><?php echo $services->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($services->CODE->Visible) { // CODE ?>
		<th class="<?php echo $services->CODE->headerCellClass() ?>"><span id="elh_services_CODE" class="services_CODE"><?php echo $services->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($services->AMOUNT->Visible) { // AMOUNT ?>
		<th class="<?php echo $services->AMOUNT->headerCellClass() ?>"><span id="elh_services_AMOUNT" class="services_AMOUNT"><?php echo $services->AMOUNT->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$services_delete->RecCnt = 0;
$i = 0;
while (!$services_delete->Recordset->EOF) {
	$services_delete->RecCnt++;
	$services_delete->RowCnt++;

	// Set row properties
	$services->resetAttributes();
	$services->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$services_delete->loadRowValues($services_delete->Recordset);

	// Render row
	$services_delete->renderRow();
?>
	<tr<?php echo $services->rowAttributes() ?>>
<?php if ($services->Id->Visible) { // Id ?>
		<td<?php echo $services->Id->cellAttributes() ?>>
<span id="el<?php echo $services_delete->RowCnt ?>_services_Id" class="services_Id">
<span<?php echo $services->Id->viewAttributes() ?>>
<?php echo $services->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($services->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td<?php echo $services->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $services_delete->RowCnt ?>_services_DEPARTMENT" class="services_DEPARTMENT">
<span<?php echo $services->DEPARTMENT->viewAttributes() ?>>
<?php echo $services->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($services->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td<?php echo $services->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?php echo $services_delete->RowCnt ?>_services_SERVICE_TYPE" class="services_SERVICE_TYPE">
<span<?php echo $services->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $services->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($services->SERVICE->Visible) { // SERVICE ?>
		<td<?php echo $services->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $services_delete->RowCnt ?>_services_SERVICE" class="services_SERVICE">
<span<?php echo $services->SERVICE->viewAttributes() ?>>
<?php echo $services->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($services->CODE->Visible) { // CODE ?>
		<td<?php echo $services->CODE->cellAttributes() ?>>
<span id="el<?php echo $services_delete->RowCnt ?>_services_CODE" class="services_CODE">
<span<?php echo $services->CODE->viewAttributes() ?>>
<?php echo $services->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($services->AMOUNT->Visible) { // AMOUNT ?>
		<td<?php echo $services->AMOUNT->cellAttributes() ?>>
<span id="el<?php echo $services_delete->RowCnt ?>_services_AMOUNT" class="services_AMOUNT">
<span<?php echo $services->AMOUNT->viewAttributes() ?>>
<?php echo $services->AMOUNT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$services_delete->Recordset->moveNext();
}
$services_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $services_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$services_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$services_delete->terminate();
?>