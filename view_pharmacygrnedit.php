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
$view_pharmacygrn_edit = new view_pharmacygrn_edit();

// Run the page
$view_pharmacygrn_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacygrn_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_pharmacygrnedit = currentForm = new ew.Form("fview_pharmacygrnedit", "edit");

// Validate form
fview_pharmacygrnedit.validate = function() {
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
		<?php if ($view_pharmacygrn_edit->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->ORDNO->caption(), $view_pharmacygrn->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PRC->caption(), $view_pharmacygrn->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->QTY->Required) { ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->QTY->caption(), $view_pharmacygrn->QTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->QTY->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->DT->caption(), $view_pharmacygrn->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->DT->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PC->caption(), $view_pharmacygrn->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->YM->caption(), $view_pharmacygrn->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->Stock->Required) { ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->Stock->caption(), $view_pharmacygrn->Stock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->Stock->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->LastMonthSale->Required) { ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->LastMonthSale->caption(), $view_pharmacygrn->LastMonthSale->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->LastMonthSale->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->Printcheck->Required) { ?>
			elm = this.getElements("x" + infix + "_Printcheck");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->Printcheck->caption(), $view_pharmacygrn->Printcheck->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->id->caption(), $view_pharmacygrn->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->poid->Required) { ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->poid->caption(), $view_pharmacygrn->poid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->poid->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PrName->caption(), $view_pharmacygrn->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->grnid->Required) { ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grnid->caption(), $view_pharmacygrn->grnid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->grnid->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->GrnQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->GrnQuantity->caption(), $view_pharmacygrn->GrnQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->GrnQuantity->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->Quantity->caption(), $view_pharmacygrn->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->Quantity->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->FreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->FreeQty->caption(), $view_pharmacygrn->FreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->FreeQty->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->FreeQtyyy->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->FreeQtyyy->caption(), $view_pharmacygrn->FreeQtyyy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->FreeQtyyy->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->BatchNo->caption(), $view_pharmacygrn->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->ExpDate->caption(), $view_pharmacygrn->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->ExpDate->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->HSN->Required) { ?>
			elm = this.getElements("x" + infix + "_HSN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->HSN->caption(), $view_pharmacygrn->HSN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->MFRCODE->caption(), $view_pharmacygrn->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PUnit->caption(), $view_pharmacygrn->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->PUnit->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->SUnit->caption(), $view_pharmacygrn->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->SUnit->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->Pack->Required) { ?>
			elm = this.getElements("x" + infix + "_Pack");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->Pack->caption(), $view_pharmacygrn->Pack->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->GrnMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->GrnMRP->caption(), $view_pharmacygrn->GrnMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->GrnMRP->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->MRP->caption(), $view_pharmacygrn->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->MRP->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PurValue->caption(), $view_pharmacygrn->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->PurValue->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->GRNPer->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->GRNPer->caption(), $view_pharmacygrn->GRNPer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->GRNPer->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->Disc->Required) { ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->Disc->caption(), $view_pharmacygrn->Disc->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PSGST->caption(), $view_pharmacygrn->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PCGST->caption(), $view_pharmacygrn->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->PTax->Required) { ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PTax->caption(), $view_pharmacygrn->PTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->PTax->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->ItemValue->caption(), $view_pharmacygrn->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->ItemValue->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->SalTax->Required) { ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->SalTax->caption(), $view_pharmacygrn->SalTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->SalTax->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PurRate->caption(), $view_pharmacygrn->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->PurRate->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->SalRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->SalRate->caption(), $view_pharmacygrn->SalRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->SalRate->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->Discount->caption(), $view_pharmacygrn->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->Discount->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->SSGST->caption(), $view_pharmacygrn->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->SCGST->caption(), $view_pharmacygrn->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->BRCODE->caption(), $view_pharmacygrn->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->trid->Required) { ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->trid->caption(), $view_pharmacygrn->trid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->trid->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->HospID->caption(), $view_pharmacygrn->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->CreatedBy->caption(), $view_pharmacygrn->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->CreatedBy->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->CreatedDateTime->caption(), $view_pharmacygrn->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->CreatedDateTime->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->ModifiedBy->caption(), $view_pharmacygrn->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->ModifiedBy->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->ModifiedDateTime->caption(), $view_pharmacygrn->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->ModifiedDateTime->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grncreatedby->caption(), $view_pharmacygrn->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grncreatedDateTime->caption(), $view_pharmacygrn->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grnModifiedby->caption(), $view_pharmacygrn->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grnModifiedDateTime->caption(), $view_pharmacygrn->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->Received->Required) { ?>
			elm = this.getElements("x" + infix + "_Received");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->Received->caption(), $view_pharmacygrn->Received->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->BillDate->caption(), $view_pharmacygrn->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->BillDate->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_edit->grndate->Required) { ?>
			elm = this.getElements("x" + infix + "_grndate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grndate->caption(), $view_pharmacygrn->grndate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_edit->grndatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_grndatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grndatetime->caption(), $view_pharmacygrn->grndatetime->RequiredErrorMessage)) ?>");
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
fview_pharmacygrnedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacygrnedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacygrnedit.lists["x_PrName"] = <?php echo $view_pharmacygrn_edit->PrName->Lookup->toClientList() ?>;
fview_pharmacygrnedit.lists["x_PrName"].options = <?php echo JsonEncode($view_pharmacygrn_edit->PrName->lookupOptions()) ?>;
fview_pharmacygrnedit.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacygrn_edit->showPageHeader(); ?>
<?php
$view_pharmacygrn_edit->showMessage();
?>
<form name="fview_pharmacygrnedit" id="fview_pharmacygrnedit" class="<?php echo $view_pharmacygrn_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacygrn_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacygrn_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacygrn">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacygrn_edit->IsModal ?>">
<?php if ($view_pharmacygrn->getCurrentMasterTable() == "pharmacy_grn") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_grn">
<input type="hidden" name="fk_id" value="<?php echo $view_pharmacygrn->grnid->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_pharmacygrn->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_view_pharmacygrn_ORDNO" for="x_ORDNO" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->ORDNO->caption() ?><?php echo ($view_pharmacygrn->ORDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->ORDNO->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ORDNO">
<input type="text" data-table="view_pharmacygrn" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ORDNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ORDNO->EditValue ?>"<?php echo $view_pharmacygrn->ORDNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_pharmacygrn_PRC" for="x_PRC" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->PRC->caption() ?><?php echo ($view_pharmacygrn->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->PRC->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PRC">
<input type="text" data-table="view_pharmacygrn" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PRC->EditValue ?>"<?php echo $view_pharmacygrn->PRC->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_view_pharmacygrn_QTY" for="x_QTY" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->QTY->caption() ?><?php echo ($view_pharmacygrn->QTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->QTY->cellAttributes() ?>>
<span id="el_view_pharmacygrn_QTY">
<input type="text" data-table="view_pharmacygrn" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn->QTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->QTY->EditValue ?>"<?php echo $view_pharmacygrn->QTY->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_pharmacygrn_DT" for="x_DT" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->DT->caption() ?><?php echo ($view_pharmacygrn->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->DT->cellAttributes() ?>>
<span id="el_view_pharmacygrn_DT">
<input type="text" data-table="view_pharmacygrn" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_pharmacygrn->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->DT->EditValue ?>"<?php echo $view_pharmacygrn->DT->editAttributes() ?>>
<?php if (!$view_pharmacygrn->DT->ReadOnly && !$view_pharmacygrn->DT->Disabled && !isset($view_pharmacygrn->DT->EditAttrs["readonly"]) && !isset($view_pharmacygrn->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrnedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_view_pharmacygrn_PC" for="x_PC" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->PC->caption() ?><?php echo ($view_pharmacygrn->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->PC->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PC">
<input type="text" data-table="view_pharmacygrn" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PC->EditValue ?>"<?php echo $view_pharmacygrn->PC->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_view_pharmacygrn_YM" for="x_YM" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->YM->caption() ?><?php echo ($view_pharmacygrn->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->YM->cellAttributes() ?>>
<span id="el_view_pharmacygrn_YM">
<input type="text" data-table="view_pharmacygrn" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn->YM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->YM->EditValue ?>"<?php echo $view_pharmacygrn->YM->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_view_pharmacygrn_Stock" for="x_Stock" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->Stock->caption() ?><?php echo ($view_pharmacygrn->Stock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->Stock->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Stock">
<input type="text" data-table="view_pharmacygrn" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Stock->EditValue ?>"<?php echo $view_pharmacygrn->Stock->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_view_pharmacygrn_LastMonthSale" for="x_LastMonthSale" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->LastMonthSale->caption() ?><?php echo ($view_pharmacygrn->LastMonthSale->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->LastMonthSale->cellAttributes() ?>>
<span id="el_view_pharmacygrn_LastMonthSale">
<input type="text" data-table="view_pharmacygrn" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->LastMonthSale->EditValue ?>"<?php echo $view_pharmacygrn->LastMonthSale->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_view_pharmacygrn_Printcheck" for="x_Printcheck" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->Printcheck->caption() ?><?php echo ($view_pharmacygrn->Printcheck->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->Printcheck->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Printcheck">
<input type="text" data-table="view_pharmacygrn" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Printcheck->EditValue ?>"<?php echo $view_pharmacygrn->Printcheck->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_pharmacygrn_id" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->id->caption() ?><?php echo ($view_pharmacygrn->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->id->cellAttributes() ?>>
<span id="el_view_pharmacygrn_id">
<span<?php echo $view_pharmacygrn->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_pharmacygrn->id->CurrentValue) ?>">
<?php echo $view_pharmacygrn->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_view_pharmacygrn_poid" for="x_poid" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->poid->caption() ?><?php echo ($view_pharmacygrn->poid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->poid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_poid">
<input type="text" data-table="view_pharmacygrn" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn->poid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->poid->EditValue ?>"<?php echo $view_pharmacygrn->poid->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_view_pharmacygrn_PrName" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->PrName->caption() ?><?php echo ($view_pharmacygrn->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->PrName->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacygrn->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacygrn->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName" class="text-nowrap" style="z-index: 8880">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($view_pharmacygrn->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacygrn->PrName->getPlaceHolder()) ?>"<?php echo $view_pharmacygrn->PrName->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pharmacy_storemast") && !$view_pharmacygrn->PrName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_pharmacygrn->PrName->caption() ?>" data-title="<?php echo $view_pharmacygrn->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PrName',url:'pharmacy_storemastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" data-value-separator="<?php echo $view_pharmacygrn->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacygrnedit.createAutoSuggest({"id":"x_PrName","forceSelect":true});
</script>
<?php echo $view_pharmacygrn->PrName->Lookup->getParamTag("p_x_PrName") ?>
</span>
<?php echo $view_pharmacygrn->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label id="elh_view_pharmacygrn_grnid" for="x_grnid" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->grnid->caption() ?><?php echo ($view_pharmacygrn->grnid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->grnid->cellAttributes() ?>>
<?php if ($view_pharmacygrn->grnid->getSessionValue() <> "") { ?>
<span id="el_view_pharmacygrn_grnid">
<span<?php echo $view_pharmacygrn->grnid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->grnid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_grnid" name="x_grnid" value="<?php echo HtmlEncode($view_pharmacygrn->grnid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_pharmacygrn_grnid">
<input type="text" data-table="view_pharmacygrn" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn->grnid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->grnid->EditValue ?>"<?php echo $view_pharmacygrn->grnid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_pharmacygrn->grnid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_view_pharmacygrn_GrnQuantity" for="x_GrnQuantity" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->GrnQuantity->caption() ?><?php echo ($view_pharmacygrn->GrnQuantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->GrnQuantity->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GrnQuantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->GrnQuantity->EditValue ?>"<?php echo $view_pharmacygrn->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_pharmacygrn_Quantity" for="x_Quantity" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->Quantity->caption() ?><?php echo ($view_pharmacygrn->Quantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Quantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Quantity->EditValue ?>"<?php echo $view_pharmacygrn->Quantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label id="elh_view_pharmacygrn_FreeQty" for="x_FreeQty" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->FreeQty->caption() ?><?php echo ($view_pharmacygrn->FreeQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->FreeQty->cellAttributes() ?>>
<span id="el_view_pharmacygrn_FreeQty">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->FreeQty->EditValue ?>"<?php echo $view_pharmacygrn->FreeQty->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->FreeQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<div id="r_FreeQtyyy" class="form-group row">
		<label id="elh_view_pharmacygrn_FreeQtyyy" for="x_FreeQtyyy" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->FreeQtyyy->caption() ?><?php echo ($view_pharmacygrn->FreeQtyyy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->FreeQtyyy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_FreeQtyyy">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="x_FreeQtyyy" id="x_FreeQtyyy" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->FreeQtyyy->EditValue ?>"<?php echo $view_pharmacygrn->FreeQtyyy->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->FreeQtyyy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_view_pharmacygrn_BatchNo" for="x_BatchNo" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->BatchNo->caption() ?><?php echo ($view_pharmacygrn->BatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->BatchNo->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BatchNo">
<input type="text" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->BatchNo->EditValue ?>"<?php echo $view_pharmacygrn->BatchNo->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label id="elh_view_pharmacygrn_ExpDate" for="x_ExpDate" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->ExpDate->caption() ?><?php echo ($view_pharmacygrn->ExpDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->ExpDate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ExpDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ExpDate->EditValue ?>"<?php echo $view_pharmacygrn->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn->ExpDate->ReadOnly && !$view_pharmacygrn->ExpDate->Disabled && !isset($view_pharmacygrn->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrnedit", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn->ExpDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_view_pharmacygrn_HSN" for="x_HSN" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->HSN->caption() ?><?php echo ($view_pharmacygrn->HSN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->HSN->cellAttributes() ?>>
<span id="el_view_pharmacygrn_HSN">
<input type="text" data-table="view_pharmacygrn" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->HSN->EditValue ?>"<?php echo $view_pharmacygrn->HSN->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_view_pharmacygrn_MFRCODE" for="x_MFRCODE" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->MFRCODE->caption() ?><?php echo ($view_pharmacygrn->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacygrn_MFRCODE">
<input type="text" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->MFRCODE->EditValue ?>"<?php echo $view_pharmacygrn->MFRCODE->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_view_pharmacygrn_PUnit" for="x_PUnit" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->PUnit->caption() ?><?php echo ($view_pharmacygrn->PUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->PUnit->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PUnit->EditValue ?>"<?php echo $view_pharmacygrn->PUnit->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_view_pharmacygrn_SUnit" for="x_SUnit" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->SUnit->caption() ?><?php echo ($view_pharmacygrn->SUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->SUnit->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SUnit->EditValue ?>"<?php echo $view_pharmacygrn->SUnit->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_view_pharmacygrn_Pack" for="x_Pack" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->Pack->caption() ?><?php echo ($view_pharmacygrn->Pack->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->Pack->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Pack">
<input type="text" data-table="view_pharmacygrn" data-field="x_Pack" name="x_Pack" id="x_Pack" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Pack->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Pack->EditValue ?>"<?php echo $view_pharmacygrn->Pack->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_view_pharmacygrn_GrnMRP" for="x_GrnMRP" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->GrnMRP->caption() ?><?php echo ($view_pharmacygrn->GrnMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->GrnMRP->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GrnMRP">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->GrnMRP->EditValue ?>"<?php echo $view_pharmacygrn->GrnMRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_view_pharmacygrn_MRP" for="x_MRP" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->MRP->caption() ?><?php echo ($view_pharmacygrn->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->MRP->cellAttributes() ?>>
<span id="el_view_pharmacygrn_MRP">
<input type="text" data-table="view_pharmacygrn" data-field="x_MRP" name="x_MRP" id="x_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->MRP->EditValue ?>"<?php echo $view_pharmacygrn->MRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_view_pharmacygrn_PurValue" for="x_PurValue" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->PurValue->caption() ?><?php echo ($view_pharmacygrn->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->PurValue->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PurValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PurValue->EditValue ?>"<?php echo $view_pharmacygrn->PurValue->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->GRNPer->Visible) { // GRNPer ?>
	<div id="r_GRNPer" class="form-group row">
		<label id="elh_view_pharmacygrn_GRNPer" for="x_GRNPer" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->GRNPer->caption() ?><?php echo ($view_pharmacygrn->GRNPer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->GRNPer->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GRNPer">
<input type="text" data-table="view_pharmacygrn" data-field="x_GRNPer" name="x_GRNPer" id="x_GRNPer" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->GRNPer->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->GRNPer->EditValue ?>"<?php echo $view_pharmacygrn->GRNPer->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->GRNPer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label id="elh_view_pharmacygrn_Disc" for="x_Disc" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->Disc->caption() ?><?php echo ($view_pharmacygrn->Disc->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->Disc->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Disc">
<input type="text" data-table="view_pharmacygrn" data-field="x_Disc" name="x_Disc" id="x_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Disc->EditValue ?>"<?php echo $view_pharmacygrn->Disc->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->Disc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_view_pharmacygrn_PSGST" for="x_PSGST" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->PSGST->caption() ?><?php echo ($view_pharmacygrn->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->PSGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PSGST->EditValue ?>"<?php echo $view_pharmacygrn->PSGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_view_pharmacygrn_PCGST" for="x_PCGST" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->PCGST->caption() ?><?php echo ($view_pharmacygrn->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->PCGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PCGST->EditValue ?>"<?php echo $view_pharmacygrn->PCGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label id="elh_view_pharmacygrn_PTax" for="x_PTax" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->PTax->caption() ?><?php echo ($view_pharmacygrn->PTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->PTax->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_PTax" name="x_PTax" id="x_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PTax->EditValue ?>"<?php echo $view_pharmacygrn->PTax->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->PTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label id="elh_view_pharmacygrn_ItemValue" for="x_ItemValue" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->ItemValue->caption() ?><?php echo ($view_pharmacygrn->ItemValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->ItemValue->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ItemValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ItemValue->EditValue ?>"<?php echo $view_pharmacygrn->ItemValue->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->ItemValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label id="elh_view_pharmacygrn_SalTax" for="x_SalTax" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->SalTax->caption() ?><?php echo ($view_pharmacygrn->SalTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->SalTax->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SalTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SalTax->EditValue ?>"<?php echo $view_pharmacygrn->SalTax->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->SalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_view_pharmacygrn_PurRate" for="x_PurRate" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->PurRate->caption() ?><?php echo ($view_pharmacygrn->PurRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->PurRate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PurRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PurRate->EditValue ?>"<?php echo $view_pharmacygrn->PurRate->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label id="elh_view_pharmacygrn_SalRate" for="x_SalRate" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->SalRate->caption() ?><?php echo ($view_pharmacygrn->SalRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->SalRate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SalRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SalRate->EditValue ?>"<?php echo $view_pharmacygrn->SalRate->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->SalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_view_pharmacygrn_Discount" for="x_Discount" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->Discount->caption() ?><?php echo ($view_pharmacygrn->Discount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->Discount->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Discount">
<input type="text" data-table="view_pharmacygrn" data-field="x_Discount" name="x_Discount" id="x_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Discount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Discount->EditValue ?>"<?php echo $view_pharmacygrn->Discount->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_view_pharmacygrn_SSGST" for="x_SSGST" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->SSGST->caption() ?><?php echo ($view_pharmacygrn->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->SSGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SSGST->EditValue ?>"<?php echo $view_pharmacygrn->SSGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_view_pharmacygrn_SCGST" for="x_SCGST" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->SCGST->caption() ?><?php echo ($view_pharmacygrn->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->SCGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SCGST->EditValue ?>"<?php echo $view_pharmacygrn->SCGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_view_pharmacygrn_trid" for="x_trid" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->trid->caption() ?><?php echo ($view_pharmacygrn->trid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->trid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_trid">
<input type="text" data-table="view_pharmacygrn" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->trid->EditValue ?>"<?php echo $view_pharmacygrn->trid->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_view_pharmacygrn_CreatedBy" for="x_CreatedBy" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->CreatedBy->caption() ?><?php echo ($view_pharmacygrn->CreatedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->CreatedBy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_CreatedBy">
<input type="text" data-table="view_pharmacygrn" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->CreatedBy->EditValue ?>"<?php echo $view_pharmacygrn->CreatedBy->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label id="elh_view_pharmacygrn_CreatedDateTime" for="x_CreatedDateTime" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->CreatedDateTime->caption() ?><?php echo ($view_pharmacygrn->CreatedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_CreatedDateTime">
<input type="text" data-table="view_pharmacygrn" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacygrn->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->CreatedDateTime->EditValue ?>"<?php echo $view_pharmacygrn->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacygrn->CreatedDateTime->ReadOnly && !$view_pharmacygrn->CreatedDateTime->Disabled && !isset($view_pharmacygrn->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacygrn->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrnedit", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn->CreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_view_pharmacygrn_ModifiedBy" for="x_ModifiedBy" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->ModifiedBy->caption() ?><?php echo ($view_pharmacygrn->ModifiedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->ModifiedBy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ModifiedBy">
<input type="text" data-table="view_pharmacygrn" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ModifiedBy->EditValue ?>"<?php echo $view_pharmacygrn->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_view_pharmacygrn_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->ModifiedDateTime->caption() ?><?php echo ($view_pharmacygrn->ModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ModifiedDateTime">
<input type="text" data-table="view_pharmacygrn" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ModifiedDateTime->EditValue ?>"<?php echo $view_pharmacygrn->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacygrn->ModifiedDateTime->ReadOnly && !$view_pharmacygrn->ModifiedDateTime->Disabled && !isset($view_pharmacygrn->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacygrn->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrnedit", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_view_pharmacygrn_Received" for="x_Received" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->Received->caption() ?><?php echo ($view_pharmacygrn->Received->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->Received->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Received">
<input type="text" data-table="view_pharmacygrn" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Received->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Received->EditValue ?>"<?php echo $view_pharmacygrn->Received->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_view_pharmacygrn_BillDate" for="x_BillDate" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn->BillDate->caption() ?><?php echo ($view_pharmacygrn->BillDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div<?php echo $view_pharmacygrn->BillDate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BillDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacygrn->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->BillDate->EditValue ?>"<?php echo $view_pharmacygrn->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn->BillDate->ReadOnly && !$view_pharmacygrn->BillDate->Disabled && !isset($view_pharmacygrn->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrnedit", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn->BillDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacygrn_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacygrn_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacygrn_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacygrn_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacygrn_edit->terminate();
?>