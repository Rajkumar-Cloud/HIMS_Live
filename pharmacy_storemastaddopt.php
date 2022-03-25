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
$pharmacy_storemast_addopt = new pharmacy_storemast_addopt();

// Run the page
$pharmacy_storemast_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_storemast_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fpharmacy_storemastaddopt = currentForm = new ew.Form("fpharmacy_storemastaddopt", "addopt");

// Validate form
fpharmacy_storemastaddopt.validate = function() {
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
		<?php if ($pharmacy_storemast_addopt->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->BRCODE->caption(), $pharmacy_storemast->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PRC->caption(), $pharmacy_storemast->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->TYPE->caption(), $pharmacy_storemast->TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->DES->Required) { ?>
			elm = this.getElements("x" + infix + "_DES");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->DES->caption(), $pharmacy_storemast->DES->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->UM->Required) { ?>
			elm = this.getElements("x" + infix + "_UM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->UM->caption(), $pharmacy_storemast->UM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->RT->caption(), $pharmacy_storemast->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->RT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->UR->caption(), $pharmacy_storemast->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->UR->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->TAXP->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->TAXP->caption(), $pharmacy_storemast->TAXP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->TAXP->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->BATCHNO->caption(), $pharmacy_storemast->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->OQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->OQ->caption(), $pharmacy_storemast->OQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->OQ->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->RQ->Required) { ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->RQ->caption(), $pharmacy_storemast->RQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->RQ->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->MRQ->caption(), $pharmacy_storemast->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->MRQ->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->IQ->caption(), $pharmacy_storemast->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->IQ->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->MRP->caption(), $pharmacy_storemast->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->MRP->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->EXPDT->caption(), $pharmacy_storemast->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->EXPDT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->SALQTY->Required) { ?>
			elm = this.getElements("x" + infix + "_SALQTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SALQTY->caption(), $pharmacy_storemast->SALQTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SALQTY");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SALQTY->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->LASTPURDT->Required) { ?>
			elm = this.getElements("x" + infix + "_LASTPURDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->LASTPURDT->caption(), $pharmacy_storemast->LASTPURDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LASTPURDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->LASTPURDT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->LASTSUPP->Required) { ?>
			elm = this.getElements("x" + infix + "_LASTSUPP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->LASTSUPP->caption(), $pharmacy_storemast->LASTSUPP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->GENNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->GENNAME->caption(), $pharmacy_storemast->GENNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->LASTISSDT->Required) { ?>
			elm = this.getElements("x" + infix + "_LASTISSDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->LASTISSDT->caption(), $pharmacy_storemast->LASTISSDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LASTISSDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->LASTISSDT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->CREATEDDT->Required) { ?>
			elm = this.getElements("x" + infix + "_CREATEDDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->CREATEDDT->caption(), $pharmacy_storemast->CREATEDDT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->OPPRC->Required) { ?>
			elm = this.getElements("x" + infix + "_OPPRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->OPPRC->caption(), $pharmacy_storemast->OPPRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->RESTRICT->Required) { ?>
			elm = this.getElements("x" + infix + "_RESTRICT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->RESTRICT->caption(), $pharmacy_storemast->RESTRICT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->BAWAPRC->Required) { ?>
			elm = this.getElements("x" + infix + "_BAWAPRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->BAWAPRC->caption(), $pharmacy_storemast->BAWAPRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->STAXPER->Required) { ?>
			elm = this.getElements("x" + infix + "_STAXPER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->STAXPER->caption(), $pharmacy_storemast->STAXPER->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_STAXPER");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->STAXPER->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->TAXTYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXTYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->TAXTYPE->caption(), $pharmacy_storemast->TAXTYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->OLDTAXP->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDTAXP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->OLDTAXP->caption(), $pharmacy_storemast->OLDTAXP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDTAXP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->OLDTAXP->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->TAXUPD->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXUPD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->TAXUPD->caption(), $pharmacy_storemast->TAXUPD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->PACKAGE->Required) { ?>
			elm = this.getElements("x" + infix + "_PACKAGE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PACKAGE->caption(), $pharmacy_storemast->PACKAGE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->NEWRT->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWRT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->NEWRT->caption(), $pharmacy_storemast->NEWRT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWRT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->NEWRT->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->NEWMRP->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWMRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->NEWMRP->caption(), $pharmacy_storemast->NEWMRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWMRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->NEWMRP->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->NEWUR->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWUR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->NEWUR->caption(), $pharmacy_storemast->NEWUR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWUR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->NEWUR->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->STATUS->Required) { ?>
			elm = this.getElements("x" + infix + "_STATUS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->STATUS->caption(), $pharmacy_storemast->STATUS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->RETNQTY->Required) { ?>
			elm = this.getElements("x" + infix + "_RETNQTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->RETNQTY->caption(), $pharmacy_storemast->RETNQTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RETNQTY");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->RETNQTY->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->KEMODISC->Required) { ?>
			elm = this.getElements("x" + infix + "_KEMODISC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->KEMODISC->caption(), $pharmacy_storemast->KEMODISC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->PATSALE->Required) { ?>
			elm = this.getElements("x" + infix + "_PATSALE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PATSALE->caption(), $pharmacy_storemast->PATSALE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PATSALE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PATSALE->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->ORGAN->Required) { ?>
			elm = this.getElements("x" + infix + "_ORGAN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->ORGAN->caption(), $pharmacy_storemast->ORGAN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->OLDRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->OLDRQ->caption(), $pharmacy_storemast->OLDRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->OLDRQ->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->DRID->Required) { ?>
			elm = this.getElements("x" + infix + "_DRID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->DRID->caption(), $pharmacy_storemast->DRID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->MFRCODE->caption(), $pharmacy_storemast->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->COMBCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_COMBCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->COMBCODE->caption(), $pharmacy_storemast->COMBCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->GENCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_GENCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->GENCODE->caption(), $pharmacy_storemast->GENCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->STRENGTH->Required) { ?>
			elm = this.getElements("x" + infix + "_STRENGTH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->STRENGTH->caption(), $pharmacy_storemast->STRENGTH->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_STRENGTH");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->STRENGTH->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->UNIT->Required) { ?>
			elm = this.getElements("x" + infix + "_UNIT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->UNIT->caption(), $pharmacy_storemast->UNIT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->FORMULARY->Required) { ?>
			elm = this.getElements("x" + infix + "_FORMULARY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->FORMULARY->caption(), $pharmacy_storemast->FORMULARY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->STOCK->Required) { ?>
			elm = this.getElements("x" + infix + "_STOCK");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->STOCK->caption(), $pharmacy_storemast->STOCK->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_STOCK");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->STOCK->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->RACKNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RACKNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->RACKNO->caption(), $pharmacy_storemast->RACKNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->SUPPNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_SUPPNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SUPPNAME->caption(), $pharmacy_storemast->SUPPNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->COMBNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_COMBNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->COMBNAME->caption(), $pharmacy_storemast->COMBNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->GENERICNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENERICNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->GENERICNAME->caption(), $pharmacy_storemast->GENERICNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->REMARK->Required) { ?>
			elm = this.getElements("x" + infix + "_REMARK");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->REMARK->caption(), $pharmacy_storemast->REMARK->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->TEMP->Required) { ?>
			elm = this.getElements("x" + infix + "_TEMP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->TEMP->caption(), $pharmacy_storemast->TEMP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->PACKING->Required) { ?>
			elm = this.getElements("x" + infix + "_PACKING");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PACKING->caption(), $pharmacy_storemast->PACKING->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PACKING");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PACKING->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->PhysQty->Required) { ?>
			elm = this.getElements("x" + infix + "_PhysQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PhysQty->caption(), $pharmacy_storemast->PhysQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PhysQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PhysQty->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->LedQty->Required) { ?>
			elm = this.getElements("x" + infix + "_LedQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->LedQty->caption(), $pharmacy_storemast->LedQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LedQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->LedQty->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PurValue->caption(), $pharmacy_storemast->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PurValue->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PSGST->caption(), $pharmacy_storemast->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PSGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->PCGST->caption(), $pharmacy_storemast->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PCGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->SaleValue->Required) { ?>
			elm = this.getElements("x" + infix + "_SaleValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SaleValue->caption(), $pharmacy_storemast->SaleValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SaleValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SaleValue->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SSGST->caption(), $pharmacy_storemast->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SSGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SCGST->caption(), $pharmacy_storemast->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SCGST->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->SaleRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SaleRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->SaleRate->caption(), $pharmacy_storemast->SaleRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SaleRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SaleRate->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->HospID->caption(), $pharmacy_storemast->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->BRNAME->caption(), $pharmacy_storemast->BRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->OV->Required) { ?>
			elm = this.getElements("x" + infix + "_OV");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->OV->caption(), $pharmacy_storemast->OV->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OV");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->OV->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->LATESTOV->Required) { ?>
			elm = this.getElements("x" + infix + "_LATESTOV");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->LATESTOV->caption(), $pharmacy_storemast->LATESTOV->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LATESTOV");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->LATESTOV->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->ITEMTYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_ITEMTYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->ITEMTYPE->caption(), $pharmacy_storemast->ITEMTYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->ROWID->Required) { ?>
			elm = this.getElements("x" + infix + "_ROWID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->ROWID->caption(), $pharmacy_storemast->ROWID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->MOVED->Required) { ?>
			elm = this.getElements("x" + infix + "_MOVED");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->MOVED->caption(), $pharmacy_storemast->MOVED->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MOVED");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->MOVED->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->NEWTAX->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWTAX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->NEWTAX->caption(), $pharmacy_storemast->NEWTAX->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWTAX");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->NEWTAX->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->HSNCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_HSNCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->HSNCODE->caption(), $pharmacy_storemast->HSNCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->OLDTAX->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDTAX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->OLDTAX->caption(), $pharmacy_storemast->OLDTAX->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDTAX");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->OLDTAX->errorMessage()) ?>");
		<?php if ($pharmacy_storemast_addopt->Scheduling->Required) { ?>
			elm = this.getElements("x" + infix + "_Scheduling");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->Scheduling->caption(), $pharmacy_storemast->Scheduling->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_storemast_addopt->Schedulingh1->Required) { ?>
			elm = this.getElements("x" + infix + "_Schedulingh1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast->Schedulingh1->caption(), $pharmacy_storemast->Schedulingh1->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpharmacy_storemastaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_storemastaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_storemastaddopt.lists["x_TYPE"] = <?php echo $pharmacy_storemast_addopt->TYPE->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_TYPE"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->TYPE->options(FALSE, TRUE)) ?>;
fpharmacy_storemastaddopt.lists["x_LASTSUPP"] = <?php echo $pharmacy_storemast_addopt->LASTSUPP->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_LASTSUPP"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->LASTSUPP->lookupOptions()) ?>;
fpharmacy_storemastaddopt.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_addopt->GENNAME->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->GENNAME->lookupOptions()) ?>;
fpharmacy_storemastaddopt.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_storemastaddopt.lists["x_DRID"] = <?php echo $pharmacy_storemast_addopt->DRID->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_DRID"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->DRID->lookupOptions()) ?>;
fpharmacy_storemastaddopt.lists["x_MFRCODE"] = <?php echo $pharmacy_storemast_addopt->MFRCODE->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_MFRCODE"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->MFRCODE->lookupOptions()) ?>;
fpharmacy_storemastaddopt.lists["x_COMBCODE"] = <?php echo $pharmacy_storemast_addopt->COMBCODE->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->COMBCODE->lookupOptions()) ?>;
fpharmacy_storemastaddopt.lists["x_GENCODE"] = <?php echo $pharmacy_storemast_addopt->GENCODE->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->GENCODE->lookupOptions()) ?>;
fpharmacy_storemastaddopt.lists["x_UNIT"] = <?php echo $pharmacy_storemast_addopt->UNIT->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_UNIT"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->UNIT->options(FALSE, TRUE)) ?>;
fpharmacy_storemastaddopt.lists["x_FORMULARY"] = <?php echo $pharmacy_storemast_addopt->FORMULARY->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_FORMULARY"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->FORMULARY->options(FALSE, TRUE)) ?>;
fpharmacy_storemastaddopt.lists["x_SUPPNAME"] = <?php echo $pharmacy_storemast_addopt->SUPPNAME->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_SUPPNAME"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->SUPPNAME->lookupOptions()) ?>;
fpharmacy_storemastaddopt.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_addopt->COMBNAME->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->COMBNAME->lookupOptions()) ?>;
fpharmacy_storemastaddopt.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_addopt->GENERICNAME->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->GENERICNAME->lookupOptions()) ?>;
fpharmacy_storemastaddopt.lists["x_Scheduling"] = <?php echo $pharmacy_storemast_addopt->Scheduling->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_Scheduling"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->Scheduling->options(FALSE, TRUE)) ?>;
fpharmacy_storemastaddopt.lists["x_Schedulingh1"] = <?php echo $pharmacy_storemast_addopt->Schedulingh1->Lookup->toClientList() ?>;
fpharmacy_storemastaddopt.lists["x_Schedulingh1"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->Schedulingh1->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_storemast_addopt->showPageHeader(); ?>
<?php
$pharmacy_storemast_addopt->showMessage();
?>
<form name="fpharmacy_storemastaddopt" id="fpharmacy_storemastaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($pharmacy_storemast_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_storemast_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $pharmacy_storemast_addopt->TableVar ?>">
<?php if ($pharmacy_storemast->BRCODE->Visible) { // BRCODE ?>
	<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($pharmacy_storemast->BRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->PRC->Visible) { // PRC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PRC"><?php echo $pharmacy_storemast->PRC->caption() ?><?php echo ($pharmacy_storemast->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PRC->EditValue ?>"<?php echo $pharmacy_storemast->PRC->editAttributes() ?>>
<?php echo $pharmacy_storemast->PRC->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TYPE->Visible) { // TYPE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TYPE"><?php echo $pharmacy_storemast->TYPE->caption() ?><?php echo ($pharmacy_storemast->TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_TYPE" data-value-separator="<?php echo $pharmacy_storemast->TYPE->displayValueSeparatorAttribute() ?>" id="x_TYPE" name="x_TYPE"<?php echo $pharmacy_storemast->TYPE->editAttributes() ?>>
		<?php echo $pharmacy_storemast->TYPE->selectOptionListHtml("x_TYPE") ?>
	</select>
</div>
<?php echo $pharmacy_storemast->TYPE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->DES->Visible) { // DES ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_DES"><?php echo $pharmacy_storemast->DES->caption() ?><?php echo ($pharmacy_storemast->DES->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->DES->EditValue ?>"<?php echo $pharmacy_storemast->DES->editAttributes() ?>>
<?php echo $pharmacy_storemast->DES->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->UM->Visible) { // UM ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_UM"><?php echo $pharmacy_storemast->UM->caption() ?><?php echo ($pharmacy_storemast->UM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->UM->EditValue ?>"<?php echo $pharmacy_storemast->UM->editAttributes() ?>>
<?php echo $pharmacy_storemast->UM->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RT->Visible) { // RT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RT"><?php echo $pharmacy_storemast->RT->caption() ?><?php echo ($pharmacy_storemast->RT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RT->EditValue ?>"<?php echo $pharmacy_storemast->RT->editAttributes() ?>>
<?php echo $pharmacy_storemast->RT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->UR->Visible) { // UR ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_UR"><?php echo $pharmacy_storemast->UR->caption() ?><?php echo ($pharmacy_storemast->UR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->UR->EditValue ?>"<?php echo $pharmacy_storemast->UR->editAttributes() ?>>
<?php echo $pharmacy_storemast->UR->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TAXP->Visible) { // TAXP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TAXP"><?php echo $pharmacy_storemast->TAXP->caption() ?><?php echo ($pharmacy_storemast->TAXP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TAXP->EditValue ?>"<?php echo $pharmacy_storemast->TAXP->editAttributes() ?>>
<?php echo $pharmacy_storemast->TAXP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->BATCHNO->Visible) { // BATCHNO ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BATCHNO"><?php echo $pharmacy_storemast->BATCHNO->caption() ?><?php echo ($pharmacy_storemast->BATCHNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($pharmacy_storemast->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->BATCHNO->EditValue ?>"<?php echo $pharmacy_storemast->BATCHNO->editAttributes() ?>>
<?php echo $pharmacy_storemast->BATCHNO->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->OQ->Visible) { // OQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OQ"><?php echo $pharmacy_storemast->OQ->caption() ?><?php echo ($pharmacy_storemast->OQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->OQ->EditValue ?>"<?php echo $pharmacy_storemast->OQ->editAttributes() ?>>
<?php echo $pharmacy_storemast->OQ->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RQ->Visible) { // RQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RQ"><?php echo $pharmacy_storemast->RQ->caption() ?><?php echo ($pharmacy_storemast->RQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RQ->EditValue ?>"<?php echo $pharmacy_storemast->RQ->editAttributes() ?>>
<?php echo $pharmacy_storemast->RQ->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->MRQ->Visible) { // MRQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MRQ"><?php echo $pharmacy_storemast->MRQ->caption() ?><?php echo ($pharmacy_storemast->MRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->MRQ->EditValue ?>"<?php echo $pharmacy_storemast->MRQ->editAttributes() ?>>
<?php echo $pharmacy_storemast->MRQ->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->IQ->Visible) { // IQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_IQ"><?php echo $pharmacy_storemast->IQ->caption() ?><?php echo ($pharmacy_storemast->IQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->IQ->EditValue ?>"<?php echo $pharmacy_storemast->IQ->editAttributes() ?>>
<?php echo $pharmacy_storemast->IQ->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->MRP->Visible) { // MRP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MRP"><?php echo $pharmacy_storemast->MRP->caption() ?><?php echo ($pharmacy_storemast->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->MRP->EditValue ?>"<?php echo $pharmacy_storemast->MRP->editAttributes() ?>>
<?php echo $pharmacy_storemast->MRP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->EXPDT->Visible) { // EXPDT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_EXPDT"><?php echo $pharmacy_storemast->EXPDT->caption() ?><?php echo ($pharmacy_storemast->EXPDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->EXPDT->EditValue ?>"<?php echo $pharmacy_storemast->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->EXPDT->ReadOnly && !$pharmacy_storemast->EXPDT->Disabled && !isset($pharmacy_storemast->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastaddopt", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php echo $pharmacy_storemast->EXPDT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SALQTY->Visible) { // SALQTY ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SALQTY"><?php echo $pharmacy_storemast->SALQTY->caption() ?><?php echo ($pharmacy_storemast->SALQTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_SALQTY" name="x_SALQTY" id="x_SALQTY" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SALQTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SALQTY->EditValue ?>"<?php echo $pharmacy_storemast->SALQTY->editAttributes() ?>>
<?php echo $pharmacy_storemast->SALQTY->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LASTPURDT->Visible) { // LASTPURDT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LASTPURDT"><?php echo $pharmacy_storemast->LASTPURDT->caption() ?><?php echo ($pharmacy_storemast->LASTPURDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->LASTPURDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->LASTPURDT->EditValue ?>"<?php echo $pharmacy_storemast->LASTPURDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->LASTPURDT->ReadOnly && !$pharmacy_storemast->LASTPURDT->Disabled && !isset($pharmacy_storemast->LASTPURDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastaddopt", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php echo $pharmacy_storemast->LASTPURDT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LASTSUPP->Visible) { // LASTSUPP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LASTSUPP"><?php echo $pharmacy_storemast->LASTSUPP->caption() ?><?php echo ($pharmacy_storemast->LASTSUPP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_LASTSUPP"><?php echo strval($pharmacy_storemast->LASTSUPP->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->LASTSUPP->ViewValue) : $pharmacy_storemast->LASTSUPP->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->LASTSUPP->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->LASTSUPP->ReadOnly || $pharmacy_storemast->LASTSUPP->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_LASTSUPP',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->LASTSUPP->Lookup->getParamTag("p_x_LASTSUPP") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_LASTSUPP" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->LASTSUPP->displayValueSeparatorAttribute() ?>" name="x_LASTSUPP" id="x_LASTSUPP" value="<?php echo $pharmacy_storemast->LASTSUPP->CurrentValue ?>"<?php echo $pharmacy_storemast->LASTSUPP->editAttributes() ?>>
<?php echo $pharmacy_storemast->LASTSUPP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENNAME->Visible) { // GENNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $pharmacy_storemast->GENNAME->caption() ?><?php echo ($pharmacy_storemast->GENNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php
$wrkonchange = "" . trim(@$pharmacy_storemast->GENNAME->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_storemast->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x_GENNAME" class="text-nowrap" style="z-index: 8810">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x_GENNAME" id="sv_x_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENNAME->ReadOnly || $pharmacy_storemast->GENNAME->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_storemastaddopt.createAutoSuggest({"id":"x_GENNAME","forceSelect":false});
</script>
<?php echo $pharmacy_storemast->GENNAME->Lookup->getParamTag("p_x_GENNAME") ?>
<?php echo $pharmacy_storemast->GENNAME->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LASTISSDT->Visible) { // LASTISSDT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LASTISSDT"><?php echo $pharmacy_storemast->LASTISSDT->caption() ?><?php echo ($pharmacy_storemast->LASTISSDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->LASTISSDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->LASTISSDT->EditValue ?>"<?php echo $pharmacy_storemast->LASTISSDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->LASTISSDT->ReadOnly && !$pharmacy_storemast->LASTISSDT->Disabled && !isset($pharmacy_storemast->LASTISSDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastaddopt", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php echo $pharmacy_storemast->LASTISSDT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
	<input type="hidden" data-table="pharmacy_storemast" data-field="x_CREATEDDT" name="x_CREATEDDT" id="x_CREATEDDT" value="<?php echo HtmlEncode($pharmacy_storemast->CREATEDDT->CurrentValue) ?>">
	<?php if (!$pharmacy_storemast->CREATEDDT->ReadOnly && !$pharmacy_storemast->CREATEDDT->Disabled && !isset($pharmacy_storemast->CREATEDDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->CREATEDDT->EditAttrs["disabled"])) { ?>
	<script>
	ew.createDateTimePicker("fpharmacy_storemastaddopt", "x_CREATEDDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
	</script>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast->OPPRC->Visible) { // OPPRC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OPPRC"><?php echo $pharmacy_storemast->OPPRC->caption() ?><?php echo ($pharmacy_storemast->OPPRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OPPRC" name="x_OPPRC" id="x_OPPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast->OPPRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->OPPRC->EditValue ?>"<?php echo $pharmacy_storemast->OPPRC->editAttributes() ?>>
<?php echo $pharmacy_storemast->OPPRC->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RESTRICT->Visible) { // RESTRICT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RESTRICT"><?php echo $pharmacy_storemast->RESTRICT->caption() ?><?php echo ($pharmacy_storemast->RESTRICT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_RESTRICT" name="x_RESTRICT" id="x_RESTRICT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RESTRICT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RESTRICT->EditValue ?>"<?php echo $pharmacy_storemast->RESTRICT->editAttributes() ?>>
<?php echo $pharmacy_storemast->RESTRICT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->BAWAPRC->Visible) { // BAWAPRC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BAWAPRC"><?php echo $pharmacy_storemast->BAWAPRC->caption() ?><?php echo ($pharmacy_storemast->BAWAPRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_BAWAPRC" name="x_BAWAPRC" id="x_BAWAPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast->BAWAPRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->BAWAPRC->EditValue ?>"<?php echo $pharmacy_storemast->BAWAPRC->editAttributes() ?>>
<?php echo $pharmacy_storemast->BAWAPRC->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->STAXPER->Visible) { // STAXPER ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STAXPER"><?php echo $pharmacy_storemast->STAXPER->caption() ?><?php echo ($pharmacy_storemast->STAXPER->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_STAXPER" name="x_STAXPER" id="x_STAXPER" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STAXPER->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STAXPER->EditValue ?>"<?php echo $pharmacy_storemast->STAXPER->editAttributes() ?>>
<?php echo $pharmacy_storemast->STAXPER->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TAXTYPE->Visible) { // TAXTYPE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TAXTYPE"><?php echo $pharmacy_storemast->TAXTYPE->caption() ?><?php echo ($pharmacy_storemast->TAXTYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXTYPE" name="x_TAXTYPE" id="x_TAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TAXTYPE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TAXTYPE->EditValue ?>"<?php echo $pharmacy_storemast->TAXTYPE->editAttributes() ?>>
<?php echo $pharmacy_storemast->TAXTYPE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->OLDTAXP->Visible) { // OLDTAXP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OLDTAXP"><?php echo $pharmacy_storemast->OLDTAXP->caption() ?><?php echo ($pharmacy_storemast->OLDTAXP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OLDTAXP" name="x_OLDTAXP" id="x_OLDTAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->OLDTAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->OLDTAXP->EditValue ?>"<?php echo $pharmacy_storemast->OLDTAXP->editAttributes() ?>>
<?php echo $pharmacy_storemast->OLDTAXP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TAXUPD->Visible) { // TAXUPD ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TAXUPD"><?php echo $pharmacy_storemast->TAXUPD->caption() ?><?php echo ($pharmacy_storemast->TAXUPD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXUPD" name="x_TAXUPD" id="x_TAXUPD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TAXUPD->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TAXUPD->EditValue ?>"<?php echo $pharmacy_storemast->TAXUPD->editAttributes() ?>>
<?php echo $pharmacy_storemast->TAXUPD->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PACKAGE->Visible) { // PACKAGE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PACKAGE"><?php echo $pharmacy_storemast->PACKAGE->caption() ?><?php echo ($pharmacy_storemast->PACKAGE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PACKAGE" name="x_PACKAGE" id="x_PACKAGE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PACKAGE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PACKAGE->EditValue ?>"<?php echo $pharmacy_storemast->PACKAGE->editAttributes() ?>>
<?php echo $pharmacy_storemast->PACKAGE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->NEWRT->Visible) { // NEWRT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWRT"><?php echo $pharmacy_storemast->NEWRT->caption() ?><?php echo ($pharmacy_storemast->NEWRT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWRT" name="x_NEWRT" id="x_NEWRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->NEWRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->NEWRT->EditValue ?>"<?php echo $pharmacy_storemast->NEWRT->editAttributes() ?>>
<?php echo $pharmacy_storemast->NEWRT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->NEWMRP->Visible) { // NEWMRP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWMRP"><?php echo $pharmacy_storemast->NEWMRP->caption() ?><?php echo ($pharmacy_storemast->NEWMRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWMRP" name="x_NEWMRP" id="x_NEWMRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->NEWMRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->NEWMRP->EditValue ?>"<?php echo $pharmacy_storemast->NEWMRP->editAttributes() ?>>
<?php echo $pharmacy_storemast->NEWMRP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->NEWUR->Visible) { // NEWUR ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWUR"><?php echo $pharmacy_storemast->NEWUR->caption() ?><?php echo ($pharmacy_storemast->NEWUR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWUR" name="x_NEWUR" id="x_NEWUR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->NEWUR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->NEWUR->EditValue ?>"<?php echo $pharmacy_storemast->NEWUR->editAttributes() ?>>
<?php echo $pharmacy_storemast->NEWUR->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->STATUS->Visible) { // STATUS ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STATUS"><?php echo $pharmacy_storemast->STATUS->caption() ?><?php echo ($pharmacy_storemast->STATUS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_STATUS" name="x_STATUS" id="x_STATUS" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STATUS->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STATUS->EditValue ?>"<?php echo $pharmacy_storemast->STATUS->editAttributes() ?>>
<?php echo $pharmacy_storemast->STATUS->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RETNQTY->Visible) { // RETNQTY ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RETNQTY"><?php echo $pharmacy_storemast->RETNQTY->caption() ?><?php echo ($pharmacy_storemast->RETNQTY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_RETNQTY" name="x_RETNQTY" id="x_RETNQTY" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RETNQTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RETNQTY->EditValue ?>"<?php echo $pharmacy_storemast->RETNQTY->editAttributes() ?>>
<?php echo $pharmacy_storemast->RETNQTY->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->KEMODISC->Visible) { // KEMODISC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_KEMODISC"><?php echo $pharmacy_storemast->KEMODISC->caption() ?><?php echo ($pharmacy_storemast->KEMODISC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_KEMODISC" name="x_KEMODISC" id="x_KEMODISC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast->KEMODISC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->KEMODISC->EditValue ?>"<?php echo $pharmacy_storemast->KEMODISC->editAttributes() ?>>
<?php echo $pharmacy_storemast->KEMODISC->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PATSALE->Visible) { // PATSALE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PATSALE"><?php echo $pharmacy_storemast->PATSALE->caption() ?><?php echo ($pharmacy_storemast->PATSALE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PATSALE" name="x_PATSALE" id="x_PATSALE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PATSALE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PATSALE->EditValue ?>"<?php echo $pharmacy_storemast->PATSALE->editAttributes() ?>>
<?php echo $pharmacy_storemast->PATSALE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->ORGAN->Visible) { // ORGAN ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ORGAN"><?php echo $pharmacy_storemast->ORGAN->caption() ?><?php echo ($pharmacy_storemast->ORGAN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_ORGAN" name="x_ORGAN" id="x_ORGAN" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast->ORGAN->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->ORGAN->EditValue ?>"<?php echo $pharmacy_storemast->ORGAN->editAttributes() ?>>
<?php echo $pharmacy_storemast->ORGAN->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->OLDRQ->Visible) { // OLDRQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OLDRQ"><?php echo $pharmacy_storemast->OLDRQ->caption() ?><?php echo ($pharmacy_storemast->OLDRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OLDRQ" name="x_OLDRQ" id="x_OLDRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->OLDRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->OLDRQ->EditValue ?>"<?php echo $pharmacy_storemast->OLDRQ->editAttributes() ?>>
<?php echo $pharmacy_storemast->OLDRQ->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->DRID->Visible) { // DRID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_DRID"><?php echo $pharmacy_storemast->DRID->caption() ?><?php echo ($pharmacy_storemast->DRID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DRID"><?php echo strval($pharmacy_storemast->DRID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->DRID->ViewValue) : $pharmacy_storemast->DRID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->DRID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->DRID->ReadOnly || $pharmacy_storemast->DRID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DRID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->DRID->Lookup->getParamTag("p_x_DRID") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->DRID->displayValueSeparatorAttribute() ?>" name="x_DRID" id="x_DRID" value="<?php echo $pharmacy_storemast->DRID->CurrentValue ?>"<?php echo $pharmacy_storemast->DRID->editAttributes() ?>>
<?php echo $pharmacy_storemast->DRID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->MFRCODE->Visible) { // MFRCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MFRCODE"><?php echo $pharmacy_storemast->MFRCODE->caption() ?><?php echo ($pharmacy_storemast->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_MFRCODE"><?php echo strval($pharmacy_storemast->MFRCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->MFRCODE->ViewValue) : $pharmacy_storemast->MFRCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->MFRCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->MFRCODE->ReadOnly || $pharmacy_storemast->MFRCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_MFRCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->MFRCODE->Lookup->getParamTag("p_x_MFRCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->MFRCODE->displayValueSeparatorAttribute() ?>" name="x_MFRCODE" id="x_MFRCODE" value="<?php echo $pharmacy_storemast->MFRCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->MFRCODE->editAttributes() ?>>
<?php echo $pharmacy_storemast->MFRCODE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->COMBCODE->Visible) { // COMBCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_COMBCODE"><?php echo $pharmacy_storemast->COMBCODE->caption() ?><?php echo ($pharmacy_storemast->COMBCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $pharmacy_storemast->COMBCODE->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_storemast->COMBCODE->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?php echo strval($pharmacy_storemast->COMBCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBCODE->ViewValue) : $pharmacy_storemast->COMBCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBCODE->ReadOnly || $pharmacy_storemast->COMBCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBCODE->Lookup->getParamTag("p_x_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?php echo $pharmacy_storemast->COMBCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->COMBCODE->editAttributes() ?>>
<?php echo $pharmacy_storemast->COMBCODE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENCODE->Visible) { // GENCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_GENCODE"><?php echo $pharmacy_storemast->GENCODE->caption() ?><?php echo ($pharmacy_storemast->GENCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $pharmacy_storemast->GENCODE->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_storemast->GENCODE->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?php echo strval($pharmacy_storemast->GENCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENCODE->ViewValue) : $pharmacy_storemast->GENCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENCODE->ReadOnly || $pharmacy_storemast->GENCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENCODE->Lookup->getParamTag("p_x_GENCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?php echo $pharmacy_storemast->GENCODE->CurrentValue ?>"<?php echo $pharmacy_storemast->GENCODE->editAttributes() ?>>
<?php echo $pharmacy_storemast->GENCODE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->STRENGTH->Visible) { // STRENGTH ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STRENGTH"><?php echo $pharmacy_storemast->STRENGTH->caption() ?><?php echo ($pharmacy_storemast->STRENGTH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STRENGTH->EditValue ?>"<?php echo $pharmacy_storemast->STRENGTH->editAttributes() ?>>
<?php echo $pharmacy_storemast->STRENGTH->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->UNIT->Visible) { // UNIT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_UNIT"><?php echo $pharmacy_storemast->UNIT->caption() ?><?php echo ($pharmacy_storemast->UNIT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_UNIT" data-value-separator="<?php echo $pharmacy_storemast->UNIT->displayValueSeparatorAttribute() ?>" id="x_UNIT" name="x_UNIT"<?php echo $pharmacy_storemast->UNIT->editAttributes() ?>>
		<?php echo $pharmacy_storemast->UNIT->selectOptionListHtml("x_UNIT") ?>
	</select>
</div>
<?php echo $pharmacy_storemast->UNIT->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->FORMULARY->Visible) { // FORMULARY ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_FORMULARY"><?php echo $pharmacy_storemast->FORMULARY->caption() ?><?php echo ($pharmacy_storemast->FORMULARY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-value-separator="<?php echo $pharmacy_storemast->FORMULARY->displayValueSeparatorAttribute() ?>" id="x_FORMULARY" name="x_FORMULARY"<?php echo $pharmacy_storemast->FORMULARY->editAttributes() ?>>
		<?php echo $pharmacy_storemast->FORMULARY->selectOptionListHtml("x_FORMULARY") ?>
	</select>
</div>
<?php echo $pharmacy_storemast->FORMULARY->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->STOCK->Visible) { // STOCK ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STOCK"><?php echo $pharmacy_storemast->STOCK->caption() ?><?php echo ($pharmacy_storemast->STOCK->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_STOCK" name="x_STOCK" id="x_STOCK" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STOCK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STOCK->EditValue ?>"<?php echo $pharmacy_storemast->STOCK->editAttributes() ?>>
<?php echo $pharmacy_storemast->STOCK->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RACKNO->Visible) { // RACKNO ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RACKNO"><?php echo $pharmacy_storemast->RACKNO->caption() ?><?php echo ($pharmacy_storemast->RACKNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RACKNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RACKNO->EditValue ?>"<?php echo $pharmacy_storemast->RACKNO->editAttributes() ?>>
<?php echo $pharmacy_storemast->RACKNO->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SUPPNAME->Visible) { // SUPPNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SUPPNAME"><?php echo $pharmacy_storemast->SUPPNAME->caption() ?><?php echo ($pharmacy_storemast->SUPPNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SUPPNAME"><?php echo strval($pharmacy_storemast->SUPPNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->SUPPNAME->ViewValue) : $pharmacy_storemast->SUPPNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->SUPPNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->SUPPNAME->ReadOnly || $pharmacy_storemast->SUPPNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_SUPPNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->SUPPNAME->Lookup->getParamTag("p_x_SUPPNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SUPPNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->SUPPNAME->displayValueSeparatorAttribute() ?>" name="x_SUPPNAME" id="x_SUPPNAME" value="<?php echo $pharmacy_storemast->SUPPNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->SUPPNAME->editAttributes() ?>>
<?php echo $pharmacy_storemast->SUPPNAME->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->COMBNAME->Visible) { // COMBNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_COMBNAME"><?php echo $pharmacy_storemast->COMBNAME->caption() ?><?php echo ($pharmacy_storemast->COMBNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?php echo strval($pharmacy_storemast->COMBNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBNAME->ViewValue) : $pharmacy_storemast->COMBNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBNAME->ReadOnly || $pharmacy_storemast->COMBNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBNAME->Lookup->getParamTag("p_x_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?php echo $pharmacy_storemast->COMBNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->COMBNAME->editAttributes() ?>>
<?php echo $pharmacy_storemast->COMBNAME->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_GENERICNAME"><?php echo $pharmacy_storemast->GENERICNAME->caption() ?><?php echo ($pharmacy_storemast->GENERICNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?php echo strval($pharmacy_storemast->GENERICNAME->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENERICNAME->ViewValue) : $pharmacy_storemast->GENERICNAME->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENERICNAME->ReadOnly || $pharmacy_storemast->GENERICNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENERICNAME->Lookup->getParamTag("p_x_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?php echo $pharmacy_storemast->GENERICNAME->CurrentValue ?>"<?php echo $pharmacy_storemast->GENERICNAME->editAttributes() ?>>
<?php echo $pharmacy_storemast->GENERICNAME->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->REMARK->Visible) { // REMARK ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_REMARK"><?php echo $pharmacy_storemast->REMARK->caption() ?><?php echo ($pharmacy_storemast->REMARK->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast->REMARK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->REMARK->EditValue ?>"<?php echo $pharmacy_storemast->REMARK->editAttributes() ?>>
<?php echo $pharmacy_storemast->REMARK->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TEMP->Visible) { // TEMP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TEMP"><?php echo $pharmacy_storemast->TEMP->caption() ?><?php echo ($pharmacy_storemast->TEMP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TEMP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TEMP->EditValue ?>"<?php echo $pharmacy_storemast->TEMP->editAttributes() ?>>
<?php echo $pharmacy_storemast->TEMP->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PACKING->Visible) { // PACKING ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PACKING"><?php echo $pharmacy_storemast->PACKING->caption() ?><?php echo ($pharmacy_storemast->PACKING->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PACKING" name="x_PACKING" id="x_PACKING" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PACKING->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PACKING->EditValue ?>"<?php echo $pharmacy_storemast->PACKING->editAttributes() ?>>
<?php echo $pharmacy_storemast->PACKING->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PhysQty->Visible) { // PhysQty ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PhysQty"><?php echo $pharmacy_storemast->PhysQty->caption() ?><?php echo ($pharmacy_storemast->PhysQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PhysQty" name="x_PhysQty" id="x_PhysQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PhysQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PhysQty->EditValue ?>"<?php echo $pharmacy_storemast->PhysQty->editAttributes() ?>>
<?php echo $pharmacy_storemast->PhysQty->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LedQty->Visible) { // LedQty ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LedQty"><?php echo $pharmacy_storemast->LedQty->caption() ?><?php echo ($pharmacy_storemast->LedQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_LedQty" name="x_LedQty" id="x_LedQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->LedQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->LedQty->EditValue ?>"<?php echo $pharmacy_storemast->LedQty->editAttributes() ?>>
<?php echo $pharmacy_storemast->LedQty->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PurValue->Visible) { // PurValue ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PurValue"><?php echo $pharmacy_storemast->PurValue->caption() ?><?php echo ($pharmacy_storemast->PurValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PurValue->EditValue ?>"<?php echo $pharmacy_storemast->PurValue->editAttributes() ?>>
<?php echo $pharmacy_storemast->PurValue->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PSGST->Visible) { // PSGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PSGST"><?php echo $pharmacy_storemast->PSGST->caption() ?><?php echo ($pharmacy_storemast->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PSGST->EditValue ?>"<?php echo $pharmacy_storemast->PSGST->editAttributes() ?>>
<?php echo $pharmacy_storemast->PSGST->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PCGST->Visible) { // PCGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PCGST"><?php echo $pharmacy_storemast->PCGST->caption() ?><?php echo ($pharmacy_storemast->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PCGST->EditValue ?>"<?php echo $pharmacy_storemast->PCGST->editAttributes() ?>>
<?php echo $pharmacy_storemast->PCGST->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SaleValue->Visible) { // SaleValue ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SaleValue"><?php echo $pharmacy_storemast->SaleValue->caption() ?><?php echo ($pharmacy_storemast->SaleValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleValue->EditValue ?>"<?php echo $pharmacy_storemast->SaleValue->editAttributes() ?>>
<?php echo $pharmacy_storemast->SaleValue->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SSGST->Visible) { // SSGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SSGST"><?php echo $pharmacy_storemast->SSGST->caption() ?><?php echo ($pharmacy_storemast->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SSGST->EditValue ?>"<?php echo $pharmacy_storemast->SSGST->editAttributes() ?>>
<?php echo $pharmacy_storemast->SSGST->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SCGST->Visible) { // SCGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SCGST"><?php echo $pharmacy_storemast->SCGST->caption() ?><?php echo ($pharmacy_storemast->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SCGST->EditValue ?>"<?php echo $pharmacy_storemast->SCGST->editAttributes() ?>>
<?php echo $pharmacy_storemast->SCGST->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SaleRate->Visible) { // SaleRate ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SaleRate"><?php echo $pharmacy_storemast->SaleRate->caption() ?><?php echo ($pharmacy_storemast->SaleRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleRate->EditValue ?>"<?php echo $pharmacy_storemast->SaleRate->editAttributes() ?>>
<?php echo $pharmacy_storemast->SaleRate->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->HospID->Visible) { // HospID ?>
	<input type="hidden" data-table="pharmacy_storemast" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($pharmacy_storemast->HospID->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->BRNAME->Visible) { // BRNAME ?>
	<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" value="<?php echo HtmlEncode($pharmacy_storemast->BRNAME->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast->OV->Visible) { // OV ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OV"><?php echo $pharmacy_storemast->OV->caption() ?><?php echo ($pharmacy_storemast->OV->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OV" name="x_OV" id="x_OV" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->OV->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->OV->EditValue ?>"<?php echo $pharmacy_storemast->OV->editAttributes() ?>>
<?php echo $pharmacy_storemast->OV->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LATESTOV->Visible) { // LATESTOV ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LATESTOV"><?php echo $pharmacy_storemast->LATESTOV->caption() ?><?php echo ($pharmacy_storemast->LATESTOV->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_LATESTOV" name="x_LATESTOV" id="x_LATESTOV" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->LATESTOV->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->LATESTOV->EditValue ?>"<?php echo $pharmacy_storemast->LATESTOV->editAttributes() ?>>
<?php echo $pharmacy_storemast->LATESTOV->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->ITEMTYPE->Visible) { // ITEMTYPE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ITEMTYPE"><?php echo $pharmacy_storemast->ITEMTYPE->caption() ?><?php echo ($pharmacy_storemast->ITEMTYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_ITEMTYPE" name="x_ITEMTYPE" id="x_ITEMTYPE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_storemast->ITEMTYPE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->ITEMTYPE->EditValue ?>"<?php echo $pharmacy_storemast->ITEMTYPE->editAttributes() ?>>
<?php echo $pharmacy_storemast->ITEMTYPE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->ROWID->Visible) { // ROWID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ROWID"><?php echo $pharmacy_storemast->ROWID->caption() ?><?php echo ($pharmacy_storemast->ROWID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_ROWID" name="x_ROWID" id="x_ROWID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_storemast->ROWID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->ROWID->EditValue ?>"<?php echo $pharmacy_storemast->ROWID->editAttributes() ?>>
<?php echo $pharmacy_storemast->ROWID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->MOVED->Visible) { // MOVED ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MOVED"><?php echo $pharmacy_storemast->MOVED->caption() ?><?php echo ($pharmacy_storemast->MOVED->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_MOVED" name="x_MOVED" id="x_MOVED" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->MOVED->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->MOVED->EditValue ?>"<?php echo $pharmacy_storemast->MOVED->editAttributes() ?>>
<?php echo $pharmacy_storemast->MOVED->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->NEWTAX->Visible) { // NEWTAX ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWTAX"><?php echo $pharmacy_storemast->NEWTAX->caption() ?><?php echo ($pharmacy_storemast->NEWTAX->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWTAX" name="x_NEWTAX" id="x_NEWTAX" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->NEWTAX->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->NEWTAX->EditValue ?>"<?php echo $pharmacy_storemast->NEWTAX->editAttributes() ?>>
<?php echo $pharmacy_storemast->NEWTAX->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->HSNCODE->Visible) { // HSNCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_HSNCODE"><?php echo $pharmacy_storemast->HSNCODE->caption() ?><?php echo ($pharmacy_storemast->HSNCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_HSNCODE" name="x_HSNCODE" id="x_HSNCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_storemast->HSNCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->HSNCODE->EditValue ?>"<?php echo $pharmacy_storemast->HSNCODE->editAttributes() ?>>
<?php echo $pharmacy_storemast->HSNCODE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->OLDTAX->Visible) { // OLDTAX ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OLDTAX"><?php echo $pharmacy_storemast->OLDTAX->caption() ?><?php echo ($pharmacy_storemast->OLDTAX->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OLDTAX" name="x_OLDTAX" id="x_OLDTAX" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->OLDTAX->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->OLDTAX->EditValue ?>"<?php echo $pharmacy_storemast->OLDTAX->editAttributes() ?>>
<?php echo $pharmacy_storemast->OLDTAX->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->Scheduling->Visible) { // Scheduling ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $pharmacy_storemast->Scheduling->caption() ?><?php echo ($pharmacy_storemast->Scheduling->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="tp_x_Scheduling" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Scheduling" data-value-separator="<?php echo $pharmacy_storemast->Scheduling->displayValueSeparatorAttribute() ?>" name="x_Scheduling" id="x_Scheduling" value="{value}"<?php echo $pharmacy_storemast->Scheduling->editAttributes() ?>></div>
<div id="dsl_x_Scheduling" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Scheduling->radioButtonListHtml(FALSE, "x_Scheduling") ?>
</div></div>
<?php echo $pharmacy_storemast->Scheduling->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->Schedulingh1->Visible) { // Schedulingh1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $pharmacy_storemast->Schedulingh1->caption() ?><?php echo ($pharmacy_storemast->Schedulingh1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="tp_x_Schedulingh1" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Schedulingh1" data-value-separator="<?php echo $pharmacy_storemast->Schedulingh1->displayValueSeparatorAttribute() ?>" name="x_Schedulingh1" id="x_Schedulingh1" value="{value}"<?php echo $pharmacy_storemast->Schedulingh1->editAttributes() ?>></div>
<div id="dsl_x_Schedulingh1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Schedulingh1->radioButtonListHtml(FALSE, "x_Schedulingh1") ?>
</div></div>
<?php echo $pharmacy_storemast->Schedulingh1->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$pharmacy_storemast_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$pharmacy_storemast_addopt->terminate();
?>