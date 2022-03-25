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
<?php include_once "header.php"; ?>
<script>
var fivf_et_chartdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_et_chartdelete = currentForm = new ew.Form("fivf_et_chartdelete", "delete");
	loadjs.done("fivf_et_chartdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_et_chart_delete->showPageHeader(); ?>
<?php
$ivf_et_chart_delete->showMessage();
?>
<form name="fivf_et_chartdelete" id="fivf_et_chartdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_et_chart_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_et_chart_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_et_chart_delete->id->headerCellClass() ?>"><span id="elh_ivf_et_chart_id" class="ivf_et_chart_id"><?php echo $ivf_et_chart_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_et_chart_delete->RIDNo->headerCellClass() ?>"><span id="elh_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo"><?php echo $ivf_et_chart_delete->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_et_chart_delete->Name->headerCellClass() ?>"><span id="elh_ivf_et_chart_Name" class="ivf_et_chart_Name"><?php echo $ivf_et_chart_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->ARTCycle->Visible) { // ARTCycle ?>
		<th class="<?php echo $ivf_et_chart_delete->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle"><?php echo $ivf_et_chart_delete->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $ivf_et_chart_delete->Consultant->headerCellClass() ?>"><span id="elh_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant"><?php echo $ivf_et_chart_delete->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<th class="<?php echo $ivf_et_chart_delete->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique"><?php echo $ivf_et_chart_delete->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->IndicationForART->Visible) { // IndicationForART ?>
		<th class="<?php echo $ivf_et_chart_delete->IndicationForART->headerCellClass() ?>"><span id="elh_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART"><?php echo $ivf_et_chart_delete->IndicationForART->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->PreTreatment->Visible) { // PreTreatment ?>
		<th class="<?php echo $ivf_et_chart_delete->PreTreatment->headerCellClass() ?>"><span id="elh_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment"><?php echo $ivf_et_chart_delete->PreTreatment->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<th class="<?php echo $ivf_et_chart_delete->Hysteroscopy->headerCellClass() ?>"><span id="elh_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy"><?php echo $ivf_et_chart_delete->Hysteroscopy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<th class="<?php echo $ivf_et_chart_delete->EndometrialScratching->headerCellClass() ?>"><span id="elh_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching"><?php echo $ivf_et_chart_delete->EndometrialScratching->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->TrialCannulation->Visible) { // TrialCannulation ?>
		<th class="<?php echo $ivf_et_chart_delete->TrialCannulation->headerCellClass() ?>"><span id="elh_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation"><?php echo $ivf_et_chart_delete->TrialCannulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<th class="<?php echo $ivf_et_chart_delete->CYCLETYPE->headerCellClass() ?>"><span id="elh_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE"><?php echo $ivf_et_chart_delete->CYCLETYPE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<th class="<?php echo $ivf_et_chart_delete->HRTCYCLE->headerCellClass() ?>"><span id="elh_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE"><?php echo $ivf_et_chart_delete->HRTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<th class="<?php echo $ivf_et_chart_delete->OralEstrogenDosage->headerCellClass() ?>"><span id="elh_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage"><?php echo $ivf_et_chart_delete->OralEstrogenDosage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<th class="<?php echo $ivf_et_chart_delete->VaginalEstrogen->headerCellClass() ?>"><span id="elh_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen"><?php echo $ivf_et_chart_delete->VaginalEstrogen->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->GCSF->Visible) { // GCSF ?>
		<th class="<?php echo $ivf_et_chart_delete->GCSF->headerCellClass() ?>"><span id="elh_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF"><?php echo $ivf_et_chart_delete->GCSF->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<th class="<?php echo $ivf_et_chart_delete->ActivatedPRP->headerCellClass() ?>"><span id="elh_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP"><?php echo $ivf_et_chart_delete->ActivatedPRP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->ERA->Visible) { // ERA ?>
		<th class="<?php echo $ivf_et_chart_delete->ERA->headerCellClass() ?>"><span id="elh_ivf_et_chart_ERA" class="ivf_et_chart_ERA"><?php echo $ivf_et_chart_delete->ERA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->UCLcm->Visible) { // UCLcm ?>
		<th class="<?php echo $ivf_et_chart_delete->UCLcm->headerCellClass() ?>"><span id="elh_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm"><?php echo $ivf_et_chart_delete->UCLcm->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->DATEOFSTART->Visible) { // DATEOFSTART ?>
		<th class="<?php echo $ivf_et_chart_delete->DATEOFSTART->headerCellClass() ?>"><span id="elh_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART"><?php echo $ivf_et_chart_delete->DATEOFSTART->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
		<th class="<?php echo $ivf_et_chart_delete->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER"><?php echo $ivf_et_chart_delete->DATEOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<th class="<?php echo $ivf_et_chart_delete->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER"><?php echo $ivf_et_chart_delete->DAYOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<th class="<?php echo $ivf_et_chart_delete->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED"><?php echo $ivf_et_chart_delete->NOOFEMBRYOSTHAWED->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<th class="<?php echo $ivf_et_chart_delete->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><?php echo $ivf_et_chart_delete->NOOFEMBRYOSTRANSFERRED->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<th class="<?php echo $ivf_et_chart_delete->DAYOFEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS"><?php echo $ivf_et_chart_delete->DAYOFEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<th class="<?php echo $ivf_et_chart_delete->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS"><?php echo $ivf_et_chart_delete->CRYOPRESERVEDEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->Code1->Visible) { // Code1 ?>
		<th class="<?php echo $ivf_et_chart_delete->Code1->headerCellClass() ?>"><span id="elh_ivf_et_chart_Code1" class="ivf_et_chart_Code1"><?php echo $ivf_et_chart_delete->Code1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->Code2->Visible) { // Code2 ?>
		<th class="<?php echo $ivf_et_chart_delete->Code2->headerCellClass() ?>"><span id="elh_ivf_et_chart_Code2" class="ivf_et_chart_Code2"><?php echo $ivf_et_chart_delete->Code2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->CellStage1->Visible) { // CellStage1 ?>
		<th class="<?php echo $ivf_et_chart_delete->CellStage1->headerCellClass() ?>"><span id="elh_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1"><?php echo $ivf_et_chart_delete->CellStage1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->CellStage2->Visible) { // CellStage2 ?>
		<th class="<?php echo $ivf_et_chart_delete->CellStage2->headerCellClass() ?>"><span id="elh_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2"><?php echo $ivf_et_chart_delete->CellStage2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->Grade1->Visible) { // Grade1 ?>
		<th class="<?php echo $ivf_et_chart_delete->Grade1->headerCellClass() ?>"><span id="elh_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1"><?php echo $ivf_et_chart_delete->Grade1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->Grade2->Visible) { // Grade2 ?>
		<th class="<?php echo $ivf_et_chart_delete->Grade2->headerCellClass() ?>"><span id="elh_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2"><?php echo $ivf_et_chart_delete->Grade2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
		<th class="<?php echo $ivf_et_chart_delete->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><span id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><?php echo $ivf_et_chart_delete->PregnancyTestingWithSerumBetaHcG->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->ReviewDate->Visible) { // ReviewDate ?>
		<th class="<?php echo $ivf_et_chart_delete->ReviewDate->headerCellClass() ?>"><span id="elh_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate"><?php echo $ivf_et_chart_delete->ReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<th class="<?php echo $ivf_et_chart_delete->ReviewDoctor->headerCellClass() ?>"><span id="elh_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor"><?php echo $ivf_et_chart_delete->ReviewDoctor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_et_chart_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_et_chart_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo"><?php echo $ivf_et_chart_delete->TidNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_et_chart_delete->RecordCount = 0;
$i = 0;
while (!$ivf_et_chart_delete->Recordset->EOF) {
	$ivf_et_chart_delete->RecordCount++;
	$ivf_et_chart_delete->RowCount++;

	// Set row properties
	$ivf_et_chart->resetAttributes();
	$ivf_et_chart->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_et_chart_delete->loadRowValues($ivf_et_chart_delete->Recordset);

	// Render row
	$ivf_et_chart_delete->renderRow();
?>
	<tr <?php echo $ivf_et_chart->rowAttributes() ?>>
<?php if ($ivf_et_chart_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_et_chart_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_id" class="ivf_et_chart_id">
<span<?php echo $ivf_et_chart_delete->id->viewAttributes() ?>><?php echo $ivf_et_chart_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->RIDNo->Visible) { // RIDNo ?>
		<td <?php echo $ivf_et_chart_delete->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart_delete->RIDNo->viewAttributes() ?>><?php echo $ivf_et_chart_delete->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_et_chart_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_Name" class="ivf_et_chart_Name">
<span<?php echo $ivf_et_chart_delete->Name->viewAttributes() ?>><?php echo $ivf_et_chart_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->ARTCycle->Visible) { // ARTCycle ?>
		<td <?php echo $ivf_et_chart_delete->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle">
<span<?php echo $ivf_et_chart_delete->ARTCycle->viewAttributes() ?>><?php echo $ivf_et_chart_delete->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->Consultant->Visible) { // Consultant ?>
		<td <?php echo $ivf_et_chart_delete->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant">
<span<?php echo $ivf_et_chart_delete->Consultant->viewAttributes() ?>><?php echo $ivf_et_chart_delete->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td <?php echo $ivf_et_chart_delete->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique">
<span<?php echo $ivf_et_chart_delete->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_et_chart_delete->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->IndicationForART->Visible) { // IndicationForART ?>
		<td <?php echo $ivf_et_chart_delete->IndicationForART->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART">
<span<?php echo $ivf_et_chart_delete->IndicationForART->viewAttributes() ?>><?php echo $ivf_et_chart_delete->IndicationForART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->PreTreatment->Visible) { // PreTreatment ?>
		<td <?php echo $ivf_et_chart_delete->PreTreatment->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment">
<span<?php echo $ivf_et_chart_delete->PreTreatment->viewAttributes() ?>><?php echo $ivf_et_chart_delete->PreTreatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<td <?php echo $ivf_et_chart_delete->Hysteroscopy->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy">
<span<?php echo $ivf_et_chart_delete->Hysteroscopy->viewAttributes() ?>><?php echo $ivf_et_chart_delete->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<td <?php echo $ivf_et_chart_delete->EndometrialScratching->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching">
<span<?php echo $ivf_et_chart_delete->EndometrialScratching->viewAttributes() ?>><?php echo $ivf_et_chart_delete->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->TrialCannulation->Visible) { // TrialCannulation ?>
		<td <?php echo $ivf_et_chart_delete->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation">
<span<?php echo $ivf_et_chart_delete->TrialCannulation->viewAttributes() ?>><?php echo $ivf_et_chart_delete->TrialCannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<td <?php echo $ivf_et_chart_delete->CYCLETYPE->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE">
<span<?php echo $ivf_et_chart_delete->CYCLETYPE->viewAttributes() ?>><?php echo $ivf_et_chart_delete->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<td <?php echo $ivf_et_chart_delete->HRTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE">
<span<?php echo $ivf_et_chart_delete->HRTCYCLE->viewAttributes() ?>><?php echo $ivf_et_chart_delete->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<td <?php echo $ivf_et_chart_delete->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage">
<span<?php echo $ivf_et_chart_delete->OralEstrogenDosage->viewAttributes() ?>><?php echo $ivf_et_chart_delete->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<td <?php echo $ivf_et_chart_delete->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen">
<span<?php echo $ivf_et_chart_delete->VaginalEstrogen->viewAttributes() ?>><?php echo $ivf_et_chart_delete->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->GCSF->Visible) { // GCSF ?>
		<td <?php echo $ivf_et_chart_delete->GCSF->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF">
<span<?php echo $ivf_et_chart_delete->GCSF->viewAttributes() ?>><?php echo $ivf_et_chart_delete->GCSF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<td <?php echo $ivf_et_chart_delete->ActivatedPRP->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP">
<span<?php echo $ivf_et_chart_delete->ActivatedPRP->viewAttributes() ?>><?php echo $ivf_et_chart_delete->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->ERA->Visible) { // ERA ?>
		<td <?php echo $ivf_et_chart_delete->ERA->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_ERA" class="ivf_et_chart_ERA">
<span<?php echo $ivf_et_chart_delete->ERA->viewAttributes() ?>><?php echo $ivf_et_chart_delete->ERA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->UCLcm->Visible) { // UCLcm ?>
		<td <?php echo $ivf_et_chart_delete->UCLcm->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm">
<span<?php echo $ivf_et_chart_delete->UCLcm->viewAttributes() ?>><?php echo $ivf_et_chart_delete->UCLcm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->DATEOFSTART->Visible) { // DATEOFSTART ?>
		<td <?php echo $ivf_et_chart_delete->DATEOFSTART->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART">
<span<?php echo $ivf_et_chart_delete->DATEOFSTART->viewAttributes() ?>><?php echo $ivf_et_chart_delete->DATEOFSTART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
		<td <?php echo $ivf_et_chart_delete->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart_delete->DATEOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_et_chart_delete->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<td <?php echo $ivf_et_chart_delete->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart_delete->DAYOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_et_chart_delete->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<td <?php echo $ivf_et_chart_delete->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_et_chart_delete->NOOFEMBRYOSTHAWED->viewAttributes() ?>><?php echo $ivf_et_chart_delete->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<td <?php echo $ivf_et_chart_delete->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_et_chart_delete->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>><?php echo $ivf_et_chart_delete->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<td <?php echo $ivf_et_chart_delete->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_et_chart_delete->DAYOFEMBRYOS->viewAttributes() ?>><?php echo $ivf_et_chart_delete->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<td <?php echo $ivf_et_chart_delete->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_et_chart_delete->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>><?php echo $ivf_et_chart_delete->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->Code1->Visible) { // Code1 ?>
		<td <?php echo $ivf_et_chart_delete->Code1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_Code1" class="ivf_et_chart_Code1">
<span<?php echo $ivf_et_chart_delete->Code1->viewAttributes() ?>><?php echo $ivf_et_chart_delete->Code1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->Code2->Visible) { // Code2 ?>
		<td <?php echo $ivf_et_chart_delete->Code2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_Code2" class="ivf_et_chart_Code2">
<span<?php echo $ivf_et_chart_delete->Code2->viewAttributes() ?>><?php echo $ivf_et_chart_delete->Code2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->CellStage1->Visible) { // CellStage1 ?>
		<td <?php echo $ivf_et_chart_delete->CellStage1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1">
<span<?php echo $ivf_et_chart_delete->CellStage1->viewAttributes() ?>><?php echo $ivf_et_chart_delete->CellStage1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->CellStage2->Visible) { // CellStage2 ?>
		<td <?php echo $ivf_et_chart_delete->CellStage2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2">
<span<?php echo $ivf_et_chart_delete->CellStage2->viewAttributes() ?>><?php echo $ivf_et_chart_delete->CellStage2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->Grade1->Visible) { // Grade1 ?>
		<td <?php echo $ivf_et_chart_delete->Grade1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1">
<span<?php echo $ivf_et_chart_delete->Grade1->viewAttributes() ?>><?php echo $ivf_et_chart_delete->Grade1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->Grade2->Visible) { // Grade2 ?>
		<td <?php echo $ivf_et_chart_delete->Grade2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2">
<span<?php echo $ivf_et_chart_delete->Grade2->viewAttributes() ?>><?php echo $ivf_et_chart_delete->Grade2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
		<td <?php echo $ivf_et_chart_delete->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?php echo $ivf_et_chart_delete->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>><?php echo $ivf_et_chart_delete->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->ReviewDate->Visible) { // ReviewDate ?>
		<td <?php echo $ivf_et_chart_delete->ReviewDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate">
<span<?php echo $ivf_et_chart_delete->ReviewDate->viewAttributes() ?>><?php echo $ivf_et_chart_delete->ReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td <?php echo $ivf_et_chart_delete->ReviewDoctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor">
<span<?php echo $ivf_et_chart_delete->ReviewDoctor->viewAttributes() ?>><?php echo $ivf_et_chart_delete->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_et_chart_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_et_chart_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_delete->RowCount ?>_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart_delete->TidNo->viewAttributes() ?>><?php echo $ivf_et_chart_delete->TidNo->getViewValue() ?></span>
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
$ivf_et_chart_delete->terminate();
?>