<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($ip_admission->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_ip_admissionmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($ip_admission->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_id" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->id->caption() ?></span></script></td>
			<td<?php echo $ip_admission->id->cellAttributes() ?>>
<script id="tpx_ip_admission_id" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_id">
<span<?php echo $ip_admission->id->viewAttributes() ?>>
<?php echo $ip_admission->id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->mrnNo->Visible) { // mrnNo ?>
		<tr id="r_mrnNo">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_mrnNo" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->mrnNo->caption() ?></span></script></td>
			<td<?php echo $ip_admission->mrnNo->cellAttributes() ?>>
<script id="tpx_ip_admission_mrnNo" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_mrnNo">
<span<?php echo $ip_admission->mrnNo->viewAttributes() ?>>
<?php echo $ip_admission->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->PatientID->Visible) { // PatientID ?>
		<tr id="r_PatientID">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_PatientID" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->PatientID->caption() ?></span></script></td>
			<td<?php echo $ip_admission->PatientID->cellAttributes() ?>>
<script id="tpx_ip_admission_PatientID" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_PatientID">
<span<?php echo $ip_admission->PatientID->viewAttributes() ?>>
<?php echo $ip_admission->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->patient_name->Visible) { // patient_name ?>
		<tr id="r_patient_name">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_patient_name" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->patient_name->caption() ?></span></script></td>
			<td<?php echo $ip_admission->patient_name->cellAttributes() ?>>
<script id="tpx_ip_admission_patient_name" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_patient_name">
<span<?php echo $ip_admission->patient_name->viewAttributes() ?>>
<?php echo $ip_admission->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->mobileno->Visible) { // mobileno ?>
		<tr id="r_mobileno">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_mobileno" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->mobileno->caption() ?></span></script></td>
			<td<?php echo $ip_admission->mobileno->cellAttributes() ?>>
<script id="tpx_ip_admission_mobileno" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_mobileno">
<span<?php echo $ip_admission->mobileno->viewAttributes() ?>>
<?php echo $ip_admission->mobileno->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->gender->Visible) { // gender ?>
		<tr id="r_gender">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_gender" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->gender->caption() ?></span></script></td>
			<td<?php echo $ip_admission->gender->cellAttributes() ?>>
<script id="tpx_ip_admission_gender" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_gender">
<span<?php echo $ip_admission->gender->viewAttributes() ?>>
<?php echo $ip_admission->gender->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->age->Visible) { // age ?>
		<tr id="r_age">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_age" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->age->caption() ?></span></script></td>
			<td<?php echo $ip_admission->age->cellAttributes() ?>>
<script id="tpx_ip_admission_age" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_age">
<span<?php echo $ip_admission->age->viewAttributes() ?>>
<?php echo $ip_admission->age->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<tr id="r_typeRegsisteration">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_typeRegsisteration" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->typeRegsisteration->caption() ?></span></script></td>
			<td<?php echo $ip_admission->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_ip_admission_typeRegsisteration" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_typeRegsisteration">
<span<?php echo $ip_admission->typeRegsisteration->viewAttributes() ?>>
<?php echo $ip_admission->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
		<tr id="r_PaymentCategory">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_PaymentCategory" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->PaymentCategory->caption() ?></span></script></td>
			<td<?php echo $ip_admission->PaymentCategory->cellAttributes() ?>>
<script id="tpx_ip_admission_PaymentCategory" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_PaymentCategory">
<span<?php echo $ip_admission->PaymentCategory->viewAttributes() ?>>
<?php echo $ip_admission->PaymentCategory->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->physician_id->Visible) { // physician_id ?>
		<tr id="r_physician_id">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_physician_id" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->physician_id->caption() ?></span></script></td>
			<td<?php echo $ip_admission->physician_id->cellAttributes() ?>>
<script id="tpx_ip_admission_physician_id" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_physician_id">
<span<?php echo $ip_admission->physician_id->viewAttributes() ?>>
<?php echo $ip_admission->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<tr id="r_admission_consultant_id">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_admission_consultant_id" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->admission_consultant_id->caption() ?></span></script></td>
			<td<?php echo $ip_admission->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_ip_admission_admission_consultant_id" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_admission_consultant_id">
<span<?php echo $ip_admission->admission_consultant_id->viewAttributes() ?>>
<?php echo $ip_admission->admission_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<tr id="r_leading_consultant_id">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_leading_consultant_id" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->leading_consultant_id->caption() ?></span></script></td>
			<td<?php echo $ip_admission->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_ip_admission_leading_consultant_id" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_leading_consultant_id">
<span<?php echo $ip_admission->leading_consultant_id->viewAttributes() ?>>
<?php echo $ip_admission->leading_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->admission_date->Visible) { // admission_date ?>
		<tr id="r_admission_date">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_admission_date" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->admission_date->caption() ?></span></script></td>
			<td<?php echo $ip_admission->admission_date->cellAttributes() ?>>
<script id="tpx_ip_admission_admission_date" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_admission_date">
<span<?php echo $ip_admission->admission_date->viewAttributes() ?>>
<?php echo $ip_admission->admission_date->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->release_date->Visible) { // release_date ?>
		<tr id="r_release_date">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_release_date" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->release_date->caption() ?></span></script></td>
			<td<?php echo $ip_admission->release_date->cellAttributes() ?>>
<script id="tpx_ip_admission_release_date" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_release_date">
<span<?php echo $ip_admission->release_date->viewAttributes() ?>>
<?php echo $ip_admission->release_date->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->PaymentStatus->Visible) { // PaymentStatus ?>
		<tr id="r_PaymentStatus">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_PaymentStatus" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->PaymentStatus->caption() ?></span></script></td>
			<td<?php echo $ip_admission->PaymentStatus->cellAttributes() ?>>
<script id="tpx_ip_admission_PaymentStatus" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_PaymentStatus">
<span<?php echo $ip_admission->PaymentStatus->viewAttributes() ?>>
<?php echo $ip_admission->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_createddatetime" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->createddatetime->caption() ?></span></script></td>
			<td<?php echo $ip_admission->createddatetime->cellAttributes() ?>>
<script id="tpx_ip_admission_createddatetime" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_createddatetime">
<span<?php echo $ip_admission->createddatetime->viewAttributes() ?>>
<?php echo $ip_admission->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->profilePic->Visible) { // profilePic ?>
		<tr id="r_profilePic">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_profilePic" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->profilePic->caption() ?></span></script></td>
			<td<?php echo $ip_admission->profilePic->cellAttributes() ?>>
<script id="tpx_ip_admission_profilePic" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_profilePic">
<span<?php echo $ip_admission->profilePic->viewAttributes() ?>>
<?php echo $ip_admission->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_HospID" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->HospID->caption() ?></span></script></td>
			<td<?php echo $ip_admission->HospID->cellAttributes() ?>>
<script id="tpx_ip_admission_HospID" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_HospID">
<span<?php echo $ip_admission->HospID->viewAttributes() ?>>
<?php echo $ip_admission->HospID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->ReferedByDr->Visible) { // ReferedByDr ?>
		<tr id="r_ReferedByDr">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_ReferedByDr" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->ReferedByDr->caption() ?></span></script></td>
			<td<?php echo $ip_admission->ReferedByDr->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferedByDr" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_ReferedByDr">
<span<?php echo $ip_admission->ReferedByDr->viewAttributes() ?>>
<?php echo $ip_admission->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->ReferClinicname->Visible) { // ReferClinicname ?>
		<tr id="r_ReferClinicname">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_ReferClinicname" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->ReferClinicname->caption() ?></span></script></td>
			<td<?php echo $ip_admission->ReferClinicname->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferClinicname" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_ReferClinicname">
<span<?php echo $ip_admission->ReferClinicname->viewAttributes() ?>>
<?php echo $ip_admission->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->ReferCity->Visible) { // ReferCity ?>
		<tr id="r_ReferCity">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_ReferCity" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->ReferCity->caption() ?></span></script></td>
			<td<?php echo $ip_admission->ReferCity->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferCity" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_ReferCity">
<span<?php echo $ip_admission->ReferCity->viewAttributes() ?>>
<?php echo $ip_admission->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<tr id="r_ReferMobileNo">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_ReferMobileNo" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->ReferMobileNo->caption() ?></span></script></td>
			<td<?php echo $ip_admission->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferMobileNo" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_ReferMobileNo">
<span<?php echo $ip_admission->ReferMobileNo->viewAttributes() ?>>
<?php echo $ip_admission->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<tr id="r_ReferA4TreatingConsultant">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_ReferA4TreatingConsultant" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->ReferA4TreatingConsultant->caption() ?></span></script></td>
			<td<?php echo $ip_admission->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferA4TreatingConsultant" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_ReferA4TreatingConsultant">
<span<?php echo $ip_admission->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $ip_admission->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<tr id="r_PurposreReferredfor">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_PurposreReferredfor" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->PurposreReferredfor->caption() ?></span></script></td>
			<td<?php echo $ip_admission->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_ip_admission_PurposreReferredfor" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_PurposreReferredfor">
<span<?php echo $ip_admission->PurposreReferredfor->viewAttributes() ?>>
<?php echo $ip_admission->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->BillClosing->Visible) { // BillClosing ?>
		<tr id="r_BillClosing">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_BillClosing" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->BillClosing->caption() ?></span></script></td>
			<td<?php echo $ip_admission->BillClosing->cellAttributes() ?>>
<script id="tpx_ip_admission_BillClosing" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_BillClosing">
<span<?php echo $ip_admission->BillClosing->viewAttributes() ?>>
<?php echo $ip_admission->BillClosing->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->BillClosingDate->Visible) { // BillClosingDate ?>
		<tr id="r_BillClosingDate">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_BillClosingDate" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->BillClosingDate->caption() ?></span></script></td>
			<td<?php echo $ip_admission->BillClosingDate->cellAttributes() ?>>
<script id="tpx_ip_admission_BillClosingDate" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_BillClosingDate">
<span<?php echo $ip_admission->BillClosingDate->viewAttributes() ?>>
<?php echo $ip_admission->BillClosingDate->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->BillNumber->Visible) { // BillNumber ?>
		<tr id="r_BillNumber">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_BillNumber" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->BillNumber->caption() ?></span></script></td>
			<td<?php echo $ip_admission->BillNumber->cellAttributes() ?>>
<script id="tpx_ip_admission_BillNumber" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_BillNumber">
<span<?php echo $ip_admission->BillNumber->viewAttributes() ?>>
<?php echo $ip_admission->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->ClosingAmount->Visible) { // ClosingAmount ?>
		<tr id="r_ClosingAmount">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_ClosingAmount" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->ClosingAmount->caption() ?></span></script></td>
			<td<?php echo $ip_admission->ClosingAmount->cellAttributes() ?>>
<script id="tpx_ip_admission_ClosingAmount" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_ClosingAmount">
<span<?php echo $ip_admission->ClosingAmount->viewAttributes() ?>>
<?php echo $ip_admission->ClosingAmount->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->ClosingType->Visible) { // ClosingType ?>
		<tr id="r_ClosingType">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_ClosingType" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->ClosingType->caption() ?></span></script></td>
			<td<?php echo $ip_admission->ClosingType->cellAttributes() ?>>
<script id="tpx_ip_admission_ClosingType" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_ClosingType">
<span<?php echo $ip_admission->ClosingType->viewAttributes() ?>>
<?php echo $ip_admission->ClosingType->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->BillAmount->Visible) { // BillAmount ?>
		<tr id="r_BillAmount">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_BillAmount" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->BillAmount->caption() ?></span></script></td>
			<td<?php echo $ip_admission->BillAmount->cellAttributes() ?>>
<script id="tpx_ip_admission_BillAmount" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_BillAmount">
<span<?php echo $ip_admission->BillAmount->viewAttributes() ?>>
<?php echo $ip_admission->BillAmount->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->billclosedBy->Visible) { // billclosedBy ?>
		<tr id="r_billclosedBy">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_billclosedBy" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->billclosedBy->caption() ?></span></script></td>
			<td<?php echo $ip_admission->billclosedBy->cellAttributes() ?>>
<script id="tpx_ip_admission_billclosedBy" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_billclosedBy">
<span<?php echo $ip_admission->billclosedBy->viewAttributes() ?>>
<?php echo $ip_admission->billclosedBy->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<tr id="r_bllcloseByDate">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_bllcloseByDate" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->bllcloseByDate->caption() ?></span></script></td>
			<td<?php echo $ip_admission->bllcloseByDate->cellAttributes() ?>>
<script id="tpx_ip_admission_bllcloseByDate" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_bllcloseByDate">
<span<?php echo $ip_admission->bllcloseByDate->viewAttributes() ?>>
<?php echo $ip_admission->bllcloseByDate->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->ReportHeader->Visible) { // ReportHeader ?>
		<tr id="r_ReportHeader">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_ReportHeader" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->ReportHeader->caption() ?></span></script></td>
			<td<?php echo $ip_admission->ReportHeader->cellAttributes() ?>>
<script id="tpx_ip_admission_ReportHeader" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_ReportHeader">
<span<?php echo $ip_admission->ReportHeader->viewAttributes() ?>>
<?php echo $ip_admission->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->Procedure->Visible) { // Procedure ?>
		<tr id="r_Procedure">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_Procedure" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->Procedure->caption() ?></span></script></td>
			<td<?php echo $ip_admission->Procedure->cellAttributes() ?>>
<script id="tpx_ip_admission_Procedure" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_Procedure">
<span<?php echo $ip_admission->Procedure->viewAttributes() ?>>
<?php echo $ip_admission->Procedure->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->Consultant->Visible) { // Consultant ?>
		<tr id="r_Consultant">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_Consultant" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->Consultant->caption() ?></span></script></td>
			<td<?php echo $ip_admission->Consultant->cellAttributes() ?>>
<script id="tpx_ip_admission_Consultant" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_Consultant">
<span<?php echo $ip_admission->Consultant->viewAttributes() ?>>
<?php echo $ip_admission->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->Anesthetist->Visible) { // Anesthetist ?>
		<tr id="r_Anesthetist">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_Anesthetist" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->Anesthetist->caption() ?></span></script></td>
			<td<?php echo $ip_admission->Anesthetist->cellAttributes() ?>>
<script id="tpx_ip_admission_Anesthetist" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_Anesthetist">
<span<?php echo $ip_admission->Anesthetist->viewAttributes() ?>>
<?php echo $ip_admission->Anesthetist->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->Amound->Visible) { // Amound ?>
		<tr id="r_Amound">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_Amound" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->Amound->caption() ?></span></script></td>
			<td<?php echo $ip_admission->Amound->cellAttributes() ?>>
<script id="tpx_ip_admission_Amound" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_Amound">
<span<?php echo $ip_admission->Amound->viewAttributes() ?>>
<?php echo $ip_admission->Amound->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->Package->Visible) { // Package ?>
		<tr id="r_Package">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_Package" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->Package->caption() ?></span></script></td>
			<td<?php echo $ip_admission->Package->cellAttributes() ?>>
<script id="tpx_ip_admission_Package" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_Package">
<span<?php echo $ip_admission->Package->viewAttributes() ?>>
<?php echo $ip_admission->Package->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->patient_id->Visible) { // patient_id ?>
		<tr id="r_patient_id">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_patient_id" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->patient_id->caption() ?></span></script></td>
			<td<?php echo $ip_admission->patient_id->cellAttributes() ?>>
<script id="tpx_ip_admission_patient_id" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_patient_id">
<span<?php echo $ip_admission->patient_id->viewAttributes() ?>>
<?php echo $ip_admission->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->PartnerID->Visible) { // PartnerID ?>
		<tr id="r_PartnerID">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_PartnerID" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->PartnerID->caption() ?></span></script></td>
			<td<?php echo $ip_admission->PartnerID->cellAttributes() ?>>
<script id="tpx_ip_admission_PartnerID" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_PartnerID">
<span<?php echo $ip_admission->PartnerID->viewAttributes() ?>>
<?php echo $ip_admission->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->PartnerName->Visible) { // PartnerName ?>
		<tr id="r_PartnerName">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_PartnerName" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->PartnerName->caption() ?></span></script></td>
			<td<?php echo $ip_admission->PartnerName->cellAttributes() ?>>
<script id="tpx_ip_admission_PartnerName" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_PartnerName">
<span<?php echo $ip_admission->PartnerName->viewAttributes() ?>>
<?php echo $ip_admission->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->PartnerMobile->Visible) { // PartnerMobile ?>
		<tr id="r_PartnerMobile">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_PartnerMobile" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->PartnerMobile->caption() ?></span></script></td>
			<td<?php echo $ip_admission->PartnerMobile->cellAttributes() ?>>
<script id="tpx_ip_admission_PartnerMobile" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_PartnerMobile">
<span<?php echo $ip_admission->PartnerMobile->viewAttributes() ?>>
<?php echo $ip_admission->PartnerMobile->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->Cid->Visible) { // Cid ?>
		<tr id="r_Cid">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_Cid" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->Cid->caption() ?></span></script></td>
			<td<?php echo $ip_admission->Cid->cellAttributes() ?>>
<script id="tpx_ip_admission_Cid" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_Cid">
<span<?php echo $ip_admission->Cid->viewAttributes() ?>>
<?php echo $ip_admission->Cid->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->PartId->Visible) { // PartId ?>
		<tr id="r_PartId">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_PartId" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->PartId->caption() ?></span></script></td>
			<td<?php echo $ip_admission->PartId->cellAttributes() ?>>
<script id="tpx_ip_admission_PartId" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_PartId">
<span<?php echo $ip_admission->PartId->viewAttributes() ?>>
<?php echo $ip_admission->PartId->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->IDProof->Visible) { // IDProof ?>
		<tr id="r_IDProof">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_IDProof" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->IDProof->caption() ?></span></script></td>
			<td<?php echo $ip_admission->IDProof->cellAttributes() ?>>
<script id="tpx_ip_admission_IDProof" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_IDProof">
<span<?php echo $ip_admission->IDProof->viewAttributes() ?>>
<?php echo $ip_admission->IDProof->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ip_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<tr id="r_AdviceToOtherHospital">
			<td class="<?php echo $ip_admission->TableLeftColumnClass ?>"><script id="tpc_ip_admission_AdviceToOtherHospital" class="ip_admissionmaster" type="text/html"><span><?php echo $ip_admission->AdviceToOtherHospital->caption() ?></span></script></td>
			<td<?php echo $ip_admission->AdviceToOtherHospital->cellAttributes() ?>>
<script id="tpx_ip_admission_AdviceToOtherHospital" class="ip_admissionmaster" type="text/html">
<span id="el_ip_admission_AdviceToOtherHospital">
<span<?php echo $ip_admission->AdviceToOtherHospital->viewAttributes() ?>>
<?php echo $ip_admission->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_ip_admissionmaster" class="ew-custom-template"></div>
<script id="tpm_ip_admissionmaster" type="text/html">
<div id="ct_ip_admission_master"><style>
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
</style>
<p id="profilePic" hidden>{{include tmpl="#tpc_ip_admission_profilePic"/}}&nbsp;{{include tmpl="#tpx_ip_admission_profilePic"/}}</p>
	<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	?>
<p id="profilePic" hidden>{{include tmpl="#tpc_ip_admission_profilePic"/}}&nbsp;{{include tmpl="#tpx_ip_admission_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<div class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h4 class="widget-user-desc"><span class="ew-cell">Patient Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2"  src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">{{include tmpl="#tpc_ip_admission_mrnNo"/}}&nbsp;{{include tmpl="#tpx_ip_admission_mrnNo"/}}</span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Gender : <?php echo $results1[0]["gender"]; ?></h5>
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
</script>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ip_admission->Rows) ?> };
ew.applyTemplate("tpd_ip_admissionmaster", "tpm_ip_admissionmaster", "ip_admissionmaster", "<?php echo $ip_admission->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ip_admissionmaster_js").each(function(){ew.addScript(this.text);});
</script>
<?php } ?>