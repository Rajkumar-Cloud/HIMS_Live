<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIvfOocytedenudationEmbryologyChartUpdate = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_ivf_oocytedenudation_embryology_chartupdate;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "update";
    fview_ivf_oocytedenudation_embryology_chartupdate = currentForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartupdate", "update");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_ivf_oocytedenudation_embryology_chart")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_ivf_oocytedenudation_embryology_chart)
        ew.vars.tables.view_ivf_oocytedenudation_embryology_chart = currentTable;
    fview_ivf_oocytedenudation_embryology_chartupdate.addFields([
        ["OocyteNo", [fields.OocyteNo.visible && fields.OocyteNo.required ? ew.Validators.required(fields.OocyteNo.caption) : null], fields.OocyteNo.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer, ew.Validators.selected], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Day0OocyteStage", [fields.Day0OocyteStage.visible && fields.Day0OocyteStage.required ? ew.Validators.required(fields.Day0OocyteStage.caption) : null], fields.Day0OocyteStage.isInvalid],
        ["Day0sino", [fields.Day0sino.visible && fields.Day0sino.required ? ew.Validators.required(fields.Day0sino.caption) : null], fields.Day0sino.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer, ew.Validators.selected], fields.TidNo.isInvalid],
        ["DidNO", [fields.DidNO.visible && fields.DidNO.required ? ew.Validators.required(fields.DidNO.caption) : null], fields.DidNO.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_ivf_oocytedenudation_embryology_chartupdate,
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
    fview_ivf_oocytedenudation_embryology_chartupdate.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        if (!ew.updateSelected(fobj)) {
            ew.alert(ew.language.phrase("NoFieldSelected"));
            return false;
        }
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
        return true;
    }

    // Form_CustomValidate
    fview_ivf_oocytedenudation_embryology_chartupdate.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_ivf_oocytedenudation_embryology_chartupdate.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fview_ivf_oocytedenudation_embryology_chartupdate");
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
<form name="fview_ivf_oocytedenudation_embryology_chartupdate" id="fview_ivf_oocytedenudation_embryology_chartupdate" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_view_ivf_oocytedenudation_embryology_chartupdate" class="ew-update-div"><!-- page -->
    <?php if (!$Page->isConfirm()) { // Confirm page ?>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="custom-control-label" for="u"><?= $Language->phrase("UpdateSelectAll") ?></label>
    </div>
    <?php } ?>
<?php if ($Page->OocyteNo->Visible && (!$Page->isConfirm() || $Page->OocyteNo->multiUpdateSelected())) { // OocyteNo ?>
    <div id="r_OocyteNo" class="form-group row">
        <label for="x_OocyteNo" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_OocyteNo" id="u_OocyteNo" class="custom-control-input ew-multi-select" value="1"<?= $Page->OocyteNo->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_OocyteNo"><?= $Page->OocyteNo->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->OocyteNo->cellAttributes() ?>>
                <span id="el_view_ivf_oocytedenudation_embryology_chart_OocyteNo">
                <input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_OocyteNo" name="x_OocyteNo" id="x_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?> aria-describedby="x_OocyteNo_help">
                <?= $Page->OocyteNo->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Stage->Visible && (!$Page->isConfirm() || $Page->Stage->multiUpdateSelected())) { // Stage ?>
    <div id="r_Stage" class="form-group row">
        <label for="x_Stage" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Stage" id="u_Stage" class="custom-control-input ew-multi-select" value="1"<?= $Page->Stage->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Stage"><?= $Page->Stage->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Stage->cellAttributes() ?>>
                <span id="el_view_ivf_oocytedenudation_embryology_chart_Stage">
                <input type="<?= $Page->Stage->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Stage" name="x_Stage" id="x_Stage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>" value="<?= $Page->Stage->EditValue ?>"<?= $Page->Stage->editAttributes() ?> aria-describedby="x_Stage_help">
                <?= $Page->Stage->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible && (!$Page->isConfirm() || $Page->RIDNo->multiUpdateSelected())) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_RIDNo" id="u_RIDNo" class="custom-control-input ew-multi-select" value="1"<?= $Page->RIDNo->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_RIDNo"><?= $Page->RIDNo->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->RIDNo->cellAttributes() ?>>
                <span id="el_view_ivf_oocytedenudation_embryology_chart_RIDNo">
                <input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
                <?= $Page->RIDNo->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible && (!$Page->isConfirm() || $Page->Name->multiUpdateSelected())) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label for="x_Name" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Name" id="u_Name" class="custom-control-input ew-multi-select" value="1"<?= $Page->Name->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Name"><?= $Page->Name->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Name->cellAttributes() ?>>
                <span id="el_view_ivf_oocytedenudation_embryology_chart_Name">
                <input type="<?= $Page->Name->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
                <?= $Page->Name->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible && (!$Page->isConfirm() || $Page->Day0OocyteStage->multiUpdateSelected())) { // Day0OocyteStage ?>
    <div id="r_Day0OocyteStage" class="form-group row">
        <label for="x_Day0OocyteStage" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Day0OocyteStage" id="u_Day0OocyteStage" class="custom-control-input ew-multi-select" value="1"<?= $Page->Day0OocyteStage->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Day0OocyteStage"><?= $Page->Day0OocyteStage->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Day0OocyteStage->cellAttributes() ?>>
                <span id="el_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
                <input type="<?= $Page->Day0OocyteStage->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0OocyteStage" name="x_Day0OocyteStage" id="x_Day0OocyteStage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Page->Day0OocyteStage->EditValue ?>"<?= $Page->Day0OocyteStage->editAttributes() ?> aria-describedby="x_Day0OocyteStage_help">
                <?= $Page->Day0OocyteStage->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Day0OocyteStage->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Day0sino->Visible && (!$Page->isConfirm() || $Page->Day0sino->multiUpdateSelected())) { // Day0sino ?>
    <div id="r_Day0sino" class="form-group row">
        <label for="x_Day0sino" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Day0sino" id="u_Day0sino" class="custom-control-input ew-multi-select" value="1"<?= $Page->Day0sino->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Day0sino"><?= $Page->Day0sino->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Day0sino->cellAttributes() ?>>
                <span id="el_view_ivf_oocytedenudation_embryology_chart_Day0sino">
                <input type="<?= $Page->Day0sino->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0sino" name="x_Day0sino" id="x_Day0sino" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0sino->getPlaceHolder()) ?>" value="<?= $Page->Day0sino->EditValue ?>"<?= $Page->Day0sino->editAttributes() ?> aria-describedby="x_Day0sino_help">
                <?= $Page->Day0sino->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Day0sino->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible && (!$Page->isConfirm() || $Page->TidNo->multiUpdateSelected())) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label for="x_TidNo" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_TidNo" id="u_TidNo" class="custom-control-input ew-multi-select" value="1"<?= $Page->TidNo->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_TidNo"><?= $Page->TidNo->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->TidNo->cellAttributes() ?>>
                <span id="el_view_ivf_oocytedenudation_embryology_chart_TidNo">
                <input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
                <?= $Page->TidNo->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->DidNO->Visible && (!$Page->isConfirm() || $Page->DidNO->multiUpdateSelected())) { // DidNO ?>
    <div id="r_DidNO" class="form-group row">
        <label for="x_DidNO" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_DidNO" id="u_DidNO" class="custom-control-input ew-multi-select" value="1"<?= $Page->DidNO->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_DidNO"><?= $Page->DidNO->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->DidNO->cellAttributes() ?>>
                <span id="el_view_ivf_oocytedenudation_embryology_chart_DidNO">
                <input type="<?= $Page->DidNO->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" name="x_DidNO" id="x_DidNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DidNO->getPlaceHolder()) ?>" value="<?= $Page->DidNO->EditValue ?>"<?= $Page->DidNO->editAttributes() ?> aria-describedby="x_DidNO_help">
                <?= $Page->DidNO->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->DidNO->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible && (!$Page->isConfirm() || $Page->Remarks->multiUpdateSelected())) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label for="x_Remarks" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Remarks" id="u_Remarks" class="custom-control-input ew-multi-select" value="1"<?= $Page->Remarks->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Remarks"><?= $Page->Remarks->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Remarks->cellAttributes() ?>>
                <span id="el_view_ivf_oocytedenudation_embryology_chart_Remarks">
                <input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help">
                <?= $Page->Remarks->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
</div><!-- /page -->
<?php if (!$Page->IsModal) { ?>
    <div class="form-group row"><!-- buttons .form-group -->
        <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("UpdateBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
        </div><!-- /buttons offset -->
    </div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("view_ivf_oocytedenudation_embryology_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
