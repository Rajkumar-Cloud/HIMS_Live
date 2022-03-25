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
$payroll_overtimecategories_view = new payroll_overtimecategories_view();

// Run the page
$payroll_overtimecategories_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$payroll_overtimecategories_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$payroll_overtimecategories->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpayroll_overtimecategoriesview = currentForm = new ew.Form("fpayroll_overtimecategoriesview", "view");

// Form_CustomValidate event
fpayroll_overtimecategoriesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpayroll_overtimecategoriesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$payroll_overtimecategories->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $payroll_overtimecategories_view->ExportOptions->render("body") ?>
<?php $payroll_overtimecategories_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $payroll_overtimecategories_view->showPageHeader(); ?>
<?php
$payroll_overtimecategories_view->showMessage();
?>
<form name="fpayroll_overtimecategoriesview" id="fpayroll_overtimecategoriesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($payroll_overtimecategories_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $payroll_overtimecategories_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="payroll_overtimecategories">
<input type="hidden" name="modal" value="<?php echo (int)$payroll_overtimecategories_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($payroll_overtimecategories->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $payroll_overtimecategories_view->TableLeftColumnClass ?>"><span id="elh_payroll_overtimecategories_id"><?php echo $payroll_overtimecategories->id->caption() ?></span></td>
		<td data-name="id"<?php echo $payroll_overtimecategories->id->cellAttributes() ?>>
<span id="el_payroll_overtimecategories_id">
<span<?php echo $payroll_overtimecategories->id->viewAttributes() ?>>
<?php echo $payroll_overtimecategories->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($payroll_overtimecategories->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $payroll_overtimecategories_view->TableLeftColumnClass ?>"><span id="elh_payroll_overtimecategories_name"><?php echo $payroll_overtimecategories->name->caption() ?></span></td>
		<td data-name="name"<?php echo $payroll_overtimecategories->name->cellAttributes() ?>>
<span id="el_payroll_overtimecategories_name">
<span<?php echo $payroll_overtimecategories->name->viewAttributes() ?>>
<?php echo $payroll_overtimecategories->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($payroll_overtimecategories->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $payroll_overtimecategories_view->TableLeftColumnClass ?>"><span id="elh_payroll_overtimecategories_created"><?php echo $payroll_overtimecategories->created->caption() ?></span></td>
		<td data-name="created"<?php echo $payroll_overtimecategories->created->cellAttributes() ?>>
<span id="el_payroll_overtimecategories_created">
<span<?php echo $payroll_overtimecategories->created->viewAttributes() ?>>
<?php echo $payroll_overtimecategories->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($payroll_overtimecategories->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $payroll_overtimecategories_view->TableLeftColumnClass ?>"><span id="elh_payroll_overtimecategories_updated"><?php echo $payroll_overtimecategories->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $payroll_overtimecategories->updated->cellAttributes() ?>>
<span id="el_payroll_overtimecategories_updated">
<span<?php echo $payroll_overtimecategories->updated->viewAttributes() ?>>
<?php echo $payroll_overtimecategories->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$payroll_overtimecategories_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$payroll_overtimecategories->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$payroll_overtimecategories_view->terminate();
?>