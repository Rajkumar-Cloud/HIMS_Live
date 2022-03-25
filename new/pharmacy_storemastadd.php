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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_storemastadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_storemastadd = currentForm = new ew.Form("fpharmacy_storemastadd", "add");

	// Validate form
	fpharmacy_storemastadd.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
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
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->BRCODE->caption(), $pharmacy_storemast_add->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->PRC->caption(), $pharmacy_storemast_add->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->TYPE->caption(), $pharmacy_storemast_add->TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->DES->Required) { ?>
				elm = this.getElements("x" + infix + "_DES");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->DES->caption(), $pharmacy_storemast_add->DES->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->UM->Required) { ?>
				elm = this.getElements("x" + infix + "_UM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->UM->caption(), $pharmacy_storemast_add->UM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->RT->caption(), $pharmacy_storemast_add->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->RT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->BATCHNO->caption(), $pharmacy_storemast_add->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->MRP->caption(), $pharmacy_storemast_add->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->MRP->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->EXPDT->caption(), $pharmacy_storemast_add->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->EXPDT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->LASTPURDT->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTPURDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->LASTPURDT->caption(), $pharmacy_storemast_add->LASTPURDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LASTPURDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->LASTPURDT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->LASTSUPP->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTSUPP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->LASTSUPP->caption(), $pharmacy_storemast_add->LASTSUPP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->GENNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->GENNAME->caption(), $pharmacy_storemast_add->GENNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->LASTISSDT->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTISSDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->LASTISSDT->caption(), $pharmacy_storemast_add->LASTISSDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LASTISSDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->LASTISSDT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->CREATEDDT->Required) { ?>
				elm = this.getElements("x" + infix + "_CREATEDDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->CREATEDDT->caption(), $pharmacy_storemast_add->CREATEDDT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->DRID->Required) { ?>
				elm = this.getElements("x" + infix + "_DRID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->DRID->caption(), $pharmacy_storemast_add->DRID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->MFRCODE->caption(), $pharmacy_storemast_add->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->COMBCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->COMBCODE->caption(), $pharmacy_storemast_add->COMBCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->GENCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_GENCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->GENCODE->caption(), $pharmacy_storemast_add->GENCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->STRENGTH->Required) { ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->STRENGTH->caption(), $pharmacy_storemast_add->STRENGTH->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->STRENGTH->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->UNIT->Required) { ?>
				elm = this.getElements("x" + infix + "_UNIT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->UNIT->caption(), $pharmacy_storemast_add->UNIT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->FORMULARY->Required) { ?>
				elm = this.getElements("x" + infix + "_FORMULARY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->FORMULARY->caption(), $pharmacy_storemast_add->FORMULARY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->RACKNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RACKNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->RACKNO->caption(), $pharmacy_storemast_add->RACKNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->SUPPNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_SUPPNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->SUPPNAME->caption(), $pharmacy_storemast_add->SUPPNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->COMBNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->COMBNAME->caption(), $pharmacy_storemast_add->COMBNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->GENERICNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENERICNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->GENERICNAME->caption(), $pharmacy_storemast_add->GENERICNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->REMARK->Required) { ?>
				elm = this.getElements("x" + infix + "_REMARK");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->REMARK->caption(), $pharmacy_storemast_add->REMARK->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->TEMP->Required) { ?>
				elm = this.getElements("x" + infix + "_TEMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->TEMP->caption(), $pharmacy_storemast_add->TEMP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->PurValue->Required) { ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->PurValue->caption(), $pharmacy_storemast_add->PurValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->PurValue->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->PSGST->caption(), $pharmacy_storemast_add->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->PSGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->PCGST->caption(), $pharmacy_storemast_add->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->PCGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->SaleValue->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->SaleValue->caption(), $pharmacy_storemast_add->SaleValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->SaleValue->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->SSGST->caption(), $pharmacy_storemast_add->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->SSGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->SCGST->caption(), $pharmacy_storemast_add->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->SCGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->SaleRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->SaleRate->caption(), $pharmacy_storemast_add->SaleRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_add->SaleRate->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->HospID->caption(), $pharmacy_storemast_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_add->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_add->BRNAME->caption(), $pharmacy_storemast_add->BRNAME->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpharmacy_storemastadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_storemastadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_storemastadd.lists["x_TYPE"] = <?php echo $pharmacy_storemast_add->TYPE->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_TYPE"].options = <?php echo JsonEncode($pharmacy_storemast_add->TYPE->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastadd.lists["x_LASTSUPP"] = <?php echo $pharmacy_storemast_add->LASTSUPP->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_LASTSUPP"].options = <?php echo JsonEncode($pharmacy_storemast_add->LASTSUPP->lookupOptions()) ?>;
	fpharmacy_storemastadd.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_add->GENNAME->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_add->GENNAME->lookupOptions()) ?>;
	fpharmacy_storemastadd.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_storemastadd.lists["x_DRID"] = <?php echo $pharmacy_storemast_add->DRID->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_DRID"].options = <?php echo JsonEncode($pharmacy_storemast_add->DRID->lookupOptions()) ?>;
	fpharmacy_storemastadd.lists["x_MFRCODE"] = <?php echo $pharmacy_storemast_add->MFRCODE->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_MFRCODE"].options = <?php echo JsonEncode($pharmacy_storemast_add->MFRCODE->lookupOptions()) ?>;
	fpharmacy_storemastadd.lists["x_COMBCODE"] = <?php echo $pharmacy_storemast_add->COMBCODE->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_storemast_add->COMBCODE->lookupOptions()) ?>;
	fpharmacy_storemastadd.lists["x_GENCODE"] = <?php echo $pharmacy_storemast_add->GENCODE->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_storemast_add->GENCODE->lookupOptions()) ?>;
	fpharmacy_storemastadd.lists["x_UNIT"] = <?php echo $pharmacy_storemast_add->UNIT->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_UNIT"].options = <?php echo JsonEncode($pharmacy_storemast_add->UNIT->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastadd.lists["x_FORMULARY"] = <?php echo $pharmacy_storemast_add->FORMULARY->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_FORMULARY"].options = <?php echo JsonEncode($pharmacy_storemast_add->FORMULARY->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastadd.lists["x_SUPPNAME"] = <?php echo $pharmacy_storemast_add->SUPPNAME->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_SUPPNAME"].options = <?php echo JsonEncode($pharmacy_storemast_add->SUPPNAME->lookupOptions()) ?>;
	fpharmacy_storemastadd.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_add->COMBNAME->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_add->COMBNAME->lookupOptions()) ?>;
	fpharmacy_storemastadd.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_add->GENERICNAME->Lookup->toClientList($pharmacy_storemast_add) ?>;
	fpharmacy_storemastadd.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_add->GENERICNAME->lookupOptions()) ?>;
	loadjs.done("fpharmacy_storemastadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_storemast_add->showPageHeader(); ?>
<?php
$pharmacy_storemast_add->showMessage();
?>
<form name="fpharmacy_storemastadd" id="fpharmacy_storemastadd" class="<?php echo $pharmacy_storemast_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_storemast_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_storemast_add->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_storemast_PRC" for="x_PRC" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->PRC->caption() ?><?php echo $pharmacy_storemast_add->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->PRC->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PRC">
<input type="text" data-table="pharmacy_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->PRC->EditValue ?>"<?php echo $pharmacy_storemast_add->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label id="elh_pharmacy_storemast_TYPE" for="x_TYPE" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->TYPE->caption() ?><?php echo $pharmacy_storemast_add->TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_TYPE" data-value-separator="<?php echo $pharmacy_storemast_add->TYPE->displayValueSeparatorAttribute() ?>" id="x_TYPE" name="x_TYPE"<?php echo $pharmacy_storemast_add->TYPE->editAttributes() ?>>
			<?php echo $pharmacy_storemast_add->TYPE->selectOptionListHtml("x_TYPE") ?>
		</select>
</div>
</span>
<?php echo $pharmacy_storemast_add->TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->DES->Visible) { // DES ?>
	<div id="r_DES" class="form-group row">
		<label id="elh_pharmacy_storemast_DES" for="x_DES" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->DES->caption() ?><?php echo $pharmacy_storemast_add->DES->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->DES->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DES">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->DES->EditValue ?>"<?php echo $pharmacy_storemast_add->DES->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->DES->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label id="elh_pharmacy_storemast_UM" for="x_UM" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->UM->caption() ?><?php echo $pharmacy_storemast_add->UM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->UM->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UM">
<input type="text" data-table="pharmacy_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->UM->EditValue ?>"<?php echo $pharmacy_storemast_add->UM->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->UM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_pharmacy_storemast_RT" for="x_RT" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->RT->caption() ?><?php echo $pharmacy_storemast_add->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->RT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RT">
<input type="text" data-table="pharmacy_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->RT->EditValue ?>"<?php echo $pharmacy_storemast_add->RT->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_pharmacy_storemast_BATCHNO" for="x_BATCHNO" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->BATCHNO->caption() ?><?php echo $pharmacy_storemast_add->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BATCHNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->BATCHNO->EditValue ?>"<?php echo $pharmacy_storemast_add->BATCHNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_storemast_MRP" for="x_MRP" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->MRP->caption() ?><?php echo $pharmacy_storemast_add->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->MRP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MRP">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->MRP->EditValue ?>"<?php echo $pharmacy_storemast_add->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_pharmacy_storemast_EXPDT" for="x_EXPDT" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->EXPDT->caption() ?><?php echo $pharmacy_storemast_add->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_EXPDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->EXPDT->EditValue ?>"<?php echo $pharmacy_storemast_add->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_add->EXPDT->ReadOnly && !$pharmacy_storemast_add->EXPDT->Disabled && !isset($pharmacy_storemast_add->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_add->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastadd", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_storemast_add->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->LASTPURDT->Visible) { // LASTPURDT ?>
	<div id="r_LASTPURDT" class="form-group row">
		<label id="elh_pharmacy_storemast_LASTPURDT" for="x_LASTPURDT" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->LASTPURDT->caption() ?><?php echo $pharmacy_storemast_add->LASTPURDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->LASTPURDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTPURDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->LASTPURDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->LASTPURDT->EditValue ?>"<?php echo $pharmacy_storemast_add->LASTPURDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_add->LASTPURDT->ReadOnly && !$pharmacy_storemast_add->LASTPURDT->Disabled && !isset($pharmacy_storemast_add->LASTPURDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_add->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastadd", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_storemast_add->LASTPURDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->LASTSUPP->Visible) { // LASTSUPP ?>
	<div id="r_LASTSUPP" class="form-group row">
		<label id="elh_pharmacy_storemast_LASTSUPP" for="x_LASTSUPP" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->LASTSUPP->caption() ?><?php echo $pharmacy_storemast_add->LASTSUPP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->LASTSUPP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTSUPP">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_LASTSUPP"><?php echo EmptyValue(strval($pharmacy_storemast_add->LASTSUPP->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_add->LASTSUPP->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_add->LASTSUPP->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_add->LASTSUPP->ReadOnly || $pharmacy_storemast_add->LASTSUPP->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_LASTSUPP',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_add->LASTSUPP->Lookup->getParamTag($pharmacy_storemast_add, "p_x_LASTSUPP") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_LASTSUPP" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_add->LASTSUPP->displayValueSeparatorAttribute() ?>" name="x_LASTSUPP" id="x_LASTSUPP" value="<?php echo $pharmacy_storemast_add->LASTSUPP->CurrentValue ?>"<?php echo $pharmacy_storemast_add->LASTSUPP->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->LASTSUPP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_GENNAME" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->GENNAME->caption() ?><?php echo $pharmacy_storemast_add->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENNAME">
<?php
$onchange = $pharmacy_storemast_add->GENNAME->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_storemast_add->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x_GENNAME">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_GENNAME" id="sv_x_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast_add->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast_add->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_add->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_add->GENNAME->ReadOnly || $pharmacy_storemast_add->GENNAME->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_add->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast_add->GENNAME->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_storemastadd"], function() {
	fpharmacy_storemastadd.createAutoSuggest({"id":"x_GENNAME","forceSelect":false});
});
</script>
<?php echo $pharmacy_storemast_add->GENNAME->Lookup->getParamTag($pharmacy_storemast_add, "p_x_GENNAME") ?>
</span>
<?php echo $pharmacy_storemast_add->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->LASTISSDT->Visible) { // LASTISSDT ?>
	<div id="r_LASTISSDT" class="form-group row">
		<label id="elh_pharmacy_storemast_LASTISSDT" for="x_LASTISSDT" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->LASTISSDT->caption() ?><?php echo $pharmacy_storemast_add->LASTISSDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->LASTISSDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTISSDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->LASTISSDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->LASTISSDT->EditValue ?>"<?php echo $pharmacy_storemast_add->LASTISSDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_add->LASTISSDT->ReadOnly && !$pharmacy_storemast_add->LASTISSDT->Disabled && !isset($pharmacy_storemast_add->LASTISSDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_add->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastadd", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_storemast_add->LASTISSDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label id="elh_pharmacy_storemast_DRID" for="x_DRID" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->DRID->caption() ?><?php echo $pharmacy_storemast_add->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->DRID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DRID">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DRID"><?php echo EmptyValue(strval($pharmacy_storemast_add->DRID->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_add->DRID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_add->DRID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_add->DRID->ReadOnly || $pharmacy_storemast_add->DRID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DRID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_add->DRID->Lookup->getParamTag($pharmacy_storemast_add, "p_x_DRID") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_add->DRID->displayValueSeparatorAttribute() ?>" name="x_DRID" id="x_DRID" value="<?php echo $pharmacy_storemast_add->DRID->CurrentValue ?>"<?php echo $pharmacy_storemast_add->DRID->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->DRID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_storemast_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->MFRCODE->caption() ?><?php echo $pharmacy_storemast_add->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MFRCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_MFRCODE"><?php echo EmptyValue(strval($pharmacy_storemast_add->MFRCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_add->MFRCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_add->MFRCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_add->MFRCODE->ReadOnly || $pharmacy_storemast_add->MFRCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_MFRCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_add->MFRCODE->Lookup->getParamTag($pharmacy_storemast_add, "p_x_MFRCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_add->MFRCODE->displayValueSeparatorAttribute() ?>" name="x_MFRCODE" id="x_MFRCODE" value="<?php echo $pharmacy_storemast_add->MFRCODE->CurrentValue ?>"<?php echo $pharmacy_storemast_add->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->COMBCODE->Visible) { // COMBCODE ?>
	<div id="r_COMBCODE" class="form-group row">
		<label id="elh_pharmacy_storemast_COMBCODE" for="x_COMBCODE" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->COMBCODE->caption() ?><?php echo $pharmacy_storemast_add->COMBCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBCODE">
<?php $pharmacy_storemast_add->COMBCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?php echo EmptyValue(strval($pharmacy_storemast_add->COMBCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_add->COMBCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_add->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_add->COMBCODE->ReadOnly || $pharmacy_storemast_add->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_add->COMBCODE->Lookup->getParamTag($pharmacy_storemast_add, "p_x_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_add->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?php echo $pharmacy_storemast_add->COMBCODE->CurrentValue ?>"<?php echo $pharmacy_storemast_add->COMBCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->COMBCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->GENCODE->Visible) { // GENCODE ?>
	<div id="r_GENCODE" class="form-group row">
		<label id="elh_pharmacy_storemast_GENCODE" for="x_GENCODE" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->GENCODE->caption() ?><?php echo $pharmacy_storemast_add->GENCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENCODE">
<?php $pharmacy_storemast_add->GENCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?php echo EmptyValue(strval($pharmacy_storemast_add->GENCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_add->GENCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_add->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_add->GENCODE->ReadOnly || $pharmacy_storemast_add->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_add->GENCODE->Lookup->getParamTag($pharmacy_storemast_add, "p_x_GENCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_add->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?php echo $pharmacy_storemast_add->GENCODE->CurrentValue ?>"<?php echo $pharmacy_storemast_add->GENCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->GENCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->STRENGTH->Visible) { // STRENGTH ?>
	<div id="r_STRENGTH" class="form-group row">
		<label id="elh_pharmacy_storemast_STRENGTH" for="x_STRENGTH" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->STRENGTH->caption() ?><?php echo $pharmacy_storemast_add->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_storemast_STRENGTH">
<input type="text" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->STRENGTH->EditValue ?>"<?php echo $pharmacy_storemast_add->STRENGTH->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->STRENGTH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->UNIT->Visible) { // UNIT ?>
	<div id="r_UNIT" class="form-group row">
		<label id="elh_pharmacy_storemast_UNIT" for="x_UNIT" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->UNIT->caption() ?><?php echo $pharmacy_storemast_add->UNIT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->UNIT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UNIT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_UNIT" data-value-separator="<?php echo $pharmacy_storemast_add->UNIT->displayValueSeparatorAttribute() ?>" id="x_UNIT" name="x_UNIT"<?php echo $pharmacy_storemast_add->UNIT->editAttributes() ?>>
			<?php echo $pharmacy_storemast_add->UNIT->selectOptionListHtml("x_UNIT") ?>
		</select>
</div>
</span>
<?php echo $pharmacy_storemast_add->UNIT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->FORMULARY->Visible) { // FORMULARY ?>
	<div id="r_FORMULARY" class="form-group row">
		<label id="elh_pharmacy_storemast_FORMULARY" for="x_FORMULARY" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->FORMULARY->caption() ?><?php echo $pharmacy_storemast_add->FORMULARY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->FORMULARY->cellAttributes() ?>>
<span id="el_pharmacy_storemast_FORMULARY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-value-separator="<?php echo $pharmacy_storemast_add->FORMULARY->displayValueSeparatorAttribute() ?>" id="x_FORMULARY" name="x_FORMULARY"<?php echo $pharmacy_storemast_add->FORMULARY->editAttributes() ?>>
			<?php echo $pharmacy_storemast_add->FORMULARY->selectOptionListHtml("x_FORMULARY") ?>
		</select>
</div>
</span>
<?php echo $pharmacy_storemast_add->FORMULARY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->RACKNO->Visible) { // RACKNO ?>
	<div id="r_RACKNO" class="form-group row">
		<label id="elh_pharmacy_storemast_RACKNO" for="x_RACKNO" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->RACKNO->caption() ?><?php echo $pharmacy_storemast_add->RACKNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->RACKNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RACKNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->RACKNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->RACKNO->EditValue ?>"<?php echo $pharmacy_storemast_add->RACKNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->RACKNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->SUPPNAME->Visible) { // SUPPNAME ?>
	<div id="r_SUPPNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_SUPPNAME" for="x_SUPPNAME" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->SUPPNAME->caption() ?><?php echo $pharmacy_storemast_add->SUPPNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->SUPPNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SUPPNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SUPPNAME"><?php echo EmptyValue(strval($pharmacy_storemast_add->SUPPNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_add->SUPPNAME->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_add->SUPPNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_add->SUPPNAME->ReadOnly || $pharmacy_storemast_add->SUPPNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_SUPPNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_add->SUPPNAME->Lookup->getParamTag($pharmacy_storemast_add, "p_x_SUPPNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SUPPNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_add->SUPPNAME->displayValueSeparatorAttribute() ?>" name="x_SUPPNAME" id="x_SUPPNAME" value="<?php echo $pharmacy_storemast_add->SUPPNAME->CurrentValue ?>"<?php echo $pharmacy_storemast_add->SUPPNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->SUPPNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->COMBNAME->Visible) { // COMBNAME ?>
	<div id="r_COMBNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_COMBNAME" for="x_COMBNAME" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->COMBNAME->caption() ?><?php echo $pharmacy_storemast_add->COMBNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->COMBNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?php echo EmptyValue(strval($pharmacy_storemast_add->COMBNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_add->COMBNAME->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_add->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_add->COMBNAME->ReadOnly || $pharmacy_storemast_add->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_add->COMBNAME->Lookup->getParamTag($pharmacy_storemast_add, "p_x_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_add->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?php echo $pharmacy_storemast_add->COMBNAME->CurrentValue ?>"<?php echo $pharmacy_storemast_add->COMBNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->COMBNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->GENERICNAME->Visible) { // GENERICNAME ?>
	<div id="r_GENERICNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_GENERICNAME" for="x_GENERICNAME" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->GENERICNAME->caption() ?><?php echo $pharmacy_storemast_add->GENERICNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->GENERICNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENERICNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?php echo EmptyValue(strval($pharmacy_storemast_add->GENERICNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_add->GENERICNAME->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_add->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_add->GENERICNAME->ReadOnly || $pharmacy_storemast_add->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_add->GENERICNAME->Lookup->getParamTag($pharmacy_storemast_add, "p_x_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_add->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?php echo $pharmacy_storemast_add->GENERICNAME->CurrentValue ?>"<?php echo $pharmacy_storemast_add->GENERICNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->GENERICNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->REMARK->Visible) { // REMARK ?>
	<div id="r_REMARK" class="form-group row">
		<label id="elh_pharmacy_storemast_REMARK" for="x_REMARK" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->REMARK->caption() ?><?php echo $pharmacy_storemast_add->REMARK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->REMARK->cellAttributes() ?>>
<span id="el_pharmacy_storemast_REMARK">
<input type="text" data-table="pharmacy_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->REMARK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->REMARK->EditValue ?>"<?php echo $pharmacy_storemast_add->REMARK->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->REMARK->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->TEMP->Visible) { // TEMP ?>
	<div id="r_TEMP" class="form-group row">
		<label id="elh_pharmacy_storemast_TEMP" for="x_TEMP" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->TEMP->caption() ?><?php echo $pharmacy_storemast_add->TEMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->TEMP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TEMP">
<input type="text" data-table="pharmacy_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->TEMP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->TEMP->EditValue ?>"<?php echo $pharmacy_storemast_add->TEMP->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->TEMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_pharmacy_storemast_PurValue" for="x_PurValue" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->PurValue->caption() ?><?php echo $pharmacy_storemast_add->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PurValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->PurValue->EditValue ?>"<?php echo $pharmacy_storemast_add->PurValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_storemast_PSGST" for="x_PSGST" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->PSGST->caption() ?><?php echo $pharmacy_storemast_add->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->PSGST->EditValue ?>"<?php echo $pharmacy_storemast_add->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_storemast_PCGST" for="x_PCGST" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->PCGST->caption() ?><?php echo $pharmacy_storemast_add->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->PCGST->EditValue ?>"<?php echo $pharmacy_storemast_add->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->SaleValue->Visible) { // SaleValue ?>
	<div id="r_SaleValue" class="form-group row">
		<label id="elh_pharmacy_storemast_SaleValue" for="x_SaleValue" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->SaleValue->caption() ?><?php echo $pharmacy_storemast_add->SaleValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->SaleValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->SaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->SaleValue->EditValue ?>"<?php echo $pharmacy_storemast_add->SaleValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->SaleValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_storemast_SSGST" for="x_SSGST" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->SSGST->caption() ?><?php echo $pharmacy_storemast_add->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->SSGST->EditValue ?>"<?php echo $pharmacy_storemast_add->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_storemast_SCGST" for="x_SCGST" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->SCGST->caption() ?><?php echo $pharmacy_storemast_add->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->SCGST->EditValue ?>"<?php echo $pharmacy_storemast_add->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_add->SaleRate->Visible) { // SaleRate ?>
	<div id="r_SaleRate" class="form-group row">
		<label id="elh_pharmacy_storemast_SaleRate" for="x_SaleRate" class="<?php echo $pharmacy_storemast_add->LeftColumnClass ?>"><?php echo $pharmacy_storemast_add->SaleRate->caption() ?><?php echo $pharmacy_storemast_add->SaleRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_add->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_add->SaleRate->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleRate">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_add->SaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_add->SaleRate->EditValue ?>"<?php echo $pharmacy_storemast_add->SaleRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_add->SaleRate->CustomMsg ?></div></div>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_storemast_add->terminate();
?>