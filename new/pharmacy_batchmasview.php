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
$pharmacy_batchmas_view = new pharmacy_batchmas_view();

// Run the page
$pharmacy_batchmas_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_batchmas_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_batchmas_view->isExport()) { ?>
<script>
var fpharmacy_batchmasview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_batchmasview = currentForm = new ew.Form("fpharmacy_batchmasview", "view");
	loadjs.done("fpharmacy_batchmasview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_batchmas_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_batchmas_view->ExportOptions->render("body") ?>
<?php $pharmacy_batchmas_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_batchmas_view->showPageHeader(); ?>
<?php
$pharmacy_batchmas_view->showMessage();
?>
<form name="fpharmacy_batchmasview" id="fpharmacy_batchmasview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_batchmas_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_batchmas_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRC"><?php echo $pharmacy_batchmas_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $pharmacy_batchmas_view->PRC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRC">
<span<?php echo $pharmacy_batchmas_view->PRC->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PrName"><?php echo $pharmacy_batchmas_view->PrName->caption() ?></span></td>
		<td data-name="PrName" <?php echo $pharmacy_batchmas_view->PrName->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PrName">
<span<?php echo $pharmacy_batchmas_view->PrName->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCHNO"><?php echo $pharmacy_batchmas_view->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO" <?php echo $pharmacy_batchmas_view->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCHNO">
<span<?php echo $pharmacy_batchmas_view->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->BATCH->Visible) { // BATCH ?>
	<tr id="r_BATCH">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCH"><?php echo $pharmacy_batchmas_view->BATCH->caption() ?></span></td>
		<td data-name="BATCH" <?php echo $pharmacy_batchmas_view->BATCH->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCH">
<span<?php echo $pharmacy_batchmas_view->BATCH->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->BATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MFRCODE"><?php echo $pharmacy_batchmas_view->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE" <?php echo $pharmacy_batchmas_view->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MFRCODE">
<span<?php echo $pharmacy_batchmas_view->MFRCODE->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_EXPDT"><?php echo $pharmacy_batchmas_view->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT" <?php echo $pharmacy_batchmas_view->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_EXPDT">
<span<?php echo $pharmacy_batchmas_view->EXPDT->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRCODE"><?php echo $pharmacy_batchmas_view->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE" <?php echo $pharmacy_batchmas_view->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRCODE">
<span<?php echo $pharmacy_batchmas_view->PRCODE->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OQ"><?php echo $pharmacy_batchmas_view->OQ->caption() ?></span></td>
		<td data-name="OQ" <?php echo $pharmacy_batchmas_view->OQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OQ">
<span<?php echo $pharmacy_batchmas_view->OQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RQ"><?php echo $pharmacy_batchmas_view->RQ->caption() ?></span></td>
		<td data-name="RQ" <?php echo $pharmacy_batchmas_view->RQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RQ">
<span<?php echo $pharmacy_batchmas_view->RQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->FRQ->Visible) { // FRQ ?>
	<tr id="r_FRQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_FRQ"><?php echo $pharmacy_batchmas_view->FRQ->caption() ?></span></td>
		<td data-name="FRQ" <?php echo $pharmacy_batchmas_view->FRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_FRQ">
<span<?php echo $pharmacy_batchmas_view->FRQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->FRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_IQ"><?php echo $pharmacy_batchmas_view->IQ->caption() ?></span></td>
		<td data-name="IQ" <?php echo $pharmacy_batchmas_view->IQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_IQ">
<span<?php echo $pharmacy_batchmas_view->IQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRQ"><?php echo $pharmacy_batchmas_view->MRQ->caption() ?></span></td>
		<td data-name="MRQ" <?php echo $pharmacy_batchmas_view->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRQ">
<span<?php echo $pharmacy_batchmas_view->MRQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRP"><?php echo $pharmacy_batchmas_view->MRP->caption() ?></span></td>
		<td data-name="MRP" <?php echo $pharmacy_batchmas_view->MRP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRP">
<span<?php echo $pharmacy_batchmas_view->MRP->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UR"><?php echo $pharmacy_batchmas_view->UR->caption() ?></span></td>
		<td data-name="UR" <?php echo $pharmacy_batchmas_view->UR->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UR">
<span<?php echo $pharmacy_batchmas_view->UR->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PC"><?php echo $pharmacy_batchmas_view->PC->caption() ?></span></td>
		<td data-name="PC" <?php echo $pharmacy_batchmas_view->PC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PC">
<span<?php echo $pharmacy_batchmas_view->PC->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->OLDRT->Visible) { // OLDRT ?>
	<tr id="r_OLDRT">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRT"><?php echo $pharmacy_batchmas_view->OLDRT->caption() ?></span></td>
		<td data-name="OLDRT" <?php echo $pharmacy_batchmas_view->OLDRT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRT">
<span<?php echo $pharmacy_batchmas_view->OLDRT->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->OLDRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<tr id="r_TEMPMRQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TEMPMRQ"><?php echo $pharmacy_batchmas_view->TEMPMRQ->caption() ?></span></td>
		<td data-name="TEMPMRQ" <?php echo $pharmacy_batchmas_view->TEMPMRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TEMPMRQ">
<span<?php echo $pharmacy_batchmas_view->TEMPMRQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TAXP"><?php echo $pharmacy_batchmas_view->TAXP->caption() ?></span></td>
		<td data-name="TAXP" <?php echo $pharmacy_batchmas_view->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TAXP">
<span<?php echo $pharmacy_batchmas_view->TAXP->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->OLDRATE->Visible) { // OLDRATE ?>
	<tr id="r_OLDRATE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRATE"><?php echo $pharmacy_batchmas_view->OLDRATE->caption() ?></span></td>
		<td data-name="OLDRATE" <?php echo $pharmacy_batchmas_view->OLDRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRATE">
<span<?php echo $pharmacy_batchmas_view->OLDRATE->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->OLDRATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->NEWRATE->Visible) { // NEWRATE ?>
	<tr id="r_NEWRATE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_NEWRATE"><?php echo $pharmacy_batchmas_view->NEWRATE->caption() ?></span></td>
		<td data-name="NEWRATE" <?php echo $pharmacy_batchmas_view->NEWRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_NEWRATE">
<span<?php echo $pharmacy_batchmas_view->NEWRATE->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->NEWRATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<tr id="r_OTEMPMRA">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OTEMPMRA"><?php echo $pharmacy_batchmas_view->OTEMPMRA->caption() ?></span></td>
		<td data-name="OTEMPMRA" <?php echo $pharmacy_batchmas_view->OTEMPMRA->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OTEMPMRA">
<span<?php echo $pharmacy_batchmas_view->OTEMPMRA->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<tr id="r_ACTIVESTATUS">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_ACTIVESTATUS"><?php echo $pharmacy_batchmas_view->ACTIVESTATUS->caption() ?></span></td>
		<td data-name="ACTIVESTATUS" <?php echo $pharmacy_batchmas_view->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_ACTIVESTATUS">
<span<?php echo $pharmacy_batchmas_view->ACTIVESTATUS->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_id"><?php echo $pharmacy_batchmas_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_batchmas_view->id->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_id">
<span<?php echo $pharmacy_batchmas_view->id->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PSGST"><?php echo $pharmacy_batchmas_view->PSGST->caption() ?></span></td>
		<td data-name="PSGST" <?php echo $pharmacy_batchmas_view->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PSGST">
<span<?php echo $pharmacy_batchmas_view->PSGST->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PCGST"><?php echo $pharmacy_batchmas_view->PCGST->caption() ?></span></td>
		<td data-name="PCGST" <?php echo $pharmacy_batchmas_view->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PCGST">
<span<?php echo $pharmacy_batchmas_view->PCGST->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SSGST"><?php echo $pharmacy_batchmas_view->SSGST->caption() ?></span></td>
		<td data-name="SSGST" <?php echo $pharmacy_batchmas_view->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SSGST">
<span<?php echo $pharmacy_batchmas_view->SSGST->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SCGST"><?php echo $pharmacy_batchmas_view->SCGST->caption() ?></span></td>
		<td data-name="SCGST" <?php echo $pharmacy_batchmas_view->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SCGST">
<span<?php echo $pharmacy_batchmas_view->SCGST->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RT"><?php echo $pharmacy_batchmas_view->RT->caption() ?></span></td>
		<td data-name="RT" <?php echo $pharmacy_batchmas_view->RT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RT">
<span<?php echo $pharmacy_batchmas_view->RT->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BRCODE"><?php echo $pharmacy_batchmas_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $pharmacy_batchmas_view->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BRCODE">
<span<?php echo $pharmacy_batchmas_view->BRCODE->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_HospID"><?php echo $pharmacy_batchmas_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $pharmacy_batchmas_view->HospID->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_HospID">
<span<?php echo $pharmacy_batchmas_view->HospID->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->UM->Visible) { // UM ?>
	<tr id="r_UM">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UM"><?php echo $pharmacy_batchmas_view->UM->caption() ?></span></td>
		<td data-name="UM" <?php echo $pharmacy_batchmas_view->UM->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UM">
<span<?php echo $pharmacy_batchmas_view->UM->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->UM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_GENNAME"><?php echo $pharmacy_batchmas_view->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME" <?php echo $pharmacy_batchmas_view->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_GENNAME">
<span<?php echo $pharmacy_batchmas_view->GENNAME->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas_view->BILLDATE->Visible) { // BILLDATE ?>
	<tr id="r_BILLDATE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BILLDATE"><?php echo $pharmacy_batchmas_view->BILLDATE->caption() ?></span></td>
		<td data-name="BILLDATE" <?php echo $pharmacy_batchmas_view->BILLDATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BILLDATE">
<span<?php echo $pharmacy_batchmas_view->BILLDATE->viewAttributes() ?>><?php echo $pharmacy_batchmas_view->BILLDATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_batchmas_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_batchmas_view->isExport()) { ?>
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
$pharmacy_batchmas_view->terminate();
?>