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
$pharmacy_purchase_request_items_preview = new pharmacy_purchase_request_items_preview();

// Run the page
$pharmacy_purchase_request_items_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_items_preview->Page_Render();
?>
<?php $pharmacy_purchase_request_items_preview->showPageHeader(); ?>
<div class="card ew-grid pharmacy_purchase_request_items"><!-- .card -->
<?php if ($pharmacy_purchase_request_items_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pharmacy_purchase_request_items_preview->renderListOptions();

// Render list options (header, left)
$pharmacy_purchase_request_items_preview->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchase_request_items->id->Visible) { // id ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->id) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->id->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->id->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->id->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->id->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->PRC) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->PRC->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->PRC->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->PRC->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->PRC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->PRC->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PrName->Visible) { // PrName ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->PrName) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->PrName->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->PrName->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->PrName->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->PrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->PrName->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->Quantity->Visible) { // Quantity ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->Quantity) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->Quantity->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->Quantity->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->Quantity->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->Quantity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->Quantity->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->HospID) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->HospID->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->HospID->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->HospID->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->HospID->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->createdby) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->createdby->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->createdby->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->createdby->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->createdby->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->createddatetime) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->createddatetime->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->createddatetime->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->createddatetime->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->createddatetime->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->modifiedby) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->modifiedby->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->modifiedby->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->modifiedby->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->modifiedby->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->modifieddatetime) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->modifieddatetime->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->modifieddatetime->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->modifieddatetime->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->modifieddatetime->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->BRCODE) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->BRCODE->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->BRCODE->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->BRCODE->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->BRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->BRCODE->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->prid->Visible) { // prid ?>
	<?php if ($pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->prid) == "") { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->prid->headerCellClass() ?>"><?php echo $pharmacy_purchase_request_items->prid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_purchase_request_items->prid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_purchase_request_items->prid->Name ?>" data-sort-order="<?php echo $pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->prid->Name && $pharmacy_purchase_request_items_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->prid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_preview->SortField == $pharmacy_purchase_request_items->prid->Name) { ?><?php if ($pharmacy_purchase_request_items_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_purchase_request_items_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_purchase_request_items_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$pharmacy_purchase_request_items_preview->RecCount = 0;
$pharmacy_purchase_request_items_preview->RowCnt = 0;
while ($pharmacy_purchase_request_items_preview->Recordset && !$pharmacy_purchase_request_items_preview->Recordset->EOF) {

	// Init row class and style
	$pharmacy_purchase_request_items_preview->RecCount++;
	$pharmacy_purchase_request_items_preview->RowCnt++;
	$pharmacy_purchase_request_items_preview->CssStyle = "";
	$pharmacy_purchase_request_items_preview->loadListRowValues($pharmacy_purchase_request_items_preview->Recordset);

	// Render row
	$pharmacy_purchase_request_items_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$pharmacy_purchase_request_items_preview->resetAttributes();
	$pharmacy_purchase_request_items_preview->renderListRow();

	// Render list options
	$pharmacy_purchase_request_items_preview->renderListOptions();
?>
	<tr<?php echo $pharmacy_purchase_request_items_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchase_request_items_preview->ListOptions->render("body", "left", $pharmacy_purchase_request_items_preview->RowCnt);
?>
<?php if ($pharmacy_purchase_request_items->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $pharmacy_purchase_request_items->id->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->id->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $pharmacy_purchase_request_items->PRC->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->PRC->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $pharmacy_purchase_request_items->PrName->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->PrName->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $pharmacy_purchase_request_items->Quantity->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->Quantity->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $pharmacy_purchase_request_items->HospID->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $pharmacy_purchase_request_items->createdby->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->createdby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $pharmacy_purchase_request_items->createddatetime->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $pharmacy_purchase_request_items->modifiedby->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $pharmacy_purchase_request_items->modifieddatetime->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $pharmacy_purchase_request_items->BRCODE->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->prid->Visible) { // prid ?>
		<!-- prid -->
		<td<?php echo $pharmacy_purchase_request_items->prid->cellAttributes() ?>>
<span<?php echo $pharmacy_purchase_request_items->prid->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->prid->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchase_request_items_preview->ListOptions->render("body", "right", $pharmacy_purchase_request_items_preview->RowCnt);
?>
	</tr>
<?php
	$pharmacy_purchase_request_items_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($pharmacy_purchase_request_items_preview->TotalRecs > 0) { ?>
<?php if (!isset($pharmacy_purchase_request_items_preview->Pager)) $pharmacy_purchase_request_items_preview->Pager = new PrevNextPager($pharmacy_purchase_request_items_preview->StartRec, $pharmacy_purchase_request_items_preview->DisplayRecs, $pharmacy_purchase_request_items_preview->TotalRecs) ?>
<?php if ($pharmacy_purchase_request_items_preview->Pager->RecordCount > 0 && $pharmacy_purchase_request_items_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($pharmacy_purchase_request_items_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $pharmacy_purchase_request_items_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($pharmacy_purchase_request_items_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $pharmacy_purchase_request_items_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($pharmacy_purchase_request_items_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $pharmacy_purchase_request_items_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($pharmacy_purchase_request_items_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $pharmacy_purchase_request_items_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_purchase_request_items_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_purchase_request_items_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_purchase_request_items_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pharmacy_purchase_request_items_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$pharmacy_purchase_request_items_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($pharmacy_purchase_request_items_preview->Recordset)
	$pharmacy_purchase_request_items_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$pharmacy_purchase_request_items_preview->terminate();
?>