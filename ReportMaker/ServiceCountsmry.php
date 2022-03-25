<?php
namespace PHPMaker2019\HIMS___2019;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($ServiceCount_summary))
	$ServiceCount_summary = new ServiceCount_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$ServiceCount_summary;

// Run the page
$Page->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());
if (!$DashboardReport)
	WriteHeader(FALSE);

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php include_once "rheader.php" ?>
<?php } ?>
<script>
currentPageID = ew.PAGE_ID = "summary"; // Page ID
</script>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Form object
var fServiceCountsummary = currentForm = new ew.Form("fServiceCountsummary");

// Validate method
fServiceCountsummary.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;
		elm = this.getElements("x_createdDate");
		if (elm && !ew.checkDateDef(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->createdDate->errorMessage()) ?>"))
				return false;
		}
		elm = this.getElements("y_createdDate");
		if (elm && !ew.checkDateDef(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->createdDate->errorMessage()) ?>"))
				return false;
		}

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fServiceCountsummary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fServiceCountsummary.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fServiceCountsummary.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
</script>
<?php } ?>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-container" class="container-fluid ew-container">
<?php } ?>
<?php if (ReportParam("showfilter") === TRUE) { ?>
<?php $Page->showFilterList(TRUE) ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->render("body");
	$Page->SearchOptions->render("body");
	$Page->FilterOptions->render("body");
	$Page->GenerateOptions->render("body");
}
?>
</div>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Center Container - Report -->
<div id="ew-center" class="<?php echo $ServiceCount_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<div id="report_summary">
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="fServiceCountsummary" id="fServiceCountsummary" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fServiceCountsummary-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_createdDate" class="ew-cell form-group">
	<label for="x_createdDate" class="ew-search-caption ew-label"><?php echo $Page->createdDate->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("BETWEEN"); ?><input type="hidden" name="z_createdDate" id="z_createdDate" value="BETWEEN"></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->createdDate->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="ServiceCount" data-field="x_createdDate" id="x_createdDate" name="x_createdDate" maxlength="10" placeholder="<?php echo HtmlEncode($Page->createdDate->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->createdDate->AdvancedSearch->SearchValue) ?>"<?php echo $Page->createdDate->editAttributes() ?>>
<?php if (!$ServiceCount->createdDate->ReadOnly && !$ServiceCount->createdDate->Disabled && !isset($ServiceCount->createdDate->EditAttrs["readonly"]) && !isset($ServiceCount->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fServiceCountsummary", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	<span class="ew-search-cond btw1_createdDate"><label><?php echo $ReportLanguage->Phrase("AND") ?></label></span>
	<span class="ew-search-field btw1_createdDate">
<?php PrependClass($Page->createdDate->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="ServiceCount" data-field="x_createdDate" id="y_createdDate" name="y_createdDate" maxlength="10" placeholder="<?php echo HtmlEncode($Page->createdDate->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->createdDate->AdvancedSearch->SearchValue2) ?>"<?php echo $Page->createdDate->editAttributes() ?>>
<?php if (!$ServiceCount->createdDate->ReadOnly && !$ServiceCount->createdDate->Disabled && !isset($ServiceCount->createdDate->EditAttrs["readonly"]) && !isset($ServiceCount->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fServiceCountsummary", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
</div>
</div>
<div class="ew-row d-sm-flex">
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><?php echo $ReportLanguage->phrase("Search") ?></button>
<button type="reset" name="btn-reset" id="btn-reset" class="btn hide"><?php echo $ReportLanguage->phrase("Reset") ?></button>
</div>
</div>
</form>
<script>
fServiceCountsummary.filterList = <?php echo $Page->getFilterList() ?>;
</script>
<!-- Search form (end) -->
<?php } ?>
<?php if ($Page->ShowCurrentFilter) { ?>
<?php $Page->showFilterList() ?>
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGroup = $Page->TotalGroups;
} else {
	$Page->StopGroup = $Page->StartGroup + $Page->DisplayGroups - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGroup) > intval($Page->TotalGroups))
	$Page->StopGroup = $Page->TotalGroups;
$Page->RecordCount = 0;
$Page->RecordIndex = 0;

// Get first row
if ($Page->TotalGroups > 0) {
	$Page->loadGroupRowValues(TRUE);
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray($Page->StopGroup - $Page->StartGroup + 1, -1);
while ($Page->GroupRecordset && !$Page->GroupRecordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->GroupCount > 1) { ?>
</tbody>
</table>
</div>
<?php if (!($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "ServiceCount_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<span data-class="tpb<?php echo $Page->GroupCount - 1 ?>_ServiceCount"><?php echo $Page->PageBreakContent ?></span>
<?php } ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_ServiceCount" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->DEPARTMENT->Visible) { ?>
	<?php if ($Page->DEPARTMENT->ShowGroupHeaderAsRow) { ?>
	<td data-field="DEPARTMENT">&nbsp;</td>
	<?php } else { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="DEPARTMENT"><div class="ServiceCount_DEPARTMENT"><span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="DEPARTMENT">
<?php if ($Page->sortUrl($Page->DEPARTMENT) == "") { ?>
		<div class="ew-table-header-btn ServiceCount_DEPARTMENT">
			<span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer ServiceCount_DEPARTMENT" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->DEPARTMENT) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($Page->TestCount->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="TestCount"><div class="ServiceCount_TestCount"><span class="ew-table-header-caption"><?php echo $Page->TestCount->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="TestCount">
<?php if ($Page->sortUrl($Page->TestCount) == "") { ?>
		<div class="ew-table-header-btn ServiceCount_TestCount">
			<span class="ew-table-header-caption"><?php echo $Page->TestCount->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer ServiceCount_TestCount" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->TestCount) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->TestCount->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->TestCount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->TestCount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->SumAmount->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="SumAmount"><div class="ServiceCount_SumAmount"><span class="ew-table-header-caption"><?php echo $Page->SumAmount->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="SumAmount">
<?php if ($Page->sortUrl($Page->SumAmount) == "") { ?>
		<div class="ew-table-header-btn ServiceCount_SumAmount">
			<span class="ew-table-header-caption"><?php echo $Page->SumAmount->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer ServiceCount_SumAmount" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->SumAmount) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->SumAmount->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->SumAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->SumAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->createdDate->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="createdDate"><div class="ServiceCount_createdDate"><span class="ew-table-header-caption"><?php echo $Page->createdDate->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="createdDate">
<?php if ($Page->sortUrl($Page->createdDate) == "") { ?>
		<div class="ew-table-header-btn ServiceCount_createdDate">
			<span class="ew-table-header-caption"><?php echo $Page->createdDate->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer ServiceCount_createdDate" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->createdDate) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->createdDate->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="HospID"><div class="ServiceCount_HospID"><span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="HospID">
<?php if ($Page->sortUrl($Page->HospID) == "") { ?>
		<div class="ew-table-header-btn ServiceCount_HospID">
			<span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer ServiceCount_HospID" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->HospID) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGroups == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}

	// Build detail SQL
	$where = DetailFilterSql($Page->DEPARTMENT, $Page->getSqlFirstGroupField(), $Page->DEPARTMENT->groupValue(), $Page->Dbid);
	if ($Page->PageFirstGroupFilter <> "") $Page->PageFirstGroupFilter .= " OR ";
	$Page->PageFirstGroupFilter .= $where;
	if ($Page->Filter != "")
		$where = "($Page->Filter) AND ($where)";
	$sql = BuildReportSql($Page->getSqlSelect(), $Page->getSqlWhere(), $Page->getSqlGroupBy(), $Page->getSqlHaving(), $Page->getSqlOrderBy(), $where, $Page->Sort);
	$Page->DetailRecordCount = 0;
	if ($Page->Recordset = $Page->getRecordset($sql)) {
		$Page->DetailRecordCount = $Page->Recordset->recordCount();
		if (GetConnectionType($Page->Dbid) == "ORACLE") { // Oracle, cannot moveFirst, use another recordset
			$rswrk = $Page->getRecordset($sql);
			$Page->DetailRows = $rswrk ? $rswrk->getRows() : [];
			$rswrk->close();
		} else {
			$Page->DetailRows = $Page->Recordset ? $Page->Recordset->getRows() : [];
		}
	}
	if ($Page->DetailRecordCount > 0)
		$Page->loadRowValues(TRUE);
	$Page->GroupIndexes[$Page->GroupCount] = $Page->DetailRecordCount;
	while ($Page->Recordset && !$Page->Recordset->EOF) { // Loop detail records
		$Page->RecordCount++;
		$Page->RecordIndex++;
?>
<?php if ($Page->DEPARTMENT->Visible && $Page->checkLevelBreak(1) && $Page->DEPARTMENT->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_TOTAL;
		$Page->RowTotalType = ROWTOTAL_GROUP;
		$Page->RowTotalSubType = ROWTOTAL_HEADER;
		$Page->RowGroupLevel = 1;
		$Page->DEPARTMENT->Count = $Page->getSummaryCount(1);
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->DEPARTMENT->Visible) { ?>
		<td data-field="DEPARTMENT"<?php echo $Page->DEPARTMENT->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="DEPARTMENT" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 1) ?>"<?php echo $Page->DEPARTMENT->cellAttributes() ?>>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
		<span class="ew-summary-caption ServiceCount_DEPARTMENT"><span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span></span>
<?php } else { ?>
	<?php if ($Page->sortUrl($Page->DEPARTMENT) == "") { ?>
		<span class="ew-summary-caption ServiceCount_DEPARTMENT">
			<span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span>
		</span>
	<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption ServiceCount_DEPARTMENT" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->DEPARTMENT) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</span>
	<?php } ?>
<?php } ?>
		<?php echo $ReportLanguage->phrase("SummaryColon") ?>
<span data-class="tpx<?php echo $Page->GroupCount ?>_ServiceCount_DEPARTMENT"<?php echo $Page->DEPARTMENT->viewAttributes() ?>><?php echo $Page->DEPARTMENT->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->DEPARTMENT->Count,0,-2,-2,-2) ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->DEPARTMENT->Visible) { ?>
	<?php if ($Page->DEPARTMENT->ShowGroupHeaderAsRow) { ?>
		<td data-field="DEPARTMENT"<?php echo $Page->DEPARTMENT->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="DEPARTMENT"<?php echo $Page->DEPARTMENT->cellAttributes(); ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_ServiceCount_DEPARTMENT"<?php echo $Page->DEPARTMENT->viewAttributes() ?>><?php echo $Page->DEPARTMENT->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($Page->TestCount->Visible) { ?>
		<td data-field="TestCount"<?php echo $Page->TestCount->cellAttributes() ?>>
<span<?php echo $Page->TestCount->viewAttributes() ?>><?php echo $Page->TestCount->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->SumAmount->Visible) { ?>
		<td data-field="SumAmount"<?php echo $Page->SumAmount->cellAttributes() ?>>
<span<?php echo $Page->SumAmount->viewAttributes() ?>><?php echo $Page->SumAmount->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->createdDate->Visible) { ?>
		<td data-field="createdDate"<?php echo $Page->createdDate->cellAttributes() ?>>
<span<?php echo $Page->createdDate->viewAttributes() ?>><?php echo $Page->createdDate->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
		<td data-field="HospID"<?php echo $Page->HospID->cellAttributes() ?>>
<span<?php echo $Page->HospID->viewAttributes() ?>><?php echo $Page->HospID->getViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();

		// Show Footers
?>
<?php
	} // End detail records loop
?>
<?php

	// Next group
	$Page->loadGroupRowValues();

	// Show header if page break
	if ($Page->Export <> "")
		$Page->ShowHeader = ($Page->ExportPageBreakCount == 0) ? FALSE : ($Page->GroupCount % $Page->ExportPageBreakCount == 0);

	// Page_Breaking server event
	if ($Page->ShowHeader)
		$Page->Page_Breaking($Page->ShowHeader, $Page->PageBreakContent);
	$Page->GroupCount++;

	// Handle EOF
	if (!$Page->GroupRecordset || $Page->GroupRecordset->EOF)
		$Page->ShowHeader = FALSE;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$Page->SumAmount->Count = $Page->GrandCounts[2];
	$Page->SumAmount->SumValue = $Page->GrandSummaries[2]; // Load SUM
	$Page->TestCount->Count = $Page->GrandCounts[1];
	$Page->TestCount->CntValue = $Page->GrandCounts[1]; // Load CNT
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_TOTAL;
	$Page->RowTotalType = ROWTOTAL_GRAND;
	$Page->RowTotalSubType = ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ew-rpt-grand-summary";
	$Page->renderRow();
?>
<?php if ($Page->DEPARTMENT->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2) ?></span>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo $Page->GroupColumnCount ?>" class="ew-rpt-grp-aggregate">&nbsp;</td>
<?php } ?>
<?php if ($Page->TestCount->Visible) { ?>
		<td data-field="TestCount"<?php echo $Page->TestCount->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptCnt") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->TestCount->viewAttributes() ?>><?php echo $Page->TestCount->CntViewValue ?></span></td>
<?php } ?>
<?php if ($Page->SumAmount->Visible) { ?>
		<td data-field="SumAmount"<?php echo $Page->SumAmount->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->SumAmount->viewAttributes() ?>><?php echo $Page->SumAmount->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->createdDate->Visible) { ?>
		<td data-field="createdDate"<?php echo $Page->createdDate->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
		<td data-field="HospID"<?php echo $Page->HospID->cellAttributes() ?>></td>
<?php } ?>
	</tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo $Page->GroupColumnCount ?>" class="ew-rpt-grp-aggregate"><?php echo $ReportLanguage->phrase("RptSum") ?></td>
<?php } ?>
<?php if ($Page->TestCount->Visible) { ?>
		<td data-field="TestCount"<?php echo $Page->TestCount->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->SumAmount->Visible) { ?>
		<td data-field="SumAmount"<?php echo $Page->SumAmount->cellAttributes() ?>>
<span<?php echo $Page->SumAmount->viewAttributes() ?>><?php echo $Page->SumAmount->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->createdDate->Visible) { ?>
		<td data-field="createdDate"<?php echo $Page->createdDate->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
		<td data-field="HospID"<?php echo $Page->HospID->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
	</tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo $Page->GroupColumnCount ?>" class="ew-rpt-grp-aggregate"><?php echo $ReportLanguage->phrase("RptCnt") ?></td>
<?php } ?>
<?php if ($Page->TestCount->Visible) { ?>
		<td data-field="TestCount"<?php echo $Page->TestCount->cellAttributes() ?>>
<span<?php echo $Page->TestCount->viewAttributes() ?>><?php echo $Page->TestCount->CntViewValue ?></span></td>
<?php } ?>
<?php if ($Page->SumAmount->Visible) { ?>
		<td data-field="SumAmount"<?php echo $Page->SumAmount->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->createdDate->Visible) { ?>
		<td data-field="createdDate"<?php echo $Page->createdDate->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
		<td data-field="HospID"<?php echo $Page->HospID->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
	</tr>
<?php } ?>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && FALSE) { // No header displayed ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_ServiceCount" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
</div>
<?php if (!($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "ServiceCount_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<?php } ?>
</div>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Bottom Container -->
<div class="row">
<div id="ew-bottom" class="<?php echo $ServiceCount_summary->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

// Set up page break
if (($Page->Export == "print" || $Page->Export == "pdf" || $Page->Export == "email" || $Page->Export == "excel" && $USE_PHPEXCEL || $Page->Export == "word" && $USE_PHPWORD) && $Page->ExportChartPageBreak) {

	// Page_Breaking server event
	$Page->Page_Breaking($Page->ExportChartPageBreak, $Page->PageBreakContent);
	$ServiceCount->Chart1->PageBreakType = "before"; // Page break type
	$ServiceCount->Chart1->PageBreak = $Table->ExportChartPageBreak;
	$ServiceCount->Chart1->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$ServiceCount->Chart1->DrillDownInPanel = $Page->DrillDownInPanel;
$ServiceCount->Chart1->render("ew-chart-bottom");
?>
<?php if ($Page->Export <> "email" && !$Page->DrillDown) { ?>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $ReportLanguage->Phrase("Top") ?></a>
<?php } ?>
<?php } ?>
<?php } ?>
<?php
if (!$DashboardReport) {

// Set up page break
if (($Page->Export == "print" || $Page->Export == "pdf" || $Page->Export == "email" || $Page->Export == "excel" && $USE_PHPEXCEL || $Page->Export == "word" && $USE_PHPWORD) && $Page->ExportChartPageBreak) {

	// Page_Breaking server event
	$Page->Page_Breaking($Page->ExportChartPageBreak, $Page->PageBreakContent);
	$ServiceCount->Chart2->PageBreakType = "before"; // Page break type
	$ServiceCount->Chart2->PageBreak = $Table->ExportChartPageBreak;
	$ServiceCount->Chart2->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$ServiceCount->Chart2->DrillDownInPanel = $Page->DrillDownInPanel;
$ServiceCount->Chart2->render("ew-chart-bottom");
?>
<?php if ($Page->Export <> "email" && !$Page->DrillDown) { ?>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $ReportLanguage->Phrase("Top") ?></a>
<?php } ?>
<?php } ?>
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
</div>
<!-- /#ew-bottom -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.ew-container -->
<?php } ?>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php

// Close recordsets
if ($Page->GroupRecordset)
	$Page->GroupRecordset->Close();
if ($Page->Recordset)
	$Page->Recordset->Close();
?>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php include_once "footer.php"; ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>