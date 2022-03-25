<?php
namespace PHPMaker2019\HIMS;
?>
<form id="ew-report-url-form" class="ew-form ew-report-url-form" action="<?php echo CurrentPageName() ?>">
<input type="hidden" name="generateurl" value="1">
<input type="hidden" name="report" value="<?php echo @$Page->TableVar ?>"><!-- Report name -->
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label ew-label" for="ew-report-type"><?php echo $ReportLanguage->Phrase("ReportFormType") ?></label>
		<div class="col-sm-9">
			<select class="form-control ew-control" name="reporttype" id="ew-report-type">
<?php foreach ($ReportOptions["ReportTypes"] as $val => $name) { ?>
	<?php if ($val <> "" && $name <> "") { ?>
				<option value="<?php echo $val ?>"><?php echo $name ?></option>
	<?php } ?>
<?php } ?>
			</select>
		</div>
	</div>
<?php if (count($ReportOptions["UserNameList"]) == 1) { ?>
<input type="hidden" name="username" value="<?php echo array_keys($ReportOptions["UserNameList"])[0] ?>">
<?php } elseif (count($ReportOptions["UserNameList"]) > 1) { ?>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label ew-label" for="ew-user-name"><?php echo $ReportLanguage->Phrase("ReportFormUserName") ?></label>
		<div class="col-sm-9">
			<select class="form-control ew-control" name="username" id="ew-user-name">
	<?php foreach ($ReportOptions["UserNameList"] as $usr => $name) { ?>
				<option value="<?php echo $usr ?>"><?php echo $name ?></option>
	<?php } ?>
			</select>
		</div>
	</div>
<?php } ?>
<?php if (@$ReportOptions["ShowFilter"] === TRUE) { ?>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label ew-label" for="ew-filter-name"><?php echo $ReportLanguage->Phrase("ReportFormFilterName") ?></label>
		<div class="col-sm-9">
			<select class="form-control ew-control" name="filtername" id="ew-filter-name">
				<option value=""><?php echo $ReportLanguage->Phrase("ReportFormFilterNone") ?></option>
				<option value="@@current" selected><?php echo $ReportLanguage->Phrase("ReportFormFilterCurrent") ?></option>
			</select>
		</div>
	</div>
<?php } ?>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label ew-label" for="ew-page-option"><?php echo $ReportLanguage->Phrase("ReportFormPageOption") ?></label>
		<div class="col-sm-9">
		<select class="form-control ew-control" name="pageoption" id="ew-page-option">
			<option value="first"><?php echo $ReportLanguage->Phrase("ReportFormFirstPage") ?></option>
			<option value="all"><?php echo $ReportLanguage->Phrase("ReportFormAllPages") ?></option>
		</select>
		</div>
	</div>
	<div class="form-group row ew-report-email d-none">
		<label class="col-sm-3 col-form-label ew-label" for="ew-report-sender"><?php echo $ReportLanguage->Phrase("ReportFormSender") ?></label>
		<div class="col-sm-9"><input type="text" class="form-control ew-control" name="sender" id="ew-report-sender"></div>
	</div>
	<div class="form-group row ew-report-email d-none">
		<label class="col-sm-3 col-form-label ew-label" for="ew-report-recipient"><?php echo $ReportLanguage->Phrase("ReportFormRecipient") ?></label>
		<div class="col-sm-9"><input type="text" class="form-control ew-control" name="recipient" id="ew-report-recipient"></div>
	</div>
	<div class="form-group row ew-report-email d-none">
		<label class="col-sm-3 col-form-label ew-label" for="ew-report-cc"><?php echo $ReportLanguage->Phrase("ReportFormCc") ?></label>
		<div class="col-sm-9"><input type="text" class="form-control ew-control" name="cc" id="ew-report-cc"></div>
	</div>
	<div class="form-group row ew-report-email d-none">
		<label class="col-sm-3 col-form-label ew-label" for="ew-report-bcc"><?php echo $ReportLanguage->Phrase("ReportFormBcc") ?></label>
		<div class="col-sm-9"><input type="text" class="form-control ew-control" name="bcc" id="ew-report-bcc"></div>
	</div>
	<div class="form-group row ew-report-email d-none">
		<label class="col-sm-3 col-form-label ew-label" for="ew-report-subject"><?php echo $ReportLanguage->Phrase("ReportFormSubject") ?></label>
		<div class="col-sm-9"><input type="text" class="form-control ew-control" name="subject" id="ew-report-subject"></div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label ew-label"><?php echo $ReportLanguage->Phrase("ReportFormResponseType") ?></label>
		<div class="col-sm-9">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="responsetype" id="responsetype1" value="json" checked>
				<label class="form-check-label" for="responsetype1"><?php echo $ReportLanguage->Phrase("ReportFormResponseTypeJson") ?></label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="responsetype" id="responsetype2" value="file">
				<label class="form-check-label" for="responsetype2"><?php echo $ReportLanguage->Phrase("ReportFormResponseTypeFile") ?></label>
			</div>
		</div>
	</div>
<?php if (@$ReportOptions["ShowFilter"] === TRUE) { ?>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label ew-label"><?php echo $ReportLanguage->Phrase("ReportFormShowCurrentFilter") ?></label>
		<div class="col-sm-9">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" name="showcurrentfilter" value="1" checked>
			</div>
		</div>
	</div>
<?php } ?>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label ew-label" for="ew-url"><?php echo $ReportLanguage->Phrase("ReportFormUrl") ?></label>
		<div class="col-sm-9"><textarea readonly class="form-control ew-control" rows="6" name="url" id="ew-url"></textarea></div>
	</div>
</form>
<p></p>
