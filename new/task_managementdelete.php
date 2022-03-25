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
$task_management_delete = new task_management_delete();

// Run the page
$task_management_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$task_management_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftask_managementdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ftask_managementdelete = currentForm = new ew.Form("ftask_managementdelete", "delete");
	loadjs.done("ftask_managementdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $task_management_delete->showPageHeader(); ?>
<?php
$task_management_delete->showMessage();
?>
<form name="ftask_managementdelete" id="ftask_managementdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="task_management">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($task_management_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($task_management_delete->id->Visible) { // id ?>
		<th class="<?php echo $task_management_delete->id->headerCellClass() ?>"><span id="elh_task_management_id" class="task_management_id"><?php echo $task_management_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->TaskName->Visible) { // TaskName ?>
		<th class="<?php echo $task_management_delete->TaskName->headerCellClass() ?>"><span id="elh_task_management_TaskName" class="task_management_TaskName"><?php echo $task_management_delete->TaskName->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->AssignTo->Visible) { // AssignTo ?>
		<th class="<?php echo $task_management_delete->AssignTo->headerCellClass() ?>"><span id="elh_task_management_AssignTo" class="task_management_AssignTo"><?php echo $task_management_delete->AssignTo->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->StartDate->Visible) { // StartDate ?>
		<th class="<?php echo $task_management_delete->StartDate->headerCellClass() ?>"><span id="elh_task_management_StartDate" class="task_management_StartDate"><?php echo $task_management_delete->StartDate->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->EndDate->Visible) { // EndDate ?>
		<th class="<?php echo $task_management_delete->EndDate->headerCellClass() ?>"><span id="elh_task_management_EndDate" class="task_management_EndDate"><?php echo $task_management_delete->EndDate->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->StatusOfTask->Visible) { // StatusOfTask ?>
		<th class="<?php echo $task_management_delete->StatusOfTask->headerCellClass() ?>"><span id="elh_task_management_StatusOfTask" class="task_management_StatusOfTask"><?php echo $task_management_delete->StatusOfTask->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->ForwardTo->Visible) { // ForwardTo ?>
		<th class="<?php echo $task_management_delete->ForwardTo->headerCellClass() ?>"><span id="elh_task_management_ForwardTo" class="task_management_ForwardTo"><?php echo $task_management_delete->ForwardTo->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $task_management_delete->createdby->headerCellClass() ?>"><span id="elh_task_management_createdby" class="task_management_createdby"><?php echo $task_management_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $task_management_delete->createddatetime->headerCellClass() ?>"><span id="elh_task_management_createddatetime" class="task_management_createddatetime"><?php echo $task_management_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $task_management_delete->modifiedby->headerCellClass() ?>"><span id="elh_task_management_modifiedby" class="task_management_modifiedby"><?php echo $task_management_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $task_management_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_task_management_modifieddatetime" class="task_management_modifieddatetime"><?php echo $task_management_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->GetUserName->Visible) { // GetUserName ?>
		<th class="<?php echo $task_management_delete->GetUserName->headerCellClass() ?>"><span id="elh_task_management_GetUserName" class="task_management_GetUserName"><?php echo $task_management_delete->GetUserName->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->GetModifiedName->Visible) { // GetModifiedName ?>
		<th class="<?php echo $task_management_delete->GetModifiedName->headerCellClass() ?>"><span id="elh_task_management_GetModifiedName" class="task_management_GetModifiedName"><?php echo $task_management_delete->GetModifiedName->caption() ?></span></th>
<?php } ?>
<?php if ($task_management_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $task_management_delete->HospID->headerCellClass() ?>"><span id="elh_task_management_HospID" class="task_management_HospID"><?php echo $task_management_delete->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$task_management_delete->RecordCount = 0;
$i = 0;
while (!$task_management_delete->Recordset->EOF) {
	$task_management_delete->RecordCount++;
	$task_management_delete->RowCount++;

	// Set row properties
	$task_management->resetAttributes();
	$task_management->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$task_management_delete->loadRowValues($task_management_delete->Recordset);

	// Render row
	$task_management_delete->renderRow();
?>
	<tr <?php echo $task_management->rowAttributes() ?>>
<?php if ($task_management_delete->id->Visible) { // id ?>
		<td <?php echo $task_management_delete->id->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_id" class="task_management_id">
<span<?php echo $task_management_delete->id->viewAttributes() ?>><?php echo $task_management_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->TaskName->Visible) { // TaskName ?>
		<td <?php echo $task_management_delete->TaskName->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_TaskName" class="task_management_TaskName">
<span<?php echo $task_management_delete->TaskName->viewAttributes() ?>><?php echo $task_management_delete->TaskName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->AssignTo->Visible) { // AssignTo ?>
		<td <?php echo $task_management_delete->AssignTo->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_AssignTo" class="task_management_AssignTo">
<span<?php echo $task_management_delete->AssignTo->viewAttributes() ?>><?php echo $task_management_delete->AssignTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->StartDate->Visible) { // StartDate ?>
		<td <?php echo $task_management_delete->StartDate->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_StartDate" class="task_management_StartDate">
<span<?php echo $task_management_delete->StartDate->viewAttributes() ?>><?php echo $task_management_delete->StartDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->EndDate->Visible) { // EndDate ?>
		<td <?php echo $task_management_delete->EndDate->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_EndDate" class="task_management_EndDate">
<span<?php echo $task_management_delete->EndDate->viewAttributes() ?>><?php echo $task_management_delete->EndDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->StatusOfTask->Visible) { // StatusOfTask ?>
		<td <?php echo $task_management_delete->StatusOfTask->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_StatusOfTask" class="task_management_StatusOfTask">
<span<?php echo $task_management_delete->StatusOfTask->viewAttributes() ?>><?php echo $task_management_delete->StatusOfTask->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->ForwardTo->Visible) { // ForwardTo ?>
		<td <?php echo $task_management_delete->ForwardTo->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_ForwardTo" class="task_management_ForwardTo">
<span<?php echo $task_management_delete->ForwardTo->viewAttributes() ?>><?php echo $task_management_delete->ForwardTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $task_management_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_createdby" class="task_management_createdby">
<span<?php echo $task_management_delete->createdby->viewAttributes() ?>><?php echo $task_management_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $task_management_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_createddatetime" class="task_management_createddatetime">
<span<?php echo $task_management_delete->createddatetime->viewAttributes() ?>><?php echo $task_management_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $task_management_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_modifiedby" class="task_management_modifiedby">
<span<?php echo $task_management_delete->modifiedby->viewAttributes() ?>><?php echo $task_management_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $task_management_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_modifieddatetime" class="task_management_modifieddatetime">
<span<?php echo $task_management_delete->modifieddatetime->viewAttributes() ?>><?php echo $task_management_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->GetUserName->Visible) { // GetUserName ?>
		<td <?php echo $task_management_delete->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_GetUserName" class="task_management_GetUserName">
<span<?php echo $task_management_delete->GetUserName->viewAttributes() ?>><?php echo $task_management_delete->GetUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->GetModifiedName->Visible) { // GetModifiedName ?>
		<td <?php echo $task_management_delete->GetModifiedName->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_GetModifiedName" class="task_management_GetModifiedName">
<span<?php echo $task_management_delete->GetModifiedName->viewAttributes() ?>><?php echo $task_management_delete->GetModifiedName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $task_management_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCount ?>_task_management_HospID" class="task_management_HospID">
<span<?php echo $task_management_delete->HospID->viewAttributes() ?>><?php echo $task_management_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$task_management_delete->Recordset->moveNext();
}
$task_management_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $task_management_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$task_management_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$task_management_delete->terminate();
?>