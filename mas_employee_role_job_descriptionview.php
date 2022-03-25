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
$mas_employee_role_job_description_view = new mas_employee_role_job_description_view();

// Run the page
$mas_employee_role_job_description_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_employee_role_job_description_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_employee_role_job_description->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_employee_role_job_descriptionview = currentForm = new ew.Form("fmas_employee_role_job_descriptionview", "view");

// Form_CustomValidate event
fmas_employee_role_job_descriptionview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_employee_role_job_descriptionview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_employee_role_job_descriptionview.lists["x_status"] = <?php echo $mas_employee_role_job_description_view->status->Lookup->toClientList() ?>;
fmas_employee_role_job_descriptionview.lists["x_status"].options = <?php echo JsonEncode($mas_employee_role_job_description_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_employee_role_job_description->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_employee_role_job_description_view->ExportOptions->render("body") ?>
<?php $mas_employee_role_job_description_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_employee_role_job_description_view->showPageHeader(); ?>
<?php
$mas_employee_role_job_description_view->showMessage();
?>
<form name="fmas_employee_role_job_descriptionview" id="fmas_employee_role_job_descriptionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_employee_role_job_description_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_employee_role_job_description_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_employee_role_job_description">
<input type="hidden" name="modal" value="<?php echo (int)$mas_employee_role_job_description_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_employee_role_job_description->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_mas_employee_role_job_description_id"><?php echo $mas_employee_role_job_description->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_employee_role_job_description->id->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_id">
<span<?php echo $mas_employee_role_job_description->id->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_employee_role_job_description->role->Visible) { // role ?>
	<tr id="r_role">
		<td class="<?php echo $mas_employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_mas_employee_role_job_description_role"><?php echo $mas_employee_role_job_description->role->caption() ?></span></td>
		<td data-name="role"<?php echo $mas_employee_role_job_description->role->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_role">
<span<?php echo $mas_employee_role_job_description->role->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->role->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_employee_role_job_description->job_description->Visible) { // job_description ?>
	<tr id="r_job_description">
		<td class="<?php echo $mas_employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_mas_employee_role_job_description_job_description"><?php echo $mas_employee_role_job_description->job_description->caption() ?></span></td>
		<td data-name="job_description"<?php echo $mas_employee_role_job_description->job_description->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_job_description">
<span<?php echo $mas_employee_role_job_description->job_description->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->job_description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_employee_role_job_description->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $mas_employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_mas_employee_role_job_description_status"><?php echo $mas_employee_role_job_description->status->caption() ?></span></td>
		<td data-name="status"<?php echo $mas_employee_role_job_description->status->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_status">
<span<?php echo $mas_employee_role_job_description->status->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_employee_role_job_description->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $mas_employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_mas_employee_role_job_description_createdby"><?php echo $mas_employee_role_job_description->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $mas_employee_role_job_description->createdby->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_createdby">
<span<?php echo $mas_employee_role_job_description->createdby->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_employee_role_job_description->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $mas_employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_mas_employee_role_job_description_createddatetime"><?php echo $mas_employee_role_job_description->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $mas_employee_role_job_description->createddatetime->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_createddatetime">
<span<?php echo $mas_employee_role_job_description->createddatetime->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_employee_role_job_description->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $mas_employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_mas_employee_role_job_description_modifiedby"><?php echo $mas_employee_role_job_description->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $mas_employee_role_job_description->modifiedby->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_modifiedby">
<span<?php echo $mas_employee_role_job_description->modifiedby->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_employee_role_job_description->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $mas_employee_role_job_description_view->TableLeftColumnClass ?>"><span id="elh_mas_employee_role_job_description_modifieddatetime"><?php echo $mas_employee_role_job_description->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $mas_employee_role_job_description->modifieddatetime->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_modifieddatetime">
<span<?php echo $mas_employee_role_job_description->modifieddatetime->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_employee_role_job_description_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_employee_role_job_description->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_employee_role_job_description_view->terminate();
?>