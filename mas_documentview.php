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
$mas_document_view = new mas_document_view();

// Run the page
$mas_document_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_document_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_document->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_documentview = currentForm = new ew.Form("fmas_documentview", "view");

// Form_CustomValidate event
fmas_documentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_documentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_document->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_document_view->ExportOptions->render("body") ?>
<?php $mas_document_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_document_view->showPageHeader(); ?>
<?php
$mas_document_view->showMessage();
?>
<form name="fmas_documentview" id="fmas_documentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_document_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_document_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_document">
<input type="hidden" name="modal" value="<?php echo (int)$mas_document_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_document->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_document_view->TableLeftColumnClass ?>"><span id="elh_mas_document_id"><?php echo $mas_document->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_document->id->cellAttributes() ?>>
<span id="el_mas_document_id">
<span<?php echo $mas_document->id->viewAttributes() ?>>
<?php echo $mas_document->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_document->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $mas_document_view->TableLeftColumnClass ?>"><span id="elh_mas_document_Name"><?php echo $mas_document->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $mas_document->Name->cellAttributes() ?>>
<span id="el_mas_document_Name">
<span<?php echo $mas_document->Name->viewAttributes() ?>>
<?php echo $mas_document->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_document_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_document->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_document_view->terminate();
?>