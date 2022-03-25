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
<?php include_once "header.php"; ?>
<?php if (!$view_barcode_ivf_view->isExport()) { ?>
<script>
var fview_barcode_ivfview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_barcode_ivfview = currentForm = new ew.Form("fview_barcode_ivfview", "view");
	loadjs.done("fview_barcode_ivfview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_barcode_ivf_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_barcode_ivf">
<input type="hidden" name="modal" value="<?php echo (int)$view_barcode_ivf_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_barcode_ivf_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_id"><script id="tpc_view_barcode_ivf_id" type="text/html"><?php echo $view_barcode_ivf_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $view_barcode_ivf_view->id->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_id" type="text/html"><span id="el_view_barcode_ivf_id">
<span<?php echo $view_barcode_ivf_view->id->viewAttributes() ?>><?php echo $view_barcode_ivf_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->_Barcode->Visible) { // Barcode ?>
	<tr id="r__Barcode">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf__Barcode"><script id="tpc_view_barcode_ivf__Barcode" type="text/html"><?php echo $view_barcode_ivf_view->_Barcode->caption() ?></script></span></td>
		<td data-name="_Barcode" <?php echo $view_barcode_ivf_view->_Barcode->cellAttributes() ?>>
<script id="orig_view_barcode_ivf__Barcode" class="view_barcode_ivfview" type="text/html">
<?php echo $view_barcode_ivf_view->_Barcode->getViewValue() ?>
</script><script id="tpx_view_barcode_ivf__Barcode" class="view_barcode_ivfview" type="text/html">
<?php echo Barcode()->show($view_barcode_ivf_view->_Barcode->CurrentValue, 'EAN-13', 60) ?>
</script>
<script id="tpx_view_barcode_ivf__Barcode" type="text/html"><span id="el_view_barcode_ivf__Barcode">
<span<?php echo $view_barcode_ivf_view->_Barcode->viewAttributes() ?>>{{include tmpl=~getTemplate("#tpx_view_barcode_ivf__Barcode")/}}</span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->CoupleID->Visible) { // CoupleID ?>
	<tr id="r_CoupleID">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_CoupleID"><script id="tpc_view_barcode_ivf_CoupleID" type="text/html"><?php echo $view_barcode_ivf_view->CoupleID->caption() ?></script></span></td>
		<td data-name="CoupleID" <?php echo $view_barcode_ivf_view->CoupleID->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_CoupleID" type="text/html"><span id="el_view_barcode_ivf_CoupleID">
<span<?php echo $view_barcode_ivf_view->CoupleID->viewAttributes() ?>><?php echo $view_barcode_ivf_view->CoupleID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_PatientName"><script id="tpc_view_barcode_ivf_PatientName" type="text/html"><?php echo $view_barcode_ivf_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $view_barcode_ivf_view->PatientName->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_PatientName" type="text/html"><span id="el_view_barcode_ivf_PatientName">
<span<?php echo $view_barcode_ivf_view->PatientName->viewAttributes() ?>><?php echo $view_barcode_ivf_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_PatientID"><script id="tpc_view_barcode_ivf_PatientID" type="text/html"><?php echo $view_barcode_ivf_view->PatientID->caption() ?></script></span></td>
		<td data-name="PatientID" <?php echo $view_barcode_ivf_view->PatientID->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_PatientID" type="text/html"><span id="el_view_barcode_ivf_PatientID">
<span<?php echo $view_barcode_ivf_view->PatientID->viewAttributes() ?>><?php echo $view_barcode_ivf_view->PatientID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_PartnerName"><script id="tpc_view_barcode_ivf_PartnerName" type="text/html"><?php echo $view_barcode_ivf_view->PartnerName->caption() ?></script></span></td>
		<td data-name="PartnerName" <?php echo $view_barcode_ivf_view->PartnerName->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_PartnerName" type="text/html"><span id="el_view_barcode_ivf_PartnerName">
<span<?php echo $view_barcode_ivf_view->PartnerName->viewAttributes() ?>><?php echo $view_barcode_ivf_view->PartnerName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->PartnerID->Visible) { // PartnerID ?>
	<tr id="r_PartnerID">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_PartnerID"><script id="tpc_view_barcode_ivf_PartnerID" type="text/html"><?php echo $view_barcode_ivf_view->PartnerID->caption() ?></script></span></td>
		<td data-name="PartnerID" <?php echo $view_barcode_ivf_view->PartnerID->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_PartnerID" type="text/html"><span id="el_view_barcode_ivf_PartnerID">
<span<?php echo $view_barcode_ivf_view->PartnerID->viewAttributes() ?>><?php echo $view_barcode_ivf_view->PartnerID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->WifeCell->Visible) { // WifeCell ?>
	<tr id="r_WifeCell">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_WifeCell"><script id="tpc_view_barcode_ivf_WifeCell" type="text/html"><?php echo $view_barcode_ivf_view->WifeCell->caption() ?></script></span></td>
		<td data-name="WifeCell" <?php echo $view_barcode_ivf_view->WifeCell->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_WifeCell" type="text/html"><span id="el_view_barcode_ivf_WifeCell">
<span<?php echo $view_barcode_ivf_view->WifeCell->viewAttributes() ?>><?php echo $view_barcode_ivf_view->WifeCell->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->HusbandCell->Visible) { // HusbandCell ?>
	<tr id="r_HusbandCell">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_HusbandCell"><script id="tpc_view_barcode_ivf_HusbandCell" type="text/html"><?php echo $view_barcode_ivf_view->HusbandCell->caption() ?></script></span></td>
		<td data-name="HusbandCell" <?php echo $view_barcode_ivf_view->HusbandCell->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_HusbandCell" type="text/html"><span id="el_view_barcode_ivf_HusbandCell">
<span<?php echo $view_barcode_ivf_view->HusbandCell->viewAttributes() ?>><?php echo $view_barcode_ivf_view->HusbandCell->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->WifeEmail->Visible) { // WifeEmail ?>
	<tr id="r_WifeEmail">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_WifeEmail"><script id="tpc_view_barcode_ivf_WifeEmail" type="text/html"><?php echo $view_barcode_ivf_view->WifeEmail->caption() ?></script></span></td>
		<td data-name="WifeEmail" <?php echo $view_barcode_ivf_view->WifeEmail->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_WifeEmail" type="text/html"><span id="el_view_barcode_ivf_WifeEmail">
<span<?php echo $view_barcode_ivf_view->WifeEmail->viewAttributes() ?>><?php echo $view_barcode_ivf_view->WifeEmail->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->HusbandEmail->Visible) { // HusbandEmail ?>
	<tr id="r_HusbandEmail">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_HusbandEmail"><script id="tpc_view_barcode_ivf_HusbandEmail" type="text/html"><?php echo $view_barcode_ivf_view->HusbandEmail->caption() ?></script></span></td>
		<td data-name="HusbandEmail" <?php echo $view_barcode_ivf_view->HusbandEmail->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_HusbandEmail" type="text/html"><span id="el_view_barcode_ivf_HusbandEmail">
<span<?php echo $view_barcode_ivf_view->HusbandEmail->viewAttributes() ?>><?php echo $view_barcode_ivf_view->HusbandEmail->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<tr id="r_ARTCYCLE">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_ARTCYCLE"><script id="tpc_view_barcode_ivf_ARTCYCLE" type="text/html"><?php echo $view_barcode_ivf_view->ARTCYCLE->caption() ?></script></span></td>
		<td data-name="ARTCYCLE" <?php echo $view_barcode_ivf_view->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_ARTCYCLE" type="text/html"><span id="el_view_barcode_ivf_ARTCYCLE">
<span<?php echo $view_barcode_ivf_view->ARTCYCLE->viewAttributes() ?>><?php echo $view_barcode_ivf_view->ARTCYCLE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->RESULT->Visible) { // RESULT ?>
	<tr id="r_RESULT">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_RESULT"><script id="tpc_view_barcode_ivf_RESULT" type="text/html"><?php echo $view_barcode_ivf_view->RESULT->caption() ?></script></span></td>
		<td data-name="RESULT" <?php echo $view_barcode_ivf_view->RESULT->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_RESULT" type="text/html"><span id="el_view_barcode_ivf_RESULT">
<span<?php echo $view_barcode_ivf_view->RESULT->viewAttributes() ?>><?php echo $view_barcode_ivf_view->RESULT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_HospID"><script id="tpc_view_barcode_ivf_HospID" type="text/html"><?php echo $view_barcode_ivf_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $view_barcode_ivf_view->HospID->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_HospID" type="text/html"><span id="el_view_barcode_ivf_HospID">
<span<?php echo $view_barcode_ivf_view->HospID->viewAttributes() ?>><?php echo $view_barcode_ivf_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_DrID"><script id="tpc_view_barcode_ivf_DrID" type="text/html"><?php echo $view_barcode_ivf_view->DrID->caption() ?></script></span></td>
		<td data-name="DrID" <?php echo $view_barcode_ivf_view->DrID->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_DrID" type="text/html"><span id="el_view_barcode_ivf_DrID">
<span<?php echo $view_barcode_ivf_view->DrID->viewAttributes() ?>><?php echo $view_barcode_ivf_view->DrID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_DrDepartment"><script id="tpc_view_barcode_ivf_DrDepartment" type="text/html"><?php echo $view_barcode_ivf_view->DrDepartment->caption() ?></script></span></td>
		<td data-name="DrDepartment" <?php echo $view_barcode_ivf_view->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_DrDepartment" type="text/html"><span id="el_view_barcode_ivf_DrDepartment">
<span<?php echo $view_barcode_ivf_view->DrDepartment->viewAttributes() ?>><?php echo $view_barcode_ivf_view->DrDepartment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_Doctor"><script id="tpc_view_barcode_ivf_Doctor" type="text/html"><?php echo $view_barcode_ivf_view->Doctor->caption() ?></script></span></td>
		<td data-name="Doctor" <?php echo $view_barcode_ivf_view->Doctor->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_Doctor" type="text/html"><span id="el_view_barcode_ivf_Doctor">
<span<?php echo $view_barcode_ivf_view->Doctor->viewAttributes() ?>><?php echo $view_barcode_ivf_view->Doctor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->Male->Visible) { // Male ?>
	<tr id="r_Male">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_Male"><script id="tpc_view_barcode_ivf_Male" type="text/html"><?php echo $view_barcode_ivf_view->Male->caption() ?></script></span></td>
		<td data-name="Male" <?php echo $view_barcode_ivf_view->Male->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_Male" type="text/html"><span id="el_view_barcode_ivf_Male">
<span<?php echo $view_barcode_ivf_view->Male->viewAttributes() ?>><?php echo $view_barcode_ivf_view->Male->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->Female->Visible) { // Female ?>
	<tr id="r_Female">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_Female"><script id="tpc_view_barcode_ivf_Female" type="text/html"><?php echo $view_barcode_ivf_view->Female->caption() ?></script></span></td>
		<td data-name="Female" <?php echo $view_barcode_ivf_view->Female->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_Female" type="text/html"><span id="el_view_barcode_ivf_Female">
<span<?php echo $view_barcode_ivf_view->Female->viewAttributes() ?>><?php echo $view_barcode_ivf_view->Female->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_status"><script id="tpc_view_barcode_ivf_status" type="text/html"><?php echo $view_barcode_ivf_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $view_barcode_ivf_view->status->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_status" type="text/html"><span id="el_view_barcode_ivf_status">
<span<?php echo $view_barcode_ivf_view->status->viewAttributes() ?>><?php echo $view_barcode_ivf_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_createdby"><script id="tpc_view_barcode_ivf_createdby" type="text/html"><?php echo $view_barcode_ivf_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $view_barcode_ivf_view->createdby->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_createdby" type="text/html"><span id="el_view_barcode_ivf_createdby">
<span<?php echo $view_barcode_ivf_view->createdby->viewAttributes() ?>><?php echo $view_barcode_ivf_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_createddatetime"><script id="tpc_view_barcode_ivf_createddatetime" type="text/html"><?php echo $view_barcode_ivf_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $view_barcode_ivf_view->createddatetime->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_createddatetime" type="text/html"><span id="el_view_barcode_ivf_createddatetime">
<span<?php echo $view_barcode_ivf_view->createddatetime->viewAttributes() ?>><?php echo $view_barcode_ivf_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_modifiedby"><script id="tpc_view_barcode_ivf_modifiedby" type="text/html"><?php echo $view_barcode_ivf_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $view_barcode_ivf_view->modifiedby->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_modifiedby" type="text/html"><span id="el_view_barcode_ivf_modifiedby">
<span<?php echo $view_barcode_ivf_view->modifiedby->viewAttributes() ?>><?php echo $view_barcode_ivf_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_modifieddatetime"><script id="tpc_view_barcode_ivf_modifieddatetime" type="text/html"><?php echo $view_barcode_ivf_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $view_barcode_ivf_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_modifieddatetime" type="text/html"><span id="el_view_barcode_ivf_modifieddatetime">
<span<?php echo $view_barcode_ivf_view->modifieddatetime->viewAttributes() ?>><?php echo $view_barcode_ivf_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->malepropic->Visible) { // malepropic ?>
	<tr id="r_malepropic">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_malepropic"><script id="tpc_view_barcode_ivf_malepropic" type="text/html"><?php echo $view_barcode_ivf_view->malepropic->caption() ?></script></span></td>
		<td data-name="malepropic" <?php echo $view_barcode_ivf_view->malepropic->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_malepropic" type="text/html"><span id="el_view_barcode_ivf_malepropic">
<span<?php echo $view_barcode_ivf_view->malepropic->viewAttributes() ?>><?php echo $view_barcode_ivf_view->malepropic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->femalepropic->Visible) { // femalepropic ?>
	<tr id="r_femalepropic">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_femalepropic"><script id="tpc_view_barcode_ivf_femalepropic" type="text/html"><?php echo $view_barcode_ivf_view->femalepropic->caption() ?></script></span></td>
		<td data-name="femalepropic" <?php echo $view_barcode_ivf_view->femalepropic->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_femalepropic" type="text/html"><span id="el_view_barcode_ivf_femalepropic">
<span<?php echo $view_barcode_ivf_view->femalepropic->viewAttributes() ?>><?php echo $view_barcode_ivf_view->femalepropic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->HusbandEducation->Visible) { // HusbandEducation ?>
	<tr id="r_HusbandEducation">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_HusbandEducation"><script id="tpc_view_barcode_ivf_HusbandEducation" type="text/html"><?php echo $view_barcode_ivf_view->HusbandEducation->caption() ?></script></span></td>
		<td data-name="HusbandEducation" <?php echo $view_barcode_ivf_view->HusbandEducation->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_HusbandEducation" type="text/html"><span id="el_view_barcode_ivf_HusbandEducation">
<span<?php echo $view_barcode_ivf_view->HusbandEducation->viewAttributes() ?>><?php echo $view_barcode_ivf_view->HusbandEducation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->WifeEducation->Visible) { // WifeEducation ?>
	<tr id="r_WifeEducation">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_WifeEducation"><script id="tpc_view_barcode_ivf_WifeEducation" type="text/html"><?php echo $view_barcode_ivf_view->WifeEducation->caption() ?></script></span></td>
		<td data-name="WifeEducation" <?php echo $view_barcode_ivf_view->WifeEducation->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_WifeEducation" type="text/html"><span id="el_view_barcode_ivf_WifeEducation">
<span<?php echo $view_barcode_ivf_view->WifeEducation->viewAttributes() ?>><?php echo $view_barcode_ivf_view->WifeEducation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<tr id="r_HusbandWorkHours">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_HusbandWorkHours"><script id="tpc_view_barcode_ivf_HusbandWorkHours" type="text/html"><?php echo $view_barcode_ivf_view->HusbandWorkHours->caption() ?></script></span></td>
		<td data-name="HusbandWorkHours" <?php echo $view_barcode_ivf_view->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_HusbandWorkHours" type="text/html"><span id="el_view_barcode_ivf_HusbandWorkHours">
<span<?php echo $view_barcode_ivf_view->HusbandWorkHours->viewAttributes() ?>><?php echo $view_barcode_ivf_view->HusbandWorkHours->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<tr id="r_WifeWorkHours">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_WifeWorkHours"><script id="tpc_view_barcode_ivf_WifeWorkHours" type="text/html"><?php echo $view_barcode_ivf_view->WifeWorkHours->caption() ?></script></span></td>
		<td data-name="WifeWorkHours" <?php echo $view_barcode_ivf_view->WifeWorkHours->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_WifeWorkHours" type="text/html"><span id="el_view_barcode_ivf_WifeWorkHours">
<span<?php echo $view_barcode_ivf_view->WifeWorkHours->viewAttributes() ?>><?php echo $view_barcode_ivf_view->WifeWorkHours->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->PatientLanguage->Visible) { // PatientLanguage ?>
	<tr id="r_PatientLanguage">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_PatientLanguage"><script id="tpc_view_barcode_ivf_PatientLanguage" type="text/html"><?php echo $view_barcode_ivf_view->PatientLanguage->caption() ?></script></span></td>
		<td data-name="PatientLanguage" <?php echo $view_barcode_ivf_view->PatientLanguage->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_PatientLanguage" type="text/html"><span id="el_view_barcode_ivf_PatientLanguage">
<span<?php echo $view_barcode_ivf_view->PatientLanguage->viewAttributes() ?>><?php echo $view_barcode_ivf_view->PatientLanguage->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->ReferedBy->Visible) { // ReferedBy ?>
	<tr id="r_ReferedBy">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_ReferedBy"><script id="tpc_view_barcode_ivf_ReferedBy" type="text/html"><?php echo $view_barcode_ivf_view->ReferedBy->caption() ?></script></span></td>
		<td data-name="ReferedBy" <?php echo $view_barcode_ivf_view->ReferedBy->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_ReferedBy" type="text/html"><span id="el_view_barcode_ivf_ReferedBy">
<span<?php echo $view_barcode_ivf_view->ReferedBy->viewAttributes() ?>><?php echo $view_barcode_ivf_view->ReferedBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_barcode_ivf_view->ReferPhNo->Visible) { // ReferPhNo ?>
	<tr id="r_ReferPhNo">
		<td class="<?php echo $view_barcode_ivf_view->TableLeftColumnClass ?>"><span id="elh_view_barcode_ivf_ReferPhNo"><script id="tpc_view_barcode_ivf_ReferPhNo" type="text/html"><?php echo $view_barcode_ivf_view->ReferPhNo->caption() ?></script></span></td>
		<td data-name="ReferPhNo" <?php echo $view_barcode_ivf_view->ReferPhNo->cellAttributes() ?>>
<script id="tpx_view_barcode_ivf_ReferPhNo" type="text/html"><span id="el_view_barcode_ivf_ReferPhNo">
<span<?php echo $view_barcode_ivf_view->ReferPhNo->viewAttributes() ?>><?php echo $view_barcode_ivf_view->ReferPhNo->getViewValue() ?></span>
</span></script>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_barcode_ivf->Rows) ?> };
	ew.applyTemplate("tpd_view_barcode_ivfview", "tpm_view_barcode_ivfview", "view_barcode_ivfview", "<?php echo $view_barcode_ivf->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_barcode_ivfview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_barcode_ivf_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_barcode_ivf_view->isExport()) { ?>
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
$view_barcode_ivf_view->terminate();
?>