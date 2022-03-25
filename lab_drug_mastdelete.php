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
$lab_drug_mast_delete = new lab_drug_mast_delete();

// Run the page
$lab_drug_mast_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_drug_mast_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flab_drug_mastdelete = currentForm = new ew.Form("flab_drug_mastdelete", "delete");

// Form_CustomValidate event
flab_drug_mastdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_drug_mastdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_drug_mast_delete->showPageHeader(); ?>
<?php
$lab_drug_mast_delete->showMessage();
?>
<form name="flab_drug_mastdelete" id="flab_drug_mastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_drug_mast_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_drug_mast_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_drug_mast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_drug_mast->DrugName->Visible) { // DrugName ?>
		<th class="<?php echo $lab_drug_mast->DrugName->headerCellClass() ?>"><span id="elh_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName"><?php echo $lab_drug_mast->DrugName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast->Positive->Visible) { // Positive ?>
		<th class="<?php echo $lab_drug_mast->Positive->headerCellClass() ?>"><span id="elh_lab_drug_mast_Positive" class="lab_drug_mast_Positive"><?php echo $lab_drug_mast->Positive->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast->Negative->Visible) { // Negative ?>
		<th class="<?php echo $lab_drug_mast->Negative->headerCellClass() ?>"><span id="elh_lab_drug_mast_Negative" class="lab_drug_mast_Negative"><?php echo $lab_drug_mast->Negative->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast->ShortName->Visible) { // ShortName ?>
		<th class="<?php echo $lab_drug_mast->ShortName->headerCellClass() ?>"><span id="elh_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName"><?php echo $lab_drug_mast->ShortName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast->GroupCD->Visible) { // GroupCD ?>
		<th class="<?php echo $lab_drug_mast->GroupCD->headerCellClass() ?>"><span id="elh_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD"><?php echo $lab_drug_mast->GroupCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast->Content->Visible) { // Content ?>
		<th class="<?php echo $lab_drug_mast->Content->headerCellClass() ?>"><span id="elh_lab_drug_mast_Content" class="lab_drug_mast_Content"><?php echo $lab_drug_mast->Content->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast->Order->Visible) { // Order ?>
		<th class="<?php echo $lab_drug_mast->Order->headerCellClass() ?>"><span id="elh_lab_drug_mast_Order" class="lab_drug_mast_Order"><?php echo $lab_drug_mast->Order->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast->DrugCD->Visible) { // DrugCD ?>
		<th class="<?php echo $lab_drug_mast->DrugCD->headerCellClass() ?>"><span id="elh_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD"><?php echo $lab_drug_mast->DrugCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast->id->Visible) { // id ?>
		<th class="<?php echo $lab_drug_mast->id->headerCellClass() ?>"><span id="elh_lab_drug_mast_id" class="lab_drug_mast_id"><?php echo $lab_drug_mast->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_drug_mast_delete->RecCnt = 0;
$i = 0;
while (!$lab_drug_mast_delete->Recordset->EOF) {
	$lab_drug_mast_delete->RecCnt++;
	$lab_drug_mast_delete->RowCnt++;

	// Set row properties
	$lab_drug_mast->resetAttributes();
	$lab_drug_mast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_drug_mast_delete->loadRowValues($lab_drug_mast_delete->Recordset);

	// Render row
	$lab_drug_mast_delete->renderRow();
?>
	<tr<?php echo $lab_drug_mast->rowAttributes() ?>>
<?php if ($lab_drug_mast->DrugName->Visible) { // DrugName ?>
		<td<?php echo $lab_drug_mast->DrugName->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCnt ?>_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName">
<span<?php echo $lab_drug_mast->DrugName->viewAttributes() ?>>
<?php echo $lab_drug_mast->DrugName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast->Positive->Visible) { // Positive ?>
		<td<?php echo $lab_drug_mast->Positive->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCnt ?>_lab_drug_mast_Positive" class="lab_drug_mast_Positive">
<span<?php echo $lab_drug_mast->Positive->viewAttributes() ?>>
<?php echo $lab_drug_mast->Positive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast->Negative->Visible) { // Negative ?>
		<td<?php echo $lab_drug_mast->Negative->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCnt ?>_lab_drug_mast_Negative" class="lab_drug_mast_Negative">
<span<?php echo $lab_drug_mast->Negative->viewAttributes() ?>>
<?php echo $lab_drug_mast->Negative->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast->ShortName->Visible) { // ShortName ?>
		<td<?php echo $lab_drug_mast->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCnt ?>_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName">
<span<?php echo $lab_drug_mast->ShortName->viewAttributes() ?>>
<?php echo $lab_drug_mast->ShortName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast->GroupCD->Visible) { // GroupCD ?>
		<td<?php echo $lab_drug_mast->GroupCD->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCnt ?>_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD">
<span<?php echo $lab_drug_mast->GroupCD->viewAttributes() ?>>
<?php echo $lab_drug_mast->GroupCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast->Content->Visible) { // Content ?>
		<td<?php echo $lab_drug_mast->Content->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCnt ?>_lab_drug_mast_Content" class="lab_drug_mast_Content">
<span<?php echo $lab_drug_mast->Content->viewAttributes() ?>>
<?php echo $lab_drug_mast->Content->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast->Order->Visible) { // Order ?>
		<td<?php echo $lab_drug_mast->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCnt ?>_lab_drug_mast_Order" class="lab_drug_mast_Order">
<span<?php echo $lab_drug_mast->Order->viewAttributes() ?>>
<?php echo $lab_drug_mast->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast->DrugCD->Visible) { // DrugCD ?>
		<td<?php echo $lab_drug_mast->DrugCD->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCnt ?>_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD">
<span<?php echo $lab_drug_mast->DrugCD->viewAttributes() ?>>
<?php echo $lab_drug_mast->DrugCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast->id->Visible) { // id ?>
		<td<?php echo $lab_drug_mast->id->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCnt ?>_lab_drug_mast_id" class="lab_drug_mast_id">
<span<?php echo $lab_drug_mast->id->viewAttributes() ?>>
<?php echo $lab_drug_mast->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_drug_mast_delete->Recordset->moveNext();
}
$lab_drug_mast_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_drug_mast_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_drug_mast_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_drug_mast_delete->terminate();
?>