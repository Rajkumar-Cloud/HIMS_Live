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
$mas_procedure_view = new mas_procedure_view();

// Run the page
$mas_procedure_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_procedure_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_procedure->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_procedureview = currentForm = new ew.Form("fmas_procedureview", "view");

// Form_CustomValidate event
fmas_procedureview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_procedureview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_procedure->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_procedure_view->ExportOptions->render("body") ?>
<?php $mas_procedure_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_procedure_view->showPageHeader(); ?>
<?php
$mas_procedure_view->showMessage();
?>
<form name="fmas_procedureview" id="fmas_procedureview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_procedure_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_procedure_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_procedure">
<input type="hidden" name="modal" value="<?php echo (int)$mas_procedure_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_procedure->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_procedure_view->TableLeftColumnClass ?>"><span id="elh_mas_procedure_id"><?php echo $mas_procedure->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_procedure->id->cellAttributes() ?>>
<span id="el_mas_procedure_id">
<span<?php echo $mas_procedure->id->viewAttributes() ?>>
<?php echo $mas_procedure->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_procedure->PROCEDURE->Visible) { // PROCEDURE ?>
	<tr id="r_PROCEDURE">
		<td class="<?php echo $mas_procedure_view->TableLeftColumnClass ?>"><span id="elh_mas_procedure_PROCEDURE"><?php echo $mas_procedure->PROCEDURE->caption() ?></span></td>
		<td data-name="PROCEDURE"<?php echo $mas_procedure->PROCEDURE->cellAttributes() ?>>
<span id="el_mas_procedure_PROCEDURE">
<span<?php echo $mas_procedure->PROCEDURE->viewAttributes() ?>>
<?php echo $mas_procedure->PROCEDURE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_procedure_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_procedure->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_procedure_view->terminate();
?>