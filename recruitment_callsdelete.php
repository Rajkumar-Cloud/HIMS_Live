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
$recruitment_calls_delete = new recruitment_calls_delete();

// Run the page
$recruitment_calls_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_calls_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var frecruitment_callsdelete = currentForm = new ew.Form("frecruitment_callsdelete", "delete");

// Form_CustomValidate event
frecruitment_callsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_callsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $recruitment_calls_delete->showPageHeader(); ?>
<?php
$recruitment_calls_delete->showMessage();
?>
<form name="frecruitment_callsdelete" id="frecruitment_callsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_calls_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_calls_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_calls">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($recruitment_calls_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($recruitment_calls->id->Visible) { // id ?>
		<th class="<?php echo $recruitment_calls->id->headerCellClass() ?>"><span id="elh_recruitment_calls_id" class="recruitment_calls_id"><?php echo $recruitment_calls->id->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_calls->job->Visible) { // job ?>
		<th class="<?php echo $recruitment_calls->job->headerCellClass() ?>"><span id="elh_recruitment_calls_job" class="recruitment_calls_job"><?php echo $recruitment_calls->job->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_calls->candidate->Visible) { // candidate ?>
		<th class="<?php echo $recruitment_calls->candidate->headerCellClass() ?>"><span id="elh_recruitment_calls_candidate" class="recruitment_calls_candidate"><?php echo $recruitment_calls->candidate->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_calls->phone->Visible) { // phone ?>
		<th class="<?php echo $recruitment_calls->phone->headerCellClass() ?>"><span id="elh_recruitment_calls_phone" class="recruitment_calls_phone"><?php echo $recruitment_calls->phone->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_calls->created->Visible) { // created ?>
		<th class="<?php echo $recruitment_calls->created->headerCellClass() ?>"><span id="elh_recruitment_calls_created" class="recruitment_calls_created"><?php echo $recruitment_calls->created->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_calls->updated->Visible) { // updated ?>
		<th class="<?php echo $recruitment_calls->updated->headerCellClass() ?>"><span id="elh_recruitment_calls_updated" class="recruitment_calls_updated"><?php echo $recruitment_calls->updated->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_calls->status->Visible) { // status ?>
		<th class="<?php echo $recruitment_calls->status->headerCellClass() ?>"><span id="elh_recruitment_calls_status" class="recruitment_calls_status"><?php echo $recruitment_calls->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$recruitment_calls_delete->RecCnt = 0;
$i = 0;
while (!$recruitment_calls_delete->Recordset->EOF) {
	$recruitment_calls_delete->RecCnt++;
	$recruitment_calls_delete->RowCnt++;

	// Set row properties
	$recruitment_calls->resetAttributes();
	$recruitment_calls->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$recruitment_calls_delete->loadRowValues($recruitment_calls_delete->Recordset);

	// Render row
	$recruitment_calls_delete->renderRow();
?>
	<tr<?php echo $recruitment_calls->rowAttributes() ?>>
<?php if ($recruitment_calls->id->Visible) { // id ?>
		<td<?php echo $recruitment_calls->id->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_delete->RowCnt ?>_recruitment_calls_id" class="recruitment_calls_id">
<span<?php echo $recruitment_calls->id->viewAttributes() ?>>
<?php echo $recruitment_calls->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_calls->job->Visible) { // job ?>
		<td<?php echo $recruitment_calls->job->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_delete->RowCnt ?>_recruitment_calls_job" class="recruitment_calls_job">
<span<?php echo $recruitment_calls->job->viewAttributes() ?>>
<?php echo $recruitment_calls->job->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_calls->candidate->Visible) { // candidate ?>
		<td<?php echo $recruitment_calls->candidate->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_delete->RowCnt ?>_recruitment_calls_candidate" class="recruitment_calls_candidate">
<span<?php echo $recruitment_calls->candidate->viewAttributes() ?>>
<?php echo $recruitment_calls->candidate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_calls->phone->Visible) { // phone ?>
		<td<?php echo $recruitment_calls->phone->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_delete->RowCnt ?>_recruitment_calls_phone" class="recruitment_calls_phone">
<span<?php echo $recruitment_calls->phone->viewAttributes() ?>>
<?php echo $recruitment_calls->phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_calls->created->Visible) { // created ?>
		<td<?php echo $recruitment_calls->created->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_delete->RowCnt ?>_recruitment_calls_created" class="recruitment_calls_created">
<span<?php echo $recruitment_calls->created->viewAttributes() ?>>
<?php echo $recruitment_calls->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_calls->updated->Visible) { // updated ?>
		<td<?php echo $recruitment_calls->updated->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_delete->RowCnt ?>_recruitment_calls_updated" class="recruitment_calls_updated">
<span<?php echo $recruitment_calls->updated->viewAttributes() ?>>
<?php echo $recruitment_calls->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_calls->status->Visible) { // status ?>
		<td<?php echo $recruitment_calls->status->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_delete->RowCnt ?>_recruitment_calls_status" class="recruitment_calls_status">
<span<?php echo $recruitment_calls->status->viewAttributes() ?>>
<?php echo $recruitment_calls->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$recruitment_calls_delete->Recordset->moveNext();
}
$recruitment_calls_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recruitment_calls_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$recruitment_calls_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$recruitment_calls_delete->terminate();
?>