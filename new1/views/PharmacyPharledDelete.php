<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyPharledDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_pharleddelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_pharleddelete = currentForm = new ew.Form("fpharmacy_pharleddelete", "delete");
    loadjs.done("fpharmacy_pharleddelete");
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
<form name="fpharmacy_pharleddelete" id="fpharmacy_pharleddelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
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
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <th class="<?= $Page->TYPE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_TYPE" class="pharmacy_pharled_TYPE"><?= $Page->TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DN->Visible) { // DN ?>
        <th class="<?= $Page->DN->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DN" class="pharmacy_pharled_DN"><?= $Page->DN->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RDN->Visible) { // RDN ?>
        <th class="<?= $Page->RDN->headerCellClass() ?>"><span id="elh_pharmacy_pharled_RDN" class="pharmacy_pharled_RDN"><?= $Page->RDN->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DT" class="pharmacy_pharled_DT"><?= $Page->DT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th class="<?= $Page->OQ->headerCellClass() ?>"><span id="elh_pharmacy_pharled_OQ" class="pharmacy_pharled_OQ"><?= $Page->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <th class="<?= $Page->RQ->headerCellClass() ?>"><span id="elh_pharmacy_pharled_RQ" class="pharmacy_pharled_RQ"><?= $Page->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th class="<?= $Page->MRQ->headerCellClass() ?>"><span id="elh_pharmacy_pharled_MRQ" class="pharmacy_pharled_MRQ"><?= $Page->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><span id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ"><?= $Page->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th class="<?= $Page->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th class="<?= $Page->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT"><?= $Page->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <th class="<?= $Page->BILLNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BILLNO" class="pharmacy_pharled_BILLNO"><?= $Page->BILLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <th class="<?= $Page->BILLDT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BILLDT" class="pharmacy_pharled_BILLDT"><?= $Page->BILLDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th class="<?= $Page->RT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT"><?= $Page->RT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VALUE->Visible) { // VALUE ?>
        <th class="<?= $Page->VALUE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_VALUE" class="pharmacy_pharled_VALUE"><?= $Page->VALUE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DISC->Visible) { // DISC ?>
        <th class="<?= $Page->DISC->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DISC" class="pharmacy_pharled_DISC"><?= $Page->DISC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <th class="<?= $Page->TAXP->headerCellClass() ?>"><span id="elh_pharmacy_pharled_TAXP" class="pharmacy_pharled_TAXP"><?= $Page->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAX->Visible) { // TAX ?>
        <th class="<?= $Page->TAX->headerCellClass() ?>"><span id="elh_pharmacy_pharled_TAX" class="pharmacy_pharled_TAX"><?= $Page->TAX->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAXR->Visible) { // TAXR ?>
        <th class="<?= $Page->TAXR->headerCellClass() ?>"><span id="elh_pharmacy_pharled_TAXR" class="pharmacy_pharled_TAXR"><?= $Page->TAXR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <th class="<?= $Page->DAMT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT"><?= $Page->DAMT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EMPNO->Visible) { // EMPNO ?>
        <th class="<?= $Page->EMPNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_EMPNO" class="pharmacy_pharled_EMPNO"><?= $Page->EMPNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th class="<?= $Page->PC->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PC" class="pharmacy_pharled_PC"><?= $Page->PC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DRNAME->Visible) { // DRNAME ?>
        <th class="<?= $Page->DRNAME->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DRNAME" class="pharmacy_pharled_DRNAME"><?= $Page->DRNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BTIME->Visible) { // BTIME ?>
        <th class="<?= $Page->BTIME->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BTIME" class="pharmacy_pharled_BTIME"><?= $Page->BTIME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ONO->Visible) { // ONO ?>
        <th class="<?= $Page->ONO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_ONO" class="pharmacy_pharled_ONO"><?= $Page->ONO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ODT->Visible) { // ODT ?>
        <th class="<?= $Page->ODT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_ODT" class="pharmacy_pharled_ODT"><?= $Page->ODT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PURRT->Visible) { // PURRT ?>
        <th class="<?= $Page->PURRT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PURRT" class="pharmacy_pharled_PURRT"><?= $Page->PURRT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GRP->Visible) { // GRP ?>
        <th class="<?= $Page->GRP->headerCellClass() ?>"><span id="elh_pharmacy_pharled_GRP" class="pharmacy_pharled_GRP"><?= $Page->GRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IBATCH->Visible) { // IBATCH ?>
        <th class="<?= $Page->IBATCH->headerCellClass() ?>"><span id="elh_pharmacy_pharled_IBATCH" class="pharmacy_pharled_IBATCH"><?= $Page->IBATCH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
        <th class="<?= $Page->IPNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_IPNO" class="pharmacy_pharled_IPNO"><?= $Page->IPNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
        <th class="<?= $Page->OPNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_OPNO" class="pharmacy_pharled_OPNO"><?= $Page->OPNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RECID->Visible) { // RECID ?>
        <th class="<?= $Page->RECID->headerCellClass() ?>"><span id="elh_pharmacy_pharled_RECID" class="pharmacy_pharled_RECID"><?= $Page->RECID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FQTY->Visible) { // FQTY ?>
        <th class="<?= $Page->FQTY->headerCellClass() ?>"><span id="elh_pharmacy_pharled_FQTY" class="pharmacy_pharled_FQTY"><?= $Page->FQTY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th class="<?= $Page->UR->headerCellClass() ?>"><span id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR"><?= $Page->UR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DCID->Visible) { // DCID ?>
        <th class="<?= $Page->DCID->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DCID" class="pharmacy_pharled_DCID"><?= $Page->DCID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <th class="<?= $Page->_USERID->headerCellClass() ?>"><span id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID"><?= $Page->_USERID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MODDT->Visible) { // MODDT ?>
        <th class="<?= $Page->MODDT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_MODDT" class="pharmacy_pharled_MODDT"><?= $Page->MODDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FYM->Visible) { // FYM ?>
        <th class="<?= $Page->FYM->headerCellClass() ?>"><span id="elh_pharmacy_pharled_FYM" class="pharmacy_pharled_FYM"><?= $Page->FYM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRCBATCH->Visible) { // PRCBATCH ?>
        <th class="<?= $Page->PRCBATCH->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PRCBATCH" class="pharmacy_pharled_PRCBATCH"><?= $Page->PRCBATCH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <th class="<?= $Page->SLNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO"><?= $Page->SLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th class="<?= $Page->MRP->headerCellClass() ?>"><span id="elh_pharmacy_pharled_MRP" class="pharmacy_pharled_MRP"><?= $Page->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLYM->Visible) { // BILLYM ?>
        <th class="<?= $Page->BILLYM->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BILLYM" class="pharmacy_pharled_BILLYM"><?= $Page->BILLYM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLGRP->Visible) { // BILLGRP ?>
        <th class="<?= $Page->BILLGRP->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BILLGRP" class="pharmacy_pharled_BILLGRP"><?= $Page->BILLGRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STAFF->Visible) { // STAFF ?>
        <th class="<?= $Page->STAFF->headerCellClass() ?>"><span id="elh_pharmacy_pharled_STAFF" class="pharmacy_pharled_STAFF"><?= $Page->STAFF->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TEMPIPNO->Visible) { // TEMPIPNO ?>
        <th class="<?= $Page->TEMPIPNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_TEMPIPNO" class="pharmacy_pharled_TEMPIPNO"><?= $Page->TEMPIPNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRNTED->Visible) { // PRNTED ?>
        <th class="<?= $Page->PRNTED->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PRNTED" class="pharmacy_pharled_PRNTED"><?= $Page->PRNTED->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PATNAME->Visible) { // PATNAME ?>
        <th class="<?= $Page->PATNAME->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PATNAME" class="pharmacy_pharled_PATNAME"><?= $Page->PATNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PJVNO->Visible) { // PJVNO ?>
        <th class="<?= $Page->PJVNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PJVNO" class="pharmacy_pharled_PJVNO"><?= $Page->PJVNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PJVSLNO->Visible) { // PJVSLNO ?>
        <th class="<?= $Page->PJVSLNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PJVSLNO" class="pharmacy_pharled_PJVSLNO"><?= $Page->PJVSLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OTHDISC->Visible) { // OTHDISC ?>
        <th class="<?= $Page->OTHDISC->headerCellClass() ?>"><span id="elh_pharmacy_pharled_OTHDISC" class="pharmacy_pharled_OTHDISC"><?= $Page->OTHDISC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PJVYM->Visible) { // PJVYM ?>
        <th class="<?= $Page->PJVYM->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PJVYM" class="pharmacy_pharled_PJVYM"><?= $Page->PJVYM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PURDISCPER->Visible) { // PURDISCPER ?>
        <th class="<?= $Page->PURDISCPER->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PURDISCPER" class="pharmacy_pharled_PURDISCPER"><?= $Page->PURDISCPER->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CASHIER->Visible) { // CASHIER ?>
        <th class="<?= $Page->CASHIER->headerCellClass() ?>"><span id="elh_pharmacy_pharled_CASHIER" class="pharmacy_pharled_CASHIER"><?= $Page->CASHIER->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CASHTIME->Visible) { // CASHTIME ?>
        <th class="<?= $Page->CASHTIME->headerCellClass() ?>"><span id="elh_pharmacy_pharled_CASHTIME" class="pharmacy_pharled_CASHTIME"><?= $Page->CASHTIME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CASHRECD->Visible) { // CASHRECD ?>
        <th class="<?= $Page->CASHRECD->headerCellClass() ?>"><span id="elh_pharmacy_pharled_CASHRECD" class="pharmacy_pharled_CASHRECD"><?= $Page->CASHRECD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CASHREFNO->Visible) { // CASHREFNO ?>
        <th class="<?= $Page->CASHREFNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_CASHREFNO" class="pharmacy_pharled_CASHREFNO"><?= $Page->CASHREFNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
        <th class="<?= $Page->CASHIERSHIFT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_CASHIERSHIFT" class="pharmacy_pharled_CASHIERSHIFT"><?= $Page->CASHIERSHIFT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <th class="<?= $Page->PRCODE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PRCODE" class="pharmacy_pharled_PRCODE"><?= $Page->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RELEASEBY->Visible) { // RELEASEBY ?>
        <th class="<?= $Page->RELEASEBY->headerCellClass() ?>"><span id="elh_pharmacy_pharled_RELEASEBY" class="pharmacy_pharled_RELEASEBY"><?= $Page->RELEASEBY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CRAUTHOR->Visible) { // CRAUTHOR ?>
        <th class="<?= $Page->CRAUTHOR->headerCellClass() ?>"><span id="elh_pharmacy_pharled_CRAUTHOR" class="pharmacy_pharled_CRAUTHOR"><?= $Page->CRAUTHOR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PAYMENT->Visible) { // PAYMENT ?>
        <th class="<?= $Page->PAYMENT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PAYMENT" class="pharmacy_pharled_PAYMENT"><?= $Page->PAYMENT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <th class="<?= $Page->DRID->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DRID" class="pharmacy_pharled_DRID"><?= $Page->DRID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WARD->Visible) { // WARD ?>
        <th class="<?= $Page->WARD->headerCellClass() ?>"><span id="elh_pharmacy_pharled_WARD" class="pharmacy_pharled_WARD"><?= $Page->WARD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STAXTYPE->Visible) { // STAXTYPE ?>
        <th class="<?= $Page->STAXTYPE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_STAXTYPE" class="pharmacy_pharled_STAXTYPE"><?= $Page->STAXTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PURDISCVAL->Visible) { // PURDISCVAL ?>
        <th class="<?= $Page->PURDISCVAL->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PURDISCVAL" class="pharmacy_pharled_PURDISCVAL"><?= $Page->PURDISCVAL->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RNDOFF->Visible) { // RNDOFF ?>
        <th class="<?= $Page->RNDOFF->headerCellClass() ?>"><span id="elh_pharmacy_pharled_RNDOFF" class="pharmacy_pharled_RNDOFF"><?= $Page->RNDOFF->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DISCONMRP->Visible) { // DISCONMRP ?>
        <th class="<?= $Page->DISCONMRP->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DISCONMRP" class="pharmacy_pharled_DISCONMRP"><?= $Page->DISCONMRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DELVDT->Visible) { // DELVDT ?>
        <th class="<?= $Page->DELVDT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DELVDT" class="pharmacy_pharled_DELVDT"><?= $Page->DELVDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DELVTIME->Visible) { // DELVTIME ?>
        <th class="<?= $Page->DELVTIME->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DELVTIME" class="pharmacy_pharled_DELVTIME"><?= $Page->DELVTIME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DELVBY->Visible) { // DELVBY ?>
        <th class="<?= $Page->DELVBY->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DELVBY" class="pharmacy_pharled_DELVBY"><?= $Page->DELVBY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HOSPNO->Visible) { // HOSPNO ?>
        <th class="<?= $Page->HOSPNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_HOSPNO" class="pharmacy_pharled_HOSPNO"><?= $Page->HOSPNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pbv->Visible) { // pbv ?>
        <th class="<?= $Page->pbv->headerCellClass() ?>"><span id="elh_pharmacy_pharled_pbv" class="pharmacy_pharled_pbv"><?= $Page->pbv->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pbt->Visible) { // pbt ?>
        <th class="<?= $Page->pbt->headerCellClass() ?>"><span id="elh_pharmacy_pharled_pbt" class="pharmacy_pharled_pbt"><?= $Page->pbt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <th class="<?= $Page->SiNo->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo"><?= $Page->SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th class="<?= $Page->Product->headerCellClass() ?>"><span id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product"><?= $Page->Product->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <th class="<?= $Page->Mfg->headerCellClass() ?>"><span id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg"><?= $Page->Mfg->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th class="<?= $Page->HosoID->headerCellClass() ?>"><span id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID"><?= $Page->HosoID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_MFRCODE" class="pharmacy_pharled_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_pharmacy_pharled_Reception" class="pharmacy_pharled_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PatID" class="pharmacy_pharled_PatID"><?= $Page->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_pharmacy_pharled_mrnno" class="pharmacy_pharled_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th class="<?= $Page->BRNAME->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME"><?= $Page->BRNAME->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <td <?= $Page->TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_TYPE" class="pharmacy_pharled_TYPE">
<span<?= $Page->TYPE->viewAttributes() ?>>
<?= $Page->TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DN->Visible) { // DN ?>
        <td <?= $Page->DN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DN" class="pharmacy_pharled_DN">
<span<?= $Page->DN->viewAttributes() ?>>
<?= $Page->DN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RDN->Visible) { // RDN ?>
        <td <?= $Page->RDN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_RDN" class="pharmacy_pharled_RDN">
<span<?= $Page->RDN->viewAttributes() ?>>
<?= $Page->RDN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <td <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DT" class="pharmacy_pharled_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <td <?= $Page->OQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_OQ" class="pharmacy_pharled_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <td <?= $Page->RQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_RQ" class="pharmacy_pharled_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_MRQ" class="pharmacy_pharled_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <td <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BILLNO" class="pharmacy_pharled_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <td <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BILLDT" class="pharmacy_pharled_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <td <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_RT" class="pharmacy_pharled_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VALUE->Visible) { // VALUE ?>
        <td <?= $Page->VALUE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_VALUE" class="pharmacy_pharled_VALUE">
<span<?= $Page->VALUE->viewAttributes() ?>>
<?= $Page->VALUE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DISC->Visible) { // DISC ?>
        <td <?= $Page->DISC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DISC" class="pharmacy_pharled_DISC">
<span<?= $Page->DISC->viewAttributes() ?>>
<?= $Page->DISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <td <?= $Page->TAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_TAXP" class="pharmacy_pharled_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAX->Visible) { // TAX ?>
        <td <?= $Page->TAX->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_TAX" class="pharmacy_pharled_TAX">
<span<?= $Page->TAX->viewAttributes() ?>>
<?= $Page->TAX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAXR->Visible) { // TAXR ?>
        <td <?= $Page->TAXR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_TAXR" class="pharmacy_pharled_TAXR">
<span<?= $Page->TAXR->viewAttributes() ?>>
<?= $Page->TAXR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td <?= $Page->DAMT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT">
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EMPNO->Visible) { // EMPNO ?>
        <td <?= $Page->EMPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_EMPNO" class="pharmacy_pharled_EMPNO">
<span<?= $Page->EMPNO->viewAttributes() ?>>
<?= $Page->EMPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <td <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PC" class="pharmacy_pharled_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DRNAME->Visible) { // DRNAME ?>
        <td <?= $Page->DRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DRNAME" class="pharmacy_pharled_DRNAME">
<span<?= $Page->DRNAME->viewAttributes() ?>>
<?= $Page->DRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BTIME->Visible) { // BTIME ?>
        <td <?= $Page->BTIME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BTIME" class="pharmacy_pharled_BTIME">
<span<?= $Page->BTIME->viewAttributes() ?>>
<?= $Page->BTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ONO->Visible) { // ONO ?>
        <td <?= $Page->ONO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_ONO" class="pharmacy_pharled_ONO">
<span<?= $Page->ONO->viewAttributes() ?>>
<?= $Page->ONO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ODT->Visible) { // ODT ?>
        <td <?= $Page->ODT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_ODT" class="pharmacy_pharled_ODT">
<span<?= $Page->ODT->viewAttributes() ?>>
<?= $Page->ODT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PURRT->Visible) { // PURRT ?>
        <td <?= $Page->PURRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PURRT" class="pharmacy_pharled_PURRT">
<span<?= $Page->PURRT->viewAttributes() ?>>
<?= $Page->PURRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GRP->Visible) { // GRP ?>
        <td <?= $Page->GRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_GRP" class="pharmacy_pharled_GRP">
<span<?= $Page->GRP->viewAttributes() ?>>
<?= $Page->GRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IBATCH->Visible) { // IBATCH ?>
        <td <?= $Page->IBATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_IBATCH" class="pharmacy_pharled_IBATCH">
<span<?= $Page->IBATCH->viewAttributes() ?>>
<?= $Page->IBATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
        <td <?= $Page->IPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_IPNO" class="pharmacy_pharled_IPNO">
<span<?= $Page->IPNO->viewAttributes() ?>>
<?= $Page->IPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
        <td <?= $Page->OPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_OPNO" class="pharmacy_pharled_OPNO">
<span<?= $Page->OPNO->viewAttributes() ?>>
<?= $Page->OPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RECID->Visible) { // RECID ?>
        <td <?= $Page->RECID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_RECID" class="pharmacy_pharled_RECID">
<span<?= $Page->RECID->viewAttributes() ?>>
<?= $Page->RECID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FQTY->Visible) { // FQTY ?>
        <td <?= $Page->FQTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_FQTY" class="pharmacy_pharled_FQTY">
<span<?= $Page->FQTY->viewAttributes() ?>>
<?= $Page->FQTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <td <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_UR" class="pharmacy_pharled_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DCID->Visible) { // DCID ?>
        <td <?= $Page->DCID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DCID" class="pharmacy_pharled_DCID">
<span<?= $Page->DCID->viewAttributes() ?>>
<?= $Page->DCID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <td <?= $Page->_USERID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID">
<span<?= $Page->_USERID->viewAttributes() ?>>
<?= $Page->_USERID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MODDT->Visible) { // MODDT ?>
        <td <?= $Page->MODDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_MODDT" class="pharmacy_pharled_MODDT">
<span<?= $Page->MODDT->viewAttributes() ?>>
<?= $Page->MODDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FYM->Visible) { // FYM ?>
        <td <?= $Page->FYM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_FYM" class="pharmacy_pharled_FYM">
<span<?= $Page->FYM->viewAttributes() ?>>
<?= $Page->FYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRCBATCH->Visible) { // PRCBATCH ?>
        <td <?= $Page->PRCBATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PRCBATCH" class="pharmacy_pharled_PRCBATCH">
<span<?= $Page->PRCBATCH->viewAttributes() ?>>
<?= $Page->PRCBATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <td <?= $Page->SLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO">
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <td <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_MRP" class="pharmacy_pharled_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLYM->Visible) { // BILLYM ?>
        <td <?= $Page->BILLYM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BILLYM" class="pharmacy_pharled_BILLYM">
<span<?= $Page->BILLYM->viewAttributes() ?>>
<?= $Page->BILLYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLGRP->Visible) { // BILLGRP ?>
        <td <?= $Page->BILLGRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BILLGRP" class="pharmacy_pharled_BILLGRP">
<span<?= $Page->BILLGRP->viewAttributes() ?>>
<?= $Page->BILLGRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STAFF->Visible) { // STAFF ?>
        <td <?= $Page->STAFF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_STAFF" class="pharmacy_pharled_STAFF">
<span<?= $Page->STAFF->viewAttributes() ?>>
<?= $Page->STAFF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TEMPIPNO->Visible) { // TEMPIPNO ?>
        <td <?= $Page->TEMPIPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_TEMPIPNO" class="pharmacy_pharled_TEMPIPNO">
<span<?= $Page->TEMPIPNO->viewAttributes() ?>>
<?= $Page->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRNTED->Visible) { // PRNTED ?>
        <td <?= $Page->PRNTED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PRNTED" class="pharmacy_pharled_PRNTED">
<span<?= $Page->PRNTED->viewAttributes() ?>>
<?= $Page->PRNTED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PATNAME->Visible) { // PATNAME ?>
        <td <?= $Page->PATNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PATNAME" class="pharmacy_pharled_PATNAME">
<span<?= $Page->PATNAME->viewAttributes() ?>>
<?= $Page->PATNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PJVNO->Visible) { // PJVNO ?>
        <td <?= $Page->PJVNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PJVNO" class="pharmacy_pharled_PJVNO">
<span<?= $Page->PJVNO->viewAttributes() ?>>
<?= $Page->PJVNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PJVSLNO->Visible) { // PJVSLNO ?>
        <td <?= $Page->PJVSLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PJVSLNO" class="pharmacy_pharled_PJVSLNO">
<span<?= $Page->PJVSLNO->viewAttributes() ?>>
<?= $Page->PJVSLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OTHDISC->Visible) { // OTHDISC ?>
        <td <?= $Page->OTHDISC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_OTHDISC" class="pharmacy_pharled_OTHDISC">
<span<?= $Page->OTHDISC->viewAttributes() ?>>
<?= $Page->OTHDISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PJVYM->Visible) { // PJVYM ?>
        <td <?= $Page->PJVYM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PJVYM" class="pharmacy_pharled_PJVYM">
<span<?= $Page->PJVYM->viewAttributes() ?>>
<?= $Page->PJVYM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PURDISCPER->Visible) { // PURDISCPER ?>
        <td <?= $Page->PURDISCPER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PURDISCPER" class="pharmacy_pharled_PURDISCPER">
<span<?= $Page->PURDISCPER->viewAttributes() ?>>
<?= $Page->PURDISCPER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CASHIER->Visible) { // CASHIER ?>
        <td <?= $Page->CASHIER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_CASHIER" class="pharmacy_pharled_CASHIER">
<span<?= $Page->CASHIER->viewAttributes() ?>>
<?= $Page->CASHIER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CASHTIME->Visible) { // CASHTIME ?>
        <td <?= $Page->CASHTIME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_CASHTIME" class="pharmacy_pharled_CASHTIME">
<span<?= $Page->CASHTIME->viewAttributes() ?>>
<?= $Page->CASHTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CASHRECD->Visible) { // CASHRECD ?>
        <td <?= $Page->CASHRECD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_CASHRECD" class="pharmacy_pharled_CASHRECD">
<span<?= $Page->CASHRECD->viewAttributes() ?>>
<?= $Page->CASHRECD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CASHREFNO->Visible) { // CASHREFNO ?>
        <td <?= $Page->CASHREFNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_CASHREFNO" class="pharmacy_pharled_CASHREFNO">
<span<?= $Page->CASHREFNO->viewAttributes() ?>>
<?= $Page->CASHREFNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
        <td <?= $Page->CASHIERSHIFT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_CASHIERSHIFT" class="pharmacy_pharled_CASHIERSHIFT">
<span<?= $Page->CASHIERSHIFT->viewAttributes() ?>>
<?= $Page->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <td <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PRCODE" class="pharmacy_pharled_PRCODE">
<span<?= $Page->PRCODE->viewAttributes() ?>>
<?= $Page->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RELEASEBY->Visible) { // RELEASEBY ?>
        <td <?= $Page->RELEASEBY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_RELEASEBY" class="pharmacy_pharled_RELEASEBY">
<span<?= $Page->RELEASEBY->viewAttributes() ?>>
<?= $Page->RELEASEBY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CRAUTHOR->Visible) { // CRAUTHOR ?>
        <td <?= $Page->CRAUTHOR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_CRAUTHOR" class="pharmacy_pharled_CRAUTHOR">
<span<?= $Page->CRAUTHOR->viewAttributes() ?>>
<?= $Page->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PAYMENT->Visible) { // PAYMENT ?>
        <td <?= $Page->PAYMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PAYMENT" class="pharmacy_pharled_PAYMENT">
<span<?= $Page->PAYMENT->viewAttributes() ?>>
<?= $Page->PAYMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <td <?= $Page->DRID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DRID" class="pharmacy_pharled_DRID">
<span<?= $Page->DRID->viewAttributes() ?>>
<?= $Page->DRID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WARD->Visible) { // WARD ?>
        <td <?= $Page->WARD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_WARD" class="pharmacy_pharled_WARD">
<span<?= $Page->WARD->viewAttributes() ?>>
<?= $Page->WARD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STAXTYPE->Visible) { // STAXTYPE ?>
        <td <?= $Page->STAXTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_STAXTYPE" class="pharmacy_pharled_STAXTYPE">
<span<?= $Page->STAXTYPE->viewAttributes() ?>>
<?= $Page->STAXTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PURDISCVAL->Visible) { // PURDISCVAL ?>
        <td <?= $Page->PURDISCVAL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PURDISCVAL" class="pharmacy_pharled_PURDISCVAL">
<span<?= $Page->PURDISCVAL->viewAttributes() ?>>
<?= $Page->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RNDOFF->Visible) { // RNDOFF ?>
        <td <?= $Page->RNDOFF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_RNDOFF" class="pharmacy_pharled_RNDOFF">
<span<?= $Page->RNDOFF->viewAttributes() ?>>
<?= $Page->RNDOFF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DISCONMRP->Visible) { // DISCONMRP ?>
        <td <?= $Page->DISCONMRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DISCONMRP" class="pharmacy_pharled_DISCONMRP">
<span<?= $Page->DISCONMRP->viewAttributes() ?>>
<?= $Page->DISCONMRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DELVDT->Visible) { // DELVDT ?>
        <td <?= $Page->DELVDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DELVDT" class="pharmacy_pharled_DELVDT">
<span<?= $Page->DELVDT->viewAttributes() ?>>
<?= $Page->DELVDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DELVTIME->Visible) { // DELVTIME ?>
        <td <?= $Page->DELVTIME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DELVTIME" class="pharmacy_pharled_DELVTIME">
<span<?= $Page->DELVTIME->viewAttributes() ?>>
<?= $Page->DELVTIME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DELVBY->Visible) { // DELVBY ?>
        <td <?= $Page->DELVBY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DELVBY" class="pharmacy_pharled_DELVBY">
<span<?= $Page->DELVBY->viewAttributes() ?>>
<?= $Page->DELVBY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HOSPNO->Visible) { // HOSPNO ?>
        <td <?= $Page->HOSPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_HOSPNO" class="pharmacy_pharled_HOSPNO">
<span<?= $Page->HOSPNO->viewAttributes() ?>>
<?= $Page->HOSPNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_id" class="pharmacy_pharled_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pbv->Visible) { // pbv ?>
        <td <?= $Page->pbv->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_pbv" class="pharmacy_pharled_pbv">
<span<?= $Page->pbv->viewAttributes() ?>>
<?= $Page->pbv->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pbt->Visible) { // pbt ?>
        <td <?= $Page->pbt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_pbt" class="pharmacy_pharled_pbt">
<span<?= $Page->pbt->viewAttributes() ?>>
<?= $Page->pbt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <td <?= $Page->SiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo">
<span<?= $Page->SiNo->viewAttributes() ?>>
<?= $Page->SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <td <?= $Page->Product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Product" class="pharmacy_pharled_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <td <?= $Page->Mfg->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg">
<span<?= $Page->Mfg->viewAttributes() ?>>
<?= $Page->Mfg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td <?= $Page->HosoID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_MFRCODE" class="pharmacy_pharled_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Reception" class="pharmacy_pharled_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <td <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PatID" class="pharmacy_pharled_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_mrnno" class="pharmacy_pharled_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME">
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
