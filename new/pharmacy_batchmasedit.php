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
$pharmacy_batchmas_edit = new pharmacy_batchmas_edit();

// Run the page
$pharmacy_batchmas_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_batchmas_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_batchmasedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_batchmasedit = currentForm = new ew.Form("fpharmacy_batchmasedit", "edit");

	// Validate form
	fpharmacy_batchmasedit.validate = function() {
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
			<?php if ($pharmacy_batchmas_edit->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->PRC->caption(), $pharmacy_batchmas_edit->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->PrName->caption(), $pharmacy_batchmas_edit->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->BATCHNO->caption(), $pharmacy_batchmas_edit->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->BATCH->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->BATCH->caption(), $pharmacy_batchmas_edit->BATCH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->MFRCODE->caption(), $pharmacy_batchmas_edit->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->EXPDT->caption(), $pharmacy_batchmas_edit->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->EXPDT->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->PRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_PRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->PRCODE->caption(), $pharmacy_batchmas_edit->PRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->OQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->OQ->caption(), $pharmacy_batchmas_edit->OQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->OQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->RQ->Required) { ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->RQ->caption(), $pharmacy_batchmas_edit->RQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->RQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->FRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_FRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->FRQ->caption(), $pharmacy_batchmas_edit->FRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->FRQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->IQ->caption(), $pharmacy_batchmas_edit->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->IQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->MRQ->caption(), $pharmacy_batchmas_edit->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->MRQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->MRP->caption(), $pharmacy_batchmas_edit->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->MRP->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->UR->caption(), $pharmacy_batchmas_edit->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->UR->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->PC->caption(), $pharmacy_batchmas_edit->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->OLDRT->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDRT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->OLDRT->caption(), $pharmacy_batchmas_edit->OLDRT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDRT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->OLDRT->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->TEMPMRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_TEMPMRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->TEMPMRQ->caption(), $pharmacy_batchmas_edit->TEMPMRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TEMPMRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->TEMPMRQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->TAXP->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->TAXP->caption(), $pharmacy_batchmas_edit->TAXP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->TAXP->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->OLDRATE->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDRATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->OLDRATE->caption(), $pharmacy_batchmas_edit->OLDRATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDRATE");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->OLDRATE->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->NEWRATE->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWRATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->NEWRATE->caption(), $pharmacy_batchmas_edit->NEWRATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWRATE");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->NEWRATE->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->OTEMPMRA->Required) { ?>
				elm = this.getElements("x" + infix + "_OTEMPMRA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->OTEMPMRA->caption(), $pharmacy_batchmas_edit->OTEMPMRA->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OTEMPMRA");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->OTEMPMRA->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->ACTIVESTATUS->Required) { ?>
				elm = this.getElements("x" + infix + "_ACTIVESTATUS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->ACTIVESTATUS->caption(), $pharmacy_batchmas_edit->ACTIVESTATUS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->id->caption(), $pharmacy_batchmas_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->PSGST->caption(), $pharmacy_batchmas_edit->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->PCGST->caption(), $pharmacy_batchmas_edit->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->SSGST->caption(), $pharmacy_batchmas_edit->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->SCGST->caption(), $pharmacy_batchmas_edit->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->RT->caption(), $pharmacy_batchmas_edit->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->RT->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->BRCODE->caption(), $pharmacy_batchmas_edit->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->HospID->caption(), $pharmacy_batchmas_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->HospID->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_edit->UM->Required) { ?>
				elm = this.getElements("x" + infix + "_UM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->UM->caption(), $pharmacy_batchmas_edit->UM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->GENNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->GENNAME->caption(), $pharmacy_batchmas_edit->GENNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_edit->BILLDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_edit->BILLDATE->caption(), $pharmacy_batchmas_edit->BILLDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BILLDATE");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_edit->BILLDATE->errorMessage()) ?>");

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
	fpharmacy_batchmasedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_batchmasedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_batchmasedit.lists["x_PrName"] = <?php echo $pharmacy_batchmas_edit->PrName->Lookup->toClientList($pharmacy_batchmas_edit) ?>;
	fpharmacy_batchmasedit.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_edit->PrName->lookupOptions()) ?>;
	fpharmacy_batchmasedit.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_batchmasedit.lists["x_BRCODE"] = <?php echo $pharmacy_batchmas_edit->BRCODE->Lookup->toClientList($pharmacy_batchmas_edit) ?>;
	fpharmacy_batchmasedit.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_batchmas_edit->BRCODE->lookupOptions()) ?>;
	loadjs.done("fpharmacy_batchmasedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_batchmas_edit->showPageHeader(); ?>
<?php
$pharmacy_batchmas_edit->showMessage();
?>
<form name="fpharmacy_batchmasedit" id="fpharmacy_batchmasedit" class="<?php echo $pharmacy_batchmas_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_batchmas_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_batchmas_edit->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_batchmas_PRC" for="x_PRC" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->PRC->caption() ?><?php echo $pharmacy_batchmas_edit->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->PRC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->PRC->EditValue ?>"<?php echo $pharmacy_batchmas_edit->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_pharmacy_batchmas_PrName" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->PrName->caption() ?><?php echo $pharmacy_batchmas_edit->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->PrName->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PrName">
<?php
$onchange = $pharmacy_batchmas_edit->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_batchmas_edit->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName">
	<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas_edit->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas_edit->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas_edit->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas_edit->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_batchmasedit"], function() {
	fpharmacy_batchmasedit.createAutoSuggest({"id":"x_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_batchmas_edit->PrName->Lookup->getParamTag($pharmacy_batchmas_edit, "p_x_PrName") ?>
</span>
<?php echo $pharmacy_batchmas_edit->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_pharmacy_batchmas_BATCHNO" for="x_BATCHNO" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->BATCHNO->caption() ?><?php echo $pharmacy_batchmas_edit->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCHNO">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas_edit->BATCHNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->BATCH->Visible) { // BATCH ?>
	<div id="r_BATCH" class="form-group row">
		<label id="elh_pharmacy_batchmas_BATCH" for="x_BATCH" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->BATCH->caption() ?><?php echo $pharmacy_batchmas_edit->BATCH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->BATCH->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCH">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->BATCH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->BATCH->EditValue ?>"<?php echo $pharmacy_batchmas_edit->BATCH->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->BATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_batchmas_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->MFRCODE->caption() ?><?php echo $pharmacy_batchmas_edit->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MFRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_edit->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_pharmacy_batchmas_EXPDT" for="x_EXPDT" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->EXPDT->caption() ?><?php echo $pharmacy_batchmas_edit->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_EXPDT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas_edit->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_edit->EXPDT->ReadOnly && !$pharmacy_batchmas_edit->EXPDT->Disabled && !isset($pharmacy_batchmas_edit->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_edit->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmasedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmasedit", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_batchmas_edit->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label id="elh_pharmacy_batchmas_PRCODE" for="x_PRCODE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->PRCODE->caption() ?><?php echo $pharmacy_batchmas_edit->PRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_edit->PRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->PRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_OQ" for="x_OQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->OQ->caption() ?><?php echo $pharmacy_batchmas_edit->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->OQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x_OQ" id="x_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->OQ->EditValue ?>"<?php echo $pharmacy_batchmas_edit->OQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_RQ" for="x_RQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->RQ->caption() ?><?php echo $pharmacy_batchmas_edit->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->RQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->RQ->EditValue ?>"<?php echo $pharmacy_batchmas_edit->RQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->FRQ->Visible) { // FRQ ?>
	<div id="r_FRQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_FRQ" for="x_FRQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->FRQ->caption() ?><?php echo $pharmacy_batchmas_edit->FRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->FRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_FRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x_FRQ" id="x_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas_edit->FRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->FRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_IQ" for="x_IQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->IQ->caption() ?><?php echo $pharmacy_batchmas_edit->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->IQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_IQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->IQ->EditValue ?>"<?php echo $pharmacy_batchmas_edit->IQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_MRQ" for="x_MRQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->MRQ->caption() ?><?php echo $pharmacy_batchmas_edit->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas_edit->MRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_batchmas_MRP" for="x_MRP" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->MRP->caption() ?><?php echo $pharmacy_batchmas_edit->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->MRP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x_MRP" id="x_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->MRP->EditValue ?>"<?php echo $pharmacy_batchmas_edit->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_pharmacy_batchmas_UR" for="x_UR" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->UR->caption() ?><?php echo $pharmacy_batchmas_edit->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->UR->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UR">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x_UR" id="x_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->UR->EditValue ?>"<?php echo $pharmacy_batchmas_edit->UR->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_batchmas_PC" for="x_PC" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->PC->caption() ?><?php echo $pharmacy_batchmas_edit->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->PC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->PC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->PC->EditValue ?>"<?php echo $pharmacy_batchmas_edit->PC->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->OLDRT->Visible) { // OLDRT ?>
	<div id="r_OLDRT" class="form-group row">
		<label id="elh_pharmacy_batchmas_OLDRT" for="x_OLDRT" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->OLDRT->caption() ?><?php echo $pharmacy_batchmas_edit->OLDRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->OLDRT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OLDRT" name="x_OLDRT" id="x_OLDRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->OLDRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->OLDRT->EditValue ?>"<?php echo $pharmacy_batchmas_edit->OLDRT->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->OLDRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<div id="r_TEMPMRQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_TEMPMRQ" for="x_TEMPMRQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->TEMPMRQ->caption() ?><?php echo $pharmacy_batchmas_edit->TEMPMRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->TEMPMRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TEMPMRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_TEMPMRQ" name="x_TEMPMRQ" id="x_TEMPMRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->TEMPMRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->TEMPMRQ->EditValue ?>"<?php echo $pharmacy_batchmas_edit->TEMPMRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->TEMPMRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_pharmacy_batchmas_TAXP" for="x_TAXP" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->TAXP->caption() ?><?php echo $pharmacy_batchmas_edit->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TAXP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->TAXP->EditValue ?>"<?php echo $pharmacy_batchmas_edit->TAXP->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->OLDRATE->Visible) { // OLDRATE ?>
	<div id="r_OLDRATE" class="form-group row">
		<label id="elh_pharmacy_batchmas_OLDRATE" for="x_OLDRATE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->OLDRATE->caption() ?><?php echo $pharmacy_batchmas_edit->OLDRATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->OLDRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OLDRATE" name="x_OLDRATE" id="x_OLDRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->OLDRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->OLDRATE->EditValue ?>"<?php echo $pharmacy_batchmas_edit->OLDRATE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->OLDRATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->NEWRATE->Visible) { // NEWRATE ?>
	<div id="r_NEWRATE" class="form-group row">
		<label id="elh_pharmacy_batchmas_NEWRATE" for="x_NEWRATE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->NEWRATE->caption() ?><?php echo $pharmacy_batchmas_edit->NEWRATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->NEWRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_NEWRATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_NEWRATE" name="x_NEWRATE" id="x_NEWRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->NEWRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->NEWRATE->EditValue ?>"<?php echo $pharmacy_batchmas_edit->NEWRATE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->NEWRATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<div id="r_OTEMPMRA" class="form-group row">
		<label id="elh_pharmacy_batchmas_OTEMPMRA" for="x_OTEMPMRA" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->OTEMPMRA->caption() ?><?php echo $pharmacy_batchmas_edit->OTEMPMRA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->OTEMPMRA->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OTEMPMRA">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OTEMPMRA" name="x_OTEMPMRA" id="x_OTEMPMRA" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->OTEMPMRA->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->OTEMPMRA->EditValue ?>"<?php echo $pharmacy_batchmas_edit->OTEMPMRA->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->OTEMPMRA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<div id="r_ACTIVESTATUS" class="form-group row">
		<label id="elh_pharmacy_batchmas_ACTIVESTATUS" for="x_ACTIVESTATUS" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->ACTIVESTATUS->caption() ?><?php echo $pharmacy_batchmas_edit->ACTIVESTATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_ACTIVESTATUS">
<input type="text" data-table="pharmacy_batchmas" data-field="x_ACTIVESTATUS" name="x_ACTIVESTATUS" id="x_ACTIVESTATUS" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->ACTIVESTATUS->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->ACTIVESTATUS->EditValue ?>"<?php echo $pharmacy_batchmas_edit->ACTIVESTATUS->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->ACTIVESTATUS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_batchmas_id" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->id->caption() ?><?php echo $pharmacy_batchmas_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->id->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_id">
<span<?php echo $pharmacy_batchmas_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_batchmas_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_batchmas_edit->id->CurrentValue) ?>">
<?php echo $pharmacy_batchmas_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_PSGST" for="x_PSGST" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->PSGST->caption() ?><?php echo $pharmacy_batchmas_edit->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->PSGST->EditValue ?>"<?php echo $pharmacy_batchmas_edit->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_PCGST" for="x_PCGST" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->PCGST->caption() ?><?php echo $pharmacy_batchmas_edit->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->PCGST->EditValue ?>"<?php echo $pharmacy_batchmas_edit->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_SSGST" for="x_SSGST" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->SSGST->caption() ?><?php echo $pharmacy_batchmas_edit->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas_edit->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_SCGST" for="x_SCGST" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->SCGST->caption() ?><?php echo $pharmacy_batchmas_edit->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas_edit->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_pharmacy_batchmas_RT" for="x_RT" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->RT->caption() ?><?php echo $pharmacy_batchmas_edit->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->RT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x_RT" id="x_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->RT->EditValue ?>"<?php echo $pharmacy_batchmas_edit->RT->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_pharmacy_batchmas_BRCODE" for="x_BRCODE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->BRCODE->caption() ?><?php echo $pharmacy_batchmas_edit->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BRCODE">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas_edit->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas_edit->BRCODE->ViewValue ?></button>
		<div id="dsl_x_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas_edit->BRCODE->radioButtonListHtml(TRUE, "x_BRCODE") ?>
			</div><!-- /.ew-items -->
		</div><!-- /.dropdown-menu -->
		<div id="tp_x_BRCODE" class="ew-template"><input type="radio" class="custom-control-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas_edit->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="{value}"<?php echo $pharmacy_batchmas_edit->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group -->
	<?php if (!$pharmacy_batchmas_edit->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fas fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list -->
<?php echo $pharmacy_batchmas_edit->BRCODE->Lookup->getParamTag($pharmacy_batchmas_edit, "p_x_BRCODE") ?>
</span>
<?php echo $pharmacy_batchmas_edit->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_pharmacy_batchmas_HospID" for="x_HospID" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->HospID->caption() ?><?php echo $pharmacy_batchmas_edit->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->HospID->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_HospID">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->HospID->EditValue ?>"<?php echo $pharmacy_batchmas_edit->HospID->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label id="elh_pharmacy_batchmas_UM" for="x_UM" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->UM->caption() ?><?php echo $pharmacy_batchmas_edit->UM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->UM->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UM">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->UM->EditValue ?>"<?php echo $pharmacy_batchmas_edit->UM->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->UM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_pharmacy_batchmas_GENNAME" for="x_GENNAME" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->GENNAME->caption() ?><?php echo $pharmacy_batchmas_edit->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_GENNAME">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas_edit->GENNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas_edit->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_edit->BILLDATE->Visible) { // BILLDATE ?>
	<div id="r_BILLDATE" class="form-group row">
		<label id="elh_pharmacy_batchmas_BILLDATE" for="x_BILLDATE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas_edit->BILLDATE->caption() ?><?php echo $pharmacy_batchmas_edit->BILLDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_edit->BILLDATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BILLDATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_edit->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_edit->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas_edit->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_edit->BILLDATE->ReadOnly && !$pharmacy_batchmas_edit->BILLDATE->Disabled && !isset($pharmacy_batchmas_edit->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_edit->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmasedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmasedit", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_batchmas_edit->BILLDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_batchmas_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_batchmas_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_batchmas_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_batchmas_edit->showPageFooter();
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
$pharmacy_batchmas_edit->terminate();
?>