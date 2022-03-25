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
$view_store_transfer_edit = new view_store_transfer_edit();

// Run the page
$view_store_transfer_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_store_transfer_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_store_transferedit = currentForm = new ew.Form("fview_store_transferedit", "edit");

// Validate form
fview_store_transferedit.validate = function() {
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
		<?php if ($view_store_transfer_edit->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->ORDNO->caption(), $view_store_transfer->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PRC->caption(), $view_store_transfer->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->QTY->Required) { ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->QTY->caption(), $view_store_transfer->QTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->QTY->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->DT->caption(), $view_store_transfer->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->DT->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PC->caption(), $view_store_transfer->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->YM->caption(), $view_store_transfer->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->MFRCODE->caption(), $view_store_transfer->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->Stock->Required) { ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->Stock->caption(), $view_store_transfer->Stock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->Stock->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->LastMonthSale->Required) { ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->LastMonthSale->caption(), $view_store_transfer->LastMonthSale->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->LastMonthSale->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->Printcheck->Required) { ?>
			elm = this.getElements("x" + infix + "_Printcheck");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->Printcheck->caption(), $view_store_transfer->Printcheck->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->id->caption(), $view_store_transfer->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->poid->Required) { ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->poid->caption(), $view_store_transfer->poid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->poid->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->grnid->Required) { ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->grnid->caption(), $view_store_transfer->grnid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->grnid->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->BatchNo->caption(), $view_store_transfer->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->ExpDate->caption(), $view_store_transfer->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->ExpDate->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PrName->caption(), $view_store_transfer->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->Quantity->caption(), $view_store_transfer->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->Quantity->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->FreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->FreeQty->caption(), $view_store_transfer->FreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->FreeQty->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->ItemValue->caption(), $view_store_transfer->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->ItemValue->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->Disc->Required) { ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->Disc->caption(), $view_store_transfer->Disc->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->Disc->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->PTax->Required) { ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PTax->caption(), $view_store_transfer->PTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PTax->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->MRP->caption(), $view_store_transfer->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->MRP->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->SalTax->Required) { ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->SalTax->caption(), $view_store_transfer->SalTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->SalTax->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PurValue->caption(), $view_store_transfer->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PurValue->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PurRate->caption(), $view_store_transfer->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PurRate->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->SalRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->SalRate->caption(), $view_store_transfer->SalRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->SalRate->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->Discount->caption(), $view_store_transfer->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->Discount->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PSGST->caption(), $view_store_transfer->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PSGST->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PCGST->caption(), $view_store_transfer->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PCGST->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->SSGST->caption(), $view_store_transfer->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->SSGST->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->SCGST->caption(), $view_store_transfer->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->SCGST->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->BRCODE->caption(), $view_store_transfer->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->BRCODE->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->HSN->Required) { ?>
			elm = this.getElements("x" + infix + "_HSN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->HSN->caption(), $view_store_transfer->HSN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->Pack->Required) { ?>
			elm = this.getElements("x" + infix + "_Pack");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->Pack->caption(), $view_store_transfer->Pack->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PUnit->caption(), $view_store_transfer->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PUnit->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->SUnit->caption(), $view_store_transfer->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->SUnit->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->GrnQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->GrnQuantity->caption(), $view_store_transfer->GrnQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->GrnQuantity->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->GrnMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->GrnMRP->caption(), $view_store_transfer->GrnMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->GrnMRP->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->strid->Required) { ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->strid->caption(), $view_store_transfer->strid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->strid->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->HospID->caption(), $view_store_transfer->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->CreatedBy->caption(), $view_store_transfer->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->CreatedBy->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->CreatedDateTime->caption(), $view_store_transfer->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->CreatedDateTime->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->ModifiedBy->caption(), $view_store_transfer->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->ModifiedBy->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->ModifiedDateTime->caption(), $view_store_transfer->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->ModifiedDateTime->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->grncreatedby->caption(), $view_store_transfer->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->grncreatedDateTime->caption(), $view_store_transfer->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->grnModifiedby->caption(), $view_store_transfer->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->grnModifiedDateTime->caption(), $view_store_transfer->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->Received->Required) { ?>
			elm = this.getElements("x" + infix + "_Received");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->Received->caption(), $view_store_transfer->Received->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_edit->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->BillDate->caption(), $view_store_transfer->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->BillDate->errorMessage()) ?>");
		<?php if ($view_store_transfer_edit->CurStock->Required) { ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->CurStock->caption(), $view_store_transfer->CurStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->CurStock->errorMessage()) ?>");

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
fview_store_transferedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_store_transferedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_store_transferedit.lists["x_ORDNO"] = <?php echo $view_store_transfer_edit->ORDNO->Lookup->toClientList() ?>;
fview_store_transferedit.lists["x_ORDNO"].options = <?php echo JsonEncode($view_store_transfer_edit->ORDNO->lookupOptions()) ?>;
fview_store_transferedit.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_store_transferedit.lists["x_LastMonthSale"] = <?php echo $view_store_transfer_edit->LastMonthSale->Lookup->toClientList() ?>;
fview_store_transferedit.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_store_transfer_edit->LastMonthSale->lookupOptions()) ?>;
fview_store_transferedit.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_store_transferedit.lists["x_BRCODE"] = <?php echo $view_store_transfer_edit->BRCODE->Lookup->toClientList() ?>;
fview_store_transferedit.lists["x_BRCODE"].options = <?php echo JsonEncode($view_store_transfer_edit->BRCODE->lookupOptions()) ?>;
fview_store_transferedit.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_store_transfer_edit->showPageHeader(); ?>
<?php
$view_store_transfer_edit->showMessage();
?>
<form name="fview_store_transferedit" id="fview_store_transferedit" class="<?php echo $view_store_transfer_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_store_transfer_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_store_transfer_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_store_transfer">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_store_transfer_edit->IsModal ?>">
<?php if ($view_store_transfer->getCurrentMasterTable() == "store_billing_transfer") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="store_billing_transfer">
<input type="hidden" name="fk_id" value="<?php echo $view_store_transfer->strid->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_store_transfer->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_store_transfer_PRC" for="x_PRC" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->PRC->caption() ?><?php echo ($view_store_transfer->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->PRC->cellAttributes() ?>>
<span id="el_view_store_transfer_PRC">
<input type="text" data-table="view_store_transfer" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_store_transfer->PRC->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PRC->EditValue ?>"<?php echo $view_store_transfer->PRC->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_view_store_transfer_QTY" for="x_QTY" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->QTY->caption() ?><?php echo ($view_store_transfer->QTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->QTY->cellAttributes() ?>>
<span id="el_view_store_transfer_QTY">
<input type="text" data-table="view_store_transfer" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->QTY->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->QTY->EditValue ?>"<?php echo $view_store_transfer->QTY->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_store_transfer_DT" for="x_DT" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->DT->caption() ?><?php echo ($view_store_transfer->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->DT->cellAttributes() ?>>
<span id="el_view_store_transfer_DT">
<input type="text" data-table="view_store_transfer" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_store_transfer->DT->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->DT->EditValue ?>"<?php echo $view_store_transfer->DT->editAttributes() ?>>
<?php if (!$view_store_transfer->DT->ReadOnly && !$view_store_transfer->DT->Disabled && !isset($view_store_transfer->DT->EditAttrs["readonly"]) && !isset($view_store_transfer->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transferedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_transfer->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_view_store_transfer_PC" for="x_PC" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->PC->caption() ?><?php echo ($view_store_transfer->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->PC->cellAttributes() ?>>
<span id="el_view_store_transfer_PC">
<input type="text" data-table="view_store_transfer" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_store_transfer->PC->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PC->EditValue ?>"<?php echo $view_store_transfer->PC->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_view_store_transfer_YM" for="x_YM" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->YM->caption() ?><?php echo ($view_store_transfer->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->YM->cellAttributes() ?>>
<span id="el_view_store_transfer_YM">
<input type="text" data-table="view_store_transfer" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_store_transfer->YM->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->YM->EditValue ?>"<?php echo $view_store_transfer->YM->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_view_store_transfer_MFRCODE" for="x_MFRCODE" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->MFRCODE->caption() ?><?php echo ($view_store_transfer->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->MFRCODE->cellAttributes() ?>>
<span id="el_view_store_transfer_MFRCODE">
<input type="text" data-table="view_store_transfer" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->MFRCODE->EditValue ?>"<?php echo $view_store_transfer->MFRCODE->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_view_store_transfer_Stock" for="x_Stock" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->Stock->caption() ?><?php echo ($view_store_transfer->Stock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->Stock->cellAttributes() ?>>
<span id="el_view_store_transfer_Stock">
<input type="text" data-table="view_store_transfer" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->Stock->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Stock->EditValue ?>"<?php echo $view_store_transfer->Stock->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_view_store_transfer_LastMonthSale" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->LastMonthSale->caption() ?><?php echo ($view_store_transfer->LastMonthSale->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->LastMonthSale->cellAttributes() ?>>
<span id="el_view_store_transfer_LastMonthSale">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_store_transfer->LastMonthSale->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x_LastMonthSale" class="text-nowrap" style="z-index: 8910">
	<input type="text" class="form-control" name="sv_x_LastMonthSale" id="sv_x_LastMonthSale" value="<?php echo RemoveHtml($view_store_transfer->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_store_transfer->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_store_transfer->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x_LastMonthSale" id="x_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transferedit.createAutoSuggest({"id":"x_LastMonthSale","forceSelect":true});
</script>
<?php echo $view_store_transfer->LastMonthSale->Lookup->getParamTag("p_x_LastMonthSale") ?>
</span>
<?php echo $view_store_transfer->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_view_store_transfer_Printcheck" for="x_Printcheck" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->Printcheck->caption() ?><?php echo ($view_store_transfer->Printcheck->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->Printcheck->cellAttributes() ?>>
<span id="el_view_store_transfer_Printcheck">
<input type="text" data-table="view_store_transfer" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_store_transfer->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Printcheck->EditValue ?>"<?php echo $view_store_transfer->Printcheck->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_store_transfer_id" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->id->caption() ?><?php echo ($view_store_transfer->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->id->cellAttributes() ?>>
<span id="el_view_store_transfer_id">
<span<?php echo $view_store_transfer->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_store_transfer->id->CurrentValue) ?>">
<?php echo $view_store_transfer->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_view_store_transfer_poid" for="x_poid" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->poid->caption() ?><?php echo ($view_store_transfer->poid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->poid->cellAttributes() ?>>
<span id="el_view_store_transfer_poid">
<input type="text" data-table="view_store_transfer" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->poid->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->poid->EditValue ?>"<?php echo $view_store_transfer->poid->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label id="elh_view_store_transfer_grnid" for="x_grnid" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->grnid->caption() ?><?php echo ($view_store_transfer->grnid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->grnid->cellAttributes() ?>>
<span id="el_view_store_transfer_grnid">
<input type="text" data-table="view_store_transfer" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->grnid->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->grnid->EditValue ?>"<?php echo $view_store_transfer->grnid->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->grnid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_view_store_transfer_BatchNo" for="x_BatchNo" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->BatchNo->caption() ?><?php echo ($view_store_transfer->BatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->BatchNo->cellAttributes() ?>>
<span id="el_view_store_transfer_BatchNo">
<input type="text" data-table="view_store_transfer" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->BatchNo->EditValue ?>"<?php echo $view_store_transfer->BatchNo->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label id="elh_view_store_transfer_ExpDate" for="x_ExpDate" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->ExpDate->caption() ?><?php echo ($view_store_transfer->ExpDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->ExpDate->cellAttributes() ?>>
<span id="el_view_store_transfer_ExpDate">
<input type="text" data-table="view_store_transfer" data-field="x_ExpDate" name="x_ExpDate" id="x_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_transfer->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ExpDate->EditValue ?>"<?php echo $view_store_transfer->ExpDate->editAttributes() ?>>
<?php if (!$view_store_transfer->ExpDate->ReadOnly && !$view_store_transfer->ExpDate->Disabled && !isset($view_store_transfer->ExpDate->EditAttrs["readonly"]) && !isset($view_store_transfer->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transferedit", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_transfer->ExpDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_view_store_transfer_PrName" for="x_PrName" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->PrName->caption() ?><?php echo ($view_store_transfer->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->PrName->cellAttributes() ?>>
<span id="el_view_store_transfer_PrName">
<input type="text" data-table="view_store_transfer" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_store_transfer->PrName->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PrName->EditValue ?>"<?php echo $view_store_transfer->PrName->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_store_transfer_Quantity" for="x_Quantity" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->Quantity->caption() ?><?php echo ($view_store_transfer->Quantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->Quantity->cellAttributes() ?>>
<span id="el_view_store_transfer_Quantity">
<input type="text" data-table="view_store_transfer" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Quantity->EditValue ?>"<?php echo $view_store_transfer->Quantity->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label id="elh_view_store_transfer_FreeQty" for="x_FreeQty" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->FreeQty->caption() ?><?php echo ($view_store_transfer->FreeQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->FreeQty->cellAttributes() ?>>
<span id="el_view_store_transfer_FreeQty">
<input type="text" data-table="view_store_transfer" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->FreeQty->EditValue ?>"<?php echo $view_store_transfer->FreeQty->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->FreeQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label id="elh_view_store_transfer_ItemValue" for="x_ItemValue" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->ItemValue->caption() ?><?php echo ($view_store_transfer->ItemValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->ItemValue->cellAttributes() ?>>
<span id="el_view_store_transfer_ItemValue">
<input type="text" data-table="view_store_transfer" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_store_transfer->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ItemValue->EditValue ?>"<?php echo $view_store_transfer->ItemValue->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->ItemValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label id="elh_view_store_transfer_Disc" for="x_Disc" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->Disc->caption() ?><?php echo ($view_store_transfer->Disc->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->Disc->cellAttributes() ?>>
<span id="el_view_store_transfer_Disc">
<input type="text" data-table="view_store_transfer" data-field="x_Disc" name="x_Disc" id="x_Disc" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->Disc->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Disc->EditValue ?>"<?php echo $view_store_transfer->Disc->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->Disc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label id="elh_view_store_transfer_PTax" for="x_PTax" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->PTax->caption() ?><?php echo ($view_store_transfer->PTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->PTax->cellAttributes() ?>>
<span id="el_view_store_transfer_PTax">
<input type="text" data-table="view_store_transfer" data-field="x_PTax" name="x_PTax" id="x_PTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PTax->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PTax->EditValue ?>"<?php echo $view_store_transfer->PTax->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->PTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_view_store_transfer_MRP" for="x_MRP" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->MRP->caption() ?><?php echo ($view_store_transfer->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->MRP->cellAttributes() ?>>
<span id="el_view_store_transfer_MRP">
<input type="text" data-table="view_store_transfer" data-field="x_MRP" name="x_MRP" id="x_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->MRP->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->MRP->EditValue ?>"<?php echo $view_store_transfer->MRP->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label id="elh_view_store_transfer_SalTax" for="x_SalTax" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->SalTax->caption() ?><?php echo ($view_store_transfer->SalTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->SalTax->cellAttributes() ?>>
<span id="el_view_store_transfer_SalTax">
<input type="text" data-table="view_store_transfer" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->SalTax->EditValue ?>"<?php echo $view_store_transfer->SalTax->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->SalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_view_store_transfer_PurValue" for="x_PurValue" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->PurValue->caption() ?><?php echo ($view_store_transfer->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->PurValue->cellAttributes() ?>>
<span id="el_view_store_transfer_PurValue">
<input type="text" data-table="view_store_transfer" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PurValue->EditValue ?>"<?php echo $view_store_transfer->PurValue->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_view_store_transfer_PurRate" for="x_PurRate" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->PurRate->caption() ?><?php echo ($view_store_transfer->PurRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->PurRate->cellAttributes() ?>>
<span id="el_view_store_transfer_PurRate">
<input type="text" data-table="view_store_transfer" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PurRate->EditValue ?>"<?php echo $view_store_transfer->PurRate->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label id="elh_view_store_transfer_SalRate" for="x_SalRate" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->SalRate->caption() ?><?php echo ($view_store_transfer->SalRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->SalRate->cellAttributes() ?>>
<span id="el_view_store_transfer_SalRate">
<input type="text" data-table="view_store_transfer" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->SalRate->EditValue ?>"<?php echo $view_store_transfer->SalRate->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->SalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_view_store_transfer_Discount" for="x_Discount" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->Discount->caption() ?><?php echo ($view_store_transfer->Discount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->Discount->cellAttributes() ?>>
<span id="el_view_store_transfer_Discount">
<input type="text" data-table="view_store_transfer" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->Discount->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Discount->EditValue ?>"<?php echo $view_store_transfer->Discount->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_view_store_transfer_PSGST" for="x_PSGST" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->PSGST->caption() ?><?php echo ($view_store_transfer->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->PSGST->cellAttributes() ?>>
<span id="el_view_store_transfer_PSGST">
<input type="text" data-table="view_store_transfer" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PSGST->EditValue ?>"<?php echo $view_store_transfer->PSGST->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_view_store_transfer_PCGST" for="x_PCGST" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->PCGST->caption() ?><?php echo ($view_store_transfer->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->PCGST->cellAttributes() ?>>
<span id="el_view_store_transfer_PCGST">
<input type="text" data-table="view_store_transfer" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PCGST->EditValue ?>"<?php echo $view_store_transfer->PCGST->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_view_store_transfer_SSGST" for="x_SSGST" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->SSGST->caption() ?><?php echo ($view_store_transfer->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->SSGST->cellAttributes() ?>>
<span id="el_view_store_transfer_SSGST">
<input type="text" data-table="view_store_transfer" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->SSGST->EditValue ?>"<?php echo $view_store_transfer->SSGST->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_view_store_transfer_SCGST" for="x_SCGST" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->SCGST->caption() ?><?php echo ($view_store_transfer->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->SCGST->cellAttributes() ?>>
<span id="el_view_store_transfer_SCGST">
<input type="text" data-table="view_store_transfer" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->SCGST->EditValue ?>"<?php echo $view_store_transfer->SCGST->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_view_store_transfer_BRCODE" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->BRCODE->caption() ?><?php echo ($view_store_transfer->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->BRCODE->cellAttributes() ?>>
<span id="el_view_store_transfer_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_store_transfer->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE" class="text-nowrap" style="z-index: 8680">
	<input type="text" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?php echo RemoveHtml($view_store_transfer->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->BRCODE->getPlaceHolder()) ?>"<?php echo $view_store_transfer->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_store_transfer->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transferedit.createAutoSuggest({"id":"x_BRCODE","forceSelect":false});
</script>
<?php echo $view_store_transfer->BRCODE->Lookup->getParamTag("p_x_BRCODE") ?>
</span>
<?php echo $view_store_transfer->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_view_store_transfer_HSN" for="x_HSN" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->HSN->caption() ?><?php echo ($view_store_transfer->HSN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->HSN->cellAttributes() ?>>
<span id="el_view_store_transfer_HSN">
<input type="text" data-table="view_store_transfer" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->HSN->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->HSN->EditValue ?>"<?php echo $view_store_transfer->HSN->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_view_store_transfer_Pack" for="x_Pack" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->Pack->caption() ?><?php echo ($view_store_transfer->Pack->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->Pack->cellAttributes() ?>>
<span id="el_view_store_transfer_Pack">
<input type="text" data-table="view_store_transfer" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_store_transfer->Pack->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Pack->EditValue ?>"<?php echo $view_store_transfer->Pack->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_view_store_transfer_PUnit" for="x_PUnit" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->PUnit->caption() ?><?php echo ($view_store_transfer->PUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->PUnit->cellAttributes() ?>>
<span id="el_view_store_transfer_PUnit">
<input type="text" data-table="view_store_transfer" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PUnit->EditValue ?>"<?php echo $view_store_transfer->PUnit->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_view_store_transfer_SUnit" for="x_SUnit" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->SUnit->caption() ?><?php echo ($view_store_transfer->SUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->SUnit->cellAttributes() ?>>
<span id="el_view_store_transfer_SUnit">
<input type="text" data-table="view_store_transfer" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->SUnit->EditValue ?>"<?php echo $view_store_transfer->SUnit->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_view_store_transfer_GrnQuantity" for="x_GrnQuantity" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->GrnQuantity->caption() ?><?php echo ($view_store_transfer->GrnQuantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->GrnQuantity->cellAttributes() ?>>
<span id="el_view_store_transfer_GrnQuantity">
<input type="text" data-table="view_store_transfer" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->GrnQuantity->EditValue ?>"<?php echo $view_store_transfer->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_view_store_transfer_GrnMRP" for="x_GrnMRP" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->GrnMRP->caption() ?><?php echo ($view_store_transfer->GrnMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->GrnMRP->cellAttributes() ?>>
<span id="el_view_store_transfer_GrnMRP">
<input type="text" data-table="view_store_transfer" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->GrnMRP->EditValue ?>"<?php echo $view_store_transfer->GrnMRP->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->strid->Visible) { // strid ?>
	<div id="r_strid" class="form-group row">
		<label id="elh_view_store_transfer_strid" for="x_strid" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->strid->caption() ?><?php echo ($view_store_transfer->strid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->strid->cellAttributes() ?>>
<?php if ($view_store_transfer->strid->getSessionValue() <> "") { ?>
<span id="el_view_store_transfer_strid">
<span<?php echo $view_store_transfer->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->strid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_strid" name="x_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_store_transfer_strid">
<input type="text" data-table="view_store_transfer" data-field="x_strid" name="x_strid" id="x_strid" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->strid->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->strid->EditValue ?>"<?php echo $view_store_transfer->strid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_store_transfer->strid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_view_store_transfer_CreatedBy" for="x_CreatedBy" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->CreatedBy->caption() ?><?php echo ($view_store_transfer->CreatedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->CreatedBy->cellAttributes() ?>>
<span id="el_view_store_transfer_CreatedBy">
<input type="text" data-table="view_store_transfer" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->CreatedBy->EditValue ?>"<?php echo $view_store_transfer->CreatedBy->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label id="elh_view_store_transfer_CreatedDateTime" for="x_CreatedDateTime" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->CreatedDateTime->caption() ?><?php echo ($view_store_transfer->CreatedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_store_transfer_CreatedDateTime">
<input type="text" data-table="view_store_transfer" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_store_transfer->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->CreatedDateTime->EditValue ?>"<?php echo $view_store_transfer->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_store_transfer->CreatedDateTime->ReadOnly && !$view_store_transfer->CreatedDateTime->Disabled && !isset($view_store_transfer->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_store_transfer->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transferedit", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_transfer->CreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_view_store_transfer_ModifiedBy" for="x_ModifiedBy" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->ModifiedBy->caption() ?><?php echo ($view_store_transfer->ModifiedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->ModifiedBy->cellAttributes() ?>>
<span id="el_view_store_transfer_ModifiedBy">
<input type="text" data-table="view_store_transfer" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ModifiedBy->EditValue ?>"<?php echo $view_store_transfer->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_view_store_transfer_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->ModifiedDateTime->caption() ?><?php echo ($view_store_transfer->ModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_store_transfer_ModifiedDateTime">
<input type="text" data-table="view_store_transfer" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_store_transfer->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ModifiedDateTime->EditValue ?>"<?php echo $view_store_transfer->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_store_transfer->ModifiedDateTime->ReadOnly && !$view_store_transfer->ModifiedDateTime->Disabled && !isset($view_store_transfer->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_store_transfer->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transferedit", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_transfer->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_view_store_transfer_Received" for="x_Received" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->Received->caption() ?><?php echo ($view_store_transfer->Received->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->Received->cellAttributes() ?>>
<span id="el_view_store_transfer_Received">
<input type="text" data-table="view_store_transfer" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_store_transfer->Received->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Received->EditValue ?>"<?php echo $view_store_transfer->Received->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_view_store_transfer_BillDate" for="x_BillDate" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->BillDate->caption() ?><?php echo ($view_store_transfer->BillDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->BillDate->cellAttributes() ?>>
<span id="el_view_store_transfer_BillDate">
<input type="text" data-table="view_store_transfer" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_store_transfer->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->BillDate->EditValue ?>"<?php echo $view_store_transfer->BillDate->editAttributes() ?>>
<?php if (!$view_store_transfer->BillDate->ReadOnly && !$view_store_transfer->BillDate->Disabled && !isset($view_store_transfer->BillDate->EditAttrs["readonly"]) && !isset($view_store_transfer->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transferedit", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_transfer->BillDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label id="elh_view_store_transfer_CurStock" for="x_CurStock" class="<?php echo $view_store_transfer_edit->LeftColumnClass ?>"><?php echo $view_store_transfer->CurStock->caption() ?><?php echo ($view_store_transfer->CurStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_transfer_edit->RightColumnClass ?>"><div<?php echo $view_store_transfer->CurStock->cellAttributes() ?>>
<span id="el_view_store_transfer_CurStock">
<input type="text" data-table="view_store_transfer" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->CurStock->EditValue ?>"<?php echo $view_store_transfer->CurStock->editAttributes() ?>>
</span>
<?php echo $view_store_transfer->CurStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_store_transfer_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_store_transfer_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_store_transfer_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_store_transfer_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_store_transfer_edit->terminate();
?>