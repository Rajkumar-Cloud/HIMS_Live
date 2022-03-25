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
$view_ivf_oocytedenudation_embryology_chart_delete = new view_ivf_oocytedenudation_embryology_chart_delete();

// Run the page
$view_ivf_oocytedenudation_embryology_chart_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_oocytedenudation_embryology_chart_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_ivf_oocytedenudation_embryology_chartdelete = currentForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartdelete", "delete");

// Form_CustomValidate event
fview_ivf_oocytedenudation_embryology_chartdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_oocytedenudation_embryology_chartdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ivf_oocytedenudation_embryology_chart_delete->showPageHeader(); ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_delete->showMessage();
?>
<form name="fview_ivf_oocytedenudation_embryology_chartdelete" id="fview_ivf_oocytedenudation_embryology_chartdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_oocytedenudation_embryology_chart_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_ivf_oocytedenudation_embryology_chart_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_ivf_oocytedenudation_embryology_chart->id->Visible) { // id ?>
		<th class="<?php echo $view_ivf_oocytedenudation_embryology_chart->id->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_id" class="view_ivf_oocytedenudation_embryology_chart_id"><?php echo $view_ivf_oocytedenudation_embryology_chart->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
		<th class="<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="view_ivf_oocytedenudation_embryology_chart_OocyteNo"><?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Stage->Visible) { // Stage ?>
		<th class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Stage" class="view_ivf_oocytedenudation_embryology_chart_Stage"><?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="view_ivf_oocytedenudation_embryology_chart_RIDNo"><?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Name->Visible) { // Name ?>
		<th class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Name" class="view_ivf_oocytedenudation_embryology_chart_Name"><?php echo $view_ivf_oocytedenudation_embryology_chart->Name->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<th class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0sino->Visible) { // Day0sino ?>
		<th class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="view_ivf_oocytedenudation_embryology_chart_Day0sino"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_TidNo" class="view_ivf_oocytedenudation_embryology_chart_TidNo"><?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->DidNO->Visible) { // DidNO ?>
		<th class="<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_DidNO" class="view_ivf_oocytedenudation_embryology_chart_DidNO"><?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->caption() ?></span></th>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->headerCellClass() ?>"><span id="elh_view_ivf_oocytedenudation_embryology_chart_Remarks" class="view_ivf_oocytedenudation_embryology_chart_Remarks"><?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_ivf_oocytedenudation_embryology_chart_delete->RecCnt = 0;
$i = 0;
while (!$view_ivf_oocytedenudation_embryology_chart_delete->Recordset->EOF) {
	$view_ivf_oocytedenudation_embryology_chart_delete->RecCnt++;
	$view_ivf_oocytedenudation_embryology_chart_delete->RowCnt++;

	// Set row properties
	$view_ivf_oocytedenudation_embryology_chart->resetAttributes();
	$view_ivf_oocytedenudation_embryology_chart->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_ivf_oocytedenudation_embryology_chart_delete->loadRowValues($view_ivf_oocytedenudation_embryology_chart_delete->Recordset);

	// Render row
	$view_ivf_oocytedenudation_embryology_chart_delete->renderRow();
?>
	<tr<?php echo $view_ivf_oocytedenudation_embryology_chart->rowAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->id->Visible) { // id ?>
		<td<?php echo $view_ivf_oocytedenudation_embryology_chart->id->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_id" class="view_ivf_oocytedenudation_embryology_chart_id">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->id->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
		<td<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Stage->Visible) { // Stage ?>
		<td<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Stage" class="view_ivf_oocytedenudation_embryology_chart_Stage">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RIDNo->Visible) { // RIDNo ?>
		<td<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="view_ivf_oocytedenudation_embryology_chart_RIDNo">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Name->Visible) { // Name ?>
		<td<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Name" class="view_ivf_oocytedenudation_embryology_chart_Name">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<td<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0sino->Visible) { // Day0sino ?>
		<td<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="view_ivf_oocytedenudation_embryology_chart_Day0sino">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->TidNo->Visible) { // TidNo ?>
		<td<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_TidNo" class="view_ivf_oocytedenudation_embryology_chart_TidNo">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->DidNO->Visible) { // DidNO ?>
		<td<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_DidNO" class="view_ivf_oocytedenudation_embryology_chart_DidNO">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Remarks->Visible) { // Remarks ?>
		<td<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Remarks" class="view_ivf_oocytedenudation_embryology_chart_Remarks">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_ivf_oocytedenudation_embryology_chart_delete->Recordset->moveNext();
}
$view_ivf_oocytedenudation_embryology_chart_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ivf_oocytedenudation_embryology_chart_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_ivf_oocytedenudation_embryology_chart_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_delete->terminate();
?>