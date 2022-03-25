<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$store_storeled_view = new store_storeled_view();

// Run the page
$store_storeled_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storeled_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$store_storeled_view->isExport()) { ?>
<script>
var fstore_storeledview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fstore_storeledview = currentForm = new ew.Form("fstore_storeledview", "view");
	loadjs.done("fstore_storeledview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$store_storeled_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $store_storeled_view->ExportOptions->render("body") ?>
<?php $store_storeled_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $store_storeled_view->showPageHeader(); ?>
<?php
$store_storeled_view->showMessage();
?>
<form name="fstore_storeledview" id="fstore_storeledview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storeled">
<input type="hidden" name="modal" value="<?php echo (int)$store_storeled_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_storeled_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BRCODE"><?php echo $store_storeled_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $store_storeled_view->BRCODE->cellAttributes() ?>>
<span id="el_store_storeled_BRCODE">
<span<?php echo $store_storeled_view->BRCODE->viewAttributes() ?>><?php echo $store_storeled_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->TYPE->Visible) { // TYPE ?>
	<tr id="r_TYPE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_TYPE"><?php echo $store_storeled_view->TYPE->caption() ?></span></td>
		<td data-name="TYPE" <?php echo $store_storeled_view->TYPE->cellAttributes() ?>>
<span id="el_store_storeled_TYPE">
<span<?php echo $store_storeled_view->TYPE->viewAttributes() ?>><?php echo $store_storeled_view->TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DN->Visible) { // DN ?>
	<tr id="r_DN">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DN"><?php echo $store_storeled_view->DN->caption() ?></span></td>
		<td data-name="DN" <?php echo $store_storeled_view->DN->cellAttributes() ?>>
<span id="el_store_storeled_DN">
<span<?php echo $store_storeled_view->DN->viewAttributes() ?>><?php echo $store_storeled_view->DN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->RDN->Visible) { // RDN ?>
	<tr id="r_RDN">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RDN"><?php echo $store_storeled_view->RDN->caption() ?></span></td>
		<td data-name="RDN" <?php echo $store_storeled_view->RDN->cellAttributes() ?>>
<span id="el_store_storeled_RDN">
<span<?php echo $store_storeled_view->RDN->viewAttributes() ?>><?php echo $store_storeled_view->RDN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DT"><?php echo $store_storeled_view->DT->caption() ?></span></td>
		<td data-name="DT" <?php echo $store_storeled_view->DT->cellAttributes() ?>>
<span id="el_store_storeled_DT">
<span<?php echo $store_storeled_view->DT->viewAttributes() ?>><?php echo $store_storeled_view->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PRC"><?php echo $store_storeled_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $store_storeled_view->PRC->cellAttributes() ?>>
<span id="el_store_storeled_PRC">
<span<?php echo $store_storeled_view->PRC->viewAttributes() ?>><?php echo $store_storeled_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_OQ"><?php echo $store_storeled_view->OQ->caption() ?></span></td>
		<td data-name="OQ" <?php echo $store_storeled_view->OQ->cellAttributes() ?>>
<span id="el_store_storeled_OQ">
<span<?php echo $store_storeled_view->OQ->viewAttributes() ?>><?php echo $store_storeled_view->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RQ"><?php echo $store_storeled_view->RQ->caption() ?></span></td>
		<td data-name="RQ" <?php echo $store_storeled_view->RQ->cellAttributes() ?>>
<span id="el_store_storeled_RQ">
<span<?php echo $store_storeled_view->RQ->viewAttributes() ?>><?php echo $store_storeled_view->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_MRQ"><?php echo $store_storeled_view->MRQ->caption() ?></span></td>
		<td data-name="MRQ" <?php echo $store_storeled_view->MRQ->cellAttributes() ?>>
<span id="el_store_storeled_MRQ">
<span<?php echo $store_storeled_view->MRQ->viewAttributes() ?>><?php echo $store_storeled_view->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_IQ"><?php echo $store_storeled_view->IQ->caption() ?></span></td>
		<td data-name="IQ" <?php echo $store_storeled_view->IQ->cellAttributes() ?>>
<span id="el_store_storeled_IQ">
<span<?php echo $store_storeled_view->IQ->viewAttributes() ?>><?php echo $store_storeled_view->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BATCHNO"><?php echo $store_storeled_view->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO" <?php echo $store_storeled_view->BATCHNO->cellAttributes() ?>>
<span id="el_store_storeled_BATCHNO">
<span<?php echo $store_storeled_view->BATCHNO->viewAttributes() ?>><?php echo $store_storeled_view->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_EXPDT"><?php echo $store_storeled_view->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT" <?php echo $store_storeled_view->EXPDT->cellAttributes() ?>>
<span id="el_store_storeled_EXPDT">
<span<?php echo $store_storeled_view->EXPDT->viewAttributes() ?>><?php echo $store_storeled_view->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->BILLNO->Visible) { // BILLNO ?>
	<tr id="r_BILLNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BILLNO"><?php echo $store_storeled_view->BILLNO->caption() ?></span></td>
		<td data-name="BILLNO" <?php echo $store_storeled_view->BILLNO->cellAttributes() ?>>
<span id="el_store_storeled_BILLNO">
<span<?php echo $store_storeled_view->BILLNO->viewAttributes() ?>><?php echo $store_storeled_view->BILLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->BILLDT->Visible) { // BILLDT ?>
	<tr id="r_BILLDT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BILLDT"><?php echo $store_storeled_view->BILLDT->caption() ?></span></td>
		<td data-name="BILLDT" <?php echo $store_storeled_view->BILLDT->cellAttributes() ?>>
<span id="el_store_storeled_BILLDT">
<span<?php echo $store_storeled_view->BILLDT->viewAttributes() ?>><?php echo $store_storeled_view->BILLDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RT"><?php echo $store_storeled_view->RT->caption() ?></span></td>
		<td data-name="RT" <?php echo $store_storeled_view->RT->cellAttributes() ?>>
<span id="el_store_storeled_RT">
<span<?php echo $store_storeled_view->RT->viewAttributes() ?>><?php echo $store_storeled_view->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->VALUE->Visible) { // VALUE ?>
	<tr id="r_VALUE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_VALUE"><?php echo $store_storeled_view->VALUE->caption() ?></span></td>
		<td data-name="VALUE" <?php echo $store_storeled_view->VALUE->cellAttributes() ?>>
<span id="el_store_storeled_VALUE">
<span<?php echo $store_storeled_view->VALUE->viewAttributes() ?>><?php echo $store_storeled_view->VALUE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DISC->Visible) { // DISC ?>
	<tr id="r_DISC">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DISC"><?php echo $store_storeled_view->DISC->caption() ?></span></td>
		<td data-name="DISC" <?php echo $store_storeled_view->DISC->cellAttributes() ?>>
<span id="el_store_storeled_DISC">
<span<?php echo $store_storeled_view->DISC->viewAttributes() ?>><?php echo $store_storeled_view->DISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_TAXP"><?php echo $store_storeled_view->TAXP->caption() ?></span></td>
		<td data-name="TAXP" <?php echo $store_storeled_view->TAXP->cellAttributes() ?>>
<span id="el_store_storeled_TAXP">
<span<?php echo $store_storeled_view->TAXP->viewAttributes() ?>><?php echo $store_storeled_view->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->TAX->Visible) { // TAX ?>
	<tr id="r_TAX">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_TAX"><?php echo $store_storeled_view->TAX->caption() ?></span></td>
		<td data-name="TAX" <?php echo $store_storeled_view->TAX->cellAttributes() ?>>
<span id="el_store_storeled_TAX">
<span<?php echo $store_storeled_view->TAX->viewAttributes() ?>><?php echo $store_storeled_view->TAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->TAXR->Visible) { // TAXR ?>
	<tr id="r_TAXR">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_TAXR"><?php echo $store_storeled_view->TAXR->caption() ?></span></td>
		<td data-name="TAXR" <?php echo $store_storeled_view->TAXR->cellAttributes() ?>>
<span id="el_store_storeled_TAXR">
<span<?php echo $store_storeled_view->TAXR->viewAttributes() ?>><?php echo $store_storeled_view->TAXR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DAMT->Visible) { // DAMT ?>
	<tr id="r_DAMT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DAMT"><?php echo $store_storeled_view->DAMT->caption() ?></span></td>
		<td data-name="DAMT" <?php echo $store_storeled_view->DAMT->cellAttributes() ?>>
<span id="el_store_storeled_DAMT">
<span<?php echo $store_storeled_view->DAMT->viewAttributes() ?>><?php echo $store_storeled_view->DAMT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->EMPNO->Visible) { // EMPNO ?>
	<tr id="r_EMPNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_EMPNO"><?php echo $store_storeled_view->EMPNO->caption() ?></span></td>
		<td data-name="EMPNO" <?php echo $store_storeled_view->EMPNO->cellAttributes() ?>>
<span id="el_store_storeled_EMPNO">
<span<?php echo $store_storeled_view->EMPNO->viewAttributes() ?>><?php echo $store_storeled_view->EMPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PC"><?php echo $store_storeled_view->PC->caption() ?></span></td>
		<td data-name="PC" <?php echo $store_storeled_view->PC->cellAttributes() ?>>
<span id="el_store_storeled_PC">
<span<?php echo $store_storeled_view->PC->viewAttributes() ?>><?php echo $store_storeled_view->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DRNAME->Visible) { // DRNAME ?>
	<tr id="r_DRNAME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DRNAME"><?php echo $store_storeled_view->DRNAME->caption() ?></span></td>
		<td data-name="DRNAME" <?php echo $store_storeled_view->DRNAME->cellAttributes() ?>>
<span id="el_store_storeled_DRNAME">
<span<?php echo $store_storeled_view->DRNAME->viewAttributes() ?>><?php echo $store_storeled_view->DRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->BTIME->Visible) { // BTIME ?>
	<tr id="r_BTIME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BTIME"><?php echo $store_storeled_view->BTIME->caption() ?></span></td>
		<td data-name="BTIME" <?php echo $store_storeled_view->BTIME->cellAttributes() ?>>
<span id="el_store_storeled_BTIME">
<span<?php echo $store_storeled_view->BTIME->viewAttributes() ?>><?php echo $store_storeled_view->BTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->ONO->Visible) { // ONO ?>
	<tr id="r_ONO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_ONO"><?php echo $store_storeled_view->ONO->caption() ?></span></td>
		<td data-name="ONO" <?php echo $store_storeled_view->ONO->cellAttributes() ?>>
<span id="el_store_storeled_ONO">
<span<?php echo $store_storeled_view->ONO->viewAttributes() ?>><?php echo $store_storeled_view->ONO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->ODT->Visible) { // ODT ?>
	<tr id="r_ODT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_ODT"><?php echo $store_storeled_view->ODT->caption() ?></span></td>
		<td data-name="ODT" <?php echo $store_storeled_view->ODT->cellAttributes() ?>>
<span id="el_store_storeled_ODT">
<span<?php echo $store_storeled_view->ODT->viewAttributes() ?>><?php echo $store_storeled_view->ODT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PURRT->Visible) { // PURRT ?>
	<tr id="r_PURRT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PURRT"><?php echo $store_storeled_view->PURRT->caption() ?></span></td>
		<td data-name="PURRT" <?php echo $store_storeled_view->PURRT->cellAttributes() ?>>
<span id="el_store_storeled_PURRT">
<span<?php echo $store_storeled_view->PURRT->viewAttributes() ?>><?php echo $store_storeled_view->PURRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->GRP->Visible) { // GRP ?>
	<tr id="r_GRP">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_GRP"><?php echo $store_storeled_view->GRP->caption() ?></span></td>
		<td data-name="GRP" <?php echo $store_storeled_view->GRP->cellAttributes() ?>>
<span id="el_store_storeled_GRP">
<span<?php echo $store_storeled_view->GRP->viewAttributes() ?>><?php echo $store_storeled_view->GRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->IBATCH->Visible) { // IBATCH ?>
	<tr id="r_IBATCH">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_IBATCH"><?php echo $store_storeled_view->IBATCH->caption() ?></span></td>
		<td data-name="IBATCH" <?php echo $store_storeled_view->IBATCH->cellAttributes() ?>>
<span id="el_store_storeled_IBATCH">
<span<?php echo $store_storeled_view->IBATCH->viewAttributes() ?>><?php echo $store_storeled_view->IBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->IPNO->Visible) { // IPNO ?>
	<tr id="r_IPNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_IPNO"><?php echo $store_storeled_view->IPNO->caption() ?></span></td>
		<td data-name="IPNO" <?php echo $store_storeled_view->IPNO->cellAttributes() ?>>
<span id="el_store_storeled_IPNO">
<span<?php echo $store_storeled_view->IPNO->viewAttributes() ?>><?php echo $store_storeled_view->IPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->OPNO->Visible) { // OPNO ?>
	<tr id="r_OPNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_OPNO"><?php echo $store_storeled_view->OPNO->caption() ?></span></td>
		<td data-name="OPNO" <?php echo $store_storeled_view->OPNO->cellAttributes() ?>>
<span id="el_store_storeled_OPNO">
<span<?php echo $store_storeled_view->OPNO->viewAttributes() ?>><?php echo $store_storeled_view->OPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->RECID->Visible) { // RECID ?>
	<tr id="r_RECID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RECID"><?php echo $store_storeled_view->RECID->caption() ?></span></td>
		<td data-name="RECID" <?php echo $store_storeled_view->RECID->cellAttributes() ?>>
<span id="el_store_storeled_RECID">
<span<?php echo $store_storeled_view->RECID->viewAttributes() ?>><?php echo $store_storeled_view->RECID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->FQTY->Visible) { // FQTY ?>
	<tr id="r_FQTY">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_FQTY"><?php echo $store_storeled_view->FQTY->caption() ?></span></td>
		<td data-name="FQTY" <?php echo $store_storeled_view->FQTY->cellAttributes() ?>>
<span id="el_store_storeled_FQTY">
<span<?php echo $store_storeled_view->FQTY->viewAttributes() ?>><?php echo $store_storeled_view->FQTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_UR"><?php echo $store_storeled_view->UR->caption() ?></span></td>
		<td data-name="UR" <?php echo $store_storeled_view->UR->cellAttributes() ?>>
<span id="el_store_storeled_UR">
<span<?php echo $store_storeled_view->UR->viewAttributes() ?>><?php echo $store_storeled_view->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DCID->Visible) { // DCID ?>
	<tr id="r_DCID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DCID"><?php echo $store_storeled_view->DCID->caption() ?></span></td>
		<td data-name="DCID" <?php echo $store_storeled_view->DCID->cellAttributes() ?>>
<span id="el_store_storeled_DCID">
<span<?php echo $store_storeled_view->DCID->viewAttributes() ?>><?php echo $store_storeled_view->DCID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->_USERID->Visible) { // USERID ?>
	<tr id="r__USERID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled__USERID"><?php echo $store_storeled_view->_USERID->caption() ?></span></td>
		<td data-name="_USERID" <?php echo $store_storeled_view->_USERID->cellAttributes() ?>>
<span id="el_store_storeled__USERID">
<span<?php echo $store_storeled_view->_USERID->viewAttributes() ?>><?php echo $store_storeled_view->_USERID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->MODDT->Visible) { // MODDT ?>
	<tr id="r_MODDT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_MODDT"><?php echo $store_storeled_view->MODDT->caption() ?></span></td>
		<td data-name="MODDT" <?php echo $store_storeled_view->MODDT->cellAttributes() ?>>
<span id="el_store_storeled_MODDT">
<span<?php echo $store_storeled_view->MODDT->viewAttributes() ?>><?php echo $store_storeled_view->MODDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->FYM->Visible) { // FYM ?>
	<tr id="r_FYM">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_FYM"><?php echo $store_storeled_view->FYM->caption() ?></span></td>
		<td data-name="FYM" <?php echo $store_storeled_view->FYM->cellAttributes() ?>>
<span id="el_store_storeled_FYM">
<span<?php echo $store_storeled_view->FYM->viewAttributes() ?>><?php echo $store_storeled_view->FYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PRCBATCH->Visible) { // PRCBATCH ?>
	<tr id="r_PRCBATCH">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PRCBATCH"><?php echo $store_storeled_view->PRCBATCH->caption() ?></span></td>
		<td data-name="PRCBATCH" <?php echo $store_storeled_view->PRCBATCH->cellAttributes() ?>>
<span id="el_store_storeled_PRCBATCH">
<span<?php echo $store_storeled_view->PRCBATCH->viewAttributes() ?>><?php echo $store_storeled_view->PRCBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->SLNO->Visible) { // SLNO ?>
	<tr id="r_SLNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_SLNO"><?php echo $store_storeled_view->SLNO->caption() ?></span></td>
		<td data-name="SLNO" <?php echo $store_storeled_view->SLNO->cellAttributes() ?>>
<span id="el_store_storeled_SLNO">
<span<?php echo $store_storeled_view->SLNO->viewAttributes() ?>><?php echo $store_storeled_view->SLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_MRP"><?php echo $store_storeled_view->MRP->caption() ?></span></td>
		<td data-name="MRP" <?php echo $store_storeled_view->MRP->cellAttributes() ?>>
<span id="el_store_storeled_MRP">
<span<?php echo $store_storeled_view->MRP->viewAttributes() ?>><?php echo $store_storeled_view->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->BILLYM->Visible) { // BILLYM ?>
	<tr id="r_BILLYM">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BILLYM"><?php echo $store_storeled_view->BILLYM->caption() ?></span></td>
		<td data-name="BILLYM" <?php echo $store_storeled_view->BILLYM->cellAttributes() ?>>
<span id="el_store_storeled_BILLYM">
<span<?php echo $store_storeled_view->BILLYM->viewAttributes() ?>><?php echo $store_storeled_view->BILLYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->BILLGRP->Visible) { // BILLGRP ?>
	<tr id="r_BILLGRP">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BILLGRP"><?php echo $store_storeled_view->BILLGRP->caption() ?></span></td>
		<td data-name="BILLGRP" <?php echo $store_storeled_view->BILLGRP->cellAttributes() ?>>
<span id="el_store_storeled_BILLGRP">
<span<?php echo $store_storeled_view->BILLGRP->viewAttributes() ?>><?php echo $store_storeled_view->BILLGRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->STAFF->Visible) { // STAFF ?>
	<tr id="r_STAFF">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_STAFF"><?php echo $store_storeled_view->STAFF->caption() ?></span></td>
		<td data-name="STAFF" <?php echo $store_storeled_view->STAFF->cellAttributes() ?>>
<span id="el_store_storeled_STAFF">
<span<?php echo $store_storeled_view->STAFF->viewAttributes() ?>><?php echo $store_storeled_view->STAFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<tr id="r_TEMPIPNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_TEMPIPNO"><?php echo $store_storeled_view->TEMPIPNO->caption() ?></span></td>
		<td data-name="TEMPIPNO" <?php echo $store_storeled_view->TEMPIPNO->cellAttributes() ?>>
<span id="el_store_storeled_TEMPIPNO">
<span<?php echo $store_storeled_view->TEMPIPNO->viewAttributes() ?>><?php echo $store_storeled_view->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PRNTED->Visible) { // PRNTED ?>
	<tr id="r_PRNTED">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PRNTED"><?php echo $store_storeled_view->PRNTED->caption() ?></span></td>
		<td data-name="PRNTED" <?php echo $store_storeled_view->PRNTED->cellAttributes() ?>>
<span id="el_store_storeled_PRNTED">
<span<?php echo $store_storeled_view->PRNTED->viewAttributes() ?>><?php echo $store_storeled_view->PRNTED->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PATNAME->Visible) { // PATNAME ?>
	<tr id="r_PATNAME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PATNAME"><?php echo $store_storeled_view->PATNAME->caption() ?></span></td>
		<td data-name="PATNAME" <?php echo $store_storeled_view->PATNAME->cellAttributes() ?>>
<span id="el_store_storeled_PATNAME">
<span<?php echo $store_storeled_view->PATNAME->viewAttributes() ?>><?php echo $store_storeled_view->PATNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PJVNO->Visible) { // PJVNO ?>
	<tr id="r_PJVNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PJVNO"><?php echo $store_storeled_view->PJVNO->caption() ?></span></td>
		<td data-name="PJVNO" <?php echo $store_storeled_view->PJVNO->cellAttributes() ?>>
<span id="el_store_storeled_PJVNO">
<span<?php echo $store_storeled_view->PJVNO->viewAttributes() ?>><?php echo $store_storeled_view->PJVNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PJVSLNO->Visible) { // PJVSLNO ?>
	<tr id="r_PJVSLNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PJVSLNO"><?php echo $store_storeled_view->PJVSLNO->caption() ?></span></td>
		<td data-name="PJVSLNO" <?php echo $store_storeled_view->PJVSLNO->cellAttributes() ?>>
<span id="el_store_storeled_PJVSLNO">
<span<?php echo $store_storeled_view->PJVSLNO->viewAttributes() ?>><?php echo $store_storeled_view->PJVSLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->OTHDISC->Visible) { // OTHDISC ?>
	<tr id="r_OTHDISC">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_OTHDISC"><?php echo $store_storeled_view->OTHDISC->caption() ?></span></td>
		<td data-name="OTHDISC" <?php echo $store_storeled_view->OTHDISC->cellAttributes() ?>>
<span id="el_store_storeled_OTHDISC">
<span<?php echo $store_storeled_view->OTHDISC->viewAttributes() ?>><?php echo $store_storeled_view->OTHDISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PJVYM->Visible) { // PJVYM ?>
	<tr id="r_PJVYM">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PJVYM"><?php echo $store_storeled_view->PJVYM->caption() ?></span></td>
		<td data-name="PJVYM" <?php echo $store_storeled_view->PJVYM->cellAttributes() ?>>
<span id="el_store_storeled_PJVYM">
<span<?php echo $store_storeled_view->PJVYM->viewAttributes() ?>><?php echo $store_storeled_view->PJVYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PURDISCPER->Visible) { // PURDISCPER ?>
	<tr id="r_PURDISCPER">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PURDISCPER"><?php echo $store_storeled_view->PURDISCPER->caption() ?></span></td>
		<td data-name="PURDISCPER" <?php echo $store_storeled_view->PURDISCPER->cellAttributes() ?>>
<span id="el_store_storeled_PURDISCPER">
<span<?php echo $store_storeled_view->PURDISCPER->viewAttributes() ?>><?php echo $store_storeled_view->PURDISCPER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->CASHIER->Visible) { // CASHIER ?>
	<tr id="r_CASHIER">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CASHIER"><?php echo $store_storeled_view->CASHIER->caption() ?></span></td>
		<td data-name="CASHIER" <?php echo $store_storeled_view->CASHIER->cellAttributes() ?>>
<span id="el_store_storeled_CASHIER">
<span<?php echo $store_storeled_view->CASHIER->viewAttributes() ?>><?php echo $store_storeled_view->CASHIER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->CASHTIME->Visible) { // CASHTIME ?>
	<tr id="r_CASHTIME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CASHTIME"><?php echo $store_storeled_view->CASHTIME->caption() ?></span></td>
		<td data-name="CASHTIME" <?php echo $store_storeled_view->CASHTIME->cellAttributes() ?>>
<span id="el_store_storeled_CASHTIME">
<span<?php echo $store_storeled_view->CASHTIME->viewAttributes() ?>><?php echo $store_storeled_view->CASHTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->CASHRECD->Visible) { // CASHRECD ?>
	<tr id="r_CASHRECD">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CASHRECD"><?php echo $store_storeled_view->CASHRECD->caption() ?></span></td>
		<td data-name="CASHRECD" <?php echo $store_storeled_view->CASHRECD->cellAttributes() ?>>
<span id="el_store_storeled_CASHRECD">
<span<?php echo $store_storeled_view->CASHRECD->viewAttributes() ?>><?php echo $store_storeled_view->CASHRECD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->CASHREFNO->Visible) { // CASHREFNO ?>
	<tr id="r_CASHREFNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CASHREFNO"><?php echo $store_storeled_view->CASHREFNO->caption() ?></span></td>
		<td data-name="CASHREFNO" <?php echo $store_storeled_view->CASHREFNO->cellAttributes() ?>>
<span id="el_store_storeled_CASHREFNO">
<span<?php echo $store_storeled_view->CASHREFNO->viewAttributes() ?>><?php echo $store_storeled_view->CASHREFNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<tr id="r_CASHIERSHIFT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CASHIERSHIFT"><?php echo $store_storeled_view->CASHIERSHIFT->caption() ?></span></td>
		<td data-name="CASHIERSHIFT" <?php echo $store_storeled_view->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_store_storeled_CASHIERSHIFT">
<span<?php echo $store_storeled_view->CASHIERSHIFT->viewAttributes() ?>><?php echo $store_storeled_view->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PRCODE"><?php echo $store_storeled_view->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE" <?php echo $store_storeled_view->PRCODE->cellAttributes() ?>>
<span id="el_store_storeled_PRCODE">
<span<?php echo $store_storeled_view->PRCODE->viewAttributes() ?>><?php echo $store_storeled_view->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->RELEASEBY->Visible) { // RELEASEBY ?>
	<tr id="r_RELEASEBY">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RELEASEBY"><?php echo $store_storeled_view->RELEASEBY->caption() ?></span></td>
		<td data-name="RELEASEBY" <?php echo $store_storeled_view->RELEASEBY->cellAttributes() ?>>
<span id="el_store_storeled_RELEASEBY">
<span<?php echo $store_storeled_view->RELEASEBY->viewAttributes() ?>><?php echo $store_storeled_view->RELEASEBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<tr id="r_CRAUTHOR">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CRAUTHOR"><?php echo $store_storeled_view->CRAUTHOR->caption() ?></span></td>
		<td data-name="CRAUTHOR" <?php echo $store_storeled_view->CRAUTHOR->cellAttributes() ?>>
<span id="el_store_storeled_CRAUTHOR">
<span<?php echo $store_storeled_view->CRAUTHOR->viewAttributes() ?>><?php echo $store_storeled_view->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PAYMENT->Visible) { // PAYMENT ?>
	<tr id="r_PAYMENT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PAYMENT"><?php echo $store_storeled_view->PAYMENT->caption() ?></span></td>
		<td data-name="PAYMENT" <?php echo $store_storeled_view->PAYMENT->cellAttributes() ?>>
<span id="el_store_storeled_PAYMENT">
<span<?php echo $store_storeled_view->PAYMENT->viewAttributes() ?>><?php echo $store_storeled_view->PAYMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DRID->Visible) { // DRID ?>
	<tr id="r_DRID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DRID"><?php echo $store_storeled_view->DRID->caption() ?></span></td>
		<td data-name="DRID" <?php echo $store_storeled_view->DRID->cellAttributes() ?>>
<span id="el_store_storeled_DRID">
<span<?php echo $store_storeled_view->DRID->viewAttributes() ?>><?php echo $store_storeled_view->DRID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->WARD->Visible) { // WARD ?>
	<tr id="r_WARD">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_WARD"><?php echo $store_storeled_view->WARD->caption() ?></span></td>
		<td data-name="WARD" <?php echo $store_storeled_view->WARD->cellAttributes() ?>>
<span id="el_store_storeled_WARD">
<span<?php echo $store_storeled_view->WARD->viewAttributes() ?>><?php echo $store_storeled_view->WARD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->STAXTYPE->Visible) { // STAXTYPE ?>
	<tr id="r_STAXTYPE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_STAXTYPE"><?php echo $store_storeled_view->STAXTYPE->caption() ?></span></td>
		<td data-name="STAXTYPE" <?php echo $store_storeled_view->STAXTYPE->cellAttributes() ?>>
<span id="el_store_storeled_STAXTYPE">
<span<?php echo $store_storeled_view->STAXTYPE->viewAttributes() ?>><?php echo $store_storeled_view->STAXTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<tr id="r_PURDISCVAL">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PURDISCVAL"><?php echo $store_storeled_view->PURDISCVAL->caption() ?></span></td>
		<td data-name="PURDISCVAL" <?php echo $store_storeled_view->PURDISCVAL->cellAttributes() ?>>
<span id="el_store_storeled_PURDISCVAL">
<span<?php echo $store_storeled_view->PURDISCVAL->viewAttributes() ?>><?php echo $store_storeled_view->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->RNDOFF->Visible) { // RNDOFF ?>
	<tr id="r_RNDOFF">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RNDOFF"><?php echo $store_storeled_view->RNDOFF->caption() ?></span></td>
		<td data-name="RNDOFF" <?php echo $store_storeled_view->RNDOFF->cellAttributes() ?>>
<span id="el_store_storeled_RNDOFF">
<span<?php echo $store_storeled_view->RNDOFF->viewAttributes() ?>><?php echo $store_storeled_view->RNDOFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DISCONMRP->Visible) { // DISCONMRP ?>
	<tr id="r_DISCONMRP">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DISCONMRP"><?php echo $store_storeled_view->DISCONMRP->caption() ?></span></td>
		<td data-name="DISCONMRP" <?php echo $store_storeled_view->DISCONMRP->cellAttributes() ?>>
<span id="el_store_storeled_DISCONMRP">
<span<?php echo $store_storeled_view->DISCONMRP->viewAttributes() ?>><?php echo $store_storeled_view->DISCONMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DELVDT->Visible) { // DELVDT ?>
	<tr id="r_DELVDT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DELVDT"><?php echo $store_storeled_view->DELVDT->caption() ?></span></td>
		<td data-name="DELVDT" <?php echo $store_storeled_view->DELVDT->cellAttributes() ?>>
<span id="el_store_storeled_DELVDT">
<span<?php echo $store_storeled_view->DELVDT->viewAttributes() ?>><?php echo $store_storeled_view->DELVDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DELVTIME->Visible) { // DELVTIME ?>
	<tr id="r_DELVTIME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DELVTIME"><?php echo $store_storeled_view->DELVTIME->caption() ?></span></td>
		<td data-name="DELVTIME" <?php echo $store_storeled_view->DELVTIME->cellAttributes() ?>>
<span id="el_store_storeled_DELVTIME">
<span<?php echo $store_storeled_view->DELVTIME->viewAttributes() ?>><?php echo $store_storeled_view->DELVTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->DELVBY->Visible) { // DELVBY ?>
	<tr id="r_DELVBY">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DELVBY"><?php echo $store_storeled_view->DELVBY->caption() ?></span></td>
		<td data-name="DELVBY" <?php echo $store_storeled_view->DELVBY->cellAttributes() ?>>
<span id="el_store_storeled_DELVBY">
<span<?php echo $store_storeled_view->DELVBY->viewAttributes() ?>><?php echo $store_storeled_view->DELVBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->HOSPNO->Visible) { // HOSPNO ?>
	<tr id="r_HOSPNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_HOSPNO"><?php echo $store_storeled_view->HOSPNO->caption() ?></span></td>
		<td data-name="HOSPNO" <?php echo $store_storeled_view->HOSPNO->cellAttributes() ?>>
<span id="el_store_storeled_HOSPNO">
<span<?php echo $store_storeled_view->HOSPNO->viewAttributes() ?>><?php echo $store_storeled_view->HOSPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_id"><?php echo $store_storeled_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $store_storeled_view->id->cellAttributes() ?>>
<span id="el_store_storeled_id">
<span<?php echo $store_storeled_view->id->viewAttributes() ?>><?php echo $store_storeled_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->pbv->Visible) { // pbv ?>
	<tr id="r_pbv">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_pbv"><?php echo $store_storeled_view->pbv->caption() ?></span></td>
		<td data-name="pbv" <?php echo $store_storeled_view->pbv->cellAttributes() ?>>
<span id="el_store_storeled_pbv">
<span<?php echo $store_storeled_view->pbv->viewAttributes() ?>><?php echo $store_storeled_view->pbv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->pbt->Visible) { // pbt ?>
	<tr id="r_pbt">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_pbt"><?php echo $store_storeled_view->pbt->caption() ?></span></td>
		<td data-name="pbt" <?php echo $store_storeled_view->pbt->cellAttributes() ?>>
<span id="el_store_storeled_pbt">
<span<?php echo $store_storeled_view->pbt->viewAttributes() ?>><?php echo $store_storeled_view->pbt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->SiNo->Visible) { // SiNo ?>
	<tr id="r_SiNo">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_SiNo"><?php echo $store_storeled_view->SiNo->caption() ?></span></td>
		<td data-name="SiNo" <?php echo $store_storeled_view->SiNo->cellAttributes() ?>>
<span id="el_store_storeled_SiNo">
<span<?php echo $store_storeled_view->SiNo->viewAttributes() ?>><?php echo $store_storeled_view->SiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->Product->Visible) { // Product ?>
	<tr id="r_Product">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_Product"><?php echo $store_storeled_view->Product->caption() ?></span></td>
		<td data-name="Product" <?php echo $store_storeled_view->Product->cellAttributes() ?>>
<span id="el_store_storeled_Product">
<span<?php echo $store_storeled_view->Product->viewAttributes() ?>><?php echo $store_storeled_view->Product->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->Mfg->Visible) { // Mfg ?>
	<tr id="r_Mfg">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_Mfg"><?php echo $store_storeled_view->Mfg->caption() ?></span></td>
		<td data-name="Mfg" <?php echo $store_storeled_view->Mfg->cellAttributes() ?>>
<span id="el_store_storeled_Mfg">
<span<?php echo $store_storeled_view->Mfg->viewAttributes() ?>><?php echo $store_storeled_view->Mfg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->HosoID->Visible) { // HosoID ?>
	<tr id="r_HosoID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_HosoID"><?php echo $store_storeled_view->HosoID->caption() ?></span></td>
		<td data-name="HosoID" <?php echo $store_storeled_view->HosoID->cellAttributes() ?>>
<span id="el_store_storeled_HosoID">
<span<?php echo $store_storeled_view->HosoID->viewAttributes() ?>><?php echo $store_storeled_view->HosoID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_createdby"><?php echo $store_storeled_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $store_storeled_view->createdby->cellAttributes() ?>>
<span id="el_store_storeled_createdby">
<span<?php echo $store_storeled_view->createdby->viewAttributes() ?>><?php echo $store_storeled_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_createddatetime"><?php echo $store_storeled_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $store_storeled_view->createddatetime->cellAttributes() ?>>
<span id="el_store_storeled_createddatetime">
<span<?php echo $store_storeled_view->createddatetime->viewAttributes() ?>><?php echo $store_storeled_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_modifiedby"><?php echo $store_storeled_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $store_storeled_view->modifiedby->cellAttributes() ?>>
<span id="el_store_storeled_modifiedby">
<span<?php echo $store_storeled_view->modifiedby->viewAttributes() ?>><?php echo $store_storeled_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_modifieddatetime"><?php echo $store_storeled_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $store_storeled_view->modifieddatetime->cellAttributes() ?>>
<span id="el_store_storeled_modifieddatetime">
<span<?php echo $store_storeled_view->modifieddatetime->viewAttributes() ?>><?php echo $store_storeled_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_MFRCODE"><?php echo $store_storeled_view->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE" <?php echo $store_storeled_view->MFRCODE->cellAttributes() ?>>
<span id="el_store_storeled_MFRCODE">
<span<?php echo $store_storeled_view->MFRCODE->viewAttributes() ?>><?php echo $store_storeled_view->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_Reception"><?php echo $store_storeled_view->Reception->caption() ?></span></td>
		<td data-name="Reception" <?php echo $store_storeled_view->Reception->cellAttributes() ?>>
<span id="el_store_storeled_Reception">
<span<?php echo $store_storeled_view->Reception->viewAttributes() ?>><?php echo $store_storeled_view->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PatID"><?php echo $store_storeled_view->PatID->caption() ?></span></td>
		<td data-name="PatID" <?php echo $store_storeled_view->PatID->cellAttributes() ?>>
<span id="el_store_storeled_PatID">
<span<?php echo $store_storeled_view->PatID->viewAttributes() ?>><?php echo $store_storeled_view->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_mrnno"><?php echo $store_storeled_view->mrnno->caption() ?></span></td>
		<td data-name="mrnno" <?php echo $store_storeled_view->mrnno->cellAttributes() ?>>
<span id="el_store_storeled_mrnno">
<span<?php echo $store_storeled_view->mrnno->viewAttributes() ?>><?php echo $store_storeled_view->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled_view->BRNAME->Visible) { // BRNAME ?>
	<tr id="r_BRNAME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BRNAME"><?php echo $store_storeled_view->BRNAME->caption() ?></span></td>
		<td data-name="BRNAME" <?php echo $store_storeled_view->BRNAME->cellAttributes() ?>>
<span id="el_store_storeled_BRNAME">
<span<?php echo $store_storeled_view->BRNAME->viewAttributes() ?>><?php echo $store_storeled_view->BRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_storeled_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$store_storeled_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$store_storeled_view->terminate();
?>