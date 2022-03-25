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
<?php if ($view_ip_advance_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_ip_advance"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_ip_advance_preview->renderListOptions();

// Render list options (header, left)
$view_ip_advance_preview->ListOptions->render("header", "left");
?>
<?php if ($view_ip_advance_preview->id->Visible) { // id ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->id) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->id->headerCellClass() ?>"><?php echo $view_ip_advance_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->id->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->id->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->id->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->Name->Visible) { // Name ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->Name) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->Name->headerCellClass() ?>"><?php echo $view_ip_advance_preview->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->Name->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->Name->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->Name->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->Mobile->Visible) { // Mobile ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->Mobile) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->Mobile->headerCellClass() ?>"><?php echo $view_ip_advance_preview->Mobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->Mobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->Mobile->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->Mobile->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->Mobile->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->voucher_type) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->voucher_type->headerCellClass() ?>"><?php echo $view_ip_advance_preview->voucher_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->voucher_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->voucher_type->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->voucher_type->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->voucher_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->voucher_type->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->Details->Visible) { // Details ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->Details) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->Details->headerCellClass() ?>"><?php echo $view_ip_advance_preview->Details->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->Details->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->Details->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->Details->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->Details->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->Details->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->ModeofPayment) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->ModeofPayment->headerCellClass() ?>"><?php echo $view_ip_advance_preview->ModeofPayment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->ModeofPayment->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->ModeofPayment->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->ModeofPayment->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->Amount->Visible) { // Amount ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->Amount) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->Amount->headerCellClass() ?>"><?php echo $view_ip_advance_preview->Amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->Amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->Amount->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->Amount->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->Amount->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->AnyDues) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->AnyDues->headerCellClass() ?>"><?php echo $view_ip_advance_preview->AnyDues->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->AnyDues->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->AnyDues->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->AnyDues->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->AnyDues->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->AnyDues->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->createdby) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->createdby->headerCellClass() ?>"><?php echo $view_ip_advance_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->createdby->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->createdby->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->createdby->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->createddatetime) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->createddatetime->headerCellClass() ?>"><?php echo $view_ip_advance_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->createddatetime->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->createddatetime->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->modifiedby) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->modifiedby->headerCellClass() ?>"><?php echo $view_ip_advance_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->modifiedby->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->modifiedby->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->modifieddatetime->headerCellClass() ?>"><?php echo $view_ip_advance_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->modifieddatetime->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->modifieddatetime->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->PatID->Visible) { // PatID ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->PatID) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->PatID->headerCellClass() ?>"><?php echo $view_ip_advance_preview->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->PatID->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->PatID->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->PatID->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->PatientID) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->PatientID->headerCellClass() ?>"><?php echo $view_ip_advance_preview->PatientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->PatientID->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->PatientID->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->PatientID->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->PatientName) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->PatientName->headerCellClass() ?>"><?php echo $view_ip_advance_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->PatientName->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->PatientName->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->PatientName->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->VisiteType->Visible) { // VisiteType ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->VisiteType) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->VisiteType->headerCellClass() ?>"><?php echo $view_ip_advance_preview->VisiteType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->VisiteType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->VisiteType->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->VisiteType->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->VisiteType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->VisiteType->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->VisitDate->Visible) { // VisitDate ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->VisitDate) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->VisitDate->headerCellClass() ?>"><?php echo $view_ip_advance_preview->VisitDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->VisitDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->VisitDate->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->VisitDate->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->VisitDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->VisitDate->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->AdvanceNo) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->AdvanceNo->headerCellClass() ?>"><?php echo $view_ip_advance_preview->AdvanceNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->AdvanceNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->AdvanceNo->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->AdvanceNo->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->AdvanceNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->AdvanceNo->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->Status->Visible) { // Status ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->Status) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->Status->headerCellClass() ?>"><?php echo $view_ip_advance_preview->Status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->Status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->Status->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->Status->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->Status->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->Date->Visible) { // Date ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->Date) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->Date->headerCellClass() ?>"><?php echo $view_ip_advance_preview->Date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->Date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->Date->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->Date->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->Date->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->AdvanceValidityDate) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->AdvanceValidityDate->headerCellClass() ?>"><?php echo $view_ip_advance_preview->AdvanceValidityDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->AdvanceValidityDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->AdvanceValidityDate->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->AdvanceValidityDate->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->AdvanceValidityDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->AdvanceValidityDate->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->TotalRemainingAdvance) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->TotalRemainingAdvance->headerCellClass() ?>"><?php echo $view_ip_advance_preview->TotalRemainingAdvance->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->TotalRemainingAdvance->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->TotalRemainingAdvance->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->TotalRemainingAdvance->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->TotalRemainingAdvance->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->TotalRemainingAdvance->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->Remarks->Visible) { // Remarks ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->Remarks) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->Remarks->headerCellClass() ?>"><?php echo $view_ip_advance_preview->Remarks->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->Remarks->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->Remarks->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->Remarks->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->Remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->Remarks->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->SeectPaymentMode) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->SeectPaymentMode->headerCellClass() ?>"><?php echo $view_ip_advance_preview->SeectPaymentMode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->SeectPaymentMode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->SeectPaymentMode->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->SeectPaymentMode->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->SeectPaymentMode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->SeectPaymentMode->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->PaidAmount) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->PaidAmount->headerCellClass() ?>"><?php echo $view_ip_advance_preview->PaidAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->PaidAmount->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->PaidAmount->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->PaidAmount->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->Currency->Visible) { // Currency ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->Currency) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->Currency->headerCellClass() ?>"><?php echo $view_ip_advance_preview->Currency->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->Currency->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->Currency->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->Currency->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->Currency->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->Currency->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->CardNumber->Visible) { // CardNumber ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->CardNumber) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->CardNumber->headerCellClass() ?>"><?php echo $view_ip_advance_preview->CardNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->CardNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->CardNumber->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->CardNumber->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->CardNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->CardNumber->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->BankName->Visible) { // BankName ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->BankName) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->BankName->headerCellClass() ?>"><?php echo $view_ip_advance_preview->BankName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->BankName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->BankName->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->BankName->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->BankName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->BankName->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->HospID) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->HospID->headerCellClass() ?>"><?php echo $view_ip_advance_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->HospID->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->HospID->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->Reception->Visible) { // Reception ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->Reception) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->Reception->headerCellClass() ?>"><?php echo $view_ip_advance_preview->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->Reception->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->Reception->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->Reception->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($view_ip_advance->SortUrl($view_ip_advance_preview->mrnno) == "") { ?>
		<th class="<?php echo $view_ip_advance_preview->mrnno->headerCellClass() ?>"><?php echo $view_ip_advance_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_ip_advance_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_ip_advance_preview->mrnno->Name) ?>" data-sort-order="<?php echo $view_ip_advance_preview->SortField == $view_ip_advance_preview->mrnno->Name && $view_ip_advance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_preview->SortField == $view_ip_advance_preview->mrnno->Name) { ?><?php if ($view_ip_advance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$view_ip_advance_preview->RowCount = 0;
while ($view_ip_advance_preview->Recordset && !$view_ip_advance_preview->Recordset->EOF) {

	// Init row class and style
	$view_ip_advance_preview->RecCount++;
	$view_ip_advance_preview->RowCount++;
	$view_ip_advance_preview->CssStyle = "";
	$view_ip_advance_preview->loadListRowValues($view_ip_advance_preview->Recordset);

	// Render row
	$view_ip_advance->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_ip_advance_preview->resetAttributes();
	$view_ip_advance_preview->renderListRow();

	// Render list options
	$view_ip_advance_preview->renderListOptions();
?>
	<tr <?php echo $view_ip_advance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_advance_preview->ListOptions->render("body", "left", $view_ip_advance_preview->RowCount);
?>
<?php if ($view_ip_advance_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_ip_advance_preview->id->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->id->viewAttributes() ?>><?php echo $view_ip_advance_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $view_ip_advance_preview->Name->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->Name->viewAttributes() ?>><?php echo $view_ip_advance_preview->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td<?php echo $view_ip_advance_preview->Mobile->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->Mobile->viewAttributes() ?>><?php echo $view_ip_advance_preview->Mobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->voucher_type->Visible) { // voucher_type ?>
		<!-- voucher_type -->
		<td<?php echo $view_ip_advance_preview->voucher_type->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->voucher_type->viewAttributes() ?>><?php echo $view_ip_advance_preview->voucher_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->Details->Visible) { // Details ?>
		<!-- Details -->
		<td<?php echo $view_ip_advance_preview->Details->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->Details->viewAttributes() ?>><?php echo $view_ip_advance_preview->Details->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td<?php echo $view_ip_advance_preview->ModeofPayment->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->ModeofPayment->viewAttributes() ?>><?php echo $view_ip_advance_preview->ModeofPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->Amount->Visible) { // Amount ?>
		<!-- Amount -->
		<td<?php echo $view_ip_advance_preview->Amount->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->Amount->viewAttributes() ?>><?php echo $view_ip_advance_preview->Amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->AnyDues->Visible) { // AnyDues ?>
		<!-- AnyDues -->
		<td<?php echo $view_ip_advance_preview->AnyDues->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->AnyDues->viewAttributes() ?>><?php echo $view_ip_advance_preview->AnyDues->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_ip_advance_preview->createdby->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->createdby->viewAttributes() ?>><?php echo $view_ip_advance_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_ip_advance_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->createddatetime->viewAttributes() ?>><?php echo $view_ip_advance_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_ip_advance_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->modifiedby->viewAttributes() ?>><?php echo $view_ip_advance_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_ip_advance_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->modifieddatetime->viewAttributes() ?>><?php echo $view_ip_advance_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $view_ip_advance_preview->PatID->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->PatID->viewAttributes() ?>><?php echo $view_ip_advance_preview->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td<?php echo $view_ip_advance_preview->PatientID->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->PatientID->viewAttributes() ?>><?php echo $view_ip_advance_preview->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_ip_advance_preview->PatientName->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->PatientName->viewAttributes() ?>><?php echo $view_ip_advance_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->VisiteType->Visible) { // VisiteType ?>
		<!-- VisiteType -->
		<td<?php echo $view_ip_advance_preview->VisiteType->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->VisiteType->viewAttributes() ?>><?php echo $view_ip_advance_preview->VisiteType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->VisitDate->Visible) { // VisitDate ?>
		<!-- VisitDate -->
		<td<?php echo $view_ip_advance_preview->VisitDate->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->VisitDate->viewAttributes() ?>><?php echo $view_ip_advance_preview->VisitDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->AdvanceNo->Visible) { // AdvanceNo ?>
		<!-- AdvanceNo -->
		<td<?php echo $view_ip_advance_preview->AdvanceNo->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->AdvanceNo->viewAttributes() ?>><?php echo $view_ip_advance_preview->AdvanceNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->Status->Visible) { // Status ?>
		<!-- Status -->
		<td<?php echo $view_ip_advance_preview->Status->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->Status->viewAttributes() ?>><?php echo $view_ip_advance_preview->Status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->Date->Visible) { // Date ?>
		<!-- Date -->
		<td<?php echo $view_ip_advance_preview->Date->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->Date->viewAttributes() ?>><?php echo $view_ip_advance_preview->Date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<!-- AdvanceValidityDate -->
		<td<?php echo $view_ip_advance_preview->AdvanceValidityDate->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->AdvanceValidityDate->viewAttributes() ?>><?php echo $view_ip_advance_preview->AdvanceValidityDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<!-- TotalRemainingAdvance -->
		<td<?php echo $view_ip_advance_preview->TotalRemainingAdvance->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->TotalRemainingAdvance->viewAttributes() ?>><?php echo $view_ip_advance_preview->TotalRemainingAdvance->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->Remarks->Visible) { // Remarks ?>
		<!-- Remarks -->
		<td<?php echo $view_ip_advance_preview->Remarks->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->Remarks->viewAttributes() ?>><?php echo $view_ip_advance_preview->Remarks->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<!-- SeectPaymentMode -->
		<td<?php echo $view_ip_advance_preview->SeectPaymentMode->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->SeectPaymentMode->viewAttributes() ?>><?php echo $view_ip_advance_preview->SeectPaymentMode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->PaidAmount->Visible) { // PaidAmount ?>
		<!-- PaidAmount -->
		<td<?php echo $view_ip_advance_preview->PaidAmount->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->PaidAmount->viewAttributes() ?>><?php echo $view_ip_advance_preview->PaidAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->Currency->Visible) { // Currency ?>
		<!-- Currency -->
		<td<?php echo $view_ip_advance_preview->Currency->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->Currency->viewAttributes() ?>><?php echo $view_ip_advance_preview->Currency->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->CardNumber->Visible) { // CardNumber ?>
		<!-- CardNumber -->
		<td<?php echo $view_ip_advance_preview->CardNumber->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->CardNumber->viewAttributes() ?>><?php echo $view_ip_advance_preview->CardNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->BankName->Visible) { // BankName ?>
		<!-- BankName -->
		<td<?php echo $view_ip_advance_preview->BankName->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->BankName->viewAttributes() ?>><?php echo $view_ip_advance_preview->BankName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_ip_advance_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->HospID->viewAttributes() ?>><?php echo $view_ip_advance_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $view_ip_advance_preview->Reception->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->Reception->viewAttributes() ?>><?php echo $view_ip_advance_preview->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_ip_advance_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $view_ip_advance_preview->mrnno->cellAttributes() ?>>
<span<?php echo $view_ip_advance_preview->mrnno->viewAttributes() ?>><?php echo $view_ip_advance_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_ip_advance_preview->ListOptions->render("body", "right", $view_ip_advance_preview->RowCount);
?>
	</tr>
<?php
	$view_ip_advance_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_ip_advance_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_ip_advance_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_ip_advance_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_ip_advance_preview->showPageFooter();
if (Config("DEBUG"))
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