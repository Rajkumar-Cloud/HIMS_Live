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
$lab_agerange_preview = new lab_agerange_preview();

// Run the page
$lab_agerange_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_agerange_preview->Page_Render();
?>
<?php $lab_agerange_preview->showPageHeader(); ?>
<div class="card ew-grid lab_agerange"><!-- .card -->
<?php if ($lab_agerange_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$lab_agerange_preview->renderListOptions();

// Render list options (header, left)
$lab_agerange_preview->ListOptions->render("header", "left");
?>
<?php if ($lab_agerange->id->Visible) { // id ?>
	<?php if ($lab_agerange->SortUrl($lab_agerange->id) == "") { ?>
		<th class="<?php echo $lab_agerange->id->headerCellClass() ?>"><?php echo $lab_agerange->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_agerange->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_agerange->id->Name ?>" data-sort-order="<?php echo $lab_agerange_preview->SortField == $lab_agerange->id->Name && $lab_agerange_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_agerange->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_agerange_preview->SortField == $lab_agerange->id->Name) { ?><?php if ($lab_agerange_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_agerange_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
	<?php if ($lab_agerange->SortUrl($lab_agerange->Gender) == "") { ?>
		<th class="<?php echo $lab_agerange->Gender->headerCellClass() ?>"><?php echo $lab_agerange->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_agerange->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_agerange->Gender->Name ?>" data-sort-order="<?php echo $lab_agerange_preview->SortField == $lab_agerange->Gender->Name && $lab_agerange_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_agerange->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_agerange_preview->SortField == $lab_agerange->Gender->Name) { ?><?php if ($lab_agerange_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_agerange_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
	<?php if ($lab_agerange->SortUrl($lab_agerange->MinAge) == "") { ?>
		<th class="<?php echo $lab_agerange->MinAge->headerCellClass() ?>"><?php echo $lab_agerange->MinAge->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_agerange->MinAge->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_agerange->MinAge->Name ?>" data-sort-order="<?php echo $lab_agerange_preview->SortField == $lab_agerange->MinAge->Name && $lab_agerange_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_agerange->MinAge->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_agerange_preview->SortField == $lab_agerange->MinAge->Name) { ?><?php if ($lab_agerange_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_agerange_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
	<?php if ($lab_agerange->SortUrl($lab_agerange->MinAgeType) == "") { ?>
		<th class="<?php echo $lab_agerange->MinAgeType->headerCellClass() ?>"><?php echo $lab_agerange->MinAgeType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_agerange->MinAgeType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_agerange->MinAgeType->Name ?>" data-sort-order="<?php echo $lab_agerange_preview->SortField == $lab_agerange->MinAgeType->Name && $lab_agerange_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_agerange->MinAgeType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_agerange_preview->SortField == $lab_agerange->MinAgeType->Name) { ?><?php if ($lab_agerange_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_agerange_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
	<?php if ($lab_agerange->SortUrl($lab_agerange->MaxAge) == "") { ?>
		<th class="<?php echo $lab_agerange->MaxAge->headerCellClass() ?>"><?php echo $lab_agerange->MaxAge->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_agerange->MaxAge->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_agerange->MaxAge->Name ?>" data-sort-order="<?php echo $lab_agerange_preview->SortField == $lab_agerange->MaxAge->Name && $lab_agerange_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_agerange->MaxAge->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_agerange_preview->SortField == $lab_agerange->MaxAge->Name) { ?><?php if ($lab_agerange_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_agerange_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
	<?php if ($lab_agerange->SortUrl($lab_agerange->MaxAgeType) == "") { ?>
		<th class="<?php echo $lab_agerange->MaxAgeType->headerCellClass() ?>"><?php echo $lab_agerange->MaxAgeType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_agerange->MaxAgeType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_agerange->MaxAgeType->Name ?>" data-sort-order="<?php echo $lab_agerange_preview->SortField == $lab_agerange->MaxAgeType->Name && $lab_agerange_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_agerange->MaxAgeType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_agerange_preview->SortField == $lab_agerange->MaxAgeType->Name) { ?><?php if ($lab_agerange_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_agerange_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->Value->Visible) { // Value ?>
	<?php if ($lab_agerange->SortUrl($lab_agerange->Value) == "") { ?>
		<th class="<?php echo $lab_agerange->Value->headerCellClass() ?>"><?php echo $lab_agerange->Value->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_agerange->Value->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_agerange->Value->Name ?>" data-sort-order="<?php echo $lab_agerange_preview->SortField == $lab_agerange->Value->Name && $lab_agerange_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_agerange->Value->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_agerange_preview->SortField == $lab_agerange->Value->Name) { ?><?php if ($lab_agerange_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_agerange_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_agerange_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$lab_agerange_preview->RecCount = 0;
$lab_agerange_preview->RowCnt = 0;
while ($lab_agerange_preview->Recordset && !$lab_agerange_preview->Recordset->EOF) {

	// Init row class and style
	$lab_agerange_preview->RecCount++;
	$lab_agerange_preview->RowCnt++;
	$lab_agerange_preview->CssStyle = "";
	$lab_agerange_preview->loadListRowValues($lab_agerange_preview->Recordset);

	// Render row
	$lab_agerange_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$lab_agerange_preview->resetAttributes();
	$lab_agerange_preview->renderListRow();

	// Render list options
	$lab_agerange_preview->renderListOptions();
?>
	<tr<?php echo $lab_agerange_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_agerange_preview->ListOptions->render("body", "left", $lab_agerange_preview->RowCnt);
?>
<?php if ($lab_agerange->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $lab_agerange->id->cellAttributes() ?>>
<span<?php echo $lab_agerange->id->viewAttributes() ?>>
<?php echo $lab_agerange->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $lab_agerange->Gender->cellAttributes() ?>>
<span<?php echo $lab_agerange->Gender->viewAttributes() ?>>
<?php echo $lab_agerange->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
		<!-- MinAge -->
		<td<?php echo $lab_agerange->MinAge->cellAttributes() ?>>
<span<?php echo $lab_agerange->MinAge->viewAttributes() ?>>
<?php echo $lab_agerange->MinAge->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
		<!-- MinAgeType -->
		<td<?php echo $lab_agerange->MinAgeType->cellAttributes() ?>>
<span<?php echo $lab_agerange->MinAgeType->viewAttributes() ?>>
<?php echo $lab_agerange->MinAgeType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
		<!-- MaxAge -->
		<td<?php echo $lab_agerange->MaxAge->cellAttributes() ?>>
<span<?php echo $lab_agerange->MaxAge->viewAttributes() ?>>
<?php echo $lab_agerange->MaxAge->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
		<!-- MaxAgeType -->
		<td<?php echo $lab_agerange->MaxAgeType->cellAttributes() ?>>
<span<?php echo $lab_agerange->MaxAgeType->viewAttributes() ?>>
<?php echo $lab_agerange->MaxAgeType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_agerange->Value->Visible) { // Value ?>
		<!-- Value -->
		<td<?php echo $lab_agerange->Value->cellAttributes() ?>>
<span<?php echo $lab_agerange->Value->viewAttributes() ?>>
<?php echo $lab_agerange->Value->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$lab_agerange_preview->ListOptions->render("body", "right", $lab_agerange_preview->RowCnt);
?>
	</tr>
<?php
	$lab_agerange_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($lab_agerange_preview->TotalRecs > 0) { ?>
<?php if (!isset($lab_agerange_preview->Pager)) $lab_agerange_preview->Pager = new PrevNextPager($lab_agerange_preview->StartRec, $lab_agerange_preview->DisplayRecs, $lab_agerange_preview->TotalRecs) ?>
<?php if ($lab_agerange_preview->Pager->RecordCount > 0 && $lab_agerange_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($lab_agerange_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $lab_agerange_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($lab_agerange_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $lab_agerange_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($lab_agerange_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $lab_agerange_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($lab_agerange_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $lab_agerange_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_agerange_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_agerange_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_agerange_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($lab_agerange_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$lab_agerange_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($lab_agerange_preview->Recordset)
	$lab_agerange_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$lab_agerange_preview->terminate();
?>