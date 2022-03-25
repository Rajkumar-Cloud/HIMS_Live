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
$view_lab_resultreleased_view = new view_lab_resultreleased_view();

// Run the page
$view_lab_resultreleased_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleased_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_resultreleased->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_lab_resultreleasedview = currentForm = new ew.Form("fview_lab_resultreleasedview", "view");

// Form_CustomValidate event
fview_lab_resultreleasedview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_resultreleasedview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_resultreleasedview.lists["x_TestUnit"] = <?php echo $view_lab_resultreleased_view->TestUnit->Lookup->toClientList() ?>;
fview_lab_resultreleasedview.lists["x_TestUnit"].options = <?php echo JsonEncode($view_lab_resultreleased_view->TestUnit->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_lab_resultreleased->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_lab_resultreleased_view->ExportOptions->render("body") ?>
<?php $view_lab_resultreleased_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_lab_resultreleased_view->showPageHeader(); ?>
<?php
$view_lab_resultreleased_view->showMessage();
?>
<form name="fview_lab_resultreleasedview" id="fview_lab_resultreleasedview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_resultreleased_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_resultreleased_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_resultreleased">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_resultreleased_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_lab_resultreleased->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_id"><?php echo $view_lab_resultreleased->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_lab_resultreleased->id->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_id">
<span<?php echo $view_lab_resultreleased->id->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_PatID"><?php echo $view_lab_resultreleased->PatID->caption() ?></span></td>
		<td data-name="PatID"<?php echo $view_lab_resultreleased->PatID->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_PatID">
<span<?php echo $view_lab_resultreleased->PatID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_PatientName"><?php echo $view_lab_resultreleased->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $view_lab_resultreleased->PatientName->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_PatientName">
<span<?php echo $view_lab_resultreleased->PatientName->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_Age"><?php echo $view_lab_resultreleased->Age->caption() ?></span></td>
		<td data-name="Age"<?php echo $view_lab_resultreleased->Age->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Age">
<span<?php echo $view_lab_resultreleased->Age->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_Gender"><?php echo $view_lab_resultreleased->Gender->caption() ?></span></td>
		<td data-name="Gender"<?php echo $view_lab_resultreleased->Gender->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Gender">
<span<?php echo $view_lab_resultreleased->Gender->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->sid->Visible) { // sid ?>
	<tr id="r_sid">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_sid"><?php echo $view_lab_resultreleased->sid->caption() ?></span></td>
		<td data-name="sid"<?php echo $view_lab_resultreleased->sid->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_sid">
<span<?php echo $view_lab_resultreleased->sid->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->sid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->ItemCode->Visible) { // ItemCode ?>
	<tr id="r_ItemCode">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_ItemCode"><?php echo $view_lab_resultreleased->ItemCode->caption() ?></span></td>
		<td data-name="ItemCode"<?php echo $view_lab_resultreleased->ItemCode->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_ItemCode">
<span<?php echo $view_lab_resultreleased->ItemCode->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->ItemCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->DEptCd->Visible) { // DEptCd ?>
	<tr id="r_DEptCd">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_DEptCd"><?php echo $view_lab_resultreleased->DEptCd->caption() ?></span></td>
		<td data-name="DEptCd"<?php echo $view_lab_resultreleased->DEptCd->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_DEptCd">
<span<?php echo $view_lab_resultreleased->DEptCd->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DEptCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->Resulted->Visible) { // Resulted ?>
	<tr id="r_Resulted">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_Resulted"><?php echo $view_lab_resultreleased->Resulted->caption() ?></span></td>
		<td data-name="Resulted"<?php echo $view_lab_resultreleased->Resulted->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Resulted">
<span<?php echo $view_lab_resultreleased->Resulted->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Resulted->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->Services->Visible) { // Services ?>
	<tr id="r_Services">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_Services"><?php echo $view_lab_resultreleased->Services->caption() ?></span></td>
		<td data-name="Services"<?php echo $view_lab_resultreleased->Services->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Services">
<span<?php echo $view_lab_resultreleased->Services->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Services->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->LabReport->Visible) { // LabReport ?>
	<tr id="r_LabReport">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_LabReport"><?php echo $view_lab_resultreleased->LabReport->caption() ?></span></td>
		<td data-name="LabReport"<?php echo $view_lab_resultreleased->LabReport->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_LabReport">
<span<?php echo $view_lab_resultreleased->LabReport->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->LabReport->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->Pic1->Visible) { // Pic1 ?>
	<tr id="r_Pic1">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_Pic1"><?php echo $view_lab_resultreleased->Pic1->caption() ?></span></td>
		<td data-name="Pic1"<?php echo $view_lab_resultreleased->Pic1->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Pic1">
<span<?php echo $view_lab_resultreleased->Pic1->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Pic1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->Pic2->Visible) { // Pic2 ?>
	<tr id="r_Pic2">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_Pic2"><?php echo $view_lab_resultreleased->Pic2->caption() ?></span></td>
		<td data-name="Pic2"<?php echo $view_lab_resultreleased->Pic2->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Pic2">
<span<?php echo $view_lab_resultreleased->Pic2->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Pic2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->TestUnit->Visible) { // TestUnit ?>
	<tr id="r_TestUnit">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_TestUnit"><?php echo $view_lab_resultreleased->TestUnit->caption() ?></span></td>
		<td data-name="TestUnit"<?php echo $view_lab_resultreleased->TestUnit->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_TestUnit">
<span<?php echo $view_lab_resultreleased->TestUnit->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->TestUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_RefValue"><?php echo $view_lab_resultreleased->RefValue->caption() ?></span></td>
		<td data-name="RefValue"<?php echo $view_lab_resultreleased->RefValue->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_RefValue">
<span<?php echo $view_lab_resultreleased->RefValue->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->RefValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_Order"><?php echo $view_lab_resultreleased->Order->caption() ?></span></td>
		<td data-name="Order"<?php echo $view_lab_resultreleased->Order->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Order">
<span<?php echo $view_lab_resultreleased->Order->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->Repeated->Visible) { // Repeated ?>
	<tr id="r_Repeated">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_Repeated"><?php echo $view_lab_resultreleased->Repeated->caption() ?></span></td>
		<td data-name="Repeated"<?php echo $view_lab_resultreleased->Repeated->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Repeated">
<span<?php echo $view_lab_resultreleased->Repeated->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Repeated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->Vid->Visible) { // Vid ?>
	<tr id="r_Vid">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_Vid"><?php echo $view_lab_resultreleased->Vid->caption() ?></span></td>
		<td data-name="Vid"<?php echo $view_lab_resultreleased->Vid->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Vid">
<span<?php echo $view_lab_resultreleased->Vid->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Vid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->invoiceId->Visible) { // invoiceId ?>
	<tr id="r_invoiceId">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_invoiceId"><?php echo $view_lab_resultreleased->invoiceId->caption() ?></span></td>
		<td data-name="invoiceId"<?php echo $view_lab_resultreleased->invoiceId->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_invoiceId">
<span<?php echo $view_lab_resultreleased->invoiceId->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->invoiceId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_DrID"><?php echo $view_lab_resultreleased->DrID->caption() ?></span></td>
		<td data-name="DrID"<?php echo $view_lab_resultreleased->DrID->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_DrID">
<span<?php echo $view_lab_resultreleased->DrID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DrID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->DrCODE->Visible) { // DrCODE ?>
	<tr id="r_DrCODE">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_DrCODE"><?php echo $view_lab_resultreleased->DrCODE->caption() ?></span></td>
		<td data-name="DrCODE"<?php echo $view_lab_resultreleased->DrCODE->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_DrCODE">
<span<?php echo $view_lab_resultreleased->DrCODE->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DrCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->DrName->Visible) { // DrName ?>
	<tr id="r_DrName">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_DrName"><?php echo $view_lab_resultreleased->DrName->caption() ?></span></td>
		<td data-name="DrName"<?php echo $view_lab_resultreleased->DrName->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_DrName">
<span<?php echo $view_lab_resultreleased->DrName->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_Department"><?php echo $view_lab_resultreleased->Department->caption() ?></span></td>
		<td data-name="Department"<?php echo $view_lab_resultreleased->Department->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Department">
<span<?php echo $view_lab_resultreleased->Department->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_createddatetime"><?php echo $view_lab_resultreleased->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $view_lab_resultreleased->createddatetime->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_createddatetime">
<span<?php echo $view_lab_resultreleased->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_status"><?php echo $view_lab_resultreleased->status->caption() ?></span></td>
		<td data-name="status"<?php echo $view_lab_resultreleased->status->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_status">
<span<?php echo $view_lab_resultreleased->status->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_resultreleased->TestType->Visible) { // TestType ?>
	<tr id="r_TestType">
		<td class="<?php echo $view_lab_resultreleased_view->TableLeftColumnClass ?>"><span id="elh_view_lab_resultreleased_TestType"><?php echo $view_lab_resultreleased->TestType->caption() ?></span></td>
		<td data-name="TestType"<?php echo $view_lab_resultreleased->TestType->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_TestType">
<span<?php echo $view_lab_resultreleased->TestType->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->TestType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_lab_resultreleased_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_resultreleased->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_resultreleased_view->terminate();
?>