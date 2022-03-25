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
$recruitment_calls_view = new recruitment_calls_view();

// Run the page
$recruitment_calls_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_calls_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$recruitment_calls->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var frecruitment_callsview = currentForm = new ew.Form("frecruitment_callsview", "view");

// Form_CustomValidate event
frecruitment_callsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_callsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$recruitment_calls->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $recruitment_calls_view->ExportOptions->render("body") ?>
<?php $recruitment_calls_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $recruitment_calls_view->showPageHeader(); ?>
<?php
$recruitment_calls_view->showMessage();
?>
<form name="frecruitment_callsview" id="frecruitment_callsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_calls_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_calls_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_calls">
<input type="hidden" name="modal" value="<?php echo (int)$recruitment_calls_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($recruitment_calls->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $recruitment_calls_view->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_id"><?php echo $recruitment_calls->id->caption() ?></span></td>
		<td data-name="id"<?php echo $recruitment_calls->id->cellAttributes() ?>>
<span id="el_recruitment_calls_id">
<span<?php echo $recruitment_calls->id->viewAttributes() ?>>
<?php echo $recruitment_calls->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_calls->job->Visible) { // job ?>
	<tr id="r_job">
		<td class="<?php echo $recruitment_calls_view->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_job"><?php echo $recruitment_calls->job->caption() ?></span></td>
		<td data-name="job"<?php echo $recruitment_calls->job->cellAttributes() ?>>
<span id="el_recruitment_calls_job">
<span<?php echo $recruitment_calls->job->viewAttributes() ?>>
<?php echo $recruitment_calls->job->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_calls->candidate->Visible) { // candidate ?>
	<tr id="r_candidate">
		<td class="<?php echo $recruitment_calls_view->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_candidate"><?php echo $recruitment_calls->candidate->caption() ?></span></td>
		<td data-name="candidate"<?php echo $recruitment_calls->candidate->cellAttributes() ?>>
<span id="el_recruitment_calls_candidate">
<span<?php echo $recruitment_calls->candidate->viewAttributes() ?>>
<?php echo $recruitment_calls->candidate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_calls->phone->Visible) { // phone ?>
	<tr id="r_phone">
		<td class="<?php echo $recruitment_calls_view->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_phone"><?php echo $recruitment_calls->phone->caption() ?></span></td>
		<td data-name="phone"<?php echo $recruitment_calls->phone->cellAttributes() ?>>
<span id="el_recruitment_calls_phone">
<span<?php echo $recruitment_calls->phone->viewAttributes() ?>>
<?php echo $recruitment_calls->phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_calls->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $recruitment_calls_view->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_created"><?php echo $recruitment_calls->created->caption() ?></span></td>
		<td data-name="created"<?php echo $recruitment_calls->created->cellAttributes() ?>>
<span id="el_recruitment_calls_created">
<span<?php echo $recruitment_calls->created->viewAttributes() ?>>
<?php echo $recruitment_calls->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_calls->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $recruitment_calls_view->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_updated"><?php echo $recruitment_calls->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $recruitment_calls->updated->cellAttributes() ?>>
<span id="el_recruitment_calls_updated">
<span<?php echo $recruitment_calls->updated->viewAttributes() ?>>
<?php echo $recruitment_calls->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_calls->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $recruitment_calls_view->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_status"><?php echo $recruitment_calls->status->caption() ?></span></td>
		<td data-name="status"<?php echo $recruitment_calls->status->cellAttributes() ?>>
<span id="el_recruitment_calls_status">
<span<?php echo $recruitment_calls->status->viewAttributes() ?>>
<?php echo $recruitment_calls->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_calls->notes->Visible) { // notes ?>
	<tr id="r_notes">
		<td class="<?php echo $recruitment_calls_view->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_notes"><?php echo $recruitment_calls->notes->caption() ?></span></td>
		<td data-name="notes"<?php echo $recruitment_calls->notes->cellAttributes() ?>>
<span id="el_recruitment_calls_notes">
<span<?php echo $recruitment_calls->notes->viewAttributes() ?>>
<?php echo $recruitment_calls->notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$recruitment_calls_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$recruitment_calls->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$recruitment_calls_view->terminate();
?>