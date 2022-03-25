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
$ivf_follow_up_tracking_preview = new ivf_follow_up_tracking_preview();

// Run the page
$ivf_follow_up_tracking_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_follow_up_tracking_preview->Page_Render();
?>
<?php $ivf_follow_up_tracking_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_follow_up_tracking"><!-- .card -->
<?php if ($ivf_follow_up_tracking_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_follow_up_tracking_preview->renderListOptions();

// Render list options (header, left)
$ivf_follow_up_tracking_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->id) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->id->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->id->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->id->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->id->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->RIDNO) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->RIDNO->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->RIDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->RIDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->RIDNO->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->RIDNO->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->RIDNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->RIDNO->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->Name) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->Name->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->Name->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->Name->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->Name->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->Age) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->Age->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->Age->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->Age->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->Age->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->MReadMore) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->MReadMore->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->MReadMore->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->MReadMore->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->MReadMore->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->MReadMore->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->MReadMore->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->MReadMore->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->status) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->status->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->status->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->status->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->status->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdby->Visible) { // createdby ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->createdby) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->createdby->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->createdby->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->createdby->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->createdby->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->createddatetime) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->createddatetime->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->createddatetime->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->createddatetime->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->createddatetime->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->modifiedby) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->modifiedby->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->modifiedby->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->modifiedby->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->modifiedby->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->modifieddatetime) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->modifieddatetime->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->modifieddatetime->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->modifieddatetime->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->modifieddatetime->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->TidNo) == "") { ?>
		<th class="<?php echo $ivf_follow_up_tracking->TidNo->headerCellClass() ?>"><?php echo $ivf_follow_up_tracking->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_follow_up_tracking->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_follow_up_tracking->TidNo->Name ?>" data-sort-order="<?php echo $ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->TidNo->Name && $ivf_follow_up_tracking_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_preview->SortField == $ivf_follow_up_tracking->TidNo->Name) { ?><?php if ($ivf_follow_up_tracking_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_follow_up_tracking_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_follow_up_tracking_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_follow_up_tracking_preview->RecCount = 0;
$ivf_follow_up_tracking_preview->RowCnt = 0;
while ($ivf_follow_up_tracking_preview->Recordset && !$ivf_follow_up_tracking_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_follow_up_tracking_preview->RecCount++;
	$ivf_follow_up_tracking_preview->RowCnt++;
	$ivf_follow_up_tracking_preview->CssStyle = "";
	$ivf_follow_up_tracking_preview->loadListRowValues($ivf_follow_up_tracking_preview->Recordset);

	// Render row
	$ivf_follow_up_tracking_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_follow_up_tracking_preview->resetAttributes();
	$ivf_follow_up_tracking_preview->renderListRow();

	// Render list options
	$ivf_follow_up_tracking_preview->renderListOptions();
?>
	<tr<?php echo $ivf_follow_up_tracking_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_follow_up_tracking_preview->ListOptions->render("body", "left", $ivf_follow_up_tracking_preview->RowCnt);
?>
<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_follow_up_tracking->id->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->id->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
		<!-- RIDNO -->
		<td<?php echo $ivf_follow_up_tracking->RIDNO->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->RIDNO->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->RIDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_follow_up_tracking->Name->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->Name->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $ivf_follow_up_tracking->Age->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->Age->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
		<!-- MReadMore -->
		<td<?php echo $ivf_follow_up_tracking->MReadMore->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->MReadMore->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->MReadMore->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $ivf_follow_up_tracking->status->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->status->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $ivf_follow_up_tracking->createdby->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->createdby->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $ivf_follow_up_tracking->createddatetime->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->createddatetime->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $ivf_follow_up_tracking->modifiedby->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->modifiedby->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $ivf_follow_up_tracking->modifieddatetime->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_follow_up_tracking->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_follow_up_tracking->TidNo->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_follow_up_tracking_preview->ListOptions->render("body", "right", $ivf_follow_up_tracking_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_follow_up_tracking_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_follow_up_tracking_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_follow_up_tracking_preview->Pager)) $ivf_follow_up_tracking_preview->Pager = new PrevNextPager($ivf_follow_up_tracking_preview->StartRec, $ivf_follow_up_tracking_preview->DisplayRecs, $ivf_follow_up_tracking_preview->TotalRecs) ?>
<?php if ($ivf_follow_up_tracking_preview->Pager->RecordCount > 0 && $ivf_follow_up_tracking_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_follow_up_tracking_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_follow_up_tracking_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_follow_up_tracking_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_follow_up_tracking_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_follow_up_tracking_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_follow_up_tracking_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_follow_up_tracking_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_follow_up_tracking_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_follow_up_tracking_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_follow_up_tracking_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_follow_up_tracking_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_follow_up_tracking_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_follow_up_tracking_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_follow_up_tracking_preview->Recordset)
	$ivf_follow_up_tracking_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_follow_up_tracking_preview->terminate();
?>