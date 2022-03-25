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
$view_semenanalysis_delete = new view_semenanalysis_delete();

// Run the page
$view_semenanalysis_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_semenanalysis_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_semenanalysisdelete = currentForm = new ew.Form("fview_semenanalysisdelete", "delete");

// Form_CustomValidate event
fview_semenanalysisdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_semenanalysisdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_semenanalysisdelete.lists["x_RequestSample"] = <?php echo $view_semenanalysis_delete->RequestSample->Lookup->toClientList() ?>;
fview_semenanalysisdelete.lists["x_RequestSample"].options = <?php echo JsonEncode($view_semenanalysis_delete->RequestSample->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_semenanalysis_delete->showPageHeader(); ?>
<?php
$view_semenanalysis_delete->showMessage();
?>
<form name="fview_semenanalysisdelete" id="fview_semenanalysisdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_semenanalysis_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_semenanalysis_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_semenanalysis_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_semenanalysis->id->Visible) { // id ?>
		<th class="<?php echo $view_semenanalysis->id->headerCellClass() ?>"><span id="elh_view_semenanalysis_id" class="view_semenanalysis_id"><?php echo $view_semenanalysis->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->PaID->Visible) { // PaID ?>
		<th class="<?php echo $view_semenanalysis->PaID->headerCellClass() ?>"><span id="elh_view_semenanalysis_PaID" class="view_semenanalysis_PaID"><?php echo $view_semenanalysis->PaID->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->PaName->Visible) { // PaName ?>
		<th class="<?php echo $view_semenanalysis->PaName->headerCellClass() ?>"><span id="elh_view_semenanalysis_PaName" class="view_semenanalysis_PaName"><?php echo $view_semenanalysis->PaName->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->PaMobile->Visible) { // PaMobile ?>
		<th class="<?php echo $view_semenanalysis->PaMobile->headerCellClass() ?>"><span id="elh_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile"><?php echo $view_semenanalysis->PaMobile->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $view_semenanalysis->PartnerID->headerCellClass() ?>"><span id="elh_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID"><?php echo $view_semenanalysis->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $view_semenanalysis->PartnerName->headerCellClass() ?>"><span id="elh_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName"><?php echo $view_semenanalysis->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->PartnerMobile->Visible) { // PartnerMobile ?>
		<th class="<?php echo $view_semenanalysis->PartnerMobile->headerCellClass() ?>"><span id="elh_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile"><?php echo $view_semenanalysis->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->RequestDr->Visible) { // RequestDr ?>
		<th class="<?php echo $view_semenanalysis->RequestDr->headerCellClass() ?>"><span id="elh_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr"><?php echo $view_semenanalysis->RequestDr->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->CollectionDate->Visible) { // CollectionDate ?>
		<th class="<?php echo $view_semenanalysis->CollectionDate->headerCellClass() ?>"><span id="elh_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate"><?php echo $view_semenanalysis->CollectionDate->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->ResultDate->Visible) { // ResultDate ?>
		<th class="<?php echo $view_semenanalysis->ResultDate->headerCellClass() ?>"><span id="elh_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate"><?php echo $view_semenanalysis->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->RequestSample->Visible) { // RequestSample ?>
		<th class="<?php echo $view_semenanalysis->RequestSample->headerCellClass() ?>"><span id="elh_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample"><?php echo $view_semenanalysis->RequestSample->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $view_semenanalysis->TidNo->headerCellClass() ?>"><span id="elh_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo"><?php echo $view_semenanalysis->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<th class="<?php echo $view_semenanalysis->PREG_TEST_DATE->headerCellClass() ?>"><span id="elh_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE"><?php echo $view_semenanalysis->PREG_TEST_DATE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_semenanalysis_delete->RecCnt = 0;
$i = 0;
while (!$view_semenanalysis_delete->Recordset->EOF) {
	$view_semenanalysis_delete->RecCnt++;
	$view_semenanalysis_delete->RowCnt++;

	// Set row properties
	$view_semenanalysis->resetAttributes();
	$view_semenanalysis->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_semenanalysis_delete->loadRowValues($view_semenanalysis_delete->Recordset);

	// Render row
	$view_semenanalysis_delete->renderRow();
?>
	<tr<?php echo $view_semenanalysis->rowAttributes() ?>>
<?php if ($view_semenanalysis->id->Visible) { // id ?>
		<td<?php echo $view_semenanalysis->id->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_id" class="view_semenanalysis_id">
<span<?php echo $view_semenanalysis->id->viewAttributes() ?>>
<?php echo $view_semenanalysis->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->PaID->Visible) { // PaID ?>
		<td<?php echo $view_semenanalysis->PaID->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_PaID" class="view_semenanalysis_PaID">
<span<?php echo $view_semenanalysis->PaID->viewAttributes() ?>>
<?php echo $view_semenanalysis->PaID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->PaName->Visible) { // PaName ?>
		<td<?php echo $view_semenanalysis->PaName->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_PaName" class="view_semenanalysis_PaName">
<span<?php echo $view_semenanalysis->PaName->viewAttributes() ?>>
<?php echo $view_semenanalysis->PaName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->PaMobile->Visible) { // PaMobile ?>
		<td<?php echo $view_semenanalysis->PaMobile->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile">
<span<?php echo $view_semenanalysis->PaMobile->viewAttributes() ?>>
<?php echo $view_semenanalysis->PaMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->PartnerID->Visible) { // PartnerID ?>
		<td<?php echo $view_semenanalysis->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID">
<span<?php echo $view_semenanalysis->PartnerID->viewAttributes() ?>>
<?php echo $view_semenanalysis->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $view_semenanalysis->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName">
<span<?php echo $view_semenanalysis->PartnerName->viewAttributes() ?>>
<?php echo $view_semenanalysis->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->PartnerMobile->Visible) { // PartnerMobile ?>
		<td<?php echo $view_semenanalysis->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile">
<span<?php echo $view_semenanalysis->PartnerMobile->viewAttributes() ?>>
<?php echo $view_semenanalysis->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->RequestDr->Visible) { // RequestDr ?>
		<td<?php echo $view_semenanalysis->RequestDr->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr">
<span<?php echo $view_semenanalysis->RequestDr->viewAttributes() ?>>
<?php echo $view_semenanalysis->RequestDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->CollectionDate->Visible) { // CollectionDate ?>
		<td<?php echo $view_semenanalysis->CollectionDate->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate">
<span<?php echo $view_semenanalysis->CollectionDate->viewAttributes() ?>>
<?php echo $view_semenanalysis->CollectionDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->ResultDate->Visible) { // ResultDate ?>
		<td<?php echo $view_semenanalysis->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate">
<span<?php echo $view_semenanalysis->ResultDate->viewAttributes() ?>>
<?php echo $view_semenanalysis->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->RequestSample->Visible) { // RequestSample ?>
		<td<?php echo $view_semenanalysis->RequestSample->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample">
<span<?php echo $view_semenanalysis->RequestSample->viewAttributes() ?>>
<?php echo $view_semenanalysis->RequestSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->TidNo->Visible) { // TidNo ?>
		<td<?php echo $view_semenanalysis->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo">
<span<?php echo $view_semenanalysis->TidNo->viewAttributes() ?>>
<?php echo $view_semenanalysis->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td<?php echo $view_semenanalysis->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCnt ?>_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE">
<span<?php echo $view_semenanalysis->PREG_TEST_DATE->viewAttributes() ?>>
<?php echo $view_semenanalysis->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_semenanalysis_delete->Recordset->moveNext();
}
$view_semenanalysis_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_semenanalysis_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_semenanalysis_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_semenanalysis_delete->terminate();
?>