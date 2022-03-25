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
$employee_has_degree_view = new employee_has_degree_view();

// Run the page
$employee_has_degree_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_degree_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_has_degree_view->isExport()) { ?>
<script>
var femployee_has_degreeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	femployee_has_degreeview = currentForm = new ew.Form("femployee_has_degreeview", "view");
	loadjs.done("femployee_has_degreeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$employee_has_degree_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_has_degree_view->ExportOptions->render("body") ?>
<?php $employee_has_degree_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_has_degree_view->showPageHeader(); ?>
<?php
$employee_has_degree_view->showMessage();
?>
<form name="femployee_has_degreeview" id="femployee_has_degreeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<input type="hidden" name="modal" value="<?php echo (int)$employee_has_degree_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_has_degree_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_id"><?php echo $employee_has_degree_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $employee_has_degree_view->id->cellAttributes() ?>>
<span id="el_employee_has_degree_id">
<span<?php echo $employee_has_degree_view->id->viewAttributes() ?>><?php echo $employee_has_degree_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_employee_id"><?php echo $employee_has_degree_view->employee_id->caption() ?></span></td>
		<td data-name="employee_id" <?php echo $employee_has_degree_view->employee_id->cellAttributes() ?>>
<span id="el_employee_has_degree_employee_id">
<span<?php echo $employee_has_degree_view->employee_id->viewAttributes() ?>><?php echo $employee_has_degree_view->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->degree_id->Visible) { // degree_id ?>
	<tr id="r_degree_id">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_degree_id"><?php echo $employee_has_degree_view->degree_id->caption() ?></span></td>
		<td data-name="degree_id" <?php echo $employee_has_degree_view->degree_id->cellAttributes() ?>>
<span id="el_employee_has_degree_degree_id">
<span<?php echo $employee_has_degree_view->degree_id->viewAttributes() ?>><?php echo $employee_has_degree_view->degree_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->college_or_school->Visible) { // college_or_school ?>
	<tr id="r_college_or_school">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_college_or_school"><?php echo $employee_has_degree_view->college_or_school->caption() ?></span></td>
		<td data-name="college_or_school" <?php echo $employee_has_degree_view->college_or_school->cellAttributes() ?>>
<span id="el_employee_has_degree_college_or_school">
<span<?php echo $employee_has_degree_view->college_or_school->viewAttributes() ?>><?php echo $employee_has_degree_view->college_or_school->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->university_or_board->Visible) { // university_or_board ?>
	<tr id="r_university_or_board">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_university_or_board"><?php echo $employee_has_degree_view->university_or_board->caption() ?></span></td>
		<td data-name="university_or_board" <?php echo $employee_has_degree_view->university_or_board->cellAttributes() ?>>
<span id="el_employee_has_degree_university_or_board">
<span<?php echo $employee_has_degree_view->university_or_board->viewAttributes() ?>><?php echo $employee_has_degree_view->university_or_board->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->year_of_passing->Visible) { // year_of_passing ?>
	<tr id="r_year_of_passing">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_year_of_passing"><?php echo $employee_has_degree_view->year_of_passing->caption() ?></span></td>
		<td data-name="year_of_passing" <?php echo $employee_has_degree_view->year_of_passing->cellAttributes() ?>>
<span id="el_employee_has_degree_year_of_passing">
<span<?php echo $employee_has_degree_view->year_of_passing->viewAttributes() ?>><?php echo $employee_has_degree_view->year_of_passing->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->scoring_marks->Visible) { // scoring_marks ?>
	<tr id="r_scoring_marks">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_scoring_marks"><?php echo $employee_has_degree_view->scoring_marks->caption() ?></span></td>
		<td data-name="scoring_marks" <?php echo $employee_has_degree_view->scoring_marks->cellAttributes() ?>>
<span id="el_employee_has_degree_scoring_marks">
<span<?php echo $employee_has_degree_view->scoring_marks->viewAttributes() ?>><?php echo $employee_has_degree_view->scoring_marks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->certificates->Visible) { // certificates ?>
	<tr id="r_certificates">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_certificates"><?php echo $employee_has_degree_view->certificates->caption() ?></span></td>
		<td data-name="certificates" <?php echo $employee_has_degree_view->certificates->cellAttributes() ?>>
<span id="el_employee_has_degree_certificates">
<span><?php echo GetFileViewTag($employee_has_degree_view->certificates, $employee_has_degree_view->certificates->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->others->Visible) { // others ?>
	<tr id="r_others">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_others"><?php echo $employee_has_degree_view->others->caption() ?></span></td>
		<td data-name="others" <?php echo $employee_has_degree_view->others->cellAttributes() ?>>
<span id="el_employee_has_degree_others">
<span<?php echo $employee_has_degree_view->others->viewAttributes() ?>><?php echo GetFileViewTag($employee_has_degree_view->others, $employee_has_degree_view->others->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_status"><?php echo $employee_has_degree_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $employee_has_degree_view->status->cellAttributes() ?>>
<span id="el_employee_has_degree_status">
<span<?php echo $employee_has_degree_view->status->viewAttributes() ?>><?php echo $employee_has_degree_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_createdby"><?php echo $employee_has_degree_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $employee_has_degree_view->createdby->cellAttributes() ?>>
<span id="el_employee_has_degree_createdby">
<span<?php echo $employee_has_degree_view->createdby->viewAttributes() ?>><?php echo $employee_has_degree_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_createddatetime"><?php echo $employee_has_degree_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $employee_has_degree_view->createddatetime->cellAttributes() ?>>
<span id="el_employee_has_degree_createddatetime">
<span<?php echo $employee_has_degree_view->createddatetime->viewAttributes() ?>><?php echo $employee_has_degree_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_modifiedby"><?php echo $employee_has_degree_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $employee_has_degree_view->modifiedby->cellAttributes() ?>>
<span id="el_employee_has_degree_modifiedby">
<span<?php echo $employee_has_degree_view->modifiedby->viewAttributes() ?>><?php echo $employee_has_degree_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_modifieddatetime"><?php echo $employee_has_degree_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $employee_has_degree_view->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_has_degree_modifieddatetime">
<span<?php echo $employee_has_degree_view->modifieddatetime->viewAttributes() ?>><?php echo $employee_has_degree_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_has_degree_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_has_degree_view->isExport()) { ?>
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
$employee_has_degree_view->terminate();
?>