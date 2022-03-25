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
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_pharmacy_pharled_returnview = currentForm = new ew.Form("fview_pharmacy_pharled_returnview", "view");

// Form_CustomValidate event
fview_pharmacy_pharled_returnview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_pharled_returnview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_pharled_returnview.lists["x_SLNO"] = <?php echo $view_pharmacy_pharled_return_view->SLNO->Lookup->toClientList() ?>;
fview_pharmacy_pharled_returnview.lists["x_SLNO"].options = <?php echo JsonEncode($view_pharmacy_pharled_return_view->SLNO->lookupOptions()) ?>;
fview_pharmacy_pharled_returnview.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
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
<?php if ($view_pharmacy_pharled_return_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_pharled_return_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_pharled_return_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BRCODE"><?php echo $view_pharmacy_pharled_return->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $view_pharmacy_pharled_return->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BRCODE">
<span<?php echo $view_pharmacy_pharled_return->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->TYPE->Visible) { // TYPE ?>
	<tr id="r_TYPE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_TYPE"><?php echo $view_pharmacy_pharled_return->TYPE->caption() ?></span></td>
		<td data-name="TYPE"<?php echo $view_pharmacy_pharled_return->TYPE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TYPE">
<span<?php echo $view_pharmacy_pharled_return->TYPE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DN->Visible) { // DN ?>
	<tr id="r_DN">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DN"><?php echo $view_pharmacy_pharled_return->DN->caption() ?></span></td>
		<td data-name="DN"<?php echo $view_pharmacy_pharled_return->DN->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DN">
<span<?php echo $view_pharmacy_pharled_return->DN->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RDN->Visible) { // RDN ?>
	<tr id="r_RDN">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RDN"><?php echo $view_pharmacy_pharled_return->RDN->caption() ?></span></td>
		<td data-name="RDN"<?php echo $view_pharmacy_pharled_return->RDN->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RDN">
<span<?php echo $view_pharmacy_pharled_return->RDN->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->RDN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DT"><?php echo $view_pharmacy_pharled_return->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $view_pharmacy_pharled_return->DT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DT">
<span<?php echo $view_pharmacy_pharled_return->DT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PRC"><?php echo $view_pharmacy_pharled_return->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $view_pharmacy_pharled_return->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRC">
<span<?php echo $view_pharmacy_pharled_return->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_OQ"><?php echo $view_pharmacy_pharled_return->OQ->caption() ?></span></td>
		<td data-name="OQ"<?php echo $view_pharmacy_pharled_return->OQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OQ">
<span<?php echo $view_pharmacy_pharled_return->OQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
	<tr id="r_SiNo">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_SiNo"><?php echo $view_pharmacy_pharled_return->SiNo->caption() ?></span></td>
		<td data-name="SiNo"<?php echo $view_pharmacy_pharled_return->SiNo->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_SiNo">
<span<?php echo $view_pharmacy_pharled_return->SiNo->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->SiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RQ"><?php echo $view_pharmacy_pharled_return->RQ->caption() ?></span></td>
		<td data-name="RQ"<?php echo $view_pharmacy_pharled_return->RQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RQ">
<span<?php echo $view_pharmacy_pharled_return->RQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
	<tr id="r_Product">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_Product"><?php echo $view_pharmacy_pharled_return->Product->caption() ?></span></td>
		<td data-name="Product"<?php echo $view_pharmacy_pharled_return->Product->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Product">
<span<?php echo $view_pharmacy_pharled_return->Product->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Product->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
	<tr id="r_SLNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_SLNO"><?php echo $view_pharmacy_pharled_return->SLNO->caption() ?></span></td>
		<td data-name="SLNO"<?php echo $view_pharmacy_pharled_return->SLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_SLNO">
<span<?php echo $view_pharmacy_pharled_return->SLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->SLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RT"><?php echo $view_pharmacy_pharled_return->RT->caption() ?></span></td>
		<td data-name="RT"<?php echo $view_pharmacy_pharled_return->RT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RT">
<span<?php echo $view_pharmacy_pharled_return->RT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_MRQ"><?php echo $view_pharmacy_pharled_return->MRQ->caption() ?></span></td>
		<td data-name="MRQ"<?php echo $view_pharmacy_pharled_return->MRQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MRQ">
<span<?php echo $view_pharmacy_pharled_return->MRQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_IQ"><?php echo $view_pharmacy_pharled_return->IQ->caption() ?></span></td>
		<td data-name="IQ"<?php echo $view_pharmacy_pharled_return->IQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IQ">
<span<?php echo $view_pharmacy_pharled_return->IQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
	<tr id="r_DAMT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DAMT"><?php echo $view_pharmacy_pharled_return->DAMT->caption() ?></span></td>
		<td data-name="DAMT"<?php echo $view_pharmacy_pharled_return->DAMT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DAMT">
<span<?php echo $view_pharmacy_pharled_return->DAMT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DAMT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BATCHNO"><?php echo $view_pharmacy_pharled_return->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO"<?php echo $view_pharmacy_pharled_return->BATCHNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BATCHNO">
<span<?php echo $view_pharmacy_pharled_return->BATCHNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_EXPDT"><?php echo $view_pharmacy_pharled_return->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT"<?php echo $view_pharmacy_pharled_return->EXPDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_EXPDT">
<span<?php echo $view_pharmacy_pharled_return->EXPDT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
	<tr id="r_Mfg">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_Mfg"><?php echo $view_pharmacy_pharled_return->Mfg->caption() ?></span></td>
		<td data-name="Mfg"<?php echo $view_pharmacy_pharled_return->Mfg->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Mfg">
<span<?php echo $view_pharmacy_pharled_return->Mfg->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Mfg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BILLNO->Visible) { // BILLNO ?>
	<tr id="r_BILLNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BILLNO"><?php echo $view_pharmacy_pharled_return->BILLNO->caption() ?></span></td>
		<td data-name="BILLNO"<?php echo $view_pharmacy_pharled_return->BILLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLNO">
<span<?php echo $view_pharmacy_pharled_return->BILLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BILLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BILLDT->Visible) { // BILLDT ?>
	<tr id="r_BILLDT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BILLDT"><?php echo $view_pharmacy_pharled_return->BILLDT->caption() ?></span></td>
		<td data-name="BILLDT"<?php echo $view_pharmacy_pharled_return->BILLDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLDT">
<span<?php echo $view_pharmacy_pharled_return->BILLDT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BILLDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->VALUE->Visible) { // VALUE ?>
	<tr id="r_VALUE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_VALUE"><?php echo $view_pharmacy_pharled_return->VALUE->caption() ?></span></td>
		<td data-name="VALUE"<?php echo $view_pharmacy_pharled_return->VALUE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_VALUE">
<span<?php echo $view_pharmacy_pharled_return->VALUE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->VALUE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DISC->Visible) { // DISC ?>
	<tr id="r_DISC">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DISC"><?php echo $view_pharmacy_pharled_return->DISC->caption() ?></span></td>
		<td data-name="DISC"<?php echo $view_pharmacy_pharled_return->DISC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DISC">
<span<?php echo $view_pharmacy_pharled_return->DISC->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_TAXP"><?php echo $view_pharmacy_pharled_return->TAXP->caption() ?></span></td>
		<td data-name="TAXP"<?php echo $view_pharmacy_pharled_return->TAXP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAXP">
<span<?php echo $view_pharmacy_pharled_return->TAXP->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->TAX->Visible) { // TAX ?>
	<tr id="r_TAX">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_TAX"><?php echo $view_pharmacy_pharled_return->TAX->caption() ?></span></td>
		<td data-name="TAX"<?php echo $view_pharmacy_pharled_return->TAX->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAX">
<span<?php echo $view_pharmacy_pharled_return->TAX->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->TAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->TAXR->Visible) { // TAXR ?>
	<tr id="r_TAXR">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_TAXR"><?php echo $view_pharmacy_pharled_return->TAXR->caption() ?></span></td>
		<td data-name="TAXR"<?php echo $view_pharmacy_pharled_return->TAXR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAXR">
<span<?php echo $view_pharmacy_pharled_return->TAXR->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->TAXR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->EMPNO->Visible) { // EMPNO ?>
	<tr id="r_EMPNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_EMPNO"><?php echo $view_pharmacy_pharled_return->EMPNO->caption() ?></span></td>
		<td data-name="EMPNO"<?php echo $view_pharmacy_pharled_return->EMPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_EMPNO">
<span<?php echo $view_pharmacy_pharled_return->EMPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->EMPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PC"><?php echo $view_pharmacy_pharled_return->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $view_pharmacy_pharled_return->PC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PC">
<span<?php echo $view_pharmacy_pharled_return->PC->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DRNAME->Visible) { // DRNAME ?>
	<tr id="r_DRNAME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DRNAME"><?php echo $view_pharmacy_pharled_return->DRNAME->caption() ?></span></td>
		<td data-name="DRNAME"<?php echo $view_pharmacy_pharled_return->DRNAME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DRNAME">
<span<?php echo $view_pharmacy_pharled_return->DRNAME->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BTIME->Visible) { // BTIME ?>
	<tr id="r_BTIME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BTIME"><?php echo $view_pharmacy_pharled_return->BTIME->caption() ?></span></td>
		<td data-name="BTIME"<?php echo $view_pharmacy_pharled_return->BTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BTIME">
<span<?php echo $view_pharmacy_pharled_return->BTIME->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->ONO->Visible) { // ONO ?>
	<tr id="r_ONO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_ONO"><?php echo $view_pharmacy_pharled_return->ONO->caption() ?></span></td>
		<td data-name="ONO"<?php echo $view_pharmacy_pharled_return->ONO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_ONO">
<span<?php echo $view_pharmacy_pharled_return->ONO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->ONO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->ODT->Visible) { // ODT ?>
	<tr id="r_ODT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_ODT"><?php echo $view_pharmacy_pharled_return->ODT->caption() ?></span></td>
		<td data-name="ODT"<?php echo $view_pharmacy_pharled_return->ODT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_ODT">
<span<?php echo $view_pharmacy_pharled_return->ODT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->ODT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PURRT->Visible) { // PURRT ?>
	<tr id="r_PURRT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PURRT"><?php echo $view_pharmacy_pharled_return->PURRT->caption() ?></span></td>
		<td data-name="PURRT"<?php echo $view_pharmacy_pharled_return->PURRT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURRT">
<span<?php echo $view_pharmacy_pharled_return->PURRT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PURRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->GRP->Visible) { // GRP ?>
	<tr id="r_GRP">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_GRP"><?php echo $view_pharmacy_pharled_return->GRP->caption() ?></span></td>
		<td data-name="GRP"<?php echo $view_pharmacy_pharled_return->GRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_GRP">
<span<?php echo $view_pharmacy_pharled_return->GRP->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->GRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IBATCH->Visible) { // IBATCH ?>
	<tr id="r_IBATCH">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_IBATCH"><?php echo $view_pharmacy_pharled_return->IBATCH->caption() ?></span></td>
		<td data-name="IBATCH"<?php echo $view_pharmacy_pharled_return->IBATCH->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IBATCH">
<span<?php echo $view_pharmacy_pharled_return->IBATCH->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->IBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IPNO->Visible) { // IPNO ?>
	<tr id="r_IPNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_IPNO"><?php echo $view_pharmacy_pharled_return->IPNO->caption() ?></span></td>
		<td data-name="IPNO"<?php echo $view_pharmacy_pharled_return->IPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IPNO">
<span<?php echo $view_pharmacy_pharled_return->IPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->IPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->OPNO->Visible) { // OPNO ?>
	<tr id="r_OPNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_OPNO"><?php echo $view_pharmacy_pharled_return->OPNO->caption() ?></span></td>
		<td data-name="OPNO"<?php echo $view_pharmacy_pharled_return->OPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OPNO">
<span<?php echo $view_pharmacy_pharled_return->OPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->OPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RECID->Visible) { // RECID ?>
	<tr id="r_RECID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RECID"><?php echo $view_pharmacy_pharled_return->RECID->caption() ?></span></td>
		<td data-name="RECID"<?php echo $view_pharmacy_pharled_return->RECID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RECID">
<span<?php echo $view_pharmacy_pharled_return->RECID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->RECID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->FQTY->Visible) { // FQTY ?>
	<tr id="r_FQTY">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_FQTY"><?php echo $view_pharmacy_pharled_return->FQTY->caption() ?></span></td>
		<td data-name="FQTY"<?php echo $view_pharmacy_pharled_return->FQTY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_FQTY">
<span<?php echo $view_pharmacy_pharled_return->FQTY->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->FQTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_UR"><?php echo $view_pharmacy_pharled_return->UR->caption() ?></span></td>
		<td data-name="UR"<?php echo $view_pharmacy_pharled_return->UR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_UR">
<span<?php echo $view_pharmacy_pharled_return->UR->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DCID->Visible) { // DCID ?>
	<tr id="r_DCID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DCID"><?php echo $view_pharmacy_pharled_return->DCID->caption() ?></span></td>
		<td data-name="DCID"<?php echo $view_pharmacy_pharled_return->DCID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DCID">
<span<?php echo $view_pharmacy_pharled_return->DCID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DCID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
	<tr id="r__USERID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return__USERID"><?php echo $view_pharmacy_pharled_return->_USERID->caption() ?></span></td>
		<td data-name="_USERID"<?php echo $view_pharmacy_pharled_return->_USERID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return__USERID">
<span<?php echo $view_pharmacy_pharled_return->_USERID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->_USERID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MODDT->Visible) { // MODDT ?>
	<tr id="r_MODDT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_MODDT"><?php echo $view_pharmacy_pharled_return->MODDT->caption() ?></span></td>
		<td data-name="MODDT"<?php echo $view_pharmacy_pharled_return->MODDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MODDT">
<span<?php echo $view_pharmacy_pharled_return->MODDT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->MODDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->FYM->Visible) { // FYM ?>
	<tr id="r_FYM">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_FYM"><?php echo $view_pharmacy_pharled_return->FYM->caption() ?></span></td>
		<td data-name="FYM"<?php echo $view_pharmacy_pharled_return->FYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_FYM">
<span<?php echo $view_pharmacy_pharled_return->FYM->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->FYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRCBATCH->Visible) { // PRCBATCH ?>
	<tr id="r_PRCBATCH">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PRCBATCH"><?php echo $view_pharmacy_pharled_return->PRCBATCH->caption() ?></span></td>
		<td data-name="PRCBATCH"<?php echo $view_pharmacy_pharled_return->PRCBATCH->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRCBATCH">
<span<?php echo $view_pharmacy_pharled_return->PRCBATCH->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PRCBATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_MRP"><?php echo $view_pharmacy_pharled_return->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $view_pharmacy_pharled_return->MRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MRP">
<span<?php echo $view_pharmacy_pharled_return->MRP->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BILLYM->Visible) { // BILLYM ?>
	<tr id="r_BILLYM">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BILLYM"><?php echo $view_pharmacy_pharled_return->BILLYM->caption() ?></span></td>
		<td data-name="BILLYM"<?php echo $view_pharmacy_pharled_return->BILLYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLYM">
<span<?php echo $view_pharmacy_pharled_return->BILLYM->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BILLYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BILLGRP->Visible) { // BILLGRP ?>
	<tr id="r_BILLGRP">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BILLGRP"><?php echo $view_pharmacy_pharled_return->BILLGRP->caption() ?></span></td>
		<td data-name="BILLGRP"<?php echo $view_pharmacy_pharled_return->BILLGRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLGRP">
<span<?php echo $view_pharmacy_pharled_return->BILLGRP->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BILLGRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->STAFF->Visible) { // STAFF ?>
	<tr id="r_STAFF">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_STAFF"><?php echo $view_pharmacy_pharled_return->STAFF->caption() ?></span></td>
		<td data-name="STAFF"<?php echo $view_pharmacy_pharled_return->STAFF->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_STAFF">
<span<?php echo $view_pharmacy_pharled_return->STAFF->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->STAFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<tr id="r_TEMPIPNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_TEMPIPNO"><?php echo $view_pharmacy_pharled_return->TEMPIPNO->caption() ?></span></td>
		<td data-name="TEMPIPNO"<?php echo $view_pharmacy_pharled_return->TEMPIPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TEMPIPNO">
<span<?php echo $view_pharmacy_pharled_return->TEMPIPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRNTED->Visible) { // PRNTED ?>
	<tr id="r_PRNTED">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PRNTED"><?php echo $view_pharmacy_pharled_return->PRNTED->caption() ?></span></td>
		<td data-name="PRNTED"<?php echo $view_pharmacy_pharled_return->PRNTED->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRNTED">
<span<?php echo $view_pharmacy_pharled_return->PRNTED->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PRNTED->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PATNAME->Visible) { // PATNAME ?>
	<tr id="r_PATNAME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PATNAME"><?php echo $view_pharmacy_pharled_return->PATNAME->caption() ?></span></td>
		<td data-name="PATNAME"<?php echo $view_pharmacy_pharled_return->PATNAME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PATNAME">
<span<?php echo $view_pharmacy_pharled_return->PATNAME->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PATNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PJVNO->Visible) { // PJVNO ?>
	<tr id="r_PJVNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PJVNO"><?php echo $view_pharmacy_pharled_return->PJVNO->caption() ?></span></td>
		<td data-name="PJVNO"<?php echo $view_pharmacy_pharled_return->PJVNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVNO">
<span<?php echo $view_pharmacy_pharled_return->PJVNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PJVNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PJVSLNO->Visible) { // PJVSLNO ?>
	<tr id="r_PJVSLNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PJVSLNO"><?php echo $view_pharmacy_pharled_return->PJVSLNO->caption() ?></span></td>
		<td data-name="PJVSLNO"<?php echo $view_pharmacy_pharled_return->PJVSLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVSLNO">
<span<?php echo $view_pharmacy_pharled_return->PJVSLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PJVSLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->OTHDISC->Visible) { // OTHDISC ?>
	<tr id="r_OTHDISC">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_OTHDISC"><?php echo $view_pharmacy_pharled_return->OTHDISC->caption() ?></span></td>
		<td data-name="OTHDISC"<?php echo $view_pharmacy_pharled_return->OTHDISC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OTHDISC">
<span<?php echo $view_pharmacy_pharled_return->OTHDISC->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->OTHDISC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PJVYM->Visible) { // PJVYM ?>
	<tr id="r_PJVYM">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PJVYM"><?php echo $view_pharmacy_pharled_return->PJVYM->caption() ?></span></td>
		<td data-name="PJVYM"<?php echo $view_pharmacy_pharled_return->PJVYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVYM">
<span<?php echo $view_pharmacy_pharled_return->PJVYM->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PJVYM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PURDISCPER->Visible) { // PURDISCPER ?>
	<tr id="r_PURDISCPER">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PURDISCPER"><?php echo $view_pharmacy_pharled_return->PURDISCPER->caption() ?></span></td>
		<td data-name="PURDISCPER"<?php echo $view_pharmacy_pharled_return->PURDISCPER->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURDISCPER">
<span<?php echo $view_pharmacy_pharled_return->PURDISCPER->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PURDISCPER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CASHIER->Visible) { // CASHIER ?>
	<tr id="r_CASHIER">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CASHIER"><?php echo $view_pharmacy_pharled_return->CASHIER->caption() ?></span></td>
		<td data-name="CASHIER"<?php echo $view_pharmacy_pharled_return->CASHIER->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHIER">
<span<?php echo $view_pharmacy_pharled_return->CASHIER->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->CASHIER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CASHTIME->Visible) { // CASHTIME ?>
	<tr id="r_CASHTIME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CASHTIME"><?php echo $view_pharmacy_pharled_return->CASHTIME->caption() ?></span></td>
		<td data-name="CASHTIME"<?php echo $view_pharmacy_pharled_return->CASHTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHTIME">
<span<?php echo $view_pharmacy_pharled_return->CASHTIME->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->CASHTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CASHRECD->Visible) { // CASHRECD ?>
	<tr id="r_CASHRECD">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CASHRECD"><?php echo $view_pharmacy_pharled_return->CASHRECD->caption() ?></span></td>
		<td data-name="CASHRECD"<?php echo $view_pharmacy_pharled_return->CASHRECD->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHRECD">
<span<?php echo $view_pharmacy_pharled_return->CASHRECD->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->CASHRECD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CASHREFNO->Visible) { // CASHREFNO ?>
	<tr id="r_CASHREFNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CASHREFNO"><?php echo $view_pharmacy_pharled_return->CASHREFNO->caption() ?></span></td>
		<td data-name="CASHREFNO"<?php echo $view_pharmacy_pharled_return->CASHREFNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHREFNO">
<span<?php echo $view_pharmacy_pharled_return->CASHREFNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->CASHREFNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<tr id="r_CASHIERSHIFT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CASHIERSHIFT"><?php echo $view_pharmacy_pharled_return->CASHIERSHIFT->caption() ?></span></td>
		<td data-name="CASHIERSHIFT"<?php echo $view_pharmacy_pharled_return->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHIERSHIFT">
<span<?php echo $view_pharmacy_pharled_return->CASHIERSHIFT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PRCODE"><?php echo $view_pharmacy_pharled_return->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE"<?php echo $view_pharmacy_pharled_return->PRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRCODE">
<span<?php echo $view_pharmacy_pharled_return->PRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RELEASEBY->Visible) { // RELEASEBY ?>
	<tr id="r_RELEASEBY">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RELEASEBY"><?php echo $view_pharmacy_pharled_return->RELEASEBY->caption() ?></span></td>
		<td data-name="RELEASEBY"<?php echo $view_pharmacy_pharled_return->RELEASEBY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RELEASEBY">
<span<?php echo $view_pharmacy_pharled_return->RELEASEBY->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->RELEASEBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<tr id="r_CRAUTHOR">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_CRAUTHOR"><?php echo $view_pharmacy_pharled_return->CRAUTHOR->caption() ?></span></td>
		<td data-name="CRAUTHOR"<?php echo $view_pharmacy_pharled_return->CRAUTHOR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CRAUTHOR">
<span<?php echo $view_pharmacy_pharled_return->CRAUTHOR->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PAYMENT->Visible) { // PAYMENT ?>
	<tr id="r_PAYMENT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PAYMENT"><?php echo $view_pharmacy_pharled_return->PAYMENT->caption() ?></span></td>
		<td data-name="PAYMENT"<?php echo $view_pharmacy_pharled_return->PAYMENT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PAYMENT">
<span<?php echo $view_pharmacy_pharled_return->PAYMENT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PAYMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DRID->Visible) { // DRID ?>
	<tr id="r_DRID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DRID"><?php echo $view_pharmacy_pharled_return->DRID->caption() ?></span></td>
		<td data-name="DRID"<?php echo $view_pharmacy_pharled_return->DRID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DRID">
<span<?php echo $view_pharmacy_pharled_return->DRID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DRID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->WARD->Visible) { // WARD ?>
	<tr id="r_WARD">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_WARD"><?php echo $view_pharmacy_pharled_return->WARD->caption() ?></span></td>
		<td data-name="WARD"<?php echo $view_pharmacy_pharled_return->WARD->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_WARD">
<span<?php echo $view_pharmacy_pharled_return->WARD->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->WARD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->STAXTYPE->Visible) { // STAXTYPE ?>
	<tr id="r_STAXTYPE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_STAXTYPE"><?php echo $view_pharmacy_pharled_return->STAXTYPE->caption() ?></span></td>
		<td data-name="STAXTYPE"<?php echo $view_pharmacy_pharled_return->STAXTYPE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_STAXTYPE">
<span<?php echo $view_pharmacy_pharled_return->STAXTYPE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->STAXTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<tr id="r_PURDISCVAL">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PURDISCVAL"><?php echo $view_pharmacy_pharled_return->PURDISCVAL->caption() ?></span></td>
		<td data-name="PURDISCVAL"<?php echo $view_pharmacy_pharled_return->PURDISCVAL->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURDISCVAL">
<span<?php echo $view_pharmacy_pharled_return->PURDISCVAL->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RNDOFF->Visible) { // RNDOFF ?>
	<tr id="r_RNDOFF">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_RNDOFF"><?php echo $view_pharmacy_pharled_return->RNDOFF->caption() ?></span></td>
		<td data-name="RNDOFF"<?php echo $view_pharmacy_pharled_return->RNDOFF->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RNDOFF">
<span<?php echo $view_pharmacy_pharled_return->RNDOFF->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->RNDOFF->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DISCONMRP->Visible) { // DISCONMRP ?>
	<tr id="r_DISCONMRP">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DISCONMRP"><?php echo $view_pharmacy_pharled_return->DISCONMRP->caption() ?></span></td>
		<td data-name="DISCONMRP"<?php echo $view_pharmacy_pharled_return->DISCONMRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DISCONMRP">
<span<?php echo $view_pharmacy_pharled_return->DISCONMRP->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DISCONMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DELVDT->Visible) { // DELVDT ?>
	<tr id="r_DELVDT">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DELVDT"><?php echo $view_pharmacy_pharled_return->DELVDT->caption() ?></span></td>
		<td data-name="DELVDT"<?php echo $view_pharmacy_pharled_return->DELVDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVDT">
<span<?php echo $view_pharmacy_pharled_return->DELVDT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DELVDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DELVTIME->Visible) { // DELVTIME ?>
	<tr id="r_DELVTIME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DELVTIME"><?php echo $view_pharmacy_pharled_return->DELVTIME->caption() ?></span></td>
		<td data-name="DELVTIME"<?php echo $view_pharmacy_pharled_return->DELVTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVTIME">
<span<?php echo $view_pharmacy_pharled_return->DELVTIME->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DELVTIME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DELVBY->Visible) { // DELVBY ?>
	<tr id="r_DELVBY">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_DELVBY"><?php echo $view_pharmacy_pharled_return->DELVBY->caption() ?></span></td>
		<td data-name="DELVBY"<?php echo $view_pharmacy_pharled_return->DELVBY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVBY">
<span<?php echo $view_pharmacy_pharled_return->DELVBY->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DELVBY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->HOSPNO->Visible) { // HOSPNO ?>
	<tr id="r_HOSPNO">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_HOSPNO"><?php echo $view_pharmacy_pharled_return->HOSPNO->caption() ?></span></td>
		<td data-name="HOSPNO"<?php echo $view_pharmacy_pharled_return->HOSPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_HOSPNO">
<span<?php echo $view_pharmacy_pharled_return->HOSPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->HOSPNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_id"><?php echo $view_pharmacy_pharled_return->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_pharmacy_pharled_return->id->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return->id->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->pbv->Visible) { // pbv ?>
	<tr id="r_pbv">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_pbv"><?php echo $view_pharmacy_pharled_return->pbv->caption() ?></span></td>
		<td data-name="pbv"<?php echo $view_pharmacy_pharled_return->pbv->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_pbv">
<span<?php echo $view_pharmacy_pharled_return->pbv->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->pbv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->pbt->Visible) { // pbt ?>
	<tr id="r_pbt">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_pbt"><?php echo $view_pharmacy_pharled_return->pbt->caption() ?></span></td>
		<td data-name="pbt"<?php echo $view_pharmacy_pharled_return->pbt->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_pbt">
<span<?php echo $view_pharmacy_pharled_return->pbt->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->pbt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
	<tr id="r_HosoID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_HosoID"><?php echo $view_pharmacy_pharled_return->HosoID->caption() ?></span></td>
		<td data-name="HosoID"<?php echo $view_pharmacy_pharled_return->HosoID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_HosoID">
<span<?php echo $view_pharmacy_pharled_return->HosoID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->HosoID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_createdby"><?php echo $view_pharmacy_pharled_return->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $view_pharmacy_pharled_return->createdby->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_createdby">
<span<?php echo $view_pharmacy_pharled_return->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_createddatetime"><?php echo $view_pharmacy_pharled_return->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $view_pharmacy_pharled_return->createddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_createddatetime">
<span<?php echo $view_pharmacy_pharled_return->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_modifiedby"><?php echo $view_pharmacy_pharled_return->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $view_pharmacy_pharled_return->modifiedby->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_modifiedby">
<span<?php echo $view_pharmacy_pharled_return->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_modifieddatetime"><?php echo $view_pharmacy_pharled_return->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_pharled_return->modifieddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_modifieddatetime">
<span<?php echo $view_pharmacy_pharled_return->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_MFRCODE"><?php echo $view_pharmacy_pharled_return->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $view_pharmacy_pharled_return->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MFRCODE">
<span<?php echo $view_pharmacy_pharled_return->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_Reception"><?php echo $view_pharmacy_pharled_return->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $view_pharmacy_pharled_return->Reception->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Reception">
<span<?php echo $view_pharmacy_pharled_return->Reception->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_PatID"><?php echo $view_pharmacy_pharled_return->PatID->caption() ?></span></td>
		<td data-name="PatID"<?php echo $view_pharmacy_pharled_return->PatID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PatID">
<span<?php echo $view_pharmacy_pharled_return->PatID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_mrnno"><?php echo $view_pharmacy_pharled_return->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $view_pharmacy_pharled_return->mrnno->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_mrnno">
<span<?php echo $view_pharmacy_pharled_return->mrnno->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
	<tr id="r_BRNAME">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_BRNAME"><?php echo $view_pharmacy_pharled_return->BRNAME->caption() ?></span></td>
		<td data-name="BRNAME"<?php echo $view_pharmacy_pharled_return->BRNAME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BRNAME">
<span<?php echo $view_pharmacy_pharled_return->BRNAME->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->sretid->Visible) { // sretid ?>
	<tr id="r_sretid">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_sretid"><?php echo $view_pharmacy_pharled_return->sretid->caption() ?></span></td>
		<td data-name="sretid"<?php echo $view_pharmacy_pharled_return->sretid->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_sretid">
<span<?php echo $view_pharmacy_pharled_return->sretid->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->sretid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->sprid->Visible) { // sprid ?>
	<tr id="r_sprid">
		<td class="<?php echo $view_pharmacy_pharled_return_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_pharled_return_sprid"><?php echo $view_pharmacy_pharled_return->sprid->caption() ?></span></td>
		<td data-name="sprid"<?php echo $view_pharmacy_pharled_return->sprid->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_sprid">
<span<?php echo $view_pharmacy_pharled_return->sprid->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->sprid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_pharmacy_pharled_return_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_pharled_return_view->terminate();
?>