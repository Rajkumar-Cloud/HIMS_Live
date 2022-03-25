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
$pharmacy_storemast_add = new pharmacy_storemast_add();

// Run the page
$pharmacy_storemast_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_storemast_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpharmacy_storemastadd = currentForm = new ew.Form("fpharmacy_storemastadd", "add");

// Validate form
fpharmacy_storemastadd.validate = function() {
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
		<?php if ($pharmacy_storemast_add->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->BRCODE->caption(), $pharmacy_storemast->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PRC->caption(), $pharmacy_storemast->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->TYPE->caption(), $pharmacy_storemast->TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->DES->Required) { ?>
			elm = this.getElements("x" + infix + "_DES");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->DES->caption(), $pharmacy_storemast->DES->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->UM->Required) { ?>
			elm = this.getElements("x" + infix + "_UM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->UM->caption(), $pharmacy_storemast->UM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->RT->caption(), $pharmacy_storemast->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->RT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->BATCHNO->caption(), $pharmacy_storemast->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->MRP->caption(), $pharmacy_storemast->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->MRP->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->EXPDT->caption(), $pharmacy_storemast->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->EXPDT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->LASTPURDT->Required) { ?>
			elm = this.getElements("x" + infix + "_LASTPURDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->LASTPURDT->caption(), $pharmacy_storemast->LASTPURDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LASTPURDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->LASTPURDT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->LASTSUPP->Required) { ?>
			elm = this.getElements("x" + infix + "_LASTSUPP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->LASTSUPP->caption(), $pharmacy_storemast->LASTSUPP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->GENNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->GENNAME->caption(), $pharmacy_storemast->GENNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->LASTISSDT->Required) { ?>
			elm = this.getElements("x" + infix + "_LASTISSDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->LASTISSDT->caption(), $pharmacy_storemast->LASTISSDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LASTISSDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->LASTISSDT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->CREATEDDT->Required) { ?>
			elm = this.getElements("x" + infix + "_CREATEDDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->CREATEDDT->caption(), $pharmacy_storemast->CREATEDDT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->DRID->Required) { ?>
			elm = this.getElements("x" + infix + "_DRID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->DRID->caption(), $pharmacy_storemast->DRID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->MFRCODE->caption(), $pharmacy_storemast->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->COMBCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_COMBCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->COMBCODE->caption(), $pharmacy_storemast->COMBCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->GENCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_GENCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->GENCODE->caption(), $pharmacy_storemast->GENCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->STRENGTH->Required) { ?>
			elm = this.getElements("x" + infix + "_STRENGTH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->STRENGTH->caption(), $pharmacy_storemast->STRENGTH->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_STRENGTH");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->STRENGTH->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->UNIT->Required) { ?>
			elm = this.getElements("x" + infix + "_UNIT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->UNIT->caption(), $pharmacy_storemast->UNIT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->FORMULARY->Required) { ?>
			elm = this.getElements("x" + infix + "_FORMULARY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->FORMULARY->caption(), $pharmacy_storemast->FORMULARY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->RACKNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RACKNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->RACKNO->caption(), $pharmacy_storemast->RACKNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->SUPPNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_SUPPNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SUPPNAME->caption(), $pharmacy_storemast->SUPPNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->COMBNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_COMBNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->COMBNAME->caption(), $pharmacy_storemast->COMBNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->GENERICNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENERICNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->GENERICNAME->caption(), $pharmacy_storemast->GENERICNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->REMARK->Required) { ?>
			elm = this.getElements("x" + infix + "_REMARK");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->REMARK->caption(), $pharmacy_storemast->REMARK->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->TEMP->Required) { ?>
			elm = this.getElements("x" + infix + "_TEMP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->TEMP->caption(), $pharmacy_storemast->TEMP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PurValue->caption(), $pharmacy_storemast->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PurValue->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PSGST->caption(), $pharmacy_storemast->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PSGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PCGST->caption(), $pharmacy_storemast->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PCGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->SaleValue->Required) { ?>
			elm = this.getElements("x" + infix + "_SaleValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SaleValue->caption(), $pharmacy_storemast->SaleValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SaleValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SaleValue->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SSGST->caption(), $pharmacy_storemast->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SSGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SCGST->caption(), $pharmacy_storemast->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SCGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->SaleRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SaleRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SaleRate->caption(), $pharmacy_storemast->SaleRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SaleRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SaleRate->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->HospID->caption(), $pharmacy_storemast->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->BRNAME->caption(), $pharmacy_storemast->BRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->Scheduling->Required) { ?>
			elm = this.getElements("x" + infix + "_Scheduling");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->Scheduling->caption(), $pharmacy_storemast->Scheduling->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_add->Schedulingh1->Required) { ?>
			elm = this.getElements("x" + infix + "_Schedulingh1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->Schedulingh1->caption(), $pharmacy_storemast->Schedulingh1->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpharmacy_storemastadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_storemastadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_storemastadd.lists["x_TYPE"] = <?php echo $pharmacy_storemast_add->TYPE->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_TYPE"].options = <?php echo JsonEncode($pharmacy_storemast_add->TYPE->options(FALSE, TRUE)) ?>;
fpharmacy_storemastadd.lists["x_LASTSUPP"] = <?php echo $pharmacy_storemast_add->LASTSUPP->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_LASTSUPP"].options = <?php echo JsonEncode($pharmacy_storemast_add->LASTSUPP->lookupOptions()) ?>;
fpharmacy_storemastadd.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_add->GENNAME->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_add->GENNAME->lookupOptions()) ?>;
fpharmacy_storemastadd.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_storemastadd.lists["x_DRID"] = <?php echo $pharmacy_storemast_add->DRID->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_DRID"].options = <?php echo JsonEncode($pharmacy_storemast_add->DRID->lookupOptions()) ?>;
fpharmacy_storemastadd.lists["x_MFRCODE"] = <?php echo $pharmacy_storemast_add->MFRCODE->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_MFRCODE"].options = <?php echo JsonEncode($pharmacy_storemast_add->MFRCODE->lookupOptions()) ?>;
fpharmacy_storemastadd.lists["x_COMBCODE"] = <?php echo $pharmacy_storemast_add->COMBCODE->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_storemast_add->COMBCODE->lookupOptions()) ?>;
fpharmacy_storemastadd.lists["x_GENCODE"] = <?php echo $pharmacy_storemast_add->GENCODE->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_storemast_add->GENCODE->lookupOptions()) ?>;
fpharmacy_storemastadd.lists["x_UNIT"] = <?php echo $pharmacy_storemast_add->UNIT->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_UNIT"].options = <?php echo JsonEncode($pharmacy_storemast_add->UNIT->options(FALSE, TRUE)) ?>;
fpharmacy_storemastadd.lists["x_FORMULARY"] = <?php echo $pharmacy_storemast_add->FORMULARY->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_FORMULARY"].options = <?php echo JsonEncode($pharmacy_storemast_add->FORMULARY->options(FALSE, TRUE)) ?>;
fpharmacy_storemastadd.lists["x_SUPPNAME"] = <?php echo $pharmacy_storemast_add->SUPPNAME->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_SUPPNAME"].options = <?php echo JsonEncode($pharmacy_storemast_add->SUPPNAME->lookupOptions()) ?>;
fpharmacy_storemastadd.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_add->COMBNAME->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_add->COMBNAME->lookupOptions()) ?>;
fpharmacy_storemastadd.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_add->GENERICNAME->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_add->GENERICNAME->lookupOptions()) ?>;
fpharmacy_storemastadd.lists["x_Scheduling"] = <?php echo $pharmacy_storemast_add->Scheduling->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_Scheduling"].options = <?php echo JsonEncode($pharmacy_storemast_add->Scheduling->options(FALSE, TRUE)) ?>;
fpharmacy_storemastadd.lists["x_Schedulingh1"] = <?php echo $pharmacy_storemast_add->Schedulingh1->Lookup->toClientList() ?>;
fpharmacy_storemastadd.lists["x_Schedulingh1"].options = <?php echo JsonEncode($pharmacy_storemast_add->Schedulingh1->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_storemast_add->showPageHeader(); ?>
<?php
$pharmacy_storemast_add->showMessage();
?>
<form name="fpharmacy_storemastadd" id="fpharmacy_storemastadd" class="<?php echo $pharmacy_storemast_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_storemast_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_storemast_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_storemast_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_storemast->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_storemast_PRC" for="x_PRC" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->PRC->caption() ?><?php echo ($pharmacy_storemast->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PRC->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PRC">
<input type="text" data-table="pharmacy_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PRC->EditValue ?>"<?php echo $pharmacy_storemast->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label id="elh_pharmacy_storemast_TYPE" for="x_TYPE" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->TYPE->caption() ?><?php echo ($pharmacy_storemast->TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_TYPE" data-value-separator="<?php echo $pharmacy_storemast->TYPE->displayValueSeparatorAttribute() ?>" id="x_TYPE" name="x_TYPE"<?php echo $pharmacy_storemast->TYPE->editAttributes() ?>>
		<?php echo $pharmacy_storemast->TYPE->selectOptionListHtml("x_TYPE") ?>
	</select>
</div>
</span>
<?php echo $pharmacy_storemast->TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->DES->Visible) { // DES ?>
	<div id="r_DES" class="form-group row">
		<label id="elh_pharmacy_storemast_DES" for="x_DES" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->DES->caption() ?><?php echo ($pharmacy_storemast->DES->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->DES->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DES">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->DES->EditValue ?>"<?php echo $pharmacy_storemast->DES->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->DES->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label id="elh_pharmacy_storemast_UM" for="x_UM" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->UM->caption() ?><?php echo ($pharmacy_storemast->UM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->UM->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UM">
<input type="text" data-table="pharmacy_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->UM->EditValue ?>"<?php echo $pharmacy_storemast->UM->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->UM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_pharmacy_storemast_RT" for="x_RT" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->RT->caption() ?><?php echo ($pharmacy_storemast->RT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->RT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RT">
<input type="text" data-table="pharmacy_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RT->EditValue ?>"<?php echo $pharmacy_storemast->RT->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_pharmacy_storemast_BATCHNO" for="x_BATCHNO" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->BATCHNO->caption() ?><?php echo ($pharmacy_storemast->BATCHNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BATCHNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($pharmacy_storemast->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->BATCHNO->EditValue ?>"<?php echo $pharmacy_storemast->BATCHNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_storemast_MRP" for="x_MRP" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->MRP->caption() ?><?php echo ($pharmacy_storemast->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->MRP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MRP">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->MRP->EditValue ?>"<?php echo $pharmacy_storemast->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_pharmacy_storemast_EXPDT" for="x_EXPDT" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->EXPDT->caption() ?><?php echo ($pharmacy_storemast->EXPDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_EXPDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->EXPDT->EditValue ?>"<?php echo $pharmacy_storemast->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->EXPDT->ReadOnly && !$pharmacy_storemast->EXPDT->Disabled && !isset($pharmacy_storemast->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastadd", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_storemast->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LASTPURDT->Visible) { // LASTPURDT ?>
	<div id="r_LASTPURDT" class="form-group row">
		<label id="elh_pharmacy_storemast_LASTPURDT" for="x_LASTPURDT" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->LASTPURDT->caption() ?><?php echo ($pharmacy_storemast->LASTPURDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->LASTPURDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTPURDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->LASTPURDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->LASTPURDT->EditValue ?>"<?php echo $pharmacy_storemast->LASTPURDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->LASTPURDT->ReadOnly && !$pharmacy_storemast->LASTPURDT->Disabled && !isset($pharmacy_storemast->LASTPURDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastadd", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_storemast->LASTPURDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LASTSUPP->Visible) { // LASTSUPP ?>
	<div id="r_LASTSUPP" class="form-group row">
		<label id="elh_pharmacy_storemast_LASTSUPP" for="x_LASTSUPP" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->LASTSUPP->caption() ?><?php echo ($pharmacy_storemast->LASTSUPP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->LASTSUPP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTSUPP">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_LASTSUPP"><?php echo strval($pharmacy_storemast->LASTSUPP->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->LASTSUPP->ViewValue) : $pharmacy_storemast->LASTSUPP->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->LASTSUPP->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->LASTSUPP->ReadOnly || $pharmacy_storemast->LASTSUPP->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_LASTSUPP',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->LASTSUPP->Lookup->getParamTag("p_x_LASTSUPP") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_LASTSUPP" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->LASTSUPP->displayValueSeparatorAttribute() ?>" name="x_LASTSUPP" id="x_LASTSUPP" value="<?php echo $pharmacy_storemast->LASTSUPP->CurrentValue ?>"<?php echo $pharmacy_storemast->LASTSUPP->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->LASTSUPP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_GENNAME" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->GENNAME->caption() ?><?php echo ($pharmacy_storemast->GENNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENNAME">
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
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_storemastadd.createAutoSuggest({"id":"x_GENNAME","forceSelect":false});
</script>
<?php echo $pharmacy_storemast->GENNAME->Lookup->getParamTag("p_x_GENNAME") ?>
</span>
<?php echo $pharmacy_storemast->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LASTISSDT->Visible) { // LASTISSDT ?>
	<div id="r_LASTISSDT" class="form-group row">
		<label id="elh_pharmacy_storemast_LASTISSDT" for="x_LASTISSDT" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->LASTISSDT->caption() ?><?php echo ($pharmacy_storemast->LASTISSDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->LASTISSDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTISSDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->LASTISSDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->LASTISSDT->EditValue ?>"<?php echo $pharmacy_storemast->LASTISSDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->LASTISSDT->ReadOnly && !$pharmacy_storemast->LASTISSDT->Disabled && !isset($pharmacy_storemast->LASTISSDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastadd", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_storemast->LASTISSDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label id="elh_pharmacy_storemast_DRID" for="x_DRID" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->DRID->caption() ?><?php echo ($pharmacy_storemast->DRID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->DRID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DRID">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DRID"><?php echo strval($pharmacy_storemast->DRID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->DRID->ViewValue) : $pharmacy_storemast->DRID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->DRID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->DRID->ReadOnly || $pharmacy_storemast->DRID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DRID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->DRID->Lookup->getParamTag("p_x_DRID") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->DRID->displayValueSeparatorAttribute() ?>" name="x_DRID" id="x_DRID" value="<?php echo $pharmacy_storemast->DRID->CurrentValue ?>"<?php echo $pharmacy_storemast->DRID->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->DRID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_storemast_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->MFRCODE->caption() ?><?php echo ($pharmacy_storemast->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MFRCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_MFRCODE"><?php echo strval($pharmacy_storemast->MFRCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->MFRCODE->ViewValue) : $pharmacy_storemast->MFRCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->MFRCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->MFRCODE->ReadOnly || $pharmacy_storemast->MFRCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_MFRCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->MFRCODE->Lookup->getParamTag("p_x_MFRCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->MFRCODE->displayValueSeparatorAttribute() ?>" name="x_MFRCODE" id="x_MFRCODE" value="<?php echo $pharmacy_storemast->MFRCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->COMBCODE->Visible) { // COMBCODE ?>
	<div id="r_COMBCODE" class="form-group row">
		<label id="elh_pharmacy_storemast_COMBCODE" for="x_COMBCODE" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->COMBCODE->caption() ?><?php echo ($pharmacy_storemast->COMBCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBCODE">
<?php $pharmacy_storemast->COMBCODE->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_storemast->COMBCODE->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?php echo strval($pharmacy_storemast->COMBCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBCODE->ViewValue) : $pharmacy_storemast->COMBCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBCODE->ReadOnly || $pharmacy_storemast->COMBCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBCODE->Lookup->getParamTag("p_x_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?php echo $pharmacy_storemast->COMBCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->COMBCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->COMBCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENCODE->Visible) { // GENCODE ?>
	<div id="r_GENCODE" class="form-group row">
		<label id="elh_pharmacy_storemast_GENCODE" for="x_GENCODE" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->GENCODE->caption() ?><?php echo ($pharmacy_storemast->GENCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENCODE">
<?php $pharmacy_storemast->GENCODE->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_storemast->GENCODE->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?php echo strval($pharmacy_storemast->GENCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENCODE->ViewValue) : $pharmacy_storemast->GENCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENCODE->ReadOnly || $pharmacy_storemast->GENCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENCODE->Lookup->getParamTag("p_x_GENCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?php echo $pharmacy_storemast->GENCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->GENCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->GENCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->STRENGTH->Visible) { // STRENGTH ?>
	<div id="r_STRENGTH" class="form-group row">
		<label id="elh_pharmacy_storemast_STRENGTH" for="x_STRENGTH" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->STRENGTH->caption() ?><?php echo ($pharmacy_storemast->STRENGTH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_storemast_STRENGTH">
<input type="text" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STRENGTH->EditValue ?>"<?php echo $pharmacy_storemast->STRENGTH->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->STRENGTH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->UNIT->Visible) { // UNIT ?>
	<div id="r_UNIT" class="form-group row">
		<label id="elh_pharmacy_storemast_UNIT" for="x_UNIT" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->UNIT->caption() ?><?php echo ($pharmacy_storemast->UNIT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->UNIT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UNIT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_UNIT" data-value-separator="<?php echo $pharmacy_storemast->UNIT->displayValueSeparatorAttribute() ?>" id="x_UNIT" name="x_UNIT"<?php echo $pharmacy_storemast->UNIT->editAttributes() ?>>
		<?php echo $pharmacy_storemast->UNIT->selectOptionListHtml("x_UNIT") ?>
	</select>
</div>
</span>
<?php echo $pharmacy_storemast->UNIT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->FORMULARY->Visible) { // FORMULARY ?>
	<div id="r_FORMULARY" class="form-group row">
		<label id="elh_pharmacy_storemast_FORMULARY" for="x_FORMULARY" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->FORMULARY->caption() ?><?php echo ($pharmacy_storemast->FORMULARY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->FORMULARY->cellAttributes() ?>>
<span id="el_pharmacy_storemast_FORMULARY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-value-separator="<?php echo $pharmacy_storemast->FORMULARY->displayValueSeparatorAttribute() ?>" id="x_FORMULARY" name="x_FORMULARY"<?php echo $pharmacy_storemast->FORMULARY->editAttributes() ?>>
		<?php echo $pharmacy_storemast->FORMULARY->selectOptionListHtml("x_FORMULARY") ?>
	</select>
</div>
</span>
<?php echo $pharmacy_storemast->FORMULARY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RACKNO->Visible) { // RACKNO ?>
	<div id="r_RACKNO" class="form-group row">
		<label id="elh_pharmacy_storemast_RACKNO" for="x_RACKNO" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->RACKNO->caption() ?><?php echo ($pharmacy_storemast->RACKNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->RACKNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RACKNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RACKNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RACKNO->EditValue ?>"<?php echo $pharmacy_storemast->RACKNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->RACKNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SUPPNAME->Visible) { // SUPPNAME ?>
	<div id="r_SUPPNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_SUPPNAME" for="x_SUPPNAME" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->SUPPNAME->caption() ?><?php echo ($pharmacy_storemast->SUPPNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SUPPNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SUPPNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SUPPNAME"><?php echo strval($pharmacy_storemast->SUPPNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->SUPPNAME->ViewValue) : $pharmacy_storemast->SUPPNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->SUPPNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->SUPPNAME->ReadOnly || $pharmacy_storemast->SUPPNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_SUPPNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->SUPPNAME->Lookup->getParamTag("p_x_SUPPNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SUPPNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->SUPPNAME->displayValueSeparatorAttribute() ?>" name="x_SUPPNAME" id="x_SUPPNAME" value="<?php echo $pharmacy_storemast->SUPPNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->SUPPNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->SUPPNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->COMBNAME->Visible) { // COMBNAME ?>
	<div id="r_COMBNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_COMBNAME" for="x_COMBNAME" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->COMBNAME->caption() ?><?php echo ($pharmacy_storemast->COMBNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->COMBNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?php echo strval($pharmacy_storemast->COMBNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBNAME->ViewValue) : $pharmacy_storemast->COMBNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBNAME->ReadOnly || $pharmacy_storemast->COMBNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBNAME->Lookup->getParamTag("p_x_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?php echo $pharmacy_storemast->COMBNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->COMBNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->COMBNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
	<div id="r_GENERICNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_GENERICNAME" for="x_GENERICNAME" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->GENERICNAME->caption() ?><?php echo ($pharmacy_storemast->GENERICNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->GENERICNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENERICNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?php echo strval($pharmacy_storemast->GENERICNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENERICNAME->ViewValue) : $pharmacy_storemast->GENERICNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENERICNAME->ReadOnly || $pharmacy_storemast->GENERICNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENERICNAME->Lookup->getParamTag("p_x_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?php echo $pharmacy_storemast->GENERICNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->GENERICNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->GENERICNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->REMARK->Visible) { // REMARK ?>
	<div id="r_REMARK" class="form-group row">
		<label id="elh_pharmacy_storemast_REMARK" for="x_REMARK" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->REMARK->caption() ?><?php echo ($pharmacy_storemast->REMARK->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->REMARK->cellAttributes() ?>>
<span id="el_pharmacy_storemast_REMARK">
<input type="text" data-table="pharmacy_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast->REMARK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->REMARK->EditValue ?>"<?php echo $pharmacy_storemast->REMARK->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->REMARK->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TEMP->Visible) { // TEMP ?>
	<div id="r_TEMP" class="form-group row">
		<label id="elh_pharmacy_storemast_TEMP" for="x_TEMP" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->TEMP->caption() ?><?php echo ($pharmacy_storemast->TEMP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->TEMP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TEMP">
<input type="text" data-table="pharmacy_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TEMP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TEMP->EditValue ?>"<?php echo $pharmacy_storemast->TEMP->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->TEMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_pharmacy_storemast_PurValue" for="x_PurValue" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->PurValue->caption() ?><?php echo ($pharmacy_storemast->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PurValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PurValue->EditValue ?>"<?php echo $pharmacy_storemast->PurValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_storemast_PSGST" for="x_PSGST" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->PSGST->caption() ?><?php echo ($pharmacy_storemast->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PSGST->EditValue ?>"<?php echo $pharmacy_storemast->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_storemast_PCGST" for="x_PCGST" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->PCGST->caption() ?><?php echo ($pharmacy_storemast->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PCGST->EditValue ?>"<?php echo $pharmacy_storemast->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SaleValue->Visible) { // SaleValue ?>
	<div id="r_SaleValue" class="form-group row">
		<label id="elh_pharmacy_storemast_SaleValue" for="x_SaleValue" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->SaleValue->caption() ?><?php echo ($pharmacy_storemast->SaleValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SaleValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleValue->EditValue ?>"<?php echo $pharmacy_storemast->SaleValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->SaleValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_storemast_SSGST" for="x_SSGST" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->SSGST->caption() ?><?php echo ($pharmacy_storemast->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SSGST->EditValue ?>"<?php echo $pharmacy_storemast->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_storemast_SCGST" for="x_SCGST" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->SCGST->caption() ?><?php echo ($pharmacy_storemast->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SCGST->EditValue ?>"<?php echo $pharmacy_storemast->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SaleRate->Visible) { // SaleRate ?>
	<div id="r_SaleRate" class="form-group row">
		<label id="elh_pharmacy_storemast_SaleRate" for="x_SaleRate" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->SaleRate->caption() ?><?php echo ($pharmacy_storemast->SaleRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SaleRate->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleRate">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleRate->EditValue ?>"<?php echo $pharmacy_storemast->SaleRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast->SaleRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->Scheduling->Visible) { // Scheduling ?>
	<div id="r_Scheduling" class="form-group row">
		<label id="elh_pharmacy_storemast_Scheduling" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->Scheduling->caption() ?><?php echo ($pharmacy_storemast->Scheduling->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->Scheduling->cellAttributes() ?>>
<span id="el_pharmacy_storemast_Scheduling">
<div id="tp_x_Scheduling" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Scheduling" data-value-separator="<?php echo $pharmacy_storemast->Scheduling->displayValueSeparatorAttribute() ?>" name="x_Scheduling" id="x_Scheduling" value="{value}"<?php echo $pharmacy_storemast->Scheduling->editAttributes() ?>></div>
<div id="dsl_x_Scheduling" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Scheduling->radioButtonListHtml(FALSE, "x_Scheduling") ?>
</div></div>
</span>
<?php echo $pharmacy_storemast->Scheduling->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->Schedulingh1->Visible) { // Schedulingh1 ?>
	<div id="r_Schedulingh1" class="form-group row">
		<label id="elh_pharmacy_storemast_Schedulingh1" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast->Schedulingh1->caption() ?><?php echo ($pharmacy_storemast->Schedulingh1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->Schedulingh1->cellAttributes() ?>>
<span id="el_pharmacy_storemast_Schedulingh1">
<div id="tp_x_Schedulingh1" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Schedulingh1" data-value-separator="<?php echo $pharmacy_storemast->Schedulingh1->displayValueSeparatorAttribute() ?>" name="x_Schedulingh1" id="x_Schedulingh1" value="{value}"<?php echo $pharmacy_storemast->Schedulingh1->editAttributes() ?>></div>
<div id="dsl_x_Schedulingh1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Schedulingh1->radioButtonListHtml(FALSE, "x_Schedulingh1") ?>
</div></div>
</span>
<?php echo $pharmacy_storemast->Schedulingh1->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_storemast_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_storemast_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_storemast_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_storemast_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_storemast_add->terminate();
?>