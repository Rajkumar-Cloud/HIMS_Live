<?php

namespace PHPMaker2021\HIMS;

// Table
$pharmacy_grn = Container("pharmacy_grn");
?>
<?php if ($pharmacy_grn->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_grnmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($pharmacy_grn->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_id"><?= $pharmacy_grn->id->caption() ?></template></td>
            <td <?= $pharmacy_grn->id->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_id"><span id="el_pharmacy_grn_id">
<span<?= $pharmacy_grn->id->viewAttributes() ?>>
<?= $pharmacy_grn->id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
        <tr id="r_GRNNO">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_GRNNO"><?= $pharmacy_grn->GRNNO->caption() ?></template></td>
            <td <?= $pharmacy_grn->GRNNO->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_GRNNO"><span id="el_pharmacy_grn_GRNNO">
<span<?= $pharmacy_grn->GRNNO->viewAttributes() ?>>
<?= $pharmacy_grn->GRNNO->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
        <tr id="r_DT">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_DT"><?= $pharmacy_grn->DT->caption() ?></template></td>
            <td <?= $pharmacy_grn->DT->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_DT"><span id="el_pharmacy_grn_DT">
<span<?= $pharmacy_grn->DT->viewAttributes() ?>>
<?= $pharmacy_grn->DT->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
        <tr id="r_Customername">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_Customername"><?= $pharmacy_grn->Customername->caption() ?></template></td>
            <td <?= $pharmacy_grn->Customername->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_Customername"><span id="el_pharmacy_grn_Customername">
<span<?= $pharmacy_grn->Customername->viewAttributes() ?>>
<?= $pharmacy_grn->Customername->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->State->Visible) { // State ?>
        <tr id="r_State">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_State"><?= $pharmacy_grn->State->caption() ?></template></td>
            <td <?= $pharmacy_grn->State->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_State"><span id="el_pharmacy_grn_State">
<span<?= $pharmacy_grn->State->viewAttributes() ?>>
<?= $pharmacy_grn->State->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
        <tr id="r_Pincode">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_Pincode"><?= $pharmacy_grn->Pincode->caption() ?></template></td>
            <td <?= $pharmacy_grn->Pincode->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_Pincode"><span id="el_pharmacy_grn_Pincode">
<span<?= $pharmacy_grn->Pincode->viewAttributes() ?>>
<?= $pharmacy_grn->Pincode->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
        <tr id="r_Phone">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_Phone"><?= $pharmacy_grn->Phone->caption() ?></template></td>
            <td <?= $pharmacy_grn->Phone->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_Phone"><span id="el_pharmacy_grn_Phone">
<span<?= $pharmacy_grn->Phone->viewAttributes() ?>>
<?= $pharmacy_grn->Phone->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
        <tr id="r_BILLNO">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_BILLNO"><?= $pharmacy_grn->BILLNO->caption() ?></template></td>
            <td <?= $pharmacy_grn->BILLNO->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_BILLNO"><span id="el_pharmacy_grn_BILLNO">
<span<?= $pharmacy_grn->BILLNO->viewAttributes() ?>>
<?= $pharmacy_grn->BILLNO->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
        <tr id="r_BILLDT">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_BILLDT"><?= $pharmacy_grn->BILLDT->caption() ?></template></td>
            <td <?= $pharmacy_grn->BILLDT->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_BILLDT"><span id="el_pharmacy_grn_BILLDT">
<span<?= $pharmacy_grn->BILLDT->viewAttributes() ?>>
<?= $pharmacy_grn->BILLDT->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
        <tr id="r_BillTotalValue">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_BillTotalValue"><?= $pharmacy_grn->BillTotalValue->caption() ?></template></td>
            <td <?= $pharmacy_grn->BillTotalValue->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_BillTotalValue"><span id="el_pharmacy_grn_BillTotalValue">
<span<?= $pharmacy_grn->BillTotalValue->viewAttributes() ?>>
<?= $pharmacy_grn->BillTotalValue->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <tr id="r_GRNTotalValue">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_GRNTotalValue"><?= $pharmacy_grn->GRNTotalValue->caption() ?></template></td>
            <td <?= $pharmacy_grn->GRNTotalValue->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_GRNTotalValue"><span id="el_pharmacy_grn_GRNTotalValue">
<span<?= $pharmacy_grn->GRNTotalValue->viewAttributes() ?>>
<?= $pharmacy_grn->GRNTotalValue->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
        <tr id="r_BillDiscount">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_BillDiscount"><?= $pharmacy_grn->BillDiscount->caption() ?></template></td>
            <td <?= $pharmacy_grn->BillDiscount->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_BillDiscount"><span id="el_pharmacy_grn_BillDiscount">
<span<?= $pharmacy_grn->BillDiscount->viewAttributes() ?>>
<?= $pharmacy_grn->BillDiscount->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
        <tr id="r_GrnValue">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_GrnValue"><?= $pharmacy_grn->GrnValue->caption() ?></template></td>
            <td <?= $pharmacy_grn->GrnValue->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_GrnValue"><span id="el_pharmacy_grn_GrnValue">
<span<?= $pharmacy_grn->GrnValue->viewAttributes() ?>>
<?= $pharmacy_grn->GrnValue->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
        <tr id="r_Pid">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_Pid"><?= $pharmacy_grn->Pid->caption() ?></template></td>
            <td <?= $pharmacy_grn->Pid->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_Pid"><span id="el_pharmacy_grn_Pid">
<span<?= $pharmacy_grn->Pid->viewAttributes() ?>>
<?= $pharmacy_grn->Pid->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
        <tr id="r_PaymentNo">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_PaymentNo"><?= $pharmacy_grn->PaymentNo->caption() ?></template></td>
            <td <?= $pharmacy_grn->PaymentNo->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_PaymentNo"><span id="el_pharmacy_grn_PaymentNo">
<span<?= $pharmacy_grn->PaymentNo->viewAttributes() ?>>
<?= $pharmacy_grn->PaymentNo->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
        <tr id="r_PaymentStatus">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_PaymentStatus"><?= $pharmacy_grn->PaymentStatus->caption() ?></template></td>
            <td <?= $pharmacy_grn->PaymentStatus->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_PaymentStatus"><span id="el_pharmacy_grn_PaymentStatus">
<span<?= $pharmacy_grn->PaymentStatus->viewAttributes() ?>>
<?= $pharmacy_grn->PaymentStatus->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
        <tr id="r_PaidAmount">
            <td class="<?= $pharmacy_grn->TableLeftColumnClass ?>"><template id="tpc_pharmacy_grn_PaidAmount"><?= $pharmacy_grn->PaidAmount->caption() ?></template></td>
            <td <?= $pharmacy_grn->PaidAmount->cellAttributes() ?>>
<template id="tpx_pharmacy_grn_PaidAmount"><span id="el_pharmacy_grn_PaidAmount">
<span<?= $pharmacy_grn->PaidAmount->viewAttributes() ?>>
<?= $pharmacy_grn->PaidAmount->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_pharmacy_grnmaster" class="ew-custom-template"></div>
<template id="tpm_pharmacy_grnmaster">
<div id="ct_PharmacyGrnMaster"><style>
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
		<h3 class="card-title"><slot class="ew-slot" name="tpc_pharmacy_grn_GRNNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_GRNNO"></slot></h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;"><slot class="ew-slot" name="tpc_pharmacy_grn_pharmacy_pocol"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_pharmacy_pocol"></slot></div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_BRCODE"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_BRCODE"></slot></span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_PC"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_PC"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_DT"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_DT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_YM"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_YM"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_Customercode"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_Customercode"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_Customername"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_Customername"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_BILLDT"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_BILLDT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_BILLNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_BILLNO"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_BillTotalValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_BillTotalValue"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_BillUpload"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_BillUpload"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_Remarks"></slot></span>
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
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_Address1"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_Address1"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_Address2"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_Address2"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_Address3"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_Address3"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_State"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_State"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_Pincode"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_Pincode"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_Fax"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_Fax"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_Phone"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_Phone"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_GRNTotalValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_GRNTotalValue"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_TransPort"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_TransPort"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_AnyOther"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_AnyOther"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_BillDiscount"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_BillDiscount"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_grn_GrnValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_grn_GrnValue"></slot></span>
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
    ew.templateData = { rows: <?= JsonEncode($pharmacy_grn->Rows) ?> };
    ew.applyTemplate("tpd_pharmacy_grnmaster", "tpm_pharmacy_grnmaster", "pharmacy_grnmaster", "<?= $pharmacy_grn->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>
