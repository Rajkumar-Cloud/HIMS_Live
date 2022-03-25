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
$patient_emergency_contact_preview = new patient_emergency_contact_preview();

// Run the page
$patient_emergency_contact_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_emergency_contact_preview->Page_Render();
?>
<?php $patient_emergency_contact_preview->showPageHeader(); ?>
<div class="card ew-grid patient_emergency_contact"><!-- .card -->
<?php if ($patient_emergency_contact_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_emergency_contact_preview->renderListOptions();

// Render list options (header, left)
$patient_emergency_contact_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_emergency_contact->id->Visible) { // id ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact->id) == "") { ?>
		<th class="<?php echo $patient_emergency_contact->id->headerCellClass() ?>"><?php echo $patient_emergency_contact->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_emergency_contact->id->Name ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact->id->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_emergency_contact->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact->id->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact->patient_id) == "") { ?>
		<th class="<?php echo $patient_emergency_contact->patient_id->headerCellClass() ?>"><?php echo $patient_emergency_contact->patient_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact->patient_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_emergency_contact->patient_id->Name ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact->patient_id->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_emergency_contact->patient_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact->patient_id->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->name->Visible) { // name ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact->name) == "") { ?>
		<th class="<?php echo $patient_emergency_contact->name->headerCellClass() ?>"><?php echo $patient_emergency_contact->name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact->name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_emergency_contact->name->Name ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact->name->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_emergency_contact->name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact->name->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact->relationship) == "") { ?>
		<th class="<?php echo $patient_emergency_contact->relationship->headerCellClass() ?>"><?php echo $patient_emergency_contact->relationship->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact->relationship->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_emergency_contact->relationship->Name ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact->relationship->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_emergency_contact->relationship->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact->relationship->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact->telephone) == "") { ?>
		<th class="<?php echo $patient_emergency_contact->telephone->headerCellClass() ?>"><?php echo $patient_emergency_contact->telephone->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact->telephone->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_emergency_contact->telephone->Name ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact->telephone->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_emergency_contact->telephone->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact->telephone->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->address->Visible) { // address ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact->address) == "") { ?>
		<th class="<?php echo $patient_emergency_contact->address->headerCellClass() ?>"><?php echo $patient_emergency_contact->address->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact->address->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_emergency_contact->address->Name ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact->address->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_emergency_contact->address->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact->address->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->status->Visible) { // status ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact->status) == "") { ?>
		<th class="<?php echo $patient_emergency_contact->status->headerCellClass() ?>"><?php echo $patient_emergency_contact->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_emergency_contact->status->Name ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact->status->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_emergency_contact->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact->status->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_emergency_contact_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_emergency_contact_preview->RecCount = 0;
$patient_emergency_contact_preview->RowCnt = 0;
while ($patient_emergency_contact_preview->Recordset && !$patient_emergency_contact_preview->Recordset->EOF) {

	// Init row class and style
	$patient_emergency_contact_preview->RecCount++;
	$patient_emergency_contact_preview->RowCnt++;
	$patient_emergency_contact_preview->CssStyle = "";
	$patient_emergency_contact_preview->loadListRowValues($patient_emergency_contact_preview->Recordset);

	// Render row
	$patient_emergency_contact_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_emergency_contact_preview->resetAttributes();
	$patient_emergency_contact_preview->renderListRow();

	// Render list options
	$patient_emergency_contact_preview->renderListOptions();
?>
	<tr<?php echo $patient_emergency_contact_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_emergency_contact_preview->ListOptions->render("body", "left", $patient_emergency_contact_preview->RowCnt);
?>
<?php if ($patient_emergency_contact->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_emergency_contact->id->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact->id->viewAttributes() ?>>
<?php echo $patient_emergency_contact->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
		<!-- patient_id -->
		<td<?php echo $patient_emergency_contact->patient_id->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact->patient_id->viewAttributes() ?>>
<?php echo $patient_emergency_contact->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->name->Visible) { // name ?>
		<!-- name -->
		<td<?php echo $patient_emergency_contact->name->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact->name->viewAttributes() ?>>
<?php echo $patient_emergency_contact->name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
		<!-- relationship -->
		<td<?php echo $patient_emergency_contact->relationship->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact->relationship->viewAttributes() ?>>
<?php echo $patient_emergency_contact->relationship->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
		<!-- telephone -->
		<td<?php echo $patient_emergency_contact->telephone->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact->telephone->viewAttributes() ?>>
<?php echo $patient_emergency_contact->telephone->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->address->Visible) { // address ?>
		<!-- address -->
		<td<?php echo $patient_emergency_contact->address->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact->address->viewAttributes() ?>>
<?php echo $patient_emergency_contact->address->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_emergency_contact->status->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact->status->viewAttributes() ?>>
<?php echo $patient_emergency_contact->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_emergency_contact_preview->ListOptions->render("body", "right", $patient_emergency_contact_preview->RowCnt);
?>
	</tr>
<?php
	$patient_emergency_contact_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_emergency_contact_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_emergency_contact_preview->Pager)) $patient_emergency_contact_preview->Pager = new PrevNextPager($patient_emergency_contact_preview->StartRec, $patient_emergency_contact_preview->DisplayRecs, $patient_emergency_contact_preview->TotalRecs) ?>
<?php if ($patient_emergency_contact_preview->Pager->RecordCount > 0 && $patient_emergency_contact_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_emergency_contact_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_emergency_contact_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_emergency_contact_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_emergency_contact_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_emergency_contact_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_emergency_contact_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_emergency_contact_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_emergency_contact_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_emergency_contact_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_emergency_contact_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_emergency_contact_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_emergency_contact_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_emergency_contact_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_emergency_contact_preview->Recordset)
	$patient_emergency_contact_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_emergency_contact_preview->terminate();
?>