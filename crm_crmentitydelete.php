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
$crm_crmentity_delete = new crm_crmentity_delete();

// Run the page
$crm_crmentity_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_crmentity_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcrm_crmentitydelete = currentForm = new ew.Form("fcrm_crmentitydelete", "delete");

// Form_CustomValidate event
fcrm_crmentitydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_crmentitydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_crmentity_delete->showPageHeader(); ?>
<?php
$crm_crmentity_delete->showMessage();
?>
<form name="fcrm_crmentitydelete" id="fcrm_crmentitydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_crmentity_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_crmentity_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_crmentity">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($crm_crmentity_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($crm_crmentity->crmid->Visible) { // crmid ?>
		<th class="<?php echo $crm_crmentity->crmid->headerCellClass() ?>"><span id="elh_crm_crmentity_crmid" class="crm_crmentity_crmid"><?php echo $crm_crmentity->crmid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->smcreatorid->Visible) { // smcreatorid ?>
		<th class="<?php echo $crm_crmentity->smcreatorid->headerCellClass() ?>"><span id="elh_crm_crmentity_smcreatorid" class="crm_crmentity_smcreatorid"><?php echo $crm_crmentity->smcreatorid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->smownerid->Visible) { // smownerid ?>
		<th class="<?php echo $crm_crmentity->smownerid->headerCellClass() ?>"><span id="elh_crm_crmentity_smownerid" class="crm_crmentity_smownerid"><?php echo $crm_crmentity->smownerid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->shownerid->Visible) { // shownerid ?>
		<th class="<?php echo $crm_crmentity->shownerid->headerCellClass() ?>"><span id="elh_crm_crmentity_shownerid" class="crm_crmentity_shownerid"><?php echo $crm_crmentity->shownerid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $crm_crmentity->modifiedby->headerCellClass() ?>"><span id="elh_crm_crmentity_modifiedby" class="crm_crmentity_modifiedby"><?php echo $crm_crmentity->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->setype->Visible) { // setype ?>
		<th class="<?php echo $crm_crmentity->setype->headerCellClass() ?>"><span id="elh_crm_crmentity_setype" class="crm_crmentity_setype"><?php echo $crm_crmentity->setype->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->createdtime->Visible) { // createdtime ?>
		<th class="<?php echo $crm_crmentity->createdtime->headerCellClass() ?>"><span id="elh_crm_crmentity_createdtime" class="crm_crmentity_createdtime"><?php echo $crm_crmentity->createdtime->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->modifiedtime->Visible) { // modifiedtime ?>
		<th class="<?php echo $crm_crmentity->modifiedtime->headerCellClass() ?>"><span id="elh_crm_crmentity_modifiedtime" class="crm_crmentity_modifiedtime"><?php echo $crm_crmentity->modifiedtime->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->viewedtime->Visible) { // viewedtime ?>
		<th class="<?php echo $crm_crmentity->viewedtime->headerCellClass() ?>"><span id="elh_crm_crmentity_viewedtime" class="crm_crmentity_viewedtime"><?php echo $crm_crmentity->viewedtime->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->status->Visible) { // status ?>
		<th class="<?php echo $crm_crmentity->status->headerCellClass() ?>"><span id="elh_crm_crmentity_status" class="crm_crmentity_status"><?php echo $crm_crmentity->status->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->version->Visible) { // version ?>
		<th class="<?php echo $crm_crmentity->version->headerCellClass() ?>"><span id="elh_crm_crmentity_version" class="crm_crmentity_version"><?php echo $crm_crmentity->version->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->presence->Visible) { // presence ?>
		<th class="<?php echo $crm_crmentity->presence->headerCellClass() ?>"><span id="elh_crm_crmentity_presence" class="crm_crmentity_presence"><?php echo $crm_crmentity->presence->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->deleted->Visible) { // deleted ?>
		<th class="<?php echo $crm_crmentity->deleted->headerCellClass() ?>"><span id="elh_crm_crmentity_deleted" class="crm_crmentity_deleted"><?php echo $crm_crmentity->deleted->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->was_read->Visible) { // was_read ?>
		<th class="<?php echo $crm_crmentity->was_read->headerCellClass() ?>"><span id="elh_crm_crmentity_was_read" class="crm_crmentity_was_read"><?php echo $crm_crmentity->was_read->caption() ?></span></th>
<?php } ?>
<?php if ($crm_crmentity->_private->Visible) { // private ?>
		<th class="<?php echo $crm_crmentity->_private->headerCellClass() ?>"><span id="elh_crm_crmentity__private" class="crm_crmentity__private"><?php echo $crm_crmentity->_private->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$crm_crmentity_delete->RecCnt = 0;
$i = 0;
while (!$crm_crmentity_delete->Recordset->EOF) {
	$crm_crmentity_delete->RecCnt++;
	$crm_crmentity_delete->RowCnt++;

	// Set row properties
	$crm_crmentity->resetAttributes();
	$crm_crmentity->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$crm_crmentity_delete->loadRowValues($crm_crmentity_delete->Recordset);

	// Render row
	$crm_crmentity_delete->renderRow();
?>
	<tr<?php echo $crm_crmentity->rowAttributes() ?>>
<?php if ($crm_crmentity->crmid->Visible) { // crmid ?>
		<td<?php echo $crm_crmentity->crmid->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_crmid" class="crm_crmentity_crmid">
<span<?php echo $crm_crmentity->crmid->viewAttributes() ?>>
<?php echo $crm_crmentity->crmid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->smcreatorid->Visible) { // smcreatorid ?>
		<td<?php echo $crm_crmentity->smcreatorid->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_smcreatorid" class="crm_crmentity_smcreatorid">
<span<?php echo $crm_crmentity->smcreatorid->viewAttributes() ?>>
<?php echo $crm_crmentity->smcreatorid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->smownerid->Visible) { // smownerid ?>
		<td<?php echo $crm_crmentity->smownerid->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_smownerid" class="crm_crmentity_smownerid">
<span<?php echo $crm_crmentity->smownerid->viewAttributes() ?>>
<?php echo $crm_crmentity->smownerid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->shownerid->Visible) { // shownerid ?>
		<td<?php echo $crm_crmentity->shownerid->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_shownerid" class="crm_crmentity_shownerid">
<span<?php echo $crm_crmentity->shownerid->viewAttributes() ?>>
<?php echo $crm_crmentity->shownerid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $crm_crmentity->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_modifiedby" class="crm_crmentity_modifiedby">
<span<?php echo $crm_crmentity->modifiedby->viewAttributes() ?>>
<?php echo $crm_crmentity->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->setype->Visible) { // setype ?>
		<td<?php echo $crm_crmentity->setype->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_setype" class="crm_crmentity_setype">
<span<?php echo $crm_crmentity->setype->viewAttributes() ?>>
<?php echo $crm_crmentity->setype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->createdtime->Visible) { // createdtime ?>
		<td<?php echo $crm_crmentity->createdtime->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_createdtime" class="crm_crmentity_createdtime">
<span<?php echo $crm_crmentity->createdtime->viewAttributes() ?>>
<?php echo $crm_crmentity->createdtime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->modifiedtime->Visible) { // modifiedtime ?>
		<td<?php echo $crm_crmentity->modifiedtime->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_modifiedtime" class="crm_crmentity_modifiedtime">
<span<?php echo $crm_crmentity->modifiedtime->viewAttributes() ?>>
<?php echo $crm_crmentity->modifiedtime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->viewedtime->Visible) { // viewedtime ?>
		<td<?php echo $crm_crmentity->viewedtime->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_viewedtime" class="crm_crmentity_viewedtime">
<span<?php echo $crm_crmentity->viewedtime->viewAttributes() ?>>
<?php echo $crm_crmentity->viewedtime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->status->Visible) { // status ?>
		<td<?php echo $crm_crmentity->status->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_status" class="crm_crmentity_status">
<span<?php echo $crm_crmentity->status->viewAttributes() ?>>
<?php echo $crm_crmentity->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->version->Visible) { // version ?>
		<td<?php echo $crm_crmentity->version->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_version" class="crm_crmentity_version">
<span<?php echo $crm_crmentity->version->viewAttributes() ?>>
<?php echo $crm_crmentity->version->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->presence->Visible) { // presence ?>
		<td<?php echo $crm_crmentity->presence->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_presence" class="crm_crmentity_presence">
<span<?php echo $crm_crmentity->presence->viewAttributes() ?>>
<?php echo $crm_crmentity->presence->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->deleted->Visible) { // deleted ?>
		<td<?php echo $crm_crmentity->deleted->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_deleted" class="crm_crmentity_deleted">
<span<?php echo $crm_crmentity->deleted->viewAttributes() ?>>
<?php echo $crm_crmentity->deleted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->was_read->Visible) { // was_read ?>
		<td<?php echo $crm_crmentity->was_read->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity_was_read" class="crm_crmentity_was_read">
<span<?php echo $crm_crmentity->was_read->viewAttributes() ?>>
<?php echo $crm_crmentity->was_read->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_crmentity->_private->Visible) { // private ?>
		<td<?php echo $crm_crmentity->_private->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_delete->RowCnt ?>_crm_crmentity__private" class="crm_crmentity__private">
<span<?php echo $crm_crmentity->_private->viewAttributes() ?>>
<?php echo $crm_crmentity->_private->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$crm_crmentity_delete->Recordset->moveNext();
}
$crm_crmentity_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_crmentity_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$crm_crmentity_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_crmentity_delete->terminate();
?>