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
$store_purchaseorder_edit = new store_purchaseorder_edit();

// Run the page
$store_purchaseorder_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_purchaseorder_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fstore_purchaseorderedit = currentForm = new ew.Form("fstore_purchaseorderedit", "edit");

// Validate form
fstore_purchaseorderedit.validate = function() {
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
		<?php if ($store_purchaseorder_edit->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->ORDNO->caption(), $store_purchaseorder->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->PRC->caption(), $store_purchaseorder->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->QTY->Required) { ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->QTY->caption(), $store_purchaseorder->QTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->QTY->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->DT->caption(), $store_purchaseorder->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->DT->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->PC->caption(), $store_purchaseorder->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->YM->caption(), $store_purchaseorder->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->MFRCODE->caption(), $store_purchaseorder->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->Stock->Required) { ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->Stock->caption(), $store_purchaseorder->Stock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->Stock->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->LastMonthSale->Required) { ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->LastMonthSale->caption(), $store_purchaseorder->LastMonthSale->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->LastMonthSale->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->Printcheck->Required) { ?>
			elm = this.getElements("x" + infix + "_Printcheck");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->Printcheck->caption(), $store_purchaseorder->Printcheck->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->id->caption(), $store_purchaseorder->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->poid->Required) { ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->poid->caption(), $store_purchaseorder->poid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->poid->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->grnid->Required) { ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->grnid->caption(), $store_purchaseorder->grnid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->grnid->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->BatchNo->caption(), $store_purchaseorder->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->ExpDate->caption(), $store_purchaseorder->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->ExpDate->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->PrName->caption(), $store_purchaseorder->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->Quantity->caption(), $store_purchaseorder->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->Quantity->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->FreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->FreeQty->caption(), $store_purchaseorder->FreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->FreeQty->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->ItemValue->caption(), $store_purchaseorder->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->ItemValue->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->Disc->Required) { ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->Disc->caption(), $store_purchaseorder->Disc->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->Disc->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->PTax->Required) { ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->PTax->caption(), $store_purchaseorder->PTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->PTax->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->MRP->caption(), $store_purchaseorder->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->MRP->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->SalTax->Required) { ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->SalTax->caption(), $store_purchaseorder->SalTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->SalTax->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->PurValue->caption(), $store_purchaseorder->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->PurValue->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->PurRate->caption(), $store_purchaseorder->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->PurRate->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->SalRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->SalRate->caption(), $store_purchaseorder->SalRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->SalRate->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->Discount->caption(), $store_purchaseorder->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->Discount->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->PSGST->caption(), $store_purchaseorder->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->PSGST->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->PCGST->caption(), $store_purchaseorder->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->PCGST->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->SSGST->caption(), $store_purchaseorder->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->SSGST->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->SCGST->caption(), $store_purchaseorder->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->SCGST->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->BRCODE->caption(), $store_purchaseorder->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->BRCODE->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->HSN->Required) { ?>
			elm = this.getElements("x" + infix + "_HSN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->HSN->caption(), $store_purchaseorder->HSN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->Pack->Required) { ?>
			elm = this.getElements("x" + infix + "_Pack");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->Pack->caption(), $store_purchaseorder->Pack->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->PUnit->caption(), $store_purchaseorder->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->PUnit->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->SUnit->caption(), $store_purchaseorder->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->SUnit->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->GrnQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->GrnQuantity->caption(), $store_purchaseorder->GrnQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->GrnQuantity->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->GrnMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->GrnMRP->caption(), $store_purchaseorder->GrnMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->GrnMRP->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->trid->Required) { ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->trid->caption(), $store_purchaseorder->trid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->trid->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->HospID->caption(), $store_purchaseorder->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->HospID->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->CreatedBy->caption(), $store_purchaseorder->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->CreatedBy->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->CreatedDateTime->caption(), $store_purchaseorder->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->CreatedDateTime->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->ModifiedBy->caption(), $store_purchaseorder->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->ModifiedBy->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->ModifiedDateTime->caption(), $store_purchaseorder->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->ModifiedDateTime->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->grncreatedby->caption(), $store_purchaseorder->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->grncreatedby->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->grncreatedDateTime->caption(), $store_purchaseorder->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->grncreatedDateTime->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->grnModifiedby->caption(), $store_purchaseorder->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->grnModifiedby->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->grnModifiedDateTime->caption(), $store_purchaseorder->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->grnModifiedDateTime->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->Received->Required) { ?>
			elm = this.getElements("x" + infix + "_Received");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->Received->caption(), $store_purchaseorder->Received->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_purchaseorder_edit->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->BillDate->caption(), $store_purchaseorder->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->BillDate->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->CurStock->Required) { ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->CurStock->caption(), $store_purchaseorder->CurStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->CurStock->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->FreeQtyyy->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->FreeQtyyy->caption(), $store_purchaseorder->FreeQtyyy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->FreeQtyyy->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->grndate->Required) { ?>
			elm = this.getElements("x" + infix + "_grndate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->grndate->caption(), $store_purchaseorder->grndate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grndate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->grndate->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->grndatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_grndatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->grndatetime->caption(), $store_purchaseorder->grndatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grndatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->grndatetime->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->strid->Required) { ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->strid->caption(), $store_purchaseorder->strid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->strid->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->GRNPer->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->GRNPer->caption(), $store_purchaseorder->GRNPer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_purchaseorder->GRNPer->errorMessage()) ?>");
		<?php if ($store_purchaseorder_edit->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_purchaseorder->StoreID->caption(), $store_purchaseorder->StoreID->RequiredErrorMessage)) ?>");
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
fstore_purchaseorderedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_purchaseorderedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_purchaseorder_edit->showPageHeader(); ?>
<?php
$store_purchaseorder_edit->showMessage();
?>
<form name="fstore_purchaseorderedit" id="fstore_purchaseorderedit" class="<?php echo $store_purchaseorder_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_purchaseorder_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_purchaseorder_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_purchaseorder">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$store_purchaseorder_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($store_purchaseorder->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_store_purchaseorder_ORDNO" for="x_ORDNO" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->ORDNO->caption() ?><?php echo ($store_purchaseorder->ORDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->ORDNO->cellAttributes() ?>>
<span id="el_store_purchaseorder_ORDNO">
<input type="text" data-table="store_purchaseorder" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_purchaseorder->ORDNO->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->ORDNO->EditValue ?>"<?php echo $store_purchaseorder->ORDNO->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_store_purchaseorder_PRC" for="x_PRC" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->PRC->caption() ?><?php echo ($store_purchaseorder->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->PRC->cellAttributes() ?>>
<span id="el_store_purchaseorder_PRC">
<input type="text" data-table="store_purchaseorder" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_purchaseorder->PRC->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->PRC->EditValue ?>"<?php echo $store_purchaseorder->PRC->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_store_purchaseorder_QTY" for="x_QTY" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->QTY->caption() ?><?php echo ($store_purchaseorder->QTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->QTY->cellAttributes() ?>>
<span id="el_store_purchaseorder_QTY">
<input type="text" data-table="store_purchaseorder" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->QTY->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->QTY->EditValue ?>"<?php echo $store_purchaseorder->QTY->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_store_purchaseorder_DT" for="x_DT" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->DT->caption() ?><?php echo ($store_purchaseorder->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->DT->cellAttributes() ?>>
<span id="el_store_purchaseorder_DT">
<input type="text" data-table="store_purchaseorder" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($store_purchaseorder->DT->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->DT->EditValue ?>"<?php echo $store_purchaseorder->DT->editAttributes() ?>>
<?php if (!$store_purchaseorder->DT->ReadOnly && !$store_purchaseorder->DT->Disabled && !isset($store_purchaseorder->DT->EditAttrs["readonly"]) && !isset($store_purchaseorder->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_purchaseorderedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_purchaseorder->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_store_purchaseorder_PC" for="x_PC" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->PC->caption() ?><?php echo ($store_purchaseorder->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->PC->cellAttributes() ?>>
<span id="el_store_purchaseorder_PC">
<input type="text" data-table="store_purchaseorder" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_purchaseorder->PC->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->PC->EditValue ?>"<?php echo $store_purchaseorder->PC->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_store_purchaseorder_YM" for="x_YM" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->YM->caption() ?><?php echo ($store_purchaseorder->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->YM->cellAttributes() ?>>
<span id="el_store_purchaseorder_YM">
<input type="text" data-table="store_purchaseorder" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($store_purchaseorder->YM->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->YM->EditValue ?>"<?php echo $store_purchaseorder->YM->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_store_purchaseorder_MFRCODE" for="x_MFRCODE" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->MFRCODE->caption() ?><?php echo ($store_purchaseorder->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->MFRCODE->cellAttributes() ?>>
<span id="el_store_purchaseorder_MFRCODE">
<input type="text" data-table="store_purchaseorder" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_purchaseorder->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->MFRCODE->EditValue ?>"<?php echo $store_purchaseorder->MFRCODE->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_store_purchaseorder_Stock" for="x_Stock" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->Stock->caption() ?><?php echo ($store_purchaseorder->Stock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->Stock->cellAttributes() ?>>
<span id="el_store_purchaseorder_Stock">
<input type="text" data-table="store_purchaseorder" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->Stock->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->Stock->EditValue ?>"<?php echo $store_purchaseorder->Stock->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_store_purchaseorder_LastMonthSale" for="x_LastMonthSale" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->LastMonthSale->caption() ?><?php echo ($store_purchaseorder->LastMonthSale->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->LastMonthSale->cellAttributes() ?>>
<span id="el_store_purchaseorder_LastMonthSale">
<input type="text" data-table="store_purchaseorder" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->LastMonthSale->EditValue ?>"<?php echo $store_purchaseorder->LastMonthSale->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_store_purchaseorder_Printcheck" for="x_Printcheck" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->Printcheck->caption() ?><?php echo ($store_purchaseorder->Printcheck->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->Printcheck->cellAttributes() ?>>
<span id="el_store_purchaseorder_Printcheck">
<input type="text" data-table="store_purchaseorder" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_purchaseorder->Printcheck->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->Printcheck->EditValue ?>"<?php echo $store_purchaseorder->Printcheck->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_store_purchaseorder_id" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->id->caption() ?><?php echo ($store_purchaseorder->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->id->cellAttributes() ?>>
<span id="el_store_purchaseorder_id">
<span<?php echo $store_purchaseorder->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_purchaseorder->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="store_purchaseorder" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($store_purchaseorder->id->CurrentValue) ?>">
<?php echo $store_purchaseorder->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_store_purchaseorder_poid" for="x_poid" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->poid->caption() ?><?php echo ($store_purchaseorder->poid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->poid->cellAttributes() ?>>
<span id="el_store_purchaseorder_poid">
<input type="text" data-table="store_purchaseorder" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->poid->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->poid->EditValue ?>"<?php echo $store_purchaseorder->poid->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label id="elh_store_purchaseorder_grnid" for="x_grnid" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->grnid->caption() ?><?php echo ($store_purchaseorder->grnid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->grnid->cellAttributes() ?>>
<span id="el_store_purchaseorder_grnid">
<input type="text" data-table="store_purchaseorder" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->grnid->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->grnid->EditValue ?>"<?php echo $store_purchaseorder->grnid->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->grnid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_store_purchaseorder_BatchNo" for="x_BatchNo" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->BatchNo->caption() ?><?php echo ($store_purchaseorder->BatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->BatchNo->cellAttributes() ?>>
<span id="el_store_purchaseorder_BatchNo">
<input type="text" data-table="store_purchaseorder" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_purchaseorder->BatchNo->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->BatchNo->EditValue ?>"<?php echo $store_purchaseorder->BatchNo->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label id="elh_store_purchaseorder_ExpDate" for="x_ExpDate" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->ExpDate->caption() ?><?php echo ($store_purchaseorder->ExpDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->ExpDate->cellAttributes() ?>>
<span id="el_store_purchaseorder_ExpDate">
<input type="text" data-table="store_purchaseorder" data-field="x_ExpDate" name="x_ExpDate" id="x_ExpDate" placeholder="<?php echo HtmlEncode($store_purchaseorder->ExpDate->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->ExpDate->EditValue ?>"<?php echo $store_purchaseorder->ExpDate->editAttributes() ?>>
<?php if (!$store_purchaseorder->ExpDate->ReadOnly && !$store_purchaseorder->ExpDate->Disabled && !isset($store_purchaseorder->ExpDate->EditAttrs["readonly"]) && !isset($store_purchaseorder->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_purchaseorderedit", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_purchaseorder->ExpDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_store_purchaseorder_PrName" for="x_PrName" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->PrName->caption() ?><?php echo ($store_purchaseorder->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->PrName->cellAttributes() ?>>
<span id="el_store_purchaseorder_PrName">
<input type="text" data-table="store_purchaseorder" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_purchaseorder->PrName->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->PrName->EditValue ?>"<?php echo $store_purchaseorder->PrName->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_store_purchaseorder_Quantity" for="x_Quantity" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->Quantity->caption() ?><?php echo ($store_purchaseorder->Quantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->Quantity->cellAttributes() ?>>
<span id="el_store_purchaseorder_Quantity">
<input type="text" data-table="store_purchaseorder" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->Quantity->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->Quantity->EditValue ?>"<?php echo $store_purchaseorder->Quantity->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label id="elh_store_purchaseorder_FreeQty" for="x_FreeQty" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->FreeQty->caption() ?><?php echo ($store_purchaseorder->FreeQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->FreeQty->cellAttributes() ?>>
<span id="el_store_purchaseorder_FreeQty">
<input type="text" data-table="store_purchaseorder" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->FreeQty->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->FreeQty->EditValue ?>"<?php echo $store_purchaseorder->FreeQty->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->FreeQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label id="elh_store_purchaseorder_ItemValue" for="x_ItemValue" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->ItemValue->caption() ?><?php echo ($store_purchaseorder->ItemValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->ItemValue->cellAttributes() ?>>
<span id="el_store_purchaseorder_ItemValue">
<input type="text" data-table="store_purchaseorder" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->ItemValue->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->ItemValue->EditValue ?>"<?php echo $store_purchaseorder->ItemValue->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->ItemValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label id="elh_store_purchaseorder_Disc" for="x_Disc" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->Disc->caption() ?><?php echo ($store_purchaseorder->Disc->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->Disc->cellAttributes() ?>>
<span id="el_store_purchaseorder_Disc">
<input type="text" data-table="store_purchaseorder" data-field="x_Disc" name="x_Disc" id="x_Disc" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->Disc->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->Disc->EditValue ?>"<?php echo $store_purchaseorder->Disc->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->Disc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label id="elh_store_purchaseorder_PTax" for="x_PTax" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->PTax->caption() ?><?php echo ($store_purchaseorder->PTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->PTax->cellAttributes() ?>>
<span id="el_store_purchaseorder_PTax">
<input type="text" data-table="store_purchaseorder" data-field="x_PTax" name="x_PTax" id="x_PTax" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->PTax->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->PTax->EditValue ?>"<?php echo $store_purchaseorder->PTax->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->PTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_store_purchaseorder_MRP" for="x_MRP" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->MRP->caption() ?><?php echo ($store_purchaseorder->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->MRP->cellAttributes() ?>>
<span id="el_store_purchaseorder_MRP">
<input type="text" data-table="store_purchaseorder" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->MRP->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->MRP->EditValue ?>"<?php echo $store_purchaseorder->MRP->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label id="elh_store_purchaseorder_SalTax" for="x_SalTax" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->SalTax->caption() ?><?php echo ($store_purchaseorder->SalTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->SalTax->cellAttributes() ?>>
<span id="el_store_purchaseorder_SalTax">
<input type="text" data-table="store_purchaseorder" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->SalTax->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->SalTax->EditValue ?>"<?php echo $store_purchaseorder->SalTax->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->SalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_store_purchaseorder_PurValue" for="x_PurValue" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->PurValue->caption() ?><?php echo ($store_purchaseorder->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->PurValue->cellAttributes() ?>>
<span id="el_store_purchaseorder_PurValue">
<input type="text" data-table="store_purchaseorder" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->PurValue->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->PurValue->EditValue ?>"<?php echo $store_purchaseorder->PurValue->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_store_purchaseorder_PurRate" for="x_PurRate" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->PurRate->caption() ?><?php echo ($store_purchaseorder->PurRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->PurRate->cellAttributes() ?>>
<span id="el_store_purchaseorder_PurRate">
<input type="text" data-table="store_purchaseorder" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->PurRate->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->PurRate->EditValue ?>"<?php echo $store_purchaseorder->PurRate->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label id="elh_store_purchaseorder_SalRate" for="x_SalRate" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->SalRate->caption() ?><?php echo ($store_purchaseorder->SalRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->SalRate->cellAttributes() ?>>
<span id="el_store_purchaseorder_SalRate">
<input type="text" data-table="store_purchaseorder" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->SalRate->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->SalRate->EditValue ?>"<?php echo $store_purchaseorder->SalRate->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->SalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_store_purchaseorder_Discount" for="x_Discount" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->Discount->caption() ?><?php echo ($store_purchaseorder->Discount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->Discount->cellAttributes() ?>>
<span id="el_store_purchaseorder_Discount">
<input type="text" data-table="store_purchaseorder" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->Discount->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->Discount->EditValue ?>"<?php echo $store_purchaseorder->Discount->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_store_purchaseorder_PSGST" for="x_PSGST" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->PSGST->caption() ?><?php echo ($store_purchaseorder->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->PSGST->cellAttributes() ?>>
<span id="el_store_purchaseorder_PSGST">
<input type="text" data-table="store_purchaseorder" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->PSGST->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->PSGST->EditValue ?>"<?php echo $store_purchaseorder->PSGST->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_store_purchaseorder_PCGST" for="x_PCGST" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->PCGST->caption() ?><?php echo ($store_purchaseorder->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->PCGST->cellAttributes() ?>>
<span id="el_store_purchaseorder_PCGST">
<input type="text" data-table="store_purchaseorder" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->PCGST->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->PCGST->EditValue ?>"<?php echo $store_purchaseorder->PCGST->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_store_purchaseorder_SSGST" for="x_SSGST" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->SSGST->caption() ?><?php echo ($store_purchaseorder->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->SSGST->cellAttributes() ?>>
<span id="el_store_purchaseorder_SSGST">
<input type="text" data-table="store_purchaseorder" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->SSGST->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->SSGST->EditValue ?>"<?php echo $store_purchaseorder->SSGST->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_store_purchaseorder_SCGST" for="x_SCGST" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->SCGST->caption() ?><?php echo ($store_purchaseorder->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->SCGST->cellAttributes() ?>>
<span id="el_store_purchaseorder_SCGST">
<input type="text" data-table="store_purchaseorder" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->SCGST->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->SCGST->EditValue ?>"<?php echo $store_purchaseorder->SCGST->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_store_purchaseorder_BRCODE" for="x_BRCODE" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->BRCODE->caption() ?><?php echo ($store_purchaseorder->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->BRCODE->cellAttributes() ?>>
<span id="el_store_purchaseorder_BRCODE">
<input type="text" data-table="store_purchaseorder" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->BRCODE->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->BRCODE->EditValue ?>"<?php echo $store_purchaseorder->BRCODE->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_store_purchaseorder_HSN" for="x_HSN" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->HSN->caption() ?><?php echo ($store_purchaseorder->HSN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->HSN->cellAttributes() ?>>
<span id="el_store_purchaseorder_HSN">
<input type="text" data-table="store_purchaseorder" data-field="x_HSN" name="x_HSN" id="x_HSN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_purchaseorder->HSN->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->HSN->EditValue ?>"<?php echo $store_purchaseorder->HSN->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_store_purchaseorder_Pack" for="x_Pack" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->Pack->caption() ?><?php echo ($store_purchaseorder->Pack->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->Pack->cellAttributes() ?>>
<span id="el_store_purchaseorder_Pack">
<input type="text" data-table="store_purchaseorder" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_purchaseorder->Pack->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->Pack->EditValue ?>"<?php echo $store_purchaseorder->Pack->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_store_purchaseorder_PUnit" for="x_PUnit" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->PUnit->caption() ?><?php echo ($store_purchaseorder->PUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->PUnit->cellAttributes() ?>>
<span id="el_store_purchaseorder_PUnit">
<input type="text" data-table="store_purchaseorder" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->PUnit->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->PUnit->EditValue ?>"<?php echo $store_purchaseorder->PUnit->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_store_purchaseorder_SUnit" for="x_SUnit" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->SUnit->caption() ?><?php echo ($store_purchaseorder->SUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->SUnit->cellAttributes() ?>>
<span id="el_store_purchaseorder_SUnit">
<input type="text" data-table="store_purchaseorder" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->SUnit->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->SUnit->EditValue ?>"<?php echo $store_purchaseorder->SUnit->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_store_purchaseorder_GrnQuantity" for="x_GrnQuantity" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->GrnQuantity->caption() ?><?php echo ($store_purchaseorder->GrnQuantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->GrnQuantity->cellAttributes() ?>>
<span id="el_store_purchaseorder_GrnQuantity">
<input type="text" data-table="store_purchaseorder" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->GrnQuantity->EditValue ?>"<?php echo $store_purchaseorder->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_store_purchaseorder_GrnMRP" for="x_GrnMRP" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->GrnMRP->caption() ?><?php echo ($store_purchaseorder->GrnMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->GrnMRP->cellAttributes() ?>>
<span id="el_store_purchaseorder_GrnMRP">
<input type="text" data-table="store_purchaseorder" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->GrnMRP->EditValue ?>"<?php echo $store_purchaseorder->GrnMRP->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_store_purchaseorder_trid" for="x_trid" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->trid->caption() ?><?php echo ($store_purchaseorder->trid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->trid->cellAttributes() ?>>
<span id="el_store_purchaseorder_trid">
<input type="text" data-table="store_purchaseorder" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->trid->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->trid->EditValue ?>"<?php echo $store_purchaseorder->trid->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_store_purchaseorder_HospID" for="x_HospID" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->HospID->caption() ?><?php echo ($store_purchaseorder->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->HospID->cellAttributes() ?>>
<span id="el_store_purchaseorder_HospID">
<input type="text" data-table="store_purchaseorder" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->HospID->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->HospID->EditValue ?>"<?php echo $store_purchaseorder->HospID->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_store_purchaseorder_CreatedBy" for="x_CreatedBy" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->CreatedBy->caption() ?><?php echo ($store_purchaseorder->CreatedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->CreatedBy->cellAttributes() ?>>
<span id="el_store_purchaseorder_CreatedBy">
<input type="text" data-table="store_purchaseorder" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->CreatedBy->EditValue ?>"<?php echo $store_purchaseorder->CreatedBy->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label id="elh_store_purchaseorder_CreatedDateTime" for="x_CreatedDateTime" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->CreatedDateTime->caption() ?><?php echo ($store_purchaseorder->CreatedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->CreatedDateTime->cellAttributes() ?>>
<span id="el_store_purchaseorder_CreatedDateTime">
<input type="text" data-table="store_purchaseorder" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($store_purchaseorder->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->CreatedDateTime->EditValue ?>"<?php echo $store_purchaseorder->CreatedDateTime->editAttributes() ?>>
<?php if (!$store_purchaseorder->CreatedDateTime->ReadOnly && !$store_purchaseorder->CreatedDateTime->Disabled && !isset($store_purchaseorder->CreatedDateTime->EditAttrs["readonly"]) && !isset($store_purchaseorder->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_purchaseorderedit", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_purchaseorder->CreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_store_purchaseorder_ModifiedBy" for="x_ModifiedBy" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->ModifiedBy->caption() ?><?php echo ($store_purchaseorder->ModifiedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->ModifiedBy->cellAttributes() ?>>
<span id="el_store_purchaseorder_ModifiedBy">
<input type="text" data-table="store_purchaseorder" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->ModifiedBy->EditValue ?>"<?php echo $store_purchaseorder->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_store_purchaseorder_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->ModifiedDateTime->caption() ?><?php echo ($store_purchaseorder->ModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->ModifiedDateTime->cellAttributes() ?>>
<span id="el_store_purchaseorder_ModifiedDateTime">
<input type="text" data-table="store_purchaseorder" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($store_purchaseorder->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->ModifiedDateTime->EditValue ?>"<?php echo $store_purchaseorder->ModifiedDateTime->editAttributes() ?>>
<?php if (!$store_purchaseorder->ModifiedDateTime->ReadOnly && !$store_purchaseorder->ModifiedDateTime->Disabled && !isset($store_purchaseorder->ModifiedDateTime->EditAttrs["readonly"]) && !isset($store_purchaseorder->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_purchaseorderedit", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_purchaseorder->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->grncreatedby->Visible) { // grncreatedby ?>
	<div id="r_grncreatedby" class="form-group row">
		<label id="elh_store_purchaseorder_grncreatedby" for="x_grncreatedby" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->grncreatedby->caption() ?><?php echo ($store_purchaseorder->grncreatedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->grncreatedby->cellAttributes() ?>>
<span id="el_store_purchaseorder_grncreatedby">
<input type="text" data-table="store_purchaseorder" data-field="x_grncreatedby" name="x_grncreatedby" id="x_grncreatedby" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->grncreatedby->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->grncreatedby->EditValue ?>"<?php echo $store_purchaseorder->grncreatedby->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->grncreatedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<div id="r_grncreatedDateTime" class="form-group row">
		<label id="elh_store_purchaseorder_grncreatedDateTime" for="x_grncreatedDateTime" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->grncreatedDateTime->caption() ?><?php echo ($store_purchaseorder->grncreatedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->grncreatedDateTime->cellAttributes() ?>>
<span id="el_store_purchaseorder_grncreatedDateTime">
<input type="text" data-table="store_purchaseorder" data-field="x_grncreatedDateTime" name="x_grncreatedDateTime" id="x_grncreatedDateTime" placeholder="<?php echo HtmlEncode($store_purchaseorder->grncreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->grncreatedDateTime->EditValue ?>"<?php echo $store_purchaseorder->grncreatedDateTime->editAttributes() ?>>
<?php if (!$store_purchaseorder->grncreatedDateTime->ReadOnly && !$store_purchaseorder->grncreatedDateTime->Disabled && !isset($store_purchaseorder->grncreatedDateTime->EditAttrs["readonly"]) && !isset($store_purchaseorder->grncreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_purchaseorderedit", "x_grncreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_purchaseorder->grncreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->grnModifiedby->Visible) { // grnModifiedby ?>
	<div id="r_grnModifiedby" class="form-group row">
		<label id="elh_store_purchaseorder_grnModifiedby" for="x_grnModifiedby" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->grnModifiedby->caption() ?><?php echo ($store_purchaseorder->grnModifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->grnModifiedby->cellAttributes() ?>>
<span id="el_store_purchaseorder_grnModifiedby">
<input type="text" data-table="store_purchaseorder" data-field="x_grnModifiedby" name="x_grnModifiedby" id="x_grnModifiedby" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->grnModifiedby->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->grnModifiedby->EditValue ?>"<?php echo $store_purchaseorder->grnModifiedby->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->grnModifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<div id="r_grnModifiedDateTime" class="form-group row">
		<label id="elh_store_purchaseorder_grnModifiedDateTime" for="x_grnModifiedDateTime" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->grnModifiedDateTime->caption() ?><?php echo ($store_purchaseorder->grnModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_store_purchaseorder_grnModifiedDateTime">
<input type="text" data-table="store_purchaseorder" data-field="x_grnModifiedDateTime" name="x_grnModifiedDateTime" id="x_grnModifiedDateTime" placeholder="<?php echo HtmlEncode($store_purchaseorder->grnModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->grnModifiedDateTime->EditValue ?>"<?php echo $store_purchaseorder->grnModifiedDateTime->editAttributes() ?>>
<?php if (!$store_purchaseorder->grnModifiedDateTime->ReadOnly && !$store_purchaseorder->grnModifiedDateTime->Disabled && !isset($store_purchaseorder->grnModifiedDateTime->EditAttrs["readonly"]) && !isset($store_purchaseorder->grnModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_purchaseorderedit", "x_grnModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_purchaseorder->grnModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_store_purchaseorder_Received" for="x_Received" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->Received->caption() ?><?php echo ($store_purchaseorder->Received->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->Received->cellAttributes() ?>>
<span id="el_store_purchaseorder_Received">
<input type="text" data-table="store_purchaseorder" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_purchaseorder->Received->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->Received->EditValue ?>"<?php echo $store_purchaseorder->Received->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_store_purchaseorder_BillDate" for="x_BillDate" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->BillDate->caption() ?><?php echo ($store_purchaseorder->BillDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->BillDate->cellAttributes() ?>>
<span id="el_store_purchaseorder_BillDate">
<input type="text" data-table="store_purchaseorder" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($store_purchaseorder->BillDate->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->BillDate->EditValue ?>"<?php echo $store_purchaseorder->BillDate->editAttributes() ?>>
<?php if (!$store_purchaseorder->BillDate->ReadOnly && !$store_purchaseorder->BillDate->Disabled && !isset($store_purchaseorder->BillDate->EditAttrs["readonly"]) && !isset($store_purchaseorder->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_purchaseorderedit", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_purchaseorder->BillDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label id="elh_store_purchaseorder_CurStock" for="x_CurStock" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->CurStock->caption() ?><?php echo ($store_purchaseorder->CurStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->CurStock->cellAttributes() ?>>
<span id="el_store_purchaseorder_CurStock">
<input type="text" data-table="store_purchaseorder" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->CurStock->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->CurStock->EditValue ?>"<?php echo $store_purchaseorder->CurStock->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->CurStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<div id="r_FreeQtyyy" class="form-group row">
		<label id="elh_store_purchaseorder_FreeQtyyy" for="x_FreeQtyyy" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->FreeQtyyy->caption() ?><?php echo ($store_purchaseorder->FreeQtyyy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->FreeQtyyy->cellAttributes() ?>>
<span id="el_store_purchaseorder_FreeQtyyy">
<input type="text" data-table="store_purchaseorder" data-field="x_FreeQtyyy" name="x_FreeQtyyy" id="x_FreeQtyyy" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->FreeQtyyy->EditValue ?>"<?php echo $store_purchaseorder->FreeQtyyy->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->FreeQtyyy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->grndate->Visible) { // grndate ?>
	<div id="r_grndate" class="form-group row">
		<label id="elh_store_purchaseorder_grndate" for="x_grndate" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->grndate->caption() ?><?php echo ($store_purchaseorder->grndate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->grndate->cellAttributes() ?>>
<span id="el_store_purchaseorder_grndate">
<input type="text" data-table="store_purchaseorder" data-field="x_grndate" name="x_grndate" id="x_grndate" placeholder="<?php echo HtmlEncode($store_purchaseorder->grndate->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->grndate->EditValue ?>"<?php echo $store_purchaseorder->grndate->editAttributes() ?>>
<?php if (!$store_purchaseorder->grndate->ReadOnly && !$store_purchaseorder->grndate->Disabled && !isset($store_purchaseorder->grndate->EditAttrs["readonly"]) && !isset($store_purchaseorder->grndate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_purchaseorderedit", "x_grndate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_purchaseorder->grndate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->grndatetime->Visible) { // grndatetime ?>
	<div id="r_grndatetime" class="form-group row">
		<label id="elh_store_purchaseorder_grndatetime" for="x_grndatetime" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->grndatetime->caption() ?><?php echo ($store_purchaseorder->grndatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->grndatetime->cellAttributes() ?>>
<span id="el_store_purchaseorder_grndatetime">
<input type="text" data-table="store_purchaseorder" data-field="x_grndatetime" name="x_grndatetime" id="x_grndatetime" placeholder="<?php echo HtmlEncode($store_purchaseorder->grndatetime->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->grndatetime->EditValue ?>"<?php echo $store_purchaseorder->grndatetime->editAttributes() ?>>
<?php if (!$store_purchaseorder->grndatetime->ReadOnly && !$store_purchaseorder->grndatetime->Disabled && !isset($store_purchaseorder->grndatetime->EditAttrs["readonly"]) && !isset($store_purchaseorder->grndatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_purchaseorderedit", "x_grndatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_purchaseorder->grndatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->strid->Visible) { // strid ?>
	<div id="r_strid" class="form-group row">
		<label id="elh_store_purchaseorder_strid" for="x_strid" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->strid->caption() ?><?php echo ($store_purchaseorder->strid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->strid->cellAttributes() ?>>
<span id="el_store_purchaseorder_strid">
<input type="text" data-table="store_purchaseorder" data-field="x_strid" name="x_strid" id="x_strid" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->strid->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->strid->EditValue ?>"<?php echo $store_purchaseorder->strid->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->strid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->GRNPer->Visible) { // GRNPer ?>
	<div id="r_GRNPer" class="form-group row">
		<label id="elh_store_purchaseorder_GRNPer" for="x_GRNPer" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->GRNPer->caption() ?><?php echo ($store_purchaseorder->GRNPer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->GRNPer->cellAttributes() ?>>
<span id="el_store_purchaseorder_GRNPer">
<input type="text" data-table="store_purchaseorder" data-field="x_GRNPer" name="x_GRNPer" id="x_GRNPer" size="30" placeholder="<?php echo HtmlEncode($store_purchaseorder->GRNPer->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->GRNPer->EditValue ?>"<?php echo $store_purchaseorder->GRNPer->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->GRNPer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_purchaseorder->StoreID->Visible) { // StoreID ?>
	<div id="r_StoreID" class="form-group row">
		<label id="elh_store_purchaseorder_StoreID" for="x_StoreID" class="<?php echo $store_purchaseorder_edit->LeftColumnClass ?>"><?php echo $store_purchaseorder->StoreID->caption() ?><?php echo ($store_purchaseorder->StoreID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_purchaseorder_edit->RightColumnClass ?>"><div<?php echo $store_purchaseorder->StoreID->cellAttributes() ?>>
<span id="el_store_purchaseorder_StoreID">
<input type="text" data-table="store_purchaseorder" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_purchaseorder->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_purchaseorder->StoreID->EditValue ?>"<?php echo $store_purchaseorder->StoreID->editAttributes() ?>>
</span>
<?php echo $store_purchaseorder->StoreID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$store_purchaseorder_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_purchaseorder_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_purchaseorder_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$store_purchaseorder_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_purchaseorder_edit->terminate();
?>