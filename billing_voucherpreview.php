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
$billing_voucher_preview = new billing_voucher_preview();

// Run the page
$billing_voucher_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_voucher_preview->Page_Render();
?>
<?php $billing_voucher_preview->showPageHeader(); ?>
<div class="card ew-grid billing_voucher"><!-- .card -->
<?php if ($billing_voucher_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$billing_voucher_preview->renderListOptions();

// Render list options (header, left)
$billing_voucher_preview->ListOptions->render("header", "left");
?>
<?php if ($billing_voucher->id->Visible) { // id ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->id) == "") { ?>
		<th class="<?php echo $billing_voucher->id->headerCellClass() ?>"><?php echo $billing_voucher->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->id->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->id->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->id->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Reception->Visible) { // Reception ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->Reception) == "") { ?>
		<th class="<?php echo $billing_voucher->Reception->headerCellClass() ?>"><?php echo $billing_voucher->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->Reception->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->Reception->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->Reception->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->PatientId) == "") { ?>
		<th class="<?php echo $billing_voucher->PatientId->headerCellClass() ?>"><?php echo $billing_voucher->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->PatientId->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->PatientId->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->PatientId->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->mrnno->Visible) { // mrnno ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->mrnno) == "") { ?>
		<th class="<?php echo $billing_voucher->mrnno->headerCellClass() ?>"><?php echo $billing_voucher->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->mrnno->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->mrnno->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->mrnno->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->PatientName) == "") { ?>
		<th class="<?php echo $billing_voucher->PatientName->headerCellClass() ?>"><?php echo $billing_voucher->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->PatientName->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->PatientName->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->PatientName->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Age->Visible) { // Age ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->Age) == "") { ?>
		<th class="<?php echo $billing_voucher->Age->headerCellClass() ?>"><?php echo $billing_voucher->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->Age->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->Age->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->Age->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->Gender) == "") { ?>
		<th class="<?php echo $billing_voucher->Gender->headerCellClass() ?>"><?php echo $billing_voucher->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->Gender->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->Gender->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->Gender->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->Mobile) == "") { ?>
		<th class="<?php echo $billing_voucher->Mobile->headerCellClass() ?>"><?php echo $billing_voucher->Mobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->Mobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->Mobile->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->Mobile->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->Mobile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->Mobile->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->IP_OP->Visible) { // IP_OP ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->IP_OP) == "") { ?>
		<th class="<?php echo $billing_voucher->IP_OP->headerCellClass() ?>"><?php echo $billing_voucher->IP_OP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->IP_OP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->IP_OP->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->IP_OP->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->IP_OP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->IP_OP->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->Doctor) == "") { ?>
		<th class="<?php echo $billing_voucher->Doctor->headerCellClass() ?>"><?php echo $billing_voucher->Doctor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->Doctor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->Doctor->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->Doctor->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->Doctor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->Doctor->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->voucher_type->Visible) { // voucher_type ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->voucher_type) == "") { ?>
		<th class="<?php echo $billing_voucher->voucher_type->headerCellClass() ?>"><?php echo $billing_voucher->voucher_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->voucher_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->voucher_type->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->voucher_type->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->voucher_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->voucher_type->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Details->Visible) { // Details ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->Details) == "") { ?>
		<th class="<?php echo $billing_voucher->Details->headerCellClass() ?>"><?php echo $billing_voucher->Details->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->Details->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->Details->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->Details->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->Details->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->Details->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->ModeofPayment) == "") { ?>
		<th class="<?php echo $billing_voucher->ModeofPayment->headerCellClass() ?>"><?php echo $billing_voucher->ModeofPayment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->ModeofPayment->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->ModeofPayment->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->ModeofPayment->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->ModeofPayment->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->Amount) == "") { ?>
		<th class="<?php echo $billing_voucher->Amount->headerCellClass() ?>"><?php echo $billing_voucher->Amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->Amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->Amount->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->Amount->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->Amount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->Amount->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->AnyDues) == "") { ?>
		<th class="<?php echo $billing_voucher->AnyDues->headerCellClass() ?>"><?php echo $billing_voucher->AnyDues->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->AnyDues->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->AnyDues->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->AnyDues->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->AnyDues->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->AnyDues->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->createdby) == "") { ?>
		<th class="<?php echo $billing_voucher->createdby->headerCellClass() ?>"><?php echo $billing_voucher->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->createdby->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->createdby->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->createdby->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->createddatetime) == "") { ?>
		<th class="<?php echo $billing_voucher->createddatetime->headerCellClass() ?>"><?php echo $billing_voucher->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->createddatetime->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->createddatetime->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->createddatetime->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->modifiedby) == "") { ?>
		<th class="<?php echo $billing_voucher->modifiedby->headerCellClass() ?>"><?php echo $billing_voucher->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->modifiedby->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->modifiedby->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->modifiedby->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->modifieddatetime) == "") { ?>
		<th class="<?php echo $billing_voucher->modifieddatetime->headerCellClass() ?>"><?php echo $billing_voucher->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->modifieddatetime->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->modifieddatetime->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->modifieddatetime->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->RealizationAmount) == "") { ?>
		<th class="<?php echo $billing_voucher->RealizationAmount->headerCellClass() ?>"><?php echo $billing_voucher->RealizationAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->RealizationAmount->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->RealizationAmount->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->RealizationAmount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->RealizationAmount->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->RealizationStatus) == "") { ?>
		<th class="<?php echo $billing_voucher->RealizationStatus->headerCellClass() ?>"><?php echo $billing_voucher->RealizationStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->RealizationStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->RealizationStatus->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->RealizationStatus->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->RealizationStatus->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->RealizationStatus->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->RealizationRemarks) == "") { ?>
		<th class="<?php echo $billing_voucher->RealizationRemarks->headerCellClass() ?>"><?php echo $billing_voucher->RealizationRemarks->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->RealizationRemarks->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->RealizationRemarks->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->RealizationRemarks->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->RealizationRemarks->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->RealizationRemarks->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->RealizationBatchNo) == "") { ?>
		<th class="<?php echo $billing_voucher->RealizationBatchNo->headerCellClass() ?>"><?php echo $billing_voucher->RealizationBatchNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->RealizationBatchNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->RealizationBatchNo->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->RealizationBatchNo->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->RealizationBatchNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->RealizationBatchNo->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->RealizationDate) == "") { ?>
		<th class="<?php echo $billing_voucher->RealizationDate->headerCellClass() ?>"><?php echo $billing_voucher->RealizationDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->RealizationDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->RealizationDate->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->RealizationDate->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->RealizationDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->RealizationDate->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->HospID) == "") { ?>
		<th class="<?php echo $billing_voucher->HospID->headerCellClass() ?>"><?php echo $billing_voucher->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->HospID->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->HospID->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->HospID->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->RIDNO) == "") { ?>
		<th class="<?php echo $billing_voucher->RIDNO->headerCellClass() ?>"><?php echo $billing_voucher->RIDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->RIDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->RIDNO->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->RIDNO->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->RIDNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->RIDNO->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
	<?php if ($billing_voucher->SortUrl($billing_voucher->TidNo) == "") { ?>
		<th class="<?php echo $billing_voucher->TidNo->headerCellClass() ?>"><?php echo $billing_voucher->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $billing_voucher->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $billing_voucher->TidNo->Name ?>" data-sort-order="<?php echo $billing_voucher_preview->SortField == $billing_voucher->TidNo->Name && $billing_voucher_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $billing_voucher->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($billing_voucher_preview->SortField == $billing_voucher->TidNo->Name) { ?><?php if ($billing_voucher_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($billing_voucher_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$billing_voucher_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$billing_voucher_preview->RecCount = 0;
$billing_voucher_preview->RowCnt = 0;
while ($billing_voucher_preview->Recordset && !$billing_voucher_preview->Recordset->EOF) {

	// Init row class and style
	$billing_voucher_preview->RecCount++;
	$billing_voucher_preview->RowCnt++;
	$billing_voucher_preview->CssStyle = "";
	$billing_voucher_preview->loadListRowValues($billing_voucher_preview->Recordset);

	// Render row
	$billing_voucher_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$billing_voucher_preview->resetAttributes();
	$billing_voucher_preview->renderListRow();

	// Render list options
	$billing_voucher_preview->renderListOptions();
?>
	<tr<?php echo $billing_voucher_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_voucher_preview->ListOptions->render("body", "left", $billing_voucher_preview->RowCnt);
?>
<?php if ($billing_voucher->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $billing_voucher->id->cellAttributes() ?>>
<span<?php echo $billing_voucher->id->viewAttributes() ?>>
<?php echo $billing_voucher->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $billing_voucher->Reception->cellAttributes() ?>>
<script id="orig_billing_voucher_Reception" class="billing_voucherview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->Reception, $billing_voucher->Reception->getViewValue()) ?>
</script>
<span><?php echo Barcode()->show($billing_voucher->Reception->CurrentValue, 'QRCODE', 60) ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $billing_voucher->PatientId->cellAttributes() ?>>
<script id="orig_billing_voucher_PatientId" class="billing_voucherview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->getViewValue()) ?>
</script>
<span><?php echo Barcode()->show($billing_voucher->PatientId->CurrentValue, 'CODE128', 40) ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $billing_voucher->mrnno->cellAttributes() ?>>
<span<?php echo $billing_voucher->mrnno->viewAttributes() ?>>
<?php echo $billing_voucher->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $billing_voucher->PatientName->cellAttributes() ?>>
<span<?php echo $billing_voucher->PatientName->viewAttributes() ?>>
<?php echo $billing_voucher->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $billing_voucher->Age->cellAttributes() ?>>
<span<?php echo $billing_voucher->Age->viewAttributes() ?>>
<?php echo $billing_voucher->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $billing_voucher->Gender->cellAttributes() ?>>
<span<?php echo $billing_voucher->Gender->viewAttributes() ?>>
<?php echo $billing_voucher->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td<?php echo $billing_voucher->Mobile->cellAttributes() ?>>
<span<?php echo $billing_voucher->Mobile->viewAttributes() ?>>
<?php echo $billing_voucher->Mobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->IP_OP->Visible) { // IP_OP ?>
		<!-- IP_OP -->
		<td<?php echo $billing_voucher->IP_OP->cellAttributes() ?>>
<span<?php echo $billing_voucher->IP_OP->viewAttributes() ?>>
<?php echo $billing_voucher->IP_OP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
		<!-- Doctor -->
		<td<?php echo $billing_voucher->Doctor->cellAttributes() ?>>
<span<?php echo $billing_voucher->Doctor->viewAttributes() ?>>
<?php echo $billing_voucher->Doctor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->voucher_type->Visible) { // voucher_type ?>
		<!-- voucher_type -->
		<td<?php echo $billing_voucher->voucher_type->cellAttributes() ?>>
<span<?php echo $billing_voucher->voucher_type->viewAttributes() ?>>
<?php echo $billing_voucher->voucher_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->Details->Visible) { // Details ?>
		<!-- Details -->
		<td<?php echo $billing_voucher->Details->cellAttributes() ?>>
<span<?php echo $billing_voucher->Details->viewAttributes() ?>>
<?php echo $billing_voucher->Details->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td<?php echo $billing_voucher->ModeofPayment->cellAttributes() ?>>
<span<?php echo $billing_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $billing_voucher->ModeofPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
		<!-- Amount -->
		<td<?php echo $billing_voucher->Amount->cellAttributes() ?>>
<span<?php echo $billing_voucher->Amount->viewAttributes() ?>>
<?php echo $billing_voucher->Amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<!-- AnyDues -->
		<td<?php echo $billing_voucher->AnyDues->cellAttributes() ?>>
<span<?php echo $billing_voucher->AnyDues->viewAttributes() ?>>
<?php echo $billing_voucher->AnyDues->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $billing_voucher->createdby->cellAttributes() ?>>
<span<?php echo $billing_voucher->createdby->viewAttributes() ?>>
<?php echo $billing_voucher->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $billing_voucher->createddatetime->cellAttributes() ?>>
<span<?php echo $billing_voucher->createddatetime->viewAttributes() ?>>
<?php echo $billing_voucher->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $billing_voucher->modifiedby->cellAttributes() ?>>
<span<?php echo $billing_voucher->modifiedby->viewAttributes() ?>>
<?php echo $billing_voucher->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $billing_voucher->modifieddatetime->cellAttributes() ?>>
<span<?php echo $billing_voucher->modifieddatetime->viewAttributes() ?>>
<?php echo $billing_voucher->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
		<!-- RealizationAmount -->
		<td<?php echo $billing_voucher->RealizationAmount->cellAttributes() ?>>
<span<?php echo $billing_voucher->RealizationAmount->viewAttributes() ?>>
<?php echo $billing_voucher->RealizationAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
		<!-- RealizationStatus -->
		<td<?php echo $billing_voucher->RealizationStatus->cellAttributes() ?>>
<span<?php echo $billing_voucher->RealizationStatus->viewAttributes() ?>>
<?php echo $billing_voucher->RealizationStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<!-- RealizationRemarks -->
		<td<?php echo $billing_voucher->RealizationRemarks->cellAttributes() ?>>
<span<?php echo $billing_voucher->RealizationRemarks->viewAttributes() ?>>
<?php echo $billing_voucher->RealizationRemarks->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<!-- RealizationBatchNo -->
		<td<?php echo $billing_voucher->RealizationBatchNo->cellAttributes() ?>>
<span<?php echo $billing_voucher->RealizationBatchNo->viewAttributes() ?>>
<?php echo $billing_voucher->RealizationBatchNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
		<!-- RealizationDate -->
		<td<?php echo $billing_voucher->RealizationDate->cellAttributes() ?>>
<span<?php echo $billing_voucher->RealizationDate->viewAttributes() ?>>
<?php echo $billing_voucher->RealizationDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $billing_voucher->HospID->cellAttributes() ?>>
<span<?php echo $billing_voucher->HospID->viewAttributes() ?>>
<?php echo $billing_voucher->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
		<!-- RIDNO -->
		<td<?php echo $billing_voucher->RIDNO->cellAttributes() ?>>
<span<?php echo $billing_voucher->RIDNO->viewAttributes() ?>>
<?php echo $billing_voucher->RIDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $billing_voucher->TidNo->cellAttributes() ?>>
<span<?php echo $billing_voucher->TidNo->viewAttributes() ?>>
<?php echo $billing_voucher->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$billing_voucher_preview->ListOptions->render("body", "right", $billing_voucher_preview->RowCnt);
?>
	</tr>
<?php
	$billing_voucher_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($billing_voucher_preview->TotalRecs > 0) { ?>
<?php if (!isset($billing_voucher_preview->Pager)) $billing_voucher_preview->Pager = new PrevNextPager($billing_voucher_preview->StartRec, $billing_voucher_preview->DisplayRecs, $billing_voucher_preview->TotalRecs) ?>
<?php if ($billing_voucher_preview->Pager->RecordCount > 0 && $billing_voucher_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($billing_voucher_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $billing_voucher_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($billing_voucher_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $billing_voucher_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($billing_voucher_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $billing_voucher_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($billing_voucher_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $billing_voucher_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $billing_voucher_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $billing_voucher_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $billing_voucher_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($billing_voucher_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$billing_voucher_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($billing_voucher_preview->Recordset)
	$billing_voucher_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$billing_voucher_preview->terminate();
?>