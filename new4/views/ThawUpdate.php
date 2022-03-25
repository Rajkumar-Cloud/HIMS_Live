<?php

namespace PHPMaker2021\HIMS;

// Page object
$ThawUpdate = &$Page;
?>
<script>
var currentForm, currentPageID;
var fthawupdate;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "update";
    fthawupdate = currentForm = new ew.Form("fthawupdate", "update");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "thaw")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.thaw)
        ew.vars.tables.thaw = currentTable;
    fthawupdate.addFields([
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null], fields.RIDNo.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["TiDNo", [fields.TiDNo.visible && fields.TiDNo.required ? ew.Validators.required(fields.TiDNo.caption) : null], fields.TiDNo.isInvalid],
        ["thawDate", [fields.thawDate.visible && fields.thawDate.required ? ew.Validators.required(fields.thawDate.caption) : null, ew.Validators.datetime(0), ew.Validators.selected], fields.thawDate.isInvalid],
        ["thawPrimaryEmbryologist", [fields.thawPrimaryEmbryologist.visible && fields.thawPrimaryEmbryologist.required ? ew.Validators.required(fields.thawPrimaryEmbryologist.caption) : null], fields.thawPrimaryEmbryologist.isInvalid],
        ["thawSecondaryEmbryologist", [fields.thawSecondaryEmbryologist.visible && fields.thawSecondaryEmbryologist.required ? ew.Validators.required(fields.thawSecondaryEmbryologist.caption) : null], fields.thawSecondaryEmbryologist.isInvalid],
        ["thawReFrozen", [fields.thawReFrozen.visible && fields.thawReFrozen.required ? ew.Validators.required(fields.thawReFrozen.caption) : null], fields.thawReFrozen.isInvalid],
        ["vitrificationDate", [fields.vitrificationDate.visible && fields.vitrificationDate.required ? ew.Validators.required(fields.vitrificationDate.caption) : null], fields.vitrificationDate.isInvalid],
        ["PrimaryEmbryologist", [fields.PrimaryEmbryologist.visible && fields.PrimaryEmbryologist.required ? ew.Validators.required(fields.PrimaryEmbryologist.caption) : null], fields.PrimaryEmbryologist.isInvalid],
        ["SecondaryEmbryologist", [fields.SecondaryEmbryologist.visible && fields.SecondaryEmbryologist.required ? ew.Validators.required(fields.SecondaryEmbryologist.caption) : null], fields.SecondaryEmbryologist.isInvalid],
        ["EmbryoNo", [fields.EmbryoNo.visible && fields.EmbryoNo.required ? ew.Validators.required(fields.EmbryoNo.caption) : null], fields.EmbryoNo.isInvalid],
        ["FertilisationDate", [fields.FertilisationDate.visible && fields.FertilisationDate.required ? ew.Validators.required(fields.FertilisationDate.caption) : null], fields.FertilisationDate.isInvalid],
        ["Day", [fields.Day.visible && fields.Day.required ? ew.Validators.required(fields.Day.caption) : null], fields.Day.isInvalid],
        ["Grade", [fields.Grade.visible && fields.Grade.required ? ew.Validators.required(fields.Grade.caption) : null], fields.Grade.isInvalid],
        ["Incubator", [fields.Incubator.visible && fields.Incubator.required ? ew.Validators.required(fields.Incubator.caption) : null], fields.Incubator.isInvalid],
        ["Tank", [fields.Tank.visible && fields.Tank.required ? ew.Validators.required(fields.Tank.caption) : null], fields.Tank.isInvalid],
        ["Canister", [fields.Canister.visible && fields.Canister.required ? ew.Validators.required(fields.Canister.caption) : null], fields.Canister.isInvalid],
        ["Gobiet", [fields.Gobiet.visible && fields.Gobiet.required ? ew.Validators.required(fields.Gobiet.caption) : null], fields.Gobiet.isInvalid],
        ["CryolockNo", [fields.CryolockNo.visible && fields.CryolockNo.required ? ew.Validators.required(fields.CryolockNo.caption) : null], fields.CryolockNo.isInvalid],
        ["CryolockColour", [fields.CryolockColour.visible && fields.CryolockColour.required ? ew.Validators.required(fields.CryolockColour.caption) : null], fields.CryolockColour.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fthawupdate,
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
    fthawupdate.validate = function () {
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
    fthawupdate.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fthawupdate.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fthawupdate.lists.thawReFrozen = <?= $Page->thawReFrozen->toClientList($Page) ?>;
    fthawupdate.lists.Day = <?= $Page->Day->toClientList($Page) ?>;
    fthawupdate.lists.Grade = <?= $Page->Grade->toClientList($Page) ?>;
    loadjs.done("fthawupdate");
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
<form name="fthawupdate" id="fthawupdate" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="thaw">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_thawupdate" class="ew-update-div"><!-- page -->
    <?php if (!$Page->isConfirm()) { // Confirm page ?>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="custom-control-label" for="u"><?= $Language->phrase("UpdateSelectAll") ?></label>
    </div>
    <?php } ?>
<?php if ($Page->thawDate->Visible && (!$Page->isConfirm() || $Page->thawDate->multiUpdateSelected())) { // thawDate ?>
    <div id="r_thawDate" class="form-group row">
        <label for="x_thawDate" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_thawDate" id="u_thawDate" class="custom-control-input ew-multi-select" value="1"<?= $Page->thawDate->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_thawDate"><?= $Page->thawDate->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->thawDate->cellAttributes() ?>>
                <span id="el_thaw_thawDate">
                <input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="thaw" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?> aria-describedby="x_thawDate_help">
                <?= $Page->thawDate->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
                <?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
                <script>
                loadjs.ready(["fthawupdate", "datetimepicker"], function() {
                    ew.createDateTimePicker("fthawupdate", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
                });
                </script>
                <?php } ?>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible && (!$Page->isConfirm() || $Page->thawPrimaryEmbryologist->multiUpdateSelected())) { // thawPrimaryEmbryologist ?>
    <div id="r_thawPrimaryEmbryologist" class="form-group row">
        <label for="x_thawPrimaryEmbryologist" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_thawPrimaryEmbryologist" id="u_thawPrimaryEmbryologist" class="custom-control-input ew-multi-select" value="1"<?= $Page->thawPrimaryEmbryologist->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_thawPrimaryEmbryologist"><?= $Page->thawPrimaryEmbryologist->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
                <span id="el_thaw_thawPrimaryEmbryologist">
                <input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?> aria-describedby="x_thawPrimaryEmbryologist_help">
                <?= $Page->thawPrimaryEmbryologist->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible && (!$Page->isConfirm() || $Page->thawSecondaryEmbryologist->multiUpdateSelected())) { // thawSecondaryEmbryologist ?>
    <div id="r_thawSecondaryEmbryologist" class="form-group row">
        <label for="x_thawSecondaryEmbryologist" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_thawSecondaryEmbryologist" id="u_thawSecondaryEmbryologist" class="custom-control-input ew-multi-select" value="1"<?= $Page->thawSecondaryEmbryologist->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_thawSecondaryEmbryologist"><?= $Page->thawSecondaryEmbryologist->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
                <span id="el_thaw_thawSecondaryEmbryologist">
                <input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?> aria-describedby="x_thawSecondaryEmbryologist_help">
                <?= $Page->thawSecondaryEmbryologist->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible && (!$Page->isConfirm() || $Page->thawReFrozen->multiUpdateSelected())) { // thawReFrozen ?>
    <div id="r_thawReFrozen" class="form-group row">
        <label for="x_thawReFrozen" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_thawReFrozen" id="u_thawReFrozen" class="custom-control-input ew-multi-select" value="1"<?= $Page->thawReFrozen->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_thawReFrozen"><?= $Page->thawReFrozen->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->thawReFrozen->cellAttributes() ?>>
                <span id="el_thaw_thawReFrozen">
                    <select
                        id="x_thawReFrozen"
                        name="x_thawReFrozen"
                        class="form-control ew-select<?= $Page->thawReFrozen->isInvalidClass() ?>"
                        data-select2-id="thaw_x_thawReFrozen"
                        data-table="thaw"
                        data-field="x_thawReFrozen"
                        data-value-separator="<?= $Page->thawReFrozen->displayValueSeparatorAttribute() ?>"
                        data-placeholder="<?= HtmlEncode($Page->thawReFrozen->getPlaceHolder()) ?>"
                        <?= $Page->thawReFrozen->editAttributes() ?>>
                        <?= $Page->thawReFrozen->selectOptionListHtml("x_thawReFrozen") ?>
                    </select>
                    <?= $Page->thawReFrozen->getCustomMessage() ?>
                    <div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
                <script>
                loadjs.ready("head", function() {
                    var el = document.querySelector("select[data-select2-id='thaw_x_thawReFrozen']"),
                        options = { name: "x_thawReFrozen", selectId: "thaw_x_thawReFrozen", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
                    options.data = ew.vars.tables.thaw.fields.thawReFrozen.lookupOptions;
                    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
                    Object.assign(options, ew.vars.tables.thaw.fields.thawReFrozen.selectOptions);
                    ew.createSelect(options);
                });
                </script>
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
    ew.addEventHandlers("thaw");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
