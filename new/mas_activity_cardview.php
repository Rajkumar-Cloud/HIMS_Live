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
$mas_activity_card_view = new mas_activity_card_view();

// Run the page
$mas_activity_card_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_activity_card_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_activity_card_view->isExport()) { ?>
<script>
var fmas_activity_cardview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_activity_cardview = currentForm = new ew.Form("fmas_activity_cardview", "view");
	loadjs.done("fmas_activity_cardview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_activity_card_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_activity_card_view->ExportOptions->render("body") ?>
<?php $mas_activity_card_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_activity_card_view->showPageHeader(); ?>
<?php
$mas_activity_card_view->showMessage();
?>
<form name="fmas_activity_cardview" id="fmas_activity_cardview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
<input type="hidden" name="modal" value="<?php echo (int)$mas_activity_card_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_activity_card_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_id"><?php echo $mas_activity_card_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_activity_card_view->id->cellAttributes() ?>>
<span id="el_mas_activity_card_id">
<span<?php echo $mas_activity_card_view->id->viewAttributes() ?>><?php echo $mas_activity_card_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_activity_card_view->Activity->Visible) { // Activity ?>
	<tr id="r_Activity">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Activity"><?php echo $mas_activity_card_view->Activity->caption() ?></span></td>
		<td data-name="Activity" <?php echo $mas_activity_card_view->Activity->cellAttributes() ?>>
<span id="el_mas_activity_card_Activity">
<span<?php echo $mas_activity_card_view->Activity->viewAttributes() ?>><?php echo $mas_activity_card_view->Activity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_activity_card_view->Type->Visible) { // Type ?>
	<tr id="r_Type">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Type"><?php echo $mas_activity_card_view->Type->caption() ?></span></td>
		<td data-name="Type" <?php echo $mas_activity_card_view->Type->cellAttributes() ?>>
<span id="el_mas_activity_card_Type">
<span<?php echo $mas_activity_card_view->Type->viewAttributes() ?>><?php echo $mas_activity_card_view->Type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_activity_card_view->Units->Visible) { // Units ?>
	<tr id="r_Units">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Units"><?php echo $mas_activity_card_view->Units->caption() ?></span></td>
		<td data-name="Units" <?php echo $mas_activity_card_view->Units->cellAttributes() ?>>
<span id="el_mas_activity_card_Units">
<span<?php echo $mas_activity_card_view->Units->viewAttributes() ?>><?php echo $mas_activity_card_view->Units->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_activity_card_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Amount"><?php echo $mas_activity_card_view->Amount->caption() ?></span></td>
		<td data-name="Amount" <?php echo $mas_activity_card_view->Amount->cellAttributes() ?>>
<span id="el_mas_activity_card_Amount">
<span<?php echo $mas_activity_card_view->Amount->viewAttributes() ?>><?php echo $mas_activity_card_view->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_activity_card_view->Selected->Visible) { // Selected ?>
	<tr id="r_Selected">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Selected"><?php echo $mas_activity_card_view->Selected->caption() ?></span></td>
		<td data-name="Selected" <?php echo $mas_activity_card_view->Selected->cellAttributes() ?>>
<span id="el_mas_activity_card_Selected">
<span<?php echo $mas_activity_card_view->Selected->viewAttributes() ?>><?php echo $mas_activity_card_view->Selected->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_activity_card_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_activity_card_view->isExport()) { ?>
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
$mas_activity_card_view->terminate();
?>