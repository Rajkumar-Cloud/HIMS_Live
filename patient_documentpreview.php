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
$patient_document_preview = new patient_document_preview();

// Run the page
$patient_document_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_document_preview->Page_Render();
?>
<?php $patient_document_preview->showPageHeader(); ?>
<div class="card ew-grid patient_document"><!-- .card -->
<?php if ($patient_document_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_document_preview->renderListOptions();

// Render list options (header, left)
$patient_document_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_document->id->Visible) { // id ?>
	<?php if ($patient_document->SortUrl($patient_document->id) == "") { ?>
		<th class="<?php echo $patient_document->id->headerCellClass() ?>"><?php echo $patient_document->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_document->id->Name ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document->id->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_document->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document->id->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_document->SortUrl($patient_document->patient_id) == "") { ?>
		<th class="<?php echo $patient_document->patient_id->headerCellClass() ?>"><?php echo $patient_document->patient_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document->patient_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_document->patient_id->Name ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document->patient_id->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_document->patient_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document->patient_id->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
	<?php if ($patient_document->SortUrl($patient_document->DocumentName) == "") { ?>
		<th class="<?php echo $patient_document->DocumentName->headerCellClass() ?>"><?php echo $patient_document->DocumentName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document->DocumentName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_document->DocumentName->Name ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document->DocumentName->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_document->DocumentName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document->DocumentName->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->status->Visible) { // status ?>
	<?php if ($patient_document->SortUrl($patient_document->status) == "") { ?>
		<th class="<?php echo $patient_document->status->headerCellClass() ?>"><?php echo $patient_document->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_document->status->Name ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document->status->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_document->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document->status->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->createdby->Visible) { // createdby ?>
	<?php if ($patient_document->SortUrl($patient_document->createdby) == "") { ?>
		<th class="<?php echo $patient_document->createdby->headerCellClass() ?>"><?php echo $patient_document->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_document->createdby->Name ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document->createdby->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_document->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document->createdby->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_document->SortUrl($patient_document->createddatetime) == "") { ?>
		<th class="<?php echo $patient_document->createddatetime->headerCellClass() ?>"><?php echo $patient_document->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_document->createddatetime->Name ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document->createddatetime->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_document->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document->createddatetime->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_document->SortUrl($patient_document->modifiedby) == "") { ?>
		<th class="<?php echo $patient_document->modifiedby->headerCellClass() ?>"><?php echo $patient_document->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_document->modifiedby->Name ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document->modifiedby->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_document->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document->modifiedby->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_document->SortUrl($patient_document->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_document->modifieddatetime->headerCellClass() ?>"><?php echo $patient_document->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_document->modifieddatetime->Name ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document->modifieddatetime->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_document->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document->modifieddatetime->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($patient_document->SortUrl($patient_document->DocumentNumber) == "") { ?>
		<th class="<?php echo $patient_document->DocumentNumber->headerCellClass() ?>"><?php echo $patient_document->DocumentNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document->DocumentNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_document->DocumentNumber->Name ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document->DocumentNumber->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_document->DocumentNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document->DocumentNumber->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_document_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_document_preview->RecCount = 0;
$patient_document_preview->RowCnt = 0;
while ($patient_document_preview->Recordset && !$patient_document_preview->Recordset->EOF) {

	// Init row class and style
	$patient_document_preview->RecCount++;
	$patient_document_preview->RowCnt++;
	$patient_document_preview->CssStyle = "";
	$patient_document_preview->loadListRowValues($patient_document_preview->Recordset);

	// Render row
	$patient_document_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_document_preview->resetAttributes();
	$patient_document_preview->renderListRow();

	// Render list options
	$patient_document_preview->renderListOptions();
?>
	<tr<?php echo $patient_document_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_document_preview->ListOptions->render("body", "left", $patient_document_preview->RowCnt);
?>
<?php if ($patient_document->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_document->id->cellAttributes() ?>>
<span<?php echo $patient_document->id->viewAttributes() ?>>
<?php echo $patient_document->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
		<!-- patient_id -->
		<td<?php echo $patient_document->patient_id->cellAttributes() ?>>
<span<?php echo $patient_document->patient_id->viewAttributes() ?>>
<?php echo $patient_document->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
		<!-- DocumentName -->
		<td<?php echo $patient_document->DocumentName->cellAttributes() ?>>
<span<?php echo $patient_document->DocumentName->viewAttributes() ?>>
<?php echo $patient_document->DocumentName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_document->status->cellAttributes() ?>>
<span<?php echo $patient_document->status->viewAttributes() ?>>
<?php echo $patient_document->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_document->createdby->cellAttributes() ?>>
<span<?php echo $patient_document->createdby->viewAttributes() ?>>
<?php echo $patient_document->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_document->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_document->createddatetime->viewAttributes() ?>>
<?php echo $patient_document->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_document->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_document->modifiedby->viewAttributes() ?>>
<?php echo $patient_document->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_document->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_document->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_document->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<!-- DocumentNumber -->
		<td<?php echo $patient_document->DocumentNumber->cellAttributes() ?>>
<span<?php echo $patient_document->DocumentNumber->viewAttributes() ?>>
<?php echo $patient_document->DocumentNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_document_preview->ListOptions->render("body", "right", $patient_document_preview->RowCnt);
?>
	</tr>
<?php
	$patient_document_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_document_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_document_preview->Pager)) $patient_document_preview->Pager = new PrevNextPager($patient_document_preview->StartRec, $patient_document_preview->DisplayRecs, $patient_document_preview->TotalRecs) ?>
<?php if ($patient_document_preview->Pager->RecordCount > 0 && $patient_document_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_document_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_document_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_document_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_document_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_document_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_document_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_document_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_document_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_document_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_document_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_document_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_document_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_document_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_document_preview->Recordset)
	$patient_document_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_document_preview->terminate();
?>