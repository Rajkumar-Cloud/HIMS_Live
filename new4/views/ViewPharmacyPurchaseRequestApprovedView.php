<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPurchaseRequestApprovedView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_purchase_request_approvedview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_pharmacy_purchase_request_approvedview = currentForm = new ew.Form("fview_pharmacy_purchase_request_approvedview", "view");
    loadjs.done("fview_pharmacy_purchase_request_approvedview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_pharmacy_purchase_request_approved) ew.vars.tables.view_pharmacy_purchase_request_approved = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_purchase_request_approved")) ?>;
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
<form name="fview_pharmacy_purchase_request_approvedview" id="fview_pharmacy_purchase_request_approvedview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_approved">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_id"><template id="tpc_view_pharmacy_purchase_request_approved_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_id"><span id="el_view_pharmacy_purchase_request_approved_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <tr id="r_DT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_DT"><template id="tpc_view_pharmacy_purchase_request_approved_DT"><?= $Page->DT->caption() ?></template></span></td>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_DT"><span id="el_view_pharmacy_purchase_request_approved_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmployeeName->Visible) { // EmployeeName ?>
    <tr id="r_EmployeeName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_EmployeeName"><template id="tpc_view_pharmacy_purchase_request_approved_EmployeeName"><?= $Page->EmployeeName->caption() ?></template></span></td>
        <td data-name="EmployeeName" <?= $Page->EmployeeName->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_EmployeeName"><span id="el_view_pharmacy_purchase_request_approved_EmployeeName">
<span<?= $Page->EmployeeName->viewAttributes() ?>>
<?= $Page->EmployeeName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <tr id="r_Department">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_Department"><template id="tpc_view_pharmacy_purchase_request_approved_Department"><?= $Page->Department->caption() ?></template></span></td>
        <td data-name="Department" <?= $Page->Department->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_Department"><span id="el_view_pharmacy_purchase_request_approved_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
    <tr id="r_ApprovedStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_ApprovedStatus"><template id="tpc_view_pharmacy_purchase_request_approved_ApprovedStatus"><?= $Page->ApprovedStatus->caption() ?></template></span></td>
        <td data-name="ApprovedStatus" <?= $Page->ApprovedStatus->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_ApprovedStatus"><span id="el_view_pharmacy_purchase_request_approved_ApprovedStatus">
<span<?= $Page->ApprovedStatus->viewAttributes() ?>>
<?= $Page->ApprovedStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
    <tr id="r_PurchaseStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_PurchaseStatus"><template id="tpc_view_pharmacy_purchase_request_approved_PurchaseStatus"><?= $Page->PurchaseStatus->caption() ?></template></span></td>
        <td data-name="PurchaseStatus" <?= $Page->PurchaseStatus->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_PurchaseStatus"><span id="el_view_pharmacy_purchase_request_approved_PurchaseStatus">
<span<?= $Page->PurchaseStatus->viewAttributes() ?>>
<?= $Page->PurchaseStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_HospID"><template id="tpc_view_pharmacy_purchase_request_approved_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_HospID"><span id="el_view_pharmacy_purchase_request_approved_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_createdby"><template id="tpc_view_pharmacy_purchase_request_approved_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_createdby"><span id="el_view_pharmacy_purchase_request_approved_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_createddatetime"><template id="tpc_view_pharmacy_purchase_request_approved_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_createddatetime"><span id="el_view_pharmacy_purchase_request_approved_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_modifiedby"><template id="tpc_view_pharmacy_purchase_request_approved_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_modifiedby"><span id="el_view_pharmacy_purchase_request_approved_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_modifieddatetime"><template id="tpc_view_pharmacy_purchase_request_approved_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_modifieddatetime"><span id="el_view_pharmacy_purchase_request_approved_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_BRCODE"><template id="tpc_view_pharmacy_purchase_request_approved_BRCODE"><?= $Page->BRCODE->caption() ?></template></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_BRCODE"><span id="el_view_pharmacy_purchase_request_approved_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_view_pharmacy_purchase_request_approvedview" class="ew-custom-template"></div>
<template id="tpm_view_pharmacy_purchase_request_approvedview">
<div id="ct_ViewPharmacyPurchaseRequestApprovedView"><style>
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
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_approved_ApprovedStatus"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_approved_ApprovedStatus"></slot></h3>
	</div>
</div>	
</div>
</template>
<?php
    if (in_array("view_pharmacy_purchase_request_items_approved", explode(",", $Page->getCurrentDetailTable())) && $view_pharmacy_purchase_request_items_approved->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("view_pharmacy_purchase_request_items_approved", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ViewPharmacyPurchaseRequestItemsApprovedGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_pharmacy_purchase_request_approvedview", "tpm_view_pharmacy_purchase_request_approvedview", "view_pharmacy_purchase_request_approvedview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
