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
$view_store_grn_edit = new view_store_grn_edit();

// Run the page
$view_store_grn_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_store_grn_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_store_grnedit = currentForm = new ew.Form("fview_store_grnedit", "edit");

// Validate form
fview_store_grnedit.validate = function() {
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
		<?php if ($view_store_grn_edit->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->ORDNO->caption(), $view_store_grn->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PRC->caption(), $view_store_grn->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PrName->caption(), $view_store_grn->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->GrnQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->GrnQuantity->caption(), $view_store_grn->GrnQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->GrnQuantity->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->QTY->Required) { ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->QTY->caption(), $view_store_grn->QTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->QTY->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->FreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->FreeQty->caption(), $view_store_grn->FreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->FreeQty->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->DT->caption(), $view_store_grn->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->DT->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PC->caption(), $view_store_grn->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->YM->caption(), $view_store_grn->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->MFRCODE->caption(), $view_store_grn->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PUnit->caption(), $view_store_grn->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->PUnit->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->SUnit->caption(), $view_store_grn->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->SUnit->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->Stock->Required) { ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->Stock->caption(), $view_store_grn->Stock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->Stock->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->MRP->caption(), $view_store_grn->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->MRP->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PurRate->caption(), $view_store_grn->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->PurRate->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PurValue->caption(), $view_store_grn->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->PurValue->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->Disc->Required) { ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->Disc->caption(), $view_store_grn->Disc->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->Disc->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PSGST->caption(), $view_store_grn->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PCGST->caption(), $view_store_grn->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->PTax->Required) { ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PTax->caption(), $view_store_grn->PTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->PTax->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->ItemValue->caption(), $view_store_grn->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->ItemValue->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->SalTax->Required) { ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->SalTax->caption(), $view_store_grn->SalTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->SalTax->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->LastMonthSale->Required) { ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->LastMonthSale->caption(), $view_store_grn->LastMonthSale->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->LastMonthSale->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->Printcheck->Required) { ?>
			elm = this.getElements("x" + infix + "_Printcheck");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->Printcheck->caption(), $view_store_grn->Printcheck->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->id->caption(), $view_store_grn->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->poid->Required) { ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->poid->caption(), $view_store_grn->poid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_poid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->poid->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->grnid->Required) { ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grnid->caption(), $view_store_grn->grnid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grnid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->grnid->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->BatchNo->caption(), $view_store_grn->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->ExpDate->caption(), $view_store_grn->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->ExpDate->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->Quantity->caption(), $view_store_grn->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->Quantity->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->SalRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->SalRate->caption(), $view_store_grn->SalRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->SalRate->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->Discount->caption(), $view_store_grn->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->Discount->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->SSGST->caption(), $view_store_grn->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->SCGST->caption(), $view_store_grn->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->BRCODE->caption(), $view_store_grn->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->HSN->Required) { ?>
			elm = this.getElements("x" + infix + "_HSN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->HSN->caption(), $view_store_grn->HSN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->Pack->Required) { ?>
			elm = this.getElements("x" + infix + "_Pack");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->Pack->caption(), $view_store_grn->Pack->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->GrnMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->GrnMRP->caption(), $view_store_grn->GrnMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->GrnMRP->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->trid->Required) { ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->trid->caption(), $view_store_grn->trid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->trid->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->HospID->caption(), $view_store_grn->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->CreatedBy->caption(), $view_store_grn->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->CreatedBy->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->CreatedDateTime->caption(), $view_store_grn->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->CreatedDateTime->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->ModifiedBy->caption(), $view_store_grn->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->ModifiedBy->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->ModifiedDateTime->caption(), $view_store_grn->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->ModifiedDateTime->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grncreatedby->caption(), $view_store_grn->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grncreatedDateTime->caption(), $view_store_grn->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grnModifiedby->caption(), $view_store_grn->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grnModifiedDateTime->caption(), $view_store_grn->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->Received->Required) { ?>
			elm = this.getElements("x" + infix + "_Received");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->Received->caption(), $view_store_grn->Received->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_edit->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->BillDate->caption(), $view_store_grn->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->BillDate->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->CurStock->Required) { ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->CurStock->caption(), $view_store_grn->CurStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->CurStock->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->FreeQtyyy->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->FreeQtyyy->caption(), $view_store_grn->FreeQtyyy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->FreeQtyyy->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->grndate->Required) { ?>
			elm = this.getElements("x" + infix + "_grndate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grndate->caption(), $view_store_grn->grndate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grndate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->grndate->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->grndatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_grndatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grndatetime->caption(), $view_store_grn->grndatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grndatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->grndatetime->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->strid->Required) { ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->strid->caption(), $view_store_grn->strid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->strid->errorMessage()) ?>");
		<?php if ($view_store_grn_edit->GRNPer->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->GRNPer->caption(), $view_store_grn->GRNPer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->GRNPer->errorMessage()) ?>");

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
fview_store_grnedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_store_grnedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_store_grnedit.lists["x_PrName"] = <?php echo $view_store_grn_edit->PrName->Lookup->toClientList() ?>;
fview_store_grnedit.lists["x_PrName"].options = <?php echo JsonEncode($view_store_grn_edit->PrName->lookupOptions()) ?>;
fview_store_grnedit.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_store_grn_edit->showPageHeader(); ?>
<?php
$view_store_grn_edit->showMessage();
?>
<form name="fview_store_grnedit" id="fview_store_grnedit" class="<?php echo $view_store_grn_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_store_grn_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_store_grn_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_store_grn">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_store_grn_edit->IsModal ?>">
<?php if ($view_store_grn->getCurrentMasterTable() == "store_grn") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="store_grn">
<input type="hidden" name="fk_id" value="<?php echo $view_store_grn->grnid->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_store_grn->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_view_store_grn_ORDNO" for="x_ORDNO" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->ORDNO->caption() ?><?php echo ($view_store_grn->ORDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->ORDNO->cellAttributes() ?>>
<span id="el_view_store_grn_ORDNO">
<input type="text" data-table="view_store_grn" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_store_grn->ORDNO->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ORDNO->EditValue ?>"<?php echo $view_store_grn->ORDNO->editAttributes() ?>>
</span>
<?php echo $view_store_grn->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_store_grn_PRC" for="x_PRC" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->PRC->caption() ?><?php echo ($view_store_grn->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->PRC->cellAttributes() ?>>
<span id="el_view_store_grn_PRC">
<input type="text" data-table="view_store_grn" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_store_grn->PRC->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PRC->EditValue ?>"<?php echo $view_store_grn->PRC->editAttributes() ?>>
</span>
<?php echo $view_store_grn->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_view_store_grn_PrName" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->PrName->caption() ?><?php echo ($view_store_grn->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->PrName->cellAttributes() ?>>
<span id="el_view_store_grn_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_store_grn->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_grn->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName" class="text-nowrap" style="z-index: 8970">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($view_store_grn->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_store_grn->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_grn->PrName->getPlaceHolder()) ?>"<?php echo $view_store_grn->PrName->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "store_storemast") && !$view_store_grn->PrName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_store_grn->PrName->caption() ?>" data-title="<?php echo $view_store_grn->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PrName',url:'store_storemastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" data-value-separator="<?php echo $view_store_grn->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_grnedit.createAutoSuggest({"id":"x_PrName","forceSelect":true});
</script>
<?php echo $view_store_grn->PrName->Lookup->getParamTag("p_x_PrName") ?>
</span>
<?php echo $view_store_grn->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_view_store_grn_GrnQuantity" for="x_GrnQuantity" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->GrnQuantity->caption() ?><?php echo ($view_store_grn->GrnQuantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->GrnQuantity->cellAttributes() ?>>
<span id="el_view_store_grn_GrnQuantity">
<input type="text" data-table="view_store_grn" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->GrnQuantity->EditValue ?>"<?php echo $view_store_grn->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $view_store_grn->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_view_store_grn_QTY" for="x_QTY" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->QTY->caption() ?><?php echo ($view_store_grn->QTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->QTY->cellAttributes() ?>>
<span id="el_view_store_grn_QTY">
<input type="text" data-table="view_store_grn" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->QTY->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->QTY->EditValue ?>"<?php echo $view_store_grn->QTY->editAttributes() ?>>
</span>
<?php echo $view_store_grn->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label id="elh_view_store_grn_FreeQty" for="x_FreeQty" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->FreeQty->caption() ?><?php echo ($view_store_grn->FreeQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->FreeQty->cellAttributes() ?>>
<span id="el_view_store_grn_FreeQty">
<input type="text" data-table="view_store_grn" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->FreeQty->EditValue ?>"<?php echo $view_store_grn->FreeQty->editAttributes() ?>>
</span>
<?php echo $view_store_grn->FreeQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_store_grn_DT" for="x_DT" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->DT->caption() ?><?php echo ($view_store_grn->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->DT->cellAttributes() ?>>
<span id="el_view_store_grn_DT">
<input type="text" data-table="view_store_grn" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_store_grn->DT->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->DT->EditValue ?>"<?php echo $view_store_grn->DT->editAttributes() ?>>
<?php if (!$view_store_grn->DT->ReadOnly && !$view_store_grn->DT->Disabled && !isset($view_store_grn->DT->EditAttrs["readonly"]) && !isset($view_store_grn->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grnedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_grn->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_view_store_grn_PC" for="x_PC" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->PC->caption() ?><?php echo ($view_store_grn->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->PC->cellAttributes() ?>>
<span id="el_view_store_grn_PC">
<input type="text" data-table="view_store_grn" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_store_grn->PC->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PC->EditValue ?>"<?php echo $view_store_grn->PC->editAttributes() ?>>
</span>
<?php echo $view_store_grn->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_view_store_grn_YM" for="x_YM" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->YM->caption() ?><?php echo ($view_store_grn->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->YM->cellAttributes() ?>>
<span id="el_view_store_grn_YM">
<input type="text" data-table="view_store_grn" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_store_grn->YM->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->YM->EditValue ?>"<?php echo $view_store_grn->YM->editAttributes() ?>>
</span>
<?php echo $view_store_grn->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_view_store_grn_MFRCODE" for="x_MFRCODE" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->MFRCODE->caption() ?><?php echo ($view_store_grn->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->MFRCODE->cellAttributes() ?>>
<span id="el_view_store_grn_MFRCODE">
<input type="text" data-table="view_store_grn" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_store_grn->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->MFRCODE->EditValue ?>"<?php echo $view_store_grn->MFRCODE->editAttributes() ?>>
</span>
<?php echo $view_store_grn->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_view_store_grn_PUnit" for="x_PUnit" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->PUnit->caption() ?><?php echo ($view_store_grn->PUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->PUnit->cellAttributes() ?>>
<span id="el_view_store_grn_PUnit">
<input type="text" data-table="view_store_grn" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PUnit->EditValue ?>"<?php echo $view_store_grn->PUnit->editAttributes() ?>>
</span>
<?php echo $view_store_grn->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_view_store_grn_SUnit" for="x_SUnit" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->SUnit->caption() ?><?php echo ($view_store_grn->SUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->SUnit->cellAttributes() ?>>
<span id="el_view_store_grn_SUnit">
<input type="text" data-table="view_store_grn" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SUnit->EditValue ?>"<?php echo $view_store_grn->SUnit->editAttributes() ?>>
</span>
<?php echo $view_store_grn->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_view_store_grn_Stock" for="x_Stock" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->Stock->caption() ?><?php echo ($view_store_grn->Stock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->Stock->cellAttributes() ?>>
<span id="el_view_store_grn_Stock">
<input type="text" data-table="view_store_grn" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->Stock->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Stock->EditValue ?>"<?php echo $view_store_grn->Stock->editAttributes() ?>>
</span>
<?php echo $view_store_grn->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_view_store_grn_MRP" for="x_MRP" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->MRP->caption() ?><?php echo ($view_store_grn->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->MRP->cellAttributes() ?>>
<span id="el_view_store_grn_MRP">
<input type="text" data-table="view_store_grn" data-field="x_MRP" name="x_MRP" id="x_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->MRP->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->MRP->EditValue ?>"<?php echo $view_store_grn->MRP->editAttributes() ?>>
</span>
<?php echo $view_store_grn->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_view_store_grn_PurRate" for="x_PurRate" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->PurRate->caption() ?><?php echo ($view_store_grn->PurRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->PurRate->cellAttributes() ?>>
<span id="el_view_store_grn_PurRate">
<input type="text" data-table="view_store_grn" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PurRate->EditValue ?>"<?php echo $view_store_grn->PurRate->editAttributes() ?>>
</span>
<?php echo $view_store_grn->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_view_store_grn_PurValue" for="x_PurValue" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->PurValue->caption() ?><?php echo ($view_store_grn->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->PurValue->cellAttributes() ?>>
<span id="el_view_store_grn_PurValue">
<input type="text" data-table="view_store_grn" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PurValue->EditValue ?>"<?php echo $view_store_grn->PurValue->editAttributes() ?>>
</span>
<?php echo $view_store_grn->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label id="elh_view_store_grn_Disc" for="x_Disc" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->Disc->caption() ?><?php echo ($view_store_grn->Disc->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->Disc->cellAttributes() ?>>
<span id="el_view_store_grn_Disc">
<input type="text" data-table="view_store_grn" data-field="x_Disc" name="x_Disc" id="x_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->Disc->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Disc->EditValue ?>"<?php echo $view_store_grn->Disc->editAttributes() ?>>
</span>
<?php echo $view_store_grn->Disc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_view_store_grn_PSGST" for="x_PSGST" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->PSGST->caption() ?><?php echo ($view_store_grn->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->PSGST->cellAttributes() ?>>
<span id="el_view_store_grn_PSGST">
<input type="text" data-table="view_store_grn" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PSGST->EditValue ?>"<?php echo $view_store_grn->PSGST->editAttributes() ?>>
</span>
<?php echo $view_store_grn->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_view_store_grn_PCGST" for="x_PCGST" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->PCGST->caption() ?><?php echo ($view_store_grn->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->PCGST->cellAttributes() ?>>
<span id="el_view_store_grn_PCGST">
<input type="text" data-table="view_store_grn" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PCGST->EditValue ?>"<?php echo $view_store_grn->PCGST->editAttributes() ?>>
</span>
<?php echo $view_store_grn->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label id="elh_view_store_grn_PTax" for="x_PTax" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->PTax->caption() ?><?php echo ($view_store_grn->PTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->PTax->cellAttributes() ?>>
<span id="el_view_store_grn_PTax">
<input type="text" data-table="view_store_grn" data-field="x_PTax" name="x_PTax" id="x_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->PTax->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PTax->EditValue ?>"<?php echo $view_store_grn->PTax->editAttributes() ?>>
</span>
<?php echo $view_store_grn->PTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label id="elh_view_store_grn_ItemValue" for="x_ItemValue" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->ItemValue->caption() ?><?php echo ($view_store_grn->ItemValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->ItemValue->cellAttributes() ?>>
<span id="el_view_store_grn_ItemValue">
<input type="text" data-table="view_store_grn" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_grn->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ItemValue->EditValue ?>"<?php echo $view_store_grn->ItemValue->editAttributes() ?>>
</span>
<?php echo $view_store_grn->ItemValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label id="elh_view_store_grn_SalTax" for="x_SalTax" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->SalTax->caption() ?><?php echo ($view_store_grn->SalTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->SalTax->cellAttributes() ?>>
<span id="el_view_store_grn_SalTax">
<input type="text" data-table="view_store_grn" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_grn->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SalTax->EditValue ?>"<?php echo $view_store_grn->SalTax->editAttributes() ?>>
</span>
<?php echo $view_store_grn->SalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_view_store_grn_LastMonthSale" for="x_LastMonthSale" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->LastMonthSale->caption() ?><?php echo ($view_store_grn->LastMonthSale->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->LastMonthSale->cellAttributes() ?>>
<span id="el_view_store_grn_LastMonthSale">
<input type="text" data-table="view_store_grn" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->LastMonthSale->EditValue ?>"<?php echo $view_store_grn->LastMonthSale->editAttributes() ?>>
</span>
<?php echo $view_store_grn->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_view_store_grn_Printcheck" for="x_Printcheck" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->Printcheck->caption() ?><?php echo ($view_store_grn->Printcheck->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->Printcheck->cellAttributes() ?>>
<span id="el_view_store_grn_Printcheck">
<input type="text" data-table="view_store_grn" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_store_grn->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Printcheck->EditValue ?>"<?php echo $view_store_grn->Printcheck->editAttributes() ?>>
</span>
<?php echo $view_store_grn->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_store_grn_id" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->id->caption() ?><?php echo ($view_store_grn->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->id->cellAttributes() ?>>
<span id="el_view_store_grn_id">
<span<?php echo $view_store_grn->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_store_grn->id->CurrentValue) ?>">
<?php echo $view_store_grn->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_view_store_grn_poid" for="x_poid" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->poid->caption() ?><?php echo ($view_store_grn->poid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->poid->cellAttributes() ?>>
<span id="el_view_store_grn_poid">
<input type="text" data-table="view_store_grn" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->poid->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->poid->EditValue ?>"<?php echo $view_store_grn->poid->editAttributes() ?>>
</span>
<?php echo $view_store_grn->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label id="elh_view_store_grn_grnid" for="x_grnid" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->grnid->caption() ?><?php echo ($view_store_grn->grnid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->grnid->cellAttributes() ?>>
<?php if ($view_store_grn->grnid->getSessionValue() <> "") { ?>
<span id="el_view_store_grn_grnid">
<span<?php echo $view_store_grn->grnid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->grnid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_grnid" name="x_grnid" value="<?php echo HtmlEncode($view_store_grn->grnid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_store_grn_grnid">
<input type="text" data-table="view_store_grn" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->grnid->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->grnid->EditValue ?>"<?php echo $view_store_grn->grnid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_store_grn->grnid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_view_store_grn_BatchNo" for="x_BatchNo" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->BatchNo->caption() ?><?php echo ($view_store_grn->BatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->BatchNo->cellAttributes() ?>>
<span id="el_view_store_grn_BatchNo">
<input type="text" data-table="view_store_grn" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->BatchNo->EditValue ?>"<?php echo $view_store_grn->BatchNo->editAttributes() ?>>
</span>
<?php echo $view_store_grn->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label id="elh_view_store_grn_ExpDate" for="x_ExpDate" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->ExpDate->caption() ?><?php echo ($view_store_grn->ExpDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->ExpDate->cellAttributes() ?>>
<span id="el_view_store_grn_ExpDate">
<input type="text" data-table="view_store_grn" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ExpDate->EditValue ?>"<?php echo $view_store_grn->ExpDate->editAttributes() ?>>
<?php if (!$view_store_grn->ExpDate->ReadOnly && !$view_store_grn->ExpDate->Disabled && !isset($view_store_grn->ExpDate->EditAttrs["readonly"]) && !isset($view_store_grn->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grnedit", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $view_store_grn->ExpDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_store_grn_Quantity" for="x_Quantity" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->Quantity->caption() ?><?php echo ($view_store_grn->Quantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->Quantity->cellAttributes() ?>>
<span id="el_view_store_grn_Quantity">
<input type="text" data-table="view_store_grn" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Quantity->EditValue ?>"<?php echo $view_store_grn->Quantity->editAttributes() ?>>
</span>
<?php echo $view_store_grn->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label id="elh_view_store_grn_SalRate" for="x_SalRate" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->SalRate->caption() ?><?php echo ($view_store_grn->SalRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->SalRate->cellAttributes() ?>>
<span id="el_view_store_grn_SalRate">
<input type="text" data-table="view_store_grn" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SalRate->EditValue ?>"<?php echo $view_store_grn->SalRate->editAttributes() ?>>
</span>
<?php echo $view_store_grn->SalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_view_store_grn_Discount" for="x_Discount" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->Discount->caption() ?><?php echo ($view_store_grn->Discount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->Discount->cellAttributes() ?>>
<span id="el_view_store_grn_Discount">
<input type="text" data-table="view_store_grn" data-field="x_Discount" name="x_Discount" id="x_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->Discount->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Discount->EditValue ?>"<?php echo $view_store_grn->Discount->editAttributes() ?>>
</span>
<?php echo $view_store_grn->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_view_store_grn_SSGST" for="x_SSGST" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->SSGST->caption() ?><?php echo ($view_store_grn->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->SSGST->cellAttributes() ?>>
<span id="el_view_store_grn_SSGST">
<input type="text" data-table="view_store_grn" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SSGST->EditValue ?>"<?php echo $view_store_grn->SSGST->editAttributes() ?>>
</span>
<?php echo $view_store_grn->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_view_store_grn_SCGST" for="x_SCGST" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->SCGST->caption() ?><?php echo ($view_store_grn->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->SCGST->cellAttributes() ?>>
<span id="el_view_store_grn_SCGST">
<input type="text" data-table="view_store_grn" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SCGST->EditValue ?>"<?php echo $view_store_grn->SCGST->editAttributes() ?>>
</span>
<?php echo $view_store_grn->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_view_store_grn_HSN" for="x_HSN" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->HSN->caption() ?><?php echo ($view_store_grn->HSN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->HSN->cellAttributes() ?>>
<span id="el_view_store_grn_HSN">
<input type="text" data-table="view_store_grn" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->HSN->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->HSN->EditValue ?>"<?php echo $view_store_grn->HSN->editAttributes() ?>>
</span>
<?php echo $view_store_grn->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_view_store_grn_Pack" for="x_Pack" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->Pack->caption() ?><?php echo ($view_store_grn->Pack->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->Pack->cellAttributes() ?>>
<span id="el_view_store_grn_Pack">
<input type="text" data-table="view_store_grn" data-field="x_Pack" name="x_Pack" id="x_Pack" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->Pack->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Pack->EditValue ?>"<?php echo $view_store_grn->Pack->editAttributes() ?>>
</span>
<?php echo $view_store_grn->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_view_store_grn_GrnMRP" for="x_GrnMRP" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->GrnMRP->caption() ?><?php echo ($view_store_grn->GrnMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->GrnMRP->cellAttributes() ?>>
<span id="el_view_store_grn_GrnMRP">
<input type="text" data-table="view_store_grn" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->GrnMRP->EditValue ?>"<?php echo $view_store_grn->GrnMRP->editAttributes() ?>>
</span>
<?php echo $view_store_grn->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_view_store_grn_trid" for="x_trid" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->trid->caption() ?><?php echo ($view_store_grn->trid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->trid->cellAttributes() ?>>
<span id="el_view_store_grn_trid">
<input type="text" data-table="view_store_grn" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->trid->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->trid->EditValue ?>"<?php echo $view_store_grn->trid->editAttributes() ?>>
</span>
<?php echo $view_store_grn->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_view_store_grn_CreatedBy" for="x_CreatedBy" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->CreatedBy->caption() ?><?php echo ($view_store_grn->CreatedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->CreatedBy->cellAttributes() ?>>
<span id="el_view_store_grn_CreatedBy">
<input type="text" data-table="view_store_grn" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->CreatedBy->EditValue ?>"<?php echo $view_store_grn->CreatedBy->editAttributes() ?>>
</span>
<?php echo $view_store_grn->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label id="elh_view_store_grn_CreatedDateTime" for="x_CreatedDateTime" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->CreatedDateTime->caption() ?><?php echo ($view_store_grn->CreatedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_store_grn_CreatedDateTime">
<input type="text" data-table="view_store_grn" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_store_grn->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->CreatedDateTime->EditValue ?>"<?php echo $view_store_grn->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_store_grn->CreatedDateTime->ReadOnly && !$view_store_grn->CreatedDateTime->Disabled && !isset($view_store_grn->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_store_grn->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grnedit", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_grn->CreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_view_store_grn_ModifiedBy" for="x_ModifiedBy" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->ModifiedBy->caption() ?><?php echo ($view_store_grn->ModifiedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->ModifiedBy->cellAttributes() ?>>
<span id="el_view_store_grn_ModifiedBy">
<input type="text" data-table="view_store_grn" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ModifiedBy->EditValue ?>"<?php echo $view_store_grn->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $view_store_grn->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_view_store_grn_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->ModifiedDateTime->caption() ?><?php echo ($view_store_grn->ModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_store_grn_ModifiedDateTime">
<input type="text" data-table="view_store_grn" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_store_grn->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ModifiedDateTime->EditValue ?>"<?php echo $view_store_grn->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_store_grn->ModifiedDateTime->ReadOnly && !$view_store_grn->ModifiedDateTime->Disabled && !isset($view_store_grn->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_store_grn->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grnedit", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_grn->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_view_store_grn_Received" for="x_Received" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->Received->caption() ?><?php echo ($view_store_grn->Received->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->Received->cellAttributes() ?>>
<span id="el_view_store_grn_Received">
<input type="text" data-table="view_store_grn" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_store_grn->Received->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Received->EditValue ?>"<?php echo $view_store_grn->Received->editAttributes() ?>>
</span>
<?php echo $view_store_grn->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_view_store_grn_BillDate" for="x_BillDate" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->BillDate->caption() ?><?php echo ($view_store_grn->BillDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->BillDate->cellAttributes() ?>>
<span id="el_view_store_grn_BillDate">
<input type="text" data-table="view_store_grn" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_store_grn->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->BillDate->EditValue ?>"<?php echo $view_store_grn->BillDate->editAttributes() ?>>
<?php if (!$view_store_grn->BillDate->ReadOnly && !$view_store_grn->BillDate->Disabled && !isset($view_store_grn->BillDate->EditAttrs["readonly"]) && !isset($view_store_grn->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grnedit", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_grn->BillDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label id="elh_view_store_grn_CurStock" for="x_CurStock" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->CurStock->caption() ?><?php echo ($view_store_grn->CurStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->CurStock->cellAttributes() ?>>
<span id="el_view_store_grn_CurStock">
<input type="text" data-table="view_store_grn" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->CurStock->EditValue ?>"<?php echo $view_store_grn->CurStock->editAttributes() ?>>
</span>
<?php echo $view_store_grn->CurStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<div id="r_FreeQtyyy" class="form-group row">
		<label id="elh_view_store_grn_FreeQtyyy" for="x_FreeQtyyy" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->FreeQtyyy->caption() ?><?php echo ($view_store_grn->FreeQtyyy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->FreeQtyyy->cellAttributes() ?>>
<span id="el_view_store_grn_FreeQtyyy">
<input type="text" data-table="view_store_grn" data-field="x_FreeQtyyy" name="x_FreeQtyyy" id="x_FreeQtyyy" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->FreeQtyyy->EditValue ?>"<?php echo $view_store_grn->FreeQtyyy->editAttributes() ?>>
</span>
<?php echo $view_store_grn->FreeQtyyy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
	<div id="r_grndate" class="form-group row">
		<label id="elh_view_store_grn_grndate" for="x_grndate" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->grndate->caption() ?><?php echo ($view_store_grn->grndate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->grndate->cellAttributes() ?>>
<span id="el_view_store_grn_grndate">
<input type="text" data-table="view_store_grn" data-field="x_grndate" name="x_grndate" id="x_grndate" placeholder="<?php echo HtmlEncode($view_store_grn->grndate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->grndate->EditValue ?>"<?php echo $view_store_grn->grndate->editAttributes() ?>>
<?php if (!$view_store_grn->grndate->ReadOnly && !$view_store_grn->grndate->Disabled && !isset($view_store_grn->grndate->EditAttrs["readonly"]) && !isset($view_store_grn->grndate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grnedit", "x_grndate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_grn->grndate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
	<div id="r_grndatetime" class="form-group row">
		<label id="elh_view_store_grn_grndatetime" for="x_grndatetime" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->grndatetime->caption() ?><?php echo ($view_store_grn->grndatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->grndatetime->cellAttributes() ?>>
<span id="el_view_store_grn_grndatetime">
<input type="text" data-table="view_store_grn" data-field="x_grndatetime" name="x_grndatetime" id="x_grndatetime" placeholder="<?php echo HtmlEncode($view_store_grn->grndatetime->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->grndatetime->EditValue ?>"<?php echo $view_store_grn->grndatetime->editAttributes() ?>>
<?php if (!$view_store_grn->grndatetime->ReadOnly && !$view_store_grn->grndatetime->Disabled && !isset($view_store_grn->grndatetime->EditAttrs["readonly"]) && !isset($view_store_grn->grndatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grnedit", "x_grndatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_store_grn->grndatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->strid->Visible) { // strid ?>
	<div id="r_strid" class="form-group row">
		<label id="elh_view_store_grn_strid" for="x_strid" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->strid->caption() ?><?php echo ($view_store_grn->strid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->strid->cellAttributes() ?>>
<span id="el_view_store_grn_strid">
<input type="text" data-table="view_store_grn" data-field="x_strid" name="x_strid" id="x_strid" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->strid->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->strid->EditValue ?>"<?php echo $view_store_grn->strid->editAttributes() ?>>
</span>
<?php echo $view_store_grn->strid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
	<div id="r_GRNPer" class="form-group row">
		<label id="elh_view_store_grn_GRNPer" for="x_GRNPer" class="<?php echo $view_store_grn_edit->LeftColumnClass ?>"><?php echo $view_store_grn->GRNPer->caption() ?><?php echo ($view_store_grn->GRNPer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_store_grn_edit->RightColumnClass ?>"><div<?php echo $view_store_grn->GRNPer->cellAttributes() ?>>
<span id="el_view_store_grn_GRNPer">
<input type="text" data-table="view_store_grn" data-field="x_GRNPer" name="x_GRNPer" id="x_GRNPer" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->GRNPer->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->GRNPer->EditValue ?>"<?php echo $view_store_grn->GRNPer->editAttributes() ?>>
</span>
<?php echo $view_store_grn->GRNPer->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_store_grn_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_store_grn_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_store_grn_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_store_grn_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_store_grn_edit->terminate();
?>