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
<?php include_once "header.php" ?>
<?php if (!$task_management->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftask_managementview = currentForm = new ew.Form("ftask_managementview", "view");

// Form_CustomValidate event
ftask_managementview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftask_managementview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftask_managementview.lists["x_AssignTo"] = <?php echo $task_management_view->AssignTo->Lookup->toClientList() ?>;
ftask_managementview.lists["x_AssignTo"].options = <?php echo JsonEncode($task_management_view->AssignTo->lookupOptions()) ?>;
ftask_managementview.lists["x_StatusOfTask"] = <?php echo $task_management_view->StatusOfTask->Lookup->toClientList() ?>;
ftask_managementview.lists["x_StatusOfTask"].options = <?php echo JsonEncode($task_management_view->StatusOfTask->options(FALSE, TRUE)) ?>;
ftask_managementview.lists["x_ForwardTo"] = <?php echo $task_management_view->ForwardTo->Lookup->toClientList() ?>;
ftask_managementview.lists["x_ForwardTo"].options = <?php echo JsonEncode($task_management_view->ForwardTo->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$task_management->isExport()) { ?>
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
<?php if ($task_management_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $task_management_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="task_management">
<input type="hidden" name="modal" value="<?php echo (int)$task_management_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($task_management->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_id"><?php echo $task_management->id->caption() ?></span></td>
		<td data-name="id"<?php echo $task_management->id->cellAttributes() ?>>
<span id="el_task_management_id">
<span<?php echo $task_management->id->viewAttributes() ?>>
<?php echo $task_management->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->TaskName->Visible) { // TaskName ?>
	<tr id="r_TaskName">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_TaskName"><?php echo $task_management->TaskName->caption() ?></span></td>
		<td data-name="TaskName"<?php echo $task_management->TaskName->cellAttributes() ?>>
<span id="el_task_management_TaskName">
<span<?php echo $task_management->TaskName->viewAttributes() ?>>
<?php echo $task_management->TaskName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->AssignTo->Visible) { // AssignTo ?>
	<tr id="r_AssignTo">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_AssignTo"><?php echo $task_management->AssignTo->caption() ?></span></td>
		<td data-name="AssignTo"<?php echo $task_management->AssignTo->cellAttributes() ?>>
<span id="el_task_management_AssignTo">
<span<?php echo $task_management->AssignTo->viewAttributes() ?>>
<?php echo $task_management->AssignTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->Description->Visible) { // Description ?>
	<tr id="r_Description">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_Description"><?php echo $task_management->Description->caption() ?></span></td>
		<td data-name="Description"<?php echo $task_management->Description->cellAttributes() ?>>
<span id="el_task_management_Description">
<span<?php echo $task_management->Description->viewAttributes() ?>>
<?php echo $task_management->Description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->StartDate->Visible) { // StartDate ?>
	<tr id="r_StartDate">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_StartDate"><?php echo $task_management->StartDate->caption() ?></span></td>
		<td data-name="StartDate"<?php echo $task_management->StartDate->cellAttributes() ?>>
<span id="el_task_management_StartDate">
<span<?php echo $task_management->StartDate->viewAttributes() ?>>
<?php echo $task_management->StartDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->EndDate->Visible) { // EndDate ?>
	<tr id="r_EndDate">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_EndDate"><?php echo $task_management->EndDate->caption() ?></span></td>
		<td data-name="EndDate"<?php echo $task_management->EndDate->cellAttributes() ?>>
<span id="el_task_management_EndDate">
<span<?php echo $task_management->EndDate->viewAttributes() ?>>
<?php echo $task_management->EndDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->StatusOfTask->Visible) { // StatusOfTask ?>
	<tr id="r_StatusOfTask">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_StatusOfTask"><?php echo $task_management->StatusOfTask->caption() ?></span></td>
		<td data-name="StatusOfTask"<?php echo $task_management->StatusOfTask->cellAttributes() ?>>
<span id="el_task_management_StatusOfTask">
<span<?php echo $task_management->StatusOfTask->viewAttributes() ?>>
<?php echo $task_management->StatusOfTask->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->ForwardTo->Visible) { // ForwardTo ?>
	<tr id="r_ForwardTo">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_ForwardTo"><?php echo $task_management->ForwardTo->caption() ?></span></td>
		<td data-name="ForwardTo"<?php echo $task_management->ForwardTo->cellAttributes() ?>>
<span id="el_task_management_ForwardTo">
<span<?php echo $task_management->ForwardTo->viewAttributes() ?>>
<?php echo $task_management->ForwardTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_createdby"><?php echo $task_management->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $task_management->createdby->cellAttributes() ?>>
<span id="el_task_management_createdby">
<span<?php echo $task_management->createdby->viewAttributes() ?>>
<?php echo $task_management->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_createddatetime"><?php echo $task_management->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $task_management->createddatetime->cellAttributes() ?>>
<span id="el_task_management_createddatetime">
<span<?php echo $task_management->createddatetime->viewAttributes() ?>>
<?php echo $task_management->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_modifiedby"><?php echo $task_management->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $task_management->modifiedby->cellAttributes() ?>>
<span id="el_task_management_modifiedby">
<span<?php echo $task_management->modifiedby->viewAttributes() ?>>
<?php echo $task_management->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_modifieddatetime"><?php echo $task_management->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $task_management->modifieddatetime->cellAttributes() ?>>
<span id="el_task_management_modifieddatetime">
<span<?php echo $task_management->modifieddatetime->viewAttributes() ?>>
<?php echo $task_management->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->GetUserName->Visible) { // GetUserName ?>
	<tr id="r_GetUserName">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_GetUserName"><?php echo $task_management->GetUserName->caption() ?></span></td>
		<td data-name="GetUserName"<?php echo $task_management->GetUserName->cellAttributes() ?>>
<span id="el_task_management_GetUserName">
<span<?php echo $task_management->GetUserName->viewAttributes() ?>>
<?php echo $task_management->GetUserName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->GetModifiedName->Visible) { // GetModifiedName ?>
	<tr id="r_GetModifiedName">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_GetModifiedName"><?php echo $task_management->GetModifiedName->caption() ?></span></td>
		<td data-name="GetModifiedName"<?php echo $task_management->GetModifiedName->cellAttributes() ?>>
<span id="el_task_management_GetModifiedName">
<span<?php echo $task_management->GetModifiedName->viewAttributes() ?>>
<?php echo $task_management->GetModifiedName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($task_management->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $task_management_view->TableLeftColumnClass ?>"><span id="elh_task_management_HospID"><?php echo $task_management->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $task_management->HospID->cellAttributes() ?>>
<span id="el_task_management_HospID">
<span<?php echo $task_management->HospID->viewAttributes() ?>>
<?php echo $task_management->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$task_management_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$task_management->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$task_management_view->terminate();
?>