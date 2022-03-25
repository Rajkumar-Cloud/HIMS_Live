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
<?php if ($employee_address_preview->TotalRecords > 0) { ?>
<div class="card ew-grid employee_address"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$employee_address_preview->renderListOptions();

// Render list options (header, left)
$employee_address_preview->ListOptions->render("header", "left");
?>
<?php if ($employee_address_preview->id->Visible) { // id ?>
	<?php if ($employee_address->SortUrl($employee_address_preview->id) == "") { ?>
		<th class="<?php echo $employee_address_preview->id->headerCellClass() ?>"><?php echo $employee_address_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_address_preview->id->Name) ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address_preview->id->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address_preview->id->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_preview->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_address->SortUrl($employee_address_preview->employee_id) == "") { ?>
		<th class="<?php echo $employee_address_preview->employee_id->headerCellClass() ?>"><?php echo $employee_address_preview->employee_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address_preview->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_address_preview->employee_id->Name) ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address_preview->employee_id->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_preview->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address_preview->employee_id->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_preview->contact_persion->Visible) { // contact_persion ?>
	<?php if ($employee_address->SortUrl($employee_address_preview->contact_persion) == "") { ?>
		<th class="<?php echo $employee_address_preview->contact_persion->headerCellClass() ?>"><?php echo $employee_address_preview->contact_persion->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address_preview->contact_persion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_address_preview->contact_persion->Name) ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address_preview->contact_persion->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_preview->contact_persion->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address_preview->contact_persion->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_preview->street->Visible) { // street ?>
	<?php if ($employee_address->SortUrl($employee_address_preview->street) == "") { ?>
		<th class="<?php echo $employee_address_preview->street->headerCellClass() ?>"><?php echo $employee_address_preview->street->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address_preview->street->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_address_preview->street->Name) ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address_preview->street->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_preview->street->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address_preview->street->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_preview->town->Visible) { // town ?>
	<?php if ($employee_address->SortUrl($employee_address_preview->town) == "") { ?>
		<th class="<?php echo $employee_address_preview->town->headerCellClass() ?>"><?php echo $employee_address_preview->town->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address_preview->town->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_address_preview->town->Name) ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address_preview->town->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_preview->town->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address_preview->town->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_preview->province->Visible) { // province ?>
	<?php if ($employee_address->SortUrl($employee_address_preview->province) == "") { ?>
		<th class="<?php echo $employee_address_preview->province->headerCellClass() ?>"><?php echo $employee_address_preview->province->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address_preview->province->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_address_preview->province->Name) ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address_preview->province->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_preview->province->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address_preview->province->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_preview->postal_code->Visible) { // postal_code ?>
	<?php if ($employee_address->SortUrl($employee_address_preview->postal_code) == "") { ?>
		<th class="<?php echo $employee_address_preview->postal_code->headerCellClass() ?>"><?php echo $employee_address_preview->postal_code->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address_preview->postal_code->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_address_preview->postal_code->Name) ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address_preview->postal_code->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_preview->postal_code->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address_preview->postal_code->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_preview->address_type->Visible) { // address_type ?>
	<?php if ($employee_address->SortUrl($employee_address_preview->address_type) == "") { ?>
		<th class="<?php echo $employee_address_preview->address_type->headerCellClass() ?>"><?php echo $employee_address_preview->address_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address_preview->address_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_address_preview->address_type->Name) ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address_preview->address_type->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_preview->address_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address_preview->address_type->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_preview->status->Visible) { // status ?>
	<?php if ($employee_address->SortUrl($employee_address_preview->status) == "") { ?>
		<th class="<?php echo $employee_address_preview->status->headerCellClass() ?>"><?php echo $employee_address_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $employee_address_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($employee_address_preview->status->Name) ?>" data-sort-order="<?php echo $employee_address_preview->SortField == $employee_address_preview->status->Name && $employee_address_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_preview->SortField == $employee_address_preview->status->Name) { ?><?php if ($employee_address_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$employee_address_preview->RowCount = 0;
while ($employee_address_preview->Recordset && !$employee_address_preview->Recordset->EOF) {

	// Init row class and style
	$employee_address_preview->RecCount++;
	$employee_address_preview->RowCount++;
	$employee_address_preview->CssStyle = "";
	$employee_address_preview->loadListRowValues($employee_address_preview->Recordset);

	// Render row
	$employee_address->RowType = ROWTYPE_PREVIEW; // Preview record
	$employee_address_preview->resetAttributes();
	$employee_address_preview->renderListRow();

	// Render list options
	$employee_address_preview->renderListOptions();
?>
	<tr <?php echo $employee_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_address_preview->ListOptions->render("body", "left", $employee_address_preview->RowCount);
?>
<?php if ($employee_address_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $employee_address_preview->id->cellAttributes() ?>>
<span<?php echo $employee_address_preview->id->viewAttributes() ?>><?php echo $employee_address_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address_preview->employee_id->Visible) { // employee_id ?>
		<!-- employee_id -->
		<td<?php echo $employee_address_preview->employee_id->cellAttributes() ?>>
<span<?php echo $employee_address_preview->employee_id->viewAttributes() ?>><?php echo $employee_address_preview->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address_preview->contact_persion->Visible) { // contact_persion ?>
		<!-- contact_persion -->
		<td<?php echo $employee_address_preview->contact_persion->cellAttributes() ?>>
<span<?php echo $employee_address_preview->contact_persion->viewAttributes() ?>><?php echo $employee_address_preview->contact_persion->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address_preview->street->Visible) { // street ?>
		<!-- street -->
		<td<?php echo $employee_address_preview->street->cellAttributes() ?>>
<span<?php echo $employee_address_preview->street->viewAttributes() ?>><?php echo $employee_address_preview->street->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address_preview->town->Visible) { // town ?>
		<!-- town -->
		<td<?php echo $employee_address_preview->town->cellAttributes() ?>>
<span<?php echo $employee_address_preview->town->viewAttributes() ?>><?php echo $employee_address_preview->town->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address_preview->province->Visible) { // province ?>
		<!-- province -->
		<td<?php echo $employee_address_preview->province->cellAttributes() ?>>
<span<?php echo $employee_address_preview->province->viewAttributes() ?>><?php echo $employee_address_preview->province->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address_preview->postal_code->Visible) { // postal_code ?>
		<!-- postal_code -->
		<td<?php echo $employee_address_preview->postal_code->cellAttributes() ?>>
<span<?php echo $employee_address_preview->postal_code->viewAttributes() ?>><?php echo $employee_address_preview->postal_code->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address_preview->address_type->Visible) { // address_type ?>
		<!-- address_type -->
		<td<?php echo $employee_address_preview->address_type->cellAttributes() ?>>
<span<?php echo $employee_address_preview->address_type->viewAttributes() ?>><?php echo $employee_address_preview->address_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($employee_address_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $employee_address_preview->status->cellAttributes() ?>>
<span<?php echo $employee_address_preview->status->viewAttributes() ?>><?php echo $employee_address_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$employee_address_preview->ListOptions->render("body", "right", $employee_address_preview->RowCount);
?>
	</tr>
<?php
	$employee_address_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $employee_address_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($employee_address_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($employee_address_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$employee_address_preview->showPageFooter();
if (Config("DEBUG"))
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