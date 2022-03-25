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
$recruitment_applications_delete = new recruitment_applications_delete();

// Run the page
$recruitment_applications_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_applications_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var frecruitment_applicationsdelete = currentForm = new ew.Form("frecruitment_applicationsdelete", "delete");

// Form_CustomValidate event
frecruitment_applicationsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_applicationsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $recruitment_applications_delete->showPageHeader(); ?>
<?php
$recruitment_applications_delete->showMessage();
?>
<form name="frecruitment_applicationsdelete" id="frecruitment_applicationsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_applications_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_applications_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_applications">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($recruitment_applications_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($recruitment_applications->id->Visible) { // id ?>
		<th class="<?php echo $recruitment_applications->id->headerCellClass() ?>"><span id="elh_recruitment_applications_id" class="recruitment_applications_id"><?php echo $recruitment_applications->id->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_applications->job->Visible) { // job ?>
		<th class="<?php echo $recruitment_applications->job->headerCellClass() ?>"><span id="elh_recruitment_applications_job" class="recruitment_applications_job"><?php echo $recruitment_applications->job->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_applications->candidate->Visible) { // candidate ?>
		<th class="<?php echo $recruitment_applications->candidate->headerCellClass() ?>"><span id="elh_recruitment_applications_candidate" class="recruitment_applications_candidate"><?php echo $recruitment_applications->candidate->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_applications->created->Visible) { // created ?>
		<th class="<?php echo $recruitment_applications->created->headerCellClass() ?>"><span id="elh_recruitment_applications_created" class="recruitment_applications_created"><?php echo $recruitment_applications->created->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_applications->referredByEmail->Visible) { // referredByEmail ?>
		<th class="<?php echo $recruitment_applications->referredByEmail->headerCellClass() ?>"><span id="elh_recruitment_applications_referredByEmail" class="recruitment_applications_referredByEmail"><?php echo $recruitment_applications->referredByEmail->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$recruitment_applications_delete->RecCnt = 0;
$i = 0;
while (!$recruitment_applications_delete->Recordset->EOF) {
	$recruitment_applications_delete->RecCnt++;
	$recruitment_applications_delete->RowCnt++;

	// Set row properties
	$recruitment_applications->resetAttributes();
	$recruitment_applications->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$recruitment_applications_delete->loadRowValues($recruitment_applications_delete->Recordset);

	// Render row
	$recruitment_applications_delete->renderRow();
?>
	<tr<?php echo $recruitment_applications->rowAttributes() ?>>
<?php if ($recruitment_applications->id->Visible) { // id ?>
		<td<?php echo $recruitment_applications->id->cellAttributes() ?>>
<span id="el<?php echo $recruitment_applications_delete->RowCnt ?>_recruitment_applications_id" class="recruitment_applications_id">
<span<?php echo $recruitment_applications->id->viewAttributes() ?>>
<?php echo $recruitment_applications->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_applications->job->Visible) { // job ?>
		<td<?php echo $recruitment_applications->job->cellAttributes() ?>>
<span id="el<?php echo $recruitment_applications_delete->RowCnt ?>_recruitment_applications_job" class="recruitment_applications_job">
<span<?php echo $recruitment_applications->job->viewAttributes() ?>>
<?php echo $recruitment_applications->job->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_applications->candidate->Visible) { // candidate ?>
		<td<?php echo $recruitment_applications->candidate->cellAttributes() ?>>
<span id="el<?php echo $recruitment_applications_delete->RowCnt ?>_recruitment_applications_candidate" class="recruitment_applications_candidate">
<span<?php echo $recruitment_applications->candidate->viewAttributes() ?>>
<?php echo $recruitment_applications->candidate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_applications->created->Visible) { // created ?>
		<td<?php echo $recruitment_applications->created->cellAttributes() ?>>
<span id="el<?php echo $recruitment_applications_delete->RowCnt ?>_recruitment_applications_created" class="recruitment_applications_created">
<span<?php echo $recruitment_applications->created->viewAttributes() ?>>
<?php echo $recruitment_applications->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_applications->referredByEmail->Visible) { // referredByEmail ?>
		<td<?php echo $recruitment_applications->referredByEmail->cellAttributes() ?>>
<span id="el<?php echo $recruitment_applications_delete->RowCnt ?>_recruitment_applications_referredByEmail" class="recruitment_applications_referredByEmail">
<span<?php echo $recruitment_applications->referredByEmail->viewAttributes() ?>>
<?php echo $recruitment_applications->referredByEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$recruitment_applications_delete->Recordset->moveNext();
}
$recruitment_applications_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recruitment_applications_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$recruitment_applications_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$recruitment_applications_delete->terminate();
?>