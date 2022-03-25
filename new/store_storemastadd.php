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
$store_storemast_add = new store_storemast_add();

// Run the page
$store_storemast_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storemast_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fstore_storemastadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fstore_storemastadd = currentForm = new ew.Form("fstore_storemastadd", "add");

	// Validate form
	fstore_storemastadd.validate = function() {
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
			<?php if ($store_storemast_add->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->BRCODE->caption(), $store_storemast_add->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->BRCODE->errorMessage()) ?>");
			<?php if ($store_storemast_add->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->PRC->caption(), $store_storemast_add->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->TYPE->caption(), $store_storemast_add->TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->DES->Required) { ?>
				elm = this.getElements("x" + infix + "_DES");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->DES->caption(), $store_storemast_add->DES->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->UM->Required) { ?>
				elm = this.getElements("x" + infix + "_UM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->UM->caption(), $store_storemast_add->UM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->RT->caption(), $store_storemast_add->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->RT->errorMessage()) ?>");
			<?php if ($store_storemast_add->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->UR->caption(), $store_storemast_add->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->UR->errorMessage()) ?>");
			<?php if ($store_storemast_add->TAXP->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->TAXP->caption(), $store_storemast_add->TAXP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->TAXP->errorMessage()) ?>");
			<?php if ($store_storemast_add->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->BATCHNO->caption(), $store_storemast_add->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->OQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->OQ->caption(), $store_storemast_add->OQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->OQ->errorMessage()) ?>");
			<?php if ($store_storemast_add->RQ->Required) { ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->RQ->caption(), $store_storemast_add->RQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->RQ->errorMessage()) ?>");
			<?php if ($store_storemast_add->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->MRQ->caption(), $store_storemast_add->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->MRQ->errorMessage()) ?>");
			<?php if ($store_storemast_add->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->IQ->caption(), $store_storemast_add->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->IQ->errorMessage()) ?>");
			<?php if ($store_storemast_add->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->MRP->caption(), $store_storemast_add->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->MRP->errorMessage()) ?>");
			<?php if ($store_storemast_add->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->EXPDT->caption(), $store_storemast_add->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->EXPDT->errorMessage()) ?>");
			<?php if ($store_storemast_add->SALQTY->Required) { ?>
				elm = this.getElements("x" + infix + "_SALQTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->SALQTY->caption(), $store_storemast_add->SALQTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SALQTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->SALQTY->errorMessage()) ?>");
			<?php if ($store_storemast_add->LASTPURDT->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTPURDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->LASTPURDT->caption(), $store_storemast_add->LASTPURDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LASTPURDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->LASTPURDT->errorMessage()) ?>");
			<?php if ($store_storemast_add->LASTSUPP->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTSUPP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->LASTSUPP->caption(), $store_storemast_add->LASTSUPP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->GENNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->GENNAME->caption(), $store_storemast_add->GENNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->LASTISSDT->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTISSDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->LASTISSDT->caption(), $store_storemast_add->LASTISSDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LASTISSDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->LASTISSDT->errorMessage()) ?>");
			<?php if ($store_storemast_add->CREATEDDT->Required) { ?>
				elm = this.getElements("x" + infix + "_CREATEDDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->CREATEDDT->caption(), $store_storemast_add->CREATEDDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CREATEDDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->CREATEDDT->errorMessage()) ?>");
			<?php if ($store_storemast_add->OPPRC->Required) { ?>
				elm = this.getElements("x" + infix + "_OPPRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->OPPRC->caption(), $store_storemast_add->OPPRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->RESTRICT->Required) { ?>
				elm = this.getElements("x" + infix + "_RESTRICT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->RESTRICT->caption(), $store_storemast_add->RESTRICT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->BAWAPRC->Required) { ?>
				elm = this.getElements("x" + infix + "_BAWAPRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->BAWAPRC->caption(), $store_storemast_add->BAWAPRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->STAXPER->Required) { ?>
				elm = this.getElements("x" + infix + "_STAXPER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->STAXPER->caption(), $store_storemast_add->STAXPER->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STAXPER");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->STAXPER->errorMessage()) ?>");
			<?php if ($store_storemast_add->TAXTYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXTYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->TAXTYPE->caption(), $store_storemast_add->TAXTYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->OLDTAXP->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDTAXP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->OLDTAXP->caption(), $store_storemast_add->OLDTAXP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDTAXP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->OLDTAXP->errorMessage()) ?>");
			<?php if ($store_storemast_add->TAXUPD->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXUPD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->TAXUPD->caption(), $store_storemast_add->TAXUPD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->PACKAGE->Required) { ?>
				elm = this.getElements("x" + infix + "_PACKAGE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->PACKAGE->caption(), $store_storemast_add->PACKAGE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->NEWRT->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWRT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->NEWRT->caption(), $store_storemast_add->NEWRT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWRT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->NEWRT->errorMessage()) ?>");
			<?php if ($store_storemast_add->NEWMRP->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWMRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->NEWMRP->caption(), $store_storemast_add->NEWMRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWMRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->NEWMRP->errorMessage()) ?>");
			<?php if ($store_storemast_add->NEWUR->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWUR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->NEWUR->caption(), $store_storemast_add->NEWUR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWUR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->NEWUR->errorMessage()) ?>");
			<?php if ($store_storemast_add->STATUS->Required) { ?>
				elm = this.getElements("x" + infix + "_STATUS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->STATUS->caption(), $store_storemast_add->STATUS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->RETNQTY->Required) { ?>
				elm = this.getElements("x" + infix + "_RETNQTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->RETNQTY->caption(), $store_storemast_add->RETNQTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RETNQTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->RETNQTY->errorMessage()) ?>");
			<?php if ($store_storemast_add->KEMODISC->Required) { ?>
				elm = this.getElements("x" + infix + "_KEMODISC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->KEMODISC->caption(), $store_storemast_add->KEMODISC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->PATSALE->Required) { ?>
				elm = this.getElements("x" + infix + "_PATSALE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->PATSALE->caption(), $store_storemast_add->PATSALE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PATSALE");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->PATSALE->errorMessage()) ?>");
			<?php if ($store_storemast_add->ORGAN->Required) { ?>
				elm = this.getElements("x" + infix + "_ORGAN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->ORGAN->caption(), $store_storemast_add->ORGAN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->OLDRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->OLDRQ->caption(), $store_storemast_add->OLDRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->OLDRQ->errorMessage()) ?>");
			<?php if ($store_storemast_add->DRID->Required) { ?>
				elm = this.getElements("x" + infix + "_DRID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->DRID->caption(), $store_storemast_add->DRID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->MFRCODE->caption(), $store_storemast_add->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->COMBCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->COMBCODE->caption(), $store_storemast_add->COMBCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->GENCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_GENCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->GENCODE->caption(), $store_storemast_add->GENCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->STRENGTH->Required) { ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->STRENGTH->caption(), $store_storemast_add->STRENGTH->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->STRENGTH->errorMessage()) ?>");
			<?php if ($store_storemast_add->UNIT->Required) { ?>
				elm = this.getElements("x" + infix + "_UNIT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->UNIT->caption(), $store_storemast_add->UNIT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->FORMULARY->Required) { ?>
				elm = this.getElements("x" + infix + "_FORMULARY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->FORMULARY->caption(), $store_storemast_add->FORMULARY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->STOCK->Required) { ?>
				elm = this.getElements("x" + infix + "_STOCK");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->STOCK->caption(), $store_storemast_add->STOCK->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STOCK");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->STOCK->errorMessage()) ?>");
			<?php if ($store_storemast_add->RACKNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RACKNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->RACKNO->caption(), $store_storemast_add->RACKNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->SUPPNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_SUPPNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->SUPPNAME->caption(), $store_storemast_add->SUPPNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->COMBNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->COMBNAME->caption(), $store_storemast_add->COMBNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->GENERICNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENERICNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->GENERICNAME->caption(), $store_storemast_add->GENERICNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->REMARK->Required) { ?>
				elm = this.getElements("x" + infix + "_REMARK");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->REMARK->caption(), $store_storemast_add->REMARK->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->TEMP->Required) { ?>
				elm = this.getElements("x" + infix + "_TEMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->TEMP->caption(), $store_storemast_add->TEMP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_add->PACKING->Required) { ?>
				elm = this.getElements("x" + infix + "_PACKING");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->PACKING->caption(), $store_storemast_add->PACKING->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PACKING");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->PACKING->errorMessage()) ?>");
			<?php if ($store_storemast_add->PhysQty->Required) { ?>
				elm = this.getElements("x" + infix + "_PhysQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->PhysQty->caption(), $store_storemast_add->PhysQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PhysQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->PhysQty->errorMessage()) ?>");
			<?php if ($store_storemast_add->LedQty->Required) { ?>
				elm = this.getElements("x" + infix + "_LedQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->LedQty->caption(), $store_storemast_add->LedQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LedQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->LedQty->errorMessage()) ?>");
			<?php if ($store_storemast_add->PurValue->Required) { ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->PurValue->caption(), $store_storemast_add->PurValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->PurValue->errorMessage()) ?>");
			<?php if ($store_storemast_add->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->PSGST->caption(), $store_storemast_add->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->PSGST->errorMessage()) ?>");
			<?php if ($store_storemast_add->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->PCGST->caption(), $store_storemast_add->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->PCGST->errorMessage()) ?>");
			<?php if ($store_storemast_add->SaleValue->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->SaleValue->caption(), $store_storemast_add->SaleValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->SaleValue->errorMessage()) ?>");
			<?php if ($store_storemast_add->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->SSGST->caption(), $store_storemast_add->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->SSGST->errorMessage()) ?>");
			<?php if ($store_storemast_add->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->SCGST->caption(), $store_storemast_add->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->SCGST->errorMessage()) ?>");
			<?php if ($store_storemast_add->SaleRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->SaleRate->caption(), $store_storemast_add->SaleRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->SaleRate->errorMessage()) ?>");
			<?php if ($store_storemast_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->HospID->caption(), $store_storemast_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_add->HospID->errorMessage()) ?>");
			<?php if ($store_storemast_add->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_add->BRNAME->caption(), $store_storemast_add->BRNAME->RequiredErrorMessage)) ?>");
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
	fstore_storemastadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fstore_storemastadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fstore_storemastadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $store_storemast_add->showPageHeader(); ?>
<?php
$store_storemast_add->showMessage();
?>
<form name="fstore_storemastadd" id="fstore_storemastadd" class="<?php echo $store_storemast_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storemast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$store_storemast_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($store_storemast_add->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_store_storemast_BRCODE" for="x_BRCODE" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->BRCODE->caption() ?><?php echo $store_storemast_add->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->BRCODE->cellAttributes() ?>>
<span id="el_store_storemast_BRCODE">
<input type="text" data-table="store_storemast" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->BRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->BRCODE->EditValue ?>"<?php echo $store_storemast_add->BRCODE->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_store_storemast_PRC" for="x_PRC" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->PRC->caption() ?><?php echo $store_storemast_add->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->PRC->cellAttributes() ?>>
<span id="el_store_storemast_PRC">
<input type="text" data-table="store_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storemast_add->PRC->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->PRC->EditValue ?>"<?php echo $store_storemast_add->PRC->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label id="elh_store_storemast_TYPE" for="x_TYPE" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->TYPE->caption() ?><?php echo $store_storemast_add->TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->TYPE->cellAttributes() ?>>
<span id="el_store_storemast_TYPE">
<input type="text" data-table="store_storemast" data-field="x_TYPE" name="x_TYPE" id="x_TYPE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast_add->TYPE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->TYPE->EditValue ?>"<?php echo $store_storemast_add->TYPE->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->DES->Visible) { // DES ?>
	<div id="r_DES" class="form-group row">
		<label id="elh_store_storemast_DES" for="x_DES" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->DES->caption() ?><?php echo $store_storemast_add->DES->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->DES->cellAttributes() ?>>
<span id="el_store_storemast_DES">
<input type="text" data-table="store_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storemast_add->DES->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->DES->EditValue ?>"<?php echo $store_storemast_add->DES->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->DES->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label id="elh_store_storemast_UM" for="x_UM" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->UM->caption() ?><?php echo $store_storemast_add->UM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->UM->cellAttributes() ?>>
<span id="el_store_storemast_UM">
<input type="text" data-table="store_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast_add->UM->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->UM->EditValue ?>"<?php echo $store_storemast_add->UM->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->UM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_store_storemast_RT" for="x_RT" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->RT->caption() ?><?php echo $store_storemast_add->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->RT->cellAttributes() ?>>
<span id="el_store_storemast_RT">
<input type="text" data-table="store_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->RT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->RT->EditValue ?>"<?php echo $store_storemast_add->RT->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_store_storemast_UR" for="x_UR" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->UR->caption() ?><?php echo $store_storemast_add->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->UR->cellAttributes() ?>>
<span id="el_store_storemast_UR">
<input type="text" data-table="store_storemast" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->UR->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->UR->EditValue ?>"<?php echo $store_storemast_add->UR->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_store_storemast_TAXP" for="x_TAXP" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->TAXP->caption() ?><?php echo $store_storemast_add->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->TAXP->cellAttributes() ?>>
<span id="el_store_storemast_TAXP">
<input type="text" data-table="store_storemast" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->TAXP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->TAXP->EditValue ?>"<?php echo $store_storemast_add->TAXP->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_store_storemast_BATCHNO" for="x_BATCHNO" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->BATCHNO->caption() ?><?php echo $store_storemast_add->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->BATCHNO->cellAttributes() ?>>
<span id="el_store_storemast_BATCHNO">
<input type="text" data-table="store_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($store_storemast_add->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->BATCHNO->EditValue ?>"<?php echo $store_storemast_add->BATCHNO->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_store_storemast_OQ" for="x_OQ" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->OQ->caption() ?><?php echo $store_storemast_add->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->OQ->cellAttributes() ?>>
<span id="el_store_storemast_OQ">
<input type="text" data-table="store_storemast" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->OQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->OQ->EditValue ?>"<?php echo $store_storemast_add->OQ->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_store_storemast_RQ" for="x_RQ" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->RQ->caption() ?><?php echo $store_storemast_add->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->RQ->cellAttributes() ?>>
<span id="el_store_storemast_RQ">
<input type="text" data-table="store_storemast" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->RQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->RQ->EditValue ?>"<?php echo $store_storemast_add->RQ->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_store_storemast_MRQ" for="x_MRQ" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->MRQ->caption() ?><?php echo $store_storemast_add->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->MRQ->cellAttributes() ?>>
<span id="el_store_storemast_MRQ">
<input type="text" data-table="store_storemast" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->MRQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->MRQ->EditValue ?>"<?php echo $store_storemast_add->MRQ->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_store_storemast_IQ" for="x_IQ" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->IQ->caption() ?><?php echo $store_storemast_add->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->IQ->cellAttributes() ?>>
<span id="el_store_storemast_IQ">
<input type="text" data-table="store_storemast" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->IQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->IQ->EditValue ?>"<?php echo $store_storemast_add->IQ->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_store_storemast_MRP" for="x_MRP" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->MRP->caption() ?><?php echo $store_storemast_add->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->MRP->cellAttributes() ?>>
<span id="el_store_storemast_MRP">
<input type="text" data-table="store_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->MRP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->MRP->EditValue ?>"<?php echo $store_storemast_add->MRP->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_store_storemast_EXPDT" for="x_EXPDT" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->EXPDT->caption() ?><?php echo $store_storemast_add->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->EXPDT->cellAttributes() ?>>
<span id="el_store_storemast_EXPDT">
<input type="text" data-table="store_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($store_storemast_add->EXPDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->EXPDT->EditValue ?>"<?php echo $store_storemast_add->EXPDT->editAttributes() ?>>
<?php if (!$store_storemast_add->EXPDT->ReadOnly && !$store_storemast_add->EXPDT->Disabled && !isset($store_storemast_add->EXPDT->EditAttrs["readonly"]) && !isset($store_storemast_add->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storemastadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storemastadd", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storemast_add->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->SALQTY->Visible) { // SALQTY ?>
	<div id="r_SALQTY" class="form-group row">
		<label id="elh_store_storemast_SALQTY" for="x_SALQTY" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->SALQTY->caption() ?><?php echo $store_storemast_add->SALQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->SALQTY->cellAttributes() ?>>
<span id="el_store_storemast_SALQTY">
<input type="text" data-table="store_storemast" data-field="x_SALQTY" name="x_SALQTY" id="x_SALQTY" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->SALQTY->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->SALQTY->EditValue ?>"<?php echo $store_storemast_add->SALQTY->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->SALQTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->LASTPURDT->Visible) { // LASTPURDT ?>
	<div id="r_LASTPURDT" class="form-group row">
		<label id="elh_store_storemast_LASTPURDT" for="x_LASTPURDT" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->LASTPURDT->caption() ?><?php echo $store_storemast_add->LASTPURDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->LASTPURDT->cellAttributes() ?>>
<span id="el_store_storemast_LASTPURDT">
<input type="text" data-table="store_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?php echo HtmlEncode($store_storemast_add->LASTPURDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->LASTPURDT->EditValue ?>"<?php echo $store_storemast_add->LASTPURDT->editAttributes() ?>>
<?php if (!$store_storemast_add->LASTPURDT->ReadOnly && !$store_storemast_add->LASTPURDT->Disabled && !isset($store_storemast_add->LASTPURDT->EditAttrs["readonly"]) && !isset($store_storemast_add->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storemastadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storemastadd", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storemast_add->LASTPURDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->LASTSUPP->Visible) { // LASTSUPP ?>
	<div id="r_LASTSUPP" class="form-group row">
		<label id="elh_store_storemast_LASTSUPP" for="x_LASTSUPP" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->LASTSUPP->caption() ?><?php echo $store_storemast_add->LASTSUPP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->LASTSUPP->cellAttributes() ?>>
<span id="el_store_storemast_LASTSUPP">
<input type="text" data-table="store_storemast" data-field="x_LASTSUPP" name="x_LASTSUPP" id="x_LASTSUPP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storemast_add->LASTSUPP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->LASTSUPP->EditValue ?>"<?php echo $store_storemast_add->LASTSUPP->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->LASTSUPP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_store_storemast_GENNAME" for="x_GENNAME" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->GENNAME->caption() ?><?php echo $store_storemast_add->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->GENNAME->cellAttributes() ?>>
<span id="el_store_storemast_GENNAME">
<input type="text" data-table="store_storemast" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($store_storemast_add->GENNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->GENNAME->EditValue ?>"<?php echo $store_storemast_add->GENNAME->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->LASTISSDT->Visible) { // LASTISSDT ?>
	<div id="r_LASTISSDT" class="form-group row">
		<label id="elh_store_storemast_LASTISSDT" for="x_LASTISSDT" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->LASTISSDT->caption() ?><?php echo $store_storemast_add->LASTISSDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->LASTISSDT->cellAttributes() ?>>
<span id="el_store_storemast_LASTISSDT">
<input type="text" data-table="store_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?php echo HtmlEncode($store_storemast_add->LASTISSDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->LASTISSDT->EditValue ?>"<?php echo $store_storemast_add->LASTISSDT->editAttributes() ?>>
<?php if (!$store_storemast_add->LASTISSDT->ReadOnly && !$store_storemast_add->LASTISSDT->Disabled && !isset($store_storemast_add->LASTISSDT->EditAttrs["readonly"]) && !isset($store_storemast_add->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storemastadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storemastadd", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storemast_add->LASTISSDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->CREATEDDT->Visible) { // CREATEDDT ?>
	<div id="r_CREATEDDT" class="form-group row">
		<label id="elh_store_storemast_CREATEDDT" for="x_CREATEDDT" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->CREATEDDT->caption() ?><?php echo $store_storemast_add->CREATEDDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->CREATEDDT->cellAttributes() ?>>
<span id="el_store_storemast_CREATEDDT">
<input type="text" data-table="store_storemast" data-field="x_CREATEDDT" name="x_CREATEDDT" id="x_CREATEDDT" placeholder="<?php echo HtmlEncode($store_storemast_add->CREATEDDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->CREATEDDT->EditValue ?>"<?php echo $store_storemast_add->CREATEDDT->editAttributes() ?>>
<?php if (!$store_storemast_add->CREATEDDT->ReadOnly && !$store_storemast_add->CREATEDDT->Disabled && !isset($store_storemast_add->CREATEDDT->EditAttrs["readonly"]) && !isset($store_storemast_add->CREATEDDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storemastadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storemastadd", "x_CREATEDDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storemast_add->CREATEDDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->OPPRC->Visible) { // OPPRC ?>
	<div id="r_OPPRC" class="form-group row">
		<label id="elh_store_storemast_OPPRC" for="x_OPPRC" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->OPPRC->caption() ?><?php echo $store_storemast_add->OPPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->OPPRC->cellAttributes() ?>>
<span id="el_store_storemast_OPPRC">
<input type="text" data-table="store_storemast" data-field="x_OPPRC" name="x_OPPRC" id="x_OPPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storemast_add->OPPRC->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->OPPRC->EditValue ?>"<?php echo $store_storemast_add->OPPRC->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->OPPRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->RESTRICT->Visible) { // RESTRICT ?>
	<div id="r_RESTRICT" class="form-group row">
		<label id="elh_store_storemast_RESTRICT" for="x_RESTRICT" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->RESTRICT->caption() ?><?php echo $store_storemast_add->RESTRICT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->RESTRICT->cellAttributes() ?>>
<span id="el_store_storemast_RESTRICT">
<input type="text" data-table="store_storemast" data-field="x_RESTRICT" name="x_RESTRICT" id="x_RESTRICT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast_add->RESTRICT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->RESTRICT->EditValue ?>"<?php echo $store_storemast_add->RESTRICT->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->RESTRICT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->BAWAPRC->Visible) { // BAWAPRC ?>
	<div id="r_BAWAPRC" class="form-group row">
		<label id="elh_store_storemast_BAWAPRC" for="x_BAWAPRC" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->BAWAPRC->caption() ?><?php echo $store_storemast_add->BAWAPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->BAWAPRC->cellAttributes() ?>>
<span id="el_store_storemast_BAWAPRC">
<input type="text" data-table="store_storemast" data-field="x_BAWAPRC" name="x_BAWAPRC" id="x_BAWAPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storemast_add->BAWAPRC->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->BAWAPRC->EditValue ?>"<?php echo $store_storemast_add->BAWAPRC->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->BAWAPRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->STAXPER->Visible) { // STAXPER ?>
	<div id="r_STAXPER" class="form-group row">
		<label id="elh_store_storemast_STAXPER" for="x_STAXPER" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->STAXPER->caption() ?><?php echo $store_storemast_add->STAXPER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->STAXPER->cellAttributes() ?>>
<span id="el_store_storemast_STAXPER">
<input type="text" data-table="store_storemast" data-field="x_STAXPER" name="x_STAXPER" id="x_STAXPER" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->STAXPER->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->STAXPER->EditValue ?>"<?php echo $store_storemast_add->STAXPER->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->STAXPER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->TAXTYPE->Visible) { // TAXTYPE ?>
	<div id="r_TAXTYPE" class="form-group row">
		<label id="elh_store_storemast_TAXTYPE" for="x_TAXTYPE" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->TAXTYPE->caption() ?><?php echo $store_storemast_add->TAXTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->TAXTYPE->cellAttributes() ?>>
<span id="el_store_storemast_TAXTYPE">
<input type="text" data-table="store_storemast" data-field="x_TAXTYPE" name="x_TAXTYPE" id="x_TAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast_add->TAXTYPE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->TAXTYPE->EditValue ?>"<?php echo $store_storemast_add->TAXTYPE->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->TAXTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->OLDTAXP->Visible) { // OLDTAXP ?>
	<div id="r_OLDTAXP" class="form-group row">
		<label id="elh_store_storemast_OLDTAXP" for="x_OLDTAXP" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->OLDTAXP->caption() ?><?php echo $store_storemast_add->OLDTAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->OLDTAXP->cellAttributes() ?>>
<span id="el_store_storemast_OLDTAXP">
<input type="text" data-table="store_storemast" data-field="x_OLDTAXP" name="x_OLDTAXP" id="x_OLDTAXP" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->OLDTAXP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->OLDTAXP->EditValue ?>"<?php echo $store_storemast_add->OLDTAXP->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->OLDTAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->TAXUPD->Visible) { // TAXUPD ?>
	<div id="r_TAXUPD" class="form-group row">
		<label id="elh_store_storemast_TAXUPD" for="x_TAXUPD" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->TAXUPD->caption() ?><?php echo $store_storemast_add->TAXUPD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->TAXUPD->cellAttributes() ?>>
<span id="el_store_storemast_TAXUPD">
<input type="text" data-table="store_storemast" data-field="x_TAXUPD" name="x_TAXUPD" id="x_TAXUPD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast_add->TAXUPD->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->TAXUPD->EditValue ?>"<?php echo $store_storemast_add->TAXUPD->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->TAXUPD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->PACKAGE->Visible) { // PACKAGE ?>
	<div id="r_PACKAGE" class="form-group row">
		<label id="elh_store_storemast_PACKAGE" for="x_PACKAGE" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->PACKAGE->caption() ?><?php echo $store_storemast_add->PACKAGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->PACKAGE->cellAttributes() ?>>
<span id="el_store_storemast_PACKAGE">
<input type="text" data-table="store_storemast" data-field="x_PACKAGE" name="x_PACKAGE" id="x_PACKAGE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast_add->PACKAGE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->PACKAGE->EditValue ?>"<?php echo $store_storemast_add->PACKAGE->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->PACKAGE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->NEWRT->Visible) { // NEWRT ?>
	<div id="r_NEWRT" class="form-group row">
		<label id="elh_store_storemast_NEWRT" for="x_NEWRT" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->NEWRT->caption() ?><?php echo $store_storemast_add->NEWRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->NEWRT->cellAttributes() ?>>
<span id="el_store_storemast_NEWRT">
<input type="text" data-table="store_storemast" data-field="x_NEWRT" name="x_NEWRT" id="x_NEWRT" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->NEWRT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->NEWRT->EditValue ?>"<?php echo $store_storemast_add->NEWRT->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->NEWRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->NEWMRP->Visible) { // NEWMRP ?>
	<div id="r_NEWMRP" class="form-group row">
		<label id="elh_store_storemast_NEWMRP" for="x_NEWMRP" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->NEWMRP->caption() ?><?php echo $store_storemast_add->NEWMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->NEWMRP->cellAttributes() ?>>
<span id="el_store_storemast_NEWMRP">
<input type="text" data-table="store_storemast" data-field="x_NEWMRP" name="x_NEWMRP" id="x_NEWMRP" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->NEWMRP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->NEWMRP->EditValue ?>"<?php echo $store_storemast_add->NEWMRP->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->NEWMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->NEWUR->Visible) { // NEWUR ?>
	<div id="r_NEWUR" class="form-group row">
		<label id="elh_store_storemast_NEWUR" for="x_NEWUR" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->NEWUR->caption() ?><?php echo $store_storemast_add->NEWUR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->NEWUR->cellAttributes() ?>>
<span id="el_store_storemast_NEWUR">
<input type="text" data-table="store_storemast" data-field="x_NEWUR" name="x_NEWUR" id="x_NEWUR" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->NEWUR->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->NEWUR->EditValue ?>"<?php echo $store_storemast_add->NEWUR->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->NEWUR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->STATUS->Visible) { // STATUS ?>
	<div id="r_STATUS" class="form-group row">
		<label id="elh_store_storemast_STATUS" for="x_STATUS" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->STATUS->caption() ?><?php echo $store_storemast_add->STATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->STATUS->cellAttributes() ?>>
<span id="el_store_storemast_STATUS">
<input type="text" data-table="store_storemast" data-field="x_STATUS" name="x_STATUS" id="x_STATUS" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storemast_add->STATUS->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->STATUS->EditValue ?>"<?php echo $store_storemast_add->STATUS->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->STATUS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->RETNQTY->Visible) { // RETNQTY ?>
	<div id="r_RETNQTY" class="form-group row">
		<label id="elh_store_storemast_RETNQTY" for="x_RETNQTY" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->RETNQTY->caption() ?><?php echo $store_storemast_add->RETNQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->RETNQTY->cellAttributes() ?>>
<span id="el_store_storemast_RETNQTY">
<input type="text" data-table="store_storemast" data-field="x_RETNQTY" name="x_RETNQTY" id="x_RETNQTY" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->RETNQTY->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->RETNQTY->EditValue ?>"<?php echo $store_storemast_add->RETNQTY->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->RETNQTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->KEMODISC->Visible) { // KEMODISC ?>
	<div id="r_KEMODISC" class="form-group row">
		<label id="elh_store_storemast_KEMODISC" for="x_KEMODISC" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->KEMODISC->caption() ?><?php echo $store_storemast_add->KEMODISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->KEMODISC->cellAttributes() ?>>
<span id="el_store_storemast_KEMODISC">
<input type="text" data-table="store_storemast" data-field="x_KEMODISC" name="x_KEMODISC" id="x_KEMODISC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast_add->KEMODISC->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->KEMODISC->EditValue ?>"<?php echo $store_storemast_add->KEMODISC->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->KEMODISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->PATSALE->Visible) { // PATSALE ?>
	<div id="r_PATSALE" class="form-group row">
		<label id="elh_store_storemast_PATSALE" for="x_PATSALE" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->PATSALE->caption() ?><?php echo $store_storemast_add->PATSALE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->PATSALE->cellAttributes() ?>>
<span id="el_store_storemast_PATSALE">
<input type="text" data-table="store_storemast" data-field="x_PATSALE" name="x_PATSALE" id="x_PATSALE" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->PATSALE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->PATSALE->EditValue ?>"<?php echo $store_storemast_add->PATSALE->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->PATSALE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->ORGAN->Visible) { // ORGAN ?>
	<div id="r_ORGAN" class="form-group row">
		<label id="elh_store_storemast_ORGAN" for="x_ORGAN" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->ORGAN->caption() ?><?php echo $store_storemast_add->ORGAN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->ORGAN->cellAttributes() ?>>
<span id="el_store_storemast_ORGAN">
<input type="text" data-table="store_storemast" data-field="x_ORGAN" name="x_ORGAN" id="x_ORGAN" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast_add->ORGAN->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->ORGAN->EditValue ?>"<?php echo $store_storemast_add->ORGAN->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->ORGAN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->OLDRQ->Visible) { // OLDRQ ?>
	<div id="r_OLDRQ" class="form-group row">
		<label id="elh_store_storemast_OLDRQ" for="x_OLDRQ" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->OLDRQ->caption() ?><?php echo $store_storemast_add->OLDRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->OLDRQ->cellAttributes() ?>>
<span id="el_store_storemast_OLDRQ">
<input type="text" data-table="store_storemast" data-field="x_OLDRQ" name="x_OLDRQ" id="x_OLDRQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->OLDRQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->OLDRQ->EditValue ?>"<?php echo $store_storemast_add->OLDRQ->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->OLDRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label id="elh_store_storemast_DRID" for="x_DRID" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->DRID->caption() ?><?php echo $store_storemast_add->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->DRID->cellAttributes() ?>>
<span id="el_store_storemast_DRID">
<input type="text" data-table="store_storemast" data-field="x_DRID" name="x_DRID" id="x_DRID" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storemast_add->DRID->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->DRID->EditValue ?>"<?php echo $store_storemast_add->DRID->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->DRID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_store_storemast_MFRCODE" for="x_MFRCODE" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->MFRCODE->caption() ?><?php echo $store_storemast_add->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->MFRCODE->cellAttributes() ?>>
<span id="el_store_storemast_MFRCODE">
<input type="text" data-table="store_storemast" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast_add->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->MFRCODE->EditValue ?>"<?php echo $store_storemast_add->MFRCODE->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->COMBCODE->Visible) { // COMBCODE ?>
	<div id="r_COMBCODE" class="form-group row">
		<label id="elh_store_storemast_COMBCODE" for="x_COMBCODE" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->COMBCODE->caption() ?><?php echo $store_storemast_add->COMBCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->COMBCODE->cellAttributes() ?>>
<span id="el_store_storemast_COMBCODE">
<input type="text" data-table="store_storemast" data-field="x_COMBCODE" name="x_COMBCODE" id="x_COMBCODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast_add->COMBCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->COMBCODE->EditValue ?>"<?php echo $store_storemast_add->COMBCODE->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->COMBCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->GENCODE->Visible) { // GENCODE ?>
	<div id="r_GENCODE" class="form-group row">
		<label id="elh_store_storemast_GENCODE" for="x_GENCODE" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->GENCODE->caption() ?><?php echo $store_storemast_add->GENCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->GENCODE->cellAttributes() ?>>
<span id="el_store_storemast_GENCODE">
<input type="text" data-table="store_storemast" data-field="x_GENCODE" name="x_GENCODE" id="x_GENCODE" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storemast_add->GENCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->GENCODE->EditValue ?>"<?php echo $store_storemast_add->GENCODE->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->GENCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->STRENGTH->Visible) { // STRENGTH ?>
	<div id="r_STRENGTH" class="form-group row">
		<label id="elh_store_storemast_STRENGTH" for="x_STRENGTH" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->STRENGTH->caption() ?><?php echo $store_storemast_add->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->STRENGTH->cellAttributes() ?>>
<span id="el_store_storemast_STRENGTH">
<input type="text" data-table="store_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->STRENGTH->EditValue ?>"<?php echo $store_storemast_add->STRENGTH->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->STRENGTH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->UNIT->Visible) { // UNIT ?>
	<div id="r_UNIT" class="form-group row">
		<label id="elh_store_storemast_UNIT" for="x_UNIT" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->UNIT->caption() ?><?php echo $store_storemast_add->UNIT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->UNIT->cellAttributes() ?>>
<span id="el_store_storemast_UNIT">
<input type="text" data-table="store_storemast" data-field="x_UNIT" name="x_UNIT" id="x_UNIT" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast_add->UNIT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->UNIT->EditValue ?>"<?php echo $store_storemast_add->UNIT->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->UNIT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->FORMULARY->Visible) { // FORMULARY ?>
	<div id="r_FORMULARY" class="form-group row">
		<label id="elh_store_storemast_FORMULARY" for="x_FORMULARY" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->FORMULARY->caption() ?><?php echo $store_storemast_add->FORMULARY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->FORMULARY->cellAttributes() ?>>
<span id="el_store_storemast_FORMULARY">
<input type="text" data-table="store_storemast" data-field="x_FORMULARY" name="x_FORMULARY" id="x_FORMULARY" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($store_storemast_add->FORMULARY->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->FORMULARY->EditValue ?>"<?php echo $store_storemast_add->FORMULARY->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->FORMULARY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->STOCK->Visible) { // STOCK ?>
	<div id="r_STOCK" class="form-group row">
		<label id="elh_store_storemast_STOCK" for="x_STOCK" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->STOCK->caption() ?><?php echo $store_storemast_add->STOCK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->STOCK->cellAttributes() ?>>
<span id="el_store_storemast_STOCK">
<input type="text" data-table="store_storemast" data-field="x_STOCK" name="x_STOCK" id="x_STOCK" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->STOCK->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->STOCK->EditValue ?>"<?php echo $store_storemast_add->STOCK->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->STOCK->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->RACKNO->Visible) { // RACKNO ?>
	<div id="r_RACKNO" class="form-group row">
		<label id="elh_store_storemast_RACKNO" for="x_RACKNO" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->RACKNO->caption() ?><?php echo $store_storemast_add->RACKNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->RACKNO->cellAttributes() ?>>
<span id="el_store_storemast_RACKNO">
<input type="text" data-table="store_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storemast_add->RACKNO->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->RACKNO->EditValue ?>"<?php echo $store_storemast_add->RACKNO->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->RACKNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->SUPPNAME->Visible) { // SUPPNAME ?>
	<div id="r_SUPPNAME" class="form-group row">
		<label id="elh_store_storemast_SUPPNAME" for="x_SUPPNAME" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->SUPPNAME->caption() ?><?php echo $store_storemast_add->SUPPNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->SUPPNAME->cellAttributes() ?>>
<span id="el_store_storemast_SUPPNAME">
<input type="text" data-table="store_storemast" data-field="x_SUPPNAME" name="x_SUPPNAME" id="x_SUPPNAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast_add->SUPPNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->SUPPNAME->EditValue ?>"<?php echo $store_storemast_add->SUPPNAME->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->SUPPNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->COMBNAME->Visible) { // COMBNAME ?>
	<div id="r_COMBNAME" class="form-group row">
		<label id="elh_store_storemast_COMBNAME" for="x_COMBNAME" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->COMBNAME->caption() ?><?php echo $store_storemast_add->COMBNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->COMBNAME->cellAttributes() ?>>
<span id="el_store_storemast_COMBNAME">
<input type="text" data-table="store_storemast" data-field="x_COMBNAME" name="x_COMBNAME" id="x_COMBNAME" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storemast_add->COMBNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->COMBNAME->EditValue ?>"<?php echo $store_storemast_add->COMBNAME->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->COMBNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->GENERICNAME->Visible) { // GENERICNAME ?>
	<div id="r_GENERICNAME" class="form-group row">
		<label id="elh_store_storemast_GENERICNAME" for="x_GENERICNAME" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->GENERICNAME->caption() ?><?php echo $store_storemast_add->GENERICNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->GENERICNAME->cellAttributes() ?>>
<span id="el_store_storemast_GENERICNAME">
<input type="text" data-table="store_storemast" data-field="x_GENERICNAME" name="x_GENERICNAME" id="x_GENERICNAME" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storemast_add->GENERICNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->GENERICNAME->EditValue ?>"<?php echo $store_storemast_add->GENERICNAME->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->GENERICNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->REMARK->Visible) { // REMARK ?>
	<div id="r_REMARK" class="form-group row">
		<label id="elh_store_storemast_REMARK" for="x_REMARK" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->REMARK->caption() ?><?php echo $store_storemast_add->REMARK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->REMARK->cellAttributes() ?>>
<span id="el_store_storemast_REMARK">
<input type="text" data-table="store_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast_add->REMARK->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->REMARK->EditValue ?>"<?php echo $store_storemast_add->REMARK->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->REMARK->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->TEMP->Visible) { // TEMP ?>
	<div id="r_TEMP" class="form-group row">
		<label id="elh_store_storemast_TEMP" for="x_TEMP" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->TEMP->caption() ?><?php echo $store_storemast_add->TEMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->TEMP->cellAttributes() ?>>
<span id="el_store_storemast_TEMP">
<input type="text" data-table="store_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storemast_add->TEMP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->TEMP->EditValue ?>"<?php echo $store_storemast_add->TEMP->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->TEMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->PACKING->Visible) { // PACKING ?>
	<div id="r_PACKING" class="form-group row">
		<label id="elh_store_storemast_PACKING" for="x_PACKING" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->PACKING->caption() ?><?php echo $store_storemast_add->PACKING->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->PACKING->cellAttributes() ?>>
<span id="el_store_storemast_PACKING">
<input type="text" data-table="store_storemast" data-field="x_PACKING" name="x_PACKING" id="x_PACKING" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->PACKING->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->PACKING->EditValue ?>"<?php echo $store_storemast_add->PACKING->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->PACKING->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->PhysQty->Visible) { // PhysQty ?>
	<div id="r_PhysQty" class="form-group row">
		<label id="elh_store_storemast_PhysQty" for="x_PhysQty" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->PhysQty->caption() ?><?php echo $store_storemast_add->PhysQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->PhysQty->cellAttributes() ?>>
<span id="el_store_storemast_PhysQty">
<input type="text" data-table="store_storemast" data-field="x_PhysQty" name="x_PhysQty" id="x_PhysQty" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->PhysQty->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->PhysQty->EditValue ?>"<?php echo $store_storemast_add->PhysQty->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->PhysQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->LedQty->Visible) { // LedQty ?>
	<div id="r_LedQty" class="form-group row">
		<label id="elh_store_storemast_LedQty" for="x_LedQty" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->LedQty->caption() ?><?php echo $store_storemast_add->LedQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->LedQty->cellAttributes() ?>>
<span id="el_store_storemast_LedQty">
<input type="text" data-table="store_storemast" data-field="x_LedQty" name="x_LedQty" id="x_LedQty" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->LedQty->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->LedQty->EditValue ?>"<?php echo $store_storemast_add->LedQty->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->LedQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_store_storemast_PurValue" for="x_PurValue" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->PurValue->caption() ?><?php echo $store_storemast_add->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->PurValue->cellAttributes() ?>>
<span id="el_store_storemast_PurValue">
<input type="text" data-table="store_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->PurValue->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->PurValue->EditValue ?>"<?php echo $store_storemast_add->PurValue->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_store_storemast_PSGST" for="x_PSGST" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->PSGST->caption() ?><?php echo $store_storemast_add->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->PSGST->cellAttributes() ?>>
<span id="el_store_storemast_PSGST">
<input type="text" data-table="store_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->PSGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->PSGST->EditValue ?>"<?php echo $store_storemast_add->PSGST->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_store_storemast_PCGST" for="x_PCGST" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->PCGST->caption() ?><?php echo $store_storemast_add->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->PCGST->cellAttributes() ?>>
<span id="el_store_storemast_PCGST">
<input type="text" data-table="store_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->PCGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->PCGST->EditValue ?>"<?php echo $store_storemast_add->PCGST->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->SaleValue->Visible) { // SaleValue ?>
	<div id="r_SaleValue" class="form-group row">
		<label id="elh_store_storemast_SaleValue" for="x_SaleValue" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->SaleValue->caption() ?><?php echo $store_storemast_add->SaleValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->SaleValue->cellAttributes() ?>>
<span id="el_store_storemast_SaleValue">
<input type="text" data-table="store_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->SaleValue->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->SaleValue->EditValue ?>"<?php echo $store_storemast_add->SaleValue->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->SaleValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_store_storemast_SSGST" for="x_SSGST" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->SSGST->caption() ?><?php echo $store_storemast_add->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->SSGST->cellAttributes() ?>>
<span id="el_store_storemast_SSGST">
<input type="text" data-table="store_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->SSGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->SSGST->EditValue ?>"<?php echo $store_storemast_add->SSGST->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_store_storemast_SCGST" for="x_SCGST" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->SCGST->caption() ?><?php echo $store_storemast_add->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->SCGST->cellAttributes() ?>>
<span id="el_store_storemast_SCGST">
<input type="text" data-table="store_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->SCGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->SCGST->EditValue ?>"<?php echo $store_storemast_add->SCGST->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->SaleRate->Visible) { // SaleRate ?>
	<div id="r_SaleRate" class="form-group row">
		<label id="elh_store_storemast_SaleRate" for="x_SaleRate" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->SaleRate->caption() ?><?php echo $store_storemast_add->SaleRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->SaleRate->cellAttributes() ?>>
<span id="el_store_storemast_SaleRate">
<input type="text" data-table="store_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->SaleRate->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->SaleRate->EditValue ?>"<?php echo $store_storemast_add->SaleRate->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->SaleRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_store_storemast_HospID" for="x_HospID" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->HospID->caption() ?><?php echo $store_storemast_add->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->HospID->cellAttributes() ?>>
<span id="el_store_storemast_HospID">
<input type="text" data-table="store_storemast" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($store_storemast_add->HospID->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->HospID->EditValue ?>"<?php echo $store_storemast_add->HospID->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_add->BRNAME->Visible) { // BRNAME ?>
	<div id="r_BRNAME" class="form-group row">
		<label id="elh_store_storemast_BRNAME" for="x_BRNAME" class="<?php echo $store_storemast_add->LeftColumnClass ?>"><?php echo $store_storemast_add->BRNAME->caption() ?><?php echo $store_storemast_add->BRNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_add->RightColumnClass ?>"><div <?php echo $store_storemast_add->BRNAME->cellAttributes() ?>>
<span id="el_store_storemast_BRNAME">
<input type="text" data-table="store_storemast" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storemast_add->BRNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast_add->BRNAME->EditValue ?>"<?php echo $store_storemast_add->BRNAME->editAttributes() ?>>
</span>
<?php echo $store_storemast_add->BRNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$store_storemast_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_storemast_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_storemast_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$store_storemast_add->showPageFooter();
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
$store_storemast_add->terminate();
?>