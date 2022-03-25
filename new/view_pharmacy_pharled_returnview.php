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
$view_pharmacy_pharled_return_view = new view_pharmacy_pharled_return_view();

// Run the page
$view_pharmacy_pharled_return_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_pharled_return_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_pharled_return_view->isExport()) { ?>
<script>
var fview_pharmacy_pharled_returnview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_pharmacy_pharled_returnview = currentForm = new ew.Form("fview_pharmacy_pharled_returnview", "view");
	loadjs.done("fview_pharmacy_pharled_returnview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_pharmacy_pharled_return_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_pharmacy_pharled_return_view->ExportOptions->render("body") ?>
<?php $view_pharmacy_pharled_return_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_pharmacy_pharled_return_view->showPageHeader(); ?>
<?php
$view_pharmacy_pharled_return_view->showMessage();
?>
<form name="fview_pharmacy_pharled_returnview" id="fview_pharmacy_pharled_returnview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_pharled_return_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_pharmacy_pharled_return_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BRCODE"><?php echo $view_pharmacy_pharled_return_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $view_pharmacy_pharled_return_view->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BRCODE">
<span<?php echo $view_pharmacy_pharled_return_view->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->TYPE->Visible) { // TYPE ?>
	<tr id="r_TYPE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_TYPE"><?php echo $view_pharmacy_pharled_return_view->TYPE->caption() ?></span></td>
		<td data-name="TYPE" <?php echo $view_pharmacy_pharled_return_view->TYPE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TYPE">
<span<?php echo $view_pharmacy_pharled_return_view->TYPE->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DN->Visible) { // DN ?>
	<tr id="r_DN">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DN"><?php echo $view_pharmacy_pharled_return_view->DN->caption() ?></span></td>
		<td data-name="DN" <?php echo $view_pharmacy_pharled_return_view->DN->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DN">
<span<?php echo $view_pharmacy_pharled_return_view->DN->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->RDN->Visible) { // RDN ?>
	<tr id="r_RDN">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RDN"><?php echo $view_pharmacy_pharled_return_view->RDN->caption() ?></span></td>
		<td data-name="RDN" <?php echo $view_pharmacy_pharled_return_view->RDN->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RDN">
<span<?php echo $view_pharmacy_pharled_return_view->RDN->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->RDN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DT"><?php echo $view_pharmacy_pharled_return_view->DT->caption() ?></span></td>
		<td data-name="DT" <?php echo $view_pharmacy_pharled_return_view->DT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DT">
<span<?php echo $view_pharmacy_pharled_return_view->DT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PRC"><?php echo $view_pharmacy_pharled_return_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $view_pharmacy_pharled_return_view->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRC">
<span<?php echo $view_pharmacy_pharled_return_view->PRC->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_OQ"><?php echo $view_pharmacy_pharled_return_view->OQ->caption() ?></span></td>
		<td data-name="OQ" <?php echo $view_pharmacy_pharled_return_view->OQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OQ">
<span<?php echo $view_pharmacy_pharled_return_view->OQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->SiNo->Visible) { // SiNo ?>
	<tr id="r_SiNo">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_SiNo"><?php echo $view_pharmacy_pharled_return_view->SiNo->caption() ?></span></td>
		<td data-name="SiNo" <?php echo $view_pharmacy_pharled_return_view->SiNo->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_SiNo">
<span<?php echo $view_pharmacy_pharled_return_view->SiNo->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->SiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RQ"><?php echo $view_pharmacy_pharled_return_view->RQ->caption() ?></span></td>
		<td data-name="RQ" <?php echo $view_pharmacy_pharled_return_view->RQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RQ">
<span<?php echo $view_pharmacy_pharled_return_view->RQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->Product->Visible) { // Product ?>
	<tr id="r_Product">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_Product"><?php echo $view_pharmacy_pharled_return_view->Product->caption() ?></span></td>
		<td data-name="Product" <?php echo $view_pharmacy_pharled_return_view->Product->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Product">
<span<?php echo $view_pharmacy_pharled_return_view->Product->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->Product->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RT"><?php echo $view_pharmacy_pharled_return_view->RT->caption() ?></span></td>
		<td data-name="RT" <?php echo $view_pharmacy_pharled_return_view->RT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RT">
<span<?php echo $view_pharmacy_pharled_return_view->RT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_MRQ"><?php echo $view_pharmacy_pharled_return_view->MRQ->caption() ?></span></td>
		<td data-name="MRQ" <?php echo $view_pharmacy_pharled_return_view->MRQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MRQ">
<span<?php echo $view_pharmacy_pharled_return_view->MRQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_IQ"><?php echo $view_pharmacy_pharled_return_view->IQ->caption() ?></span></td>
		<td data-name="IQ" <?php echo $view_pharmacy_pharled_return_view->IQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IQ">
<span<?php echo $view_pharmacy_pharled_return_view->IQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DAMT->Visible) { // DAMT ?>
	<tr id="r_DAMT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DAMT"><?php echo $view_pharmacy_pharled_return_view->DAMT->caption() ?></span></td>
		<td data-name="DAMT" <?php echo $view_pharmacy_pharled_return_view->DAMT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DAMT">
<span<?php echo $view_pharmacy_pharled_return_view->DAMT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DAMT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BATCHNO"><?php echo $view_pharmacy_pharled_return_view->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO" <?php echo $view_pharmacy_pharled_return_view->BATCHNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BATCHNO">
<span<?php echo $view_pharmacy_pharled_return_view->BATCHNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_EXPDT"><?php echo $view_pharmacy_pharled_return_view->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT" <?php echo $view_pharmacy_pharled_return_view->EXPDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_EXPDT">
<span<?php echo $view_pharmacy_pharled_return_view->EXPDT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->Mfg->Visible) { // Mfg ?>
	<tr id="r_Mfg">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_Mfg"><?php echo $view_pharmacy_pharled_return_view->Mfg->caption() ?></span></td>
		<td data-name="Mfg" <?php echo $view_pharmacy_pharled_return_view->Mfg->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Mfg">
<span<?php echo $view_pharmacy_pharled_return_view->Mfg->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->Mfg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->BILLNO->Visible) { // BILLNO ?>
	<tr id="r_BILLNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BILLNO"><?php echo $view_pharmacy_pharled_return_view->BILLNO->caption() ?></span></td>
		<td data-name="BILLNO" <?php echo $view_pharmacy_pharled_return_view->BILLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLNO">
<span<?php echo $view_pharmacy_pharled_return_view->BILLNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->BILLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->BILLDT->Visible) { // BILLDT ?>
	<tr id="r_BILLDT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BILLDT"><?php echo $view_pharmacy_pharled_return_view->BILLDT->caption() ?></span></td>
		<td data-name="BILLDT" <?php echo $view_pharmacy_pharled_return_view->BILLDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLDT">
<span<?php echo $view_pharmacy_pharled_return_view->BILLDT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->BILLDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->VALUE->Visible) { // VALUE ?>
	<tr id="r_VALUE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_VALUE"><?php echo $view_pharmacy_pharled_return_view->VALUE->caption() ?></span></td>
		<td data-name="VALUE" <?php echo $view_pharmacy_pharled_return_view->VALUE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_VALUE">
<span<?php echo $view_pharmacy_pharled_return_view->VALUE->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->VALUE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DISC->Visible) { // DISC ?>
	<tr id="r_DISC">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DISC"><?php echo $view_pharmacy_pharled_return_view->DISC->caption() ?></span></td>
		<td data-name="DISC" <?php echo $view_pharmacy_pharled_return_view->DISC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DISC">
<span<?php echo $view_pharmacy_pharled_return_view->DISC->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_TAXP"><?php echo $view_pharmacy_pharled_return_view->TAXP->caption() ?></span></td>
		<td data-name="TAXP" <?php echo $view_pharmacy_pharled_return_view->TAXP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAXP">
<span<?php echo $view_pharmacy_pharled_return_view->TAXP->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->TAX->Visible) { // TAX ?>
	<tr id="r_TAX">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_TAX"><?php echo $view_pharmacy_pharled_return_view->TAX->caption() ?></span></td>
		<td data-name="TAX" <?php echo $view_pharmacy_pharled_return_view->TAX->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAX">
<span<?php echo $view_pharmacy_pharled_return_view->TAX->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->TAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->TAXR->Visible) { // TAXR ?>
	<tr id="r_TAXR">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_TAXR"><?php echo $view_pharmacy_pharled_return_view->TAXR->caption() ?></span></td>
		<td data-name="TAXR" <?php echo $view_pharmacy_pharled_return_view->TAXR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAXR">
<span<?php echo $view_pharmacy_pharled_return_view->TAXR->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->TAXR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->EMPNO->Visible) { // EMPNO ?>
	<tr id="r_EMPNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_EMPNO"><?php echo $view_pharmacy_pharled_return_view->EMPNO->caption() ?></span></td>
		<td data-name="EMPNO" <?php echo $view_pharmacy_pharled_return_view->EMPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_EMPNO">
<span<?php echo $view_pharmacy_pharled_return_view->EMPNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->EMPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PC"><?php echo $view_pharmacy_pharled_return_view->PC->caption() ?></span></td>
		<td data-name="PC" <?php echo $view_pharmacy_pharled_return_view->PC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PC">
<span<?php echo $view_pharmacy_pharled_return_view->PC->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DRNAME->Visible) { // DRNAME ?>
	<tr id="r_DRNAME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DRNAME"><?php echo $view_pharmacy_pharled_return_view->DRNAME->caption() ?></span></td>
		<td data-name="DRNAME" <?php echo $view_pharmacy_pharled_return_view->DRNAME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DRNAME">
<span<?php echo $view_pharmacy_pharled_return_view->DRNAME->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->BTIME->Visible) { // BTIME ?>
	<tr id="r_BTIME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BTIME"><?php echo $view_pharmacy_pharled_return_view->BTIME->caption() ?></span></td>
		<td data-name="BTIME" <?php echo $view_pharmacy_pharled_return_view->BTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BTIME">
<span<?php echo $view_pharmacy_pharled_return_view->BTIME->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->BTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->ONO->Visible) { // ONO ?>
	<tr id="r_ONO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_ONO"><?php echo $view_pharmacy_pharled_return_view->ONO->caption() ?></span></td>
		<td data-name="ONO" <?php echo $view_pharmacy_pharled_return_view->ONO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_ONO">
<span<?php echo $view_pharmacy_pharled_return_view->ONO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->ONO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->ODT->Visible) { // ODT ?>
	<tr id="r_ODT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_ODT"><?php echo $view_pharmacy_pharled_return_view->ODT->caption() ?></span></td>
		<td data-name="ODT" <?php echo $view_pharmacy_pharled_return_view->ODT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_ODT">
<span<?php echo $view_pharmacy_pharled_return_view->ODT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->ODT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PURRT->Visible) { // PURRT ?>
	<tr id="r_PURRT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PURRT"><?php echo $view_pharmacy_pharled_return_view->PURRT->caption() ?></span></td>
		<td data-name="PURRT" <?php echo $view_pharmacy_pharled_return_view->PURRT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURRT">
<span<?php echo $view_pharmacy_pharled_return_view->PURRT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PURRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->GRP->Visible) { // GRP ?>
	<tr id="r_GRP">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_GRP"><?php echo $view_pharmacy_pharled_return_view->GRP->caption() ?></span></td>
		<td data-name="GRP" <?php echo $view_pharmacy_pharled_return_view->GRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_GRP">
<span<?php echo $view_pharmacy_pharled_return_view->GRP->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->GRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->IBATCH->Visible) { // IBATCH ?>
	<tr id="r_IBATCH">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_IBATCH"><?php echo $view_pharmacy_pharled_return_view->IBATCH->caption() ?></span></td>
		<td data-name="IBATCH" <?php echo $view_pharmacy_pharled_return_view->IBATCH->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IBATCH">
<span<?php echo $view_pharmacy_pharled_return_view->IBATCH->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->IBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->IPNO->Visible) { // IPNO ?>
	<tr id="r_IPNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_IPNO"><?php echo $view_pharmacy_pharled_return_view->IPNO->caption() ?></span></td>
		<td data-name="IPNO" <?php echo $view_pharmacy_pharled_return_view->IPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IPNO">
<span<?php echo $view_pharmacy_pharled_return_view->IPNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->IPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->OPNO->Visible) { // OPNO ?>
	<tr id="r_OPNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_OPNO"><?php echo $view_pharmacy_pharled_return_view->OPNO->caption() ?></span></td>
		<td data-name="OPNO" <?php echo $view_pharmacy_pharled_return_view->OPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OPNO">
<span<?php echo $view_pharmacy_pharled_return_view->OPNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->OPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->RECID->Visible) { // RECID ?>
	<tr id="r_RECID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RECID"><?php echo $view_pharmacy_pharled_return_view->RECID->caption() ?></span></td>
		<td data-name="RECID" <?php echo $view_pharmacy_pharled_return_view->RECID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RECID">
<span<?php echo $view_pharmacy_pharled_return_view->RECID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->RECID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->FQTY->Visible) { // FQTY ?>
	<tr id="r_FQTY">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_FQTY"><?php echo $view_pharmacy_pharled_return_view->FQTY->caption() ?></span></td>
		<td data-name="FQTY" <?php echo $view_pharmacy_pharled_return_view->FQTY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_FQTY">
<span<?php echo $view_pharmacy_pharled_return_view->FQTY->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->FQTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_UR"><?php echo $view_pharmacy_pharled_return_view->UR->caption() ?></span></td>
		<td data-name="UR" <?php echo $view_pharmacy_pharled_return_view->UR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_UR">
<span<?php echo $view_pharmacy_pharled_return_view->UR->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DCID->Visible) { // DCID ?>
	<tr id="r_DCID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DCID"><?php echo $view_pharmacy_pharled_return_view->DCID->caption() ?></span></td>
		<td data-name="DCID" <?php echo $view_pharmacy_pharled_return_view->DCID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DCID">
<span<?php echo $view_pharmacy_pharled_return_view->DCID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DCID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->_USERID->Visible) { // USERID ?>
	<tr id="r__USERID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return__USERID"><?php echo $view_pharmacy_pharled_return_view->_USERID->caption() ?></span></td>
		<td data-name="_USERID" <?php echo $view_pharmacy_pharled_return_view->_USERID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return__USERID">
<span<?php echo $view_pharmacy_pharled_return_view->_USERID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->_USERID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->MODDT->Visible) { // MODDT ?>
	<tr id="r_MODDT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_MODDT"><?php echo $view_pharmacy_pharled_return_view->MODDT->caption() ?></span></td>
		<td data-name="MODDT" <?php echo $view_pharmacy_pharled_return_view->MODDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MODDT">
<span<?php echo $view_pharmacy_pharled_return_view->MODDT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->MODDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->FYM->Visible) { // FYM ?>
	<tr id="r_FYM">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_FYM"><?php echo $view_pharmacy_pharled_return_view->FYM->caption() ?></span></td>
		<td data-name="FYM" <?php echo $view_pharmacy_pharled_return_view->FYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_FYM">
<span<?php echo $view_pharmacy_pharled_return_view->FYM->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->FYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PRCBATCH->Visible) { // PRCBATCH ?>
	<tr id="r_PRCBATCH">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PRCBATCH"><?php echo $view_pharmacy_pharled_return_view->PRCBATCH->caption() ?></span></td>
		<td data-name="PRCBATCH" <?php echo $view_pharmacy_pharled_return_view->PRCBATCH->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRCBATCH">
<span<?php echo $view_pharmacy_pharled_return_view->PRCBATCH->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PRCBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->SLNO->Visible) { // SLNO ?>
	<tr id="r_SLNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_SLNO"><?php echo $view_pharmacy_pharled_return_view->SLNO->caption() ?></span></td>
		<td data-name="SLNO" <?php echo $view_pharmacy_pharled_return_view->SLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_SLNO">
<span<?php echo $view_pharmacy_pharled_return_view->SLNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->SLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_MRP"><?php echo $view_pharmacy_pharled_return_view->MRP->caption() ?></span></td>
		<td data-name="MRP" <?php echo $view_pharmacy_pharled_return_view->MRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MRP">
<span<?php echo $view_pharmacy_pharled_return_view->MRP->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->BILLYM->Visible) { // BILLYM ?>
	<tr id="r_BILLYM">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BILLYM"><?php echo $view_pharmacy_pharled_return_view->BILLYM->caption() ?></span></td>
		<td data-name="BILLYM" <?php echo $view_pharmacy_pharled_return_view->BILLYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLYM">
<span<?php echo $view_pharmacy_pharled_return_view->BILLYM->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->BILLYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->BILLGRP->Visible) { // BILLGRP ?>
	<tr id="r_BILLGRP">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BILLGRP"><?php echo $view_pharmacy_pharled_return_view->BILLGRP->caption() ?></span></td>
		<td data-name="BILLGRP" <?php echo $view_pharmacy_pharled_return_view->BILLGRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLGRP">
<span<?php echo $view_pharmacy_pharled_return_view->BILLGRP->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->BILLGRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->STAFF->Visible) { // STAFF ?>
	<tr id="r_STAFF">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_STAFF"><?php echo $view_pharmacy_pharled_return_view->STAFF->caption() ?></span></td>
		<td data-name="STAFF" <?php echo $view_pharmacy_pharled_return_view->STAFF->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_STAFF">
<span<?php echo $view_pharmacy_pharled_return_view->STAFF->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->STAFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<tr id="r_TEMPIPNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_TEMPIPNO"><?php echo $view_pharmacy_pharled_return_view->TEMPIPNO->caption() ?></span></td>
		<td data-name="TEMPIPNO" <?php echo $view_pharmacy_pharled_return_view->TEMPIPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TEMPIPNO">
<span<?php echo $view_pharmacy_pharled_return_view->TEMPIPNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PRNTED->Visible) { // PRNTED ?>
	<tr id="r_PRNTED">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PRNTED"><?php echo $view_pharmacy_pharled_return_view->PRNTED->caption() ?></span></td>
		<td data-name="PRNTED" <?php echo $view_pharmacy_pharled_return_view->PRNTED->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRNTED">
<span<?php echo $view_pharmacy_pharled_return_view->PRNTED->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PRNTED->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PATNAME->Visible) { // PATNAME ?>
	<tr id="r_PATNAME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PATNAME"><?php echo $view_pharmacy_pharled_return_view->PATNAME->caption() ?></span></td>
		<td data-name="PATNAME" <?php echo $view_pharmacy_pharled_return_view->PATNAME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PATNAME">
<span<?php echo $view_pharmacy_pharled_return_view->PATNAME->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PATNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PJVNO->Visible) { // PJVNO ?>
	<tr id="r_PJVNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PJVNO"><?php echo $view_pharmacy_pharled_return_view->PJVNO->caption() ?></span></td>
		<td data-name="PJVNO" <?php echo $view_pharmacy_pharled_return_view->PJVNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVNO">
<span<?php echo $view_pharmacy_pharled_return_view->PJVNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PJVNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PJVSLNO->Visible) { // PJVSLNO ?>
	<tr id="r_PJVSLNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PJVSLNO"><?php echo $view_pharmacy_pharled_return_view->PJVSLNO->caption() ?></span></td>
		<td data-name="PJVSLNO" <?php echo $view_pharmacy_pharled_return_view->PJVSLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVSLNO">
<span<?php echo $view_pharmacy_pharled_return_view->PJVSLNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PJVSLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->OTHDISC->Visible) { // OTHDISC ?>
	<tr id="r_OTHDISC">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_OTHDISC"><?php echo $view_pharmacy_pharled_return_view->OTHDISC->caption() ?></span></td>
		<td data-name="OTHDISC" <?php echo $view_pharmacy_pharled_return_view->OTHDISC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OTHDISC">
<span<?php echo $view_pharmacy_pharled_return_view->OTHDISC->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->OTHDISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PJVYM->Visible) { // PJVYM ?>
	<tr id="r_PJVYM">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PJVYM"><?php echo $view_pharmacy_pharled_return_view->PJVYM->caption() ?></span></td>
		<td data-name="PJVYM" <?php echo $view_pharmacy_pharled_return_view->PJVYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVYM">
<span<?php echo $view_pharmacy_pharled_return_view->PJVYM->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PJVYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PURDISCPER->Visible) { // PURDISCPER ?>
	<tr id="r_PURDISCPER">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PURDISCPER"><?php echo $view_pharmacy_pharled_return_view->PURDISCPER->caption() ?></span></td>
		<td data-name="PURDISCPER" <?php echo $view_pharmacy_pharled_return_view->PURDISCPER->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURDISCPER">
<span<?php echo $view_pharmacy_pharled_return_view->PURDISCPER->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PURDISCPER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->CASHIER->Visible) { // CASHIER ?>
	<tr id="r_CASHIER">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CASHIER"><?php echo $view_pharmacy_pharled_return_view->CASHIER->caption() ?></span></td>
		<td data-name="CASHIER" <?php echo $view_pharmacy_pharled_return_view->CASHIER->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHIER">
<span<?php echo $view_pharmacy_pharled_return_view->CASHIER->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->CASHIER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->CASHTIME->Visible) { // CASHTIME ?>
	<tr id="r_CASHTIME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CASHTIME"><?php echo $view_pharmacy_pharled_return_view->CASHTIME->caption() ?></span></td>
		<td data-name="CASHTIME" <?php echo $view_pharmacy_pharled_return_view->CASHTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHTIME">
<span<?php echo $view_pharmacy_pharled_return_view->CASHTIME->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->CASHTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->CASHRECD->Visible) { // CASHRECD ?>
	<tr id="r_CASHRECD">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CASHRECD"><?php echo $view_pharmacy_pharled_return_view->CASHRECD->caption() ?></span></td>
		<td data-name="CASHRECD" <?php echo $view_pharmacy_pharled_return_view->CASHRECD->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHRECD">
<span<?php echo $view_pharmacy_pharled_return_view->CASHRECD->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->CASHRECD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->CASHREFNO->Visible) { // CASHREFNO ?>
	<tr id="r_CASHREFNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CASHREFNO"><?php echo $view_pharmacy_pharled_return_view->CASHREFNO->caption() ?></span></td>
		<td data-name="CASHREFNO" <?php echo $view_pharmacy_pharled_return_view->CASHREFNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHREFNO">
<span<?php echo $view_pharmacy_pharled_return_view->CASHREFNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->CASHREFNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<tr id="r_CASHIERSHIFT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CASHIERSHIFT"><?php echo $view_pharmacy_pharled_return_view->CASHIERSHIFT->caption() ?></span></td>
		<td data-name="CASHIERSHIFT" <?php echo $view_pharmacy_pharled_return_view->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHIERSHIFT">
<span<?php echo $view_pharmacy_pharled_return_view->CASHIERSHIFT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PRCODE"><?php echo $view_pharmacy_pharled_return_view->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE" <?php echo $view_pharmacy_pharled_return_view->PRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRCODE">
<span<?php echo $view_pharmacy_pharled_return_view->PRCODE->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->RELEASEBY->Visible) { // RELEASEBY ?>
	<tr id="r_RELEASEBY">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RELEASEBY"><?php echo $view_pharmacy_pharled_return_view->RELEASEBY->caption() ?></span></td>
		<td data-name="RELEASEBY" <?php echo $view_pharmacy_pharled_return_view->RELEASEBY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RELEASEBY">
<span<?php echo $view_pharmacy_pharled_return_view->RELEASEBY->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->RELEASEBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<tr id="r_CRAUTHOR">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CRAUTHOR"><?php echo $view_pharmacy_pharled_return_view->CRAUTHOR->caption() ?></span></td>
		<td data-name="CRAUTHOR" <?php echo $view_pharmacy_pharled_return_view->CRAUTHOR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CRAUTHOR">
<span<?php echo $view_pharmacy_pharled_return_view->CRAUTHOR->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PAYMENT->Visible) { // PAYMENT ?>
	<tr id="r_PAYMENT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PAYMENT"><?php echo $view_pharmacy_pharled_return_view->PAYMENT->caption() ?></span></td>
		<td data-name="PAYMENT" <?php echo $view_pharmacy_pharled_return_view->PAYMENT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PAYMENT">
<span<?php echo $view_pharmacy_pharled_return_view->PAYMENT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PAYMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DRID->Visible) { // DRID ?>
	<tr id="r_DRID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DRID"><?php echo $view_pharmacy_pharled_return_view->DRID->caption() ?></span></td>
		<td data-name="DRID" <?php echo $view_pharmacy_pharled_return_view->DRID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DRID">
<span<?php echo $view_pharmacy_pharled_return_view->DRID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DRID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->WARD->Visible) { // WARD ?>
	<tr id="r_WARD">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_WARD"><?php echo $view_pharmacy_pharled_return_view->WARD->caption() ?></span></td>
		<td data-name="WARD" <?php echo $view_pharmacy_pharled_return_view->WARD->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_WARD">
<span<?php echo $view_pharmacy_pharled_return_view->WARD->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->WARD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->STAXTYPE->Visible) { // STAXTYPE ?>
	<tr id="r_STAXTYPE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_STAXTYPE"><?php echo $view_pharmacy_pharled_return_view->STAXTYPE->caption() ?></span></td>
		<td data-name="STAXTYPE" <?php echo $view_pharmacy_pharled_return_view->STAXTYPE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_STAXTYPE">
<span<?php echo $view_pharmacy_pharled_return_view->STAXTYPE->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->STAXTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<tr id="r_PURDISCVAL">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PURDISCVAL"><?php echo $view_pharmacy_pharled_return_view->PURDISCVAL->caption() ?></span></td>
		<td data-name="PURDISCVAL" <?php echo $view_pharmacy_pharled_return_view->PURDISCVAL->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURDISCVAL">
<span<?php echo $view_pharmacy_pharled_return_view->PURDISCVAL->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->RNDOFF->Visible) { // RNDOFF ?>
	<tr id="r_RNDOFF">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RNDOFF"><?php echo $view_pharmacy_pharled_return_view->RNDOFF->caption() ?></span></td>
		<td data-name="RNDOFF" <?php echo $view_pharmacy_pharled_return_view->RNDOFF->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RNDOFF">
<span<?php echo $view_pharmacy_pharled_return_view->RNDOFF->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->RNDOFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DISCONMRP->Visible) { // DISCONMRP ?>
	<tr id="r_DISCONMRP">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DISCONMRP"><?php echo $view_pharmacy_pharled_return_view->DISCONMRP->caption() ?></span></td>
		<td data-name="DISCONMRP" <?php echo $view_pharmacy_pharled_return_view->DISCONMRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DISCONMRP">
<span<?php echo $view_pharmacy_pharled_return_view->DISCONMRP->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DISCONMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DELVDT->Visible) { // DELVDT ?>
	<tr id="r_DELVDT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DELVDT"><?php echo $view_pharmacy_pharled_return_view->DELVDT->caption() ?></span></td>
		<td data-name="DELVDT" <?php echo $view_pharmacy_pharled_return_view->DELVDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVDT">
<span<?php echo $view_pharmacy_pharled_return_view->DELVDT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DELVDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DELVTIME->Visible) { // DELVTIME ?>
	<tr id="r_DELVTIME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DELVTIME"><?php echo $view_pharmacy_pharled_return_view->DELVTIME->caption() ?></span></td>
		<td data-name="DELVTIME" <?php echo $view_pharmacy_pharled_return_view->DELVTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVTIME">
<span<?php echo $view_pharmacy_pharled_return_view->DELVTIME->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DELVTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->DELVBY->Visible) { // DELVBY ?>
	<tr id="r_DELVBY">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DELVBY"><?php echo $view_pharmacy_pharled_return_view->DELVBY->caption() ?></span></td>
		<td data-name="DELVBY" <?php echo $view_pharmacy_pharled_return_view->DELVBY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVBY">
<span<?php echo $view_pharmacy_pharled_return_view->DELVBY->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->DELVBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->HOSPNO->Visible) { // HOSPNO ?>
	<tr id="r_HOSPNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_HOSPNO"><?php echo $view_pharmacy_pharled_return_view->HOSPNO->caption() ?></span></td>
		<td data-name="HOSPNO" <?php echo $view_pharmacy_pharled_return_view->HOSPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_HOSPNO">
<span<?php echo $view_pharmacy_pharled_return_view->HOSPNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->HOSPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_id"><?php echo $view_pharmacy_pharled_return_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $view_pharmacy_pharled_return_view->id->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return_view->id->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->pbv->Visible) { // pbv ?>
	<tr id="r_pbv">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_pbv"><?php echo $view_pharmacy_pharled_return_view->pbv->caption() ?></span></td>
		<td data-name="pbv" <?php echo $view_pharmacy_pharled_return_view->pbv->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_pbv">
<span<?php echo $view_pharmacy_pharled_return_view->pbv->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->pbv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->pbt->Visible) { // pbt ?>
	<tr id="r_pbt">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_pbt"><?php echo $view_pharmacy_pharled_return_view->pbt->caption() ?></span></td>
		<td data-name="pbt" <?php echo $view_pharmacy_pharled_return_view->pbt->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_pbt">
<span<?php echo $view_pharmacy_pharled_return_view->pbt->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->pbt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->HosoID->Visible) { // HosoID ?>
	<tr id="r_HosoID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_HosoID"><?php echo $view_pharmacy_pharled_return_view->HosoID->caption() ?></span></td>
		<td data-name="HosoID" <?php echo $view_pharmacy_pharled_return_view->HosoID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_HosoID">
<span<?php echo $view_pharmacy_pharled_return_view->HosoID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->HosoID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_createdby"><?php echo $view_pharmacy_pharled_return_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $view_pharmacy_pharled_return_view->createdby->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_createdby">
<span<?php echo $view_pharmacy_pharled_return_view->createdby->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_createddatetime"><?php echo $view_pharmacy_pharled_return_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $view_pharmacy_pharled_return_view->createddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_createddatetime">
<span<?php echo $view_pharmacy_pharled_return_view->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_modifiedby"><?php echo $view_pharmacy_pharled_return_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $view_pharmacy_pharled_return_view->modifiedby->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_modifiedby">
<span<?php echo $view_pharmacy_pharled_return_view->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_modifieddatetime"><?php echo $view_pharmacy_pharled_return_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $view_pharmacy_pharled_return_view->modifieddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_modifieddatetime">
<span<?php echo $view_pharmacy_pharled_return_view->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_MFRCODE"><?php echo $view_pharmacy_pharled_return_view->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE" <?php echo $view_pharmacy_pharled_return_view->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MFRCODE">
<span<?php echo $view_pharmacy_pharled_return_view->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_Reception"><?php echo $view_pharmacy_pharled_return_view->Reception->caption() ?></span></td>
		<td data-name="Reception" <?php echo $view_pharmacy_pharled_return_view->Reception->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Reception">
<span<?php echo $view_pharmacy_pharled_return_view->Reception->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PatID"><?php echo $view_pharmacy_pharled_return_view->PatID->caption() ?></span></td>
		<td data-name="PatID" <?php echo $view_pharmacy_pharled_return_view->PatID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PatID">
<span<?php echo $view_pharmacy_pharled_return_view->PatID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_mrnno"><?php echo $view_pharmacy_pharled_return_view->mrnno->caption() ?></span></td>
		<td data-name="mrnno" <?php echo $view_pharmacy_pharled_return_view->mrnno->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_mrnno">
<span<?php echo $view_pharmacy_pharled_return_view->mrnno->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_view->BRNAME->Visible) { // BRNAME ?>
	<tr id="r_BRNAME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BRNAME"><?php echo $view_pharmacy_pharled_return_view->BRNAME->caption() ?></span></td>
		<td data-name="BRNAME" <?php echo $view_pharmacy_pharled_return_view->BRNAME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BRNAME">
<span<?php echo $view_pharmacy_pharled_return_view->BRNAME->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_view->BRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_pharmacy_pharled_return_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_pharled_return_view->isExport()) { ?>
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
$view_pharmacy_pharled_return_view->terminate();
?>