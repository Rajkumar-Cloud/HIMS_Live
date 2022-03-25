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
$pharmacy_pharled_edit = new pharmacy_pharled_edit();

// Run the page
$pharmacy_pharled_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_pharled_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_pharlededit = currentForm = new ew.Form("fpharmacy_pharlededit", "edit");

// Validate form
fpharmacy_pharlededit.validate = function() {
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
		<?php if ($pharmacy_pharled_edit->SiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SiNo->caption(), $pharmacy_pharled->SiNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SiNo->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->SLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SLNO->caption(), $pharmacy_pharled->SLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SLNO->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->Product->Required) { ?>
			elm = this.getElements("x" + infix + "_Product");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->Product->caption(), $pharmacy_pharled->Product->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->RT->caption(), $pharmacy_pharled->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->RT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->IQ->caption(), $pharmacy_pharled->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->IQ->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->DAMT->Required) { ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DAMT->caption(), $pharmacy_pharled->DAMT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->DAMT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->Mfg->Required) { ?>
			elm = this.getElements("x" + infix + "_Mfg");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->Mfg->caption(), $pharmacy_pharled->Mfg->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->EXPDT->caption(), $pharmacy_pharled->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->EXPDT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BATCHNO->caption(), $pharmacy_pharled->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BRCODE->caption(), $pharmacy_pharled->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->TYPE->caption(), $pharmacy_pharled->TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->DN->Required) { ?>
			elm = this.getElements("x" + infix + "_DN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DN->caption(), $pharmacy_pharled->DN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->RDN->Required) { ?>
			elm = this.getElements("x" + infix + "_RDN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->RDN->caption(), $pharmacy_pharled->RDN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DT->caption(), $pharmacy_pharled->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->DT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PRC->caption(), $pharmacy_pharled->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->OQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->OQ->caption(), $pharmacy_pharled->OQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->OQ->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->RQ->Required) { ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->RQ->caption(), $pharmacy_pharled->RQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->RQ->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->MRQ->caption(), $pharmacy_pharled->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->MRQ->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->BILLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BILLNO->caption(), $pharmacy_pharled->BILLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->BILLDT->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BILLDT->caption(), $pharmacy_pharled->BILLDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->BILLDT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->VALUE->Required) { ?>
			elm = this.getElements("x" + infix + "_VALUE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->VALUE->caption(), $pharmacy_pharled->VALUE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_VALUE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->VALUE->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->DISC->Required) { ?>
			elm = this.getElements("x" + infix + "_DISC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DISC->caption(), $pharmacy_pharled->DISC->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DISC");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->DISC->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->TAXP->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->TAXP->caption(), $pharmacy_pharled->TAXP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->TAXP->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->TAX->Required) { ?>
			elm = this.getElements("x" + infix + "_TAX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->TAX->caption(), $pharmacy_pharled->TAX->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAX");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->TAX->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->TAXR->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->TAXR->caption(), $pharmacy_pharled->TAXR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->TAXR->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->EMPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_EMPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->EMPNO->caption(), $pharmacy_pharled->EMPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PC->caption(), $pharmacy_pharled->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->DRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_DRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DRNAME->caption(), $pharmacy_pharled->DRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->BTIME->Required) { ?>
			elm = this.getElements("x" + infix + "_BTIME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BTIME->caption(), $pharmacy_pharled->BTIME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->ONO->Required) { ?>
			elm = this.getElements("x" + infix + "_ONO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->ONO->caption(), $pharmacy_pharled->ONO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->ODT->Required) { ?>
			elm = this.getElements("x" + infix + "_ODT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->ODT->caption(), $pharmacy_pharled->ODT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ODT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->ODT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->PURRT->Required) { ?>
			elm = this.getElements("x" + infix + "_PURRT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PURRT->caption(), $pharmacy_pharled->PURRT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PURRT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PURRT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->GRP->Required) { ?>
			elm = this.getElements("x" + infix + "_GRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->GRP->caption(), $pharmacy_pharled->GRP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->IBATCH->Required) { ?>
			elm = this.getElements("x" + infix + "_IBATCH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->IBATCH->caption(), $pharmacy_pharled->IBATCH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->IPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_IPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->IPNO->caption(), $pharmacy_pharled->IPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->OPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_OPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->OPNO->caption(), $pharmacy_pharled->OPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->RECID->Required) { ?>
			elm = this.getElements("x" + infix + "_RECID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->RECID->caption(), $pharmacy_pharled->RECID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->FQTY->Required) { ?>
			elm = this.getElements("x" + infix + "_FQTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->FQTY->caption(), $pharmacy_pharled->FQTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FQTY");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->FQTY->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->UR->caption(), $pharmacy_pharled->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->UR->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->DCID->Required) { ?>
			elm = this.getElements("x" + infix + "_DCID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DCID->caption(), $pharmacy_pharled->DCID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->_USERID->Required) { ?>
			elm = this.getElements("x" + infix + "__USERID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->_USERID->caption(), $pharmacy_pharled->_USERID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->MODDT->Required) { ?>
			elm = this.getElements("x" + infix + "_MODDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->MODDT->caption(), $pharmacy_pharled->MODDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MODDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->MODDT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->FYM->Required) { ?>
			elm = this.getElements("x" + infix + "_FYM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->FYM->caption(), $pharmacy_pharled->FYM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PRCBATCH->Required) { ?>
			elm = this.getElements("x" + infix + "_PRCBATCH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PRCBATCH->caption(), $pharmacy_pharled->PRCBATCH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->MRP->caption(), $pharmacy_pharled->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->MRP->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->BILLYM->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLYM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BILLYM->caption(), $pharmacy_pharled->BILLYM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->BILLGRP->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLGRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BILLGRP->caption(), $pharmacy_pharled->BILLGRP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->STAFF->Required) { ?>
			elm = this.getElements("x" + infix + "_STAFF");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->STAFF->caption(), $pharmacy_pharled->STAFF->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->TEMPIPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_TEMPIPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->TEMPIPNO->caption(), $pharmacy_pharled->TEMPIPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PRNTED->Required) { ?>
			elm = this.getElements("x" + infix + "_PRNTED");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PRNTED->caption(), $pharmacy_pharled->PRNTED->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PATNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_PATNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PATNAME->caption(), $pharmacy_pharled->PATNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PJVNO->Required) { ?>
			elm = this.getElements("x" + infix + "_PJVNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PJVNO->caption(), $pharmacy_pharled->PJVNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PJVSLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_PJVSLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PJVSLNO->caption(), $pharmacy_pharled->PJVSLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->OTHDISC->Required) { ?>
			elm = this.getElements("x" + infix + "_OTHDISC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->OTHDISC->caption(), $pharmacy_pharled->OTHDISC->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OTHDISC");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->OTHDISC->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->PJVYM->Required) { ?>
			elm = this.getElements("x" + infix + "_PJVYM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PJVYM->caption(), $pharmacy_pharled->PJVYM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PURDISCPER->Required) { ?>
			elm = this.getElements("x" + infix + "_PURDISCPER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PURDISCPER->caption(), $pharmacy_pharled->PURDISCPER->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PURDISCPER");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PURDISCPER->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->CASHIER->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHIER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->CASHIER->caption(), $pharmacy_pharled->CASHIER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->CASHTIME->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHTIME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->CASHTIME->caption(), $pharmacy_pharled->CASHTIME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->CASHRECD->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHRECD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->CASHRECD->caption(), $pharmacy_pharled->CASHRECD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CASHRECD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->CASHRECD->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->CASHREFNO->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHREFNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->CASHREFNO->caption(), $pharmacy_pharled->CASHREFNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->CASHIERSHIFT->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHIERSHIFT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->CASHIERSHIFT->caption(), $pharmacy_pharled->CASHIERSHIFT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_PRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PRCODE->caption(), $pharmacy_pharled->PRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->RELEASEBY->Required) { ?>
			elm = this.getElements("x" + infix + "_RELEASEBY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->RELEASEBY->caption(), $pharmacy_pharled->RELEASEBY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->CRAUTHOR->Required) { ?>
			elm = this.getElements("x" + infix + "_CRAUTHOR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->CRAUTHOR->caption(), $pharmacy_pharled->CRAUTHOR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PAYMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_PAYMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PAYMENT->caption(), $pharmacy_pharled->PAYMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->DRID->Required) { ?>
			elm = this.getElements("x" + infix + "_DRID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DRID->caption(), $pharmacy_pharled->DRID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->WARD->Required) { ?>
			elm = this.getElements("x" + infix + "_WARD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->WARD->caption(), $pharmacy_pharled->WARD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->STAXTYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_STAXTYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->STAXTYPE->caption(), $pharmacy_pharled->STAXTYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PURDISCVAL->Required) { ?>
			elm = this.getElements("x" + infix + "_PURDISCVAL");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PURDISCVAL->caption(), $pharmacy_pharled->PURDISCVAL->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PURDISCVAL");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PURDISCVAL->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->RNDOFF->Required) { ?>
			elm = this.getElements("x" + infix + "_RNDOFF");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->RNDOFF->caption(), $pharmacy_pharled->RNDOFF->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RNDOFF");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->RNDOFF->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->DISCONMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_DISCONMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DISCONMRP->caption(), $pharmacy_pharled->DISCONMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DISCONMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->DISCONMRP->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->DELVDT->Required) { ?>
			elm = this.getElements("x" + infix + "_DELVDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DELVDT->caption(), $pharmacy_pharled->DELVDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DELVDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->DELVDT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->DELVTIME->Required) { ?>
			elm = this.getElements("x" + infix + "_DELVTIME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DELVTIME->caption(), $pharmacy_pharled->DELVTIME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->DELVBY->Required) { ?>
			elm = this.getElements("x" + infix + "_DELVBY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DELVBY->caption(), $pharmacy_pharled->DELVBY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->HOSPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_HOSPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->HOSPNO->caption(), $pharmacy_pharled->HOSPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->id->caption(), $pharmacy_pharled->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->pbv->Required) { ?>
			elm = this.getElements("x" + infix + "_pbv");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->pbv->caption(), $pharmacy_pharled->pbv->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pbv");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->pbv->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->pbt->Required) { ?>
			elm = this.getElements("x" + infix + "_pbt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->pbt->caption(), $pharmacy_pharled->pbt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pbt");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->pbt->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->HosoID->Required) { ?>
			elm = this.getElements("x" + infix + "_HosoID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->HosoID->caption(), $pharmacy_pharled->HosoID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->modifiedby->caption(), $pharmacy_pharled->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->modifieddatetime->caption(), $pharmacy_pharled->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->MFRCODE->caption(), $pharmacy_pharled->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->Reception->caption(), $pharmacy_pharled->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->Reception->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PatID->caption(), $pharmacy_pharled->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PatID->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->mrnno->caption(), $pharmacy_pharled->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BRNAME->caption(), $pharmacy_pharled->BRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->sretid->Required) { ?>
			elm = this.getElements("x" + infix + "_sretid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->sretid->caption(), $pharmacy_pharled->sretid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sretid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->sretid->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->sprid->Required) { ?>
			elm = this.getElements("x" + infix + "_sprid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->sprid->caption(), $pharmacy_pharled->sprid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sprid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->sprid->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->baid->Required) { ?>
			elm = this.getElements("x" + infix + "_baid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->baid->caption(), $pharmacy_pharled->baid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_baid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->baid->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->isdate->Required) { ?>
			elm = this.getElements("x" + infix + "_isdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->isdate->caption(), $pharmacy_pharled->isdate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PSGST->caption(), $pharmacy_pharled->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PSGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PCGST->caption(), $pharmacy_pharled->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PCGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SSGST->caption(), $pharmacy_pharled->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SSGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SCGST->caption(), $pharmacy_pharled->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SCGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PurValue->caption(), $pharmacy_pharled->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PurValue->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PurRate->caption(), $pharmacy_pharled->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PurRate->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PUnit->caption(), $pharmacy_pharled->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PUnit->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SUnit->caption(), $pharmacy_pharled->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SUnit->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_edit->HSNCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_HSNCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->HSNCODE->caption(), $pharmacy_pharled->HSNCODE->RequiredErrorMessage)) ?>");
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
fpharmacy_pharlededit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_pharlededit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_pharlededit.lists["x_SLNO"] = <?php echo $pharmacy_pharled_edit->SLNO->Lookup->toClientList() ?>;
fpharmacy_pharlededit.lists["x_SLNO"].options = <?php echo JsonEncode($pharmacy_pharled_edit->SLNO->lookupOptions()) ?>;
fpharmacy_pharlededit.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_pharled_edit->showPageHeader(); ?>
<?php
$pharmacy_pharled_edit->showMessage();
?>
<form name="fpharmacy_pharlededit" id="fpharmacy_pharlededit" class="<?php echo $pharmacy_pharled_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_pharled_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_pharled_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_pharled_edit->IsModal ?>">
<?php if ($pharmacy_pharled->getCurrentMasterTable() == "pharmacy_billing_voucher") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_billing_voucher">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_pharled->pbv->getSessionValue() ?>">
<?php } ?>
<?php if ($pharmacy_pharled->getCurrentMasterTable() == "pharmacy_billing_issue") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_billing_issue">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_pharled->pbt->getSessionValue() ?>">
<?php } ?>
<?php if ($pharmacy_pharled->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_mrnNo" value="<?php echo $pharmacy_pharled->mrnno->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $pharmacy_pharled->PatID->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_pharled->Reception->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
	<div id="r_SiNo" class="form-group row">
		<label id="elh_pharmacy_pharled_SiNo" for="x_SiNo" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->SiNo->caption() ?><?php echo ($pharmacy_pharled->SiNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->SiNo->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SiNo">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x_SiNo" id="x_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SiNo->EditValue ?>"<?php echo $pharmacy_pharled->SiNo->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->SiNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
	<div id="r_SLNO" class="form-group row">
		<label id="elh_pharmacy_pharled_SLNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->SLNO->caption() ?><?php echo ($pharmacy_pharled->SLNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->SLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_pharled->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_pharled->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x_SLNO" class="text-nowrap" style="z-index: 8980">
	<input type="text" class="form-control" name="sv_x_SLNO" id="sv_x_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled->SLNO->displayValueSeparatorAttribute() ?>" name="x_SLNO" id="x_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_pharlededit.createAutoSuggest({"id":"x_SLNO","forceSelect":true});
</script>
<?php echo $pharmacy_pharled->SLNO->Lookup->getParamTag("p_x_SLNO") ?>
</span>
<?php echo $pharmacy_pharled->SLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
	<div id="r_Product" class="form-group row">
		<label id="elh_pharmacy_pharled_Product" for="x_Product" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->Product->caption() ?><?php echo ($pharmacy_pharled->Product->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->Product->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Product">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Product->EditValue ?>"<?php echo $pharmacy_pharled->Product->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->Product->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_pharmacy_pharled_RT" for="x_RT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->RT->caption() ?><?php echo ($pharmacy_pharled->RT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->RT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RT">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x_RT" id="x_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RT->EditValue ?>"<?php echo $pharmacy_pharled->RT->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_pharmacy_pharled_IQ" for="x_IQ" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->IQ->caption() ?><?php echo ($pharmacy_pharled->IQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->IQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x_IQ" id="x_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->IQ->EditValue ?>"<?php echo $pharmacy_pharled->IQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
	<div id="r_DAMT" class="form-group row">
		<label id="elh_pharmacy_pharled_DAMT" for="x_DAMT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DAMT->caption() ?><?php echo ($pharmacy_pharled->DAMT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DAMT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DAMT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x_DAMT" id="x_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DAMT->EditValue ?>"<?php echo $pharmacy_pharled->DAMT->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->DAMT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
	<div id="r_Mfg" class="form-group row">
		<label id="elh_pharmacy_pharled_Mfg" for="x_Mfg" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->Mfg->caption() ?><?php echo ($pharmacy_pharled->Mfg->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->Mfg->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Mfg">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x_Mfg" id="x_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Mfg->EditValue ?>"<?php echo $pharmacy_pharled->Mfg->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->Mfg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_pharmacy_pharled_EXPDT" for="x_EXPDT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->EXPDT->caption() ?><?php echo ($pharmacy_pharled->EXPDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_EXPDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->EXPDT->ReadOnly && !$pharmacy_pharled->EXPDT->Disabled && !isset($pharmacy_pharled->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharlededit", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_pharled->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_pharmacy_pharled_BATCHNO" for="x_BATCHNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->BATCHNO->caption() ?><?php echo ($pharmacy_pharled->BATCHNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BATCHNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled->BATCHNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label id="elh_pharmacy_pharled_TYPE" for="x_TYPE" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->TYPE->caption() ?><?php echo ($pharmacy_pharled->TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TYPE">
<input type="text" data-table="pharmacy_pharled" data-field="x_TYPE" name="x_TYPE" id="x_TYPE" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled->TYPE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->TYPE->EditValue ?>"<?php echo $pharmacy_pharled->TYPE->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DN->Visible) { // DN ?>
	<div id="r_DN" class="form-group row">
		<label id="elh_pharmacy_pharled_DN" for="x_DN" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DN->caption() ?><?php echo ($pharmacy_pharled->DN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DN->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DN">
<input type="text" data-table="pharmacy_pharled" data-field="x_DN" name="x_DN" id="x_DN" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DN->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DN->EditValue ?>"<?php echo $pharmacy_pharled->DN->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->DN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->RDN->Visible) { // RDN ?>
	<div id="r_RDN" class="form-group row">
		<label id="elh_pharmacy_pharled_RDN" for="x_RDN" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->RDN->caption() ?><?php echo ($pharmacy_pharled->RDN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->RDN->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RDN">
<input type="text" data-table="pharmacy_pharled" data-field="x_RDN" name="x_RDN" id="x_RDN" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RDN->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RDN->EditValue ?>"<?php echo $pharmacy_pharled->RDN->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->RDN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_pharmacy_pharled_DT" for="x_DT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DT->caption() ?><?php echo ($pharmacy_pharled->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DT->EditValue ?>"<?php echo $pharmacy_pharled->DT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->DT->ReadOnly && !$pharmacy_pharled->DT->Disabled && !isset($pharmacy_pharled->DT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharlededit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_pharled->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_pharled_PRC" for="x_PRC" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PRC->caption() ?><?php echo ($pharmacy_pharled->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PRC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRC">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PRC->EditValue ?>"<?php echo $pharmacy_pharled->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_pharmacy_pharled_OQ" for="x_OQ" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->OQ->caption() ?><?php echo ($pharmacy_pharled->OQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->OQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->OQ->EditValue ?>"<?php echo $pharmacy_pharled->OQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_pharmacy_pharled_RQ" for="x_RQ" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->RQ->caption() ?><?php echo ($pharmacy_pharled->RQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->RQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RQ->EditValue ?>"<?php echo $pharmacy_pharled->RQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_pharmacy_pharled_MRQ" for="x_MRQ" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->MRQ->caption() ?><?php echo ($pharmacy_pharled->MRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MRQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->MRQ->EditValue ?>"<?php echo $pharmacy_pharled->MRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->BILLNO->Visible) { // BILLNO ?>
	<div id="r_BILLNO" class="form-group row">
		<label id="elh_pharmacy_pharled_BILLNO" for="x_BILLNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->BILLNO->caption() ?><?php echo ($pharmacy_pharled->BILLNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->BILLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BILLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BILLNO->EditValue ?>"<?php echo $pharmacy_pharled->BILLNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->BILLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label id="elh_pharmacy_pharled_BILLDT" for="x_BILLDT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->BILLDT->caption() ?><?php echo ($pharmacy_pharled->BILLDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->BILLDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BILLDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BILLDT->EditValue ?>"<?php echo $pharmacy_pharled->BILLDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->BILLDT->ReadOnly && !$pharmacy_pharled->BILLDT->Disabled && !isset($pharmacy_pharled->BILLDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharlededit", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_pharled->BILLDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->VALUE->Visible) { // VALUE ?>
	<div id="r_VALUE" class="form-group row">
		<label id="elh_pharmacy_pharled_VALUE" for="x_VALUE" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->VALUE->caption() ?><?php echo ($pharmacy_pharled->VALUE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->VALUE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_VALUE">
<input type="text" data-table="pharmacy_pharled" data-field="x_VALUE" name="x_VALUE" id="x_VALUE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->VALUE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->VALUE->EditValue ?>"<?php echo $pharmacy_pharled->VALUE->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->VALUE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DISC->Visible) { // DISC ?>
	<div id="r_DISC" class="form-group row">
		<label id="elh_pharmacy_pharled_DISC" for="x_DISC" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DISC->caption() ?><?php echo ($pharmacy_pharled->DISC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DISC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DISC">
<input type="text" data-table="pharmacy_pharled" data-field="x_DISC" name="x_DISC" id="x_DISC" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DISC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DISC->EditValue ?>"<?php echo $pharmacy_pharled->DISC->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->DISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_pharmacy_pharled_TAXP" for="x_TAXP" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->TAXP->caption() ?><?php echo ($pharmacy_pharled->TAXP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAXP">
<input type="text" data-table="pharmacy_pharled" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->TAXP->EditValue ?>"<?php echo $pharmacy_pharled->TAXP->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->TAX->Visible) { // TAX ?>
	<div id="r_TAX" class="form-group row">
		<label id="elh_pharmacy_pharled_TAX" for="x_TAX" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->TAX->caption() ?><?php echo ($pharmacy_pharled->TAX->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->TAX->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAX">
<input type="text" data-table="pharmacy_pharled" data-field="x_TAX" name="x_TAX" id="x_TAX" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->TAX->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->TAX->EditValue ?>"<?php echo $pharmacy_pharled->TAX->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->TAX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->TAXR->Visible) { // TAXR ?>
	<div id="r_TAXR" class="form-group row">
		<label id="elh_pharmacy_pharled_TAXR" for="x_TAXR" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->TAXR->caption() ?><?php echo ($pharmacy_pharled->TAXR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->TAXR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAXR">
<input type="text" data-table="pharmacy_pharled" data-field="x_TAXR" name="x_TAXR" id="x_TAXR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->TAXR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->TAXR->EditValue ?>"<?php echo $pharmacy_pharled->TAXR->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->TAXR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->EMPNO->Visible) { // EMPNO ?>
	<div id="r_EMPNO" class="form-group row">
		<label id="elh_pharmacy_pharled_EMPNO" for="x_EMPNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->EMPNO->caption() ?><?php echo ($pharmacy_pharled->EMPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->EMPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_EMPNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_EMPNO" name="x_EMPNO" id="x_EMPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled->EMPNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->EMPNO->EditValue ?>"<?php echo $pharmacy_pharled->EMPNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->EMPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_pharled_PC" for="x_PC" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PC->caption() ?><?php echo ($pharmacy_pharled->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PC">
<input type="text" data-table="pharmacy_pharled" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PC->EditValue ?>"<?php echo $pharmacy_pharled->PC->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DRNAME->Visible) { // DRNAME ?>
	<div id="r_DRNAME" class="form-group row">
		<label id="elh_pharmacy_pharled_DRNAME" for="x_DRNAME" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DRNAME->caption() ?><?php echo ($pharmacy_pharled->DRNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DRNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DRNAME">
<input type="text" data-table="pharmacy_pharled" data-field="x_DRNAME" name="x_DRNAME" id="x_DRNAME" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DRNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DRNAME->EditValue ?>"<?php echo $pharmacy_pharled->DRNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->DRNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->BTIME->Visible) { // BTIME ?>
	<div id="r_BTIME" class="form-group row">
		<label id="elh_pharmacy_pharled_BTIME" for="x_BTIME" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->BTIME->caption() ?><?php echo ($pharmacy_pharled->BTIME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->BTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BTIME">
<input type="text" data-table="pharmacy_pharled" data-field="x_BTIME" name="x_BTIME" id="x_BTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BTIME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BTIME->EditValue ?>"<?php echo $pharmacy_pharled->BTIME->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->BTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->ONO->Visible) { // ONO ?>
	<div id="r_ONO" class="form-group row">
		<label id="elh_pharmacy_pharled_ONO" for="x_ONO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->ONO->caption() ?><?php echo ($pharmacy_pharled->ONO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->ONO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_ONO">
<input type="text" data-table="pharmacy_pharled" data-field="x_ONO" name="x_ONO" id="x_ONO" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_pharled->ONO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->ONO->EditValue ?>"<?php echo $pharmacy_pharled->ONO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->ONO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->ODT->Visible) { // ODT ?>
	<div id="r_ODT" class="form-group row">
		<label id="elh_pharmacy_pharled_ODT" for="x_ODT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->ODT->caption() ?><?php echo ($pharmacy_pharled->ODT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->ODT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_ODT">
<input type="text" data-table="pharmacy_pharled" data-field="x_ODT" name="x_ODT" id="x_ODT" placeholder="<?php echo HtmlEncode($pharmacy_pharled->ODT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->ODT->EditValue ?>"<?php echo $pharmacy_pharled->ODT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->ODT->ReadOnly && !$pharmacy_pharled->ODT->Disabled && !isset($pharmacy_pharled->ODT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->ODT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharlededit", "x_ODT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_pharled->ODT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PURRT->Visible) { // PURRT ?>
	<div id="r_PURRT" class="form-group row">
		<label id="elh_pharmacy_pharled_PURRT" for="x_PURRT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PURRT->caption() ?><?php echo ($pharmacy_pharled->PURRT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PURRT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURRT">
<input type="text" data-table="pharmacy_pharled" data-field="x_PURRT" name="x_PURRT" id="x_PURRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PURRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PURRT->EditValue ?>"<?php echo $pharmacy_pharled->PURRT->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PURRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->GRP->Visible) { // GRP ?>
	<div id="r_GRP" class="form-group row">
		<label id="elh_pharmacy_pharled_GRP" for="x_GRP" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->GRP->caption() ?><?php echo ($pharmacy_pharled->GRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->GRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_GRP">
<input type="text" data-table="pharmacy_pharled" data-field="x_GRP" name="x_GRP" id="x_GRP" size="30" maxlength="21" placeholder="<?php echo HtmlEncode($pharmacy_pharled->GRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->GRP->EditValue ?>"<?php echo $pharmacy_pharled->GRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->GRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->IBATCH->Visible) { // IBATCH ?>
	<div id="r_IBATCH" class="form-group row">
		<label id="elh_pharmacy_pharled_IBATCH" for="x_IBATCH" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->IBATCH->caption() ?><?php echo ($pharmacy_pharled->IBATCH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->IBATCH->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IBATCH">
<input type="text" data-table="pharmacy_pharled" data-field="x_IBATCH" name="x_IBATCH" id="x_IBATCH" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($pharmacy_pharled->IBATCH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->IBATCH->EditValue ?>"<?php echo $pharmacy_pharled->IBATCH->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->IBATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->IPNO->Visible) { // IPNO ?>
	<div id="r_IPNO" class="form-group row">
		<label id="elh_pharmacy_pharled_IPNO" for="x_IPNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->IPNO->caption() ?><?php echo ($pharmacy_pharled->IPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->IPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IPNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($pharmacy_pharled->IPNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->IPNO->EditValue ?>"<?php echo $pharmacy_pharled->IPNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->IPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->OPNO->Visible) { // OPNO ?>
	<div id="r_OPNO" class="form-group row">
		<label id="elh_pharmacy_pharled_OPNO" for="x_OPNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->OPNO->caption() ?><?php echo ($pharmacy_pharled->OPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->OPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OPNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled->OPNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->OPNO->EditValue ?>"<?php echo $pharmacy_pharled->OPNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->OPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->RECID->Visible) { // RECID ?>
	<div id="r_RECID" class="form-group row">
		<label id="elh_pharmacy_pharled_RECID" for="x_RECID" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->RECID->caption() ?><?php echo ($pharmacy_pharled->RECID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->RECID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RECID">
<input type="text" data-table="pharmacy_pharled" data-field="x_RECID" name="x_RECID" id="x_RECID" size="30" maxlength="18" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RECID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RECID->EditValue ?>"<?php echo $pharmacy_pharled->RECID->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->RECID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->FQTY->Visible) { // FQTY ?>
	<div id="r_FQTY" class="form-group row">
		<label id="elh_pharmacy_pharled_FQTY" for="x_FQTY" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->FQTY->caption() ?><?php echo ($pharmacy_pharled->FQTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->FQTY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_FQTY">
<input type="text" data-table="pharmacy_pharled" data-field="x_FQTY" name="x_FQTY" id="x_FQTY" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->FQTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->FQTY->EditValue ?>"<?php echo $pharmacy_pharled->FQTY->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->FQTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_pharmacy_pharled_UR" for="x_UR" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->UR->caption() ?><?php echo ($pharmacy_pharled->UR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->UR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_UR">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->UR->EditValue ?>"<?php echo $pharmacy_pharled->UR->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DCID->Visible) { // DCID ?>
	<div id="r_DCID" class="form-group row">
		<label id="elh_pharmacy_pharled_DCID" for="x_DCID" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DCID->caption() ?><?php echo ($pharmacy_pharled->DCID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DCID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DCID">
<input type="text" data-table="pharmacy_pharled" data-field="x_DCID" name="x_DCID" id="x_DCID" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DCID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DCID->EditValue ?>"<?php echo $pharmacy_pharled->DCID->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->DCID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->MODDT->Visible) { // MODDT ?>
	<div id="r_MODDT" class="form-group row">
		<label id="elh_pharmacy_pharled_MODDT" for="x_MODDT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->MODDT->caption() ?><?php echo ($pharmacy_pharled->MODDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->MODDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MODDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_MODDT" name="x_MODDT" id="x_MODDT" placeholder="<?php echo HtmlEncode($pharmacy_pharled->MODDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->MODDT->EditValue ?>"<?php echo $pharmacy_pharled->MODDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->MODDT->ReadOnly && !$pharmacy_pharled->MODDT->Disabled && !isset($pharmacy_pharled->MODDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->MODDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharlededit", "x_MODDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_pharled->MODDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->FYM->Visible) { // FYM ?>
	<div id="r_FYM" class="form-group row">
		<label id="elh_pharmacy_pharled_FYM" for="x_FYM" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->FYM->caption() ?><?php echo ($pharmacy_pharled->FYM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->FYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_FYM">
<input type="text" data-table="pharmacy_pharled" data-field="x_FYM" name="x_FYM" id="x_FYM" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->FYM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->FYM->EditValue ?>"<?php echo $pharmacy_pharled->FYM->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->FYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PRCBATCH->Visible) { // PRCBATCH ?>
	<div id="r_PRCBATCH" class="form-group row">
		<label id="elh_pharmacy_pharled_PRCBATCH" for="x_PRCBATCH" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PRCBATCH->caption() ?><?php echo ($pharmacy_pharled->PRCBATCH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PRCBATCH->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRCBATCH">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRCBATCH" name="x_PRCBATCH" id="x_PRCBATCH" size="30" maxlength="23" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PRCBATCH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PRCBATCH->EditValue ?>"<?php echo $pharmacy_pharled->PRCBATCH->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PRCBATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_pharled_MRP" for="x_MRP" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->MRP->caption() ?><?php echo ($pharmacy_pharled->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->MRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MRP">
<input type="text" data-table="pharmacy_pharled" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->MRP->EditValue ?>"<?php echo $pharmacy_pharled->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->BILLYM->Visible) { // BILLYM ?>
	<div id="r_BILLYM" class="form-group row">
		<label id="elh_pharmacy_pharled_BILLYM" for="x_BILLYM" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->BILLYM->caption() ?><?php echo ($pharmacy_pharled->BILLYM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->BILLYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLYM">
<input type="text" data-table="pharmacy_pharled" data-field="x_BILLYM" name="x_BILLYM" id="x_BILLYM" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BILLYM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BILLYM->EditValue ?>"<?php echo $pharmacy_pharled->BILLYM->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->BILLYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->BILLGRP->Visible) { // BILLGRP ?>
	<div id="r_BILLGRP" class="form-group row">
		<label id="elh_pharmacy_pharled_BILLGRP" for="x_BILLGRP" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->BILLGRP->caption() ?><?php echo ($pharmacy_pharled->BILLGRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->BILLGRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLGRP">
<input type="text" data-table="pharmacy_pharled" data-field="x_BILLGRP" name="x_BILLGRP" id="x_BILLGRP" size="30" maxlength="21" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BILLGRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BILLGRP->EditValue ?>"<?php echo $pharmacy_pharled->BILLGRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->BILLGRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->STAFF->Visible) { // STAFF ?>
	<div id="r_STAFF" class="form-group row">
		<label id="elh_pharmacy_pharled_STAFF" for="x_STAFF" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->STAFF->caption() ?><?php echo ($pharmacy_pharled->STAFF->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->STAFF->cellAttributes() ?>>
<span id="el_pharmacy_pharled_STAFF">
<input type="text" data-table="pharmacy_pharled" data-field="x_STAFF" name="x_STAFF" id="x_STAFF" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($pharmacy_pharled->STAFF->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->STAFF->EditValue ?>"<?php echo $pharmacy_pharled->STAFF->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->STAFF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<div id="r_TEMPIPNO" class="form-group row">
		<label id="elh_pharmacy_pharled_TEMPIPNO" for="x_TEMPIPNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->TEMPIPNO->caption() ?><?php echo ($pharmacy_pharled->TEMPIPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->TEMPIPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TEMPIPNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_TEMPIPNO" name="x_TEMPIPNO" id="x_TEMPIPNO" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($pharmacy_pharled->TEMPIPNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->TEMPIPNO->EditValue ?>"<?php echo $pharmacy_pharled->TEMPIPNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->TEMPIPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PRNTED->Visible) { // PRNTED ?>
	<div id="r_PRNTED" class="form-group row">
		<label id="elh_pharmacy_pharled_PRNTED" for="x_PRNTED" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PRNTED->caption() ?><?php echo ($pharmacy_pharled->PRNTED->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PRNTED->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRNTED">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRNTED" name="x_PRNTED" id="x_PRNTED" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PRNTED->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PRNTED->EditValue ?>"<?php echo $pharmacy_pharled->PRNTED->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PRNTED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PATNAME->Visible) { // PATNAME ?>
	<div id="r_PATNAME" class="form-group row">
		<label id="elh_pharmacy_pharled_PATNAME" for="x_PATNAME" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PATNAME->caption() ?><?php echo ($pharmacy_pharled->PATNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PATNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PATNAME">
<input type="text" data-table="pharmacy_pharled" data-field="x_PATNAME" name="x_PATNAME" id="x_PATNAME" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PATNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PATNAME->EditValue ?>"<?php echo $pharmacy_pharled->PATNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PATNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PJVNO->Visible) { // PJVNO ?>
	<div id="r_PJVNO" class="form-group row">
		<label id="elh_pharmacy_pharled_PJVNO" for="x_PJVNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PJVNO->caption() ?><?php echo ($pharmacy_pharled->PJVNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PJVNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_PJVNO" name="x_PJVNO" id="x_PJVNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PJVNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PJVNO->EditValue ?>"<?php echo $pharmacy_pharled->PJVNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PJVNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PJVSLNO->Visible) { // PJVSLNO ?>
	<div id="r_PJVSLNO" class="form-group row">
		<label id="elh_pharmacy_pharled_PJVSLNO" for="x_PJVSLNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PJVSLNO->caption() ?><?php echo ($pharmacy_pharled->PJVSLNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PJVSLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVSLNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_PJVSLNO" name="x_PJVSLNO" id="x_PJVSLNO" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PJVSLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PJVSLNO->EditValue ?>"<?php echo $pharmacy_pharled->PJVSLNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PJVSLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->OTHDISC->Visible) { // OTHDISC ?>
	<div id="r_OTHDISC" class="form-group row">
		<label id="elh_pharmacy_pharled_OTHDISC" for="x_OTHDISC" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->OTHDISC->caption() ?><?php echo ($pharmacy_pharled->OTHDISC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->OTHDISC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OTHDISC">
<input type="text" data-table="pharmacy_pharled" data-field="x_OTHDISC" name="x_OTHDISC" id="x_OTHDISC" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->OTHDISC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->OTHDISC->EditValue ?>"<?php echo $pharmacy_pharled->OTHDISC->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->OTHDISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PJVYM->Visible) { // PJVYM ?>
	<div id="r_PJVYM" class="form-group row">
		<label id="elh_pharmacy_pharled_PJVYM" for="x_PJVYM" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PJVYM->caption() ?><?php echo ($pharmacy_pharled->PJVYM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PJVYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVYM">
<input type="text" data-table="pharmacy_pharled" data-field="x_PJVYM" name="x_PJVYM" id="x_PJVYM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PJVYM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PJVYM->EditValue ?>"<?php echo $pharmacy_pharled->PJVYM->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PJVYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PURDISCPER->Visible) { // PURDISCPER ?>
	<div id="r_PURDISCPER" class="form-group row">
		<label id="elh_pharmacy_pharled_PURDISCPER" for="x_PURDISCPER" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PURDISCPER->caption() ?><?php echo ($pharmacy_pharled->PURDISCPER->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PURDISCPER->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURDISCPER">
<input type="text" data-table="pharmacy_pharled" data-field="x_PURDISCPER" name="x_PURDISCPER" id="x_PURDISCPER" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PURDISCPER->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PURDISCPER->EditValue ?>"<?php echo $pharmacy_pharled->PURDISCPER->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PURDISCPER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->CASHIER->Visible) { // CASHIER ?>
	<div id="r_CASHIER" class="form-group row">
		<label id="elh_pharmacy_pharled_CASHIER" for="x_CASHIER" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->CASHIER->caption() ?><?php echo ($pharmacy_pharled->CASHIER->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->CASHIER->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHIER">
<input type="text" data-table="pharmacy_pharled" data-field="x_CASHIER" name="x_CASHIER" id="x_CASHIER" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_pharled->CASHIER->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->CASHIER->EditValue ?>"<?php echo $pharmacy_pharled->CASHIER->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->CASHIER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->CASHTIME->Visible) { // CASHTIME ?>
	<div id="r_CASHTIME" class="form-group row">
		<label id="elh_pharmacy_pharled_CASHTIME" for="x_CASHTIME" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->CASHTIME->caption() ?><?php echo ($pharmacy_pharled->CASHTIME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->CASHTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHTIME">
<input type="text" data-table="pharmacy_pharled" data-field="x_CASHTIME" name="x_CASHTIME" id="x_CASHTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->CASHTIME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->CASHTIME->EditValue ?>"<?php echo $pharmacy_pharled->CASHTIME->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->CASHTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->CASHRECD->Visible) { // CASHRECD ?>
	<div id="r_CASHRECD" class="form-group row">
		<label id="elh_pharmacy_pharled_CASHRECD" for="x_CASHRECD" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->CASHRECD->caption() ?><?php echo ($pharmacy_pharled->CASHRECD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->CASHRECD->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHRECD">
<input type="text" data-table="pharmacy_pharled" data-field="x_CASHRECD" name="x_CASHRECD" id="x_CASHRECD" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->CASHRECD->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->CASHRECD->EditValue ?>"<?php echo $pharmacy_pharled->CASHRECD->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->CASHRECD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->CASHREFNO->Visible) { // CASHREFNO ?>
	<div id="r_CASHREFNO" class="form-group row">
		<label id="elh_pharmacy_pharled_CASHREFNO" for="x_CASHREFNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->CASHREFNO->caption() ?><?php echo ($pharmacy_pharled->CASHREFNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->CASHREFNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHREFNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_CASHREFNO" name="x_CASHREFNO" id="x_CASHREFNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_pharled->CASHREFNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->CASHREFNO->EditValue ?>"<?php echo $pharmacy_pharled->CASHREFNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->CASHREFNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<div id="r_CASHIERSHIFT" class="form-group row">
		<label id="elh_pharmacy_pharled_CASHIERSHIFT" for="x_CASHIERSHIFT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->CASHIERSHIFT->caption() ?><?php echo ($pharmacy_pharled->CASHIERSHIFT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHIERSHIFT">
<input type="text" data-table="pharmacy_pharled" data-field="x_CASHIERSHIFT" name="x_CASHIERSHIFT" id="x_CASHIERSHIFT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_pharled->CASHIERSHIFT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->CASHIERSHIFT->EditValue ?>"<?php echo $pharmacy_pharled->CASHIERSHIFT->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->CASHIERSHIFT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label id="elh_pharmacy_pharled_PRCODE" for="x_PRCODE" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PRCODE->caption() ?><?php echo ($pharmacy_pharled->PRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRCODE">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PRCODE->EditValue ?>"<?php echo $pharmacy_pharled->PRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->RELEASEBY->Visible) { // RELEASEBY ?>
	<div id="r_RELEASEBY" class="form-group row">
		<label id="elh_pharmacy_pharled_RELEASEBY" for="x_RELEASEBY" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->RELEASEBY->caption() ?><?php echo ($pharmacy_pharled->RELEASEBY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->RELEASEBY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RELEASEBY">
<input type="text" data-table="pharmacy_pharled" data-field="x_RELEASEBY" name="x_RELEASEBY" id="x_RELEASEBY" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RELEASEBY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RELEASEBY->EditValue ?>"<?php echo $pharmacy_pharled->RELEASEBY->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->RELEASEBY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<div id="r_CRAUTHOR" class="form-group row">
		<label id="elh_pharmacy_pharled_CRAUTHOR" for="x_CRAUTHOR" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->CRAUTHOR->caption() ?><?php echo ($pharmacy_pharled->CRAUTHOR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->CRAUTHOR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CRAUTHOR">
<input type="text" data-table="pharmacy_pharled" data-field="x_CRAUTHOR" name="x_CRAUTHOR" id="x_CRAUTHOR" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_pharled->CRAUTHOR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->CRAUTHOR->EditValue ?>"<?php echo $pharmacy_pharled->CRAUTHOR->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->CRAUTHOR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PAYMENT->Visible) { // PAYMENT ?>
	<div id="r_PAYMENT" class="form-group row">
		<label id="elh_pharmacy_pharled_PAYMENT" for="x_PAYMENT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PAYMENT->caption() ?><?php echo ($pharmacy_pharled->PAYMENT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PAYMENT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PAYMENT">
<input type="text" data-table="pharmacy_pharled" data-field="x_PAYMENT" name="x_PAYMENT" id="x_PAYMENT" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PAYMENT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PAYMENT->EditValue ?>"<?php echo $pharmacy_pharled->PAYMENT->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PAYMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label id="elh_pharmacy_pharled_DRID" for="x_DRID" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DRID->caption() ?><?php echo ($pharmacy_pharled->DRID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DRID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DRID">
<input type="text" data-table="pharmacy_pharled" data-field="x_DRID" name="x_DRID" id="x_DRID" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DRID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DRID->EditValue ?>"<?php echo $pharmacy_pharled->DRID->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->DRID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->WARD->Visible) { // WARD ?>
	<div id="r_WARD" class="form-group row">
		<label id="elh_pharmacy_pharled_WARD" for="x_WARD" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->WARD->caption() ?><?php echo ($pharmacy_pharled->WARD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->WARD->cellAttributes() ?>>
<span id="el_pharmacy_pharled_WARD">
<input type="text" data-table="pharmacy_pharled" data-field="x_WARD" name="x_WARD" id="x_WARD" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->WARD->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->WARD->EditValue ?>"<?php echo $pharmacy_pharled->WARD->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->WARD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->STAXTYPE->Visible) { // STAXTYPE ?>
	<div id="r_STAXTYPE" class="form-group row">
		<label id="elh_pharmacy_pharled_STAXTYPE" for="x_STAXTYPE" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->STAXTYPE->caption() ?><?php echo ($pharmacy_pharled->STAXTYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->STAXTYPE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_STAXTYPE">
<input type="text" data-table="pharmacy_pharled" data-field="x_STAXTYPE" name="x_STAXTYPE" id="x_STAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_pharled->STAXTYPE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->STAXTYPE->EditValue ?>"<?php echo $pharmacy_pharled->STAXTYPE->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->STAXTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<div id="r_PURDISCVAL" class="form-group row">
		<label id="elh_pharmacy_pharled_PURDISCVAL" for="x_PURDISCVAL" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PURDISCVAL->caption() ?><?php echo ($pharmacy_pharled->PURDISCVAL->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PURDISCVAL->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURDISCVAL">
<input type="text" data-table="pharmacy_pharled" data-field="x_PURDISCVAL" name="x_PURDISCVAL" id="x_PURDISCVAL" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PURDISCVAL->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PURDISCVAL->EditValue ?>"<?php echo $pharmacy_pharled->PURDISCVAL->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PURDISCVAL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->RNDOFF->Visible) { // RNDOFF ?>
	<div id="r_RNDOFF" class="form-group row">
		<label id="elh_pharmacy_pharled_RNDOFF" for="x_RNDOFF" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->RNDOFF->caption() ?><?php echo ($pharmacy_pharled->RNDOFF->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->RNDOFF->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RNDOFF">
<input type="text" data-table="pharmacy_pharled" data-field="x_RNDOFF" name="x_RNDOFF" id="x_RNDOFF" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RNDOFF->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RNDOFF->EditValue ?>"<?php echo $pharmacy_pharled->RNDOFF->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->RNDOFF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DISCONMRP->Visible) { // DISCONMRP ?>
	<div id="r_DISCONMRP" class="form-group row">
		<label id="elh_pharmacy_pharled_DISCONMRP" for="x_DISCONMRP" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DISCONMRP->caption() ?><?php echo ($pharmacy_pharled->DISCONMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DISCONMRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DISCONMRP">
<input type="text" data-table="pharmacy_pharled" data-field="x_DISCONMRP" name="x_DISCONMRP" id="x_DISCONMRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DISCONMRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DISCONMRP->EditValue ?>"<?php echo $pharmacy_pharled->DISCONMRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->DISCONMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DELVDT->Visible) { // DELVDT ?>
	<div id="r_DELVDT" class="form-group row">
		<label id="elh_pharmacy_pharled_DELVDT" for="x_DELVDT" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DELVDT->caption() ?><?php echo ($pharmacy_pharled->DELVDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DELVDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DELVDT" name="x_DELVDT" id="x_DELVDT" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DELVDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DELVDT->EditValue ?>"<?php echo $pharmacy_pharled->DELVDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->DELVDT->ReadOnly && !$pharmacy_pharled->DELVDT->Disabled && !isset($pharmacy_pharled->DELVDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->DELVDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharlededit", "x_DELVDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_pharled->DELVDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DELVTIME->Visible) { // DELVTIME ?>
	<div id="r_DELVTIME" class="form-group row">
		<label id="elh_pharmacy_pharled_DELVTIME" for="x_DELVTIME" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DELVTIME->caption() ?><?php echo ($pharmacy_pharled->DELVTIME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DELVTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVTIME">
<input type="text" data-table="pharmacy_pharled" data-field="x_DELVTIME" name="x_DELVTIME" id="x_DELVTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DELVTIME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DELVTIME->EditValue ?>"<?php echo $pharmacy_pharled->DELVTIME->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->DELVTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->DELVBY->Visible) { // DELVBY ?>
	<div id="r_DELVBY" class="form-group row">
		<label id="elh_pharmacy_pharled_DELVBY" for="x_DELVBY" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->DELVBY->caption() ?><?php echo ($pharmacy_pharled->DELVBY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->DELVBY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVBY">
<input type="text" data-table="pharmacy_pharled" data-field="x_DELVBY" name="x_DELVBY" id="x_DELVBY" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DELVBY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DELVBY->EditValue ?>"<?php echo $pharmacy_pharled->DELVBY->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->DELVBY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->HOSPNO->Visible) { // HOSPNO ?>
	<div id="r_HOSPNO" class="form-group row">
		<label id="elh_pharmacy_pharled_HOSPNO" for="x_HOSPNO" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->HOSPNO->caption() ?><?php echo ($pharmacy_pharled->HOSPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->HOSPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_HOSPNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_HOSPNO" name="x_HOSPNO" id="x_HOSPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled->HOSPNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->HOSPNO->EditValue ?>"<?php echo $pharmacy_pharled->HOSPNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->HOSPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_pharled_id" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->id->caption() ?><?php echo ($pharmacy_pharled->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->id->cellAttributes() ?>>
<span id="el_pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->CurrentValue) ?>">
<?php echo $pharmacy_pharled->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->pbv->Visible) { // pbv ?>
	<div id="r_pbv" class="form-group row">
		<label id="elh_pharmacy_pharled_pbv" for="x_pbv" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->pbv->caption() ?><?php echo ($pharmacy_pharled->pbv->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->pbv->cellAttributes() ?>>
<?php if ($pharmacy_pharled->pbv->getSessionValue() <> "") { ?>
<span id="el_pharmacy_pharled_pbv">
<span<?php echo $pharmacy_pharled->pbv->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->pbv->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_pbv" name="x_pbv" value="<?php echo HtmlEncode($pharmacy_pharled->pbv->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_pharled_pbv">
<input type="text" data-table="pharmacy_pharled" data-field="x_pbv" name="x_pbv" id="x_pbv" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->pbv->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->pbv->EditValue ?>"<?php echo $pharmacy_pharled->pbv->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_pharled->pbv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->pbt->Visible) { // pbt ?>
	<div id="r_pbt" class="form-group row">
		<label id="elh_pharmacy_pharled_pbt" for="x_pbt" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->pbt->caption() ?><?php echo ($pharmacy_pharled->pbt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->pbt->cellAttributes() ?>>
<?php if ($pharmacy_pharled->pbt->getSessionValue() <> "") { ?>
<span id="el_pharmacy_pharled_pbt">
<span<?php echo $pharmacy_pharled->pbt->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->pbt->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_pbt" name="x_pbt" value="<?php echo HtmlEncode($pharmacy_pharled->pbt->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_pharled_pbt">
<input type="text" data-table="pharmacy_pharled" data-field="x_pbt" name="x_pbt" id="x_pbt" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->pbt->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->pbt->EditValue ?>"<?php echo $pharmacy_pharled->pbt->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_pharled->pbt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_pharled_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->MFRCODE->caption() ?><?php echo ($pharmacy_pharled->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MFRCODE">
<input type="text" data-table="pharmacy_pharled" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_pharled->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->MFRCODE->EditValue ?>"<?php echo $pharmacy_pharled->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_pharmacy_pharled_Reception" for="x_Reception" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->Reception->caption() ?><?php echo ($pharmacy_pharled->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->Reception->cellAttributes() ?>>
<?php if ($pharmacy_pharled->Reception->getSessionValue() <> "") { ?>
<span id="el_pharmacy_pharled_Reception">
<span<?php echo $pharmacy_pharled->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($pharmacy_pharled->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_pharled_Reception">
<input type="text" data-table="pharmacy_pharled" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Reception->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Reception->EditValue ?>"<?php echo $pharmacy_pharled->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_pharled->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_pharmacy_pharled_PatID" for="x_PatID" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PatID->caption() ?><?php echo ($pharmacy_pharled->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PatID->cellAttributes() ?>>
<?php if ($pharmacy_pharled->PatID->getSessionValue() <> "") { ?>
<span id="el_pharmacy_pharled_PatID">
<span<?php echo $pharmacy_pharled->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_PatID" name="x_PatID" value="<?php echo HtmlEncode($pharmacy_pharled->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_pharled_PatID">
<input type="text" data-table="pharmacy_pharled" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PatID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PatID->EditValue ?>"<?php echo $pharmacy_pharled->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_pharled->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_pharmacy_pharled_mrnno" for="x_mrnno" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->mrnno->caption() ?><?php echo ($pharmacy_pharled->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->mrnno->cellAttributes() ?>>
<?php if ($pharmacy_pharled->mrnno->getSessionValue() <> "") { ?>
<span id="el_pharmacy_pharled_mrnno">
<span<?php echo $pharmacy_pharled->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($pharmacy_pharled->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_pharled_mrnno">
<input type="text" data-table="pharmacy_pharled" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_pharled->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->mrnno->EditValue ?>"<?php echo $pharmacy_pharled->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_pharled->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->sretid->Visible) { // sretid ?>
	<div id="r_sretid" class="form-group row">
		<label id="elh_pharmacy_pharled_sretid" for="x_sretid" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->sretid->caption() ?><?php echo ($pharmacy_pharled->sretid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->sretid->cellAttributes() ?>>
<span id="el_pharmacy_pharled_sretid">
<input type="text" data-table="pharmacy_pharled" data-field="x_sretid" name="x_sretid" id="x_sretid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->sretid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->sretid->EditValue ?>"<?php echo $pharmacy_pharled->sretid->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->sretid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->sprid->Visible) { // sprid ?>
	<div id="r_sprid" class="form-group row">
		<label id="elh_pharmacy_pharled_sprid" for="x_sprid" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->sprid->caption() ?><?php echo ($pharmacy_pharled->sprid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->sprid->cellAttributes() ?>>
<span id="el_pharmacy_pharled_sprid">
<input type="text" data-table="pharmacy_pharled" data-field="x_sprid" name="x_sprid" id="x_sprid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->sprid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->sprid->EditValue ?>"<?php echo $pharmacy_pharled->sprid->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->sprid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
	<div id="r_baid" class="form-group row">
		<label id="elh_pharmacy_pharled_baid" for="x_baid" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->baid->caption() ?><?php echo ($pharmacy_pharled->baid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->baid->cellAttributes() ?>>
<span id="el_pharmacy_pharled_baid">
<input type="text" data-table="pharmacy_pharled" data-field="x_baid" name="x_baid" id="x_baid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->baid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->baid->EditValue ?>"<?php echo $pharmacy_pharled->baid->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->baid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_pharled_PSGST" for="x_PSGST" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PSGST->caption() ?><?php echo ($pharmacy_pharled->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PSGST->EditValue ?>"<?php echo $pharmacy_pharled->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_pharled_PCGST" for="x_PCGST" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PCGST->caption() ?><?php echo ($pharmacy_pharled->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PCGST->EditValue ?>"<?php echo $pharmacy_pharled->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_pharled_SSGST" for="x_SSGST" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->SSGST->caption() ?><?php echo ($pharmacy_pharled->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SSGST->EditValue ?>"<?php echo $pharmacy_pharled->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_pharled_SCGST" for="x_SCGST" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->SCGST->caption() ?><?php echo ($pharmacy_pharled->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SCGST->EditValue ?>"<?php echo $pharmacy_pharled->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_pharmacy_pharled_PurValue" for="x_PurValue" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PurValue->caption() ?><?php echo ($pharmacy_pharled->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PurValue">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurValue->EditValue ?>"<?php echo $pharmacy_pharled->PurValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label id="elh_pharmacy_pharled_PurRate" for="x_PurRate" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PurRate->caption() ?><?php echo ($pharmacy_pharled->PurRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PurRate->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PurRate">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurRate->EditValue ?>"<?php echo $pharmacy_pharled->PurRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PurRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label id="elh_pharmacy_pharled_PUnit" for="x_PUnit" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->PUnit->caption() ?><?php echo ($pharmacy_pharled->PUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PUnit->EditValue ?>"<?php echo $pharmacy_pharled->PUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->PUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label id="elh_pharmacy_pharled_SUnit" for="x_SUnit" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->SUnit->caption() ?><?php echo ($pharmacy_pharled->SUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SUnit->EditValue ?>"<?php echo $pharmacy_pharled->SUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->SUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
	<div id="r_HSNCODE" class="form-group row">
		<label id="elh_pharmacy_pharled_HSNCODE" for="x_HSNCODE" class="<?php echo $pharmacy_pharled_edit->LeftColumnClass ?>"><?php echo $pharmacy_pharled->HSNCODE->caption() ?><?php echo ($pharmacy_pharled->HSNCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_pharled_edit->RightColumnClass ?>"><div<?php echo $pharmacy_pharled->HSNCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_HSNCODE">
<input type="text" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x_HSNCODE" id="x_HSNCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->HSNCODE->EditValue ?>"<?php echo $pharmacy_pharled->HSNCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_pharled->HSNCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_pharled_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_pharled_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_pharled_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_pharled_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_pharled_edit->terminate();
?>