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
<?php include_once "header.php" ?>
<?php if (!$banktransferto->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fbanktransfertoview = currentForm = new ew.Form("fbanktransfertoview", "view");

// Form_CustomValidate event
fbanktransfertoview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbanktransfertoview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$banktransferto->isExport()) { ?>
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
<?php if ($banktransferto_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $banktransferto_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
<input type="hidden" name="modal" value="<?php echo (int)$banktransferto_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($banktransferto->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_id"><?php echo $banktransferto->id->caption() ?></span></td>
		<td data-name="id"<?php echo $banktransferto->id->cellAttributes() ?>>
<span id="el_banktransferto_id">
<span<?php echo $banktransferto->id->viewAttributes() ?>>
<?php echo $banktransferto->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_Name"><?php echo $banktransferto->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $banktransferto->Name->cellAttributes() ?>>
<span id="el_banktransferto_Name">
<span<?php echo $banktransferto->Name->viewAttributes() ?>>
<?php echo $banktransferto->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto->Street_Address->Visible) { // Street_Address ?>
	<tr id="r_Street_Address">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_Street_Address"><?php echo $banktransferto->Street_Address->caption() ?></span></td>
		<td data-name="Street_Address"<?php echo $banktransferto->Street_Address->cellAttributes() ?>>
<span id="el_banktransferto_Street_Address">
<span<?php echo $banktransferto->Street_Address->viewAttributes() ?>>
<?php echo $banktransferto->Street_Address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto->City->Visible) { // City ?>
	<tr id="r_City">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_City"><?php echo $banktransferto->City->caption() ?></span></td>
		<td data-name="City"<?php echo $banktransferto->City->cellAttributes() ?>>
<span id="el_banktransferto_City">
<span<?php echo $banktransferto->City->viewAttributes() ?>>
<?php echo $banktransferto->City->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_State"><?php echo $banktransferto->State->caption() ?></span></td>
		<td data-name="State"<?php echo $banktransferto->State->cellAttributes() ?>>
<span id="el_banktransferto_State">
<span<?php echo $banktransferto->State->viewAttributes() ?>>
<?php echo $banktransferto->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto->Zipcode->Visible) { // Zipcode ?>
	<tr id="r_Zipcode">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_Zipcode"><?php echo $banktransferto->Zipcode->caption() ?></span></td>
		<td data-name="Zipcode"<?php echo $banktransferto->Zipcode->cellAttributes() ?>>
<span id="el_banktransferto_Zipcode">
<span<?php echo $banktransferto->Zipcode->viewAttributes() ?>>
<?php echo $banktransferto->Zipcode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto->Mobile_Number->Visible) { // Mobile_Number ?>
	<tr id="r_Mobile_Number">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_Mobile_Number"><?php echo $banktransferto->Mobile_Number->caption() ?></span></td>
		<td data-name="Mobile_Number"<?php echo $banktransferto->Mobile_Number->cellAttributes() ?>>
<span id="el_banktransferto_Mobile_Number">
<span<?php echo $banktransferto->Mobile_Number->viewAttributes() ?>>
<?php echo $banktransferto->Mobile_Number->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($banktransferto->AccountNo->Visible) { // AccountNo ?>
	<tr id="r_AccountNo">
		<td class="<?php echo $banktransferto_view->TableLeftColumnClass ?>"><span id="elh_banktransferto_AccountNo"><?php echo $banktransferto->AccountNo->caption() ?></span></td>
		<td data-name="AccountNo"<?php echo $banktransferto->AccountNo->cellAttributes() ?>>
<span id="el_banktransferto_AccountNo">
<span<?php echo $banktransferto->AccountNo->viewAttributes() ?>>
<?php echo $banktransferto->AccountNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$banktransferto_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$banktransferto->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$banktransferto_view->terminate();
?>