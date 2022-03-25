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
$view_item_received_edit = new view_item_received_edit();

// Run the page
$view_item_received_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_item_received_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_item_receivededit = currentForm = new ew.Form("fview_item_receivededit", "edit");

// Validate form
fview_item_receivededit.validate = function() {
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
		<?php if ($view_item_received_edit->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->ORDNO->caption(), $view_item_received->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->BRCODE->caption(), $view_item_received->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PRC->caption(), $view_item_received->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PrName->caption(), $view_item_received->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->MFRCODE->caption(), $view_item_received->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->QTY->Required) { ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->QTY->caption(), $view_item_received->QTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->QTY->errorMessage()) ?>");
		<?php if ($view_item_received_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->DT->caption(), $view_item_received->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->DT->errorMessage()) ?>");
		<?php if ($view_item_received_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PC->caption(), $view_item_received->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->YM->caption(), $view_item_received->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->Stock->Required) { ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->Stock->caption(), $view_item_received->Stock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->Stock->errorMessage()) ?>");
		<?php if ($view_item_received_edit->LastMonthSale->Required) { ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->LastMonthSale->caption(), $view_item_received->LastMonthSale->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->LastMonthSale->errorMessage()) ?>");
		<?php if ($view_item_received_edit->Printcheck->Required) { ?>
			elm = this.getElements("x" + infix + "_Printcheck");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->Printcheck->caption(), $view_item_received->Printcheck->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->id->caption(), $view_item_received->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->poid->Required) { ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->poid->caption(), $view_item_received->poid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->poid->errorMessage()) ?>");
		<?php if ($view_item_received_edit->grnid->Required) { ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->grnid->caption(), $view_item_received->grnid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->grnid->errorMessage()) ?>");
		<?php if ($view_item_received_edit->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->BatchNo->caption(), $view_item_received->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->ExpDate->caption(), $view_item_received->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->Quantity->caption(), $view_item_received->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->FreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->FreeQty->caption(), $view_item_received->FreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->ItemValue->caption(), $view_item_received->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->Disc->Required) { ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->Disc->caption(), $view_item_received->Disc->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->Disc->errorMessage()) ?>");
		<?php if ($view_item_received_edit->PTax->Required) { ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PTax->caption(), $view_item_received->PTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->PTax->errorMessage()) ?>");
		<?php if ($view_item_received_edit->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->MRP->caption(), $view_item_received->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->MRP->errorMessage()) ?>");
		<?php if ($view_item_received_edit->SalTax->Required) { ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->SalTax->caption(), $view_item_received->SalTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->SalTax->errorMessage()) ?>");
		<?php if ($view_item_received_edit->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PurValue->caption(), $view_item_received->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->PurValue->errorMessage()) ?>");
		<?php if ($view_item_received_edit->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PurRate->caption(), $view_item_received->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->PurRate->errorMessage()) ?>");
		<?php if ($view_item_received_edit->SalRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->SalRate->caption(), $view_item_received->SalRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->SalRate->errorMessage()) ?>");
		<?php if ($view_item_received_edit->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->Discount->caption(), $view_item_received->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->Discount->errorMessage()) ?>");
		<?php if ($view_item_received_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PSGST->caption(), $view_item_received->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->PSGST->errorMessage()) ?>");
		<?php if ($view_item_received_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PCGST->caption(), $view_item_received->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->PCGST->errorMessage()) ?>");
		<?php if ($view_item_received_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->SSGST->caption(), $view_item_received->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->SSGST->errorMessage()) ?>");
		<?php if ($view_item_received_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->SCGST->caption(), $view_item_received->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->SCGST->errorMessage()) ?>");
		<?php if ($view_item_received_edit->HSN->Required) { ?>
			elm = this.getElements("x" + infix + "_HSN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->HSN->caption(), $view_item_received->HSN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->Pack->Required) { ?>
			elm = this.getElements("x" + infix + "_Pack");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->Pack->caption(), $view_item_received->Pack->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_edit->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PUnit->caption(), $view_item_received->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->PUnit->errorMessage()) ?>");
		<?php if ($view_item_received_edit->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->SUnit->caption(), $view_item_received->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->SUnit->errorMessage()) ?>");
		<?php if ($view_item_received_edit->GrnQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->GrnQuantity->caption(), $view_item_received->GrnQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->GrnQuantity->errorMessage()) ?>");
		<?php if ($view_item_received_edit->GrnMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->GrnMRP->caption(), $view_item_received->GrnMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->GrnMRP->errorMessage()) ?>");
		<?php if ($view_item_received_edit->trid->Required) { ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->trid->caption(), $view_item_received->trid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->trid->errorMessage()) ?>");
		<?php if ($view_item_received_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->HospID->caption(), $view_item_received->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->HospID->errorMessage()) ?>");
		<?php if ($view_item_received_edit->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->CreatedBy->caption(), $view_item_received->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->CreatedBy->errorMessage()) ?>");
		<?php if ($view_item_received_edit->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->CreatedDateTime->caption(), $view_item_received->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->CreatedDateTime->errorMessage()) ?>");
		<?php if ($view_item_received_edit->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->ModifiedBy->caption(), $view_item_received->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->ModifiedBy->errorMessage()) ?>");
		<?php if ($view_item_received_edit->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->ModifiedDateTime->caption(), $view_item_received->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->ModifiedDateTime->errorMessage()) ?>");
		<?php if ($view_item_received_edit->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->grncreatedby->caption(), $view_item_received->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->grncreatedby->errorMessage()) ?>");
		<?php if ($view_item_received_edit->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->grncreatedDateTime->caption(), $view_item_received->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->grncreatedDateTime->errorMessage()) ?>");
		<?php if ($view_item_received_edit->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->grnModifiedby->caption(), $view_item_received->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->grnModifiedby->errorMessage()) ?>");
		<?php if ($view_item_received_edit->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->grnModifiedDateTime->caption(), $view_item_received->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_item_received->grnModifiedDateTime->errorMessage()) ?>");
		<?php if ($view_item_received_edit->Received->Required) { ?>
			elm = this.getElements("x" + infix + "_Received[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->Received->caption(), $view_item_received->Received->RequiredErrorMessage)) ?>");
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
fview_item_receivededit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_item_receivededit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_item_receivededit.lists["x_ORDNO"] = <?php echo $view_item_received_edit->ORDNO->Lookup->toClientList() ?>;
fview_item_receivededit.lists["x_ORDNO"].options = <?php echo JsonEncode($view_item_received_edit->ORDNO->lookupOptions()) ?>;
fview_item_receivededit.lists["x_Received[]"] = <?php echo $view_item_received_edit->Received->Lookup->toClientList() ?>;
fview_item_receivededit.lists["x_Received[]"].options = <?php echo JsonEncode($view_item_received_edit->Received->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_item_received_edit->showPageHeader(); ?>
<?php
$view_item_received_edit->showMessage();
?>
<form name="fview_item_receivededit" id="fview_item_receivededit" class="<?php echo $view_item_received_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_item_received_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_item_received_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_item_received">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_item_received_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_item_received->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_view_item_received_ORDNO" for="x_ORDNO" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->ORDNO->caption() ?><?php echo ($view_item_received->ORDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->ORDNO->cellAttributes() ?>>
<span id="el_view_item_received_ORDNO">
<span<?php echo $view_item_received->ORDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->ORDNO->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" value="<?php echo HtmlEncode($view_item_received->ORDNO->CurrentValue) ?>">
<?php echo $view_item_received->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_view_item_received_BRCODE" for="x_BRCODE" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->BRCODE->caption() ?><?php echo ($view_item_received->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->BRCODE->cellAttributes() ?>>
<span id="el_view_item_received_BRCODE">
<span<?php echo $view_item_received->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->BRCODE->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_item_received->BRCODE->CurrentValue) ?>">
<?php echo $view_item_received->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_item_received_PRC" for="x_PRC" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->PRC->caption() ?><?php echo ($view_item_received->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->PRC->cellAttributes() ?>>
<span id="el_view_item_received_PRC">
<span<?php echo $view_item_received->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->PRC->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PRC" name="x_PRC" id="x_PRC" value="<?php echo HtmlEncode($view_item_received->PRC->CurrentValue) ?>">
<?php echo $view_item_received->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_view_item_received_PrName" for="x_PrName" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->PrName->caption() ?><?php echo ($view_item_received->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->PrName->cellAttributes() ?>>
<span id="el_view_item_received_PrName">
<span<?php echo $view_item_received->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->PrName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PrName" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($view_item_received->PrName->CurrentValue) ?>">
<?php echo $view_item_received->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_view_item_received_MFRCODE" for="x_MFRCODE" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->MFRCODE->caption() ?><?php echo ($view_item_received->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->MFRCODE->cellAttributes() ?>>
<span id="el_view_item_received_MFRCODE">
<span<?php echo $view_item_received->MFRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->MFRCODE->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" value="<?php echo HtmlEncode($view_item_received->MFRCODE->CurrentValue) ?>">
<?php echo $view_item_received->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_view_item_received_QTY" for="x_QTY" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->QTY->caption() ?><?php echo ($view_item_received->QTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->QTY->cellAttributes() ?>>
<span id="el_view_item_received_QTY">
<input type="text" data-table="view_item_received" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_item_received->QTY->getPlaceHolder()) ?>" value="<?php echo $view_item_received->QTY->EditValue ?>"<?php echo $view_item_received->QTY->editAttributes() ?>>
</span>
<?php echo $view_item_received->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_item_received_DT" for="x_DT" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->DT->caption() ?><?php echo ($view_item_received->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->DT->cellAttributes() ?>>
<span id="el_view_item_received_DT">
<input type="text" data-table="view_item_received" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_item_received->DT->getPlaceHolder()) ?>" value="<?php echo $view_item_received->DT->EditValue ?>"<?php echo $view_item_received->DT->editAttributes() ?>>
<?php if (!$view_item_received->DT->ReadOnly && !$view_item_received->DT->Disabled && !isset($view_item_received->DT->EditAttrs["readonly"]) && !isset($view_item_received->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_item_receivededit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_item_received->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_view_item_received_PC" for="x_PC" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->PC->caption() ?><?php echo ($view_item_received->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->PC->cellAttributes() ?>>
<span id="el_view_item_received_PC">
<input type="text" data-table="view_item_received" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_item_received->PC->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PC->EditValue ?>"<?php echo $view_item_received->PC->editAttributes() ?>>
</span>
<?php echo $view_item_received->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_view_item_received_YM" for="x_YM" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->YM->caption() ?><?php echo ($view_item_received->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->YM->cellAttributes() ?>>
<span id="el_view_item_received_YM">
<input type="text" data-table="view_item_received" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_item_received->YM->getPlaceHolder()) ?>" value="<?php echo $view_item_received->YM->EditValue ?>"<?php echo $view_item_received->YM->editAttributes() ?>>
</span>
<?php echo $view_item_received->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_view_item_received_Stock" for="x_Stock" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->Stock->caption() ?><?php echo ($view_item_received->Stock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->Stock->cellAttributes() ?>>
<span id="el_view_item_received_Stock">
<input type="text" data-table="view_item_received" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_item_received->Stock->getPlaceHolder()) ?>" value="<?php echo $view_item_received->Stock->EditValue ?>"<?php echo $view_item_received->Stock->editAttributes() ?>>
</span>
<?php echo $view_item_received->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_view_item_received_LastMonthSale" for="x_LastMonthSale" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->LastMonthSale->caption() ?><?php echo ($view_item_received->LastMonthSale->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->LastMonthSale->cellAttributes() ?>>
<span id="el_view_item_received_LastMonthSale">
<input type="text" data-table="view_item_received" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="30" placeholder="<?php echo HtmlEncode($view_item_received->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $view_item_received->LastMonthSale->EditValue ?>"<?php echo $view_item_received->LastMonthSale->editAttributes() ?>>
</span>
<?php echo $view_item_received->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_view_item_received_Printcheck" for="x_Printcheck" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->Printcheck->caption() ?><?php echo ($view_item_received->Printcheck->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->Printcheck->cellAttributes() ?>>
<span id="el_view_item_received_Printcheck">
<input type="text" data-table="view_item_received" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_item_received->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_item_received->Printcheck->EditValue ?>"<?php echo $view_item_received->Printcheck->editAttributes() ?>>
</span>
<?php echo $view_item_received->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_item_received_id" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->id->caption() ?><?php echo ($view_item_received->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->id->cellAttributes() ?>>
<span id="el_view_item_received_id">
<span<?php echo $view_item_received->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_item_received->id->CurrentValue) ?>">
<?php echo $view_item_received->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_view_item_received_poid" for="x_poid" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->poid->caption() ?><?php echo ($view_item_received->poid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->poid->cellAttributes() ?>>
<span id="el_view_item_received_poid">
<input type="text" data-table="view_item_received" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_item_received->poid->getPlaceHolder()) ?>" value="<?php echo $view_item_received->poid->EditValue ?>"<?php echo $view_item_received->poid->editAttributes() ?>>
</span>
<?php echo $view_item_received->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label id="elh_view_item_received_grnid" for="x_grnid" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->grnid->caption() ?><?php echo ($view_item_received->grnid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->grnid->cellAttributes() ?>>
<span id="el_view_item_received_grnid">
<input type="text" data-table="view_item_received" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_item_received->grnid->getPlaceHolder()) ?>" value="<?php echo $view_item_received->grnid->EditValue ?>"<?php echo $view_item_received->grnid->editAttributes() ?>>
</span>
<?php echo $view_item_received->grnid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_view_item_received_BatchNo" for="x_BatchNo" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->BatchNo->caption() ?><?php echo ($view_item_received->BatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->BatchNo->cellAttributes() ?>>
<span id="el_view_item_received_BatchNo">
<span<?php echo $view_item_received->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->BatchNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" value="<?php echo HtmlEncode($view_item_received->BatchNo->CurrentValue) ?>">
<?php echo $view_item_received->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label id="elh_view_item_received_ExpDate" for="x_ExpDate" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->ExpDate->caption() ?><?php echo ($view_item_received->ExpDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->ExpDate->cellAttributes() ?>>
<span id="el_view_item_received_ExpDate">
<span<?php echo $view_item_received->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->ExpDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ExpDate" name="x_ExpDate" id="x_ExpDate" value="<?php echo HtmlEncode($view_item_received->ExpDate->CurrentValue) ?>">
<?php echo $view_item_received->ExpDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_item_received_Quantity" for="x_Quantity" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->Quantity->caption() ?><?php echo ($view_item_received->Quantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->Quantity->cellAttributes() ?>>
<span id="el_view_item_received_Quantity">
<span<?php echo $view_item_received->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->Quantity->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" value="<?php echo HtmlEncode($view_item_received->Quantity->CurrentValue) ?>">
<?php echo $view_item_received->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label id="elh_view_item_received_FreeQty" for="x_FreeQty" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->FreeQty->caption() ?><?php echo ($view_item_received->FreeQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->FreeQty->cellAttributes() ?>>
<span id="el_view_item_received_FreeQty">
<span<?php echo $view_item_received->FreeQty->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->FreeQty->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" value="<?php echo HtmlEncode($view_item_received->FreeQty->CurrentValue) ?>">
<?php echo $view_item_received->FreeQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label id="elh_view_item_received_ItemValue" for="x_ItemValue" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->ItemValue->caption() ?><?php echo ($view_item_received->ItemValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->ItemValue->cellAttributes() ?>>
<span id="el_view_item_received_ItemValue">
<span<?php echo $view_item_received->ItemValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->ItemValue->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" value="<?php echo HtmlEncode($view_item_received->ItemValue->CurrentValue) ?>">
<?php echo $view_item_received->ItemValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label id="elh_view_item_received_Disc" for="x_Disc" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->Disc->caption() ?><?php echo ($view_item_received->Disc->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->Disc->cellAttributes() ?>>
<span id="el_view_item_received_Disc">
<input type="text" data-table="view_item_received" data-field="x_Disc" name="x_Disc" id="x_Disc" size="30" placeholder="<?php echo HtmlEncode($view_item_received->Disc->getPlaceHolder()) ?>" value="<?php echo $view_item_received->Disc->EditValue ?>"<?php echo $view_item_received->Disc->editAttributes() ?>>
</span>
<?php echo $view_item_received->Disc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label id="elh_view_item_received_PTax" for="x_PTax" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->PTax->caption() ?><?php echo ($view_item_received->PTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->PTax->cellAttributes() ?>>
<span id="el_view_item_received_PTax">
<input type="text" data-table="view_item_received" data-field="x_PTax" name="x_PTax" id="x_PTax" size="30" placeholder="<?php echo HtmlEncode($view_item_received->PTax->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PTax->EditValue ?>"<?php echo $view_item_received->PTax->editAttributes() ?>>
</span>
<?php echo $view_item_received->PTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_view_item_received_MRP" for="x_MRP" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->MRP->caption() ?><?php echo ($view_item_received->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->MRP->cellAttributes() ?>>
<span id="el_view_item_received_MRP">
<input type="text" data-table="view_item_received" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($view_item_received->MRP->getPlaceHolder()) ?>" value="<?php echo $view_item_received->MRP->EditValue ?>"<?php echo $view_item_received->MRP->editAttributes() ?>>
</span>
<?php echo $view_item_received->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label id="elh_view_item_received_SalTax" for="x_SalTax" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->SalTax->caption() ?><?php echo ($view_item_received->SalTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->SalTax->cellAttributes() ?>>
<span id="el_view_item_received_SalTax">
<input type="text" data-table="view_item_received" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="30" placeholder="<?php echo HtmlEncode($view_item_received->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_item_received->SalTax->EditValue ?>"<?php echo $view_item_received->SalTax->editAttributes() ?>>
</span>
<?php echo $view_item_received->SalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_view_item_received_PurValue" for="x_PurValue" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->PurValue->caption() ?><?php echo ($view_item_received->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->PurValue->cellAttributes() ?>>
<span id="el_view_item_received_PurValue">
<input type="text" data-table="view_item_received" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($view_item_received->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PurValue->EditValue ?>"<?php echo $view_item_received->PurValue->editAttributes() ?>>
</span>
<?php echo $view_item_received->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_view_item_received_PurRate" for="x_PurRate" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->PurRate->caption() ?><?php echo ($view_item_received->PurRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->PurRate->cellAttributes() ?>>
<span id="el_view_item_received_PurRate">
<input type="text" data-table="view_item_received" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?php echo HtmlEncode($view_item_received->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PurRate->EditValue ?>"<?php echo $view_item_received->PurRate->editAttributes() ?>>
</span>
<?php echo $view_item_received->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label id="elh_view_item_received_SalRate" for="x_SalRate" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->SalRate->caption() ?><?php echo ($view_item_received->SalRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->SalRate->cellAttributes() ?>>
<span id="el_view_item_received_SalRate">
<input type="text" data-table="view_item_received" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="30" placeholder="<?php echo HtmlEncode($view_item_received->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_item_received->SalRate->EditValue ?>"<?php echo $view_item_received->SalRate->editAttributes() ?>>
</span>
<?php echo $view_item_received->SalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_view_item_received_Discount" for="x_Discount" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->Discount->caption() ?><?php echo ($view_item_received->Discount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->Discount->cellAttributes() ?>>
<span id="el_view_item_received_Discount">
<input type="text" data-table="view_item_received" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($view_item_received->Discount->getPlaceHolder()) ?>" value="<?php echo $view_item_received->Discount->EditValue ?>"<?php echo $view_item_received->Discount->editAttributes() ?>>
</span>
<?php echo $view_item_received->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_view_item_received_PSGST" for="x_PSGST" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->PSGST->caption() ?><?php echo ($view_item_received->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->PSGST->cellAttributes() ?>>
<span id="el_view_item_received_PSGST">
<input type="text" data-table="view_item_received" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($view_item_received->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PSGST->EditValue ?>"<?php echo $view_item_received->PSGST->editAttributes() ?>>
</span>
<?php echo $view_item_received->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_view_item_received_PCGST" for="x_PCGST" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->PCGST->caption() ?><?php echo ($view_item_received->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->PCGST->cellAttributes() ?>>
<span id="el_view_item_received_PCGST">
<input type="text" data-table="view_item_received" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($view_item_received->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PCGST->EditValue ?>"<?php echo $view_item_received->PCGST->editAttributes() ?>>
</span>
<?php echo $view_item_received->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_view_item_received_SSGST" for="x_SSGST" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->SSGST->caption() ?><?php echo ($view_item_received->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->SSGST->cellAttributes() ?>>
<span id="el_view_item_received_SSGST">
<input type="text" data-table="view_item_received" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($view_item_received->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_item_received->SSGST->EditValue ?>"<?php echo $view_item_received->SSGST->editAttributes() ?>>
</span>
<?php echo $view_item_received->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_view_item_received_SCGST" for="x_SCGST" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->SCGST->caption() ?><?php echo ($view_item_received->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->SCGST->cellAttributes() ?>>
<span id="el_view_item_received_SCGST">
<input type="text" data-table="view_item_received" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($view_item_received->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_item_received->SCGST->EditValue ?>"<?php echo $view_item_received->SCGST->editAttributes() ?>>
</span>
<?php echo $view_item_received->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_view_item_received_HSN" for="x_HSN" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->HSN->caption() ?><?php echo ($view_item_received->HSN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->HSN->cellAttributes() ?>>
<span id="el_view_item_received_HSN">
<input type="text" data-table="view_item_received" data-field="x_HSN" name="x_HSN" id="x_HSN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_item_received->HSN->getPlaceHolder()) ?>" value="<?php echo $view_item_received->HSN->EditValue ?>"<?php echo $view_item_received->HSN->editAttributes() ?>>
</span>
<?php echo $view_item_received->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_view_item_received_Pack" for="x_Pack" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->Pack->caption() ?><?php echo ($view_item_received->Pack->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->Pack->cellAttributes() ?>>
<span id="el_view_item_received_Pack">
<input type="text" data-table="view_item_received" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_item_received->Pack->getPlaceHolder()) ?>" value="<?php echo $view_item_received->Pack->EditValue ?>"<?php echo $view_item_received->Pack->editAttributes() ?>>
</span>
<?php echo $view_item_received->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_view_item_received_PUnit" for="x_PUnit" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->PUnit->caption() ?><?php echo ($view_item_received->PUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->PUnit->cellAttributes() ?>>
<span id="el_view_item_received_PUnit">
<input type="text" data-table="view_item_received" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?php echo HtmlEncode($view_item_received->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PUnit->EditValue ?>"<?php echo $view_item_received->PUnit->editAttributes() ?>>
</span>
<?php echo $view_item_received->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_view_item_received_SUnit" for="x_SUnit" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->SUnit->caption() ?><?php echo ($view_item_received->SUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->SUnit->cellAttributes() ?>>
<span id="el_view_item_received_SUnit">
<input type="text" data-table="view_item_received" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?php echo HtmlEncode($view_item_received->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_item_received->SUnit->EditValue ?>"<?php echo $view_item_received->SUnit->editAttributes() ?>>
</span>
<?php echo $view_item_received->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_view_item_received_GrnQuantity" for="x_GrnQuantity" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->GrnQuantity->caption() ?><?php echo ($view_item_received->GrnQuantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->GrnQuantity->cellAttributes() ?>>
<span id="el_view_item_received_GrnQuantity">
<input type="text" data-table="view_item_received" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="30" placeholder="<?php echo HtmlEncode($view_item_received->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_item_received->GrnQuantity->EditValue ?>"<?php echo $view_item_received->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $view_item_received->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_view_item_received_GrnMRP" for="x_GrnMRP" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->GrnMRP->caption() ?><?php echo ($view_item_received->GrnMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->GrnMRP->cellAttributes() ?>>
<span id="el_view_item_received_GrnMRP">
<input type="text" data-table="view_item_received" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="30" placeholder="<?php echo HtmlEncode($view_item_received->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_item_received->GrnMRP->EditValue ?>"<?php echo $view_item_received->GrnMRP->editAttributes() ?>>
</span>
<?php echo $view_item_received->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_view_item_received_trid" for="x_trid" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->trid->caption() ?><?php echo ($view_item_received->trid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->trid->cellAttributes() ?>>
<span id="el_view_item_received_trid">
<input type="text" data-table="view_item_received" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($view_item_received->trid->getPlaceHolder()) ?>" value="<?php echo $view_item_received->trid->EditValue ?>"<?php echo $view_item_received->trid->editAttributes() ?>>
</span>
<?php echo $view_item_received->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_item_received_HospID" for="x_HospID" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->HospID->caption() ?><?php echo ($view_item_received->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->HospID->cellAttributes() ?>>
<span id="el_view_item_received_HospID">
<input type="text" data-table="view_item_received" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_item_received->HospID->getPlaceHolder()) ?>" value="<?php echo $view_item_received->HospID->EditValue ?>"<?php echo $view_item_received->HospID->editAttributes() ?>>
</span>
<?php echo $view_item_received->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_view_item_received_CreatedBy" for="x_CreatedBy" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->CreatedBy->caption() ?><?php echo ($view_item_received->CreatedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->CreatedBy->cellAttributes() ?>>
<span id="el_view_item_received_CreatedBy">
<input type="text" data-table="view_item_received" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_item_received->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_item_received->CreatedBy->EditValue ?>"<?php echo $view_item_received->CreatedBy->editAttributes() ?>>
</span>
<?php echo $view_item_received->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label id="elh_view_item_received_CreatedDateTime" for="x_CreatedDateTime" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->CreatedDateTime->caption() ?><?php echo ($view_item_received->CreatedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_item_received_CreatedDateTime">
<input type="text" data-table="view_item_received" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_item_received->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_item_received->CreatedDateTime->EditValue ?>"<?php echo $view_item_received->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_item_received->CreatedDateTime->ReadOnly && !$view_item_received->CreatedDateTime->Disabled && !isset($view_item_received->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_item_received->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_item_receivededit", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_item_received->CreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_view_item_received_ModifiedBy" for="x_ModifiedBy" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->ModifiedBy->caption() ?><?php echo ($view_item_received->ModifiedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->ModifiedBy->cellAttributes() ?>>
<span id="el_view_item_received_ModifiedBy">
<input type="text" data-table="view_item_received" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_item_received->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_item_received->ModifiedBy->EditValue ?>"<?php echo $view_item_received->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $view_item_received->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_view_item_received_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->ModifiedDateTime->caption() ?><?php echo ($view_item_received->ModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_item_received_ModifiedDateTime">
<input type="text" data-table="view_item_received" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_item_received->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_item_received->ModifiedDateTime->EditValue ?>"<?php echo $view_item_received->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_item_received->ModifiedDateTime->ReadOnly && !$view_item_received->ModifiedDateTime->Disabled && !isset($view_item_received->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_item_received->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_item_receivededit", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_item_received->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->grncreatedby->Visible) { // grncreatedby ?>
	<div id="r_grncreatedby" class="form-group row">
		<label id="elh_view_item_received_grncreatedby" for="x_grncreatedby" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->grncreatedby->caption() ?><?php echo ($view_item_received->grncreatedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->grncreatedby->cellAttributes() ?>>
<span id="el_view_item_received_grncreatedby">
<input type="text" data-table="view_item_received" data-field="x_grncreatedby" name="x_grncreatedby" id="x_grncreatedby" size="30" placeholder="<?php echo HtmlEncode($view_item_received->grncreatedby->getPlaceHolder()) ?>" value="<?php echo $view_item_received->grncreatedby->EditValue ?>"<?php echo $view_item_received->grncreatedby->editAttributes() ?>>
</span>
<?php echo $view_item_received->grncreatedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<div id="r_grncreatedDateTime" class="form-group row">
		<label id="elh_view_item_received_grncreatedDateTime" for="x_grncreatedDateTime" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->grncreatedDateTime->caption() ?><?php echo ($view_item_received->grncreatedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->grncreatedDateTime->cellAttributes() ?>>
<span id="el_view_item_received_grncreatedDateTime">
<input type="text" data-table="view_item_received" data-field="x_grncreatedDateTime" name="x_grncreatedDateTime" id="x_grncreatedDateTime" placeholder="<?php echo HtmlEncode($view_item_received->grncreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_item_received->grncreatedDateTime->EditValue ?>"<?php echo $view_item_received->grncreatedDateTime->editAttributes() ?>>
<?php if (!$view_item_received->grncreatedDateTime->ReadOnly && !$view_item_received->grncreatedDateTime->Disabled && !isset($view_item_received->grncreatedDateTime->EditAttrs["readonly"]) && !isset($view_item_received->grncreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_item_receivededit", "x_grncreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_item_received->grncreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->grnModifiedby->Visible) { // grnModifiedby ?>
	<div id="r_grnModifiedby" class="form-group row">
		<label id="elh_view_item_received_grnModifiedby" for="x_grnModifiedby" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->grnModifiedby->caption() ?><?php echo ($view_item_received->grnModifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->grnModifiedby->cellAttributes() ?>>
<span id="el_view_item_received_grnModifiedby">
<input type="text" data-table="view_item_received" data-field="x_grnModifiedby" name="x_grnModifiedby" id="x_grnModifiedby" size="30" placeholder="<?php echo HtmlEncode($view_item_received->grnModifiedby->getPlaceHolder()) ?>" value="<?php echo $view_item_received->grnModifiedby->EditValue ?>"<?php echo $view_item_received->grnModifiedby->editAttributes() ?>>
</span>
<?php echo $view_item_received->grnModifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<div id="r_grnModifiedDateTime" class="form-group row">
		<label id="elh_view_item_received_grnModifiedDateTime" for="x_grnModifiedDateTime" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->grnModifiedDateTime->caption() ?><?php echo ($view_item_received->grnModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_view_item_received_grnModifiedDateTime">
<input type="text" data-table="view_item_received" data-field="x_grnModifiedDateTime" name="x_grnModifiedDateTime" id="x_grnModifiedDateTime" placeholder="<?php echo HtmlEncode($view_item_received->grnModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_item_received->grnModifiedDateTime->EditValue ?>"<?php echo $view_item_received->grnModifiedDateTime->editAttributes() ?>>
<?php if (!$view_item_received->grnModifiedDateTime->ReadOnly && !$view_item_received->grnModifiedDateTime->Disabled && !isset($view_item_received->grnModifiedDateTime->EditAttrs["readonly"]) && !isset($view_item_received->grnModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_item_receivededit", "x_grnModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_item_received->grnModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_item_received->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_view_item_received_Received" class="<?php echo $view_item_received_edit->LeftColumnClass ?>"><?php echo $view_item_received->Received->caption() ?><?php echo ($view_item_received->Received->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_item_received_edit->RightColumnClass ?>"><div<?php echo $view_item_received->Received->cellAttributes() ?>>
<span id="el_view_item_received_Received">
<div id="tp_x_Received" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_item_received" data-field="x_Received" data-value-separator="<?php echo $view_item_received->Received->displayValueSeparatorAttribute() ?>" name="x_Received[]" id="x_Received[]" value="{value}"<?php echo $view_item_received->Received->editAttributes() ?>></div>
<div id="dsl_x_Received" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_item_received->Received->checkBoxListHtml(FALSE, "x_Received[]") ?>
</div></div>
</span>
<?php echo $view_item_received->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_item_received_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_item_received_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_item_received_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_item_received_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_item_received_edit->terminate();
?>