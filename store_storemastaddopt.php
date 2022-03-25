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
$store_storemast_addopt = new store_storemast_addopt();

// Run the page
$store_storemast_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storemast_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fstore_storemastaddopt = currentForm = new ew.Form("fstore_storemastaddopt", "addopt");

// Validate form
fstore_storemastaddopt.validate = function() {
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
		<?php if ($store_storemast_addopt->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->BRCODE->caption(), $store_storemast->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->BRCODE->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->PRC->caption(), $store_storemast->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->TYPE->caption(), $store_storemast->TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->DES->Required) { ?>
			elm = this.getElements("x" + infix + "_DES");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->DES->caption(), $store_storemast->DES->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->UM->Required) { ?>
			elm = this.getElements("x" + infix + "_UM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->UM->caption(), $store_storemast->UM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->RT->caption(), $store_storemast->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->RT->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->UR->caption(), $store_storemast->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->UR->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->TAXP->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->TAXP->caption(), $store_storemast->TAXP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->TAXP->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->BATCHNO->caption(), $store_storemast->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->OQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->OQ->caption(), $store_storemast->OQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->OQ->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->RQ->Required) { ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->RQ->caption(), $store_storemast->RQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->RQ->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->MRQ->caption(), $store_storemast->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->MRQ->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->IQ->caption(), $store_storemast->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->IQ->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->MRP->caption(), $store_storemast->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->MRP->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->EXPDT->caption(), $store_storemast->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->EXPDT->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->SALQTY->Required) { ?>
			elm = this.getElements("x" + infix + "_SALQTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->SALQTY->caption(), $store_storemast->SALQTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SALQTY");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->SALQTY->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->LASTPURDT->Required) { ?>
			elm = this.getElements("x" + infix + "_LASTPURDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->LASTPURDT->caption(), $store_storemast->LASTPURDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LASTPURDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->LASTPURDT->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->LASTSUPP->Required) { ?>
			elm = this.getElements("x" + infix + "_LASTSUPP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->LASTSUPP->caption(), $store_storemast->LASTSUPP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->GENNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->GENNAME->caption(), $store_storemast->GENNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->LASTISSDT->Required) { ?>
			elm = this.getElements("x" + infix + "_LASTISSDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->LASTISSDT->caption(), $store_storemast->LASTISSDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LASTISSDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->LASTISSDT->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->CREATEDDT->Required) { ?>
			elm = this.getElements("x" + infix + "_CREATEDDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->CREATEDDT->caption(), $store_storemast->CREATEDDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CREATEDDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->CREATEDDT->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->OPPRC->Required) { ?>
			elm = this.getElements("x" + infix + "_OPPRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->OPPRC->caption(), $store_storemast->OPPRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->RESTRICT->Required) { ?>
			elm = this.getElements("x" + infix + "_RESTRICT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->RESTRICT->caption(), $store_storemast->RESTRICT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->BAWAPRC->Required) { ?>
			elm = this.getElements("x" + infix + "_BAWAPRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->BAWAPRC->caption(), $store_storemast->BAWAPRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->STAXPER->Required) { ?>
			elm = this.getElements("x" + infix + "_STAXPER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->STAXPER->caption(), $store_storemast->STAXPER->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_STAXPER");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->STAXPER->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->TAXTYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXTYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->TAXTYPE->caption(), $store_storemast->TAXTYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->OLDTAXP->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDTAXP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->OLDTAXP->caption(), $store_storemast->OLDTAXP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDTAXP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->OLDTAXP->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->TAXUPD->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXUPD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->TAXUPD->caption(), $store_storemast->TAXUPD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->PACKAGE->Required) { ?>
			elm = this.getElements("x" + infix + "_PACKAGE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->PACKAGE->caption(), $store_storemast->PACKAGE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->NEWRT->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWRT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->NEWRT->caption(), $store_storemast->NEWRT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWRT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->NEWRT->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->NEWMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->NEWMRP->caption(), $store_storemast->NEWMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->NEWMRP->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->NEWUR->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWUR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->NEWUR->caption(), $store_storemast->NEWUR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWUR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->NEWUR->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->STATUS->Required) { ?>
			elm = this.getElements("x" + infix + "_STATUS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->STATUS->caption(), $store_storemast->STATUS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->RETNQTY->Required) { ?>
			elm = this.getElements("x" + infix + "_RETNQTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->RETNQTY->caption(), $store_storemast->RETNQTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RETNQTY");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->RETNQTY->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->KEMODISC->Required) { ?>
			elm = this.getElements("x" + infix + "_KEMODISC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->KEMODISC->caption(), $store_storemast->KEMODISC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->PATSALE->Required) { ?>
			elm = this.getElements("x" + infix + "_PATSALE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->PATSALE->caption(), $store_storemast->PATSALE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PATSALE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->PATSALE->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->ORGAN->Required) { ?>
			elm = this.getElements("x" + infix + "_ORGAN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->ORGAN->caption(), $store_storemast->ORGAN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->OLDRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->OLDRQ->caption(), $store_storemast->OLDRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->OLDRQ->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->DRID->Required) { ?>
			elm = this.getElements("x" + infix + "_DRID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->DRID->caption(), $store_storemast->DRID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->MFRCODE->caption(), $store_storemast->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->COMBCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_COMBCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->COMBCODE->caption(), $store_storemast->COMBCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->GENCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_GENCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->GENCODE->caption(), $store_storemast->GENCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->STRENGTH->Required) { ?>
			elm = this.getElements("x" + infix + "_STRENGTH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->STRENGTH->caption(), $store_storemast->STRENGTH->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_STRENGTH");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->STRENGTH->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->UNIT->Required) { ?>
			elm = this.getElements("x" + infix + "_UNIT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->UNIT->caption(), $store_storemast->UNIT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->FORMULARY->Required) { ?>
			elm = this.getElements("x" + infix + "_FORMULARY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->FORMULARY->caption(), $store_storemast->FORMULARY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->STOCK->Required) { ?>
			elm = this.getElements("x" + infix + "_STOCK");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->STOCK->caption(), $store_storemast->STOCK->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_STOCK");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->STOCK->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->RACKNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RACKNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->RACKNO->caption(), $store_storemast->RACKNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->SUPPNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_SUPPNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->SUPPNAME->caption(), $store_storemast->SUPPNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->COMBNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_COMBNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->COMBNAME->caption(), $store_storemast->COMBNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->GENERICNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENERICNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->GENERICNAME->caption(), $store_storemast->GENERICNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->REMARK->Required) { ?>
			elm = this.getElements("x" + infix + "_REMARK");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->REMARK->caption(), $store_storemast->REMARK->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->TEMP->Required) { ?>
			elm = this.getElements("x" + infix + "_TEMP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->TEMP->caption(), $store_storemast->TEMP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->PACKING->Required) { ?>
			elm = this.getElements("x" + infix + "_PACKING");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->PACKING->caption(), $store_storemast->PACKING->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PACKING");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->PACKING->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->PhysQty->Required) { ?>
			elm = this.getElements("x" + infix + "_PhysQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->PhysQty->caption(), $store_storemast->PhysQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PhysQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->PhysQty->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->LedQty->Required) { ?>
			elm = this.getElements("x" + infix + "_LedQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->LedQty->caption(), $store_storemast->LedQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LedQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->LedQty->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->PurValue->caption(), $store_storemast->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->PurValue->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->PSGST->caption(), $store_storemast->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->PSGST->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->PCGST->caption(), $store_storemast->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->PCGST->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->SaleValue->Required) { ?>
			elm = this.getElements("x" + infix + "_SaleValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->SaleValue->caption(), $store_storemast->SaleValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SaleValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->SaleValue->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->SSGST->caption(), $store_storemast->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->SSGST->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->SCGST->caption(), $store_storemast->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->SCGST->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->SaleRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SaleRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->SaleRate->caption(), $store_storemast->SaleRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SaleRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->SaleRate->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->HospID->caption(), $store_storemast->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->HospID->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->BRNAME->caption(), $store_storemast->BRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->OV->Required) { ?>
			elm = this.getElements("x" + infix + "_OV");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->OV->caption(), $store_storemast->OV->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OV");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->OV->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->LATESTOV->Required) { ?>
			elm = this.getElements("x" + infix + "_LATESTOV");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->LATESTOV->caption(), $store_storemast->LATESTOV->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LATESTOV");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->LATESTOV->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->ITEMTYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_ITEMTYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->ITEMTYPE->caption(), $store_storemast->ITEMTYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->ROWID->Required) { ?>
			elm = this.getElements("x" + infix + "_ROWID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->ROWID->caption(), $store_storemast->ROWID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->MOVED->Required) { ?>
			elm = this.getElements("x" + infix + "_MOVED");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->MOVED->caption(), $store_storemast->MOVED->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MOVED");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->MOVED->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->NEWTAX->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWTAX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->NEWTAX->caption(), $store_storemast->NEWTAX->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWTAX");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->NEWTAX->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->HSNCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_HSNCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->HSNCODE->caption(), $store_storemast->HSNCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_storemast_addopt->OLDTAX->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDTAX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->OLDTAX->caption(), $store_storemast->OLDTAX->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDTAX");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->OLDTAX->errorMessage()) ?>");
		<?php if ($store_storemast_addopt->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_storemast->StoreID->caption(), $store_storemast->StoreID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_storemast->StoreID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fstore_storemastaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_storemastaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_storemast_addopt->showPageHeader(); ?>
<?php
$store_storemast_addopt->showMessage();
?>
<form name="fstore_storemastaddopt" id="fstore_storemastaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($store_storemast_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_storemast_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $store_storemast_addopt->TableVar ?>">
<?php if ($store_storemast->BRCODE->Visible) { // BRCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BRCODE"><?php echo $store_storemast->BRCODE->caption() ?><?php echo ($store_storemast->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($store_storemast->BRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast->BRCODE->EditValue ?>"<?php echo $store_storemast->BRCODE->editAttributes() ?>>
<?php echo $store_storemast->BRCODE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->PRC->Visible) { // PRC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PRC"><?php echo $store_storemast->PRC->caption() ?><?php echo ($store_storemast->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storemast->PRC->getPlaceHolder()) ?>" value="<?php echo $store_storemast->PRC->EditValue ?>"<?php echo $store_storemast->PRC->editAttributes() ?>>
<?php echo $store_storemast->PRC->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->TYPE->Visible) { // TYPE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TYPE"><?php echo $store_storemast->TYPE->caption() ?><?php echo ($store_storemast->TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_TYPE" name="x_TYPE" id="x_TYPE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast->TYPE->getPlaceHolder()) ?>" value="<?php echo $store_storemast->TYPE->EditValue ?>"<?php echo $store_storemast->TYPE->editAttributes() ?>>
<?php echo $store_storemast->TYPE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->DES->Visible) { // DES ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_DES"><?php echo $store_storemast->DES->caption() ?><?php echo ($store_storemast->DES->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storemast->DES->getPlaceHolder()) ?>" value="<?php echo $store_storemast->DES->EditValue ?>"<?php echo $store_storemast->DES->editAttributes() ?>>
<?php echo $store_storemast->DES->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->UM->Visible) { // UM ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_UM"><?php echo $store_storemast->UM->caption() ?><?php echo ($store_storemast->UM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast->UM->getPlaceHolder()) ?>" value="<?php echo $store_storemast->UM->EditValue ?>"<?php echo $store_storemast->UM->editAttributes() ?>>
<?php echo $store_storemast->UM->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->RT->Visible) { // RT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RT"><?php echo $store_storemast->RT->caption() ?><?php echo ($store_storemast->RT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($store_storemast->RT->getPlaceHolder()) ?>" value="<?php echo $store_storemast->RT->EditValue ?>"<?php echo $store_storemast->RT->editAttributes() ?>>
<?php echo $store_storemast->RT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->UR->Visible) { // UR ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_UR"><?php echo $store_storemast->UR->caption() ?><?php echo ($store_storemast->UR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($store_storemast->UR->getPlaceHolder()) ?>" value="<?php echo $store_storemast->UR->EditValue ?>"<?php echo $store_storemast->UR->editAttributes() ?>>
<?php echo $store_storemast->UR->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->TAXP->Visible) { // TAXP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TAXP"><?php echo $store_storemast->TAXP->caption() ?><?php echo ($store_storemast->TAXP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($store_storemast->TAXP->getPlaceHolder()) ?>" value="<?php echo $store_storemast->TAXP->EditValue ?>"<?php echo $store_storemast->TAXP->editAttributes() ?>>
<?php echo $store_storemast->TAXP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->BATCHNO->Visible) { // BATCHNO ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BATCHNO"><?php echo $store_storemast->BATCHNO->caption() ?><?php echo ($store_storemast->BATCHNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($store_storemast->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $store_storemast->BATCHNO->EditValue ?>"<?php echo $store_storemast->BATCHNO->editAttributes() ?>>
<?php echo $store_storemast->BATCHNO->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->OQ->Visible) { // OQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OQ"><?php echo $store_storemast->OQ->caption() ?><?php echo ($store_storemast->OQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast->OQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast->OQ->EditValue ?>"<?php echo $store_storemast->OQ->editAttributes() ?>>
<?php echo $store_storemast->OQ->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->RQ->Visible) { // RQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RQ"><?php echo $store_storemast->RQ->caption() ?><?php echo ($store_storemast->RQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast->RQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast->RQ->EditValue ?>"<?php echo $store_storemast->RQ->editAttributes() ?>>
<?php echo $store_storemast->RQ->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->MRQ->Visible) { // MRQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MRQ"><?php echo $store_storemast->MRQ->caption() ?><?php echo ($store_storemast->MRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast->MRQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast->MRQ->EditValue ?>"<?php echo $store_storemast->MRQ->editAttributes() ?>>
<?php echo $store_storemast->MRQ->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->IQ->Visible) { // IQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_IQ"><?php echo $store_storemast->IQ->caption() ?><?php echo ($store_storemast->IQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast->IQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast->IQ->EditValue ?>"<?php echo $store_storemast->IQ->editAttributes() ?>>
<?php echo $store_storemast->IQ->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->MRP->Visible) { // MRP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MRP"><?php echo $store_storemast->MRP->caption() ?><?php echo ($store_storemast->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($store_storemast->MRP->getPlaceHolder()) ?>" value="<?php echo $store_storemast->MRP->EditValue ?>"<?php echo $store_storemast->MRP->editAttributes() ?>>
<?php echo $store_storemast->MRP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->EXPDT->Visible) { // EXPDT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_EXPDT"><?php echo $store_storemast->EXPDT->caption() ?><?php echo ($store_storemast->EXPDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($store_storemast->EXPDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast->EXPDT->EditValue ?>"<?php echo $store_storemast->EXPDT->editAttributes() ?>>
<?php if (!$store_storemast->EXPDT->ReadOnly && !$store_storemast->EXPDT->Disabled && !isset($store_storemast->EXPDT->EditAttrs["readonly"]) && !isset($store_storemast->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storemastaddopt", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php echo $store_storemast->EXPDT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->SALQTY->Visible) { // SALQTY ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SALQTY"><?php echo $store_storemast->SALQTY->caption() ?><?php echo ($store_storemast->SALQTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_SALQTY" name="x_SALQTY" id="x_SALQTY" size="30" placeholder="<?php echo HtmlEncode($store_storemast->SALQTY->getPlaceHolder()) ?>" value="<?php echo $store_storemast->SALQTY->EditValue ?>"<?php echo $store_storemast->SALQTY->editAttributes() ?>>
<?php echo $store_storemast->SALQTY->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->LASTPURDT->Visible) { // LASTPURDT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LASTPURDT"><?php echo $store_storemast->LASTPURDT->caption() ?><?php echo ($store_storemast->LASTPURDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?php echo HtmlEncode($store_storemast->LASTPURDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast->LASTPURDT->EditValue ?>"<?php echo $store_storemast->LASTPURDT->editAttributes() ?>>
<?php if (!$store_storemast->LASTPURDT->ReadOnly && !$store_storemast->LASTPURDT->Disabled && !isset($store_storemast->LASTPURDT->EditAttrs["readonly"]) && !isset($store_storemast->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storemastaddopt", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php echo $store_storemast->LASTPURDT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->LASTSUPP->Visible) { // LASTSUPP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LASTSUPP"><?php echo $store_storemast->LASTSUPP->caption() ?><?php echo ($store_storemast->LASTSUPP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_LASTSUPP" name="x_LASTSUPP" id="x_LASTSUPP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storemast->LASTSUPP->getPlaceHolder()) ?>" value="<?php echo $store_storemast->LASTSUPP->EditValue ?>"<?php echo $store_storemast->LASTSUPP->editAttributes() ?>>
<?php echo $store_storemast->LASTSUPP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->GENNAME->Visible) { // GENNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_GENNAME"><?php echo $store_storemast->GENNAME->caption() ?><?php echo ($store_storemast->GENNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($store_storemast->GENNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast->GENNAME->EditValue ?>"<?php echo $store_storemast->GENNAME->editAttributes() ?>>
<?php echo $store_storemast->GENNAME->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->LASTISSDT->Visible) { // LASTISSDT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LASTISSDT"><?php echo $store_storemast->LASTISSDT->caption() ?><?php echo ($store_storemast->LASTISSDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?php echo HtmlEncode($store_storemast->LASTISSDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast->LASTISSDT->EditValue ?>"<?php echo $store_storemast->LASTISSDT->editAttributes() ?>>
<?php if (!$store_storemast->LASTISSDT->ReadOnly && !$store_storemast->LASTISSDT->Disabled && !isset($store_storemast->LASTISSDT->EditAttrs["readonly"]) && !isset($store_storemast->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storemastaddopt", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php echo $store_storemast->LASTISSDT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CREATEDDT"><?php echo $store_storemast->CREATEDDT->caption() ?><?php echo ($store_storemast->CREATEDDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_CREATEDDT" name="x_CREATEDDT" id="x_CREATEDDT" placeholder="<?php echo HtmlEncode($store_storemast->CREATEDDT->getPlaceHolder()) ?>" value="<?php echo $store_storemast->CREATEDDT->EditValue ?>"<?php echo $store_storemast->CREATEDDT->editAttributes() ?>>
<?php if (!$store_storemast->CREATEDDT->ReadOnly && !$store_storemast->CREATEDDT->Disabled && !isset($store_storemast->CREATEDDT->EditAttrs["readonly"]) && !isset($store_storemast->CREATEDDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_storemastaddopt", "x_CREATEDDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php echo $store_storemast->CREATEDDT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->OPPRC->Visible) { // OPPRC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OPPRC"><?php echo $store_storemast->OPPRC->caption() ?><?php echo ($store_storemast->OPPRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_OPPRC" name="x_OPPRC" id="x_OPPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storemast->OPPRC->getPlaceHolder()) ?>" value="<?php echo $store_storemast->OPPRC->EditValue ?>"<?php echo $store_storemast->OPPRC->editAttributes() ?>>
<?php echo $store_storemast->OPPRC->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->RESTRICT->Visible) { // RESTRICT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RESTRICT"><?php echo $store_storemast->RESTRICT->caption() ?><?php echo ($store_storemast->RESTRICT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_RESTRICT" name="x_RESTRICT" id="x_RESTRICT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast->RESTRICT->getPlaceHolder()) ?>" value="<?php echo $store_storemast->RESTRICT->EditValue ?>"<?php echo $store_storemast->RESTRICT->editAttributes() ?>>
<?php echo $store_storemast->RESTRICT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->BAWAPRC->Visible) { // BAWAPRC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BAWAPRC"><?php echo $store_storemast->BAWAPRC->caption() ?><?php echo ($store_storemast->BAWAPRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_BAWAPRC" name="x_BAWAPRC" id="x_BAWAPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($store_storemast->BAWAPRC->getPlaceHolder()) ?>" value="<?php echo $store_storemast->BAWAPRC->EditValue ?>"<?php echo $store_storemast->BAWAPRC->editAttributes() ?>>
<?php echo $store_storemast->BAWAPRC->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->STAXPER->Visible) { // STAXPER ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STAXPER"><?php echo $store_storemast->STAXPER->caption() ?><?php echo ($store_storemast->STAXPER->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_STAXPER" name="x_STAXPER" id="x_STAXPER" size="30" placeholder="<?php echo HtmlEncode($store_storemast->STAXPER->getPlaceHolder()) ?>" value="<?php echo $store_storemast->STAXPER->EditValue ?>"<?php echo $store_storemast->STAXPER->editAttributes() ?>>
<?php echo $store_storemast->STAXPER->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->TAXTYPE->Visible) { // TAXTYPE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TAXTYPE"><?php echo $store_storemast->TAXTYPE->caption() ?><?php echo ($store_storemast->TAXTYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_TAXTYPE" name="x_TAXTYPE" id="x_TAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast->TAXTYPE->getPlaceHolder()) ?>" value="<?php echo $store_storemast->TAXTYPE->EditValue ?>"<?php echo $store_storemast->TAXTYPE->editAttributes() ?>>
<?php echo $store_storemast->TAXTYPE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->OLDTAXP->Visible) { // OLDTAXP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OLDTAXP"><?php echo $store_storemast->OLDTAXP->caption() ?><?php echo ($store_storemast->OLDTAXP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_OLDTAXP" name="x_OLDTAXP" id="x_OLDTAXP" size="30" placeholder="<?php echo HtmlEncode($store_storemast->OLDTAXP->getPlaceHolder()) ?>" value="<?php echo $store_storemast->OLDTAXP->EditValue ?>"<?php echo $store_storemast->OLDTAXP->editAttributes() ?>>
<?php echo $store_storemast->OLDTAXP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->TAXUPD->Visible) { // TAXUPD ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TAXUPD"><?php echo $store_storemast->TAXUPD->caption() ?><?php echo ($store_storemast->TAXUPD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_TAXUPD" name="x_TAXUPD" id="x_TAXUPD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast->TAXUPD->getPlaceHolder()) ?>" value="<?php echo $store_storemast->TAXUPD->EditValue ?>"<?php echo $store_storemast->TAXUPD->editAttributes() ?>>
<?php echo $store_storemast->TAXUPD->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->PACKAGE->Visible) { // PACKAGE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PACKAGE"><?php echo $store_storemast->PACKAGE->caption() ?><?php echo ($store_storemast->PACKAGE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_PACKAGE" name="x_PACKAGE" id="x_PACKAGE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast->PACKAGE->getPlaceHolder()) ?>" value="<?php echo $store_storemast->PACKAGE->EditValue ?>"<?php echo $store_storemast->PACKAGE->editAttributes() ?>>
<?php echo $store_storemast->PACKAGE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->NEWRT->Visible) { // NEWRT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWRT"><?php echo $store_storemast->NEWRT->caption() ?><?php echo ($store_storemast->NEWRT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_NEWRT" name="x_NEWRT" id="x_NEWRT" size="30" placeholder="<?php echo HtmlEncode($store_storemast->NEWRT->getPlaceHolder()) ?>" value="<?php echo $store_storemast->NEWRT->EditValue ?>"<?php echo $store_storemast->NEWRT->editAttributes() ?>>
<?php echo $store_storemast->NEWRT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->NEWMRP->Visible) { // NEWMRP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWMRP"><?php echo $store_storemast->NEWMRP->caption() ?><?php echo ($store_storemast->NEWMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_NEWMRP" name="x_NEWMRP" id="x_NEWMRP" size="30" placeholder="<?php echo HtmlEncode($store_storemast->NEWMRP->getPlaceHolder()) ?>" value="<?php echo $store_storemast->NEWMRP->EditValue ?>"<?php echo $store_storemast->NEWMRP->editAttributes() ?>>
<?php echo $store_storemast->NEWMRP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->NEWUR->Visible) { // NEWUR ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWUR"><?php echo $store_storemast->NEWUR->caption() ?><?php echo ($store_storemast->NEWUR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_NEWUR" name="x_NEWUR" id="x_NEWUR" size="30" placeholder="<?php echo HtmlEncode($store_storemast->NEWUR->getPlaceHolder()) ?>" value="<?php echo $store_storemast->NEWUR->EditValue ?>"<?php echo $store_storemast->NEWUR->editAttributes() ?>>
<?php echo $store_storemast->NEWUR->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->STATUS->Visible) { // STATUS ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STATUS"><?php echo $store_storemast->STATUS->caption() ?><?php echo ($store_storemast->STATUS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_STATUS" name="x_STATUS" id="x_STATUS" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storemast->STATUS->getPlaceHolder()) ?>" value="<?php echo $store_storemast->STATUS->EditValue ?>"<?php echo $store_storemast->STATUS->editAttributes() ?>>
<?php echo $store_storemast->STATUS->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->RETNQTY->Visible) { // RETNQTY ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RETNQTY"><?php echo $store_storemast->RETNQTY->caption() ?><?php echo ($store_storemast->RETNQTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_RETNQTY" name="x_RETNQTY" id="x_RETNQTY" size="30" placeholder="<?php echo HtmlEncode($store_storemast->RETNQTY->getPlaceHolder()) ?>" value="<?php echo $store_storemast->RETNQTY->EditValue ?>"<?php echo $store_storemast->RETNQTY->editAttributes() ?>>
<?php echo $store_storemast->RETNQTY->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->KEMODISC->Visible) { // KEMODISC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_KEMODISC"><?php echo $store_storemast->KEMODISC->caption() ?><?php echo ($store_storemast->KEMODISC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_KEMODISC" name="x_KEMODISC" id="x_KEMODISC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($store_storemast->KEMODISC->getPlaceHolder()) ?>" value="<?php echo $store_storemast->KEMODISC->EditValue ?>"<?php echo $store_storemast->KEMODISC->editAttributes() ?>>
<?php echo $store_storemast->KEMODISC->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->PATSALE->Visible) { // PATSALE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PATSALE"><?php echo $store_storemast->PATSALE->caption() ?><?php echo ($store_storemast->PATSALE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_PATSALE" name="x_PATSALE" id="x_PATSALE" size="30" placeholder="<?php echo HtmlEncode($store_storemast->PATSALE->getPlaceHolder()) ?>" value="<?php echo $store_storemast->PATSALE->EditValue ?>"<?php echo $store_storemast->PATSALE->editAttributes() ?>>
<?php echo $store_storemast->PATSALE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->ORGAN->Visible) { // ORGAN ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ORGAN"><?php echo $store_storemast->ORGAN->caption() ?><?php echo ($store_storemast->ORGAN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_ORGAN" name="x_ORGAN" id="x_ORGAN" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast->ORGAN->getPlaceHolder()) ?>" value="<?php echo $store_storemast->ORGAN->EditValue ?>"<?php echo $store_storemast->ORGAN->editAttributes() ?>>
<?php echo $store_storemast->ORGAN->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->OLDRQ->Visible) { // OLDRQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OLDRQ"><?php echo $store_storemast->OLDRQ->caption() ?><?php echo ($store_storemast->OLDRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_OLDRQ" name="x_OLDRQ" id="x_OLDRQ" size="30" placeholder="<?php echo HtmlEncode($store_storemast->OLDRQ->getPlaceHolder()) ?>" value="<?php echo $store_storemast->OLDRQ->EditValue ?>"<?php echo $store_storemast->OLDRQ->editAttributes() ?>>
<?php echo $store_storemast->OLDRQ->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->DRID->Visible) { // DRID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_DRID"><?php echo $store_storemast->DRID->caption() ?><?php echo ($store_storemast->DRID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_DRID" name="x_DRID" id="x_DRID" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storemast->DRID->getPlaceHolder()) ?>" value="<?php echo $store_storemast->DRID->EditValue ?>"<?php echo $store_storemast->DRID->editAttributes() ?>>
<?php echo $store_storemast->DRID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->MFRCODE->Visible) { // MFRCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MFRCODE"><?php echo $store_storemast->MFRCODE->caption() ?><?php echo ($store_storemast->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast->MFRCODE->EditValue ?>"<?php echo $store_storemast->MFRCODE->editAttributes() ?>>
<?php echo $store_storemast->MFRCODE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->COMBCODE->Visible) { // COMBCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_COMBCODE"><?php echo $store_storemast->COMBCODE->caption() ?><?php echo ($store_storemast->COMBCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_COMBCODE" name="x_COMBCODE" id="x_COMBCODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast->COMBCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast->COMBCODE->EditValue ?>"<?php echo $store_storemast->COMBCODE->editAttributes() ?>>
<?php echo $store_storemast->COMBCODE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->GENCODE->Visible) { // GENCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_GENCODE"><?php echo $store_storemast->GENCODE->caption() ?><?php echo ($store_storemast->GENCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_GENCODE" name="x_GENCODE" id="x_GENCODE" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storemast->GENCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast->GENCODE->EditValue ?>"<?php echo $store_storemast->GENCODE->editAttributes() ?>>
<?php echo $store_storemast->GENCODE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->STRENGTH->Visible) { // STRENGTH ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STRENGTH"><?php echo $store_storemast->STRENGTH->caption() ?><?php echo ($store_storemast->STRENGTH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($store_storemast->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $store_storemast->STRENGTH->EditValue ?>"<?php echo $store_storemast->STRENGTH->editAttributes() ?>>
<?php echo $store_storemast->STRENGTH->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->UNIT->Visible) { // UNIT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_UNIT"><?php echo $store_storemast->UNIT->caption() ?><?php echo ($store_storemast->UNIT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_UNIT" name="x_UNIT" id="x_UNIT" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($store_storemast->UNIT->getPlaceHolder()) ?>" value="<?php echo $store_storemast->UNIT->EditValue ?>"<?php echo $store_storemast->UNIT->editAttributes() ?>>
<?php echo $store_storemast->UNIT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->FORMULARY->Visible) { // FORMULARY ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_FORMULARY"><?php echo $store_storemast->FORMULARY->caption() ?><?php echo ($store_storemast->FORMULARY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_FORMULARY" name="x_FORMULARY" id="x_FORMULARY" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($store_storemast->FORMULARY->getPlaceHolder()) ?>" value="<?php echo $store_storemast->FORMULARY->EditValue ?>"<?php echo $store_storemast->FORMULARY->editAttributes() ?>>
<?php echo $store_storemast->FORMULARY->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->STOCK->Visible) { // STOCK ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STOCK"><?php echo $store_storemast->STOCK->caption() ?><?php echo ($store_storemast->STOCK->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_STOCK" name="x_STOCK" id="x_STOCK" size="30" placeholder="<?php echo HtmlEncode($store_storemast->STOCK->getPlaceHolder()) ?>" value="<?php echo $store_storemast->STOCK->EditValue ?>"<?php echo $store_storemast->STOCK->editAttributes() ?>>
<?php echo $store_storemast->STOCK->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->RACKNO->Visible) { // RACKNO ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RACKNO"><?php echo $store_storemast->RACKNO->caption() ?><?php echo ($store_storemast->RACKNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_storemast->RACKNO->getPlaceHolder()) ?>" value="<?php echo $store_storemast->RACKNO->EditValue ?>"<?php echo $store_storemast->RACKNO->editAttributes() ?>>
<?php echo $store_storemast->RACKNO->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->SUPPNAME->Visible) { // SUPPNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SUPPNAME"><?php echo $store_storemast->SUPPNAME->caption() ?><?php echo ($store_storemast->SUPPNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_SUPPNAME" name="x_SUPPNAME" id="x_SUPPNAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast->SUPPNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast->SUPPNAME->EditValue ?>"<?php echo $store_storemast->SUPPNAME->editAttributes() ?>>
<?php echo $store_storemast->SUPPNAME->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->COMBNAME->Visible) { // COMBNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_COMBNAME"><?php echo $store_storemast->COMBNAME->caption() ?><?php echo ($store_storemast->COMBNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_COMBNAME" name="x_COMBNAME" id="x_COMBNAME" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storemast->COMBNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast->COMBNAME->EditValue ?>"<?php echo $store_storemast->COMBNAME->editAttributes() ?>>
<?php echo $store_storemast->COMBNAME->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_GENERICNAME"><?php echo $store_storemast->GENERICNAME->caption() ?><?php echo ($store_storemast->GENERICNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_GENERICNAME" name="x_GENERICNAME" id="x_GENERICNAME" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_storemast->GENERICNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast->GENERICNAME->EditValue ?>"<?php echo $store_storemast->GENERICNAME->editAttributes() ?>>
<?php echo $store_storemast->GENERICNAME->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->REMARK->Visible) { // REMARK ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_REMARK"><?php echo $store_storemast->REMARK->caption() ?><?php echo ($store_storemast->REMARK->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_storemast->REMARK->getPlaceHolder()) ?>" value="<?php echo $store_storemast->REMARK->EditValue ?>"<?php echo $store_storemast->REMARK->editAttributes() ?>>
<?php echo $store_storemast->REMARK->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->TEMP->Visible) { // TEMP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TEMP"><?php echo $store_storemast->TEMP->caption() ?><?php echo ($store_storemast->TEMP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_storemast->TEMP->getPlaceHolder()) ?>" value="<?php echo $store_storemast->TEMP->EditValue ?>"<?php echo $store_storemast->TEMP->editAttributes() ?>>
<?php echo $store_storemast->TEMP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->PACKING->Visible) { // PACKING ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PACKING"><?php echo $store_storemast->PACKING->caption() ?><?php echo ($store_storemast->PACKING->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_PACKING" name="x_PACKING" id="x_PACKING" size="30" placeholder="<?php echo HtmlEncode($store_storemast->PACKING->getPlaceHolder()) ?>" value="<?php echo $store_storemast->PACKING->EditValue ?>"<?php echo $store_storemast->PACKING->editAttributes() ?>>
<?php echo $store_storemast->PACKING->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->PhysQty->Visible) { // PhysQty ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PhysQty"><?php echo $store_storemast->PhysQty->caption() ?><?php echo ($store_storemast->PhysQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_PhysQty" name="x_PhysQty" id="x_PhysQty" size="30" placeholder="<?php echo HtmlEncode($store_storemast->PhysQty->getPlaceHolder()) ?>" value="<?php echo $store_storemast->PhysQty->EditValue ?>"<?php echo $store_storemast->PhysQty->editAttributes() ?>>
<?php echo $store_storemast->PhysQty->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->LedQty->Visible) { // LedQty ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LedQty"><?php echo $store_storemast->LedQty->caption() ?><?php echo ($store_storemast->LedQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_LedQty" name="x_LedQty" id="x_LedQty" size="30" placeholder="<?php echo HtmlEncode($store_storemast->LedQty->getPlaceHolder()) ?>" value="<?php echo $store_storemast->LedQty->EditValue ?>"<?php echo $store_storemast->LedQty->editAttributes() ?>>
<?php echo $store_storemast->LedQty->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->PurValue->Visible) { // PurValue ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PurValue"><?php echo $store_storemast->PurValue->caption() ?><?php echo ($store_storemast->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($store_storemast->PurValue->getPlaceHolder()) ?>" value="<?php echo $store_storemast->PurValue->EditValue ?>"<?php echo $store_storemast->PurValue->editAttributes() ?>>
<?php echo $store_storemast->PurValue->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->PSGST->Visible) { // PSGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PSGST"><?php echo $store_storemast->PSGST->caption() ?><?php echo ($store_storemast->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast->PSGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast->PSGST->EditValue ?>"<?php echo $store_storemast->PSGST->editAttributes() ?>>
<?php echo $store_storemast->PSGST->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->PCGST->Visible) { // PCGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PCGST"><?php echo $store_storemast->PCGST->caption() ?><?php echo ($store_storemast->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast->PCGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast->PCGST->EditValue ?>"<?php echo $store_storemast->PCGST->editAttributes() ?>>
<?php echo $store_storemast->PCGST->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->SaleValue->Visible) { // SaleValue ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SaleValue"><?php echo $store_storemast->SaleValue->caption() ?><?php echo ($store_storemast->SaleValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?php echo HtmlEncode($store_storemast->SaleValue->getPlaceHolder()) ?>" value="<?php echo $store_storemast->SaleValue->EditValue ?>"<?php echo $store_storemast->SaleValue->editAttributes() ?>>
<?php echo $store_storemast->SaleValue->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->SSGST->Visible) { // SSGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SSGST"><?php echo $store_storemast->SSGST->caption() ?><?php echo ($store_storemast->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast->SSGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast->SSGST->EditValue ?>"<?php echo $store_storemast->SSGST->editAttributes() ?>>
<?php echo $store_storemast->SSGST->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->SCGST->Visible) { // SCGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SCGST"><?php echo $store_storemast->SCGST->caption() ?><?php echo ($store_storemast->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($store_storemast->SCGST->getPlaceHolder()) ?>" value="<?php echo $store_storemast->SCGST->EditValue ?>"<?php echo $store_storemast->SCGST->editAttributes() ?>>
<?php echo $store_storemast->SCGST->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->SaleRate->Visible) { // SaleRate ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SaleRate"><?php echo $store_storemast->SaleRate->caption() ?><?php echo ($store_storemast->SaleRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?php echo HtmlEncode($store_storemast->SaleRate->getPlaceHolder()) ?>" value="<?php echo $store_storemast->SaleRate->EditValue ?>"<?php echo $store_storemast->SaleRate->editAttributes() ?>>
<?php echo $store_storemast->SaleRate->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->HospID->Visible) { // HospID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_HospID"><?php echo $store_storemast->HospID->caption() ?><?php echo ($store_storemast->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($store_storemast->HospID->getPlaceHolder()) ?>" value="<?php echo $store_storemast->HospID->EditValue ?>"<?php echo $store_storemast->HospID->editAttributes() ?>>
<?php echo $store_storemast->HospID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->BRNAME->Visible) { // BRNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BRNAME"><?php echo $store_storemast->BRNAME->caption() ?><?php echo ($store_storemast->BRNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storemast->BRNAME->getPlaceHolder()) ?>" value="<?php echo $store_storemast->BRNAME->EditValue ?>"<?php echo $store_storemast->BRNAME->editAttributes() ?>>
<?php echo $store_storemast->BRNAME->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->OV->Visible) { // OV ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OV"><?php echo $store_storemast->OV->caption() ?><?php echo ($store_storemast->OV->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_OV" name="x_OV" id="x_OV" size="30" placeholder="<?php echo HtmlEncode($store_storemast->OV->getPlaceHolder()) ?>" value="<?php echo $store_storemast->OV->EditValue ?>"<?php echo $store_storemast->OV->editAttributes() ?>>
<?php echo $store_storemast->OV->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->LATESTOV->Visible) { // LATESTOV ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LATESTOV"><?php echo $store_storemast->LATESTOV->caption() ?><?php echo ($store_storemast->LATESTOV->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_LATESTOV" name="x_LATESTOV" id="x_LATESTOV" size="30" placeholder="<?php echo HtmlEncode($store_storemast->LATESTOV->getPlaceHolder()) ?>" value="<?php echo $store_storemast->LATESTOV->EditValue ?>"<?php echo $store_storemast->LATESTOV->editAttributes() ?>>
<?php echo $store_storemast->LATESTOV->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->ITEMTYPE->Visible) { // ITEMTYPE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ITEMTYPE"><?php echo $store_storemast->ITEMTYPE->caption() ?><?php echo ($store_storemast->ITEMTYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_ITEMTYPE" name="x_ITEMTYPE" id="x_ITEMTYPE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storemast->ITEMTYPE->getPlaceHolder()) ?>" value="<?php echo $store_storemast->ITEMTYPE->EditValue ?>"<?php echo $store_storemast->ITEMTYPE->editAttributes() ?>>
<?php echo $store_storemast->ITEMTYPE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->ROWID->Visible) { // ROWID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ROWID"><?php echo $store_storemast->ROWID->caption() ?><?php echo ($store_storemast->ROWID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_ROWID" name="x_ROWID" id="x_ROWID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storemast->ROWID->getPlaceHolder()) ?>" value="<?php echo $store_storemast->ROWID->EditValue ?>"<?php echo $store_storemast->ROWID->editAttributes() ?>>
<?php echo $store_storemast->ROWID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->MOVED->Visible) { // MOVED ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MOVED"><?php echo $store_storemast->MOVED->caption() ?><?php echo ($store_storemast->MOVED->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_MOVED" name="x_MOVED" id="x_MOVED" size="30" placeholder="<?php echo HtmlEncode($store_storemast->MOVED->getPlaceHolder()) ?>" value="<?php echo $store_storemast->MOVED->EditValue ?>"<?php echo $store_storemast->MOVED->editAttributes() ?>>
<?php echo $store_storemast->MOVED->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->NEWTAX->Visible) { // NEWTAX ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWTAX"><?php echo $store_storemast->NEWTAX->caption() ?><?php echo ($store_storemast->NEWTAX->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_NEWTAX" name="x_NEWTAX" id="x_NEWTAX" size="30" placeholder="<?php echo HtmlEncode($store_storemast->NEWTAX->getPlaceHolder()) ?>" value="<?php echo $store_storemast->NEWTAX->EditValue ?>"<?php echo $store_storemast->NEWTAX->editAttributes() ?>>
<?php echo $store_storemast->NEWTAX->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->HSNCODE->Visible) { // HSNCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_HSNCODE"><?php echo $store_storemast->HSNCODE->caption() ?><?php echo ($store_storemast->HSNCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_HSNCODE" name="x_HSNCODE" id="x_HSNCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_storemast->HSNCODE->getPlaceHolder()) ?>" value="<?php echo $store_storemast->HSNCODE->EditValue ?>"<?php echo $store_storemast->HSNCODE->editAttributes() ?>>
<?php echo $store_storemast->HSNCODE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->OLDTAX->Visible) { // OLDTAX ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OLDTAX"><?php echo $store_storemast->OLDTAX->caption() ?><?php echo ($store_storemast->OLDTAX->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_OLDTAX" name="x_OLDTAX" id="x_OLDTAX" size="30" placeholder="<?php echo HtmlEncode($store_storemast->OLDTAX->getPlaceHolder()) ?>" value="<?php echo $store_storemast->OLDTAX->EditValue ?>"<?php echo $store_storemast->OLDTAX->editAttributes() ?>>
<?php echo $store_storemast->OLDTAX->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_storemast->StoreID->Visible) { // StoreID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_StoreID"><?php echo $store_storemast->StoreID->caption() ?><?php echo ($store_storemast->StoreID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_storemast" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_storemast->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_storemast->StoreID->EditValue ?>"<?php echo $store_storemast->StoreID->editAttributes() ?>>
<?php echo $store_storemast->StoreID->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$store_storemast_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$store_storemast_addopt->terminate();
?>