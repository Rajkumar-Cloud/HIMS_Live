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
$ivf_et_chart_preview = new ivf_et_chart_preview();

// Run the page
$ivf_et_chart_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_et_chart_preview->Page_Render();
?>
<?php $ivf_et_chart_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_et_chart"><!-- .card -->
<?php if ($ivf_et_chart_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_et_chart_preview->renderListOptions();

// Render list options (header, left)
$ivf_et_chart_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_et_chart->id->Visible) { // id ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->id) == "") { ?>
		<th class="<?php echo $ivf_et_chart->id->headerCellClass() ?>"><?php echo $ivf_et_chart->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->id->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->id->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->id->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_et_chart->RIDNo->headerCellClass() ?>"><?php echo $ivf_et_chart->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->RIDNo->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->RIDNo->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->RIDNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->RIDNo->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->Name) == "") { ?>
		<th class="<?php echo $ivf_et_chart->Name->headerCellClass() ?>"><?php echo $ivf_et_chart->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->Name->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->Name->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->Name->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->ARTCycle) == "") { ?>
		<th class="<?php echo $ivf_et_chart->ARTCycle->headerCellClass() ?>"><?php echo $ivf_et_chart->ARTCycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->ARTCycle->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->ARTCycle->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->ARTCycle->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->ARTCycle->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->Consultant) == "") { ?>
		<th class="<?php echo $ivf_et_chart->Consultant->headerCellClass() ?>"><?php echo $ivf_et_chart->Consultant->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->Consultant->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->Consultant->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->Consultant->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->Consultant->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->Consultant->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->InseminatinTechnique) == "") { ?>
		<th class="<?php echo $ivf_et_chart->InseminatinTechnique->headerCellClass() ?>"><?php echo $ivf_et_chart->InseminatinTechnique->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->InseminatinTechnique->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->InseminatinTechnique->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->InseminatinTechnique->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->InseminatinTechnique->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->IndicationForART) == "") { ?>
		<th class="<?php echo $ivf_et_chart->IndicationForART->headerCellClass() ?>"><?php echo $ivf_et_chart->IndicationForART->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->IndicationForART->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->IndicationForART->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->IndicationForART->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->IndicationForART->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->IndicationForART->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->PreTreatment) == "") { ?>
		<th class="<?php echo $ivf_et_chart->PreTreatment->headerCellClass() ?>"><?php echo $ivf_et_chart->PreTreatment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->PreTreatment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->PreTreatment->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->PreTreatment->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->PreTreatment->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->PreTreatment->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->Hysteroscopy) == "") { ?>
		<th class="<?php echo $ivf_et_chart->Hysteroscopy->headerCellClass() ?>"><?php echo $ivf_et_chart->Hysteroscopy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->Hysteroscopy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->Hysteroscopy->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->Hysteroscopy->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->Hysteroscopy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->Hysteroscopy->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->EndometrialScratching) == "") { ?>
		<th class="<?php echo $ivf_et_chart->EndometrialScratching->headerCellClass() ?>"><?php echo $ivf_et_chart->EndometrialScratching->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->EndometrialScratching->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->EndometrialScratching->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->EndometrialScratching->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->EndometrialScratching->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->EndometrialScratching->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->TrialCannulation) == "") { ?>
		<th class="<?php echo $ivf_et_chart->TrialCannulation->headerCellClass() ?>"><?php echo $ivf_et_chart->TrialCannulation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->TrialCannulation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->TrialCannulation->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->TrialCannulation->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->TrialCannulation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->TrialCannulation->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->CYCLETYPE) == "") { ?>
		<th class="<?php echo $ivf_et_chart->CYCLETYPE->headerCellClass() ?>"><?php echo $ivf_et_chart->CYCLETYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->CYCLETYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->CYCLETYPE->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->CYCLETYPE->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->CYCLETYPE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->CYCLETYPE->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->HRTCYCLE) == "") { ?>
		<th class="<?php echo $ivf_et_chart->HRTCYCLE->headerCellClass() ?>"><?php echo $ivf_et_chart->HRTCYCLE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->HRTCYCLE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->HRTCYCLE->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->HRTCYCLE->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->HRTCYCLE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->HRTCYCLE->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->OralEstrogenDosage) == "") { ?>
		<th class="<?php echo $ivf_et_chart->OralEstrogenDosage->headerCellClass() ?>"><?php echo $ivf_et_chart->OralEstrogenDosage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->OralEstrogenDosage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->OralEstrogenDosage->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->OralEstrogenDosage->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->OralEstrogenDosage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->OralEstrogenDosage->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->VaginalEstrogen) == "") { ?>
		<th class="<?php echo $ivf_et_chart->VaginalEstrogen->headerCellClass() ?>"><?php echo $ivf_et_chart->VaginalEstrogen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->VaginalEstrogen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->VaginalEstrogen->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->VaginalEstrogen->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->VaginalEstrogen->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->VaginalEstrogen->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->GCSF) == "") { ?>
		<th class="<?php echo $ivf_et_chart->GCSF->headerCellClass() ?>"><?php echo $ivf_et_chart->GCSF->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->GCSF->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->GCSF->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->GCSF->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->GCSF->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->GCSF->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->ActivatedPRP) == "") { ?>
		<th class="<?php echo $ivf_et_chart->ActivatedPRP->headerCellClass() ?>"><?php echo $ivf_et_chart->ActivatedPRP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->ActivatedPRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->ActivatedPRP->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->ActivatedPRP->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->ActivatedPRP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->ActivatedPRP->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->ERA) == "") { ?>
		<th class="<?php echo $ivf_et_chart->ERA->headerCellClass() ?>"><?php echo $ivf_et_chart->ERA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->ERA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->ERA->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->ERA->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->ERA->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->ERA->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->UCLcm) == "") { ?>
		<th class="<?php echo $ivf_et_chart->UCLcm->headerCellClass() ?>"><?php echo $ivf_et_chart->UCLcm->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->UCLcm->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->UCLcm->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->UCLcm->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->UCLcm->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->UCLcm->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->DATEOFSTART) == "") { ?>
		<th class="<?php echo $ivf_et_chart->DATEOFSTART->headerCellClass() ?>"><?php echo $ivf_et_chart->DATEOFSTART->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->DATEOFSTART->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->DATEOFSTART->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->DATEOFSTART->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->DATEOFSTART->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->DATEOFSTART->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->DATEOFEMBRYOTRANSFER) == "") { ?>
		<th class="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->DATEOFEMBRYOTRANSFER->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->DATEOFEMBRYOTRANSFER->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->DAYOFEMBRYOTRANSFER) == "") { ?>
		<th class="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->DAYOFEMBRYOTRANSFER->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->DAYOFEMBRYOTRANSFER->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->NOOFEMBRYOSTHAWED) == "") { ?>
		<th class="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->NOOFEMBRYOSTHAWED->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->NOOFEMBRYOSTHAWED->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->NOOFEMBRYOSTRANSFERRED) == "") { ?>
		<th class="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->DAYOFEMBRYOS) == "") { ?>
		<th class="<?php echo $ivf_et_chart->DAYOFEMBRYOS->headerCellClass() ?>"><?php echo $ivf_et_chart->DAYOFEMBRYOS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->DAYOFEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->DAYOFEMBRYOS->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->DAYOFEMBRYOS->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->DAYOFEMBRYOS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->DAYOFEMBRYOS->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->CRYOPRESERVEDEMBRYOS) == "") { ?>
		<th class="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->CRYOPRESERVEDEMBRYOS->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->CRYOPRESERVEDEMBRYOS->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->Code1) == "") { ?>
		<th class="<?php echo $ivf_et_chart->Code1->headerCellClass() ?>"><?php echo $ivf_et_chart->Code1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->Code1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->Code1->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->Code1->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->Code1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->Code1->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->Code2) == "") { ?>
		<th class="<?php echo $ivf_et_chart->Code2->headerCellClass() ?>"><?php echo $ivf_et_chart->Code2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->Code2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->Code2->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->Code2->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->Code2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->Code2->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->CellStage1) == "") { ?>
		<th class="<?php echo $ivf_et_chart->CellStage1->headerCellClass() ?>"><?php echo $ivf_et_chart->CellStage1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->CellStage1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->CellStage1->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->CellStage1->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->CellStage1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->CellStage1->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->CellStage2) == "") { ?>
		<th class="<?php echo $ivf_et_chart->CellStage2->headerCellClass() ?>"><?php echo $ivf_et_chart->CellStage2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->CellStage2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->CellStage2->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->CellStage2->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->CellStage2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->CellStage2->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->Grade1) == "") { ?>
		<th class="<?php echo $ivf_et_chart->Grade1->headerCellClass() ?>"><?php echo $ivf_et_chart->Grade1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->Grade1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->Grade1->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->Grade1->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->Grade1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->Grade1->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->Grade2) == "") { ?>
		<th class="<?php echo $ivf_et_chart->Grade2->headerCellClass() ?>"><?php echo $ivf_et_chart->Grade2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->Grade2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->Grade2->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->Grade2->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->Grade2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->Grade2->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->PregnancyTestingWithSerumBetaHcG) == "") { ?>
		<th class="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->ReviewDate) == "") { ?>
		<th class="<?php echo $ivf_et_chart->ReviewDate->headerCellClass() ?>"><?php echo $ivf_et_chart->ReviewDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->ReviewDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->ReviewDate->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->ReviewDate->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->ReviewDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->ReviewDate->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->ReviewDoctor) == "") { ?>
		<th class="<?php echo $ivf_et_chart->ReviewDoctor->headerCellClass() ?>"><?php echo $ivf_et_chart->ReviewDoctor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->ReviewDoctor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->ReviewDoctor->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->ReviewDoctor->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->ReviewDoctor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->ReviewDoctor->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_et_chart->SortUrl($ivf_et_chart->TidNo) == "") { ?>
		<th class="<?php echo $ivf_et_chart->TidNo->headerCellClass() ?>"><?php echo $ivf_et_chart->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_et_chart->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_et_chart->TidNo->Name ?>" data-sort-order="<?php echo $ivf_et_chart_preview->SortField == $ivf_et_chart->TidNo->Name && $ivf_et_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_et_chart->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_et_chart_preview->SortField == $ivf_et_chart->TidNo->Name) { ?><?php if ($ivf_et_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_et_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_et_chart_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_et_chart_preview->RecCount = 0;
$ivf_et_chart_preview->RowCnt = 0;
while ($ivf_et_chart_preview->Recordset && !$ivf_et_chart_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_et_chart_preview->RecCount++;
	$ivf_et_chart_preview->RowCnt++;
	$ivf_et_chart_preview->CssStyle = "";
	$ivf_et_chart_preview->loadListRowValues($ivf_et_chart_preview->Recordset);

	// Render row
	$ivf_et_chart_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_et_chart_preview->resetAttributes();
	$ivf_et_chart_preview->renderListRow();

	// Render list options
	$ivf_et_chart_preview->renderListOptions();
?>
	<tr<?php echo $ivf_et_chart_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_et_chart_preview->ListOptions->render("body", "left", $ivf_et_chart_preview->RowCnt);
?>
<?php if ($ivf_et_chart->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_et_chart->id->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->id->viewAttributes() ?>>
<?php echo $ivf_et_chart->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_et_chart->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_et_chart->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_et_chart->Name->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->Name->viewAttributes() ?>>
<?php echo $ivf_et_chart->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
		<!-- ARTCycle -->
		<td<?php echo $ivf_et_chart->ARTCycle->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_et_chart->ARTCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
		<!-- Consultant -->
		<td<?php echo $ivf_et_chart->Consultant->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_et_chart->Consultant->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<!-- InseminatinTechnique -->
		<td<?php echo $ivf_et_chart->InseminatinTechnique->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_et_chart->InseminatinTechnique->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
		<!-- IndicationForART -->
		<td<?php echo $ivf_et_chart->IndicationForART->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_et_chart->IndicationForART->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
		<!-- PreTreatment -->
		<td<?php echo $ivf_et_chart->PreTreatment->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->PreTreatment->viewAttributes() ?>>
<?php echo $ivf_et_chart->PreTreatment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<!-- Hysteroscopy -->
		<td<?php echo $ivf_et_chart->Hysteroscopy->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->Hysteroscopy->viewAttributes() ?>>
<?php echo $ivf_et_chart->Hysteroscopy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<!-- EndometrialScratching -->
		<td<?php echo $ivf_et_chart->EndometrialScratching->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->EndometrialScratching->viewAttributes() ?>>
<?php echo $ivf_et_chart->EndometrialScratching->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<!-- TrialCannulation -->
		<td<?php echo $ivf_et_chart->TrialCannulation->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_et_chart->TrialCannulation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<!-- CYCLETYPE -->
		<td<?php echo $ivf_et_chart->CYCLETYPE->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->CYCLETYPE->viewAttributes() ?>>
<?php echo $ivf_et_chart->CYCLETYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<!-- HRTCYCLE -->
		<td<?php echo $ivf_et_chart->HRTCYCLE->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->HRTCYCLE->viewAttributes() ?>>
<?php echo $ivf_et_chart->HRTCYCLE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<!-- OralEstrogenDosage -->
		<td<?php echo $ivf_et_chart->OralEstrogenDosage->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->OralEstrogenDosage->viewAttributes() ?>>
<?php echo $ivf_et_chart->OralEstrogenDosage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<!-- VaginalEstrogen -->
		<td<?php echo $ivf_et_chart->VaginalEstrogen->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->VaginalEstrogen->viewAttributes() ?>>
<?php echo $ivf_et_chart->VaginalEstrogen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
		<!-- GCSF -->
		<td<?php echo $ivf_et_chart->GCSF->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->GCSF->viewAttributes() ?>>
<?php echo $ivf_et_chart->GCSF->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<!-- ActivatedPRP -->
		<td<?php echo $ivf_et_chart->ActivatedPRP->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->ActivatedPRP->viewAttributes() ?>>
<?php echo $ivf_et_chart->ActivatedPRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
		<!-- ERA -->
		<td<?php echo $ivf_et_chart->ERA->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->ERA->viewAttributes() ?>>
<?php echo $ivf_et_chart->ERA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
		<!-- UCLcm -->
		<td<?php echo $ivf_et_chart->UCLcm->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->UCLcm->viewAttributes() ?>>
<?php echo $ivf_et_chart->UCLcm->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
		<!-- DATEOFSTART -->
		<td<?php echo $ivf_et_chart->DATEOFSTART->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->DATEOFSTART->viewAttributes() ?>>
<?php echo $ivf_et_chart->DATEOFSTART->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
		<!-- DATEOFEMBRYOTRANSFER -->
		<td<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<!-- DAYOFEMBRYOTRANSFER -->
		<td<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<!-- NOOFEMBRYOSTHAWED -->
		<td<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<!-- NOOFEMBRYOSTRANSFERRED -->
		<td<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<!-- DAYOFEMBRYOS -->
		<td<?php echo $ivf_et_chart->DAYOFEMBRYOS->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->DAYOFEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_et_chart->DAYOFEMBRYOS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<!-- CRYOPRESERVEDEMBRYOS -->
		<td<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
		<!-- Code1 -->
		<td<?php echo $ivf_et_chart->Code1->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->Code1->viewAttributes() ?>>
<?php echo $ivf_et_chart->Code1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
		<!-- Code2 -->
		<td<?php echo $ivf_et_chart->Code2->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->Code2->viewAttributes() ?>>
<?php echo $ivf_et_chart->Code2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
		<!-- CellStage1 -->
		<td<?php echo $ivf_et_chart->CellStage1->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->CellStage1->viewAttributes() ?>>
<?php echo $ivf_et_chart->CellStage1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
		<!-- CellStage2 -->
		<td<?php echo $ivf_et_chart->CellStage2->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->CellStage2->viewAttributes() ?>>
<?php echo $ivf_et_chart->CellStage2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
		<!-- Grade1 -->
		<td<?php echo $ivf_et_chart->Grade1->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->Grade1->viewAttributes() ?>>
<?php echo $ivf_et_chart->Grade1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
		<!-- Grade2 -->
		<td<?php echo $ivf_et_chart->Grade2->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->Grade2->viewAttributes() ?>>
<?php echo $ivf_et_chart->Grade2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
		<!-- PregnancyTestingWithSerumBetaHcG -->
		<td<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>>
<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
		<!-- ReviewDate -->
		<td<?php echo $ivf_et_chart->ReviewDate->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->ReviewDate->viewAttributes() ?>>
<?php echo $ivf_et_chart->ReviewDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<!-- ReviewDoctor -->
		<td<?php echo $ivf_et_chart->ReviewDoctor->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->ReviewDoctor->viewAttributes() ?>>
<?php echo $ivf_et_chart->ReviewDoctor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_et_chart->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_et_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_et_chart->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_et_chart_preview->ListOptions->render("body", "right", $ivf_et_chart_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_et_chart_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_et_chart_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_et_chart_preview->Pager)) $ivf_et_chart_preview->Pager = new PrevNextPager($ivf_et_chart_preview->StartRec, $ivf_et_chart_preview->DisplayRecs, $ivf_et_chart_preview->TotalRecs) ?>
<?php if ($ivf_et_chart_preview->Pager->RecordCount > 0 && $ivf_et_chart_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_et_chart_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_et_chart_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_et_chart_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_et_chart_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_et_chart_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_et_chart_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_et_chart_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_et_chart_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_et_chart_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_et_chart_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_et_chart_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_et_chart_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_et_chart_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_et_chart_preview->Recordset)
	$ivf_et_chart_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_et_chart_preview->terminate();
?>