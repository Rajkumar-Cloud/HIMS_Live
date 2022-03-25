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
$ivf_semenanalysisreport_view = new ivf_semenanalysisreport_view();

// Run the page
$ivf_semenanalysisreport_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenanalysisreport_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_semenanalysisreport_view->isExport()) { ?>
<script>
var fivf_semenanalysisreportview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_semenanalysisreportview = currentForm = new ew.Form("fivf_semenanalysisreportview", "view");
	loadjs.done("fivf_semenanalysisreportview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_semenanalysisreport_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_semenanalysisreport_view->ExportOptions->render("body") ?>
<?php $ivf_semenanalysisreport_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_semenanalysisreport_view->showPageHeader(); ?>
<?php
$ivf_semenanalysisreport_view->showMessage();
?>
<form name="fivf_semenanalysisreportview" id="fivf_semenanalysisreportview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_semenanalysisreport_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_semenanalysisreport_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_id"><script id="tpc_ivf_semenanalysisreport_id" type="text/html"><?php echo $ivf_semenanalysisreport_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $ivf_semenanalysisreport_view->id->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_id" type="text/html"><span id="el_ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport_view->id->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_RIDNo"><script id="tpc_ivf_semenanalysisreport_RIDNo" type="text/html"><?php echo $ivf_semenanalysisreport_view->RIDNo->caption() ?></script></span></td>
		<td data-name="RIDNo" <?php echo $ivf_semenanalysisreport_view->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_RIDNo" type="text/html"><span id="el_ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport_view->RIDNo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->RIDNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PatientName"><script id="tpc_ivf_semenanalysisreport_PatientName" type="text/html"><?php echo $ivf_semenanalysisreport_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $ivf_semenanalysisreport_view->PatientName->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PatientName" type="text/html"><span id="el_ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport_view->PatientName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->HusbandName->Visible) { // HusbandName ?>
	<tr id="r_HusbandName">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_HusbandName"><script id="tpc_ivf_semenanalysisreport_HusbandName" type="text/html"><?php echo $ivf_semenanalysisreport_view->HusbandName->caption() ?></script></span></td>
		<td data-name="HusbandName" <?php echo $ivf_semenanalysisreport_view->HusbandName->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_HusbandName" type="text/html"><span id="el_ivf_semenanalysisreport_HusbandName">
<span<?php echo $ivf_semenanalysisreport_view->HusbandName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->HusbandName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->RequestDr->Visible) { // RequestDr ?>
	<tr id="r_RequestDr">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_RequestDr"><script id="tpc_ivf_semenanalysisreport_RequestDr" type="text/html"><?php echo $ivf_semenanalysisreport_view->RequestDr->caption() ?></script></span></td>
		<td data-name="RequestDr" <?php echo $ivf_semenanalysisreport_view->RequestDr->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_RequestDr" type="text/html"><span id="el_ivf_semenanalysisreport_RequestDr">
<span<?php echo $ivf_semenanalysisreport_view->RequestDr->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->RequestDr->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->CollectionDate->Visible) { // CollectionDate ?>
	<tr id="r_CollectionDate">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CollectionDate"><script id="tpc_ivf_semenanalysisreport_CollectionDate" type="text/html"><?php echo $ivf_semenanalysisreport_view->CollectionDate->caption() ?></script></span></td>
		<td data-name="CollectionDate" <?php echo $ivf_semenanalysisreport_view->CollectionDate->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CollectionDate" type="text/html"><span id="el_ivf_semenanalysisreport_CollectionDate">
<span<?php echo $ivf_semenanalysisreport_view->CollectionDate->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->CollectionDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->ResultDate->Visible) { // ResultDate ?>
	<tr id="r_ResultDate">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ResultDate"><script id="tpc_ivf_semenanalysisreport_ResultDate" type="text/html"><?php echo $ivf_semenanalysisreport_view->ResultDate->caption() ?></script></span></td>
		<td data-name="ResultDate" <?php echo $ivf_semenanalysisreport_view->ResultDate->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ResultDate" type="text/html"><span id="el_ivf_semenanalysisreport_ResultDate">
<span<?php echo $ivf_semenanalysisreport_view->ResultDate->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->ResultDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->RequestSample->Visible) { // RequestSample ?>
	<tr id="r_RequestSample">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_RequestSample"><script id="tpc_ivf_semenanalysisreport_RequestSample" type="text/html"><?php echo $ivf_semenanalysisreport_view->RequestSample->caption() ?></script></span></td>
		<td data-name="RequestSample" <?php echo $ivf_semenanalysisreport_view->RequestSample->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_RequestSample" type="text/html"><span id="el_ivf_semenanalysisreport_RequestSample">
<span<?php echo $ivf_semenanalysisreport_view->RequestSample->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->RequestSample->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->CollectionType->Visible) { // CollectionType ?>
	<tr id="r_CollectionType">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CollectionType"><script id="tpc_ivf_semenanalysisreport_CollectionType" type="text/html"><?php echo $ivf_semenanalysisreport_view->CollectionType->caption() ?></script></span></td>
		<td data-name="CollectionType" <?php echo $ivf_semenanalysisreport_view->CollectionType->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CollectionType" type="text/html"><span id="el_ivf_semenanalysisreport_CollectionType">
<span<?php echo $ivf_semenanalysisreport_view->CollectionType->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->CollectionType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->CollectionMethod->Visible) { // CollectionMethod ?>
	<tr id="r_CollectionMethod">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CollectionMethod"><script id="tpc_ivf_semenanalysisreport_CollectionMethod" type="text/html"><?php echo $ivf_semenanalysisreport_view->CollectionMethod->caption() ?></script></span></td>
		<td data-name="CollectionMethod" <?php echo $ivf_semenanalysisreport_view->CollectionMethod->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CollectionMethod" type="text/html"><span id="el_ivf_semenanalysisreport_CollectionMethod">
<span<?php echo $ivf_semenanalysisreport_view->CollectionMethod->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->CollectionMethod->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Medicationused->Visible) { // Medicationused ?>
	<tr id="r_Medicationused">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Medicationused"><script id="tpc_ivf_semenanalysisreport_Medicationused" type="text/html"><?php echo $ivf_semenanalysisreport_view->Medicationused->caption() ?></script></span></td>
		<td data-name="Medicationused" <?php echo $ivf_semenanalysisreport_view->Medicationused->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Medicationused" type="text/html"><span id="el_ivf_semenanalysisreport_Medicationused">
<span<?php echo $ivf_semenanalysisreport_view->Medicationused->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Medicationused->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<tr id="r_DifficultiesinCollection">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DifficultiesinCollection"><script id="tpc_ivf_semenanalysisreport_DifficultiesinCollection" type="text/html"><?php echo $ivf_semenanalysisreport_view->DifficultiesinCollection->caption() ?></script></span></td>
		<td data-name="DifficultiesinCollection" <?php echo $ivf_semenanalysisreport_view->DifficultiesinCollection->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DifficultiesinCollection" type="text/html"><span id="el_ivf_semenanalysisreport_DifficultiesinCollection">
<span<?php echo $ivf_semenanalysisreport_view->DifficultiesinCollection->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->DifficultiesinCollection->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->pH->Visible) { // pH ?>
	<tr id="r_pH">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_pH"><script id="tpc_ivf_semenanalysisreport_pH" type="text/html"><?php echo $ivf_semenanalysisreport_view->pH->caption() ?></script></span></td>
		<td data-name="pH" <?php echo $ivf_semenanalysisreport_view->pH->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_pH" type="text/html"><span id="el_ivf_semenanalysisreport_pH">
<span<?php echo $ivf_semenanalysisreport_view->pH->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->pH->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Timeofcollection->Visible) { // Timeofcollection ?>
	<tr id="r_Timeofcollection">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Timeofcollection"><script id="tpc_ivf_semenanalysisreport_Timeofcollection" type="text/html"><?php echo $ivf_semenanalysisreport_view->Timeofcollection->caption() ?></script></span></td>
		<td data-name="Timeofcollection" <?php echo $ivf_semenanalysisreport_view->Timeofcollection->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Timeofcollection" type="text/html"><span id="el_ivf_semenanalysisreport_Timeofcollection">
<span<?php echo $ivf_semenanalysisreport_view->Timeofcollection->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Timeofcollection->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Timeofexamination->Visible) { // Timeofexamination ?>
	<tr id="r_Timeofexamination">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Timeofexamination"><script id="tpc_ivf_semenanalysisreport_Timeofexamination" type="text/html"><?php echo $ivf_semenanalysisreport_view->Timeofexamination->caption() ?></script></span></td>
		<td data-name="Timeofexamination" <?php echo $ivf_semenanalysisreport_view->Timeofexamination->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Timeofexamination" type="text/html"><span id="el_ivf_semenanalysisreport_Timeofexamination">
<span<?php echo $ivf_semenanalysisreport_view->Timeofexamination->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Timeofexamination->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Volume->Visible) { // Volume ?>
	<tr id="r_Volume">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Volume"><script id="tpc_ivf_semenanalysisreport_Volume" type="text/html"><?php echo $ivf_semenanalysisreport_view->Volume->caption() ?></script></span></td>
		<td data-name="Volume" <?php echo $ivf_semenanalysisreport_view->Volume->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Volume" type="text/html"><span id="el_ivf_semenanalysisreport_Volume">
<span<?php echo $ivf_semenanalysisreport_view->Volume->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Volume->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Concentration->Visible) { // Concentration ?>
	<tr id="r_Concentration">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Concentration"><script id="tpc_ivf_semenanalysisreport_Concentration" type="text/html"><?php echo $ivf_semenanalysisreport_view->Concentration->caption() ?></script></span></td>
		<td data-name="Concentration" <?php echo $ivf_semenanalysisreport_view->Concentration->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Concentration" type="text/html"><span id="el_ivf_semenanalysisreport_Concentration">
<span<?php echo $ivf_semenanalysisreport_view->Concentration->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Concentration->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Total->Visible) { // Total ?>
	<tr id="r_Total">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Total"><script id="tpc_ivf_semenanalysisreport_Total" type="text/html"><?php echo $ivf_semenanalysisreport_view->Total->caption() ?></script></span></td>
		<td data-name="Total" <?php echo $ivf_semenanalysisreport_view->Total->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Total" type="text/html"><span id="el_ivf_semenanalysisreport_Total">
<span<?php echo $ivf_semenanalysisreport_view->Total->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Total->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<tr id="r_ProgressiveMotility">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility"><script id="tpc_ivf_semenanalysisreport_ProgressiveMotility" type="text/html"><?php echo $ivf_semenanalysisreport_view->ProgressiveMotility->caption() ?></script></span></td>
		<td data-name="ProgressiveMotility" <?php echo $ivf_semenanalysisreport_view->ProgressiveMotility->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProgressiveMotility" type="text/html"><span id="el_ivf_semenanalysisreport_ProgressiveMotility">
<span<?php echo $ivf_semenanalysisreport_view->ProgressiveMotility->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->ProgressiveMotility->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<tr id="r_NonProgrssiveMotile">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile"><script id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile" type="text/html"><?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile->caption() ?></script></span></td>
		<td data-name="NonProgrssiveMotile" <?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile" type="text/html"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Immotile->Visible) { // Immotile ?>
	<tr id="r_Immotile">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Immotile"><script id="tpc_ivf_semenanalysisreport_Immotile" type="text/html"><?php echo $ivf_semenanalysisreport_view->Immotile->caption() ?></script></span></td>
		<td data-name="Immotile" <?php echo $ivf_semenanalysisreport_view->Immotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Immotile" type="text/html"><span id="el_ivf_semenanalysisreport_Immotile">
<span<?php echo $ivf_semenanalysisreport_view->Immotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Immotile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<tr id="r_TotalProgrssiveMotile">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile"><script id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile" type="text/html"><?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile->caption() ?></script></span></td>
		<td data-name="TotalProgrssiveMotile" <?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile" type="text/html"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Appearance->Visible) { // Appearance ?>
	<tr id="r_Appearance">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Appearance"><script id="tpc_ivf_semenanalysisreport_Appearance" type="text/html"><?php echo $ivf_semenanalysisreport_view->Appearance->caption() ?></script></span></td>
		<td data-name="Appearance" <?php echo $ivf_semenanalysisreport_view->Appearance->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Appearance" type="text/html"><span id="el_ivf_semenanalysisreport_Appearance">
<span<?php echo $ivf_semenanalysisreport_view->Appearance->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Appearance->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Homogenosity->Visible) { // Homogenosity ?>
	<tr id="r_Homogenosity">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Homogenosity"><script id="tpc_ivf_semenanalysisreport_Homogenosity" type="text/html"><?php echo $ivf_semenanalysisreport_view->Homogenosity->caption() ?></script></span></td>
		<td data-name="Homogenosity" <?php echo $ivf_semenanalysisreport_view->Homogenosity->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Homogenosity" type="text/html"><span id="el_ivf_semenanalysisreport_Homogenosity">
<span<?php echo $ivf_semenanalysisreport_view->Homogenosity->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Homogenosity->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->CompleteSample->Visible) { // CompleteSample ?>
	<tr id="r_CompleteSample">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CompleteSample"><script id="tpc_ivf_semenanalysisreport_CompleteSample" type="text/html"><?php echo $ivf_semenanalysisreport_view->CompleteSample->caption() ?></script></span></td>
		<td data-name="CompleteSample" <?php echo $ivf_semenanalysisreport_view->CompleteSample->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CompleteSample" type="text/html"><span id="el_ivf_semenanalysisreport_CompleteSample">
<span<?php echo $ivf_semenanalysisreport_view->CompleteSample->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->CompleteSample->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<tr id="r_Liquefactiontime">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Liquefactiontime"><script id="tpc_ivf_semenanalysisreport_Liquefactiontime" type="text/html"><?php echo $ivf_semenanalysisreport_view->Liquefactiontime->caption() ?></script></span></td>
		<td data-name="Liquefactiontime" <?php echo $ivf_semenanalysisreport_view->Liquefactiontime->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Liquefactiontime" type="text/html"><span id="el_ivf_semenanalysisreport_Liquefactiontime">
<span<?php echo $ivf_semenanalysisreport_view->Liquefactiontime->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Liquefactiontime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Normal->Visible) { // Normal ?>
	<tr id="r_Normal">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Normal"><script id="tpc_ivf_semenanalysisreport_Normal" type="text/html"><?php echo $ivf_semenanalysisreport_view->Normal->caption() ?></script></span></td>
		<td data-name="Normal" <?php echo $ivf_semenanalysisreport_view->Normal->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Normal" type="text/html"><span id="el_ivf_semenanalysisreport_Normal">
<span<?php echo $ivf_semenanalysisreport_view->Normal->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Normal->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Abnormal->Visible) { // Abnormal ?>
	<tr id="r_Abnormal">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Abnormal"><script id="tpc_ivf_semenanalysisreport_Abnormal" type="text/html"><?php echo $ivf_semenanalysisreport_view->Abnormal->caption() ?></script></span></td>
		<td data-name="Abnormal" <?php echo $ivf_semenanalysisreport_view->Abnormal->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Abnormal" type="text/html"><span id="el_ivf_semenanalysisreport_Abnormal">
<span<?php echo $ivf_semenanalysisreport_view->Abnormal->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Abnormal->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Headdefects->Visible) { // Headdefects ?>
	<tr id="r_Headdefects">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Headdefects"><script id="tpc_ivf_semenanalysisreport_Headdefects" type="text/html"><?php echo $ivf_semenanalysisreport_view->Headdefects->caption() ?></script></span></td>
		<td data-name="Headdefects" <?php echo $ivf_semenanalysisreport_view->Headdefects->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Headdefects" type="text/html"><span id="el_ivf_semenanalysisreport_Headdefects">
<span<?php echo $ivf_semenanalysisreport_view->Headdefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Headdefects->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<tr id="r_MidpieceDefects">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_MidpieceDefects"><script id="tpc_ivf_semenanalysisreport_MidpieceDefects" type="text/html"><?php echo $ivf_semenanalysisreport_view->MidpieceDefects->caption() ?></script></span></td>
		<td data-name="MidpieceDefects" <?php echo $ivf_semenanalysisreport_view->MidpieceDefects->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_MidpieceDefects" type="text/html"><span id="el_ivf_semenanalysisreport_MidpieceDefects">
<span<?php echo $ivf_semenanalysisreport_view->MidpieceDefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->MidpieceDefects->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->TailDefects->Visible) { // TailDefects ?>
	<tr id="r_TailDefects">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TailDefects"><script id="tpc_ivf_semenanalysisreport_TailDefects" type="text/html"><?php echo $ivf_semenanalysisreport_view->TailDefects->caption() ?></script></span></td>
		<td data-name="TailDefects" <?php echo $ivf_semenanalysisreport_view->TailDefects->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TailDefects" type="text/html"><span id="el_ivf_semenanalysisreport_TailDefects">
<span<?php echo $ivf_semenanalysisreport_view->TailDefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->TailDefects->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<tr id="r_NormalProgMotile">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NormalProgMotile"><script id="tpc_ivf_semenanalysisreport_NormalProgMotile" type="text/html"><?php echo $ivf_semenanalysisreport_view->NormalProgMotile->caption() ?></script></span></td>
		<td data-name="NormalProgMotile" <?php echo $ivf_semenanalysisreport_view->NormalProgMotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NormalProgMotile" type="text/html"><span id="el_ivf_semenanalysisreport_NormalProgMotile">
<span<?php echo $ivf_semenanalysisreport_view->NormalProgMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->NormalProgMotile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->ImmatureForms->Visible) { // ImmatureForms ?>
	<tr id="r_ImmatureForms">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ImmatureForms"><script id="tpc_ivf_semenanalysisreport_ImmatureForms" type="text/html"><?php echo $ivf_semenanalysisreport_view->ImmatureForms->caption() ?></script></span></td>
		<td data-name="ImmatureForms" <?php echo $ivf_semenanalysisreport_view->ImmatureForms->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ImmatureForms" type="text/html"><span id="el_ivf_semenanalysisreport_ImmatureForms">
<span<?php echo $ivf_semenanalysisreport_view->ImmatureForms->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->ImmatureForms->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Leucocytes->Visible) { // Leucocytes ?>
	<tr id="r_Leucocytes">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Leucocytes"><script id="tpc_ivf_semenanalysisreport_Leucocytes" type="text/html"><?php echo $ivf_semenanalysisreport_view->Leucocytes->caption() ?></script></span></td>
		<td data-name="Leucocytes" <?php echo $ivf_semenanalysisreport_view->Leucocytes->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Leucocytes" type="text/html"><span id="el_ivf_semenanalysisreport_Leucocytes">
<span<?php echo $ivf_semenanalysisreport_view->Leucocytes->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Leucocytes->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Agglutination->Visible) { // Agglutination ?>
	<tr id="r_Agglutination">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Agglutination"><script id="tpc_ivf_semenanalysisreport_Agglutination" type="text/html"><?php echo $ivf_semenanalysisreport_view->Agglutination->caption() ?></script></span></td>
		<td data-name="Agglutination" <?php echo $ivf_semenanalysisreport_view->Agglutination->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Agglutination" type="text/html"><span id="el_ivf_semenanalysisreport_Agglutination">
<span<?php echo $ivf_semenanalysisreport_view->Agglutination->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Agglutination->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Debris->Visible) { // Debris ?>
	<tr id="r_Debris">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Debris"><script id="tpc_ivf_semenanalysisreport_Debris" type="text/html"><?php echo $ivf_semenanalysisreport_view->Debris->caption() ?></script></span></td>
		<td data-name="Debris" <?php echo $ivf_semenanalysisreport_view->Debris->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Debris" type="text/html"><span id="el_ivf_semenanalysisreport_Debris">
<span<?php echo $ivf_semenanalysisreport_view->Debris->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Debris->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Diagnosis->Visible) { // Diagnosis ?>
	<tr id="r_Diagnosis">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Diagnosis"><script id="tpc_ivf_semenanalysisreport_Diagnosis" type="text/html"><?php echo $ivf_semenanalysisreport_view->Diagnosis->caption() ?></script></span></td>
		<td data-name="Diagnosis" <?php echo $ivf_semenanalysisreport_view->Diagnosis->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Diagnosis" type="text/html"><span id="el_ivf_semenanalysisreport_Diagnosis">
<span<?php echo $ivf_semenanalysisreport_view->Diagnosis->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Diagnosis->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Observations->Visible) { // Observations ?>
	<tr id="r_Observations">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Observations"><script id="tpc_ivf_semenanalysisreport_Observations" type="text/html"><?php echo $ivf_semenanalysisreport_view->Observations->caption() ?></script></span></td>
		<td data-name="Observations" <?php echo $ivf_semenanalysisreport_view->Observations->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Observations" type="text/html"><span id="el_ivf_semenanalysisreport_Observations">
<span<?php echo $ivf_semenanalysisreport_view->Observations->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Observations->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Signature->Visible) { // Signature ?>
	<tr id="r_Signature">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Signature"><script id="tpc_ivf_semenanalysisreport_Signature" type="text/html"><?php echo $ivf_semenanalysisreport_view->Signature->caption() ?></script></span></td>
		<td data-name="Signature" <?php echo $ivf_semenanalysisreport_view->Signature->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Signature" type="text/html"><span id="el_ivf_semenanalysisreport_Signature">
<span<?php echo $ivf_semenanalysisreport_view->Signature->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Signature->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->SemenOrgin->Visible) { // SemenOrgin ?>
	<tr id="r_SemenOrgin">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_SemenOrgin"><script id="tpc_ivf_semenanalysisreport_SemenOrgin" type="text/html"><?php echo $ivf_semenanalysisreport_view->SemenOrgin->caption() ?></script></span></td>
		<td data-name="SemenOrgin" <?php echo $ivf_semenanalysisreport_view->SemenOrgin->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_SemenOrgin" type="text/html"><span id="el_ivf_semenanalysisreport_SemenOrgin">
<span<?php echo $ivf_semenanalysisreport_view->SemenOrgin->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->SemenOrgin->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Donor->Visible) { // Donor ?>
	<tr id="r_Donor">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Donor"><script id="tpc_ivf_semenanalysisreport_Donor" type="text/html"><?php echo $ivf_semenanalysisreport_view->Donor->caption() ?></script></span></td>
		<td data-name="Donor" <?php echo $ivf_semenanalysisreport_view->Donor->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Donor" type="text/html"><span id="el_ivf_semenanalysisreport_Donor">
<span<?php echo $ivf_semenanalysisreport_view->Donor->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Donor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<tr id="r_DonorBloodgroup">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DonorBloodgroup"><script id="tpc_ivf_semenanalysisreport_DonorBloodgroup" type="text/html"><?php echo $ivf_semenanalysisreport_view->DonorBloodgroup->caption() ?></script></span></td>
		<td data-name="DonorBloodgroup" <?php echo $ivf_semenanalysisreport_view->DonorBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DonorBloodgroup" type="text/html"><span id="el_ivf_semenanalysisreport_DonorBloodgroup">
<span<?php echo $ivf_semenanalysisreport_view->DonorBloodgroup->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->DonorBloodgroup->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Tank->Visible) { // Tank ?>
	<tr id="r_Tank">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Tank"><script id="tpc_ivf_semenanalysisreport_Tank" type="text/html"><?php echo $ivf_semenanalysisreport_view->Tank->caption() ?></script></span></td>
		<td data-name="Tank" <?php echo $ivf_semenanalysisreport_view->Tank->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Tank" type="text/html"><span id="el_ivf_semenanalysisreport_Tank">
<span<?php echo $ivf_semenanalysisreport_view->Tank->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Tank->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Location->Visible) { // Location ?>
	<tr id="r_Location">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Location"><script id="tpc_ivf_semenanalysisreport_Location" type="text/html"><?php echo $ivf_semenanalysisreport_view->Location->caption() ?></script></span></td>
		<td data-name="Location" <?php echo $ivf_semenanalysisreport_view->Location->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Location" type="text/html"><span id="el_ivf_semenanalysisreport_Location">
<span<?php echo $ivf_semenanalysisreport_view->Location->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Location->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Volume1->Visible) { // Volume1 ?>
	<tr id="r_Volume1">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Volume1"><script id="tpc_ivf_semenanalysisreport_Volume1" type="text/html"><?php echo $ivf_semenanalysisreport_view->Volume1->caption() ?></script></span></td>
		<td data-name="Volume1" <?php echo $ivf_semenanalysisreport_view->Volume1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Volume1" type="text/html"><span id="el_ivf_semenanalysisreport_Volume1">
<span<?php echo $ivf_semenanalysisreport_view->Volume1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Volume1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Concentration1->Visible) { // Concentration1 ?>
	<tr id="r_Concentration1">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Concentration1"><script id="tpc_ivf_semenanalysisreport_Concentration1" type="text/html"><?php echo $ivf_semenanalysisreport_view->Concentration1->caption() ?></script></span></td>
		<td data-name="Concentration1" <?php echo $ivf_semenanalysisreport_view->Concentration1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Concentration1" type="text/html"><span id="el_ivf_semenanalysisreport_Concentration1">
<span<?php echo $ivf_semenanalysisreport_view->Concentration1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Concentration1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Total1->Visible) { // Total1 ?>
	<tr id="r_Total1">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Total1"><script id="tpc_ivf_semenanalysisreport_Total1" type="text/html"><?php echo $ivf_semenanalysisreport_view->Total1->caption() ?></script></span></td>
		<td data-name="Total1" <?php echo $ivf_semenanalysisreport_view->Total1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Total1" type="text/html"><span id="el_ivf_semenanalysisreport_Total1">
<span<?php echo $ivf_semenanalysisreport_view->Total1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Total1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<tr id="r_ProgressiveMotility1">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility1"><script id="tpc_ivf_semenanalysisreport_ProgressiveMotility1" type="text/html"><?php echo $ivf_semenanalysisreport_view->ProgressiveMotility1->caption() ?></script></span></td>
		<td data-name="ProgressiveMotility1" <?php echo $ivf_semenanalysisreport_view->ProgressiveMotility1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProgressiveMotility1" type="text/html"><span id="el_ivf_semenanalysisreport_ProgressiveMotility1">
<span<?php echo $ivf_semenanalysisreport_view->ProgressiveMotility1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->ProgressiveMotility1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<tr id="r_NonProgrssiveMotile1">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1"><script id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile1" type="text/html"><?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile1->caption() ?></script></span></td>
		<td data-name="NonProgrssiveMotile1" <?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile1" type="text/html"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Immotile1->Visible) { // Immotile1 ?>
	<tr id="r_Immotile1">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Immotile1"><script id="tpc_ivf_semenanalysisreport_Immotile1" type="text/html"><?php echo $ivf_semenanalysisreport_view->Immotile1->caption() ?></script></span></td>
		<td data-name="Immotile1" <?php echo $ivf_semenanalysisreport_view->Immotile1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Immotile1" type="text/html"><span id="el_ivf_semenanalysisreport_Immotile1">
<span<?php echo $ivf_semenanalysisreport_view->Immotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Immotile1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<tr id="r_TotalProgrssiveMotile1">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1"><script id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile1" type="text/html"><?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile1->caption() ?></script></span></td>
		<td data-name="TotalProgrssiveMotile1" <?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile1" type="text/html"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TidNo"><script id="tpc_ivf_semenanalysisreport_TidNo" type="text/html"><?php echo $ivf_semenanalysisreport_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $ivf_semenanalysisreport_view->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TidNo" type="text/html"><span id="el_ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport_view->TidNo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Color->Visible) { // Color ?>
	<tr id="r_Color">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Color"><script id="tpc_ivf_semenanalysisreport_Color" type="text/html"><?php echo $ivf_semenanalysisreport_view->Color->caption() ?></script></span></td>
		<td data-name="Color" <?php echo $ivf_semenanalysisreport_view->Color->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Color" type="text/html"><span id="el_ivf_semenanalysisreport_Color">
<span<?php echo $ivf_semenanalysisreport_view->Color->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Color->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->DoneBy->Visible) { // DoneBy ?>
	<tr id="r_DoneBy">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DoneBy"><script id="tpc_ivf_semenanalysisreport_DoneBy" type="text/html"><?php echo $ivf_semenanalysisreport_view->DoneBy->caption() ?></script></span></td>
		<td data-name="DoneBy" <?php echo $ivf_semenanalysisreport_view->DoneBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DoneBy" type="text/html"><span id="el_ivf_semenanalysisreport_DoneBy">
<span<?php echo $ivf_semenanalysisreport_view->DoneBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->DoneBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Method"><script id="tpc_ivf_semenanalysisreport_Method" type="text/html"><?php echo $ivf_semenanalysisreport_view->Method->caption() ?></script></span></td>
		<td data-name="Method" <?php echo $ivf_semenanalysisreport_view->Method->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Method" type="text/html"><span id="el_ivf_semenanalysisreport_Method">
<span<?php echo $ivf_semenanalysisreport_view->Method->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Method->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Abstinence->Visible) { // Abstinence ?>
	<tr id="r_Abstinence">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Abstinence"><script id="tpc_ivf_semenanalysisreport_Abstinence" type="text/html"><?php echo $ivf_semenanalysisreport_view->Abstinence->caption() ?></script></span></td>
		<td data-name="Abstinence" <?php echo $ivf_semenanalysisreport_view->Abstinence->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Abstinence" type="text/html"><span id="el_ivf_semenanalysisreport_Abstinence">
<span<?php echo $ivf_semenanalysisreport_view->Abstinence->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Abstinence->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->ProcessedBy->Visible) { // ProcessedBy ?>
	<tr id="r_ProcessedBy">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProcessedBy"><script id="tpc_ivf_semenanalysisreport_ProcessedBy" type="text/html"><?php echo $ivf_semenanalysisreport_view->ProcessedBy->caption() ?></script></span></td>
		<td data-name="ProcessedBy" <?php echo $ivf_semenanalysisreport_view->ProcessedBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProcessedBy" type="text/html"><span id="el_ivf_semenanalysisreport_ProcessedBy">
<span<?php echo $ivf_semenanalysisreport_view->ProcessedBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->ProcessedBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->InseminationTime->Visible) { // InseminationTime ?>
	<tr id="r_InseminationTime">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_InseminationTime"><script id="tpc_ivf_semenanalysisreport_InseminationTime" type="text/html"><?php echo $ivf_semenanalysisreport_view->InseminationTime->caption() ?></script></span></td>
		<td data-name="InseminationTime" <?php echo $ivf_semenanalysisreport_view->InseminationTime->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_InseminationTime" type="text/html"><span id="el_ivf_semenanalysisreport_InseminationTime">
<span<?php echo $ivf_semenanalysisreport_view->InseminationTime->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->InseminationTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->InseminationBy->Visible) { // InseminationBy ?>
	<tr id="r_InseminationBy">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_InseminationBy"><script id="tpc_ivf_semenanalysisreport_InseminationBy" type="text/html"><?php echo $ivf_semenanalysisreport_view->InseminationBy->caption() ?></script></span></td>
		<td data-name="InseminationBy" <?php echo $ivf_semenanalysisreport_view->InseminationBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_InseminationBy" type="text/html"><span id="el_ivf_semenanalysisreport_InseminationBy">
<span<?php echo $ivf_semenanalysisreport_view->InseminationBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->InseminationBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Big->Visible) { // Big ?>
	<tr id="r_Big">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Big"><script id="tpc_ivf_semenanalysisreport_Big" type="text/html"><?php echo $ivf_semenanalysisreport_view->Big->caption() ?></script></span></td>
		<td data-name="Big" <?php echo $ivf_semenanalysisreport_view->Big->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Big" type="text/html"><span id="el_ivf_semenanalysisreport_Big">
<span<?php echo $ivf_semenanalysisreport_view->Big->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Big->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Medium->Visible) { // Medium ?>
	<tr id="r_Medium">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Medium"><script id="tpc_ivf_semenanalysisreport_Medium" type="text/html"><?php echo $ivf_semenanalysisreport_view->Medium->caption() ?></script></span></td>
		<td data-name="Medium" <?php echo $ivf_semenanalysisreport_view->Medium->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Medium" type="text/html"><span id="el_ivf_semenanalysisreport_Medium">
<span<?php echo $ivf_semenanalysisreport_view->Medium->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Medium->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Small->Visible) { // Small ?>
	<tr id="r_Small">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Small"><script id="tpc_ivf_semenanalysisreport_Small" type="text/html"><?php echo $ivf_semenanalysisreport_view->Small->caption() ?></script></span></td>
		<td data-name="Small" <?php echo $ivf_semenanalysisreport_view->Small->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Small" type="text/html"><span id="el_ivf_semenanalysisreport_Small">
<span<?php echo $ivf_semenanalysisreport_view->Small->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Small->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->NoHalo->Visible) { // NoHalo ?>
	<tr id="r_NoHalo">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NoHalo"><script id="tpc_ivf_semenanalysisreport_NoHalo" type="text/html"><?php echo $ivf_semenanalysisreport_view->NoHalo->caption() ?></script></span></td>
		<td data-name="NoHalo" <?php echo $ivf_semenanalysisreport_view->NoHalo->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NoHalo" type="text/html"><span id="el_ivf_semenanalysisreport_NoHalo">
<span<?php echo $ivf_semenanalysisreport_view->NoHalo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->NoHalo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Fragmented->Visible) { // Fragmented ?>
	<tr id="r_Fragmented">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Fragmented"><script id="tpc_ivf_semenanalysisreport_Fragmented" type="text/html"><?php echo $ivf_semenanalysisreport_view->Fragmented->caption() ?></script></span></td>
		<td data-name="Fragmented" <?php echo $ivf_semenanalysisreport_view->Fragmented->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Fragmented" type="text/html"><span id="el_ivf_semenanalysisreport_Fragmented">
<span<?php echo $ivf_semenanalysisreport_view->Fragmented->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Fragmented->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->NonFragmented->Visible) { // NonFragmented ?>
	<tr id="r_NonFragmented">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonFragmented"><script id="tpc_ivf_semenanalysisreport_NonFragmented" type="text/html"><?php echo $ivf_semenanalysisreport_view->NonFragmented->caption() ?></script></span></td>
		<td data-name="NonFragmented" <?php echo $ivf_semenanalysisreport_view->NonFragmented->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonFragmented" type="text/html"><span id="el_ivf_semenanalysisreport_NonFragmented">
<span<?php echo $ivf_semenanalysisreport_view->NonFragmented->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->NonFragmented->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->DFI->Visible) { // DFI ?>
	<tr id="r_DFI">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DFI"><script id="tpc_ivf_semenanalysisreport_DFI" type="text/html"><?php echo $ivf_semenanalysisreport_view->DFI->caption() ?></script></span></td>
		<td data-name="DFI" <?php echo $ivf_semenanalysisreport_view->DFI->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DFI" type="text/html"><span id="el_ivf_semenanalysisreport_DFI">
<span<?php echo $ivf_semenanalysisreport_view->DFI->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->DFI->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->IsueBy->Visible) { // IsueBy ?>
	<tr id="r_IsueBy">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IsueBy"><script id="tpc_ivf_semenanalysisreport_IsueBy" type="text/html"><?php echo $ivf_semenanalysisreport_view->IsueBy->caption() ?></script></span></td>
		<td data-name="IsueBy" <?php echo $ivf_semenanalysisreport_view->IsueBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IsueBy" type="text/html"><span id="el_ivf_semenanalysisreport_IsueBy">
<span<?php echo $ivf_semenanalysisreport_view->IsueBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->IsueBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Volume2->Visible) { // Volume2 ?>
	<tr id="r_Volume2">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Volume2"><script id="tpc_ivf_semenanalysisreport_Volume2" type="text/html"><?php echo $ivf_semenanalysisreport_view->Volume2->caption() ?></script></span></td>
		<td data-name="Volume2" <?php echo $ivf_semenanalysisreport_view->Volume2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Volume2" type="text/html"><span id="el_ivf_semenanalysisreport_Volume2">
<span<?php echo $ivf_semenanalysisreport_view->Volume2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Volume2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Concentration2->Visible) { // Concentration2 ?>
	<tr id="r_Concentration2">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Concentration2"><script id="tpc_ivf_semenanalysisreport_Concentration2" type="text/html"><?php echo $ivf_semenanalysisreport_view->Concentration2->caption() ?></script></span></td>
		<td data-name="Concentration2" <?php echo $ivf_semenanalysisreport_view->Concentration2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Concentration2" type="text/html"><span id="el_ivf_semenanalysisreport_Concentration2">
<span<?php echo $ivf_semenanalysisreport_view->Concentration2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Concentration2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Total2->Visible) { // Total2 ?>
	<tr id="r_Total2">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Total2"><script id="tpc_ivf_semenanalysisreport_Total2" type="text/html"><?php echo $ivf_semenanalysisreport_view->Total2->caption() ?></script></span></td>
		<td data-name="Total2" <?php echo $ivf_semenanalysisreport_view->Total2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Total2" type="text/html"><span id="el_ivf_semenanalysisreport_Total2">
<span<?php echo $ivf_semenanalysisreport_view->Total2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Total2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<tr id="r_ProgressiveMotility2">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility2"><script id="tpc_ivf_semenanalysisreport_ProgressiveMotility2" type="text/html"><?php echo $ivf_semenanalysisreport_view->ProgressiveMotility2->caption() ?></script></span></td>
		<td data-name="ProgressiveMotility2" <?php echo $ivf_semenanalysisreport_view->ProgressiveMotility2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProgressiveMotility2" type="text/html"><span id="el_ivf_semenanalysisreport_ProgressiveMotility2">
<span<?php echo $ivf_semenanalysisreport_view->ProgressiveMotility2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->ProgressiveMotility2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<tr id="r_NonProgrssiveMotile2">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2"><script id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile2" type="text/html"><?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile2->caption() ?></script></span></td>
		<td data-name="NonProgrssiveMotile2" <?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile2" type="text/html"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->NonProgrssiveMotile2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->Immotile2->Visible) { // Immotile2 ?>
	<tr id="r_Immotile2">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Immotile2"><script id="tpc_ivf_semenanalysisreport_Immotile2" type="text/html"><?php echo $ivf_semenanalysisreport_view->Immotile2->caption() ?></script></span></td>
		<td data-name="Immotile2" <?php echo $ivf_semenanalysisreport_view->Immotile2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Immotile2" type="text/html"><span id="el_ivf_semenanalysisreport_Immotile2">
<span<?php echo $ivf_semenanalysisreport_view->Immotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->Immotile2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<tr id="r_TotalProgrssiveMotile2">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2"><script id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile2" type="text/html"><?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile2->caption() ?></script></span></td>
		<td data-name="TotalProgrssiveMotile2" <?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile2" type="text/html"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->TotalProgrssiveMotile2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->MACS->Visible) { // MACS ?>
	<tr id="r_MACS">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_MACS"><script id="tpc_ivf_semenanalysisreport_MACS" type="text/html"><?php echo $ivf_semenanalysisreport_view->MACS->caption() ?></script></span></td>
		<td data-name="MACS" <?php echo $ivf_semenanalysisreport_view->MACS->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_MACS" type="text/html"><span id="el_ivf_semenanalysisreport_MACS">
<span<?php echo $ivf_semenanalysisreport_view->MACS->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->MACS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->IssuedBy->Visible) { // IssuedBy ?>
	<tr id="r_IssuedBy">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IssuedBy"><script id="tpc_ivf_semenanalysisreport_IssuedBy" type="text/html"><?php echo $ivf_semenanalysisreport_view->IssuedBy->caption() ?></script></span></td>
		<td data-name="IssuedBy" <?php echo $ivf_semenanalysisreport_view->IssuedBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IssuedBy" type="text/html"><span id="el_ivf_semenanalysisreport_IssuedBy">
<span<?php echo $ivf_semenanalysisreport_view->IssuedBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->IssuedBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->IssuedTo->Visible) { // IssuedTo ?>
	<tr id="r_IssuedTo">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IssuedTo"><script id="tpc_ivf_semenanalysisreport_IssuedTo" type="text/html"><?php echo $ivf_semenanalysisreport_view->IssuedTo->caption() ?></script></span></td>
		<td data-name="IssuedTo" <?php echo $ivf_semenanalysisreport_view->IssuedTo->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IssuedTo" type="text/html"><span id="el_ivf_semenanalysisreport_IssuedTo">
<span<?php echo $ivf_semenanalysisreport_view->IssuedTo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->IssuedTo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->PaID->Visible) { // PaID ?>
	<tr id="r_PaID">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PaID"><script id="tpc_ivf_semenanalysisreport_PaID" type="text/html"><?php echo $ivf_semenanalysisreport_view->PaID->caption() ?></script></span></td>
		<td data-name="PaID" <?php echo $ivf_semenanalysisreport_view->PaID->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PaID" type="text/html"><span id="el_ivf_semenanalysisreport_PaID">
<span<?php echo $ivf_semenanalysisreport_view->PaID->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->PaID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->PaName->Visible) { // PaName ?>
	<tr id="r_PaName">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PaName"><script id="tpc_ivf_semenanalysisreport_PaName" type="text/html"><?php echo $ivf_semenanalysisreport_view->PaName->caption() ?></script></span></td>
		<td data-name="PaName" <?php echo $ivf_semenanalysisreport_view->PaName->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PaName" type="text/html"><span id="el_ivf_semenanalysisreport_PaName">
<span<?php echo $ivf_semenanalysisreport_view->PaName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->PaName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->PaMobile->Visible) { // PaMobile ?>
	<tr id="r_PaMobile">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PaMobile"><script id="tpc_ivf_semenanalysisreport_PaMobile" type="text/html"><?php echo $ivf_semenanalysisreport_view->PaMobile->caption() ?></script></span></td>
		<td data-name="PaMobile" <?php echo $ivf_semenanalysisreport_view->PaMobile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PaMobile" type="text/html"><span id="el_ivf_semenanalysisreport_PaMobile">
<span<?php echo $ivf_semenanalysisreport_view->PaMobile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->PaMobile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->PartnerID->Visible) { // PartnerID ?>
	<tr id="r_PartnerID">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PartnerID"><script id="tpc_ivf_semenanalysisreport_PartnerID" type="text/html"><?php echo $ivf_semenanalysisreport_view->PartnerID->caption() ?></script></span></td>
		<td data-name="PartnerID" <?php echo $ivf_semenanalysisreport_view->PartnerID->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PartnerID" type="text/html"><span id="el_ivf_semenanalysisreport_PartnerID">
<span<?php echo $ivf_semenanalysisreport_view->PartnerID->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->PartnerID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PartnerName"><script id="tpc_ivf_semenanalysisreport_PartnerName" type="text/html"><?php echo $ivf_semenanalysisreport_view->PartnerName->caption() ?></script></span></td>
		<td data-name="PartnerName" <?php echo $ivf_semenanalysisreport_view->PartnerName->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PartnerName" type="text/html"><span id="el_ivf_semenanalysisreport_PartnerName">
<span<?php echo $ivf_semenanalysisreport_view->PartnerName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->PartnerName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->PartnerMobile->Visible) { // PartnerMobile ?>
	<tr id="r_PartnerMobile">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PartnerMobile"><script id="tpc_ivf_semenanalysisreport_PartnerMobile" type="text/html"><?php echo $ivf_semenanalysisreport_view->PartnerMobile->caption() ?></script></span></td>
		<td data-name="PartnerMobile" <?php echo $ivf_semenanalysisreport_view->PartnerMobile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PartnerMobile" type="text/html"><span id="el_ivf_semenanalysisreport_PartnerMobile">
<span<?php echo $ivf_semenanalysisreport_view->PartnerMobile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->PartnerMobile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<tr id="r_PREG_TEST_DATE">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PREG_TEST_DATE"><script id="tpc_ivf_semenanalysisreport_PREG_TEST_DATE" type="text/html"><?php echo $ivf_semenanalysisreport_view->PREG_TEST_DATE->caption() ?></script></span></td>
		<td data-name="PREG_TEST_DATE" <?php echo $ivf_semenanalysisreport_view->PREG_TEST_DATE->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PREG_TEST_DATE" type="text/html"><span id="el_ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?php echo $ivf_semenanalysisreport_view->PREG_TEST_DATE->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->PREG_TEST_DATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<tr id="r_SPECIFIC_PROBLEMS">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><script id="tpc_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" type="text/html"><?php echo $ivf_semenanalysisreport_view->SPECIFIC_PROBLEMS->caption() ?></script></span></td>
		<td data-name="SPECIFIC_PROBLEMS" <?php echo $ivf_semenanalysisreport_view->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" type="text/html"><span id="el_ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?php echo $ivf_semenanalysisreport_view->SPECIFIC_PROBLEMS->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->IMSC_1->Visible) { // IMSC_1 ?>
	<tr id="r_IMSC_1">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IMSC_1"><script id="tpc_ivf_semenanalysisreport_IMSC_1" type="text/html"><?php echo $ivf_semenanalysisreport_view->IMSC_1->caption() ?></script></span></td>
		<td data-name="IMSC_1" <?php echo $ivf_semenanalysisreport_view->IMSC_1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IMSC_1" type="text/html"><span id="el_ivf_semenanalysisreport_IMSC_1">
<span<?php echo $ivf_semenanalysisreport_view->IMSC_1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->IMSC_1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->IMSC_2->Visible) { // IMSC_2 ?>
	<tr id="r_IMSC_2">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IMSC_2"><script id="tpc_ivf_semenanalysisreport_IMSC_2" type="text/html"><?php echo $ivf_semenanalysisreport_view->IMSC_2->caption() ?></script></span></td>
		<td data-name="IMSC_2" <?php echo $ivf_semenanalysisreport_view->IMSC_2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IMSC_2" type="text/html"><span id="el_ivf_semenanalysisreport_IMSC_2">
<span<?php echo $ivf_semenanalysisreport_view->IMSC_2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->IMSC_2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<tr id="r_LIQUIFACTION_STORAGE">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><script id="tpc_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" type="text/html"><?php echo $ivf_semenanalysisreport_view->LIQUIFACTION_STORAGE->caption() ?></script></span></td>
		<td data-name="LIQUIFACTION_STORAGE" <?php echo $ivf_semenanalysisreport_view->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" type="text/html"><span id="el_ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?php echo $ivf_semenanalysisreport_view->LIQUIFACTION_STORAGE->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<tr id="r_IUI_PREP_METHOD">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD"><script id="tpc_ivf_semenanalysisreport_IUI_PREP_METHOD" type="text/html"><?php echo $ivf_semenanalysisreport_view->IUI_PREP_METHOD->caption() ?></script></span></td>
		<td data-name="IUI_PREP_METHOD" <?php echo $ivf_semenanalysisreport_view->IUI_PREP_METHOD->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IUI_PREP_METHOD" type="text/html"><span id="el_ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?php echo $ivf_semenanalysisreport_view->IUI_PREP_METHOD->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->IUI_PREP_METHOD->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<tr id="r_TIME_FROM_TRIGGER">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER"><script id="tpc_ivf_semenanalysisreport_TIME_FROM_TRIGGER" type="text/html"><?php echo $ivf_semenanalysisreport_view->TIME_FROM_TRIGGER->caption() ?></script></span></td>
		<td data-name="TIME_FROM_TRIGGER" <?php echo $ivf_semenanalysisreport_view->TIME_FROM_TRIGGER->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TIME_FROM_TRIGGER" type="text/html"><span id="el_ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?php echo $ivf_semenanalysisreport_view->TIME_FROM_TRIGGER->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<tr id="r_COLLECTION_TO_PREPARATION">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><script id="tpc_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" type="text/html"><?php echo $ivf_semenanalysisreport_view->COLLECTION_TO_PREPARATION->caption() ?></script></span></td>
		<td data-name="COLLECTION_TO_PREPARATION" <?php echo $ivf_semenanalysisreport_view->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" type="text/html"><span id="el_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?php echo $ivf_semenanalysisreport_view->COLLECTION_TO_PREPARATION->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenanalysisreport_view->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<tr id="r_TIME_FROM_PREP_TO_INSEM">
		<td class="<?php echo $ivf_semenanalysisreport_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><script id="tpc_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" type="text/html"><?php echo $ivf_semenanalysisreport_view->TIME_FROM_PREP_TO_INSEM->caption() ?></script></span></td>
		<td data-name="TIME_FROM_PREP_TO_INSEM" <?php echo $ivf_semenanalysisreport_view->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" type="text/html"><span id="el_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $ivf_semenanalysisreport_view->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_view->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_semenanalysisreportview" class="ew-custom-template"></div>
<script id="tpm_ivf_semenanalysisreportview" type="text/html">
<div id="ct_ivf_semenanalysisreport_view"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
.card-body {
	flex: 1 1 auto;
	padding: 0.25rem;
}
.ew-row {
	margin-bottom: 0.25rem;
}
.card {
	box-shadow: 0 0 1px rgba(0,0,0,0.125), 0 1px 3px rgba(0,0,0,0.2);
}
.border-right {
	border-right: 1px solid #ffc107 !important;
}
.mb-3, .small-box, .card, .info-box, .callout, .my-3 {
	margin-bottom: 0.1rem !important;
}
hr {
	margin-top: 0.1rem;
	margin-bottom: 0.21rem;
	border-right-style: initial;
	border-bottom-style: initial;
	border-left-style: initial;
	border-right-color: initial;
	border-bottom-color: initial;
	border-left-color: initial;
	border-width: 4px 0px 0px;
	border-image: initial;
	border-top: 2px solid rgba(0, 0, 0, 1);
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["id"] ;
$showmaster = $_GET["showmaster"] ;

//if( $showmaster=="ivf_treatment_plan")
//{

$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where id='".$Tid."'; ";
$results = $dbhelper->ExecuteRows($sql);
if($results[0]["RIDNo"] == null)
{
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["HusbandName"]."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["HusbandName"]."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
}else{
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNo"]."'; ";
	$results = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
}

//}else{
//$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
//$results = $dbhelper->ExecuteRows($sql);
//}
//$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
//$results1 = $dbhelper->ExecuteRows($sql);
//$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
//$results2 = $dbhelper->ExecuteRows($sql);

if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
?>	
<div class="row">
<div id="viewPatientInfo" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<div class="row">
<div class="col-sm-6 border-right">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
</div>
<div class="col-sm-6 border-right">
<?php
if($results[0]["CoupleID"] != '')
{
	echo '<font size="4" style="font-weight: bold;">Couple ID : </font>'. $results[0]["CoupleID"] ;
}
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
?>
</div>
</div>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
	<div class="row">
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
</div>
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
</div>
</div>
			  </div>
			  <div class="widget-user-image">
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-12 border-left">
					<div class="description-block">
					  <h5 class="description-header text-left"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div id="ViewPartnerInfo" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
	<div class="row">
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
</div>
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
</div>
</div>
			  </div>
			  <div class="widget-user-image">
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-12 border-right">
					<div class="description-block">
					  <h5 class="description-header text-left"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
 <div style="width:100%">
<font face = "courier" >
<font size="4" style="font-weight: bold;">
<div class="ew-row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:35%">  Semen Orgin</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_SemenOrgin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_SemenOrgin")/}} </td>
		</tr>
		<tr id="donorId">
			<td  style="width:35%">Donor</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Donor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Donor")/}}</td>
		</tr>
		<tr id="DonorBloodGroupId">
			<td  style="width:35%">Donor Bloodgroup</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_DonorBloodgroup"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_DonorBloodgroup")/}}</td>
		</tr>
	</tbody>
</table>
			</td>
			<td>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td  style="width:35%">Request Dr</td>
			<td>:</td>
			<td>{{:RequestDr}}</td>
		</tr>
	<tr>
			<td  style="width:35%">Collection Date</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_CollectionDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_CollectionDate")/}}</td>
		</tr>
		<tr>
			<td  style="width:35%">Result Date</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_ResultDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ResultDate")/}}</td>
		</tr>
	</tbody>
</table>
			</td>
		</tr>
	</tbody>
</table>
</div>
<table class="ew-table"  style="width:100%">
	 <tbody>
		<tr>
			<td style="width:15%"></td>
			<td  style="width:70%"><h2 id="SemenHeading" align="center">Semen Analysis</h2></td>
			<td  style="width:15%;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
<hr>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:40%">Request</td>
			<td>:</td>
			<td id="el_view_semenanalysis_RequestSample"><?php echo $Page->RequestSample->CurrentValue ?></td>
		</tr>
		<tr>
			<td style="width:40%">Collection Type</td>
			<td>:</td>
			<td>{{:CollectionType}}</td>
		</tr>
		<tr>
			<td style="width:40%">Collection Method</td>
			<td>:</td>
			<td>{{:CollectionMethod}}</td>
		</tr>
	</tbody>	
</table>							   
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:40%">Abstinence</td>
			<td style="width:5%">:</td>
			<td>{{:Abstinence}}</td>
		</tr>
		<tr>
			<td style="width:40%">Medication</td>
			<td style="width:5%">:</td>
			<td>{{:Medicationused}}</td>
		</tr>
		<tr>
			<td style="width:40%">Collection Difficulty</td>
			<td style="width:5%">:</td>
			<td>{{:DifficultiesinCollection}}</td>
		</tr>
	</tbody>	
</table>			
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Macroscopic Analysis</h3>
			</div>
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
		<td style="width:40%">p H</td>
		<td>:</td>
			<td>{{:pH}}>=7.2</td>
			<td></td>
		</tr>
		<tr>
		<td style="width:40%">Time of Collection</td>
		<td>:</td>
			<td>{{:Timeofcollection}}</td>
			<td></td>
		</tr>
		<tr>
		<td style="width:40%">Time of Examination</td>
		<td>:</td>
			<td>{{:Timeofexamination}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
		<td style="width:40%">Appearance</td>
		<td>:</td>
			<td >{{:Appearance}}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Color</td>
		<td>:</td>
			<td >{{:Color}}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Homogenosity</td>
		<td>:</td>
			<td >{{:Homogenosity}}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Complete Sample</td>
		<td>:</td>
			<td >{{:CompleteSample}}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Liquefaction Time</td>
		<td>:</td>
			<td >{{:Liquefactiontime}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Microscopic Analysis</h3>
			</div>
			<div class="card-body">
<div id="idMacs">				
	{{include tmpl="#tpc_ivf_semenanalysisreport_MACS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_MACS")/}}
</div>
<table id="capacitationTable" class="" align="left" border="0" cellpadding="1" cellspacing="1" style="width:60%">
<thead id="capacitationTableHead">
		<tr  style="background-color:#707B7C;color:white;" >
			<td></td>
			<td></td>
			<td id="PreCapacitation">Pre Capacitation</td>
			<td id="PostCapacitation">Post Capacitation</td>
			<td id="MaxCapacitation">MACS Capacitation</td>
			<td></td>
		</tr>
</thead>
	<tbody>
		<tr>
			<td>Volume (ml)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Volume"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Volume")/}}</td>
			<td id="Volume1">{{include tmpl="#tpc_ivf_semenanalysisreport_Volume1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Volume1")/}}</td>
			<td id="Volume2">{{include tmpl="#tpc_ivf_semenanalysisreport_Volume2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Volume2")/}}</td>
			<td>>=1.5ml</td>
		</tr>
		<tr>
			<td>Concentration (mill/ml)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Concentration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Concentration")/}}</td>
			<td  id="Concentration1">{{include tmpl="#tpc_ivf_semenanalysisreport_Concentration1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Concentration1")/}}</td>
			<td  id="Concentration2">{{include tmpl="#tpc_ivf_semenanalysisreport_Concentration2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Concentration2")/}}</td>
			<td>>= 15</td>
		</tr>
		<tr>
			<td>Total (mill/ejaculate)</td>
				<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Total"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Total")/}}</td>
			<td  id="Total1">{{include tmpl="#tpc_ivf_semenanalysisreport_Total1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Total1")/}}</td>
			<td  id="Total2">{{include tmpl="#tpc_ivf_semenanalysisreport_Total2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Total2")/}}</td>
			<td>>=39</td>
		</tr>
		<tr>
			<td>Progressive Motility (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_ProgressiveMotility"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ProgressiveMotility")/}}</td>
			<td  id="ProgressiveMotility1">{{include tmpl="#tpc_ivf_semenanalysisreport_ProgressiveMotility1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ProgressiveMotility1")/}}</td>
			<td  id="ProgressiveMotility2">{{include tmpl="#tpc_ivf_semenanalysisreport_ProgressiveMotility2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ProgressiveMotility2")/}}</td>
			<td>>=32%</td>
		</tr>
		<tr>
			<td>Non Progrssive Motile (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_NonProgrssiveMotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NonProgrssiveMotile")/}}</td>
			<td  id="NonProgrssiveMotile1">{{include tmpl="#tpc_ivf_semenanalysisreport_NonProgrssiveMotile1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NonProgrssiveMotile1")/}}</td>
			<td  id="NonProgrssiveMotile2">{{include tmpl="#tpc_ivf_semenanalysisreport_NonProgrssiveMotile2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NonProgrssiveMotile2")/}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Immotile (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Immotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Immotile")/}}</td>
			<td  id="Immotile1">{{include tmpl="#tpc_ivf_semenanalysisreport_Immotile1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Immotile1")/}}</td>
			<td  id="Immotile2">{{include tmpl="#tpc_ivf_semenanalysisreport_Immotile2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Immotile2")/}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Total Motility (%)</td>
				<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_TotalProgrssiveMotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_TotalProgrssiveMotile")/}}</td>
			<td  id="TotalProgrssiveMotile1">{{include tmpl="#tpc_ivf_semenanalysisreport_TotalProgrssiveMotile1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_TotalProgrssiveMotile1")/}}</td>
			<td  id="TotalProgrssiveMotile2">{{include tmpl="#tpc_ivf_semenanalysisreport_TotalProgrssiveMotile2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_TotalProgrssiveMotile2")/}}</td>
			<td>>=40% PR+NP</td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:40%">
	<tbody>
		<tr>
			<td >Normal</td>		
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_Normal"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Normal")/}}%</td>
			<td >>=4%</td>
		</tr>
		<tr>
			<td >Abnormal</td>
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_Abnormal"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Abnormal")/}}%</td>
			<td ></td>
		</tr>	
		<tr>
			<td >Head Defects</td>
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_Headdefects"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Headdefects")/}}%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Midpiece Defects</td>
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_MidpieceDefects"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_MidpieceDefects")/}}%</td>
			<td></td>
		</tr>
		<tr>
			<td >Tail Defects</td>
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_TailDefects"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_TailDefects")/}}%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Vitality(%)</td>
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_NormalProgMotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NormalProgMotile")/}}</td>
			<td>>=58%</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="ew-row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
	<tr>
			<td id="Method" style="font-size:120%;width:25%" >{{include tmpl="#tpc_ivf_semenanalysisreport_Method"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Method")/}}</td>
			<td ></td>
			<td ></td>
			<td style="width:10%">Agglutination</td>
			<td style="width:2%">:</td>
			<td >{{:Agglutination}}</td>
		</tr>
		<tr>
			<td style="width:25%">{{include tmpl="#tpc_ivf_semenanalysisreport_ImmatureForms"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ImmatureForms")/}}</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
		<tr>
			<td style="width:25%">{{include tmpl="#tpc_ivf_semenanalysisreport_Leucocytes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Leucocytes")/}}</td>
			<td style="width:35%">%   <1 mill/ml or 20/field </td>
			<td ></td>
			<td >Debris</td>
			<td style="width:2%">:</td>
			<td >{{:Debris}}</td>
		</tr>
	</tbody>
</table>
</div>
	<br />
<div style="font-size:120%" class="ew-row">
{{include tmpl="#tpc_ivf_semenanalysisreport_Diagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Diagnosis")/}}
</div>
	<br />
<div class="ew-row">
{{include tmpl="#tpc_ivf_semenanalysisreport_Observations"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Observations")/}}
</div>
<?php
$tt = "ewbarcode.php?data=".$Page->PaID->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>
<div class="ew-row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td id='Big' >{{include tmpl="#tpc_ivf_semenanalysisreport_Big"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Big")/}}</td>
			<td id='Medium' >{{include tmpl="#tpc_ivf_semenanalysisreport_Medium"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Medium")/}}</td>
			<td id='Small'>{{include tmpl="#tpc_ivf_semenanalysisreport_Small"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Small")/}}</td>
			<td id='NoHalo'>{{include tmpl="#tpc_ivf_semenanalysisreport_NoHalo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NoHalo")/}}</td>
		</tr>
		<tr>
			<td id='Fragmented'>{{include tmpl="#tpc_ivf_semenanalysisreport_Fragmented"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Fragmented")/}}</td>
			<td id='NonFragmented'>{{include tmpl="#tpc_ivf_semenanalysisreport_NonFragmented"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NonFragmented")/}}</td>
			<td id='DFI'>{{include tmpl="#tpc_ivf_semenanalysisreport_DFI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_DFI")/}}</td>
		</tr>
		<tr>		
		<tr>
			<td id='InseminationTime'></td>
			<td ></td>
			<td ></td>
			<td id='InseminationBy'></td>
		</tr>
		<tr>
			<td style="width:10%;"><img src='<?php echo $tt; ?>' alt style="border: 0;"></td>
			<td id='IsueBy'>{{include tmpl="#tpc_ivf_semenanalysisreport_IsueBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_IsueBy")/}}</td>
			<td ></td>
			<td >Andrologist Signature</td>
		</tr>	
	</tbody>
</table>
</div>
<div class="row" id="TankLocation">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Tank"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Tank")/}}</td>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Location"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Location")/}}</td>
		</tr>
	</tbody>
</table>
</div>
<div  style="font-size:100%">* Percentage respect to total number of abnormal spermatozoa </div>
<div style="font-size:80%">New reference values 17-01-2011: pursuant to the information published by WHO in the Human Reproduction Update, Vol.16, No3 pp. 231-245, 2010</div>
</div>
</script>
<script type="text/html" class="ivf_semenanalysisreportview_js">

		var OatientType = '<?php     $dbhelper = &DbHelper();
								$Tid = $_GET["id"] ;
								$showmaster = $_GET["showmaster"] ;
								$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where id='".$Tid."'; ";
								$results = $dbhelper->ExecuteRows($sql); echo $results[0]["RIDNo"];  ?>';
	if(OatientType == '')
	{
		document.getElementById("ViewPartnerInfo").style.display = "none";
		document.getElementById("viewPatientInfo").className = "col-md-12";
	}
		 document.getElementById("idMacs").style.visibility = "hidden";
	var e = document.getElementById("x_RequestSample");

//	var RequestSample = e.options[e.selectedIndex].value;
	var TankLocation = document.getElementById("TankLocation");
	var RequestSample = document.getElementById('el_view_semenanalysis_RequestSample').innerText;
	document.getElementById('SemenHeading').innerText = 'Spermiogram';
				if(RequestSample == "Freezing")
				{
					document.getElementById('SemenHeading').innerText = 'Semen Freezing';
					TankLocation.style.visibility = "hidden";
					document.getElementById("idMacs").style.display = "none";
				}else{
					TankLocation.style.visibility = "hidden";
				}
				var capacitationTable = document.getElementById("capacitationTable");
				if(RequestSample == "IUI processing")
				{
				document.getElementById('SemenHeading').innerText = 'INTRA UTERINE INSEMINATION';
					capacitationTable.style.width = "100%";
					 document.getElementById("Volume1").style.visibility = "visible";
					 document.getElementById("Concentration1").style.visibility = "visible";
					 document.getElementById("Total1").style.visibility = "visible";
					 document.getElementById("ProgressiveMotility1").style.visibility = "visible";
					 document.getElementById("NonProgrssiveMotile1").style.visibility = "visible";
					 document.getElementById("Immotile1").style.visibility = "visible";
					 document.getElementById("TotalProgrssiveMotile1").style.visibility = "visible";
					 document.getElementById("capacitationTableHead").style.visibility = "visible";
					 document.getElementById("PreCapacitation").innerText = "Pre Capacitation";
					document.getElementById("PostCapacitation").innerText = "Post Capacitation";
					document.getElementById("Big").style.visibility = "hidden";
					document.getElementById("Medium").style.visibility = "hidden";
					document.getElementById("Small").style.visibility = "hidden";
					document.getElementById("NoHalo").style.visibility = "hidden";
					document.getElementById("Fragmented").style.visibility = "hidden";
					document.getElementById("NonFragmented").style.visibility = "hidden";
					document.getElementById("DFI").style.visibility = "hidden";

					//document.getElementById("x_Volume1").style.width = "80px";
 				//	document.getElementById("x_Concentration1").style.width = "80px";
 				//	document.getElementById("x_Total1").style.width = "80px";
 				//	document.getElementById("x_ProgressiveMotility1").style.width = "80px";
 				//	document.getElementById("x_NonProgrssiveMotile1").style.width = "80px";
 				//	document.getElementById("x_Immotile1").style.width = "80px";
 				//	document.getElementById("x_TotalProgrssiveMotile1").style.width = "80px";

document.getElementById("MaxCapacitation").style.visibility = "hidden";
						 document.getElementById("MaxCapacitation").style.width = "0px";
						var MACS = document.getElementById('el_view_semenanalysis_MACS').innerText;
				if(MACS == "MACS")
				{
				  					 					 document.getElementById("Volume2").style.visibility = "visible";
					 document.getElementById("Concentration2").style.visibility = "visible";
					 document.getElementById("Total2").style.visibility = "visible";
					 document.getElementById("ProgressiveMotility2").style.visibility = "visible";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "visible";
					 document.getElementById("Immotile2").style.visibility = "visible";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "visible";
document.getElementById("MaxCapacitation").style.visibility = "visible";

					//document.getElementById("x_Volume2").style.width = "80px";
 				//	document.getElementById("x_Concentration2").style.width = "80px";
 				//	document.getElementById("x_Total2").style.width = "80px";
 				//	document.getElementById("x_ProgressiveMotility2").style.width = "80px";
 				//	document.getElementById("x_NonProgrssiveMotile2").style.width = "80px";
 				//	document.getElementById("x_Immotile2").style.width = "80px";
 				//	document.getElementById("x_TotalProgrssiveMotile2").style.width = "80px";

				}else{

				//	 document.getElementById("x_Volume2").style.width = "0px";
				//	 document.getElementById("x_Concentration2").style.width = "0px";
				//	 document.getElementById("x_Total2").style.width = "0px";
				//	 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
				//	 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
				//	 document.getElementById("x_Immotile2").style.width = "0px";
				//	 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";

					 document.getElementById("Volume2").style.visibility = "hidden";
					 document.getElementById("Concentration2").style.visibility = "hidden";
					 document.getElementById("Total2").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Immotile2").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
										 document.getElementById("Volume2").style.display = "none";
					document.getElementById("Concentration2").style.display = "none";
					document.getElementById("Total2").style.display = "none";
					document.getElementById("ProgressiveMotility2").style.display = "none";
					document.getElementById("NonProgrssiveMotile2").style.display = "hidnoneden";
					document.getElementById("Immotile2").style.display = "none";
					document.getElementById("TotalProgrssiveMotile2").style.display = "none";
					 document.getElementById("idMacs").style.display = "none";
				}
				}else{
					capacitationTable.style.width = "60%";
					document.getElementById("idMacs").style.display = "none";
					 document.getElementById("Volume1").style.visibility = "hidden";
					 document.getElementById("Concentration1").style.visibility = "hidden";
					 document.getElementById("Total1").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
					 document.getElementById("Immotile1").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
					 document.getElementById("capacitationTableHead").style.visibility = "hidden";
					 document.getElementById("PreCapacitation").innerText = "";
					 document.getElementById("PostCapacitation").innerText = "";

					 //document.getElementById("x_Volume1").style.width = "0px";
					 //document.getElementById("x_Concentration1").style.width = "0px";
					 //document.getElementById("x_Total1").style.width = "0px";
					 //document.getElementById("x_ProgressiveMotility1").style.width = "0px";
					 //document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
					 //document.getElementById("x_Immotile1").style.width = "0px";
					 //document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
					 //document.getElementById("x_Volume2").style.width = "0px";
					 //document.getElementById("x_Concentration2").style.width = "0px";
					 //document.getElementById("x_Total2").style.width = "0px";
					 //document.getElementById("x_ProgressiveMotility2").style.width = "0px";
					 //document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
					 //document.getElementById("x_Immotile2").style.width = "0px";
					 //document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";

					 document.getElementById("Volume2").style.visibility = "hidden";
					 document.getElementById("Concentration2").style.visibility = "hidden";
					 document.getElementById("Total2").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Immotile2").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Big").style.visibility = "hidden";
					 document.getElementById("Medium").style.visibility = "hidden";
					 document.getElementById("Small").style.visibility = "hidden";
					 document.getElementById("NoHalo").style.visibility = "hidden";
					 document.getElementById("Fragmented").style.visibility = "hidden";
					 document.getElementById("NonFragmented").style.visibility = "hidden";
					 document.getElementById("DFI").style.visibility = "hidden";
					 document.getElementById("InseminationTime").style.visibility = "hidden";
					 document.getElementById("InseminationBy").style.visibility = "hidden";
					 document.getElementById("IsueBy").style.visibility = "hidden";
	}
	if (RequestSample == "DFI") {
		document.getElementById('SemenHeading').innerText = 'DNA Framgmentation Index';
		document.getElementById("Big").style.visibility = "visible";
		document.getElementById("Medium").style.visibility = "visible";
		document.getElementById("Small").style.visibility = "visible";
		document.getElementById("NoHalo").style.visibility = "visible";
		document.getElementById("Fragmented").style.visibility = "visible";
		document.getElementById("NonFragmented").style.visibility = "visible";
		document.getElementById("DFI").style.visibility = "visible";
		document.getElementById("idMacs").style.display = "none";
	}
					var e = document.getElementById("x_SemenOrgin");

				//	var SemenOrgin = e.options[e.selectedIndex].value;
				var donorId = document.getElementById("donorId");
	var DonorBloodGroupId = document.getElementById("DonorBloodGroupId");
	var SemenOrgin = document.getElementById("el_view_semenanalysis_SemenOrgin").innerText;
				if(SemenOrgin == "Donor")
				{
					donorId.style.visibility = "hidden";
					DonorBloodGroupId.style.visibility = "visible";
				}else{
					donorId.style.visibility = "hidden";
					DonorBloodGroupId.style.visibility = "hidden";
				}
				if(capacitationTable.style.width == "60%")
				{
					document.getElementById("capacitationTableHead").style.display="none";
				}

</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_semenanalysisreport->Rows) ?> };
	ew.applyTemplate("tpd_ivf_semenanalysisreportview", "tpm_ivf_semenanalysisreportview", "ivf_semenanalysisreportview", "<?php echo $ivf_semenanalysisreport->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_semenanalysisreportview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_semenanalysisreport_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_semenanalysisreport_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("idMacs").style.visibility="hidden";var e=document.getElementById("x_RequestSample"),TankLocation=document.getElementById("TankLocation"),RequestSample=document.getElementById("el_view_semenanalysis_RequestSample").innerText;document.getElementById("SemenHeading").innerText="Spermiogram","Freezing"==RequestSample?(document.getElementById("idMacs").style.display="none",document.getElementById("SemenHeading").innerText="Semen Freezing",TankLocation.style.visibility="hidden"):TankLocation.style.visibility="hidden";var capacitationTable=document.getElementById("capacitationTable");if("IUI processing"==RequestSample){document.getElementById("SemenHeading").innerText="INTRA UTERINE INSEMINATION",capacitationTable.style.width="100%",document.getElementById("Volume1").style.visibility="visible",document.getElementById("Concentration1").style.visibility="visible",document.getElementById("Total1").style.visibility="visible",document.getElementById("ProgressiveMotility1").style.visibility="visible",document.getElementById("NonProgrssiveMotile1").style.visibility="visible",document.getElementById("Immotile1").style.visibility="visible",document.getElementById("TotalProgrssiveMotile1").style.visibility="visible",document.getElementById("capacitationTableHead").style.visibility="visible",document.getElementById("PreCapacitation").innerText="Pre Capacitation",document.getElementById("PostCapacitation").innerText="Post Capacitation",document.getElementById("Big").style.visibility="hidden",document.getElementById("Medium").style.visibility="hidden",document.getElementById("Small").style.visibility="hidden",document.getElementById("NoHalo").style.visibility="hidden",document.getElementById("Fragmented").style.visibility="hidden",document.getElementById("NonFragmented").style.visibility="hidden",document.getElementById("DFI").style.visibility="hidden",document.getElementById("Fragmented").style.display="none",document.getElementById("NonFragmented").style.display="none",document.getElementById("DFI").style.display="none",document.getElementById("IsueBy").style.visibility="hidden",document.getElementById("MaxCapacitation").style.visibility="hidden",document.getElementById("MaxCapacitation").style.width="0px";var MACS=document.getElementById("el_view_semenanalysis_MACS").innerText;"MACS"==MACS?(document.getElementById("Volume2").style.visibility="visible",document.getElementById("Concentration2").style.visibility="visible",document.getElementById("Total2").style.visibility="visible",document.getElementById("ProgressiveMotility2").style.visibility="visible",document.getElementById("NonProgrssiveMotile2").style.visibility="visible",document.getElementById("Immotile2").style.visibility="visible",document.getElementById("TotalProgrssiveMotile2").style.visibility="visible",document.getElementById("MaxCapacitation").style.visibility="visible"):(document.getElementById("Volume2").style.visibility="hidden",document.getElementById("Concentration2").style.visibility="hidden",document.getElementById("Total2").style.visibility="hidden",document.getElementById("ProgressiveMotility2").style.visibility="hidden",document.getElementById("NonProgrssiveMotile2").style.visibility="hidden",document.getElementById("Immotile2").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile2").style.visibility="hidden",document.getElementById("Volume2").style.display="none",document.getElementById("Concentration2").style.display="none",document.getElementById("Total2").style.display="none",document.getElementById("ProgressiveMotility2").style.display="none",document.getElementById("NonProgrssiveMotile2").style.display="hidnoneden",document.getElementById("Immotile2").style.display="none",document.getElementById("TotalProgrssiveMotile2").style.display="none",document.getElementById("idMacs").style.display="none")}else capacitationTable.style.width="60%",document.getElementById("Volume1").style.visibility="hidden",document.getElementById("Concentration1").style.visibility="hidden",document.getElementById("Total1").style.visibility="hidden",document.getElementById("ProgressiveMotility1").style.visibility="hidden",document.getElementById("NonProgrssiveMotile1").style.visibility="hidden",document.getElementById("Immotile1").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile1").style.visibility="hidden",document.getElementById("capacitationTableHead").style.visibility="hidden",document.getElementById("PreCapacitation").innerText="",document.getElementById("PostCapacitation").innerText="",document.getElementById("Volume2").style.visibility="hidden",document.getElementById("Concentration2").style.visibility="hidden",document.getElementById("Total2").style.visibility="hidden",document.getElementById("ProgressiveMotility2").style.visibility="hidden",document.getElementById("NonProgrssiveMotile2").style.visibility="hidden",document.getElementById("Immotile2").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile2").style.visibility="hidden",document.getElementById("Big").style.visibility="hidden",document.getElementById("Medium").style.visibility="hidden",document.getElementById("Small").style.visibility="hidden",document.getElementById("NoHalo").style.visibility="hidden",document.getElementById("Fragmented").style.visibility="hidden",document.getElementById("NonFragmented").style.visibility="hidden",document.getElementById("DFI").style.visibility="hidden",document.getElementById("InseminationTime").style.visibility="hidden",document.getElementById("InseminationBy").style.visibility="hidden",document.getElementById("IsueBy").style.visibility="hidden",document.getElementById("idMacs").style.display="none";"DFI"==RequestSample&&(document.getElementById("SemenHeading").innerText="DNA Framgmentation Index",document.getElementById("Big").style.visibility="visible",document.getElementById("Medium").style.visibility="visible",document.getElementById("Small").style.visibility="visible",document.getElementById("NoHalo").style.visibility="visible",document.getElementById("Fragmented").style.visibility="visible",document.getElementById("NonFragmented").style.visibility="visible",document.getElementById("DFI").style.visibility="visible",document.getElementById("idMacs").style.display="none");e=document.getElementById("x_SemenOrgin");var donorId=document.getElementById("donorId"),DonorBloodGroupId=document.getElementById("DonorBloodGroupId"),SemenOrgin=document.getElementById("el_view_semenanalysis_SemenOrgin").innerText;"Donor"==SemenOrgin?(donorId.style.visibility="visible",DonorBloodGroupId.style.visibility="visible"):(donorId.style.visibility="hidden",DonorBloodGroupId.style.visibility="hidden");
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_semenanalysisreport_view->terminate();
?>