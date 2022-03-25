<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$mas_user_template_delete = new mas_user_template_delete();

// Run the page
$mas_user_template_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_user_templatedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmas_user_templatedelete = currentForm = new ew.Form("fmas_user_templatedelete", "delete");
	loadjs.done("fmas_user_templatedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_user_template_delete->showPageHeader(); ?>
<?php
$mas_user_template_delete->showMessage();
?>
<form name="fmas_user_templatedelete" id="fmas_user_templatedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_user_template_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_user_template_delete->id->Visible) { // id ?>
		<th class="<?php echo $mas_user_template_delete->id->headerCellClass() ?>"><span id="elh_mas_user_template_id" class="mas_user_template_id"><?php echo $mas_user_template_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_delete->TemplateName->Visible) { // TemplateName ?>
		<th class="<?php echo $mas_user_template_delete->TemplateName->headerCellClass() ?>"><span id="elh_mas_user_template_TemplateName" class="mas_user_template_TemplateName"><?php echo $mas_user_template_delete->TemplateName->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_delete->TemplateType->Visible) { // TemplateType ?>
		<th class="<?php echo $mas_user_template_delete->TemplateType->headerCellClass() ?>"><span id="elh_mas_user_template_TemplateType" class="mas_user_template_TemplateType"><?php echo $mas_user_template_delete->TemplateType->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_delete->created->Visible) { // created ?>
		<th class="<?php echo $mas_user_template_delete->created->headerCellClass() ?>"><span id="elh_mas_user_template_created" class="mas_user_template_created"><?php echo $mas_user_template_delete->created->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_delete->createdDatetime->Visible) { // createdDatetime ?>
		<th class="<?php echo $mas_user_template_delete->createdDatetime->headerCellClass() ?>"><span id="elh_mas_user_template_createdDatetime" class="mas_user_template_createdDatetime"><?php echo $mas_user_template_delete->createdDatetime->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_delete->modified->Visible) { // modified ?>
		<th class="<?php echo $mas_user_template_delete->modified->headerCellClass() ?>"><span id="elh_mas_user_template_modified" class="mas_user_template_modified"><?php echo $mas_user_template_delete->modified->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_delete->modifiedDatetime->Visible) { // modifiedDatetime ?>
		<th class="<?php echo $mas_user_template_delete->modifiedDatetime->headerCellClass() ?>"><span id="elh_mas_user_template_modifiedDatetime" class="mas_user_template_modifiedDatetime"><?php echo $mas_user_template_delete->modifiedDatetime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_user_template_delete->RecordCount = 0;
$i = 0;
while (!$mas_user_template_delete->Recordset->EOF) {
	$mas_user_template_delete->RecordCount++;
	$mas_user_template_delete->RowCount++;

	// Set row properties
	$mas_user_template->resetAttributes();
	$mas_user_template->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_user_template_delete->loadRowValues($mas_user_template_delete->Recordset);

	// Render row
	$mas_user_template_delete->renderRow();
?>
	<tr <?php echo $mas_user_template->rowAttributes() ?>>
<?php if ($mas_user_template_delete->id->Visible) { // id ?>
		<td <?php echo $mas_user_template_delete->id->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_delete->RowCount ?>_mas_user_template_id" class="mas_user_template_id">
<span<?php echo $mas_user_template_delete->id->viewAttributes() ?>><?php echo $mas_user_template_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_delete->TemplateName->Visible) { // TemplateName ?>
		<td <?php echo $mas_user_template_delete->TemplateName->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_delete->RowCount ?>_mas_user_template_TemplateName" class="mas_user_template_TemplateName">
<span<?php echo $mas_user_template_delete->TemplateName->viewAttributes() ?>><?php echo $mas_user_template_delete->TemplateName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_delete->TemplateType->Visible) { // TemplateType ?>
		<td <?php echo $mas_user_template_delete->TemplateType->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_delete->RowCount ?>_mas_user_template_TemplateType" class="mas_user_template_TemplateType">
<span<?php echo $mas_user_template_delete->TemplateType->viewAttributes() ?>><?php echo $mas_user_template_delete->TemplateType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_delete->created->Visible) { // created ?>
		<td <?php echo $mas_user_template_delete->created->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_delete->RowCount ?>_mas_user_template_created" class="mas_user_template_created">
<span<?php echo $mas_user_template_delete->created->viewAttributes() ?>><?php echo $mas_user_template_delete->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_delete->createdDatetime->Visible) { // createdDatetime ?>
		<td <?php echo $mas_user_template_delete->createdDatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_delete->RowCount ?>_mas_user_template_createdDatetime" class="mas_user_template_createdDatetime">
<span<?php echo $mas_user_template_delete->createdDatetime->viewAttributes() ?>><?php echo $mas_user_template_delete->createdDatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_delete->modified->Visible) { // modified ?>
		<td <?php echo $mas_user_template_delete->modified->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_delete->RowCount ?>_mas_user_template_modified" class="mas_user_template_modified">
<span<?php echo $mas_user_template_delete->modified->viewAttributes() ?>><?php echo $mas_user_template_delete->modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_delete->modifiedDatetime->Visible) { // modifiedDatetime ?>
		<td <?php echo $mas_user_template_delete->modifiedDatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_delete->RowCount ?>_mas_user_template_modifiedDatetime" class="mas_user_template_modifiedDatetime">
<span<?php echo $mas_user_template_delete->modifiedDatetime->viewAttributes() ?>><?php echo $mas_user_template_delete->modifiedDatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_user_template_delete->Recordset->moveNext();
}
$mas_user_template_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_user_template_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_user_template_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$mas_user_template_delete->terminate();
?>