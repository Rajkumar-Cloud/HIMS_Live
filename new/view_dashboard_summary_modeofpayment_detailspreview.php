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
$view_dashboard_summary_modeofpayment_details_preview = new view_dashboard_summary_modeofpayment_details_preview();

// Run the page
$view_dashboard_summary_modeofpayment_details_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_summary_modeofpayment_details_preview->Page_Render();
?>
<?php $view_dashboard_summary_modeofpayment_details_preview->showPageHeader(); ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_dashboard_summary_modeofpayment_details"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_dashboard_summary_modeofpayment_details_preview->renderListOptions();

// Render list options (header, left)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details_preview->UserName) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->UserName->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details_preview->UserName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->UserName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_preview->UserName->Name) ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->UserName->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_preview->UserName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->UserName->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details_preview->ModeofPayment) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->Name) ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->Visible) { // sum(Amount) ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details_preview->sum28Amount29) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->Name) ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details_preview->createddate) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->createddate->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details_preview->createddate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->createddate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_preview->createddate->Name) ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->createddate->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_preview->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->createddate->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details_preview->HospID) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->HospID->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->HospID->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->HospID->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->BillType->Visible) { // BillType ?>
	<?php if ($view_dashboard_summary_modeofpayment_details->SortUrl($view_dashboard_summary_modeofpayment_details_preview->BillType) == "") { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->BillType->headerCellClass() ?>"><?php echo $view_dashboard_summary_modeofpayment_details_preview->BillType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->BillType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_preview->BillType->Name) ?>" data-sort-order="<?php echo $view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->BillType->Name && $view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_preview->BillType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortField == $view_dashboard_summary_modeofpayment_details_preview->BillType->Name) { ?><?php if ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_dashboard_summary_modeofpayment_details_preview->RecCount = 0;
$view_dashboard_summary_modeofpayment_details_preview->RowCount = 0;
while ($view_dashboard_summary_modeofpayment_details_preview->Recordset && !$view_dashboard_summary_modeofpayment_details_preview->Recordset->EOF) {

	// Init row class and style
	$view_dashboard_summary_modeofpayment_details_preview->RecCount++;
	$view_dashboard_summary_modeofpayment_details_preview->RowCount++;
	$view_dashboard_summary_modeofpayment_details_preview->CssStyle = "";
	$view_dashboard_summary_modeofpayment_details_preview->loadListRowValues($view_dashboard_summary_modeofpayment_details_preview->Recordset);
	$view_dashboard_summary_modeofpayment_details_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_dashboard_summary_modeofpayment_details_preview->resetAttributes();
	$view_dashboard_summary_modeofpayment_details_preview->renderListRow();

	// Render list options
	$view_dashboard_summary_modeofpayment_details_preview->renderListOptions();
?>
	<tr <?php echo $view_dashboard_summary_modeofpayment_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("body", "left", $view_dashboard_summary_modeofpayment_details_preview->RowCount);
?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->UserName->Visible) { // UserName ?>
		<!-- UserName -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details_preview->UserName->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details_preview->UserName->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_preview->UserName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->Visible) { // sum(Amount) ?>
		<!-- sum(Amount) -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->createddate->Visible) { // createddate ?>
		<!-- createddate -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details_preview->createddate->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details_preview->createddate->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_preview->createddate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details_preview->HospID->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->BillType->Visible) { // BillType ?>
		<!-- BillType -->
		<td<?php echo $view_dashboard_summary_modeofpayment_details_preview->BillType->cellAttributes() ?>>
<span<?php echo $view_dashboard_summary_modeofpayment_details_preview->BillType->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_preview->BillType->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("body", "right", $view_dashboard_summary_modeofpayment_details_preview->RowCount);
?>
	</tr>
<?php
	$view_dashboard_summary_modeofpayment_details_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
<?php

	// Render aggregate row
	$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_AGGREGATE; // Aggregate
	$view_dashboard_summary_modeofpayment_details_preview->aggregateListRow(); // Prepare aggregate row

	// Render list options
	$view_dashboard_summary_modeofpayment_details_preview->renderListOptions();
?>
	<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options (footer, left)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("footer", "left");
?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->UserName->Visible) { // UserName ?>
		<!-- UserName -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->UserName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->ModeofPayment->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->Visible) { // sum(Amount) ?>
		<!-- sum(Amount) -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_summary_modeofpayment_details_preview->sum28Amount29->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->createddate->Visible) { // createddate ?>
		<!-- createddate -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->createddate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->BillType->Visible) { // BillType ?>
		<!-- BillType -->
		<td class="<?php echo $view_dashboard_summary_modeofpayment_details_preview->BillType->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_summary_modeofpayment_details_preview->ListOptions->render("footer", "right");
?>
	</tr>
	</tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_dashboard_summary_modeofpayment_details_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_dashboard_summary_modeofpayment_details_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_dashboard_summary_modeofpayment_details_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_dashboard_summary_modeofpayment_details_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($view_dashboard_summary_modeofpayment_details_preview->Recordset)
	$view_dashboard_summary_modeofpayment_details_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_dashboard_summary_modeofpayment_details_preview->terminate();
?>