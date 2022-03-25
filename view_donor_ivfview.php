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
$view_donor_ivf_view = new view_donor_ivf_view();

// Run the page
$view_donor_ivf_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_donor_ivf_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_donor_ivf->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_donor_ivfview = currentForm = new ew.Form("fview_donor_ivfview", "view");

// Form_CustomValidate event
fview_donor_ivfview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_donor_ivfview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_donor_ivfview.lists["x_Female"] = <?php echo $view_donor_ivf_view->Female->Lookup->toClientList() ?>;
fview_donor_ivfview.lists["x_Female"].options = <?php echo JsonEncode($view_donor_ivf_view->Female->lookupOptions()) ?>;
fview_donor_ivfview.lists["x_status"] = <?php echo $view_donor_ivf_view->status->Lookup->toClientList() ?>;
fview_donor_ivfview.lists["x_status"].options = <?php echo JsonEncode($view_donor_ivf_view->status->lookupOptions()) ?>;
fview_donor_ivfview.lists["x_ReferedBy"] = <?php echo $view_donor_ivf_view->ReferedBy->Lookup->toClientList() ?>;
fview_donor_ivfview.lists["x_ReferedBy"].options = <?php echo JsonEncode($view_donor_ivf_view->ReferedBy->lookupOptions()) ?>;
fview_donor_ivfview.lists["x_DrID"] = <?php echo $view_donor_ivf_view->DrID->Lookup->toClientList() ?>;
fview_donor_ivfview.lists["x_DrID"].options = <?php echo JsonEncode($view_donor_ivf_view->DrID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_donor_ivf->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_donor_ivf_view->ExportOptions->render("body") ?>
<?php $view_donor_ivf_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_donor_ivf_view->showPageHeader(); ?>
<?php
$view_donor_ivf_view->showMessage();
?>
<form name="fview_donor_ivfview" id="fview_donor_ivfview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_donor_ivf_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_donor_ivf_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_donor_ivf">
<input type="hidden" name="modal" value="<?php echo (int)$view_donor_ivf_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_donor_ivf->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_id"><script id="tpc_view_donor_ivf_id" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_donor_ivf->id->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_id" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_id">
<span<?php echo $view_donor_ivf->id->viewAttributes() ?>>
<?php echo $view_donor_ivf->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->Male->Visible) { // Male ?>
	<tr id="r_Male">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_Male"><script id="tpc_view_donor_ivf_Male" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->Male->caption() ?></span></script></span></td>
		<td data-name="Male"<?php echo $view_donor_ivf->Male->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_Male" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_Male">
<span<?php echo $view_donor_ivf->Male->viewAttributes() ?>>
<?php echo $view_donor_ivf->Male->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->Female->Visible) { // Female ?>
	<tr id="r_Female">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_Female"><script id="tpc_view_donor_ivf_Female" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->Female->caption() ?></span></script></span></td>
		<td data-name="Female"<?php echo $view_donor_ivf->Female->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_Female" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_Female">
<span<?php echo $view_donor_ivf->Female->viewAttributes() ?>>
<?php echo $view_donor_ivf->Female->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_status"><script id="tpc_view_donor_ivf_status" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $view_donor_ivf->status->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_status" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_status">
<span<?php echo $view_donor_ivf->status->viewAttributes() ?>>
<?php echo $view_donor_ivf->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_createdby"><script id="tpc_view_donor_ivf_createdby" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_donor_ivf->createdby->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_createdby" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_createdby">
<span<?php echo $view_donor_ivf->createdby->viewAttributes() ?>>
<?php echo $view_donor_ivf->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_createddatetime"><script id="tpc_view_donor_ivf_createddatetime" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_donor_ivf->createddatetime->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_createddatetime" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_createddatetime">
<span<?php echo $view_donor_ivf->createddatetime->viewAttributes() ?>>
<?php echo $view_donor_ivf->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_modifiedby"><script id="tpc_view_donor_ivf_modifiedby" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_donor_ivf->modifiedby->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_modifiedby" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_modifiedby">
<span<?php echo $view_donor_ivf->modifiedby->viewAttributes() ?>>
<?php echo $view_donor_ivf->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_modifieddatetime"><script id="tpc_view_donor_ivf_modifieddatetime" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_donor_ivf->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_modifieddatetime" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_modifieddatetime">
<span<?php echo $view_donor_ivf->modifieddatetime->viewAttributes() ?>>
<?php echo $view_donor_ivf->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->malepropic->Visible) { // malepropic ?>
	<tr id="r_malepropic">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_malepropic"><script id="tpc_view_donor_ivf_malepropic" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->malepropic->caption() ?></span></script></span></td>
		<td data-name="malepropic"<?php echo $view_donor_ivf->malepropic->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_malepropic" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_malepropic">
<span>
<?php echo GetFileViewTag($view_donor_ivf->malepropic, $view_donor_ivf->malepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->femalepropic->Visible) { // femalepropic ?>
	<tr id="r_femalepropic">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_femalepropic"><script id="tpc_view_donor_ivf_femalepropic" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->femalepropic->caption() ?></span></script></span></td>
		<td data-name="femalepropic"<?php echo $view_donor_ivf->femalepropic->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_femalepropic" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_femalepropic">
<span>
<?php echo GetFileViewTag($view_donor_ivf->femalepropic, $view_donor_ivf->femalepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEducation->Visible) { // HusbandEducation ?>
	<tr id="r_HusbandEducation">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandEducation"><script id="tpc_view_donor_ivf_HusbandEducation" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->HusbandEducation->caption() ?></span></script></span></td>
		<td data-name="HusbandEducation"<?php echo $view_donor_ivf->HusbandEducation->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_HusbandEducation" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_HusbandEducation">
<span<?php echo $view_donor_ivf->HusbandEducation->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandEducation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeEducation->Visible) { // WifeEducation ?>
	<tr id="r_WifeEducation">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeEducation"><script id="tpc_view_donor_ivf_WifeEducation" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->WifeEducation->caption() ?></span></script></span></td>
		<td data-name="WifeEducation"<?php echo $view_donor_ivf->WifeEducation->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_WifeEducation" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_WifeEducation">
<span<?php echo $view_donor_ivf->WifeEducation->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeEducation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<tr id="r_HusbandWorkHours">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandWorkHours"><script id="tpc_view_donor_ivf_HusbandWorkHours" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->HusbandWorkHours->caption() ?></span></script></span></td>
		<td data-name="HusbandWorkHours"<?php echo $view_donor_ivf->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_HusbandWorkHours" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_HusbandWorkHours">
<span<?php echo $view_donor_ivf->HusbandWorkHours->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<tr id="r_WifeWorkHours">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeWorkHours"><script id="tpc_view_donor_ivf_WifeWorkHours" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->WifeWorkHours->caption() ?></span></script></span></td>
		<td data-name="WifeWorkHours"<?php echo $view_donor_ivf->WifeWorkHours->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_WifeWorkHours" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_WifeWorkHours">
<span<?php echo $view_donor_ivf->WifeWorkHours->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->PatientLanguage->Visible) { // PatientLanguage ?>
	<tr id="r_PatientLanguage">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_PatientLanguage"><script id="tpc_view_donor_ivf_PatientLanguage" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->PatientLanguage->caption() ?></span></script></span></td>
		<td data-name="PatientLanguage"<?php echo $view_donor_ivf->PatientLanguage->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_PatientLanguage" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_PatientLanguage">
<span<?php echo $view_donor_ivf->PatientLanguage->viewAttributes() ?>>
<?php echo $view_donor_ivf->PatientLanguage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->ReferedBy->Visible) { // ReferedBy ?>
	<tr id="r_ReferedBy">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_ReferedBy"><script id="tpc_view_donor_ivf_ReferedBy" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->ReferedBy->caption() ?></span></script></span></td>
		<td data-name="ReferedBy"<?php echo $view_donor_ivf->ReferedBy->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_ReferedBy" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_ReferedBy">
<span<?php echo $view_donor_ivf->ReferedBy->viewAttributes() ?>>
<?php echo $view_donor_ivf->ReferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->ReferPhNo->Visible) { // ReferPhNo ?>
	<tr id="r_ReferPhNo">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_ReferPhNo"><script id="tpc_view_donor_ivf_ReferPhNo" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->ReferPhNo->caption() ?></span></script></span></td>
		<td data-name="ReferPhNo"<?php echo $view_donor_ivf->ReferPhNo->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_ReferPhNo" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_ReferPhNo">
<span<?php echo $view_donor_ivf->ReferPhNo->viewAttributes() ?>>
<?php echo $view_donor_ivf->ReferPhNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeCell->Visible) { // WifeCell ?>
	<tr id="r_WifeCell">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeCell"><script id="tpc_view_donor_ivf_WifeCell" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->WifeCell->caption() ?></span></script></span></td>
		<td data-name="WifeCell"<?php echo $view_donor_ivf->WifeCell->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_WifeCell" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_WifeCell">
<span<?php echo $view_donor_ivf->WifeCell->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeCell->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandCell->Visible) { // HusbandCell ?>
	<tr id="r_HusbandCell">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandCell"><script id="tpc_view_donor_ivf_HusbandCell" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->HusbandCell->caption() ?></span></script></span></td>
		<td data-name="HusbandCell"<?php echo $view_donor_ivf->HusbandCell->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_HusbandCell" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_HusbandCell">
<span<?php echo $view_donor_ivf->HusbandCell->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandCell->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeEmail->Visible) { // WifeEmail ?>
	<tr id="r_WifeEmail">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeEmail"><script id="tpc_view_donor_ivf_WifeEmail" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->WifeEmail->caption() ?></span></script></span></td>
		<td data-name="WifeEmail"<?php echo $view_donor_ivf->WifeEmail->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_WifeEmail" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_WifeEmail">
<span<?php echo $view_donor_ivf->WifeEmail->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
	<tr id="r_HusbandEmail">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandEmail"><script id="tpc_view_donor_ivf_HusbandEmail" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->HusbandEmail->caption() ?></span></script></span></td>
		<td data-name="HusbandEmail"<?php echo $view_donor_ivf->HusbandEmail->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_HusbandEmail" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_HusbandEmail">
<span<?php echo $view_donor_ivf->HusbandEmail->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<tr id="r_ARTCYCLE">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_ARTCYCLE"><script id="tpc_view_donor_ivf_ARTCYCLE" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->ARTCYCLE->caption() ?></span></script></span></td>
		<td data-name="ARTCYCLE"<?php echo $view_donor_ivf->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_ARTCYCLE" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_ARTCYCLE">
<span<?php echo $view_donor_ivf->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_donor_ivf->ARTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->RESULT->Visible) { // RESULT ?>
	<tr id="r_RESULT">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_RESULT"><script id="tpc_view_donor_ivf_RESULT" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->RESULT->caption() ?></span></script></span></td>
		<td data-name="RESULT"<?php echo $view_donor_ivf->RESULT->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_RESULT" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_RESULT">
<span<?php echo $view_donor_ivf->RESULT->viewAttributes() ?>>
<?php echo $view_donor_ivf->RESULT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->CoupleID->Visible) { // CoupleID ?>
	<tr id="r_CoupleID">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_CoupleID"><script id="tpc_view_donor_ivf_CoupleID" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->CoupleID->caption() ?></span></script></span></td>
		<td data-name="CoupleID"<?php echo $view_donor_ivf->CoupleID->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_CoupleID" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_CoupleID">
<span<?php echo $view_donor_ivf->CoupleID->viewAttributes() ?>>
<?php echo $view_donor_ivf->CoupleID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_HospID"><script id="tpc_view_donor_ivf_HospID" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_donor_ivf->HospID->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_HospID" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_HospID">
<span<?php echo $view_donor_ivf->HospID->viewAttributes() ?>>
<?php echo $view_donor_ivf->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_PatientName"><script id="tpc_view_donor_ivf_PatientName" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $view_donor_ivf->PatientName->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_PatientName" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_PatientName">
<span<?php echo $view_donor_ivf->PatientName->viewAttributes() ?>>
<?php echo $view_donor_ivf->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_PatientID"><script id="tpc_view_donor_ivf_PatientID" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $view_donor_ivf->PatientID->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_PatientID" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_PatientID">
<span<?php echo $view_donor_ivf->PatientID->viewAttributes() ?>>
<?php echo $view_donor_ivf->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_PartnerName"><script id="tpc_view_donor_ivf_PartnerName" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $view_donor_ivf->PartnerName->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_PartnerName" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_PartnerName">
<span<?php echo $view_donor_ivf->PartnerName->viewAttributes() ?>>
<?php echo $view_donor_ivf->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->PartnerID->Visible) { // PartnerID ?>
	<tr id="r_PartnerID">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_PartnerID"><script id="tpc_view_donor_ivf_PartnerID" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->PartnerID->caption() ?></span></script></span></td>
		<td data-name="PartnerID"<?php echo $view_donor_ivf->PartnerID->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_PartnerID" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_PartnerID">
<span<?php echo $view_donor_ivf->PartnerID->viewAttributes() ?>>
<?php echo $view_donor_ivf->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_DrID"><script id="tpc_view_donor_ivf_DrID" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->DrID->caption() ?></span></script></span></td>
		<td data-name="DrID"<?php echo $view_donor_ivf->DrID->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_DrID" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_DrID">
<span<?php echo $view_donor_ivf->DrID->viewAttributes() ?>>
<?php echo $view_donor_ivf->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_DrDepartment"><script id="tpc_view_donor_ivf_DrDepartment" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->DrDepartment->caption() ?></span></script></span></td>
		<td data-name="DrDepartment"<?php echo $view_donor_ivf->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_DrDepartment" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_DrDepartment">
<span<?php echo $view_donor_ivf->DrDepartment->viewAttributes() ?>>
<?php echo $view_donor_ivf->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_Doctor"><script id="tpc_view_donor_ivf_Doctor" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->Doctor->caption() ?></span></script></span></td>
		<td data-name="Doctor"<?php echo $view_donor_ivf->Doctor->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_Doctor" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_Doctor">
<span<?php echo $view_donor_ivf->Doctor->viewAttributes() ?>>
<?php echo $view_donor_ivf->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->femalepic->Visible) { // femalepic ?>
	<tr id="r_femalepic">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_femalepic"><script id="tpc_view_donor_ivf_femalepic" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->femalepic->caption() ?></span></script></span></td>
		<td data-name="femalepic"<?php echo $view_donor_ivf->femalepic->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_femalepic" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_femalepic">
<span<?php echo $view_donor_ivf->femalepic->viewAttributes() ?>>
<?php echo $view_donor_ivf->femalepic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_donor_ivf->Fgender->Visible) { // Fgender ?>
	<tr id="r_Fgender">
		<td class="<?php echo $view_donor_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_donor_ivf_Fgender"><script id="tpc_view_donor_ivf_Fgender" class="view_donor_ivfview" type="text/html"><span><?php echo $view_donor_ivf->Fgender->caption() ?></span></script></span></td>
		<td data-name="Fgender"<?php echo $view_donor_ivf->Fgender->cellAttributes() ?>>
<script id="tpx_view_donor_ivf_Fgender" class="view_donor_ivfview" type="text/html">
<span id="el_view_donor_ivf_Fgender">
<span<?php echo $view_donor_ivf->Fgender->viewAttributes() ?>>
<?php echo $view_donor_ivf->Fgender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_donor_ivfview" class="ew-custom-template"></div>
<script id="tpm_view_donor_ivfview" type="text/html">
<div id="ct_view_donor_ivf_view"><style>
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
</style>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Donor</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_Female"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_Female"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_femalepropic"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_femalepropic"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_WifeEducation"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_WifeEducation"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_WifeWorkHours"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_WifeWorkHours"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_WifeCell"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_WifeCell"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_WifeEmail"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_WifeEmail"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div style="visibility: hidden" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_Male"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_Male"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_malepropic"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_malepropic"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_HusbandEducation"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_HusbandEducation"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_HusbandWorkHours"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_HusbandWorkHours"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_HusbandCell"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_HusbandCell"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_HusbandEmail"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_HusbandEmail"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		 <tr>
		 	<td>{{include tmpl="#tpc_view_donor_ivf_DrID"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_DrID"/}}</td>
			<td>{{include tmpl="#tpc_view_donor_ivf_Doctor"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_Doctor"/}}</td>
			<td>{{include tmpl="#tpc_view_donor_ivf_DrDepartment"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_DrDepartment"/}}</td>
		</tr>
	  </tbody>
</table>
 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_PatientLanguage"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_PatientLanguage"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_ReferedBy"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_ReferedBy"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_view_donor_ivf_ReferPhNo"/}}&nbsp;{{include tmpl="#tpx_view_donor_ivf_ReferPhNo"/}}</span>
</div>
</div>
</script>
<?php
	if (in_array("ivf_treatment_plan", explode(",", $view_donor_ivf->getCurrentDetailTable())) && $ivf_treatment_plan->DetailView) {
?>
<?php if ($view_donor_ivf->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("ivf_treatment_plan", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_treatment_plangrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_donor_ivf->Rows) ?> };
ew.applyTemplate("tpd_view_donor_ivfview", "tpm_view_donor_ivfview", "view_donor_ivfview", "<?php echo $view_donor_ivf->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_donor_ivfview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_donor_ivf_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_donor_ivf->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_donor_ivf_view->terminate();
?>