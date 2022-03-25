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
$lab_profile_details_preview = new lab_profile_details_preview();

// Run the page
$lab_profile_details_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_details_preview->Page_Render();
?>
<?php $lab_profile_details_preview->showPageHeader(); ?>
<?php if ($lab_profile_details_preview->TotalRecords > 0) { ?>
<div class="card ew-grid lab_profile_details"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$lab_profile_details_preview->renderListOptions();

// Render list options (header, left)
$lab_profile_details_preview->ListOptions->render("header", "left");
?>
<?php if ($lab_profile_details_preview->id->Visible) { // id ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details_preview->id) == "") { ?>
		<th class="<?php echo $lab_profile_details_preview->id->headerCellClass() ?>"><?php echo $lab_profile_details_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($lab_profile_details_preview->id->Name) ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details_preview->id->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details_preview->id->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_preview->ProfileCode->Visible) { // ProfileCode ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details_preview->ProfileCode) == "") { ?>
		<th class="<?php echo $lab_profile_details_preview->ProfileCode->headerCellClass() ?>"><?php echo $lab_profile_details_preview->ProfileCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details_preview->ProfileCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($lab_profile_details_preview->ProfileCode->Name) ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details_preview->ProfileCode->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_preview->ProfileCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details_preview->ProfileCode->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_preview->SubProfileCode->Visible) { // SubProfileCode ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details_preview->SubProfileCode) == "") { ?>
		<th class="<?php echo $lab_profile_details_preview->SubProfileCode->headerCellClass() ?>"><?php echo $lab_profile_details_preview->SubProfileCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details_preview->SubProfileCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($lab_profile_details_preview->SubProfileCode->Name) ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details_preview->SubProfileCode->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_preview->SubProfileCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details_preview->SubProfileCode->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_preview->ProfileTestCode->Visible) { // ProfileTestCode ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details_preview->ProfileTestCode) == "") { ?>
		<th class="<?php echo $lab_profile_details_preview->ProfileTestCode->headerCellClass() ?>"><?php echo $lab_profile_details_preview->ProfileTestCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details_preview->ProfileTestCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($lab_profile_details_preview->ProfileTestCode->Name) ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details_preview->ProfileTestCode->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_preview->ProfileTestCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details_preview->ProfileTestCode->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_preview->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details_preview->ProfileSubTestCode) == "") { ?>
		<th class="<?php echo $lab_profile_details_preview->ProfileSubTestCode->headerCellClass() ?>"><?php echo $lab_profile_details_preview->ProfileSubTestCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details_preview->ProfileSubTestCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($lab_profile_details_preview->ProfileSubTestCode->Name) ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details_preview->ProfileSubTestCode->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_preview->ProfileSubTestCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details_preview->ProfileSubTestCode->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_preview->TestOrder->Visible) { // TestOrder ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details_preview->TestOrder) == "") { ?>
		<th class="<?php echo $lab_profile_details_preview->TestOrder->headerCellClass() ?>"><?php echo $lab_profile_details_preview->TestOrder->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details_preview->TestOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($lab_profile_details_preview->TestOrder->Name) ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details_preview->TestOrder->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_preview->TestOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details_preview->TestOrder->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_preview->TestAmount->Visible) { // TestAmount ?>
	<?php if ($lab_profile_details->SortUrl($lab_profile_details_preview->TestAmount) == "") { ?>
		<th class="<?php echo $lab_profile_details_preview->TestAmount->headerCellClass() ?>"><?php echo $lab_profile_details_preview->TestAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $lab_profile_details_preview->TestAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($lab_profile_details_preview->TestAmount->Name) ?>" data-sort-order="<?php echo $lab_profile_details_preview->SortField == $lab_profile_details_preview->TestAmount->Name && $lab_profile_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_preview->TestAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_preview->SortField == $lab_profile_details_preview->TestAmount->Name) { ?><?php if ($lab_profile_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_profile_details_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$lab_profile_details_preview->RecCount = 0;
$lab_profile_details_preview->RowCount = 0;
while ($lab_profile_details_preview->Recordset && !$lab_profile_details_preview->Recordset->EOF) {

	// Init row class and style
	$lab_profile_details_preview->RecCount++;
	$lab_profile_details_preview->RowCount++;
	$lab_profile_details_preview->CssStyle = "";
	$lab_profile_details_preview->loadListRowValues($lab_profile_details_preview->Recordset);

	// Render row
	$lab_profile_details->RowType = ROWTYPE_PREVIEW; // Preview record
	$lab_profile_details_preview->resetAttributes();
	$lab_profile_details_preview->renderListRow();

	// Render list options
	$lab_profile_details_preview->renderListOptions();
?>
	<tr <?php echo $lab_profile_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_profile_details_preview->ListOptions->render("body", "left", $lab_profile_details_preview->RowCount);
?>
<?php if ($lab_profile_details_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $lab_profile_details_preview->id->cellAttributes() ?>>
<span<?php echo $lab_profile_details_preview->id->viewAttributes() ?>><?php echo $lab_profile_details_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details_preview->ProfileCode->Visible) { // ProfileCode ?>
		<!-- ProfileCode -->
		<td<?php echo $lab_profile_details_preview->ProfileCode->cellAttributes() ?>>
<span<?php echo $lab_profile_details_preview->ProfileCode->viewAttributes() ?>><?php echo $lab_profile_details_preview->ProfileCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details_preview->SubProfileCode->Visible) { // SubProfileCode ?>
		<!-- SubProfileCode -->
		<td<?php echo $lab_profile_details_preview->SubProfileCode->cellAttributes() ?>>
<span<?php echo $lab_profile_details_preview->SubProfileCode->viewAttributes() ?>><?php echo $lab_profile_details_preview->SubProfileCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details_preview->ProfileTestCode->Visible) { // ProfileTestCode ?>
		<!-- ProfileTestCode -->
		<td<?php echo $lab_profile_details_preview->ProfileTestCode->cellAttributes() ?>>
<span<?php echo $lab_profile_details_preview->ProfileTestCode->viewAttributes() ?>><?php echo $lab_profile_details_preview->ProfileTestCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details_preview->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
		<!-- ProfileSubTestCode -->
		<td<?php echo $lab_profile_details_preview->ProfileSubTestCode->cellAttributes() ?>>
<span<?php echo $lab_profile_details_preview->ProfileSubTestCode->viewAttributes() ?>><?php echo $lab_profile_details_preview->ProfileSubTestCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details_preview->TestOrder->Visible) { // TestOrder ?>
		<!-- TestOrder -->
		<td<?php echo $lab_profile_details_preview->TestOrder->cellAttributes() ?>>
<span<?php echo $lab_profile_details_preview->TestOrder->viewAttributes() ?>><?php echo $lab_profile_details_preview->TestOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($lab_profile_details_preview->TestAmount->Visible) { // TestAmount ?>
		<!-- TestAmount -->
		<td<?php echo $lab_profile_details_preview->TestAmount->cellAttributes() ?>>
<span<?php echo $lab_profile_details_preview->TestAmount->viewAttributes() ?>><?php echo $lab_profile_details_preview->TestAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$lab_profile_details_preview->ListOptions->render("body", "right", $lab_profile_details_preview->RowCount);
?>
	</tr>
<?php
	$lab_profile_details_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $lab_profile_details_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($lab_profile_details_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($lab_profile_details_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$lab_profile_details_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($lab_profile_details_preview->Recordset)
	$lab_profile_details_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$lab_profile_details_preview->terminate();
?>