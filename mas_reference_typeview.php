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
$mas_reference_type_view = new mas_reference_type_view();

// Run the page
$mas_reference_type_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_reference_type_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_reference_type->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_reference_typeview = currentForm = new ew.Form("fmas_reference_typeview", "view");

// Form_CustomValidate event
fmas_reference_typeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_reference_typeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_reference_type->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_reference_type_view->ExportOptions->render("body") ?>
<?php $mas_reference_type_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_reference_type_view->showPageHeader(); ?>
<?php
$mas_reference_type_view->showMessage();
?>
<form name="fmas_reference_typeview" id="fmas_reference_typeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_reference_type_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_reference_type_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<input type="hidden" name="modal" value="<?php echo (int)$mas_reference_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_reference_type->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_id"><?php echo $mas_reference_type->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_reference_type->id->cellAttributes() ?>>
<span id="el_mas_reference_type_id">
<span<?php echo $mas_reference_type->id->viewAttributes() ?>>
<?php echo $mas_reference_type->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type->reference->Visible) { // reference ?>
	<tr id="r_reference">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_reference"><?php echo $mas_reference_type->reference->caption() ?></span></td>
		<td data-name="reference"<?php echo $mas_reference_type->reference->cellAttributes() ?>>
<span id="el_mas_reference_type_reference">
<span<?php echo $mas_reference_type->reference->viewAttributes() ?>>
<?php echo $mas_reference_type->reference->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_ReferMobileNo"><?php echo $mas_reference_type->ReferMobileNo->caption() ?></span></td>
		<td data-name="ReferMobileNo"<?php echo $mas_reference_type->ReferMobileNo->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferMobileNo">
<span<?php echo $mas_reference_type->ReferMobileNo->viewAttributes() ?>>
<?php echo $mas_reference_type->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_ReferClinicname"><?php echo $mas_reference_type->ReferClinicname->caption() ?></span></td>
		<td data-name="ReferClinicname"<?php echo $mas_reference_type->ReferClinicname->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferClinicname">
<span<?php echo $mas_reference_type->ReferClinicname->viewAttributes() ?>>
<?php echo $mas_reference_type->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_ReferCity"><?php echo $mas_reference_type->ReferCity->caption() ?></span></td>
		<td data-name="ReferCity"<?php echo $mas_reference_type->ReferCity->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferCity">
<span<?php echo $mas_reference_type->ReferCity->viewAttributes() ?>>
<?php echo $mas_reference_type->ReferCity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_HospID"><?php echo $mas_reference_type->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $mas_reference_type->HospID->cellAttributes() ?>>
<span id="el_mas_reference_type_HospID">
<span<?php echo $mas_reference_type->HospID->viewAttributes() ?>>
<?php echo $mas_reference_type->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type->_email->Visible) { // email ?>
	<tr id="r__email">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type__email"><?php echo $mas_reference_type->_email->caption() ?></span></td>
		<td data-name="_email"<?php echo $mas_reference_type->_email->cellAttributes() ?>>
<span id="el_mas_reference_type__email">
<span<?php echo $mas_reference_type->_email->viewAttributes() ?>>
<?php echo $mas_reference_type->_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type->whatapp->Visible) { // whatapp ?>
	<tr id="r_whatapp">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_whatapp"><?php echo $mas_reference_type->whatapp->caption() ?></span></td>
		<td data-name="whatapp"<?php echo $mas_reference_type->whatapp->cellAttributes() ?>>
<span id="el_mas_reference_type_whatapp">
<span<?php echo $mas_reference_type->whatapp->viewAttributes() ?>>
<?php echo $mas_reference_type->whatapp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_reference_type_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_reference_type->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_reference_type_view->terminate();
?>