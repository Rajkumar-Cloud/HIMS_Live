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
$recruitment_interviews_delete = new recruitment_interviews_delete();

// Run the page
$recruitment_interviews_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_interviews_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var frecruitment_interviewsdelete = currentForm = new ew.Form("frecruitment_interviewsdelete", "delete");

// Form_CustomValidate event
frecruitment_interviewsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_interviewsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $recruitment_interviews_delete->showPageHeader(); ?>
<?php
$recruitment_interviews_delete->showMessage();
?>
<form name="frecruitment_interviewsdelete" id="frecruitment_interviewsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_interviews_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_interviews_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_interviews">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($recruitment_interviews_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($recruitment_interviews->id->Visible) { // id ?>
		<th class="<?php echo $recruitment_interviews->id->headerCellClass() ?>"><span id="elh_recruitment_interviews_id" class="recruitment_interviews_id"><?php echo $recruitment_interviews->id->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_interviews->job->Visible) { // job ?>
		<th class="<?php echo $recruitment_interviews->job->headerCellClass() ?>"><span id="elh_recruitment_interviews_job" class="recruitment_interviews_job"><?php echo $recruitment_interviews->job->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_interviews->candidate->Visible) { // candidate ?>
		<th class="<?php echo $recruitment_interviews->candidate->headerCellClass() ?>"><span id="elh_recruitment_interviews_candidate" class="recruitment_interviews_candidate"><?php echo $recruitment_interviews->candidate->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_interviews->level->Visible) { // level ?>
		<th class="<?php echo $recruitment_interviews->level->headerCellClass() ?>"><span id="elh_recruitment_interviews_level" class="recruitment_interviews_level"><?php echo $recruitment_interviews->level->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_interviews->created->Visible) { // created ?>
		<th class="<?php echo $recruitment_interviews->created->headerCellClass() ?>"><span id="elh_recruitment_interviews_created" class="recruitment_interviews_created"><?php echo $recruitment_interviews->created->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_interviews->updated->Visible) { // updated ?>
		<th class="<?php echo $recruitment_interviews->updated->headerCellClass() ?>"><span id="elh_recruitment_interviews_updated" class="recruitment_interviews_updated"><?php echo $recruitment_interviews->updated->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_interviews->scheduled->Visible) { // scheduled ?>
		<th class="<?php echo $recruitment_interviews->scheduled->headerCellClass() ?>"><span id="elh_recruitment_interviews_scheduled" class="recruitment_interviews_scheduled"><?php echo $recruitment_interviews->scheduled->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_interviews->mapId->Visible) { // mapId ?>
		<th class="<?php echo $recruitment_interviews->mapId->headerCellClass() ?>"><span id="elh_recruitment_interviews_mapId" class="recruitment_interviews_mapId"><?php echo $recruitment_interviews->mapId->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_interviews->status->Visible) { // status ?>
		<th class="<?php echo $recruitment_interviews->status->headerCellClass() ?>"><span id="elh_recruitment_interviews_status" class="recruitment_interviews_status"><?php echo $recruitment_interviews->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$recruitment_interviews_delete->RecCnt = 0;
$i = 0;
while (!$recruitment_interviews_delete->Recordset->EOF) {
	$recruitment_interviews_delete->RecCnt++;
	$recruitment_interviews_delete->RowCnt++;

	// Set row properties
	$recruitment_interviews->resetAttributes();
	$recruitment_interviews->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$recruitment_interviews_delete->loadRowValues($recruitment_interviews_delete->Recordset);

	// Render row
	$recruitment_interviews_delete->renderRow();
?>
	<tr<?php echo $recruitment_interviews->rowAttributes() ?>>
<?php if ($recruitment_interviews->id->Visible) { // id ?>
		<td<?php echo $recruitment_interviews->id->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_delete->RowCnt ?>_recruitment_interviews_id" class="recruitment_interviews_id">
<span<?php echo $recruitment_interviews->id->viewAttributes() ?>>
<?php echo $recruitment_interviews->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_interviews->job->Visible) { // job ?>
		<td<?php echo $recruitment_interviews->job->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_delete->RowCnt ?>_recruitment_interviews_job" class="recruitment_interviews_job">
<span<?php echo $recruitment_interviews->job->viewAttributes() ?>>
<?php echo $recruitment_interviews->job->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_interviews->candidate->Visible) { // candidate ?>
		<td<?php echo $recruitment_interviews->candidate->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_delete->RowCnt ?>_recruitment_interviews_candidate" class="recruitment_interviews_candidate">
<span<?php echo $recruitment_interviews->candidate->viewAttributes() ?>>
<?php echo $recruitment_interviews->candidate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_interviews->level->Visible) { // level ?>
		<td<?php echo $recruitment_interviews->level->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_delete->RowCnt ?>_recruitment_interviews_level" class="recruitment_interviews_level">
<span<?php echo $recruitment_interviews->level->viewAttributes() ?>>
<?php echo $recruitment_interviews->level->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_interviews->created->Visible) { // created ?>
		<td<?php echo $recruitment_interviews->created->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_delete->RowCnt ?>_recruitment_interviews_created" class="recruitment_interviews_created">
<span<?php echo $recruitment_interviews->created->viewAttributes() ?>>
<?php echo $recruitment_interviews->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_interviews->updated->Visible) { // updated ?>
		<td<?php echo $recruitment_interviews->updated->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_delete->RowCnt ?>_recruitment_interviews_updated" class="recruitment_interviews_updated">
<span<?php echo $recruitment_interviews->updated->viewAttributes() ?>>
<?php echo $recruitment_interviews->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_interviews->scheduled->Visible) { // scheduled ?>
		<td<?php echo $recruitment_interviews->scheduled->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_delete->RowCnt ?>_recruitment_interviews_scheduled" class="recruitment_interviews_scheduled">
<span<?php echo $recruitment_interviews->scheduled->viewAttributes() ?>>
<?php echo $recruitment_interviews->scheduled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_interviews->mapId->Visible) { // mapId ?>
		<td<?php echo $recruitment_interviews->mapId->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_delete->RowCnt ?>_recruitment_interviews_mapId" class="recruitment_interviews_mapId">
<span<?php echo $recruitment_interviews->mapId->viewAttributes() ?>>
<?php echo $recruitment_interviews->mapId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_interviews->status->Visible) { // status ?>
		<td<?php echo $recruitment_interviews->status->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_delete->RowCnt ?>_recruitment_interviews_status" class="recruitment_interviews_status">
<span<?php echo $recruitment_interviews->status->viewAttributes() ?>>
<?php echo $recruitment_interviews->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$recruitment_interviews_delete->Recordset->moveNext();
}
$recruitment_interviews_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recruitment_interviews_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$recruitment_interviews_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$recruitment_interviews_delete->terminate();
?>