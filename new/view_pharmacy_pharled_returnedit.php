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
$view_pharmacy_pharled_return_edit = new view_pharmacy_pharled_return_edit();

// Run the page
$view_pharmacy_pharled_return_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_pharled_return_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_pharmacy_pharled_returnedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_pharmacy_pharled_returnedit = currentForm = new ew.Form("fview_pharmacy_pharled_returnedit", "edit");

	// Validate form
	fview_pharmacy_pharled_returnedit.validate = function() {
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
			<?php if ($view_pharmacy_pharled_return_edit->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->BRCODE->caption(), $view_pharmacy_pharled_return_edit->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->TYPE->caption(), $view_pharmacy_pharled_return_edit->TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->DN->Required) { ?>
				elm = this.getElements("x" + infix + "_DN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DN->caption(), $view_pharmacy_pharled_return_edit->DN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->RDN->Required) { ?>
				elm = this.getElements("x" + infix + "_RDN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->RDN->caption(), $view_pharmacy_pharled_return_edit->RDN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DT->caption(), $view_pharmacy_pharled_return_edit->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->DT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PRC->caption(), $view_pharmacy_pharled_return_edit->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->OQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->OQ->caption(), $view_pharmacy_pharled_return_edit->OQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->OQ->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->SiNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->SiNo->caption(), $view_pharmacy_pharled_return_edit->SiNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->SiNo->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->RQ->Required) { ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->RQ->caption(), $view_pharmacy_pharled_return_edit->RQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->RQ->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->Product->Required) { ?>
				elm = this.getElements("x" + infix + "_Product");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->Product->caption(), $view_pharmacy_pharled_return_edit->Product->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->RT->caption(), $view_pharmacy_pharled_return_edit->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->RT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->MRQ->caption(), $view_pharmacy_pharled_return_edit->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->MRQ->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->IQ->caption(), $view_pharmacy_pharled_return_edit->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->IQ->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->DAMT->Required) { ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DAMT->caption(), $view_pharmacy_pharled_return_edit->DAMT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->DAMT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->BATCHNO->caption(), $view_pharmacy_pharled_return_edit->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->EXPDT->caption(), $view_pharmacy_pharled_return_edit->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->EXPDT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->Mfg->Required) { ?>
				elm = this.getElements("x" + infix + "_Mfg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->Mfg->caption(), $view_pharmacy_pharled_return_edit->Mfg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->BILLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->BILLNO->caption(), $view_pharmacy_pharled_return_edit->BILLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->BILLDT->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->BILLDT->caption(), $view_pharmacy_pharled_return_edit->BILLDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BILLDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->BILLDT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->VALUE->Required) { ?>
				elm = this.getElements("x" + infix + "_VALUE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->VALUE->caption(), $view_pharmacy_pharled_return_edit->VALUE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VALUE");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->VALUE->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->DISC->Required) { ?>
				elm = this.getElements("x" + infix + "_DISC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DISC->caption(), $view_pharmacy_pharled_return_edit->DISC->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DISC");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->DISC->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->TAXP->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->TAXP->caption(), $view_pharmacy_pharled_return_edit->TAXP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->TAXP->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->TAX->Required) { ?>
				elm = this.getElements("x" + infix + "_TAX");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->TAX->caption(), $view_pharmacy_pharled_return_edit->TAX->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAX");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->TAX->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->TAXR->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->TAXR->caption(), $view_pharmacy_pharled_return_edit->TAXR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAXR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->TAXR->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->EMPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_EMPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->EMPNO->caption(), $view_pharmacy_pharled_return_edit->EMPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PC->caption(), $view_pharmacy_pharled_return_edit->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->DRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_DRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DRNAME->caption(), $view_pharmacy_pharled_return_edit->DRNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->BTIME->Required) { ?>
				elm = this.getElements("x" + infix + "_BTIME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->BTIME->caption(), $view_pharmacy_pharled_return_edit->BTIME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->ONO->Required) { ?>
				elm = this.getElements("x" + infix + "_ONO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->ONO->caption(), $view_pharmacy_pharled_return_edit->ONO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->ODT->Required) { ?>
				elm = this.getElements("x" + infix + "_ODT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->ODT->caption(), $view_pharmacy_pharled_return_edit->ODT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ODT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->ODT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->PURRT->Required) { ?>
				elm = this.getElements("x" + infix + "_PURRT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PURRT->caption(), $view_pharmacy_pharled_return_edit->PURRT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PURRT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->PURRT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->GRP->Required) { ?>
				elm = this.getElements("x" + infix + "_GRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->GRP->caption(), $view_pharmacy_pharled_return_edit->GRP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->IBATCH->Required) { ?>
				elm = this.getElements("x" + infix + "_IBATCH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->IBATCH->caption(), $view_pharmacy_pharled_return_edit->IBATCH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->IPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_IPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->IPNO->caption(), $view_pharmacy_pharled_return_edit->IPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->OPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_OPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->OPNO->caption(), $view_pharmacy_pharled_return_edit->OPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->RECID->Required) { ?>
				elm = this.getElements("x" + infix + "_RECID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->RECID->caption(), $view_pharmacy_pharled_return_edit->RECID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->FQTY->Required) { ?>
				elm = this.getElements("x" + infix + "_FQTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->FQTY->caption(), $view_pharmacy_pharled_return_edit->FQTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FQTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->FQTY->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->UR->caption(), $view_pharmacy_pharled_return_edit->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->UR->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->DCID->Required) { ?>
				elm = this.getElements("x" + infix + "_DCID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DCID->caption(), $view_pharmacy_pharled_return_edit->DCID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->_USERID->Required) { ?>
				elm = this.getElements("x" + infix + "__USERID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->_USERID->caption(), $view_pharmacy_pharled_return_edit->_USERID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->MODDT->Required) { ?>
				elm = this.getElements("x" + infix + "_MODDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->MODDT->caption(), $view_pharmacy_pharled_return_edit->MODDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MODDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->MODDT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->FYM->Required) { ?>
				elm = this.getElements("x" + infix + "_FYM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->FYM->caption(), $view_pharmacy_pharled_return_edit->FYM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->PRCBATCH->Required) { ?>
				elm = this.getElements("x" + infix + "_PRCBATCH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PRCBATCH->caption(), $view_pharmacy_pharled_return_edit->PRCBATCH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->SLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_SLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->SLNO->caption(), $view_pharmacy_pharled_return_edit->SLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SLNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->SLNO->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->MRP->caption(), $view_pharmacy_pharled_return_edit->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->MRP->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->BILLYM->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLYM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->BILLYM->caption(), $view_pharmacy_pharled_return_edit->BILLYM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->BILLGRP->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLGRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->BILLGRP->caption(), $view_pharmacy_pharled_return_edit->BILLGRP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->STAFF->Required) { ?>
				elm = this.getElements("x" + infix + "_STAFF");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->STAFF->caption(), $view_pharmacy_pharled_return_edit->STAFF->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->TEMPIPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_TEMPIPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->TEMPIPNO->caption(), $view_pharmacy_pharled_return_edit->TEMPIPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->PRNTED->Required) { ?>
				elm = this.getElements("x" + infix + "_PRNTED");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PRNTED->caption(), $view_pharmacy_pharled_return_edit->PRNTED->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->PATNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_PATNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PATNAME->caption(), $view_pharmacy_pharled_return_edit->PATNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->PJVNO->Required) { ?>
				elm = this.getElements("x" + infix + "_PJVNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PJVNO->caption(), $view_pharmacy_pharled_return_edit->PJVNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->PJVSLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_PJVSLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PJVSLNO->caption(), $view_pharmacy_pharled_return_edit->PJVSLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->OTHDISC->Required) { ?>
				elm = this.getElements("x" + infix + "_OTHDISC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->OTHDISC->caption(), $view_pharmacy_pharled_return_edit->OTHDISC->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OTHDISC");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->OTHDISC->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->PJVYM->Required) { ?>
				elm = this.getElements("x" + infix + "_PJVYM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PJVYM->caption(), $view_pharmacy_pharled_return_edit->PJVYM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->PURDISCPER->Required) { ?>
				elm = this.getElements("x" + infix + "_PURDISCPER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PURDISCPER->caption(), $view_pharmacy_pharled_return_edit->PURDISCPER->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PURDISCPER");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->PURDISCPER->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->CASHIER->Required) { ?>
				elm = this.getElements("x" + infix + "_CASHIER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->CASHIER->caption(), $view_pharmacy_pharled_return_edit->CASHIER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->CASHTIME->Required) { ?>
				elm = this.getElements("x" + infix + "_CASHTIME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->CASHTIME->caption(), $view_pharmacy_pharled_return_edit->CASHTIME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->CASHRECD->Required) { ?>
				elm = this.getElements("x" + infix + "_CASHRECD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->CASHRECD->caption(), $view_pharmacy_pharled_return_edit->CASHRECD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CASHRECD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->CASHRECD->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->CASHREFNO->Required) { ?>
				elm = this.getElements("x" + infix + "_CASHREFNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->CASHREFNO->caption(), $view_pharmacy_pharled_return_edit->CASHREFNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->CASHIERSHIFT->Required) { ?>
				elm = this.getElements("x" + infix + "_CASHIERSHIFT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->CASHIERSHIFT->caption(), $view_pharmacy_pharled_return_edit->CASHIERSHIFT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->PRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_PRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PRCODE->caption(), $view_pharmacy_pharled_return_edit->PRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->RELEASEBY->Required) { ?>
				elm = this.getElements("x" + infix + "_RELEASEBY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->RELEASEBY->caption(), $view_pharmacy_pharled_return_edit->RELEASEBY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->CRAUTHOR->Required) { ?>
				elm = this.getElements("x" + infix + "_CRAUTHOR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->CRAUTHOR->caption(), $view_pharmacy_pharled_return_edit->CRAUTHOR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->PAYMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_PAYMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PAYMENT->caption(), $view_pharmacy_pharled_return_edit->PAYMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->DRID->Required) { ?>
				elm = this.getElements("x" + infix + "_DRID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DRID->caption(), $view_pharmacy_pharled_return_edit->DRID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->WARD->Required) { ?>
				elm = this.getElements("x" + infix + "_WARD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->WARD->caption(), $view_pharmacy_pharled_return_edit->WARD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->STAXTYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_STAXTYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->STAXTYPE->caption(), $view_pharmacy_pharled_return_edit->STAXTYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->PURDISCVAL->Required) { ?>
				elm = this.getElements("x" + infix + "_PURDISCVAL");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PURDISCVAL->caption(), $view_pharmacy_pharled_return_edit->PURDISCVAL->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PURDISCVAL");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->PURDISCVAL->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->RNDOFF->Required) { ?>
				elm = this.getElements("x" + infix + "_RNDOFF");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->RNDOFF->caption(), $view_pharmacy_pharled_return_edit->RNDOFF->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RNDOFF");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->RNDOFF->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->DISCONMRP->Required) { ?>
				elm = this.getElements("x" + infix + "_DISCONMRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DISCONMRP->caption(), $view_pharmacy_pharled_return_edit->DISCONMRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DISCONMRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->DISCONMRP->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->DELVDT->Required) { ?>
				elm = this.getElements("x" + infix + "_DELVDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DELVDT->caption(), $view_pharmacy_pharled_return_edit->DELVDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DELVDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->DELVDT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->DELVTIME->Required) { ?>
				elm = this.getElements("x" + infix + "_DELVTIME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DELVTIME->caption(), $view_pharmacy_pharled_return_edit->DELVTIME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->DELVBY->Required) { ?>
				elm = this.getElements("x" + infix + "_DELVBY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->DELVBY->caption(), $view_pharmacy_pharled_return_edit->DELVBY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->HOSPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_HOSPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->HOSPNO->caption(), $view_pharmacy_pharled_return_edit->HOSPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->id->caption(), $view_pharmacy_pharled_return_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->pbv->Required) { ?>
				elm = this.getElements("x" + infix + "_pbv");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->pbv->caption(), $view_pharmacy_pharled_return_edit->pbv->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pbv");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->pbv->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->pbt->Required) { ?>
				elm = this.getElements("x" + infix + "_pbt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->pbt->caption(), $view_pharmacy_pharled_return_edit->pbt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pbt");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->pbt->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->HosoID->Required) { ?>
				elm = this.getElements("x" + infix + "_HosoID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->HosoID->caption(), $view_pharmacy_pharled_return_edit->HosoID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->modifiedby->caption(), $view_pharmacy_pharled_return_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->modifieddatetime->caption(), $view_pharmacy_pharled_return_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->MFRCODE->caption(), $view_pharmacy_pharled_return_edit->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->Reception->caption(), $view_pharmacy_pharled_return_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->Reception->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->PatID->caption(), $view_pharmacy_pharled_return_edit->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_edit->PatID->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->mrnno->caption(), $view_pharmacy_pharled_return_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_edit->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_edit->BRNAME->caption(), $view_pharmacy_pharled_return_edit->BRNAME->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	fview_pharmacy_pharled_returnedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_pharled_returnedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_pharled_returnedit.lists["x_Product"] = <?php echo $view_pharmacy_pharled_return_edit->Product->Lookup->toClientList($view_pharmacy_pharled_return_edit) ?>;
	fview_pharmacy_pharled_returnedit.lists["x_Product"].options = <?php echo JsonEncode($view_pharmacy_pharled_return_edit->Product->lookupOptions()) ?>;
	fview_pharmacy_pharled_returnedit.autoSuggests["x_Product"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacy_pharled_returnedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacy_pharled_return_edit->showPageHeader(); ?>
<?php
$view_pharmacy_pharled_return_edit->showMessage();
?>
<form name="fview_pharmacy_pharled_returnedit" id="fview_pharmacy_pharled_returnedit" class="<?php echo $view_pharmacy_pharled_return_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_pharled_return_edit->IsModal ?>">
<?php if ($view_pharmacy_pharled_return->getCurrentMasterTable() == "pharmacy_billing_return") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_billing_return">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->pbt->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_pharmacy_pharled_return_edit->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_TYPE" for="x_TYPE" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->TYPE->caption() ?><?php echo $view_pharmacy_pharled_return_edit->TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->TYPE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TYPE">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_TYPE" name="x_TYPE" id="x_TYPE" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->TYPE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->TYPE->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->TYPE->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DN->Visible) { // DN ?>
	<div id="r_DN" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DN" for="x_DN" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DN->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DN->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DN">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DN" name="x_DN" id="x_DN" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DN->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DN->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->RDN->Visible) { // RDN ?>
	<div id="r_RDN" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RDN" for="x_RDN" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->RDN->caption() ?><?php echo $view_pharmacy_pharled_return_edit->RDN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->RDN->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RDN">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RDN" name="x_RDN" id="x_RDN" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->RDN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->RDN->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->RDN->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->RDN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DT" for="x_DT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_edit->DT->ReadOnly && !$view_pharmacy_pharled_return_edit->DT->Disabled && !isset($view_pharmacy_pharled_return_edit->DT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_edit->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returnedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PRC" for="x_PRC" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PRC->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PRC->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_OQ" for="x_OQ" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->OQ->caption() ?><?php echo $view_pharmacy_pharled_return_edit->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->OQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->OQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->OQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->OQ->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->SiNo->Visible) { // SiNo ?>
	<div id="r_SiNo" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_SiNo" for="x_SiNo" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->SiNo->caption() ?><?php echo $view_pharmacy_pharled_return_edit->SiNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->SiNo->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_SiNo">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x_SiNo" id="x_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->SiNo->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->SiNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RQ" for="x_RQ" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->RQ->caption() ?><?php echo $view_pharmacy_pharled_return_edit->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->RQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->RQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->RQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->RQ->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->Product->Visible) { // Product ?>
	<div id="r_Product" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_Product" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->Product->caption() ?><?php echo $view_pharmacy_pharled_return_edit->Product->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->Product->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Product">
<?php
$onchange = $view_pharmacy_pharled_return_edit->Product->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_pharled_return_edit->Product->EditAttrs["onchange"] = "";
?>
<span id="as_x_Product">
	<input type="text" class="form-control" name="sv_x_Product" id="sv_x_Product" value="<?php echo RemoveHtml($view_pharmacy_pharled_return_edit->Product->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->Product->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->Product->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return_edit->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-value-separator="<?php echo $view_pharmacy_pharled_return_edit->Product->displayValueSeparatorAttribute() ?>" name="x_Product" id="x_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->Product->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnedit"], function() {
	fview_pharmacy_pharled_returnedit.createAutoSuggest({"id":"x_Product","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_pharled_return_edit->Product->Lookup->getParamTag($view_pharmacy_pharled_return_edit, "p_x_Product") ?>
</span>
<?php echo $view_pharmacy_pharled_return_edit->Product->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RT" for="x_RT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->RT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->RT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x_RT" id="x_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->RT->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_MRQ" for="x_MRQ" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->MRQ->caption() ?><?php echo $view_pharmacy_pharled_return_edit->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->MRQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MRQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->MRQ->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_IQ" for="x_IQ" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->IQ->caption() ?><?php echo $view_pharmacy_pharled_return_edit->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->IQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x_IQ" id="x_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->IQ->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DAMT->Visible) { // DAMT ?>
	<div id="r_DAMT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DAMT" for="x_DAMT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DAMT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DAMT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DAMT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DAMT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x_DAMT" id="x_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DAMT->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DAMT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BATCHNO" for="x_BATCHNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->BATCHNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->BATCHNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BATCHNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->BATCHNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_EXPDT" for="x_EXPDT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->EXPDT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->EXPDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_EXPDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_edit->EXPDT->ReadOnly && !$view_pharmacy_pharled_return_edit->EXPDT->Disabled && !isset($view_pharmacy_pharled_return_edit->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_edit->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returnedit", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return_edit->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->Mfg->Visible) { // Mfg ?>
	<div id="r_Mfg" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_Mfg" for="x_Mfg" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->Mfg->caption() ?><?php echo $view_pharmacy_pharled_return_edit->Mfg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->Mfg->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Mfg">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x_Mfg" id="x_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->Mfg->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->Mfg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->BILLNO->Visible) { // BILLNO ?>
	<div id="r_BILLNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BILLNO" for="x_BILLNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->BILLNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->BILLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->BILLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->BILLNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->BILLNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->BILLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BILLDT" for="x_BILLDT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->BILLDT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->BILLDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->BILLDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->BILLDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->BILLDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_edit->BILLDT->ReadOnly && !$view_pharmacy_pharled_return_edit->BILLDT->Disabled && !isset($view_pharmacy_pharled_return_edit->BILLDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_edit->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returnedit", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return_edit->BILLDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->VALUE->Visible) { // VALUE ?>
	<div id="r_VALUE" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_VALUE" for="x_VALUE" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->VALUE->caption() ?><?php echo $view_pharmacy_pharled_return_edit->VALUE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->VALUE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_VALUE">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_VALUE" name="x_VALUE" id="x_VALUE" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->VALUE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->VALUE->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->VALUE->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->VALUE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DISC->Visible) { // DISC ?>
	<div id="r_DISC" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DISC" for="x_DISC" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DISC->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DISC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DISC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DISC" name="x_DISC" id="x_DISC" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DISC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DISC->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DISC->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_TAXP" for="x_TAXP" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->TAXP->caption() ?><?php echo $view_pharmacy_pharled_return_edit->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->TAXP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAXP">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->TAXP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->TAXP->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->TAXP->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->TAX->Visible) { // TAX ?>
	<div id="r_TAX" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_TAX" for="x_TAX" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->TAX->caption() ?><?php echo $view_pharmacy_pharled_return_edit->TAX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->TAX->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAX">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_TAX" name="x_TAX" id="x_TAX" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->TAX->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->TAX->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->TAX->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->TAX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->TAXR->Visible) { // TAXR ?>
	<div id="r_TAXR" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_TAXR" for="x_TAXR" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->TAXR->caption() ?><?php echo $view_pharmacy_pharled_return_edit->TAXR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->TAXR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAXR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_TAXR" name="x_TAXR" id="x_TAXR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->TAXR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->TAXR->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->TAXR->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->TAXR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->EMPNO->Visible) { // EMPNO ?>
	<div id="r_EMPNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_EMPNO" for="x_EMPNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->EMPNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->EMPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->EMPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_EMPNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EMPNO" name="x_EMPNO" id="x_EMPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->EMPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->EMPNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->EMPNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->EMPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PC" for="x_PC" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PC->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PC->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PC->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DRNAME->Visible) { // DRNAME ?>
	<div id="r_DRNAME" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DRNAME" for="x_DRNAME" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DRNAME->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DRNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DRNAME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DRNAME">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DRNAME" name="x_DRNAME" id="x_DRNAME" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DRNAME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DRNAME->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DRNAME->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DRNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->BTIME->Visible) { // BTIME ?>
	<div id="r_BTIME" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BTIME" for="x_BTIME" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->BTIME->caption() ?><?php echo $view_pharmacy_pharled_return_edit->BTIME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->BTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BTIME">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BTIME" name="x_BTIME" id="x_BTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->BTIME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->BTIME->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->BTIME->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->BTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->ONO->Visible) { // ONO ?>
	<div id="r_ONO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_ONO" for="x_ONO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->ONO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->ONO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->ONO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_ONO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_ONO" name="x_ONO" id="x_ONO" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->ONO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->ONO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->ONO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->ONO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->ODT->Visible) { // ODT ?>
	<div id="r_ODT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_ODT" for="x_ODT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->ODT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->ODT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->ODT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_ODT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_ODT" name="x_ODT" id="x_ODT" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->ODT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->ODT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->ODT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_edit->ODT->ReadOnly && !$view_pharmacy_pharled_return_edit->ODT->Disabled && !isset($view_pharmacy_pharled_return_edit->ODT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_edit->ODT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returnedit", "x_ODT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return_edit->ODT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PURRT->Visible) { // PURRT ?>
	<div id="r_PURRT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PURRT" for="x_PURRT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PURRT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PURRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PURRT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURRT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PURRT" name="x_PURRT" id="x_PURRT" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PURRT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PURRT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PURRT->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PURRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->GRP->Visible) { // GRP ?>
	<div id="r_GRP" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_GRP" for="x_GRP" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->GRP->caption() ?><?php echo $view_pharmacy_pharled_return_edit->GRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->GRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_GRP">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_GRP" name="x_GRP" id="x_GRP" size="30" maxlength="21" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->GRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->GRP->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->GRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->GRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->IBATCH->Visible) { // IBATCH ?>
	<div id="r_IBATCH" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_IBATCH" for="x_IBATCH" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->IBATCH->caption() ?><?php echo $view_pharmacy_pharled_return_edit->IBATCH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->IBATCH->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IBATCH">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IBATCH" name="x_IBATCH" id="x_IBATCH" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->IBATCH->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->IBATCH->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->IBATCH->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->IBATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->IPNO->Visible) { // IPNO ?>
	<div id="r_IPNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_IPNO" for="x_IPNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->IPNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->IPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->IPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IPNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->IPNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->IPNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->IPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->OPNO->Visible) { // OPNO ?>
	<div id="r_OPNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_OPNO" for="x_OPNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->OPNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->OPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->OPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OPNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->OPNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->OPNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->OPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->RECID->Visible) { // RECID ?>
	<div id="r_RECID" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RECID" for="x_RECID" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->RECID->caption() ?><?php echo $view_pharmacy_pharled_return_edit->RECID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->RECID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RECID">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RECID" name="x_RECID" id="x_RECID" size="30" maxlength="18" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->RECID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->RECID->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->RECID->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->RECID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->FQTY->Visible) { // FQTY ?>
	<div id="r_FQTY" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_FQTY" for="x_FQTY" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->FQTY->caption() ?><?php echo $view_pharmacy_pharled_return_edit->FQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->FQTY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_FQTY">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_FQTY" name="x_FQTY" id="x_FQTY" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->FQTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->FQTY->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->FQTY->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->FQTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_UR" for="x_UR" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->UR->caption() ?><?php echo $view_pharmacy_pharled_return_edit->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->UR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_UR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->UR->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DCID->Visible) { // DCID ?>
	<div id="r_DCID" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DCID" for="x_DCID" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DCID->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DCID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DCID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DCID">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DCID" name="x_DCID" id="x_DCID" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DCID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DCID->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DCID->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DCID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->MODDT->Visible) { // MODDT ?>
	<div id="r_MODDT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_MODDT" for="x_MODDT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->MODDT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->MODDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->MODDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MODDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MODDT" name="x_MODDT" id="x_MODDT" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->MODDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->MODDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->MODDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_edit->MODDT->ReadOnly && !$view_pharmacy_pharled_return_edit->MODDT->Disabled && !isset($view_pharmacy_pharled_return_edit->MODDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_edit->MODDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returnedit", "x_MODDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return_edit->MODDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->FYM->Visible) { // FYM ?>
	<div id="r_FYM" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_FYM" for="x_FYM" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->FYM->caption() ?><?php echo $view_pharmacy_pharled_return_edit->FYM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->FYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_FYM">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_FYM" name="x_FYM" id="x_FYM" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->FYM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->FYM->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->FYM->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->FYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PRCBATCH->Visible) { // PRCBATCH ?>
	<div id="r_PRCBATCH" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PRCBATCH" for="x_PRCBATCH" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PRCBATCH->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PRCBATCH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PRCBATCH->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRCBATCH">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRCBATCH" name="x_PRCBATCH" id="x_PRCBATCH" size="30" maxlength="23" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PRCBATCH->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PRCBATCH->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PRCBATCH->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PRCBATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->SLNO->Visible) { // SLNO ?>
	<div id="r_SLNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_SLNO" for="x_SLNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->SLNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->SLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->SLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_SLNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" name="x_SLNO" id="x_SLNO" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->SLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->SLNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->SLNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->SLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_MRP" for="x_MRP" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->MRP->caption() ?><?php echo $view_pharmacy_pharled_return_edit->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->MRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MRP">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->MRP->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->MRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->BILLYM->Visible) { // BILLYM ?>
	<div id="r_BILLYM" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BILLYM" for="x_BILLYM" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->BILLYM->caption() ?><?php echo $view_pharmacy_pharled_return_edit->BILLYM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->BILLYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLYM">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BILLYM" name="x_BILLYM" id="x_BILLYM" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->BILLYM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->BILLYM->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->BILLYM->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->BILLYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->BILLGRP->Visible) { // BILLGRP ?>
	<div id="r_BILLGRP" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BILLGRP" for="x_BILLGRP" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->BILLGRP->caption() ?><?php echo $view_pharmacy_pharled_return_edit->BILLGRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->BILLGRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLGRP">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BILLGRP" name="x_BILLGRP" id="x_BILLGRP" size="30" maxlength="21" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->BILLGRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->BILLGRP->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->BILLGRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->BILLGRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->STAFF->Visible) { // STAFF ?>
	<div id="r_STAFF" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_STAFF" for="x_STAFF" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->STAFF->caption() ?><?php echo $view_pharmacy_pharled_return_edit->STAFF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->STAFF->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_STAFF">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_STAFF" name="x_STAFF" id="x_STAFF" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->STAFF->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->STAFF->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->STAFF->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->STAFF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<div id="r_TEMPIPNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_TEMPIPNO" for="x_TEMPIPNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->TEMPIPNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->TEMPIPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->TEMPIPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TEMPIPNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_TEMPIPNO" name="x_TEMPIPNO" id="x_TEMPIPNO" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->TEMPIPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->TEMPIPNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->TEMPIPNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->TEMPIPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PRNTED->Visible) { // PRNTED ?>
	<div id="r_PRNTED" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PRNTED" for="x_PRNTED" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PRNTED->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PRNTED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PRNTED->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRNTED">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRNTED" name="x_PRNTED" id="x_PRNTED" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PRNTED->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PRNTED->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PRNTED->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PRNTED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PATNAME->Visible) { // PATNAME ?>
	<div id="r_PATNAME" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PATNAME" for="x_PATNAME" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PATNAME->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PATNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PATNAME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PATNAME">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PATNAME" name="x_PATNAME" id="x_PATNAME" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PATNAME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PATNAME->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PATNAME->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PATNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PJVNO->Visible) { // PJVNO ?>
	<div id="r_PJVNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PJVNO" for="x_PJVNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PJVNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PJVNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PJVNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PJVNO" name="x_PJVNO" id="x_PJVNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PJVNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PJVNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PJVNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PJVNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PJVSLNO->Visible) { // PJVSLNO ?>
	<div id="r_PJVSLNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PJVSLNO" for="x_PJVSLNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PJVSLNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PJVSLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PJVSLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVSLNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PJVSLNO" name="x_PJVSLNO" id="x_PJVSLNO" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PJVSLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PJVSLNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PJVSLNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PJVSLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->OTHDISC->Visible) { // OTHDISC ?>
	<div id="r_OTHDISC" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_OTHDISC" for="x_OTHDISC" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->OTHDISC->caption() ?><?php echo $view_pharmacy_pharled_return_edit->OTHDISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->OTHDISC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OTHDISC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_OTHDISC" name="x_OTHDISC" id="x_OTHDISC" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->OTHDISC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->OTHDISC->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->OTHDISC->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->OTHDISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PJVYM->Visible) { // PJVYM ?>
	<div id="r_PJVYM" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PJVYM" for="x_PJVYM" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PJVYM->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PJVYM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PJVYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVYM">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PJVYM" name="x_PJVYM" id="x_PJVYM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PJVYM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PJVYM->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PJVYM->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PJVYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PURDISCPER->Visible) { // PURDISCPER ?>
	<div id="r_PURDISCPER" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PURDISCPER" for="x_PURDISCPER" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PURDISCPER->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PURDISCPER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PURDISCPER->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURDISCPER">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PURDISCPER" name="x_PURDISCPER" id="x_PURDISCPER" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PURDISCPER->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PURDISCPER->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PURDISCPER->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PURDISCPER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->CASHIER->Visible) { // CASHIER ?>
	<div id="r_CASHIER" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CASHIER" for="x_CASHIER" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->CASHIER->caption() ?><?php echo $view_pharmacy_pharled_return_edit->CASHIER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->CASHIER->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHIER">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CASHIER" name="x_CASHIER" id="x_CASHIER" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->CASHIER->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->CASHIER->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->CASHIER->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->CASHIER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->CASHTIME->Visible) { // CASHTIME ?>
	<div id="r_CASHTIME" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CASHTIME" for="x_CASHTIME" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->CASHTIME->caption() ?><?php echo $view_pharmacy_pharled_return_edit->CASHTIME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->CASHTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHTIME">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CASHTIME" name="x_CASHTIME" id="x_CASHTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->CASHTIME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->CASHTIME->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->CASHTIME->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->CASHTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->CASHRECD->Visible) { // CASHRECD ?>
	<div id="r_CASHRECD" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CASHRECD" for="x_CASHRECD" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->CASHRECD->caption() ?><?php echo $view_pharmacy_pharled_return_edit->CASHRECD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->CASHRECD->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHRECD">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CASHRECD" name="x_CASHRECD" id="x_CASHRECD" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->CASHRECD->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->CASHRECD->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->CASHRECD->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->CASHRECD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->CASHREFNO->Visible) { // CASHREFNO ?>
	<div id="r_CASHREFNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CASHREFNO" for="x_CASHREFNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->CASHREFNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->CASHREFNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->CASHREFNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHREFNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CASHREFNO" name="x_CASHREFNO" id="x_CASHREFNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->CASHREFNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->CASHREFNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->CASHREFNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->CASHREFNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<div id="r_CASHIERSHIFT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CASHIERSHIFT" for="x_CASHIERSHIFT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->CASHIERSHIFT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->CASHIERSHIFT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHIERSHIFT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CASHIERSHIFT" name="x_CASHIERSHIFT" id="x_CASHIERSHIFT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->CASHIERSHIFT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->CASHIERSHIFT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->CASHIERSHIFT->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->CASHIERSHIFT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PRCODE" for="x_PRCODE" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PRCODE->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRCODE">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PRCODE->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PRCODE->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->RELEASEBY->Visible) { // RELEASEBY ?>
	<div id="r_RELEASEBY" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RELEASEBY" for="x_RELEASEBY" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->RELEASEBY->caption() ?><?php echo $view_pharmacy_pharled_return_edit->RELEASEBY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->RELEASEBY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RELEASEBY">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RELEASEBY" name="x_RELEASEBY" id="x_RELEASEBY" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->RELEASEBY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->RELEASEBY->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->RELEASEBY->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->RELEASEBY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<div id="r_CRAUTHOR" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CRAUTHOR" for="x_CRAUTHOR" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->CRAUTHOR->caption() ?><?php echo $view_pharmacy_pharled_return_edit->CRAUTHOR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->CRAUTHOR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CRAUTHOR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CRAUTHOR" name="x_CRAUTHOR" id="x_CRAUTHOR" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->CRAUTHOR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->CRAUTHOR->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->CRAUTHOR->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->CRAUTHOR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PAYMENT->Visible) { // PAYMENT ?>
	<div id="r_PAYMENT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PAYMENT" for="x_PAYMENT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PAYMENT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PAYMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PAYMENT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PAYMENT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PAYMENT" name="x_PAYMENT" id="x_PAYMENT" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PAYMENT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PAYMENT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PAYMENT->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PAYMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DRID" for="x_DRID" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DRID->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DRID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DRID">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DRID" name="x_DRID" id="x_DRID" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DRID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DRID->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DRID->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DRID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->WARD->Visible) { // WARD ?>
	<div id="r_WARD" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_WARD" for="x_WARD" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->WARD->caption() ?><?php echo $view_pharmacy_pharled_return_edit->WARD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->WARD->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_WARD">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_WARD" name="x_WARD" id="x_WARD" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->WARD->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->WARD->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->WARD->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->WARD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->STAXTYPE->Visible) { // STAXTYPE ?>
	<div id="r_STAXTYPE" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_STAXTYPE" for="x_STAXTYPE" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->STAXTYPE->caption() ?><?php echo $view_pharmacy_pharled_return_edit->STAXTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->STAXTYPE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_STAXTYPE">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_STAXTYPE" name="x_STAXTYPE" id="x_STAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->STAXTYPE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->STAXTYPE->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->STAXTYPE->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->STAXTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<div id="r_PURDISCVAL" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PURDISCVAL" for="x_PURDISCVAL" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PURDISCVAL->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PURDISCVAL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PURDISCVAL->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURDISCVAL">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PURDISCVAL" name="x_PURDISCVAL" id="x_PURDISCVAL" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PURDISCVAL->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PURDISCVAL->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PURDISCVAL->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PURDISCVAL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->RNDOFF->Visible) { // RNDOFF ?>
	<div id="r_RNDOFF" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RNDOFF" for="x_RNDOFF" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->RNDOFF->caption() ?><?php echo $view_pharmacy_pharled_return_edit->RNDOFF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->RNDOFF->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RNDOFF">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RNDOFF" name="x_RNDOFF" id="x_RNDOFF" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->RNDOFF->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->RNDOFF->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->RNDOFF->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->RNDOFF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DISCONMRP->Visible) { // DISCONMRP ?>
	<div id="r_DISCONMRP" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DISCONMRP" for="x_DISCONMRP" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DISCONMRP->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DISCONMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DISCONMRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DISCONMRP">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DISCONMRP" name="x_DISCONMRP" id="x_DISCONMRP" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DISCONMRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DISCONMRP->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DISCONMRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DISCONMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DELVDT->Visible) { // DELVDT ?>
	<div id="r_DELVDT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DELVDT" for="x_DELVDT" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DELVDT->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DELVDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DELVDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DELVDT" name="x_DELVDT" id="x_DELVDT" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DELVDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DELVDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DELVDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_edit->DELVDT->ReadOnly && !$view_pharmacy_pharled_return_edit->DELVDT->Disabled && !isset($view_pharmacy_pharled_return_edit->DELVDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_edit->DELVDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returnedit", "x_DELVDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DELVDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DELVTIME->Visible) { // DELVTIME ?>
	<div id="r_DELVTIME" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DELVTIME" for="x_DELVTIME" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DELVTIME->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DELVTIME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DELVTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVTIME">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DELVTIME" name="x_DELVTIME" id="x_DELVTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DELVTIME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DELVTIME->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DELVTIME->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DELVTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->DELVBY->Visible) { // DELVBY ?>
	<div id="r_DELVBY" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DELVBY" for="x_DELVBY" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->DELVBY->caption() ?><?php echo $view_pharmacy_pharled_return_edit->DELVBY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->DELVBY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVBY">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DELVBY" name="x_DELVBY" id="x_DELVBY" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->DELVBY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->DELVBY->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->DELVBY->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->DELVBY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->HOSPNO->Visible) { // HOSPNO ?>
	<div id="r_HOSPNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_HOSPNO" for="x_HOSPNO" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->HOSPNO->caption() ?><?php echo $view_pharmacy_pharled_return_edit->HOSPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->HOSPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_HOSPNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_HOSPNO" name="x_HOSPNO" id="x_HOSPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->HOSPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->HOSPNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->HOSPNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->HOSPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_id" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->id->caption() ?><?php echo $view_pharmacy_pharled_return_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->id->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->id->CurrentValue) ?>">
<?php echo $view_pharmacy_pharled_return_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->pbv->Visible) { // pbv ?>
	<div id="r_pbv" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_pbv" for="x_pbv" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->pbv->caption() ?><?php echo $view_pharmacy_pharled_return_edit->pbv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->pbv->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_pbv">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_pbv" name="x_pbv" id="x_pbv" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->pbv->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->pbv->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->pbv->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->pbv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->pbt->Visible) { // pbt ?>
	<div id="r_pbt" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_pbt" for="x_pbt" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->pbt->caption() ?><?php echo $view_pharmacy_pharled_return_edit->pbt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->pbt->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return_edit->pbt->getSessionValue() != "") { ?>
<span id="el_view_pharmacy_pharled_return_pbt">
<span<?php echo $view_pharmacy_pharled_return_edit->pbt->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_edit->pbt->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_pbt" name="x_pbt" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->pbt->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_pharmacy_pharled_return_pbt">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_pbt" name="x_pbt" id="x_pbt" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->pbt->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->pbt->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->pbt->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_pharmacy_pharled_return_edit->pbt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_MFRCODE" for="x_MFRCODE" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->MFRCODE->caption() ?><?php echo $view_pharmacy_pharled_return_edit->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MFRCODE">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->MFRCODE->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_Reception" for="x_Reception" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->Reception->caption() ?><?php echo $view_pharmacy_pharled_return_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->Reception->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Reception">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->Reception->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->Reception->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->Reception->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PatID" for="x_PatID" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->PatID->caption() ?><?php echo $view_pharmacy_pharled_return_edit->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->PatID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PatID">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->PatID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->PatID->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->PatID->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_mrnno" for="x_mrnno" class="<?php echo $view_pharmacy_pharled_return_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return_edit->mrnno->caption() ?><?php echo $view_pharmacy_pharled_return_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_pharled_return_edit->mrnno->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_mrnno">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_edit->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_edit->mrnno->EditValue ?>"<?php echo $view_pharmacy_pharled_return_edit->mrnno->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacy_pharled_return_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacy_pharled_return_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacy_pharled_return_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacy_pharled_return_edit->showPageFooter();
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
$view_pharmacy_pharled_return_edit->terminate();
?>