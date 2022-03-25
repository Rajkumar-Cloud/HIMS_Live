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
$pharmacy_purchaseorder_add = new pharmacy_purchaseorder_add();

// Run the page
$pharmacy_purchaseorder_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchaseorder_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_purchaseorderadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_purchaseorderadd = currentForm = new ew.Form("fpharmacy_purchaseorderadd", "add");

	// Validate form
	fpharmacy_purchaseorderadd.validate = function() {
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
			<?php if ($pharmacy_purchaseorder_add->ORDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_ORDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->ORDNO->caption(), $pharmacy_purchaseorder_add->ORDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->PRC->caption(), $pharmacy_purchaseorder_add->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->QTY->Required) { ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->QTY->caption(), $pharmacy_purchaseorder_add->QTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->QTY->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->DT->caption(), $pharmacy_purchaseorder_add->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->DT->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->PC->caption(), $pharmacy_purchaseorder_add->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->YM->Required) { ?>
				elm = this.getElements("x" + infix + "_YM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->YM->caption(), $pharmacy_purchaseorder_add->YM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->MFRCODE->caption(), $pharmacy_purchaseorder_add->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->Stock->Required) { ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->Stock->caption(), $pharmacy_purchaseorder_add->Stock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->Stock->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->LastMonthSale->Required) { ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->LastMonthSale->caption(), $pharmacy_purchaseorder_add->LastMonthSale->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->LastMonthSale->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->Printcheck->Required) { ?>
				elm = this.getElements("x" + infix + "_Printcheck");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->Printcheck->caption(), $pharmacy_purchaseorder_add->Printcheck->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->poid->Required) { ?>
				elm = this.getElements("x" + infix + "_poid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->poid->caption(), $pharmacy_purchaseorder_add->poid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_poid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->poid->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->PSGST->caption(), $pharmacy_purchaseorder_add->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->PCGST->caption(), $pharmacy_purchaseorder_add->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->SSGST->caption(), $pharmacy_purchaseorder_add->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->SCGST->caption(), $pharmacy_purchaseorder_add->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->BRCODE->caption(), $pharmacy_purchaseorder_add->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->BRCODE->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->HSN->Required) { ?>
				elm = this.getElements("x" + infix + "_HSN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->HSN->caption(), $pharmacy_purchaseorder_add->HSN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->Pack->Required) { ?>
				elm = this.getElements("x" + infix + "_Pack");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->Pack->caption(), $pharmacy_purchaseorder_add->Pack->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->PUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->PUnit->caption(), $pharmacy_purchaseorder_add->PUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->PUnit->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->SUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->SUnit->caption(), $pharmacy_purchaseorder_add->SUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->SUnit->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->GrnQuantity->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->GrnQuantity->caption(), $pharmacy_purchaseorder_add->GrnQuantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->GrnQuantity->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->GrnMRP->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnMRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->GrnMRP->caption(), $pharmacy_purchaseorder_add->GrnMRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnMRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->GrnMRP->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->trid->Required) { ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->trid->caption(), $pharmacy_purchaseorder_add->trid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->trid->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->HospID->caption(), $pharmacy_purchaseorder_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->CreatedBy->caption(), $pharmacy_purchaseorder_add->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->CreatedDateTime->caption(), $pharmacy_purchaseorder_add->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->ModifiedBy->caption(), $pharmacy_purchaseorder_add->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->ModifiedDateTime->caption(), $pharmacy_purchaseorder_add->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->grncreatedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->grncreatedby->caption(), $pharmacy_purchaseorder_add->grncreatedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grncreatedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->grncreatedby->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->grncreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->grncreatedDateTime->caption(), $pharmacy_purchaseorder_add->grncreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grncreatedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->grncreatedDateTime->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->grnModifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->grnModifiedby->caption(), $pharmacy_purchaseorder_add->grnModifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grnModifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->grnModifiedby->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->grnModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->grnModifiedDateTime->caption(), $pharmacy_purchaseorder_add->grnModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grnModifiedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->grnModifiedDateTime->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->Received->Required) { ?>
				elm = this.getElements("x" + infix + "_Received[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->Received->caption(), $pharmacy_purchaseorder_add->Received->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_add->BillDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->BillDate->caption(), $pharmacy_purchaseorder_add->BillDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->BillDate->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_add->CurStock->Required) { ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_add->CurStock->caption(), $pharmacy_purchaseorder_add->CurStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_add->CurStock->errorMessage()) ?>");

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
	fpharmacy_purchaseorderadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_purchaseorderadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_purchaseorderadd.lists["x_PRC"] = <?php echo $pharmacy_purchaseorder_add->PRC->Lookup->toClientList($pharmacy_purchaseorder_add) ?>;
	fpharmacy_purchaseorderadd.lists["x_PRC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_add->PRC->lookupOptions()) ?>;
	fpharmacy_purchaseorderadd.autoSuggests["x_PRC"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_purchaseorderadd.lists["x_PC"] = <?php echo $pharmacy_purchaseorder_add->PC->Lookup->toClientList($pharmacy_purchaseorder_add) ?>;
	fpharmacy_purchaseorderadd.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_add->PC->lookupOptions()) ?>;
	fpharmacy_purchaseorderadd.lists["x_Received[]"] = <?php echo $pharmacy_purchaseorder_add->Received->Lookup->toClientList($pharmacy_purchaseorder_add) ?>;
	fpharmacy_purchaseorderadd.lists["x_Received[]"].options = <?php echo JsonEncode($pharmacy_purchaseorder_add->Received->options(FALSE, TRUE)) ?>;
	loadjs.done("fpharmacy_purchaseorderadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_purchaseorder_add->showPageHeader(); ?>
<?php
$pharmacy_purchaseorder_add->showMessage();
?>
<form name="fpharmacy_purchaseorderadd" id="fpharmacy_purchaseorderadd" class="<?php echo $pharmacy_purchaseorder_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchaseorder_add->IsModal ?>">
<?php if ($pharmacy_purchaseorder->getCurrentMasterTable() == "pharmacy_po") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_po">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder_add->poid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_purchaseorder_add->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_ORDNO" for="x_ORDNO" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->ORDNO->caption() ?><?php echo $pharmacy_purchaseorder_add->ORDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->ORDNO->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ORDNO">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->ORDNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->ORDNO->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->ORDNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PRC" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->PRC->caption() ?><?php echo $pharmacy_purchaseorder_add->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PRC">
<?php
$onchange = $pharmacy_purchaseorder_add->PRC->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchaseorder_add->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x_PRC">
	<input type="text" class="form-control" name="sv_x_PRC" id="sv_x_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder_add->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder_add->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder_add->PRC->displayValueSeparatorAttribute() ?>" name="x_PRC" id="x_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_add->PRC->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchaseorderadd"], function() {
	fpharmacy_purchaseorderadd.createAutoSuggest({"id":"x_PRC","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchaseorder_add->PRC->Lookup->getParamTag($pharmacy_purchaseorder_add, "p_x_PRC") ?>
</span>
<?php echo $pharmacy_purchaseorder_add->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_QTY" for="x_QTY" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->QTY->caption() ?><?php echo $pharmacy_purchaseorder_add->QTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->QTY->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_QTY">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x_QTY" id="x_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->QTY->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_DT" for="x_DT" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->DT->caption() ?><?php echo $pharmacy_purchaseorder_add->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_DT">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->DT->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->DT->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_add->DT->ReadOnly && !$pharmacy_purchaseorder_add->DT->Disabled && !isset($pharmacy_purchaseorder_add->DT->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_add->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder_add->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PC" for="x_PC" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->PC->caption() ?><?php echo $pharmacy_purchaseorder_add->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->PC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PC">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PC"><?php echo EmptyValue(strval($pharmacy_purchaseorder_add->PC->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_purchaseorder_add->PC->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_purchaseorder_add->PC->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_purchaseorder_add->PC->ReadOnly || $pharmacy_purchaseorder_add->PC->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PC',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_purchaseorder_add->PC->Lookup->getParamTag($pharmacy_purchaseorder_add, "p_x_PC") ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PC" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_purchaseorder_add->PC->displayValueSeparatorAttribute() ?>" name="x_PC" id="x_PC" value="<?php echo $pharmacy_purchaseorder_add->PC->CurrentValue ?>"<?php echo $pharmacy_purchaseorder_add->PC->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_YM" for="x_YM" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->YM->caption() ?><?php echo $pharmacy_purchaseorder_add->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->YM->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_YM">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_YM" name="x_YM" id="x_YM" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->YM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->YM->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->YM->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->MFRCODE->caption() ?><?php echo $pharmacy_purchaseorder_add->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_MFRCODE">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->MFRCODE->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Stock" for="x_Stock" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->Stock->caption() ?><?php echo $pharmacy_purchaseorder_add->Stock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->Stock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Stock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x_Stock" id="x_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->Stock->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_LastMonthSale" for="x_LastMonthSale" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->LastMonthSale->caption() ?><?php echo $pharmacy_purchaseorder_add->LastMonthSale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->LastMonthSale->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_LastMonthSale">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->LastMonthSale->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Printcheck" for="x_Printcheck" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->Printcheck->caption() ?><?php echo $pharmacy_purchaseorder_add->Printcheck->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->Printcheck->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Printcheck">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->Printcheck->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->Printcheck->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->Printcheck->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_poid" for="x_poid" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->poid->caption() ?><?php echo $pharmacy_purchaseorder_add->poid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->poid->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder_add->poid->getSessionValue() != "") { ?>
<span id="el_pharmacy_purchaseorder_poid">
<span<?php echo $pharmacy_purchaseorder_add->poid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_add->poid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_poid" name="x_poid" value="<?php echo HtmlEncode($pharmacy_purchaseorder_add->poid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_purchaseorder_poid">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->poid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->poid->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->poid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_purchaseorder_add->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PSGST" for="x_PSGST" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->PSGST->caption() ?><?php echo $pharmacy_purchaseorder_add->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PSGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->PSGST->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PCGST" for="x_PCGST" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->PCGST->caption() ?><?php echo $pharmacy_purchaseorder_add->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PCGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->PCGST->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_SSGST" for="x_SSGST" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->SSGST->caption() ?><?php echo $pharmacy_purchaseorder_add->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SSGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->SSGST->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_SCGST" for="x_SCGST" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->SCGST->caption() ?><?php echo $pharmacy_purchaseorder_add->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SCGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->SCGST->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_BRCODE" for="x_BRCODE" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->BRCODE->caption() ?><?php echo $pharmacy_purchaseorder_add->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BRCODE">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->BRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->BRCODE->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->BRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_HSN" for="x_HSN" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->HSN->caption() ?><?php echo $pharmacy_purchaseorder_add->HSN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->HSN->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_HSN">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_HSN" name="x_HSN" id="x_HSN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->HSN->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->HSN->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->HSN->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Pack" for="x_Pack" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->Pack->caption() ?><?php echo $pharmacy_purchaseorder_add->Pack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->Pack->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Pack">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->Pack->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->Pack->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->Pack->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PUnit" for="x_PUnit" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->PUnit->caption() ?><?php echo $pharmacy_purchaseorder_add->PUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PUnit">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->PUnit->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->PUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_SUnit" for="x_SUnit" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->SUnit->caption() ?><?php echo $pharmacy_purchaseorder_add->SUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SUnit">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->SUnit->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->SUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_GrnQuantity" for="x_GrnQuantity" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->GrnQuantity->caption() ?><?php echo $pharmacy_purchaseorder_add->GrnQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->GrnQuantity->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnQuantity">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->GrnQuantity->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_GrnMRP" for="x_GrnMRP" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->GrnMRP->caption() ?><?php echo $pharmacy_purchaseorder_add->GrnMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->GrnMRP->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnMRP">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->GrnMRP->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->GrnMRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_trid" for="x_trid" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->trid->caption() ?><?php echo $pharmacy_purchaseorder_add->trid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->trid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_trid">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->trid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->trid->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->trid->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->grncreatedby->Visible) { // grncreatedby ?>
	<div id="r_grncreatedby" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grncreatedby" for="x_grncreatedby" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->grncreatedby->caption() ?><?php echo $pharmacy_purchaseorder_add->grncreatedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->grncreatedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedby">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grncreatedby" name="x_grncreatedby" id="x_grncreatedby" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->grncreatedby->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->grncreatedby->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->grncreatedby->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->grncreatedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<div id="r_grncreatedDateTime" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grncreatedDateTime" for="x_grncreatedDateTime" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->grncreatedDateTime->caption() ?><?php echo $pharmacy_purchaseorder_add->grncreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->grncreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedDateTime">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grncreatedDateTime" name="x_grncreatedDateTime" id="x_grncreatedDateTime" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->grncreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->grncreatedDateTime->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->grncreatedDateTime->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_add->grncreatedDateTime->ReadOnly && !$pharmacy_purchaseorder_add->grncreatedDateTime->Disabled && !isset($pharmacy_purchaseorder_add->grncreatedDateTime->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_add->grncreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderadd", "x_grncreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder_add->grncreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->grnModifiedby->Visible) { // grnModifiedby ?>
	<div id="r_grnModifiedby" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grnModifiedby" for="x_grnModifiedby" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->grnModifiedby->caption() ?><?php echo $pharmacy_purchaseorder_add->grnModifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->grnModifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedby">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grnModifiedby" name="x_grnModifiedby" id="x_grnModifiedby" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->grnModifiedby->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->grnModifiedby->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->grnModifiedby->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->grnModifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<div id="r_grnModifiedDateTime" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grnModifiedDateTime" for="x_grnModifiedDateTime" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->grnModifiedDateTime->caption() ?><?php echo $pharmacy_purchaseorder_add->grnModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedDateTime">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grnModifiedDateTime" name="x_grnModifiedDateTime" id="x_grnModifiedDateTime" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->grnModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->grnModifiedDateTime->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->grnModifiedDateTime->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_add->grnModifiedDateTime->ReadOnly && !$pharmacy_purchaseorder_add->grnModifiedDateTime->Disabled && !isset($pharmacy_purchaseorder_add->grnModifiedDateTime->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_add->grnModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderadd", "x_grnModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder_add->grnModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Received" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->Received->caption() ?><?php echo $pharmacy_purchaseorder_add->Received->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->Received->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Received">
<div id="tp_x_Received" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="pharmacy_purchaseorder" data-field="x_Received" data-value-separator="<?php echo $pharmacy_purchaseorder_add->Received->displayValueSeparatorAttribute() ?>" name="x_Received[]" id="x_Received[]" value="{value}"<?php echo $pharmacy_purchaseorder_add->Received->editAttributes() ?>></div>
<div id="dsl_x_Received" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_purchaseorder_add->Received->checkBoxListHtml(FALSE, "x_Received[]") ?>
</div></div>
</span>
<?php echo $pharmacy_purchaseorder_add->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_BillDate" for="x_BillDate" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->BillDate->caption() ?><?php echo $pharmacy_purchaseorder_add->BillDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->BillDate->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BillDate">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_add->BillDate->ReadOnly && !$pharmacy_purchaseorder_add->BillDate->Disabled && !isset($pharmacy_purchaseorder_add->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_add->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderadd", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder_add->BillDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_add->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_CurStock" for="x_CurStock" class="<?php echo $pharmacy_purchaseorder_add->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_add->CurStock->caption() ?><?php echo $pharmacy_purchaseorder_add->CurStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_add->CurStock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CurStock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_add->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_add->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder_add->CurStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_add->CurStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_purchaseorder_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_purchaseorder_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_purchaseorder_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_purchaseorder_add->showPageFooter();
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
$pharmacy_purchaseorder_add->terminate();
?>