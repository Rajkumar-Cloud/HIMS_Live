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
$store_storeled_delete = new store_storeled_delete();

// Run the page
$store_storeled_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storeled_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fstore_storeleddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fstore_storeleddelete = currentForm = new ew.Form("fstore_storeleddelete", "delete");
	loadjs.done("fstore_storeleddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $store_storeled_delete->showPageHeader(); ?>
<?php
$store_storeled_delete->showMessage();
?>
<form name="fstore_storeleddelete" id="fstore_storeleddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storeled">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_storeled_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_storeled_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $store_storeled_delete->BRCODE->headerCellClass() ?>"><span id="elh_store_storeled_BRCODE" class="store_storeled_BRCODE"><?php echo $store_storeled_delete->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->TYPE->Visible) { // TYPE ?>
		<th class="<?php echo $store_storeled_delete->TYPE->headerCellClass() ?>"><span id="elh_store_storeled_TYPE" class="store_storeled_TYPE"><?php echo $store_storeled_delete->TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DN->Visible) { // DN ?>
		<th class="<?php echo $store_storeled_delete->DN->headerCellClass() ?>"><span id="elh_store_storeled_DN" class="store_storeled_DN"><?php echo $store_storeled_delete->DN->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->RDN->Visible) { // RDN ?>
		<th class="<?php echo $store_storeled_delete->RDN->headerCellClass() ?>"><span id="elh_store_storeled_RDN" class="store_storeled_RDN"><?php echo $store_storeled_delete->RDN->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DT->Visible) { // DT ?>
		<th class="<?php echo $store_storeled_delete->DT->headerCellClass() ?>"><span id="elh_store_storeled_DT" class="store_storeled_DT"><?php echo $store_storeled_delete->DT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PRC->Visible) { // PRC ?>
		<th class="<?php echo $store_storeled_delete->PRC->headerCellClass() ?>"><span id="elh_store_storeled_PRC" class="store_storeled_PRC"><?php echo $store_storeled_delete->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->OQ->Visible) { // OQ ?>
		<th class="<?php echo $store_storeled_delete->OQ->headerCellClass() ?>"><span id="elh_store_storeled_OQ" class="store_storeled_OQ"><?php echo $store_storeled_delete->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->RQ->Visible) { // RQ ?>
		<th class="<?php echo $store_storeled_delete->RQ->headerCellClass() ?>"><span id="elh_store_storeled_RQ" class="store_storeled_RQ"><?php echo $store_storeled_delete->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $store_storeled_delete->MRQ->headerCellClass() ?>"><span id="elh_store_storeled_MRQ" class="store_storeled_MRQ"><?php echo $store_storeled_delete->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->IQ->Visible) { // IQ ?>
		<th class="<?php echo $store_storeled_delete->IQ->headerCellClass() ?>"><span id="elh_store_storeled_IQ" class="store_storeled_IQ"><?php echo $store_storeled_delete->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $store_storeled_delete->BATCHNO->headerCellClass() ?>"><span id="elh_store_storeled_BATCHNO" class="store_storeled_BATCHNO"><?php echo $store_storeled_delete->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $store_storeled_delete->EXPDT->headerCellClass() ?>"><span id="elh_store_storeled_EXPDT" class="store_storeled_EXPDT"><?php echo $store_storeled_delete->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->BILLNO->Visible) { // BILLNO ?>
		<th class="<?php echo $store_storeled_delete->BILLNO->headerCellClass() ?>"><span id="elh_store_storeled_BILLNO" class="store_storeled_BILLNO"><?php echo $store_storeled_delete->BILLNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->BILLDT->Visible) { // BILLDT ?>
		<th class="<?php echo $store_storeled_delete->BILLDT->headerCellClass() ?>"><span id="elh_store_storeled_BILLDT" class="store_storeled_BILLDT"><?php echo $store_storeled_delete->BILLDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->RT->Visible) { // RT ?>
		<th class="<?php echo $store_storeled_delete->RT->headerCellClass() ?>"><span id="elh_store_storeled_RT" class="store_storeled_RT"><?php echo $store_storeled_delete->RT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->VALUE->Visible) { // VALUE ?>
		<th class="<?php echo $store_storeled_delete->VALUE->headerCellClass() ?>"><span id="elh_store_storeled_VALUE" class="store_storeled_VALUE"><?php echo $store_storeled_delete->VALUE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DISC->Visible) { // DISC ?>
		<th class="<?php echo $store_storeled_delete->DISC->headerCellClass() ?>"><span id="elh_store_storeled_DISC" class="store_storeled_DISC"><?php echo $store_storeled_delete->DISC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->TAXP->Visible) { // TAXP ?>
		<th class="<?php echo $store_storeled_delete->TAXP->headerCellClass() ?>"><span id="elh_store_storeled_TAXP" class="store_storeled_TAXP"><?php echo $store_storeled_delete->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->TAX->Visible) { // TAX ?>
		<th class="<?php echo $store_storeled_delete->TAX->headerCellClass() ?>"><span id="elh_store_storeled_TAX" class="store_storeled_TAX"><?php echo $store_storeled_delete->TAX->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->TAXR->Visible) { // TAXR ?>
		<th class="<?php echo $store_storeled_delete->TAXR->headerCellClass() ?>"><span id="elh_store_storeled_TAXR" class="store_storeled_TAXR"><?php echo $store_storeled_delete->TAXR->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DAMT->Visible) { // DAMT ?>
		<th class="<?php echo $store_storeled_delete->DAMT->headerCellClass() ?>"><span id="elh_store_storeled_DAMT" class="store_storeled_DAMT"><?php echo $store_storeled_delete->DAMT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->EMPNO->Visible) { // EMPNO ?>
		<th class="<?php echo $store_storeled_delete->EMPNO->headerCellClass() ?>"><span id="elh_store_storeled_EMPNO" class="store_storeled_EMPNO"><?php echo $store_storeled_delete->EMPNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PC->Visible) { // PC ?>
		<th class="<?php echo $store_storeled_delete->PC->headerCellClass() ?>"><span id="elh_store_storeled_PC" class="store_storeled_PC"><?php echo $store_storeled_delete->PC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DRNAME->Visible) { // DRNAME ?>
		<th class="<?php echo $store_storeled_delete->DRNAME->headerCellClass() ?>"><span id="elh_store_storeled_DRNAME" class="store_storeled_DRNAME"><?php echo $store_storeled_delete->DRNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->BTIME->Visible) { // BTIME ?>
		<th class="<?php echo $store_storeled_delete->BTIME->headerCellClass() ?>"><span id="elh_store_storeled_BTIME" class="store_storeled_BTIME"><?php echo $store_storeled_delete->BTIME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->ONO->Visible) { // ONO ?>
		<th class="<?php echo $store_storeled_delete->ONO->headerCellClass() ?>"><span id="elh_store_storeled_ONO" class="store_storeled_ONO"><?php echo $store_storeled_delete->ONO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->ODT->Visible) { // ODT ?>
		<th class="<?php echo $store_storeled_delete->ODT->headerCellClass() ?>"><span id="elh_store_storeled_ODT" class="store_storeled_ODT"><?php echo $store_storeled_delete->ODT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PURRT->Visible) { // PURRT ?>
		<th class="<?php echo $store_storeled_delete->PURRT->headerCellClass() ?>"><span id="elh_store_storeled_PURRT" class="store_storeled_PURRT"><?php echo $store_storeled_delete->PURRT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->GRP->Visible) { // GRP ?>
		<th class="<?php echo $store_storeled_delete->GRP->headerCellClass() ?>"><span id="elh_store_storeled_GRP" class="store_storeled_GRP"><?php echo $store_storeled_delete->GRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->IBATCH->Visible) { // IBATCH ?>
		<th class="<?php echo $store_storeled_delete->IBATCH->headerCellClass() ?>"><span id="elh_store_storeled_IBATCH" class="store_storeled_IBATCH"><?php echo $store_storeled_delete->IBATCH->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->IPNO->Visible) { // IPNO ?>
		<th class="<?php echo $store_storeled_delete->IPNO->headerCellClass() ?>"><span id="elh_store_storeled_IPNO" class="store_storeled_IPNO"><?php echo $store_storeled_delete->IPNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->OPNO->Visible) { // OPNO ?>
		<th class="<?php echo $store_storeled_delete->OPNO->headerCellClass() ?>"><span id="elh_store_storeled_OPNO" class="store_storeled_OPNO"><?php echo $store_storeled_delete->OPNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->RECID->Visible) { // RECID ?>
		<th class="<?php echo $store_storeled_delete->RECID->headerCellClass() ?>"><span id="elh_store_storeled_RECID" class="store_storeled_RECID"><?php echo $store_storeled_delete->RECID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->FQTY->Visible) { // FQTY ?>
		<th class="<?php echo $store_storeled_delete->FQTY->headerCellClass() ?>"><span id="elh_store_storeled_FQTY" class="store_storeled_FQTY"><?php echo $store_storeled_delete->FQTY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->UR->Visible) { // UR ?>
		<th class="<?php echo $store_storeled_delete->UR->headerCellClass() ?>"><span id="elh_store_storeled_UR" class="store_storeled_UR"><?php echo $store_storeled_delete->UR->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DCID->Visible) { // DCID ?>
		<th class="<?php echo $store_storeled_delete->DCID->headerCellClass() ?>"><span id="elh_store_storeled_DCID" class="store_storeled_DCID"><?php echo $store_storeled_delete->DCID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->_USERID->Visible) { // USERID ?>
		<th class="<?php echo $store_storeled_delete->_USERID->headerCellClass() ?>"><span id="elh_store_storeled__USERID" class="store_storeled__USERID"><?php echo $store_storeled_delete->_USERID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->MODDT->Visible) { // MODDT ?>
		<th class="<?php echo $store_storeled_delete->MODDT->headerCellClass() ?>"><span id="elh_store_storeled_MODDT" class="store_storeled_MODDT"><?php echo $store_storeled_delete->MODDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->FYM->Visible) { // FYM ?>
		<th class="<?php echo $store_storeled_delete->FYM->headerCellClass() ?>"><span id="elh_store_storeled_FYM" class="store_storeled_FYM"><?php echo $store_storeled_delete->FYM->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PRCBATCH->Visible) { // PRCBATCH ?>
		<th class="<?php echo $store_storeled_delete->PRCBATCH->headerCellClass() ?>"><span id="elh_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH"><?php echo $store_storeled_delete->PRCBATCH->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->SLNO->Visible) { // SLNO ?>
		<th class="<?php echo $store_storeled_delete->SLNO->headerCellClass() ?>"><span id="elh_store_storeled_SLNO" class="store_storeled_SLNO"><?php echo $store_storeled_delete->SLNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->MRP->Visible) { // MRP ?>
		<th class="<?php echo $store_storeled_delete->MRP->headerCellClass() ?>"><span id="elh_store_storeled_MRP" class="store_storeled_MRP"><?php echo $store_storeled_delete->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->BILLYM->Visible) { // BILLYM ?>
		<th class="<?php echo $store_storeled_delete->BILLYM->headerCellClass() ?>"><span id="elh_store_storeled_BILLYM" class="store_storeled_BILLYM"><?php echo $store_storeled_delete->BILLYM->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->BILLGRP->Visible) { // BILLGRP ?>
		<th class="<?php echo $store_storeled_delete->BILLGRP->headerCellClass() ?>"><span id="elh_store_storeled_BILLGRP" class="store_storeled_BILLGRP"><?php echo $store_storeled_delete->BILLGRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->STAFF->Visible) { // STAFF ?>
		<th class="<?php echo $store_storeled_delete->STAFF->headerCellClass() ?>"><span id="elh_store_storeled_STAFF" class="store_storeled_STAFF"><?php echo $store_storeled_delete->STAFF->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->TEMPIPNO->Visible) { // TEMPIPNO ?>
		<th class="<?php echo $store_storeled_delete->TEMPIPNO->headerCellClass() ?>"><span id="elh_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO"><?php echo $store_storeled_delete->TEMPIPNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PRNTED->Visible) { // PRNTED ?>
		<th class="<?php echo $store_storeled_delete->PRNTED->headerCellClass() ?>"><span id="elh_store_storeled_PRNTED" class="store_storeled_PRNTED"><?php echo $store_storeled_delete->PRNTED->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PATNAME->Visible) { // PATNAME ?>
		<th class="<?php echo $store_storeled_delete->PATNAME->headerCellClass() ?>"><span id="elh_store_storeled_PATNAME" class="store_storeled_PATNAME"><?php echo $store_storeled_delete->PATNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PJVNO->Visible) { // PJVNO ?>
		<th class="<?php echo $store_storeled_delete->PJVNO->headerCellClass() ?>"><span id="elh_store_storeled_PJVNO" class="store_storeled_PJVNO"><?php echo $store_storeled_delete->PJVNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PJVSLNO->Visible) { // PJVSLNO ?>
		<th class="<?php echo $store_storeled_delete->PJVSLNO->headerCellClass() ?>"><span id="elh_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO"><?php echo $store_storeled_delete->PJVSLNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->OTHDISC->Visible) { // OTHDISC ?>
		<th class="<?php echo $store_storeled_delete->OTHDISC->headerCellClass() ?>"><span id="elh_store_storeled_OTHDISC" class="store_storeled_OTHDISC"><?php echo $store_storeled_delete->OTHDISC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PJVYM->Visible) { // PJVYM ?>
		<th class="<?php echo $store_storeled_delete->PJVYM->headerCellClass() ?>"><span id="elh_store_storeled_PJVYM" class="store_storeled_PJVYM"><?php echo $store_storeled_delete->PJVYM->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PURDISCPER->Visible) { // PURDISCPER ?>
		<th class="<?php echo $store_storeled_delete->PURDISCPER->headerCellClass() ?>"><span id="elh_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER"><?php echo $store_storeled_delete->PURDISCPER->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->CASHIER->Visible) { // CASHIER ?>
		<th class="<?php echo $store_storeled_delete->CASHIER->headerCellClass() ?>"><span id="elh_store_storeled_CASHIER" class="store_storeled_CASHIER"><?php echo $store_storeled_delete->CASHIER->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->CASHTIME->Visible) { // CASHTIME ?>
		<th class="<?php echo $store_storeled_delete->CASHTIME->headerCellClass() ?>"><span id="elh_store_storeled_CASHTIME" class="store_storeled_CASHTIME"><?php echo $store_storeled_delete->CASHTIME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->CASHRECD->Visible) { // CASHRECD ?>
		<th class="<?php echo $store_storeled_delete->CASHRECD->headerCellClass() ?>"><span id="elh_store_storeled_CASHRECD" class="store_storeled_CASHRECD"><?php echo $store_storeled_delete->CASHRECD->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->CASHREFNO->Visible) { // CASHREFNO ?>
		<th class="<?php echo $store_storeled_delete->CASHREFNO->headerCellClass() ?>"><span id="elh_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO"><?php echo $store_storeled_delete->CASHREFNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
		<th class="<?php echo $store_storeled_delete->CASHIERSHIFT->headerCellClass() ?>"><span id="elh_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT"><?php echo $store_storeled_delete->CASHIERSHIFT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PRCODE->Visible) { // PRCODE ?>
		<th class="<?php echo $store_storeled_delete->PRCODE->headerCellClass() ?>"><span id="elh_store_storeled_PRCODE" class="store_storeled_PRCODE"><?php echo $store_storeled_delete->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->RELEASEBY->Visible) { // RELEASEBY ?>
		<th class="<?php echo $store_storeled_delete->RELEASEBY->headerCellClass() ?>"><span id="elh_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY"><?php echo $store_storeled_delete->RELEASEBY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->CRAUTHOR->Visible) { // CRAUTHOR ?>
		<th class="<?php echo $store_storeled_delete->CRAUTHOR->headerCellClass() ?>"><span id="elh_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR"><?php echo $store_storeled_delete->CRAUTHOR->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PAYMENT->Visible) { // PAYMENT ?>
		<th class="<?php echo $store_storeled_delete->PAYMENT->headerCellClass() ?>"><span id="elh_store_storeled_PAYMENT" class="store_storeled_PAYMENT"><?php echo $store_storeled_delete->PAYMENT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DRID->Visible) { // DRID ?>
		<th class="<?php echo $store_storeled_delete->DRID->headerCellClass() ?>"><span id="elh_store_storeled_DRID" class="store_storeled_DRID"><?php echo $store_storeled_delete->DRID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->WARD->Visible) { // WARD ?>
		<th class="<?php echo $store_storeled_delete->WARD->headerCellClass() ?>"><span id="elh_store_storeled_WARD" class="store_storeled_WARD"><?php echo $store_storeled_delete->WARD->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->STAXTYPE->Visible) { // STAXTYPE ?>
		<th class="<?php echo $store_storeled_delete->STAXTYPE->headerCellClass() ?>"><span id="elh_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE"><?php echo $store_storeled_delete->STAXTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PURDISCVAL->Visible) { // PURDISCVAL ?>
		<th class="<?php echo $store_storeled_delete->PURDISCVAL->headerCellClass() ?>"><span id="elh_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL"><?php echo $store_storeled_delete->PURDISCVAL->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->RNDOFF->Visible) { // RNDOFF ?>
		<th class="<?php echo $store_storeled_delete->RNDOFF->headerCellClass() ?>"><span id="elh_store_storeled_RNDOFF" class="store_storeled_RNDOFF"><?php echo $store_storeled_delete->RNDOFF->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DISCONMRP->Visible) { // DISCONMRP ?>
		<th class="<?php echo $store_storeled_delete->DISCONMRP->headerCellClass() ?>"><span id="elh_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP"><?php echo $store_storeled_delete->DISCONMRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DELVDT->Visible) { // DELVDT ?>
		<th class="<?php echo $store_storeled_delete->DELVDT->headerCellClass() ?>"><span id="elh_store_storeled_DELVDT" class="store_storeled_DELVDT"><?php echo $store_storeled_delete->DELVDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DELVTIME->Visible) { // DELVTIME ?>
		<th class="<?php echo $store_storeled_delete->DELVTIME->headerCellClass() ?>"><span id="elh_store_storeled_DELVTIME" class="store_storeled_DELVTIME"><?php echo $store_storeled_delete->DELVTIME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->DELVBY->Visible) { // DELVBY ?>
		<th class="<?php echo $store_storeled_delete->DELVBY->headerCellClass() ?>"><span id="elh_store_storeled_DELVBY" class="store_storeled_DELVBY"><?php echo $store_storeled_delete->DELVBY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->HOSPNO->Visible) { // HOSPNO ?>
		<th class="<?php echo $store_storeled_delete->HOSPNO->headerCellClass() ?>"><span id="elh_store_storeled_HOSPNO" class="store_storeled_HOSPNO"><?php echo $store_storeled_delete->HOSPNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->id->Visible) { // id ?>
		<th class="<?php echo $store_storeled_delete->id->headerCellClass() ?>"><span id="elh_store_storeled_id" class="store_storeled_id"><?php echo $store_storeled_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->pbv->Visible) { // pbv ?>
		<th class="<?php echo $store_storeled_delete->pbv->headerCellClass() ?>"><span id="elh_store_storeled_pbv" class="store_storeled_pbv"><?php echo $store_storeled_delete->pbv->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->pbt->Visible) { // pbt ?>
		<th class="<?php echo $store_storeled_delete->pbt->headerCellClass() ?>"><span id="elh_store_storeled_pbt" class="store_storeled_pbt"><?php echo $store_storeled_delete->pbt->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->SiNo->Visible) { // SiNo ?>
		<th class="<?php echo $store_storeled_delete->SiNo->headerCellClass() ?>"><span id="elh_store_storeled_SiNo" class="store_storeled_SiNo"><?php echo $store_storeled_delete->SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->Product->Visible) { // Product ?>
		<th class="<?php echo $store_storeled_delete->Product->headerCellClass() ?>"><span id="elh_store_storeled_Product" class="store_storeled_Product"><?php echo $store_storeled_delete->Product->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->Mfg->Visible) { // Mfg ?>
		<th class="<?php echo $store_storeled_delete->Mfg->headerCellClass() ?>"><span id="elh_store_storeled_Mfg" class="store_storeled_Mfg"><?php echo $store_storeled_delete->Mfg->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->HosoID->Visible) { // HosoID ?>
		<th class="<?php echo $store_storeled_delete->HosoID->headerCellClass() ?>"><span id="elh_store_storeled_HosoID" class="store_storeled_HosoID"><?php echo $store_storeled_delete->HosoID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $store_storeled_delete->createdby->headerCellClass() ?>"><span id="elh_store_storeled_createdby" class="store_storeled_createdby"><?php echo $store_storeled_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $store_storeled_delete->createddatetime->headerCellClass() ?>"><span id="elh_store_storeled_createddatetime" class="store_storeled_createddatetime"><?php echo $store_storeled_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $store_storeled_delete->modifiedby->headerCellClass() ?>"><span id="elh_store_storeled_modifiedby" class="store_storeled_modifiedby"><?php echo $store_storeled_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $store_storeled_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime"><?php echo $store_storeled_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $store_storeled_delete->MFRCODE->headerCellClass() ?>"><span id="elh_store_storeled_MFRCODE" class="store_storeled_MFRCODE"><?php echo $store_storeled_delete->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $store_storeled_delete->Reception->headerCellClass() ?>"><span id="elh_store_storeled_Reception" class="store_storeled_Reception"><?php echo $store_storeled_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->PatID->Visible) { // PatID ?>
		<th class="<?php echo $store_storeled_delete->PatID->headerCellClass() ?>"><span id="elh_store_storeled_PatID" class="store_storeled_PatID"><?php echo $store_storeled_delete->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $store_storeled_delete->mrnno->headerCellClass() ?>"><span id="elh_store_storeled_mrnno" class="store_storeled_mrnno"><?php echo $store_storeled_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled_delete->BRNAME->Visible) { // BRNAME ?>
		<th class="<?php echo $store_storeled_delete->BRNAME->headerCellClass() ?>"><span id="elh_store_storeled_BRNAME" class="store_storeled_BRNAME"><?php echo $store_storeled_delete->BRNAME->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_storeled_delete->RecordCount = 0;
$i = 0;
while (!$store_storeled_delete->Recordset->EOF) {
	$store_storeled_delete->RecordCount++;
	$store_storeled_delete->RowCount++;

	// Set row properties
	$store_storeled->resetAttributes();
	$store_storeled->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_storeled_delete->loadRowValues($store_storeled_delete->Recordset);

	// Render row
	$store_storeled_delete->renderRow();
?>
	<tr <?php echo $store_storeled->rowAttributes() ?>>
<?php if ($store_storeled_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $store_storeled_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_BRCODE" class="store_storeled_BRCODE">
<span<?php echo $store_storeled_delete->BRCODE->viewAttributes() ?>><?php echo $store_storeled_delete->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->TYPE->Visible) { // TYPE ?>
		<td <?php echo $store_storeled_delete->TYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_TYPE" class="store_storeled_TYPE">
<span<?php echo $store_storeled_delete->TYPE->viewAttributes() ?>><?php echo $store_storeled_delete->TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DN->Visible) { // DN ?>
		<td <?php echo $store_storeled_delete->DN->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DN" class="store_storeled_DN">
<span<?php echo $store_storeled_delete->DN->viewAttributes() ?>><?php echo $store_storeled_delete->DN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->RDN->Visible) { // RDN ?>
		<td <?php echo $store_storeled_delete->RDN->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_RDN" class="store_storeled_RDN">
<span<?php echo $store_storeled_delete->RDN->viewAttributes() ?>><?php echo $store_storeled_delete->RDN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DT->Visible) { // DT ?>
		<td <?php echo $store_storeled_delete->DT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DT" class="store_storeled_DT">
<span<?php echo $store_storeled_delete->DT->viewAttributes() ?>><?php echo $store_storeled_delete->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PRC->Visible) { // PRC ?>
		<td <?php echo $store_storeled_delete->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PRC" class="store_storeled_PRC">
<span<?php echo $store_storeled_delete->PRC->viewAttributes() ?>><?php echo $store_storeled_delete->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->OQ->Visible) { // OQ ?>
		<td <?php echo $store_storeled_delete->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_OQ" class="store_storeled_OQ">
<span<?php echo $store_storeled_delete->OQ->viewAttributes() ?>><?php echo $store_storeled_delete->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->RQ->Visible) { // RQ ?>
		<td <?php echo $store_storeled_delete->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_RQ" class="store_storeled_RQ">
<span<?php echo $store_storeled_delete->RQ->viewAttributes() ?>><?php echo $store_storeled_delete->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->MRQ->Visible) { // MRQ ?>
		<td <?php echo $store_storeled_delete->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_MRQ" class="store_storeled_MRQ">
<span<?php echo $store_storeled_delete->MRQ->viewAttributes() ?>><?php echo $store_storeled_delete->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->IQ->Visible) { // IQ ?>
		<td <?php echo $store_storeled_delete->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_IQ" class="store_storeled_IQ">
<span<?php echo $store_storeled_delete->IQ->viewAttributes() ?>><?php echo $store_storeled_delete->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->BATCHNO->Visible) { // BATCHNO ?>
		<td <?php echo $store_storeled_delete->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_BATCHNO" class="store_storeled_BATCHNO">
<span<?php echo $store_storeled_delete->BATCHNO->viewAttributes() ?>><?php echo $store_storeled_delete->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->EXPDT->Visible) { // EXPDT ?>
		<td <?php echo $store_storeled_delete->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_EXPDT" class="store_storeled_EXPDT">
<span<?php echo $store_storeled_delete->EXPDT->viewAttributes() ?>><?php echo $store_storeled_delete->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->BILLNO->Visible) { // BILLNO ?>
		<td <?php echo $store_storeled_delete->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_BILLNO" class="store_storeled_BILLNO">
<span<?php echo $store_storeled_delete->BILLNO->viewAttributes() ?>><?php echo $store_storeled_delete->BILLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->BILLDT->Visible) { // BILLDT ?>
		<td <?php echo $store_storeled_delete->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_BILLDT" class="store_storeled_BILLDT">
<span<?php echo $store_storeled_delete->BILLDT->viewAttributes() ?>><?php echo $store_storeled_delete->BILLDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->RT->Visible) { // RT ?>
		<td <?php echo $store_storeled_delete->RT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_RT" class="store_storeled_RT">
<span<?php echo $store_storeled_delete->RT->viewAttributes() ?>><?php echo $store_storeled_delete->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->VALUE->Visible) { // VALUE ?>
		<td <?php echo $store_storeled_delete->VALUE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_VALUE" class="store_storeled_VALUE">
<span<?php echo $store_storeled_delete->VALUE->viewAttributes() ?>><?php echo $store_storeled_delete->VALUE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DISC->Visible) { // DISC ?>
		<td <?php echo $store_storeled_delete->DISC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DISC" class="store_storeled_DISC">
<span<?php echo $store_storeled_delete->DISC->viewAttributes() ?>><?php echo $store_storeled_delete->DISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->TAXP->Visible) { // TAXP ?>
		<td <?php echo $store_storeled_delete->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_TAXP" class="store_storeled_TAXP">
<span<?php echo $store_storeled_delete->TAXP->viewAttributes() ?>><?php echo $store_storeled_delete->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->TAX->Visible) { // TAX ?>
		<td <?php echo $store_storeled_delete->TAX->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_TAX" class="store_storeled_TAX">
<span<?php echo $store_storeled_delete->TAX->viewAttributes() ?>><?php echo $store_storeled_delete->TAX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->TAXR->Visible) { // TAXR ?>
		<td <?php echo $store_storeled_delete->TAXR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_TAXR" class="store_storeled_TAXR">
<span<?php echo $store_storeled_delete->TAXR->viewAttributes() ?>><?php echo $store_storeled_delete->TAXR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DAMT->Visible) { // DAMT ?>
		<td <?php echo $store_storeled_delete->DAMT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DAMT" class="store_storeled_DAMT">
<span<?php echo $store_storeled_delete->DAMT->viewAttributes() ?>><?php echo $store_storeled_delete->DAMT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->EMPNO->Visible) { // EMPNO ?>
		<td <?php echo $store_storeled_delete->EMPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_EMPNO" class="store_storeled_EMPNO">
<span<?php echo $store_storeled_delete->EMPNO->viewAttributes() ?>><?php echo $store_storeled_delete->EMPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PC->Visible) { // PC ?>
		<td <?php echo $store_storeled_delete->PC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PC" class="store_storeled_PC">
<span<?php echo $store_storeled_delete->PC->viewAttributes() ?>><?php echo $store_storeled_delete->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DRNAME->Visible) { // DRNAME ?>
		<td <?php echo $store_storeled_delete->DRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DRNAME" class="store_storeled_DRNAME">
<span<?php echo $store_storeled_delete->DRNAME->viewAttributes() ?>><?php echo $store_storeled_delete->DRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->BTIME->Visible) { // BTIME ?>
		<td <?php echo $store_storeled_delete->BTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_BTIME" class="store_storeled_BTIME">
<span<?php echo $store_storeled_delete->BTIME->viewAttributes() ?>><?php echo $store_storeled_delete->BTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->ONO->Visible) { // ONO ?>
		<td <?php echo $store_storeled_delete->ONO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_ONO" class="store_storeled_ONO">
<span<?php echo $store_storeled_delete->ONO->viewAttributes() ?>><?php echo $store_storeled_delete->ONO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->ODT->Visible) { // ODT ?>
		<td <?php echo $store_storeled_delete->ODT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_ODT" class="store_storeled_ODT">
<span<?php echo $store_storeled_delete->ODT->viewAttributes() ?>><?php echo $store_storeled_delete->ODT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PURRT->Visible) { // PURRT ?>
		<td <?php echo $store_storeled_delete->PURRT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PURRT" class="store_storeled_PURRT">
<span<?php echo $store_storeled_delete->PURRT->viewAttributes() ?>><?php echo $store_storeled_delete->PURRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->GRP->Visible) { // GRP ?>
		<td <?php echo $store_storeled_delete->GRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_GRP" class="store_storeled_GRP">
<span<?php echo $store_storeled_delete->GRP->viewAttributes() ?>><?php echo $store_storeled_delete->GRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->IBATCH->Visible) { // IBATCH ?>
		<td <?php echo $store_storeled_delete->IBATCH->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_IBATCH" class="store_storeled_IBATCH">
<span<?php echo $store_storeled_delete->IBATCH->viewAttributes() ?>><?php echo $store_storeled_delete->IBATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->IPNO->Visible) { // IPNO ?>
		<td <?php echo $store_storeled_delete->IPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_IPNO" class="store_storeled_IPNO">
<span<?php echo $store_storeled_delete->IPNO->viewAttributes() ?>><?php echo $store_storeled_delete->IPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->OPNO->Visible) { // OPNO ?>
		<td <?php echo $store_storeled_delete->OPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_OPNO" class="store_storeled_OPNO">
<span<?php echo $store_storeled_delete->OPNO->viewAttributes() ?>><?php echo $store_storeled_delete->OPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->RECID->Visible) { // RECID ?>
		<td <?php echo $store_storeled_delete->RECID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_RECID" class="store_storeled_RECID">
<span<?php echo $store_storeled_delete->RECID->viewAttributes() ?>><?php echo $store_storeled_delete->RECID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->FQTY->Visible) { // FQTY ?>
		<td <?php echo $store_storeled_delete->FQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_FQTY" class="store_storeled_FQTY">
<span<?php echo $store_storeled_delete->FQTY->viewAttributes() ?>><?php echo $store_storeled_delete->FQTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->UR->Visible) { // UR ?>
		<td <?php echo $store_storeled_delete->UR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_UR" class="store_storeled_UR">
<span<?php echo $store_storeled_delete->UR->viewAttributes() ?>><?php echo $store_storeled_delete->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DCID->Visible) { // DCID ?>
		<td <?php echo $store_storeled_delete->DCID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DCID" class="store_storeled_DCID">
<span<?php echo $store_storeled_delete->DCID->viewAttributes() ?>><?php echo $store_storeled_delete->DCID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->_USERID->Visible) { // USERID ?>
		<td <?php echo $store_storeled_delete->_USERID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled__USERID" class="store_storeled__USERID">
<span<?php echo $store_storeled_delete->_USERID->viewAttributes() ?>><?php echo $store_storeled_delete->_USERID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->MODDT->Visible) { // MODDT ?>
		<td <?php echo $store_storeled_delete->MODDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_MODDT" class="store_storeled_MODDT">
<span<?php echo $store_storeled_delete->MODDT->viewAttributes() ?>><?php echo $store_storeled_delete->MODDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->FYM->Visible) { // FYM ?>
		<td <?php echo $store_storeled_delete->FYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_FYM" class="store_storeled_FYM">
<span<?php echo $store_storeled_delete->FYM->viewAttributes() ?>><?php echo $store_storeled_delete->FYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PRCBATCH->Visible) { // PRCBATCH ?>
		<td <?php echo $store_storeled_delete->PRCBATCH->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH">
<span<?php echo $store_storeled_delete->PRCBATCH->viewAttributes() ?>><?php echo $store_storeled_delete->PRCBATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->SLNO->Visible) { // SLNO ?>
		<td <?php echo $store_storeled_delete->SLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_SLNO" class="store_storeled_SLNO">
<span<?php echo $store_storeled_delete->SLNO->viewAttributes() ?>><?php echo $store_storeled_delete->SLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->MRP->Visible) { // MRP ?>
		<td <?php echo $store_storeled_delete->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_MRP" class="store_storeled_MRP">
<span<?php echo $store_storeled_delete->MRP->viewAttributes() ?>><?php echo $store_storeled_delete->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->BILLYM->Visible) { // BILLYM ?>
		<td <?php echo $store_storeled_delete->BILLYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_BILLYM" class="store_storeled_BILLYM">
<span<?php echo $store_storeled_delete->BILLYM->viewAttributes() ?>><?php echo $store_storeled_delete->BILLYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->BILLGRP->Visible) { // BILLGRP ?>
		<td <?php echo $store_storeled_delete->BILLGRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_BILLGRP" class="store_storeled_BILLGRP">
<span<?php echo $store_storeled_delete->BILLGRP->viewAttributes() ?>><?php echo $store_storeled_delete->BILLGRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->STAFF->Visible) { // STAFF ?>
		<td <?php echo $store_storeled_delete->STAFF->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_STAFF" class="store_storeled_STAFF">
<span<?php echo $store_storeled_delete->STAFF->viewAttributes() ?>><?php echo $store_storeled_delete->STAFF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->TEMPIPNO->Visible) { // TEMPIPNO ?>
		<td <?php echo $store_storeled_delete->TEMPIPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO">
<span<?php echo $store_storeled_delete->TEMPIPNO->viewAttributes() ?>><?php echo $store_storeled_delete->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PRNTED->Visible) { // PRNTED ?>
		<td <?php echo $store_storeled_delete->PRNTED->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PRNTED" class="store_storeled_PRNTED">
<span<?php echo $store_storeled_delete->PRNTED->viewAttributes() ?>><?php echo $store_storeled_delete->PRNTED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PATNAME->Visible) { // PATNAME ?>
		<td <?php echo $store_storeled_delete->PATNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PATNAME" class="store_storeled_PATNAME">
<span<?php echo $store_storeled_delete->PATNAME->viewAttributes() ?>><?php echo $store_storeled_delete->PATNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PJVNO->Visible) { // PJVNO ?>
		<td <?php echo $store_storeled_delete->PJVNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PJVNO" class="store_storeled_PJVNO">
<span<?php echo $store_storeled_delete->PJVNO->viewAttributes() ?>><?php echo $store_storeled_delete->PJVNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PJVSLNO->Visible) { // PJVSLNO ?>
		<td <?php echo $store_storeled_delete->PJVSLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO">
<span<?php echo $store_storeled_delete->PJVSLNO->viewAttributes() ?>><?php echo $store_storeled_delete->PJVSLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->OTHDISC->Visible) { // OTHDISC ?>
		<td <?php echo $store_storeled_delete->OTHDISC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_OTHDISC" class="store_storeled_OTHDISC">
<span<?php echo $store_storeled_delete->OTHDISC->viewAttributes() ?>><?php echo $store_storeled_delete->OTHDISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PJVYM->Visible) { // PJVYM ?>
		<td <?php echo $store_storeled_delete->PJVYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PJVYM" class="store_storeled_PJVYM">
<span<?php echo $store_storeled_delete->PJVYM->viewAttributes() ?>><?php echo $store_storeled_delete->PJVYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PURDISCPER->Visible) { // PURDISCPER ?>
		<td <?php echo $store_storeled_delete->PURDISCPER->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER">
<span<?php echo $store_storeled_delete->PURDISCPER->viewAttributes() ?>><?php echo $store_storeled_delete->PURDISCPER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->CASHIER->Visible) { // CASHIER ?>
		<td <?php echo $store_storeled_delete->CASHIER->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_CASHIER" class="store_storeled_CASHIER">
<span<?php echo $store_storeled_delete->CASHIER->viewAttributes() ?>><?php echo $store_storeled_delete->CASHIER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->CASHTIME->Visible) { // CASHTIME ?>
		<td <?php echo $store_storeled_delete->CASHTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_CASHTIME" class="store_storeled_CASHTIME">
<span<?php echo $store_storeled_delete->CASHTIME->viewAttributes() ?>><?php echo $store_storeled_delete->CASHTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->CASHRECD->Visible) { // CASHRECD ?>
		<td <?php echo $store_storeled_delete->CASHRECD->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_CASHRECD" class="store_storeled_CASHRECD">
<span<?php echo $store_storeled_delete->CASHRECD->viewAttributes() ?>><?php echo $store_storeled_delete->CASHRECD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->CASHREFNO->Visible) { // CASHREFNO ?>
		<td <?php echo $store_storeled_delete->CASHREFNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO">
<span<?php echo $store_storeled_delete->CASHREFNO->viewAttributes() ?>><?php echo $store_storeled_delete->CASHREFNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
		<td <?php echo $store_storeled_delete->CASHIERSHIFT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT">
<span<?php echo $store_storeled_delete->CASHIERSHIFT->viewAttributes() ?>><?php echo $store_storeled_delete->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PRCODE->Visible) { // PRCODE ?>
		<td <?php echo $store_storeled_delete->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PRCODE" class="store_storeled_PRCODE">
<span<?php echo $store_storeled_delete->PRCODE->viewAttributes() ?>><?php echo $store_storeled_delete->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->RELEASEBY->Visible) { // RELEASEBY ?>
		<td <?php echo $store_storeled_delete->RELEASEBY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY">
<span<?php echo $store_storeled_delete->RELEASEBY->viewAttributes() ?>><?php echo $store_storeled_delete->RELEASEBY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->CRAUTHOR->Visible) { // CRAUTHOR ?>
		<td <?php echo $store_storeled_delete->CRAUTHOR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR">
<span<?php echo $store_storeled_delete->CRAUTHOR->viewAttributes() ?>><?php echo $store_storeled_delete->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PAYMENT->Visible) { // PAYMENT ?>
		<td <?php echo $store_storeled_delete->PAYMENT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PAYMENT" class="store_storeled_PAYMENT">
<span<?php echo $store_storeled_delete->PAYMENT->viewAttributes() ?>><?php echo $store_storeled_delete->PAYMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DRID->Visible) { // DRID ?>
		<td <?php echo $store_storeled_delete->DRID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DRID" class="store_storeled_DRID">
<span<?php echo $store_storeled_delete->DRID->viewAttributes() ?>><?php echo $store_storeled_delete->DRID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->WARD->Visible) { // WARD ?>
		<td <?php echo $store_storeled_delete->WARD->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_WARD" class="store_storeled_WARD">
<span<?php echo $store_storeled_delete->WARD->viewAttributes() ?>><?php echo $store_storeled_delete->WARD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->STAXTYPE->Visible) { // STAXTYPE ?>
		<td <?php echo $store_storeled_delete->STAXTYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE">
<span<?php echo $store_storeled_delete->STAXTYPE->viewAttributes() ?>><?php echo $store_storeled_delete->STAXTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PURDISCVAL->Visible) { // PURDISCVAL ?>
		<td <?php echo $store_storeled_delete->PURDISCVAL->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL">
<span<?php echo $store_storeled_delete->PURDISCVAL->viewAttributes() ?>><?php echo $store_storeled_delete->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->RNDOFF->Visible) { // RNDOFF ?>
		<td <?php echo $store_storeled_delete->RNDOFF->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_RNDOFF" class="store_storeled_RNDOFF">
<span<?php echo $store_storeled_delete->RNDOFF->viewAttributes() ?>><?php echo $store_storeled_delete->RNDOFF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DISCONMRP->Visible) { // DISCONMRP ?>
		<td <?php echo $store_storeled_delete->DISCONMRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP">
<span<?php echo $store_storeled_delete->DISCONMRP->viewAttributes() ?>><?php echo $store_storeled_delete->DISCONMRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DELVDT->Visible) { // DELVDT ?>
		<td <?php echo $store_storeled_delete->DELVDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DELVDT" class="store_storeled_DELVDT">
<span<?php echo $store_storeled_delete->DELVDT->viewAttributes() ?>><?php echo $store_storeled_delete->DELVDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DELVTIME->Visible) { // DELVTIME ?>
		<td <?php echo $store_storeled_delete->DELVTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DELVTIME" class="store_storeled_DELVTIME">
<span<?php echo $store_storeled_delete->DELVTIME->viewAttributes() ?>><?php echo $store_storeled_delete->DELVTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->DELVBY->Visible) { // DELVBY ?>
		<td <?php echo $store_storeled_delete->DELVBY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_DELVBY" class="store_storeled_DELVBY">
<span<?php echo $store_storeled_delete->DELVBY->viewAttributes() ?>><?php echo $store_storeled_delete->DELVBY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->HOSPNO->Visible) { // HOSPNO ?>
		<td <?php echo $store_storeled_delete->HOSPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_HOSPNO" class="store_storeled_HOSPNO">
<span<?php echo $store_storeled_delete->HOSPNO->viewAttributes() ?>><?php echo $store_storeled_delete->HOSPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->id->Visible) { // id ?>
		<td <?php echo $store_storeled_delete->id->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_id" class="store_storeled_id">
<span<?php echo $store_storeled_delete->id->viewAttributes() ?>><?php echo $store_storeled_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->pbv->Visible) { // pbv ?>
		<td <?php echo $store_storeled_delete->pbv->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_pbv" class="store_storeled_pbv">
<span<?php echo $store_storeled_delete->pbv->viewAttributes() ?>><?php echo $store_storeled_delete->pbv->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->pbt->Visible) { // pbt ?>
		<td <?php echo $store_storeled_delete->pbt->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_pbt" class="store_storeled_pbt">
<span<?php echo $store_storeled_delete->pbt->viewAttributes() ?>><?php echo $store_storeled_delete->pbt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->SiNo->Visible) { // SiNo ?>
		<td <?php echo $store_storeled_delete->SiNo->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_SiNo" class="store_storeled_SiNo">
<span<?php echo $store_storeled_delete->SiNo->viewAttributes() ?>><?php echo $store_storeled_delete->SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->Product->Visible) { // Product ?>
		<td <?php echo $store_storeled_delete->Product->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_Product" class="store_storeled_Product">
<span<?php echo $store_storeled_delete->Product->viewAttributes() ?>><?php echo $store_storeled_delete->Product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->Mfg->Visible) { // Mfg ?>
		<td <?php echo $store_storeled_delete->Mfg->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_Mfg" class="store_storeled_Mfg">
<span<?php echo $store_storeled_delete->Mfg->viewAttributes() ?>><?php echo $store_storeled_delete->Mfg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->HosoID->Visible) { // HosoID ?>
		<td <?php echo $store_storeled_delete->HosoID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_HosoID" class="store_storeled_HosoID">
<span<?php echo $store_storeled_delete->HosoID->viewAttributes() ?>><?php echo $store_storeled_delete->HosoID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $store_storeled_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_createdby" class="store_storeled_createdby">
<span<?php echo $store_storeled_delete->createdby->viewAttributes() ?>><?php echo $store_storeled_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $store_storeled_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_createddatetime" class="store_storeled_createddatetime">
<span<?php echo $store_storeled_delete->createddatetime->viewAttributes() ?>><?php echo $store_storeled_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $store_storeled_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_modifiedby" class="store_storeled_modifiedby">
<span<?php echo $store_storeled_delete->modifiedby->viewAttributes() ?>><?php echo $store_storeled_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $store_storeled_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime">
<span<?php echo $store_storeled_delete->modifieddatetime->viewAttributes() ?>><?php echo $store_storeled_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->MFRCODE->Visible) { // MFRCODE ?>
		<td <?php echo $store_storeled_delete->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_MFRCODE" class="store_storeled_MFRCODE">
<span<?php echo $store_storeled_delete->MFRCODE->viewAttributes() ?>><?php echo $store_storeled_delete->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $store_storeled_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_Reception" class="store_storeled_Reception">
<span<?php echo $store_storeled_delete->Reception->viewAttributes() ?>><?php echo $store_storeled_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->PatID->Visible) { // PatID ?>
		<td <?php echo $store_storeled_delete->PatID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_PatID" class="store_storeled_PatID">
<span<?php echo $store_storeled_delete->PatID->viewAttributes() ?>><?php echo $store_storeled_delete->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $store_storeled_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_mrnno" class="store_storeled_mrnno">
<span<?php echo $store_storeled_delete->mrnno->viewAttributes() ?>><?php echo $store_storeled_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled_delete->BRNAME->Visible) { // BRNAME ?>
		<td <?php echo $store_storeled_delete->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCount ?>_store_storeled_BRNAME" class="store_storeled_BRNAME">
<span<?php echo $store_storeled_delete->BRNAME->viewAttributes() ?>><?php echo $store_storeled_delete->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$store_storeled_delete->Recordset->moveNext();
}
$store_storeled_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_storeled_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$store_storeled_delete->showPageFooter();
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
$store_storeled_delete->terminate();
?>