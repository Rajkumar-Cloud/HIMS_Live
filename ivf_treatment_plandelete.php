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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_treatment_plandelete = currentForm = new ew.Form("fivf_treatment_plandelete", "delete");

// Form_CustomValidate event
fivf_treatment_plandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_treatment_plandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_treatment_plandelete.lists["x_treatment_status"] = <?php echo $ivf_treatment_plan_delete->treatment_status->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_treatment_status"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->treatment_status->options(FALSE, TRUE)) ?>;
fivf_treatment_plandelete.lists["x_ARTCYCLE"] = <?php echo $ivf_treatment_plan_delete->ARTCYCLE->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->ARTCYCLE->options(FALSE, TRUE)) ?>;
fivf_treatment_plandelete.lists["x_Treatment"] = <?php echo $ivf_treatment_plan_delete->Treatment->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_Treatment"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->Treatment->options(FALSE, TRUE)) ?>;
fivf_treatment_plandelete.lists["x_TypeOfCycle"] = <?php echo $ivf_treatment_plan_delete->TypeOfCycle->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_TypeOfCycle"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->TypeOfCycle->options(FALSE, TRUE)) ?>;
fivf_treatment_plandelete.lists["x_SpermOrgin"] = <?php echo $ivf_treatment_plan_delete->SpermOrgin->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_SpermOrgin"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->SpermOrgin->options(FALSE, TRUE)) ?>;
fivf_treatment_plandelete.lists["x_State"] = <?php echo $ivf_treatment_plan_delete->State->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_State"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->State->options(FALSE, TRUE)) ?>;
fivf_treatment_plandelete.lists["x_Origin"] = <?php echo $ivf_treatment_plan_delete->Origin->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_Origin"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->Origin->options(FALSE, TRUE)) ?>;
fivf_treatment_plandelete.lists["x_MACS"] = <?php echo $ivf_treatment_plan_delete->MACS->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_MACS"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->MACS->options(FALSE, TRUE)) ?>;
fivf_treatment_plandelete.lists["x_PgdPlanning"] = <?php echo $ivf_treatment_plan_delete->PgdPlanning->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_PgdPlanning"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->PgdPlanning->options(FALSE, TRUE)) ?>;
fivf_treatment_plandelete.lists["x_MaleIndications"] = <?php echo $ivf_treatment_plan_delete->MaleIndications->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_MaleIndications"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->MaleIndications->options(FALSE, TRUE)) ?>;
fivf_treatment_plandelete.lists["x_FemaleIndications"] = <?php echo $ivf_treatment_plan_delete->FemaleIndications->Lookup->toClientList() ?>;
fivf_treatment_plandelete.lists["x_FemaleIndications"].options = <?php echo JsonEncode($ivf_treatment_plan_delete->FemaleIndications->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_treatment_plan_delete->showPageHeader(); ?>
<?php
$ivf_treatment_plan_delete->showMessage();
?>
<form name="fivf_treatment_plandelete" id="fivf_treatment_plandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_treatment_plan_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_treatment_plan_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_treatment_plan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_treatment_plan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<th class="<?php echo $ivf_treatment_plan->TreatmentStartDate->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate"><?php echo $ivf_treatment_plan->TreatmentStartDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
		<th class="<?php echo $ivf_treatment_plan->treatment_status->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status"><?php echo $ivf_treatment_plan->treatment_status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<th class="<?php echo $ivf_treatment_plan->ARTCYCLE->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE"><?php echo $ivf_treatment_plan->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<th class="<?php echo $ivf_treatment_plan->IVFCycleNO->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO"><?php echo $ivf_treatment_plan->IVFCycleNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
		<th class="<?php echo $ivf_treatment_plan->Treatment->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment"><?php echo $ivf_treatment_plan->Treatment->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
		<th class="<?php echo $ivf_treatment_plan->TreatmentTec->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec"><?php echo $ivf_treatment_plan->TreatmentTec->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<th class="<?php echo $ivf_treatment_plan->TypeOfCycle->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle"><?php echo $ivf_treatment_plan->TypeOfCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
		<th class="<?php echo $ivf_treatment_plan->SpermOrgin->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin"><?php echo $ivf_treatment_plan->SpermOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
		<th class="<?php echo $ivf_treatment_plan->State->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State"><?php echo $ivf_treatment_plan->State->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
		<th class="<?php echo $ivf_treatment_plan->Origin->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin"><?php echo $ivf_treatment_plan->Origin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
		<th class="<?php echo $ivf_treatment_plan->MACS->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS"><?php echo $ivf_treatment_plan->MACS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
		<th class="<?php echo $ivf_treatment_plan->Technique->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique"><?php echo $ivf_treatment_plan->Technique->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
		<th class="<?php echo $ivf_treatment_plan->PgdPlanning->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning"><?php echo $ivf_treatment_plan->PgdPlanning->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
		<th class="<?php echo $ivf_treatment_plan->IMSI->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI"><?php echo $ivf_treatment_plan->IMSI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
		<th class="<?php echo $ivf_treatment_plan->SequentialCulture->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture"><?php echo $ivf_treatment_plan->SequentialCulture->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
		<th class="<?php echo $ivf_treatment_plan->TimeLapse->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse"><?php echo $ivf_treatment_plan->TimeLapse->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
		<th class="<?php echo $ivf_treatment_plan->AH->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH"><?php echo $ivf_treatment_plan->AH->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
		<th class="<?php echo $ivf_treatment_plan->Weight->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight"><?php echo $ivf_treatment_plan->Weight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
		<th class="<?php echo $ivf_treatment_plan->BMI->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI"><?php echo $ivf_treatment_plan->BMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
		<th class="<?php echo $ivf_treatment_plan->MaleIndications->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications"><?php echo $ivf_treatment_plan->MaleIndications->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
		<th class="<?php echo $ivf_treatment_plan->FemaleIndications->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications"><?php echo $ivf_treatment_plan->FemaleIndications->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_treatment_plan_delete->RecCnt = 0;
$i = 0;
while (!$ivf_treatment_plan_delete->Recordset->EOF) {
	$ivf_treatment_plan_delete->RecCnt++;
	$ivf_treatment_plan_delete->RowCnt++;

	// Set row properties
	$ivf_treatment_plan->resetAttributes();
	$ivf_treatment_plan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_treatment_plan_delete->loadRowValues($ivf_treatment_plan_delete->Recordset);

	// Render row
	$ivf_treatment_plan_delete->renderRow();
?>
	<tr<?php echo $ivf_treatment_plan->rowAttributes() ?>>
<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td<?php echo $ivf_treatment_plan->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $ivf_treatment_plan->TreatmentStartDate->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
		<td<?php echo $ivf_treatment_plan->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status">
<span<?php echo $ivf_treatment_plan->treatment_status->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->treatment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td<?php echo $ivf_treatment_plan->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE">
<span<?php echo $ivf_treatment_plan->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<td<?php echo $ivf_treatment_plan->IVFCycleNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO">
<span<?php echo $ivf_treatment_plan->IVFCycleNO->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->IVFCycleNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
		<td<?php echo $ivf_treatment_plan->Treatment->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment">
<span<?php echo $ivf_treatment_plan->Treatment->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Treatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
		<td<?php echo $ivf_treatment_plan->TreatmentTec->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec">
<span<?php echo $ivf_treatment_plan->TreatmentTec->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TreatmentTec->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td<?php echo $ivf_treatment_plan->TypeOfCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle">
<span<?php echo $ivf_treatment_plan->TypeOfCycle->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
		<td<?php echo $ivf_treatment_plan->SpermOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin">
<span<?php echo $ivf_treatment_plan->SpermOrgin->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->SpermOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
		<td<?php echo $ivf_treatment_plan->State->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_State" class="ivf_treatment_plan_State">
<span<?php echo $ivf_treatment_plan->State->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
		<td<?php echo $ivf_treatment_plan->Origin->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin">
<span<?php echo $ivf_treatment_plan->Origin->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Origin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
		<td<?php echo $ivf_treatment_plan->MACS->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS">
<span<?php echo $ivf_treatment_plan->MACS->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->MACS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
		<td<?php echo $ivf_treatment_plan->Technique->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique">
<span<?php echo $ivf_treatment_plan->Technique->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Technique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
		<td<?php echo $ivf_treatment_plan->PgdPlanning->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning">
<span<?php echo $ivf_treatment_plan->PgdPlanning->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->PgdPlanning->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
		<td<?php echo $ivf_treatment_plan->IMSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI">
<span<?php echo $ivf_treatment_plan->IMSI->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->IMSI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
		<td<?php echo $ivf_treatment_plan->SequentialCulture->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture">
<span<?php echo $ivf_treatment_plan->SequentialCulture->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->SequentialCulture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
		<td<?php echo $ivf_treatment_plan->TimeLapse->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse">
<span<?php echo $ivf_treatment_plan->TimeLapse->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TimeLapse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
		<td<?php echo $ivf_treatment_plan->AH->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH">
<span<?php echo $ivf_treatment_plan->AH->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->AH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
		<td<?php echo $ivf_treatment_plan->Weight->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight">
<span<?php echo $ivf_treatment_plan->Weight->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Weight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
		<td<?php echo $ivf_treatment_plan->BMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI">
<span<?php echo $ivf_treatment_plan->BMI->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->BMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
		<td<?php echo $ivf_treatment_plan->MaleIndications->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications">
<span<?php echo $ivf_treatment_plan->MaleIndications->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->MaleIndications->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
		<td<?php echo $ivf_treatment_plan->FemaleIndications->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_delete->RowCnt ?>_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications">
<span<?php echo $ivf_treatment_plan->FemaleIndications->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->FemaleIndications->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_treatment_plan_delete->terminate();
?>