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
$pharmacy_storemast_list = new pharmacy_storemast_list();

// Run the page
$pharmacy_storemast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_storemast_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_storemast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_storemastlist = currentForm = new ew.Form("fpharmacy_storemastlist", "list");
fpharmacy_storemastlist.formKeyCountName = '<?php echo $pharmacy_storemast_list->FormKeyCountName ?>';

// Validate form
fpharmacy_storemastlist.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($pharmacy_storemast_list->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->BRCODE->caption(), $pharmacy_storemast->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PRC->caption(), $pharmacy_storemast->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->TYPE->caption(), $pharmacy_storemast->TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->DES->Required) { ?>
			elm = this.getElements("x" + infix + "_DES");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->DES->caption(), $pharmacy_storemast->DES->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->UM->Required) { ?>
			elm = this.getElements("x" + infix + "_UM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->UM->caption(), $pharmacy_storemast->UM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->RT->caption(), $pharmacy_storemast->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->RT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->BATCHNO->caption(), $pharmacy_storemast->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->MRP->caption(), $pharmacy_storemast->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->MRP->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->EXPDT->caption(), $pharmacy_storemast->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->EXPDT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->GENNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->GENNAME->caption(), $pharmacy_storemast->GENNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->CREATEDDT->Required) { ?>
			elm = this.getElements("x" + infix + "_CREATEDDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->CREATEDDT->caption(), $pharmacy_storemast->CREATEDDT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->DRID->Required) { ?>
			elm = this.getElements("x" + infix + "_DRID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->DRID->caption(), $pharmacy_storemast->DRID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->MFRCODE->caption(), $pharmacy_storemast->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->COMBCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_COMBCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->COMBCODE->caption(), $pharmacy_storemast->COMBCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->GENCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_GENCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->GENCODE->caption(), $pharmacy_storemast->GENCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->STRENGTH->Required) { ?>
			elm = this.getElements("x" + infix + "_STRENGTH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->STRENGTH->caption(), $pharmacy_storemast->STRENGTH->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_STRENGTH");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->STRENGTH->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->UNIT->Required) { ?>
			elm = this.getElements("x" + infix + "_UNIT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->UNIT->caption(), $pharmacy_storemast->UNIT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->FORMULARY->Required) { ?>
			elm = this.getElements("x" + infix + "_FORMULARY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->FORMULARY->caption(), $pharmacy_storemast->FORMULARY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->COMBNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_COMBNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->COMBNAME->caption(), $pharmacy_storemast->COMBNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->GENERICNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENERICNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->GENERICNAME->caption(), $pharmacy_storemast->GENERICNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->REMARK->Required) { ?>
			elm = this.getElements("x" + infix + "_REMARK");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->REMARK->caption(), $pharmacy_storemast->REMARK->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->TEMP->Required) { ?>
			elm = this.getElements("x" + infix + "_TEMP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->TEMP->caption(), $pharmacy_storemast->TEMP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->id->caption(), $pharmacy_storemast->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PurValue->caption(), $pharmacy_storemast->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PurValue->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PSGST->caption(), $pharmacy_storemast->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PSGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PCGST->caption(), $pharmacy_storemast->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PCGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->SaleValue->Required) { ?>
			elm = this.getElements("x" + infix + "_SaleValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SaleValue->caption(), $pharmacy_storemast->SaleValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SaleValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SaleValue->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SSGST->caption(), $pharmacy_storemast->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SSGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SCGST->caption(), $pharmacy_storemast->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SCGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->SaleRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SaleRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SaleRate->caption(), $pharmacy_storemast->SaleRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SaleRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SaleRate->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->HospID->caption(), $pharmacy_storemast->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->BRNAME->caption(), $pharmacy_storemast->BRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->Scheduling->Required) { ?>
			elm = this.getElements("x" + infix + "_Scheduling");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->Scheduling->caption(), $pharmacy_storemast->Scheduling->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_list->Schedulingh1->Required) { ?>
			elm = this.getElements("x" + infix + "_Schedulingh1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->Schedulingh1->caption(), $pharmacy_storemast->Schedulingh1->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpharmacy_storemastlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_storemastlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_storemastlist.lists["x_TYPE"] = <?php echo $pharmacy_storemast_list->TYPE->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_TYPE"].options = <?php echo JsonEncode($pharmacy_storemast_list->TYPE->options(FALSE, TRUE)) ?>;
fpharmacy_storemastlist.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_list->GENNAME->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_list->GENNAME->lookupOptions()) ?>;
fpharmacy_storemastlist.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_storemastlist.lists["x_DRID"] = <?php echo $pharmacy_storemast_list->DRID->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_DRID"].options = <?php echo JsonEncode($pharmacy_storemast_list->DRID->lookupOptions()) ?>;
fpharmacy_storemastlist.lists["x_MFRCODE"] = <?php echo $pharmacy_storemast_list->MFRCODE->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_MFRCODE"].options = <?php echo JsonEncode($pharmacy_storemast_list->MFRCODE->lookupOptions()) ?>;
fpharmacy_storemastlist.lists["x_COMBCODE"] = <?php echo $pharmacy_storemast_list->COMBCODE->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_storemast_list->COMBCODE->lookupOptions()) ?>;
fpharmacy_storemastlist.lists["x_GENCODE"] = <?php echo $pharmacy_storemast_list->GENCODE->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_storemast_list->GENCODE->lookupOptions()) ?>;
fpharmacy_storemastlist.lists["x_UNIT"] = <?php echo $pharmacy_storemast_list->UNIT->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_UNIT"].options = <?php echo JsonEncode($pharmacy_storemast_list->UNIT->options(FALSE, TRUE)) ?>;
fpharmacy_storemastlist.lists["x_FORMULARY"] = <?php echo $pharmacy_storemast_list->FORMULARY->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_FORMULARY"].options = <?php echo JsonEncode($pharmacy_storemast_list->FORMULARY->options(FALSE, TRUE)) ?>;
fpharmacy_storemastlist.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_list->COMBNAME->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_list->COMBNAME->lookupOptions()) ?>;
fpharmacy_storemastlist.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_list->GENERICNAME->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_list->GENERICNAME->lookupOptions()) ?>;
fpharmacy_storemastlist.lists["x_Scheduling"] = <?php echo $pharmacy_storemast_list->Scheduling->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_Scheduling"].options = <?php echo JsonEncode($pharmacy_storemast_list->Scheduling->options(FALSE, TRUE)) ?>;
fpharmacy_storemastlist.lists["x_Schedulingh1"] = <?php echo $pharmacy_storemast_list->Schedulingh1->Lookup->toClientList() ?>;
fpharmacy_storemastlist.lists["x_Schedulingh1"].options = <?php echo JsonEncode($pharmacy_storemast_list->Schedulingh1->options(FALSE, TRUE)) ?>;

// Form object for search
var fpharmacy_storemastlistsrch = currentSearchForm = new ew.Form("fpharmacy_storemastlistsrch");

// Validate function for search
fpharmacy_storemastlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_storemastlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_storemastlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_storemastlistsrch.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_list->GENNAME->Lookup->toClientList() ?>;
fpharmacy_storemastlistsrch.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_list->GENNAME->lookupOptions()) ?>;
fpharmacy_storemastlistsrch.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_storemastlistsrch.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_list->COMBNAME->Lookup->toClientList() ?>;
fpharmacy_storemastlistsrch.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_list->COMBNAME->lookupOptions()) ?>;
fpharmacy_storemastlistsrch.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_list->GENERICNAME->Lookup->toClientList() ?>;
fpharmacy_storemastlistsrch.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_list->GENERICNAME->lookupOptions()) ?>;

// Filters
fpharmacy_storemastlistsrch.filterList = <?php echo $pharmacy_storemast_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_storemast->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_storemast_list->TotalRecs > 0 && $pharmacy_storemast_list->ExportOptions->visible()) { ?>
<?php $pharmacy_storemast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->ImportOptions->visible()) { ?>
<?php $pharmacy_storemast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->SearchOptions->visible()) { ?>
<?php $pharmacy_storemast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->FilterOptions->visible()) { ?>
<?php $pharmacy_storemast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_storemast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_storemast->isExport() && !$pharmacy_storemast->CurrentAction) { ?>
<form name="fpharmacy_storemastlistsrch" id="fpharmacy_storemastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_storemast_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_storemastlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_storemast">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$pharmacy_storemast_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$pharmacy_storemast->RowType = ROWTYPE_SEARCH;

// Render row
$pharmacy_storemast->resetAttributes();
$pharmacy_storemast_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($pharmacy_storemast->DES->Visible) { // DES ?>
	<div id="xsc_DES" class="ew-cell form-group">
		<label for="x_DES" class="ew-search-caption ew-label"><?php echo $pharmacy_storemast->DES->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DES" id="z_DES" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->DES->EditValue ?>"<?php echo $pharmacy_storemast->DES->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENNAME->Visible) { // GENNAME ?>
	<div id="xsc_GENNAME" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $pharmacy_storemast->GENNAME->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE"></span>
		<span class="ew-search-field">
<?php
$wrkonchange = "" . trim(@$pharmacy_storemast->GENNAME->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_storemast->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x_GENNAME" class="text-nowrap" style="z-index: 8810">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x_GENNAME" id="sv_x_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENNAME->ReadOnly || $pharmacy_storemast->GENNAME->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_storemastlistsrch.createAutoSuggest({"id":"x_GENNAME","forceSelect":false});
</script>
<?php echo $pharmacy_storemast->GENNAME->Lookup->getParamTag("p_x_GENNAME") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($pharmacy_storemast->COMBNAME->Visible) { // COMBNAME ?>
	<div id="xsc_COMBNAME" class="ew-cell form-group">
		<label for="x_COMBNAME" class="ew-search-caption ew-label"><?php echo $pharmacy_storemast->COMBNAME->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_COMBNAME" id="z_COMBNAME" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?php echo strval($pharmacy_storemast->COMBNAME->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBNAME->AdvancedSearch->ViewValue) : $pharmacy_storemast->COMBNAME->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBNAME->ReadOnly || $pharmacy_storemast->COMBNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBNAME->Lookup->getParamTag("p_x_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?php echo $pharmacy_storemast->COMBNAME->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast->COMBNAME->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
	<div id="xsc_GENERICNAME" class="ew-cell form-group">
		<label for="x_GENERICNAME" class="ew-search-caption ew-label"><?php echo $pharmacy_storemast->GENERICNAME->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GENERICNAME" id="z_GENERICNAME" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?php echo strval($pharmacy_storemast->GENERICNAME->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENERICNAME->AdvancedSearch->ViewValue) : $pharmacy_storemast->GENERICNAME->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENERICNAME->ReadOnly || $pharmacy_storemast->GENERICNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENERICNAME->Lookup->getParamTag("p_x_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?php echo $pharmacy_storemast->GENERICNAME->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast->GENERICNAME->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_storemast_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_storemast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_storemast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_storemast_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_storemast_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_storemast_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_storemast_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_storemast_list->showPageHeader(); ?>
<?php
$pharmacy_storemast_list->showMessage();
?>
<?php if ($pharmacy_storemast_list->TotalRecs > 0 || $pharmacy_storemast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_storemast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_storemast">
<?php if (!$pharmacy_storemast->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_storemast->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_storemast_list->Pager)) $pharmacy_storemast_list->Pager = new NumericPager($pharmacy_storemast_list->StartRec, $pharmacy_storemast_list->DisplayRecs, $pharmacy_storemast_list->TotalRecs, $pharmacy_storemast_list->RecRange, $pharmacy_storemast_list->AutoHidePager) ?>
<?php if ($pharmacy_storemast_list->Pager->RecordCount > 0 && $pharmacy_storemast_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_storemast_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_storemast_list->pageUrl() ?>start=<?php echo $pharmacy_storemast_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_storemast_list->pageUrl() ?>start=<?php echo $pharmacy_storemast_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_storemast_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_storemast_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_storemast_list->pageUrl() ?>start=<?php echo $pharmacy_storemast_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_storemast_list->pageUrl() ?>start=<?php echo $pharmacy_storemast_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_storemast_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_storemast_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_storemast_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_storemast_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_storemast_list->TotalRecs > 0 && (!$pharmacy_storemast_list->AutoHidePageSizeSelector || $pharmacy_storemast_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_storemast">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_storemast_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_storemast_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_storemast_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_storemast_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_storemast_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_storemast_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_storemast->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_storemast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_storemastlist" id="fpharmacy_storemastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_storemast_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_storemast_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<div id="gmp_pharmacy_storemast" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_storemast_list->TotalRecs > 0 || $pharmacy_storemast->isGridEdit()) { ?>
<table id="tbl_pharmacy_storemastlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_storemast_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_storemast_list->renderListOptions();

// Render list options (header, left)
$pharmacy_storemast_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_storemast->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_storemast->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_storemast->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->BRCODE) ?>',1);"><div id="elh_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->BRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_storemast->PRC->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_storemast->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->PRC) ?>',1);"><div id="elh_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->TYPE->Visible) { // TYPE ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->TYPE) == "") { ?>
		<th data-name="TYPE" class="<?php echo $pharmacy_storemast->TYPE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TYPE" class="<?php echo $pharmacy_storemast->TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->TYPE) ?>',1);"><div id="elh_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->DES->Visible) { // DES ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $pharmacy_storemast->DES->headerCellClass() ?>"><div id="elh_pharmacy_storemast_DES" class="pharmacy_storemast_DES"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $pharmacy_storemast->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->DES) ?>',1);"><div id="elh_pharmacy_storemast_DES" class="pharmacy_storemast_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->DES->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->DES->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->UM->Visible) { // UM ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->UM) == "") { ?>
		<th data-name="UM" class="<?php echo $pharmacy_storemast->UM->headerCellClass() ?>"><div id="elh_pharmacy_storemast_UM" class="pharmacy_storemast_UM"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->UM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UM" class="<?php echo $pharmacy_storemast->UM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->UM) ?>',1);"><div id="elh_pharmacy_storemast_UM" class="pharmacy_storemast_UM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->UM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->UM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->UM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->RT->Visible) { // RT ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $pharmacy_storemast->RT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_RT" class="pharmacy_storemast_RT"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $pharmacy_storemast->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->RT) ?>',1);"><div id="elh_pharmacy_storemast_RT" class="pharmacy_storemast_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_storemast->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_storemast->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->BATCHNO) ?>',1);"><div id="elh_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->MRP->Visible) { // MRP ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_storemast->MRP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_storemast->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->MRP) ?>',1);"><div id="elh_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_storemast->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_storemast->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->EXPDT) ?>',1);"><div id="elh_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->GENNAME->Visible) { // GENNAME ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_storemast->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_storemast->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->GENNAME) ?>',1);"><div id="elh_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->CREATEDDT) == "") { ?>
		<th data-name="CREATEDDT" class="<?php echo $pharmacy_storemast->CREATEDDT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->CREATEDDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CREATEDDT" class="<?php echo $pharmacy_storemast->CREATEDDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->CREATEDDT) ?>',1);"><div id="elh_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->CREATEDDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->CREATEDDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->CREATEDDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->DRID->Visible) { // DRID ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->DRID) == "") { ?>
		<th data-name="DRID" class="<?php echo $pharmacy_storemast->DRID->headerCellClass() ?>"><div id="elh_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->DRID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRID" class="<?php echo $pharmacy_storemast->DRID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->DRID) ?>',1);"><div id="elh_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->DRID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->DRID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->DRID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $pharmacy_storemast->MFRCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $pharmacy_storemast->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->MFRCODE) ?>',1);"><div id="elh_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->COMBCODE->Visible) { // COMBCODE ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->COMBCODE) == "") { ?>
		<th data-name="COMBCODE" class="<?php echo $pharmacy_storemast->COMBCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->COMBCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COMBCODE" class="<?php echo $pharmacy_storemast->COMBCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->COMBCODE) ?>',1);"><div id="elh_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->COMBCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->COMBCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->COMBCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->GENCODE->Visible) { // GENCODE ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->GENCODE) == "") { ?>
		<th data-name="GENCODE" class="<?php echo $pharmacy_storemast->GENCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->GENCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENCODE" class="<?php echo $pharmacy_storemast->GENCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->GENCODE) ?>',1);"><div id="elh_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->GENCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->GENCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->GENCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->STRENGTH->Visible) { // STRENGTH ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->STRENGTH) == "") { ?>
		<th data-name="STRENGTH" class="<?php echo $pharmacy_storemast->STRENGTH->headerCellClass() ?>"><div id="elh_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STRENGTH" class="<?php echo $pharmacy_storemast->STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->STRENGTH) ?>',1);"><div id="elh_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->STRENGTH->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->STRENGTH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->STRENGTH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->UNIT->Visible) { // UNIT ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->UNIT) == "") { ?>
		<th data-name="UNIT" class="<?php echo $pharmacy_storemast->UNIT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->UNIT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNIT" class="<?php echo $pharmacy_storemast->UNIT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->UNIT) ?>',1);"><div id="elh_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->UNIT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->UNIT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->UNIT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->FORMULARY->Visible) { // FORMULARY ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->FORMULARY) == "") { ?>
		<th data-name="FORMULARY" class="<?php echo $pharmacy_storemast->FORMULARY->headerCellClass() ?>"><div id="elh_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->FORMULARY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FORMULARY" class="<?php echo $pharmacy_storemast->FORMULARY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->FORMULARY) ?>',1);"><div id="elh_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->FORMULARY->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->FORMULARY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->FORMULARY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->COMBNAME->Visible) { // COMBNAME ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->COMBNAME) == "") { ?>
		<th data-name="COMBNAME" class="<?php echo $pharmacy_storemast->COMBNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->COMBNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COMBNAME" class="<?php echo $pharmacy_storemast->COMBNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->COMBNAME) ?>',1);"><div id="elh_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->COMBNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->COMBNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->COMBNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->GENERICNAME) == "") { ?>
		<th data-name="GENERICNAME" class="<?php echo $pharmacy_storemast->GENERICNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->GENERICNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENERICNAME" class="<?php echo $pharmacy_storemast->GENERICNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->GENERICNAME) ?>',1);"><div id="elh_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->GENERICNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->GENERICNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->GENERICNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->REMARK->Visible) { // REMARK ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->REMARK) == "") { ?>
		<th data-name="REMARK" class="<?php echo $pharmacy_storemast->REMARK->headerCellClass() ?>"><div id="elh_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->REMARK->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="REMARK" class="<?php echo $pharmacy_storemast->REMARK->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->REMARK) ?>',1);"><div id="elh_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->REMARK->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->REMARK->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->REMARK->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->TEMP->Visible) { // TEMP ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->TEMP) == "") { ?>
		<th data-name="TEMP" class="<?php echo $pharmacy_storemast->TEMP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->TEMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TEMP" class="<?php echo $pharmacy_storemast->TEMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->TEMP) ?>',1);"><div id="elh_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->TEMP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->TEMP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->TEMP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->id->Visible) { // id ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_storemast->id->headerCellClass() ?>"><div id="elh_pharmacy_storemast_id" class="pharmacy_storemast_id"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_storemast->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->id) ?>',1);"><div id="elh_pharmacy_storemast_id" class="pharmacy_storemast_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->PurValue->Visible) { // PurValue ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $pharmacy_storemast->PurValue->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $pharmacy_storemast->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->PurValue) ?>',1);"><div id="elh_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->PSGST->Visible) { // PSGST ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $pharmacy_storemast->PSGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $pharmacy_storemast->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->PSGST) ?>',1);"><div id="elh_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->PCGST->Visible) { // PCGST ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $pharmacy_storemast->PCGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $pharmacy_storemast->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->PCGST) ?>',1);"><div id="elh_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->SaleValue->Visible) { // SaleValue ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->SaleValue) == "") { ?>
		<th data-name="SaleValue" class="<?php echo $pharmacy_storemast->SaleValue->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->SaleValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleValue" class="<?php echo $pharmacy_storemast->SaleValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->SaleValue) ?>',1);"><div id="elh_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->SaleValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->SaleValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->SaleValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->SSGST->Visible) { // SSGST ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_storemast->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_storemast->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->SSGST) ?>',1);"><div id="elh_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->SCGST->Visible) { // SCGST ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_storemast->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_storemast->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->SCGST) ?>',1);"><div id="elh_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->SaleRate->Visible) { // SaleRate ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->SaleRate) == "") { ?>
		<th data-name="SaleRate" class="<?php echo $pharmacy_storemast->SaleRate->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->SaleRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleRate" class="<?php echo $pharmacy_storemast->SaleRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->SaleRate) ?>',1);"><div id="elh_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->SaleRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->SaleRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->SaleRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_storemast->HospID->headerCellClass() ?>"><div id="elh_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_storemast->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->HospID) ?>',1);"><div id="elh_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->BRNAME->Visible) { // BRNAME ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_storemast->BRNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_storemast->BRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->BRNAME) ?>',1);"><div id="elh_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->BRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->BRNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->BRNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->Scheduling->Visible) { // Scheduling ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->Scheduling) == "") { ?>
		<th data-name="Scheduling" class="<?php echo $pharmacy_storemast->Scheduling->headerCellClass() ?>"><div id="elh_pharmacy_storemast_Scheduling" class="pharmacy_storemast_Scheduling"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->Scheduling->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Scheduling" class="<?php echo $pharmacy_storemast->Scheduling->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->Scheduling) ?>',1);"><div id="elh_pharmacy_storemast_Scheduling" class="pharmacy_storemast_Scheduling">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->Scheduling->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->Scheduling->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->Scheduling->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->Schedulingh1->Visible) { // Schedulingh1 ?>
	<?php if ($pharmacy_storemast->sortUrl($pharmacy_storemast->Schedulingh1) == "") { ?>
		<th data-name="Schedulingh1" class="<?php echo $pharmacy_storemast->Schedulingh1->headerCellClass() ?>"><div id="elh_pharmacy_storemast_Schedulingh1" class="pharmacy_storemast_Schedulingh1"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast->Schedulingh1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Schedulingh1" class="<?php echo $pharmacy_storemast->Schedulingh1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_storemast->SortUrl($pharmacy_storemast->Schedulingh1) ?>',1);"><div id="elh_pharmacy_storemast_Schedulingh1" class="pharmacy_storemast_Schedulingh1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast->Schedulingh1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast->Schedulingh1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_storemast->Schedulingh1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_storemast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_storemast->ExportAll && $pharmacy_storemast->isExport()) {
	$pharmacy_storemast_list->StopRec = $pharmacy_storemast_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_storemast_list->TotalRecs > $pharmacy_storemast_list->StartRec + $pharmacy_storemast_list->DisplayRecs - 1)
		$pharmacy_storemast_list->StopRec = $pharmacy_storemast_list->StartRec + $pharmacy_storemast_list->DisplayRecs - 1;
	else
		$pharmacy_storemast_list->StopRec = $pharmacy_storemast_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $pharmacy_storemast_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_storemast_list->FormKeyCountName) && ($pharmacy_storemast->isGridAdd() || $pharmacy_storemast->isGridEdit() || $pharmacy_storemast->isConfirm())) {
		$pharmacy_storemast_list->KeyCount = $CurrentForm->getValue($pharmacy_storemast_list->FormKeyCountName);
		$pharmacy_storemast_list->StopRec = $pharmacy_storemast_list->StartRec + $pharmacy_storemast_list->KeyCount - 1;
	}
}
$pharmacy_storemast_list->RecCnt = $pharmacy_storemast_list->StartRec - 1;
if ($pharmacy_storemast_list->Recordset && !$pharmacy_storemast_list->Recordset->EOF) {
	$pharmacy_storemast_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_storemast_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_storemast_list->StartRec > 1)
		$pharmacy_storemast_list->Recordset->move($pharmacy_storemast_list->StartRec - 1);
} elseif (!$pharmacy_storemast->AllowAddDeleteRow && $pharmacy_storemast_list->StopRec == 0) {
	$pharmacy_storemast_list->StopRec = $pharmacy_storemast->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_storemast->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_storemast->resetAttributes();
$pharmacy_storemast_list->renderRow();
if ($pharmacy_storemast->isGridEdit())
	$pharmacy_storemast_list->RowIndex = 0;
while ($pharmacy_storemast_list->RecCnt < $pharmacy_storemast_list->StopRec) {
	$pharmacy_storemast_list->RecCnt++;
	if ($pharmacy_storemast_list->RecCnt >= $pharmacy_storemast_list->StartRec) {
		$pharmacy_storemast_list->RowCnt++;
		if ($pharmacy_storemast->isGridAdd() || $pharmacy_storemast->isGridEdit() || $pharmacy_storemast->isConfirm()) {
			$pharmacy_storemast_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_storemast_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_storemast_list->FormActionName) && $pharmacy_storemast_list->EventCancelled)
				$pharmacy_storemast_list->RowAction = strval($CurrentForm->getValue($pharmacy_storemast_list->FormActionName));
			elseif ($pharmacy_storemast->isGridAdd())
				$pharmacy_storemast_list->RowAction = "insert";
			else
				$pharmacy_storemast_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_storemast_list->KeyCount = $pharmacy_storemast_list->RowIndex;

		// Init row class and style
		$pharmacy_storemast->resetAttributes();
		$pharmacy_storemast->CssClass = "";
		if ($pharmacy_storemast->isGridAdd()) {
			$pharmacy_storemast_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_storemast_list->loadRowValues($pharmacy_storemast_list->Recordset); // Load row values
		}
		$pharmacy_storemast->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_storemast->isGridEdit()) { // Grid edit
			if ($pharmacy_storemast->EventCancelled)
				$pharmacy_storemast_list->restoreCurrentRowFormValues($pharmacy_storemast_list->RowIndex); // Restore form values
			if ($pharmacy_storemast_list->RowAction == "insert")
				$pharmacy_storemast->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_storemast->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_storemast->isGridEdit() && ($pharmacy_storemast->RowType == ROWTYPE_EDIT || $pharmacy_storemast->RowType == ROWTYPE_ADD) && $pharmacy_storemast->EventCancelled) // Update failed
			$pharmacy_storemast_list->restoreCurrentRowFormValues($pharmacy_storemast_list->RowIndex); // Restore form values
		if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_storemast_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$pharmacy_storemast->RowAttrs = array_merge($pharmacy_storemast->RowAttrs, array('data-rowindex'=>$pharmacy_storemast_list->RowCnt, 'id'=>'r' . $pharmacy_storemast_list->RowCnt . '_pharmacy_storemast', 'data-rowtype'=>$pharmacy_storemast->RowType));

		// Render row
		$pharmacy_storemast_list->renderRow();

		// Render list options
		$pharmacy_storemast_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_storemast_list->RowAction <> "delete" && $pharmacy_storemast_list->RowAction <> "insertdelete" && !($pharmacy_storemast_list->RowAction == "insert" && $pharmacy_storemast->isConfirm() && $pharmacy_storemast_list->emptyRow())) {
?>
	<tr<?php echo $pharmacy_storemast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_storemast_list->ListOptions->render("body", "left", $pharmacy_storemast_list->RowCnt);
?>
	<?php if ($pharmacy_storemast->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $pharmacy_storemast->BRCODE->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRCODE" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_storemast->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE">
<span<?php echo $pharmacy_storemast->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $pharmacy_storemast->PRC->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PRC" class="form-group pharmacy_storemast_PRC">
<input type="text" data-table="pharmacy_storemast" data-field="x_PRC" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PRC->EditValue ?>"<?php echo $pharmacy_storemast->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PRC" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_storemast->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PRC" class="form-group pharmacy_storemast_PRC">
<input type="text" data-table="pharmacy_storemast" data-field="x_PRC" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PRC->EditValue ?>"<?php echo $pharmacy_storemast->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC">
<span<?php echo $pharmacy_storemast->PRC->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->TYPE->Visible) { // TYPE ?>
		<td data-name="TYPE"<?php echo $pharmacy_storemast->TYPE->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_TYPE" class="form-group pharmacy_storemast_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_TYPE" data-value-separator="<?php echo $pharmacy_storemast->TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE"<?php echo $pharmacy_storemast->TYPE->editAttributes() ?>>
		<?php echo $pharmacy_storemast->TYPE->selectOptionListHtml("x<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_TYPE" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE" value="<?php echo HtmlEncode($pharmacy_storemast->TYPE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_TYPE" class="form-group pharmacy_storemast_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_TYPE" data-value-separator="<?php echo $pharmacy_storemast->TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE"<?php echo $pharmacy_storemast->TYPE->editAttributes() ?>>
		<?php echo $pharmacy_storemast->TYPE->selectOptionListHtml("x<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE">
<span<?php echo $pharmacy_storemast->TYPE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->TYPE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->DES->Visible) { // DES ?>
		<td data-name="DES"<?php echo $pharmacy_storemast->DES->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_DES" class="form-group pharmacy_storemast_DES">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DES" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->DES->EditValue ?>"<?php echo $pharmacy_storemast->DES->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DES" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_DES" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_DES" value="<?php echo HtmlEncode($pharmacy_storemast->DES->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_DES" class="form-group pharmacy_storemast_DES">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DES" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->DES->EditValue ?>"<?php echo $pharmacy_storemast->DES->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_DES" class="pharmacy_storemast_DES">
<span<?php echo $pharmacy_storemast->DES->viewAttributes() ?>>
<?php echo $pharmacy_storemast->DES->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->UM->Visible) { // UM ?>
		<td data-name="UM"<?php echo $pharmacy_storemast->UM->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_UM" class="form-group pharmacy_storemast_UM">
<input type="text" data-table="pharmacy_storemast" data-field="x_UM" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UM" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->UM->EditValue ?>"<?php echo $pharmacy_storemast->UM->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_UM" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_UM" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_UM" value="<?php echo HtmlEncode($pharmacy_storemast->UM->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_UM" class="form-group pharmacy_storemast_UM">
<input type="text" data-table="pharmacy_storemast" data-field="x_UM" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UM" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->UM->EditValue ?>"<?php echo $pharmacy_storemast->UM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_UM" class="pharmacy_storemast_UM">
<span<?php echo $pharmacy_storemast->UM->viewAttributes() ?>>
<?php echo $pharmacy_storemast->UM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $pharmacy_storemast->RT->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_RT" class="form-group pharmacy_storemast_RT">
<input type="text" data-table="pharmacy_storemast" data-field="x_RT" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RT->EditValue ?>"<?php echo $pharmacy_storemast->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_RT" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_RT" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_storemast->RT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_RT" class="form-group pharmacy_storemast_RT">
<input type="text" data-table="pharmacy_storemast" data-field="x_RT" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RT->EditValue ?>"<?php echo $pharmacy_storemast->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_RT" class="pharmacy_storemast_RT">
<span<?php echo $pharmacy_storemast->RT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $pharmacy_storemast->BATCHNO->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_BATCHNO" class="form-group pharmacy_storemast_BATCHNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($pharmacy_storemast->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->BATCHNO->EditValue ?>"<?php echo $pharmacy_storemast->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_storemast->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_BATCHNO" class="form-group pharmacy_storemast_BATCHNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($pharmacy_storemast->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->BATCHNO->EditValue ?>"<?php echo $pharmacy_storemast->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO">
<span<?php echo $pharmacy_storemast->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_storemast->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $pharmacy_storemast->MRP->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_MRP" class="form-group pharmacy_storemast_MRP">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRP" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MRP" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->MRP->EditValue ?>"<?php echo $pharmacy_storemast->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MRP" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_MRP" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_MRP" value="<?php echo HtmlEncode($pharmacy_storemast->MRP->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_MRP" class="form-group pharmacy_storemast_MRP">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRP" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MRP" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->MRP->EditValue ?>"<?php echo $pharmacy_storemast->MRP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP">
<span<?php echo $pharmacy_storemast->MRP->viewAttributes() ?>>
<?php echo $pharmacy_storemast->MRP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $pharmacy_storemast->EXPDT->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_EXPDT" class="form-group pharmacy_storemast_EXPDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->EXPDT->EditValue ?>"<?php echo $pharmacy_storemast->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->EXPDT->ReadOnly && !$pharmacy_storemast->EXPDT->Disabled && !isset($pharmacy_storemast->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastlist", "x<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_EXPDT" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_storemast->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_EXPDT" class="form-group pharmacy_storemast_EXPDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->EXPDT->EditValue ?>"<?php echo $pharmacy_storemast->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->EXPDT->ReadOnly && !$pharmacy_storemast->EXPDT->Disabled && !isset($pharmacy_storemast->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastlist", "x<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT">
<span<?php echo $pharmacy_storemast->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $pharmacy_storemast->GENNAME->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_GENNAME" class="form-group pharmacy_storemast_GENNAME">
<?php
$wrkonchange = "" . trim(@$pharmacy_storemast->GENNAME->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_storemast->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_storemast_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" id="sv_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENNAME->ReadOnly || $pharmacy_storemast->GENNAME->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENNAME->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_storemastlist.createAutoSuggest({"id":"x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME","forceSelect":false});
</script>
<?php echo $pharmacy_storemast->GENNAME->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_GENNAME") ?>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_GENNAME" class="form-group pharmacy_storemast_GENNAME">
<?php
$wrkonchange = "" . trim(@$pharmacy_storemast->GENNAME->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_storemast->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_storemast_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" id="sv_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENNAME->ReadOnly || $pharmacy_storemast->GENNAME->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENNAME->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_storemastlist.createAutoSuggest({"id":"x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME","forceSelect":false});
</script>
<?php echo $pharmacy_storemast->GENNAME->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_GENNAME") ?>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME">
<span<?php echo $pharmacy_storemast->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->GENNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
		<td data-name="CREATEDDT"<?php echo $pharmacy_storemast->CREATEDDT->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_CREATEDDT" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_CREATEDDT" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_CREATEDDT" value="<?php echo HtmlEncode($pharmacy_storemast->CREATEDDT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT">
<span<?php echo $pharmacy_storemast->CREATEDDT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->CREATEDDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->DRID->Visible) { // DRID ?>
		<td data-name="DRID"<?php echo $pharmacy_storemast->DRID->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_DRID" class="form-group pharmacy_storemast_DRID">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID"><?php echo strval($pharmacy_storemast->DRID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->DRID->ViewValue) : $pharmacy_storemast->DRID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->DRID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->DRID->ReadOnly || $pharmacy_storemast->DRID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->DRID->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_DRID") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->DRID->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID" value="<?php echo $pharmacy_storemast->DRID->CurrentValue ?>"<?php echo $pharmacy_storemast->DRID->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID" value="<?php echo HtmlEncode($pharmacy_storemast->DRID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_DRID" class="form-group pharmacy_storemast_DRID">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID"><?php echo strval($pharmacy_storemast->DRID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->DRID->ViewValue) : $pharmacy_storemast->DRID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->DRID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->DRID->ReadOnly || $pharmacy_storemast->DRID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->DRID->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_DRID") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->DRID->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID" value="<?php echo $pharmacy_storemast->DRID->CurrentValue ?>"<?php echo $pharmacy_storemast->DRID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID">
<span<?php echo $pharmacy_storemast->DRID->viewAttributes() ?>>
<?php echo $pharmacy_storemast->DRID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $pharmacy_storemast->MFRCODE->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_MFRCODE" class="form-group pharmacy_storemast_MFRCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE"><?php echo strval($pharmacy_storemast->MFRCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->MFRCODE->ViewValue) : $pharmacy_storemast->MFRCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->MFRCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->MFRCODE->ReadOnly || $pharmacy_storemast->MFRCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->MFRCODE->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_MFRCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->MFRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE" value="<?php echo $pharmacy_storemast->MFRCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($pharmacy_storemast->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_MFRCODE" class="form-group pharmacy_storemast_MFRCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE"><?php echo strval($pharmacy_storemast->MFRCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->MFRCODE->ViewValue) : $pharmacy_storemast->MFRCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->MFRCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->MFRCODE->ReadOnly || $pharmacy_storemast->MFRCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->MFRCODE->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_MFRCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->MFRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE" value="<?php echo $pharmacy_storemast->MFRCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->MFRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE">
<span<?php echo $pharmacy_storemast->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->MFRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->COMBCODE->Visible) { // COMBCODE ?>
		<td data-name="COMBCODE"<?php echo $pharmacy_storemast->COMBCODE->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_COMBCODE" class="form-group pharmacy_storemast_COMBCODE">
<?php $pharmacy_storemast->COMBCODE->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_storemast->COMBCODE->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE"><?php echo strval($pharmacy_storemast->COMBCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBCODE->ViewValue) : $pharmacy_storemast->COMBCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBCODE->ReadOnly || $pharmacy_storemast->COMBCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBCODE->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE" value="<?php echo $pharmacy_storemast->COMBCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->COMBCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE" value="<?php echo HtmlEncode($pharmacy_storemast->COMBCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_COMBCODE" class="form-group pharmacy_storemast_COMBCODE">
<?php $pharmacy_storemast->COMBCODE->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_storemast->COMBCODE->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE"><?php echo strval($pharmacy_storemast->COMBCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBCODE->ViewValue) : $pharmacy_storemast->COMBCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBCODE->ReadOnly || $pharmacy_storemast->COMBCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBCODE->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE" value="<?php echo $pharmacy_storemast->COMBCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->COMBCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE">
<span<?php echo $pharmacy_storemast->COMBCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->COMBCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->GENCODE->Visible) { // GENCODE ?>
		<td data-name="GENCODE"<?php echo $pharmacy_storemast->GENCODE->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_GENCODE" class="form-group pharmacy_storemast_GENCODE">
<?php $pharmacy_storemast->GENCODE->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_storemast->GENCODE->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE"><?php echo strval($pharmacy_storemast->GENCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENCODE->ViewValue) : $pharmacy_storemast->GENCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENCODE->ReadOnly || $pharmacy_storemast->GENCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENCODE->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_GENCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE" value="<?php echo $pharmacy_storemast->GENCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->GENCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE" value="<?php echo HtmlEncode($pharmacy_storemast->GENCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_GENCODE" class="form-group pharmacy_storemast_GENCODE">
<?php $pharmacy_storemast->GENCODE->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_storemast->GENCODE->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE"><?php echo strval($pharmacy_storemast->GENCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENCODE->ViewValue) : $pharmacy_storemast->GENCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENCODE->ReadOnly || $pharmacy_storemast->GENCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENCODE->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_GENCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE" value="<?php echo $pharmacy_storemast->GENCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->GENCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE">
<span<?php echo $pharmacy_storemast->GENCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->GENCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH"<?php echo $pharmacy_storemast->STRENGTH->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_STRENGTH" class="form-group pharmacy_storemast_STRENGTH">
<input type="text" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_STRENGTH" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STRENGTH->EditValue ?>"<?php echo $pharmacy_storemast->STRENGTH->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_STRENGTH" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_STRENGTH" value="<?php echo HtmlEncode($pharmacy_storemast->STRENGTH->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_STRENGTH" class="form-group pharmacy_storemast_STRENGTH">
<input type="text" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_STRENGTH" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STRENGTH->EditValue ?>"<?php echo $pharmacy_storemast->STRENGTH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH">
<span<?php echo $pharmacy_storemast->STRENGTH->viewAttributes() ?>>
<?php echo $pharmacy_storemast->STRENGTH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT"<?php echo $pharmacy_storemast->UNIT->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_UNIT" class="form-group pharmacy_storemast_UNIT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_UNIT" data-value-separator="<?php echo $pharmacy_storemast->UNIT->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT"<?php echo $pharmacy_storemast->UNIT->editAttributes() ?>>
		<?php echo $pharmacy_storemast->UNIT->selectOptionListHtml("x<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_UNIT" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT" value="<?php echo HtmlEncode($pharmacy_storemast->UNIT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_UNIT" class="form-group pharmacy_storemast_UNIT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_UNIT" data-value-separator="<?php echo $pharmacy_storemast->UNIT->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT"<?php echo $pharmacy_storemast->UNIT->editAttributes() ?>>
		<?php echo $pharmacy_storemast->UNIT->selectOptionListHtml("x<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT">
<span<?php echo $pharmacy_storemast->UNIT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->UNIT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->FORMULARY->Visible) { // FORMULARY ?>
		<td data-name="FORMULARY"<?php echo $pharmacy_storemast->FORMULARY->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_FORMULARY" class="form-group pharmacy_storemast_FORMULARY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-value-separator="<?php echo $pharmacy_storemast->FORMULARY->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY"<?php echo $pharmacy_storemast->FORMULARY->editAttributes() ?>>
		<?php echo $pharmacy_storemast->FORMULARY->selectOptionListHtml("x<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_FORMULARY" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY" value="<?php echo HtmlEncode($pharmacy_storemast->FORMULARY->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_FORMULARY" class="form-group pharmacy_storemast_FORMULARY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-value-separator="<?php echo $pharmacy_storemast->FORMULARY->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY"<?php echo $pharmacy_storemast->FORMULARY->editAttributes() ?>>
		<?php echo $pharmacy_storemast->FORMULARY->selectOptionListHtml("x<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY">
<span<?php echo $pharmacy_storemast->FORMULARY->viewAttributes() ?>>
<?php echo $pharmacy_storemast->FORMULARY->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->COMBNAME->Visible) { // COMBNAME ?>
		<td data-name="COMBNAME"<?php echo $pharmacy_storemast->COMBNAME->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_COMBNAME" class="form-group pharmacy_storemast_COMBNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME"><?php echo strval($pharmacy_storemast->COMBNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBNAME->ViewValue) : $pharmacy_storemast->COMBNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBNAME->ReadOnly || $pharmacy_storemast->COMBNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBNAME->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBNAME->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME" value="<?php echo $pharmacy_storemast->COMBNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->COMBNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME" value="<?php echo HtmlEncode($pharmacy_storemast->COMBNAME->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_COMBNAME" class="form-group pharmacy_storemast_COMBNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME"><?php echo strval($pharmacy_storemast->COMBNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBNAME->ViewValue) : $pharmacy_storemast->COMBNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBNAME->ReadOnly || $pharmacy_storemast->COMBNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBNAME->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBNAME->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME" value="<?php echo $pharmacy_storemast->COMBNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->COMBNAME->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME">
<span<?php echo $pharmacy_storemast->COMBNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->COMBNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
		<td data-name="GENERICNAME"<?php echo $pharmacy_storemast->GENERICNAME->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_GENERICNAME" class="form-group pharmacy_storemast_GENERICNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME"><?php echo strval($pharmacy_storemast->GENERICNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENERICNAME->ViewValue) : $pharmacy_storemast->GENERICNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENERICNAME->ReadOnly || $pharmacy_storemast->GENERICNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENERICNAME->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME" value="<?php echo $pharmacy_storemast->GENERICNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->GENERICNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENERICNAME->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_GENERICNAME" class="form-group pharmacy_storemast_GENERICNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME"><?php echo strval($pharmacy_storemast->GENERICNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENERICNAME->ViewValue) : $pharmacy_storemast->GENERICNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENERICNAME->ReadOnly || $pharmacy_storemast->GENERICNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENERICNAME->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME" value="<?php echo $pharmacy_storemast->GENERICNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->GENERICNAME->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME">
<span<?php echo $pharmacy_storemast->GENERICNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->GENERICNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->REMARK->Visible) { // REMARK ?>
		<td data-name="REMARK"<?php echo $pharmacy_storemast->REMARK->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_REMARK" class="form-group pharmacy_storemast_REMARK">
<input type="text" data-table="pharmacy_storemast" data-field="x_REMARK" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_REMARK" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast->REMARK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->REMARK->EditValue ?>"<?php echo $pharmacy_storemast->REMARK->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_REMARK" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_REMARK" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_REMARK" value="<?php echo HtmlEncode($pharmacy_storemast->REMARK->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_REMARK" class="form-group pharmacy_storemast_REMARK">
<input type="text" data-table="pharmacy_storemast" data-field="x_REMARK" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_REMARK" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast->REMARK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->REMARK->EditValue ?>"<?php echo $pharmacy_storemast->REMARK->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK">
<span<?php echo $pharmacy_storemast->REMARK->viewAttributes() ?>>
<?php echo $pharmacy_storemast->REMARK->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->TEMP->Visible) { // TEMP ?>
		<td data-name="TEMP"<?php echo $pharmacy_storemast->TEMP->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_TEMP" class="form-group pharmacy_storemast_TEMP">
<input type="text" data-table="pharmacy_storemast" data-field="x_TEMP" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TEMP" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TEMP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TEMP->EditValue ?>"<?php echo $pharmacy_storemast->TEMP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_TEMP" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_TEMP" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_TEMP" value="<?php echo HtmlEncode($pharmacy_storemast->TEMP->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_TEMP" class="form-group pharmacy_storemast_TEMP">
<input type="text" data-table="pharmacy_storemast" data-field="x_TEMP" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TEMP" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TEMP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TEMP->EditValue ?>"<?php echo $pharmacy_storemast->TEMP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP">
<span<?php echo $pharmacy_storemast->TEMP->viewAttributes() ?>>
<?php echo $pharmacy_storemast->TEMP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_storemast->id->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_id" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_id" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_storemast->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_id" class="form-group pharmacy_storemast_id">
<span<?php echo $pharmacy_storemast->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_storemast->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_id" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_id" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_storemast->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_id" class="pharmacy_storemast_id">
<span<?php echo $pharmacy_storemast->id->viewAttributes() ?>>
<?php echo $pharmacy_storemast->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $pharmacy_storemast->PurValue->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PurValue" class="form-group pharmacy_storemast_PurValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_PurValue" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PurValue->EditValue ?>"<?php echo $pharmacy_storemast->PurValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PurValue" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PurValue" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_storemast->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PurValue" class="form-group pharmacy_storemast_PurValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_PurValue" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PurValue->EditValue ?>"<?php echo $pharmacy_storemast->PurValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue">
<span<?php echo $pharmacy_storemast->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PurValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $pharmacy_storemast->PSGST->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PSGST" class="form-group pharmacy_storemast_PSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PSGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PSGST->EditValue ?>"<?php echo $pharmacy_storemast->PSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PSGST" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PSGST" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_storemast->PSGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PSGST" class="form-group pharmacy_storemast_PSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PSGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PSGST->EditValue ?>"<?php echo $pharmacy_storemast->PSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST">
<span<?php echo $pharmacy_storemast->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $pharmacy_storemast->PCGST->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PCGST" class="form-group pharmacy_storemast_PCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PCGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PCGST->EditValue ?>"<?php echo $pharmacy_storemast->PCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PCGST" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PCGST" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_storemast->PCGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PCGST" class="form-group pharmacy_storemast_PCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PCGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PCGST->EditValue ?>"<?php echo $pharmacy_storemast->PCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST">
<span<?php echo $pharmacy_storemast->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->SaleValue->Visible) { // SaleValue ?>
		<td data-name="SaleValue"<?php echo $pharmacy_storemast->SaleValue->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SaleValue" class="form-group pharmacy_storemast_SaleValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleValue" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleValue->EditValue ?>"<?php echo $pharmacy_storemast->SaleValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SaleValue" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleValue" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleValue" value="<?php echo HtmlEncode($pharmacy_storemast->SaleValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SaleValue" class="form-group pharmacy_storemast_SaleValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleValue" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleValue->EditValue ?>"<?php echo $pharmacy_storemast->SaleValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue">
<span<?php echo $pharmacy_storemast->SaleValue->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SaleValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $pharmacy_storemast->SSGST->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SSGST" class="form-group pharmacy_storemast_SSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SSGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SSGST->EditValue ?>"<?php echo $pharmacy_storemast->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SSGST" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_storemast->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SSGST" class="form-group pharmacy_storemast_SSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SSGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SSGST->EditValue ?>"<?php echo $pharmacy_storemast->SSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST">
<span<?php echo $pharmacy_storemast->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $pharmacy_storemast->SCGST->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SCGST" class="form-group pharmacy_storemast_SCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SCGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SCGST->EditValue ?>"<?php echo $pharmacy_storemast->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SCGST" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_storemast->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SCGST" class="form-group pharmacy_storemast_SCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SCGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SCGST->EditValue ?>"<?php echo $pharmacy_storemast->SCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST">
<span<?php echo $pharmacy_storemast->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->SaleRate->Visible) { // SaleRate ?>
		<td data-name="SaleRate"<?php echo $pharmacy_storemast->SaleRate->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SaleRate" class="form-group pharmacy_storemast_SaleRate">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleRate" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleRate->EditValue ?>"<?php echo $pharmacy_storemast->SaleRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SaleRate" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleRate" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleRate" value="<?php echo HtmlEncode($pharmacy_storemast->SaleRate->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SaleRate" class="form-group pharmacy_storemast_SaleRate">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleRate" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleRate->EditValue ?>"<?php echo $pharmacy_storemast->SaleRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate">
<span<?php echo $pharmacy_storemast->SaleRate->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SaleRate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $pharmacy_storemast->HospID->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_HospID" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_storemast->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID">
<span<?php echo $pharmacy_storemast->HospID->viewAttributes() ?>>
<?php echo $pharmacy_storemast->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME"<?php echo $pharmacy_storemast->BRNAME->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRNAME" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_storemast->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME">
<span<?php echo $pharmacy_storemast->BRNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->BRNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->Scheduling->Visible) { // Scheduling ?>
		<td data-name="Scheduling"<?php echo $pharmacy_storemast->Scheduling->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_Scheduling" class="form-group pharmacy_storemast_Scheduling">
<div id="tp_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Scheduling" data-value-separator="<?php echo $pharmacy_storemast->Scheduling->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" value="{value}"<?php echo $pharmacy_storemast->Scheduling->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Scheduling->radioButtonListHtml(FALSE, "x{$pharmacy_storemast_list->RowIndex}_Scheduling") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_Scheduling" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" value="<?php echo HtmlEncode($pharmacy_storemast->Scheduling->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_Scheduling" class="form-group pharmacy_storemast_Scheduling">
<div id="tp_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Scheduling" data-value-separator="<?php echo $pharmacy_storemast->Scheduling->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" value="{value}"<?php echo $pharmacy_storemast->Scheduling->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Scheduling->radioButtonListHtml(FALSE, "x{$pharmacy_storemast_list->RowIndex}_Scheduling") ?>
</div></div>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_Scheduling" class="pharmacy_storemast_Scheduling">
<span<?php echo $pharmacy_storemast->Scheduling->viewAttributes() ?>>
<?php echo $pharmacy_storemast->Scheduling->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->Schedulingh1->Visible) { // Schedulingh1 ?>
		<td data-name="Schedulingh1"<?php echo $pharmacy_storemast->Schedulingh1->cellAttributes() ?>>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_Schedulingh1" class="form-group pharmacy_storemast_Schedulingh1">
<div id="tp_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Schedulingh1" data-value-separator="<?php echo $pharmacy_storemast->Schedulingh1->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" value="{value}"<?php echo $pharmacy_storemast->Schedulingh1->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Schedulingh1->radioButtonListHtml(FALSE, "x{$pharmacy_storemast_list->RowIndex}_Schedulingh1") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_Schedulingh1" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" value="<?php echo HtmlEncode($pharmacy_storemast->Schedulingh1->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_Schedulingh1" class="form-group pharmacy_storemast_Schedulingh1">
<div id="tp_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Schedulingh1" data-value-separator="<?php echo $pharmacy_storemast->Schedulingh1->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" value="{value}"<?php echo $pharmacy_storemast->Schedulingh1->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Schedulingh1->radioButtonListHtml(FALSE, "x{$pharmacy_storemast_list->RowIndex}_Schedulingh1") ?>
</div></div>
</span>
<?php } ?>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_storemast_list->RowCnt ?>_pharmacy_storemast_Schedulingh1" class="pharmacy_storemast_Schedulingh1">
<span<?php echo $pharmacy_storemast->Schedulingh1->viewAttributes() ?>>
<?php echo $pharmacy_storemast->Schedulingh1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_storemast_list->ListOptions->render("body", "right", $pharmacy_storemast_list->RowCnt);
?>
	</tr>
<?php if ($pharmacy_storemast->RowType == ROWTYPE_ADD || $pharmacy_storemast->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_storemastlist.updateLists(<?php echo $pharmacy_storemast_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_storemast->isGridAdd())
		if (!$pharmacy_storemast_list->Recordset->EOF)
			$pharmacy_storemast_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_storemast->isGridAdd() || $pharmacy_storemast->isGridEdit()) {
		$pharmacy_storemast_list->RowIndex = '$rowindex$';
		$pharmacy_storemast_list->loadRowValues();

		// Set row properties
		$pharmacy_storemast->resetAttributes();
		$pharmacy_storemast->RowAttrs = array_merge($pharmacy_storemast->RowAttrs, array('data-rowindex'=>$pharmacy_storemast_list->RowIndex, 'id'=>'r0_pharmacy_storemast', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_storemast->RowAttrs["class"], "ew-template");
		$pharmacy_storemast->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_storemast_list->renderRow();

		// Render list options
		$pharmacy_storemast_list->renderListOptions();
		$pharmacy_storemast_list->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_storemast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_storemast_list->ListOptions->render("body", "left", $pharmacy_storemast_list->RowIndex);
?>
	<?php if ($pharmacy_storemast->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRCODE" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_storemast->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_pharmacy_storemast_PRC" class="form-group pharmacy_storemast_PRC">
<input type="text" data-table="pharmacy_storemast" data-field="x_PRC" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PRC->EditValue ?>"<?php echo $pharmacy_storemast->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PRC" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_storemast->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->TYPE->Visible) { // TYPE ?>
		<td data-name="TYPE">
<span id="el$rowindex$_pharmacy_storemast_TYPE" class="form-group pharmacy_storemast_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_TYPE" data-value-separator="<?php echo $pharmacy_storemast->TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE"<?php echo $pharmacy_storemast->TYPE->editAttributes() ?>>
		<?php echo $pharmacy_storemast->TYPE->selectOptionListHtml("x<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_TYPE" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_TYPE" value="<?php echo HtmlEncode($pharmacy_storemast->TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->DES->Visible) { // DES ?>
		<td data-name="DES">
<span id="el$rowindex$_pharmacy_storemast_DES" class="form-group pharmacy_storemast_DES">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DES" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->DES->EditValue ?>"<?php echo $pharmacy_storemast->DES->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DES" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_DES" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_DES" value="<?php echo HtmlEncode($pharmacy_storemast->DES->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->UM->Visible) { // UM ?>
		<td data-name="UM">
<span id="el$rowindex$_pharmacy_storemast_UM" class="form-group pharmacy_storemast_UM">
<input type="text" data-table="pharmacy_storemast" data-field="x_UM" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UM" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->UM->EditValue ?>"<?php echo $pharmacy_storemast->UM->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_UM" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_UM" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_UM" value="<?php echo HtmlEncode($pharmacy_storemast->UM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->RT->Visible) { // RT ?>
		<td data-name="RT">
<span id="el$rowindex$_pharmacy_storemast_RT" class="form-group pharmacy_storemast_RT">
<input type="text" data-table="pharmacy_storemast" data-field="x_RT" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RT->EditValue ?>"<?php echo $pharmacy_storemast->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_RT" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_RT" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_storemast->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<span id="el$rowindex$_pharmacy_storemast_BATCHNO" class="form-group pharmacy_storemast_BATCHNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($pharmacy_storemast->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->BATCHNO->EditValue ?>"<?php echo $pharmacy_storemast->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_storemast->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->MRP->Visible) { // MRP ?>
		<td data-name="MRP">
<span id="el$rowindex$_pharmacy_storemast_MRP" class="form-group pharmacy_storemast_MRP">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRP" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MRP" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->MRP->EditValue ?>"<?php echo $pharmacy_storemast->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MRP" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_MRP" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_MRP" value="<?php echo HtmlEncode($pharmacy_storemast->MRP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<span id="el$rowindex$_pharmacy_storemast_EXPDT" class="form-group pharmacy_storemast_EXPDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->EXPDT->EditValue ?>"<?php echo $pharmacy_storemast->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->EXPDT->ReadOnly && !$pharmacy_storemast->EXPDT->Disabled && !isset($pharmacy_storemast->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastlist", "x<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_EXPDT" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_storemast->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME">
<span id="el$rowindex$_pharmacy_storemast_GENNAME" class="form-group pharmacy_storemast_GENNAME">
<?php
$wrkonchange = "" . trim(@$pharmacy_storemast->GENNAME->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_storemast->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_storemast_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" id="sv_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENNAME->ReadOnly || $pharmacy_storemast->GENNAME->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENNAME->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_storemastlist.createAutoSuggest({"id":"x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME","forceSelect":false});
</script>
<?php echo $pharmacy_storemast->GENNAME->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_GENNAME") ?>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
		<td data-name="CREATEDDT">
<input type="hidden" data-table="pharmacy_storemast" data-field="x_CREATEDDT" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_CREATEDDT" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_CREATEDDT" value="<?php echo HtmlEncode($pharmacy_storemast->CREATEDDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->DRID->Visible) { // DRID ?>
		<td data-name="DRID">
<span id="el$rowindex$_pharmacy_storemast_DRID" class="form-group pharmacy_storemast_DRID">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID"><?php echo strval($pharmacy_storemast->DRID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->DRID->ViewValue) : $pharmacy_storemast->DRID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->DRID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->DRID->ReadOnly || $pharmacy_storemast->DRID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->DRID->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_DRID") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->DRID->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID" value="<?php echo $pharmacy_storemast->DRID->CurrentValue ?>"<?php echo $pharmacy_storemast->DRID->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_DRID" value="<?php echo HtmlEncode($pharmacy_storemast->DRID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<span id="el$rowindex$_pharmacy_storemast_MFRCODE" class="form-group pharmacy_storemast_MFRCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE"><?php echo strval($pharmacy_storemast->MFRCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->MFRCODE->ViewValue) : $pharmacy_storemast->MFRCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->MFRCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->MFRCODE->ReadOnly || $pharmacy_storemast->MFRCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->MFRCODE->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_MFRCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->MFRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE" value="<?php echo $pharmacy_storemast->MFRCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($pharmacy_storemast->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->COMBCODE->Visible) { // COMBCODE ?>
		<td data-name="COMBCODE">
<span id="el$rowindex$_pharmacy_storemast_COMBCODE" class="form-group pharmacy_storemast_COMBCODE">
<?php $pharmacy_storemast->COMBCODE->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_storemast->COMBCODE->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE"><?php echo strval($pharmacy_storemast->COMBCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBCODE->ViewValue) : $pharmacy_storemast->COMBCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBCODE->ReadOnly || $pharmacy_storemast->COMBCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBCODE->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE" value="<?php echo $pharmacy_storemast->COMBCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->COMBCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBCODE" value="<?php echo HtmlEncode($pharmacy_storemast->COMBCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->GENCODE->Visible) { // GENCODE ?>
		<td data-name="GENCODE">
<span id="el$rowindex$_pharmacy_storemast_GENCODE" class="form-group pharmacy_storemast_GENCODE">
<?php $pharmacy_storemast->GENCODE->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_storemast->GENCODE->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE"><?php echo strval($pharmacy_storemast->GENCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENCODE->ViewValue) : $pharmacy_storemast->GENCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENCODE->ReadOnly || $pharmacy_storemast->GENCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENCODE->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_GENCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE" value="<?php echo $pharmacy_storemast->GENCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->GENCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENCODE" value="<?php echo HtmlEncode($pharmacy_storemast->GENCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH">
<span id="el$rowindex$_pharmacy_storemast_STRENGTH" class="form-group pharmacy_storemast_STRENGTH">
<input type="text" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_STRENGTH" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STRENGTH->EditValue ?>"<?php echo $pharmacy_storemast->STRENGTH->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_STRENGTH" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_STRENGTH" value="<?php echo HtmlEncode($pharmacy_storemast->STRENGTH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT">
<span id="el$rowindex$_pharmacy_storemast_UNIT" class="form-group pharmacy_storemast_UNIT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_UNIT" data-value-separator="<?php echo $pharmacy_storemast->UNIT->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT"<?php echo $pharmacy_storemast->UNIT->editAttributes() ?>>
		<?php echo $pharmacy_storemast->UNIT->selectOptionListHtml("x<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_UNIT" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_UNIT" value="<?php echo HtmlEncode($pharmacy_storemast->UNIT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->FORMULARY->Visible) { // FORMULARY ?>
		<td data-name="FORMULARY">
<span id="el$rowindex$_pharmacy_storemast_FORMULARY" class="form-group pharmacy_storemast_FORMULARY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-value-separator="<?php echo $pharmacy_storemast->FORMULARY->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY"<?php echo $pharmacy_storemast->FORMULARY->editAttributes() ?>>
		<?php echo $pharmacy_storemast->FORMULARY->selectOptionListHtml("x<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_FORMULARY" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_FORMULARY" value="<?php echo HtmlEncode($pharmacy_storemast->FORMULARY->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->COMBNAME->Visible) { // COMBNAME ?>
		<td data-name="COMBNAME">
<span id="el$rowindex$_pharmacy_storemast_COMBNAME" class="form-group pharmacy_storemast_COMBNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME"><?php echo strval($pharmacy_storemast->COMBNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBNAME->ViewValue) : $pharmacy_storemast->COMBNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBNAME->ReadOnly || $pharmacy_storemast->COMBNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBNAME->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBNAME->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME" value="<?php echo $pharmacy_storemast->COMBNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->COMBNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_COMBNAME" value="<?php echo HtmlEncode($pharmacy_storemast->COMBNAME->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
		<td data-name="GENERICNAME">
<span id="el$rowindex$_pharmacy_storemast_GENERICNAME" class="form-group pharmacy_storemast_GENERICNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME"><?php echo strval($pharmacy_storemast->GENERICNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENERICNAME->ViewValue) : $pharmacy_storemast->GENERICNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENERICNAME->ReadOnly || $pharmacy_storemast->GENERICNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENERICNAME->Lookup->getParamTag("p_x" . $pharmacy_storemast_list->RowIndex . "_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME" value="<?php echo $pharmacy_storemast->GENERICNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->GENERICNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_GENERICNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENERICNAME->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->REMARK->Visible) { // REMARK ?>
		<td data-name="REMARK">
<span id="el$rowindex$_pharmacy_storemast_REMARK" class="form-group pharmacy_storemast_REMARK">
<input type="text" data-table="pharmacy_storemast" data-field="x_REMARK" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_REMARK" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast->REMARK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->REMARK->EditValue ?>"<?php echo $pharmacy_storemast->REMARK->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_REMARK" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_REMARK" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_REMARK" value="<?php echo HtmlEncode($pharmacy_storemast->REMARK->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->TEMP->Visible) { // TEMP ?>
		<td data-name="TEMP">
<span id="el$rowindex$_pharmacy_storemast_TEMP" class="form-group pharmacy_storemast_TEMP">
<input type="text" data-table="pharmacy_storemast" data-field="x_TEMP" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TEMP" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TEMP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TEMP->EditValue ?>"<?php echo $pharmacy_storemast->TEMP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_TEMP" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_TEMP" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_TEMP" value="<?php echo HtmlEncode($pharmacy_storemast->TEMP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="pharmacy_storemast" data-field="x_id" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_id" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_storemast->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue">
<span id="el$rowindex$_pharmacy_storemast_PurValue" class="form-group pharmacy_storemast_PurValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_PurValue" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PurValue->EditValue ?>"<?php echo $pharmacy_storemast->PurValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PurValue" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PurValue" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_storemast->PurValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST">
<span id="el$rowindex$_pharmacy_storemast_PSGST" class="form-group pharmacy_storemast_PSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PSGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PSGST->EditValue ?>"<?php echo $pharmacy_storemast->PSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PSGST" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PSGST" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_storemast->PSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST">
<span id="el$rowindex$_pharmacy_storemast_PCGST" class="form-group pharmacy_storemast_PCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PCGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PCGST->EditValue ?>"<?php echo $pharmacy_storemast->PCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PCGST" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PCGST" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_storemast->PCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->SaleValue->Visible) { // SaleValue ?>
		<td data-name="SaleValue">
<span id="el$rowindex$_pharmacy_storemast_SaleValue" class="form-group pharmacy_storemast_SaleValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleValue" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleValue->EditValue ?>"<?php echo $pharmacy_storemast->SaleValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SaleValue" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleValue" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleValue" value="<?php echo HtmlEncode($pharmacy_storemast->SaleValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST">
<span id="el$rowindex$_pharmacy_storemast_SSGST" class="form-group pharmacy_storemast_SSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SSGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SSGST->EditValue ?>"<?php echo $pharmacy_storemast->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SSGST" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_storemast->SSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST">
<span id="el$rowindex$_pharmacy_storemast_SCGST" class="form-group pharmacy_storemast_SCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SCGST" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SCGST->EditValue ?>"<?php echo $pharmacy_storemast->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SCGST" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_storemast->SCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->SaleRate->Visible) { // SaleRate ?>
		<td data-name="SaleRate">
<span id="el$rowindex$_pharmacy_storemast_SaleRate" class="form-group pharmacy_storemast_SaleRate">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleRate" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleRate->EditValue ?>"<?php echo $pharmacy_storemast->SaleRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SaleRate" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleRate" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_SaleRate" value="<?php echo HtmlEncode($pharmacy_storemast->SaleRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="pharmacy_storemast" data-field="x_HospID" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_storemast->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME">
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRNAME" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_storemast->BRNAME->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->Scheduling->Visible) { // Scheduling ?>
		<td data-name="Scheduling">
<span id="el$rowindex$_pharmacy_storemast_Scheduling" class="form-group pharmacy_storemast_Scheduling">
<div id="tp_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Scheduling" data-value-separator="<?php echo $pharmacy_storemast->Scheduling->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" value="{value}"<?php echo $pharmacy_storemast->Scheduling->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Scheduling->radioButtonListHtml(FALSE, "x{$pharmacy_storemast_list->RowIndex}_Scheduling") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_Scheduling" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_Scheduling" value="<?php echo HtmlEncode($pharmacy_storemast->Scheduling->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast->Schedulingh1->Visible) { // Schedulingh1 ?>
		<td data-name="Schedulingh1">
<span id="el$rowindex$_pharmacy_storemast_Schedulingh1" class="form-group pharmacy_storemast_Schedulingh1">
<div id="tp_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Schedulingh1" data-value-separator="<?php echo $pharmacy_storemast->Schedulingh1->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" id="x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" value="{value}"<?php echo $pharmacy_storemast->Schedulingh1->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Schedulingh1->radioButtonListHtml(FALSE, "x{$pharmacy_storemast_list->RowIndex}_Schedulingh1") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_Schedulingh1" name="o<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" id="o<?php echo $pharmacy_storemast_list->RowIndex ?>_Schedulingh1" value="<?php echo HtmlEncode($pharmacy_storemast->Schedulingh1->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_storemast_list->ListOptions->render("body", "right", $pharmacy_storemast_list->RowIndex);
?>
<script>
fpharmacy_storemastlist.updateLists(<?php echo $pharmacy_storemast_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($pharmacy_storemast->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_storemast_list->FormKeyCountName ?>" id="<?php echo $pharmacy_storemast_list->FormKeyCountName ?>" value="<?php echo $pharmacy_storemast_list->KeyCount ?>">
<?php echo $pharmacy_storemast_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_storemast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_storemast_list->Recordset)
	$pharmacy_storemast_list->Recordset->Close();
?>
<?php if (!$pharmacy_storemast->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_storemast->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_storemast_list->Pager)) $pharmacy_storemast_list->Pager = new NumericPager($pharmacy_storemast_list->StartRec, $pharmacy_storemast_list->DisplayRecs, $pharmacy_storemast_list->TotalRecs, $pharmacy_storemast_list->RecRange, $pharmacy_storemast_list->AutoHidePager) ?>
<?php if ($pharmacy_storemast_list->Pager->RecordCount > 0 && $pharmacy_storemast_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_storemast_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_storemast_list->pageUrl() ?>start=<?php echo $pharmacy_storemast_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_storemast_list->pageUrl() ?>start=<?php echo $pharmacy_storemast_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_storemast_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_storemast_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_storemast_list->pageUrl() ?>start=<?php echo $pharmacy_storemast_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_storemast_list->pageUrl() ?>start=<?php echo $pharmacy_storemast_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_storemast_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_storemast_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_storemast_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_storemast_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_storemast_list->TotalRecs > 0 && (!$pharmacy_storemast_list->AutoHidePageSizeSelector || $pharmacy_storemast_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_storemast">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_storemast_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_storemast_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_storemast_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_storemast_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_storemast_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_storemast_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_storemast->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_storemast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_storemast_list->TotalRecs == 0 && !$pharmacy_storemast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_storemast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_storemast_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_storemast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_storemast->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_storemast", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_storemast_list->terminate();
?>