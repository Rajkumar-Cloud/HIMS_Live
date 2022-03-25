<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($_appointment_scheduler->Visible) { ?>
<div class="ew-master-div">
<table id="tbl__appointment_schedulermaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($_appointment_scheduler->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->id->caption() ?></td>
			<td<?php echo $_appointment_scheduler->id->cellAttributes() ?>>
<span id="el__appointment_scheduler_id">
<span<?php echo $_appointment_scheduler->id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
		<tr id="r_start_date">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->start_date->caption() ?></td>
			<td<?php echo $_appointment_scheduler->start_date->cellAttributes() ?>>
<span id="el__appointment_scheduler_start_date">
<span<?php echo $_appointment_scheduler->start_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->start_date->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
		<tr id="r_end_date">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->end_date->caption() ?></td>
			<td<?php echo $_appointment_scheduler->end_date->cellAttributes() ?>>
<span id="el__appointment_scheduler_end_date">
<span<?php echo $_appointment_scheduler->end_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->end_date->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
		<tr id="r_patientID">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->patientID->caption() ?></td>
			<td<?php echo $_appointment_scheduler->patientID->cellAttributes() ?>>
<span id="el__appointment_scheduler_patientID">
<span<?php echo $_appointment_scheduler->patientID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
		<tr id="r_patientName">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->patientName->caption() ?></td>
			<td<?php echo $_appointment_scheduler->patientName->cellAttributes() ?>>
<span id="el__appointment_scheduler_patientName">
<span<?php echo $_appointment_scheduler->patientName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
		<tr id="r_DoctorID">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->DoctorID->caption() ?></td>
			<td<?php echo $_appointment_scheduler->DoctorID->cellAttributes() ?>>
<span id="el__appointment_scheduler_DoctorID">
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<tr id="r_DoctorName">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->DoctorName->caption() ?></td>
			<td<?php echo $_appointment_scheduler->DoctorName->cellAttributes() ?>>
<span id="el__appointment_scheduler_DoctorName">
<span<?php echo $_appointment_scheduler->DoctorName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<tr id="r_AppointmentStatus">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->AppointmentStatus->caption() ?></td>
			<td<?php echo $_appointment_scheduler->AppointmentStatus->cellAttributes() ?>>
<span id="el__appointment_scheduler_AppointmentStatus">
<span<?php echo $_appointment_scheduler->AppointmentStatus->viewAttributes() ?>>
<?php echo $_appointment_scheduler->AppointmentStatus->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->status->caption() ?></td>
			<td<?php echo $_appointment_scheduler->status->cellAttributes() ?>>
<span id="el__appointment_scheduler_status">
<span<?php echo $_appointment_scheduler->status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
		<tr id="r_DoctorCode">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->DoctorCode->caption() ?></td>
			<td<?php echo $_appointment_scheduler->DoctorCode->cellAttributes() ?>>
<span id="el__appointment_scheduler_DoctorCode">
<span<?php echo $_appointment_scheduler->DoctorCode->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorCode->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
		<tr id="r_Department">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->Department->caption() ?></td>
			<td<?php echo $_appointment_scheduler->Department->cellAttributes() ?>>
<span id="el__appointment_scheduler_Department">
<span<?php echo $_appointment_scheduler->Department->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Department->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
		<tr id="r_scheduler_id">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->scheduler_id->caption() ?></td>
			<td<?php echo $_appointment_scheduler->scheduler_id->cellAttributes() ?>>
<span id="el__appointment_scheduler_scheduler_id">
<span<?php echo $_appointment_scheduler->scheduler_id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->scheduler_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->text->Visible) { // text ?>
		<tr id="r_text">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->text->caption() ?></td>
			<td<?php echo $_appointment_scheduler->text->cellAttributes() ?>>
<span id="el__appointment_scheduler_text">
<span<?php echo $_appointment_scheduler->text->viewAttributes() ?>>
<?php echo $_appointment_scheduler->text->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
		<tr id="r_appointment_status">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->appointment_status->caption() ?></td>
			<td<?php echo $_appointment_scheduler->appointment_status->cellAttributes() ?>>
<span id="el__appointment_scheduler_appointment_status">
<span<?php echo $_appointment_scheduler->appointment_status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
		<tr id="r_PId">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->PId->caption() ?></td>
			<td<?php echo $_appointment_scheduler->PId->cellAttributes() ?>>
<span id="el__appointment_scheduler_PId">
<span<?php echo $_appointment_scheduler->PId->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<tr id="r_MobileNumber">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->MobileNumber->caption() ?></td>
			<td<?php echo $_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<span id="el__appointment_scheduler_MobileNumber">
<span<?php echo $_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<?php echo $_appointment_scheduler->MobileNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
		<tr id="r_SchEmail">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->SchEmail->caption() ?></td>
			<td<?php echo $_appointment_scheduler->SchEmail->cellAttributes() ?>>
<span id="el__appointment_scheduler_SchEmail">
<span<?php echo $_appointment_scheduler->SchEmail->viewAttributes() ?>>
<?php echo $_appointment_scheduler->SchEmail->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
		<tr id="r_appointment_type">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->appointment_type->caption() ?></td>
			<td<?php echo $_appointment_scheduler->appointment_type->cellAttributes() ?>>
<span id="el__appointment_scheduler_appointment_type">
<span<?php echo $_appointment_scheduler->appointment_type->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_type->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
		<tr id="r_Notified">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->Notified->caption() ?></td>
			<td<?php echo $_appointment_scheduler->Notified->cellAttributes() ?>>
<span id="el__appointment_scheduler_Notified">
<span<?php echo $_appointment_scheduler->Notified->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notified->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<tr id="r_Purpose">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->Purpose->caption() ?></td>
			<td<?php echo $_appointment_scheduler->Purpose->cellAttributes() ?>>
<span id="el__appointment_scheduler_Purpose">
<span<?php echo $_appointment_scheduler->Purpose->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Purpose->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
		<tr id="r_Notes">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->Notes->caption() ?></td>
			<td<?php echo $_appointment_scheduler->Notes->cellAttributes() ?>>
<span id="el__appointment_scheduler_Notes">
<span<?php echo $_appointment_scheduler->Notes->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notes->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
		<tr id="r_PatientType">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->PatientType->caption() ?></td>
			<td<?php echo $_appointment_scheduler->PatientType->cellAttributes() ?>>
<span id="el__appointment_scheduler_PatientType">
<span<?php echo $_appointment_scheduler->PatientType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
		<tr id="r_Referal">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->Referal->caption() ?></td>
			<td<?php echo $_appointment_scheduler->Referal->cellAttributes() ?>>
<span id="el__appointment_scheduler_Referal">
<span<?php echo $_appointment_scheduler->Referal->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Referal->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
		<tr id="r_paymentType">
			<td class="<?php echo $_appointment_scheduler->TableLeftColumnClass ?>"><?php echo $_appointment_scheduler->paymentType->caption() ?></td>
			<td<?php echo $_appointment_scheduler->paymentType->cellAttributes() ?>>
<span id="el__appointment_scheduler_paymentType">
<span<?php echo $_appointment_scheduler->paymentType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->paymentType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>