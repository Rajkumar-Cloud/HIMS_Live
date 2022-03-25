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
$patient_address_preview = new patient_address_preview();

// Run the page
$patient_address_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_address_preview->Page_Render();
?>
<?php $patient_address_preview->showPageHeader(); ?>
<div class="card ew-grid patient_address"><!-- .card -->
<?php if ($patient_address_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_address_preview->renderListOptions();

// Render list options (header, left)
$patient_address_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_address->id->Visible) { // id ?>
	<?php if ($patient_address->SortUrl($patient_address->id) == "") { ?>
		<th class="<?php echo $patient_address->id->headerCellClass() ?>"><?php echo $patient_address->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_address->id->Name ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address->id->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_address->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address->id->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_address->SortUrl($patient_address->patient_id) == "") { ?>
		<th class="<?php echo $patient_address->patient_id->headerCellClass() ?>"><?php echo $patient_address->patient_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address->patient_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_address->patient_id->Name ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address->patient_id->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_address->patient_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address->patient_id->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->street->Visible) { // street ?>
	<?php if ($patient_address->SortUrl($patient_address->street) == "") { ?>
		<th class="<?php echo $patient_address->street->headerCellClass() ?>"><?php echo $patient_address->street->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address->street->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_address->street->Name ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address->street->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_address->street->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address->street->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->town->Visible) { // town ?>
	<?php if ($patient_address->SortUrl($patient_address->town) == "") { ?>
		<th class="<?php echo $patient_address->town->headerCellClass() ?>"><?php echo $patient_address->town->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address->town->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_address->town->Name ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address->town->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_address->town->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address->town->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->province->Visible) { // province ?>
	<?php if ($patient_address->SortUrl($patient_address->province) == "") { ?>
		<th class="<?php echo $patient_address->province->headerCellClass() ?>"><?php echo $patient_address->province->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address->province->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_address->province->Name ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address->province->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_address->province->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address->province->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->postal_code->Visible) { // postal_code ?>
	<?php if ($patient_address->SortUrl($patient_address->postal_code) == "") { ?>
		<th class="<?php echo $patient_address->postal_code->headerCellClass() ?>"><?php echo $patient_address->postal_code->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address->postal_code->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_address->postal_code->Name ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address->postal_code->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_address->postal_code->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address->postal_code->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->address_type->Visible) { // address_type ?>
	<?php if ($patient_address->SortUrl($patient_address->address_type) == "") { ?>
		<th class="<?php echo $patient_address->address_type->headerCellClass() ?>"><?php echo $patient_address->address_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address->address_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_address->address_type->Name ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address->address_type->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_address->address_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address->address_type->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->status->Visible) { // status ?>
	<?php if ($patient_address->SortUrl($patient_address->status) == "") { ?>
		<th class="<?php echo $patient_address->status->headerCellClass() ?>"><?php echo $patient_address->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_address->status->Name ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address->status->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_address->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address->status->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_address_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_address_preview->RecCount = 0;
$patient_address_preview->RowCnt = 0;
while ($patient_address_preview->Recordset && !$patient_address_preview->Recordset->EOF) {

	// Init row class and style
	$patient_address_preview->RecCount++;
	$patient_address_preview->RowCnt++;
	$patient_address_preview->CssStyle = "";
	$patient_address_preview->loadListRowValues($patient_address_preview->Recordset);

	// Render row
	$patient_address_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_address_preview->resetAttributes();
	$patient_address_preview->renderListRow();

	// Render list options
	$patient_address_preview->renderListOptions();
?>
	<tr<?php echo $patient_address_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_address_preview->ListOptions->render("body", "left", $patient_address_preview->RowCnt);
?>
<?php if ($patient_address->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_address->id->cellAttributes() ?>>
<span<?php echo $patient_address->id->viewAttributes() ?>>
<?php echo $patient_address->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address->patient_id->Visible) { // patient_id ?>
		<!-- patient_id -->
		<td<?php echo $patient_address->patient_id->cellAttributes() ?>>
<span<?php echo $patient_address->patient_id->viewAttributes() ?>>
<?php echo $patient_address->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address->street->Visible) { // street ?>
		<!-- street -->
		<td<?php echo $patient_address->street->cellAttributes() ?>>
<span<?php echo $patient_address->street->viewAttributes() ?>>
<?php echo $patient_address->street->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address->town->Visible) { // town ?>
		<!-- town -->
		<td<?php echo $patient_address->town->cellAttributes() ?>>
<span<?php echo $patient_address->town->viewAttributes() ?>>
<?php echo $patient_address->town->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address->province->Visible) { // province ?>
		<!-- province -->
		<td<?php echo $patient_address->province->cellAttributes() ?>>
<span<?php echo $patient_address->province->viewAttributes() ?>>
<?php echo $patient_address->province->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address->postal_code->Visible) { // postal_code ?>
		<!-- postal_code -->
		<td<?php echo $patient_address->postal_code->cellAttributes() ?>>
<span<?php echo $patient_address->postal_code->viewAttributes() ?>>
<?php echo $patient_address->postal_code->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address->address_type->Visible) { // address_type ?>
		<!-- address_type -->
		<td<?php echo $patient_address->address_type->cellAttributes() ?>>
<span<?php echo $patient_address->address_type->viewAttributes() ?>>
<?php echo $patient_address->address_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_address->status->cellAttributes() ?>>
<span<?php echo $patient_address->status->viewAttributes() ?>>
<?php echo $patient_address->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_address_preview->ListOptions->render("body", "right", $patient_address_preview->RowCnt);
?>
	</tr>
<?php
	$patient_address_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_address_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_address_preview->Pager)) $patient_address_preview->Pager = new PrevNextPager($patient_address_preview->StartRec, $patient_address_preview->DisplayRecs, $patient_address_preview->TotalRecs) ?>
<?php if ($patient_address_preview->Pager->RecordCount > 0 && $patient_address_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_address_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_address_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_address_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_address_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_address_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_address_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_address_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_address_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_address_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_address_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_address_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_address_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_address_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_address_preview->Recordset)
	$patient_address_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_address_preview->terminate();
?>