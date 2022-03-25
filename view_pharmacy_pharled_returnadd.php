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
$view_pharmacy_pharled_return_add = new view_pharmacy_pharled_return_add();

// Run the page
$view_pharmacy_pharled_return_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_pharled_return_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fview_pharmacy_pharled_returnadd = currentForm = new ew.Form("fview_pharmacy_pharled_returnadd", "add");

// Validate form
fview_pharmacy_pharled_returnadd.validate = function() {
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
		<?php if ($view_pharmacy_pharled_return_add->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BRCODE->caption(), $view_pharmacy_pharled_return->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->TYPE->caption(), $view_pharmacy_pharled_return->TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->DN->Required) { ?>
			elm = this.getElements("x" + infix + "_DN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DN->caption(), $view_pharmacy_pharled_return->DN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->RDN->Required) { ?>
			elm = this.getElements("x" + infix + "_RDN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->RDN->caption(), $view_pharmacy_pharled_return->RDN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DT->caption(), $view_pharmacy_pharled_return->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->DT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PRC->caption(), $view_pharmacy_pharled_return->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->OQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->OQ->caption(), $view_pharmacy_pharled_return->OQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->OQ->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->SiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->SiNo->caption(), $view_pharmacy_pharled_return->SiNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->SiNo->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->RQ->Required) { ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->RQ->caption(), $view_pharmacy_pharled_return->RQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->RQ->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->Product->Required) { ?>
			elm = this.getElements("x" + infix + "_Product");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->Product->caption(), $view_pharmacy_pharled_return->Product->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->SLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->SLNO->caption(), $view_pharmacy_pharled_return->SLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->SLNO->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->RT->caption(), $view_pharmacy_pharled_return->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->RT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->MRQ->caption(), $view_pharmacy_pharled_return->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->MRQ->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->IQ->caption(), $view_pharmacy_pharled_return->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->IQ->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->DAMT->Required) { ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DAMT->caption(), $view_pharmacy_pharled_return->DAMT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->DAMT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BATCHNO->caption(), $view_pharmacy_pharled_return->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->EXPDT->caption(), $view_pharmacy_pharled_return->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->EXPDT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->Mfg->Required) { ?>
			elm = this.getElements("x" + infix + "_Mfg");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->Mfg->caption(), $view_pharmacy_pharled_return->Mfg->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->BILLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BILLNO->caption(), $view_pharmacy_pharled_return->BILLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->BILLDT->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BILLDT->caption(), $view_pharmacy_pharled_return->BILLDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->BILLDT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->VALUE->Required) { ?>
			elm = this.getElements("x" + infix + "_VALUE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->VALUE->caption(), $view_pharmacy_pharled_return->VALUE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_VALUE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->VALUE->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->DISC->Required) { ?>
			elm = this.getElements("x" + infix + "_DISC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DISC->caption(), $view_pharmacy_pharled_return->DISC->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DISC");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->DISC->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->TAXP->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->TAXP->caption(), $view_pharmacy_pharled_return->TAXP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->TAXP->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->TAX->Required) { ?>
			elm = this.getElements("x" + infix + "_TAX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->TAX->caption(), $view_pharmacy_pharled_return->TAX->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAX");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->TAX->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->TAXR->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->TAXR->caption(), $view_pharmacy_pharled_return->TAXR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->TAXR->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->EMPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_EMPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->EMPNO->caption(), $view_pharmacy_pharled_return->EMPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PC->caption(), $view_pharmacy_pharled_return->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->DRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_DRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DRNAME->caption(), $view_pharmacy_pharled_return->DRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->BTIME->Required) { ?>
			elm = this.getElements("x" + infix + "_BTIME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BTIME->caption(), $view_pharmacy_pharled_return->BTIME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->ONO->Required) { ?>
			elm = this.getElements("x" + infix + "_ONO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->ONO->caption(), $view_pharmacy_pharled_return->ONO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->ODT->Required) { ?>
			elm = this.getElements("x" + infix + "_ODT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->ODT->caption(), $view_pharmacy_pharled_return->ODT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ODT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->ODT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->PURRT->Required) { ?>
			elm = this.getElements("x" + infix + "_PURRT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PURRT->caption(), $view_pharmacy_pharled_return->PURRT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PURRT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->PURRT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->GRP->Required) { ?>
			elm = this.getElements("x" + infix + "_GRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->GRP->caption(), $view_pharmacy_pharled_return->GRP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->IBATCH->Required) { ?>
			elm = this.getElements("x" + infix + "_IBATCH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->IBATCH->caption(), $view_pharmacy_pharled_return->IBATCH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->IPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_IPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->IPNO->caption(), $view_pharmacy_pharled_return->IPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->OPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_OPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->OPNO->caption(), $view_pharmacy_pharled_return->OPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->RECID->Required) { ?>
			elm = this.getElements("x" + infix + "_RECID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->RECID->caption(), $view_pharmacy_pharled_return->RECID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->FQTY->Required) { ?>
			elm = this.getElements("x" + infix + "_FQTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->FQTY->caption(), $view_pharmacy_pharled_return->FQTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FQTY");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->FQTY->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->UR->caption(), $view_pharmacy_pharled_return->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->UR->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->DCID->Required) { ?>
			elm = this.getElements("x" + infix + "_DCID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DCID->caption(), $view_pharmacy_pharled_return->DCID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->_USERID->Required) { ?>
			elm = this.getElements("x" + infix + "__USERID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->_USERID->caption(), $view_pharmacy_pharled_return->_USERID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->MODDT->Required) { ?>
			elm = this.getElements("x" + infix + "_MODDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->MODDT->caption(), $view_pharmacy_pharled_return->MODDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MODDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->MODDT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->FYM->Required) { ?>
			elm = this.getElements("x" + infix + "_FYM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->FYM->caption(), $view_pharmacy_pharled_return->FYM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->PRCBATCH->Required) { ?>
			elm = this.getElements("x" + infix + "_PRCBATCH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PRCBATCH->caption(), $view_pharmacy_pharled_return->PRCBATCH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->MRP->caption(), $view_pharmacy_pharled_return->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->MRP->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->BILLYM->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLYM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BILLYM->caption(), $view_pharmacy_pharled_return->BILLYM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->BILLGRP->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLGRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BILLGRP->caption(), $view_pharmacy_pharled_return->BILLGRP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->STAFF->Required) { ?>
			elm = this.getElements("x" + infix + "_STAFF");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->STAFF->caption(), $view_pharmacy_pharled_return->STAFF->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->TEMPIPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_TEMPIPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->TEMPIPNO->caption(), $view_pharmacy_pharled_return->TEMPIPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->PRNTED->Required) { ?>
			elm = this.getElements("x" + infix + "_PRNTED");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PRNTED->caption(), $view_pharmacy_pharled_return->PRNTED->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->PATNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_PATNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PATNAME->caption(), $view_pharmacy_pharled_return->PATNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->PJVNO->Required) { ?>
			elm = this.getElements("x" + infix + "_PJVNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PJVNO->caption(), $view_pharmacy_pharled_return->PJVNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->PJVSLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_PJVSLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PJVSLNO->caption(), $view_pharmacy_pharled_return->PJVSLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->OTHDISC->Required) { ?>
			elm = this.getElements("x" + infix + "_OTHDISC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->OTHDISC->caption(), $view_pharmacy_pharled_return->OTHDISC->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OTHDISC");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->OTHDISC->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->PJVYM->Required) { ?>
			elm = this.getElements("x" + infix + "_PJVYM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PJVYM->caption(), $view_pharmacy_pharled_return->PJVYM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->PURDISCPER->Required) { ?>
			elm = this.getElements("x" + infix + "_PURDISCPER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PURDISCPER->caption(), $view_pharmacy_pharled_return->PURDISCPER->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PURDISCPER");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->PURDISCPER->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->CASHIER->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHIER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->CASHIER->caption(), $view_pharmacy_pharled_return->CASHIER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->CASHTIME->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHTIME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->CASHTIME->caption(), $view_pharmacy_pharled_return->CASHTIME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->CASHRECD->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHRECD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->CASHRECD->caption(), $view_pharmacy_pharled_return->CASHRECD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CASHRECD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->CASHRECD->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->CASHREFNO->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHREFNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->CASHREFNO->caption(), $view_pharmacy_pharled_return->CASHREFNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->CASHIERSHIFT->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHIERSHIFT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->CASHIERSHIFT->caption(), $view_pharmacy_pharled_return->CASHIERSHIFT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->PRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_PRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PRCODE->caption(), $view_pharmacy_pharled_return->PRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->RELEASEBY->Required) { ?>
			elm = this.getElements("x" + infix + "_RELEASEBY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->RELEASEBY->caption(), $view_pharmacy_pharled_return->RELEASEBY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->CRAUTHOR->Required) { ?>
			elm = this.getElements("x" + infix + "_CRAUTHOR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->CRAUTHOR->caption(), $view_pharmacy_pharled_return->CRAUTHOR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->PAYMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_PAYMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PAYMENT->caption(), $view_pharmacy_pharled_return->PAYMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->DRID->Required) { ?>
			elm = this.getElements("x" + infix + "_DRID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DRID->caption(), $view_pharmacy_pharled_return->DRID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->WARD->Required) { ?>
			elm = this.getElements("x" + infix + "_WARD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->WARD->caption(), $view_pharmacy_pharled_return->WARD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->STAXTYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_STAXTYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->STAXTYPE->caption(), $view_pharmacy_pharled_return->STAXTYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->PURDISCVAL->Required) { ?>
			elm = this.getElements("x" + infix + "_PURDISCVAL");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PURDISCVAL->caption(), $view_pharmacy_pharled_return->PURDISCVAL->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PURDISCVAL");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->PURDISCVAL->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->RNDOFF->Required) { ?>
			elm = this.getElements("x" + infix + "_RNDOFF");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->RNDOFF->caption(), $view_pharmacy_pharled_return->RNDOFF->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RNDOFF");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->RNDOFF->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->DISCONMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_DISCONMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DISCONMRP->caption(), $view_pharmacy_pharled_return->DISCONMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DISCONMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->DISCONMRP->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->DELVDT->Required) { ?>
			elm = this.getElements("x" + infix + "_DELVDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DELVDT->caption(), $view_pharmacy_pharled_return->DELVDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DELVDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->DELVDT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->DELVTIME->Required) { ?>
			elm = this.getElements("x" + infix + "_DELVTIME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DELVTIME->caption(), $view_pharmacy_pharled_return->DELVTIME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->DELVBY->Required) { ?>
			elm = this.getElements("x" + infix + "_DELVBY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DELVBY->caption(), $view_pharmacy_pharled_return->DELVBY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->HOSPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_HOSPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->HOSPNO->caption(), $view_pharmacy_pharled_return->HOSPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->pbv->Required) { ?>
			elm = this.getElements("x" + infix + "_pbv");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->pbv->caption(), $view_pharmacy_pharled_return->pbv->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pbv");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->pbv->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->pbt->Required) { ?>
			elm = this.getElements("x" + infix + "_pbt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->pbt->caption(), $view_pharmacy_pharled_return->pbt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pbt");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->pbt->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->HosoID->Required) { ?>
			elm = this.getElements("x" + infix + "_HosoID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->HosoID->caption(), $view_pharmacy_pharled_return->HosoID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->createdby->caption(), $view_pharmacy_pharled_return->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->createddatetime->caption(), $view_pharmacy_pharled_return->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->MFRCODE->caption(), $view_pharmacy_pharled_return->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->Reception->caption(), $view_pharmacy_pharled_return->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->Reception->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PatID->caption(), $view_pharmacy_pharled_return->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->PatID->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->mrnno->caption(), $view_pharmacy_pharled_return->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BRNAME->caption(), $view_pharmacy_pharled_return->BRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_add->sretid->Required) { ?>
			elm = this.getElements("x" + infix + "_sretid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->sretid->caption(), $view_pharmacy_pharled_return->sretid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sretid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->sretid->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_add->sprid->Required) { ?>
			elm = this.getElements("x" + infix + "_sprid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->sprid->caption(), $view_pharmacy_pharled_return->sprid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sprid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->sprid->errorMessage()) ?>");

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
fview_pharmacy_pharled_returnadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_pharled_returnadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_pharled_returnadd.lists["x_SLNO"] = <?php echo $view_pharmacy_pharled_return_add->SLNO->Lookup->toClientList() ?>;
fview_pharmacy_pharled_returnadd.lists["x_SLNO"].options = <?php echo JsonEncode($view_pharmacy_pharled_return_add->SLNO->lookupOptions()) ?>;
fview_pharmacy_pharled_returnadd.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacy_pharled_return_add->showPageHeader(); ?>
<?php
$view_pharmacy_pharled_return_add->showMessage();
?>
<form name="fview_pharmacy_pharled_returnadd" id="fview_pharmacy_pharled_returnadd" class="<?php echo $view_pharmacy_pharled_return_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_pharled_return_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_pharled_return_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_pharled_return_add->IsModal ?>">
<?php if ($view_pharmacy_pharled_return->getCurrentMasterTable() == "pharmacy_billing_return") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_billing_return">
<input type="hidden" name="fk_id" value="<?php echo $view_pharmacy_pharled_return->sretid->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($view_pharmacy_pharled_return->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_TYPE" for="x_TYPE" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->TYPE->caption() ?><?php echo ($view_pharmacy_pharled_return->TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->TYPE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TYPE">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_TYPE" name="x_TYPE" id="x_TYPE" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->TYPE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->TYPE->EditValue ?>"<?php echo $view_pharmacy_pharled_return->TYPE->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DN->Visible) { // DN ?>
	<div id="r_DN" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DN" for="x_DN" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DN->caption() ?><?php echo ($view_pharmacy_pharled_return->DN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DN->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DN">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DN" name="x_DN" id="x_DN" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DN->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DN->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->DN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RDN->Visible) { // RDN ?>
	<div id="r_RDN" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RDN" for="x_RDN" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->RDN->caption() ?><?php echo ($view_pharmacy_pharled_return->RDN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->RDN->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RDN">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RDN" name="x_RDN" id="x_RDN" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RDN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RDN->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RDN->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->RDN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DT" for="x_DT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DT->caption() ?><?php echo ($view_pharmacy_pharled_return->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->DT->ReadOnly && !$view_pharmacy_pharled_return->DT->Disabled && !isset($view_pharmacy_pharled_return->DT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returnadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PRC" for="x_PRC" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PRC->caption() ?><?php echo ($view_pharmacy_pharled_return->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PRC->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_OQ" for="x_OQ" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->OQ->caption() ?><?php echo ($view_pharmacy_pharled_return->OQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->OQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->OQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->OQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->OQ->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
	<div id="r_SiNo" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_SiNo" for="x_SiNo" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->SiNo->caption() ?><?php echo ($view_pharmacy_pharled_return->SiNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->SiNo->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_SiNo">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x_SiNo" id="x_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return->SiNo->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->SiNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RQ" for="x_RQ" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->RQ->caption() ?><?php echo ($view_pharmacy_pharled_return->RQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->RQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RQ->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
	<div id="r_Product" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_Product" for="x_Product" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->Product->caption() ?><?php echo ($view_pharmacy_pharled_return->Product->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->Product->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Product">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Product->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Product->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->Product->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
	<div id="r_SLNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_SLNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->SLNO->caption() ?><?php echo ($view_pharmacy_pharled_return->SLNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->SLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x_SLNO" class="text-nowrap" style="z-index: 8890">
	<input type="text" class="form-control" name="sv_x_SLNO" id="sv_x_SLNO" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-value-separator="<?php echo $view_pharmacy_pharled_return->SLNO->displayValueSeparatorAttribute() ?>" name="x_SLNO" id="x_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_pharled_returnadd.createAutoSuggest({"id":"x_SLNO","forceSelect":true});
</script>
<?php echo $view_pharmacy_pharled_return->SLNO->Lookup->getParamTag("p_x_SLNO") ?>
</span>
<?php echo $view_pharmacy_pharled_return->SLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RT" for="x_RT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->RT->caption() ?><?php echo ($view_pharmacy_pharled_return->RT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->RT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x_RT" id="x_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RT->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_MRQ" for="x_MRQ" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->MRQ->caption() ?><?php echo ($view_pharmacy_pharled_return->MRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->MRQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MRQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->MRQ->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_IQ" for="x_IQ" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->IQ->caption() ?><?php echo ($view_pharmacy_pharled_return->IQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->IQ->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x_IQ" id="x_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->IQ->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
	<div id="r_DAMT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DAMT" for="x_DAMT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DAMT->caption() ?><?php echo ($view_pharmacy_pharled_return->DAMT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DAMT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DAMT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x_DAMT" id="x_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DAMT->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->DAMT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BATCHNO" for="x_BATCHNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->BATCHNO->caption() ?><?php echo ($view_pharmacy_pharled_return->BATCHNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->BATCHNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BATCHNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BATCHNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_EXPDT" for="x_EXPDT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->EXPDT->caption() ?><?php echo ($view_pharmacy_pharled_return->EXPDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->EXPDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_EXPDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->EXPDT->ReadOnly && !$view_pharmacy_pharled_return->EXPDT->Disabled && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returnadd", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
	<div id="r_Mfg" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_Mfg" for="x_Mfg" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->Mfg->caption() ?><?php echo ($view_pharmacy_pharled_return->Mfg->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->Mfg->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Mfg">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x_Mfg" id="x_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Mfg->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->Mfg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BILLNO->Visible) { // BILLNO ?>
	<div id="r_BILLNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BILLNO" for="x_BILLNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->BILLNO->caption() ?><?php echo ($view_pharmacy_pharled_return->BILLNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->BILLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BILLNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BILLNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->BILLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BILLDT" for="x_BILLDT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->BILLDT->caption() ?><?php echo ($view_pharmacy_pharled_return->BILLDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->BILLDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BILLDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BILLDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->BILLDT->ReadOnly && !$view_pharmacy_pharled_return->BILLDT->Disabled && !isset($view_pharmacy_pharled_return->BILLDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returnadd", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return->BILLDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->VALUE->Visible) { // VALUE ?>
	<div id="r_VALUE" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_VALUE" for="x_VALUE" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->VALUE->caption() ?><?php echo ($view_pharmacy_pharled_return->VALUE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->VALUE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_VALUE">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_VALUE" name="x_VALUE" id="x_VALUE" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->VALUE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->VALUE->EditValue ?>"<?php echo $view_pharmacy_pharled_return->VALUE->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->VALUE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DISC->Visible) { // DISC ?>
	<div id="r_DISC" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DISC" for="x_DISC" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DISC->caption() ?><?php echo ($view_pharmacy_pharled_return->DISC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DISC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DISC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DISC" name="x_DISC" id="x_DISC" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DISC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DISC->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DISC->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->DISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_TAXP" for="x_TAXP" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->TAXP->caption() ?><?php echo ($view_pharmacy_pharled_return->TAXP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->TAXP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAXP">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->TAXP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->TAXP->EditValue ?>"<?php echo $view_pharmacy_pharled_return->TAXP->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->TAX->Visible) { // TAX ?>
	<div id="r_TAX" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_TAX" for="x_TAX" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->TAX->caption() ?><?php echo ($view_pharmacy_pharled_return->TAX->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->TAX->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAX">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_TAX" name="x_TAX" id="x_TAX" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->TAX->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->TAX->EditValue ?>"<?php echo $view_pharmacy_pharled_return->TAX->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->TAX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->TAXR->Visible) { // TAXR ?>
	<div id="r_TAXR" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_TAXR" for="x_TAXR" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->TAXR->caption() ?><?php echo ($view_pharmacy_pharled_return->TAXR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->TAXR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TAXR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_TAXR" name="x_TAXR" id="x_TAXR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->TAXR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->TAXR->EditValue ?>"<?php echo $view_pharmacy_pharled_return->TAXR->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->TAXR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->EMPNO->Visible) { // EMPNO ?>
	<div id="r_EMPNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_EMPNO" for="x_EMPNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->EMPNO->caption() ?><?php echo ($view_pharmacy_pharled_return->EMPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->EMPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_EMPNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EMPNO" name="x_EMPNO" id="x_EMPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->EMPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->EMPNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->EMPNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->EMPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PC" for="x_PC" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PC->caption() ?><?php echo ($view_pharmacy_pharled_return->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PC->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PC->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DRNAME->Visible) { // DRNAME ?>
	<div id="r_DRNAME" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DRNAME" for="x_DRNAME" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DRNAME->caption() ?><?php echo ($view_pharmacy_pharled_return->DRNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DRNAME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DRNAME">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DRNAME" name="x_DRNAME" id="x_DRNAME" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DRNAME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DRNAME->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DRNAME->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->DRNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BTIME->Visible) { // BTIME ?>
	<div id="r_BTIME" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BTIME" for="x_BTIME" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->BTIME->caption() ?><?php echo ($view_pharmacy_pharled_return->BTIME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->BTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BTIME">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BTIME" name="x_BTIME" id="x_BTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BTIME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BTIME->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BTIME->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->BTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->ONO->Visible) { // ONO ?>
	<div id="r_ONO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_ONO" for="x_ONO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->ONO->caption() ?><?php echo ($view_pharmacy_pharled_return->ONO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->ONO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_ONO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_ONO" name="x_ONO" id="x_ONO" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->ONO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->ONO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->ONO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->ONO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->ODT->Visible) { // ODT ?>
	<div id="r_ODT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_ODT" for="x_ODT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->ODT->caption() ?><?php echo ($view_pharmacy_pharled_return->ODT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->ODT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_ODT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_ODT" name="x_ODT" id="x_ODT" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->ODT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->ODT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->ODT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->ODT->ReadOnly && !$view_pharmacy_pharled_return->ODT->Disabled && !isset($view_pharmacy_pharled_return->ODT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->ODT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returnadd", "x_ODT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return->ODT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PURRT->Visible) { // PURRT ?>
	<div id="r_PURRT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PURRT" for="x_PURRT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PURRT->caption() ?><?php echo ($view_pharmacy_pharled_return->PURRT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PURRT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURRT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PURRT" name="x_PURRT" id="x_PURRT" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PURRT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PURRT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PURRT->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PURRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->GRP->Visible) { // GRP ?>
	<div id="r_GRP" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_GRP" for="x_GRP" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->GRP->caption() ?><?php echo ($view_pharmacy_pharled_return->GRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->GRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_GRP">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_GRP" name="x_GRP" id="x_GRP" size="30" maxlength="21" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->GRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->GRP->EditValue ?>"<?php echo $view_pharmacy_pharled_return->GRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->GRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IBATCH->Visible) { // IBATCH ?>
	<div id="r_IBATCH" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_IBATCH" for="x_IBATCH" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->IBATCH->caption() ?><?php echo ($view_pharmacy_pharled_return->IBATCH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->IBATCH->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IBATCH">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IBATCH" name="x_IBATCH" id="x_IBATCH" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->IBATCH->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->IBATCH->EditValue ?>"<?php echo $view_pharmacy_pharled_return->IBATCH->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->IBATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IPNO->Visible) { // IPNO ?>
	<div id="r_IPNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_IPNO" for="x_IPNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->IPNO->caption() ?><?php echo ($view_pharmacy_pharled_return->IPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->IPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_IPNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->IPNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->IPNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->IPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->OPNO->Visible) { // OPNO ?>
	<div id="r_OPNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_OPNO" for="x_OPNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->OPNO->caption() ?><?php echo ($view_pharmacy_pharled_return->OPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->OPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OPNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->OPNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->OPNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->OPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RECID->Visible) { // RECID ?>
	<div id="r_RECID" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RECID" for="x_RECID" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->RECID->caption() ?><?php echo ($view_pharmacy_pharled_return->RECID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->RECID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RECID">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RECID" name="x_RECID" id="x_RECID" size="30" maxlength="18" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RECID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RECID->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RECID->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->RECID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->FQTY->Visible) { // FQTY ?>
	<div id="r_FQTY" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_FQTY" for="x_FQTY" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->FQTY->caption() ?><?php echo ($view_pharmacy_pharled_return->FQTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->FQTY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_FQTY">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_FQTY" name="x_FQTY" id="x_FQTY" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->FQTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->FQTY->EditValue ?>"<?php echo $view_pharmacy_pharled_return->FQTY->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->FQTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_UR" for="x_UR" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->UR->caption() ?><?php echo ($view_pharmacy_pharled_return->UR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->UR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_UR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return->UR->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DCID->Visible) { // DCID ?>
	<div id="r_DCID" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DCID" for="x_DCID" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DCID->caption() ?><?php echo ($view_pharmacy_pharled_return->DCID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DCID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DCID">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DCID" name="x_DCID" id="x_DCID" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DCID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DCID->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DCID->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->DCID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MODDT->Visible) { // MODDT ?>
	<div id="r_MODDT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_MODDT" for="x_MODDT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->MODDT->caption() ?><?php echo ($view_pharmacy_pharled_return->MODDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->MODDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MODDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MODDT" name="x_MODDT" id="x_MODDT" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->MODDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->MODDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->MODDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->MODDT->ReadOnly && !$view_pharmacy_pharled_return->MODDT->Disabled && !isset($view_pharmacy_pharled_return->MODDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->MODDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returnadd", "x_MODDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return->MODDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->FYM->Visible) { // FYM ?>
	<div id="r_FYM" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_FYM" for="x_FYM" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->FYM->caption() ?><?php echo ($view_pharmacy_pharled_return->FYM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->FYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_FYM">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_FYM" name="x_FYM" id="x_FYM" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->FYM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->FYM->EditValue ?>"<?php echo $view_pharmacy_pharled_return->FYM->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->FYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRCBATCH->Visible) { // PRCBATCH ?>
	<div id="r_PRCBATCH" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PRCBATCH" for="x_PRCBATCH" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PRCBATCH->caption() ?><?php echo ($view_pharmacy_pharled_return->PRCBATCH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PRCBATCH->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRCBATCH">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRCBATCH" name="x_PRCBATCH" id="x_PRCBATCH" size="30" maxlength="23" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRCBATCH->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PRCBATCH->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PRCBATCH->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PRCBATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_MRP" for="x_MRP" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->MRP->caption() ?><?php echo ($view_pharmacy_pharled_return->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->MRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MRP">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->MRP->EditValue ?>"<?php echo $view_pharmacy_pharled_return->MRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BILLYM->Visible) { // BILLYM ?>
	<div id="r_BILLYM" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BILLYM" for="x_BILLYM" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->BILLYM->caption() ?><?php echo ($view_pharmacy_pharled_return->BILLYM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->BILLYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLYM">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BILLYM" name="x_BILLYM" id="x_BILLYM" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BILLYM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BILLYM->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BILLYM->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->BILLYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BILLGRP->Visible) { // BILLGRP ?>
	<div id="r_BILLGRP" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_BILLGRP" for="x_BILLGRP" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->BILLGRP->caption() ?><?php echo ($view_pharmacy_pharled_return->BILLGRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->BILLGRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_BILLGRP">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BILLGRP" name="x_BILLGRP" id="x_BILLGRP" size="30" maxlength="21" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BILLGRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BILLGRP->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BILLGRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->BILLGRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->STAFF->Visible) { // STAFF ?>
	<div id="r_STAFF" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_STAFF" for="x_STAFF" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->STAFF->caption() ?><?php echo ($view_pharmacy_pharled_return->STAFF->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->STAFF->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_STAFF">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_STAFF" name="x_STAFF" id="x_STAFF" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->STAFF->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->STAFF->EditValue ?>"<?php echo $view_pharmacy_pharled_return->STAFF->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->STAFF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<div id="r_TEMPIPNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_TEMPIPNO" for="x_TEMPIPNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->TEMPIPNO->caption() ?><?php echo ($view_pharmacy_pharled_return->TEMPIPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->TEMPIPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_TEMPIPNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_TEMPIPNO" name="x_TEMPIPNO" id="x_TEMPIPNO" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->TEMPIPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->TEMPIPNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->TEMPIPNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->TEMPIPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRNTED->Visible) { // PRNTED ?>
	<div id="r_PRNTED" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PRNTED" for="x_PRNTED" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PRNTED->caption() ?><?php echo ($view_pharmacy_pharled_return->PRNTED->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PRNTED->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRNTED">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRNTED" name="x_PRNTED" id="x_PRNTED" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRNTED->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PRNTED->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PRNTED->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PRNTED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PATNAME->Visible) { // PATNAME ?>
	<div id="r_PATNAME" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PATNAME" for="x_PATNAME" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PATNAME->caption() ?><?php echo ($view_pharmacy_pharled_return->PATNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PATNAME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PATNAME">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PATNAME" name="x_PATNAME" id="x_PATNAME" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PATNAME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PATNAME->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PATNAME->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PATNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PJVNO->Visible) { // PJVNO ?>
	<div id="r_PJVNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PJVNO" for="x_PJVNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PJVNO->caption() ?><?php echo ($view_pharmacy_pharled_return->PJVNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PJVNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PJVNO" name="x_PJVNO" id="x_PJVNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PJVNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PJVNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PJVNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PJVNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PJVSLNO->Visible) { // PJVSLNO ?>
	<div id="r_PJVSLNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PJVSLNO" for="x_PJVSLNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PJVSLNO->caption() ?><?php echo ($view_pharmacy_pharled_return->PJVSLNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PJVSLNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVSLNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PJVSLNO" name="x_PJVSLNO" id="x_PJVSLNO" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PJVSLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PJVSLNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PJVSLNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PJVSLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->OTHDISC->Visible) { // OTHDISC ?>
	<div id="r_OTHDISC" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_OTHDISC" for="x_OTHDISC" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->OTHDISC->caption() ?><?php echo ($view_pharmacy_pharled_return->OTHDISC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->OTHDISC->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_OTHDISC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_OTHDISC" name="x_OTHDISC" id="x_OTHDISC" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->OTHDISC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->OTHDISC->EditValue ?>"<?php echo $view_pharmacy_pharled_return->OTHDISC->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->OTHDISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PJVYM->Visible) { // PJVYM ?>
	<div id="r_PJVYM" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PJVYM" for="x_PJVYM" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PJVYM->caption() ?><?php echo ($view_pharmacy_pharled_return->PJVYM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PJVYM->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PJVYM">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PJVYM" name="x_PJVYM" id="x_PJVYM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PJVYM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PJVYM->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PJVYM->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PJVYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PURDISCPER->Visible) { // PURDISCPER ?>
	<div id="r_PURDISCPER" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PURDISCPER" for="x_PURDISCPER" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PURDISCPER->caption() ?><?php echo ($view_pharmacy_pharled_return->PURDISCPER->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PURDISCPER->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURDISCPER">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PURDISCPER" name="x_PURDISCPER" id="x_PURDISCPER" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PURDISCPER->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PURDISCPER->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PURDISCPER->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PURDISCPER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CASHIER->Visible) { // CASHIER ?>
	<div id="r_CASHIER" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CASHIER" for="x_CASHIER" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->CASHIER->caption() ?><?php echo ($view_pharmacy_pharled_return->CASHIER->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->CASHIER->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHIER">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CASHIER" name="x_CASHIER" id="x_CASHIER" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->CASHIER->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->CASHIER->EditValue ?>"<?php echo $view_pharmacy_pharled_return->CASHIER->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->CASHIER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CASHTIME->Visible) { // CASHTIME ?>
	<div id="r_CASHTIME" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CASHTIME" for="x_CASHTIME" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->CASHTIME->caption() ?><?php echo ($view_pharmacy_pharled_return->CASHTIME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->CASHTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHTIME">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CASHTIME" name="x_CASHTIME" id="x_CASHTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->CASHTIME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->CASHTIME->EditValue ?>"<?php echo $view_pharmacy_pharled_return->CASHTIME->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->CASHTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CASHRECD->Visible) { // CASHRECD ?>
	<div id="r_CASHRECD" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CASHRECD" for="x_CASHRECD" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->CASHRECD->caption() ?><?php echo ($view_pharmacy_pharled_return->CASHRECD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->CASHRECD->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHRECD">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CASHRECD" name="x_CASHRECD" id="x_CASHRECD" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->CASHRECD->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->CASHRECD->EditValue ?>"<?php echo $view_pharmacy_pharled_return->CASHRECD->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->CASHRECD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CASHREFNO->Visible) { // CASHREFNO ?>
	<div id="r_CASHREFNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CASHREFNO" for="x_CASHREFNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->CASHREFNO->caption() ?><?php echo ($view_pharmacy_pharled_return->CASHREFNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->CASHREFNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHREFNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CASHREFNO" name="x_CASHREFNO" id="x_CASHREFNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->CASHREFNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->CASHREFNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->CASHREFNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->CASHREFNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<div id="r_CASHIERSHIFT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CASHIERSHIFT" for="x_CASHIERSHIFT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->CASHIERSHIFT->caption() ?><?php echo ($view_pharmacy_pharled_return->CASHIERSHIFT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CASHIERSHIFT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CASHIERSHIFT" name="x_CASHIERSHIFT" id="x_CASHIERSHIFT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->CASHIERSHIFT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->CASHIERSHIFT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->CASHIERSHIFT->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->CASHIERSHIFT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PRCODE" for="x_PRCODE" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PRCODE->caption() ?><?php echo ($view_pharmacy_pharled_return->PRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PRCODE">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PRCODE->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PRCODE->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RELEASEBY->Visible) { // RELEASEBY ?>
	<div id="r_RELEASEBY" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RELEASEBY" for="x_RELEASEBY" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->RELEASEBY->caption() ?><?php echo ($view_pharmacy_pharled_return->RELEASEBY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->RELEASEBY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RELEASEBY">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RELEASEBY" name="x_RELEASEBY" id="x_RELEASEBY" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RELEASEBY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RELEASEBY->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RELEASEBY->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->RELEASEBY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<div id="r_CRAUTHOR" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_CRAUTHOR" for="x_CRAUTHOR" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->CRAUTHOR->caption() ?><?php echo ($view_pharmacy_pharled_return->CRAUTHOR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->CRAUTHOR->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_CRAUTHOR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_CRAUTHOR" name="x_CRAUTHOR" id="x_CRAUTHOR" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->CRAUTHOR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->CRAUTHOR->EditValue ?>"<?php echo $view_pharmacy_pharled_return->CRAUTHOR->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->CRAUTHOR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PAYMENT->Visible) { // PAYMENT ?>
	<div id="r_PAYMENT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PAYMENT" for="x_PAYMENT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PAYMENT->caption() ?><?php echo ($view_pharmacy_pharled_return->PAYMENT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PAYMENT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PAYMENT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PAYMENT" name="x_PAYMENT" id="x_PAYMENT" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PAYMENT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PAYMENT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PAYMENT->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PAYMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DRID" for="x_DRID" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DRID->caption() ?><?php echo ($view_pharmacy_pharled_return->DRID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DRID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DRID">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DRID" name="x_DRID" id="x_DRID" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DRID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DRID->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DRID->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->DRID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->WARD->Visible) { // WARD ?>
	<div id="r_WARD" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_WARD" for="x_WARD" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->WARD->caption() ?><?php echo ($view_pharmacy_pharled_return->WARD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->WARD->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_WARD">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_WARD" name="x_WARD" id="x_WARD" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->WARD->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->WARD->EditValue ?>"<?php echo $view_pharmacy_pharled_return->WARD->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->WARD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->STAXTYPE->Visible) { // STAXTYPE ?>
	<div id="r_STAXTYPE" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_STAXTYPE" for="x_STAXTYPE" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->STAXTYPE->caption() ?><?php echo ($view_pharmacy_pharled_return->STAXTYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->STAXTYPE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_STAXTYPE">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_STAXTYPE" name="x_STAXTYPE" id="x_STAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->STAXTYPE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->STAXTYPE->EditValue ?>"<?php echo $view_pharmacy_pharled_return->STAXTYPE->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->STAXTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<div id="r_PURDISCVAL" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PURDISCVAL" for="x_PURDISCVAL" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PURDISCVAL->caption() ?><?php echo ($view_pharmacy_pharled_return->PURDISCVAL->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PURDISCVAL->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PURDISCVAL">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PURDISCVAL" name="x_PURDISCVAL" id="x_PURDISCVAL" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PURDISCVAL->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PURDISCVAL->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PURDISCVAL->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PURDISCVAL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RNDOFF->Visible) { // RNDOFF ?>
	<div id="r_RNDOFF" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_RNDOFF" for="x_RNDOFF" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->RNDOFF->caption() ?><?php echo ($view_pharmacy_pharled_return->RNDOFF->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->RNDOFF->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_RNDOFF">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RNDOFF" name="x_RNDOFF" id="x_RNDOFF" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RNDOFF->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RNDOFF->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RNDOFF->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->RNDOFF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DISCONMRP->Visible) { // DISCONMRP ?>
	<div id="r_DISCONMRP" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DISCONMRP" for="x_DISCONMRP" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DISCONMRP->caption() ?><?php echo ($view_pharmacy_pharled_return->DISCONMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DISCONMRP->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DISCONMRP">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DISCONMRP" name="x_DISCONMRP" id="x_DISCONMRP" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DISCONMRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DISCONMRP->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DISCONMRP->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->DISCONMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DELVDT->Visible) { // DELVDT ?>
	<div id="r_DELVDT" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DELVDT" for="x_DELVDT" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DELVDT->caption() ?><?php echo ($view_pharmacy_pharled_return->DELVDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DELVDT->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DELVDT" name="x_DELVDT" id="x_DELVDT" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DELVDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DELVDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DELVDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->DELVDT->ReadOnly && !$view_pharmacy_pharled_return->DELVDT->Disabled && !isset($view_pharmacy_pharled_return->DELVDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->DELVDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returnadd", "x_DELVDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_pharmacy_pharled_return->DELVDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DELVTIME->Visible) { // DELVTIME ?>
	<div id="r_DELVTIME" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DELVTIME" for="x_DELVTIME" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DELVTIME->caption() ?><?php echo ($view_pharmacy_pharled_return->DELVTIME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DELVTIME->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVTIME">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DELVTIME" name="x_DELVTIME" id="x_DELVTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DELVTIME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DELVTIME->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DELVTIME->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->DELVTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DELVBY->Visible) { // DELVBY ?>
	<div id="r_DELVBY" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_DELVBY" for="x_DELVBY" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->DELVBY->caption() ?><?php echo ($view_pharmacy_pharled_return->DELVBY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->DELVBY->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_DELVBY">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DELVBY" name="x_DELVBY" id="x_DELVBY" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DELVBY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DELVBY->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DELVBY->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->DELVBY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->HOSPNO->Visible) { // HOSPNO ?>
	<div id="r_HOSPNO" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_HOSPNO" for="x_HOSPNO" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->HOSPNO->caption() ?><?php echo ($view_pharmacy_pharled_return->HOSPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->HOSPNO->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_HOSPNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_HOSPNO" name="x_HOSPNO" id="x_HOSPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->HOSPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->HOSPNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->HOSPNO->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->HOSPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->pbv->Visible) { // pbv ?>
	<div id="r_pbv" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_pbv" for="x_pbv" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->pbv->caption() ?><?php echo ($view_pharmacy_pharled_return->pbv->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->pbv->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_pbv">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_pbv" name="x_pbv" id="x_pbv" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->pbv->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->pbv->EditValue ?>"<?php echo $view_pharmacy_pharled_return->pbv->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->pbv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->pbt->Visible) { // pbt ?>
	<div id="r_pbt" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_pbt" for="x_pbt" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->pbt->caption() ?><?php echo ($view_pharmacy_pharled_return->pbt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->pbt->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_pbt">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_pbt" name="x_pbt" id="x_pbt" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->pbt->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->pbt->EditValue ?>"<?php echo $view_pharmacy_pharled_return->pbt->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->pbt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_MFRCODE" for="x_MFRCODE" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->MFRCODE->caption() ?><?php echo ($view_pharmacy_pharled_return->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_MFRCODE">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_pharled_return->MFRCODE->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_Reception" for="x_Reception" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->Reception->caption() ?><?php echo ($view_pharmacy_pharled_return->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->Reception->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_Reception">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Reception->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Reception->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Reception->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_PatID" for="x_PatID" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->PatID->caption() ?><?php echo ($view_pharmacy_pharled_return->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->PatID->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_PatID">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PatID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PatID->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PatID->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_mrnno" for="x_mrnno" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->mrnno->caption() ?><?php echo ($view_pharmacy_pharled_return->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->mrnno->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_mrnno">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->mrnno->EditValue ?>"<?php echo $view_pharmacy_pharled_return->mrnno->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->sretid->Visible) { // sretid ?>
	<div id="r_sretid" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_sretid" for="x_sretid" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->sretid->caption() ?><?php echo ($view_pharmacy_pharled_return->sretid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->sretid->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->sretid->getSessionValue() <> "") { ?>
<span id="el_view_pharmacy_pharled_return_sretid">
<span<?php echo $view_pharmacy_pharled_return->sretid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->sretid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_sretid" name="x_sretid" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->sretid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_pharmacy_pharled_return_sretid">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_sretid" name="x_sretid" id="x_sretid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->sretid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->sretid->EditValue ?>"<?php echo $view_pharmacy_pharled_return->sretid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_pharmacy_pharled_return->sretid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->sprid->Visible) { // sprid ?>
	<div id="r_sprid" class="form-group row">
		<label id="elh_view_pharmacy_pharled_return_sprid" for="x_sprid" class="<?php echo $view_pharmacy_pharled_return_add->LeftColumnClass ?>"><?php echo $view_pharmacy_pharled_return->sprid->caption() ?><?php echo ($view_pharmacy_pharled_return->sprid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_pharled_return_add->RightColumnClass ?>"><div<?php echo $view_pharmacy_pharled_return->sprid->cellAttributes() ?>>
<span id="el_view_pharmacy_pharled_return_sprid">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_sprid" name="x_sprid" id="x_sprid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->sprid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->sprid->EditValue ?>"<?php echo $view_pharmacy_pharled_return->sprid->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_pharled_return->sprid->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacy_pharled_return_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacy_pharled_return_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacy_pharled_return_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacy_pharled_return_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_pharled_return_add->terminate();
?>