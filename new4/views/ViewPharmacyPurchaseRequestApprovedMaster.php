<?php

namespace PHPMaker2021\HIMS;

// Table
$view_pharmacy_purchase_request_approved = Container("view_pharmacy_purchase_request_approved");
?>
<?php if ($view_pharmacy_purchase_request_approved->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_pharmacy_purchase_request_approvedmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($view_pharmacy_purchase_request_approved->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_id"><?= $view_pharmacy_purchase_request_approved->id->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->id->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_id"><span id="el_view_pharmacy_purchase_request_approved_id">
<span<?= $view_pharmacy_purchase_request_approved->id->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->DT->Visible) { // DT ?>
        <tr id="r_DT">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_DT"><?= $view_pharmacy_purchase_request_approved->DT->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->DT->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_DT"><span id="el_view_pharmacy_purchase_request_approved_DT">
<span<?= $view_pharmacy_purchase_request_approved->DT->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->DT->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->EmployeeName->Visible) { // EmployeeName ?>
        <tr id="r_EmployeeName">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_EmployeeName"><?= $view_pharmacy_purchase_request_approved->EmployeeName->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->EmployeeName->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_EmployeeName"><span id="el_view_pharmacy_purchase_request_approved_EmployeeName">
<span<?= $view_pharmacy_purchase_request_approved->EmployeeName->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->EmployeeName->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->Department->Visible) { // Department ?>
        <tr id="r_Department">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_Department"><?= $view_pharmacy_purchase_request_approved->Department->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->Department->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_Department"><span id="el_view_pharmacy_purchase_request_approved_Department">
<span<?= $view_pharmacy_purchase_request_approved->Department->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->Department->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <tr id="r_ApprovedStatus">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_ApprovedStatus"><?= $view_pharmacy_purchase_request_approved->ApprovedStatus->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->ApprovedStatus->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_ApprovedStatus"><span id="el_view_pharmacy_purchase_request_approved_ApprovedStatus">
<span<?= $view_pharmacy_purchase_request_approved->ApprovedStatus->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->ApprovedStatus->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->PurchaseStatus->Visible) { // PurchaseStatus ?>
        <tr id="r_PurchaseStatus">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_PurchaseStatus"><?= $view_pharmacy_purchase_request_approved->PurchaseStatus->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->PurchaseStatus->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_PurchaseStatus"><span id="el_view_pharmacy_purchase_request_approved_PurchaseStatus">
<span<?= $view_pharmacy_purchase_request_approved->PurchaseStatus->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->PurchaseStatus->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_HospID"><?= $view_pharmacy_purchase_request_approved->HospID->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->HospID->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_HospID"><span id="el_view_pharmacy_purchase_request_approved_HospID">
<span<?= $view_pharmacy_purchase_request_approved->HospID->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->HospID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_createdby"><?= $view_pharmacy_purchase_request_approved->createdby->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->createdby->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_createdby"><span id="el_view_pharmacy_purchase_request_approved_createdby">
<span<?= $view_pharmacy_purchase_request_approved->createdby->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->createdby->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_createddatetime"><?= $view_pharmacy_purchase_request_approved->createddatetime->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->createddatetime->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_createddatetime"><span id="el_view_pharmacy_purchase_request_approved_createddatetime">
<span<?= $view_pharmacy_purchase_request_approved->createddatetime->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->createddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_modifiedby"><?= $view_pharmacy_purchase_request_approved->modifiedby->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->modifiedby->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_modifiedby"><span id="el_view_pharmacy_purchase_request_approved_modifiedby">
<span<?= $view_pharmacy_purchase_request_approved->modifiedby->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->modifiedby->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_modifieddatetime"><?= $view_pharmacy_purchase_request_approved->modifieddatetime->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_modifieddatetime"><span id="el_view_pharmacy_purchase_request_approved_modifieddatetime">
<span<?= $view_pharmacy_purchase_request_approved->modifieddatetime->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->BRCODE->Visible) { // BRCODE ?>
        <tr id="r_BRCODE">
            <td class="<?= $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_BRCODE"><?= $view_pharmacy_purchase_request_approved->BRCODE->caption() ?></template></td>
            <td <?= $view_pharmacy_purchase_request_approved->BRCODE->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_BRCODE"><span id="el_view_pharmacy_purchase_request_approved_BRCODE">
<span<?= $view_pharmacy_purchase_request_approved->BRCODE->viewAttributes() ?>>
<?= $view_pharmacy_purchase_request_approved->BRCODE->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_view_pharmacy_purchase_request_approvedmaster" class="ew-custom-template"></div>
<template id="tpm_view_pharmacy_purchase_request_approvedmaster">
<div id="ct_ViewPharmacyPurchaseRequestApprovedMaster">
<style>
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
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_approved_EmployeeName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_approved_EmployeeName"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_approved_Department"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_approved_Department"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_approved_DT"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_approved_DT"></slot></h3>
	</div>
</div>
</div>
</template>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($view_pharmacy_purchase_request_approved->Rows) ?> };
    ew.applyTemplate("tpd_view_pharmacy_purchase_request_approvedmaster", "tpm_view_pharmacy_purchase_request_approvedmaster", "view_pharmacy_purchase_request_approvedmaster", "<?= $view_pharmacy_purchase_request_approved->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>
