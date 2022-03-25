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
$view_dashboard_service_servicetype_preview = new view_dashboard_service_servicetype_preview();

// Run the page
$view_dashboard_service_servicetype_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_service_servicetype_preview->Page_Render();
?>
<?php $view_dashboard_service_servicetype_preview->showPageHeader(); ?>
<?php if ($view_dashboard_service_servicetype_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_dashboard_service_servicetype"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_dashboard_service_servicetype_preview->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_servicetype_preview->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_servicetype_preview->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_servicetype->SortUrl($view_dashboard_service_servicetype_preview->DEPARTMENT) == "") { ?>
		<th class="<?php echo $view_dashboard_service_servicetype_preview->DEPARTMENT->headerCellClass() ?>"><?php echo $view_dashboard_service_servicetype_preview->DEPARTMENT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_servicetype_preview->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_servicetype_preview->DEPARTMENT->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype_preview->DEPARTMENT->Name && $view_dashboard_service_servicetype_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype_preview->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype_preview->DEPARTMENT->Name) { ?><?php if ($view_dashboard_service_servicetype_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_servicetype_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_dashboard_service_servicetype->SortUrl($view_dashboard_service_servicetype_preview->SERVICE_TYPE) == "") { ?>
		<th class="<?php echo $view_dashboard_service_servicetype_preview->SERVICE_TYPE->headerCellClass() ?>"><?php echo $view_dashboard_service_servicetype_preview->SERVICE_TYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_servicetype_preview->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_servicetype_preview->SERVICE_TYPE->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype_preview->SERVICE_TYPE->Name && $view_dashboard_service_servicetype_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype_preview->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype_preview->SERVICE_TYPE->Name) { ?><?php if ($view_dashboard_service_servicetype_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_servicetype_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
	<?php if ($view_dashboard_service_servicetype->SortUrl($view_dashboard_service_servicetype_preview->sum28SubTotal29) == "") { ?>
		<th class="<?php echo $view_dashboard_service_servicetype_preview->sum28SubTotal29->headerCellClass() ?>"><?php echo $view_dashboard_service_servicetype_preview->sum28SubTotal29->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_servicetype_preview->sum28SubTotal29->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_servicetype_preview->sum28SubTotal29->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype_preview->sum28SubTotal29->Name && $view_dashboard_service_servicetype_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype_preview->sum28SubTotal29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype_preview->sum28SubTotal29->Name) { ?><?php if ($view_dashboard_service_servicetype_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_servicetype_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_servicetype->SortUrl($view_dashboard_service_servicetype_preview->createdDate) == "") { ?>
		<th class="<?php echo $view_dashboard_service_servicetype_preview->createdDate->headerCellClass() ?>"><?php echo $view_dashboard_service_servicetype_preview->createdDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_servicetype_preview->createdDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_servicetype_preview->createdDate->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype_preview->createdDate->Name && $view_dashboard_service_servicetype_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype_preview->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype_preview->createdDate->Name) { ?><?php if ($view_dashboard_service_servicetype_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_servicetype_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_servicetype->SortUrl($view_dashboard_service_servicetype_preview->HospID) == "") { ?>
		<th class="<?php echo $view_dashboard_service_servicetype_preview->HospID->headerCellClass() ?>"><?php echo $view_dashboard_service_servicetype_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_servicetype_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_servicetype_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype_preview->HospID->Name && $view_dashboard_service_servicetype_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype_preview->SortField == $view_dashboard_service_servicetype_preview->HospID->Name) { ?><?php if ($view_dashboard_service_servicetype_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_servicetype_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_service_servicetype_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_dashboard_service_servicetype_preview->RecCount = 0;
$view_dashboard_service_servicetype_preview->RowCount = 0;
while ($view_dashboard_service_servicetype_preview->Recordset && !$view_dashboard_service_servicetype_preview->Recordset->EOF) {

	// Init row class and style
	$view_dashboard_service_servicetype_preview->RecCount++;
	$view_dashboard_service_servicetype_preview->RowCount++;
	$view_dashboard_service_servicetype_preview->CssStyle = "";
	$view_dashboard_service_servicetype_preview->loadListRowValues($view_dashboard_service_servicetype_preview->Recordset);
	$view_dashboard_service_servicetype_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_dashboard_service_servicetype->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_dashboard_service_servicetype_preview->resetAttributes();
	$view_dashboard_service_servicetype_preview->renderListRow();

	// Render list options
	$view_dashboard_service_servicetype_preview->renderListOptions();
?>
	<tr <?php echo $view_dashboard_service_servicetype->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_servicetype_preview->ListOptions->render("body", "left", $view_dashboard_service_servicetype_preview->RowCount);
?>
<?php if ($view_dashboard_service_servicetype_preview->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<!-- DEPARTMENT -->
		<td<?php echo $view_dashboard_service_servicetype_preview->DEPARTMENT->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_servicetype_preview->DEPARTMENT->viewAttributes() ?>><?php echo $view_dashboard_service_servicetype_preview->DEPARTMENT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<!-- SERVICE_TYPE -->
		<td<?php echo $view_dashboard_service_servicetype_preview->SERVICE_TYPE->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_servicetype_preview->SERVICE_TYPE->viewAttributes() ?>><?php echo $view_dashboard_service_servicetype_preview->SERVICE_TYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
		<!-- sum(SubTotal) -->
		<td<?php echo $view_dashboard_service_servicetype_preview->sum28SubTotal29->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_servicetype_preview->sum28SubTotal29->viewAttributes() ?>><?php echo $view_dashboard_service_servicetype_preview->sum28SubTotal29->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->createdDate->Visible) { // createdDate ?>
		<!-- createdDate -->
		<td<?php echo $view_dashboard_service_servicetype_preview->createdDate->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_servicetype_preview->createdDate->viewAttributes() ?>><?php echo $view_dashboard_service_servicetype_preview->createdDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_dashboard_service_servicetype_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_servicetype_preview->HospID->viewAttributes() ?>><?php echo $view_dashboard_service_servicetype_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_servicetype_preview->ListOptions->render("body", "right", $view_dashboard_service_servicetype_preview->RowCount);
?>
	</tr>
<?php
	$view_dashboard_service_servicetype_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
<?php

	// Render aggregate row
	$view_dashboard_service_servicetype->RowType = ROWTYPE_AGGREGATE; // Aggregate
	$view_dashboard_service_servicetype_preview->aggregateListRow(); // Prepare aggregate row

	// Render list options
	$view_dashboard_service_servicetype_preview->renderListOptions();
?>
	<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options (footer, left)
$view_dashboard_service_servicetype_preview->ListOptions->render("footer", "left");
?>
<?php if ($view_dashboard_service_servicetype_preview->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<!-- DEPARTMENT -->
		<td class="<?php echo $view_dashboard_service_servicetype_preview->DEPARTMENT->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<!-- SERVICE_TYPE -->
		<td class="<?php echo $view_dashboard_service_servicetype_preview->SERVICE_TYPE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
		<!-- sum(SubTotal) -->
		<td class="<?php echo $view_dashboard_service_servicetype_preview->sum28SubTotal29->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_servicetype_preview->sum28SubTotal29->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->createdDate->Visible) { // createdDate ?>
		<!-- createdDate -->
		<td class="<?php echo $view_dashboard_service_servicetype_preview->createdDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_servicetype_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_dashboard_service_servicetype_preview->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_service_servicetype_preview->ListOptions->render("footer", "right");
?>
	</tr>
	</tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_dashboard_service_servicetype_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_dashboard_service_servicetype_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_dashboard_service_servicetype_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_dashboard_service_servicetype_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($view_dashboard_service_servicetype_preview->Recordset)
	$view_dashboard_service_servicetype_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_dashboard_service_servicetype_preview->terminate();
?>