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
<?php if ($employee_telephone_preview->TotalRecords > 0) { ?>
<div class="card ew-grid employee_telephone"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_telephone_preview->renderListOptions();

// Render list options (header, left)
$employee_telephone_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_telephone_preview->id->Visible) { // id ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone_preview->id) == "") { ?>
		<th class="<?php echo $employee_telephone_preview->id->headerCellClass() ?>"><?php echo $employee_telephone_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_telephone_preview->id->Name) ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone_preview->id->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone_preview->id->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone_preview->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone_preview->employee_id) == "") { ?>
		<th class="<?php echo $employee_telephone_preview->employee_id->headerCellClass() ?>"><?php echo $employee_telephone_preview->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone_preview->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_telephone_preview->employee_id->Name) ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone_preview->employee_id->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone_preview->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone_preview->employee_id->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone_preview->tele_type->Visible) { // tele_type ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone_preview->tele_type) == "") { ?>
		<th class="<?php echo $employee_telephone_preview->tele_type->headerCellClass() ?>"><?php echo $employee_telephone_preview->tele_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone_preview->tele_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_telephone_preview->tele_type->Name) ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone_preview->tele_type->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone_preview->tele_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone_preview->tele_type->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone_preview->telephone->Visible) { // telephone ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone_preview->telephone) == "") { ?>
		<th class="<?php echo $employee_telephone_preview->telephone->headerCellClass() ?>"><?php echo $employee_telephone_preview->telephone->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone_preview->telephone->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_telephone_preview->telephone->Name) ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone_preview->telephone->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone_preview->telephone->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone_preview->telephone->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone_preview->telephone_type->Visible) { // telephone_type ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone_preview->telephone_type) == "") { ?>
		<th class="<?php echo $employee_telephone_preview->telephone_type->headerCellClass() ?>"><?php echo $employee_telephone_preview->telephone_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone_preview->telephone_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_telephone_preview->telephone_type->Name) ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone_preview->telephone_type->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone_preview->telephone_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone_preview->telephone_type->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone_preview->status->Visible) { // status ?>
	<?php if ($employee_telephone->SortUrl($employee_telephone_preview->status) == "") { ?>
		<th class="<?php echo $employee_telephone_preview->status->headerCellClass() ?>"><?php echo $employee_telephone_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_telephone_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_telephone_preview->status->Name) ?>" data-sort-order="<?php echo $employee_telephone_preview->SortField == $employee_telephone_preview->status->Name && $employee_telephone_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone_preview->SortField == $employee_telephone_preview->status->Name) { ?><?php if ($employee_telephone_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_telephone_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$employee_telephone_preview->RowCount = 0;
while ($employee_telephone_preview->Recordset && !$employee_telephone_preview->Recordset->EOF) {

	// Init row class and style
	$employee_telephone_preview->RecCount++;
	$employee_telephone_preview->RowCount++;
	$employee_telephone_preview->CssStyle = "";
	$employee_telephone_preview->loadListRowValues($employee_telephone_preview->Recordset);

	// Render row
	$employee_telephone->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_telephone_preview->resetAttributes();
	$employee_telephone_preview->renderListRow();

	// Render list options
	$employee_telephone_preview->renderListOptions();
?>
	<tr <?php echo $employee_telephone->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_telephone_preview->ListOptions->render("body", "left", $employee_telephone_preview->RowCount);
?>
<?php if ($employee_telephone_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_telephone_preview->id->cellAttributes() ?>>
<span<?php echo $employee_telephone_preview->id->viewAttributes() ?>><?php echo $employee_telephone_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone_preview->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_telephone_preview->employee_id->cellAttributes() ?>>
<span<?php echo $employee_telephone_preview->employee_id->viewAttributes() ?>><?php echo $employee_telephone_preview->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone_preview->tele_type->Visible) { // tele_type ?>
		<!-- tele_type -->
		<td<?php echo $employee_telephone_preview->tele_type->cellAttributes() ?>>
<span<?php echo $employee_telephone_preview->tele_type->viewAttributes() ?>><?php echo $employee_telephone_preview->tele_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone_preview->telephone->Visible) { // telephone ?>
		<!-- telephone -->
		<td<?php echo $employee_telephone_preview->telephone->cellAttributes() ?>>
<span<?php echo $employee_telephone_preview->telephone->viewAttributes() ?>><?php echo $employee_telephone_preview->telephone->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone_preview->telephone_type->Visible) { // telephone_type ?>
		<!-- telephone_type -->
		<td<?php echo $employee_telephone_preview->telephone_type->cellAttributes() ?>>
<span<?php echo $employee_telephone_preview->telephone_type->viewAttributes() ?>><?php echo $employee_telephone_preview->telephone_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_telephone_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_telephone_preview->status->cellAttributes() ?>>
<span<?php echo $employee_telephone_preview->status->viewAttributes() ?>><?php echo $employee_telephone_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_telephone_preview->ListOptions->render("body", "right", $employee_telephone_preview->RowCount);
?>
	</tr>
<?php
	$employee_telephone_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $employee_telephone_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_telephone_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($employee_telephone_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$employee_telephone_preview->showPageFooter();
if (Config("DEBUG"))
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