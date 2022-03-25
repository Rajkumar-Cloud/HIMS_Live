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
$hr_projects_delete = new hr_projects_delete();

// Run the page
$hr_projects_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_projects_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_projectsdelete = currentForm = new ew.Form("fhr_projectsdelete", "delete");

// Form_CustomValidate event
fhr_projectsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_projectsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_projectsdelete.lists["x_status"] = <?php echo $hr_projects_delete->status->Lookup->toClientList() ?>;
fhr_projectsdelete.lists["x_status"].options = <?php echo JsonEncode($hr_projects_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_projects_delete->showPageHeader(); ?>
<?php
$hr_projects_delete->showMessage();
?>
<form name="fhr_projectsdelete" id="fhr_projectsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_projects_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_projects_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_projects">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_projects_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_projects->id->Visible) { // id ?>
		<th class="<?php echo $hr_projects->id->headerCellClass() ?>"><span id="elh_hr_projects_id" class="hr_projects_id"><?php echo $hr_projects->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_projects->name->Visible) { // name ?>
		<th class="<?php echo $hr_projects->name->headerCellClass() ?>"><span id="elh_hr_projects_name" class="hr_projects_name"><?php echo $hr_projects->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_projects->client->Visible) { // client ?>
		<th class="<?php echo $hr_projects->client->headerCellClass() ?>"><span id="elh_hr_projects_client" class="hr_projects_client"><?php echo $hr_projects->client->caption() ?></span></th>
<?php } ?>
<?php if ($hr_projects->details->Visible) { // details ?>
		<th class="<?php echo $hr_projects->details->headerCellClass() ?>"><span id="elh_hr_projects_details" class="hr_projects_details"><?php echo $hr_projects->details->caption() ?></span></th>
<?php } ?>
<?php if ($hr_projects->created->Visible) { // created ?>
		<th class="<?php echo $hr_projects->created->headerCellClass() ?>"><span id="elh_hr_projects_created" class="hr_projects_created"><?php echo $hr_projects->created->caption() ?></span></th>
<?php } ?>
<?php if ($hr_projects->status->Visible) { // status ?>
		<th class="<?php echo $hr_projects->status->headerCellClass() ?>"><span id="elh_hr_projects_status" class="hr_projects_status"><?php echo $hr_projects->status->caption() ?></span></th>
<?php } ?>
<?php if ($hr_projects->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_projects->HospID->headerCellClass() ?>"><span id="elh_hr_projects_HospID" class="hr_projects_HospID"><?php echo $hr_projects->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_projects_delete->RecCnt = 0;
$i = 0;
while (!$hr_projects_delete->Recordset->EOF) {
	$hr_projects_delete->RecCnt++;
	$hr_projects_delete->RowCnt++;

	// Set row properties
	$hr_projects->resetAttributes();
	$hr_projects->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_projects_delete->loadRowValues($hr_projects_delete->Recordset);

	// Render row
	$hr_projects_delete->renderRow();
?>
	<tr<?php echo $hr_projects->rowAttributes() ?>>
<?php if ($hr_projects->id->Visible) { // id ?>
		<td<?php echo $hr_projects->id->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_delete->RowCnt ?>_hr_projects_id" class="hr_projects_id">
<span<?php echo $hr_projects->id->viewAttributes() ?>>
<?php echo $hr_projects->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_projects->name->Visible) { // name ?>
		<td<?php echo $hr_projects->name->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_delete->RowCnt ?>_hr_projects_name" class="hr_projects_name">
<span<?php echo $hr_projects->name->viewAttributes() ?>>
<?php echo $hr_projects->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_projects->client->Visible) { // client ?>
		<td<?php echo $hr_projects->client->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_delete->RowCnt ?>_hr_projects_client" class="hr_projects_client">
<span<?php echo $hr_projects->client->viewAttributes() ?>>
<?php echo $hr_projects->client->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_projects->details->Visible) { // details ?>
		<td<?php echo $hr_projects->details->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_delete->RowCnt ?>_hr_projects_details" class="hr_projects_details">
<span<?php echo $hr_projects->details->viewAttributes() ?>>
<?php echo $hr_projects->details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_projects->created->Visible) { // created ?>
		<td<?php echo $hr_projects->created->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_delete->RowCnt ?>_hr_projects_created" class="hr_projects_created">
<span<?php echo $hr_projects->created->viewAttributes() ?>>
<?php echo $hr_projects->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_projects->status->Visible) { // status ?>
		<td<?php echo $hr_projects->status->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_delete->RowCnt ?>_hr_projects_status" class="hr_projects_status">
<span<?php echo $hr_projects->status->viewAttributes() ?>>
<?php echo $hr_projects->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_projects->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_projects->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_delete->RowCnt ?>_hr_projects_HospID" class="hr_projects_HospID">
<span<?php echo $hr_projects->HospID->viewAttributes() ?>>
<?php echo $hr_projects->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_projects_delete->Recordset->moveNext();
}
$hr_projects_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_projects_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_projects_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_projects_delete->terminate();
?>