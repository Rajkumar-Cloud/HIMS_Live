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
$pharmacy_storemast_edit = new pharmacy_storemast_edit();

// Run the page
$pharmacy_storemast_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_storemast_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_storemastedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_storemastedit = currentForm = new ew.Form("fpharmacy_storemastedit", "edit");

	// Validate form
	fpharmacy_storemastedit.validate = function() {
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
			<?php if ($pharmacy_storemast_edit->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->BRCODE->caption(), $pharmacy_storemast_edit->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->PRC->caption(), $pharmacy_storemast_edit->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->TYPE->caption(), $pharmacy_storemast_edit->TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->DES->Required) { ?>
				elm = this.getElements("x" + infix + "_DES");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->DES->caption(), $pharmacy_storemast_edit->DES->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->UM->Required) { ?>
				elm = this.getElements("x" + infix + "_UM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->UM->caption(), $pharmacy_storemast_edit->UM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->RT->caption(), $pharmacy_storemast_edit->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->RT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->BATCHNO->caption(), $pharmacy_storemast_edit->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->MRP->caption(), $pharmacy_storemast_edit->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->MRP->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->EXPDT->caption(), $pharmacy_storemast_edit->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->EXPDT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->LASTPURDT->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTPURDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->LASTPURDT->caption(), $pharmacy_storemast_edit->LASTPURDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LASTPURDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->LASTPURDT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->LASTSUPP->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTSUPP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->LASTSUPP->caption(), $pharmacy_storemast_edit->LASTSUPP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->GENNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->GENNAME->caption(), $pharmacy_storemast_edit->GENNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->LASTISSDT->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTISSDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->LASTISSDT->caption(), $pharmacy_storemast_edit->LASTISSDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LASTISSDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->LASTISSDT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->CREATEDDT->Required) { ?>
				elm = this.getElements("x" + infix + "_CREATEDDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->CREATEDDT->caption(), $pharmacy_storemast_edit->CREATEDDT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->DRID->Required) { ?>
				elm = this.getElements("x" + infix + "_DRID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->DRID->caption(), $pharmacy_storemast_edit->DRID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->MFRCODE->caption(), $pharmacy_storemast_edit->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->COMBCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->COMBCODE->caption(), $pharmacy_storemast_edit->COMBCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->GENCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_GENCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->GENCODE->caption(), $pharmacy_storemast_edit->GENCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->STRENGTH->Required) { ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->STRENGTH->caption(), $pharmacy_storemast_edit->STRENGTH->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->STRENGTH->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->UNIT->Required) { ?>
				elm = this.getElements("x" + infix + "_UNIT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->UNIT->caption(), $pharmacy_storemast_edit->UNIT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->FORMULARY->Required) { ?>
				elm = this.getElements("x" + infix + "_FORMULARY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->FORMULARY->caption(), $pharmacy_storemast_edit->FORMULARY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->RACKNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RACKNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->RACKNO->caption(), $pharmacy_storemast_edit->RACKNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->SUPPNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_SUPPNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->SUPPNAME->caption(), $pharmacy_storemast_edit->SUPPNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->COMBNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->COMBNAME->caption(), $pharmacy_storemast_edit->COMBNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->GENERICNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENERICNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->GENERICNAME->caption(), $pharmacy_storemast_edit->GENERICNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->REMARK->Required) { ?>
				elm = this.getElements("x" + infix + "_REMARK");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->REMARK->caption(), $pharmacy_storemast_edit->REMARK->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->TEMP->Required) { ?>
				elm = this.getElements("x" + infix + "_TEMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->TEMP->caption(), $pharmacy_storemast_edit->TEMP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->id->caption(), $pharmacy_storemast_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->PurValue->Required) { ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->PurValue->caption(), $pharmacy_storemast_edit->PurValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->PurValue->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->PSGST->caption(), $pharmacy_storemast_edit->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->PSGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->PCGST->caption(), $pharmacy_storemast_edit->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->PCGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->SaleValue->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->SaleValue->caption(), $pharmacy_storemast_edit->SaleValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->SaleValue->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->SSGST->caption(), $pharmacy_storemast_edit->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->SSGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->SCGST->caption(), $pharmacy_storemast_edit->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->SCGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->SaleRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->SaleRate->caption(), $pharmacy_storemast_edit->SaleRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_edit->SaleRate->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->HospID->caption(), $pharmacy_storemast_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_edit->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_edit->BRNAME->caption(), $pharmacy_storemast_edit->BRNAME->RequiredErrorMessage)) ?>");
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
	fpharmacy_storemastedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_storemastedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_storemastedit.lists["x_TYPE"] = <?php echo $pharmacy_storemast_edit->TYPE->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_TYPE"].options = <?php echo JsonEncode($pharmacy_storemast_edit->TYPE->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastedit.lists["x_LASTSUPP"] = <?php echo $pharmacy_storemast_edit->LASTSUPP->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_LASTSUPP"].options = <?php echo JsonEncode($pharmacy_storemast_edit->LASTSUPP->lookupOptions()) ?>;
	fpharmacy_storemastedit.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_edit->GENNAME->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_edit->GENNAME->lookupOptions()) ?>;
	fpharmacy_storemastedit.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_storemastedit.lists["x_DRID"] = <?php echo $pharmacy_storemast_edit->DRID->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_DRID"].options = <?php echo JsonEncode($pharmacy_storemast_edit->DRID->lookupOptions()) ?>;
	fpharmacy_storemastedit.lists["x_MFRCODE"] = <?php echo $pharmacy_storemast_edit->MFRCODE->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_MFRCODE"].options = <?php echo JsonEncode($pharmacy_storemast_edit->MFRCODE->lookupOptions()) ?>;
	fpharmacy_storemastedit.lists["x_COMBCODE"] = <?php echo $pharmacy_storemast_edit->COMBCODE->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_storemast_edit->COMBCODE->lookupOptions()) ?>;
	fpharmacy_storemastedit.lists["x_GENCODE"] = <?php echo $pharmacy_storemast_edit->GENCODE->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_storemast_edit->GENCODE->lookupOptions()) ?>;
	fpharmacy_storemastedit.lists["x_UNIT"] = <?php echo $pharmacy_storemast_edit->UNIT->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_UNIT"].options = <?php echo JsonEncode($pharmacy_storemast_edit->UNIT->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastedit.lists["x_FORMULARY"] = <?php echo $pharmacy_storemast_edit->FORMULARY->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_FORMULARY"].options = <?php echo JsonEncode($pharmacy_storemast_edit->FORMULARY->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastedit.lists["x_SUPPNAME"] = <?php echo $pharmacy_storemast_edit->SUPPNAME->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_SUPPNAME"].options = <?php echo JsonEncode($pharmacy_storemast_edit->SUPPNAME->lookupOptions()) ?>;
	fpharmacy_storemastedit.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_edit->COMBNAME->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_edit->COMBNAME->lookupOptions()) ?>;
	fpharmacy_storemastedit.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_edit->GENERICNAME->Lookup->toClientList($pharmacy_storemast_edit) ?>;
	fpharmacy_storemastedit.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_edit->GENERICNAME->lookupOptions()) ?>;
	loadjs.done("fpharmacy_storemastedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_storemast_edit->showPageHeader(); ?>
<?php
$pharmacy_storemast_edit->showMessage();
?>
<form name="fpharmacy_storemastedit" id="fpharmacy_storemastedit" class="<?php echo $pharmacy_storemast_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_storemast_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_storemast_edit->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_storemast_PRC" for="x_PRC" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->PRC->caption() ?><?php echo $pharmacy_storemast_edit->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->PRC->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PRC">
<input type="text" data-table="pharmacy_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->PRC->EditValue ?>"<?php echo $pharmacy_storemast_edit->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label id="elh_pharmacy_storemast_TYPE" for="x_TYPE" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->TYPE->caption() ?><?php echo $pharmacy_storemast_edit->TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_TYPE" data-value-separator="<?php echo $pharmacy_storemast_edit->TYPE->displayValueSeparatorAttribute() ?>" id="x_TYPE" name="x_TYPE"<?php echo $pharmacy_storemast_edit->TYPE->editAttributes() ?>>
			<?php echo $pharmacy_storemast_edit->TYPE->selectOptionListHtml("x_TYPE") ?>
		</select>
</div>
</span>
<?php echo $pharmacy_storemast_edit->TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->DES->Visible) { // DES ?>
	<div id="r_DES" class="form-group row">
		<label id="elh_pharmacy_storemast_DES" for="x_DES" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->DES->caption() ?><?php echo $pharmacy_storemast_edit->DES->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->DES->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DES">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->DES->EditValue ?>"<?php echo $pharmacy_storemast_edit->DES->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->DES->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label id="elh_pharmacy_storemast_UM" for="x_UM" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->UM->caption() ?><?php echo $pharmacy_storemast_edit->UM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->UM->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UM">
<input type="text" data-table="pharmacy_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->UM->EditValue ?>"<?php echo $pharmacy_storemast_edit->UM->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->UM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_pharmacy_storemast_RT" for="x_RT" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->RT->caption() ?><?php echo $pharmacy_storemast_edit->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->RT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RT">
<input type="text" data-table="pharmacy_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->RT->EditValue ?>"<?php echo $pharmacy_storemast_edit->RT->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_pharmacy_storemast_BATCHNO" for="x_BATCHNO" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->BATCHNO->caption() ?><?php echo $pharmacy_storemast_edit->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BATCHNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->BATCHNO->EditValue ?>"<?php echo $pharmacy_storemast_edit->BATCHNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_storemast_MRP" for="x_MRP" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->MRP->caption() ?><?php echo $pharmacy_storemast_edit->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->MRP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MRP">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->MRP->EditValue ?>"<?php echo $pharmacy_storemast_edit->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_pharmacy_storemast_EXPDT" for="x_EXPDT" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->EXPDT->caption() ?><?php echo $pharmacy_storemast_edit->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_EXPDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->EXPDT->EditValue ?>"<?php echo $pharmacy_storemast_edit->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_edit->EXPDT->ReadOnly && !$pharmacy_storemast_edit->EXPDT->Disabled && !isset($pharmacy_storemast_edit->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_edit->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastedit", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_storemast_edit->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->LASTPURDT->Visible) { // LASTPURDT ?>
	<div id="r_LASTPURDT" class="form-group row">
		<label id="elh_pharmacy_storemast_LASTPURDT" for="x_LASTPURDT" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->LASTPURDT->caption() ?><?php echo $pharmacy_storemast_edit->LASTPURDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->LASTPURDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTPURDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->LASTPURDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->LASTPURDT->EditValue ?>"<?php echo $pharmacy_storemast_edit->LASTPURDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_edit->LASTPURDT->ReadOnly && !$pharmacy_storemast_edit->LASTPURDT->Disabled && !isset($pharmacy_storemast_edit->LASTPURDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_edit->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastedit", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_storemast_edit->LASTPURDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->LASTSUPP->Visible) { // LASTSUPP ?>
	<div id="r_LASTSUPP" class="form-group row">
		<label id="elh_pharmacy_storemast_LASTSUPP" for="x_LASTSUPP" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->LASTSUPP->caption() ?><?php echo $pharmacy_storemast_edit->LASTSUPP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->LASTSUPP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTSUPP">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_LASTSUPP"><?php echo EmptyValue(strval($pharmacy_storemast_edit->LASTSUPP->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_edit->LASTSUPP->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_edit->LASTSUPP->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_edit->LASTSUPP->ReadOnly || $pharmacy_storemast_edit->LASTSUPP->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_LASTSUPP',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_edit->LASTSUPP->Lookup->getParamTag($pharmacy_storemast_edit, "p_x_LASTSUPP") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_LASTSUPP" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_edit->LASTSUPP->displayValueSeparatorAttribute() ?>" name="x_LASTSUPP" id="x_LASTSUPP" value="<?php echo $pharmacy_storemast_edit->LASTSUPP->CurrentValue ?>"<?php echo $pharmacy_storemast_edit->LASTSUPP->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->LASTSUPP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_GENNAME" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->GENNAME->caption() ?><?php echo $pharmacy_storemast_edit->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENNAME">
<?php
$onchange = $pharmacy_storemast_edit->GENNAME->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_storemast_edit->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x_GENNAME">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_GENNAME" id="sv_x_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast_edit->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast_edit->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_edit->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_edit->GENNAME->ReadOnly || $pharmacy_storemast_edit->GENNAME->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_edit->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast_edit->GENNAME->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_storemastedit"], function() {
	fpharmacy_storemastedit.createAutoSuggest({"id":"x_GENNAME","forceSelect":false});
});
</script>
<?php echo $pharmacy_storemast_edit->GENNAME->Lookup->getParamTag($pharmacy_storemast_edit, "p_x_GENNAME") ?>
</span>
<?php echo $pharmacy_storemast_edit->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->LASTISSDT->Visible) { // LASTISSDT ?>
	<div id="r_LASTISSDT" class="form-group row">
		<label id="elh_pharmacy_storemast_LASTISSDT" for="x_LASTISSDT" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->LASTISSDT->caption() ?><?php echo $pharmacy_storemast_edit->LASTISSDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->LASTISSDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTISSDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->LASTISSDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->LASTISSDT->EditValue ?>"<?php echo $pharmacy_storemast_edit->LASTISSDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_edit->LASTISSDT->ReadOnly && !$pharmacy_storemast_edit->LASTISSDT->Disabled && !isset($pharmacy_storemast_edit->LASTISSDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_edit->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastedit", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_storemast_edit->LASTISSDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label id="elh_pharmacy_storemast_DRID" for="x_DRID" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->DRID->caption() ?><?php echo $pharmacy_storemast_edit->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->DRID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DRID">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DRID"><?php echo EmptyValue(strval($pharmacy_storemast_edit->DRID->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_edit->DRID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_edit->DRID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_edit->DRID->ReadOnly || $pharmacy_storemast_edit->DRID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DRID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_edit->DRID->Lookup->getParamTag($pharmacy_storemast_edit, "p_x_DRID") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_edit->DRID->displayValueSeparatorAttribute() ?>" name="x_DRID" id="x_DRID" value="<?php echo $pharmacy_storemast_edit->DRID->CurrentValue ?>"<?php echo $pharmacy_storemast_edit->DRID->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->DRID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_storemast_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->MFRCODE->caption() ?><?php echo $pharmacy_storemast_edit->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MFRCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_MFRCODE"><?php echo EmptyValue(strval($pharmacy_storemast_edit->MFRCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_edit->MFRCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_edit->MFRCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_edit->MFRCODE->ReadOnly || $pharmacy_storemast_edit->MFRCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_MFRCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_edit->MFRCODE->Lookup->getParamTag($pharmacy_storemast_edit, "p_x_MFRCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_edit->MFRCODE->displayValueSeparatorAttribute() ?>" name="x_MFRCODE" id="x_MFRCODE" value="<?php echo $pharmacy_storemast_edit->MFRCODE->CurrentValue ?>"<?php echo $pharmacy_storemast_edit->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->COMBCODE->Visible) { // COMBCODE ?>
	<div id="r_COMBCODE" class="form-group row">
		<label id="elh_pharmacy_storemast_COMBCODE" for="x_COMBCODE" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->COMBCODE->caption() ?><?php echo $pharmacy_storemast_edit->COMBCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBCODE">
<?php $pharmacy_storemast_edit->COMBCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?php echo EmptyValue(strval($pharmacy_storemast_edit->COMBCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_edit->COMBCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_edit->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_edit->COMBCODE->ReadOnly || $pharmacy_storemast_edit->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_edit->COMBCODE->Lookup->getParamTag($pharmacy_storemast_edit, "p_x_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_edit->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?php echo $pharmacy_storemast_edit->COMBCODE->CurrentValue ?>"<?php echo $pharmacy_storemast_edit->COMBCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->COMBCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->GENCODE->Visible) { // GENCODE ?>
	<div id="r_GENCODE" class="form-group row">
		<label id="elh_pharmacy_storemast_GENCODE" for="x_GENCODE" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->GENCODE->caption() ?><?php echo $pharmacy_storemast_edit->GENCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENCODE">
<?php $pharmacy_storemast_edit->GENCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?php echo EmptyValue(strval($pharmacy_storemast_edit->GENCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_edit->GENCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_edit->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_edit->GENCODE->ReadOnly || $pharmacy_storemast_edit->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_edit->GENCODE->Lookup->getParamTag($pharmacy_storemast_edit, "p_x_GENCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_edit->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?php echo $pharmacy_storemast_edit->GENCODE->CurrentValue ?>"<?php echo $pharmacy_storemast_edit->GENCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->GENCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->STRENGTH->Visible) { // STRENGTH ?>
	<div id="r_STRENGTH" class="form-group row">
		<label id="elh_pharmacy_storemast_STRENGTH" for="x_STRENGTH" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->STRENGTH->caption() ?><?php echo $pharmacy_storemast_edit->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_storemast_STRENGTH">
<input type="text" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->STRENGTH->EditValue ?>"<?php echo $pharmacy_storemast_edit->STRENGTH->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->STRENGTH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->UNIT->Visible) { // UNIT ?>
	<div id="r_UNIT" class="form-group row">
		<label id="elh_pharmacy_storemast_UNIT" for="x_UNIT" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->UNIT->caption() ?><?php echo $pharmacy_storemast_edit->UNIT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->UNIT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UNIT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_UNIT" data-value-separator="<?php echo $pharmacy_storemast_edit->UNIT->displayValueSeparatorAttribute() ?>" id="x_UNIT" name="x_UNIT"<?php echo $pharmacy_storemast_edit->UNIT->editAttributes() ?>>
			<?php echo $pharmacy_storemast_edit->UNIT->selectOptionListHtml("x_UNIT") ?>
		</select>
</div>
</span>
<?php echo $pharmacy_storemast_edit->UNIT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->FORMULARY->Visible) { // FORMULARY ?>
	<div id="r_FORMULARY" class="form-group row">
		<label id="elh_pharmacy_storemast_FORMULARY" for="x_FORMULARY" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->FORMULARY->caption() ?><?php echo $pharmacy_storemast_edit->FORMULARY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->FORMULARY->cellAttributes() ?>>
<span id="el_pharmacy_storemast_FORMULARY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-value-separator="<?php echo $pharmacy_storemast_edit->FORMULARY->displayValueSeparatorAttribute() ?>" id="x_FORMULARY" name="x_FORMULARY"<?php echo $pharmacy_storemast_edit->FORMULARY->editAttributes() ?>>
			<?php echo $pharmacy_storemast_edit->FORMULARY->selectOptionListHtml("x_FORMULARY") ?>
		</select>
</div>
</span>
<?php echo $pharmacy_storemast_edit->FORMULARY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->RACKNO->Visible) { // RACKNO ?>
	<div id="r_RACKNO" class="form-group row">
		<label id="elh_pharmacy_storemast_RACKNO" for="x_RACKNO" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->RACKNO->caption() ?><?php echo $pharmacy_storemast_edit->RACKNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->RACKNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RACKNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->RACKNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->RACKNO->EditValue ?>"<?php echo $pharmacy_storemast_edit->RACKNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->RACKNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->SUPPNAME->Visible) { // SUPPNAME ?>
	<div id="r_SUPPNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_SUPPNAME" for="x_SUPPNAME" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->SUPPNAME->caption() ?><?php echo $pharmacy_storemast_edit->SUPPNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->SUPPNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SUPPNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SUPPNAME"><?php echo EmptyValue(strval($pharmacy_storemast_edit->SUPPNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_edit->SUPPNAME->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_edit->SUPPNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_edit->SUPPNAME->ReadOnly || $pharmacy_storemast_edit->SUPPNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_SUPPNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_edit->SUPPNAME->Lookup->getParamTag($pharmacy_storemast_edit, "p_x_SUPPNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SUPPNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_edit->SUPPNAME->displayValueSeparatorAttribute() ?>" name="x_SUPPNAME" id="x_SUPPNAME" value="<?php echo $pharmacy_storemast_edit->SUPPNAME->CurrentValue ?>"<?php echo $pharmacy_storemast_edit->SUPPNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->SUPPNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->COMBNAME->Visible) { // COMBNAME ?>
	<div id="r_COMBNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_COMBNAME" for="x_COMBNAME" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->COMBNAME->caption() ?><?php echo $pharmacy_storemast_edit->COMBNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->COMBNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?php echo EmptyValue(strval($pharmacy_storemast_edit->COMBNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_edit->COMBNAME->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_edit->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_edit->COMBNAME->ReadOnly || $pharmacy_storemast_edit->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_edit->COMBNAME->Lookup->getParamTag($pharmacy_storemast_edit, "p_x_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_edit->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?php echo $pharmacy_storemast_edit->COMBNAME->CurrentValue ?>"<?php echo $pharmacy_storemast_edit->COMBNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->COMBNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->GENERICNAME->Visible) { // GENERICNAME ?>
	<div id="r_GENERICNAME" class="form-group row">
		<label id="elh_pharmacy_storemast_GENERICNAME" for="x_GENERICNAME" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->GENERICNAME->caption() ?><?php echo $pharmacy_storemast_edit->GENERICNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->GENERICNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENERICNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?php echo EmptyValue(strval($pharmacy_storemast_edit->GENERICNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_edit->GENERICNAME->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_edit->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_edit->GENERICNAME->ReadOnly || $pharmacy_storemast_edit->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_edit->GENERICNAME->Lookup->getParamTag($pharmacy_storemast_edit, "p_x_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_edit->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?php echo $pharmacy_storemast_edit->GENERICNAME->CurrentValue ?>"<?php echo $pharmacy_storemast_edit->GENERICNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->GENERICNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->REMARK->Visible) { // REMARK ?>
	<div id="r_REMARK" class="form-group row">
		<label id="elh_pharmacy_storemast_REMARK" for="x_REMARK" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->REMARK->caption() ?><?php echo $pharmacy_storemast_edit->REMARK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->REMARK->cellAttributes() ?>>
<span id="el_pharmacy_storemast_REMARK">
<input type="text" data-table="pharmacy_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->REMARK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->REMARK->EditValue ?>"<?php echo $pharmacy_storemast_edit->REMARK->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->REMARK->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->TEMP->Visible) { // TEMP ?>
	<div id="r_TEMP" class="form-group row">
		<label id="elh_pharmacy_storemast_TEMP" for="x_TEMP" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->TEMP->caption() ?><?php echo $pharmacy_storemast_edit->TEMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->TEMP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TEMP">
<input type="text" data-table="pharmacy_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->TEMP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->TEMP->EditValue ?>"<?php echo $pharmacy_storemast_edit->TEMP->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->TEMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_storemast_id" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->id->caption() ?><?php echo $pharmacy_storemast_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->id->cellAttributes() ?>>
<span id="el_pharmacy_storemast_id">
<span<?php echo $pharmacy_storemast_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_storemast_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_storemast_edit->id->CurrentValue) ?>">
<?php echo $pharmacy_storemast_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_pharmacy_storemast_PurValue" for="x_PurValue" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->PurValue->caption() ?><?php echo $pharmacy_storemast_edit->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PurValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->PurValue->EditValue ?>"<?php echo $pharmacy_storemast_edit->PurValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_storemast_PSGST" for="x_PSGST" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->PSGST->caption() ?><?php echo $pharmacy_storemast_edit->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->PSGST->EditValue ?>"<?php echo $pharmacy_storemast_edit->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_storemast_PCGST" for="x_PCGST" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->PCGST->caption() ?><?php echo $pharmacy_storemast_edit->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->PCGST->EditValue ?>"<?php echo $pharmacy_storemast_edit->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->SaleValue->Visible) { // SaleValue ?>
	<div id="r_SaleValue" class="form-group row">
		<label id="elh_pharmacy_storemast_SaleValue" for="x_SaleValue" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->SaleValue->caption() ?><?php echo $pharmacy_storemast_edit->SaleValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->SaleValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->SaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->SaleValue->EditValue ?>"<?php echo $pharmacy_storemast_edit->SaleValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->SaleValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_storemast_SSGST" for="x_SSGST" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->SSGST->caption() ?><?php echo $pharmacy_storemast_edit->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->SSGST->EditValue ?>"<?php echo $pharmacy_storemast_edit->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_storemast_SCGST" for="x_SCGST" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->SCGST->caption() ?><?php echo $pharmacy_storemast_edit->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->SCGST->EditValue ?>"<?php echo $pharmacy_storemast_edit->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_edit->SaleRate->Visible) { // SaleRate ?>
	<div id="r_SaleRate" class="form-group row">
		<label id="elh_pharmacy_storemast_SaleRate" for="x_SaleRate" class="<?php echo $pharmacy_storemast_edit->LeftColumnClass ?>"><?php echo $pharmacy_storemast_edit->SaleRate->caption() ?><?php echo $pharmacy_storemast_edit->SaleRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_storemast_edit->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_edit->SaleRate->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleRate">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_edit->SaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_edit->SaleRate->EditValue ?>"<?php echo $pharmacy_storemast_edit->SaleRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_storemast_edit->SaleRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_storemast_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_storemast_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_storemast_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_storemast_edit->showPageFooter();
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
$pharmacy_storemast_edit->terminate();
?>