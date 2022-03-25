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
$lab_testname_view = new lab_testname_view();

// Run the page
$lab_testname_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_testname_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_testname->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flab_testnameview = currentForm = new ew.Form("flab_testnameview", "view");

// Form_CustomValidate event
flab_testnameview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_testnameview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_testnameview.lists["x_SampleType"] = <?php echo $lab_testname_view->SampleType->Lookup->toClientList() ?>;
flab_testnameview.lists["x_SampleType"].options = <?php echo JsonEncode($lab_testname_view->SampleType->lookupOptions()) ?>;
flab_testnameview.lists["x_Department"] = <?php echo $lab_testname_view->Department->Lookup->toClientList() ?>;
flab_testnameview.lists["x_Department"].options = <?php echo JsonEncode($lab_testname_view->Department->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_testname->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_testname_view->ExportOptions->render("body") ?>
<?php $lab_testname_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_testname_view->showPageHeader(); ?>
<?php
$lab_testname_view->showMessage();
?>
<form name="flab_testnameview" id="flab_testnameview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_testname_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_testname_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_testname">
<input type="hidden" name="modal" value="<?php echo (int)$lab_testname_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_testname->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_testname_view->TableLeftColumnClass ?>"><span id="elh_lab_testname_id"><?php echo $lab_testname->id->caption() ?></span></td>
		<td data-name="id"<?php echo $lab_testname->id->cellAttributes() ?>>
<span id="el_lab_testname_id">
<span<?php echo $lab_testname->id->viewAttributes() ?>>
<?php echo $lab_testname->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_testname->TestCode->Visible) { // TestCode ?>
	<tr id="r_TestCode">
		<td class="<?php echo $lab_testname_view->TableLeftColumnClass ?>"><span id="elh_lab_testname_TestCode"><?php echo $lab_testname->TestCode->caption() ?></span></td>
		<td data-name="TestCode"<?php echo $lab_testname->TestCode->cellAttributes() ?>>
<span id="el_lab_testname_TestCode">
<span<?php echo $lab_testname->TestCode->viewAttributes() ?>>
<?php echo $lab_testname->TestCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_testname->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $lab_testname_view->TableLeftColumnClass ?>"><span id="elh_lab_testname_Name"><?php echo $lab_testname->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $lab_testname->Name->cellAttributes() ?>>
<span id="el_lab_testname_Name">
<span<?php echo $lab_testname->Name->viewAttributes() ?>>
<?php echo $lab_testname->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_testname->SampleType->Visible) { // SampleType ?>
	<tr id="r_SampleType">
		<td class="<?php echo $lab_testname_view->TableLeftColumnClass ?>"><span id="elh_lab_testname_SampleType"><?php echo $lab_testname->SampleType->caption() ?></span></td>
		<td data-name="SampleType"<?php echo $lab_testname->SampleType->cellAttributes() ?>>
<span id="el_lab_testname_SampleType">
<span<?php echo $lab_testname->SampleType->viewAttributes() ?>>
<?php echo $lab_testname->SampleType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_testname->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $lab_testname_view->TableLeftColumnClass ?>"><span id="elh_lab_testname_Department"><?php echo $lab_testname->Department->caption() ?></span></td>
		<td data-name="Department"<?php echo $lab_testname->Department->cellAttributes() ?>>
<span id="el_lab_testname_Department">
<span<?php echo $lab_testname->Department->viewAttributes() ?>>
<?php echo $lab_testname->Department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_testname->schedule->Visible) { // schedule ?>
	<tr id="r_schedule">
		<td class="<?php echo $lab_testname_view->TableLeftColumnClass ?>"><span id="elh_lab_testname_schedule"><?php echo $lab_testname->schedule->caption() ?></span></td>
		<td data-name="schedule"<?php echo $lab_testname->schedule->cellAttributes() ?>>
<span id="el_lab_testname_schedule">
<span<?php echo $lab_testname->schedule->viewAttributes() ?>>
<?php echo $lab_testname->schedule->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_testname->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $lab_testname_view->TableLeftColumnClass ?>"><span id="elh_lab_testname_Created"><?php echo $lab_testname->Created->caption() ?></span></td>
		<td data-name="Created"<?php echo $lab_testname->Created->cellAttributes() ?>>
<span id="el_lab_testname_Created">
<span<?php echo $lab_testname->Created->viewAttributes() ?>>
<?php echo $lab_testname->Created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_testname->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $lab_testname_view->TableLeftColumnClass ?>"><span id="elh_lab_testname_CreatedBy"><?php echo $lab_testname->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $lab_testname->CreatedBy->cellAttributes() ?>>
<span id="el_lab_testname_CreatedBy">
<span<?php echo $lab_testname->CreatedBy->viewAttributes() ?>>
<?php echo $lab_testname->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_testname->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $lab_testname_view->TableLeftColumnClass ?>"><span id="elh_lab_testname_Modified"><?php echo $lab_testname->Modified->caption() ?></span></td>
		<td data-name="Modified"<?php echo $lab_testname->Modified->cellAttributes() ?>>
<span id="el_lab_testname_Modified">
<span<?php echo $lab_testname->Modified->viewAttributes() ?>>
<?php echo $lab_testname->Modified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_testname->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $lab_testname_view->TableLeftColumnClass ?>"><span id="elh_lab_testname_ModifiedBy"><?php echo $lab_testname->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $lab_testname->ModifiedBy->cellAttributes() ?>>
<span id="el_lab_testname_ModifiedBy">
<span<?php echo $lab_testname->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_testname->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("lab_agerange", explode(",", $lab_testname->getCurrentDetailTable())) && $lab_agerange->DetailView) {
?>
<?php if ($lab_testname->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("lab_agerange", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "lab_agerangegrid.php" ?>
<?php } ?>
</form>
<?php
$lab_testname_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_testname->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_testname_view->terminate();
?>