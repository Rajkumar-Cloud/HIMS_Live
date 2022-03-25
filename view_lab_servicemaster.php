<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($view_lab_service->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_lab_servicemaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_lab_service->Id->Visible) { // Id ?>
		<tr id="r_Id">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->Id->caption() ?></td>
			<td<?php echo $view_lab_service->Id->cellAttributes() ?>>
<span id="el_view_lab_service_Id">
<span<?php echo $view_lab_service->Id->viewAttributes() ?>>
<?php echo $view_lab_service->Id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->CODE->Visible) { // CODE ?>
		<tr id="r_CODE">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->CODE->caption() ?></td>
			<td<?php echo $view_lab_service->CODE->cellAttributes() ?>>
<span id="el_view_lab_service_CODE">
<span<?php echo $view_lab_service->CODE->viewAttributes() ?>>
<?php echo $view_lab_service->CODE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->SERVICE->Visible) { // SERVICE ?>
		<tr id="r_SERVICE">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->SERVICE->caption() ?></td>
			<td<?php echo $view_lab_service->SERVICE->cellAttributes() ?>>
<span id="el_view_lab_service_SERVICE">
<span<?php echo $view_lab_service->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_service->SERVICE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->UNITS->Visible) { // UNITS ?>
		<tr id="r_UNITS">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->UNITS->caption() ?></td>
			<td<?php echo $view_lab_service->UNITS->cellAttributes() ?>>
<span id="el_view_lab_service_UNITS">
<span<?php echo $view_lab_service->UNITS->viewAttributes() ?>>
<?php echo $view_lab_service->UNITS->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->AMOUNT->Visible) { // AMOUNT ?>
		<tr id="r_AMOUNT">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->AMOUNT->caption() ?></td>
			<td<?php echo $view_lab_service->AMOUNT->cellAttributes() ?>>
<span id="el_view_lab_service_AMOUNT">
<span<?php echo $view_lab_service->AMOUNT->viewAttributes() ?>>
<?php echo $view_lab_service->AMOUNT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<tr id="r_SERVICE_TYPE">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->SERVICE_TYPE->caption() ?></td>
			<td<?php echo $view_lab_service->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_view_lab_service_SERVICE_TYPE">
<span<?php echo $view_lab_service->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_lab_service->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<tr id="r_DEPARTMENT">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->DEPARTMENT->caption() ?></td>
			<td<?php echo $view_lab_service->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_lab_service_DEPARTMENT">
<span<?php echo $view_lab_service->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_lab_service->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<tr id="r_mas_services_billingcol">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->mas_services_billingcol->caption() ?></td>
			<td<?php echo $view_lab_service->mas_services_billingcol->cellAttributes() ?>>
<span id="el_view_lab_service_mas_services_billingcol">
<span<?php echo $view_lab_service->mas_services_billingcol->viewAttributes() ?>>
<?php echo $view_lab_service->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->DrShareAmount->Visible) { // DrShareAmount ?>
		<tr id="r_DrShareAmount">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->DrShareAmount->caption() ?></td>
			<td<?php echo $view_lab_service->DrShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_DrShareAmount">
<span<?php echo $view_lab_service->DrShareAmount->viewAttributes() ?>>
<?php echo $view_lab_service->DrShareAmount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->HospShareAmount->Visible) { // HospShareAmount ?>
		<tr id="r_HospShareAmount">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->HospShareAmount->caption() ?></td>
			<td<?php echo $view_lab_service->HospShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_HospShareAmount">
<span<?php echo $view_lab_service->HospShareAmount->viewAttributes() ?>>
<?php echo $view_lab_service->HospShareAmount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->DrSharePer->Visible) { // DrSharePer ?>
		<tr id="r_DrSharePer">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->DrSharePer->caption() ?></td>
			<td<?php echo $view_lab_service->DrSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_DrSharePer">
<span<?php echo $view_lab_service->DrSharePer->viewAttributes() ?>>
<?php echo $view_lab_service->DrSharePer->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->HospSharePer->Visible) { // HospSharePer ?>
		<tr id="r_HospSharePer">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->HospSharePer->caption() ?></td>
			<td<?php echo $view_lab_service->HospSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_HospSharePer">
<span<?php echo $view_lab_service->HospSharePer->viewAttributes() ?>>
<?php echo $view_lab_service->HospSharePer->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->HospID->caption() ?></td>
			<td<?php echo $view_lab_service->HospID->cellAttributes() ?>>
<span id="el_view_lab_service_HospID">
<span<?php echo $view_lab_service->HospID->viewAttributes() ?>>
<?php echo $view_lab_service->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->TestSubCd->Visible) { // TestSubCd ?>
		<tr id="r_TestSubCd">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->TestSubCd->caption() ?></td>
			<td<?php echo $view_lab_service->TestSubCd->cellAttributes() ?>>
<span id="el_view_lab_service_TestSubCd">
<span<?php echo $view_lab_service->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_service->TestSubCd->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->Method->Visible) { // Method ?>
		<tr id="r_Method">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->Method->caption() ?></td>
			<td<?php echo $view_lab_service->Method->cellAttributes() ?>>
<span id="el_view_lab_service_Method">
<span<?php echo $view_lab_service->Method->viewAttributes() ?>>
<?php echo $view_lab_service->Method->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->Order->Visible) { // Order ?>
		<tr id="r_Order">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->Order->caption() ?></td>
			<td<?php echo $view_lab_service->Order->cellAttributes() ?>>
<span id="el_view_lab_service_Order">
<span<?php echo $view_lab_service->Order->viewAttributes() ?>>
<?php echo $view_lab_service->Order->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->ResType->Visible) { // ResType ?>
		<tr id="r_ResType">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->ResType->caption() ?></td>
			<td<?php echo $view_lab_service->ResType->cellAttributes() ?>>
<span id="el_view_lab_service_ResType">
<span<?php echo $view_lab_service->ResType->viewAttributes() ?>>
<?php echo $view_lab_service->ResType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->UnitCD->Visible) { // UnitCD ?>
		<tr id="r_UnitCD">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->UnitCD->caption() ?></td>
			<td<?php echo $view_lab_service->UnitCD->cellAttributes() ?>>
<span id="el_view_lab_service_UnitCD">
<span<?php echo $view_lab_service->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_service->UnitCD->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->Sample->Visible) { // Sample ?>
		<tr id="r_Sample">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->Sample->caption() ?></td>
			<td<?php echo $view_lab_service->Sample->cellAttributes() ?>>
<span id="el_view_lab_service_Sample">
<span<?php echo $view_lab_service->Sample->viewAttributes() ?>>
<?php echo $view_lab_service->Sample->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->NoD->Visible) { // NoD ?>
		<tr id="r_NoD">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->NoD->caption() ?></td>
			<td<?php echo $view_lab_service->NoD->cellAttributes() ?>>
<span id="el_view_lab_service_NoD">
<span<?php echo $view_lab_service->NoD->viewAttributes() ?>>
<?php echo $view_lab_service->NoD->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->BillOrder->Visible) { // BillOrder ?>
		<tr id="r_BillOrder">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->BillOrder->caption() ?></td>
			<td<?php echo $view_lab_service->BillOrder->cellAttributes() ?>>
<span id="el_view_lab_service_BillOrder">
<span<?php echo $view_lab_service->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_service->BillOrder->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->Inactive->Visible) { // Inactive ?>
		<tr id="r_Inactive">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->Inactive->caption() ?></td>
			<td<?php echo $view_lab_service->Inactive->cellAttributes() ?>>
<span id="el_view_lab_service_Inactive">
<span<?php echo $view_lab_service->Inactive->viewAttributes() ?>>
<?php echo $view_lab_service->Inactive->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->Outsource->Visible) { // Outsource ?>
		<tr id="r_Outsource">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->Outsource->caption() ?></td>
			<td<?php echo $view_lab_service->Outsource->cellAttributes() ?>>
<span id="el_view_lab_service_Outsource">
<span<?php echo $view_lab_service->Outsource->viewAttributes() ?>>
<?php echo $view_lab_service->Outsource->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->CollSample->Visible) { // CollSample ?>
		<tr id="r_CollSample">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->CollSample->caption() ?></td>
			<td<?php echo $view_lab_service->CollSample->cellAttributes() ?>>
<span id="el_view_lab_service_CollSample">
<span<?php echo $view_lab_service->CollSample->viewAttributes() ?>>
<?php echo $view_lab_service->CollSample->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->TestType->Visible) { // TestType ?>
		<tr id="r_TestType">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->TestType->caption() ?></td>
			<td<?php echo $view_lab_service->TestType->cellAttributes() ?>>
<span id="el_view_lab_service_TestType">
<span<?php echo $view_lab_service->TestType->viewAttributes() ?>>
<?php echo $view_lab_service->TestType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->NoHeading->Visible) { // NoHeading ?>
		<tr id="r_NoHeading">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->NoHeading->caption() ?></td>
			<td<?php echo $view_lab_service->NoHeading->cellAttributes() ?>>
<span id="el_view_lab_service_NoHeading">
<span<?php echo $view_lab_service->NoHeading->viewAttributes() ?>>
<?php echo $view_lab_service->NoHeading->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->ChemicalCode->Visible) { // ChemicalCode ?>
		<tr id="r_ChemicalCode">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->ChemicalCode->caption() ?></td>
			<td<?php echo $view_lab_service->ChemicalCode->cellAttributes() ?>>
<span id="el_view_lab_service_ChemicalCode">
<span<?php echo $view_lab_service->ChemicalCode->viewAttributes() ?>>
<?php echo $view_lab_service->ChemicalCode->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->ChemicalName->Visible) { // ChemicalName ?>
		<tr id="r_ChemicalName">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->ChemicalName->caption() ?></td>
			<td<?php echo $view_lab_service->ChemicalName->cellAttributes() ?>>
<span id="el_view_lab_service_ChemicalName">
<span<?php echo $view_lab_service->ChemicalName->viewAttributes() ?>>
<?php echo $view_lab_service->ChemicalName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_service->Utilaization->Visible) { // Utilaization ?>
		<tr id="r_Utilaization">
			<td class="<?php echo $view_lab_service->TableLeftColumnClass ?>"><?php echo $view_lab_service->Utilaization->caption() ?></td>
			<td<?php echo $view_lab_service->Utilaization->cellAttributes() ?>>
<span id="el_view_lab_service_Utilaization">
<span<?php echo $view_lab_service->Utilaization->viewAttributes() ?>>
<?php echo $view_lab_service->Utilaization->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>