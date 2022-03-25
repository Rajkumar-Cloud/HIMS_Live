<?php

namespace PHPMaker2021\HIMS;

// Table
$view_pharmacy_purchase_request_purchased = Container("view_pharmacy_purchase_request_purchased");
?>
<?php if ($view_pharmacy_purchase_request_purchased->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_pharmacy_purchase_request_purchasedmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($view_pharmacy_purchase_request_purchased->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_id"><?= $view_pharmacy_purchase_request_purchased->id->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->id->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_id"><span id="el_view_pharmacy_purchase_request_purchased_id">
<span<?= $view_pharmacy_purchase_request_purchased->id->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->DT->Visible) { // DT ?>
        <tr id="r_DT">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_DT"><?= $view_pharmacy_purchase_request_purchased->DT->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->DT->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_DT"><span id="el_view_pharmacy_purchase_request_purchased_DT">
<span<?= $view_pharmacy_purchase_request_purchased->DT->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->DT->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->EmployeeName->Visible) { // EmployeeName ?>
        <tr id="r_EmployeeName">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_EmployeeName"><?= $view_pharmacy_purchase_request_purchased->EmployeeName->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->EmployeeName->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_EmployeeName"><span id="el_view_pharmacy_purchase_request_purchased_EmployeeName">
<span<?= $view_pharmacy_purchase_request_purchased->EmployeeName->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->EmployeeName->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->Department->Visible) { // Department ?>
        <tr id="r_Department">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_Department"><?= $view_pharmacy_purchase_request_purchased->Department->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->Department->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_Department"><span id="el_view_pharmacy_purchase_request_purchased_Department">
<span<?= $view_pharmacy_purchase_request_purchased->Department->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->Department->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <tr id="r_ApprovedStatus">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_ApprovedStatus"><?= $view_pharmacy_purchase_request_purchased->ApprovedStatus->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->ApprovedStatus->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_ApprovedStatus"><span id="el_view_pharmacy_purchase_request_purchased_ApprovedStatus">
<span<?= $view_pharmacy_purchase_request_purchased->ApprovedStatus->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->ApprovedStatus->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
        <tr id="r_PurchaseStatus">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_PurchaseStatus"><?= $view_pharmacy_purchase_request_purchased->PurchaseStatus->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->PurchaseStatus->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_PurchaseStatus"><span id="el_view_pharmacy_purchase_request_purchased_PurchaseStatus">
<span<?= $view_pharmacy_purchase_request_purchased->PurchaseStatus->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->PurchaseStatus->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_HospID"><?= $view_pharmacy_purchase_request_purchased->HospID->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->HospID->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_HospID"><span id="el_view_pharmacy_purchase_request_purchased_HospID">
<span<?= $view_pharmacy_purchase_request_purchased->HospID->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->HospID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_createdby"><?= $view_pharmacy_purchase_request_purchased->createdby->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->createdby->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_createdby"><span id="el_view_pharmacy_purchase_request_purchased_createdby">
<span<?= $view_pharmacy_purchase_request_purchased->createdby->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->createdby->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_createddatetime"><?= $view_pharmacy_purchase_request_purchased->createddatetime->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->createddatetime->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_createddatetime"><span id="el_view_pharmacy_purchase_request_purchased_createddatetime">
<span<?= $view_pharmacy_purchase_request_purchased->createddatetime->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->createddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_modifiedby"><?= $view_pharmacy_purchase_request_purchased->modifiedby->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->modifiedby->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_modifiedby"><span id="el_view_pharmacy_purchase_request_purchased_modifiedby">
<span<?= $view_pharmacy_purchase_request_purchased->modifiedby->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->modifiedby->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_modifieddatetime"><?= $view_pharmacy_purchase_request_purchased->modifieddatetime->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_modifieddatetime"><span id="el_view_pharmacy_purchase_request_purchased_modifieddatetime">
<span<?= $view_pharmacy_purchase_request_purchased->modifieddatetime->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->BRCODE->Visible) { // BRCODE ?>
        <tr id="r_BRCODE">
            <td class="<?= $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_purchased_BRCODE"><?= $view_pharmacy_purchase_request_purchased->BRCODE->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_purchased->BRCODE->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_purchased_BRCODE"><span id="el_view_pharmacy_purchase_request_purchased_BRCODE">
<span<?= $view_pharmacy_purchase_request_purchased->BRCODE->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_purchased->BRCODE->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_view_pharmacy_purchase_request_purchasedmaster" class="ew-custom-template"></div>
<template id="tpm_view_pharmacy_purchase_request_purchasedmaster">
<div id="ct_ViewPharmacyPurchaseRequestPurchasedMaster"><style>
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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_purchased_EmployeeName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_purchased_EmployeeName"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_purchased_Department"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_purchased_Department"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_purchased_DT"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_purchased_DT"></slot></h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_purchased_ApprovedStatus"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_purchased_ApprovedStatus"></slot></h3>
	</div>
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_purchased_PurchaseStatus"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_purchased_PurchaseStatus"></slot></h3>
	</div>
</div>
</div>
</template>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($view_pharmacy_purchase_request_purchased->Rows) ?> };
    ew.applyTemplate("tpd_view_pharmacy_purchase_request_purchasedmaster", "tpm_view_pharmacy_purchase_request_purchasedmaster", "view_pharmacy_purchase_request_purchasedmaster", "<?= $view_pharmacy_purchase_request_purchased->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>
