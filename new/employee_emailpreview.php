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
$employee_email_preview = new employee_email_preview();

// Run the page
$employee_email_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_email_preview->Page_Render();
?>
<?php $employee_email_preview->showPageHeader(); ?>
<?php if ($employee_email_preview->TotalRecords > 0) { ?>
<div class="card ew-grid employee_email"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_email_preview->renderListOptions();

// Render list options (header, left)
$employee_email_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_email_preview->id->Visible) { // id ?>
	<?php if ($employee_email->SortUrl($employee_email_preview->id) == "") { ?>
		<th class="<?php echo $employee_email_preview->id->headerCellClass() ?>"><?php echo $employee_email_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_email_preview->id->Name) ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email_preview->id->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email_preview->id->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email_preview->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_email->SortUrl($employee_email_preview->employee_id) == "") { ?>
		<th class="<?php echo $employee_email_preview->employee_id->headerCellClass() ?>"><?php echo $employee_email_preview->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email_preview->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_email_preview->employee_id->Name) ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email_preview->employee_id->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email_preview->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email_preview->employee_id->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email_preview->_email->Visible) { // email ?>
	<?php if ($employee_email->SortUrl($employee_email_preview->_email) == "") { ?>
		<th class="<?php echo $employee_email_preview->_email->headerCellClass() ?>"><?php echo $employee_email_preview->_email->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email_preview->_email->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_email_preview->_email->Name) ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email_preview->_email->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email_preview->_email->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email_preview->_email->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email_preview->email_type->Visible) { // email_type ?>
	<?php if ($employee_email->SortUrl($employee_email_preview->email_type) == "") { ?>
		<th class="<?php echo $employee_email_preview->email_type->headerCellClass() ?>"><?php echo $employee_email_preview->email_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email_preview->email_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_email_preview->email_type->Name) ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email_preview->email_type->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email_preview->email_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email_preview->email_type->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email_preview->status->Visible) { // status ?>
	<?php if ($employee_email->SortUrl($employee_email_preview->status) == "") { ?>
		<th class="<?php echo $employee_email_preview->status->headerCellClass() ?>"><?php echo $employee_email_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_email_preview->status->Name) ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email_preview->status->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email_preview->status->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_email_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$employee_email_preview->RecCount = 0;
$employee_email_preview->RowCount = 0;
while ($employee_email_preview->Recordset && !$employee_email_preview->Recordset->EOF) {

	// Init row class and style
	$employee_email_preview->RecCount++;
	$employee_email_preview->RowCount++;
	$employee_email_preview->CssStyle = "";
	$employee_email_preview->loadListRowValues($employee_email_preview->Recordset);

	// Render row
	$employee_email->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_email_preview->resetAttributes();
	$employee_email_preview->renderListRow();

	// Render list options
	$employee_email_preview->renderListOptions();
?>
	<tr <?php echo $employee_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_email_preview->ListOptions->render("body", "left", $employee_email_preview->RowCount);
?>
<?php if ($employee_email_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_email_preview->id->cellAttributes() ?>>
<span<?php echo $employee_email_preview->id->viewAttributes() ?>><?php echo $employee_email_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_email_preview->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_email_preview->employee_id->cellAttributes() ?>>
<span<?php echo $employee_email_preview->employee_id->viewAttributes() ?>><?php echo $employee_email_preview->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_email_preview->_email->Visible) { // email ?>
		<!-- email -->
		<td<?php echo $employee_email_preview->_email->cellAttributes() ?>>
<span<?php echo $employee_email_preview->_email->viewAttributes() ?>><?php echo $employee_email_preview->_email->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_email_preview->email_type->Visible) { // email_type ?>
		<!-- email_type -->
		<td<?php echo $employee_email_preview->email_type->cellAttributes() ?>>
<span<?php echo $employee_email_preview->email_type->viewAttributes() ?>><?php echo $employee_email_preview->email_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_email_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_email_preview->status->cellAttributes() ?>>
<span<?php echo $employee_email_preview->status->viewAttributes() ?>><?php echo $employee_email_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_email_preview->ListOptions->render("body", "right", $employee_email_preview->RowCount);
?>
	</tr>
<?php
	$employee_email_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $employee_email_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_email_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($employee_email_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$employee_email_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($employee_email_preview->Recordset)
	$employee_email_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$employee_email_preview->terminate();
?>