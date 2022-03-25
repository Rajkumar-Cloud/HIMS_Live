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
$crm_leadsource_delete = new crm_leadsource_delete();

// Run the page
$crm_leadsource_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadsource_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcrm_leadsourcedelete = currentForm = new ew.Form("fcrm_leadsourcedelete", "delete");

// Form_CustomValidate event
fcrm_leadsourcedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadsourcedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leadsource_delete->showPageHeader(); ?>
<?php
$crm_leadsource_delete->showMessage();
?>
<form name="fcrm_leadsourcedelete" id="fcrm_leadsourcedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadsource_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadsource_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadsource">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($crm_leadsource_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($crm_leadsource->leadsourceid->Visible) { // leadsourceid ?>
		<th class="<?php echo $crm_leadsource->leadsourceid->headerCellClass() ?>"><span id="elh_crm_leadsource_leadsourceid" class="crm_leadsource_leadsourceid"><?php echo $crm_leadsource->leadsourceid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadsource->leadsource->Visible) { // leadsource ?>
		<th class="<?php echo $crm_leadsource->leadsource->headerCellClass() ?>"><span id="elh_crm_leadsource_leadsource" class="crm_leadsource_leadsource"><?php echo $crm_leadsource->leadsource->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadsource->presence->Visible) { // presence ?>
		<th class="<?php echo $crm_leadsource->presence->headerCellClass() ?>"><span id="elh_crm_leadsource_presence" class="crm_leadsource_presence"><?php echo $crm_leadsource->presence->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadsource->picklist_valueid->Visible) { // picklist_valueid ?>
		<th class="<?php echo $crm_leadsource->picklist_valueid->headerCellClass() ?>"><span id="elh_crm_leadsource_picklist_valueid" class="crm_leadsource_picklist_valueid"><?php echo $crm_leadsource->picklist_valueid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadsource->sortorderid->Visible) { // sortorderid ?>
		<th class="<?php echo $crm_leadsource->sortorderid->headerCellClass() ?>"><span id="elh_crm_leadsource_sortorderid" class="crm_leadsource_sortorderid"><?php echo $crm_leadsource->sortorderid->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$crm_leadsource_delete->RecCnt = 0;
$i = 0;
while (!$crm_leadsource_delete->Recordset->EOF) {
	$crm_leadsource_delete->RecCnt++;
	$crm_leadsource_delete->RowCnt++;

	// Set row properties
	$crm_leadsource->resetAttributes();
	$crm_leadsource->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$crm_leadsource_delete->loadRowValues($crm_leadsource_delete->Recordset);

	// Render row
	$crm_leadsource_delete->renderRow();
?>
	<tr<?php echo $crm_leadsource->rowAttributes() ?>>
<?php if ($crm_leadsource->leadsourceid->Visible) { // leadsourceid ?>
		<td<?php echo $crm_leadsource->leadsourceid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsource_delete->RowCnt ?>_crm_leadsource_leadsourceid" class="crm_leadsource_leadsourceid">
<span<?php echo $crm_leadsource->leadsourceid->viewAttributes() ?>>
<?php echo $crm_leadsource->leadsourceid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadsource->leadsource->Visible) { // leadsource ?>
		<td<?php echo $crm_leadsource->leadsource->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsource_delete->RowCnt ?>_crm_leadsource_leadsource" class="crm_leadsource_leadsource">
<span<?php echo $crm_leadsource->leadsource->viewAttributes() ?>>
<?php echo $crm_leadsource->leadsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadsource->presence->Visible) { // presence ?>
		<td<?php echo $crm_leadsource->presence->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsource_delete->RowCnt ?>_crm_leadsource_presence" class="crm_leadsource_presence">
<span<?php echo $crm_leadsource->presence->viewAttributes() ?>>
<?php echo $crm_leadsource->presence->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadsource->picklist_valueid->Visible) { // picklist_valueid ?>
		<td<?php echo $crm_leadsource->picklist_valueid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsource_delete->RowCnt ?>_crm_leadsource_picklist_valueid" class="crm_leadsource_picklist_valueid">
<span<?php echo $crm_leadsource->picklist_valueid->viewAttributes() ?>>
<?php echo $crm_leadsource->picklist_valueid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadsource->sortorderid->Visible) { // sortorderid ?>
		<td<?php echo $crm_leadsource->sortorderid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsource_delete->RowCnt ?>_crm_leadsource_sortorderid" class="crm_leadsource_sortorderid">
<span<?php echo $crm_leadsource->sortorderid->viewAttributes() ?>>
<?php echo $crm_leadsource->sortorderid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$crm_leadsource_delete->Recordset->moveNext();
}
$crm_leadsource_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leadsource_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$crm_leadsource_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leadsource_delete->terminate();
?>