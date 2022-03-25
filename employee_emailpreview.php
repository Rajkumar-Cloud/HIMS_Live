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
<div class="card ew-grid employee_email"><!-- .card -->
<?php if ($employee_email_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_email_preview->renderListOptions();

// Render list options (header, left)
$employee_email_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_email->id->Visible) { // id ?>
	<?php if ($employee_email->SortUrl($employee_email->id) == "") { ?>
		<th class="<?php echo $employee_email->id->headerCellClass() ?>"><?php echo $employee_email->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_email->id->Name ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email->id->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_email->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email->id->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_email->SortUrl($employee_email->employee_id) == "") { ?>
		<th class="<?php echo $employee_email->employee_id->headerCellClass() ?>"><?php echo $employee_email->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_email->employee_id->Name ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email->employee_id->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_email->employee_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email->employee_id->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->_email->Visible) { // email ?>
	<?php if ($employee_email->SortUrl($employee_email->_email) == "") { ?>
		<th class="<?php echo $employee_email->_email->headerCellClass() ?>"><?php echo $employee_email->_email->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email->_email->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_email->_email->Name ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email->_email->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_email->_email->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email->_email->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->email_type->Visible) { // email_type ?>
	<?php if ($employee_email->SortUrl($employee_email->email_type) == "") { ?>
		<th class="<?php echo $employee_email->email_type->headerCellClass() ?>"><?php echo $employee_email->email_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email->email_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_email->email_type->Name ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email->email_type->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_email->email_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email->email_type->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->status->Visible) { // status ?>
	<?php if ($employee_email->SortUrl($employee_email->status) == "") { ?>
		<th class="<?php echo $employee_email->status->headerCellClass() ?>"><?php echo $employee_email->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_email->status->Name ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email->status->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_email->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email->status->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->HospID->Visible) { // HospID ?>
	<?php if ($employee_email->SortUrl($employee_email->HospID) == "") { ?>
		<th class="<?php echo $employee_email->HospID->headerCellClass() ?>"><?php echo $employee_email->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_email->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_email->HospID->Name ?>" data-sort-order="<?php echo $employee_email_preview->SortField == $employee_email->HospID->Name && $employee_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_email->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_email_preview->SortField == $employee_email->HospID->Name) { ?><?php if ($employee_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$employee_email_preview->RowCnt = 0;
while ($employee_email_preview->Recordset && !$employee_email_preview->Recordset->EOF) {

	// Init row class and style
	$employee_email_preview->RecCount++;
	$employee_email_preview->RowCnt++;
	$employee_email_preview->CssStyle = "";
	$employee_email_preview->loadListRowValues($employee_email_preview->Recordset);

	// Render row
	$employee_email_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_email_preview->resetAttributes();
	$employee_email_preview->renderListRow();

	// Render list options
	$employee_email_preview->renderListOptions();
?>
	<tr<?php echo $employee_email_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_email_preview->ListOptions->render("body", "left", $employee_email_preview->RowCnt);
?>
<?php if ($employee_email->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_email->id->cellAttributes() ?>>
<span<?php echo $employee_email->id->viewAttributes() ?>>
<?php echo $employee_email->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_email->employee_id->cellAttributes() ?>>
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<?php echo $employee_email->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_email->_email->Visible) { // email ?>
		<!-- email -->
		<td<?php echo $employee_email->_email->cellAttributes() ?>>
<span<?php echo $employee_email->_email->viewAttributes() ?>>
<?php echo $employee_email->_email->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_email->email_type->Visible) { // email_type ?>
		<!-- email_type -->
		<td<?php echo $employee_email->email_type->cellAttributes() ?>>
<span<?php echo $employee_email->email_type->viewAttributes() ?>>
<?php echo $employee_email->email_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_email->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_email->status->cellAttributes() ?>>
<span<?php echo $employee_email->status->viewAttributes() ?>>
<?php echo $employee_email->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_email->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $employee_email->HospID->cellAttributes() ?>>
<span<?php echo $employee_email->HospID->viewAttributes() ?>>
<?php echo $employee_email->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_email_preview->ListOptions->render("body", "right", $employee_email_preview->RowCnt);
?>
	</tr>
<?php
	$employee_email_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($employee_email_preview->TotalRecs > 0) { ?>
<?php if (!isset($employee_email_preview->Pager)) $employee_email_preview->Pager = new PrevNextPager($employee_email_preview->StartRec, $employee_email_preview->DisplayRecs, $employee_email_preview->TotalRecs) ?>
<?php if ($employee_email_preview->Pager->RecordCount > 0 && $employee_email_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($employee_email_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $employee_email_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($employee_email_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $employee_email_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($employee_email_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $employee_email_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($employee_email_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $employee_email_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_email_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_email_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_email_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_email_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$employee_email_preview->showPageFooter();
if (DEBUG_ENABLED)
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