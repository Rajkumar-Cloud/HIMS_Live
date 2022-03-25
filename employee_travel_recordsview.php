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
$employee_travel_records_view = new employee_travel_records_view();

// Run the page
$employee_travel_records_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_travel_records_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_travel_records->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_travel_recordsview = currentForm = new ew.Form("femployee_travel_recordsview", "view");

// Form_CustomValidate event
femployee_travel_recordsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_travel_recordsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_travel_recordsview.lists["x_type"] = <?php echo $employee_travel_records_view->type->Lookup->toClientList() ?>;
femployee_travel_recordsview.lists["x_type"].options = <?php echo JsonEncode($employee_travel_records_view->type->options(FALSE, TRUE)) ?>;
femployee_travel_recordsview.lists["x_status"] = <?php echo $employee_travel_records_view->status->Lookup->toClientList() ?>;
femployee_travel_recordsview.lists["x_status"].options = <?php echo JsonEncode($employee_travel_records_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_travel_records->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_travel_records_view->ExportOptions->render("body") ?>
<?php $employee_travel_records_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_travel_records_view->showPageHeader(); ?>
<?php
$employee_travel_records_view->showMessage();
?>
<form name="femployee_travel_recordsview" id="femployee_travel_recordsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_travel_records_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_travel_records_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_travel_records">
<input type="hidden" name="modal" value="<?php echo (int)$employee_travel_records_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_travel_records->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_id"><?php echo $employee_travel_records->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_travel_records->id->cellAttributes() ?>>
<span id="el_employee_travel_records_id">
<span<?php echo $employee_travel_records->id->viewAttributes() ?>>
<?php echo $employee_travel_records->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_employee"><?php echo $employee_travel_records->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_travel_records->employee->cellAttributes() ?>>
<span id="el_employee_travel_records_employee">
<span<?php echo $employee_travel_records->employee->viewAttributes() ?>>
<?php echo $employee_travel_records->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->type->Visible) { // type ?>
	<tr id="r_type">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_type"><?php echo $employee_travel_records->type->caption() ?></span></td>
		<td data-name="type"<?php echo $employee_travel_records->type->cellAttributes() ?>>
<span id="el_employee_travel_records_type">
<span<?php echo $employee_travel_records->type->viewAttributes() ?>>
<?php echo $employee_travel_records->type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->purpose->Visible) { // purpose ?>
	<tr id="r_purpose">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_purpose"><?php echo $employee_travel_records->purpose->caption() ?></span></td>
		<td data-name="purpose"<?php echo $employee_travel_records->purpose->cellAttributes() ?>>
<span id="el_employee_travel_records_purpose">
<span<?php echo $employee_travel_records->purpose->viewAttributes() ?>>
<?php echo $employee_travel_records->purpose->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->travel_from->Visible) { // travel_from ?>
	<tr id="r_travel_from">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_travel_from"><?php echo $employee_travel_records->travel_from->caption() ?></span></td>
		<td data-name="travel_from"<?php echo $employee_travel_records->travel_from->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_from">
<span<?php echo $employee_travel_records->travel_from->viewAttributes() ?>>
<?php echo $employee_travel_records->travel_from->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->travel_to->Visible) { // travel_to ?>
	<tr id="r_travel_to">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_travel_to"><?php echo $employee_travel_records->travel_to->caption() ?></span></td>
		<td data-name="travel_to"<?php echo $employee_travel_records->travel_to->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_to">
<span<?php echo $employee_travel_records->travel_to->viewAttributes() ?>>
<?php echo $employee_travel_records->travel_to->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->travel_date->Visible) { // travel_date ?>
	<tr id="r_travel_date">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_travel_date"><?php echo $employee_travel_records->travel_date->caption() ?></span></td>
		<td data-name="travel_date"<?php echo $employee_travel_records->travel_date->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_date">
<span<?php echo $employee_travel_records->travel_date->viewAttributes() ?>>
<?php echo $employee_travel_records->travel_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->return_date->Visible) { // return_date ?>
	<tr id="r_return_date">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_return_date"><?php echo $employee_travel_records->return_date->caption() ?></span></td>
		<td data-name="return_date"<?php echo $employee_travel_records->return_date->cellAttributes() ?>>
<span id="el_employee_travel_records_return_date">
<span<?php echo $employee_travel_records->return_date->viewAttributes() ?>>
<?php echo $employee_travel_records->return_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_details"><?php echo $employee_travel_records->details->caption() ?></span></td>
		<td data-name="details"<?php echo $employee_travel_records->details->cellAttributes() ?>>
<span id="el_employee_travel_records_details">
<span<?php echo $employee_travel_records->details->viewAttributes() ?>>
<?php echo $employee_travel_records->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->funding->Visible) { // funding ?>
	<tr id="r_funding">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_funding"><?php echo $employee_travel_records->funding->caption() ?></span></td>
		<td data-name="funding"<?php echo $employee_travel_records->funding->cellAttributes() ?>>
<span id="el_employee_travel_records_funding">
<span<?php echo $employee_travel_records->funding->viewAttributes() ?>>
<?php echo $employee_travel_records->funding->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->currency->Visible) { // currency ?>
	<tr id="r_currency">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_currency"><?php echo $employee_travel_records->currency->caption() ?></span></td>
		<td data-name="currency"<?php echo $employee_travel_records->currency->cellAttributes() ?>>
<span id="el_employee_travel_records_currency">
<span<?php echo $employee_travel_records->currency->viewAttributes() ?>>
<?php echo $employee_travel_records->currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->attachment1->Visible) { // attachment1 ?>
	<tr id="r_attachment1">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_attachment1"><?php echo $employee_travel_records->attachment1->caption() ?></span></td>
		<td data-name="attachment1"<?php echo $employee_travel_records->attachment1->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment1">
<span<?php echo $employee_travel_records->attachment1->viewAttributes() ?>>
<?php echo $employee_travel_records->attachment1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->attachment2->Visible) { // attachment2 ?>
	<tr id="r_attachment2">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_attachment2"><?php echo $employee_travel_records->attachment2->caption() ?></span></td>
		<td data-name="attachment2"<?php echo $employee_travel_records->attachment2->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment2">
<span<?php echo $employee_travel_records->attachment2->viewAttributes() ?>>
<?php echo $employee_travel_records->attachment2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->attachment3->Visible) { // attachment3 ?>
	<tr id="r_attachment3">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_attachment3"><?php echo $employee_travel_records->attachment3->caption() ?></span></td>
		<td data-name="attachment3"<?php echo $employee_travel_records->attachment3->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment3">
<span<?php echo $employee_travel_records->attachment3->viewAttributes() ?>>
<?php echo $employee_travel_records->attachment3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_created"><?php echo $employee_travel_records->created->caption() ?></span></td>
		<td data-name="created"<?php echo $employee_travel_records->created->cellAttributes() ?>>
<span id="el_employee_travel_records_created">
<span<?php echo $employee_travel_records->created->viewAttributes() ?>>
<?php echo $employee_travel_records->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_updated"><?php echo $employee_travel_records->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $employee_travel_records->updated->cellAttributes() ?>>
<span id="el_employee_travel_records_updated">
<span<?php echo $employee_travel_records->updated->viewAttributes() ?>>
<?php echo $employee_travel_records->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_travel_records->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_travel_records_view->TableLeftColumnClass ?>"><span id="elh_employee_travel_records_status"><?php echo $employee_travel_records->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_travel_records->status->cellAttributes() ?>>
<span id="el_employee_travel_records_status">
<span<?php echo $employee_travel_records->status->viewAttributes() ?>>
<?php echo $employee_travel_records->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_travel_records_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_travel_records->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_travel_records_view->terminate();
?>