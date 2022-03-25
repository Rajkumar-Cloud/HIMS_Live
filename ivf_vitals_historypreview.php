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
$ivf_vitals_history_preview = new ivf_vitals_history_preview();

// Run the page
$ivf_vitals_history_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitals_history_preview->Page_Render();
?>
<?php $ivf_vitals_history_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_vitals_history"><!-- .card -->
<?php if ($ivf_vitals_history_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_vitals_history_preview->renderListOptions();

// Render list options (header, left)
$ivf_vitals_history_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_vitals_history->id->Visible) { // id ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->id) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->id->headerCellClass() ?>"><?php echo $ivf_vitals_history->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->id->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->id->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->id->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->RIDNO) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->RIDNO->headerCellClass() ?>"><?php echo $ivf_vitals_history->RIDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->RIDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->RIDNO->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->RIDNO->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->RIDNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->RIDNO->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Name->Visible) { // Name ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Name) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Name->headerCellClass() ?>"><?php echo $ivf_vitals_history->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Name->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Name->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Name->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Age->Visible) { // Age ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Age) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Age->headerCellClass() ?>"><?php echo $ivf_vitals_history->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Age->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Age->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Age->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->SEX->Visible) { // SEX ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->SEX) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->SEX->headerCellClass() ?>"><?php echo $ivf_vitals_history->SEX->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->SEX->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->SEX->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->SEX->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->SEX->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->SEX->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Religion->Visible) { // Religion ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Religion) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Religion->headerCellClass() ?>"><?php echo $ivf_vitals_history->Religion->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Religion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Religion->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Religion->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Religion->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Religion->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Address->Visible) { // Address ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Address) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Address->headerCellClass() ?>"><?php echo $ivf_vitals_history->Address->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Address->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Address->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Address->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Address->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Address->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->IdentificationMark) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->IdentificationMark->headerCellClass() ?>"><?php echo $ivf_vitals_history->IdentificationMark->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->IdentificationMark->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->IdentificationMark->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->IdentificationMark->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->IdentificationMark->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->DoublewitnessName1) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->DoublewitnessName1->headerCellClass() ?>"><?php echo $ivf_vitals_history->DoublewitnessName1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->DoublewitnessName1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->DoublewitnessName1->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->DoublewitnessName1->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->DoublewitnessName1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->DoublewitnessName1->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->DoublewitnessName2) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->DoublewitnessName2->headerCellClass() ?>"><?php echo $ivf_vitals_history->DoublewitnessName2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->DoublewitnessName2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->DoublewitnessName2->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->DoublewitnessName2->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->DoublewitnessName2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->DoublewitnessName2->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Chiefcomplaints) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Chiefcomplaints->headerCellClass() ?>"><?php echo $ivf_vitals_history->Chiefcomplaints->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Chiefcomplaints->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Chiefcomplaints->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Chiefcomplaints->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Chiefcomplaints->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Chiefcomplaints->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MenstrualHistory) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MenstrualHistory->headerCellClass() ?>"><?php echo $ivf_vitals_history->MenstrualHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MenstrualHistory->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MenstrualHistory->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MenstrualHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MenstrualHistory->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->ObstetricHistory) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->ObstetricHistory->headerCellClass() ?>"><?php echo $ivf_vitals_history->ObstetricHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->ObstetricHistory->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->ObstetricHistory->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->ObstetricHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->ObstetricHistory->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MedicalHistory) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MedicalHistory->headerCellClass() ?>"><?php echo $ivf_vitals_history->MedicalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MedicalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MedicalHistory->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MedicalHistory->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MedicalHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MedicalHistory->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->SurgicalHistory) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->SurgicalHistory->headerCellClass() ?>"><?php echo $ivf_vitals_history->SurgicalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->SurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->SurgicalHistory->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->SurgicalHistory->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->SurgicalHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->SurgicalHistory->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Generalexaminationpallor) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Generalexaminationpallor->headerCellClass() ?>"><?php echo $ivf_vitals_history->Generalexaminationpallor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Generalexaminationpallor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Generalexaminationpallor->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Generalexaminationpallor->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Generalexaminationpallor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Generalexaminationpallor->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PR->Visible) { // PR ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PR) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PR->headerCellClass() ?>"><?php echo $ivf_vitals_history->PR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PR->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PR->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PR->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PR->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->CVS->Visible) { // CVS ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->CVS) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->CVS->headerCellClass() ?>"><?php echo $ivf_vitals_history->CVS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->CVS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->CVS->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->CVS->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->CVS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->CVS->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PA->Visible) { // PA ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PA) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PA->headerCellClass() ?>"><?php echo $ivf_vitals_history->PA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PA->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PA->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PA->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PA->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PROVISIONALDIAGNOSIS) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PROVISIONALDIAGNOSIS->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PROVISIONALDIAGNOSIS->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Investigations->Visible) { // Investigations ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Investigations) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Investigations->headerCellClass() ?>"><?php echo $ivf_vitals_history->Investigations->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Investigations->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Investigations->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Investigations->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Investigations->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Investigations->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Fheight->Visible) { // Fheight ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Fheight) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Fheight->headerCellClass() ?>"><?php echo $ivf_vitals_history->Fheight->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Fheight->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Fheight->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Fheight->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Fheight->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Fheight->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Fweight->Visible) { // Fweight ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Fweight) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Fweight->headerCellClass() ?>"><?php echo $ivf_vitals_history->Fweight->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Fweight->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Fweight->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Fweight->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Fweight->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Fweight->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FBMI->Visible) { // FBMI ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->FBMI) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->FBMI->headerCellClass() ?>"><?php echo $ivf_vitals_history->FBMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->FBMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->FBMI->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->FBMI->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FBMI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->FBMI->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->FBloodgroup) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->FBloodgroup->headerCellClass() ?>"><?php echo $ivf_vitals_history->FBloodgroup->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->FBloodgroup->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->FBloodgroup->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->FBloodgroup->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FBloodgroup->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->FBloodgroup->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Mheight->Visible) { // Mheight ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Mheight) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Mheight->headerCellClass() ?>"><?php echo $ivf_vitals_history->Mheight->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Mheight->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Mheight->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Mheight->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Mheight->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Mheight->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Mweight->Visible) { // Mweight ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Mweight) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Mweight->headerCellClass() ?>"><?php echo $ivf_vitals_history->Mweight->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Mweight->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Mweight->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Mweight->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Mweight->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Mweight->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MBMI->Visible) { // MBMI ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MBMI) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MBMI->headerCellClass() ?>"><?php echo $ivf_vitals_history->MBMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MBMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MBMI->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MBMI->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MBMI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MBMI->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MBloodgroup) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MBloodgroup->headerCellClass() ?>"><?php echo $ivf_vitals_history->MBloodgroup->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MBloodgroup->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MBloodgroup->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MBloodgroup->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MBloodgroup->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MBloodgroup->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FBuild->Visible) { // FBuild ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->FBuild) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->FBuild->headerCellClass() ?>"><?php echo $ivf_vitals_history->FBuild->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->FBuild->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->FBuild->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->FBuild->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FBuild->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->FBuild->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MBuild->Visible) { // MBuild ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MBuild) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MBuild->headerCellClass() ?>"><?php echo $ivf_vitals_history->MBuild->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MBuild->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MBuild->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MBuild->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MBuild->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MBuild->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->FSkinColor) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->FSkinColor->headerCellClass() ?>"><?php echo $ivf_vitals_history->FSkinColor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->FSkinColor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->FSkinColor->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->FSkinColor->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FSkinColor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->FSkinColor->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MSkinColor) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MSkinColor->headerCellClass() ?>"><?php echo $ivf_vitals_history->MSkinColor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MSkinColor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MSkinColor->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MSkinColor->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MSkinColor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MSkinColor->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->FEyesColor) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->FEyesColor->headerCellClass() ?>"><?php echo $ivf_vitals_history->FEyesColor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->FEyesColor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->FEyesColor->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->FEyesColor->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FEyesColor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->FEyesColor->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MEyesColor) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MEyesColor->headerCellClass() ?>"><?php echo $ivf_vitals_history->MEyesColor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MEyesColor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MEyesColor->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MEyesColor->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MEyesColor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MEyesColor->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FHairColor->Visible) { // FHairColor ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->FHairColor) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->FHairColor->headerCellClass() ?>"><?php echo $ivf_vitals_history->FHairColor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->FHairColor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->FHairColor->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->FHairColor->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FHairColor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->FHairColor->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MhairColor->Visible) { // MhairColor ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MhairColor) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MhairColor->headerCellClass() ?>"><?php echo $ivf_vitals_history->MhairColor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MhairColor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MhairColor->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MhairColor->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MhairColor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MhairColor->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->FhairTexture) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->FhairTexture->headerCellClass() ?>"><?php echo $ivf_vitals_history->FhairTexture->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->FhairTexture->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->FhairTexture->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->FhairTexture->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FhairTexture->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->FhairTexture->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MHairTexture) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MHairTexture->headerCellClass() ?>"><?php echo $ivf_vitals_history->MHairTexture->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MHairTexture->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MHairTexture->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MHairTexture->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MHairTexture->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MHairTexture->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Fothers->Visible) { // Fothers ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Fothers) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Fothers->headerCellClass() ?>"><?php echo $ivf_vitals_history->Fothers->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Fothers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Fothers->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Fothers->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Fothers->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Fothers->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Mothers->Visible) { // Mothers ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Mothers) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Mothers->headerCellClass() ?>"><?php echo $ivf_vitals_history->Mothers->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Mothers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Mothers->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Mothers->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Mothers->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Mothers->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PGE->Visible) { // PGE ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PGE) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PGE->headerCellClass() ?>"><?php echo $ivf_vitals_history->PGE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PGE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PGE->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PGE->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PGE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PGE->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PPR->Visible) { // PPR ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PPR) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PPR->headerCellClass() ?>"><?php echo $ivf_vitals_history->PPR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PPR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PPR->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PPR->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPR->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PPR->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PBP->Visible) { // PBP ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PBP) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PBP->headerCellClass() ?>"><?php echo $ivf_vitals_history->PBP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PBP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PBP->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PBP->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PBP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PBP->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Breast->Visible) { // Breast ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Breast) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Breast->headerCellClass() ?>"><?php echo $ivf_vitals_history->Breast->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Breast->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Breast->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Breast->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Breast->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Breast->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PPA->Visible) { // PPA ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PPA) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PPA->headerCellClass() ?>"><?php echo $ivf_vitals_history->PPA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PPA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PPA->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PPA->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPA->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PPA->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PPSV->Visible) { // PPSV ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PPSV) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PPSV->headerCellClass() ?>"><?php echo $ivf_vitals_history->PPSV->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PPSV->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PPSV->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PPSV->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPSV->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PPSV->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PPAPSMEAR) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PPAPSMEAR->headerCellClass() ?>"><?php echo $ivf_vitals_history->PPAPSMEAR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PPAPSMEAR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PPAPSMEAR->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PPAPSMEAR->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPAPSMEAR->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PPAPSMEAR->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PTHYROID) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PTHYROID->headerCellClass() ?>"><?php echo $ivf_vitals_history->PTHYROID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PTHYROID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PTHYROID->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PTHYROID->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PTHYROID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PTHYROID->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MTHYROID) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MTHYROID->headerCellClass() ?>"><?php echo $ivf_vitals_history->MTHYROID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MTHYROID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MTHYROID->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MTHYROID->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MTHYROID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MTHYROID->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->SecSexCharacters) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->SecSexCharacters->headerCellClass() ?>"><?php echo $ivf_vitals_history->SecSexCharacters->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->SecSexCharacters->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->SecSexCharacters->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->SecSexCharacters->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->SecSexCharacters->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->SecSexCharacters->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PenisUM->Visible) { // PenisUM ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->PenisUM) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->PenisUM->headerCellClass() ?>"><?php echo $ivf_vitals_history->PenisUM->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->PenisUM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->PenisUM->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->PenisUM->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PenisUM->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->PenisUM->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->VAS->Visible) { // VAS ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->VAS) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->VAS->headerCellClass() ?>"><?php echo $ivf_vitals_history->VAS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->VAS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->VAS->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->VAS->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->VAS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->VAS->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->EPIDIDYMIS) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->EPIDIDYMIS->headerCellClass() ?>"><?php echo $ivf_vitals_history->EPIDIDYMIS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->EPIDIDYMIS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->EPIDIDYMIS->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->EPIDIDYMIS->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->EPIDIDYMIS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->EPIDIDYMIS->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Varicocele->Visible) { // Varicocele ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Varicocele) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Varicocele->headerCellClass() ?>"><?php echo $ivf_vitals_history->Varicocele->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Varicocele->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Varicocele->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Varicocele->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Varicocele->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Varicocele->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->FamilyHistory) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->FamilyHistory->headerCellClass() ?>"><?php echo $ivf_vitals_history->FamilyHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->FamilyHistory->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->FamilyHistory->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FamilyHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->FamilyHistory->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Addictions->Visible) { // Addictions ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Addictions) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Addictions->headerCellClass() ?>"><?php echo $ivf_vitals_history->Addictions->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Addictions->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Addictions->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Addictions->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Addictions->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Addictions->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Medical->Visible) { // Medical ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Medical) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Medical->headerCellClass() ?>"><?php echo $ivf_vitals_history->Medical->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Medical->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Medical->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Medical->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Medical->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Medical->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Surgical->Visible) { // Surgical ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->Surgical) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->Surgical->headerCellClass() ?>"><?php echo $ivf_vitals_history->Surgical->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->Surgical->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->Surgical->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->Surgical->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Surgical->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->Surgical->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->CoitalHistory) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->CoitalHistory->headerCellClass() ?>"><?php echo $ivf_vitals_history->CoitalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->CoitalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->CoitalHistory->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->CoitalHistory->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->CoitalHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->CoitalHistory->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MariedFor->Visible) { // MariedFor ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->MariedFor) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->MariedFor->headerCellClass() ?>"><?php echo $ivf_vitals_history->MariedFor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->MariedFor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->MariedFor->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->MariedFor->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MariedFor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->MariedFor->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->CMNCM->Visible) { // CMNCM ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->CMNCM) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->CMNCM->headerCellClass() ?>"><?php echo $ivf_vitals_history->CMNCM->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->CMNCM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->CMNCM->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->CMNCM->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->CMNCM->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->CMNCM->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->TidNo) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->TidNo->headerCellClass() ?>"><?php echo $ivf_vitals_history->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->TidNo->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->TidNo->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->TidNo->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
	<?php if ($ivf_vitals_history->SortUrl($ivf_vitals_history->pFamilyHistory) == "") { ?>
		<th class="<?php echo $ivf_vitals_history->pFamilyHistory->headerCellClass() ?>"><?php echo $ivf_vitals_history->pFamilyHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_vitals_history->pFamilyHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_vitals_history->pFamilyHistory->Name ?>" data-sort-order="<?php echo $ivf_vitals_history_preview->SortField == $ivf_vitals_history->pFamilyHistory->Name && $ivf_vitals_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_vitals_history->pFamilyHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_vitals_history_preview->SortField == $ivf_vitals_history->pFamilyHistory->Name) { ?><?php if ($ivf_vitals_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_vitals_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_vitals_history_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_vitals_history_preview->RecCount = 0;
$ivf_vitals_history_preview->RowCnt = 0;
while ($ivf_vitals_history_preview->Recordset && !$ivf_vitals_history_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_vitals_history_preview->RecCount++;
	$ivf_vitals_history_preview->RowCnt++;
	$ivf_vitals_history_preview->CssStyle = "";
	$ivf_vitals_history_preview->loadListRowValues($ivf_vitals_history_preview->Recordset);

	// Render row
	$ivf_vitals_history_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_vitals_history_preview->resetAttributes();
	$ivf_vitals_history_preview->renderListRow();

	// Render list options
	$ivf_vitals_history_preview->renderListOptions();
?>
	<tr<?php echo $ivf_vitals_history_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitals_history_preview->ListOptions->render("body", "left", $ivf_vitals_history_preview->RowCnt);
?>
<?php if ($ivf_vitals_history->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_vitals_history->id->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->id->viewAttributes() ?>>
<?php echo $ivf_vitals_history->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->RIDNO->Visible) { // RIDNO ?>
		<!-- RIDNO -->
		<td<?php echo $ivf_vitals_history->RIDNO->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->RIDNO->viewAttributes() ?>>
<?php echo $ivf_vitals_history->RIDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_vitals_history->Name->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Name->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $ivf_vitals_history->Age->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Age->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->SEX->Visible) { // SEX ?>
		<!-- SEX -->
		<td<?php echo $ivf_vitals_history->SEX->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->SEX->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SEX->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Religion->Visible) { // Religion ?>
		<!-- Religion -->
		<td<?php echo $ivf_vitals_history->Religion->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Religion->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Religion->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Address->Visible) { // Address ?>
		<!-- Address -->
		<td<?php echo $ivf_vitals_history->Address->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Address->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Address->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
		<!-- IdentificationMark -->
		<td<?php echo $ivf_vitals_history->IdentificationMark->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->IdentificationMark->viewAttributes() ?>>
<?php echo $ivf_vitals_history->IdentificationMark->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<!-- DoublewitnessName1 -->
		<td<?php echo $ivf_vitals_history->DoublewitnessName1->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->DoublewitnessName1->viewAttributes() ?>>
<?php echo $ivf_vitals_history->DoublewitnessName1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<!-- DoublewitnessName2 -->
		<td<?php echo $ivf_vitals_history->DoublewitnessName2->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->DoublewitnessName2->viewAttributes() ?>>
<?php echo $ivf_vitals_history->DoublewitnessName2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<!-- Chiefcomplaints -->
		<td<?php echo $ivf_vitals_history->Chiefcomplaints->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Chiefcomplaints->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Chiefcomplaints->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<!-- MenstrualHistory -->
		<td<?php echo $ivf_vitals_history->MenstrualHistory->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MenstrualHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<!-- ObstetricHistory -->
		<td<?php echo $ivf_vitals_history->ObstetricHistory->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->ObstetricHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
		<!-- MedicalHistory -->
		<td<?php echo $ivf_vitals_history->MedicalHistory->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MedicalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MedicalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<!-- SurgicalHistory -->
		<td<?php echo $ivf_vitals_history->SurgicalHistory->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->SurgicalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SurgicalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<!-- Generalexaminationpallor -->
		<td<?php echo $ivf_vitals_history->Generalexaminationpallor->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Generalexaminationpallor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Generalexaminationpallor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PR->Visible) { // PR ?>
		<!-- PR -->
		<td<?php echo $ivf_vitals_history->PR->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->CVS->Visible) { // CVS ?>
		<!-- CVS -->
		<td<?php echo $ivf_vitals_history->CVS->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->CVS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CVS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PA->Visible) { // PA ?>
		<!-- PA -->
		<td<?php echo $ivf_vitals_history->PA->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PA->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<!-- PROVISIONALDIAGNOSIS -->
		<td<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Investigations->Visible) { // Investigations ?>
		<!-- Investigations -->
		<td<?php echo $ivf_vitals_history->Investigations->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Investigations->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Investigations->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Fheight->Visible) { // Fheight ?>
		<!-- Fheight -->
		<td<?php echo $ivf_vitals_history->Fheight->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Fheight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fheight->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Fweight->Visible) { // Fweight ?>
		<!-- Fweight -->
		<td<?php echo $ivf_vitals_history->Fweight->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Fweight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fweight->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FBMI->Visible) { // FBMI ?>
		<!-- FBMI -->
		<td<?php echo $ivf_vitals_history->FBMI->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->FBMI->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
		<!-- FBloodgroup -->
		<td<?php echo $ivf_vitals_history->FBloodgroup->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->FBloodgroup->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBloodgroup->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Mheight->Visible) { // Mheight ?>
		<!-- Mheight -->
		<td<?php echo $ivf_vitals_history->Mheight->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Mheight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mheight->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Mweight->Visible) { // Mweight ?>
		<!-- Mweight -->
		<td<?php echo $ivf_vitals_history->Mweight->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Mweight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mweight->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MBMI->Visible) { // MBMI ?>
		<!-- MBMI -->
		<td<?php echo $ivf_vitals_history->MBMI->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MBMI->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
		<!-- MBloodgroup -->
		<td<?php echo $ivf_vitals_history->MBloodgroup->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MBloodgroup->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBloodgroup->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FBuild->Visible) { // FBuild ?>
		<!-- FBuild -->
		<td<?php echo $ivf_vitals_history->FBuild->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->FBuild->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBuild->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MBuild->Visible) { // MBuild ?>
		<!-- MBuild -->
		<td<?php echo $ivf_vitals_history->MBuild->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MBuild->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBuild->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
		<!-- FSkinColor -->
		<td<?php echo $ivf_vitals_history->FSkinColor->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->FSkinColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FSkinColor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
		<!-- MSkinColor -->
		<td<?php echo $ivf_vitals_history->MSkinColor->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MSkinColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MSkinColor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
		<!-- FEyesColor -->
		<td<?php echo $ivf_vitals_history->FEyesColor->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->FEyesColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FEyesColor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
		<!-- MEyesColor -->
		<td<?php echo $ivf_vitals_history->MEyesColor->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MEyesColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MEyesColor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FHairColor->Visible) { // FHairColor ?>
		<!-- FHairColor -->
		<td<?php echo $ivf_vitals_history->FHairColor->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->FHairColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FHairColor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MhairColor->Visible) { // MhairColor ?>
		<!-- MhairColor -->
		<td<?php echo $ivf_vitals_history->MhairColor->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MhairColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MhairColor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
		<!-- FhairTexture -->
		<td<?php echo $ivf_vitals_history->FhairTexture->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->FhairTexture->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FhairTexture->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
		<!-- MHairTexture -->
		<td<?php echo $ivf_vitals_history->MHairTexture->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MHairTexture->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MHairTexture->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Fothers->Visible) { // Fothers ?>
		<!-- Fothers -->
		<td<?php echo $ivf_vitals_history->Fothers->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Fothers->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fothers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Mothers->Visible) { // Mothers ?>
		<!-- Mothers -->
		<td<?php echo $ivf_vitals_history->Mothers->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Mothers->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mothers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PGE->Visible) { // PGE ?>
		<!-- PGE -->
		<td<?php echo $ivf_vitals_history->PGE->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PGE->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PGE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PPR->Visible) { // PPR ?>
		<!-- PPR -->
		<td<?php echo $ivf_vitals_history->PPR->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PPR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PBP->Visible) { // PBP ?>
		<!-- PBP -->
		<td<?php echo $ivf_vitals_history->PBP->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PBP->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PBP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Breast->Visible) { // Breast ?>
		<!-- Breast -->
		<td<?php echo $ivf_vitals_history->Breast->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Breast->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Breast->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PPA->Visible) { // PPA ?>
		<!-- PPA -->
		<td<?php echo $ivf_vitals_history->PPA->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PPA->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PPSV->Visible) { // PPSV ?>
		<!-- PPSV -->
		<td<?php echo $ivf_vitals_history->PPSV->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PPSV->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPSV->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<!-- PPAPSMEAR -->
		<td<?php echo $ivf_vitals_history->PPAPSMEAR->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PPAPSMEAR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPAPSMEAR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
		<!-- PTHYROID -->
		<td<?php echo $ivf_vitals_history->PTHYROID->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PTHYROID->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PTHYROID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
		<!-- MTHYROID -->
		<td<?php echo $ivf_vitals_history->MTHYROID->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MTHYROID->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MTHYROID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<!-- SecSexCharacters -->
		<td<?php echo $ivf_vitals_history->SecSexCharacters->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->SecSexCharacters->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SecSexCharacters->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PenisUM->Visible) { // PenisUM ?>
		<!-- PenisUM -->
		<td<?php echo $ivf_vitals_history->PenisUM->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->PenisUM->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PenisUM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->VAS->Visible) { // VAS ?>
		<!-- VAS -->
		<td<?php echo $ivf_vitals_history->VAS->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->VAS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->VAS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<!-- EPIDIDYMIS -->
		<td<?php echo $ivf_vitals_history->EPIDIDYMIS->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->EPIDIDYMIS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->EPIDIDYMIS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Varicocele->Visible) { // Varicocele ?>
		<!-- Varicocele -->
		<td<?php echo $ivf_vitals_history->Varicocele->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Varicocele->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Varicocele->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
		<!-- FamilyHistory -->
		<td<?php echo $ivf_vitals_history->FamilyHistory->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->FamilyHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FamilyHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Addictions->Visible) { // Addictions ?>
		<!-- Addictions -->
		<td<?php echo $ivf_vitals_history->Addictions->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Addictions->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Addictions->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Medical->Visible) { // Medical ?>
		<!-- Medical -->
		<td<?php echo $ivf_vitals_history->Medical->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Medical->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Medical->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Surgical->Visible) { // Surgical ?>
		<!-- Surgical -->
		<td<?php echo $ivf_vitals_history->Surgical->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->Surgical->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Surgical->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
		<!-- CoitalHistory -->
		<td<?php echo $ivf_vitals_history->CoitalHistory->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->CoitalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CoitalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MariedFor->Visible) { // MariedFor ?>
		<!-- MariedFor -->
		<td<?php echo $ivf_vitals_history->MariedFor->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->MariedFor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MariedFor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->CMNCM->Visible) { // CMNCM ?>
		<!-- CMNCM -->
		<td<?php echo $ivf_vitals_history->CMNCM->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->CMNCM->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CMNCM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_vitals_history->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->TidNo->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<!-- pFamilyHistory -->
		<td<?php echo $ivf_vitals_history->pFamilyHistory->cellAttributes() ?>>
<span<?php echo $ivf_vitals_history->pFamilyHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->pFamilyHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitals_history_preview->ListOptions->render("body", "right", $ivf_vitals_history_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_vitals_history_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_vitals_history_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_vitals_history_preview->Pager)) $ivf_vitals_history_preview->Pager = new PrevNextPager($ivf_vitals_history_preview->StartRec, $ivf_vitals_history_preview->DisplayRecs, $ivf_vitals_history_preview->TotalRecs) ?>
<?php if ($ivf_vitals_history_preview->Pager->RecordCount > 0 && $ivf_vitals_history_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_vitals_history_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_vitals_history_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_vitals_history_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_vitals_history_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_vitals_history_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_vitals_history_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_vitals_history_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_vitals_history_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_vitals_history_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_vitals_history_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_vitals_history_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_vitals_history_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_vitals_history_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_vitals_history_preview->Recordset)
	$ivf_vitals_history_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_vitals_history_preview->terminate();
?>