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
$banktransferto_view = new banktransferto_view();

// Run the page
$banktransferto_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$banktransferto_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$banktransferto_view->isExport()) { ?>
<script>
var fbanktransfertoview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbanktransfertoview = currentForm = new ew.Form("fbanktransfertoview", "view");
	loadjs.done("fbanktransfertoview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$banktransferto_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $banktransferto_view->ExportOptions->render("body") ?>
<?php $banktransferto_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $banktransferto_view->showPageHeader(); ?>
<?php
$banktransferto_view->showMessage();
?>
<form name="fbanktransfertoview" id="fbanktransfertoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
<input type="hidden" name="modal" value="<?php echo (int)$banktransferto_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($banktransferto_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_id"><?php echo $banktransferto_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $banktransferto_view->id->cellAttributes() ?>>
<span id="el_banktransferto_id">
<span<?php echo $banktransferto_view->id->viewAttributes() ?>><?php echo $banktransferto_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_Name"><?php echo $banktransferto_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $banktransferto_view->Name->cellAttributes() ?>>
<span id="el_banktransferto_Name">
<span<?php echo $banktransferto_view->Name->viewAttributes() ?>><?php echo $banktransferto_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto_view->Street_Address->Visible) { // Street_Address ?>
	<tr id="r_Street_Address">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_Street_Address"><?php echo $banktransferto_view->Street_Address->caption() ?></span></td>
		<td data-name="Street_Address" <?php echo $banktransferto_view->Street_Address->cellAttributes() ?>>
<span id="el_banktransferto_Street_Address">
<span<?php echo $banktransferto_view->Street_Address->viewAttributes() ?>><?php echo $banktransferto_view->Street_Address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto_view->City->Visible) { // City ?>
	<tr id="r_City">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_City"><?php echo $banktransferto_view->City->caption() ?></span></td>
		<td data-name="City" <?php echo $banktransferto_view->City->cellAttributes() ?>>
<span id="el_banktransferto_City">
<span<?php echo $banktransferto_view->City->viewAttributes() ?>><?php echo $banktransferto_view->City->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto_view->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_State"><?php echo $banktransferto_view->State->caption() ?></span></td>
		<td data-name="State" <?php echo $banktransferto_view->State->cellAttributes() ?>>
<span id="el_banktransferto_State">
<span<?php echo $banktransferto_view->State->viewAttributes() ?>><?php echo $banktransferto_view->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto_view->Zipcode->Visible) { // Zipcode ?>
	<tr id="r_Zipcode">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_Zipcode"><?php echo $banktransferto_view->Zipcode->caption() ?></span></td>
		<td data-name="Zipcode" <?php echo $banktransferto_view->Zipcode->cellAttributes() ?>>
<span id="el_banktransferto_Zipcode">
<span<?php echo $banktransferto_view->Zipcode->viewAttributes() ?>><?php echo $banktransferto_view->Zipcode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto_view->Mobile_Number->Visible) { // Mobile_Number ?>
	<tr id="r_Mobile_Number">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_Mobile_Number"><?php echo $banktransferto_view->Mobile_Number->caption() ?></span></td>
		<td data-name="Mobile_Number" <?php echo $banktransferto_view->Mobile_Number->cellAttributes() ?>>
<span id="el_banktransferto_Mobile_Number">
<span<?php echo $banktransferto_view->Mobile_Number->viewAttributes() ?>><?php echo $banktransferto_view->Mobile_Number->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto_view->AccountNo->Visible) { // AccountNo ?>
	<tr id="r_AccountNo">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_AccountNo"><?php echo $banktransferto_view->AccountNo->caption() ?></span></td>
		<td data-name="AccountNo" <?php echo $banktransferto_view->AccountNo->cellAttributes() ?>>
<span id="el_banktransferto_AccountNo">
<span<?php echo $banktransferto_view->AccountNo->viewAttributes() ?>><?php echo $banktransferto_view->AccountNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$banktransferto_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$banktransferto_view->isExport()) { ?>
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
$banktransferto_view->terminate();
?>