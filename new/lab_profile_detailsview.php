<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<?php if (!$lab_profile_details_view->isExport()) { ?>
<script>
var flab_profile_detailsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flab_profile_detailsview = currentForm = new ew.Form("flab_profile_detailsview", "view");
	loadjs.done("flab_profile_detailsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lab_profile_details_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="modal" value="<?php echo (int)$lab_profile_details_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_profile_details_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_id"><?php echo $lab_profile_details_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $lab_profile_details_view->id->cellAttributes() ?>>
<span id="el_lab_profile_details_id">
<span<?php echo $lab_profile_details_view->id->viewAttributes() ?>><?php echo $lab_profile_details_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details_view->ProfileCode->Visible) { // ProfileCode ?>
	<tr id="r_ProfileCode">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileCode"><?php echo $lab_profile_details_view->ProfileCode->caption() ?></span></td>
		<td data-name="ProfileCode" <?php echo $lab_profile_details_view->ProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details_view->ProfileCode->viewAttributes() ?>><?php echo $lab_profile_details_view->ProfileCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details_view->SubProfileCode->Visible) { // SubProfileCode ?>
	<tr id="r_SubProfileCode">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_SubProfileCode"><?php echo $lab_profile_details_view->SubProfileCode->caption() ?></span></td>
		<td data-name="SubProfileCode" <?php echo $lab_profile_details_view->SubProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_details_SubProfileCode">
<span<?php echo $lab_profile_details_view->SubProfileCode->viewAttributes() ?>><?php echo $lab_profile_details_view->SubProfileCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details_view->ProfileTestCode->Visible) { // ProfileTestCode ?>
	<tr id="r_ProfileTestCode">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileTestCode"><?php echo $lab_profile_details_view->ProfileTestCode->caption() ?></span></td>
		<td data-name="ProfileTestCode" <?php echo $lab_profile_details_view->ProfileTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileTestCode">
<span<?php echo $lab_profile_details_view->ProfileTestCode->viewAttributes() ?>><?php echo $lab_profile_details_view->ProfileTestCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details_view->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
	<tr id="r_ProfileSubTestCode">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileSubTestCode"><?php echo $lab_profile_details_view->ProfileSubTestCode->caption() ?></span></td>
		<td data-name="ProfileSubTestCode" <?php echo $lab_profile_details_view->ProfileSubTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileSubTestCode">
<span<?php echo $lab_profile_details_view->ProfileSubTestCode->viewAttributes() ?>><?php echo $lab_profile_details_view->ProfileSubTestCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details_view->TestOrder->Visible) { // TestOrder ?>
	<tr id="r_TestOrder">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_TestOrder"><?php echo $lab_profile_details_view->TestOrder->caption() ?></span></td>
		<td data-name="TestOrder" <?php echo $lab_profile_details_view->TestOrder->cellAttributes() ?>>
<span id="el_lab_profile_details_TestOrder">
<span<?php echo $lab_profile_details_view->TestOrder->viewAttributes() ?>><?php echo $lab_profile_details_view->TestOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_details_view->TestAmount->Visible) { // TestAmount ?>
	<tr id="r_TestAmount">
		<td class="<?php echo $lab_profile_details_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_TestAmount"><?php echo $lab_profile_details_view->TestAmount->caption() ?></span></td>
		<td data-name="TestAmount" <?php echo $lab_profile_details_view->TestAmount->cellAttributes() ?>>
<span id="el_lab_profile_details_TestAmount">
<span<?php echo $lab_profile_details_view->TestAmount->viewAttributes() ?>><?php echo $lab_profile_details_view->TestAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_profile_details_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_profile_details_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$lab_profile_details_view->terminate();
?>