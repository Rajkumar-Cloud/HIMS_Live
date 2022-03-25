<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewEtUpdate = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_etupdate;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "update";
    fview_etupdate = currentForm = new ew.Form("fview_etupdate", "update");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_et")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_et)
        ew.vars.tables.view_et = currentTable;
    fview_etupdate.addFields([
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null], fields.RIDNo.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["TiDNo", [fields.TiDNo.visible && fields.TiDNo.required ? ew.Validators.required(fields.TiDNo.caption) : null], fields.TiDNo.isInvalid],
        ["EmbryoNo", [fields.EmbryoNo.visible && fields.EmbryoNo.required ? ew.Validators.required(fields.EmbryoNo.caption) : null], fields.EmbryoNo.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid],
        ["FertilisationDate", [fields.FertilisationDate.visible && fields.FertilisationDate.required ? ew.Validators.required(fields.FertilisationDate.caption) : null], fields.FertilisationDate.isInvalid],
        ["Day", [fields.Day.visible && fields.Day.required ? ew.Validators.required(fields.Day.caption) : null], fields.Day.isInvalid],
        ["Grade", [fields.Grade.visible && fields.Grade.required ? ew.Validators.required(fields.Grade.caption) : null], fields.Grade.isInvalid],
        ["Incubator", [fields.Incubator.visible && fields.Incubator.required ? ew.Validators.required(fields.Incubator.caption) : null], fields.Incubator.isInvalid],
        ["Catheter", [fields.Catheter.visible && fields.Catheter.required ? ew.Validators.required(fields.Catheter.caption) : null], fields.Catheter.isInvalid],
        ["Difficulty", [fields.Difficulty.visible && fields.Difficulty.required ? ew.Validators.required(fields.Difficulty.caption) : null], fields.Difficulty.isInvalid],
        ["Easy", [fields.Easy.visible && fields.Easy.required ? ew.Validators.required(fields.Easy.caption) : null], fields.Easy.isInvalid],
        ["Comments", [fields.Comments.visible && fields.Comments.required ? ew.Validators.required(fields.Comments.caption) : null], fields.Comments.isInvalid],
        ["Doctor", [fields.Doctor.visible && fields.Doctor.required ? ew.Validators.required(fields.Doctor.caption) : null], fields.Doctor.isInvalid],
        ["Embryologist", [fields.Embryologist.visible && fields.Embryologist.required ? ew.Validators.required(fields.Embryologist.caption) : null], fields.Embryologist.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_etupdate,
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
    fview_etupdate.validate = function () {
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
    fview_etupdate.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_etupdate.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_etupdate.lists.Day = <?= $Page->Day->toClientList($Page) ?>;
    fview_etupdate.lists.Grade = <?= $Page->Grade->toClientList($Page) ?>;
    fview_etupdate.lists.Difficulty = <?= $Page->Difficulty->toClientList($Page) ?>;
    fview_etupdate.lists.Easy = <?= $Page->Easy->toClientList($Page) ?>;
    loadjs.done("fview_etupdate");
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
<form name="fview_etupdate" id="fview_etupdate" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_et">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_view_etupdate" class="ew-update-div"><!-- page -->
    <?php if (!$Page->isConfirm()) { // Confirm page ?>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="custom-control-label" for="u"><?= $Language->phrase("UpdateSelectAll") ?></label>
    </div>
    <?php } ?>
<?php if ($Page->Catheter->Visible && (!$Page->isConfirm() || $Page->Catheter->multiUpdateSelected())) { // Catheter ?>
    <div id="r_Catheter" class="form-group row">
        <label for="x_Catheter" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Catheter" id="u_Catheter" class="custom-control-input ew-multi-select" value="1"<?= $Page->Catheter->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Catheter"><?= $Page->Catheter->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Catheter->cellAttributes() ?>>
                <span id="el_view_et_Catheter">
                <input type="<?= $Page->Catheter->getInputTextType() ?>" data-table="view_et" data-field="x_Catheter" name="x_Catheter" id="x_Catheter" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Catheter->getPlaceHolder()) ?>" value="<?= $Page->Catheter->EditValue ?>"<?= $Page->Catheter->editAttributes() ?> aria-describedby="x_Catheter_help">
                <?= $Page->Catheter->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Catheter->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Difficulty->Visible && (!$Page->isConfirm() || $Page->Difficulty->multiUpdateSelected())) { // Difficulty ?>
    <div id="r_Difficulty" class="form-group row">
        <label for="x_Difficulty" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Difficulty" id="u_Difficulty" class="custom-control-input ew-multi-select" value="1"<?= $Page->Difficulty->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Difficulty"><?= $Page->Difficulty->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Difficulty->cellAttributes() ?>>
                <span id="el_view_et_Difficulty">
                    <select
                        id="x_Difficulty"
                        name="x_Difficulty"
                        class="form-control ew-select<?= $Page->Difficulty->isInvalidClass() ?>"
                        data-select2-id="view_et_x_Difficulty"
                        data-table="view_et"
                        data-field="x_Difficulty"
                        data-value-separator="<?= $Page->Difficulty->displayValueSeparatorAttribute() ?>"
                        data-placeholder="<?= HtmlEncode($Page->Difficulty->getPlaceHolder()) ?>"
                        <?= $Page->Difficulty->editAttributes() ?>>
                        <?= $Page->Difficulty->selectOptionListHtml("x_Difficulty") ?>
                    </select>
                    <?= $Page->Difficulty->getCustomMessage() ?>
                    <div class="invalid-feedback"><?= $Page->Difficulty->getErrorMessage() ?></div>
                <script>
                loadjs.ready("head", function() {
                    var el = document.querySelector("select[data-select2-id='view_et_x_Difficulty']"),
                        options = { name: "x_Difficulty", selectId: "view_et_x_Difficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
                    options.data = ew.vars.tables.view_et.fields.Difficulty.lookupOptions;
                    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
                    Object.assign(options, ew.vars.tables.view_et.fields.Difficulty.selectOptions);
                    ew.createSelect(options);
                });
                </script>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Easy->Visible && (!$Page->isConfirm() || $Page->Easy->multiUpdateSelected())) { // Easy ?>
    <div id="r_Easy" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Easy" id="u_Easy" class="custom-control-input ew-multi-select" value="1"<?= $Page->Easy->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Easy"><?= $Page->Easy->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Easy->cellAttributes() ?>>
                <span id="el_view_et_Easy">
                <template id="tp_x_Easy">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" data-table="view_et" data-field="x_Easy" name="x_Easy" id="x_Easy"<?= $Page->Easy->editAttributes() ?>>
                        <label class="custom-control-label"></label>
                    </div>
                </template>
                <div id="dsl_x_Easy" class="ew-item-list"></div>
                <input type="hidden"
                    is="selection-list"
                    id="x_Easy[]"
                    name="x_Easy[]"
                    value="<?= HtmlEncode($Page->Easy->CurrentValue) ?>"
                    data-type="select-multiple"
                    data-template="tp_x_Easy"
                    data-target="dsl_x_Easy"
                    data-repeatcolumn="5"
                    class="form-control<?= $Page->Easy->isInvalidClass() ?>"
                    data-table="view_et"
                    data-field="x_Easy"
                    data-value-separator="<?= $Page->Easy->displayValueSeparatorAttribute() ?>"
                    <?= $Page->Easy->editAttributes() ?>>
                <?= $Page->Easy->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Easy->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Comments->Visible && (!$Page->isConfirm() || $Page->Comments->multiUpdateSelected())) { // Comments ?>
    <div id="r_Comments" class="form-group row">
        <label for="x_Comments" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Comments" id="u_Comments" class="custom-control-input ew-multi-select" value="1"<?= $Page->Comments->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Comments"><?= $Page->Comments->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Comments->cellAttributes() ?>>
                <span id="el_view_et_Comments">
                <input type="<?= $Page->Comments->getInputTextType() ?>" data-table="view_et" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>" value="<?= $Page->Comments->EditValue ?>"<?= $Page->Comments->editAttributes() ?> aria-describedby="x_Comments_help">
                <?= $Page->Comments->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Comments->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible && (!$Page->isConfirm() || $Page->Doctor->multiUpdateSelected())) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label for="x_Doctor" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Doctor" id="u_Doctor" class="custom-control-input ew-multi-select" value="1"<?= $Page->Doctor->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Doctor"><?= $Page->Doctor->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Doctor->cellAttributes() ?>>
                <span id="el_view_et_Doctor">
                <input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_et" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?> aria-describedby="x_Doctor_help">
                <?= $Page->Doctor->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Embryologist->Visible && (!$Page->isConfirm() || $Page->Embryologist->multiUpdateSelected())) { // Embryologist ?>
    <div id="r_Embryologist" class="form-group row">
        <label for="x_Embryologist" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Embryologist" id="u_Embryologist" class="custom-control-input ew-multi-select" value="1"<?= $Page->Embryologist->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Embryologist"><?= $Page->Embryologist->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Embryologist->cellAttributes() ?>>
                <span id="el_view_et_Embryologist">
                <input type="<?= $Page->Embryologist->getInputTextType() ?>" data-table="view_et" data-field="x_Embryologist" name="x_Embryologist" id="x_Embryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Embryologist->getPlaceHolder()) ?>" value="<?= $Page->Embryologist->EditValue ?>"<?= $Page->Embryologist->editAttributes() ?> aria-describedby="x_Embryologist_help">
                <?= $Page->Embryologist->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Embryologist->getErrorMessage() ?></div>
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
    ew.addEventHandlers("view_et");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
