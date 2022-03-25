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
$view_ivf_treatment_plan_delete = new view_ivf_treatment_plan_delete();

// Run the page
$view_ivf_treatment_plan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_treatment_plan_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_ivf_treatment_plandelete = currentForm = new ew.Form("fview_ivf_treatment_plandelete", "delete");

// Form_CustomValidate event
fview_ivf_treatment_plandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_treatment_plandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ivf_treatment_plandelete.lists["x_RIDNO"] = <?php echo $view_ivf_treatment_plan_delete->RIDNO->Lookup->toClientList() ?>;
fview_ivf_treatment_plandelete.lists["x_RIDNO"].options = <?php echo JsonEncode($view_ivf_treatment_plan_delete->RIDNO->lookupOptions()) ?>;
fview_ivf_treatment_plandelete.lists["x_treatment_status"] = <?php echo $view_ivf_treatment_plan_delete->treatment_status->Lookup->toClientList() ?>;
fview_ivf_treatment_plandelete.lists["x_treatment_status"].options = <?php echo JsonEncode($view_ivf_treatment_plan_delete->treatment_status->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_plandelete.lists["x_ARTCYCLE"] = <?php echo $view_ivf_treatment_plan_delete->ARTCYCLE->Lookup->toClientList() ?>;
fview_ivf_treatment_plandelete.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($view_ivf_treatment_plan_delete->ARTCYCLE->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_plandelete.lists["x_RESULT"] = <?php echo $view_ivf_treatment_plan_delete->RESULT->Lookup->toClientList() ?>;
fview_ivf_treatment_plandelete.lists["x_RESULT"].options = <?php echo JsonEncode($view_ivf_treatment_plan_delete->RESULT->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ivf_treatment_plan_delete->showPageHeader(); ?>
<?php
$view_ivf_treatment_plan_delete->showMessage();
?>
<form name="fview_ivf_treatment_plandelete" id="fview_ivf_treatment_plandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_treatment_plan_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_treatment_plan_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment_plan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_ivf_treatment_plan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_ivf_treatment_plan->CoupleID->Visible) { // CoupleID ?>
		<th class="<?php echo $view_ivf_treatment_plan->CoupleID->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID"><?php echo $view_ivf_treatment_plan->CoupleID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $view_ivf_treatment_plan->PatientID->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID"><?php echo $view_ivf_treatment_plan->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $view_ivf_treatment_plan->PatientName->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName"><?php echo $view_ivf_treatment_plan->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->WifeCell->Visible) { // WifeCell ?>
		<th class="<?php echo $view_ivf_treatment_plan->WifeCell->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell"><?php echo $view_ivf_treatment_plan->WifeCell->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $view_ivf_treatment_plan->PartnerID->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID"><?php echo $view_ivf_treatment_plan->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $view_ivf_treatment_plan->PartnerName->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName"><?php echo $view_ivf_treatment_plan->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->HusbandCell->Visible) { // HusbandCell ?>
		<th class="<?php echo $view_ivf_treatment_plan->HusbandCell->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell"><?php echo $view_ivf_treatment_plan->HusbandCell->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $view_ivf_treatment_plan->RIDNO->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO"><?php echo $view_ivf_treatment_plan->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<th class="<?php echo $view_ivf_treatment_plan->TreatmentStartDate->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate"><?php echo $view_ivf_treatment_plan->TreatmentStartDate->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
		<th class="<?php echo $view_ivf_treatment_plan->treatment_status->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status"><?php echo $view_ivf_treatment_plan->treatment_status->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<th class="<?php echo $view_ivf_treatment_plan->ARTCYCLE->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE"><?php echo $view_ivf_treatment_plan->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_treatment_plan->RESULT->Visible) { // RESULT ?>
		<th class="<?php echo $view_ivf_treatment_plan->RESULT->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT"><?php echo $view_ivf_treatment_plan->RESULT->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_ivf_treatment_plan_delete->RecCnt = 0;
$i = 0;
while (!$view_ivf_treatment_plan_delete->Recordset->EOF) {
	$view_ivf_treatment_plan_delete->RecCnt++;
	$view_ivf_treatment_plan_delete->RowCnt++;

	// Set row properties
	$view_ivf_treatment_plan->resetAttributes();
	$view_ivf_treatment_plan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_ivf_treatment_plan_delete->loadRowValues($view_ivf_treatment_plan_delete->Recordset);

	// Render row
	$view_ivf_treatment_plan_delete->renderRow();
?>
	<tr<?php echo $view_ivf_treatment_plan->rowAttributes() ?>>
<?php if ($view_ivf_treatment_plan->CoupleID->Visible) { // CoupleID ?>
		<td<?php echo $view_ivf_treatment_plan->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID">
<span<?php echo $view_ivf_treatment_plan->CoupleID->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->CoupleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientID->Visible) { // PatientID ?>
		<td<?php echo $view_ivf_treatment_plan->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID">
<span<?php echo $view_ivf_treatment_plan->PatientID->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientName->Visible) { // PatientName ?>
		<td<?php echo $view_ivf_treatment_plan->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName">
<span<?php echo $view_ivf_treatment_plan->PatientName->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->WifeCell->Visible) { // WifeCell ?>
		<td<?php echo $view_ivf_treatment_plan->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell">
<span<?php echo $view_ivf_treatment_plan->WifeCell->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->WifeCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerID->Visible) { // PartnerID ?>
		<td<?php echo $view_ivf_treatment_plan->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID">
<span<?php echo $view_ivf_treatment_plan->PartnerID->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $view_ivf_treatment_plan->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName">
<span<?php echo $view_ivf_treatment_plan->PartnerName->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->HusbandCell->Visible) { // HusbandCell ?>
		<td<?php echo $view_ivf_treatment_plan->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell">
<span<?php echo $view_ivf_treatment_plan->HusbandCell->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->HusbandCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->RIDNO->Visible) { // RIDNO ?>
		<td<?php echo $view_ivf_treatment_plan->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO">
<span<?php echo $view_ivf_treatment_plan->RIDNO->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td<?php echo $view_ivf_treatment_plan->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $view_ivf_treatment_plan->TreatmentStartDate->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
		<td<?php echo $view_ivf_treatment_plan->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status">
<span<?php echo $view_ivf_treatment_plan->treatment_status->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->treatment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td<?php echo $view_ivf_treatment_plan->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE">
<span<?php echo $view_ivf_treatment_plan->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_treatment_plan->RESULT->Visible) { // RESULT ?>
		<td<?php echo $view_ivf_treatment_plan->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_delete->RowCnt ?>_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT">
<span<?php echo $view_ivf_treatment_plan->RESULT->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->RESULT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_ivf_treatment_plan_delete->Recordset->moveNext();
}
$view_ivf_treatment_plan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ivf_treatment_plan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_ivf_treatment_plan_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_ivf_treatment_plan_delete->terminate();
?>