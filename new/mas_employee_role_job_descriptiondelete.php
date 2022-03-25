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
<?php include_once "header.php"; ?>
<script>
var fmas_employee_role_job_descriptiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmas_employee_role_job_descriptiondelete = currentForm = new ew.Form("fmas_employee_role_job_descriptiondelete", "delete");
	loadjs.done("fmas_employee_role_job_descriptiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_employee_role_job_description_delete->showPageHeader(); ?>
<?php
$mas_employee_role_job_description_delete->showMessage();
?>
<form name="fmas_employee_role_job_descriptiondelete" id="fmas_employee_role_job_descriptiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_employee_role_job_description">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_employee_role_job_description_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_employee_role_job_description_delete->id->Visible) { // id ?>
		<th class="<?php echo $mas_employee_role_job_description_delete->id->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id"><?php echo $mas_employee_role_job_description_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->role->Visible) { // role ?>
		<th class="<?php echo $mas_employee_role_job_description_delete->role->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role"><?php echo $mas_employee_role_job_description_delete->role->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->job_description->Visible) { // job_description ?>
		<th class="<?php echo $mas_employee_role_job_description_delete->job_description->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description"><?php echo $mas_employee_role_job_description_delete->job_description->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->status->Visible) { // status ?>
		<th class="<?php echo $mas_employee_role_job_description_delete->status->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status"><?php echo $mas_employee_role_job_description_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $mas_employee_role_job_description_delete->createdby->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby"><?php echo $mas_employee_role_job_description_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $mas_employee_role_job_description_delete->createddatetime->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime"><?php echo $mas_employee_role_job_description_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $mas_employee_role_job_description_delete->modifiedby->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby"><?php echo $mas_employee_role_job_description_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $mas_employee_role_job_description_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime"><?php echo $mas_employee_role_job_description_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_employee_role_job_description_delete->RecordCount = 0;
$i = 0;
while (!$mas_employee_role_job_description_delete->Recordset->EOF) {
	$mas_employee_role_job_description_delete->RecordCount++;
	$mas_employee_role_job_description_delete->RowCount++;

	// Set row properties
	$mas_employee_role_job_description->resetAttributes();
	$mas_employee_role_job_description->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_employee_role_job_description_delete->loadRowValues($mas_employee_role_job_description_delete->Recordset);

	// Render row
	$mas_employee_role_job_description_delete->renderRow();
?>
	<tr <?php echo $mas_employee_role_job_description->rowAttributes() ?>>
<?php if ($mas_employee_role_job_description_delete->id->Visible) { // id ?>
		<td <?php echo $mas_employee_role_job_description_delete->id->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCount ?>_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id">
<span<?php echo $mas_employee_role_job_description_delete->id->viewAttributes() ?>><?php echo $mas_employee_role_job_description_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->role->Visible) { // role ?>
		<td <?php echo $mas_employee_role_job_description_delete->role->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCount ?>_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role">
<span<?php echo $mas_employee_role_job_description_delete->role->viewAttributes() ?>><?php echo $mas_employee_role_job_description_delete->role->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->job_description->Visible) { // job_description ?>
		<td <?php echo $mas_employee_role_job_description_delete->job_description->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCount ?>_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description">
<span<?php echo $mas_employee_role_job_description_delete->job_description->viewAttributes() ?>><?php echo $mas_employee_role_job_description_delete->job_description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->status->Visible) { // status ?>
		<td <?php echo $mas_employee_role_job_description_delete->status->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCount ?>_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status">
<span<?php echo $mas_employee_role_job_description_delete->status->viewAttributes() ?>><?php echo $mas_employee_role_job_description_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $mas_employee_role_job_description_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCount ?>_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby">
<span<?php echo $mas_employee_role_job_description_delete->createdby->viewAttributes() ?>><?php echo $mas_employee_role_job_description_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $mas_employee_role_job_description_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCount ?>_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime">
<span<?php echo $mas_employee_role_job_description_delete->createddatetime->viewAttributes() ?>><?php echo $mas_employee_role_job_description_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $mas_employee_role_job_description_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCount ?>_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby">
<span<?php echo $mas_employee_role_job_description_delete->modifiedby->viewAttributes() ?>><?php echo $mas_employee_role_job_description_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_employee_role_job_description_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $mas_employee_role_job_description_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_delete->RowCount ?>_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime">
<span<?php echo $mas_employee_role_job_description_delete->modifieddatetime->viewAttributes() ?>><?php echo $mas_employee_role_job_description_delete->modifieddatetime->getViewValue() ?></span>
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
$mas_employee_role_job_description_delete->terminate();
?>