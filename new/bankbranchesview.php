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
$bankbranches_view = new bankbranches_view();

// Run the page
$bankbranches_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bankbranches_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bankbranches_view->isExport()) { ?>
<script>
var fbankbranchesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbankbranchesview = currentForm = new ew.Form("fbankbranchesview", "view");
	loadjs.done("fbankbranchesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bankbranches_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $bankbranches_view->ExportOptions->render("body") ?>
<?php $bankbranches_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $bankbranches_view->showPageHeader(); ?>
<?php
$bankbranches_view->showMessage();
?>
<form name="fbankbranchesview" id="fbankbranchesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bankbranches">
<input type="hidden" name="modal" value="<?php echo (int)$bankbranches_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($bankbranches_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_id"><?php echo $bankbranches_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $bankbranches_view->id->cellAttributes() ?>>
<span id="el_bankbranches_id">
<span<?php echo $bankbranches_view->id->viewAttributes() ?>><?php echo $bankbranches_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches_view->Branch_Name->Visible) { // Branch_Name ?>
	<tr id="r_Branch_Name">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_Branch_Name"><?php echo $bankbranches_view->Branch_Name->caption() ?></span></td>
		<td data-name="Branch_Name" <?php echo $bankbranches_view->Branch_Name->cellAttributes() ?>>
<span id="el_bankbranches_Branch_Name">
<span<?php echo $bankbranches_view->Branch_Name->viewAttributes() ?>><?php echo $bankbranches_view->Branch_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches_view->Street_Address->Visible) { // Street_Address ?>
	<tr id="r_Street_Address">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_Street_Address"><?php echo $bankbranches_view->Street_Address->caption() ?></span></td>
		<td data-name="Street_Address" <?php echo $bankbranches_view->Street_Address->cellAttributes() ?>>
<span id="el_bankbranches_Street_Address">
<span<?php echo $bankbranches_view->Street_Address->viewAttributes() ?>><?php echo $bankbranches_view->Street_Address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches_view->City->Visible) { // City ?>
	<tr id="r_City">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_City"><?php echo $bankbranches_view->City->caption() ?></span></td>
		<td data-name="City" <?php echo $bankbranches_view->City->cellAttributes() ?>>
<span id="el_bankbranches_City">
<span<?php echo $bankbranches_view->City->viewAttributes() ?>><?php echo $bankbranches_view->City->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches_view->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_State"><?php echo $bankbranches_view->State->caption() ?></span></td>
		<td data-name="State" <?php echo $bankbranches_view->State->cellAttributes() ?>>
<span id="el_bankbranches_State">
<span<?php echo $bankbranches_view->State->viewAttributes() ?>><?php echo $bankbranches_view->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches_view->Zipcode->Visible) { // Zipcode ?>
	<tr id="r_Zipcode">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_Zipcode"><?php echo $bankbranches_view->Zipcode->caption() ?></span></td>
		<td data-name="Zipcode" <?php echo $bankbranches_view->Zipcode->cellAttributes() ?>>
<span id="el_bankbranches_Zipcode">
<span<?php echo $bankbranches_view->Zipcode->viewAttributes() ?>><?php echo $bankbranches_view->Zipcode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches_view->Phone_Number->Visible) { // Phone_Number ?>
	<tr id="r_Phone_Number">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_Phone_Number"><?php echo $bankbranches_view->Phone_Number->caption() ?></span></td>
		<td data-name="Phone_Number" <?php echo $bankbranches_view->Phone_Number->cellAttributes() ?>>
<span id="el_bankbranches_Phone_Number">
<span<?php echo $bankbranches_view->Phone_Number->viewAttributes() ?>><?php echo $bankbranches_view->Phone_Number->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches_view->AccountNo->Visible) { // AccountNo ?>
	<tr id="r_AccountNo">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_AccountNo"><?php echo $bankbranches_view->AccountNo->caption() ?></span></td>
		<td data-name="AccountNo" <?php echo $bankbranches_view->AccountNo->cellAttributes() ?>>
<span id="el_bankbranches_AccountNo">
<span<?php echo $bankbranches_view->AccountNo->viewAttributes() ?>><?php echo $bankbranches_view->AccountNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$bankbranches_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bankbranches_view->isExport()) { ?>
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
$bankbranches_view->terminate();
?>