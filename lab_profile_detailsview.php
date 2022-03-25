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
$lab_profile_details_view = new lab_profile_details_view();

// Run the page
$lab_profile_details_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_details_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_profile_details->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flab_profile_detailsview = currentForm = new ew.Form("flab_profile_detailsview", "view");

// Form_CustomValidate event
flab_profile_detailsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_profile_detailsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_profile_detailsview.lists["x_SubProfileCode"] = <?php echo $lab_profile_details_view->SubProfileCode->Lookup->toClientList() ?>;
flab_profile_detailsview.lists["x_SubProfileCode"].options = <?php echo JsonEncode($lab_profile_details_view->SubProfileCode->lookupOptions()) ?>;
flab_profile_detailsview.lists["x_ProfileTestCode"] = <?php echo $lab_profile_details_view->ProfileTestCode->Lookup->toClientList() ?>;
flab_profile_detailsview.lists["x_ProfileTestCode"].options = <?php echo JsonEncode($lab_profile_details_view->ProfileTestCode->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_profile_details->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_profile_details_view->ExportOptions->render("body") ?>
<?php $lab_profile_details_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_profile_details_view->showPageHeader(); ?>
<?php
$lab_profile_details_view->showMessage();
?>
<form name="flab_profile_detailsview" id="flab_profile_detailsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_profile_details_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_profile_details_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="modal" value="<?php echo (int)$lab_profile_details_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_profile_details->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_id"><?php echo $lab_profile_details->id->caption() ?></span></td>
		<td data-name="id"<?php echo $lab_profile_details->id->cellAttributes() ?>>
<span id="el_lab_profile_details_id">
<span<?php echo $lab_profile_details->id->viewAttributes() ?>>
<?php echo $lab_profile_details->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details->ProfileCode->Visible) { // ProfileCode ?>
	<tr id="r_ProfileCode">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileCode"><?php echo $lab_profile_details->ProfileCode->caption() ?></span></td>
		<td data-name="ProfileCode"<?php echo $lab_profile_details->ProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details->ProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details->SubProfileCode->Visible) { // SubProfileCode ?>
	<tr id="r_SubProfileCode">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_SubProfileCode"><?php echo $lab_profile_details->SubProfileCode->caption() ?></span></td>
		<td data-name="SubProfileCode"<?php echo $lab_profile_details->SubProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_details_SubProfileCode">
<span<?php echo $lab_profile_details->SubProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_details->SubProfileCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details->ProfileTestCode->Visible) { // ProfileTestCode ?>
	<tr id="r_ProfileTestCode">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileTestCode"><?php echo $lab_profile_details->ProfileTestCode->caption() ?></span></td>
		<td data-name="ProfileTestCode"<?php echo $lab_profile_details->ProfileTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileTestCode">
<span<?php echo $lab_profile_details->ProfileTestCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileTestCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
	<tr id="r_ProfileSubTestCode">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileSubTestCode"><?php echo $lab_profile_details->ProfileSubTestCode->caption() ?></span></td>
		<td data-name="ProfileSubTestCode"<?php echo $lab_profile_details->ProfileSubTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileSubTestCode">
<span<?php echo $lab_profile_details->ProfileSubTestCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileSubTestCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details->TestOrder->Visible) { // TestOrder ?>
	<tr id="r_TestOrder">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_TestOrder"><?php echo $lab_profile_details->TestOrder->caption() ?></span></td>
		<td data-name="TestOrder"<?php echo $lab_profile_details->TestOrder->cellAttributes() ?>>
<span id="el_lab_profile_details_TestOrder">
<span<?php echo $lab_profile_details->TestOrder->viewAttributes() ?>>
<?php echo $lab_profile_details->TestOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details->TestAmount->Visible) { // TestAmount ?>
	<tr id="r_TestAmount">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_TestAmount"><?php echo $lab_profile_details->TestAmount->caption() ?></span></td>
		<td data-name="TestAmount"<?php echo $lab_profile_details->TestAmount->cellAttributes() ?>>
<span id="el_lab_profile_details_TestAmount">
<span<?php echo $lab_profile_details->TestAmount->viewAttributes() ?>>
<?php echo $lab_profile_details->TestAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_profile_details_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_profile_details->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_profile_details_view->terminate();
?>