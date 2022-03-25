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
$ivf_mas_template_type_view = new ivf_mas_template_type_view();

// Run the page
$ivf_mas_template_type_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_template_type_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_mas_template_type_view->isExport()) { ?>
<script>
var fivf_mas_template_typeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_mas_template_typeview = currentForm = new ew.Form("fivf_mas_template_typeview", "view");
	loadjs.done("fivf_mas_template_typeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_mas_template_type_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_mas_template_type_view->ExportOptions->render("body") ?>
<?php $ivf_mas_template_type_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_mas_template_type_view->showPageHeader(); ?>
<?php
$ivf_mas_template_type_view->showMessage();
?>
<form name="fivf_mas_template_typeview" id="fivf_mas_template_typeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_template_type">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_mas_template_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_mas_template_type_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_mas_template_type_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_template_type_id"><?php echo $ivf_mas_template_type_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_mas_template_type_view->id->cellAttributes() ?>>
<span id="el_ivf_mas_template_type_id">
<span<?php echo $ivf_mas_template_type_view->id->viewAttributes() ?>><?php echo $ivf_mas_template_type_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_mas_template_type_view->TemplateName->Visible) { // TemplateName ?>
	<tr id="r_TemplateName">
		<td class="<?php echo $ivf_mas_template_type_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_template_type_TemplateName"><?php echo $ivf_mas_template_type_view->TemplateName->caption() ?></span></td>
		<td data-name="TemplateName" <?php echo $ivf_mas_template_type_view->TemplateName->cellAttributes() ?>>
<span id="el_ivf_mas_template_type_TemplateName">
<span<?php echo $ivf_mas_template_type_view->TemplateName->viewAttributes() ?>><?php echo $ivf_mas_template_type_view->TemplateName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_mas_template_type_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_mas_template_type_view->isExport()) { ?>
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
$ivf_mas_template_type_view->terminate();
?>