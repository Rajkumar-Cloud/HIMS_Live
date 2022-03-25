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
$hr_projects_view = new hr_projects_view();

// Run the page
$hr_projects_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_projects_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_projects->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_projectsview = currentForm = new ew.Form("fhr_projectsview", "view");

// Form_CustomValidate event
fhr_projectsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_projectsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_projectsview.lists["x_status"] = <?php echo $hr_projects_view->status->Lookup->toClientList() ?>;
fhr_projectsview.lists["x_status"].options = <?php echo JsonEncode($hr_projects_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_projects->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_projects_view->ExportOptions->render("body") ?>
<?php $hr_projects_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_projects_view->showPageHeader(); ?>
<?php
$hr_projects_view->showMessage();
?>
<form name="fhr_projectsview" id="fhr_projectsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_projects_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_projects_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_projects">
<input type="hidden" name="modal" value="<?php echo (int)$hr_projects_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_projects->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_projects_view->TableLeftColumnClass ?>"><span id="elh_hr_projects_id"><?php echo $hr_projects->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_projects->id->cellAttributes() ?>>
<span id="el_hr_projects_id">
<span<?php echo $hr_projects->id->viewAttributes() ?>>
<?php echo $hr_projects->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_projects->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_projects_view->TableLeftColumnClass ?>"><span id="elh_hr_projects_name"><?php echo $hr_projects->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_projects->name->cellAttributes() ?>>
<span id="el_hr_projects_name">
<span<?php echo $hr_projects->name->viewAttributes() ?>>
<?php echo $hr_projects->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_projects->client->Visible) { // client ?>
	<tr id="r_client">
		<td class="<?php echo $hr_projects_view->TableLeftColumnClass ?>"><span id="elh_hr_projects_client"><?php echo $hr_projects->client->caption() ?></span></td>
		<td data-name="client"<?php echo $hr_projects->client->cellAttributes() ?>>
<span id="el_hr_projects_client">
<span<?php echo $hr_projects->client->viewAttributes() ?>>
<?php echo $hr_projects->client->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_projects->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $hr_projects_view->TableLeftColumnClass ?>"><span id="elh_hr_projects_details"><?php echo $hr_projects->details->caption() ?></span></td>
		<td data-name="details"<?php echo $hr_projects->details->cellAttributes() ?>>
<span id="el_hr_projects_details">
<span<?php echo $hr_projects->details->viewAttributes() ?>>
<?php echo $hr_projects->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_projects->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $hr_projects_view->TableLeftColumnClass ?>"><span id="elh_hr_projects_created"><?php echo $hr_projects->created->caption() ?></span></td>
		<td data-name="created"<?php echo $hr_projects->created->cellAttributes() ?>>
<span id="el_hr_projects_created">
<span<?php echo $hr_projects->created->viewAttributes() ?>>
<?php echo $hr_projects->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_projects->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hr_projects_view->TableLeftColumnClass ?>"><span id="elh_hr_projects_status"><?php echo $hr_projects->status->caption() ?></span></td>
		<td data-name="status"<?php echo $hr_projects->status->cellAttributes() ?>>
<span id="el_hr_projects_status">
<span<?php echo $hr_projects->status->viewAttributes() ?>>
<?php echo $hr_projects->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_projects->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_projects_view->TableLeftColumnClass ?>"><span id="elh_hr_projects_HospID"><?php echo $hr_projects->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_projects->HospID->cellAttributes() ?>>
<span id="el_hr_projects_HospID">
<span<?php echo $hr_projects->HospID->viewAttributes() ?>>
<?php echo $hr_projects->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_projects_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_projects->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_projects_view->terminate();
?>