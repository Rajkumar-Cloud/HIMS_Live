<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($view_lab_profile->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_lab_profilemaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($view_lab_profile->Id->Visible) { // Id ?>
		<tr id="r_Id">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_Id" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->Id->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->Id->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Id" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_Id">
<span<?php echo $view_lab_profile->Id->viewAttributes() ?>>
<?php echo $view_lab_profile->Id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->CODE->Visible) { // CODE ?>
		<tr id="r_CODE">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_CODE" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->CODE->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->CODE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CODE" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_CODE">
<span<?php echo $view_lab_profile->CODE->viewAttributes() ?>>
<?php echo $view_lab_profile->CODE->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->SERVICE->Visible) { // SERVICE ?>
		<tr id="r_SERVICE">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_SERVICE" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->SERVICE->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->SERVICE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_SERVICE" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_SERVICE">
<span<?php echo $view_lab_profile->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_profile->SERVICE->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->UNITS->Visible) { // UNITS ?>
		<tr id="r_UNITS">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_UNITS" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->UNITS->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->UNITS->cellAttributes() ?>>
<script id="tpx_view_lab_profile_UNITS" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_UNITS">
<span<?php echo $view_lab_profile->UNITS->viewAttributes() ?>>
<?php echo $view_lab_profile->UNITS->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->AMOUNT->Visible) { // AMOUNT ?>
		<tr id="r_AMOUNT">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_AMOUNT" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->AMOUNT->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->AMOUNT->cellAttributes() ?>>
<script id="tpx_view_lab_profile_AMOUNT" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_AMOUNT">
<span<?php echo $view_lab_profile->AMOUNT->viewAttributes() ?>>
<?php echo $view_lab_profile->AMOUNT->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<tr id="r_SERVICE_TYPE">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_SERVICE_TYPE" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->SERVICE_TYPE->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_SERVICE_TYPE" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_SERVICE_TYPE">
<span<?php echo $view_lab_profile->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_lab_profile->SERVICE_TYPE->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<tr id="r_DEPARTMENT">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_DEPARTMENT" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->DEPARTMENT->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DEPARTMENT" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_DEPARTMENT">
<span<?php echo $view_lab_profile->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_lab_profile->DEPARTMENT->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<tr id="r_mas_services_billingcol">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_mas_services_billingcol" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->mas_services_billingcol->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_view_lab_profile_mas_services_billingcol" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_mas_services_billingcol">
<span<?php echo $view_lab_profile->mas_services_billingcol->viewAttributes() ?>>
<?php echo $view_lab_profile->mas_services_billingcol->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->DrShareAmount->Visible) { // DrShareAmount ?>
		<tr id="r_DrShareAmount">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_DrShareAmount" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->DrShareAmount->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->DrShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DrShareAmount" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_DrShareAmount">
<span<?php echo $view_lab_profile->DrShareAmount->viewAttributes() ?>>
<?php echo $view_lab_profile->DrShareAmount->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->HospShareAmount->Visible) { // HospShareAmount ?>
		<tr id="r_HospShareAmount">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_HospShareAmount" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->HospShareAmount->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->HospShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospShareAmount" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_HospShareAmount">
<span<?php echo $view_lab_profile->HospShareAmount->viewAttributes() ?>>
<?php echo $view_lab_profile->HospShareAmount->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->DrSharePer->Visible) { // DrSharePer ?>
		<tr id="r_DrSharePer">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_DrSharePer" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->DrSharePer->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->DrSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DrSharePer" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_DrSharePer">
<span<?php echo $view_lab_profile->DrSharePer->viewAttributes() ?>>
<?php echo $view_lab_profile->DrSharePer->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->HospSharePer->Visible) { // HospSharePer ?>
		<tr id="r_HospSharePer">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_HospSharePer" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->HospSharePer->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->HospSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospSharePer" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_HospSharePer">
<span<?php echo $view_lab_profile->HospSharePer->viewAttributes() ?>>
<?php echo $view_lab_profile->HospSharePer->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_HospID" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->HospID->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->HospID->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospID" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_HospID">
<span<?php echo $view_lab_profile->HospID->viewAttributes() ?>>
<?php echo $view_lab_profile->HospID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->TestSubCd->Visible) { // TestSubCd ?>
		<tr id="r_TestSubCd">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_TestSubCd" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->TestSubCd->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->TestSubCd->cellAttributes() ?>>
<script id="tpx_view_lab_profile_TestSubCd" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_TestSubCd">
<span<?php echo $view_lab_profile->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_profile->TestSubCd->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->Method->Visible) { // Method ?>
		<tr id="r_Method">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_Method" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->Method->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->Method->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Method" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_Method">
<span<?php echo $view_lab_profile->Method->viewAttributes() ?>>
<?php echo $view_lab_profile->Method->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->Order->Visible) { // Order ?>
		<tr id="r_Order">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_Order" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->Order->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->Order->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Order" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_Order">
<span<?php echo $view_lab_profile->Order->viewAttributes() ?>>
<?php echo $view_lab_profile->Order->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->ResType->Visible) { // ResType ?>
		<tr id="r_ResType">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_ResType" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->ResType->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->ResType->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ResType" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_ResType">
<span<?php echo $view_lab_profile->ResType->viewAttributes() ?>>
<?php echo $view_lab_profile->ResType->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->UnitCD->Visible) { // UnitCD ?>
		<tr id="r_UnitCD">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_UnitCD" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->UnitCD->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->UnitCD->cellAttributes() ?>>
<script id="tpx_view_lab_profile_UnitCD" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_UnitCD">
<span<?php echo $view_lab_profile->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_profile->UnitCD->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->Sample->Visible) { // Sample ?>
		<tr id="r_Sample">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_Sample" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->Sample->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->Sample->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Sample" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_Sample">
<span<?php echo $view_lab_profile->Sample->viewAttributes() ?>>
<?php echo $view_lab_profile->Sample->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->NoD->Visible) { // NoD ?>
		<tr id="r_NoD">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_NoD" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->NoD->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->NoD->cellAttributes() ?>>
<script id="tpx_view_lab_profile_NoD" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_NoD">
<span<?php echo $view_lab_profile->NoD->viewAttributes() ?>>
<?php echo $view_lab_profile->NoD->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->BillOrder->Visible) { // BillOrder ?>
		<tr id="r_BillOrder">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_BillOrder" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->BillOrder->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->BillOrder->cellAttributes() ?>>
<script id="tpx_view_lab_profile_BillOrder" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_BillOrder">
<span<?php echo $view_lab_profile->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_profile->BillOrder->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->Inactive->Visible) { // Inactive ?>
		<tr id="r_Inactive">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_Inactive" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->Inactive->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->Inactive->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Inactive" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_Inactive">
<span<?php echo $view_lab_profile->Inactive->viewAttributes() ?>>
<?php echo $view_lab_profile->Inactive->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->Outsource->Visible) { // Outsource ?>
		<tr id="r_Outsource">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_Outsource" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->Outsource->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->Outsource->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Outsource" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_Outsource">
<span<?php echo $view_lab_profile->Outsource->viewAttributes() ?>>
<?php echo $view_lab_profile->Outsource->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->CollSample->Visible) { // CollSample ?>
		<tr id="r_CollSample">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_CollSample" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->CollSample->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->CollSample->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CollSample" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_CollSample">
<span<?php echo $view_lab_profile->CollSample->viewAttributes() ?>>
<?php echo $view_lab_profile->CollSample->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
		<tr id="r_TestType">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_TestType" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->TestType->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->TestType->cellAttributes() ?>>
<script id="tpx_view_lab_profile_TestType" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_TestType">
<span<?php echo $view_lab_profile->TestType->viewAttributes() ?>>
<?php echo $view_lab_profile->TestType->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->NoHeading->Visible) { // NoHeading ?>
		<tr id="r_NoHeading">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_NoHeading" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->NoHeading->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->NoHeading->cellAttributes() ?>>
<script id="tpx_view_lab_profile_NoHeading" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_NoHeading">
<span<?php echo $view_lab_profile->NoHeading->viewAttributes() ?>>
<?php echo $view_lab_profile->NoHeading->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->ChemicalCode->Visible) { // ChemicalCode ?>
		<tr id="r_ChemicalCode">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_ChemicalCode" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->ChemicalCode->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->ChemicalCode->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ChemicalCode" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_ChemicalCode">
<span<?php echo $view_lab_profile->ChemicalCode->viewAttributes() ?>>
<?php echo $view_lab_profile->ChemicalCode->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->ChemicalName->Visible) { // ChemicalName ?>
		<tr id="r_ChemicalName">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_ChemicalName" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->ChemicalName->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->ChemicalName->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ChemicalName" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_ChemicalName">
<span<?php echo $view_lab_profile->ChemicalName->viewAttributes() ?>>
<?php echo $view_lab_profile->ChemicalName->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_profile->Utilaization->Visible) { // Utilaization ?>
		<tr id="r_Utilaization">
			<td class="<?php echo $view_lab_profile->TableLeftColumnClass ?>"><script id="tpc_view_lab_profile_Utilaization" class="view_lab_profilemaster" type="text/html"><span><?php echo $view_lab_profile->Utilaization->caption() ?></span></script></td>
			<td<?php echo $view_lab_profile->Utilaization->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Utilaization" class="view_lab_profilemaster" type="text/html">
<span id="el_view_lab_profile_Utilaization">
<span<?php echo $view_lab_profile->Utilaization->viewAttributes() ?>>
<?php echo $view_lab_profile->Utilaization->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_view_lab_profilemaster" class="ew-custom-template"></div>
<script id="tpm_view_lab_profilemaster" type="text/html">
<div id="ct_view_lab_profile_master"><style>
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
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Service Details</h3>
			</div>
			<div class="card-body">			
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_CODE"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_CODE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_SERVICE"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_SERVICE"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_UNITS"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_UNITS"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_AMOUNT"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_AMOUNT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_SERVICE_TYPE"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_SERVICE_TYPE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DEPARTMENT"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_DEPARTMENT"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_mas_services_billingcol"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_mas_services_billingcol"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DrShareAmount"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_DrShareAmount"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_HospShareAmount"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_HospShareAmount"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DrSharePer"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_DrSharePer"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_HospSharePer"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_HospSharePer"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_lab_profile->Rows) ?> };
ew.applyTemplate("tpd_view_lab_profilemaster", "tpm_view_lab_profilemaster", "view_lab_profilemaster", "<?php echo $view_lab_profile->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_lab_profilemaster_js").each(function(){ew.addScript(this.text);});
</script>
<?php } ?>