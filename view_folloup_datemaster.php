<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($view_folloup_date->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_folloup_datemaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_folloup_date->NextReviewDate->Visible) { // NextReviewDate ?>
		<tr id="r_NextReviewDate">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->NextReviewDate->caption() ?></td>
			<td<?php echo $view_folloup_date->NextReviewDate->cellAttributes() ?>>
<span id="el_view_folloup_date_NextReviewDate">
<span<?php echo $view_folloup_date->NextReviewDate->viewAttributes() ?>>
<?php echo $view_folloup_date->NextReviewDate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->id->caption() ?></td>
			<td<?php echo $view_folloup_date->id->cellAttributes() ?>>
<span id="el_view_folloup_date_id">
<span<?php echo $view_folloup_date->id->viewAttributes() ?>>
<?php echo $view_folloup_date->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->Reception->Visible) { // Reception ?>
		<tr id="r_Reception">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->Reception->caption() ?></td>
			<td<?php echo $view_folloup_date->Reception->cellAttributes() ?>>
<span id="el_view_folloup_date_Reception">
<span<?php echo $view_folloup_date->Reception->viewAttributes() ?>>
<?php echo $view_folloup_date->Reception->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->PatientId->Visible) { // PatientId ?>
		<tr id="r_PatientId">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->PatientId->caption() ?></td>
			<td<?php echo $view_folloup_date->PatientId->cellAttributes() ?>>
<span id="el_view_folloup_date_PatientId">
<span<?php echo $view_folloup_date->PatientId->viewAttributes() ?>>
<?php echo $view_folloup_date->PatientId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->PatientName->caption() ?></td>
			<td<?php echo $view_folloup_date->PatientName->cellAttributes() ?>>
<span id="el_view_folloup_date_PatientName">
<span<?php echo $view_folloup_date->PatientName->viewAttributes() ?>>
<?php echo $view_folloup_date->PatientName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->mrnno->Visible) { // mrnno ?>
		<tr id="r_mrnno">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->mrnno->caption() ?></td>
			<td<?php echo $view_folloup_date->mrnno->cellAttributes() ?>>
<span id="el_view_folloup_date_mrnno">
<span<?php echo $view_folloup_date->mrnno->viewAttributes() ?>>
<?php echo $view_folloup_date->mrnno->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->Age->Visible) { // Age ?>
		<tr id="r_Age">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->Age->caption() ?></td>
			<td<?php echo $view_folloup_date->Age->cellAttributes() ?>>
<span id="el_view_folloup_date_Age">
<span<?php echo $view_folloup_date->Age->viewAttributes() ?>>
<?php echo $view_folloup_date->Age->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->Gender->Visible) { // Gender ?>
		<tr id="r_Gender">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->Gender->caption() ?></td>
			<td<?php echo $view_folloup_date->Gender->cellAttributes() ?>>
<span id="el_view_folloup_date_Gender">
<span<?php echo $view_folloup_date->Gender->viewAttributes() ?>>
<?php echo $view_folloup_date->Gender->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->HospID->caption() ?></td>
			<td<?php echo $view_folloup_date->HospID->cellAttributes() ?>>
<span id="el_view_folloup_date_HospID">
<span<?php echo $view_folloup_date->HospID->viewAttributes() ?>>
<?php echo $view_folloup_date->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->PatientID1->Visible) { // PatientID1 ?>
		<tr id="r_PatientID1">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->PatientID1->caption() ?></td>
			<td<?php echo $view_folloup_date->PatientID1->cellAttributes() ?>>
<span id="el_view_folloup_date_PatientID1">
<span<?php echo $view_folloup_date->PatientID1->viewAttributes() ?>>
<?php echo $view_folloup_date->PatientID1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->physician_id->Visible) { // physician_id ?>
		<tr id="r_physician_id">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->physician_id->caption() ?></td>
			<td<?php echo $view_folloup_date->physician_id->cellAttributes() ?>>
<span id="el_view_folloup_date_physician_id">
<span<?php echo $view_folloup_date->physician_id->viewAttributes() ?>>
<?php echo $view_folloup_date->physician_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->mobile_no->Visible) { // mobile_no ?>
		<tr id="r_mobile_no">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->mobile_no->caption() ?></td>
			<td<?php echo $view_folloup_date->mobile_no->cellAttributes() ?>>
<span id="el_view_folloup_date_mobile_no">
<span<?php echo $view_folloup_date->mobile_no->viewAttributes() ?>>
<?php echo $view_folloup_date->mobile_no->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<tr id="r_spouse_mobile_no">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->spouse_mobile_no->caption() ?></td>
			<td<?php echo $view_folloup_date->spouse_mobile_no->cellAttributes() ?>>
<span id="el_view_folloup_date_spouse_mobile_no">
<span<?php echo $view_folloup_date->spouse_mobile_no->viewAttributes() ?>>
<?php echo $view_folloup_date->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->PEmail->Visible) { // PEmail ?>
		<tr id="r_PEmail">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->PEmail->caption() ?></td>
			<td<?php echo $view_folloup_date->PEmail->cellAttributes() ?>>
<span id="el_view_folloup_date_PEmail">
<span<?php echo $view_folloup_date->PEmail->viewAttributes() ?>>
<?php echo $view_folloup_date->PEmail->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<tr id="r_PEmergencyContact">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->PEmergencyContact->caption() ?></td>
			<td<?php echo $view_folloup_date->PEmergencyContact->cellAttributes() ?>>
<span id="el_view_folloup_date_PEmergencyContact">
<span<?php echo $view_folloup_date->PEmergencyContact->viewAttributes() ?>>
<?php echo $view_folloup_date->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->CODE->Visible) { // CODE ?>
		<tr id="r_CODE">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->CODE->caption() ?></td>
			<td<?php echo $view_folloup_date->CODE->cellAttributes() ?>>
<span id="el_view_folloup_date_CODE">
<span<?php echo $view_folloup_date->CODE->viewAttributes() ?>>
<?php echo $view_folloup_date->CODE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->NAME->Visible) { // NAME ?>
		<tr id="r_NAME">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->NAME->caption() ?></td>
			<td<?php echo $view_folloup_date->NAME->cellAttributes() ?>>
<span id="el_view_folloup_date_NAME">
<span<?php echo $view_folloup_date->NAME->viewAttributes() ?>>
<?php echo $view_folloup_date->NAME->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<tr id="r_DEPARTMENT">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->DEPARTMENT->caption() ?></td>
			<td<?php echo $view_folloup_date->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_folloup_date_DEPARTMENT">
<span<?php echo $view_folloup_date->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_folloup_date->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->start_time->Visible) { // start_time ?>
		<tr id="r_start_time">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->start_time->caption() ?></td>
			<td<?php echo $view_folloup_date->start_time->cellAttributes() ?>>
<span id="el_view_folloup_date_start_time">
<span<?php echo $view_folloup_date->start_time->viewAttributes() ?>>
<?php echo $view_folloup_date->start_time->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->end_time->Visible) { // end_time ?>
		<tr id="r_end_time">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->end_time->caption() ?></td>
			<td<?php echo $view_folloup_date->end_time->cellAttributes() ?>>
<span id="el_view_folloup_date_end_time">
<span<?php echo $view_folloup_date->end_time->viewAttributes() ?>>
<?php echo $view_folloup_date->end_time->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->slot_time->Visible) { // slot_time ?>
		<tr id="r_slot_time">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->slot_time->caption() ?></td>
			<td<?php echo $view_folloup_date->slot_time->cellAttributes() ?>>
<span id="el_view_folloup_date_slot_time">
<span<?php echo $view_folloup_date->slot_time->viewAttributes() ?>>
<?php echo $view_folloup_date->slot_time->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_folloup_date->scheduler_id->Visible) { // scheduler_id ?>
		<tr id="r_scheduler_id">
			<td class="<?php echo $view_folloup_date->TableLeftColumnClass ?>"><?php echo $view_folloup_date->scheduler_id->caption() ?></td>
			<td<?php echo $view_folloup_date->scheduler_id->cellAttributes() ?>>
<span id="el_view_folloup_date_scheduler_id">
<span<?php echo $view_folloup_date->scheduler_id->viewAttributes() ?>>
<?php echo $view_folloup_date->scheduler_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>