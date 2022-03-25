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
$mas_language_view = new mas_language_view();

// Run the page
$mas_language_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_language_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_language->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_languageview = currentForm = new ew.Form("fmas_languageview", "view");

// Form_CustomValidate event
fmas_languageview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_languageview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_language->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_language_view->ExportOptions->render("body") ?>
<?php $mas_language_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_language_view->showPageHeader(); ?>
<?php
$mas_language_view->showMessage();
?>
<form name="fmas_languageview" id="fmas_languageview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_language_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_language_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_language">
<input type="hidden" name="modal" value="<?php echo (int)$mas_language_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_language->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_language_view->TableLeftColumnClass ?>"><span id="elh_mas_language_id"><?php echo $mas_language->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_language->id->cellAttributes() ?>>
<span id="el_mas_language_id">
<span<?php echo $mas_language->id->viewAttributes() ?>>
<?php echo $mas_language->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_language->_Language->Visible) { // Language ?>
	<tr id="r__Language">
		<td class="<?php echo $mas_language_view->TableLeftColumnClass ?>"><span id="elh_mas_language__Language"><?php echo $mas_language->_Language->caption() ?></span></td>
		<td data-name="_Language"<?php echo $mas_language->_Language->cellAttributes() ?>>
<span id="el_mas_language__Language">
<span<?php echo $mas_language->_Language->viewAttributes() ?>>
<?php echo $mas_language->_Language->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_language_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_language->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_language_view->terminate();
?>