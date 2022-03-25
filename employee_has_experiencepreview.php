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
$employee_has_experience_preview = new employee_has_experience_preview();

// Run the page
$employee_has_experience_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_experience_preview->Page_Render();
?>
<?php $employee_has_experience_preview->showPageHeader(); ?>
<div class="card ew-grid employee_has_experience"><!-- .card -->
<?php if ($employee_has_experience_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_has_experience_preview->renderListOptions();

// Render list options (header, left)
$employee_has_experience_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_has_experience->id->Visible) { // id ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->id) == "") { ?>
		<th class="<?php echo $employee_has_experience->id->headerCellClass() ?>"><?php echo $employee_has_experience->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->id->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->id->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->id->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->employee_id) == "") { ?>
		<th class="<?php echo $employee_has_experience->employee_id->headerCellClass() ?>"><?php echo $employee_has_experience->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->employee_id->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->employee_id->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->employee_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->employee_id->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->working_at) == "") { ?>
		<th class="<?php echo $employee_has_experience->working_at->headerCellClass() ?>"><?php echo $employee_has_experience->working_at->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->working_at->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->working_at->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->working_at->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->working_at->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->working_at->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->job_description) == "") { ?>
		<th class="<?php echo $employee_has_experience->job_description->headerCellClass() ?>"><?php echo $employee_has_experience->job_description->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->job_description->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->job_description->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->job_description->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->job_description->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->job_description->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->role->Visible) { // role ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->role) == "") { ?>
		<th class="<?php echo $employee_has_experience->role->headerCellClass() ?>"><?php echo $employee_has_experience->role->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->role->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->role->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->role->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->role->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->role->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->start_date) == "") { ?>
		<th class="<?php echo $employee_has_experience->start_date->headerCellClass() ?>"><?php echo $employee_has_experience->start_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->start_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->start_date->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->start_date->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->start_date->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->start_date->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->end_date) == "") { ?>
		<th class="<?php echo $employee_has_experience->end_date->headerCellClass() ?>"><?php echo $employee_has_experience->end_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->end_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->end_date->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->end_date->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->end_date->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->end_date->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->total_experience) == "") { ?>
		<th class="<?php echo $employee_has_experience->total_experience->headerCellClass() ?>"><?php echo $employee_has_experience->total_experience->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->total_experience->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->total_experience->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->total_experience->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->total_experience->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->total_experience->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->certificates) == "") { ?>
		<th class="<?php echo $employee_has_experience->certificates->headerCellClass() ?>"><?php echo $employee_has_experience->certificates->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->certificates->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->certificates->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->certificates->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->certificates->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->certificates->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->others->Visible) { // others ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->others) == "") { ?>
		<th class="<?php echo $employee_has_experience->others->headerCellClass() ?>"><?php echo $employee_has_experience->others->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->others->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->others->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->others->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->others->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->others->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->status->Visible) { // status ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->status) == "") { ?>
		<th class="<?php echo $employee_has_experience->status->headerCellClass() ?>"><?php echo $employee_has_experience->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->status->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->status->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->status->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience->HospID) == "") { ?>
		<th class="<?php echo $employee_has_experience->HospID->headerCellClass() ?>"><?php echo $employee_has_experience->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_has_experience->HospID->Name ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience->HospID->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_has_experience->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience->HospID->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_has_experience_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$employee_has_experience_preview->RecCount = 0;
$employee_has_experience_preview->RowCnt = 0;
while ($employee_has_experience_preview->Recordset && !$employee_has_experience_preview->Recordset->EOF) {

	// Init row class and style
	$employee_has_experience_preview->RecCount++;
	$employee_has_experience_preview->RowCnt++;
	$employee_has_experience_preview->CssStyle = "";
	$employee_has_experience_preview->loadListRowValues($employee_has_experience_preview->Recordset);

	// Render row
	$employee_has_experience_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_has_experience_preview->resetAttributes();
	$employee_has_experience_preview->renderListRow();

	// Render list options
	$employee_has_experience_preview->renderListOptions();
?>
	<tr<?php echo $employee_has_experience_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_experience_preview->ListOptions->render("body", "left", $employee_has_experience_preview->RowCnt);
?>
<?php if ($employee_has_experience->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_has_experience->id->cellAttributes() ?>>
<span<?php echo $employee_has_experience->id->viewAttributes() ?>>
<?php echo $employee_has_experience->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_has_experience->employee_id->cellAttributes() ?>>
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<?php echo $employee_has_experience->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
		<!-- working_at -->
		<td<?php echo $employee_has_experience->working_at->cellAttributes() ?>>
<span<?php echo $employee_has_experience->working_at->viewAttributes() ?>>
<?php echo $employee_has_experience->working_at->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
		<!-- job description -->
		<td<?php echo $employee_has_experience->job_description->cellAttributes() ?>>
<span<?php echo $employee_has_experience->job_description->viewAttributes() ?>>
<?php echo $employee_has_experience->job_description->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience->role->Visible) { // role ?>
		<!-- role -->
		<td<?php echo $employee_has_experience->role->cellAttributes() ?>>
<span<?php echo $employee_has_experience->role->viewAttributes() ?>>
<?php echo $employee_has_experience->role->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
		<!-- start_date -->
		<td<?php echo $employee_has_experience->start_date->cellAttributes() ?>>
<span<?php echo $employee_has_experience->start_date->viewAttributes() ?>>
<?php echo $employee_has_experience->start_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
		<!-- end_date -->
		<td<?php echo $employee_has_experience->end_date->cellAttributes() ?>>
<span<?php echo $employee_has_experience->end_date->viewAttributes() ?>>
<?php echo $employee_has_experience->end_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
		<!-- total_experience -->
		<td<?php echo $employee_has_experience->total_experience->cellAttributes() ?>>
<span<?php echo $employee_has_experience->total_experience->viewAttributes() ?>>
<?php echo $employee_has_experience->total_experience->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
		<!-- certificates -->
		<td<?php echo $employee_has_experience->certificates->cellAttributes() ?>>
<span>
<?php echo GetFileViewTag($employee_has_experience->certificates, $employee_has_experience->certificates->getViewValue()) ?>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->others->Visible) { // others ?>
		<!-- others -->
		<td<?php echo $employee_has_experience->others->cellAttributes() ?>>
<span<?php echo $employee_has_experience->others->viewAttributes() ?>>
<?php echo GetFileViewTag($employee_has_experience->others, $employee_has_experience->others->getViewValue()) ?>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_has_experience->status->cellAttributes() ?>>
<span<?php echo $employee_has_experience->status->viewAttributes() ?>>
<?php echo $employee_has_experience->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $employee_has_experience->HospID->cellAttributes() ?>>
<span<?php echo $employee_has_experience->HospID->viewAttributes() ?>>
<?php echo $employee_has_experience->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_has_experience_preview->ListOptions->render("body", "right", $employee_has_experience_preview->RowCnt);
?>
	</tr>
<?php
	$employee_has_experience_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($employee_has_experience_preview->TotalRecs > 0) { ?>
<?php if (!isset($employee_has_experience_preview->Pager)) $employee_has_experience_preview->Pager = new PrevNextPager($employee_has_experience_preview->StartRec, $employee_has_experience_preview->DisplayRecs, $employee_has_experience_preview->TotalRecs) ?>
<?php if ($employee_has_experience_preview->Pager->RecordCount > 0 && $employee_has_experience_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($employee_has_experience_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $employee_has_experience_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($employee_has_experience_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $employee_has_experience_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($employee_has_experience_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $employee_has_experience_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($employee_has_experience_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $employee_has_experience_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_has_experience_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_has_experience_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_has_experience_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_has_experience_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$employee_has_experience_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($employee_has_experience_preview->Recordset)
	$employee_has_experience_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$employee_has_experience_preview->terminate();
?>