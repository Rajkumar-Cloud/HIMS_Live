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
$mas_employee_role_job_description_delete = new mas_employee_role_job_description_delete();

// Run the page
$mas_employee_role_job_description_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_employee_role_job_description_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_employee_role_job_descriptiondelete = currentForm = new ew.Form("fmas_employee_role_job_descriptiondelete", "delete");

// Form_CustomValidate event
fmas_employee_role_job_descriptiondelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_employee_role_job_descriptiondelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_employee_role_job_descriptiondelete.lists["x_status"] = <?php echo $mas_employee_role_job_description_delete->status->Lookup->toClientList() ?>;
fmas_employee_role_job_descriptiondelete.lists["x_status"].options = <?php echo JsonEncode($mas_employee_role_job_description_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_employee_role_job_description_delete->showPageHeader(); ?>
<?php
$mas_employee_role_job_description_delete->showMessage();
?>
<form name="fmas_employee_role_job_descriptiondelete" id="fmas_employee_role_job_descriptiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_employee_role_job_description_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_employee_role_job_description_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_employee_role_job_description">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_employee_role_job_description_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_employee_role_job_description->id->Visible) { // id ?>
		<th class="<?php echo $mas_employee_role_job_description->id->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id"><?php echo $mas_employee_role_job_description->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description->role->Visible) { // role ?>
		<th class="<?php echo $mas_employee_role_job_description->role->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role"><?php echo $mas_employee_role_job_description->role->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description->job_description->Visible) { // job_description ?>
		<th class="<?php echo $mas_employee_role_job_description->job_description->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description"><?php echo $mas_employee_role_job_description->job_description->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description->status->Visible) { // status ?>
		<th class="<?php echo $mas_employee_role_job_description->status->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status"><?php echo $mas_employee_role_job_description->status->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description->createdby->Visible) { // createdby ?>
		<th class="<?php echo $mas_employee_role_job_description->createdby->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby"><?php echo $mas_employee_role_job_description->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $mas_employee_role_job_description->createddatetime->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime"><?php echo $mas_employee_role_job_description->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $mas_employee_role_job_description->modifiedby->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby"><?php echo $mas_employee_role_job_description->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $mas_employee_role_job_description->modifieddatetime->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime"><?php echo $mas_employee_role_job_description->modifieddatetime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_employee_role_job_description_delete->RecCnt = 0;
$i = 0;
while (!$mas_employee_role_job_description_delete->Recordset->EOF) {
	$mas_employee_role_job_description_delete->RecCnt++;
	$mas_employee_role_job_description_delete->RowCnt++;

	// Set row properties
	$mas_employee_role_job_description->resetAttributes();
	$mas_employee_role_job_description->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_employee_role_job_description_delete->loadRowValues($mas_employee_role_job_description_delete->Recordset);

	// Render row
	$mas_employee_role_job_description_delete->renderRow();
?>
	<tr<?php echo $mas_employee_role_job_description->rowAttributes() ?>>
<?php if ($mas_employee_role_job_description->id->Visible) { // id ?>
		<td<?php echo $mas_employee_role_job_description->id->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCnt ?>_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id">
<span<?php echo $mas_employee_role_job_description->id->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description->role->Visible) { // role ?>
		<td<?php echo $mas_employee_role_job_description->role->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCnt ?>_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role">
<span<?php echo $mas_employee_role_job_description->role->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->role->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description->job_description->Visible) { // job_description ?>
		<td<?php echo $mas_employee_role_job_description->job_description->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCnt ?>_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description">
<span<?php echo $mas_employee_role_job_description->job_description->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->job_description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description->status->Visible) { // status ?>
		<td<?php echo $mas_employee_role_job_description->status->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCnt ?>_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status">
<span<?php echo $mas_employee_role_job_description->status->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description->createdby->Visible) { // createdby ?>
		<td<?php echo $mas_employee_role_job_description->createdby->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCnt ?>_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby">
<span<?php echo $mas_employee_role_job_description->createdby->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $mas_employee_role_job_description->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCnt ?>_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime">
<span<?php echo $mas_employee_role_job_description->createddatetime->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $mas_employee_role_job_description->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCnt ?>_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby">
<span<?php echo $mas_employee_role_job_description->modifiedby->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $mas_employee_role_job_description->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCnt ?>_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime">
<span<?php echo $mas_employee_role_job_description->modifieddatetime->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_employee_role_job_description_delete->Recordset->moveNext();
}
$mas_employee_role_job_description_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_employee_role_job_description_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_employee_role_job_description_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_employee_role_job_description_delete->terminate();
?>