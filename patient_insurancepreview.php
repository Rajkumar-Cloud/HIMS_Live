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
$patient_insurance_preview = new patient_insurance_preview();

// Run the page
$patient_insurance_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_insurance_preview->Page_Render();
?>
<?php $patient_insurance_preview->showPageHeader(); ?>
<div class="card ew-grid patient_insurance"><!-- .card -->
<?php if ($patient_insurance_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_insurance_preview->renderListOptions();

// Render list options (header, left)
$patient_insurance_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_insurance->id->Visible) { // id ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->id) == "") { ?>
		<th class="<?php echo $patient_insurance->id->headerCellClass() ?>"><?php echo $patient_insurance->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->id->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->id->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->id->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->Reception->Visible) { // Reception ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->Reception) == "") { ?>
		<th class="<?php echo $patient_insurance->Reception->headerCellClass() ?>"><?php echo $patient_insurance->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->Reception->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->Reception->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->Reception->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->PatientId) == "") { ?>
		<th class="<?php echo $patient_insurance->PatientId->headerCellClass() ?>"><?php echo $patient_insurance->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->PatientId->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->PatientId->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->PatientId->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->PatientName) == "") { ?>
		<th class="<?php echo $patient_insurance->PatientName->headerCellClass() ?>"><?php echo $patient_insurance->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->PatientName->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->PatientName->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->PatientName->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->Company->Visible) { // Company ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->Company) == "") { ?>
		<th class="<?php echo $patient_insurance->Company->headerCellClass() ?>"><?php echo $patient_insurance->Company->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->Company->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->Company->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->Company->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->Company->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->Company->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->AddressInsuranceCarierName) == "") { ?>
		<th class="<?php echo $patient_insurance->AddressInsuranceCarierName->headerCellClass() ?>"><?php echo $patient_insurance->AddressInsuranceCarierName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->AddressInsuranceCarierName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->AddressInsuranceCarierName->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->AddressInsuranceCarierName->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->AddressInsuranceCarierName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->AddressInsuranceCarierName->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->ContactName->Visible) { // ContactName ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->ContactName) == "") { ?>
		<th class="<?php echo $patient_insurance->ContactName->headerCellClass() ?>"><?php echo $patient_insurance->ContactName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->ContactName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->ContactName->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->ContactName->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->ContactName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->ContactName->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->ContactMobile->Visible) { // ContactMobile ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->ContactMobile) == "") { ?>
		<th class="<?php echo $patient_insurance->ContactMobile->headerCellClass() ?>"><?php echo $patient_insurance->ContactMobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->ContactMobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->ContactMobile->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->ContactMobile->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->ContactMobile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->ContactMobile->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PolicyType->Visible) { // PolicyType ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->PolicyType) == "") { ?>
		<th class="<?php echo $patient_insurance->PolicyType->headerCellClass() ?>"><?php echo $patient_insurance->PolicyType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->PolicyType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->PolicyType->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->PolicyType->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->PolicyType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->PolicyType->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PolicyName->Visible) { // PolicyName ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->PolicyName) == "") { ?>
		<th class="<?php echo $patient_insurance->PolicyName->headerCellClass() ?>"><?php echo $patient_insurance->PolicyName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->PolicyName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->PolicyName->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->PolicyName->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->PolicyName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->PolicyName->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PolicyNo->Visible) { // PolicyNo ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->PolicyNo) == "") { ?>
		<th class="<?php echo $patient_insurance->PolicyNo->headerCellClass() ?>"><?php echo $patient_insurance->PolicyNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->PolicyNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->PolicyNo->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->PolicyNo->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->PolicyNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->PolicyNo->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PolicyAmount->Visible) { // PolicyAmount ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->PolicyAmount) == "") { ?>
		<th class="<?php echo $patient_insurance->PolicyAmount->headerCellClass() ?>"><?php echo $patient_insurance->PolicyAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->PolicyAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->PolicyAmount->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->PolicyAmount->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->PolicyAmount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->PolicyAmount->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->RefLetterNo->Visible) { // RefLetterNo ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->RefLetterNo) == "") { ?>
		<th class="<?php echo $patient_insurance->RefLetterNo->headerCellClass() ?>"><?php echo $patient_insurance->RefLetterNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->RefLetterNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->RefLetterNo->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->RefLetterNo->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->RefLetterNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->RefLetterNo->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->ReferenceBy->Visible) { // ReferenceBy ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->ReferenceBy) == "") { ?>
		<th class="<?php echo $patient_insurance->ReferenceBy->headerCellClass() ?>"><?php echo $patient_insurance->ReferenceBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->ReferenceBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->ReferenceBy->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->ReferenceBy->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->ReferenceBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->ReferenceBy->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->ReferenceDate->Visible) { // ReferenceDate ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->ReferenceDate) == "") { ?>
		<th class="<?php echo $patient_insurance->ReferenceDate->headerCellClass() ?>"><?php echo $patient_insurance->ReferenceDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->ReferenceDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->ReferenceDate->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->ReferenceDate->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->ReferenceDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->ReferenceDate->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->createdby->Visible) { // createdby ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->createdby) == "") { ?>
		<th class="<?php echo $patient_insurance->createdby->headerCellClass() ?>"><?php echo $patient_insurance->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->createdby->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->createdby->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->createdby->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->createddatetime) == "") { ?>
		<th class="<?php echo $patient_insurance->createddatetime->headerCellClass() ?>"><?php echo $patient_insurance->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->createddatetime->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->createddatetime->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->createddatetime->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->modifiedby) == "") { ?>
		<th class="<?php echo $patient_insurance->modifiedby->headerCellClass() ?>"><?php echo $patient_insurance->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->modifiedby->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->modifiedby->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->modifiedby->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_insurance->modifieddatetime->headerCellClass() ?>"><?php echo $patient_insurance->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->modifieddatetime->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->modifieddatetime->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->modifieddatetime->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance->mrnno) == "") { ?>
		<th class="<?php echo $patient_insurance->mrnno->headerCellClass() ?>"><?php echo $patient_insurance->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_insurance->mrnno->Name ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance->mrnno->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_insurance->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance->mrnno->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_insurance_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_insurance_preview->RecCount = 0;
$patient_insurance_preview->RowCnt = 0;
while ($patient_insurance_preview->Recordset && !$patient_insurance_preview->Recordset->EOF) {

	// Init row class and style
	$patient_insurance_preview->RecCount++;
	$patient_insurance_preview->RowCnt++;
	$patient_insurance_preview->CssStyle = "";
	$patient_insurance_preview->loadListRowValues($patient_insurance_preview->Recordset);

	// Render row
	$patient_insurance_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_insurance_preview->resetAttributes();
	$patient_insurance_preview->renderListRow();

	// Render list options
	$patient_insurance_preview->renderListOptions();
?>
	<tr<?php echo $patient_insurance_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_insurance_preview->ListOptions->render("body", "left", $patient_insurance_preview->RowCnt);
?>
<?php if ($patient_insurance->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_insurance->id->cellAttributes() ?>>
<span<?php echo $patient_insurance->id->viewAttributes() ?>>
<?php echo $patient_insurance->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_insurance->Reception->cellAttributes() ?>>
<span<?php echo $patient_insurance->Reception->viewAttributes() ?>>
<?php echo $patient_insurance->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_insurance->PatientId->cellAttributes() ?>>
<span<?php echo $patient_insurance->PatientId->viewAttributes() ?>>
<?php echo $patient_insurance->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_insurance->PatientName->cellAttributes() ?>>
<span<?php echo $patient_insurance->PatientName->viewAttributes() ?>>
<?php echo $patient_insurance->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->Company->Visible) { // Company ?>
		<!-- Company -->
		<td<?php echo $patient_insurance->Company->cellAttributes() ?>>
<span<?php echo $patient_insurance->Company->viewAttributes() ?>>
<?php echo $patient_insurance->Company->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
		<!-- AddressInsuranceCarierName -->
		<td<?php echo $patient_insurance->AddressInsuranceCarierName->cellAttributes() ?>>
<span<?php echo $patient_insurance->AddressInsuranceCarierName->viewAttributes() ?>>
<?php echo $patient_insurance->AddressInsuranceCarierName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->ContactName->Visible) { // ContactName ?>
		<!-- ContactName -->
		<td<?php echo $patient_insurance->ContactName->cellAttributes() ?>>
<span<?php echo $patient_insurance->ContactName->viewAttributes() ?>>
<?php echo $patient_insurance->ContactName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->ContactMobile->Visible) { // ContactMobile ?>
		<!-- ContactMobile -->
		<td<?php echo $patient_insurance->ContactMobile->cellAttributes() ?>>
<span<?php echo $patient_insurance->ContactMobile->viewAttributes() ?>>
<?php echo $patient_insurance->ContactMobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->PolicyType->Visible) { // PolicyType ?>
		<!-- PolicyType -->
		<td<?php echo $patient_insurance->PolicyType->cellAttributes() ?>>
<span<?php echo $patient_insurance->PolicyType->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->PolicyName->Visible) { // PolicyName ?>
		<!-- PolicyName -->
		<td<?php echo $patient_insurance->PolicyName->cellAttributes() ?>>
<span<?php echo $patient_insurance->PolicyName->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->PolicyNo->Visible) { // PolicyNo ?>
		<!-- PolicyNo -->
		<td<?php echo $patient_insurance->PolicyNo->cellAttributes() ?>>
<span<?php echo $patient_insurance->PolicyNo->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->PolicyAmount->Visible) { // PolicyAmount ?>
		<!-- PolicyAmount -->
		<td<?php echo $patient_insurance->PolicyAmount->cellAttributes() ?>>
<span<?php echo $patient_insurance->PolicyAmount->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->RefLetterNo->Visible) { // RefLetterNo ?>
		<!-- RefLetterNo -->
		<td<?php echo $patient_insurance->RefLetterNo->cellAttributes() ?>>
<span<?php echo $patient_insurance->RefLetterNo->viewAttributes() ?>>
<?php echo $patient_insurance->RefLetterNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->ReferenceBy->Visible) { // ReferenceBy ?>
		<!-- ReferenceBy -->
		<td<?php echo $patient_insurance->ReferenceBy->cellAttributes() ?>>
<span<?php echo $patient_insurance->ReferenceBy->viewAttributes() ?>>
<?php echo $patient_insurance->ReferenceBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->ReferenceDate->Visible) { // ReferenceDate ?>
		<!-- ReferenceDate -->
		<td<?php echo $patient_insurance->ReferenceDate->cellAttributes() ?>>
<span<?php echo $patient_insurance->ReferenceDate->viewAttributes() ?>>
<?php echo $patient_insurance->ReferenceDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_insurance->createdby->cellAttributes() ?>>
<span<?php echo $patient_insurance->createdby->viewAttributes() ?>>
<?php echo $patient_insurance->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_insurance->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_insurance->createddatetime->viewAttributes() ?>>
<?php echo $patient_insurance->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_insurance->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_insurance->modifiedby->viewAttributes() ?>>
<?php echo $patient_insurance->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_insurance->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_insurance->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_insurance->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_insurance->mrnno->cellAttributes() ?>>
<span<?php echo $patient_insurance->mrnno->viewAttributes() ?>>
<?php echo $patient_insurance->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_insurance_preview->ListOptions->render("body", "right", $patient_insurance_preview->RowCnt);
?>
	</tr>
<?php
	$patient_insurance_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_insurance_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_insurance_preview->Pager)) $patient_insurance_preview->Pager = new PrevNextPager($patient_insurance_preview->StartRec, $patient_insurance_preview->DisplayRecs, $patient_insurance_preview->TotalRecs) ?>
<?php if ($patient_insurance_preview->Pager->RecordCount > 0 && $patient_insurance_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_insurance_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_insurance_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_insurance_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_insurance_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_insurance_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_insurance_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_insurance_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_insurance_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_insurance_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_insurance_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_insurance_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_insurance_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_insurance_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_insurance_preview->Recordset)
	$patient_insurance_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_insurance_preview->terminate();
?>