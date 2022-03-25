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
$view_pharmacytransfer_edit = new view_pharmacytransfer_edit();

// Run the page
$view_pharmacytransfer_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacytransfer_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_pharmacytransferedit = currentForm = new ew.Form("fview_pharmacytransferedit", "edit");

// Validate form
fview_pharmacytransferedit.validate = function() {
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
		<?php if ($view_pharmacytransfer_edit->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->ORDNO->caption(), $view_pharmacytransfer->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->BRCODE->caption(), $view_pharmacytransfer->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->BRCODE->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PRC->caption(), $view_pharmacytransfer->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->QTY->Required) { ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->QTY->caption(), $view_pharmacytransfer->QTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->QTY->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->DT->caption(), $view_pharmacytransfer->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->DT->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PC->caption(), $view_pharmacytransfer->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->YM->caption(), $view_pharmacytransfer->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->Stock->Required) { ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->Stock->caption(), $view_pharmacytransfer->Stock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->Stock->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->Printcheck->Required) { ?>
			elm = this.getElements("x" + infix + "_Printcheck");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->Printcheck->caption(), $view_pharmacytransfer->Printcheck->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->id->caption(), $view_pharmacytransfer->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->grnid->Required) { ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->grnid->caption(), $view_pharmacytransfer->grnid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->grnid->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->poid->Required) { ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->poid->caption(), $view_pharmacytransfer->poid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->poid->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->LastMonthSale->Required) { ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->LastMonthSale->caption(), $view_pharmacytransfer->LastMonthSale->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->LastMonthSale->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PrName->caption(), $view_pharmacytransfer->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->GrnQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->GrnQuantity->caption(), $view_pharmacytransfer->GrnQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->GrnQuantity->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->Quantity->caption(), $view_pharmacytransfer->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->Quantity->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->FreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->FreeQty->caption(), $view_pharmacytransfer->FreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->FreeQty->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->BatchNo->caption(), $view_pharmacytransfer->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->ExpDate->caption(), $view_pharmacytransfer->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->ExpDate->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->HSN->Required) { ?>
			elm = this.getElements("x" + infix + "_HSN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->HSN->caption(), $view_pharmacytransfer->HSN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->MFRCODE->caption(), $view_pharmacytransfer->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PUnit->caption(), $view_pharmacytransfer->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PUnit->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->SUnit->caption(), $view_pharmacytransfer->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->SUnit->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->MRP->caption(), $view_pharmacytransfer->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->MRP->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PurValue->caption(), $view_pharmacytransfer->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PurValue->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->Disc->Required) { ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->Disc->caption(), $view_pharmacytransfer->Disc->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->Disc->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PSGST->caption(), $view_pharmacytransfer->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PSGST->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PCGST->caption(), $view_pharmacytransfer->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PCGST->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->PTax->Required) { ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PTax->caption(), $view_pharmacytransfer->PTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PTax->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->ItemValue->caption(), $view_pharmacytransfer->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->ItemValue->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->SalTax->Required) { ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->SalTax->caption(), $view_pharmacytransfer->SalTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->SalTax->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PurRate->caption(), $view_pharmacytransfer->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PurRate->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->SalRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->SalRate->caption(), $view_pharmacytransfer->SalRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->SalRate->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->Discount->caption(), $view_pharmacytransfer->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->Discount->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->SSGST->caption(), $view_pharmacytransfer->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->SSGST->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->SCGST->caption(), $view_pharmacytransfer->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->SCGST->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->Pack->Required) { ?>
			elm = this.getElements("x" + infix + "_Pack");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->Pack->caption(), $view_pharmacytransfer->Pack->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->GrnMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->GrnMRP->caption(), $view_pharmacytransfer->GrnMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->GrnMRP->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->trid->Required) { ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->trid->caption(), $view_pharmacytransfer->trid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->trid->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->HospID->caption(), $view_pharmacytransfer->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->CreatedBy->caption(), $view_pharmacytransfer->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->CreatedBy->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->CreatedDateTime->caption(), $view_pharmacytransfer->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->CreatedDateTime->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->ModifiedBy->caption(), $view_pharmacytransfer->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->ModifiedBy->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->ModifiedDateTime->caption(), $view_pharmacytransfer->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->ModifiedDateTime->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->grncreatedby->caption(), $view_pharmacytransfer->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->grncreatedDateTime->caption(), $view_pharmacytransfer->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->grnModifiedby->caption(), $view_pharmacytransfer->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->grnModifiedDateTime->caption(), $view_pharmacytransfer->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->Received->Required) { ?>
			elm = this.getElements("x" + infix + "_Received");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->Received->caption(), $view_pharmacytransfer->Received->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_edit->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->BillDate->caption(), $view_pharmacytransfer->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->BillDate->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_edit->CurStock->Required) { ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->CurStock->caption(), $view_pharmacytransfer->CurStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->CurStock->errorMessage()) ?>");

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
fview_pharmacytransferedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacytransferedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacytransferedit.lists["x_ORDNO"] = <?php echo $view_pharmacytransfer_edit->ORDNO->Lookup->toClientList() ?>;
fview_pharmacytransferedit.lists["x_ORDNO"].options = <?php echo JsonEncode($view_pharmacytransfer_edit->ORDNO->lookupOptions()) ?>;
fview_pharmacytransferedit.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacytransferedit.lists["x_BRCODE"] = <?php echo $view_pharmacytransfer_edit->BRCODE->Lookup->toClientList() ?>;
fview_pharmacytransferedit.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacytransfer_edit->BRCODE->lookupOptions()) ?>;
fview_pharmacytransferedit.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacytransferedit.lists["x_LastMonthSale"] = <?php echo $view_pharmacytransfer_edit->LastMonthSale->Lookup->toClientList() ?>;
fview_pharmacytransferedit.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_pharmacytransfer_edit->LastMonthSale->lookupOptions()) ?>;
fview_pharmacytransferedit.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacytransfer_edit->showPageHeader(); ?>
<?php
$view_pharmacytransfer_edit->showMessage();
?>
<form name="fview_pharmacytransferedit" id="fview_pharmacytransferedit" class="<?php echo $view_pharmacytransfer_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacytransfer_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacytransfer_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacytransfer">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacytransfer_edit->IsModal ?>">
<?php if ($view_pharmacytransfer->getCurrentMasterTable() == "pharmacy_billing_transfer") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_billing_transfer">
<input type="hidden" name="fk_id" value="<?php echo $view_pharmacytransfer->trid->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_pharmacytransfer->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_view_pharmacytransfer_BRCODE" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->BRCODE->caption() ?><?php echo ($view_pharmacytransfer->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_pharmacytransfer->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE" class="text-nowrap" style="z-index: 8980">
	<input type="text" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?php echo RemoveHtml($view_pharmacytransfer->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacytransfer->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransferedit.createAutoSuggest({"id":"x_BRCODE","forceSelect":false});
</script>
<?php echo $view_pharmacytransfer->BRCODE->Lookup->getParamTag("p_x_BRCODE") ?>
</span>
<?php echo $view_pharmacytransfer->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_pharmacytransfer_PRC" for="x_PRC" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->PRC->caption() ?><?php echo ($view_pharmacytransfer->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PRC->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PRC">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PRC->EditValue ?>"<?php echo $view_pharmacytransfer->PRC->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_view_pharmacytransfer_QTY" for="x_QTY" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->QTY->caption() ?><?php echo ($view_pharmacytransfer->QTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->QTY->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_QTY">
<input type="text" data-table="view_pharmacytransfer" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->QTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->QTY->EditValue ?>"<?php echo $view_pharmacytransfer->QTY->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_pharmacytransfer_DT" for="x_DT" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->DT->caption() ?><?php echo ($view_pharmacytransfer->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->DT->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_DT">
<input type="text" data-table="view_pharmacytransfer" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->DT->EditValue ?>"<?php echo $view_pharmacytransfer->DT->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->DT->ReadOnly && !$view_pharmacytransfer->DT->Disabled && !isset($view_pharmacytransfer->DT->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransferedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacytransfer->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_view_pharmacytransfer_PC" for="x_PC" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->PC->caption() ?><?php echo ($view_pharmacytransfer->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PC->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PC">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PC->EditValue ?>"<?php echo $view_pharmacytransfer->PC->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_view_pharmacytransfer_YM" for="x_YM" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->YM->caption() ?><?php echo ($view_pharmacytransfer->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->YM->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_YM">
<input type="text" data-table="view_pharmacytransfer" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->YM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->YM->EditValue ?>"<?php echo $view_pharmacytransfer->YM->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_view_pharmacytransfer_Stock" for="x_Stock" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->Stock->caption() ?><?php echo ($view_pharmacytransfer->Stock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Stock->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Stock">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Stock->EditValue ?>"<?php echo $view_pharmacytransfer->Stock->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_view_pharmacytransfer_Printcheck" for="x_Printcheck" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->Printcheck->caption() ?><?php echo ($view_pharmacytransfer->Printcheck->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Printcheck->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Printcheck">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Printcheck->EditValue ?>"<?php echo $view_pharmacytransfer->Printcheck->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_pharmacytransfer_id" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->id->caption() ?><?php echo ($view_pharmacytransfer->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->id->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_id">
<span<?php echo $view_pharmacytransfer->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_pharmacytransfer->id->CurrentValue) ?>">
<?php echo $view_pharmacytransfer->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label id="elh_view_pharmacytransfer_grnid" for="x_grnid" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->grnid->caption() ?><?php echo ($view_pharmacytransfer->grnid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->grnid->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grnid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->grnid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->grnid->EditValue ?>"<?php echo $view_pharmacytransfer->grnid->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->grnid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_view_pharmacytransfer_poid" for="x_poid" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->poid->caption() ?><?php echo ($view_pharmacytransfer->poid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->poid->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_poid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->poid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->poid->EditValue ?>"<?php echo $view_pharmacytransfer->poid->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_view_pharmacytransfer_LastMonthSale" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->LastMonthSale->caption() ?><?php echo ($view_pharmacytransfer->LastMonthSale->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->LastMonthSale->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_LastMonthSale">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacytransfer->LastMonthSale->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x_LastMonthSale" class="text-nowrap" style="z-index: 8870">
	<input type="text" class="form-control" name="sv_x_LastMonthSale" id="sv_x_LastMonthSale" value="<?php echo RemoveHtml($view_pharmacytransfer->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_pharmacytransfer->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x_LastMonthSale" id="x_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransferedit.createAutoSuggest({"id":"x_LastMonthSale","forceSelect":true});
</script>
<?php echo $view_pharmacytransfer->LastMonthSale->Lookup->getParamTag("p_x_LastMonthSale") ?>
</span>
<?php echo $view_pharmacytransfer->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_view_pharmacytransfer_PrName" for="x_PrName" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->PrName->caption() ?><?php echo ($view_pharmacytransfer->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PrName->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PrName">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PrName->EditValue ?>"<?php echo $view_pharmacytransfer->PrName->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_view_pharmacytransfer_GrnQuantity" for="x_GrnQuantity" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->GrnQuantity->caption() ?><?php echo ($view_pharmacytransfer->GrnQuantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->GrnQuantity->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_GrnQuantity">
<input type="text" data-table="view_pharmacytransfer" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->GrnQuantity->EditValue ?>"<?php echo $view_pharmacytransfer->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_pharmacytransfer_Quantity" for="x_Quantity" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->Quantity->caption() ?><?php echo ($view_pharmacytransfer->Quantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Quantity">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Quantity->EditValue ?>"<?php echo $view_pharmacytransfer->Quantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label id="elh_view_pharmacytransfer_FreeQty" for="x_FreeQty" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->FreeQty->caption() ?><?php echo ($view_pharmacytransfer->FreeQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->FreeQty->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_FreeQty">
<input type="text" data-table="view_pharmacytransfer" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->FreeQty->EditValue ?>"<?php echo $view_pharmacytransfer->FreeQty->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->FreeQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_view_pharmacytransfer_BatchNo" for="x_BatchNo" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->BatchNo->caption() ?><?php echo ($view_pharmacytransfer->BatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->BatchNo->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BatchNo">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->BatchNo->EditValue ?>"<?php echo $view_pharmacytransfer->BatchNo->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label id="elh_view_pharmacytransfer_ExpDate" for="x_ExpDate" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->ExpDate->caption() ?><?php echo ($view_pharmacytransfer->ExpDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->ExpDate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ExpDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x_ExpDate" id="x_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ExpDate->EditValue ?>"<?php echo $view_pharmacytransfer->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->ExpDate->ReadOnly && !$view_pharmacytransfer->ExpDate->Disabled && !isset($view_pharmacytransfer->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransferedit", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacytransfer->ExpDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_view_pharmacytransfer_HSN" for="x_HSN" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->HSN->caption() ?><?php echo ($view_pharmacytransfer->HSN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->HSN->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_HSN">
<input type="text" data-table="view_pharmacytransfer" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->HSN->EditValue ?>"<?php echo $view_pharmacytransfer->HSN->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_view_pharmacytransfer_MFRCODE" for="x_MFRCODE" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->MFRCODE->caption() ?><?php echo ($view_pharmacytransfer->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_MFRCODE">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->MFRCODE->EditValue ?>"<?php echo $view_pharmacytransfer->MFRCODE->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_view_pharmacytransfer_PUnit" for="x_PUnit" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->PUnit->caption() ?><?php echo ($view_pharmacytransfer->PUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PUnit->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PUnit">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PUnit->EditValue ?>"<?php echo $view_pharmacytransfer->PUnit->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_view_pharmacytransfer_SUnit" for="x_SUnit" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->SUnit->caption() ?><?php echo ($view_pharmacytransfer->SUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->SUnit->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SUnit">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->SUnit->EditValue ?>"<?php echo $view_pharmacytransfer->SUnit->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_view_pharmacytransfer_MRP" for="x_MRP" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->MRP->caption() ?><?php echo ($view_pharmacytransfer->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->MRP->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_MRP">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MRP" name="x_MRP" id="x_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->MRP->EditValue ?>"<?php echo $view_pharmacytransfer->MRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_view_pharmacytransfer_PurValue" for="x_PurValue" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->PurValue->caption() ?><?php echo ($view_pharmacytransfer->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PurValue->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PurValue">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PurValue->EditValue ?>"<?php echo $view_pharmacytransfer->PurValue->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label id="elh_view_pharmacytransfer_Disc" for="x_Disc" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->Disc->caption() ?><?php echo ($view_pharmacytransfer->Disc->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Disc->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Disc">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Disc" name="x_Disc" id="x_Disc" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Disc->EditValue ?>"<?php echo $view_pharmacytransfer->Disc->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->Disc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_view_pharmacytransfer_PSGST" for="x_PSGST" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->PSGST->caption() ?><?php echo ($view_pharmacytransfer->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PSGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PSGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PSGST->EditValue ?>"<?php echo $view_pharmacytransfer->PSGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_view_pharmacytransfer_PCGST" for="x_PCGST" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->PCGST->caption() ?><?php echo ($view_pharmacytransfer->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PCGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PCGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PCGST->EditValue ?>"<?php echo $view_pharmacytransfer->PCGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label id="elh_view_pharmacytransfer_PTax" for="x_PTax" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->PTax->caption() ?><?php echo ($view_pharmacytransfer->PTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PTax->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PTax">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PTax" name="x_PTax" id="x_PTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PTax->EditValue ?>"<?php echo $view_pharmacytransfer->PTax->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->PTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label id="elh_view_pharmacytransfer_ItemValue" for="x_ItemValue" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->ItemValue->caption() ?><?php echo ($view_pharmacytransfer->ItemValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->ItemValue->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ItemValue">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ItemValue->EditValue ?>"<?php echo $view_pharmacytransfer->ItemValue->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->ItemValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label id="elh_view_pharmacytransfer_SalTax" for="x_SalTax" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->SalTax->caption() ?><?php echo ($view_pharmacytransfer->SalTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->SalTax->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SalTax">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->SalTax->EditValue ?>"<?php echo $view_pharmacytransfer->SalTax->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->SalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_view_pharmacytransfer_PurRate" for="x_PurRate" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->PurRate->caption() ?><?php echo ($view_pharmacytransfer->PurRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PurRate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PurRate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PurRate->EditValue ?>"<?php echo $view_pharmacytransfer->PurRate->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label id="elh_view_pharmacytransfer_SalRate" for="x_SalRate" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->SalRate->caption() ?><?php echo ($view_pharmacytransfer->SalRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->SalRate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SalRate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->SalRate->EditValue ?>"<?php echo $view_pharmacytransfer->SalRate->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->SalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_view_pharmacytransfer_Discount" for="x_Discount" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->Discount->caption() ?><?php echo ($view_pharmacytransfer->Discount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Discount->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Discount">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Discount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Discount->EditValue ?>"<?php echo $view_pharmacytransfer->Discount->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_view_pharmacytransfer_SSGST" for="x_SSGST" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->SSGST->caption() ?><?php echo ($view_pharmacytransfer->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->SSGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SSGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->SSGST->EditValue ?>"<?php echo $view_pharmacytransfer->SSGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_view_pharmacytransfer_SCGST" for="x_SCGST" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->SCGST->caption() ?><?php echo ($view_pharmacytransfer->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->SCGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SCGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->SCGST->EditValue ?>"<?php echo $view_pharmacytransfer->SCGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_view_pharmacytransfer_Pack" for="x_Pack" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->Pack->caption() ?><?php echo ($view_pharmacytransfer->Pack->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Pack->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Pack">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Pack->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Pack->EditValue ?>"<?php echo $view_pharmacytransfer->Pack->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_view_pharmacytransfer_GrnMRP" for="x_GrnMRP" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->GrnMRP->caption() ?><?php echo ($view_pharmacytransfer->GrnMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->GrnMRP->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_GrnMRP">
<input type="text" data-table="view_pharmacytransfer" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->GrnMRP->EditValue ?>"<?php echo $view_pharmacytransfer->GrnMRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_view_pharmacytransfer_trid" for="x_trid" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->trid->caption() ?><?php echo ($view_pharmacytransfer->trid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->trid->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->trid->getSessionValue() <> "") { ?>
<span id="el_view_pharmacytransfer_trid">
<span<?php echo $view_pharmacytransfer->trid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->trid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_trid" name="x_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_pharmacytransfer_trid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->trid->EditValue ?>"<?php echo $view_pharmacytransfer->trid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_pharmacytransfer->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_view_pharmacytransfer_CreatedBy" for="x_CreatedBy" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->CreatedBy->caption() ?><?php echo ($view_pharmacytransfer->CreatedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->CreatedBy->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CreatedBy">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->CreatedBy->EditValue ?>"<?php echo $view_pharmacytransfer->CreatedBy->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label id="elh_view_pharmacytransfer_CreatedDateTime" for="x_CreatedDateTime" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->CreatedDateTime->caption() ?><?php echo ($view_pharmacytransfer->CreatedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CreatedDateTime">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->CreatedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->CreatedDateTime->ReadOnly && !$view_pharmacytransfer->CreatedDateTime->Disabled && !isset($view_pharmacytransfer->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransferedit", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacytransfer->CreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_view_pharmacytransfer_ModifiedBy" for="x_ModifiedBy" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->ModifiedBy->caption() ?><?php echo ($view_pharmacytransfer->ModifiedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->ModifiedBy->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ModifiedBy">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ModifiedBy->EditValue ?>"<?php echo $view_pharmacytransfer->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_view_pharmacytransfer_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->ModifiedDateTime->caption() ?><?php echo ($view_pharmacytransfer->ModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ModifiedDateTime">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ModifiedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->ModifiedDateTime->ReadOnly && !$view_pharmacytransfer->ModifiedDateTime->Disabled && !isset($view_pharmacytransfer->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransferedit", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacytransfer->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_view_pharmacytransfer_Received" for="x_Received" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->Received->caption() ?><?php echo ($view_pharmacytransfer->Received->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Received->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Received">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Received->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Received->EditValue ?>"<?php echo $view_pharmacytransfer->Received->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_view_pharmacytransfer_BillDate" for="x_BillDate" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->BillDate->caption() ?><?php echo ($view_pharmacytransfer->BillDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->BillDate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BillDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->BillDate->EditValue ?>"<?php echo $view_pharmacytransfer->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->BillDate->ReadOnly && !$view_pharmacytransfer->BillDate->Disabled && !isset($view_pharmacytransfer->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransferedit", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacytransfer->BillDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label id="elh_view_pharmacytransfer_CurStock" for="x_CurStock" class="<?php echo $view_pharmacytransfer_edit->LeftColumnClass ?>"><?php echo $view_pharmacytransfer->CurStock->caption() ?><?php echo ($view_pharmacytransfer->CurStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_edit->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->CurStock->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CurStock">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->CurStock->EditValue ?>"<?php echo $view_pharmacytransfer->CurStock->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer->CurStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacytransfer_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacytransfer_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacytransfer_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacytransfer_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacytransfer_edit->terminate();
?>