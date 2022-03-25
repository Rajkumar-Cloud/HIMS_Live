<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_stimulation_chart_preview extends ivf_stimulation_chart
{

	// Page ID
	public $PageID = "preview";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_stimulation_chart';

	// Page object name
	public $PageObjName = "ivf_stimulation_chart_preview";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
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
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
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
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
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
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;
		global $UserTable;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (ivf_stimulation_chart)
		if (!isset($GLOBALS["ivf_stimulation_chart"]) || get_class($GLOBALS["ivf_stimulation_chart"]) == PROJECT_NAMESPACE . "ivf_stimulation_chart") {
			$GLOBALS["ivf_stimulation_chart"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_stimulation_chart"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS['ivf_treatment_plan']))
			$GLOBALS['ivf_treatment_plan'] = new ivf_treatment_plan();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'preview');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_stimulation_chart');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();

		// User table object (user_login)
		$UserTable = $UserTable ?: new user_login();

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $ivf_stimulation_chart;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($ivf_stimulation_chart);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									"fn=" . Encrypt($fld->physicalUploadPath() . $val)));
								$row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
										Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
										"fn=" . Encrypt($fld->physicalUploadPath() . $file)));
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
	}

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
		if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
		if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
	}
	public $Recordset;
	public $TotalRecords;
	public $RowCount;
	public $RecCount;
	public $ListOptions; // List options
	public $OtherOptions; // Other options
	public $StartRecord = 1;
	public $DisplayRecords = 0;
	public $SortField = "";
	public $SortOrder = "";
	public $UseModalLinks = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
		} else {
			$Security = new AdvancedSecurity();
			if ($Security == NULL)
				$Security = new AdvancedSecurity();
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel(CurrentProjectID() . 'ivf_stimulation_chart');
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canList()) {
				echo DeniedMessage();
				exit();
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action

		// Set up list options
		$this->setupListOptions();
		$this->id->setVisibility();
		$this->RIDNo->setVisibility();
		$this->Name->setVisibility();
		$this->ARTCycle->setVisibility();
		$this->FemaleFactor->setVisibility();
		$this->MaleFactor->setVisibility();
		$this->Protocol->setVisibility();
		$this->SemenFrozen->setVisibility();
		$this->A4ICSICycle->setVisibility();
		$this->TotalICSICycle->setVisibility();
		$this->TypeOfInfertility->setVisibility();
		$this->Duration->setVisibility();
		$this->LMP->setVisibility();
		$this->RelevantHistory->setVisibility();
		$this->IUICycles->setVisibility();
		$this->AFC->setVisibility();
		$this->AMH->setVisibility();
		$this->FBMI->setVisibility();
		$this->MBMI->setVisibility();
		$this->OvarianVolumeRT->setVisibility();
		$this->OvarianVolumeLT->setVisibility();
		$this->DAYSOFSTIMULATION->setVisibility();
		$this->DOSEOFGONADOTROPINS->setVisibility();
		$this->INJTYPE->setVisibility();
		$this->ANTAGONISTDAYS->setVisibility();
		$this->ANTAGONISTSTARTDAY->setVisibility();
		$this->GROWTHHORMONE->setVisibility();
		$this->PRETREATMENT->setVisibility();
		$this->SerumP4->setVisibility();
		$this->FORT->setVisibility();
		$this->MedicalFactors->setVisibility();
		$this->SCDate->setVisibility();
		$this->OvarianSurgery->setVisibility();
		$this->PreProcedureOrder->setVisibility();
		$this->TRIGGERR->setVisibility();
		$this->TRIGGERDATE->setVisibility();
		$this->ATHOMEorCLINIC->setVisibility();
		$this->OPUDATE->setVisibility();
		$this->ALLFREEZEINDICATION->setVisibility();
		$this->ERA->setVisibility();
		$this->PGTA->setVisibility();
		$this->PGD->setVisibility();
		$this->DATEOFET->setVisibility();
		$this->ET->setVisibility();
		$this->ESET->setVisibility();
		$this->DOET->setVisibility();
		$this->SEMENPREPARATION->setVisibility();
		$this->REASONFORESET->setVisibility();
		$this->Expectedoocytes->setVisibility();
		$this->StChDate1->setVisibility();
		$this->StChDate2->setVisibility();
		$this->StChDate3->setVisibility();
		$this->StChDate4->setVisibility();
		$this->StChDate5->setVisibility();
		$this->StChDate6->setVisibility();
		$this->StChDate7->setVisibility();
		$this->StChDate8->setVisibility();
		$this->StChDate9->setVisibility();
		$this->StChDate10->setVisibility();
		$this->StChDate11->setVisibility();
		$this->StChDate12->setVisibility();
		$this->StChDate13->setVisibility();
		$this->CycleDay1->setVisibility();
		$this->CycleDay2->setVisibility();
		$this->CycleDay3->setVisibility();
		$this->CycleDay4->setVisibility();
		$this->CycleDay5->setVisibility();
		$this->CycleDay6->setVisibility();
		$this->CycleDay7->setVisibility();
		$this->CycleDay8->setVisibility();
		$this->CycleDay9->setVisibility();
		$this->CycleDay10->setVisibility();
		$this->CycleDay11->setVisibility();
		$this->CycleDay12->setVisibility();
		$this->CycleDay13->setVisibility();
		$this->StimulationDay1->setVisibility();
		$this->StimulationDay2->setVisibility();
		$this->StimulationDay3->setVisibility();
		$this->StimulationDay4->setVisibility();
		$this->StimulationDay5->setVisibility();
		$this->StimulationDay6->setVisibility();
		$this->StimulationDay7->setVisibility();
		$this->StimulationDay8->setVisibility();
		$this->StimulationDay9->setVisibility();
		$this->StimulationDay10->setVisibility();
		$this->StimulationDay11->setVisibility();
		$this->StimulationDay12->setVisibility();
		$this->StimulationDay13->setVisibility();
		$this->Tablet1->setVisibility();
		$this->Tablet2->setVisibility();
		$this->Tablet3->setVisibility();
		$this->Tablet4->setVisibility();
		$this->Tablet5->setVisibility();
		$this->Tablet6->setVisibility();
		$this->Tablet7->setVisibility();
		$this->Tablet8->setVisibility();
		$this->Tablet9->setVisibility();
		$this->Tablet10->setVisibility();
		$this->Tablet11->setVisibility();
		$this->Tablet12->setVisibility();
		$this->Tablet13->setVisibility();
		$this->RFSH1->setVisibility();
		$this->RFSH2->setVisibility();
		$this->RFSH3->setVisibility();
		$this->RFSH4->setVisibility();
		$this->RFSH5->setVisibility();
		$this->RFSH6->setVisibility();
		$this->RFSH7->setVisibility();
		$this->RFSH8->setVisibility();
		$this->RFSH9->setVisibility();
		$this->RFSH10->setVisibility();
		$this->RFSH11->setVisibility();
		$this->RFSH12->setVisibility();
		$this->RFSH13->setVisibility();
		$this->HMG1->setVisibility();
		$this->HMG2->setVisibility();
		$this->HMG3->setVisibility();
		$this->HMG4->setVisibility();
		$this->HMG5->setVisibility();
		$this->HMG6->setVisibility();
		$this->HMG7->setVisibility();
		$this->HMG8->setVisibility();
		$this->HMG9->setVisibility();
		$this->HMG10->setVisibility();
		$this->HMG11->setVisibility();
		$this->HMG12->setVisibility();
		$this->HMG13->setVisibility();
		$this->GnRH1->setVisibility();
		$this->GnRH2->setVisibility();
		$this->GnRH3->setVisibility();
		$this->GnRH4->setVisibility();
		$this->GnRH5->setVisibility();
		$this->GnRH6->setVisibility();
		$this->GnRH7->setVisibility();
		$this->GnRH8->setVisibility();
		$this->GnRH9->setVisibility();
		$this->GnRH10->setVisibility();
		$this->GnRH11->setVisibility();
		$this->GnRH12->setVisibility();
		$this->GnRH13->setVisibility();
		$this->E21->setVisibility();
		$this->E22->setVisibility();
		$this->E23->setVisibility();
		$this->E24->setVisibility();
		$this->E25->setVisibility();
		$this->E26->setVisibility();
		$this->E27->setVisibility();
		$this->E28->setVisibility();
		$this->E29->setVisibility();
		$this->E210->setVisibility();
		$this->E211->setVisibility();
		$this->E212->setVisibility();
		$this->E213->setVisibility();
		$this->P41->setVisibility();
		$this->P42->setVisibility();
		$this->P43->setVisibility();
		$this->P44->setVisibility();
		$this->P45->setVisibility();
		$this->P46->setVisibility();
		$this->P47->setVisibility();
		$this->P48->setVisibility();
		$this->P49->setVisibility();
		$this->P410->setVisibility();
		$this->P411->setVisibility();
		$this->P412->setVisibility();
		$this->P413->setVisibility();
		$this->USGRt1->setVisibility();
		$this->USGRt2->setVisibility();
		$this->USGRt3->setVisibility();
		$this->USGRt4->setVisibility();
		$this->USGRt5->setVisibility();
		$this->USGRt6->setVisibility();
		$this->USGRt7->setVisibility();
		$this->USGRt8->setVisibility();
		$this->USGRt9->setVisibility();
		$this->USGRt10->setVisibility();
		$this->USGRt11->setVisibility();
		$this->USGRt12->setVisibility();
		$this->USGRt13->setVisibility();
		$this->USGLt1->setVisibility();
		$this->USGLt2->setVisibility();
		$this->USGLt3->setVisibility();
		$this->USGLt4->setVisibility();
		$this->USGLt5->setVisibility();
		$this->USGLt6->setVisibility();
		$this->USGLt7->setVisibility();
		$this->USGLt8->setVisibility();
		$this->USGLt9->setVisibility();
		$this->USGLt10->setVisibility();
		$this->USGLt11->setVisibility();
		$this->USGLt12->setVisibility();
		$this->USGLt13->setVisibility();
		$this->EM1->setVisibility();
		$this->EM2->setVisibility();
		$this->EM3->setVisibility();
		$this->EM4->setVisibility();
		$this->EM5->setVisibility();
		$this->EM6->setVisibility();
		$this->EM7->setVisibility();
		$this->EM8->setVisibility();
		$this->EM9->setVisibility();
		$this->EM10->setVisibility();
		$this->EM11->setVisibility();
		$this->EM12->setVisibility();
		$this->EM13->setVisibility();
		$this->Others1->setVisibility();
		$this->Others2->setVisibility();
		$this->Others3->setVisibility();
		$this->Others4->setVisibility();
		$this->Others5->setVisibility();
		$this->Others6->setVisibility();
		$this->Others7->setVisibility();
		$this->Others8->setVisibility();
		$this->Others9->setVisibility();
		$this->Others10->setVisibility();
		$this->Others11->setVisibility();
		$this->Others12->setVisibility();
		$this->Others13->setVisibility();
		$this->DR1->setVisibility();
		$this->DR2->setVisibility();
		$this->DR3->setVisibility();
		$this->DR4->setVisibility();
		$this->DR5->setVisibility();
		$this->DR6->setVisibility();
		$this->DR7->setVisibility();
		$this->DR8->setVisibility();
		$this->DR9->setVisibility();
		$this->DR10->setVisibility();
		$this->DR11->setVisibility();
		$this->DR12->setVisibility();
		$this->DR13->setVisibility();
		$this->DOCTORRESPONSIBLE->Visible = FALSE;
		$this->TidNo->setVisibility();
		$this->Convert->setVisibility();
		$this->Consultant->setVisibility();
		$this->InseminatinTechnique->setVisibility();
		$this->IndicationForART->setVisibility();
		$this->Hysteroscopy->setVisibility();
		$this->EndometrialScratching->setVisibility();
		$this->TrialCannulation->setVisibility();
		$this->CYCLETYPE->setVisibility();
		$this->HRTCYCLE->setVisibility();
		$this->OralEstrogenDosage->setVisibility();
		$this->VaginalEstrogen->setVisibility();
		$this->GCSF->setVisibility();
		$this->ActivatedPRP->setVisibility();
		$this->UCLcm->setVisibility();
		$this->DATOFEMBRYOTRANSFER->setVisibility();
		$this->DAYOFEMBRYOTRANSFER->setVisibility();
		$this->NOOFEMBRYOSTHAWED->setVisibility();
		$this->NOOFEMBRYOSTRANSFERRED->setVisibility();
		$this->DAYOFEMBRYOS->setVisibility();
		$this->CRYOPRESERVEDEMBRYOS->setVisibility();
		$this->ViaAdmin->setVisibility();
		$this->ViaStartDateTime->setVisibility();
		$this->ViaDose->setVisibility();
		$this->AllFreeze->setVisibility();
		$this->TreatmentCancel->setVisibility();
		$this->Reason->Visible = FALSE;
		$this->ProgesteroneAdmin->setVisibility();
		$this->ProgesteroneStart->setVisibility();
		$this->ProgesteroneDose->setVisibility();
		$this->Projectron->Visible = FALSE;
		$this->StChDate14->setVisibility();
		$this->StChDate15->setVisibility();
		$this->StChDate16->setVisibility();
		$this->StChDate17->setVisibility();
		$this->StChDate18->setVisibility();
		$this->StChDate19->setVisibility();
		$this->StChDate20->setVisibility();
		$this->StChDate21->setVisibility();
		$this->StChDate22->setVisibility();
		$this->StChDate23->setVisibility();
		$this->StChDate24->setVisibility();
		$this->StChDate25->setVisibility();
		$this->CycleDay14->setVisibility();
		$this->CycleDay15->setVisibility();
		$this->CycleDay16->setVisibility();
		$this->CycleDay17->setVisibility();
		$this->CycleDay18->setVisibility();
		$this->CycleDay19->setVisibility();
		$this->CycleDay20->setVisibility();
		$this->CycleDay21->setVisibility();
		$this->CycleDay22->setVisibility();
		$this->CycleDay23->setVisibility();
		$this->CycleDay24->setVisibility();
		$this->CycleDay25->setVisibility();
		$this->StimulationDay14->setVisibility();
		$this->StimulationDay15->setVisibility();
		$this->StimulationDay16->setVisibility();
		$this->StimulationDay17->setVisibility();
		$this->StimulationDay18->setVisibility();
		$this->StimulationDay19->setVisibility();
		$this->StimulationDay20->setVisibility();
		$this->StimulationDay21->setVisibility();
		$this->StimulationDay22->setVisibility();
		$this->StimulationDay23->setVisibility();
		$this->StimulationDay24->setVisibility();
		$this->StimulationDay25->setVisibility();
		$this->Tablet14->setVisibility();
		$this->Tablet15->setVisibility();
		$this->Tablet16->setVisibility();
		$this->Tablet17->setVisibility();
		$this->Tablet18->setVisibility();
		$this->Tablet19->setVisibility();
		$this->Tablet20->setVisibility();
		$this->Tablet21->setVisibility();
		$this->Tablet22->setVisibility();
		$this->Tablet23->setVisibility();
		$this->Tablet24->setVisibility();
		$this->Tablet25->setVisibility();
		$this->RFSH14->setVisibility();
		$this->RFSH15->setVisibility();
		$this->RFSH16->setVisibility();
		$this->RFSH17->setVisibility();
		$this->RFSH18->setVisibility();
		$this->RFSH19->setVisibility();
		$this->RFSH20->setVisibility();
		$this->RFSH21->setVisibility();
		$this->RFSH22->setVisibility();
		$this->RFSH23->setVisibility();
		$this->RFSH24->setVisibility();
		$this->RFSH25->setVisibility();
		$this->HMG14->setVisibility();
		$this->HMG15->setVisibility();
		$this->HMG16->setVisibility();
		$this->HMG17->setVisibility();
		$this->HMG18->setVisibility();
		$this->HMG19->setVisibility();
		$this->HMG20->setVisibility();
		$this->HMG21->setVisibility();
		$this->HMG22->setVisibility();
		$this->HMG23->setVisibility();
		$this->HMG24->setVisibility();
		$this->HMG25->setVisibility();
		$this->GnRH14->setVisibility();
		$this->GnRH15->setVisibility();
		$this->GnRH16->setVisibility();
		$this->GnRH17->setVisibility();
		$this->GnRH18->setVisibility();
		$this->GnRH19->setVisibility();
		$this->GnRH20->setVisibility();
		$this->GnRH21->setVisibility();
		$this->GnRH22->setVisibility();
		$this->GnRH23->setVisibility();
		$this->GnRH24->setVisibility();
		$this->GnRH25->setVisibility();
		$this->P414->setVisibility();
		$this->P415->setVisibility();
		$this->P416->setVisibility();
		$this->P417->setVisibility();
		$this->P418->setVisibility();
		$this->P419->setVisibility();
		$this->P420->setVisibility();
		$this->P421->setVisibility();
		$this->P422->setVisibility();
		$this->P423->setVisibility();
		$this->P424->setVisibility();
		$this->P425->setVisibility();
		$this->USGRt14->setVisibility();
		$this->USGRt15->setVisibility();
		$this->USGRt16->setVisibility();
		$this->USGRt17->setVisibility();
		$this->USGRt18->setVisibility();
		$this->USGRt19->setVisibility();
		$this->USGRt20->setVisibility();
		$this->USGRt21->setVisibility();
		$this->USGRt22->setVisibility();
		$this->USGRt23->setVisibility();
		$this->USGRt24->setVisibility();
		$this->USGRt25->setVisibility();
		$this->USGLt14->setVisibility();
		$this->USGLt15->setVisibility();
		$this->USGLt16->setVisibility();
		$this->USGLt17->setVisibility();
		$this->USGLt18->setVisibility();
		$this->USGLt19->setVisibility();
		$this->USGLt20->setVisibility();
		$this->USGLt21->setVisibility();
		$this->USGLt22->setVisibility();
		$this->USGLt23->setVisibility();
		$this->USGLt24->setVisibility();
		$this->USGLt25->setVisibility();
		$this->EM14->setVisibility();
		$this->EM15->setVisibility();
		$this->EM16->setVisibility();
		$this->EM17->setVisibility();
		$this->EM18->setVisibility();
		$this->EM19->setVisibility();
		$this->EM20->setVisibility();
		$this->EM21->setVisibility();
		$this->EM22->setVisibility();
		$this->EM23->setVisibility();
		$this->EM24->setVisibility();
		$this->EM25->setVisibility();
		$this->Others14->setVisibility();
		$this->Others15->setVisibility();
		$this->Others16->setVisibility();
		$this->Others17->setVisibility();
		$this->Others18->setVisibility();
		$this->Others19->setVisibility();
		$this->Others20->setVisibility();
		$this->Others21->setVisibility();
		$this->Others22->setVisibility();
		$this->Others23->setVisibility();
		$this->Others24->setVisibility();
		$this->Others25->setVisibility();
		$this->DR14->setVisibility();
		$this->DR15->setVisibility();
		$this->DR16->setVisibility();
		$this->DR17->setVisibility();
		$this->DR18->setVisibility();
		$this->DR19->setVisibility();
		$this->DR20->setVisibility();
		$this->DR21->setVisibility();
		$this->DR22->setVisibility();
		$this->DR23->setVisibility();
		$this->DR24->setVisibility();
		$this->DR25->setVisibility();
		$this->E214->setVisibility();
		$this->E215->setVisibility();
		$this->E216->setVisibility();
		$this->E217->setVisibility();
		$this->E218->setVisibility();
		$this->E219->setVisibility();
		$this->E220->setVisibility();
		$this->E221->setVisibility();
		$this->E222->setVisibility();
		$this->E223->setVisibility();
		$this->E224->setVisibility();
		$this->E225->setVisibility();
		$this->EEETTTDTE->setVisibility();
		$this->bhcgdate->setVisibility();
		$this->TUBAL_PATENCY->setVisibility();
		$this->HSG->setVisibility();
		$this->DHL->setVisibility();
		$this->UTERINE_PROBLEMS->setVisibility();
		$this->W_COMORBIDS->setVisibility();
		$this->H_COMORBIDS->setVisibility();
		$this->SEXUAL_DYSFUNCTION->setVisibility();
		$this->TABLETS->setVisibility();
		$this->FOLLICLE_STATUS->setVisibility();
		$this->NUMBER_OF_IUI->setVisibility();
		$this->PROCEDURE->setVisibility();
		$this->LUTEAL_SUPPORT->setVisibility();
		$this->SPECIFIC_MATERNAL_PROBLEMS->setVisibility();
		$this->ONGOING_PREG->setVisibility();
		$this->EDD_Date->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Setup other options
		$this->setupOtherOptions();

		// Set up lookup cache
		$this->setupLookupOptions($this->INJTYPE);
		$this->setupLookupOptions($this->TRIGGERR);
		$this->setupLookupOptions($this->Tablet1);
		$this->setupLookupOptions($this->Tablet2);
		$this->setupLookupOptions($this->Tablet3);
		$this->setupLookupOptions($this->Tablet4);
		$this->setupLookupOptions($this->Tablet5);
		$this->setupLookupOptions($this->Tablet6);
		$this->setupLookupOptions($this->Tablet7);
		$this->setupLookupOptions($this->Tablet8);
		$this->setupLookupOptions($this->Tablet9);
		$this->setupLookupOptions($this->Tablet10);
		$this->setupLookupOptions($this->Tablet11);
		$this->setupLookupOptions($this->Tablet12);
		$this->setupLookupOptions($this->Tablet13);
		$this->setupLookupOptions($this->RFSH1);
		$this->setupLookupOptions($this->RFSH2);
		$this->setupLookupOptions($this->RFSH3);
		$this->setupLookupOptions($this->RFSH4);
		$this->setupLookupOptions($this->RFSH5);
		$this->setupLookupOptions($this->RFSH6);
		$this->setupLookupOptions($this->RFSH7);
		$this->setupLookupOptions($this->RFSH8);
		$this->setupLookupOptions($this->RFSH9);
		$this->setupLookupOptions($this->RFSH10);
		$this->setupLookupOptions($this->RFSH11);
		$this->setupLookupOptions($this->RFSH12);
		$this->setupLookupOptions($this->RFSH13);
		$this->setupLookupOptions($this->HMG1);
		$this->setupLookupOptions($this->HMG2);
		$this->setupLookupOptions($this->HMG3);
		$this->setupLookupOptions($this->HMG4);
		$this->setupLookupOptions($this->HMG5);
		$this->setupLookupOptions($this->HMG6);
		$this->setupLookupOptions($this->HMG7);
		$this->setupLookupOptions($this->HMG8);
		$this->setupLookupOptions($this->HMG9);
		$this->setupLookupOptions($this->HMG10);
		$this->setupLookupOptions($this->HMG11);
		$this->setupLookupOptions($this->HMG12);
		$this->setupLookupOptions($this->HMG13);
		$this->setupLookupOptions($this->GnRH1);
		$this->setupLookupOptions($this->GnRH2);
		$this->setupLookupOptions($this->GnRH3);
		$this->setupLookupOptions($this->GnRH4);
		$this->setupLookupOptions($this->GnRH5);
		$this->setupLookupOptions($this->GnRH6);
		$this->setupLookupOptions($this->GnRH7);
		$this->setupLookupOptions($this->GnRH8);
		$this->setupLookupOptions($this->GnRH9);
		$this->setupLookupOptions($this->GnRH10);
		$this->setupLookupOptions($this->GnRH11);
		$this->setupLookupOptions($this->GnRH12);
		$this->setupLookupOptions($this->GnRH13);
		$this->setupLookupOptions($this->Tablet14);
		$this->setupLookupOptions($this->Tablet15);
		$this->setupLookupOptions($this->Tablet16);
		$this->setupLookupOptions($this->Tablet17);
		$this->setupLookupOptions($this->Tablet18);
		$this->setupLookupOptions($this->Tablet19);
		$this->setupLookupOptions($this->Tablet20);
		$this->setupLookupOptions($this->Tablet21);
		$this->setupLookupOptions($this->Tablet22);
		$this->setupLookupOptions($this->Tablet23);
		$this->setupLookupOptions($this->Tablet24);
		$this->setupLookupOptions($this->Tablet25);
		$this->setupLookupOptions($this->RFSH14);
		$this->setupLookupOptions($this->RFSH15);
		$this->setupLookupOptions($this->RFSH16);
		$this->setupLookupOptions($this->RFSH17);
		$this->setupLookupOptions($this->RFSH18);
		$this->setupLookupOptions($this->RFSH19);
		$this->setupLookupOptions($this->RFSH20);
		$this->setupLookupOptions($this->RFSH21);
		$this->setupLookupOptions($this->RFSH22);
		$this->setupLookupOptions($this->RFSH23);
		$this->setupLookupOptions($this->RFSH24);
		$this->setupLookupOptions($this->RFSH25);
		$this->setupLookupOptions($this->HMG14);
		$this->setupLookupOptions($this->HMG15);
		$this->setupLookupOptions($this->HMG16);
		$this->setupLookupOptions($this->HMG17);
		$this->setupLookupOptions($this->HMG18);
		$this->setupLookupOptions($this->HMG19);
		$this->setupLookupOptions($this->HMG20);
		$this->setupLookupOptions($this->HMG21);
		$this->setupLookupOptions($this->HMG22);
		$this->setupLookupOptions($this->HMG23);
		$this->setupLookupOptions($this->HMG24);
		$this->setupLookupOptions($this->HMG25);
		$this->setupLookupOptions($this->GnRH14);
		$this->setupLookupOptions($this->GnRH15);
		$this->setupLookupOptions($this->GnRH16);
		$this->setupLookupOptions($this->GnRH17);
		$this->setupLookupOptions($this->GnRH18);
		$this->setupLookupOptions($this->GnRH19);
		$this->setupLookupOptions($this->GnRH20);
		$this->setupLookupOptions($this->GnRH21);
		$this->setupLookupOptions($this->GnRH22);
		$this->setupLookupOptions($this->GnRH23);
		$this->setupLookupOptions($this->GnRH24);
		$this->setupLookupOptions($this->GnRH25);

		// Load filter
		$filter = Get("f", "");
		$filter = Decrypt($filter);
		if ($filter == "") $filter = "0=1";
		$this->StartRecord = (int)Get("start") ?: 1;
		$this->SortField = Get("sort", "");
		$this->SortOrder = Get("sortorder", "");

		// Set up foreign keys from filter
		$this->setupForeignKeysFromFilter($filter);

		// Call Recordset Selecting event
		$this->Recordset_Selecting($filter);

		// Load recordset
		$filter = $this->applyUserIDFilters($filter);
		$this->TotalRecords = $this->loadRecordCount($filter);
		if ($this->DisplayRecords <= 0) // Show all records if page size not specified
			$this->DisplayRecords = $this->TotalRecords > 0 ? $this->TotalRecords : 10;
		$sql = $this->previewSql($filter);
		if ($this->DisplayRecords > 0)
			$this->Recordset = $this->getConnection()->selectLimit($sql, $this->DisplayRecords, $this->StartRecord - 1);
		if (!$this->Recordset)
			$this->Recordset = $this->getConnection()->execute($sql);
		if ($this->Recordset && !$this->Recordset->EOF) {

			// Call Recordset Selected event
			$this->Recordset_Selected($this->Recordset);
			$this->loadListRowValues($this->Recordset);
		}
		$this->renderOtherOptions();

		// Set up pager (always use PrevNextPager for preview page)
		$this->Pager = new PrevNextPager($this->StartRecord, $this->DisplayRecords, $this->TotalRecords, "", 10, $this->AutoHidePager, NULL, NULL, TRUE);
	}

	// Get preview SQL
	protected function previewSql($filter)
	{
		$sortField = $this->SortField;
		$sortOrder = $this->SortOrder;
		$sort = "";
		if (array_key_exists($sortField, $this->fields)) {
			$fld = $this->fields[$sortField];
			$sort = $fld->Expression;
			if ($sortOrder == "ASC" || $sortOrder == "DESC")
				$sort .= " " . $sortOrder;
		}
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// "view"
		$item = &$this->ListOptions->add("view");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canView();
		$item->OnLeft = TRUE;

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canEdit();
		$item->OnLeft = TRUE;

		// "copy"
		$item = &$this->ListOptions->add("copy");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canAdd();
		$item->OnLeft = TRUE;

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canDelete();
		$item->OnLeft = TRUE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$item = $this->ListOptions[$this->ListOptions->GroupOptionName];
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();
		$masterKeyUrl = $this->masterKeyUrl();

		// "view"
		$opt = $this->ListOptions["view"];
		if ($Security->canView()) {
			$viewCaption = $Language->phrase("ViewLink");
			$viewTitle = HtmlTitle($viewCaption);
			$viewUrl = $this->getViewUrl($masterKeyUrl);
			if ($this->UseModalLinks && !IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewTitle . "\" data-caption=\"" . $viewTitle . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($viewUrl) . "',btn:null});\">" . $viewCaption . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewTitle . "\" data-caption=\"" . $viewTitle . "\" href=\"" . HtmlEncode($viewUrl) . "\">" . $viewCaption . "</a>";
		} else {
			$opt->Body = "";
		}

		// "edit"
		$opt = $this->ListOptions["edit"];
		if ($Security->canEdit()) {
			$editCaption = $Language->phrase("EditLink");
			$editTitle = HtmlTitle($editCaption);
			$editUrl = $this->getEditUrl($masterKeyUrl);
			if ($this->UseModalLinks && !IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editTitle . "\" data-caption=\"" . $editTitle . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SaveBtn',url:'" . HtmlEncode($editUrl) . "'});\">" . $editCaption . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editTitle . "\" data-caption=\"" . $editTitle . "\" href=\"" . HtmlEncode($editUrl) . "\">" . $editCaption . "</a>";
		} else {
			$opt->Body = "";
		}

		// "copy"
		$opt = $this->ListOptions["copy"];
		if ($Security->canAdd()) {
			$copyCaption = $Language->phrase("CopyLink");
			$copyTitle = HtmlTitle($copyCaption);
			$copyUrl = $this->getCopyUrl($masterKeyUrl);
			if ($this->UseModalLinks && !IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copyTitle . "\" data-caption=\"" . $copyTitle . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($copyUrl) . "'});\">" . $copyCaption . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copyTitle . "\" data-caption=\"" . $copyTitle . "\" href=\"" . HtmlEncode($copyUrl) . "\">" . $copyCaption . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = $this->ListOptions["delete"];
		if ($Security->canDelete()) {
			$deleteCaption = $Language->phrase("DeleteLink");
			$deleteTitle = HtmlTitle($deleteCaption);
			$deleteUrl = $this->getDeleteUrl();
			if ($this->UseModalLinks && !IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-delete\" onclick=\"return ew.confirmDelete(this);\" title=\"" . $deleteTitle . "\" data-caption=\"" . $deleteTitle . "\" href=\"" . HtmlEncode($deleteUrl . "&action=1") . "\">" . $deleteCaption . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . $deleteTitle . "\" data-caption=\"" . $deleteTitle . "\" href=\"" . HtmlEncode($deleteUrl) . "\">" . $deleteCaption . "</a>";
		} else {
			$opt->Body = "";
		}

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];
		$option->UseButtonGroup = TRUE;

		// Add group option item
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// Add
		$item = &$option->add("add");
		$item->Visible = $Security->canAdd();
	}

	// Render other options
	protected function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];

		// Add
		$item = $option["add"];
		if ($Security->canAdd()) {
			$addCaption = $Language->phrase("AddLink");
			$addTitle = HtmlTitle($addCaption);
			$addUrl = $this->getAddUrl($this->masterKeyUrl());
			if ($this->UseModalLinks && !IsMobile())
				$item->Body = "<a class=\"btn btn-default btn-sm ew-add-edit ew-add\" title=\"" . $addTitle . "\" data-caption=\"" . $addTitle . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($addUrl) . "'});\">" . $addCaption . "</a>";
			else
				$item->Body = "<a class=\"btn btn-default btn-sm ew-add-edit ew-add\" title=\"" . $addTitle . "\" data-caption=\"" . $addTitle . "\" href=\"" . HtmlEncode($addUrl) . "\">" . $addCaption . "</a>";
		} else {
			$item->Body = "";
		}
	}

	// Get master foreign key url
	protected function masterKeyUrl()
	{
		$masterTblVar = Get("t", "");
		$url = "";
		if ($masterTblVar == "ivf_treatment_plan") {
			$url = "" . Config("TABLE_SHOW_MASTER") . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNo->QueryStringValue)) . "&fk_Name=" . urlencode(strval($this->Name->QueryStringValue)) . "&fk_id=" . urlencode(strval($this->TidNo->QueryStringValue)) . "";
		}
		return $url;
	}

	// Set up foreign keys from filter
	protected function setupForeignKeysFromFilter($f)
	{
		$masterTblVar = Get("t", "");
		if ($masterTblVar == "ivf_treatment_plan") {
			$find = "`RIDNo`=";
			$x = strpos($f, $find);
			if ($x !== FALSE) {
				$x += strlen($find);
				$y = strpos($f, " AND ", $x);
				if ($y !== FALSE)
					$val = substr($f, $x, $y-$x);
				else
					$val = "";
				$val = $this->unquoteValue($val, "DB");
 				$this->RIDNo->setQueryStringValue($val);
			}
			$find = "`Name`=";
			$x = strpos($f, $find);
			if ($x !== FALSE) {
				$x += strlen($find);
				$y = strpos($f, " AND ", $x);
				if ($y !== FALSE)
					$val = substr($f, $x, $y-$x);
				else
					$val = "";
				$val = $this->unquoteValue($val, "DB");
 				$this->Name->setQueryStringValue($val);
			}
			$find = "`TidNo`=";
			$x = strpos($f, $find);
			if ($x !== FALSE) {
				$x += strlen($find);
				$val = substr($f, $x);
				$val = $this->unquoteValue($val, "DB");
 				$this->TidNo->setQueryStringValue($val);
			}
		}
	}

	// Unquote value
	protected function unquoteValue($val, $dbid)
	{
		if (StartsString("'", $val) && EndsString("'", $val)) {
			if (GetConnectionType($dbid) == "MYSQL")
				return stripslashes(substr($val, 1, strlen($val) - 2));
			else
				return str_replace("''", "'", substr($val, 1, strlen($val) - 2));
		}
		return $val;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_stimulation_chartlist.php"), "", $this->TableVar, TRUE);
		$pageId = "preview";
		$Breadcrumb->add("preview", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				case "x_ARTCycle":
					break;
				case "x_FemaleFactor":
					break;
				case "x_MaleFactor":
					break;
				case "x_Protocol":
					break;
				case "x_SemenFrozen":
					break;
				case "x_A4ICSICycle":
					break;
				case "x_TotalICSICycle":
					break;
				case "x_TypeOfInfertility":
					break;
				case "x_INJTYPE":
					break;
				case "x_ANTAGONISTSTARTDAY":
					break;
				case "x_PRETREATMENT":
					break;
				case "x_MedicalFactors":
					break;
				case "x_TRIGGERR":
					break;
				case "x_ALLFREEZEINDICATION":
					break;
				case "x_ERA":
					break;
				case "x_ET":
					break;
				case "x_SEMENPREPARATION":
					break;
				case "x_REASONFORESET":
					break;
				case "x_Tablet1":
					break;
				case "x_Tablet2":
					break;
				case "x_Tablet3":
					break;
				case "x_Tablet4":
					break;
				case "x_Tablet5":
					break;
				case "x_Tablet6":
					break;
				case "x_Tablet7":
					break;
				case "x_Tablet8":
					break;
				case "x_Tablet9":
					break;
				case "x_Tablet10":
					break;
				case "x_Tablet11":
					break;
				case "x_Tablet12":
					break;
				case "x_Tablet13":
					break;
				case "x_RFSH1":
					break;
				case "x_RFSH2":
					break;
				case "x_RFSH3":
					break;
				case "x_RFSH4":
					break;
				case "x_RFSH5":
					break;
				case "x_RFSH6":
					break;
				case "x_RFSH7":
					break;
				case "x_RFSH8":
					break;
				case "x_RFSH9":
					break;
				case "x_RFSH10":
					break;
				case "x_RFSH11":
					break;
				case "x_RFSH12":
					break;
				case "x_RFSH13":
					break;
				case "x_HMG1":
					break;
				case "x_HMG2":
					break;
				case "x_HMG3":
					break;
				case "x_HMG4":
					break;
				case "x_HMG5":
					break;
				case "x_HMG6":
					break;
				case "x_HMG7":
					break;
				case "x_HMG8":
					break;
				case "x_HMG9":
					break;
				case "x_HMG10":
					break;
				case "x_HMG11":
					break;
				case "x_HMG12":
					break;
				case "x_HMG13":
					break;
				case "x_GnRH1":
					break;
				case "x_GnRH2":
					break;
				case "x_GnRH3":
					break;
				case "x_GnRH4":
					break;
				case "x_GnRH5":
					break;
				case "x_GnRH6":
					break;
				case "x_GnRH7":
					break;
				case "x_GnRH8":
					break;
				case "x_GnRH9":
					break;
				case "x_GnRH10":
					break;
				case "x_GnRH11":
					break;
				case "x_GnRH12":
					break;
				case "x_GnRH13":
					break;
				case "x_Convert":
					break;
				case "x_InseminatinTechnique":
					break;
				case "x_IndicationForART":
					break;
				case "x_Hysteroscopy":
					break;
				case "x_EndometrialScratching":
					break;
				case "x_TrialCannulation":
					break;
				case "x_CYCLETYPE":
					break;
				case "x_OralEstrogenDosage":
					break;
				case "x_GCSF":
					break;
				case "x_ActivatedPRP":
					break;
				case "x_AllFreeze":
					break;
				case "x_TreatmentCancel":
					break;
				case "x_Projectron":
					break;
				case "x_Tablet14":
					break;
				case "x_Tablet15":
					break;
				case "x_Tablet16":
					break;
				case "x_Tablet17":
					break;
				case "x_Tablet18":
					break;
				case "x_Tablet19":
					break;
				case "x_Tablet20":
					break;
				case "x_Tablet21":
					break;
				case "x_Tablet22":
					break;
				case "x_Tablet23":
					break;
				case "x_Tablet24":
					break;
				case "x_Tablet25":
					break;
				case "x_RFSH14":
					break;
				case "x_RFSH15":
					break;
				case "x_RFSH16":
					break;
				case "x_RFSH17":
					break;
				case "x_RFSH18":
					break;
				case "x_RFSH19":
					break;
				case "x_RFSH20":
					break;
				case "x_RFSH21":
					break;
				case "x_RFSH22":
					break;
				case "x_RFSH23":
					break;
				case "x_RFSH24":
					break;
				case "x_RFSH25":
					break;
				case "x_HMG14":
					break;
				case "x_HMG15":
					break;
				case "x_HMG16":
					break;
				case "x_HMG17":
					break;
				case "x_HMG18":
					break;
				case "x_HMG19":
					break;
				case "x_HMG20":
					break;
				case "x_HMG21":
					break;
				case "x_HMG22":
					break;
				case "x_HMG23":
					break;
				case "x_HMG24":
					break;
				case "x_HMG25":
					break;
				case "x_GnRH14":
					break;
				case "x_GnRH15":
					break;
				case "x_GnRH16":
					break;
				case "x_GnRH17":
					break;
				case "x_GnRH18":
					break;
				case "x_GnRH19":
					break;
				case "x_GnRH20":
					break;
				case "x_GnRH21":
					break;
				case "x_GnRH22":
					break;
				case "x_GnRH23":
					break;
				case "x_GnRH24":
					break;
				case "x_GnRH25":
					break;
				case "x_TUBAL_PATENCY":
					break;
				case "x_HSG":
					break;
				case "x_DHL":
					break;
				case "x_UTERINE_PROBLEMS":
					break;
				case "x_W_COMORBIDS":
					break;
				case "x_H_COMORBIDS":
					break;
				case "x_SEXUAL_DYSFUNCTION":
					break;
				case "x_FOLLICLE_STATUS":
					break;
				case "x_NUMBER_OF_IUI":
					break;
				case "x_PROCEDURE":
					break;
				case "x_LUTEAL_SUPPORT":
					break;
				case "x_SPECIFIC_MATERNAL_PROBLEMS":
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_INJTYPE":
							break;
						case "x_TRIGGERR":
							break;
						case "x_Tablet1":
							break;
						case "x_Tablet2":
							break;
						case "x_Tablet3":
							break;
						case "x_Tablet4":
							break;
						case "x_Tablet5":
							break;
						case "x_Tablet6":
							break;
						case "x_Tablet7":
							break;
						case "x_Tablet8":
							break;
						case "x_Tablet9":
							break;
						case "x_Tablet10":
							break;
						case "x_Tablet11":
							break;
						case "x_Tablet12":
							break;
						case "x_Tablet13":
							break;
						case "x_RFSH1":
							break;
						case "x_RFSH2":
							break;
						case "x_RFSH3":
							break;
						case "x_RFSH4":
							break;
						case "x_RFSH5":
							break;
						case "x_RFSH6":
							break;
						case "x_RFSH7":
							break;
						case "x_RFSH8":
							break;
						case "x_RFSH9":
							break;
						case "x_RFSH10":
							break;
						case "x_RFSH11":
							break;
						case "x_RFSH12":
							break;
						case "x_RFSH13":
							break;
						case "x_HMG1":
							break;
						case "x_HMG2":
							break;
						case "x_HMG3":
							break;
						case "x_HMG4":
							break;
						case "x_HMG5":
							break;
						case "x_HMG6":
							break;
						case "x_HMG7":
							break;
						case "x_HMG8":
							break;
						case "x_HMG9":
							break;
						case "x_HMG10":
							break;
						case "x_HMG11":
							break;
						case "x_HMG12":
							break;
						case "x_HMG13":
							break;
						case "x_GnRH1":
							break;
						case "x_GnRH2":
							break;
						case "x_GnRH3":
							break;
						case "x_GnRH4":
							break;
						case "x_GnRH5":
							break;
						case "x_GnRH6":
							break;
						case "x_GnRH7":
							break;
						case "x_GnRH8":
							break;
						case "x_GnRH9":
							break;
						case "x_GnRH10":
							break;
						case "x_GnRH11":
							break;
						case "x_GnRH12":
							break;
						case "x_GnRH13":
							break;
						case "x_Tablet14":
							break;
						case "x_Tablet15":
							break;
						case "x_Tablet16":
							break;
						case "x_Tablet17":
							break;
						case "x_Tablet18":
							break;
						case "x_Tablet19":
							break;
						case "x_Tablet20":
							break;
						case "x_Tablet21":
							break;
						case "x_Tablet22":
							break;
						case "x_Tablet23":
							break;
						case "x_Tablet24":
							break;
						case "x_Tablet25":
							break;
						case "x_RFSH14":
							break;
						case "x_RFSH15":
							break;
						case "x_RFSH16":
							break;
						case "x_RFSH17":
							break;
						case "x_RFSH18":
							break;
						case "x_RFSH19":
							break;
						case "x_RFSH20":
							break;
						case "x_RFSH21":
							break;
						case "x_RFSH22":
							break;
						case "x_RFSH23":
							break;
						case "x_RFSH24":
							break;
						case "x_RFSH25":
							break;
						case "x_HMG14":
							break;
						case "x_HMG15":
							break;
						case "x_HMG16":
							break;
						case "x_HMG17":
							break;
						case "x_HMG18":
							break;
						case "x_HMG19":
							break;
						case "x_HMG20":
							break;
						case "x_HMG21":
							break;
						case "x_HMG22":
							break;
						case "x_HMG23":
							break;
						case "x_HMG24":
							break;
						case "x_HMG25":
							break;
						case "x_GnRH14":
							break;
						case "x_GnRH15":
							break;
						case "x_GnRH16":
							break;
						case "x_GnRH17":
							break;
						case "x_GnRH18":
							break;
						case "x_GnRH19":
							break;
						case "x_GnRH20":
							break;
						case "x_GnRH21":
							break;
						case "x_GnRH22":
							break;
						case "x_GnRH23":
							break;
						case "x_GnRH24":
							break;
						case "x_GnRH25":
							break;
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

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

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

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions["new"]->Body = "xxx";

	}
} // End class
?>