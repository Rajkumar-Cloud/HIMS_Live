<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPoView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_poview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_poview = currentForm = new ew.Form("fpharmacy_poview", "view");
    loadjs.done("fpharmacy_poview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pharmacy_po) ew.vars.tables.pharmacy_po = <?= JsonEncode(GetClientVar("tables", "pharmacy_po")) ?>;
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
<form name="fpharmacy_poview" id="fpharmacy_poview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_id"><template id="tpc_pharmacy_po_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_pharmacy_po_id"><span id="el_pharmacy_po_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
    <tr id="r_ORDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_ORDNO"><template id="tpc_pharmacy_po_ORDNO"><?= $Page->ORDNO->caption() ?></template></span></td>
        <td data-name="ORDNO" <?= $Page->ORDNO->cellAttributes() ?>>
<template id="tpx_pharmacy_po_ORDNO"><span id="el_pharmacy_po_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <tr id="r_DT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_DT"><template id="tpc_pharmacy_po_DT"><?= $Page->DT->caption() ?></template></span></td>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<template id="tpx_pharmacy_po_DT"><span id="el_pharmacy_po_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <tr id="r_YM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_YM"><template id="tpc_pharmacy_po_YM"><?= $Page->YM->caption() ?></template></span></td>
        <td data-name="YM" <?= $Page->YM->cellAttributes() ?>>
<template id="tpx_pharmacy_po_YM"><span id="el_pharmacy_po_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <tr id="r_PC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_PC"><template id="tpc_pharmacy_po_PC"><?= $Page->PC->caption() ?></template></span></td>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<template id="tpx_pharmacy_po_PC"><span id="el_pharmacy_po_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
    <tr id="r_Customercode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Customercode"><template id="tpc_pharmacy_po_Customercode"><?= $Page->Customercode->caption() ?></template></span></td>
        <td data-name="Customercode" <?= $Page->Customercode->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Customercode"><span id="el_pharmacy_po_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <tr id="r_Customername">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Customername"><template id="tpc_pharmacy_po_Customername"><?= $Page->Customername->caption() ?></template></span></td>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Customername"><span id="el_pharmacy_po_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
    <tr id="r_pharmacy_pocol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_pharmacy_pocol"><template id="tpc_pharmacy_po_pharmacy_pocol"><?= $Page->pharmacy_pocol->caption() ?></template></span></td>
        <td data-name="pharmacy_pocol" <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<template id="tpx_pharmacy_po_pharmacy_pocol"><span id="el_pharmacy_po_pharmacy_pocol">
<span<?= $Page->pharmacy_pocol->viewAttributes() ?>>
<?= $Page->pharmacy_pocol->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <tr id="r_Address1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address1"><template id="tpc_pharmacy_po_Address1"><?= $Page->Address1->caption() ?></template></span></td>
        <td data-name="Address1" <?= $Page->Address1->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Address1"><span id="el_pharmacy_po_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <tr id="r_Address2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address2"><template id="tpc_pharmacy_po_Address2"><?= $Page->Address2->caption() ?></template></span></td>
        <td data-name="Address2" <?= $Page->Address2->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Address2"><span id="el_pharmacy_po_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <tr id="r_Address3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address3"><template id="tpc_pharmacy_po_Address3"><?= $Page->Address3->caption() ?></template></span></td>
        <td data-name="Address3" <?= $Page->Address3->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Address3"><span id="el_pharmacy_po_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_State"><template id="tpc_pharmacy_po_State"><?= $Page->State->caption() ?></template></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<template id="tpx_pharmacy_po_State"><span id="el_pharmacy_po_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <tr id="r_Pincode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Pincode"><template id="tpc_pharmacy_po_Pincode"><?= $Page->Pincode->caption() ?></template></span></td>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Pincode"><span id="el_pharmacy_po_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <tr id="r_Phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Phone"><template id="tpc_pharmacy_po_Phone"><?= $Page->Phone->caption() ?></template></span></td>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Phone"><span id="el_pharmacy_po_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <tr id="r_Fax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Fax"><template id="tpc_pharmacy_po_Fax"><?= $Page->Fax->caption() ?></template></span></td>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Fax"><span id="el_pharmacy_po_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
    <tr id="r_EEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_EEmail"><template id="tpc_pharmacy_po_EEmail"><?= $Page->EEmail->caption() ?></template></span></td>
        <td data-name="EEmail" <?= $Page->EEmail->cellAttributes() ?>>
<template id="tpx_pharmacy_po_EEmail"><span id="el_pharmacy_po_EEmail">
<span<?= $Page->EEmail->viewAttributes() ?>>
<?= $Page->EEmail->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_HospID"><template id="tpc_pharmacy_po_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_pharmacy_po_HospID"><span id="el_pharmacy_po_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_createdby"><template id="tpc_pharmacy_po_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_pharmacy_po_createdby"><span id="el_pharmacy_po_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_createddatetime"><template id="tpc_pharmacy_po_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_pharmacy_po_createddatetime"><span id="el_pharmacy_po_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_modifiedby"><template id="tpc_pharmacy_po_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_pharmacy_po_modifiedby"><span id="el_pharmacy_po_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_modifieddatetime"><template id="tpc_pharmacy_po_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_pharmacy_po_modifieddatetime"><span id="el_pharmacy_po_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_BRCODE"><template id="tpc_pharmacy_po_BRCODE"><?= $Page->BRCODE->caption() ?></template></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<template id="tpx_pharmacy_po_BRCODE"><span id="el_pharmacy_po_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_pharmacy_poview" class="ew-custom-template"></div>
<template id="tpm_pharmacy_poview">
<div id="ct_PharmacyPoView"><style>
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
<?php
    if (in_array("pharmacy_purchaseorder", explode(",", $Page->getCurrentDetailTable())) && $pharmacy_purchaseorder->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pharmacy_purchaseorder", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PharmacyPurchaseorderGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_pharmacy_poview", "tpm_pharmacy_poview", "pharmacy_poview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
