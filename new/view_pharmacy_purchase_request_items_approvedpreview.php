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
$view_pharmacy_purchase_request_items_approved_preview = new view_pharmacy_purchase_request_items_approved_preview();

// Run the page
$view_pharmacy_purchase_request_items_approved_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_approved_preview->Page_Render();
?>
<?php $view_pharmacy_purchase_request_items_approved_preview->showPageHeader(); ?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_pharmacy_purchase_request_items_approved"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_pharmacy_purchase_request_items_approved_preview->renderListOptions();

// Render list options (header, left)
$view_pharmacy_purchase_request_items_approved_preview->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->id->Visible) { // id ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->SortUrl($view_pharmacy_purchase_request_items_approved_preview->id) == "") { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_preview->id->headerCellClass() ?>"><?php echo $view_pharmacy_purchase_request_items_approved_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_preview->id->Name) ?>" data-sort-order="<?php echo $view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved_preview->id->Name && $view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved_preview->id->Name) { ?><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->SortUrl($view_pharmacy_purchase_request_items_approved_preview->PRC) == "") { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_preview->PRC->headerCellClass() ?>"><?php echo $view_pharmacy_purchase_request_items_approved_preview->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_preview->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_preview->PRC->Name) ?>" data-sort-order="<?php echo $view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved_preview->PRC->Name && $view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_preview->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved_preview->PRC->Name) { ?><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->SortUrl($view_pharmacy_purchase_request_items_approved_preview->PrName) == "") { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_preview->PrName->headerCellClass() ?>"><?php echo $view_pharmacy_purchase_request_items_approved_preview->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_preview->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_preview->PrName->Name) ?>" data-sort-order="<?php echo $view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved_preview->PrName->Name && $view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_preview->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved_preview->PrName->Name) { ?><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->SortUrl($view_pharmacy_purchase_request_items_approved_preview->Quantity) == "") { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_preview->Quantity->headerCellClass() ?>"><?php echo $view_pharmacy_purchase_request_items_approved_preview->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_preview->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_preview->Quantity->Name) ?>" data-sort-order="<?php echo $view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved_preview->Quantity->Name && $view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_preview->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved_preview->Quantity->Name) { ?><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->SortUrl($view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus) == "") { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->headerCellClass() ?>"><?php echo $view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->Name) ?>" data-sort-order="<?php echo $view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->Name && $view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortField == $view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->Name) { ?><?php if ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_purchase_request_items_approved_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_pharmacy_purchase_request_items_approved_preview->RecCount = 0;
$view_pharmacy_purchase_request_items_approved_preview->RowCount = 0;
while ($view_pharmacy_purchase_request_items_approved_preview->Recordset && !$view_pharmacy_purchase_request_items_approved_preview->Recordset->EOF) {

	// Init row class and style
	$view_pharmacy_purchase_request_items_approved_preview->RecCount++;
	$view_pharmacy_purchase_request_items_approved_preview->RowCount++;
	$view_pharmacy_purchase_request_items_approved_preview->CssStyle = "";
	$view_pharmacy_purchase_request_items_approved_preview->loadListRowValues($view_pharmacy_purchase_request_items_approved_preview->Recordset);

	// Render row
	$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_pharmacy_purchase_request_items_approved_preview->resetAttributes();
	$view_pharmacy_purchase_request_items_approved_preview->renderListRow();

	// Render list options
	$view_pharmacy_purchase_request_items_approved_preview->renderListOptions();
?>
	<tr <?php echo $view_pharmacy_purchase_request_items_approved->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_approved_preview->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_approved_preview->RowCount);
?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_pharmacy_purchase_request_items_approved_preview->id->cellAttributes() ?>>
<span<?php echo $view_pharmacy_purchase_request_items_approved_preview->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $view_pharmacy_purchase_request_items_approved_preview->PRC->cellAttributes() ?>>
<span<?php echo $view_pharmacy_purchase_request_items_approved_preview->PRC->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_preview->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $view_pharmacy_purchase_request_items_approved_preview->PrName->cellAttributes() ?>>
<span<?php echo $view_pharmacy_purchase_request_items_approved_preview->PrName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_preview->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_pharmacy_purchase_request_items_approved_preview->Quantity->cellAttributes() ?>>
<span<?php echo $view_pharmacy_purchase_request_items_approved_preview->Quantity->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_preview->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<!-- ApprovedStatus -->
		<td<?php echo $view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->cellAttributes() ?>>
<span<?php echo $view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_preview->ApprovedStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_approved_preview->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_approved_preview->RowCount);
?>
	</tr>
<?php
	$view_pharmacy_purchase_request_items_approved_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_pharmacy_purchase_request_items_approved_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_pharmacy_purchase_request_items_approved_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_pharmacy_purchase_request_items_approved_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_pharmacy_purchase_request_items_approved_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($view_pharmacy_purchase_request_items_approved_preview->Recordset)
	$view_pharmacy_purchase_request_items_approved_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_pharmacy_purchase_request_items_approved_preview->terminate();
?>