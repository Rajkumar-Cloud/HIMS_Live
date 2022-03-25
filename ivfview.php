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
$ivf_view = new ivf_view();

// Run the page
$ivf_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivfview = currentForm = new ew.Form("fivfview", "view");

// Form_CustomValidate event
fivfview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivfview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivfview.lists["x_Male"] = <?php echo $ivf_view->Male->Lookup->toClientList() ?>;
fivfview.lists["x_Male"].options = <?php echo JsonEncode($ivf_view->Male->lookupOptions()) ?>;
fivfview.lists["x_Female"] = <?php echo $ivf_view->Female->Lookup->toClientList() ?>;
fivfview.lists["x_Female"].options = <?php echo JsonEncode($ivf_view->Female->lookupOptions()) ?>;
fivfview.lists["x_status"] = <?php echo $ivf_view->status->Lookup->toClientList() ?>;
fivfview.lists["x_status"].options = <?php echo JsonEncode($ivf_view->status->lookupOptions()) ?>;
fivfview.lists["x_ReferedBy"] = <?php echo $ivf_view->ReferedBy->Lookup->toClientList() ?>;
fivfview.lists["x_ReferedBy"].options = <?php echo JsonEncode($ivf_view->ReferedBy->lookupOptions()) ?>;
fivfview.lists["x_ARTCYCLE"] = <?php echo $ivf_view->ARTCYCLE->Lookup->toClientList() ?>;
fivfview.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_view->ARTCYCLE->options(FALSE, TRUE)) ?>;
fivfview.lists["x_RESULT"] = <?php echo $ivf_view->RESULT->Lookup->toClientList() ?>;
fivfview.lists["x_RESULT"].options = <?php echo JsonEncode($ivf_view->RESULT->options(FALSE, TRUE)) ?>;
fivfview.lists["x_DrID"] = <?php echo $ivf_view->DrID->Lookup->toClientList() ?>;
fivfview.lists["x_DrID"].options = <?php echo JsonEncode($ivf_view->DrID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_view->ExportOptions->render("body") ?>
<?php $ivf_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_view->showPageHeader(); ?>
<?php
$ivf_view->showMessage();
?>
<form name="fivfview" id="fivfview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_id"><script id="tpc_ivf_id" class="ivfview" type="text/html"><span><?php echo $ivf->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $ivf->id->cellAttributes() ?>>
<script id="tpx_ivf_id" class="ivfview" type="text/html">
<span id="el_ivf_id">
<span<?php echo $ivf->id->viewAttributes() ?>>
<?php echo $ivf->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->Male->Visible) { // Male ?>
	<tr id="r_Male">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_Male"><script id="tpc_ivf_Male" class="ivfview" type="text/html"><span><?php echo $ivf->Male->caption() ?></span></script></span></td>
		<td data-name="Male"<?php echo $ivf->Male->cellAttributes() ?>>
<script id="tpx_ivf_Male" class="ivfview" type="text/html">
<span id="el_ivf_Male">
<span<?php echo $ivf->Male->viewAttributes() ?>>
<?php echo $ivf->Male->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->Female->Visible) { // Female ?>
	<tr id="r_Female">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_Female"><script id="tpc_ivf_Female" class="ivfview" type="text/html"><span><?php echo $ivf->Female->caption() ?></span></script></span></td>
		<td data-name="Female"<?php echo $ivf->Female->cellAttributes() ?>>
<script id="tpx_ivf_Female" class="ivfview" type="text/html">
<span id="el_ivf_Female">
<span<?php echo $ivf->Female->viewAttributes() ?>>
<?php echo $ivf->Female->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_status"><script id="tpc_ivf_status" class="ivfview" type="text/html"><span><?php echo $ivf->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $ivf->status->cellAttributes() ?>>
<script id="tpx_ivf_status" class="ivfview" type="text/html">
<span id="el_ivf_status">
<span<?php echo $ivf->status->viewAttributes() ?>>
<?php echo $ivf->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_createdby"><script id="tpc_ivf_createdby" class="ivfview" type="text/html"><span><?php echo $ivf->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $ivf->createdby->cellAttributes() ?>>
<script id="tpx_ivf_createdby" class="ivfview" type="text/html">
<span id="el_ivf_createdby">
<span<?php echo $ivf->createdby->viewAttributes() ?>>
<?php echo $ivf->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_createddatetime"><script id="tpc_ivf_createddatetime" class="ivfview" type="text/html"><span><?php echo $ivf->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $ivf->createddatetime->cellAttributes() ?>>
<script id="tpx_ivf_createddatetime" class="ivfview" type="text/html">
<span id="el_ivf_createddatetime">
<span<?php echo $ivf->createddatetime->viewAttributes() ?>>
<?php echo $ivf->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_modifiedby"><script id="tpc_ivf_modifiedby" class="ivfview" type="text/html"><span><?php echo $ivf->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $ivf->modifiedby->cellAttributes() ?>>
<script id="tpx_ivf_modifiedby" class="ivfview" type="text/html">
<span id="el_ivf_modifiedby">
<span<?php echo $ivf->modifiedby->viewAttributes() ?>>
<?php echo $ivf->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_modifieddatetime"><script id="tpc_ivf_modifieddatetime" class="ivfview" type="text/html"><span><?php echo $ivf->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $ivf->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ivf_modifieddatetime" class="ivfview" type="text/html">
<span id="el_ivf_modifieddatetime">
<span<?php echo $ivf->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->malepropic->Visible) { // malepropic ?>
	<tr id="r_malepropic">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_malepropic"><script id="tpc_ivf_malepropic" class="ivfview" type="text/html"><span><?php echo $ivf->malepropic->caption() ?></span></script></span></td>
		<td data-name="malepropic"<?php echo $ivf->malepropic->cellAttributes() ?>>
<script id="tpx_ivf_malepropic" class="ivfview" type="text/html">
<span id="el_ivf_malepropic">
<span>
<?php echo GetFileViewTag($ivf->malepropic, $ivf->malepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->femalepropic->Visible) { // femalepropic ?>
	<tr id="r_femalepropic">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_femalepropic"><script id="tpc_ivf_femalepropic" class="ivfview" type="text/html"><span><?php echo $ivf->femalepropic->caption() ?></span></script></span></td>
		<td data-name="femalepropic"<?php echo $ivf->femalepropic->cellAttributes() ?>>
<script id="tpx_ivf_femalepropic" class="ivfview" type="text/html">
<span id="el_ivf_femalepropic">
<span>
<?php echo GetFileViewTag($ivf->femalepropic, $ivf->femalepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->HusbandEducation->Visible) { // HusbandEducation ?>
	<tr id="r_HusbandEducation">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_HusbandEducation"><script id="tpc_ivf_HusbandEducation" class="ivfview" type="text/html"><span><?php echo $ivf->HusbandEducation->caption() ?></span></script></span></td>
		<td data-name="HusbandEducation"<?php echo $ivf->HusbandEducation->cellAttributes() ?>>
<script id="tpx_ivf_HusbandEducation" class="ivfview" type="text/html">
<span id="el_ivf_HusbandEducation">
<span<?php echo $ivf->HusbandEducation->viewAttributes() ?>>
<?php echo $ivf->HusbandEducation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->WifeEducation->Visible) { // WifeEducation ?>
	<tr id="r_WifeEducation">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_WifeEducation"><script id="tpc_ivf_WifeEducation" class="ivfview" type="text/html"><span><?php echo $ivf->WifeEducation->caption() ?></span></script></span></td>
		<td data-name="WifeEducation"<?php echo $ivf->WifeEducation->cellAttributes() ?>>
<script id="tpx_ivf_WifeEducation" class="ivfview" type="text/html">
<span id="el_ivf_WifeEducation">
<span<?php echo $ivf->WifeEducation->viewAttributes() ?>>
<?php echo $ivf->WifeEducation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<tr id="r_HusbandWorkHours">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_HusbandWorkHours"><script id="tpc_ivf_HusbandWorkHours" class="ivfview" type="text/html"><span><?php echo $ivf->HusbandWorkHours->caption() ?></span></script></span></td>
		<td data-name="HusbandWorkHours"<?php echo $ivf->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx_ivf_HusbandWorkHours" class="ivfview" type="text/html">
<span id="el_ivf_HusbandWorkHours">
<span<?php echo $ivf->HusbandWorkHours->viewAttributes() ?>>
<?php echo $ivf->HusbandWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<tr id="r_WifeWorkHours">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_WifeWorkHours"><script id="tpc_ivf_WifeWorkHours" class="ivfview" type="text/html"><span><?php echo $ivf->WifeWorkHours->caption() ?></span></script></span></td>
		<td data-name="WifeWorkHours"<?php echo $ivf->WifeWorkHours->cellAttributes() ?>>
<script id="tpx_ivf_WifeWorkHours" class="ivfview" type="text/html">
<span id="el_ivf_WifeWorkHours">
<span<?php echo $ivf->WifeWorkHours->viewAttributes() ?>>
<?php echo $ivf->WifeWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->PatientLanguage->Visible) { // PatientLanguage ?>
	<tr id="r_PatientLanguage">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_PatientLanguage"><script id="tpc_ivf_PatientLanguage" class="ivfview" type="text/html"><span><?php echo $ivf->PatientLanguage->caption() ?></span></script></span></td>
		<td data-name="PatientLanguage"<?php echo $ivf->PatientLanguage->cellAttributes() ?>>
<script id="tpx_ivf_PatientLanguage" class="ivfview" type="text/html">
<span id="el_ivf_PatientLanguage">
<span<?php echo $ivf->PatientLanguage->viewAttributes() ?>>
<?php echo $ivf->PatientLanguage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->ReferedBy->Visible) { // ReferedBy ?>
	<tr id="r_ReferedBy">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_ReferedBy"><script id="tpc_ivf_ReferedBy" class="ivfview" type="text/html"><span><?php echo $ivf->ReferedBy->caption() ?></span></script></span></td>
		<td data-name="ReferedBy"<?php echo $ivf->ReferedBy->cellAttributes() ?>>
<script id="tpx_ivf_ReferedBy" class="ivfview" type="text/html">
<span id="el_ivf_ReferedBy">
<span<?php echo $ivf->ReferedBy->viewAttributes() ?>>
<?php echo $ivf->ReferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->ReferPhNo->Visible) { // ReferPhNo ?>
	<tr id="r_ReferPhNo">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_ReferPhNo"><script id="tpc_ivf_ReferPhNo" class="ivfview" type="text/html"><span><?php echo $ivf->ReferPhNo->caption() ?></span></script></span></td>
		<td data-name="ReferPhNo"<?php echo $ivf->ReferPhNo->cellAttributes() ?>>
<script id="tpx_ivf_ReferPhNo" class="ivfview" type="text/html">
<span id="el_ivf_ReferPhNo">
<span<?php echo $ivf->ReferPhNo->viewAttributes() ?>>
<?php echo $ivf->ReferPhNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->WifeCell->Visible) { // WifeCell ?>
	<tr id="r_WifeCell">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_WifeCell"><script id="tpc_ivf_WifeCell" class="ivfview" type="text/html"><span><?php echo $ivf->WifeCell->caption() ?></span></script></span></td>
		<td data-name="WifeCell"<?php echo $ivf->WifeCell->cellAttributes() ?>>
<script id="tpx_ivf_WifeCell" class="ivfview" type="text/html">
<span id="el_ivf_WifeCell">
<span<?php echo $ivf->WifeCell->viewAttributes() ?>>
<?php echo $ivf->WifeCell->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->HusbandCell->Visible) { // HusbandCell ?>
	<tr id="r_HusbandCell">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_HusbandCell"><script id="tpc_ivf_HusbandCell" class="ivfview" type="text/html"><span><?php echo $ivf->HusbandCell->caption() ?></span></script></span></td>
		<td data-name="HusbandCell"<?php echo $ivf->HusbandCell->cellAttributes() ?>>
<script id="tpx_ivf_HusbandCell" class="ivfview" type="text/html">
<span id="el_ivf_HusbandCell">
<span<?php echo $ivf->HusbandCell->viewAttributes() ?>>
<?php echo $ivf->HusbandCell->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->WifeEmail->Visible) { // WifeEmail ?>
	<tr id="r_WifeEmail">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_WifeEmail"><script id="tpc_ivf_WifeEmail" class="ivfview" type="text/html"><span><?php echo $ivf->WifeEmail->caption() ?></span></script></span></td>
		<td data-name="WifeEmail"<?php echo $ivf->WifeEmail->cellAttributes() ?>>
<script id="tpx_ivf_WifeEmail" class="ivfview" type="text/html">
<span id="el_ivf_WifeEmail">
<span<?php echo $ivf->WifeEmail->viewAttributes() ?>>
<?php echo $ivf->WifeEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->HusbandEmail->Visible) { // HusbandEmail ?>
	<tr id="r_HusbandEmail">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_HusbandEmail"><script id="tpc_ivf_HusbandEmail" class="ivfview" type="text/html"><span><?php echo $ivf->HusbandEmail->caption() ?></span></script></span></td>
		<td data-name="HusbandEmail"<?php echo $ivf->HusbandEmail->cellAttributes() ?>>
<script id="tpx_ivf_HusbandEmail" class="ivfview" type="text/html">
<span id="el_ivf_HusbandEmail">
<span<?php echo $ivf->HusbandEmail->viewAttributes() ?>>
<?php echo $ivf->HusbandEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<tr id="r_ARTCYCLE">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_ARTCYCLE"><script id="tpc_ivf_ARTCYCLE" class="ivfview" type="text/html"><span><?php echo $ivf->ARTCYCLE->caption() ?></span></script></span></td>
		<td data-name="ARTCYCLE"<?php echo $ivf->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_ARTCYCLE" class="ivfview" type="text/html">
<span id="el_ivf_ARTCYCLE">
<span<?php echo $ivf->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf->ARTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->RESULT->Visible) { // RESULT ?>
	<tr id="r_RESULT">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_RESULT"><script id="tpc_ivf_RESULT" class="ivfview" type="text/html"><span><?php echo $ivf->RESULT->caption() ?></span></script></span></td>
		<td data-name="RESULT"<?php echo $ivf->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_RESULT" class="ivfview" type="text/html">
<span id="el_ivf_RESULT">
<span<?php echo $ivf->RESULT->viewAttributes() ?>>
<?php echo $ivf->RESULT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->malepic->Visible) { // malepic ?>
	<tr id="r_malepic">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_malepic"><script id="tpc_ivf_malepic" class="ivfview" type="text/html"><span><?php echo $ivf->malepic->caption() ?></span></script></span></td>
		<td data-name="malepic"<?php echo $ivf->malepic->cellAttributes() ?>>
<script id="tpx_ivf_malepic" class="ivfview" type="text/html">
<span id="el_ivf_malepic">
<span<?php echo $ivf->malepic->viewAttributes() ?>>
<?php echo $ivf->malepic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->femalepic->Visible) { // femalepic ?>
	<tr id="r_femalepic">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_femalepic"><script id="tpc_ivf_femalepic" class="ivfview" type="text/html"><span><?php echo $ivf->femalepic->caption() ?></span></script></span></td>
		<td data-name="femalepic"<?php echo $ivf->femalepic->cellAttributes() ?>>
<script id="tpx_ivf_femalepic" class="ivfview" type="text/html">
<span id="el_ivf_femalepic">
<span<?php echo $ivf->femalepic->viewAttributes() ?>>
<?php echo $ivf->femalepic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->Mgendar->Visible) { // Mgendar ?>
	<tr id="r_Mgendar">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_Mgendar"><script id="tpc_ivf_Mgendar" class="ivfview" type="text/html"><span><?php echo $ivf->Mgendar->caption() ?></span></script></span></td>
		<td data-name="Mgendar"<?php echo $ivf->Mgendar->cellAttributes() ?>>
<script id="tpx_ivf_Mgendar" class="ivfview" type="text/html">
<span id="el_ivf_Mgendar">
<span<?php echo $ivf->Mgendar->viewAttributes() ?>>
<?php echo $ivf->Mgendar->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->Fgendar->Visible) { // Fgendar ?>
	<tr id="r_Fgendar">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_Fgendar"><script id="tpc_ivf_Fgendar" class="ivfview" type="text/html"><span><?php echo $ivf->Fgendar->caption() ?></span></script></span></td>
		<td data-name="Fgendar"<?php echo $ivf->Fgendar->cellAttributes() ?>>
<script id="tpx_ivf_Fgendar" class="ivfview" type="text/html">
<span id="el_ivf_Fgendar">
<span<?php echo $ivf->Fgendar->viewAttributes() ?>>
<?php echo $ivf->Fgendar->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->CoupleID->Visible) { // CoupleID ?>
	<tr id="r_CoupleID">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_CoupleID"><script id="tpc_ivf_CoupleID" class="ivfview" type="text/html"><span><?php echo $ivf->CoupleID->caption() ?></span></script></span></td>
		<td data-name="CoupleID"<?php echo $ivf->CoupleID->cellAttributes() ?>>
<script id="tpx_ivf_CoupleID" class="ivfview" type="text/html">
<span id="el_ivf_CoupleID">
<span<?php echo $ivf->CoupleID->viewAttributes() ?>>
<?php echo $ivf->CoupleID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_HospID"><script id="tpc_ivf_HospID" class="ivfview" type="text/html"><span><?php echo $ivf->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $ivf->HospID->cellAttributes() ?>>
<script id="tpx_ivf_HospID" class="ivfview" type="text/html">
<span id="el_ivf_HospID">
<span<?php echo $ivf->HospID->viewAttributes() ?>>
<?php echo $ivf->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_PatientName"><script id="tpc_ivf_PatientName" class="ivfview" type="text/html"><span><?php echo $ivf->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $ivf->PatientName->cellAttributes() ?>>
<script id="tpx_ivf_PatientName" class="ivfview" type="text/html">
<span id="el_ivf_PatientName">
<span<?php echo $ivf->PatientName->viewAttributes() ?>>
<?php echo $ivf->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_PatientID"><script id="tpc_ivf_PatientID" class="ivfview" type="text/html"><span><?php echo $ivf->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $ivf->PatientID->cellAttributes() ?>>
<script id="tpx_ivf_PatientID" class="ivfview" type="text/html">
<span id="el_ivf_PatientID">
<span<?php echo $ivf->PatientID->viewAttributes() ?>>
<?php echo $ivf->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_PartnerName"><script id="tpc_ivf_PartnerName" class="ivfview" type="text/html"><span><?php echo $ivf->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $ivf->PartnerName->cellAttributes() ?>>
<script id="tpx_ivf_PartnerName" class="ivfview" type="text/html">
<span id="el_ivf_PartnerName">
<span<?php echo $ivf->PartnerName->viewAttributes() ?>>
<?php echo $ivf->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->PartnerID->Visible) { // PartnerID ?>
	<tr id="r_PartnerID">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_PartnerID"><script id="tpc_ivf_PartnerID" class="ivfview" type="text/html"><span><?php echo $ivf->PartnerID->caption() ?></span></script></span></td>
		<td data-name="PartnerID"<?php echo $ivf->PartnerID->cellAttributes() ?>>
<script id="tpx_ivf_PartnerID" class="ivfview" type="text/html">
<span id="el_ivf_PartnerID">
<span<?php echo $ivf->PartnerID->viewAttributes() ?>>
<?php echo $ivf->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_DrID"><script id="tpc_ivf_DrID" class="ivfview" type="text/html"><span><?php echo $ivf->DrID->caption() ?></span></script></span></td>
		<td data-name="DrID"<?php echo $ivf->DrID->cellAttributes() ?>>
<script id="tpx_ivf_DrID" class="ivfview" type="text/html">
<span id="el_ivf_DrID">
<span<?php echo $ivf->DrID->viewAttributes() ?>>
<?php echo $ivf->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_DrDepartment"><script id="tpc_ivf_DrDepartment" class="ivfview" type="text/html"><span><?php echo $ivf->DrDepartment->caption() ?></span></script></span></td>
		<td data-name="DrDepartment"<?php echo $ivf->DrDepartment->cellAttributes() ?>>
<script id="tpx_ivf_DrDepartment" class="ivfview" type="text/html">
<span id="el_ivf_DrDepartment">
<span<?php echo $ivf->DrDepartment->viewAttributes() ?>>
<?php echo $ivf->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $ivf_view->TableLeftColumnClass ?>"><span id="elh_ivf_Doctor"><script id="tpc_ivf_Doctor" class="ivfview" type="text/html"><span><?php echo $ivf->Doctor->caption() ?></span></script></span></td>
		<td data-name="Doctor"<?php echo $ivf->Doctor->cellAttributes() ?>>
<script id="tpx_ivf_Doctor" class="ivfview" type="text/html">
<span id="el_ivf_Doctor">
<span<?php echo $ivf->Doctor->viewAttributes() ?>>
<?php echo $ivf->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivfview" class="ew-custom-template"></div>
<script id="tpm_ivfview" type="text/html">
<div id="ct_ivf_view"><style>
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
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_Female"/}}&nbsp;{{include tmpl="#tpx_ivf_Female"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_femalepropic"/}}&nbsp;{{include tmpl="#tpx_ivf_femalepropic"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeEducation"/}}&nbsp;{{include tmpl="#tpx_ivf_WifeEducation"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeWorkHours"/}}&nbsp;{{include tmpl="#tpx_ivf_WifeWorkHours"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeCell"/}}&nbsp;{{include tmpl="#tpx_ivf_WifeCell"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeEmail"/}}&nbsp;{{include tmpl="#tpx_ivf_WifeEmail"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_Male"/}}&nbsp;{{include tmpl="#tpx_ivf_Male"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_malepropic"/}}&nbsp;{{include tmpl="#tpx_ivf_malepropic"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandEducation"/}}&nbsp;{{include tmpl="#tpx_ivf_HusbandEducation"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandWorkHours"/}}&nbsp;{{include tmpl="#tpx_ivf_HusbandWorkHours"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandCell"/}}&nbsp;{{include tmpl="#tpx_ivf_HusbandCell"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandEmail"/}}&nbsp;{{include tmpl="#tpx_ivf_HusbandEmail"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		 <tr>
		 	<td>{{include tmpl="#tpc_ivf_DrID"/}}&nbsp;{{include tmpl="#tpx_ivf_DrID"/}}</td>
			<td>{{include tmpl="#tpc_ivf_Doctor"/}}&nbsp;{{include tmpl="#tpx_ivf_Doctor"/}}</td>
			<td>{{include tmpl="#tpc_ivf_DrDepartment"/}}&nbsp;{{include tmpl="#tpx_ivf_DrDepartment"/}}</td>
		</tr>
	  </tbody>
</table>
 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_PatientLanguage"/}}&nbsp;{{include tmpl="#tpx_ivf_PatientLanguage"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ReferedBy"/}}&nbsp;{{include tmpl="#tpx_ivf_ReferedBy"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ReferPhNo"/}}&nbsp;{{include tmpl="#tpx_ivf_ReferPhNo"/}}</span>
</div>
</div>
</script>
<?php
	if (in_array("ivf_treatment_plan", explode(",", $ivf->getCurrentDetailTable())) && $ivf_treatment_plan->DetailView) {
?>
<?php if ($ivf->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("ivf_treatment_plan", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_treatment_plangrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf->Rows) ?> };
ew.applyTemplate("tpd_ivfview", "tpm_ivfview", "ivfview", "<?php echo $ivf->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivfview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_view->terminate();
?>