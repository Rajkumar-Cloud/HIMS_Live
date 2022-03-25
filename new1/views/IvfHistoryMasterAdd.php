<?php

namespace PHPMaker2021\project3;

// Page object
$IvfHistoryMasterAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_history_masteradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_history_masteradd = currentForm = new ew.Form("fivf_history_masteradd", "add");

    // Add fields
    var fields = ew.vars.tables.ivf_history_master.fields;
    fivf_history_masteradd.addFields([
        ["History", [fields.History.required ? ew.Validators.required(fields.History.caption) : null], fields.History.isInvalid],
        ["HistoryType", [fields.HistoryType.required ? ew.Validators.required(fields.HistoryType.caption) : null], fields.HistoryType.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_history_masteradd,
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
    fivf_history_masteradd.validate = function () {
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
    fivf_history_masteradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_history_masteradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_history_masteradd");
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
<form name="fivf_history_masteradd" id="fivf_history_masteradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_history_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->History->Visible) { // History ?>
    <div id="r_History" class="form-group row">
        <label id="elh_ivf_history_master_History" for="x_History" class="<?= $Page->LeftColumnClass ?>"><?= $Page->History->caption() ?><?= $Page->History->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->History->cellAttributes() ?>>
<span id="el_ivf_history_master_History">
<input type="<?= $Page->History->getInputTextType() ?>" data-table="ivf_history_master" data-field="x_History" name="x_History" id="x_History" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->History->getPlaceHolder()) ?>" value="<?= $Page->History->EditValue ?>"<?= $Page->History->editAttributes() ?> aria-describedby="x_History_help">
<?= $Page->History->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->History->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HistoryType->Visible) { // HistoryType ?>
    <div id="r_HistoryType" class="form-group row">
        <label id="elh_ivf_history_master_HistoryType" for="x_HistoryType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HistoryType->caption() ?><?= $Page->HistoryType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HistoryType->cellAttributes() ?>>
<span id="el_ivf_history_master_HistoryType">
<input type="<?= $Page->HistoryType->getInputTextType() ?>" data-table="ivf_history_master" data-field="x_HistoryType" name="x_HistoryType" id="x_HistoryType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HistoryType->getPlaceHolder()) ?>" value="<?= $Page->HistoryType->EditValue ?>"<?= $Page->HistoryType->editAttributes() ?> aria-describedby="x_HistoryType_help">
<?= $Page->HistoryType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HistoryType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("ivf_history_master");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
