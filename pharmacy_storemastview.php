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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_storemast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_storemastview = currentForm = new ew.Form("fpharmacy_storemastview", "view");

// Form_CustomValidate event
fpharmacy_storemastview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_storemastview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_storemastview.lists["x_TYPE"] = <?php echo $pharmacy_storemast_view->TYPE->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_TYPE"].options = <?php echo JsonEncode($pharmacy_storemast_view->TYPE->options(FALSE, TRUE)) ?>;
fpharmacy_storemastview.lists["x_LASTSUPP"] = <?php echo $pharmacy_storemast_view->LASTSUPP->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_LASTSUPP"].options = <?php echo JsonEncode($pharmacy_storemast_view->LASTSUPP->lookupOptions()) ?>;
fpharmacy_storemastview.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_view->GENNAME->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_view->GENNAME->lookupOptions()) ?>;
fpharmacy_storemastview.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_storemastview.lists["x_DRID"] = <?php echo $pharmacy_storemast_view->DRID->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_DRID"].options = <?php echo JsonEncode($pharmacy_storemast_view->DRID->lookupOptions()) ?>;
fpharmacy_storemastview.lists["x_MFRCODE"] = <?php echo $pharmacy_storemast_view->MFRCODE->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_MFRCODE"].options = <?php echo JsonEncode($pharmacy_storemast_view->MFRCODE->lookupOptions()) ?>;
fpharmacy_storemastview.lists["x_COMBCODE"] = <?php echo $pharmacy_storemast_view->COMBCODE->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_storemast_view->COMBCODE->lookupOptions()) ?>;
fpharmacy_storemastview.lists["x_GENCODE"] = <?php echo $pharmacy_storemast_view->GENCODE->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_storemast_view->GENCODE->lookupOptions()) ?>;
fpharmacy_storemastview.lists["x_UNIT"] = <?php echo $pharmacy_storemast_view->UNIT->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_UNIT"].options = <?php echo JsonEncode($pharmacy_storemast_view->UNIT->options(FALSE, TRUE)) ?>;
fpharmacy_storemastview.lists["x_FORMULARY"] = <?php echo $pharmacy_storemast_view->FORMULARY->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_FORMULARY"].options = <?php echo JsonEncode($pharmacy_storemast_view->FORMULARY->options(FALSE, TRUE)) ?>;
fpharmacy_storemastview.lists["x_SUPPNAME"] = <?php echo $pharmacy_storemast_view->SUPPNAME->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_SUPPNAME"].options = <?php echo JsonEncode($pharmacy_storemast_view->SUPPNAME->lookupOptions()) ?>;
fpharmacy_storemastview.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_view->COMBNAME->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_view->COMBNAME->lookupOptions()) ?>;
fpharmacy_storemastview.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_view->GENERICNAME->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_view->GENERICNAME->lookupOptions()) ?>;
fpharmacy_storemastview.lists["x_Scheduling"] = <?php echo $pharmacy_storemast_view->Scheduling->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_Scheduling"].options = <?php echo JsonEncode($pharmacy_storemast_view->Scheduling->options(FALSE, TRUE)) ?>;
fpharmacy_storemastview.lists["x_Schedulingh1"] = <?php echo $pharmacy_storemast_view->Schedulingh1->Lookup->toClientList() ?>;
fpharmacy_storemastview.lists["x_Schedulingh1"].options = <?php echo JsonEncode($pharmacy_storemast_view->Schedulingh1->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_storemast->isExport()) { ?>
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
<?php if ($pharmacy_storemast_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_storemast_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_storemast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_storemast->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRCODE"><?php echo $pharmacy_storemast->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $pharmacy_storemast->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BRCODE">
<span<?php echo $pharmacy_storemast->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PRC"><?php echo $pharmacy_storemast->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $pharmacy_storemast->PRC->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PRC">
<span<?php echo $pharmacy_storemast->PRC->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->TYPE->Visible) { // TYPE ?>
	<tr id="r_TYPE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_TYPE"><?php echo $pharmacy_storemast->TYPE->caption() ?></span></td>
		<td data-name="TYPE"<?php echo $pharmacy_storemast->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TYPE">
<span<?php echo $pharmacy_storemast->TYPE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->DES->Visible) { // DES ?>
	<tr id="r_DES">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_DES"><?php echo $pharmacy_storemast->DES->caption() ?></span></td>
		<td data-name="DES"<?php echo $pharmacy_storemast->DES->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DES">
<span<?php echo $pharmacy_storemast->DES->viewAttributes() ?>>
<?php echo $pharmacy_storemast->DES->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->UM->Visible) { // UM ?>
	<tr id="r_UM">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_UM"><?php echo $pharmacy_storemast->UM->caption() ?></span></td>
		<td data-name="UM"<?php echo $pharmacy_storemast->UM->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UM">
<span<?php echo $pharmacy_storemast->UM->viewAttributes() ?>>
<?php echo $pharmacy_storemast->UM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_RT"><?php echo $pharmacy_storemast->RT->caption() ?></span></td>
		<td data-name="RT"<?php echo $pharmacy_storemast->RT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RT">
<span<?php echo $pharmacy_storemast->RT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_BATCHNO"><?php echo $pharmacy_storemast->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO"<?php echo $pharmacy_storemast->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BATCHNO">
<span<?php echo $pharmacy_storemast->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_storemast->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_MRP"><?php echo $pharmacy_storemast->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $pharmacy_storemast->MRP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MRP">
<span<?php echo $pharmacy_storemast->MRP->viewAttributes() ?>>
<?php echo $pharmacy_storemast->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_EXPDT"><?php echo $pharmacy_storemast->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT"<?php echo $pharmacy_storemast->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_EXPDT">
<span<?php echo $pharmacy_storemast->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->LASTPURDT->Visible) { // LASTPURDT ?>
	<tr id="r_LASTPURDT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTPURDT"><?php echo $pharmacy_storemast->LASTPURDT->caption() ?></span></td>
		<td data-name="LASTPURDT"<?php echo $pharmacy_storemast->LASTPURDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTPURDT">
<span<?php echo $pharmacy_storemast->LASTPURDT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->LASTPURDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->LASTSUPP->Visible) { // LASTSUPP ?>
	<tr id="r_LASTSUPP">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTSUPP"><?php echo $pharmacy_storemast->LASTSUPP->caption() ?></span></td>
		<td data-name="LASTSUPP"<?php echo $pharmacy_storemast->LASTSUPP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTSUPP">
<span<?php echo $pharmacy_storemast->LASTSUPP->viewAttributes() ?>>
<?php echo $pharmacy_storemast->LASTSUPP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENNAME"><?php echo $pharmacy_storemast->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME"<?php echo $pharmacy_storemast->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENNAME">
<span<?php echo $pharmacy_storemast->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->LASTISSDT->Visible) { // LASTISSDT ?>
	<tr id="r_LASTISSDT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTISSDT"><?php echo $pharmacy_storemast->LASTISSDT->caption() ?></span></td>
		<td data-name="LASTISSDT"<?php echo $pharmacy_storemast->LASTISSDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTISSDT">
<span<?php echo $pharmacy_storemast->LASTISSDT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->LASTISSDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
	<tr id="r_CREATEDDT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_CREATEDDT"><?php echo $pharmacy_storemast->CREATEDDT->caption() ?></span></td>
		<td data-name="CREATEDDT"<?php echo $pharmacy_storemast->CREATEDDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_CREATEDDT">
<span<?php echo $pharmacy_storemast->CREATEDDT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->CREATEDDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->DRID->Visible) { // DRID ?>
	<tr id="r_DRID">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_DRID"><?php echo $pharmacy_storemast->DRID->caption() ?></span></td>
		<td data-name="DRID"<?php echo $pharmacy_storemast->DRID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DRID">
<span<?php echo $pharmacy_storemast->DRID->viewAttributes() ?>>
<?php echo $pharmacy_storemast->DRID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_MFRCODE"><?php echo $pharmacy_storemast->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $pharmacy_storemast->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MFRCODE">
<span<?php echo $pharmacy_storemast->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->COMBCODE->Visible) { // COMBCODE ?>
	<tr id="r_COMBCODE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBCODE"><?php echo $pharmacy_storemast->COMBCODE->caption() ?></span></td>
		<td data-name="COMBCODE"<?php echo $pharmacy_storemast->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBCODE">
<span<?php echo $pharmacy_storemast->COMBCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->COMBCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->GENCODE->Visible) { // GENCODE ?>
	<tr id="r_GENCODE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENCODE"><?php echo $pharmacy_storemast->GENCODE->caption() ?></span></td>
		<td data-name="GENCODE"<?php echo $pharmacy_storemast->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENCODE">
<span<?php echo $pharmacy_storemast->GENCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->GENCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->STRENGTH->Visible) { // STRENGTH ?>
	<tr id="r_STRENGTH">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_STRENGTH"><?php echo $pharmacy_storemast->STRENGTH->caption() ?></span></td>
		<td data-name="STRENGTH"<?php echo $pharmacy_storemast->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_storemast_STRENGTH">
<span<?php echo $pharmacy_storemast->STRENGTH->viewAttributes() ?>>
<?php echo $pharmacy_storemast->STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->UNIT->Visible) { // UNIT ?>
	<tr id="r_UNIT">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_UNIT"><?php echo $pharmacy_storemast->UNIT->caption() ?></span></td>
		<td data-name="UNIT"<?php echo $pharmacy_storemast->UNIT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UNIT">
<span<?php echo $pharmacy_storemast->UNIT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->UNIT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->FORMULARY->Visible) { // FORMULARY ?>
	<tr id="r_FORMULARY">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_FORMULARY"><?php echo $pharmacy_storemast->FORMULARY->caption() ?></span></td>
		<td data-name="FORMULARY"<?php echo $pharmacy_storemast->FORMULARY->cellAttributes() ?>>
<span id="el_pharmacy_storemast_FORMULARY">
<span<?php echo $pharmacy_storemast->FORMULARY->viewAttributes() ?>>
<?php echo $pharmacy_storemast->FORMULARY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->RACKNO->Visible) { // RACKNO ?>
	<tr id="r_RACKNO">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_RACKNO"><?php echo $pharmacy_storemast->RACKNO->caption() ?></span></td>
		<td data-name="RACKNO"<?php echo $pharmacy_storemast->RACKNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RACKNO">
<span<?php echo $pharmacy_storemast->RACKNO->viewAttributes() ?>>
<?php echo $pharmacy_storemast->RACKNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->SUPPNAME->Visible) { // SUPPNAME ?>
	<tr id="r_SUPPNAME">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SUPPNAME"><?php echo $pharmacy_storemast->SUPPNAME->caption() ?></span></td>
		<td data-name="SUPPNAME"<?php echo $pharmacy_storemast->SUPPNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SUPPNAME">
<span<?php echo $pharmacy_storemast->SUPPNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SUPPNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->COMBNAME->Visible) { // COMBNAME ?>
	<tr id="r_COMBNAME">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBNAME"><?php echo $pharmacy_storemast->COMBNAME->caption() ?></span></td>
		<td data-name="COMBNAME"<?php echo $pharmacy_storemast->COMBNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBNAME">
<span<?php echo $pharmacy_storemast->COMBNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->COMBNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
	<tr id="r_GENERICNAME">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENERICNAME"><?php echo $pharmacy_storemast->GENERICNAME->caption() ?></span></td>
		<td data-name="GENERICNAME"<?php echo $pharmacy_storemast->GENERICNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENERICNAME">
<span<?php echo $pharmacy_storemast->GENERICNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->GENERICNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->REMARK->Visible) { // REMARK ?>
	<tr id="r_REMARK">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_REMARK"><?php echo $pharmacy_storemast->REMARK->caption() ?></span></td>
		<td data-name="REMARK"<?php echo $pharmacy_storemast->REMARK->cellAttributes() ?>>
<span id="el_pharmacy_storemast_REMARK">
<span<?php echo $pharmacy_storemast->REMARK->viewAttributes() ?>>
<?php echo $pharmacy_storemast->REMARK->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->TEMP->Visible) { // TEMP ?>
	<tr id="r_TEMP">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_TEMP"><?php echo $pharmacy_storemast->TEMP->caption() ?></span></td>
		<td data-name="TEMP"<?php echo $pharmacy_storemast->TEMP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TEMP">
<span<?php echo $pharmacy_storemast->TEMP->viewAttributes() ?>>
<?php echo $pharmacy_storemast->TEMP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_id"><?php echo $pharmacy_storemast->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_storemast->id->cellAttributes() ?>>
<span id="el_pharmacy_storemast_id">
<span<?php echo $pharmacy_storemast->id->viewAttributes() ?>>
<?php echo $pharmacy_storemast->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PurValue"><?php echo $pharmacy_storemast->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $pharmacy_storemast->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PurValue">
<span<?php echo $pharmacy_storemast->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PSGST"><?php echo $pharmacy_storemast->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $pharmacy_storemast->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PSGST">
<span<?php echo $pharmacy_storemast->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PCGST"><?php echo $pharmacy_storemast->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $pharmacy_storemast->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PCGST">
<span<?php echo $pharmacy_storemast->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->SaleValue->Visible) { // SaleValue ?>
	<tr id="r_SaleValue">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleValue"><?php echo $pharmacy_storemast->SaleValue->caption() ?></span></td>
		<td data-name="SaleValue"<?php echo $pharmacy_storemast->SaleValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleValue">
<span<?php echo $pharmacy_storemast->SaleValue->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SaleValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SSGST"><?php echo $pharmacy_storemast->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $pharmacy_storemast->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SSGST">
<span<?php echo $pharmacy_storemast->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SCGST"><?php echo $pharmacy_storemast->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $pharmacy_storemast->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SCGST">
<span<?php echo $pharmacy_storemast->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->SaleRate->Visible) { // SaleRate ?>
	<tr id="r_SaleRate">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleRate"><?php echo $pharmacy_storemast->SaleRate->caption() ?></span></td>
		<td data-name="SaleRate"<?php echo $pharmacy_storemast->SaleRate->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleRate">
<span<?php echo $pharmacy_storemast->SaleRate->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SaleRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_HospID"><?php echo $pharmacy_storemast->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $pharmacy_storemast->HospID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_HospID">
<span<?php echo $pharmacy_storemast->HospID->viewAttributes() ?>>
<?php echo $pharmacy_storemast->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->BRNAME->Visible) { // BRNAME ?>
	<tr id="r_BRNAME">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRNAME"><?php echo $pharmacy_storemast->BRNAME->caption() ?></span></td>
		<td data-name="BRNAME"<?php echo $pharmacy_storemast->BRNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BRNAME">
<span<?php echo $pharmacy_storemast->BRNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->BRNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->OV->Visible) { // OV ?>
	<tr id="r_OV">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_OV"><?php echo $pharmacy_storemast->OV->caption() ?></span></td>
		<td data-name="OV"<?php echo $pharmacy_storemast->OV->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OV">
<span<?php echo $pharmacy_storemast->OV->viewAttributes() ?>>
<?php echo $pharmacy_storemast->OV->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->LATESTOV->Visible) { // LATESTOV ?>
	<tr id="r_LATESTOV">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LATESTOV"><?php echo $pharmacy_storemast->LATESTOV->caption() ?></span></td>
		<td data-name="LATESTOV"<?php echo $pharmacy_storemast->LATESTOV->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LATESTOV">
<span<?php echo $pharmacy_storemast->LATESTOV->viewAttributes() ?>>
<?php echo $pharmacy_storemast->LATESTOV->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->ITEMTYPE->Visible) { // ITEMTYPE ?>
	<tr id="r_ITEMTYPE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_ITEMTYPE"><?php echo $pharmacy_storemast->ITEMTYPE->caption() ?></span></td>
		<td data-name="ITEMTYPE"<?php echo $pharmacy_storemast->ITEMTYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_ITEMTYPE">
<span<?php echo $pharmacy_storemast->ITEMTYPE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->ITEMTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->ROWID->Visible) { // ROWID ?>
	<tr id="r_ROWID">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_ROWID"><?php echo $pharmacy_storemast->ROWID->caption() ?></span></td>
		<td data-name="ROWID"<?php echo $pharmacy_storemast->ROWID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_ROWID">
<span<?php echo $pharmacy_storemast->ROWID->viewAttributes() ?>>
<?php echo $pharmacy_storemast->ROWID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->MOVED->Visible) { // MOVED ?>
	<tr id="r_MOVED">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_MOVED"><?php echo $pharmacy_storemast->MOVED->caption() ?></span></td>
		<td data-name="MOVED"<?php echo $pharmacy_storemast->MOVED->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MOVED">
<span<?php echo $pharmacy_storemast->MOVED->viewAttributes() ?>>
<?php echo $pharmacy_storemast->MOVED->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->NEWTAX->Visible) { // NEWTAX ?>
	<tr id="r_NEWTAX">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWTAX"><?php echo $pharmacy_storemast->NEWTAX->caption() ?></span></td>
		<td data-name="NEWTAX"<?php echo $pharmacy_storemast->NEWTAX->cellAttributes() ?>>
<span id="el_pharmacy_storemast_NEWTAX">
<span<?php echo $pharmacy_storemast->NEWTAX->viewAttributes() ?>>
<?php echo $pharmacy_storemast->NEWTAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->HSNCODE->Visible) { // HSNCODE ?>
	<tr id="r_HSNCODE">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_HSNCODE"><?php echo $pharmacy_storemast->HSNCODE->caption() ?></span></td>
		<td data-name="HSNCODE"<?php echo $pharmacy_storemast->HSNCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_HSNCODE">
<span<?php echo $pharmacy_storemast->HSNCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->HSNCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->OLDTAX->Visible) { // OLDTAX ?>
	<tr id="r_OLDTAX">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_OLDTAX"><?php echo $pharmacy_storemast->OLDTAX->caption() ?></span></td>
		<td data-name="OLDTAX"<?php echo $pharmacy_storemast->OLDTAX->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OLDTAX">
<span<?php echo $pharmacy_storemast->OLDTAX->viewAttributes() ?>>
<?php echo $pharmacy_storemast->OLDTAX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->Scheduling->Visible) { // Scheduling ?>
	<tr id="r_Scheduling">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_Scheduling"><?php echo $pharmacy_storemast->Scheduling->caption() ?></span></td>
		<td data-name="Scheduling"<?php echo $pharmacy_storemast->Scheduling->cellAttributes() ?>>
<span id="el_pharmacy_storemast_Scheduling">
<span<?php echo $pharmacy_storemast->Scheduling->viewAttributes() ?>>
<?php echo $pharmacy_storemast->Scheduling->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_storemast->Schedulingh1->Visible) { // Schedulingh1 ?>
	<tr id="r_Schedulingh1">
		<td class="<?php echo $pharmacy_storemast_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_Schedulingh1"><?php echo $pharmacy_storemast->Schedulingh1->caption() ?></span></td>
		<td data-name="Schedulingh1"<?php echo $pharmacy_storemast->Schedulingh1->cellAttributes() ?>>
<span id="el_pharmacy_storemast_Schedulingh1">
<span<?php echo $pharmacy_storemast->Schedulingh1->viewAttributes() ?>>
<?php echo $pharmacy_storemast->Schedulingh1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_storemast_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_storemast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_storemast_view->terminate();
?>