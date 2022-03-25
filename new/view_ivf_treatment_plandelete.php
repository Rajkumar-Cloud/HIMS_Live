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
$view_ivf_treatment_plan_delete = new view_ivf_treatment_plan_delete();

// Run the page
$view_ivf_treatment_plan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_treatment_plan_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_ivf_treatment_plandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_ivf_treatment_plandelete = currentForm = new ew.Form("fview_ivf_treatment_plandelete", "delete");
	loadjs.done("fview_ivf_treatment_plandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_ivf_treatment_plan_delete->showPageHeader(); ?>
<?php
$view_ivf_treatment_plan_delete->showMessage();
?>
<form name="fview_ivf_treatment_plandelete" id="fview_ivf_treatment_plandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment_plan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_ivf_treatment_plan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_ivf_treatment_plan_delete->CoupleID->Visible) { // CoupleID ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->CoupleID->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID"><?php echo $view_ivf_treatment_plan_delete->CoupleID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->PatientID->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID"><?php echo $view_ivf_treatment_plan_delete->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->PatientName->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName"><?php echo $view_ivf_treatment_plan_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->WifeCell->Visible) { // WifeCell ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->WifeCell->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell"><?php echo $view_ivf_treatment_plan_delete->WifeCell->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->PartnerID->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID"><?php echo $view_ivf_treatment_plan_delete->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->PartnerName->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName"><?php echo $view_ivf_treatment_plan_delete->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->HusbandCell->Visible) { // HusbandCell ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->HusbandCell->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell"><?php echo $view_ivf_treatment_plan_delete->HusbandCell->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->RIDNO->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO"><?php echo $view_ivf_treatment_plan_delete->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->TreatmentStartDate->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate"><?php echo $view_ivf_treatment_plan_delete->TreatmentStartDate->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->treatment_status->Visible) { // treatment_status ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->treatment_status->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status"><?php echo $view_ivf_treatment_plan_delete->treatment_status->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->ARTCYCLE->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE"><?php echo $view_ivf_treatment_plan_delete->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->RESULT->Visible) { // RESULT ?>
		<th class="<?php echo $view_ivf_treatment_plan_delete->RESULT->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT"><?php echo $view_ivf_treatment_plan_delete->RESULT->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_ivf_treatment_plan_delete->RecordCount = 0;
$i = 0;
while (!$view_ivf_treatment_plan_delete->Recordset->EOF) {
	$view_ivf_treatment_plan_delete->RecordCount++;
	$view_ivf_treatment_plan_delete->RowCount++;

	// Set row properties
	$view_ivf_treatment_plan->resetAttributes();
	$view_ivf_treatment_plan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_ivf_treatment_plan_delete->loadRowValues($view_ivf_treatment_plan_delete->Recordset);

	// Render row
	$view_ivf_treatment_plan_delete->renderRow();
?>
	<tr <?php echo $view_ivf_treatment_plan->rowAttributes() ?>>
<?php if ($view_ivf_treatment_plan_delete->CoupleID->Visible) { // CoupleID ?>
		<td <?php echo $view_ivf_treatment_plan_delete->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID">
<span<?php echo $view_ivf_treatment_plan_delete->CoupleID->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->CoupleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->PatientID->Visible) { // PatientID ?>
		<td <?php echo $view_ivf_treatment_plan_delete->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID">
<span<?php echo $view_ivf_treatment_plan_delete->PatientID->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $view_ivf_treatment_plan_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName">
<span<?php echo $view_ivf_treatment_plan_delete->PatientName->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->WifeCell->Visible) { // WifeCell ?>
		<td <?php echo $view_ivf_treatment_plan_delete->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell">
<span<?php echo $view_ivf_treatment_plan_delete->WifeCell->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->WifeCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->PartnerID->Visible) { // PartnerID ?>
		<td <?php echo $view_ivf_treatment_plan_delete->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID">
<span<?php echo $view_ivf_treatment_plan_delete->PartnerID->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->PartnerName->Visible) { // PartnerName ?>
		<td <?php echo $view_ivf_treatment_plan_delete->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName">
<span<?php echo $view_ivf_treatment_plan_delete->PartnerName->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->HusbandCell->Visible) { // HusbandCell ?>
		<td <?php echo $view_ivf_treatment_plan_delete->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell">
<span<?php echo $view_ivf_treatment_plan_delete->HusbandCell->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->HusbandCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->RIDNO->Visible) { // RIDNO ?>
		<td <?php echo $view_ivf_treatment_plan_delete->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO">
<span<?php echo $view_ivf_treatment_plan_delete->RIDNO->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td <?php echo $view_ivf_treatment_plan_delete->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $view_ivf_treatment_plan_delete->TreatmentStartDate->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->treatment_status->Visible) { // treatment_status ?>
		<td <?php echo $view_ivf_treatment_plan_delete->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status">
<span<?php echo $view_ivf_treatment_plan_delete->treatment_status->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->treatment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td <?php echo $view_ivf_treatment_plan_delete->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE">
<span<?php echo $view_ivf_treatment_plan_delete->ARTCYCLE->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan_delete->RESULT->Visible) { // RESULT ?>
		<td <?php echo $view_ivf_treatment_plan_delete->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCount ?>_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT">
<span<?php echo $view_ivf_treatment_plan_delete->RESULT->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_delete->RESULT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_ivf_treatment_plan_delete->Recordset->moveNext();
}
$view_ivf_treatment_plan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ivf_treatment_plan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_ivf_treatment_plan_delete->showPageFooter();
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
$view_ivf_treatment_plan_delete->terminate();
?>