<?php

namespace PHPMaker2021\HIMS;

// Table
$pharmacy_po = Container("pharmacy_po");
?>
<?php if ($pharmacy_po->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_pomaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($pharmacy_po->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_id"><?= $pharmacy_po->id->caption() ?></template></td>
            <td <?= $pharmacy_po->id->cellAttributes() ?>>
<template id="tpx_pharmacy_po_id"><span id="el_pharmacy_po_id">
<span<?= $pharmacy_po->id->viewAttributes() ?>>
<?= $pharmacy_po->id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->ORDNO->Visible) { // ORDNO ?>
        <tr id="r_ORDNO">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_ORDNO"><?= $pharmacy_po->ORDNO->caption() ?></template></td>
            <td <?= $pharmacy_po->ORDNO->cellAttributes() ?>>
<template id="tpx_pharmacy_po_ORDNO"><span id="el_pharmacy_po_ORDNO">
<span<?= $pharmacy_po->ORDNO->viewAttributes() ?>>
<?= $pharmacy_po->ORDNO->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->DT->Visible) { // DT ?>
        <tr id="r_DT">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_DT"><?= $pharmacy_po->DT->caption() ?></template></td>
            <td <?= $pharmacy_po->DT->cellAttributes() ?>>
<template id="tpx_pharmacy_po_DT"><span id="el_pharmacy_po_DT">
<span<?= $pharmacy_po->DT->viewAttributes() ?>>
<?= $pharmacy_po->DT->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->YM->Visible) { // YM ?>
        <tr id="r_YM">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_YM"><?= $pharmacy_po->YM->caption() ?></template></td>
            <td <?= $pharmacy_po->YM->cellAttributes() ?>>
<template id="tpx_pharmacy_po_YM"><span id="el_pharmacy_po_YM">
<span<?= $pharmacy_po->YM->viewAttributes() ?>>
<?= $pharmacy_po->YM->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->PC->Visible) { // PC ?>
        <tr id="r_PC">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_PC"><?= $pharmacy_po->PC->caption() ?></template></td>
            <td <?= $pharmacy_po->PC->cellAttributes() ?>>
<template id="tpx_pharmacy_po_PC"><span id="el_pharmacy_po_PC">
<span<?= $pharmacy_po->PC->viewAttributes() ?>>
<?= $pharmacy_po->PC->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->Customercode->Visible) { // Customercode ?>
        <tr id="r_Customercode">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_Customercode"><?= $pharmacy_po->Customercode->caption() ?></template></td>
            <td <?= $pharmacy_po->Customercode->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Customercode"><span id="el_pharmacy_po_Customercode">
<span<?= $pharmacy_po->Customercode->viewAttributes() ?>>
<?= $pharmacy_po->Customercode->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->Customername->Visible) { // Customername ?>
        <tr id="r_Customername">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_Customername"><?= $pharmacy_po->Customername->caption() ?></template></td>
            <td <?= $pharmacy_po->Customername->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Customername"><span id="el_pharmacy_po_Customername">
<span<?= $pharmacy_po->Customername->viewAttributes() ?>>
<?= $pharmacy_po->Customername->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <tr id="r_pharmacy_pocol">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_pharmacy_pocol"><?= $pharmacy_po->pharmacy_pocol->caption() ?></template></td>
            <td <?= $pharmacy_po->pharmacy_pocol->cellAttributes() ?>>
<template id="tpx_pharmacy_po_pharmacy_pocol"><span id="el_pharmacy_po_pharmacy_pocol">
<span<?= $pharmacy_po->pharmacy_pocol->viewAttributes() ?>>
<?= $pharmacy_po->pharmacy_pocol->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->Address1->Visible) { // Address1 ?>
        <tr id="r_Address1">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_Address1"><?= $pharmacy_po->Address1->caption() ?></template></td>
            <td <?= $pharmacy_po->Address1->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Address1"><span id="el_pharmacy_po_Address1">
<span<?= $pharmacy_po->Address1->viewAttributes() ?>>
<?= $pharmacy_po->Address1->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->Address2->Visible) { // Address2 ?>
        <tr id="r_Address2">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_Address2"><?= $pharmacy_po->Address2->caption() ?></template></td>
            <td <?= $pharmacy_po->Address2->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Address2"><span id="el_pharmacy_po_Address2">
<span<?= $pharmacy_po->Address2->viewAttributes() ?>>
<?= $pharmacy_po->Address2->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->Address3->Visible) { // Address3 ?>
        <tr id="r_Address3">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_Address3"><?= $pharmacy_po->Address3->caption() ?></template></td>
            <td <?= $pharmacy_po->Address3->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Address3"><span id="el_pharmacy_po_Address3">
<span<?= $pharmacy_po->Address3->viewAttributes() ?>>
<?= $pharmacy_po->Address3->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->State->Visible) { // State ?>
        <tr id="r_State">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_State"><?= $pharmacy_po->State->caption() ?></template></td>
            <td <?= $pharmacy_po->State->cellAttributes() ?>>
<template id="tpx_pharmacy_po_State"><span id="el_pharmacy_po_State">
<span<?= $pharmacy_po->State->viewAttributes() ?>>
<?= $pharmacy_po->State->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->Pincode->Visible) { // Pincode ?>
        <tr id="r_Pincode">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_Pincode"><?= $pharmacy_po->Pincode->caption() ?></template></td>
            <td <?= $pharmacy_po->Pincode->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Pincode"><span id="el_pharmacy_po_Pincode">
<span<?= $pharmacy_po->Pincode->viewAttributes() ?>>
<?= $pharmacy_po->Pincode->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->Phone->Visible) { // Phone ?>
        <tr id="r_Phone">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_Phone"><?= $pharmacy_po->Phone->caption() ?></template></td>
            <td <?= $pharmacy_po->Phone->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Phone"><span id="el_pharmacy_po_Phone">
<span<?= $pharmacy_po->Phone->viewAttributes() ?>>
<?= $pharmacy_po->Phone->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->Fax->Visible) { // Fax ?>
        <tr id="r_Fax">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_Fax"><?= $pharmacy_po->Fax->caption() ?></template></td>
            <td <?= $pharmacy_po->Fax->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Fax"><span id="el_pharmacy_po_Fax">
<span<?= $pharmacy_po->Fax->viewAttributes() ?>>
<?= $pharmacy_po->Fax->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->EEmail->Visible) { // EEmail ?>
        <tr id="r_EEmail">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_EEmail"><?= $pharmacy_po->EEmail->caption() ?></template></td>
            <td <?= $pharmacy_po->EEmail->cellAttributes() ?>>
<template id="tpx_pharmacy_po_EEmail"><span id="el_pharmacy_po_EEmail">
<span<?= $pharmacy_po->EEmail->viewAttributes() ?>>
<?= $pharmacy_po->EEmail->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_HospID"><?= $pharmacy_po->HospID->caption() ?></template></td>
            <td <?= $pharmacy_po->HospID->cellAttributes() ?>>
<template id="tpx_pharmacy_po_HospID"><span id="el_pharmacy_po_HospID">
<span<?= $pharmacy_po->HospID->viewAttributes() ?>>
<?= $pharmacy_po->HospID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_createdby"><?= $pharmacy_po->createdby->caption() ?></template></td>
            <td <?= $pharmacy_po->createdby->cellAttributes() ?>>
<template id="tpx_pharmacy_po_createdby"><span id="el_pharmacy_po_createdby">
<span<?= $pharmacy_po->createdby->viewAttributes() ?>>
<?= $pharmacy_po->createdby->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_createddatetime"><?= $pharmacy_po->createddatetime->caption() ?></template></td>
            <td <?= $pharmacy_po->createddatetime->cellAttributes() ?>>
<template id="tpx_pharmacy_po_createddatetime"><span id="el_pharmacy_po_createddatetime">
<span<?= $pharmacy_po->createddatetime->viewAttributes() ?>>
<?= $pharmacy_po->createddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_modifiedby"><?= $pharmacy_po->modifiedby->caption() ?></template></td>
            <td <?= $pharmacy_po->modifiedby->cellAttributes() ?>>
<template id="tpx_pharmacy_po_modifiedby"><span id="el_pharmacy_po_modifiedby">
<span<?= $pharmacy_po->modifiedby->viewAttributes() ?>>
<?= $pharmacy_po->modifiedby->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_modifieddatetime"><?= $pharmacy_po->modifieddatetime->caption() ?></template></td>
            <td <?= $pharmacy_po->modifieddatetime->cellAttributes() ?>>
<template id="tpx_pharmacy_po_modifieddatetime"><span id="el_pharmacy_po_modifieddatetime">
<span<?= $pharmacy_po->modifieddatetime->viewAttributes() ?>>
<?= $pharmacy_po->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_po->BRCODE->Visible) { // BRCODE ?>
        <tr id="r_BRCODE">
            <td class="<?= $pharmacy_po->TableLeftColumnClass ?>"><template id="tpc_pharmacy_po_BRCODE"><?= $pharmacy_po->BRCODE->caption() ?></template></td>
            <td <?= $pharmacy_po->BRCODE->cellAttributes() ?>>
<template id="tpx_pharmacy_po_BRCODE"><span id="el_pharmacy_po_BRCODE">
<span<?= $pharmacy_po->BRCODE->viewAttributes() ?>>
<?= $pharmacy_po->BRCODE->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_pharmacy_pomaster" class="ew-custom-template"></div>
<template id="tpm_pharmacy_pomaster">
<div id="ct_PharmacyPoMaster"><style>
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
		<h3 class="card-title"><slot class="ew-slot" name="tpc_pharmacy_po_ORDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_ORDNO"></slot></h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;"><slot class="ew-slot" name="tpc_pharmacy_po_pharmacy_pocol"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_pharmacy_pocol"></slot></div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_BRCODE"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_BRCODE"></slot></span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_PC"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_PC"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_DT"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_DT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_YM"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_YM"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Customercode"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Customercode"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Customername"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Customername"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Phone"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Phone"></slot></span>
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
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Address1"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Address1"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Address2"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Address2"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Address3"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Address3"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_State"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_State"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Pincode"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Pincode"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Fax"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Fax"></slot></span>
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
    ew.templateData = { rows: <?= JsonEncode($pharmacy_po->Rows) ?> };
    ew.applyTemplate("tpd_pharmacy_pomaster", "tpm_pharmacy_pomaster", "pharmacy_pomaster", "<?= $pharmacy_po->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>
