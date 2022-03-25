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
$store_storemast_edit = new store_storemast_edit();

// Run the page
$store_storemast_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storemast_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fstore_storemastedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fstore_storemastedit = currentForm = new ew.Form("fstore_storemastedit", "edit");

	// Validate form
	fstore_storemastedit.validate = function() {
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
			<?php if ($store_storemast_edit->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->BRCODE->caption(), $store_storemast_edit->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->BRCODE->errorMessage()) ?>");
			<?php if ($store_storemast_edit->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->PRC->caption(), $store_storemast_edit->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->TYPE->caption(), $store_storemast_edit->TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->DES->Required) { ?>
				elm = this.getElements("x" + infix + "_DES");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->DES->caption(), $store_storemast_edit->DES->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->UM->Required) { ?>
				elm = this.getElements("x" + infix + "_UM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->UM->caption(), $store_storemast_edit->UM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->RT->caption(), $store_storemast_edit->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->RT->errorMessage()) ?>");
			<?php if ($store_storemast_edit->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->UR->caption(), $store_storemast_edit->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->UR->errorMessage()) ?>");
			<?php if ($store_storemast_edit->TAXP->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->TAXP->caption(), $store_storemast_edit->TAXP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->TAXP->errorMessage()) ?>");
			<?php if ($store_storemast_edit->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->BATCHNO->caption(), $store_storemast_edit->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->OQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->OQ->caption(), $store_storemast_edit->OQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->OQ->errorMessage()) ?>");
			<?php if ($store_storemast_edit->RQ->Required) { ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->RQ->caption(), $store_storemast_edit->RQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->RQ->errorMessage()) ?>");
			<?php if ($store_storemast_edit->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->MRQ->caption(), $store_storemast_edit->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->MRQ->errorMessage()) ?>");
			<?php if ($store_storemast_edit->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->IQ->caption(), $store_storemast_edit->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->IQ->errorMessage()) ?>");
			<?php if ($store_storemast_edit->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->MRP->caption(), $store_storemast_edit->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->MRP->errorMessage()) ?>");
			<?php if ($store_storemast_edit->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->EXPDT->caption(), $store_storemast_edit->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->EXPDT->errorMessage()) ?>");
			<?php if ($store_storemast_edit->SALQTY->Required) { ?>
				elm = this.getElements("x" + infix + "_SALQTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->SALQTY->caption(), $store_storemast_edit->SALQTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SALQTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->SALQTY->errorMessage()) ?>");
			<?php if ($store_storemast_edit->LASTPURDT->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTPURDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->LASTPURDT->caption(), $store_storemast_edit->LASTPURDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LASTPURDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->LASTPURDT->errorMessage()) ?>");
			<?php if ($store_storemast_edit->LASTSUPP->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTSUPP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->LASTSUPP->caption(), $store_storemast_edit->LASTSUPP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->GENNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->GENNAME->caption(), $store_storemast_edit->GENNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->LASTISSDT->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTISSDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->LASTISSDT->caption(), $store_storemast_edit->LASTISSDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LASTISSDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->LASTISSDT->errorMessage()) ?>");
			<?php if ($store_storemast_edit->CREATEDDT->Required) { ?>
				elm = this.getElements("x" + infix + "_CREATEDDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->CREATEDDT->caption(), $store_storemast_edit->CREATEDDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CREATEDDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->CREATEDDT->errorMessage()) ?>");
			<?php if ($store_storemast_edit->OPPRC->Required) { ?>
				elm = this.getElements("x" + infix + "_OPPRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->OPPRC->caption(), $store_storemast_edit->OPPRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->RESTRICT->Required) { ?>
				elm = this.getElements("x" + infix + "_RESTRICT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->RESTRICT->caption(), $store_storemast_edit->RESTRICT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->BAWAPRC->Required) { ?>
				elm = this.getElements("x" + infix + "_BAWAPRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->BAWAPRC->caption(), $store_storemast_edit->BAWAPRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->STAXPER->Required) { ?>
				elm = this.getElements("x" + infix + "_STAXPER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->STAXPER->caption(), $store_storemast_edit->STAXPER->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STAXPER");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->STAXPER->errorMessage()) ?>");
			<?php if ($store_storemast_edit->TAXTYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXTYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->TAXTYPE->caption(), $store_storemast_edit->TAXTYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->OLDTAXP->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDTAXP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->OLDTAXP->caption(), $store_storemast_edit->OLDTAXP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDTAXP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->OLDTAXP->errorMessage()) ?>");
			<?php if ($store_storemast_edit->TAXUPD->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXUPD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->TAXUPD->caption(), $store_storemast_edit->TAXUPD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->PACKAGE->Required) { ?>
				elm = this.getElements("x" + infix + "_PACKAGE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->PACKAGE->caption(), $store_storemast_edit->PACKAGE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->NEWRT->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWRT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->NEWRT->caption(), $store_storemast_edit->NEWRT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWRT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->NEWRT->errorMessage()) ?>");
			<?php if ($store_storemast_edit->NEWMRP->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWMRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->NEWMRP->caption(), $store_storemast_edit->NEWMRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWMRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->NEWMRP->errorMessage()) ?>");
			<?php if ($store_storemast_edit->NEWUR->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWUR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->NEWUR->caption(), $store_storemast_edit->NEWUR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWUR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->NEWUR->errorMessage()) ?>");
			<?php if ($store_storemast_edit->STATUS->Required) { ?>
				elm = this.getElements("x" + infix + "_STATUS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->STATUS->caption(), $store_storemast_edit->STATUS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->RETNQTY->Required) { ?>
				elm = this.getElements("x" + infix + "_RETNQTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->RETNQTY->caption(), $store_storemast_edit->RETNQTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RETNQTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->RETNQTY->errorMessage()) ?>");
			<?php if ($store_storemast_edit->KEMODISC->Required) { ?>
				elm = this.getElements("x" + infix + "_KEMODISC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->KEMODISC->caption(), $store_storemast_edit->KEMODISC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->PATSALE->Required) { ?>
				elm = this.getElements("x" + infix + "_PATSALE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->PATSALE->caption(), $store_storemast_edit->PATSALE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PATSALE");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->PATSALE->errorMessage()) ?>");
			<?php if ($store_storemast_edit->ORGAN->Required) { ?>
				elm = this.getElements("x" + infix + "_ORGAN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->ORGAN->caption(), $store_storemast_edit->ORGAN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->OLDRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->OLDRQ->caption(), $store_storemast_edit->OLDRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->OLDRQ->errorMessage()) ?>");
			<?php if ($store_storemast_edit->DRID->Required) { ?>
				elm = this.getElements("x" + infix + "_DRID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->DRID->caption(), $store_storemast_edit->DRID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->MFRCODE->caption(), $store_storemast_edit->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->COMBCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->COMBCODE->caption(), $store_storemast_edit->COMBCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->GENCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_GENCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->GENCODE->caption(), $store_storemast_edit->GENCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->STRENGTH->Required) { ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->STRENGTH->caption(), $store_storemast_edit->STRENGTH->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->STRENGTH->errorMessage()) ?>");
			<?php if ($store_storemast_edit->UNIT->Required) { ?>
				elm = this.getElements("x" + infix + "_UNIT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->UNIT->caption(), $store_storemast_edit->UNIT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->FORMULARY->Required) { ?>
				elm = this.getElements("x" + infix + "_FORMULARY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->FORMULARY->caption(), $store_storemast_edit->FORMULARY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->STOCK->Required) { ?>
				elm = this.getElements("x" + infix + "_STOCK");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->STOCK->caption(), $store_storemast_edit->STOCK->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STOCK");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->STOCK->errorMessage()) ?>");
			<?php if ($store_storemast_edit->RACKNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RACKNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->RACKNO->caption(), $store_storemast_edit->RACKNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->SUPPNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_SUPPNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->SUPPNAME->caption(), $store_storemast_edit->SUPPNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->COMBNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->COMBNAME->caption(), $store_storemast_edit->COMBNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->GENERICNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENERICNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->GENERICNAME->caption(), $store_storemast_edit->GENERICNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->REMARK->Required) { ?>
				elm = this.getElements("x" + infix + "_REMARK");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->REMARK->caption(), $store_storemast_edit->REMARK->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->TEMP->Required) { ?>
				elm = this.getElements("x" + infix + "_TEMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->TEMP->caption(), $store_storemast_edit->TEMP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->PACKING->Required) { ?>
				elm = this.getElements("x" + infix + "_PACKING");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->PACKING->caption(), $store_storemast_edit->PACKING->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PACKING");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->PACKING->errorMessage()) ?>");
			<?php if ($store_storemast_edit->PhysQty->Required) { ?>
				elm = this.getElements("x" + infix + "_PhysQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->PhysQty->caption(), $store_storemast_edit->PhysQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PhysQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->PhysQty->errorMessage()) ?>");
			<?php if ($store_storemast_edit->LedQty->Required) { ?>
				elm = this.getElements("x" + infix + "_LedQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->LedQty->caption(), $store_storemast_edit->LedQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LedQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->LedQty->errorMessage()) ?>");
			<?php if ($store_storemast_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->id->caption(), $store_storemast_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_storemast_edit->PurValue->Required) { ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->PurValue->caption(), $store_storemast_edit->PurValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->PurValue->errorMessage()) ?>");
			<?php if ($store_storemast_edit->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->PSGST->caption(), $store_storemast_edit->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->PSGST->errorMessage()) ?>");
			<?php if ($store_storemast_edit->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->PCGST->caption(), $store_storemast_edit->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->PCGST->errorMessage()) ?>");
			<?php if ($store_storemast_edit->SaleValue->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->SaleValue->caption(), $store_storemast_edit->SaleValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->SaleValue->errorMessage()) ?>");
			<?php if ($store_storemast_edit->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->SSGST->caption(), $store_storemast_edit->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->SSGST->errorMessage()) ?>");
			<?php if ($store_storemast_edit->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->SCGST->caption(), $store_storemast_edit->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->SCGST->errorMessage()) ?>");
			<?php if ($store_storemast_edit->SaleRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->SaleRate->caption(), $store_storemast_edit->SaleRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->SaleRate->errorMessage()) ?>");
			<?php if ($store_storemast_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->HospID->caption(), $store_storemast_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_storemast_edit->HospID->errorMessage()) ?>");
			<?php if ($store_storemast_edit->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast_edit->BRNAME->caption(), $store_storemast_edit->BRNAME->RequiredErrorMessage)) ?>");
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
	fstore_storemastedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fstore_storemastedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fstore_storemastedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $store_storemast_edit->showPageHeader(); ?>
<?php
$store_storemast_edit->showMessage();
?>
<form name="fstore_storemastedit" id="fstore_storemastedit" class="<?php echo $store_storemast_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storemast">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$store_storemast_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($store_storemast_edit->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_store_storemast_BRCODE" for="x_BRCODE" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->BRCODE->caption() ?><?php echo $store_storemast_edit->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->BRCODE->cellAttributes() ?>>
<span id="el_store_storemast_BRCODE">
<input type="text" data-table="store_storemast" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->BRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->BRCODE->EditValue ?>"<?php echo $store_storemast_edit->BRCODE->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_store_storemast_PRC" for="x_PRC" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->PRC->caption() ?><?php echo $store_storemast_edit->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->PRC->cellAttributes() ?>>
<span id="el_store_storemast_PRC">
<input type="text" data-table="store_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storemast_edit->PRC->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->PRC->EditValue ?>"<?php echo $store_storemast_edit->PRC->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label id="elh_store_storemast_TYPE" for="x_TYPE" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->TYPE->caption() ?><?php echo $store_storemast_edit->TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->TYPE->cellAttributes() ?>>
<span id="el_store_storemast_TYPE">
<input type="text" data-table="store_storemast" data-field="x_TYPE" name="x_TYPE" id="x_TYPE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast_edit->TYPE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->TYPE->EditValue ?>"<?php echo $store_storemast_edit->TYPE->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->DES->Visible) { // DES ?>
	<div id="r_DES" class="form-group row">
		<label id="elh_store_storemast_DES" for="x_DES" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->DES->caption() ?><?php echo $store_storemast_edit->DES->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->DES->cellAttributes() ?>>
<span id="el_store_storemast_DES">
<input type="text" data-table="store_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storemast_edit->DES->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->DES->EditValue ?>"<?php echo $store_storemast_edit->DES->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->DES->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label id="elh_store_storemast_UM" for="x_UM" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->UM->caption() ?><?php echo $store_storemast_edit->UM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->UM->cellAttributes() ?>>
<span id="el_store_storemast_UM">
<input type="text" data-table="store_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast_edit->UM->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->UM->EditValue ?>"<?php echo $store_storemast_edit->UM->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->UM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_store_storemast_RT" for="x_RT" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->RT->caption() ?><?php echo $store_storemast_edit->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->RT->cellAttributes() ?>>
<span id="el_store_storemast_RT">
<input type="text" data-table="store_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->RT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->RT->EditValue ?>"<?php echo $store_storemast_edit->RT->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_store_storemast_UR" for="x_UR" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->UR->caption() ?><?php echo $store_storemast_edit->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->UR->cellAttributes() ?>>
<span id="el_store_storemast_UR">
<input type="text" data-table="store_storemast" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->UR->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->UR->EditValue ?>"<?php echo $store_storemast_edit->UR->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_store_storemast_TAXP" for="x_TAXP" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->TAXP->caption() ?><?php echo $store_storemast_edit->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->TAXP->cellAttributes() ?>>
<span id="el_store_storemast_TAXP">
<input type="text" data-table="store_storemast" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->TAXP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->TAXP->EditValue ?>"<?php echo $store_storemast_edit->TAXP->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_store_storemast_BATCHNO" for="x_BATCHNO" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->BATCHNO->caption() ?><?php echo $store_storemast_edit->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->BATCHNO->cellAttributes() ?>>
<span id="el_store_storemast_BATCHNO">
<input type="text" data-table="store_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($store_storemast_edit->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->BATCHNO->EditValue ?>"<?php echo $store_storemast_edit->BATCHNO->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_store_storemast_OQ" for="x_OQ" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->OQ->caption() ?><?php echo $store_storemast_edit->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->OQ->cellAttributes() ?>>
<span id="el_store_storemast_OQ">
<input type="text" data-table="store_storemast" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->OQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->OQ->EditValue ?>"<?php echo $store_storemast_edit->OQ->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_store_storemast_RQ" for="x_RQ" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->RQ->caption() ?><?php echo $store_storemast_edit->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->RQ->cellAttributes() ?>>
<span id="el_store_storemast_RQ">
<input type="text" data-table="store_storemast" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->RQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->RQ->EditValue ?>"<?php echo $store_storemast_edit->RQ->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_store_storemast_MRQ" for="x_MRQ" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->MRQ->caption() ?><?php echo $store_storemast_edit->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->MRQ->cellAttributes() ?>>
<span id="el_store_storemast_MRQ">
<input type="text" data-table="store_storemast" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->MRQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->MRQ->EditValue ?>"<?php echo $store_storemast_edit->MRQ->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_store_storemast_IQ" for="x_IQ" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->IQ->caption() ?><?php echo $store_storemast_edit->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->IQ->cellAttributes() ?>>
<span id="el_store_storemast_IQ">
<input type="text" data-table="store_storemast" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->IQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->IQ->EditValue ?>"<?php echo $store_storemast_edit->IQ->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_store_storemast_MRP" for="x_MRP" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->MRP->caption() ?><?php echo $store_storemast_edit->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->MRP->cellAttributes() ?>>
<span id="el_store_storemast_MRP">
<input type="text" data-table="store_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->MRP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->MRP->EditValue ?>"<?php echo $store_storemast_edit->MRP->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_store_storemast_EXPDT" for="x_EXPDT" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->EXPDT->caption() ?><?php echo $store_storemast_edit->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->EXPDT->cellAttributes() ?>>
<span id="el_store_storemast_EXPDT">
<input type="text" data-table="store_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($store_storemast_edit->EXPDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->EXPDT->EditValue ?>"<?php echo $store_storemast_edit->EXPDT->editAttributes() ?>>
<?php if (!$store_storemast_edit->EXPDT->ReadOnly && !$store_storemast_edit->EXPDT->Disabled && !isset($store_storemast_edit->EXPDT->EditAttrs["readonly"]) && !isset($store_storemast_edit->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storemastedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storemastedit", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storemast_edit->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->SALQTY->Visible) { // SALQTY ?>
	<div id="r_SALQTY" class="form-group row">
		<label id="elh_store_storemast_SALQTY" for="x_SALQTY" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->SALQTY->caption() ?><?php echo $store_storemast_edit->SALQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->SALQTY->cellAttributes() ?>>
<span id="el_store_storemast_SALQTY">
<input type="text" data-table="store_storemast" data-field="x_SALQTY" name="x_SALQTY" id="x_SALQTY" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->SALQTY->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->SALQTY->EditValue ?>"<?php echo $store_storemast_edit->SALQTY->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->SALQTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->LASTPURDT->Visible) { // LASTPURDT ?>
	<div id="r_LASTPURDT" class="form-group row">
		<label id="elh_store_storemast_LASTPURDT" for="x_LASTPURDT" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->LASTPURDT->caption() ?><?php echo $store_storemast_edit->LASTPURDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->LASTPURDT->cellAttributes() ?>>
<span id="el_store_storemast_LASTPURDT">
<input type="text" data-table="store_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?php echo HtmlEncode($store_storemast_edit->LASTPURDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->LASTPURDT->EditValue ?>"<?php echo $store_storemast_edit->LASTPURDT->editAttributes() ?>>
<?php if (!$store_storemast_edit->LASTPURDT->ReadOnly && !$store_storemast_edit->LASTPURDT->Disabled && !isset($store_storemast_edit->LASTPURDT->EditAttrs["readonly"]) && !isset($store_storemast_edit->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storemastedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storemastedit", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storemast_edit->LASTPURDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->LASTSUPP->Visible) { // LASTSUPP ?>
	<div id="r_LASTSUPP" class="form-group row">
		<label id="elh_store_storemast_LASTSUPP" for="x_LASTSUPP" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->LASTSUPP->caption() ?><?php echo $store_storemast_edit->LASTSUPP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->LASTSUPP->cellAttributes() ?>>
<span id="el_store_storemast_LASTSUPP">
<input type="text" data-table="store_storemast" data-field="x_LASTSUPP" name="x_LASTSUPP" id="x_LASTSUPP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storemast_edit->LASTSUPP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->LASTSUPP->EditValue ?>"<?php echo $store_storemast_edit->LASTSUPP->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->LASTSUPP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_store_storemast_GENNAME" for="x_GENNAME" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->GENNAME->caption() ?><?php echo $store_storemast_edit->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->GENNAME->cellAttributes() ?>>
<span id="el_store_storemast_GENNAME">
<input type="text" data-table="store_storemast" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($store_storemast_edit->GENNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->GENNAME->EditValue ?>"<?php echo $store_storemast_edit->GENNAME->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->LASTISSDT->Visible) { // LASTISSDT ?>
	<div id="r_LASTISSDT" class="form-group row">
		<label id="elh_store_storemast_LASTISSDT" for="x_LASTISSDT" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->LASTISSDT->caption() ?><?php echo $store_storemast_edit->LASTISSDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->LASTISSDT->cellAttributes() ?>>
<span id="el_store_storemast_LASTISSDT">
<input type="text" data-table="store_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?php echo HtmlEncode($store_storemast_edit->LASTISSDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->LASTISSDT->EditValue ?>"<?php echo $store_storemast_edit->LASTISSDT->editAttributes() ?>>
<?php if (!$store_storemast_edit->LASTISSDT->ReadOnly && !$store_storemast_edit->LASTISSDT->Disabled && !isset($store_storemast_edit->LASTISSDT->EditAttrs["readonly"]) && !isset($store_storemast_edit->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storemastedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storemastedit", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storemast_edit->LASTISSDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->CREATEDDT->Visible) { // CREATEDDT ?>
	<div id="r_CREATEDDT" class="form-group row">
		<label id="elh_store_storemast_CREATEDDT" for="x_CREATEDDT" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->CREATEDDT->caption() ?><?php echo $store_storemast_edit->CREATEDDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->CREATEDDT->cellAttributes() ?>>
<span id="el_store_storemast_CREATEDDT">
<input type="text" data-table="store_storemast" data-field="x_CREATEDDT" name="x_CREATEDDT" id="x_CREATEDDT" placeholder="<?php echo HtmlEncode($store_storemast_edit->CREATEDDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->CREATEDDT->EditValue ?>"<?php echo $store_storemast_edit->CREATEDDT->editAttributes() ?>>
<?php if (!$store_storemast_edit->CREATEDDT->ReadOnly && !$store_storemast_edit->CREATEDDT->Disabled && !isset($store_storemast_edit->CREATEDDT->EditAttrs["readonly"]) && !isset($store_storemast_edit->CREATEDDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storemastedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_storemastedit", "x_CREATEDDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_storemast_edit->CREATEDDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->OPPRC->Visible) { // OPPRC ?>
	<div id="r_OPPRC" class="form-group row">
		<label id="elh_store_storemast_OPPRC" for="x_OPPRC" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->OPPRC->caption() ?><?php echo $store_storemast_edit->OPPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->OPPRC->cellAttributes() ?>>
<span id="el_store_storemast_OPPRC">
<input type="text" data-table="store_storemast" data-field="x_OPPRC" name="x_OPPRC" id="x_OPPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storemast_edit->OPPRC->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->OPPRC->EditValue ?>"<?php echo $store_storemast_edit->OPPRC->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->OPPRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->RESTRICT->Visible) { // RESTRICT ?>
	<div id="r_RESTRICT" class="form-group row">
		<label id="elh_store_storemast_RESTRICT" for="x_RESTRICT" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->RESTRICT->caption() ?><?php echo $store_storemast_edit->RESTRICT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->RESTRICT->cellAttributes() ?>>
<span id="el_store_storemast_RESTRICT">
<input type="text" data-table="store_storemast" data-field="x_RESTRICT" name="x_RESTRICT" id="x_RESTRICT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast_edit->RESTRICT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->RESTRICT->EditValue ?>"<?php echo $store_storemast_edit->RESTRICT->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->RESTRICT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->BAWAPRC->Visible) { // BAWAPRC ?>
	<div id="r_BAWAPRC" class="form-group row">
		<label id="elh_store_storemast_BAWAPRC" for="x_BAWAPRC" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->BAWAPRC->caption() ?><?php echo $store_storemast_edit->BAWAPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->BAWAPRC->cellAttributes() ?>>
<span id="el_store_storemast_BAWAPRC">
<input type="text" data-table="store_storemast" data-field="x_BAWAPRC" name="x_BAWAPRC" id="x_BAWAPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storemast_edit->BAWAPRC->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->BAWAPRC->EditValue ?>"<?php echo $store_storemast_edit->BAWAPRC->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->BAWAPRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->STAXPER->Visible) { // STAXPER ?>
	<div id="r_STAXPER" class="form-group row">
		<label id="elh_store_storemast_STAXPER" for="x_STAXPER" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->STAXPER->caption() ?><?php echo $store_storemast_edit->STAXPER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->STAXPER->cellAttributes() ?>>
<span id="el_store_storemast_STAXPER">
<input type="text" data-table="store_storemast" data-field="x_STAXPER" name="x_STAXPER" id="x_STAXPER" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->STAXPER->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->STAXPER->EditValue ?>"<?php echo $store_storemast_edit->STAXPER->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->STAXPER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->TAXTYPE->Visible) { // TAXTYPE ?>
	<div id="r_TAXTYPE" class="form-group row">
		<label id="elh_store_storemast_TAXTYPE" for="x_TAXTYPE" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->TAXTYPE->caption() ?><?php echo $store_storemast_edit->TAXTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->TAXTYPE->cellAttributes() ?>>
<span id="el_store_storemast_TAXTYPE">
<input type="text" data-table="store_storemast" data-field="x_TAXTYPE" name="x_TAXTYPE" id="x_TAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast_edit->TAXTYPE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->TAXTYPE->EditValue ?>"<?php echo $store_storemast_edit->TAXTYPE->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->TAXTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->OLDTAXP->Visible) { // OLDTAXP ?>
	<div id="r_OLDTAXP" class="form-group row">
		<label id="elh_store_storemast_OLDTAXP" for="x_OLDTAXP" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->OLDTAXP->caption() ?><?php echo $store_storemast_edit->OLDTAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->OLDTAXP->cellAttributes() ?>>
<span id="el_store_storemast_OLDTAXP">
<input type="text" data-table="store_storemast" data-field="x_OLDTAXP" name="x_OLDTAXP" id="x_OLDTAXP" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->OLDTAXP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->OLDTAXP->EditValue ?>"<?php echo $store_storemast_edit->OLDTAXP->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->OLDTAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->TAXUPD->Visible) { // TAXUPD ?>
	<div id="r_TAXUPD" class="form-group row">
		<label id="elh_store_storemast_TAXUPD" for="x_TAXUPD" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->TAXUPD->caption() ?><?php echo $store_storemast_edit->TAXUPD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->TAXUPD->cellAttributes() ?>>
<span id="el_store_storemast_TAXUPD">
<input type="text" data-table="store_storemast" data-field="x_TAXUPD" name="x_TAXUPD" id="x_TAXUPD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast_edit->TAXUPD->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->TAXUPD->EditValue ?>"<?php echo $store_storemast_edit->TAXUPD->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->TAXUPD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->PACKAGE->Visible) { // PACKAGE ?>
	<div id="r_PACKAGE" class="form-group row">
		<label id="elh_store_storemast_PACKAGE" for="x_PACKAGE" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->PACKAGE->caption() ?><?php echo $store_storemast_edit->PACKAGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->PACKAGE->cellAttributes() ?>>
<span id="el_store_storemast_PACKAGE">
<input type="text" data-table="store_storemast" data-field="x_PACKAGE" name="x_PACKAGE" id="x_PACKAGE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast_edit->PACKAGE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->PACKAGE->EditValue ?>"<?php echo $store_storemast_edit->PACKAGE->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->PACKAGE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->NEWRT->Visible) { // NEWRT ?>
	<div id="r_NEWRT" class="form-group row">
		<label id="elh_store_storemast_NEWRT" for="x_NEWRT" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->NEWRT->caption() ?><?php echo $store_storemast_edit->NEWRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->NEWRT->cellAttributes() ?>>
<span id="el_store_storemast_NEWRT">
<input type="text" data-table="store_storemast" data-field="x_NEWRT" name="x_NEWRT" id="x_NEWRT" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->NEWRT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->NEWRT->EditValue ?>"<?php echo $store_storemast_edit->NEWRT->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->NEWRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->NEWMRP->Visible) { // NEWMRP ?>
	<div id="r_NEWMRP" class="form-group row">
		<label id="elh_store_storemast_NEWMRP" for="x_NEWMRP" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->NEWMRP->caption() ?><?php echo $store_storemast_edit->NEWMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->NEWMRP->cellAttributes() ?>>
<span id="el_store_storemast_NEWMRP">
<input type="text" data-table="store_storemast" data-field="x_NEWMRP" name="x_NEWMRP" id="x_NEWMRP" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->NEWMRP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->NEWMRP->EditValue ?>"<?php echo $store_storemast_edit->NEWMRP->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->NEWMRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->NEWUR->Visible) { // NEWUR ?>
	<div id="r_NEWUR" class="form-group row">
		<label id="elh_store_storemast_NEWUR" for="x_NEWUR" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->NEWUR->caption() ?><?php echo $store_storemast_edit->NEWUR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->NEWUR->cellAttributes() ?>>
<span id="el_store_storemast_NEWUR">
<input type="text" data-table="store_storemast" data-field="x_NEWUR" name="x_NEWUR" id="x_NEWUR" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->NEWUR->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->NEWUR->EditValue ?>"<?php echo $store_storemast_edit->NEWUR->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->NEWUR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->STATUS->Visible) { // STATUS ?>
	<div id="r_STATUS" class="form-group row">
		<label id="elh_store_storemast_STATUS" for="x_STATUS" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->STATUS->caption() ?><?php echo $store_storemast_edit->STATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->STATUS->cellAttributes() ?>>
<span id="el_store_storemast_STATUS">
<input type="text" data-table="store_storemast" data-field="x_STATUS" name="x_STATUS" id="x_STATUS" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storemast_edit->STATUS->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->STATUS->EditValue ?>"<?php echo $store_storemast_edit->STATUS->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->STATUS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->RETNQTY->Visible) { // RETNQTY ?>
	<div id="r_RETNQTY" class="form-group row">
		<label id="elh_store_storemast_RETNQTY" for="x_RETNQTY" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->RETNQTY->caption() ?><?php echo $store_storemast_edit->RETNQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->RETNQTY->cellAttributes() ?>>
<span id="el_store_storemast_RETNQTY">
<input type="text" data-table="store_storemast" data-field="x_RETNQTY" name="x_RETNQTY" id="x_RETNQTY" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->RETNQTY->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->RETNQTY->EditValue ?>"<?php echo $store_storemast_edit->RETNQTY->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->RETNQTY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->KEMODISC->Visible) { // KEMODISC ?>
	<div id="r_KEMODISC" class="form-group row">
		<label id="elh_store_storemast_KEMODISC" for="x_KEMODISC" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->KEMODISC->caption() ?><?php echo $store_storemast_edit->KEMODISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->KEMODISC->cellAttributes() ?>>
<span id="el_store_storemast_KEMODISC">
<input type="text" data-table="store_storemast" data-field="x_KEMODISC" name="x_KEMODISC" id="x_KEMODISC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast_edit->KEMODISC->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->KEMODISC->EditValue ?>"<?php echo $store_storemast_edit->KEMODISC->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->KEMODISC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->PATSALE->Visible) { // PATSALE ?>
	<div id="r_PATSALE" class="form-group row">
		<label id="elh_store_storemast_PATSALE" for="x_PATSALE" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->PATSALE->caption() ?><?php echo $store_storemast_edit->PATSALE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->PATSALE->cellAttributes() ?>>
<span id="el_store_storemast_PATSALE">
<input type="text" data-table="store_storemast" data-field="x_PATSALE" name="x_PATSALE" id="x_PATSALE" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->PATSALE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->PATSALE->EditValue ?>"<?php echo $store_storemast_edit->PATSALE->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->PATSALE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->ORGAN->Visible) { // ORGAN ?>
	<div id="r_ORGAN" class="form-group row">
		<label id="elh_store_storemast_ORGAN" for="x_ORGAN" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->ORGAN->caption() ?><?php echo $store_storemast_edit->ORGAN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->ORGAN->cellAttributes() ?>>
<span id="el_store_storemast_ORGAN">
<input type="text" data-table="store_storemast" data-field="x_ORGAN" name="x_ORGAN" id="x_ORGAN" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast_edit->ORGAN->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->ORGAN->EditValue ?>"<?php echo $store_storemast_edit->ORGAN->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->ORGAN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->OLDRQ->Visible) { // OLDRQ ?>
	<div id="r_OLDRQ" class="form-group row">
		<label id="elh_store_storemast_OLDRQ" for="x_OLDRQ" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->OLDRQ->caption() ?><?php echo $store_storemast_edit->OLDRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->OLDRQ->cellAttributes() ?>>
<span id="el_store_storemast_OLDRQ">
<input type="text" data-table="store_storemast" data-field="x_OLDRQ" name="x_OLDRQ" id="x_OLDRQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->OLDRQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->OLDRQ->EditValue ?>"<?php echo $store_storemast_edit->OLDRQ->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->OLDRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label id="elh_store_storemast_DRID" for="x_DRID" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->DRID->caption() ?><?php echo $store_storemast_edit->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->DRID->cellAttributes() ?>>
<span id="el_store_storemast_DRID">
<input type="text" data-table="store_storemast" data-field="x_DRID" name="x_DRID" id="x_DRID" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storemast_edit->DRID->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->DRID->EditValue ?>"<?php echo $store_storemast_edit->DRID->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->DRID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_store_storemast_MFRCODE" for="x_MFRCODE" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->MFRCODE->caption() ?><?php echo $store_storemast_edit->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->MFRCODE->cellAttributes() ?>>
<span id="el_store_storemast_MFRCODE">
<input type="text" data-table="store_storemast" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast_edit->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->MFRCODE->EditValue ?>"<?php echo $store_storemast_edit->MFRCODE->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->COMBCODE->Visible) { // COMBCODE ?>
	<div id="r_COMBCODE" class="form-group row">
		<label id="elh_store_storemast_COMBCODE" for="x_COMBCODE" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->COMBCODE->caption() ?><?php echo $store_storemast_edit->COMBCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->COMBCODE->cellAttributes() ?>>
<span id="el_store_storemast_COMBCODE">
<input type="text" data-table="store_storemast" data-field="x_COMBCODE" name="x_COMBCODE" id="x_COMBCODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast_edit->COMBCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->COMBCODE->EditValue ?>"<?php echo $store_storemast_edit->COMBCODE->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->COMBCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->GENCODE->Visible) { // GENCODE ?>
	<div id="r_GENCODE" class="form-group row">
		<label id="elh_store_storemast_GENCODE" for="x_GENCODE" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->GENCODE->caption() ?><?php echo $store_storemast_edit->GENCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->GENCODE->cellAttributes() ?>>
<span id="el_store_storemast_GENCODE">
<input type="text" data-table="store_storemast" data-field="x_GENCODE" name="x_GENCODE" id="x_GENCODE" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storemast_edit->GENCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->GENCODE->EditValue ?>"<?php echo $store_storemast_edit->GENCODE->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->GENCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->STRENGTH->Visible) { // STRENGTH ?>
	<div id="r_STRENGTH" class="form-group row">
		<label id="elh_store_storemast_STRENGTH" for="x_STRENGTH" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->STRENGTH->caption() ?><?php echo $store_storemast_edit->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->STRENGTH->cellAttributes() ?>>
<span id="el_store_storemast_STRENGTH">
<input type="text" data-table="store_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->STRENGTH->EditValue ?>"<?php echo $store_storemast_edit->STRENGTH->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->STRENGTH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->UNIT->Visible) { // UNIT ?>
	<div id="r_UNIT" class="form-group row">
		<label id="elh_store_storemast_UNIT" for="x_UNIT" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->UNIT->caption() ?><?php echo $store_storemast_edit->UNIT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->UNIT->cellAttributes() ?>>
<span id="el_store_storemast_UNIT">
<input type="text" data-table="store_storemast" data-field="x_UNIT" name="x_UNIT" id="x_UNIT" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast_edit->UNIT->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->UNIT->EditValue ?>"<?php echo $store_storemast_edit->UNIT->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->UNIT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->FORMULARY->Visible) { // FORMULARY ?>
	<div id="r_FORMULARY" class="form-group row">
		<label id="elh_store_storemast_FORMULARY" for="x_FORMULARY" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->FORMULARY->caption() ?><?php echo $store_storemast_edit->FORMULARY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->FORMULARY->cellAttributes() ?>>
<span id="el_store_storemast_FORMULARY">
<input type="text" data-table="store_storemast" data-field="x_FORMULARY" name="x_FORMULARY" id="x_FORMULARY" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($store_storemast_edit->FORMULARY->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->FORMULARY->EditValue ?>"<?php echo $store_storemast_edit->FORMULARY->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->FORMULARY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->STOCK->Visible) { // STOCK ?>
	<div id="r_STOCK" class="form-group row">
		<label id="elh_store_storemast_STOCK" for="x_STOCK" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->STOCK->caption() ?><?php echo $store_storemast_edit->STOCK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->STOCK->cellAttributes() ?>>
<span id="el_store_storemast_STOCK">
<input type="text" data-table="store_storemast" data-field="x_STOCK" name="x_STOCK" id="x_STOCK" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->STOCK->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->STOCK->EditValue ?>"<?php echo $store_storemast_edit->STOCK->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->STOCK->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->RACKNO->Visible) { // RACKNO ?>
	<div id="r_RACKNO" class="form-group row">
		<label id="elh_store_storemast_RACKNO" for="x_RACKNO" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->RACKNO->caption() ?><?php echo $store_storemast_edit->RACKNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->RACKNO->cellAttributes() ?>>
<span id="el_store_storemast_RACKNO">
<input type="text" data-table="store_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storemast_edit->RACKNO->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->RACKNO->EditValue ?>"<?php echo $store_storemast_edit->RACKNO->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->RACKNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->SUPPNAME->Visible) { // SUPPNAME ?>
	<div id="r_SUPPNAME" class="form-group row">
		<label id="elh_store_storemast_SUPPNAME" for="x_SUPPNAME" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->SUPPNAME->caption() ?><?php echo $store_storemast_edit->SUPPNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->SUPPNAME->cellAttributes() ?>>
<span id="el_store_storemast_SUPPNAME">
<input type="text" data-table="store_storemast" data-field="x_SUPPNAME" name="x_SUPPNAME" id="x_SUPPNAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast_edit->SUPPNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->SUPPNAME->EditValue ?>"<?php echo $store_storemast_edit->SUPPNAME->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->SUPPNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->COMBNAME->Visible) { // COMBNAME ?>
	<div id="r_COMBNAME" class="form-group row">
		<label id="elh_store_storemast_COMBNAME" for="x_COMBNAME" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->COMBNAME->caption() ?><?php echo $store_storemast_edit->COMBNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->COMBNAME->cellAttributes() ?>>
<span id="el_store_storemast_COMBNAME">
<input type="text" data-table="store_storemast" data-field="x_COMBNAME" name="x_COMBNAME" id="x_COMBNAME" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storemast_edit->COMBNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->COMBNAME->EditValue ?>"<?php echo $store_storemast_edit->COMBNAME->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->COMBNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->GENERICNAME->Visible) { // GENERICNAME ?>
	<div id="r_GENERICNAME" class="form-group row">
		<label id="elh_store_storemast_GENERICNAME" for="x_GENERICNAME" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->GENERICNAME->caption() ?><?php echo $store_storemast_edit->GENERICNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->GENERICNAME->cellAttributes() ?>>
<span id="el_store_storemast_GENERICNAME">
<input type="text" data-table="store_storemast" data-field="x_GENERICNAME" name="x_GENERICNAME" id="x_GENERICNAME" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storemast_edit->GENERICNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->GENERICNAME->EditValue ?>"<?php echo $store_storemast_edit->GENERICNAME->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->GENERICNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->REMARK->Visible) { // REMARK ?>
	<div id="r_REMARK" class="form-group row">
		<label id="elh_store_storemast_REMARK" for="x_REMARK" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->REMARK->caption() ?><?php echo $store_storemast_edit->REMARK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->REMARK->cellAttributes() ?>>
<span id="el_store_storemast_REMARK">
<input type="text" data-table="store_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast_edit->REMARK->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->REMARK->EditValue ?>"<?php echo $store_storemast_edit->REMARK->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->REMARK->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->TEMP->Visible) { // TEMP ?>
	<div id="r_TEMP" class="form-group row">
		<label id="elh_store_storemast_TEMP" for="x_TEMP" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->TEMP->caption() ?><?php echo $store_storemast_edit->TEMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->TEMP->cellAttributes() ?>>
<span id="el_store_storemast_TEMP">
<input type="text" data-table="store_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storemast_edit->TEMP->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->TEMP->EditValue ?>"<?php echo $store_storemast_edit->TEMP->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->TEMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->PACKING->Visible) { // PACKING ?>
	<div id="r_PACKING" class="form-group row">
		<label id="elh_store_storemast_PACKING" for="x_PACKING" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->PACKING->caption() ?><?php echo $store_storemast_edit->PACKING->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->PACKING->cellAttributes() ?>>
<span id="el_store_storemast_PACKING">
<input type="text" data-table="store_storemast" data-field="x_PACKING" name="x_PACKING" id="x_PACKING" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->PACKING->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->PACKING->EditValue ?>"<?php echo $store_storemast_edit->PACKING->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->PACKING->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->PhysQty->Visible) { // PhysQty ?>
	<div id="r_PhysQty" class="form-group row">
		<label id="elh_store_storemast_PhysQty" for="x_PhysQty" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->PhysQty->caption() ?><?php echo $store_storemast_edit->PhysQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->PhysQty->cellAttributes() ?>>
<span id="el_store_storemast_PhysQty">
<input type="text" data-table="store_storemast" data-field="x_PhysQty" name="x_PhysQty" id="x_PhysQty" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->PhysQty->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->PhysQty->EditValue ?>"<?php echo $store_storemast_edit->PhysQty->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->PhysQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->LedQty->Visible) { // LedQty ?>
	<div id="r_LedQty" class="form-group row">
		<label id="elh_store_storemast_LedQty" for="x_LedQty" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->LedQty->caption() ?><?php echo $store_storemast_edit->LedQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->LedQty->cellAttributes() ?>>
<span id="el_store_storemast_LedQty">
<input type="text" data-table="store_storemast" data-field="x_LedQty" name="x_LedQty" id="x_LedQty" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->LedQty->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->LedQty->EditValue ?>"<?php echo $store_storemast_edit->LedQty->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->LedQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_store_storemast_id" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->id->caption() ?><?php echo $store_storemast_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->id->cellAttributes() ?>>
<span id="el_store_storemast_id">
<span<?php echo $store_storemast_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($store_storemast_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="store_storemast" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($store_storemast_edit->id->CurrentValue) ?>">
<?php echo $store_storemast_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label id="elh_store_storemast_PurValue" for="x_PurValue" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->PurValue->caption() ?><?php echo $store_storemast_edit->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->PurValue->cellAttributes() ?>>
<span id="el_store_storemast_PurValue">
<input type="text" data-table="store_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->PurValue->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->PurValue->EditValue ?>"<?php echo $store_storemast_edit->PurValue->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->PurValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_store_storemast_PSGST" for="x_PSGST" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->PSGST->caption() ?><?php echo $store_storemast_edit->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->PSGST->cellAttributes() ?>>
<span id="el_store_storemast_PSGST">
<input type="text" data-table="store_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->PSGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->PSGST->EditValue ?>"<?php echo $store_storemast_edit->PSGST->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_store_storemast_PCGST" for="x_PCGST" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->PCGST->caption() ?><?php echo $store_storemast_edit->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->PCGST->cellAttributes() ?>>
<span id="el_store_storemast_PCGST">
<input type="text" data-table="store_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->PCGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->PCGST->EditValue ?>"<?php echo $store_storemast_edit->PCGST->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->SaleValue->Visible) { // SaleValue ?>
	<div id="r_SaleValue" class="form-group row">
		<label id="elh_store_storemast_SaleValue" for="x_SaleValue" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->SaleValue->caption() ?><?php echo $store_storemast_edit->SaleValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->SaleValue->cellAttributes() ?>>
<span id="el_store_storemast_SaleValue">
<input type="text" data-table="store_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->SaleValue->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->SaleValue->EditValue ?>"<?php echo $store_storemast_edit->SaleValue->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->SaleValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_store_storemast_SSGST" for="x_SSGST" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->SSGST->caption() ?><?php echo $store_storemast_edit->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->SSGST->cellAttributes() ?>>
<span id="el_store_storemast_SSGST">
<input type="text" data-table="store_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->SSGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->SSGST->EditValue ?>"<?php echo $store_storemast_edit->SSGST->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_store_storemast_SCGST" for="x_SCGST" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->SCGST->caption() ?><?php echo $store_storemast_edit->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->SCGST->cellAttributes() ?>>
<span id="el_store_storemast_SCGST">
<input type="text" data-table="store_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->SCGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->SCGST->EditValue ?>"<?php echo $store_storemast_edit->SCGST->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->SaleRate->Visible) { // SaleRate ?>
	<div id="r_SaleRate" class="form-group row">
		<label id="elh_store_storemast_SaleRate" for="x_SaleRate" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->SaleRate->caption() ?><?php echo $store_storemast_edit->SaleRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->SaleRate->cellAttributes() ?>>
<span id="el_store_storemast_SaleRate">
<input type="text" data-table="store_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->SaleRate->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->SaleRate->EditValue ?>"<?php echo $store_storemast_edit->SaleRate->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->SaleRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_store_storemast_HospID" for="x_HospID" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->HospID->caption() ?><?php echo $store_storemast_edit->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->HospID->cellAttributes() ?>>
<span id="el_store_storemast_HospID">
<input type="text" data-table="store_storemast" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($store_storemast_edit->HospID->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->HospID->EditValue ?>"<?php echo $store_storemast_edit->HospID->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_storemast_edit->BRNAME->Visible) { // BRNAME ?>
	<div id="r_BRNAME" class="form-group row">
		<label id="elh_store_storemast_BRNAME" for="x_BRNAME" class="<?php echo $store_storemast_edit->LeftColumnClass ?>"><?php echo $store_storemast_edit->BRNAME->caption() ?><?php echo $store_storemast_edit->BRNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_storemast_edit->RightColumnClass ?>"><div <?php echo $store_storemast_edit->BRNAME->cellAttributes() ?>>
<span id="el_store_storemast_BRNAME">
<input type="text" data-table="store_storemast" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storemast_edit->BRNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast_edit->BRNAME->EditValue ?>"<?php echo $store_storemast_edit->BRNAME->editAttributes() ?>>
</span>
<?php echo $store_storemast_edit->BRNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$store_storemast_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_storemast_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_storemast_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$store_storemast_edit->showPageFooter();
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
$store_storemast_edit->terminate();
?>