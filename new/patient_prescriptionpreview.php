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
<?php if ($patient_prescription_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_prescription"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_prescription_preview->renderListOptions();

// Render list options (header, left)
$patient_prescription_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_prescription_preview->id->Visible) { // id ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->id) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->id->headerCellClass() ?>"><?php echo $patient_prescription_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->id->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->id->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->id->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->Reception->Visible) { // Reception ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->Reception) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->Reception->headerCellClass() ?>"><?php echo $patient_prescription_preview->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->Reception->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->Reception->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->Reception->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->PatientId) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->PatientId->headerCellClass() ?>"><?php echo $patient_prescription_preview->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->PatientId->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->PatientId->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->PatientId->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->PatientName) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->PatientName->headerCellClass() ?>"><?php echo $patient_prescription_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->PatientName->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->PatientName->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->PatientName->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->Medicine->Visible) { // Medicine ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->Medicine) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->Medicine->headerCellClass() ?>"><?php echo $patient_prescription_preview->Medicine->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->Medicine->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->Medicine->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->Medicine->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->Medicine->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->Medicine->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->M->Visible) { // M ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->M) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->M->headerCellClass() ?>"><?php echo $patient_prescription_preview->M->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->M->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->M->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->M->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->M->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->M->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->A->Visible) { // A ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->A) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->A->headerCellClass() ?>"><?php echo $patient_prescription_preview->A->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->A->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->A->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->A->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->A->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->A->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->N->Visible) { // N ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->N) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->N->headerCellClass() ?>"><?php echo $patient_prescription_preview->N->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->N->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->N->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->N->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->N->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->N->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->NoOfDays->Visible) { // NoOfDays ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->NoOfDays) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->NoOfDays->headerCellClass() ?>"><?php echo $patient_prescription_preview->NoOfDays->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->NoOfDays->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->NoOfDays->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->NoOfDays->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->NoOfDays->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->NoOfDays->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->PreRoute->Visible) { // PreRoute ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->PreRoute) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->PreRoute->headerCellClass() ?>"><?php echo $patient_prescription_preview->PreRoute->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->PreRoute->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->PreRoute->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->PreRoute->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->PreRoute->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->PreRoute->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->TimeOfTaking) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->TimeOfTaking->headerCellClass() ?>"><?php echo $patient_prescription_preview->TimeOfTaking->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->TimeOfTaking->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->TimeOfTaking->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->TimeOfTaking->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->TimeOfTaking->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->TimeOfTaking->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->Type->Visible) { // Type ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->Type) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->Type->headerCellClass() ?>"><?php echo $patient_prescription_preview->Type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->Type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->Type->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->Type->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->Type->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->mrnno) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->mrnno->headerCellClass() ?>"><?php echo $patient_prescription_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->mrnno->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->mrnno->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->mrnno->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->Age->Visible) { // Age ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->Age) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->Age->headerCellClass() ?>"><?php echo $patient_prescription_preview->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->Age->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->Age->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->Age->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->Gender->Visible) { // Gender ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->Gender) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->Gender->headerCellClass() ?>"><?php echo $patient_prescription_preview->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->Gender->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->Gender->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->Gender->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->profilePic->Visible) { // profilePic ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->profilePic) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->profilePic->headerCellClass() ?>"><?php echo $patient_prescription_preview->profilePic->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->profilePic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->profilePic->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->profilePic->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->profilePic->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->profilePic->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->Status->Visible) { // Status ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->Status) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->Status->headerCellClass() ?>"><?php echo $patient_prescription_preview->Status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->Status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->Status->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->Status->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->Status->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->CreatedBy) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->CreatedBy->headerCellClass() ?>"><?php echo $patient_prescription_preview->CreatedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->CreatedBy->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->CreatedBy->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->CreatedBy->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->CreateDateTime->Visible) { // CreateDateTime ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->CreateDateTime) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->CreateDateTime->headerCellClass() ?>"><?php echo $patient_prescription_preview->CreateDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->CreateDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->CreateDateTime->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->CreateDateTime->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->CreateDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->CreateDateTime->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->ModifiedBy) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->ModifiedBy->headerCellClass() ?>"><?php echo $patient_prescription_preview->ModifiedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->ModifiedBy->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->ModifiedBy->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->ModifiedBy->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_preview->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($patient_prescription->SortUrl($patient_prescription_preview->ModifiedDateTime) == "") { ?>
		<th class="<?php echo $patient_prescription_preview->ModifiedDateTime->headerCellClass() ?>"><?php echo $patient_prescription_preview->ModifiedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_prescription_preview->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_prescription_preview->ModifiedDateTime->Name) ?>" data-sort-order="<?php echo $patient_prescription_preview->SortField == $patient_prescription_preview->ModifiedDateTime->Name && $patient_prescription_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_preview->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_preview->SortField == $patient_prescription_preview->ModifiedDateTime->Name) { ?><?php if ($patient_prescription_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$patient_prescription_preview->RowCount = 0;
while ($patient_prescription_preview->Recordset && !$patient_prescription_preview->Recordset->EOF) {

	// Init row class and style
	$patient_prescription_preview->RecCount++;
	$patient_prescription_preview->RowCount++;
	$patient_prescription_preview->CssStyle = "";
	$patient_prescription_preview->loadListRowValues($patient_prescription_preview->Recordset);

	// Render row
	$patient_prescription->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_prescription_preview->resetAttributes();
	$patient_prescription_preview->renderListRow();

	// Render list options
	$patient_prescription_preview->renderListOptions();
?>
	<tr <?php echo $patient_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_prescription_preview->ListOptions->render("body", "left", $patient_prescription_preview->RowCount);
?>
<?php if ($patient_prescription_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_prescription_preview->id->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->id->viewAttributes() ?>><?php echo $patient_prescription_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_prescription_preview->Reception->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->Reception->viewAttributes() ?>><?php echo $patient_prescription_preview->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_prescription_preview->PatientId->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->PatientId->viewAttributes() ?>><?php echo $patient_prescription_preview->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_prescription_preview->PatientName->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->PatientName->viewAttributes() ?>><?php echo $patient_prescription_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->Medicine->Visible) { // Medicine ?>
		<!-- Medicine -->
		<td<?php echo $patient_prescription_preview->Medicine->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->Medicine->viewAttributes() ?>><?php echo $patient_prescription_preview->Medicine->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->M->Visible) { // M ?>
		<!-- M -->
		<td<?php echo $patient_prescription_preview->M->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->M->viewAttributes() ?>><?php echo $patient_prescription_preview->M->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->A->Visible) { // A ?>
		<!-- A -->
		<td<?php echo $patient_prescription_preview->A->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->A->viewAttributes() ?>><?php echo $patient_prescription_preview->A->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->N->Visible) { // N ?>
		<!-- N -->
		<td<?php echo $patient_prescription_preview->N->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->N->viewAttributes() ?>><?php echo $patient_prescription_preview->N->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->NoOfDays->Visible) { // NoOfDays ?>
		<!-- NoOfDays -->
		<td<?php echo $patient_prescription_preview->NoOfDays->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->NoOfDays->viewAttributes() ?>><?php echo $patient_prescription_preview->NoOfDays->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->PreRoute->Visible) { // PreRoute ?>
		<!-- PreRoute -->
		<td<?php echo $patient_prescription_preview->PreRoute->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->PreRoute->viewAttributes() ?>><?php echo $patient_prescription_preview->PreRoute->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<!-- TimeOfTaking -->
		<td<?php echo $patient_prescription_preview->TimeOfTaking->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->TimeOfTaking->viewAttributes() ?>><?php echo $patient_prescription_preview->TimeOfTaking->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->Type->Visible) { // Type ?>
		<!-- Type -->
		<td<?php echo $patient_prescription_preview->Type->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->Type->viewAttributes() ?>><?php echo $patient_prescription_preview->Type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_prescription_preview->mrnno->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->mrnno->viewAttributes() ?>><?php echo $patient_prescription_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_prescription_preview->Age->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->Age->viewAttributes() ?>><?php echo $patient_prescription_preview->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_prescription_preview->Gender->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->Gender->viewAttributes() ?>><?php echo $patient_prescription_preview->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->profilePic->Visible) { // profilePic ?>
		<!-- profilePic -->
		<td<?php echo $patient_prescription_preview->profilePic->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->profilePic->viewAttributes() ?>><?php echo $patient_prescription_preview->profilePic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->Status->Visible) { // Status ?>
		<!-- Status -->
		<td<?php echo $patient_prescription_preview->Status->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->Status->viewAttributes() ?>><?php echo $patient_prescription_preview->Status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->CreatedBy->Visible) { // CreatedBy ?>
		<!-- CreatedBy -->
		<td<?php echo $patient_prescription_preview->CreatedBy->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->CreatedBy->viewAttributes() ?>><?php echo $patient_prescription_preview->CreatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->CreateDateTime->Visible) { // CreateDateTime ?>
		<!-- CreateDateTime -->
		<td<?php echo $patient_prescription_preview->CreateDateTime->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->CreateDateTime->viewAttributes() ?>><?php echo $patient_prescription_preview->CreateDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->ModifiedBy->Visible) { // ModifiedBy ?>
		<!-- ModifiedBy -->
		<td<?php echo $patient_prescription_preview->ModifiedBy->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->ModifiedBy->viewAttributes() ?>><?php echo $patient_prescription_preview->ModifiedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_prescription_preview->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<!-- ModifiedDateTime -->
		<td<?php echo $patient_prescription_preview->ModifiedDateTime->cellAttributes() ?>>
<span<?php echo $patient_prescription_preview->ModifiedDateTime->viewAttributes() ?>><?php echo $patient_prescription_preview->ModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_prescription_preview->ListOptions->render("body", "right", $patient_prescription_preview->RowCount);
?>
	</tr>
<?php
	$patient_prescription_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_prescription_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_prescription_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_prescription_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_prescription_preview->showPageFooter();
if (Config("DEBUG"))
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