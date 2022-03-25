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
$view_barcode_ivf_view = new view_barcode_ivf_view();

// Run the page
$view_barcode_ivf_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_barcode_ivf_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_barcode_ivf->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_barcode_ivfview = currentForm = new ew.Form("fview_barcode_ivfview", "view");

// Form_CustomValidate event
fview_barcode_ivfview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_barcode_ivfview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_barcode_ivf->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_barcode_ivf_view->ExportOptions->render("body") ?>
<?php $view_barcode_ivf_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_barcode_ivf_view->showPageHeader(); ?>
<?php
$view_barcode_ivf_view->showMessage();
?>
<form name="fview_barcode_ivfview" id="fview_barcode_ivfview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_barcode_ivf_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_barcode_ivf_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_barcode_ivf">
<input type="hidden" name="modal" value="<?php echo (int)$view_barcode_ivf_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_barcode_ivf->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_id"><script id="tpc_view_barcode_ivf_id" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_barcode_ivf->id->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_id" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_id">
<span<?php echo $view_barcode_ivf->id->viewAttributes() ?>>
<?php echo $view_barcode_ivf->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->_Barcode->Visible) { // Barcode ?>
	<tr id="r__Barcode">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf__Barcode"><script id="tpc_view_barcode_ivf__Barcode" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->_Barcode->caption() ?></span></script></span></td>
		<td data-name="_Barcode"<?php echo $view_barcode_ivf->_Barcode->cellAttributes() ?>>
<script id="orig_view_barcode_ivf__Barcode" class="view_barcode_ivfview" type="text/html">
<?php echo $view_barcode_ivf->_Barcode->getViewValue() ?>
</script><script id="tpx_view_barcode_ivf__Barcode" class="view_barcode_ivfview" type="text/html">
<?php echo Barcode()->show($view_barcode_ivf->_Barcode->CurrentValue, 'EAN-13', 60) ?>
</script>
<script id="tpx_view_barcode_ivf__Barcode" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf__Barcode">
<span<?php echo $view_barcode_ivf->_Barcode->viewAttributes() ?>>{{include tmpl="#tpx_view_barcode_ivf__Barcode"/}}</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->CoupleID->Visible) { // CoupleID ?>
	<tr id="r_CoupleID">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_CoupleID"><script id="tpc_view_barcode_ivf_CoupleID" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->CoupleID->caption() ?></span></script></span></td>
		<td data-name="CoupleID"<?php echo $view_barcode_ivf->CoupleID->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_CoupleID" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_CoupleID">
<span<?php echo $view_barcode_ivf->CoupleID->viewAttributes() ?>>
<?php echo $view_barcode_ivf->CoupleID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_PatientName"><script id="tpc_view_barcode_ivf_PatientName" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $view_barcode_ivf->PatientName->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_PatientName" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_PatientName">
<span<?php echo $view_barcode_ivf->PatientName->viewAttributes() ?>>
<?php echo $view_barcode_ivf->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_PatientID"><script id="tpc_view_barcode_ivf_PatientID" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $view_barcode_ivf->PatientID->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_PatientID" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_PatientID">
<span<?php echo $view_barcode_ivf->PatientID->viewAttributes() ?>>
<?php echo $view_barcode_ivf->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_PartnerName"><script id="tpc_view_barcode_ivf_PartnerName" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $view_barcode_ivf->PartnerName->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_PartnerName" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_PartnerName">
<span<?php echo $view_barcode_ivf->PartnerName->viewAttributes() ?>>
<?php echo $view_barcode_ivf->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->PartnerID->Visible) { // PartnerID ?>
	<tr id="r_PartnerID">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_PartnerID"><script id="tpc_view_barcode_ivf_PartnerID" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->PartnerID->caption() ?></span></script></span></td>
		<td data-name="PartnerID"<?php echo $view_barcode_ivf->PartnerID->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_PartnerID" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_PartnerID">
<span<?php echo $view_barcode_ivf->PartnerID->viewAttributes() ?>>
<?php echo $view_barcode_ivf->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->WifeCell->Visible) { // WifeCell ?>
	<tr id="r_WifeCell">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_WifeCell"><script id="tpc_view_barcode_ivf_WifeCell" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->WifeCell->caption() ?></span></script></span></td>
		<td data-name="WifeCell"<?php echo $view_barcode_ivf->WifeCell->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_WifeCell" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_WifeCell">
<span<?php echo $view_barcode_ivf->WifeCell->viewAttributes() ?>>
<?php echo $view_barcode_ivf->WifeCell->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->HusbandCell->Visible) { // HusbandCell ?>
	<tr id="r_HusbandCell">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_HusbandCell"><script id="tpc_view_barcode_ivf_HusbandCell" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->HusbandCell->caption() ?></span></script></span></td>
		<td data-name="HusbandCell"<?php echo $view_barcode_ivf->HusbandCell->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_HusbandCell" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_HusbandCell">
<span<?php echo $view_barcode_ivf->HusbandCell->viewAttributes() ?>>
<?php echo $view_barcode_ivf->HusbandCell->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->WifeEmail->Visible) { // WifeEmail ?>
	<tr id="r_WifeEmail">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_WifeEmail"><script id="tpc_view_barcode_ivf_WifeEmail" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->WifeEmail->caption() ?></span></script></span></td>
		<td data-name="WifeEmail"<?php echo $view_barcode_ivf->WifeEmail->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_WifeEmail" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_WifeEmail">
<span<?php echo $view_barcode_ivf->WifeEmail->viewAttributes() ?>>
<?php echo $view_barcode_ivf->WifeEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
	<tr id="r_HusbandEmail">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_HusbandEmail"><script id="tpc_view_barcode_ivf_HusbandEmail" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->HusbandEmail->caption() ?></span></script></span></td>
		<td data-name="HusbandEmail"<?php echo $view_barcode_ivf->HusbandEmail->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_HusbandEmail" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_HusbandEmail">
<span<?php echo $view_barcode_ivf->HusbandEmail->viewAttributes() ?>>
<?php echo $view_barcode_ivf->HusbandEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<tr id="r_ARTCYCLE">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_ARTCYCLE"><script id="tpc_view_barcode_ivf_ARTCYCLE" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->ARTCYCLE->caption() ?></span></script></span></td>
		<td data-name="ARTCYCLE"<?php echo $view_barcode_ivf->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_ARTCYCLE" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_ARTCYCLE">
<span<?php echo $view_barcode_ivf->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_barcode_ivf->ARTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->RESULT->Visible) { // RESULT ?>
	<tr id="r_RESULT">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_RESULT"><script id="tpc_view_barcode_ivf_RESULT" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->RESULT->caption() ?></span></script></span></td>
		<td data-name="RESULT"<?php echo $view_barcode_ivf->RESULT->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_RESULT" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_RESULT">
<span<?php echo $view_barcode_ivf->RESULT->viewAttributes() ?>>
<?php echo $view_barcode_ivf->RESULT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_HospID"><script id="tpc_view_barcode_ivf_HospID" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_barcode_ivf->HospID->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_HospID" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_HospID">
<span<?php echo $view_barcode_ivf->HospID->viewAttributes() ?>>
<?php echo $view_barcode_ivf->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_DrID"><script id="tpc_view_barcode_ivf_DrID" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->DrID->caption() ?></span></script></span></td>
		<td data-name="DrID"<?php echo $view_barcode_ivf->DrID->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_DrID" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_DrID">
<span<?php echo $view_barcode_ivf->DrID->viewAttributes() ?>>
<?php echo $view_barcode_ivf->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_DrDepartment"><script id="tpc_view_barcode_ivf_DrDepartment" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->DrDepartment->caption() ?></span></script></span></td>
		<td data-name="DrDepartment"<?php echo $view_barcode_ivf->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_DrDepartment" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_DrDepartment">
<span<?php echo $view_barcode_ivf->DrDepartment->viewAttributes() ?>>
<?php echo $view_barcode_ivf->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_Doctor"><script id="tpc_view_barcode_ivf_Doctor" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->Doctor->caption() ?></span></script></span></td>
		<td data-name="Doctor"<?php echo $view_barcode_ivf->Doctor->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_Doctor" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_Doctor">
<span<?php echo $view_barcode_ivf->Doctor->viewAttributes() ?>>
<?php echo $view_barcode_ivf->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->Male->Visible) { // Male ?>
	<tr id="r_Male">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_Male"><script id="tpc_view_barcode_ivf_Male" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->Male->caption() ?></span></script></span></td>
		<td data-name="Male"<?php echo $view_barcode_ivf->Male->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_Male" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_Male">
<span<?php echo $view_barcode_ivf->Male->viewAttributes() ?>>
<?php echo $view_barcode_ivf->Male->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->Female->Visible) { // Female ?>
	<tr id="r_Female">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_Female"><script id="tpc_view_barcode_ivf_Female" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->Female->caption() ?></span></script></span></td>
		<td data-name="Female"<?php echo $view_barcode_ivf->Female->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_Female" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_Female">
<span<?php echo $view_barcode_ivf->Female->viewAttributes() ?>>
<?php echo $view_barcode_ivf->Female->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_status"><script id="tpc_view_barcode_ivf_status" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $view_barcode_ivf->status->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_status" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_status">
<span<?php echo $view_barcode_ivf->status->viewAttributes() ?>>
<?php echo $view_barcode_ivf->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_createdby"><script id="tpc_view_barcode_ivf_createdby" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_barcode_ivf->createdby->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_createdby" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_createdby">
<span<?php echo $view_barcode_ivf->createdby->viewAttributes() ?>>
<?php echo $view_barcode_ivf->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_createddatetime"><script id="tpc_view_barcode_ivf_createddatetime" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_barcode_ivf->createddatetime->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_createddatetime" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_createddatetime">
<span<?php echo $view_barcode_ivf->createddatetime->viewAttributes() ?>>
<?php echo $view_barcode_ivf->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_modifiedby"><script id="tpc_view_barcode_ivf_modifiedby" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_barcode_ivf->modifiedby->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_modifiedby" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_modifiedby">
<span<?php echo $view_barcode_ivf->modifiedby->viewAttributes() ?>>
<?php echo $view_barcode_ivf->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_modifieddatetime"><script id="tpc_view_barcode_ivf_modifieddatetime" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_barcode_ivf->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_modifieddatetime" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_modifieddatetime">
<span<?php echo $view_barcode_ivf->modifieddatetime->viewAttributes() ?>>
<?php echo $view_barcode_ivf->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->malepropic->Visible) { // malepropic ?>
	<tr id="r_malepropic">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_malepropic"><script id="tpc_view_barcode_ivf_malepropic" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->malepropic->caption() ?></span></script></span></td>
		<td data-name="malepropic"<?php echo $view_barcode_ivf->malepropic->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_malepropic" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_malepropic">
<span<?php echo $view_barcode_ivf->malepropic->viewAttributes() ?>>
<?php echo $view_barcode_ivf->malepropic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->femalepropic->Visible) { // femalepropic ?>
	<tr id="r_femalepropic">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_femalepropic"><script id="tpc_view_barcode_ivf_femalepropic" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->femalepropic->caption() ?></span></script></span></td>
		<td data-name="femalepropic"<?php echo $view_barcode_ivf->femalepropic->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_femalepropic" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_femalepropic">
<span<?php echo $view_barcode_ivf->femalepropic->viewAttributes() ?>>
<?php echo $view_barcode_ivf->femalepropic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->HusbandEducation->Visible) { // HusbandEducation ?>
	<tr id="r_HusbandEducation">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_HusbandEducation"><script id="tpc_view_barcode_ivf_HusbandEducation" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->HusbandEducation->caption() ?></span></script></span></td>
		<td data-name="HusbandEducation"<?php echo $view_barcode_ivf->HusbandEducation->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_HusbandEducation" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_HusbandEducation">
<span<?php echo $view_barcode_ivf->HusbandEducation->viewAttributes() ?>>
<?php echo $view_barcode_ivf->HusbandEducation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->WifeEducation->Visible) { // WifeEducation ?>
	<tr id="r_WifeEducation">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_WifeEducation"><script id="tpc_view_barcode_ivf_WifeEducation" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->WifeEducation->caption() ?></span></script></span></td>
		<td data-name="WifeEducation"<?php echo $view_barcode_ivf->WifeEducation->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_WifeEducation" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_WifeEducation">
<span<?php echo $view_barcode_ivf->WifeEducation->viewAttributes() ?>>
<?php echo $view_barcode_ivf->WifeEducation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<tr id="r_HusbandWorkHours">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_HusbandWorkHours"><script id="tpc_view_barcode_ivf_HusbandWorkHours" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->HusbandWorkHours->caption() ?></span></script></span></td>
		<td data-name="HusbandWorkHours"<?php echo $view_barcode_ivf->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_HusbandWorkHours" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_HusbandWorkHours">
<span<?php echo $view_barcode_ivf->HusbandWorkHours->viewAttributes() ?>>
<?php echo $view_barcode_ivf->HusbandWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<tr id="r_WifeWorkHours">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_WifeWorkHours"><script id="tpc_view_barcode_ivf_WifeWorkHours" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->WifeWorkHours->caption() ?></span></script></span></td>
		<td data-name="WifeWorkHours"<?php echo $view_barcode_ivf->WifeWorkHours->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_WifeWorkHours" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_WifeWorkHours">
<span<?php echo $view_barcode_ivf->WifeWorkHours->viewAttributes() ?>>
<?php echo $view_barcode_ivf->WifeWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->PatientLanguage->Visible) { // PatientLanguage ?>
	<tr id="r_PatientLanguage">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_PatientLanguage"><script id="tpc_view_barcode_ivf_PatientLanguage" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->PatientLanguage->caption() ?></span></script></span></td>
		<td data-name="PatientLanguage"<?php echo $view_barcode_ivf->PatientLanguage->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_PatientLanguage" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_PatientLanguage">
<span<?php echo $view_barcode_ivf->PatientLanguage->viewAttributes() ?>>
<?php echo $view_barcode_ivf->PatientLanguage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->ReferedBy->Visible) { // ReferedBy ?>
	<tr id="r_ReferedBy">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_ReferedBy"><script id="tpc_view_barcode_ivf_ReferedBy" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->ReferedBy->caption() ?></span></script></span></td>
		<td data-name="ReferedBy"<?php echo $view_barcode_ivf->ReferedBy->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_ReferedBy" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_ReferedBy">
<span<?php echo $view_barcode_ivf->ReferedBy->viewAttributes() ?>>
<?php echo $view_barcode_ivf->ReferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf->ReferPhNo->Visible) { // ReferPhNo ?>
	<tr id="r_ReferPhNo">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_ReferPhNo"><script id="tpc_view_barcode_ivf_ReferPhNo" class="view_barcode_ivfview" type="text/html"><span><?php echo $view_barcode_ivf->ReferPhNo->caption() ?></span></script></span></td>
		<td data-name="ReferPhNo"<?php echo $view_barcode_ivf->ReferPhNo->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_ReferPhNo" class="view_barcode_ivfview" type="text/html">
<span id="el_view_barcode_ivf_ReferPhNo">
<span<?php echo $view_barcode_ivf->ReferPhNo->viewAttributes() ?>>
<?php echo $view_barcode_ivf->ReferPhNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_barcode_ivfview" class="ew-custom-template"></div>
<script id="tpm_view_barcode_ivfview" type="text/html">
<div id="ct_view_barcode_ivf_view"><?php
$aa = "ewbarcode.php?data=".$Page->id->CoupleID."&encode=EAN-13&height=40&color=%23000000";
?>
<table>
	 <tbody>
		<tr><td>Couple ID</td><td>:</td><td>{{:CoupleID}}</td></tr>
		<tr><td>Patient Name</td><td>:</td><td>{{:PatientName}}</td></tr>
		<tr><td>Partner Name</td><td>:</td><td>{{:PartnerName}}</td></tr>
	</tbody>
</table>
<table>
	 <tbody>
		<tr>
			<td style="width:60px;"></td>
			<td><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
			<td></td>
		</tr>
	</tbody>
</table>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_barcode_ivf->Rows) ?> };
ew.applyTemplate("tpd_view_barcode_ivfview", "tpm_view_barcode_ivfview", "view_barcode_ivfview", "<?php echo $view_barcode_ivf->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_barcode_ivfview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_barcode_ivf_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_barcode_ivf->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_barcode_ivf_view->terminate();
?>