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
$employee_immigrations_view = new employee_immigrations_view();

// Run the page
$employee_immigrations_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_immigrations_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_immigrations->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_immigrationsview = currentForm = new ew.Form("femployee_immigrationsview", "view");

// Form_CustomValidate event
femployee_immigrationsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_immigrationsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_immigrationsview.lists["x_status"] = <?php echo $employee_immigrations_view->status->Lookup->toClientList() ?>;
femployee_immigrationsview.lists["x_status"].options = <?php echo JsonEncode($employee_immigrations_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_immigrations->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_immigrations_view->ExportOptions->render("body") ?>
<?php $employee_immigrations_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_immigrations_view->showPageHeader(); ?>
<?php
$employee_immigrations_view->showMessage();
?>
<form name="femployee_immigrationsview" id="femployee_immigrationsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_immigrations_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_immigrations_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_immigrations">
<input type="hidden" name="modal" value="<?php echo (int)$employee_immigrations_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_immigrations->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_id"><?php echo $employee_immigrations->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_immigrations->id->cellAttributes() ?>>
<span id="el_employee_immigrations_id">
<span<?php echo $employee_immigrations->id->viewAttributes() ?>>
<?php echo $employee_immigrations->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_employee"><?php echo $employee_immigrations->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_immigrations->employee->cellAttributes() ?>>
<span id="el_employee_immigrations_employee">
<span<?php echo $employee_immigrations->employee->viewAttributes() ?>>
<?php echo $employee_immigrations->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->document->Visible) { // document ?>
	<tr id="r_document">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_document"><?php echo $employee_immigrations->document->caption() ?></span></td>
		<td data-name="document"<?php echo $employee_immigrations->document->cellAttributes() ?>>
<span id="el_employee_immigrations_document">
<span<?php echo $employee_immigrations->document->viewAttributes() ?>>
<?php echo $employee_immigrations->document->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->documentname->Visible) { // documentname ?>
	<tr id="r_documentname">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_documentname"><?php echo $employee_immigrations->documentname->caption() ?></span></td>
		<td data-name="documentname"<?php echo $employee_immigrations->documentname->cellAttributes() ?>>
<span id="el_employee_immigrations_documentname">
<span<?php echo $employee_immigrations->documentname->viewAttributes() ?>>
<?php echo $employee_immigrations->documentname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->valid_until->Visible) { // valid_until ?>
	<tr id="r_valid_until">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_valid_until"><?php echo $employee_immigrations->valid_until->caption() ?></span></td>
		<td data-name="valid_until"<?php echo $employee_immigrations->valid_until->cellAttributes() ?>>
<span id="el_employee_immigrations_valid_until">
<span<?php echo $employee_immigrations->valid_until->viewAttributes() ?>>
<?php echo $employee_immigrations->valid_until->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_status"><?php echo $employee_immigrations->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_immigrations->status->cellAttributes() ?>>
<span id="el_employee_immigrations_status">
<span<?php echo $employee_immigrations->status->viewAttributes() ?>>
<?php echo $employee_immigrations->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_details"><?php echo $employee_immigrations->details->caption() ?></span></td>
		<td data-name="details"<?php echo $employee_immigrations->details->cellAttributes() ?>>
<span id="el_employee_immigrations_details">
<span<?php echo $employee_immigrations->details->viewAttributes() ?>>
<?php echo $employee_immigrations->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->attachment1->Visible) { // attachment1 ?>
	<tr id="r_attachment1">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_attachment1"><?php echo $employee_immigrations->attachment1->caption() ?></span></td>
		<td data-name="attachment1"<?php echo $employee_immigrations->attachment1->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment1">
<span<?php echo $employee_immigrations->attachment1->viewAttributes() ?>>
<?php echo $employee_immigrations->attachment1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->attachment2->Visible) { // attachment2 ?>
	<tr id="r_attachment2">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_attachment2"><?php echo $employee_immigrations->attachment2->caption() ?></span></td>
		<td data-name="attachment2"<?php echo $employee_immigrations->attachment2->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment2">
<span<?php echo $employee_immigrations->attachment2->viewAttributes() ?>>
<?php echo $employee_immigrations->attachment2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->attachment3->Visible) { // attachment3 ?>
	<tr id="r_attachment3">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_attachment3"><?php echo $employee_immigrations->attachment3->caption() ?></span></td>
		<td data-name="attachment3"<?php echo $employee_immigrations->attachment3->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment3">
<span<?php echo $employee_immigrations->attachment3->viewAttributes() ?>>
<?php echo $employee_immigrations->attachment3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_created"><?php echo $employee_immigrations->created->caption() ?></span></td>
		<td data-name="created"<?php echo $employee_immigrations->created->cellAttributes() ?>>
<span id="el_employee_immigrations_created">
<span<?php echo $employee_immigrations->created->viewAttributes() ?>>
<?php echo $employee_immigrations->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrations->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $employee_immigrations_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrations_updated"><?php echo $employee_immigrations->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $employee_immigrations->updated->cellAttributes() ?>>
<span id="el_employee_immigrations_updated">
<span<?php echo $employee_immigrations->updated->viewAttributes() ?>>
<?php echo $employee_immigrations->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_immigrations_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_immigrations->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_immigrations_view->terminate();
?>