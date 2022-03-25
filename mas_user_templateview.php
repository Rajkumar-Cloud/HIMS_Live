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
$mas_user_template_view = new mas_user_template_view();

// Run the page
$mas_user_template_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_user_template->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_user_templateview = currentForm = new ew.Form("fmas_user_templateview", "view");

// Form_CustomValidate event
fmas_user_templateview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_user_templateview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_user_templateview.lists["x_TemplateType"] = <?php echo $mas_user_template_view->TemplateType->Lookup->toClientList() ?>;
fmas_user_templateview.lists["x_TemplateType"].options = <?php echo JsonEncode($mas_user_template_view->TemplateType->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_user_template->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_user_template_view->ExportOptions->render("body") ?>
<?php $mas_user_template_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_user_template_view->showPageHeader(); ?>
<?php
$mas_user_template_view->showMessage();
?>
<form name="fmas_user_templateview" id="fmas_user_templateview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_user_template_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_user_template_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template">
<input type="hidden" name="modal" value="<?php echo (int)$mas_user_template_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_user_template->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_id"><?php echo $mas_user_template->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_user_template->id->cellAttributes() ?>>
<span id="el_mas_user_template_id">
<span<?php echo $mas_user_template->id->viewAttributes() ?>>
<?php echo $mas_user_template->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template->TemplateName->Visible) { // TemplateName ?>
	<tr id="r_TemplateName">
		<td class="<?php echo $mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_TemplateName"><?php echo $mas_user_template->TemplateName->caption() ?></span></td>
		<td data-name="TemplateName"<?php echo $mas_user_template->TemplateName->cellAttributes() ?>>
<span id="el_mas_user_template_TemplateName">
<span<?php echo $mas_user_template->TemplateName->viewAttributes() ?>>
<?php echo $mas_user_template->TemplateName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template->TemplateType->Visible) { // TemplateType ?>
	<tr id="r_TemplateType">
		<td class="<?php echo $mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_TemplateType"><?php echo $mas_user_template->TemplateType->caption() ?></span></td>
		<td data-name="TemplateType"<?php echo $mas_user_template->TemplateType->cellAttributes() ?>>
<span id="el_mas_user_template_TemplateType">
<span<?php echo $mas_user_template->TemplateType->viewAttributes() ?>>
<?php echo $mas_user_template->TemplateType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template->Template->Visible) { // Template ?>
	<tr id="r_Template">
		<td class="<?php echo $mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_Template"><?php echo $mas_user_template->Template->caption() ?></span></td>
		<td data-name="Template"<?php echo $mas_user_template->Template->cellAttributes() ?>>
<span id="el_mas_user_template_Template">
<span<?php echo $mas_user_template->Template->viewAttributes() ?>>
<?php echo $mas_user_template->Template->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_created"><?php echo $mas_user_template->created->caption() ?></span></td>
		<td data-name="created"<?php echo $mas_user_template->created->cellAttributes() ?>>
<span id="el_mas_user_template_created">
<span<?php echo $mas_user_template->created->viewAttributes() ?>>
<?php echo $mas_user_template->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template->createdDatetime->Visible) { // createdDatetime ?>
	<tr id="r_createdDatetime">
		<td class="<?php echo $mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_createdDatetime"><?php echo $mas_user_template->createdDatetime->caption() ?></span></td>
		<td data-name="createdDatetime"<?php echo $mas_user_template->createdDatetime->cellAttributes() ?>>
<span id="el_mas_user_template_createdDatetime">
<span<?php echo $mas_user_template->createdDatetime->viewAttributes() ?>>
<?php echo $mas_user_template->createdDatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template->modified->Visible) { // modified ?>
	<tr id="r_modified">
		<td class="<?php echo $mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_modified"><?php echo $mas_user_template->modified->caption() ?></span></td>
		<td data-name="modified"<?php echo $mas_user_template->modified->cellAttributes() ?>>
<span id="el_mas_user_template_modified">
<span<?php echo $mas_user_template->modified->viewAttributes() ?>>
<?php echo $mas_user_template->modified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template->modifiedDatetime->Visible) { // modifiedDatetime ?>
	<tr id="r_modifiedDatetime">
		<td class="<?php echo $mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_modifiedDatetime"><?php echo $mas_user_template->modifiedDatetime->caption() ?></span></td>
		<td data-name="modifiedDatetime"<?php echo $mas_user_template->modifiedDatetime->cellAttributes() ?>>
<span id="el_mas_user_template_modifiedDatetime">
<span<?php echo $mas_user_template->modifiedDatetime->viewAttributes() ?>>
<?php echo $mas_user_template->modifiedDatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_user_template_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_user_template->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_user_template_view->terminate();
?>