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
$view_lab_resultreleasedd_preview = new view_lab_resultreleasedd_preview();

// Run the page
$view_lab_resultreleasedd_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleasedd_preview->Page_Render();
?>
<?php $view_lab_resultreleasedd_preview->showPageHeader(); ?>
<div class="card ew-grid view_lab_resultreleasedd"><!-- .card -->
<?php if ($view_lab_resultreleasedd_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_lab_resultreleasedd_preview->renderListOptions();

// Render list options (header, left)
$view_lab_resultreleasedd_preview->ListOptions->render("header", "left");
?>
<?php if ($view_lab_resultreleasedd->id->Visible) { // id ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->id) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->id->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->id->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->id->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->id->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->PatID->Visible) { // PatID ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->PatID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->PatID->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->PatID->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->PatID->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->PatID->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->PatientName) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->PatientName->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->PatientName->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->PatientName->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->PatientName->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Age->Visible) { // Age ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Age) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Age->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->Age->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Age->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Age->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Gender) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Gender->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->Gender->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Gender->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Gender->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->sid->Visible) { // sid ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->sid) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->sid->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->sid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->sid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->sid->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->sid->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->sid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->sid->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->ItemCode) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->ItemCode->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->ItemCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->ItemCode->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->ItemCode->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ItemCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->ItemCode->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->DEptCd) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->DEptCd->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->DEptCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->DEptCd->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->DEptCd->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DEptCd->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->DEptCd->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Resulted->Visible) { // Resulted ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Resulted) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Resulted->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->Resulted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Resulted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->Resulted->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Resulted->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Resulted->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Resulted->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Services->Visible) { // Services ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Services) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Services->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->Services->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->Services->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Services->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Services->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Services->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->LabReport->Visible) { // LabReport ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->LabReport) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->LabReport->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->LabReport->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->LabReport->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->LabReport->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->LabReport->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->LabReport->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->LabReport->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Pic1) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Pic1->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->Pic1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Pic1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->Pic1->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Pic1->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Pic1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Pic1->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Pic2) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Pic2->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->Pic2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Pic2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->Pic2->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Pic2->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Pic2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Pic2->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->TestUnit) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->TestUnit->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->TestUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->TestUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->TestUnit->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->TestUnit->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->TestUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->TestUnit->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RefValue->Visible) { // RefValue ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->RefValue) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->RefValue->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->RefValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->RefValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->RefValue->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->RefValue->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->RefValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->RefValue->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Order->Visible) { // Order ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Order) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Order->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->Order->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->Order->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Order->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Order->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Order->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Repeated->Visible) { // Repeated ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Repeated) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Repeated->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->Repeated->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Repeated->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->Repeated->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Repeated->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Repeated->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Repeated->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Vid->Visible) { // Vid ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Vid) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Vid->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->Vid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->Vid->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Vid->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Vid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Vid->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->invoiceId) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->invoiceId->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->invoiceId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->invoiceId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->invoiceId->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->invoiceId->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->invoiceId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->invoiceId->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrID->Visible) { // DrID ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->DrID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->DrID->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->DrID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->DrID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->DrID->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->DrID->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->DrID->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->DrCODE) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->DrCODE->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->DrCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->DrCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->DrCODE->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->DrCODE->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->DrCODE->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrName->Visible) { // DrName ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->DrName) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->DrName->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->DrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->DrName->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->DrName->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->DrName->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Department->Visible) { // Department ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Department) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Department->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->Department->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Department->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Department->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->Department->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->createddatetime) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->createddatetime->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->createddatetime->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->createddatetime->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->createddatetime->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->status->Visible) { // status ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->status) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->status->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->status->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->status->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->status->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->TestType) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->TestType->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->TestType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->TestType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->TestType->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->TestType->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->TestType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->TestType->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->ResultDate) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->ResultDate->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->ResultDate->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->ResultDate->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ResultDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->ResultDate->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->ResultedBy) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->ResultedBy->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->ResultedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->ResultedBy->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->ResultedBy->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ResultedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->ResultedBy->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->HospID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleasedd->HospID->headerCellClass() ?>"><?php echo $view_lab_resultreleasedd->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleasedd->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleasedd->HospID->Name ?>" data-sort-order="<?php echo $view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->HospID->Name && $view_lab_resultreleasedd_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_preview->SortField == $view_lab_resultreleasedd->HospID->Name) { ?><?php if ($view_lab_resultreleasedd_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleasedd_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_resultreleasedd_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_lab_resultreleasedd_preview->RecCount = 0;
$view_lab_resultreleasedd_preview->RowCnt = 0;
while ($view_lab_resultreleasedd_preview->Recordset && !$view_lab_resultreleasedd_preview->Recordset->EOF) {

	// Init row class and style
	$view_lab_resultreleasedd_preview->RecCount++;
	$view_lab_resultreleasedd_preview->RowCnt++;
	$view_lab_resultreleasedd_preview->CssStyle = "";
	$view_lab_resultreleasedd_preview->loadListRowValues($view_lab_resultreleasedd_preview->Recordset);

	// Render row
	$view_lab_resultreleasedd_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_lab_resultreleasedd_preview->resetAttributes();
	$view_lab_resultreleasedd_preview->renderListRow();

	// Render list options
	$view_lab_resultreleasedd_preview->renderListOptions();
?>
	<tr<?php echo $view_lab_resultreleasedd_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleasedd_preview->ListOptions->render("body", "left", $view_lab_resultreleasedd_preview->RowCnt);
?>
<?php if ($view_lab_resultreleasedd->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_lab_resultreleasedd->id->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->id->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $view_lab_resultreleasedd->PatID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->PatID->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_lab_resultreleasedd->PatientName->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->PatientName->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $view_lab_resultreleasedd->Age->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->Age->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $view_lab_resultreleasedd->Gender->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->Gender->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->sid->Visible) { // sid ?>
		<!-- sid -->
		<td<?php echo $view_lab_resultreleasedd->sid->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->sid->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->sid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td<?php echo $view_lab_resultreleasedd->ItemCode->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->ItemCode->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td<?php echo $view_lab_resultreleasedd->DEptCd->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->DEptCd->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Resulted->Visible) { // Resulted ?>
		<!-- Resulted -->
		<td<?php echo $view_lab_resultreleasedd->Resulted->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->Resulted->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Resulted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Services->Visible) { // Services ?>
		<!-- Services -->
		<td<?php echo $view_lab_resultreleasedd->Services->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->Services->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->LabReport->Visible) { // LabReport ?>
		<!-- LabReport -->
		<td<?php echo $view_lab_resultreleasedd->LabReport->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->LabReport->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->LabReport->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Pic1->Visible) { // Pic1 ?>
		<!-- Pic1 -->
		<td<?php echo $view_lab_resultreleasedd->Pic1->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->Pic1->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleasedd->Pic1, $view_lab_resultreleasedd->Pic1->getViewValue()) ?>
</span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Pic2->Visible) { // Pic2 ?>
		<!-- Pic2 -->
		<td<?php echo $view_lab_resultreleasedd->Pic2->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->Pic2->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleasedd->Pic2, $view_lab_resultreleasedd->Pic2->getViewValue()) ?>
</span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->TestUnit->Visible) { // TestUnit ?>
		<!-- TestUnit -->
		<td<?php echo $view_lab_resultreleasedd->TestUnit->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->TestUnit->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->TestUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RefValue->Visible) { // RefValue ?>
		<!-- RefValue -->
		<td<?php echo $view_lab_resultreleasedd->RefValue->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->RefValue->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->RefValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Order->Visible) { // Order ?>
		<!-- Order -->
		<td<?php echo $view_lab_resultreleasedd->Order->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->Order->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Repeated->Visible) { // Repeated ?>
		<!-- Repeated -->
		<td<?php echo $view_lab_resultreleasedd->Repeated->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->Repeated->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Repeated->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Vid->Visible) { // Vid ?>
		<!-- Vid -->
		<td<?php echo $view_lab_resultreleasedd->Vid->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->Vid->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->invoiceId->Visible) { // invoiceId ?>
		<!-- invoiceId -->
		<td<?php echo $view_lab_resultreleasedd->invoiceId->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->invoiceId->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->invoiceId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrID->Visible) { // DrID ?>
		<!-- DrID -->
		<td<?php echo $view_lab_resultreleasedd->DrID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->DrID->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DrID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrCODE->Visible) { // DrCODE ?>
		<!-- DrCODE -->
		<td<?php echo $view_lab_resultreleasedd->DrCODE->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->DrCODE->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DrCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td<?php echo $view_lab_resultreleasedd->DrName->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->DrName->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Department->Visible) { // Department ?>
		<!-- Department -->
		<td<?php echo $view_lab_resultreleasedd->Department->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->Department->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_lab_resultreleasedd->createddatetime->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $view_lab_resultreleasedd->status->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->status->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->TestType->Visible) { // TestType ?>
		<!-- TestType -->
		<td<?php echo $view_lab_resultreleasedd->TestType->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->TestType->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->TestType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $view_lab_resultreleasedd->ResultDate->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->ResultDate->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td<?php echo $view_lab_resultreleasedd->ResultedBy->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->ResultedBy->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleasedd->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_lab_resultreleasedd->HospID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleasedd->HospID->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleasedd_preview->ListOptions->render("body", "right", $view_lab_resultreleasedd_preview->RowCnt);
?>
	</tr>
<?php
	$view_lab_resultreleasedd_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_lab_resultreleasedd_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_lab_resultreleasedd_preview->Pager)) $view_lab_resultreleasedd_preview->Pager = new PrevNextPager($view_lab_resultreleasedd_preview->StartRec, $view_lab_resultreleasedd_preview->DisplayRecs, $view_lab_resultreleasedd_preview->TotalRecs) ?>
<?php if ($view_lab_resultreleasedd_preview->Pager->RecordCount > 0 && $view_lab_resultreleasedd_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_lab_resultreleasedd_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_lab_resultreleasedd_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_lab_resultreleasedd_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_lab_resultreleasedd_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_lab_resultreleasedd_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_lab_resultreleasedd_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_lab_resultreleasedd_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_lab_resultreleasedd_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_resultreleasedd_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_resultreleasedd_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_resultreleasedd_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_lab_resultreleasedd_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_lab_resultreleasedd_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_lab_resultreleasedd_preview->Recordset)
	$view_lab_resultreleasedd_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_lab_resultreleasedd_preview->terminate();
?>