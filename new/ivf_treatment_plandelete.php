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
$ivf_treatment_plan_delete = new ivf_treatment_plan_delete();

// Run the page
$ivf_treatment_plan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_treatment_plan_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_treatment_plandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_treatment_plandelete = currentForm = new ew.Form("fivf_treatment_plandelete", "delete");
	loadjs.done("fivf_treatment_plandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_treatment_plan_delete->showPageHeader(); ?>
<?php
$ivf_treatment_plan_delete->showMessage();
?>
<form name="fivf_treatment_plandelete" id="fivf_treatment_plandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_treatment_plan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_treatment_plan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_treatment_plan_delete->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<th class="<?php echo $ivf_treatment_plan_delete->TreatmentStartDate->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate"><?php echo $ivf_treatment_plan_delete->TreatmentStartDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->treatment_status->Visible) { // treatment_status ?>
		<th class="<?php echo $ivf_treatment_plan_delete->treatment_status->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status"><?php echo $ivf_treatment_plan_delete->treatment_status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<th class="<?php echo $ivf_treatment_plan_delete->ARTCYCLE->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE"><?php echo $ivf_treatment_plan_delete->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<th class="<?php echo $ivf_treatment_plan_delete->IVFCycleNO->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO"><?php echo $ivf_treatment_plan_delete->IVFCycleNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->Treatment->Visible) { // Treatment ?>
		<th class="<?php echo $ivf_treatment_plan_delete->Treatment->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment"><?php echo $ivf_treatment_plan_delete->Treatment->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->TreatmentTec->Visible) { // TreatmentTec ?>
		<th class="<?php echo $ivf_treatment_plan_delete->TreatmentTec->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec"><?php echo $ivf_treatment_plan_delete->TreatmentTec->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<th class="<?php echo $ivf_treatment_plan_delete->TypeOfCycle->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle"><?php echo $ivf_treatment_plan_delete->TypeOfCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->SpermOrgin->Visible) { // SpermOrgin ?>
		<th class="<?php echo $ivf_treatment_plan_delete->SpermOrgin->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin"><?php echo $ivf_treatment_plan_delete->SpermOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->State->Visible) { // State ?>
		<th class="<?php echo $ivf_treatment_plan_delete->State->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State"><?php echo $ivf_treatment_plan_delete->State->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->Origin->Visible) { // Origin ?>
		<th class="<?php echo $ivf_treatment_plan_delete->Origin->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin"><?php echo $ivf_treatment_plan_delete->Origin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->MACS->Visible) { // MACS ?>
		<th class="<?php echo $ivf_treatment_plan_delete->MACS->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS"><?php echo $ivf_treatment_plan_delete->MACS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->Technique->Visible) { // Technique ?>
		<th class="<?php echo $ivf_treatment_plan_delete->Technique->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique"><?php echo $ivf_treatment_plan_delete->Technique->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->PgdPlanning->Visible) { // PgdPlanning ?>
		<th class="<?php echo $ivf_treatment_plan_delete->PgdPlanning->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning"><?php echo $ivf_treatment_plan_delete->PgdPlanning->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->IMSI->Visible) { // IMSI ?>
		<th class="<?php echo $ivf_treatment_plan_delete->IMSI->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI"><?php echo $ivf_treatment_plan_delete->IMSI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->SequentialCulture->Visible) { // SequentialCulture ?>
		<th class="<?php echo $ivf_treatment_plan_delete->SequentialCulture->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture"><?php echo $ivf_treatment_plan_delete->SequentialCulture->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->TimeLapse->Visible) { // TimeLapse ?>
		<th class="<?php echo $ivf_treatment_plan_delete->TimeLapse->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse"><?php echo $ivf_treatment_plan_delete->TimeLapse->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->AH->Visible) { // AH ?>
		<th class="<?php echo $ivf_treatment_plan_delete->AH->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH"><?php echo $ivf_treatment_plan_delete->AH->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->Weight->Visible) { // Weight ?>
		<th class="<?php echo $ivf_treatment_plan_delete->Weight->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight"><?php echo $ivf_treatment_plan_delete->Weight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->BMI->Visible) { // BMI ?>
		<th class="<?php echo $ivf_treatment_plan_delete->BMI->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI"><?php echo $ivf_treatment_plan_delete->BMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->MaleIndications->Visible) { // MaleIndications ?>
		<th class="<?php echo $ivf_treatment_plan_delete->MaleIndications->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications"><?php echo $ivf_treatment_plan_delete->MaleIndications->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->FemaleIndications->Visible) { // FemaleIndications ?>
		<th class="<?php echo $ivf_treatment_plan_delete->FemaleIndications->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications"><?php echo $ivf_treatment_plan_delete->FemaleIndications->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_treatment_plan_delete->RecordCount = 0;
$i = 0;
while (!$ivf_treatment_plan_delete->Recordset->EOF) {
	$ivf_treatment_plan_delete->RecordCount++;
	$ivf_treatment_plan_delete->RowCount++;

	// Set row properties
	$ivf_treatment_plan->resetAttributes();
	$ivf_treatment_plan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_treatment_plan_delete->loadRowValues($ivf_treatment_plan_delete->Recordset);

	// Render row
	$ivf_treatment_plan_delete->renderRow();
?>
	<tr <?php echo $ivf_treatment_plan->rowAttributes() ?>>
<?php if ($ivf_treatment_plan_delete->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td <?php echo $ivf_treatment_plan_delete->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $ivf_treatment_plan_delete->TreatmentStartDate->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->treatment_status->Visible) { // treatment_status ?>
		<td <?php echo $ivf_treatment_plan_delete->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status">
<span<?php echo $ivf_treatment_plan_delete->treatment_status->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->treatment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td <?php echo $ivf_treatment_plan_delete->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE">
<span<?php echo $ivf_treatment_plan_delete->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<td <?php echo $ivf_treatment_plan_delete->IVFCycleNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO">
<span<?php echo $ivf_treatment_plan_delete->IVFCycleNO->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->IVFCycleNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->Treatment->Visible) { // Treatment ?>
		<td <?php echo $ivf_treatment_plan_delete->Treatment->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment">
<span<?php echo $ivf_treatment_plan_delete->Treatment->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->Treatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->TreatmentTec->Visible) { // TreatmentTec ?>
		<td <?php echo $ivf_treatment_plan_delete->TreatmentTec->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec">
<span<?php echo $ivf_treatment_plan_delete->TreatmentTec->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->TreatmentTec->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td <?php echo $ivf_treatment_plan_delete->TypeOfCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle">
<span<?php echo $ivf_treatment_plan_delete->TypeOfCycle->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->SpermOrgin->Visible) { // SpermOrgin ?>
		<td <?php echo $ivf_treatment_plan_delete->SpermOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin">
<span<?php echo $ivf_treatment_plan_delete->SpermOrgin->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->SpermOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->State->Visible) { // State ?>
		<td <?php echo $ivf_treatment_plan_delete->State->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_State" class="ivf_treatment_plan_State">
<span<?php echo $ivf_treatment_plan_delete->State->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->Origin->Visible) { // Origin ?>
		<td <?php echo $ivf_treatment_plan_delete->Origin->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin">
<span<?php echo $ivf_treatment_plan_delete->Origin->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->Origin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->MACS->Visible) { // MACS ?>
		<td <?php echo $ivf_treatment_plan_delete->MACS->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS">
<span<?php echo $ivf_treatment_plan_delete->MACS->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->MACS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->Technique->Visible) { // Technique ?>
		<td <?php echo $ivf_treatment_plan_delete->Technique->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique">
<span<?php echo $ivf_treatment_plan_delete->Technique->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->Technique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->PgdPlanning->Visible) { // PgdPlanning ?>
		<td <?php echo $ivf_treatment_plan_delete->PgdPlanning->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning">
<span<?php echo $ivf_treatment_plan_delete->PgdPlanning->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->PgdPlanning->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->IMSI->Visible) { // IMSI ?>
		<td <?php echo $ivf_treatment_plan_delete->IMSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI">
<span<?php echo $ivf_treatment_plan_delete->IMSI->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->IMSI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->SequentialCulture->Visible) { // SequentialCulture ?>
		<td <?php echo $ivf_treatment_plan_delete->SequentialCulture->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture">
<span<?php echo $ivf_treatment_plan_delete->SequentialCulture->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->SequentialCulture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->TimeLapse->Visible) { // TimeLapse ?>
		<td <?php echo $ivf_treatment_plan_delete->TimeLapse->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse">
<span<?php echo $ivf_treatment_plan_delete->TimeLapse->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->TimeLapse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->AH->Visible) { // AH ?>
		<td <?php echo $ivf_treatment_plan_delete->AH->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH">
<span<?php echo $ivf_treatment_plan_delete->AH->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->AH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->Weight->Visible) { // Weight ?>
		<td <?php echo $ivf_treatment_plan_delete->Weight->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight">
<span<?php echo $ivf_treatment_plan_delete->Weight->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->Weight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->BMI->Visible) { // BMI ?>
		<td <?php echo $ivf_treatment_plan_delete->BMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI">
<span<?php echo $ivf_treatment_plan_delete->BMI->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->BMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->MaleIndications->Visible) { // MaleIndications ?>
		<td <?php echo $ivf_treatment_plan_delete->MaleIndications->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications">
<span<?php echo $ivf_treatment_plan_delete->MaleIndications->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->MaleIndications->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan_delete->FemaleIndications->Visible) { // FemaleIndications ?>
		<td <?php echo $ivf_treatment_plan_delete->FemaleIndications->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCount ?>_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications">
<span<?php echo $ivf_treatment_plan_delete->FemaleIndications->viewAttributes() ?>><?php echo $ivf_treatment_plan_delete->FemaleIndications->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_treatment_plan_delete->Recordset->moveNext();
}
$ivf_treatment_plan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_treatment_plan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_treatment_plan_delete->showPageFooter();
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
$ivf_treatment_plan_delete->terminate();
?>