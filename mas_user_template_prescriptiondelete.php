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
$mas_user_template_prescription_delete = new mas_user_template_prescription_delete();

// Run the page
$mas_user_template_prescription_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_prescription_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_user_template_prescriptiondelete = currentForm = new ew.Form("fmas_user_template_prescriptiondelete", "delete");

// Form_CustomValidate event
fmas_user_template_prescriptiondelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_user_template_prescriptiondelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_user_template_prescriptiondelete.lists["x_TemplateName"] = <?php echo $mas_user_template_prescription_delete->TemplateName->Lookup->toClientList() ?>;
fmas_user_template_prescriptiondelete.lists["x_TemplateName"].options = <?php echo JsonEncode($mas_user_template_prescription_delete->TemplateName->lookupOptions()) ?>;
fmas_user_template_prescriptiondelete.lists["x_Medicine"] = <?php echo $mas_user_template_prescription_delete->Medicine->Lookup->toClientList() ?>;
fmas_user_template_prescriptiondelete.lists["x_Medicine"].options = <?php echo JsonEncode($mas_user_template_prescription_delete->Medicine->lookupOptions()) ?>;
fmas_user_template_prescriptiondelete.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fmas_user_template_prescriptiondelete.lists["x_PreRoute"] = <?php echo $mas_user_template_prescription_delete->PreRoute->Lookup->toClientList() ?>;
fmas_user_template_prescriptiondelete.lists["x_PreRoute"].options = <?php echo JsonEncode($mas_user_template_prescription_delete->PreRoute->lookupOptions()) ?>;
fmas_user_template_prescriptiondelete.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fmas_user_template_prescriptiondelete.lists["x_TimeOfTaking"] = <?php echo $mas_user_template_prescription_delete->TimeOfTaking->Lookup->toClientList() ?>;
fmas_user_template_prescriptiondelete.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($mas_user_template_prescription_delete->TimeOfTaking->lookupOptions()) ?>;
fmas_user_template_prescriptiondelete.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_user_template_prescription_delete->showPageHeader(); ?>
<?php
$mas_user_template_prescription_delete->showMessage();
?>
<form name="fmas_user_template_prescriptiondelete" id="fmas_user_template_prescriptiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_user_template_prescription_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_user_template_prescription_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_user_template_prescription_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_user_template_prescription->id->Visible) { // id ?>
		<th class="<?php echo $mas_user_template_prescription->id->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_id" class="mas_user_template_prescription_id"><?php echo $mas_user_template_prescription->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->TemplateName->Visible) { // TemplateName ?>
		<th class="<?php echo $mas_user_template_prescription->TemplateName->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_TemplateName" class="mas_user_template_prescription_TemplateName"><?php echo $mas_user_template_prescription->TemplateName->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->Medicine->Visible) { // Medicine ?>
		<th class="<?php echo $mas_user_template_prescription->Medicine->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_Medicine" class="mas_user_template_prescription_Medicine"><?php echo $mas_user_template_prescription->Medicine->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->M->Visible) { // M ?>
		<th class="<?php echo $mas_user_template_prescription->M->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_M" class="mas_user_template_prescription_M"><?php echo $mas_user_template_prescription->M->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->A->Visible) { // A ?>
		<th class="<?php echo $mas_user_template_prescription->A->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_A" class="mas_user_template_prescription_A"><?php echo $mas_user_template_prescription->A->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->N->Visible) { // N ?>
		<th class="<?php echo $mas_user_template_prescription->N->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_N" class="mas_user_template_prescription_N"><?php echo $mas_user_template_prescription->N->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<th class="<?php echo $mas_user_template_prescription->NoOfDays->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_NoOfDays" class="mas_user_template_prescription_NoOfDays"><?php echo $mas_user_template_prescription->NoOfDays->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->PreRoute->Visible) { // PreRoute ?>
		<th class="<?php echo $mas_user_template_prescription->PreRoute->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_PreRoute" class="mas_user_template_prescription_PreRoute"><?php echo $mas_user_template_prescription->PreRoute->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<th class="<?php echo $mas_user_template_prescription->TimeOfTaking->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_TimeOfTaking" class="mas_user_template_prescription_TimeOfTaking"><?php echo $mas_user_template_prescription->TimeOfTaking->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $mas_user_template_prescription->CreatedBy->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_CreatedBy" class="mas_user_template_prescription_CreatedBy"><?php echo $mas_user_template_prescription->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<th class="<?php echo $mas_user_template_prescription->CreateDateTime->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_CreateDateTime" class="mas_user_template_prescription_CreateDateTime"><?php echo $mas_user_template_prescription->CreateDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $mas_user_template_prescription->ModifiedBy->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_ModifiedBy" class="mas_user_template_prescription_ModifiedBy"><?php echo $mas_user_template_prescription->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<th class="<?php echo $mas_user_template_prescription->ModifiedDateTime->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_ModifiedDateTime" class="mas_user_template_prescription_ModifiedDateTime"><?php echo $mas_user_template_prescription->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_user_template_prescription_delete->RecCnt = 0;
$i = 0;
while (!$mas_user_template_prescription_delete->Recordset->EOF) {
	$mas_user_template_prescription_delete->RecCnt++;
	$mas_user_template_prescription_delete->RowCnt++;

	// Set row properties
	$mas_user_template_prescription->resetAttributes();
	$mas_user_template_prescription->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_user_template_prescription_delete->loadRowValues($mas_user_template_prescription_delete->Recordset);

	// Render row
	$mas_user_template_prescription_delete->renderRow();
?>
	<tr<?php echo $mas_user_template_prescription->rowAttributes() ?>>
<?php if ($mas_user_template_prescription->id->Visible) { // id ?>
		<td<?php echo $mas_user_template_prescription->id->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_id" class="mas_user_template_prescription_id">
<span<?php echo $mas_user_template_prescription->id->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->TemplateName->Visible) { // TemplateName ?>
		<td<?php echo $mas_user_template_prescription->TemplateName->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_TemplateName" class="mas_user_template_prescription_TemplateName">
<span<?php echo $mas_user_template_prescription->TemplateName->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->TemplateName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->Medicine->Visible) { // Medicine ?>
		<td<?php echo $mas_user_template_prescription->Medicine->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_Medicine" class="mas_user_template_prescription_Medicine">
<span<?php echo $mas_user_template_prescription->Medicine->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->Medicine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->M->Visible) { // M ?>
		<td<?php echo $mas_user_template_prescription->M->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_M" class="mas_user_template_prescription_M">
<span<?php echo $mas_user_template_prescription->M->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->M->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->A->Visible) { // A ?>
		<td<?php echo $mas_user_template_prescription->A->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_A" class="mas_user_template_prescription_A">
<span<?php echo $mas_user_template_prescription->A->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->A->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->N->Visible) { // N ?>
		<td<?php echo $mas_user_template_prescription->N->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_N" class="mas_user_template_prescription_N">
<span<?php echo $mas_user_template_prescription->N->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<td<?php echo $mas_user_template_prescription->NoOfDays->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_NoOfDays" class="mas_user_template_prescription_NoOfDays">
<span<?php echo $mas_user_template_prescription->NoOfDays->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->NoOfDays->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->PreRoute->Visible) { // PreRoute ?>
		<td<?php echo $mas_user_template_prescription->PreRoute->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_PreRoute" class="mas_user_template_prescription_PreRoute">
<span<?php echo $mas_user_template_prescription->PreRoute->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->PreRoute->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td<?php echo $mas_user_template_prescription->TimeOfTaking->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_TimeOfTaking" class="mas_user_template_prescription_TimeOfTaking">
<span<?php echo $mas_user_template_prescription->TimeOfTaking->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<td<?php echo $mas_user_template_prescription->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_CreatedBy" class="mas_user_template_prescription_CreatedBy">
<span<?php echo $mas_user_template_prescription->CreatedBy->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<td<?php echo $mas_user_template_prescription->CreateDateTime->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_CreateDateTime" class="mas_user_template_prescription_CreateDateTime">
<span<?php echo $mas_user_template_prescription->CreateDateTime->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->CreateDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<td<?php echo $mas_user_template_prescription->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_ModifiedBy" class="mas_user_template_prescription_ModifiedBy">
<span<?php echo $mas_user_template_prescription->ModifiedBy->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td<?php echo $mas_user_template_prescription->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCnt ?>_mas_user_template_prescription_ModifiedDateTime" class="mas_user_template_prescription_ModifiedDateTime">
<span<?php echo $mas_user_template_prescription->ModifiedDateTime->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_user_template_prescription_delete->Recordset->moveNext();
}
$mas_user_template_prescription_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_user_template_prescription_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_user_template_prescription_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_user_template_prescription_delete->terminate();
?>