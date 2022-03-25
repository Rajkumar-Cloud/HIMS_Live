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
$view_labreport_print_preview = new view_labreport_print_preview();

// Run the page
$view_labreport_print_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_labreport_print_preview->Page_Render();
?>
<?php $view_labreport_print_preview->showPageHeader(); ?>
<div class="card ew-grid view_labreport_print"><!-- .card -->
<?php if ($view_labreport_print_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_labreport_print_preview->renderListOptions();

// Render list options (header, left)
$view_labreport_print_preview->ListOptions->render("header", "left");
?>
<?php if ($view_labreport_print->id->Visible) { // id ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->id) == "") { ?>
		<th class="<?php echo $view_labreport_print->id->headerCellClass() ?>"><?php echo $view_labreport_print->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->id->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->id->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->id->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PatID->Visible) { // PatID ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->PatID) == "") { ?>
		<th class="<?php echo $view_labreport_print->PatID->headerCellClass() ?>"><?php echo $view_labreport_print->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->PatID->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->PatID->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->PatID->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PatientName->Visible) { // PatientName ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->PatientName) == "") { ?>
		<th class="<?php echo $view_labreport_print->PatientName->headerCellClass() ?>"><?php echo $view_labreport_print->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->PatientName->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->PatientName->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->PatientName->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Age->Visible) { // Age ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Age) == "") { ?>
		<th class="<?php echo $view_labreport_print->Age->headerCellClass() ?>"><?php echo $view_labreport_print->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Age->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Age->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Age->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Gender->Visible) { // Gender ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Gender) == "") { ?>
		<th class="<?php echo $view_labreport_print->Gender->headerCellClass() ?>"><?php echo $view_labreport_print->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Gender->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Gender->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Gender->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->sid->Visible) { // sid ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->sid) == "") { ?>
		<th class="<?php echo $view_labreport_print->sid->headerCellClass() ?>"><?php echo $view_labreport_print->sid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->sid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->sid->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->sid->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->sid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->sid->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->ItemCode) == "") { ?>
		<th class="<?php echo $view_labreport_print->ItemCode->headerCellClass() ?>"><?php echo $view_labreport_print->ItemCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->ItemCode->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->ItemCode->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->ItemCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->ItemCode->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->DEptCd) == "") { ?>
		<th class="<?php echo $view_labreport_print->DEptCd->headerCellClass() ?>"><?php echo $view_labreport_print->DEptCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->DEptCd->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->DEptCd->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->DEptCd->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->DEptCd->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Resulted->Visible) { // Resulted ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Resulted) == "") { ?>
		<th class="<?php echo $view_labreport_print->Resulted->headerCellClass() ?>"><?php echo $view_labreport_print->Resulted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Resulted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Resulted->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Resulted->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Resulted->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Resulted->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Services->Visible) { // Services ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Services) == "") { ?>
		<th class="<?php echo $view_labreport_print->Services->headerCellClass() ?>"><?php echo $view_labreport_print->Services->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Services->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Services->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Services->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Services->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Pic1) == "") { ?>
		<th class="<?php echo $view_labreport_print->Pic1->headerCellClass() ?>"><?php echo $view_labreport_print->Pic1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Pic1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Pic1->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Pic1->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Pic1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Pic1->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Pic2) == "") { ?>
		<th class="<?php echo $view_labreport_print->Pic2->headerCellClass() ?>"><?php echo $view_labreport_print->Pic2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Pic2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Pic2->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Pic2->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Pic2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Pic2->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->TestUnit) == "") { ?>
		<th class="<?php echo $view_labreport_print->TestUnit->headerCellClass() ?>"><?php echo $view_labreport_print->TestUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->TestUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->TestUnit->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->TestUnit->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->TestUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->TestUnit->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Order->Visible) { // Order ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Order) == "") { ?>
		<th class="<?php echo $view_labreport_print->Order->headerCellClass() ?>"><?php echo $view_labreport_print->Order->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Order->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Order->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Order->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Order->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Repeated->Visible) { // Repeated ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Repeated) == "") { ?>
		<th class="<?php echo $view_labreport_print->Repeated->headerCellClass() ?>"><?php echo $view_labreport_print->Repeated->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Repeated->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Repeated->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Repeated->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Repeated->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Repeated->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Vid->Visible) { // Vid ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Vid) == "") { ?>
		<th class="<?php echo $view_labreport_print->Vid->headerCellClass() ?>"><?php echo $view_labreport_print->Vid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Vid->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Vid->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Vid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Vid->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->invoiceId) == "") { ?>
		<th class="<?php echo $view_labreport_print->invoiceId->headerCellClass() ?>"><?php echo $view_labreport_print->invoiceId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->invoiceId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->invoiceId->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->invoiceId->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->invoiceId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->invoiceId->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DrID->Visible) { // DrID ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->DrID) == "") { ?>
		<th class="<?php echo $view_labreport_print->DrID->headerCellClass() ?>"><?php echo $view_labreport_print->DrID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->DrID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->DrID->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->DrID->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->DrID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->DrID->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->DrCODE) == "") { ?>
		<th class="<?php echo $view_labreport_print->DrCODE->headerCellClass() ?>"><?php echo $view_labreport_print->DrCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->DrCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->DrCODE->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->DrCODE->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->DrCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->DrCODE->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DrName->Visible) { // DrName ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->DrName) == "") { ?>
		<th class="<?php echo $view_labreport_print->DrName->headerCellClass() ?>"><?php echo $view_labreport_print->DrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->DrName->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->DrName->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->DrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->DrName->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Department->Visible) { // Department ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Department) == "") { ?>
		<th class="<?php echo $view_labreport_print->Department->headerCellClass() ?>"><?php echo $view_labreport_print->Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Department->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Department->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Department->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Department->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->createddatetime) == "") { ?>
		<th class="<?php echo $view_labreport_print->createddatetime->headerCellClass() ?>"><?php echo $view_labreport_print->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->createddatetime->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->createddatetime->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->createddatetime->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->status->Visible) { // status ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->status) == "") { ?>
		<th class="<?php echo $view_labreport_print->status->headerCellClass() ?>"><?php echo $view_labreport_print->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->status->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->status->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->status->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->TestType->Visible) { // TestType ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->TestType) == "") { ?>
		<th class="<?php echo $view_labreport_print->TestType->headerCellClass() ?>"><?php echo $view_labreport_print->TestType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->TestType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->TestType->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->TestType->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->TestType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->TestType->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->ResultDate) == "") { ?>
		<th class="<?php echo $view_labreport_print->ResultDate->headerCellClass() ?>"><?php echo $view_labreport_print->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->ResultDate->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->ResultDate->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->ResultDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->ResultDate->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->ResultedBy) == "") { ?>
		<th class="<?php echo $view_labreport_print->ResultedBy->headerCellClass() ?>"><?php echo $view_labreport_print->ResultedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->ResultedBy->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->ResultedBy->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->ResultedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->ResultedBy->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Printed->Visible) { // Printed ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->Printed) == "") { ?>
		<th class="<?php echo $view_labreport_print->Printed->headerCellClass() ?>"><?php echo $view_labreport_print->Printed->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->Printed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->Printed->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->Printed->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->Printed->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->Printed->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->PrintBy) == "") { ?>
		<th class="<?php echo $view_labreport_print->PrintBy->headerCellClass() ?>"><?php echo $view_labreport_print->PrintBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->PrintBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->PrintBy->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->PrintBy->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->PrintBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->PrintBy->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_labreport_print->SortUrl($view_labreport_print->PrintDate) == "") { ?>
		<th class="<?php echo $view_labreport_print->PrintDate->headerCellClass() ?>"><?php echo $view_labreport_print->PrintDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_labreport_print->PrintDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_labreport_print->PrintDate->Name ?>" data-sort-order="<?php echo $view_labreport_print_preview->SortField == $view_labreport_print->PrintDate->Name && $view_labreport_print_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_labreport_print->PrintDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_labreport_print_preview->SortField == $view_labreport_print->PrintDate->Name) { ?><?php if ($view_labreport_print_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_labreport_print_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_labreport_print_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_labreport_print_preview->RecCount = 0;
$view_labreport_print_preview->RowCnt = 0;
while ($view_labreport_print_preview->Recordset && !$view_labreport_print_preview->Recordset->EOF) {

	// Init row class and style
	$view_labreport_print_preview->RecCount++;
	$view_labreport_print_preview->RowCnt++;
	$view_labreport_print_preview->CssStyle = "";
	$view_labreport_print_preview->loadListRowValues($view_labreport_print_preview->Recordset);

	// Render row
	$view_labreport_print_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_labreport_print_preview->resetAttributes();
	$view_labreport_print_preview->renderListRow();

	// Render list options
	$view_labreport_print_preview->renderListOptions();
?>
	<tr<?php echo $view_labreport_print_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_labreport_print_preview->ListOptions->render("body", "left", $view_labreport_print_preview->RowCnt);
?>
<?php if ($view_labreport_print->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_labreport_print->id->cellAttributes() ?>>
<span<?php echo $view_labreport_print->id->viewAttributes() ?>>
<?php echo $view_labreport_print->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $view_labreport_print->PatID->cellAttributes() ?>>
<span<?php echo $view_labreport_print->PatID->viewAttributes() ?>>
<?php echo $view_labreport_print->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_labreport_print->PatientName->cellAttributes() ?>>
<span<?php echo $view_labreport_print->PatientName->viewAttributes() ?>>
<?php echo $view_labreport_print->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $view_labreport_print->Age->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Age->viewAttributes() ?>>
<?php echo $view_labreport_print->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $view_labreport_print->Gender->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Gender->viewAttributes() ?>>
<?php echo $view_labreport_print->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->sid->Visible) { // sid ?>
		<!-- sid -->
		<td<?php echo $view_labreport_print->sid->cellAttributes() ?>>
<span<?php echo $view_labreport_print->sid->viewAttributes() ?>>
<?php echo $view_labreport_print->sid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td<?php echo $view_labreport_print->ItemCode->cellAttributes() ?>>
<span<?php echo $view_labreport_print->ItemCode->viewAttributes() ?>>
<?php echo $view_labreport_print->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td<?php echo $view_labreport_print->DEptCd->cellAttributes() ?>>
<span<?php echo $view_labreport_print->DEptCd->viewAttributes() ?>>
<?php echo $view_labreport_print->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Resulted->Visible) { // Resulted ?>
		<!-- Resulted -->
		<td<?php echo $view_labreport_print->Resulted->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Resulted->viewAttributes() ?>>
<?php echo $view_labreport_print->Resulted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Services->Visible) { // Services ?>
		<!-- Services -->
		<td<?php echo $view_labreport_print->Services->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Services->viewAttributes() ?>>
<?php echo $view_labreport_print->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Pic1->Visible) { // Pic1 ?>
		<!-- Pic1 -->
		<td<?php echo $view_labreport_print->Pic1->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Pic1->viewAttributes() ?>>
<?php echo $view_labreport_print->Pic1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Pic2->Visible) { // Pic2 ?>
		<!-- Pic2 -->
		<td<?php echo $view_labreport_print->Pic2->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Pic2->viewAttributes() ?>>
<?php echo $view_labreport_print->Pic2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->TestUnit->Visible) { // TestUnit ?>
		<!-- TestUnit -->
		<td<?php echo $view_labreport_print->TestUnit->cellAttributes() ?>>
<span<?php echo $view_labreport_print->TestUnit->viewAttributes() ?>>
<?php echo $view_labreport_print->TestUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Order->Visible) { // Order ?>
		<!-- Order -->
		<td<?php echo $view_labreport_print->Order->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Order->viewAttributes() ?>>
<?php echo $view_labreport_print->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Repeated->Visible) { // Repeated ?>
		<!-- Repeated -->
		<td<?php echo $view_labreport_print->Repeated->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Repeated->viewAttributes() ?>>
<?php echo $view_labreport_print->Repeated->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Vid->Visible) { // Vid ?>
		<!-- Vid -->
		<td<?php echo $view_labreport_print->Vid->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Vid->viewAttributes() ?>>
<?php echo $view_labreport_print->Vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->invoiceId->Visible) { // invoiceId ?>
		<!-- invoiceId -->
		<td<?php echo $view_labreport_print->invoiceId->cellAttributes() ?>>
<span<?php echo $view_labreport_print->invoiceId->viewAttributes() ?>>
<?php echo $view_labreport_print->invoiceId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->DrID->Visible) { // DrID ?>
		<!-- DrID -->
		<td<?php echo $view_labreport_print->DrID->cellAttributes() ?>>
<span<?php echo $view_labreport_print->DrID->viewAttributes() ?>>
<?php echo $view_labreport_print->DrID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->DrCODE->Visible) { // DrCODE ?>
		<!-- DrCODE -->
		<td<?php echo $view_labreport_print->DrCODE->cellAttributes() ?>>
<span<?php echo $view_labreport_print->DrCODE->viewAttributes() ?>>
<?php echo $view_labreport_print->DrCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td<?php echo $view_labreport_print->DrName->cellAttributes() ?>>
<span<?php echo $view_labreport_print->DrName->viewAttributes() ?>>
<?php echo $view_labreport_print->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Department->Visible) { // Department ?>
		<!-- Department -->
		<td<?php echo $view_labreport_print->Department->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Department->viewAttributes() ?>>
<?php echo $view_labreport_print->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_labreport_print->createddatetime->cellAttributes() ?>>
<span<?php echo $view_labreport_print->createddatetime->viewAttributes() ?>>
<?php echo $view_labreport_print->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $view_labreport_print->status->cellAttributes() ?>>
<span<?php echo $view_labreport_print->status->viewAttributes() ?>>
<?php echo $view_labreport_print->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->TestType->Visible) { // TestType ?>
		<!-- TestType -->
		<td<?php echo $view_labreport_print->TestType->cellAttributes() ?>>
<span<?php echo $view_labreport_print->TestType->viewAttributes() ?>>
<?php echo $view_labreport_print->TestType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $view_labreport_print->ResultDate->cellAttributes() ?>>
<span<?php echo $view_labreport_print->ResultDate->viewAttributes() ?>>
<?php echo $view_labreport_print->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td<?php echo $view_labreport_print->ResultedBy->cellAttributes() ?>>
<span<?php echo $view_labreport_print->ResultedBy->viewAttributes() ?>>
<?php echo $view_labreport_print->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->Printed->Visible) { // Printed ?>
		<!-- Printed -->
		<td<?php echo $view_labreport_print->Printed->cellAttributes() ?>>
<span<?php echo $view_labreport_print->Printed->viewAttributes() ?>>
<?php echo $view_labreport_print->Printed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->PrintBy->Visible) { // PrintBy ?>
		<!-- PrintBy -->
		<td<?php echo $view_labreport_print->PrintBy->cellAttributes() ?>>
<span<?php echo $view_labreport_print->PrintBy->viewAttributes() ?>>
<?php echo $view_labreport_print->PrintBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_labreport_print->PrintDate->Visible) { // PrintDate ?>
		<!-- PrintDate -->
		<td<?php echo $view_labreport_print->PrintDate->cellAttributes() ?>>
<span<?php echo $view_labreport_print->PrintDate->viewAttributes() ?>>
<?php echo $view_labreport_print->PrintDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_labreport_print_preview->ListOptions->render("body", "right", $view_labreport_print_preview->RowCnt);
?>
	</tr>
<?php
	$view_labreport_print_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_labreport_print_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_labreport_print_preview->Pager)) $view_labreport_print_preview->Pager = new PrevNextPager($view_labreport_print_preview->StartRec, $view_labreport_print_preview->DisplayRecs, $view_labreport_print_preview->TotalRecs) ?>
<?php if ($view_labreport_print_preview->Pager->RecordCount > 0 && $view_labreport_print_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_labreport_print_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_labreport_print_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_labreport_print_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_labreport_print_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_labreport_print_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_labreport_print_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_labreport_print_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_labreport_print_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_labreport_print_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_labreport_print_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_labreport_print_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_labreport_print_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_labreport_print_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_labreport_print_preview->Recordset)
	$view_labreport_print_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_labreport_print_preview->terminate();
?>