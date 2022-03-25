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
$hr_expensescategories_view = new hr_expensescategories_view();

// Run the page
$hr_expensescategories_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_expensescategories_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_expensescategories->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_expensescategoriesview = currentForm = new ew.Form("fhr_expensescategoriesview", "view");

// Form_CustomValidate event
fhr_expensescategoriesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_expensescategoriesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_expensescategoriesview.lists["x_pre_approve"] = <?php echo $hr_expensescategories_view->pre_approve->Lookup->toClientList() ?>;
fhr_expensescategoriesview.lists["x_pre_approve"].options = <?php echo JsonEncode($hr_expensescategories_view->pre_approve->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_expensescategories->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_expensescategories_view->ExportOptions->render("body") ?>
<?php $hr_expensescategories_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_expensescategories_view->showPageHeader(); ?>
<?php
$hr_expensescategories_view->showMessage();
?>
<form name="fhr_expensescategoriesview" id="fhr_expensescategoriesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_expensescategories_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_expensescategories_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_expensescategories">
<input type="hidden" name="modal" value="<?php echo (int)$hr_expensescategories_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_expensescategories->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_expensescategories_view->TableLeftColumnClass ?>"><span id="elh_hr_expensescategories_id"><?php echo $hr_expensescategories->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_expensescategories->id->cellAttributes() ?>>
<span id="el_hr_expensescategories_id">
<span<?php echo $hr_expensescategories->id->viewAttributes() ?>>
<?php echo $hr_expensescategories->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_expensescategories->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_expensescategories_view->TableLeftColumnClass ?>"><span id="elh_hr_expensescategories_name"><?php echo $hr_expensescategories->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_expensescategories->name->cellAttributes() ?>>
<span id="el_hr_expensescategories_name">
<span<?php echo $hr_expensescategories->name->viewAttributes() ?>>
<?php echo $hr_expensescategories->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_expensescategories->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $hr_expensescategories_view->TableLeftColumnClass ?>"><span id="elh_hr_expensescategories_created"><?php echo $hr_expensescategories->created->caption() ?></span></td>
		<td data-name="created"<?php echo $hr_expensescategories->created->cellAttributes() ?>>
<span id="el_hr_expensescategories_created">
<span<?php echo $hr_expensescategories->created->viewAttributes() ?>>
<?php echo $hr_expensescategories->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_expensescategories->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $hr_expensescategories_view->TableLeftColumnClass ?>"><span id="elh_hr_expensescategories_updated"><?php echo $hr_expensescategories->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $hr_expensescategories->updated->cellAttributes() ?>>
<span id="el_hr_expensescategories_updated">
<span<?php echo $hr_expensescategories->updated->viewAttributes() ?>>
<?php echo $hr_expensescategories->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_expensescategories->pre_approve->Visible) { // pre_approve ?>
	<tr id="r_pre_approve">
		<td class="<?php echo $hr_expensescategories_view->TableLeftColumnClass ?>"><span id="elh_hr_expensescategories_pre_approve"><?php echo $hr_expensescategories->pre_approve->caption() ?></span></td>
		<td data-name="pre_approve"<?php echo $hr_expensescategories->pre_approve->cellAttributes() ?>>
<span id="el_hr_expensescategories_pre_approve">
<span<?php echo $hr_expensescategories->pre_approve->viewAttributes() ?>>
<?php echo $hr_expensescategories->pre_approve->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_expensescategories->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_expensescategories_view->TableLeftColumnClass ?>"><span id="elh_hr_expensescategories_HospID"><?php echo $hr_expensescategories->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_expensescategories->HospID->cellAttributes() ?>>
<span id="el_hr_expensescategories_HospID">
<span<?php echo $hr_expensescategories->HospID->viewAttributes() ?>>
<?php echo $hr_expensescategories->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_expensescategories_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_expensescategories->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_expensescategories_view->terminate();
?>