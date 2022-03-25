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
<div class="card ew-grid patient_investigations"><!-- .card -->
<?php if ($patient_investigations_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_investigations_preview->renderListOptions();

// Render list options (header, left)
$patient_investigations_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_investigations->id->Visible) { // id ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->id) == "") { ?>
		<th class="<?php echo $patient_investigations->id->headerCellClass() ?>"><?php echo $patient_investigations->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->id->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->id->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->id->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->Investigation) == "") { ?>
		<th class="<?php echo $patient_investigations->Investigation->headerCellClass() ?>"><?php echo $patient_investigations->Investigation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->Investigation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->Investigation->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->Investigation->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->Investigation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->Investigation->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Value->Visible) { // Value ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->Value) == "") { ?>
		<th class="<?php echo $patient_investigations->Value->headerCellClass() ?>"><?php echo $patient_investigations->Value->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->Value->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->Value->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->Value->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->Value->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->Value->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->NormalRange) == "") { ?>
		<th class="<?php echo $patient_investigations->NormalRange->headerCellClass() ?>"><?php echo $patient_investigations->NormalRange->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->NormalRange->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->NormalRange->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->NormalRange->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->NormalRange->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->NormalRange->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->mrnno) == "") { ?>
		<th class="<?php echo $patient_investigations->mrnno->headerCellClass() ?>"><?php echo $patient_investigations->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->mrnno->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->mrnno->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->mrnno->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Age->Visible) { // Age ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->Age) == "") { ?>
		<th class="<?php echo $patient_investigations->Age->headerCellClass() ?>"><?php echo $patient_investigations->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->Age->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->Age->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->Age->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->Gender) == "") { ?>
		<th class="<?php echo $patient_investigations->Gender->headerCellClass() ?>"><?php echo $patient_investigations->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->Gender->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->Gender->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->Gender->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->SampleCollected) == "") { ?>
		<th class="<?php echo $patient_investigations->SampleCollected->headerCellClass() ?>"><?php echo $patient_investigations->SampleCollected->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->SampleCollected->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->SampleCollected->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->SampleCollected->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->SampleCollected->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->SampleCollected->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->SampleCollectedBy) == "") { ?>
		<th class="<?php echo $patient_investigations->SampleCollectedBy->headerCellClass() ?>"><?php echo $patient_investigations->SampleCollectedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->SampleCollectedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->SampleCollectedBy->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->SampleCollectedBy->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->SampleCollectedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->SampleCollectedBy->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->ResultedDate) == "") { ?>
		<th class="<?php echo $patient_investigations->ResultedDate->headerCellClass() ?>"><?php echo $patient_investigations->ResultedDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->ResultedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->ResultedDate->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->ResultedDate->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->ResultedDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->ResultedDate->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->ResultedBy) == "") { ?>
		<th class="<?php echo $patient_investigations->ResultedBy->headerCellClass() ?>"><?php echo $patient_investigations->ResultedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->ResultedBy->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->ResultedBy->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->ResultedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->ResultedBy->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->Modified) == "") { ?>
		<th class="<?php echo $patient_investigations->Modified->headerCellClass() ?>"><?php echo $patient_investigations->Modified->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->Modified->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->Modified->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->Modified->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->Modified->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->Modified->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->ModifiedBy) == "") { ?>
		<th class="<?php echo $patient_investigations->ModifiedBy->headerCellClass() ?>"><?php echo $patient_investigations->ModifiedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->ModifiedBy->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->ModifiedBy->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->ModifiedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->ModifiedBy->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Created->Visible) { // Created ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->Created) == "") { ?>
		<th class="<?php echo $patient_investigations->Created->headerCellClass() ?>"><?php echo $patient_investigations->Created->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->Created->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->Created->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->Created->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->Created->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->Created->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->CreatedBy) == "") { ?>
		<th class="<?php echo $patient_investigations->CreatedBy->headerCellClass() ?>"><?php echo $patient_investigations->CreatedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->CreatedBy->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->CreatedBy->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->CreatedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->CreatedBy->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->GroupHead) == "") { ?>
		<th class="<?php echo $patient_investigations->GroupHead->headerCellClass() ?>"><?php echo $patient_investigations->GroupHead->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->GroupHead->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->GroupHead->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->GroupHead->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->GroupHead->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->GroupHead->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->Cost) == "") { ?>
		<th class="<?php echo $patient_investigations->Cost->headerCellClass() ?>"><?php echo $patient_investigations->Cost->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->Cost->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->Cost->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->Cost->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->Cost->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->Cost->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->PaymentStatus) == "") { ?>
		<th class="<?php echo $patient_investigations->PaymentStatus->headerCellClass() ?>"><?php echo $patient_investigations->PaymentStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->PaymentStatus->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->PaymentStatus->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->PaymentStatus->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->PaymentStatus->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->PayMode) == "") { ?>
		<th class="<?php echo $patient_investigations->PayMode->headerCellClass() ?>"><?php echo $patient_investigations->PayMode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->PayMode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->PayMode->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->PayMode->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->PayMode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->PayMode->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
	<?php if ($patient_investigations->SortUrl($patient_investigations->VoucherNo) == "") { ?>
		<th class="<?php echo $patient_investigations->VoucherNo->headerCellClass() ?>"><?php echo $patient_investigations->VoucherNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_investigations->VoucherNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_investigations->VoucherNo->Name ?>" data-sort-order="<?php echo $patient_investigations_preview->SortField == $patient_investigations->VoucherNo->Name && $patient_investigations_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_investigations->VoucherNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_investigations_preview->SortField == $patient_investigations->VoucherNo->Name) { ?><?php if ($patient_investigations_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_investigations_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$patient_investigations_preview->RowCnt = 0;
while ($patient_investigations_preview->Recordset && !$patient_investigations_preview->Recordset->EOF) {

	// Init row class and style
	$patient_investigations_preview->RecCount++;
	$patient_investigations_preview->RowCnt++;
	$patient_investigations_preview->CssStyle = "";
	$patient_investigations_preview->loadListRowValues($patient_investigations_preview->Recordset);

	// Render row
	$patient_investigations_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_investigations_preview->resetAttributes();
	$patient_investigations_preview->renderListRow();

	// Render list options
	$patient_investigations_preview->renderListOptions();
?>
	<tr<?php echo $patient_investigations_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_investigations_preview->ListOptions->render("body", "left", $patient_investigations_preview->RowCnt);
?>
<?php if ($patient_investigations->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_investigations->id->cellAttributes() ?>>
<span<?php echo $patient_investigations->id->viewAttributes() ?>>
<?php echo $patient_investigations->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
		<!-- Investigation -->
		<td<?php echo $patient_investigations->Investigation->cellAttributes() ?>>
<span<?php echo $patient_investigations->Investigation->viewAttributes() ?>>
<?php echo $patient_investigations->Investigation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->Value->Visible) { // Value ?>
		<!-- Value -->
		<td<?php echo $patient_investigations->Value->cellAttributes() ?>>
<span<?php echo $patient_investigations->Value->viewAttributes() ?>>
<?php echo $patient_investigations->Value->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
		<!-- NormalRange -->
		<td<?php echo $patient_investigations->NormalRange->cellAttributes() ?>>
<span<?php echo $patient_investigations->NormalRange->viewAttributes() ?>>
<?php echo $patient_investigations->NormalRange->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_investigations->mrnno->cellAttributes() ?>>
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<?php echo $patient_investigations->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_investigations->Age->cellAttributes() ?>>
<span<?php echo $patient_investigations->Age->viewAttributes() ?>>
<?php echo $patient_investigations->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_investigations->Gender->cellAttributes() ?>>
<span<?php echo $patient_investigations->Gender->viewAttributes() ?>>
<?php echo $patient_investigations->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
		<!-- SampleCollected -->
		<td<?php echo $patient_investigations->SampleCollected->cellAttributes() ?>>
<span<?php echo $patient_investigations->SampleCollected->viewAttributes() ?>>
<?php echo $patient_investigations->SampleCollected->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<!-- SampleCollectedBy -->
		<td<?php echo $patient_investigations->SampleCollectedBy->cellAttributes() ?>>
<span<?php echo $patient_investigations->SampleCollectedBy->viewAttributes() ?>>
<?php echo $patient_investigations->SampleCollectedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
		<!-- ResultedDate -->
		<td<?php echo $patient_investigations->ResultedDate->cellAttributes() ?>>
<span<?php echo $patient_investigations->ResultedDate->viewAttributes() ?>>
<?php echo $patient_investigations->ResultedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td<?php echo $patient_investigations->ResultedBy->cellAttributes() ?>>
<span<?php echo $patient_investigations->ResultedBy->viewAttributes() ?>>
<?php echo $patient_investigations->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
		<!-- Modified -->
		<td<?php echo $patient_investigations->Modified->cellAttributes() ?>>
<span<?php echo $patient_investigations->Modified->viewAttributes() ?>>
<?php echo $patient_investigations->Modified->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
		<!-- ModifiedBy -->
		<td<?php echo $patient_investigations->ModifiedBy->cellAttributes() ?>>
<span<?php echo $patient_investigations->ModifiedBy->viewAttributes() ?>>
<?php echo $patient_investigations->ModifiedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->Created->Visible) { // Created ?>
		<!-- Created -->
		<td<?php echo $patient_investigations->Created->cellAttributes() ?>>
<span<?php echo $patient_investigations->Created->viewAttributes() ?>>
<?php echo $patient_investigations->Created->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
		<!-- CreatedBy -->
		<td<?php echo $patient_investigations->CreatedBy->cellAttributes() ?>>
<span<?php echo $patient_investigations->CreatedBy->viewAttributes() ?>>
<?php echo $patient_investigations->CreatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
		<!-- GroupHead -->
		<td<?php echo $patient_investigations->GroupHead->cellAttributes() ?>>
<span<?php echo $patient_investigations->GroupHead->viewAttributes() ?>>
<?php echo $patient_investigations->GroupHead->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
		<!-- Cost -->
		<td<?php echo $patient_investigations->Cost->cellAttributes() ?>>
<span<?php echo $patient_investigations->Cost->viewAttributes() ?>>
<?php echo $patient_investigations->Cost->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
		<!-- PaymentStatus -->
		<td<?php echo $patient_investigations->PaymentStatus->cellAttributes() ?>>
<span<?php echo $patient_investigations->PaymentStatus->viewAttributes() ?>>
<?php echo $patient_investigations->PaymentStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
		<!-- PayMode -->
		<td<?php echo $patient_investigations->PayMode->cellAttributes() ?>>
<span<?php echo $patient_investigations->PayMode->viewAttributes() ?>>
<?php echo $patient_investigations->PayMode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
		<!-- VoucherNo -->
		<td<?php echo $patient_investigations->VoucherNo->cellAttributes() ?>>
<span<?php echo $patient_investigations->VoucherNo->viewAttributes() ?>>
<?php echo $patient_investigations->VoucherNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_investigations_preview->ListOptions->render("body", "right", $patient_investigations_preview->RowCnt);
?>
	</tr>
<?php
	$patient_investigations_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_investigations_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_investigations_preview->Pager)) $patient_investigations_preview->Pager = new PrevNextPager($patient_investigations_preview->StartRec, $patient_investigations_preview->DisplayRecs, $patient_investigations_preview->TotalRecs) ?>
<?php if ($patient_investigations_preview->Pager->RecordCount > 0 && $patient_investigations_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_investigations_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_investigations_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_investigations_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_investigations_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_investigations_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_investigations_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_investigations_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_investigations_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_investigations_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_investigations_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_investigations_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_investigations_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_investigations_preview->showPageFooter();
if (DEBUG_ENABLED)
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