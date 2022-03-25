<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$ivf_mas_user_template_delete = new ivf_mas_user_template_delete();

// Run the page
$ivf_mas_user_template_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_user_template_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_mas_user_templatedelete = currentForm = new ew.Form("fivf_mas_user_templatedelete", "delete");

// Form_CustomValidate event
fivf_mas_user_templatedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_mas_user_templatedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_mas_user_templatedelete.lists["x_TemplateType"] = <?php echo $ivf_mas_user_template_delete->TemplateType->Lookup->toClientList() ?>;
fivf_mas_user_templatedelete.lists["x_TemplateType"].options = <?php echo JsonEncode($ivf_mas_user_template_delete->TemplateType->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_mas_user_template_delete->showPageHeader(); ?>
<?php
$ivf_mas_user_template_delete->showMessage();
?>
<form name="fivf_mas_user_templatedelete" id="fivf_mas_user_templatedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_mas_user_template_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_mas_user_template_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_user_template">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_mas_user_template_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_mas_user_template->id->Visible) { // id ?>
		<th class="<?php echo $ivf_mas_user_template->id->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_id" class="ivf_mas_user_template_id"><?php echo $ivf_mas_user_template->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_mas_user_template->TemplateName->Visible) { // TemplateName ?>
		<th class="<?php echo $ivf_mas_user_template->TemplateName->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_TemplateName" class="ivf_mas_user_template_TemplateName"><?php echo $ivf_mas_user_template->TemplateName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_mas_user_template->TemplateType->Visible) { // TemplateType ?>
		<th class="<?php echo $ivf_mas_user_template->TemplateType->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_TemplateType" class="ivf_mas_user_template_TemplateType"><?php echo $ivf_mas_user_template->TemplateType->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_mas_user_template->created->Visible) { // created ?>
		<th class="<?php echo $ivf_mas_user_template->created->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_created" class="ivf_mas_user_template_created"><?php echo $ivf_mas_user_template->created->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_mas_user_template->createdDatetime->Visible) { // createdDatetime ?>
		<th class="<?php echo $ivf_mas_user_template->createdDatetime->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_createdDatetime" class="ivf_mas_user_template_createdDatetime"><?php echo $ivf_mas_user_template->createdDatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_mas_user_template->modified->Visible) { // modified ?>
		<th class="<?php echo $ivf_mas_user_template->modified->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_modified" class="ivf_mas_user_template_modified"><?php echo $ivf_mas_user_template->modified->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_mas_user_template->modifiedDatetime->Visible) { // modifiedDatetime ?>
		<th class="<?php echo $ivf_mas_user_template->modifiedDatetime->headerCellClass() ?>"><span id="elh_ivf_mas_user_template_modifiedDatetime" class="ivf_mas_user_template_modifiedDatetime"><?php echo $ivf_mas_user_template->modifiedDatetime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_mas_user_template_delete->RecCnt = 0;
$i = 0;
while (!$ivf_mas_user_template_delete->Recordset->EOF) {
	$ivf_mas_user_template_delete->RecCnt++;
	$ivf_mas_user_template_delete->RowCnt++;

	// Set row properties
	$ivf_mas_user_template->resetAttributes();
	$ivf_mas_user_template->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_mas_user_template_delete->loadRowValues($ivf_mas_user_template_delete->Recordset);

	// Render row
	$ivf_mas_user_template_delete->renderRow();
?>
	<tr<?php echo $ivf_mas_user_template->rowAttributes() ?>>
<?php if ($ivf_mas_user_template->id->Visible) { // id ?>
		<td<?php echo $ivf_mas_user_template->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_delete->RowCnt ?>_ivf_mas_user_template_id" class="ivf_mas_user_template_id">
<span<?php echo $ivf_mas_user_template->id->viewAttributes() ?>>
<?php echo $ivf_mas_user_template->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_mas_user_template->TemplateName->Visible) { // TemplateName ?>
		<td<?php echo $ivf_mas_user_template->TemplateName->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_delete->RowCnt ?>_ivf_mas_user_template_TemplateName" class="ivf_mas_user_template_TemplateName">
<span<?php echo $ivf_mas_user_template->TemplateName->viewAttributes() ?>>
<?php echo $ivf_mas_user_template->TemplateName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_mas_user_template->TemplateType->Visible) { // TemplateType ?>
		<td<?php echo $ivf_mas_user_template->TemplateType->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_delete->RowCnt ?>_ivf_mas_user_template_TemplateType" class="ivf_mas_user_template_TemplateType">
<span<?php echo $ivf_mas_user_template->TemplateType->viewAttributes() ?>>
<?php echo $ivf_mas_user_template->TemplateType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_mas_user_template->created->Visible) { // created ?>
		<td<?php echo $ivf_mas_user_template->created->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_delete->RowCnt ?>_ivf_mas_user_template_created" class="ivf_mas_user_template_created">
<span<?php echo $ivf_mas_user_template->created->viewAttributes() ?>>
<?php echo $ivf_mas_user_template->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_mas_user_template->createdDatetime->Visible) { // createdDatetime ?>
		<td<?php echo $ivf_mas_user_template->createdDatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_delete->RowCnt ?>_ivf_mas_user_template_createdDatetime" class="ivf_mas_user_template_createdDatetime">
<span<?php echo $ivf_mas_user_template->createdDatetime->viewAttributes() ?>>
<?php echo $ivf_mas_user_template->createdDatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_mas_user_template->modified->Visible) { // modified ?>
		<td<?php echo $ivf_mas_user_template->modified->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_delete->RowCnt ?>_ivf_mas_user_template_modified" class="ivf_mas_user_template_modified">
<span<?php echo $ivf_mas_user_template->modified->viewAttributes() ?>>
<?php echo $ivf_mas_user_template->modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_mas_user_template->modifiedDatetime->Visible) { // modifiedDatetime ?>
		<td<?php echo $ivf_mas_user_template->modifiedDatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_delete->RowCnt ?>_ivf_mas_user_template_modifiedDatetime" class="ivf_mas_user_template_modifiedDatetime">
<span<?php echo $ivf_mas_user_template->modifiedDatetime->viewAttributes() ?>>
<?php echo $ivf_mas_user_template->modifiedDatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_mas_user_template_delete->Recordset->moveNext();
}
$ivf_mas_user_template_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_mas_user_template_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_mas_user_template_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_mas_user_template_delete->terminate();
?>