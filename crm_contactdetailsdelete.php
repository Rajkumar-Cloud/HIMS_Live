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
WriteHeader(FALSE);

// Create page object
$crm_contactdetails_delete = new crm_contactdetails_delete();

// Run the page
$crm_contactdetails_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_contactdetails_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcrm_contactdetailsdelete = currentForm = new ew.Form("fcrm_contactdetailsdelete", "delete");

// Form_CustomValidate event
fcrm_contactdetailsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_contactdetailsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_contactdetails_delete->showPageHeader(); ?>
<?php
$crm_contactdetails_delete->showMessage();
?>
<form name="fcrm_contactdetailsdelete" id="fcrm_contactdetailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_contactdetails_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_contactdetails_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_contactdetails">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($crm_contactdetails_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($crm_contactdetails->contactid->Visible) { // contactid ?>
		<th class="<?php echo $crm_contactdetails->contactid->headerCellClass() ?>"><span id="elh_crm_contactdetails_contactid" class="crm_contactdetails_contactid"><?php echo $crm_contactdetails->contactid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->contact_no->Visible) { // contact_no ?>
		<th class="<?php echo $crm_contactdetails->contact_no->headerCellClass() ?>"><span id="elh_crm_contactdetails_contact_no" class="crm_contactdetails_contact_no"><?php echo $crm_contactdetails->contact_no->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->parentid->Visible) { // parentid ?>
		<th class="<?php echo $crm_contactdetails->parentid->headerCellClass() ?>"><span id="elh_crm_contactdetails_parentid" class="crm_contactdetails_parentid"><?php echo $crm_contactdetails->parentid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->salutation->Visible) { // salutation ?>
		<th class="<?php echo $crm_contactdetails->salutation->headerCellClass() ?>"><span id="elh_crm_contactdetails_salutation" class="crm_contactdetails_salutation"><?php echo $crm_contactdetails->salutation->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->firstname->Visible) { // firstname ?>
		<th class="<?php echo $crm_contactdetails->firstname->headerCellClass() ?>"><span id="elh_crm_contactdetails_firstname" class="crm_contactdetails_firstname"><?php echo $crm_contactdetails->firstname->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->lastname->Visible) { // lastname ?>
		<th class="<?php echo $crm_contactdetails->lastname->headerCellClass() ?>"><span id="elh_crm_contactdetails_lastname" class="crm_contactdetails_lastname"><?php echo $crm_contactdetails->lastname->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->_email->Visible) { // email ?>
		<th class="<?php echo $crm_contactdetails->_email->headerCellClass() ?>"><span id="elh_crm_contactdetails__email" class="crm_contactdetails__email"><?php echo $crm_contactdetails->_email->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->phone->Visible) { // phone ?>
		<th class="<?php echo $crm_contactdetails->phone->headerCellClass() ?>"><span id="elh_crm_contactdetails_phone" class="crm_contactdetails_phone"><?php echo $crm_contactdetails->phone->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->mobile->Visible) { // mobile ?>
		<th class="<?php echo $crm_contactdetails->mobile->headerCellClass() ?>"><span id="elh_crm_contactdetails_mobile" class="crm_contactdetails_mobile"><?php echo $crm_contactdetails->mobile->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->reportsto->Visible) { // reportsto ?>
		<th class="<?php echo $crm_contactdetails->reportsto->headerCellClass() ?>"><span id="elh_crm_contactdetails_reportsto" class="crm_contactdetails_reportsto"><?php echo $crm_contactdetails->reportsto->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->training->Visible) { // training ?>
		<th class="<?php echo $crm_contactdetails->training->headerCellClass() ?>"><span id="elh_crm_contactdetails_training" class="crm_contactdetails_training"><?php echo $crm_contactdetails->training->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->usertype->Visible) { // usertype ?>
		<th class="<?php echo $crm_contactdetails->usertype->headerCellClass() ?>"><span id="elh_crm_contactdetails_usertype" class="crm_contactdetails_usertype"><?php echo $crm_contactdetails->usertype->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->contacttype->Visible) { // contacttype ?>
		<th class="<?php echo $crm_contactdetails->contacttype->headerCellClass() ?>"><span id="elh_crm_contactdetails_contacttype" class="crm_contactdetails_contacttype"><?php echo $crm_contactdetails->contacttype->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->otheremail->Visible) { // otheremail ?>
		<th class="<?php echo $crm_contactdetails->otheremail->headerCellClass() ?>"><span id="elh_crm_contactdetails_otheremail" class="crm_contactdetails_otheremail"><?php echo $crm_contactdetails->otheremail->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->donotcall->Visible) { // donotcall ?>
		<th class="<?php echo $crm_contactdetails->donotcall->headerCellClass() ?>"><span id="elh_crm_contactdetails_donotcall" class="crm_contactdetails_donotcall"><?php echo $crm_contactdetails->donotcall->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->emailoptout->Visible) { // emailoptout ?>
		<th class="<?php echo $crm_contactdetails->emailoptout->headerCellClass() ?>"><span id="elh_crm_contactdetails_emailoptout" class="crm_contactdetails_emailoptout"><?php echo $crm_contactdetails->emailoptout->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
		<th class="<?php echo $crm_contactdetails->isconvertedfromlead->headerCellClass() ?>"><span id="elh_crm_contactdetails_isconvertedfromlead" class="crm_contactdetails_isconvertedfromlead"><?php echo $crm_contactdetails->isconvertedfromlead->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->secondary_email->Visible) { // secondary_email ?>
		<th class="<?php echo $crm_contactdetails->secondary_email->headerCellClass() ?>"><span id="elh_crm_contactdetails_secondary_email" class="crm_contactdetails_secondary_email"><?php echo $crm_contactdetails->secondary_email->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->notifilanguage->Visible) { // notifilanguage ?>
		<th class="<?php echo $crm_contactdetails->notifilanguage->headerCellClass() ?>"><span id="elh_crm_contactdetails_notifilanguage" class="crm_contactdetails_notifilanguage"><?php echo $crm_contactdetails->notifilanguage->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->contactstatus->Visible) { // contactstatus ?>
		<th class="<?php echo $crm_contactdetails->contactstatus->headerCellClass() ?>"><span id="elh_crm_contactdetails_contactstatus" class="crm_contactdetails_contactstatus"><?php echo $crm_contactdetails->contactstatus->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->dav_status->Visible) { // dav_status ?>
		<th class="<?php echo $crm_contactdetails->dav_status->headerCellClass() ?>"><span id="elh_crm_contactdetails_dav_status" class="crm_contactdetails_dav_status"><?php echo $crm_contactdetails->dav_status->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->jobtitle->Visible) { // jobtitle ?>
		<th class="<?php echo $crm_contactdetails->jobtitle->headerCellClass() ?>"><span id="elh_crm_contactdetails_jobtitle" class="crm_contactdetails_jobtitle"><?php echo $crm_contactdetails->jobtitle->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->decision_maker->Visible) { // decision_maker ?>
		<th class="<?php echo $crm_contactdetails->decision_maker->headerCellClass() ?>"><span id="elh_crm_contactdetails_decision_maker" class="crm_contactdetails_decision_maker"><?php echo $crm_contactdetails->decision_maker->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->sum_time->Visible) { // sum_time ?>
		<th class="<?php echo $crm_contactdetails->sum_time->headerCellClass() ?>"><span id="elh_crm_contactdetails_sum_time" class="crm_contactdetails_sum_time"><?php echo $crm_contactdetails->sum_time->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->phone_extra->Visible) { // phone_extra ?>
		<th class="<?php echo $crm_contactdetails->phone_extra->headerCellClass() ?>"><span id="elh_crm_contactdetails_phone_extra" class="crm_contactdetails_phone_extra"><?php echo $crm_contactdetails->phone_extra->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->mobile_extra->Visible) { // mobile_extra ?>
		<th class="<?php echo $crm_contactdetails->mobile_extra->headerCellClass() ?>"><span id="elh_crm_contactdetails_mobile_extra" class="crm_contactdetails_mobile_extra"><?php echo $crm_contactdetails->mobile_extra->caption() ?></span></th>
<?php } ?>
<?php if ($crm_contactdetails->gender->Visible) { // gender ?>
		<th class="<?php echo $crm_contactdetails->gender->headerCellClass() ?>"><span id="elh_crm_contactdetails_gender" class="crm_contactdetails_gender"><?php echo $crm_contactdetails->gender->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$crm_contactdetails_delete->RecCnt = 0;
$i = 0;
while (!$crm_contactdetails_delete->Recordset->EOF) {
	$crm_contactdetails_delete->RecCnt++;
	$crm_contactdetails_delete->RowCnt++;

	// Set row properties
	$crm_contactdetails->resetAttributes();
	$crm_contactdetails->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$crm_contactdetails_delete->loadRowValues($crm_contactdetails_delete->Recordset);

	// Render row
	$crm_contactdetails_delete->renderRow();
?>
	<tr<?php echo $crm_contactdetails->rowAttributes() ?>>
<?php if ($crm_contactdetails->contactid->Visible) { // contactid ?>
		<td<?php echo $crm_contactdetails->contactid->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_contactid" class="crm_contactdetails_contactid">
<span<?php echo $crm_contactdetails->contactid->viewAttributes() ?>>
<?php echo $crm_contactdetails->contactid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->contact_no->Visible) { // contact_no ?>
		<td<?php echo $crm_contactdetails->contact_no->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_contact_no" class="crm_contactdetails_contact_no">
<span<?php echo $crm_contactdetails->contact_no->viewAttributes() ?>>
<?php echo $crm_contactdetails->contact_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->parentid->Visible) { // parentid ?>
		<td<?php echo $crm_contactdetails->parentid->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_parentid" class="crm_contactdetails_parentid">
<span<?php echo $crm_contactdetails->parentid->viewAttributes() ?>>
<?php echo $crm_contactdetails->parentid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->salutation->Visible) { // salutation ?>
		<td<?php echo $crm_contactdetails->salutation->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_salutation" class="crm_contactdetails_salutation">
<span<?php echo $crm_contactdetails->salutation->viewAttributes() ?>>
<?php echo $crm_contactdetails->salutation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->firstname->Visible) { // firstname ?>
		<td<?php echo $crm_contactdetails->firstname->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_firstname" class="crm_contactdetails_firstname">
<span<?php echo $crm_contactdetails->firstname->viewAttributes() ?>>
<?php echo $crm_contactdetails->firstname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->lastname->Visible) { // lastname ?>
		<td<?php echo $crm_contactdetails->lastname->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_lastname" class="crm_contactdetails_lastname">
<span<?php echo $crm_contactdetails->lastname->viewAttributes() ?>>
<?php echo $crm_contactdetails->lastname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->_email->Visible) { // email ?>
		<td<?php echo $crm_contactdetails->_email->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails__email" class="crm_contactdetails__email">
<span<?php echo $crm_contactdetails->_email->viewAttributes() ?>>
<?php echo $crm_contactdetails->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->phone->Visible) { // phone ?>
		<td<?php echo $crm_contactdetails->phone->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_phone" class="crm_contactdetails_phone">
<span<?php echo $crm_contactdetails->phone->viewAttributes() ?>>
<?php echo $crm_contactdetails->phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->mobile->Visible) { // mobile ?>
		<td<?php echo $crm_contactdetails->mobile->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_mobile" class="crm_contactdetails_mobile">
<span<?php echo $crm_contactdetails->mobile->viewAttributes() ?>>
<?php echo $crm_contactdetails->mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->reportsto->Visible) { // reportsto ?>
		<td<?php echo $crm_contactdetails->reportsto->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_reportsto" class="crm_contactdetails_reportsto">
<span<?php echo $crm_contactdetails->reportsto->viewAttributes() ?>>
<?php echo $crm_contactdetails->reportsto->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->training->Visible) { // training ?>
		<td<?php echo $crm_contactdetails->training->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_training" class="crm_contactdetails_training">
<span<?php echo $crm_contactdetails->training->viewAttributes() ?>>
<?php echo $crm_contactdetails->training->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->usertype->Visible) { // usertype ?>
		<td<?php echo $crm_contactdetails->usertype->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_usertype" class="crm_contactdetails_usertype">
<span<?php echo $crm_contactdetails->usertype->viewAttributes() ?>>
<?php echo $crm_contactdetails->usertype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->contacttype->Visible) { // contacttype ?>
		<td<?php echo $crm_contactdetails->contacttype->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_contacttype" class="crm_contactdetails_contacttype">
<span<?php echo $crm_contactdetails->contacttype->viewAttributes() ?>>
<?php echo $crm_contactdetails->contacttype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->otheremail->Visible) { // otheremail ?>
		<td<?php echo $crm_contactdetails->otheremail->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_otheremail" class="crm_contactdetails_otheremail">
<span<?php echo $crm_contactdetails->otheremail->viewAttributes() ?>>
<?php echo $crm_contactdetails->otheremail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->donotcall->Visible) { // donotcall ?>
		<td<?php echo $crm_contactdetails->donotcall->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_donotcall" class="crm_contactdetails_donotcall">
<span<?php echo $crm_contactdetails->donotcall->viewAttributes() ?>>
<?php echo $crm_contactdetails->donotcall->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->emailoptout->Visible) { // emailoptout ?>
		<td<?php echo $crm_contactdetails->emailoptout->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_emailoptout" class="crm_contactdetails_emailoptout">
<span<?php echo $crm_contactdetails->emailoptout->viewAttributes() ?>>
<?php echo $crm_contactdetails->emailoptout->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
		<td<?php echo $crm_contactdetails->isconvertedfromlead->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_isconvertedfromlead" class="crm_contactdetails_isconvertedfromlead">
<span<?php echo $crm_contactdetails->isconvertedfromlead->viewAttributes() ?>>
<?php echo $crm_contactdetails->isconvertedfromlead->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->secondary_email->Visible) { // secondary_email ?>
		<td<?php echo $crm_contactdetails->secondary_email->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_secondary_email" class="crm_contactdetails_secondary_email">
<span<?php echo $crm_contactdetails->secondary_email->viewAttributes() ?>>
<?php echo $crm_contactdetails->secondary_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->notifilanguage->Visible) { // notifilanguage ?>
		<td<?php echo $crm_contactdetails->notifilanguage->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_notifilanguage" class="crm_contactdetails_notifilanguage">
<span<?php echo $crm_contactdetails->notifilanguage->viewAttributes() ?>>
<?php echo $crm_contactdetails->notifilanguage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->contactstatus->Visible) { // contactstatus ?>
		<td<?php echo $crm_contactdetails->contactstatus->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_contactstatus" class="crm_contactdetails_contactstatus">
<span<?php echo $crm_contactdetails->contactstatus->viewAttributes() ?>>
<?php echo $crm_contactdetails->contactstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->dav_status->Visible) { // dav_status ?>
		<td<?php echo $crm_contactdetails->dav_status->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_dav_status" class="crm_contactdetails_dav_status">
<span<?php echo $crm_contactdetails->dav_status->viewAttributes() ?>>
<?php echo $crm_contactdetails->dav_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->jobtitle->Visible) { // jobtitle ?>
		<td<?php echo $crm_contactdetails->jobtitle->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_jobtitle" class="crm_contactdetails_jobtitle">
<span<?php echo $crm_contactdetails->jobtitle->viewAttributes() ?>>
<?php echo $crm_contactdetails->jobtitle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->decision_maker->Visible) { // decision_maker ?>
		<td<?php echo $crm_contactdetails->decision_maker->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_decision_maker" class="crm_contactdetails_decision_maker">
<span<?php echo $crm_contactdetails->decision_maker->viewAttributes() ?>>
<?php echo $crm_contactdetails->decision_maker->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->sum_time->Visible) { // sum_time ?>
		<td<?php echo $crm_contactdetails->sum_time->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_sum_time" class="crm_contactdetails_sum_time">
<span<?php echo $crm_contactdetails->sum_time->viewAttributes() ?>>
<?php echo $crm_contactdetails->sum_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->phone_extra->Visible) { // phone_extra ?>
		<td<?php echo $crm_contactdetails->phone_extra->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_phone_extra" class="crm_contactdetails_phone_extra">
<span<?php echo $crm_contactdetails->phone_extra->viewAttributes() ?>>
<?php echo $crm_contactdetails->phone_extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->mobile_extra->Visible) { // mobile_extra ?>
		<td<?php echo $crm_contactdetails->mobile_extra->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_mobile_extra" class="crm_contactdetails_mobile_extra">
<span<?php echo $crm_contactdetails->mobile_extra->viewAttributes() ?>>
<?php echo $crm_contactdetails->mobile_extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_contactdetails->gender->Visible) { // gender ?>
		<td<?php echo $crm_contactdetails->gender->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_delete->RowCnt ?>_crm_contactdetails_gender" class="crm_contactdetails_gender">
<span<?php echo $crm_contactdetails->gender->viewAttributes() ?>>
<?php echo $crm_contactdetails->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$crm_contactdetails_delete->Recordset->moveNext();
}
$crm_contactdetails_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_contactdetails_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$crm_contactdetails_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_contactdetails_delete->terminate();
?>