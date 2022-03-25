<?php

namespace PHPMaker2021\HIMS;

// Page object
$RoomTypesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var froom_typesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    froom_typesdelete = currentForm = new ew.Form("froom_typesdelete", "delete");
    loadjs.done("froom_typesdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.room_types) ew.vars.tables.room_types = <?= JsonEncode(GetClientVar("tables", "room_types")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="froom_typesdelete" id="froom_typesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="room_types">
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
<?php if ($Page->Id->Visible) { // Id ?>
        <th class="<?= $Page->Id->headerCellClass() ?>"><span id="elh_room_types_Id" class="room_types_Id"><?= $Page->Id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Types->Visible) { // Types ?>
        <th class="<?= $Page->Types->headerCellClass() ?>"><span id="elh_room_types_Types" class="room_types_Types"><?= $Page->Types->caption() ?></span></th>
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
<?php if ($Page->Id->Visible) { // Id ?>
        <td <?= $Page->Id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_types_Id" class="room_types_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Types->Visible) { // Types ?>
        <td <?= $Page->Types->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_types_Types" class="room_types_Types">
<span<?= $Page->Types->viewAttributes() ?>>
<?= $Page->Types->getViewValue() ?></span>
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
