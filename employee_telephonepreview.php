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
$employee_telephone_preview = new employee_telephone_preview();

// Run the page
$employee_telephone_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_telephone_preview->Page_Render();
?>
<?php $employee_telephone_preview->showPageHeader(); ?>
<div class="card ew-grid employee_telephone"><!-- .card -->
<?php if ($employee_telephone_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_telephone_preview->renderListOptions();

// Render list options (header, left)
$employee_telephone_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_telephone->id->Visible) { // id ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone->id) == "") { ?>
		<th class="<?php echo $employee_telephone->id->headerCellClass() ?>"><?php echo $employee_telephone->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_telephone->id->Name ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone->id->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_telephone->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone->id->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone->employee_id) == "") { ?>
		<th class="<?php echo $employee_telephone->employee_id->headerCellClass() ?>"><?php echo $employee_telephone->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_telephone->employee_id->Name ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone->employee_id->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_telephone->employee_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone->employee_id->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->tele_type->Visible) { // tele_type ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone->tele_type) == "") { ?>
		<th class="<?php echo $employee_telephone->tele_type->headerCellClass() ?>"><?php echo $employee_telephone->tele_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone->tele_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_telephone->tele_type->Name ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone->tele_type->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_telephone->tele_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone->tele_type->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->telephone->Visible) { // telephone ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone->telephone) == "") { ?>
		<th class="<?php echo $employee_telephone->telephone->headerCellClass() ?>"><?php echo $employee_telephone->telephone->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone->telephone->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_telephone->telephone->Name ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone->telephone->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_telephone->telephone->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone->telephone->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->telephone_type->Visible) { // telephone_type ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone->telephone_type) == "") { ?>
		<th class="<?php echo $employee_telephone->telephone_type->headerCellClass() ?>"><?php echo $employee_telephone->telephone_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone->telephone_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_telephone->telephone_type->Name ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone->telephone_type->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_telephone->telephone_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone->telephone_type->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->status->Visible) { // status ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone->status) == "") { ?>
		<th class="<?php echo $employee_telephone->status->headerCellClass() ?>"><?php echo $employee_telephone->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_telephone->status->Name ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone->status->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_telephone->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone->status->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->HospID->Visible) { // HospID ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone->HospID) == "") { ?>
		<th class="<?php echo $employee_telephone->HospID->headerCellClass() ?>"><?php echo $employee_telephone->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_telephone->HospID->Name ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone->HospID->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_telephone->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone->HospID->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_telephone_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$employee_telephone_preview->RecCount = 0;
$employee_telephone_preview->RowCnt = 0;
while ($employee_telephone_preview->Recordset && !$employee_telephone_preview->Recordset->EOF) {

	// Init row class and style
	$employee_telephone_preview->RecCount++;
	$employee_telephone_preview->RowCnt++;
	$employee_telephone_preview->CssStyle = "";
	$employee_telephone_preview->loadListRowValues($employee_telephone_preview->Recordset);

	// Render row
	$employee_telephone_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_telephone_preview->resetAttributes();
	$employee_telephone_preview->renderListRow();

	// Render list options
	$employee_telephone_preview->renderListOptions();
?>
	<tr<?php echo $employee_telephone_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_telephone_preview->ListOptions->render("body", "left", $employee_telephone_preview->RowCnt);
?>
<?php if ($employee_telephone->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_telephone->id->cellAttributes() ?>>
<span<?php echo $employee_telephone->id->viewAttributes() ?>>
<?php echo $employee_telephone->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_telephone->employee_id->cellAttributes() ?>>
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<?php echo $employee_telephone->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone->tele_type->Visible) { // tele_type ?>
		<!-- tele_type -->
		<td<?php echo $employee_telephone->tele_type->cellAttributes() ?>>
<span<?php echo $employee_telephone->tele_type->viewAttributes() ?>>
<?php echo $employee_telephone->tele_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone->telephone->Visible) { // telephone ?>
		<!-- telephone -->
		<td<?php echo $employee_telephone->telephone->cellAttributes() ?>>
<span<?php echo $employee_telephone->telephone->viewAttributes() ?>>
<?php echo $employee_telephone->telephone->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone->telephone_type->Visible) { // telephone_type ?>
		<!-- telephone_type -->
		<td<?php echo $employee_telephone->telephone_type->cellAttributes() ?>>
<span<?php echo $employee_telephone->telephone_type->viewAttributes() ?>>
<?php echo $employee_telephone->telephone_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_telephone->status->cellAttributes() ?>>
<span<?php echo $employee_telephone->status->viewAttributes() ?>>
<?php echo $employee_telephone->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $employee_telephone->HospID->cellAttributes() ?>>
<span<?php echo $employee_telephone->HospID->viewAttributes() ?>>
<?php echo $employee_telephone->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_telephone_preview->ListOptions->render("body", "right", $employee_telephone_preview->RowCnt);
?>
	</tr>
<?php
	$employee_telephone_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($employee_telephone_preview->TotalRecs > 0) { ?>
<?php if (!isset($employee_telephone_preview->Pager)) $employee_telephone_preview->Pager = new PrevNextPager($employee_telephone_preview->StartRec, $employee_telephone_preview->DisplayRecs, $employee_telephone_preview->TotalRecs) ?>
<?php if ($employee_telephone_preview->Pager->RecordCount > 0 && $employee_telephone_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($employee_telephone_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $employee_telephone_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($employee_telephone_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $employee_telephone_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($employee_telephone_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $employee_telephone_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($employee_telephone_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $employee_telephone_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_telephone_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_telephone_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_telephone_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_telephone_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$employee_telephone_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($employee_telephone_preview->Recordset)
	$employee_telephone_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$employee_telephone_preview->terminate();
?>