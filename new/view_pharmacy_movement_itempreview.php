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
$view_pharmacy_movement_item_preview = new view_pharmacy_movement_item_preview();

// Run the page
$view_pharmacy_movement_item_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_movement_item_preview->Page_Render();
?>
<?php $view_pharmacy_movement_item_preview->showPageHeader(); ?>
<?php if ($view_pharmacy_movement_item_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_pharmacy_movement_item"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_pharmacy_movement_item_preview->renderListOptions();

// Render list options (header, left)
$view_pharmacy_movement_item_preview->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_movement_item_preview->ProductFrom->Visible) { // ProductFrom ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->ProductFrom) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->ProductFrom->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->ProductFrom->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->ProductFrom->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->ProductFrom->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->ProductFrom->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->ProductFrom->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->ProductFrom->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->Quantity) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->Quantity->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->Quantity->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->Quantity->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->Quantity->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->FreeQty) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->FreeQty->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->FreeQty->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->FreeQty->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->FreeQty->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->FreeQty->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->FreeQty->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->IQ) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->IQ->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->IQ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->IQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->IQ->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->IQ->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->IQ->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->MRQ) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->MRQ->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->MRQ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->MRQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->MRQ->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->MRQ->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->MRQ->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->BRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->BRCODE->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->BRCODE->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->BRCODE->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->BRCODE->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->OPNO->Visible) { // OPNO ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->OPNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->OPNO->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->OPNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->OPNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->OPNO->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->OPNO->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->OPNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->OPNO->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->IPNO->Visible) { // IPNO ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->IPNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->IPNO->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->IPNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->IPNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->IPNO->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->IPNO->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->IPNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->IPNO->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->PatientBILLNO->Visible) { // PatientBILLNO ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->PatientBILLNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->PatientBILLNO->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->PatientBILLNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->PatientBILLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->PatientBILLNO->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->PatientBILLNO->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->PatientBILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->PatientBILLNO->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->BILLDT->Visible) { // BILLDT ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->BILLDT) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->BILLDT->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->BILLDT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->BILLDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->BILLDT->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->BILLDT->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->BILLDT->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->GRNNO->Visible) { // GRNNO ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->GRNNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->GRNNO->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->GRNNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->GRNNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->GRNNO->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->GRNNO->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->GRNNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->GRNNO->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->DT->Visible) { // DT ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->DT) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->DT->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->DT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->DT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->DT->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->DT->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->DT->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->Customername->Visible) { // Customername ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->Customername) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->Customername->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->Customername->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->Customername->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->Customername->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->Customername->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->Customername->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->createdby) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->createdby->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->createdby->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->createdby->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->createdby->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->createddatetime) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->createddatetime->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->createddatetime->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->createddatetime->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->modifiedby) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->modifiedby->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->modifiedby->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->modifiedby->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->modifieddatetime->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->modifieddatetime->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->modifieddatetime->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->BILLNO->Visible) { // BILLNO ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->BILLNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->BILLNO->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->BILLNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->BILLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->BILLNO->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->BILLNO->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->BILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->BILLNO->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->prc) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->prc->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->prc->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->prc->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->prc->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->prc->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->prc->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->prc->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->PrName) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->PrName->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->PrName->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->PrName->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->PrName->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->BatchNo) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->BatchNo->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->BatchNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->BatchNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->BatchNo->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->BatchNo->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->BatchNo->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->ExpDate) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->ExpDate->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->ExpDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->ExpDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->ExpDate->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->ExpDate->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->ExpDate->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->MFRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->MFRCODE->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->MFRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->MFRCODE->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->MFRCODE->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->MFRCODE->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->hsn->Visible) { // hsn ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->hsn) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->hsn->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->hsn->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->hsn->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->hsn->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->hsn->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->hsn->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->hsn->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item_preview->HospID) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->HospID->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_movement_item_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->HospID->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item_preview->HospID->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_movement_item_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_pharmacy_movement_item_preview->RecCount = 0;
$view_pharmacy_movement_item_preview->RowCount = 0;
while ($view_pharmacy_movement_item_preview->Recordset && !$view_pharmacy_movement_item_preview->Recordset->EOF) {

	// Init row class and style
	$view_pharmacy_movement_item_preview->RecCount++;
	$view_pharmacy_movement_item_preview->RowCount++;
	$view_pharmacy_movement_item_preview->CssStyle = "";
	$view_pharmacy_movement_item_preview->loadListRowValues($view_pharmacy_movement_item_preview->Recordset);

	// Render row
	$view_pharmacy_movement_item->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_pharmacy_movement_item_preview->resetAttributes();
	$view_pharmacy_movement_item_preview->renderListRow();

	// Render list options
	$view_pharmacy_movement_item_preview->renderListOptions();
?>
	<tr <?php echo $view_pharmacy_movement_item->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_movement_item_preview->ListOptions->render("body", "left", $view_pharmacy_movement_item_preview->RowCount);
?>
<?php if ($view_pharmacy_movement_item_preview->ProductFrom->Visible) { // ProductFrom ?>
		<!-- ProductFrom -->
		<td<?php echo $view_pharmacy_movement_item_preview->ProductFrom->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->ProductFrom->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->ProductFrom->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_pharmacy_movement_item_preview->Quantity->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->Quantity->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->FreeQty->Visible) { // FreeQty ?>
		<!-- FreeQty -->
		<td<?php echo $view_pharmacy_movement_item_preview->FreeQty->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->FreeQty->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->FreeQty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->IQ->Visible) { // IQ ?>
		<!-- IQ -->
		<td<?php echo $view_pharmacy_movement_item_preview->IQ->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->IQ->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->IQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->MRQ->Visible) { // MRQ ?>
		<!-- MRQ -->
		<td<?php echo $view_pharmacy_movement_item_preview->MRQ->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->MRQ->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->MRQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $view_pharmacy_movement_item_preview->BRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->OPNO->Visible) { // OPNO ?>
		<!-- OPNO -->
		<td<?php echo $view_pharmacy_movement_item_preview->OPNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->OPNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->OPNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->IPNO->Visible) { // IPNO ?>
		<!-- IPNO -->
		<td<?php echo $view_pharmacy_movement_item_preview->IPNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->IPNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->IPNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->PatientBILLNO->Visible) { // PatientBILLNO ?>
		<!-- PatientBILLNO -->
		<td<?php echo $view_pharmacy_movement_item_preview->PatientBILLNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->PatientBILLNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->PatientBILLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->BILLDT->Visible) { // BILLDT ?>
		<!-- BILLDT -->
		<td<?php echo $view_pharmacy_movement_item_preview->BILLDT->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->BILLDT->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->BILLDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->GRNNO->Visible) { // GRNNO ?>
		<!-- GRNNO -->
		<td<?php echo $view_pharmacy_movement_item_preview->GRNNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->GRNNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->GRNNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->DT->Visible) { // DT ?>
		<!-- DT -->
		<td<?php echo $view_pharmacy_movement_item_preview->DT->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->DT->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->DT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->Customername->Visible) { // Customername ?>
		<!-- Customername -->
		<td<?php echo $view_pharmacy_movement_item_preview->Customername->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->Customername->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->Customername->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_pharmacy_movement_item_preview->createdby->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->createdby->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_pharmacy_movement_item_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_pharmacy_movement_item_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_pharmacy_movement_item_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->BILLNO->Visible) { // BILLNO ?>
		<!-- BILLNO -->
		<td<?php echo $view_pharmacy_movement_item_preview->BILLNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->BILLNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->BILLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->prc->Visible) { // prc ?>
		<!-- prc -->
		<td<?php echo $view_pharmacy_movement_item_preview->prc->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->prc->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->prc->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $view_pharmacy_movement_item_preview->PrName->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->PrName->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td<?php echo $view_pharmacy_movement_item_preview->BatchNo->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->BatchNo->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->BatchNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td<?php echo $view_pharmacy_movement_item_preview->ExpDate->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->ExpDate->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->ExpDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->MFRCODE->Visible) { // MFRCODE ?>
		<!-- MFRCODE -->
		<td<?php echo $view_pharmacy_movement_item_preview->MFRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->MFRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->hsn->Visible) { // hsn ?>
		<!-- hsn -->
		<td<?php echo $view_pharmacy_movement_item_preview->hsn->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->hsn->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->hsn->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_pharmacy_movement_item_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item_preview->HospID->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_movement_item_preview->ListOptions->render("body", "right", $view_pharmacy_movement_item_preview->RowCount);
?>
	</tr>
<?php
	$view_pharmacy_movement_item_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_pharmacy_movement_item_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_pharmacy_movement_item_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_pharmacy_movement_item_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_pharmacy_movement_item_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($view_pharmacy_movement_item_preview->Recordset)
	$view_pharmacy_movement_item_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_pharmacy_movement_item_preview->terminate();
?>