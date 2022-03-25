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
$store_batchmas_edit = new store_batchmas_edit();

// Run the page
$store_batchmas_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_batchmas_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fstore_batchmasedit = currentForm = new ew.Form("fstore_batchmasedit", "edit");

// Validate form
fstore_batchmasedit.validate = function() {
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
		<?php if ($store_batchmas_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->PRC->caption(), $store_batchmas->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->BATCHNO->caption(), $store_batchmas->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->OQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->OQ->caption(), $store_batchmas->OQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->OQ->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->RQ->Required) { ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->RQ->caption(), $store_batchmas->RQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->RQ->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->MRQ->caption(), $store_batchmas->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->MRQ->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->IQ->caption(), $store_batchmas->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->IQ->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->MRP->caption(), $store_batchmas->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->MRP->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->EXPDT->caption(), $store_batchmas->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->EXPDT->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->UR->caption(), $store_batchmas->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->UR->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->RT->caption(), $store_batchmas->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->RT->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->PRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_PRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->PRCODE->caption(), $store_batchmas->PRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->BATCH->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->BATCH->caption(), $store_batchmas->BATCH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->PC->caption(), $store_batchmas->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->OLDRT->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDRT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->OLDRT->caption(), $store_batchmas->OLDRT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDRT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->OLDRT->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->TEMPMRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_TEMPMRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->TEMPMRQ->caption(), $store_batchmas->TEMPMRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TEMPMRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->TEMPMRQ->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->TAXP->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->TAXP->caption(), $store_batchmas->TAXP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->TAXP->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->OLDRATE->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDRATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->OLDRATE->caption(), $store_batchmas->OLDRATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDRATE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->OLDRATE->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->NEWRATE->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWRATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->NEWRATE->caption(), $store_batchmas->NEWRATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWRATE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->NEWRATE->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->OTEMPMRA->Required) { ?>
			elm = this.getElements("x" + infix + "_OTEMPMRA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->OTEMPMRA->caption(), $store_batchmas->OTEMPMRA->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OTEMPMRA");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->OTEMPMRA->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->ACTIVESTATUS->Required) { ?>
			elm = this.getElements("x" + infix + "_ACTIVESTATUS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->ACTIVESTATUS->caption(), $store_batchmas->ACTIVESTATUS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->id->caption(), $store_batchmas->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->PrName->caption(), $store_batchmas->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->PSGST->caption(), $store_batchmas->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->PSGST->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->PCGST->caption(), $store_batchmas->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->PCGST->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->SSGST->caption(), $store_batchmas->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->SSGST->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->SCGST->caption(), $store_batchmas->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->SCGST->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->MFRCODE->caption(), $store_batchmas->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->BRCODE->caption(), $store_batchmas->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->BRCODE->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->FRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_FRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->FRQ->caption(), $store_batchmas->FRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->FRQ->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->HospID->caption(), $store_batchmas->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->HospID->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->UM->Required) { ?>
			elm = this.getElements("x" + infix + "_UM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->UM->caption(), $store_batchmas->UM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->GENNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->GENNAME->caption(), $store_batchmas->GENNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_batchmas_edit->BILLDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->BILLDATE->caption(), $store_batchmas->BILLDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BILLDATE");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->BILLDATE->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->PUnit->caption(), $store_batchmas->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->PUnit->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->SUnit->caption(), $store_batchmas->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->SUnit->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->PurValue->caption(), $store_batchmas->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->PurValue->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->PurRate->caption(), $store_batchmas->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->PurRate->errorMessage()) ?>");
		<?php if ($store_batchmas_edit->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_batchmas->StoreID->caption(), $store_batchmas->StoreID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_batchmas->StoreID->errorMessage()) ?>");

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
fstore_batchmasedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_batchmasedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_batchmas_edit->showPageHeader(); ?>
<?php
$store_batchmas_edit->showMessage();
?>
<form name="fstore_batchmasedit" id="fstore_batchmasedit" class="<?php echo $store_batchmas_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_batchmas_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_batchmas_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_batchmas">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$store_batchmas_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($store_batchmas->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_store_batchmas_PRC" for="x_PRC" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->PRC->caption() ?><?php echo ($store_batchmas->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->PRC->cellAttributes() ?>>
<span id="el_store_batchmas_PRC">
<input type="text" data-table="store_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_batchmas->PRC->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->PRC->EditValue ?>"<?php echo $store_batchmas->PRC->editAttributes() ?>>
</span>
<?php echo $store_batchmas->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_store_batchmas_BATCHNO" for="x_BATCHNO" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->BATCHNO->caption() ?><?php echo ($store_batchmas->BATCHNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->BATCHNO->cellAttributes() ?>>
<span id="el_store_batchmas_BATCHNO">
<input type="text" data-table="store_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_batchmas->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->BATCHNO->EditValue ?>"<?php echo $store_batchmas->BATCHNO->editAttributes() ?>>
</span>
<?php echo $store_batchmas->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_store_batchmas_OQ" for="x_OQ" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->OQ->caption() ?><?php echo ($store_batchmas->OQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->OQ->cellAttributes() ?>>
<span id="el_store_batchmas_OQ">
<input type="text" data-table="store_batchmas" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->OQ->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->OQ->EditValue ?>"<?php echo $store_batchmas->OQ->editAttributes() ?>>
</span>
<?php echo $store_batchmas->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_store_batchmas_RQ" for="x_RQ" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->RQ->caption() ?><?php echo ($store_batchmas->RQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->RQ->cellAttributes() ?>>
<span id="el_store_batchmas_RQ">
<input type="text" data-table="store_batchmas" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->RQ->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->RQ->EditValue ?>"<?php echo $store_batchmas->RQ->editAttributes() ?>>
</span>
<?php echo $store_batchmas->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_store_batchmas_MRQ" for="x_MRQ" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->MRQ->caption() ?><?php echo ($store_batchmas->MRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->MRQ->cellAttributes() ?>>
<span id="el_store_batchmas_MRQ">
<input type="text" data-table="store_batchmas" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->MRQ->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->MRQ->EditValue ?>"<?php echo $store_batchmas->MRQ->editAttributes() ?>>
</span>
<?php echo $store_batchmas->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_store_batchmas_IQ" for="x_IQ" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->IQ->caption() ?><?php echo ($store_batchmas->IQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->IQ->cellAttributes() ?>>
<span id="el_store_batchmas_IQ">
<input type="text" data-table="store_batchmas" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->IQ->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->IQ->EditValue ?>"<?php echo $store_batchmas->IQ->editAttributes() ?>>
</span>
<?php echo $store_batchmas->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_store_batchmas_MRP" for="x_MRP" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->MRP->caption() ?><?php echo ($store_batchmas->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->MRP->cellAttributes() ?>>
<span id="el_store_batchmas_MRP">
<input type="text" data-table="store_batchmas" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->MRP->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->MRP->EditValue ?>"<?php echo $store_batchmas->MRP->editAttributes() ?>>
</span>
<?php echo $store_batchmas->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_store_batchmas_EXPDT" for="x_EXPDT" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->EXPDT->caption() ?><?php echo ($store_batchmas->EXPDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->EXPDT->cellAttributes() ?>>
<span id="el_store_batchmas_EXPDT">
<input type="text" data-table="store_batchmas" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($store_batchmas->EXPDT->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->EXPDT->EditValue ?>"<?php echo $store_batchmas->EXPDT->editAttributes() ?>>
<?php if (!$store_batchmas->EXPDT->ReadOnly && !$store_batchmas->EXPDT->Disabled && !isset($store_batchmas->EXPDT->EditAttrs["readonly"]) && !isset($store_batchmas->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_batchmasedit", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_batchmas->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_store_batchmas_UR" for="x_UR" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->UR->caption() ?><?php echo ($store_batchmas->UR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->UR->cellAttributes() ?>>
<span id="el_store_batchmas_UR">
<input type="text" data-table="store_batchmas" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->UR->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->UR->EditValue ?>"<?php echo $store_batchmas->UR->editAttributes() ?>>
</span>
<?php echo $store_batchmas->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_store_batchmas_RT" for="x_RT" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->RT->caption() ?><?php echo ($store_batchmas->RT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->RT->cellAttributes() ?>>
<span id="el_store_batchmas_RT">
<input type="text" data-table="store_batchmas" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->RT->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->RT->EditValue ?>"<?php echo $store_batchmas->RT->editAttributes() ?>>
</span>
<?php echo $store_batchmas->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label id="elh_store_batchmas_PRCODE" for="x_PRCODE" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->PRCODE->caption() ?><?php echo ($store_batchmas->PRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->PRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_PRCODE">
<input type="text" data-table="store_batchmas" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_batchmas->PRCODE->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->PRCODE->EditValue ?>"<?php echo $store_batchmas->PRCODE->editAttributes() ?>>
</span>
<?php echo $store_batchmas->PRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->BATCH->Visible) { // BATCH ?>
	<div id="r_BATCH" class="form-group row">
		<label id="elh_store_batchmas_BATCH" for="x_BATCH" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->BATCH->caption() ?><?php echo ($store_batchmas->BATCH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->BATCH->cellAttributes() ?>>
<span id="el_store_batchmas_BATCH">
<input type="text" data-table="store_batchmas" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_batchmas->BATCH->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->BATCH->EditValue ?>"<?php echo $store_batchmas->BATCH->editAttributes() ?>>
</span>
<?php echo $store_batchmas->BATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_store_batchmas_PC" for="x_PC" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->PC->caption() ?><?php echo ($store_batchmas->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->PC->cellAttributes() ?>>
<span id="el_store_batchmas_PC">
<input type="text" data-table="store_batchmas" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_batchmas->PC->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->PC->EditValue ?>"<?php echo $store_batchmas->PC->editAttributes() ?>>
</span>
<?php echo $store_batchmas->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->OLDRT->Visible) { // OLDRT ?>
	<div id="r_OLDRT" class="form-group row">
		<label id="elh_store_batchmas_OLDRT" for="x_OLDRT" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->OLDRT->caption() ?><?php echo ($store_batchmas->OLDRT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->OLDRT->cellAttributes() ?>>
<span id="el_store_batchmas_OLDRT">
<input type="text" data-table="store_batchmas" data-field="x_OLDRT" name="x_OLDRT" id="x_OLDRT" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->OLDRT->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->OLDRT->EditValue ?>"<?php echo $store_batchmas->OLDRT->editAttributes() ?>>
</span>
<?php echo $store_batchmas->OLDRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<div id="r_TEMPMRQ" class="form-group row">
		<label id="elh_store_batchmas_TEMPMRQ" for="x_TEMPMRQ" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->TEMPMRQ->caption() ?><?php echo ($store_batchmas->TEMPMRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->TEMPMRQ->cellAttributes() ?>>
<span id="el_store_batchmas_TEMPMRQ">
<input type="text" data-table="store_batchmas" data-field="x_TEMPMRQ" name="x_TEMPMRQ" id="x_TEMPMRQ" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->TEMPMRQ->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->TEMPMRQ->EditValue ?>"<?php echo $store_batchmas->TEMPMRQ->editAttributes() ?>>
</span>
<?php echo $store_batchmas->TEMPMRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_store_batchmas_TAXP" for="x_TAXP" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->TAXP->caption() ?><?php echo ($store_batchmas->TAXP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->TAXP->cellAttributes() ?>>
<span id="el_store_batchmas_TAXP">
<input type="text" data-table="store_batchmas" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->TAXP->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->TAXP->EditValue ?>"<?php echo $store_batchmas->TAXP->editAttributes() ?>>
</span>
<?php echo $store_batchmas->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->OLDRATE->Visible) { // OLDRATE ?>
	<div id="r_OLDRATE" class="form-group row">
		<label id="elh_store_batchmas_OLDRATE" for="x_OLDRATE" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->OLDRATE->caption() ?><?php echo ($store_batchmas->OLDRATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->OLDRATE->cellAttributes() ?>>
<span id="el_store_batchmas_OLDRATE">
<input type="text" data-table="store_batchmas" data-field="x_OLDRATE" name="x_OLDRATE" id="x_OLDRATE" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->OLDRATE->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->OLDRATE->EditValue ?>"<?php echo $store_batchmas->OLDRATE->editAttributes() ?>>
</span>
<?php echo $store_batchmas->OLDRATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->NEWRATE->Visible) { // NEWRATE ?>
	<div id="r_NEWRATE" class="form-group row">
		<label id="elh_store_batchmas_NEWRATE" for="x_NEWRATE" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->NEWRATE->caption() ?><?php echo ($store_batchmas->NEWRATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->NEWRATE->cellAttributes() ?>>
<span id="el_store_batchmas_NEWRATE">
<input type="text" data-table="store_batchmas" data-field="x_NEWRATE" name="x_NEWRATE" id="x_NEWRATE" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->NEWRATE->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->NEWRATE->EditValue ?>"<?php echo $store_batchmas->NEWRATE->editAttributes() ?>>
</span>
<?php echo $store_batchmas->NEWRATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<div id="r_OTEMPMRA" class="form-group row">
		<label id="elh_store_batchmas_OTEMPMRA" for="x_OTEMPMRA" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->OTEMPMRA->caption() ?><?php echo ($store_batchmas->OTEMPMRA->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->OTEMPMRA->cellAttributes() ?>>
<span id="el_store_batchmas_OTEMPMRA">
<input type="text" data-table="store_batchmas" data-field="x_OTEMPMRA" name="x_OTEMPMRA" id="x_OTEMPMRA" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->OTEMPMRA->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->OTEMPMRA->EditValue ?>"<?php echo $store_batchmas->OTEMPMRA->editAttributes() ?>>
</span>
<?php echo $store_batchmas->OTEMPMRA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<div id="r_ACTIVESTATUS" class="form-group row">
		<label id="elh_store_batchmas_ACTIVESTATUS" for="x_ACTIVESTATUS" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->ACTIVESTATUS->caption() ?><?php echo ($store_batchmas->ACTIVESTATUS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_store_batchmas_ACTIVESTATUS">
<input type="text" data-table="store_batchmas" data-field="x_ACTIVESTATUS" name="x_ACTIVESTATUS" id="x_ACTIVESTATUS" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($store_batchmas->ACTIVESTATUS->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->ACTIVESTATUS->EditValue ?>"<?php echo $store_batchmas->ACTIVESTATUS->editAttributes() ?>>
</span>
<?php echo $store_batchmas->ACTIVESTATUS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_store_batchmas_id" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->id->caption() ?><?php echo ($store_batchmas->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->id->cellAttributes() ?>>
<span id="el_store_batchmas_id">
<span<?php echo $store_batchmas->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_batchmas->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="store_batchmas" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($store_batchmas->id->CurrentValue) ?>">
<?php echo $store_batchmas->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_store_batchmas_PrName" for="x_PrName" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->PrName->caption() ?><?php echo ($store_batchmas->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->PrName->cellAttributes() ?>>
<span id="el_store_batchmas_PrName">
<input type="text" data-table="store_batchmas" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_batchmas->PrName->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->PrName->EditValue ?>"<?php echo $store_batchmas->PrName->editAttributes() ?>>
</span>
<?php echo $store_batchmas->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_store_batchmas_PSGST" for="x_PSGST" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->PSGST->caption() ?><?php echo ($store_batchmas->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->PSGST->cellAttributes() ?>>
<span id="el_store_batchmas_PSGST">
<input type="text" data-table="store_batchmas" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->PSGST->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->PSGST->EditValue ?>"<?php echo $store_batchmas->PSGST->editAttributes() ?>>
</span>
<?php echo $store_batchmas->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_store_batchmas_PCGST" for="x_PCGST" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->PCGST->caption() ?><?php echo ($store_batchmas->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->PCGST->cellAttributes() ?>>
<span id="el_store_batchmas_PCGST">
<input type="text" data-table="store_batchmas" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->PCGST->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->PCGST->EditValue ?>"<?php echo $store_batchmas->PCGST->editAttributes() ?>>
</span>
<?php echo $store_batchmas->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_store_batchmas_SSGST" for="x_SSGST" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->SSGST->caption() ?><?php echo ($store_batchmas->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->SSGST->cellAttributes() ?>>
<span id="el_store_batchmas_SSGST">
<input type="text" data-table="store_batchmas" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->SSGST->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->SSGST->EditValue ?>"<?php echo $store_batchmas->SSGST->editAttributes() ?>>
</span>
<?php echo $store_batchmas->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_store_batchmas_SCGST" for="x_SCGST" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->SCGST->caption() ?><?php echo ($store_batchmas->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->SCGST->cellAttributes() ?>>
<span id="el_store_batchmas_SCGST">
<input type="text" data-table="store_batchmas" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->SCGST->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->SCGST->EditValue ?>"<?php echo $store_batchmas->SCGST->editAttributes() ?>>
</span>
<?php echo $store_batchmas->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_store_batchmas_MFRCODE" for="x_MFRCODE" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->MFRCODE->caption() ?><?php echo ($store_batchmas->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->MFRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_MFRCODE">
<input type="text" data-table="store_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_batchmas->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->MFRCODE->EditValue ?>"<?php echo $store_batchmas->MFRCODE->editAttributes() ?>>
</span>
<?php echo $store_batchmas->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_store_batchmas_BRCODE" for="x_BRCODE" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->BRCODE->caption() ?><?php echo ($store_batchmas->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->BRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_BRCODE">
<input type="text" data-table="store_batchmas" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->BRCODE->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->BRCODE->EditValue ?>"<?php echo $store_batchmas->BRCODE->editAttributes() ?>>
</span>
<?php echo $store_batchmas->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->FRQ->Visible) { // FRQ ?>
	<div id="r_FRQ" class="form-group row">
		<label id="elh_store_batchmas_FRQ" for="x_FRQ" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->FRQ->caption() ?><?php echo ($store_batchmas->FRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->FRQ->cellAttributes() ?>>
<span id="el_store_batchmas_FRQ">
<input type="text" data-table="store_batchmas" data-field="x_FRQ" name="x_FRQ" id="x_FRQ" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->FRQ->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->FRQ->EditValue ?>"<?php echo $store_batchmas->FRQ->editAttributes() ?>>
</span>
<?php echo $store_batchmas->FRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_store_batchmas_HospID" for="x_HospID" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->HospID->caption() ?><?php echo ($store_batchmas->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->HospID->cellAttributes() ?>>
<span id="el_store_batchmas_HospID">
<input type="text" data-table="store_batchmas" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->HospID->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->HospID->EditValue ?>"<?php echo $store_batchmas->HospID->editAttributes() ?>>
</span>
<?php echo $store_batchmas->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label id="elh_store_batchmas_UM" for="x_UM" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->UM->caption() ?><?php echo ($store_batchmas->UM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->UM->cellAttributes() ?>>
<span id="el_store_batchmas_UM">
<input type="text" data-table="store_batchmas" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_batchmas->UM->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->UM->EditValue ?>"<?php echo $store_batchmas->UM->editAttributes() ?>>
</span>
<?php echo $store_batchmas->UM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_store_batchmas_GENNAME" for="x_GENNAME" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->GENNAME->caption() ?><?php echo ($store_batchmas->GENNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->GENNAME->cellAttributes() ?>>
<span id="el_store_batchmas_GENNAME">
<input type="text" data-table="store_batchmas" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($store_batchmas->GENNAME->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->GENNAME->EditValue ?>"<?php echo $store_batchmas->GENNAME->editAttributes() ?>>
</span>
<?php echo $store_batchmas->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->BILLDATE->Visible) { // BILLDATE ?>
	<div id="r_BILLDATE" class="form-group row">
		<label id="elh_store_batchmas_BILLDATE" for="x_BILLDATE" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->BILLDATE->caption() ?><?php echo ($store_batchmas->BILLDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->BILLDATE->cellAttributes() ?>>
<span id="el_store_batchmas_BILLDATE">
<input type="text" data-table="store_batchmas" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($store_batchmas->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->BILLDATE->EditValue ?>"<?php echo $store_batchmas->BILLDATE->editAttributes() ?>>
<?php if (!$store_batchmas->BILLDATE->ReadOnly && !$store_batchmas->BILLDATE->Disabled && !isset($store_batchmas->BILLDATE->EditAttrs["readonly"]) && !isset($store_batchmas->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_batchmasedit", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_batchmas->BILLDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_store_batchmas_PUnit" for="x_PUnit" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->PUnit->caption() ?><?php echo ($store_batchmas->PUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->PUnit->cellAttributes() ?>>
<span id="el_store_batchmas_PUnit">
<input type="text" data-table="store_batchmas" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->PUnit->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->PUnit->EditValue ?>"<?php echo $store_batchmas->PUnit->editAttributes() ?>>
</span>
<?php echo $store_batchmas->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_store_batchmas_SUnit" for="x_SUnit" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->SUnit->caption() ?><?php echo ($store_batchmas->SUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->SUnit->cellAttributes() ?>>
<span id="el_store_batchmas_SUnit">
<input type="text" data-table="store_batchmas" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->SUnit->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->SUnit->EditValue ?>"<?php echo $store_batchmas->SUnit->editAttributes() ?>>
</span>
<?php echo $store_batchmas->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_store_batchmas_PurValue" for="x_PurValue" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->PurValue->caption() ?><?php echo ($store_batchmas->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->PurValue->cellAttributes() ?>>
<span id="el_store_batchmas_PurValue">
<input type="text" data-table="store_batchmas" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->PurValue->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->PurValue->EditValue ?>"<?php echo $store_batchmas->PurValue->editAttributes() ?>>
</span>
<?php echo $store_batchmas->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_store_batchmas_PurRate" for="x_PurRate" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->PurRate->caption() ?><?php echo ($store_batchmas->PurRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->PurRate->cellAttributes() ?>>
<span id="el_store_batchmas_PurRate">
<input type="text" data-table="store_batchmas" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->PurRate->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->PurRate->EditValue ?>"<?php echo $store_batchmas->PurRate->editAttributes() ?>>
</span>
<?php echo $store_batchmas->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_batchmas->StoreID->Visible) { // StoreID ?>
	<div id="r_StoreID" class="form-group row">
		<label id="elh_store_batchmas_StoreID" for="x_StoreID" class="<?php echo $store_batchmas_edit->LeftColumnClass ?>"><?php echo $store_batchmas->StoreID->caption() ?><?php echo ($store_batchmas->StoreID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_batchmas_edit->RightColumnClass ?>"><div<?php echo $store_batchmas->StoreID->cellAttributes() ?>>
<span id="el_store_batchmas_StoreID">
<input type="text" data-table="store_batchmas" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_batchmas->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_batchmas->StoreID->EditValue ?>"<?php echo $store_batchmas->StoreID->editAttributes() ?>>
</span>
<?php echo $store_batchmas->StoreID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$store_batchmas_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_batchmas_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_batchmas_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$store_batchmas_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_batchmas_edit->terminate();
?>