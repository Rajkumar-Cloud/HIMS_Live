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
$lab_agerange_view = new lab_agerange_view();

// Run the page
$lab_agerange_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_agerange_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_agerange->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flab_agerangeview = currentForm = new ew.Form("flab_agerangeview", "view");

// Form_CustomValidate event
flab_agerangeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_agerangeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_agerangeview.lists["x_Gender"] = <?php echo $lab_agerange_view->Gender->Lookup->toClientList() ?>;
flab_agerangeview.lists["x_Gender"].options = <?php echo JsonEncode($lab_agerange_view->Gender->lookupOptions()) ?>;
flab_agerangeview.lists["x_MinAgeType"] = <?php echo $lab_agerange_view->MinAgeType->Lookup->toClientList() ?>;
flab_agerangeview.lists["x_MinAgeType"].options = <?php echo JsonEncode($lab_agerange_view->MinAgeType->options(FALSE, TRUE)) ?>;
flab_agerangeview.lists["x_MaxAgeType"] = <?php echo $lab_agerange_view->MaxAgeType->Lookup->toClientList() ?>;
flab_agerangeview.lists["x_MaxAgeType"].options = <?php echo JsonEncode($lab_agerange_view->MaxAgeType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_agerange->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_agerange_view->ExportOptions->render("body") ?>
<?php $lab_agerange_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_agerange_view->showPageHeader(); ?>
<?php
$lab_agerange_view->showMessage();
?>
<form name="flab_agerangeview" id="flab_agerangeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_agerange_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_agerange_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_agerange">
<input type="hidden" name="modal" value="<?php echo (int)$lab_agerange_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_agerange->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_id"><?php echo $lab_agerange->id->caption() ?></span></td>
		<td data-name="id"<?php echo $lab_agerange->id->cellAttributes() ?>>
<span id="el_lab_agerange_id">
<span<?php echo $lab_agerange->id->viewAttributes() ?>>
<?php echo $lab_agerange->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->testid->Visible) { // testid ?>
	<tr id="r_testid">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_testid"><?php echo $lab_agerange->testid->caption() ?></span></td>
		<td data-name="testid"<?php echo $lab_agerange->testid->cellAttributes() ?>>
<span id="el_lab_agerange_testid">
<span<?php echo $lab_agerange->testid->viewAttributes() ?>>
<?php echo $lab_agerange->testid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->TestName->Visible) { // TestName ?>
	<tr id="r_TestName">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_TestName"><?php echo $lab_agerange->TestName->caption() ?></span></td>
		<td data-name="TestName"<?php echo $lab_agerange->TestName->cellAttributes() ?>>
<span id="el_lab_agerange_TestName">
<span<?php echo $lab_agerange->TestName->viewAttributes() ?>>
<?php echo $lab_agerange->TestName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_Gender"><?php echo $lab_agerange->Gender->caption() ?></span></td>
		<td data-name="Gender"<?php echo $lab_agerange->Gender->cellAttributes() ?>>
<span id="el_lab_agerange_Gender">
<span<?php echo $lab_agerange->Gender->viewAttributes() ?>>
<?php echo $lab_agerange->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
	<tr id="r_MinAge">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_MinAge"><?php echo $lab_agerange->MinAge->caption() ?></span></td>
		<td data-name="MinAge"<?php echo $lab_agerange->MinAge->cellAttributes() ?>>
<span id="el_lab_agerange_MinAge">
<span<?php echo $lab_agerange->MinAge->viewAttributes() ?>>
<?php echo $lab_agerange->MinAge->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
	<tr id="r_MinAgeType">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_MinAgeType"><?php echo $lab_agerange->MinAgeType->caption() ?></span></td>
		<td data-name="MinAgeType"<?php echo $lab_agerange->MinAgeType->cellAttributes() ?>>
<span id="el_lab_agerange_MinAgeType">
<span<?php echo $lab_agerange->MinAgeType->viewAttributes() ?>>
<?php echo $lab_agerange->MinAgeType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
	<tr id="r_MaxAge">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_MaxAge"><?php echo $lab_agerange->MaxAge->caption() ?></span></td>
		<td data-name="MaxAge"<?php echo $lab_agerange->MaxAge->cellAttributes() ?>>
<span id="el_lab_agerange_MaxAge">
<span<?php echo $lab_agerange->MaxAge->viewAttributes() ?>>
<?php echo $lab_agerange->MaxAge->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
	<tr id="r_MaxAgeType">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_MaxAgeType"><?php echo $lab_agerange->MaxAgeType->caption() ?></span></td>
		<td data-name="MaxAgeType"<?php echo $lab_agerange->MaxAgeType->cellAttributes() ?>>
<span id="el_lab_agerange_MaxAgeType">
<span<?php echo $lab_agerange->MaxAgeType->viewAttributes() ?>>
<?php echo $lab_agerange->MaxAgeType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->Value->Visible) { // Value ?>
	<tr id="r_Value">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_Value"><?php echo $lab_agerange->Value->caption() ?></span></td>
		<td data-name="Value"<?php echo $lab_agerange->Value->cellAttributes() ?>>
<span id="el_lab_agerange_Value">
<span<?php echo $lab_agerange->Value->viewAttributes() ?>>
<?php echo $lab_agerange->Value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_Created"><?php echo $lab_agerange->Created->caption() ?></span></td>
		<td data-name="Created"<?php echo $lab_agerange->Created->cellAttributes() ?>>
<span id="el_lab_agerange_Created">
<span<?php echo $lab_agerange->Created->viewAttributes() ?>>
<?php echo $lab_agerange->Created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_CreatedBy"><?php echo $lab_agerange->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $lab_agerange->CreatedBy->cellAttributes() ?>>
<span id="el_lab_agerange_CreatedBy">
<span<?php echo $lab_agerange->CreatedBy->viewAttributes() ?>>
<?php echo $lab_agerange->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->Modied->Visible) { // Modied ?>
	<tr id="r_Modied">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_Modied"><?php echo $lab_agerange->Modied->caption() ?></span></td>
		<td data-name="Modied"<?php echo $lab_agerange->Modied->cellAttributes() ?>>
<span id="el_lab_agerange_Modied">
<span<?php echo $lab_agerange->Modied->viewAttributes() ?>>
<?php echo $lab_agerange->Modied->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_agerange->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $lab_agerange_view->TableLeftColumnClass ?>"><span id="elh_lab_agerange_ModifiedBy"><?php echo $lab_agerange->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $lab_agerange->ModifiedBy->cellAttributes() ?>>
<span id="el_lab_agerange_ModifiedBy">
<span<?php echo $lab_agerange->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_agerange->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_agerange_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_agerange->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_agerange_view->terminate();
?>