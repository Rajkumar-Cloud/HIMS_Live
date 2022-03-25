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
$pharmacy_batchmas_add = new pharmacy_batchmas_add();

// Run the page
$pharmacy_batchmas_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_batchmas_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_batchmasadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_batchmasadd = currentForm = new ew.Form("fpharmacy_batchmasadd", "add");

	// Validate form
	fpharmacy_batchmasadd.validate = function() {
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
			<?php if ($pharmacy_batchmas_add->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->PRC->caption(), $pharmacy_batchmas_add->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->PrName->caption(), $pharmacy_batchmas_add->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->BATCHNO->caption(), $pharmacy_batchmas_add->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->BATCH->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->BATCH->caption(), $pharmacy_batchmas_add->BATCH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->MFRCODE->caption(), $pharmacy_batchmas_add->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->EXPDT->caption(), $pharmacy_batchmas_add->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->EXPDT->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->PRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_PRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->PRCODE->caption(), $pharmacy_batchmas_add->PRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->OQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->OQ->caption(), $pharmacy_batchmas_add->OQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->OQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->RQ->Required) { ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->RQ->caption(), $pharmacy_batchmas_add->RQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->RQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->FRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_FRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->FRQ->caption(), $pharmacy_batchmas_add->FRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->FRQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->IQ->caption(), $pharmacy_batchmas_add->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->IQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->MRQ->caption(), $pharmacy_batchmas_add->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->MRQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->MRP->caption(), $pharmacy_batchmas_add->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->MRP->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->UR->caption(), $pharmacy_batchmas_add->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->UR->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->PC->caption(), $pharmacy_batchmas_add->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->OLDRT->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDRT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->OLDRT->caption(), $pharmacy_batchmas_add->OLDRT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDRT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->OLDRT->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->TEMPMRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_TEMPMRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->TEMPMRQ->caption(), $pharmacy_batchmas_add->TEMPMRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TEMPMRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->TEMPMRQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->TAXP->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->TAXP->caption(), $pharmacy_batchmas_add->TAXP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->TAXP->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->OLDRATE->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDRATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->OLDRATE->caption(), $pharmacy_batchmas_add->OLDRATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDRATE");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->OLDRATE->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->NEWRATE->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWRATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->NEWRATE->caption(), $pharmacy_batchmas_add->NEWRATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWRATE");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->NEWRATE->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->OTEMPMRA->Required) { ?>
				elm = this.getElements("x" + infix + "_OTEMPMRA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->OTEMPMRA->caption(), $pharmacy_batchmas_add->OTEMPMRA->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OTEMPMRA");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->OTEMPMRA->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->ACTIVESTATUS->Required) { ?>
				elm = this.getElements("x" + infix + "_ACTIVESTATUS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->ACTIVESTATUS->caption(), $pharmacy_batchmas_add->ACTIVESTATUS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->PSGST->caption(), $pharmacy_batchmas_add->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->PCGST->caption(), $pharmacy_batchmas_add->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->SSGST->caption(), $pharmacy_batchmas_add->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->SCGST->caption(), $pharmacy_batchmas_add->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->RT->caption(), $pharmacy_batchmas_add->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->RT->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->BRCODE->caption(), $pharmacy_batchmas_add->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->HospID->caption(), $pharmacy_batchmas_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->HospID->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_add->UM->Required) { ?>
				elm = this.getElements("x" + infix + "_UM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->UM->caption(), $pharmacy_batchmas_add->UM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->GENNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->GENNAME->caption(), $pharmacy_batchmas_add->GENNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_add->BILLDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_add->BILLDATE->caption(), $pharmacy_batchmas_add->BILLDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BILLDATE");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_add->BILLDATE->errorMessage()) ?>");

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
	fpharmacy_batchmasadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_batchmasadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_batchmasadd.lists["x_PrName"] = <?php echo $pharmacy_batchmas_add->PrName->Lookup->toClientList($pharmacy_batchmas_add) ?>;
	fpharmacy_batchmasadd.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_add->PrName->lookupOptions()) ?>;
	fpharmacy_batchmasadd.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_batchmasadd.lists["x_BRCODE"] = <?php echo $pharmacy_batchmas_add->BRCODE->Lookup->toClientList($pharmacy_batchmas_add) ?>;
	fpharmacy_batchmasadd.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_batchmas_add->BRCODE->lookupOptions()) ?>;
	loadjs.done("fpharmacy_batchmasadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_batchmas_add->showPageHeader(); ?>
<?php
$pharmacy_batchmas_add->showMessage();
?>
<form name="fpharmacy_batchmasadd" id="fpharmacy_batchmasadd" class="<?php echo $pharmacy_batchmas_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_batchmas_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_batchmas_add->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_batchmas_PRC" for="x_PRC" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->PRC->caption() ?><?php echo $pharmacy_batchmas_add->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->PRC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->PRC->EditValue ?>"<?php echo $pharmacy_batchmas_add->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_pharmacy_batchmas_PrName" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->PrName->caption() ?><?php echo $pharmacy_batchmas_add->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->PrName->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PrName">
<?php
$onchange = $pharmacy_batchmas_add->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_batchmas_add->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName">
	<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas_add->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas_add->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas_add->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas_add->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_batchmasadd"], function() {
	fpharmacy_batchmasadd.createAutoSuggest({"id":"x_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_batchmas_add->PrName->Lookup->getParamTag($pharmacy_batchmas_add, "p_x_PrName") ?>
</span>
<?php echo $pharmacy_batchmas_add->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_pharmacy_batchmas_BATCHNO" for="x_BATCHNO" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->BATCHNO->caption() ?><?php echo $pharmacy_batchmas_add->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCHNO">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas_add->BATCHNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->BATCH->Visible) { // BATCH ?>
	<div id="r_BATCH" class="form-group row">
		<label id="elh_pharmacy_batchmas_BATCH" for="x_BATCH" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->BATCH->caption() ?><?php echo $pharmacy_batchmas_add->BATCH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->BATCH->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCH">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->BATCH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->BATCH->EditValue ?>"<?php echo $pharmacy_batchmas_add->BATCH->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->BATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_batchmas_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->MFRCODE->caption() ?><?php echo $pharmacy_batchmas_add->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MFRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_add->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_pharmacy_batchmas_EXPDT" for="x_EXPDT" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->EXPDT->caption() ?><?php echo $pharmacy_batchmas_add->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_EXPDT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas_add->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_add->EXPDT->ReadOnly && !$pharmacy_batchmas_add->EXPDT->Disabled && !isset($pharmacy_batchmas_add->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_add->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmasadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmasadd", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_batchmas_add->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label id="elh_pharmacy_batchmas_PRCODE" for="x_PRCODE" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->PRCODE->caption() ?><?php echo $pharmacy_batchmas_add->PRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_add->PRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->PRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_OQ" for="x_OQ" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->OQ->caption() ?><?php echo $pharmacy_batchmas_add->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->OQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x_OQ" id="x_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->OQ->EditValue ?>"<?php echo $pharmacy_batchmas_add->OQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_RQ" for="x_RQ" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->RQ->caption() ?><?php echo $pharmacy_batchmas_add->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->RQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->RQ->EditValue ?>"<?php echo $pharmacy_batchmas_add->RQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->FRQ->Visible) { // FRQ ?>
	<div id="r_FRQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_FRQ" for="x_FRQ" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->FRQ->caption() ?><?php echo $pharmacy_batchmas_add->FRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->FRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_FRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x_FRQ" id="x_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas_add->FRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->FRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_IQ" for="x_IQ" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->IQ->caption() ?><?php echo $pharmacy_batchmas_add->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->IQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_IQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->IQ->EditValue ?>"<?php echo $pharmacy_batchmas_add->IQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_MRQ" for="x_MRQ" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->MRQ->caption() ?><?php echo $pharmacy_batchmas_add->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas_add->MRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_batchmas_MRP" for="x_MRP" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->MRP->caption() ?><?php echo $pharmacy_batchmas_add->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->MRP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x_MRP" id="x_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->MRP->EditValue ?>"<?php echo $pharmacy_batchmas_add->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_pharmacy_batchmas_UR" for="x_UR" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->UR->caption() ?><?php echo $pharmacy_batchmas_add->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->UR->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UR">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x_UR" id="x_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->UR->EditValue ?>"<?php echo $pharmacy_batchmas_add->UR->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_batchmas_PC" for="x_PC" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->PC->caption() ?><?php echo $pharmacy_batchmas_add->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->PC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->PC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->PC->EditValue ?>"<?php echo $pharmacy_batchmas_add->PC->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->OLDRT->Visible) { // OLDRT ?>
	<div id="r_OLDRT" class="form-group row">
		<label id="elh_pharmacy_batchmas_OLDRT" for="x_OLDRT" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->OLDRT->caption() ?><?php echo $pharmacy_batchmas_add->OLDRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->OLDRT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OLDRT" name="x_OLDRT" id="x_OLDRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->OLDRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->OLDRT->EditValue ?>"<?php echo $pharmacy_batchmas_add->OLDRT->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->OLDRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<div id="r_TEMPMRQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_TEMPMRQ" for="x_TEMPMRQ" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->TEMPMRQ->caption() ?><?php echo $pharmacy_batchmas_add->TEMPMRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->TEMPMRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TEMPMRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_TEMPMRQ" name="x_TEMPMRQ" id="x_TEMPMRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->TEMPMRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->TEMPMRQ->EditValue ?>"<?php echo $pharmacy_batchmas_add->TEMPMRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->TEMPMRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_pharmacy_batchmas_TAXP" for="x_TAXP" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->TAXP->caption() ?><?php echo $pharmacy_batchmas_add->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TAXP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->TAXP->EditValue ?>"<?php echo $pharmacy_batchmas_add->TAXP->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->OLDRATE->Visible) { // OLDRATE ?>
	<div id="r_OLDRATE" class="form-group row">
		<label id="elh_pharmacy_batchmas_OLDRATE" for="x_OLDRATE" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->OLDRATE->caption() ?><?php echo $pharmacy_batchmas_add->OLDRATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->OLDRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OLDRATE" name="x_OLDRATE" id="x_OLDRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->OLDRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->OLDRATE->EditValue ?>"<?php echo $pharmacy_batchmas_add->OLDRATE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->OLDRATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->NEWRATE->Visible) { // NEWRATE ?>
	<div id="r_NEWRATE" class="form-group row">
		<label id="elh_pharmacy_batchmas_NEWRATE" for="x_NEWRATE" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->NEWRATE->caption() ?><?php echo $pharmacy_batchmas_add->NEWRATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->NEWRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_NEWRATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_NEWRATE" name="x_NEWRATE" id="x_NEWRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->NEWRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->NEWRATE->EditValue ?>"<?php echo $pharmacy_batchmas_add->NEWRATE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->NEWRATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<div id="r_OTEMPMRA" class="form-group row">
		<label id="elh_pharmacy_batchmas_OTEMPMRA" for="x_OTEMPMRA" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->OTEMPMRA->caption() ?><?php echo $pharmacy_batchmas_add->OTEMPMRA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->OTEMPMRA->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OTEMPMRA">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OTEMPMRA" name="x_OTEMPMRA" id="x_OTEMPMRA" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->OTEMPMRA->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->OTEMPMRA->EditValue ?>"<?php echo $pharmacy_batchmas_add->OTEMPMRA->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->OTEMPMRA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<div id="r_ACTIVESTATUS" class="form-group row">
		<label id="elh_pharmacy_batchmas_ACTIVESTATUS" for="x_ACTIVESTATUS" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->ACTIVESTATUS->caption() ?><?php echo $pharmacy_batchmas_add->ACTIVESTATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_ACTIVESTATUS">
<input type="text" data-table="pharmacy_batchmas" data-field="x_ACTIVESTATUS" name="x_ACTIVESTATUS" id="x_ACTIVESTATUS" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->ACTIVESTATUS->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->ACTIVESTATUS->EditValue ?>"<?php echo $pharmacy_batchmas_add->ACTIVESTATUS->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->ACTIVESTATUS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_PSGST" for="x_PSGST" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->PSGST->caption() ?><?php echo $pharmacy_batchmas_add->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->PSGST->EditValue ?>"<?php echo $pharmacy_batchmas_add->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_PCGST" for="x_PCGST" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->PCGST->caption() ?><?php echo $pharmacy_batchmas_add->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->PCGST->EditValue ?>"<?php echo $pharmacy_batchmas_add->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_SSGST" for="x_SSGST" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->SSGST->caption() ?><?php echo $pharmacy_batchmas_add->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas_add->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_SCGST" for="x_SCGST" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->SCGST->caption() ?><?php echo $pharmacy_batchmas_add->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas_add->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_pharmacy_batchmas_RT" for="x_RT" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->RT->caption() ?><?php echo $pharmacy_batchmas_add->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->RT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x_RT" id="x_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->RT->EditValue ?>"<?php echo $pharmacy_batchmas_add->RT->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_pharmacy_batchmas_BRCODE" for="x_BRCODE" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->BRCODE->caption() ?><?php echo $pharmacy_batchmas_add->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BRCODE">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas_add->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas_add->BRCODE->ViewValue ?></button>
		<div id="dsl_x_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas_add->BRCODE->radioButtonListHtml(TRUE, "x_BRCODE") ?>
			</div><!-- /.ew-items -->
		</div><!-- /.dropdown-menu -->
		<div id="tp_x_BRCODE" class="ew-template"><input type="radio" class="custom-control-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas_add->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="{value}"<?php echo $pharmacy_batchmas_add->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group -->
	<?php if (!$pharmacy_batchmas_add->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fas fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list -->
<?php echo $pharmacy_batchmas_add->BRCODE->Lookup->getParamTag($pharmacy_batchmas_add, "p_x_BRCODE") ?>
</span>
<?php echo $pharmacy_batchmas_add->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_pharmacy_batchmas_HospID" for="x_HospID" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->HospID->caption() ?><?php echo $pharmacy_batchmas_add->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->HospID->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_HospID">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->HospID->EditValue ?>"<?php echo $pharmacy_batchmas_add->HospID->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label id="elh_pharmacy_batchmas_UM" for="x_UM" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->UM->caption() ?><?php echo $pharmacy_batchmas_add->UM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->UM->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UM">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->UM->EditValue ?>"<?php echo $pharmacy_batchmas_add->UM->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->UM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_pharmacy_batchmas_GENNAME" for="x_GENNAME" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->GENNAME->caption() ?><?php echo $pharmacy_batchmas_add->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_GENNAME">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas_add->GENNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_add->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_add->BILLDATE->Visible) { // BILLDATE ?>
	<div id="r_BILLDATE" class="form-group row">
		<label id="elh_pharmacy_batchmas_BILLDATE" for="x_BILLDATE" class="<?php echo $pharmacy_batchmas_add->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_add->BILLDATE->caption() ?><?php echo $pharmacy_batchmas_add->BILLDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_add->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_add->BILLDATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BILLDATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_add->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_add->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas_add->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_add->BILLDATE->ReadOnly && !$pharmacy_batchmas_add->BILLDATE->Disabled && !isset($pharmacy_batchmas_add->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_add->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmasadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmasadd", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_batchmas_add->BILLDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_batchmas_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_batchmas_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_batchmas_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_batchmas_add->showPageFooter();
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
$pharmacy_batchmas_add->terminate();
?>