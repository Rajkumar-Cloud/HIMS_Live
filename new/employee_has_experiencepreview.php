<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php if ($employee_has_experience_preview->TotalRecords > 0) { ?>
<div class="card ew-grid employee_has_experience"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_has_experience_preview->renderListOptions();

// Render list options (header, left)
$employee_has_experience_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_has_experience_preview->id->Visible) { // id ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->id) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->id->headerCellClass() ?>"><?php echo $employee_has_experience_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->id->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->id->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->id->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_preview->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->employee_id) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->employee_id->headerCellClass() ?>"><?php echo $employee_has_experience_preview->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->employee_id->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->employee_id->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->employee_id->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_preview->working_at->Visible) { // working_at ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->working_at) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->working_at->headerCellClass() ?>"><?php echo $employee_has_experience_preview->working_at->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->working_at->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->working_at->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->working_at->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->working_at->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->working_at->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_preview->job_description->Visible) { // job description ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->job_description) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->job_description->headerCellClass() ?>"><?php echo $employee_has_experience_preview->job_description->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->job_description->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->job_description->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->job_description->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->job_description->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->job_description->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_preview->role->Visible) { // role ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->role) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->role->headerCellClass() ?>"><?php echo $employee_has_experience_preview->role->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->role->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->role->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->role->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->role->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->role->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_preview->start_date->Visible) { // start_date ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->start_date) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->start_date->headerCellClass() ?>"><?php echo $employee_has_experience_preview->start_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->start_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->start_date->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->start_date->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->start_date->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_preview->end_date->Visible) { // end_date ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->end_date) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->end_date->headerCellClass() ?>"><?php echo $employee_has_experience_preview->end_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->end_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->end_date->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->end_date->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->end_date->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_preview->total_experience->Visible) { // total_experience ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->total_experience) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->total_experience->headerCellClass() ?>"><?php echo $employee_has_experience_preview->total_experience->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->total_experience->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->total_experience->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->total_experience->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->total_experience->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->total_experience->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_preview->certificates->Visible) { // certificates ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->certificates) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->certificates->headerCellClass() ?>"><?php echo $employee_has_experience_preview->certificates->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->certificates->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->certificates->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->certificates->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->certificates->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->certificates->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_preview->others->Visible) { // others ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->others) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->others->headerCellClass() ?>"><?php echo $employee_has_experience_preview->others->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->others->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->others->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->others->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->others->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->others->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_preview->status->Visible) { // status ?>
	<?php if ($employee_has_experience->SortUrl($employee_has_experience_preview->status) == "") { ?>
		<th class="<?php echo $employee_has_experience_preview->status->headerCellClass() ?>"><?php echo $employee_has_experience_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_experience_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_experience_preview->status->Name) ?>" data-sort-order="<?php echo $employee_has_experience_preview->SortField == $employee_has_experience_preview->status->Name && $employee_has_experience_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_preview->SortField == $employee_has_experience_preview->status->Name) { ?><?php if ($employee_has_experience_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$employee_has_experience_preview->RowCount = 0;
while ($employee_has_experience_preview->Recordset && !$employee_has_experience_preview->Recordset->EOF) {

	// Init row class and style
	$employee_has_experience_preview->RecCount++;
	$employee_has_experience_preview->RowCount++;
	$employee_has_experience_preview->CssStyle = "";
	$employee_has_experience_preview->loadListRowValues($employee_has_experience_preview->Recordset);

	// Render row
	$employee_has_experience->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_has_experience_preview->resetAttributes();
	$employee_has_experience_preview->renderListRow();

	// Render list options
	$employee_has_experience_preview->renderListOptions();
?>
	<tr <?php echo $employee_has_experience->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_experience_preview->ListOptions->render("body", "left", $employee_has_experience_preview->RowCount);
?>
<?php if ($employee_has_experience_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_has_experience_preview->id->cellAttributes() ?>>
<span<?php echo $employee_has_experience_preview->id->viewAttributes() ?>><?php echo $employee_has_experience_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience_preview->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_has_experience_preview->employee_id->cellAttributes() ?>>
<span<?php echo $employee_has_experience_preview->employee_id->viewAttributes() ?>><?php echo $employee_has_experience_preview->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience_preview->working_at->Visible) { // working_at ?>
		<!-- working_at -->
		<td<?php echo $employee_has_experience_preview->working_at->cellAttributes() ?>>
<span<?php echo $employee_has_experience_preview->working_at->viewAttributes() ?>><?php echo $employee_has_experience_preview->working_at->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience_preview->job_description->Visible) { // job description ?>
		<!-- job description -->
		<td<?php echo $employee_has_experience_preview->job_description->cellAttributes() ?>>
<span<?php echo $employee_has_experience_preview->job_description->viewAttributes() ?>><?php echo $employee_has_experience_preview->job_description->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience_preview->role->Visible) { // role ?>
		<!-- role -->
		<td<?php echo $employee_has_experience_preview->role->cellAttributes() ?>>
<span<?php echo $employee_has_experience_preview->role->viewAttributes() ?>><?php echo $employee_has_experience_preview->role->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience_preview->start_date->Visible) { // start_date ?>
		<!-- start_date -->
		<td<?php echo $employee_has_experience_preview->start_date->cellAttributes() ?>>
<span<?php echo $employee_has_experience_preview->start_date->viewAttributes() ?>><?php echo $employee_has_experience_preview->start_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience_preview->end_date->Visible) { // end_date ?>
		<!-- end_date -->
		<td<?php echo $employee_has_experience_preview->end_date->cellAttributes() ?>>
<span<?php echo $employee_has_experience_preview->end_date->viewAttributes() ?>><?php echo $employee_has_experience_preview->end_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience_preview->total_experience->Visible) { // total_experience ?>
		<!-- total_experience -->
		<td<?php echo $employee_has_experience_preview->total_experience->cellAttributes() ?>>
<span<?php echo $employee_has_experience_preview->total_experience->viewAttributes() ?>><?php echo $employee_has_experience_preview->total_experience->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience_preview->certificates->Visible) { // certificates ?>
		<!-- certificates -->
		<td<?php echo $employee_has_experience_preview->certificates->cellAttributes() ?>>
<span><?php echo GetFileViewTag($employee_has_experience_preview->certificates, $employee_has_experience_preview->certificates->getViewValue(), FALSE) ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience_preview->others->Visible) { // others ?>
		<!-- others -->
		<td<?php echo $employee_has_experience_preview->others->cellAttributes() ?>>
<span<?php echo $employee_has_experience_preview->others->viewAttributes() ?>><?php echo GetFileViewTag($employee_has_experience_preview->others, $employee_has_experience_preview->others->getViewValue(), FALSE) ?></span>
</td>
<?php } ?>
<?php if ($employee_has_experience_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_has_experience_preview->status->cellAttributes() ?>>
<span<?php echo $employee_has_experience_preview->status->viewAttributes() ?>><?php echo $employee_has_experience_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_has_experience_preview->ListOptions->render("body", "right", $employee_has_experience_preview->RowCount);
?>
	</tr>
<?php
	$employee_has_experience_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $employee_has_experience_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_has_experience_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($employee_has_experience_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$employee_has_experience_preview->showPageFooter();
if (Config("DEBUG"))
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