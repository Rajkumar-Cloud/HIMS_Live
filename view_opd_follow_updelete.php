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
$view_opd_follow_up_delete = new view_opd_follow_up_delete();

// Run the page
$view_opd_follow_up_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_opd_follow_up_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_opd_follow_updelete = currentForm = new ew.Form("fview_opd_follow_updelete", "delete");

// Form_CustomValidate event
fview_opd_follow_updelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_opd_follow_updelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_opd_follow_updelete.lists["x_ICSIAdvised[]"] = <?php echo $view_opd_follow_up_delete->ICSIAdvised->Lookup->toClientList() ?>;
fview_opd_follow_updelete.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($view_opd_follow_up_delete->ICSIAdvised->options(FALSE, TRUE)) ?>;
fview_opd_follow_updelete.lists["x_DeliveryRegistered[]"] = <?php echo $view_opd_follow_up_delete->DeliveryRegistered->Lookup->toClientList() ?>;
fview_opd_follow_updelete.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($view_opd_follow_up_delete->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fview_opd_follow_updelete.lists["x_SerologyPositive[]"] = <?php echo $view_opd_follow_up_delete->SerologyPositive->Lookup->toClientList() ?>;
fview_opd_follow_updelete.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($view_opd_follow_up_delete->SerologyPositive->options(FALSE, TRUE)) ?>;
fview_opd_follow_updelete.lists["x_Allergy"] = <?php echo $view_opd_follow_up_delete->Allergy->Lookup->toClientList() ?>;
fview_opd_follow_updelete.lists["x_Allergy"].options = <?php echo JsonEncode($view_opd_follow_up_delete->Allergy->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_opd_follow_up_delete->showPageHeader(); ?>
<?php
$view_opd_follow_up_delete->showMessage();
?>
<form name="fview_opd_follow_updelete" id="fview_opd_follow_updelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_opd_follow_up_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_opd_follow_up_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_opd_follow_up_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_opd_follow_up->id->Visible) { // id ?>
		<th class="<?php echo $view_opd_follow_up->id->headerCellClass() ?>"><span id="elh_view_opd_follow_up_id" class="view_opd_follow_up_id"><?php echo $view_opd_follow_up->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->Reception->Visible) { // Reception ?>
		<th class="<?php echo $view_opd_follow_up->Reception->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception"><?php echo $view_opd_follow_up->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $view_opd_follow_up->PatientId->headerCellClass() ?>"><span id="elh_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId"><?php echo $view_opd_follow_up->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $view_opd_follow_up->mrnno->headerCellClass() ?>"><span id="elh_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno"><?php echo $view_opd_follow_up->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $view_opd_follow_up->PatientName->headerCellClass() ?>"><span id="elh_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName"><?php echo $view_opd_follow_up->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->Telephone->Visible) { // Telephone ?>
		<th class="<?php echo $view_opd_follow_up->Telephone->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone"><?php echo $view_opd_follow_up->Telephone->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->Age->Visible) { // Age ?>
		<th class="<?php echo $view_opd_follow_up->Age->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Age" class="view_opd_follow_up_Age"><?php echo $view_opd_follow_up->Age->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->Gender->Visible) { // Gender ?>
		<th class="<?php echo $view_opd_follow_up->Gender->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender"><?php echo $view_opd_follow_up->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<th class="<?php echo $view_opd_follow_up->NextReviewDate->headerCellClass() ?>"><span id="elh_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate"><?php echo $view_opd_follow_up->NextReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<th class="<?php echo $view_opd_follow_up->ICSIAdvised->headerCellClass() ?>"><span id="elh_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised"><?php echo $view_opd_follow_up->ICSIAdvised->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<th class="<?php echo $view_opd_follow_up->DeliveryRegistered->headerCellClass() ?>"><span id="elh_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered"><?php echo $view_opd_follow_up->DeliveryRegistered->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->EDD->Visible) { // EDD ?>
		<th class="<?php echo $view_opd_follow_up->EDD->headerCellClass() ?>"><span id="elh_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD"><?php echo $view_opd_follow_up->EDD->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
		<th class="<?php echo $view_opd_follow_up->SerologyPositive->headerCellClass() ?>"><span id="elh_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive"><?php echo $view_opd_follow_up->SerologyPositive->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->Allergy->Visible) { // Allergy ?>
		<th class="<?php echo $view_opd_follow_up->Allergy->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy"><?php echo $view_opd_follow_up->Allergy->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->status->Visible) { // status ?>
		<th class="<?php echo $view_opd_follow_up->status->headerCellClass() ?>"><span id="elh_view_opd_follow_up_status" class="view_opd_follow_up_status"><?php echo $view_opd_follow_up->status->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->createdby->Visible) { // createdby ?>
		<th class="<?php echo $view_opd_follow_up->createdby->headerCellClass() ?>"><span id="elh_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby"><?php echo $view_opd_follow_up->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_opd_follow_up->createddatetime->headerCellClass() ?>"><span id="elh_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime"><?php echo $view_opd_follow_up->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $view_opd_follow_up->modifiedby->headerCellClass() ?>"><span id="elh_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby"><?php echo $view_opd_follow_up->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $view_opd_follow_up->modifieddatetime->headerCellClass() ?>"><span id="elh_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime"><?php echo $view_opd_follow_up->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->LMP->Visible) { // LMP ?>
		<th class="<?php echo $view_opd_follow_up->LMP->headerCellClass() ?>"><span id="elh_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP"><?php echo $view_opd_follow_up->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<th class="<?php echo $view_opd_follow_up->ProcedureDateTime->headerCellClass() ?>"><span id="elh_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime"><?php echo $view_opd_follow_up->ProcedureDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
		<th class="<?php echo $view_opd_follow_up->ICSIDate->headerCellClass() ?>"><span id="elh_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate"><?php echo $view_opd_follow_up->ICSIDate->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_opd_follow_up_delete->RecCnt = 0;
$i = 0;
while (!$view_opd_follow_up_delete->Recordset->EOF) {
	$view_opd_follow_up_delete->RecCnt++;
	$view_opd_follow_up_delete->RowCnt++;

	// Set row properties
	$view_opd_follow_up->resetAttributes();
	$view_opd_follow_up->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_opd_follow_up_delete->loadRowValues($view_opd_follow_up_delete->Recordset);

	// Render row
	$view_opd_follow_up_delete->renderRow();
?>
	<tr<?php echo $view_opd_follow_up->rowAttributes() ?>>
<?php if ($view_opd_follow_up->id->Visible) { // id ?>
		<td<?php echo $view_opd_follow_up->id->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_id" class="view_opd_follow_up_id">
<span<?php echo $view_opd_follow_up->id->viewAttributes() ?>>
<?php echo $view_opd_follow_up->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->Reception->Visible) { // Reception ?>
		<td<?php echo $view_opd_follow_up->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception">
<span<?php echo $view_opd_follow_up->Reception->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->PatientId->Visible) { // PatientId ?>
		<td<?php echo $view_opd_follow_up->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId">
<span<?php echo $view_opd_follow_up->PatientId->viewAttributes() ?>>
<?php echo $view_opd_follow_up->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->mrnno->Visible) { // mrnno ?>
		<td<?php echo $view_opd_follow_up->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno">
<span<?php echo $view_opd_follow_up->mrnno->viewAttributes() ?>>
<?php echo $view_opd_follow_up->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->PatientName->Visible) { // PatientName ?>
		<td<?php echo $view_opd_follow_up->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName">
<span<?php echo $view_opd_follow_up->PatientName->viewAttributes() ?>>
<?php echo $view_opd_follow_up->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->Telephone->Visible) { // Telephone ?>
		<td<?php echo $view_opd_follow_up->Telephone->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone">
<span<?php echo $view_opd_follow_up->Telephone->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Telephone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->Age->Visible) { // Age ?>
		<td<?php echo $view_opd_follow_up->Age->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_Age" class="view_opd_follow_up_Age">
<span<?php echo $view_opd_follow_up->Age->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->Gender->Visible) { // Gender ?>
		<td<?php echo $view_opd_follow_up->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender">
<span<?php echo $view_opd_follow_up->Gender->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<td<?php echo $view_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate">
<span<?php echo $view_opd_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $view_opd_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td<?php echo $view_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised">
<span<?php echo $view_opd_follow_up->ICSIAdvised->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td<?php echo $view_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered">
<span<?php echo $view_opd_follow_up->DeliveryRegistered->viewAttributes() ?>>
<?php echo $view_opd_follow_up->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->EDD->Visible) { // EDD ?>
		<td<?php echo $view_opd_follow_up->EDD->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD">
<span<?php echo $view_opd_follow_up->EDD->viewAttributes() ?>>
<?php echo $view_opd_follow_up->EDD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
		<td<?php echo $view_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive">
<span<?php echo $view_opd_follow_up->SerologyPositive->viewAttributes() ?>>
<?php echo $view_opd_follow_up->SerologyPositive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->Allergy->Visible) { // Allergy ?>
		<td<?php echo $view_opd_follow_up->Allergy->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy">
<span<?php echo $view_opd_follow_up->Allergy->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Allergy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->status->Visible) { // status ?>
		<td<?php echo $view_opd_follow_up->status->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_status" class="view_opd_follow_up_status">
<span<?php echo $view_opd_follow_up->status->viewAttributes() ?>>
<?php echo $view_opd_follow_up->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->createdby->Visible) { // createdby ?>
		<td<?php echo $view_opd_follow_up->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby">
<span<?php echo $view_opd_follow_up->createdby->viewAttributes() ?>>
<?php echo $view_opd_follow_up->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $view_opd_follow_up->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime">
<span<?php echo $view_opd_follow_up->createddatetime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $view_opd_follow_up->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby">
<span<?php echo $view_opd_follow_up->modifiedby->viewAttributes() ?>>
<?php echo $view_opd_follow_up->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $view_opd_follow_up->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime">
<span<?php echo $view_opd_follow_up->modifieddatetime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->LMP->Visible) { // LMP ?>
		<td<?php echo $view_opd_follow_up->LMP->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP">
<span<?php echo $view_opd_follow_up->LMP->viewAttributes() ?>>
<?php echo $view_opd_follow_up->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td<?php echo $view_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime">
<span<?php echo $view_opd_follow_up->ProcedureDateTime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
		<td<?php echo $view_opd_follow_up->ICSIDate->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCnt ?>_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate">
<span<?php echo $view_opd_follow_up->ICSIDate->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ICSIDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_opd_follow_up_delete->Recordset->moveNext();
}
$view_opd_follow_up_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_opd_follow_up_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_opd_follow_up_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_opd_follow_up_delete->terminate();
?>