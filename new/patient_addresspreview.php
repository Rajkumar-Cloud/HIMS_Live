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
<?php if ($patient_address_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_address"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_address_preview->renderListOptions();

// Render list options (header, left)
$patient_address_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_address_preview->id->Visible) { // id ?>
	<?php if ($patient_address->SortUrl($patient_address_preview->id) == "") { ?>
		<th class="<?php echo $patient_address_preview->id->headerCellClass() ?>"><?php echo $patient_address_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_address_preview->id->Name) ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address_preview->id->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address_preview->id->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_preview->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_address->SortUrl($patient_address_preview->patient_id) == "") { ?>
		<th class="<?php echo $patient_address_preview->patient_id->headerCellClass() ?>"><?php echo $patient_address_preview->patient_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address_preview->patient_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_address_preview->patient_id->Name) ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address_preview->patient_id->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_preview->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address_preview->patient_id->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_preview->street->Visible) { // street ?>
	<?php if ($patient_address->SortUrl($patient_address_preview->street) == "") { ?>
		<th class="<?php echo $patient_address_preview->street->headerCellClass() ?>"><?php echo $patient_address_preview->street->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address_preview->street->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_address_preview->street->Name) ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address_preview->street->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_preview->street->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address_preview->street->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_preview->town->Visible) { // town ?>
	<?php if ($patient_address->SortUrl($patient_address_preview->town) == "") { ?>
		<th class="<?php echo $patient_address_preview->town->headerCellClass() ?>"><?php echo $patient_address_preview->town->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address_preview->town->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_address_preview->town->Name) ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address_preview->town->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_preview->town->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address_preview->town->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_preview->province->Visible) { // province ?>
	<?php if ($patient_address->SortUrl($patient_address_preview->province) == "") { ?>
		<th class="<?php echo $patient_address_preview->province->headerCellClass() ?>"><?php echo $patient_address_preview->province->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address_preview->province->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_address_preview->province->Name) ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address_preview->province->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_preview->province->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address_preview->province->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_preview->postal_code->Visible) { // postal_code ?>
	<?php if ($patient_address->SortUrl($patient_address_preview->postal_code) == "") { ?>
		<th class="<?php echo $patient_address_preview->postal_code->headerCellClass() ?>"><?php echo $patient_address_preview->postal_code->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address_preview->postal_code->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_address_preview->postal_code->Name) ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address_preview->postal_code->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_preview->postal_code->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address_preview->postal_code->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_preview->address_type->Visible) { // address_type ?>
	<?php if ($patient_address->SortUrl($patient_address_preview->address_type) == "") { ?>
		<th class="<?php echo $patient_address_preview->address_type->headerCellClass() ?>"><?php echo $patient_address_preview->address_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address_preview->address_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_address_preview->address_type->Name) ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address_preview->address_type->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_preview->address_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address_preview->address_type->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_preview->status->Visible) { // status ?>
	<?php if ($patient_address->SortUrl($patient_address_preview->status) == "") { ?>
		<th class="<?php echo $patient_address_preview->status->headerCellClass() ?>"><?php echo $patient_address_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_address_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_address_preview->status->Name) ?>" data-sort-order="<?php echo $patient_address_preview->SortField == $patient_address_preview->status->Name && $patient_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_preview->SortField == $patient_address_preview->status->Name) { ?><?php if ($patient_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$patient_address_preview->RowCount = 0;
while ($patient_address_preview->Recordset && !$patient_address_preview->Recordset->EOF) {

	// Init row class and style
	$patient_address_preview->RecCount++;
	$patient_address_preview->RowCount++;
	$patient_address_preview->CssStyle = "";
	$patient_address_preview->loadListRowValues($patient_address_preview->Recordset);

	// Render row
	$patient_address->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_address_preview->resetAttributes();
	$patient_address_preview->renderListRow();

	// Render list options
	$patient_address_preview->renderListOptions();
?>
	<tr <?php echo $patient_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_address_preview->ListOptions->render("body", "left", $patient_address_preview->RowCount);
?>
<?php if ($patient_address_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_address_preview->id->cellAttributes() ?>>
<span<?php echo $patient_address_preview->id->viewAttributes() ?>><?php echo $patient_address_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address_preview->patient_id->Visible) { // patient_id ?>
		<!-- patient_id -->
		<td<?php echo $patient_address_preview->patient_id->cellAttributes() ?>>
<span<?php echo $patient_address_preview->patient_id->viewAttributes() ?>><?php echo $patient_address_preview->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address_preview->street->Visible) { // street ?>
		<!-- street -->
		<td<?php echo $patient_address_preview->street->cellAttributes() ?>>
<span<?php echo $patient_address_preview->street->viewAttributes() ?>><?php echo $patient_address_preview->street->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address_preview->town->Visible) { // town ?>
		<!-- town -->
		<td<?php echo $patient_address_preview->town->cellAttributes() ?>>
<span<?php echo $patient_address_preview->town->viewAttributes() ?>><?php echo $patient_address_preview->town->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address_preview->province->Visible) { // province ?>
		<!-- province -->
		<td<?php echo $patient_address_preview->province->cellAttributes() ?>>
<span<?php echo $patient_address_preview->province->viewAttributes() ?>><?php echo $patient_address_preview->province->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address_preview->postal_code->Visible) { // postal_code ?>
		<!-- postal_code -->
		<td<?php echo $patient_address_preview->postal_code->cellAttributes() ?>>
<span<?php echo $patient_address_preview->postal_code->viewAttributes() ?>><?php echo $patient_address_preview->postal_code->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address_preview->address_type->Visible) { // address_type ?>
		<!-- address_type -->
		<td<?php echo $patient_address_preview->address_type->cellAttributes() ?>>
<span<?php echo $patient_address_preview->address_type->viewAttributes() ?>><?php echo $patient_address_preview->address_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_address_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_address_preview->status->cellAttributes() ?>>
<span<?php echo $patient_address_preview->status->viewAttributes() ?>><?php echo $patient_address_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_address_preview->ListOptions->render("body", "right", $patient_address_preview->RowCount);
?>
	</tr>
<?php
	$patient_address_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_address_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_address_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_address_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_address_preview->showPageFooter();
if (Config("DEBUG"))
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