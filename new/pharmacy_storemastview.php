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
$pharmacy_storemast_view = new pharmacy_storemast_view();

// Run the page
$pharmacy_storemast_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_storemast_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_storemast_view->isExport()) { ?>
<script>
var fpharmacy_storemastview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_storemastview = currentForm = new ew.Form("fpharmacy_storemastview", "view");
	loadjs.done("fpharmacy_storemastview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_storemast_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_storemast_view->ExportOptions->render("body") ?>
<?php $pharmacy_storemast_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_storemast_view->showPageHeader(); ?>
<?php
$pharmacy_storemast_view->showMessage();
?>
<form name="fpharmacy_storemastview" id="fpharmacy_storemastview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_storemast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_storemast_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRCODE"><?php echo $pharmacy_storemast_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $pharmacy_storemast_view->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BRCODE">
<span<?php echo $pharmacy_storemast_view->BRCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PRC"><?php echo $pharmacy_storemast_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $pharmacy_storemast_view->PRC->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PRC">
<span<?php echo $pharmacy_storemast_view->PRC->viewAttributes() ?>><?php echo $pharmacy_storemast_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->TYPE->Visible) { // TYPE ?>
	<tr id="r_TYPE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_TYPE"><?php echo $pharmacy_storemast_view->TYPE->caption() ?></span></td>
		<td data-name="TYPE" <?php echo $pharmacy_storemast_view->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TYPE">
<span<?php echo $pharmacy_storemast_view->TYPE->viewAttributes() ?>><?php echo $pharmacy_storemast_view->TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->DES->Visible) { // DES ?>
	<tr id="r_DES">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_DES"><?php echo $pharmacy_storemast_view->DES->caption() ?></span></td>
		<td data-name="DES" <?php echo $pharmacy_storemast_view->DES->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DES">
<span<?php echo $pharmacy_storemast_view->DES->viewAttributes() ?>><?php echo $pharmacy_storemast_view->DES->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->UM->Visible) { // UM ?>
	<tr id="r_UM">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_UM"><?php echo $pharmacy_storemast_view->UM->caption() ?></span></td>
		<td data-name="UM" <?php echo $pharmacy_storemast_view->UM->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UM">
<span<?php echo $pharmacy_storemast_view->UM->viewAttributes() ?>><?php echo $pharmacy_storemast_view->UM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_RT"><?php echo $pharmacy_storemast_view->RT->caption() ?></span></td>
		<td data-name="RT" <?php echo $pharmacy_storemast_view->RT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RT">
<span<?php echo $pharmacy_storemast_view->RT->viewAttributes() ?>><?php echo $pharmacy_storemast_view->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_BATCHNO"><?php echo $pharmacy_storemast_view->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO" <?php echo $pharmacy_storemast_view->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BATCHNO">
<span<?php echo $pharmacy_storemast_view->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_storemast_view->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_MRP"><?php echo $pharmacy_storemast_view->MRP->caption() ?></span></td>
		<td data-name="MRP" <?php echo $pharmacy_storemast_view->MRP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MRP">
<span<?php echo $pharmacy_storemast_view->MRP->viewAttributes() ?>><?php echo $pharmacy_storemast_view->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_EXPDT"><?php echo $pharmacy_storemast_view->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT" <?php echo $pharmacy_storemast_view->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_EXPDT">
<span<?php echo $pharmacy_storemast_view->EXPDT->viewAttributes() ?>><?php echo $pharmacy_storemast_view->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->LASTPURDT->Visible) { // LASTPURDT ?>
	<tr id="r_LASTPURDT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTPURDT"><?php echo $pharmacy_storemast_view->LASTPURDT->caption() ?></span></td>
		<td data-name="LASTPURDT" <?php echo $pharmacy_storemast_view->LASTPURDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTPURDT">
<span<?php echo $pharmacy_storemast_view->LASTPURDT->viewAttributes() ?>><?php echo $pharmacy_storemast_view->LASTPURDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->LASTSUPP->Visible) { // LASTSUPP ?>
	<tr id="r_LASTSUPP">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTSUPP"><?php echo $pharmacy_storemast_view->LASTSUPP->caption() ?></span></td>
		<td data-name="LASTSUPP" <?php echo $pharmacy_storemast_view->LASTSUPP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTSUPP">
<span<?php echo $pharmacy_storemast_view->LASTSUPP->viewAttributes() ?>><?php echo $pharmacy_storemast_view->LASTSUPP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENNAME"><?php echo $pharmacy_storemast_view->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME" <?php echo $pharmacy_storemast_view->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENNAME">
<span<?php echo $pharmacy_storemast_view->GENNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_view->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->LASTISSDT->Visible) { // LASTISSDT ?>
	<tr id="r_LASTISSDT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTISSDT"><?php echo $pharmacy_storemast_view->LASTISSDT->caption() ?></span></td>
		<td data-name="LASTISSDT" <?php echo $pharmacy_storemast_view->LASTISSDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTISSDT">
<span<?php echo $pharmacy_storemast_view->LASTISSDT->viewAttributes() ?>><?php echo $pharmacy_storemast_view->LASTISSDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->CREATEDDT->Visible) { // CREATEDDT ?>
	<tr id="r_CREATEDDT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_CREATEDDT"><?php echo $pharmacy_storemast_view->CREATEDDT->caption() ?></span></td>
		<td data-name="CREATEDDT" <?php echo $pharmacy_storemast_view->CREATEDDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_CREATEDDT">
<span<?php echo $pharmacy_storemast_view->CREATEDDT->viewAttributes() ?>><?php echo $pharmacy_storemast_view->CREATEDDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->DRID->Visible) { // DRID ?>
	<tr id="r_DRID">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_DRID"><?php echo $pharmacy_storemast_view->DRID->caption() ?></span></td>
		<td data-name="DRID" <?php echo $pharmacy_storemast_view->DRID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DRID">
<span<?php echo $pharmacy_storemast_view->DRID->viewAttributes() ?>><?php echo $pharmacy_storemast_view->DRID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_MFRCODE"><?php echo $pharmacy_storemast_view->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE" <?php echo $pharmacy_storemast_view->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MFRCODE">
<span<?php echo $pharmacy_storemast_view->MFRCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_view->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->COMBCODE->Visible) { // COMBCODE ?>
	<tr id="r_COMBCODE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBCODE"><?php echo $pharmacy_storemast_view->COMBCODE->caption() ?></span></td>
		<td data-name="COMBCODE" <?php echo $pharmacy_storemast_view->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBCODE">
<span<?php echo $pharmacy_storemast_view->COMBCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_view->COMBCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->GENCODE->Visible) { // GENCODE ?>
	<tr id="r_GENCODE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENCODE"><?php echo $pharmacy_storemast_view->GENCODE->caption() ?></span></td>
		<td data-name="GENCODE" <?php echo $pharmacy_storemast_view->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENCODE">
<span<?php echo $pharmacy_storemast_view->GENCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_view->GENCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->STRENGTH->Visible) { // STRENGTH ?>
	<tr id="r_STRENGTH">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_STRENGTH"><?php echo $pharmacy_storemast_view->STRENGTH->caption() ?></span></td>
		<td data-name="STRENGTH" <?php echo $pharmacy_storemast_view->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_storemast_STRENGTH">
<span<?php echo $pharmacy_storemast_view->STRENGTH->viewAttributes() ?>><?php echo $pharmacy_storemast_view->STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->UNIT->Visible) { // UNIT ?>
	<tr id="r_UNIT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_UNIT"><?php echo $pharmacy_storemast_view->UNIT->caption() ?></span></td>
		<td data-name="UNIT" <?php echo $pharmacy_storemast_view->UNIT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UNIT">
<span<?php echo $pharmacy_storemast_view->UNIT->viewAttributes() ?>><?php echo $pharmacy_storemast_view->UNIT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->FORMULARY->Visible) { // FORMULARY ?>
	<tr id="r_FORMULARY">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_FORMULARY"><?php echo $pharmacy_storemast_view->FORMULARY->caption() ?></span></td>
		<td data-name="FORMULARY" <?php echo $pharmacy_storemast_view->FORMULARY->cellAttributes() ?>>
<span id="el_pharmacy_storemast_FORMULARY">
<span<?php echo $pharmacy_storemast_view->FORMULARY->viewAttributes() ?>><?php echo $pharmacy_storemast_view->FORMULARY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->RACKNO->Visible) { // RACKNO ?>
	<tr id="r_RACKNO">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_RACKNO"><?php echo $pharmacy_storemast_view->RACKNO->caption() ?></span></td>
		<td data-name="RACKNO" <?php echo $pharmacy_storemast_view->RACKNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RACKNO">
<span<?php echo $pharmacy_storemast_view->RACKNO->viewAttributes() ?>><?php echo $pharmacy_storemast_view->RACKNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->SUPPNAME->Visible) { // SUPPNAME ?>
	<tr id="r_SUPPNAME">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SUPPNAME"><?php echo $pharmacy_storemast_view->SUPPNAME->caption() ?></span></td>
		<td data-name="SUPPNAME" <?php echo $pharmacy_storemast_view->SUPPNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SUPPNAME">
<span<?php echo $pharmacy_storemast_view->SUPPNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_view->SUPPNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->COMBNAME->Visible) { // COMBNAME ?>
	<tr id="r_COMBNAME">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBNAME"><?php echo $pharmacy_storemast_view->COMBNAME->caption() ?></span></td>
		<td data-name="COMBNAME" <?php echo $pharmacy_storemast_view->COMBNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBNAME">
<span<?php echo $pharmacy_storemast_view->COMBNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_view->COMBNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->GENERICNAME->Visible) { // GENERICNAME ?>
	<tr id="r_GENERICNAME">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENERICNAME"><?php echo $pharmacy_storemast_view->GENERICNAME->caption() ?></span></td>
		<td data-name="GENERICNAME" <?php echo $pharmacy_storemast_view->GENERICNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENERICNAME">
<span<?php echo $pharmacy_storemast_view->GENERICNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_view->GENERICNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->REMARK->Visible) { // REMARK ?>
	<tr id="r_REMARK">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_REMARK"><?php echo $pharmacy_storemast_view->REMARK->caption() ?></span></td>
		<td data-name="REMARK" <?php echo $pharmacy_storemast_view->REMARK->cellAttributes() ?>>
<span id="el_pharmacy_storemast_REMARK">
<span<?php echo $pharmacy_storemast_view->REMARK->viewAttributes() ?>><?php echo $pharmacy_storemast_view->REMARK->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->TEMP->Visible) { // TEMP ?>
	<tr id="r_TEMP">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_TEMP"><?php echo $pharmacy_storemast_view->TEMP->caption() ?></span></td>
		<td data-name="TEMP" <?php echo $pharmacy_storemast_view->TEMP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TEMP">
<span<?php echo $pharmacy_storemast_view->TEMP->viewAttributes() ?>><?php echo $pharmacy_storemast_view->TEMP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_id"><?php echo $pharmacy_storemast_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_storemast_view->id->cellAttributes() ?>>
<span id="el_pharmacy_storemast_id">
<span<?php echo $pharmacy_storemast_view->id->viewAttributes() ?>><?php echo $pharmacy_storemast_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PurValue"><?php echo $pharmacy_storemast_view->PurValue->caption() ?></span></td>
		<td data-name="PurValue" <?php echo $pharmacy_storemast_view->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PurValue">
<span<?php echo $pharmacy_storemast_view->PurValue->viewAttributes() ?>><?php echo $pharmacy_storemast_view->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PSGST"><?php echo $pharmacy_storemast_view->PSGST->caption() ?></span></td>
		<td data-name="PSGST" <?php echo $pharmacy_storemast_view->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PSGST">
<span<?php echo $pharmacy_storemast_view->PSGST->viewAttributes() ?>><?php echo $pharmacy_storemast_view->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PCGST"><?php echo $pharmacy_storemast_view->PCGST->caption() ?></span></td>
		<td data-name="PCGST" <?php echo $pharmacy_storemast_view->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PCGST">
<span<?php echo $pharmacy_storemast_view->PCGST->viewAttributes() ?>><?php echo $pharmacy_storemast_view->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->SaleValue->Visible) { // SaleValue ?>
	<tr id="r_SaleValue">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleValue"><?php echo $pharmacy_storemast_view->SaleValue->caption() ?></span></td>
		<td data-name="SaleValue" <?php echo $pharmacy_storemast_view->SaleValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleValue">
<span<?php echo $pharmacy_storemast_view->SaleValue->viewAttributes() ?>><?php echo $pharmacy_storemast_view->SaleValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SSGST"><?php echo $pharmacy_storemast_view->SSGST->caption() ?></span></td>
		<td data-name="SSGST" <?php echo $pharmacy_storemast_view->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SSGST">
<span<?php echo $pharmacy_storemast_view->SSGST->viewAttributes() ?>><?php echo $pharmacy_storemast_view->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SCGST"><?php echo $pharmacy_storemast_view->SCGST->caption() ?></span></td>
		<td data-name="SCGST" <?php echo $pharmacy_storemast_view->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SCGST">
<span<?php echo $pharmacy_storemast_view->SCGST->viewAttributes() ?>><?php echo $pharmacy_storemast_view->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->SaleRate->Visible) { // SaleRate ?>
	<tr id="r_SaleRate">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleRate"><?php echo $pharmacy_storemast_view->SaleRate->caption() ?></span></td>
		<td data-name="SaleRate" <?php echo $pharmacy_storemast_view->SaleRate->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleRate">
<span<?php echo $pharmacy_storemast_view->SaleRate->viewAttributes() ?>><?php echo $pharmacy_storemast_view->SaleRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_HospID"><?php echo $pharmacy_storemast_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $pharmacy_storemast_view->HospID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_HospID">
<span<?php echo $pharmacy_storemast_view->HospID->viewAttributes() ?>><?php echo $pharmacy_storemast_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->BRNAME->Visible) { // BRNAME ?>
	<tr id="r_BRNAME">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRNAME"><?php echo $pharmacy_storemast_view->BRNAME->caption() ?></span></td>
		<td data-name="BRNAME" <?php echo $pharmacy_storemast_view->BRNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BRNAME">
<span<?php echo $pharmacy_storemast_view->BRNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_view->BRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->OV->Visible) { // OV ?>
	<tr id="r_OV">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_OV"><?php echo $pharmacy_storemast_view->OV->caption() ?></span></td>
		<td data-name="OV" <?php echo $pharmacy_storemast_view->OV->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OV">
<span<?php echo $pharmacy_storemast_view->OV->viewAttributes() ?>><?php echo $pharmacy_storemast_view->OV->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->LATESTOV->Visible) { // LATESTOV ?>
	<tr id="r_LATESTOV">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LATESTOV"><?php echo $pharmacy_storemast_view->LATESTOV->caption() ?></span></td>
		<td data-name="LATESTOV" <?php echo $pharmacy_storemast_view->LATESTOV->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LATESTOV">
<span<?php echo $pharmacy_storemast_view->LATESTOV->viewAttributes() ?>><?php echo $pharmacy_storemast_view->LATESTOV->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->ITEMTYPE->Visible) { // ITEMTYPE ?>
	<tr id="r_ITEMTYPE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_ITEMTYPE"><?php echo $pharmacy_storemast_view->ITEMTYPE->caption() ?></span></td>
		<td data-name="ITEMTYPE" <?php echo $pharmacy_storemast_view->ITEMTYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_ITEMTYPE">
<span<?php echo $pharmacy_storemast_view->ITEMTYPE->viewAttributes() ?>><?php echo $pharmacy_storemast_view->ITEMTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->ROWID->Visible) { // ROWID ?>
	<tr id="r_ROWID">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_ROWID"><?php echo $pharmacy_storemast_view->ROWID->caption() ?></span></td>
		<td data-name="ROWID" <?php echo $pharmacy_storemast_view->ROWID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_ROWID">
<span<?php echo $pharmacy_storemast_view->ROWID->viewAttributes() ?>><?php echo $pharmacy_storemast_view->ROWID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->MOVED->Visible) { // MOVED ?>
	<tr id="r_MOVED">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_MOVED"><?php echo $pharmacy_storemast_view->MOVED->caption() ?></span></td>
		<td data-name="MOVED" <?php echo $pharmacy_storemast_view->MOVED->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MOVED">
<span<?php echo $pharmacy_storemast_view->MOVED->viewAttributes() ?>><?php echo $pharmacy_storemast_view->MOVED->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->NEWTAX->Visible) { // NEWTAX ?>
	<tr id="r_NEWTAX">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWTAX"><?php echo $pharmacy_storemast_view->NEWTAX->caption() ?></span></td>
		<td data-name="NEWTAX" <?php echo $pharmacy_storemast_view->NEWTAX->cellAttributes() ?>>
<span id="el_pharmacy_storemast_NEWTAX">
<span<?php echo $pharmacy_storemast_view->NEWTAX->viewAttributes() ?>><?php echo $pharmacy_storemast_view->NEWTAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->HSNCODE->Visible) { // HSNCODE ?>
	<tr id="r_HSNCODE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_HSNCODE"><?php echo $pharmacy_storemast_view->HSNCODE->caption() ?></span></td>
		<td data-name="HSNCODE" <?php echo $pharmacy_storemast_view->HSNCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_HSNCODE">
<span<?php echo $pharmacy_storemast_view->HSNCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_view->HSNCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast_view->OLDTAX->Visible) { // OLDTAX ?>
	<tr id="r_OLDTAX">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_OLDTAX"><?php echo $pharmacy_storemast_view->OLDTAX->caption() ?></span></td>
		<td data-name="OLDTAX" <?php echo $pharmacy_storemast_view->OLDTAX->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OLDTAX">
<span<?php echo $pharmacy_storemast_view->OLDTAX->viewAttributes() ?>><?php echo $pharmacy_storemast_view->OLDTAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_storemast_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_storemast_view->isExport()) { ?>
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
$pharmacy_storemast_view->terminate();
?>