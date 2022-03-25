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
$hr_courses_view = new hr_courses_view();

// Run the page
$hr_courses_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_courses_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_courses->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_coursesview = currentForm = new ew.Form("fhr_coursesview", "view");

// Form_CustomValidate event
fhr_coursesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_coursesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_coursesview.lists["x_paymentType"] = <?php echo $hr_courses_view->paymentType->Lookup->toClientList() ?>;
fhr_coursesview.lists["x_paymentType"].options = <?php echo JsonEncode($hr_courses_view->paymentType->options(FALSE, TRUE)) ?>;
fhr_coursesview.lists["x_status"] = <?php echo $hr_courses_view->status->Lookup->toClientList() ?>;
fhr_coursesview.lists["x_status"].options = <?php echo JsonEncode($hr_courses_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_courses->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_courses_view->ExportOptions->render("body") ?>
<?php $hr_courses_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_courses_view->showPageHeader(); ?>
<?php
$hr_courses_view->showMessage();
?>
<form name="fhr_coursesview" id="fhr_coursesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_courses_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_courses_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_courses">
<input type="hidden" name="modal" value="<?php echo (int)$hr_courses_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_courses->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_id"><?php echo $hr_courses->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_courses->id->cellAttributes() ?>>
<span id="el_hr_courses_id">
<span<?php echo $hr_courses->id->viewAttributes() ?>>
<?php echo $hr_courses->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->code->Visible) { // code ?>
	<tr id="r_code">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_code"><?php echo $hr_courses->code->caption() ?></span></td>
		<td data-name="code"<?php echo $hr_courses->code->cellAttributes() ?>>
<span id="el_hr_courses_code">
<span<?php echo $hr_courses->code->viewAttributes() ?>>
<?php echo $hr_courses->code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_name"><?php echo $hr_courses->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_courses->name->cellAttributes() ?>>
<span id="el_hr_courses_name">
<span<?php echo $hr_courses->name->viewAttributes() ?>>
<?php echo $hr_courses->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_description"><?php echo $hr_courses->description->caption() ?></span></td>
		<td data-name="description"<?php echo $hr_courses->description->cellAttributes() ?>>
<span id="el_hr_courses_description">
<span<?php echo $hr_courses->description->viewAttributes() ?>>
<?php echo $hr_courses->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->coordinator->Visible) { // coordinator ?>
	<tr id="r_coordinator">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_coordinator"><?php echo $hr_courses->coordinator->caption() ?></span></td>
		<td data-name="coordinator"<?php echo $hr_courses->coordinator->cellAttributes() ?>>
<span id="el_hr_courses_coordinator">
<span<?php echo $hr_courses->coordinator->viewAttributes() ?>>
<?php echo $hr_courses->coordinator->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->trainer->Visible) { // trainer ?>
	<tr id="r_trainer">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_trainer"><?php echo $hr_courses->trainer->caption() ?></span></td>
		<td data-name="trainer"<?php echo $hr_courses->trainer->cellAttributes() ?>>
<span id="el_hr_courses_trainer">
<span<?php echo $hr_courses->trainer->viewAttributes() ?>>
<?php echo $hr_courses->trainer->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->trainer_info->Visible) { // trainer_info ?>
	<tr id="r_trainer_info">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_trainer_info"><?php echo $hr_courses->trainer_info->caption() ?></span></td>
		<td data-name="trainer_info"<?php echo $hr_courses->trainer_info->cellAttributes() ?>>
<span id="el_hr_courses_trainer_info">
<span<?php echo $hr_courses->trainer_info->viewAttributes() ?>>
<?php echo $hr_courses->trainer_info->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->paymentType->Visible) { // paymentType ?>
	<tr id="r_paymentType">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_paymentType"><?php echo $hr_courses->paymentType->caption() ?></span></td>
		<td data-name="paymentType"<?php echo $hr_courses->paymentType->cellAttributes() ?>>
<span id="el_hr_courses_paymentType">
<span<?php echo $hr_courses->paymentType->viewAttributes() ?>>
<?php echo $hr_courses->paymentType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->currency->Visible) { // currency ?>
	<tr id="r_currency">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_currency"><?php echo $hr_courses->currency->caption() ?></span></td>
		<td data-name="currency"<?php echo $hr_courses->currency->cellAttributes() ?>>
<span id="el_hr_courses_currency">
<span<?php echo $hr_courses->currency->viewAttributes() ?>>
<?php echo $hr_courses->currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->cost->Visible) { // cost ?>
	<tr id="r_cost">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_cost"><?php echo $hr_courses->cost->caption() ?></span></td>
		<td data-name="cost"<?php echo $hr_courses->cost->cellAttributes() ?>>
<span id="el_hr_courses_cost">
<span<?php echo $hr_courses->cost->viewAttributes() ?>>
<?php echo $hr_courses->cost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_status"><?php echo $hr_courses->status->caption() ?></span></td>
		<td data-name="status"<?php echo $hr_courses->status->cellAttributes() ?>>
<span id="el_hr_courses_status">
<span<?php echo $hr_courses->status->viewAttributes() ?>>
<?php echo $hr_courses->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_created"><?php echo $hr_courses->created->caption() ?></span></td>
		<td data-name="created"<?php echo $hr_courses->created->cellAttributes() ?>>
<span id="el_hr_courses_created">
<span<?php echo $hr_courses->created->viewAttributes() ?>>
<?php echo $hr_courses->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_courses->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $hr_courses_view->TableLeftColumnClass ?>"><span id="elh_hr_courses_updated"><?php echo $hr_courses->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $hr_courses->updated->cellAttributes() ?>>
<span id="el_hr_courses_updated">
<span<?php echo $hr_courses->updated->viewAttributes() ?>>
<?php echo $hr_courses->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_courses_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_courses->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_courses_view->terminate();
?>