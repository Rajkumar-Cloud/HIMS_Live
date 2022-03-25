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
$services_view = new services_view();

// Run the page
$services_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$services_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fservicesview = currentForm = new ew.Form("fservicesview", "view");

// Form_CustomValidate event
fservicesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fservicesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$services->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $services_view->ExportOptions->render("body") ?>
<?php $services_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $services_view->showPageHeader(); ?>
<?php
$services_view->showMessage();
?>
<form name="fservicesview" id="fservicesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($services_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $services_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="services">
<input type="hidden" name="modal" value="<?php echo (int)$services_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($services->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $services_view->TableLeftColumnClass ?>"><span id="elh_services_Id"><?php echo $services->Id->caption() ?></span></td>
		<td data-name="Id"<?php echo $services->Id->cellAttributes() ?>>
<span id="el_services_Id">
<span<?php echo $services->Id->viewAttributes() ?>>
<?php echo $services->Id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($services->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<tr id="r_DEPARTMENT">
		<td class="<?php echo $services_view->TableLeftColumnClass ?>"><span id="elh_services_DEPARTMENT"><?php echo $services->DEPARTMENT->caption() ?></span></td>
		<td data-name="DEPARTMENT"<?php echo $services->DEPARTMENT->cellAttributes() ?>>
<span id="el_services_DEPARTMENT">
<span<?php echo $services->DEPARTMENT->viewAttributes() ?>>
<?php echo $services->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($services->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<tr id="r_SERVICE_TYPE">
		<td class="<?php echo $services_view->TableLeftColumnClass ?>"><span id="elh_services_SERVICE_TYPE"><?php echo $services->SERVICE_TYPE->caption() ?></span></td>
		<td data-name="SERVICE_TYPE"<?php echo $services->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_services_SERVICE_TYPE">
<span<?php echo $services->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $services->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($services->SERVICE->Visible) { // SERVICE ?>
	<tr id="r_SERVICE">
		<td class="<?php echo $services_view->TableLeftColumnClass ?>"><span id="elh_services_SERVICE"><?php echo $services->SERVICE->caption() ?></span></td>
		<td data-name="SERVICE"<?php echo $services->SERVICE->cellAttributes() ?>>
<span id="el_services_SERVICE">
<span<?php echo $services->SERVICE->viewAttributes() ?>>
<?php echo $services->SERVICE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($services->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $services_view->TableLeftColumnClass ?>"><span id="elh_services_CODE"><?php echo $services->CODE->caption() ?></span></td>
		<td data-name="CODE"<?php echo $services->CODE->cellAttributes() ?>>
<span id="el_services_CODE">
<span<?php echo $services->CODE->viewAttributes() ?>>
<?php echo $services->CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($services->AMOUNT->Visible) { // AMOUNT ?>
	<tr id="r_AMOUNT">
		<td class="<?php echo $services_view->TableLeftColumnClass ?>"><span id="elh_services_AMOUNT"><?php echo $services->AMOUNT->caption() ?></span></td>
		<td data-name="AMOUNT"<?php echo $services->AMOUNT->cellAttributes() ?>>
<span id="el_services_AMOUNT">
<span<?php echo $services->AMOUNT->viewAttributes() ?>>
<?php echo $services->AMOUNT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$services_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$services_view->terminate();
?>