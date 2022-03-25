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
$ivf_mas_user_template_view = new ivf_mas_user_template_view();

// Run the page
$ivf_mas_user_template_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_user_template_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_mas_user_template_view->isExport()) { ?>
<script>
var fivf_mas_user_templateview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_mas_user_templateview = currentForm = new ew.Form("fivf_mas_user_templateview", "view");
	loadjs.done("fivf_mas_user_templateview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_mas_user_template_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_mas_user_template_view->ExportOptions->render("body") ?>
<?php $ivf_mas_user_template_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_mas_user_template_view->showPageHeader(); ?>
<?php
$ivf_mas_user_template_view->showMessage();
?>
<form name="fivf_mas_user_templateview" id="fivf_mas_user_templateview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_user_template">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_mas_user_template_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_mas_user_template_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_id"><?php echo $ivf_mas_user_template_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_mas_user_template_view->id->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_id">
<span<?php echo $ivf_mas_user_template_view->id->viewAttributes() ?>><?php echo $ivf_mas_user_template_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_mas_user_template_view->TemplateName->Visible) { // TemplateName ?>
	<tr id="r_TemplateName">
		<td class="<?php echo $ivf_mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_TemplateName"><?php echo $ivf_mas_user_template_view->TemplateName->caption() ?></span></td>
		<td data-name="TemplateName" <?php echo $ivf_mas_user_template_view->TemplateName->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_TemplateName">
<span<?php echo $ivf_mas_user_template_view->TemplateName->viewAttributes() ?>><?php echo $ivf_mas_user_template_view->TemplateName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_mas_user_template_view->TemplateType->Visible) { // TemplateType ?>
	<tr id="r_TemplateType">
		<td class="<?php echo $ivf_mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_TemplateType"><?php echo $ivf_mas_user_template_view->TemplateType->caption() ?></span></td>
		<td data-name="TemplateType" <?php echo $ivf_mas_user_template_view->TemplateType->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_TemplateType">
<span<?php echo $ivf_mas_user_template_view->TemplateType->viewAttributes() ?>><?php echo $ivf_mas_user_template_view->TemplateType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_mas_user_template_view->Template->Visible) { // Template ?>
	<tr id="r_Template">
		<td class="<?php echo $ivf_mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_Template"><?php echo $ivf_mas_user_template_view->Template->caption() ?></span></td>
		<td data-name="Template" <?php echo $ivf_mas_user_template_view->Template->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_Template">
<span<?php echo $ivf_mas_user_template_view->Template->viewAttributes() ?>><?php echo $ivf_mas_user_template_view->Template->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_mas_user_template_view->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $ivf_mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_created"><?php echo $ivf_mas_user_template_view->created->caption() ?></span></td>
		<td data-name="created" <?php echo $ivf_mas_user_template_view->created->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_created">
<span<?php echo $ivf_mas_user_template_view->created->viewAttributes() ?>><?php echo $ivf_mas_user_template_view->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_mas_user_template_view->createdDatetime->Visible) { // createdDatetime ?>
	<tr id="r_createdDatetime">
		<td class="<?php echo $ivf_mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_createdDatetime"><?php echo $ivf_mas_user_template_view->createdDatetime->caption() ?></span></td>
		<td data-name="createdDatetime" <?php echo $ivf_mas_user_template_view->createdDatetime->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_createdDatetime">
<span<?php echo $ivf_mas_user_template_view->createdDatetime->viewAttributes() ?>><?php echo $ivf_mas_user_template_view->createdDatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_mas_user_template_view->modified->Visible) { // modified ?>
	<tr id="r_modified">
		<td class="<?php echo $ivf_mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_modified"><?php echo $ivf_mas_user_template_view->modified->caption() ?></span></td>
		<td data-name="modified" <?php echo $ivf_mas_user_template_view->modified->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_modified">
<span<?php echo $ivf_mas_user_template_view->modified->viewAttributes() ?>><?php echo $ivf_mas_user_template_view->modified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_mas_user_template_view->modifiedDatetime->Visible) { // modifiedDatetime ?>
	<tr id="r_modifiedDatetime">
		<td class="<?php echo $ivf_mas_user_template_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_user_template_modifiedDatetime"><?php echo $ivf_mas_user_template_view->modifiedDatetime->caption() ?></span></td>
		<td data-name="modifiedDatetime" <?php echo $ivf_mas_user_template_view->modifiedDatetime->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_modifiedDatetime">
<span<?php echo $ivf_mas_user_template_view->modifiedDatetime->viewAttributes() ?>><?php echo $ivf_mas_user_template_view->modifiedDatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_mas_user_template_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_mas_user_template_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_mas_user_template_view->terminate();
?>