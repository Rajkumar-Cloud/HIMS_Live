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
$pharmacy_grn_preview = new pharmacy_grn_preview();

// Run the page
$pharmacy_grn_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_grn_preview->Page_Render();
?>
<?php $pharmacy_grn_preview->showPageHeader(); ?>
<?php if ($pharmacy_grn_preview->TotalRecords > 0) { ?>
<div class="card ew-grid pharmacy_grn"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pharmacy_grn_preview->renderListOptions();

// Render list options (header, left)
$pharmacy_grn_preview->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_grn_preview->id->Visible) { // id ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->id) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->id->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->id->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->id->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->id->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->GRNNO->Visible) { // GRNNO ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->GRNNO) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->GRNNO->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->GRNNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->GRNNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->GRNNO->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->GRNNO->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->GRNNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->GRNNO->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->DT->Visible) { // DT ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->DT) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->DT->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->DT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->DT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->DT->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->DT->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->DT->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->Customername->Visible) { // Customername ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->Customername) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->Customername->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->Customername->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->Customername->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->Customername->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->Customername->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->Customername->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->State->Visible) { // State ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->State) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->State->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->State->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->State->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->State->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->State->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->State->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->Pincode) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->Pincode->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->Pincode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->Pincode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->Pincode->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->Pincode->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->Pincode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->Pincode->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->Phone) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->Phone->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->Phone->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->Phone->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->Phone->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->Phone->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->Phone->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->Phone->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->BILLNO->Visible) { // BILLNO ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->BILLNO) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->BILLNO->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->BILLNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->BILLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->BILLNO->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->BILLNO->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->BILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->BILLNO->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->BILLDT->Visible) { // BILLDT ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->BILLDT) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->BILLDT->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->BILLDT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->BILLDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->BILLDT->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->BILLDT->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->BILLDT->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->BillTotalValue) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->BillTotalValue->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->BillTotalValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->BillTotalValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->BillTotalValue->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->BillTotalValue->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->BillTotalValue->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->GRNTotalValue) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->GRNTotalValue->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->GRNTotalValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->GRNTotalValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->GRNTotalValue->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->GRNTotalValue->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->GRNTotalValue->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->BillDiscount) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->BillDiscount->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->BillDiscount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->BillDiscount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->BillDiscount->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->BillDiscount->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->BillDiscount->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->GrnValue->Visible) { // GrnValue ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->GrnValue) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->GrnValue->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->GrnValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->GrnValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->GrnValue->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->GrnValue->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->GrnValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->GrnValue->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->Pid->Visible) { // Pid ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->Pid) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->Pid->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->Pid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->Pid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->Pid->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->Pid->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->Pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->Pid->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->PaymentNo->Visible) { // PaymentNo ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->PaymentNo) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->PaymentNo->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->PaymentNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->PaymentNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->PaymentNo->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->PaymentNo->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->PaymentNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->PaymentNo->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->PaymentStatus) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->PaymentStatus->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->PaymentStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->PaymentStatus->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->PaymentStatus->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->PaymentStatus->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_preview->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn_preview->PaidAmount) == "") { ?>
		<th class="<?php echo $pharmacy_grn_preview->PaidAmount->headerCellClass() ?>"><?php echo $pharmacy_grn_preview->PaidAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn_preview->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_grn_preview->PaidAmount->Name) ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn_preview->PaidAmount->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_preview->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn_preview->PaidAmount->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_grn_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$pharmacy_grn_preview->RecCount = 0;
$pharmacy_grn_preview->RowCount = 0;
while ($pharmacy_grn_preview->Recordset && !$pharmacy_grn_preview->Recordset->EOF) {

	// Init row class and style
	$pharmacy_grn_preview->RecCount++;
	$pharmacy_grn_preview->RowCount++;
	$pharmacy_grn_preview->CssStyle = "";
	$pharmacy_grn_preview->loadListRowValues($pharmacy_grn_preview->Recordset);
	$pharmacy_grn_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$pharmacy_grn->RowType = ROWTYPE_PREVIEW; // Preview record
	$pharmacy_grn_preview->resetAttributes();
	$pharmacy_grn_preview->renderListRow();

	// Render list options
	$pharmacy_grn_preview->renderListOptions();
?>
	<tr <?php echo $pharmacy_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_grn_preview->ListOptions->render("body", "left", $pharmacy_grn_preview->RowCount);
?>
<?php if ($pharmacy_grn_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $pharmacy_grn_preview->id->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->id->viewAttributes() ?>><?php echo $pharmacy_grn_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->GRNNO->Visible) { // GRNNO ?>
		<!-- GRNNO -->
		<td<?php echo $pharmacy_grn_preview->GRNNO->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->GRNNO->viewAttributes() ?>><?php echo $pharmacy_grn_preview->GRNNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->DT->Visible) { // DT ?>
		<!-- DT -->
		<td<?php echo $pharmacy_grn_preview->DT->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->DT->viewAttributes() ?>><?php echo $pharmacy_grn_preview->DT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->Customername->Visible) { // Customername ?>
		<!-- Customername -->
		<td<?php echo $pharmacy_grn_preview->Customername->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->Customername->viewAttributes() ?>><?php echo $pharmacy_grn_preview->Customername->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->State->Visible) { // State ?>
		<!-- State -->
		<td<?php echo $pharmacy_grn_preview->State->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->State->viewAttributes() ?>><?php echo $pharmacy_grn_preview->State->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->Pincode->Visible) { // Pincode ?>
		<!-- Pincode -->
		<td<?php echo $pharmacy_grn_preview->Pincode->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->Pincode->viewAttributes() ?>><?php echo $pharmacy_grn_preview->Pincode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->Phone->Visible) { // Phone ?>
		<!-- Phone -->
		<td<?php echo $pharmacy_grn_preview->Phone->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->Phone->viewAttributes() ?>><?php echo $pharmacy_grn_preview->Phone->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->BILLNO->Visible) { // BILLNO ?>
		<!-- BILLNO -->
		<td<?php echo $pharmacy_grn_preview->BILLNO->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->BILLNO->viewAttributes() ?>><?php echo $pharmacy_grn_preview->BILLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->BILLDT->Visible) { // BILLDT ?>
		<!-- BILLDT -->
		<td<?php echo $pharmacy_grn_preview->BILLDT->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->BILLDT->viewAttributes() ?>><?php echo $pharmacy_grn_preview->BILLDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->BillTotalValue->Visible) { // BillTotalValue ?>
		<!-- BillTotalValue -->
		<td<?php echo $pharmacy_grn_preview->BillTotalValue->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->BillTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn_preview->BillTotalValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<!-- GRNTotalValue -->
		<td<?php echo $pharmacy_grn_preview->GRNTotalValue->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->GRNTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn_preview->GRNTotalValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->BillDiscount->Visible) { // BillDiscount ?>
		<!-- BillDiscount -->
		<td<?php echo $pharmacy_grn_preview->BillDiscount->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->BillDiscount->viewAttributes() ?>><?php echo $pharmacy_grn_preview->BillDiscount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->GrnValue->Visible) { // GrnValue ?>
		<!-- GrnValue -->
		<td<?php echo $pharmacy_grn_preview->GrnValue->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->GrnValue->viewAttributes() ?>><?php echo $pharmacy_grn_preview->GrnValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->Pid->Visible) { // Pid ?>
		<!-- Pid -->
		<td<?php echo $pharmacy_grn_preview->Pid->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->Pid->viewAttributes() ?>><?php echo $pharmacy_grn_preview->Pid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->PaymentNo->Visible) { // PaymentNo ?>
		<!-- PaymentNo -->
		<td<?php echo $pharmacy_grn_preview->PaymentNo->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->PaymentNo->viewAttributes() ?>><?php echo $pharmacy_grn_preview->PaymentNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->PaymentStatus->Visible) { // PaymentStatus ?>
		<!-- PaymentStatus -->
		<td<?php echo $pharmacy_grn_preview->PaymentStatus->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->PaymentStatus->viewAttributes() ?>><?php echo $pharmacy_grn_preview->PaymentStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->PaidAmount->Visible) { // PaidAmount ?>
		<!-- PaidAmount -->
		<td<?php echo $pharmacy_grn_preview->PaidAmount->cellAttributes() ?>>
<span<?php echo $pharmacy_grn_preview->PaidAmount->viewAttributes() ?>><?php echo $pharmacy_grn_preview->PaidAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_grn_preview->ListOptions->render("body", "right", $pharmacy_grn_preview->RowCount);
?>
	</tr>
<?php
	$pharmacy_grn_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
<?php

	// Render aggregate row
	$pharmacy_grn->RowType = ROWTYPE_AGGREGATE; // Aggregate
	$pharmacy_grn_preview->aggregateListRow(); // Prepare aggregate row

	// Render list options
	$pharmacy_grn_preview->renderListOptions();
?>
	<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options (footer, left)
$pharmacy_grn_preview->ListOptions->render("footer", "left");
?>
<?php if ($pharmacy_grn_preview->id->Visible) { // id ?>
		<!-- id -->
		<td class="<?php echo $pharmacy_grn_preview->id->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->GRNNO->Visible) { // GRNNO ?>
		<!-- GRNNO -->
		<td class="<?php echo $pharmacy_grn_preview->GRNNO->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->DT->Visible) { // DT ?>
		<!-- DT -->
		<td class="<?php echo $pharmacy_grn_preview->DT->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->Customername->Visible) { // Customername ?>
		<!-- Customername -->
		<td class="<?php echo $pharmacy_grn_preview->Customername->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->State->Visible) { // State ?>
		<!-- State -->
		<td class="<?php echo $pharmacy_grn_preview->State->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->Pincode->Visible) { // Pincode ?>
		<!-- Pincode -->
		<td class="<?php echo $pharmacy_grn_preview->Pincode->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->Phone->Visible) { // Phone ?>
		<!-- Phone -->
		<td class="<?php echo $pharmacy_grn_preview->Phone->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->BILLNO->Visible) { // BILLNO ?>
		<!-- BILLNO -->
		<td class="<?php echo $pharmacy_grn_preview->BILLNO->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->BILLDT->Visible) { // BILLDT ?>
		<!-- BILLDT -->
		<td class="<?php echo $pharmacy_grn_preview->BILLDT->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->BillTotalValue->Visible) { // BillTotalValue ?>
		<!-- BillTotalValue -->
		<td class="<?php echo $pharmacy_grn_preview->BillTotalValue->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn_preview->BillTotalValue->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<!-- GRNTotalValue -->
		<td class="<?php echo $pharmacy_grn_preview->GRNTotalValue->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn_preview->GRNTotalValue->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->BillDiscount->Visible) { // BillDiscount ?>
		<!-- BillDiscount -->
		<td class="<?php echo $pharmacy_grn_preview->BillDiscount->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn_preview->BillDiscount->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->GrnValue->Visible) { // GrnValue ?>
		<!-- GrnValue -->
		<td class="<?php echo $pharmacy_grn_preview->GrnValue->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->Pid->Visible) { // Pid ?>
		<!-- Pid -->
		<td class="<?php echo $pharmacy_grn_preview->Pid->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->PaymentNo->Visible) { // PaymentNo ?>
		<!-- PaymentNo -->
		<td class="<?php echo $pharmacy_grn_preview->PaymentNo->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->PaymentStatus->Visible) { // PaymentStatus ?>
		<!-- PaymentStatus -->
		<td class="<?php echo $pharmacy_grn_preview->PaymentStatus->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn_preview->PaidAmount->Visible) { // PaidAmount ?>
		<!-- PaidAmount -->
		<td class="<?php echo $pharmacy_grn_preview->PaidAmount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php

// Render list options (footer, right)
$pharmacy_grn_preview->ListOptions->render("footer", "right");
?>
	</tr>
	</tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $pharmacy_grn_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pharmacy_grn_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($pharmacy_grn_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$pharmacy_grn_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($pharmacy_grn_preview->Recordset)
	$pharmacy_grn_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$pharmacy_grn_preview->terminate();
?>