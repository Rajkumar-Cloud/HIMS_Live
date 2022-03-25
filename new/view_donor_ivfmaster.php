<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($view_donor_ivf->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_donor_ivfmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($view_donor_ivf->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_id" type="text/html"><?php echo $view_donor_ivf->id->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->id->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_id" type="text/html"><span id="el_view_donor_ivf_id">
<span<?php echo $view_donor_ivf->id->viewAttributes() ?>><?php echo $view_donor_ivf->id->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->Male->Visible) { // Male ?>
		<tr id="r_Male">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_Male" type="text/html"><?php echo $view_donor_ivf->Male->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->Male->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_Male" type="text/html"><span id="el_view_donor_ivf_Male">
<span<?php echo $view_donor_ivf->Male->viewAttributes() ?>><?php echo $view_donor_ivf->Male->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->Female->Visible) { // Female ?>
		<tr id="r_Female">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_Female" type="text/html"><?php echo $view_donor_ivf->Female->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->Female->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_Female" type="text/html"><span id="el_view_donor_ivf_Female">
<span<?php echo $view_donor_ivf->Female->viewAttributes() ?>><?php echo $view_donor_ivf->Female->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_status" type="text/html"><?php echo $view_donor_ivf->status->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->status->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_status" type="text/html"><span id="el_view_donor_ivf_status">
<span<?php echo $view_donor_ivf->status->viewAttributes() ?>><?php echo $view_donor_ivf->status->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_createdby" type="text/html"><?php echo $view_donor_ivf->createdby->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->createdby->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_createdby" type="text/html"><span id="el_view_donor_ivf_createdby">
<span<?php echo $view_donor_ivf->createdby->viewAttributes() ?>><?php echo $view_donor_ivf->createdby->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_createddatetime" type="text/html"><?php echo $view_donor_ivf->createddatetime->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->createddatetime->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_createddatetime" type="text/html"><span id="el_view_donor_ivf_createddatetime">
<span<?php echo $view_donor_ivf->createddatetime->viewAttributes() ?>><?php echo $view_donor_ivf->createddatetime->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_modifiedby" type="text/html"><?php echo $view_donor_ivf->modifiedby->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->modifiedby->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_modifiedby" type="text/html"><span id="el_view_donor_ivf_modifiedby">
<span<?php echo $view_donor_ivf->modifiedby->viewAttributes() ?>><?php echo $view_donor_ivf->modifiedby->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_modifieddatetime" type="text/html"><?php echo $view_donor_ivf->modifieddatetime->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_modifieddatetime" type="text/html"><span id="el_view_donor_ivf_modifieddatetime">
<span<?php echo $view_donor_ivf->modifieddatetime->viewAttributes() ?>><?php echo $view_donor_ivf->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->malepropic->Visible) { // malepropic ?>
		<tr id="r_malepropic">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_malepropic" type="text/html"><?php echo $view_donor_ivf->malepropic->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->malepropic->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_malepropic" type="text/html"><span id="el_view_donor_ivf_malepropic">
<span><?php echo GetFileViewTag($view_donor_ivf->malepropic, $view_donor_ivf->malepropic->getViewValue(), FALSE) ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->femalepropic->Visible) { // femalepropic ?>
		<tr id="r_femalepropic">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_femalepropic" type="text/html"><?php echo $view_donor_ivf->femalepropic->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->femalepropic->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_femalepropic" type="text/html"><span id="el_view_donor_ivf_femalepropic">
<span><?php echo GetFileViewTag($view_donor_ivf->femalepropic, $view_donor_ivf->femalepropic->getViewValue(), FALSE) ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEducation->Visible) { // HusbandEducation ?>
		<tr id="r_HusbandEducation">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_HusbandEducation" type="text/html"><?php echo $view_donor_ivf->HusbandEducation->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->HusbandEducation->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_HusbandEducation" type="text/html"><span id="el_view_donor_ivf_HusbandEducation">
<span<?php echo $view_donor_ivf->HusbandEducation->viewAttributes() ?>><?php echo $view_donor_ivf->HusbandEducation->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeEducation->Visible) { // WifeEducation ?>
		<tr id="r_WifeEducation">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_WifeEducation" type="text/html"><?php echo $view_donor_ivf->WifeEducation->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->WifeEducation->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_WifeEducation" type="text/html"><span id="el_view_donor_ivf_WifeEducation">
<span<?php echo $view_donor_ivf->WifeEducation->viewAttributes() ?>><?php echo $view_donor_ivf->WifeEducation->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<tr id="r_HusbandWorkHours">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_HusbandWorkHours" type="text/html"><?php echo $view_donor_ivf->HusbandWorkHours->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_HusbandWorkHours" type="text/html"><span id="el_view_donor_ivf_HusbandWorkHours">
<span<?php echo $view_donor_ivf->HusbandWorkHours->viewAttributes() ?>><?php echo $view_donor_ivf->HusbandWorkHours->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<tr id="r_WifeWorkHours">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_WifeWorkHours" type="text/html"><?php echo $view_donor_ivf->WifeWorkHours->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->WifeWorkHours->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_WifeWorkHours" type="text/html"><span id="el_view_donor_ivf_WifeWorkHours">
<span<?php echo $view_donor_ivf->WifeWorkHours->viewAttributes() ?>><?php echo $view_donor_ivf->WifeWorkHours->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->PatientLanguage->Visible) { // PatientLanguage ?>
		<tr id="r_PatientLanguage">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_PatientLanguage" type="text/html"><?php echo $view_donor_ivf->PatientLanguage->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->PatientLanguage->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_PatientLanguage" type="text/html"><span id="el_view_donor_ivf_PatientLanguage">
<span<?php echo $view_donor_ivf->PatientLanguage->viewAttributes() ?>><?php echo $view_donor_ivf->PatientLanguage->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->ReferedBy->Visible) { // ReferedBy ?>
		<tr id="r_ReferedBy">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_ReferedBy" type="text/html"><?php echo $view_donor_ivf->ReferedBy->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->ReferedBy->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_ReferedBy" type="text/html"><span id="el_view_donor_ivf_ReferedBy">
<span<?php echo $view_donor_ivf->ReferedBy->viewAttributes() ?>><?php echo $view_donor_ivf->ReferedBy->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->ReferPhNo->Visible) { // ReferPhNo ?>
		<tr id="r_ReferPhNo">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_ReferPhNo" type="text/html"><?php echo $view_donor_ivf->ReferPhNo->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->ReferPhNo->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_ReferPhNo" type="text/html"><span id="el_view_donor_ivf_ReferPhNo">
<span<?php echo $view_donor_ivf->ReferPhNo->viewAttributes() ?>><?php echo $view_donor_ivf->ReferPhNo->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeCell->Visible) { // WifeCell ?>
		<tr id="r_WifeCell">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_WifeCell" type="text/html"><?php echo $view_donor_ivf->WifeCell->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->WifeCell->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_WifeCell" type="text/html"><span id="el_view_donor_ivf_WifeCell">
<span<?php echo $view_donor_ivf->WifeCell->viewAttributes() ?>><?php echo $view_donor_ivf->WifeCell->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandCell->Visible) { // HusbandCell ?>
		<tr id="r_HusbandCell">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_HusbandCell" type="text/html"><?php echo $view_donor_ivf->HusbandCell->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->HusbandCell->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_HusbandCell" type="text/html"><span id="el_view_donor_ivf_HusbandCell">
<span<?php echo $view_donor_ivf->HusbandCell->viewAttributes() ?>><?php echo $view_donor_ivf->HusbandCell->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeEmail->Visible) { // WifeEmail ?>
		<tr id="r_WifeEmail">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_WifeEmail" type="text/html"><?php echo $view_donor_ivf->WifeEmail->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->WifeEmail->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_WifeEmail" type="text/html"><span id="el_view_donor_ivf_WifeEmail">
<span<?php echo $view_donor_ivf->WifeEmail->viewAttributes() ?>><?php echo $view_donor_ivf->WifeEmail->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
		<tr id="r_HusbandEmail">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_HusbandEmail" type="text/html"><?php echo $view_donor_ivf->HusbandEmail->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->HusbandEmail->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_HusbandEmail" type="text/html"><span id="el_view_donor_ivf_HusbandEmail">
<span<?php echo $view_donor_ivf->HusbandEmail->viewAttributes() ?>><?php echo $view_donor_ivf->HusbandEmail->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<tr id="r_ARTCYCLE">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_ARTCYCLE" type="text/html"><?php echo $view_donor_ivf->ARTCYCLE->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_ARTCYCLE" type="text/html"><span id="el_view_donor_ivf_ARTCYCLE">
<span<?php echo $view_donor_ivf->ARTCYCLE->viewAttributes() ?>><?php echo $view_donor_ivf->ARTCYCLE->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->RESULT->Visible) { // RESULT ?>
		<tr id="r_RESULT">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_RESULT" type="text/html"><?php echo $view_donor_ivf->RESULT->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->RESULT->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_RESULT" type="text/html"><span id="el_view_donor_ivf_RESULT">
<span<?php echo $view_donor_ivf->RESULT->viewAttributes() ?>><?php echo $view_donor_ivf->RESULT->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->CoupleID->Visible) { // CoupleID ?>
		<tr id="r_CoupleID">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_CoupleID" type="text/html"><?php echo $view_donor_ivf->CoupleID->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->CoupleID->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_CoupleID" type="text/html"><span id="el_view_donor_ivf_CoupleID">
<span<?php echo $view_donor_ivf->CoupleID->viewAttributes() ?>><?php echo $view_donor_ivf->CoupleID->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_HospID" type="text/html"><?php echo $view_donor_ivf->HospID->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->HospID->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_HospID" type="text/html"><span id="el_view_donor_ivf_HospID">
<span<?php echo $view_donor_ivf->HospID->viewAttributes() ?>><?php echo $view_donor_ivf->HospID->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_PatientName" type="text/html"><?php echo $view_donor_ivf->PatientName->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->PatientName->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_PatientName" type="text/html"><span id="el_view_donor_ivf_PatientName">
<span<?php echo $view_donor_ivf->PatientName->viewAttributes() ?>><?php echo $view_donor_ivf->PatientName->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->PatientID->Visible) { // PatientID ?>
		<tr id="r_PatientID">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_PatientID" type="text/html"><?php echo $view_donor_ivf->PatientID->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->PatientID->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_PatientID" type="text/html"><span id="el_view_donor_ivf_PatientID">
<span<?php echo $view_donor_ivf->PatientID->viewAttributes() ?>><?php echo $view_donor_ivf->PatientID->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->PartnerName->Visible) { // PartnerName ?>
		<tr id="r_PartnerName">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_PartnerName" type="text/html"><?php echo $view_donor_ivf->PartnerName->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->PartnerName->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_PartnerName" type="text/html"><span id="el_view_donor_ivf_PartnerName">
<span<?php echo $view_donor_ivf->PartnerName->viewAttributes() ?>><?php echo $view_donor_ivf->PartnerName->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->PartnerID->Visible) { // PartnerID ?>
		<tr id="r_PartnerID">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_PartnerID" type="text/html"><?php echo $view_donor_ivf->PartnerID->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->PartnerID->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_PartnerID" type="text/html"><span id="el_view_donor_ivf_PartnerID">
<span<?php echo $view_donor_ivf->PartnerID->viewAttributes() ?>><?php echo $view_donor_ivf->PartnerID->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->DrID->Visible) { // DrID ?>
		<tr id="r_DrID">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_DrID" type="text/html"><?php echo $view_donor_ivf->DrID->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->DrID->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_DrID" type="text/html"><span id="el_view_donor_ivf_DrID">
<span<?php echo $view_donor_ivf->DrID->viewAttributes() ?>><?php echo $view_donor_ivf->DrID->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->DrDepartment->Visible) { // DrDepartment ?>
		<tr id="r_DrDepartment">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_DrDepartment" type="text/html"><?php echo $view_donor_ivf->DrDepartment->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_DrDepartment" type="text/html"><span id="el_view_donor_ivf_DrDepartment">
<span<?php echo $view_donor_ivf->DrDepartment->viewAttributes() ?>><?php echo $view_donor_ivf->DrDepartment->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_donor_ivf->Doctor->Visible) { // Doctor ?>
		<tr id="r_Doctor">
			<td class="<?php echo $view_donor_ivf->TableLeftColumnClass ?>"><script id="tpc_view_donor_ivf_Doctor" type="text/html"><?php echo $view_donor_ivf->Doctor->caption() ?></script></td>
			<td <?php echo $view_donor_ivf->Doctor->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_Doctor" type="text/html"><span id="el_view_donor_ivf_Doctor">
<span<?php echo $view_donor_ivf->Doctor->viewAttributes() ?>><?php echo $view_donor_ivf->Doctor->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_view_donor_ivfmaster" class="ew-custom-template"></div>
<script id="tpm_view_donor_ivfmaster" type="text/html">
<div id="ct_view_donor_ivf_master"><style>
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
$IVFid = $_GET["id"] ;
$IVFid = $_GET["fk_id"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
?>	
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
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
<div style="visibility: hidden" class="col-md-6">
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
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
	if($VitalsHistory == false)
	{
		$$VitalsHistorywarn = "";
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$$VitalsHistorywarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
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
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//$ivfTreatmentwarnUrl = "treatment.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$ivfTreatmentwarnUrl ="ivf_treatment_planlist.php?showdetail=&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
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
	ew.templateData = { rows: <?php echo JsonEncode($view_donor_ivf->Rows) ?> };
	ew.applyTemplate("tpd_view_donor_ivfmaster", "tpm_view_donor_ivfmaster", "view_donor_ivfmaster", "<?php echo $view_donor_ivf->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_donor_ivfmaster_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php } ?>