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
$crm_leadstatus_delete = new crm_leadstatus_delete();

// Run the page
$crm_leadstatus_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadstatus_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcrm_leadstatusdelete = currentForm = new ew.Form("fcrm_leadstatusdelete", "delete");

// Form_CustomValidate event
fcrm_leadstatusdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadstatusdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leadstatus_delete->showPageHeader(); ?>
<?php
$crm_leadstatus_delete->showMessage();
?>
<form name="fcrm_leadstatusdelete" id="fcrm_leadstatusdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadstatus_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadstatus_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadstatus">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($crm_leadstatus_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($crm_leadstatus->leadstatusid->Visible) { // leadstatusid ?>
		<th class="<?php echo $crm_leadstatus->leadstatusid->headerCellClass() ?>"><span id="elh_crm_leadstatus_leadstatusid" class="crm_leadstatus_leadstatusid"><?php echo $crm_leadstatus->leadstatusid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadstatus->leadstatus->Visible) { // leadstatus ?>
		<th class="<?php echo $crm_leadstatus->leadstatus->headerCellClass() ?>"><span id="elh_crm_leadstatus_leadstatus" class="crm_leadstatus_leadstatus"><?php echo $crm_leadstatus->leadstatus->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadstatus->presence->Visible) { // presence ?>
		<th class="<?php echo $crm_leadstatus->presence->headerCellClass() ?>"><span id="elh_crm_leadstatus_presence" class="crm_leadstatus_presence"><?php echo $crm_leadstatus->presence->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadstatus->picklist_valueid->Visible) { // picklist_valueid ?>
		<th class="<?php echo $crm_leadstatus->picklist_valueid->headerCellClass() ?>"><span id="elh_crm_leadstatus_picklist_valueid" class="crm_leadstatus_picklist_valueid"><?php echo $crm_leadstatus->picklist_valueid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadstatus->sortorderid->Visible) { // sortorderid ?>
		<th class="<?php echo $crm_leadstatus->sortorderid->headerCellClass() ?>"><span id="elh_crm_leadstatus_sortorderid" class="crm_leadstatus_sortorderid"><?php echo $crm_leadstatus->sortorderid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadstatus->color->Visible) { // color ?>
		<th class="<?php echo $crm_leadstatus->color->headerCellClass() ?>"><span id="elh_crm_leadstatus_color" class="crm_leadstatus_color"><?php echo $crm_leadstatus->color->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$crm_leadstatus_delete->RecCnt = 0;
$i = 0;
while (!$crm_leadstatus_delete->Recordset->EOF) {
	$crm_leadstatus_delete->RecCnt++;
	$crm_leadstatus_delete->RowCnt++;

	// Set row properties
	$crm_leadstatus->resetAttributes();
	$crm_leadstatus->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$crm_leadstatus_delete->loadRowValues($crm_leadstatus_delete->Recordset);

	// Render row
	$crm_leadstatus_delete->renderRow();
?>
	<tr<?php echo $crm_leadstatus->rowAttributes() ?>>
<?php if ($crm_leadstatus->leadstatusid->Visible) { // leadstatusid ?>
		<td<?php echo $crm_leadstatus->leadstatusid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_delete->RowCnt ?>_crm_leadstatus_leadstatusid" class="crm_leadstatus_leadstatusid">
<span<?php echo $crm_leadstatus->leadstatusid->viewAttributes() ?>>
<?php echo $crm_leadstatus->leadstatusid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadstatus->leadstatus->Visible) { // leadstatus ?>
		<td<?php echo $crm_leadstatus->leadstatus->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_delete->RowCnt ?>_crm_leadstatus_leadstatus" class="crm_leadstatus_leadstatus">
<span<?php echo $crm_leadstatus->leadstatus->viewAttributes() ?>>
<?php echo $crm_leadstatus->leadstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadstatus->presence->Visible) { // presence ?>
		<td<?php echo $crm_leadstatus->presence->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_delete->RowCnt ?>_crm_leadstatus_presence" class="crm_leadstatus_presence">
<span<?php echo $crm_leadstatus->presence->viewAttributes() ?>>
<?php echo $crm_leadstatus->presence->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadstatus->picklist_valueid->Visible) { // picklist_valueid ?>
		<td<?php echo $crm_leadstatus->picklist_valueid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_delete->RowCnt ?>_crm_leadstatus_picklist_valueid" class="crm_leadstatus_picklist_valueid">
<span<?php echo $crm_leadstatus->picklist_valueid->viewAttributes() ?>>
<?php echo $crm_leadstatus->picklist_valueid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadstatus->sortorderid->Visible) { // sortorderid ?>
		<td<?php echo $crm_leadstatus->sortorderid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_delete->RowCnt ?>_crm_leadstatus_sortorderid" class="crm_leadstatus_sortorderid">
<span<?php echo $crm_leadstatus->sortorderid->viewAttributes() ?>>
<?php echo $crm_leadstatus->sortorderid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadstatus->color->Visible) { // color ?>
		<td<?php echo $crm_leadstatus->color->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_delete->RowCnt ?>_crm_leadstatus_color" class="crm_leadstatus_color">
<span<?php echo $crm_leadstatus->color->viewAttributes() ?>>
<?php echo $crm_leadstatus->color->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$crm_leadstatus_delete->Recordset->moveNext();
}
$crm_leadstatus_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leadstatus_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$crm_leadstatus_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leadstatus_delete->terminate();
?>