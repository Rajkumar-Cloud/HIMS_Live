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
<?php include_once "header.php" ?>
<?php if (!$ivf_mas_template_type->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_mas_template_typeview = currentForm = new ew.Form("fivf_mas_template_typeview", "view");

// Form_CustomValidate event
fivf_mas_template_typeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_mas_template_typeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_mas_template_type->isExport()) { ?>
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
<?php if ($ivf_mas_template_type_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_mas_template_type_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_template_type">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_mas_template_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_mas_template_type->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_mas_template_type_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_template_type_id"><?php echo $ivf_mas_template_type->id->caption() ?></span></td>
		<td data-name="id"<?php echo $ivf_mas_template_type->id->cellAttributes() ?>>
<span id="el_ivf_mas_template_type_id">
<span<?php echo $ivf_mas_template_type->id->viewAttributes() ?>>
<?php echo $ivf_mas_template_type->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_mas_template_type->TemplateName->Visible) { // TemplateName ?>
	<tr id="r_TemplateName">
		<td class="<?php echo $ivf_mas_template_type_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_template_type_TemplateName"><?php echo $ivf_mas_template_type->TemplateName->caption() ?></span></td>
		<td data-name="TemplateName"<?php echo $ivf_mas_template_type->TemplateName->cellAttributes() ?>>
<span id="el_ivf_mas_template_type_TemplateName">
<span<?php echo $ivf_mas_template_type->TemplateName->viewAttributes() ?>>
<?php echo $ivf_mas_template_type->TemplateName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_mas_template_type_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_mas_template_type->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_mas_template_type_view->terminate();
?>