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
$hr_trainingsessions_view = new hr_trainingsessions_view();

// Run the page
$hr_trainingsessions_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_trainingsessions_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_trainingsessions->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_trainingsessionsview = currentForm = new ew.Form("fhr_trainingsessionsview", "view");

// Form_CustomValidate event
fhr_trainingsessionsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_trainingsessionsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_trainingsessionsview.lists["x_deliveryMethod"] = <?php echo $hr_trainingsessions_view->deliveryMethod->Lookup->toClientList() ?>;
fhr_trainingsessionsview.lists["x_deliveryMethod"].options = <?php echo JsonEncode($hr_trainingsessions_view->deliveryMethod->options(FALSE, TRUE)) ?>;
fhr_trainingsessionsview.lists["x_status"] = <?php echo $hr_trainingsessions_view->status->Lookup->toClientList() ?>;
fhr_trainingsessionsview.lists["x_status"].options = <?php echo JsonEncode($hr_trainingsessions_view->status->options(FALSE, TRUE)) ?>;
fhr_trainingsessionsview.lists["x_attendanceType"] = <?php echo $hr_trainingsessions_view->attendanceType->Lookup->toClientList() ?>;
fhr_trainingsessionsview.lists["x_attendanceType"].options = <?php echo JsonEncode($hr_trainingsessions_view->attendanceType->options(FALSE, TRUE)) ?>;
fhr_trainingsessionsview.lists["x_requireProof"] = <?php echo $hr_trainingsessions_view->requireProof->Lookup->toClientList() ?>;
fhr_trainingsessionsview.lists["x_requireProof"].options = <?php echo JsonEncode($hr_trainingsessions_view->requireProof->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_trainingsessions->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_trainingsessions_view->ExportOptions->render("body") ?>
<?php $hr_trainingsessions_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_trainingsessions_view->showPageHeader(); ?>
<?php
$hr_trainingsessions_view->showMessage();
?>
<form name="fhr_trainingsessionsview" id="fhr_trainingsessionsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_trainingsessions_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_trainingsessions_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_trainingsessions">
<input type="hidden" name="modal" value="<?php echo (int)$hr_trainingsessions_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_trainingsessions->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_id"><?php echo $hr_trainingsessions->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_trainingsessions->id->cellAttributes() ?>>
<span id="el_hr_trainingsessions_id">
<span<?php echo $hr_trainingsessions->id->viewAttributes() ?>>
<?php echo $hr_trainingsessions->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_name"><?php echo $hr_trainingsessions->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_trainingsessions->name->cellAttributes() ?>>
<span id="el_hr_trainingsessions_name">
<span<?php echo $hr_trainingsessions->name->viewAttributes() ?>>
<?php echo $hr_trainingsessions->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->course->Visible) { // course ?>
	<tr id="r_course">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_course"><?php echo $hr_trainingsessions->course->caption() ?></span></td>
		<td data-name="course"<?php echo $hr_trainingsessions->course->cellAttributes() ?>>
<span id="el_hr_trainingsessions_course">
<span<?php echo $hr_trainingsessions->course->viewAttributes() ?>>
<?php echo $hr_trainingsessions->course->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_description"><?php echo $hr_trainingsessions->description->caption() ?></span></td>
		<td data-name="description"<?php echo $hr_trainingsessions->description->cellAttributes() ?>>
<span id="el_hr_trainingsessions_description">
<span<?php echo $hr_trainingsessions->description->viewAttributes() ?>>
<?php echo $hr_trainingsessions->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->scheduled->Visible) { // scheduled ?>
	<tr id="r_scheduled">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_scheduled"><?php echo $hr_trainingsessions->scheduled->caption() ?></span></td>
		<td data-name="scheduled"<?php echo $hr_trainingsessions->scheduled->cellAttributes() ?>>
<span id="el_hr_trainingsessions_scheduled">
<span<?php echo $hr_trainingsessions->scheduled->viewAttributes() ?>>
<?php echo $hr_trainingsessions->scheduled->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->dueDate->Visible) { // dueDate ?>
	<tr id="r_dueDate">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_dueDate"><?php echo $hr_trainingsessions->dueDate->caption() ?></span></td>
		<td data-name="dueDate"<?php echo $hr_trainingsessions->dueDate->cellAttributes() ?>>
<span id="el_hr_trainingsessions_dueDate">
<span<?php echo $hr_trainingsessions->dueDate->viewAttributes() ?>>
<?php echo $hr_trainingsessions->dueDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->deliveryMethod->Visible) { // deliveryMethod ?>
	<tr id="r_deliveryMethod">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_deliveryMethod"><?php echo $hr_trainingsessions->deliveryMethod->caption() ?></span></td>
		<td data-name="deliveryMethod"<?php echo $hr_trainingsessions->deliveryMethod->cellAttributes() ?>>
<span id="el_hr_trainingsessions_deliveryMethod">
<span<?php echo $hr_trainingsessions->deliveryMethod->viewAttributes() ?>>
<?php echo $hr_trainingsessions->deliveryMethod->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->deliveryLocation->Visible) { // deliveryLocation ?>
	<tr id="r_deliveryLocation">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_deliveryLocation"><?php echo $hr_trainingsessions->deliveryLocation->caption() ?></span></td>
		<td data-name="deliveryLocation"<?php echo $hr_trainingsessions->deliveryLocation->cellAttributes() ?>>
<span id="el_hr_trainingsessions_deliveryLocation">
<span<?php echo $hr_trainingsessions->deliveryLocation->viewAttributes() ?>>
<?php echo $hr_trainingsessions->deliveryLocation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_status"><?php echo $hr_trainingsessions->status->caption() ?></span></td>
		<td data-name="status"<?php echo $hr_trainingsessions->status->cellAttributes() ?>>
<span id="el_hr_trainingsessions_status">
<span<?php echo $hr_trainingsessions->status->viewAttributes() ?>>
<?php echo $hr_trainingsessions->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->attendanceType->Visible) { // attendanceType ?>
	<tr id="r_attendanceType">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_attendanceType"><?php echo $hr_trainingsessions->attendanceType->caption() ?></span></td>
		<td data-name="attendanceType"<?php echo $hr_trainingsessions->attendanceType->cellAttributes() ?>>
<span id="el_hr_trainingsessions_attendanceType">
<span<?php echo $hr_trainingsessions->attendanceType->viewAttributes() ?>>
<?php echo $hr_trainingsessions->attendanceType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->attachment->Visible) { // attachment ?>
	<tr id="r_attachment">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_attachment"><?php echo $hr_trainingsessions->attachment->caption() ?></span></td>
		<td data-name="attachment"<?php echo $hr_trainingsessions->attachment->cellAttributes() ?>>
<span id="el_hr_trainingsessions_attachment">
<span<?php echo $hr_trainingsessions->attachment->viewAttributes() ?>>
<?php echo $hr_trainingsessions->attachment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_created"><?php echo $hr_trainingsessions->created->caption() ?></span></td>
		<td data-name="created"<?php echo $hr_trainingsessions->created->cellAttributes() ?>>
<span id="el_hr_trainingsessions_created">
<span<?php echo $hr_trainingsessions->created->viewAttributes() ?>>
<?php echo $hr_trainingsessions->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_updated"><?php echo $hr_trainingsessions->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $hr_trainingsessions->updated->cellAttributes() ?>>
<span id="el_hr_trainingsessions_updated">
<span<?php echo $hr_trainingsessions->updated->viewAttributes() ?>>
<?php echo $hr_trainingsessions->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_trainingsessions->requireProof->Visible) { // requireProof ?>
	<tr id="r_requireProof">
		<td class="<?php echo $hr_trainingsessions_view->TableLeftColumnClass ?>"><span id="elh_hr_trainingsessions_requireProof"><?php echo $hr_trainingsessions->requireProof->caption() ?></span></td>
		<td data-name="requireProof"<?php echo $hr_trainingsessions->requireProof->cellAttributes() ?>>
<span id="el_hr_trainingsessions_requireProof">
<span<?php echo $hr_trainingsessions->requireProof->viewAttributes() ?>>
<?php echo $hr_trainingsessions->requireProof->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_trainingsessions_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_trainingsessions->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_trainingsessions_view->terminate();
?>