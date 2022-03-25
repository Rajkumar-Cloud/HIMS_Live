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
$patient_ot_delivery_register_preview = new patient_ot_delivery_register_preview();

// Run the page
$patient_ot_delivery_register_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_delivery_register_preview->Page_Render();
?>
<?php $patient_ot_delivery_register_preview->showPageHeader(); ?>
<div class="card ew-grid patient_ot_delivery_register"><!-- .card -->
<?php if ($patient_ot_delivery_register_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_ot_delivery_register_preview->renderListOptions();

// Render list options (header, left)
$patient_ot_delivery_register_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_ot_delivery_register->id->Visible) { // id ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->id) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->id->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->id->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->id->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->id->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatID->Visible) { // PatID ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->PatID) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->PatID->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->PatID->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->PatID->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->PatID->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->PatientName) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->PatientName->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->PatientName->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->PatientName->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->PatientName->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->mrnno) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->mrnno->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->mrnno->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->mrnno->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->mrnno->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->MobileNumber->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->MobileNumber->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->MobileNumber->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->MobileNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->MobileNumber->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Age->Visible) { // Age ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Age) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->Age->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->Age->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Age->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Age->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Gender->Visible) { // Gender ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Gender) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->Gender->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->Gender->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Gender->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Gender->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ObstetricsHistryFeMale) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ObstetricsHistryFeMale->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ObstetricsHistryFeMale->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Abortion->Visible) { // Abortion ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Abortion) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->Abortion->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->Abortion->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->Abortion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->Abortion->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Abortion->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Abortion->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Abortion->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate->Visible) { // ChildBirthDate ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBirthDate) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthDate->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildBirthDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildBirthDate->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBirthDate->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBirthDate->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime->Visible) { // ChildBirthTime ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBirthTime) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthTime->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildBirthTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildBirthTime->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBirthTime->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBirthTime->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex->Visible) { // ChildSex ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildSex) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildSex->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildSex->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildSex->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildSex->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildSex->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildSex->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildSex->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt->Visible) { // ChildWt ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildWt) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildWt->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildWt->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildWt->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildWt->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildWt->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildWt->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildWt->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay->Visible) { // ChildDay ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildDay) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildDay->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildDay->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildDay->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildDay->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildDay->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildDay->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE->Visible) { // ChildOE ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildOE) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildOE->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildOE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildOE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildOE->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildOE->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildOE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildOE->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp->Visible) { // ChildBlGrp ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBlGrp) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBlGrp->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildBlGrp->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBlGrp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildBlGrp->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBlGrp->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBlGrp->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBlGrp->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore->Visible) { // ApgarScore ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ApgarScore) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ApgarScore->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ApgarScore->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ApgarScore->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ApgarScore->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ApgarScore->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ApgarScore->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ApgarScore->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification->Visible) { // birthnotification ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->birthnotification) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->birthnotification->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->birthnotification->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->birthnotification->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->birthnotification->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->birthnotification->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->birthnotification->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->birthnotification->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno->Visible) { // formno ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->formno) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->formno->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->formno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->formno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->formno->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->formno->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->formno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->formno->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->dte) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->dte->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->dte->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->dte->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->dte->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->dte->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->dte->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->dte->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->motherReligion->Visible) { // motherReligion ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->motherReligion) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->motherReligion->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->motherReligion->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->motherReligion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->motherReligion->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->motherReligion->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->motherReligion->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->motherReligion->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodgroup->Visible) { // bloodgroup ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->bloodgroup) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->bloodgroup->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->bloodgroup->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->bloodgroup->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->bloodgroup->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->bloodgroup->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodgroup->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->bloodgroup->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->status->Visible) { // status ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->status) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->status->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->status->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->status->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->status->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->createdby->Visible) { // createdby ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->createdby) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->createdby->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->createdby->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->createdby->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->createdby->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->createddatetime) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->createddatetime->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->createddatetime->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->createddatetime->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->createddatetime->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->modifiedby) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->modifiedby->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->modifiedby->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->modifiedby->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->modifiedby->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->modifieddatetime->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->modifieddatetime->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->modifieddatetime->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->modifieddatetime->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientID->Visible) { // PatientID ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->PatientID) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->PatientID->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->PatientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->PatientID->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->PatientID->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatientID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->PatientID->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->HospID->Visible) { // HospID ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->HospID) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->HospID->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->HospID->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->HospID->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->HospID->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBirthDate1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthDate1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildBirthDate1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthDate1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildBirthDate1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBirthDate1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthDate1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBirthDate1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBirthTime1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthTime1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildBirthTime1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthTime1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildBirthTime1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBirthTime1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthTime1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBirthTime1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex1->Visible) { // ChildSex1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildSex1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildSex1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildSex1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildSex1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildSex1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildSex1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildSex1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildSex1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt1->Visible) { // ChildWt1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildWt1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildWt1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildWt1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildWt1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildWt1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildWt1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildWt1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildWt1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay1->Visible) { // ChildDay1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildDay1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildDay1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildDay1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildDay1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildDay1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildDay1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildDay1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildDay1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE1->Visible) { // ChildOE1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildOE1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildOE1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildOE1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildOE1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildOE1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildOE1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildOE1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildOE1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBlGrp1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBlGrp1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ChildBlGrp1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBlGrp1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ChildBlGrp1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBlGrp1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBlGrp1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ChildBlGrp1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore1->Visible) { // ApgarScore1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ApgarScore1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ApgarScore1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ApgarScore1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ApgarScore1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ApgarScore1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ApgarScore1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ApgarScore1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ApgarScore1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification1->Visible) { // birthnotification1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->birthnotification1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->birthnotification1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->birthnotification1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->birthnotification1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->birthnotification1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->birthnotification1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->birthnotification1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->birthnotification1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno1->Visible) { // formno1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->formno1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->formno1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->formno1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->formno1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->formno1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->formno1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->formno1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->formno1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecievedTime->Visible) { // RecievedTime ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->RecievedTime) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->RecievedTime->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->RecievedTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->RecievedTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->RecievedTime->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->RecievedTime->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->RecievedTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->RecievedTime->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->AnaesthesiaStarted) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->AnaesthesiaStarted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->AnaesthesiaStarted->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AnaesthesiaStarted->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->AnaesthesiaStarted->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->AnaesthesiaEnded) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->AnaesthesiaEnded->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->AnaesthesiaEnded->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AnaesthesiaEnded->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->AnaesthesiaEnded->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryStarted->Visible) { // surgeryStarted ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->surgeryStarted) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->surgeryStarted->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->surgeryStarted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->surgeryStarted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->surgeryStarted->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->surgeryStarted->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->surgeryStarted->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->surgeryStarted->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryEnded->Visible) { // surgeryEnded ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->surgeryEnded) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->surgeryEnded->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->surgeryEnded->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->surgeryEnded->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->surgeryEnded->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->surgeryEnded->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->surgeryEnded->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->surgeryEnded->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecoveryTime->Visible) { // RecoveryTime ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->RecoveryTime) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->RecoveryTime->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->RecoveryTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->RecoveryTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->RecoveryTime->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->RecoveryTime->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->RecoveryTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->RecoveryTime->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ShiftedTime->Visible) { // ShiftedTime ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ShiftedTime) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ShiftedTime->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ShiftedTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ShiftedTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ShiftedTime->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ShiftedTime->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ShiftedTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ShiftedTime->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Duration->Visible) { // Duration ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Duration) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->Duration->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->Duration->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->Duration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->Duration->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Duration->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Duration->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Duration->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Surgeon->Visible) { // Surgeon ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Surgeon) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->Surgeon->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->Surgeon->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->Surgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->Surgeon->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Surgeon->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Surgeon->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Surgeon->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Anaesthetist) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->Anaesthetist->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->Anaesthetist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->Anaesthetist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->Anaesthetist->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Anaesthetist->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Anaesthetist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Anaesthetist->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->AsstSurgeon1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->AsstSurgeon1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->AsstSurgeon1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->AsstSurgeon1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->AsstSurgeon1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->AsstSurgeon1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AsstSurgeon1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->AsstSurgeon1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->AsstSurgeon2) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->AsstSurgeon2->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->AsstSurgeon2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->AsstSurgeon2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->AsstSurgeon2->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->AsstSurgeon2->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AsstSurgeon2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->AsstSurgeon2->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->paediatric->Visible) { // paediatric ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->paediatric) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->paediatric->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->paediatric->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->paediatric->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->paediatric->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->paediatric->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->paediatric->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->paediatric->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ScrubNurse1) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ScrubNurse1->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ScrubNurse1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ScrubNurse1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ScrubNurse1->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ScrubNurse1->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ScrubNurse1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ScrubNurse1->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ScrubNurse2) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->ScrubNurse2->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->ScrubNurse2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->ScrubNurse2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->ScrubNurse2->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ScrubNurse2->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ScrubNurse2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->ScrubNurse2->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->FloorNurse->Visible) { // FloorNurse ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->FloorNurse) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->FloorNurse->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->FloorNurse->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->FloorNurse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->FloorNurse->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->FloorNurse->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->FloorNurse->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->FloorNurse->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Technician->Visible) { // Technician ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Technician) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->Technician->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->Technician->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->Technician->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->Technician->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Technician->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Technician->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Technician->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->HouseKeeping->Visible) { // HouseKeeping ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->HouseKeeping) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->HouseKeeping->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->HouseKeeping->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->HouseKeeping->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->HouseKeeping->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->HouseKeeping->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->HouseKeeping->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->HouseKeeping->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->countsCheckedMops) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->countsCheckedMops->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->countsCheckedMops->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->countsCheckedMops->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->countsCheckedMops->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->countsCheckedMops->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->countsCheckedMops->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->countsCheckedMops->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->gauze->Visible) { // gauze ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->gauze) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->gauze->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->gauze->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->gauze->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->gauze->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->gauze->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->gauze->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->gauze->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->needles->Visible) { // needles ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->needles) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->needles->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->needles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->needles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->needles->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->needles->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->needles->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->needles->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodloss->Visible) { // bloodloss ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->bloodloss) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->bloodloss->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->bloodloss->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->bloodloss->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->bloodloss->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->bloodloss->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodloss->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->bloodloss->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->bloodtransfusion) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->bloodtransfusion->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->bloodtransfusion->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->bloodtransfusion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->bloodtransfusion->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->bloodtransfusion->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodtransfusion->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->bloodtransfusion->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Reception->Visible) { // Reception ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Reception) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->Reception->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->Reception->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Reception->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->Reception->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PId->Visible) { // PId ?>
	<?php if ($patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->PId) == "") { ?>
		<th class="<?php echo $patient_ot_delivery_register->PId->headerCellClass() ?>"><?php echo $patient_ot_delivery_register->PId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_ot_delivery_register->PId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_ot_delivery_register->PId->Name ?>" data-sort-order="<?php echo $patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->PId->Name && $patient_ot_delivery_register_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_preview->SortField == $patient_ot_delivery_register->PId->Name) { ?><?php if ($patient_ot_delivery_register_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_ot_delivery_register_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_ot_delivery_register_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_ot_delivery_register_preview->RecCount = 0;
$patient_ot_delivery_register_preview->RowCnt = 0;
while ($patient_ot_delivery_register_preview->Recordset && !$patient_ot_delivery_register_preview->Recordset->EOF) {

	// Init row class and style
	$patient_ot_delivery_register_preview->RecCount++;
	$patient_ot_delivery_register_preview->RowCnt++;
	$patient_ot_delivery_register_preview->CssStyle = "";
	$patient_ot_delivery_register_preview->loadListRowValues($patient_ot_delivery_register_preview->Recordset);

	// Render row
	$patient_ot_delivery_register_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_ot_delivery_register_preview->resetAttributes();
	$patient_ot_delivery_register_preview->renderListRow();

	// Render list options
	$patient_ot_delivery_register_preview->renderListOptions();
?>
	<tr<?php echo $patient_ot_delivery_register_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_ot_delivery_register_preview->ListOptions->render("body", "left", $patient_ot_delivery_register_preview->RowCnt);
?>
<?php if ($patient_ot_delivery_register->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_ot_delivery_register->id->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->id->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_ot_delivery_register->PatID->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->PatID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_ot_delivery_register->PatientName->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->PatientName->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_ot_delivery_register->mrnno->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->mrnno->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_ot_delivery_register->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->MobileNumber->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_ot_delivery_register->Age->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->Age->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_ot_delivery_register->Gender->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->Gender->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
		<!-- ObstetricsHistryFeMale -->
		<td<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Abortion->Visible) { // Abortion ?>
		<!-- Abortion -->
		<td<?php echo $patient_ot_delivery_register->Abortion->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->Abortion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Abortion->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate->Visible) { // ChildBirthDate ?>
		<!-- ChildBirthDate -->
		<td<?php echo $patient_ot_delivery_register->ChildBirthDate->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildBirthDate->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime->Visible) { // ChildBirthTime ?>
		<!-- ChildBirthTime -->
		<td<?php echo $patient_ot_delivery_register->ChildBirthTime->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildBirthTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex->Visible) { // ChildSex ?>
		<!-- ChildSex -->
		<td<?php echo $patient_ot_delivery_register->ChildSex->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildSex->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildSex->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt->Visible) { // ChildWt ?>
		<!-- ChildWt -->
		<td<?php echo $patient_ot_delivery_register->ChildWt->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildWt->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildWt->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay->Visible) { // ChildDay ?>
		<!-- ChildDay -->
		<td<?php echo $patient_ot_delivery_register->ChildDay->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildDay->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE->Visible) { // ChildOE ?>
		<!-- ChildOE -->
		<td<?php echo $patient_ot_delivery_register->ChildOE->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildOE->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildOE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp->Visible) { // ChildBlGrp ?>
		<!-- ChildBlGrp -->
		<td<?php echo $patient_ot_delivery_register->ChildBlGrp->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildBlGrp->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBlGrp->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore->Visible) { // ApgarScore ?>
		<!-- ApgarScore -->
		<td<?php echo $patient_ot_delivery_register->ApgarScore->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ApgarScore->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ApgarScore->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification->Visible) { // birthnotification ?>
		<!-- birthnotification -->
		<td<?php echo $patient_ot_delivery_register->birthnotification->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->birthnotification->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->birthnotification->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno->Visible) { // formno ?>
		<!-- formno -->
		<td<?php echo $patient_ot_delivery_register->formno->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->formno->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->formno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
		<!-- dte -->
		<td<?php echo $patient_ot_delivery_register->dte->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->dte->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->dte->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->motherReligion->Visible) { // motherReligion ?>
		<!-- motherReligion -->
		<td<?php echo $patient_ot_delivery_register->motherReligion->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->motherReligion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->motherReligion->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodgroup->Visible) { // bloodgroup ?>
		<!-- bloodgroup -->
		<td<?php echo $patient_ot_delivery_register->bloodgroup->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->bloodgroup->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodgroup->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_ot_delivery_register->status->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->status->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_ot_delivery_register->createdby->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->createdby->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_ot_delivery_register->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->createddatetime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_ot_delivery_register->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->modifiedby->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_ot_delivery_register->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td<?php echo $patient_ot_delivery_register->PatientID->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->PatientID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_ot_delivery_register->HospID->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->HospID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
		<!-- ChildBirthDate1 -->
		<td<?php echo $patient_ot_delivery_register->ChildBirthDate1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildBirthDate1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthDate1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
		<!-- ChildBirthTime1 -->
		<td<?php echo $patient_ot_delivery_register->ChildBirthTime1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildBirthTime1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthTime1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex1->Visible) { // ChildSex1 ?>
		<!-- ChildSex1 -->
		<td<?php echo $patient_ot_delivery_register->ChildSex1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildSex1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildSex1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt1->Visible) { // ChildWt1 ?>
		<!-- ChildWt1 -->
		<td<?php echo $patient_ot_delivery_register->ChildWt1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildWt1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildWt1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay1->Visible) { // ChildDay1 ?>
		<!-- ChildDay1 -->
		<td<?php echo $patient_ot_delivery_register->ChildDay1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildDay1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildDay1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE1->Visible) { // ChildOE1 ?>
		<!-- ChildOE1 -->
		<td<?php echo $patient_ot_delivery_register->ChildOE1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildOE1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildOE1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
		<!-- ChildBlGrp1 -->
		<td<?php echo $patient_ot_delivery_register->ChildBlGrp1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ChildBlGrp1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBlGrp1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore1->Visible) { // ApgarScore1 ?>
		<!-- ApgarScore1 -->
		<td<?php echo $patient_ot_delivery_register->ApgarScore1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ApgarScore1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ApgarScore1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification1->Visible) { // birthnotification1 ?>
		<!-- birthnotification1 -->
		<td<?php echo $patient_ot_delivery_register->birthnotification1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->birthnotification1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->birthnotification1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno1->Visible) { // formno1 ?>
		<!-- formno1 -->
		<td<?php echo $patient_ot_delivery_register->formno1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->formno1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->formno1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecievedTime->Visible) { // RecievedTime ?>
		<!-- RecievedTime -->
		<td<?php echo $patient_ot_delivery_register->RecievedTime->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->RecievedTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->RecievedTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<!-- AnaesthesiaStarted -->
		<td<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<!-- AnaesthesiaEnded -->
		<td<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryStarted->Visible) { // surgeryStarted ?>
		<!-- surgeryStarted -->
		<td<?php echo $patient_ot_delivery_register->surgeryStarted->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->surgeryStarted->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->surgeryStarted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryEnded->Visible) { // surgeryEnded ?>
		<!-- surgeryEnded -->
		<td<?php echo $patient_ot_delivery_register->surgeryEnded->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->surgeryEnded->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->surgeryEnded->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecoveryTime->Visible) { // RecoveryTime ?>
		<!-- RecoveryTime -->
		<td<?php echo $patient_ot_delivery_register->RecoveryTime->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->RecoveryTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->RecoveryTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ShiftedTime->Visible) { // ShiftedTime ?>
		<!-- ShiftedTime -->
		<td<?php echo $patient_ot_delivery_register->ShiftedTime->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ShiftedTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ShiftedTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Duration->Visible) { // Duration ?>
		<!-- Duration -->
		<td<?php echo $patient_ot_delivery_register->Duration->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->Duration->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Duration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Surgeon->Visible) { // Surgeon ?>
		<!-- Surgeon -->
		<td<?php echo $patient_ot_delivery_register->Surgeon->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->Surgeon->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Surgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Anaesthetist->Visible) { // Anaesthetist ?>
		<!-- Anaesthetist -->
		<td<?php echo $patient_ot_delivery_register->Anaesthetist->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->Anaesthetist->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Anaesthetist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<!-- AsstSurgeon1 -->
		<td<?php echo $patient_ot_delivery_register->AsstSurgeon1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->AsstSurgeon1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AsstSurgeon1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<!-- AsstSurgeon2 -->
		<td<?php echo $patient_ot_delivery_register->AsstSurgeon2->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->AsstSurgeon2->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AsstSurgeon2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->paediatric->Visible) { // paediatric ?>
		<!-- paediatric -->
		<td<?php echo $patient_ot_delivery_register->paediatric->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->paediatric->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->paediatric->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<!-- ScrubNurse1 -->
		<td<?php echo $patient_ot_delivery_register->ScrubNurse1->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ScrubNurse1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ScrubNurse1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<!-- ScrubNurse2 -->
		<td<?php echo $patient_ot_delivery_register->ScrubNurse2->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->ScrubNurse2->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ScrubNurse2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->FloorNurse->Visible) { // FloorNurse ?>
		<!-- FloorNurse -->
		<td<?php echo $patient_ot_delivery_register->FloorNurse->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->FloorNurse->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->FloorNurse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Technician->Visible) { // Technician ?>
		<!-- Technician -->
		<td<?php echo $patient_ot_delivery_register->Technician->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->Technician->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Technician->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->HouseKeeping->Visible) { // HouseKeeping ?>
		<!-- HouseKeeping -->
		<td<?php echo $patient_ot_delivery_register->HouseKeeping->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->HouseKeeping->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->HouseKeeping->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<!-- countsCheckedMops -->
		<td<?php echo $patient_ot_delivery_register->countsCheckedMops->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->countsCheckedMops->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->countsCheckedMops->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->gauze->Visible) { // gauze ?>
		<!-- gauze -->
		<td<?php echo $patient_ot_delivery_register->gauze->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->gauze->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->gauze->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->needles->Visible) { // needles ?>
		<!-- needles -->
		<td<?php echo $patient_ot_delivery_register->needles->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->needles->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->needles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodloss->Visible) { // bloodloss ?>
		<!-- bloodloss -->
		<td<?php echo $patient_ot_delivery_register->bloodloss->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->bloodloss->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodloss->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<!-- bloodtransfusion -->
		<td<?php echo $patient_ot_delivery_register->bloodtransfusion->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->bloodtransfusion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodtransfusion->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_ot_delivery_register->Reception->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->Reception->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->PId->Visible) { // PId ?>
		<!-- PId -->
		<td<?php echo $patient_ot_delivery_register->PId->cellAttributes() ?>>
<span<?php echo $patient_ot_delivery_register->PId->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PId->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_ot_delivery_register_preview->ListOptions->render("body", "right", $patient_ot_delivery_register_preview->RowCnt);
?>
	</tr>
<?php
	$patient_ot_delivery_register_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_ot_delivery_register_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_ot_delivery_register_preview->Pager)) $patient_ot_delivery_register_preview->Pager = new PrevNextPager($patient_ot_delivery_register_preview->StartRec, $patient_ot_delivery_register_preview->DisplayRecs, $patient_ot_delivery_register_preview->TotalRecs) ?>
<?php if ($patient_ot_delivery_register_preview->Pager->RecordCount > 0 && $patient_ot_delivery_register_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_ot_delivery_register_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_ot_delivery_register_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_ot_delivery_register_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_ot_delivery_register_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_ot_delivery_register_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_ot_delivery_register_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_ot_delivery_register_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_ot_delivery_register_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_ot_delivery_register_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_ot_delivery_register_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_ot_delivery_register_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_ot_delivery_register_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_ot_delivery_register_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_ot_delivery_register_preview->Recordset)
	$patient_ot_delivery_register_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_ot_delivery_register_preview->terminate();
?>