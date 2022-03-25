<?php
namespace PHPMaker2019\HIMS;

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
if (!isset($patientdashboard_summary))
	$patientdashboard_summary = new patientdashboard_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$patientdashboard_summary;

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
<?php if ($Page->Export == "" || $Page->Export == "print") { ?>
<script>
currentPageID = ew.PAGE_ID = "summary"; // Page ID
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
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
<div id="ew-center" class="<?php echo $patientdashboard_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
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
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->TotalGroups > 0) { ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "patientdashboard_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<span data-class="tpb<?php echo $Page->GroupCount - 1 ?>_patientdashboard"><?php echo $Page->PageBreakContent ?></span>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-header ew-grid-upper-panel">
<?php include "patientdashboard_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_patientdashboard" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->first_name->Visible) { ?>
	<?php if ($Page->first_name->ShowGroupHeaderAsRow) { ?>
	<td data-field="first_name">&nbsp;</td>
	<?php } else { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="first_name"><div class="patientdashboard_first_name"><span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="first_name">
<?php if ($Page->sortUrl($Page->first_name) == "") { ?>
		<div class="ew-table-header-btn patientdashboard_first_name">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patientdashboard_first_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->first_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="WhereDidYouHear"><div class="patientdashboard_WhereDidYouHear"><span class="ew-table-header-caption"><?php echo $Page->WhereDidYouHear->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="WhereDidYouHear">
<?php if ($Page->sortUrl($Page->WhereDidYouHear) == "") { ?>
		<div class="ew-table-header-btn patientdashboard_WhereDidYouHear">
			<span class="ew-table-header-caption"><?php echo $Page->WhereDidYouHear->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patientdashboard_WhereDidYouHear" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->WhereDidYouHear) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->WhereDidYouHear->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->street->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="street"><div class="patientdashboard_street"><span class="ew-table-header-caption"><?php echo $Page->street->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="street">
<?php if ($Page->sortUrl($Page->street) == "") { ?>
		<div class="ew-table-header-btn patientdashboard_street">
			<span class="ew-table-header-caption"><?php echo $Page->street->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patientdashboard_street" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->street) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->street->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->town->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="town"><div class="patientdashboard_town"><span class="ew-table-header-caption"><?php echo $Page->town->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="town">
<?php if ($Page->sortUrl($Page->town) == "") { ?>
		<div class="ew-table-header-btn patientdashboard_town">
			<span class="ew-table-header-caption"><?php echo $Page->town->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patientdashboard_town" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->town) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->town->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->province->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="province"><div class="patientdashboard_province"><span class="ew-table-header-caption"><?php echo $Page->province->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="province">
<?php if ($Page->sortUrl($Page->province) == "") { ?>
		<div class="ew-table-header-btn patientdashboard_province">
			<span class="ew-table-header-caption"><?php echo $Page->province->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patientdashboard_province" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->province) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->province->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->country->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="country"><div class="patientdashboard_country"><span class="ew-table-header-caption"><?php echo $Page->country->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="country">
<?php if ($Page->sortUrl($Page->country) == "") { ?>
		<div class="ew-table-header-btn patientdashboard_country">
			<span class="ew-table-header-caption"><?php echo $Page->country->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patientdashboard_country" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->country) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->country->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->postal_code->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="postal_code"><div class="patientdashboard_postal_code"><span class="ew-table-header-caption"><?php echo $Page->postal_code->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="postal_code">
<?php if ($Page->sortUrl($Page->postal_code) == "") { ?>
		<div class="ew-table-header-btn patientdashboard_postal_code">
			<span class="ew-table-header-caption"><?php echo $Page->postal_code->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patientdashboard_postal_code" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->postal_code) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->postal_code->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PEmail->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PEmail"><div class="patientdashboard_PEmail"><span class="ew-table-header-caption"><?php echo $Page->PEmail->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PEmail">
<?php if ($Page->sortUrl($Page->PEmail) == "") { ?>
		<div class="ew-table-header-btn patientdashboard_PEmail">
			<span class="ew-table-header-caption"><?php echo $Page->PEmail->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patientdashboard_PEmail" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PEmail) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PEmail->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PEmergencyContact"><div class="patientdashboard_PEmergencyContact"><span class="ew-table-header-caption"><?php echo $Page->PEmergencyContact->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PEmergencyContact">
<?php if ($Page->sortUrl($Page->PEmergencyContact) == "") { ?>
		<div class="ew-table-header-btn patientdashboard_PEmergencyContact">
			<span class="ew-table-header-caption"><?php echo $Page->PEmergencyContact->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patientdashboard_PEmergencyContact" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PEmergencyContact) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PEmergencyContact->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PEmergencyContact->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PEmergencyContact->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
	$where = DetailFilterSql($Page->first_name, $Page->getSqlFirstGroupField(), $Page->first_name->groupValue(), $Page->Dbid);
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
<?php if ($Page->first_name->Visible && $Page->checkLevelBreak(1) && $Page->first_name->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_TOTAL;
		$Page->RowTotalType = ROWTOTAL_GROUP;
		$Page->RowTotalSubType = ROWTOTAL_HEADER;
		$Page->RowGroupLevel = 1;
		$Page->first_name->Count = $Page->getSummaryCount(1);
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->first_name->Visible) { ?>
		<td data-field="first_name"<?php echo $Page->first_name->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="first_name" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 1) ?>"<?php echo $Page->first_name->cellAttributes() ?>>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
		<span class="ew-summary-caption patientdashboard_first_name"><span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span></span>
<?php } else { ?>
	<?php if ($Page->sortUrl($Page->first_name) == "") { ?>
		<span class="ew-summary-caption patientdashboard_first_name">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
		</span>
	<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption patientdashboard_first_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->first_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</span>
	<?php } ?>
<?php } ?>
		<?php echo $ReportLanguage->phrase("SummaryColon") ?>
<span data-class="tpx<?php echo $Page->GroupCount ?>_patientdashboard_first_name"<?php echo $Page->first_name->viewAttributes() ?>><?php echo $Page->first_name->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->first_name->Count,0,-2,-2,-2) ?></span>)</span>
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
<?php if ($Page->first_name->Visible) { ?>
	<?php if ($Page->first_name->ShowGroupHeaderAsRow) { ?>
		<td data-field="first_name"<?php echo $Page->first_name->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="first_name"<?php echo $Page->first_name->cellAttributes(); ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_patientdashboard_first_name"<?php echo $Page->first_name->viewAttributes() ?>><?php echo $Page->first_name->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { ?>
		<td data-field="WhereDidYouHear"<?php echo $Page->WhereDidYouHear->cellAttributes() ?>>
<span<?php echo $Page->WhereDidYouHear->viewAttributes() ?>><?php echo $Page->WhereDidYouHear->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->street->Visible) { ?>
		<td data-field="street"<?php echo $Page->street->cellAttributes() ?>>
<span<?php echo $Page->street->viewAttributes() ?>><?php echo $Page->street->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->town->Visible) { ?>
		<td data-field="town"<?php echo $Page->town->cellAttributes() ?>>
<span<?php echo $Page->town->viewAttributes() ?>><?php echo $Page->town->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->province->Visible) { ?>
		<td data-field="province"<?php echo $Page->province->cellAttributes() ?>>
<span<?php echo $Page->province->viewAttributes() ?>><?php echo $Page->province->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->country->Visible) { ?>
		<td data-field="country"<?php echo $Page->country->cellAttributes() ?>>
<span<?php echo $Page->country->viewAttributes() ?>><?php echo $Page->country->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->postal_code->Visible) { ?>
		<td data-field="postal_code"<?php echo $Page->postal_code->cellAttributes() ?>>
<span<?php echo $Page->postal_code->viewAttributes() ?>><?php echo $Page->postal_code->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->PEmail->Visible) { ?>
		<td data-field="PEmail"<?php echo $Page->PEmail->cellAttributes() ?>>
<span<?php echo $Page->PEmail->viewAttributes() ?>><?php echo $Page->PEmail->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { ?>
		<td data-field="PEmergencyContact"<?php echo $Page->PEmergencyContact->cellAttributes() ?>>
<span<?php echo $Page->PEmergencyContact->viewAttributes() ?>><?php echo $Page->PEmergencyContact->getViewValue() ?></span></td>
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
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_TOTAL;
	$Page->RowTotalType = ROWTOTAL_GRAND;
	$Page->RowTotalSubType = ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ew-rpt-grand-summary";
	$Page->renderRow();
?>
<?php if ($Page->first_name->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2) ?></span>)</span></td></tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
<?php } ?>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && FALSE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-header ew-grid-upper-panel">
<?php include "patientdashboard_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_patientdashboard" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->TotalGroups > 0) { ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "patientdashboard_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
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
<div id="ew-bottom" class="<?php echo $patientdashboard_summary->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

// Set up page break
if (($Page->Export == "print" || $Page->Export == "pdf" || $Page->Export == "email" || $Page->Export == "excel" && $USE_PHPEXCEL || $Page->Export == "word" && $USE_PHPWORD) && $Page->ExportChartPageBreak) {

	// Page_Breaking server event
	$Page->Page_Breaking($Page->ExportChartPageBreak, $Page->PageBreakContent);
	$patientdashboard->Patient->PageBreakType = "before"; // Page break type
	$patientdashboard->Patient->PageBreak = $Table->ExportChartPageBreak;
	$patientdashboard->Patient->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$patientdashboard->Patient->DrillDownInPanel = $Page->DrillDownInPanel;
$patientdashboard->Patient->render("ew-chart-bottom");
?>
<?php if ($Page->Export <> "email" && !$Page->DrillDown) { ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
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
	$patientdashboard->Doctor->PageBreakType = "before"; // Page break type
	$patientdashboard->Doctor->PageBreak = $Table->ExportChartPageBreak;
	$patientdashboard->Doctor->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$patientdashboard->Doctor->DrillDownInPanel = $Page->DrillDownInPanel;
$patientdashboard->Doctor->render("ew-chart-bottom");
?>
<?php if ($Page->Export <> "email" && !$Page->DrillDown) { ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
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
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
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