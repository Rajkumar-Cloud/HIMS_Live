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
<?php include_once "header.php" ?>
<?php if (!$store_storemast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fstore_storemastview = currentForm = new ew.Form("fstore_storemastview", "view");

// Form_CustomValidate event
fstore_storemastview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_storemastview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$store_storemast->isExport()) { ?>
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
<?php if ($store_storemast_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_storemast_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storemast">
<input type="hidden" name="modal" value="<?php echo (int)$store_storemast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_storemast->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_BRCODE"><?php echo $store_storemast->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $store_storemast->BRCODE->cellAttributes() ?>>
<span id="el_store_storemast_BRCODE">
<span<?php echo $store_storemast->BRCODE->viewAttributes() ?>>
<?php echo $store_storemast->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PRC"><?php echo $store_storemast->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $store_storemast->PRC->cellAttributes() ?>>
<span id="el_store_storemast_PRC">
<span<?php echo $store_storemast->PRC->viewAttributes() ?>>
<?php echo $store_storemast->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->TYPE->Visible) { // TYPE ?>
	<tr id="r_TYPE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_TYPE"><?php echo $store_storemast->TYPE->caption() ?></span></td>
		<td data-name="TYPE"<?php echo $store_storemast->TYPE->cellAttributes() ?>>
<span id="el_store_storemast_TYPE">
<span<?php echo $store_storemast->TYPE->viewAttributes() ?>>
<?php echo $store_storemast->TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->DES->Visible) { // DES ?>
	<tr id="r_DES">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_DES"><?php echo $store_storemast->DES->caption() ?></span></td>
		<td data-name="DES"<?php echo $store_storemast->DES->cellAttributes() ?>>
<span id="el_store_storemast_DES">
<span<?php echo $store_storemast->DES->viewAttributes() ?>>
<?php echo $store_storemast->DES->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->UM->Visible) { // UM ?>
	<tr id="r_UM">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_UM"><?php echo $store_storemast->UM->caption() ?></span></td>
		<td data-name="UM"<?php echo $store_storemast->UM->cellAttributes() ?>>
<span id="el_store_storemast_UM">
<span<?php echo $store_storemast->UM->viewAttributes() ?>>
<?php echo $store_storemast->UM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_RT"><?php echo $store_storemast->RT->caption() ?></span></td>
		<td data-name="RT"<?php echo $store_storemast->RT->cellAttributes() ?>>
<span id="el_store_storemast_RT">
<span<?php echo $store_storemast->RT->viewAttributes() ?>>
<?php echo $store_storemast->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_UR"><?php echo $store_storemast->UR->caption() ?></span></td>
		<td data-name="UR"<?php echo $store_storemast->UR->cellAttributes() ?>>
<span id="el_store_storemast_UR">
<span<?php echo $store_storemast->UR->viewAttributes() ?>>
<?php echo $store_storemast->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_TAXP"><?php echo $store_storemast->TAXP->caption() ?></span></td>
		<td data-name="TAXP"<?php echo $store_storemast->TAXP->cellAttributes() ?>>
<span id="el_store_storemast_TAXP">
<span<?php echo $store_storemast->TAXP->viewAttributes() ?>>
<?php echo $store_storemast->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_BATCHNO"><?php echo $store_storemast->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO"<?php echo $store_storemast->BATCHNO->cellAttributes() ?>>
<span id="el_store_storemast_BATCHNO">
<span<?php echo $store_storemast->BATCHNO->viewAttributes() ?>>
<?php echo $store_storemast->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_OQ"><?php echo $store_storemast->OQ->caption() ?></span></td>
		<td data-name="OQ"<?php echo $store_storemast->OQ->cellAttributes() ?>>
<span id="el_store_storemast_OQ">
<span<?php echo $store_storemast->OQ->viewAttributes() ?>>
<?php echo $store_storemast->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_RQ"><?php echo $store_storemast->RQ->caption() ?></span></td>
		<td data-name="RQ"<?php echo $store_storemast->RQ->cellAttributes() ?>>
<span id="el_store_storemast_RQ">
<span<?php echo $store_storemast->RQ->viewAttributes() ?>>
<?php echo $store_storemast->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_MRQ"><?php echo $store_storemast->MRQ->caption() ?></span></td>
		<td data-name="MRQ"<?php echo $store_storemast->MRQ->cellAttributes() ?>>
<span id="el_store_storemast_MRQ">
<span<?php echo $store_storemast->MRQ->viewAttributes() ?>>
<?php echo $store_storemast->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_IQ"><?php echo $store_storemast->IQ->caption() ?></span></td>
		<td data-name="IQ"<?php echo $store_storemast->IQ->cellAttributes() ?>>
<span id="el_store_storemast_IQ">
<span<?php echo $store_storemast->IQ->viewAttributes() ?>>
<?php echo $store_storemast->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_MRP"><?php echo $store_storemast->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $store_storemast->MRP->cellAttributes() ?>>
<span id="el_store_storemast_MRP">
<span<?php echo $store_storemast->MRP->viewAttributes() ?>>
<?php echo $store_storemast->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_EXPDT"><?php echo $store_storemast->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT"<?php echo $store_storemast->EXPDT->cellAttributes() ?>>
<span id="el_store_storemast_EXPDT">
<span<?php echo $store_storemast->EXPDT->viewAttributes() ?>>
<?php echo $store_storemast->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->SALQTY->Visible) { // SALQTY ?>
	<tr id="r_SALQTY">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SALQTY"><?php echo $store_storemast->SALQTY->caption() ?></span></td>
		<td data-name="SALQTY"<?php echo $store_storemast->SALQTY->cellAttributes() ?>>
<span id="el_store_storemast_SALQTY">
<span<?php echo $store_storemast->SALQTY->viewAttributes() ?>>
<?php echo $store_storemast->SALQTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->LASTPURDT->Visible) { // LASTPURDT ?>
	<tr id="r_LASTPURDT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_LASTPURDT"><?php echo $store_storemast->LASTPURDT->caption() ?></span></td>
		<td data-name="LASTPURDT"<?php echo $store_storemast->LASTPURDT->cellAttributes() ?>>
<span id="el_store_storemast_LASTPURDT">
<span<?php echo $store_storemast->LASTPURDT->viewAttributes() ?>>
<?php echo $store_storemast->LASTPURDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->LASTSUPP->Visible) { // LASTSUPP ?>
	<tr id="r_LASTSUPP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_LASTSUPP"><?php echo $store_storemast->LASTSUPP->caption() ?></span></td>
		<td data-name="LASTSUPP"<?php echo $store_storemast->LASTSUPP->cellAttributes() ?>>
<span id="el_store_storemast_LASTSUPP">
<span<?php echo $store_storemast->LASTSUPP->viewAttributes() ?>>
<?php echo $store_storemast->LASTSUPP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_GENNAME"><?php echo $store_storemast->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME"<?php echo $store_storemast->GENNAME->cellAttributes() ?>>
<span id="el_store_storemast_GENNAME">
<span<?php echo $store_storemast->GENNAME->viewAttributes() ?>>
<?php echo $store_storemast->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->LASTISSDT->Visible) { // LASTISSDT ?>
	<tr id="r_LASTISSDT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_LASTISSDT"><?php echo $store_storemast->LASTISSDT->caption() ?></span></td>
		<td data-name="LASTISSDT"<?php echo $store_storemast->LASTISSDT->cellAttributes() ?>>
<span id="el_store_storemast_LASTISSDT">
<span<?php echo $store_storemast->LASTISSDT->viewAttributes() ?>>
<?php echo $store_storemast->LASTISSDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
	<tr id="r_CREATEDDT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_CREATEDDT"><?php echo $store_storemast->CREATEDDT->caption() ?></span></td>
		<td data-name="CREATEDDT"<?php echo $store_storemast->CREATEDDT->cellAttributes() ?>>
<span id="el_store_storemast_CREATEDDT">
<span<?php echo $store_storemast->CREATEDDT->viewAttributes() ?>>
<?php echo $store_storemast->CREATEDDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->OPPRC->Visible) { // OPPRC ?>
	<tr id="r_OPPRC">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_OPPRC"><?php echo $store_storemast->OPPRC->caption() ?></span></td>
		<td data-name="OPPRC"<?php echo $store_storemast->OPPRC->cellAttributes() ?>>
<span id="el_store_storemast_OPPRC">
<span<?php echo $store_storemast->OPPRC->viewAttributes() ?>>
<?php echo $store_storemast->OPPRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->RESTRICT->Visible) { // RESTRICT ?>
	<tr id="r_RESTRICT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_RESTRICT"><?php echo $store_storemast->RESTRICT->caption() ?></span></td>
		<td data-name="RESTRICT"<?php echo $store_storemast->RESTRICT->cellAttributes() ?>>
<span id="el_store_storemast_RESTRICT">
<span<?php echo $store_storemast->RESTRICT->viewAttributes() ?>>
<?php echo $store_storemast->RESTRICT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->BAWAPRC->Visible) { // BAWAPRC ?>
	<tr id="r_BAWAPRC">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_BAWAPRC"><?php echo $store_storemast->BAWAPRC->caption() ?></span></td>
		<td data-name="BAWAPRC"<?php echo $store_storemast->BAWAPRC->cellAttributes() ?>>
<span id="el_store_storemast_BAWAPRC">
<span<?php echo $store_storemast->BAWAPRC->viewAttributes() ?>>
<?php echo $store_storemast->BAWAPRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->STAXPER->Visible) { // STAXPER ?>
	<tr id="r_STAXPER">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_STAXPER"><?php echo $store_storemast->STAXPER->caption() ?></span></td>
		<td data-name="STAXPER"<?php echo $store_storemast->STAXPER->cellAttributes() ?>>
<span id="el_store_storemast_STAXPER">
<span<?php echo $store_storemast->STAXPER->viewAttributes() ?>>
<?php echo $store_storemast->STAXPER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->TAXTYPE->Visible) { // TAXTYPE ?>
	<tr id="r_TAXTYPE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_TAXTYPE"><?php echo $store_storemast->TAXTYPE->caption() ?></span></td>
		<td data-name="TAXTYPE"<?php echo $store_storemast->TAXTYPE->cellAttributes() ?>>
<span id="el_store_storemast_TAXTYPE">
<span<?php echo $store_storemast->TAXTYPE->viewAttributes() ?>>
<?php echo $store_storemast->TAXTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->OLDTAXP->Visible) { // OLDTAXP ?>
	<tr id="r_OLDTAXP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_OLDTAXP"><?php echo $store_storemast->OLDTAXP->caption() ?></span></td>
		<td data-name="OLDTAXP"<?php echo $store_storemast->OLDTAXP->cellAttributes() ?>>
<span id="el_store_storemast_OLDTAXP">
<span<?php echo $store_storemast->OLDTAXP->viewAttributes() ?>>
<?php echo $store_storemast->OLDTAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->TAXUPD->Visible) { // TAXUPD ?>
	<tr id="r_TAXUPD">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_TAXUPD"><?php echo $store_storemast->TAXUPD->caption() ?></span></td>
		<td data-name="TAXUPD"<?php echo $store_storemast->TAXUPD->cellAttributes() ?>>
<span id="el_store_storemast_TAXUPD">
<span<?php echo $store_storemast->TAXUPD->viewAttributes() ?>>
<?php echo $store_storemast->TAXUPD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->PACKAGE->Visible) { // PACKAGE ?>
	<tr id="r_PACKAGE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PACKAGE"><?php echo $store_storemast->PACKAGE->caption() ?></span></td>
		<td data-name="PACKAGE"<?php echo $store_storemast->PACKAGE->cellAttributes() ?>>
<span id="el_store_storemast_PACKAGE">
<span<?php echo $store_storemast->PACKAGE->viewAttributes() ?>>
<?php echo $store_storemast->PACKAGE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->NEWRT->Visible) { // NEWRT ?>
	<tr id="r_NEWRT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_NEWRT"><?php echo $store_storemast->NEWRT->caption() ?></span></td>
		<td data-name="NEWRT"<?php echo $store_storemast->NEWRT->cellAttributes() ?>>
<span id="el_store_storemast_NEWRT">
<span<?php echo $store_storemast->NEWRT->viewAttributes() ?>>
<?php echo $store_storemast->NEWRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->NEWMRP->Visible) { // NEWMRP ?>
	<tr id="r_NEWMRP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_NEWMRP"><?php echo $store_storemast->NEWMRP->caption() ?></span></td>
		<td data-name="NEWMRP"<?php echo $store_storemast->NEWMRP->cellAttributes() ?>>
<span id="el_store_storemast_NEWMRP">
<span<?php echo $store_storemast->NEWMRP->viewAttributes() ?>>
<?php echo $store_storemast->NEWMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->NEWUR->Visible) { // NEWUR ?>
	<tr id="r_NEWUR">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_NEWUR"><?php echo $store_storemast->NEWUR->caption() ?></span></td>
		<td data-name="NEWUR"<?php echo $store_storemast->NEWUR->cellAttributes() ?>>
<span id="el_store_storemast_NEWUR">
<span<?php echo $store_storemast->NEWUR->viewAttributes() ?>>
<?php echo $store_storemast->NEWUR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->STATUS->Visible) { // STATUS ?>
	<tr id="r_STATUS">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_STATUS"><?php echo $store_storemast->STATUS->caption() ?></span></td>
		<td data-name="STATUS"<?php echo $store_storemast->STATUS->cellAttributes() ?>>
<span id="el_store_storemast_STATUS">
<span<?php echo $store_storemast->STATUS->viewAttributes() ?>>
<?php echo $store_storemast->STATUS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->RETNQTY->Visible) { // RETNQTY ?>
	<tr id="r_RETNQTY">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_RETNQTY"><?php echo $store_storemast->RETNQTY->caption() ?></span></td>
		<td data-name="RETNQTY"<?php echo $store_storemast->RETNQTY->cellAttributes() ?>>
<span id="el_store_storemast_RETNQTY">
<span<?php echo $store_storemast->RETNQTY->viewAttributes() ?>>
<?php echo $store_storemast->RETNQTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->KEMODISC->Visible) { // KEMODISC ?>
	<tr id="r_KEMODISC">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_KEMODISC"><?php echo $store_storemast->KEMODISC->caption() ?></span></td>
		<td data-name="KEMODISC"<?php echo $store_storemast->KEMODISC->cellAttributes() ?>>
<span id="el_store_storemast_KEMODISC">
<span<?php echo $store_storemast->KEMODISC->viewAttributes() ?>>
<?php echo $store_storemast->KEMODISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->PATSALE->Visible) { // PATSALE ?>
	<tr id="r_PATSALE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PATSALE"><?php echo $store_storemast->PATSALE->caption() ?></span></td>
		<td data-name="PATSALE"<?php echo $store_storemast->PATSALE->cellAttributes() ?>>
<span id="el_store_storemast_PATSALE">
<span<?php echo $store_storemast->PATSALE->viewAttributes() ?>>
<?php echo $store_storemast->PATSALE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->ORGAN->Visible) { // ORGAN ?>
	<tr id="r_ORGAN">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_ORGAN"><?php echo $store_storemast->ORGAN->caption() ?></span></td>
		<td data-name="ORGAN"<?php echo $store_storemast->ORGAN->cellAttributes() ?>>
<span id="el_store_storemast_ORGAN">
<span<?php echo $store_storemast->ORGAN->viewAttributes() ?>>
<?php echo $store_storemast->ORGAN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->OLDRQ->Visible) { // OLDRQ ?>
	<tr id="r_OLDRQ">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_OLDRQ"><?php echo $store_storemast->OLDRQ->caption() ?></span></td>
		<td data-name="OLDRQ"<?php echo $store_storemast->OLDRQ->cellAttributes() ?>>
<span id="el_store_storemast_OLDRQ">
<span<?php echo $store_storemast->OLDRQ->viewAttributes() ?>>
<?php echo $store_storemast->OLDRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->DRID->Visible) { // DRID ?>
	<tr id="r_DRID">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_DRID"><?php echo $store_storemast->DRID->caption() ?></span></td>
		<td data-name="DRID"<?php echo $store_storemast->DRID->cellAttributes() ?>>
<span id="el_store_storemast_DRID">
<span<?php echo $store_storemast->DRID->viewAttributes() ?>>
<?php echo $store_storemast->DRID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_MFRCODE"><?php echo $store_storemast->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $store_storemast->MFRCODE->cellAttributes() ?>>
<span id="el_store_storemast_MFRCODE">
<span<?php echo $store_storemast->MFRCODE->viewAttributes() ?>>
<?php echo $store_storemast->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->COMBCODE->Visible) { // COMBCODE ?>
	<tr id="r_COMBCODE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_COMBCODE"><?php echo $store_storemast->COMBCODE->caption() ?></span></td>
		<td data-name="COMBCODE"<?php echo $store_storemast->COMBCODE->cellAttributes() ?>>
<span id="el_store_storemast_COMBCODE">
<span<?php echo $store_storemast->COMBCODE->viewAttributes() ?>>
<?php echo $store_storemast->COMBCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->GENCODE->Visible) { // GENCODE ?>
	<tr id="r_GENCODE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_GENCODE"><?php echo $store_storemast->GENCODE->caption() ?></span></td>
		<td data-name="GENCODE"<?php echo $store_storemast->GENCODE->cellAttributes() ?>>
<span id="el_store_storemast_GENCODE">
<span<?php echo $store_storemast->GENCODE->viewAttributes() ?>>
<?php echo $store_storemast->GENCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->STRENGTH->Visible) { // STRENGTH ?>
	<tr id="r_STRENGTH">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_STRENGTH"><?php echo $store_storemast->STRENGTH->caption() ?></span></td>
		<td data-name="STRENGTH"<?php echo $store_storemast->STRENGTH->cellAttributes() ?>>
<span id="el_store_storemast_STRENGTH">
<span<?php echo $store_storemast->STRENGTH->viewAttributes() ?>>
<?php echo $store_storemast->STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->UNIT->Visible) { // UNIT ?>
	<tr id="r_UNIT">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_UNIT"><?php echo $store_storemast->UNIT->caption() ?></span></td>
		<td data-name="UNIT"<?php echo $store_storemast->UNIT->cellAttributes() ?>>
<span id="el_store_storemast_UNIT">
<span<?php echo $store_storemast->UNIT->viewAttributes() ?>>
<?php echo $store_storemast->UNIT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->FORMULARY->Visible) { // FORMULARY ?>
	<tr id="r_FORMULARY">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_FORMULARY"><?php echo $store_storemast->FORMULARY->caption() ?></span></td>
		<td data-name="FORMULARY"<?php echo $store_storemast->FORMULARY->cellAttributes() ?>>
<span id="el_store_storemast_FORMULARY">
<span<?php echo $store_storemast->FORMULARY->viewAttributes() ?>>
<?php echo $store_storemast->FORMULARY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->STOCK->Visible) { // STOCK ?>
	<tr id="r_STOCK">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_STOCK"><?php echo $store_storemast->STOCK->caption() ?></span></td>
		<td data-name="STOCK"<?php echo $store_storemast->STOCK->cellAttributes() ?>>
<span id="el_store_storemast_STOCK">
<span<?php echo $store_storemast->STOCK->viewAttributes() ?>>
<?php echo $store_storemast->STOCK->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->RACKNO->Visible) { // RACKNO ?>
	<tr id="r_RACKNO">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_RACKNO"><?php echo $store_storemast->RACKNO->caption() ?></span></td>
		<td data-name="RACKNO"<?php echo $store_storemast->RACKNO->cellAttributes() ?>>
<span id="el_store_storemast_RACKNO">
<span<?php echo $store_storemast->RACKNO->viewAttributes() ?>>
<?php echo $store_storemast->RACKNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->SUPPNAME->Visible) { // SUPPNAME ?>
	<tr id="r_SUPPNAME">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SUPPNAME"><?php echo $store_storemast->SUPPNAME->caption() ?></span></td>
		<td data-name="SUPPNAME"<?php echo $store_storemast->SUPPNAME->cellAttributes() ?>>
<span id="el_store_storemast_SUPPNAME">
<span<?php echo $store_storemast->SUPPNAME->viewAttributes() ?>>
<?php echo $store_storemast->SUPPNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->COMBNAME->Visible) { // COMBNAME ?>
	<tr id="r_COMBNAME">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_COMBNAME"><?php echo $store_storemast->COMBNAME->caption() ?></span></td>
		<td data-name="COMBNAME"<?php echo $store_storemast->COMBNAME->cellAttributes() ?>>
<span id="el_store_storemast_COMBNAME">
<span<?php echo $store_storemast->COMBNAME->viewAttributes() ?>>
<?php echo $store_storemast->COMBNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
	<tr id="r_GENERICNAME">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_GENERICNAME"><?php echo $store_storemast->GENERICNAME->caption() ?></span></td>
		<td data-name="GENERICNAME"<?php echo $store_storemast->GENERICNAME->cellAttributes() ?>>
<span id="el_store_storemast_GENERICNAME">
<span<?php echo $store_storemast->GENERICNAME->viewAttributes() ?>>
<?php echo $store_storemast->GENERICNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->REMARK->Visible) { // REMARK ?>
	<tr id="r_REMARK">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_REMARK"><?php echo $store_storemast->REMARK->caption() ?></span></td>
		<td data-name="REMARK"<?php echo $store_storemast->REMARK->cellAttributes() ?>>
<span id="el_store_storemast_REMARK">
<span<?php echo $store_storemast->REMARK->viewAttributes() ?>>
<?php echo $store_storemast->REMARK->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->TEMP->Visible) { // TEMP ?>
	<tr id="r_TEMP">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_TEMP"><?php echo $store_storemast->TEMP->caption() ?></span></td>
		<td data-name="TEMP"<?php echo $store_storemast->TEMP->cellAttributes() ?>>
<span id="el_store_storemast_TEMP">
<span<?php echo $store_storemast->TEMP->viewAttributes() ?>>
<?php echo $store_storemast->TEMP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->PACKING->Visible) { // PACKING ?>
	<tr id="r_PACKING">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PACKING"><?php echo $store_storemast->PACKING->caption() ?></span></td>
		<td data-name="PACKING"<?php echo $store_storemast->PACKING->cellAttributes() ?>>
<span id="el_store_storemast_PACKING">
<span<?php echo $store_storemast->PACKING->viewAttributes() ?>>
<?php echo $store_storemast->PACKING->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->PhysQty->Visible) { // PhysQty ?>
	<tr id="r_PhysQty">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PhysQty"><?php echo $store_storemast->PhysQty->caption() ?></span></td>
		<td data-name="PhysQty"<?php echo $store_storemast->PhysQty->cellAttributes() ?>>
<span id="el_store_storemast_PhysQty">
<span<?php echo $store_storemast->PhysQty->viewAttributes() ?>>
<?php echo $store_storemast->PhysQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->LedQty->Visible) { // LedQty ?>
	<tr id="r_LedQty">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_LedQty"><?php echo $store_storemast->LedQty->caption() ?></span></td>
		<td data-name="LedQty"<?php echo $store_storemast->LedQty->cellAttributes() ?>>
<span id="el_store_storemast_LedQty">
<span<?php echo $store_storemast->LedQty->viewAttributes() ?>>
<?php echo $store_storemast->LedQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_id"><?php echo $store_storemast->id->caption() ?></span></td>
		<td data-name="id"<?php echo $store_storemast->id->cellAttributes() ?>>
<span id="el_store_storemast_id">
<span<?php echo $store_storemast->id->viewAttributes() ?>>
<?php echo $store_storemast->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PurValue"><?php echo $store_storemast->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $store_storemast->PurValue->cellAttributes() ?>>
<span id="el_store_storemast_PurValue">
<span<?php echo $store_storemast->PurValue->viewAttributes() ?>>
<?php echo $store_storemast->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PSGST"><?php echo $store_storemast->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $store_storemast->PSGST->cellAttributes() ?>>
<span id="el_store_storemast_PSGST">
<span<?php echo $store_storemast->PSGST->viewAttributes() ?>>
<?php echo $store_storemast->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_PCGST"><?php echo $store_storemast->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $store_storemast->PCGST->cellAttributes() ?>>
<span id="el_store_storemast_PCGST">
<span<?php echo $store_storemast->PCGST->viewAttributes() ?>>
<?php echo $store_storemast->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->SaleValue->Visible) { // SaleValue ?>
	<tr id="r_SaleValue">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SaleValue"><?php echo $store_storemast->SaleValue->caption() ?></span></td>
		<td data-name="SaleValue"<?php echo $store_storemast->SaleValue->cellAttributes() ?>>
<span id="el_store_storemast_SaleValue">
<span<?php echo $store_storemast->SaleValue->viewAttributes() ?>>
<?php echo $store_storemast->SaleValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SSGST"><?php echo $store_storemast->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $store_storemast->SSGST->cellAttributes() ?>>
<span id="el_store_storemast_SSGST">
<span<?php echo $store_storemast->SSGST->viewAttributes() ?>>
<?php echo $store_storemast->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SCGST"><?php echo $store_storemast->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $store_storemast->SCGST->cellAttributes() ?>>
<span id="el_store_storemast_SCGST">
<span<?php echo $store_storemast->SCGST->viewAttributes() ?>>
<?php echo $store_storemast->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->SaleRate->Visible) { // SaleRate ?>
	<tr id="r_SaleRate">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_SaleRate"><?php echo $store_storemast->SaleRate->caption() ?></span></td>
		<td data-name="SaleRate"<?php echo $store_storemast->SaleRate->cellAttributes() ?>>
<span id="el_store_storemast_SaleRate">
<span<?php echo $store_storemast->SaleRate->viewAttributes() ?>>
<?php echo $store_storemast->SaleRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_HospID"><?php echo $store_storemast->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $store_storemast->HospID->cellAttributes() ?>>
<span id="el_store_storemast_HospID">
<span<?php echo $store_storemast->HospID->viewAttributes() ?>>
<?php echo $store_storemast->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->BRNAME->Visible) { // BRNAME ?>
	<tr id="r_BRNAME">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_BRNAME"><?php echo $store_storemast->BRNAME->caption() ?></span></td>
		<td data-name="BRNAME"<?php echo $store_storemast->BRNAME->cellAttributes() ?>>
<span id="el_store_storemast_BRNAME">
<span<?php echo $store_storemast->BRNAME->viewAttributes() ?>>
<?php echo $store_storemast->BRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->OV->Visible) { // OV ?>
	<tr id="r_OV">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_OV"><?php echo $store_storemast->OV->caption() ?></span></td>
		<td data-name="OV"<?php echo $store_storemast->OV->cellAttributes() ?>>
<span id="el_store_storemast_OV">
<span<?php echo $store_storemast->OV->viewAttributes() ?>>
<?php echo $store_storemast->OV->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->LATESTOV->Visible) { // LATESTOV ?>
	<tr id="r_LATESTOV">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_LATESTOV"><?php echo $store_storemast->LATESTOV->caption() ?></span></td>
		<td data-name="LATESTOV"<?php echo $store_storemast->LATESTOV->cellAttributes() ?>>
<span id="el_store_storemast_LATESTOV">
<span<?php echo $store_storemast->LATESTOV->viewAttributes() ?>>
<?php echo $store_storemast->LATESTOV->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->ITEMTYPE->Visible) { // ITEMTYPE ?>
	<tr id="r_ITEMTYPE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_ITEMTYPE"><?php echo $store_storemast->ITEMTYPE->caption() ?></span></td>
		<td data-name="ITEMTYPE"<?php echo $store_storemast->ITEMTYPE->cellAttributes() ?>>
<span id="el_store_storemast_ITEMTYPE">
<span<?php echo $store_storemast->ITEMTYPE->viewAttributes() ?>>
<?php echo $store_storemast->ITEMTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->ROWID->Visible) { // ROWID ?>
	<tr id="r_ROWID">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_ROWID"><?php echo $store_storemast->ROWID->caption() ?></span></td>
		<td data-name="ROWID"<?php echo $store_storemast->ROWID->cellAttributes() ?>>
<span id="el_store_storemast_ROWID">
<span<?php echo $store_storemast->ROWID->viewAttributes() ?>>
<?php echo $store_storemast->ROWID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->MOVED->Visible) { // MOVED ?>
	<tr id="r_MOVED">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_MOVED"><?php echo $store_storemast->MOVED->caption() ?></span></td>
		<td data-name="MOVED"<?php echo $store_storemast->MOVED->cellAttributes() ?>>
<span id="el_store_storemast_MOVED">
<span<?php echo $store_storemast->MOVED->viewAttributes() ?>>
<?php echo $store_storemast->MOVED->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->NEWTAX->Visible) { // NEWTAX ?>
	<tr id="r_NEWTAX">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_NEWTAX"><?php echo $store_storemast->NEWTAX->caption() ?></span></td>
		<td data-name="NEWTAX"<?php echo $store_storemast->NEWTAX->cellAttributes() ?>>
<span id="el_store_storemast_NEWTAX">
<span<?php echo $store_storemast->NEWTAX->viewAttributes() ?>>
<?php echo $store_storemast->NEWTAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->HSNCODE->Visible) { // HSNCODE ?>
	<tr id="r_HSNCODE">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_HSNCODE"><?php echo $store_storemast->HSNCODE->caption() ?></span></td>
		<td data-name="HSNCODE"<?php echo $store_storemast->HSNCODE->cellAttributes() ?>>
<span id="el_store_storemast_HSNCODE">
<span<?php echo $store_storemast->HSNCODE->viewAttributes() ?>>
<?php echo $store_storemast->HSNCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->OLDTAX->Visible) { // OLDTAX ?>
	<tr id="r_OLDTAX">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_OLDTAX"><?php echo $store_storemast->OLDTAX->caption() ?></span></td>
		<td data-name="OLDTAX"<?php echo $store_storemast->OLDTAX->cellAttributes() ?>>
<span id="el_store_storemast_OLDTAX">
<span<?php echo $store_storemast->OLDTAX->viewAttributes() ?>>
<?php echo $store_storemast->OLDTAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_storemast->StoreID->Visible) { // StoreID ?>
	<tr id="r_StoreID">
		<td class="<?php echo $store_storemast_view->TableLeftColumnClass ?>"><span id="elh_store_storemast_StoreID"><?php echo $store_storemast->StoreID->caption() ?></span></td>
		<td data-name="StoreID"<?php echo $store_storemast->StoreID->cellAttributes() ?>>
<span id="el_store_storemast_StoreID">
<span<?php echo $store_storemast->StoreID->viewAttributes() ?>>
<?php echo $store_storemast->StoreID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_storemast_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_storemast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_storemast_view->terminate();
?>