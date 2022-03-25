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
$view_ip_advance_preview = new view_ip_advance_preview();

// Run the page
$view_ip_advance_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_advance_preview->Page_Render();
?>
<?php $view_ip_advance_preview->showPageHeader(); ?>
<div class="card ew-grid view_ip_advance"><!-- .card -->
<?php if ($view_ip_advance_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_ip_advance_preview->renderListOptions();

// Render list options (header, left)
$view_ip_advance_preview->ListOptions->render("header", "left");
?>
<?php if ($view_ip_advance->id->Visible) { // id ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->id) == "") { ?>
		<th class="<?php echo $view_ip_advance->id->headerCellClass() ?>"><?php echo $view_ip_advance->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->id->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->id->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->id->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Name->Visible) { // Name ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->Name) == "") { ?>
		<th class="<?php echo $view_ip_advance->Name->headerCellClass() ?>"><?php echo $view_ip_advance->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->Name->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->Name->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->Name->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Mobile->Visible) { // Mobile ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->Mobile) == "") { ?>
		<th class="<?php echo $view_ip_advance->Mobile->headerCellClass() ?>"><?php echo $view_ip_advance->Mobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->Mobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->Mobile->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->Mobile->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->Mobile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->Mobile->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->voucher_type) == "") { ?>
		<th class="<?php echo $view_ip_advance->voucher_type->headerCellClass() ?>"><?php echo $view_ip_advance->voucher_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->voucher_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->voucher_type->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->voucher_type->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->voucher_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->voucher_type->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Details->Visible) { // Details ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->Details) == "") { ?>
		<th class="<?php echo $view_ip_advance->Details->headerCellClass() ?>"><?php echo $view_ip_advance->Details->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->Details->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->Details->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->Details->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->Details->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->Details->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->ModeofPayment) == "") { ?>
		<th class="<?php echo $view_ip_advance->ModeofPayment->headerCellClass() ?>"><?php echo $view_ip_advance->ModeofPayment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->ModeofPayment->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->ModeofPayment->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->ModeofPayment->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->ModeofPayment->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Amount->Visible) { // Amount ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->Amount) == "") { ?>
		<th class="<?php echo $view_ip_advance->Amount->headerCellClass() ?>"><?php echo $view_ip_advance->Amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->Amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->Amount->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->Amount->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->Amount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->Amount->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->AnyDues) == "") { ?>
		<th class="<?php echo $view_ip_advance->AnyDues->headerCellClass() ?>"><?php echo $view_ip_advance->AnyDues->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->AnyDues->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->AnyDues->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->AnyDues->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->AnyDues->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->AnyDues->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->createdby) == "") { ?>
		<th class="<?php echo $view_ip_advance->createdby->headerCellClass() ?>"><?php echo $view_ip_advance->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->createdby->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->createdby->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->createdby->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->createddatetime) == "") { ?>
		<th class="<?php echo $view_ip_advance->createddatetime->headerCellClass() ?>"><?php echo $view_ip_advance->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->createddatetime->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->createddatetime->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->createddatetime->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->modifiedby) == "") { ?>
		<th class="<?php echo $view_ip_advance->modifiedby->headerCellClass() ?>"><?php echo $view_ip_advance->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->modifiedby->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->modifiedby->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->modifiedby->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_ip_advance->modifieddatetime->headerCellClass() ?>"><?php echo $view_ip_advance->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->modifieddatetime->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->modifieddatetime->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->modifieddatetime->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PatID->Visible) { // PatID ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->PatID) == "") { ?>
		<th class="<?php echo $view_ip_advance->PatID->headerCellClass() ?>"><?php echo $view_ip_advance->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->PatID->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->PatID->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->PatID->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->PatientID) == "") { ?>
		<th class="<?php echo $view_ip_advance->PatientID->headerCellClass() ?>"><?php echo $view_ip_advance->PatientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->PatientID->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->PatientID->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->PatientID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->PatientID->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->PatientName) == "") { ?>
		<th class="<?php echo $view_ip_advance->PatientName->headerCellClass() ?>"><?php echo $view_ip_advance->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->PatientName->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->PatientName->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->PatientName->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->VisiteType->Visible) { // VisiteType ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->VisiteType) == "") { ?>
		<th class="<?php echo $view_ip_advance->VisiteType->headerCellClass() ?>"><?php echo $view_ip_advance->VisiteType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->VisiteType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->VisiteType->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->VisiteType->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->VisiteType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->VisiteType->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->VisitDate->Visible) { // VisitDate ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->VisitDate) == "") { ?>
		<th class="<?php echo $view_ip_advance->VisitDate->headerCellClass() ?>"><?php echo $view_ip_advance->VisitDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->VisitDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->VisitDate->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->VisitDate->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->VisitDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->VisitDate->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->AdvanceNo) == "") { ?>
		<th class="<?php echo $view_ip_advance->AdvanceNo->headerCellClass() ?>"><?php echo $view_ip_advance->AdvanceNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->AdvanceNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->AdvanceNo->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->AdvanceNo->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->AdvanceNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->AdvanceNo->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Status->Visible) { // Status ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->Status) == "") { ?>
		<th class="<?php echo $view_ip_advance->Status->headerCellClass() ?>"><?php echo $view_ip_advance->Status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->Status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->Status->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->Status->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->Status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->Status->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Date->Visible) { // Date ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->Date) == "") { ?>
		<th class="<?php echo $view_ip_advance->Date->headerCellClass() ?>"><?php echo $view_ip_advance->Date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->Date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->Date->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->Date->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->Date->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->Date->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->AdvanceValidityDate) == "") { ?>
		<th class="<?php echo $view_ip_advance->AdvanceValidityDate->headerCellClass() ?>"><?php echo $view_ip_advance->AdvanceValidityDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->AdvanceValidityDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->AdvanceValidityDate->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->AdvanceValidityDate->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->AdvanceValidityDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->AdvanceValidityDate->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->TotalRemainingAdvance) == "") { ?>
		<th class="<?php echo $view_ip_advance->TotalRemainingAdvance->headerCellClass() ?>"><?php echo $view_ip_advance->TotalRemainingAdvance->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->TotalRemainingAdvance->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->TotalRemainingAdvance->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->TotalRemainingAdvance->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->TotalRemainingAdvance->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->TotalRemainingAdvance->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Remarks->Visible) { // Remarks ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->Remarks) == "") { ?>
		<th class="<?php echo $view_ip_advance->Remarks->headerCellClass() ?>"><?php echo $view_ip_advance->Remarks->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->Remarks->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->Remarks->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->Remarks->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->Remarks->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->Remarks->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->SeectPaymentMode) == "") { ?>
		<th class="<?php echo $view_ip_advance->SeectPaymentMode->headerCellClass() ?>"><?php echo $view_ip_advance->SeectPaymentMode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->SeectPaymentMode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->SeectPaymentMode->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->SeectPaymentMode->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->SeectPaymentMode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->SeectPaymentMode->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->PaidAmount) == "") { ?>
		<th class="<?php echo $view_ip_advance->PaidAmount->headerCellClass() ?>"><?php echo $view_ip_advance->PaidAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->PaidAmount->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->PaidAmount->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->PaidAmount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->PaidAmount->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Currency->Visible) { // Currency ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->Currency) == "") { ?>
		<th class="<?php echo $view_ip_advance->Currency->headerCellClass() ?>"><?php echo $view_ip_advance->Currency->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->Currency->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->Currency->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->Currency->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->Currency->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->Currency->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->CardNumber->Visible) { // CardNumber ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->CardNumber) == "") { ?>
		<th class="<?php echo $view_ip_advance->CardNumber->headerCellClass() ?>"><?php echo $view_ip_advance->CardNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->CardNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->CardNumber->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->CardNumber->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->CardNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->CardNumber->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->BankName->Visible) { // BankName ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->BankName) == "") { ?>
		<th class="<?php echo $view_ip_advance->BankName->headerCellClass() ?>"><?php echo $view_ip_advance->BankName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->BankName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->BankName->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->BankName->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->BankName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->BankName->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->HospID) == "") { ?>
		<th class="<?php echo $view_ip_advance->HospID->headerCellClass() ?>"><?php echo $view_ip_advance->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->HospID->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->HospID->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->HospID->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Reception->Visible) { // Reception ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->Reception) == "") { ?>
		<th class="<?php echo $view_ip_advance->Reception->headerCellClass() ?>"><?php echo $view_ip_advance->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->Reception->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->Reception->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->Reception->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->mrnno->Visible) { // mrnno ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance->mrnno) == "") { ?>
		<th class="<?php echo $view_ip_advance->mrnno->headerCellClass() ?>"><?php echo $view_ip_advance->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_ip_advance->mrnno->Name ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance->mrnno->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_ip_advance->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance->mrnno->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_advance_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_ip_advance_preview->RecCount = 0;
$view_ip_advance_preview->RowCnt = 0;
while ($view_ip_advance_preview->Recordset && !$view_ip_advance_preview->Recordset->EOF) {

	// Init row class and style
	$view_ip_advance_preview->RecCount++;
	$view_ip_advance_preview->RowCnt++;
	$view_ip_advance_preview->CssStyle = "";
	$view_ip_advance_preview->loadListRowValues($view_ip_advance_preview->Recordset);

	// Render row
	$view_ip_advance_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_ip_advance_preview->resetAttributes();
	$view_ip_advance_preview->renderListRow();

	// Render list options
	$view_ip_advance_preview->renderListOptions();
?>
	<tr<?php echo $view_ip_advance_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_advance_preview->ListOptions->render("body", "left", $view_ip_advance_preview->RowCnt);
?>
<?php if ($view_ip_advance->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_ip_advance->id->cellAttributes() ?>>
<span<?php echo $view_ip_advance->id->viewAttributes() ?>>
<?php echo $view_ip_advance->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $view_ip_advance->Name->cellAttributes() ?>>
<span<?php echo $view_ip_advance->Name->viewAttributes() ?>>
<?php echo $view_ip_advance->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td<?php echo $view_ip_advance->Mobile->cellAttributes() ?>>
<span<?php echo $view_ip_advance->Mobile->viewAttributes() ?>>
<?php echo $view_ip_advance->Mobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->voucher_type->Visible) { // voucher_type ?>
		<!-- voucher_type -->
		<td<?php echo $view_ip_advance->voucher_type->cellAttributes() ?>>
<span<?php echo $view_ip_advance->voucher_type->viewAttributes() ?>>
<?php echo $view_ip_advance->voucher_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->Details->Visible) { // Details ?>
		<!-- Details -->
		<td<?php echo $view_ip_advance->Details->cellAttributes() ?>>
<span<?php echo $view_ip_advance->Details->viewAttributes() ?>>
<?php echo $view_ip_advance->Details->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td<?php echo $view_ip_advance->ModeofPayment->cellAttributes() ?>>
<span<?php echo $view_ip_advance->ModeofPayment->viewAttributes() ?>>
<?php echo $view_ip_advance->ModeofPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->Amount->Visible) { // Amount ?>
		<!-- Amount -->
		<td<?php echo $view_ip_advance->Amount->cellAttributes() ?>>
<span<?php echo $view_ip_advance->Amount->viewAttributes() ?>>
<?php echo $view_ip_advance->Amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->AnyDues->Visible) { // AnyDues ?>
		<!-- AnyDues -->
		<td<?php echo $view_ip_advance->AnyDues->cellAttributes() ?>>
<span<?php echo $view_ip_advance->AnyDues->viewAttributes() ?>>
<?php echo $view_ip_advance->AnyDues->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_ip_advance->createdby->cellAttributes() ?>>
<span<?php echo $view_ip_advance->createdby->viewAttributes() ?>>
<?php echo $view_ip_advance->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_ip_advance->createddatetime->cellAttributes() ?>>
<span<?php echo $view_ip_advance->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_advance->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_ip_advance->modifiedby->cellAttributes() ?>>
<span<?php echo $view_ip_advance->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_advance->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_ip_advance->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_ip_advance->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_advance->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $view_ip_advance->PatID->cellAttributes() ?>>
<span<?php echo $view_ip_advance->PatID->viewAttributes() ?>>
<?php echo $view_ip_advance->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td<?php echo $view_ip_advance->PatientID->cellAttributes() ?>>
<span<?php echo $view_ip_advance->PatientID->viewAttributes() ?>>
<?php echo $view_ip_advance->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_ip_advance->PatientName->cellAttributes() ?>>
<span<?php echo $view_ip_advance->PatientName->viewAttributes() ?>>
<?php echo $view_ip_advance->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->VisiteType->Visible) { // VisiteType ?>
		<!-- VisiteType -->
		<td<?php echo $view_ip_advance->VisiteType->cellAttributes() ?>>
<span<?php echo $view_ip_advance->VisiteType->viewAttributes() ?>>
<?php echo $view_ip_advance->VisiteType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->VisitDate->Visible) { // VisitDate ?>
		<!-- VisitDate -->
		<td<?php echo $view_ip_advance->VisitDate->cellAttributes() ?>>
<span<?php echo $view_ip_advance->VisitDate->viewAttributes() ?>>
<?php echo $view_ip_advance->VisitDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->AdvanceNo->Visible) { // AdvanceNo ?>
		<!-- AdvanceNo -->
		<td<?php echo $view_ip_advance->AdvanceNo->cellAttributes() ?>>
<span<?php echo $view_ip_advance->AdvanceNo->viewAttributes() ?>>
<?php echo $view_ip_advance->AdvanceNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->Status->Visible) { // Status ?>
		<!-- Status -->
		<td<?php echo $view_ip_advance->Status->cellAttributes() ?>>
<span<?php echo $view_ip_advance->Status->viewAttributes() ?>>
<?php echo $view_ip_advance->Status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->Date->Visible) { // Date ?>
		<!-- Date -->
		<td<?php echo $view_ip_advance->Date->cellAttributes() ?>>
<span<?php echo $view_ip_advance->Date->viewAttributes() ?>>
<?php echo $view_ip_advance->Date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<!-- AdvanceValidityDate -->
		<td<?php echo $view_ip_advance->AdvanceValidityDate->cellAttributes() ?>>
<span<?php echo $view_ip_advance->AdvanceValidityDate->viewAttributes() ?>>
<?php echo $view_ip_advance->AdvanceValidityDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<!-- TotalRemainingAdvance -->
		<td<?php echo $view_ip_advance->TotalRemainingAdvance->cellAttributes() ?>>
<span<?php echo $view_ip_advance->TotalRemainingAdvance->viewAttributes() ?>>
<?php echo $view_ip_advance->TotalRemainingAdvance->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->Remarks->Visible) { // Remarks ?>
		<!-- Remarks -->
		<td<?php echo $view_ip_advance->Remarks->cellAttributes() ?>>
<span<?php echo $view_ip_advance->Remarks->viewAttributes() ?>>
<?php echo $view_ip_advance->Remarks->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<!-- SeectPaymentMode -->
		<td<?php echo $view_ip_advance->SeectPaymentMode->cellAttributes() ?>>
<span<?php echo $view_ip_advance->SeectPaymentMode->viewAttributes() ?>>
<?php echo $view_ip_advance->SeectPaymentMode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->PaidAmount->Visible) { // PaidAmount ?>
		<!-- PaidAmount -->
		<td<?php echo $view_ip_advance->PaidAmount->cellAttributes() ?>>
<span<?php echo $view_ip_advance->PaidAmount->viewAttributes() ?>>
<?php echo $view_ip_advance->PaidAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->Currency->Visible) { // Currency ?>
		<!-- Currency -->
		<td<?php echo $view_ip_advance->Currency->cellAttributes() ?>>
<span<?php echo $view_ip_advance->Currency->viewAttributes() ?>>
<?php echo $view_ip_advance->Currency->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->CardNumber->Visible) { // CardNumber ?>
		<!-- CardNumber -->
		<td<?php echo $view_ip_advance->CardNumber->cellAttributes() ?>>
<span<?php echo $view_ip_advance->CardNumber->viewAttributes() ?>>
<?php echo $view_ip_advance->CardNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->BankName->Visible) { // BankName ?>
		<!-- BankName -->
		<td<?php echo $view_ip_advance->BankName->cellAttributes() ?>>
<span<?php echo $view_ip_advance->BankName->viewAttributes() ?>>
<?php echo $view_ip_advance->BankName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_ip_advance->HospID->cellAttributes() ?>>
<span<?php echo $view_ip_advance->HospID->viewAttributes() ?>>
<?php echo $view_ip_advance->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $view_ip_advance->Reception->cellAttributes() ?>>
<span<?php echo $view_ip_advance->Reception->viewAttributes() ?>>
<?php echo $view_ip_advance->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $view_ip_advance->mrnno->cellAttributes() ?>>
<span<?php echo $view_ip_advance->mrnno->viewAttributes() ?>>
<?php echo $view_ip_advance->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_ip_advance_preview->ListOptions->render("body", "right", $view_ip_advance_preview->RowCnt);
?>
	</tr>
<?php
	$view_ip_advance_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_ip_advance_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_ip_advance_preview->Pager)) $view_ip_advance_preview->Pager = new PrevNextPager($view_ip_advance_preview->StartRec, $view_ip_advance_preview->DisplayRecs, $view_ip_advance_preview->TotalRecs) ?>
<?php if ($view_ip_advance_preview->Pager->RecordCount > 0 && $view_ip_advance_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_ip_advance_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_ip_advance_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_ip_advance_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_ip_advance_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_ip_advance_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_ip_advance_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_ip_advance_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_ip_advance_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_advance_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_advance_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_advance_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_ip_advance_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_ip_advance_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_ip_advance_preview->Recordset)
	$view_ip_advance_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_ip_advance_preview->terminate();
?>