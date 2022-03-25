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
<?php include_once "header.php" ?>
<?php if (!$bankbranches->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fbankbranchesview = currentForm = new ew.Form("fbankbranchesview", "view");

// Form_CustomValidate event
fbankbranchesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbankbranchesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$bankbranches->isExport()) { ?>
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
<?php if ($bankbranches_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $bankbranches_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bankbranches">
<input type="hidden" name="modal" value="<?php echo (int)$bankbranches_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($bankbranches->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_id"><?php echo $bankbranches->id->caption() ?></span></td>
		<td data-name="id"<?php echo $bankbranches->id->cellAttributes() ?>>
<span id="el_bankbranches_id">
<span<?php echo $bankbranches->id->viewAttributes() ?>>
<?php echo $bankbranches->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches->Branch_Name->Visible) { // Branch_Name ?>
	<tr id="r_Branch_Name">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_Branch_Name"><?php echo $bankbranches->Branch_Name->caption() ?></span></td>
		<td data-name="Branch_Name"<?php echo $bankbranches->Branch_Name->cellAttributes() ?>>
<span id="el_bankbranches_Branch_Name">
<span<?php echo $bankbranches->Branch_Name->viewAttributes() ?>>
<?php echo $bankbranches->Branch_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches->Street_Address->Visible) { // Street_Address ?>
	<tr id="r_Street_Address">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_Street_Address"><?php echo $bankbranches->Street_Address->caption() ?></span></td>
		<td data-name="Street_Address"<?php echo $bankbranches->Street_Address->cellAttributes() ?>>
<span id="el_bankbranches_Street_Address">
<span<?php echo $bankbranches->Street_Address->viewAttributes() ?>>
<?php echo $bankbranches->Street_Address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches->City->Visible) { // City ?>
	<tr id="r_City">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_City"><?php echo $bankbranches->City->caption() ?></span></td>
		<td data-name="City"<?php echo $bankbranches->City->cellAttributes() ?>>
<span id="el_bankbranches_City">
<span<?php echo $bankbranches->City->viewAttributes() ?>>
<?php echo $bankbranches->City->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_State"><?php echo $bankbranches->State->caption() ?></span></td>
		<td data-name="State"<?php echo $bankbranches->State->cellAttributes() ?>>
<span id="el_bankbranches_State">
<span<?php echo $bankbranches->State->viewAttributes() ?>>
<?php echo $bankbranches->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches->Zipcode->Visible) { // Zipcode ?>
	<tr id="r_Zipcode">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_Zipcode"><?php echo $bankbranches->Zipcode->caption() ?></span></td>
		<td data-name="Zipcode"<?php echo $bankbranches->Zipcode->cellAttributes() ?>>
<span id="el_bankbranches_Zipcode">
<span<?php echo $bankbranches->Zipcode->viewAttributes() ?>>
<?php echo $bankbranches->Zipcode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches->Phone_Number->Visible) { // Phone_Number ?>
	<tr id="r_Phone_Number">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_Phone_Number"><?php echo $bankbranches->Phone_Number->caption() ?></span></td>
		<td data-name="Phone_Number"<?php echo $bankbranches->Phone_Number->cellAttributes() ?>>
<span id="el_bankbranches_Phone_Number">
<span<?php echo $bankbranches->Phone_Number->viewAttributes() ?>>
<?php echo $bankbranches->Phone_Number->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bankbranches->AccountNo->Visible) { // AccountNo ?>
	<tr id="r_AccountNo">
		<td class="<?php echo $bankbranches_view->TableLeftColumnClass ?>"><span id="elh_bankbranches_AccountNo"><?php echo $bankbranches->AccountNo->caption() ?></span></td>
		<td data-name="AccountNo"<?php echo $bankbranches->AccountNo->cellAttributes() ?>>
<span id="el_bankbranches_AccountNo">
<span<?php echo $bankbranches->AccountNo->viewAttributes() ?>>
<?php echo $bankbranches->AccountNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$bankbranches_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$bankbranches->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$bankbranches_view->terminate();
?>