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
$ivf_agency_view = new ivf_agency_view();

// Run the page
$ivf_agency_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_agency_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_agency_view->isExport()) { ?>
<script>
var fivf_agencyview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_agencyview = currentForm = new ew.Form("fivf_agencyview", "view");
	loadjs.done("fivf_agencyview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_agency_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_agency_view->ExportOptions->render("body") ?>
<?php $ivf_agency_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_agency_view->showPageHeader(); ?>
<?php
$ivf_agency_view->showMessage();
?>
<form name="fivf_agencyview" id="fivf_agencyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_agency">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_agency_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_agency_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_id"><?php echo $ivf_agency_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_agency_view->id->cellAttributes() ?>>
<span id="el_ivf_agency_id">
<span<?php echo $ivf_agency_view->id->viewAttributes() ?>><?php echo $ivf_agency_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_agency_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Name"><?php echo $ivf_agency_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $ivf_agency_view->Name->cellAttributes() ?>>
<span id="el_ivf_agency_Name">
<span<?php echo $ivf_agency_view->Name->viewAttributes() ?>><?php echo $ivf_agency_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_agency_view->Street->Visible) { // Street ?>
	<tr id="r_Street">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Street"><?php echo $ivf_agency_view->Street->caption() ?></span></td>
		<td data-name="Street" <?php echo $ivf_agency_view->Street->cellAttributes() ?>>
<span id="el_ivf_agency_Street">
<span<?php echo $ivf_agency_view->Street->viewAttributes() ?>><?php echo $ivf_agency_view->Street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_agency_view->Town->Visible) { // Town ?>
	<tr id="r_Town">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Town"><?php echo $ivf_agency_view->Town->caption() ?></span></td>
		<td data-name="Town" <?php echo $ivf_agency_view->Town->cellAttributes() ?>>
<span id="el_ivf_agency_Town">
<span<?php echo $ivf_agency_view->Town->viewAttributes() ?>><?php echo $ivf_agency_view->Town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_agency_view->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_State"><?php echo $ivf_agency_view->State->caption() ?></span></td>
		<td data-name="State" <?php echo $ivf_agency_view->State->cellAttributes() ?>>
<span id="el_ivf_agency_State">
<span<?php echo $ivf_agency_view->State->viewAttributes() ?>><?php echo $ivf_agency_view->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_agency_view->Pin->Visible) { // Pin ?>
	<tr id="r_Pin">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Pin"><?php echo $ivf_agency_view->Pin->caption() ?></span></td>
		<td data-name="Pin" <?php echo $ivf_agency_view->Pin->cellAttributes() ?>>
<span id="el_ivf_agency_Pin">
<span<?php echo $ivf_agency_view->Pin->viewAttributes() ?>><?php echo $ivf_agency_view->Pin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_agency_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_agency_view->isExport()) { ?>
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
$ivf_agency_view->terminate();
?>