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
$employee_emergency_contacts_view = new employee_emergency_contacts_view();

// Run the page
$employee_emergency_contacts_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_emergency_contacts_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_emergency_contacts->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_emergency_contactsview = currentForm = new ew.Form("femployee_emergency_contactsview", "view");

// Form_CustomValidate event
femployee_emergency_contactsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_emergency_contactsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_emergency_contacts->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_emergency_contacts_view->ExportOptions->render("body") ?>
<?php $employee_emergency_contacts_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_emergency_contacts_view->showPageHeader(); ?>
<?php
$employee_emergency_contacts_view->showMessage();
?>
<form name="femployee_emergency_contactsview" id="femployee_emergency_contactsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_emergency_contacts_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_emergency_contacts_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_emergency_contacts">
<input type="hidden" name="modal" value="<?php echo (int)$employee_emergency_contacts_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_emergency_contacts->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_emergency_contacts_view->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_id"><?php echo $employee_emergency_contacts->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_emergency_contacts->id->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_id">
<span<?php echo $employee_emergency_contacts->id->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_emergency_contacts->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_emergency_contacts_view->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_employee"><?php echo $employee_emergency_contacts->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_emergency_contacts->employee->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_employee">
<span<?php echo $employee_emergency_contacts->employee->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_emergency_contacts->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $employee_emergency_contacts_view->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_name"><?php echo $employee_emergency_contacts->name->caption() ?></span></td>
		<td data-name="name"<?php echo $employee_emergency_contacts->name->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_name">
<span<?php echo $employee_emergency_contacts->name->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_emergency_contacts->relationship->Visible) { // relationship ?>
	<tr id="r_relationship">
		<td class="<?php echo $employee_emergency_contacts_view->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_relationship"><?php echo $employee_emergency_contacts->relationship->caption() ?></span></td>
		<td data-name="relationship"<?php echo $employee_emergency_contacts->relationship->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_relationship">
<span<?php echo $employee_emergency_contacts->relationship->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->relationship->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_emergency_contacts->home_phone->Visible) { // home_phone ?>
	<tr id="r_home_phone">
		<td class="<?php echo $employee_emergency_contacts_view->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_home_phone"><?php echo $employee_emergency_contacts->home_phone->caption() ?></span></td>
		<td data-name="home_phone"<?php echo $employee_emergency_contacts->home_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_home_phone">
<span<?php echo $employee_emergency_contacts->home_phone->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->home_phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_emergency_contacts->work_phone->Visible) { // work_phone ?>
	<tr id="r_work_phone">
		<td class="<?php echo $employee_emergency_contacts_view->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_work_phone"><?php echo $employee_emergency_contacts->work_phone->caption() ?></span></td>
		<td data-name="work_phone"<?php echo $employee_emergency_contacts->work_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_work_phone">
<span<?php echo $employee_emergency_contacts->work_phone->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->work_phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_emergency_contacts->mobile_phone->Visible) { // mobile_phone ?>
	<tr id="r_mobile_phone">
		<td class="<?php echo $employee_emergency_contacts_view->TableLeftColumnClass ?>"><span id="elh_employee_emergency_contacts_mobile_phone"><?php echo $employee_emergency_contacts->mobile_phone->caption() ?></span></td>
		<td data-name="mobile_phone"<?php echo $employee_emergency_contacts->mobile_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_mobile_phone">
<span<?php echo $employee_emergency_contacts->mobile_phone->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->mobile_phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_emergency_contacts_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_emergency_contacts->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_emergency_contacts_view->terminate();
?>