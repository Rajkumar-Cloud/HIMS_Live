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
$patient_email_preview = new patient_email_preview();

// Run the page
$patient_email_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_email_preview->Page_Render();
?>
<?php $patient_email_preview->showPageHeader(); ?>
<div class="card ew-grid patient_email"><!-- .card -->
<?php if ($patient_email_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_email_preview->renderListOptions();

// Render list options (header, left)
$patient_email_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_email->id->Visible) { // id ?>
	<?php if ($patient_email->SortUrl($patient_email->id) == "") { ?>
		<th class="<?php echo $patient_email->id->headerCellClass() ?>"><?php echo $patient_email->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_email->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_email->id->Name ?>" data-sort-order="<?php echo $patient_email_preview->SortField == $patient_email->id->Name && $patient_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_email->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_email_preview->SortField == $patient_email->id->Name) { ?><?php if ($patient_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_email->SortUrl($patient_email->patient_id) == "") { ?>
		<th class="<?php echo $patient_email->patient_id->headerCellClass() ?>"><?php echo $patient_email->patient_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_email->patient_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_email->patient_id->Name ?>" data-sort-order="<?php echo $patient_email_preview->SortField == $patient_email->patient_id->Name && $patient_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_email->patient_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_email_preview->SortField == $patient_email->patient_id->Name) { ?><?php if ($patient_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->_email->Visible) { // email ?>
	<?php if ($patient_email->SortUrl($patient_email->_email) == "") { ?>
		<th class="<?php echo $patient_email->_email->headerCellClass() ?>"><?php echo $patient_email->_email->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_email->_email->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_email->_email->Name ?>" data-sort-order="<?php echo $patient_email_preview->SortField == $patient_email->_email->Name && $patient_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_email->_email->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_email_preview->SortField == $patient_email->_email->Name) { ?><?php if ($patient_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->email_type->Visible) { // email_type ?>
	<?php if ($patient_email->SortUrl($patient_email->email_type) == "") { ?>
		<th class="<?php echo $patient_email->email_type->headerCellClass() ?>"><?php echo $patient_email->email_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_email->email_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_email->email_type->Name ?>" data-sort-order="<?php echo $patient_email_preview->SortField == $patient_email->email_type->Name && $patient_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_email->email_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_email_preview->SortField == $patient_email->email_type->Name) { ?><?php if ($patient_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->status->Visible) { // status ?>
	<?php if ($patient_email->SortUrl($patient_email->status) == "") { ?>
		<th class="<?php echo $patient_email->status->headerCellClass() ?>"><?php echo $patient_email->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_email->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_email->status->Name ?>" data-sort-order="<?php echo $patient_email_preview->SortField == $patient_email->status->Name && $patient_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_email->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_email_preview->SortField == $patient_email->status->Name) { ?><?php if ($patient_email_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_email_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_email_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_email_preview->RecCount = 0;
$patient_email_preview->RowCnt = 0;
while ($patient_email_preview->Recordset && !$patient_email_preview->Recordset->EOF) {

	// Init row class and style
	$patient_email_preview->RecCount++;
	$patient_email_preview->RowCnt++;
	$patient_email_preview->CssStyle = "";
	$patient_email_preview->loadListRowValues($patient_email_preview->Recordset);

	// Render row
	$patient_email_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_email_preview->resetAttributes();
	$patient_email_preview->renderListRow();

	// Render list options
	$patient_email_preview->renderListOptions();
?>
	<tr<?php echo $patient_email_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_email_preview->ListOptions->render("body", "left", $patient_email_preview->RowCnt);
?>
<?php if ($patient_email->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_email->id->cellAttributes() ?>>
<span<?php echo $patient_email->id->viewAttributes() ?>>
<?php echo $patient_email->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_email->patient_id->Visible) { // patient_id ?>
		<!-- patient_id -->
		<td<?php echo $patient_email->patient_id->cellAttributes() ?>>
<span<?php echo $patient_email->patient_id->viewAttributes() ?>>
<?php echo $patient_email->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_email->_email->Visible) { // email ?>
		<!-- email -->
		<td<?php echo $patient_email->_email->cellAttributes() ?>>
<span<?php echo $patient_email->_email->viewAttributes() ?>>
<?php echo $patient_email->_email->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_email->email_type->Visible) { // email_type ?>
		<!-- email_type -->
		<td<?php echo $patient_email->email_type->cellAttributes() ?>>
<span<?php echo $patient_email->email_type->viewAttributes() ?>>
<?php echo $patient_email->email_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_email->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_email->status->cellAttributes() ?>>
<span<?php echo $patient_email->status->viewAttributes() ?>>
<?php echo $patient_email->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_email_preview->ListOptions->render("body", "right", $patient_email_preview->RowCnt);
?>
	</tr>
<?php
	$patient_email_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_email_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_email_preview->Pager)) $patient_email_preview->Pager = new PrevNextPager($patient_email_preview->StartRec, $patient_email_preview->DisplayRecs, $patient_email_preview->TotalRecs) ?>
<?php if ($patient_email_preview->Pager->RecordCount > 0 && $patient_email_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_email_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_email_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_email_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_email_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_email_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_email_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_email_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_email_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_email_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_email_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_email_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_email_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_email_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_email_preview->Recordset)
	$patient_email_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_email_preview->terminate();
?>