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
var fpharmacy_storemastaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fpharmacy_storemastaddopt = currentForm = new ew.Form("fpharmacy_storemastaddopt", "addopt");

	// Validate form
	fpharmacy_storemastaddopt.validate = function() {
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
			<?php if ($pharmacy_storemast_addopt->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->BRCODE->caption(), $pharmacy_storemast_addopt->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->PRC->caption(), $pharmacy_storemast_addopt->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->TYPE->caption(), $pharmacy_storemast_addopt->TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->DES->Required) { ?>
				elm = this.getElements("x" + infix + "_DES");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->DES->caption(), $pharmacy_storemast_addopt->DES->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->UM->Required) { ?>
				elm = this.getElements("x" + infix + "_UM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->UM->caption(), $pharmacy_storemast_addopt->UM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->RT->caption(), $pharmacy_storemast_addopt->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->RT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->UR->caption(), $pharmacy_storemast_addopt->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->UR->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->TAXP->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->TAXP->caption(), $pharmacy_storemast_addopt->TAXP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TAXP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->TAXP->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->BATCHNO->caption(), $pharmacy_storemast_addopt->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->OQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->OQ->caption(), $pharmacy_storemast_addopt->OQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->OQ->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->RQ->Required) { ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->RQ->caption(), $pharmacy_storemast_addopt->RQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->RQ->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->MRQ->caption(), $pharmacy_storemast_addopt->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->MRQ->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->IQ->caption(), $pharmacy_storemast_addopt->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->IQ->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->MRP->caption(), $pharmacy_storemast_addopt->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->MRP->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->EXPDT->caption(), $pharmacy_storemast_addopt->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->EXPDT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->SALQTY->Required) { ?>
				elm = this.getElements("x" + infix + "_SALQTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->SALQTY->caption(), $pharmacy_storemast_addopt->SALQTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SALQTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->SALQTY->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->LASTPURDT->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTPURDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->LASTPURDT->caption(), $pharmacy_storemast_addopt->LASTPURDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LASTPURDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->LASTPURDT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->LASTSUPP->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTSUPP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->LASTSUPP->caption(), $pharmacy_storemast_addopt->LASTSUPP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->GENNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->GENNAME->caption(), $pharmacy_storemast_addopt->GENNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->LASTISSDT->Required) { ?>
				elm = this.getElements("x" + infix + "_LASTISSDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->LASTISSDT->caption(), $pharmacy_storemast_addopt->LASTISSDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LASTISSDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->LASTISSDT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->CREATEDDT->Required) { ?>
				elm = this.getElements("x" + infix + "_CREATEDDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->CREATEDDT->caption(), $pharmacy_storemast_addopt->CREATEDDT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->OPPRC->Required) { ?>
				elm = this.getElements("x" + infix + "_OPPRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->OPPRC->caption(), $pharmacy_storemast_addopt->OPPRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->RESTRICT->Required) { ?>
				elm = this.getElements("x" + infix + "_RESTRICT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->RESTRICT->caption(), $pharmacy_storemast_addopt->RESTRICT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->BAWAPRC->Required) { ?>
				elm = this.getElements("x" + infix + "_BAWAPRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->BAWAPRC->caption(), $pharmacy_storemast_addopt->BAWAPRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->STAXPER->Required) { ?>
				elm = this.getElements("x" + infix + "_STAXPER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->STAXPER->caption(), $pharmacy_storemast_addopt->STAXPER->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STAXPER");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->STAXPER->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->TAXTYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXTYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->TAXTYPE->caption(), $pharmacy_storemast_addopt->TAXTYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->OLDTAXP->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDTAXP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->OLDTAXP->caption(), $pharmacy_storemast_addopt->OLDTAXP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDTAXP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->OLDTAXP->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->TAXUPD->Required) { ?>
				elm = this.getElements("x" + infix + "_TAXUPD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->TAXUPD->caption(), $pharmacy_storemast_addopt->TAXUPD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->PACKAGE->Required) { ?>
				elm = this.getElements("x" + infix + "_PACKAGE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->PACKAGE->caption(), $pharmacy_storemast_addopt->PACKAGE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->NEWRT->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWRT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->NEWRT->caption(), $pharmacy_storemast_addopt->NEWRT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWRT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->NEWRT->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->NEWMRP->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWMRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->NEWMRP->caption(), $pharmacy_storemast_addopt->NEWMRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWMRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->NEWMRP->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->NEWUR->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWUR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->NEWUR->caption(), $pharmacy_storemast_addopt->NEWUR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWUR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->NEWUR->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->STATUS->Required) { ?>
				elm = this.getElements("x" + infix + "_STATUS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->STATUS->caption(), $pharmacy_storemast_addopt->STATUS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->RETNQTY->Required) { ?>
				elm = this.getElements("x" + infix + "_RETNQTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->RETNQTY->caption(), $pharmacy_storemast_addopt->RETNQTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RETNQTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->RETNQTY->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->KEMODISC->Required) { ?>
				elm = this.getElements("x" + infix + "_KEMODISC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->KEMODISC->caption(), $pharmacy_storemast_addopt->KEMODISC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->PATSALE->Required) { ?>
				elm = this.getElements("x" + infix + "_PATSALE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->PATSALE->caption(), $pharmacy_storemast_addopt->PATSALE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PATSALE");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->PATSALE->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->ORGAN->Required) { ?>
				elm = this.getElements("x" + infix + "_ORGAN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->ORGAN->caption(), $pharmacy_storemast_addopt->ORGAN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->OLDRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->OLDRQ->caption(), $pharmacy_storemast_addopt->OLDRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->OLDRQ->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->DRID->Required) { ?>
				elm = this.getElements("x" + infix + "_DRID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->DRID->caption(), $pharmacy_storemast_addopt->DRID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->MFRCODE->caption(), $pharmacy_storemast_addopt->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->COMBCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->COMBCODE->caption(), $pharmacy_storemast_addopt->COMBCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->GENCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_GENCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->GENCODE->caption(), $pharmacy_storemast_addopt->GENCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->STRENGTH->Required) { ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->STRENGTH->caption(), $pharmacy_storemast_addopt->STRENGTH->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->STRENGTH->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->UNIT->Required) { ?>
				elm = this.getElements("x" + infix + "_UNIT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->UNIT->caption(), $pharmacy_storemast_addopt->UNIT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->FORMULARY->Required) { ?>
				elm = this.getElements("x" + infix + "_FORMULARY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->FORMULARY->caption(), $pharmacy_storemast_addopt->FORMULARY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->STOCK->Required) { ?>
				elm = this.getElements("x" + infix + "_STOCK");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->STOCK->caption(), $pharmacy_storemast_addopt->STOCK->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STOCK");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->STOCK->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->RACKNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RACKNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->RACKNO->caption(), $pharmacy_storemast_addopt->RACKNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->SUPPNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_SUPPNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->SUPPNAME->caption(), $pharmacy_storemast_addopt->SUPPNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->COMBNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->COMBNAME->caption(), $pharmacy_storemast_addopt->COMBNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->GENERICNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENERICNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->GENERICNAME->caption(), $pharmacy_storemast_addopt->GENERICNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->REMARK->Required) { ?>
				elm = this.getElements("x" + infix + "_REMARK");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->REMARK->caption(), $pharmacy_storemast_addopt->REMARK->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->TEMP->Required) { ?>
				elm = this.getElements("x" + infix + "_TEMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->TEMP->caption(), $pharmacy_storemast_addopt->TEMP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->PACKING->Required) { ?>
				elm = this.getElements("x" + infix + "_PACKING");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->PACKING->caption(), $pharmacy_storemast_addopt->PACKING->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PACKING");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->PACKING->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->PhysQty->Required) { ?>
				elm = this.getElements("x" + infix + "_PhysQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->PhysQty->caption(), $pharmacy_storemast_addopt->PhysQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PhysQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->PhysQty->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->LedQty->Required) { ?>
				elm = this.getElements("x" + infix + "_LedQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->LedQty->caption(), $pharmacy_storemast_addopt->LedQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LedQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->LedQty->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->PurValue->Required) { ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->PurValue->caption(), $pharmacy_storemast_addopt->PurValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->PurValue->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->PSGST->caption(), $pharmacy_storemast_addopt->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->PSGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->PCGST->caption(), $pharmacy_storemast_addopt->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->PCGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->SaleValue->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->SaleValue->caption(), $pharmacy_storemast_addopt->SaleValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->SaleValue->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->SSGST->caption(), $pharmacy_storemast_addopt->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->SSGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->SCGST->caption(), $pharmacy_storemast_addopt->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->SCGST->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->SaleRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->SaleRate->caption(), $pharmacy_storemast_addopt->SaleRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->SaleRate->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->HospID->caption(), $pharmacy_storemast_addopt->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->BRNAME->caption(), $pharmacy_storemast_addopt->BRNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->OV->Required) { ?>
				elm = this.getElements("x" + infix + "_OV");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->OV->caption(), $pharmacy_storemast_addopt->OV->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OV");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->OV->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->LATESTOV->Required) { ?>
				elm = this.getElements("x" + infix + "_LATESTOV");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->LATESTOV->caption(), $pharmacy_storemast_addopt->LATESTOV->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LATESTOV");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->LATESTOV->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->ITEMTYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_ITEMTYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->ITEMTYPE->caption(), $pharmacy_storemast_addopt->ITEMTYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->ROWID->Required) { ?>
				elm = this.getElements("x" + infix + "_ROWID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->ROWID->caption(), $pharmacy_storemast_addopt->ROWID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->MOVED->Required) { ?>
				elm = this.getElements("x" + infix + "_MOVED");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->MOVED->caption(), $pharmacy_storemast_addopt->MOVED->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MOVED");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->MOVED->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->NEWTAX->Required) { ?>
				elm = this.getElements("x" + infix + "_NEWTAX");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->NEWTAX->caption(), $pharmacy_storemast_addopt->NEWTAX->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NEWTAX");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->NEWTAX->errorMessage()) ?>");
			<?php if ($pharmacy_storemast_addopt->HSNCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_HSNCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->HSNCODE->caption(), $pharmacy_storemast_addopt->HSNCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_storemast_addopt->OLDTAX->Required) { ?>
				elm = this.getElements("x" + infix + "_OLDTAX");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_storemast_addopt->OLDTAX->caption(), $pharmacy_storemast_addopt->OLDTAX->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OLDTAX");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_addopt->OLDTAX->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fpharmacy_storemastaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_storemastaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_storemastaddopt.lists["x_TYPE"] = <?php echo $pharmacy_storemast_addopt->TYPE->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_TYPE"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->TYPE->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastaddopt.lists["x_LASTSUPP"] = <?php echo $pharmacy_storemast_addopt->LASTSUPP->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_LASTSUPP"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->LASTSUPP->lookupOptions()) ?>;
	fpharmacy_storemastaddopt.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_addopt->GENNAME->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->GENNAME->lookupOptions()) ?>;
	fpharmacy_storemastaddopt.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_storemastaddopt.lists["x_DRID"] = <?php echo $pharmacy_storemast_addopt->DRID->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_DRID"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->DRID->lookupOptions()) ?>;
	fpharmacy_storemastaddopt.lists["x_MFRCODE"] = <?php echo $pharmacy_storemast_addopt->MFRCODE->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_MFRCODE"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->MFRCODE->lookupOptions()) ?>;
	fpharmacy_storemastaddopt.lists["x_COMBCODE"] = <?php echo $pharmacy_storemast_addopt->COMBCODE->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->COMBCODE->lookupOptions()) ?>;
	fpharmacy_storemastaddopt.lists["x_GENCODE"] = <?php echo $pharmacy_storemast_addopt->GENCODE->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->GENCODE->lookupOptions()) ?>;
	fpharmacy_storemastaddopt.lists["x_UNIT"] = <?php echo $pharmacy_storemast_addopt->UNIT->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_UNIT"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->UNIT->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastaddopt.lists["x_FORMULARY"] = <?php echo $pharmacy_storemast_addopt->FORMULARY->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_FORMULARY"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->FORMULARY->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastaddopt.lists["x_SUPPNAME"] = <?php echo $pharmacy_storemast_addopt->SUPPNAME->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_SUPPNAME"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->SUPPNAME->lookupOptions()) ?>;
	fpharmacy_storemastaddopt.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_addopt->COMBNAME->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->COMBNAME->lookupOptions()) ?>;
	fpharmacy_storemastaddopt.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_addopt->GENERICNAME->Lookup->toClientList($pharmacy_storemast_addopt) ?>;
	fpharmacy_storemastaddopt.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_addopt->GENERICNAME->lookupOptions()) ?>;
	loadjs.done("fpharmacy_storemastaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_storemast_addopt->showPageHeader(); ?>
<?php
$pharmacy_storemast_addopt->showMessage();
?>
<form name="fpharmacy_storemastaddopt" id="fpharmacy_storemastaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $pharmacy_storemast_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($pharmacy_storemast_addopt->BRCODE->Visible) { // BRCODE ?>
	<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($pharmacy_storemast_addopt->BRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast_addopt->PRC->Visible) { // PRC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PRC"><?php echo $pharmacy_storemast_addopt->PRC->caption() ?><?php echo $pharmacy_storemast_addopt->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->PRC->EditValue ?>"<?php echo $pharmacy_storemast_addopt->PRC->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->TYPE->Visible) { // TYPE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TYPE"><?php echo $pharmacy_storemast_addopt->TYPE->caption() ?><?php echo $pharmacy_storemast_addopt->TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_TYPE" data-value-separator="<?php echo $pharmacy_storemast_addopt->TYPE->displayValueSeparatorAttribute() ?>" id="x_TYPE" name="x_TYPE"<?php echo $pharmacy_storemast_addopt->TYPE->editAttributes() ?>>
			<?php echo $pharmacy_storemast_addopt->TYPE->selectOptionListHtml("x_TYPE") ?>
		</select>
</div>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->DES->Visible) { // DES ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_DES"><?php echo $pharmacy_storemast_addopt->DES->caption() ?><?php echo $pharmacy_storemast_addopt->DES->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->DES->EditValue ?>"<?php echo $pharmacy_storemast_addopt->DES->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->UM->Visible) { // UM ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_UM"><?php echo $pharmacy_storemast_addopt->UM->caption() ?><?php echo $pharmacy_storemast_addopt->UM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->UM->EditValue ?>"<?php echo $pharmacy_storemast_addopt->UM->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->RT->Visible) { // RT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RT"><?php echo $pharmacy_storemast_addopt->RT->caption() ?><?php echo $pharmacy_storemast_addopt->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->RT->EditValue ?>"<?php echo $pharmacy_storemast_addopt->RT->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->UR->Visible) { // UR ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_UR"><?php echo $pharmacy_storemast_addopt->UR->caption() ?><?php echo $pharmacy_storemast_addopt->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->UR->EditValue ?>"<?php echo $pharmacy_storemast_addopt->UR->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->TAXP->Visible) { // TAXP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TAXP"><?php echo $pharmacy_storemast_addopt->TAXP->caption() ?><?php echo $pharmacy_storemast_addopt->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->TAXP->EditValue ?>"<?php echo $pharmacy_storemast_addopt->TAXP->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->BATCHNO->Visible) { // BATCHNO ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BATCHNO"><?php echo $pharmacy_storemast_addopt->BATCHNO->caption() ?><?php echo $pharmacy_storemast_addopt->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->BATCHNO->EditValue ?>"<?php echo $pharmacy_storemast_addopt->BATCHNO->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->OQ->Visible) { // OQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OQ"><?php echo $pharmacy_storemast_addopt->OQ->caption() ?><?php echo $pharmacy_storemast_addopt->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->OQ->EditValue ?>"<?php echo $pharmacy_storemast_addopt->OQ->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->RQ->Visible) { // RQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RQ"><?php echo $pharmacy_storemast_addopt->RQ->caption() ?><?php echo $pharmacy_storemast_addopt->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->RQ->EditValue ?>"<?php echo $pharmacy_storemast_addopt->RQ->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->MRQ->Visible) { // MRQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MRQ"><?php echo $pharmacy_storemast_addopt->MRQ->caption() ?><?php echo $pharmacy_storemast_addopt->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->MRQ->EditValue ?>"<?php echo $pharmacy_storemast_addopt->MRQ->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->IQ->Visible) { // IQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_IQ"><?php echo $pharmacy_storemast_addopt->IQ->caption() ?><?php echo $pharmacy_storemast_addopt->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->IQ->EditValue ?>"<?php echo $pharmacy_storemast_addopt->IQ->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->MRP->Visible) { // MRP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MRP"><?php echo $pharmacy_storemast_addopt->MRP->caption() ?><?php echo $pharmacy_storemast_addopt->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->MRP->EditValue ?>"<?php echo $pharmacy_storemast_addopt->MRP->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->EXPDT->Visible) { // EXPDT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_EXPDT"><?php echo $pharmacy_storemast_addopt->EXPDT->caption() ?><?php echo $pharmacy_storemast_addopt->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->EXPDT->EditValue ?>"<?php echo $pharmacy_storemast_addopt->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_addopt->EXPDT->ReadOnly && !$pharmacy_storemast_addopt->EXPDT->Disabled && !isset($pharmacy_storemast_addopt->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_addopt->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastaddopt", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastaddopt", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->SALQTY->Visible) { // SALQTY ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SALQTY"><?php echo $pharmacy_storemast_addopt->SALQTY->caption() ?><?php echo $pharmacy_storemast_addopt->SALQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_SALQTY" name="x_SALQTY" id="x_SALQTY" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->SALQTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->SALQTY->EditValue ?>"<?php echo $pharmacy_storemast_addopt->SALQTY->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->LASTPURDT->Visible) { // LASTPURDT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LASTPURDT"><?php echo $pharmacy_storemast_addopt->LASTPURDT->caption() ?><?php echo $pharmacy_storemast_addopt->LASTPURDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->LASTPURDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->LASTPURDT->EditValue ?>"<?php echo $pharmacy_storemast_addopt->LASTPURDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_addopt->LASTPURDT->ReadOnly && !$pharmacy_storemast_addopt->LASTPURDT->Disabled && !isset($pharmacy_storemast_addopt->LASTPURDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_addopt->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastaddopt", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastaddopt", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->LASTSUPP->Visible) { // LASTSUPP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LASTSUPP"><?php echo $pharmacy_storemast_addopt->LASTSUPP->caption() ?><?php echo $pharmacy_storemast_addopt->LASTSUPP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_LASTSUPP"><?php echo EmptyValue(strval($pharmacy_storemast_addopt->LASTSUPP->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_addopt->LASTSUPP->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_addopt->LASTSUPP->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_addopt->LASTSUPP->ReadOnly || $pharmacy_storemast_addopt->LASTSUPP->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_LASTSUPP',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_addopt->LASTSUPP->Lookup->getParamTag($pharmacy_storemast_addopt, "p_x_LASTSUPP") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_LASTSUPP" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_addopt->LASTSUPP->displayValueSeparatorAttribute() ?>" name="x_LASTSUPP" id="x_LASTSUPP" value="<?php echo $pharmacy_storemast_addopt->LASTSUPP->CurrentValue ?>"<?php echo $pharmacy_storemast_addopt->LASTSUPP->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->GENNAME->Visible) { // GENNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $pharmacy_storemast_addopt->GENNAME->caption() ?><?php echo $pharmacy_storemast_addopt->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php
$onchange = $pharmacy_storemast_addopt->GENNAME->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_storemast_addopt->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x_GENNAME">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_GENNAME" id="sv_x_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast_addopt->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast_addopt->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_addopt->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_addopt->GENNAME->ReadOnly || $pharmacy_storemast_addopt->GENNAME->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_addopt->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast_addopt->GENNAME->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_storemastaddopt"], function() {
	fpharmacy_storemastaddopt.createAutoSuggest({"id":"x_GENNAME","forceSelect":false});
});
</script>
<?php echo $pharmacy_storemast_addopt->GENNAME->Lookup->getParamTag($pharmacy_storemast_addopt, "p_x_GENNAME") ?>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->LASTISSDT->Visible) { // LASTISSDT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LASTISSDT"><?php echo $pharmacy_storemast_addopt->LASTISSDT->caption() ?><?php echo $pharmacy_storemast_addopt->LASTISSDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->LASTISSDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->LASTISSDT->EditValue ?>"<?php echo $pharmacy_storemast_addopt->LASTISSDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_addopt->LASTISSDT->ReadOnly && !$pharmacy_storemast_addopt->LASTISSDT->Disabled && !isset($pharmacy_storemast_addopt->LASTISSDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_addopt->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastaddopt", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastaddopt", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->CREATEDDT->Visible) { // CREATEDDT ?>
	<input type="hidden" data-table="pharmacy_storemast" data-field="x_CREATEDDT" name="x_CREATEDDT" id="x_CREATEDDT" value="<?php echo HtmlEncode($pharmacy_storemast_addopt->CREATEDDT->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast_addopt->OPPRC->Visible) { // OPPRC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OPPRC"><?php echo $pharmacy_storemast_addopt->OPPRC->caption() ?><?php echo $pharmacy_storemast_addopt->OPPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OPPRC" name="x_OPPRC" id="x_OPPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->OPPRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->OPPRC->EditValue ?>"<?php echo $pharmacy_storemast_addopt->OPPRC->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->RESTRICT->Visible) { // RESTRICT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RESTRICT"><?php echo $pharmacy_storemast_addopt->RESTRICT->caption() ?><?php echo $pharmacy_storemast_addopt->RESTRICT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_RESTRICT" name="x_RESTRICT" id="x_RESTRICT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->RESTRICT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->RESTRICT->EditValue ?>"<?php echo $pharmacy_storemast_addopt->RESTRICT->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->BAWAPRC->Visible) { // BAWAPRC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BAWAPRC"><?php echo $pharmacy_storemast_addopt->BAWAPRC->caption() ?><?php echo $pharmacy_storemast_addopt->BAWAPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_BAWAPRC" name="x_BAWAPRC" id="x_BAWAPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->BAWAPRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->BAWAPRC->EditValue ?>"<?php echo $pharmacy_storemast_addopt->BAWAPRC->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->STAXPER->Visible) { // STAXPER ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STAXPER"><?php echo $pharmacy_storemast_addopt->STAXPER->caption() ?><?php echo $pharmacy_storemast_addopt->STAXPER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_STAXPER" name="x_STAXPER" id="x_STAXPER" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->STAXPER->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->STAXPER->EditValue ?>"<?php echo $pharmacy_storemast_addopt->STAXPER->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->TAXTYPE->Visible) { // TAXTYPE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TAXTYPE"><?php echo $pharmacy_storemast_addopt->TAXTYPE->caption() ?><?php echo $pharmacy_storemast_addopt->TAXTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXTYPE" name="x_TAXTYPE" id="x_TAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->TAXTYPE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->TAXTYPE->EditValue ?>"<?php echo $pharmacy_storemast_addopt->TAXTYPE->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->OLDTAXP->Visible) { // OLDTAXP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OLDTAXP"><?php echo $pharmacy_storemast_addopt->OLDTAXP->caption() ?><?php echo $pharmacy_storemast_addopt->OLDTAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OLDTAXP" name="x_OLDTAXP" id="x_OLDTAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->OLDTAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->OLDTAXP->EditValue ?>"<?php echo $pharmacy_storemast_addopt->OLDTAXP->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->TAXUPD->Visible) { // TAXUPD ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TAXUPD"><?php echo $pharmacy_storemast_addopt->TAXUPD->caption() ?><?php echo $pharmacy_storemast_addopt->TAXUPD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXUPD" name="x_TAXUPD" id="x_TAXUPD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->TAXUPD->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->TAXUPD->EditValue ?>"<?php echo $pharmacy_storemast_addopt->TAXUPD->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->PACKAGE->Visible) { // PACKAGE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PACKAGE"><?php echo $pharmacy_storemast_addopt->PACKAGE->caption() ?><?php echo $pharmacy_storemast_addopt->PACKAGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PACKAGE" name="x_PACKAGE" id="x_PACKAGE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->PACKAGE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->PACKAGE->EditValue ?>"<?php echo $pharmacy_storemast_addopt->PACKAGE->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->NEWRT->Visible) { // NEWRT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWRT"><?php echo $pharmacy_storemast_addopt->NEWRT->caption() ?><?php echo $pharmacy_storemast_addopt->NEWRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWRT" name="x_NEWRT" id="x_NEWRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->NEWRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->NEWRT->EditValue ?>"<?php echo $pharmacy_storemast_addopt->NEWRT->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->NEWMRP->Visible) { // NEWMRP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWMRP"><?php echo $pharmacy_storemast_addopt->NEWMRP->caption() ?><?php echo $pharmacy_storemast_addopt->NEWMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWMRP" name="x_NEWMRP" id="x_NEWMRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->NEWMRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->NEWMRP->EditValue ?>"<?php echo $pharmacy_storemast_addopt->NEWMRP->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->NEWUR->Visible) { // NEWUR ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWUR"><?php echo $pharmacy_storemast_addopt->NEWUR->caption() ?><?php echo $pharmacy_storemast_addopt->NEWUR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWUR" name="x_NEWUR" id="x_NEWUR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->NEWUR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->NEWUR->EditValue ?>"<?php echo $pharmacy_storemast_addopt->NEWUR->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->STATUS->Visible) { // STATUS ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STATUS"><?php echo $pharmacy_storemast_addopt->STATUS->caption() ?><?php echo $pharmacy_storemast_addopt->STATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_STATUS" name="x_STATUS" id="x_STATUS" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->STATUS->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->STATUS->EditValue ?>"<?php echo $pharmacy_storemast_addopt->STATUS->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->RETNQTY->Visible) { // RETNQTY ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RETNQTY"><?php echo $pharmacy_storemast_addopt->RETNQTY->caption() ?><?php echo $pharmacy_storemast_addopt->RETNQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_RETNQTY" name="x_RETNQTY" id="x_RETNQTY" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->RETNQTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->RETNQTY->EditValue ?>"<?php echo $pharmacy_storemast_addopt->RETNQTY->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->KEMODISC->Visible) { // KEMODISC ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_KEMODISC"><?php echo $pharmacy_storemast_addopt->KEMODISC->caption() ?><?php echo $pharmacy_storemast_addopt->KEMODISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_KEMODISC" name="x_KEMODISC" id="x_KEMODISC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->KEMODISC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->KEMODISC->EditValue ?>"<?php echo $pharmacy_storemast_addopt->KEMODISC->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->PATSALE->Visible) { // PATSALE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PATSALE"><?php echo $pharmacy_storemast_addopt->PATSALE->caption() ?><?php echo $pharmacy_storemast_addopt->PATSALE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PATSALE" name="x_PATSALE" id="x_PATSALE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->PATSALE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->PATSALE->EditValue ?>"<?php echo $pharmacy_storemast_addopt->PATSALE->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->ORGAN->Visible) { // ORGAN ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ORGAN"><?php echo $pharmacy_storemast_addopt->ORGAN->caption() ?><?php echo $pharmacy_storemast_addopt->ORGAN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_ORGAN" name="x_ORGAN" id="x_ORGAN" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->ORGAN->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->ORGAN->EditValue ?>"<?php echo $pharmacy_storemast_addopt->ORGAN->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->OLDRQ->Visible) { // OLDRQ ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OLDRQ"><?php echo $pharmacy_storemast_addopt->OLDRQ->caption() ?><?php echo $pharmacy_storemast_addopt->OLDRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OLDRQ" name="x_OLDRQ" id="x_OLDRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->OLDRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->OLDRQ->EditValue ?>"<?php echo $pharmacy_storemast_addopt->OLDRQ->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->DRID->Visible) { // DRID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_DRID"><?php echo $pharmacy_storemast_addopt->DRID->caption() ?><?php echo $pharmacy_storemast_addopt->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DRID"><?php echo EmptyValue(strval($pharmacy_storemast_addopt->DRID->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_addopt->DRID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_addopt->DRID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_addopt->DRID->ReadOnly || $pharmacy_storemast_addopt->DRID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DRID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_addopt->DRID->Lookup->getParamTag($pharmacy_storemast_addopt, "p_x_DRID") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_addopt->DRID->displayValueSeparatorAttribute() ?>" name="x_DRID" id="x_DRID" value="<?php echo $pharmacy_storemast_addopt->DRID->CurrentValue ?>"<?php echo $pharmacy_storemast_addopt->DRID->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->MFRCODE->Visible) { // MFRCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MFRCODE"><?php echo $pharmacy_storemast_addopt->MFRCODE->caption() ?><?php echo $pharmacy_storemast_addopt->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_MFRCODE"><?php echo EmptyValue(strval($pharmacy_storemast_addopt->MFRCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_addopt->MFRCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_addopt->MFRCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_addopt->MFRCODE->ReadOnly || $pharmacy_storemast_addopt->MFRCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_MFRCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_addopt->MFRCODE->Lookup->getParamTag($pharmacy_storemast_addopt, "p_x_MFRCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_addopt->MFRCODE->displayValueSeparatorAttribute() ?>" name="x_MFRCODE" id="x_MFRCODE" value="<?php echo $pharmacy_storemast_addopt->MFRCODE->CurrentValue ?>"<?php echo $pharmacy_storemast_addopt->MFRCODE->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->COMBCODE->Visible) { // COMBCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_COMBCODE"><?php echo $pharmacy_storemast_addopt->COMBCODE->caption() ?><?php echo $pharmacy_storemast_addopt->COMBCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $pharmacy_storemast_addopt->COMBCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?php echo EmptyValue(strval($pharmacy_storemast_addopt->COMBCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_addopt->COMBCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_addopt->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_addopt->COMBCODE->ReadOnly || $pharmacy_storemast_addopt->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_addopt->COMBCODE->Lookup->getParamTag($pharmacy_storemast_addopt, "p_x_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_addopt->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?php echo $pharmacy_storemast_addopt->COMBCODE->CurrentValue ?>"<?php echo $pharmacy_storemast_addopt->COMBCODE->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->GENCODE->Visible) { // GENCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_GENCODE"><?php echo $pharmacy_storemast_addopt->GENCODE->caption() ?><?php echo $pharmacy_storemast_addopt->GENCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $pharmacy_storemast_addopt->GENCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?php echo EmptyValue(strval($pharmacy_storemast_addopt->GENCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_addopt->GENCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_addopt->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_addopt->GENCODE->ReadOnly || $pharmacy_storemast_addopt->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_addopt->GENCODE->Lookup->getParamTag($pharmacy_storemast_addopt, "p_x_GENCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_addopt->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?php echo $pharmacy_storemast_addopt->GENCODE->CurrentValue ?>"<?php echo $pharmacy_storemast_addopt->GENCODE->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->STRENGTH->Visible) { // STRENGTH ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STRENGTH"><?php echo $pharmacy_storemast_addopt->STRENGTH->caption() ?><?php echo $pharmacy_storemast_addopt->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->STRENGTH->EditValue ?>"<?php echo $pharmacy_storemast_addopt->STRENGTH->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->UNIT->Visible) { // UNIT ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_UNIT"><?php echo $pharmacy_storemast_addopt->UNIT->caption() ?><?php echo $pharmacy_storemast_addopt->UNIT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_UNIT" data-value-separator="<?php echo $pharmacy_storemast_addopt->UNIT->displayValueSeparatorAttribute() ?>" id="x_UNIT" name="x_UNIT"<?php echo $pharmacy_storemast_addopt->UNIT->editAttributes() ?>>
			<?php echo $pharmacy_storemast_addopt->UNIT->selectOptionListHtml("x_UNIT") ?>
		</select>
</div>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->FORMULARY->Visible) { // FORMULARY ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_FORMULARY"><?php echo $pharmacy_storemast_addopt->FORMULARY->caption() ?><?php echo $pharmacy_storemast_addopt->FORMULARY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-value-separator="<?php echo $pharmacy_storemast_addopt->FORMULARY->displayValueSeparatorAttribute() ?>" id="x_FORMULARY" name="x_FORMULARY"<?php echo $pharmacy_storemast_addopt->FORMULARY->editAttributes() ?>>
			<?php echo $pharmacy_storemast_addopt->FORMULARY->selectOptionListHtml("x_FORMULARY") ?>
		</select>
</div>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->STOCK->Visible) { // STOCK ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_STOCK"><?php echo $pharmacy_storemast_addopt->STOCK->caption() ?><?php echo $pharmacy_storemast_addopt->STOCK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_STOCK" name="x_STOCK" id="x_STOCK" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->STOCK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->STOCK->EditValue ?>"<?php echo $pharmacy_storemast_addopt->STOCK->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->RACKNO->Visible) { // RACKNO ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_RACKNO"><?php echo $pharmacy_storemast_addopt->RACKNO->caption() ?><?php echo $pharmacy_storemast_addopt->RACKNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->RACKNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->RACKNO->EditValue ?>"<?php echo $pharmacy_storemast_addopt->RACKNO->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->SUPPNAME->Visible) { // SUPPNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SUPPNAME"><?php echo $pharmacy_storemast_addopt->SUPPNAME->caption() ?><?php echo $pharmacy_storemast_addopt->SUPPNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SUPPNAME"><?php echo EmptyValue(strval($pharmacy_storemast_addopt->SUPPNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_addopt->SUPPNAME->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_addopt->SUPPNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_addopt->SUPPNAME->ReadOnly || $pharmacy_storemast_addopt->SUPPNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_SUPPNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_addopt->SUPPNAME->Lookup->getParamTag($pharmacy_storemast_addopt, "p_x_SUPPNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SUPPNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_addopt->SUPPNAME->displayValueSeparatorAttribute() ?>" name="x_SUPPNAME" id="x_SUPPNAME" value="<?php echo $pharmacy_storemast_addopt->SUPPNAME->CurrentValue ?>"<?php echo $pharmacy_storemast_addopt->SUPPNAME->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->COMBNAME->Visible) { // COMBNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_COMBNAME"><?php echo $pharmacy_storemast_addopt->COMBNAME->caption() ?><?php echo $pharmacy_storemast_addopt->COMBNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?php echo EmptyValue(strval($pharmacy_storemast_addopt->COMBNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_addopt->COMBNAME->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_addopt->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_addopt->COMBNAME->ReadOnly || $pharmacy_storemast_addopt->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_addopt->COMBNAME->Lookup->getParamTag($pharmacy_storemast_addopt, "p_x_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_addopt->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?php echo $pharmacy_storemast_addopt->COMBNAME->CurrentValue ?>"<?php echo $pharmacy_storemast_addopt->COMBNAME->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->GENERICNAME->Visible) { // GENERICNAME ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_GENERICNAME"><?php echo $pharmacy_storemast_addopt->GENERICNAME->caption() ?><?php echo $pharmacy_storemast_addopt->GENERICNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?php echo EmptyValue(strval($pharmacy_storemast_addopt->GENERICNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_addopt->GENERICNAME->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_addopt->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_addopt->GENERICNAME->ReadOnly || $pharmacy_storemast_addopt->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_addopt->GENERICNAME->Lookup->getParamTag($pharmacy_storemast_addopt, "p_x_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_addopt->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?php echo $pharmacy_storemast_addopt->GENERICNAME->CurrentValue ?>"<?php echo $pharmacy_storemast_addopt->GENERICNAME->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->REMARK->Visible) { // REMARK ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_REMARK"><?php echo $pharmacy_storemast_addopt->REMARK->caption() ?><?php echo $pharmacy_storemast_addopt->REMARK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->REMARK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->REMARK->EditValue ?>"<?php echo $pharmacy_storemast_addopt->REMARK->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->TEMP->Visible) { // TEMP ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TEMP"><?php echo $pharmacy_storemast_addopt->TEMP->caption() ?><?php echo $pharmacy_storemast_addopt->TEMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->TEMP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->TEMP->EditValue ?>"<?php echo $pharmacy_storemast_addopt->TEMP->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->PACKING->Visible) { // PACKING ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PACKING"><?php echo $pharmacy_storemast_addopt->PACKING->caption() ?><?php echo $pharmacy_storemast_addopt->PACKING->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PACKING" name="x_PACKING" id="x_PACKING" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->PACKING->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->PACKING->EditValue ?>"<?php echo $pharmacy_storemast_addopt->PACKING->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->PhysQty->Visible) { // PhysQty ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PhysQty"><?php echo $pharmacy_storemast_addopt->PhysQty->caption() ?><?php echo $pharmacy_storemast_addopt->PhysQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PhysQty" name="x_PhysQty" id="x_PhysQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->PhysQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->PhysQty->EditValue ?>"<?php echo $pharmacy_storemast_addopt->PhysQty->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->LedQty->Visible) { // LedQty ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LedQty"><?php echo $pharmacy_storemast_addopt->LedQty->caption() ?><?php echo $pharmacy_storemast_addopt->LedQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_LedQty" name="x_LedQty" id="x_LedQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->LedQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->LedQty->EditValue ?>"<?php echo $pharmacy_storemast_addopt->LedQty->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->PurValue->Visible) { // PurValue ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PurValue"><?php echo $pharmacy_storemast_addopt->PurValue->caption() ?><?php echo $pharmacy_storemast_addopt->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->PurValue->EditValue ?>"<?php echo $pharmacy_storemast_addopt->PurValue->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->PSGST->Visible) { // PSGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PSGST"><?php echo $pharmacy_storemast_addopt->PSGST->caption() ?><?php echo $pharmacy_storemast_addopt->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->PSGST->EditValue ?>"<?php echo $pharmacy_storemast_addopt->PSGST->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->PCGST->Visible) { // PCGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PCGST"><?php echo $pharmacy_storemast_addopt->PCGST->caption() ?><?php echo $pharmacy_storemast_addopt->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->PCGST->EditValue ?>"<?php echo $pharmacy_storemast_addopt->PCGST->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->SaleValue->Visible) { // SaleValue ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SaleValue"><?php echo $pharmacy_storemast_addopt->SaleValue->caption() ?><?php echo $pharmacy_storemast_addopt->SaleValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->SaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->SaleValue->EditValue ?>"<?php echo $pharmacy_storemast_addopt->SaleValue->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->SSGST->Visible) { // SSGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SSGST"><?php echo $pharmacy_storemast_addopt->SSGST->caption() ?><?php echo $pharmacy_storemast_addopt->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->SSGST->EditValue ?>"<?php echo $pharmacy_storemast_addopt->SSGST->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->SCGST->Visible) { // SCGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SCGST"><?php echo $pharmacy_storemast_addopt->SCGST->caption() ?><?php echo $pharmacy_storemast_addopt->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->SCGST->EditValue ?>"<?php echo $pharmacy_storemast_addopt->SCGST->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->SaleRate->Visible) { // SaleRate ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SaleRate"><?php echo $pharmacy_storemast_addopt->SaleRate->caption() ?><?php echo $pharmacy_storemast_addopt->SaleRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->SaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->SaleRate->EditValue ?>"<?php echo $pharmacy_storemast_addopt->SaleRate->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->HospID->Visible) { // HospID ?>
	<input type="hidden" data-table="pharmacy_storemast" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($pharmacy_storemast_addopt->HospID->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast_addopt->BRNAME->Visible) { // BRNAME ?>
	<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" value="<?php echo HtmlEncode($pharmacy_storemast_addopt->BRNAME->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_storemast_addopt->OV->Visible) { // OV ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OV"><?php echo $pharmacy_storemast_addopt->OV->caption() ?><?php echo $pharmacy_storemast_addopt->OV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OV" name="x_OV" id="x_OV" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->OV->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->OV->EditValue ?>"<?php echo $pharmacy_storemast_addopt->OV->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->LATESTOV->Visible) { // LATESTOV ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_LATESTOV"><?php echo $pharmacy_storemast_addopt->LATESTOV->caption() ?><?php echo $pharmacy_storemast_addopt->LATESTOV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_LATESTOV" name="x_LATESTOV" id="x_LATESTOV" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->LATESTOV->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->LATESTOV->EditValue ?>"<?php echo $pharmacy_storemast_addopt->LATESTOV->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->ITEMTYPE->Visible) { // ITEMTYPE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ITEMTYPE"><?php echo $pharmacy_storemast_addopt->ITEMTYPE->caption() ?><?php echo $pharmacy_storemast_addopt->ITEMTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_ITEMTYPE" name="x_ITEMTYPE" id="x_ITEMTYPE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->ITEMTYPE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->ITEMTYPE->EditValue ?>"<?php echo $pharmacy_storemast_addopt->ITEMTYPE->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->ROWID->Visible) { // ROWID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ROWID"><?php echo $pharmacy_storemast_addopt->ROWID->caption() ?><?php echo $pharmacy_storemast_addopt->ROWID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_ROWID" name="x_ROWID" id="x_ROWID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->ROWID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->ROWID->EditValue ?>"<?php echo $pharmacy_storemast_addopt->ROWID->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->MOVED->Visible) { // MOVED ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MOVED"><?php echo $pharmacy_storemast_addopt->MOVED->caption() ?><?php echo $pharmacy_storemast_addopt->MOVED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_MOVED" name="x_MOVED" id="x_MOVED" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->MOVED->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->MOVED->EditValue ?>"<?php echo $pharmacy_storemast_addopt->MOVED->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->NEWTAX->Visible) { // NEWTAX ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NEWTAX"><?php echo $pharmacy_storemast_addopt->NEWTAX->caption() ?><?php echo $pharmacy_storemast_addopt->NEWTAX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWTAX" name="x_NEWTAX" id="x_NEWTAX" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->NEWTAX->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->NEWTAX->EditValue ?>"<?php echo $pharmacy_storemast_addopt->NEWTAX->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->HSNCODE->Visible) { // HSNCODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_HSNCODE"><?php echo $pharmacy_storemast_addopt->HSNCODE->caption() ?><?php echo $pharmacy_storemast_addopt->HSNCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_HSNCODE" name="x_HSNCODE" id="x_HSNCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->HSNCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->HSNCODE->EditValue ?>"<?php echo $pharmacy_storemast_addopt->HSNCODE->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_addopt->OLDTAX->Visible) { // OLDTAX ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_OLDTAX"><?php echo $pharmacy_storemast_addopt->OLDTAX->caption() ?><?php echo $pharmacy_storemast_addopt->OLDTAX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pharmacy_storemast" data-field="x_OLDTAX" name="x_OLDTAX" id="x_OLDTAX" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_addopt->OLDTAX->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_addopt->OLDTAX->EditValue ?>"<?php echo $pharmacy_storemast_addopt->OLDTAX->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$pharmacy_storemast_addopt->showPageFooter();
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
<?php
$pharmacy_storemast_addopt->terminate();
?>