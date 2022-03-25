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
$view_pharmacytransfer_add = new view_pharmacytransfer_add();

// Run the page
$view_pharmacytransfer_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacytransfer_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_pharmacytransferadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fview_pharmacytransferadd = currentForm = new ew.Form("fview_pharmacytransferadd", "add");

	// Validate form
	fview_pharmacytransferadd.validate = function() {
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
			<?php if ($view_pharmacytransfer_add->ORDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_ORDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->ORDNO->caption(), $view_pharmacytransfer_add->ORDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->BRCODE->caption(), $view_pharmacytransfer_add->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->BRCODE->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->PRC->caption(), $view_pharmacytransfer_add->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->QTY->Required) { ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->QTY->caption(), $view_pharmacytransfer_add->QTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->QTY->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->DT->caption(), $view_pharmacytransfer_add->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->DT->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->PC->caption(), $view_pharmacytransfer_add->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->YM->Required) { ?>
				elm = this.getElements("x" + infix + "_YM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->YM->caption(), $view_pharmacytransfer_add->YM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->Stock->Required) { ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->Stock->caption(), $view_pharmacytransfer_add->Stock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->Stock->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->Printcheck->Required) { ?>
				elm = this.getElements("x" + infix + "_Printcheck");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->Printcheck->caption(), $view_pharmacytransfer_add->Printcheck->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->grnid->Required) { ?>
				elm = this.getElements("x" + infix + "_grnid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->grnid->caption(), $view_pharmacytransfer_add->grnid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grnid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->grnid->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->poid->Required) { ?>
				elm = this.getElements("x" + infix + "_poid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->poid->caption(), $view_pharmacytransfer_add->poid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_poid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->poid->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->LastMonthSale->Required) { ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->LastMonthSale->caption(), $view_pharmacytransfer_add->LastMonthSale->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->LastMonthSale->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->PrName->caption(), $view_pharmacytransfer_add->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->GrnQuantity->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->GrnQuantity->caption(), $view_pharmacytransfer_add->GrnQuantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->GrnQuantity->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->Quantity->caption(), $view_pharmacytransfer_add->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->Quantity->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->FreeQty->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->FreeQty->caption(), $view_pharmacytransfer_add->FreeQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeQty");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->FreeQty->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->BatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->BatchNo->caption(), $view_pharmacytransfer_add->BatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->ExpDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->ExpDate->caption(), $view_pharmacytransfer_add->ExpDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->ExpDate->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->HSN->Required) { ?>
				elm = this.getElements("x" + infix + "_HSN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->HSN->caption(), $view_pharmacytransfer_add->HSN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->MFRCODE->caption(), $view_pharmacytransfer_add->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->PUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->PUnit->caption(), $view_pharmacytransfer_add->PUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->PUnit->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->SUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->SUnit->caption(), $view_pharmacytransfer_add->SUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->SUnit->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->MRP->caption(), $view_pharmacytransfer_add->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->MRP->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->PurValue->Required) { ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->PurValue->caption(), $view_pharmacytransfer_add->PurValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->PurValue->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->Disc->Required) { ?>
				elm = this.getElements("x" + infix + "_Disc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->Disc->caption(), $view_pharmacytransfer_add->Disc->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Disc");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->Disc->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->PSGST->caption(), $view_pharmacytransfer_add->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->PSGST->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->PCGST->caption(), $view_pharmacytransfer_add->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->PCGST->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->PTax->Required) { ?>
				elm = this.getElements("x" + infix + "_PTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->PTax->caption(), $view_pharmacytransfer_add->PTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->PTax->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->ItemValue->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->ItemValue->caption(), $view_pharmacytransfer_add->ItemValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->ItemValue->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->SalTax->Required) { ?>
				elm = this.getElements("x" + infix + "_SalTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->SalTax->caption(), $view_pharmacytransfer_add->SalTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->SalTax->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->PurRate->Required) { ?>
				elm = this.getElements("x" + infix + "_PurRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->PurRate->caption(), $view_pharmacytransfer_add->PurRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->PurRate->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->SalRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SalRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->SalRate->caption(), $view_pharmacytransfer_add->SalRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->SalRate->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->Discount->caption(), $view_pharmacytransfer_add->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->Discount->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->SSGST->caption(), $view_pharmacytransfer_add->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->SSGST->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->SCGST->caption(), $view_pharmacytransfer_add->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->SCGST->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->Pack->Required) { ?>
				elm = this.getElements("x" + infix + "_Pack");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->Pack->caption(), $view_pharmacytransfer_add->Pack->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->GrnMRP->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnMRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->GrnMRP->caption(), $view_pharmacytransfer_add->GrnMRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnMRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->GrnMRP->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->trid->Required) { ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->trid->caption(), $view_pharmacytransfer_add->trid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->trid->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->HospID->caption(), $view_pharmacytransfer_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->CreatedBy->caption(), $view_pharmacytransfer_add->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->CreatedBy->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->CreatedDateTime->caption(), $view_pharmacytransfer_add->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->CreatedDateTime->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->ModifiedBy->caption(), $view_pharmacytransfer_add->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->ModifiedBy->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->ModifiedDateTime->caption(), $view_pharmacytransfer_add->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->ModifiedDateTime->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->grncreatedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->grncreatedby->caption(), $view_pharmacytransfer_add->grncreatedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->grncreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->grncreatedDateTime->caption(), $view_pharmacytransfer_add->grncreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->grnModifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->grnModifiedby->caption(), $view_pharmacytransfer_add->grnModifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->grnModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->grnModifiedDateTime->caption(), $view_pharmacytransfer_add->grnModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->Received->Required) { ?>
				elm = this.getElements("x" + infix + "_Received");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->Received->caption(), $view_pharmacytransfer_add->Received->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_add->BillDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->BillDate->caption(), $view_pharmacytransfer_add->BillDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->BillDate->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_add->CurStock->Required) { ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_add->CurStock->caption(), $view_pharmacytransfer_add->CurStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_add->CurStock->errorMessage()) ?>");

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
	fview_pharmacytransferadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacytransferadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacytransferadd.lists["x_ORDNO"] = <?php echo $view_pharmacytransfer_add->ORDNO->Lookup->toClientList($view_pharmacytransfer_add) ?>;
	fview_pharmacytransferadd.lists["x_ORDNO"].options = <?php echo JsonEncode($view_pharmacytransfer_add->ORDNO->lookupOptions()) ?>;
	fview_pharmacytransferadd.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_pharmacytransferadd.lists["x_BRCODE"] = <?php echo $view_pharmacytransfer_add->BRCODE->Lookup->toClientList($view_pharmacytransfer_add) ?>;
	fview_pharmacytransferadd.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacytransfer_add->BRCODE->lookupOptions()) ?>;
	fview_pharmacytransferadd.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_pharmacytransferadd.lists["x_LastMonthSale"] = <?php echo $view_pharmacytransfer_add->LastMonthSale->Lookup->toClientList($view_pharmacytransfer_add) ?>;
	fview_pharmacytransferadd.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_pharmacytransfer_add->LastMonthSale->lookupOptions()) ?>;
	fview_pharmacytransferadd.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacytransferadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacytransfer_add->showPageHeader(); ?>
<?php
$view_pharmacytransfer_add->showMessage();
?>
<form name="fview_pharmacytransferadd" id="fview_pharmacytransferadd" class="<?php echo $view_pharmacytransfer_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacytransfer">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacytransfer_add->IsModal ?>">
<?php if ($view_pharmacytransfer->getCurrentMasterTable() == "pharmacy_billing_transfer") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_billing_transfer">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_pharmacytransfer_add->trid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($view_pharmacytransfer_add->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_view_pharmacytransfer_BRCODE" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->BRCODE->caption() ?><?php echo $view_pharmacytransfer_add->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BRCODE">
<?php
$onchange = $view_pharmacytransfer_add->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_add->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE">
	<input type="text" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?php echo RemoveHtml($view_pharmacytransfer_add->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_add->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacytransfer_add->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer_add->BRCODE->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransferadd"], function() {
	fview_pharmacytransferadd.createAutoSuggest({"id":"x_BRCODE","forceSelect":false});
});
</script>
<?php echo $view_pharmacytransfer_add->BRCODE->Lookup->getParamTag($view_pharmacytransfer_add, "p_x_BRCODE") ?>
</span>
<?php echo $view_pharmacytransfer_add->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_pharmacytransfer_PRC" for="x_PRC" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->PRC->caption() ?><?php echo $view_pharmacytransfer_add->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->PRC->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PRC">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->PRC->EditValue ?>"<?php echo $view_pharmacytransfer_add->PRC->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_view_pharmacytransfer_QTY" for="x_QTY" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->QTY->caption() ?><?php echo $view_pharmacytransfer_add->QTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->QTY->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_QTY">
<input type="text" data-table="view_pharmacytransfer" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->QTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->QTY->EditValue ?>"<?php echo $view_pharmacytransfer_add->QTY->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_pharmacytransfer_DT" for="x_DT" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->DT->caption() ?><?php echo $view_pharmacytransfer_add->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->DT->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_DT">
<input type="text" data-table="view_pharmacytransfer" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->DT->EditValue ?>"<?php echo $view_pharmacytransfer_add->DT->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_add->DT->ReadOnly && !$view_pharmacytransfer_add->DT->Disabled && !isset($view_pharmacytransfer_add->DT->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_add->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacytransfer_add->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_view_pharmacytransfer_PC" for="x_PC" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->PC->caption() ?><?php echo $view_pharmacytransfer_add->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->PC->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PC">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->PC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->PC->EditValue ?>"<?php echo $view_pharmacytransfer_add->PC->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_view_pharmacytransfer_YM" for="x_YM" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->YM->caption() ?><?php echo $view_pharmacytransfer_add->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->YM->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_YM">
<input type="text" data-table="view_pharmacytransfer" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->YM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->YM->EditValue ?>"<?php echo $view_pharmacytransfer_add->YM->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_view_pharmacytransfer_Stock" for="x_Stock" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->Stock->caption() ?><?php echo $view_pharmacytransfer_add->Stock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->Stock->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Stock">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->Stock->EditValue ?>"<?php echo $view_pharmacytransfer_add->Stock->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_view_pharmacytransfer_Printcheck" for="x_Printcheck" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->Printcheck->caption() ?><?php echo $view_pharmacytransfer_add->Printcheck->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->Printcheck->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Printcheck">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->Printcheck->EditValue ?>"<?php echo $view_pharmacytransfer_add->Printcheck->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label id="elh_view_pharmacytransfer_grnid" for="x_grnid" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->grnid->caption() ?><?php echo $view_pharmacytransfer_add->grnid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->grnid->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grnid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->grnid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->grnid->EditValue ?>"<?php echo $view_pharmacytransfer_add->grnid->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->grnid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_view_pharmacytransfer_poid" for="x_poid" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->poid->caption() ?><?php echo $view_pharmacytransfer_add->poid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->poid->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_poid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->poid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->poid->EditValue ?>"<?php echo $view_pharmacytransfer_add->poid->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_view_pharmacytransfer_LastMonthSale" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->LastMonthSale->caption() ?><?php echo $view_pharmacytransfer_add->LastMonthSale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->LastMonthSale->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_LastMonthSale">
<?php
$onchange = $view_pharmacytransfer_add->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_add->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x_LastMonthSale">
	<input type="text" class="form-control" name="sv_x_LastMonthSale" id="sv_x_LastMonthSale" value="<?php echo RemoveHtml($view_pharmacytransfer_add->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_add->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_pharmacytransfer_add->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x_LastMonthSale" id="x_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer_add->LastMonthSale->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransferadd"], function() {
	fview_pharmacytransferadd.createAutoSuggest({"id":"x_LastMonthSale","forceSelect":true});
});
</script>
<?php echo $view_pharmacytransfer_add->LastMonthSale->Lookup->getParamTag($view_pharmacytransfer_add, "p_x_LastMonthSale") ?>
</span>
<?php echo $view_pharmacytransfer_add->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_view_pharmacytransfer_PrName" for="x_PrName" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->PrName->caption() ?><?php echo $view_pharmacytransfer_add->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->PrName->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PrName">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->PrName->EditValue ?>"<?php echo $view_pharmacytransfer_add->PrName->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_view_pharmacytransfer_GrnQuantity" for="x_GrnQuantity" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->GrnQuantity->caption() ?><?php echo $view_pharmacytransfer_add->GrnQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->GrnQuantity->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_GrnQuantity">
<input type="text" data-table="view_pharmacytransfer" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->GrnQuantity->EditValue ?>"<?php echo $view_pharmacytransfer_add->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_pharmacytransfer_Quantity" for="x_Quantity" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->Quantity->caption() ?><?php echo $view_pharmacytransfer_add->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Quantity">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->Quantity->EditValue ?>"<?php echo $view_pharmacytransfer_add->Quantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label id="elh_view_pharmacytransfer_FreeQty" for="x_FreeQty" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->FreeQty->caption() ?><?php echo $view_pharmacytransfer_add->FreeQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->FreeQty->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_FreeQty">
<input type="text" data-table="view_pharmacytransfer" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->FreeQty->EditValue ?>"<?php echo $view_pharmacytransfer_add->FreeQty->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->FreeQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_view_pharmacytransfer_BatchNo" for="x_BatchNo" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->BatchNo->caption() ?><?php echo $view_pharmacytransfer_add->BatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->BatchNo->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BatchNo">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->BatchNo->EditValue ?>"<?php echo $view_pharmacytransfer_add->BatchNo->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label id="elh_view_pharmacytransfer_ExpDate" for="x_ExpDate" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->ExpDate->caption() ?><?php echo $view_pharmacytransfer_add->ExpDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->ExpDate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ExpDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x_ExpDate" id="x_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->ExpDate->EditValue ?>"<?php echo $view_pharmacytransfer_add->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_add->ExpDate->ReadOnly && !$view_pharmacytransfer_add->ExpDate->Disabled && !isset($view_pharmacytransfer_add->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_add->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferadd", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacytransfer_add->ExpDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_view_pharmacytransfer_HSN" for="x_HSN" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->HSN->caption() ?><?php echo $view_pharmacytransfer_add->HSN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->HSN->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_HSN">
<input type="text" data-table="view_pharmacytransfer" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->HSN->EditValue ?>"<?php echo $view_pharmacytransfer_add->HSN->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_view_pharmacytransfer_MFRCODE" for="x_MFRCODE" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->MFRCODE->caption() ?><?php echo $view_pharmacytransfer_add->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_MFRCODE">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->MFRCODE->EditValue ?>"<?php echo $view_pharmacytransfer_add->MFRCODE->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_view_pharmacytransfer_PUnit" for="x_PUnit" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->PUnit->caption() ?><?php echo $view_pharmacytransfer_add->PUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->PUnit->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PUnit">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->PUnit->EditValue ?>"<?php echo $view_pharmacytransfer_add->PUnit->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_view_pharmacytransfer_SUnit" for="x_SUnit" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->SUnit->caption() ?><?php echo $view_pharmacytransfer_add->SUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->SUnit->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SUnit">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->SUnit->EditValue ?>"<?php echo $view_pharmacytransfer_add->SUnit->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_view_pharmacytransfer_MRP" for="x_MRP" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->MRP->caption() ?><?php echo $view_pharmacytransfer_add->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->MRP->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_MRP">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MRP" name="x_MRP" id="x_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->MRP->EditValue ?>"<?php echo $view_pharmacytransfer_add->MRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_view_pharmacytransfer_PurValue" for="x_PurValue" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->PurValue->caption() ?><?php echo $view_pharmacytransfer_add->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->PurValue->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PurValue">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->PurValue->EditValue ?>"<?php echo $view_pharmacytransfer_add->PurValue->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label id="elh_view_pharmacytransfer_Disc" for="x_Disc" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->Disc->caption() ?><?php echo $view_pharmacytransfer_add->Disc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->Disc->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Disc">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Disc" name="x_Disc" id="x_Disc" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->Disc->EditValue ?>"<?php echo $view_pharmacytransfer_add->Disc->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->Disc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_view_pharmacytransfer_PSGST" for="x_PSGST" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->PSGST->caption() ?><?php echo $view_pharmacytransfer_add->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->PSGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PSGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->PSGST->EditValue ?>"<?php echo $view_pharmacytransfer_add->PSGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_view_pharmacytransfer_PCGST" for="x_PCGST" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->PCGST->caption() ?><?php echo $view_pharmacytransfer_add->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->PCGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PCGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->PCGST->EditValue ?>"<?php echo $view_pharmacytransfer_add->PCGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label id="elh_view_pharmacytransfer_PTax" for="x_PTax" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->PTax->caption() ?><?php echo $view_pharmacytransfer_add->PTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->PTax->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PTax">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PTax" name="x_PTax" id="x_PTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->PTax->EditValue ?>"<?php echo $view_pharmacytransfer_add->PTax->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->PTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label id="elh_view_pharmacytransfer_ItemValue" for="x_ItemValue" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->ItemValue->caption() ?><?php echo $view_pharmacytransfer_add->ItemValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->ItemValue->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ItemValue">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->ItemValue->EditValue ?>"<?php echo $view_pharmacytransfer_add->ItemValue->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->ItemValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label id="elh_view_pharmacytransfer_SalTax" for="x_SalTax" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->SalTax->caption() ?><?php echo $view_pharmacytransfer_add->SalTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->SalTax->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SalTax">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->SalTax->EditValue ?>"<?php echo $view_pharmacytransfer_add->SalTax->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->SalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_view_pharmacytransfer_PurRate" for="x_PurRate" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->PurRate->caption() ?><?php echo $view_pharmacytransfer_add->PurRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->PurRate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PurRate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->PurRate->EditValue ?>"<?php echo $view_pharmacytransfer_add->PurRate->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label id="elh_view_pharmacytransfer_SalRate" for="x_SalRate" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->SalRate->caption() ?><?php echo $view_pharmacytransfer_add->SalRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->SalRate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SalRate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->SalRate->EditValue ?>"<?php echo $view_pharmacytransfer_add->SalRate->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->SalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_view_pharmacytransfer_Discount" for="x_Discount" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->Discount->caption() ?><?php echo $view_pharmacytransfer_add->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->Discount->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Discount">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->Discount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->Discount->EditValue ?>"<?php echo $view_pharmacytransfer_add->Discount->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_view_pharmacytransfer_SSGST" for="x_SSGST" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->SSGST->caption() ?><?php echo $view_pharmacytransfer_add->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->SSGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SSGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->SSGST->EditValue ?>"<?php echo $view_pharmacytransfer_add->SSGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_view_pharmacytransfer_SCGST" for="x_SCGST" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->SCGST->caption() ?><?php echo $view_pharmacytransfer_add->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->SCGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SCGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->SCGST->EditValue ?>"<?php echo $view_pharmacytransfer_add->SCGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_view_pharmacytransfer_Pack" for="x_Pack" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->Pack->caption() ?><?php echo $view_pharmacytransfer_add->Pack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->Pack->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Pack">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->Pack->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->Pack->EditValue ?>"<?php echo $view_pharmacytransfer_add->Pack->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_view_pharmacytransfer_GrnMRP" for="x_GrnMRP" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->GrnMRP->caption() ?><?php echo $view_pharmacytransfer_add->GrnMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->GrnMRP->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_GrnMRP">
<input type="text" data-table="view_pharmacytransfer" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->GrnMRP->EditValue ?>"<?php echo $view_pharmacytransfer_add->GrnMRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_view_pharmacytransfer_trid" for="x_trid" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->trid->caption() ?><?php echo $view_pharmacytransfer_add->trid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->trid->cellAttributes() ?>>
<?php if ($view_pharmacytransfer_add->trid->getSessionValue() != "") { ?>
<span id="el_view_pharmacytransfer_trid">
<span<?php echo $view_pharmacytransfer_add->trid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacytransfer_add->trid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_trid" name="x_trid" value="<?php echo HtmlEncode($view_pharmacytransfer_add->trid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_pharmacytransfer_trid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->trid->EditValue ?>"<?php echo $view_pharmacytransfer_add->trid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_pharmacytransfer_add->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_view_pharmacytransfer_CreatedBy" for="x_CreatedBy" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->CreatedBy->caption() ?><?php echo $view_pharmacytransfer_add->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->CreatedBy->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CreatedBy">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->CreatedBy->EditValue ?>"<?php echo $view_pharmacytransfer_add->CreatedBy->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label id="elh_view_pharmacytransfer_CreatedDateTime" for="x_CreatedDateTime" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->CreatedDateTime->caption() ?><?php echo $view_pharmacytransfer_add->CreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CreatedDateTime">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->CreatedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer_add->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_add->CreatedDateTime->ReadOnly && !$view_pharmacytransfer_add->CreatedDateTime->Disabled && !isset($view_pharmacytransfer_add->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_add->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferadd", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacytransfer_add->CreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_view_pharmacytransfer_ModifiedBy" for="x_ModifiedBy" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->ModifiedBy->caption() ?><?php echo $view_pharmacytransfer_add->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->ModifiedBy->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ModifiedBy">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->ModifiedBy->EditValue ?>"<?php echo $view_pharmacytransfer_add->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_view_pharmacytransfer_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->ModifiedDateTime->caption() ?><?php echo $view_pharmacytransfer_add->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ModifiedDateTime">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->ModifiedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer_add->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_add->ModifiedDateTime->ReadOnly && !$view_pharmacytransfer_add->ModifiedDateTime->Disabled && !isset($view_pharmacytransfer_add->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_add->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferadd", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacytransfer_add->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_view_pharmacytransfer_Received" for="x_Received" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->Received->caption() ?><?php echo $view_pharmacytransfer_add->Received->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->Received->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Received">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->Received->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->Received->EditValue ?>"<?php echo $view_pharmacytransfer_add->Received->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_view_pharmacytransfer_BillDate" for="x_BillDate" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->BillDate->caption() ?><?php echo $view_pharmacytransfer_add->BillDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->BillDate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BillDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->BillDate->EditValue ?>"<?php echo $view_pharmacytransfer_add->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_add->BillDate->ReadOnly && !$view_pharmacytransfer_add->BillDate->Disabled && !isset($view_pharmacytransfer_add->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_add->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferadd", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacytransfer_add->BillDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_add->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label id="elh_view_pharmacytransfer_CurStock" for="x_CurStock" class="<?php echo $view_pharmacytransfer_add->LeftColumnClass ?>"><?php echo $view_pharmacytransfer_add->CurStock->caption() ?><?php echo $view_pharmacytransfer_add->CurStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacytransfer_add->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_add->CurStock->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CurStock">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_add->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_add->CurStock->EditValue ?>"<?php echo $view_pharmacytransfer_add->CurStock->editAttributes() ?>>
</span>
<?php echo $view_pharmacytransfer_add->CurStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacytransfer_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacytransfer_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacytransfer_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacytransfer_add->showPageFooter();
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
$view_pharmacytransfer_add->terminate();
?>