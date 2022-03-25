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
$patient_prescription_preview = new patient_prescription_preview();

// Run the page
$patient_prescription_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_prescription_preview->Page_Render();
?>
<?php $patient_prescription_preview->showPageHeader(); ?>
<div class="card ew-grid patient_prescription"><!-- .card -->
<?php if ($patient_prescription_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_prescription_preview->renderListOptions();

// Render list options (header, left)
$patient_prescription_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_prescription->id->Visible) { // id ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->id) == "") { ?>
		<th class="<?php echo $patient_prescription->id->headerCellClass() ?>"><?php echo $patient_prescription->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->id->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->id->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->id->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->Reception) == "") { ?>
		<th class="<?php echo $patient_prescription->Reception->headerCellClass() ?>"><?php echo $patient_prescription->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->Reception->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->Reception->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->Reception->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->PatientId) == "") { ?>
		<th class="<?php echo $patient_prescription->PatientId->headerCellClass() ?>"><?php echo $patient_prescription->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->PatientId->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->PatientId->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->PatientId->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->PatientName) == "") { ?>
		<th class="<?php echo $patient_prescription->PatientName->headerCellClass() ?>"><?php echo $patient_prescription->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->PatientName->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->PatientName->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->PatientName->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->Medicine) == "") { ?>
		<th class="<?php echo $patient_prescription->Medicine->headerCellClass() ?>"><?php echo $patient_prescription->Medicine->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->Medicine->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->Medicine->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->Medicine->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->Medicine->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->Medicine->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->M->Visible) { // M ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->M) == "") { ?>
		<th class="<?php echo $patient_prescription->M->headerCellClass() ?>"><?php echo $patient_prescription->M->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->M->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->M->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->M->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->M->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->M->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->A->Visible) { // A ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->A) == "") { ?>
		<th class="<?php echo $patient_prescription->A->headerCellClass() ?>"><?php echo $patient_prescription->A->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->A->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->A->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->A->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->A->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->A->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->N->Visible) { // N ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->N) == "") { ?>
		<th class="<?php echo $patient_prescription->N->headerCellClass() ?>"><?php echo $patient_prescription->N->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->N->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->N->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->N->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->N->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->N->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->NoOfDays) == "") { ?>
		<th class="<?php echo $patient_prescription->NoOfDays->headerCellClass() ?>"><?php echo $patient_prescription->NoOfDays->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->NoOfDays->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->NoOfDays->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->NoOfDays->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->NoOfDays->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->NoOfDays->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->PreRoute) == "") { ?>
		<th class="<?php echo $patient_prescription->PreRoute->headerCellClass() ?>"><?php echo $patient_prescription->PreRoute->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->PreRoute->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->PreRoute->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->PreRoute->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->PreRoute->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->PreRoute->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->TimeOfTaking) == "") { ?>
		<th class="<?php echo $patient_prescription->TimeOfTaking->headerCellClass() ?>"><?php echo $patient_prescription->TimeOfTaking->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->TimeOfTaking->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->TimeOfTaking->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->TimeOfTaking->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->TimeOfTaking->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->TimeOfTaking->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Type->Visible) { // Type ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->Type) == "") { ?>
		<th class="<?php echo $patient_prescription->Type->headerCellClass() ?>"><?php echo $patient_prescription->Type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->Type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->Type->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->Type->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->Type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->Type->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->mrnno) == "") { ?>
		<th class="<?php echo $patient_prescription->mrnno->headerCellClass() ?>"><?php echo $patient_prescription->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->mrnno->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->mrnno->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->mrnno->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Age->Visible) { // Age ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->Age) == "") { ?>
		<th class="<?php echo $patient_prescription->Age->headerCellClass() ?>"><?php echo $patient_prescription->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->Age->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->Age->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->Age->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->Gender) == "") { ?>
		<th class="<?php echo $patient_prescription->Gender->headerCellClass() ?>"><?php echo $patient_prescription->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->Gender->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->Gender->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->Gender->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->profilePic) == "") { ?>
		<th class="<?php echo $patient_prescription->profilePic->headerCellClass() ?>"><?php echo $patient_prescription->profilePic->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->profilePic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->profilePic->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->profilePic->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->profilePic->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->profilePic->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Status->Visible) { // Status ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->Status) == "") { ?>
		<th class="<?php echo $patient_prescription->Status->headerCellClass() ?>"><?php echo $patient_prescription->Status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->Status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->Status->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->Status->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->Status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->Status->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->CreatedBy) == "") { ?>
		<th class="<?php echo $patient_prescription->CreatedBy->headerCellClass() ?>"><?php echo $patient_prescription->CreatedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->CreatedBy->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->CreatedBy->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->CreatedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->CreatedBy->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->CreateDateTime) == "") { ?>
		<th class="<?php echo $patient_prescription->CreateDateTime->headerCellClass() ?>"><?php echo $patient_prescription->CreateDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->CreateDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->CreateDateTime->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->CreateDateTime->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->CreateDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->CreateDateTime->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->ModifiedBy) == "") { ?>
		<th class="<?php echo $patient_prescription->ModifiedBy->headerCellClass() ?>"><?php echo $patient_prescription->ModifiedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->ModifiedBy->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->ModifiedBy->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->ModifiedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->ModifiedBy->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription->ModifiedDateTime) == "") { ?>
		<th class="<?php echo $patient_prescription->ModifiedDateTime->headerCellClass() ?>"><?php echo $patient_prescription->ModifiedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_prescription->ModifiedDateTime->Name ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription->ModifiedDateTime->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_prescription->ModifiedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription->ModifiedDateTime->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_prescription_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_prescription_preview->RecCount = 0;
$patient_prescription_preview->RowCnt = 0;
while ($patient_prescription_preview->Recordset && !$patient_prescription_preview->Recordset->EOF) {

	// Init row class and style
	$patient_prescription_preview->RecCount++;
	$patient_prescription_preview->RowCnt++;
	$patient_prescription_preview->CssStyle = "";
	$patient_prescription_preview->loadListRowValues($patient_prescription_preview->Recordset);

	// Render row
	$patient_prescription_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_prescription_preview->resetAttributes();
	$patient_prescription_preview->renderListRow();

	// Render list options
	$patient_prescription_preview->renderListOptions();
?>
	<tr<?php echo $patient_prescription_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_prescription_preview->ListOptions->render("body", "left", $patient_prescription_preview->RowCnt);
?>
<?php if ($patient_prescription->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_prescription->id->cellAttributes() ?>>
<span<?php echo $patient_prescription->id->viewAttributes() ?>>
<?php echo $patient_prescription->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_prescription->Reception->cellAttributes() ?>>
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<?php echo $patient_prescription->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_prescription->PatientId->cellAttributes() ?>>
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<?php echo $patient_prescription->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_prescription->PatientName->cellAttributes() ?>>
<span<?php echo $patient_prescription->PatientName->viewAttributes() ?>>
<?php echo $patient_prescription->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
		<!-- Medicine -->
		<td<?php echo $patient_prescription->Medicine->cellAttributes() ?>>
<span<?php echo $patient_prescription->Medicine->viewAttributes() ?>>
<?php echo $patient_prescription->Medicine->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->M->Visible) { // M ?>
		<!-- M -->
		<td<?php echo $patient_prescription->M->cellAttributes() ?>>
<span<?php echo $patient_prescription->M->viewAttributes() ?>>
<?php echo $patient_prescription->M->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->A->Visible) { // A ?>
		<!-- A -->
		<td<?php echo $patient_prescription->A->cellAttributes() ?>>
<span<?php echo $patient_prescription->A->viewAttributes() ?>>
<?php echo $patient_prescription->A->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->N->Visible) { // N ?>
		<!-- N -->
		<td<?php echo $patient_prescription->N->cellAttributes() ?>>
<span<?php echo $patient_prescription->N->viewAttributes() ?>>
<?php echo $patient_prescription->N->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<!-- NoOfDays -->
		<td<?php echo $patient_prescription->NoOfDays->cellAttributes() ?>>
<span<?php echo $patient_prescription->NoOfDays->viewAttributes() ?>>
<?php echo $patient_prescription->NoOfDays->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
		<!-- PreRoute -->
		<td<?php echo $patient_prescription->PreRoute->cellAttributes() ?>>
<span<?php echo $patient_prescription->PreRoute->viewAttributes() ?>>
<?php echo $patient_prescription->PreRoute->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<!-- TimeOfTaking -->
		<td<?php echo $patient_prescription->TimeOfTaking->cellAttributes() ?>>
<span<?php echo $patient_prescription->TimeOfTaking->viewAttributes() ?>>
<?php echo $patient_prescription->TimeOfTaking->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->Type->Visible) { // Type ?>
		<!-- Type -->
		<td<?php echo $patient_prescription->Type->cellAttributes() ?>>
<span<?php echo $patient_prescription->Type->viewAttributes() ?>>
<?php echo $patient_prescription->Type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_prescription->mrnno->cellAttributes() ?>>
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<?php echo $patient_prescription->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_prescription->Age->cellAttributes() ?>>
<span<?php echo $patient_prescription->Age->viewAttributes() ?>>
<?php echo $patient_prescription->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_prescription->Gender->cellAttributes() ?>>
<span<?php echo $patient_prescription->Gender->viewAttributes() ?>>
<?php echo $patient_prescription->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
		<!-- profilePic -->
		<td<?php echo $patient_prescription->profilePic->cellAttributes() ?>>
<span<?php echo $patient_prescription->profilePic->viewAttributes() ?>>
<?php echo $patient_prescription->profilePic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->Status->Visible) { // Status ?>
		<!-- Status -->
		<td<?php echo $patient_prescription->Status->cellAttributes() ?>>
<span<?php echo $patient_prescription->Status->viewAttributes() ?>>
<?php echo $patient_prescription->Status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<!-- CreatedBy -->
		<td<?php echo $patient_prescription->CreatedBy->cellAttributes() ?>>
<span<?php echo $patient_prescription->CreatedBy->viewAttributes() ?>>
<?php echo $patient_prescription->CreatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<!-- CreateDateTime -->
		<td<?php echo $patient_prescription->CreateDateTime->cellAttributes() ?>>
<span<?php echo $patient_prescription->CreateDateTime->viewAttributes() ?>>
<?php echo $patient_prescription->CreateDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<!-- ModifiedBy -->
		<td<?php echo $patient_prescription->ModifiedBy->cellAttributes() ?>>
<span<?php echo $patient_prescription->ModifiedBy->viewAttributes() ?>>
<?php echo $patient_prescription->ModifiedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<!-- ModifiedDateTime -->
		<td<?php echo $patient_prescription->ModifiedDateTime->cellAttributes() ?>>
<span<?php echo $patient_prescription->ModifiedDateTime->viewAttributes() ?>>
<?php echo $patient_prescription->ModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_prescription_preview->ListOptions->render("body", "right", $patient_prescription_preview->RowCnt);
?>
	</tr>
<?php
	$patient_prescription_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_prescription_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_prescription_preview->Pager)) $patient_prescription_preview->Pager = new PrevNextPager($patient_prescription_preview->StartRec, $patient_prescription_preview->DisplayRecs, $patient_prescription_preview->TotalRecs) ?>
<?php if ($patient_prescription_preview->Pager->RecordCount > 0 && $patient_prescription_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_prescription_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_prescription_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_prescription_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_prescription_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_prescription_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_prescription_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_prescription_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_prescription_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_prescription_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_prescription_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_prescription_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_prescription_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_prescription_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_prescription_preview->Recordset)
	$patient_prescription_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_prescription_preview->terminate();
?>