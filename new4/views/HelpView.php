<?php

namespace PHPMaker2021\HIMS;

// Page object
$HelpView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhelpview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhelpview = currentForm = new ew.Form("fhelpview", "view");
    loadjs.done("fhelpview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.help) ew.vars.tables.help = <?= JsonEncode(GetClientVar("tables", "help")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fhelpview" id="fhelpview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="help">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_help_id"><template id="tpc_help_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_help_id"><span id="el_help_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tittle->Visible) { // Tittle ?>
    <tr id="r_Tittle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_help_Tittle"><template id="tpc_help_Tittle"><?= $Page->Tittle->caption() ?></template></span></td>
        <td data-name="Tittle" <?= $Page->Tittle->cellAttributes() ?>>
<template id="tpx_help_Tittle"><span id="el_help_Tittle">
<span<?= $Page->Tittle->viewAttributes() ?>>
<?= $Page->Tittle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Description->Visible) { // Description ?>
    <tr id="r_Description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_help_Description"><template id="tpc_help_Description"><?= $Page->Description->caption() ?></template></span></td>
        <td data-name="Description" <?= $Page->Description->cellAttributes() ?>>
<template id="tpx_help_Description"><span id="el_help_Description">
<span<?= $Page->Description->viewAttributes() ?>>
<?= $Page->Description->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->orderid->Visible) { // orderid ?>
    <tr id="r_orderid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_help_orderid"><template id="tpc_help_orderid"><?= $Page->orderid->caption() ?></template></span></td>
        <td data-name="orderid" <?= $Page->orderid->cellAttributes() ?>>
<template id="tpx_help_orderid"><span id="el_help_orderid">
<span<?= $Page->orderid->viewAttributes() ?>>
<?= $Page->orderid->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_helpview" class="ew-custom-template"></div>
<template id="tpm_helpview">
<div id="ct_HelpView"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<slot class="ew-slot" name="tpc_help_Description"></slot>&nbsp;<slot class="ew-slot" name="tpx_help_Description"></slot>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_helpview", "tpm_helpview", "helpview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
