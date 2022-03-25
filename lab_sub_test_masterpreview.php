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
$lab_sub_test_master_preview = new lab_sub_test_master_preview();

// Run the page
$lab_sub_test_master_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sub_test_master_preview->Page_Render();
?>
<?php $lab_sub_test_master_preview->showPageHeader(); ?>
<div class="card ew-grid lab_sub_test_master"><!-- .card -->
<?php if ($lab_sub_test_master_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$lab_sub_test_master_preview->renderListOptions();

// Render list options (header, left)
$lab_sub_test_master_preview->ListOptions->render("header", "left");
?>
<?php if ($lab_sub_test_master->id->Visible) { // id ?>
	<?php if ($lab_sub_test_master->SortUrl($lab_sub_test_master->id) == "") { ?>
		<th class="<?php echo $lab_sub_test_master->id->headerCellClass() ?>"><?php echo $lab_sub_test_master->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_sub_test_master->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_sub_test_master->id->Name ?>" data-sort-order="<?php echo $lab_sub_test_master_preview->SortField == $lab_sub_test_master->id->Name && $lab_sub_test_master_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_sub_test_master->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_sub_test_master_preview->SortField == $lab_sub_test_master->id->Name) { ?><?php if ($lab_sub_test_master_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_sub_test_master_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
	<?php if ($lab_sub_test_master->SortUrl($lab_sub_test_master->TestMasterID) == "") { ?>
		<th class="<?php echo $lab_sub_test_master->TestMasterID->headerCellClass() ?>"><?php echo $lab_sub_test_master->TestMasterID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_sub_test_master->TestMasterID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_sub_test_master->TestMasterID->Name ?>" data-sort-order="<?php echo $lab_sub_test_master_preview->SortField == $lab_sub_test_master->TestMasterID->Name && $lab_sub_test_master_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_sub_test_master->TestMasterID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_sub_test_master_preview->SortField == $lab_sub_test_master->TestMasterID->Name) { ?><?php if ($lab_sub_test_master_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_sub_test_master_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
	<?php if ($lab_sub_test_master->SortUrl($lab_sub_test_master->SubTestName) == "") { ?>
		<th class="<?php echo $lab_sub_test_master->SubTestName->headerCellClass() ?>"><?php echo $lab_sub_test_master->SubTestName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_sub_test_master->SubTestName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_sub_test_master->SubTestName->Name ?>" data-sort-order="<?php echo $lab_sub_test_master_preview->SortField == $lab_sub_test_master->SubTestName->Name && $lab_sub_test_master_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_sub_test_master->SubTestName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_sub_test_master_preview->SortField == $lab_sub_test_master->SubTestName->Name) { ?><?php if ($lab_sub_test_master_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_sub_test_master_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
	<?php if ($lab_sub_test_master->SortUrl($lab_sub_test_master->TestOrder) == "") { ?>
		<th class="<?php echo $lab_sub_test_master->TestOrder->headerCellClass() ?>"><?php echo $lab_sub_test_master->TestOrder->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_sub_test_master->TestOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_sub_test_master->TestOrder->Name ?>" data-sort-order="<?php echo $lab_sub_test_master_preview->SortField == $lab_sub_test_master->TestOrder->Name && $lab_sub_test_master_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_sub_test_master->TestOrder->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_sub_test_master_preview->SortField == $lab_sub_test_master->TestOrder->Name) { ?><?php if ($lab_sub_test_master_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_sub_test_master_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
	<?php if ($lab_sub_test_master->SortUrl($lab_sub_test_master->NormalRange) == "") { ?>
		<th class="<?php echo $lab_sub_test_master->NormalRange->headerCellClass() ?>"><?php echo $lab_sub_test_master->NormalRange->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_sub_test_master->NormalRange->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_sub_test_master->NormalRange->Name ?>" data-sort-order="<?php echo $lab_sub_test_master_preview->SortField == $lab_sub_test_master->NormalRange->Name && $lab_sub_test_master_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_sub_test_master->NormalRange->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_sub_test_master_preview->SortField == $lab_sub_test_master->NormalRange->Name) { ?><?php if ($lab_sub_test_master_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_sub_test_master_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
	<?php if ($lab_sub_test_master->SortUrl($lab_sub_test_master->Created) == "") { ?>
		<th class="<?php echo $lab_sub_test_master->Created->headerCellClass() ?>"><?php echo $lab_sub_test_master->Created->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_sub_test_master->Created->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_sub_test_master->Created->Name ?>" data-sort-order="<?php echo $lab_sub_test_master_preview->SortField == $lab_sub_test_master->Created->Name && $lab_sub_test_master_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_sub_test_master->Created->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_sub_test_master_preview->SortField == $lab_sub_test_master->Created->Name) { ?><?php if ($lab_sub_test_master_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_sub_test_master_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($lab_sub_test_master->SortUrl($lab_sub_test_master->CreatedBy) == "") { ?>
		<th class="<?php echo $lab_sub_test_master->CreatedBy->headerCellClass() ?>"><?php echo $lab_sub_test_master->CreatedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_sub_test_master->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_sub_test_master->CreatedBy->Name ?>" data-sort-order="<?php echo $lab_sub_test_master_preview->SortField == $lab_sub_test_master->CreatedBy->Name && $lab_sub_test_master_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_sub_test_master->CreatedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_sub_test_master_preview->SortField == $lab_sub_test_master->CreatedBy->Name) { ?><?php if ($lab_sub_test_master_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_sub_test_master_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
	<?php if ($lab_sub_test_master->SortUrl($lab_sub_test_master->Modified) == "") { ?>
		<th class="<?php echo $lab_sub_test_master->Modified->headerCellClass() ?>"><?php echo $lab_sub_test_master->Modified->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_sub_test_master->Modified->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_sub_test_master->Modified->Name ?>" data-sort-order="<?php echo $lab_sub_test_master_preview->SortField == $lab_sub_test_master->Modified->Name && $lab_sub_test_master_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_sub_test_master->Modified->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_sub_test_master_preview->SortField == $lab_sub_test_master->Modified->Name) { ?><?php if ($lab_sub_test_master_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_sub_test_master_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($lab_sub_test_master->SortUrl($lab_sub_test_master->ModifiedBy) == "") { ?>
		<th class="<?php echo $lab_sub_test_master->ModifiedBy->headerCellClass() ?>"><?php echo $lab_sub_test_master->ModifiedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_sub_test_master->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_sub_test_master->ModifiedBy->Name ?>" data-sort-order="<?php echo $lab_sub_test_master_preview->SortField == $lab_sub_test_master->ModifiedBy->Name && $lab_sub_test_master_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_sub_test_master->ModifiedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_sub_test_master_preview->SortField == $lab_sub_test_master->ModifiedBy->Name) { ?><?php if ($lab_sub_test_master_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_sub_test_master_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_sub_test_master_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$lab_sub_test_master_preview->RecCount = 0;
$lab_sub_test_master_preview->RowCnt = 0;
while ($lab_sub_test_master_preview->Recordset && !$lab_sub_test_master_preview->Recordset->EOF) {

	// Init row class and style
	$lab_sub_test_master_preview->RecCount++;
	$lab_sub_test_master_preview->RowCnt++;
	$lab_sub_test_master_preview->CssStyle = "";
	$lab_sub_test_master_preview->loadListRowValues($lab_sub_test_master_preview->Recordset);

	// Render row
	$lab_sub_test_master_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$lab_sub_test_master_preview->resetAttributes();
	$lab_sub_test_master_preview->renderListRow();

	// Render list options
	$lab_sub_test_master_preview->renderListOptions();
?>
	<tr<?php echo $lab_sub_test_master_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_sub_test_master_preview->ListOptions->render("body", "left", $lab_sub_test_master_preview->RowCnt);
?>
<?php if ($lab_sub_test_master->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $lab_sub_test_master->id->cellAttributes() ?>>
<span<?php echo $lab_sub_test_master->id->viewAttributes() ?>>
<?php echo $lab_sub_test_master->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
		<!-- TestMasterID -->
		<td<?php echo $lab_sub_test_master->TestMasterID->cellAttributes() ?>>
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<?php echo $lab_sub_test_master->TestMasterID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
		<!-- SubTestName -->
		<td<?php echo $lab_sub_test_master->SubTestName->cellAttributes() ?>>
<span<?php echo $lab_sub_test_master->SubTestName->viewAttributes() ?>>
<?php echo $lab_sub_test_master->SubTestName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
		<!-- TestOrder -->
		<td<?php echo $lab_sub_test_master->TestOrder->cellAttributes() ?>>
<span<?php echo $lab_sub_test_master->TestOrder->viewAttributes() ?>>
<?php echo $lab_sub_test_master->TestOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
		<!-- NormalRange -->
		<td<?php echo $lab_sub_test_master->NormalRange->cellAttributes() ?>>
<span<?php echo $lab_sub_test_master->NormalRange->viewAttributes() ?>>
<?php echo $lab_sub_test_master->NormalRange->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
		<!-- Created -->
		<td<?php echo $lab_sub_test_master->Created->cellAttributes() ?>>
<span<?php echo $lab_sub_test_master->Created->viewAttributes() ?>>
<?php echo $lab_sub_test_master->Created->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
		<!-- CreatedBy -->
		<td<?php echo $lab_sub_test_master->CreatedBy->cellAttributes() ?>>
<span<?php echo $lab_sub_test_master->CreatedBy->viewAttributes() ?>>
<?php echo $lab_sub_test_master->CreatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
		<!-- Modified -->
		<td<?php echo $lab_sub_test_master->Modified->cellAttributes() ?>>
<span<?php echo $lab_sub_test_master->Modified->viewAttributes() ?>>
<?php echo $lab_sub_test_master->Modified->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
		<!-- ModifiedBy -->
		<td<?php echo $lab_sub_test_master->ModifiedBy->cellAttributes() ?>>
<span<?php echo $lab_sub_test_master->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_sub_test_master->ModifiedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$lab_sub_test_master_preview->ListOptions->render("body", "right", $lab_sub_test_master_preview->RowCnt);
?>
	</tr>
<?php
	$lab_sub_test_master_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($lab_sub_test_master_preview->TotalRecs > 0) { ?>
<?php if (!isset($lab_sub_test_master_preview->Pager)) $lab_sub_test_master_preview->Pager = new PrevNextPager($lab_sub_test_master_preview->StartRec, $lab_sub_test_master_preview->DisplayRecs, $lab_sub_test_master_preview->TotalRecs) ?>
<?php if ($lab_sub_test_master_preview->Pager->RecordCount > 0 && $lab_sub_test_master_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($lab_sub_test_master_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $lab_sub_test_master_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($lab_sub_test_master_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $lab_sub_test_master_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($lab_sub_test_master_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $lab_sub_test_master_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($lab_sub_test_master_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $lab_sub_test_master_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_sub_test_master_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_sub_test_master_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_sub_test_master_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($lab_sub_test_master_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$lab_sub_test_master_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($lab_sub_test_master_preview->Recordset)
	$lab_sub_test_master_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$lab_sub_test_master_preview->terminate();
?>