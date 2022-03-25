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
<?php if ($employee_has_degree_preview->TotalRecords > 0) { ?>
<div class="card ew-grid employee_has_degree"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_has_degree_preview->renderListOptions();

// Render list options (header, left)
$employee_has_degree_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_has_degree_preview->id->Visible) { // id ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree_preview->id) == "") { ?>
		<th class="<?php echo $employee_has_degree_preview->id->headerCellClass() ?>"><?php echo $employee_has_degree_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_degree_preview->id->Name) ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree_preview->id->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree_preview->id->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_preview->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree_preview->employee_id) == "") { ?>
		<th class="<?php echo $employee_has_degree_preview->employee_id->headerCellClass() ?>"><?php echo $employee_has_degree_preview->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree_preview->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_degree_preview->employee_id->Name) ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree_preview->employee_id->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_preview->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree_preview->employee_id->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_preview->degree_id->Visible) { // degree_id ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree_preview->degree_id) == "") { ?>
		<th class="<?php echo $employee_has_degree_preview->degree_id->headerCellClass() ?>"><?php echo $employee_has_degree_preview->degree_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree_preview->degree_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_degree_preview->degree_id->Name) ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree_preview->degree_id->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_preview->degree_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree_preview->degree_id->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_preview->college_or_school->Visible) { // college_or_school ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree_preview->college_or_school) == "") { ?>
		<th class="<?php echo $employee_has_degree_preview->college_or_school->headerCellClass() ?>"><?php echo $employee_has_degree_preview->college_or_school->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree_preview->college_or_school->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_degree_preview->college_or_school->Name) ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree_preview->college_or_school->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_preview->college_or_school->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree_preview->college_or_school->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_preview->university_or_board->Visible) { // university_or_board ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree_preview->university_or_board) == "") { ?>
		<th class="<?php echo $employee_has_degree_preview->university_or_board->headerCellClass() ?>"><?php echo $employee_has_degree_preview->university_or_board->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree_preview->university_or_board->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_degree_preview->university_or_board->Name) ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree_preview->university_or_board->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_preview->university_or_board->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree_preview->university_or_board->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_preview->year_of_passing->Visible) { // year_of_passing ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree_preview->year_of_passing) == "") { ?>
		<th class="<?php echo $employee_has_degree_preview->year_of_passing->headerCellClass() ?>"><?php echo $employee_has_degree_preview->year_of_passing->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree_preview->year_of_passing->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_degree_preview->year_of_passing->Name) ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree_preview->year_of_passing->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_preview->year_of_passing->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree_preview->year_of_passing->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_preview->scoring_marks->Visible) { // scoring_marks ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree_preview->scoring_marks) == "") { ?>
		<th class="<?php echo $employee_has_degree_preview->scoring_marks->headerCellClass() ?>"><?php echo $employee_has_degree_preview->scoring_marks->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree_preview->scoring_marks->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_degree_preview->scoring_marks->Name) ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree_preview->scoring_marks->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_preview->scoring_marks->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree_preview->scoring_marks->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_preview->certificates->Visible) { // certificates ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree_preview->certificates) == "") { ?>
		<th class="<?php echo $employee_has_degree_preview->certificates->headerCellClass() ?>"><?php echo $employee_has_degree_preview->certificates->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree_preview->certificates->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_degree_preview->certificates->Name) ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree_preview->certificates->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_preview->certificates->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree_preview->certificates->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_preview->others->Visible) { // others ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree_preview->others) == "") { ?>
		<th class="<?php echo $employee_has_degree_preview->others->headerCellClass() ?>"><?php echo $employee_has_degree_preview->others->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree_preview->others->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_degree_preview->others->Name) ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree_preview->others->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_preview->others->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree_preview->others->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_preview->status->Visible) { // status ?>
	<?php if ($employee_has_degree->SortUrl($employee_has_degree_preview->status) == "") { ?>
		<th class="<?php echo $employee_has_degree_preview->status->headerCellClass() ?>"><?php echo $employee_has_degree_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_has_degree_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_has_degree_preview->status->Name) ?>" data-sort-order="<?php echo $employee_has_degree_preview->SortField == $employee_has_degree_preview->status->Name && $employee_has_degree_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_preview->SortField == $employee_has_degree_preview->status->Name) { ?><?php if ($employee_has_degree_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$employee_has_degree_preview->RowCount = 0;
while ($employee_has_degree_preview->Recordset && !$employee_has_degree_preview->Recordset->EOF) {

	// Init row class and style
	$employee_has_degree_preview->RecCount++;
	$employee_has_degree_preview->RowCount++;
	$employee_has_degree_preview->CssStyle = "";
	$employee_has_degree_preview->loadListRowValues($employee_has_degree_preview->Recordset);

	// Render row
	$employee_has_degree->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_has_degree_preview->resetAttributes();
	$employee_has_degree_preview->renderListRow();

	// Render list options
	$employee_has_degree_preview->renderListOptions();
?>
	<tr <?php echo $employee_has_degree->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_degree_preview->ListOptions->render("body", "left", $employee_has_degree_preview->RowCount);
?>
<?php if ($employee_has_degree_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_has_degree_preview->id->cellAttributes() ?>>
<span<?php echo $employee_has_degree_preview->id->viewAttributes() ?>><?php echo $employee_has_degree_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree_preview->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_has_degree_preview->employee_id->cellAttributes() ?>>
<span<?php echo $employee_has_degree_preview->employee_id->viewAttributes() ?>><?php echo $employee_has_degree_preview->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree_preview->degree_id->Visible) { // degree_id ?>
		<!-- degree_id -->
		<td<?php echo $employee_has_degree_preview->degree_id->cellAttributes() ?>>
<span<?php echo $employee_has_degree_preview->degree_id->viewAttributes() ?>><?php echo $employee_has_degree_preview->degree_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree_preview->college_or_school->Visible) { // college_or_school ?>
		<!-- college_or_school -->
		<td<?php echo $employee_has_degree_preview->college_or_school->cellAttributes() ?>>
<span<?php echo $employee_has_degree_preview->college_or_school->viewAttributes() ?>><?php echo $employee_has_degree_preview->college_or_school->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree_preview->university_or_board->Visible) { // university_or_board ?>
		<!-- university_or_board -->
		<td<?php echo $employee_has_degree_preview->university_or_board->cellAttributes() ?>>
<span<?php echo $employee_has_degree_preview->university_or_board->viewAttributes() ?>><?php echo $employee_has_degree_preview->university_or_board->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree_preview->year_of_passing->Visible) { // year_of_passing ?>
		<!-- year_of_passing -->
		<td<?php echo $employee_has_degree_preview->year_of_passing->cellAttributes() ?>>
<span<?php echo $employee_has_degree_preview->year_of_passing->viewAttributes() ?>><?php echo $employee_has_degree_preview->year_of_passing->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree_preview->scoring_marks->Visible) { // scoring_marks ?>
		<!-- scoring_marks -->
		<td<?php echo $employee_has_degree_preview->scoring_marks->cellAttributes() ?>>
<span<?php echo $employee_has_degree_preview->scoring_marks->viewAttributes() ?>><?php echo $employee_has_degree_preview->scoring_marks->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree_preview->certificates->Visible) { // certificates ?>
		<!-- certificates -->
		<td<?php echo $employee_has_degree_preview->certificates->cellAttributes() ?>>
<span><?php echo GetFileViewTag($employee_has_degree_preview->certificates, $employee_has_degree_preview->certificates->getViewValue(), FALSE) ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree_preview->others->Visible) { // others ?>
		<!-- others -->
		<td<?php echo $employee_has_degree_preview->others->cellAttributes() ?>>
<span<?php echo $employee_has_degree_preview->others->viewAttributes() ?>><?php echo GetFileViewTag($employee_has_degree_preview->others, $employee_has_degree_preview->others->getViewValue(), FALSE) ?></span>
</td>
<?php } ?>
<?php if ($employee_has_degree_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_has_degree_preview->status->cellAttributes() ?>>
<span<?php echo $employee_has_degree_preview->status->viewAttributes() ?>><?php echo $employee_has_degree_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_has_degree_preview->ListOptions->render("body", "right", $employee_has_degree_preview->RowCount);
?>
	</tr>
<?php
	$employee_has_degree_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $employee_has_degree_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_has_degree_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($employee_has_degree_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$employee_has_degree_preview->showPageFooter();
if (Config("DEBUG"))
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