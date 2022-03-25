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
$patient_document_preview = new patient_document_preview();

// Run the page
$patient_document_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_document_preview->Page_Render();
?>
<?php $patient_document_preview->showPageHeader(); ?>
<?php if ($patient_document_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_document"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_document_preview->renderListOptions();

// Render list options (header, left)
$patient_document_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_document_preview->id->Visible) { // id ?>
	<?php if ($patient_document->SortUrl($patient_document_preview->id) == "") { ?>
		<th class="<?php echo $patient_document_preview->id->headerCellClass() ?>"><?php echo $patient_document_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_document_preview->id->Name) ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document_preview->id->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document_preview->id->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_preview->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_document->SortUrl($patient_document_preview->patient_id) == "") { ?>
		<th class="<?php echo $patient_document_preview->patient_id->headerCellClass() ?>"><?php echo $patient_document_preview->patient_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document_preview->patient_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_document_preview->patient_id->Name) ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document_preview->patient_id->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_preview->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document_preview->patient_id->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_preview->DocumentName->Visible) { // DocumentName ?>
	<?php if ($patient_document->SortUrl($patient_document_preview->DocumentName) == "") { ?>
		<th class="<?php echo $patient_document_preview->DocumentName->headerCellClass() ?>"><?php echo $patient_document_preview->DocumentName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document_preview->DocumentName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_document_preview->DocumentName->Name) ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document_preview->DocumentName->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_preview->DocumentName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document_preview->DocumentName->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_preview->status->Visible) { // status ?>
	<?php if ($patient_document->SortUrl($patient_document_preview->status) == "") { ?>
		<th class="<?php echo $patient_document_preview->status->headerCellClass() ?>"><?php echo $patient_document_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_document_preview->status->Name) ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document_preview->status->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document_preview->status->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_preview->createdby->Visible) { // createdby ?>
	<?php if ($patient_document->SortUrl($patient_document_preview->createdby) == "") { ?>
		<th class="<?php echo $patient_document_preview->createdby->headerCellClass() ?>"><?php echo $patient_document_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_document_preview->createdby->Name) ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document_preview->createdby->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document_preview->createdby->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_document->SortUrl($patient_document_preview->createddatetime) == "") { ?>
		<th class="<?php echo $patient_document_preview->createddatetime->headerCellClass() ?>"><?php echo $patient_document_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_document_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document_preview->createddatetime->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document_preview->createddatetime->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_document->SortUrl($patient_document_preview->modifiedby) == "") { ?>
		<th class="<?php echo $patient_document_preview->modifiedby->headerCellClass() ?>"><?php echo $patient_document_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_document_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document_preview->modifiedby->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document_preview->modifiedby->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_document->SortUrl($patient_document_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_document_preview->modifieddatetime->headerCellClass() ?>"><?php echo $patient_document_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_document_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document_preview->modifieddatetime->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document_preview->modifieddatetime->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_preview->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($patient_document->SortUrl($patient_document_preview->DocumentNumber) == "") { ?>
		<th class="<?php echo $patient_document_preview->DocumentNumber->headerCellClass() ?>"><?php echo $patient_document_preview->DocumentNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_document_preview->DocumentNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_document_preview->DocumentNumber->Name) ?>" data-sort-order="<?php echo $patient_document_preview->SortField == $patient_document_preview->DocumentNumber->Name && $patient_document_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_preview->DocumentNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_preview->SortField == $patient_document_preview->DocumentNumber->Name) { ?><?php if ($patient_document_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_document_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_document_preview->RecCount = 0;
$patient_document_preview->RowCount = 0;
while ($patient_document_preview->Recordset && !$patient_document_preview->Recordset->EOF) {

	// Init row class and style
	$patient_document_preview->RecCount++;
	$patient_document_preview->RowCount++;
	$patient_document_preview->CssStyle = "";
	$patient_document_preview->loadListRowValues($patient_document_preview->Recordset);

	// Render row
	$patient_document->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_document_preview->resetAttributes();
	$patient_document_preview->renderListRow();

	// Render list options
	$patient_document_preview->renderListOptions();
?>
	<tr <?php echo $patient_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_document_preview->ListOptions->render("body", "left", $patient_document_preview->RowCount);
?>
<?php if ($patient_document_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_document_preview->id->cellAttributes() ?>>
<span<?php echo $patient_document_preview->id->viewAttributes() ?>><?php echo $patient_document_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document_preview->patient_id->Visible) { // patient_id ?>
		<!-- patient_id -->
		<td<?php echo $patient_document_preview->patient_id->cellAttributes() ?>>
<span<?php echo $patient_document_preview->patient_id->viewAttributes() ?>><?php echo $patient_document_preview->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document_preview->DocumentName->Visible) { // DocumentName ?>
		<!-- DocumentName -->
		<td<?php echo $patient_document_preview->DocumentName->cellAttributes() ?>>
<span<?php echo $patient_document_preview->DocumentName->viewAttributes() ?>><?php echo $patient_document_preview->DocumentName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_document_preview->status->cellAttributes() ?>>
<span<?php echo $patient_document_preview->status->viewAttributes() ?>><?php echo $patient_document_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_document_preview->createdby->cellAttributes() ?>>
<span<?php echo $patient_document_preview->createdby->viewAttributes() ?>><?php echo $patient_document_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_document_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_document_preview->createddatetime->viewAttributes() ?>><?php echo $patient_document_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_document_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_document_preview->modifiedby->viewAttributes() ?>><?php echo $patient_document_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_document_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_document_preview->modifieddatetime->viewAttributes() ?>><?php echo $patient_document_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_document_preview->DocumentNumber->Visible) { // DocumentNumber ?>
		<!-- DocumentNumber -->
		<td<?php echo $patient_document_preview->DocumentNumber->cellAttributes() ?>>
<span<?php echo $patient_document_preview->DocumentNumber->viewAttributes() ?>><?php echo $patient_document_preview->DocumentNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_document_preview->ListOptions->render("body", "right", $patient_document_preview->RowCount);
?>
	</tr>
<?php
	$patient_document_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_document_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_document_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_document_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_document_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($patient_document_preview->Recordset)
	$patient_document_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_document_preview->terminate();
?>