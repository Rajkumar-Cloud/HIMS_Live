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
$recruitment_applications_view = new recruitment_applications_view();

// Run the page
$recruitment_applications_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_applications_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$recruitment_applications->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var frecruitment_applicationsview = currentForm = new ew.Form("frecruitment_applicationsview", "view");

// Form_CustomValidate event
frecruitment_applicationsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_applicationsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$recruitment_applications->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $recruitment_applications_view->ExportOptions->render("body") ?>
<?php $recruitment_applications_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $recruitment_applications_view->showPageHeader(); ?>
<?php
$recruitment_applications_view->showMessage();
?>
<form name="frecruitment_applicationsview" id="frecruitment_applicationsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_applications_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_applications_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_applications">
<input type="hidden" name="modal" value="<?php echo (int)$recruitment_applications_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($recruitment_applications->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $recruitment_applications_view->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_id"><?php echo $recruitment_applications->id->caption() ?></span></td>
		<td data-name="id"<?php echo $recruitment_applications->id->cellAttributes() ?>>
<span id="el_recruitment_applications_id">
<span<?php echo $recruitment_applications->id->viewAttributes() ?>>
<?php echo $recruitment_applications->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_applications->job->Visible) { // job ?>
	<tr id="r_job">
		<td class="<?php echo $recruitment_applications_view->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_job"><?php echo $recruitment_applications->job->caption() ?></span></td>
		<td data-name="job"<?php echo $recruitment_applications->job->cellAttributes() ?>>
<span id="el_recruitment_applications_job">
<span<?php echo $recruitment_applications->job->viewAttributes() ?>>
<?php echo $recruitment_applications->job->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_applications->candidate->Visible) { // candidate ?>
	<tr id="r_candidate">
		<td class="<?php echo $recruitment_applications_view->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_candidate"><?php echo $recruitment_applications->candidate->caption() ?></span></td>
		<td data-name="candidate"<?php echo $recruitment_applications->candidate->cellAttributes() ?>>
<span id="el_recruitment_applications_candidate">
<span<?php echo $recruitment_applications->candidate->viewAttributes() ?>>
<?php echo $recruitment_applications->candidate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_applications->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $recruitment_applications_view->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_created"><?php echo $recruitment_applications->created->caption() ?></span></td>
		<td data-name="created"<?php echo $recruitment_applications->created->cellAttributes() ?>>
<span id="el_recruitment_applications_created">
<span<?php echo $recruitment_applications->created->viewAttributes() ?>>
<?php echo $recruitment_applications->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_applications->referredByEmail->Visible) { // referredByEmail ?>
	<tr id="r_referredByEmail">
		<td class="<?php echo $recruitment_applications_view->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_referredByEmail"><?php echo $recruitment_applications->referredByEmail->caption() ?></span></td>
		<td data-name="referredByEmail"<?php echo $recruitment_applications->referredByEmail->cellAttributes() ?>>
<span id="el_recruitment_applications_referredByEmail">
<span<?php echo $recruitment_applications->referredByEmail->viewAttributes() ?>>
<?php echo $recruitment_applications->referredByEmail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_applications->notes->Visible) { // notes ?>
	<tr id="r_notes">
		<td class="<?php echo $recruitment_applications_view->TableLeftColumnClass ?>"><span id="elh_recruitment_applications_notes"><?php echo $recruitment_applications->notes->caption() ?></span></td>
		<td data-name="notes"<?php echo $recruitment_applications->notes->cellAttributes() ?>>
<span id="el_recruitment_applications_notes">
<span<?php echo $recruitment_applications->notes->viewAttributes() ?>>
<?php echo $recruitment_applications->notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$recruitment_applications_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$recruitment_applications->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$recruitment_applications_view->terminate();
?>