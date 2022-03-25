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
$hr_salarycomponent_view = new hr_salarycomponent_view();

// Run the page
$hr_salarycomponent_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_salarycomponent_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_salarycomponent->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_salarycomponentview = currentForm = new ew.Form("fhr_salarycomponentview", "view");

// Form_CustomValidate event
fhr_salarycomponentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_salarycomponentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_salarycomponent->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_salarycomponent_view->ExportOptions->render("body") ?>
<?php $hr_salarycomponent_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_salarycomponent_view->showPageHeader(); ?>
<?php
$hr_salarycomponent_view->showMessage();
?>
<form name="fhr_salarycomponentview" id="fhr_salarycomponentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_salarycomponent_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_salarycomponent_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_salarycomponent">
<input type="hidden" name="modal" value="<?php echo (int)$hr_salarycomponent_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_salarycomponent->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_salarycomponent_view->TableLeftColumnClass ?>"><span id="elh_hr_salarycomponent_id"><?php echo $hr_salarycomponent->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_salarycomponent->id->cellAttributes() ?>>
<span id="el_hr_salarycomponent_id">
<span<?php echo $hr_salarycomponent->id->viewAttributes() ?>>
<?php echo $hr_salarycomponent->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_salarycomponent->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_salarycomponent_view->TableLeftColumnClass ?>"><span id="elh_hr_salarycomponent_name"><?php echo $hr_salarycomponent->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_salarycomponent->name->cellAttributes() ?>>
<span id="el_hr_salarycomponent_name">
<span<?php echo $hr_salarycomponent->name->viewAttributes() ?>>
<?php echo $hr_salarycomponent->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_salarycomponent->componentType->Visible) { // componentType ?>
	<tr id="r_componentType">
		<td class="<?php echo $hr_salarycomponent_view->TableLeftColumnClass ?>"><span id="elh_hr_salarycomponent_componentType"><?php echo $hr_salarycomponent->componentType->caption() ?></span></td>
		<td data-name="componentType"<?php echo $hr_salarycomponent->componentType->cellAttributes() ?>>
<span id="el_hr_salarycomponent_componentType">
<span<?php echo $hr_salarycomponent->componentType->viewAttributes() ?>>
<?php echo $hr_salarycomponent->componentType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_salarycomponent->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $hr_salarycomponent_view->TableLeftColumnClass ?>"><span id="elh_hr_salarycomponent_details"><?php echo $hr_salarycomponent->details->caption() ?></span></td>
		<td data-name="details"<?php echo $hr_salarycomponent->details->cellAttributes() ?>>
<span id="el_hr_salarycomponent_details">
<span<?php echo $hr_salarycomponent->details->viewAttributes() ?>>
<?php echo $hr_salarycomponent->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_salarycomponent->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_salarycomponent_view->TableLeftColumnClass ?>"><span id="elh_hr_salarycomponent_HospID"><?php echo $hr_salarycomponent->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_salarycomponent->HospID->cellAttributes() ?>>
<span id="el_hr_salarycomponent_HospID">
<span<?php echo $hr_salarycomponent->HospID->viewAttributes() ?>>
<?php echo $hr_salarycomponent->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_salarycomponent_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_salarycomponent->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_salarycomponent_view->terminate();
?>