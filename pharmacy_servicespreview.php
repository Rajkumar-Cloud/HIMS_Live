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
$pharmacy_services_preview = new pharmacy_services_preview();

// Run the page
$pharmacy_services_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_services_preview->Page_Render();
?>
<?php $pharmacy_services_preview->showPageHeader(); ?>
<div class="card ew-grid pharmacy_services"><!-- .card -->
<?php if ($pharmacy_services_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pharmacy_services_preview->renderListOptions();

// Render list options (header, left)
$pharmacy_services_preview->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_services->id->Visible) { // id ?>
	<?php if ($pharmacy_services->SortUrl($pharmacy_services->id) == "") { ?>
		<th class="<?php echo $pharmacy_services->id->headerCellClass() ?>"><?php echo $pharmacy_services->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_services->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_services->id->Name ?>" data-sort-order="<?php echo $pharmacy_services_preview->SortField == $pharmacy_services->id->Name && $pharmacy_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_services->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_services_preview->SortField == $pharmacy_services->id->Name) { ?><?php if ($pharmacy_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
	<?php if ($pharmacy_services->SortUrl($pharmacy_services->pharmacy_id) == "") { ?>
		<th class="<?php echo $pharmacy_services->pharmacy_id->headerCellClass() ?>"><?php echo $pharmacy_services->pharmacy_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_services->pharmacy_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_services->pharmacy_id->Name ?>" data-sort-order="<?php echo $pharmacy_services_preview->SortField == $pharmacy_services->pharmacy_id->Name && $pharmacy_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_services->pharmacy_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_services_preview->SortField == $pharmacy_services->pharmacy_id->Name) { ?><?php if ($pharmacy_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
	<?php if ($pharmacy_services->SortUrl($pharmacy_services->patient_id) == "") { ?>
		<th class="<?php echo $pharmacy_services->patient_id->headerCellClass() ?>"><?php echo $pharmacy_services->patient_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_services->patient_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_services->patient_id->Name ?>" data-sort-order="<?php echo $pharmacy_services_preview->SortField == $pharmacy_services->patient_id->Name && $pharmacy_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_services->patient_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_services_preview->SortField == $pharmacy_services->patient_id->Name) { ?><?php if ($pharmacy_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->name->Visible) { // name ?>
	<?php if ($pharmacy_services->SortUrl($pharmacy_services->name) == "") { ?>
		<th class="<?php echo $pharmacy_services->name->headerCellClass() ?>"><?php echo $pharmacy_services->name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_services->name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_services->name->Name ?>" data-sort-order="<?php echo $pharmacy_services_preview->SortField == $pharmacy_services->name->Name && $pharmacy_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_services->name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_services_preview->SortField == $pharmacy_services->name->Name) { ?><?php if ($pharmacy_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->amount->Visible) { // amount ?>
	<?php if ($pharmacy_services->SortUrl($pharmacy_services->amount) == "") { ?>
		<th class="<?php echo $pharmacy_services->amount->headerCellClass() ?>"><?php echo $pharmacy_services->amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_services->amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_services->amount->Name ?>" data-sort-order="<?php echo $pharmacy_services_preview->SortField == $pharmacy_services->amount->Name && $pharmacy_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_services->amount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_services_preview->SortField == $pharmacy_services->amount->Name) { ?><?php if ($pharmacy_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->charged_date->Visible) { // charged_date ?>
	<?php if ($pharmacy_services->SortUrl($pharmacy_services->charged_date) == "") { ?>
		<th class="<?php echo $pharmacy_services->charged_date->headerCellClass() ?>"><?php echo $pharmacy_services->charged_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_services->charged_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_services->charged_date->Name ?>" data-sort-order="<?php echo $pharmacy_services_preview->SortField == $pharmacy_services->charged_date->Name && $pharmacy_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_services->charged_date->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_services_preview->SortField == $pharmacy_services->charged_date->Name) { ?><?php if ($pharmacy_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->status->Visible) { // status ?>
	<?php if ($pharmacy_services->SortUrl($pharmacy_services->status) == "") { ?>
		<th class="<?php echo $pharmacy_services->status->headerCellClass() ?>"><?php echo $pharmacy_services->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_services->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_services->status->Name ?>" data-sort-order="<?php echo $pharmacy_services_preview->SortField == $pharmacy_services->status->Name && $pharmacy_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_services->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_services_preview->SortField == $pharmacy_services->status->Name) { ?><?php if ($pharmacy_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_services_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$pharmacy_services_preview->RecCount = 0;
$pharmacy_services_preview->RowCnt = 0;
while ($pharmacy_services_preview->Recordset && !$pharmacy_services_preview->Recordset->EOF) {

	// Init row class and style
	$pharmacy_services_preview->RecCount++;
	$pharmacy_services_preview->RowCnt++;
	$pharmacy_services_preview->CssStyle = "";
	$pharmacy_services_preview->loadListRowValues($pharmacy_services_preview->Recordset);

	// Render row
	$pharmacy_services_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$pharmacy_services_preview->resetAttributes();
	$pharmacy_services_preview->renderListRow();

	// Render list options
	$pharmacy_services_preview->renderListOptions();
?>
	<tr<?php echo $pharmacy_services_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_services_preview->ListOptions->render("body", "left", $pharmacy_services_preview->RowCnt);
?>
<?php if ($pharmacy_services->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $pharmacy_services->id->cellAttributes() ?>>
<span<?php echo $pharmacy_services->id->viewAttributes() ?>>
<?php echo $pharmacy_services->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
		<!-- pharmacy_id -->
		<td<?php echo $pharmacy_services->pharmacy_id->cellAttributes() ?>>
<span<?php echo $pharmacy_services->pharmacy_id->viewAttributes() ?>>
<?php echo $pharmacy_services->pharmacy_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
		<!-- patient_id -->
		<td<?php echo $pharmacy_services->patient_id->cellAttributes() ?>>
<span<?php echo $pharmacy_services->patient_id->viewAttributes() ?>>
<?php echo $pharmacy_services->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_services->name->Visible) { // name ?>
		<!-- name -->
		<td<?php echo $pharmacy_services->name->cellAttributes() ?>>
<span<?php echo $pharmacy_services->name->viewAttributes() ?>>
<?php echo $pharmacy_services->name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_services->amount->Visible) { // amount ?>
		<!-- amount -->
		<td<?php echo $pharmacy_services->amount->cellAttributes() ?>>
<span<?php echo $pharmacy_services->amount->viewAttributes() ?>>
<?php echo $pharmacy_services->amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_services->charged_date->Visible) { // charged_date ?>
		<!-- charged_date -->
		<td<?php echo $pharmacy_services->charged_date->cellAttributes() ?>>
<span<?php echo $pharmacy_services->charged_date->viewAttributes() ?>>
<?php echo $pharmacy_services->charged_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_services->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $pharmacy_services->status->cellAttributes() ?>>
<span<?php echo $pharmacy_services->status->viewAttributes() ?>>
<?php echo $pharmacy_services->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_services_preview->ListOptions->render("body", "right", $pharmacy_services_preview->RowCnt);
?>
	</tr>
<?php
	$pharmacy_services_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($pharmacy_services_preview->TotalRecs > 0) { ?>
<?php if (!isset($pharmacy_services_preview->Pager)) $pharmacy_services_preview->Pager = new PrevNextPager($pharmacy_services_preview->StartRec, $pharmacy_services_preview->DisplayRecs, $pharmacy_services_preview->TotalRecs) ?>
<?php if ($pharmacy_services_preview->Pager->RecordCount > 0 && $pharmacy_services_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($pharmacy_services_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $pharmacy_services_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($pharmacy_services_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $pharmacy_services_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($pharmacy_services_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $pharmacy_services_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($pharmacy_services_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $pharmacy_services_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_services_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_services_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_services_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pharmacy_services_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$pharmacy_services_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($pharmacy_services_preview->Recordset)
	$pharmacy_services_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$pharmacy_services_preview->terminate();
?>