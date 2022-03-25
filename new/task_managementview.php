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
$task_management_view = new task_management_view();

// Run the page
$task_management_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$task_management_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$task_management_view->isExport()) { ?>
<script>
var ftask_managementview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ftask_managementview = currentForm = new ew.Form("ftask_managementview", "view");
	loadjs.done("ftask_managementview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$task_management_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $task_management_view->ExportOptions->render("body") ?>
<?php $task_management_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $task_management_view->showPageHeader(); ?>
<?php
$task_management_view->showMessage();
?>
<form name="ftask_managementview" id="ftask_managementview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="task_management">
<input type="hidden" name="modal" value="<?php echo (int)$task_management_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($task_management_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_id"><?php echo $task_management_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $task_management_view->id->cellAttributes() ?>>
<span id="el_task_management_id">
<span<?php echo $task_management_view->id->viewAttributes() ?>><?php echo $task_management_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->TaskName->Visible) { // TaskName ?>
	<tr id="r_TaskName">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_TaskName"><?php echo $task_management_view->TaskName->caption() ?></span></td>
		<td data-name="TaskName" <?php echo $task_management_view->TaskName->cellAttributes() ?>>
<span id="el_task_management_TaskName">
<span<?php echo $task_management_view->TaskName->viewAttributes() ?>><?php echo $task_management_view->TaskName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->AssignTo->Visible) { // AssignTo ?>
	<tr id="r_AssignTo">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_AssignTo"><?php echo $task_management_view->AssignTo->caption() ?></span></td>
		<td data-name="AssignTo" <?php echo $task_management_view->AssignTo->cellAttributes() ?>>
<span id="el_task_management_AssignTo">
<span<?php echo $task_management_view->AssignTo->viewAttributes() ?>><?php echo $task_management_view->AssignTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->Description->Visible) { // Description ?>
	<tr id="r_Description">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_Description"><?php echo $task_management_view->Description->caption() ?></span></td>
		<td data-name="Description" <?php echo $task_management_view->Description->cellAttributes() ?>>
<span id="el_task_management_Description">
<span<?php echo $task_management_view->Description->viewAttributes() ?>><?php echo $task_management_view->Description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->StartDate->Visible) { // StartDate ?>
	<tr id="r_StartDate">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_StartDate"><?php echo $task_management_view->StartDate->caption() ?></span></td>
		<td data-name="StartDate" <?php echo $task_management_view->StartDate->cellAttributes() ?>>
<span id="el_task_management_StartDate">
<span<?php echo $task_management_view->StartDate->viewAttributes() ?>><?php echo $task_management_view->StartDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->EndDate->Visible) { // EndDate ?>
	<tr id="r_EndDate">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_EndDate"><?php echo $task_management_view->EndDate->caption() ?></span></td>
		<td data-name="EndDate" <?php echo $task_management_view->EndDate->cellAttributes() ?>>
<span id="el_task_management_EndDate">
<span<?php echo $task_management_view->EndDate->viewAttributes() ?>><?php echo $task_management_view->EndDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->StatusOfTask->Visible) { // StatusOfTask ?>
	<tr id="r_StatusOfTask">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_StatusOfTask"><?php echo $task_management_view->StatusOfTask->caption() ?></span></td>
		<td data-name="StatusOfTask" <?php echo $task_management_view->StatusOfTask->cellAttributes() ?>>
<span id="el_task_management_StatusOfTask">
<span<?php echo $task_management_view->StatusOfTask->viewAttributes() ?>><?php echo $task_management_view->StatusOfTask->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->ForwardTo->Visible) { // ForwardTo ?>
	<tr id="r_ForwardTo">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_ForwardTo"><?php echo $task_management_view->ForwardTo->caption() ?></span></td>
		<td data-name="ForwardTo" <?php echo $task_management_view->ForwardTo->cellAttributes() ?>>
<span id="el_task_management_ForwardTo">
<span<?php echo $task_management_view->ForwardTo->viewAttributes() ?>><?php echo $task_management_view->ForwardTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_createdby"><?php echo $task_management_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $task_management_view->createdby->cellAttributes() ?>>
<span id="el_task_management_createdby">
<span<?php echo $task_management_view->createdby->viewAttributes() ?>><?php echo $task_management_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_createddatetime"><?php echo $task_management_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $task_management_view->createddatetime->cellAttributes() ?>>
<span id="el_task_management_createddatetime">
<span<?php echo $task_management_view->createddatetime->viewAttributes() ?>><?php echo $task_management_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_modifiedby"><?php echo $task_management_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $task_management_view->modifiedby->cellAttributes() ?>>
<span id="el_task_management_modifiedby">
<span<?php echo $task_management_view->modifiedby->viewAttributes() ?>><?php echo $task_management_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_modifieddatetime"><?php echo $task_management_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $task_management_view->modifieddatetime->cellAttributes() ?>>
<span id="el_task_management_modifieddatetime">
<span<?php echo $task_management_view->modifieddatetime->viewAttributes() ?>><?php echo $task_management_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->GetUserName->Visible) { // GetUserName ?>
	<tr id="r_GetUserName">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_GetUserName"><?php echo $task_management_view->GetUserName->caption() ?></span></td>
		<td data-name="GetUserName" <?php echo $task_management_view->GetUserName->cellAttributes() ?>>
<span id="el_task_management_GetUserName">
<span<?php echo $task_management_view->GetUserName->viewAttributes() ?>><?php echo $task_management_view->GetUserName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->GetModifiedName->Visible) { // GetModifiedName ?>
	<tr id="r_GetModifiedName">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_GetModifiedName"><?php echo $task_management_view->GetModifiedName->caption() ?></span></td>
		<td data-name="GetModifiedName" <?php echo $task_management_view->GetModifiedName->cellAttributes() ?>>
<span id="el_task_management_GetModifiedName">
<span<?php echo $task_management_view->GetModifiedName->viewAttributes() ?>><?php echo $task_management_view->GetModifiedName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_HospID"><?php echo $task_management_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $task_management_view->HospID->cellAttributes() ?>>
<span id="el_task_management_HospID">
<span<?php echo $task_management_view->HospID->viewAttributes() ?>><?php echo $task_management_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$task_management_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$task_management_view->isExport()) { ?>
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
$task_management_view->terminate();
?>