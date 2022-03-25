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
$lab_agerange_delete = new lab_agerange_delete();

// Run the page
$lab_agerange_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_agerange_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flab_agerangedelete = currentForm = new ew.Form("flab_agerangedelete", "delete");

// Form_CustomValidate event
flab_agerangedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_agerangedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_agerangedelete.lists["x_Gender"] = <?php echo $lab_agerange_delete->Gender->Lookup->toClientList() ?>;
flab_agerangedelete.lists["x_Gender"].options = <?php echo JsonEncode($lab_agerange_delete->Gender->lookupOptions()) ?>;
flab_agerangedelete.lists["x_MinAgeType"] = <?php echo $lab_agerange_delete->MinAgeType->Lookup->toClientList() ?>;
flab_agerangedelete.lists["x_MinAgeType"].options = <?php echo JsonEncode($lab_agerange_delete->MinAgeType->options(FALSE, TRUE)) ?>;
flab_agerangedelete.lists["x_MaxAgeType"] = <?php echo $lab_agerange_delete->MaxAgeType->Lookup->toClientList() ?>;
flab_agerangedelete.lists["x_MaxAgeType"].options = <?php echo JsonEncode($lab_agerange_delete->MaxAgeType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_agerange_delete->showPageHeader(); ?>
<?php
$lab_agerange_delete->showMessage();
?>
<form name="flab_agerangedelete" id="flab_agerangedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_agerange_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_agerange_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_agerange">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_agerange_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_agerange->id->Visible) { // id ?>
		<th class="<?php echo $lab_agerange->id->headerCellClass() ?>"><span id="elh_lab_agerange_id" class="lab_agerange_id"><?php echo $lab_agerange->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
		<th class="<?php echo $lab_agerange->Gender->headerCellClass() ?>"><span id="elh_lab_agerange_Gender" class="lab_agerange_Gender"><?php echo $lab_agerange->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
		<th class="<?php echo $lab_agerange->MinAge->headerCellClass() ?>"><span id="elh_lab_agerange_MinAge" class="lab_agerange_MinAge"><?php echo $lab_agerange->MinAge->caption() ?></span></th>
<?php } ?>
<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
		<th class="<?php echo $lab_agerange->MinAgeType->headerCellClass() ?>"><span id="elh_lab_agerange_MinAgeType" class="lab_agerange_MinAgeType"><?php echo $lab_agerange->MinAgeType->caption() ?></span></th>
<?php } ?>
<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
		<th class="<?php echo $lab_agerange->MaxAge->headerCellClass() ?>"><span id="elh_lab_agerange_MaxAge" class="lab_agerange_MaxAge"><?php echo $lab_agerange->MaxAge->caption() ?></span></th>
<?php } ?>
<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
		<th class="<?php echo $lab_agerange->MaxAgeType->headerCellClass() ?>"><span id="elh_lab_agerange_MaxAgeType" class="lab_agerange_MaxAgeType"><?php echo $lab_agerange->MaxAgeType->caption() ?></span></th>
<?php } ?>
<?php if ($lab_agerange->Value->Visible) { // Value ?>
		<th class="<?php echo $lab_agerange->Value->headerCellClass() ?>"><span id="elh_lab_agerange_Value" class="lab_agerange_Value"><?php echo $lab_agerange->Value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_agerange_delete->RecCnt = 0;
$i = 0;
while (!$lab_agerange_delete->Recordset->EOF) {
	$lab_agerange_delete->RecCnt++;
	$lab_agerange_delete->RowCnt++;

	// Set row properties
	$lab_agerange->resetAttributes();
	$lab_agerange->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_agerange_delete->loadRowValues($lab_agerange_delete->Recordset);

	// Render row
	$lab_agerange_delete->renderRow();
?>
	<tr<?php echo $lab_agerange->rowAttributes() ?>>
<?php if ($lab_agerange->id->Visible) { // id ?>
		<td<?php echo $lab_agerange->id->cellAttributes() ?>>
<span id="el<?php echo $lab_agerange_delete->RowCnt ?>_lab_agerange_id" class="lab_agerange_id">
<span<?php echo $lab_agerange->id->viewAttributes() ?>>
<?php echo $lab_agerange->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
		<td<?php echo $lab_agerange->Gender->cellAttributes() ?>>
<span id="el<?php echo $lab_agerange_delete->RowCnt ?>_lab_agerange_Gender" class="lab_agerange_Gender">
<span<?php echo $lab_agerange->Gender->viewAttributes() ?>>
<?php echo $lab_agerange->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
		<td<?php echo $lab_agerange->MinAge->cellAttributes() ?>>
<span id="el<?php echo $lab_agerange_delete->RowCnt ?>_lab_agerange_MinAge" class="lab_agerange_MinAge">
<span<?php echo $lab_agerange->MinAge->viewAttributes() ?>>
<?php echo $lab_agerange->MinAge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
		<td<?php echo $lab_agerange->MinAgeType->cellAttributes() ?>>
<span id="el<?php echo $lab_agerange_delete->RowCnt ?>_lab_agerange_MinAgeType" class="lab_agerange_MinAgeType">
<span<?php echo $lab_agerange->MinAgeType->viewAttributes() ?>>
<?php echo $lab_agerange->MinAgeType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
		<td<?php echo $lab_agerange->MaxAge->cellAttributes() ?>>
<span id="el<?php echo $lab_agerange_delete->RowCnt ?>_lab_agerange_MaxAge" class="lab_agerange_MaxAge">
<span<?php echo $lab_agerange->MaxAge->viewAttributes() ?>>
<?php echo $lab_agerange->MaxAge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
		<td<?php echo $lab_agerange->MaxAgeType->cellAttributes() ?>>
<span id="el<?php echo $lab_agerange_delete->RowCnt ?>_lab_agerange_MaxAgeType" class="lab_agerange_MaxAgeType">
<span<?php echo $lab_agerange->MaxAgeType->viewAttributes() ?>>
<?php echo $lab_agerange->MaxAgeType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_agerange->Value->Visible) { // Value ?>
		<td<?php echo $lab_agerange->Value->cellAttributes() ?>>
<span id="el<?php echo $lab_agerange_delete->RowCnt ?>_lab_agerange_Value" class="lab_agerange_Value">
<span<?php echo $lab_agerange->Value->viewAttributes() ?>>
<?php echo $lab_agerange->Value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_agerange_delete->Recordset->moveNext();
}
$lab_agerange_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_agerange_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_agerange_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_agerange_delete->terminate();
?>