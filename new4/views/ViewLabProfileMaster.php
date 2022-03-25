<?php

namespace PHPMaker2021\HIMS;

// Table
$view_lab_profile = Container("view_lab_profile");
?>
<?php if ($view_lab_profile->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_lab_profilemaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($view_lab_profile->Id->Visible) { // Id ?>
        <tr id="r_Id">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_Id"><?= $view_lab_profile->Id->caption() ?></template></td>
            <td <?= $view_lab_profile->Id->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Id"><span id="el_view_lab_profile_Id">
<span<?= $view_lab_profile->Id->viewAttributes() ?>>
<?= $view_lab_profile->Id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->CODE->Visible) { // CODE ?>
        <tr id="r_CODE">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_CODE"><?= $view_lab_profile->CODE->caption() ?></template></td>
            <td <?= $view_lab_profile->CODE->cellAttributes() ?>>
<template id="tpx_view_lab_profile_CODE"><span id="el_view_lab_profile_CODE">
<span<?= $view_lab_profile->CODE->viewAttributes() ?>>
<?= $view_lab_profile->CODE->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->SERVICE->Visible) { // SERVICE ?>
        <tr id="r_SERVICE">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_SERVICE"><?= $view_lab_profile->SERVICE->caption() ?></template></td>
            <td <?= $view_lab_profile->SERVICE->cellAttributes() ?>>
<template id="tpx_view_lab_profile_SERVICE"><span id="el_view_lab_profile_SERVICE">
<span<?= $view_lab_profile->SERVICE->viewAttributes() ?>>
<?= $view_lab_profile->SERVICE->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->UNITS->Visible) { // UNITS ?>
        <tr id="r_UNITS">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_UNITS"><?= $view_lab_profile->UNITS->caption() ?></template></td>
            <td <?= $view_lab_profile->UNITS->cellAttributes() ?>>
<template id="tpx_view_lab_profile_UNITS"><span id="el_view_lab_profile_UNITS">
<span<?= $view_lab_profile->UNITS->viewAttributes() ?>>
<?= $view_lab_profile->UNITS->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->AMOUNT->Visible) { // AMOUNT ?>
        <tr id="r_AMOUNT">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_AMOUNT"><?= $view_lab_profile->AMOUNT->caption() ?></template></td>
            <td <?= $view_lab_profile->AMOUNT->cellAttributes() ?>>
<template id="tpx_view_lab_profile_AMOUNT"><span id="el_view_lab_profile_AMOUNT">
<span<?= $view_lab_profile->AMOUNT->viewAttributes() ?>>
<?= $view_lab_profile->AMOUNT->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <tr id="r_SERVICE_TYPE">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_SERVICE_TYPE"><?= $view_lab_profile->SERVICE_TYPE->caption() ?></template></td>
            <td <?= $view_lab_profile->SERVICE_TYPE->cellAttributes() ?>>
<template id="tpx_view_lab_profile_SERVICE_TYPE"><span id="el_view_lab_profile_SERVICE_TYPE">
<span<?= $view_lab_profile->SERVICE_TYPE->viewAttributes() ?>>
<?= $view_lab_profile->SERVICE_TYPE->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <tr id="r_DEPARTMENT">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_DEPARTMENT"><?= $view_lab_profile->DEPARTMENT->caption() ?></template></td>
            <td <?= $view_lab_profile->DEPARTMENT->cellAttributes() ?>>
<template id="tpx_view_lab_profile_DEPARTMENT"><span id="el_view_lab_profile_DEPARTMENT">
<span<?= $view_lab_profile->DEPARTMENT->viewAttributes() ?>>
<?= $view_lab_profile->DEPARTMENT->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <tr id="r_mas_services_billingcol">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_mas_services_billingcol"><?= $view_lab_profile->mas_services_billingcol->caption() ?></template></td>
            <td <?= $view_lab_profile->mas_services_billingcol->cellAttributes() ?>>
<template id="tpx_view_lab_profile_mas_services_billingcol"><span id="el_view_lab_profile_mas_services_billingcol">
<span<?= $view_lab_profile->mas_services_billingcol->viewAttributes() ?>>
<?= $view_lab_profile->mas_services_billingcol->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->DrShareAmount->Visible) { // DrShareAmount ?>
        <tr id="r_DrShareAmount">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_DrShareAmount"><?= $view_lab_profile->DrShareAmount->caption() ?></template></td>
            <td <?= $view_lab_profile->DrShareAmount->cellAttributes() ?>>
<template id="tpx_view_lab_profile_DrShareAmount"><span id="el_view_lab_profile_DrShareAmount">
<span<?= $view_lab_profile->DrShareAmount->viewAttributes() ?>>
<?= $view_lab_profile->DrShareAmount->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->HospShareAmount->Visible) { // HospShareAmount ?>
        <tr id="r_HospShareAmount">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_HospShareAmount"><?= $view_lab_profile->HospShareAmount->caption() ?></template></td>
            <td <?= $view_lab_profile->HospShareAmount->cellAttributes() ?>>
<template id="tpx_view_lab_profile_HospShareAmount"><span id="el_view_lab_profile_HospShareAmount">
<span<?= $view_lab_profile->HospShareAmount->viewAttributes() ?>>
<?= $view_lab_profile->HospShareAmount->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->DrSharePer->Visible) { // DrSharePer ?>
        <tr id="r_DrSharePer">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_DrSharePer"><?= $view_lab_profile->DrSharePer->caption() ?></template></td>
            <td <?= $view_lab_profile->DrSharePer->cellAttributes() ?>>
<template id="tpx_view_lab_profile_DrSharePer"><span id="el_view_lab_profile_DrSharePer">
<span<?= $view_lab_profile->DrSharePer->viewAttributes() ?>>
<?= $view_lab_profile->DrSharePer->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->HospSharePer->Visible) { // HospSharePer ?>
        <tr id="r_HospSharePer">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_HospSharePer"><?= $view_lab_profile->HospSharePer->caption() ?></template></td>
            <td <?= $view_lab_profile->HospSharePer->cellAttributes() ?>>
<template id="tpx_view_lab_profile_HospSharePer"><span id="el_view_lab_profile_HospSharePer">
<span<?= $view_lab_profile->HospSharePer->viewAttributes() ?>>
<?= $view_lab_profile->HospSharePer->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_HospID"><?= $view_lab_profile->HospID->caption() ?></template></td>
            <td <?= $view_lab_profile->HospID->cellAttributes() ?>>
<template id="tpx_view_lab_profile_HospID"><span id="el_view_lab_profile_HospID">
<span<?= $view_lab_profile->HospID->viewAttributes() ?>>
<?= $view_lab_profile->HospID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->TestSubCd->Visible) { // TestSubCd ?>
        <tr id="r_TestSubCd">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_TestSubCd"><?= $view_lab_profile->TestSubCd->caption() ?></template></td>
            <td <?= $view_lab_profile->TestSubCd->cellAttributes() ?>>
<template id="tpx_view_lab_profile_TestSubCd"><span id="el_view_lab_profile_TestSubCd">
<span<?= $view_lab_profile->TestSubCd->viewAttributes() ?>>
<?= $view_lab_profile->TestSubCd->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->Method->Visible) { // Method ?>
        <tr id="r_Method">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_Method"><?= $view_lab_profile->Method->caption() ?></template></td>
            <td <?= $view_lab_profile->Method->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Method"><span id="el_view_lab_profile_Method">
<span<?= $view_lab_profile->Method->viewAttributes() ?>>
<?= $view_lab_profile->Method->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->Order->Visible) { // Order ?>
        <tr id="r_Order">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_Order"><?= $view_lab_profile->Order->caption() ?></template></td>
            <td <?= $view_lab_profile->Order->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Order"><span id="el_view_lab_profile_Order">
<span<?= $view_lab_profile->Order->viewAttributes() ?>>
<?= $view_lab_profile->Order->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->ResType->Visible) { // ResType ?>
        <tr id="r_ResType">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_ResType"><?= $view_lab_profile->ResType->caption() ?></template></td>
            <td <?= $view_lab_profile->ResType->cellAttributes() ?>>
<template id="tpx_view_lab_profile_ResType"><span id="el_view_lab_profile_ResType">
<span<?= $view_lab_profile->ResType->viewAttributes() ?>>
<?= $view_lab_profile->ResType->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->UnitCD->Visible) { // UnitCD ?>
        <tr id="r_UnitCD">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_UnitCD"><?= $view_lab_profile->UnitCD->caption() ?></template></td>
            <td <?= $view_lab_profile->UnitCD->cellAttributes() ?>>
<template id="tpx_view_lab_profile_UnitCD"><span id="el_view_lab_profile_UnitCD">
<span<?= $view_lab_profile->UnitCD->viewAttributes() ?>>
<?= $view_lab_profile->UnitCD->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->Sample->Visible) { // Sample ?>
        <tr id="r_Sample">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_Sample"><?= $view_lab_profile->Sample->caption() ?></template></td>
            <td <?= $view_lab_profile->Sample->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Sample"><span id="el_view_lab_profile_Sample">
<span<?= $view_lab_profile->Sample->viewAttributes() ?>>
<?= $view_lab_profile->Sample->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->NoD->Visible) { // NoD ?>
        <tr id="r_NoD">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_NoD"><?= $view_lab_profile->NoD->caption() ?></template></td>
            <td <?= $view_lab_profile->NoD->cellAttributes() ?>>
<template id="tpx_view_lab_profile_NoD"><span id="el_view_lab_profile_NoD">
<span<?= $view_lab_profile->NoD->viewAttributes() ?>>
<?= $view_lab_profile->NoD->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->BillOrder->Visible) { // BillOrder ?>
        <tr id="r_BillOrder">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_BillOrder"><?= $view_lab_profile->BillOrder->caption() ?></template></td>
            <td <?= $view_lab_profile->BillOrder->cellAttributes() ?>>
<template id="tpx_view_lab_profile_BillOrder"><span id="el_view_lab_profile_BillOrder">
<span<?= $view_lab_profile->BillOrder->viewAttributes() ?>>
<?= $view_lab_profile->BillOrder->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->Inactive->Visible) { // Inactive ?>
        <tr id="r_Inactive">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_Inactive"><?= $view_lab_profile->Inactive->caption() ?></template></td>
            <td <?= $view_lab_profile->Inactive->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Inactive"><span id="el_view_lab_profile_Inactive">
<span<?= $view_lab_profile->Inactive->viewAttributes() ?>>
<?= $view_lab_profile->Inactive->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->Outsource->Visible) { // Outsource ?>
        <tr id="r_Outsource">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_Outsource"><?= $view_lab_profile->Outsource->caption() ?></template></td>
            <td <?= $view_lab_profile->Outsource->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Outsource"><span id="el_view_lab_profile_Outsource">
<span<?= $view_lab_profile->Outsource->viewAttributes() ?>>
<?= $view_lab_profile->Outsource->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->CollSample->Visible) { // CollSample ?>
        <tr id="r_CollSample">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_CollSample"><?= $view_lab_profile->CollSample->caption() ?></template></td>
            <td <?= $view_lab_profile->CollSample->cellAttributes() ?>>
<template id="tpx_view_lab_profile_CollSample"><span id="el_view_lab_profile_CollSample">
<span<?= $view_lab_profile->CollSample->viewAttributes() ?>>
<?= $view_lab_profile->CollSample->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
        <tr id="r_TestType">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_TestType"><?= $view_lab_profile->TestType->caption() ?></template></td>
            <td <?= $view_lab_profile->TestType->cellAttributes() ?>>
<template id="tpx_view_lab_profile_TestType"><span id="el_view_lab_profile_TestType">
<span<?= $view_lab_profile->TestType->viewAttributes() ?>>
<?= $view_lab_profile->TestType->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->NoHeading->Visible) { // NoHeading ?>
        <tr id="r_NoHeading">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_NoHeading"><?= $view_lab_profile->NoHeading->caption() ?></template></td>
            <td <?= $view_lab_profile->NoHeading->cellAttributes() ?>>
<template id="tpx_view_lab_profile_NoHeading"><span id="el_view_lab_profile_NoHeading">
<span<?= $view_lab_profile->NoHeading->viewAttributes() ?>>
<?= $view_lab_profile->NoHeading->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->ChemicalCode->Visible) { // ChemicalCode ?>
        <tr id="r_ChemicalCode">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_ChemicalCode"><?= $view_lab_profile->ChemicalCode->caption() ?></template></td>
            <td <?= $view_lab_profile->ChemicalCode->cellAttributes() ?>>
<template id="tpx_view_lab_profile_ChemicalCode"><span id="el_view_lab_profile_ChemicalCode">
<span<?= $view_lab_profile->ChemicalCode->viewAttributes() ?>>
<?= $view_lab_profile->ChemicalCode->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->ChemicalName->Visible) { // ChemicalName ?>
        <tr id="r_ChemicalName">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_ChemicalName"><?= $view_lab_profile->ChemicalName->caption() ?></template></td>
            <td <?= $view_lab_profile->ChemicalName->cellAttributes() ?>>
<template id="tpx_view_lab_profile_ChemicalName"><span id="el_view_lab_profile_ChemicalName">
<span<?= $view_lab_profile->ChemicalName->viewAttributes() ?>>
<?= $view_lab_profile->ChemicalName->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_profile->Utilaization->Visible) { // Utilaization ?>
        <tr id="r_Utilaization">
            <td class="<?= $view_lab_profile->TableLeftColumnClass ?>"><template id="tpc_view_lab_profile_Utilaization"><?= $view_lab_profile->Utilaization->caption() ?></template></td>
            <td <?= $view_lab_profile->Utilaization->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Utilaization"><span id="el_view_lab_profile_Utilaization">
<span<?= $view_lab_profile->Utilaization->viewAttributes() ?>>
<?= $view_lab_profile->Utilaization->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_view_lab_profilemaster" class="ew-custom-template"></div>
<template id="tpm_view_lab_profilemaster">
<div id="ct_ViewLabProfileMaster"><style>
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
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_CODE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_CODE"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_SERVICE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_SERVICE"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_UNITS"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_UNITS"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_AMOUNT"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_AMOUNT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_SERVICE_TYPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_SERVICE_TYPE"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_DEPARTMENT"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_DEPARTMENT"></slot></span>
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
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_mas_services_billingcol"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_mas_services_billingcol"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_DrShareAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_DrShareAmount"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_HospShareAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_HospShareAmount"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_DrSharePer"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_DrSharePer"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_HospSharePer"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_HospSharePer"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</template>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($view_lab_profile->Rows) ?> };
    ew.applyTemplate("tpd_view_lab_profilemaster", "tpm_view_lab_profilemaster", "view_lab_profilemaster", "<?= $view_lab_profile->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>
