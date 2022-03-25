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
<?php include_once "header.php"; ?>
<script>
var fstore_storeledadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fstore_storeledadd = currentForm = new ew.Form("fstore_storeledadd", "add");

	// Validate form
	fstore_storeledadd.validate = function() {
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
			<?php if ($store_storeled_add->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->BRCODE->caption(), $store_storeled_add->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->BRCODE->errorMessage()) ?>");
			<?php if ($store_storeled_add->TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->TYPE->caption(), $store_storeled_add->TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->DN->Required) { ?>
				elm = this.getElements("x" + infix + "_DN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DN->caption(), $store_storeled_add->DN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->RDN->Required) { ?>
				elm = this.getElements("x" + infix + "_RDN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->RDN->caption(), $store_storeled_add->RDN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DT->caption(), $store_storeled_add->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->DT->errorMessage()) ?>");
			<?php if ($store_storeled_add->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PRC->caption(), $store_storeled_add->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->OQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->OQ->caption(), $store_storeled_add->OQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->OQ->errorMessage()) ?>");
			<?php if ($store_storeled_add->RQ->Required) { ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->RQ->caption(), $store_storeled_add->RQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->RQ->errorMessage()) ?>");
			<?php if ($store_storeled_add->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->MRQ->caption(), $store_storeled_add->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->MRQ->errorMessage()) ?>");
			<?php if ($store_storeled_add->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->IQ->caption(), $store_storeled_add->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->IQ->errorMessage()) ?>");
			<?php if ($store_storeled_add->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->BATCHNO->caption(), $store_storeled_add->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->EXPDT->caption(), $store_storeled_add->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->EXPDT->errorMessage()) ?>");
			<?php if ($store_storeled_add->BILLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->BILLNO->caption(), $store_storeled_add->BILLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->BILLDT->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->BILLDT->caption(), $store_storeled_add->BILLDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BILLDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->BILLDT->errorMessage()) ?>");
			<?php if ($store_storeled_add->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->RT->caption(), $store_storeled_add->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->RT->errorMessage()) ?>");
			<?php if ($store_storeled_add->VALUE->Required) { ?>
				elm = this.getElements("x" + infix + "_VALUE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->VALUE->caption(), $store_storeled_add->VALUE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VALUE");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->VALUE->errorMessage()) ?>");
			<?php if ($store_storeled_add->DISC->Required) { ?>
				elm = this.getElements("x" + infix + "_DISC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DISC->caption(), $store_storeled_add->DISC->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DISC");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->DISC->errorMessage()) ?>");
			<?php if ($store_storeled_add->TAXP->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->TAXP->caption(), $store_storeled_add->TAXP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->TAXP->errorMessage()) ?>");
			<?php if ($store_storeled_add->TAX->Required) { ?>
				elm = this.getElements("x" + infix + "_TAX");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->TAX->caption(), $store_storeled_add->TAX->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAX");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->TAX->errorMessage()) ?>");
			<?php if ($store_storeled_add->TAXR->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->TAXR->caption(), $store_storeled_add->TAXR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAXR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->TAXR->errorMessage()) ?>");
			<?php if ($store_storeled_add->DAMT->Required) { ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DAMT->caption(), $store_storeled_add->DAMT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->DAMT->errorMessage()) ?>");
			<?php if ($store_storeled_add->EMPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_EMPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->EMPNO->caption(), $store_storeled_add->EMPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PC->caption(), $store_storeled_add->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->DRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_DRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DRNAME->caption(), $store_storeled_add->DRNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->BTIME->Required) { ?>
				elm = this.getElements("x" + infix + "_BTIME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->BTIME->caption(), $store_storeled_add->BTIME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->ONO->Required) { ?>
				elm = this.getElements("x" + infix + "_ONO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->ONO->caption(), $store_storeled_add->ONO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->ODT->Required) { ?>
				elm = this.getElements("x" + infix + "_ODT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->ODT->caption(), $store_storeled_add->ODT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ODT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->ODT->errorMessage()) ?>");
			<?php if ($store_storeled_add->PURRT->Required) { ?>
				elm = this.getElements("x" + infix + "_PURRT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PURRT->caption(), $store_storeled_add->PURRT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PURRT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->PURRT->errorMessage()) ?>");
			<?php if ($store_storeled_add->GRP->Required) { ?>
				elm = this.getElements("x" + infix + "_GRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->GRP->caption(), $store_storeled_add->GRP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->IBATCH->Required) { ?>
				elm = this.getElements("x" + infix + "_IBATCH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->IBATCH->caption(), $store_storeled_add->IBATCH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->IPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_IPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->IPNO->caption(), $store_storeled_add->IPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->OPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_OPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->OPNO->caption(), $store_storeled_add->OPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->RECID->Required) { ?>
				elm = this.getElements("x" + infix + "_RECID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->RECID->caption(), $store_storeled_add->RECID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->FQTY->Required) { ?>
				elm = this.getElements("x" + infix + "_FQTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->FQTY->caption(), $store_storeled_add->FQTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FQTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->FQTY->errorMessage()) ?>");
			<?php if ($store_storeled_add->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->UR->caption(), $store_storeled_add->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->UR->errorMessage()) ?>");
			<?php if ($store_storeled_add->DCID->Required) { ?>
				elm = this.getElements("x" + infix + "_DCID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DCID->caption(), $store_storeled_add->DCID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->_USERID->Required) { ?>
				elm = this.getElements("x" + infix + "__USERID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->_USERID->caption(), $store_storeled_add->_USERID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->MODDT->Required) { ?>
				elm = this.getElements("x" + infix + "_MODDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->MODDT->caption(), $store_storeled_add->MODDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MODDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->MODDT->errorMessage()) ?>");
			<?php if ($store_storeled_add->FYM->Required) { ?>
				elm = this.getElements("x" + infix + "_FYM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->FYM->caption(), $store_storeled_add->FYM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->PRCBATCH->Required) { ?>
				elm = this.getElements("x" + infix + "_PRCBATCH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PRCBATCH->caption(), $store_storeled_add->PRCBATCH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->SLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_SLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->SLNO->caption(), $store_storeled_add->SLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SLNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->SLNO->errorMessage()) ?>");
			<?php if ($store_storeled_add->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->MRP->caption(), $store_storeled_add->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->MRP->errorMessage()) ?>");
			<?php if ($store_storeled_add->BILLYM->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLYM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->BILLYM->caption(), $store_storeled_add->BILLYM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->BILLGRP->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLGRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->BILLGRP->caption(), $store_storeled_add->BILLGRP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->STAFF->Required) { ?>
				elm = this.getElements("x" + infix + "_STAFF");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->STAFF->caption(), $store_storeled_add->STAFF->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->TEMPIPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_TEMPIPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->TEMPIPNO->caption(), $store_storeled_add->TEMPIPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->PRNTED->Required) { ?>
				elm = this.getElements("x" + infix + "_PRNTED");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PRNTED->caption(), $store_storeled_add->PRNTED->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->PATNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_PATNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PATNAME->caption(), $store_storeled_add->PATNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->PJVNO->Required) { ?>
				elm = this.getElements("x" + infix + "_PJVNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PJVNO->caption(), $store_storeled_add->PJVNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->PJVSLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_PJVSLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PJVSLNO->caption(), $store_storeled_add->PJVSLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->OTHDISC->Required) { ?>
				elm = this.getElements("x" + infix + "_OTHDISC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->OTHDISC->caption(), $store_storeled_add->OTHDISC->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OTHDISC");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->OTHDISC->errorMessage()) ?>");
			<?php if ($store_storeled_add->PJVYM->Required) { ?>
				elm = this.getElements("x" + infix + "_PJVYM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PJVYM->caption(), $store_storeled_add->PJVYM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->PURDISCPER->Required) { ?>
				elm = this.getElements("x" + infix + "_PURDISCPER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PURDISCPER->caption(), $store_storeled_add->PURDISCPER->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PURDISCPER");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->PURDISCPER->errorMessage()) ?>");
			<?php if ($store_storeled_add->CASHIER->Required) { ?>
				elm = this.getElements("x" + infix + "_CASHIER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->CASHIER->caption(), $store_storeled_add->CASHIER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->CASHTIME->Required) { ?>
				elm = this.getElements("x" + infix + "_CASHTIME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->CASHTIME->caption(), $store_storeled_add->CASHTIME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->CASHRECD->Required) { ?>
				elm = this.getElements("x" + infix + "_CASHRECD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->CASHRECD->caption(), $store_storeled_add->CASHRECD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CASHRECD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->CASHRECD->errorMessage()) ?>");
			<?php if ($store_storeled_add->CASHREFNO->Required) { ?>
				elm = this.getElements("x" + infix + "_CASHREFNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->CASHREFNO->caption(), $store_storeled_add->CASHREFNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->CASHIERSHIFT->Required) { ?>
				elm = this.getElements("x" + infix + "_CASHIERSHIFT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->CASHIERSHIFT->caption(), $store_storeled_add->CASHIERSHIFT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->PRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_PRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PRCODE->caption(), $store_storeled_add->PRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->RELEASEBY->Required) { ?>
				elm = this.getElements("x" + infix + "_RELEASEBY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->RELEASEBY->caption(), $store_storeled_add->RELEASEBY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->CRAUTHOR->Required) { ?>
				elm = this.getElements("x" + infix + "_CRAUTHOR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->CRAUTHOR->caption(), $store_storeled_add->CRAUTHOR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->PAYMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_PAYMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PAYMENT->caption(), $store_storeled_add->PAYMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->DRID->Required) { ?>
				elm = this.getElements("x" + infix + "_DRID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DRID->caption(), $store_storeled_add->DRID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->WARD->Required) { ?>
				elm = this.getElements("x" + infix + "_WARD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->WARD->caption(), $store_storeled_add->WARD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->STAXTYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_STAXTYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->STAXTYPE->caption(), $store_storeled_add->STAXTYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->PURDISCVAL->Required) { ?>
				elm = this.getElements("x" + infix + "_PURDISCVAL");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PURDISCVAL->caption(), $store_storeled_add->PURDISCVAL->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PURDISCVAL");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->PURDISCVAL->errorMessage()) ?>");
			<?php if ($store_storeled_add->RNDOFF->Required) { ?>
				elm = this.getElements("x" + infix + "_RNDOFF");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->RNDOFF->caption(), $store_storeled_add->RNDOFF->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RNDOFF");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->RNDOFF->errorMessage()) ?>");
			<?php if ($store_storeled_add->DISCONMRP->Required) { ?>
				elm = this.getElements("x" + infix + "_DISCONMRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DISCONMRP->caption(), $store_storeled_add->DISCONMRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DISCONMRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->DISCONMRP->errorMessage()) ?>");
			<?php if ($store_storeled_add->DELVDT->Required) { ?>
				elm = this.getElements("x" + infix + "_DELVDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DELVDT->caption(), $store_storeled_add->DELVDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DELVDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->DELVDT->errorMessage()) ?>");
			<?php if ($store_storeled_add->DELVTIME->Required) { ?>
				elm = this.getElements("x" + infix + "_DELVTIME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DELVTIME->caption(), $store_storeled_add->DELVTIME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->DELVBY->Required) { ?>
				elm = this.getElements("x" + infix + "_DELVBY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->DELVBY->caption(), $store_storeled_add->DELVBY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->HOSPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_HOSPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->HOSPNO->caption(), $store_storeled_add->HOSPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->pbv->Required) { ?>
				elm = this.getElements("x" + infix + "_pbv");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->pbv->caption(), $store_storeled_add->pbv->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pbv");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->pbv->errorMessage()) ?>");
			<?php if ($store_storeled_add->pbt->Required) { ?>
				elm = this.getElements("x" + infix + "_pbt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->pbt->caption(), $store_storeled_add->pbt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pbt");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->pbt->errorMessage()) ?>");
			<?php if ($store_storeled_add->SiNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->SiNo->caption(), $store_storeled_add->SiNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->SiNo->errorMessage()) ?>");
			<?php if ($store_storeled_add->Product->Required) { ?>
				elm = this.getElements("x" + infix + "_Product");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->Product->caption(), $store_storeled_add->Product->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->Mfg->Required) { ?>
				elm = this.getElements("x" + infix + "_Mfg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->Mfg->caption(), $store_storeled_add->Mfg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->HosoID->Required) { ?>
				elm = this.getElements("x" + infix + "_HosoID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->HosoID->caption(), $store_storeled_add->HosoID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HosoID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->HosoID->errorMessage()) ?>");
			<?php if ($store_storeled_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->createdby->caption(), $store_storeled_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->createddatetime->caption(), $store_storeled_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->createddatetime->errorMessage()) ?>");
			<?php if ($store_storeled_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->modifiedby->caption(), $store_storeled_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->modifieddatetime->caption(), $store_storeled_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->modifieddatetime->errorMessage()) ?>");
			<?php if ($store_storeled_add->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->MFRCODE->caption(), $store_storeled_add->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->Reception->caption(), $store_storeled_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->Reception->errorMessage()) ?>");
			<?php if ($store_storeled_add->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->PatID->caption(), $store_storeled_add->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storeled_add->PatID->errorMessage()) ?>");
			<?php if ($store_storeled_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->mrnno->caption(), $store_storeled_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storeled_add->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storeled_add->BRNAME->caption(), $store_storeled_add->BRNAME->RequiredErrorMessage)) ?>");
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
	fstore_storeledadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fstore_storeledadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fstore_storeledadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $store_storeled_add->showPageHeader(); ?>
<?php
$store_storeled_add->showMessage();
?>
<form name="fstore_storeledadd" id="fstore_storeledadd" class="<?php echo $store_storeled_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storeled">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$store_storeled_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($store_storeled_add->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_store_storeled_BRCODE" for="x_BRCODE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->BRCODE->caption() ?><?php echo $store_storeled_add->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->BRCODE->cellAttributes() ?>>
<span id="el_store_storeled_BRCODE">
<input type="text" data-table="store_storeled" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->BRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->BRCODE->EditValue ?>"<?php echo $store_storeled_add->BRCODE->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label id="elh_store_storeled_TYPE" for="x_TYPE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->TYPE->caption() ?><?php echo $store_storeled_add->TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->TYPE->cellAttributes() ?>>
<span id="el_store_storeled_TYPE">
<input type="text" data-table="store_storeled" data-field="x_TYPE" name="x_TYPE" id="x_TYPE" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($store_storeled_add->TYPE->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->TYPE->EditValue ?>"<?php echo $store_storeled_add->TYPE->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DN->Visible) { // DN ?>
	<div id="r_DN" class="form-group row">
		<label id="elh_store_storeled_DN" for="x_DN" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DN->caption() ?><?php echo $store_storeled_add->DN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DN->cellAttributes() ?>>
<span id="el_store_storeled_DN">
<input type="text" data-table="store_storeled" data-field="x_DN" name="x_DN" id="x_DN" size="30" maxlength="46" placeholder="<?php echo HtmlEncode($store_storeled_add->DN->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DN->EditValue ?>"<?php echo $store_storeled_add->DN->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->DN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->RDN->Visible) { // RDN ?>
	<div id="r_RDN" class="form-group row">
		<label id="elh_store_storeled_RDN" for="x_RDN" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->RDN->caption() ?><?php echo $store_storeled_add->RDN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->RDN->cellAttributes() ?>>
<span id="el_store_storeled_RDN">
<input type="text" data-table="store_storeled" data-field="x_RDN" name="x_RDN" id="x_RDN" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($store_storeled_add->RDN->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->RDN->EditValue ?>"<?php echo $store_storeled_add->RDN->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->RDN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_store_storeled_DT" for="x_DT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DT->caption() ?><?php echo $store_storeled_add->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DT->cellAttributes() ?>>
<span id="el_store_storeled_DT">
<input type="text" data-table="store_storeled" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($store_storeled_add->DT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DT->EditValue ?>"<?php echo $store_storeled_add->DT->editAttributes() ?>>
<?php if (!$store_storeled_add->DT->ReadOnly && !$store_storeled_add->DT->Disabled && !isset($store_storeled_add->DT->EditAttrs["readonly"]) && !isset($store_storeled_add->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storeledadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storeled_add->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_store_storeled_PRC" for="x_PRC" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PRC->caption() ?><?php echo $store_storeled_add->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PRC->cellAttributes() ?>>
<span id="el_store_storeled_PRC">
<input type="text" data-table="store_storeled" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storeled_add->PRC->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PRC->EditValue ?>"<?php echo $store_storeled_add->PRC->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_store_storeled_OQ" for="x_OQ" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->OQ->caption() ?><?php echo $store_storeled_add->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->OQ->cellAttributes() ?>>
<span id="el_store_storeled_OQ">
<input type="text" data-table="store_storeled" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->OQ->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->OQ->EditValue ?>"<?php echo $store_storeled_add->OQ->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_store_storeled_RQ" for="x_RQ" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->RQ->caption() ?><?php echo $store_storeled_add->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->RQ->cellAttributes() ?>>
<span id="el_store_storeled_RQ">
<input type="text" data-table="store_storeled" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->RQ->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->RQ->EditValue ?>"<?php echo $store_storeled_add->RQ->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_store_storeled_MRQ" for="x_MRQ" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->MRQ->caption() ?><?php echo $store_storeled_add->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->MRQ->cellAttributes() ?>>
<span id="el_store_storeled_MRQ">
<input type="text" data-table="store_storeled" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->MRQ->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->MRQ->EditValue ?>"<?php echo $store_storeled_add->MRQ->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_store_storeled_IQ" for="x_IQ" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->IQ->caption() ?><?php echo $store_storeled_add->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->IQ->cellAttributes() ?>>
<span id="el_store_storeled_IQ">
<input type="text" data-table="store_storeled" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->IQ->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->IQ->EditValue ?>"<?php echo $store_storeled_add->IQ->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_store_storeled_BATCHNO" for="x_BATCHNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->BATCHNO->caption() ?><?php echo $store_storeled_add->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->BATCHNO->cellAttributes() ?>>
<span id="el_store_storeled_BATCHNO">
<input type="text" data-table="store_storeled" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storeled_add->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->BATCHNO->EditValue ?>"<?php echo $store_storeled_add->BATCHNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_store_storeled_EXPDT" for="x_EXPDT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->EXPDT->caption() ?><?php echo $store_storeled_add->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->EXPDT->cellAttributes() ?>>
<span id="el_store_storeled_EXPDT">
<input type="text" data-table="store_storeled" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($store_storeled_add->EXPDT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->EXPDT->EditValue ?>"<?php echo $store_storeled_add->EXPDT->editAttributes() ?>>
<?php if (!$store_storeled_add->EXPDT->ReadOnly && !$store_storeled_add->EXPDT->Disabled && !isset($store_storeled_add->EXPDT->EditAttrs["readonly"]) && !isset($store_storeled_add->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storeledadd", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storeled_add->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->BILLNO->Visible) { // BILLNO ?>
	<div id="r_BILLNO" class="form-group row">
		<label id="elh_store_storeled_BILLNO" for="x_BILLNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->BILLNO->caption() ?><?php echo $store_storeled_add->BILLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->BILLNO->cellAttributes() ?>>
<span id="el_store_storeled_BILLNO">
<input type="text" data-table="store_storeled" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storeled_add->BILLNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->BILLNO->EditValue ?>"<?php echo $store_storeled_add->BILLNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->BILLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label id="elh_store_storeled_BILLDT" for="x_BILLDT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->BILLDT->caption() ?><?php echo $store_storeled_add->BILLDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->BILLDT->cellAttributes() ?>>
<span id="el_store_storeled_BILLDT">
<input type="text" data-table="store_storeled" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" placeholder="<?php echo HtmlEncode($store_storeled_add->BILLDT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->BILLDT->EditValue ?>"<?php echo $store_storeled_add->BILLDT->editAttributes() ?>>
<?php if (!$store_storeled_add->BILLDT->ReadOnly && !$store_storeled_add->BILLDT->Disabled && !isset($store_storeled_add->BILLDT->EditAttrs["readonly"]) && !isset($store_storeled_add->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storeledadd", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storeled_add->BILLDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_store_storeled_RT" for="x_RT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->RT->caption() ?><?php echo $store_storeled_add->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->RT->cellAttributes() ?>>
<span id="el_store_storeled_RT">
<input type="text" data-table="store_storeled" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->RT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->RT->EditValue ?>"<?php echo $store_storeled_add->RT->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->VALUE->Visible) { // VALUE ?>
	<div id="r_VALUE" class="form-group row">
		<label id="elh_store_storeled_VALUE" for="x_VALUE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->VALUE->caption() ?><?php echo $store_storeled_add->VALUE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->VALUE->cellAttributes() ?>>
<span id="el_store_storeled_VALUE">
<input type="text" data-table="store_storeled" data-field="x_VALUE" name="x_VALUE" id="x_VALUE" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->VALUE->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->VALUE->EditValue ?>"<?php echo $store_storeled_add->VALUE->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->VALUE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DISC->Visible) { // DISC ?>
	<div id="r_DISC" class="form-group row">
		<label id="elh_store_storeled_DISC" for="x_DISC" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DISC->caption() ?><?php echo $store_storeled_add->DISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DISC->cellAttributes() ?>>
<span id="el_store_storeled_DISC">
<input type="text" data-table="store_storeled" data-field="x_DISC" name="x_DISC" id="x_DISC" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->DISC->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DISC->EditValue ?>"<?php echo $store_storeled_add->DISC->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->DISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_store_storeled_TAXP" for="x_TAXP" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->TAXP->caption() ?><?php echo $store_storeled_add->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->TAXP->cellAttributes() ?>>
<span id="el_store_storeled_TAXP">
<input type="text" data-table="store_storeled" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->TAXP->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->TAXP->EditValue ?>"<?php echo $store_storeled_add->TAXP->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->TAX->Visible) { // TAX ?>
	<div id="r_TAX" class="form-group row">
		<label id="elh_store_storeled_TAX" for="x_TAX" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->TAX->caption() ?><?php echo $store_storeled_add->TAX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->TAX->cellAttributes() ?>>
<span id="el_store_storeled_TAX">
<input type="text" data-table="store_storeled" data-field="x_TAX" name="x_TAX" id="x_TAX" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->TAX->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->TAX->EditValue ?>"<?php echo $store_storeled_add->TAX->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->TAX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->TAXR->Visible) { // TAXR ?>
	<div id="r_TAXR" class="form-group row">
		<label id="elh_store_storeled_TAXR" for="x_TAXR" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->TAXR->caption() ?><?php echo $store_storeled_add->TAXR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->TAXR->cellAttributes() ?>>
<span id="el_store_storeled_TAXR">
<input type="text" data-table="store_storeled" data-field="x_TAXR" name="x_TAXR" id="x_TAXR" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->TAXR->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->TAXR->EditValue ?>"<?php echo $store_storeled_add->TAXR->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->TAXR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DAMT->Visible) { // DAMT ?>
	<div id="r_DAMT" class="form-group row">
		<label id="elh_store_storeled_DAMT" for="x_DAMT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DAMT->caption() ?><?php echo $store_storeled_add->DAMT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DAMT->cellAttributes() ?>>
<span id="el_store_storeled_DAMT">
<input type="text" data-table="store_storeled" data-field="x_DAMT" name="x_DAMT" id="x_DAMT" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->DAMT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DAMT->EditValue ?>"<?php echo $store_storeled_add->DAMT->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->DAMT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->EMPNO->Visible) { // EMPNO ?>
	<div id="r_EMPNO" class="form-group row">
		<label id="elh_store_storeled_EMPNO" for="x_EMPNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->EMPNO->caption() ?><?php echo $store_storeled_add->EMPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->EMPNO->cellAttributes() ?>>
<span id="el_store_storeled_EMPNO">
<input type="text" data-table="store_storeled" data-field="x_EMPNO" name="x_EMPNO" id="x_EMPNO" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storeled_add->EMPNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->EMPNO->EditValue ?>"<?php echo $store_storeled_add->EMPNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->EMPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_store_storeled_PC" for="x_PC" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PC->caption() ?><?php echo $store_storeled_add->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PC->cellAttributes() ?>>
<span id="el_store_storeled_PC">
<input type="text" data-table="store_storeled" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled_add->PC->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PC->EditValue ?>"<?php echo $store_storeled_add->PC->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DRNAME->Visible) { // DRNAME ?>
	<div id="r_DRNAME" class="form-group row">
		<label id="elh_store_storeled_DRNAME" for="x_DRNAME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DRNAME->caption() ?><?php echo $store_storeled_add->DRNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DRNAME->cellAttributes() ?>>
<span id="el_store_storeled_DRNAME">
<input type="text" data-table="store_storeled" data-field="x_DRNAME" name="x_DRNAME" id="x_DRNAME" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($store_storeled_add->DRNAME->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DRNAME->EditValue ?>"<?php echo $store_storeled_add->DRNAME->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->DRNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->BTIME->Visible) { // BTIME ?>
	<div id="r_BTIME" class="form-group row">
		<label id="elh_store_storeled_BTIME" for="x_BTIME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->BTIME->caption() ?><?php echo $store_storeled_add->BTIME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->BTIME->cellAttributes() ?>>
<span id="el_store_storeled_BTIME">
<input type="text" data-table="store_storeled" data-field="x_BTIME" name="x_BTIME" id="x_BTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($store_storeled_add->BTIME->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->BTIME->EditValue ?>"<?php echo $store_storeled_add->BTIME->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->BTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->ONO->Visible) { // ONO ?>
	<div id="r_ONO" class="form-group row">
		<label id="elh_store_storeled_ONO" for="x_ONO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->ONO->caption() ?><?php echo $store_storeled_add->ONO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->ONO->cellAttributes() ?>>
<span id="el_store_storeled_ONO">
<input type="text" data-table="store_storeled" data-field="x_ONO" name="x_ONO" id="x_ONO" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_storeled_add->ONO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->ONO->EditValue ?>"<?php echo $store_storeled_add->ONO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->ONO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->ODT->Visible) { // ODT ?>
	<div id="r_ODT" class="form-group row">
		<label id="elh_store_storeled_ODT" for="x_ODT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->ODT->caption() ?><?php echo $store_storeled_add->ODT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->ODT->cellAttributes() ?>>
<span id="el_store_storeled_ODT">
<input type="text" data-table="store_storeled" data-field="x_ODT" name="x_ODT" id="x_ODT" placeholder="<?php echo HtmlEncode($store_storeled_add->ODT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->ODT->EditValue ?>"<?php echo $store_storeled_add->ODT->editAttributes() ?>>
<?php if (!$store_storeled_add->ODT->ReadOnly && !$store_storeled_add->ODT->Disabled && !isset($store_storeled_add->ODT->EditAttrs["readonly"]) && !isset($store_storeled_add->ODT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storeledadd", "x_ODT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storeled_add->ODT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PURRT->Visible) { // PURRT ?>
	<div id="r_PURRT" class="form-group row">
		<label id="elh_store_storeled_PURRT" for="x_PURRT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PURRT->caption() ?><?php echo $store_storeled_add->PURRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PURRT->cellAttributes() ?>>
<span id="el_store_storeled_PURRT">
<input type="text" data-table="store_storeled" data-field="x_PURRT" name="x_PURRT" id="x_PURRT" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->PURRT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PURRT->EditValue ?>"<?php echo $store_storeled_add->PURRT->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PURRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->GRP->Visible) { // GRP ?>
	<div id="r_GRP" class="form-group row">
		<label id="elh_store_storeled_GRP" for="x_GRP" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->GRP->caption() ?><?php echo $store_storeled_add->GRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->GRP->cellAttributes() ?>>
<span id="el_store_storeled_GRP">
<input type="text" data-table="store_storeled" data-field="x_GRP" name="x_GRP" id="x_GRP" size="30" maxlength="21" placeholder="<?php echo HtmlEncode($store_storeled_add->GRP->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->GRP->EditValue ?>"<?php echo $store_storeled_add->GRP->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->GRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->IBATCH->Visible) { // IBATCH ?>
	<div id="r_IBATCH" class="form-group row">
		<label id="elh_store_storeled_IBATCH" for="x_IBATCH" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->IBATCH->caption() ?><?php echo $store_storeled_add->IBATCH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->IBATCH->cellAttributes() ?>>
<span id="el_store_storeled_IBATCH">
<input type="text" data-table="store_storeled" data-field="x_IBATCH" name="x_IBATCH" id="x_IBATCH" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($store_storeled_add->IBATCH->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->IBATCH->EditValue ?>"<?php echo $store_storeled_add->IBATCH->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->IBATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->IPNO->Visible) { // IPNO ?>
	<div id="r_IPNO" class="form-group row">
		<label id="elh_store_storeled_IPNO" for="x_IPNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->IPNO->caption() ?><?php echo $store_storeled_add->IPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->IPNO->cellAttributes() ?>>
<span id="el_store_storeled_IPNO">
<input type="text" data-table="store_storeled" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($store_storeled_add->IPNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->IPNO->EditValue ?>"<?php echo $store_storeled_add->IPNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->IPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->OPNO->Visible) { // OPNO ?>
	<div id="r_OPNO" class="form-group row">
		<label id="elh_store_storeled_OPNO" for="x_OPNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->OPNO->caption() ?><?php echo $store_storeled_add->OPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->OPNO->cellAttributes() ?>>
<span id="el_store_storeled_OPNO">
<input type="text" data-table="store_storeled" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storeled_add->OPNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->OPNO->EditValue ?>"<?php echo $store_storeled_add->OPNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->OPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->RECID->Visible) { // RECID ?>
	<div id="r_RECID" class="form-group row">
		<label id="elh_store_storeled_RECID" for="x_RECID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->RECID->caption() ?><?php echo $store_storeled_add->RECID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->RECID->cellAttributes() ?>>
<span id="el_store_storeled_RECID">
<input type="text" data-table="store_storeled" data-field="x_RECID" name="x_RECID" id="x_RECID" size="30" maxlength="18" placeholder="<?php echo HtmlEncode($store_storeled_add->RECID->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->RECID->EditValue ?>"<?php echo $store_storeled_add->RECID->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->RECID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->FQTY->Visible) { // FQTY ?>
	<div id="r_FQTY" class="form-group row">
		<label id="elh_store_storeled_FQTY" for="x_FQTY" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->FQTY->caption() ?><?php echo $store_storeled_add->FQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->FQTY->cellAttributes() ?>>
<span id="el_store_storeled_FQTY">
<input type="text" data-table="store_storeled" data-field="x_FQTY" name="x_FQTY" id="x_FQTY" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->FQTY->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->FQTY->EditValue ?>"<?php echo $store_storeled_add->FQTY->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->FQTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_store_storeled_UR" for="x_UR" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->UR->caption() ?><?php echo $store_storeled_add->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->UR->cellAttributes() ?>>
<span id="el_store_storeled_UR">
<input type="text" data-table="store_storeled" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->UR->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->UR->EditValue ?>"<?php echo $store_storeled_add->UR->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DCID->Visible) { // DCID ?>
	<div id="r_DCID" class="form-group row">
		<label id="elh_store_storeled_DCID" for="x_DCID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DCID->caption() ?><?php echo $store_storeled_add->DCID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DCID->cellAttributes() ?>>
<span id="el_store_storeled_DCID">
<input type="text" data-table="store_storeled" data-field="x_DCID" name="x_DCID" id="x_DCID" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storeled_add->DCID->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DCID->EditValue ?>"<?php echo $store_storeled_add->DCID->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->DCID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->_USERID->Visible) { // USERID ?>
	<div id="r__USERID" class="form-group row">
		<label id="elh_store_storeled__USERID" for="x__USERID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->_USERID->caption() ?><?php echo $store_storeled_add->_USERID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->_USERID->cellAttributes() ?>>
<span id="el_store_storeled__USERID">
<input type="text" data-table="store_storeled" data-field="x__USERID" name="x__USERID" id="x__USERID" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled_add->_USERID->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->_USERID->EditValue ?>"<?php echo $store_storeled_add->_USERID->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->_USERID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->MODDT->Visible) { // MODDT ?>
	<div id="r_MODDT" class="form-group row">
		<label id="elh_store_storeled_MODDT" for="x_MODDT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->MODDT->caption() ?><?php echo $store_storeled_add->MODDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->MODDT->cellAttributes() ?>>
<span id="el_store_storeled_MODDT">
<input type="text" data-table="store_storeled" data-field="x_MODDT" name="x_MODDT" id="x_MODDT" placeholder="<?php echo HtmlEncode($store_storeled_add->MODDT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->MODDT->EditValue ?>"<?php echo $store_storeled_add->MODDT->editAttributes() ?>>
<?php if (!$store_storeled_add->MODDT->ReadOnly && !$store_storeled_add->MODDT->Disabled && !isset($store_storeled_add->MODDT->EditAttrs["readonly"]) && !isset($store_storeled_add->MODDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storeledadd", "x_MODDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storeled_add->MODDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->FYM->Visible) { // FYM ?>
	<div id="r_FYM" class="form-group row">
		<label id="elh_store_storeled_FYM" for="x_FYM" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->FYM->caption() ?><?php echo $store_storeled_add->FYM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->FYM->cellAttributes() ?>>
<span id="el_store_storeled_FYM">
<input type="text" data-table="store_storeled" data-field="x_FYM" name="x_FYM" id="x_FYM" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($store_storeled_add->FYM->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->FYM->EditValue ?>"<?php echo $store_storeled_add->FYM->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->FYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PRCBATCH->Visible) { // PRCBATCH ?>
	<div id="r_PRCBATCH" class="form-group row">
		<label id="elh_store_storeled_PRCBATCH" for="x_PRCBATCH" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PRCBATCH->caption() ?><?php echo $store_storeled_add->PRCBATCH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PRCBATCH->cellAttributes() ?>>
<span id="el_store_storeled_PRCBATCH">
<input type="text" data-table="store_storeled" data-field="x_PRCBATCH" name="x_PRCBATCH" id="x_PRCBATCH" size="30" maxlength="23" placeholder="<?php echo HtmlEncode($store_storeled_add->PRCBATCH->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PRCBATCH->EditValue ?>"<?php echo $store_storeled_add->PRCBATCH->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PRCBATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->SLNO->Visible) { // SLNO ?>
	<div id="r_SLNO" class="form-group row">
		<label id="elh_store_storeled_SLNO" for="x_SLNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->SLNO->caption() ?><?php echo $store_storeled_add->SLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->SLNO->cellAttributes() ?>>
<span id="el_store_storeled_SLNO">
<input type="text" data-table="store_storeled" data-field="x_SLNO" name="x_SLNO" id="x_SLNO" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->SLNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->SLNO->EditValue ?>"<?php echo $store_storeled_add->SLNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->SLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_store_storeled_MRP" for="x_MRP" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->MRP->caption() ?><?php echo $store_storeled_add->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->MRP->cellAttributes() ?>>
<span id="el_store_storeled_MRP">
<input type="text" data-table="store_storeled" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->MRP->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->MRP->EditValue ?>"<?php echo $store_storeled_add->MRP->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->BILLYM->Visible) { // BILLYM ?>
	<div id="r_BILLYM" class="form-group row">
		<label id="elh_store_storeled_BILLYM" for="x_BILLYM" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->BILLYM->caption() ?><?php echo $store_storeled_add->BILLYM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->BILLYM->cellAttributes() ?>>
<span id="el_store_storeled_BILLYM">
<input type="text" data-table="store_storeled" data-field="x_BILLYM" name="x_BILLYM" id="x_BILLYM" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($store_storeled_add->BILLYM->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->BILLYM->EditValue ?>"<?php echo $store_storeled_add->BILLYM->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->BILLYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->BILLGRP->Visible) { // BILLGRP ?>
	<div id="r_BILLGRP" class="form-group row">
		<label id="elh_store_storeled_BILLGRP" for="x_BILLGRP" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->BILLGRP->caption() ?><?php echo $store_storeled_add->BILLGRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->BILLGRP->cellAttributes() ?>>
<span id="el_store_storeled_BILLGRP">
<input type="text" data-table="store_storeled" data-field="x_BILLGRP" name="x_BILLGRP" id="x_BILLGRP" size="30" maxlength="21" placeholder="<?php echo HtmlEncode($store_storeled_add->BILLGRP->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->BILLGRP->EditValue ?>"<?php echo $store_storeled_add->BILLGRP->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->BILLGRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->STAFF->Visible) { // STAFF ?>
	<div id="r_STAFF" class="form-group row">
		<label id="elh_store_storeled_STAFF" for="x_STAFF" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->STAFF->caption() ?><?php echo $store_storeled_add->STAFF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->STAFF->cellAttributes() ?>>
<span id="el_store_storeled_STAFF">
<input type="text" data-table="store_storeled" data-field="x_STAFF" name="x_STAFF" id="x_STAFF" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($store_storeled_add->STAFF->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->STAFF->EditValue ?>"<?php echo $store_storeled_add->STAFF->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->STAFF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<div id="r_TEMPIPNO" class="form-group row">
		<label id="elh_store_storeled_TEMPIPNO" for="x_TEMPIPNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->TEMPIPNO->caption() ?><?php echo $store_storeled_add->TEMPIPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->TEMPIPNO->cellAttributes() ?>>
<span id="el_store_storeled_TEMPIPNO">
<input type="text" data-table="store_storeled" data-field="x_TEMPIPNO" name="x_TEMPIPNO" id="x_TEMPIPNO" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($store_storeled_add->TEMPIPNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->TEMPIPNO->EditValue ?>"<?php echo $store_storeled_add->TEMPIPNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->TEMPIPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PRNTED->Visible) { // PRNTED ?>
	<div id="r_PRNTED" class="form-group row">
		<label id="elh_store_storeled_PRNTED" for="x_PRNTED" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PRNTED->caption() ?><?php echo $store_storeled_add->PRNTED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PRNTED->cellAttributes() ?>>
<span id="el_store_storeled_PRNTED">
<input type="text" data-table="store_storeled" data-field="x_PRNTED" name="x_PRNTED" id="x_PRNTED" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storeled_add->PRNTED->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PRNTED->EditValue ?>"<?php echo $store_storeled_add->PRNTED->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PRNTED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PATNAME->Visible) { // PATNAME ?>
	<div id="r_PATNAME" class="form-group row">
		<label id="elh_store_storeled_PATNAME" for="x_PATNAME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PATNAME->caption() ?><?php echo $store_storeled_add->PATNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PATNAME->cellAttributes() ?>>
<span id="el_store_storeled_PATNAME">
<input type="text" data-table="store_storeled" data-field="x_PATNAME" name="x_PATNAME" id="x_PATNAME" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($store_storeled_add->PATNAME->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PATNAME->EditValue ?>"<?php echo $store_storeled_add->PATNAME->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PATNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PJVNO->Visible) { // PJVNO ?>
	<div id="r_PJVNO" class="form-group row">
		<label id="elh_store_storeled_PJVNO" for="x_PJVNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PJVNO->caption() ?><?php echo $store_storeled_add->PJVNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PJVNO->cellAttributes() ?>>
<span id="el_store_storeled_PJVNO">
<input type="text" data-table="store_storeled" data-field="x_PJVNO" name="x_PJVNO" id="x_PJVNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled_add->PJVNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PJVNO->EditValue ?>"<?php echo $store_storeled_add->PJVNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PJVNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PJVSLNO->Visible) { // PJVSLNO ?>
	<div id="r_PJVSLNO" class="form-group row">
		<label id="elh_store_storeled_PJVSLNO" for="x_PJVSLNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PJVSLNO->caption() ?><?php echo $store_storeled_add->PJVSLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PJVSLNO->cellAttributes() ?>>
<span id="el_store_storeled_PJVSLNO">
<input type="text" data-table="store_storeled" data-field="x_PJVSLNO" name="x_PJVSLNO" id="x_PJVSLNO" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storeled_add->PJVSLNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PJVSLNO->EditValue ?>"<?php echo $store_storeled_add->PJVSLNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PJVSLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->OTHDISC->Visible) { // OTHDISC ?>
	<div id="r_OTHDISC" class="form-group row">
		<label id="elh_store_storeled_OTHDISC" for="x_OTHDISC" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->OTHDISC->caption() ?><?php echo $store_storeled_add->OTHDISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->OTHDISC->cellAttributes() ?>>
<span id="el_store_storeled_OTHDISC">
<input type="text" data-table="store_storeled" data-field="x_OTHDISC" name="x_OTHDISC" id="x_OTHDISC" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->OTHDISC->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->OTHDISC->EditValue ?>"<?php echo $store_storeled_add->OTHDISC->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->OTHDISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PJVYM->Visible) { // PJVYM ?>
	<div id="r_PJVYM" class="form-group row">
		<label id="elh_store_storeled_PJVYM" for="x_PJVYM" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PJVYM->caption() ?><?php echo $store_storeled_add->PJVYM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PJVYM->cellAttributes() ?>>
<span id="el_store_storeled_PJVYM">
<input type="text" data-table="store_storeled" data-field="x_PJVYM" name="x_PJVYM" id="x_PJVYM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($store_storeled_add->PJVYM->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PJVYM->EditValue ?>"<?php echo $store_storeled_add->PJVYM->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PJVYM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PURDISCPER->Visible) { // PURDISCPER ?>
	<div id="r_PURDISCPER" class="form-group row">
		<label id="elh_store_storeled_PURDISCPER" for="x_PURDISCPER" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PURDISCPER->caption() ?><?php echo $store_storeled_add->PURDISCPER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PURDISCPER->cellAttributes() ?>>
<span id="el_store_storeled_PURDISCPER">
<input type="text" data-table="store_storeled" data-field="x_PURDISCPER" name="x_PURDISCPER" id="x_PURDISCPER" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->PURDISCPER->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PURDISCPER->EditValue ?>"<?php echo $store_storeled_add->PURDISCPER->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PURDISCPER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->CASHIER->Visible) { // CASHIER ?>
	<div id="r_CASHIER" class="form-group row">
		<label id="elh_store_storeled_CASHIER" for="x_CASHIER" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->CASHIER->caption() ?><?php echo $store_storeled_add->CASHIER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->CASHIER->cellAttributes() ?>>
<span id="el_store_storeled_CASHIER">
<input type="text" data-table="store_storeled" data-field="x_CASHIER" name="x_CASHIER" id="x_CASHIER" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled_add->CASHIER->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->CASHIER->EditValue ?>"<?php echo $store_storeled_add->CASHIER->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->CASHIER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->CASHTIME->Visible) { // CASHTIME ?>
	<div id="r_CASHTIME" class="form-group row">
		<label id="elh_store_storeled_CASHTIME" for="x_CASHTIME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->CASHTIME->caption() ?><?php echo $store_storeled_add->CASHTIME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->CASHTIME->cellAttributes() ?>>
<span id="el_store_storeled_CASHTIME">
<input type="text" data-table="store_storeled" data-field="x_CASHTIME" name="x_CASHTIME" id="x_CASHTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($store_storeled_add->CASHTIME->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->CASHTIME->EditValue ?>"<?php echo $store_storeled_add->CASHTIME->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->CASHTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->CASHRECD->Visible) { // CASHRECD ?>
	<div id="r_CASHRECD" class="form-group row">
		<label id="elh_store_storeled_CASHRECD" for="x_CASHRECD" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->CASHRECD->caption() ?><?php echo $store_storeled_add->CASHRECD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->CASHRECD->cellAttributes() ?>>
<span id="el_store_storeled_CASHRECD">
<input type="text" data-table="store_storeled" data-field="x_CASHRECD" name="x_CASHRECD" id="x_CASHRECD" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->CASHRECD->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->CASHRECD->EditValue ?>"<?php echo $store_storeled_add->CASHRECD->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->CASHRECD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->CASHREFNO->Visible) { // CASHREFNO ?>
	<div id="r_CASHREFNO" class="form-group row">
		<label id="elh_store_storeled_CASHREFNO" for="x_CASHREFNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->CASHREFNO->caption() ?><?php echo $store_storeled_add->CASHREFNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->CASHREFNO->cellAttributes() ?>>
<span id="el_store_storeled_CASHREFNO">
<input type="text" data-table="store_storeled" data-field="x_CASHREFNO" name="x_CASHREFNO" id="x_CASHREFNO" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled_add->CASHREFNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->CASHREFNO->EditValue ?>"<?php echo $store_storeled_add->CASHREFNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->CASHREFNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<div id="r_CASHIERSHIFT" class="form-group row">
		<label id="elh_store_storeled_CASHIERSHIFT" for="x_CASHIERSHIFT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->CASHIERSHIFT->caption() ?><?php echo $store_storeled_add->CASHIERSHIFT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_store_storeled_CASHIERSHIFT">
<input type="text" data-table="store_storeled" data-field="x_CASHIERSHIFT" name="x_CASHIERSHIFT" id="x_CASHIERSHIFT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storeled_add->CASHIERSHIFT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->CASHIERSHIFT->EditValue ?>"<?php echo $store_storeled_add->CASHIERSHIFT->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->CASHIERSHIFT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label id="elh_store_storeled_PRCODE" for="x_PRCODE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PRCODE->caption() ?><?php echo $store_storeled_add->PRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PRCODE->cellAttributes() ?>>
<span id="el_store_storeled_PRCODE">
<input type="text" data-table="store_storeled" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storeled_add->PRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PRCODE->EditValue ?>"<?php echo $store_storeled_add->PRCODE->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->RELEASEBY->Visible) { // RELEASEBY ?>
	<div id="r_RELEASEBY" class="form-group row">
		<label id="elh_store_storeled_RELEASEBY" for="x_RELEASEBY" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->RELEASEBY->caption() ?><?php echo $store_storeled_add->RELEASEBY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->RELEASEBY->cellAttributes() ?>>
<span id="el_store_storeled_RELEASEBY">
<input type="text" data-table="store_storeled" data-field="x_RELEASEBY" name="x_RELEASEBY" id="x_RELEASEBY" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_storeled_add->RELEASEBY->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->RELEASEBY->EditValue ?>"<?php echo $store_storeled_add->RELEASEBY->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->RELEASEBY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<div id="r_CRAUTHOR" class="form-group row">
		<label id="elh_store_storeled_CRAUTHOR" for="x_CRAUTHOR" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->CRAUTHOR->caption() ?><?php echo $store_storeled_add->CRAUTHOR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->CRAUTHOR->cellAttributes() ?>>
<span id="el_store_storeled_CRAUTHOR">
<input type="text" data-table="store_storeled" data-field="x_CRAUTHOR" name="x_CRAUTHOR" id="x_CRAUTHOR" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_storeled_add->CRAUTHOR->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->CRAUTHOR->EditValue ?>"<?php echo $store_storeled_add->CRAUTHOR->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->CRAUTHOR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PAYMENT->Visible) { // PAYMENT ?>
	<div id="r_PAYMENT" class="form-group row">
		<label id="elh_store_storeled_PAYMENT" for="x_PAYMENT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PAYMENT->caption() ?><?php echo $store_storeled_add->PAYMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PAYMENT->cellAttributes() ?>>
<span id="el_store_storeled_PAYMENT">
<input type="text" data-table="store_storeled" data-field="x_PAYMENT" name="x_PAYMENT" id="x_PAYMENT" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($store_storeled_add->PAYMENT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PAYMENT->EditValue ?>"<?php echo $store_storeled_add->PAYMENT->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PAYMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label id="elh_store_storeled_DRID" for="x_DRID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DRID->caption() ?><?php echo $store_storeled_add->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DRID->cellAttributes() ?>>
<span id="el_store_storeled_DRID">
<input type="text" data-table="store_storeled" data-field="x_DRID" name="x_DRID" id="x_DRID" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled_add->DRID->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DRID->EditValue ?>"<?php echo $store_storeled_add->DRID->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->DRID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->WARD->Visible) { // WARD ?>
	<div id="r_WARD" class="form-group row">
		<label id="elh_store_storeled_WARD" for="x_WARD" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->WARD->caption() ?><?php echo $store_storeled_add->WARD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->WARD->cellAttributes() ?>>
<span id="el_store_storeled_WARD">
<input type="text" data-table="store_storeled" data-field="x_WARD" name="x_WARD" id="x_WARD" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($store_storeled_add->WARD->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->WARD->EditValue ?>"<?php echo $store_storeled_add->WARD->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->WARD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->STAXTYPE->Visible) { // STAXTYPE ?>
	<div id="r_STAXTYPE" class="form-group row">
		<label id="elh_store_storeled_STAXTYPE" for="x_STAXTYPE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->STAXTYPE->caption() ?><?php echo $store_storeled_add->STAXTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->STAXTYPE->cellAttributes() ?>>
<span id="el_store_storeled_STAXTYPE">
<input type="text" data-table="store_storeled" data-field="x_STAXTYPE" name="x_STAXTYPE" id="x_STAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storeled_add->STAXTYPE->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->STAXTYPE->EditValue ?>"<?php echo $store_storeled_add->STAXTYPE->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->STAXTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<div id="r_PURDISCVAL" class="form-group row">
		<label id="elh_store_storeled_PURDISCVAL" for="x_PURDISCVAL" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PURDISCVAL->caption() ?><?php echo $store_storeled_add->PURDISCVAL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PURDISCVAL->cellAttributes() ?>>
<span id="el_store_storeled_PURDISCVAL">
<input type="text" data-table="store_storeled" data-field="x_PURDISCVAL" name="x_PURDISCVAL" id="x_PURDISCVAL" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->PURDISCVAL->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PURDISCVAL->EditValue ?>"<?php echo $store_storeled_add->PURDISCVAL->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PURDISCVAL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->RNDOFF->Visible) { // RNDOFF ?>
	<div id="r_RNDOFF" class="form-group row">
		<label id="elh_store_storeled_RNDOFF" for="x_RNDOFF" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->RNDOFF->caption() ?><?php echo $store_storeled_add->RNDOFF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->RNDOFF->cellAttributes() ?>>
<span id="el_store_storeled_RNDOFF">
<input type="text" data-table="store_storeled" data-field="x_RNDOFF" name="x_RNDOFF" id="x_RNDOFF" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->RNDOFF->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->RNDOFF->EditValue ?>"<?php echo $store_storeled_add->RNDOFF->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->RNDOFF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DISCONMRP->Visible) { // DISCONMRP ?>
	<div id="r_DISCONMRP" class="form-group row">
		<label id="elh_store_storeled_DISCONMRP" for="x_DISCONMRP" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DISCONMRP->caption() ?><?php echo $store_storeled_add->DISCONMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DISCONMRP->cellAttributes() ?>>
<span id="el_store_storeled_DISCONMRP">
<input type="text" data-table="store_storeled" data-field="x_DISCONMRP" name="x_DISCONMRP" id="x_DISCONMRP" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->DISCONMRP->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DISCONMRP->EditValue ?>"<?php echo $store_storeled_add->DISCONMRP->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->DISCONMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DELVDT->Visible) { // DELVDT ?>
	<div id="r_DELVDT" class="form-group row">
		<label id="elh_store_storeled_DELVDT" for="x_DELVDT" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DELVDT->caption() ?><?php echo $store_storeled_add->DELVDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DELVDT->cellAttributes() ?>>
<span id="el_store_storeled_DELVDT">
<input type="text" data-table="store_storeled" data-field="x_DELVDT" name="x_DELVDT" id="x_DELVDT" placeholder="<?php echo HtmlEncode($store_storeled_add->DELVDT->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DELVDT->EditValue ?>"<?php echo $store_storeled_add->DELVDT->editAttributes() ?>>
<?php if (!$store_storeled_add->DELVDT->ReadOnly && !$store_storeled_add->DELVDT->Disabled && !isset($store_storeled_add->DELVDT->EditAttrs["readonly"]) && !isset($store_storeled_add->DELVDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storeledadd", "x_DELVDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storeled_add->DELVDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DELVTIME->Visible) { // DELVTIME ?>
	<div id="r_DELVTIME" class="form-group row">
		<label id="elh_store_storeled_DELVTIME" for="x_DELVTIME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DELVTIME->caption() ?><?php echo $store_storeled_add->DELVTIME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DELVTIME->cellAttributes() ?>>
<span id="el_store_storeled_DELVTIME">
<input type="text" data-table="store_storeled" data-field="x_DELVTIME" name="x_DELVTIME" id="x_DELVTIME" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($store_storeled_add->DELVTIME->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DELVTIME->EditValue ?>"<?php echo $store_storeled_add->DELVTIME->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->DELVTIME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->DELVBY->Visible) { // DELVBY ?>
	<div id="r_DELVBY" class="form-group row">
		<label id="elh_store_storeled_DELVBY" for="x_DELVBY" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->DELVBY->caption() ?><?php echo $store_storeled_add->DELVBY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->DELVBY->cellAttributes() ?>>
<span id="el_store_storeled_DELVBY">
<input type="text" data-table="store_storeled" data-field="x_DELVBY" name="x_DELVBY" id="x_DELVBY" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storeled_add->DELVBY->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->DELVBY->EditValue ?>"<?php echo $store_storeled_add->DELVBY->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->DELVBY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->HOSPNO->Visible) { // HOSPNO ?>
	<div id="r_HOSPNO" class="form-group row">
		<label id="elh_store_storeled_HOSPNO" for="x_HOSPNO" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->HOSPNO->caption() ?><?php echo $store_storeled_add->HOSPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->HOSPNO->cellAttributes() ?>>
<span id="el_store_storeled_HOSPNO">
<input type="text" data-table="store_storeled" data-field="x_HOSPNO" name="x_HOSPNO" id="x_HOSPNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storeled_add->HOSPNO->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->HOSPNO->EditValue ?>"<?php echo $store_storeled_add->HOSPNO->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->HOSPNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->pbv->Visible) { // pbv ?>
	<div id="r_pbv" class="form-group row">
		<label id="elh_store_storeled_pbv" for="x_pbv" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->pbv->caption() ?><?php echo $store_storeled_add->pbv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->pbv->cellAttributes() ?>>
<span id="el_store_storeled_pbv">
<input type="text" data-table="store_storeled" data-field="x_pbv" name="x_pbv" id="x_pbv" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->pbv->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->pbv->EditValue ?>"<?php echo $store_storeled_add->pbv->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->pbv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->pbt->Visible) { // pbt ?>
	<div id="r_pbt" class="form-group row">
		<label id="elh_store_storeled_pbt" for="x_pbt" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->pbt->caption() ?><?php echo $store_storeled_add->pbt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->pbt->cellAttributes() ?>>
<span id="el_store_storeled_pbt">
<input type="text" data-table="store_storeled" data-field="x_pbt" name="x_pbt" id="x_pbt" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->pbt->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->pbt->EditValue ?>"<?php echo $store_storeled_add->pbt->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->pbt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->SiNo->Visible) { // SiNo ?>
	<div id="r_SiNo" class="form-group row">
		<label id="elh_store_storeled_SiNo" for="x_SiNo" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->SiNo->caption() ?><?php echo $store_storeled_add->SiNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->SiNo->cellAttributes() ?>>
<span id="el_store_storeled_SiNo">
<input type="text" data-table="store_storeled" data-field="x_SiNo" name="x_SiNo" id="x_SiNo" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->SiNo->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->SiNo->EditValue ?>"<?php echo $store_storeled_add->SiNo->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->SiNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->Product->Visible) { // Product ?>
	<div id="r_Product" class="form-group row">
		<label id="elh_store_storeled_Product" for="x_Product" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->Product->caption() ?><?php echo $store_storeled_add->Product->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->Product->cellAttributes() ?>>
<span id="el_store_storeled_Product">
<input type="text" data-table="store_storeled" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled_add->Product->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->Product->EditValue ?>"<?php echo $store_storeled_add->Product->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->Product->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->Mfg->Visible) { // Mfg ?>
	<div id="r_Mfg" class="form-group row">
		<label id="elh_store_storeled_Mfg" for="x_Mfg" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->Mfg->caption() ?><?php echo $store_storeled_add->Mfg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->Mfg->cellAttributes() ?>>
<span id="el_store_storeled_Mfg">
<input type="text" data-table="store_storeled" data-field="x_Mfg" name="x_Mfg" id="x_Mfg" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled_add->Mfg->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->Mfg->EditValue ?>"<?php echo $store_storeled_add->Mfg->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->Mfg->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->HosoID->Visible) { // HosoID ?>
	<div id="r_HosoID" class="form-group row">
		<label id="elh_store_storeled_HosoID" for="x_HosoID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->HosoID->caption() ?><?php echo $store_storeled_add->HosoID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->HosoID->cellAttributes() ?>>
<span id="el_store_storeled_HosoID">
<input type="text" data-table="store_storeled" data-field="x_HosoID" name="x_HosoID" id="x_HosoID" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->HosoID->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->HosoID->EditValue ?>"<?php echo $store_storeled_add->HosoID->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->HosoID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_store_storeled_createdby" for="x_createdby" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->createdby->caption() ?><?php echo $store_storeled_add->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->createdby->cellAttributes() ?>>
<span id="el_store_storeled_createdby">
<input type="text" data-table="store_storeled" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled_add->createdby->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->createdby->EditValue ?>"<?php echo $store_storeled_add->createdby->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_store_storeled_createddatetime" for="x_createddatetime" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->createddatetime->caption() ?><?php echo $store_storeled_add->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->createddatetime->cellAttributes() ?>>
<span id="el_store_storeled_createddatetime">
<input type="text" data-table="store_storeled" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($store_storeled_add->createddatetime->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->createddatetime->EditValue ?>"<?php echo $store_storeled_add->createddatetime->editAttributes() ?>>
<?php if (!$store_storeled_add->createddatetime->ReadOnly && !$store_storeled_add->createddatetime->Disabled && !isset($store_storeled_add->createddatetime->EditAttrs["readonly"]) && !isset($store_storeled_add->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storeledadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storeled_add->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_store_storeled_modifiedby" for="x_modifiedby" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->modifiedby->caption() ?><?php echo $store_storeled_add->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->modifiedby->cellAttributes() ?>>
<span id="el_store_storeled_modifiedby">
<input type="text" data-table="store_storeled" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled_add->modifiedby->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->modifiedby->EditValue ?>"<?php echo $store_storeled_add->modifiedby->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_store_storeled_modifieddatetime" for="x_modifieddatetime" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->modifieddatetime->caption() ?><?php echo $store_storeled_add->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->modifieddatetime->cellAttributes() ?>>
<span id="el_store_storeled_modifieddatetime">
<input type="text" data-table="store_storeled" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($store_storeled_add->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->modifieddatetime->EditValue ?>"<?php echo $store_storeled_add->modifieddatetime->editAttributes() ?>>
<?php if (!$store_storeled_add->modifieddatetime->ReadOnly && !$store_storeled_add->modifieddatetime->Disabled && !isset($store_storeled_add->modifieddatetime->EditAttrs["readonly"]) && !isset($store_storeled_add->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storeledadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storeled_add->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_store_storeled_MFRCODE" for="x_MFRCODE" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->MFRCODE->caption() ?><?php echo $store_storeled_add->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->MFRCODE->cellAttributes() ?>>
<span id="el_store_storeled_MFRCODE">
<input type="text" data-table="store_storeled" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled_add->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->MFRCODE->EditValue ?>"<?php echo $store_storeled_add->MFRCODE->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_store_storeled_Reception" for="x_Reception" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->Reception->caption() ?><?php echo $store_storeled_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->Reception->cellAttributes() ?>>
<span id="el_store_storeled_Reception">
<input type="text" data-table="store_storeled" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->Reception->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->Reception->EditValue ?>"<?php echo $store_storeled_add->Reception->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_store_storeled_PatID" for="x_PatID" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->PatID->caption() ?><?php echo $store_storeled_add->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->PatID->cellAttributes() ?>>
<span id="el_store_storeled_PatID">
<input type="text" data-table="store_storeled" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($store_storeled_add->PatID->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->PatID->EditValue ?>"<?php echo $store_storeled_add->PatID->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_store_storeled_mrnno" for="x_mrnno" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->mrnno->caption() ?><?php echo $store_storeled_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->mrnno->cellAttributes() ?>>
<span id="el_store_storeled_mrnno">
<input type="text" data-table="store_storeled" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->mrnno->EditValue ?>"<?php echo $store_storeled_add->mrnno->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storeled_add->BRNAME->Visible) { // BRNAME ?>
	<div id="r_BRNAME" class="form-group row">
		<label id="elh_store_storeled_BRNAME" for="x_BRNAME" class="<?php echo $store_storeled_add->LeftColumnClass ?>"><?php echo $store_storeled_add->BRNAME->caption() ?><?php echo $store_storeled_add->BRNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storeled_add->RightColumnClass ?>"><div <?php echo $store_storeled_add->BRNAME->cellAttributes() ?>>
<span id="el_store_storeled_BRNAME">
<input type="text" data-table="store_storeled" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storeled_add->BRNAME->getPlaceHolder()) ?>" value="<?php echo $store_storeled_add->BRNAME->EditValue ?>"<?php echo $store_storeled_add->BRNAME->editAttributes() ?>>
</span>
<?php echo $store_storeled_add->BRNAME->CustomMsg ?></div></div>
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
$store_storeled_add->terminate();
?>