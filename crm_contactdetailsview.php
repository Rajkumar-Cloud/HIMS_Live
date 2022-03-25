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
$crm_contactdetails_view = new crm_contactdetails_view();

// Run the page
$crm_contactdetails_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_contactdetails_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_contactdetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcrm_contactdetailsview = currentForm = new ew.Form("fcrm_contactdetailsview", "view");

// Form_CustomValidate event
fcrm_contactdetailsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_contactdetailsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$crm_contactdetails->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $crm_contactdetails_view->ExportOptions->render("body") ?>
<?php $crm_contactdetails_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $crm_contactdetails_view->showPageHeader(); ?>
<?php
$crm_contactdetails_view->showMessage();
?>
<form name="fcrm_contactdetailsview" id="fcrm_contactdetailsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_contactdetails_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_contactdetails_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_contactdetails">
<input type="hidden" name="modal" value="<?php echo (int)$crm_contactdetails_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($crm_contactdetails->contactid->Visible) { // contactid ?>
	<tr id="r_contactid">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_contactid"><?php echo $crm_contactdetails->contactid->caption() ?></span></td>
		<td data-name="contactid"<?php echo $crm_contactdetails->contactid->cellAttributes() ?>>
<span id="el_crm_contactdetails_contactid">
<span<?php echo $crm_contactdetails->contactid->viewAttributes() ?>>
<?php echo $crm_contactdetails->contactid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->contact_no->Visible) { // contact_no ?>
	<tr id="r_contact_no">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_contact_no"><?php echo $crm_contactdetails->contact_no->caption() ?></span></td>
		<td data-name="contact_no"<?php echo $crm_contactdetails->contact_no->cellAttributes() ?>>
<span id="el_crm_contactdetails_contact_no">
<span<?php echo $crm_contactdetails->contact_no->viewAttributes() ?>>
<?php echo $crm_contactdetails->contact_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->parentid->Visible) { // parentid ?>
	<tr id="r_parentid">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_parentid"><?php echo $crm_contactdetails->parentid->caption() ?></span></td>
		<td data-name="parentid"<?php echo $crm_contactdetails->parentid->cellAttributes() ?>>
<span id="el_crm_contactdetails_parentid">
<span<?php echo $crm_contactdetails->parentid->viewAttributes() ?>>
<?php echo $crm_contactdetails->parentid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->salutation->Visible) { // salutation ?>
	<tr id="r_salutation">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_salutation"><?php echo $crm_contactdetails->salutation->caption() ?></span></td>
		<td data-name="salutation"<?php echo $crm_contactdetails->salutation->cellAttributes() ?>>
<span id="el_crm_contactdetails_salutation">
<span<?php echo $crm_contactdetails->salutation->viewAttributes() ?>>
<?php echo $crm_contactdetails->salutation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->firstname->Visible) { // firstname ?>
	<tr id="r_firstname">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_firstname"><?php echo $crm_contactdetails->firstname->caption() ?></span></td>
		<td data-name="firstname"<?php echo $crm_contactdetails->firstname->cellAttributes() ?>>
<span id="el_crm_contactdetails_firstname">
<span<?php echo $crm_contactdetails->firstname->viewAttributes() ?>>
<?php echo $crm_contactdetails->firstname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->lastname->Visible) { // lastname ?>
	<tr id="r_lastname">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_lastname"><?php echo $crm_contactdetails->lastname->caption() ?></span></td>
		<td data-name="lastname"<?php echo $crm_contactdetails->lastname->cellAttributes() ?>>
<span id="el_crm_contactdetails_lastname">
<span<?php echo $crm_contactdetails->lastname->viewAttributes() ?>>
<?php echo $crm_contactdetails->lastname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->_email->Visible) { // email ?>
	<tr id="r__email">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails__email"><?php echo $crm_contactdetails->_email->caption() ?></span></td>
		<td data-name="_email"<?php echo $crm_contactdetails->_email->cellAttributes() ?>>
<span id="el_crm_contactdetails__email">
<span<?php echo $crm_contactdetails->_email->viewAttributes() ?>>
<?php echo $crm_contactdetails->_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->phone->Visible) { // phone ?>
	<tr id="r_phone">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_phone"><?php echo $crm_contactdetails->phone->caption() ?></span></td>
		<td data-name="phone"<?php echo $crm_contactdetails->phone->cellAttributes() ?>>
<span id="el_crm_contactdetails_phone">
<span<?php echo $crm_contactdetails->phone->viewAttributes() ?>>
<?php echo $crm_contactdetails->phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->mobile->Visible) { // mobile ?>
	<tr id="r_mobile">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_mobile"><?php echo $crm_contactdetails->mobile->caption() ?></span></td>
		<td data-name="mobile"<?php echo $crm_contactdetails->mobile->cellAttributes() ?>>
<span id="el_crm_contactdetails_mobile">
<span<?php echo $crm_contactdetails->mobile->viewAttributes() ?>>
<?php echo $crm_contactdetails->mobile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->reportsto->Visible) { // reportsto ?>
	<tr id="r_reportsto">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_reportsto"><?php echo $crm_contactdetails->reportsto->caption() ?></span></td>
		<td data-name="reportsto"<?php echo $crm_contactdetails->reportsto->cellAttributes() ?>>
<span id="el_crm_contactdetails_reportsto">
<span<?php echo $crm_contactdetails->reportsto->viewAttributes() ?>>
<?php echo $crm_contactdetails->reportsto->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->training->Visible) { // training ?>
	<tr id="r_training">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_training"><?php echo $crm_contactdetails->training->caption() ?></span></td>
		<td data-name="training"<?php echo $crm_contactdetails->training->cellAttributes() ?>>
<span id="el_crm_contactdetails_training">
<span<?php echo $crm_contactdetails->training->viewAttributes() ?>>
<?php echo $crm_contactdetails->training->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->usertype->Visible) { // usertype ?>
	<tr id="r_usertype">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_usertype"><?php echo $crm_contactdetails->usertype->caption() ?></span></td>
		<td data-name="usertype"<?php echo $crm_contactdetails->usertype->cellAttributes() ?>>
<span id="el_crm_contactdetails_usertype">
<span<?php echo $crm_contactdetails->usertype->viewAttributes() ?>>
<?php echo $crm_contactdetails->usertype->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->contacttype->Visible) { // contacttype ?>
	<tr id="r_contacttype">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_contacttype"><?php echo $crm_contactdetails->contacttype->caption() ?></span></td>
		<td data-name="contacttype"<?php echo $crm_contactdetails->contacttype->cellAttributes() ?>>
<span id="el_crm_contactdetails_contacttype">
<span<?php echo $crm_contactdetails->contacttype->viewAttributes() ?>>
<?php echo $crm_contactdetails->contacttype->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->otheremail->Visible) { // otheremail ?>
	<tr id="r_otheremail">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_otheremail"><?php echo $crm_contactdetails->otheremail->caption() ?></span></td>
		<td data-name="otheremail"<?php echo $crm_contactdetails->otheremail->cellAttributes() ?>>
<span id="el_crm_contactdetails_otheremail">
<span<?php echo $crm_contactdetails->otheremail->viewAttributes() ?>>
<?php echo $crm_contactdetails->otheremail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->donotcall->Visible) { // donotcall ?>
	<tr id="r_donotcall">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_donotcall"><?php echo $crm_contactdetails->donotcall->caption() ?></span></td>
		<td data-name="donotcall"<?php echo $crm_contactdetails->donotcall->cellAttributes() ?>>
<span id="el_crm_contactdetails_donotcall">
<span<?php echo $crm_contactdetails->donotcall->viewAttributes() ?>>
<?php echo $crm_contactdetails->donotcall->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->emailoptout->Visible) { // emailoptout ?>
	<tr id="r_emailoptout">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_emailoptout"><?php echo $crm_contactdetails->emailoptout->caption() ?></span></td>
		<td data-name="emailoptout"<?php echo $crm_contactdetails->emailoptout->cellAttributes() ?>>
<span id="el_crm_contactdetails_emailoptout">
<span<?php echo $crm_contactdetails->emailoptout->viewAttributes() ?>>
<?php echo $crm_contactdetails->emailoptout->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->imagename->Visible) { // imagename ?>
	<tr id="r_imagename">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_imagename"><?php echo $crm_contactdetails->imagename->caption() ?></span></td>
		<td data-name="imagename"<?php echo $crm_contactdetails->imagename->cellAttributes() ?>>
<span id="el_crm_contactdetails_imagename">
<span<?php echo $crm_contactdetails->imagename->viewAttributes() ?>>
<?php echo $crm_contactdetails->imagename->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
	<tr id="r_isconvertedfromlead">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_isconvertedfromlead"><?php echo $crm_contactdetails->isconvertedfromlead->caption() ?></span></td>
		<td data-name="isconvertedfromlead"<?php echo $crm_contactdetails->isconvertedfromlead->cellAttributes() ?>>
<span id="el_crm_contactdetails_isconvertedfromlead">
<span<?php echo $crm_contactdetails->isconvertedfromlead->viewAttributes() ?>>
<?php echo $crm_contactdetails->isconvertedfromlead->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->verification->Visible) { // verification ?>
	<tr id="r_verification">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_verification"><?php echo $crm_contactdetails->verification->caption() ?></span></td>
		<td data-name="verification"<?php echo $crm_contactdetails->verification->cellAttributes() ?>>
<span id="el_crm_contactdetails_verification">
<span<?php echo $crm_contactdetails->verification->viewAttributes() ?>>
<?php echo $crm_contactdetails->verification->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->secondary_email->Visible) { // secondary_email ?>
	<tr id="r_secondary_email">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_secondary_email"><?php echo $crm_contactdetails->secondary_email->caption() ?></span></td>
		<td data-name="secondary_email"<?php echo $crm_contactdetails->secondary_email->cellAttributes() ?>>
<span id="el_crm_contactdetails_secondary_email">
<span<?php echo $crm_contactdetails->secondary_email->viewAttributes() ?>>
<?php echo $crm_contactdetails->secondary_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->notifilanguage->Visible) { // notifilanguage ?>
	<tr id="r_notifilanguage">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_notifilanguage"><?php echo $crm_contactdetails->notifilanguage->caption() ?></span></td>
		<td data-name="notifilanguage"<?php echo $crm_contactdetails->notifilanguage->cellAttributes() ?>>
<span id="el_crm_contactdetails_notifilanguage">
<span<?php echo $crm_contactdetails->notifilanguage->viewAttributes() ?>>
<?php echo $crm_contactdetails->notifilanguage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->contactstatus->Visible) { // contactstatus ?>
	<tr id="r_contactstatus">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_contactstatus"><?php echo $crm_contactdetails->contactstatus->caption() ?></span></td>
		<td data-name="contactstatus"<?php echo $crm_contactdetails->contactstatus->cellAttributes() ?>>
<span id="el_crm_contactdetails_contactstatus">
<span<?php echo $crm_contactdetails->contactstatus->viewAttributes() ?>>
<?php echo $crm_contactdetails->contactstatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->dav_status->Visible) { // dav_status ?>
	<tr id="r_dav_status">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_dav_status"><?php echo $crm_contactdetails->dav_status->caption() ?></span></td>
		<td data-name="dav_status"<?php echo $crm_contactdetails->dav_status->cellAttributes() ?>>
<span id="el_crm_contactdetails_dav_status">
<span<?php echo $crm_contactdetails->dav_status->viewAttributes() ?>>
<?php echo $crm_contactdetails->dav_status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->jobtitle->Visible) { // jobtitle ?>
	<tr id="r_jobtitle">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_jobtitle"><?php echo $crm_contactdetails->jobtitle->caption() ?></span></td>
		<td data-name="jobtitle"<?php echo $crm_contactdetails->jobtitle->cellAttributes() ?>>
<span id="el_crm_contactdetails_jobtitle">
<span<?php echo $crm_contactdetails->jobtitle->viewAttributes() ?>>
<?php echo $crm_contactdetails->jobtitle->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->decision_maker->Visible) { // decision_maker ?>
	<tr id="r_decision_maker">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_decision_maker"><?php echo $crm_contactdetails->decision_maker->caption() ?></span></td>
		<td data-name="decision_maker"<?php echo $crm_contactdetails->decision_maker->cellAttributes() ?>>
<span id="el_crm_contactdetails_decision_maker">
<span<?php echo $crm_contactdetails->decision_maker->viewAttributes() ?>>
<?php echo $crm_contactdetails->decision_maker->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->sum_time->Visible) { // sum_time ?>
	<tr id="r_sum_time">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_sum_time"><?php echo $crm_contactdetails->sum_time->caption() ?></span></td>
		<td data-name="sum_time"<?php echo $crm_contactdetails->sum_time->cellAttributes() ?>>
<span id="el_crm_contactdetails_sum_time">
<span<?php echo $crm_contactdetails->sum_time->viewAttributes() ?>>
<?php echo $crm_contactdetails->sum_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->phone_extra->Visible) { // phone_extra ?>
	<tr id="r_phone_extra">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_phone_extra"><?php echo $crm_contactdetails->phone_extra->caption() ?></span></td>
		<td data-name="phone_extra"<?php echo $crm_contactdetails->phone_extra->cellAttributes() ?>>
<span id="el_crm_contactdetails_phone_extra">
<span<?php echo $crm_contactdetails->phone_extra->viewAttributes() ?>>
<?php echo $crm_contactdetails->phone_extra->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->mobile_extra->Visible) { // mobile_extra ?>
	<tr id="r_mobile_extra">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_mobile_extra"><?php echo $crm_contactdetails->mobile_extra->caption() ?></span></td>
		<td data-name="mobile_extra"<?php echo $crm_contactdetails->mobile_extra->cellAttributes() ?>>
<span id="el_crm_contactdetails_mobile_extra">
<span<?php echo $crm_contactdetails->mobile_extra->viewAttributes() ?>>
<?php echo $crm_contactdetails->mobile_extra->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->approvals->Visible) { // approvals ?>
	<tr id="r_approvals">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_approvals"><?php echo $crm_contactdetails->approvals->caption() ?></span></td>
		<td data-name="approvals"<?php echo $crm_contactdetails->approvals->cellAttributes() ?>>
<span id="el_crm_contactdetails_approvals">
<span<?php echo $crm_contactdetails->approvals->viewAttributes() ?>>
<?php echo $crm_contactdetails->approvals->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_contactdetails->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $crm_contactdetails_view->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_gender"><?php echo $crm_contactdetails->gender->caption() ?></span></td>
		<td data-name="gender"<?php echo $crm_contactdetails->gender->cellAttributes() ?>>
<span id="el_crm_contactdetails_gender">
<span<?php echo $crm_contactdetails->gender->viewAttributes() ?>>
<?php echo $crm_contactdetails->gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$crm_contactdetails_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_contactdetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_contactdetails_view->terminate();
?>