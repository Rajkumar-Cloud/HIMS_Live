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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_batchmasedit = currentForm = new ew.Form("fpharmacy_batchmasedit", "edit");

// Validate form
fpharmacy_batchmasedit.validate = function() {
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
		<?php if ($pharmacy_batchmas_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PRC->caption(), $pharmacy_batchmas->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PrName->caption(), $pharmacy_batchmas->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->BATCHNO->caption(), $pharmacy_batchmas->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->BATCH->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->BATCH->caption(), $pharmacy_batchmas->BATCH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->MFRCODE->caption(), $pharmacy_batchmas->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->EXPDT->caption(), $pharmacy_batchmas->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->EXPDT->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->PRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_PRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PRCODE->caption(), $pharmacy_batchmas->PRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->OQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->OQ->caption(), $pharmacy_batchmas->OQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->OQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->RQ->Required) { ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->RQ->caption(), $pharmacy_batchmas->RQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->RQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->FRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_FRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->FRQ->caption(), $pharmacy_batchmas->FRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->FRQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->IQ->caption(), $pharmacy_batchmas->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->IQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->MRQ->caption(), $pharmacy_batchmas->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->MRQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->MRP->caption(), $pharmacy_batchmas->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->MRP->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->UR->caption(), $pharmacy_batchmas->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->UR->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PC->caption(), $pharmacy_batchmas->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->OLDRT->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDRT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->OLDRT->caption(), $pharmacy_batchmas->OLDRT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDRT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->OLDRT->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->TEMPMRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_TEMPMRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->TEMPMRQ->caption(), $pharmacy_batchmas->TEMPMRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TEMPMRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->TEMPMRQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->TAXP->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->TAXP->caption(), $pharmacy_batchmas->TAXP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->TAXP->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->OLDRATE->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDRATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->OLDRATE->caption(), $pharmacy_batchmas->OLDRATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDRATE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->OLDRATE->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->NEWRATE->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWRATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->NEWRATE->caption(), $pharmacy_batchmas->NEWRATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWRATE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->NEWRATE->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->OTEMPMRA->Required) { ?>
			elm = this.getElements("x" + infix + "_OTEMPMRA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->OTEMPMRA->caption(), $pharmacy_batchmas->OTEMPMRA->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OTEMPMRA");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->OTEMPMRA->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->ACTIVESTATUS->Required) { ?>
			elm = this.getElements("x" + infix + "_ACTIVESTATUS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->ACTIVESTATUS->caption(), $pharmacy_batchmas->ACTIVESTATUS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->id->caption(), $pharmacy_batchmas->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PSGST->caption(), $pharmacy_batchmas->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PCGST->caption(), $pharmacy_batchmas->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->SSGST->caption(), $pharmacy_batchmas->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->SCGST->caption(), $pharmacy_batchmas->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->RT->caption(), $pharmacy_batchmas->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->RT->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->BRCODE->caption(), $pharmacy_batchmas->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->HospID->caption(), $pharmacy_batchmas->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->HospID->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->UM->Required) { ?>
			elm = this.getElements("x" + infix + "_UM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->UM->caption(), $pharmacy_batchmas->UM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->GENNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->GENNAME->caption(), $pharmacy_batchmas->GENNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_edit->BILLDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->BILLDATE->caption(), $pharmacy_batchmas->BILLDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BILLDATE");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->BILLDATE->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PUnit->caption(), $pharmacy_batchmas->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->PUnit->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->SUnit->caption(), $pharmacy_batchmas->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->SUnit->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PurValue->caption(), $pharmacy_batchmas->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->PurValue->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_edit->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PurRate->caption(), $pharmacy_batchmas->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->PurRate->errorMessage()) ?>");

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
fpharmacy_batchmasedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_batchmasedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_batchmasedit.lists["x_PrName"] = <?php echo $pharmacy_batchmas_edit->PrName->Lookup->toClientList() ?>;
fpharmacy_batchmasedit.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_edit->PrName->lookupOptions()) ?>;
fpharmacy_batchmasedit.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_batchmasedit.lists["x_BRCODE"] = <?php echo $pharmacy_batchmas_edit->BRCODE->Lookup->toClientList() ?>;
fpharmacy_batchmasedit.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_batchmas_edit->BRCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_batchmas_edit->showPageHeader(); ?>
<?php
$pharmacy_batchmas_edit->showMessage();
?>
<form name="fpharmacy_batchmasedit" id="fpharmacy_batchmasedit" class="<?php echo $pharmacy_batchmas_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_batchmas_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_batchmas_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_batchmas_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_batchmas->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_batchmas_PRC" for="x_PRC" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->PRC->caption() ?><?php echo ($pharmacy_batchmas->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PRC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRC->EditValue ?>"<?php echo $pharmacy_batchmas->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_pharmacy_batchmas_PrName" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->PrName->caption() ?><?php echo ($pharmacy_batchmas->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PrName->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_batchmas->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_batchmas->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName" class="text-nowrap" style="z-index: 8980">
	<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_batchmasedit.createAutoSuggest({"id":"x_PrName","forceSelect":true});
</script>
<?php echo $pharmacy_batchmas->PrName->Lookup->getParamTag("p_x_PrName") ?>
</span>
<?php echo $pharmacy_batchmas->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_pharmacy_batchmas_BATCHNO" for="x_BATCHNO" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->BATCHNO->caption() ?><?php echo ($pharmacy_batchmas->BATCHNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCHNO">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas->BATCHNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->BATCH->Visible) { // BATCH ?>
	<div id="r_BATCH" class="form-group row">
		<label id="elh_pharmacy_batchmas_BATCH" for="x_BATCH" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->BATCH->caption() ?><?php echo ($pharmacy_batchmas->BATCH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->BATCH->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCH">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BATCH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BATCH->EditValue ?>"<?php echo $pharmacy_batchmas->BATCH->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->BATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_batchmas_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->MFRCODE->caption() ?><?php echo ($pharmacy_batchmas->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MFRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_pharmacy_batchmas_EXPDT" for="x_EXPDT" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->EXPDT->caption() ?><?php echo ($pharmacy_batchmas->EXPDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_EXPDT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->EXPDT->ReadOnly && !$pharmacy_batchmas->EXPDT->Disabled && !isset($pharmacy_batchmas->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmasedit", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_batchmas->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label id="elh_pharmacy_batchmas_PRCODE" for="x_PRCODE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->PRCODE->caption() ?><?php echo ($pharmacy_batchmas->PRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->PRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->PRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_OQ" for="x_OQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->OQ->caption() ?><?php echo ($pharmacy_batchmas->OQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->OQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x_OQ" id="x_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OQ->EditValue ?>"<?php echo $pharmacy_batchmas->OQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_RQ" for="x_RQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->RQ->caption() ?><?php echo ($pharmacy_batchmas->RQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->RQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->RQ->EditValue ?>"<?php echo $pharmacy_batchmas->RQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->FRQ->Visible) { // FRQ ?>
	<div id="r_FRQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_FRQ" for="x_FRQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->FRQ->caption() ?><?php echo ($pharmacy_batchmas->FRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->FRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_FRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x_FRQ" id="x_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas->FRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->FRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_IQ" for="x_IQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->IQ->caption() ?><?php echo ($pharmacy_batchmas->IQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->IQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_IQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->IQ->EditValue ?>"<?php echo $pharmacy_batchmas->IQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_MRQ" for="x_MRQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->MRQ->caption() ?><?php echo ($pharmacy_batchmas->MRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas->MRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_batchmas_MRP" for="x_MRP" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->MRP->caption() ?><?php echo ($pharmacy_batchmas->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->MRP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x_MRP" id="x_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MRP->EditValue ?>"<?php echo $pharmacy_batchmas->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_pharmacy_batchmas_UR" for="x_UR" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->UR->caption() ?><?php echo ($pharmacy_batchmas->UR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->UR->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UR">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x_UR" id="x_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->UR->EditValue ?>"<?php echo $pharmacy_batchmas->UR->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_batchmas_PC" for="x_PC" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->PC->caption() ?><?php echo ($pharmacy_batchmas->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PC->EditValue ?>"<?php echo $pharmacy_batchmas->PC->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->OLDRT->Visible) { // OLDRT ?>
	<div id="r_OLDRT" class="form-group row">
		<label id="elh_pharmacy_batchmas_OLDRT" for="x_OLDRT" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->OLDRT->caption() ?><?php echo ($pharmacy_batchmas->OLDRT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->OLDRT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OLDRT" name="x_OLDRT" id="x_OLDRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OLDRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OLDRT->EditValue ?>"<?php echo $pharmacy_batchmas->OLDRT->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->OLDRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<div id="r_TEMPMRQ" class="form-group row">
		<label id="elh_pharmacy_batchmas_TEMPMRQ" for="x_TEMPMRQ" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->TEMPMRQ->caption() ?><?php echo ($pharmacy_batchmas->TEMPMRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->TEMPMRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TEMPMRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_TEMPMRQ" name="x_TEMPMRQ" id="x_TEMPMRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->TEMPMRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->TEMPMRQ->EditValue ?>"<?php echo $pharmacy_batchmas->TEMPMRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->TEMPMRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_pharmacy_batchmas_TAXP" for="x_TAXP" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->TAXP->caption() ?><?php echo ($pharmacy_batchmas->TAXP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TAXP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->TAXP->EditValue ?>"<?php echo $pharmacy_batchmas->TAXP->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->OLDRATE->Visible) { // OLDRATE ?>
	<div id="r_OLDRATE" class="form-group row">
		<label id="elh_pharmacy_batchmas_OLDRATE" for="x_OLDRATE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->OLDRATE->caption() ?><?php echo ($pharmacy_batchmas->OLDRATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->OLDRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OLDRATE" name="x_OLDRATE" id="x_OLDRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OLDRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OLDRATE->EditValue ?>"<?php echo $pharmacy_batchmas->OLDRATE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->OLDRATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->NEWRATE->Visible) { // NEWRATE ?>
	<div id="r_NEWRATE" class="form-group row">
		<label id="elh_pharmacy_batchmas_NEWRATE" for="x_NEWRATE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->NEWRATE->caption() ?><?php echo ($pharmacy_batchmas->NEWRATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->NEWRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_NEWRATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_NEWRATE" name="x_NEWRATE" id="x_NEWRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->NEWRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->NEWRATE->EditValue ?>"<?php echo $pharmacy_batchmas->NEWRATE->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->NEWRATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<div id="r_OTEMPMRA" class="form-group row">
		<label id="elh_pharmacy_batchmas_OTEMPMRA" for="x_OTEMPMRA" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->OTEMPMRA->caption() ?><?php echo ($pharmacy_batchmas->OTEMPMRA->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->OTEMPMRA->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OTEMPMRA">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OTEMPMRA" name="x_OTEMPMRA" id="x_OTEMPMRA" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OTEMPMRA->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OTEMPMRA->EditValue ?>"<?php echo $pharmacy_batchmas->OTEMPMRA->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->OTEMPMRA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<div id="r_ACTIVESTATUS" class="form-group row">
		<label id="elh_pharmacy_batchmas_ACTIVESTATUS" for="x_ACTIVESTATUS" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->ACTIVESTATUS->caption() ?><?php echo ($pharmacy_batchmas->ACTIVESTATUS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_ACTIVESTATUS">
<input type="text" data-table="pharmacy_batchmas" data-field="x_ACTIVESTATUS" name="x_ACTIVESTATUS" id="x_ACTIVESTATUS" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->ACTIVESTATUS->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->ACTIVESTATUS->EditValue ?>"<?php echo $pharmacy_batchmas->ACTIVESTATUS->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->ACTIVESTATUS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_batchmas_id" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->id->caption() ?><?php echo ($pharmacy_batchmas->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->id->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_id">
<span<?php echo $pharmacy_batchmas->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_batchmas->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_batchmas->id->CurrentValue) ?>">
<?php echo $pharmacy_batchmas->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_PSGST" for="x_PSGST" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->PSGST->caption() ?><?php echo ($pharmacy_batchmas->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PSGST->EditValue ?>"<?php echo $pharmacy_batchmas->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_PCGST" for="x_PCGST" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->PCGST->caption() ?><?php echo ($pharmacy_batchmas->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PCGST->EditValue ?>"<?php echo $pharmacy_batchmas->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_SSGST" for="x_SSGST" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->SSGST->caption() ?><?php echo ($pharmacy_batchmas->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_batchmas_SCGST" for="x_SCGST" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->SCGST->caption() ?><?php echo ($pharmacy_batchmas->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_pharmacy_batchmas_RT" for="x_RT" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->RT->caption() ?><?php echo ($pharmacy_batchmas->RT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->RT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x_RT" id="x_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->RT->EditValue ?>"<?php echo $pharmacy_batchmas->RT->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_pharmacy_batchmas_BRCODE" for="x_BRCODE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->BRCODE->caption() ?><?php echo ($pharmacy_batchmas->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BRCODE">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas->BRCODE->ViewValue ?></button>
		<div id="dsl_x_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas->BRCODE->radioButtonListHtml(TRUE, "x_BRCODE") ?>
			</div><!-- /.ew-items ##-->
		</div><!-- /.dropdown-menu ##-->
		<div id="tp_x_BRCODE" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="{value}"<?php echo $pharmacy_batchmas->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group ##-->
	<?php if (!$pharmacy_batchmas->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fa fa-times ew-icon"></i>
	</button>
<?php echo $pharmacy_batchmas->BRCODE->Lookup->getParamTag("p_x_BRCODE") ?>
	<?php } ?>
</div><!-- /.ew-dropdown-list ##-->
</span>
<?php echo $pharmacy_batchmas->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_pharmacy_batchmas_HospID" for="x_HospID" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->HospID->caption() ?><?php echo ($pharmacy_batchmas->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->HospID->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_HospID">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->HospID->EditValue ?>"<?php echo $pharmacy_batchmas->HospID->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label id="elh_pharmacy_batchmas_UM" for="x_UM" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->UM->caption() ?><?php echo ($pharmacy_batchmas->UM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->UM->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UM">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->UM->EditValue ?>"<?php echo $pharmacy_batchmas->UM->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->UM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_pharmacy_batchmas_GENNAME" for="x_GENNAME" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->GENNAME->caption() ?><?php echo ($pharmacy_batchmas->GENNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_GENNAME">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas->GENNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->BILLDATE->Visible) { // BILLDATE ?>
	<div id="r_BILLDATE" class="form-group row">
		<label id="elh_pharmacy_batchmas_BILLDATE" for="x_BILLDATE" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->BILLDATE->caption() ?><?php echo ($pharmacy_batchmas->BILLDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->BILLDATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BILLDATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->BILLDATE->ReadOnly && !$pharmacy_batchmas->BILLDATE->Disabled && !isset($pharmacy_batchmas->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmasedit", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_batchmas->BILLDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_pharmacy_batchmas_PUnit" for="x_PUnit" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->PUnit->caption() ?><?php echo ($pharmacy_batchmas->PUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PUnit">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PUnit->EditValue ?>"<?php echo $pharmacy_batchmas->PUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_pharmacy_batchmas_SUnit" for="x_SUnit" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->SUnit->caption() ?><?php echo ($pharmacy_batchmas->SUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SUnit">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SUnit->EditValue ?>"<?php echo $pharmacy_batchmas->SUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_pharmacy_batchmas_PurValue" for="x_PurValue" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->PurValue->caption() ?><?php echo ($pharmacy_batchmas->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PurValue">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PurValue->EditValue ?>"<?php echo $pharmacy_batchmas->PurValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_pharmacy_batchmas_PurRate" for="x_PurRate" class="<?php echo $pharmacy_batchmas_edit->LeftColumnClass ?>"><?php echo $pharmacy_batchmas->PurRate->caption() ?><?php echo ($pharmacy_batchmas->PurRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_batchmas_edit->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PurRate->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PurRate">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PurRate->EditValue ?>"<?php echo $pharmacy_batchmas->PurRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_batchmas->PurRate->CustomMsg ?></div></div>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_batchmas_edit->terminate();
?>