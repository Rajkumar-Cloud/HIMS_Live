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
$view_lab_resultreleased_preview = new view_lab_resultreleased_preview();

// Run the page
$view_lab_resultreleased_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleased_preview->Page_Render();
?>
<?php $view_lab_resultreleased_preview->showPageHeader(); ?>
<div class="card ew-grid view_lab_resultreleased"><!-- .card -->
<?php if ($view_lab_resultreleased_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_lab_resultreleased_preview->renderListOptions();

// Render list options (header, left)
$view_lab_resultreleased_preview->ListOptions->render("header", "left");
?>
<?php if ($view_lab_resultreleased->id->Visible) { // id ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->id) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->id->headerCellClass() ?>"><?php echo $view_lab_resultreleased->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->id->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->id->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->id->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->PatID->Visible) { // PatID ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->PatID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->PatID->headerCellClass() ?>"><?php echo $view_lab_resultreleased->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->PatID->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->PatID->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->PatID->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->PatientName) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->PatientName->headerCellClass() ?>"><?php echo $view_lab_resultreleased->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->PatientName->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->PatientName->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->PatientName->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Age->Visible) { // Age ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->Age) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->Age->headerCellClass() ?>"><?php echo $view_lab_resultreleased->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->Age->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Age->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Age->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->Gender) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->Gender->headerCellClass() ?>"><?php echo $view_lab_resultreleased->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->Gender->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Gender->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Gender->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->sid->Visible) { // sid ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->sid) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->sid->headerCellClass() ?>"><?php echo $view_lab_resultreleased->sid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->sid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->sid->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->sid->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->sid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->sid->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->ItemCode) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->ItemCode->headerCellClass() ?>"><?php echo $view_lab_resultreleased->ItemCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->ItemCode->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->ItemCode->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->ItemCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->ItemCode->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->DEptCd) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->DEptCd->headerCellClass() ?>"><?php echo $view_lab_resultreleased->DEptCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->DEptCd->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->DEptCd->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DEptCd->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->DEptCd->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Resulted->Visible) { // Resulted ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->Resulted) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->Resulted->headerCellClass() ?>"><?php echo $view_lab_resultreleased->Resulted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->Resulted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->Resulted->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Resulted->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Resulted->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Resulted->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Services->Visible) { // Services ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->Services) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->Services->headerCellClass() ?>"><?php echo $view_lab_resultreleased->Services->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->Services->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Services->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Services->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Services->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->LabReport->Visible) { // LabReport ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->LabReport) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->LabReport->headerCellClass() ?>"><?php echo $view_lab_resultreleased->LabReport->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->LabReport->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->LabReport->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->LabReport->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->LabReport->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->LabReport->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->Pic1) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->Pic1->headerCellClass() ?>"><?php echo $view_lab_resultreleased->Pic1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->Pic1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->Pic1->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Pic1->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Pic1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Pic1->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->Pic2) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->Pic2->headerCellClass() ?>"><?php echo $view_lab_resultreleased->Pic2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->Pic2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->Pic2->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Pic2->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Pic2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Pic2->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->TestUnit) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->TestUnit->headerCellClass() ?>"><?php echo $view_lab_resultreleased->TestUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->TestUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->TestUnit->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->TestUnit->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->TestUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->TestUnit->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->RefValue->Visible) { // RefValue ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->RefValue) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->RefValue->headerCellClass() ?>"><?php echo $view_lab_resultreleased->RefValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->RefValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->RefValue->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->RefValue->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->RefValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->RefValue->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Order->Visible) { // Order ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->Order) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->Order->headerCellClass() ?>"><?php echo $view_lab_resultreleased->Order->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->Order->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Order->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Order->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Order->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Repeated->Visible) { // Repeated ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->Repeated) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->Repeated->headerCellClass() ?>"><?php echo $view_lab_resultreleased->Repeated->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->Repeated->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->Repeated->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Repeated->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Repeated->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Repeated->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Vid->Visible) { // Vid ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->Vid) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->Vid->headerCellClass() ?>"><?php echo $view_lab_resultreleased->Vid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->Vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->Vid->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Vid->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Vid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Vid->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->invoiceId) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->invoiceId->headerCellClass() ?>"><?php echo $view_lab_resultreleased->invoiceId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->invoiceId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->invoiceId->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->invoiceId->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->invoiceId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->invoiceId->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->DrID->Visible) { // DrID ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->DrID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->DrID->headerCellClass() ?>"><?php echo $view_lab_resultreleased->DrID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->DrID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->DrID->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->DrID->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DrID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->DrID->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->DrCODE) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->DrCODE->headerCellClass() ?>"><?php echo $view_lab_resultreleased->DrCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->DrCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->DrCODE->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->DrCODE->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DrCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->DrCODE->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->DrName->Visible) { // DrName ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->DrName) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->DrName->headerCellClass() ?>"><?php echo $view_lab_resultreleased->DrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->DrName->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->DrName->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->DrName->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Department->Visible) { // Department ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->Department) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->Department->headerCellClass() ?>"><?php echo $view_lab_resultreleased->Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->Department->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Department->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Department->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->Department->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->createddatetime) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->createddatetime->headerCellClass() ?>"><?php echo $view_lab_resultreleased->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->createddatetime->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->createddatetime->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->createddatetime->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->status->Visible) { // status ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->status) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->status->headerCellClass() ?>"><?php echo $view_lab_resultreleased->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->status->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->status->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->status->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->TestType) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->TestType->headerCellClass() ?>"><?php echo $view_lab_resultreleased->TestType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->TestType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->TestType->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->TestType->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->TestType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->TestType->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->ResultDate) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->ResultDate->headerCellClass() ?>"><?php echo $view_lab_resultreleased->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->ResultDate->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->ResultDate->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->ResultDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->ResultDate->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->ResultedBy) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->ResultedBy->headerCellClass() ?>"><?php echo $view_lab_resultreleased->ResultedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->ResultedBy->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->ResultedBy->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->ResultedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->ResultedBy->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased->HospID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased->HospID->headerCellClass() ?>"><?php echo $view_lab_resultreleased->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased->HospID->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->HospID->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased->HospID->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_resultreleased_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_lab_resultreleased_preview->RecCount = 0;
$view_lab_resultreleased_preview->RowCnt = 0;
while ($view_lab_resultreleased_preview->Recordset && !$view_lab_resultreleased_preview->Recordset->EOF) {

	// Init row class and style
	$view_lab_resultreleased_preview->RecCount++;
	$view_lab_resultreleased_preview->RowCnt++;
	$view_lab_resultreleased_preview->CssStyle = "";
	$view_lab_resultreleased_preview->loadListRowValues($view_lab_resultreleased_preview->Recordset);

	// Render row
	$view_lab_resultreleased_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_lab_resultreleased_preview->resetAttributes();
	$view_lab_resultreleased_preview->renderListRow();

	// Render list options
	$view_lab_resultreleased_preview->renderListOptions();
?>
	<tr<?php echo $view_lab_resultreleased_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleased_preview->ListOptions->render("body", "left", $view_lab_resultreleased_preview->RowCnt);
?>
<?php if ($view_lab_resultreleased->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_lab_resultreleased->id->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->id->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $view_lab_resultreleased->PatID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->PatID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_lab_resultreleased->PatientName->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->PatientName->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $view_lab_resultreleased->Age->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->Age->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $view_lab_resultreleased->Gender->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->Gender->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->sid->Visible) { // sid ?>
		<!-- sid -->
		<td<?php echo $view_lab_resultreleased->sid->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->sid->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->sid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td<?php echo $view_lab_resultreleased->ItemCode->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->ItemCode->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td<?php echo $view_lab_resultreleased->DEptCd->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->DEptCd->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->Resulted->Visible) { // Resulted ?>
		<!-- Resulted -->
		<td<?php echo $view_lab_resultreleased->Resulted->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->Resulted->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Resulted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->Services->Visible) { // Services ?>
		<!-- Services -->
		<td<?php echo $view_lab_resultreleased->Services->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->Services->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->LabReport->Visible) { // LabReport ?>
		<!-- LabReport -->
		<td<?php echo $view_lab_resultreleased->LabReport->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->LabReport->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->LabReport->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->Pic1->Visible) { // Pic1 ?>
		<!-- Pic1 -->
		<td<?php echo $view_lab_resultreleased->Pic1->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->Pic1->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleased->Pic1, $view_lab_resultreleased->Pic1->getViewValue()) ?>
</span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->Pic2->Visible) { // Pic2 ?>
		<!-- Pic2 -->
		<td<?php echo $view_lab_resultreleased->Pic2->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->Pic2->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleased->Pic2, $view_lab_resultreleased->Pic2->getViewValue()) ?>
</span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->TestUnit->Visible) { // TestUnit ?>
		<!-- TestUnit -->
		<td<?php echo $view_lab_resultreleased->TestUnit->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->TestUnit->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->TestUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->RefValue->Visible) { // RefValue ?>
		<!-- RefValue -->
		<td<?php echo $view_lab_resultreleased->RefValue->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->RefValue->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->RefValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->Order->Visible) { // Order ?>
		<!-- Order -->
		<td<?php echo $view_lab_resultreleased->Order->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->Order->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->Repeated->Visible) { // Repeated ?>
		<!-- Repeated -->
		<td<?php echo $view_lab_resultreleased->Repeated->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->Repeated->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Repeated->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->Vid->Visible) { // Vid ?>
		<!-- Vid -->
		<td<?php echo $view_lab_resultreleased->Vid->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->Vid->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->invoiceId->Visible) { // invoiceId ?>
		<!-- invoiceId -->
		<td<?php echo $view_lab_resultreleased->invoiceId->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->invoiceId->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->invoiceId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->DrID->Visible) { // DrID ?>
		<!-- DrID -->
		<td<?php echo $view_lab_resultreleased->DrID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->DrID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DrID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->DrCODE->Visible) { // DrCODE ?>
		<!-- DrCODE -->
		<td<?php echo $view_lab_resultreleased->DrCODE->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->DrCODE->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DrCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td<?php echo $view_lab_resultreleased->DrName->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->DrName->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->Department->Visible) { // Department ?>
		<!-- Department -->
		<td<?php echo $view_lab_resultreleased->Department->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->Department->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_lab_resultreleased->createddatetime->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $view_lab_resultreleased->status->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->status->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->TestType->Visible) { // TestType ?>
		<!-- TestType -->
		<td<?php echo $view_lab_resultreleased->TestType->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->TestType->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->TestType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $view_lab_resultreleased->ResultDate->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->ResultDate->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td<?php echo $view_lab_resultreleased->ResultedBy->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->ResultedBy->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_lab_resultreleased->HospID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased->HospID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleased_preview->ListOptions->render("body", "right", $view_lab_resultreleased_preview->RowCnt);
?>
	</tr>
<?php
	$view_lab_resultreleased_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_lab_resultreleased_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_lab_resultreleased_preview->Pager)) $view_lab_resultreleased_preview->Pager = new PrevNextPager($view_lab_resultreleased_preview->StartRec, $view_lab_resultreleased_preview->DisplayRecs, $view_lab_resultreleased_preview->TotalRecs) ?>
<?php if ($view_lab_resultreleased_preview->Pager->RecordCount > 0 && $view_lab_resultreleased_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_lab_resultreleased_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_lab_resultreleased_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_lab_resultreleased_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_lab_resultreleased_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_lab_resultreleased_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_lab_resultreleased_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_lab_resultreleased_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_lab_resultreleased_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_resultreleased_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_resultreleased_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_resultreleased_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_lab_resultreleased_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_lab_resultreleased_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_lab_resultreleased_preview->Recordset)
	$view_lab_resultreleased_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_lab_resultreleased_preview->terminate();
?>