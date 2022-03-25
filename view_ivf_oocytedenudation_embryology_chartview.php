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
$view_ivf_oocytedenudation_embryology_chart_view = new view_ivf_oocytedenudation_embryology_chart_view();

// Run the page
$view_ivf_oocytedenudation_embryology_chart_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_oocytedenudation_embryology_chart_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_ivf_oocytedenudation_embryology_chartview = currentForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartview", "view");

// Form_CustomValidate event
fview_ivf_oocytedenudation_embryology_chartview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_oocytedenudation_embryology_chartview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_ivf_oocytedenudation_embryology_chart_view->ExportOptions->render("body") ?>
<?php $view_ivf_oocytedenudation_embryology_chart_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_ivf_oocytedenudation_embryology_chart_view->showPageHeader(); ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_view->showMessage();
?>
<form name="fview_ivf_oocytedenudation_embryology_chartview" id="fview_ivf_oocytedenudation_embryology_chartview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_oocytedenudation_embryology_chart_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<input type="hidden" name="modal" value="<?php echo (int)$view_ivf_oocytedenudation_embryology_chart_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_ivf_oocytedenudation_embryology_chart->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_id"><?php echo $view_ivf_oocytedenudation_embryology_chart->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_ivf_oocytedenudation_embryology_chart->id->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_id">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->id->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
	<tr id="r_OocyteNo">
		<td class="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_OocyteNo"><?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->caption() ?></span></td>
		<td data-name="OocyteNo"<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Stage->Visible) { // Stage ?>
	<tr id="r_Stage">
		<td class="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Stage"><?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->caption() ?></span></td>
		<td data-name="Stage"<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Stage">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_RIDNo"><?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo"<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_RIDNo">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Name"><?php echo $view_ivf_oocytedenudation_embryology_chart->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Name">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<tr id="r_Day0OocyteStage">
		<td class="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->caption() ?></span></td>
		<td data-name="Day0OocyteStage"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0sino->Visible) { // Day0sino ?>
	<tr id="r_Day0sino">
		<td class="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Day0sino"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->caption() ?></span></td>
		<td data-name="Day0sino"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Day0sino">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_TidNo"><?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->caption() ?></span></td>
		<td data-name="TidNo"<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_TidNo">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->DidNO->Visible) { // DidNO ?>
	<tr id="r_DidNO">
		<td class="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_DidNO"><?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->caption() ?></span></td>
		<td data-name="DidNO"<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_DidNO">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_ivf_oocytedenudation_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Remarks"><?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Remarks">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_ivf_oocytedenudation_embryology_chart_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_view->terminate();
?>