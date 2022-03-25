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
$store_storemast_view = new store_storemast_view();

// Run the page
$store_storemast_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storemast_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$store_storemast_view->isExport()) { ?>
<script>
var fstore_storemastview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fstore_storemastview = currentForm = new ew.Form("fstore_storemastview", "view");
	loadjs.done("fstore_storemastview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$store_storemast_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $store_storemast_view->ExportOptions->render("body") ?>
<?php $store_storemast_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $store_storemast_view->showPageHeader(); ?>
<?php
$store_storemast_view->showMessage();
?>
<form name="fstore_storemastview" id="fstore_storemastview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storemast">
<input type="hidden" name="modal" value="<?php echo (int)$store_storemast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_storemast_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_BRCODE"><?php echo $store_storemast_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $store_storemast_view->BRCODE->cellAttributes() ?>>
<span id="el_store_storemast_BRCODE">
<span<?php echo $store_storemast_view->BRCODE->viewAttributes() ?>><?php echo $store_storemast_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PRC"><?php echo $store_storemast_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $store_storemast_view->PRC->cellAttributes() ?>>
<span id="el_store_storemast_PRC">
<span<?php echo $store_storemast_view->PRC->viewAttributes() ?>><?php echo $store_storemast_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->TYPE->Visible) { // TYPE ?>
	<tr id="r_TYPE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_TYPE"><?php echo $store_storemast_view->TYPE->caption() ?></span></td>
		<td data-name="TYPE" <?php echo $store_storemast_view->TYPE->cellAttributes() ?>>
<span id="el_store_storemast_TYPE">
<span<?php echo $store_storemast_view->TYPE->viewAttributes() ?>><?php echo $store_storemast_view->TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->DES->Visible) { // DES ?>
	<tr id="r_DES">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_DES"><?php echo $store_storemast_view->DES->caption() ?></span></td>
		<td data-name="DES" <?php echo $store_storemast_view->DES->cellAttributes() ?>>
<span id="el_store_storemast_DES">
<span<?php echo $store_storemast_view->DES->viewAttributes() ?>><?php echo $store_storemast_view->DES->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->UM->Visible) { // UM ?>
	<tr id="r_UM">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_UM"><?php echo $store_storemast_view->UM->caption() ?></span></td>
		<td data-name="UM" <?php echo $store_storemast_view->UM->cellAttributes() ?>>
<span id="el_store_storemast_UM">
<span<?php echo $store_storemast_view->UM->viewAttributes() ?>><?php echo $store_storemast_view->UM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_RT"><?php echo $store_storemast_view->RT->caption() ?></span></td>
		<td data-name="RT" <?php echo $store_storemast_view->RT->cellAttributes() ?>>
<span id="el_store_storemast_RT">
<span<?php echo $store_storemast_view->RT->viewAttributes() ?>><?php echo $store_storemast_view->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_UR"><?php echo $store_storemast_view->UR->caption() ?></span></td>
		<td data-name="UR" <?php echo $store_storemast_view->UR->cellAttributes() ?>>
<span id="el_store_storemast_UR">
<span<?php echo $store_storemast_view->UR->viewAttributes() ?>><?php echo $store_storemast_view->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_TAXP"><?php echo $store_storemast_view->TAXP->caption() ?></span></td>
		<td data-name="TAXP" <?php echo $store_storemast_view->TAXP->cellAttributes() ?>>
<span id="el_store_storemast_TAXP">
<span<?php echo $store_storemast_view->TAXP->viewAttributes() ?>><?php echo $store_storemast_view->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_BATCHNO"><?php echo $store_storemast_view->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO" <?php echo $store_storemast_view->BATCHNO->cellAttributes() ?>>
<span id="el_store_storemast_BATCHNO">
<span<?php echo $store_storemast_view->BATCHNO->viewAttributes() ?>><?php echo $store_storemast_view->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_OQ"><?php echo $store_storemast_view->OQ->caption() ?></span></td>
		<td data-name="OQ" <?php echo $store_storemast_view->OQ->cellAttributes() ?>>
<span id="el_store_storemast_OQ">
<span<?php echo $store_storemast_view->OQ->viewAttributes() ?>><?php echo $store_storemast_view->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_RQ"><?php echo $store_storemast_view->RQ->caption() ?></span></td>
		<td data-name="RQ" <?php echo $store_storemast_view->RQ->cellAttributes() ?>>
<span id="el_store_storemast_RQ">
<span<?php echo $store_storemast_view->RQ->viewAttributes() ?>><?php echo $store_storemast_view->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_MRQ"><?php echo $store_storemast_view->MRQ->caption() ?></span></td>
		<td data-name="MRQ" <?php echo $store_storemast_view->MRQ->cellAttributes() ?>>
<span id="el_store_storemast_MRQ">
<span<?php echo $store_storemast_view->MRQ->viewAttributes() ?>><?php echo $store_storemast_view->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_IQ"><?php echo $store_storemast_view->IQ->caption() ?></span></td>
		<td data-name="IQ" <?php echo $store_storemast_view->IQ->cellAttributes() ?>>
<span id="el_store_storemast_IQ">
<span<?php echo $store_storemast_view->IQ->viewAttributes() ?>><?php echo $store_storemast_view->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_MRP"><?php echo $store_storemast_view->MRP->caption() ?></span></td>
		<td data-name="MRP" <?php echo $store_storemast_view->MRP->cellAttributes() ?>>
<span id="el_store_storemast_MRP">
<span<?php echo $store_storemast_view->MRP->viewAttributes() ?>><?php echo $store_storemast_view->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_EXPDT"><?php echo $store_storemast_view->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT" <?php echo $store_storemast_view->EXPDT->cellAttributes() ?>>
<span id="el_store_storemast_EXPDT">
<span<?php echo $store_storemast_view->EXPDT->viewAttributes() ?>><?php echo $store_storemast_view->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->SALQTY->Visible) { // SALQTY ?>
	<tr id="r_SALQTY">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SALQTY"><?php echo $store_storemast_view->SALQTY->caption() ?></span></td>
		<td data-name="SALQTY" <?php echo $store_storemast_view->SALQTY->cellAttributes() ?>>
<span id="el_store_storemast_SALQTY">
<span<?php echo $store_storemast_view->SALQTY->viewAttributes() ?>><?php echo $store_storemast_view->SALQTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->LASTPURDT->Visible) { // LASTPURDT ?>
	<tr id="r_LASTPURDT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_LASTPURDT"><?php echo $store_storemast_view->LASTPURDT->caption() ?></span></td>
		<td data-name="LASTPURDT" <?php echo $store_storemast_view->LASTPURDT->cellAttributes() ?>>
<span id="el_store_storemast_LASTPURDT">
<span<?php echo $store_storemast_view->LASTPURDT->viewAttributes() ?>><?php echo $store_storemast_view->LASTPURDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->LASTSUPP->Visible) { // LASTSUPP ?>
	<tr id="r_LASTSUPP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_LASTSUPP"><?php echo $store_storemast_view->LASTSUPP->caption() ?></span></td>
		<td data-name="LASTSUPP" <?php echo $store_storemast_view->LASTSUPP->cellAttributes() ?>>
<span id="el_store_storemast_LASTSUPP">
<span<?php echo $store_storemast_view->LASTSUPP->viewAttributes() ?>><?php echo $store_storemast_view->LASTSUPP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_GENNAME"><?php echo $store_storemast_view->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME" <?php echo $store_storemast_view->GENNAME->cellAttributes() ?>>
<span id="el_store_storemast_GENNAME">
<span<?php echo $store_storemast_view->GENNAME->viewAttributes() ?>><?php echo $store_storemast_view->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->LASTISSDT->Visible) { // LASTISSDT ?>
	<tr id="r_LASTISSDT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_LASTISSDT"><?php echo $store_storemast_view->LASTISSDT->caption() ?></span></td>
		<td data-name="LASTISSDT" <?php echo $store_storemast_view->LASTISSDT->cellAttributes() ?>>
<span id="el_store_storemast_LASTISSDT">
<span<?php echo $store_storemast_view->LASTISSDT->viewAttributes() ?>><?php echo $store_storemast_view->LASTISSDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->CREATEDDT->Visible) { // CREATEDDT ?>
	<tr id="r_CREATEDDT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_CREATEDDT"><?php echo $store_storemast_view->CREATEDDT->caption() ?></span></td>
		<td data-name="CREATEDDT" <?php echo $store_storemast_view->CREATEDDT->cellAttributes() ?>>
<span id="el_store_storemast_CREATEDDT">
<span<?php echo $store_storemast_view->CREATEDDT->viewAttributes() ?>><?php echo $store_storemast_view->CREATEDDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->OPPRC->Visible) { // OPPRC ?>
	<tr id="r_OPPRC">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_OPPRC"><?php echo $store_storemast_view->OPPRC->caption() ?></span></td>
		<td data-name="OPPRC" <?php echo $store_storemast_view->OPPRC->cellAttributes() ?>>
<span id="el_store_storemast_OPPRC">
<span<?php echo $store_storemast_view->OPPRC->viewAttributes() ?>><?php echo $store_storemast_view->OPPRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->RESTRICT->Visible) { // RESTRICT ?>
	<tr id="r_RESTRICT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_RESTRICT"><?php echo $store_storemast_view->RESTRICT->caption() ?></span></td>
		<td data-name="RESTRICT" <?php echo $store_storemast_view->RESTRICT->cellAttributes() ?>>
<span id="el_store_storemast_RESTRICT">
<span<?php echo $store_storemast_view->RESTRICT->viewAttributes() ?>><?php echo $store_storemast_view->RESTRICT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->BAWAPRC->Visible) { // BAWAPRC ?>
	<tr id="r_BAWAPRC">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_BAWAPRC"><?php echo $store_storemast_view->BAWAPRC->caption() ?></span></td>
		<td data-name="BAWAPRC" <?php echo $store_storemast_view->BAWAPRC->cellAttributes() ?>>
<span id="el_store_storemast_BAWAPRC">
<span<?php echo $store_storemast_view->BAWAPRC->viewAttributes() ?>><?php echo $store_storemast_view->BAWAPRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->STAXPER->Visible) { // STAXPER ?>
	<tr id="r_STAXPER">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_STAXPER"><?php echo $store_storemast_view->STAXPER->caption() ?></span></td>
		<td data-name="STAXPER" <?php echo $store_storemast_view->STAXPER->cellAttributes() ?>>
<span id="el_store_storemast_STAXPER">
<span<?php echo $store_storemast_view->STAXPER->viewAttributes() ?>><?php echo $store_storemast_view->STAXPER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->TAXTYPE->Visible) { // TAXTYPE ?>
	<tr id="r_TAXTYPE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_TAXTYPE"><?php echo $store_storemast_view->TAXTYPE->caption() ?></span></td>
		<td data-name="TAXTYPE" <?php echo $store_storemast_view->TAXTYPE->cellAttributes() ?>>
<span id="el_store_storemast_TAXTYPE">
<span<?php echo $store_storemast_view->TAXTYPE->viewAttributes() ?>><?php echo $store_storemast_view->TAXTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->OLDTAXP->Visible) { // OLDTAXP ?>
	<tr id="r_OLDTAXP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_OLDTAXP"><?php echo $store_storemast_view->OLDTAXP->caption() ?></span></td>
		<td data-name="OLDTAXP" <?php echo $store_storemast_view->OLDTAXP->cellAttributes() ?>>
<span id="el_store_storemast_OLDTAXP">
<span<?php echo $store_storemast_view->OLDTAXP->viewAttributes() ?>><?php echo $store_storemast_view->OLDTAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->TAXUPD->Visible) { // TAXUPD ?>
	<tr id="r_TAXUPD">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_TAXUPD"><?php echo $store_storemast_view->TAXUPD->caption() ?></span></td>
		<td data-name="TAXUPD" <?php echo $store_storemast_view->TAXUPD->cellAttributes() ?>>
<span id="el_store_storemast_TAXUPD">
<span<?php echo $store_storemast_view->TAXUPD->viewAttributes() ?>><?php echo $store_storemast_view->TAXUPD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->PACKAGE->Visible) { // PACKAGE ?>
	<tr id="r_PACKAGE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PACKAGE"><?php echo $store_storemast_view->PACKAGE->caption() ?></span></td>
		<td data-name="PACKAGE" <?php echo $store_storemast_view->PACKAGE->cellAttributes() ?>>
<span id="el_store_storemast_PACKAGE">
<span<?php echo $store_storemast_view->PACKAGE->viewAttributes() ?>><?php echo $store_storemast_view->PACKAGE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->NEWRT->Visible) { // NEWRT ?>
	<tr id="r_NEWRT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_NEWRT"><?php echo $store_storemast_view->NEWRT->caption() ?></span></td>
		<td data-name="NEWRT" <?php echo $store_storemast_view->NEWRT->cellAttributes() ?>>
<span id="el_store_storemast_NEWRT">
<span<?php echo $store_storemast_view->NEWRT->viewAttributes() ?>><?php echo $store_storemast_view->NEWRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->NEWMRP->Visible) { // NEWMRP ?>
	<tr id="r_NEWMRP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_NEWMRP"><?php echo $store_storemast_view->NEWMRP->caption() ?></span></td>
		<td data-name="NEWMRP" <?php echo $store_storemast_view->NEWMRP->cellAttributes() ?>>
<span id="el_store_storemast_NEWMRP">
<span<?php echo $store_storemast_view->NEWMRP->viewAttributes() ?>><?php echo $store_storemast_view->NEWMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->NEWUR->Visible) { // NEWUR ?>
	<tr id="r_NEWUR">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_NEWUR"><?php echo $store_storemast_view->NEWUR->caption() ?></span></td>
		<td data-name="NEWUR" <?php echo $store_storemast_view->NEWUR->cellAttributes() ?>>
<span id="el_store_storemast_NEWUR">
<span<?php echo $store_storemast_view->NEWUR->viewAttributes() ?>><?php echo $store_storemast_view->NEWUR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->STATUS->Visible) { // STATUS ?>
	<tr id="r_STATUS">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_STATUS"><?php echo $store_storemast_view->STATUS->caption() ?></span></td>
		<td data-name="STATUS" <?php echo $store_storemast_view->STATUS->cellAttributes() ?>>
<span id="el_store_storemast_STATUS">
<span<?php echo $store_storemast_view->STATUS->viewAttributes() ?>><?php echo $store_storemast_view->STATUS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->RETNQTY->Visible) { // RETNQTY ?>
	<tr id="r_RETNQTY">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_RETNQTY"><?php echo $store_storemast_view->RETNQTY->caption() ?></span></td>
		<td data-name="RETNQTY" <?php echo $store_storemast_view->RETNQTY->cellAttributes() ?>>
<span id="el_store_storemast_RETNQTY">
<span<?php echo $store_storemast_view->RETNQTY->viewAttributes() ?>><?php echo $store_storemast_view->RETNQTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->KEMODISC->Visible) { // KEMODISC ?>
	<tr id="r_KEMODISC">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_KEMODISC"><?php echo $store_storemast_view->KEMODISC->caption() ?></span></td>
		<td data-name="KEMODISC" <?php echo $store_storemast_view->KEMODISC->cellAttributes() ?>>
<span id="el_store_storemast_KEMODISC">
<span<?php echo $store_storemast_view->KEMODISC->viewAttributes() ?>><?php echo $store_storemast_view->KEMODISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->PATSALE->Visible) { // PATSALE ?>
	<tr id="r_PATSALE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PATSALE"><?php echo $store_storemast_view->PATSALE->caption() ?></span></td>
		<td data-name="PATSALE" <?php echo $store_storemast_view->PATSALE->cellAttributes() ?>>
<span id="el_store_storemast_PATSALE">
<span<?php echo $store_storemast_view->PATSALE->viewAttributes() ?>><?php echo $store_storemast_view->PATSALE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->ORGAN->Visible) { // ORGAN ?>
	<tr id="r_ORGAN">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_ORGAN"><?php echo $store_storemast_view->ORGAN->caption() ?></span></td>
		<td data-name="ORGAN" <?php echo $store_storemast_view->ORGAN->cellAttributes() ?>>
<span id="el_store_storemast_ORGAN">
<span<?php echo $store_storemast_view->ORGAN->viewAttributes() ?>><?php echo $store_storemast_view->ORGAN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->OLDRQ->Visible) { // OLDRQ ?>
	<tr id="r_OLDRQ">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_OLDRQ"><?php echo $store_storemast_view->OLDRQ->caption() ?></span></td>
		<td data-name="OLDRQ" <?php echo $store_storemast_view->OLDRQ->cellAttributes() ?>>
<span id="el_store_storemast_OLDRQ">
<span<?php echo $store_storemast_view->OLDRQ->viewAttributes() ?>><?php echo $store_storemast_view->OLDRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->DRID->Visible) { // DRID ?>
	<tr id="r_DRID">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_DRID"><?php echo $store_storemast_view->DRID->caption() ?></span></td>
		<td data-name="DRID" <?php echo $store_storemast_view->DRID->cellAttributes() ?>>
<span id="el_store_storemast_DRID">
<span<?php echo $store_storemast_view->DRID->viewAttributes() ?>><?php echo $store_storemast_view->DRID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_MFRCODE"><?php echo $store_storemast_view->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE" <?php echo $store_storemast_view->MFRCODE->cellAttributes() ?>>
<span id="el_store_storemast_MFRCODE">
<span<?php echo $store_storemast_view->MFRCODE->viewAttributes() ?>><?php echo $store_storemast_view->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->COMBCODE->Visible) { // COMBCODE ?>
	<tr id="r_COMBCODE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_COMBCODE"><?php echo $store_storemast_view->COMBCODE->caption() ?></span></td>
		<td data-name="COMBCODE" <?php echo $store_storemast_view->COMBCODE->cellAttributes() ?>>
<span id="el_store_storemast_COMBCODE">
<span<?php echo $store_storemast_view->COMBCODE->viewAttributes() ?>><?php echo $store_storemast_view->COMBCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->GENCODE->Visible) { // GENCODE ?>
	<tr id="r_GENCODE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_GENCODE"><?php echo $store_storemast_view->GENCODE->caption() ?></span></td>
		<td data-name="GENCODE" <?php echo $store_storemast_view->GENCODE->cellAttributes() ?>>
<span id="el_store_storemast_GENCODE">
<span<?php echo $store_storemast_view->GENCODE->viewAttributes() ?>><?php echo $store_storemast_view->GENCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->STRENGTH->Visible) { // STRENGTH ?>
	<tr id="r_STRENGTH">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_STRENGTH"><?php echo $store_storemast_view->STRENGTH->caption() ?></span></td>
		<td data-name="STRENGTH" <?php echo $store_storemast_view->STRENGTH->cellAttributes() ?>>
<span id="el_store_storemast_STRENGTH">
<span<?php echo $store_storemast_view->STRENGTH->viewAttributes() ?>><?php echo $store_storemast_view->STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->UNIT->Visible) { // UNIT ?>
	<tr id="r_UNIT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_UNIT"><?php echo $store_storemast_view->UNIT->caption() ?></span></td>
		<td data-name="UNIT" <?php echo $store_storemast_view->UNIT->cellAttributes() ?>>
<span id="el_store_storemast_UNIT">
<span<?php echo $store_storemast_view->UNIT->viewAttributes() ?>><?php echo $store_storemast_view->UNIT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->FORMULARY->Visible) { // FORMULARY ?>
	<tr id="r_FORMULARY">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_FORMULARY"><?php echo $store_storemast_view->FORMULARY->caption() ?></span></td>
		<td data-name="FORMULARY" <?php echo $store_storemast_view->FORMULARY->cellAttributes() ?>>
<span id="el_store_storemast_FORMULARY">
<span<?php echo $store_storemast_view->FORMULARY->viewAttributes() ?>><?php echo $store_storemast_view->FORMULARY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->STOCK->Visible) { // STOCK ?>
	<tr id="r_STOCK">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_STOCK"><?php echo $store_storemast_view->STOCK->caption() ?></span></td>
		<td data-name="STOCK" <?php echo $store_storemast_view->STOCK->cellAttributes() ?>>
<span id="el_store_storemast_STOCK">
<span<?php echo $store_storemast_view->STOCK->viewAttributes() ?>><?php echo $store_storemast_view->STOCK->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->RACKNO->Visible) { // RACKNO ?>
	<tr id="r_RACKNO">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_RACKNO"><?php echo $store_storemast_view->RACKNO->caption() ?></span></td>
		<td data-name="RACKNO" <?php echo $store_storemast_view->RACKNO->cellAttributes() ?>>
<span id="el_store_storemast_RACKNO">
<span<?php echo $store_storemast_view->RACKNO->viewAttributes() ?>><?php echo $store_storemast_view->RACKNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->SUPPNAME->Visible) { // SUPPNAME ?>
	<tr id="r_SUPPNAME">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SUPPNAME"><?php echo $store_storemast_view->SUPPNAME->caption() ?></span></td>
		<td data-name="SUPPNAME" <?php echo $store_storemast_view->SUPPNAME->cellAttributes() ?>>
<span id="el_store_storemast_SUPPNAME">
<span<?php echo $store_storemast_view->SUPPNAME->viewAttributes() ?>><?php echo $store_storemast_view->SUPPNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->COMBNAME->Visible) { // COMBNAME ?>
	<tr id="r_COMBNAME">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_COMBNAME"><?php echo $store_storemast_view->COMBNAME->caption() ?></span></td>
		<td data-name="COMBNAME" <?php echo $store_storemast_view->COMBNAME->cellAttributes() ?>>
<span id="el_store_storemast_COMBNAME">
<span<?php echo $store_storemast_view->COMBNAME->viewAttributes() ?>><?php echo $store_storemast_view->COMBNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->GENERICNAME->Visible) { // GENERICNAME ?>
	<tr id="r_GENERICNAME">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_GENERICNAME"><?php echo $store_storemast_view->GENERICNAME->caption() ?></span></td>
		<td data-name="GENERICNAME" <?php echo $store_storemast_view->GENERICNAME->cellAttributes() ?>>
<span id="el_store_storemast_GENERICNAME">
<span<?php echo $store_storemast_view->GENERICNAME->viewAttributes() ?>><?php echo $store_storemast_view->GENERICNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->REMARK->Visible) { // REMARK ?>
	<tr id="r_REMARK">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_REMARK"><?php echo $store_storemast_view->REMARK->caption() ?></span></td>
		<td data-name="REMARK" <?php echo $store_storemast_view->REMARK->cellAttributes() ?>>
<span id="el_store_storemast_REMARK">
<span<?php echo $store_storemast_view->REMARK->viewAttributes() ?>><?php echo $store_storemast_view->REMARK->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->TEMP->Visible) { // TEMP ?>
	<tr id="r_TEMP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_TEMP"><?php echo $store_storemast_view->TEMP->caption() ?></span></td>
		<td data-name="TEMP" <?php echo $store_storemast_view->TEMP->cellAttributes() ?>>
<span id="el_store_storemast_TEMP">
<span<?php echo $store_storemast_view->TEMP->viewAttributes() ?>><?php echo $store_storemast_view->TEMP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->PACKING->Visible) { // PACKING ?>
	<tr id="r_PACKING">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PACKING"><?php echo $store_storemast_view->PACKING->caption() ?></span></td>
		<td data-name="PACKING" <?php echo $store_storemast_view->PACKING->cellAttributes() ?>>
<span id="el_store_storemast_PACKING">
<span<?php echo $store_storemast_view->PACKING->viewAttributes() ?>><?php echo $store_storemast_view->PACKING->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->PhysQty->Visible) { // PhysQty ?>
	<tr id="r_PhysQty">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PhysQty"><?php echo $store_storemast_view->PhysQty->caption() ?></span></td>
		<td data-name="PhysQty" <?php echo $store_storemast_view->PhysQty->cellAttributes() ?>>
<span id="el_store_storemast_PhysQty">
<span<?php echo $store_storemast_view->PhysQty->viewAttributes() ?>><?php echo $store_storemast_view->PhysQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->LedQty->Visible) { // LedQty ?>
	<tr id="r_LedQty">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_LedQty"><?php echo $store_storemast_view->LedQty->caption() ?></span></td>
		<td data-name="LedQty" <?php echo $store_storemast_view->LedQty->cellAttributes() ?>>
<span id="el_store_storemast_LedQty">
<span<?php echo $store_storemast_view->LedQty->viewAttributes() ?>><?php echo $store_storemast_view->LedQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_id"><?php echo $store_storemast_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $store_storemast_view->id->cellAttributes() ?>>
<span id="el_store_storemast_id">
<span<?php echo $store_storemast_view->id->viewAttributes() ?>><?php echo $store_storemast_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PurValue"><?php echo $store_storemast_view->PurValue->caption() ?></span></td>
		<td data-name="PurValue" <?php echo $store_storemast_view->PurValue->cellAttributes() ?>>
<span id="el_store_storemast_PurValue">
<span<?php echo $store_storemast_view->PurValue->viewAttributes() ?>><?php echo $store_storemast_view->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PSGST"><?php echo $store_storemast_view->PSGST->caption() ?></span></td>
		<td data-name="PSGST" <?php echo $store_storemast_view->PSGST->cellAttributes() ?>>
<span id="el_store_storemast_PSGST">
<span<?php echo $store_storemast_view->PSGST->viewAttributes() ?>><?php echo $store_storemast_view->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PCGST"><?php echo $store_storemast_view->PCGST->caption() ?></span></td>
		<td data-name="PCGST" <?php echo $store_storemast_view->PCGST->cellAttributes() ?>>
<span id="el_store_storemast_PCGST">
<span<?php echo $store_storemast_view->PCGST->viewAttributes() ?>><?php echo $store_storemast_view->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->SaleValue->Visible) { // SaleValue ?>
	<tr id="r_SaleValue">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SaleValue"><?php echo $store_storemast_view->SaleValue->caption() ?></span></td>
		<td data-name="SaleValue" <?php echo $store_storemast_view->SaleValue->cellAttributes() ?>>
<span id="el_store_storemast_SaleValue">
<span<?php echo $store_storemast_view->SaleValue->viewAttributes() ?>><?php echo $store_storemast_view->SaleValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SSGST"><?php echo $store_storemast_view->SSGST->caption() ?></span></td>
		<td data-name="SSGST" <?php echo $store_storemast_view->SSGST->cellAttributes() ?>>
<span id="el_store_storemast_SSGST">
<span<?php echo $store_storemast_view->SSGST->viewAttributes() ?>><?php echo $store_storemast_view->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SCGST"><?php echo $store_storemast_view->SCGST->caption() ?></span></td>
		<td data-name="SCGST" <?php echo $store_storemast_view->SCGST->cellAttributes() ?>>
<span id="el_store_storemast_SCGST">
<span<?php echo $store_storemast_view->SCGST->viewAttributes() ?>><?php echo $store_storemast_view->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->SaleRate->Visible) { // SaleRate ?>
	<tr id="r_SaleRate">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SaleRate"><?php echo $store_storemast_view->SaleRate->caption() ?></span></td>
		<td data-name="SaleRate" <?php echo $store_storemast_view->SaleRate->cellAttributes() ?>>
<span id="el_store_storemast_SaleRate">
<span<?php echo $store_storemast_view->SaleRate->viewAttributes() ?>><?php echo $store_storemast_view->SaleRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_HospID"><?php echo $store_storemast_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $store_storemast_view->HospID->cellAttributes() ?>>
<span id="el_store_storemast_HospID">
<span<?php echo $store_storemast_view->HospID->viewAttributes() ?>><?php echo $store_storemast_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast_view->BRNAME->Visible) { // BRNAME ?>
	<tr id="r_BRNAME">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_BRNAME"><?php echo $store_storemast_view->BRNAME->caption() ?></span></td>
		<td data-name="BRNAME" <?php echo $store_storemast_view->BRNAME->cellAttributes() ?>>
<span id="el_store_storemast_BRNAME">
<span<?php echo $store_storemast_view->BRNAME->viewAttributes() ?>><?php echo $store_storemast_view->BRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_storemast_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$store_storemast_view->isExport()) { ?>
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
$store_storemast_view->terminate();
?>