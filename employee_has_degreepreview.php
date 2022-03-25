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
$employee_has_degree_preview = new employee_has_degree_preview();

// Run the page
$employee_has_degree_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_degree_preview->Page_Render();
?>
<?php $employee_has_degree_preview->showPageHeader(); ?>
<div class="card ew-grid employee_has_degree"><!-- .card -->
<?php if ($employee_has_degree_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_has_degree_preview->renderListOptions();

// Render list options (header, left)
$employee_has_degree_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_has_degree->id->Visible) { // id ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->id) == "") { ?>
		<th class="<?php echo $employee_has_degree->id->headerCellClass() ?>"><?php echo $employee_has_degree->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->id->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->id->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->id->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->employee_id) == "") { ?>
		<th class="<?php echo $employee_has_degree->employee_id->headerCellClass() ?>"><?php echo $employee_has_degree->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->employee_id->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->employee_id->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->employee_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->employee_id->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->degree_id->Visible) { // degree_id ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->degree_id) == "") { ?>
		<th class="<?php echo $employee_has_degree->degree_id->headerCellClass() ?>"><?php echo $employee_has_degree->degree_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->degree_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->degree_id->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->degree_id->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->degree_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->degree_id->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->college_or_school->Visible) { // college_or_school ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->college_or_school) == "") { ?>
		<th class="<?php echo $employee_has_degree->college_or_school->headerCellClass() ?>"><?php echo $employee_has_degree->college_or_school->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->college_or_school->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->college_or_school->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->college_or_school->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->college_or_school->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->college_or_school->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->university_or_board->Visible) { // university_or_board ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->university_or_board) == "") { ?>
		<th class="<?php echo $employee_has_degree->university_or_board->headerCellClass() ?>"><?php echo $employee_has_degree->university_or_board->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->university_or_board->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->university_or_board->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->university_or_board->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->university_or_board->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->university_or_board->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->year_of_passing->Visible) { // year_of_passing ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->year_of_passing) == "") { ?>
		<th class="<?php echo $employee_has_degree->year_of_passing->headerCellClass() ?>"><?php echo $employee_has_degree->year_of_passing->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->year_of_passing->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->year_of_passing->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->year_of_passing->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->year_of_passing->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->year_of_passing->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->scoring_marks->Visible) { // scoring_marks ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->scoring_marks) == "") { ?>
		<th class="<?php echo $employee_has_degree->scoring_marks->headerCellClass() ?>"><?php echo $employee_has_degree->scoring_marks->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->scoring_marks->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->scoring_marks->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->scoring_marks->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->scoring_marks->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->scoring_marks->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->certificates->Visible) { // certificates ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->certificates) == "") { ?>
		<th class="<?php echo $employee_has_degree->certificates->headerCellClass() ?>"><?php echo $employee_has_degree->certificates->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->certificates->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->certificates->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->certificates->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->certificates->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->certificates->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->others->Visible) { // others ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->others) == "") { ?>
		<th class="<?php echo $employee_has_degree->others->headerCellClass() ?>"><?php echo $employee_has_degree->others->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->others->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->others->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->others->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->others->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->others->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->status->Visible) { // status ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->status) == "") { ?>
		<th class="<?php echo $employee_has_degree->status->headerCellClass() ?>"><?php echo $employee_has_degree->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->status->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->status->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->status->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->HospID->Visible) { // HospID ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree->HospID) == "") { ?>
		<th class="<?php echo $employee_has_degree->HospID->headerCellClass() ?>"><?php echo $employee_has_degree->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_degree->HospID->Name ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree->HospID->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_degree->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree->HospID->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_has_degree_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$employee_has_degree_preview->RecCount = 0;
$employee_has_degree_preview->RowCnt = 0;
while ($employee_has_degree_preview->Recordset && !$employee_has_degree_preview->Recordset->EOF) {

	// Init row class and style
	$employee_has_degree_preview->RecCount++;
	$employee_has_degree_preview->RowCnt++;
	$employee_has_degree_preview->CssStyle = "";
	$employee_has_degree_preview->loadListRowValues($employee_has_degree_preview->Recordset);

	// Render row
	$employee_has_degree_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_has_degree_preview->resetAttributes();
	$employee_has_degree_preview->renderListRow();

	// Render list options
	$employee_has_degree_preview->renderListOptions();
?>
	<tr<?php echo $employee_has_degree_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_degree_preview->ListOptions->render("body", "left", $employee_has_degree_preview->RowCnt);
?>
<?php if ($employee_has_degree->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_has_degree->id->cellAttributes() ?>>
<span<?php echo $employee_has_degree->id->viewAttributes() ?>>
<?php echo $employee_has_degree->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_has_degree->employee_id->cellAttributes() ?>>
<span<?php echo $employee_has_degree->employee_id->viewAttributes() ?>>
<?php echo $employee_has_degree->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree->degree_id->Visible) { // degree_id ?>
		<!-- degree_id -->
		<td<?php echo $employee_has_degree->degree_id->cellAttributes() ?>>
<span<?php echo $employee_has_degree->degree_id->viewAttributes() ?>>
<?php echo $employee_has_degree->degree_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree->college_or_school->Visible) { // college_or_school ?>
		<!-- college_or_school -->
		<td<?php echo $employee_has_degree->college_or_school->cellAttributes() ?>>
<span<?php echo $employee_has_degree->college_or_school->viewAttributes() ?>>
<?php echo $employee_has_degree->college_or_school->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree->university_or_board->Visible) { // university_or_board ?>
		<!-- university_or_board -->
		<td<?php echo $employee_has_degree->university_or_board->cellAttributes() ?>>
<span<?php echo $employee_has_degree->university_or_board->viewAttributes() ?>>
<?php echo $employee_has_degree->university_or_board->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree->year_of_passing->Visible) { // year_of_passing ?>
		<!-- year_of_passing -->
		<td<?php echo $employee_has_degree->year_of_passing->cellAttributes() ?>>
<span<?php echo $employee_has_degree->year_of_passing->viewAttributes() ?>>
<?php echo $employee_has_degree->year_of_passing->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree->scoring_marks->Visible) { // scoring_marks ?>
		<!-- scoring_marks -->
		<td<?php echo $employee_has_degree->scoring_marks->cellAttributes() ?>>
<span<?php echo $employee_has_degree->scoring_marks->viewAttributes() ?>>
<?php echo $employee_has_degree->scoring_marks->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree->certificates->Visible) { // certificates ?>
		<!-- certificates -->
		<td<?php echo $employee_has_degree->certificates->cellAttributes() ?>>
<span>
<?php echo GetFileViewTag($employee_has_degree->certificates, $employee_has_degree->certificates->getViewValue()) ?>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->others->Visible) { // others ?>
		<!-- others -->
		<td<?php echo $employee_has_degree->others->cellAttributes() ?>>
<span<?php echo $employee_has_degree->others->viewAttributes() ?>>
<?php echo GetFileViewTag($employee_has_degree->others, $employee_has_degree->others->getViewValue()) ?>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_has_degree->status->cellAttributes() ?>>
<span<?php echo $employee_has_degree->status->viewAttributes() ?>>
<?php echo $employee_has_degree->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $employee_has_degree->HospID->cellAttributes() ?>>
<span<?php echo $employee_has_degree->HospID->viewAttributes() ?>>
<?php echo $employee_has_degree->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_has_degree_preview->ListOptions->render("body", "right", $employee_has_degree_preview->RowCnt);
?>
	</tr>
<?php
	$employee_has_degree_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($employee_has_degree_preview->TotalRecs > 0) { ?>
<?php if (!isset($employee_has_degree_preview->Pager)) $employee_has_degree_preview->Pager = new PrevNextPager($employee_has_degree_preview->StartRec, $employee_has_degree_preview->DisplayRecs, $employee_has_degree_preview->TotalRecs) ?>
<?php if ($employee_has_degree_preview->Pager->RecordCount > 0 && $employee_has_degree_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($employee_has_degree_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $employee_has_degree_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($employee_has_degree_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $employee_has_degree_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($employee_has_degree_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $employee_has_degree_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($employee_has_degree_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $employee_has_degree_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_has_degree_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_has_degree_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_has_degree_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_has_degree_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$employee_has_degree_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($employee_has_degree_preview->Recordset)
	$employee_has_degree_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$employee_has_degree_preview->terminate();
?>