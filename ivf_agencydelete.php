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
$ivf_agency_delete = new ivf_agency_delete();

// Run the page
$ivf_agency_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_agency_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_agencydelete = currentForm = new ew.Form("fivf_agencydelete", "delete");

// Form_CustomValidate event
fivf_agencydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_agencydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_agency_delete->showPageHeader(); ?>
<?php
$ivf_agency_delete->showMessage();
?>
<form name="fivf_agencydelete" id="fivf_agencydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_agency_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_agency_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_agency">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_agency_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_agency->id->Visible) { // id ?>
		<th class="<?php echo $ivf_agency->id->headerCellClass() ?>"><span id="elh_ivf_agency_id" class="ivf_agency_id"><?php echo $ivf_agency->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_agency->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_agency->Name->headerCellClass() ?>"><span id="elh_ivf_agency_Name" class="ivf_agency_Name"><?php echo $ivf_agency->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_agency->Street->Visible) { // Street ?>
		<th class="<?php echo $ivf_agency->Street->headerCellClass() ?>"><span id="elh_ivf_agency_Street" class="ivf_agency_Street"><?php echo $ivf_agency->Street->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_agency->Town->Visible) { // Town ?>
		<th class="<?php echo $ivf_agency->Town->headerCellClass() ?>"><span id="elh_ivf_agency_Town" class="ivf_agency_Town"><?php echo $ivf_agency->Town->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_agency->State->Visible) { // State ?>
		<th class="<?php echo $ivf_agency->State->headerCellClass() ?>"><span id="elh_ivf_agency_State" class="ivf_agency_State"><?php echo $ivf_agency->State->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_agency->Pin->Visible) { // Pin ?>
		<th class="<?php echo $ivf_agency->Pin->headerCellClass() ?>"><span id="elh_ivf_agency_Pin" class="ivf_agency_Pin"><?php echo $ivf_agency->Pin->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_agency_delete->RecCnt = 0;
$i = 0;
while (!$ivf_agency_delete->Recordset->EOF) {
	$ivf_agency_delete->RecCnt++;
	$ivf_agency_delete->RowCnt++;

	// Set row properties
	$ivf_agency->resetAttributes();
	$ivf_agency->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_agency_delete->loadRowValues($ivf_agency_delete->Recordset);

	// Render row
	$ivf_agency_delete->renderRow();
?>
	<tr<?php echo $ivf_agency->rowAttributes() ?>>
<?php if ($ivf_agency->id->Visible) { // id ?>
		<td<?php echo $ivf_agency->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCnt ?>_ivf_agency_id" class="ivf_agency_id">
<span<?php echo $ivf_agency->id->viewAttributes() ?>>
<?php echo $ivf_agency->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_agency->Name->Visible) { // Name ?>
		<td<?php echo $ivf_agency->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCnt ?>_ivf_agency_Name" class="ivf_agency_Name">
<span<?php echo $ivf_agency->Name->viewAttributes() ?>>
<?php echo $ivf_agency->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_agency->Street->Visible) { // Street ?>
		<td<?php echo $ivf_agency->Street->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCnt ?>_ivf_agency_Street" class="ivf_agency_Street">
<span<?php echo $ivf_agency->Street->viewAttributes() ?>>
<?php echo $ivf_agency->Street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_agency->Town->Visible) { // Town ?>
		<td<?php echo $ivf_agency->Town->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCnt ?>_ivf_agency_Town" class="ivf_agency_Town">
<span<?php echo $ivf_agency->Town->viewAttributes() ?>>
<?php echo $ivf_agency->Town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_agency->State->Visible) { // State ?>
		<td<?php echo $ivf_agency->State->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCnt ?>_ivf_agency_State" class="ivf_agency_State">
<span<?php echo $ivf_agency->State->viewAttributes() ?>>
<?php echo $ivf_agency->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_agency->Pin->Visible) { // Pin ?>
		<td<?php echo $ivf_agency->Pin->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_delete->RowCnt ?>_ivf_agency_Pin" class="ivf_agency_Pin">
<span<?php echo $ivf_agency->Pin->viewAttributes() ?>>
<?php echo $ivf_agency->Pin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_agency_delete->Recordset->moveNext();
}
$ivf_agency_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_agency_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_agency_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_agency_delete->terminate();
?>