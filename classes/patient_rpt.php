<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class (patient_rpt)
 */
class patient_rpt extends patient_base
{

	// Page ID
	public $PageID = 'rpt';

	// Project ID
	public $ProjectID = "{758F4792-112B-4545-BC16-BF571BA72FA2}";

	// Page object name
	public $PageObjName = 'patient_rpt';
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Page headings
	public $Heading = '';
	public $Subheading = '';
	public $PageHeader;
	public $PageFooter;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportPdfUrl;
	public $ExportEmailUrl;

	// CSS
	public $ReportTableClass = "";
	public $ReportTableStyle = "";

	// Custom export
	public $ExportPrintCustom = FALSE;
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Page heading
	public function pageHeading()
	{
		global $ReportLanguage;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "TableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $ReportLanguage;
		if ($this->Subheading <> "")
			return $this->Subheading;
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$pageUrl = CurrentPageName() . "?";
		if ($this->UseTokenInUrl) $pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		return $pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return @$_SESSION[SESSION_MESSAGE];
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($_SESSION[SESSION_MESSAGE], $v);
	}

	// Get failure message
	public function getFailureMessage()
	{
		return @$_SESSION[SESSION_FAILURE_MESSAGE];
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($_SESSION[SESSION_FAILURE_MESSAGE], $v);
	}

	// Get success message
	public function getSuccessMessage()
	{
		return @$_SESSION[SESSION_SUCCESS_MESSAGE];
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($_SESSION[SESSION_SUCCESS_MESSAGE], $v);
	}

	// Get warning message
	public function getWarningMessage()
	{
		return @$_SESSION[SESSION_WARNING_MESSAGE];
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($_SESSION[SESSION_WARNING_MESSAGE], $v);
	}

	// Clear message
	public function clearMessage()
	{
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$_SESSION[SESSION_MESSAGE] = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") // Fotoer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
	}

	// Validate page request
	public function isPageRequest()
	{
		if ($this->UseTokenInUrl) {
			if (IsPost())
				return ($this->TableVar == Post("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $ReportLanguage, $DashboardReport;
		global $UserTable, $UserTableConn;

		// Initialize
		if (!$DashboardReport)
			$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		$ReportLanguage = new ReportLanguage();
		if ($Language === NULL)
			$Language = $ReportLanguage;

		// Parent constuctor
		parent::__construct();

		// Table object (patient_base)
		if (!isset($GLOBALS["patient_base"])) {
			$GLOBALS["patient_base"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_base"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportEmailUrl = $this->pageUrl() . "export=email";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'rpt');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// User table object (user_login_base)
		if (!isset($UserTable)) {
			$UserTable = new user_login_base();
			$UserTableConn = Conn($UserTable->Dbid);
		}

		// Export options
		$this->ExportOptions = new ListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Search options
		$this->SearchOptions = new ListOptions();
		$this->SearchOptions->Tag = "div";
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Filter options
		$this->FilterOptions = new ListOptions();
		$this->FilterOptions->Tag = "div";
		$this->FilterOptions->TagClassName = "ew-filter-option fpatientrpt";

		// Generate report options
		$this->GenerateOptions = new ListOptions();
		$this->GenerateOptions->Tag = "div";
		$this->GenerateOptions->TagClassName = "ew-generate-option";
	}

	// Process generate request
	protected function processGenRequest()
	{
		global $Security, $ReportLanguage, $ReportParameters, $RELATIVE_PATH;

		// Process generate report request
		$genKey = Get("reportkey", "");
		if (Decrypt($genKey, REPORT_LOG_ENCRYPT_KEY) == $this->TableVar) {
			$ReportParameters = JsonDecode(Decrypt(Param("reportparams", ""), REPORT_LOG_ENCRYPT_KEY), TRUE);
			if (!is_array($ReportParameters)) {
				WriteJson(["success" => FALSE, "error" => $ReportLanguage->phrase("IncorrectReportParameters")]);
				$this->terminate();
			}
			$genType = ReportParam("export", "");
			$this->ExportAll = ReportParam("exportall") === TRUE;
			$usr = ReportParam("username", "");
			$pwd = ReportParam("password", "");
			$encrypted = ReportParam("encrypted", "") === TRUE;
			$login = $Security->validateUser($usr, $pwd, FALSE, $encrypted); // Manual login
			if (!$login) {
				WriteJson(["success" => FALSE, "error" => DeniedMessage()]);
				$this->terminate();
			}
			$this->setupFilterList($ReportParameters); // Update filter list
			if (@$ReportParameters["folder"] == "") // Set generate report folder
				$ReportParameters["folder"] = $RELATIVE_PATH . UPLOAD_DEST_PATH;
			if (@$ReportParameters["filename"] == "") // Set generate report filename
				$ReportParameters["filename"] = $this->TableVar . "_" . GetRandomGuid() . "." . $this->genFileExt($genType);
			$ReportParameters["generaterequest"] = TRUE; // Set generate request
		}
	}

	// Generate file extension
	protected function genFileExt($genType)
	{
		if ($genType == "print" || $genType == "html")
			return "html";
		elseif ($genType == "excel")
			return "xls";
		elseif ($genType == "word")
			return "doc";
		elseif ($genType == "pdf")
			return "pdf";
		else
			return $genType;
	}

	// Write generate response
	protected function writeGenResponse($genurl)
	{
		global $ReportParameters;
		if ($genurl <> "") {
			$genType = ReportParam("export", "");
			$responseType = ReportParam("responsetype", "");
			if ($genType <> "email")
				$genurl = FullUrl($genurl, "genurl");
			if ($responseType == "json" || $genType == "email")
				WriteJson(["success" => TRUE, "url" => $genurl]);
		}
	}

	// Get export HTML tag
	public function getExportTag($type, $custom = FALSE)
	{
		global $ReportLanguage;
		$exportId = session_id();
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportExcelUrl . "', '" . $exportId . "');\">" . $ReportLanguage->phrase("ExportToExcel") . "</a>";
			else
				return "<a class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" href=\"" . $this->ExportExcelUrl . "\">" . $ReportLanguage->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportWordUrl . "', '" . $exportId . "');\">" . $ReportLanguage->phrase("ExportToWord") . "</a>";
			else
				return "<a class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" href=\"" . $this->ExportWordUrl . "\">" . $ReportLanguage->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "print")) {
			if ($custom)
				return "<a class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportPrintUrl . "', '" . $exportId . "');\">" . $ReportLanguage->phrase("PrinterFriendly") . "</a>";
			else
				return "<a class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly"), TRUE) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly", TRUE)) . "\" href=\"" . $this->ExportPrintUrl . "\">" . $ReportLanguage->phrase("PrinterFriendly") . "</a>";
		} elseif (SameText($type, "pdf")) {
			return "<a class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" href=\"" . $this->ExportPdfUrl . "\">" . $ReportLanguage->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "email")) {
			return "<a class=\"ew-export-link ew-email\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" id=\"emf_patient\" href=\"#\" onclick=\"ew.emailDialogShow({ lnk: 'emf_patient', hdr: ew.language.phrase('ExportToEmail'), url: '$this->ExportEmailUrl', exportid: '$exportId', el: this }); return false;\">" . $ReportLanguage->phrase("ExportToEmail") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Security, $ReportLanguage, $ReportOptions;
		$exportId = session_id();
		$reportTypes = [];

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = TRUE;
		$reportTypes["print"] = $item->Visible ? $ReportLanguage->phrase("ReportFormPrint") : "";

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;
		$reportTypes["excel"] = $item->Visible ? $ReportLanguage->phrase("ReportFormExcel") : "";

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = TRUE;
		$reportTypes["word"] = $item->Visible ? $ReportLanguage->phrase("ReportFormWord") : "";

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = FALSE;
		$item->Visible = TRUE;
		$reportTypes["pdf"] = $item->Visible ? $ReportLanguage->phrase("ReportFormPdf") : "";

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email");
		$item->Visible = TRUE;
		$reportTypes["email"] = $item->Visible ? $ReportLanguage->phrase("ReportFormEmail") : "";

		// Report types
		$ReportOptions["ReportTypes"] = $reportTypes;

		// Drop down button for export
		$this->ExportOptions->UseDropDownButton = FALSE;
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseImageAndText = $this->ExportOptions->UseDropDownButton;
		$this->ExportOptions->DropDownButtonPhrase = $ReportLanguage->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatientrpt\" href=\"#\">" . $ReportLanguage->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatientrpt\" href=\"#\">" . $ReportLanguage->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton; // v8
		$this->FilterOptions->DropDownButtonPhrase = $ReportLanguage->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Button to create generate URL
		$item = &$this->GenerateOptions->add("generateurl");
		$item->Body = '<button type="button" title="' . $ReportLanguage->phrase('GenerateReportUrl', TRUE) . '" onclick="ew.modalGenerateUrlShow(event);" class="ew-generate-url-btn btn btn-default"><span class="fa fa-link ew-icon"></span></button>';
		$item->Visible = $Security->isLoggedIn(); // Check if logged in
		$this->GenerateOptions->UseButtonGroup = TRUE;

		// Add group option item
		$item = &$this->GenerateOptions->add($this->GenerateOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Set up export options (extended)
		$this->setupExportOptionsExt();

		// Hide options for export
		if ($this->isExport()) {
			$this->ExportOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}

		// Set up table class
		if ($this->isExport("word") || $this->isExport("excel") || $this->isExport("pdf"))
			$this->ReportTableClass = "ew-table";
		else
			$this->ReportTableClass = "table ew-table";
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $ReportLanguage;

		// Filter panel button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = $this->FilterApplied ? " active" : " active";
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-caption=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-toggle=\"button\" data-form=\"fpatientrpt\">" . $ReportLanguage->phrase("SearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Reset filter
		$item = &$this->SearchOptions->add("resetfilter");
		$item->Body = "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlEncode($ReportLanguage->phrase("ResetAllFilter", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ResetAllFilter", TRUE)) . "\" onclick=\"location='" . CurrentPageName() . "?cmd=reset'\">" . $ReportLanguage->phrase("ResetAllFilter") . "</button>";
		$item->Visible = TRUE && $this->FilterApplied;

		// Button group for reset filter
		$this->SearchOptions->UseButtonGroup = TRUE;

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide options for export
		if ($this->isExport())
			$this->SearchOptions->hideAllOptions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ReportLanguage, $EXPORT_REPORT, $ExportFileName, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		if ($this->isExport() && array_key_exists($this->Export, $EXPORT_REPORT)) {
			$content = ob_get_contents();
			if (ob_get_length())
				ob_end_clean();

			// Remove all <div data-tagid="..." id="orig..." class="hide">...</div> (for customviewtag export, except "googlemaps")
			if (preg_match_all('/<div\s+data-tagid=[\'"]([\s\S]*?)[\'"]\s+id=[\'"]orig([\s\S]*?)[\'"]\s+class\s*=\s*[\'"]hide[\'"]>([\s\S]*?)<\/div\s*>/i', $content, $divmatches, PREG_SET_ORDER)) {
				foreach ($divmatches as $divmatch) {
					if ($divmatch[1] <> "googlemaps")
						$content = str_replace($divmatch[0], "", $content);
				}
			}
			$fn = $EXPORT_REPORT[$this->Export];
			$saveResponse = $this->$fn($content);
			if (ReportParam("generaterequest") === TRUE) { // Generate report request
				$this->writeGenResponse($saveResponse);
				$url = ""; // Avoid redirect
			}
		}

		// Close connection if not in dashboard
		if (!$DashboardReport)
			CloseConnections();

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			header("Location: " . $url);
		}
		if (!$DashboardReport)
			exit();
	}

	// Initialize common variables
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $FilterOptions; // Filter options

	// Recordset
	public $GroupRecordset = NULL;
	public $Recordset = NULL;
	public $DetailRecordCount = 0;

	// Paging variables
	public $RecordIndex = 0; // Record index
	public $RecordCount = 0; // Record count
	public $StartGroup = 0; // Start group
	public $StopGroup = 0; // Stop group
	public $TotalGroups = 0; // Total groups
	public $GroupCount = 0; // Group count
	public $GroupCounter = []; // Group counter
	public $DisplayGroups = 3; // Groups per page
	public $GroupRange = 10;
	public $Sort = "";
	public $Filter = "";
	public $PageFirstGroupFilter = "";
	public $UserIDFilter = "";
	public $DrillDown = FALSE;
	public $DrillDownInPanel = FALSE;
	public $DrillDownList = "";

	// Clear field for ext filter
	public $ExpiredExtendedFilter = "";
	public $PopupName = "";
	public $PopupValue = "";
	public $FilterApplied;
	public $SearchCommand = FALSE;
	public $ShowHeader;
	public $GroupColumnCount = 0;
	public $SubGroupColumnCount = 0;
	public $DetailColumnCount = 0;
	public $Counts;
	public $Columns;
	public $Values;
	public $Summaries;
	public $Minimums;
	public $Maximums;
	public $GrandCounts;
	public $GrandSummaries;
	public $GrandMinimums;
	public $GrandMaximums;
	public $TotalCount;
	public $GrandSummarySetup = FALSE;
	public $GroupIndexes;
	public $DetailRows = [];
	public $TopContentClass = "col-sm-12 ew-top";
	public $LeftContentClass = "ew-left";
	public $CenterContentClass = "col-sm-12 ew-center";
	public $RightContentClass = "ew-right";
	public $BottomContentClass = "col-sm-12 ew-bottom";

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $ExportFileName, $ReportLanguage, $Security, $UserProfile,
			$Security, $FormError, $DrillDownInPanel, $Breadcrumb, $ReportLanguage,
			$DashboardReport, $CustomExportType;
		global $ReportLanguage;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();

		// Process generate request
		$this->processGenRequest();
		if (!$Security->isLoggedIn()) $Security->autoLogin(); // Auto login
		$Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel($this->ProjectID . 'patient');
		$Security->TablePermission_Loaded();
		if (!$Security->canList()) {
			$Security->saveLastUrl();
			$this->setFailureMessage(DeniedMessage()); // Set no permission
			$this->terminate(GetUrl("index.php"));
		}

		// Set up Generate report options
		global $ReportOptions, $UserTableConn;
		$UserNameList = [];
		if ($Security->isSysAdmin())
			$UserNameList["@@admin"] = $ReportLanguage->phrase("ReportFormUserDefault");
		global $UserTable, $UserTableConn;

		// User table object (user_login_base)
		if (!isset($UserTable)) {
			$UserTable = new user_login_base();
			$UserTableConn = Conn($UserTable->Dbid);
		}

		// Get list of user names
		$filter = "";
		$sql = $UserTable->getSql($filter);
		if ($rs = $UserTableConn->Execute($sql)) {
			while (!$rs->EOF) {
				$usr = $rs->fields('mail_id');
				$lvl = $rs->fields('UserLevel');
				$priv = $Security->getUserLevelPrivEx($this->ProjectID . $this->TableName, $lvl);
				if (($priv & ALLOW_REPORT) <> ALLOW_REPORT)
					$usr = "";
				if ($usr <> "")
					$UserNameList[$usr] = $usr;
				$rs->moveNext();
			}
		}
		$ReportOptions["UserNameList"] = $UserNameList;
		$ReportOptions["ShowFilter"] = TRUE;

		// Get export parameters
		if (ReportParam("export") !== NULL)
			$this->Export = strtolower(ReportParam("export"));
		$ExportType = $this->Export; // Get export parameter, used in header
		$ExportFileName = $this->TableVar; // Get export file, used in header

		// Setup placeholder
		$this->createddatetime->PlaceHolder = $this->createddatetime->caption();

		// Setup export options
		$this->setupExportOptions();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			echo $ReportLanguage->phrase("InvalidPostRequest");
			$this->terminate();
			exit();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		// Set field visibility for detail fields

		$this->id->setVisibility();
		$this->title->setVisibility();
		$this->first_name->setVisibility();
		$this->middle_name->setVisibility();
		$this->last_name->setVisibility();
		$this->gender->setVisibility();
		$this->dob->setVisibility();
		$this->Age->setVisibility();
		$this->blood_group->setVisibility();
		$this->mobile_no->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->Religion->setVisibility();
		$this->_Nationality->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->ReferedByDr->setVisibility();
		$this->ReferClinicname->setVisibility();
		$this->ReferCity->setVisibility();
		$this->ReferMobileNo->setVisibility();
		$this->ReferA4TreatingConsultant->setVisibility();
		$this->PurposreReferredfor->setVisibility();
		$this->spouse_title->setVisibility();
		$this->spouse_first_name->setVisibility();
		$this->spouse_middle_name->setVisibility();
		$this->spouse_last_name->setVisibility();
		$this->spouse_gender->setVisibility();
		$this->spouse_dob->setVisibility();
		$this->spouse_Age->setVisibility();
		$this->spouse_blood_group->setVisibility();
		$this->spouse_mobile_no->setVisibility();
		$this->Maritalstatus->setVisibility();
		$this->_Business->setVisibility();
		$this->_Patient_Language->setVisibility();
		$this->Passport->setVisibility();
		$this->VisaNo->setVisibility();
		$this->ValidityOfVisa->setVisibility();
		$this->WhereDidYouHear->setVisibility();
		$this->PatientID->setVisibility();
		$this->HospID->setVisibility();
		$this->street->setVisibility();
		$this->town->setVisibility();
		$this->province->setVisibility();
		$this->country->setVisibility();
		$this->postal_code->setVisibility();
		$this->PEmail->setVisibility();
		$this->PEmergencyContact->setVisibility();

		// Aggregate variables
		// 1st dimension = no of groups (level 0 used for grand total)
		// 2nd dimension = no of fields

		$fieldCount = 50;
		$groupCount = 1;
		$this->Values = &InitArray($fieldCount, 0);
		$this->Counts = &Init2DArray($groupCount, $fieldCount, 0);
		$this->Summaries = &Init2DArray($groupCount, $fieldCount, 0);
		$this->Minimums = &Init2DArray($groupCount, $fieldCount, NULL);
		$this->Maximums = &Init2DArray($groupCount, $fieldCount, NULL);
		$this->GrandCounts = &InitArray($fieldCount, 0);
		$this->GrandSummaries = &InitArray($fieldCount, 0);
		$this->GrandMinimums = &InitArray($fieldCount, NULL);
		$this->GrandMaximums = &InitArray($fieldCount, NULL);

		// Set up array if accumulation required: [Accum, SkipNullOrZero]
		$this->Columns = [[FALSE, FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE]];

		// Set up groups per page dynamically
		$this->setupDisplayGroups();

		// Set up Breadcrumb
		if (!$this->isExport())
			$this->setupBreadcrumb();

		// Check if search command
		$this->SearchCommand = (Get("cmd", "") == "search");

		// Load default filter values
		$this->loadDefaultFilters();

		// Load custom filters
		$this->Page_FilterLoad();

		// Set up popup filter
		$this->setupPopup();

		// Load group db values if necessary
		$this->loadGroupDbValues();

		// Extended filter
		$extendedFilter = "";

		// Restore filter list
		$this->restoreFilterList();

		// Build extended filter
		$extendedFilter = $this->getExtendedFilter();
		AddFilter($this->Filter, $extendedFilter);

		// Build popup filter
		$popupFilter = $this->getPopupFilter();
		AddFilter($this->Filter, $popupFilter);

		// Check if filter applied
		$this->FilterApplied = $this->checkFilter();

		// Call Page Selecting event
		$this->Page_Selecting($this->Filter);

		// Search options
		$this->setupSearchOptions();

		// Get sort
		$this->Sort = $this->getSort();

		// Get total count
		$sql = BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
		$this->TotalGroups = $this->getRecordCount($sql);
		if ($this->DisplayGroups <= 0 || $this->DrillDown || $DashboardReport) // Display all groups
			$this->DisplayGroups = $this->TotalGroups;
		$this->StartGroup = 1;

		// Show header
		$this->ShowHeader = ($this->TotalGroups > 0);

		// Set up start position if not export all
		if ($this->ExportAll && $this->isExport())
			$this->DisplayGroups = $this->TotalGroups;
		else
			$this->setupStartGroup();

		// Set no record found message
		if ($this->TotalGroups == 0) {
			if ($Security->canList()) {
				if ($this->Filter == "0=101") {
					$this->setWarningMessage($ReportLanguage->phrase("EnterSearchCriteria"));
				} else {
					$this->setWarningMessage($ReportLanguage->phrase("NoRecord"));
				}
			} else {
				$this->setWarningMessage(DeniedMessage());
			}
		}

		// Hide export options if export/dashboard report
		if ($this->isExport() || $DashboardReport)
			$this->ExportOptions->hideAllOptions();

		// Hide search/filter options if export/drilldown/dashboard report
		if ($this->isExport() || $this->DrillDown || $DashboardReport) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
			$this->GenerateOptions->hideAllOptions();
		}

		// Get current page records
		$sql = BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(), $this->Filter, $this->Sort);
		$this->Recordset = $this->getRecordset($sql, $this->DisplayGroups, $this->StartGroup - 1);
		$this->setupFieldCount();
	}

	// Accummulate summary
	public function accumulateSummary()
	{
		$cntx = count($this->Summaries);
		for ($ix = 0; $ix < $cntx; $ix++) {
			$cnty = count($this->Summaries[$ix]);
			for ($iy = 1; $iy < $cnty; $iy++) {
				if ($this->Columns[$iy][0]) { // Accumulate required
					$valwrk = $this->Values[$iy];
					if ($valwrk === NULL) {
						if (!$this->Columns[$iy][1])
							$this->Counts[$ix][$iy]++;
					} else {
						$accum = (!$this->Columns[$iy][1] || !is_numeric($valwrk) || $valwrk <> 0);
						if ($accum) {
							$this->Counts[$ix][$iy]++;
							if (is_numeric($valwrk)) {
								$this->Summaries[$ix][$iy] += $valwrk;
								if ($this->Minimums[$ix][$iy] === NULL) {
									$this->Minimums[$ix][$iy] = $valwrk;
									$this->Maximums[$ix][$iy] = $valwrk;
								} else {
									if ($this->Minimums[$ix][$iy] > $valwrk)
										$this->Minimums[$ix][$iy] = $valwrk;
									if ($this->Maximums[$ix][$iy] < $valwrk)
										$this->Maximums[$ix][$iy] = $valwrk;
								}
							}
						}
					}
				}
			}
		}
		$cntx = count($this->Summaries);
		for ($ix = 0; $ix < $cntx; $ix++)
			$this->Counts[$ix][0]++;
	}

	// Reset level summary
	public function resetLevelSummary($lvl)
	{

		// Clear summary values
		$cntx = count($this->Summaries);
		for ($ix = $lvl; $ix < $cntx; $ix++) {
			$cnty = count($this->Summaries[$ix]);
			for ($iy = 1; $iy < $cnty; $iy++) {
				$this->Counts[$ix][$iy] = 0;
				if ($this->Columns[$iy][0]) {
					$this->Summaries[$ix][$iy] = 0;
					$this->Minimums[$ix][$iy] = NULL;
					$this->Maximums[$ix][$iy] = NULL;
				}
			}
		}
		$cntx = count($this->Summaries);
		for ($ix = $lvl; $ix < $cntx; $ix++)
			$this->Counts[$ix][0] = 0;

		// Reset record count
		$this->RecordCount = 0;
	}

	// Load row values
	public function loadRowValues($firstRow = FALSE)
	{
		if (!$this->Recordset)
			return;
		if ($firstRow) { // Get first row
				$this->FirstRowData = [];
				$this->FirstRowData["id"] = $this->Recordset->fields('id');
				$this->FirstRowData["title"] = $this->Recordset->fields('title');
				$this->FirstRowData["first_name"] = $this->Recordset->fields('first_name');
				$this->FirstRowData["middle_name"] = $this->Recordset->fields('middle_name');
				$this->FirstRowData["last_name"] = $this->Recordset->fields('last_name');
				$this->FirstRowData["gender"] = $this->Recordset->fields('gender');
				$this->FirstRowData["dob"] = $this->Recordset->fields('dob');
				$this->FirstRowData["Age"] = $this->Recordset->fields('Age');
				$this->FirstRowData["blood_group"] = $this->Recordset->fields('blood_group');
				$this->FirstRowData["mobile_no"] = $this->Recordset->fields('mobile_no');
				$this->FirstRowData["IdentificationMark"] = $this->Recordset->fields('IdentificationMark');
				$this->FirstRowData["Religion"] = $this->Recordset->fields('Religion');
				$this->FirstRowData["_Nationality"] = $this->Recordset->fields('Nationality');
				$this->FirstRowData["status"] = $this->Recordset->fields('status');
				$this->FirstRowData["createdby"] = $this->Recordset->fields('createdby');
				$this->FirstRowData["createddatetime"] = $this->Recordset->fields('createddatetime');
				$this->FirstRowData["modifiedby"] = $this->Recordset->fields('modifiedby');
				$this->FirstRowData["modifieddatetime"] = $this->Recordset->fields('modifieddatetime');
				$this->FirstRowData["ReferedByDr"] = $this->Recordset->fields('ReferedByDr');
				$this->FirstRowData["ReferClinicname"] = $this->Recordset->fields('ReferClinicname');
				$this->FirstRowData["ReferCity"] = $this->Recordset->fields('ReferCity');
				$this->FirstRowData["ReferMobileNo"] = $this->Recordset->fields('ReferMobileNo');
				$this->FirstRowData["ReferA4TreatingConsultant"] = $this->Recordset->fields('ReferA4TreatingConsultant');
				$this->FirstRowData["PurposreReferredfor"] = $this->Recordset->fields('PurposreReferredfor');
				$this->FirstRowData["spouse_title"] = $this->Recordset->fields('spouse_title');
				$this->FirstRowData["spouse_first_name"] = $this->Recordset->fields('spouse_first_name');
				$this->FirstRowData["spouse_middle_name"] = $this->Recordset->fields('spouse_middle_name');
				$this->FirstRowData["spouse_last_name"] = $this->Recordset->fields('spouse_last_name');
				$this->FirstRowData["spouse_gender"] = $this->Recordset->fields('spouse_gender');
				$this->FirstRowData["spouse_dob"] = $this->Recordset->fields('spouse_dob');
				$this->FirstRowData["spouse_Age"] = $this->Recordset->fields('spouse_Age');
				$this->FirstRowData["spouse_blood_group"] = $this->Recordset->fields('spouse_blood_group');
				$this->FirstRowData["spouse_mobile_no"] = $this->Recordset->fields('spouse_mobile_no');
				$this->FirstRowData["Maritalstatus"] = $this->Recordset->fields('Maritalstatus');
				$this->FirstRowData["_Business"] = $this->Recordset->fields('Business');
				$this->FirstRowData["_Patient_Language"] = $this->Recordset->fields('Patient_Language');
				$this->FirstRowData["Passport"] = $this->Recordset->fields('Passport');
				$this->FirstRowData["VisaNo"] = $this->Recordset->fields('VisaNo');
				$this->FirstRowData["ValidityOfVisa"] = $this->Recordset->fields('ValidityOfVisa');
				$this->FirstRowData["WhereDidYouHear"] = $this->Recordset->fields('WhereDidYouHear');
				$this->FirstRowData["PatientID"] = $this->Recordset->fields('PatientID');
				$this->FirstRowData["HospID"] = $this->Recordset->fields('HospID');
				$this->FirstRowData["street"] = $this->Recordset->fields('street');
				$this->FirstRowData["town"] = $this->Recordset->fields('town');
				$this->FirstRowData["province"] = $this->Recordset->fields('province');
				$this->FirstRowData["country"] = $this->Recordset->fields('country');
				$this->FirstRowData["postal_code"] = $this->Recordset->fields('postal_code');
				$this->FirstRowData["PEmail"] = $this->Recordset->fields('PEmail');
				$this->FirstRowData["PEmergencyContact"] = $this->Recordset->fields('PEmergencyContact');
		} else { // Get next row
			$this->Recordset->moveNext();
		}
		if (!$this->Recordset->EOF) {
			$this->id->setDbValue($this->Recordset->fields('id'));
			$this->title->setDbValue($this->Recordset->fields('title'));
			$this->first_name->setDbValue($this->Recordset->fields('first_name'));
			$this->middle_name->setDbValue($this->Recordset->fields('middle_name'));
			$this->last_name->setDbValue($this->Recordset->fields('last_name'));
			$this->gender->setDbValue($this->Recordset->fields('gender'));
			$this->dob->setDbValue($this->Recordset->fields('dob'));
			$this->Age->setDbValue($this->Recordset->fields('Age'));
			$this->blood_group->setDbValue($this->Recordset->fields('blood_group'));
			$this->mobile_no->setDbValue($this->Recordset->fields('mobile_no'));
			$this->description->setDbValue($this->Recordset->fields('description'));
			$this->IdentificationMark->setDbValue($this->Recordset->fields('IdentificationMark'));
			$this->Religion->setDbValue($this->Recordset->fields('Religion'));
			$this->_Nationality->setDbValue($this->Recordset->fields('Nationality'));
			$this->profilePic->setDbValue($this->Recordset->fields('profilePic'));
			$this->status->setDbValue($this->Recordset->fields('status'));
			$this->createdby->setDbValue($this->Recordset->fields('createdby'));
			$this->createddatetime->setDbValue($this->Recordset->fields('createddatetime'));
			$this->modifiedby->setDbValue($this->Recordset->fields('modifiedby'));
			$this->modifieddatetime->setDbValue($this->Recordset->fields('modifieddatetime'));
			$this->ReferedByDr->setDbValue($this->Recordset->fields('ReferedByDr'));
			$this->ReferClinicname->setDbValue($this->Recordset->fields('ReferClinicname'));
			$this->ReferCity->setDbValue($this->Recordset->fields('ReferCity'));
			$this->ReferMobileNo->setDbValue($this->Recordset->fields('ReferMobileNo'));
			$this->ReferA4TreatingConsultant->setDbValue($this->Recordset->fields('ReferA4TreatingConsultant'));
			$this->PurposreReferredfor->setDbValue($this->Recordset->fields('PurposreReferredfor'));
			$this->spouse_title->setDbValue($this->Recordset->fields('spouse_title'));
			$this->spouse_first_name->setDbValue($this->Recordset->fields('spouse_first_name'));
			$this->spouse_middle_name->setDbValue($this->Recordset->fields('spouse_middle_name'));
			$this->spouse_last_name->setDbValue($this->Recordset->fields('spouse_last_name'));
			$this->spouse_gender->setDbValue($this->Recordset->fields('spouse_gender'));
			$this->spouse_dob->setDbValue($this->Recordset->fields('spouse_dob'));
			$this->spouse_Age->setDbValue($this->Recordset->fields('spouse_Age'));
			$this->spouse_blood_group->setDbValue($this->Recordset->fields('spouse_blood_group'));
			$this->spouse_mobile_no->setDbValue($this->Recordset->fields('spouse_mobile_no'));
			$this->Maritalstatus->setDbValue($this->Recordset->fields('Maritalstatus'));
			$this->_Business->setDbValue($this->Recordset->fields('Business'));
			$this->_Patient_Language->setDbValue($this->Recordset->fields('Patient_Language'));
			$this->Passport->setDbValue($this->Recordset->fields('Passport'));
			$this->VisaNo->setDbValue($this->Recordset->fields('VisaNo'));
			$this->ValidityOfVisa->setDbValue($this->Recordset->fields('ValidityOfVisa'));
			$this->WhereDidYouHear->setDbValue($this->Recordset->fields('WhereDidYouHear'));
			$this->PatientID->setDbValue($this->Recordset->fields('PatientID'));
			$this->HospID->setDbValue($this->Recordset->fields('HospID'));
			$this->street->setDbValue($this->Recordset->fields('street'));
			$this->town->setDbValue($this->Recordset->fields('town'));
			$this->province->setDbValue($this->Recordset->fields('province'));
			$this->country->setDbValue($this->Recordset->fields('country'));
			$this->postal_code->setDbValue($this->Recordset->fields('postal_code'));
			$this->PEmail->setDbValue($this->Recordset->fields('PEmail'));
			$this->PEmergencyContact->setDbValue($this->Recordset->fields('PEmergencyContact'));
			$this->Values[1] = $this->id->CurrentValue;
			$this->Values[2] = $this->title->CurrentValue;
			$this->Values[3] = $this->first_name->CurrentValue;
			$this->Values[4] = $this->middle_name->CurrentValue;
			$this->Values[5] = $this->last_name->CurrentValue;
			$this->Values[6] = $this->gender->CurrentValue;
			$this->Values[7] = $this->dob->CurrentValue;
			$this->Values[8] = $this->Age->CurrentValue;
			$this->Values[9] = $this->blood_group->CurrentValue;
			$this->Values[10] = $this->mobile_no->CurrentValue;
			$this->Values[11] = $this->IdentificationMark->CurrentValue;
			$this->Values[12] = $this->Religion->CurrentValue;
			$this->Values[13] = $this->_Nationality->CurrentValue;
			$this->Values[14] = $this->status->CurrentValue;
			$this->Values[15] = $this->createdby->CurrentValue;
			$this->Values[16] = $this->createddatetime->CurrentValue;
			$this->Values[17] = $this->modifiedby->CurrentValue;
			$this->Values[18] = $this->modifieddatetime->CurrentValue;
			$this->Values[19] = $this->ReferedByDr->CurrentValue;
			$this->Values[20] = $this->ReferClinicname->CurrentValue;
			$this->Values[21] = $this->ReferCity->CurrentValue;
			$this->Values[22] = $this->ReferMobileNo->CurrentValue;
			$this->Values[23] = $this->ReferA4TreatingConsultant->CurrentValue;
			$this->Values[24] = $this->PurposreReferredfor->CurrentValue;
			$this->Values[25] = $this->spouse_title->CurrentValue;
			$this->Values[26] = $this->spouse_first_name->CurrentValue;
			$this->Values[27] = $this->spouse_middle_name->CurrentValue;
			$this->Values[28] = $this->spouse_last_name->CurrentValue;
			$this->Values[29] = $this->spouse_gender->CurrentValue;
			$this->Values[30] = $this->spouse_dob->CurrentValue;
			$this->Values[31] = $this->spouse_Age->CurrentValue;
			$this->Values[32] = $this->spouse_blood_group->CurrentValue;
			$this->Values[33] = $this->spouse_mobile_no->CurrentValue;
			$this->Values[34] = $this->Maritalstatus->CurrentValue;
			$this->Values[35] = $this->_Business->CurrentValue;
			$this->Values[36] = $this->_Patient_Language->CurrentValue;
			$this->Values[37] = $this->Passport->CurrentValue;
			$this->Values[38] = $this->VisaNo->CurrentValue;
			$this->Values[39] = $this->ValidityOfVisa->CurrentValue;
			$this->Values[40] = $this->WhereDidYouHear->CurrentValue;
			$this->Values[41] = $this->PatientID->CurrentValue;
			$this->Values[42] = $this->HospID->CurrentValue;
			$this->Values[43] = $this->street->CurrentValue;
			$this->Values[44] = $this->town->CurrentValue;
			$this->Values[45] = $this->province->CurrentValue;
			$this->Values[46] = $this->country->CurrentValue;
			$this->Values[47] = $this->postal_code->CurrentValue;
			$this->Values[48] = $this->PEmail->CurrentValue;
			$this->Values[49] = $this->PEmergencyContact->CurrentValue;
		} else {
			$this->id->setDbValue("");
			$this->title->setDbValue("");
			$this->first_name->setDbValue("");
			$this->middle_name->setDbValue("");
			$this->last_name->setDbValue("");
			$this->gender->setDbValue("");
			$this->dob->setDbValue("");
			$this->Age->setDbValue("");
			$this->blood_group->setDbValue("");
			$this->mobile_no->setDbValue("");
			$this->description->setDbValue("");
			$this->IdentificationMark->setDbValue("");
			$this->Religion->setDbValue("");
			$this->_Nationality->setDbValue("");
			$this->profilePic->setDbValue("");
			$this->status->setDbValue("");
			$this->createdby->setDbValue("");
			$this->createddatetime->setDbValue("");
			$this->modifiedby->setDbValue("");
			$this->modifieddatetime->setDbValue("");
			$this->ReferedByDr->setDbValue("");
			$this->ReferClinicname->setDbValue("");
			$this->ReferCity->setDbValue("");
			$this->ReferMobileNo->setDbValue("");
			$this->ReferA4TreatingConsultant->setDbValue("");
			$this->PurposreReferredfor->setDbValue("");
			$this->spouse_title->setDbValue("");
			$this->spouse_first_name->setDbValue("");
			$this->spouse_middle_name->setDbValue("");
			$this->spouse_last_name->setDbValue("");
			$this->spouse_gender->setDbValue("");
			$this->spouse_dob->setDbValue("");
			$this->spouse_Age->setDbValue("");
			$this->spouse_blood_group->setDbValue("");
			$this->spouse_mobile_no->setDbValue("");
			$this->Maritalstatus->setDbValue("");
			$this->_Business->setDbValue("");
			$this->_Patient_Language->setDbValue("");
			$this->Passport->setDbValue("");
			$this->VisaNo->setDbValue("");
			$this->ValidityOfVisa->setDbValue("");
			$this->WhereDidYouHear->setDbValue("");
			$this->PatientID->setDbValue("");
			$this->HospID->setDbValue("");
			$this->street->setDbValue("");
			$this->town->setDbValue("");
			$this->province->setDbValue("");
			$this->country->setDbValue("");
			$this->postal_code->setDbValue("");
			$this->PEmail->setDbValue("");
			$this->PEmergencyContact->setDbValue("");
		}
	}

	// Render row
	public function renderRow()
	{
		global $Security, $ReportLanguage, $Language;
		$conn = &$this->getConnection();
		if (!$this->GrandSummarySetup) { // Get Grand total
			$hasCount = FALSE;
			$hasSummary = FALSE;

			// Get total count from SQL directly
			$sql = BuildReportSql($this->getSqlSelectCount(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
			$rstot = $conn->execute($sql);
			if ($rstot) {
				$this->TotalCount = ($rstot->recordCount() > 1) ? $rstot->recordCount() : $rstot->fields[0];
				$rstot->close();
				$hasCount = TRUE;
			} else {
				$this->TotalCount = 0;
			}
			$hasSummary = TRUE;

			// Accumulate grand summary from detail records
			if (!$hasCount || !$hasSummary) {
				$sql = BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
				$this->Recordset = $conn->execute($sql);
				if ($this->Recordset) {
					$this->loadRowValues(TRUE);
					while (!$this->Recordset->EOF) {
						$this->accumulateGrandSummary();
						$this->loadRowValues();
					}
					$this->Recordset->close();
				}
			}
			$this->GrandSummarySetup = TRUE; // No need to set up again
		}

		// Call Row_Rendering event
		$this->Row_Rendering();
		if ($this->RowType == ROWTYPE_SEARCH) { // Search row
		} elseif ($this->RowType == ROWTYPE_TOTAL && !($this->RowTotalType == ROWTOTAL_GROUP && $this->RowTotalSubType == ROWTOTAL_HEADER)) { // Summary row
			PrependClass($this->RowAttrs["class"], ($this->RowTotalType == ROWTOTAL_PAGE || $this->RowTotalType == ROWTOTAL_GRAND) ? "ew-rpt-grp-aggregate" : ""); // Set up row class

			// id
			$this->id->HrefValue = "";

			// title
			$this->title->HrefValue = "";

			// first_name
			$this->first_name->HrefValue = "";

			// middle_name
			$this->middle_name->HrefValue = "";

			// last_name
			$this->last_name->HrefValue = "";

			// gender
			$this->gender->HrefValue = "";

			// dob
			$this->dob->HrefValue = "";

			// Age
			$this->Age->HrefValue = "";

			// blood_group
			$this->blood_group->HrefValue = "";

			// mobile_no
			$this->mobile_no->HrefValue = "";

			// IdentificationMark
			$this->IdentificationMark->HrefValue = "";

			// Religion
			$this->Religion->HrefValue = "";

			// Nationality
			$this->_Nationality->HrefValue = "";

			// status
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->HrefValue = "";

			// ReferedByDr
			$this->ReferedByDr->HrefValue = "";

			// ReferClinicname
			$this->ReferClinicname->HrefValue = "";

			// ReferCity
			$this->ReferCity->HrefValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->HrefValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->HrefValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->HrefValue = "";

			// spouse_title
			$this->spouse_title->HrefValue = "";

			// spouse_first_name
			$this->spouse_first_name->HrefValue = "";

			// spouse_middle_name
			$this->spouse_middle_name->HrefValue = "";

			// spouse_last_name
			$this->spouse_last_name->HrefValue = "";

			// spouse_gender
			$this->spouse_gender->HrefValue = "";

			// spouse_dob
			$this->spouse_dob->HrefValue = "";

			// spouse_Age
			$this->spouse_Age->HrefValue = "";

			// spouse_blood_group
			$this->spouse_blood_group->HrefValue = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->HrefValue = "";

			// Maritalstatus
			$this->Maritalstatus->HrefValue = "";

			// Business
			$this->_Business->HrefValue = "";

			// Patient_Language
			$this->_Patient_Language->HrefValue = "";

			// Passport
			$this->Passport->HrefValue = "";

			// VisaNo
			$this->VisaNo->HrefValue = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->HrefValue = "";

			// PatientID
			$this->PatientID->HrefValue = "";

			// HospID
			$this->HospID->HrefValue = "";

			// street
			$this->street->HrefValue = "";

			// town
			$this->town->HrefValue = "";

			// province
			$this->province->HrefValue = "";

			// country
			$this->country->HrefValue = "";

			// postal_code
			$this->postal_code->HrefValue = "";

			// PEmail
			$this->PEmail->HrefValue = "";

			// PEmergencyContact
			$this->PEmergencyContact->HrefValue = "";
		} else {
			if ($this->RowTotalType == ROWTOTAL_GROUP && $this->RowTotalSubType == ROWTOTAL_HEADER) {
			} else {
			}

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// title
			$this->title->ViewValue = $this->title->CurrentValue;
			$this->title->ViewValue = FormatNumber($this->title->ViewValue, 0, -2, -2, -2);
			$this->title->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// first_name
			$this->first_name->ViewValue = $this->first_name->CurrentValue;
			$this->first_name->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// middle_name
			$this->middle_name->ViewValue = $this->middle_name->CurrentValue;
			$this->middle_name->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// last_name
			$this->last_name->ViewValue = $this->last_name->CurrentValue;
			$this->last_name->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// gender
			$this->gender->ViewValue = $this->gender->CurrentValue;
			$this->gender->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// dob
			$this->dob->ViewValue = $this->dob->CurrentValue;
			$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 0);
			$this->dob->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// blood_group
			$this->blood_group->ViewValue = $this->blood_group->CurrentValue;
			$this->blood_group->ViewValue = FormatNumber($this->blood_group->ViewValue, 0, -2, -2, -2);
			$this->blood_group->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// mobile_no
			$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
			$this->mobile_no->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// IdentificationMark
			$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
			$this->IdentificationMark->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Religion
			$this->Religion->ViewValue = $this->Religion->CurrentValue;
			$this->Religion->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Nationality
			$this->_Nationality->ViewValue = $this->_Nationality->CurrentValue;
			$this->_Nationality->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
			$this->status->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
			$this->createdby->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
			$this->modifiedby->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// ReferedByDr
			$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
			$this->ReferedByDr->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// ReferClinicname
			$this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
			$this->ReferClinicname->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// ReferCity
			$this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
			$this->ReferCity->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// ReferMobileNo
			$this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
			$this->ReferMobileNo->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
			$this->ReferA4TreatingConsultant->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// PurposreReferredfor
			$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
			$this->PurposreReferredfor->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// spouse_title
			$this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
			$this->spouse_title->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// spouse_first_name
			$this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
			$this->spouse_first_name->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// spouse_middle_name
			$this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
			$this->spouse_middle_name->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// spouse_last_name
			$this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
			$this->spouse_last_name->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// spouse_gender
			$this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
			$this->spouse_gender->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// spouse_dob
			$this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
			$this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 0);
			$this->spouse_dob->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// spouse_Age
			$this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
			$this->spouse_Age->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// spouse_blood_group
			$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
			$this->spouse_blood_group->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// spouse_mobile_no
			$this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
			$this->spouse_mobile_no->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Maritalstatus
			$this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
			$this->Maritalstatus->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Business
			$this->_Business->ViewValue = $this->_Business->CurrentValue;
			$this->_Business->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Patient_Language
			$this->_Patient_Language->ViewValue = $this->_Patient_Language->CurrentValue;
			$this->_Patient_Language->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Passport
			$this->Passport->ViewValue = $this->Passport->CurrentValue;
			$this->Passport->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// VisaNo
			$this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
			$this->VisaNo->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// ValidityOfVisa
			$this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
			$this->ValidityOfVisa->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// WhereDidYouHear
			$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
			$this->WhereDidYouHear->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// street
			$this->street->ViewValue = $this->street->CurrentValue;
			$this->street->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// town
			$this->town->ViewValue = $this->town->CurrentValue;
			$this->town->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// province
			$this->province->ViewValue = $this->province->CurrentValue;
			$this->province->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// postal_code
			$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
			$this->postal_code->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// PEmail
			$this->PEmail->ViewValue = $this->PEmail->CurrentValue;
			$this->PEmail->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// PEmergencyContact
			$this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
			$this->PEmergencyContact->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// id
			$this->id->HrefValue = "";

			// title
			$this->title->HrefValue = "";

			// first_name
			$this->first_name->HrefValue = "";

			// middle_name
			$this->middle_name->HrefValue = "";

			// last_name
			$this->last_name->HrefValue = "";

			// gender
			$this->gender->HrefValue = "";

			// dob
			$this->dob->HrefValue = "";

			// Age
			$this->Age->HrefValue = "";

			// blood_group
			$this->blood_group->HrefValue = "";

			// mobile_no
			$this->mobile_no->HrefValue = "";

			// IdentificationMark
			$this->IdentificationMark->HrefValue = "";

			// Religion
			$this->Religion->HrefValue = "";

			// Nationality
			$this->_Nationality->HrefValue = "";

			// status
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->HrefValue = "";

			// ReferedByDr
			$this->ReferedByDr->HrefValue = "";

			// ReferClinicname
			$this->ReferClinicname->HrefValue = "";

			// ReferCity
			$this->ReferCity->HrefValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->HrefValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->HrefValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->HrefValue = "";

			// spouse_title
			$this->spouse_title->HrefValue = "";

			// spouse_first_name
			$this->spouse_first_name->HrefValue = "";

			// spouse_middle_name
			$this->spouse_middle_name->HrefValue = "";

			// spouse_last_name
			$this->spouse_last_name->HrefValue = "";

			// spouse_gender
			$this->spouse_gender->HrefValue = "";

			// spouse_dob
			$this->spouse_dob->HrefValue = "";

			// spouse_Age
			$this->spouse_Age->HrefValue = "";

			// spouse_blood_group
			$this->spouse_blood_group->HrefValue = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->HrefValue = "";

			// Maritalstatus
			$this->Maritalstatus->HrefValue = "";

			// Business
			$this->_Business->HrefValue = "";

			// Patient_Language
			$this->_Patient_Language->HrefValue = "";

			// Passport
			$this->Passport->HrefValue = "";

			// VisaNo
			$this->VisaNo->HrefValue = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->HrefValue = "";

			// PatientID
			$this->PatientID->HrefValue = "";

			// HospID
			$this->HospID->HrefValue = "";

			// street
			$this->street->HrefValue = "";

			// town
			$this->town->HrefValue = "";

			// province
			$this->province->HrefValue = "";

			// country
			$this->country->HrefValue = "";

			// postal_code
			$this->postal_code->HrefValue = "";

			// PEmail
			$this->PEmail->HrefValue = "";

			// PEmergencyContact
			$this->PEmergencyContact->HrefValue = "";
		}

		// Call Cell_Rendered event
		if ($this->RowType == ROWTYPE_TOTAL) { // Summary row
		} else {

			// id
			$currentValue = $this->id->CurrentValue;
			$viewValue = &$this->id->ViewValue;
			$viewAttrs = &$this->id->ViewAttrs;
			$cellAttrs = &$this->id->CellAttrs;
			$hrefValue = &$this->id->HrefValue;
			$linkAttrs = &$this->id->LinkAttrs;
			$this->Cell_Rendered($this->id, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// title
			$currentValue = $this->title->CurrentValue;
			$viewValue = &$this->title->ViewValue;
			$viewAttrs = &$this->title->ViewAttrs;
			$cellAttrs = &$this->title->CellAttrs;
			$hrefValue = &$this->title->HrefValue;
			$linkAttrs = &$this->title->LinkAttrs;
			$this->Cell_Rendered($this->title, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// first_name
			$currentValue = $this->first_name->CurrentValue;
			$viewValue = &$this->first_name->ViewValue;
			$viewAttrs = &$this->first_name->ViewAttrs;
			$cellAttrs = &$this->first_name->CellAttrs;
			$hrefValue = &$this->first_name->HrefValue;
			$linkAttrs = &$this->first_name->LinkAttrs;
			$this->Cell_Rendered($this->first_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// middle_name
			$currentValue = $this->middle_name->CurrentValue;
			$viewValue = &$this->middle_name->ViewValue;
			$viewAttrs = &$this->middle_name->ViewAttrs;
			$cellAttrs = &$this->middle_name->CellAttrs;
			$hrefValue = &$this->middle_name->HrefValue;
			$linkAttrs = &$this->middle_name->LinkAttrs;
			$this->Cell_Rendered($this->middle_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// last_name
			$currentValue = $this->last_name->CurrentValue;
			$viewValue = &$this->last_name->ViewValue;
			$viewAttrs = &$this->last_name->ViewAttrs;
			$cellAttrs = &$this->last_name->CellAttrs;
			$hrefValue = &$this->last_name->HrefValue;
			$linkAttrs = &$this->last_name->LinkAttrs;
			$this->Cell_Rendered($this->last_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// gender
			$currentValue = $this->gender->CurrentValue;
			$viewValue = &$this->gender->ViewValue;
			$viewAttrs = &$this->gender->ViewAttrs;
			$cellAttrs = &$this->gender->CellAttrs;
			$hrefValue = &$this->gender->HrefValue;
			$linkAttrs = &$this->gender->LinkAttrs;
			$this->Cell_Rendered($this->gender, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// dob
			$currentValue = $this->dob->CurrentValue;
			$viewValue = &$this->dob->ViewValue;
			$viewAttrs = &$this->dob->ViewAttrs;
			$cellAttrs = &$this->dob->CellAttrs;
			$hrefValue = &$this->dob->HrefValue;
			$linkAttrs = &$this->dob->LinkAttrs;
			$this->Cell_Rendered($this->dob, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Age
			$currentValue = $this->Age->CurrentValue;
			$viewValue = &$this->Age->ViewValue;
			$viewAttrs = &$this->Age->ViewAttrs;
			$cellAttrs = &$this->Age->CellAttrs;
			$hrefValue = &$this->Age->HrefValue;
			$linkAttrs = &$this->Age->LinkAttrs;
			$this->Cell_Rendered($this->Age, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// blood_group
			$currentValue = $this->blood_group->CurrentValue;
			$viewValue = &$this->blood_group->ViewValue;
			$viewAttrs = &$this->blood_group->ViewAttrs;
			$cellAttrs = &$this->blood_group->CellAttrs;
			$hrefValue = &$this->blood_group->HrefValue;
			$linkAttrs = &$this->blood_group->LinkAttrs;
			$this->Cell_Rendered($this->blood_group, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// mobile_no
			$currentValue = $this->mobile_no->CurrentValue;
			$viewValue = &$this->mobile_no->ViewValue;
			$viewAttrs = &$this->mobile_no->ViewAttrs;
			$cellAttrs = &$this->mobile_no->CellAttrs;
			$hrefValue = &$this->mobile_no->HrefValue;
			$linkAttrs = &$this->mobile_no->LinkAttrs;
			$this->Cell_Rendered($this->mobile_no, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// IdentificationMark
			$currentValue = $this->IdentificationMark->CurrentValue;
			$viewValue = &$this->IdentificationMark->ViewValue;
			$viewAttrs = &$this->IdentificationMark->ViewAttrs;
			$cellAttrs = &$this->IdentificationMark->CellAttrs;
			$hrefValue = &$this->IdentificationMark->HrefValue;
			$linkAttrs = &$this->IdentificationMark->LinkAttrs;
			$this->Cell_Rendered($this->IdentificationMark, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Religion
			$currentValue = $this->Religion->CurrentValue;
			$viewValue = &$this->Religion->ViewValue;
			$viewAttrs = &$this->Religion->ViewAttrs;
			$cellAttrs = &$this->Religion->CellAttrs;
			$hrefValue = &$this->Religion->HrefValue;
			$linkAttrs = &$this->Religion->LinkAttrs;
			$this->Cell_Rendered($this->Religion, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Nationality
			$currentValue = $this->_Nationality->CurrentValue;
			$viewValue = &$this->_Nationality->ViewValue;
			$viewAttrs = &$this->_Nationality->ViewAttrs;
			$cellAttrs = &$this->_Nationality->CellAttrs;
			$hrefValue = &$this->_Nationality->HrefValue;
			$linkAttrs = &$this->_Nationality->LinkAttrs;
			$this->Cell_Rendered($this->_Nationality, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// status
			$currentValue = $this->status->CurrentValue;
			$viewValue = &$this->status->ViewValue;
			$viewAttrs = &$this->status->ViewAttrs;
			$cellAttrs = &$this->status->CellAttrs;
			$hrefValue = &$this->status->HrefValue;
			$linkAttrs = &$this->status->LinkAttrs;
			$this->Cell_Rendered($this->status, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// createdby
			$currentValue = $this->createdby->CurrentValue;
			$viewValue = &$this->createdby->ViewValue;
			$viewAttrs = &$this->createdby->ViewAttrs;
			$cellAttrs = &$this->createdby->CellAttrs;
			$hrefValue = &$this->createdby->HrefValue;
			$linkAttrs = &$this->createdby->LinkAttrs;
			$this->Cell_Rendered($this->createdby, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// createddatetime
			$currentValue = $this->createddatetime->CurrentValue;
			$viewValue = &$this->createddatetime->ViewValue;
			$viewAttrs = &$this->createddatetime->ViewAttrs;
			$cellAttrs = &$this->createddatetime->CellAttrs;
			$hrefValue = &$this->createddatetime->HrefValue;
			$linkAttrs = &$this->createddatetime->LinkAttrs;
			$this->Cell_Rendered($this->createddatetime, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// modifiedby
			$currentValue = $this->modifiedby->CurrentValue;
			$viewValue = &$this->modifiedby->ViewValue;
			$viewAttrs = &$this->modifiedby->ViewAttrs;
			$cellAttrs = &$this->modifiedby->CellAttrs;
			$hrefValue = &$this->modifiedby->HrefValue;
			$linkAttrs = &$this->modifiedby->LinkAttrs;
			$this->Cell_Rendered($this->modifiedby, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// modifieddatetime
			$currentValue = $this->modifieddatetime->CurrentValue;
			$viewValue = &$this->modifieddatetime->ViewValue;
			$viewAttrs = &$this->modifieddatetime->ViewAttrs;
			$cellAttrs = &$this->modifieddatetime->CellAttrs;
			$hrefValue = &$this->modifieddatetime->HrefValue;
			$linkAttrs = &$this->modifieddatetime->LinkAttrs;
			$this->Cell_Rendered($this->modifieddatetime, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// ReferedByDr
			$currentValue = $this->ReferedByDr->CurrentValue;
			$viewValue = &$this->ReferedByDr->ViewValue;
			$viewAttrs = &$this->ReferedByDr->ViewAttrs;
			$cellAttrs = &$this->ReferedByDr->CellAttrs;
			$hrefValue = &$this->ReferedByDr->HrefValue;
			$linkAttrs = &$this->ReferedByDr->LinkAttrs;
			$this->Cell_Rendered($this->ReferedByDr, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// ReferClinicname
			$currentValue = $this->ReferClinicname->CurrentValue;
			$viewValue = &$this->ReferClinicname->ViewValue;
			$viewAttrs = &$this->ReferClinicname->ViewAttrs;
			$cellAttrs = &$this->ReferClinicname->CellAttrs;
			$hrefValue = &$this->ReferClinicname->HrefValue;
			$linkAttrs = &$this->ReferClinicname->LinkAttrs;
			$this->Cell_Rendered($this->ReferClinicname, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// ReferCity
			$currentValue = $this->ReferCity->CurrentValue;
			$viewValue = &$this->ReferCity->ViewValue;
			$viewAttrs = &$this->ReferCity->ViewAttrs;
			$cellAttrs = &$this->ReferCity->CellAttrs;
			$hrefValue = &$this->ReferCity->HrefValue;
			$linkAttrs = &$this->ReferCity->LinkAttrs;
			$this->Cell_Rendered($this->ReferCity, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// ReferMobileNo
			$currentValue = $this->ReferMobileNo->CurrentValue;
			$viewValue = &$this->ReferMobileNo->ViewValue;
			$viewAttrs = &$this->ReferMobileNo->ViewAttrs;
			$cellAttrs = &$this->ReferMobileNo->CellAttrs;
			$hrefValue = &$this->ReferMobileNo->HrefValue;
			$linkAttrs = &$this->ReferMobileNo->LinkAttrs;
			$this->Cell_Rendered($this->ReferMobileNo, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// ReferA4TreatingConsultant
			$currentValue = $this->ReferA4TreatingConsultant->CurrentValue;
			$viewValue = &$this->ReferA4TreatingConsultant->ViewValue;
			$viewAttrs = &$this->ReferA4TreatingConsultant->ViewAttrs;
			$cellAttrs = &$this->ReferA4TreatingConsultant->CellAttrs;
			$hrefValue = &$this->ReferA4TreatingConsultant->HrefValue;
			$linkAttrs = &$this->ReferA4TreatingConsultant->LinkAttrs;
			$this->Cell_Rendered($this->ReferA4TreatingConsultant, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// PurposreReferredfor
			$currentValue = $this->PurposreReferredfor->CurrentValue;
			$viewValue = &$this->PurposreReferredfor->ViewValue;
			$viewAttrs = &$this->PurposreReferredfor->ViewAttrs;
			$cellAttrs = &$this->PurposreReferredfor->CellAttrs;
			$hrefValue = &$this->PurposreReferredfor->HrefValue;
			$linkAttrs = &$this->PurposreReferredfor->LinkAttrs;
			$this->Cell_Rendered($this->PurposreReferredfor, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// spouse_title
			$currentValue = $this->spouse_title->CurrentValue;
			$viewValue = &$this->spouse_title->ViewValue;
			$viewAttrs = &$this->spouse_title->ViewAttrs;
			$cellAttrs = &$this->spouse_title->CellAttrs;
			$hrefValue = &$this->spouse_title->HrefValue;
			$linkAttrs = &$this->spouse_title->LinkAttrs;
			$this->Cell_Rendered($this->spouse_title, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// spouse_first_name
			$currentValue = $this->spouse_first_name->CurrentValue;
			$viewValue = &$this->spouse_first_name->ViewValue;
			$viewAttrs = &$this->spouse_first_name->ViewAttrs;
			$cellAttrs = &$this->spouse_first_name->CellAttrs;
			$hrefValue = &$this->spouse_first_name->HrefValue;
			$linkAttrs = &$this->spouse_first_name->LinkAttrs;
			$this->Cell_Rendered($this->spouse_first_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// spouse_middle_name
			$currentValue = $this->spouse_middle_name->CurrentValue;
			$viewValue = &$this->spouse_middle_name->ViewValue;
			$viewAttrs = &$this->spouse_middle_name->ViewAttrs;
			$cellAttrs = &$this->spouse_middle_name->CellAttrs;
			$hrefValue = &$this->spouse_middle_name->HrefValue;
			$linkAttrs = &$this->spouse_middle_name->LinkAttrs;
			$this->Cell_Rendered($this->spouse_middle_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// spouse_last_name
			$currentValue = $this->spouse_last_name->CurrentValue;
			$viewValue = &$this->spouse_last_name->ViewValue;
			$viewAttrs = &$this->spouse_last_name->ViewAttrs;
			$cellAttrs = &$this->spouse_last_name->CellAttrs;
			$hrefValue = &$this->spouse_last_name->HrefValue;
			$linkAttrs = &$this->spouse_last_name->LinkAttrs;
			$this->Cell_Rendered($this->spouse_last_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// spouse_gender
			$currentValue = $this->spouse_gender->CurrentValue;
			$viewValue = &$this->spouse_gender->ViewValue;
			$viewAttrs = &$this->spouse_gender->ViewAttrs;
			$cellAttrs = &$this->spouse_gender->CellAttrs;
			$hrefValue = &$this->spouse_gender->HrefValue;
			$linkAttrs = &$this->spouse_gender->LinkAttrs;
			$this->Cell_Rendered($this->spouse_gender, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// spouse_dob
			$currentValue = $this->spouse_dob->CurrentValue;
			$viewValue = &$this->spouse_dob->ViewValue;
			$viewAttrs = &$this->spouse_dob->ViewAttrs;
			$cellAttrs = &$this->spouse_dob->CellAttrs;
			$hrefValue = &$this->spouse_dob->HrefValue;
			$linkAttrs = &$this->spouse_dob->LinkAttrs;
			$this->Cell_Rendered($this->spouse_dob, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// spouse_Age
			$currentValue = $this->spouse_Age->CurrentValue;
			$viewValue = &$this->spouse_Age->ViewValue;
			$viewAttrs = &$this->spouse_Age->ViewAttrs;
			$cellAttrs = &$this->spouse_Age->CellAttrs;
			$hrefValue = &$this->spouse_Age->HrefValue;
			$linkAttrs = &$this->spouse_Age->LinkAttrs;
			$this->Cell_Rendered($this->spouse_Age, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// spouse_blood_group
			$currentValue = $this->spouse_blood_group->CurrentValue;
			$viewValue = &$this->spouse_blood_group->ViewValue;
			$viewAttrs = &$this->spouse_blood_group->ViewAttrs;
			$cellAttrs = &$this->spouse_blood_group->CellAttrs;
			$hrefValue = &$this->spouse_blood_group->HrefValue;
			$linkAttrs = &$this->spouse_blood_group->LinkAttrs;
			$this->Cell_Rendered($this->spouse_blood_group, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// spouse_mobile_no
			$currentValue = $this->spouse_mobile_no->CurrentValue;
			$viewValue = &$this->spouse_mobile_no->ViewValue;
			$viewAttrs = &$this->spouse_mobile_no->ViewAttrs;
			$cellAttrs = &$this->spouse_mobile_no->CellAttrs;
			$hrefValue = &$this->spouse_mobile_no->HrefValue;
			$linkAttrs = &$this->spouse_mobile_no->LinkAttrs;
			$this->Cell_Rendered($this->spouse_mobile_no, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Maritalstatus
			$currentValue = $this->Maritalstatus->CurrentValue;
			$viewValue = &$this->Maritalstatus->ViewValue;
			$viewAttrs = &$this->Maritalstatus->ViewAttrs;
			$cellAttrs = &$this->Maritalstatus->CellAttrs;
			$hrefValue = &$this->Maritalstatus->HrefValue;
			$linkAttrs = &$this->Maritalstatus->LinkAttrs;
			$this->Cell_Rendered($this->Maritalstatus, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Business
			$currentValue = $this->_Business->CurrentValue;
			$viewValue = &$this->_Business->ViewValue;
			$viewAttrs = &$this->_Business->ViewAttrs;
			$cellAttrs = &$this->_Business->CellAttrs;
			$hrefValue = &$this->_Business->HrefValue;
			$linkAttrs = &$this->_Business->LinkAttrs;
			$this->Cell_Rendered($this->_Business, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Patient_Language
			$currentValue = $this->_Patient_Language->CurrentValue;
			$viewValue = &$this->_Patient_Language->ViewValue;
			$viewAttrs = &$this->_Patient_Language->ViewAttrs;
			$cellAttrs = &$this->_Patient_Language->CellAttrs;
			$hrefValue = &$this->_Patient_Language->HrefValue;
			$linkAttrs = &$this->_Patient_Language->LinkAttrs;
			$this->Cell_Rendered($this->_Patient_Language, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Passport
			$currentValue = $this->Passport->CurrentValue;
			$viewValue = &$this->Passport->ViewValue;
			$viewAttrs = &$this->Passport->ViewAttrs;
			$cellAttrs = &$this->Passport->CellAttrs;
			$hrefValue = &$this->Passport->HrefValue;
			$linkAttrs = &$this->Passport->LinkAttrs;
			$this->Cell_Rendered($this->Passport, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// VisaNo
			$currentValue = $this->VisaNo->CurrentValue;
			$viewValue = &$this->VisaNo->ViewValue;
			$viewAttrs = &$this->VisaNo->ViewAttrs;
			$cellAttrs = &$this->VisaNo->CellAttrs;
			$hrefValue = &$this->VisaNo->HrefValue;
			$linkAttrs = &$this->VisaNo->LinkAttrs;
			$this->Cell_Rendered($this->VisaNo, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// ValidityOfVisa
			$currentValue = $this->ValidityOfVisa->CurrentValue;
			$viewValue = &$this->ValidityOfVisa->ViewValue;
			$viewAttrs = &$this->ValidityOfVisa->ViewAttrs;
			$cellAttrs = &$this->ValidityOfVisa->CellAttrs;
			$hrefValue = &$this->ValidityOfVisa->HrefValue;
			$linkAttrs = &$this->ValidityOfVisa->LinkAttrs;
			$this->Cell_Rendered($this->ValidityOfVisa, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// WhereDidYouHear
			$currentValue = $this->WhereDidYouHear->CurrentValue;
			$viewValue = &$this->WhereDidYouHear->ViewValue;
			$viewAttrs = &$this->WhereDidYouHear->ViewAttrs;
			$cellAttrs = &$this->WhereDidYouHear->CellAttrs;
			$hrefValue = &$this->WhereDidYouHear->HrefValue;
			$linkAttrs = &$this->WhereDidYouHear->LinkAttrs;
			$this->Cell_Rendered($this->WhereDidYouHear, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// PatientID
			$currentValue = $this->PatientID->CurrentValue;
			$viewValue = &$this->PatientID->ViewValue;
			$viewAttrs = &$this->PatientID->ViewAttrs;
			$cellAttrs = &$this->PatientID->CellAttrs;
			$hrefValue = &$this->PatientID->HrefValue;
			$linkAttrs = &$this->PatientID->LinkAttrs;
			$this->Cell_Rendered($this->PatientID, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// HospID
			$currentValue = $this->HospID->CurrentValue;
			$viewValue = &$this->HospID->ViewValue;
			$viewAttrs = &$this->HospID->ViewAttrs;
			$cellAttrs = &$this->HospID->CellAttrs;
			$hrefValue = &$this->HospID->HrefValue;
			$linkAttrs = &$this->HospID->LinkAttrs;
			$this->Cell_Rendered($this->HospID, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// street
			$currentValue = $this->street->CurrentValue;
			$viewValue = &$this->street->ViewValue;
			$viewAttrs = &$this->street->ViewAttrs;
			$cellAttrs = &$this->street->CellAttrs;
			$hrefValue = &$this->street->HrefValue;
			$linkAttrs = &$this->street->LinkAttrs;
			$this->Cell_Rendered($this->street, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// town
			$currentValue = $this->town->CurrentValue;
			$viewValue = &$this->town->ViewValue;
			$viewAttrs = &$this->town->ViewAttrs;
			$cellAttrs = &$this->town->CellAttrs;
			$hrefValue = &$this->town->HrefValue;
			$linkAttrs = &$this->town->LinkAttrs;
			$this->Cell_Rendered($this->town, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// province
			$currentValue = $this->province->CurrentValue;
			$viewValue = &$this->province->ViewValue;
			$viewAttrs = &$this->province->ViewAttrs;
			$cellAttrs = &$this->province->CellAttrs;
			$hrefValue = &$this->province->HrefValue;
			$linkAttrs = &$this->province->LinkAttrs;
			$this->Cell_Rendered($this->province, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// country
			$currentValue = $this->country->CurrentValue;
			$viewValue = &$this->country->ViewValue;
			$viewAttrs = &$this->country->ViewAttrs;
			$cellAttrs = &$this->country->CellAttrs;
			$hrefValue = &$this->country->HrefValue;
			$linkAttrs = &$this->country->LinkAttrs;
			$this->Cell_Rendered($this->country, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// postal_code
			$currentValue = $this->postal_code->CurrentValue;
			$viewValue = &$this->postal_code->ViewValue;
			$viewAttrs = &$this->postal_code->ViewAttrs;
			$cellAttrs = &$this->postal_code->CellAttrs;
			$hrefValue = &$this->postal_code->HrefValue;
			$linkAttrs = &$this->postal_code->LinkAttrs;
			$this->Cell_Rendered($this->postal_code, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// PEmail
			$currentValue = $this->PEmail->CurrentValue;
			$viewValue = &$this->PEmail->ViewValue;
			$viewAttrs = &$this->PEmail->ViewAttrs;
			$cellAttrs = &$this->PEmail->CellAttrs;
			$hrefValue = &$this->PEmail->HrefValue;
			$linkAttrs = &$this->PEmail->LinkAttrs;
			$this->Cell_Rendered($this->PEmail, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// PEmergencyContact
			$currentValue = $this->PEmergencyContact->CurrentValue;
			$viewValue = &$this->PEmergencyContact->ViewValue;
			$viewAttrs = &$this->PEmergencyContact->ViewAttrs;
			$cellAttrs = &$this->PEmergencyContact->CellAttrs;
			$hrefValue = &$this->PEmergencyContact->HrefValue;
			$linkAttrs = &$this->PEmergencyContact->LinkAttrs;
			$this->Cell_Rendered($this->PEmergencyContact, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);
		}

		// Call Row_Rendered event
		$this->Row_Rendered();
		$this->setupFieldCount();
	}

	// Accummulate grand summary
	protected function accumulateGrandSummary()
	{
		$this->TotalCount++;
		$cntgs = count($this->GrandSummaries);
		for ($iy = 1; $iy < $cntgs; $iy++) {
			if ($this->Columns[$iy][0]) {
				$valwrk = $this->Values[$iy];
				if ($valwrk === NULL || !is_numeric($valwrk)) {
					if (!$this->Columns[$iy][1])
						$this->GrandCounts[$iy]++;
				} else {
					if (!$this->Columns[$iy][1] || $valwrk <> 0) {
						$this->GrandCounts[$iy]++;
						$this->GrandSummaries[$iy] += $valwrk;
						if ($this->GrandMinimums[$iy] === NULL) {
							$this->GrandMinimums[$iy] = $valwrk;
							$this->GrandMaximums[$iy] = $valwrk;
						} else {
							if ($this->GrandMinimums[$iy] > $valwrk)
								$this->GrandMinimums[$iy] = $valwrk;
							if ($this->GrandMaximums[$iy] < $valwrk)
								$this->GrandMaximums[$iy] = $valwrk;
						}
					}
				}
			}
		}
	}

	// Load group db values if necessary
	protected function loadGroupDbValues()
	{
		$conn = &$this->getConnection();
	}

	// Set up popup
	protected function setupPopup()
	{
		global $ReportLanguage;
		$conn = &$this->getConnection();
		if ($this->DrillDown)
			return;

		// Process post back form
		if (IsPost()) {
			$name = Post("popup", ""); // Get popup form name
			if ($name <> "") {
				$arValues = Post("sel_$name");
				$cntValues = is_array($arValues) ? count($arValues) : 0;
				if ($cntValues > 0) {
					if (trim($arValues[0]) == "") // Select all
						$arValues = INIT_VALUE;
					$this->PopupName = $name;
					if (IsAdvancedFilterValue($arValues) || $arValues == INIT_VALUE)
						$this->PopupValue = $arValues;
					if (!MatchedArray($arValues, @$_SESSION["sel_$name"])) {
						if ($this->hasSessionFilterValues($name))
							$this->ExpiredExtendedFilter = $name; // Clear extended filter for this field
					}
					$_SESSION["sel_$name"] = $arValues;
					$_SESSION["rf_$name"] = Post("rf_$name", "");
					$_SESSION["rt_$name"] = Post("rt_$name", "");
					$this->resetPager();
				}
			}

		// Get 'reset' command
		} elseif (Get("cmd") !== NULL) {
			$cmd = Get("cmd");
			if (SameText($cmd, "reset")) {
				$this->resetPager();
			}
		}

		// Load selection criteria to array
	}

	// Setup field count
	protected function setupFieldCount()
	{
		$this->GroupColumnCount = 0;
		$this->SubGroupColumnCount = 0;
		$this->DetailColumnCount = 0;
		if ($this->id->Visible)
			$this->DetailColumnCount += 1;
		if ($this->title->Visible)
			$this->DetailColumnCount += 1;
		if ($this->first_name->Visible)
			$this->DetailColumnCount += 1;
		if ($this->middle_name->Visible)
			$this->DetailColumnCount += 1;
		if ($this->last_name->Visible)
			$this->DetailColumnCount += 1;
		if ($this->gender->Visible)
			$this->DetailColumnCount += 1;
		if ($this->dob->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Age->Visible)
			$this->DetailColumnCount += 1;
		if ($this->blood_group->Visible)
			$this->DetailColumnCount += 1;
		if ($this->mobile_no->Visible)
			$this->DetailColumnCount += 1;
		if ($this->IdentificationMark->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Religion->Visible)
			$this->DetailColumnCount += 1;
		if ($this->_Nationality->Visible)
			$this->DetailColumnCount += 1;
		if ($this->status->Visible)
			$this->DetailColumnCount += 1;
		if ($this->createdby->Visible)
			$this->DetailColumnCount += 1;
		if ($this->createddatetime->Visible)
			$this->DetailColumnCount += 1;
		if ($this->modifiedby->Visible)
			$this->DetailColumnCount += 1;
		if ($this->modifieddatetime->Visible)
			$this->DetailColumnCount += 1;
		if ($this->ReferedByDr->Visible)
			$this->DetailColumnCount += 1;
		if ($this->ReferClinicname->Visible)
			$this->DetailColumnCount += 1;
		if ($this->ReferCity->Visible)
			$this->DetailColumnCount += 1;
		if ($this->ReferMobileNo->Visible)
			$this->DetailColumnCount += 1;
		if ($this->ReferA4TreatingConsultant->Visible)
			$this->DetailColumnCount += 1;
		if ($this->PurposreReferredfor->Visible)
			$this->DetailColumnCount += 1;
		if ($this->spouse_title->Visible)
			$this->DetailColumnCount += 1;
		if ($this->spouse_first_name->Visible)
			$this->DetailColumnCount += 1;
		if ($this->spouse_middle_name->Visible)
			$this->DetailColumnCount += 1;
		if ($this->spouse_last_name->Visible)
			$this->DetailColumnCount += 1;
		if ($this->spouse_gender->Visible)
			$this->DetailColumnCount += 1;
		if ($this->spouse_dob->Visible)
			$this->DetailColumnCount += 1;
		if ($this->spouse_Age->Visible)
			$this->DetailColumnCount += 1;
		if ($this->spouse_blood_group->Visible)
			$this->DetailColumnCount += 1;
		if ($this->spouse_mobile_no->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Maritalstatus->Visible)
			$this->DetailColumnCount += 1;
		if ($this->_Business->Visible)
			$this->DetailColumnCount += 1;
		if ($this->_Patient_Language->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Passport->Visible)
			$this->DetailColumnCount += 1;
		if ($this->VisaNo->Visible)
			$this->DetailColumnCount += 1;
		if ($this->ValidityOfVisa->Visible)
			$this->DetailColumnCount += 1;
		if ($this->WhereDidYouHear->Visible)
			$this->DetailColumnCount += 1;
		if ($this->PatientID->Visible)
			$this->DetailColumnCount += 1;
		if ($this->HospID->Visible)
			$this->DetailColumnCount += 1;
		if ($this->street->Visible)
			$this->DetailColumnCount += 1;
		if ($this->town->Visible)
			$this->DetailColumnCount += 1;
		if ($this->province->Visible)
			$this->DetailColumnCount += 1;
		if ($this->country->Visible)
			$this->DetailColumnCount += 1;
		if ($this->postal_code->Visible)
			$this->DetailColumnCount += 1;
		if ($this->PEmail->Visible)
			$this->DetailColumnCount += 1;
		if ($this->PEmergencyContact->Visible)
			$this->DetailColumnCount += 1;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/") + 1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', "", $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("rpt", $this->TableVar, $url, "", $this->TableVar, TRUE);
	}

	// Set up export options (extended)
	protected function setupExportOptionsExt()
	{
		global $ReportLanguage, $ReportOptions;
		$reportTypes = $ReportOptions["ReportTypes"];
		$item = &$this->ExportOptions->getItem("pdf");
		$item->Visible = TRUE;
		if ($item->Visible)
			$reportTypes["pdf"] = $ReportLanguage->phrase("ReportFormPdf");
		$item->Body = "<a class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportPdfUrl . "', '" . session_id() . "');\">" . $ReportLanguage->phrase("ExportToPDF") . "</a>";
		$ReportOptions["ReportTypes"] = $reportTypes;
	}

	// Export email
	public function exportEmail($emailContent)
	{
		global $TempImages, $ReportLanguage;
		$genRequest = ReportParam("generaterequest") === TRUE;
		$failRespPfx = $genRequest ? "" : "<p class=\"text-danger\">";
		$successRespPfx = $genRequest ? "" : "<p class=\"text-success\">";
		$respSfx = $genRequest ? "" : "</p>";
		$contentType = ReportParam("contenttype", "");
		$sender = ReportParam("sender", "");
		$recipient = ReportParam("recipient", "");
		$cc = ReportParam("cc", "");
		$bcc = ReportParam("bcc", "");

		// Subject
		$emailSubject = ReportParam("subject", "");

		// Message
		$emailMessage = ReportParam("message", "");

		// Check sender
		if ($sender == "")
			return $failRespPfx . $ReportLanguage->phrase("EnterSenderEmail") . $respSfx;
		if (!CheckEmail($sender))
			return $failRespPfx . $ReportLanguage->phrase("EnterProperSenderEmail") . $respSfx;

		// Check recipient
		if (!CheckEmailList($recipient, MAX_EMAIL_RECIPIENT))
			return $failRespPfx . $ReportLanguage->phrase("EnterProperRecipientEmail") . $respSfx;

		// Check cc
		if (!CheckEmailList($cc, MAX_EMAIL_RECIPIENT))
			return $failRespPfx . $ReportLanguage->phrase("EnterProperCcEmail") . $respSfx;

		// Check bcc
		if (!CheckEmailList($bcc, MAX_EMAIL_RECIPIENT))
			return $failRespPfx . $ReportLanguage->phrase("EnterProperBccEmail") . $respSfx;

		// Check email sent count
		$emailCount = $genRequest ? 0 : LoadEmailCount();
		if (intval($emailCount) >= MAX_EMAIL_SENT_COUNT)
			return $failRespPfx . $ReportLanguage->phrase("ExceedMaxEmailExport") . $respSfx;
		if ($emailMessage <> "") {
			if (REMOVE_XSS)
				$emailMessage = RemoveXSS($emailMessage);
			$emailMessage .= ($contentType == "url") ? "\r\n\r\n" : "<br><br>";
		}
		$attachmentContent = AdjustEmailContent($emailContent);
		$appPath = FullUrl();
		$appPath = substr($appPath, 0, strrpos($appPath, "/") + 1);
		if (ContainsString($attachmentContent, "<head>"))
			$attachmentContent = str_replace("<head>", "<head><base href=\"" . $appPath . "\">", $attachmentContent); // Add <base href> statement inside the header
		else
			$attachmentContent = "<base href=\"" . $appPath . "\">" . $attachmentContent; // Add <base href> statement as the first statement

		//$attachmentFile = $this->TableVar . "_" . Date("YmdHis") . ".html";
		$attachmentFile = $this->TableVar . "_" . Date("YmdHis") . "_" . Random() . ".html";
		if ($contentType == "url") {
			SaveFile(UPLOAD_DEST_PATH, $attachmentFile, $attachmentContent);
			$attachmentFile = UPLOAD_DEST_PATH . $attachmentFile;
			$url = $appPath . $attachmentFile;
			$emailMessage .= $url; // Send URL only
			$attachmentFile = "";
			$attachmentContent = "";
		} else {
			$emailMessage .= $attachmentContent;
			$attachmentFile = "";
			$attachmentContent = "";
		}

		// Send email
		$email = new Email();
		$email->Sender = $sender; // Sender
		$email->Recipient = $recipient; // Recipient
		$email->Cc = $cc; // Cc
		$email->Bcc = $bcc; // Bcc
		$email->Subject = $emailSubject; // Subject
		$email->Content = $emailMessage; // Content
		if ($attachmentFile <> "")
			$email->addAttachment($attachmentFile, $attachmentContent);
		if ($contentType <> "url") {
			foreach ($TempImages as $tmpimage)
				$email->addEmbeddedImage($tmpimage);
		}
		$email->Format = ($contentType == "url") ? "text" : "html";
		$email->Charset = EMAIL_CHARSET;
		$eventArgs = [];
		$emailSent = FALSE;
		if ($this->Email_Sending($email, $eventArgs))
			$emailSent = $email->send();
		DeleteTempImages($emailContent);

		// Check email sent status
		if ($emailSent) {

			// Update email sent count and write log
			AddEmailLog($sender, $recipient, $emailSubject, $emailMessage);

			// Sent email success
			return $successRespPfx . $ReportLanguage->phrase("SendEmailSuccess") . $respSfx; // Set up success message
		} else {

			// Sent email failure
			return $failRespPfx . $email->SendErrDescription . $respSfx;
		}
	}

	// Export to HTML
	public function exportHtml($html)
	{

		//global $ExportFileName;
		//header('Content-Type: text/html' . (PROJECT_CHARSET <> '' ? ';charset=' . PROJECT_CHARSET : ''));
		//header('Content-Disposition: attachment; filename=' . $ExportFileName . '.html');

		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";

		// Save generate file for print
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
			$baseTag = "<base href=\"" . BaseUrl() . "\">";
			$html = preg_replace('/<head>/', '<head>' . $baseTag, $html);
			SaveFile($folder, $fileName, $html);
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file")
			Write($html);
		return $saveToFile;
	}

	// Export to Word
	public function exportWord($html)
	{
		global $ExportFileName;
		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
		 	SaveFile(ServerMapPath($folder), $fileName, $html);
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			AddHeader('Set-Cookie', 'fileDownload=true; path=/');
			AddHeader('Content-Type', 'application/vnd.ms-word' . (PROJECT_CHARSET <> '' ? ';charset=' . PROJECT_CHARSET : ''));
			AddHeader('Content-Disposition', 'attachment; filename=' . $ExportFileName . '.doc');
			Write($html);
		}
		return $saveToFile;
	}

	// Export to Excel
	public function exportExcel($html)
	{
		global $ExportFileName;
		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
		 	SaveFile(ServerMapPath($folder), $fileName, $html);
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			AddHeader('Set-Cookie', 'fileDownload=true; path=/');
			AddHeader('Content-Type', 'application/vnd.ms-excel' . (PROJECT_CHARSET <> '' ? ';charset=' . PROJECT_CHARSET : ''));
			AddHeader('Content-Disposition', 'attachment; filename=' . $ExportFileName . '.xls');
			Write($html);
		}
		return $saveToFile;
	}

	// Export PDF
	public function exportPdf($html)
	{
		global $ExportFileName, $PDF_MEMORY_LIMIT, $PDF_TIME_LIMIT, $PDF_IMAGE_SCALE_FACTOR;
		@ini_set("memory_limit", $PDF_MEMORY_LIMIT);
		set_time_limit($PDF_TIME_LIMIT);
		$html = CheckHtml($html);
		if (DEBUG_ENABLED) // Add debug message
			$html = str_replace("</body>", GetDebugMessage() . "</body>", $html);
		$dompdf = new \Dompdf\Dompdf(["pdf_backend" => "Cpdf"]);
		$doc = new \DOMDocument("1.0", "utf-8");
		@$doc->loadHTML('<?xml encoding="uft-8">' . ConvertToUtf8($html)); // Convert to utf-8
		$spans = $doc->getElementsByTagName("span");
		foreach ($spans as $span) {
			$classNames = $span->getAttribute("class");
			if ($classNames == "ew-filter-caption") // Insert colon
				$span->parentNode->insertBefore($doc->createElement("span", ":&nbsp;"), $span->nextSibling);
			elseif (preg_match('/\bicon\-\w+\b/', $classNames)) // Remove icons
				$span->parentNode->removeChild($span);
		}
		$images = $doc->getElementsByTagName("img");
		$pageSize = "a4";
		$pageOrientation = "portrait";
		$this->ExportPageOrientation = $pageOrientation;
		$portrait = SameText($pageOrientation, "portrait");
		foreach ($images as $image) {
			$imagefn = $image->getAttribute("src");
			if (file_exists($imagefn)) {
				$imagefn = realpath($imagefn);
				$size = getimagesize($imagefn); // Get image size
				if ($size[0] <> 0) {
					if (SameText($pageSize, "letter")) { // Letter paper (8.5 in. by 11 in.)
						$w = $portrait ? 216 : 279;
					} elseif (SameText($pageSize, "legal")) { // Legal paper (8.5 in. by 14 in.)
						$w = $portrait ? 216 : 356;
					} else {
						$w = $portrait ? 210 : 297; // A4 paper (210 mm by 297 mm)
					}
					$w = min($size[0], ($w - 20 * 2) / 25.4 * 72 * $PDF_IMAGE_SCALE_FACTOR); // Resize image, adjust the scale factor if necessary
					$h = $w / $size[0] * $size[1];
					$image->setAttribute("width", $w);
					$image->setAttribute("height", $h);
				}
			}
		}
		$html = $doc->saveHTML();
		$html = ConvertFromUtf8($html);
		$dompdf->load_html($html);
		$dompdf->set_paper($pageSize, $pageOrientation);
		$dompdf->render();
		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
			SaveFile(ServerMapPath($folder), $fileName, $dompdf->output());
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			AddHeader('Set-Cookie', 'fileDownload=true; path=/');
			$exportFile = EndsText(".pdf", $ExportFileName) ? $ExportFileName : $ExportFileName . ".pdf";
			$dompdf->stream($exportFile, ["Attachment" => 1]); // 0 to open in browser, 1 to download
		}
		DeleteTempImages($html);
		return $saveToFile;
	}

	// Set up starting group
	protected function setupStartGroup()
	{

		// Exit if no groups
		if ($this->DisplayGroups == 0)
			return;
		$startGrp = ReportParam(TABLE_START_GROUP, "");
		$pageNo = ReportParam("pageno", "");

		// Check for a 'start' parameter
		if ($startGrp != "") {
			$this->StartGroup = $startGrp;
			$this->setStartGroup($this->StartGroup);
		} elseif ($pageNo != "") {
			if (is_numeric($pageNo)) {
				$this->StartGroup = ($pageNo - 1) * $this->DisplayGroups + 1;
				if ($this->StartGroup <= 0) {
					$this->StartGroup = 1;
				} elseif ($this->StartGroup >= intval(($this->TotalGroups - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1) {
					$this->StartGroup = intval(($this->TotalGroups - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1;
				}
				$this->setStartGroup($this->StartGroup);
			} else {
				$this->StartGroup = $this->getStartGroup();
			}
		} else {
			$this->StartGroup = $this->getStartGroup();
		}

		// Check if correct start group counter
		if (!is_numeric($this->StartGroup) || $this->StartGroup == "") { // Avoid invalid start group counter
			$this->StartGroup = 1; // Reset start group counter
			$this->setStartGroup($this->StartGroup);
		} elseif (intval($this->StartGroup) > intval($this->TotalGroups)) { // Avoid starting group > total groups
			$this->StartGroup = intval(($this->TotalGroups - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1; // Point to last page first group
			$this->setStartGroup($this->StartGroup);
		} elseif (($this->StartGroup-1) % $this->DisplayGroups <> 0) {
			$this->StartGroup = intval(($this->StartGroup - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1; // Point to page boundary
			$this->setStartGroup($this->StartGroup);
		}
	}

	// Reset pager
	protected function resetPager()
	{

		// Reset start position (reset command)
		$this->StartGroup = 1;
		$this->setStartGroup($this->StartGroup);
	}

	// Set up number of groups displayed per page
	protected function setupDisplayGroups()
	{
		if (ReportParam(TABLE_GROUP_PER_PAGE) !== NULL) {
			$wrk = ReportParam(TABLE_GROUP_PER_PAGE);
			if (is_numeric($wrk)) {
				$this->DisplayGroups = intval($wrk);
			} else {
				if (strtoupper($wrk) == "ALL") { // Display all groups
					$this->DisplayGroups = -1;
				} else {
					$this->DisplayGroups = 3; // Non-numeric, load default
				}
			}
			$this->setGroupPerPage($this->DisplayGroups); // Save to session

			// Reset start position (reset command)
			$this->StartGroup = 1;
			$this->setStartGroup($this->StartGroup);
		} else {
			if ($this->getGroupPerPage() <> "") {
				$this->DisplayGroups = $this->getGroupPerPage(); // Restore from session
			} else {
				$this->DisplayGroups = 3; // Load default
			}
		}
	}

	// Get sort parameters based on sort links clicked
	protected function getSort()
	{
		if ($this->DrillDown)
			return "";
		$resetSort = ReportParam("cmd") === "resetsort";
		$orderBy = ReportParam("order", "");
		$orderType = ReportParam("ordertype", "");

		// Check for a resetsort command
		if ($resetSort) {
			$this->setOrderBy("");
			$this->setStartGroup(1);
			$this->id->setSort("");
			$this->title->setSort("");
			$this->first_name->setSort("");
			$this->middle_name->setSort("");
			$this->last_name->setSort("");
			$this->gender->setSort("");
			$this->dob->setSort("");
			$this->Age->setSort("");
			$this->blood_group->setSort("");
			$this->mobile_no->setSort("");
			$this->IdentificationMark->setSort("");
			$this->Religion->setSort("");
			$this->_Nationality->setSort("");
			$this->status->setSort("");
			$this->createdby->setSort("");
			$this->createddatetime->setSort("");
			$this->modifiedby->setSort("");
			$this->modifieddatetime->setSort("");
			$this->ReferedByDr->setSort("");
			$this->ReferClinicname->setSort("");
			$this->ReferCity->setSort("");
			$this->ReferMobileNo->setSort("");
			$this->ReferA4TreatingConsultant->setSort("");
			$this->PurposreReferredfor->setSort("");
			$this->spouse_title->setSort("");
			$this->spouse_first_name->setSort("");
			$this->spouse_middle_name->setSort("");
			$this->spouse_last_name->setSort("");
			$this->spouse_gender->setSort("");
			$this->spouse_dob->setSort("");
			$this->spouse_Age->setSort("");
			$this->spouse_blood_group->setSort("");
			$this->spouse_mobile_no->setSort("");
			$this->Maritalstatus->setSort("");
			$this->_Business->setSort("");
			$this->_Patient_Language->setSort("");
			$this->Passport->setSort("");
			$this->VisaNo->setSort("");
			$this->ValidityOfVisa->setSort("");
			$this->WhereDidYouHear->setSort("");
			$this->PatientID->setSort("");
			$this->HospID->setSort("");
			$this->street->setSort("");
			$this->town->setSort("");
			$this->province->setSort("");
			$this->country->setSort("");
			$this->postal_code->setSort("");
			$this->PEmail->setSort("");
			$this->PEmergencyContact->setSort("");

		// Check for an Order parameter
		} elseif ($orderBy <> "") {
			$this->CurrentOrder = $orderBy;
			$this->CurrentOrderType = $orderType;
			$sortSql = $this->sortSql();
			$this->setOrderBy($sortSql);
			$this->setStartGroup(1);
		}
		return $this->getOrderBy();
	}

	// Return extended filter
	protected function getExtendedFilter()
	{
		global $FormError;
		$filter = "";
		if ($this->DrillDown)
			return "";
		$postBack = IsPost();
		$restoreSession = TRUE;
		$setupFilter = FALSE;

		// Reset extended filter if filter changed
		if ($postBack) {

		// Reset search command
		} elseif (Get("cmd", "") == "reset") {

			// Load default values
			$this->setSessionFilterValues($this->createddatetime->AdvancedSearch->SearchValue, $this->createddatetime->AdvancedSearch->SearchOperator, $this->createddatetime->AdvancedSearch->SearchCondition, $this->createddatetime->AdvancedSearch->SearchValue2, $this->createddatetime->AdvancedSearch->SearchOperator2, "createddatetime"); // Field createddatetime

			//$setupFilter = TRUE; // No need to set up, just use default
		} else {
			$restoreSession = !$this->SearchCommand;

			// Field createddatetime
			if ($this->getFilterValues($this->createddatetime)) {
				$setupFilter = TRUE;
			}
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				return $filter;
			}
		}

		// Restore session
		if ($restoreSession) {
			$this->getSessionFilterValues($this->createddatetime); // Field createddatetime
		}

		// Call page filter validated event
		$this->Page_FilterValidated();

		// Build SQL
		$this->buildExtendedFilter($this->createddatetime, $filter, FALSE, TRUE); // Field createddatetime

		// Save parms to session
		$this->setSessionFilterValues($this->createddatetime->AdvancedSearch->SearchValue, $this->createddatetime->AdvancedSearch->SearchOperator, $this->createddatetime->AdvancedSearch->SearchCondition, $this->createddatetime->AdvancedSearch->SearchValue2, $this->createddatetime->AdvancedSearch->SearchOperator2, "createddatetime"); // Field createddatetime

		// Setup filter
		if ($setupFilter) {
		}
		return $filter;
	}

	// Build dropdown filter
	protected function buildDropDownFilter(&$fld, &$filterClause, $fldOpr, $default = FALSE, $saveFilter = FALSE)
	{
		$fldVal = ($default) ? $fld->DefaultDropDownValue : $fld->DropDownValue;
		$sql = "";
		if (is_array($fldVal)) {
			foreach ($fldVal as $val) {
				$wrk = $this->getDropDownFilter($fld, $val, $fldOpr);

				// Call Page Filtering event
				if (!StartsString("@@", $val))
					$this->Page_Filtering($fld, $wrk, "dropdown", $fldOpr, $val);
				if ($wrk <> "") {
					if ($sql <> "")
						$sql .= " OR " . $wrk;
					else
						$sql = $wrk;
				}
			}
		} else {
			$sql = $this->getDropDownFilter($fld, $fldVal, $fldOpr);

			// Call Page Filtering event
			if (!StartsString("@@", $fldVal))
				$this->Page_Filtering($fld, $sql, "dropdown", $fldOpr, $fldVal);
		}
		if ($sql <> "") {
			AddFilter($filterClause, $sql);
			if ($saveFilter) $fld->CurrentFilter = $sql;
		}
	}

	// Get dropdown filter
	protected function getDropDownFilter(&$fld, $fldVal, $fldOpr)
	{
		$fldName = $fld->Name;
		$fldExpression = $fld->Expression;
		$fldDataType = $fld->DataType;
		$fldDelimiter = $fld->Delimiter;
		$fldVal = strval($fldVal);
		if ($fldOpr == "") $fldOpr = "=";
		$wrk = "";
		if (SameString($fldVal, NULL_VALUE)) {
			$wrk = $fldExpression . " IS NULL";
		} elseif (SameString($fldVal, NOT_NULL_VALUE)) {
			$wrk = $fldExpression . " IS NOT NULL";
		} elseif (SameString($fldVal, EMPTY_VALUE)) {
			$wrk = $fldExpression . " = ''";
		} elseif (SameString($fldVal, ALL_VALUE)) {
			$wrk = "1 = 1";
		} else {
			if (StartsString("@@", $fldVal)) {
				$wrk = $this->getCustomFilter($fld, $fldVal, $this->Dbid);
			} elseif ($fldDelimiter <> "" && trim($fldVal) <> "" && ($fldDataType == DATATYPE_STRING || $fldDataType == DATATYPE_MEMO)) {
				$wrk = GetMultiValueSearchSql($fldExpression, trim($fldVal), $this->Dbid);
			} else {
				if ($fldVal <> "" && $fldVal <> INIT_VALUE) {
					if ($fldDataType == DATATYPE_DATE && $fldOpr <> "") {
						$wrk = GetDateFilterSql($fldExpression, $fldOpr, $fldVal, $fldDataType, $this->Dbid);
					} else {
						$wrk = GetFilterSql($fldOpr, $fldVal, $fldDataType, $this->Dbid);
						if ($wrk <> "") $wrk = $fldExpression . $wrk;
					}
				}
			}
		}
		return $wrk;
	}

	// Get custom filter
	protected function getCustomFilter(&$fld, $fldVal, $dbid = 0)
	{
		$wrk = "";
		if (is_array($fld->AdvancedFilters)) {
			foreach ($fld->AdvancedFilters as $filter) {
				if ($filter->ID == $fldVal && $filter->Enabled) {
					$fldExpr = $fld->Expression;
					$fn = $filter->FunctionName;
					$wrkid = StartsString("@@", $filter->ID) ? substr($filter->ID, 2) : $filter->ID;
					if ($fn <> "") {
						$fn = PROJECT_NAMESPACE . $fn;
						$wrk = $fn($fldExpr, $dbid);
					} else
						$wrk = "";
					$this->Page_Filtering($fld, $wrk, "custom", $wrkid);
					break;
				}
			}
		}
		return $wrk;
	}

	// Build extended filter
	protected function buildExtendedFilter(&$fld, &$filterClause, $default = FALSE, $saveFilter = FALSE)
	{
		$wrk = GetExtendedFilter($fld, $default, $this->Dbid);
		if (!$default)
			$this->Page_Filtering($fld, $wrk, "extended", $fld->AdvancedSearch->SearchOperator, $fld->AdvancedSearch->SearchValue, $fld->AdvancedSearch->SearchCondition, $fld->AdvancedSearch->SearchOperator2, $fld->AdvancedSearch->SearchValue2);
		if ($wrk <> "") {
			AddFilter($filterClause, $wrk);
			if ($saveFilter) $fld->CurrentFilter = $wrk;
		}
	}

	// Get drop down value from querystring
	protected function getDropDownValue(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		if (IsPost())
			return FALSE; // Skip post back
		$opr = Get("z_$parm");
		if ($opr !== NULL)
			$fld->AdvancedSearch->SearchOperator = $opr;
		$val = Get("x_$parm");
		if ($val !== NULL) {
			if ($fld->isMultiSelect() && !is_array($val)) // Split values for modal lookup
				$fld->DropDownValue = explode(LOOKUP_FILTER_VALUE_SEPARATOR, $val);
			else
				$fld->DropDownValue = $val;
			return TRUE;
		}
		return FALSE;
	}

	// Get filter values from querystring
	protected function getFilterValues(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		if (IsPost())
			return; // Skip post back
		$got = FALSE;
		if (Get("x_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchValue = Get("x_$parm");
			$got = TRUE;
		}
		if (Get("z_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchOperator = Get("z_$parm");
			$got = TRUE;
		}
		if (Get("v_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchCondition = Get("v_$parm");
			$got = TRUE;
		}
		if (Get("y_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchValue2 = Get("y_$parm");
			$got = TRUE;
		}
		if (Get("w_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchOperator2 = Get("w_$parm");
			$got = TRUE;
		}
		return $got;
	}

	// Set default ext filter
	protected function setDefaultExtFilter(&$fld, $so1, $sv1, $sc, $so2, $sv2)
	{
		$fld->AdvancedSearch->SearchValueDefault = $sv1; // Default ext filter value 1
		$fld->AdvancedSearch->SearchValue2Default = $sv2; // Default ext filter value 2 (if operator 2 is enabled)
		$fld->AdvancedSearch->SearchOperatorDefault = $so1; // Default search operator 1
		$fld->AdvancedSearch->SearchOperator2Default = $so2; // Default search operator 2 (if operator 2 is enabled)
		$fld->AdvancedSearch->SearchConditionDefault = $sc; // Default search condition (if operator 2 is enabled)
	}

	// Apply default ext filter
	protected function applyDefaultExtFilter(&$fld)
	{
		$fld->AdvancedSearch->SearchValue = $fld->AdvancedSearch->SearchValueDefault;
		$fld->AdvancedSearch->SearchValue2 = $fld->AdvancedSearch->SearchValue2Default;
		$fld->AdvancedSearch->SearchOperator = $fld->AdvancedSearch->SearchOperatorDefault;
		$fld->AdvancedSearch->SearchOperator2 = $fld->AdvancedSearch->SearchOperator2Default;
		$fld->AdvancedSearch->SearchCondition = $fld->AdvancedSearch->SearchConditionDefault;
	}

	// Check if Text Filter applied
	protected function textFilterApplied(&$fld)
	{
		return (strval($fld->AdvancedSearch->SearchValue) <> strval($fld->AdvancedSearch->SearchValueDefault) ||
			strval($fld->AdvancedSearch->SearchValue2) <> strval($fld->AdvancedSearch->SearchValue2Default) ||
			(strval($fld->AdvancedSearch->SearchValue) <> "" &&
				strval($fld->AdvancedSearch->SearchOperator) <> strval($fld->AdvancedSearch->SearchOperatorDefault)) ||
			(strval($fld->AdvancedSearch->SearchValue2) <> "" &&
				strval($fld->AdvancedSearch->SearchOperator2) <> strval($fld->AdvancedSearch->SearchOperator2Default)) ||
			strval($fld->AdvancedSearch->SearchCondition) <> strval($fld->AdvancedSearch->SearchConditionDefault));
	}

	// Check if Non-Text Filter applied
	protected function nonTextFilterApplied(&$fld)
	{
		if (is_array($fld->DropDownValue)) {
			if (is_array($fld->DefaultDropDownValue)) {
				if (count($fld->DefaultDropDownValue) <> count($fld->DropDownValue))
					return TRUE;
				else
					return (count(array_diff($fld->DefaultDropDownValue, $fld->DropDownValue)) <> 0);
			} else {
				return TRUE;
			}
		} else {
			if (is_array($fld->DefaultDropDownValue))
				return TRUE;
			else
				$v1 = strval($fld->DefaultDropDownValue);
			if ($v1 == INIT_VALUE)
				$v1 = "";
			$v2 = strval($fld->DropDownValue);
			if ($v2 == INIT_VALUE || $v2 == ALL_VALUE)
				$v2 = "";
			return ($v1 <> $v2);
		}
	}

	// Get dropdown value from session
	protected function getSessionDropDownValue(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		$this->getSessionValue($fld->DropDownValue, 'x_patient_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchOperator, 'z_patient_' . $parm);
	}

	// Get filter values from session
	protected function getSessionFilterValues(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		$this->getSessionValue($fld->AdvancedSearch->SearchValue, 'x_patient_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchOperator, 'z_patient_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchCondition, 'v_patient_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchValue2, 'y_patient_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchOperator2, 'w_patient_' . $parm);
	}

	// Get value from session
	protected function getSessionValue(&$sv, $sn)
	{
		if (array_key_exists($sn, $_SESSION))
			$sv = $_SESSION[$sn];
	}

	// Set dropdown value to session
	protected function setSessionDropDownValue($sv, $so, $parm)
	{
		$_SESSION['x_patient_' . $parm] = $sv;
		$_SESSION['z_patient_' . $parm] = $so;
	}

	// Set filter values to session
	protected function setSessionFilterValues($sv1, $so1, $sc, $sv2, $so2, $parm)
	{
		$_SESSION['x_patient_' . $parm] = $sv1;
		$_SESSION['z_patient_' . $parm] = $so1;
		$_SESSION['v_patient_' . $parm] = $sc;
		$_SESSION['y_patient_' . $parm] = $sv2;
		$_SESSION['w_patient_' . $parm] = $so2;
	}

	// Check if has session filter values
	protected function hasSessionFilterValues($parm)
	{
		return (@$_SESSION['x_' . $parm] <> "" && @$_SESSION['x_' . $parm] <> INIT_VALUE ||
			@$_SESSION['x_' . $parm] <> "" && @$_SESSION['x_' . $parm] <> INIT_VALUE ||
			@$_SESSION['y_' . $parm] <> "" && @$_SESSION['y_' . $parm] <> INIT_VALUE);
	}

	// Dropdown filter exist
	protected function dropDownFilterExist(&$fld, $fldOpr)
	{
		$wrk = "";
		$this->buildDropDownFilter($fld, $wrk, $fldOpr);
		return ($wrk <> "");
	}

	// Extended filter exist
	protected function extendedFilterExist(&$fld)
	{
		$extWrk = "";
		$this->buildExtendedFilter($fld, $extWrk);
		return ($extWrk <> "");
	}

	// Validate form
	protected function validateForm()
	{
		global $ReportLanguage, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($FormError, $this->createddatetime->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			$FormError .= ($FormError <> "") ? "<p>&nbsp;</p>" : "";
			$FormError .= $formCustomError;
		}
		return $validateForm;
	}

	// Clear selection stored in session
	protected function clearSessionSelection($parm)
	{
		$_SESSION["sel_patient_$parm"] = "";
		$_SESSION["rf_patient_$parm"] = "";
		$_SESSION["rt_patient_$parm"] = "";
	}

	// Load selection from session
	protected function loadSelectionFromSession($parm)
	{
		foreach ($this->fields as $fld) {
			if ($fld->Param == $parm) {
				$fld->SelectionList = @$_SESSION["sel_patient_$parm"];
				$fld->RangeFrom = @$_SESSION["rf_patient_$parm"];
				$fld->RangeTo = @$_SESSION["rt_patient_$parm"];
				break;
			}
		}
	}

	// Load default value for filters
	protected function loadDefaultFilters()
	{

		/**
		* Set up default values for non Text filters
		*/

		/**
		* Set up default values for extended filters
		* function setDefaultExtFilter(&$fld, $so1, $sv1, $sc, $so2, $sv2)
		* Parameters:
		* $fld - Field object
		* $so1 - Default search operator 1
		* $sv1 - Default ext filter value 1
		* $sc - Default search condition (if operator 2 is enabled)
		* $so2 - Default search operator 2 (if operator 2 is enabled)
		* $sv2 - Default ext filter value 2 (if operator 2 is enabled)
		*/
		// Field createddatetime

		$this->setDefaultExtFilter($this->createddatetime, "USER SELECT", NULL, 'AND', "=", NULL);
		if (!$this->SearchCommand)
			$this->applyDefaultExtFilter($this->createddatetime);

		/**
		* Set up default values for popup filters
		*/
	}

	// Check if filter applied
	protected function checkFilter()
	{

		// Check createddatetime text filter
		if ($this->textFilterApplied($this->createddatetime))
			return TRUE;
		return FALSE;
	}

	// Show list of filters
	public function showFilterList($showDate = FALSE)
	{
		global $ReportLanguage;

		// Initialize
		$filterList = "";
		$captionClass = $this->isExport("email") ? "ew-filter-caption-email" : "ew-filter-caption";
		$captionSuffix = $this->isExport("email") ? ": " : "";

		// Field createddatetime
		$extWrk = "";
		$wrk = "";
		$this->buildExtendedFilter($this->createddatetime, $extWrk);
		$filter = "";
		if ($extWrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$extWrk</span>";
		elseif ($wrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$wrk</span>";
		if ($filter <> "")
			$filterList .= "<div><span class=\"" . $captionClass . "\">" . $this->createddatetime->caption() . "</span>" . $captionSuffix . $filter . "</div>";
		$divdataclass = "";

		// Show Filters
		if ($filterList <> "" || $showDate) {
			$message = "<div" . $divdataclass . "><div id=\"ew-filter-list\" class=\"alert alert-info d-table\">";
			if ($showDate)
				$message .= "<div id=\"ew-current-date\">" . $ReportLanguage->phrase("ReportGeneratedDate") . FormatDateTime(date("Y-m-d H:i:s"), 1) . "</div>";
			if ($filterList <> "")
				$message .= "<div id=\"ew-current-filters\">" . $ReportLanguage->phrase("CurrentFilters") . "</div>" . $filterList;
			$message .= "</div></div>";
			$this->Message_Showing($message, "");
			Write($message);
		}
	}

	// Get list of filters
	public function getFilterList()
	{

		// Initialize
		$filterList = "";

		// Field createddatetime
		$wrk = "";
		if ($this->createddatetime->AdvancedSearch->SearchValue <> "" || $this->createddatetime->AdvancedSearch->SearchValue2 <> "") {
			$wrk = "\"x_createddatetime\":\"" . JsEncode($this->createddatetime->AdvancedSearch->SearchValue) . "\"," .
				"\"z_createddatetime\":\"" . JsEncode($this->createddatetime->AdvancedSearch->SearchOperator) . "\"," .
				"\"v_createddatetime\":\"" . JsEncode($this->createddatetime->AdvancedSearch->SearchCondition) . "\"," .
				"\"y_createddatetime\":\"" . JsEncode($this->createddatetime->AdvancedSearch->SearchValue2) . "\"," .
				"\"w_createddatetime\":\"" . JsEncode($this->createddatetime->AdvancedSearch->SearchOperator2) . "\"";
		}
		if ($wrk <> "") {
			if ($filterList <> "") $filterList .= ",";
			$filterList .= $wrk;
		}

		// Return filter list in json
		if ($filterList <> "")
			return "{\"data\":{" . $filterList . "}}";
		else
			return "null";
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd", "") <> "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter", ""), TRUE);
		return $this->setupFilterList($filter);
	}

	// Setup list of filters
	protected function setupFilterList($filter)
	{
		if (!is_array($filter))
			return FALSE;

		// Field createddatetime
		$restoreFilter = FALSE;
		if (array_key_exists("x_createddatetime", $filter) || array_key_exists("z_createddatetime", $filter) ||
			array_key_exists("v_createddatetime", $filter) ||
			array_key_exists("y_createddatetime", $filter) || array_key_exists("w_createddatetime", $filter)) {
			$this->setSessionFilterValues(@$filter["x_createddatetime"], @$filter["z_createddatetime"], @$filter["v_createddatetime"], @$filter["y_createddatetime"], @$filter["w_createddatetime"], "createddatetime");
			$restoreFilter = TRUE;
		}
		if (!$restoreFilter) { // Clear filter
			$this->setSessionFilterValues("", "=", "AND", "", "=", "createddatetime");
		}
		return TRUE;
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Render lookup
					$this->RowType == ROWTYPE_VIEW;
					$fn = $fld->Lookup->RenderViewFunc;
					$render = method_exists($this, $fn);

					// Format the field values
					$fld->setDbValue($row[1]);
					if ($render) {
						$this->$fn();
						$row[1] = $fld->ViewValue;
						$row['df'] = $row[1];
					} elseif ($fld->isEncrypt()) {
						$row[1] = $fld->CurrentValue;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Return popup filter
	protected function getPopupFilter()
	{
		$wrk = "";
		if ($this->DrillDown)
			return "";
		return $wrk;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>