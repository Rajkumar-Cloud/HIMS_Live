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
$ivf_et_chart_delete = new ivf_et_chart_delete();

// Run the page
$ivf_et_chart_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_et_chart_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_et_chartdelete = currentForm = new ew.Form("fivf_et_chartdelete", "delete");

// Form_CustomValidate event
fivf_et_chartdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_et_chartdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_et_chartdelete.lists["x_ARTCycle"] = <?php echo $ivf_et_chart_delete->ARTCycle->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_et_chart_delete->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_et_chartdelete.lists["x_InseminatinTechnique"] = <?php echo $ivf_et_chart_delete->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_et_chart_delete->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_et_chartdelete.lists["x_PreTreatment"] = <?php echo $ivf_et_chart_delete->PreTreatment->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_PreTreatment"].options = <?php echo JsonEncode($ivf_et_chart_delete->PreTreatment->options(FALSE, TRUE)) ?>;
fivf_et_chartdelete.lists["x_Hysteroscopy"] = <?php echo $ivf_et_chart_delete->Hysteroscopy->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_et_chart_delete->Hysteroscopy->options(FALSE, TRUE)) ?>;
fivf_et_chartdelete.lists["x_EndometrialScratching"] = <?php echo $ivf_et_chart_delete->EndometrialScratching->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_et_chart_delete->EndometrialScratching->options(FALSE, TRUE)) ?>;
fivf_et_chartdelete.lists["x_TrialCannulation"] = <?php echo $ivf_et_chart_delete->TrialCannulation->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_et_chart_delete->TrialCannulation->options(FALSE, TRUE)) ?>;
fivf_et_chartdelete.lists["x_CYCLETYPE"] = <?php echo $ivf_et_chart_delete->CYCLETYPE->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_et_chart_delete->CYCLETYPE->options(FALSE, TRUE)) ?>;
fivf_et_chartdelete.lists["x_OralEstrogenDosage"] = <?php echo $ivf_et_chart_delete->OralEstrogenDosage->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_et_chart_delete->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
fivf_et_chartdelete.lists["x_GCSF"] = <?php echo $ivf_et_chart_delete->GCSF->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_et_chart_delete->GCSF->options(FALSE, TRUE)) ?>;
fivf_et_chartdelete.lists["x_ActivatedPRP"] = <?php echo $ivf_et_chart_delete->ActivatedPRP->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_et_chart_delete->ActivatedPRP->options(FALSE, TRUE)) ?>;
fivf_et_chartdelete.lists["x_ERA"] = <?php echo $ivf_et_chart_delete->ERA->Lookup->toClientList() ?>;
fivf_et_chartdelete.lists["x_ERA"].options = <?php echo JsonEncode($ivf_et_chart_delete->ERA->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_et_chart_delete->showPageHeader(); ?>
<?php
$ivf_et_chart_delete->showMessage();
?>
<form name="fivf_et_chartdelete" id="fivf_et_chartdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_et_chart_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_et_chart_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_et_chart_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_et_chart->id->Visible) { // id ?>
		<th class="<?php echo $ivf_et_chart->id->headerCellClass() ?>"><span id="elh_ivf_et_chart_id" class="ivf_et_chart_id"><?php echo $ivf_et_chart->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_et_chart->RIDNo->headerCellClass() ?>"><span id="elh_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo"><?php echo $ivf_et_chart->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_et_chart->Name->headerCellClass() ?>"><span id="elh_ivf_et_chart_Name" class="ivf_et_chart_Name"><?php echo $ivf_et_chart->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
		<th class="<?php echo $ivf_et_chart->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle"><?php echo $ivf_et_chart->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $ivf_et_chart->Consultant->headerCellClass() ?>"><span id="elh_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant"><?php echo $ivf_et_chart->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<th class="<?php echo $ivf_et_chart->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique"><?php echo $ivf_et_chart->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
		<th class="<?php echo $ivf_et_chart->IndicationForART->headerCellClass() ?>"><span id="elh_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART"><?php echo $ivf_et_chart->IndicationForART->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
		<th class="<?php echo $ivf_et_chart->PreTreatment->headerCellClass() ?>"><span id="elh_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment"><?php echo $ivf_et_chart->PreTreatment->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<th class="<?php echo $ivf_et_chart->Hysteroscopy->headerCellClass() ?>"><span id="elh_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy"><?php echo $ivf_et_chart->Hysteroscopy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<th class="<?php echo $ivf_et_chart->EndometrialScratching->headerCellClass() ?>"><span id="elh_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching"><?php echo $ivf_et_chart->EndometrialScratching->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<th class="<?php echo $ivf_et_chart->TrialCannulation->headerCellClass() ?>"><span id="elh_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation"><?php echo $ivf_et_chart->TrialCannulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<th class="<?php echo $ivf_et_chart->CYCLETYPE->headerCellClass() ?>"><span id="elh_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE"><?php echo $ivf_et_chart->CYCLETYPE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<th class="<?php echo $ivf_et_chart->HRTCYCLE->headerCellClass() ?>"><span id="elh_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE"><?php echo $ivf_et_chart->HRTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<th class="<?php echo $ivf_et_chart->OralEstrogenDosage->headerCellClass() ?>"><span id="elh_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage"><?php echo $ivf_et_chart->OralEstrogenDosage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<th class="<?php echo $ivf_et_chart->VaginalEstrogen->headerCellClass() ?>"><span id="elh_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen"><?php echo $ivf_et_chart->VaginalEstrogen->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
		<th class="<?php echo $ivf_et_chart->GCSF->headerCellClass() ?>"><span id="elh_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF"><?php echo $ivf_et_chart->GCSF->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<th class="<?php echo $ivf_et_chart->ActivatedPRP->headerCellClass() ?>"><span id="elh_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP"><?php echo $ivf_et_chart->ActivatedPRP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
		<th class="<?php echo $ivf_et_chart->ERA->headerCellClass() ?>"><span id="elh_ivf_et_chart_ERA" class="ivf_et_chart_ERA"><?php echo $ivf_et_chart->ERA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
		<th class="<?php echo $ivf_et_chart->UCLcm->headerCellClass() ?>"><span id="elh_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm"><?php echo $ivf_et_chart->UCLcm->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
		<th class="<?php echo $ivf_et_chart->DATEOFSTART->headerCellClass() ?>"><span id="elh_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART"><?php echo $ivf_et_chart->DATEOFSTART->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
		<th class="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER"><?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<th class="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER"><?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<th class="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED"><?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<th class="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<th class="<?php echo $ivf_et_chart->DAYOFEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS"><?php echo $ivf_et_chart->DAYOFEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<th class="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS"><?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
		<th class="<?php echo $ivf_et_chart->Code1->headerCellClass() ?>"><span id="elh_ivf_et_chart_Code1" class="ivf_et_chart_Code1"><?php echo $ivf_et_chart->Code1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
		<th class="<?php echo $ivf_et_chart->Code2->headerCellClass() ?>"><span id="elh_ivf_et_chart_Code2" class="ivf_et_chart_Code2"><?php echo $ivf_et_chart->Code2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
		<th class="<?php echo $ivf_et_chart->CellStage1->headerCellClass() ?>"><span id="elh_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1"><?php echo $ivf_et_chart->CellStage1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
		<th class="<?php echo $ivf_et_chart->CellStage2->headerCellClass() ?>"><span id="elh_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2"><?php echo $ivf_et_chart->CellStage2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
		<th class="<?php echo $ivf_et_chart->Grade1->headerCellClass() ?>"><span id="elh_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1"><?php echo $ivf_et_chart->Grade1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
		<th class="<?php echo $ivf_et_chart->Grade2->headerCellClass() ?>"><span id="elh_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2"><?php echo $ivf_et_chart->Grade2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
		<th class="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><span id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
		<th class="<?php echo $ivf_et_chart->ReviewDate->headerCellClass() ?>"><span id="elh_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate"><?php echo $ivf_et_chart->ReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<th class="<?php echo $ivf_et_chart->ReviewDoctor->headerCellClass() ?>"><span id="elh_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor"><?php echo $ivf_et_chart->ReviewDoctor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_et_chart->TidNo->headerCellClass() ?>"><span id="elh_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo"><?php echo $ivf_et_chart->TidNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_et_chart_delete->RecCnt = 0;
$i = 0;
while (!$ivf_et_chart_delete->Recordset->EOF) {
	$ivf_et_chart_delete->RecCnt++;
	$ivf_et_chart_delete->RowCnt++;

	// Set row properties
	$ivf_et_chart->resetAttributes();
	$ivf_et_chart->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_et_chart_delete->loadRowValues($ivf_et_chart_delete->Recordset);

	// Render row
	$ivf_et_chart_delete->renderRow();
?>
	<tr<?php echo $ivf_et_chart->rowAttributes() ?>>
<?php if ($ivf_et_chart->id->Visible) { // id ?>
		<td<?php echo $ivf_et_chart->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_id" class="ivf_et_chart_id">
<span<?php echo $ivf_et_chart->id->viewAttributes() ?>>
<?php echo $ivf_et_chart->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
		<td<?php echo $ivf_et_chart->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_et_chart->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
		<td<?php echo $ivf_et_chart->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_Name" class="ivf_et_chart_Name">
<span<?php echo $ivf_et_chart->Name->viewAttributes() ?>>
<?php echo $ivf_et_chart->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td<?php echo $ivf_et_chart->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle">
<span<?php echo $ivf_et_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_et_chart->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
		<td<?php echo $ivf_et_chart->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant">
<span<?php echo $ivf_et_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_et_chart->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td<?php echo $ivf_et_chart->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique">
<span<?php echo $ivf_et_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_et_chart->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
		<td<?php echo $ivf_et_chart->IndicationForART->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART">
<span<?php echo $ivf_et_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_et_chart->IndicationForART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
		<td<?php echo $ivf_et_chart->PreTreatment->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment">
<span<?php echo $ivf_et_chart->PreTreatment->viewAttributes() ?>>
<?php echo $ivf_et_chart->PreTreatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<td<?php echo $ivf_et_chart->Hysteroscopy->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy">
<span<?php echo $ivf_et_chart->Hysteroscopy->viewAttributes() ?>>
<?php echo $ivf_et_chart->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<td<?php echo $ivf_et_chart->EndometrialScratching->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching">
<span<?php echo $ivf_et_chart->EndometrialScratching->viewAttributes() ?>>
<?php echo $ivf_et_chart->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<td<?php echo $ivf_et_chart->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation">
<span<?php echo $ivf_et_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_et_chart->TrialCannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<td<?php echo $ivf_et_chart->CYCLETYPE->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE">
<span<?php echo $ivf_et_chart->CYCLETYPE->viewAttributes() ?>>
<?php echo $ivf_et_chart->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<td<?php echo $ivf_et_chart->HRTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE">
<span<?php echo $ivf_et_chart->HRTCYCLE->viewAttributes() ?>>
<?php echo $ivf_et_chart->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<td<?php echo $ivf_et_chart->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage">
<span<?php echo $ivf_et_chart->OralEstrogenDosage->viewAttributes() ?>>
<?php echo $ivf_et_chart->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<td<?php echo $ivf_et_chart->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen">
<span<?php echo $ivf_et_chart->VaginalEstrogen->viewAttributes() ?>>
<?php echo $ivf_et_chart->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
		<td<?php echo $ivf_et_chart->GCSF->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF">
<span<?php echo $ivf_et_chart->GCSF->viewAttributes() ?>>
<?php echo $ivf_et_chart->GCSF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<td<?php echo $ivf_et_chart->ActivatedPRP->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP">
<span<?php echo $ivf_et_chart->ActivatedPRP->viewAttributes() ?>>
<?php echo $ivf_et_chart->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
		<td<?php echo $ivf_et_chart->ERA->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_ERA" class="ivf_et_chart_ERA">
<span<?php echo $ivf_et_chart->ERA->viewAttributes() ?>>
<?php echo $ivf_et_chart->ERA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
		<td<?php echo $ivf_et_chart->UCLcm->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm">
<span<?php echo $ivf_et_chart->UCLcm->viewAttributes() ?>>
<?php echo $ivf_et_chart->UCLcm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
		<td<?php echo $ivf_et_chart->DATEOFSTART->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART">
<span<?php echo $ivf_et_chart->DATEOFSTART->viewAttributes() ?>>
<?php echo $ivf_et_chart->DATEOFSTART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
		<td<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<td<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<td<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<td<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<td<?php echo $ivf_et_chart->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_et_chart->DAYOFEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_et_chart->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<td<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
		<td<?php echo $ivf_et_chart->Code1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_Code1" class="ivf_et_chart_Code1">
<span<?php echo $ivf_et_chart->Code1->viewAttributes() ?>>
<?php echo $ivf_et_chart->Code1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
		<td<?php echo $ivf_et_chart->Code2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_Code2" class="ivf_et_chart_Code2">
<span<?php echo $ivf_et_chart->Code2->viewAttributes() ?>>
<?php echo $ivf_et_chart->Code2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
		<td<?php echo $ivf_et_chart->CellStage1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1">
<span<?php echo $ivf_et_chart->CellStage1->viewAttributes() ?>>
<?php echo $ivf_et_chart->CellStage1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
		<td<?php echo $ivf_et_chart->CellStage2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2">
<span<?php echo $ivf_et_chart->CellStage2->viewAttributes() ?>>
<?php echo $ivf_et_chart->CellStage2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
		<td<?php echo $ivf_et_chart->Grade1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1">
<span<?php echo $ivf_et_chart->Grade1->viewAttributes() ?>>
<?php echo $ivf_et_chart->Grade1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
		<td<?php echo $ivf_et_chart->Grade2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2">
<span<?php echo $ivf_et_chart->Grade2->viewAttributes() ?>>
<?php echo $ivf_et_chart->Grade2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
		<td<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>>
<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
		<td<?php echo $ivf_et_chart->ReviewDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate">
<span<?php echo $ivf_et_chart->ReviewDate->viewAttributes() ?>>
<?php echo $ivf_et_chart->ReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td<?php echo $ivf_et_chart->ReviewDoctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor">
<span<?php echo $ivf_et_chart->ReviewDoctor->viewAttributes() ?>>
<?php echo $ivf_et_chart->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_et_chart->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCnt ?>_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_et_chart->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_et_chart_delete->Recordset->moveNext();
}
$ivf_et_chart_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_et_chart_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_et_chart_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_et_chart_delete->terminate();
?>