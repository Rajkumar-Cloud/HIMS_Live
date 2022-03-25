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
WriteHeader(FALSE, "utf-8");

// Create page object
$view_dashboard_summary_modeofpayment_details_preview = new view_dashboard_summary_modeofpayment_details_preview();

// Run the page
$view_dashboard_summary_modeofpayment_details_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_summary_modeofpayment_details_preview->Page_Render();
?>
<?php $view_dashboard_summary_modeofpayment_details_preview->showPageHeader(); ?>
<div class="card ew-grid view_dashboard_summary_modeofpayment_details"><!-- .card -->
<?php if ($view_dashboard_summary_modeofpayment_details_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_dashboard_summary_modeofpayment_details_preview->renderListOptions();

// Render list options (header, left)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_summary_modeofpayment_details->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details->UserName) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->UserName->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details->UserName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->UserName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_summary_modeofpayment_details->UserName->Name ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->UserName->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details->UserName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->UserName->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details->ModeofPayment) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->Name ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->ModeofPayment->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->ModeofPayment->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->sum28Amount29->Visible) { // sum(Amount) ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details->sum28Amount29) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->Name ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->sum28Amount29->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->sum28Amount29->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details->createddate) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->createddate->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details->createddate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->createddate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_summary_modeofpayment_details->createddate->Name ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->createddate->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details->createddate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->createddate->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details->HospID) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->HospID->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_summary_modeofpayment_details->HospID->Name ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->HospID->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->HospID->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->BillType->Visible) { // BillType ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details->BillType) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->BillType->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details->BillType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details->BillType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_summary_modeofpayment_details->BillType->Name ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->BillType->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details->BillType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details->BillType->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_dashboard_summary_modeofpayment_details_preview->RecCount = 0;
$view_dashboard_summary_modeofpayment_details_preview->RowCnt = 0;
while ($view_dashboard_summary_modeofpayment_details_preview->Recordset && !$view_dashboard_summary_modeofpayment_details_preview->Recordset->EOF) {

	// Init row class and style
	$view_dashboard_summary_modeofpayment_details_preview->RecCount++;
	$view_dashboard_summary_modeofpayment_details_preview->RowCnt++;
	$view_dashboard_summary_modeofpayment_details_preview->CssStyle = "";
	$view_dashboard_summary_modeofpayment_details_preview->loadListRowValues($view_dashboard_summary_modeofpayment_details_preview->Recordset);
	$view_dashboard_summary_modeofpayment_details_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_dashboard_summary_modeofpayment_details_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_dashboard_summary_modeofpayment_details_preview->resetAttributes();
	$view_dashboard_summary_modeofpayment_details_preview->renderListRow();

	// Render list options
	$view_dashboard_summary_modeofpayment_details_preview->renderListOptions();
?>
	<tr<?php echo $view_dashboard_summary_modeofpayment_details_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("body", "left", $view_dashboard_summary_modeofpayment_details_preview->RowCnt);
?>
<?php if ($view_dashboard_summary_modeofpayment_details->UserName->Visible) { // UserName ?>
		<!-- UserName -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details->UserName->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details->UserName->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->UserName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->sum28Amount29->Visible) { // sum(Amount) ?>
		<!-- sum(Amount) -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->createddate->Visible) { // createddate ?>
		<!-- createddate -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details->createddate->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details->createddate->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->createddate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details->HospID->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->BillType->Visible) { // BillType ?>
		<!-- BillType -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details->BillType->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details->BillType->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->BillType->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("body", "right", $view_dashboard_summary_modeofpayment_details_preview->RowCnt);
?>
	</tr>
<?php
	$view_dashboard_summary_modeofpayment_details_preview->Recordset->MoveNext();
}
?>
	</tbody>
<?php

	// Render aggregate row
	$view_dashboard_summary_modeofpayment_details_preview->aggregateListRow(); // Prepare aggregate row

	// Render list options
	$view_dashboard_summary_modeofpayment_details_preview->renderListOptions();
?>
	<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options (footer, left)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("footer", "left");
?>
<?php if ($view_dashboard_summary_modeofpayment_details->UserName->Visible) { // UserName ?>
		<!-- UserName -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details->UserName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->sum28Amount29->Visible) { // sum(Amount) ?>
		<!-- sum(Amount) -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->createddate->Visible) { // createddate ?>
		<!-- createddate -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details->createddate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->BillType->Visible) { // BillType ?>
		<!-- BillType -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details->BillType->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("footer", "right");
?>
	</tr>
	</tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_dashboard_summary_modeofpayment_details_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_dashboard_summary_modeofpayment_details_preview->Pager)) $view_dashboard_summary_modeofpayment_details_preview->Pager = new PrevNextPager($view_dashboard_summary_modeofpayment_details_preview->StartRec, $view_dashboard_summary_modeofpayment_details_preview->DisplayRecs, $view_dashboard_summary_modeofpayment_details_preview->TotalRecs) ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->Pager->RecordCount > 0 && $view_dashboard_summary_modeofpayment_details_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_dashboard_summary_modeofpayment_details_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_dashboard_summary_modeofpayment_details_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_dashboard_summary_modeofpayment_details_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_dashboard_summary_modeofpayment_details_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_dashboard_summary_modeofpayment_details_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_dashboard_summary_modeofpayment_details_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_dashboard_summary_modeofpayment_details_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_dashboard_summary_modeofpayment_details_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_summary_modeofpayment_details_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_summary_modeofpayment_details_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_summary_modeofpayment_details_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_dashboard_summary_modeofpayment_details_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_dashboard_summary_modeofpayment_details_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_dashboard_summary_modeofpayment_details_preview->Recordset)
	$view_dashboard_summary_modeofpayment_details_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_dashboard_summary_modeofpayment_details_preview->terminate();
?>