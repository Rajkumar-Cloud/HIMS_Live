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
$view_pharmacygrn_add = new view_pharmacygrn_add();

// Run the page
$view_pharmacygrn_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacygrn_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_pharmacygrnadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fview_pharmacygrnadd = currentForm = new ew.Form("fview_pharmacygrnadd", "add");

	// Validate form
	fview_pharmacygrnadd.validate = function() {
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
			<?php if ($view_pharmacygrn_add->ORDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_ORDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->ORDNO->caption(), $view_pharmacygrn_add->ORDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->PRC->caption(), $view_pharmacygrn_add->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->QTY->Required) { ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->QTY->caption(), $view_pharmacygrn_add->QTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->QTY->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->DT->caption(), $view_pharmacygrn_add->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->DT->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->PC->caption(), $view_pharmacygrn_add->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->YM->Required) { ?>
				elm = this.getElements("x" + infix + "_YM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->YM->caption(), $view_pharmacygrn_add->YM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->Stock->Required) { ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->Stock->caption(), $view_pharmacygrn_add->Stock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->Stock->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->LastMonthSale->Required) { ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->LastMonthSale->caption(), $view_pharmacygrn_add->LastMonthSale->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->LastMonthSale->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->Printcheck->Required) { ?>
				elm = this.getElements("x" + infix + "_Printcheck");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->Printcheck->caption(), $view_pharmacygrn_add->Printcheck->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->poid->Required) { ?>
				elm = this.getElements("x" + infix + "_poid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->poid->caption(), $view_pharmacygrn_add->poid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_poid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->poid->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->PrName->caption(), $view_pharmacygrn_add->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->grnid->Required) { ?>
				elm = this.getElements("x" + infix + "_grnid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->grnid->caption(), $view_pharmacygrn_add->grnid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grnid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->grnid->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->GrnQuantity->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->GrnQuantity->caption(), $view_pharmacygrn_add->GrnQuantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->GrnQuantity->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->Quantity->caption(), $view_pharmacygrn_add->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->Quantity->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->FreeQty->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->FreeQty->caption(), $view_pharmacygrn_add->FreeQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeQty");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->FreeQty->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->BatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->BatchNo->caption(), $view_pharmacygrn_add->BatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->ExpDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->ExpDate->caption(), $view_pharmacygrn_add->ExpDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->ExpDate->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->HSN->Required) { ?>
				elm = this.getElements("x" + infix + "_HSN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->HSN->caption(), $view_pharmacygrn_add->HSN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->MFRCODE->caption(), $view_pharmacygrn_add->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->PUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->PUnit->caption(), $view_pharmacygrn_add->PUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->PUnit->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->SUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->SUnit->caption(), $view_pharmacygrn_add->SUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->SUnit->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->Pack->Required) { ?>
				elm = this.getElements("x" + infix + "_Pack");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->Pack->caption(), $view_pharmacygrn_add->Pack->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->GrnMRP->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnMRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->GrnMRP->caption(), $view_pharmacygrn_add->GrnMRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnMRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->GrnMRP->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->MRP->caption(), $view_pharmacygrn_add->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->MRP->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->PurValue->Required) { ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->PurValue->caption(), $view_pharmacygrn_add->PurValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->PurValue->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->Disc->Required) { ?>
				elm = this.getElements("x" + infix + "_Disc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->Disc->caption(), $view_pharmacygrn_add->Disc->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Disc");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->Disc->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->PSGST->caption(), $view_pharmacygrn_add->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->PCGST->caption(), $view_pharmacygrn_add->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->PTax->Required) { ?>
				elm = this.getElements("x" + infix + "_PTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->PTax->caption(), $view_pharmacygrn_add->PTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->PTax->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->ItemValue->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->ItemValue->caption(), $view_pharmacygrn_add->ItemValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->ItemValue->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->SalTax->Required) { ?>
				elm = this.getElements("x" + infix + "_SalTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->SalTax->caption(), $view_pharmacygrn_add->SalTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->SalTax->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->PurRate->Required) { ?>
				elm = this.getElements("x" + infix + "_PurRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->PurRate->caption(), $view_pharmacygrn_add->PurRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->PurRate->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->SalRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SalRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->SalRate->caption(), $view_pharmacygrn_add->SalRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->SalRate->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->Discount->caption(), $view_pharmacygrn_add->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->Discount->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->SSGST->caption(), $view_pharmacygrn_add->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->SCGST->caption(), $view_pharmacygrn_add->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->BRCODE->caption(), $view_pharmacygrn_add->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->trid->Required) { ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->trid->caption(), $view_pharmacygrn_add->trid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->trid->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->HospID->caption(), $view_pharmacygrn_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->CreatedBy->caption(), $view_pharmacygrn_add->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->CreatedBy->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->CreatedDateTime->caption(), $view_pharmacygrn_add->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->CreatedDateTime->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->ModifiedBy->caption(), $view_pharmacygrn_add->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->ModifiedBy->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->ModifiedDateTime->caption(), $view_pharmacygrn_add->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->ModifiedDateTime->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_add->grncreatedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->grncreatedby->caption(), $view_pharmacygrn_add->grncreatedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->grncreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->grncreatedDateTime->caption(), $view_pharmacygrn_add->grncreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->grnModifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->grnModifiedby->caption(), $view_pharmacygrn_add->grnModifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->grnModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->grnModifiedDateTime->caption(), $view_pharmacygrn_add->grnModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->Received->Required) { ?>
				elm = this.getElements("x" + infix + "_Received");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->Received->caption(), $view_pharmacygrn_add->Received->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_add->BillDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_add->BillDate->caption(), $view_pharmacygrn_add->BillDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_add->BillDate->errorMessage()) ?>");

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
	fview_pharmacygrnadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacygrnadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacygrnadd.lists["x_PrName"] = <?php echo $view_pharmacygrn_add->PrName->Lookup->toClientList($view_pharmacygrn_add) ?>;
	fview_pharmacygrnadd.lists["x_PrName"].options = <?php echo JsonEncode($view_pharmacygrn_add->PrName->lookupOptions()) ?>;
	fview_pharmacygrnadd.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacygrnadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacygrn_add->showPageHeader(); ?>
<?php
$view_pharmacygrn_add->showMessage();
?>
<form name="fview_pharmacygrnadd" id="fview_pharmacygrnadd" class="<?php echo $view_pharmacygrn_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacygrn">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacygrn_add->IsModal ?>">
<?php if ($view_pharmacygrn->getCurrentMasterTable() == "pharmacy_grn") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_grn">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_pharmacygrn_add->grnid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($view_pharmacygrn_add->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_view_pharmacygrn_ORDNO" for="x_ORDNO" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->ORDNO->caption() ?><?php echo $view_pharmacygrn_add->ORDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->ORDNO->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ORDNO">
<input type="text" data-table="view_pharmacygrn" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->ORDNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->ORDNO->EditValue ?>"<?php echo $view_pharmacygrn_add->ORDNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_pharmacygrn_PRC" for="x_PRC" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->PRC->caption() ?><?php echo $view_pharmacygrn_add->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->PRC->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PRC">
<input type="text" data-table="view_pharmacygrn" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->PRC->EditValue ?>"<?php echo $view_pharmacygrn_add->PRC->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_view_pharmacygrn_QTY" for="x_QTY" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->QTY->caption() ?><?php echo $view_pharmacygrn_add->QTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->QTY->cellAttributes() ?>>
<span id="el_view_pharmacygrn_QTY">
<input type="text" data-table="view_pharmacygrn" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->QTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->QTY->EditValue ?>"<?php echo $view_pharmacygrn_add->QTY->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_pharmacygrn_DT" for="x_DT" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->DT->caption() ?><?php echo $view_pharmacygrn_add->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->DT->cellAttributes() ?>>
<span id="el_view_pharmacygrn_DT">
<input type="text" data-table="view_pharmacygrn" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->DT->EditValue ?>"<?php echo $view_pharmacygrn_add->DT->editAttributes() ?>>
<?php if (!$view_pharmacygrn_add->DT->ReadOnly && !$view_pharmacygrn_add->DT->Disabled && !isset($view_pharmacygrn_add->DT->EditAttrs["readonly"]) && !isset($view_pharmacygrn_add->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrnadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrnadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn_add->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_view_pharmacygrn_PC" for="x_PC" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->PC->caption() ?><?php echo $view_pharmacygrn_add->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->PC->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PC">
<input type="text" data-table="view_pharmacygrn" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->PC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->PC->EditValue ?>"<?php echo $view_pharmacygrn_add->PC->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_view_pharmacygrn_YM" for="x_YM" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->YM->caption() ?><?php echo $view_pharmacygrn_add->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->YM->cellAttributes() ?>>
<span id="el_view_pharmacygrn_YM">
<input type="text" data-table="view_pharmacygrn" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->YM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->YM->EditValue ?>"<?php echo $view_pharmacygrn_add->YM->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_view_pharmacygrn_Stock" for="x_Stock" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->Stock->caption() ?><?php echo $view_pharmacygrn_add->Stock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->Stock->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Stock">
<input type="text" data-table="view_pharmacygrn" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->Stock->EditValue ?>"<?php echo $view_pharmacygrn_add->Stock->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_view_pharmacygrn_LastMonthSale" for="x_LastMonthSale" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->LastMonthSale->caption() ?><?php echo $view_pharmacygrn_add->LastMonthSale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->LastMonthSale->cellAttributes() ?>>
<span id="el_view_pharmacygrn_LastMonthSale">
<input type="text" data-table="view_pharmacygrn" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->LastMonthSale->EditValue ?>"<?php echo $view_pharmacygrn_add->LastMonthSale->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_view_pharmacygrn_Printcheck" for="x_Printcheck" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->Printcheck->caption() ?><?php echo $view_pharmacygrn_add->Printcheck->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->Printcheck->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Printcheck">
<input type="text" data-table="view_pharmacygrn" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->Printcheck->EditValue ?>"<?php echo $view_pharmacygrn_add->Printcheck->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_view_pharmacygrn_poid" for="x_poid" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->poid->caption() ?><?php echo $view_pharmacygrn_add->poid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->poid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_poid">
<input type="text" data-table="view_pharmacygrn" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->poid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->poid->EditValue ?>"<?php echo $view_pharmacygrn_add->poid->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_view_pharmacygrn_PrName" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->PrName->caption() ?><?php echo $view_pharmacygrn_add->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->PrName->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PrName">
<?php
$onchange = $view_pharmacygrn_add->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacygrn_add->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($view_pharmacygrn_add->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->PrName->getPlaceHolder()) ?>"<?php echo $view_pharmacygrn_add->PrName->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pharmacy_storemast") && !$view_pharmacygrn_add->PrName->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_pharmacygrn_add->PrName->caption() ?>" data-title="<?php echo $view_pharmacygrn_add->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PrName',url:'pharmacy_storemastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" data-value-separator="<?php echo $view_pharmacygrn_add->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_add->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacygrnadd"], function() {
	fview_pharmacygrnadd.createAutoSuggest({"id":"x_PrName","forceSelect":true});
});
</script>
<?php echo $view_pharmacygrn_add->PrName->Lookup->getParamTag($view_pharmacygrn_add, "p_x_PrName") ?>
</span>
<?php echo $view_pharmacygrn_add->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label id="elh_view_pharmacygrn_grnid" for="x_grnid" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->grnid->caption() ?><?php echo $view_pharmacygrn_add->grnid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->grnid->cellAttributes() ?>>
<?php if ($view_pharmacygrn_add->grnid->getSessionValue() != "") { ?>
<span id="el_view_pharmacygrn_grnid">
<span<?php echo $view_pharmacygrn_add->grnid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_add->grnid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_grnid" name="x_grnid" value="<?php echo HtmlEncode($view_pharmacygrn_add->grnid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_pharmacygrn_grnid">
<input type="text" data-table="view_pharmacygrn" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->grnid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->grnid->EditValue ?>"<?php echo $view_pharmacygrn_add->grnid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_pharmacygrn_add->grnid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_view_pharmacygrn_GrnQuantity" for="x_GrnQuantity" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->GrnQuantity->caption() ?><?php echo $view_pharmacygrn_add->GrnQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->GrnQuantity->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GrnQuantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->GrnQuantity->EditValue ?>"<?php echo $view_pharmacygrn_add->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_pharmacygrn_Quantity" for="x_Quantity" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->Quantity->caption() ?><?php echo $view_pharmacygrn_add->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Quantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->Quantity->EditValue ?>"<?php echo $view_pharmacygrn_add->Quantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label id="elh_view_pharmacygrn_FreeQty" for="x_FreeQty" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->FreeQty->caption() ?><?php echo $view_pharmacygrn_add->FreeQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->FreeQty->cellAttributes() ?>>
<span id="el_view_pharmacygrn_FreeQty">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->FreeQty->EditValue ?>"<?php echo $view_pharmacygrn_add->FreeQty->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->FreeQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_view_pharmacygrn_BatchNo" for="x_BatchNo" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->BatchNo->caption() ?><?php echo $view_pharmacygrn_add->BatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->BatchNo->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BatchNo">
<input type="text" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->BatchNo->EditValue ?>"<?php echo $view_pharmacygrn_add->BatchNo->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label id="elh_view_pharmacygrn_ExpDate" for="x_ExpDate" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->ExpDate->caption() ?><?php echo $view_pharmacygrn_add->ExpDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->ExpDate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ExpDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->ExpDate->EditValue ?>"<?php echo $view_pharmacygrn_add->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn_add->ExpDate->ReadOnly && !$view_pharmacygrn_add->ExpDate->Disabled && !isset($view_pharmacygrn_add->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn_add->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrnadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrnadd", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn_add->ExpDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_view_pharmacygrn_HSN" for="x_HSN" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->HSN->caption() ?><?php echo $view_pharmacygrn_add->HSN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->HSN->cellAttributes() ?>>
<span id="el_view_pharmacygrn_HSN">
<input type="text" data-table="view_pharmacygrn" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->HSN->EditValue ?>"<?php echo $view_pharmacygrn_add->HSN->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_view_pharmacygrn_MFRCODE" for="x_MFRCODE" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->MFRCODE->caption() ?><?php echo $view_pharmacygrn_add->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacygrn_MFRCODE">
<input type="text" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->MFRCODE->EditValue ?>"<?php echo $view_pharmacygrn_add->MFRCODE->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_view_pharmacygrn_PUnit" for="x_PUnit" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->PUnit->caption() ?><?php echo $view_pharmacygrn_add->PUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->PUnit->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->PUnit->EditValue ?>"<?php echo $view_pharmacygrn_add->PUnit->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_view_pharmacygrn_SUnit" for="x_SUnit" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->SUnit->caption() ?><?php echo $view_pharmacygrn_add->SUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->SUnit->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->SUnit->EditValue ?>"<?php echo $view_pharmacygrn_add->SUnit->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_view_pharmacygrn_Pack" for="x_Pack" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->Pack->caption() ?><?php echo $view_pharmacygrn_add->Pack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->Pack->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Pack">
<input type="text" data-table="view_pharmacygrn" data-field="x_Pack" name="x_Pack" id="x_Pack" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->Pack->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->Pack->EditValue ?>"<?php echo $view_pharmacygrn_add->Pack->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_view_pharmacygrn_GrnMRP" for="x_GrnMRP" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->GrnMRP->caption() ?><?php echo $view_pharmacygrn_add->GrnMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->GrnMRP->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GrnMRP">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->GrnMRP->EditValue ?>"<?php echo $view_pharmacygrn_add->GrnMRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_view_pharmacygrn_MRP" for="x_MRP" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->MRP->caption() ?><?php echo $view_pharmacygrn_add->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->MRP->cellAttributes() ?>>
<span id="el_view_pharmacygrn_MRP">
<input type="text" data-table="view_pharmacygrn" data-field="x_MRP" name="x_MRP" id="x_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->MRP->EditValue ?>"<?php echo $view_pharmacygrn_add->MRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_view_pharmacygrn_PurValue" for="x_PurValue" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->PurValue->caption() ?><?php echo $view_pharmacygrn_add->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->PurValue->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PurValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->PurValue->EditValue ?>"<?php echo $view_pharmacygrn_add->PurValue->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label id="elh_view_pharmacygrn_Disc" for="x_Disc" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->Disc->caption() ?><?php echo $view_pharmacygrn_add->Disc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->Disc->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Disc">
<input type="text" data-table="view_pharmacygrn" data-field="x_Disc" name="x_Disc" id="x_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->Disc->EditValue ?>"<?php echo $view_pharmacygrn_add->Disc->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->Disc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_view_pharmacygrn_PSGST" for="x_PSGST" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->PSGST->caption() ?><?php echo $view_pharmacygrn_add->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->PSGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->PSGST->EditValue ?>"<?php echo $view_pharmacygrn_add->PSGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_view_pharmacygrn_PCGST" for="x_PCGST" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->PCGST->caption() ?><?php echo $view_pharmacygrn_add->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->PCGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->PCGST->EditValue ?>"<?php echo $view_pharmacygrn_add->PCGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label id="elh_view_pharmacygrn_PTax" for="x_PTax" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->PTax->caption() ?><?php echo $view_pharmacygrn_add->PTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->PTax->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_PTax" name="x_PTax" id="x_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->PTax->EditValue ?>"<?php echo $view_pharmacygrn_add->PTax->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->PTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label id="elh_view_pharmacygrn_ItemValue" for="x_ItemValue" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->ItemValue->caption() ?><?php echo $view_pharmacygrn_add->ItemValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->ItemValue->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ItemValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->ItemValue->EditValue ?>"<?php echo $view_pharmacygrn_add->ItemValue->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->ItemValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label id="elh_view_pharmacygrn_SalTax" for="x_SalTax" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->SalTax->caption() ?><?php echo $view_pharmacygrn_add->SalTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->SalTax->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SalTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->SalTax->EditValue ?>"<?php echo $view_pharmacygrn_add->SalTax->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->SalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_view_pharmacygrn_PurRate" for="x_PurRate" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->PurRate->caption() ?><?php echo $view_pharmacygrn_add->PurRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->PurRate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PurRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->PurRate->EditValue ?>"<?php echo $view_pharmacygrn_add->PurRate->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label id="elh_view_pharmacygrn_SalRate" for="x_SalRate" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->SalRate->caption() ?><?php echo $view_pharmacygrn_add->SalRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->SalRate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SalRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->SalRate->EditValue ?>"<?php echo $view_pharmacygrn_add->SalRate->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->SalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_view_pharmacygrn_Discount" for="x_Discount" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->Discount->caption() ?><?php echo $view_pharmacygrn_add->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->Discount->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Discount">
<input type="text" data-table="view_pharmacygrn" data-field="x_Discount" name="x_Discount" id="x_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->Discount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->Discount->EditValue ?>"<?php echo $view_pharmacygrn_add->Discount->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_view_pharmacygrn_SSGST" for="x_SSGST" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->SSGST->caption() ?><?php echo $view_pharmacygrn_add->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->SSGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->SSGST->EditValue ?>"<?php echo $view_pharmacygrn_add->SSGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_view_pharmacygrn_SCGST" for="x_SCGST" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->SCGST->caption() ?><?php echo $view_pharmacygrn_add->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->SCGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->SCGST->EditValue ?>"<?php echo $view_pharmacygrn_add->SCGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_view_pharmacygrn_trid" for="x_trid" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->trid->caption() ?><?php echo $view_pharmacygrn_add->trid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->trid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_trid">
<input type="text" data-table="view_pharmacygrn" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->trid->EditValue ?>"<?php echo $view_pharmacygrn_add->trid->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_view_pharmacygrn_CreatedBy" for="x_CreatedBy" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->CreatedBy->caption() ?><?php echo $view_pharmacygrn_add->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->CreatedBy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_CreatedBy">
<input type="text" data-table="view_pharmacygrn" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->CreatedBy->EditValue ?>"<?php echo $view_pharmacygrn_add->CreatedBy->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label id="elh_view_pharmacygrn_CreatedDateTime" for="x_CreatedDateTime" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->CreatedDateTime->caption() ?><?php echo $view_pharmacygrn_add->CreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_CreatedDateTime">
<input type="text" data-table="view_pharmacygrn" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->CreatedDateTime->EditValue ?>"<?php echo $view_pharmacygrn_add->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacygrn_add->CreatedDateTime->ReadOnly && !$view_pharmacygrn_add->CreatedDateTime->Disabled && !isset($view_pharmacygrn_add->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacygrn_add->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrnadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrnadd", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn_add->CreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_view_pharmacygrn_ModifiedBy" for="x_ModifiedBy" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->ModifiedBy->caption() ?><?php echo $view_pharmacygrn_add->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->ModifiedBy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ModifiedBy">
<input type="text" data-table="view_pharmacygrn" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->ModifiedBy->EditValue ?>"<?php echo $view_pharmacygrn_add->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_view_pharmacygrn_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->ModifiedDateTime->caption() ?><?php echo $view_pharmacygrn_add->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ModifiedDateTime">
<input type="text" data-table="view_pharmacygrn" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->ModifiedDateTime->EditValue ?>"<?php echo $view_pharmacygrn_add->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacygrn_add->ModifiedDateTime->ReadOnly && !$view_pharmacygrn_add->ModifiedDateTime->Disabled && !isset($view_pharmacygrn_add->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacygrn_add->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrnadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrnadd", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn_add->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_view_pharmacygrn_Received" for="x_Received" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->Received->caption() ?><?php echo $view_pharmacygrn_add->Received->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->Received->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Received">
<input type="text" data-table="view_pharmacygrn" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->Received->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->Received->EditValue ?>"<?php echo $view_pharmacygrn_add->Received->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_add->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_add->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_view_pharmacygrn_BillDate" for="x_BillDate" class="<?php echo $view_pharmacygrn_add->LeftColumnClass ?>"><?php echo $view_pharmacygrn_add->BillDate->caption() ?><?php echo $view_pharmacygrn_add->BillDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_add->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_add->BillDate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BillDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacygrn_add->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_add->BillDate->EditValue ?>"<?php echo $view_pharmacygrn_add->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn_add->BillDate->ReadOnly && !$view_pharmacygrn_add->BillDate->Disabled && !isset($view_pharmacygrn_add->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn_add->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrnadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrnadd", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn_add->BillDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacygrn_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacygrn_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacygrn_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacygrn_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("[data-name='Quantity']").hide(),$("[data-name='BillDate']").hide();
});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacygrn_add->terminate();
?>