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
$crm_contactsubdetails_view = new crm_contactsubdetails_view();

// Run the page
$crm_contactsubdetails_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_contactsubdetails_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_contactsubdetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcrm_contactsubdetailsview = currentForm = new ew.Form("fcrm_contactsubdetailsview", "view");

// Form_CustomValidate event
fcrm_contactsubdetailsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_contactsubdetailsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$crm_contactsubdetails->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $crm_contactsubdetails_view->ExportOptions->render("body") ?>
<?php $crm_contactsubdetails_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $crm_contactsubdetails_view->showPageHeader(); ?>
<?php
$crm_contactsubdetails_view->showMessage();
?>
<form name="fcrm_contactsubdetailsview" id="fcrm_contactsubdetailsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_contactsubdetails_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_contactsubdetails_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_contactsubdetails">
<input type="hidden" name="modal" value="<?php echo (int)$crm_contactsubdetails_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($crm_contactsubdetails->contactsubscriptionid->Visible) { // contactsubscriptionid ?>
	<tr id="r_contactsubscriptionid">
		<td class="<?php echo $crm_contactsubdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactsubdetails_contactsubscriptionid"><?php echo $crm_contactsubdetails->contactsubscriptionid->caption() ?></span></td>
		<td data-name="contactsubscriptionid"<?php echo $crm_contactsubdetails->contactsubscriptionid->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_contactsubscriptionid">
<span<?php echo $crm_contactsubdetails->contactsubscriptionid->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->contactsubscriptionid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactsubdetails->birthday->Visible) { // birthday ?>
	<tr id="r_birthday">
		<td class="<?php echo $crm_contactsubdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactsubdetails_birthday"><?php echo $crm_contactsubdetails->birthday->caption() ?></span></td>
		<td data-name="birthday"<?php echo $crm_contactsubdetails->birthday->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_birthday">
<span<?php echo $crm_contactsubdetails->birthday->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->birthday->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactsubdetails->laststayintouchrequest->Visible) { // laststayintouchrequest ?>
	<tr id="r_laststayintouchrequest">
		<td class="<?php echo $crm_contactsubdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactsubdetails_laststayintouchrequest"><?php echo $crm_contactsubdetails->laststayintouchrequest->caption() ?></span></td>
		<td data-name="laststayintouchrequest"<?php echo $crm_contactsubdetails->laststayintouchrequest->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_laststayintouchrequest">
<span<?php echo $crm_contactsubdetails->laststayintouchrequest->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->laststayintouchrequest->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactsubdetails->laststayintouchsavedate->Visible) { // laststayintouchsavedate ?>
	<tr id="r_laststayintouchsavedate">
		<td class="<?php echo $crm_contactsubdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactsubdetails_laststayintouchsavedate"><?php echo $crm_contactsubdetails->laststayintouchsavedate->caption() ?></span></td>
		<td data-name="laststayintouchsavedate"<?php echo $crm_contactsubdetails->laststayintouchsavedate->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_laststayintouchsavedate">
<span<?php echo $crm_contactsubdetails->laststayintouchsavedate->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->laststayintouchsavedate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactsubdetails->leadsource->Visible) { // leadsource ?>
	<tr id="r_leadsource">
		<td class="<?php echo $crm_contactsubdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactsubdetails_leadsource"><?php echo $crm_contactsubdetails->leadsource->caption() ?></span></td>
		<td data-name="leadsource"<?php echo $crm_contactsubdetails->leadsource->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_leadsource">
<span<?php echo $crm_contactsubdetails->leadsource->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->leadsource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$crm_contactsubdetails_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_contactsubdetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_contactsubdetails_view->terminate();
?>