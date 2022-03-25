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
$crm_leads_relation_delete = new crm_leads_relation_delete();

// Run the page
$crm_leads_relation_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leads_relation_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcrm_leads_relationdelete = currentForm = new ew.Form("fcrm_leads_relationdelete", "delete");

// Form_CustomValidate event
fcrm_leads_relationdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leads_relationdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leads_relation_delete->showPageHeader(); ?>
<?php
$crm_leads_relation_delete->showMessage();
?>
<form name="fcrm_leads_relationdelete" id="fcrm_leads_relationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leads_relation_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leads_relation_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leads_relation">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($crm_leads_relation_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($crm_leads_relation->leads_relationid->Visible) { // leads_relationid ?>
		<th class="<?php echo $crm_leads_relation->leads_relationid->headerCellClass() ?>"><span id="elh_crm_leads_relation_leads_relationid" class="crm_leads_relation_leads_relationid"><?php echo $crm_leads_relation->leads_relationid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leads_relation->leads_relation->Visible) { // leads_relation ?>
		<th class="<?php echo $crm_leads_relation->leads_relation->headerCellClass() ?>"><span id="elh_crm_leads_relation_leads_relation" class="crm_leads_relation_leads_relation"><?php echo $crm_leads_relation->leads_relation->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leads_relation->sortorderid->Visible) { // sortorderid ?>
		<th class="<?php echo $crm_leads_relation->sortorderid->headerCellClass() ?>"><span id="elh_crm_leads_relation_sortorderid" class="crm_leads_relation_sortorderid"><?php echo $crm_leads_relation->sortorderid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leads_relation->presence->Visible) { // presence ?>
		<th class="<?php echo $crm_leads_relation->presence->headerCellClass() ?>"><span id="elh_crm_leads_relation_presence" class="crm_leads_relation_presence"><?php echo $crm_leads_relation->presence->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$crm_leads_relation_delete->RecCnt = 0;
$i = 0;
while (!$crm_leads_relation_delete->Recordset->EOF) {
	$crm_leads_relation_delete->RecCnt++;
	$crm_leads_relation_delete->RowCnt++;

	// Set row properties
	$crm_leads_relation->resetAttributes();
	$crm_leads_relation->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$crm_leads_relation_delete->loadRowValues($crm_leads_relation_delete->Recordset);

	// Render row
	$crm_leads_relation_delete->renderRow();
?>
	<tr<?php echo $crm_leads_relation->rowAttributes() ?>>
<?php if ($crm_leads_relation->leads_relationid->Visible) { // leads_relationid ?>
		<td<?php echo $crm_leads_relation->leads_relationid->cellAttributes() ?>>
<span id="el<?php echo $crm_leads_relation_delete->RowCnt ?>_crm_leads_relation_leads_relationid" class="crm_leads_relation_leads_relationid">
<span<?php echo $crm_leads_relation->leads_relationid->viewAttributes() ?>>
<?php echo $crm_leads_relation->leads_relationid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leads_relation->leads_relation->Visible) { // leads_relation ?>
		<td<?php echo $crm_leads_relation->leads_relation->cellAttributes() ?>>
<span id="el<?php echo $crm_leads_relation_delete->RowCnt ?>_crm_leads_relation_leads_relation" class="crm_leads_relation_leads_relation">
<span<?php echo $crm_leads_relation->leads_relation->viewAttributes() ?>>
<?php echo $crm_leads_relation->leads_relation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leads_relation->sortorderid->Visible) { // sortorderid ?>
		<td<?php echo $crm_leads_relation->sortorderid->cellAttributes() ?>>
<span id="el<?php echo $crm_leads_relation_delete->RowCnt ?>_crm_leads_relation_sortorderid" class="crm_leads_relation_sortorderid">
<span<?php echo $crm_leads_relation->sortorderid->viewAttributes() ?>>
<?php echo $crm_leads_relation->sortorderid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leads_relation->presence->Visible) { // presence ?>
		<td<?php echo $crm_leads_relation->presence->cellAttributes() ?>>
<span id="el<?php echo $crm_leads_relation_delete->RowCnt ?>_crm_leads_relation_presence" class="crm_leads_relation_presence">
<span<?php echo $crm_leads_relation->presence->viewAttributes() ?>>
<?php echo $crm_leads_relation->presence->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$crm_leads_relation_delete->Recordset->moveNext();
}
$crm_leads_relation_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leads_relation_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$crm_leads_relation_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leads_relation_delete->terminate();
?>