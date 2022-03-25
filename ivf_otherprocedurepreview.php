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
$ivf_otherprocedure_preview = new ivf_otherprocedure_preview();

// Run the page
$ivf_otherprocedure_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_otherprocedure_preview->Page_Render();
?>
<?php $ivf_otherprocedure_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_otherprocedure"><!-- .card -->
<?php if ($ivf_otherprocedure_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_otherprocedure_preview->renderListOptions();

// Render list options (header, left)
$ivf_otherprocedure_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->id) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->id->headerCellClass() ?>"><?php echo $ivf_otherprocedure->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->id->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->id->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->id->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->RIDNO) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->RIDNO->headerCellClass() ?>"><?php echo $ivf_otherprocedure->RIDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->RIDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->RIDNO->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->RIDNO->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->RIDNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->RIDNO->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->Name) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->Name->headerCellClass() ?>"><?php echo $ivf_otherprocedure->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->Name->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Name->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Name->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->DateofAdmission) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->DateofAdmission->headerCellClass() ?>"><?php echo $ivf_otherprocedure->DateofAdmission->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->DateofAdmission->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->DateofAdmission->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->DateofAdmission->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofAdmission->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->DateofAdmission->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->DateofProcedure) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->DateofProcedure->headerCellClass() ?>"><?php echo $ivf_otherprocedure->DateofProcedure->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->DateofProcedure->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->DateofProcedure->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->DateofProcedure->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofProcedure->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->DateofProcedure->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->DateofDischarge) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->DateofDischarge->headerCellClass() ?>"><?php echo $ivf_otherprocedure->DateofDischarge->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->DateofDischarge->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->DateofDischarge->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->DateofDischarge->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofDischarge->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->DateofDischarge->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->Consultant) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->Consultant->headerCellClass() ?>"><?php echo $ivf_otherprocedure->Consultant->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->Consultant->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->Consultant->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Consultant->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Consultant->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Consultant->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->Surgeon) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->Surgeon->headerCellClass() ?>"><?php echo $ivf_otherprocedure->Surgeon->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->Surgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->Surgeon->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Surgeon->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Surgeon->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Surgeon->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->Anesthetist) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->Anesthetist->headerCellClass() ?>"><?php echo $ivf_otherprocedure->Anesthetist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->Anesthetist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->Anesthetist->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Anesthetist->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Anesthetist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Anesthetist->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->IdentificationMark) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->IdentificationMark->headerCellClass() ?>"><?php echo $ivf_otherprocedure->IdentificationMark->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->IdentificationMark->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->IdentificationMark->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->IdentificationMark->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->IdentificationMark->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->ProcedureDone) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->ProcedureDone->headerCellClass() ?>"><?php echo $ivf_otherprocedure->ProcedureDone->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->ProcedureDone->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->ProcedureDone->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->ProcedureDone->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->ProcedureDone->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->ProcedureDone->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->PROVISIONALDIAGNOSIS) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->PROVISIONALDIAGNOSIS->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->PROVISIONALDIAGNOSIS->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->Chiefcomplaints) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->Chiefcomplaints->headerCellClass() ?>"><?php echo $ivf_otherprocedure->Chiefcomplaints->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->Chiefcomplaints->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->Chiefcomplaints->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Chiefcomplaints->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Chiefcomplaints->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Chiefcomplaints->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->MaritallHistory) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->MaritallHistory->headerCellClass() ?>"><?php echo $ivf_otherprocedure->MaritallHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->MaritallHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->MaritallHistory->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->MaritallHistory->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->MaritallHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->MaritallHistory->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->MenstrualHistory) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->MenstrualHistory->headerCellClass() ?>"><?php echo $ivf_otherprocedure->MenstrualHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->MenstrualHistory->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->MenstrualHistory->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->MenstrualHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->MenstrualHistory->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->SurgicalHistory) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->SurgicalHistory->headerCellClass() ?>"><?php echo $ivf_otherprocedure->SurgicalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->SurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->SurgicalHistory->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->SurgicalHistory->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->SurgicalHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->SurgicalHistory->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->PastHistory) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->PastHistory->headerCellClass() ?>"><?php echo $ivf_otherprocedure->PastHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->PastHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->PastHistory->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->PastHistory->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PastHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->PastHistory->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->FamilyHistory) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->FamilyHistory->headerCellClass() ?>"><?php echo $ivf_otherprocedure->FamilyHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->FamilyHistory->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->FamilyHistory->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->FamilyHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->FamilyHistory->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->Temp) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->Temp->headerCellClass() ?>"><?php echo $ivf_otherprocedure->Temp->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->Temp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->Temp->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Temp->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Temp->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Temp->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->Pulse) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->Pulse->headerCellClass() ?>"><?php echo $ivf_otherprocedure->Pulse->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->Pulse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->Pulse->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Pulse->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Pulse->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->Pulse->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->BP) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->BP->headerCellClass() ?>"><?php echo $ivf_otherprocedure->BP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->BP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->BP->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->BP->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->BP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->BP->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->CNS) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->CNS->headerCellClass() ?>"><?php echo $ivf_otherprocedure->CNS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->CNS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->CNS->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->CNS->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->CNS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->CNS->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->_RS) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->_RS->headerCellClass() ?>"><?php echo $ivf_otherprocedure->_RS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->_RS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->_RS->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->_RS->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->_RS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->_RS->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->CVS) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->CVS->headerCellClass() ?>"><?php echo $ivf_otherprocedure->CVS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->CVS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->CVS->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->CVS->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->CVS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->CVS->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->PA) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->PA->headerCellClass() ?>"><?php echo $ivf_otherprocedure->PA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->PA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->PA->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->PA->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PA->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->PA->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->InvestigationReport) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->InvestigationReport->headerCellClass() ?>"><?php echo $ivf_otherprocedure->InvestigationReport->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->InvestigationReport->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->InvestigationReport->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->InvestigationReport->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->InvestigationReport->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->InvestigationReport->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_otherprocedure->SortUrl($ivf_otherprocedure->TidNo) == "") { ?>
		<th class="<?php echo $ivf_otherprocedure->TidNo->headerCellClass() ?>"><?php echo $ivf_otherprocedure->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_otherprocedure->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_otherprocedure->TidNo->Name ?>" data-sort-order="<?php echo $ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->TidNo->Name && $ivf_otherprocedure_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_preview->SortField == $ivf_otherprocedure->TidNo->Name) { ?><?php if ($ivf_otherprocedure_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_otherprocedure_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_otherprocedure_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_otherprocedure_preview->RecCount = 0;
$ivf_otherprocedure_preview->RowCnt = 0;
while ($ivf_otherprocedure_preview->Recordset && !$ivf_otherprocedure_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_otherprocedure_preview->RecCount++;
	$ivf_otherprocedure_preview->RowCnt++;
	$ivf_otherprocedure_preview->CssStyle = "";
	$ivf_otherprocedure_preview->loadListRowValues($ivf_otherprocedure_preview->Recordset);

	// Render row
	$ivf_otherprocedure_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_otherprocedure_preview->resetAttributes();
	$ivf_otherprocedure_preview->renderListRow();

	// Render list options
	$ivf_otherprocedure_preview->renderListOptions();
?>
	<tr<?php echo $ivf_otherprocedure_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_otherprocedure_preview->ListOptions->render("body", "left", $ivf_otherprocedure_preview->RowCnt);
?>
<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_otherprocedure->id->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->id->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
		<!-- RIDNO -->
		<td<?php echo $ivf_otherprocedure->RIDNO->cellAttributes() ?>>
<script id="orig_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureedit" type="text/html">
<?php echo $ivf_otherprocedure->RIDNO->getViewValue() ?>
</script>
<span<?php echo $ivf_otherprocedure->RIDNO->viewAttributes() ?>><?php echo Barcode()->show($ivf_otherprocedure->RIDNO->CurrentValue, 'EAN-13', 60) ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_otherprocedure->Name->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->Name->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
		<!-- DateofAdmission -->
		<td<?php echo $ivf_otherprocedure->DateofAdmission->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->DateofAdmission->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofAdmission->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
		<!-- DateofProcedure -->
		<td<?php echo $ivf_otherprocedure->DateofProcedure->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->DateofProcedure->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofProcedure->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
		<!-- DateofDischarge -->
		<td<?php echo $ivf_otherprocedure->DateofDischarge->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->DateofDischarge->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofDischarge->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
		<!-- Consultant -->
		<td<?php echo $ivf_otherprocedure->Consultant->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->Consultant->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Consultant->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
		<!-- Surgeon -->
		<td<?php echo $ivf_otherprocedure->Surgeon->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->Surgeon->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Surgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
		<!-- Anesthetist -->
		<td<?php echo $ivf_otherprocedure->Anesthetist->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->Anesthetist->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Anesthetist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
		<!-- IdentificationMark -->
		<td<?php echo $ivf_otherprocedure->IdentificationMark->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->IdentificationMark->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->IdentificationMark->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
		<!-- ProcedureDone -->
		<td<?php echo $ivf_otherprocedure->ProcedureDone->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->ProcedureDone->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->ProcedureDone->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<!-- PROVISIONALDIAGNOSIS -->
		<td<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<!-- Chiefcomplaints -->
		<td<?php echo $ivf_otherprocedure->Chiefcomplaints->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->Chiefcomplaints->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Chiefcomplaints->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
		<!-- MaritallHistory -->
		<td<?php echo $ivf_otherprocedure->MaritallHistory->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->MaritallHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->MaritallHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<!-- MenstrualHistory -->
		<td<?php echo $ivf_otherprocedure->MenstrualHistory->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->MenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->MenstrualHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<!-- SurgicalHistory -->
		<td<?php echo $ivf_otherprocedure->SurgicalHistory->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->SurgicalHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->SurgicalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
		<!-- PastHistory -->
		<td<?php echo $ivf_otherprocedure->PastHistory->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->PastHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PastHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
		<!-- FamilyHistory -->
		<td<?php echo $ivf_otherprocedure->FamilyHistory->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->FamilyHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->FamilyHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
		<!-- Temp -->
		<td<?php echo $ivf_otherprocedure->Temp->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->Temp->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Temp->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
		<!-- Pulse -->
		<td<?php echo $ivf_otherprocedure->Pulse->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->Pulse->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Pulse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
		<!-- BP -->
		<td<?php echo $ivf_otherprocedure->BP->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->BP->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->BP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
		<!-- CNS -->
		<td<?php echo $ivf_otherprocedure->CNS->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->CNS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->CNS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
		<!-- RS -->
		<td<?php echo $ivf_otherprocedure->_RS->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->_RS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->_RS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
		<!-- CVS -->
		<td<?php echo $ivf_otherprocedure->CVS->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->CVS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->CVS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
		<!-- PA -->
		<td<?php echo $ivf_otherprocedure->PA->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->PA->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
		<!-- InvestigationReport -->
		<td<?php echo $ivf_otherprocedure->InvestigationReport->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->InvestigationReport->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->InvestigationReport->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_otherprocedure->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_otherprocedure->TidNo->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_otherprocedure_preview->ListOptions->render("body", "right", $ivf_otherprocedure_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_otherprocedure_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_otherprocedure_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_otherprocedure_preview->Pager)) $ivf_otherprocedure_preview->Pager = new PrevNextPager($ivf_otherprocedure_preview->StartRec, $ivf_otherprocedure_preview->DisplayRecs, $ivf_otherprocedure_preview->TotalRecs) ?>
<?php if ($ivf_otherprocedure_preview->Pager->RecordCount > 0 && $ivf_otherprocedure_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_otherprocedure_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_otherprocedure_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_otherprocedure_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_otherprocedure_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_otherprocedure_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_otherprocedure_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_otherprocedure_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_otherprocedure_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_otherprocedure_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_otherprocedure_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_otherprocedure_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_otherprocedure_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_otherprocedure_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_otherprocedure_preview->Recordset)
	$ivf_otherprocedure_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_otherprocedure_preview->terminate();
?>