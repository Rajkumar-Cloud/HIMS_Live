<?php
namespace PHPMaker2019\HIMS___2019;
?>
<!-- Compat header starts -->
<script>
var RELATIVE_PATH = "<?php echo $RELATIVE_PATH ?>";
var isAbsoluteUrl = function(url) {
	var r = new RegExp('^(?:[a-z]+:)?//', 'i');
	return r.test(url);
}
var getScript = function(url) {
	if (!isAbsoluteUrl(url))
		url = RELATIVE_PATH + url;
	document.write("<" + "script src=\"" + url + "\"><" + "/script>");
}
var getCss = function(url) {
	if (!isAbsoluteUrl(url))
		url = RELATIVE_PATH + url;
	document.write("<link rel=\"stylesheet\" type=\"text/css\" href=\"" + url + "\">");
}
</script>
<?php if (@$ExportType == "" || @$ExportType == "print") { ?>
<script>
<?php foreach ($STYLESHEET_FILES as $cssfile) { // External Stylesheets ?>
getCss("<?php echo $cssfile ?>");
<?php } ?>
<?php if (!@$DrillDownInPanel) { ?>
getCss("<?php echo CssFile("phprptcss/HIMS___2019.css") ?>");
<?php } ?>
</script>
<?php } else { // Export ?>
<style type="text/css">
<?php
	$cssfile = (@$ExportType == "pdf") ? ($PDF_STYLESHEET_FILENAME ?: PROJECT_STYLESHEET_FILENAME) : PROJECT_STYLESHEET_FILENAME;
	if ($cssfile)
		echo file_get_contents($cssfile);
?>
</style>
<?php } ?>
<script>if (!window.jQuery) getScript("jquery/jquery-3.4.1.min.js");</script>
<script>
if (window.jQuery && !jQuery.colorbox) getCss("colorbox/colorbox.css");
if (window.jQuery && !window.jQuery.widget) getScript("jquery/jquery.ui.widget.js");
if (window.jQuery && !window.jQuery.localStorage) getScript("jquery/jquery.storageapi.min.js");
if (!window.moment) getScript("moment/moment.min.js");
if (window.jQuery && !window.jQuery.fn.slimScroll) getScript("plugins/slimScroll/jquery.slimscroll.min.js");
if (window.jQuery && !window.jQuery.fileDownload) getScript("jquery/jquery.fileDownload.min.js");
if (window.jQuery && !window.jQuery.fn.typeahead) getScript("phprptjs/typeahead.jquery.js");
</script>
<?php foreach ($JAVASCRIPT_FILES as $jsfile) { // External JavaScripts ?>
<script>getScript("<?php echo $jsfile ?>");</script>
<?php } ?>
<?php if (@$CustomExportType == "") { ?>
<script src="<?php echo $RELATIVE_PATH . $FUSIONCHARTS_PATH ?>fusioncharts.js"></script>
<script src="<?php echo $RELATIVE_PATH . $FUSIONCHARTS_PATH ?>themes/fusioncharts.theme.ocean.js"></script>
<script src="<?php echo $RELATIVE_PATH . $FUSIONCHARTS_PATH ?>themes/fusioncharts.theme.carbon.js"></script>
<script src="<?php echo $RELATIVE_PATH . $FUSIONCHARTS_PATH ?>themes/fusioncharts.theme.zune.js"></script>
<?php if ($USE_FUSIONCHARTS_TRIAL) { ?>
<script src="<?php echo $RELATIVE_PATH . $FUSIONCHARTS_TRIAL_PATH ?>fusioncharts.powercharts.js"></script>
<script src="<?php echo $RELATIVE_PATH . $FUSIONCHARTS_TRIAL_PATH ?>fusioncharts.gantt.js"></script>
<?php } ?>
<?php if (!$USE_FUSIONCHARTS_TRIAL || $USE_GOOGLE_CHARTS) { ?>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<?php } ?>
<?php } ?>
<script>if (window.jQuery && !jQuery.colorbox) getScript("colorbox/jquery.colorbox-min.js");</script>
<script>if (window.jQuery && typeof MobileDetect === 'undefined') getScript("phprptjs/mobile-detect.min.js");</script>
<script>getScript("phprptjs/clipboard.min.js");</script>
<script>getScript("phprptjs/ewr12.js");</script>
<script>
jQuery.extend(ew, {
	LANGUAGE_ID: "<?php echo $CurrentLanguage ?>",
	DATE_SEPARATOR: "<?php echo $DATE_SEPARATOR ?>", // Date separator
	TIME_SEPARATOR: "<?php echo $TIME_SEPARATOR ?>", // Time separator
	DATE_FORMAT: "<?php echo $DATE_FORMAT ?>", // Default date format
	DATE_FORMAT_ID: <?php echo $DATE_FORMAT_ID ?>, // Default date format ID
	DATETIME_WITHOUT_SECONDS: <?php echo VarToJson(DATETIME_WITHOUT_SECONDS) ?>, // Date/Time without seconds
	DECIMAL_POINT: "<?php echo $DECIMAL_POINT ?>",
	THOUSANDS_SEP: "<?php echo $THOUSANDS_SEP ?>",
	SESSION_TIMEOUT: <?php echo (SESSION_TIMEOUT > 0) ? SessionTimeoutTime() : 0 ?>, // Session timeout time (seconds)
	SESSION_TIMEOUT_COUNTDOWN: <?php echo SESSION_TIMEOUT_COUNTDOWN ?>, // Count down time to session timeout (seconds)
	SESSION_KEEP_ALIVE_INTERVAL: <?php echo SESSION_KEEP_ALIVE_INTERVAL ?>, // Keep alive interval (seconds)
	SESSION_URL: RELATIVE_PATH + "", // Session URL
	IS_LOGGEDIN: <?php echo VarToJson(IsLoggedIn()) ?>, // Is logged in
	IS_AUTOLOGIN: <?php echo VarToJson(IsAutoLogin()) ?>, // Is logged in with option "Auto login until I logout explicitly"
	TIMEOUT_URL: RELATIVE_PATH + "logout.php", // Timeout URL
	API_URL: "<?php echo $RELATIVE_PATH ?><?php echo API_URL ?>", // API file name
	API_ACTION_NAME: "<?php echo API_ACTION_NAME ?>", // API action name
	API_OBJECT_NAME: "<?php echo API_OBJECT_NAME ?>", // API object name
	API_FIELD_NAME: "<?php echo API_FIELD_NAME ?>", // API field name
	API_KEY_NAME: "<?php echo API_KEY_NAME ?>", // API key name
	API_LOGIN_ACTION: "<?php echo API_LOGIN_ACTION ?>", // API login action
	API_FILE_ACTION: "<?php echo API_FILE_ACTION ?>", // API file action
	API_SESSION_ACTION: "<?php echo API_SESSION_ACTION ?>", // API get session action
	API_LOOKUP_ACTION: "<?php echo API_LOOKUP_ACTION ?>", // API lookup action
	API_LOOKUP_TABLE: "<?php echo API_LOOKUP_TABLE ?>", // API lookup table name
	LOOKUP_FILTER_VALUE_SEPARATOR: "<?php echo LOOKUP_FILTER_VALUE_SEPARATOR ?>", // Lookup filter value separator
	AUTO_SUGGEST_MAX_ENTRIES: <?php echo AUTO_SUGGEST_MAX_ENTRIES ?>, // Auto-Suggest max entries
	DISABLE_BUTTON_ON_SUBMIT: true,
	IMAGE_FOLDER: "phprptimages/", // Image folder
	LOOKUP_FILTER_VALUE_SEPARATOR: "<?php echo LOOKUP_FILTER_VALUE_SEPARATOR ?>", // Lookup filter value separator
	AUTO_SUGGEST_MAX_ENTRIES: <?php echo AUTO_SUGGEST_MAX_ENTRIES ?>, // Auto-Suggest max entries
	USE_JAVASCRIPT_MESSAGE: false,
	PROJECT_STYLESHEET_FILENAME: "<?php echo PROJECT_STYLESHEET_FILENAME ?>", // Project style sheet
	PDF_STYLESHEET_FILENAME: "<?php echo $PDF_STYLESHEET_FILENAME ?: PROJECT_STYLESHEET_FILENAME ?>", // Export PDF style sheet
	ANTIFORGERY_TOKEN: "<?php echo $CurrentToken ?>",
	CSS_FLIP: <?php echo VarToJson($CSS_FLIP) ?>,
	LAZY_LOAD: <?php echo VarToJson($LAZY_LOAD) ?>,
	RESET_HEIGHT: <?php echo VarToJson($RESET_HEIGHT) ?>,
	DEBUG_ENABLED: <?php echo VarToJson(DEBUG_ENABLED) ?>,
	SEARCH_FILTER_OPTION: "<?php echo SEARCH_FILTER_OPTION ?>",
	OPTION_HTML_TEMPLATE: <?php echo JsonEncode($OPTION_HTML_TEMPLATE) ?>
});
</script>
<script>if (window.jQuery && !window.jQuery.views) getScript("phprptjs/jsrender.min.js");</script>
<script>
<?php echo $ReportLanguage->toJson(); ?>
</script>
<script>
(function($) {
	if (!$.fn.datetimepicker) {
		$.getScript("phprptjs/bootstrap-datetimepicker.js");
		getCss("phprptcss/bootstrap-datetimepicker.css");
	}
	if (!ew.createDateTimePicker)
		$.getScript("phprptjs/ewdatetimepicker.js");
})(jQuery);
</script>
<script>getScript("phprptjs/rusrfn12.js");</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<!-- Compat header ends -->
