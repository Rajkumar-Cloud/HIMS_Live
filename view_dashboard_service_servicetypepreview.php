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
$view_dashboard_service_servicetype_preview = new view_dashboard_service_servicetype_preview();

// Run the page
$view_dashboard_service_servicetype_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_service_servicetype_preview->Page_Render();
?>
<?php $view_dashboard_service_servicetype_preview->showPageHeader(); ?>
<div class="card ew-grid view_dashboard_service_servicetype"><!-- .card -->
<?php if ($view_dashboard_service_servicetype_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_dashboard_service_servicetype_preview->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_servicetype_preview->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_servicetype->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_servicetype->SortUrl($view_dashboard_service_servicetype->DEPARTMENT) == "") { ?>
		<th class="<?php echo $view_dashboard_service_servicetype->DEPARTMENT->headerCellClass() ?>"><?php echo $view_dashboard_service_servicetype->DEPARTMENT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_servicetype->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_servicetype->DEPARTMENT->Name ?>" data-sort-order="<?php echo $view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype->DEPARTMENT->Name && $view_dashboard_service_servicetype_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->DEPARTMENT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype->DEPARTMENT->Name) { ?><?php if ($view_dashboard_service_servicetype_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_servicetype_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_dashboard_service_servicetype->SortUrl($view_dashboard_service_servicetype->SERVICE_TYPE) == "") { ?>
		<th class="<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->headerCellClass() ?>"><?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->Name ?>" data-sort-order="<?php echo $view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype->SERVICE_TYPE->Name && $view_dashboard_service_servicetype_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype->SERVICE_TYPE->Name) { ?><?php if ($view_dashboard_service_servicetype_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_servicetype_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
	<?php if ($view_dashboard_service_servicetype->SortUrl($view_dashboard_service_servicetype->sum28SubTotal29) == "") { ?>
		<th class="<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->headerCellClass() ?>"><?php echo $view_dashboard_service_servicetype->sum28SubTotal29->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->Name ?>" data-sort-order="<?php echo $view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype->sum28SubTotal29->Name && $view_dashboard_service_servicetype_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->sum28SubTotal29->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype->sum28SubTotal29->Name) { ?><?php if ($view_dashboard_service_servicetype_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_servicetype_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_servicetype->SortUrl($view_dashboard_service_servicetype->createdDate) == "") { ?>
		<th class="<?php echo $view_dashboard_service_servicetype->createdDate->headerCellClass() ?>"><?php echo $view_dashboard_service_servicetype->createdDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_servicetype->createdDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_servicetype->createdDate->Name ?>" data-sort-order="<?php echo $view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype->createdDate->Name && $view_dashboard_service_servicetype_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->createdDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype->createdDate->Name) { ?><?php if ($view_dashboard_service_servicetype_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_servicetype_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_servicetype->SortUrl($view_dashboard_service_servicetype->HospID) == "") { ?>
		<th class="<?php echo $view_dashboard_service_servicetype->HospID->headerCellClass() ?>"><?php echo $view_dashboard_service_servicetype->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_servicetype->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_servicetype->HospID->Name ?>" data-sort-order="<?php echo $view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype->HospID->Name && $view_dashboard_service_servicetype_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype->HospID->Name) { ?><?php if ($view_dashboard_service_servicetype_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_servicetype_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_service_servicetype_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_dashboard_service_servicetype_preview->RecCount = 0;
$view_dashboard_service_servicetype_preview->RowCnt = 0;
while ($view_dashboard_service_servicetype_preview->Recordset && !$view_dashboard_service_servicetype_preview->Recordset->EOF) {

	// Init row class and style
	$view_dashboard_service_servicetype_preview->RecCount++;
	$view_dashboard_service_servicetype_preview->RowCnt++;
	$view_dashboard_service_servicetype_preview->CssStyle = "";
	$view_dashboard_service_servicetype_preview->loadListRowValues($view_dashboard_service_servicetype_preview->Recordset);
	$view_dashboard_service_servicetype_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_dashboard_service_servicetype_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_dashboard_service_servicetype_preview->resetAttributes();
	$view_dashboard_service_servicetype_preview->renderListRow();

	// Render list options
	$view_dashboard_service_servicetype_preview->renderListOptions();
?>
	<tr<?php echo $view_dashboard_service_servicetype_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_servicetype_preview->ListOptions->render("body", "left", $view_dashboard_service_servicetype_preview->RowCnt);
?>
<?php if ($view_dashboard_service_servicetype->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<!-- DEPARTMENT -->
		<td<?php echo $view_dashboard_service_servicetype->DEPARTMENT->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_servicetype->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->DEPARTMENT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<!-- SERVICE_TYPE -->
		<td<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
		<!-- sum(SubTotal) -->
		<td<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->createdDate->Visible) { // createdDate ?>
		<!-- createdDate -->
		<td<?php echo $view_dashboard_service_servicetype->createdDate->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_servicetype->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->createdDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_dashboard_service_servicetype->HospID->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_servicetype->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_servicetype_preview->ListOptions->render("body", "right", $view_dashboard_service_servicetype_preview->RowCnt);
?>
	</tr>
<?php
	$view_dashboard_service_servicetype_preview->Recordset->MoveNext();
}
?>
	</tbody>
<?php

	// Render aggregate row
	$view_dashboard_service_servicetype_preview->aggregateListRow(); // Prepare aggregate row

	// Render list options
	$view_dashboard_service_servicetype_preview->renderListOptions();
?>
	<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options (footer, left)
$view_dashboard_service_servicetype_preview->ListOptions->render("footer", "left");
?>
<?php if ($view_dashboard_service_servicetype->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<!-- DEPARTMENT -->
		<td class="<?php echo $view_dashboard_service_servicetype->DEPARTMENT->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<!-- SERVICE_TYPE -->
		<td class="<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
		<!-- sum(SubTotal) -->
		<td class="<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->createdDate->Visible) { // createdDate ?>
		<!-- createdDate -->
		<td class="<?php echo $view_dashboard_service_servicetype->createdDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_dashboard_service_servicetype->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_service_servicetype_preview->ListOptions->render("footer", "right");
?>
	</tr>
	</tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_dashboard_service_servicetype_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_dashboard_service_servicetype_preview->Pager)) $view_dashboard_service_servicetype_preview->Pager = new PrevNextPager($view_dashboard_service_servicetype_preview->StartRec, $view_dashboard_service_servicetype_preview->DisplayRecs, $view_dashboard_service_servicetype_preview->TotalRecs) ?>
<?php if ($view_dashboard_service_servicetype_preview->Pager->RecordCount > 0 && $view_dashboard_service_servicetype_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_dashboard_service_servicetype_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_dashboard_service_servicetype_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_dashboard_service_servicetype_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_dashboard_service_servicetype_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_dashboard_service_servicetype_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_dashboard_service_servicetype_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_dashboard_service_servicetype_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_dashboard_service_servicetype_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_service_servicetype_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_service_servicetype_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_service_servicetype_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_dashboard_service_servicetype_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_dashboard_service_servicetype_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_dashboard_service_servicetype_preview->Recordset)
	$view_dashboard_service_servicetype_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_dashboard_service_servicetype_preview->terminate();
?>