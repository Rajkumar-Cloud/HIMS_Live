<?php

namespace PHPMaker2021\HIMS;

// Page object
$AppointmentSchedulerView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fappointment_schedulerview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fappointment_schedulerview = currentForm = new ew.Form("fappointment_schedulerview", "view");
    loadjs.done("fappointment_schedulerview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.appointment_scheduler) ew.vars.tables.appointment_scheduler = <?= JsonEncode(GetClientVar("tables", "appointment_scheduler")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fappointment_schedulerview" id="fappointment_schedulerview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_scheduler">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_id"><template id="tpc_appointment_scheduler_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_id"><span id="el_appointment_scheduler_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <tr id="r_start_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_start_date"><template id="tpc_appointment_scheduler_start_date"><?= $Page->start_date->caption() ?></template></span></td>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_start_date"><span id="el_appointment_scheduler_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <tr id="r_end_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_end_date"><template id="tpc_appointment_scheduler_end_date"><?= $Page->end_date->caption() ?></template></span></td>
        <td data-name="end_date" <?= $Page->end_date->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_end_date"><span id="el_appointment_scheduler_end_date">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
    <tr id="r_patientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_patientID"><template id="tpc_appointment_scheduler_patientID"><?= $Page->patientID->caption() ?></template></span></td>
        <td data-name="patientID" <?= $Page->patientID->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_patientID"><span id="el_appointment_scheduler_patientID">
<span<?= $Page->patientID->viewAttributes() ?>>
<?= $Page->patientID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
    <tr id="r_patientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_patientName"><template id="tpc_appointment_scheduler_patientName"><?= $Page->patientName->caption() ?></template></span></td>
        <td data-name="patientName" <?= $Page->patientName->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_patientName"><span id="el_appointment_scheduler_patientName">
<span<?= $Page->patientName->viewAttributes() ?>>
<?= $Page->patientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
    <tr id="r_DoctorID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_DoctorID"><template id="tpc_appointment_scheduler_DoctorID"><?= $Page->DoctorID->caption() ?></template></span></td>
        <td data-name="DoctorID" <?= $Page->DoctorID->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_DoctorID"><span id="el_appointment_scheduler_DoctorID">
<span<?= $Page->DoctorID->viewAttributes() ?>>
<?= $Page->DoctorID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
    <tr id="r_DoctorName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_DoctorName"><template id="tpc_appointment_scheduler_DoctorName"><?= $Page->DoctorName->caption() ?></template></span></td>
        <td data-name="DoctorName" <?= $Page->DoctorName->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_DoctorName"><span id="el_appointment_scheduler_DoctorName">
<span<?= $Page->DoctorName->viewAttributes() ?>>
<?= $Page->DoctorName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
    <tr id="r_AppointmentStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_AppointmentStatus"><template id="tpc_appointment_scheduler_AppointmentStatus"><?= $Page->AppointmentStatus->caption() ?></template></span></td>
        <td data-name="AppointmentStatus" <?= $Page->AppointmentStatus->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_AppointmentStatus"><span id="el_appointment_scheduler_AppointmentStatus">
<span<?= $Page->AppointmentStatus->viewAttributes() ?>>
<?= $Page->AppointmentStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_status"><template id="tpc_appointment_scheduler_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_status"><span id="el_appointment_scheduler_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
    <tr id="r_DoctorCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_DoctorCode"><template id="tpc_appointment_scheduler_DoctorCode"><?= $Page->DoctorCode->caption() ?></template></span></td>
        <td data-name="DoctorCode" <?= $Page->DoctorCode->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_DoctorCode"><span id="el_appointment_scheduler_DoctorCode">
<span<?= $Page->DoctorCode->viewAttributes() ?>>
<?= $Page->DoctorCode->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <tr id="r_Department">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Department"><template id="tpc_appointment_scheduler_Department"><?= $Page->Department->caption() ?></template></span></td>
        <td data-name="Department" <?= $Page->Department->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Department"><span id="el_appointment_scheduler_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
    <tr id="r_scheduler_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_scheduler_id"><template id="tpc_appointment_scheduler_scheduler_id"><?= $Page->scheduler_id->caption() ?></template></span></td>
        <td data-name="scheduler_id" <?= $Page->scheduler_id->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_scheduler_id"><span id="el_appointment_scheduler_scheduler_id">
<span<?= $Page->scheduler_id->viewAttributes() ?>>
<?= $Page->scheduler_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->text->Visible) { // text ?>
    <tr id="r_text">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_text"><template id="tpc_appointment_scheduler_text"><?= $Page->text->caption() ?></template></span></td>
        <td data-name="text" <?= $Page->text->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_text"><span id="el_appointment_scheduler_text">
<span<?= $Page->text->viewAttributes() ?>>
<?= $Page->text->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->appointment_status->Visible) { // appointment_status ?>
    <tr id="r_appointment_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_appointment_status"><template id="tpc_appointment_scheduler_appointment_status"><?= $Page->appointment_status->caption() ?></template></span></td>
        <td data-name="appointment_status" <?= $Page->appointment_status->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_appointment_status"><span id="el_appointment_scheduler_appointment_status">
<span<?= $Page->appointment_status->viewAttributes() ?>>
<?= $Page->appointment_status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <tr id="r_PId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_PId"><template id="tpc_appointment_scheduler_PId"><?= $Page->PId->caption() ?></template></span></td>
        <td data-name="PId" <?= $Page->PId->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_PId"><span id="el_appointment_scheduler_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_MobileNumber"><template id="tpc_appointment_scheduler_MobileNumber"><?= $Page->MobileNumber->caption() ?></template></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_MobileNumber"><span id="el_appointment_scheduler_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
    <tr id="r_SchEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_SchEmail"><template id="tpc_appointment_scheduler_SchEmail"><?= $Page->SchEmail->caption() ?></template></span></td>
        <td data-name="SchEmail" <?= $Page->SchEmail->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_SchEmail"><span id="el_appointment_scheduler_SchEmail">
<span<?= $Page->SchEmail->viewAttributes() ?>>
<?= $Page->SchEmail->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
    <tr id="r_appointment_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_appointment_type"><template id="tpc_appointment_scheduler_appointment_type"><?= $Page->appointment_type->caption() ?></template></span></td>
        <td data-name="appointment_type" <?= $Page->appointment_type->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_appointment_type"><span id="el_appointment_scheduler_appointment_type">
<span<?= $Page->appointment_type->viewAttributes() ?>>
<?= $Page->appointment_type->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
    <tr id="r_Notified">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Notified"><template id="tpc_appointment_scheduler_Notified"><?= $Page->Notified->caption() ?></template></span></td>
        <td data-name="Notified" <?= $Page->Notified->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Notified"><span id="el_appointment_scheduler_Notified">
<span<?= $Page->Notified->viewAttributes() ?>>
<?= $Page->Notified->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <tr id="r_Purpose">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Purpose"><template id="tpc_appointment_scheduler_Purpose"><?= $Page->Purpose->caption() ?></template></span></td>
        <td data-name="Purpose" <?= $Page->Purpose->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Purpose"><span id="el_appointment_scheduler_Purpose">
<span<?= $Page->Purpose->viewAttributes() ?>>
<?= $Page->Purpose->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
    <tr id="r_Notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Notes"><template id="tpc_appointment_scheduler_Notes"><?= $Page->Notes->caption() ?></template></span></td>
        <td data-name="Notes" <?= $Page->Notes->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Notes"><span id="el_appointment_scheduler_Notes">
<span<?= $Page->Notes->viewAttributes() ?>>
<?= $Page->Notes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
    <tr id="r_PatientType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_PatientType"><template id="tpc_appointment_scheduler_PatientType"><?= $Page->PatientType->caption() ?></template></span></td>
        <td data-name="PatientType" <?= $Page->PatientType->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_PatientType"><span id="el_appointment_scheduler_PatientType">
<span<?= $Page->PatientType->viewAttributes() ?>>
<?= $Page->PatientType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
    <tr id="r_Referal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Referal"><template id="tpc_appointment_scheduler_Referal"><?= $Page->Referal->caption() ?></template></span></td>
        <td data-name="Referal" <?= $Page->Referal->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Referal"><span id="el_appointment_scheduler_Referal">
<span<?= $Page->Referal->viewAttributes() ?>>
<?= $Page->Referal->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
    <tr id="r_paymentType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_paymentType"><template id="tpc_appointment_scheduler_paymentType"><?= $Page->paymentType->caption() ?></template></span></td>
        <td data-name="paymentType" <?= $Page->paymentType->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_paymentType"><span id="el_appointment_scheduler_paymentType">
<span<?= $Page->paymentType->viewAttributes() ?>>
<?= $Page->paymentType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tittle->Visible) { // tittle ?>
    <tr id="r_tittle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_tittle"><template id="tpc_appointment_scheduler_tittle"><?= $Page->tittle->caption() ?></template></span></td>
        <td data-name="tittle" <?= $Page->tittle->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_tittle"><span id="el_appointment_scheduler_tittle">
<span<?= $Page->tittle->viewAttributes() ?>>
<?= $Page->tittle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gendar->Visible) { // gendar ?>
    <tr id="r_gendar">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_gendar"><template id="tpc_appointment_scheduler_gendar"><?= $Page->gendar->caption() ?></template></span></td>
        <td data-name="gendar" <?= $Page->gendar->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_gendar"><span id="el_appointment_scheduler_gendar">
<span<?= $Page->gendar->viewAttributes() ?>>
<?= $Page->gendar->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <tr id="r_Dob">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Dob"><template id="tpc_appointment_scheduler_Dob"><?= $Page->Dob->caption() ?></template></span></td>
        <td data-name="Dob" <?= $Page->Dob->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Dob"><span id="el_appointment_scheduler_Dob">
<span<?= $Page->Dob->viewAttributes() ?>>
<?= $Page->Dob->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Age"><template id="tpc_appointment_scheduler_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Age"><span id="el_appointment_scheduler_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <tr id="r_WhereDidYouHear">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_WhereDidYouHear"><template id="tpc_appointment_scheduler_WhereDidYouHear"><?= $Page->WhereDidYouHear->caption() ?></template></span></td>
        <td data-name="WhereDidYouHear" <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_WhereDidYouHear"><span id="el_appointment_scheduler_WhereDidYouHear">
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_HospID"><template id="tpc_appointment_scheduler_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_HospID"><span id="el_appointment_scheduler_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdBy->Visible) { // createdBy ?>
    <tr id="r_createdBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_createdBy"><template id="tpc_appointment_scheduler_createdBy"><?= $Page->createdBy->caption() ?></template></span></td>
        <td data-name="createdBy" <?= $Page->createdBy->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_createdBy"><span id="el_appointment_scheduler_createdBy">
<span<?= $Page->createdBy->viewAttributes() ?>>
<?= $Page->createdBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
    <tr id="r_createdDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_createdDateTime"><template id="tpc_appointment_scheduler_createdDateTime"><?= $Page->createdDateTime->caption() ?></template></span></td>
        <td data-name="createdDateTime" <?= $Page->createdDateTime->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_createdDateTime"><span id="el_appointment_scheduler_createdDateTime">
<span<?= $Page->createdDateTime->viewAttributes() ?>>
<?= $Page->createdDateTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
    <tr id="r_PatientTypee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_PatientTypee"><template id="tpc_appointment_scheduler_PatientTypee"><?= $Page->PatientTypee->caption() ?></template></span></td>
        <td data-name="PatientTypee" <?= $Page->PatientTypee->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_PatientTypee"><span id="el_appointment_scheduler_PatientTypee">
<span<?= $Page->PatientTypee->viewAttributes() ?>>
<?= $Page->PatientTypee->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_appointment_schedulerview" class="ew-custom-template"></div>
<template id="tpm_appointment_schedulerview">
<div id="ct_AppointmentSchedulerView"><style type="text/css" >
.form-control {
	display: table;
	max-width: none;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 92%;
}
@media (min-width: 576px)
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 92%;
}
.input-group>.form-control.ew-lookup-text {
	width: 80%;
}
@media (min-width: 576px)
.input-group>.form-control.ew-lookup-text {
	width: 80%;
}
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 80%;
}
</style>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr><td class="bg-warning text-warning"><slot class="ew-slot" name="tpc_appointment_scheduler_start_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_start_date"></slot></td><td class="bg-warning text-warning"><slot class="ew-slot" name="tpc_appointment_scheduler_end_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_end_date"></slot></td><td><slot class="ew-slot" name="tpc_appointment_scheduler_PatientType"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_PatientType"></slot></td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
	 	<tr>
		<td><slot class="ew-slot" name="tpc_appointment_scheduler_patientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_patientID"></slot></td><td><slot class="ew-slot" name="tpc_appointment_scheduler_patientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_patientName"></slot></td>
		<td><slot class="ew-slot" name="tpc_appointment_scheduler_PatientTypee"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_PatientTypee"></slot></td>
	</tr>
	</tbody>
</table>
<table id="addNewPatient" class="ew-table"  style="width:100%;background-color:#FF33A8;">
	 <tbody>	
		<tr>
			<td  name="addNewPatient"><slot class="ew-slot" name="tpc_appointment_scheduler_tittle"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_tittle"></slot></td>
			<td>
			<slot class="ew-slot" name="tpc_appointment_scheduler_gendar"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_gendar"></slot>
</td>
			<td>
			<slot class="ew-slot" name="tpc_appointment_scheduler_Dob"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Dob"></slot>
			</td>
			<td>
			<slot class="ew-slot" name="tpc_appointment_scheduler_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Age"></slot>
			</td>
			<td>
			<a href="patientadd.php?pagetoredirect=appointment_scheduler" id="addNewPatientSer" name="addNewPatientSer" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">More</a>
			</td>
		</tr>
	</tbody>	
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td><slot class="ew-slot" name="tpc_appointment_scheduler_PId"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_PId"></slot></td><td><slot class="ew-slot" name="tpc_appointment_scheduler_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_MobileNumber"></slot></td></tr>
		<tr><td><slot class="ew-slot" name="tpc_appointment_scheduler_SchEmail"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_SchEmail"></slot></td><td><slot class="ew-slot" name="tpc_appointment_scheduler_Notes"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Notes"></slot></td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-success text-success"><slot class="ew-slot" name="tpc_appointment_scheduler_DoctorID"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_DoctorID"></slot></td><td class="bg-success text-success"><slot class="ew-slot" name="tpc_appointment_scheduler_DoctorName"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_DoctorName"></slot></td>
		<td class="bg-success text-success"><slot class="ew-slot" name="tpc_appointment_scheduler_DoctorCode"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_DoctorCode"></slot></td><td class="bg-success text-success"><slot class="ew-slot" name="tpc_appointment_scheduler_Department"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Department"></slot></td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-danger text-danger"><slot class="ew-slot" name="tpc_appointment_scheduler_Referal"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Referal"></slot></td><td class="bg-danger text-danger"><slot class="ew-slot" name="tpc_appointment_scheduler_Purpose"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Purpose"></slot></td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>	
		<tr>
			<td><slot class="ew-slot" name="tpc_appointment_scheduler_WhereDidYouHear"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_WhereDidYouHear"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_appointment_scheduler_status"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_status"></slot></td>
		</tr>
	</tbody>
</table>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_appointment_schedulerview", "tpm_appointment_schedulerview", "appointment_schedulerview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
