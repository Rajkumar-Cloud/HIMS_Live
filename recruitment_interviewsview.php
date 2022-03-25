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
$recruitment_interviews_view = new recruitment_interviews_view();

// Run the page
$recruitment_interviews_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_interviews_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$recruitment_interviews->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var frecruitment_interviewsview = currentForm = new ew.Form("frecruitment_interviewsview", "view");

// Form_CustomValidate event
frecruitment_interviewsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_interviewsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$recruitment_interviews->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $recruitment_interviews_view->ExportOptions->render("body") ?>
<?php $recruitment_interviews_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $recruitment_interviews_view->showPageHeader(); ?>
<?php
$recruitment_interviews_view->showMessage();
?>
<form name="frecruitment_interviewsview" id="frecruitment_interviewsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_interviews_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_interviews_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_interviews">
<input type="hidden" name="modal" value="<?php echo (int)$recruitment_interviews_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($recruitment_interviews->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_id"><?php echo $recruitment_interviews->id->caption() ?></span></td>
		<td data-name="id"<?php echo $recruitment_interviews->id->cellAttributes() ?>>
<span id="el_recruitment_interviews_id">
<span<?php echo $recruitment_interviews->id->viewAttributes() ?>>
<?php echo $recruitment_interviews->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_interviews->job->Visible) { // job ?>
	<tr id="r_job">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_job"><?php echo $recruitment_interviews->job->caption() ?></span></td>
		<td data-name="job"<?php echo $recruitment_interviews->job->cellAttributes() ?>>
<span id="el_recruitment_interviews_job">
<span<?php echo $recruitment_interviews->job->viewAttributes() ?>>
<?php echo $recruitment_interviews->job->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_interviews->candidate->Visible) { // candidate ?>
	<tr id="r_candidate">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_candidate"><?php echo $recruitment_interviews->candidate->caption() ?></span></td>
		<td data-name="candidate"<?php echo $recruitment_interviews->candidate->cellAttributes() ?>>
<span id="el_recruitment_interviews_candidate">
<span<?php echo $recruitment_interviews->candidate->viewAttributes() ?>>
<?php echo $recruitment_interviews->candidate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_interviews->level->Visible) { // level ?>
	<tr id="r_level">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_level"><?php echo $recruitment_interviews->level->caption() ?></span></td>
		<td data-name="level"<?php echo $recruitment_interviews->level->cellAttributes() ?>>
<span id="el_recruitment_interviews_level">
<span<?php echo $recruitment_interviews->level->viewAttributes() ?>>
<?php echo $recruitment_interviews->level->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_interviews->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_created"><?php echo $recruitment_interviews->created->caption() ?></span></td>
		<td data-name="created"<?php echo $recruitment_interviews->created->cellAttributes() ?>>
<span id="el_recruitment_interviews_created">
<span<?php echo $recruitment_interviews->created->viewAttributes() ?>>
<?php echo $recruitment_interviews->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_interviews->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_updated"><?php echo $recruitment_interviews->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $recruitment_interviews->updated->cellAttributes() ?>>
<span id="el_recruitment_interviews_updated">
<span<?php echo $recruitment_interviews->updated->viewAttributes() ?>>
<?php echo $recruitment_interviews->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_interviews->scheduled->Visible) { // scheduled ?>
	<tr id="r_scheduled">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_scheduled"><?php echo $recruitment_interviews->scheduled->caption() ?></span></td>
		<td data-name="scheduled"<?php echo $recruitment_interviews->scheduled->cellAttributes() ?>>
<span id="el_recruitment_interviews_scheduled">
<span<?php echo $recruitment_interviews->scheduled->viewAttributes() ?>>
<?php echo $recruitment_interviews->scheduled->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_interviews->location->Visible) { // location ?>
	<tr id="r_location">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_location"><?php echo $recruitment_interviews->location->caption() ?></span></td>
		<td data-name="location"<?php echo $recruitment_interviews->location->cellAttributes() ?>>
<span id="el_recruitment_interviews_location">
<span<?php echo $recruitment_interviews->location->viewAttributes() ?>>
<?php echo $recruitment_interviews->location->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_interviews->mapId->Visible) { // mapId ?>
	<tr id="r_mapId">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_mapId"><?php echo $recruitment_interviews->mapId->caption() ?></span></td>
		<td data-name="mapId"<?php echo $recruitment_interviews->mapId->cellAttributes() ?>>
<span id="el_recruitment_interviews_mapId">
<span<?php echo $recruitment_interviews->mapId->viewAttributes() ?>>
<?php echo $recruitment_interviews->mapId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_interviews->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_status"><?php echo $recruitment_interviews->status->caption() ?></span></td>
		<td data-name="status"<?php echo $recruitment_interviews->status->cellAttributes() ?>>
<span id="el_recruitment_interviews_status">
<span<?php echo $recruitment_interviews->status->viewAttributes() ?>>
<?php echo $recruitment_interviews->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_interviews->notes->Visible) { // notes ?>
	<tr id="r_notes">
		<td class="<?php echo $recruitment_interviews_view->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_notes"><?php echo $recruitment_interviews->notes->caption() ?></span></td>
		<td data-name="notes"<?php echo $recruitment_interviews->notes->cellAttributes() ?>>
<span id="el_recruitment_interviews_notes">
<span<?php echo $recruitment_interviews->notes->viewAttributes() ?>>
<?php echo $recruitment_interviews->notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$recruitment_interviews_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$recruitment_interviews->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$recruitment_interviews_view->terminate();
?>