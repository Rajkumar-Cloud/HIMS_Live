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
$lab_profile_details_preview = new lab_profile_details_preview();

// Run the page
$lab_profile_details_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_details_preview->Page_Render();
?>
<?php $lab_profile_details_preview->showPageHeader(); ?>
<div class="card ew-grid lab_profile_details"><!-- .card -->
<?php if ($lab_profile_details_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$lab_profile_details_preview->renderListOptions();

// Render list options (header, left)
$lab_profile_details_preview->ListOptions->render("header", "left");
?>
<?php if ($lab_profile_details->id->Visible) { // id ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details->id) == "") { ?>
		<th class="<?php echo $lab_profile_details->id->headerCellClass() ?>"><?php echo $lab_profile_details->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_profile_details->id->Name ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details->id->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_profile_details->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details->id->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->ProfileCode->Visible) { // ProfileCode ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details->ProfileCode) == "") { ?>
		<th class="<?php echo $lab_profile_details->ProfileCode->headerCellClass() ?>"><?php echo $lab_profile_details->ProfileCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details->ProfileCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_profile_details->ProfileCode->Name ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details->ProfileCode->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_profile_details->ProfileCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details->ProfileCode->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->SubProfileCode->Visible) { // SubProfileCode ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details->SubProfileCode) == "") { ?>
		<th class="<?php echo $lab_profile_details->SubProfileCode->headerCellClass() ?>"><?php echo $lab_profile_details->SubProfileCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details->SubProfileCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_profile_details->SubProfileCode->Name ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details->SubProfileCode->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_profile_details->SubProfileCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details->SubProfileCode->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->ProfileTestCode->Visible) { // ProfileTestCode ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details->ProfileTestCode) == "") { ?>
		<th class="<?php echo $lab_profile_details->ProfileTestCode->headerCellClass() ?>"><?php echo $lab_profile_details->ProfileTestCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details->ProfileTestCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_profile_details->ProfileTestCode->Name ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details->ProfileTestCode->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_profile_details->ProfileTestCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details->ProfileTestCode->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details->ProfileSubTestCode) == "") { ?>
		<th class="<?php echo $lab_profile_details->ProfileSubTestCode->headerCellClass() ?>"><?php echo $lab_profile_details->ProfileSubTestCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details->ProfileSubTestCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_profile_details->ProfileSubTestCode->Name ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details->ProfileSubTestCode->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_profile_details->ProfileSubTestCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details->ProfileSubTestCode->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->TestOrder->Visible) { // TestOrder ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details->TestOrder) == "") { ?>
		<th class="<?php echo $lab_profile_details->TestOrder->headerCellClass() ?>"><?php echo $lab_profile_details->TestOrder->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details->TestOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_profile_details->TestOrder->Name ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details->TestOrder->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_profile_details->TestOrder->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details->TestOrder->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->TestAmount->Visible) { // TestAmount ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details->TestAmount) == "") { ?>
		<th class="<?php echo $lab_profile_details->TestAmount->headerCellClass() ?>"><?php echo $lab_profile_details->TestAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details->TestAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $lab_profile_details->TestAmount->Name ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details->TestAmount->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $lab_profile_details->TestAmount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details->TestAmount->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_profile_details_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$lab_profile_details_preview->RecCount = 0;
$lab_profile_details_preview->RowCnt = 0;
while ($lab_profile_details_preview->Recordset && !$lab_profile_details_preview->Recordset->EOF) {

	// Init row class and style
	$lab_profile_details_preview->RecCount++;
	$lab_profile_details_preview->RowCnt++;
	$lab_profile_details_preview->CssStyle = "";
	$lab_profile_details_preview->loadListRowValues($lab_profile_details_preview->Recordset);

	// Render row
	$lab_profile_details_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$lab_profile_details_preview->resetAttributes();
	$lab_profile_details_preview->renderListRow();

	// Render list options
	$lab_profile_details_preview->renderListOptions();
?>
	<tr<?php echo $lab_profile_details_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_profile_details_preview->ListOptions->render("body", "left", $lab_profile_details_preview->RowCnt);
?>
<?php if ($lab_profile_details->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $lab_profile_details->id->cellAttributes() ?>>
<span<?php echo $lab_profile_details->id->viewAttributes() ?>>
<?php echo $lab_profile_details->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details->ProfileCode->Visible) { // ProfileCode ?>
		<!-- ProfileCode -->
		<td<?php echo $lab_profile_details->ProfileCode->cellAttributes() ?>>
<span<?php echo $lab_profile_details->ProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details->SubProfileCode->Visible) { // SubProfileCode ?>
		<!-- SubProfileCode -->
		<td<?php echo $lab_profile_details->SubProfileCode->cellAttributes() ?>>
<span<?php echo $lab_profile_details->SubProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_details->SubProfileCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details->ProfileTestCode->Visible) { // ProfileTestCode ?>
		<!-- ProfileTestCode -->
		<td<?php echo $lab_profile_details->ProfileTestCode->cellAttributes() ?>>
<span<?php echo $lab_profile_details->ProfileTestCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileTestCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
		<!-- ProfileSubTestCode -->
		<td<?php echo $lab_profile_details->ProfileSubTestCode->cellAttributes() ?>>
<span<?php echo $lab_profile_details->ProfileSubTestCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileSubTestCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details->TestOrder->Visible) { // TestOrder ?>
		<!-- TestOrder -->
		<td<?php echo $lab_profile_details->TestOrder->cellAttributes() ?>>
<span<?php echo $lab_profile_details->TestOrder->viewAttributes() ?>>
<?php echo $lab_profile_details->TestOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details->TestAmount->Visible) { // TestAmount ?>
		<!-- TestAmount -->
		<td<?php echo $lab_profile_details->TestAmount->cellAttributes() ?>>
<span<?php echo $lab_profile_details->TestAmount->viewAttributes() ?>>
<?php echo $lab_profile_details->TestAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$lab_profile_details_preview->ListOptions->render("body", "right", $lab_profile_details_preview->RowCnt);
?>
	</tr>
<?php
	$lab_profile_details_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($lab_profile_details_preview->TotalRecs > 0) { ?>
<?php if (!isset($lab_profile_details_preview->Pager)) $lab_profile_details_preview->Pager = new PrevNextPager($lab_profile_details_preview->StartRec, $lab_profile_details_preview->DisplayRecs, $lab_profile_details_preview->TotalRecs) ?>
<?php if ($lab_profile_details_preview->Pager->RecordCount > 0 && $lab_profile_details_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($lab_profile_details_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $lab_profile_details_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($lab_profile_details_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $lab_profile_details_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($lab_profile_details_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $lab_profile_details_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($lab_profile_details_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $lab_profile_details_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_profile_details_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_profile_details_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_profile_details_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($lab_profile_details_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$lab_profile_details_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($lab_profile_details_preview->Recordset)
	$lab_profile_details_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$lab_profile_details_preview->terminate();
?>