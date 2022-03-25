<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<script>
var fview_opd_follow_updelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_opd_follow_updelete = currentForm = new ew.Form("fview_opd_follow_updelete", "delete");
	loadjs.done("fview_opd_follow_updelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_opd_follow_up_delete->showPageHeader(); ?>
<?php
$view_opd_follow_up_delete->showMessage();
?>
<form name="fview_opd_follow_updelete" id="fview_opd_follow_updelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_opd_follow_up_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_opd_follow_up_delete->id->Visible) { // id ?>
		<th class="<?php echo $view_opd_follow_up_delete->id->headerCellClass() ?>"><span id="elh_view_opd_follow_up_id" class="view_opd_follow_up_id"><?php echo $view_opd_follow_up_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $view_opd_follow_up_delete->Reception->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception"><?php echo $view_opd_follow_up_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $view_opd_follow_up_delete->PatientId->headerCellClass() ?>"><span id="elh_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId"><?php echo $view_opd_follow_up_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $view_opd_follow_up_delete->mrnno->headerCellClass() ?>"><span id="elh_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno"><?php echo $view_opd_follow_up_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $view_opd_follow_up_delete->PatientName->headerCellClass() ?>"><span id="elh_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName"><?php echo $view_opd_follow_up_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->Telephone->Visible) { // Telephone ?>
		<th class="<?php echo $view_opd_follow_up_delete->Telephone->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone"><?php echo $view_opd_follow_up_delete->Telephone->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $view_opd_follow_up_delete->Age->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Age" class="view_opd_follow_up_Age"><?php echo $view_opd_follow_up_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $view_opd_follow_up_delete->Gender->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender"><?php echo $view_opd_follow_up_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->NextReviewDate->Visible) { // NextReviewDate ?>
		<th class="<?php echo $view_opd_follow_up_delete->NextReviewDate->headerCellClass() ?>"><span id="elh_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate"><?php echo $view_opd_follow_up_delete->NextReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<th class="<?php echo $view_opd_follow_up_delete->ICSIAdvised->headerCellClass() ?>"><span id="elh_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised"><?php echo $view_opd_follow_up_delete->ICSIAdvised->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<th class="<?php echo $view_opd_follow_up_delete->DeliveryRegistered->headerCellClass() ?>"><span id="elh_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered"><?php echo $view_opd_follow_up_delete->DeliveryRegistered->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->EDD->Visible) { // EDD ?>
		<th class="<?php echo $view_opd_follow_up_delete->EDD->headerCellClass() ?>"><span id="elh_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD"><?php echo $view_opd_follow_up_delete->EDD->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->SerologyPositive->Visible) { // SerologyPositive ?>
		<th class="<?php echo $view_opd_follow_up_delete->SerologyPositive->headerCellClass() ?>"><span id="elh_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive"><?php echo $view_opd_follow_up_delete->SerologyPositive->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->Allergy->Visible) { // Allergy ?>
		<th class="<?php echo $view_opd_follow_up_delete->Allergy->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy"><?php echo $view_opd_follow_up_delete->Allergy->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->status->Visible) { // status ?>
		<th class="<?php echo $view_opd_follow_up_delete->status->headerCellClass() ?>"><span id="elh_view_opd_follow_up_status" class="view_opd_follow_up_status"><?php echo $view_opd_follow_up_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $view_opd_follow_up_delete->createdby->headerCellClass() ?>"><span id="elh_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby"><?php echo $view_opd_follow_up_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_opd_follow_up_delete->createddatetime->headerCellClass() ?>"><span id="elh_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime"><?php echo $view_opd_follow_up_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $view_opd_follow_up_delete->modifiedby->headerCellClass() ?>"><span id="elh_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby"><?php echo $view_opd_follow_up_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $view_opd_follow_up_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime"><?php echo $view_opd_follow_up_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->LMP->Visible) { // LMP ?>
		<th class="<?php echo $view_opd_follow_up_delete->LMP->headerCellClass() ?>"><span id="elh_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP"><?php echo $view_opd_follow_up_delete->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<th class="<?php echo $view_opd_follow_up_delete->ProcedureDateTime->headerCellClass() ?>"><span id="elh_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime"><?php echo $view_opd_follow_up_delete->ProcedureDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($view_opd_follow_up_delete->ICSIDate->Visible) { // ICSIDate ?>
		<th class="<?php echo $view_opd_follow_up_delete->ICSIDate->headerCellClass() ?>"><span id="elh_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate"><?php echo $view_opd_follow_up_delete->ICSIDate->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_opd_follow_up_delete->RecordCount = 0;
$i = 0;
while (!$view_opd_follow_up_delete->Recordset->EOF) {
	$view_opd_follow_up_delete->RecordCount++;
	$view_opd_follow_up_delete->RowCount++;

	// Set row properties
	$view_opd_follow_up->resetAttributes();
	$view_opd_follow_up->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_opd_follow_up_delete->loadRowValues($view_opd_follow_up_delete->Recordset);

	// Render row
	$view_opd_follow_up_delete->renderRow();
?>
	<tr <?php echo $view_opd_follow_up->rowAttributes() ?>>
<?php if ($view_opd_follow_up_delete->id->Visible) { // id ?>
		<td <?php echo $view_opd_follow_up_delete->id->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_id" class="view_opd_follow_up_id">
<span<?php echo $view_opd_follow_up_delete->id->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $view_opd_follow_up_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception">
<span<?php echo $view_opd_follow_up_delete->Reception->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $view_opd_follow_up_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId">
<span<?php echo $view_opd_follow_up_delete->PatientId->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $view_opd_follow_up_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno">
<span<?php echo $view_opd_follow_up_delete->mrnno->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $view_opd_follow_up_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName">
<span<?php echo $view_opd_follow_up_delete->PatientName->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->Telephone->Visible) { // Telephone ?>
		<td <?php echo $view_opd_follow_up_delete->Telephone->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone">
<span<?php echo $view_opd_follow_up_delete->Telephone->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->Telephone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->Age->Visible) { // Age ?>
		<td <?php echo $view_opd_follow_up_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_Age" class="view_opd_follow_up_Age">
<span<?php echo $view_opd_follow_up_delete->Age->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $view_opd_follow_up_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender">
<span<?php echo $view_opd_follow_up_delete->Gender->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->NextReviewDate->Visible) { // NextReviewDate ?>
		<td <?php echo $view_opd_follow_up_delete->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate">
<span<?php echo $view_opd_follow_up_delete->NextReviewDate->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->NextReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td <?php echo $view_opd_follow_up_delete->ICSIAdvised->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised">
<span<?php echo $view_opd_follow_up_delete->ICSIAdvised->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td <?php echo $view_opd_follow_up_delete->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered">
<span<?php echo $view_opd_follow_up_delete->DeliveryRegistered->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->EDD->Visible) { // EDD ?>
		<td <?php echo $view_opd_follow_up_delete->EDD->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD">
<span<?php echo $view_opd_follow_up_delete->EDD->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->EDD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->SerologyPositive->Visible) { // SerologyPositive ?>
		<td <?php echo $view_opd_follow_up_delete->SerologyPositive->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive">
<span<?php echo $view_opd_follow_up_delete->SerologyPositive->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->SerologyPositive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->Allergy->Visible) { // Allergy ?>
		<td <?php echo $view_opd_follow_up_delete->Allergy->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy">
<span<?php echo $view_opd_follow_up_delete->Allergy->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->Allergy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->status->Visible) { // status ?>
		<td <?php echo $view_opd_follow_up_delete->status->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_status" class="view_opd_follow_up_status">
<span<?php echo $view_opd_follow_up_delete->status->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $view_opd_follow_up_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby">
<span<?php echo $view_opd_follow_up_delete->createdby->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $view_opd_follow_up_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime">
<span<?php echo $view_opd_follow_up_delete->createddatetime->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $view_opd_follow_up_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby">
<span<?php echo $view_opd_follow_up_delete->modifiedby->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $view_opd_follow_up_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime">
<span<?php echo $view_opd_follow_up_delete->modifieddatetime->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->LMP->Visible) { // LMP ?>
		<td <?php echo $view_opd_follow_up_delete->LMP->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP">
<span<?php echo $view_opd_follow_up_delete->LMP->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td <?php echo $view_opd_follow_up_delete->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime">
<span<?php echo $view_opd_follow_up_delete->ProcedureDateTime->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up_delete->ICSIDate->Visible) { // ICSIDate ?>
		<td <?php echo $view_opd_follow_up_delete->ICSIDate->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_delete->RowCount ?>_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate">
<span<?php echo $view_opd_follow_up_delete->ICSIDate->viewAttributes() ?>><?php echo $view_opd_follow_up_delete->ICSIDate->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_opd_follow_up_delete->terminate();
?>