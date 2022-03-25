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
$ivf_oocytedenudation_stage_preview = new ivf_oocytedenudation_stage_preview();

// Run the page
$ivf_oocytedenudation_stage_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_stage_preview->Page_Render();
?>
<?php $ivf_oocytedenudation_stage_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_oocytedenudation_stage"><!-- .card -->
<?php if ($ivf_oocytedenudation_stage_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_oocytedenudation_stage_preview->renderListOptions();

// Render list options (header, left)
$ivf_oocytedenudation_stage_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
	<?php if ($ivf_oocytedenudation_stage->SortUrl($ivf_oocytedenudation_stage->OocyteNo) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_stage->OocyteNo->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_stage->OocyteNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_stage->OocyteNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation_stage->OocyteNo->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_stage_preview->SortField == $ivf_oocytedenudation_stage->OocyteNo->Name && $ivf_oocytedenudation_stage_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->OocyteNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_stage_preview->SortField == $ivf_oocytedenudation_stage->OocyteNo->Name) { ?><?php if ($ivf_oocytedenudation_stage_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_stage_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
	<?php if ($ivf_oocytedenudation_stage->SortUrl($ivf_oocytedenudation_stage->Stage) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_stage->Stage->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_stage->Stage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_stage->Stage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation_stage->Stage->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_stage_preview->SortField == $ivf_oocytedenudation_stage->Stage->Name && $ivf_oocytedenudation_stage_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->Stage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_stage_preview->SortField == $ivf_oocytedenudation_stage->Stage->Name) { ?><?php if ($ivf_oocytedenudation_stage_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_stage_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
	<?php if ($ivf_oocytedenudation_stage->SortUrl($ivf_oocytedenudation_stage->ReMarks) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_stage->ReMarks->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_stage->ReMarks->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_stage->ReMarks->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation_stage->ReMarks->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_stage_preview->SortField == $ivf_oocytedenudation_stage->ReMarks->Name && $ivf_oocytedenudation_stage_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->ReMarks->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_stage_preview->SortField == $ivf_oocytedenudation_stage->ReMarks->Name) { ?><?php if ($ivf_oocytedenudation_stage_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_stage_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_oocytedenudation_stage_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_oocytedenudation_stage_preview->RecCount = 0;
$ivf_oocytedenudation_stage_preview->RowCnt = 0;
while ($ivf_oocytedenudation_stage_preview->Recordset && !$ivf_oocytedenudation_stage_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_oocytedenudation_stage_preview->RecCount++;
	$ivf_oocytedenudation_stage_preview->RowCnt++;
	$ivf_oocytedenudation_stage_preview->CssStyle = "";
	$ivf_oocytedenudation_stage_preview->loadListRowValues($ivf_oocytedenudation_stage_preview->Recordset);

	// Render row
	$ivf_oocytedenudation_stage_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_oocytedenudation_stage_preview->resetAttributes();
	$ivf_oocytedenudation_stage_preview->renderListRow();

	// Render list options
	$ivf_oocytedenudation_stage_preview->renderListOptions();
?>
	<tr<?php echo $ivf_oocytedenudation_stage_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_stage_preview->ListOptions->render("body", "left", $ivf_oocytedenudation_stage_preview->RowCnt);
?>
<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
		<!-- OocyteNo -->
		<td<?php echo $ivf_oocytedenudation_stage->OocyteNo->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_stage->OocyteNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->OocyteNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
		<!-- Stage -->
		<td<?php echo $ivf_oocytedenudation_stage->Stage->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_stage->Stage->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->Stage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
		<!-- ReMarks -->
		<td<?php echo $ivf_oocytedenudation_stage->ReMarks->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_stage->ReMarks->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->ReMarks->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_stage_preview->ListOptions->render("body", "right", $ivf_oocytedenudation_stage_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_oocytedenudation_stage_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_oocytedenudation_stage_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_oocytedenudation_stage_preview->Pager)) $ivf_oocytedenudation_stage_preview->Pager = new PrevNextPager($ivf_oocytedenudation_stage_preview->StartRec, $ivf_oocytedenudation_stage_preview->DisplayRecs, $ivf_oocytedenudation_stage_preview->TotalRecs) ?>
<?php if ($ivf_oocytedenudation_stage_preview->Pager->RecordCount > 0 && $ivf_oocytedenudation_stage_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_oocytedenudation_stage_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_oocytedenudation_stage_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_oocytedenudation_stage_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_oocytedenudation_stage_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_oocytedenudation_stage_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_oocytedenudation_stage_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_oocytedenudation_stage_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_oocytedenudation_stage_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_oocytedenudation_stage_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_oocytedenudation_stage_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_oocytedenudation_stage_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_oocytedenudation_stage_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_oocytedenudation_stage_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_oocytedenudation_stage_preview->Recordset)
	$ivf_oocytedenudation_stage_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_oocytedenudation_stage_preview->terminate();
?>