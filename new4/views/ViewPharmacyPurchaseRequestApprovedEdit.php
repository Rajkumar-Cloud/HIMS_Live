<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPurchaseRequestApprovedEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_purchase_request_approvededit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_pharmacy_purchase_request_approvededit = currentForm = new ew.Form("fview_pharmacy_purchase_request_approvededit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_purchase_request_approved")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_pharmacy_purchase_request_approved)
        ew.vars.tables.view_pharmacy_purchase_request_approved = currentTable;
    fview_pharmacy_purchase_request_approvededit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["DT", [fields.DT.visible && fields.DT.required ? ew.Validators.required(fields.DT.caption) : null], fields.DT.isInvalid],
        ["EmployeeName", [fields.EmployeeName.visible && fields.EmployeeName.required ? ew.Validators.required(fields.EmployeeName.caption) : null], fields.EmployeeName.isInvalid],
        ["Department", [fields.Department.visible && fields.Department.required ? ew.Validators.required(fields.Department.caption) : null], fields.Department.isInvalid],
        ["ApprovedStatus", [fields.ApprovedStatus.visible && fields.ApprovedStatus.required ? ew.Validators.required(fields.ApprovedStatus.caption) : null], fields.ApprovedStatus.isInvalid],
        ["PurchaseStatus", [fields.PurchaseStatus.visible && fields.PurchaseStatus.required ? ew.Validators.required(fields.PurchaseStatus.caption) : null], fields.PurchaseStatus.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_pharmacy_purchase_request_approvededit,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fview_pharmacy_purchase_request_approvededit.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    fview_pharmacy_purchase_request_approvededit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_purchase_request_approvededit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_purchase_request_approvededit.lists.ApprovedStatus = <?= $Page->ApprovedStatus->toClientList($Page) ?>;
    loadjs.done("fview_pharmacy_purchase_request_approvededit");
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
<form name="fview_pharmacy_purchase_request_approvededit" id="fview_pharmacy_purchase_request_approvededit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_approved">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_id"><span id="el_view_pharmacy_purchase_request_approved_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_DT" for="x_DT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_DT"><?= $Page->DT->caption() ?><?= $Page->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_DT"><span id="el_view_pharmacy_purchase_request_approved_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DT->getDisplayValue($Page->DT->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_DT" data-hidden="1" name="x_DT" id="x_DT" value="<?= HtmlEncode($Page->DT->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmployeeName->Visible) { // EmployeeName ?>
    <div id="r_EmployeeName" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_EmployeeName" for="x_EmployeeName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_EmployeeName"><?= $Page->EmployeeName->caption() ?><?= $Page->EmployeeName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmployeeName->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_EmployeeName"><span id="el_view_pharmacy_purchase_request_approved_EmployeeName">
<span<?= $Page->EmployeeName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->EmployeeName->getDisplayValue($Page->EmployeeName->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_EmployeeName" data-hidden="1" name="x_EmployeeName" id="x_EmployeeName" value="<?= HtmlEncode($Page->EmployeeName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <div id="r_Department" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_Department" for="x_Department" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_Department"><?= $Page->Department->caption() ?><?= $Page->Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Department->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_Department"><span id="el_view_pharmacy_purchase_request_approved_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Department->getDisplayValue($Page->Department->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_Department" data-hidden="1" name="x_Department" id="x_Department" value="<?= HtmlEncode($Page->Department->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
    <div id="r_ApprovedStatus" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_ApprovedStatus" for="x_ApprovedStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_ApprovedStatus"><?= $Page->ApprovedStatus->caption() ?><?= $Page->ApprovedStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ApprovedStatus->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_ApprovedStatus"><span id="el_view_pharmacy_purchase_request_approved_ApprovedStatus">
    <select
        id="x_ApprovedStatus"
        name="x_ApprovedStatus"
        class="form-control ew-select<?= $Page->ApprovedStatus->isInvalidClass() ?>"
        data-select2-id="view_pharmacy_purchase_request_approved_x_ApprovedStatus"
        data-table="view_pharmacy_purchase_request_approved"
        data-field="x_ApprovedStatus"
        data-value-separator="<?= $Page->ApprovedStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ApprovedStatus->getPlaceHolder()) ?>"
        <?= $Page->ApprovedStatus->editAttributes() ?>>
        <?= $Page->ApprovedStatus->selectOptionListHtml("x_ApprovedStatus") ?>
    </select>
    <?= $Page->ApprovedStatus->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ApprovedStatus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_pharmacy_purchase_request_approved_x_ApprovedStatus']"),
        options = { name: "x_ApprovedStatus", selectId: "view_pharmacy_purchase_request_approved_x_ApprovedStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_pharmacy_purchase_request_approved.fields.ApprovedStatus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_pharmacy_purchase_request_approved.fields.ApprovedStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
    <div id="r_PurchaseStatus" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_PurchaseStatus" for="x_PurchaseStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_PurchaseStatus"><?= $Page->PurchaseStatus->caption() ?><?= $Page->PurchaseStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurchaseStatus->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_PurchaseStatus"><span id="el_view_pharmacy_purchase_request_approved_PurchaseStatus">
<span<?= $Page->PurchaseStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PurchaseStatus->getDisplayValue($Page->PurchaseStatus->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_PurchaseStatus" data-hidden="1" name="x_PurchaseStatus" id="x_PurchaseStatus" value="<?= HtmlEncode($Page->PurchaseStatus->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_HospID"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_HospID"><span id="el_view_pharmacy_purchase_request_approved_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->HospID->getDisplayValue($Page->HospID->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_HospID" data-hidden="1" name="x_HospID" id="x_HospID" value="<?= HtmlEncode($Page->HospID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_createdby"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_createdby"><span id="el_view_pharmacy_purchase_request_approved_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createdby->getDisplayValue($Page->createdby->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_createdby" data-hidden="1" name="x_createdby" id="x_createdby" value="<?= HtmlEncode($Page->createdby->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_createddatetime"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_createddatetime"><span id="el_view_pharmacy_purchase_request_approved_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createddatetime->getDisplayValue($Page->createddatetime->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_createddatetime" data-hidden="1" name="x_createddatetime" id="x_createddatetime" value="<?= HtmlEncode($Page->createddatetime->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_modifiedby"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_modifiedby"><span id="el_view_pharmacy_purchase_request_approved_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->modifiedby->getDisplayValue($Page->modifiedby->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_modifiedby" data-hidden="1" name="x_modifiedby" id="x_modifiedby" value="<?= HtmlEncode($Page->modifiedby->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_modifieddatetime"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_modifieddatetime"><span id="el_view_pharmacy_purchase_request_approved_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->modifieddatetime->getDisplayValue($Page->modifieddatetime->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_modifieddatetime" data-hidden="1" name="x_modifieddatetime" id="x_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_approved_BRCODE" for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_pharmacy_purchase_request_approved_BRCODE"><?= $Page->BRCODE->caption() ?><?= $Page->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
<template id="tpx_view_pharmacy_purchase_request_approved_BRCODE"><span id="el_view_pharmacy_purchase_request_approved_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BRCODE->getDisplayValue($Page->BRCODE->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_pharmacy_purchase_request_approved" data-field="x_BRCODE" data-hidden="1" name="x_BRCODE" id="x_BRCODE" value="<?= HtmlEncode($Page->BRCODE->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_pharmacy_purchase_request_approvededit" class="ew-custom-template"></div>
<template id="tpm_view_pharmacy_purchase_request_approvededit">
<div id="ct_ViewPharmacyPurchaseRequestApprovedEdit"><style>
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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_approved_EmployeeName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_approved_EmployeeName"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_approved_Department"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_approved_Department"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_approved_DT"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_approved_DT"></slot></h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_pharmacy_purchase_request_approved_ApprovedStatus"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_pharmacy_purchase_request_approved_ApprovedStatus"></slot></h3>
	</div>
</div>	
</div>
</template>
<?php
    if (in_array("view_pharmacy_purchase_request_items_approved", explode(",", $Page->getCurrentDetailTable())) && $view_pharmacy_purchase_request_items_approved->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("view_pharmacy_purchase_request_items_approved", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ViewPharmacyPurchaseRequestItemsApprovedGrid.php" ?>
<?php } ?>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_pharmacy_purchase_request_approvededit", "tpm_view_pharmacy_purchase_request_approvededit", "view_pharmacy_purchase_request_approvededit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("view_pharmacy_purchase_request_approved");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
