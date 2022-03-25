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
$lab_sub_test_master_delete = new lab_sub_test_master_delete();

// Run the page
$lab_sub_test_master_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sub_test_master_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flab_sub_test_masterdelete = currentForm = new ew.Form("flab_sub_test_masterdelete", "delete");

// Form_CustomValidate event
flab_sub_test_masterdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_sub_test_masterdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_sub_test_masterdelete.lists["x_SubTestName"] = <?php echo $lab_sub_test_master_delete->SubTestName->Lookup->toClientList() ?>;
flab_sub_test_masterdelete.lists["x_SubTestName"].options = <?php echo JsonEncode($lab_sub_test_master_delete->SubTestName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_sub_test_master_delete->showPageHeader(); ?>
<?php
$lab_sub_test_master_delete->showMessage();
?>
<form name="flab_sub_test_masterdelete" id="flab_sub_test_masterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_sub_test_master_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_sub_test_master_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sub_test_master">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_sub_test_master_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_sub_test_master->id->Visible) { // id ?>
		<th class="<?php echo $lab_sub_test_master->id->headerCellClass() ?>"><span id="elh_lab_sub_test_master_id" class="lab_sub_test_master_id"><?php echo $lab_sub_test_master->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
		<th class="<?php echo $lab_sub_test_master->TestMasterID->headerCellClass() ?>"><span id="elh_lab_sub_test_master_TestMasterID" class="lab_sub_test_master_TestMasterID"><?php echo $lab_sub_test_master->TestMasterID->caption() ?></span></th>
<?php } ?>
<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
		<th class="<?php echo $lab_sub_test_master->SubTestName->headerCellClass() ?>"><span id="elh_lab_sub_test_master_SubTestName" class="lab_sub_test_master_SubTestName"><?php echo $lab_sub_test_master->SubTestName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
		<th class="<?php echo $lab_sub_test_master->TestOrder->headerCellClass() ?>"><span id="elh_lab_sub_test_master_TestOrder" class="lab_sub_test_master_TestOrder"><?php echo $lab_sub_test_master->TestOrder->caption() ?></span></th>
<?php } ?>
<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
		<th class="<?php echo $lab_sub_test_master->NormalRange->headerCellClass() ?>"><span id="elh_lab_sub_test_master_NormalRange" class="lab_sub_test_master_NormalRange"><?php echo $lab_sub_test_master->NormalRange->caption() ?></span></th>
<?php } ?>
<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
		<th class="<?php echo $lab_sub_test_master->Created->headerCellClass() ?>"><span id="elh_lab_sub_test_master_Created" class="lab_sub_test_master_Created"><?php echo $lab_sub_test_master->Created->caption() ?></span></th>
<?php } ?>
<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $lab_sub_test_master->CreatedBy->headerCellClass() ?>"><span id="elh_lab_sub_test_master_CreatedBy" class="lab_sub_test_master_CreatedBy"><?php echo $lab_sub_test_master->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
		<th class="<?php echo $lab_sub_test_master->Modified->headerCellClass() ?>"><span id="elh_lab_sub_test_master_Modified" class="lab_sub_test_master_Modified"><?php echo $lab_sub_test_master->Modified->caption() ?></span></th>
<?php } ?>
<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $lab_sub_test_master->ModifiedBy->headerCellClass() ?>"><span id="elh_lab_sub_test_master_ModifiedBy" class="lab_sub_test_master_ModifiedBy"><?php echo $lab_sub_test_master->ModifiedBy->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_sub_test_master_delete->RecCnt = 0;
$i = 0;
while (!$lab_sub_test_master_delete->Recordset->EOF) {
	$lab_sub_test_master_delete->RecCnt++;
	$lab_sub_test_master_delete->RowCnt++;

	// Set row properties
	$lab_sub_test_master->resetAttributes();
	$lab_sub_test_master->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_sub_test_master_delete->loadRowValues($lab_sub_test_master_delete->Recordset);

	// Render row
	$lab_sub_test_master_delete->renderRow();
?>
	<tr<?php echo $lab_sub_test_master->rowAttributes() ?>>
<?php if ($lab_sub_test_master->id->Visible) { // id ?>
		<td<?php echo $lab_sub_test_master->id->cellAttributes() ?>>
<span id="el<?php echo $lab_sub_test_master_delete->RowCnt ?>_lab_sub_test_master_id" class="lab_sub_test_master_id">
<span<?php echo $lab_sub_test_master->id->viewAttributes() ?>>
<?php echo $lab_sub_test_master->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
		<td<?php echo $lab_sub_test_master->TestMasterID->cellAttributes() ?>>
<span id="el<?php echo $lab_sub_test_master_delete->RowCnt ?>_lab_sub_test_master_TestMasterID" class="lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<?php echo $lab_sub_test_master->TestMasterID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
		<td<?php echo $lab_sub_test_master->SubTestName->cellAttributes() ?>>
<span id="el<?php echo $lab_sub_test_master_delete->RowCnt ?>_lab_sub_test_master_SubTestName" class="lab_sub_test_master_SubTestName">
<span<?php echo $lab_sub_test_master->SubTestName->viewAttributes() ?>>
<?php echo $lab_sub_test_master->SubTestName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
		<td<?php echo $lab_sub_test_master->TestOrder->cellAttributes() ?>>
<span id="el<?php echo $lab_sub_test_master_delete->RowCnt ?>_lab_sub_test_master_TestOrder" class="lab_sub_test_master_TestOrder">
<span<?php echo $lab_sub_test_master->TestOrder->viewAttributes() ?>>
<?php echo $lab_sub_test_master->TestOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
		<td<?php echo $lab_sub_test_master->NormalRange->cellAttributes() ?>>
<span id="el<?php echo $lab_sub_test_master_delete->RowCnt ?>_lab_sub_test_master_NormalRange" class="lab_sub_test_master_NormalRange">
<span<?php echo $lab_sub_test_master->NormalRange->viewAttributes() ?>>
<?php echo $lab_sub_test_master->NormalRange->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
		<td<?php echo $lab_sub_test_master->Created->cellAttributes() ?>>
<span id="el<?php echo $lab_sub_test_master_delete->RowCnt ?>_lab_sub_test_master_Created" class="lab_sub_test_master_Created">
<span<?php echo $lab_sub_test_master->Created->viewAttributes() ?>>
<?php echo $lab_sub_test_master->Created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
		<td<?php echo $lab_sub_test_master->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $lab_sub_test_master_delete->RowCnt ?>_lab_sub_test_master_CreatedBy" class="lab_sub_test_master_CreatedBy">
<span<?php echo $lab_sub_test_master->CreatedBy->viewAttributes() ?>>
<?php echo $lab_sub_test_master->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
		<td<?php echo $lab_sub_test_master->Modified->cellAttributes() ?>>
<span id="el<?php echo $lab_sub_test_master_delete->RowCnt ?>_lab_sub_test_master_Modified" class="lab_sub_test_master_Modified">
<span<?php echo $lab_sub_test_master->Modified->viewAttributes() ?>>
<?php echo $lab_sub_test_master->Modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
		<td<?php echo $lab_sub_test_master->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $lab_sub_test_master_delete->RowCnt ?>_lab_sub_test_master_ModifiedBy" class="lab_sub_test_master_ModifiedBy">
<span<?php echo $lab_sub_test_master->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_sub_test_master->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_sub_test_master_delete->Recordset->moveNext();
}
$lab_sub_test_master_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_sub_test_master_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_sub_test_master_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_sub_test_master_delete->terminate();
?>