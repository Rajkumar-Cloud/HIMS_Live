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
$employee_document_preview = new employee_document_preview();

// Run the page
$employee_document_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_document_preview->Page_Render();
?>
<?php $employee_document_preview->showPageHeader(); ?>
<div class="card ew-grid employee_document"><!-- .card -->
<?php if ($employee_document_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_document_preview->renderListOptions();

// Render list options (header, left)
$employee_document_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_document->id->Visible) { // id ?>
	<?php if ($employee_document->SortUrl($employee_document->id) == "") { ?>
		<th class="<?php echo $employee_document->id->headerCellClass() ?>"><?php echo $employee_document->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_document->id->Name ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document->id->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_document->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document->id->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_document->SortUrl($employee_document->employee_id) == "") { ?>
		<th class="<?php echo $employee_document->employee_id->headerCellClass() ?>"><?php echo $employee_document->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_document->employee_id->Name ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document->employee_id->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_document->employee_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document->employee_id->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
	<?php if ($employee_document->SortUrl($employee_document->DocumentName) == "") { ?>
		<th class="<?php echo $employee_document->DocumentName->headerCellClass() ?>"><?php echo $employee_document->DocumentName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document->DocumentName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_document->DocumentName->Name ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document->DocumentName->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_document->DocumentName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document->DocumentName->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($employee_document->SortUrl($employee_document->DocumentNumber) == "") { ?>
		<th class="<?php echo $employee_document->DocumentNumber->headerCellClass() ?>"><?php echo $employee_document->DocumentNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document->DocumentNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_document->DocumentNumber->Name ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document->DocumentNumber->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_document->DocumentNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document->DocumentNumber->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->status->Visible) { // status ?>
	<?php if ($employee_document->SortUrl($employee_document->status) == "") { ?>
		<th class="<?php echo $employee_document->status->headerCellClass() ?>"><?php echo $employee_document->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_document->status->Name ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document->status->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_document->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document->status->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->createdby->Visible) { // createdby ?>
	<?php if ($employee_document->SortUrl($employee_document->createdby) == "") { ?>
		<th class="<?php echo $employee_document->createdby->headerCellClass() ?>"><?php echo $employee_document->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_document->createdby->Name ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document->createdby->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_document->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document->createdby->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
	<?php if ($employee_document->SortUrl($employee_document->createddatetime) == "") { ?>
		<th class="<?php echo $employee_document->createddatetime->headerCellClass() ?>"><?php echo $employee_document->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_document->createddatetime->Name ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document->createddatetime->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_document->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document->createddatetime->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
	<?php if ($employee_document->SortUrl($employee_document->modifiedby) == "") { ?>
		<th class="<?php echo $employee_document->modifiedby->headerCellClass() ?>"><?php echo $employee_document->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_document->modifiedby->Name ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document->modifiedby->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_document->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document->modifiedby->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($employee_document->SortUrl($employee_document->modifieddatetime) == "") { ?>
		<th class="<?php echo $employee_document->modifieddatetime->headerCellClass() ?>"><?php echo $employee_document->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_document->modifieddatetime->Name ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document->modifieddatetime->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_document->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document->modifieddatetime->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->HospID->Visible) { // HospID ?>
	<?php if ($employee_document->SortUrl($employee_document->HospID) == "") { ?>
		<th class="<?php echo $employee_document->HospID->headerCellClass() ?>"><?php echo $employee_document->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_document->HospID->Name ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document->HospID->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_document->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document->HospID->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_document_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$employee_document_preview->RecCount = 0;
$employee_document_preview->RowCnt = 0;
while ($employee_document_preview->Recordset && !$employee_document_preview->Recordset->EOF) {

	// Init row class and style
	$employee_document_preview->RecCount++;
	$employee_document_preview->RowCnt++;
	$employee_document_preview->CssStyle = "";
	$employee_document_preview->loadListRowValues($employee_document_preview->Recordset);

	// Render row
	$employee_document_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_document_preview->resetAttributes();
	$employee_document_preview->renderListRow();

	// Render list options
	$employee_document_preview->renderListOptions();
?>
	<tr<?php echo $employee_document_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_document_preview->ListOptions->render("body", "left", $employee_document_preview->RowCnt);
?>
<?php if ($employee_document->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_document->id->cellAttributes() ?>>
<span<?php echo $employee_document->id->viewAttributes() ?>>
<?php echo $employee_document->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_document->employee_id->cellAttributes() ?>>
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<?php echo $employee_document->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
		<!-- DocumentName -->
		<td<?php echo $employee_document->DocumentName->cellAttributes() ?>>
<span<?php echo $employee_document->DocumentName->viewAttributes() ?>>
<?php echo $employee_document->DocumentName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<!-- DocumentNumber -->
		<td<?php echo $employee_document->DocumentNumber->cellAttributes() ?>>
<span<?php echo $employee_document->DocumentNumber->viewAttributes() ?>>
<?php echo $employee_document->DocumentNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_document->status->cellAttributes() ?>>
<span<?php echo $employee_document->status->viewAttributes() ?>>
<?php echo $employee_document->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $employee_document->createdby->cellAttributes() ?>>
<span<?php echo $employee_document->createdby->viewAttributes() ?>>
<?php echo $employee_document->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $employee_document->createddatetime->cellAttributes() ?>>
<span<?php echo $employee_document->createddatetime->viewAttributes() ?>>
<?php echo $employee_document->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $employee_document->modifiedby->cellAttributes() ?>>
<span<?php echo $employee_document->modifiedby->viewAttributes() ?>>
<?php echo $employee_document->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $employee_document->modifieddatetime->cellAttributes() ?>>
<span<?php echo $employee_document->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_document->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $employee_document->HospID->cellAttributes() ?>>
<span<?php echo $employee_document->HospID->viewAttributes() ?>>
<?php echo $employee_document->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_document_preview->ListOptions->render("body", "right", $employee_document_preview->RowCnt);
?>
	</tr>
<?php
	$employee_document_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($employee_document_preview->TotalRecs > 0) { ?>
<?php if (!isset($employee_document_preview->Pager)) $employee_document_preview->Pager = new PrevNextPager($employee_document_preview->StartRec, $employee_document_preview->DisplayRecs, $employee_document_preview->TotalRecs) ?>
<?php if ($employee_document_preview->Pager->RecordCount > 0 && $employee_document_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($employee_document_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $employee_document_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($employee_document_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $employee_document_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($employee_document_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $employee_document_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($employee_document_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $employee_document_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_document_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_document_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_document_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_document_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$employee_document_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($employee_document_preview->Recordset)
	$employee_document_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$employee_document_preview->terminate();
?>