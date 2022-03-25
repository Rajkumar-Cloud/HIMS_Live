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
$store_batchmas_view = new store_batchmas_view();

// Run the page
$store_batchmas_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_batchmas_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$store_batchmas_view->isExport()) { ?>
<script>
var fstore_batchmasview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fstore_batchmasview = currentForm = new ew.Form("fstore_batchmasview", "view");
	loadjs.done("fstore_batchmasview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$store_batchmas_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $store_batchmas_view->ExportOptions->render("body") ?>
<?php $store_batchmas_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $store_batchmas_view->showPageHeader(); ?>
<?php
$store_batchmas_view->showMessage();
?>
<form name="fstore_batchmasview" id="fstore_batchmasview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_batchmas">
<input type="hidden" name="modal" value="<?php echo (int)$store_batchmas_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_batchmas_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PRC"><?php echo $store_batchmas_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $store_batchmas_view->PRC->cellAttributes() ?>>
<span id="el_store_batchmas_PRC">
<span<?php echo $store_batchmas_view->PRC->viewAttributes() ?>><?php echo $store_batchmas_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_BATCHNO"><?php echo $store_batchmas_view->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO" <?php echo $store_batchmas_view->BATCHNO->cellAttributes() ?>>
<span id="el_store_batchmas_BATCHNO">
<span<?php echo $store_batchmas_view->BATCHNO->viewAttributes() ?>><?php echo $store_batchmas_view->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_OQ"><?php echo $store_batchmas_view->OQ->caption() ?></span></td>
		<td data-name="OQ" <?php echo $store_batchmas_view->OQ->cellAttributes() ?>>
<span id="el_store_batchmas_OQ">
<span<?php echo $store_batchmas_view->OQ->viewAttributes() ?>><?php echo $store_batchmas_view->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_RQ"><?php echo $store_batchmas_view->RQ->caption() ?></span></td>
		<td data-name="RQ" <?php echo $store_batchmas_view->RQ->cellAttributes() ?>>
<span id="el_store_batchmas_RQ">
<span<?php echo $store_batchmas_view->RQ->viewAttributes() ?>><?php echo $store_batchmas_view->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_MRQ"><?php echo $store_batchmas_view->MRQ->caption() ?></span></td>
		<td data-name="MRQ" <?php echo $store_batchmas_view->MRQ->cellAttributes() ?>>
<span id="el_store_batchmas_MRQ">
<span<?php echo $store_batchmas_view->MRQ->viewAttributes() ?>><?php echo $store_batchmas_view->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_IQ"><?php echo $store_batchmas_view->IQ->caption() ?></span></td>
		<td data-name="IQ" <?php echo $store_batchmas_view->IQ->cellAttributes() ?>>
<span id="el_store_batchmas_IQ">
<span<?php echo $store_batchmas_view->IQ->viewAttributes() ?>><?php echo $store_batchmas_view->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_MRP"><?php echo $store_batchmas_view->MRP->caption() ?></span></td>
		<td data-name="MRP" <?php echo $store_batchmas_view->MRP->cellAttributes() ?>>
<span id="el_store_batchmas_MRP">
<span<?php echo $store_batchmas_view->MRP->viewAttributes() ?>><?php echo $store_batchmas_view->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_EXPDT"><?php echo $store_batchmas_view->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT" <?php echo $store_batchmas_view->EXPDT->cellAttributes() ?>>
<span id="el_store_batchmas_EXPDT">
<span<?php echo $store_batchmas_view->EXPDT->viewAttributes() ?>><?php echo $store_batchmas_view->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_UR"><?php echo $store_batchmas_view->UR->caption() ?></span></td>
		<td data-name="UR" <?php echo $store_batchmas_view->UR->cellAttributes() ?>>
<span id="el_store_batchmas_UR">
<span<?php echo $store_batchmas_view->UR->viewAttributes() ?>><?php echo $store_batchmas_view->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_RT"><?php echo $store_batchmas_view->RT->caption() ?></span></td>
		<td data-name="RT" <?php echo $store_batchmas_view->RT->cellAttributes() ?>>
<span id="el_store_batchmas_RT">
<span<?php echo $store_batchmas_view->RT->viewAttributes() ?>><?php echo $store_batchmas_view->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PRCODE"><?php echo $store_batchmas_view->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE" <?php echo $store_batchmas_view->PRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_PRCODE">
<span<?php echo $store_batchmas_view->PRCODE->viewAttributes() ?>><?php echo $store_batchmas_view->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->BATCH->Visible) { // BATCH ?>
	<tr id="r_BATCH">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_BATCH"><?php echo $store_batchmas_view->BATCH->caption() ?></span></td>
		<td data-name="BATCH" <?php echo $store_batchmas_view->BATCH->cellAttributes() ?>>
<span id="el_store_batchmas_BATCH">
<span<?php echo $store_batchmas_view->BATCH->viewAttributes() ?>><?php echo $store_batchmas_view->BATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PC"><?php echo $store_batchmas_view->PC->caption() ?></span></td>
		<td data-name="PC" <?php echo $store_batchmas_view->PC->cellAttributes() ?>>
<span id="el_store_batchmas_PC">
<span<?php echo $store_batchmas_view->PC->viewAttributes() ?>><?php echo $store_batchmas_view->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->OLDRT->Visible) { // OLDRT ?>
	<tr id="r_OLDRT">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_OLDRT"><?php echo $store_batchmas_view->OLDRT->caption() ?></span></td>
		<td data-name="OLDRT" <?php echo $store_batchmas_view->OLDRT->cellAttributes() ?>>
<span id="el_store_batchmas_OLDRT">
<span<?php echo $store_batchmas_view->OLDRT->viewAttributes() ?>><?php echo $store_batchmas_view->OLDRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<tr id="r_TEMPMRQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_TEMPMRQ"><?php echo $store_batchmas_view->TEMPMRQ->caption() ?></span></td>
		<td data-name="TEMPMRQ" <?php echo $store_batchmas_view->TEMPMRQ->cellAttributes() ?>>
<span id="el_store_batchmas_TEMPMRQ">
<span<?php echo $store_batchmas_view->TEMPMRQ->viewAttributes() ?>><?php echo $store_batchmas_view->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_TAXP"><?php echo $store_batchmas_view->TAXP->caption() ?></span></td>
		<td data-name="TAXP" <?php echo $store_batchmas_view->TAXP->cellAttributes() ?>>
<span id="el_store_batchmas_TAXP">
<span<?php echo $store_batchmas_view->TAXP->viewAttributes() ?>><?php echo $store_batchmas_view->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->OLDRATE->Visible) { // OLDRATE ?>
	<tr id="r_OLDRATE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_OLDRATE"><?php echo $store_batchmas_view->OLDRATE->caption() ?></span></td>
		<td data-name="OLDRATE" <?php echo $store_batchmas_view->OLDRATE->cellAttributes() ?>>
<span id="el_store_batchmas_OLDRATE">
<span<?php echo $store_batchmas_view->OLDRATE->viewAttributes() ?>><?php echo $store_batchmas_view->OLDRATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->NEWRATE->Visible) { // NEWRATE ?>
	<tr id="r_NEWRATE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_NEWRATE"><?php echo $store_batchmas_view->NEWRATE->caption() ?></span></td>
		<td data-name="NEWRATE" <?php echo $store_batchmas_view->NEWRATE->cellAttributes() ?>>
<span id="el_store_batchmas_NEWRATE">
<span<?php echo $store_batchmas_view->NEWRATE->viewAttributes() ?>><?php echo $store_batchmas_view->NEWRATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<tr id="r_OTEMPMRA">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_OTEMPMRA"><?php echo $store_batchmas_view->OTEMPMRA->caption() ?></span></td>
		<td data-name="OTEMPMRA" <?php echo $store_batchmas_view->OTEMPMRA->cellAttributes() ?>>
<span id="el_store_batchmas_OTEMPMRA">
<span<?php echo $store_batchmas_view->OTEMPMRA->viewAttributes() ?>><?php echo $store_batchmas_view->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<tr id="r_ACTIVESTATUS">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_ACTIVESTATUS"><?php echo $store_batchmas_view->ACTIVESTATUS->caption() ?></span></td>
		<td data-name="ACTIVESTATUS" <?php echo $store_batchmas_view->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_store_batchmas_ACTIVESTATUS">
<span<?php echo $store_batchmas_view->ACTIVESTATUS->viewAttributes() ?>><?php echo $store_batchmas_view->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_id"><?php echo $store_batchmas_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $store_batchmas_view->id->cellAttributes() ?>>
<span id="el_store_batchmas_id">
<span<?php echo $store_batchmas_view->id->viewAttributes() ?>><?php echo $store_batchmas_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PrName"><?php echo $store_batchmas_view->PrName->caption() ?></span></td>
		<td data-name="PrName" <?php echo $store_batchmas_view->PrName->cellAttributes() ?>>
<span id="el_store_batchmas_PrName">
<span<?php echo $store_batchmas_view->PrName->viewAttributes() ?>><?php echo $store_batchmas_view->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PSGST"><?php echo $store_batchmas_view->PSGST->caption() ?></span></td>
		<td data-name="PSGST" <?php echo $store_batchmas_view->PSGST->cellAttributes() ?>>
<span id="el_store_batchmas_PSGST">
<span<?php echo $store_batchmas_view->PSGST->viewAttributes() ?>><?php echo $store_batchmas_view->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PCGST"><?php echo $store_batchmas_view->PCGST->caption() ?></span></td>
		<td data-name="PCGST" <?php echo $store_batchmas_view->PCGST->cellAttributes() ?>>
<span id="el_store_batchmas_PCGST">
<span<?php echo $store_batchmas_view->PCGST->viewAttributes() ?>><?php echo $store_batchmas_view->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_SSGST"><?php echo $store_batchmas_view->SSGST->caption() ?></span></td>
		<td data-name="SSGST" <?php echo $store_batchmas_view->SSGST->cellAttributes() ?>>
<span id="el_store_batchmas_SSGST">
<span<?php echo $store_batchmas_view->SSGST->viewAttributes() ?>><?php echo $store_batchmas_view->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_SCGST"><?php echo $store_batchmas_view->SCGST->caption() ?></span></td>
		<td data-name="SCGST" <?php echo $store_batchmas_view->SCGST->cellAttributes() ?>>
<span id="el_store_batchmas_SCGST">
<span<?php echo $store_batchmas_view->SCGST->viewAttributes() ?>><?php echo $store_batchmas_view->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_MFRCODE"><?php echo $store_batchmas_view->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE" <?php echo $store_batchmas_view->MFRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_MFRCODE">
<span<?php echo $store_batchmas_view->MFRCODE->viewAttributes() ?>><?php echo $store_batchmas_view->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_BRCODE"><?php echo $store_batchmas_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $store_batchmas_view->BRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_BRCODE">
<span<?php echo $store_batchmas_view->BRCODE->viewAttributes() ?>><?php echo $store_batchmas_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_batchmas_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$store_batchmas_view->isExport()) { ?>
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
$store_batchmas_view->terminate();
?>