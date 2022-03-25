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
<div class="card ew-grid pharmacy_grn"><!-- .card -->
<?php if ($pharmacy_grn_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pharmacy_grn_preview->renderListOptions();

// Render list options (header, left)
$pharmacy_grn_preview->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_grn->id->Visible) { // id ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->id) == "") { ?>
		<th class="<?php echo $pharmacy_grn->id->headerCellClass() ?>"><?php echo $pharmacy_grn->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->id->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->id->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->id->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->GRNNO) == "") { ?>
		<th class="<?php echo $pharmacy_grn->GRNNO->headerCellClass() ?>"><?php echo $pharmacy_grn->GRNNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->GRNNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->GRNNO->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->GRNNO->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->GRNNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->GRNNO->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->DT) == "") { ?>
		<th class="<?php echo $pharmacy_grn->DT->headerCellClass() ?>"><?php echo $pharmacy_grn->DT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->DT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->DT->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->DT->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->DT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->DT->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->Customername) == "") { ?>
		<th class="<?php echo $pharmacy_grn->Customername->headerCellClass() ?>"><?php echo $pharmacy_grn->Customername->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->Customername->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->Customername->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->Customername->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->Customername->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->Customername->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->State->Visible) { // State ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->State) == "") { ?>
		<th class="<?php echo $pharmacy_grn->State->headerCellClass() ?>"><?php echo $pharmacy_grn->State->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->State->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->State->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->State->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->State->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->State->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->Pincode) == "") { ?>
		<th class="<?php echo $pharmacy_grn->Pincode->headerCellClass() ?>"><?php echo $pharmacy_grn->Pincode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->Pincode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->Pincode->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->Pincode->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->Pincode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->Pincode->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->Phone) == "") { ?>
		<th class="<?php echo $pharmacy_grn->Phone->headerCellClass() ?>"><?php echo $pharmacy_grn->Phone->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->Phone->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->Phone->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->Phone->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->Phone->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->Phone->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->BILLNO) == "") { ?>
		<th class="<?php echo $pharmacy_grn->BILLNO->headerCellClass() ?>"><?php echo $pharmacy_grn->BILLNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->BILLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->BILLNO->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->BILLNO->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->BILLNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->BILLNO->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->BILLDT) == "") { ?>
		<th class="<?php echo $pharmacy_grn->BILLDT->headerCellClass() ?>"><?php echo $pharmacy_grn->BILLDT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->BILLDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->BILLDT->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->BILLDT->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->BILLDT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->BILLDT->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->BillTotalValue) == "") { ?>
		<th class="<?php echo $pharmacy_grn->BillTotalValue->headerCellClass() ?>"><?php echo $pharmacy_grn->BillTotalValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->BillTotalValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->BillTotalValue->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->BillTotalValue->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->BillTotalValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->BillTotalValue->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->GRNTotalValue) == "") { ?>
		<th class="<?php echo $pharmacy_grn->GRNTotalValue->headerCellClass() ?>"><?php echo $pharmacy_grn->GRNTotalValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->GRNTotalValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->GRNTotalValue->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->GRNTotalValue->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->GRNTotalValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->GRNTotalValue->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->BillDiscount) == "") { ?>
		<th class="<?php echo $pharmacy_grn->BillDiscount->headerCellClass() ?>"><?php echo $pharmacy_grn->BillDiscount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->BillDiscount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->BillDiscount->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->BillDiscount->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->BillDiscount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->BillDiscount->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->GrnValue) == "") { ?>
		<th class="<?php echo $pharmacy_grn->GrnValue->headerCellClass() ?>"><?php echo $pharmacy_grn->GrnValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->GrnValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->GrnValue->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->GrnValue->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->GrnValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->GrnValue->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->Pid) == "") { ?>
		<th class="<?php echo $pharmacy_grn->Pid->headerCellClass() ?>"><?php echo $pharmacy_grn->Pid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->Pid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->Pid->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->Pid->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->Pid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->Pid->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->PaymentNo) == "") { ?>
		<th class="<?php echo $pharmacy_grn->PaymentNo->headerCellClass() ?>"><?php echo $pharmacy_grn->PaymentNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->PaymentNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->PaymentNo->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->PaymentNo->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->PaymentNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->PaymentNo->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->PaymentStatus) == "") { ?>
		<th class="<?php echo $pharmacy_grn->PaymentStatus->headerCellClass() ?>"><?php echo $pharmacy_grn->PaymentStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->PaymentStatus->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->PaymentStatus->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->PaymentStatus->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->PaymentStatus->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($pharmacy_grn->SortUrl($pharmacy_grn->PaidAmount) == "") { ?>
		<th class="<?php echo $pharmacy_grn->PaidAmount->headerCellClass() ?>"><?php echo $pharmacy_grn->PaidAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_grn->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_grn->PaidAmount->Name ?>" data-sort-order="<?php echo $pharmacy_grn_preview->SortField == $pharmacy_grn->PaidAmount->Name && $pharmacy_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_grn->PaidAmount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_grn_preview->SortField == $pharmacy_grn->PaidAmount->Name) { ?><?php if ($pharmacy_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$pharmacy_grn_preview->RowCnt = 0;
while ($pharmacy_grn_preview->Recordset && !$pharmacy_grn_preview->Recordset->EOF) {

	// Init row class and style
	$pharmacy_grn_preview->RecCount++;
	$pharmacy_grn_preview->RowCnt++;
	$pharmacy_grn_preview->CssStyle = "";
	$pharmacy_grn_preview->loadListRowValues($pharmacy_grn_preview->Recordset);
	$pharmacy_grn_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$pharmacy_grn_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$pharmacy_grn_preview->resetAttributes();
	$pharmacy_grn_preview->renderListRow();

	// Render list options
	$pharmacy_grn_preview->renderListOptions();
?>
	<tr<?php echo $pharmacy_grn_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_grn_preview->ListOptions->render("body", "left", $pharmacy_grn_preview->RowCnt);
?>
<?php if ($pharmacy_grn->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $pharmacy_grn->id->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->id->viewAttributes() ?>>
<?php echo $pharmacy_grn->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
		<!-- GRNNO -->
		<td<?php echo $pharmacy_grn->GRNNO->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->GRNNO->viewAttributes() ?>>
<?php echo $pharmacy_grn->GRNNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
		<!-- DT -->
		<td<?php echo $pharmacy_grn->DT->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->DT->viewAttributes() ?>>
<?php echo $pharmacy_grn->DT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
		<!-- Customername -->
		<td<?php echo $pharmacy_grn->Customername->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->Customername->viewAttributes() ?>>
<?php echo $pharmacy_grn->Customername->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->State->Visible) { // State ?>
		<!-- State -->
		<td<?php echo $pharmacy_grn->State->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->State->viewAttributes() ?>>
<?php echo $pharmacy_grn->State->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
		<!-- Pincode -->
		<td<?php echo $pharmacy_grn->Pincode->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_grn->Pincode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
		<!-- Phone -->
		<td<?php echo $pharmacy_grn->Phone->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->Phone->viewAttributes() ?>>
<?php echo $pharmacy_grn->Phone->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
		<!-- BILLNO -->
		<td<?php echo $pharmacy_grn->BILLNO->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->BILLNO->viewAttributes() ?>>
<?php echo $pharmacy_grn->BILLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
		<!-- BILLDT -->
		<td<?php echo $pharmacy_grn->BILLDT->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->BILLDT->viewAttributes() ?>>
<?php echo $pharmacy_grn->BILLDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<!-- BillTotalValue -->
		<td<?php echo $pharmacy_grn->BillTotalValue->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->BillTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->BillTotalValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<!-- GRNTotalValue -->
		<td<?php echo $pharmacy_grn->GRNTotalValue->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->GRNTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->GRNTotalValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
		<!-- BillDiscount -->
		<td<?php echo $pharmacy_grn->BillDiscount->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->BillDiscount->viewAttributes() ?>>
<?php echo $pharmacy_grn->BillDiscount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
		<!-- GrnValue -->
		<td<?php echo $pharmacy_grn->GrnValue->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->GrnValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->GrnValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
		<!-- Pid -->
		<td<?php echo $pharmacy_grn->Pid->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->Pid->viewAttributes() ?>>
<?php echo $pharmacy_grn->Pid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
		<!-- PaymentNo -->
		<td<?php echo $pharmacy_grn->PaymentNo->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->PaymentNo->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaymentNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<!-- PaymentStatus -->
		<td<?php echo $pharmacy_grn->PaymentStatus->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->PaymentStatus->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaymentStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
		<!-- PaidAmount -->
		<td<?php echo $pharmacy_grn->PaidAmount->cellAttributes() ?>>
<span<?php echo $pharmacy_grn->PaidAmount->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaidAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_grn_preview->ListOptions->render("body", "right", $pharmacy_grn_preview->RowCnt);
?>
	</tr>
<?php
	$pharmacy_grn_preview->Recordset->MoveNext();
}
?>
	</tbody>
<?php

	// Render aggregate row
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
<?php if ($pharmacy_grn->id->Visible) { // id ?>
		<!-- id -->
		<td class="<?php echo $pharmacy_grn->id->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
		<!-- GRNNO -->
		<td class="<?php echo $pharmacy_grn->GRNNO->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
		<!-- DT -->
		<td class="<?php echo $pharmacy_grn->DT->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
		<!-- Customername -->
		<td class="<?php echo $pharmacy_grn->Customername->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->State->Visible) { // State ?>
		<!-- State -->
		<td class="<?php echo $pharmacy_grn->State->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
		<!-- Pincode -->
		<td class="<?php echo $pharmacy_grn->Pincode->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
		<!-- Phone -->
		<td class="<?php echo $pharmacy_grn->Phone->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
		<!-- BILLNO -->
		<td class="<?php echo $pharmacy_grn->BILLNO->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
		<!-- BILLDT -->
		<td class="<?php echo $pharmacy_grn->BILLDT->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<!-- BillTotalValue -->
		<td class="<?php echo $pharmacy_grn->BillTotalValue->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn->BillTotalValue->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<!-- GRNTotalValue -->
		<td class="<?php echo $pharmacy_grn->GRNTotalValue->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn->GRNTotalValue->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
		<!-- BillDiscount -->
		<td class="<?php echo $pharmacy_grn->BillDiscount->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn->BillDiscount->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
		<!-- GrnValue -->
		<td class="<?php echo $pharmacy_grn->GrnValue->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
		<!-- Pid -->
		<td class="<?php echo $pharmacy_grn->Pid->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
		<!-- PaymentNo -->
		<td class="<?php echo $pharmacy_grn->PaymentNo->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<!-- PaymentStatus -->
		<td class="<?php echo $pharmacy_grn->PaymentStatus->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
		<!-- PaidAmount -->
		<td class="<?php echo $pharmacy_grn->PaidAmount->footerCellClass() ?>">
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
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($pharmacy_grn_preview->TotalRecs > 0) { ?>
<?php if (!isset($pharmacy_grn_preview->Pager)) $pharmacy_grn_preview->Pager = new PrevNextPager($pharmacy_grn_preview->StartRec, $pharmacy_grn_preview->DisplayRecs, $pharmacy_grn_preview->TotalRecs) ?>
<?php if ($pharmacy_grn_preview->Pager->RecordCount > 0 && $pharmacy_grn_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($pharmacy_grn_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $pharmacy_grn_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($pharmacy_grn_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $pharmacy_grn_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($pharmacy_grn_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $pharmacy_grn_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($pharmacy_grn_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $pharmacy_grn_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_grn_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_grn_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_grn_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pharmacy_grn_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$pharmacy_grn_preview->showPageFooter();
if (DEBUG_ENABLED)
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