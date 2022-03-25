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
$lab_testname_delete = new lab_testname_delete();

// Run the page
$lab_testname_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_testname_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flab_testnamedelete = currentForm = new ew.Form("flab_testnamedelete", "delete");

// Form_CustomValidate event
flab_testnamedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_testnamedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_testnamedelete.lists["x_SampleType"] = <?php echo $lab_testname_delete->SampleType->Lookup->toClientList() ?>;
flab_testnamedelete.lists["x_SampleType"].options = <?php echo JsonEncode($lab_testname_delete->SampleType->lookupOptions()) ?>;
flab_testnamedelete.lists["x_Department"] = <?php echo $lab_testname_delete->Department->Lookup->toClientList() ?>;
flab_testnamedelete.lists["x_Department"].options = <?php echo JsonEncode($lab_testname_delete->Department->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_testname_delete->showPageHeader(); ?>
<?php
$lab_testname_delete->showMessage();
?>
<form name="flab_testnamedelete" id="flab_testnamedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_testname_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_testname_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_testname">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_testname_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_testname->id->Visible) { // id ?>
		<th class="<?php echo $lab_testname->id->headerCellClass() ?>"><span id="elh_lab_testname_id" class="lab_testname_id"><?php echo $lab_testname->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_testname->TestCode->Visible) { // TestCode ?>
		<th class="<?php echo $lab_testname->TestCode->headerCellClass() ?>"><span id="elh_lab_testname_TestCode" class="lab_testname_TestCode"><?php echo $lab_testname->TestCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_testname->Name->Visible) { // Name ?>
		<th class="<?php echo $lab_testname->Name->headerCellClass() ?>"><span id="elh_lab_testname_Name" class="lab_testname_Name"><?php echo $lab_testname->Name->caption() ?></span></th>
<?php } ?>
<?php if ($lab_testname->SampleType->Visible) { // SampleType ?>
		<th class="<?php echo $lab_testname->SampleType->headerCellClass() ?>"><span id="elh_lab_testname_SampleType" class="lab_testname_SampleType"><?php echo $lab_testname->SampleType->caption() ?></span></th>
<?php } ?>
<?php if ($lab_testname->Department->Visible) { // Department ?>
		<th class="<?php echo $lab_testname->Department->headerCellClass() ?>"><span id="elh_lab_testname_Department" class="lab_testname_Department"><?php echo $lab_testname->Department->caption() ?></span></th>
<?php } ?>
<?php if ($lab_testname->schedule->Visible) { // schedule ?>
		<th class="<?php echo $lab_testname->schedule->headerCellClass() ?>"><span id="elh_lab_testname_schedule" class="lab_testname_schedule"><?php echo $lab_testname->schedule->caption() ?></span></th>
<?php } ?>
<?php if ($lab_testname->Created->Visible) { // Created ?>
		<th class="<?php echo $lab_testname->Created->headerCellClass() ?>"><span id="elh_lab_testname_Created" class="lab_testname_Created"><?php echo $lab_testname->Created->caption() ?></span></th>
<?php } ?>
<?php if ($lab_testname->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $lab_testname->CreatedBy->headerCellClass() ?>"><span id="elh_lab_testname_CreatedBy" class="lab_testname_CreatedBy"><?php echo $lab_testname->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($lab_testname->Modified->Visible) { // Modified ?>
		<th class="<?php echo $lab_testname->Modified->headerCellClass() ?>"><span id="elh_lab_testname_Modified" class="lab_testname_Modified"><?php echo $lab_testname->Modified->caption() ?></span></th>
<?php } ?>
<?php if ($lab_testname->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $lab_testname->ModifiedBy->headerCellClass() ?>"><span id="elh_lab_testname_ModifiedBy" class="lab_testname_ModifiedBy"><?php echo $lab_testname->ModifiedBy->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_testname_delete->RecCnt = 0;
$i = 0;
while (!$lab_testname_delete->Recordset->EOF) {
	$lab_testname_delete->RecCnt++;
	$lab_testname_delete->RowCnt++;

	// Set row properties
	$lab_testname->resetAttributes();
	$lab_testname->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_testname_delete->loadRowValues($lab_testname_delete->Recordset);

	// Render row
	$lab_testname_delete->renderRow();
?>
	<tr<?php echo $lab_testname->rowAttributes() ?>>
<?php if ($lab_testname->id->Visible) { // id ?>
		<td<?php echo $lab_testname->id->cellAttributes() ?>>
<span id="el<?php echo $lab_testname_delete->RowCnt ?>_lab_testname_id" class="lab_testname_id">
<span<?php echo $lab_testname->id->viewAttributes() ?>>
<?php echo $lab_testname->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_testname->TestCode->Visible) { // TestCode ?>
		<td<?php echo $lab_testname->TestCode->cellAttributes() ?>>
<span id="el<?php echo $lab_testname_delete->RowCnt ?>_lab_testname_TestCode" class="lab_testname_TestCode">
<span<?php echo $lab_testname->TestCode->viewAttributes() ?>>
<?php echo $lab_testname->TestCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_testname->Name->Visible) { // Name ?>
		<td<?php echo $lab_testname->Name->cellAttributes() ?>>
<span id="el<?php echo $lab_testname_delete->RowCnt ?>_lab_testname_Name" class="lab_testname_Name">
<span<?php echo $lab_testname->Name->viewAttributes() ?>>
<?php echo $lab_testname->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_testname->SampleType->Visible) { // SampleType ?>
		<td<?php echo $lab_testname->SampleType->cellAttributes() ?>>
<span id="el<?php echo $lab_testname_delete->RowCnt ?>_lab_testname_SampleType" class="lab_testname_SampleType">
<span<?php echo $lab_testname->SampleType->viewAttributes() ?>>
<?php echo $lab_testname->SampleType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_testname->Department->Visible) { // Department ?>
		<td<?php echo $lab_testname->Department->cellAttributes() ?>>
<span id="el<?php echo $lab_testname_delete->RowCnt ?>_lab_testname_Department" class="lab_testname_Department">
<span<?php echo $lab_testname->Department->viewAttributes() ?>>
<?php echo $lab_testname->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_testname->schedule->Visible) { // schedule ?>
		<td<?php echo $lab_testname->schedule->cellAttributes() ?>>
<span id="el<?php echo $lab_testname_delete->RowCnt ?>_lab_testname_schedule" class="lab_testname_schedule">
<span<?php echo $lab_testname->schedule->viewAttributes() ?>>
<?php echo $lab_testname->schedule->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_testname->Created->Visible) { // Created ?>
		<td<?php echo $lab_testname->Created->cellAttributes() ?>>
<span id="el<?php echo $lab_testname_delete->RowCnt ?>_lab_testname_Created" class="lab_testname_Created">
<span<?php echo $lab_testname->Created->viewAttributes() ?>>
<?php echo $lab_testname->Created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_testname->CreatedBy->Visible) { // CreatedBy ?>
		<td<?php echo $lab_testname->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $lab_testname_delete->RowCnt ?>_lab_testname_CreatedBy" class="lab_testname_CreatedBy">
<span<?php echo $lab_testname->CreatedBy->viewAttributes() ?>>
<?php echo $lab_testname->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_testname->Modified->Visible) { // Modified ?>
		<td<?php echo $lab_testname->Modified->cellAttributes() ?>>
<span id="el<?php echo $lab_testname_delete->RowCnt ?>_lab_testname_Modified" class="lab_testname_Modified">
<span<?php echo $lab_testname->Modified->viewAttributes() ?>>
<?php echo $lab_testname->Modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_testname->ModifiedBy->Visible) { // ModifiedBy ?>
		<td<?php echo $lab_testname->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $lab_testname_delete->RowCnt ?>_lab_testname_ModifiedBy" class="lab_testname_ModifiedBy">
<span<?php echo $lab_testname->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_testname->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_testname_delete->Recordset->moveNext();
}
$lab_testname_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_testname_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_testname_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_testname_delete->terminate();
?>