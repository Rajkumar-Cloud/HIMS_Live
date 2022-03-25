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
$employee_immigrationdocuments_view = new employee_immigrationdocuments_view();

// Run the page
$employee_immigrationdocuments_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_immigrationdocuments_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_immigrationdocuments->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_immigrationdocumentsview = currentForm = new ew.Form("femployee_immigrationdocumentsview", "view");

// Form_CustomValidate event
femployee_immigrationdocumentsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_immigrationdocumentsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_immigrationdocumentsview.lists["x_required"] = <?php echo $employee_immigrationdocuments_view->required->Lookup->toClientList() ?>;
femployee_immigrationdocumentsview.lists["x_required"].options = <?php echo JsonEncode($employee_immigrationdocuments_view->required->options(FALSE, TRUE)) ?>;
femployee_immigrationdocumentsview.lists["x_alert_on_missing"] = <?php echo $employee_immigrationdocuments_view->alert_on_missing->Lookup->toClientList() ?>;
femployee_immigrationdocumentsview.lists["x_alert_on_missing"].options = <?php echo JsonEncode($employee_immigrationdocuments_view->alert_on_missing->options(FALSE, TRUE)) ?>;
femployee_immigrationdocumentsview.lists["x_alert_before_expiry"] = <?php echo $employee_immigrationdocuments_view->alert_before_expiry->Lookup->toClientList() ?>;
femployee_immigrationdocumentsview.lists["x_alert_before_expiry"].options = <?php echo JsonEncode($employee_immigrationdocuments_view->alert_before_expiry->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_immigrationdocuments->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_immigrationdocuments_view->ExportOptions->render("body") ?>
<?php $employee_immigrationdocuments_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_immigrationdocuments_view->showPageHeader(); ?>
<?php
$employee_immigrationdocuments_view->showMessage();
?>
<form name="femployee_immigrationdocumentsview" id="femployee_immigrationdocumentsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_immigrationdocuments_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_immigrationdocuments_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_immigrationdocuments">
<input type="hidden" name="modal" value="<?php echo (int)$employee_immigrationdocuments_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_immigrationdocuments->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_immigrationdocuments_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_id"><?php echo $employee_immigrationdocuments->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_immigrationdocuments->id->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_id">
<span<?php echo $employee_immigrationdocuments->id->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrationdocuments->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $employee_immigrationdocuments_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_name"><?php echo $employee_immigrationdocuments->name->caption() ?></span></td>
		<td data-name="name"<?php echo $employee_immigrationdocuments->name->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_name">
<span<?php echo $employee_immigrationdocuments->name->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrationdocuments->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $employee_immigrationdocuments_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_details"><?php echo $employee_immigrationdocuments->details->caption() ?></span></td>
		<td data-name="details"<?php echo $employee_immigrationdocuments->details->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_details">
<span<?php echo $employee_immigrationdocuments->details->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrationdocuments->required->Visible) { // required ?>
	<tr id="r_required">
		<td class="<?php echo $employee_immigrationdocuments_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_required"><?php echo $employee_immigrationdocuments->required->caption() ?></span></td>
		<td data-name="required"<?php echo $employee_immigrationdocuments->required->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_required">
<span<?php echo $employee_immigrationdocuments->required->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->required->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_on_missing->Visible) { // alert_on_missing ?>
	<tr id="r_alert_on_missing">
		<td class="<?php echo $employee_immigrationdocuments_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_alert_on_missing"><?php echo $employee_immigrationdocuments->alert_on_missing->caption() ?></span></td>
		<td data-name="alert_on_missing"<?php echo $employee_immigrationdocuments->alert_on_missing->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_on_missing">
<span<?php echo $employee_immigrationdocuments->alert_on_missing->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->alert_on_missing->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_before_expiry->Visible) { // alert_before_expiry ?>
	<tr id="r_alert_before_expiry">
		<td class="<?php echo $employee_immigrationdocuments_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_alert_before_expiry"><?php echo $employee_immigrationdocuments->alert_before_expiry->caption() ?></span></td>
		<td data-name="alert_before_expiry"<?php echo $employee_immigrationdocuments->alert_before_expiry->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_before_expiry">
<span<?php echo $employee_immigrationdocuments->alert_before_expiry->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->alert_before_expiry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_before_day_number->Visible) { // alert_before_day_number ?>
	<tr id="r_alert_before_day_number">
		<td class="<?php echo $employee_immigrationdocuments_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_alert_before_day_number"><?php echo $employee_immigrationdocuments->alert_before_day_number->caption() ?></span></td>
		<td data-name="alert_before_day_number"<?php echo $employee_immigrationdocuments->alert_before_day_number->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_before_day_number">
<span<?php echo $employee_immigrationdocuments->alert_before_day_number->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->alert_before_day_number->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrationdocuments->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $employee_immigrationdocuments_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_created"><?php echo $employee_immigrationdocuments->created->caption() ?></span></td>
		<td data-name="created"<?php echo $employee_immigrationdocuments->created->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_created">
<span<?php echo $employee_immigrationdocuments->created->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_immigrationdocuments->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $employee_immigrationdocuments_view->TableLeftColumnClass ?>"><span id="elh_employee_immigrationdocuments_updated"><?php echo $employee_immigrationdocuments->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $employee_immigrationdocuments->updated->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_updated">
<span<?php echo $employee_immigrationdocuments->updated->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_immigrationdocuments_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_immigrationdocuments->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_immigrationdocuments_view->terminate();
?>