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
<?php include_once "header.php"; ?>
<script>
var fview_semenanalysisdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_semenanalysisdelete = currentForm = new ew.Form("fview_semenanalysisdelete", "delete");
	loadjs.done("fview_semenanalysisdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_semenanalysis_delete->showPageHeader(); ?>
<?php
$view_semenanalysis_delete->showMessage();
?>
<form name="fview_semenanalysisdelete" id="fview_semenanalysisdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_semenanalysis_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_semenanalysis_delete->id->Visible) { // id ?>
		<th class="<?php echo $view_semenanalysis_delete->id->headerCellClass() ?>"><span id="elh_view_semenanalysis_id" class="view_semenanalysis_id"><?php echo $view_semenanalysis_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->PaID->Visible) { // PaID ?>
		<th class="<?php echo $view_semenanalysis_delete->PaID->headerCellClass() ?>"><span id="elh_view_semenanalysis_PaID" class="view_semenanalysis_PaID"><?php echo $view_semenanalysis_delete->PaID->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->PaName->Visible) { // PaName ?>
		<th class="<?php echo $view_semenanalysis_delete->PaName->headerCellClass() ?>"><span id="elh_view_semenanalysis_PaName" class="view_semenanalysis_PaName"><?php echo $view_semenanalysis_delete->PaName->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->PaMobile->Visible) { // PaMobile ?>
		<th class="<?php echo $view_semenanalysis_delete->PaMobile->headerCellClass() ?>"><span id="elh_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile"><?php echo $view_semenanalysis_delete->PaMobile->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $view_semenanalysis_delete->PartnerID->headerCellClass() ?>"><span id="elh_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID"><?php echo $view_semenanalysis_delete->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $view_semenanalysis_delete->PartnerName->headerCellClass() ?>"><span id="elh_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName"><?php echo $view_semenanalysis_delete->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->PartnerMobile->Visible) { // PartnerMobile ?>
		<th class="<?php echo $view_semenanalysis_delete->PartnerMobile->headerCellClass() ?>"><span id="elh_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile"><?php echo $view_semenanalysis_delete->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->RequestDr->Visible) { // RequestDr ?>
		<th class="<?php echo $view_semenanalysis_delete->RequestDr->headerCellClass() ?>"><span id="elh_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr"><?php echo $view_semenanalysis_delete->RequestDr->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->CollectionDate->Visible) { // CollectionDate ?>
		<th class="<?php echo $view_semenanalysis_delete->CollectionDate->headerCellClass() ?>"><span id="elh_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate"><?php echo $view_semenanalysis_delete->CollectionDate->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->ResultDate->Visible) { // ResultDate ?>
		<th class="<?php echo $view_semenanalysis_delete->ResultDate->headerCellClass() ?>"><span id="elh_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate"><?php echo $view_semenanalysis_delete->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->RequestSample->Visible) { // RequestSample ?>
		<th class="<?php echo $view_semenanalysis_delete->RequestSample->headerCellClass() ?>"><span id="elh_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample"><?php echo $view_semenanalysis_delete->RequestSample->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $view_semenanalysis_delete->TidNo->headerCellClass() ?>"><span id="elh_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo"><?php echo $view_semenanalysis_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_semenanalysis_delete->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<th class="<?php echo $view_semenanalysis_delete->PREG_TEST_DATE->headerCellClass() ?>"><span id="elh_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE"><?php echo $view_semenanalysis_delete->PREG_TEST_DATE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_semenanalysis_delete->RecordCount = 0;
$i = 0;
while (!$view_semenanalysis_delete->Recordset->EOF) {
	$view_semenanalysis_delete->RecordCount++;
	$view_semenanalysis_delete->RowCount++;

	// Set row properties
	$view_semenanalysis->resetAttributes();
	$view_semenanalysis->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_semenanalysis_delete->loadRowValues($view_semenanalysis_delete->Recordset);

	// Render row
	$view_semenanalysis_delete->renderRow();
?>
	<tr <?php echo $view_semenanalysis->rowAttributes() ?>>
<?php if ($view_semenanalysis_delete->id->Visible) { // id ?>
		<td <?php echo $view_semenanalysis_delete->id->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_id" class="view_semenanalysis_id">
<span<?php echo $view_semenanalysis_delete->id->viewAttributes() ?>><?php echo $view_semenanalysis_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->PaID->Visible) { // PaID ?>
		<td <?php echo $view_semenanalysis_delete->PaID->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_PaID" class="view_semenanalysis_PaID">
<span<?php echo $view_semenanalysis_delete->PaID->viewAttributes() ?>><?php echo $view_semenanalysis_delete->PaID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->PaName->Visible) { // PaName ?>
		<td <?php echo $view_semenanalysis_delete->PaName->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_PaName" class="view_semenanalysis_PaName">
<span<?php echo $view_semenanalysis_delete->PaName->viewAttributes() ?>><?php echo $view_semenanalysis_delete->PaName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->PaMobile->Visible) { // PaMobile ?>
		<td <?php echo $view_semenanalysis_delete->PaMobile->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile">
<span<?php echo $view_semenanalysis_delete->PaMobile->viewAttributes() ?>><?php echo $view_semenanalysis_delete->PaMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->PartnerID->Visible) { // PartnerID ?>
		<td <?php echo $view_semenanalysis_delete->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID">
<span<?php echo $view_semenanalysis_delete->PartnerID->viewAttributes() ?>><?php echo $view_semenanalysis_delete->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->PartnerName->Visible) { // PartnerName ?>
		<td <?php echo $view_semenanalysis_delete->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName">
<span<?php echo $view_semenanalysis_delete->PartnerName->viewAttributes() ?>><?php echo $view_semenanalysis_delete->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->PartnerMobile->Visible) { // PartnerMobile ?>
		<td <?php echo $view_semenanalysis_delete->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile">
<span<?php echo $view_semenanalysis_delete->PartnerMobile->viewAttributes() ?>><?php echo $view_semenanalysis_delete->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->RequestDr->Visible) { // RequestDr ?>
		<td <?php echo $view_semenanalysis_delete->RequestDr->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr">
<span<?php echo $view_semenanalysis_delete->RequestDr->viewAttributes() ?>><?php echo $view_semenanalysis_delete->RequestDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->CollectionDate->Visible) { // CollectionDate ?>
		<td <?php echo $view_semenanalysis_delete->CollectionDate->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate">
<span<?php echo $view_semenanalysis_delete->CollectionDate->viewAttributes() ?>><?php echo $view_semenanalysis_delete->CollectionDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->ResultDate->Visible) { // ResultDate ?>
		<td <?php echo $view_semenanalysis_delete->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate">
<span<?php echo $view_semenanalysis_delete->ResultDate->viewAttributes() ?>><?php echo $view_semenanalysis_delete->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->RequestSample->Visible) { // RequestSample ?>
		<td <?php echo $view_semenanalysis_delete->RequestSample->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample">
<span<?php echo $view_semenanalysis_delete->RequestSample->viewAttributes() ?>><?php echo $view_semenanalysis_delete->RequestSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $view_semenanalysis_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo">
<span<?php echo $view_semenanalysis_delete->TidNo->viewAttributes() ?>><?php echo $view_semenanalysis_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_semenanalysis_delete->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td <?php echo $view_semenanalysis_delete->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_delete->RowCount ?>_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE">
<span<?php echo $view_semenanalysis_delete->PREG_TEST_DATE->viewAttributes() ?>><?php echo $view_semenanalysis_delete->PREG_TEST_DATE->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_semenanalysis_delete->terminate();
?>