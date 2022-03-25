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
$patient_provisional_diagnosis_preview = new patient_provisional_diagnosis_preview();

// Run the page
$patient_provisional_diagnosis_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_provisional_diagnosis_preview->Page_Render();
?>
<?php $patient_provisional_diagnosis_preview->showPageHeader(); ?>
<div class="card ew-grid patient_provisional_diagnosis"><!-- .card -->
<?php if ($patient_provisional_diagnosis_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_provisional_diagnosis_preview->renderListOptions();

// Render list options (header, left)
$patient_provisional_diagnosis_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_provisional_diagnosis->id->Visible) { // id ?>
	<?php if ($patient_provisional_diagnosis->SortUrl($patient_provisional_diagnosis->id) == "") { ?>
		<th class="<?php echo $patient_provisional_diagnosis->id->headerCellClass() ?>"><?php echo $patient_provisional_diagnosis->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_provisional_diagnosis->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_provisional_diagnosis->id->Name ?>" data-sort-order="<?php echo $patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->id->Name && $patient_provisional_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->id->Name) { ?><?php if ($patient_provisional_diagnosis_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_provisional_diagnosis_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_provisional_diagnosis->SortUrl($patient_provisional_diagnosis->mrnno) == "") { ?>
		<th class="<?php echo $patient_provisional_diagnosis->mrnno->headerCellClass() ?>"><?php echo $patient_provisional_diagnosis->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_provisional_diagnosis->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_provisional_diagnosis->mrnno->Name ?>" data-sort-order="<?php echo $patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->mrnno->Name && $patient_provisional_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->mrnno->Name) { ?><?php if ($patient_provisional_diagnosis_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_provisional_diagnosis_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_provisional_diagnosis->SortUrl($patient_provisional_diagnosis->PatientName) == "") { ?>
		<th class="<?php echo $patient_provisional_diagnosis->PatientName->headerCellClass() ?>"><?php echo $patient_provisional_diagnosis->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_provisional_diagnosis->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_provisional_diagnosis->PatientName->Name ?>" data-sort-order="<?php echo $patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->PatientName->Name && $patient_provisional_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->PatientName->Name) { ?><?php if ($patient_provisional_diagnosis_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_provisional_diagnosis_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatID->Visible) { // PatID ?>
	<?php if ($patient_provisional_diagnosis->SortUrl($patient_provisional_diagnosis->PatID) == "") { ?>
		<th class="<?php echo $patient_provisional_diagnosis->PatID->headerCellClass() ?>"><?php echo $patient_provisional_diagnosis->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_provisional_diagnosis->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_provisional_diagnosis->PatID->Name ?>" data-sort-order="<?php echo $patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->PatID->Name && $patient_provisional_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->PatID->Name) { ?><?php if ($patient_provisional_diagnosis_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_provisional_diagnosis_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_provisional_diagnosis->SortUrl($patient_provisional_diagnosis->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_provisional_diagnosis->MobileNumber->headerCellClass() ?>"><?php echo $patient_provisional_diagnosis->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_provisional_diagnosis->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_provisional_diagnosis->MobileNumber->Name ?>" data-sort-order="<?php echo $patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->MobileNumber->Name && $patient_provisional_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->MobileNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->MobileNumber->Name) { ?><?php if ($patient_provisional_diagnosis_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_provisional_diagnosis_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Reception->Visible) { // Reception ?>
	<?php if ($patient_provisional_diagnosis->SortUrl($patient_provisional_diagnosis->Reception) == "") { ?>
		<th class="<?php echo $patient_provisional_diagnosis->Reception->headerCellClass() ?>"><?php echo $patient_provisional_diagnosis->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_provisional_diagnosis->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_provisional_diagnosis->Reception->Name ?>" data-sort-order="<?php echo $patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->Reception->Name && $patient_provisional_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->Reception->Name) { ?><?php if ($patient_provisional_diagnosis_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_provisional_diagnosis_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_provisional_diagnosis->SortUrl($patient_provisional_diagnosis->PatientId) == "") { ?>
		<th class="<?php echo $patient_provisional_diagnosis->PatientId->headerCellClass() ?>"><?php echo $patient_provisional_diagnosis->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_provisional_diagnosis->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_provisional_diagnosis->PatientId->Name ?>" data-sort-order="<?php echo $patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->PatientId->Name && $patient_provisional_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->PatientId->Name) { ?><?php if ($patient_provisional_diagnosis_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_provisional_diagnosis_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Age->Visible) { // Age ?>
	<?php if ($patient_provisional_diagnosis->SortUrl($patient_provisional_diagnosis->Age) == "") { ?>
		<th class="<?php echo $patient_provisional_diagnosis->Age->headerCellClass() ?>"><?php echo $patient_provisional_diagnosis->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_provisional_diagnosis->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_provisional_diagnosis->Age->Name ?>" data-sort-order="<?php echo $patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->Age->Name && $patient_provisional_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->Age->Name) { ?><?php if ($patient_provisional_diagnosis_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_provisional_diagnosis_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Gender->Visible) { // Gender ?>
	<?php if ($patient_provisional_diagnosis->SortUrl($patient_provisional_diagnosis->Gender) == "") { ?>
		<th class="<?php echo $patient_provisional_diagnosis->Gender->headerCellClass() ?>"><?php echo $patient_provisional_diagnosis->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_provisional_diagnosis->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_provisional_diagnosis->Gender->Name ?>" data-sort-order="<?php echo $patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->Gender->Name && $patient_provisional_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->Gender->Name) { ?><?php if ($patient_provisional_diagnosis_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_provisional_diagnosis_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->HospID->Visible) { // HospID ?>
	<?php if ($patient_provisional_diagnosis->SortUrl($patient_provisional_diagnosis->HospID) == "") { ?>
		<th class="<?php echo $patient_provisional_diagnosis->HospID->headerCellClass() ?>"><?php echo $patient_provisional_diagnosis->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_provisional_diagnosis->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_provisional_diagnosis->HospID->Name ?>" data-sort-order="<?php echo $patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->HospID->Name && $patient_provisional_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_preview->SortField == $patient_provisional_diagnosis->HospID->Name) { ?><?php if ($patient_provisional_diagnosis_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_provisional_diagnosis_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_provisional_diagnosis_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_provisional_diagnosis_preview->RecCount = 0;
$patient_provisional_diagnosis_preview->RowCnt = 0;
while ($patient_provisional_diagnosis_preview->Recordset && !$patient_provisional_diagnosis_preview->Recordset->EOF) {

	// Init row class and style
	$patient_provisional_diagnosis_preview->RecCount++;
	$patient_provisional_diagnosis_preview->RowCnt++;
	$patient_provisional_diagnosis_preview->CssStyle = "";
	$patient_provisional_diagnosis_preview->loadListRowValues($patient_provisional_diagnosis_preview->Recordset);

	// Render row
	$patient_provisional_diagnosis_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_provisional_diagnosis_preview->resetAttributes();
	$patient_provisional_diagnosis_preview->renderListRow();

	// Render list options
	$patient_provisional_diagnosis_preview->renderListOptions();
?>
	<tr<?php echo $patient_provisional_diagnosis_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_provisional_diagnosis_preview->ListOptions->render("body", "left", $patient_provisional_diagnosis_preview->RowCnt);
?>
<?php if ($patient_provisional_diagnosis->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_provisional_diagnosis->id->cellAttributes() ?>>
<span<?php echo $patient_provisional_diagnosis->id->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_provisional_diagnosis->mrnno->cellAttributes() ?>>
<span<?php echo $patient_provisional_diagnosis->mrnno->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_provisional_diagnosis->PatientName->cellAttributes() ?>>
<span<?php echo $patient_provisional_diagnosis->PatientName->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_provisional_diagnosis->PatID->cellAttributes() ?>>
<span<?php echo $patient_provisional_diagnosis->PatID->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_provisional_diagnosis->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_provisional_diagnosis->MobileNumber->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_provisional_diagnosis->Reception->cellAttributes() ?>>
<span<?php echo $patient_provisional_diagnosis->Reception->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_provisional_diagnosis->PatientId->cellAttributes() ?>>
<span<?php echo $patient_provisional_diagnosis->PatientId->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_provisional_diagnosis->Age->cellAttributes() ?>>
<span<?php echo $patient_provisional_diagnosis->Age->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_provisional_diagnosis->Gender->cellAttributes() ?>>
<span<?php echo $patient_provisional_diagnosis->Gender->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_provisional_diagnosis->HospID->cellAttributes() ?>>
<span<?php echo $patient_provisional_diagnosis->HospID->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_provisional_diagnosis_preview->ListOptions->render("body", "right", $patient_provisional_diagnosis_preview->RowCnt);
?>
	</tr>
<?php
	$patient_provisional_diagnosis_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_provisional_diagnosis_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_provisional_diagnosis_preview->Pager)) $patient_provisional_diagnosis_preview->Pager = new PrevNextPager($patient_provisional_diagnosis_preview->StartRec, $patient_provisional_diagnosis_preview->DisplayRecs, $patient_provisional_diagnosis_preview->TotalRecs) ?>
<?php if ($patient_provisional_diagnosis_preview->Pager->RecordCount > 0 && $patient_provisional_diagnosis_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_provisional_diagnosis_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_provisional_diagnosis_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_provisional_diagnosis_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_provisional_diagnosis_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_provisional_diagnosis_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_provisional_diagnosis_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_provisional_diagnosis_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_provisional_diagnosis_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_provisional_diagnosis_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_provisional_diagnosis_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_provisional_diagnosis_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_provisional_diagnosis_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_provisional_diagnosis_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_provisional_diagnosis_preview->Recordset)
	$patient_provisional_diagnosis_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_provisional_diagnosis_preview->terminate();
?>