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
$pharmacy_purchaseorder_edit = new pharmacy_purchaseorder_edit();

// Run the page
$pharmacy_purchaseorder_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchaseorder_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_purchaseorderedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_purchaseorderedit = currentForm = new ew.Form("fpharmacy_purchaseorderedit", "edit");

	// Validate form
	fpharmacy_purchaseorderedit.validate = function() {
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
			<?php if ($pharmacy_purchaseorder_edit->ORDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_ORDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->ORDNO->caption(), $pharmacy_purchaseorder_edit->ORDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->PRC->caption(), $pharmacy_purchaseorder_edit->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->QTY->Required) { ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->QTY->caption(), $pharmacy_purchaseorder_edit->QTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->QTY->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->DT->caption(), $pharmacy_purchaseorder_edit->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->DT->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->PC->caption(), $pharmacy_purchaseorder_edit->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->YM->Required) { ?>
				elm = this.getElements("x" + infix + "_YM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->YM->caption(), $pharmacy_purchaseorder_edit->YM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->MFRCODE->caption(), $pharmacy_purchaseorder_edit->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->Stock->Required) { ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->Stock->caption(), $pharmacy_purchaseorder_edit->Stock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->Stock->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->LastMonthSale->Required) { ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->LastMonthSale->caption(), $pharmacy_purchaseorder_edit->LastMonthSale->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->LastMonthSale->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->Printcheck->Required) { ?>
				elm = this.getElements("x" + infix + "_Printcheck");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->Printcheck->caption(), $pharmacy_purchaseorder_edit->Printcheck->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->id->caption(), $pharmacy_purchaseorder_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->poid->Required) { ?>
				elm = this.getElements("x" + infix + "_poid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->poid->caption(), $pharmacy_purchaseorder_edit->poid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_poid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->poid->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->PSGST->caption(), $pharmacy_purchaseorder_edit->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->PCGST->caption(), $pharmacy_purchaseorder_edit->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->SSGST->caption(), $pharmacy_purchaseorder_edit->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->SCGST->caption(), $pharmacy_purchaseorder_edit->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->BRCODE->caption(), $pharmacy_purchaseorder_edit->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->BRCODE->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->HSN->Required) { ?>
				elm = this.getElements("x" + infix + "_HSN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->HSN->caption(), $pharmacy_purchaseorder_edit->HSN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->Pack->Required) { ?>
				elm = this.getElements("x" + infix + "_Pack");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->Pack->caption(), $pharmacy_purchaseorder_edit->Pack->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->PUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->PUnit->caption(), $pharmacy_purchaseorder_edit->PUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->PUnit->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->SUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->SUnit->caption(), $pharmacy_purchaseorder_edit->SUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->SUnit->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->GrnQuantity->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->GrnQuantity->caption(), $pharmacy_purchaseorder_edit->GrnQuantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->GrnQuantity->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->GrnMRP->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnMRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->GrnMRP->caption(), $pharmacy_purchaseorder_edit->GrnMRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnMRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->GrnMRP->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->trid->Required) { ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->trid->caption(), $pharmacy_purchaseorder_edit->trid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->trid->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->HospID->caption(), $pharmacy_purchaseorder_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->CreatedBy->caption(), $pharmacy_purchaseorder_edit->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->CreatedDateTime->caption(), $pharmacy_purchaseorder_edit->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->ModifiedBy->caption(), $pharmacy_purchaseorder_edit->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->ModifiedDateTime->caption(), $pharmacy_purchaseorder_edit->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->grncreatedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->grncreatedby->caption(), $pharmacy_purchaseorder_edit->grncreatedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grncreatedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->grncreatedby->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->grncreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->grncreatedDateTime->caption(), $pharmacy_purchaseorder_edit->grncreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grncreatedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->grncreatedDateTime->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->grnModifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->grnModifiedby->caption(), $pharmacy_purchaseorder_edit->grnModifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grnModifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->grnModifiedby->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->grnModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->grnModifiedDateTime->caption(), $pharmacy_purchaseorder_edit->grnModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grnModifiedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->grnModifiedDateTime->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->Received->Required) { ?>
				elm = this.getElements("x" + infix + "_Received[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->Received->caption(), $pharmacy_purchaseorder_edit->Received->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_edit->BillDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->BillDate->caption(), $pharmacy_purchaseorder_edit->BillDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->BillDate->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_edit->CurStock->Required) { ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_edit->CurStock->caption(), $pharmacy_purchaseorder_edit->CurStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_edit->CurStock->errorMessage()) ?>");

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
	fpharmacy_purchaseorderedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_purchaseorderedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_purchaseorderedit.lists["x_PRC"] = <?php echo $pharmacy_purchaseorder_edit->PRC->Lookup->toClientList($pharmacy_purchaseorder_edit) ?>;
	fpharmacy_purchaseorderedit.lists["x_PRC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_edit->PRC->lookupOptions()) ?>;
	fpharmacy_purchaseorderedit.autoSuggests["x_PRC"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_purchaseorderedit.lists["x_PC"] = <?php echo $pharmacy_purchaseorder_edit->PC->Lookup->toClientList($pharmacy_purchaseorder_edit) ?>;
	fpharmacy_purchaseorderedit.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_edit->PC->lookupOptions()) ?>;
	fpharmacy_purchaseorderedit.lists["x_Received[]"] = <?php echo $pharmacy_purchaseorder_edit->Received->Lookup->toClientList($pharmacy_purchaseorder_edit) ?>;
	fpharmacy_purchaseorderedit.lists["x_Received[]"].options = <?php echo JsonEncode($pharmacy_purchaseorder_edit->Received->options(FALSE, TRUE)) ?>;
	loadjs.done("fpharmacy_purchaseorderedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_purchaseorder_edit->showPageHeader(); ?>
<?php
$pharmacy_purchaseorder_edit->showMessage();
?>
<form name="fpharmacy_purchaseorderedit" id="fpharmacy_purchaseorderedit" class="<?php echo $pharmacy_purchaseorder_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchaseorder_edit->IsModal ?>">
<?php if ($pharmacy_purchaseorder->getCurrentMasterTable() == "pharmacy_po") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_po">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->poid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_purchaseorder_edit->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_ORDNO" for="x_ORDNO" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->ORDNO->caption() ?><?php echo $pharmacy_purchaseorder_edit->ORDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->ORDNO->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ORDNO">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->ORDNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->ORDNO->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->ORDNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PRC" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->PRC->caption() ?><?php echo $pharmacy_purchaseorder_edit->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PRC">
<?php
$onchange = $pharmacy_purchaseorder_edit->PRC->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchaseorder_edit->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x_PRC">
	<input type="text" class="form-control" name="sv_x_PRC" id="sv_x_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder_edit->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder_edit->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder_edit->PRC->displayValueSeparatorAttribute() ?>" name="x_PRC" id="x_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->PRC->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchaseorderedit"], function() {
	fpharmacy_purchaseorderedit.createAutoSuggest({"id":"x_PRC","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchaseorder_edit->PRC->Lookup->getParamTag($pharmacy_purchaseorder_edit, "p_x_PRC") ?>
</span>
<?php echo $pharmacy_purchaseorder_edit->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_QTY" for="x_QTY" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->QTY->caption() ?><?php echo $pharmacy_purchaseorder_edit->QTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->QTY->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_QTY">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x_QTY" id="x_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->QTY->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_DT" for="x_DT" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->DT->caption() ?><?php echo $pharmacy_purchaseorder_edit->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_DT">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->DT->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->DT->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_edit->DT->ReadOnly && !$pharmacy_purchaseorder_edit->DT->Disabled && !isset($pharmacy_purchaseorder_edit->DT->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_edit->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder_edit->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PC" for="x_PC" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->PC->caption() ?><?php echo $pharmacy_purchaseorder_edit->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->PC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PC">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PC"><?php echo EmptyValue(strval($pharmacy_purchaseorder_edit->PC->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_purchaseorder_edit->PC->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_purchaseorder_edit->PC->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_purchaseorder_edit->PC->ReadOnly || $pharmacy_purchaseorder_edit->PC->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PC',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_purchaseorder_edit->PC->Lookup->getParamTag($pharmacy_purchaseorder_edit, "p_x_PC") ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PC" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_purchaseorder_edit->PC->displayValueSeparatorAttribute() ?>" name="x_PC" id="x_PC" value="<?php echo $pharmacy_purchaseorder_edit->PC->CurrentValue ?>"<?php echo $pharmacy_purchaseorder_edit->PC->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_YM" for="x_YM" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->YM->caption() ?><?php echo $pharmacy_purchaseorder_edit->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->YM->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_YM">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_YM" name="x_YM" id="x_YM" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->YM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->YM->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->YM->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->MFRCODE->caption() ?><?php echo $pharmacy_purchaseorder_edit->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_MFRCODE">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->MFRCODE->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Stock" for="x_Stock" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->Stock->caption() ?><?php echo $pharmacy_purchaseorder_edit->Stock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->Stock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Stock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x_Stock" id="x_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->Stock->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_LastMonthSale" for="x_LastMonthSale" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->LastMonthSale->caption() ?><?php echo $pharmacy_purchaseorder_edit->LastMonthSale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->LastMonthSale->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_LastMonthSale">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->LastMonthSale->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Printcheck" for="x_Printcheck" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->Printcheck->caption() ?><?php echo $pharmacy_purchaseorder_edit->Printcheck->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->Printcheck->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Printcheck">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->Printcheck->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->Printcheck->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->Printcheck->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_id" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->id->caption() ?><?php echo $pharmacy_purchaseorder_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->id->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_id">
<span<?php echo $pharmacy_purchaseorder_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->id->CurrentValue) ?>">
<?php echo $pharmacy_purchaseorder_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_poid" for="x_poid" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->poid->caption() ?><?php echo $pharmacy_purchaseorder_edit->poid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->poid->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder_edit->poid->getSessionValue() != "") { ?>
<span id="el_pharmacy_purchaseorder_poid">
<span<?php echo $pharmacy_purchaseorder_edit->poid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_edit->poid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_poid" name="x_poid" value="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->poid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_purchaseorder_poid">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->poid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->poid->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->poid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_purchaseorder_edit->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PSGST" for="x_PSGST" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->PSGST->caption() ?><?php echo $pharmacy_purchaseorder_edit->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PSGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->PSGST->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PCGST" for="x_PCGST" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->PCGST->caption() ?><?php echo $pharmacy_purchaseorder_edit->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PCGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->PCGST->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_SSGST" for="x_SSGST" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->SSGST->caption() ?><?php echo $pharmacy_purchaseorder_edit->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SSGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->SSGST->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_SCGST" for="x_SCGST" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->SCGST->caption() ?><?php echo $pharmacy_purchaseorder_edit->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SCGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->SCGST->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_BRCODE" for="x_BRCODE" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->BRCODE->caption() ?><?php echo $pharmacy_purchaseorder_edit->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BRCODE">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->BRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->BRCODE->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->BRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_HSN" for="x_HSN" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->HSN->caption() ?><?php echo $pharmacy_purchaseorder_edit->HSN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->HSN->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_HSN">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_HSN" name="x_HSN" id="x_HSN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->HSN->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->HSN->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->HSN->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Pack" for="x_Pack" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->Pack->caption() ?><?php echo $pharmacy_purchaseorder_edit->Pack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->Pack->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Pack">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->Pack->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->Pack->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->Pack->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PUnit" for="x_PUnit" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->PUnit->caption() ?><?php echo $pharmacy_purchaseorder_edit->PUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PUnit">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->PUnit->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->PUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_SUnit" for="x_SUnit" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->SUnit->caption() ?><?php echo $pharmacy_purchaseorder_edit->SUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SUnit">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->SUnit->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->SUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_GrnQuantity" for="x_GrnQuantity" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->GrnQuantity->caption() ?><?php echo $pharmacy_purchaseorder_edit->GrnQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->GrnQuantity->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnQuantity">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->GrnQuantity->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_GrnMRP" for="x_GrnMRP" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->GrnMRP->caption() ?><?php echo $pharmacy_purchaseorder_edit->GrnMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->GrnMRP->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnMRP">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->GrnMRP->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->GrnMRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_trid" for="x_trid" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->trid->caption() ?><?php echo $pharmacy_purchaseorder_edit->trid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->trid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_trid">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->trid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->trid->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->trid->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->grncreatedby->Visible) { // grncreatedby ?>
	<div id="r_grncreatedby" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grncreatedby" for="x_grncreatedby" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->grncreatedby->caption() ?><?php echo $pharmacy_purchaseorder_edit->grncreatedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->grncreatedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedby">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grncreatedby" name="x_grncreatedby" id="x_grncreatedby" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->grncreatedby->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->grncreatedby->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->grncreatedby->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->grncreatedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<div id="r_grncreatedDateTime" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grncreatedDateTime" for="x_grncreatedDateTime" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->grncreatedDateTime->caption() ?><?php echo $pharmacy_purchaseorder_edit->grncreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->grncreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedDateTime">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grncreatedDateTime" name="x_grncreatedDateTime" id="x_grncreatedDateTime" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->grncreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->grncreatedDateTime->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->grncreatedDateTime->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_edit->grncreatedDateTime->ReadOnly && !$pharmacy_purchaseorder_edit->grncreatedDateTime->Disabled && !isset($pharmacy_purchaseorder_edit->grncreatedDateTime->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_edit->grncreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderedit", "x_grncreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder_edit->grncreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->grnModifiedby->Visible) { // grnModifiedby ?>
	<div id="r_grnModifiedby" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grnModifiedby" for="x_grnModifiedby" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->grnModifiedby->caption() ?><?php echo $pharmacy_purchaseorder_edit->grnModifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->grnModifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedby">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grnModifiedby" name="x_grnModifiedby" id="x_grnModifiedby" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->grnModifiedby->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->grnModifiedby->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->grnModifiedby->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->grnModifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<div id="r_grnModifiedDateTime" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grnModifiedDateTime" for="x_grnModifiedDateTime" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->grnModifiedDateTime->caption() ?><?php echo $pharmacy_purchaseorder_edit->grnModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedDateTime">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grnModifiedDateTime" name="x_grnModifiedDateTime" id="x_grnModifiedDateTime" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->grnModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->grnModifiedDateTime->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->grnModifiedDateTime->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_edit->grnModifiedDateTime->ReadOnly && !$pharmacy_purchaseorder_edit->grnModifiedDateTime->Disabled && !isset($pharmacy_purchaseorder_edit->grnModifiedDateTime->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_edit->grnModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderedit", "x_grnModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder_edit->grnModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Received" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->Received->caption() ?><?php echo $pharmacy_purchaseorder_edit->Received->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->Received->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Received">
<div id="tp_x_Received" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="pharmacy_purchaseorder" data-field="x_Received" data-value-separator="<?php echo $pharmacy_purchaseorder_edit->Received->displayValueSeparatorAttribute() ?>" name="x_Received[]" id="x_Received[]" value="{value}"<?php echo $pharmacy_purchaseorder_edit->Received->editAttributes() ?>></div>
<div id="dsl_x_Received" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_purchaseorder_edit->Received->checkBoxListHtml(FALSE, "x_Received[]") ?>
</div></div>
</span>
<?php echo $pharmacy_purchaseorder_edit->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_BillDate" for="x_BillDate" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->BillDate->caption() ?><?php echo $pharmacy_purchaseorder_edit->BillDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->BillDate->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BillDate">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_edit->BillDate->ReadOnly && !$pharmacy_purchaseorder_edit->BillDate->Disabled && !isset($pharmacy_purchaseorder_edit->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_edit->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderedit", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder_edit->BillDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder_edit->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_CurStock" for="x_CurStock" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder_edit->CurStock->caption() ?><?php echo $pharmacy_purchaseorder_edit->CurStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchaseorder_edit->CurStock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CurStock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_edit->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_edit->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder_edit->CurStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder_edit->CurStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_purchaseorder_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_purchaseorder_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_purchaseorder_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_purchaseorder_edit->showPageFooter();
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
$pharmacy_purchaseorder_edit->terminate();
?>