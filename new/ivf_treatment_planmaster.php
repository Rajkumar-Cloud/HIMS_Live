<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($ivf_treatment_plan->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_ivf_treatment_planmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<tr id="r_TreatmentStartDate">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TreatmentStartDate" type="text/html"><?php echo $ivf_treatment_plan->TreatmentStartDate->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->TreatmentStartDate->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TreatmentStartDate" type="text/html"><span id="el_ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $ivf_treatment_plan->TreatmentStartDate->viewAttributes() ?>><?php echo $ivf_treatment_plan->TreatmentStartDate->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
		<tr id="r_treatment_status">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_treatment_status" type="text/html"><?php echo $ivf_treatment_plan->treatment_status->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->treatment_status->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_treatment_status" type="text/html"><span id="el_ivf_treatment_plan_treatment_status">
<span<?php echo $ivf_treatment_plan->treatment_status->viewAttributes() ?>><?php echo $ivf_treatment_plan->treatment_status->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<tr id="r_ARTCYCLE">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_ARTCYCLE" type="text/html"><?php echo $ivf_treatment_plan->ARTCYCLE->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_ARTCYCLE" type="text/html"><span id="el_ivf_treatment_plan_ARTCYCLE">
<span<?php echo $ivf_treatment_plan->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_treatment_plan->ARTCYCLE->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<tr id="r_IVFCycleNO">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_IVFCycleNO" type="text/html"><?php echo $ivf_treatment_plan->IVFCycleNO->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->IVFCycleNO->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_IVFCycleNO" type="text/html"><span id="el_ivf_treatment_plan_IVFCycleNO">
<span<?php echo $ivf_treatment_plan->IVFCycleNO->viewAttributes() ?>><?php echo $ivf_treatment_plan->IVFCycleNO->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
		<tr id="r_Treatment">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Treatment" type="text/html"><?php echo $ivf_treatment_plan->Treatment->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->Treatment->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Treatment" type="text/html"><span id="el_ivf_treatment_plan_Treatment">
<span<?php echo $ivf_treatment_plan->Treatment->viewAttributes() ?>><?php echo $ivf_treatment_plan->Treatment->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
		<tr id="r_TreatmentTec">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TreatmentTec" type="text/html"><?php echo $ivf_treatment_plan->TreatmentTec->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->TreatmentTec->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TreatmentTec" type="text/html"><span id="el_ivf_treatment_plan_TreatmentTec">
<span<?php echo $ivf_treatment_plan->TreatmentTec->viewAttributes() ?>><?php echo $ivf_treatment_plan->TreatmentTec->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<tr id="r_TypeOfCycle">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TypeOfCycle" type="text/html"><?php echo $ivf_treatment_plan->TypeOfCycle->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->TypeOfCycle->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TypeOfCycle" type="text/html"><span id="el_ivf_treatment_plan_TypeOfCycle">
<span<?php echo $ivf_treatment_plan->TypeOfCycle->viewAttributes() ?>><?php echo $ivf_treatment_plan->TypeOfCycle->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
		<tr id="r_SpermOrgin">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_SpermOrgin" type="text/html"><?php echo $ivf_treatment_plan->SpermOrgin->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->SpermOrgin->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_SpermOrgin" type="text/html"><span id="el_ivf_treatment_plan_SpermOrgin">
<span<?php echo $ivf_treatment_plan->SpermOrgin->viewAttributes() ?>><?php echo $ivf_treatment_plan->SpermOrgin->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
		<tr id="r_State">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_State" type="text/html"><?php echo $ivf_treatment_plan->State->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->State->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_State" type="text/html"><span id="el_ivf_treatment_plan_State">
<span<?php echo $ivf_treatment_plan->State->viewAttributes() ?>><?php echo $ivf_treatment_plan->State->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
		<tr id="r_Origin">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Origin" type="text/html"><?php echo $ivf_treatment_plan->Origin->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->Origin->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Origin" type="text/html"><span id="el_ivf_treatment_plan_Origin">
<span<?php echo $ivf_treatment_plan->Origin->viewAttributes() ?>><?php echo $ivf_treatment_plan->Origin->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
		<tr id="r_MACS">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_MACS" type="text/html"><?php echo $ivf_treatment_plan->MACS->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->MACS->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_MACS" type="text/html"><span id="el_ivf_treatment_plan_MACS">
<span<?php echo $ivf_treatment_plan->MACS->viewAttributes() ?>><?php echo $ivf_treatment_plan->MACS->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
		<tr id="r_Technique">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Technique" type="text/html"><?php echo $ivf_treatment_plan->Technique->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->Technique->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Technique" type="text/html"><span id="el_ivf_treatment_plan_Technique">
<span<?php echo $ivf_treatment_plan->Technique->viewAttributes() ?>><?php echo $ivf_treatment_plan->Technique->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
		<tr id="r_PgdPlanning">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_PgdPlanning" type="text/html"><?php echo $ivf_treatment_plan->PgdPlanning->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->PgdPlanning->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_PgdPlanning" type="text/html"><span id="el_ivf_treatment_plan_PgdPlanning">
<span<?php echo $ivf_treatment_plan->PgdPlanning->viewAttributes() ?>><?php echo $ivf_treatment_plan->PgdPlanning->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
		<tr id="r_IMSI">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_IMSI" type="text/html"><?php echo $ivf_treatment_plan->IMSI->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->IMSI->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_IMSI" type="text/html"><span id="el_ivf_treatment_plan_IMSI">
<span<?php echo $ivf_treatment_plan->IMSI->viewAttributes() ?>><?php echo $ivf_treatment_plan->IMSI->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
		<tr id="r_SequentialCulture">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_SequentialCulture" type="text/html"><?php echo $ivf_treatment_plan->SequentialCulture->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->SequentialCulture->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_SequentialCulture" type="text/html"><span id="el_ivf_treatment_plan_SequentialCulture">
<span<?php echo $ivf_treatment_plan->SequentialCulture->viewAttributes() ?>><?php echo $ivf_treatment_plan->SequentialCulture->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
		<tr id="r_TimeLapse">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TimeLapse" type="text/html"><?php echo $ivf_treatment_plan->TimeLapse->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->TimeLapse->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TimeLapse" type="text/html"><span id="el_ivf_treatment_plan_TimeLapse">
<span<?php echo $ivf_treatment_plan->TimeLapse->viewAttributes() ?>><?php echo $ivf_treatment_plan->TimeLapse->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
		<tr id="r_AH">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_AH" type="text/html"><?php echo $ivf_treatment_plan->AH->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->AH->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_AH" type="text/html"><span id="el_ivf_treatment_plan_AH">
<span<?php echo $ivf_treatment_plan->AH->viewAttributes() ?>><?php echo $ivf_treatment_plan->AH->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
		<tr id="r_Weight">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Weight" type="text/html"><?php echo $ivf_treatment_plan->Weight->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->Weight->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Weight" type="text/html"><span id="el_ivf_treatment_plan_Weight">
<span<?php echo $ivf_treatment_plan->Weight->viewAttributes() ?>><?php echo $ivf_treatment_plan->Weight->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
		<tr id="r_BMI">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_BMI" type="text/html"><?php echo $ivf_treatment_plan->BMI->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->BMI->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_BMI" type="text/html"><span id="el_ivf_treatment_plan_BMI">
<span<?php echo $ivf_treatment_plan->BMI->viewAttributes() ?>><?php echo $ivf_treatment_plan->BMI->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
		<tr id="r_MaleIndications">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_MaleIndications" type="text/html"><?php echo $ivf_treatment_plan->MaleIndications->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->MaleIndications->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_MaleIndications" type="text/html"><span id="el_ivf_treatment_plan_MaleIndications">
<span<?php echo $ivf_treatment_plan->MaleIndications->viewAttributes() ?>><?php echo $ivf_treatment_plan->MaleIndications->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
		<tr id="r_FemaleIndications">
			<td class="<?php echo $ivf_treatment_plan->TableLeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_FemaleIndications" type="text/html"><?php echo $ivf_treatment_plan->FemaleIndications->caption() ?></script></td>
			<td <?php echo $ivf_treatment_plan->FemaleIndications->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_FemaleIndications" type="text/html"><span id="el_ivf_treatment_plan_FemaleIndications">
<span<?php echo $ivf_treatment_plan->FemaleIndications->viewAttributes() ?>><?php echo $ivf_treatment_plan->FemaleIndications->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_ivf_treatment_planmaster" class="ew-custom-template"></div>
<script id="tpm_ivf_treatment_planmaster" type="text/html">
<div id="ct_ivf_treatment_plan_master"><style>
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
</script>

<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_treatment_plan->Rows) ?> };
	ew.applyTemplate("tpd_ivf_treatment_planmaster", "tpm_ivf_treatment_planmaster", "ivf_treatment_planmaster", "<?php echo $ivf_treatment_plan->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_treatment_planmaster_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php } ?>