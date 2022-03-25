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
<?php include_once "header.php"; ?>
<?php if (!$ivf_oocytedenudation_stage_view->isExport()) { ?>
<script>
var fivf_oocytedenudation_stageview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_oocytedenudation_stageview = currentForm = new ew.Form("fivf_oocytedenudation_stageview", "view");
	loadjs.done("fivf_oocytedenudation_stageview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_oocytedenudation_stage_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_oocytedenudation_stage_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_oocytedenudation_stage_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_id"><?php echo $ivf_oocytedenudation_stage_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_oocytedenudation_stage_view->id->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_id">
<span<?php echo $ivf_oocytedenudation_stage_view->id->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_RIDNo"><?php echo $ivf_oocytedenudation_stage_view->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo" <?php echo $ivf_oocytedenudation_stage_view->RIDNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_RIDNo">
<span<?php echo $ivf_oocytedenudation_stage_view->RIDNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_Name"><?php echo $ivf_oocytedenudation_stage_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $ivf_oocytedenudation_stage_view->Name->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_Name">
<span<?php echo $ivf_oocytedenudation_stage_view->Name->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_TidNo"><?php echo $ivf_oocytedenudation_stage_view->TidNo->caption() ?></span></td>
		<td data-name="TidNo" <?php echo $ivf_oocytedenudation_stage_view->TidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_TidNo">
<span<?php echo $ivf_oocytedenudation_stage_view->TidNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->OidNo->Visible) { // OidNo ?>
	<tr id="r_OidNo">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_OidNo"><?php echo $ivf_oocytedenudation_stage_view->OidNo->caption() ?></span></td>
		<td data-name="OidNo" <?php echo $ivf_oocytedenudation_stage_view->OidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_OidNo">
<span<?php echo $ivf_oocytedenudation_stage_view->OidNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->OidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->OocyteNo->Visible) { // OocyteNo ?>
	<tr id="r_OocyteNo">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_OocyteNo"><?php echo $ivf_oocytedenudation_stage_view->OocyteNo->caption() ?></span></td>
		<td data-name="OocyteNo" <?php echo $ivf_oocytedenudation_stage_view->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_OocyteNo">
<span<?php echo $ivf_oocytedenudation_stage_view->OocyteNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->OocyteNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->Stage->Visible) { // Stage ?>
	<tr id="r_Stage">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_Stage"><?php echo $ivf_oocytedenudation_stage_view->Stage->caption() ?></span></td>
		<td data-name="Stage" <?php echo $ivf_oocytedenudation_stage_view->Stage->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_Stage">
<span<?php echo $ivf_oocytedenudation_stage_view->Stage->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->Stage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->ReMarks->Visible) { // ReMarks ?>
	<tr id="r_ReMarks">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_ReMarks"><?php echo $ivf_oocytedenudation_stage_view->ReMarks->caption() ?></span></td>
		<td data-name="ReMarks" <?php echo $ivf_oocytedenudation_stage_view->ReMarks->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_ReMarks">
<span<?php echo $ivf_oocytedenudation_stage_view->ReMarks->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->ReMarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_status"><?php echo $ivf_oocytedenudation_stage_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $ivf_oocytedenudation_stage_view->status->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_status">
<span<?php echo $ivf_oocytedenudation_stage_view->status->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_createdby"><?php echo $ivf_oocytedenudation_stage_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $ivf_oocytedenudation_stage_view->createdby->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_createdby">
<span<?php echo $ivf_oocytedenudation_stage_view->createdby->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_createddatetime"><?php echo $ivf_oocytedenudation_stage_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $ivf_oocytedenudation_stage_view->createddatetime->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_createddatetime">
<span<?php echo $ivf_oocytedenudation_stage_view->createddatetime->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_modifiedby"><?php echo $ivf_oocytedenudation_stage_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $ivf_oocytedenudation_stage_view->modifiedby->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_modifiedby">
<span<?php echo $ivf_oocytedenudation_stage_view->modifiedby->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ivf_oocytedenudation_stage_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_stage_modifieddatetime"><?php echo $ivf_oocytedenudation_stage_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $ivf_oocytedenudation_stage_view->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_modifieddatetime">
<span<?php echo $ivf_oocytedenudation_stage_view->modifieddatetime->viewAttributes() ?>><?php echo $ivf_oocytedenudation_stage_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_oocytedenudation_stage_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_oocytedenudation_stage_view->isExport()) { ?>
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
$ivf_oocytedenudation_stage_view->terminate();
?>