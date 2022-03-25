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
$lab_sub_test_master_view = new lab_sub_test_master_view();

// Run the page
$lab_sub_test_master_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sub_test_master_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_sub_test_master->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flab_sub_test_masterview = currentForm = new ew.Form("flab_sub_test_masterview", "view");

// Form_CustomValidate event
flab_sub_test_masterview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_sub_test_masterview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_sub_test_masterview.lists["x_SubTestName"] = <?php echo $lab_sub_test_master_view->SubTestName->Lookup->toClientList() ?>;
flab_sub_test_masterview.lists["x_SubTestName"].options = <?php echo JsonEncode($lab_sub_test_master_view->SubTestName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_sub_test_master->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_sub_test_master_view->ExportOptions->render("body") ?>
<?php $lab_sub_test_master_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_sub_test_master_view->showPageHeader(); ?>
<?php
$lab_sub_test_master_view->showMessage();
?>
<form name="flab_sub_test_masterview" id="flab_sub_test_masterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_sub_test_master_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_sub_test_master_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sub_test_master">
<input type="hidden" name="modal" value="<?php echo (int)$lab_sub_test_master_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_sub_test_master->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_sub_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_sub_test_master_id"><?php echo $lab_sub_test_master->id->caption() ?></span></td>
		<td data-name="id"<?php echo $lab_sub_test_master->id->cellAttributes() ?>>
<span id="el_lab_sub_test_master_id">
<span<?php echo $lab_sub_test_master->id->viewAttributes() ?>>
<?php echo $lab_sub_test_master->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
	<tr id="r_TestMasterID">
		<td class="<?php echo $lab_sub_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_sub_test_master_TestMasterID"><?php echo $lab_sub_test_master->TestMasterID->caption() ?></span></td>
		<td data-name="TestMasterID"<?php echo $lab_sub_test_master->TestMasterID->cellAttributes() ?>>
<span id="el_lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<?php echo $lab_sub_test_master->TestMasterID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
	<tr id="r_SubTestName">
		<td class="<?php echo $lab_sub_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_sub_test_master_SubTestName"><?php echo $lab_sub_test_master->SubTestName->caption() ?></span></td>
		<td data-name="SubTestName"<?php echo $lab_sub_test_master->SubTestName->cellAttributes() ?>>
<span id="el_lab_sub_test_master_SubTestName">
<span<?php echo $lab_sub_test_master->SubTestName->viewAttributes() ?>>
<?php echo $lab_sub_test_master->SubTestName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
	<tr id="r_TestOrder">
		<td class="<?php echo $lab_sub_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_sub_test_master_TestOrder"><?php echo $lab_sub_test_master->TestOrder->caption() ?></span></td>
		<td data-name="TestOrder"<?php echo $lab_sub_test_master->TestOrder->cellAttributes() ?>>
<span id="el_lab_sub_test_master_TestOrder">
<span<?php echo $lab_sub_test_master->TestOrder->viewAttributes() ?>>
<?php echo $lab_sub_test_master->TestOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
	<tr id="r_NormalRange">
		<td class="<?php echo $lab_sub_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_sub_test_master_NormalRange"><?php echo $lab_sub_test_master->NormalRange->caption() ?></span></td>
		<td data-name="NormalRange"<?php echo $lab_sub_test_master->NormalRange->cellAttributes() ?>>
<span id="el_lab_sub_test_master_NormalRange">
<span<?php echo $lab_sub_test_master->NormalRange->viewAttributes() ?>>
<?php echo $lab_sub_test_master->NormalRange->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $lab_sub_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_sub_test_master_Created"><?php echo $lab_sub_test_master->Created->caption() ?></span></td>
		<td data-name="Created"<?php echo $lab_sub_test_master->Created->cellAttributes() ?>>
<span id="el_lab_sub_test_master_Created">
<span<?php echo $lab_sub_test_master->Created->viewAttributes() ?>>
<?php echo $lab_sub_test_master->Created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $lab_sub_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_sub_test_master_CreatedBy"><?php echo $lab_sub_test_master->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $lab_sub_test_master->CreatedBy->cellAttributes() ?>>
<span id="el_lab_sub_test_master_CreatedBy">
<span<?php echo $lab_sub_test_master->CreatedBy->viewAttributes() ?>>
<?php echo $lab_sub_test_master->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $lab_sub_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_sub_test_master_Modified"><?php echo $lab_sub_test_master->Modified->caption() ?></span></td>
		<td data-name="Modified"<?php echo $lab_sub_test_master->Modified->cellAttributes() ?>>
<span id="el_lab_sub_test_master_Modified">
<span<?php echo $lab_sub_test_master->Modified->viewAttributes() ?>>
<?php echo $lab_sub_test_master->Modified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $lab_sub_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_sub_test_master_ModifiedBy"><?php echo $lab_sub_test_master->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $lab_sub_test_master->ModifiedBy->cellAttributes() ?>>
<span id="el_lab_sub_test_master_ModifiedBy">
<span<?php echo $lab_sub_test_master->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_sub_test_master->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_sub_test_master_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_sub_test_master->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_sub_test_master_view->terminate();
?>