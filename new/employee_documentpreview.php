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
<?php if ($employee_document_preview->TotalRecords > 0) { ?>
<div class="card ew-grid employee_document"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_document_preview->renderListOptions();

// Render list options (header, left)
$employee_document_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_document_preview->id->Visible) { // id ?>
	<?php if ($employee_document->SortUrl($employee_document_preview->id) == "") { ?>
		<th class="<?php echo $employee_document_preview->id->headerCellClass() ?>"><?php echo $employee_document_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_document_preview->id->Name) ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document_preview->id->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document_preview->id->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_preview->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_document->SortUrl($employee_document_preview->employee_id) == "") { ?>
		<th class="<?php echo $employee_document_preview->employee_id->headerCellClass() ?>"><?php echo $employee_document_preview->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document_preview->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_document_preview->employee_id->Name) ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document_preview->employee_id->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_preview->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document_preview->employee_id->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_preview->DocumentName->Visible) { // DocumentName ?>
	<?php if ($employee_document->SortUrl($employee_document_preview->DocumentName) == "") { ?>
		<th class="<?php echo $employee_document_preview->DocumentName->headerCellClass() ?>"><?php echo $employee_document_preview->DocumentName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document_preview->DocumentName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_document_preview->DocumentName->Name) ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document_preview->DocumentName->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_preview->DocumentName->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document_preview->DocumentName->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_preview->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($employee_document->SortUrl($employee_document_preview->DocumentNumber) == "") { ?>
		<th class="<?php echo $employee_document_preview->DocumentNumber->headerCellClass() ?>"><?php echo $employee_document_preview->DocumentNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document_preview->DocumentNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_document_preview->DocumentNumber->Name) ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document_preview->DocumentNumber->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_preview->DocumentNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document_preview->DocumentNumber->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_preview->status->Visible) { // status ?>
	<?php if ($employee_document->SortUrl($employee_document_preview->status) == "") { ?>
		<th class="<?php echo $employee_document_preview->status->headerCellClass() ?>"><?php echo $employee_document_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_document_preview->status->Name) ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document_preview->status->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document_preview->status->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_preview->createdby->Visible) { // createdby ?>
	<?php if ($employee_document->SortUrl($employee_document_preview->createdby) == "") { ?>
		<th class="<?php echo $employee_document_preview->createdby->headerCellClass() ?>"><?php echo $employee_document_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_document_preview->createdby->Name) ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document_preview->createdby->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document_preview->createdby->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($employee_document->SortUrl($employee_document_preview->createddatetime) == "") { ?>
		<th class="<?php echo $employee_document_preview->createddatetime->headerCellClass() ?>"><?php echo $employee_document_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_document_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document_preview->createddatetime->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document_preview->createddatetime->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($employee_document->SortUrl($employee_document_preview->modifiedby) == "") { ?>
		<th class="<?php echo $employee_document_preview->modifiedby->headerCellClass() ?>"><?php echo $employee_document_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_document_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document_preview->modifiedby->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document_preview->modifiedby->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($employee_document->SortUrl($employee_document_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $employee_document_preview->modifieddatetime->headerCellClass() ?>"><?php echo $employee_document_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_document_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_document_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $employee_document_preview->SortField == $employee_document_preview->modifieddatetime->Name && $employee_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_preview->SortField == $employee_document_preview->modifieddatetime->Name) { ?><?php if ($employee_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$employee_document_preview->RowCount = 0;
while ($employee_document_preview->Recordset && !$employee_document_preview->Recordset->EOF) {

	// Init row class and style
	$employee_document_preview->RecCount++;
	$employee_document_preview->RowCount++;
	$employee_document_preview->CssStyle = "";
	$employee_document_preview->loadListRowValues($employee_document_preview->Recordset);

	// Render row
	$employee_document->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_document_preview->resetAttributes();
	$employee_document_preview->renderListRow();

	// Render list options
	$employee_document_preview->renderListOptions();
?>
	<tr <?php echo $employee_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_document_preview->ListOptions->render("body", "left", $employee_document_preview->RowCount);
?>
<?php if ($employee_document_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_document_preview->id->cellAttributes() ?>>
<span<?php echo $employee_document_preview->id->viewAttributes() ?>><?php echo $employee_document_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document_preview->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_document_preview->employee_id->cellAttributes() ?>>
<span<?php echo $employee_document_preview->employee_id->viewAttributes() ?>><?php echo $employee_document_preview->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document_preview->DocumentName->Visible) { // DocumentName ?>
		<!-- DocumentName -->
		<td<?php echo $employee_document_preview->DocumentName->cellAttributes() ?>>
<span<?php echo $employee_document_preview->DocumentName->viewAttributes() ?>><?php echo $employee_document_preview->DocumentName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document_preview->DocumentNumber->Visible) { // DocumentNumber ?>
		<!-- DocumentNumber -->
		<td<?php echo $employee_document_preview->DocumentNumber->cellAttributes() ?>>
<span<?php echo $employee_document_preview->DocumentNumber->viewAttributes() ?>><?php echo $employee_document_preview->DocumentNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_document_preview->status->cellAttributes() ?>>
<span<?php echo $employee_document_preview->status->viewAttributes() ?>><?php echo $employee_document_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $employee_document_preview->createdby->cellAttributes() ?>>
<span<?php echo $employee_document_preview->createdby->viewAttributes() ?>><?php echo $employee_document_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $employee_document_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $employee_document_preview->createddatetime->viewAttributes() ?>><?php echo $employee_document_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $employee_document_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $employee_document_preview->modifiedby->viewAttributes() ?>><?php echo $employee_document_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_document_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $employee_document_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $employee_document_preview->modifieddatetime->viewAttributes() ?>><?php echo $employee_document_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_document_preview->ListOptions->render("body", "right", $employee_document_preview->RowCount);
?>
	</tr>
<?php
	$employee_document_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $employee_document_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_document_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($employee_document_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$employee_document_preview->showPageFooter();
if (Config("DEBUG"))
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