<?php

namespace PHPMaker2021\project3;

// Page object
$StoreStoreledDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fstore_storeleddelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fstore_storeleddelete = currentForm = new ew.Form("fstore_storeleddelete", "delete");
    loadjs.done("fstore_storeleddelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fstore_storeleddelete" id="fstore_storeleddelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_storeled">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_store_storeled_BRCODE" class="store_storeled_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <th class="<?= $Page->TYPE->headerCellClass() ?>"><span id="elh_store_storeled_TYPE" class="store_storeled_TYPE"><?= $Page->TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DN->Visible) { // DN ?>
        <th class="<?= $Page->DN->headerCellClass() ?>"><span id="elh_store_storeled_DN" class="store_storeled_DN"><?= $Page->DN->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RDN->Visible) { // RDN ?>
        <th class="<?= $Page->RDN->headerCellClass() ?>"><span id="elh_store_storeled_RDN" class="store_storeled_RDN"><?= $Page->RDN->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><span id="elh_store_storeled_DT" class="store_storeled_DT"><?= $Page->DT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_store_storeled_PRC" class="store_storeled_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th class="<?= $Page->OQ->headerCellClass() ?>"><span id="elh_store_storeled_OQ" class="store_storeled_OQ"><?= $Page->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <th class="<?= $Page->RQ->headerCellClass() ?>"><span id="elh_store_storeled_RQ" class="store_storeled_RQ"><?= $Page->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th class="<?= $Page->MRQ->headerCellClass() ?>"><span id="elh_store_storeled_MRQ" class="store_storeled_MRQ"><?= $Page->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><span id="elh_store_storeled_IQ" class="store_storeled_IQ"><?= $Page->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th class="<?= $Page->BATCHNO->headerCellClass() ?>"><span id="elh_store_storeled_BATCHNO" class="store_storeled_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th class="<?= $Page->EXPDT->headerCellClass() ?>"><span id="elh_store_storeled_EXPDT" class="store_storeled_EXPDT"><?= $Page->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <th class="<?= $Page->BILLNO->headerCellClass() ?>"><span id="elh_store_storeled_BILLNO" class="store_storeled_BILLNO"><?= $Page->BILLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <th class="<?= $Page->BILLDT->headerCellClass() ?>"><span id="elh_store_storeled_BILLDT" class="store_storeled_BILLDT"><?= $Page->BILLDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th class="<?= $Page->RT->headerCellClass() ?>"><span id="elh_store_storeled_RT" class="store_storeled_RT"><?= $Page->RT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VALUE->Visible) { // VALUE ?>
        <th class="<?= $Page->VALUE->headerCellClass() ?>"><span id="elh_store_storeled_VALUE" class="store_storeled_VALUE"><?= $Page->VALUE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DISC->Visible) { // DISC ?>
        <th class="<?= $Page->DISC->headerCellClass() ?>"><span id="elh_store_storeled_DISC" class="store_storeled_DISC"><?= $Page->DISC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <th class="<?= $Page->TAXP->headerCellClass() ?>"><span id="elh_store_storeled_TAXP" class="store_storeled_TAXP"><?= $Page->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAX->Visible) { // TAX ?>
        <th class="<?= $Page->TAX->headerCellClass() ?>"><span id="elh_store_storeled_TAX" class="store_storeled_TAX"><?= $Page->TAX->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAXR->Visible) { // TAXR ?>
        <th class="<?= $Page->TAXR->headerCellClass() ?>"><span id="elh_store_storeled_TAXR" class="store_storeled_TAXR"><?= $Page->TAXR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <th class="<?= $Page->DAMT->headerCellClass() ?>"><span id="elh_store_storeled_DAMT" class="store_storeled_DAMT"><?= $Page->DAMT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EMPNO->Visible) { // EMPNO ?>
        <th class="<?= $Page->EMPNO->headerCellClass() ?>"><span id="elh_store_storeled_EMPNO" class="store_storeled_EMPNO"><?= $Page->EMPNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th class="<?= $Page->PC->headerCellClass() ?>"><span id="elh_store_storeled_PC" class="store_storeled_PC"><?= $Page->PC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DRNAME->Visible) { // DRNAME ?>
        <th class="<?= $Page->DRNAME->headerCellClass() ?>"><span id="elh_store_storeled_DRNAME" class="store_storeled_DRNAME"><?= $Page->DRNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BTIME->Visible) { // BTIME ?>
        <th class="<?= $Page->BTIME->headerCellClass() ?>"><span id="elh_store_storeled_BTIME" class="store_storeled_BTIME"><?= $Page->BTIME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ONO->Visible) { // ONO ?>
        <th class="<?= $Page->ONO->headerCellClass() ?>"><span id="elh_store_storeled_ONO" class="store_storeled_ONO"><?= $Page->ONO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ODT->Visible) { // ODT ?>
        <th class="<?= $Page->ODT->headerCellClass() ?>"><span id="elh_store_storeled_ODT" class="store_storeled_ODT"><?= $Page->ODT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PURRT->Visible) { // PURRT ?>
        <th class="<?= $Page->PURRT->headerCellClass() ?>"><span id="elh_store_storeled_PURRT" class="store_storeled_PURRT"><?= $Page->PURRT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GRP->Visible) { // GRP ?>
        <th class="<?= $Page->GRP->headerCellClass() ?>"><span id="elh_store_storeled_GRP" class="store_storeled_GRP"><?= $Page->GRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IBATCH->Visible) { // IBATCH ?>
        <th class="<?= $Page->IBATCH->headerCellClass() ?>"><span id="elh_store_storeled_IBATCH" class="store_storeled_IBATCH"><?= $Page->IBATCH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
        <th class="<?= $Page->IPNO->headerCellClass() ?>"><span id="elh_store_storeled_IPNO" class="store_storeled_IPNO"><?= $Page->IPNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
        <th class="<?= $Page->OPNO->headerCellClass() ?>"><span id="elh_store_storeled_OPNO" class="store_storeled_OPNO"><?= $Page->OPNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RECID->Visible) { // RECID ?>
        <th class="<?= $Page->RECID->headerCellClass() ?>"><span id="elh_store_storeled_RECID" class="store_storeled_RECID"><?= $Page->RECID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FQTY->Visible) { // FQTY ?>
        <th class="<?= $Page->FQTY->headerCellClass() ?>"><span id="elh_store_storeled_FQTY" class="store_storeled_FQTY"><?= $Page->FQTY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th class="<?= $Page->UR->headerCellClass() ?>"><span id="elh_store_storeled_UR" class="store_storeled_UR"><?= $Page->UR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DCID->Visible) { // DCID ?>
        <th class="<?= $Page->DCID->headerCellClass() ?>"><span id="elh_store_storeled_DCID" class="store_storeled_DCID"><?= $Page->DCID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <th class="<?= $Page->_USERID->headerCellClass() ?>"><span id="elh_store_storeled__USERID" class="store_storeled__USERID"><?= $Page->_USERID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MODDT->Visible) { // MODDT ?>
        <th class="<?= $Page->MODDT->headerCellClass() ?>"><span id="elh_store_storeled_MODDT" class="store_storeled_MODDT"><?= $Page->MODDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FYM->Visible) { // FYM ?>
        <th class="<?= $Page->FYM->headerCellClass() ?>"><span id="elh_store_storeled_FYM" class="store_storeled_FYM"><?= $Page->FYM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRCBATCH->Visible) { // PRCBATCH ?>
        <th class="<?= $Page->PRCBATCH->headerCellClass() ?>"><span id="elh_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH"><?= $Page->PRCBATCH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <th class="<?= $Page->SLNO->headerCellClass() ?>"><span id="elh_store_storeled_SLNO" class="store_storeled_SLNO"><?= $Page->SLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th class="<?= $Page->MRP->headerCellClass() ?>"><span id="elh_store_storeled_MRP" class="store_storeled_MRP"><?= $Page->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLYM->Visible) { // BILLYM ?>
        <th class="<?= $Page->BILLYM->headerCellClass() ?>"><span id="elh_store_storeled_BILLYM" class="store_storeled_BILLYM"><?= $Page->BILLYM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLGRP->Visible) { // BILLGRP ?>
        <th class="<?= $Page->BILLGRP->headerCellClass() ?>"><span id="elh_store_storeled_BILLGRP" class="store_storeled_BILLGRP"><?= $Page->BILLGRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STAFF->Visible) { // STAFF ?>
        <th class="<?= $Page->STAFF->headerCellClass() ?>"><span id="elh_store_storeled_STAFF" class="store_storeled_STAFF"><?= $Page->STAFF->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TEMPIPNO->Visible) { // TEMPIPNO ?>
        <th class="<?= $Page->TEMPIPNO->headerCellClass() ?>"><span id="elh_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO"><?= $Page->TEMPIPNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRNTED->Visible) { // PRNTED ?>
        <th class="<?= $Page->PRNTED->headerCellClass() ?>"><span id="elh_store_storeled_PRNTED" class="store_storeled_PRNTED"><?= $Page->PRNTED->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PATNAME->Visible) { // PATNAME ?>
        <th class="<?= $Page->PATNAME->headerCellClass() ?>"><span id="elh_store_storeled_PATNAME" class="store_storeled_PATNAME"><?= $Page->PATNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PJVNO->Visible) { // PJVNO ?>
        <th class="<?= $Page->PJVNO->headerCellClass() ?>"><span id="elh_store_storeled_PJVNO" class="store_storeled_PJVNO"><?= $Page->PJVNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PJVSLNO->Visible) { // PJVSLNO ?>
        <th class="<?= $Page->PJVSLNO->headerCellClass() ?>"><span id="elh_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO"><?= $Page->PJVSLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OTHDISC->Visible) { // OTHDISC ?>
        <th class="<?= $Page->OTHDISC->headerCellClass() ?>"><span id="elh_store_storeled_OTHDISC" class="store_storeled_OTHDISC"><?= $Page->OTHDISC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PJVYM->Visible) { // PJVYM ?>
        <th class="<?= $Page->PJVYM->headerCellClass() ?>"><span id="elh_store_storeled_PJVYM" class="store_storeled_PJVYM"><?= $Page->PJVYM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PURDISCPER->Visible) { // PURDISCPER ?>
        <th class="<?= $Page->PURDISCPER->headerCellClass() ?>"><span id="elh_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER"><?= $Page->PURDISCPER->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CASHIER->Visible) { // CASHIER ?>
        <th class="<?= $Page->CASHIER->headerCellClass() ?>"><span id="elh_store_storeled_CASHIER" class="store_storeled_CASHIER"><?= $Page->CASHIER->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CASHTIME->Visible) { // CASHTIME ?>
        <th class="<?= $Page->CASHTIME->headerCellClass() ?>"><span id="elh_store_storeled_CASHTIME" class="store_storeled_CASHTIME"><?= $Page->CASHTIME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CASHRECD->Visible) { // CASHRECD ?>
        <th class="<?= $Page->CASHRECD->headerCellClass() ?>"><span id="elh_store_storeled_CASHRECD" class="store_storeled_CASHRECD"><?= $Page->CASHRECD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CASHREFNO->Visible) { // CASHREFNO ?>
        <th class="<?= $Page->CASHREFNO->headerCellClass() ?>"><span id="elh_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO"><?= $Page->CASHREFNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
        <th class="<?= $Page->CASHIERSHIFT->headerCellClass() ?>"><span id="elh_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT"><?= $Page->CASHIERSHIFT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <th class="<?= $Page->PRCODE->headerCellClass() ?>"><span id="elh_store_storeled_PRCODE" class="store_storeled_PRCODE"><?= $Page->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RELEASEBY->Visible) { // RELEASEBY ?>
        <th class="<?= $Page->RELEASEBY->headerCellClass() ?>"><span id="elh_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY"><?= $Page->RELEASEBY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CRAUTHOR->Visible) { // CRAUTHOR ?>
        <th class="<?= $Page->CRAUTHOR->headerCellClass() ?>"><span id="elh_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR"><?= $Page->CRAUTHOR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PAYMENT->Visible) { // PAYMENT ?>
        <th class="<?= $Page->PAYMENT->headerCellClass() ?>"><span id="elh_store_storeled_PAYMENT" class="store_storeled_PAYMENT"><?= $Page->PAYMENT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <th class="<?= $Page->DRID->headerCellClass() ?>"><span id="elh_store_storeled_DRID" class="store_storeled_DRID"><?= $Page->DRID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WARD->Visible) { // WARD ?>
        <th class="<?= $Page->WARD->headerCellClass() ?>"><span id="elh_store_storeled_WARD" class="store_storeled_WARD"><?= $Page->WARD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STAXTYPE->Visible) { // STAXTYPE ?>
        <th class="<?= $Page->STAXTYPE->headerCellClass() ?>"><span id="elh_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE"><?= $Page->STAXTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PURDISCVAL->Visible) { // PURDISCVAL ?>
        <th class="<?= $Page->PURDISCVAL->headerCellClass() ?>"><span id="elh_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL"><?= $Page->PURDISCVAL->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RNDOFF->Visible) { // RNDOFF ?>
        <th class="<?= $Page->RNDOFF->headerCellClass() ?>"><span id="elh_store_storeled_RNDOFF" class="store_storeled_RNDOFF"><?= $Page->RNDOFF->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DISCONMRP->Visible) { // DISCONMRP ?>
        <th class="<?= $Page->DISCONMRP->headerCellClass() ?>"><span id="elh_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP"><?= $Page->DISCONMRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DELVDT->Visible) { // DELVDT ?>
        <th class="<?= $Page->DELVDT->headerCellClass() ?>"><span id="elh_store_storeled_DELVDT" class="store_storeled_DELVDT"><?= $Page->DELVDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DELVTIME->Visible) { // DELVTIME ?>
        <th class="<?= $Page->DELVTIME->headerCellClass() ?>"><span id="elh_store_storeled_DELVTIME" class="store_storeled_DELVTIME"><?= $Page->DELVTIME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DELVBY->Visible) { // DELVBY ?>
        <th class="<?= $Page->DELVBY->headerCellClass() ?>"><span id="elh_store_storeled_DELVBY" class="store_storeled_DELVBY"><?= $Page->DELVBY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HOSPNO->Visible) { // HOSPNO ?>
        <th class="<?= $Page->HOSPNO->headerCellClass() ?>"><span id="elh_store_storeled_HOSPNO" class="store_storeled_HOSPNO"><?= $Page->HOSPNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_store_storeled_id" class="store_storeled_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pbv->Visible) { // pbv ?>
        <th class="<?= $Page->pbv->headerCellClass() ?>"><span id="elh_store_storeled_pbv" class="store_storeled_pbv"><?= $Page->pbv->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pbt->Visible) { // pbt ?>
        <th class="<?= $Page->pbt->headerCellClass() ?>"><span id="elh_store_storeled_pbt" class="store_storeled_pbt"><?= $Page->pbt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <th class="<?= $Page->SiNo->headerCellClass() ?>"><span id="elh_store_storeled_SiNo" class="store_storeled_SiNo"><?= $Page->SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th class="<?= $Page->Product->headerCellClass() ?>"><span id="elh_store_storeled_Product" class="store_storeled_Product"><?= $Page->Product->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <th class="<?= $Page->Mfg->headerCellClass() ?>"><span id="elh_store_storeled_Mfg" class="store_storeled_Mfg"><?= $Page->Mfg->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th class="<?= $Page->HosoID->headerCellClass() ?>"><span id="elh_store_storeled_HosoID" class="store_storeled_HosoID"><?= $Page->HosoID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_store_storeled_createdby" class="store_storeled_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_store_storeled_createddatetime" class="store_storeled_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_store_storeled_modifiedby" class="store_storeled_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><span id="elh_store_storeled_MFRCODE" class="store_storeled_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_store_storeled_Reception" class="store_storeled_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><span id="elh_store_storeled_PatID" class="store_storeled_PatID"><?= $Page->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_store_storeled_mrnno" class="store_storeled_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th class="<?= $Page->BRNAME->headerCellClass() ?>"><span id="elh_store_storeled_BRNAME" class="store_storeled_BRNAME"><?= $Page->BRNAME->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_BRCODE" class="store_storeled_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <td <?= $Page->TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_TYPE" class="store_storeled_TYPE">
<span<?= $Page->TYPE->viewAttributes() ?>>
<?= $Page->TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DN->Visible) { // DN ?>
        <td <?= $Page->DN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DN" class="store_storeled_DN">
<span<?= $Page->DN->viewAttributes() ?>>
<?= $Page->DN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RDN->Visible) { // RDN ?>
        <td <?= $Page->RDN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_RDN" class="store_storeled_RDN">
<span<?= $Page->RDN->viewAttributes() ?>>
<?= $Page->RDN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <td <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DT" class="store_storeled_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PRC" class="store_storeled_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <td <?= $Page->OQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_OQ" class="store_storeled_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <td <?= $Page->RQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_RQ" class="store_storeled_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_MRQ" class="store_storeled_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <td <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_IQ" class="store_storeled_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_BATCHNO" class="store_storeled_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_EXPDT" class="store_storeled_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_BILLNO" class="store_storeled_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <td <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_BILLDT" class="store_storeled_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <td <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_RT" class="store_storeled_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VALUE->Visible) { // VALUE ?>
        <td <?= $Page->VALUE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_VALUE" class="store_storeled_VALUE">
<span<?= $Page->VALUE->viewAttributes() ?>>
<?= $Page->VALUE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DISC->Visible) { // DISC ?>
        <td <?= $Page->DISC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DISC" class="store_storeled_DISC">
<span<?= $Page->DISC->viewAttributes() ?>>
<?= $Page->DISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <td <?= $Page->TAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_TAXP" class="store_storeled_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAX->Visible) { // TAX ?>
        <td <?= $Page->TAX->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_TAX" class="store_storeled_TAX">
<span<?= $Page->TAX->viewAttributes() ?>>
<?= $Page->TAX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAXR->Visible) { // TAXR ?>
        <td <?= $Page->TAXR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_TAXR" class="store_storeled_TAXR">
<span<?= $Page->TAXR->viewAttributes() ?>>
<?= $Page->TAXR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td <?= $Page->DAMT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DAMT" class="store_storeled_DAMT">
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EMPNO->Visible) { // EMPNO ?>
        <td <?= $Page->EMPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_EMPNO" class="store_storeled_EMPNO">
<span<?= $Page->EMPNO->viewAttributes() ?>>
<?= $Page->EMPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <td <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PC" class="store_storeled_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DRNAME->Visible) { // DRNAME ?>
        <td <?= $Page->DRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DRNAME" class="store_storeled_DRNAME">
<span<?= $Page->DRNAME->viewAttributes() ?>>
<?= $Page->DRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BTIME->Visible) { // BTIME ?>
        <td <?= $Page->BTIME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_BTIME" class="store_storeled_BTIME">
<span<?= $Page->BTIME->viewAttributes() ?>>
<?= $Page->BTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ONO->Visible) { // ONO ?>
        <td <?= $Page->ONO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_ONO" class="store_storeled_ONO">
<span<?= $Page->ONO->viewAttributes() ?>>
<?= $Page->ONO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ODT->Visible) { // ODT ?>
        <td <?= $Page->ODT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_ODT" class="store_storeled_ODT">
<span<?= $Page->ODT->viewAttributes() ?>>
<?= $Page->ODT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PURRT->Visible) { // PURRT ?>
        <td <?= $Page->PURRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PURRT" class="store_storeled_PURRT">
<span<?= $Page->PURRT->viewAttributes() ?>>
<?= $Page->PURRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GRP->Visible) { // GRP ?>
        <td <?= $Page->GRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_GRP" class="store_storeled_GRP">
<span<?= $Page->GRP->viewAttributes() ?>>
<?= $Page->GRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IBATCH->Visible) { // IBATCH ?>
        <td <?= $Page->IBATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_IBATCH" class="store_storeled_IBATCH">
<span<?= $Page->IBATCH->viewAttributes() ?>>
<?= $Page->IBATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
        <td <?= $Page->IPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_IPNO" class="store_storeled_IPNO">
<span<?= $Page->IPNO->viewAttributes() ?>>
<?= $Page->IPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
        <td <?= $Page->OPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_OPNO" class="store_storeled_OPNO">
<span<?= $Page->OPNO->viewAttributes() ?>>
<?= $Page->OPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RECID->Visible) { // RECID ?>
        <td <?= $Page->RECID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_RECID" class="store_storeled_RECID">
<span<?= $Page->RECID->viewAttributes() ?>>
<?= $Page->RECID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FQTY->Visible) { // FQTY ?>
        <td <?= $Page->FQTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_FQTY" class="store_storeled_FQTY">
<span<?= $Page->FQTY->viewAttributes() ?>>
<?= $Page->FQTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <td <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_UR" class="store_storeled_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DCID->Visible) { // DCID ?>
        <td <?= $Page->DCID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DCID" class="store_storeled_DCID">
<span<?= $Page->DCID->viewAttributes() ?>>
<?= $Page->DCID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <td <?= $Page->_USERID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled__USERID" class="store_storeled__USERID">
<span<?= $Page->_USERID->viewAttributes() ?>>
<?= $Page->_USERID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MODDT->Visible) { // MODDT ?>
        <td <?= $Page->MODDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_MODDT" class="store_storeled_MODDT">
<span<?= $Page->MODDT->viewAttributes() ?>>
<?= $Page->MODDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FYM->Visible) { // FYM ?>
        <td <?= $Page->FYM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_FYM" class="store_storeled_FYM">
<span<?= $Page->FYM->viewAttributes() ?>>
<?= $Page->FYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRCBATCH->Visible) { // PRCBATCH ?>
        <td <?= $Page->PRCBATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH">
<span<?= $Page->PRCBATCH->viewAttributes() ?>>
<?= $Page->PRCBATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <td <?= $Page->SLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_SLNO" class="store_storeled_SLNO">
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <td <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_MRP" class="store_storeled_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLYM->Visible) { // BILLYM ?>
        <td <?= $Page->BILLYM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_BILLYM" class="store_storeled_BILLYM">
<span<?= $Page->BILLYM->viewAttributes() ?>>
<?= $Page->BILLYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLGRP->Visible) { // BILLGRP ?>
        <td <?= $Page->BILLGRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_BILLGRP" class="store_storeled_BILLGRP">
<span<?= $Page->BILLGRP->viewAttributes() ?>>
<?= $Page->BILLGRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STAFF->Visible) { // STAFF ?>
        <td <?= $Page->STAFF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_STAFF" class="store_storeled_STAFF">
<span<?= $Page->STAFF->viewAttributes() ?>>
<?= $Page->STAFF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TEMPIPNO->Visible) { // TEMPIPNO ?>
        <td <?= $Page->TEMPIPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO">
<span<?= $Page->TEMPIPNO->viewAttributes() ?>>
<?= $Page->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRNTED->Visible) { // PRNTED ?>
        <td <?= $Page->PRNTED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PRNTED" class="store_storeled_PRNTED">
<span<?= $Page->PRNTED->viewAttributes() ?>>
<?= $Page->PRNTED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PATNAME->Visible) { // PATNAME ?>
        <td <?= $Page->PATNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PATNAME" class="store_storeled_PATNAME">
<span<?= $Page->PATNAME->viewAttributes() ?>>
<?= $Page->PATNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PJVNO->Visible) { // PJVNO ?>
        <td <?= $Page->PJVNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PJVNO" class="store_storeled_PJVNO">
<span<?= $Page->PJVNO->viewAttributes() ?>>
<?= $Page->PJVNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PJVSLNO->Visible) { // PJVSLNO ?>
        <td <?= $Page->PJVSLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO">
<span<?= $Page->PJVSLNO->viewAttributes() ?>>
<?= $Page->PJVSLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OTHDISC->Visible) { // OTHDISC ?>
        <td <?= $Page->OTHDISC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_OTHDISC" class="store_storeled_OTHDISC">
<span<?= $Page->OTHDISC->viewAttributes() ?>>
<?= $Page->OTHDISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PJVYM->Visible) { // PJVYM ?>
        <td <?= $Page->PJVYM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PJVYM" class="store_storeled_PJVYM">
<span<?= $Page->PJVYM->viewAttributes() ?>>
<?= $Page->PJVYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PURDISCPER->Visible) { // PURDISCPER ?>
        <td <?= $Page->PURDISCPER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER">
<span<?= $Page->PURDISCPER->viewAttributes() ?>>
<?= $Page->PURDISCPER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CASHIER->Visible) { // CASHIER ?>
        <td <?= $Page->CASHIER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_CASHIER" class="store_storeled_CASHIER">
<span<?= $Page->CASHIER->viewAttributes() ?>>
<?= $Page->CASHIER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CASHTIME->Visible) { // CASHTIME ?>
        <td <?= $Page->CASHTIME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_CASHTIME" class="store_storeled_CASHTIME">
<span<?= $Page->CASHTIME->viewAttributes() ?>>
<?= $Page->CASHTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CASHRECD->Visible) { // CASHRECD ?>
        <td <?= $Page->CASHRECD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_CASHRECD" class="store_storeled_CASHRECD">
<span<?= $Page->CASHRECD->viewAttributes() ?>>
<?= $Page->CASHRECD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CASHREFNO->Visible) { // CASHREFNO ?>
        <td <?= $Page->CASHREFNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO">
<span<?= $Page->CASHREFNO->viewAttributes() ?>>
<?= $Page->CASHREFNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
        <td <?= $Page->CASHIERSHIFT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT">
<span<?= $Page->CASHIERSHIFT->viewAttributes() ?>>
<?= $Page->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <td <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PRCODE" class="store_storeled_PRCODE">
<span<?= $Page->PRCODE->viewAttributes() ?>>
<?= $Page->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RELEASEBY->Visible) { // RELEASEBY ?>
        <td <?= $Page->RELEASEBY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY">
<span<?= $Page->RELEASEBY->viewAttributes() ?>>
<?= $Page->RELEASEBY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CRAUTHOR->Visible) { // CRAUTHOR ?>
        <td <?= $Page->CRAUTHOR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR">
<span<?= $Page->CRAUTHOR->viewAttributes() ?>>
<?= $Page->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PAYMENT->Visible) { // PAYMENT ?>
        <td <?= $Page->PAYMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PAYMENT" class="store_storeled_PAYMENT">
<span<?= $Page->PAYMENT->viewAttributes() ?>>
<?= $Page->PAYMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <td <?= $Page->DRID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DRID" class="store_storeled_DRID">
<span<?= $Page->DRID->viewAttributes() ?>>
<?= $Page->DRID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WARD->Visible) { // WARD ?>
        <td <?= $Page->WARD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_WARD" class="store_storeled_WARD">
<span<?= $Page->WARD->viewAttributes() ?>>
<?= $Page->WARD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STAXTYPE->Visible) { // STAXTYPE ?>
        <td <?= $Page->STAXTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE">
<span<?= $Page->STAXTYPE->viewAttributes() ?>>
<?= $Page->STAXTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PURDISCVAL->Visible) { // PURDISCVAL ?>
        <td <?= $Page->PURDISCVAL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL">
<span<?= $Page->PURDISCVAL->viewAttributes() ?>>
<?= $Page->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RNDOFF->Visible) { // RNDOFF ?>
        <td <?= $Page->RNDOFF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_RNDOFF" class="store_storeled_RNDOFF">
<span<?= $Page->RNDOFF->viewAttributes() ?>>
<?= $Page->RNDOFF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DISCONMRP->Visible) { // DISCONMRP ?>
        <td <?= $Page->DISCONMRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP">
<span<?= $Page->DISCONMRP->viewAttributes() ?>>
<?= $Page->DISCONMRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DELVDT->Visible) { // DELVDT ?>
        <td <?= $Page->DELVDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DELVDT" class="store_storeled_DELVDT">
<span<?= $Page->DELVDT->viewAttributes() ?>>
<?= $Page->DELVDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DELVTIME->Visible) { // DELVTIME ?>
        <td <?= $Page->DELVTIME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DELVTIME" class="store_storeled_DELVTIME">
<span<?= $Page->DELVTIME->viewAttributes() ?>>
<?= $Page->DELVTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DELVBY->Visible) { // DELVBY ?>
        <td <?= $Page->DELVBY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_DELVBY" class="store_storeled_DELVBY">
<span<?= $Page->DELVBY->viewAttributes() ?>>
<?= $Page->DELVBY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HOSPNO->Visible) { // HOSPNO ?>
        <td <?= $Page->HOSPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_HOSPNO" class="store_storeled_HOSPNO">
<span<?= $Page->HOSPNO->viewAttributes() ?>>
<?= $Page->HOSPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_id" class="store_storeled_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pbv->Visible) { // pbv ?>
        <td <?= $Page->pbv->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_pbv" class="store_storeled_pbv">
<span<?= $Page->pbv->viewAttributes() ?>>
<?= $Page->pbv->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pbt->Visible) { // pbt ?>
        <td <?= $Page->pbt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_pbt" class="store_storeled_pbt">
<span<?= $Page->pbt->viewAttributes() ?>>
<?= $Page->pbt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <td <?= $Page->SiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_SiNo" class="store_storeled_SiNo">
<span<?= $Page->SiNo->viewAttributes() ?>>
<?= $Page->SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <td <?= $Page->Product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_Product" class="store_storeled_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <td <?= $Page->Mfg->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_Mfg" class="store_storeled_Mfg">
<span<?= $Page->Mfg->viewAttributes() ?>>
<?= $Page->Mfg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td <?= $Page->HosoID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_HosoID" class="store_storeled_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_createdby" class="store_storeled_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_createddatetime" class="store_storeled_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_modifiedby" class="store_storeled_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_MFRCODE" class="store_storeled_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_Reception" class="store_storeled_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <td <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_PatID" class="store_storeled_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_mrnno" class="store_storeled_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storeled_BRNAME" class="store_storeled_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
