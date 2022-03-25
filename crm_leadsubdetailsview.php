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
$crm_leadsubdetails_view = new crm_leadsubdetails_view();

// Run the page
$crm_leadsubdetails_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadsubdetails_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leadsubdetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcrm_leadsubdetailsview = currentForm = new ew.Form("fcrm_leadsubdetailsview", "view");

// Form_CustomValidate event
fcrm_leadsubdetailsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadsubdetailsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$crm_leadsubdetails->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $crm_leadsubdetails_view->ExportOptions->render("body") ?>
<?php $crm_leadsubdetails_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $crm_leadsubdetails_view->showPageHeader(); ?>
<?php
$crm_leadsubdetails_view->showMessage();
?>
<form name="fcrm_leadsubdetailsview" id="fcrm_leadsubdetailsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadsubdetails_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadsubdetails_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadsubdetails">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leadsubdetails_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($crm_leadsubdetails->leadsubscriptionid->Visible) { // leadsubscriptionid ?>
	<tr id="r_leadsubscriptionid">
		<td class="<?php echo $crm_leadsubdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leadsubdetails_leadsubscriptionid"><?php echo $crm_leadsubdetails->leadsubscriptionid->caption() ?></span></td>
		<td data-name="leadsubscriptionid"<?php echo $crm_leadsubdetails->leadsubscriptionid->cellAttributes() ?>>
<span id="el_crm_leadsubdetails_leadsubscriptionid">
<span<?php echo $crm_leadsubdetails->leadsubscriptionid->viewAttributes() ?>>
<?php echo $crm_leadsubdetails->leadsubscriptionid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadsubdetails->website->Visible) { // website ?>
	<tr id="r_website">
		<td class="<?php echo $crm_leadsubdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leadsubdetails_website"><?php echo $crm_leadsubdetails->website->caption() ?></span></td>
		<td data-name="website"<?php echo $crm_leadsubdetails->website->cellAttributes() ?>>
<span id="el_crm_leadsubdetails_website">
<span<?php echo $crm_leadsubdetails->website->viewAttributes() ?>>
<?php echo $crm_leadsubdetails->website->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$crm_leadsubdetails_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leadsubdetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leadsubdetails_view->terminate();
?>