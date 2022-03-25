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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_purchaseorderedit = currentForm = new ew.Form("fpharmacy_purchaseorderedit", "edit");

// Validate form
fpharmacy_purchaseorderedit.validate = function() {
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
		<?php if ($pharmacy_purchaseorder_edit->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->ORDNO->caption(), $pharmacy_purchaseorder->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->PRC->caption(), $pharmacy_purchaseorder->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->QTY->Required) { ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->QTY->caption(), $pharmacy_purchaseorder->QTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->QTY->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->DT->caption(), $pharmacy_purchaseorder->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->DT->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->PC->caption(), $pharmacy_purchaseorder->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->YM->caption(), $pharmacy_purchaseorder->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->MFRCODE->caption(), $pharmacy_purchaseorder->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->Stock->Required) { ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->Stock->caption(), $pharmacy_purchaseorder->Stock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->Stock->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->LastMonthSale->Required) { ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->LastMonthSale->caption(), $pharmacy_purchaseorder->LastMonthSale->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->LastMonthSale->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->Printcheck->Required) { ?>
			elm = this.getElements("x" + infix + "_Printcheck");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->Printcheck->caption(), $pharmacy_purchaseorder->Printcheck->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->id->caption(), $pharmacy_purchaseorder->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->poid->Required) { ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->poid->caption(), $pharmacy_purchaseorder->poid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->poid->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->PSGST->caption(), $pharmacy_purchaseorder->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->PCGST->caption(), $pharmacy_purchaseorder->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->SSGST->caption(), $pharmacy_purchaseorder->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->SCGST->caption(), $pharmacy_purchaseorder->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->BRCODE->caption(), $pharmacy_purchaseorder->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->BRCODE->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->HSN->Required) { ?>
			elm = this.getElements("x" + infix + "_HSN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->HSN->caption(), $pharmacy_purchaseorder->HSN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->Pack->Required) { ?>
			elm = this.getElements("x" + infix + "_Pack");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->Pack->caption(), $pharmacy_purchaseorder->Pack->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->PUnit->caption(), $pharmacy_purchaseorder->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->PUnit->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->SUnit->caption(), $pharmacy_purchaseorder->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->SUnit->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->GrnQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->GrnQuantity->caption(), $pharmacy_purchaseorder->GrnQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->GrnQuantity->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->GrnMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->GrnMRP->caption(), $pharmacy_purchaseorder->GrnMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->GrnMRP->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->trid->Required) { ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->trid->caption(), $pharmacy_purchaseorder->trid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->trid->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->HospID->caption(), $pharmacy_purchaseorder->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->CreatedBy->caption(), $pharmacy_purchaseorder->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->CreatedDateTime->caption(), $pharmacy_purchaseorder->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->ModifiedBy->caption(), $pharmacy_purchaseorder->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->ModifiedDateTime->caption(), $pharmacy_purchaseorder->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->grncreatedby->caption(), $pharmacy_purchaseorder->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->grncreatedby->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->grncreatedDateTime->caption(), $pharmacy_purchaseorder->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->grncreatedDateTime->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->grnModifiedby->caption(), $pharmacy_purchaseorder->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->grnModifiedby->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->grnModifiedDateTime->caption(), $pharmacy_purchaseorder->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->grnModifiedDateTime->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->Received->Required) { ?>
			elm = this.getElements("x" + infix + "_Received[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->Received->caption(), $pharmacy_purchaseorder->Received->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->BillDate->caption(), $pharmacy_purchaseorder->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->BillDate->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->CurStock->Required) { ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->CurStock->caption(), $pharmacy_purchaseorder->CurStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->CurStock->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->grndate->Required) { ?>
			elm = this.getElements("x" + infix + "_grndate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->grndate->caption(), $pharmacy_purchaseorder->grndate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->grndatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_grndatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->grndatetime->caption(), $pharmacy_purchaseorder->grndatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_edit->strid->Required) { ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->strid->caption(), $pharmacy_purchaseorder->strid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->strid->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->GRNPer->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->GRNPer->caption(), $pharmacy_purchaseorder->GRNPer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->GRNPer->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_edit->FreeQtyyy->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->FreeQtyyy->caption(), $pharmacy_purchaseorder->FreeQtyyy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->FreeQtyyy->errorMessage()) ?>");

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
fpharmacy_purchaseorderedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchaseorderedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_purchaseorderedit.lists["x_PRC"] = <?php echo $pharmacy_purchaseorder_edit->PRC->Lookup->toClientList() ?>;
fpharmacy_purchaseorderedit.lists["x_PRC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_edit->PRC->lookupOptions()) ?>;
fpharmacy_purchaseorderedit.autoSuggests["x_PRC"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_purchaseorderedit.lists["x_PC"] = <?php echo $pharmacy_purchaseorder_edit->PC->Lookup->toClientList() ?>;
fpharmacy_purchaseorderedit.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_edit->PC->lookupOptions()) ?>;
fpharmacy_purchaseorderedit.lists["x_Received[]"] = <?php echo $pharmacy_purchaseorder_edit->Received->Lookup->toClientList() ?>;
fpharmacy_purchaseorderedit.lists["x_Received[]"].options = <?php echo JsonEncode($pharmacy_purchaseorder_edit->Received->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_purchaseorder_edit->showPageHeader(); ?>
<?php
$pharmacy_purchaseorder_edit->showMessage();
?>
<form name="fpharmacy_purchaseorderedit" id="fpharmacy_purchaseorderedit" class="<?php echo $pharmacy_purchaseorder_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_purchaseorder_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_purchaseorder_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchaseorder_edit->IsModal ?>">
<?php if ($pharmacy_purchaseorder->getCurrentMasterTable() == "pharmacy_po") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_po">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_purchaseorder->poid->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_purchaseorder->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_ORDNO" for="x_ORDNO" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->ORDNO->caption() ?><?php echo ($pharmacy_purchaseorder->ORDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->ORDNO->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ORDNO">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->ORDNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->ORDNO->EditValue ?>"<?php echo $pharmacy_purchaseorder->ORDNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PRC" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->PRC->caption() ?><?php echo ($pharmacy_purchaseorder->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PRC">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_purchaseorder->PRC->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_purchaseorder->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x_PRC" class="text-nowrap" style="z-index: 8980">
	<input type="text" class="form-control" name="sv_x_PRC" id="sv_x_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder->PRC->displayValueSeparatorAttribute() ?>" name="x_PRC" id="x_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_purchaseorderedit.createAutoSuggest({"id":"x_PRC","forceSelect":true});
</script>
<?php echo $pharmacy_purchaseorder->PRC->Lookup->getParamTag("p_x_PRC") ?>
</span>
<?php echo $pharmacy_purchaseorder->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_QTY" for="x_QTY" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->QTY->caption() ?><?php echo ($pharmacy_purchaseorder->QTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->QTY->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_QTY">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x_QTY" id="x_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder->QTY->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_DT" for="x_DT" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->DT->caption() ?><?php echo ($pharmacy_purchaseorder->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_DT">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->DT->EditValue ?>"<?php echo $pharmacy_purchaseorder->DT->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder->DT->ReadOnly && !$pharmacy_purchaseorder->DT->Disabled && !isset($pharmacy_purchaseorder->DT->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_purchaseorderedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PC" for="x_PC" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->PC->caption() ?><?php echo ($pharmacy_purchaseorder->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->PC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PC">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PC"><?php echo strval($pharmacy_purchaseorder->PC->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_purchaseorder->PC->ViewValue) : $pharmacy_purchaseorder->PC->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_purchaseorder->PC->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_purchaseorder->PC->ReadOnly || $pharmacy_purchaseorder->PC->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PC',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_purchaseorder->PC->Lookup->getParamTag("p_x_PC") ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PC" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_purchaseorder->PC->displayValueSeparatorAttribute() ?>" name="x_PC" id="x_PC" value="<?php echo $pharmacy_purchaseorder->PC->CurrentValue ?>"<?php echo $pharmacy_purchaseorder->PC->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_YM" for="x_YM" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->YM->caption() ?><?php echo ($pharmacy_purchaseorder->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->YM->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_YM">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_YM" name="x_YM" id="x_YM" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->YM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->YM->EditValue ?>"<?php echo $pharmacy_purchaseorder->YM->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->MFRCODE->caption() ?><?php echo ($pharmacy_purchaseorder->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_MFRCODE">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->MFRCODE->EditValue ?>"<?php echo $pharmacy_purchaseorder->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Stock" for="x_Stock" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->Stock->caption() ?><?php echo ($pharmacy_purchaseorder->Stock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->Stock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Stock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x_Stock" id="x_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder->Stock->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_LastMonthSale" for="x_LastMonthSale" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->LastMonthSale->caption() ?><?php echo ($pharmacy_purchaseorder->LastMonthSale->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->LastMonthSale->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_LastMonthSale">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder->LastMonthSale->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Printcheck" for="x_Printcheck" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->Printcheck->caption() ?><?php echo ($pharmacy_purchaseorder->Printcheck->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->Printcheck->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Printcheck">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->Printcheck->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->Printcheck->EditValue ?>"<?php echo $pharmacy_purchaseorder->Printcheck->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_id" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->id->caption() ?><?php echo ($pharmacy_purchaseorder->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->id->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_id">
<span<?php echo $pharmacy_purchaseorder->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder->id->CurrentValue) ?>">
<?php echo $pharmacy_purchaseorder->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_poid" for="x_poid" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->poid->caption() ?><?php echo ($pharmacy_purchaseorder->poid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->poid->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->poid->getSessionValue() <> "") { ?>
<span id="el_pharmacy_purchaseorder_poid">
<span<?php echo $pharmacy_purchaseorder->poid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->poid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_poid" name="x_poid" value="<?php echo HtmlEncode($pharmacy_purchaseorder->poid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_purchaseorder_poid">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->poid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->poid->EditValue ?>"<?php echo $pharmacy_purchaseorder->poid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_purchaseorder->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PSGST" for="x_PSGST" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->PSGST->caption() ?><?php echo ($pharmacy_purchaseorder->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PSGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->PSGST->EditValue ?>"<?php echo $pharmacy_purchaseorder->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PCGST" for="x_PCGST" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->PCGST->caption() ?><?php echo ($pharmacy_purchaseorder->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PCGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->PCGST->EditValue ?>"<?php echo $pharmacy_purchaseorder->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_SSGST" for="x_SSGST" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->SSGST->caption() ?><?php echo ($pharmacy_purchaseorder->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SSGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->SSGST->EditValue ?>"<?php echo $pharmacy_purchaseorder->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_SCGST" for="x_SCGST" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->SCGST->caption() ?><?php echo ($pharmacy_purchaseorder->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SCGST">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->SCGST->EditValue ?>"<?php echo $pharmacy_purchaseorder->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_BRCODE" for="x_BRCODE" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->BRCODE->caption() ?><?php echo ($pharmacy_purchaseorder->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BRCODE">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->BRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->BRCODE->EditValue ?>"<?php echo $pharmacy_purchaseorder->BRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_HSN" for="x_HSN" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->HSN->caption() ?><?php echo ($pharmacy_purchaseorder->HSN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->HSN->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_HSN">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_HSN" name="x_HSN" id="x_HSN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->HSN->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->HSN->EditValue ?>"<?php echo $pharmacy_purchaseorder->HSN->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Pack" for="x_Pack" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->Pack->caption() ?><?php echo ($pharmacy_purchaseorder->Pack->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->Pack->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Pack">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->Pack->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->Pack->EditValue ?>"<?php echo $pharmacy_purchaseorder->Pack->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_PUnit" for="x_PUnit" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->PUnit->caption() ?><?php echo ($pharmacy_purchaseorder->PUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PUnit">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->PUnit->EditValue ?>"<?php echo $pharmacy_purchaseorder->PUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_SUnit" for="x_SUnit" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->SUnit->caption() ?><?php echo ($pharmacy_purchaseorder->SUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SUnit">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->SUnit->EditValue ?>"<?php echo $pharmacy_purchaseorder->SUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_GrnQuantity" for="x_GrnQuantity" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->GrnQuantity->caption() ?><?php echo ($pharmacy_purchaseorder->GrnQuantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->GrnQuantity->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnQuantity">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->GrnQuantity->EditValue ?>"<?php echo $pharmacy_purchaseorder->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_GrnMRP" for="x_GrnMRP" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->GrnMRP->caption() ?><?php echo ($pharmacy_purchaseorder->GrnMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->GrnMRP->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnMRP">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->GrnMRP->EditValue ?>"<?php echo $pharmacy_purchaseorder->GrnMRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_trid" for="x_trid" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->trid->caption() ?><?php echo ($pharmacy_purchaseorder->trid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->trid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_trid">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->trid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->trid->EditValue ?>"<?php echo $pharmacy_purchaseorder->trid->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grncreatedby->Visible) { // grncreatedby ?>
	<div id="r_grncreatedby" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grncreatedby" for="x_grncreatedby" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->grncreatedby->caption() ?><?php echo ($pharmacy_purchaseorder->grncreatedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->grncreatedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedby">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grncreatedby" name="x_grncreatedby" id="x_grncreatedby" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->grncreatedby->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->grncreatedby->EditValue ?>"<?php echo $pharmacy_purchaseorder->grncreatedby->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->grncreatedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<div id="r_grncreatedDateTime" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grncreatedDateTime" for="x_grncreatedDateTime" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->grncreatedDateTime->caption() ?><?php echo ($pharmacy_purchaseorder->grncreatedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->grncreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedDateTime">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grncreatedDateTime" name="x_grncreatedDateTime" id="x_grncreatedDateTime" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->grncreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->grncreatedDateTime->EditValue ?>"<?php echo $pharmacy_purchaseorder->grncreatedDateTime->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder->grncreatedDateTime->ReadOnly && !$pharmacy_purchaseorder->grncreatedDateTime->Disabled && !isset($pharmacy_purchaseorder->grncreatedDateTime->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder->grncreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_purchaseorderedit", "x_grncreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder->grncreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grnModifiedby->Visible) { // grnModifiedby ?>
	<div id="r_grnModifiedby" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grnModifiedby" for="x_grnModifiedby" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->grnModifiedby->caption() ?><?php echo ($pharmacy_purchaseorder->grnModifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->grnModifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedby">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grnModifiedby" name="x_grnModifiedby" id="x_grnModifiedby" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->grnModifiedby->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->grnModifiedby->EditValue ?>"<?php echo $pharmacy_purchaseorder->grnModifiedby->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->grnModifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<div id="r_grnModifiedDateTime" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_grnModifiedDateTime" for="x_grnModifiedDateTime" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->grnModifiedDateTime->caption() ?><?php echo ($pharmacy_purchaseorder->grnModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedDateTime">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_grnModifiedDateTime" name="x_grnModifiedDateTime" id="x_grnModifiedDateTime" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->grnModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->grnModifiedDateTime->EditValue ?>"<?php echo $pharmacy_purchaseorder->grnModifiedDateTime->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder->grnModifiedDateTime->ReadOnly && !$pharmacy_purchaseorder->grnModifiedDateTime->Disabled && !isset($pharmacy_purchaseorder->grnModifiedDateTime->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder->grnModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_purchaseorderedit", "x_grnModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder->grnModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_Received" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->Received->caption() ?><?php echo ($pharmacy_purchaseorder->Received->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->Received->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Received">
<div id="tp_x_Received" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_purchaseorder" data-field="x_Received" data-value-separator="<?php echo $pharmacy_purchaseorder->Received->displayValueSeparatorAttribute() ?>" name="x_Received[]" id="x_Received[]" value="{value}"<?php echo $pharmacy_purchaseorder->Received->editAttributes() ?>></div>
<div id="dsl_x_Received" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_purchaseorder->Received->checkBoxListHtml(FALSE, "x_Received[]") ?>
</div></div>
</span>
<?php echo $pharmacy_purchaseorder->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_BillDate" for="x_BillDate" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->BillDate->caption() ?><?php echo ($pharmacy_purchaseorder->BillDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->BillDate->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BillDate">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder->BillDate->ReadOnly && !$pharmacy_purchaseorder->BillDate->Disabled && !isset($pharmacy_purchaseorder->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_purchaseorderedit", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchaseorder->BillDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_CurStock" for="x_CurStock" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->CurStock->caption() ?><?php echo ($pharmacy_purchaseorder->CurStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->CurStock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CurStock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder->CurStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->CurStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->strid->Visible) { // strid ?>
	<div id="r_strid" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_strid" for="x_strid" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->strid->caption() ?><?php echo ($pharmacy_purchaseorder->strid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->strid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_strid">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x_strid" id="x_strid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->strid->EditValue ?>"<?php echo $pharmacy_purchaseorder->strid->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->strid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GRNPer->Visible) { // GRNPer ?>
	<div id="r_GRNPer" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_GRNPer" for="x_GRNPer" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->GRNPer->caption() ?><?php echo ($pharmacy_purchaseorder->GRNPer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->GRNPer->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GRNPer">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x_GRNPer" id="x_GRNPer" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->GRNPer->EditValue ?>"<?php echo $pharmacy_purchaseorder->GRNPer->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->GRNPer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<div id="r_FreeQtyyy" class="form-group row">
		<label id="elh_pharmacy_purchaseorder_FreeQtyyy" for="x_FreeQtyyy" class="<?php echo $pharmacy_purchaseorder_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchaseorder->FreeQtyyy->caption() ?><?php echo ($pharmacy_purchaseorder->FreeQtyyy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchaseorder->FreeQtyyy->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_FreeQtyyy">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x_FreeQtyyy" id="x_FreeQtyyy" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->FreeQtyyy->EditValue ?>"<?php echo $pharmacy_purchaseorder->FreeQtyyy->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchaseorder->FreeQtyyy->CustomMsg ?></div></div>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_purchaseorder_edit->terminate();
?>