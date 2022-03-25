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
<?php include_once "header.php" ?>
<?php if (!$store_storeled->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fstore_storeledview = currentForm = new ew.Form("fstore_storeledview", "view");

// Form_CustomValidate event
fstore_storeledview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_storeledview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$store_storeled->isExport()) { ?>
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
<?php if ($store_storeled_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_storeled_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storeled">
<input type="hidden" name="modal" value="<?php echo (int)$store_storeled_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_storeled->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BRCODE"><?php echo $store_storeled->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $store_storeled->BRCODE->cellAttributes() ?>>
<span id="el_store_storeled_BRCODE">
<span<?php echo $store_storeled->BRCODE->viewAttributes() ?>>
<?php echo $store_storeled->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->TYPE->Visible) { // TYPE ?>
	<tr id="r_TYPE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_TYPE"><?php echo $store_storeled->TYPE->caption() ?></span></td>
		<td data-name="TYPE"<?php echo $store_storeled->TYPE->cellAttributes() ?>>
<span id="el_store_storeled_TYPE">
<span<?php echo $store_storeled->TYPE->viewAttributes() ?>>
<?php echo $store_storeled->TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DN->Visible) { // DN ?>
	<tr id="r_DN">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DN"><?php echo $store_storeled->DN->caption() ?></span></td>
		<td data-name="DN"<?php echo $store_storeled->DN->cellAttributes() ?>>
<span id="el_store_storeled_DN">
<span<?php echo $store_storeled->DN->viewAttributes() ?>>
<?php echo $store_storeled->DN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->RDN->Visible) { // RDN ?>
	<tr id="r_RDN">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RDN"><?php echo $store_storeled->RDN->caption() ?></span></td>
		<td data-name="RDN"<?php echo $store_storeled->RDN->cellAttributes() ?>>
<span id="el_store_storeled_RDN">
<span<?php echo $store_storeled->RDN->viewAttributes() ?>>
<?php echo $store_storeled->RDN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DT"><?php echo $store_storeled->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $store_storeled->DT->cellAttributes() ?>>
<span id="el_store_storeled_DT">
<span<?php echo $store_storeled->DT->viewAttributes() ?>>
<?php echo $store_storeled->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PRC"><?php echo $store_storeled->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $store_storeled->PRC->cellAttributes() ?>>
<span id="el_store_storeled_PRC">
<span<?php echo $store_storeled->PRC->viewAttributes() ?>>
<?php echo $store_storeled->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_OQ"><?php echo $store_storeled->OQ->caption() ?></span></td>
		<td data-name="OQ"<?php echo $store_storeled->OQ->cellAttributes() ?>>
<span id="el_store_storeled_OQ">
<span<?php echo $store_storeled->OQ->viewAttributes() ?>>
<?php echo $store_storeled->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RQ"><?php echo $store_storeled->RQ->caption() ?></span></td>
		<td data-name="RQ"<?php echo $store_storeled->RQ->cellAttributes() ?>>
<span id="el_store_storeled_RQ">
<span<?php echo $store_storeled->RQ->viewAttributes() ?>>
<?php echo $store_storeled->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_MRQ"><?php echo $store_storeled->MRQ->caption() ?></span></td>
		<td data-name="MRQ"<?php echo $store_storeled->MRQ->cellAttributes() ?>>
<span id="el_store_storeled_MRQ">
<span<?php echo $store_storeled->MRQ->viewAttributes() ?>>
<?php echo $store_storeled->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_IQ"><?php echo $store_storeled->IQ->caption() ?></span></td>
		<td data-name="IQ"<?php echo $store_storeled->IQ->cellAttributes() ?>>
<span id="el_store_storeled_IQ">
<span<?php echo $store_storeled->IQ->viewAttributes() ?>>
<?php echo $store_storeled->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BATCHNO"><?php echo $store_storeled->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO"<?php echo $store_storeled->BATCHNO->cellAttributes() ?>>
<span id="el_store_storeled_BATCHNO">
<span<?php echo $store_storeled->BATCHNO->viewAttributes() ?>>
<?php echo $store_storeled->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_EXPDT"><?php echo $store_storeled->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT"<?php echo $store_storeled->EXPDT->cellAttributes() ?>>
<span id="el_store_storeled_EXPDT">
<span<?php echo $store_storeled->EXPDT->viewAttributes() ?>>
<?php echo $store_storeled->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->BILLNO->Visible) { // BILLNO ?>
	<tr id="r_BILLNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BILLNO"><?php echo $store_storeled->BILLNO->caption() ?></span></td>
		<td data-name="BILLNO"<?php echo $store_storeled->BILLNO->cellAttributes() ?>>
<span id="el_store_storeled_BILLNO">
<span<?php echo $store_storeled->BILLNO->viewAttributes() ?>>
<?php echo $store_storeled->BILLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->BILLDT->Visible) { // BILLDT ?>
	<tr id="r_BILLDT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BILLDT"><?php echo $store_storeled->BILLDT->caption() ?></span></td>
		<td data-name="BILLDT"<?php echo $store_storeled->BILLDT->cellAttributes() ?>>
<span id="el_store_storeled_BILLDT">
<span<?php echo $store_storeled->BILLDT->viewAttributes() ?>>
<?php echo $store_storeled->BILLDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RT"><?php echo $store_storeled->RT->caption() ?></span></td>
		<td data-name="RT"<?php echo $store_storeled->RT->cellAttributes() ?>>
<span id="el_store_storeled_RT">
<span<?php echo $store_storeled->RT->viewAttributes() ?>>
<?php echo $store_storeled->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->VALUE->Visible) { // VALUE ?>
	<tr id="r_VALUE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_VALUE"><?php echo $store_storeled->VALUE->caption() ?></span></td>
		<td data-name="VALUE"<?php echo $store_storeled->VALUE->cellAttributes() ?>>
<span id="el_store_storeled_VALUE">
<span<?php echo $store_storeled->VALUE->viewAttributes() ?>>
<?php echo $store_storeled->VALUE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DISC->Visible) { // DISC ?>
	<tr id="r_DISC">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DISC"><?php echo $store_storeled->DISC->caption() ?></span></td>
		<td data-name="DISC"<?php echo $store_storeled->DISC->cellAttributes() ?>>
<span id="el_store_storeled_DISC">
<span<?php echo $store_storeled->DISC->viewAttributes() ?>>
<?php echo $store_storeled->DISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_TAXP"><?php echo $store_storeled->TAXP->caption() ?></span></td>
		<td data-name="TAXP"<?php echo $store_storeled->TAXP->cellAttributes() ?>>
<span id="el_store_storeled_TAXP">
<span<?php echo $store_storeled->TAXP->viewAttributes() ?>>
<?php echo $store_storeled->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->TAX->Visible) { // TAX ?>
	<tr id="r_TAX">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_TAX"><?php echo $store_storeled->TAX->caption() ?></span></td>
		<td data-name="TAX"<?php echo $store_storeled->TAX->cellAttributes() ?>>
<span id="el_store_storeled_TAX">
<span<?php echo $store_storeled->TAX->viewAttributes() ?>>
<?php echo $store_storeled->TAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->TAXR->Visible) { // TAXR ?>
	<tr id="r_TAXR">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_TAXR"><?php echo $store_storeled->TAXR->caption() ?></span></td>
		<td data-name="TAXR"<?php echo $store_storeled->TAXR->cellAttributes() ?>>
<span id="el_store_storeled_TAXR">
<span<?php echo $store_storeled->TAXR->viewAttributes() ?>>
<?php echo $store_storeled->TAXR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DAMT->Visible) { // DAMT ?>
	<tr id="r_DAMT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DAMT"><?php echo $store_storeled->DAMT->caption() ?></span></td>
		<td data-name="DAMT"<?php echo $store_storeled->DAMT->cellAttributes() ?>>
<span id="el_store_storeled_DAMT">
<span<?php echo $store_storeled->DAMT->viewAttributes() ?>>
<?php echo $store_storeled->DAMT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->EMPNO->Visible) { // EMPNO ?>
	<tr id="r_EMPNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_EMPNO"><?php echo $store_storeled->EMPNO->caption() ?></span></td>
		<td data-name="EMPNO"<?php echo $store_storeled->EMPNO->cellAttributes() ?>>
<span id="el_store_storeled_EMPNO">
<span<?php echo $store_storeled->EMPNO->viewAttributes() ?>>
<?php echo $store_storeled->EMPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PC"><?php echo $store_storeled->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $store_storeled->PC->cellAttributes() ?>>
<span id="el_store_storeled_PC">
<span<?php echo $store_storeled->PC->viewAttributes() ?>>
<?php echo $store_storeled->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DRNAME->Visible) { // DRNAME ?>
	<tr id="r_DRNAME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DRNAME"><?php echo $store_storeled->DRNAME->caption() ?></span></td>
		<td data-name="DRNAME"<?php echo $store_storeled->DRNAME->cellAttributes() ?>>
<span id="el_store_storeled_DRNAME">
<span<?php echo $store_storeled->DRNAME->viewAttributes() ?>>
<?php echo $store_storeled->DRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->BTIME->Visible) { // BTIME ?>
	<tr id="r_BTIME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BTIME"><?php echo $store_storeled->BTIME->caption() ?></span></td>
		<td data-name="BTIME"<?php echo $store_storeled->BTIME->cellAttributes() ?>>
<span id="el_store_storeled_BTIME">
<span<?php echo $store_storeled->BTIME->viewAttributes() ?>>
<?php echo $store_storeled->BTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->ONO->Visible) { // ONO ?>
	<tr id="r_ONO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_ONO"><?php echo $store_storeled->ONO->caption() ?></span></td>
		<td data-name="ONO"<?php echo $store_storeled->ONO->cellAttributes() ?>>
<span id="el_store_storeled_ONO">
<span<?php echo $store_storeled->ONO->viewAttributes() ?>>
<?php echo $store_storeled->ONO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->ODT->Visible) { // ODT ?>
	<tr id="r_ODT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_ODT"><?php echo $store_storeled->ODT->caption() ?></span></td>
		<td data-name="ODT"<?php echo $store_storeled->ODT->cellAttributes() ?>>
<span id="el_store_storeled_ODT">
<span<?php echo $store_storeled->ODT->viewAttributes() ?>>
<?php echo $store_storeled->ODT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PURRT->Visible) { // PURRT ?>
	<tr id="r_PURRT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PURRT"><?php echo $store_storeled->PURRT->caption() ?></span></td>
		<td data-name="PURRT"<?php echo $store_storeled->PURRT->cellAttributes() ?>>
<span id="el_store_storeled_PURRT">
<span<?php echo $store_storeled->PURRT->viewAttributes() ?>>
<?php echo $store_storeled->PURRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->GRP->Visible) { // GRP ?>
	<tr id="r_GRP">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_GRP"><?php echo $store_storeled->GRP->caption() ?></span></td>
		<td data-name="GRP"<?php echo $store_storeled->GRP->cellAttributes() ?>>
<span id="el_store_storeled_GRP">
<span<?php echo $store_storeled->GRP->viewAttributes() ?>>
<?php echo $store_storeled->GRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->IBATCH->Visible) { // IBATCH ?>
	<tr id="r_IBATCH">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_IBATCH"><?php echo $store_storeled->IBATCH->caption() ?></span></td>
		<td data-name="IBATCH"<?php echo $store_storeled->IBATCH->cellAttributes() ?>>
<span id="el_store_storeled_IBATCH">
<span<?php echo $store_storeled->IBATCH->viewAttributes() ?>>
<?php echo $store_storeled->IBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->IPNO->Visible) { // IPNO ?>
	<tr id="r_IPNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_IPNO"><?php echo $store_storeled->IPNO->caption() ?></span></td>
		<td data-name="IPNO"<?php echo $store_storeled->IPNO->cellAttributes() ?>>
<span id="el_store_storeled_IPNO">
<span<?php echo $store_storeled->IPNO->viewAttributes() ?>>
<?php echo $store_storeled->IPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->OPNO->Visible) { // OPNO ?>
	<tr id="r_OPNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_OPNO"><?php echo $store_storeled->OPNO->caption() ?></span></td>
		<td data-name="OPNO"<?php echo $store_storeled->OPNO->cellAttributes() ?>>
<span id="el_store_storeled_OPNO">
<span<?php echo $store_storeled->OPNO->viewAttributes() ?>>
<?php echo $store_storeled->OPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->RECID->Visible) { // RECID ?>
	<tr id="r_RECID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RECID"><?php echo $store_storeled->RECID->caption() ?></span></td>
		<td data-name="RECID"<?php echo $store_storeled->RECID->cellAttributes() ?>>
<span id="el_store_storeled_RECID">
<span<?php echo $store_storeled->RECID->viewAttributes() ?>>
<?php echo $store_storeled->RECID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->FQTY->Visible) { // FQTY ?>
	<tr id="r_FQTY">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_FQTY"><?php echo $store_storeled->FQTY->caption() ?></span></td>
		<td data-name="FQTY"<?php echo $store_storeled->FQTY->cellAttributes() ?>>
<span id="el_store_storeled_FQTY">
<span<?php echo $store_storeled->FQTY->viewAttributes() ?>>
<?php echo $store_storeled->FQTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_UR"><?php echo $store_storeled->UR->caption() ?></span></td>
		<td data-name="UR"<?php echo $store_storeled->UR->cellAttributes() ?>>
<span id="el_store_storeled_UR">
<span<?php echo $store_storeled->UR->viewAttributes() ?>>
<?php echo $store_storeled->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DCID->Visible) { // DCID ?>
	<tr id="r_DCID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DCID"><?php echo $store_storeled->DCID->caption() ?></span></td>
		<td data-name="DCID"<?php echo $store_storeled->DCID->cellAttributes() ?>>
<span id="el_store_storeled_DCID">
<span<?php echo $store_storeled->DCID->viewAttributes() ?>>
<?php echo $store_storeled->DCID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->_USERID->Visible) { // USERID ?>
	<tr id="r__USERID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled__USERID"><?php echo $store_storeled->_USERID->caption() ?></span></td>
		<td data-name="_USERID"<?php echo $store_storeled->_USERID->cellAttributes() ?>>
<span id="el_store_storeled__USERID">
<span<?php echo $store_storeled->_USERID->viewAttributes() ?>>
<?php echo $store_storeled->_USERID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->MODDT->Visible) { // MODDT ?>
	<tr id="r_MODDT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_MODDT"><?php echo $store_storeled->MODDT->caption() ?></span></td>
		<td data-name="MODDT"<?php echo $store_storeled->MODDT->cellAttributes() ?>>
<span id="el_store_storeled_MODDT">
<span<?php echo $store_storeled->MODDT->viewAttributes() ?>>
<?php echo $store_storeled->MODDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->FYM->Visible) { // FYM ?>
	<tr id="r_FYM">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_FYM"><?php echo $store_storeled->FYM->caption() ?></span></td>
		<td data-name="FYM"<?php echo $store_storeled->FYM->cellAttributes() ?>>
<span id="el_store_storeled_FYM">
<span<?php echo $store_storeled->FYM->viewAttributes() ?>>
<?php echo $store_storeled->FYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PRCBATCH->Visible) { // PRCBATCH ?>
	<tr id="r_PRCBATCH">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PRCBATCH"><?php echo $store_storeled->PRCBATCH->caption() ?></span></td>
		<td data-name="PRCBATCH"<?php echo $store_storeled->PRCBATCH->cellAttributes() ?>>
<span id="el_store_storeled_PRCBATCH">
<span<?php echo $store_storeled->PRCBATCH->viewAttributes() ?>>
<?php echo $store_storeled->PRCBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->SLNO->Visible) { // SLNO ?>
	<tr id="r_SLNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_SLNO"><?php echo $store_storeled->SLNO->caption() ?></span></td>
		<td data-name="SLNO"<?php echo $store_storeled->SLNO->cellAttributes() ?>>
<span id="el_store_storeled_SLNO">
<span<?php echo $store_storeled->SLNO->viewAttributes() ?>>
<?php echo $store_storeled->SLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_MRP"><?php echo $store_storeled->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $store_storeled->MRP->cellAttributes() ?>>
<span id="el_store_storeled_MRP">
<span<?php echo $store_storeled->MRP->viewAttributes() ?>>
<?php echo $store_storeled->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->BILLYM->Visible) { // BILLYM ?>
	<tr id="r_BILLYM">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BILLYM"><?php echo $store_storeled->BILLYM->caption() ?></span></td>
		<td data-name="BILLYM"<?php echo $store_storeled->BILLYM->cellAttributes() ?>>
<span id="el_store_storeled_BILLYM">
<span<?php echo $store_storeled->BILLYM->viewAttributes() ?>>
<?php echo $store_storeled->BILLYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->BILLGRP->Visible) { // BILLGRP ?>
	<tr id="r_BILLGRP">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BILLGRP"><?php echo $store_storeled->BILLGRP->caption() ?></span></td>
		<td data-name="BILLGRP"<?php echo $store_storeled->BILLGRP->cellAttributes() ?>>
<span id="el_store_storeled_BILLGRP">
<span<?php echo $store_storeled->BILLGRP->viewAttributes() ?>>
<?php echo $store_storeled->BILLGRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->STAFF->Visible) { // STAFF ?>
	<tr id="r_STAFF">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_STAFF"><?php echo $store_storeled->STAFF->caption() ?></span></td>
		<td data-name="STAFF"<?php echo $store_storeled->STAFF->cellAttributes() ?>>
<span id="el_store_storeled_STAFF">
<span<?php echo $store_storeled->STAFF->viewAttributes() ?>>
<?php echo $store_storeled->STAFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<tr id="r_TEMPIPNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_TEMPIPNO"><?php echo $store_storeled->TEMPIPNO->caption() ?></span></td>
		<td data-name="TEMPIPNO"<?php echo $store_storeled->TEMPIPNO->cellAttributes() ?>>
<span id="el_store_storeled_TEMPIPNO">
<span<?php echo $store_storeled->TEMPIPNO->viewAttributes() ?>>
<?php echo $store_storeled->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PRNTED->Visible) { // PRNTED ?>
	<tr id="r_PRNTED">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PRNTED"><?php echo $store_storeled->PRNTED->caption() ?></span></td>
		<td data-name="PRNTED"<?php echo $store_storeled->PRNTED->cellAttributes() ?>>
<span id="el_store_storeled_PRNTED">
<span<?php echo $store_storeled->PRNTED->viewAttributes() ?>>
<?php echo $store_storeled->PRNTED->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PATNAME->Visible) { // PATNAME ?>
	<tr id="r_PATNAME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PATNAME"><?php echo $store_storeled->PATNAME->caption() ?></span></td>
		<td data-name="PATNAME"<?php echo $store_storeled->PATNAME->cellAttributes() ?>>
<span id="el_store_storeled_PATNAME">
<span<?php echo $store_storeled->PATNAME->viewAttributes() ?>>
<?php echo $store_storeled->PATNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PJVNO->Visible) { // PJVNO ?>
	<tr id="r_PJVNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PJVNO"><?php echo $store_storeled->PJVNO->caption() ?></span></td>
		<td data-name="PJVNO"<?php echo $store_storeled->PJVNO->cellAttributes() ?>>
<span id="el_store_storeled_PJVNO">
<span<?php echo $store_storeled->PJVNO->viewAttributes() ?>>
<?php echo $store_storeled->PJVNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PJVSLNO->Visible) { // PJVSLNO ?>
	<tr id="r_PJVSLNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PJVSLNO"><?php echo $store_storeled->PJVSLNO->caption() ?></span></td>
		<td data-name="PJVSLNO"<?php echo $store_storeled->PJVSLNO->cellAttributes() ?>>
<span id="el_store_storeled_PJVSLNO">
<span<?php echo $store_storeled->PJVSLNO->viewAttributes() ?>>
<?php echo $store_storeled->PJVSLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->OTHDISC->Visible) { // OTHDISC ?>
	<tr id="r_OTHDISC">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_OTHDISC"><?php echo $store_storeled->OTHDISC->caption() ?></span></td>
		<td data-name="OTHDISC"<?php echo $store_storeled->OTHDISC->cellAttributes() ?>>
<span id="el_store_storeled_OTHDISC">
<span<?php echo $store_storeled->OTHDISC->viewAttributes() ?>>
<?php echo $store_storeled->OTHDISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PJVYM->Visible) { // PJVYM ?>
	<tr id="r_PJVYM">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PJVYM"><?php echo $store_storeled->PJVYM->caption() ?></span></td>
		<td data-name="PJVYM"<?php echo $store_storeled->PJVYM->cellAttributes() ?>>
<span id="el_store_storeled_PJVYM">
<span<?php echo $store_storeled->PJVYM->viewAttributes() ?>>
<?php echo $store_storeled->PJVYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PURDISCPER->Visible) { // PURDISCPER ?>
	<tr id="r_PURDISCPER">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PURDISCPER"><?php echo $store_storeled->PURDISCPER->caption() ?></span></td>
		<td data-name="PURDISCPER"<?php echo $store_storeled->PURDISCPER->cellAttributes() ?>>
<span id="el_store_storeled_PURDISCPER">
<span<?php echo $store_storeled->PURDISCPER->viewAttributes() ?>>
<?php echo $store_storeled->PURDISCPER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->CASHIER->Visible) { // CASHIER ?>
	<tr id="r_CASHIER">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CASHIER"><?php echo $store_storeled->CASHIER->caption() ?></span></td>
		<td data-name="CASHIER"<?php echo $store_storeled->CASHIER->cellAttributes() ?>>
<span id="el_store_storeled_CASHIER">
<span<?php echo $store_storeled->CASHIER->viewAttributes() ?>>
<?php echo $store_storeled->CASHIER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->CASHTIME->Visible) { // CASHTIME ?>
	<tr id="r_CASHTIME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CASHTIME"><?php echo $store_storeled->CASHTIME->caption() ?></span></td>
		<td data-name="CASHTIME"<?php echo $store_storeled->CASHTIME->cellAttributes() ?>>
<span id="el_store_storeled_CASHTIME">
<span<?php echo $store_storeled->CASHTIME->viewAttributes() ?>>
<?php echo $store_storeled->CASHTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->CASHRECD->Visible) { // CASHRECD ?>
	<tr id="r_CASHRECD">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CASHRECD"><?php echo $store_storeled->CASHRECD->caption() ?></span></td>
		<td data-name="CASHRECD"<?php echo $store_storeled->CASHRECD->cellAttributes() ?>>
<span id="el_store_storeled_CASHRECD">
<span<?php echo $store_storeled->CASHRECD->viewAttributes() ?>>
<?php echo $store_storeled->CASHRECD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->CASHREFNO->Visible) { // CASHREFNO ?>
	<tr id="r_CASHREFNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CASHREFNO"><?php echo $store_storeled->CASHREFNO->caption() ?></span></td>
		<td data-name="CASHREFNO"<?php echo $store_storeled->CASHREFNO->cellAttributes() ?>>
<span id="el_store_storeled_CASHREFNO">
<span<?php echo $store_storeled->CASHREFNO->viewAttributes() ?>>
<?php echo $store_storeled->CASHREFNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<tr id="r_CASHIERSHIFT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CASHIERSHIFT"><?php echo $store_storeled->CASHIERSHIFT->caption() ?></span></td>
		<td data-name="CASHIERSHIFT"<?php echo $store_storeled->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_store_storeled_CASHIERSHIFT">
<span<?php echo $store_storeled->CASHIERSHIFT->viewAttributes() ?>>
<?php echo $store_storeled->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PRCODE"><?php echo $store_storeled->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE"<?php echo $store_storeled->PRCODE->cellAttributes() ?>>
<span id="el_store_storeled_PRCODE">
<span<?php echo $store_storeled->PRCODE->viewAttributes() ?>>
<?php echo $store_storeled->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->RELEASEBY->Visible) { // RELEASEBY ?>
	<tr id="r_RELEASEBY">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RELEASEBY"><?php echo $store_storeled->RELEASEBY->caption() ?></span></td>
		<td data-name="RELEASEBY"<?php echo $store_storeled->RELEASEBY->cellAttributes() ?>>
<span id="el_store_storeled_RELEASEBY">
<span<?php echo $store_storeled->RELEASEBY->viewAttributes() ?>>
<?php echo $store_storeled->RELEASEBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<tr id="r_CRAUTHOR">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_CRAUTHOR"><?php echo $store_storeled->CRAUTHOR->caption() ?></span></td>
		<td data-name="CRAUTHOR"<?php echo $store_storeled->CRAUTHOR->cellAttributes() ?>>
<span id="el_store_storeled_CRAUTHOR">
<span<?php echo $store_storeled->CRAUTHOR->viewAttributes() ?>>
<?php echo $store_storeled->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PAYMENT->Visible) { // PAYMENT ?>
	<tr id="r_PAYMENT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PAYMENT"><?php echo $store_storeled->PAYMENT->caption() ?></span></td>
		<td data-name="PAYMENT"<?php echo $store_storeled->PAYMENT->cellAttributes() ?>>
<span id="el_store_storeled_PAYMENT">
<span<?php echo $store_storeled->PAYMENT->viewAttributes() ?>>
<?php echo $store_storeled->PAYMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DRID->Visible) { // DRID ?>
	<tr id="r_DRID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DRID"><?php echo $store_storeled->DRID->caption() ?></span></td>
		<td data-name="DRID"<?php echo $store_storeled->DRID->cellAttributes() ?>>
<span id="el_store_storeled_DRID">
<span<?php echo $store_storeled->DRID->viewAttributes() ?>>
<?php echo $store_storeled->DRID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->WARD->Visible) { // WARD ?>
	<tr id="r_WARD">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_WARD"><?php echo $store_storeled->WARD->caption() ?></span></td>
		<td data-name="WARD"<?php echo $store_storeled->WARD->cellAttributes() ?>>
<span id="el_store_storeled_WARD">
<span<?php echo $store_storeled->WARD->viewAttributes() ?>>
<?php echo $store_storeled->WARD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->STAXTYPE->Visible) { // STAXTYPE ?>
	<tr id="r_STAXTYPE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_STAXTYPE"><?php echo $store_storeled->STAXTYPE->caption() ?></span></td>
		<td data-name="STAXTYPE"<?php echo $store_storeled->STAXTYPE->cellAttributes() ?>>
<span id="el_store_storeled_STAXTYPE">
<span<?php echo $store_storeled->STAXTYPE->viewAttributes() ?>>
<?php echo $store_storeled->STAXTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<tr id="r_PURDISCVAL">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PURDISCVAL"><?php echo $store_storeled->PURDISCVAL->caption() ?></span></td>
		<td data-name="PURDISCVAL"<?php echo $store_storeled->PURDISCVAL->cellAttributes() ?>>
<span id="el_store_storeled_PURDISCVAL">
<span<?php echo $store_storeled->PURDISCVAL->viewAttributes() ?>>
<?php echo $store_storeled->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->RNDOFF->Visible) { // RNDOFF ?>
	<tr id="r_RNDOFF">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_RNDOFF"><?php echo $store_storeled->RNDOFF->caption() ?></span></td>
		<td data-name="RNDOFF"<?php echo $store_storeled->RNDOFF->cellAttributes() ?>>
<span id="el_store_storeled_RNDOFF">
<span<?php echo $store_storeled->RNDOFF->viewAttributes() ?>>
<?php echo $store_storeled->RNDOFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DISCONMRP->Visible) { // DISCONMRP ?>
	<tr id="r_DISCONMRP">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DISCONMRP"><?php echo $store_storeled->DISCONMRP->caption() ?></span></td>
		<td data-name="DISCONMRP"<?php echo $store_storeled->DISCONMRP->cellAttributes() ?>>
<span id="el_store_storeled_DISCONMRP">
<span<?php echo $store_storeled->DISCONMRP->viewAttributes() ?>>
<?php echo $store_storeled->DISCONMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DELVDT->Visible) { // DELVDT ?>
	<tr id="r_DELVDT">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DELVDT"><?php echo $store_storeled->DELVDT->caption() ?></span></td>
		<td data-name="DELVDT"<?php echo $store_storeled->DELVDT->cellAttributes() ?>>
<span id="el_store_storeled_DELVDT">
<span<?php echo $store_storeled->DELVDT->viewAttributes() ?>>
<?php echo $store_storeled->DELVDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DELVTIME->Visible) { // DELVTIME ?>
	<tr id="r_DELVTIME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DELVTIME"><?php echo $store_storeled->DELVTIME->caption() ?></span></td>
		<td data-name="DELVTIME"<?php echo $store_storeled->DELVTIME->cellAttributes() ?>>
<span id="el_store_storeled_DELVTIME">
<span<?php echo $store_storeled->DELVTIME->viewAttributes() ?>>
<?php echo $store_storeled->DELVTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->DELVBY->Visible) { // DELVBY ?>
	<tr id="r_DELVBY">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_DELVBY"><?php echo $store_storeled->DELVBY->caption() ?></span></td>
		<td data-name="DELVBY"<?php echo $store_storeled->DELVBY->cellAttributes() ?>>
<span id="el_store_storeled_DELVBY">
<span<?php echo $store_storeled->DELVBY->viewAttributes() ?>>
<?php echo $store_storeled->DELVBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->HOSPNO->Visible) { // HOSPNO ?>
	<tr id="r_HOSPNO">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_HOSPNO"><?php echo $store_storeled->HOSPNO->caption() ?></span></td>
		<td data-name="HOSPNO"<?php echo $store_storeled->HOSPNO->cellAttributes() ?>>
<span id="el_store_storeled_HOSPNO">
<span<?php echo $store_storeled->HOSPNO->viewAttributes() ?>>
<?php echo $store_storeled->HOSPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_id"><?php echo $store_storeled->id->caption() ?></span></td>
		<td data-name="id"<?php echo $store_storeled->id->cellAttributes() ?>>
<span id="el_store_storeled_id">
<span<?php echo $store_storeled->id->viewAttributes() ?>>
<?php echo $store_storeled->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->pbv->Visible) { // pbv ?>
	<tr id="r_pbv">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_pbv"><?php echo $store_storeled->pbv->caption() ?></span></td>
		<td data-name="pbv"<?php echo $store_storeled->pbv->cellAttributes() ?>>
<span id="el_store_storeled_pbv">
<span<?php echo $store_storeled->pbv->viewAttributes() ?>>
<?php echo $store_storeled->pbv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->pbt->Visible) { // pbt ?>
	<tr id="r_pbt">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_pbt"><?php echo $store_storeled->pbt->caption() ?></span></td>
		<td data-name="pbt"<?php echo $store_storeled->pbt->cellAttributes() ?>>
<span id="el_store_storeled_pbt">
<span<?php echo $store_storeled->pbt->viewAttributes() ?>>
<?php echo $store_storeled->pbt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->SiNo->Visible) { // SiNo ?>
	<tr id="r_SiNo">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_SiNo"><?php echo $store_storeled->SiNo->caption() ?></span></td>
		<td data-name="SiNo"<?php echo $store_storeled->SiNo->cellAttributes() ?>>
<span id="el_store_storeled_SiNo">
<span<?php echo $store_storeled->SiNo->viewAttributes() ?>>
<?php echo $store_storeled->SiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->Product->Visible) { // Product ?>
	<tr id="r_Product">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_Product"><?php echo $store_storeled->Product->caption() ?></span></td>
		<td data-name="Product"<?php echo $store_storeled->Product->cellAttributes() ?>>
<span id="el_store_storeled_Product">
<span<?php echo $store_storeled->Product->viewAttributes() ?>>
<?php echo $store_storeled->Product->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->Mfg->Visible) { // Mfg ?>
	<tr id="r_Mfg">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_Mfg"><?php echo $store_storeled->Mfg->caption() ?></span></td>
		<td data-name="Mfg"<?php echo $store_storeled->Mfg->cellAttributes() ?>>
<span id="el_store_storeled_Mfg">
<span<?php echo $store_storeled->Mfg->viewAttributes() ?>>
<?php echo $store_storeled->Mfg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->HosoID->Visible) { // HosoID ?>
	<tr id="r_HosoID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_HosoID"><?php echo $store_storeled->HosoID->caption() ?></span></td>
		<td data-name="HosoID"<?php echo $store_storeled->HosoID->cellAttributes() ?>>
<span id="el_store_storeled_HosoID">
<span<?php echo $store_storeled->HosoID->viewAttributes() ?>>
<?php echo $store_storeled->HosoID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_createdby"><?php echo $store_storeled->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $store_storeled->createdby->cellAttributes() ?>>
<span id="el_store_storeled_createdby">
<span<?php echo $store_storeled->createdby->viewAttributes() ?>>
<?php echo $store_storeled->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_createddatetime"><?php echo $store_storeled->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $store_storeled->createddatetime->cellAttributes() ?>>
<span id="el_store_storeled_createddatetime">
<span<?php echo $store_storeled->createddatetime->viewAttributes() ?>>
<?php echo $store_storeled->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_modifiedby"><?php echo $store_storeled->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $store_storeled->modifiedby->cellAttributes() ?>>
<span id="el_store_storeled_modifiedby">
<span<?php echo $store_storeled->modifiedby->viewAttributes() ?>>
<?php echo $store_storeled->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_modifieddatetime"><?php echo $store_storeled->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $store_storeled->modifieddatetime->cellAttributes() ?>>
<span id="el_store_storeled_modifieddatetime">
<span<?php echo $store_storeled->modifieddatetime->viewAttributes() ?>>
<?php echo $store_storeled->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_MFRCODE"><?php echo $store_storeled->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $store_storeled->MFRCODE->cellAttributes() ?>>
<span id="el_store_storeled_MFRCODE">
<span<?php echo $store_storeled->MFRCODE->viewAttributes() ?>>
<?php echo $store_storeled->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_Reception"><?php echo $store_storeled->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $store_storeled->Reception->cellAttributes() ?>>
<span id="el_store_storeled_Reception">
<span<?php echo $store_storeled->Reception->viewAttributes() ?>>
<?php echo $store_storeled->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_PatID"><?php echo $store_storeled->PatID->caption() ?></span></td>
		<td data-name="PatID"<?php echo $store_storeled->PatID->cellAttributes() ?>>
<span id="el_store_storeled_PatID">
<span<?php echo $store_storeled->PatID->viewAttributes() ?>>
<?php echo $store_storeled->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_mrnno"><?php echo $store_storeled->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $store_storeled->mrnno->cellAttributes() ?>>
<span id="el_store_storeled_mrnno">
<span<?php echo $store_storeled->mrnno->viewAttributes() ?>>
<?php echo $store_storeled->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->BRNAME->Visible) { // BRNAME ?>
	<tr id="r_BRNAME">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_BRNAME"><?php echo $store_storeled->BRNAME->caption() ?></span></td>
		<td data-name="BRNAME"<?php echo $store_storeled->BRNAME->cellAttributes() ?>>
<span id="el_store_storeled_BRNAME">
<span<?php echo $store_storeled->BRNAME->viewAttributes() ?>>
<?php echo $store_storeled->BRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storeled->StoreID->Visible) { // StoreID ?>
	<tr id="r_StoreID">
		<td class="<?php echo $store_storeled_view->TableLeftColumnClass ?>"><span id="elh_store_storeled_StoreID"><?php echo $store_storeled->StoreID->caption() ?></span></td>
		<td data-name="StoreID"<?php echo $store_storeled->StoreID->cellAttributes() ?>>
<span id="el_store_storeled_StoreID">
<span<?php echo $store_storeled->StoreID->viewAttributes() ?>>
<?php echo $store_storeled->StoreID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_storeled_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_storeled->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_storeled_view->terminate();
?>