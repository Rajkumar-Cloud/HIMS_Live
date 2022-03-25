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
$patient_investigations_preview = new patient_investigations_preview();

// Run the page
$patient_investigations_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_investigations_preview->Page_Render();
?>
<?php $patient_investigations_preview->showPageHeader(); ?>
<?php if ($patient_investigations_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_investigations"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_investigations_preview->renderListOptions();

// Render list options (header, left)
$patient_investigations_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_investigations_preview->id->Visible) { // id ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->id) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->id->headerCellClass() ?>"><?php echo $patient_investigations_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->id->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->id->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->id->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->Investigation->Visible) { // Investigation ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->Investigation) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->Investigation->headerCellClass() ?>"><?php echo $patient_investigations_preview->Investigation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->Investigation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->Investigation->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->Investigation->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->Investigation->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->Investigation->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->Value->Visible) { // Value ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->Value) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->Value->headerCellClass() ?>"><?php echo $patient_investigations_preview->Value->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->Value->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->Value->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->Value->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->Value->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->Value->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->NormalRange->Visible) { // NormalRange ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->NormalRange) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->NormalRange->headerCellClass() ?>"><?php echo $patient_investigations_preview->NormalRange->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->NormalRange->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->NormalRange->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->NormalRange->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->NormalRange->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->NormalRange->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->mrnno) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->mrnno->headerCellClass() ?>"><?php echo $patient_investigations_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->mrnno->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->mrnno->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->mrnno->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->Age->Visible) { // Age ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->Age) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->Age->headerCellClass() ?>"><?php echo $patient_investigations_preview->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->Age->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->Age->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->Age->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->Gender->Visible) { // Gender ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->Gender) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->Gender->headerCellClass() ?>"><?php echo $patient_investigations_preview->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->Gender->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->Gender->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->Gender->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->SampleCollected->Visible) { // SampleCollected ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->SampleCollected) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->SampleCollected->headerCellClass() ?>"><?php echo $patient_investigations_preview->SampleCollected->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->SampleCollected->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->SampleCollected->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->SampleCollected->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->SampleCollected->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->SampleCollected->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->SampleCollectedBy) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->SampleCollectedBy->headerCellClass() ?>"><?php echo $patient_investigations_preview->SampleCollectedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->SampleCollectedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->SampleCollectedBy->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->SampleCollectedBy->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->SampleCollectedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->SampleCollectedBy->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->ResultedDate->Visible) { // ResultedDate ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->ResultedDate) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->ResultedDate->headerCellClass() ?>"><?php echo $patient_investigations_preview->ResultedDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->ResultedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->ResultedDate->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->ResultedDate->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->ResultedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->ResultedDate->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->ResultedBy) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->ResultedBy->headerCellClass() ?>"><?php echo $patient_investigations_preview->ResultedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->ResultedBy->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->ResultedBy->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->ResultedBy->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->Modified->Visible) { // Modified ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->Modified) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->Modified->headerCellClass() ?>"><?php echo $patient_investigations_preview->Modified->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->Modified->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->Modified->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->Modified->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->Modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->Modified->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->ModifiedBy) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->ModifiedBy->headerCellClass() ?>"><?php echo $patient_investigations_preview->ModifiedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->ModifiedBy->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->ModifiedBy->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->ModifiedBy->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->Created->Visible) { // Created ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->Created) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->Created->headerCellClass() ?>"><?php echo $patient_investigations_preview->Created->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->Created->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->Created->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->Created->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->Created->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->CreatedBy) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->CreatedBy->headerCellClass() ?>"><?php echo $patient_investigations_preview->CreatedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->CreatedBy->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->CreatedBy->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->CreatedBy->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->GroupHead->Visible) { // GroupHead ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->GroupHead) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->GroupHead->headerCellClass() ?>"><?php echo $patient_investigations_preview->GroupHead->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->GroupHead->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->GroupHead->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->GroupHead->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->GroupHead->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->GroupHead->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->Cost->Visible) { // Cost ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->Cost) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->Cost->headerCellClass() ?>"><?php echo $patient_investigations_preview->Cost->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->Cost->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->Cost->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->Cost->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->Cost->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->Cost->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->PaymentStatus) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->PaymentStatus->headerCellClass() ?>"><?php echo $patient_investigations_preview->PaymentStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->PaymentStatus->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->PaymentStatus->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->PaymentStatus->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->PayMode->Visible) { // PayMode ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->PayMode) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->PayMode->headerCellClass() ?>"><?php echo $patient_investigations_preview->PayMode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->PayMode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->PayMode->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->PayMode->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->PayMode->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->PayMode->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_preview->VoucherNo->Visible) { // VoucherNo ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations_preview->VoucherNo) == "") { ?>
		<th class="<?php echo $patient_investigations_preview->VoucherNo->headerCellClass() ?>"><?php echo $patient_investigations_preview->VoucherNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations_preview->VoucherNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_investigations_preview->VoucherNo->Name) ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations_preview->VoucherNo->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_preview->VoucherNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations_preview->VoucherNo->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_investigations_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_investigations_preview->RecCount = 0;
$patient_investigations_preview->RowCount = 0;
while ($patient_investigations_preview->Recordset && !$patient_investigations_preview->Recordset->EOF) {

	// Init row class and style
	$patient_investigations_preview->RecCount++;
	$patient_investigations_preview->RowCount++;
	$patient_investigations_preview->CssStyle = "";
	$patient_investigations_preview->loadListRowValues($patient_investigations_preview->Recordset);

	// Render row
	$patient_investigations->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_investigations_preview->resetAttributes();
	$patient_investigations_preview->renderListRow();

	// Render list options
	$patient_investigations_preview->renderListOptions();
?>
	<tr <?php echo $patient_investigations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_investigations_preview->ListOptions->render("body", "left", $patient_investigations_preview->RowCount);
?>
<?php if ($patient_investigations_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_investigations_preview->id->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->id->viewAttributes() ?>><?php echo $patient_investigations_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->Investigation->Visible) { // Investigation ?>
		<!-- Investigation -->
		<td<?php echo $patient_investigations_preview->Investigation->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->Investigation->viewAttributes() ?>><?php echo $patient_investigations_preview->Investigation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->Value->Visible) { // Value ?>
		<!-- Value -->
		<td<?php echo $patient_investigations_preview->Value->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->Value->viewAttributes() ?>><?php echo $patient_investigations_preview->Value->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->NormalRange->Visible) { // NormalRange ?>
		<!-- NormalRange -->
		<td<?php echo $patient_investigations_preview->NormalRange->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->NormalRange->viewAttributes() ?>><?php echo $patient_investigations_preview->NormalRange->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_investigations_preview->mrnno->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->mrnno->viewAttributes() ?>><?php echo $patient_investigations_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_investigations_preview->Age->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->Age->viewAttributes() ?>><?php echo $patient_investigations_preview->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_investigations_preview->Gender->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->Gender->viewAttributes() ?>><?php echo $patient_investigations_preview->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->SampleCollected->Visible) { // SampleCollected ?>
		<!-- SampleCollected -->
		<td<?php echo $patient_investigations_preview->SampleCollected->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->SampleCollected->viewAttributes() ?>><?php echo $patient_investigations_preview->SampleCollected->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<!-- SampleCollectedBy -->
		<td<?php echo $patient_investigations_preview->SampleCollectedBy->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->SampleCollectedBy->viewAttributes() ?>><?php echo $patient_investigations_preview->SampleCollectedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->ResultedDate->Visible) { // ResultedDate ?>
		<!-- ResultedDate -->
		<td<?php echo $patient_investigations_preview->ResultedDate->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->ResultedDate->viewAttributes() ?>><?php echo $patient_investigations_preview->ResultedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td<?php echo $patient_investigations_preview->ResultedBy->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->ResultedBy->viewAttributes() ?>><?php echo $patient_investigations_preview->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->Modified->Visible) { // Modified ?>
		<!-- Modified -->
		<td<?php echo $patient_investigations_preview->Modified->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->Modified->viewAttributes() ?>><?php echo $patient_investigations_preview->Modified->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->ModifiedBy->Visible) { // ModifiedBy ?>
		<!-- ModifiedBy -->
		<td<?php echo $patient_investigations_preview->ModifiedBy->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->ModifiedBy->viewAttributes() ?>><?php echo $patient_investigations_preview->ModifiedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->Created->Visible) { // Created ?>
		<!-- Created -->
		<td<?php echo $patient_investigations_preview->Created->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->Created->viewAttributes() ?>><?php echo $patient_investigations_preview->Created->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->CreatedBy->Visible) { // CreatedBy ?>
		<!-- CreatedBy -->
		<td<?php echo $patient_investigations_preview->CreatedBy->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->CreatedBy->viewAttributes() ?>><?php echo $patient_investigations_preview->CreatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->GroupHead->Visible) { // GroupHead ?>
		<!-- GroupHead -->
		<td<?php echo $patient_investigations_preview->GroupHead->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->GroupHead->viewAttributes() ?>><?php echo $patient_investigations_preview->GroupHead->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->Cost->Visible) { // Cost ?>
		<!-- Cost -->
		<td<?php echo $patient_investigations_preview->Cost->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->Cost->viewAttributes() ?>><?php echo $patient_investigations_preview->Cost->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->PaymentStatus->Visible) { // PaymentStatus ?>
		<!-- PaymentStatus -->
		<td<?php echo $patient_investigations_preview->PaymentStatus->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->PaymentStatus->viewAttributes() ?>><?php echo $patient_investigations_preview->PaymentStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->PayMode->Visible) { // PayMode ?>
		<!-- PayMode -->
		<td<?php echo $patient_investigations_preview->PayMode->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->PayMode->viewAttributes() ?>><?php echo $patient_investigations_preview->PayMode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations_preview->VoucherNo->Visible) { // VoucherNo ?>
		<!-- VoucherNo -->
		<td<?php echo $patient_investigations_preview->VoucherNo->cellAttributes() ?>>
<span<?php echo $patient_investigations_preview->VoucherNo->viewAttributes() ?>><?php echo $patient_investigations_preview->VoucherNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_investigations_preview->ListOptions->render("body", "right", $patient_investigations_preview->RowCount);
?>
	</tr>
<?php
	$patient_investigations_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_investigations_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_investigations_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_investigations_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_investigations_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($patient_investigations_preview->Recordset)
	$patient_investigations_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_investigations_preview->terminate();
?>