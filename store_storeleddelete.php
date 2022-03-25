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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fstore_storeleddelete = currentForm = new ew.Form("fstore_storeleddelete", "delete");

// Form_CustomValidate event
fstore_storeleddelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_storeleddelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_storeled_delete->showPageHeader(); ?>
<?php
$store_storeled_delete->showMessage();
?>
<form name="fstore_storeleddelete" id="fstore_storeleddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_storeled_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_storeled_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storeled">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_storeled_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_storeled->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $store_storeled->BRCODE->headerCellClass() ?>"><span id="elh_store_storeled_BRCODE" class="store_storeled_BRCODE"><?php echo $store_storeled->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->TYPE->Visible) { // TYPE ?>
		<th class="<?php echo $store_storeled->TYPE->headerCellClass() ?>"><span id="elh_store_storeled_TYPE" class="store_storeled_TYPE"><?php echo $store_storeled->TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DN->Visible) { // DN ?>
		<th class="<?php echo $store_storeled->DN->headerCellClass() ?>"><span id="elh_store_storeled_DN" class="store_storeled_DN"><?php echo $store_storeled->DN->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->RDN->Visible) { // RDN ?>
		<th class="<?php echo $store_storeled->RDN->headerCellClass() ?>"><span id="elh_store_storeled_RDN" class="store_storeled_RDN"><?php echo $store_storeled->RDN->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DT->Visible) { // DT ?>
		<th class="<?php echo $store_storeled->DT->headerCellClass() ?>"><span id="elh_store_storeled_DT" class="store_storeled_DT"><?php echo $store_storeled->DT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PRC->Visible) { // PRC ?>
		<th class="<?php echo $store_storeled->PRC->headerCellClass() ?>"><span id="elh_store_storeled_PRC" class="store_storeled_PRC"><?php echo $store_storeled->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->OQ->Visible) { // OQ ?>
		<th class="<?php echo $store_storeled->OQ->headerCellClass() ?>"><span id="elh_store_storeled_OQ" class="store_storeled_OQ"><?php echo $store_storeled->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->RQ->Visible) { // RQ ?>
		<th class="<?php echo $store_storeled->RQ->headerCellClass() ?>"><span id="elh_store_storeled_RQ" class="store_storeled_RQ"><?php echo $store_storeled->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $store_storeled->MRQ->headerCellClass() ?>"><span id="elh_store_storeled_MRQ" class="store_storeled_MRQ"><?php echo $store_storeled->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->IQ->Visible) { // IQ ?>
		<th class="<?php echo $store_storeled->IQ->headerCellClass() ?>"><span id="elh_store_storeled_IQ" class="store_storeled_IQ"><?php echo $store_storeled->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $store_storeled->BATCHNO->headerCellClass() ?>"><span id="elh_store_storeled_BATCHNO" class="store_storeled_BATCHNO"><?php echo $store_storeled->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $store_storeled->EXPDT->headerCellClass() ?>"><span id="elh_store_storeled_EXPDT" class="store_storeled_EXPDT"><?php echo $store_storeled->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->BILLNO->Visible) { // BILLNO ?>
		<th class="<?php echo $store_storeled->BILLNO->headerCellClass() ?>"><span id="elh_store_storeled_BILLNO" class="store_storeled_BILLNO"><?php echo $store_storeled->BILLNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->BILLDT->Visible) { // BILLDT ?>
		<th class="<?php echo $store_storeled->BILLDT->headerCellClass() ?>"><span id="elh_store_storeled_BILLDT" class="store_storeled_BILLDT"><?php echo $store_storeled->BILLDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->RT->Visible) { // RT ?>
		<th class="<?php echo $store_storeled->RT->headerCellClass() ?>"><span id="elh_store_storeled_RT" class="store_storeled_RT"><?php echo $store_storeled->RT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->VALUE->Visible) { // VALUE ?>
		<th class="<?php echo $store_storeled->VALUE->headerCellClass() ?>"><span id="elh_store_storeled_VALUE" class="store_storeled_VALUE"><?php echo $store_storeled->VALUE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DISC->Visible) { // DISC ?>
		<th class="<?php echo $store_storeled->DISC->headerCellClass() ?>"><span id="elh_store_storeled_DISC" class="store_storeled_DISC"><?php echo $store_storeled->DISC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->TAXP->Visible) { // TAXP ?>
		<th class="<?php echo $store_storeled->TAXP->headerCellClass() ?>"><span id="elh_store_storeled_TAXP" class="store_storeled_TAXP"><?php echo $store_storeled->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->TAX->Visible) { // TAX ?>
		<th class="<?php echo $store_storeled->TAX->headerCellClass() ?>"><span id="elh_store_storeled_TAX" class="store_storeled_TAX"><?php echo $store_storeled->TAX->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->TAXR->Visible) { // TAXR ?>
		<th class="<?php echo $store_storeled->TAXR->headerCellClass() ?>"><span id="elh_store_storeled_TAXR" class="store_storeled_TAXR"><?php echo $store_storeled->TAXR->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DAMT->Visible) { // DAMT ?>
		<th class="<?php echo $store_storeled->DAMT->headerCellClass() ?>"><span id="elh_store_storeled_DAMT" class="store_storeled_DAMT"><?php echo $store_storeled->DAMT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->EMPNO->Visible) { // EMPNO ?>
		<th class="<?php echo $store_storeled->EMPNO->headerCellClass() ?>"><span id="elh_store_storeled_EMPNO" class="store_storeled_EMPNO"><?php echo $store_storeled->EMPNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PC->Visible) { // PC ?>
		<th class="<?php echo $store_storeled->PC->headerCellClass() ?>"><span id="elh_store_storeled_PC" class="store_storeled_PC"><?php echo $store_storeled->PC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DRNAME->Visible) { // DRNAME ?>
		<th class="<?php echo $store_storeled->DRNAME->headerCellClass() ?>"><span id="elh_store_storeled_DRNAME" class="store_storeled_DRNAME"><?php echo $store_storeled->DRNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->BTIME->Visible) { // BTIME ?>
		<th class="<?php echo $store_storeled->BTIME->headerCellClass() ?>"><span id="elh_store_storeled_BTIME" class="store_storeled_BTIME"><?php echo $store_storeled->BTIME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->ONO->Visible) { // ONO ?>
		<th class="<?php echo $store_storeled->ONO->headerCellClass() ?>"><span id="elh_store_storeled_ONO" class="store_storeled_ONO"><?php echo $store_storeled->ONO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->ODT->Visible) { // ODT ?>
		<th class="<?php echo $store_storeled->ODT->headerCellClass() ?>"><span id="elh_store_storeled_ODT" class="store_storeled_ODT"><?php echo $store_storeled->ODT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PURRT->Visible) { // PURRT ?>
		<th class="<?php echo $store_storeled->PURRT->headerCellClass() ?>"><span id="elh_store_storeled_PURRT" class="store_storeled_PURRT"><?php echo $store_storeled->PURRT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->GRP->Visible) { // GRP ?>
		<th class="<?php echo $store_storeled->GRP->headerCellClass() ?>"><span id="elh_store_storeled_GRP" class="store_storeled_GRP"><?php echo $store_storeled->GRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->IBATCH->Visible) { // IBATCH ?>
		<th class="<?php echo $store_storeled->IBATCH->headerCellClass() ?>"><span id="elh_store_storeled_IBATCH" class="store_storeled_IBATCH"><?php echo $store_storeled->IBATCH->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->IPNO->Visible) { // IPNO ?>
		<th class="<?php echo $store_storeled->IPNO->headerCellClass() ?>"><span id="elh_store_storeled_IPNO" class="store_storeled_IPNO"><?php echo $store_storeled->IPNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->OPNO->Visible) { // OPNO ?>
		<th class="<?php echo $store_storeled->OPNO->headerCellClass() ?>"><span id="elh_store_storeled_OPNO" class="store_storeled_OPNO"><?php echo $store_storeled->OPNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->RECID->Visible) { // RECID ?>
		<th class="<?php echo $store_storeled->RECID->headerCellClass() ?>"><span id="elh_store_storeled_RECID" class="store_storeled_RECID"><?php echo $store_storeled->RECID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->FQTY->Visible) { // FQTY ?>
		<th class="<?php echo $store_storeled->FQTY->headerCellClass() ?>"><span id="elh_store_storeled_FQTY" class="store_storeled_FQTY"><?php echo $store_storeled->FQTY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->UR->Visible) { // UR ?>
		<th class="<?php echo $store_storeled->UR->headerCellClass() ?>"><span id="elh_store_storeled_UR" class="store_storeled_UR"><?php echo $store_storeled->UR->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DCID->Visible) { // DCID ?>
		<th class="<?php echo $store_storeled->DCID->headerCellClass() ?>"><span id="elh_store_storeled_DCID" class="store_storeled_DCID"><?php echo $store_storeled->DCID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->_USERID->Visible) { // USERID ?>
		<th class="<?php echo $store_storeled->_USERID->headerCellClass() ?>"><span id="elh_store_storeled__USERID" class="store_storeled__USERID"><?php echo $store_storeled->_USERID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->MODDT->Visible) { // MODDT ?>
		<th class="<?php echo $store_storeled->MODDT->headerCellClass() ?>"><span id="elh_store_storeled_MODDT" class="store_storeled_MODDT"><?php echo $store_storeled->MODDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->FYM->Visible) { // FYM ?>
		<th class="<?php echo $store_storeled->FYM->headerCellClass() ?>"><span id="elh_store_storeled_FYM" class="store_storeled_FYM"><?php echo $store_storeled->FYM->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PRCBATCH->Visible) { // PRCBATCH ?>
		<th class="<?php echo $store_storeled->PRCBATCH->headerCellClass() ?>"><span id="elh_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH"><?php echo $store_storeled->PRCBATCH->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->SLNO->Visible) { // SLNO ?>
		<th class="<?php echo $store_storeled->SLNO->headerCellClass() ?>"><span id="elh_store_storeled_SLNO" class="store_storeled_SLNO"><?php echo $store_storeled->SLNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->MRP->Visible) { // MRP ?>
		<th class="<?php echo $store_storeled->MRP->headerCellClass() ?>"><span id="elh_store_storeled_MRP" class="store_storeled_MRP"><?php echo $store_storeled->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->BILLYM->Visible) { // BILLYM ?>
		<th class="<?php echo $store_storeled->BILLYM->headerCellClass() ?>"><span id="elh_store_storeled_BILLYM" class="store_storeled_BILLYM"><?php echo $store_storeled->BILLYM->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->BILLGRP->Visible) { // BILLGRP ?>
		<th class="<?php echo $store_storeled->BILLGRP->headerCellClass() ?>"><span id="elh_store_storeled_BILLGRP" class="store_storeled_BILLGRP"><?php echo $store_storeled->BILLGRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->STAFF->Visible) { // STAFF ?>
		<th class="<?php echo $store_storeled->STAFF->headerCellClass() ?>"><span id="elh_store_storeled_STAFF" class="store_storeled_STAFF"><?php echo $store_storeled->STAFF->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->TEMPIPNO->Visible) { // TEMPIPNO ?>
		<th class="<?php echo $store_storeled->TEMPIPNO->headerCellClass() ?>"><span id="elh_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO"><?php echo $store_storeled->TEMPIPNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PRNTED->Visible) { // PRNTED ?>
		<th class="<?php echo $store_storeled->PRNTED->headerCellClass() ?>"><span id="elh_store_storeled_PRNTED" class="store_storeled_PRNTED"><?php echo $store_storeled->PRNTED->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PATNAME->Visible) { // PATNAME ?>
		<th class="<?php echo $store_storeled->PATNAME->headerCellClass() ?>"><span id="elh_store_storeled_PATNAME" class="store_storeled_PATNAME"><?php echo $store_storeled->PATNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PJVNO->Visible) { // PJVNO ?>
		<th class="<?php echo $store_storeled->PJVNO->headerCellClass() ?>"><span id="elh_store_storeled_PJVNO" class="store_storeled_PJVNO"><?php echo $store_storeled->PJVNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PJVSLNO->Visible) { // PJVSLNO ?>
		<th class="<?php echo $store_storeled->PJVSLNO->headerCellClass() ?>"><span id="elh_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO"><?php echo $store_storeled->PJVSLNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->OTHDISC->Visible) { // OTHDISC ?>
		<th class="<?php echo $store_storeled->OTHDISC->headerCellClass() ?>"><span id="elh_store_storeled_OTHDISC" class="store_storeled_OTHDISC"><?php echo $store_storeled->OTHDISC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PJVYM->Visible) { // PJVYM ?>
		<th class="<?php echo $store_storeled->PJVYM->headerCellClass() ?>"><span id="elh_store_storeled_PJVYM" class="store_storeled_PJVYM"><?php echo $store_storeled->PJVYM->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PURDISCPER->Visible) { // PURDISCPER ?>
		<th class="<?php echo $store_storeled->PURDISCPER->headerCellClass() ?>"><span id="elh_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER"><?php echo $store_storeled->PURDISCPER->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->CASHIER->Visible) { // CASHIER ?>
		<th class="<?php echo $store_storeled->CASHIER->headerCellClass() ?>"><span id="elh_store_storeled_CASHIER" class="store_storeled_CASHIER"><?php echo $store_storeled->CASHIER->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->CASHTIME->Visible) { // CASHTIME ?>
		<th class="<?php echo $store_storeled->CASHTIME->headerCellClass() ?>"><span id="elh_store_storeled_CASHTIME" class="store_storeled_CASHTIME"><?php echo $store_storeled->CASHTIME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->CASHRECD->Visible) { // CASHRECD ?>
		<th class="<?php echo $store_storeled->CASHRECD->headerCellClass() ?>"><span id="elh_store_storeled_CASHRECD" class="store_storeled_CASHRECD"><?php echo $store_storeled->CASHRECD->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->CASHREFNO->Visible) { // CASHREFNO ?>
		<th class="<?php echo $store_storeled->CASHREFNO->headerCellClass() ?>"><span id="elh_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO"><?php echo $store_storeled->CASHREFNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
		<th class="<?php echo $store_storeled->CASHIERSHIFT->headerCellClass() ?>"><span id="elh_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT"><?php echo $store_storeled->CASHIERSHIFT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PRCODE->Visible) { // PRCODE ?>
		<th class="<?php echo $store_storeled->PRCODE->headerCellClass() ?>"><span id="elh_store_storeled_PRCODE" class="store_storeled_PRCODE"><?php echo $store_storeled->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->RELEASEBY->Visible) { // RELEASEBY ?>
		<th class="<?php echo $store_storeled->RELEASEBY->headerCellClass() ?>"><span id="elh_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY"><?php echo $store_storeled->RELEASEBY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->CRAUTHOR->Visible) { // CRAUTHOR ?>
		<th class="<?php echo $store_storeled->CRAUTHOR->headerCellClass() ?>"><span id="elh_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR"><?php echo $store_storeled->CRAUTHOR->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PAYMENT->Visible) { // PAYMENT ?>
		<th class="<?php echo $store_storeled->PAYMENT->headerCellClass() ?>"><span id="elh_store_storeled_PAYMENT" class="store_storeled_PAYMENT"><?php echo $store_storeled->PAYMENT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DRID->Visible) { // DRID ?>
		<th class="<?php echo $store_storeled->DRID->headerCellClass() ?>"><span id="elh_store_storeled_DRID" class="store_storeled_DRID"><?php echo $store_storeled->DRID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->WARD->Visible) { // WARD ?>
		<th class="<?php echo $store_storeled->WARD->headerCellClass() ?>"><span id="elh_store_storeled_WARD" class="store_storeled_WARD"><?php echo $store_storeled->WARD->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->STAXTYPE->Visible) { // STAXTYPE ?>
		<th class="<?php echo $store_storeled->STAXTYPE->headerCellClass() ?>"><span id="elh_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE"><?php echo $store_storeled->STAXTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PURDISCVAL->Visible) { // PURDISCVAL ?>
		<th class="<?php echo $store_storeled->PURDISCVAL->headerCellClass() ?>"><span id="elh_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL"><?php echo $store_storeled->PURDISCVAL->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->RNDOFF->Visible) { // RNDOFF ?>
		<th class="<?php echo $store_storeled->RNDOFF->headerCellClass() ?>"><span id="elh_store_storeled_RNDOFF" class="store_storeled_RNDOFF"><?php echo $store_storeled->RNDOFF->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DISCONMRP->Visible) { // DISCONMRP ?>
		<th class="<?php echo $store_storeled->DISCONMRP->headerCellClass() ?>"><span id="elh_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP"><?php echo $store_storeled->DISCONMRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DELVDT->Visible) { // DELVDT ?>
		<th class="<?php echo $store_storeled->DELVDT->headerCellClass() ?>"><span id="elh_store_storeled_DELVDT" class="store_storeled_DELVDT"><?php echo $store_storeled->DELVDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DELVTIME->Visible) { // DELVTIME ?>
		<th class="<?php echo $store_storeled->DELVTIME->headerCellClass() ?>"><span id="elh_store_storeled_DELVTIME" class="store_storeled_DELVTIME"><?php echo $store_storeled->DELVTIME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->DELVBY->Visible) { // DELVBY ?>
		<th class="<?php echo $store_storeled->DELVBY->headerCellClass() ?>"><span id="elh_store_storeled_DELVBY" class="store_storeled_DELVBY"><?php echo $store_storeled->DELVBY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->HOSPNO->Visible) { // HOSPNO ?>
		<th class="<?php echo $store_storeled->HOSPNO->headerCellClass() ?>"><span id="elh_store_storeled_HOSPNO" class="store_storeled_HOSPNO"><?php echo $store_storeled->HOSPNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->id->Visible) { // id ?>
		<th class="<?php echo $store_storeled->id->headerCellClass() ?>"><span id="elh_store_storeled_id" class="store_storeled_id"><?php echo $store_storeled->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->pbv->Visible) { // pbv ?>
		<th class="<?php echo $store_storeled->pbv->headerCellClass() ?>"><span id="elh_store_storeled_pbv" class="store_storeled_pbv"><?php echo $store_storeled->pbv->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->pbt->Visible) { // pbt ?>
		<th class="<?php echo $store_storeled->pbt->headerCellClass() ?>"><span id="elh_store_storeled_pbt" class="store_storeled_pbt"><?php echo $store_storeled->pbt->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->SiNo->Visible) { // SiNo ?>
		<th class="<?php echo $store_storeled->SiNo->headerCellClass() ?>"><span id="elh_store_storeled_SiNo" class="store_storeled_SiNo"><?php echo $store_storeled->SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->Product->Visible) { // Product ?>
		<th class="<?php echo $store_storeled->Product->headerCellClass() ?>"><span id="elh_store_storeled_Product" class="store_storeled_Product"><?php echo $store_storeled->Product->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->Mfg->Visible) { // Mfg ?>
		<th class="<?php echo $store_storeled->Mfg->headerCellClass() ?>"><span id="elh_store_storeled_Mfg" class="store_storeled_Mfg"><?php echo $store_storeled->Mfg->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->HosoID->Visible) { // HosoID ?>
		<th class="<?php echo $store_storeled->HosoID->headerCellClass() ?>"><span id="elh_store_storeled_HosoID" class="store_storeled_HosoID"><?php echo $store_storeled->HosoID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->createdby->Visible) { // createdby ?>
		<th class="<?php echo $store_storeled->createdby->headerCellClass() ?>"><span id="elh_store_storeled_createdby" class="store_storeled_createdby"><?php echo $store_storeled->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $store_storeled->createddatetime->headerCellClass() ?>"><span id="elh_store_storeled_createddatetime" class="store_storeled_createddatetime"><?php echo $store_storeled->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $store_storeled->modifiedby->headerCellClass() ?>"><span id="elh_store_storeled_modifiedby" class="store_storeled_modifiedby"><?php echo $store_storeled->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $store_storeled->modifieddatetime->headerCellClass() ?>"><span id="elh_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime"><?php echo $store_storeled->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $store_storeled->MFRCODE->headerCellClass() ?>"><span id="elh_store_storeled_MFRCODE" class="store_storeled_MFRCODE"><?php echo $store_storeled->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->Reception->Visible) { // Reception ?>
		<th class="<?php echo $store_storeled->Reception->headerCellClass() ?>"><span id="elh_store_storeled_Reception" class="store_storeled_Reception"><?php echo $store_storeled->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->PatID->Visible) { // PatID ?>
		<th class="<?php echo $store_storeled->PatID->headerCellClass() ?>"><span id="elh_store_storeled_PatID" class="store_storeled_PatID"><?php echo $store_storeled->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $store_storeled->mrnno->headerCellClass() ?>"><span id="elh_store_storeled_mrnno" class="store_storeled_mrnno"><?php echo $store_storeled->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->BRNAME->Visible) { // BRNAME ?>
		<th class="<?php echo $store_storeled->BRNAME->headerCellClass() ?>"><span id="elh_store_storeled_BRNAME" class="store_storeled_BRNAME"><?php echo $store_storeled->BRNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storeled->StoreID->Visible) { // StoreID ?>
		<th class="<?php echo $store_storeled->StoreID->headerCellClass() ?>"><span id="elh_store_storeled_StoreID" class="store_storeled_StoreID"><?php echo $store_storeled->StoreID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_storeled_delete->RecCnt = 0;
$i = 0;
while (!$store_storeled_delete->Recordset->EOF) {
	$store_storeled_delete->RecCnt++;
	$store_storeled_delete->RowCnt++;

	// Set row properties
	$store_storeled->resetAttributes();
	$store_storeled->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_storeled_delete->loadRowValues($store_storeled_delete->Recordset);

	// Render row
	$store_storeled_delete->renderRow();
?>
	<tr<?php echo $store_storeled->rowAttributes() ?>>
<?php if ($store_storeled->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $store_storeled->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_BRCODE" class="store_storeled_BRCODE">
<span<?php echo $store_storeled->BRCODE->viewAttributes() ?>>
<?php echo $store_storeled->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->TYPE->Visible) { // TYPE ?>
		<td<?php echo $store_storeled->TYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_TYPE" class="store_storeled_TYPE">
<span<?php echo $store_storeled->TYPE->viewAttributes() ?>>
<?php echo $store_storeled->TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DN->Visible) { // DN ?>
		<td<?php echo $store_storeled->DN->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DN" class="store_storeled_DN">
<span<?php echo $store_storeled->DN->viewAttributes() ?>>
<?php echo $store_storeled->DN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->RDN->Visible) { // RDN ?>
		<td<?php echo $store_storeled->RDN->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_RDN" class="store_storeled_RDN">
<span<?php echo $store_storeled->RDN->viewAttributes() ?>>
<?php echo $store_storeled->RDN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DT->Visible) { // DT ?>
		<td<?php echo $store_storeled->DT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DT" class="store_storeled_DT">
<span<?php echo $store_storeled->DT->viewAttributes() ?>>
<?php echo $store_storeled->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PRC->Visible) { // PRC ?>
		<td<?php echo $store_storeled->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PRC" class="store_storeled_PRC">
<span<?php echo $store_storeled->PRC->viewAttributes() ?>>
<?php echo $store_storeled->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->OQ->Visible) { // OQ ?>
		<td<?php echo $store_storeled->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_OQ" class="store_storeled_OQ">
<span<?php echo $store_storeled->OQ->viewAttributes() ?>>
<?php echo $store_storeled->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->RQ->Visible) { // RQ ?>
		<td<?php echo $store_storeled->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_RQ" class="store_storeled_RQ">
<span<?php echo $store_storeled->RQ->viewAttributes() ?>>
<?php echo $store_storeled->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->MRQ->Visible) { // MRQ ?>
		<td<?php echo $store_storeled->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_MRQ" class="store_storeled_MRQ">
<span<?php echo $store_storeled->MRQ->viewAttributes() ?>>
<?php echo $store_storeled->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->IQ->Visible) { // IQ ?>
		<td<?php echo $store_storeled->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_IQ" class="store_storeled_IQ">
<span<?php echo $store_storeled->IQ->viewAttributes() ?>>
<?php echo $store_storeled->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->BATCHNO->Visible) { // BATCHNO ?>
		<td<?php echo $store_storeled->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_BATCHNO" class="store_storeled_BATCHNO">
<span<?php echo $store_storeled->BATCHNO->viewAttributes() ?>>
<?php echo $store_storeled->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->EXPDT->Visible) { // EXPDT ?>
		<td<?php echo $store_storeled->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_EXPDT" class="store_storeled_EXPDT">
<span<?php echo $store_storeled->EXPDT->viewAttributes() ?>>
<?php echo $store_storeled->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->BILLNO->Visible) { // BILLNO ?>
		<td<?php echo $store_storeled->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_BILLNO" class="store_storeled_BILLNO">
<span<?php echo $store_storeled->BILLNO->viewAttributes() ?>>
<?php echo $store_storeled->BILLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->BILLDT->Visible) { // BILLDT ?>
		<td<?php echo $store_storeled->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_BILLDT" class="store_storeled_BILLDT">
<span<?php echo $store_storeled->BILLDT->viewAttributes() ?>>
<?php echo $store_storeled->BILLDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->RT->Visible) { // RT ?>
		<td<?php echo $store_storeled->RT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_RT" class="store_storeled_RT">
<span<?php echo $store_storeled->RT->viewAttributes() ?>>
<?php echo $store_storeled->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->VALUE->Visible) { // VALUE ?>
		<td<?php echo $store_storeled->VALUE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_VALUE" class="store_storeled_VALUE">
<span<?php echo $store_storeled->VALUE->viewAttributes() ?>>
<?php echo $store_storeled->VALUE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DISC->Visible) { // DISC ?>
		<td<?php echo $store_storeled->DISC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DISC" class="store_storeled_DISC">
<span<?php echo $store_storeled->DISC->viewAttributes() ?>>
<?php echo $store_storeled->DISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->TAXP->Visible) { // TAXP ?>
		<td<?php echo $store_storeled->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_TAXP" class="store_storeled_TAXP">
<span<?php echo $store_storeled->TAXP->viewAttributes() ?>>
<?php echo $store_storeled->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->TAX->Visible) { // TAX ?>
		<td<?php echo $store_storeled->TAX->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_TAX" class="store_storeled_TAX">
<span<?php echo $store_storeled->TAX->viewAttributes() ?>>
<?php echo $store_storeled->TAX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->TAXR->Visible) { // TAXR ?>
		<td<?php echo $store_storeled->TAXR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_TAXR" class="store_storeled_TAXR">
<span<?php echo $store_storeled->TAXR->viewAttributes() ?>>
<?php echo $store_storeled->TAXR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DAMT->Visible) { // DAMT ?>
		<td<?php echo $store_storeled->DAMT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DAMT" class="store_storeled_DAMT">
<span<?php echo $store_storeled->DAMT->viewAttributes() ?>>
<?php echo $store_storeled->DAMT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->EMPNO->Visible) { // EMPNO ?>
		<td<?php echo $store_storeled->EMPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_EMPNO" class="store_storeled_EMPNO">
<span<?php echo $store_storeled->EMPNO->viewAttributes() ?>>
<?php echo $store_storeled->EMPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PC->Visible) { // PC ?>
		<td<?php echo $store_storeled->PC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PC" class="store_storeled_PC">
<span<?php echo $store_storeled->PC->viewAttributes() ?>>
<?php echo $store_storeled->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DRNAME->Visible) { // DRNAME ?>
		<td<?php echo $store_storeled->DRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DRNAME" class="store_storeled_DRNAME">
<span<?php echo $store_storeled->DRNAME->viewAttributes() ?>>
<?php echo $store_storeled->DRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->BTIME->Visible) { // BTIME ?>
		<td<?php echo $store_storeled->BTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_BTIME" class="store_storeled_BTIME">
<span<?php echo $store_storeled->BTIME->viewAttributes() ?>>
<?php echo $store_storeled->BTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->ONO->Visible) { // ONO ?>
		<td<?php echo $store_storeled->ONO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_ONO" class="store_storeled_ONO">
<span<?php echo $store_storeled->ONO->viewAttributes() ?>>
<?php echo $store_storeled->ONO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->ODT->Visible) { // ODT ?>
		<td<?php echo $store_storeled->ODT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_ODT" class="store_storeled_ODT">
<span<?php echo $store_storeled->ODT->viewAttributes() ?>>
<?php echo $store_storeled->ODT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PURRT->Visible) { // PURRT ?>
		<td<?php echo $store_storeled->PURRT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PURRT" class="store_storeled_PURRT">
<span<?php echo $store_storeled->PURRT->viewAttributes() ?>>
<?php echo $store_storeled->PURRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->GRP->Visible) { // GRP ?>
		<td<?php echo $store_storeled->GRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_GRP" class="store_storeled_GRP">
<span<?php echo $store_storeled->GRP->viewAttributes() ?>>
<?php echo $store_storeled->GRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->IBATCH->Visible) { // IBATCH ?>
		<td<?php echo $store_storeled->IBATCH->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_IBATCH" class="store_storeled_IBATCH">
<span<?php echo $store_storeled->IBATCH->viewAttributes() ?>>
<?php echo $store_storeled->IBATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->IPNO->Visible) { // IPNO ?>
		<td<?php echo $store_storeled->IPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_IPNO" class="store_storeled_IPNO">
<span<?php echo $store_storeled->IPNO->viewAttributes() ?>>
<?php echo $store_storeled->IPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->OPNO->Visible) { // OPNO ?>
		<td<?php echo $store_storeled->OPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_OPNO" class="store_storeled_OPNO">
<span<?php echo $store_storeled->OPNO->viewAttributes() ?>>
<?php echo $store_storeled->OPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->RECID->Visible) { // RECID ?>
		<td<?php echo $store_storeled->RECID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_RECID" class="store_storeled_RECID">
<span<?php echo $store_storeled->RECID->viewAttributes() ?>>
<?php echo $store_storeled->RECID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->FQTY->Visible) { // FQTY ?>
		<td<?php echo $store_storeled->FQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_FQTY" class="store_storeled_FQTY">
<span<?php echo $store_storeled->FQTY->viewAttributes() ?>>
<?php echo $store_storeled->FQTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->UR->Visible) { // UR ?>
		<td<?php echo $store_storeled->UR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_UR" class="store_storeled_UR">
<span<?php echo $store_storeled->UR->viewAttributes() ?>>
<?php echo $store_storeled->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DCID->Visible) { // DCID ?>
		<td<?php echo $store_storeled->DCID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DCID" class="store_storeled_DCID">
<span<?php echo $store_storeled->DCID->viewAttributes() ?>>
<?php echo $store_storeled->DCID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->_USERID->Visible) { // USERID ?>
		<td<?php echo $store_storeled->_USERID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled__USERID" class="store_storeled__USERID">
<span<?php echo $store_storeled->_USERID->viewAttributes() ?>>
<?php echo $store_storeled->_USERID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->MODDT->Visible) { // MODDT ?>
		<td<?php echo $store_storeled->MODDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_MODDT" class="store_storeled_MODDT">
<span<?php echo $store_storeled->MODDT->viewAttributes() ?>>
<?php echo $store_storeled->MODDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->FYM->Visible) { // FYM ?>
		<td<?php echo $store_storeled->FYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_FYM" class="store_storeled_FYM">
<span<?php echo $store_storeled->FYM->viewAttributes() ?>>
<?php echo $store_storeled->FYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PRCBATCH->Visible) { // PRCBATCH ?>
		<td<?php echo $store_storeled->PRCBATCH->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH">
<span<?php echo $store_storeled->PRCBATCH->viewAttributes() ?>>
<?php echo $store_storeled->PRCBATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->SLNO->Visible) { // SLNO ?>
		<td<?php echo $store_storeled->SLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_SLNO" class="store_storeled_SLNO">
<span<?php echo $store_storeled->SLNO->viewAttributes() ?>>
<?php echo $store_storeled->SLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->MRP->Visible) { // MRP ?>
		<td<?php echo $store_storeled->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_MRP" class="store_storeled_MRP">
<span<?php echo $store_storeled->MRP->viewAttributes() ?>>
<?php echo $store_storeled->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->BILLYM->Visible) { // BILLYM ?>
		<td<?php echo $store_storeled->BILLYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_BILLYM" class="store_storeled_BILLYM">
<span<?php echo $store_storeled->BILLYM->viewAttributes() ?>>
<?php echo $store_storeled->BILLYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->BILLGRP->Visible) { // BILLGRP ?>
		<td<?php echo $store_storeled->BILLGRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_BILLGRP" class="store_storeled_BILLGRP">
<span<?php echo $store_storeled->BILLGRP->viewAttributes() ?>>
<?php echo $store_storeled->BILLGRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->STAFF->Visible) { // STAFF ?>
		<td<?php echo $store_storeled->STAFF->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_STAFF" class="store_storeled_STAFF">
<span<?php echo $store_storeled->STAFF->viewAttributes() ?>>
<?php echo $store_storeled->STAFF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->TEMPIPNO->Visible) { // TEMPIPNO ?>
		<td<?php echo $store_storeled->TEMPIPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO">
<span<?php echo $store_storeled->TEMPIPNO->viewAttributes() ?>>
<?php echo $store_storeled->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PRNTED->Visible) { // PRNTED ?>
		<td<?php echo $store_storeled->PRNTED->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PRNTED" class="store_storeled_PRNTED">
<span<?php echo $store_storeled->PRNTED->viewAttributes() ?>>
<?php echo $store_storeled->PRNTED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PATNAME->Visible) { // PATNAME ?>
		<td<?php echo $store_storeled->PATNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PATNAME" class="store_storeled_PATNAME">
<span<?php echo $store_storeled->PATNAME->viewAttributes() ?>>
<?php echo $store_storeled->PATNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PJVNO->Visible) { // PJVNO ?>
		<td<?php echo $store_storeled->PJVNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PJVNO" class="store_storeled_PJVNO">
<span<?php echo $store_storeled->PJVNO->viewAttributes() ?>>
<?php echo $store_storeled->PJVNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PJVSLNO->Visible) { // PJVSLNO ?>
		<td<?php echo $store_storeled->PJVSLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO">
<span<?php echo $store_storeled->PJVSLNO->viewAttributes() ?>>
<?php echo $store_storeled->PJVSLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->OTHDISC->Visible) { // OTHDISC ?>
		<td<?php echo $store_storeled->OTHDISC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_OTHDISC" class="store_storeled_OTHDISC">
<span<?php echo $store_storeled->OTHDISC->viewAttributes() ?>>
<?php echo $store_storeled->OTHDISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PJVYM->Visible) { // PJVYM ?>
		<td<?php echo $store_storeled->PJVYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PJVYM" class="store_storeled_PJVYM">
<span<?php echo $store_storeled->PJVYM->viewAttributes() ?>>
<?php echo $store_storeled->PJVYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PURDISCPER->Visible) { // PURDISCPER ?>
		<td<?php echo $store_storeled->PURDISCPER->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER">
<span<?php echo $store_storeled->PURDISCPER->viewAttributes() ?>>
<?php echo $store_storeled->PURDISCPER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->CASHIER->Visible) { // CASHIER ?>
		<td<?php echo $store_storeled->CASHIER->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_CASHIER" class="store_storeled_CASHIER">
<span<?php echo $store_storeled->CASHIER->viewAttributes() ?>>
<?php echo $store_storeled->CASHIER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->CASHTIME->Visible) { // CASHTIME ?>
		<td<?php echo $store_storeled->CASHTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_CASHTIME" class="store_storeled_CASHTIME">
<span<?php echo $store_storeled->CASHTIME->viewAttributes() ?>>
<?php echo $store_storeled->CASHTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->CASHRECD->Visible) { // CASHRECD ?>
		<td<?php echo $store_storeled->CASHRECD->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_CASHRECD" class="store_storeled_CASHRECD">
<span<?php echo $store_storeled->CASHRECD->viewAttributes() ?>>
<?php echo $store_storeled->CASHRECD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->CASHREFNO->Visible) { // CASHREFNO ?>
		<td<?php echo $store_storeled->CASHREFNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO">
<span<?php echo $store_storeled->CASHREFNO->viewAttributes() ?>>
<?php echo $store_storeled->CASHREFNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
		<td<?php echo $store_storeled->CASHIERSHIFT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT">
<span<?php echo $store_storeled->CASHIERSHIFT->viewAttributes() ?>>
<?php echo $store_storeled->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PRCODE->Visible) { // PRCODE ?>
		<td<?php echo $store_storeled->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PRCODE" class="store_storeled_PRCODE">
<span<?php echo $store_storeled->PRCODE->viewAttributes() ?>>
<?php echo $store_storeled->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->RELEASEBY->Visible) { // RELEASEBY ?>
		<td<?php echo $store_storeled->RELEASEBY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY">
<span<?php echo $store_storeled->RELEASEBY->viewAttributes() ?>>
<?php echo $store_storeled->RELEASEBY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->CRAUTHOR->Visible) { // CRAUTHOR ?>
		<td<?php echo $store_storeled->CRAUTHOR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR">
<span<?php echo $store_storeled->CRAUTHOR->viewAttributes() ?>>
<?php echo $store_storeled->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PAYMENT->Visible) { // PAYMENT ?>
		<td<?php echo $store_storeled->PAYMENT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PAYMENT" class="store_storeled_PAYMENT">
<span<?php echo $store_storeled->PAYMENT->viewAttributes() ?>>
<?php echo $store_storeled->PAYMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DRID->Visible) { // DRID ?>
		<td<?php echo $store_storeled->DRID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DRID" class="store_storeled_DRID">
<span<?php echo $store_storeled->DRID->viewAttributes() ?>>
<?php echo $store_storeled->DRID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->WARD->Visible) { // WARD ?>
		<td<?php echo $store_storeled->WARD->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_WARD" class="store_storeled_WARD">
<span<?php echo $store_storeled->WARD->viewAttributes() ?>>
<?php echo $store_storeled->WARD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->STAXTYPE->Visible) { // STAXTYPE ?>
		<td<?php echo $store_storeled->STAXTYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE">
<span<?php echo $store_storeled->STAXTYPE->viewAttributes() ?>>
<?php echo $store_storeled->STAXTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PURDISCVAL->Visible) { // PURDISCVAL ?>
		<td<?php echo $store_storeled->PURDISCVAL->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL">
<span<?php echo $store_storeled->PURDISCVAL->viewAttributes() ?>>
<?php echo $store_storeled->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->RNDOFF->Visible) { // RNDOFF ?>
		<td<?php echo $store_storeled->RNDOFF->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_RNDOFF" class="store_storeled_RNDOFF">
<span<?php echo $store_storeled->RNDOFF->viewAttributes() ?>>
<?php echo $store_storeled->RNDOFF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DISCONMRP->Visible) { // DISCONMRP ?>
		<td<?php echo $store_storeled->DISCONMRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP">
<span<?php echo $store_storeled->DISCONMRP->viewAttributes() ?>>
<?php echo $store_storeled->DISCONMRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DELVDT->Visible) { // DELVDT ?>
		<td<?php echo $store_storeled->DELVDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DELVDT" class="store_storeled_DELVDT">
<span<?php echo $store_storeled->DELVDT->viewAttributes() ?>>
<?php echo $store_storeled->DELVDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DELVTIME->Visible) { // DELVTIME ?>
		<td<?php echo $store_storeled->DELVTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DELVTIME" class="store_storeled_DELVTIME">
<span<?php echo $store_storeled->DELVTIME->viewAttributes() ?>>
<?php echo $store_storeled->DELVTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->DELVBY->Visible) { // DELVBY ?>
		<td<?php echo $store_storeled->DELVBY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_DELVBY" class="store_storeled_DELVBY">
<span<?php echo $store_storeled->DELVBY->viewAttributes() ?>>
<?php echo $store_storeled->DELVBY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->HOSPNO->Visible) { // HOSPNO ?>
		<td<?php echo $store_storeled->HOSPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_HOSPNO" class="store_storeled_HOSPNO">
<span<?php echo $store_storeled->HOSPNO->viewAttributes() ?>>
<?php echo $store_storeled->HOSPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->id->Visible) { // id ?>
		<td<?php echo $store_storeled->id->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_id" class="store_storeled_id">
<span<?php echo $store_storeled->id->viewAttributes() ?>>
<?php echo $store_storeled->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->pbv->Visible) { // pbv ?>
		<td<?php echo $store_storeled->pbv->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_pbv" class="store_storeled_pbv">
<span<?php echo $store_storeled->pbv->viewAttributes() ?>>
<?php echo $store_storeled->pbv->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->pbt->Visible) { // pbt ?>
		<td<?php echo $store_storeled->pbt->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_pbt" class="store_storeled_pbt">
<span<?php echo $store_storeled->pbt->viewAttributes() ?>>
<?php echo $store_storeled->pbt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->SiNo->Visible) { // SiNo ?>
		<td<?php echo $store_storeled->SiNo->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_SiNo" class="store_storeled_SiNo">
<span<?php echo $store_storeled->SiNo->viewAttributes() ?>>
<?php echo $store_storeled->SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->Product->Visible) { // Product ?>
		<td<?php echo $store_storeled->Product->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_Product" class="store_storeled_Product">
<span<?php echo $store_storeled->Product->viewAttributes() ?>>
<?php echo $store_storeled->Product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->Mfg->Visible) { // Mfg ?>
		<td<?php echo $store_storeled->Mfg->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_Mfg" class="store_storeled_Mfg">
<span<?php echo $store_storeled->Mfg->viewAttributes() ?>>
<?php echo $store_storeled->Mfg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->HosoID->Visible) { // HosoID ?>
		<td<?php echo $store_storeled->HosoID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_HosoID" class="store_storeled_HosoID">
<span<?php echo $store_storeled->HosoID->viewAttributes() ?>>
<?php echo $store_storeled->HosoID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->createdby->Visible) { // createdby ?>
		<td<?php echo $store_storeled->createdby->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_createdby" class="store_storeled_createdby">
<span<?php echo $store_storeled->createdby->viewAttributes() ?>>
<?php echo $store_storeled->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $store_storeled->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_createddatetime" class="store_storeled_createddatetime">
<span<?php echo $store_storeled->createddatetime->viewAttributes() ?>>
<?php echo $store_storeled->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $store_storeled->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_modifiedby" class="store_storeled_modifiedby">
<span<?php echo $store_storeled->modifiedby->viewAttributes() ?>>
<?php echo $store_storeled->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $store_storeled->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime">
<span<?php echo $store_storeled->modifieddatetime->viewAttributes() ?>>
<?php echo $store_storeled->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->MFRCODE->Visible) { // MFRCODE ?>
		<td<?php echo $store_storeled->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_MFRCODE" class="store_storeled_MFRCODE">
<span<?php echo $store_storeled->MFRCODE->viewAttributes() ?>>
<?php echo $store_storeled->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->Reception->Visible) { // Reception ?>
		<td<?php echo $store_storeled->Reception->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_Reception" class="store_storeled_Reception">
<span<?php echo $store_storeled->Reception->viewAttributes() ?>>
<?php echo $store_storeled->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->PatID->Visible) { // PatID ?>
		<td<?php echo $store_storeled->PatID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_PatID" class="store_storeled_PatID">
<span<?php echo $store_storeled->PatID->viewAttributes() ?>>
<?php echo $store_storeled->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->mrnno->Visible) { // mrnno ?>
		<td<?php echo $store_storeled->mrnno->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_mrnno" class="store_storeled_mrnno">
<span<?php echo $store_storeled->mrnno->viewAttributes() ?>>
<?php echo $store_storeled->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->BRNAME->Visible) { // BRNAME ?>
		<td<?php echo $store_storeled->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_BRNAME" class="store_storeled_BRNAME">
<span<?php echo $store_storeled->BRNAME->viewAttributes() ?>>
<?php echo $store_storeled->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storeled->StoreID->Visible) { // StoreID ?>
		<td<?php echo $store_storeled->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_delete->RowCnt ?>_store_storeled_StoreID" class="store_storeled_StoreID">
<span<?php echo $store_storeled->StoreID->viewAttributes() ?>>
<?php echo $store_storeled->StoreID->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_storeled_delete->terminate();
?>