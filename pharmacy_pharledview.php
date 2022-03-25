<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_pharled->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_pharledview = currentForm = new ew.Form("fpharmacy_pharledview", "view");

// Form_CustomValidate event
fpharmacy_pharledview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_pharledview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_pharledview.lists["x_SLNO"] = <?php echo $pharmacy_pharled_view->SLNO->Lookup->toClientList() ?>;
fpharmacy_pharledview.lists["x_SLNO"].options = <?php echo JsonEncode($pharmacy_pharled_view->SLNO->lookupOptions()) ?>;
fpharmacy_pharledview.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_pharled->isExport()) { ?>
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
<?php if ($pharmacy_pharled_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_pharled_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_pharled_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
	<tr id="r_SiNo">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SiNo"><?php echo $pharmacy_pharled->SiNo->caption() ?></span></td>
		<td data-name="SiNo"<?php echo $pharmacy_pharled->SiNo->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SiNo">
<span<?php echo $pharmacy_pharled->SiNo->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
	<tr id="r_SLNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SLNO"><?php echo $pharmacy_pharled->SLNO->caption() ?></span></td>
		<td data-name="SLNO"<?php echo $pharmacy_pharled->SLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SLNO">
<span<?php echo $pharmacy_pharled->SLNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
	<tr id="r_Product">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_Product"><?php echo $pharmacy_pharled->Product->caption() ?></span></td>
		<td data-name="Product"<?php echo $pharmacy_pharled->Product->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Product">
<span<?php echo $pharmacy_pharled->Product->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Product->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RT"><?php echo $pharmacy_pharled->RT->caption() ?></span></td>
		<td data-name="RT"<?php echo $pharmacy_pharled->RT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RT">
<span<?php echo $pharmacy_pharled->RT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_IQ"><?php echo $pharmacy_pharled->IQ->caption() ?></span></td>
		<td data-name="IQ"<?php echo $pharmacy_pharled->IQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IQ">
<span<?php echo $pharmacy_pharled->IQ->viewAttributes() ?>>
<?php echo $pharmacy_pharled->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
	<tr id="r_DAMT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DAMT"><?php echo $pharmacy_pharled->DAMT->caption() ?></span></td>
		<td data-name="DAMT"<?php echo $pharmacy_pharled->DAMT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DAMT">
<span<?php echo $pharmacy_pharled->DAMT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DAMT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
	<tr id="r_Mfg">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_Mfg"><?php echo $pharmacy_pharled->Mfg->caption() ?></span></td>
		<td data-name="Mfg"<?php echo $pharmacy_pharled->Mfg->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Mfg">
<span<?php echo $pharmacy_pharled->Mfg->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Mfg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_EXPDT"><?php echo $pharmacy_pharled->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT"<?php echo $pharmacy_pharled->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_EXPDT">
<span<?php echo $pharmacy_pharled->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BATCHNO"><?php echo $pharmacy_pharled->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO"<?php echo $pharmacy_pharled->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BATCHNO">
<span<?php echo $pharmacy_pharled->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BRCODE"><?php echo $pharmacy_pharled->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $pharmacy_pharled->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BRCODE">
<span<?php echo $pharmacy_pharled->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->TYPE->Visible) { // TYPE ?>
	<tr id="r_TYPE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TYPE"><?php echo $pharmacy_pharled->TYPE->caption() ?></span></td>
		<td data-name="TYPE"<?php echo $pharmacy_pharled->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TYPE">
<span<?php echo $pharmacy_pharled->TYPE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DN->Visible) { // DN ?>
	<tr id="r_DN">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DN"><?php echo $pharmacy_pharled->DN->caption() ?></span></td>
		<td data-name="DN"<?php echo $pharmacy_pharled->DN->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DN">
<span<?php echo $pharmacy_pharled->DN->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->RDN->Visible) { // RDN ?>
	<tr id="r_RDN">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RDN"><?php echo $pharmacy_pharled->RDN->caption() ?></span></td>
		<td data-name="RDN"<?php echo $pharmacy_pharled->RDN->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RDN">
<span<?php echo $pharmacy_pharled->RDN->viewAttributes() ?>>
<?php echo $pharmacy_pharled->RDN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DT"><?php echo $pharmacy_pharled->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $pharmacy_pharled->DT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DT">
<span<?php echo $pharmacy_pharled->DT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRC"><?php echo $pharmacy_pharled->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $pharmacy_pharled->PRC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRC">
<span<?php echo $pharmacy_pharled->PRC->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_OQ"><?php echo $pharmacy_pharled->OQ->caption() ?></span></td>
		<td data-name="OQ"<?php echo $pharmacy_pharled->OQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OQ">
<span<?php echo $pharmacy_pharled->OQ->viewAttributes() ?>>
<?php echo $pharmacy_pharled->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RQ"><?php echo $pharmacy_pharled->RQ->caption() ?></span></td>
		<td data-name="RQ"<?php echo $pharmacy_pharled->RQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RQ">
<span<?php echo $pharmacy_pharled->RQ->viewAttributes() ?>>
<?php echo $pharmacy_pharled->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MRQ"><?php echo $pharmacy_pharled->MRQ->caption() ?></span></td>
		<td data-name="MRQ"<?php echo $pharmacy_pharled->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MRQ">
<span<?php echo $pharmacy_pharled->MRQ->viewAttributes() ?>>
<?php echo $pharmacy_pharled->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->BILLNO->Visible) { // BILLNO ?>
	<tr id="r_BILLNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLNO"><?php echo $pharmacy_pharled->BILLNO->caption() ?></span></td>
		<td data-name="BILLNO"<?php echo $pharmacy_pharled->BILLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLNO">
<span<?php echo $pharmacy_pharled->BILLNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BILLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->BILLDT->Visible) { // BILLDT ?>
	<tr id="r_BILLDT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLDT"><?php echo $pharmacy_pharled->BILLDT->caption() ?></span></td>
		<td data-name="BILLDT"<?php echo $pharmacy_pharled->BILLDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLDT">
<span<?php echo $pharmacy_pharled->BILLDT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BILLDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->VALUE->Visible) { // VALUE ?>
	<tr id="r_VALUE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_VALUE"><?php echo $pharmacy_pharled->VALUE->caption() ?></span></td>
		<td data-name="VALUE"<?php echo $pharmacy_pharled->VALUE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_VALUE">
<span<?php echo $pharmacy_pharled->VALUE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->VALUE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DISC->Visible) { // DISC ?>
	<tr id="r_DISC">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DISC"><?php echo $pharmacy_pharled->DISC->caption() ?></span></td>
		<td data-name="DISC"<?php echo $pharmacy_pharled->DISC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DISC">
<span<?php echo $pharmacy_pharled->DISC->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TAXP"><?php echo $pharmacy_pharled->TAXP->caption() ?></span></td>
		<td data-name="TAXP"<?php echo $pharmacy_pharled->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAXP">
<span<?php echo $pharmacy_pharled->TAXP->viewAttributes() ?>>
<?php echo $pharmacy_pharled->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->TAX->Visible) { // TAX ?>
	<tr id="r_TAX">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TAX"><?php echo $pharmacy_pharled->TAX->caption() ?></span></td>
		<td data-name="TAX"<?php echo $pharmacy_pharled->TAX->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAX">
<span<?php echo $pharmacy_pharled->TAX->viewAttributes() ?>>
<?php echo $pharmacy_pharled->TAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->TAXR->Visible) { // TAXR ?>
	<tr id="r_TAXR">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TAXR"><?php echo $pharmacy_pharled->TAXR->caption() ?></span></td>
		<td data-name="TAXR"<?php echo $pharmacy_pharled->TAXR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAXR">
<span<?php echo $pharmacy_pharled->TAXR->viewAttributes() ?>>
<?php echo $pharmacy_pharled->TAXR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->EMPNO->Visible) { // EMPNO ?>
	<tr id="r_EMPNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_EMPNO"><?php echo $pharmacy_pharled->EMPNO->caption() ?></span></td>
		<td data-name="EMPNO"<?php echo $pharmacy_pharled->EMPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_EMPNO">
<span<?php echo $pharmacy_pharled->EMPNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->EMPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PC"><?php echo $pharmacy_pharled->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $pharmacy_pharled->PC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PC">
<span<?php echo $pharmacy_pharled->PC->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DRNAME->Visible) { // DRNAME ?>
	<tr id="r_DRNAME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DRNAME"><?php echo $pharmacy_pharled->DRNAME->caption() ?></span></td>
		<td data-name="DRNAME"<?php echo $pharmacy_pharled->DRNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DRNAME">
<span<?php echo $pharmacy_pharled->DRNAME->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->BTIME->Visible) { // BTIME ?>
	<tr id="r_BTIME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BTIME"><?php echo $pharmacy_pharled->BTIME->caption() ?></span></td>
		<td data-name="BTIME"<?php echo $pharmacy_pharled->BTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BTIME">
<span<?php echo $pharmacy_pharled->BTIME->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->ONO->Visible) { // ONO ?>
	<tr id="r_ONO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_ONO"><?php echo $pharmacy_pharled->ONO->caption() ?></span></td>
		<td data-name="ONO"<?php echo $pharmacy_pharled->ONO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_ONO">
<span<?php echo $pharmacy_pharled->ONO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->ONO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->ODT->Visible) { // ODT ?>
	<tr id="r_ODT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_ODT"><?php echo $pharmacy_pharled->ODT->caption() ?></span></td>
		<td data-name="ODT"<?php echo $pharmacy_pharled->ODT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_ODT">
<span<?php echo $pharmacy_pharled->ODT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->ODT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PURRT->Visible) { // PURRT ?>
	<tr id="r_PURRT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PURRT"><?php echo $pharmacy_pharled->PURRT->caption() ?></span></td>
		<td data-name="PURRT"<?php echo $pharmacy_pharled->PURRT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURRT">
<span<?php echo $pharmacy_pharled->PURRT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PURRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->GRP->Visible) { // GRP ?>
	<tr id="r_GRP">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_GRP"><?php echo $pharmacy_pharled->GRP->caption() ?></span></td>
		<td data-name="GRP"<?php echo $pharmacy_pharled->GRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_GRP">
<span<?php echo $pharmacy_pharled->GRP->viewAttributes() ?>>
<?php echo $pharmacy_pharled->GRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->IBATCH->Visible) { // IBATCH ?>
	<tr id="r_IBATCH">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_IBATCH"><?php echo $pharmacy_pharled->IBATCH->caption() ?></span></td>
		<td data-name="IBATCH"<?php echo $pharmacy_pharled->IBATCH->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IBATCH">
<span<?php echo $pharmacy_pharled->IBATCH->viewAttributes() ?>>
<?php echo $pharmacy_pharled->IBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->IPNO->Visible) { // IPNO ?>
	<tr id="r_IPNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_IPNO"><?php echo $pharmacy_pharled->IPNO->caption() ?></span></td>
		<td data-name="IPNO"<?php echo $pharmacy_pharled->IPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IPNO">
<span<?php echo $pharmacy_pharled->IPNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->IPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->OPNO->Visible) { // OPNO ?>
	<tr id="r_OPNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_OPNO"><?php echo $pharmacy_pharled->OPNO->caption() ?></span></td>
		<td data-name="OPNO"<?php echo $pharmacy_pharled->OPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OPNO">
<span<?php echo $pharmacy_pharled->OPNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->OPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->RECID->Visible) { // RECID ?>
	<tr id="r_RECID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RECID"><?php echo $pharmacy_pharled->RECID->caption() ?></span></td>
		<td data-name="RECID"<?php echo $pharmacy_pharled->RECID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RECID">
<span<?php echo $pharmacy_pharled->RECID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->RECID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->FQTY->Visible) { // FQTY ?>
	<tr id="r_FQTY">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_FQTY"><?php echo $pharmacy_pharled->FQTY->caption() ?></span></td>
		<td data-name="FQTY"<?php echo $pharmacy_pharled->FQTY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_FQTY">
<span<?php echo $pharmacy_pharled->FQTY->viewAttributes() ?>>
<?php echo $pharmacy_pharled->FQTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_UR"><?php echo $pharmacy_pharled->UR->caption() ?></span></td>
		<td data-name="UR"<?php echo $pharmacy_pharled->UR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_UR">
<span<?php echo $pharmacy_pharled->UR->viewAttributes() ?>>
<?php echo $pharmacy_pharled->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DCID->Visible) { // DCID ?>
	<tr id="r_DCID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DCID"><?php echo $pharmacy_pharled->DCID->caption() ?></span></td>
		<td data-name="DCID"<?php echo $pharmacy_pharled->DCID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DCID">
<span<?php echo $pharmacy_pharled->DCID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DCID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
	<tr id="r__USERID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled__USERID"><?php echo $pharmacy_pharled->_USERID->caption() ?></span></td>
		<td data-name="_USERID"<?php echo $pharmacy_pharled->_USERID->cellAttributes() ?>>
<span id="el_pharmacy_pharled__USERID">
<span<?php echo $pharmacy_pharled->_USERID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->_USERID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->MODDT->Visible) { // MODDT ?>
	<tr id="r_MODDT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MODDT"><?php echo $pharmacy_pharled->MODDT->caption() ?></span></td>
		<td data-name="MODDT"<?php echo $pharmacy_pharled->MODDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MODDT">
<span<?php echo $pharmacy_pharled->MODDT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->MODDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->FYM->Visible) { // FYM ?>
	<tr id="r_FYM">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_FYM"><?php echo $pharmacy_pharled->FYM->caption() ?></span></td>
		<td data-name="FYM"<?php echo $pharmacy_pharled->FYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_FYM">
<span<?php echo $pharmacy_pharled->FYM->viewAttributes() ?>>
<?php echo $pharmacy_pharled->FYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PRCBATCH->Visible) { // PRCBATCH ?>
	<tr id="r_PRCBATCH">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRCBATCH"><?php echo $pharmacy_pharled->PRCBATCH->caption() ?></span></td>
		<td data-name="PRCBATCH"<?php echo $pharmacy_pharled->PRCBATCH->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRCBATCH">
<span<?php echo $pharmacy_pharled->PRCBATCH->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PRCBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MRP"><?php echo $pharmacy_pharled->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $pharmacy_pharled->MRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MRP">
<span<?php echo $pharmacy_pharled->MRP->viewAttributes() ?>>
<?php echo $pharmacy_pharled->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->BILLYM->Visible) { // BILLYM ?>
	<tr id="r_BILLYM">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLYM"><?php echo $pharmacy_pharled->BILLYM->caption() ?></span></td>
		<td data-name="BILLYM"<?php echo $pharmacy_pharled->BILLYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLYM">
<span<?php echo $pharmacy_pharled->BILLYM->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BILLYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->BILLGRP->Visible) { // BILLGRP ?>
	<tr id="r_BILLGRP">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLGRP"><?php echo $pharmacy_pharled->BILLGRP->caption() ?></span></td>
		<td data-name="BILLGRP"<?php echo $pharmacy_pharled->BILLGRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLGRP">
<span<?php echo $pharmacy_pharled->BILLGRP->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BILLGRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->STAFF->Visible) { // STAFF ?>
	<tr id="r_STAFF">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_STAFF"><?php echo $pharmacy_pharled->STAFF->caption() ?></span></td>
		<td data-name="STAFF"<?php echo $pharmacy_pharled->STAFF->cellAttributes() ?>>
<span id="el_pharmacy_pharled_STAFF">
<span<?php echo $pharmacy_pharled->STAFF->viewAttributes() ?>>
<?php echo $pharmacy_pharled->STAFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<tr id="r_TEMPIPNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TEMPIPNO"><?php echo $pharmacy_pharled->TEMPIPNO->caption() ?></span></td>
		<td data-name="TEMPIPNO"<?php echo $pharmacy_pharled->TEMPIPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TEMPIPNO">
<span<?php echo $pharmacy_pharled->TEMPIPNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PRNTED->Visible) { // PRNTED ?>
	<tr id="r_PRNTED">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRNTED"><?php echo $pharmacy_pharled->PRNTED->caption() ?></span></td>
		<td data-name="PRNTED"<?php echo $pharmacy_pharled->PRNTED->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRNTED">
<span<?php echo $pharmacy_pharled->PRNTED->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PRNTED->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PATNAME->Visible) { // PATNAME ?>
	<tr id="r_PATNAME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PATNAME"><?php echo $pharmacy_pharled->PATNAME->caption() ?></span></td>
		<td data-name="PATNAME"<?php echo $pharmacy_pharled->PATNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PATNAME">
<span<?php echo $pharmacy_pharled->PATNAME->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PATNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PJVNO->Visible) { // PJVNO ?>
	<tr id="r_PJVNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PJVNO"><?php echo $pharmacy_pharled->PJVNO->caption() ?></span></td>
		<td data-name="PJVNO"<?php echo $pharmacy_pharled->PJVNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVNO">
<span<?php echo $pharmacy_pharled->PJVNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PJVNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PJVSLNO->Visible) { // PJVSLNO ?>
	<tr id="r_PJVSLNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PJVSLNO"><?php echo $pharmacy_pharled->PJVSLNO->caption() ?></span></td>
		<td data-name="PJVSLNO"<?php echo $pharmacy_pharled->PJVSLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVSLNO">
<span<?php echo $pharmacy_pharled->PJVSLNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PJVSLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->OTHDISC->Visible) { // OTHDISC ?>
	<tr id="r_OTHDISC">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_OTHDISC"><?php echo $pharmacy_pharled->OTHDISC->caption() ?></span></td>
		<td data-name="OTHDISC"<?php echo $pharmacy_pharled->OTHDISC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OTHDISC">
<span<?php echo $pharmacy_pharled->OTHDISC->viewAttributes() ?>>
<?php echo $pharmacy_pharled->OTHDISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PJVYM->Visible) { // PJVYM ?>
	<tr id="r_PJVYM">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PJVYM"><?php echo $pharmacy_pharled->PJVYM->caption() ?></span></td>
		<td data-name="PJVYM"<?php echo $pharmacy_pharled->PJVYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVYM">
<span<?php echo $pharmacy_pharled->PJVYM->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PJVYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PURDISCPER->Visible) { // PURDISCPER ?>
	<tr id="r_PURDISCPER">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PURDISCPER"><?php echo $pharmacy_pharled->PURDISCPER->caption() ?></span></td>
		<td data-name="PURDISCPER"<?php echo $pharmacy_pharled->PURDISCPER->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURDISCPER">
<span<?php echo $pharmacy_pharled->PURDISCPER->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PURDISCPER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->CASHIER->Visible) { // CASHIER ?>
	<tr id="r_CASHIER">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHIER"><?php echo $pharmacy_pharled->CASHIER->caption() ?></span></td>
		<td data-name="CASHIER"<?php echo $pharmacy_pharled->CASHIER->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHIER">
<span<?php echo $pharmacy_pharled->CASHIER->viewAttributes() ?>>
<?php echo $pharmacy_pharled->CASHIER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->CASHTIME->Visible) { // CASHTIME ?>
	<tr id="r_CASHTIME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHTIME"><?php echo $pharmacy_pharled->CASHTIME->caption() ?></span></td>
		<td data-name="CASHTIME"<?php echo $pharmacy_pharled->CASHTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHTIME">
<span<?php echo $pharmacy_pharled->CASHTIME->viewAttributes() ?>>
<?php echo $pharmacy_pharled->CASHTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->CASHRECD->Visible) { // CASHRECD ?>
	<tr id="r_CASHRECD">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHRECD"><?php echo $pharmacy_pharled->CASHRECD->caption() ?></span></td>
		<td data-name="CASHRECD"<?php echo $pharmacy_pharled->CASHRECD->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHRECD">
<span<?php echo $pharmacy_pharled->CASHRECD->viewAttributes() ?>>
<?php echo $pharmacy_pharled->CASHRECD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->CASHREFNO->Visible) { // CASHREFNO ?>
	<tr id="r_CASHREFNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHREFNO"><?php echo $pharmacy_pharled->CASHREFNO->caption() ?></span></td>
		<td data-name="CASHREFNO"<?php echo $pharmacy_pharled->CASHREFNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHREFNO">
<span<?php echo $pharmacy_pharled->CASHREFNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->CASHREFNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<tr id="r_CASHIERSHIFT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHIERSHIFT"><?php echo $pharmacy_pharled->CASHIERSHIFT->caption() ?></span></td>
		<td data-name="CASHIERSHIFT"<?php echo $pharmacy_pharled->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHIERSHIFT">
<span<?php echo $pharmacy_pharled->CASHIERSHIFT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRCODE"><?php echo $pharmacy_pharled->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE"<?php echo $pharmacy_pharled->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRCODE">
<span<?php echo $pharmacy_pharled->PRCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->RELEASEBY->Visible) { // RELEASEBY ?>
	<tr id="r_RELEASEBY">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RELEASEBY"><?php echo $pharmacy_pharled->RELEASEBY->caption() ?></span></td>
		<td data-name="RELEASEBY"<?php echo $pharmacy_pharled->RELEASEBY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RELEASEBY">
<span<?php echo $pharmacy_pharled->RELEASEBY->viewAttributes() ?>>
<?php echo $pharmacy_pharled->RELEASEBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<tr id="r_CRAUTHOR">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CRAUTHOR"><?php echo $pharmacy_pharled->CRAUTHOR->caption() ?></span></td>
		<td data-name="CRAUTHOR"<?php echo $pharmacy_pharled->CRAUTHOR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CRAUTHOR">
<span<?php echo $pharmacy_pharled->CRAUTHOR->viewAttributes() ?>>
<?php echo $pharmacy_pharled->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PAYMENT->Visible) { // PAYMENT ?>
	<tr id="r_PAYMENT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PAYMENT"><?php echo $pharmacy_pharled->PAYMENT->caption() ?></span></td>
		<td data-name="PAYMENT"<?php echo $pharmacy_pharled->PAYMENT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PAYMENT">
<span<?php echo $pharmacy_pharled->PAYMENT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PAYMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DRID->Visible) { // DRID ?>
	<tr id="r_DRID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DRID"><?php echo $pharmacy_pharled->DRID->caption() ?></span></td>
		<td data-name="DRID"<?php echo $pharmacy_pharled->DRID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DRID">
<span<?php echo $pharmacy_pharled->DRID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DRID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->WARD->Visible) { // WARD ?>
	<tr id="r_WARD">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_WARD"><?php echo $pharmacy_pharled->WARD->caption() ?></span></td>
		<td data-name="WARD"<?php echo $pharmacy_pharled->WARD->cellAttributes() ?>>
<span id="el_pharmacy_pharled_WARD">
<span<?php echo $pharmacy_pharled->WARD->viewAttributes() ?>>
<?php echo $pharmacy_pharled->WARD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->STAXTYPE->Visible) { // STAXTYPE ?>
	<tr id="r_STAXTYPE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_STAXTYPE"><?php echo $pharmacy_pharled->STAXTYPE->caption() ?></span></td>
		<td data-name="STAXTYPE"<?php echo $pharmacy_pharled->STAXTYPE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_STAXTYPE">
<span<?php echo $pharmacy_pharled->STAXTYPE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->STAXTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<tr id="r_PURDISCVAL">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PURDISCVAL"><?php echo $pharmacy_pharled->PURDISCVAL->caption() ?></span></td>
		<td data-name="PURDISCVAL"<?php echo $pharmacy_pharled->PURDISCVAL->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURDISCVAL">
<span<?php echo $pharmacy_pharled->PURDISCVAL->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->RNDOFF->Visible) { // RNDOFF ?>
	<tr id="r_RNDOFF">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RNDOFF"><?php echo $pharmacy_pharled->RNDOFF->caption() ?></span></td>
		<td data-name="RNDOFF"<?php echo $pharmacy_pharled->RNDOFF->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RNDOFF">
<span<?php echo $pharmacy_pharled->RNDOFF->viewAttributes() ?>>
<?php echo $pharmacy_pharled->RNDOFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DISCONMRP->Visible) { // DISCONMRP ?>
	<tr id="r_DISCONMRP">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DISCONMRP"><?php echo $pharmacy_pharled->DISCONMRP->caption() ?></span></td>
		<td data-name="DISCONMRP"<?php echo $pharmacy_pharled->DISCONMRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DISCONMRP">
<span<?php echo $pharmacy_pharled->DISCONMRP->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DISCONMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DELVDT->Visible) { // DELVDT ?>
	<tr id="r_DELVDT">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DELVDT"><?php echo $pharmacy_pharled->DELVDT->caption() ?></span></td>
		<td data-name="DELVDT"<?php echo $pharmacy_pharled->DELVDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVDT">
<span<?php echo $pharmacy_pharled->DELVDT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DELVDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DELVTIME->Visible) { // DELVTIME ?>
	<tr id="r_DELVTIME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DELVTIME"><?php echo $pharmacy_pharled->DELVTIME->caption() ?></span></td>
		<td data-name="DELVTIME"<?php echo $pharmacy_pharled->DELVTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVTIME">
<span<?php echo $pharmacy_pharled->DELVTIME->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DELVTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->DELVBY->Visible) { // DELVBY ?>
	<tr id="r_DELVBY">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DELVBY"><?php echo $pharmacy_pharled->DELVBY->caption() ?></span></td>
		<td data-name="DELVBY"<?php echo $pharmacy_pharled->DELVBY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVBY">
<span<?php echo $pharmacy_pharled->DELVBY->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DELVBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->HOSPNO->Visible) { // HOSPNO ?>
	<tr id="r_HOSPNO">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_HOSPNO"><?php echo $pharmacy_pharled->HOSPNO->caption() ?></span></td>
		<td data-name="HOSPNO"<?php echo $pharmacy_pharled->HOSPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_HOSPNO">
<span<?php echo $pharmacy_pharled->HOSPNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HOSPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_id"><?php echo $pharmacy_pharled->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_pharled->id->cellAttributes() ?>>
<span id="el_pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled->id->viewAttributes() ?>>
<?php echo $pharmacy_pharled->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->pbv->Visible) { // pbv ?>
	<tr id="r_pbv">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_pbv"><?php echo $pharmacy_pharled->pbv->caption() ?></span></td>
		<td data-name="pbv"<?php echo $pharmacy_pharled->pbv->cellAttributes() ?>>
<span id="el_pharmacy_pharled_pbv">
<span<?php echo $pharmacy_pharled->pbv->viewAttributes() ?>>
<?php echo $pharmacy_pharled->pbv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->pbt->Visible) { // pbt ?>
	<tr id="r_pbt">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_pbt"><?php echo $pharmacy_pharled->pbt->caption() ?></span></td>
		<td data-name="pbt"<?php echo $pharmacy_pharled->pbt->cellAttributes() ?>>
<span id="el_pharmacy_pharled_pbt">
<span<?php echo $pharmacy_pharled->pbt->viewAttributes() ?>>
<?php echo $pharmacy_pharled->pbt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
	<tr id="r_HosoID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_HosoID"><?php echo $pharmacy_pharled->HosoID->caption() ?></span></td>
		<td data-name="HosoID"<?php echo $pharmacy_pharled->HosoID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_HosoID">
<span<?php echo $pharmacy_pharled->HosoID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HosoID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_createdby"><?php echo $pharmacy_pharled->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $pharmacy_pharled->createdby->cellAttributes() ?>>
<span id="el_pharmacy_pharled_createdby">
<span<?php echo $pharmacy_pharled->createdby->viewAttributes() ?>>
<?php echo $pharmacy_pharled->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_createddatetime"><?php echo $pharmacy_pharled->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $pharmacy_pharled->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_pharled_createddatetime">
<span<?php echo $pharmacy_pharled->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_pharled->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_modifiedby"><?php echo $pharmacy_pharled->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $pharmacy_pharled->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_pharled_modifiedby">
<span<?php echo $pharmacy_pharled->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_pharled->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_modifieddatetime"><?php echo $pharmacy_pharled->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $pharmacy_pharled->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_pharled_modifieddatetime">
<span<?php echo $pharmacy_pharled->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_pharled->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MFRCODE"><?php echo $pharmacy_pharled->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $pharmacy_pharled->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MFRCODE">
<span<?php echo $pharmacy_pharled->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_Reception"><?php echo $pharmacy_pharled->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $pharmacy_pharled->Reception->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Reception">
<span<?php echo $pharmacy_pharled->Reception->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PatID"><?php echo $pharmacy_pharled->PatID->caption() ?></span></td>
		<td data-name="PatID"<?php echo $pharmacy_pharled->PatID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PatID">
<span<?php echo $pharmacy_pharled->PatID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_mrnno"><?php echo $pharmacy_pharled->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $pharmacy_pharled->mrnno->cellAttributes() ?>>
<span id="el_pharmacy_pharled_mrnno">
<span<?php echo $pharmacy_pharled->mrnno->viewAttributes() ?>>
<?php echo $pharmacy_pharled->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
	<tr id="r_BRNAME">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BRNAME"><?php echo $pharmacy_pharled->BRNAME->caption() ?></span></td>
		<td data-name="BRNAME"<?php echo $pharmacy_pharled->BRNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BRNAME">
<span<?php echo $pharmacy_pharled->BRNAME->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->sretid->Visible) { // sretid ?>
	<tr id="r_sretid">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_sretid"><?php echo $pharmacy_pharled->sretid->caption() ?></span></td>
		<td data-name="sretid"<?php echo $pharmacy_pharled->sretid->cellAttributes() ?>>
<span id="el_pharmacy_pharled_sretid">
<span<?php echo $pharmacy_pharled->sretid->viewAttributes() ?>>
<?php echo $pharmacy_pharled->sretid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->sprid->Visible) { // sprid ?>
	<tr id="r_sprid">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_sprid"><?php echo $pharmacy_pharled->sprid->caption() ?></span></td>
		<td data-name="sprid"<?php echo $pharmacy_pharled->sprid->cellAttributes() ?>>
<span id="el_pharmacy_pharled_sprid">
<span<?php echo $pharmacy_pharled->sprid->viewAttributes() ?>>
<?php echo $pharmacy_pharled->sprid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
	<tr id="r_baid">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_baid"><?php echo $pharmacy_pharled->baid->caption() ?></span></td>
		<td data-name="baid"<?php echo $pharmacy_pharled->baid->cellAttributes() ?>>
<span id="el_pharmacy_pharled_baid">
<span<?php echo $pharmacy_pharled->baid->viewAttributes() ?>>
<?php echo $pharmacy_pharled->baid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
	<tr id="r_isdate">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_isdate"><?php echo $pharmacy_pharled->isdate->caption() ?></span></td>
		<td data-name="isdate"<?php echo $pharmacy_pharled->isdate->cellAttributes() ?>>
<span id="el_pharmacy_pharled_isdate">
<span<?php echo $pharmacy_pharled->isdate->viewAttributes() ?>>
<?php echo $pharmacy_pharled->isdate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PSGST"><?php echo $pharmacy_pharled->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $pharmacy_pharled->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PSGST">
<span<?php echo $pharmacy_pharled->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PCGST"><?php echo $pharmacy_pharled->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $pharmacy_pharled->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PCGST">
<span<?php echo $pharmacy_pharled->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SSGST"><?php echo $pharmacy_pharled->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $pharmacy_pharled->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SSGST">
<span<?php echo $pharmacy_pharled->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SCGST"><?php echo $pharmacy_pharled->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $pharmacy_pharled->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SCGST">
<span<?php echo $pharmacy_pharled->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PurValue"><?php echo $pharmacy_pharled->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $pharmacy_pharled->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PurValue">
<span<?php echo $pharmacy_pharled->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
	<tr id="r_PurRate">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PurRate"><?php echo $pharmacy_pharled->PurRate->caption() ?></span></td>
		<td data-name="PurRate"<?php echo $pharmacy_pharled->PurRate->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PurRate">
<span<?php echo $pharmacy_pharled->PurRate->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PurRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PUnit"><?php echo $pharmacy_pharled->PUnit->caption() ?></span></td>
		<td data-name="PUnit"<?php echo $pharmacy_pharled->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PUnit">
<span<?php echo $pharmacy_pharled->PUnit->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SUnit"><?php echo $pharmacy_pharled->SUnit->caption() ?></span></td>
		<td data-name="SUnit"<?php echo $pharmacy_pharled->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SUnit">
<span<?php echo $pharmacy_pharled->SUnit->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
	<tr id="r_HSNCODE">
		<td class="<?php echo $pharmacy_pharled_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_HSNCODE"><?php echo $pharmacy_pharled->HSNCODE->caption() ?></span></td>
		<td data-name="HSNCODE"<?php echo $pharmacy_pharled->HSNCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_HSNCODE">
<span<?php echo $pharmacy_pharled->HSNCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HSNCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_pharled_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_pharled->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_pharled_view->terminate();
?>