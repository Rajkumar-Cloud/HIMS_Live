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
$pharmacy_pharled_view = new pharmacy_pharled_view();

// Run the page
$pharmacy_pharled_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_pharled_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_pharled_view->isExport()) { ?>
<script>
var fpharmacy_pharledview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_pharledview = currentForm = new ew.Form("fpharmacy_pharledview", "view");
	loadjs.done("fpharmacy_pharledview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_pharled_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_pharled_view->ExportOptions->render("body") ?>
<?php $pharmacy_pharled_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_pharled_view->showPageHeader(); ?>
<?php
$pharmacy_pharled_view->showMessage();
?>
<form name="fpharmacy_pharledview" id="fpharmacy_pharledview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_pharled_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_pharled_view->SiNo->Visible) { // SiNo ?>
	<tr id="r_SiNo">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SiNo"><?php echo $pharmacy_pharled_view->SiNo->caption() ?></span></td>
		<td data-name="SiNo" <?php echo $pharmacy_pharled_view->SiNo->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SiNo">
<span<?php echo $pharmacy_pharled_view->SiNo->viewAttributes() ?>><?php echo $pharmacy_pharled_view->SiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->SLNO->Visible) { // SLNO ?>
	<tr id="r_SLNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SLNO"><?php echo $pharmacy_pharled_view->SLNO->caption() ?></span></td>
		<td data-name="SLNO" <?php echo $pharmacy_pharled_view->SLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SLNO">
<span<?php echo $pharmacy_pharled_view->SLNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->SLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->Product->Visible) { // Product ?>
	<tr id="r_Product">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_Product"><?php echo $pharmacy_pharled_view->Product->caption() ?></span></td>
		<td data-name="Product" <?php echo $pharmacy_pharled_view->Product->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Product">
<span<?php echo $pharmacy_pharled_view->Product->viewAttributes() ?>><?php echo $pharmacy_pharled_view->Product->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RT"><?php echo $pharmacy_pharled_view->RT->caption() ?></span></td>
		<td data-name="RT" <?php echo $pharmacy_pharled_view->RT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RT">
<span<?php echo $pharmacy_pharled_view->RT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_IQ"><?php echo $pharmacy_pharled_view->IQ->caption() ?></span></td>
		<td data-name="IQ" <?php echo $pharmacy_pharled_view->IQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IQ">
<span<?php echo $pharmacy_pharled_view->IQ->viewAttributes() ?>><?php echo $pharmacy_pharled_view->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DAMT->Visible) { // DAMT ?>
	<tr id="r_DAMT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DAMT"><?php echo $pharmacy_pharled_view->DAMT->caption() ?></span></td>
		<td data-name="DAMT" <?php echo $pharmacy_pharled_view->DAMT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DAMT">
<span<?php echo $pharmacy_pharled_view->DAMT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DAMT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->Mfg->Visible) { // Mfg ?>
	<tr id="r_Mfg">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_Mfg"><?php echo $pharmacy_pharled_view->Mfg->caption() ?></span></td>
		<td data-name="Mfg" <?php echo $pharmacy_pharled_view->Mfg->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Mfg">
<span<?php echo $pharmacy_pharled_view->Mfg->viewAttributes() ?>><?php echo $pharmacy_pharled_view->Mfg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_EXPDT"><?php echo $pharmacy_pharled_view->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT" <?php echo $pharmacy_pharled_view->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_EXPDT">
<span<?php echo $pharmacy_pharled_view->EXPDT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BATCHNO"><?php echo $pharmacy_pharled_view->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO" <?php echo $pharmacy_pharled_view->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BATCHNO">
<span<?php echo $pharmacy_pharled_view->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BRCODE"><?php echo $pharmacy_pharled_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $pharmacy_pharled_view->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BRCODE">
<span<?php echo $pharmacy_pharled_view->BRCODE->viewAttributes() ?>><?php echo $pharmacy_pharled_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->TYPE->Visible) { // TYPE ?>
	<tr id="r_TYPE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TYPE"><?php echo $pharmacy_pharled_view->TYPE->caption() ?></span></td>
		<td data-name="TYPE" <?php echo $pharmacy_pharled_view->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TYPE">
<span<?php echo $pharmacy_pharled_view->TYPE->viewAttributes() ?>><?php echo $pharmacy_pharled_view->TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DN->Visible) { // DN ?>
	<tr id="r_DN">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DN"><?php echo $pharmacy_pharled_view->DN->caption() ?></span></td>
		<td data-name="DN" <?php echo $pharmacy_pharled_view->DN->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DN">
<span<?php echo $pharmacy_pharled_view->DN->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->RDN->Visible) { // RDN ?>
	<tr id="r_RDN">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RDN"><?php echo $pharmacy_pharled_view->RDN->caption() ?></span></td>
		<td data-name="RDN" <?php echo $pharmacy_pharled_view->RDN->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RDN">
<span<?php echo $pharmacy_pharled_view->RDN->viewAttributes() ?>><?php echo $pharmacy_pharled_view->RDN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DT"><?php echo $pharmacy_pharled_view->DT->caption() ?></span></td>
		<td data-name="DT" <?php echo $pharmacy_pharled_view->DT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DT">
<span<?php echo $pharmacy_pharled_view->DT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRC"><?php echo $pharmacy_pharled_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $pharmacy_pharled_view->PRC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRC">
<span<?php echo $pharmacy_pharled_view->PRC->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_OQ"><?php echo $pharmacy_pharled_view->OQ->caption() ?></span></td>
		<td data-name="OQ" <?php echo $pharmacy_pharled_view->OQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OQ">
<span<?php echo $pharmacy_pharled_view->OQ->viewAttributes() ?>><?php echo $pharmacy_pharled_view->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RQ"><?php echo $pharmacy_pharled_view->RQ->caption() ?></span></td>
		<td data-name="RQ" <?php echo $pharmacy_pharled_view->RQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RQ">
<span<?php echo $pharmacy_pharled_view->RQ->viewAttributes() ?>><?php echo $pharmacy_pharled_view->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MRQ"><?php echo $pharmacy_pharled_view->MRQ->caption() ?></span></td>
		<td data-name="MRQ" <?php echo $pharmacy_pharled_view->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MRQ">
<span<?php echo $pharmacy_pharled_view->MRQ->viewAttributes() ?>><?php echo $pharmacy_pharled_view->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->BILLNO->Visible) { // BILLNO ?>
	<tr id="r_BILLNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLNO"><?php echo $pharmacy_pharled_view->BILLNO->caption() ?></span></td>
		<td data-name="BILLNO" <?php echo $pharmacy_pharled_view->BILLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLNO">
<span<?php echo $pharmacy_pharled_view->BILLNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->BILLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->BILLDT->Visible) { // BILLDT ?>
	<tr id="r_BILLDT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLDT"><?php echo $pharmacy_pharled_view->BILLDT->caption() ?></span></td>
		<td data-name="BILLDT" <?php echo $pharmacy_pharled_view->BILLDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLDT">
<span<?php echo $pharmacy_pharled_view->BILLDT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->BILLDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->VALUE->Visible) { // VALUE ?>
	<tr id="r_VALUE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_VALUE"><?php echo $pharmacy_pharled_view->VALUE->caption() ?></span></td>
		<td data-name="VALUE" <?php echo $pharmacy_pharled_view->VALUE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_VALUE">
<span<?php echo $pharmacy_pharled_view->VALUE->viewAttributes() ?>><?php echo $pharmacy_pharled_view->VALUE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DISC->Visible) { // DISC ?>
	<tr id="r_DISC">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DISC"><?php echo $pharmacy_pharled_view->DISC->caption() ?></span></td>
		<td data-name="DISC" <?php echo $pharmacy_pharled_view->DISC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DISC">
<span<?php echo $pharmacy_pharled_view->DISC->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TAXP"><?php echo $pharmacy_pharled_view->TAXP->caption() ?></span></td>
		<td data-name="TAXP" <?php echo $pharmacy_pharled_view->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAXP">
<span<?php echo $pharmacy_pharled_view->TAXP->viewAttributes() ?>><?php echo $pharmacy_pharled_view->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->TAX->Visible) { // TAX ?>
	<tr id="r_TAX">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TAX"><?php echo $pharmacy_pharled_view->TAX->caption() ?></span></td>
		<td data-name="TAX" <?php echo $pharmacy_pharled_view->TAX->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAX">
<span<?php echo $pharmacy_pharled_view->TAX->viewAttributes() ?>><?php echo $pharmacy_pharled_view->TAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->TAXR->Visible) { // TAXR ?>
	<tr id="r_TAXR">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TAXR"><?php echo $pharmacy_pharled_view->TAXR->caption() ?></span></td>
		<td data-name="TAXR" <?php echo $pharmacy_pharled_view->TAXR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAXR">
<span<?php echo $pharmacy_pharled_view->TAXR->viewAttributes() ?>><?php echo $pharmacy_pharled_view->TAXR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->EMPNO->Visible) { // EMPNO ?>
	<tr id="r_EMPNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_EMPNO"><?php echo $pharmacy_pharled_view->EMPNO->caption() ?></span></td>
		<td data-name="EMPNO" <?php echo $pharmacy_pharled_view->EMPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_EMPNO">
<span<?php echo $pharmacy_pharled_view->EMPNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->EMPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PC"><?php echo $pharmacy_pharled_view->PC->caption() ?></span></td>
		<td data-name="PC" <?php echo $pharmacy_pharled_view->PC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PC">
<span<?php echo $pharmacy_pharled_view->PC->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DRNAME->Visible) { // DRNAME ?>
	<tr id="r_DRNAME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DRNAME"><?php echo $pharmacy_pharled_view->DRNAME->caption() ?></span></td>
		<td data-name="DRNAME" <?php echo $pharmacy_pharled_view->DRNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DRNAME">
<span<?php echo $pharmacy_pharled_view->DRNAME->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->BTIME->Visible) { // BTIME ?>
	<tr id="r_BTIME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BTIME"><?php echo $pharmacy_pharled_view->BTIME->caption() ?></span></td>
		<td data-name="BTIME" <?php echo $pharmacy_pharled_view->BTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BTIME">
<span<?php echo $pharmacy_pharled_view->BTIME->viewAttributes() ?>><?php echo $pharmacy_pharled_view->BTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->ONO->Visible) { // ONO ?>
	<tr id="r_ONO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_ONO"><?php echo $pharmacy_pharled_view->ONO->caption() ?></span></td>
		<td data-name="ONO" <?php echo $pharmacy_pharled_view->ONO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_ONO">
<span<?php echo $pharmacy_pharled_view->ONO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->ONO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->ODT->Visible) { // ODT ?>
	<tr id="r_ODT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_ODT"><?php echo $pharmacy_pharled_view->ODT->caption() ?></span></td>
		<td data-name="ODT" <?php echo $pharmacy_pharled_view->ODT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_ODT">
<span<?php echo $pharmacy_pharled_view->ODT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->ODT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PURRT->Visible) { // PURRT ?>
	<tr id="r_PURRT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PURRT"><?php echo $pharmacy_pharled_view->PURRT->caption() ?></span></td>
		<td data-name="PURRT" <?php echo $pharmacy_pharled_view->PURRT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURRT">
<span<?php echo $pharmacy_pharled_view->PURRT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PURRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->GRP->Visible) { // GRP ?>
	<tr id="r_GRP">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_GRP"><?php echo $pharmacy_pharled_view->GRP->caption() ?></span></td>
		<td data-name="GRP" <?php echo $pharmacy_pharled_view->GRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_GRP">
<span<?php echo $pharmacy_pharled_view->GRP->viewAttributes() ?>><?php echo $pharmacy_pharled_view->GRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->IBATCH->Visible) { // IBATCH ?>
	<tr id="r_IBATCH">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_IBATCH"><?php echo $pharmacy_pharled_view->IBATCH->caption() ?></span></td>
		<td data-name="IBATCH" <?php echo $pharmacy_pharled_view->IBATCH->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IBATCH">
<span<?php echo $pharmacy_pharled_view->IBATCH->viewAttributes() ?>><?php echo $pharmacy_pharled_view->IBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->IPNO->Visible) { // IPNO ?>
	<tr id="r_IPNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_IPNO"><?php echo $pharmacy_pharled_view->IPNO->caption() ?></span></td>
		<td data-name="IPNO" <?php echo $pharmacy_pharled_view->IPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IPNO">
<span<?php echo $pharmacy_pharled_view->IPNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->IPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->OPNO->Visible) { // OPNO ?>
	<tr id="r_OPNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_OPNO"><?php echo $pharmacy_pharled_view->OPNO->caption() ?></span></td>
		<td data-name="OPNO" <?php echo $pharmacy_pharled_view->OPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OPNO">
<span<?php echo $pharmacy_pharled_view->OPNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->OPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->RECID->Visible) { // RECID ?>
	<tr id="r_RECID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RECID"><?php echo $pharmacy_pharled_view->RECID->caption() ?></span></td>
		<td data-name="RECID" <?php echo $pharmacy_pharled_view->RECID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RECID">
<span<?php echo $pharmacy_pharled_view->RECID->viewAttributes() ?>><?php echo $pharmacy_pharled_view->RECID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->FQTY->Visible) { // FQTY ?>
	<tr id="r_FQTY">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_FQTY"><?php echo $pharmacy_pharled_view->FQTY->caption() ?></span></td>
		<td data-name="FQTY" <?php echo $pharmacy_pharled_view->FQTY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_FQTY">
<span<?php echo $pharmacy_pharled_view->FQTY->viewAttributes() ?>><?php echo $pharmacy_pharled_view->FQTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_UR"><?php echo $pharmacy_pharled_view->UR->caption() ?></span></td>
		<td data-name="UR" <?php echo $pharmacy_pharled_view->UR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_UR">
<span<?php echo $pharmacy_pharled_view->UR->viewAttributes() ?>><?php echo $pharmacy_pharled_view->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DCID->Visible) { // DCID ?>
	<tr id="r_DCID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DCID"><?php echo $pharmacy_pharled_view->DCID->caption() ?></span></td>
		<td data-name="DCID" <?php echo $pharmacy_pharled_view->DCID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DCID">
<span<?php echo $pharmacy_pharled_view->DCID->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DCID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->_USERID->Visible) { // USERID ?>
	<tr id="r__USERID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled__USERID"><?php echo $pharmacy_pharled_view->_USERID->caption() ?></span></td>
		<td data-name="_USERID" <?php echo $pharmacy_pharled_view->_USERID->cellAttributes() ?>>
<span id="el_pharmacy_pharled__USERID">
<span<?php echo $pharmacy_pharled_view->_USERID->viewAttributes() ?>><?php echo $pharmacy_pharled_view->_USERID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->MODDT->Visible) { // MODDT ?>
	<tr id="r_MODDT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MODDT"><?php echo $pharmacy_pharled_view->MODDT->caption() ?></span></td>
		<td data-name="MODDT" <?php echo $pharmacy_pharled_view->MODDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MODDT">
<span<?php echo $pharmacy_pharled_view->MODDT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->MODDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->FYM->Visible) { // FYM ?>
	<tr id="r_FYM">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_FYM"><?php echo $pharmacy_pharled_view->FYM->caption() ?></span></td>
		<td data-name="FYM" <?php echo $pharmacy_pharled_view->FYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_FYM">
<span<?php echo $pharmacy_pharled_view->FYM->viewAttributes() ?>><?php echo $pharmacy_pharled_view->FYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PRCBATCH->Visible) { // PRCBATCH ?>
	<tr id="r_PRCBATCH">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRCBATCH"><?php echo $pharmacy_pharled_view->PRCBATCH->caption() ?></span></td>
		<td data-name="PRCBATCH" <?php echo $pharmacy_pharled_view->PRCBATCH->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRCBATCH">
<span<?php echo $pharmacy_pharled_view->PRCBATCH->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PRCBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MRP"><?php echo $pharmacy_pharled_view->MRP->caption() ?></span></td>
		<td data-name="MRP" <?php echo $pharmacy_pharled_view->MRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MRP">
<span<?php echo $pharmacy_pharled_view->MRP->viewAttributes() ?>><?php echo $pharmacy_pharled_view->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->BILLYM->Visible) { // BILLYM ?>
	<tr id="r_BILLYM">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLYM"><?php echo $pharmacy_pharled_view->BILLYM->caption() ?></span></td>
		<td data-name="BILLYM" <?php echo $pharmacy_pharled_view->BILLYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLYM">
<span<?php echo $pharmacy_pharled_view->BILLYM->viewAttributes() ?>><?php echo $pharmacy_pharled_view->BILLYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->BILLGRP->Visible) { // BILLGRP ?>
	<tr id="r_BILLGRP">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLGRP"><?php echo $pharmacy_pharled_view->BILLGRP->caption() ?></span></td>
		<td data-name="BILLGRP" <?php echo $pharmacy_pharled_view->BILLGRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLGRP">
<span<?php echo $pharmacy_pharled_view->BILLGRP->viewAttributes() ?>><?php echo $pharmacy_pharled_view->BILLGRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->STAFF->Visible) { // STAFF ?>
	<tr id="r_STAFF">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_STAFF"><?php echo $pharmacy_pharled_view->STAFF->caption() ?></span></td>
		<td data-name="STAFF" <?php echo $pharmacy_pharled_view->STAFF->cellAttributes() ?>>
<span id="el_pharmacy_pharled_STAFF">
<span<?php echo $pharmacy_pharled_view->STAFF->viewAttributes() ?>><?php echo $pharmacy_pharled_view->STAFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<tr id="r_TEMPIPNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TEMPIPNO"><?php echo $pharmacy_pharled_view->TEMPIPNO->caption() ?></span></td>
		<td data-name="TEMPIPNO" <?php echo $pharmacy_pharled_view->TEMPIPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TEMPIPNO">
<span<?php echo $pharmacy_pharled_view->TEMPIPNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PRNTED->Visible) { // PRNTED ?>
	<tr id="r_PRNTED">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRNTED"><?php echo $pharmacy_pharled_view->PRNTED->caption() ?></span></td>
		<td data-name="PRNTED" <?php echo $pharmacy_pharled_view->PRNTED->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRNTED">
<span<?php echo $pharmacy_pharled_view->PRNTED->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PRNTED->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PATNAME->Visible) { // PATNAME ?>
	<tr id="r_PATNAME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PATNAME"><?php echo $pharmacy_pharled_view->PATNAME->caption() ?></span></td>
		<td data-name="PATNAME" <?php echo $pharmacy_pharled_view->PATNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PATNAME">
<span<?php echo $pharmacy_pharled_view->PATNAME->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PATNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PJVNO->Visible) { // PJVNO ?>
	<tr id="r_PJVNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PJVNO"><?php echo $pharmacy_pharled_view->PJVNO->caption() ?></span></td>
		<td data-name="PJVNO" <?php echo $pharmacy_pharled_view->PJVNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVNO">
<span<?php echo $pharmacy_pharled_view->PJVNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PJVNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PJVSLNO->Visible) { // PJVSLNO ?>
	<tr id="r_PJVSLNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PJVSLNO"><?php echo $pharmacy_pharled_view->PJVSLNO->caption() ?></span></td>
		<td data-name="PJVSLNO" <?php echo $pharmacy_pharled_view->PJVSLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVSLNO">
<span<?php echo $pharmacy_pharled_view->PJVSLNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PJVSLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->OTHDISC->Visible) { // OTHDISC ?>
	<tr id="r_OTHDISC">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_OTHDISC"><?php echo $pharmacy_pharled_view->OTHDISC->caption() ?></span></td>
		<td data-name="OTHDISC" <?php echo $pharmacy_pharled_view->OTHDISC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OTHDISC">
<span<?php echo $pharmacy_pharled_view->OTHDISC->viewAttributes() ?>><?php echo $pharmacy_pharled_view->OTHDISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PJVYM->Visible) { // PJVYM ?>
	<tr id="r_PJVYM">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PJVYM"><?php echo $pharmacy_pharled_view->PJVYM->caption() ?></span></td>
		<td data-name="PJVYM" <?php echo $pharmacy_pharled_view->PJVYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVYM">
<span<?php echo $pharmacy_pharled_view->PJVYM->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PJVYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PURDISCPER->Visible) { // PURDISCPER ?>
	<tr id="r_PURDISCPER">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PURDISCPER"><?php echo $pharmacy_pharled_view->PURDISCPER->caption() ?></span></td>
		<td data-name="PURDISCPER" <?php echo $pharmacy_pharled_view->PURDISCPER->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURDISCPER">
<span<?php echo $pharmacy_pharled_view->PURDISCPER->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PURDISCPER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->CASHIER->Visible) { // CASHIER ?>
	<tr id="r_CASHIER">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHIER"><?php echo $pharmacy_pharled_view->CASHIER->caption() ?></span></td>
		<td data-name="CASHIER" <?php echo $pharmacy_pharled_view->CASHIER->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHIER">
<span<?php echo $pharmacy_pharled_view->CASHIER->viewAttributes() ?>><?php echo $pharmacy_pharled_view->CASHIER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->CASHTIME->Visible) { // CASHTIME ?>
	<tr id="r_CASHTIME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHTIME"><?php echo $pharmacy_pharled_view->CASHTIME->caption() ?></span></td>
		<td data-name="CASHTIME" <?php echo $pharmacy_pharled_view->CASHTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHTIME">
<span<?php echo $pharmacy_pharled_view->CASHTIME->viewAttributes() ?>><?php echo $pharmacy_pharled_view->CASHTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->CASHRECD->Visible) { // CASHRECD ?>
	<tr id="r_CASHRECD">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHRECD"><?php echo $pharmacy_pharled_view->CASHRECD->caption() ?></span></td>
		<td data-name="CASHRECD" <?php echo $pharmacy_pharled_view->CASHRECD->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHRECD">
<span<?php echo $pharmacy_pharled_view->CASHRECD->viewAttributes() ?>><?php echo $pharmacy_pharled_view->CASHRECD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->CASHREFNO->Visible) { // CASHREFNO ?>
	<tr id="r_CASHREFNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHREFNO"><?php echo $pharmacy_pharled_view->CASHREFNO->caption() ?></span></td>
		<td data-name="CASHREFNO" <?php echo $pharmacy_pharled_view->CASHREFNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHREFNO">
<span<?php echo $pharmacy_pharled_view->CASHREFNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->CASHREFNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<tr id="r_CASHIERSHIFT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHIERSHIFT"><?php echo $pharmacy_pharled_view->CASHIERSHIFT->caption() ?></span></td>
		<td data-name="CASHIERSHIFT" <?php echo $pharmacy_pharled_view->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHIERSHIFT">
<span<?php echo $pharmacy_pharled_view->CASHIERSHIFT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRCODE"><?php echo $pharmacy_pharled_view->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE" <?php echo $pharmacy_pharled_view->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRCODE">
<span<?php echo $pharmacy_pharled_view->PRCODE->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->RELEASEBY->Visible) { // RELEASEBY ?>
	<tr id="r_RELEASEBY">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RELEASEBY"><?php echo $pharmacy_pharled_view->RELEASEBY->caption() ?></span></td>
		<td data-name="RELEASEBY" <?php echo $pharmacy_pharled_view->RELEASEBY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RELEASEBY">
<span<?php echo $pharmacy_pharled_view->RELEASEBY->viewAttributes() ?>><?php echo $pharmacy_pharled_view->RELEASEBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<tr id="r_CRAUTHOR">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CRAUTHOR"><?php echo $pharmacy_pharled_view->CRAUTHOR->caption() ?></span></td>
		<td data-name="CRAUTHOR" <?php echo $pharmacy_pharled_view->CRAUTHOR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CRAUTHOR">
<span<?php echo $pharmacy_pharled_view->CRAUTHOR->viewAttributes() ?>><?php echo $pharmacy_pharled_view->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PAYMENT->Visible) { // PAYMENT ?>
	<tr id="r_PAYMENT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PAYMENT"><?php echo $pharmacy_pharled_view->PAYMENT->caption() ?></span></td>
		<td data-name="PAYMENT" <?php echo $pharmacy_pharled_view->PAYMENT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PAYMENT">
<span<?php echo $pharmacy_pharled_view->PAYMENT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PAYMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DRID->Visible) { // DRID ?>
	<tr id="r_DRID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DRID"><?php echo $pharmacy_pharled_view->DRID->caption() ?></span></td>
		<td data-name="DRID" <?php echo $pharmacy_pharled_view->DRID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DRID">
<span<?php echo $pharmacy_pharled_view->DRID->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DRID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->WARD->Visible) { // WARD ?>
	<tr id="r_WARD">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_WARD"><?php echo $pharmacy_pharled_view->WARD->caption() ?></span></td>
		<td data-name="WARD" <?php echo $pharmacy_pharled_view->WARD->cellAttributes() ?>>
<span id="el_pharmacy_pharled_WARD">
<span<?php echo $pharmacy_pharled_view->WARD->viewAttributes() ?>><?php echo $pharmacy_pharled_view->WARD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->STAXTYPE->Visible) { // STAXTYPE ?>
	<tr id="r_STAXTYPE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_STAXTYPE"><?php echo $pharmacy_pharled_view->STAXTYPE->caption() ?></span></td>
		<td data-name="STAXTYPE" <?php echo $pharmacy_pharled_view->STAXTYPE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_STAXTYPE">
<span<?php echo $pharmacy_pharled_view->STAXTYPE->viewAttributes() ?>><?php echo $pharmacy_pharled_view->STAXTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<tr id="r_PURDISCVAL">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PURDISCVAL"><?php echo $pharmacy_pharled_view->PURDISCVAL->caption() ?></span></td>
		<td data-name="PURDISCVAL" <?php echo $pharmacy_pharled_view->PURDISCVAL->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURDISCVAL">
<span<?php echo $pharmacy_pharled_view->PURDISCVAL->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->RNDOFF->Visible) { // RNDOFF ?>
	<tr id="r_RNDOFF">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RNDOFF"><?php echo $pharmacy_pharled_view->RNDOFF->caption() ?></span></td>
		<td data-name="RNDOFF" <?php echo $pharmacy_pharled_view->RNDOFF->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RNDOFF">
<span<?php echo $pharmacy_pharled_view->RNDOFF->viewAttributes() ?>><?php echo $pharmacy_pharled_view->RNDOFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DISCONMRP->Visible) { // DISCONMRP ?>
	<tr id="r_DISCONMRP">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DISCONMRP"><?php echo $pharmacy_pharled_view->DISCONMRP->caption() ?></span></td>
		<td data-name="DISCONMRP" <?php echo $pharmacy_pharled_view->DISCONMRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DISCONMRP">
<span<?php echo $pharmacy_pharled_view->DISCONMRP->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DISCONMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DELVDT->Visible) { // DELVDT ?>
	<tr id="r_DELVDT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DELVDT"><?php echo $pharmacy_pharled_view->DELVDT->caption() ?></span></td>
		<td data-name="DELVDT" <?php echo $pharmacy_pharled_view->DELVDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVDT">
<span<?php echo $pharmacy_pharled_view->DELVDT->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DELVDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DELVTIME->Visible) { // DELVTIME ?>
	<tr id="r_DELVTIME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DELVTIME"><?php echo $pharmacy_pharled_view->DELVTIME->caption() ?></span></td>
		<td data-name="DELVTIME" <?php echo $pharmacy_pharled_view->DELVTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVTIME">
<span<?php echo $pharmacy_pharled_view->DELVTIME->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DELVTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->DELVBY->Visible) { // DELVBY ?>
	<tr id="r_DELVBY">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DELVBY"><?php echo $pharmacy_pharled_view->DELVBY->caption() ?></span></td>
		<td data-name="DELVBY" <?php echo $pharmacy_pharled_view->DELVBY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVBY">
<span<?php echo $pharmacy_pharled_view->DELVBY->viewAttributes() ?>><?php echo $pharmacy_pharled_view->DELVBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->HOSPNO->Visible) { // HOSPNO ?>
	<tr id="r_HOSPNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_HOSPNO"><?php echo $pharmacy_pharled_view->HOSPNO->caption() ?></span></td>
		<td data-name="HOSPNO" <?php echo $pharmacy_pharled_view->HOSPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_HOSPNO">
<span<?php echo $pharmacy_pharled_view->HOSPNO->viewAttributes() ?>><?php echo $pharmacy_pharled_view->HOSPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_id"><?php echo $pharmacy_pharled_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_pharled_view->id->cellAttributes() ?>>
<span id="el_pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled_view->id->viewAttributes() ?>><?php echo $pharmacy_pharled_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->pbv->Visible) { // pbv ?>
	<tr id="r_pbv">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_pbv"><?php echo $pharmacy_pharled_view->pbv->caption() ?></span></td>
		<td data-name="pbv" <?php echo $pharmacy_pharled_view->pbv->cellAttributes() ?>>
<span id="el_pharmacy_pharled_pbv">
<span<?php echo $pharmacy_pharled_view->pbv->viewAttributes() ?>><?php echo $pharmacy_pharled_view->pbv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->pbt->Visible) { // pbt ?>
	<tr id="r_pbt">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_pbt"><?php echo $pharmacy_pharled_view->pbt->caption() ?></span></td>
		<td data-name="pbt" <?php echo $pharmacy_pharled_view->pbt->cellAttributes() ?>>
<span id="el_pharmacy_pharled_pbt">
<span<?php echo $pharmacy_pharled_view->pbt->viewAttributes() ?>><?php echo $pharmacy_pharled_view->pbt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->HosoID->Visible) { // HosoID ?>
	<tr id="r_HosoID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_HosoID"><?php echo $pharmacy_pharled_view->HosoID->caption() ?></span></td>
		<td data-name="HosoID" <?php echo $pharmacy_pharled_view->HosoID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_HosoID">
<span<?php echo $pharmacy_pharled_view->HosoID->viewAttributes() ?>><?php echo $pharmacy_pharled_view->HosoID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_createdby"><?php echo $pharmacy_pharled_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $pharmacy_pharled_view->createdby->cellAttributes() ?>>
<span id="el_pharmacy_pharled_createdby">
<span<?php echo $pharmacy_pharled_view->createdby->viewAttributes() ?>><?php echo $pharmacy_pharled_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_createddatetime"><?php echo $pharmacy_pharled_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $pharmacy_pharled_view->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_pharled_createddatetime">
<span<?php echo $pharmacy_pharled_view->createddatetime->viewAttributes() ?>><?php echo $pharmacy_pharled_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_modifiedby"><?php echo $pharmacy_pharled_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $pharmacy_pharled_view->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_pharled_modifiedby">
<span<?php echo $pharmacy_pharled_view->modifiedby->viewAttributes() ?>><?php echo $pharmacy_pharled_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_modifieddatetime"><?php echo $pharmacy_pharled_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $pharmacy_pharled_view->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_pharled_modifieddatetime">
<span<?php echo $pharmacy_pharled_view->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_pharled_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MFRCODE"><?php echo $pharmacy_pharled_view->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE" <?php echo $pharmacy_pharled_view->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MFRCODE">
<span<?php echo $pharmacy_pharled_view->MFRCODE->viewAttributes() ?>><?php echo $pharmacy_pharled_view->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_Reception"><?php echo $pharmacy_pharled_view->Reception->caption() ?></span></td>
		<td data-name="Reception" <?php echo $pharmacy_pharled_view->Reception->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Reception">
<span<?php echo $pharmacy_pharled_view->Reception->viewAttributes() ?>><?php echo $pharmacy_pharled_view->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PatID"><?php echo $pharmacy_pharled_view->PatID->caption() ?></span></td>
		<td data-name="PatID" <?php echo $pharmacy_pharled_view->PatID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PatID">
<span<?php echo $pharmacy_pharled_view->PatID->viewAttributes() ?>><?php echo $pharmacy_pharled_view->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_mrnno"><?php echo $pharmacy_pharled_view->mrnno->caption() ?></span></td>
		<td data-name="mrnno" <?php echo $pharmacy_pharled_view->mrnno->cellAttributes() ?>>
<span id="el_pharmacy_pharled_mrnno">
<span<?php echo $pharmacy_pharled_view->mrnno->viewAttributes() ?>><?php echo $pharmacy_pharled_view->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled_view->BRNAME->Visible) { // BRNAME ?>
	<tr id="r_BRNAME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BRNAME"><?php echo $pharmacy_pharled_view->BRNAME->caption() ?></span></td>
		<td data-name="BRNAME" <?php echo $pharmacy_pharled_view->BRNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BRNAME">
<span<?php echo $pharmacy_pharled_view->BRNAME->viewAttributes() ?>><?php echo $pharmacy_pharled_view->BRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_pharled_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_pharled_view->isExport()) { ?>
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
$pharmacy_pharled_view->terminate();
?>