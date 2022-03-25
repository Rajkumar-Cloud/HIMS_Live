<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($view_labreport_print->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_labreport_printmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_labreport_print->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->id->caption() ?></td>
			<td<?php echo $view_labreport_print->id->cellAttributes() ?>>
<span id="el_view_labreport_print_id">
<span<?php echo $view_labreport_print->id->viewAttributes() ?>>
<?php echo $view_labreport_print->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->PatID->Visible) { // PatID ?>
		<tr id="r_PatID">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->PatID->caption() ?></td>
			<td<?php echo $view_labreport_print->PatID->cellAttributes() ?>>
<span id="el_view_labreport_print_PatID">
<span<?php echo $view_labreport_print->PatID->viewAttributes() ?>>
<?php echo $view_labreport_print->PatID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->PatientName->caption() ?></td>
			<td<?php echo $view_labreport_print->PatientName->cellAttributes() ?>>
<span id="el_view_labreport_print_PatientName">
<span<?php echo $view_labreport_print->PatientName->viewAttributes() ?>>
<?php echo $view_labreport_print->PatientName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Age->Visible) { // Age ?>
		<tr id="r_Age">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Age->caption() ?></td>
			<td<?php echo $view_labreport_print->Age->cellAttributes() ?>>
<span id="el_view_labreport_print_Age">
<span<?php echo $view_labreport_print->Age->viewAttributes() ?>>
<?php echo $view_labreport_print->Age->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Gender->Visible) { // Gender ?>
		<tr id="r_Gender">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Gender->caption() ?></td>
			<td<?php echo $view_labreport_print->Gender->cellAttributes() ?>>
<span id="el_view_labreport_print_Gender">
<span<?php echo $view_labreport_print->Gender->viewAttributes() ?>>
<?php echo $view_labreport_print->Gender->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->sid->Visible) { // sid ?>
		<tr id="r_sid">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->sid->caption() ?></td>
			<td<?php echo $view_labreport_print->sid->cellAttributes() ?>>
<span id="el_view_labreport_print_sid">
<span<?php echo $view_labreport_print->sid->viewAttributes() ?>>
<?php echo $view_labreport_print->sid->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->ItemCode->Visible) { // ItemCode ?>
		<tr id="r_ItemCode">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->ItemCode->caption() ?></td>
			<td<?php echo $view_labreport_print->ItemCode->cellAttributes() ?>>
<span id="el_view_labreport_print_ItemCode">
<span<?php echo $view_labreport_print->ItemCode->viewAttributes() ?>>
<?php echo $view_labreport_print->ItemCode->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->DEptCd->Visible) { // DEptCd ?>
		<tr id="r_DEptCd">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->DEptCd->caption() ?></td>
			<td<?php echo $view_labreport_print->DEptCd->cellAttributes() ?>>
<span id="el_view_labreport_print_DEptCd">
<span<?php echo $view_labreport_print->DEptCd->viewAttributes() ?>>
<?php echo $view_labreport_print->DEptCd->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Resulted->Visible) { // Resulted ?>
		<tr id="r_Resulted">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Resulted->caption() ?></td>
			<td<?php echo $view_labreport_print->Resulted->cellAttributes() ?>>
<span id="el_view_labreport_print_Resulted">
<span<?php echo $view_labreport_print->Resulted->viewAttributes() ?>>
<?php echo $view_labreport_print->Resulted->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Services->Visible) { // Services ?>
		<tr id="r_Services">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Services->caption() ?></td>
			<td<?php echo $view_labreport_print->Services->cellAttributes() ?>>
<span id="el_view_labreport_print_Services">
<span<?php echo $view_labreport_print->Services->viewAttributes() ?>>
<?php echo $view_labreport_print->Services->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Pic1->Visible) { // Pic1 ?>
		<tr id="r_Pic1">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Pic1->caption() ?></td>
			<td<?php echo $view_labreport_print->Pic1->cellAttributes() ?>>
<span id="el_view_labreport_print_Pic1">
<span<?php echo $view_labreport_print->Pic1->viewAttributes() ?>>
<?php echo $view_labreport_print->Pic1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Pic2->Visible) { // Pic2 ?>
		<tr id="r_Pic2">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Pic2->caption() ?></td>
			<td<?php echo $view_labreport_print->Pic2->cellAttributes() ?>>
<span id="el_view_labreport_print_Pic2">
<span<?php echo $view_labreport_print->Pic2->viewAttributes() ?>>
<?php echo $view_labreport_print->Pic2->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->TestUnit->Visible) { // TestUnit ?>
		<tr id="r_TestUnit">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->TestUnit->caption() ?></td>
			<td<?php echo $view_labreport_print->TestUnit->cellAttributes() ?>>
<span id="el_view_labreport_print_TestUnit">
<span<?php echo $view_labreport_print->TestUnit->viewAttributes() ?>>
<?php echo $view_labreport_print->TestUnit->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Order->Visible) { // Order ?>
		<tr id="r_Order">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Order->caption() ?></td>
			<td<?php echo $view_labreport_print->Order->cellAttributes() ?>>
<span id="el_view_labreport_print_Order">
<span<?php echo $view_labreport_print->Order->viewAttributes() ?>>
<?php echo $view_labreport_print->Order->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Repeated->Visible) { // Repeated ?>
		<tr id="r_Repeated">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Repeated->caption() ?></td>
			<td<?php echo $view_labreport_print->Repeated->cellAttributes() ?>>
<span id="el_view_labreport_print_Repeated">
<span<?php echo $view_labreport_print->Repeated->viewAttributes() ?>>
<?php echo $view_labreport_print->Repeated->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Vid->Visible) { // Vid ?>
		<tr id="r_Vid">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Vid->caption() ?></td>
			<td<?php echo $view_labreport_print->Vid->cellAttributes() ?>>
<span id="el_view_labreport_print_Vid">
<span<?php echo $view_labreport_print->Vid->viewAttributes() ?>>
<?php echo $view_labreport_print->Vid->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->invoiceId->Visible) { // invoiceId ?>
		<tr id="r_invoiceId">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->invoiceId->caption() ?></td>
			<td<?php echo $view_labreport_print->invoiceId->cellAttributes() ?>>
<span id="el_view_labreport_print_invoiceId">
<span<?php echo $view_labreport_print->invoiceId->viewAttributes() ?>>
<?php echo $view_labreport_print->invoiceId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->DrID->Visible) { // DrID ?>
		<tr id="r_DrID">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->DrID->caption() ?></td>
			<td<?php echo $view_labreport_print->DrID->cellAttributes() ?>>
<span id="el_view_labreport_print_DrID">
<span<?php echo $view_labreport_print->DrID->viewAttributes() ?>>
<?php echo $view_labreport_print->DrID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->DrCODE->Visible) { // DrCODE ?>
		<tr id="r_DrCODE">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->DrCODE->caption() ?></td>
			<td<?php echo $view_labreport_print->DrCODE->cellAttributes() ?>>
<span id="el_view_labreport_print_DrCODE">
<span<?php echo $view_labreport_print->DrCODE->viewAttributes() ?>>
<?php echo $view_labreport_print->DrCODE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->DrName->Visible) { // DrName ?>
		<tr id="r_DrName">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->DrName->caption() ?></td>
			<td<?php echo $view_labreport_print->DrName->cellAttributes() ?>>
<span id="el_view_labreport_print_DrName">
<span<?php echo $view_labreport_print->DrName->viewAttributes() ?>>
<?php echo $view_labreport_print->DrName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Department->Visible) { // Department ?>
		<tr id="r_Department">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Department->caption() ?></td>
			<td<?php echo $view_labreport_print->Department->cellAttributes() ?>>
<span id="el_view_labreport_print_Department">
<span<?php echo $view_labreport_print->Department->viewAttributes() ?>>
<?php echo $view_labreport_print->Department->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->createddatetime->caption() ?></td>
			<td<?php echo $view_labreport_print->createddatetime->cellAttributes() ?>>
<span id="el_view_labreport_print_createddatetime">
<span<?php echo $view_labreport_print->createddatetime->viewAttributes() ?>>
<?php echo $view_labreport_print->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->status->caption() ?></td>
			<td<?php echo $view_labreport_print->status->cellAttributes() ?>>
<span id="el_view_labreport_print_status">
<span<?php echo $view_labreport_print->status->viewAttributes() ?>>
<?php echo $view_labreport_print->status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->TestType->Visible) { // TestType ?>
		<tr id="r_TestType">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->TestType->caption() ?></td>
			<td<?php echo $view_labreport_print->TestType->cellAttributes() ?>>
<span id="el_view_labreport_print_TestType">
<span<?php echo $view_labreport_print->TestType->viewAttributes() ?>>
<?php echo $view_labreport_print->TestType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->ResultDate->Visible) { // ResultDate ?>
		<tr id="r_ResultDate">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->ResultDate->caption() ?></td>
			<td<?php echo $view_labreport_print->ResultDate->cellAttributes() ?>>
<span id="el_view_labreport_print_ResultDate">
<span<?php echo $view_labreport_print->ResultDate->viewAttributes() ?>>
<?php echo $view_labreport_print->ResultDate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->ResultedBy->Visible) { // ResultedBy ?>
		<tr id="r_ResultedBy">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->ResultedBy->caption() ?></td>
			<td<?php echo $view_labreport_print->ResultedBy->cellAttributes() ?>>
<span id="el_view_labreport_print_ResultedBy">
<span<?php echo $view_labreport_print->ResultedBy->viewAttributes() ?>>
<?php echo $view_labreport_print->ResultedBy->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->Printed->Visible) { // Printed ?>
		<tr id="r_Printed">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->Printed->caption() ?></td>
			<td<?php echo $view_labreport_print->Printed->cellAttributes() ?>>
<span id="el_view_labreport_print_Printed">
<span<?php echo $view_labreport_print->Printed->viewAttributes() ?>>
<?php echo $view_labreport_print->Printed->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->PrintBy->Visible) { // PrintBy ?>
		<tr id="r_PrintBy">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->PrintBy->caption() ?></td>
			<td<?php echo $view_labreport_print->PrintBy->cellAttributes() ?>>
<span id="el_view_labreport_print_PrintBy">
<span<?php echo $view_labreport_print->PrintBy->viewAttributes() ?>>
<?php echo $view_labreport_print->PrintBy->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_labreport_print->PrintDate->Visible) { // PrintDate ?>
		<tr id="r_PrintDate">
			<td class="<?php echo $view_labreport_print->TableLeftColumnClass ?>"><?php echo $view_labreport_print->PrintDate->caption() ?></td>
			<td<?php echo $view_labreport_print->PrintDate->cellAttributes() ?>>
<span id="el_view_labreport_print_PrintDate">
<span<?php echo $view_labreport_print->PrintDate->viewAttributes() ?>>
<?php echo $view_labreport_print->PrintDate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>