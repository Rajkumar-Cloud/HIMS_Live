<?php

namespace PHPMaker2021\HIMS;

// Table
$store_grn = Container("store_grn");
?>
<?php if ($store_grn->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_store_grnmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($store_grn->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_id"><?= $store_grn->id->caption() ?></template></td>
            <td <?= $store_grn->id->cellAttributes() ?>>
<template id="tpx_store_grn_id"><span id="el_store_grn_id">
<span<?= $store_grn->id->viewAttributes() ?>>
<?= $store_grn->id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
        <tr id="r_GRNNO">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_GRNNO"><?= $store_grn->GRNNO->caption() ?></template></td>
            <td <?= $store_grn->GRNNO->cellAttributes() ?>>
<template id="tpx_store_grn_GRNNO"><span id="el_store_grn_GRNNO">
<span<?= $store_grn->GRNNO->viewAttributes() ?>>
<?= $store_grn->GRNNO->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->DT->Visible) { // DT ?>
        <tr id="r_DT">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_DT"><?= $store_grn->DT->caption() ?></template></td>
            <td <?= $store_grn->DT->cellAttributes() ?>>
<template id="tpx_store_grn_DT"><span id="el_store_grn_DT">
<span<?= $store_grn->DT->viewAttributes() ?>>
<?= $store_grn->DT->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->Customername->Visible) { // Customername ?>
        <tr id="r_Customername">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_Customername"><?= $store_grn->Customername->caption() ?></template></td>
            <td <?= $store_grn->Customername->cellAttributes() ?>>
<template id="tpx_store_grn_Customername"><span id="el_store_grn_Customername">
<span<?= $store_grn->Customername->viewAttributes() ?>>
<?= $store_grn->Customername->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->State->Visible) { // State ?>
        <tr id="r_State">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_State"><?= $store_grn->State->caption() ?></template></td>
            <td <?= $store_grn->State->cellAttributes() ?>>
<template id="tpx_store_grn_State"><span id="el_store_grn_State">
<span<?= $store_grn->State->viewAttributes() ?>>
<?= $store_grn->State->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
        <tr id="r_Pincode">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_Pincode"><?= $store_grn->Pincode->caption() ?></template></td>
            <td <?= $store_grn->Pincode->cellAttributes() ?>>
<template id="tpx_store_grn_Pincode"><span id="el_store_grn_Pincode">
<span<?= $store_grn->Pincode->viewAttributes() ?>>
<?= $store_grn->Pincode->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->Phone->Visible) { // Phone ?>
        <tr id="r_Phone">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_Phone"><?= $store_grn->Phone->caption() ?></template></td>
            <td <?= $store_grn->Phone->cellAttributes() ?>>
<template id="tpx_store_grn_Phone"><span id="el_store_grn_Phone">
<span<?= $store_grn->Phone->viewAttributes() ?>>
<?= $store_grn->Phone->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
        <tr id="r_BILLNO">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_BILLNO"><?= $store_grn->BILLNO->caption() ?></template></td>
            <td <?= $store_grn->BILLNO->cellAttributes() ?>>
<template id="tpx_store_grn_BILLNO"><span id="el_store_grn_BILLNO">
<span<?= $store_grn->BILLNO->viewAttributes() ?>>
<?= $store_grn->BILLNO->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
        <tr id="r_BILLDT">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_BILLDT"><?= $store_grn->BILLDT->caption() ?></template></td>
            <td <?= $store_grn->BILLDT->cellAttributes() ?>>
<template id="tpx_store_grn_BILLDT"><span id="el_store_grn_BILLDT">
<span<?= $store_grn->BILLDT->viewAttributes() ?>>
<?= $store_grn->BILLDT->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
        <tr id="r_BillTotalValue">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_BillTotalValue"><?= $store_grn->BillTotalValue->caption() ?></template></td>
            <td <?= $store_grn->BillTotalValue->cellAttributes() ?>>
<template id="tpx_store_grn_BillTotalValue"><span id="el_store_grn_BillTotalValue">
<span<?= $store_grn->BillTotalValue->viewAttributes() ?>>
<?= $store_grn->BillTotalValue->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <tr id="r_GRNTotalValue">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_GRNTotalValue"><?= $store_grn->GRNTotalValue->caption() ?></template></td>
            <td <?= $store_grn->GRNTotalValue->cellAttributes() ?>>
<template id="tpx_store_grn_GRNTotalValue"><span id="el_store_grn_GRNTotalValue">
<span<?= $store_grn->GRNTotalValue->viewAttributes() ?>>
<?= $store_grn->GRNTotalValue->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
        <tr id="r_BillDiscount">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_BillDiscount"><?= $store_grn->BillDiscount->caption() ?></template></td>
            <td <?= $store_grn->BillDiscount->cellAttributes() ?>>
<template id="tpx_store_grn_BillDiscount"><span id="el_store_grn_BillDiscount">
<span<?= $store_grn->BillDiscount->viewAttributes() ?>>
<?= $store_grn->BillDiscount->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
        <tr id="r_GrnValue">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_GrnValue"><?= $store_grn->GrnValue->caption() ?></template></td>
            <td <?= $store_grn->GrnValue->cellAttributes() ?>>
<template id="tpx_store_grn_GrnValue"><span id="el_store_grn_GrnValue">
<span<?= $store_grn->GrnValue->viewAttributes() ?>>
<?= $store_grn->GrnValue->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->Pid->Visible) { // Pid ?>
        <tr id="r_Pid">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_Pid"><?= $store_grn->Pid->caption() ?></template></td>
            <td <?= $store_grn->Pid->cellAttributes() ?>>
<template id="tpx_store_grn_Pid"><span id="el_store_grn_Pid">
<span<?= $store_grn->Pid->viewAttributes() ?>>
<?= $store_grn->Pid->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
        <tr id="r_PaymentNo">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_PaymentNo"><?= $store_grn->PaymentNo->caption() ?></template></td>
            <td <?= $store_grn->PaymentNo->cellAttributes() ?>>
<template id="tpx_store_grn_PaymentNo"><span id="el_store_grn_PaymentNo">
<span<?= $store_grn->PaymentNo->viewAttributes() ?>>
<?= $store_grn->PaymentNo->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
        <tr id="r_PaymentStatus">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_PaymentStatus"><?= $store_grn->PaymentStatus->caption() ?></template></td>
            <td <?= $store_grn->PaymentStatus->cellAttributes() ?>>
<template id="tpx_store_grn_PaymentStatus"><span id="el_store_grn_PaymentStatus">
<span<?= $store_grn->PaymentStatus->viewAttributes() ?>>
<?= $store_grn->PaymentStatus->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
        <tr id="r_PaidAmount">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_PaidAmount"><?= $store_grn->PaidAmount->caption() ?></template></td>
            <td <?= $store_grn->PaidAmount->cellAttributes() ?>>
<template id="tpx_store_grn_PaidAmount"><span id="el_store_grn_PaidAmount">
<span<?= $store_grn->PaidAmount->viewAttributes() ?>>
<?= $store_grn->PaidAmount->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
        <tr id="r_StoreID">
            <td class="<?= $store_grn->TableLeftColumnClass ?>"><template id="tpc_store_grn_StoreID"><?= $store_grn->StoreID->caption() ?></template></td>
            <td <?= $store_grn->StoreID->cellAttributes() ?>>
<template id="tpx_store_grn_StoreID"><span id="el_store_grn_StoreID">
<span<?= $store_grn->StoreID->viewAttributes() ?>>
<?= $store_grn->StoreID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_store_grnmaster" class="ew-custom-template"></div>
<template id="tpm_store_grnmaster">
<div id="ct_StoreGrnMaster"><style>
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
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_store_grn_GRNNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_GRNNO"></slot></h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;"><slot class="ew-slot" name="tpc_store_grn_pharmacy_pocol"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_pharmacy_pocol"></slot></div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BRCODE"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BRCODE"></slot></span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_PC"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_PC"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_DT"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_DT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_YM"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_YM"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Customercode"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Customercode"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Customername"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Customername"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BILLDT"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BILLDT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BILLNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BILLNO"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BillTotalValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BillTotalValue"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BillUpload"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BillUpload"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Remarks"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Details</h3>
			</div>
			<div class="card-body">
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Address1"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Address1"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Address2"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Address2"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Address3"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Address3"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_State"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_State"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Pincode"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Pincode"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Fax"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Fax"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Phone"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Phone"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_GRNTotalValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_GRNTotalValue"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_TransPort"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_TransPort"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_AnyOther"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_AnyOther"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BillDiscount"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BillDiscount"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_GrnValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_GrnValue"></slot></span>
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
    ew.templateData = { rows: <?= JsonEncode($store_grn->Rows) ?> };
    ew.applyTemplate("tpd_store_grnmaster", "tpm_store_grnmaster", "store_grnmaster", "<?= $store_grn->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>
