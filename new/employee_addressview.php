<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$employee_address_view = new employee_address_view();

// Run the page
$employee_address_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_address_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_address_view->isExport()) { ?>
<script>
var femployee_addressview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	femployee_addressview = currentForm = new ew.Form("femployee_addressview", "view");
	loadjs.done("femployee_addressview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$employee_address_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_address_view->ExportOptions->render("body") ?>
<?php $employee_address_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_address_view->showPageHeader(); ?>
<?php
$employee_address_view->showMessage();
?>
<form name="femployee_addressview" id="femployee_addressview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_address">
<input type="hidden" name="modal" value="<?php echo (int)$employee_address_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_address_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_id"><?php echo $employee_address_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $employee_address_view->id->cellAttributes() ?>>
<span id="el_employee_address_id">
<span<?php echo $employee_address_view->id->viewAttributes() ?>><?php echo $employee_address_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_employee_id"><?php echo $employee_address_view->employee_id->caption() ?></span></td>
		<td data-name="employee_id" <?php echo $employee_address_view->employee_id->cellAttributes() ?>>
<span id="el_employee_address_employee_id">
<span<?php echo $employee_address_view->employee_id->viewAttributes() ?>><?php echo $employee_address_view->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->contact_persion->Visible) { // contact_persion ?>
	<tr id="r_contact_persion">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_contact_persion"><?php echo $employee_address_view->contact_persion->caption() ?></span></td>
		<td data-name="contact_persion" <?php echo $employee_address_view->contact_persion->cellAttributes() ?>>
<span id="el_employee_address_contact_persion">
<span<?php echo $employee_address_view->contact_persion->viewAttributes() ?>><?php echo $employee_address_view->contact_persion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_street"><?php echo $employee_address_view->street->caption() ?></span></td>
		<td data-name="street" <?php echo $employee_address_view->street->cellAttributes() ?>>
<span id="el_employee_address_street">
<span<?php echo $employee_address_view->street->viewAttributes() ?>><?php echo $employee_address_view->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_town"><?php echo $employee_address_view->town->caption() ?></span></td>
		<td data-name="town" <?php echo $employee_address_view->town->cellAttributes() ?>>
<span id="el_employee_address_town">
<span<?php echo $employee_address_view->town->viewAttributes() ?>><?php echo $employee_address_view->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_province"><?php echo $employee_address_view->province->caption() ?></span></td>
		<td data-name="province" <?php echo $employee_address_view->province->cellAttributes() ?>>
<span id="el_employee_address_province">
<span<?php echo $employee_address_view->province->viewAttributes() ?>><?php echo $employee_address_view->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_postal_code"><?php echo $employee_address_view->postal_code->caption() ?></span></td>
		<td data-name="postal_code" <?php echo $employee_address_view->postal_code->cellAttributes() ?>>
<span id="el_employee_address_postal_code">
<span<?php echo $employee_address_view->postal_code->viewAttributes() ?>><?php echo $employee_address_view->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->address_type->Visible) { // address_type ?>
	<tr id="r_address_type">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_address_type"><?php echo $employee_address_view->address_type->caption() ?></span></td>
		<td data-name="address_type" <?php echo $employee_address_view->address_type->cellAttributes() ?>>
<span id="el_employee_address_address_type">
<span<?php echo $employee_address_view->address_type->viewAttributes() ?>><?php echo $employee_address_view->address_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_status"><?php echo $employee_address_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $employee_address_view->status->cellAttributes() ?>>
<span id="el_employee_address_status">
<span<?php echo $employee_address_view->status->viewAttributes() ?>><?php echo $employee_address_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_createdby"><?php echo $employee_address_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $employee_address_view->createdby->cellAttributes() ?>>
<span id="el_employee_address_createdby">
<span<?php echo $employee_address_view->createdby->viewAttributes() ?>><?php echo $employee_address_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_createddatetime"><?php echo $employee_address_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $employee_address_view->createddatetime->cellAttributes() ?>>
<span id="el_employee_address_createddatetime">
<span<?php echo $employee_address_view->createddatetime->viewAttributes() ?>><?php echo $employee_address_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_modifiedby"><?php echo $employee_address_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $employee_address_view->modifiedby->cellAttributes() ?>>
<span id="el_employee_address_modifiedby">
<span<?php echo $employee_address_view->modifiedby->viewAttributes() ?>><?php echo $employee_address_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_modifieddatetime"><?php echo $employee_address_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $employee_address_view->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_address_modifieddatetime">
<span<?php echo $employee_address_view->modifieddatetime->viewAttributes() ?>><?php echo $employee_address_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_address_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_address_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$employee_address_view->terminate();
?>