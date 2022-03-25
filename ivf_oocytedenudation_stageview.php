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
$ivf_oocytedenudation_stage_view = new ivf_oocytedenudation_stage_view();

// Run the page
$ivf_oocytedenudation_stage_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_stage_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_oocytedenudation_stage->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_oocytedenudation_stageview = currentForm = new ew.Form("fivf_oocytedenudation_stageview", "view");

// Form_CustomValidate event
fivf_oocytedenudation_stageview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_oocytedenudation_stageview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_oocytedenudation_stageview.lists["x_Stage"] = <?php echo $ivf_oocytedenudation_stage_view->Stage->Lookup->toClientList() ?>;
fivf_oocytedenudation_stageview.lists["x_Stage"].options = <?php echo JsonEncode($ivf_oocytedenudation_stage_view->Stage->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_oocytedenudation_stage->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_oocytedenudation_stage_view->ExportOptions->render("body") ?>
<?php $ivf_oocytedenudation_stage_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_oocytedenudation_stage_view->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_stage_view->showMessage();
?>
<form name="fivf_oocytedenudation_stageview" id="fivf_oocytedenudation_stageview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_oocytedenudation_stage_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_oocytedenudation_stage_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_oocytedenudation_stage_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_oocytedenudation_stage->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_id"><?php echo $ivf_oocytedenudation_stage->id->caption() ?></span></td>
		<td data-name="id"<?php echo $ivf_oocytedenudation_stage->id->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_id">
<span<?php echo $ivf_oocytedenudation_stage->id->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_RIDNo"><?php echo $ivf_oocytedenudation_stage->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo"<?php echo $ivf_oocytedenudation_stage->RIDNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_RIDNo">
<span<?php echo $ivf_oocytedenudation_stage->RIDNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_Name"><?php echo $ivf_oocytedenudation_stage->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $ivf_oocytedenudation_stage->Name->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_Name">
<span<?php echo $ivf_oocytedenudation_stage->Name->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_TidNo"><?php echo $ivf_oocytedenudation_stage->TidNo->caption() ?></span></td>
		<td data-name="TidNo"<?php echo $ivf_oocytedenudation_stage->TidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_TidNo">
<span<?php echo $ivf_oocytedenudation_stage->TidNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->OidNo->Visible) { // OidNo ?>
	<tr id="r_OidNo">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_OidNo"><?php echo $ivf_oocytedenudation_stage->OidNo->caption() ?></span></td>
		<td data-name="OidNo"<?php echo $ivf_oocytedenudation_stage->OidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_OidNo">
<span<?php echo $ivf_oocytedenudation_stage->OidNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->OidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
	<tr id="r_OocyteNo">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_OocyteNo"><?php echo $ivf_oocytedenudation_stage->OocyteNo->caption() ?></span></td>
		<td data-name="OocyteNo"<?php echo $ivf_oocytedenudation_stage->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_OocyteNo">
<span<?php echo $ivf_oocytedenudation_stage->OocyteNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->OocyteNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
	<tr id="r_Stage">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_Stage"><?php echo $ivf_oocytedenudation_stage->Stage->caption() ?></span></td>
		<td data-name="Stage"<?php echo $ivf_oocytedenudation_stage->Stage->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_Stage">
<span<?php echo $ivf_oocytedenudation_stage->Stage->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->Stage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
	<tr id="r_ReMarks">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_ReMarks"><?php echo $ivf_oocytedenudation_stage->ReMarks->caption() ?></span></td>
		<td data-name="ReMarks"<?php echo $ivf_oocytedenudation_stage->ReMarks->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_ReMarks">
<span<?php echo $ivf_oocytedenudation_stage->ReMarks->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->ReMarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_status"><?php echo $ivf_oocytedenudation_stage->status->caption() ?></span></td>
		<td data-name="status"<?php echo $ivf_oocytedenudation_stage->status->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_status">
<span<?php echo $ivf_oocytedenudation_stage->status->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_createdby"><?php echo $ivf_oocytedenudation_stage->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $ivf_oocytedenudation_stage->createdby->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_createdby">
<span<?php echo $ivf_oocytedenudation_stage->createdby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_createddatetime"><?php echo $ivf_oocytedenudation_stage->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $ivf_oocytedenudation_stage->createddatetime->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_createddatetime">
<span<?php echo $ivf_oocytedenudation_stage->createddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_modifiedby"><?php echo $ivf_oocytedenudation_stage->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $ivf_oocytedenudation_stage->modifiedby->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_modifiedby">
<span<?php echo $ivf_oocytedenudation_stage->modifiedby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_modifieddatetime"><?php echo $ivf_oocytedenudation_stage->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $ivf_oocytedenudation_stage->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_modifieddatetime">
<span<?php echo $ivf_oocytedenudation_stage->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_oocytedenudation_stage_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_oocytedenudation_stage->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_oocytedenudation_stage_view->terminate();
?>