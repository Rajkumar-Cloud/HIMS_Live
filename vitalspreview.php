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
$vitals_preview = new vitals_preview();

// Run the page
$vitals_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vitals_preview->Page_Render();
?>
<?php $vitals_preview->showPageHeader(); ?>
<div class="card ew-grid vitals"><!-- .card -->
<?php if ($vitals_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$vitals_preview->renderListOptions();

// Render list options (header, left)
$vitals_preview->ListOptions->render("header", "left");
?>
<?php if ($vitals->id->Visible) { // id ?>
	<?php if ($vitals->SortUrl($vitals->id) == "") { ?>
		<th class="<?php echo $vitals->id->headerCellClass() ?>"><?php echo $vitals->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vitals->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $vitals->id->Name ?>" data-sort-order="<?php echo $vitals_preview->SortField == $vitals->id->Name && $vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $vitals->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($vitals_preview->SortField == $vitals->id->Name) { ?><?php if ($vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->Reception->Visible) { // Reception ?>
	<?php if ($vitals->SortUrl($vitals->Reception) == "") { ?>
		<th class="<?php echo $vitals->Reception->headerCellClass() ?>"><?php echo $vitals->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vitals->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $vitals->Reception->Name ?>" data-sort-order="<?php echo $vitals_preview->SortField == $vitals->Reception->Name && $vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $vitals->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($vitals_preview->SortField == $vitals->Reception->Name) { ?><?php if ($vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->PatientId->Visible) { // PatientId ?>
	<?php if ($vitals->SortUrl($vitals->PatientId) == "") { ?>
		<th class="<?php echo $vitals->PatientId->headerCellClass() ?>"><?php echo $vitals->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vitals->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $vitals->PatientId->Name ?>" data-sort-order="<?php echo $vitals_preview->SortField == $vitals->PatientId->Name && $vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $vitals->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($vitals_preview->SortField == $vitals->PatientId->Name) { ?><?php if ($vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->PatientName->Visible) { // PatientName ?>
	<?php if ($vitals->SortUrl($vitals->PatientName) == "") { ?>
		<th class="<?php echo $vitals->PatientName->headerCellClass() ?>"><?php echo $vitals->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vitals->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $vitals->PatientName->Name ?>" data-sort-order="<?php echo $vitals_preview->SortField == $vitals->PatientName->Name && $vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $vitals->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($vitals_preview->SortField == $vitals->PatientName->Name) { ?><?php if ($vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->HT->Visible) { // HT ?>
	<?php if ($vitals->SortUrl($vitals->HT) == "") { ?>
		<th class="<?php echo $vitals->HT->headerCellClass() ?>"><?php echo $vitals->HT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vitals->HT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $vitals->HT->Name ?>" data-sort-order="<?php echo $vitals_preview->SortField == $vitals->HT->Name && $vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $vitals->HT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($vitals_preview->SortField == $vitals->HT->Name) { ?><?php if ($vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->WT->Visible) { // WT ?>
	<?php if ($vitals->SortUrl($vitals->WT) == "") { ?>
		<th class="<?php echo $vitals->WT->headerCellClass() ?>"><?php echo $vitals->WT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vitals->WT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $vitals->WT->Name ?>" data-sort-order="<?php echo $vitals_preview->SortField == $vitals->WT->Name && $vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $vitals->WT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($vitals_preview->SortField == $vitals->WT->Name) { ?><?php if ($vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->BP->Visible) { // BP ?>
	<?php if ($vitals->SortUrl($vitals->BP) == "") { ?>
		<th class="<?php echo $vitals->BP->headerCellClass() ?>"><?php echo $vitals->BP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vitals->BP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $vitals->BP->Name ?>" data-sort-order="<?php echo $vitals_preview->SortField == $vitals->BP->Name && $vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $vitals->BP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($vitals_preview->SortField == $vitals->BP->Name) { ?><?php if ($vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->PULSE->Visible) { // PULSE ?>
	<?php if ($vitals->SortUrl($vitals->PULSE) == "") { ?>
		<th class="<?php echo $vitals->PULSE->headerCellClass() ?>"><?php echo $vitals->PULSE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $vitals->PULSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $vitals->PULSE->Name ?>" data-sort-order="<?php echo $vitals_preview->SortField == $vitals->PULSE->Name && $vitals_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $vitals->PULSE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($vitals_preview->SortField == $vitals->PULSE->Name) { ?><?php if ($vitals_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($vitals_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vitals_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$vitals_preview->RecCount = 0;
$vitals_preview->RowCnt = 0;
while ($vitals_preview->Recordset && !$vitals_preview->Recordset->EOF) {

	// Init row class and style
	$vitals_preview->RecCount++;
	$vitals_preview->RowCnt++;
	$vitals_preview->CssStyle = "";
	$vitals_preview->loadListRowValues($vitals_preview->Recordset);

	// Render row
	$vitals_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$vitals_preview->resetAttributes();
	$vitals_preview->renderListRow();

	// Render list options
	$vitals_preview->renderListOptions();
?>
	<tr<?php echo $vitals_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vitals_preview->ListOptions->render("body", "left", $vitals_preview->RowCnt);
?>
<?php if ($vitals->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $vitals->id->cellAttributes() ?>>
<span<?php echo $vitals->id->viewAttributes() ?>>
<?php echo $vitals->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vitals->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $vitals->Reception->cellAttributes() ?>>
<span<?php echo $vitals->Reception->viewAttributes() ?>>
<?php echo $vitals->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vitals->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $vitals->PatientId->cellAttributes() ?>>
<span<?php echo $vitals->PatientId->viewAttributes() ?>>
<?php echo $vitals->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vitals->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $vitals->PatientName->cellAttributes() ?>>
<span<?php echo $vitals->PatientName->viewAttributes() ?>>
<?php echo $vitals->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vitals->HT->Visible) { // HT ?>
		<!-- HT -->
		<td<?php echo $vitals->HT->cellAttributes() ?>>
<span<?php echo $vitals->HT->viewAttributes() ?>>
<?php echo $vitals->HT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vitals->WT->Visible) { // WT ?>
		<!-- WT -->
		<td<?php echo $vitals->WT->cellAttributes() ?>>
<span<?php echo $vitals->WT->viewAttributes() ?>>
<?php echo $vitals->WT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vitals->BP->Visible) { // BP ?>
		<!-- BP -->
		<td<?php echo $vitals->BP->cellAttributes() ?>>
<span<?php echo $vitals->BP->viewAttributes() ?>>
<?php echo $vitals->BP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($vitals->PULSE->Visible) { // PULSE ?>
		<!-- PULSE -->
		<td<?php echo $vitals->PULSE->cellAttributes() ?>>
<span<?php echo $vitals->PULSE->viewAttributes() ?>>
<?php echo $vitals->PULSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$vitals_preview->ListOptions->render("body", "right", $vitals_preview->RowCnt);
?>
	</tr>
<?php
	$vitals_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($vitals_preview->TotalRecs > 0) { ?>
<?php if (!isset($vitals_preview->Pager)) $vitals_preview->Pager = new PrevNextPager($vitals_preview->StartRec, $vitals_preview->DisplayRecs, $vitals_preview->TotalRecs) ?>
<?php if ($vitals_preview->Pager->RecordCount > 0 && $vitals_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($vitals_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $vitals_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($vitals_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $vitals_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($vitals_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $vitals_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($vitals_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $vitals_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $vitals_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $vitals_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $vitals_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($vitals_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$vitals_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($vitals_preview->Recordset)
	$vitals_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$vitals_preview->terminate();
?>