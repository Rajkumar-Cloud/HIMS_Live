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
$pharmacy_stock_movement_edit = new pharmacy_stock_movement_edit();

// Run the page
$pharmacy_stock_movement_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_stock_movement_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_stock_movementedit = currentForm = new ew.Form("fpharmacy_stock_movementedit", "edit");

// Validate form
fpharmacy_stock_movementedit.validate = function() {
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
		<?php if ($pharmacy_stock_movement_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->id->caption(), $pharmacy_stock_movement->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->PRC->caption(), $pharmacy_stock_movement->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->PrName->caption(), $pharmacy_stock_movement->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->BATCHNO->caption(), $pharmacy_stock_movement->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->OpeningStk->Required) { ?>
			elm = this.getElements("x" + infix + "_OpeningStk");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->OpeningStk->caption(), $pharmacy_stock_movement->OpeningStk->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OpeningStk");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->OpeningStk->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->PurchaseQty->Required) { ?>
			elm = this.getElements("x" + infix + "_PurchaseQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->PurchaseQty->caption(), $pharmacy_stock_movement->PurchaseQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurchaseQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->PurchaseQty->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->SalesQty->Required) { ?>
			elm = this.getElements("x" + infix + "_SalesQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->SalesQty->caption(), $pharmacy_stock_movement->SalesQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalesQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->SalesQty->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->ClosingStk->Required) { ?>
			elm = this.getElements("x" + infix + "_ClosingStk");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->ClosingStk->caption(), $pharmacy_stock_movement->ClosingStk->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ClosingStk");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->ClosingStk->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->PurchasefreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_PurchasefreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->PurchasefreeQty->caption(), $pharmacy_stock_movement->PurchasefreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurchasefreeQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->PurchasefreeQty->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->TransferingQty->Required) { ?>
			elm = this.getElements("x" + infix + "_TransferingQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->TransferingQty->caption(), $pharmacy_stock_movement->TransferingQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TransferingQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->TransferingQty->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->UnitPurchaseRate->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitPurchaseRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->UnitPurchaseRate->caption(), $pharmacy_stock_movement->UnitPurchaseRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UnitPurchaseRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->UnitPurchaseRate->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->UnitSaleRate->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitSaleRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->UnitSaleRate->caption(), $pharmacy_stock_movement->UnitSaleRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UnitSaleRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->UnitSaleRate->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->CreatedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->CreatedDate->caption(), $pharmacy_stock_movement->CreatedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->CreatedDate->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->OQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->OQ->caption(), $pharmacy_stock_movement->OQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->OQ->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->RQ->Required) { ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->RQ->caption(), $pharmacy_stock_movement->RQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->RQ->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->MRQ->caption(), $pharmacy_stock_movement->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->MRQ->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->IQ->caption(), $pharmacy_stock_movement->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->IQ->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->MRP->caption(), $pharmacy_stock_movement->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->MRP->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->EXPDT->caption(), $pharmacy_stock_movement->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->EXPDT->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->UR->caption(), $pharmacy_stock_movement->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->UR->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->RT->caption(), $pharmacy_stock_movement->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->RT->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->PRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_PRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->PRCODE->caption(), $pharmacy_stock_movement->PRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->BATCH->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->BATCH->caption(), $pharmacy_stock_movement->BATCH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->PC->caption(), $pharmacy_stock_movement->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->OLDRT->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDRT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->OLDRT->caption(), $pharmacy_stock_movement->OLDRT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDRT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->OLDRT->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->TEMPMRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_TEMPMRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->TEMPMRQ->caption(), $pharmacy_stock_movement->TEMPMRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TEMPMRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->TEMPMRQ->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->TAXP->Required) { ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->TAXP->caption(), $pharmacy_stock_movement->TAXP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TAXP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->TAXP->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->OLDRATE->Required) { ?>
			elm = this.getElements("x" + infix + "_OLDRATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->OLDRATE->caption(), $pharmacy_stock_movement->OLDRATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OLDRATE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->OLDRATE->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->NEWRATE->Required) { ?>
			elm = this.getElements("x" + infix + "_NEWRATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->NEWRATE->caption(), $pharmacy_stock_movement->NEWRATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEWRATE");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->NEWRATE->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->OTEMPMRA->Required) { ?>
			elm = this.getElements("x" + infix + "_OTEMPMRA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->OTEMPMRA->caption(), $pharmacy_stock_movement->OTEMPMRA->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OTEMPMRA");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->OTEMPMRA->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->ACTIVESTATUS->Required) { ?>
			elm = this.getElements("x" + infix + "_ACTIVESTATUS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->ACTIVESTATUS->caption(), $pharmacy_stock_movement->ACTIVESTATUS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->PSGST->caption(), $pharmacy_stock_movement->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->PSGST->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->PCGST->caption(), $pharmacy_stock_movement->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->PCGST->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->SSGST->caption(), $pharmacy_stock_movement->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->SSGST->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->SCGST->caption(), $pharmacy_stock_movement->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->SCGST->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->MFRCODE->caption(), $pharmacy_stock_movement->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->BRCODE->caption(), $pharmacy_stock_movement->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->BRCODE->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->FRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_FRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->FRQ->caption(), $pharmacy_stock_movement->FRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->FRQ->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->HospID->caption(), $pharmacy_stock_movement->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->HospID->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->UM->Required) { ?>
			elm = this.getElements("x" + infix + "_UM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->UM->caption(), $pharmacy_stock_movement->UM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->GENNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->GENNAME->caption(), $pharmacy_stock_movement->GENNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_stock_movement_edit->BILLDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->BILLDATE->caption(), $pharmacy_stock_movement->BILLDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BILLDATE");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->BILLDATE->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->CreatedDateTime->caption(), $pharmacy_stock_movement->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->CreatedDateTime->errorMessage()) ?>");
		<?php if ($pharmacy_stock_movement_edit->baid->Required) { ?>
			elm = this.getElements("x" + infix + "_baid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_stock_movement->baid->caption(), $pharmacy_stock_movement->baid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_baid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->baid->errorMessage()) ?>");

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
fpharmacy_stock_movementedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_stock_movementedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_stock_movement_edit->showPageHeader(); ?>
<?php
$pharmacy_stock_movement_edit->showMessage();
?>
<form name="fpharmacy_stock_movementedit" id="fpharmacy_stock_movementedit" class="<?php echo $pharmacy_stock_movement_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_stock_movement_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_stock_movement_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_stock_movement">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_stock_movement_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_stock_movement->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_stock_movement_id" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->id->caption() ?><?php echo ($pharmacy_stock_movement->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->id->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_id">
<span<?php echo $pharmacy_stock_movement->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_stock_movement->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_stock_movement" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_stock_movement->id->CurrentValue) ?>">
<?php echo $pharmacy_stock_movement->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_stock_movement_PRC" for="x_PRC" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->PRC->caption() ?><?php echo ($pharmacy_stock_movement->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->PRC->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PRC">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PRC->EditValue ?>"<?php echo $pharmacy_stock_movement->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_pharmacy_stock_movement_PrName" for="x_PrName" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->PrName->caption() ?><?php echo ($pharmacy_stock_movement->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->PrName->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PrName">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PrName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PrName->EditValue ?>"<?php echo $pharmacy_stock_movement->PrName->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label id="elh_pharmacy_stock_movement_BATCHNO" for="x_BATCHNO" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->BATCHNO->caption() ?><?php echo ($pharmacy_stock_movement->BATCHNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_BATCHNO">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->BATCHNO->EditValue ?>"<?php echo $pharmacy_stock_movement->BATCHNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->BATCHNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->OpeningStk->Visible) { // OpeningStk ?>
	<div id="r_OpeningStk" class="form-group row">
		<label id="elh_pharmacy_stock_movement_OpeningStk" for="x_OpeningStk" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->OpeningStk->caption() ?><?php echo ($pharmacy_stock_movement->OpeningStk->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->OpeningStk->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_OpeningStk">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_OpeningStk" name="x_OpeningStk" id="x_OpeningStk" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->OpeningStk->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->OpeningStk->EditValue ?>"<?php echo $pharmacy_stock_movement->OpeningStk->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->OpeningStk->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchaseQty->Visible) { // PurchaseQty ?>
	<div id="r_PurchaseQty" class="form-group row">
		<label id="elh_pharmacy_stock_movement_PurchaseQty" for="x_PurchaseQty" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->PurchaseQty->caption() ?><?php echo ($pharmacy_stock_movement->PurchaseQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->PurchaseQty->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PurchaseQty">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PurchaseQty" name="x_PurchaseQty" id="x_PurchaseQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PurchaseQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PurchaseQty->EditValue ?>"<?php echo $pharmacy_stock_movement->PurchaseQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->PurchaseQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->SalesQty->Visible) { // SalesQty ?>
	<div id="r_SalesQty" class="form-group row">
		<label id="elh_pharmacy_stock_movement_SalesQty" for="x_SalesQty" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->SalesQty->caption() ?><?php echo ($pharmacy_stock_movement->SalesQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->SalesQty->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_SalesQty">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_SalesQty" name="x_SalesQty" id="x_SalesQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->SalesQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->SalesQty->EditValue ?>"<?php echo $pharmacy_stock_movement->SalesQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->SalesQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->ClosingStk->Visible) { // ClosingStk ?>
	<div id="r_ClosingStk" class="form-group row">
		<label id="elh_pharmacy_stock_movement_ClosingStk" for="x_ClosingStk" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->ClosingStk->caption() ?><?php echo ($pharmacy_stock_movement->ClosingStk->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->ClosingStk->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_ClosingStk">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_ClosingStk" name="x_ClosingStk" id="x_ClosingStk" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->ClosingStk->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->ClosingStk->EditValue ?>"<?php echo $pharmacy_stock_movement->ClosingStk->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->ClosingStk->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
	<div id="r_PurchasefreeQty" class="form-group row">
		<label id="elh_pharmacy_stock_movement_PurchasefreeQty" for="x_PurchasefreeQty" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->PurchasefreeQty->caption() ?><?php echo ($pharmacy_stock_movement->PurchasefreeQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->PurchasefreeQty->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PurchasefreeQty">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PurchasefreeQty" name="x_PurchasefreeQty" id="x_PurchasefreeQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PurchasefreeQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PurchasefreeQty->EditValue ?>"<?php echo $pharmacy_stock_movement->PurchasefreeQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->PurchasefreeQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->TransferingQty->Visible) { // TransferingQty ?>
	<div id="r_TransferingQty" class="form-group row">
		<label id="elh_pharmacy_stock_movement_TransferingQty" for="x_TransferingQty" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->TransferingQty->caption() ?><?php echo ($pharmacy_stock_movement->TransferingQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->TransferingQty->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_TransferingQty">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_TransferingQty" name="x_TransferingQty" id="x_TransferingQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->TransferingQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->TransferingQty->EditValue ?>"<?php echo $pharmacy_stock_movement->TransferingQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->TransferingQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
	<div id="r_UnitPurchaseRate" class="form-group row">
		<label id="elh_pharmacy_stock_movement_UnitPurchaseRate" for="x_UnitPurchaseRate" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->UnitPurchaseRate->caption() ?><?php echo ($pharmacy_stock_movement->UnitPurchaseRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->UnitPurchaseRate->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_UnitPurchaseRate">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_UnitPurchaseRate" name="x_UnitPurchaseRate" id="x_UnitPurchaseRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->UnitPurchaseRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->UnitPurchaseRate->EditValue ?>"<?php echo $pharmacy_stock_movement->UnitPurchaseRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->UnitPurchaseRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->UnitSaleRate->Visible) { // UnitSaleRate ?>
	<div id="r_UnitSaleRate" class="form-group row">
		<label id="elh_pharmacy_stock_movement_UnitSaleRate" for="x_UnitSaleRate" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->UnitSaleRate->caption() ?><?php echo ($pharmacy_stock_movement->UnitSaleRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->UnitSaleRate->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_UnitSaleRate">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_UnitSaleRate" name="x_UnitSaleRate" id="x_UnitSaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->UnitSaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->UnitSaleRate->EditValue ?>"<?php echo $pharmacy_stock_movement->UnitSaleRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->UnitSaleRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
	<div id="r_CreatedDate" class="form-group row">
		<label id="elh_pharmacy_stock_movement_CreatedDate" for="x_CreatedDate" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->CreatedDate->caption() ?><?php echo ($pharmacy_stock_movement->CreatedDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->CreatedDate->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_CreatedDate">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_CreatedDate" name="x_CreatedDate" id="x_CreatedDate" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->CreatedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->CreatedDate->EditValue ?>"<?php echo $pharmacy_stock_movement->CreatedDate->editAttributes() ?>>
<?php if (!$pharmacy_stock_movement->CreatedDate->ReadOnly && !$pharmacy_stock_movement->CreatedDate->Disabled && !isset($pharmacy_stock_movement->CreatedDate->EditAttrs["readonly"]) && !isset($pharmacy_stock_movement->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_stock_movementedit", "x_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_stock_movement->CreatedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label id="elh_pharmacy_stock_movement_OQ" for="x_OQ" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->OQ->caption() ?><?php echo ($pharmacy_stock_movement->OQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->OQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_OQ">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->OQ->EditValue ?>"<?php echo $pharmacy_stock_movement->OQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->OQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label id="elh_pharmacy_stock_movement_RQ" for="x_RQ" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->RQ->caption() ?><?php echo ($pharmacy_stock_movement->RQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->RQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_RQ">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->RQ->EditValue ?>"<?php echo $pharmacy_stock_movement->RQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->RQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label id="elh_pharmacy_stock_movement_MRQ" for="x_MRQ" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->MRQ->caption() ?><?php echo ($pharmacy_stock_movement->MRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_MRQ">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->MRQ->EditValue ?>"<?php echo $pharmacy_stock_movement->MRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->MRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label id="elh_pharmacy_stock_movement_IQ" for="x_IQ" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->IQ->caption() ?><?php echo ($pharmacy_stock_movement->IQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->IQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_IQ">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->IQ->EditValue ?>"<?php echo $pharmacy_stock_movement->IQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->IQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_stock_movement_MRP" for="x_MRP" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->MRP->caption() ?><?php echo ($pharmacy_stock_movement->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->MRP->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_MRP">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->MRP->EditValue ?>"<?php echo $pharmacy_stock_movement->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label id="elh_pharmacy_stock_movement_EXPDT" for="x_EXPDT" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->EXPDT->caption() ?><?php echo ($pharmacy_stock_movement->EXPDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_EXPDT">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->EXPDT->EditValue ?>"<?php echo $pharmacy_stock_movement->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_stock_movement->EXPDT->ReadOnly && !$pharmacy_stock_movement->EXPDT->Disabled && !isset($pharmacy_stock_movement->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_stock_movement->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_stock_movementedit", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_stock_movement->EXPDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label id="elh_pharmacy_stock_movement_UR" for="x_UR" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->UR->caption() ?><?php echo ($pharmacy_stock_movement->UR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->UR->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_UR">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->UR->EditValue ?>"<?php echo $pharmacy_stock_movement->UR->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->UR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label id="elh_pharmacy_stock_movement_RT" for="x_RT" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->RT->caption() ?><?php echo ($pharmacy_stock_movement->RT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->RT->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_RT">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->RT->EditValue ?>"<?php echo $pharmacy_stock_movement->RT->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->RT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label id="elh_pharmacy_stock_movement_PRCODE" for="x_PRCODE" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->PRCODE->caption() ?><?php echo ($pharmacy_stock_movement->PRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PRCODE">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PRCODE->EditValue ?>"<?php echo $pharmacy_stock_movement->PRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->PRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->BATCH->Visible) { // BATCH ?>
	<div id="r_BATCH" class="form-group row">
		<label id="elh_pharmacy_stock_movement_BATCH" for="x_BATCH" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->BATCH->caption() ?><?php echo ($pharmacy_stock_movement->BATCH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->BATCH->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_BATCH">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->BATCH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->BATCH->EditValue ?>"<?php echo $pharmacy_stock_movement->BATCH->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->BATCH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_stock_movement_PC" for="x_PC" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->PC->caption() ?><?php echo ($pharmacy_stock_movement->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->PC->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PC">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PC->EditValue ?>"<?php echo $pharmacy_stock_movement->PC->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->OLDRT->Visible) { // OLDRT ?>
	<div id="r_OLDRT" class="form-group row">
		<label id="elh_pharmacy_stock_movement_OLDRT" for="x_OLDRT" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->OLDRT->caption() ?><?php echo ($pharmacy_stock_movement->OLDRT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->OLDRT->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_OLDRT">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_OLDRT" name="x_OLDRT" id="x_OLDRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->OLDRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->OLDRT->EditValue ?>"<?php echo $pharmacy_stock_movement->OLDRT->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->OLDRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<div id="r_TEMPMRQ" class="form-group row">
		<label id="elh_pharmacy_stock_movement_TEMPMRQ" for="x_TEMPMRQ" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->TEMPMRQ->caption() ?><?php echo ($pharmacy_stock_movement->TEMPMRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->TEMPMRQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_TEMPMRQ">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_TEMPMRQ" name="x_TEMPMRQ" id="x_TEMPMRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->TEMPMRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->TEMPMRQ->EditValue ?>"<?php echo $pharmacy_stock_movement->TEMPMRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->TEMPMRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label id="elh_pharmacy_stock_movement_TAXP" for="x_TAXP" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->TAXP->caption() ?><?php echo ($pharmacy_stock_movement->TAXP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_TAXP">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->TAXP->EditValue ?>"<?php echo $pharmacy_stock_movement->TAXP->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->TAXP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->OLDRATE->Visible) { // OLDRATE ?>
	<div id="r_OLDRATE" class="form-group row">
		<label id="elh_pharmacy_stock_movement_OLDRATE" for="x_OLDRATE" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->OLDRATE->caption() ?><?php echo ($pharmacy_stock_movement->OLDRATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->OLDRATE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_OLDRATE">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_OLDRATE" name="x_OLDRATE" id="x_OLDRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->OLDRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->OLDRATE->EditValue ?>"<?php echo $pharmacy_stock_movement->OLDRATE->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->OLDRATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->NEWRATE->Visible) { // NEWRATE ?>
	<div id="r_NEWRATE" class="form-group row">
		<label id="elh_pharmacy_stock_movement_NEWRATE" for="x_NEWRATE" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->NEWRATE->caption() ?><?php echo ($pharmacy_stock_movement->NEWRATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->NEWRATE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_NEWRATE">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_NEWRATE" name="x_NEWRATE" id="x_NEWRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->NEWRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->NEWRATE->EditValue ?>"<?php echo $pharmacy_stock_movement->NEWRATE->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->NEWRATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<div id="r_OTEMPMRA" class="form-group row">
		<label id="elh_pharmacy_stock_movement_OTEMPMRA" for="x_OTEMPMRA" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->OTEMPMRA->caption() ?><?php echo ($pharmacy_stock_movement->OTEMPMRA->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->OTEMPMRA->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_OTEMPMRA">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_OTEMPMRA" name="x_OTEMPMRA" id="x_OTEMPMRA" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->OTEMPMRA->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->OTEMPMRA->EditValue ?>"<?php echo $pharmacy_stock_movement->OTEMPMRA->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->OTEMPMRA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<div id="r_ACTIVESTATUS" class="form-group row">
		<label id="elh_pharmacy_stock_movement_ACTIVESTATUS" for="x_ACTIVESTATUS" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->ACTIVESTATUS->caption() ?><?php echo ($pharmacy_stock_movement->ACTIVESTATUS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_ACTIVESTATUS">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_ACTIVESTATUS" name="x_ACTIVESTATUS" id="x_ACTIVESTATUS" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->ACTIVESTATUS->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->ACTIVESTATUS->EditValue ?>"<?php echo $pharmacy_stock_movement->ACTIVESTATUS->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->ACTIVESTATUS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label id="elh_pharmacy_stock_movement_PSGST" for="x_PSGST" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->PSGST->caption() ?><?php echo ($pharmacy_stock_movement->PSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PSGST">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PSGST->EditValue ?>"<?php echo $pharmacy_stock_movement->PSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->PSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label id="elh_pharmacy_stock_movement_PCGST" for="x_PCGST" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->PCGST->caption() ?><?php echo ($pharmacy_stock_movement->PCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PCGST">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PCGST->EditValue ?>"<?php echo $pharmacy_stock_movement->PCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->PCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label id="elh_pharmacy_stock_movement_SSGST" for="x_SSGST" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->SSGST->caption() ?><?php echo ($pharmacy_stock_movement->SSGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_SSGST">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->SSGST->EditValue ?>"<?php echo $pharmacy_stock_movement->SSGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->SSGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label id="elh_pharmacy_stock_movement_SCGST" for="x_SCGST" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->SCGST->caption() ?><?php echo ($pharmacy_stock_movement->SCGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_SCGST">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->SCGST->EditValue ?>"<?php echo $pharmacy_stock_movement->SCGST->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->SCGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label id="elh_pharmacy_stock_movement_MFRCODE" for="x_MFRCODE" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->MFRCODE->caption() ?><?php echo ($pharmacy_stock_movement->MFRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_MFRCODE">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->MFRCODE->EditValue ?>"<?php echo $pharmacy_stock_movement->MFRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->MFRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_pharmacy_stock_movement_BRCODE" for="x_BRCODE" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->BRCODE->caption() ?><?php echo ($pharmacy_stock_movement->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_BRCODE">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->BRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->BRCODE->EditValue ?>"<?php echo $pharmacy_stock_movement->BRCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->FRQ->Visible) { // FRQ ?>
	<div id="r_FRQ" class="form-group row">
		<label id="elh_pharmacy_stock_movement_FRQ" for="x_FRQ" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->FRQ->caption() ?><?php echo ($pharmacy_stock_movement->FRQ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->FRQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_FRQ">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_FRQ" name="x_FRQ" id="x_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->FRQ->EditValue ?>"<?php echo $pharmacy_stock_movement->FRQ->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->FRQ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_pharmacy_stock_movement_HospID" for="x_HospID" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->HospID->caption() ?><?php echo ($pharmacy_stock_movement->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->HospID->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_HospID">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->HospID->EditValue ?>"<?php echo $pharmacy_stock_movement->HospID->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label id="elh_pharmacy_stock_movement_UM" for="x_UM" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->UM->caption() ?><?php echo ($pharmacy_stock_movement->UM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->UM->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_UM">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->UM->EditValue ?>"<?php echo $pharmacy_stock_movement->UM->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->UM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_pharmacy_stock_movement_GENNAME" for="x_GENNAME" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->GENNAME->caption() ?><?php echo ($pharmacy_stock_movement->GENNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_GENNAME">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->GENNAME->EditValue ?>"<?php echo $pharmacy_stock_movement->GENNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->BILLDATE->Visible) { // BILLDATE ?>
	<div id="r_BILLDATE" class="form-group row">
		<label id="elh_pharmacy_stock_movement_BILLDATE" for="x_BILLDATE" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->BILLDATE->caption() ?><?php echo ($pharmacy_stock_movement->BILLDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->BILLDATE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_BILLDATE">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->BILLDATE->EditValue ?>"<?php echo $pharmacy_stock_movement->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_stock_movement->BILLDATE->ReadOnly && !$pharmacy_stock_movement->BILLDATE->Disabled && !isset($pharmacy_stock_movement->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_stock_movement->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_stock_movementedit", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_stock_movement->BILLDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label id="elh_pharmacy_stock_movement_CreatedDateTime" for="x_CreatedDateTime" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->CreatedDateTime->caption() ?><?php echo ($pharmacy_stock_movement->CreatedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->CreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_CreatedDateTime">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->CreatedDateTime->EditValue ?>"<?php echo $pharmacy_stock_movement->CreatedDateTime->editAttributes() ?>>
<?php if (!$pharmacy_stock_movement->CreatedDateTime->ReadOnly && !$pharmacy_stock_movement->CreatedDateTime->Disabled && !isset($pharmacy_stock_movement->CreatedDateTime->EditAttrs["readonly"]) && !isset($pharmacy_stock_movement->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_stock_movementedit", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_stock_movement->CreatedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->baid->Visible) { // baid ?>
	<div id="r_baid" class="form-group row">
		<label id="elh_pharmacy_stock_movement_baid" for="x_baid" class="<?php echo $pharmacy_stock_movement_edit->LeftColumnClass ?>"><?php echo $pharmacy_stock_movement->baid->caption() ?><?php echo ($pharmacy_stock_movement->baid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_stock_movement_edit->RightColumnClass ?>"><div<?php echo $pharmacy_stock_movement->baid->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_baid">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_baid" name="x_baid" id="x_baid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->baid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->baid->EditValue ?>"<?php echo $pharmacy_stock_movement->baid->editAttributes() ?>>
</span>
<?php echo $pharmacy_stock_movement->baid->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_stock_movement_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_stock_movement_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_stock_movement_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_stock_movement_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_stock_movement_edit->terminate();
?>