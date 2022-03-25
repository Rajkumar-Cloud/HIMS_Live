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
<?php include_once "header.php"; ?>
<script>
var fview_pharmacygrnedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_pharmacygrnedit = currentForm = new ew.Form("fview_pharmacygrnedit", "edit");

	// Validate form
	fview_pharmacygrnedit.validate = function() {
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
			<?php if ($view_pharmacygrn_edit->ORDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_ORDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->ORDNO->caption(), $view_pharmacygrn_edit->ORDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->PRC->caption(), $view_pharmacygrn_edit->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->QTY->Required) { ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->QTY->caption(), $view_pharmacygrn_edit->QTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->QTY->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->DT->caption(), $view_pharmacygrn_edit->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->DT->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->PC->caption(), $view_pharmacygrn_edit->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->YM->Required) { ?>
				elm = this.getElements("x" + infix + "_YM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->YM->caption(), $view_pharmacygrn_edit->YM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->Stock->Required) { ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->Stock->caption(), $view_pharmacygrn_edit->Stock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->Stock->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->LastMonthSale->Required) { ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->LastMonthSale->caption(), $view_pharmacygrn_edit->LastMonthSale->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->LastMonthSale->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->Printcheck->Required) { ?>
				elm = this.getElements("x" + infix + "_Printcheck");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->Printcheck->caption(), $view_pharmacygrn_edit->Printcheck->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->id->caption(), $view_pharmacygrn_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->poid->Required) { ?>
				elm = this.getElements("x" + infix + "_poid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->poid->caption(), $view_pharmacygrn_edit->poid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_poid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->poid->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->PrName->caption(), $view_pharmacygrn_edit->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->grnid->Required) { ?>
				elm = this.getElements("x" + infix + "_grnid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->grnid->caption(), $view_pharmacygrn_edit->grnid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_grnid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->grnid->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->GrnQuantity->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->GrnQuantity->caption(), $view_pharmacygrn_edit->GrnQuantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->GrnQuantity->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->Quantity->caption(), $view_pharmacygrn_edit->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->Quantity->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->FreeQty->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->FreeQty->caption(), $view_pharmacygrn_edit->FreeQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeQty");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->FreeQty->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->BatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->BatchNo->caption(), $view_pharmacygrn_edit->BatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->ExpDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->ExpDate->caption(), $view_pharmacygrn_edit->ExpDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->ExpDate->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->HSN->Required) { ?>
				elm = this.getElements("x" + infix + "_HSN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->HSN->caption(), $view_pharmacygrn_edit->HSN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->MFRCODE->caption(), $view_pharmacygrn_edit->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->PUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->PUnit->caption(), $view_pharmacygrn_edit->PUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->PUnit->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->SUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->SUnit->caption(), $view_pharmacygrn_edit->SUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->SUnit->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->Pack->Required) { ?>
				elm = this.getElements("x" + infix + "_Pack");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->Pack->caption(), $view_pharmacygrn_edit->Pack->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->GrnMRP->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnMRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->GrnMRP->caption(), $view_pharmacygrn_edit->GrnMRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnMRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->GrnMRP->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->MRP->caption(), $view_pharmacygrn_edit->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->MRP->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->PurValue->Required) { ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->PurValue->caption(), $view_pharmacygrn_edit->PurValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->PurValue->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->Disc->Required) { ?>
				elm = this.getElements("x" + infix + "_Disc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->Disc->caption(), $view_pharmacygrn_edit->Disc->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Disc");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->Disc->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->PSGST->caption(), $view_pharmacygrn_edit->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->PCGST->caption(), $view_pharmacygrn_edit->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->PTax->Required) { ?>
				elm = this.getElements("x" + infix + "_PTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->PTax->caption(), $view_pharmacygrn_edit->PTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->PTax->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->ItemValue->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->ItemValue->caption(), $view_pharmacygrn_edit->ItemValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->ItemValue->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->SalTax->Required) { ?>
				elm = this.getElements("x" + infix + "_SalTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->SalTax->caption(), $view_pharmacygrn_edit->SalTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->SalTax->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->PurRate->Required) { ?>
				elm = this.getElements("x" + infix + "_PurRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->PurRate->caption(), $view_pharmacygrn_edit->PurRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->PurRate->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->SalRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SalRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->SalRate->caption(), $view_pharmacygrn_edit->SalRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->SalRate->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->Discount->caption(), $view_pharmacygrn_edit->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->Discount->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->SSGST->caption(), $view_pharmacygrn_edit->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->SCGST->caption(), $view_pharmacygrn_edit->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->BRCODE->caption(), $view_pharmacygrn_edit->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->trid->Required) { ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->trid->caption(), $view_pharmacygrn_edit->trid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->trid->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->HospID->caption(), $view_pharmacygrn_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->CreatedBy->caption(), $view_pharmacygrn_edit->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->CreatedBy->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->CreatedDateTime->caption(), $view_pharmacygrn_edit->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->CreatedDateTime->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->ModifiedBy->caption(), $view_pharmacygrn_edit->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->ModifiedBy->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->ModifiedDateTime->caption(), $view_pharmacygrn_edit->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->ModifiedDateTime->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_edit->grncreatedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->grncreatedby->caption(), $view_pharmacygrn_edit->grncreatedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->grncreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->grncreatedDateTime->caption(), $view_pharmacygrn_edit->grncreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->grnModifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->grnModifiedby->caption(), $view_pharmacygrn_edit->grnModifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->grnModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->grnModifiedDateTime->caption(), $view_pharmacygrn_edit->grnModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->Received->Required) { ?>
				elm = this.getElements("x" + infix + "_Received");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->Received->caption(), $view_pharmacygrn_edit->Received->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_edit->BillDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_edit->BillDate->caption(), $view_pharmacygrn_edit->BillDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_edit->BillDate->errorMessage()) ?>");

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
	fview_pharmacygrnedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacygrnedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacygrnedit.lists["x_PrName"] = <?php echo $view_pharmacygrn_edit->PrName->Lookup->toClientList($view_pharmacygrn_edit) ?>;
	fview_pharmacygrnedit.lists["x_PrName"].options = <?php echo JsonEncode($view_pharmacygrn_edit->PrName->lookupOptions()) ?>;
	fview_pharmacygrnedit.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacygrnedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacygrn_edit->showPageHeader(); ?>
<?php
$view_pharmacygrn_edit->showMessage();
?>
<form name="fview_pharmacygrnedit" id="fview_pharmacygrnedit" class="<?php echo $view_pharmacygrn_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacygrn">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacygrn_edit->IsModal ?>">
<?php if ($view_pharmacygrn->getCurrentMasterTable() == "pharmacy_grn") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_grn">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_pharmacygrn_edit->grnid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_pharmacygrn_edit->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_view_pharmacygrn_ORDNO" for="x_ORDNO" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->ORDNO->caption() ?><?php echo $view_pharmacygrn_edit->ORDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->ORDNO->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ORDNO">
<input type="text" data-table="view_pharmacygrn" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->ORDNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->ORDNO->EditValue ?>"<?php echo $view_pharmacygrn_edit->ORDNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_pharmacygrn_PRC" for="x_PRC" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->PRC->caption() ?><?php echo $view_pharmacygrn_edit->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->PRC->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PRC">
<input type="text" data-table="view_pharmacygrn" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->PRC->EditValue ?>"<?php echo $view_pharmacygrn_edit->PRC->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label id="elh_view_pharmacygrn_QTY" for="x_QTY" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->QTY->caption() ?><?php echo $view_pharmacygrn_edit->QTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->QTY->cellAttributes() ?>>
<span id="el_view_pharmacygrn_QTY">
<input type="text" data-table="view_pharmacygrn" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->QTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->QTY->EditValue ?>"<?php echo $view_pharmacygrn_edit->QTY->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->QTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_pharmacygrn_DT" for="x_DT" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->DT->caption() ?><?php echo $view_pharmacygrn_edit->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->DT->cellAttributes() ?>>
<span id="el_view_pharmacygrn_DT">
<input type="text" data-table="view_pharmacygrn" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->DT->EditValue ?>"<?php echo $view_pharmacygrn_edit->DT->editAttributes() ?>>
<?php if (!$view_pharmacygrn_edit->DT->ReadOnly && !$view_pharmacygrn_edit->DT->Disabled && !isset($view_pharmacygrn_edit->DT->EditAttrs["readonly"]) && !isset($view_pharmacygrn_edit->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrnedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn_edit->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_view_pharmacygrn_PC" for="x_PC" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->PC->caption() ?><?php echo $view_pharmacygrn_edit->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->PC->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PC">
<input type="text" data-table="view_pharmacygrn" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->PC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->PC->EditValue ?>"<?php echo $view_pharmacygrn_edit->PC->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_view_pharmacygrn_YM" for="x_YM" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->YM->caption() ?><?php echo $view_pharmacygrn_edit->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->YM->cellAttributes() ?>>
<span id="el_view_pharmacygrn_YM">
<input type="text" data-table="view_pharmacygrn" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->YM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->YM->EditValue ?>"<?php echo $view_pharmacygrn_edit->YM->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label id="elh_view_pharmacygrn_Stock" for="x_Stock" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->Stock->caption() ?><?php echo $view_pharmacygrn_edit->Stock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->Stock->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Stock">
<input type="text" data-table="view_pharmacygrn" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->Stock->EditValue ?>"<?php echo $view_pharmacygrn_edit->Stock->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->Stock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label id="elh_view_pharmacygrn_LastMonthSale" for="x_LastMonthSale" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->LastMonthSale->caption() ?><?php echo $view_pharmacygrn_edit->LastMonthSale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->LastMonthSale->cellAttributes() ?>>
<span id="el_view_pharmacygrn_LastMonthSale">
<input type="text" data-table="view_pharmacygrn" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->LastMonthSale->EditValue ?>"<?php echo $view_pharmacygrn_edit->LastMonthSale->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->LastMonthSale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label id="elh_view_pharmacygrn_Printcheck" for="x_Printcheck" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->Printcheck->caption() ?><?php echo $view_pharmacygrn_edit->Printcheck->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->Printcheck->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Printcheck">
<input type="text" data-table="view_pharmacygrn" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->Printcheck->EditValue ?>"<?php echo $view_pharmacygrn_edit->Printcheck->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->Printcheck->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_pharmacygrn_id" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->id->caption() ?><?php echo $view_pharmacygrn_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->id->cellAttributes() ?>>
<span id="el_view_pharmacygrn_id">
<span<?php echo $view_pharmacygrn_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_pharmacygrn_edit->id->CurrentValue) ?>">
<?php echo $view_pharmacygrn_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label id="elh_view_pharmacygrn_poid" for="x_poid" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->poid->caption() ?><?php echo $view_pharmacygrn_edit->poid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->poid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_poid">
<input type="text" data-table="view_pharmacygrn" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->poid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->poid->EditValue ?>"<?php echo $view_pharmacygrn_edit->poid->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->poid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_view_pharmacygrn_PrName" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->PrName->caption() ?><?php echo $view_pharmacygrn_edit->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->PrName->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PrName">
<?php
$onchange = $view_pharmacygrn_edit->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacygrn_edit->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($view_pharmacygrn_edit->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->PrName->getPlaceHolder()) ?>"<?php echo $view_pharmacygrn_edit->PrName->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pharmacy_storemast") && !$view_pharmacygrn_edit->PrName->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_pharmacygrn_edit->PrName->caption() ?>" data-title="<?php echo $view_pharmacygrn_edit->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PrName',url:'pharmacy_storemastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" data-value-separator="<?php echo $view_pharmacygrn_edit->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_edit->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacygrnedit"], function() {
	fview_pharmacygrnedit.createAutoSuggest({"id":"x_PrName","forceSelect":true});
});
</script>
<?php echo $view_pharmacygrn_edit->PrName->Lookup->getParamTag($view_pharmacygrn_edit, "p_x_PrName") ?>
</span>
<?php echo $view_pharmacygrn_edit->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label id="elh_view_pharmacygrn_grnid" for="x_grnid" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->grnid->caption() ?><?php echo $view_pharmacygrn_edit->grnid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->grnid->cellAttributes() ?>>
<?php if ($view_pharmacygrn_edit->grnid->getSessionValue() != "") { ?>
<span id="el_view_pharmacygrn_grnid">
<span<?php echo $view_pharmacygrn_edit->grnid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_edit->grnid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_grnid" name="x_grnid" value="<?php echo HtmlEncode($view_pharmacygrn_edit->grnid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_pharmacygrn_grnid">
<input type="text" data-table="view_pharmacygrn" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->grnid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->grnid->EditValue ?>"<?php echo $view_pharmacygrn_edit->grnid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_pharmacygrn_edit->grnid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label id="elh_view_pharmacygrn_GrnQuantity" for="x_GrnQuantity" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->GrnQuantity->caption() ?><?php echo $view_pharmacygrn_edit->GrnQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->GrnQuantity->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GrnQuantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->GrnQuantity->EditValue ?>"<?php echo $view_pharmacygrn_edit->GrnQuantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->GrnQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_pharmacygrn_Quantity" for="x_Quantity" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->Quantity->caption() ?><?php echo $view_pharmacygrn_edit->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Quantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->Quantity->EditValue ?>"<?php echo $view_pharmacygrn_edit->Quantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label id="elh_view_pharmacygrn_FreeQty" for="x_FreeQty" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->FreeQty->caption() ?><?php echo $view_pharmacygrn_edit->FreeQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->FreeQty->cellAttributes() ?>>
<span id="el_view_pharmacygrn_FreeQty">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->FreeQty->EditValue ?>"<?php echo $view_pharmacygrn_edit->FreeQty->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->FreeQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_view_pharmacygrn_BatchNo" for="x_BatchNo" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->BatchNo->caption() ?><?php echo $view_pharmacygrn_edit->BatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->BatchNo->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BatchNo">
<input type="text" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->BatchNo->EditValue ?>"<?php echo $view_pharmacygrn_edit->BatchNo->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label id="elh_view_pharmacygrn_ExpDate" for="x_ExpDate" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->ExpDate->caption() ?><?php echo $view_pharmacygrn_edit->ExpDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->ExpDate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ExpDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->ExpDate->EditValue ?>"<?php echo $view_pharmacygrn_edit->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn_edit->ExpDate->ReadOnly && !$view_pharmacygrn_edit->ExpDate->Disabled && !isset($view_pharmacygrn_edit->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn_edit->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrnedit", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn_edit->ExpDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label id="elh_view_pharmacygrn_HSN" for="x_HSN" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->HSN->caption() ?><?php echo $view_pharmacygrn_edit->HSN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->HSN->cellAttributes() ?>>
<span id="el_view_pharmacygrn_HSN">
<input type="text" data-table="view_pharmacygrn" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->HSN->EditValue ?>"<?php echo $view_pharmacygrn_edit->HSN->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->HSN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_view_pharmacygrn_MFRCODE" for="x_MFRCODE" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->MFRCODE->caption() ?><?php echo $view_pharmacygrn_edit->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacygrn_MFRCODE">
<input type="text" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->MFRCODE->EditValue ?>"<?php echo $view_pharmacygrn_edit->MFRCODE->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_view_pharmacygrn_PUnit" for="x_PUnit" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->PUnit->caption() ?><?php echo $view_pharmacygrn_edit->PUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->PUnit->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->PUnit->EditValue ?>"<?php echo $view_pharmacygrn_edit->PUnit->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_view_pharmacygrn_SUnit" for="x_SUnit" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->SUnit->caption() ?><?php echo $view_pharmacygrn_edit->SUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->SUnit->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->SUnit->EditValue ?>"<?php echo $view_pharmacygrn_edit->SUnit->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label id="elh_view_pharmacygrn_Pack" for="x_Pack" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->Pack->caption() ?><?php echo $view_pharmacygrn_edit->Pack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->Pack->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Pack">
<input type="text" data-table="view_pharmacygrn" data-field="x_Pack" name="x_Pack" id="x_Pack" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->Pack->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->Pack->EditValue ?>"<?php echo $view_pharmacygrn_edit->Pack->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->Pack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label id="elh_view_pharmacygrn_GrnMRP" for="x_GrnMRP" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->GrnMRP->caption() ?><?php echo $view_pharmacygrn_edit->GrnMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->GrnMRP->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GrnMRP">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->GrnMRP->EditValue ?>"<?php echo $view_pharmacygrn_edit->GrnMRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->GrnMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_view_pharmacygrn_MRP" for="x_MRP" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->MRP->caption() ?><?php echo $view_pharmacygrn_edit->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->MRP->cellAttributes() ?>>
<span id="el_view_pharmacygrn_MRP">
<input type="text" data-table="view_pharmacygrn" data-field="x_MRP" name="x_MRP" id="x_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->MRP->EditValue ?>"<?php echo $view_pharmacygrn_edit->MRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_view_pharmacygrn_PurValue" for="x_PurValue" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->PurValue->caption() ?><?php echo $view_pharmacygrn_edit->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->PurValue->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PurValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->PurValue->EditValue ?>"<?php echo $view_pharmacygrn_edit->PurValue->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label id="elh_view_pharmacygrn_Disc" for="x_Disc" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->Disc->caption() ?><?php echo $view_pharmacygrn_edit->Disc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->Disc->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Disc">
<input type="text" data-table="view_pharmacygrn" data-field="x_Disc" name="x_Disc" id="x_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->Disc->EditValue ?>"<?php echo $view_pharmacygrn_edit->Disc->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->Disc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_view_pharmacygrn_PSGST" for="x_PSGST" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->PSGST->caption() ?><?php echo $view_pharmacygrn_edit->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->PSGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->PSGST->EditValue ?>"<?php echo $view_pharmacygrn_edit->PSGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_view_pharmacygrn_PCGST" for="x_PCGST" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->PCGST->caption() ?><?php echo $view_pharmacygrn_edit->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->PCGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->PCGST->EditValue ?>"<?php echo $view_pharmacygrn_edit->PCGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label id="elh_view_pharmacygrn_PTax" for="x_PTax" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->PTax->caption() ?><?php echo $view_pharmacygrn_edit->PTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->PTax->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_PTax" name="x_PTax" id="x_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->PTax->EditValue ?>"<?php echo $view_pharmacygrn_edit->PTax->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->PTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label id="elh_view_pharmacygrn_ItemValue" for="x_ItemValue" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->ItemValue->caption() ?><?php echo $view_pharmacygrn_edit->ItemValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->ItemValue->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ItemValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->ItemValue->EditValue ?>"<?php echo $view_pharmacygrn_edit->ItemValue->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->ItemValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label id="elh_view_pharmacygrn_SalTax" for="x_SalTax" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->SalTax->caption() ?><?php echo $view_pharmacygrn_edit->SalTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->SalTax->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SalTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->SalTax->EditValue ?>"<?php echo $view_pharmacygrn_edit->SalTax->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->SalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_view_pharmacygrn_PurRate" for="x_PurRate" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->PurRate->caption() ?><?php echo $view_pharmacygrn_edit->PurRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->PurRate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PurRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->PurRate->EditValue ?>"<?php echo $view_pharmacygrn_edit->PurRate->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label id="elh_view_pharmacygrn_SalRate" for="x_SalRate" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->SalRate->caption() ?><?php echo $view_pharmacygrn_edit->SalRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->SalRate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SalRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->SalRate->EditValue ?>"<?php echo $view_pharmacygrn_edit->SalRate->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->SalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_view_pharmacygrn_Discount" for="x_Discount" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->Discount->caption() ?><?php echo $view_pharmacygrn_edit->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->Discount->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Discount">
<input type="text" data-table="view_pharmacygrn" data-field="x_Discount" name="x_Discount" id="x_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->Discount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->Discount->EditValue ?>"<?php echo $view_pharmacygrn_edit->Discount->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_view_pharmacygrn_SSGST" for="x_SSGST" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->SSGST->caption() ?><?php echo $view_pharmacygrn_edit->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->SSGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->SSGST->EditValue ?>"<?php echo $view_pharmacygrn_edit->SSGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_view_pharmacygrn_SCGST" for="x_SCGST" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->SCGST->caption() ?><?php echo $view_pharmacygrn_edit->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->SCGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->SCGST->EditValue ?>"<?php echo $view_pharmacygrn_edit->SCGST->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label id="elh_view_pharmacygrn_trid" for="x_trid" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->trid->caption() ?><?php echo $view_pharmacygrn_edit->trid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->trid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_trid">
<input type="text" data-table="view_pharmacygrn" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->trid->EditValue ?>"<?php echo $view_pharmacygrn_edit->trid->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->trid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_view_pharmacygrn_CreatedBy" for="x_CreatedBy" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->CreatedBy->caption() ?><?php echo $view_pharmacygrn_edit->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->CreatedBy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_CreatedBy">
<input type="text" data-table="view_pharmacygrn" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->CreatedBy->EditValue ?>"<?php echo $view_pharmacygrn_edit->CreatedBy->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label id="elh_view_pharmacygrn_CreatedDateTime" for="x_CreatedDateTime" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->CreatedDateTime->caption() ?><?php echo $view_pharmacygrn_edit->CreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_CreatedDateTime">
<input type="text" data-table="view_pharmacygrn" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->CreatedDateTime->EditValue ?>"<?php echo $view_pharmacygrn_edit->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacygrn_edit->CreatedDateTime->ReadOnly && !$view_pharmacygrn_edit->CreatedDateTime->Disabled && !isset($view_pharmacygrn_edit->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacygrn_edit->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrnedit", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn_edit->CreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_view_pharmacygrn_ModifiedBy" for="x_ModifiedBy" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->ModifiedBy->caption() ?><?php echo $view_pharmacygrn_edit->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->ModifiedBy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ModifiedBy">
<input type="text" data-table="view_pharmacygrn" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->ModifiedBy->EditValue ?>"<?php echo $view_pharmacygrn_edit->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_view_pharmacygrn_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->ModifiedDateTime->caption() ?><?php echo $view_pharmacygrn_edit->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ModifiedDateTime">
<input type="text" data-table="view_pharmacygrn" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->ModifiedDateTime->EditValue ?>"<?php echo $view_pharmacygrn_edit->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacygrn_edit->ModifiedDateTime->ReadOnly && !$view_pharmacygrn_edit->ModifiedDateTime->Disabled && !isset($view_pharmacygrn_edit->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacygrn_edit->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrnedit", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn_edit->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label id="elh_view_pharmacygrn_Received" for="x_Received" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->Received->caption() ?><?php echo $view_pharmacygrn_edit->Received->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->Received->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Received">
<input type="text" data-table="view_pharmacygrn" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->Received->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->Received->EditValue ?>"<?php echo $view_pharmacygrn_edit->Received->editAttributes() ?>>
</span>
<?php echo $view_pharmacygrn_edit->Received->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacygrn_edit->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label id="elh_view_pharmacygrn_BillDate" for="x_BillDate" class="<?php echo $view_pharmacygrn_edit->LeftColumnClass ?>"><?php echo $view_pharmacygrn_edit->BillDate->caption() ?><?php echo $view_pharmacygrn_edit->BillDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacygrn_edit->RightColumnClass ?>"><div <?php echo $view_pharmacygrn_edit->BillDate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BillDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacygrn_edit->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_edit->BillDate->EditValue ?>"<?php echo $view_pharmacygrn_edit->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn_edit->BillDate->ReadOnly && !$view_pharmacygrn_edit->BillDate->Disabled && !isset($view_pharmacygrn_edit->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn_edit->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrnedit", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacygrn_edit->BillDate->CustomMsg ?></div></div>
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
$view_pharmacygrn_edit->terminate();
?>