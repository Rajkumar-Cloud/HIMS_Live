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
$lab_profile_details_delete = new lab_profile_details_delete();

// Run the page
$lab_profile_details_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_details_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flab_profile_detailsdelete = currentForm = new ew.Form("flab_profile_detailsdelete", "delete");

// Form_CustomValidate event
flab_profile_detailsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_profile_detailsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_profile_detailsdelete.lists["x_SubProfileCode"] = <?php echo $lab_profile_details_delete->SubProfileCode->Lookup->toClientList() ?>;
flab_profile_detailsdelete.lists["x_SubProfileCode"].options = <?php echo JsonEncode($lab_profile_details_delete->SubProfileCode->lookupOptions()) ?>;
flab_profile_detailsdelete.lists["x_ProfileTestCode"] = <?php echo $lab_profile_details_delete->ProfileTestCode->Lookup->toClientList() ?>;
flab_profile_detailsdelete.lists["x_ProfileTestCode"].options = <?php echo JsonEncode($lab_profile_details_delete->ProfileTestCode->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_profile_details_delete->showPageHeader(); ?>
<?php
$lab_profile_details_delete->showMessage();
?>
<form name="flab_profile_detailsdelete" id="flab_profile_detailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_profile_details_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_profile_details_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_profile_details_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_profile_details->id->Visible) { // id ?>
		<th class="<?php echo $lab_profile_details->id->headerCellClass() ?>"><span id="elh_lab_profile_details_id" class="lab_profile_details_id"><?php echo $lab_profile_details->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details->ProfileCode->Visible) { // ProfileCode ?>
		<th class="<?php echo $lab_profile_details->ProfileCode->headerCellClass() ?>"><span id="elh_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode"><?php echo $lab_profile_details->ProfileCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details->SubProfileCode->Visible) { // SubProfileCode ?>
		<th class="<?php echo $lab_profile_details->SubProfileCode->headerCellClass() ?>"><span id="elh_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode"><?php echo $lab_profile_details->SubProfileCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details->ProfileTestCode->Visible) { // ProfileTestCode ?>
		<th class="<?php echo $lab_profile_details->ProfileTestCode->headerCellClass() ?>"><span id="elh_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode"><?php echo $lab_profile_details->ProfileTestCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
		<th class="<?php echo $lab_profile_details->ProfileSubTestCode->headerCellClass() ?>"><span id="elh_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode"><?php echo $lab_profile_details->ProfileSubTestCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details->TestOrder->Visible) { // TestOrder ?>
		<th class="<?php echo $lab_profile_details->TestOrder->headerCellClass() ?>"><span id="elh_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder"><?php echo $lab_profile_details->TestOrder->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_details->TestAmount->Visible) { // TestAmount ?>
		<th class="<?php echo $lab_profile_details->TestAmount->headerCellClass() ?>"><span id="elh_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount"><?php echo $lab_profile_details->TestAmount->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_profile_details_delete->RecCnt = 0;
$i = 0;
while (!$lab_profile_details_delete->Recordset->EOF) {
	$lab_profile_details_delete->RecCnt++;
	$lab_profile_details_delete->RowCnt++;

	// Set row properties
	$lab_profile_details->resetAttributes();
	$lab_profile_details->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_profile_details_delete->loadRowValues($lab_profile_details_delete->Recordset);

	// Render row
	$lab_profile_details_delete->renderRow();
?>
	<tr<?php echo $lab_profile_details->rowAttributes() ?>>
<?php if ($lab_profile_details->id->Visible) { // id ?>
		<td<?php echo $lab_profile_details->id->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCnt ?>_lab_profile_details_id" class="lab_profile_details_id">
<span<?php echo $lab_profile_details->id->viewAttributes() ?>>
<?php echo $lab_profile_details->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details->ProfileCode->Visible) { // ProfileCode ?>
		<td<?php echo $lab_profile_details->ProfileCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCnt ?>_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details->ProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details->SubProfileCode->Visible) { // SubProfileCode ?>
		<td<?php echo $lab_profile_details->SubProfileCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCnt ?>_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode">
<span<?php echo $lab_profile_details->SubProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_details->SubProfileCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details->ProfileTestCode->Visible) { // ProfileTestCode ?>
		<td<?php echo $lab_profile_details->ProfileTestCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCnt ?>_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode">
<span<?php echo $lab_profile_details->ProfileTestCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileTestCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
		<td<?php echo $lab_profile_details->ProfileSubTestCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCnt ?>_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode">
<span<?php echo $lab_profile_details->ProfileSubTestCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileSubTestCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details->TestOrder->Visible) { // TestOrder ?>
		<td<?php echo $lab_profile_details->TestOrder->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCnt ?>_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder">
<span<?php echo $lab_profile_details->TestOrder->viewAttributes() ?>>
<?php echo $lab_profile_details->TestOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_details->TestAmount->Visible) { // TestAmount ?>
		<td<?php echo $lab_profile_details->TestAmount->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_details_delete->RowCnt ?>_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount">
<span<?php echo $lab_profile_details->TestAmount->viewAttributes() ?>>
<?php echo $lab_profile_details->TestAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_profile_details_delete->Recordset->moveNext();
}
$lab_profile_details_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_profile_details_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_profile_details_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_profile_details_delete->terminate();
?>