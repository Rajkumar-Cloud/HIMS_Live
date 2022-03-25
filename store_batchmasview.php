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
<?php include_once "header.php" ?>
<?php if (!$store_batchmas->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fstore_batchmasview = currentForm = new ew.Form("fstore_batchmasview", "view");

// Form_CustomValidate event
fstore_batchmasview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_batchmasview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$store_batchmas->isExport()) { ?>
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
<?php if ($store_batchmas_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_batchmas_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_batchmas">
<input type="hidden" name="modal" value="<?php echo (int)$store_batchmas_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_batchmas->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PRC"><?php echo $store_batchmas->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $store_batchmas->PRC->cellAttributes() ?>>
<span id="el_store_batchmas_PRC">
<span<?php echo $store_batchmas->PRC->viewAttributes() ?>>
<?php echo $store_batchmas->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_BATCHNO"><?php echo $store_batchmas->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO"<?php echo $store_batchmas->BATCHNO->cellAttributes() ?>>
<span id="el_store_batchmas_BATCHNO">
<span<?php echo $store_batchmas->BATCHNO->viewAttributes() ?>>
<?php echo $store_batchmas->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_OQ"><?php echo $store_batchmas->OQ->caption() ?></span></td>
		<td data-name="OQ"<?php echo $store_batchmas->OQ->cellAttributes() ?>>
<span id="el_store_batchmas_OQ">
<span<?php echo $store_batchmas->OQ->viewAttributes() ?>>
<?php echo $store_batchmas->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_RQ"><?php echo $store_batchmas->RQ->caption() ?></span></td>
		<td data-name="RQ"<?php echo $store_batchmas->RQ->cellAttributes() ?>>
<span id="el_store_batchmas_RQ">
<span<?php echo $store_batchmas->RQ->viewAttributes() ?>>
<?php echo $store_batchmas->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_MRQ"><?php echo $store_batchmas->MRQ->caption() ?></span></td>
		<td data-name="MRQ"<?php echo $store_batchmas->MRQ->cellAttributes() ?>>
<span id="el_store_batchmas_MRQ">
<span<?php echo $store_batchmas->MRQ->viewAttributes() ?>>
<?php echo $store_batchmas->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_IQ"><?php echo $store_batchmas->IQ->caption() ?></span></td>
		<td data-name="IQ"<?php echo $store_batchmas->IQ->cellAttributes() ?>>
<span id="el_store_batchmas_IQ">
<span<?php echo $store_batchmas->IQ->viewAttributes() ?>>
<?php echo $store_batchmas->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_MRP"><?php echo $store_batchmas->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $store_batchmas->MRP->cellAttributes() ?>>
<span id="el_store_batchmas_MRP">
<span<?php echo $store_batchmas->MRP->viewAttributes() ?>>
<?php echo $store_batchmas->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_EXPDT"><?php echo $store_batchmas->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT"<?php echo $store_batchmas->EXPDT->cellAttributes() ?>>
<span id="el_store_batchmas_EXPDT">
<span<?php echo $store_batchmas->EXPDT->viewAttributes() ?>>
<?php echo $store_batchmas->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_UR"><?php echo $store_batchmas->UR->caption() ?></span></td>
		<td data-name="UR"<?php echo $store_batchmas->UR->cellAttributes() ?>>
<span id="el_store_batchmas_UR">
<span<?php echo $store_batchmas->UR->viewAttributes() ?>>
<?php echo $store_batchmas->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_RT"><?php echo $store_batchmas->RT->caption() ?></span></td>
		<td data-name="RT"<?php echo $store_batchmas->RT->cellAttributes() ?>>
<span id="el_store_batchmas_RT">
<span<?php echo $store_batchmas->RT->viewAttributes() ?>>
<?php echo $store_batchmas->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PRCODE"><?php echo $store_batchmas->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE"<?php echo $store_batchmas->PRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_PRCODE">
<span<?php echo $store_batchmas->PRCODE->viewAttributes() ?>>
<?php echo $store_batchmas->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->BATCH->Visible) { // BATCH ?>
	<tr id="r_BATCH">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_BATCH"><?php echo $store_batchmas->BATCH->caption() ?></span></td>
		<td data-name="BATCH"<?php echo $store_batchmas->BATCH->cellAttributes() ?>>
<span id="el_store_batchmas_BATCH">
<span<?php echo $store_batchmas->BATCH->viewAttributes() ?>>
<?php echo $store_batchmas->BATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PC"><?php echo $store_batchmas->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $store_batchmas->PC->cellAttributes() ?>>
<span id="el_store_batchmas_PC">
<span<?php echo $store_batchmas->PC->viewAttributes() ?>>
<?php echo $store_batchmas->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->OLDRT->Visible) { // OLDRT ?>
	<tr id="r_OLDRT">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_OLDRT"><?php echo $store_batchmas->OLDRT->caption() ?></span></td>
		<td data-name="OLDRT"<?php echo $store_batchmas->OLDRT->cellAttributes() ?>>
<span id="el_store_batchmas_OLDRT">
<span<?php echo $store_batchmas->OLDRT->viewAttributes() ?>>
<?php echo $store_batchmas->OLDRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<tr id="r_TEMPMRQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_TEMPMRQ"><?php echo $store_batchmas->TEMPMRQ->caption() ?></span></td>
		<td data-name="TEMPMRQ"<?php echo $store_batchmas->TEMPMRQ->cellAttributes() ?>>
<span id="el_store_batchmas_TEMPMRQ">
<span<?php echo $store_batchmas->TEMPMRQ->viewAttributes() ?>>
<?php echo $store_batchmas->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_TAXP"><?php echo $store_batchmas->TAXP->caption() ?></span></td>
		<td data-name="TAXP"<?php echo $store_batchmas->TAXP->cellAttributes() ?>>
<span id="el_store_batchmas_TAXP">
<span<?php echo $store_batchmas->TAXP->viewAttributes() ?>>
<?php echo $store_batchmas->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->OLDRATE->Visible) { // OLDRATE ?>
	<tr id="r_OLDRATE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_OLDRATE"><?php echo $store_batchmas->OLDRATE->caption() ?></span></td>
		<td data-name="OLDRATE"<?php echo $store_batchmas->OLDRATE->cellAttributes() ?>>
<span id="el_store_batchmas_OLDRATE">
<span<?php echo $store_batchmas->OLDRATE->viewAttributes() ?>>
<?php echo $store_batchmas->OLDRATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->NEWRATE->Visible) { // NEWRATE ?>
	<tr id="r_NEWRATE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_NEWRATE"><?php echo $store_batchmas->NEWRATE->caption() ?></span></td>
		<td data-name="NEWRATE"<?php echo $store_batchmas->NEWRATE->cellAttributes() ?>>
<span id="el_store_batchmas_NEWRATE">
<span<?php echo $store_batchmas->NEWRATE->viewAttributes() ?>>
<?php echo $store_batchmas->NEWRATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<tr id="r_OTEMPMRA">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_OTEMPMRA"><?php echo $store_batchmas->OTEMPMRA->caption() ?></span></td>
		<td data-name="OTEMPMRA"<?php echo $store_batchmas->OTEMPMRA->cellAttributes() ?>>
<span id="el_store_batchmas_OTEMPMRA">
<span<?php echo $store_batchmas->OTEMPMRA->viewAttributes() ?>>
<?php echo $store_batchmas->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<tr id="r_ACTIVESTATUS">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_ACTIVESTATUS"><?php echo $store_batchmas->ACTIVESTATUS->caption() ?></span></td>
		<td data-name="ACTIVESTATUS"<?php echo $store_batchmas->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_store_batchmas_ACTIVESTATUS">
<span<?php echo $store_batchmas->ACTIVESTATUS->viewAttributes() ?>>
<?php echo $store_batchmas->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_id"><?php echo $store_batchmas->id->caption() ?></span></td>
		<td data-name="id"<?php echo $store_batchmas->id->cellAttributes() ?>>
<span id="el_store_batchmas_id">
<span<?php echo $store_batchmas->id->viewAttributes() ?>>
<?php echo $store_batchmas->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PrName"><?php echo $store_batchmas->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $store_batchmas->PrName->cellAttributes() ?>>
<span id="el_store_batchmas_PrName">
<span<?php echo $store_batchmas->PrName->viewAttributes() ?>>
<?php echo $store_batchmas->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PSGST"><?php echo $store_batchmas->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $store_batchmas->PSGST->cellAttributes() ?>>
<span id="el_store_batchmas_PSGST">
<span<?php echo $store_batchmas->PSGST->viewAttributes() ?>>
<?php echo $store_batchmas->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PCGST"><?php echo $store_batchmas->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $store_batchmas->PCGST->cellAttributes() ?>>
<span id="el_store_batchmas_PCGST">
<span<?php echo $store_batchmas->PCGST->viewAttributes() ?>>
<?php echo $store_batchmas->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_SSGST"><?php echo $store_batchmas->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $store_batchmas->SSGST->cellAttributes() ?>>
<span id="el_store_batchmas_SSGST">
<span<?php echo $store_batchmas->SSGST->viewAttributes() ?>>
<?php echo $store_batchmas->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_SCGST"><?php echo $store_batchmas->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $store_batchmas->SCGST->cellAttributes() ?>>
<span id="el_store_batchmas_SCGST">
<span<?php echo $store_batchmas->SCGST->viewAttributes() ?>>
<?php echo $store_batchmas->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_MFRCODE"><?php echo $store_batchmas->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $store_batchmas->MFRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_MFRCODE">
<span<?php echo $store_batchmas->MFRCODE->viewAttributes() ?>>
<?php echo $store_batchmas->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_BRCODE"><?php echo $store_batchmas->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $store_batchmas->BRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_BRCODE">
<span<?php echo $store_batchmas->BRCODE->viewAttributes() ?>>
<?php echo $store_batchmas->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->FRQ->Visible) { // FRQ ?>
	<tr id="r_FRQ">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_FRQ"><?php echo $store_batchmas->FRQ->caption() ?></span></td>
		<td data-name="FRQ"<?php echo $store_batchmas->FRQ->cellAttributes() ?>>
<span id="el_store_batchmas_FRQ">
<span<?php echo $store_batchmas->FRQ->viewAttributes() ?>>
<?php echo $store_batchmas->FRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_HospID"><?php echo $store_batchmas->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $store_batchmas->HospID->cellAttributes() ?>>
<span id="el_store_batchmas_HospID">
<span<?php echo $store_batchmas->HospID->viewAttributes() ?>>
<?php echo $store_batchmas->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->UM->Visible) { // UM ?>
	<tr id="r_UM">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_UM"><?php echo $store_batchmas->UM->caption() ?></span></td>
		<td data-name="UM"<?php echo $store_batchmas->UM->cellAttributes() ?>>
<span id="el_store_batchmas_UM">
<span<?php echo $store_batchmas->UM->viewAttributes() ?>>
<?php echo $store_batchmas->UM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_GENNAME"><?php echo $store_batchmas->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME"<?php echo $store_batchmas->GENNAME->cellAttributes() ?>>
<span id="el_store_batchmas_GENNAME">
<span<?php echo $store_batchmas->GENNAME->viewAttributes() ?>>
<?php echo $store_batchmas->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->BILLDATE->Visible) { // BILLDATE ?>
	<tr id="r_BILLDATE">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_BILLDATE"><?php echo $store_batchmas->BILLDATE->caption() ?></span></td>
		<td data-name="BILLDATE"<?php echo $store_batchmas->BILLDATE->cellAttributes() ?>>
<span id="el_store_batchmas_BILLDATE">
<span<?php echo $store_batchmas->BILLDATE->viewAttributes() ?>>
<?php echo $store_batchmas->BILLDATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PUnit"><?php echo $store_batchmas->PUnit->caption() ?></span></td>
		<td data-name="PUnit"<?php echo $store_batchmas->PUnit->cellAttributes() ?>>
<span id="el_store_batchmas_PUnit">
<span<?php echo $store_batchmas->PUnit->viewAttributes() ?>>
<?php echo $store_batchmas->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_SUnit"><?php echo $store_batchmas->SUnit->caption() ?></span></td>
		<td data-name="SUnit"<?php echo $store_batchmas->SUnit->cellAttributes() ?>>
<span id="el_store_batchmas_SUnit">
<span<?php echo $store_batchmas->SUnit->viewAttributes() ?>>
<?php echo $store_batchmas->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PurValue"><?php echo $store_batchmas->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $store_batchmas->PurValue->cellAttributes() ?>>
<span id="el_store_batchmas_PurValue">
<span<?php echo $store_batchmas->PurValue->viewAttributes() ?>>
<?php echo $store_batchmas->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->PurRate->Visible) { // PurRate ?>
	<tr id="r_PurRate">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_PurRate"><?php echo $store_batchmas->PurRate->caption() ?></span></td>
		<td data-name="PurRate"<?php echo $store_batchmas->PurRate->cellAttributes() ?>>
<span id="el_store_batchmas_PurRate">
<span<?php echo $store_batchmas->PurRate->viewAttributes() ?>>
<?php echo $store_batchmas->PurRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_batchmas->StoreID->Visible) { // StoreID ?>
	<tr id="r_StoreID">
		<td class="<?php echo $store_batchmas_view->TableLeftColumnClass ?>"><span id="elh_store_batchmas_StoreID"><?php echo $store_batchmas->StoreID->caption() ?></span></td>
		<td data-name="StoreID"<?php echo $store_batchmas->StoreID->cellAttributes() ?>>
<span id="el_store_batchmas_StoreID">
<span<?php echo $store_batchmas->StoreID->viewAttributes() ?>>
<?php echo $store_batchmas->StoreID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_batchmas_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_batchmas->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_batchmas_view->terminate();
?>