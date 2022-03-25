<?php

namespace PHPMaker2021\HIMS;

// Table
$ivf_treatment_plan = Container("ivf_treatment_plan");
?>
<?php if ($ivf_treatment_plan->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_ivf_treatment_planmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <tr id="r_TreatmentStartDate">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_TreatmentStartDate"><?= $ivf_treatment_plan->TreatmentStartDate->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->TreatmentStartDate->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TreatmentStartDate"><span id="el_ivf_treatment_plan_TreatmentStartDate">
<span<?= $ivf_treatment_plan->TreatmentStartDate->viewAttributes() ?>>
<?= $ivf_treatment_plan->TreatmentStartDate->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
        <tr id="r_treatment_status">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_treatment_status"><?= $ivf_treatment_plan->treatment_status->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->treatment_status->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_treatment_status"><span id="el_ivf_treatment_plan_treatment_status">
<span<?= $ivf_treatment_plan->treatment_status->viewAttributes() ?>>
<?= $ivf_treatment_plan->treatment_status->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <tr id="r_ARTCYCLE">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_ARTCYCLE"><?= $ivf_treatment_plan->ARTCYCLE->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->ARTCYCLE->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_ARTCYCLE"><span id="el_ivf_treatment_plan_ARTCYCLE">
<span<?= $ivf_treatment_plan->ARTCYCLE->viewAttributes() ?>>
<?= $ivf_treatment_plan->ARTCYCLE->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
        <tr id="r_IVFCycleNO">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_IVFCycleNO"><?= $ivf_treatment_plan->IVFCycleNO->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->IVFCycleNO->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_IVFCycleNO"><span id="el_ivf_treatment_plan_IVFCycleNO">
<span<?= $ivf_treatment_plan->IVFCycleNO->viewAttributes() ?>>
<?= $ivf_treatment_plan->IVFCycleNO->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
        <tr id="r_Treatment">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_Treatment"><?= $ivf_treatment_plan->Treatment->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->Treatment->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Treatment"><span id="el_ivf_treatment_plan_Treatment">
<span<?= $ivf_treatment_plan->Treatment->viewAttributes() ?>>
<?= $ivf_treatment_plan->Treatment->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
        <tr id="r_TreatmentTec">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_TreatmentTec"><?= $ivf_treatment_plan->TreatmentTec->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->TreatmentTec->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TreatmentTec"><span id="el_ivf_treatment_plan_TreatmentTec">
<span<?= $ivf_treatment_plan->TreatmentTec->viewAttributes() ?>>
<?= $ivf_treatment_plan->TreatmentTec->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <tr id="r_TypeOfCycle">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_TypeOfCycle"><?= $ivf_treatment_plan->TypeOfCycle->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->TypeOfCycle->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TypeOfCycle"><span id="el_ivf_treatment_plan_TypeOfCycle">
<span<?= $ivf_treatment_plan->TypeOfCycle->viewAttributes() ?>>
<?= $ivf_treatment_plan->TypeOfCycle->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
        <tr id="r_SpermOrgin">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_SpermOrgin"><?= $ivf_treatment_plan->SpermOrgin->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->SpermOrgin->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_SpermOrgin"><span id="el_ivf_treatment_plan_SpermOrgin">
<span<?= $ivf_treatment_plan->SpermOrgin->viewAttributes() ?>>
<?= $ivf_treatment_plan->SpermOrgin->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
        <tr id="r_State">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_State"><?= $ivf_treatment_plan->State->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->State->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_State"><span id="el_ivf_treatment_plan_State">
<span<?= $ivf_treatment_plan->State->viewAttributes() ?>>
<?= $ivf_treatment_plan->State->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
        <tr id="r_Origin">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_Origin"><?= $ivf_treatment_plan->Origin->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->Origin->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Origin"><span id="el_ivf_treatment_plan_Origin">
<span<?= $ivf_treatment_plan->Origin->viewAttributes() ?>>
<?= $ivf_treatment_plan->Origin->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
        <tr id="r_MACS">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_MACS"><?= $ivf_treatment_plan->MACS->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->MACS->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_MACS"><span id="el_ivf_treatment_plan_MACS">
<span<?= $ivf_treatment_plan->MACS->viewAttributes() ?>>
<?= $ivf_treatment_plan->MACS->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
        <tr id="r_Technique">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_Technique"><?= $ivf_treatment_plan->Technique->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->Technique->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Technique"><span id="el_ivf_treatment_plan_Technique">
<span<?= $ivf_treatment_plan->Technique->viewAttributes() ?>>
<?= $ivf_treatment_plan->Technique->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
        <tr id="r_PgdPlanning">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_PgdPlanning"><?= $ivf_treatment_plan->PgdPlanning->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->PgdPlanning->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_PgdPlanning"><span id="el_ivf_treatment_plan_PgdPlanning">
<span<?= $ivf_treatment_plan->PgdPlanning->viewAttributes() ?>>
<?= $ivf_treatment_plan->PgdPlanning->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
        <tr id="r_IMSI">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_IMSI"><?= $ivf_treatment_plan->IMSI->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->IMSI->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_IMSI"><span id="el_ivf_treatment_plan_IMSI">
<span<?= $ivf_treatment_plan->IMSI->viewAttributes() ?>>
<?= $ivf_treatment_plan->IMSI->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
        <tr id="r_SequentialCulture">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_SequentialCulture"><?= $ivf_treatment_plan->SequentialCulture->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->SequentialCulture->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_SequentialCulture"><span id="el_ivf_treatment_plan_SequentialCulture">
<span<?= $ivf_treatment_plan->SequentialCulture->viewAttributes() ?>>
<?= $ivf_treatment_plan->SequentialCulture->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
        <tr id="r_TimeLapse">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_TimeLapse"><?= $ivf_treatment_plan->TimeLapse->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->TimeLapse->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TimeLapse"><span id="el_ivf_treatment_plan_TimeLapse">
<span<?= $ivf_treatment_plan->TimeLapse->viewAttributes() ?>>
<?= $ivf_treatment_plan->TimeLapse->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
        <tr id="r_AH">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_AH"><?= $ivf_treatment_plan->AH->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->AH->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_AH"><span id="el_ivf_treatment_plan_AH">
<span<?= $ivf_treatment_plan->AH->viewAttributes() ?>>
<?= $ivf_treatment_plan->AH->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
        <tr id="r_Weight">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_Weight"><?= $ivf_treatment_plan->Weight->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->Weight->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Weight"><span id="el_ivf_treatment_plan_Weight">
<span<?= $ivf_treatment_plan->Weight->viewAttributes() ?>>
<?= $ivf_treatment_plan->Weight->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
        <tr id="r_BMI">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_BMI"><?= $ivf_treatment_plan->BMI->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->BMI->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_BMI"><span id="el_ivf_treatment_plan_BMI">
<span<?= $ivf_treatment_plan->BMI->viewAttributes() ?>>
<?= $ivf_treatment_plan->BMI->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
        <tr id="r_MaleIndications">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_MaleIndications"><?= $ivf_treatment_plan->MaleIndications->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->MaleIndications->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_MaleIndications"><span id="el_ivf_treatment_plan_MaleIndications">
<span<?= $ivf_treatment_plan->MaleIndications->viewAttributes() ?>>
<?= $ivf_treatment_plan->MaleIndications->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
        <tr id="r_FemaleIndications">
            <td class="<?= $ivf_treatment_plan->TableLeftColumnClass ?>"><template id="tpc_ivf_treatment_plan_FemaleIndications"><?= $ivf_treatment_plan->FemaleIndications->caption() ?></template></td>
            <td <?= $ivf_treatment_plan->FemaleIndications->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_FemaleIndications"><span id="el_ivf_treatment_plan_FemaleIndications">
<span<?= $ivf_treatment_plan->FemaleIndications->viewAttributes() ?>>
<?= $ivf_treatment_plan->FemaleIndications->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_ivf_treatment_planmaster" class="ew-custom-template"></div>
<template id="tpm_ivf_treatment_planmaster">
<div id="ct_IvfTreatmentPlanMaster"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
?>	
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results1[0]["profilePic"]; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
		if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
		{
			$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
		}else{
			$kk = 0;
			for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
				if($cid == $VitalsHistory[$x]["TidNo"])
				{
					$kk = 1;
					$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
				}
			}
			if($kk == 0)
			{
				$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
			}
		}
	}else{
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";
	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
																																																																																																																																																																																																													?>
		<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
</div>
</template>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($ivf_treatment_plan->Rows) ?> };
    ew.applyTemplate("tpd_ivf_treatment_planmaster", "tpm_ivf_treatment_planmaster", "ivf_treatment_planmaster", "<?= $ivf_treatment_plan->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>
