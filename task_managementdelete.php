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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftask_managementdelete = currentForm = new ew.Form("ftask_managementdelete", "delete");

// Form_CustomValidate event
ftask_managementdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftask_managementdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftask_managementdelete.lists["x_AssignTo"] = <?php echo $task_management_delete->AssignTo->Lookup->toClientList() ?>;
ftask_managementdelete.lists["x_AssignTo"].options = <?php echo JsonEncode($task_management_delete->AssignTo->lookupOptions()) ?>;
ftask_managementdelete.lists["x_StatusOfTask"] = <?php echo $task_management_delete->StatusOfTask->Lookup->toClientList() ?>;
ftask_managementdelete.lists["x_StatusOfTask"].options = <?php echo JsonEncode($task_management_delete->StatusOfTask->options(FALSE, TRUE)) ?>;
ftask_managementdelete.lists["x_ForwardTo"] = <?php echo $task_management_delete->ForwardTo->Lookup->toClientList() ?>;
ftask_managementdelete.lists["x_ForwardTo"].options = <?php echo JsonEncode($task_management_delete->ForwardTo->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $task_management_delete->showPageHeader(); ?>
<?php
$task_management_delete->showMessage();
?>
<form name="ftask_managementdelete" id="ftask_managementdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($task_management_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $task_management_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="task_management">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($task_management_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($task_management->id->Visible) { // id ?>
		<th class="<?php echo $task_management->id->headerCellClass() ?>"><span id="elh_task_management_id" class="task_management_id"><?php echo $task_management->id->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->TaskName->Visible) { // TaskName ?>
		<th class="<?php echo $task_management->TaskName->headerCellClass() ?>"><span id="elh_task_management_TaskName" class="task_management_TaskName"><?php echo $task_management->TaskName->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->AssignTo->Visible) { // AssignTo ?>
		<th class="<?php echo $task_management->AssignTo->headerCellClass() ?>"><span id="elh_task_management_AssignTo" class="task_management_AssignTo"><?php echo $task_management->AssignTo->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->StartDate->Visible) { // StartDate ?>
		<th class="<?php echo $task_management->StartDate->headerCellClass() ?>"><span id="elh_task_management_StartDate" class="task_management_StartDate"><?php echo $task_management->StartDate->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->EndDate->Visible) { // EndDate ?>
		<th class="<?php echo $task_management->EndDate->headerCellClass() ?>"><span id="elh_task_management_EndDate" class="task_management_EndDate"><?php echo $task_management->EndDate->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->StatusOfTask->Visible) { // StatusOfTask ?>
		<th class="<?php echo $task_management->StatusOfTask->headerCellClass() ?>"><span id="elh_task_management_StatusOfTask" class="task_management_StatusOfTask"><?php echo $task_management->StatusOfTask->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->ForwardTo->Visible) { // ForwardTo ?>
		<th class="<?php echo $task_management->ForwardTo->headerCellClass() ?>"><span id="elh_task_management_ForwardTo" class="task_management_ForwardTo"><?php echo $task_management->ForwardTo->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->createdby->Visible) { // createdby ?>
		<th class="<?php echo $task_management->createdby->headerCellClass() ?>"><span id="elh_task_management_createdby" class="task_management_createdby"><?php echo $task_management->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $task_management->createddatetime->headerCellClass() ?>"><span id="elh_task_management_createddatetime" class="task_management_createddatetime"><?php echo $task_management->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $task_management->modifiedby->headerCellClass() ?>"><span id="elh_task_management_modifiedby" class="task_management_modifiedby"><?php echo $task_management->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $task_management->modifieddatetime->headerCellClass() ?>"><span id="elh_task_management_modifieddatetime" class="task_management_modifieddatetime"><?php echo $task_management->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->GetUserName->Visible) { // GetUserName ?>
		<th class="<?php echo $task_management->GetUserName->headerCellClass() ?>"><span id="elh_task_management_GetUserName" class="task_management_GetUserName"><?php echo $task_management->GetUserName->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->GetModifiedName->Visible) { // GetModifiedName ?>
		<th class="<?php echo $task_management->GetModifiedName->headerCellClass() ?>"><span id="elh_task_management_GetModifiedName" class="task_management_GetModifiedName"><?php echo $task_management->GetModifiedName->caption() ?></span></th>
<?php } ?>
<?php if ($task_management->HospID->Visible) { // HospID ?>
		<th class="<?php echo $task_management->HospID->headerCellClass() ?>"><span id="elh_task_management_HospID" class="task_management_HospID"><?php echo $task_management->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$task_management_delete->RecCnt = 0;
$i = 0;
while (!$task_management_delete->Recordset->EOF) {
	$task_management_delete->RecCnt++;
	$task_management_delete->RowCnt++;

	// Set row properties
	$task_management->resetAttributes();
	$task_management->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$task_management_delete->loadRowValues($task_management_delete->Recordset);

	// Render row
	$task_management_delete->renderRow();
?>
	<tr<?php echo $task_management->rowAttributes() ?>>
<?php if ($task_management->id->Visible) { // id ?>
		<td<?php echo $task_management->id->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_id" class="task_management_id">
<span<?php echo $task_management->id->viewAttributes() ?>>
<?php echo $task_management->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->TaskName->Visible) { // TaskName ?>
		<td<?php echo $task_management->TaskName->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_TaskName" class="task_management_TaskName">
<span<?php echo $task_management->TaskName->viewAttributes() ?>>
<?php echo $task_management->TaskName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->AssignTo->Visible) { // AssignTo ?>
		<td<?php echo $task_management->AssignTo->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_AssignTo" class="task_management_AssignTo">
<span<?php echo $task_management->AssignTo->viewAttributes() ?>>
<?php echo $task_management->AssignTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->StartDate->Visible) { // StartDate ?>
		<td<?php echo $task_management->StartDate->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_StartDate" class="task_management_StartDate">
<span<?php echo $task_management->StartDate->viewAttributes() ?>>
<?php echo $task_management->StartDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->EndDate->Visible) { // EndDate ?>
		<td<?php echo $task_management->EndDate->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_EndDate" class="task_management_EndDate">
<span<?php echo $task_management->EndDate->viewAttributes() ?>>
<?php echo $task_management->EndDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->StatusOfTask->Visible) { // StatusOfTask ?>
		<td<?php echo $task_management->StatusOfTask->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_StatusOfTask" class="task_management_StatusOfTask">
<span<?php echo $task_management->StatusOfTask->viewAttributes() ?>>
<?php echo $task_management->StatusOfTask->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->ForwardTo->Visible) { // ForwardTo ?>
		<td<?php echo $task_management->ForwardTo->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_ForwardTo" class="task_management_ForwardTo">
<span<?php echo $task_management->ForwardTo->viewAttributes() ?>>
<?php echo $task_management->ForwardTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->createdby->Visible) { // createdby ?>
		<td<?php echo $task_management->createdby->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_createdby" class="task_management_createdby">
<span<?php echo $task_management->createdby->viewAttributes() ?>>
<?php echo $task_management->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $task_management->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_createddatetime" class="task_management_createddatetime">
<span<?php echo $task_management->createddatetime->viewAttributes() ?>>
<?php echo $task_management->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $task_management->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_modifiedby" class="task_management_modifiedby">
<span<?php echo $task_management->modifiedby->viewAttributes() ?>>
<?php echo $task_management->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $task_management->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_modifieddatetime" class="task_management_modifieddatetime">
<span<?php echo $task_management->modifieddatetime->viewAttributes() ?>>
<?php echo $task_management->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->GetUserName->Visible) { // GetUserName ?>
		<td<?php echo $task_management->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_GetUserName" class="task_management_GetUserName">
<span<?php echo $task_management->GetUserName->viewAttributes() ?>>
<?php echo $task_management->GetUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->GetModifiedName->Visible) { // GetModifiedName ?>
		<td<?php echo $task_management->GetModifiedName->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_GetModifiedName" class="task_management_GetModifiedName">
<span<?php echo $task_management->GetModifiedName->viewAttributes() ?>>
<?php echo $task_management->GetModifiedName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($task_management->HospID->Visible) { // HospID ?>
		<td<?php echo $task_management->HospID->cellAttributes() ?>>
<span id="el<?php echo $task_management_delete->RowCnt ?>_task_management_HospID" class="task_management_HospID">
<span<?php echo $task_management->HospID->viewAttributes() ?>>
<?php echo $task_management->HospID->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$task_management_delete->terminate();
?>