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
$store_storeled_add = new store_storeled_add();

// Run the page
$store_storeled_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storeled_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fstore_storeledadd = currentForm = new ew.Form("fstore_storeledadd", "add");

// Validate form
fstore_storeledadd.validate = function() {
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
		<?php if ($store_storeled_add->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->BRCODE->caption(), $store_storeled->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->BRCODE->errorMessage()) ?>");
		<?php if ($store_storeled_add->TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->TYPE->caption(), $store_storeled->TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->DN->Required) { ?>
			elm = this.getElements("x" + infix + "_DN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DN->caption(), $store_storeled->DN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->RDN->Required) { ?>
			elm = this.getElements("x" + infix + "_RDN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->RDN->caption(), $store_storeled->RDN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DT->caption(), $store_storeled->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->DT->errorMessage()) ?>");
		<?php if ($store_storeled_add->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PRC->caption(), $store_storeled->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->OQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->OQ->caption(), $store_storeled->OQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->OQ->errorMessage()) ?>");
		<?php if ($store_storeled_add->RQ->Required) { ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->RQ->caption(), $store_storeled->RQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->RQ->errorMessage()) ?>");
		<?php if ($store_storeled_add->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->MRQ->caption(), $store_storeled->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->MRQ->errorMessage()) ?>");
		<?php if ($store_storeled_add->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->IQ->caption(), $store_storeled->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->IQ->errorMessage()) ?>");
		<?php if ($store_storeled_add->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->BATCHNO->caption(), $store_storeled->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->EXPDT->caption(), $store_storeled->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->EXPDT->errorMessage()) ?>");
		<?php if ($store_storeled_add->BILLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->BILLNO->caption(), $store_storeled->BILLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->BILLDT->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->BILLDT->caption(), $store_storeled->BILLDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->BILLDT->errorMessage()) ?>");
		<?php if ($store_storeled_add->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->RT->caption(), $store_storeled->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->RT->errorMessage()) ?>");
		<?php if ($store_storeled_add->VALUE->Required) { ?>
			elm = this.getElements("x" + infix + "_VALUE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->VALUE->caption(), $store_storeled->VALUE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_VALUE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->VALUE->errorMessage()) ?>");
		<?php if ($store_storeled_add->DISC->Required) { ?>
			elm = this.getElements("x" + infix + "_DISC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DISC->caption(), $store_storeled->DISC->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DISC");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->DISC->errorMessage()) ?>");
		<?php if ($store_storeled_add->TAXP->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->TAXP->caption(), $store_storeled->TAXP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->TAXP->errorMessage()) ?>");
		<?php if ($store_storeled_add->TAX->Required) { ?>
			elm = this.getElements("x" + infix + "_TAX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->TAX->caption(), $store_storeled->TAX->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAX");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->TAX->errorMessage()) ?>");
		<?php if ($store_storeled_add->TAXR->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->TAXR->caption(), $store_storeled->TAXR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->TAXR->errorMessage()) ?>");
		<?php if ($store_storeled_add->DAMT->Required) { ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DAMT->caption(), $store_storeled->DAMT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->DAMT->errorMessage()) ?>");
		<?php if ($store_storeled_add->EMPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_EMPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->EMPNO->caption(), $store_storeled->EMPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PC->caption(), $store_storeled->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->DRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_DRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DRNAME->caption(), $store_storeled->DRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->BTIME->Required) { ?>
			elm = this.getElements("x" + infix + "_BTIME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->BTIME->caption(), $store_storeled->BTIME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->ONO->Required) { ?>
			elm = this.getElements("x" + infix + "_ONO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->ONO->caption(), $store_storeled->ONO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->ODT->Required) { ?>
			elm = this.getElements("x" + infix + "_ODT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->ODT->caption(), $store_storeled->ODT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ODT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->ODT->errorMessage()) ?>");
		<?php if ($store_storeled_add->PURRT->Required) { ?>
			elm = this.getElements("x" + infix + "_PURRT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PURRT->caption(), $store_storeled->PURRT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PURRT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->PURRT->errorMessage()) ?>");
		<?php if ($store_storeled_add->GRP->Required) { ?>
			elm = this.getElements("x" + infix + "_GRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->GRP->caption(), $store_storeled->GRP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->IBATCH->Required) { ?>
			elm = this.getElements("x" + infix + "_IBATCH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->IBATCH->caption(), $store_storeled->IBATCH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->IPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_IPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->IPNO->caption(), $store_storeled->IPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->OPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_OPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->OPNO->caption(), $store_storeled->OPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->RECID->Required) { ?>
			elm = this.getElements("x" + infix + "_RECID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->RECID->caption(), $store_storeled->RECID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->FQTY->Required) { ?>
			elm = this.getElements("x" + infix + "_FQTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->FQTY->caption(), $store_storeled->FQTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FQTY");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->FQTY->errorMessage()) ?>");
		<?php if ($store_storeled_add->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->UR->caption(), $store_storeled->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->UR->errorMessage()) ?>");
		<?php if ($store_storeled_add->DCID->Required) { ?>
			elm = this.getElements("x" + infix + "_DCID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DCID->caption(), $store_storeled->DCID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->_USERID->Required) { ?>
			elm = this.getElements("x" + infix + "__USERID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->_USERID->caption(), $store_storeled->_USERID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->MODDT->Required) { ?>
			elm = this.getElements("x" + infix + "_MODDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->MODDT->caption(), $store_storeled->MODDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MODDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->MODDT->errorMessage()) ?>");
		<?php if ($store_storeled_add->FYM->Required) { ?>
			elm = this.getElements("x" + infix + "_FYM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->FYM->caption(), $store_storeled->FYM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->PRCBATCH->Required) { ?>
			elm = this.getElements("x" + infix + "_PRCBATCH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PRCBATCH->caption(), $store_storeled->PRCBATCH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->SLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->SLNO->caption(), $store_storeled->SLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->SLNO->errorMessage()) ?>");
		<?php if ($store_storeled_add->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->MRP->caption(), $store_storeled->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->MRP->errorMessage()) ?>");
		<?php if ($store_storeled_add->BILLYM->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLYM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->BILLYM->caption(), $store_storeled->BILLYM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->BILLGRP->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLGRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->BILLGRP->caption(), $store_storeled->BILLGRP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->STAFF->Required) { ?>
			elm = this.getElements("x" + infix + "_STAFF");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->STAFF->caption(), $store_storeled->STAFF->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->TEMPIPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_TEMPIPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->TEMPIPNO->caption(), $store_storeled->TEMPIPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->PRNTED->Required) { ?>
			elm = this.getElements("x" + infix + "_PRNTED");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PRNTED->caption(), $store_storeled->PRNTED->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->PATNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_PATNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PATNAME->caption(), $store_storeled->PATNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->PJVNO->Required) { ?>
			elm = this.getElements("x" + infix + "_PJVNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PJVNO->caption(), $store_storeled->PJVNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->PJVSLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_PJVSLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PJVSLNO->caption(), $store_storeled->PJVSLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->OTHDISC->Required) { ?>
			elm = this.getElements("x" + infix + "_OTHDISC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->OTHDISC->caption(), $store_storeled->OTHDISC->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OTHDISC");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->OTHDISC->errorMessage()) ?>");
		<?php if ($store_storeled_add->PJVYM->Required) { ?>
			elm = this.getElements("x" + infix + "_PJVYM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PJVYM->caption(), $store_storeled->PJVYM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->PURDISCPER->Required) { ?>
			elm = this.getElements("x" + infix + "_PURDISCPER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PURDISCPER->caption(), $store_storeled->PURDISCPER->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PURDISCPER");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->PURDISCPER->errorMessage()) ?>");
		<?php if ($store_storeled_add->CASHIER->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHIER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->CASHIER->caption(), $store_storeled->CASHIER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->CASHTIME->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHTIME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->CASHTIME->caption(), $store_storeled->CASHTIME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->CASHRECD->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHRECD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->CASHRECD->caption(), $store_storeled->CASHRECD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CASHRECD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->CASHRECD->errorMessage()) ?>");
		<?php if ($store_storeled_add->CASHREFNO->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHREFNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->CASHREFNO->caption(), $store_storeled->CASHREFNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->CASHIERSHIFT->Required) { ?>
			elm = this.getElements("x" + infix + "_CASHIERSHIFT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->CASHIERSHIFT->caption(), $store_storeled->CASHIERSHIFT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->PRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_PRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PRCODE->caption(), $store_storeled->PRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->RELEASEBY->Required) { ?>
			elm = this.getElements("x" + infix + "_RELEASEBY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->RELEASEBY->caption(), $store_storeled->RELEASEBY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->CRAUTHOR->Required) { ?>
			elm = this.getElements("x" + infix + "_CRAUTHOR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->CRAUTHOR->caption(), $store_storeled->CRAUTHOR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->PAYMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_PAYMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PAYMENT->caption(), $store_storeled->PAYMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->DRID->Required) { ?>
			elm = this.getElements("x" + infix + "_DRID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DRID->caption(), $store_storeled->DRID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->WARD->Required) { ?>
			elm = this.getElements("x" + infix + "_WARD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->WARD->caption(), $store_storeled->WARD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->STAXTYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_STAXTYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->STAXTYPE->caption(), $store_storeled->STAXTYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->PURDISCVAL->Required) { ?>
			elm = this.getElements("x" + infix + "_PURDISCVAL");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PURDISCVAL->caption(), $store_storeled->PURDISCVAL->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PURDISCVAL");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->PURDISCVAL->errorMessage()) ?>");
		<?php if ($store_storeled_add->RNDOFF->Required) { ?>
			elm = this.getElements("x" + infix + "_RNDOFF");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->RNDOFF->caption(), $store_storeled->RNDOFF->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RNDOFF");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->RNDOFF->errorMessage()) ?>");
		<?php if ($store_storeled_add->DISCONMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_DISCONMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DISCONMRP->caption(), $store_storeled->DISCONMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DISCONMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->DISCONMRP->errorMessage()) ?>");
		<?php if ($store_storeled_add->DELVDT->Required) { ?>
			elm = this.getElements("x" + infix + "_DELVDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DELVDT->caption(), $store_storeled->DELVDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DELVDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->DELVDT->errorMessage()) ?>");
		<?php if ($store_storeled_add->DELVTIME->Required) { ?>
			elm = this.getElements("x" + infix + "_DELVTIME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DELVTIME->caption(), $store_storeled->DELVTIME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->DELVBY->Required) { ?>
			elm = this.getElements("x" + infix + "_DELVBY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->DELVBY->caption(), $store_storeled->DELVBY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->HOSPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_HOSPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->HOSPNO->caption(), $store_storeled->HOSPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->pbv->Required) { ?>
			elm = this.getElements("x" + infix + "_pbv");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->pbv->caption(), $store_storeled->pbv->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pbv");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->pbv->errorMessage()) ?>");
		<?php if ($store_storeled_add->pbt->Required) { ?>
			elm = this.getElements("x" + infix + "_pbt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->pbt->caption(), $store_storeled->pbt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pbt");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->pbt->errorMessage()) ?>");
		<?php if ($store_storeled_add->SiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->SiNo->caption(), $store_storeled->SiNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->SiNo->errorMessage()) ?>");
		<?php if ($store_storeled_add->Product->Required) { ?>
			elm = this.getElements("x" + infix + "_Product");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->Product->caption(), $store_storeled->Product->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->Mfg->Required) { ?>
			elm = this.getElements("x" + infix + "_Mfg");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->Mfg->caption(), $store_storeled->Mfg->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->HosoID->Required) { ?>
			elm = this.getElements("x" + infix + "_HosoID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->HosoID->caption(), $store_storeled->HosoID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HosoID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->HosoID->errorMessage()) ?>");
		<?php if ($store_storeled_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->createdby->caption(), $store_storeled->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->createddatetime->caption(), $store_storeled->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->createddatetime->errorMessage()) ?>");
		<?php if ($store_storeled_add->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->modifiedby->caption(), $store_storeled->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->modifieddatetime->caption(), $store_storeled->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->modifieddatetime->errorMessage()) ?>");
		<?php if ($store_storeled_add->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->MFRCODE->caption(), $store_storeled->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->Reception->caption(), $store_storeled->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->Reception->errorMessage()) ?>");
		<?php if ($store_storeled_add->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->PatID->caption(), $store_storeled->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->PatID->errorMessage()) ?>");
		<?php if ($store_storeled_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->mrnno->caption(), $store_storeled->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->BRNAME->caption(), $store_storeled->BRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storeled_add->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled->StoreID->caption(), $store_storeled->StoreID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storeled->StoreID->errorMessage()) ?>");

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
fstore_storeledadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_storeledadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_storeled_add->showPageHeader(); ?>
<?php
$store_storeled_add->showMessage();
?>
<form name="fstore_storeledadd" id="fstore_storeledadd" class="<?php echo $store_storeled_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_storeled_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_storeled_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storeled">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$store_storeled_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($store_storeled->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_store_storeled_BRCODE" for="x_BRCODE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->BRCODE->caption() ?><?php echo ($store_storeled->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->BRCODE->cellAttributes() ?>>
<span id="el_store_storeled_BRCODE">
<input type="text" data-table="store_storeled" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($store_storeled->BRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storeled->BRCODE->EditValue ?>"<?php echo $store_storeled->BRCODE->editAttributes() ?>>
</span>
<?php echo $store_storeled->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label id="elh_store_storeled_TYPE" for="x_TYPE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->TYPE->caption() ?><?php echo ($store_storeled->TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->TYPE->cellAttributes() ?>>
<span id="el_store_storeled_TYPE">
<input type="text" data-table="store_storeled" data-field="x_TYPE" name="x_TYPE" id="x_TYPE" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($store_storeled->TYPE->getPlaceHolder()) ?>" value="<?php echo $store_storeled->TYPE->EditValue ?>"<?php echo $store_storeled->TYPE->editAttributes() ?>>
</span>
<?php echo $store_storeled->TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DN->Visible) { // DN ?>
	<div id="r_DN" class="form-group row">
		<label id="elh_store_storeled_DN" for="x_DN" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DN->caption() ?><?php echo ($store_storeled->DN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DN->cellAttributes() ?>>
<span id="el_store_storeled_DN">
<input type="text" data-table="store_storeled" data-field="x_DN" name="x_DN" id="x_DN" size="30" maxlength="46" placeholder="<?php echo HtmlEncode($store_storeled->DN->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DN->EditValue ?>"<?php echo $store_storeled->DN->editAttributes() ?>>
</span>
<?php echo $store_storeled->DN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->RDN->Visible) { // RDN ?>
	<div id="r_RDN" class="form-group row">
		<label id="elh_store_storeled_RDN" for="x_RDN" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->RDN->caption() ?><?php echo ($store_storeled->RDN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->RDN->cellAttributes() ?>>
<span id="el_store_storeled_RDN">
<input type="text" data-table="store_storeled" data-field="x_RDN" name="x_RDN" id="x_RDN" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($store_storeled->RDN->getPlaceHolder()) ?>" value="<?php echo $store_storeled->RDN->EditValue ?>"<?php echo $store_storeled->RDN->editAttributes() ?>>
</span>
<?php echo $store_storeled->RDN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_store_storeled_DT" for="x_DT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DT->caption() ?><?php echo ($store_storeled->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DT->cellAttributes() ?>>
<span id="el_store_storeled_DT">
<input type="text" data-table="store_storeled" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($store_storeled->DT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DT->EditValue ?>"<?php echo $store_storeled->DT->editAttributes() ?>>
<?php if (!$store_storeled->DT->ReadOnly && !$store_storeled->DT->Disabled && !isset($store_storeled->DT->EditAttrs["readonly"]) && !isset($store_storeled->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storeledadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_storeled->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_store_storeled_PRC" for="x_PRC" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PRC->caption() ?><?php echo ($store_storeled->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PRC->cellAttributes() ?>>
<span id="el_store_storeled_PRC">
<input type="text" data-table="store_storeled" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storeled->PRC->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PRC->EditValue ?>"<?php echo $store_storeled->PRC->editAttributes() ?>>
</span>
<?php echo $store_storeled->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_store_storeled_OQ" for="x_OQ" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->OQ->caption() ?><?php echo ($store_storeled->OQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->OQ->cellAttributes() ?>>
<span id="el_store_storeled_OQ">
<input type="text" data-table="store_storeled" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($store_storeled->OQ->getPlaceHolder()) ?>" value="<?php echo $store_storeled->OQ->EditValue ?>"<?php echo $store_storeled->OQ->editAttributes() ?>>
</span>
<?php echo $store_storeled->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_store_storeled_RQ" for="x_RQ" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->RQ->caption() ?><?php echo ($store_storeled->RQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->RQ->cellAttributes() ?>>
<span id="el_store_storeled_RQ">
<input type="text" data-table="store_storeled" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($store_storeled->RQ->getPlaceHolder()) ?>" value="<?php echo $store_storeled->RQ->EditValue ?>"<?php echo $store_storeled->RQ->editAttributes() ?>>
</span>
<?php echo $store_storeled->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_store_storeled_MRQ" for="x_MRQ" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->MRQ->caption() ?><?php echo ($store_storeled->MRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->MRQ->cellAttributes() ?>>
<span id="el_store_storeled_MRQ">
<input type="text" data-table="store_storeled" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($store_storeled->MRQ->getPlaceHolder()) ?>" value="<?php echo $store_storeled->MRQ->EditValue ?>"<?php echo $store_storeled->MRQ->editAttributes() ?>>
</span>
<?php echo $store_storeled->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_store_storeled_IQ" for="x_IQ" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->IQ->caption() ?><?php echo ($store_storeled->IQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->IQ->cellAttributes() ?>>
<span id="el_store_storeled_IQ">
<input type="text" data-table="store_storeled" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($store_storeled->IQ->getPlaceHolder()) ?>" value="<?php echo $store_storeled->IQ->EditValue ?>"<?php echo $store_storeled->IQ->editAttributes() ?>>
</span>
<?php echo $store_storeled->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_store_storeled_BATCHNO" for="x_BATCHNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->BATCHNO->caption() ?><?php echo ($store_storeled->BATCHNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->BATCHNO->cellAttributes() ?>>
<span id="el_store_storeled_BATCHNO">
<input type="text" data-table="store_storeled" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storeled->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->BATCHNO->EditValue ?>"<?php echo $store_storeled->BATCHNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_store_storeled_EXPDT" for="x_EXPDT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->EXPDT->caption() ?><?php echo ($store_storeled->EXPDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->EXPDT->cellAttributes() ?>>
<span id="el_store_storeled_EXPDT">
<input type="text" data-table="store_storeled" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($store_storeled->EXPDT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->EXPDT->EditValue ?>"<?php echo $store_storeled->EXPDT->editAttributes() ?>>
<?php if (!$store_storeled->EXPDT->ReadOnly && !$store_storeled->EXPDT->Disabled && !isset($store_storeled->EXPDT->EditAttrs["readonly"]) && !isset($store_storeled->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storeledadd", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_storeled->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->BILLNO->Visible) { // BILLNO ?>
	<div id="r_BILLNO" class="form-group row">
		<label id="elh_store_storeled_BILLNO" for="x_BILLNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->BILLNO->caption() ?><?php echo ($store_storeled->BILLNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->BILLNO->cellAttributes() ?>>
<span id="el_store_storeled_BILLNO">
<input type="text" data-table="store_storeled" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storeled->BILLNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->BILLNO->EditValue ?>"<?php echo $store_storeled->BILLNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->BILLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label id="elh_store_storeled_BILLDT" for="x_BILLDT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->BILLDT->caption() ?><?php echo ($store_storeled->BILLDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->BILLDT->cellAttributes() ?>>
<span id="el_store_storeled_BILLDT">
<input type="text" data-table="store_storeled" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" placeholder="<?php echo HtmlEncode($store_storeled->BILLDT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->BILLDT->EditValue ?>"<?php echo $store_storeled->BILLDT->editAttributes() ?>>
<?php if (!$store_storeled->BILLDT->ReadOnly && !$store_storeled->BILLDT->Disabled && !isset($store_storeled->BILLDT->EditAttrs["readonly"]) && !isset($store_storeled->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storeledadd", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_storeled->BILLDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_store_storeled_RT" for="x_RT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->RT->caption() ?><?php echo ($store_storeled->RT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->RT->cellAttributes() ?>>
<span id="el_store_storeled_RT">
<input type="text" data-table="store_storeled" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($store_storeled->RT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->RT->EditValue ?>"<?php echo $store_storeled->RT->editAttributes() ?>>
</span>
<?php echo $store_storeled->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->VALUE->Visible) { // VALUE ?>
	<div id="r_VALUE" class="form-group row">
		<label id="elh_store_storeled_VALUE" for="x_VALUE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->VALUE->caption() ?><?php echo ($store_storeled->VALUE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->VALUE->cellAttributes() ?>>
<span id="el_store_storeled_VALUE">
<input type="text" data-table="store_storeled" data-field="x_VALUE" name="x_VALUE" id="x_VALUE" size="30" placeholder="<?php echo HtmlEncode($store_storeled->VALUE->getPlaceHolder()) ?>" value="<?php echo $store_storeled->VALUE->EditValue ?>"<?php echo $store_storeled->VALUE->editAttributes() ?>>
</span>
<?php echo $store_storeled->VALUE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DISC->Visible) { // DISC ?>
	<div id="r_DISC" class="form-group row">
		<label id="elh_store_storeled_DISC" for="x_DISC" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DISC->caption() ?><?php echo ($store_storeled->DISC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DISC->cellAttributes() ?>>
<span id="el_store_storeled_DISC">
<input type="text" data-table="store_storeled" data-field="x_DISC" name="x_DISC" id="x_DISC" size="30" placeholder="<?php echo HtmlEncode($store_storeled->DISC->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DISC->EditValue ?>"<?php echo $store_storeled->DISC->editAttributes() ?>>
</span>
<?php echo $store_storeled->DISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_store_storeled_TAXP" for="x_TAXP" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->TAXP->caption() ?><?php echo ($store_storeled->TAXP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->TAXP->cellAttributes() ?>>
<span id="el_store_storeled_TAXP">
<input type="text" data-table="store_storeled" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($store_storeled->TAXP->getPlaceHolder()) ?>" value="<?php echo $store_storeled->TAXP->EditValue ?>"<?php echo $store_storeled->TAXP->editAttributes() ?>>
</span>
<?php echo $store_storeled->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->TAX->Visible) { // TAX ?>
	<div id="r_TAX" class="form-group row">
		<label id="elh_store_storeled_TAX" for="x_TAX" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->TAX->caption() ?><?php echo ($store_storeled->TAX->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->TAX->cellAttributes() ?>>
<span id="el_store_storeled_TAX">
<input type="text" data-table="store_storeled" data-field="x_TAX" name="x_TAX" id="x_TAX" size="30" placeholder="<?php echo HtmlEncode($store_storeled->TAX->getPlaceHolder()) ?>" value="<?php echo $store_storeled->TAX->EditValue ?>"<?php echo $store_storeled->TAX->editAttributes() ?>>
</span>
<?php echo $store_storeled->TAX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->TAXR->Visible) { // TAXR ?>
	<div id="r_TAXR" class="form-group row">
		<label id="elh_store_storeled_TAXR" for="x_TAXR" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->TAXR->caption() ?><?php echo ($store_storeled->TAXR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->TAXR->cellAttributes() ?>>
<span id="el_store_storeled_TAXR">
<input type="text" data-table="store_storeled" data-field="x_TAXR" name="x_TAXR" id="x_TAXR" size="30" placeholder="<?php echo HtmlEncode($store_storeled->TAXR->getPlaceHolder()) ?>" value="<?php echo $store_storeled->TAXR->EditValue ?>"<?php echo $store_storeled->TAXR->editAttributes() ?>>
</span>
<?php echo $store_storeled->TAXR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DAMT->Visible) { // DAMT ?>
	<div id="r_DAMT" class="form-group row">
		<label id="elh_store_storeled_DAMT" for="x_DAMT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DAMT->caption() ?><?php echo ($store_storeled->DAMT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DAMT->cellAttributes() ?>>
<span id="el_store_storeled_DAMT">
<input type="text" data-table="store_storeled" data-field="x_DAMT" name="x_DAMT" id="x_DAMT" size="30" placeholder="<?php echo HtmlEncode($store_storeled->DAMT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DAMT->EditValue ?>"<?php echo $store_storeled->DAMT->editAttributes() ?>>
</span>
<?php echo $store_storeled->DAMT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->EMPNO->Visible) { // EMPNO ?>
	<div id="r_EMPNO" class="form-group row">
		<label id="elh_store_storeled_EMPNO" for="x_EMPNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->EMPNO->caption() ?><?php echo ($store_storeled->EMPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->EMPNO->cellAttributes() ?>>
<span id="el_store_storeled_EMPNO">
<input type="text" data-table="store_storeled" data-field="x_EMPNO" name="x_EMPNO" id="x_EMPNO" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storeled->EMPNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->EMPNO->EditValue ?>"<?php echo $store_storeled->EMPNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->EMPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_store_storeled_PC" for="x_PC" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PC->caption() ?><?php echo ($store_storeled->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PC->cellAttributes() ?>>
<span id="el_store_storeled_PC">
<input type="text" data-table="store_storeled" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled->PC->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PC->EditValue ?>"<?php echo $store_storeled->PC->editAttributes() ?>>
</span>
<?php echo $store_storeled->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DRNAME->Visible) { // DRNAME ?>
	<div id="r_DRNAME" class="form-group row">
		<label id="elh_store_storeled_DRNAME" for="x_DRNAME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DRNAME->caption() ?><?php echo ($store_storeled->DRNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DRNAME->cellAttributes() ?>>
<span id="el_store_storeled_DRNAME">
<input type="text" data-table="store_storeled" data-field="x_DRNAME" name="x_DRNAME" id="x_DRNAME" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($store_storeled->DRNAME->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DRNAME->EditValue ?>"<?php echo $store_storeled->DRNAME->editAttributes() ?>>
</span>
<?php echo $store_storeled->DRNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->BTIME->Visible) { // BTIME ?>
	<div id="r_BTIME" class="form-group row">
		<label id="elh_store_storeled_BTIME" for="x_BTIME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->BTIME->caption() ?><?php echo ($store_storeled->BTIME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->BTIME->cellAttributes() ?>>
<span id="el_store_storeled_BTIME">
<input type="text" data-table="store_storeled" data-field="x_BTIME" name="x_BTIME" id="x_BTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($store_storeled->BTIME->getPlaceHolder()) ?>" value="<?php echo $store_storeled->BTIME->EditValue ?>"<?php echo $store_storeled->BTIME->editAttributes() ?>>
</span>
<?php echo $store_storeled->BTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->ONO->Visible) { // ONO ?>
	<div id="r_ONO" class="form-group row">
		<label id="elh_store_storeled_ONO" for="x_ONO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->ONO->caption() ?><?php echo ($store_storeled->ONO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->ONO->cellAttributes() ?>>
<span id="el_store_storeled_ONO">
<input type="text" data-table="store_storeled" data-field="x_ONO" name="x_ONO" id="x_ONO" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_storeled->ONO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->ONO->EditValue ?>"<?php echo $store_storeled->ONO->editAttributes() ?>>
</span>
<?php echo $store_storeled->ONO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->ODT->Visible) { // ODT ?>
	<div id="r_ODT" class="form-group row">
		<label id="elh_store_storeled_ODT" for="x_ODT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->ODT->caption() ?><?php echo ($store_storeled->ODT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->ODT->cellAttributes() ?>>
<span id="el_store_storeled_ODT">
<input type="text" data-table="store_storeled" data-field="x_ODT" name="x_ODT" id="x_ODT" placeholder="<?php echo HtmlEncode($store_storeled->ODT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->ODT->EditValue ?>"<?php echo $store_storeled->ODT->editAttributes() ?>>
<?php if (!$store_storeled->ODT->ReadOnly && !$store_storeled->ODT->Disabled && !isset($store_storeled->ODT->EditAttrs["readonly"]) && !isset($store_storeled->ODT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storeledadd", "x_ODT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_storeled->ODT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PURRT->Visible) { // PURRT ?>
	<div id="r_PURRT" class="form-group row">
		<label id="elh_store_storeled_PURRT" for="x_PURRT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PURRT->caption() ?><?php echo ($store_storeled->PURRT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PURRT->cellAttributes() ?>>
<span id="el_store_storeled_PURRT">
<input type="text" data-table="store_storeled" data-field="x_PURRT" name="x_PURRT" id="x_PURRT" size="30" placeholder="<?php echo HtmlEncode($store_storeled->PURRT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PURRT->EditValue ?>"<?php echo $store_storeled->PURRT->editAttributes() ?>>
</span>
<?php echo $store_storeled->PURRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->GRP->Visible) { // GRP ?>
	<div id="r_GRP" class="form-group row">
		<label id="elh_store_storeled_GRP" for="x_GRP" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->GRP->caption() ?><?php echo ($store_storeled->GRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->GRP->cellAttributes() ?>>
<span id="el_store_storeled_GRP">
<input type="text" data-table="store_storeled" data-field="x_GRP" name="x_GRP" id="x_GRP" size="30" maxlength="21" placeholder="<?php echo HtmlEncode($store_storeled->GRP->getPlaceHolder()) ?>" value="<?php echo $store_storeled->GRP->EditValue ?>"<?php echo $store_storeled->GRP->editAttributes() ?>>
</span>
<?php echo $store_storeled->GRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->IBATCH->Visible) { // IBATCH ?>
	<div id="r_IBATCH" class="form-group row">
		<label id="elh_store_storeled_IBATCH" for="x_IBATCH" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->IBATCH->caption() ?><?php echo ($store_storeled->IBATCH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->IBATCH->cellAttributes() ?>>
<span id="el_store_storeled_IBATCH">
<input type="text" data-table="store_storeled" data-field="x_IBATCH" name="x_IBATCH" id="x_IBATCH" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($store_storeled->IBATCH->getPlaceHolder()) ?>" value="<?php echo $store_storeled->IBATCH->EditValue ?>"<?php echo $store_storeled->IBATCH->editAttributes() ?>>
</span>
<?php echo $store_storeled->IBATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->IPNO->Visible) { // IPNO ?>
	<div id="r_IPNO" class="form-group row">
		<label id="elh_store_storeled_IPNO" for="x_IPNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->IPNO->caption() ?><?php echo ($store_storeled->IPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->IPNO->cellAttributes() ?>>
<span id="el_store_storeled_IPNO">
<input type="text" data-table="store_storeled" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($store_storeled->IPNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->IPNO->EditValue ?>"<?php echo $store_storeled->IPNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->IPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->OPNO->Visible) { // OPNO ?>
	<div id="r_OPNO" class="form-group row">
		<label id="elh_store_storeled_OPNO" for="x_OPNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->OPNO->caption() ?><?php echo ($store_storeled->OPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->OPNO->cellAttributes() ?>>
<span id="el_store_storeled_OPNO">
<input type="text" data-table="store_storeled" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storeled->OPNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->OPNO->EditValue ?>"<?php echo $store_storeled->OPNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->OPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->RECID->Visible) { // RECID ?>
	<div id="r_RECID" class="form-group row">
		<label id="elh_store_storeled_RECID" for="x_RECID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->RECID->caption() ?><?php echo ($store_storeled->RECID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->RECID->cellAttributes() ?>>
<span id="el_store_storeled_RECID">
<input type="text" data-table="store_storeled" data-field="x_RECID" name="x_RECID" id="x_RECID" size="30" maxlength="18" placeholder="<?php echo HtmlEncode($store_storeled->RECID->getPlaceHolder()) ?>" value="<?php echo $store_storeled->RECID->EditValue ?>"<?php echo $store_storeled->RECID->editAttributes() ?>>
</span>
<?php echo $store_storeled->RECID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->FQTY->Visible) { // FQTY ?>
	<div id="r_FQTY" class="form-group row">
		<label id="elh_store_storeled_FQTY" for="x_FQTY" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->FQTY->caption() ?><?php echo ($store_storeled->FQTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->FQTY->cellAttributes() ?>>
<span id="el_store_storeled_FQTY">
<input type="text" data-table="store_storeled" data-field="x_FQTY" name="x_FQTY" id="x_FQTY" size="30" placeholder="<?php echo HtmlEncode($store_storeled->FQTY->getPlaceHolder()) ?>" value="<?php echo $store_storeled->FQTY->EditValue ?>"<?php echo $store_storeled->FQTY->editAttributes() ?>>
</span>
<?php echo $store_storeled->FQTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_store_storeled_UR" for="x_UR" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->UR->caption() ?><?php echo ($store_storeled->UR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->UR->cellAttributes() ?>>
<span id="el_store_storeled_UR">
<input type="text" data-table="store_storeled" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($store_storeled->UR->getPlaceHolder()) ?>" value="<?php echo $store_storeled->UR->EditValue ?>"<?php echo $store_storeled->UR->editAttributes() ?>>
</span>
<?php echo $store_storeled->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DCID->Visible) { // DCID ?>
	<div id="r_DCID" class="form-group row">
		<label id="elh_store_storeled_DCID" for="x_DCID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DCID->caption() ?><?php echo ($store_storeled->DCID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DCID->cellAttributes() ?>>
<span id="el_store_storeled_DCID">
<input type="text" data-table="store_storeled" data-field="x_DCID" name="x_DCID" id="x_DCID" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storeled->DCID->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DCID->EditValue ?>"<?php echo $store_storeled->DCID->editAttributes() ?>>
</span>
<?php echo $store_storeled->DCID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->_USERID->Visible) { // USERID ?>
	<div id="r__USERID" class="form-group row">
		<label id="elh_store_storeled__USERID" for="x__USERID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->_USERID->caption() ?><?php echo ($store_storeled->_USERID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->_USERID->cellAttributes() ?>>
<span id="el_store_storeled__USERID">
<input type="text" data-table="store_storeled" data-field="x__USERID" name="x__USERID" id="x__USERID" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled->_USERID->getPlaceHolder()) ?>" value="<?php echo $store_storeled->_USERID->EditValue ?>"<?php echo $store_storeled->_USERID->editAttributes() ?>>
</span>
<?php echo $store_storeled->_USERID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->MODDT->Visible) { // MODDT ?>
	<div id="r_MODDT" class="form-group row">
		<label id="elh_store_storeled_MODDT" for="x_MODDT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->MODDT->caption() ?><?php echo ($store_storeled->MODDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->MODDT->cellAttributes() ?>>
<span id="el_store_storeled_MODDT">
<input type="text" data-table="store_storeled" data-field="x_MODDT" name="x_MODDT" id="x_MODDT" placeholder="<?php echo HtmlEncode($store_storeled->MODDT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->MODDT->EditValue ?>"<?php echo $store_storeled->MODDT->editAttributes() ?>>
<?php if (!$store_storeled->MODDT->ReadOnly && !$store_storeled->MODDT->Disabled && !isset($store_storeled->MODDT->EditAttrs["readonly"]) && !isset($store_storeled->MODDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storeledadd", "x_MODDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_storeled->MODDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->FYM->Visible) { // FYM ?>
	<div id="r_FYM" class="form-group row">
		<label id="elh_store_storeled_FYM" for="x_FYM" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->FYM->caption() ?><?php echo ($store_storeled->FYM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->FYM->cellAttributes() ?>>
<span id="el_store_storeled_FYM">
<input type="text" data-table="store_storeled" data-field="x_FYM" name="x_FYM" id="x_FYM" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($store_storeled->FYM->getPlaceHolder()) ?>" value="<?php echo $store_storeled->FYM->EditValue ?>"<?php echo $store_storeled->FYM->editAttributes() ?>>
</span>
<?php echo $store_storeled->FYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PRCBATCH->Visible) { // PRCBATCH ?>
	<div id="r_PRCBATCH" class="form-group row">
		<label id="elh_store_storeled_PRCBATCH" for="x_PRCBATCH" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PRCBATCH->caption() ?><?php echo ($store_storeled->PRCBATCH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PRCBATCH->cellAttributes() ?>>
<span id="el_store_storeled_PRCBATCH">
<input type="text" data-table="store_storeled" data-field="x_PRCBATCH" name="x_PRCBATCH" id="x_PRCBATCH" size="30" maxlength="23" placeholder="<?php echo HtmlEncode($store_storeled->PRCBATCH->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PRCBATCH->EditValue ?>"<?php echo $store_storeled->PRCBATCH->editAttributes() ?>>
</span>
<?php echo $store_storeled->PRCBATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->SLNO->Visible) { // SLNO ?>
	<div id="r_SLNO" class="form-group row">
		<label id="elh_store_storeled_SLNO" for="x_SLNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->SLNO->caption() ?><?php echo ($store_storeled->SLNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->SLNO->cellAttributes() ?>>
<span id="el_store_storeled_SLNO">
<input type="text" data-table="store_storeled" data-field="x_SLNO" name="x_SLNO" id="x_SLNO" size="30" placeholder="<?php echo HtmlEncode($store_storeled->SLNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->SLNO->EditValue ?>"<?php echo $store_storeled->SLNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->SLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_store_storeled_MRP" for="x_MRP" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->MRP->caption() ?><?php echo ($store_storeled->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->MRP->cellAttributes() ?>>
<span id="el_store_storeled_MRP">
<input type="text" data-table="store_storeled" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($store_storeled->MRP->getPlaceHolder()) ?>" value="<?php echo $store_storeled->MRP->EditValue ?>"<?php echo $store_storeled->MRP->editAttributes() ?>>
</span>
<?php echo $store_storeled->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->BILLYM->Visible) { // BILLYM ?>
	<div id="r_BILLYM" class="form-group row">
		<label id="elh_store_storeled_BILLYM" for="x_BILLYM" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->BILLYM->caption() ?><?php echo ($store_storeled->BILLYM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->BILLYM->cellAttributes() ?>>
<span id="el_store_storeled_BILLYM">
<input type="text" data-table="store_storeled" data-field="x_BILLYM" name="x_BILLYM" id="x_BILLYM" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($store_storeled->BILLYM->getPlaceHolder()) ?>" value="<?php echo $store_storeled->BILLYM->EditValue ?>"<?php echo $store_storeled->BILLYM->editAttributes() ?>>
</span>
<?php echo $store_storeled->BILLYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->BILLGRP->Visible) { // BILLGRP ?>
	<div id="r_BILLGRP" class="form-group row">
		<label id="elh_store_storeled_BILLGRP" for="x_BILLGRP" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->BILLGRP->caption() ?><?php echo ($store_storeled->BILLGRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->BILLGRP->cellAttributes() ?>>
<span id="el_store_storeled_BILLGRP">
<input type="text" data-table="store_storeled" data-field="x_BILLGRP" name="x_BILLGRP" id="x_BILLGRP" size="30" maxlength="21" placeholder="<?php echo HtmlEncode($store_storeled->BILLGRP->getPlaceHolder()) ?>" value="<?php echo $store_storeled->BILLGRP->EditValue ?>"<?php echo $store_storeled->BILLGRP->editAttributes() ?>>
</span>
<?php echo $store_storeled->BILLGRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->STAFF->Visible) { // STAFF ?>
	<div id="r_STAFF" class="form-group row">
		<label id="elh_store_storeled_STAFF" for="x_STAFF" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->STAFF->caption() ?><?php echo ($store_storeled->STAFF->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->STAFF->cellAttributes() ?>>
<span id="el_store_storeled_STAFF">
<input type="text" data-table="store_storeled" data-field="x_STAFF" name="x_STAFF" id="x_STAFF" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($store_storeled->STAFF->getPlaceHolder()) ?>" value="<?php echo $store_storeled->STAFF->EditValue ?>"<?php echo $store_storeled->STAFF->editAttributes() ?>>
</span>
<?php echo $store_storeled->STAFF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<div id="r_TEMPIPNO" class="form-group row">
		<label id="elh_store_storeled_TEMPIPNO" for="x_TEMPIPNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->TEMPIPNO->caption() ?><?php echo ($store_storeled->TEMPIPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->TEMPIPNO->cellAttributes() ?>>
<span id="el_store_storeled_TEMPIPNO">
<input type="text" data-table="store_storeled" data-field="x_TEMPIPNO" name="x_TEMPIPNO" id="x_TEMPIPNO" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($store_storeled->TEMPIPNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->TEMPIPNO->EditValue ?>"<?php echo $store_storeled->TEMPIPNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->TEMPIPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PRNTED->Visible) { // PRNTED ?>
	<div id="r_PRNTED" class="form-group row">
		<label id="elh_store_storeled_PRNTED" for="x_PRNTED" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PRNTED->caption() ?><?php echo ($store_storeled->PRNTED->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PRNTED->cellAttributes() ?>>
<span id="el_store_storeled_PRNTED">
<input type="text" data-table="store_storeled" data-field="x_PRNTED" name="x_PRNTED" id="x_PRNTED" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storeled->PRNTED->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PRNTED->EditValue ?>"<?php echo $store_storeled->PRNTED->editAttributes() ?>>
</span>
<?php echo $store_storeled->PRNTED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PATNAME->Visible) { // PATNAME ?>
	<div id="r_PATNAME" class="form-group row">
		<label id="elh_store_storeled_PATNAME" for="x_PATNAME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PATNAME->caption() ?><?php echo ($store_storeled->PATNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PATNAME->cellAttributes() ?>>
<span id="el_store_storeled_PATNAME">
<input type="text" data-table="store_storeled" data-field="x_PATNAME" name="x_PATNAME" id="x_PATNAME" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($store_storeled->PATNAME->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PATNAME->EditValue ?>"<?php echo $store_storeled->PATNAME->editAttributes() ?>>
</span>
<?php echo $store_storeled->PATNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PJVNO->Visible) { // PJVNO ?>
	<div id="r_PJVNO" class="form-group row">
		<label id="elh_store_storeled_PJVNO" for="x_PJVNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PJVNO->caption() ?><?php echo ($store_storeled->PJVNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PJVNO->cellAttributes() ?>>
<span id="el_store_storeled_PJVNO">
<input type="text" data-table="store_storeled" data-field="x_PJVNO" name="x_PJVNO" id="x_PJVNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled->PJVNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PJVNO->EditValue ?>"<?php echo $store_storeled->PJVNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->PJVNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PJVSLNO->Visible) { // PJVSLNO ?>
	<div id="r_PJVSLNO" class="form-group row">
		<label id="elh_store_storeled_PJVSLNO" for="x_PJVSLNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PJVSLNO->caption() ?><?php echo ($store_storeled->PJVSLNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PJVSLNO->cellAttributes() ?>>
<span id="el_store_storeled_PJVSLNO">
<input type="text" data-table="store_storeled" data-field="x_PJVSLNO" name="x_PJVSLNO" id="x_PJVSLNO" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storeled->PJVSLNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PJVSLNO->EditValue ?>"<?php echo $store_storeled->PJVSLNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->PJVSLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->OTHDISC->Visible) { // OTHDISC ?>
	<div id="r_OTHDISC" class="form-group row">
		<label id="elh_store_storeled_OTHDISC" for="x_OTHDISC" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->OTHDISC->caption() ?><?php echo ($store_storeled->OTHDISC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->OTHDISC->cellAttributes() ?>>
<span id="el_store_storeled_OTHDISC">
<input type="text" data-table="store_storeled" data-field="x_OTHDISC" name="x_OTHDISC" id="x_OTHDISC" size="30" placeholder="<?php echo HtmlEncode($store_storeled->OTHDISC->getPlaceHolder()) ?>" value="<?php echo $store_storeled->OTHDISC->EditValue ?>"<?php echo $store_storeled->OTHDISC->editAttributes() ?>>
</span>
<?php echo $store_storeled->OTHDISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PJVYM->Visible) { // PJVYM ?>
	<div id="r_PJVYM" class="form-group row">
		<label id="elh_store_storeled_PJVYM" for="x_PJVYM" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PJVYM->caption() ?><?php echo ($store_storeled->PJVYM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PJVYM->cellAttributes() ?>>
<span id="el_store_storeled_PJVYM">
<input type="text" data-table="store_storeled" data-field="x_PJVYM" name="x_PJVYM" id="x_PJVYM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($store_storeled->PJVYM->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PJVYM->EditValue ?>"<?php echo $store_storeled->PJVYM->editAttributes() ?>>
</span>
<?php echo $store_storeled->PJVYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PURDISCPER->Visible) { // PURDISCPER ?>
	<div id="r_PURDISCPER" class="form-group row">
		<label id="elh_store_storeled_PURDISCPER" for="x_PURDISCPER" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PURDISCPER->caption() ?><?php echo ($store_storeled->PURDISCPER->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PURDISCPER->cellAttributes() ?>>
<span id="el_store_storeled_PURDISCPER">
<input type="text" data-table="store_storeled" data-field="x_PURDISCPER" name="x_PURDISCPER" id="x_PURDISCPER" size="30" placeholder="<?php echo HtmlEncode($store_storeled->PURDISCPER->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PURDISCPER->EditValue ?>"<?php echo $store_storeled->PURDISCPER->editAttributes() ?>>
</span>
<?php echo $store_storeled->PURDISCPER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->CASHIER->Visible) { // CASHIER ?>
	<div id="r_CASHIER" class="form-group row">
		<label id="elh_store_storeled_CASHIER" for="x_CASHIER" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->CASHIER->caption() ?><?php echo ($store_storeled->CASHIER->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->CASHIER->cellAttributes() ?>>
<span id="el_store_storeled_CASHIER">
<input type="text" data-table="store_storeled" data-field="x_CASHIER" name="x_CASHIER" id="x_CASHIER" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled->CASHIER->getPlaceHolder()) ?>" value="<?php echo $store_storeled->CASHIER->EditValue ?>"<?php echo $store_storeled->CASHIER->editAttributes() ?>>
</span>
<?php echo $store_storeled->CASHIER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->CASHTIME->Visible) { // CASHTIME ?>
	<div id="r_CASHTIME" class="form-group row">
		<label id="elh_store_storeled_CASHTIME" for="x_CASHTIME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->CASHTIME->caption() ?><?php echo ($store_storeled->CASHTIME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->CASHTIME->cellAttributes() ?>>
<span id="el_store_storeled_CASHTIME">
<input type="text" data-table="store_storeled" data-field="x_CASHTIME" name="x_CASHTIME" id="x_CASHTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($store_storeled->CASHTIME->getPlaceHolder()) ?>" value="<?php echo $store_storeled->CASHTIME->EditValue ?>"<?php echo $store_storeled->CASHTIME->editAttributes() ?>>
</span>
<?php echo $store_storeled->CASHTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->CASHRECD->Visible) { // CASHRECD ?>
	<div id="r_CASHRECD" class="form-group row">
		<label id="elh_store_storeled_CASHRECD" for="x_CASHRECD" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->CASHRECD->caption() ?><?php echo ($store_storeled->CASHRECD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->CASHRECD->cellAttributes() ?>>
<span id="el_store_storeled_CASHRECD">
<input type="text" data-table="store_storeled" data-field="x_CASHRECD" name="x_CASHRECD" id="x_CASHRECD" size="30" placeholder="<?php echo HtmlEncode($store_storeled->CASHRECD->getPlaceHolder()) ?>" value="<?php echo $store_storeled->CASHRECD->EditValue ?>"<?php echo $store_storeled->CASHRECD->editAttributes() ?>>
</span>
<?php echo $store_storeled->CASHRECD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->CASHREFNO->Visible) { // CASHREFNO ?>
	<div id="r_CASHREFNO" class="form-group row">
		<label id="elh_store_storeled_CASHREFNO" for="x_CASHREFNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->CASHREFNO->caption() ?><?php echo ($store_storeled->CASHREFNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->CASHREFNO->cellAttributes() ?>>
<span id="el_store_storeled_CASHREFNO">
<input type="text" data-table="store_storeled" data-field="x_CASHREFNO" name="x_CASHREFNO" id="x_CASHREFNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled->CASHREFNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->CASHREFNO->EditValue ?>"<?php echo $store_storeled->CASHREFNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->CASHREFNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<div id="r_CASHIERSHIFT" class="form-group row">
		<label id="elh_store_storeled_CASHIERSHIFT" for="x_CASHIERSHIFT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->CASHIERSHIFT->caption() ?><?php echo ($store_storeled->CASHIERSHIFT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_store_storeled_CASHIERSHIFT">
<input type="text" data-table="store_storeled" data-field="x_CASHIERSHIFT" name="x_CASHIERSHIFT" id="x_CASHIERSHIFT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storeled->CASHIERSHIFT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->CASHIERSHIFT->EditValue ?>"<?php echo $store_storeled->CASHIERSHIFT->editAttributes() ?>>
</span>
<?php echo $store_storeled->CASHIERSHIFT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label id="elh_store_storeled_PRCODE" for="x_PRCODE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PRCODE->caption() ?><?php echo ($store_storeled->PRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PRCODE->cellAttributes() ?>>
<span id="el_store_storeled_PRCODE">
<input type="text" data-table="store_storeled" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storeled->PRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PRCODE->EditValue ?>"<?php echo $store_storeled->PRCODE->editAttributes() ?>>
</span>
<?php echo $store_storeled->PRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->RELEASEBY->Visible) { // RELEASEBY ?>
	<div id="r_RELEASEBY" class="form-group row">
		<label id="elh_store_storeled_RELEASEBY" for="x_RELEASEBY" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->RELEASEBY->caption() ?><?php echo ($store_storeled->RELEASEBY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->RELEASEBY->cellAttributes() ?>>
<span id="el_store_storeled_RELEASEBY">
<input type="text" data-table="store_storeled" data-field="x_RELEASEBY" name="x_RELEASEBY" id="x_RELEASEBY" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_storeled->RELEASEBY->getPlaceHolder()) ?>" value="<?php echo $store_storeled->RELEASEBY->EditValue ?>"<?php echo $store_storeled->RELEASEBY->editAttributes() ?>>
</span>
<?php echo $store_storeled->RELEASEBY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<div id="r_CRAUTHOR" class="form-group row">
		<label id="elh_store_storeled_CRAUTHOR" for="x_CRAUTHOR" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->CRAUTHOR->caption() ?><?php echo ($store_storeled->CRAUTHOR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->CRAUTHOR->cellAttributes() ?>>
<span id="el_store_storeled_CRAUTHOR">
<input type="text" data-table="store_storeled" data-field="x_CRAUTHOR" name="x_CRAUTHOR" id="x_CRAUTHOR" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_storeled->CRAUTHOR->getPlaceHolder()) ?>" value="<?php echo $store_storeled->CRAUTHOR->EditValue ?>"<?php echo $store_storeled->CRAUTHOR->editAttributes() ?>>
</span>
<?php echo $store_storeled->CRAUTHOR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PAYMENT->Visible) { // PAYMENT ?>
	<div id="r_PAYMENT" class="form-group row">
		<label id="elh_store_storeled_PAYMENT" for="x_PAYMENT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PAYMENT->caption() ?><?php echo ($store_storeled->PAYMENT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PAYMENT->cellAttributes() ?>>
<span id="el_store_storeled_PAYMENT">
<input type="text" data-table="store_storeled" data-field="x_PAYMENT" name="x_PAYMENT" id="x_PAYMENT" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($store_storeled->PAYMENT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PAYMENT->EditValue ?>"<?php echo $store_storeled->PAYMENT->editAttributes() ?>>
</span>
<?php echo $store_storeled->PAYMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label id="elh_store_storeled_DRID" for="x_DRID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DRID->caption() ?><?php echo ($store_storeled->DRID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DRID->cellAttributes() ?>>
<span id="el_store_storeled_DRID">
<input type="text" data-table="store_storeled" data-field="x_DRID" name="x_DRID" id="x_DRID" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled->DRID->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DRID->EditValue ?>"<?php echo $store_storeled->DRID->editAttributes() ?>>
</span>
<?php echo $store_storeled->DRID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->WARD->Visible) { // WARD ?>
	<div id="r_WARD" class="form-group row">
		<label id="elh_store_storeled_WARD" for="x_WARD" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->WARD->caption() ?><?php echo ($store_storeled->WARD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->WARD->cellAttributes() ?>>
<span id="el_store_storeled_WARD">
<input type="text" data-table="store_storeled" data-field="x_WARD" name="x_WARD" id="x_WARD" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($store_storeled->WARD->getPlaceHolder()) ?>" value="<?php echo $store_storeled->WARD->EditValue ?>"<?php echo $store_storeled->WARD->editAttributes() ?>>
</span>
<?php echo $store_storeled->WARD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->STAXTYPE->Visible) { // STAXTYPE ?>
	<div id="r_STAXTYPE" class="form-group row">
		<label id="elh_store_storeled_STAXTYPE" for="x_STAXTYPE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->STAXTYPE->caption() ?><?php echo ($store_storeled->STAXTYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->STAXTYPE->cellAttributes() ?>>
<span id="el_store_storeled_STAXTYPE">
<input type="text" data-table="store_storeled" data-field="x_STAXTYPE" name="x_STAXTYPE" id="x_STAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storeled->STAXTYPE->getPlaceHolder()) ?>" value="<?php echo $store_storeled->STAXTYPE->EditValue ?>"<?php echo $store_storeled->STAXTYPE->editAttributes() ?>>
</span>
<?php echo $store_storeled->STAXTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<div id="r_PURDISCVAL" class="form-group row">
		<label id="elh_store_storeled_PURDISCVAL" for="x_PURDISCVAL" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PURDISCVAL->caption() ?><?php echo ($store_storeled->PURDISCVAL->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PURDISCVAL->cellAttributes() ?>>
<span id="el_store_storeled_PURDISCVAL">
<input type="text" data-table="store_storeled" data-field="x_PURDISCVAL" name="x_PURDISCVAL" id="x_PURDISCVAL" size="30" placeholder="<?php echo HtmlEncode($store_storeled->PURDISCVAL->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PURDISCVAL->EditValue ?>"<?php echo $store_storeled->PURDISCVAL->editAttributes() ?>>
</span>
<?php echo $store_storeled->PURDISCVAL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->RNDOFF->Visible) { // RNDOFF ?>
	<div id="r_RNDOFF" class="form-group row">
		<label id="elh_store_storeled_RNDOFF" for="x_RNDOFF" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->RNDOFF->caption() ?><?php echo ($store_storeled->RNDOFF->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->RNDOFF->cellAttributes() ?>>
<span id="el_store_storeled_RNDOFF">
<input type="text" data-table="store_storeled" data-field="x_RNDOFF" name="x_RNDOFF" id="x_RNDOFF" size="30" placeholder="<?php echo HtmlEncode($store_storeled->RNDOFF->getPlaceHolder()) ?>" value="<?php echo $store_storeled->RNDOFF->EditValue ?>"<?php echo $store_storeled->RNDOFF->editAttributes() ?>>
</span>
<?php echo $store_storeled->RNDOFF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DISCONMRP->Visible) { // DISCONMRP ?>
	<div id="r_DISCONMRP" class="form-group row">
		<label id="elh_store_storeled_DISCONMRP" for="x_DISCONMRP" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DISCONMRP->caption() ?><?php echo ($store_storeled->DISCONMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DISCONMRP->cellAttributes() ?>>
<span id="el_store_storeled_DISCONMRP">
<input type="text" data-table="store_storeled" data-field="x_DISCONMRP" name="x_DISCONMRP" id="x_DISCONMRP" size="30" placeholder="<?php echo HtmlEncode($store_storeled->DISCONMRP->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DISCONMRP->EditValue ?>"<?php echo $store_storeled->DISCONMRP->editAttributes() ?>>
</span>
<?php echo $store_storeled->DISCONMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DELVDT->Visible) { // DELVDT ?>
	<div id="r_DELVDT" class="form-group row">
		<label id="elh_store_storeled_DELVDT" for="x_DELVDT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DELVDT->caption() ?><?php echo ($store_storeled->DELVDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DELVDT->cellAttributes() ?>>
<span id="el_store_storeled_DELVDT">
<input type="text" data-table="store_storeled" data-field="x_DELVDT" name="x_DELVDT" id="x_DELVDT" placeholder="<?php echo HtmlEncode($store_storeled->DELVDT->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DELVDT->EditValue ?>"<?php echo $store_storeled->DELVDT->editAttributes() ?>>
<?php if (!$store_storeled->DELVDT->ReadOnly && !$store_storeled->DELVDT->Disabled && !isset($store_storeled->DELVDT->EditAttrs["readonly"]) && !isset($store_storeled->DELVDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storeledadd", "x_DELVDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_storeled->DELVDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DELVTIME->Visible) { // DELVTIME ?>
	<div id="r_DELVTIME" class="form-group row">
		<label id="elh_store_storeled_DELVTIME" for="x_DELVTIME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DELVTIME->caption() ?><?php echo ($store_storeled->DELVTIME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DELVTIME->cellAttributes() ?>>
<span id="el_store_storeled_DELVTIME">
<input type="text" data-table="store_storeled" data-field="x_DELVTIME" name="x_DELVTIME" id="x_DELVTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($store_storeled->DELVTIME->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DELVTIME->EditValue ?>"<?php echo $store_storeled->DELVTIME->editAttributes() ?>>
</span>
<?php echo $store_storeled->DELVTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->DELVBY->Visible) { // DELVBY ?>
	<div id="r_DELVBY" class="form-group row">
		<label id="elh_store_storeled_DELVBY" for="x_DELVBY" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->DELVBY->caption() ?><?php echo ($store_storeled->DELVBY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->DELVBY->cellAttributes() ?>>
<span id="el_store_storeled_DELVBY">
<input type="text" data-table="store_storeled" data-field="x_DELVBY" name="x_DELVBY" id="x_DELVBY" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled->DELVBY->getPlaceHolder()) ?>" value="<?php echo $store_storeled->DELVBY->EditValue ?>"<?php echo $store_storeled->DELVBY->editAttributes() ?>>
</span>
<?php echo $store_storeled->DELVBY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->HOSPNO->Visible) { // HOSPNO ?>
	<div id="r_HOSPNO" class="form-group row">
		<label id="elh_store_storeled_HOSPNO" for="x_HOSPNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->HOSPNO->caption() ?><?php echo ($store_storeled->HOSPNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->HOSPNO->cellAttributes() ?>>
<span id="el_store_storeled_HOSPNO">
<input type="text" data-table="store_storeled" data-field="x_HOSPNO" name="x_HOSPNO" id="x_HOSPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storeled->HOSPNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled->HOSPNO->EditValue ?>"<?php echo $store_storeled->HOSPNO->editAttributes() ?>>
</span>
<?php echo $store_storeled->HOSPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->pbv->Visible) { // pbv ?>
	<div id="r_pbv" class="form-group row">
		<label id="elh_store_storeled_pbv" for="x_pbv" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->pbv->caption() ?><?php echo ($store_storeled->pbv->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->pbv->cellAttributes() ?>>
<span id="el_store_storeled_pbv">
<input type="text" data-table="store_storeled" data-field="x_pbv" name="x_pbv" id="x_pbv" size="30" placeholder="<?php echo HtmlEncode($store_storeled->pbv->getPlaceHolder()) ?>" value="<?php echo $store_storeled->pbv->EditValue ?>"<?php echo $store_storeled->pbv->editAttributes() ?>>
</span>
<?php echo $store_storeled->pbv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->pbt->Visible) { // pbt ?>
	<div id="r_pbt" class="form-group row">
		<label id="elh_store_storeled_pbt" for="x_pbt" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->pbt->caption() ?><?php echo ($store_storeled->pbt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->pbt->cellAttributes() ?>>
<span id="el_store_storeled_pbt">
<input type="text" data-table="store_storeled" data-field="x_pbt" name="x_pbt" id="x_pbt" size="30" placeholder="<?php echo HtmlEncode($store_storeled->pbt->getPlaceHolder()) ?>" value="<?php echo $store_storeled->pbt->EditValue ?>"<?php echo $store_storeled->pbt->editAttributes() ?>>
</span>
<?php echo $store_storeled->pbt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->SiNo->Visible) { // SiNo ?>
	<div id="r_SiNo" class="form-group row">
		<label id="elh_store_storeled_SiNo" for="x_SiNo" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->SiNo->caption() ?><?php echo ($store_storeled->SiNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->SiNo->cellAttributes() ?>>
<span id="el_store_storeled_SiNo">
<input type="text" data-table="store_storeled" data-field="x_SiNo" name="x_SiNo" id="x_SiNo" size="30" placeholder="<?php echo HtmlEncode($store_storeled->SiNo->getPlaceHolder()) ?>" value="<?php echo $store_storeled->SiNo->EditValue ?>"<?php echo $store_storeled->SiNo->editAttributes() ?>>
</span>
<?php echo $store_storeled->SiNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->Product->Visible) { // Product ?>
	<div id="r_Product" class="form-group row">
		<label id="elh_store_storeled_Product" for="x_Product" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->Product->caption() ?><?php echo ($store_storeled->Product->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->Product->cellAttributes() ?>>
<span id="el_store_storeled_Product">
<input type="text" data-table="store_storeled" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled->Product->getPlaceHolder()) ?>" value="<?php echo $store_storeled->Product->EditValue ?>"<?php echo $store_storeled->Product->editAttributes() ?>>
</span>
<?php echo $store_storeled->Product->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->Mfg->Visible) { // Mfg ?>
	<div id="r_Mfg" class="form-group row">
		<label id="elh_store_storeled_Mfg" for="x_Mfg" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->Mfg->caption() ?><?php echo ($store_storeled->Mfg->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->Mfg->cellAttributes() ?>>
<span id="el_store_storeled_Mfg">
<input type="text" data-table="store_storeled" data-field="x_Mfg" name="x_Mfg" id="x_Mfg" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled->Mfg->getPlaceHolder()) ?>" value="<?php echo $store_storeled->Mfg->EditValue ?>"<?php echo $store_storeled->Mfg->editAttributes() ?>>
</span>
<?php echo $store_storeled->Mfg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->HosoID->Visible) { // HosoID ?>
	<div id="r_HosoID" class="form-group row">
		<label id="elh_store_storeled_HosoID" for="x_HosoID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->HosoID->caption() ?><?php echo ($store_storeled->HosoID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->HosoID->cellAttributes() ?>>
<span id="el_store_storeled_HosoID">
<input type="text" data-table="store_storeled" data-field="x_HosoID" name="x_HosoID" id="x_HosoID" size="30" placeholder="<?php echo HtmlEncode($store_storeled->HosoID->getPlaceHolder()) ?>" value="<?php echo $store_storeled->HosoID->EditValue ?>"<?php echo $store_storeled->HosoID->editAttributes() ?>>
</span>
<?php echo $store_storeled->HosoID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_store_storeled_createdby" for="x_createdby" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->createdby->caption() ?><?php echo ($store_storeled->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->createdby->cellAttributes() ?>>
<span id="el_store_storeled_createdby">
<input type="text" data-table="store_storeled" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled->createdby->getPlaceHolder()) ?>" value="<?php echo $store_storeled->createdby->EditValue ?>"<?php echo $store_storeled->createdby->editAttributes() ?>>
</span>
<?php echo $store_storeled->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_store_storeled_createddatetime" for="x_createddatetime" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->createddatetime->caption() ?><?php echo ($store_storeled->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->createddatetime->cellAttributes() ?>>
<span id="el_store_storeled_createddatetime">
<input type="text" data-table="store_storeled" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($store_storeled->createddatetime->getPlaceHolder()) ?>" value="<?php echo $store_storeled->createddatetime->EditValue ?>"<?php echo $store_storeled->createddatetime->editAttributes() ?>>
<?php if (!$store_storeled->createddatetime->ReadOnly && !$store_storeled->createddatetime->Disabled && !isset($store_storeled->createddatetime->EditAttrs["readonly"]) && !isset($store_storeled->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storeledadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_storeled->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_store_storeled_modifiedby" for="x_modifiedby" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->modifiedby->caption() ?><?php echo ($store_storeled->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->modifiedby->cellAttributes() ?>>
<span id="el_store_storeled_modifiedby">
<input type="text" data-table="store_storeled" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled->modifiedby->getPlaceHolder()) ?>" value="<?php echo $store_storeled->modifiedby->EditValue ?>"<?php echo $store_storeled->modifiedby->editAttributes() ?>>
</span>
<?php echo $store_storeled->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_store_storeled_modifieddatetime" for="x_modifieddatetime" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->modifieddatetime->caption() ?><?php echo ($store_storeled->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->modifieddatetime->cellAttributes() ?>>
<span id="el_store_storeled_modifieddatetime">
<input type="text" data-table="store_storeled" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($store_storeled->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $store_storeled->modifieddatetime->EditValue ?>"<?php echo $store_storeled->modifieddatetime->editAttributes() ?>>
<?php if (!$store_storeled->modifieddatetime->ReadOnly && !$store_storeled->modifieddatetime->Disabled && !isset($store_storeled->modifieddatetime->EditAttrs["readonly"]) && !isset($store_storeled->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storeledadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_storeled->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_store_storeled_MFRCODE" for="x_MFRCODE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->MFRCODE->caption() ?><?php echo ($store_storeled->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->MFRCODE->cellAttributes() ?>>
<span id="el_store_storeled_MFRCODE">
<input type="text" data-table="store_storeled" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storeled->MFRCODE->EditValue ?>"<?php echo $store_storeled->MFRCODE->editAttributes() ?>>
</span>
<?php echo $store_storeled->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_store_storeled_Reception" for="x_Reception" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->Reception->caption() ?><?php echo ($store_storeled->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->Reception->cellAttributes() ?>>
<span id="el_store_storeled_Reception">
<input type="text" data-table="store_storeled" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($store_storeled->Reception->getPlaceHolder()) ?>" value="<?php echo $store_storeled->Reception->EditValue ?>"<?php echo $store_storeled->Reception->editAttributes() ?>>
</span>
<?php echo $store_storeled->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_store_storeled_PatID" for="x_PatID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->PatID->caption() ?><?php echo ($store_storeled->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->PatID->cellAttributes() ?>>
<span id="el_store_storeled_PatID">
<input type="text" data-table="store_storeled" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($store_storeled->PatID->getPlaceHolder()) ?>" value="<?php echo $store_storeled->PatID->EditValue ?>"<?php echo $store_storeled->PatID->editAttributes() ?>>
</span>
<?php echo $store_storeled->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_store_storeled_mrnno" for="x_mrnno" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->mrnno->caption() ?><?php echo ($store_storeled->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->mrnno->cellAttributes() ?>>
<span id="el_store_storeled_mrnno">
<input type="text" data-table="store_storeled" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled->mrnno->getPlaceHolder()) ?>" value="<?php echo $store_storeled->mrnno->EditValue ?>"<?php echo $store_storeled->mrnno->editAttributes() ?>>
</span>
<?php echo $store_storeled->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->BRNAME->Visible) { // BRNAME ?>
	<div id="r_BRNAME" class="form-group row">
		<label id="elh_store_storeled_BRNAME" for="x_BRNAME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->BRNAME->caption() ?><?php echo ($store_storeled->BRNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->BRNAME->cellAttributes() ?>>
<span id="el_store_storeled_BRNAME">
<input type="text" data-table="store_storeled" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled->BRNAME->getPlaceHolder()) ?>" value="<?php echo $store_storeled->BRNAME->EditValue ?>"<?php echo $store_storeled->BRNAME->editAttributes() ?>>
</span>
<?php echo $store_storeled->BRNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled->StoreID->Visible) { // StoreID ?>
	<div id="r_StoreID" class="form-group row">
		<label id="elh_store_storeled_StoreID" for="x_StoreID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled->StoreID->caption() ?><?php echo ($store_storeled->StoreID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div<?php echo $store_storeled->StoreID->cellAttributes() ?>>
<span id="el_store_storeled_StoreID">
<input type="text" data-table="store_storeled" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_storeled->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_storeled->StoreID->EditValue ?>"<?php echo $store_storeled->StoreID->editAttributes() ?>>
</span>
<?php echo $store_storeled->StoreID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$store_storeled_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_storeled_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_storeled_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$store_storeled_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_storeled_add->terminate();
?>