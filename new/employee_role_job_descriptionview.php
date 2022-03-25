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
$employee_role_job_description_view = new employee_role_job_description_view();

// Run the page
$employee_role_job_description_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_role_job_description_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_role_job_description_view->isExport()) { ?>
<script>
var femployee_role_job_descriptionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	femployee_role_job_descriptionview = currentForm = new ew.Form("femployee_role_job_descriptionview", "view");
	loadjs.done("femployee_role_job_descriptionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$employee_role_job_description_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_role_job_description_view->ExportOptions->render("body") ?>
<?php $employee_role_job_description_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_role_job_description_view->showPageHeader(); ?>
<?php
$employee_role_job_description_view->showMessage();
?>
<form name="femployee_role_job_descriptionview" id="femployee_role_job_descriptionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_role_job_description">
<input type="hidden" name="modal" value="<?php echo (int)$employee_role_job_description_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_role_job_description_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_employee_role_job_description_id"><?php echo $employee_role_job_description_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $employee_role_job_description_view->id->cellAttributes() ?>>
<span id="el_employee_role_job_description_id">
<span<?php echo $employee_role_job_description_view->id->viewAttributes() ?>><?php echo $employee_role_job_description_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_role_job_description_view->role->Visible) { // role ?>
	<tr id="r_role">
		<td class="<?php echo $employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_employee_role_job_description_role"><?php echo $employee_role_job_description_view->role->caption() ?></span></td>
		<td data-name="role" <?php echo $employee_role_job_description_view->role->cellAttributes() ?>>
<span id="el_employee_role_job_description_role">
<span<?php echo $employee_role_job_description_view->role->viewAttributes() ?>><?php echo $employee_role_job_description_view->role->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_role_job_description_view->job_description->Visible) { // job_description ?>
	<tr id="r_job_description">
		<td class="<?php echo $employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_employee_role_job_description_job_description"><?php echo $employee_role_job_description_view->job_description->caption() ?></span></td>
		<td data-name="job_description" <?php echo $employee_role_job_description_view->job_description->cellAttributes() ?>>
<span id="el_employee_role_job_description_job_description">
<span<?php echo $employee_role_job_description_view->job_description->viewAttributes() ?>><?php echo $employee_role_job_description_view->job_description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_role_job_description_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_employee_role_job_description_status"><?php echo $employee_role_job_description_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $employee_role_job_description_view->status->cellAttributes() ?>>
<span id="el_employee_role_job_description_status">
<span<?php echo $employee_role_job_description_view->status->viewAttributes() ?>><?php echo $employee_role_job_description_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_role_job_description_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_employee_role_job_description_createdby"><?php echo $employee_role_job_description_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $employee_role_job_description_view->createdby->cellAttributes() ?>>
<span id="el_employee_role_job_description_createdby">
<span<?php echo $employee_role_job_description_view->createdby->viewAttributes() ?>><?php echo $employee_role_job_description_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_role_job_description_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_employee_role_job_description_createddatetime"><?php echo $employee_role_job_description_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $employee_role_job_description_view->createddatetime->cellAttributes() ?>>
<span id="el_employee_role_job_description_createddatetime">
<span<?php echo $employee_role_job_description_view->createddatetime->viewAttributes() ?>><?php echo $employee_role_job_description_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_role_job_description_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_employee_role_job_description_modifiedby"><?php echo $employee_role_job_description_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $employee_role_job_description_view->modifiedby->cellAttributes() ?>>
<span id="el_employee_role_job_description_modifiedby">
<span<?php echo $employee_role_job_description_view->modifiedby->viewAttributes() ?>><?php echo $employee_role_job_description_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_role_job_description_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_employee_role_job_description_modifieddatetime"><?php echo $employee_role_job_description_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $employee_role_job_description_view->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_role_job_description_modifieddatetime">
<span<?php echo $employee_role_job_description_view->modifieddatetime->viewAttributes() ?>><?php echo $employee_role_job_description_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_role_job_description_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_role_job_description_view->isExport()) { ?>
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
$employee_role_job_description_view->terminate();
?>