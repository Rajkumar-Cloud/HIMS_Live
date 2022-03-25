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
$view_pharmacy_purchase_request_items_approved_preview = new view_pharmacy_purchase_request_items_approved_preview();

// Run the page
$view_pharmacy_purchase_request_items_approved_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_approved_preview->Page_Render();
?>
<?php $view_pharmacy_purchase_request_items_approved_preview->showPageHeader(); ?>
<div class="card ew-grid view_pharmacy_purchase_request_items_approved"><!-- .card -->
<?php if ($view_pharmacy_purchase_request_items_approved_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_pharmacy_purchase_request_items_approved_preview->renderListOptions();

// Render list options (header, left)
$view_pharmacy_purchase_request_items_approved_preview->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_purchase_request_items_approved->id->Visible) { // id ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->SortUrl($view_pharmacy_purchase_request_items_approved->id) == "") { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved->id->headerCellClass() ?>"><?php echo $view_pharmacy_purchase_request_items_approved->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_purchase_request_items_approved->id->Name ?>" data-sort-order="<?php echo $view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved->id->Name && $view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved->id->Name) { ?><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->SortUrl($view_pharmacy_purchase_request_items_approved->PRC) == "") { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved->PRC->headerCellClass() ?>"><?php echo $view_pharmacy_purchase_request_items_approved->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_purchase_request_items_approved->PRC->Name ?>" data-sort-order="<?php echo $view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved->PRC->Name && $view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->PRC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved->PRC->Name) { ?><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->SortUrl($view_pharmacy_purchase_request_items_approved->PrName) == "") { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved->PrName->headerCellClass() ?>"><?php echo $view_pharmacy_purchase_request_items_approved->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_purchase_request_items_approved->PrName->Name ?>" data-sort-order="<?php echo $view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved->PrName->Name && $view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->PrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved->PrName->Name) { ?><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->SortUrl($view_pharmacy_purchase_request_items_approved->Quantity) == "") { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->headerCellClass() ?>"><?php echo $view_pharmacy_purchase_request_items_approved->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->Name ?>" data-sort-order="<?php echo $view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved->Quantity->Name && $view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->Quantity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved->Quantity->Name) { ?><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->SortUrl($view_pharmacy_purchase_request_items_approved->ApprovedStatus) == "") { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->headerCellClass() ?>"><?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->Name ?>" data-sort-order="<?php echo $view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved->ApprovedStatus->Name && $view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved->ApprovedStatus->Name) { ?><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_purchase_request_items_approved_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_pharmacy_purchase_request_items_approved_preview->RecCount = 0;
$view_pharmacy_purchase_request_items_approved_preview->RowCnt = 0;
while ($view_pharmacy_purchase_request_items_approved_preview->Recordset && !$view_pharmacy_purchase_request_items_approved_preview->Recordset->EOF) {

	// Init row class and style
	$view_pharmacy_purchase_request_items_approved_preview->RecCount++;
	$view_pharmacy_purchase_request_items_approved_preview->RowCnt++;
	$view_pharmacy_purchase_request_items_approved_preview->CssStyle = "";
	$view_pharmacy_purchase_request_items_approved_preview->loadListRowValues($view_pharmacy_purchase_request_items_approved_preview->Recordset);

	// Render row
	$view_pharmacy_purchase_request_items_approved_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_pharmacy_purchase_request_items_approved_preview->resetAttributes();
	$view_pharmacy_purchase_request_items_approved_preview->renderListRow();

	// Render list options
	$view_pharmacy_purchase_request_items_approved_preview->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_purchase_request_items_approved_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_approved_preview->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_approved_preview->RowCnt);
?>
<?php if ($view_pharmacy_purchase_request_items_approved->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_pharmacy_purchase_request_items_approved->id->cellAttributes() ?>>
<span<?php echo $view_pharmacy_purchase_request_items_approved->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $view_pharmacy_purchase_request_items_approved->PRC->cellAttributes() ?>>
<span<?php echo $view_pharmacy_purchase_request_items_approved->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $view_pharmacy_purchase_request_items_approved->PrName->cellAttributes() ?>>
<span<?php echo $view_pharmacy_purchase_request_items_approved->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->cellAttributes() ?>>
<span<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<!-- ApprovedStatus -->
		<td<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->cellAttributes() ?>>
<span<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_approved_preview->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_approved_preview->RowCnt);
?>
	</tr>
<?php
	$view_pharmacy_purchase_request_items_approved_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_pharmacy_purchase_request_items_approved_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_pharmacy_purchase_request_items_approved_preview->Pager)) $view_pharmacy_purchase_request_items_approved_preview->Pager = new PrevNextPager($view_pharmacy_purchase_request_items_approved_preview->StartRec, $view_pharmacy_purchase_request_items_approved_preview->DisplayRecs, $view_pharmacy_purchase_request_items_approved_preview->TotalRecs) ?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->Pager->RecordCount > 0 && $view_pharmacy_purchase_request_items_approved_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_pharmacy_purchase_request_items_approved_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_pharmacy_purchase_request_items_approved_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_pharmacy_purchase_request_items_approved_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_pharmacy_purchase_request_items_approved_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_pharmacy_purchase_request_items_approved_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_pharmacy_purchase_request_items_approved_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_pharmacy_purchase_request_items_approved_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_pharmacy_purchase_request_items_approved_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_items_approved_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_items_approved_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_items_approved_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_pharmacy_purchase_request_items_approved_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_pharmacy_purchase_request_items_approved_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_pharmacy_purchase_request_items_approved_preview->Recordset)
	$view_pharmacy_purchase_request_items_approved_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_pharmacy_purchase_request_items_approved_preview->terminate();
?>