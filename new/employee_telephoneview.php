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
$employee_telephone_view = new employee_telephone_view();

// Run the page
$employee_telephone_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_telephone_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_telephone_view->isExport()) { ?>
<script>
var femployee_telephoneview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	femployee_telephoneview = currentForm = new ew.Form("femployee_telephoneview", "view");
	loadjs.done("femployee_telephoneview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$employee_telephone_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_telephone_view->ExportOptions->render("body") ?>
<?php $employee_telephone_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_telephone_view->showPageHeader(); ?>
<?php
$employee_telephone_view->showMessage();
?>
<form name="femployee_telephoneview" id="femployee_telephoneview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_telephone">
<input type="hidden" name="modal" value="<?php echo (int)$employee_telephone_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_telephone_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_id"><?php echo $employee_telephone_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $employee_telephone_view->id->cellAttributes() ?>>
<span id="el_employee_telephone_id">
<span<?php echo $employee_telephone_view->id->viewAttributes() ?>><?php echo $employee_telephone_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone_view->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_employee_id"><?php echo $employee_telephone_view->employee_id->caption() ?></span></td>
		<td data-name="employee_id" <?php echo $employee_telephone_view->employee_id->cellAttributes() ?>>
<span id="el_employee_telephone_employee_id">
<span<?php echo $employee_telephone_view->employee_id->viewAttributes() ?>><?php echo $employee_telephone_view->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone_view->tele_type->Visible) { // tele_type ?>
	<tr id="r_tele_type">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_tele_type"><?php echo $employee_telephone_view->tele_type->caption() ?></span></td>
		<td data-name="tele_type" <?php echo $employee_telephone_view->tele_type->cellAttributes() ?>>
<span id="el_employee_telephone_tele_type">
<span<?php echo $employee_telephone_view->tele_type->viewAttributes() ?>><?php echo $employee_telephone_view->tele_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone_view->telephone->Visible) { // telephone ?>
	<tr id="r_telephone">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_telephone"><?php echo $employee_telephone_view->telephone->caption() ?></span></td>
		<td data-name="telephone" <?php echo $employee_telephone_view->telephone->cellAttributes() ?>>
<span id="el_employee_telephone_telephone">
<span<?php echo $employee_telephone_view->telephone->viewAttributes() ?>><?php echo $employee_telephone_view->telephone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone_view->telephone_type->Visible) { // telephone_type ?>
	<tr id="r_telephone_type">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_telephone_type"><?php echo $employee_telephone_view->telephone_type->caption() ?></span></td>
		<td data-name="telephone_type" <?php echo $employee_telephone_view->telephone_type->cellAttributes() ?>>
<span id="el_employee_telephone_telephone_type">
<span<?php echo $employee_telephone_view->telephone_type->viewAttributes() ?>><?php echo $employee_telephone_view->telephone_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_status"><?php echo $employee_telephone_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $employee_telephone_view->status->cellAttributes() ?>>
<span id="el_employee_telephone_status">
<span<?php echo $employee_telephone_view->status->viewAttributes() ?>><?php echo $employee_telephone_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_createdby"><?php echo $employee_telephone_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $employee_telephone_view->createdby->cellAttributes() ?>>
<span id="el_employee_telephone_createdby">
<span<?php echo $employee_telephone_view->createdby->viewAttributes() ?>><?php echo $employee_telephone_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_createddatetime"><?php echo $employee_telephone_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $employee_telephone_view->createddatetime->cellAttributes() ?>>
<span id="el_employee_telephone_createddatetime">
<span<?php echo $employee_telephone_view->createddatetime->viewAttributes() ?>><?php echo $employee_telephone_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_modifiedby"><?php echo $employee_telephone_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $employee_telephone_view->modifiedby->cellAttributes() ?>>
<span id="el_employee_telephone_modifiedby">
<span<?php echo $employee_telephone_view->modifiedby->viewAttributes() ?>><?php echo $employee_telephone_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_modifieddatetime"><?php echo $employee_telephone_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $employee_telephone_view->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_telephone_modifieddatetime">
<span<?php echo $employee_telephone_view->modifieddatetime->viewAttributes() ?>><?php echo $employee_telephone_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_telephone_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_telephone_view->isExport()) { ?>
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
$employee_telephone_view->terminate();
?>