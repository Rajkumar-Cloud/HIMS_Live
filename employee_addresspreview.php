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
$employee_address_preview = new employee_address_preview();

// Run the page
$employee_address_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_address_preview->Page_Render();
?>
<?php $employee_address_preview->showPageHeader(); ?>
<div class="card ew-grid employee_address"><!-- .card -->
<?php if ($employee_address_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_address_preview->renderListOptions();

// Render list options (header, left)
$employee_address_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_address->id->Visible) { // id ?>
	<?php if ($employee_address->SortUrl($employee_address->id) == "") { ?>
		<th class="<?php echo $employee_address->id->headerCellClass() ?>"><?php echo $employee_address->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_address->id->Name ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address->id->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_address->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address->id->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_address->SortUrl($employee_address->employee_id) == "") { ?>
		<th class="<?php echo $employee_address->employee_id->headerCellClass() ?>"><?php echo $employee_address->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_address->employee_id->Name ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address->employee_id->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_address->employee_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address->employee_id->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->contact_persion->Visible) { // contact_persion ?>
	<?php if ($employee_address->SortUrl($employee_address->contact_persion) == "") { ?>
		<th class="<?php echo $employee_address->contact_persion->headerCellClass() ?>"><?php echo $employee_address->contact_persion->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address->contact_persion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_address->contact_persion->Name ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address->contact_persion->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_address->contact_persion->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address->contact_persion->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->street->Visible) { // street ?>
	<?php if ($employee_address->SortUrl($employee_address->street) == "") { ?>
		<th class="<?php echo $employee_address->street->headerCellClass() ?>"><?php echo $employee_address->street->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address->street->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_address->street->Name ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address->street->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_address->street->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address->street->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->town->Visible) { // town ?>
	<?php if ($employee_address->SortUrl($employee_address->town) == "") { ?>
		<th class="<?php echo $employee_address->town->headerCellClass() ?>"><?php echo $employee_address->town->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address->town->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_address->town->Name ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address->town->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_address->town->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address->town->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->province->Visible) { // province ?>
	<?php if ($employee_address->SortUrl($employee_address->province) == "") { ?>
		<th class="<?php echo $employee_address->province->headerCellClass() ?>"><?php echo $employee_address->province->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address->province->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_address->province->Name ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address->province->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_address->province->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address->province->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->postal_code->Visible) { // postal_code ?>
	<?php if ($employee_address->SortUrl($employee_address->postal_code) == "") { ?>
		<th class="<?php echo $employee_address->postal_code->headerCellClass() ?>"><?php echo $employee_address->postal_code->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address->postal_code->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_address->postal_code->Name ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address->postal_code->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_address->postal_code->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address->postal_code->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->address_type->Visible) { // address_type ?>
	<?php if ($employee_address->SortUrl($employee_address->address_type) == "") { ?>
		<th class="<?php echo $employee_address->address_type->headerCellClass() ?>"><?php echo $employee_address->address_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address->address_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_address->address_type->Name ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address->address_type->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_address->address_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address->address_type->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->status->Visible) { // status ?>
	<?php if ($employee_address->SortUrl($employee_address->status) == "") { ?>
		<th class="<?php echo $employee_address->status->headerCellClass() ?>"><?php echo $employee_address->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_address->status->Name ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address->status->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_address->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address->status->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->HospID->Visible) { // HospID ?>
	<?php if ($employee_address->SortUrl($employee_address->HospID) == "") { ?>
		<th class="<?php echo $employee_address->HospID->headerCellClass() ?>"><?php echo $employee_address->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $employee_address->HospID->Name ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address->HospID->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $employee_address->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address->HospID->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_address_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$employee_address_preview->RecCount = 0;
$employee_address_preview->RowCnt = 0;
while ($employee_address_preview->Recordset && !$employee_address_preview->Recordset->EOF) {

	// Init row class and style
	$employee_address_preview->RecCount++;
	$employee_address_preview->RowCnt++;
	$employee_address_preview->CssStyle = "";
	$employee_address_preview->loadListRowValues($employee_address_preview->Recordset);

	// Render row
	$employee_address_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_address_preview->resetAttributes();
	$employee_address_preview->renderListRow();

	// Render list options
	$employee_address_preview->renderListOptions();
?>
	<tr<?php echo $employee_address_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_address_preview->ListOptions->render("body", "left", $employee_address_preview->RowCnt);
?>
<?php if ($employee_address->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_address->id->cellAttributes() ?>>
<span<?php echo $employee_address->id->viewAttributes() ?>>
<?php echo $employee_address->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_address->employee_id->cellAttributes() ?>>
<span<?php echo $employee_address->employee_id->viewAttributes() ?>>
<?php echo $employee_address->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address->contact_persion->Visible) { // contact_persion ?>
		<!-- contact_persion -->
		<td<?php echo $employee_address->contact_persion->cellAttributes() ?>>
<span<?php echo $employee_address->contact_persion->viewAttributes() ?>>
<?php echo $employee_address->contact_persion->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address->street->Visible) { // street ?>
		<!-- street -->
		<td<?php echo $employee_address->street->cellAttributes() ?>>
<span<?php echo $employee_address->street->viewAttributes() ?>>
<?php echo $employee_address->street->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address->town->Visible) { // town ?>
		<!-- town -->
		<td<?php echo $employee_address->town->cellAttributes() ?>>
<span<?php echo $employee_address->town->viewAttributes() ?>>
<?php echo $employee_address->town->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address->province->Visible) { // province ?>
		<!-- province -->
		<td<?php echo $employee_address->province->cellAttributes() ?>>
<span<?php echo $employee_address->province->viewAttributes() ?>>
<?php echo $employee_address->province->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address->postal_code->Visible) { // postal_code ?>
		<!-- postal_code -->
		<td<?php echo $employee_address->postal_code->cellAttributes() ?>>
<span<?php echo $employee_address->postal_code->viewAttributes() ?>>
<?php echo $employee_address->postal_code->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address->address_type->Visible) { // address_type ?>
		<!-- address_type -->
		<td<?php echo $employee_address->address_type->cellAttributes() ?>>
<span<?php echo $employee_address->address_type->viewAttributes() ?>>
<?php echo $employee_address->address_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_address->status->cellAttributes() ?>>
<span<?php echo $employee_address->status->viewAttributes() ?>>
<?php echo $employee_address->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $employee_address->HospID->cellAttributes() ?>>
<span<?php echo $employee_address->HospID->viewAttributes() ?>>
<?php echo $employee_address->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_address_preview->ListOptions->render("body", "right", $employee_address_preview->RowCnt);
?>
	</tr>
<?php
	$employee_address_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($employee_address_preview->TotalRecs > 0) { ?>
<?php if (!isset($employee_address_preview->Pager)) $employee_address_preview->Pager = new PrevNextPager($employee_address_preview->StartRec, $employee_address_preview->DisplayRecs, $employee_address_preview->TotalRecs) ?>
<?php if ($employee_address_preview->Pager->RecordCount > 0 && $employee_address_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($employee_address_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $employee_address_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($employee_address_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $employee_address_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($employee_address_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $employee_address_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($employee_address_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $employee_address_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_address_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_address_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_address_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_address_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$employee_address_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($employee_address_preview->Recordset)
	$employee_address_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$employee_address_preview->terminate();
?>