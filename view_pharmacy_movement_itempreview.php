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
<div class="card ew-grid view_pharmacy_movement_item"><!-- .card -->
<?php if ($view_pharmacy_movement_item_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_pharmacy_movement_item_preview->renderListOptions();

// Render list options (header, left)
$view_pharmacy_movement_item_preview->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_movement_item->ProductFrom->Visible) { // ProductFrom ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->ProductFrom) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->ProductFrom->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->ProductFrom->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->ProductFrom->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->ProductFrom->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->ProductFrom->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->ProductFrom->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->ProductFrom->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->Quantity) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->Quantity->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->Quantity->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->Quantity->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->Quantity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->Quantity->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->FreeQty) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->FreeQty->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->FreeQty->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->FreeQty->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->FreeQty->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->FreeQty->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->FreeQty->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->FreeQty->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->IQ) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->IQ->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->IQ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->IQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->IQ->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->IQ->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->IQ->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->IQ->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->MRQ) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->MRQ->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->MRQ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->MRQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->MRQ->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->MRQ->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->MRQ->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->MRQ->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->BRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->BRCODE->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->BRCODE->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->BRCODE->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->BRCODE->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->OPNO->Visible) { // OPNO ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->OPNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->OPNO->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->OPNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->OPNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->OPNO->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->OPNO->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->OPNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->OPNO->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->IPNO->Visible) { // IPNO ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->IPNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->IPNO->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->IPNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->IPNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->IPNO->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->IPNO->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->IPNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->IPNO->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PatientBILLNO->Visible) { // PatientBILLNO ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->PatientBILLNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->PatientBILLNO->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->PatientBILLNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->PatientBILLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->PatientBILLNO->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->PatientBILLNO->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->PatientBILLNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->PatientBILLNO->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BILLDT->Visible) { // BILLDT ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->BILLDT) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->BILLDT->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->BILLDT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->BILLDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->BILLDT->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->BILLDT->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BILLDT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->BILLDT->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->GRNNO->Visible) { // GRNNO ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->GRNNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->GRNNO->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->GRNNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->GRNNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->GRNNO->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->GRNNO->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->GRNNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->GRNNO->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->DT->Visible) { // DT ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->DT) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->DT->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->DT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->DT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->DT->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->DT->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->DT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->DT->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->Customername->Visible) { // Customername ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->Customername) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->Customername->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->Customername->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->Customername->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->Customername->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->Customername->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->Customername->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->Customername->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->createdby) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->createdby->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->createdby->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->createdby->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->createdby->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->createddatetime) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->createddatetime->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->createddatetime->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->createddatetime->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->createddatetime->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->modifiedby) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->modifiedby->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->modifiedby->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->modifiedby->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->modifiedby->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->modifieddatetime->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->modifieddatetime->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->modifieddatetime->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->modifieddatetime->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BILLNO->Visible) { // BILLNO ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->BILLNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->BILLNO->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->BILLNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->BILLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->BILLNO->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->BILLNO->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BILLNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->BILLNO->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->prc) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->prc->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->prc->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->prc->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->prc->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->prc->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->prc->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->prc->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->PrName) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->PrName->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->PrName->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->PrName->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->PrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->PrName->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->BatchNo) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->BatchNo->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->BatchNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->BatchNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->BatchNo->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->BatchNo->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BatchNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->BatchNo->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->ExpDate) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->ExpDate->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->ExpDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->ExpDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->ExpDate->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->ExpDate->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->ExpDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->ExpDate->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->MFRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->MFRCODE->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->MFRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->MFRCODE->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->MFRCODE->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->MFRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->MFRCODE->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->hsn->Visible) { // hsn ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->hsn) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->hsn->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->hsn->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->hsn->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->hsn->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->hsn->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->hsn->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->hsn->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->HospID) == "") { ?>
		<th class="<?php echo $view_pharmacy_movement_item->HospID->headerCellClass() ?>"><?php echo $view_pharmacy_movement_item->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_movement_item->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_movement_item->HospID->Name ?>" data-sort-order="<?php echo $view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->HospID->Name && $view_pharmacy_movement_item_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_preview->SortField == $view_pharmacy_movement_item->HospID->Name) { ?><?php if ($view_pharmacy_movement_item_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_movement_item_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$view_pharmacy_movement_item_preview->RowCnt = 0;
while ($view_pharmacy_movement_item_preview->Recordset && !$view_pharmacy_movement_item_preview->Recordset->EOF) {

	// Init row class and style
	$view_pharmacy_movement_item_preview->RecCount++;
	$view_pharmacy_movement_item_preview->RowCnt++;
	$view_pharmacy_movement_item_preview->CssStyle = "";
	$view_pharmacy_movement_item_preview->loadListRowValues($view_pharmacy_movement_item_preview->Recordset);

	// Render row
	$view_pharmacy_movement_item_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_pharmacy_movement_item_preview->resetAttributes();
	$view_pharmacy_movement_item_preview->renderListRow();

	// Render list options
	$view_pharmacy_movement_item_preview->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_movement_item_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_movement_item_preview->ListOptions->render("body", "left", $view_pharmacy_movement_item_preview->RowCnt);
?>
<?php if ($view_pharmacy_movement_item->ProductFrom->Visible) { // ProductFrom ?>
		<!-- ProductFrom -->
		<td<?php echo $view_pharmacy_movement_item->ProductFrom->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->ProductFrom->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->ProductFrom->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_pharmacy_movement_item->Quantity->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->FreeQty->Visible) { // FreeQty ?>
		<!-- FreeQty -->
		<td<?php echo $view_pharmacy_movement_item->FreeQty->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->FreeQty->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->FreeQty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->IQ->Visible) { // IQ ?>
		<!-- IQ -->
		<td<?php echo $view_pharmacy_movement_item->IQ->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->IQ->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->IQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->MRQ->Visible) { // MRQ ?>
		<!-- MRQ -->
		<td<?php echo $view_pharmacy_movement_item->MRQ->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->MRQ->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->MRQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $view_pharmacy_movement_item->BRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->OPNO->Visible) { // OPNO ?>
		<!-- OPNO -->
		<td<?php echo $view_pharmacy_movement_item->OPNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->OPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->OPNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->IPNO->Visible) { // IPNO ?>
		<!-- IPNO -->
		<td<?php echo $view_pharmacy_movement_item->IPNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->IPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->IPNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PatientBILLNO->Visible) { // PatientBILLNO ?>
		<!-- PatientBILLNO -->
		<td<?php echo $view_pharmacy_movement_item->PatientBILLNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->PatientBILLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->PatientBILLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BILLDT->Visible) { // BILLDT ?>
		<!-- BILLDT -->
		<td<?php echo $view_pharmacy_movement_item->BILLDT->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->BILLDT->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BILLDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->GRNNO->Visible) { // GRNNO ?>
		<!-- GRNNO -->
		<td<?php echo $view_pharmacy_movement_item->GRNNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->GRNNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->GRNNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->DT->Visible) { // DT ?>
		<!-- DT -->
		<td<?php echo $view_pharmacy_movement_item->DT->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->DT->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->DT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->Customername->Visible) { // Customername ?>
		<!-- Customername -->
		<td<?php echo $view_pharmacy_movement_item->Customername->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->Customername->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->Customername->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_pharmacy_movement_item->createdby->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_pharmacy_movement_item->createddatetime->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_pharmacy_movement_item->modifiedby->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_pharmacy_movement_item->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BILLNO->Visible) { // BILLNO ?>
		<!-- BILLNO -->
		<td<?php echo $view_pharmacy_movement_item->BILLNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->BILLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BILLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->prc->Visible) { // prc ?>
		<!-- prc -->
		<td<?php echo $view_pharmacy_movement_item->prc->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->prc->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->prc->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $view_pharmacy_movement_item->PrName->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td<?php echo $view_pharmacy_movement_item->BatchNo->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BatchNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td<?php echo $view_pharmacy_movement_item->ExpDate->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->ExpDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->MFRCODE->Visible) { // MFRCODE ?>
		<!-- MFRCODE -->
		<td<?php echo $view_pharmacy_movement_item->MFRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->MFRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->hsn->Visible) { // hsn ?>
		<!-- hsn -->
		<td<?php echo $view_pharmacy_movement_item->hsn->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->hsn->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->hsn->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_movement_item->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_pharmacy_movement_item->HospID->cellAttributes() ?>>
<span<?php echo $view_pharmacy_movement_item->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_movement_item_preview->ListOptions->render("body", "right", $view_pharmacy_movement_item_preview->RowCnt);
?>
	</tr>
<?php
	$view_pharmacy_movement_item_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_pharmacy_movement_item_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_pharmacy_movement_item_preview->Pager)) $view_pharmacy_movement_item_preview->Pager = new PrevNextPager($view_pharmacy_movement_item_preview->StartRec, $view_pharmacy_movement_item_preview->DisplayRecs, $view_pharmacy_movement_item_preview->TotalRecs) ?>
<?php if ($view_pharmacy_movement_item_preview->Pager->RecordCount > 0 && $view_pharmacy_movement_item_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_pharmacy_movement_item_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_pharmacy_movement_item_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_pharmacy_movement_item_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_pharmacy_movement_item_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_pharmacy_movement_item_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_pharmacy_movement_item_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_pharmacy_movement_item_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_pharmacy_movement_item_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_movement_item_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_movement_item_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_movement_item_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_pharmacy_movement_item_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_pharmacy_movement_item_preview->showPageFooter();
if (DEBUG_ENABLED)
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