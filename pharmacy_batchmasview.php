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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_batchmas->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_batchmasview = currentForm = new ew.Form("fpharmacy_batchmasview", "view");

// Form_CustomValidate event
fpharmacy_batchmasview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_batchmasview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_batchmasview.lists["x_PrName"] = <?php echo $pharmacy_batchmas_view->PrName->Lookup->toClientList() ?>;
fpharmacy_batchmasview.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_view->PrName->lookupOptions()) ?>;
fpharmacy_batchmasview.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_batchmasview.lists["x_BRCODE"] = <?php echo $pharmacy_batchmas_view->BRCODE->Lookup->toClientList() ?>;
fpharmacy_batchmasview.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_batchmas_view->BRCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_batchmas->isExport()) { ?>
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
<?php if ($pharmacy_batchmas_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_batchmas_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_batchmas_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_batchmas->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRC"><?php echo $pharmacy_batchmas->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $pharmacy_batchmas->PRC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRC">
<span<?php echo $pharmacy_batchmas->PRC->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PrName"><?php echo $pharmacy_batchmas->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $pharmacy_batchmas->PrName->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PrName">
<span<?php echo $pharmacy_batchmas->PrName->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCHNO"><?php echo $pharmacy_batchmas->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO"<?php echo $pharmacy_batchmas->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCHNO">
<span<?php echo $pharmacy_batchmas->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->BATCH->Visible) { // BATCH ?>
	<tr id="r_BATCH">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCH"><?php echo $pharmacy_batchmas->BATCH->caption() ?></span></td>
		<td data-name="BATCH"<?php echo $pharmacy_batchmas->BATCH->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCH">
<span<?php echo $pharmacy_batchmas->BATCH->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->BATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MFRCODE"><?php echo $pharmacy_batchmas->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $pharmacy_batchmas->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MFRCODE">
<span<?php echo $pharmacy_batchmas->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_EXPDT"><?php echo $pharmacy_batchmas->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT"<?php echo $pharmacy_batchmas->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_EXPDT">
<span<?php echo $pharmacy_batchmas->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRCODE"><?php echo $pharmacy_batchmas->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE"<?php echo $pharmacy_batchmas->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRCODE">
<span<?php echo $pharmacy_batchmas->PRCODE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OQ"><?php echo $pharmacy_batchmas->OQ->caption() ?></span></td>
		<td data-name="OQ"<?php echo $pharmacy_batchmas->OQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OQ">
<span<?php echo $pharmacy_batchmas->OQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RQ"><?php echo $pharmacy_batchmas->RQ->caption() ?></span></td>
		<td data-name="RQ"<?php echo $pharmacy_batchmas->RQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RQ">
<span<?php echo $pharmacy_batchmas->RQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->FRQ->Visible) { // FRQ ?>
	<tr id="r_FRQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_FRQ"><?php echo $pharmacy_batchmas->FRQ->caption() ?></span></td>
		<td data-name="FRQ"<?php echo $pharmacy_batchmas->FRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_FRQ">
<span<?php echo $pharmacy_batchmas->FRQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->FRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_IQ"><?php echo $pharmacy_batchmas->IQ->caption() ?></span></td>
		<td data-name="IQ"<?php echo $pharmacy_batchmas->IQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_IQ">
<span<?php echo $pharmacy_batchmas->IQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRQ"><?php echo $pharmacy_batchmas->MRQ->caption() ?></span></td>
		<td data-name="MRQ"<?php echo $pharmacy_batchmas->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRQ">
<span<?php echo $pharmacy_batchmas->MRQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRP"><?php echo $pharmacy_batchmas->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $pharmacy_batchmas->MRP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRP">
<span<?php echo $pharmacy_batchmas->MRP->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UR"><?php echo $pharmacy_batchmas->UR->caption() ?></span></td>
		<td data-name="UR"<?php echo $pharmacy_batchmas->UR->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UR">
<span<?php echo $pharmacy_batchmas->UR->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PC"><?php echo $pharmacy_batchmas->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $pharmacy_batchmas->PC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PC">
<span<?php echo $pharmacy_batchmas->PC->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->OLDRT->Visible) { // OLDRT ?>
	<tr id="r_OLDRT">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRT"><?php echo $pharmacy_batchmas->OLDRT->caption() ?></span></td>
		<td data-name="OLDRT"<?php echo $pharmacy_batchmas->OLDRT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRT">
<span<?php echo $pharmacy_batchmas->OLDRT->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->OLDRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<tr id="r_TEMPMRQ">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TEMPMRQ"><?php echo $pharmacy_batchmas->TEMPMRQ->caption() ?></span></td>
		<td data-name="TEMPMRQ"<?php echo $pharmacy_batchmas->TEMPMRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TEMPMRQ">
<span<?php echo $pharmacy_batchmas->TEMPMRQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TAXP"><?php echo $pharmacy_batchmas->TAXP->caption() ?></span></td>
		<td data-name="TAXP"<?php echo $pharmacy_batchmas->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TAXP">
<span<?php echo $pharmacy_batchmas->TAXP->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->OLDRATE->Visible) { // OLDRATE ?>
	<tr id="r_OLDRATE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRATE"><?php echo $pharmacy_batchmas->OLDRATE->caption() ?></span></td>
		<td data-name="OLDRATE"<?php echo $pharmacy_batchmas->OLDRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRATE">
<span<?php echo $pharmacy_batchmas->OLDRATE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->OLDRATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->NEWRATE->Visible) { // NEWRATE ?>
	<tr id="r_NEWRATE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_NEWRATE"><?php echo $pharmacy_batchmas->NEWRATE->caption() ?></span></td>
		<td data-name="NEWRATE"<?php echo $pharmacy_batchmas->NEWRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_NEWRATE">
<span<?php echo $pharmacy_batchmas->NEWRATE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->NEWRATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<tr id="r_OTEMPMRA">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OTEMPMRA"><?php echo $pharmacy_batchmas->OTEMPMRA->caption() ?></span></td>
		<td data-name="OTEMPMRA"<?php echo $pharmacy_batchmas->OTEMPMRA->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OTEMPMRA">
<span<?php echo $pharmacy_batchmas->OTEMPMRA->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<tr id="r_ACTIVESTATUS">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_ACTIVESTATUS"><?php echo $pharmacy_batchmas->ACTIVESTATUS->caption() ?></span></td>
		<td data-name="ACTIVESTATUS"<?php echo $pharmacy_batchmas->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_ACTIVESTATUS">
<span<?php echo $pharmacy_batchmas->ACTIVESTATUS->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_id"><?php echo $pharmacy_batchmas->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_batchmas->id->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_id">
<span<?php echo $pharmacy_batchmas->id->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PSGST"><?php echo $pharmacy_batchmas->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $pharmacy_batchmas->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PSGST">
<span<?php echo $pharmacy_batchmas->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PCGST"><?php echo $pharmacy_batchmas->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $pharmacy_batchmas->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PCGST">
<span<?php echo $pharmacy_batchmas->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SSGST"><?php echo $pharmacy_batchmas->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $pharmacy_batchmas->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SSGST">
<span<?php echo $pharmacy_batchmas->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SCGST"><?php echo $pharmacy_batchmas->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $pharmacy_batchmas->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SCGST">
<span<?php echo $pharmacy_batchmas->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RT"><?php echo $pharmacy_batchmas->RT->caption() ?></span></td>
		<td data-name="RT"<?php echo $pharmacy_batchmas->RT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RT">
<span<?php echo $pharmacy_batchmas->RT->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BRCODE"><?php echo $pharmacy_batchmas->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $pharmacy_batchmas->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BRCODE">
<span<?php echo $pharmacy_batchmas->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_HospID"><?php echo $pharmacy_batchmas->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $pharmacy_batchmas->HospID->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_HospID">
<span<?php echo $pharmacy_batchmas->HospID->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->UM->Visible) { // UM ?>
	<tr id="r_UM">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UM"><?php echo $pharmacy_batchmas->UM->caption() ?></span></td>
		<td data-name="UM"<?php echo $pharmacy_batchmas->UM->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UM">
<span<?php echo $pharmacy_batchmas->UM->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->UM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_GENNAME"><?php echo $pharmacy_batchmas->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME"<?php echo $pharmacy_batchmas->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_GENNAME">
<span<?php echo $pharmacy_batchmas->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->BILLDATE->Visible) { // BILLDATE ?>
	<tr id="r_BILLDATE">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BILLDATE"><?php echo $pharmacy_batchmas->BILLDATE->caption() ?></span></td>
		<td data-name="BILLDATE"<?php echo $pharmacy_batchmas->BILLDATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BILLDATE">
<span<?php echo $pharmacy_batchmas->BILLDATE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->BILLDATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PUnit"><?php echo $pharmacy_batchmas->PUnit->caption() ?></span></td>
		<td data-name="PUnit"<?php echo $pharmacy_batchmas->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PUnit">
<span<?php echo $pharmacy_batchmas->PUnit->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SUnit"><?php echo $pharmacy_batchmas->SUnit->caption() ?></span></td>
		<td data-name="SUnit"<?php echo $pharmacy_batchmas->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SUnit">
<span<?php echo $pharmacy_batchmas->SUnit->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PurValue"><?php echo $pharmacy_batchmas->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $pharmacy_batchmas->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PurValue">
<span<?php echo $pharmacy_batchmas->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_batchmas->PurRate->Visible) { // PurRate ?>
	<tr id="r_PurRate">
		<td class="<?php echo $pharmacy_batchmas_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PurRate"><?php echo $pharmacy_batchmas->PurRate->caption() ?></span></td>
		<td data-name="PurRate"<?php echo $pharmacy_batchmas->PurRate->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PurRate">
<span<?php echo $pharmacy_batchmas->PurRate->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PurRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_batchmas_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_batchmas->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_batchmas_view->terminate();
?>