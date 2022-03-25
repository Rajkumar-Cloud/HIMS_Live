<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_stimulation_chart_delete extends ivf_stimulation_chart
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_stimulation_chart';

	// Page object name
	public $PageObjName = "ivf_stimulation_chart_delete";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

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
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $TotalRecords = 0;
	public $RecordCount;
	public $RecKeys = [];
	public $StartRowCount = 1;
	public $RowCount = 0;

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
			if (!$Security->canDelete()) {
				SetStatus(401); // Unauthorized
				return;
			}
		} else {
			$Security = new AdvancedSecurity();
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canDelete()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("ivf_stimulation_chartlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
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

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ivf_stimulation_chartlist.php");
			return;
		}

		// Set up master/detail parameters
		$this->setupMasterParms();

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("ivf_stimulation_chartlist.php"); // Prevent SQL injection, return to list
			return;
		}

		// Set up filter (WHERE Clause)
		$this->CurrentFilter = $filter;

		// Get action
		if (IsApi()) {
			$this->CurrentAction = "delete"; // Delete record directly
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action");
		} elseif (Get("action") == "1") {
			$this->CurrentAction = "delete"; // Delete record directly
		} else {
			$this->CurrentAction = "show"; // Display record
		}
		if ($this->isDelete()) {
			$this->SendEmail = TRUE; // Send email on delete success
			if ($this->deleteRows()) { // Delete rows
				if ($this->getSuccessMessage() == "")
					$this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
				if (IsApi()) {
					$this->terminate(TRUE);
					return;
				} else {
					$this->terminate($this->getReturnUrl()); // Return to caller
				}
			} else { // Delete failed
				if (IsApi()) {
					$this->terminate();
					return;
				}
				$this->CurrentAction = "show"; // Display record
			}
		}
		if ($this->isShow()) { // Load records for display
			if ($this->Recordset = $this->loadRecordset())
				$this->TotalRecords = $this->Recordset->RecordCount(); // Get record count
			if ($this->TotalRecords <= 0) { // No record found, exit
				if ($this->Recordset)
					$this->Recordset->close();
				$this->terminate("ivf_stimulation_chartlist.php"); // Return to list
			}
		}
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = $this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = "";
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->id->setDbValue($row['id']);
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->Name->setDbValue($row['Name']);
		$this->ARTCycle->setDbValue($row['ARTCycle']);
		$this->FemaleFactor->setDbValue($row['FemaleFactor']);
		$this->MaleFactor->setDbValue($row['MaleFactor']);
		$this->Protocol->setDbValue($row['Protocol']);
		$this->SemenFrozen->setDbValue($row['SemenFrozen']);
		$this->A4ICSICycle->setDbValue($row['A4ICSICycle']);
		$this->TotalICSICycle->setDbValue($row['TotalICSICycle']);
		$this->TypeOfInfertility->setDbValue($row['TypeOfInfertility']);
		$this->Duration->setDbValue($row['Duration']);
		$this->LMP->setDbValue($row['LMP']);
		$this->RelevantHistory->setDbValue($row['RelevantHistory']);
		$this->IUICycles->setDbValue($row['IUICycles']);
		$this->AFC->setDbValue($row['AFC']);
		$this->AMH->setDbValue($row['AMH']);
		$this->FBMI->setDbValue($row['FBMI']);
		$this->MBMI->setDbValue($row['MBMI']);
		$this->OvarianVolumeRT->setDbValue($row['OvarianVolumeRT']);
		$this->OvarianVolumeLT->setDbValue($row['OvarianVolumeLT']);
		$this->DAYSOFSTIMULATION->setDbValue($row['DAYSOFSTIMULATION']);
		$this->DOSEOFGONADOTROPINS->setDbValue($row['DOSEOFGONADOTROPINS']);
		$this->INJTYPE->setDbValue($row['INJTYPE']);
		$this->ANTAGONISTDAYS->setDbValue($row['ANTAGONISTDAYS']);
		$this->ANTAGONISTSTARTDAY->setDbValue($row['ANTAGONISTSTARTDAY']);
		$this->GROWTHHORMONE->setDbValue($row['GROWTHHORMONE']);
		$this->PRETREATMENT->setDbValue($row['PRETREATMENT']);
		$this->SerumP4->setDbValue($row['SerumP4']);
		$this->FORT->setDbValue($row['FORT']);
		$this->MedicalFactors->setDbValue($row['MedicalFactors']);
		$this->SCDate->setDbValue($row['SCDate']);
		$this->OvarianSurgery->setDbValue($row['OvarianSurgery']);
		$this->PreProcedureOrder->setDbValue($row['PreProcedureOrder']);
		$this->TRIGGERR->setDbValue($row['TRIGGERR']);
		$this->TRIGGERDATE->setDbValue($row['TRIGGERDATE']);
		$this->ATHOMEorCLINIC->setDbValue($row['ATHOMEorCLINIC']);
		$this->OPUDATE->setDbValue($row['OPUDATE']);
		$this->ALLFREEZEINDICATION->setDbValue($row['ALLFREEZEINDICATION']);
		$this->ERA->setDbValue($row['ERA']);
		$this->PGTA->setDbValue($row['PGTA']);
		$this->PGD->setDbValue($row['PGD']);
		$this->DATEOFET->setDbValue($row['DATEOFET']);
		$this->ET->setDbValue($row['ET']);
		$this->ESET->setDbValue($row['ESET']);
		$this->DOET->setDbValue($row['DOET']);
		$this->SEMENPREPARATION->setDbValue($row['SEMENPREPARATION']);
		$this->REASONFORESET->setDbValue($row['REASONFORESET']);
		$this->Expectedoocytes->setDbValue($row['Expectedoocytes']);
		$this->StChDate1->setDbValue($row['StChDate1']);
		$this->StChDate2->setDbValue($row['StChDate2']);
		$this->StChDate3->setDbValue($row['StChDate3']);
		$this->StChDate4->setDbValue($row['StChDate4']);
		$this->StChDate5->setDbValue($row['StChDate5']);
		$this->StChDate6->setDbValue($row['StChDate6']);
		$this->StChDate7->setDbValue($row['StChDate7']);
		$this->StChDate8->setDbValue($row['StChDate8']);
		$this->StChDate9->setDbValue($row['StChDate9']);
		$this->StChDate10->setDbValue($row['StChDate10']);
		$this->StChDate11->setDbValue($row['StChDate11']);
		$this->StChDate12->setDbValue($row['StChDate12']);
		$this->StChDate13->setDbValue($row['StChDate13']);
		$this->CycleDay1->setDbValue($row['CycleDay1']);
		$this->CycleDay2->setDbValue($row['CycleDay2']);
		$this->CycleDay3->setDbValue($row['CycleDay3']);
		$this->CycleDay4->setDbValue($row['CycleDay4']);
		$this->CycleDay5->setDbValue($row['CycleDay5']);
		$this->CycleDay6->setDbValue($row['CycleDay6']);
		$this->CycleDay7->setDbValue($row['CycleDay7']);
		$this->CycleDay8->setDbValue($row['CycleDay8']);
		$this->CycleDay9->setDbValue($row['CycleDay9']);
		$this->CycleDay10->setDbValue($row['CycleDay10']);
		$this->CycleDay11->setDbValue($row['CycleDay11']);
		$this->CycleDay12->setDbValue($row['CycleDay12']);
		$this->CycleDay13->setDbValue($row['CycleDay13']);
		$this->StimulationDay1->setDbValue($row['StimulationDay1']);
		$this->StimulationDay2->setDbValue($row['StimulationDay2']);
		$this->StimulationDay3->setDbValue($row['StimulationDay3']);
		$this->StimulationDay4->setDbValue($row['StimulationDay4']);
		$this->StimulationDay5->setDbValue($row['StimulationDay5']);
		$this->StimulationDay6->setDbValue($row['StimulationDay6']);
		$this->StimulationDay7->setDbValue($row['StimulationDay7']);
		$this->StimulationDay8->setDbValue($row['StimulationDay8']);
		$this->StimulationDay9->setDbValue($row['StimulationDay9']);
		$this->StimulationDay10->setDbValue($row['StimulationDay10']);
		$this->StimulationDay11->setDbValue($row['StimulationDay11']);
		$this->StimulationDay12->setDbValue($row['StimulationDay12']);
		$this->StimulationDay13->setDbValue($row['StimulationDay13']);
		$this->Tablet1->setDbValue($row['Tablet1']);
		$this->Tablet2->setDbValue($row['Tablet2']);
		$this->Tablet3->setDbValue($row['Tablet3']);
		$this->Tablet4->setDbValue($row['Tablet4']);
		$this->Tablet5->setDbValue($row['Tablet5']);
		$this->Tablet6->setDbValue($row['Tablet6']);
		$this->Tablet7->setDbValue($row['Tablet7']);
		$this->Tablet8->setDbValue($row['Tablet8']);
		$this->Tablet9->setDbValue($row['Tablet9']);
		$this->Tablet10->setDbValue($row['Tablet10']);
		$this->Tablet11->setDbValue($row['Tablet11']);
		$this->Tablet12->setDbValue($row['Tablet12']);
		$this->Tablet13->setDbValue($row['Tablet13']);
		$this->RFSH1->setDbValue($row['RFSH1']);
		$this->RFSH2->setDbValue($row['RFSH2']);
		$this->RFSH3->setDbValue($row['RFSH3']);
		$this->RFSH4->setDbValue($row['RFSH4']);
		$this->RFSH5->setDbValue($row['RFSH5']);
		$this->RFSH6->setDbValue($row['RFSH6']);
		$this->RFSH7->setDbValue($row['RFSH7']);
		$this->RFSH8->setDbValue($row['RFSH8']);
		$this->RFSH9->setDbValue($row['RFSH9']);
		$this->RFSH10->setDbValue($row['RFSH10']);
		$this->RFSH11->setDbValue($row['RFSH11']);
		$this->RFSH12->setDbValue($row['RFSH12']);
		$this->RFSH13->setDbValue($row['RFSH13']);
		$this->HMG1->setDbValue($row['HMG1']);
		$this->HMG2->setDbValue($row['HMG2']);
		$this->HMG3->setDbValue($row['HMG3']);
		$this->HMG4->setDbValue($row['HMG4']);
		$this->HMG5->setDbValue($row['HMG5']);
		$this->HMG6->setDbValue($row['HMG6']);
		$this->HMG7->setDbValue($row['HMG7']);
		$this->HMG8->setDbValue($row['HMG8']);
		$this->HMG9->setDbValue($row['HMG9']);
		$this->HMG10->setDbValue($row['HMG10']);
		$this->HMG11->setDbValue($row['HMG11']);
		$this->HMG12->setDbValue($row['HMG12']);
		$this->HMG13->setDbValue($row['HMG13']);
		$this->GnRH1->setDbValue($row['GnRH1']);
		$this->GnRH2->setDbValue($row['GnRH2']);
		$this->GnRH3->setDbValue($row['GnRH3']);
		$this->GnRH4->setDbValue($row['GnRH4']);
		$this->GnRH5->setDbValue($row['GnRH5']);
		$this->GnRH6->setDbValue($row['GnRH6']);
		$this->GnRH7->setDbValue($row['GnRH7']);
		$this->GnRH8->setDbValue($row['GnRH8']);
		$this->GnRH9->setDbValue($row['GnRH9']);
		$this->GnRH10->setDbValue($row['GnRH10']);
		$this->GnRH11->setDbValue($row['GnRH11']);
		$this->GnRH12->setDbValue($row['GnRH12']);
		$this->GnRH13->setDbValue($row['GnRH13']);
		$this->E21->setDbValue($row['E21']);
		$this->E22->setDbValue($row['E22']);
		$this->E23->setDbValue($row['E23']);
		$this->E24->setDbValue($row['E24']);
		$this->E25->setDbValue($row['E25']);
		$this->E26->setDbValue($row['E26']);
		$this->E27->setDbValue($row['E27']);
		$this->E28->setDbValue($row['E28']);
		$this->E29->setDbValue($row['E29']);
		$this->E210->setDbValue($row['E210']);
		$this->E211->setDbValue($row['E211']);
		$this->E212->setDbValue($row['E212']);
		$this->E213->setDbValue($row['E213']);
		$this->P41->setDbValue($row['P41']);
		$this->P42->setDbValue($row['P42']);
		$this->P43->setDbValue($row['P43']);
		$this->P44->setDbValue($row['P44']);
		$this->P45->setDbValue($row['P45']);
		$this->P46->setDbValue($row['P46']);
		$this->P47->setDbValue($row['P47']);
		$this->P48->setDbValue($row['P48']);
		$this->P49->setDbValue($row['P49']);
		$this->P410->setDbValue($row['P410']);
		$this->P411->setDbValue($row['P411']);
		$this->P412->setDbValue($row['P412']);
		$this->P413->setDbValue($row['P413']);
		$this->USGRt1->setDbValue($row['USGRt1']);
		$this->USGRt2->setDbValue($row['USGRt2']);
		$this->USGRt3->setDbValue($row['USGRt3']);
		$this->USGRt4->setDbValue($row['USGRt4']);
		$this->USGRt5->setDbValue($row['USGRt5']);
		$this->USGRt6->setDbValue($row['USGRt6']);
		$this->USGRt7->setDbValue($row['USGRt7']);
		$this->USGRt8->setDbValue($row['USGRt8']);
		$this->USGRt9->setDbValue($row['USGRt9']);
		$this->USGRt10->setDbValue($row['USGRt10']);
		$this->USGRt11->setDbValue($row['USGRt11']);
		$this->USGRt12->setDbValue($row['USGRt12']);
		$this->USGRt13->setDbValue($row['USGRt13']);
		$this->USGLt1->setDbValue($row['USGLt1']);
		$this->USGLt2->setDbValue($row['USGLt2']);
		$this->USGLt3->setDbValue($row['USGLt3']);
		$this->USGLt4->setDbValue($row['USGLt4']);
		$this->USGLt5->setDbValue($row['USGLt5']);
		$this->USGLt6->setDbValue($row['USGLt6']);
		$this->USGLt7->setDbValue($row['USGLt7']);
		$this->USGLt8->setDbValue($row['USGLt8']);
		$this->USGLt9->setDbValue($row['USGLt9']);
		$this->USGLt10->setDbValue($row['USGLt10']);
		$this->USGLt11->setDbValue($row['USGLt11']);
		$this->USGLt12->setDbValue($row['USGLt12']);
		$this->USGLt13->setDbValue($row['USGLt13']);
		$this->EM1->setDbValue($row['EM1']);
		$this->EM2->setDbValue($row['EM2']);
		$this->EM3->setDbValue($row['EM3']);
		$this->EM4->setDbValue($row['EM4']);
		$this->EM5->setDbValue($row['EM5']);
		$this->EM6->setDbValue($row['EM6']);
		$this->EM7->setDbValue($row['EM7']);
		$this->EM8->setDbValue($row['EM8']);
		$this->EM9->setDbValue($row['EM9']);
		$this->EM10->setDbValue($row['EM10']);
		$this->EM11->setDbValue($row['EM11']);
		$this->EM12->setDbValue($row['EM12']);
		$this->EM13->setDbValue($row['EM13']);
		$this->Others1->setDbValue($row['Others1']);
		$this->Others2->setDbValue($row['Others2']);
		$this->Others3->setDbValue($row['Others3']);
		$this->Others4->setDbValue($row['Others4']);
		$this->Others5->setDbValue($row['Others5']);
		$this->Others6->setDbValue($row['Others6']);
		$this->Others7->setDbValue($row['Others7']);
		$this->Others8->setDbValue($row['Others8']);
		$this->Others9->setDbValue($row['Others9']);
		$this->Others10->setDbValue($row['Others10']);
		$this->Others11->setDbValue($row['Others11']);
		$this->Others12->setDbValue($row['Others12']);
		$this->Others13->setDbValue($row['Others13']);
		$this->DR1->setDbValue($row['DR1']);
		$this->DR2->setDbValue($row['DR2']);
		$this->DR3->setDbValue($row['DR3']);
		$this->DR4->setDbValue($row['DR4']);
		$this->DR5->setDbValue($row['DR5']);
		$this->DR6->setDbValue($row['DR6']);
		$this->DR7->setDbValue($row['DR7']);
		$this->DR8->setDbValue($row['DR8']);
		$this->DR9->setDbValue($row['DR9']);
		$this->DR10->setDbValue($row['DR10']);
		$this->DR11->setDbValue($row['DR11']);
		$this->DR12->setDbValue($row['DR12']);
		$this->DR13->setDbValue($row['DR13']);
		$this->DOCTORRESPONSIBLE->setDbValue($row['DOCTORRESPONSIBLE']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->Convert->setDbValue($row['Convert']);
		$this->Consultant->setDbValue($row['Consultant']);
		$this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
		$this->IndicationForART->setDbValue($row['IndicationForART']);
		$this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
		$this->EndometrialScratching->setDbValue($row['EndometrialScratching']);
		$this->TrialCannulation->setDbValue($row['TrialCannulation']);
		$this->CYCLETYPE->setDbValue($row['CYCLETYPE']);
		$this->HRTCYCLE->setDbValue($row['HRTCYCLE']);
		$this->OralEstrogenDosage->setDbValue($row['OralEstrogenDosage']);
		$this->VaginalEstrogen->setDbValue($row['VaginalEstrogen']);
		$this->GCSF->setDbValue($row['GCSF']);
		$this->ActivatedPRP->setDbValue($row['ActivatedPRP']);
		$this->UCLcm->setDbValue($row['UCLcm']);
		$this->DATOFEMBRYOTRANSFER->setDbValue($row['DATOFEMBRYOTRANSFER']);
		$this->DAYOFEMBRYOTRANSFER->setDbValue($row['DAYOFEMBRYOTRANSFER']);
		$this->NOOFEMBRYOSTHAWED->setDbValue($row['NOOFEMBRYOSTHAWED']);
		$this->NOOFEMBRYOSTRANSFERRED->setDbValue($row['NOOFEMBRYOSTRANSFERRED']);
		$this->DAYOFEMBRYOS->setDbValue($row['DAYOFEMBRYOS']);
		$this->CRYOPRESERVEDEMBRYOS->setDbValue($row['CRYOPRESERVEDEMBRYOS']);
		$this->ViaAdmin->setDbValue($row['ViaAdmin']);
		$this->ViaStartDateTime->setDbValue($row['ViaStartDateTime']);
		$this->ViaDose->setDbValue($row['ViaDose']);
		$this->AllFreeze->setDbValue($row['AllFreeze']);
		$this->TreatmentCancel->setDbValue($row['TreatmentCancel']);
		$this->Reason->setDbValue($row['Reason']);
		$this->ProgesteroneAdmin->setDbValue($row['ProgesteroneAdmin']);
		$this->ProgesteroneStart->setDbValue($row['ProgesteroneStart']);
		$this->ProgesteroneDose->setDbValue($row['ProgesteroneDose']);
		$this->Projectron->setDbValue($row['Projectron']);
		$this->StChDate14->setDbValue($row['StChDate14']);
		$this->StChDate15->setDbValue($row['StChDate15']);
		$this->StChDate16->setDbValue($row['StChDate16']);
		$this->StChDate17->setDbValue($row['StChDate17']);
		$this->StChDate18->setDbValue($row['StChDate18']);
		$this->StChDate19->setDbValue($row['StChDate19']);
		$this->StChDate20->setDbValue($row['StChDate20']);
		$this->StChDate21->setDbValue($row['StChDate21']);
		$this->StChDate22->setDbValue($row['StChDate22']);
		$this->StChDate23->setDbValue($row['StChDate23']);
		$this->StChDate24->setDbValue($row['StChDate24']);
		$this->StChDate25->setDbValue($row['StChDate25']);
		$this->CycleDay14->setDbValue($row['CycleDay14']);
		$this->CycleDay15->setDbValue($row['CycleDay15']);
		$this->CycleDay16->setDbValue($row['CycleDay16']);
		$this->CycleDay17->setDbValue($row['CycleDay17']);
		$this->CycleDay18->setDbValue($row['CycleDay18']);
		$this->CycleDay19->setDbValue($row['CycleDay19']);
		$this->CycleDay20->setDbValue($row['CycleDay20']);
		$this->CycleDay21->setDbValue($row['CycleDay21']);
		$this->CycleDay22->setDbValue($row['CycleDay22']);
		$this->CycleDay23->setDbValue($row['CycleDay23']);
		$this->CycleDay24->setDbValue($row['CycleDay24']);
		$this->CycleDay25->setDbValue($row['CycleDay25']);
		$this->StimulationDay14->setDbValue($row['StimulationDay14']);
		$this->StimulationDay15->setDbValue($row['StimulationDay15']);
		$this->StimulationDay16->setDbValue($row['StimulationDay16']);
		$this->StimulationDay17->setDbValue($row['StimulationDay17']);
		$this->StimulationDay18->setDbValue($row['StimulationDay18']);
		$this->StimulationDay19->setDbValue($row['StimulationDay19']);
		$this->StimulationDay20->setDbValue($row['StimulationDay20']);
		$this->StimulationDay21->setDbValue($row['StimulationDay21']);
		$this->StimulationDay22->setDbValue($row['StimulationDay22']);
		$this->StimulationDay23->setDbValue($row['StimulationDay23']);
		$this->StimulationDay24->setDbValue($row['StimulationDay24']);
		$this->StimulationDay25->setDbValue($row['StimulationDay25']);
		$this->Tablet14->setDbValue($row['Tablet14']);
		$this->Tablet15->setDbValue($row['Tablet15']);
		$this->Tablet16->setDbValue($row['Tablet16']);
		$this->Tablet17->setDbValue($row['Tablet17']);
		$this->Tablet18->setDbValue($row['Tablet18']);
		$this->Tablet19->setDbValue($row['Tablet19']);
		$this->Tablet20->setDbValue($row['Tablet20']);
		$this->Tablet21->setDbValue($row['Tablet21']);
		$this->Tablet22->setDbValue($row['Tablet22']);
		$this->Tablet23->setDbValue($row['Tablet23']);
		$this->Tablet24->setDbValue($row['Tablet24']);
		$this->Tablet25->setDbValue($row['Tablet25']);
		$this->RFSH14->setDbValue($row['RFSH14']);
		$this->RFSH15->setDbValue($row['RFSH15']);
		$this->RFSH16->setDbValue($row['RFSH16']);
		$this->RFSH17->setDbValue($row['RFSH17']);
		$this->RFSH18->setDbValue($row['RFSH18']);
		$this->RFSH19->setDbValue($row['RFSH19']);
		$this->RFSH20->setDbValue($row['RFSH20']);
		$this->RFSH21->setDbValue($row['RFSH21']);
		$this->RFSH22->setDbValue($row['RFSH22']);
		$this->RFSH23->setDbValue($row['RFSH23']);
		$this->RFSH24->setDbValue($row['RFSH24']);
		$this->RFSH25->setDbValue($row['RFSH25']);
		$this->HMG14->setDbValue($row['HMG14']);
		$this->HMG15->setDbValue($row['HMG15']);
		$this->HMG16->setDbValue($row['HMG16']);
		$this->HMG17->setDbValue($row['HMG17']);
		$this->HMG18->setDbValue($row['HMG18']);
		$this->HMG19->setDbValue($row['HMG19']);
		$this->HMG20->setDbValue($row['HMG20']);
		$this->HMG21->setDbValue($row['HMG21']);
		$this->HMG22->setDbValue($row['HMG22']);
		$this->HMG23->setDbValue($row['HMG23']);
		$this->HMG24->setDbValue($row['HMG24']);
		$this->HMG25->setDbValue($row['HMG25']);
		$this->GnRH14->setDbValue($row['GnRH14']);
		$this->GnRH15->setDbValue($row['GnRH15']);
		$this->GnRH16->setDbValue($row['GnRH16']);
		$this->GnRH17->setDbValue($row['GnRH17']);
		$this->GnRH18->setDbValue($row['GnRH18']);
		$this->GnRH19->setDbValue($row['GnRH19']);
		$this->GnRH20->setDbValue($row['GnRH20']);
		$this->GnRH21->setDbValue($row['GnRH21']);
		$this->GnRH22->setDbValue($row['GnRH22']);
		$this->GnRH23->setDbValue($row['GnRH23']);
		$this->GnRH24->setDbValue($row['GnRH24']);
		$this->GnRH25->setDbValue($row['GnRH25']);
		$this->P414->setDbValue($row['P414']);
		$this->P415->setDbValue($row['P415']);
		$this->P416->setDbValue($row['P416']);
		$this->P417->setDbValue($row['P417']);
		$this->P418->setDbValue($row['P418']);
		$this->P419->setDbValue($row['P419']);
		$this->P420->setDbValue($row['P420']);
		$this->P421->setDbValue($row['P421']);
		$this->P422->setDbValue($row['P422']);
		$this->P423->setDbValue($row['P423']);
		$this->P424->setDbValue($row['P424']);
		$this->P425->setDbValue($row['P425']);
		$this->USGRt14->setDbValue($row['USGRt14']);
		$this->USGRt15->setDbValue($row['USGRt15']);
		$this->USGRt16->setDbValue($row['USGRt16']);
		$this->USGRt17->setDbValue($row['USGRt17']);
		$this->USGRt18->setDbValue($row['USGRt18']);
		$this->USGRt19->setDbValue($row['USGRt19']);
		$this->USGRt20->setDbValue($row['USGRt20']);
		$this->USGRt21->setDbValue($row['USGRt21']);
		$this->USGRt22->setDbValue($row['USGRt22']);
		$this->USGRt23->setDbValue($row['USGRt23']);
		$this->USGRt24->setDbValue($row['USGRt24']);
		$this->USGRt25->setDbValue($row['USGRt25']);
		$this->USGLt14->setDbValue($row['USGLt14']);
		$this->USGLt15->setDbValue($row['USGLt15']);
		$this->USGLt16->setDbValue($row['USGLt16']);
		$this->USGLt17->setDbValue($row['USGLt17']);
		$this->USGLt18->setDbValue($row['USGLt18']);
		$this->USGLt19->setDbValue($row['USGLt19']);
		$this->USGLt20->setDbValue($row['USGLt20']);
		$this->USGLt21->setDbValue($row['USGLt21']);
		$this->USGLt22->setDbValue($row['USGLt22']);
		$this->USGLt23->setDbValue($row['USGLt23']);
		$this->USGLt24->setDbValue($row['USGLt24']);
		$this->USGLt25->setDbValue($row['USGLt25']);
		$this->EM14->setDbValue($row['EM14']);
		$this->EM15->setDbValue($row['EM15']);
		$this->EM16->setDbValue($row['EM16']);
		$this->EM17->setDbValue($row['EM17']);
		$this->EM18->setDbValue($row['EM18']);
		$this->EM19->setDbValue($row['EM19']);
		$this->EM20->setDbValue($row['EM20']);
		$this->EM21->setDbValue($row['EM21']);
		$this->EM22->setDbValue($row['EM22']);
		$this->EM23->setDbValue($row['EM23']);
		$this->EM24->setDbValue($row['EM24']);
		$this->EM25->setDbValue($row['EM25']);
		$this->Others14->setDbValue($row['Others14']);
		$this->Others15->setDbValue($row['Others15']);
		$this->Others16->setDbValue($row['Others16']);
		$this->Others17->setDbValue($row['Others17']);
		$this->Others18->setDbValue($row['Others18']);
		$this->Others19->setDbValue($row['Others19']);
		$this->Others20->setDbValue($row['Others20']);
		$this->Others21->setDbValue($row['Others21']);
		$this->Others22->setDbValue($row['Others22']);
		$this->Others23->setDbValue($row['Others23']);
		$this->Others24->setDbValue($row['Others24']);
		$this->Others25->setDbValue($row['Others25']);
		$this->DR14->setDbValue($row['DR14']);
		$this->DR15->setDbValue($row['DR15']);
		$this->DR16->setDbValue($row['DR16']);
		$this->DR17->setDbValue($row['DR17']);
		$this->DR18->setDbValue($row['DR18']);
		$this->DR19->setDbValue($row['DR19']);
		$this->DR20->setDbValue($row['DR20']);
		$this->DR21->setDbValue($row['DR21']);
		$this->DR22->setDbValue($row['DR22']);
		$this->DR23->setDbValue($row['DR23']);
		$this->DR24->setDbValue($row['DR24']);
		$this->DR25->setDbValue($row['DR25']);
		$this->E214->setDbValue($row['E214']);
		$this->E215->setDbValue($row['E215']);
		$this->E216->setDbValue($row['E216']);
		$this->E217->setDbValue($row['E217']);
		$this->E218->setDbValue($row['E218']);
		$this->E219->setDbValue($row['E219']);
		$this->E220->setDbValue($row['E220']);
		$this->E221->setDbValue($row['E221']);
		$this->E222->setDbValue($row['E222']);
		$this->E223->setDbValue($row['E223']);
		$this->E224->setDbValue($row['E224']);
		$this->E225->setDbValue($row['E225']);
		$this->EEETTTDTE->setDbValue($row['EEETTTDTE']);
		$this->bhcgdate->setDbValue($row['bhcgdate']);
		$this->TUBAL_PATENCY->setDbValue($row['TUBAL_PATENCY']);
		$this->HSG->setDbValue($row['HSG']);
		$this->DHL->setDbValue($row['DHL']);
		$this->UTERINE_PROBLEMS->setDbValue($row['UTERINE_PROBLEMS']);
		$this->W_COMORBIDS->setDbValue($row['W_COMORBIDS']);
		$this->H_COMORBIDS->setDbValue($row['H_COMORBIDS']);
		$this->SEXUAL_DYSFUNCTION->setDbValue($row['SEXUAL_DYSFUNCTION']);
		$this->TABLETS->setDbValue($row['TABLETS']);
		$this->FOLLICLE_STATUS->setDbValue($row['FOLLICLE_STATUS']);
		$this->NUMBER_OF_IUI->setDbValue($row['NUMBER_OF_IUI']);
		$this->PROCEDURE->setDbValue($row['PROCEDURE']);
		$this->LUTEAL_SUPPORT->setDbValue($row['LUTEAL_SUPPORT']);
		$this->SPECIFIC_MATERNAL_PROBLEMS->setDbValue($row['SPECIFIC_MATERNAL_PROBLEMS']);
		$this->ONGOING_PREG->setDbValue($row['ONGOING_PREG']);
		$this->EDD_Date->setDbValue($row['EDD_Date']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['Name'] = NULL;
		$row['ARTCycle'] = NULL;
		$row['FemaleFactor'] = NULL;
		$row['MaleFactor'] = NULL;
		$row['Protocol'] = NULL;
		$row['SemenFrozen'] = NULL;
		$row['A4ICSICycle'] = NULL;
		$row['TotalICSICycle'] = NULL;
		$row['TypeOfInfertility'] = NULL;
		$row['Duration'] = NULL;
		$row['LMP'] = NULL;
		$row['RelevantHistory'] = NULL;
		$row['IUICycles'] = NULL;
		$row['AFC'] = NULL;
		$row['AMH'] = NULL;
		$row['FBMI'] = NULL;
		$row['MBMI'] = NULL;
		$row['OvarianVolumeRT'] = NULL;
		$row['OvarianVolumeLT'] = NULL;
		$row['DAYSOFSTIMULATION'] = NULL;
		$row['DOSEOFGONADOTROPINS'] = NULL;
		$row['INJTYPE'] = NULL;
		$row['ANTAGONISTDAYS'] = NULL;
		$row['ANTAGONISTSTARTDAY'] = NULL;
		$row['GROWTHHORMONE'] = NULL;
		$row['PRETREATMENT'] = NULL;
		$row['SerumP4'] = NULL;
		$row['FORT'] = NULL;
		$row['MedicalFactors'] = NULL;
		$row['SCDate'] = NULL;
		$row['OvarianSurgery'] = NULL;
		$row['PreProcedureOrder'] = NULL;
		$row['TRIGGERR'] = NULL;
		$row['TRIGGERDATE'] = NULL;
		$row['ATHOMEorCLINIC'] = NULL;
		$row['OPUDATE'] = NULL;
		$row['ALLFREEZEINDICATION'] = NULL;
		$row['ERA'] = NULL;
		$row['PGTA'] = NULL;
		$row['PGD'] = NULL;
		$row['DATEOFET'] = NULL;
		$row['ET'] = NULL;
		$row['ESET'] = NULL;
		$row['DOET'] = NULL;
		$row['SEMENPREPARATION'] = NULL;
		$row['REASONFORESET'] = NULL;
		$row['Expectedoocytes'] = NULL;
		$row['StChDate1'] = NULL;
		$row['StChDate2'] = NULL;
		$row['StChDate3'] = NULL;
		$row['StChDate4'] = NULL;
		$row['StChDate5'] = NULL;
		$row['StChDate6'] = NULL;
		$row['StChDate7'] = NULL;
		$row['StChDate8'] = NULL;
		$row['StChDate9'] = NULL;
		$row['StChDate10'] = NULL;
		$row['StChDate11'] = NULL;
		$row['StChDate12'] = NULL;
		$row['StChDate13'] = NULL;
		$row['CycleDay1'] = NULL;
		$row['CycleDay2'] = NULL;
		$row['CycleDay3'] = NULL;
		$row['CycleDay4'] = NULL;
		$row['CycleDay5'] = NULL;
		$row['CycleDay6'] = NULL;
		$row['CycleDay7'] = NULL;
		$row['CycleDay8'] = NULL;
		$row['CycleDay9'] = NULL;
		$row['CycleDay10'] = NULL;
		$row['CycleDay11'] = NULL;
		$row['CycleDay12'] = NULL;
		$row['CycleDay13'] = NULL;
		$row['StimulationDay1'] = NULL;
		$row['StimulationDay2'] = NULL;
		$row['StimulationDay3'] = NULL;
		$row['StimulationDay4'] = NULL;
		$row['StimulationDay5'] = NULL;
		$row['StimulationDay6'] = NULL;
		$row['StimulationDay7'] = NULL;
		$row['StimulationDay8'] = NULL;
		$row['StimulationDay9'] = NULL;
		$row['StimulationDay10'] = NULL;
		$row['StimulationDay11'] = NULL;
		$row['StimulationDay12'] = NULL;
		$row['StimulationDay13'] = NULL;
		$row['Tablet1'] = NULL;
		$row['Tablet2'] = NULL;
		$row['Tablet3'] = NULL;
		$row['Tablet4'] = NULL;
		$row['Tablet5'] = NULL;
		$row['Tablet6'] = NULL;
		$row['Tablet7'] = NULL;
		$row['Tablet8'] = NULL;
		$row['Tablet9'] = NULL;
		$row['Tablet10'] = NULL;
		$row['Tablet11'] = NULL;
		$row['Tablet12'] = NULL;
		$row['Tablet13'] = NULL;
		$row['RFSH1'] = NULL;
		$row['RFSH2'] = NULL;
		$row['RFSH3'] = NULL;
		$row['RFSH4'] = NULL;
		$row['RFSH5'] = NULL;
		$row['RFSH6'] = NULL;
		$row['RFSH7'] = NULL;
		$row['RFSH8'] = NULL;
		$row['RFSH9'] = NULL;
		$row['RFSH10'] = NULL;
		$row['RFSH11'] = NULL;
		$row['RFSH12'] = NULL;
		$row['RFSH13'] = NULL;
		$row['HMG1'] = NULL;
		$row['HMG2'] = NULL;
		$row['HMG3'] = NULL;
		$row['HMG4'] = NULL;
		$row['HMG5'] = NULL;
		$row['HMG6'] = NULL;
		$row['HMG7'] = NULL;
		$row['HMG8'] = NULL;
		$row['HMG9'] = NULL;
		$row['HMG10'] = NULL;
		$row['HMG11'] = NULL;
		$row['HMG12'] = NULL;
		$row['HMG13'] = NULL;
		$row['GnRH1'] = NULL;
		$row['GnRH2'] = NULL;
		$row['GnRH3'] = NULL;
		$row['GnRH4'] = NULL;
		$row['GnRH5'] = NULL;
		$row['GnRH6'] = NULL;
		$row['GnRH7'] = NULL;
		$row['GnRH8'] = NULL;
		$row['GnRH9'] = NULL;
		$row['GnRH10'] = NULL;
		$row['GnRH11'] = NULL;
		$row['GnRH12'] = NULL;
		$row['GnRH13'] = NULL;
		$row['E21'] = NULL;
		$row['E22'] = NULL;
		$row['E23'] = NULL;
		$row['E24'] = NULL;
		$row['E25'] = NULL;
		$row['E26'] = NULL;
		$row['E27'] = NULL;
		$row['E28'] = NULL;
		$row['E29'] = NULL;
		$row['E210'] = NULL;
		$row['E211'] = NULL;
		$row['E212'] = NULL;
		$row['E213'] = NULL;
		$row['P41'] = NULL;
		$row['P42'] = NULL;
		$row['P43'] = NULL;
		$row['P44'] = NULL;
		$row['P45'] = NULL;
		$row['P46'] = NULL;
		$row['P47'] = NULL;
		$row['P48'] = NULL;
		$row['P49'] = NULL;
		$row['P410'] = NULL;
		$row['P411'] = NULL;
		$row['P412'] = NULL;
		$row['P413'] = NULL;
		$row['USGRt1'] = NULL;
		$row['USGRt2'] = NULL;
		$row['USGRt3'] = NULL;
		$row['USGRt4'] = NULL;
		$row['USGRt5'] = NULL;
		$row['USGRt6'] = NULL;
		$row['USGRt7'] = NULL;
		$row['USGRt8'] = NULL;
		$row['USGRt9'] = NULL;
		$row['USGRt10'] = NULL;
		$row['USGRt11'] = NULL;
		$row['USGRt12'] = NULL;
		$row['USGRt13'] = NULL;
		$row['USGLt1'] = NULL;
		$row['USGLt2'] = NULL;
		$row['USGLt3'] = NULL;
		$row['USGLt4'] = NULL;
		$row['USGLt5'] = NULL;
		$row['USGLt6'] = NULL;
		$row['USGLt7'] = NULL;
		$row['USGLt8'] = NULL;
		$row['USGLt9'] = NULL;
		$row['USGLt10'] = NULL;
		$row['USGLt11'] = NULL;
		$row['USGLt12'] = NULL;
		$row['USGLt13'] = NULL;
		$row['EM1'] = NULL;
		$row['EM2'] = NULL;
		$row['EM3'] = NULL;
		$row['EM4'] = NULL;
		$row['EM5'] = NULL;
		$row['EM6'] = NULL;
		$row['EM7'] = NULL;
		$row['EM8'] = NULL;
		$row['EM9'] = NULL;
		$row['EM10'] = NULL;
		$row['EM11'] = NULL;
		$row['EM12'] = NULL;
		$row['EM13'] = NULL;
		$row['Others1'] = NULL;
		$row['Others2'] = NULL;
		$row['Others3'] = NULL;
		$row['Others4'] = NULL;
		$row['Others5'] = NULL;
		$row['Others6'] = NULL;
		$row['Others7'] = NULL;
		$row['Others8'] = NULL;
		$row['Others9'] = NULL;
		$row['Others10'] = NULL;
		$row['Others11'] = NULL;
		$row['Others12'] = NULL;
		$row['Others13'] = NULL;
		$row['DR1'] = NULL;
		$row['DR2'] = NULL;
		$row['DR3'] = NULL;
		$row['DR4'] = NULL;
		$row['DR5'] = NULL;
		$row['DR6'] = NULL;
		$row['DR7'] = NULL;
		$row['DR8'] = NULL;
		$row['DR9'] = NULL;
		$row['DR10'] = NULL;
		$row['DR11'] = NULL;
		$row['DR12'] = NULL;
		$row['DR13'] = NULL;
		$row['DOCTORRESPONSIBLE'] = NULL;
		$row['TidNo'] = NULL;
		$row['Convert'] = NULL;
		$row['Consultant'] = NULL;
		$row['InseminatinTechnique'] = NULL;
		$row['IndicationForART'] = NULL;
		$row['Hysteroscopy'] = NULL;
		$row['EndometrialScratching'] = NULL;
		$row['TrialCannulation'] = NULL;
		$row['CYCLETYPE'] = NULL;
		$row['HRTCYCLE'] = NULL;
		$row['OralEstrogenDosage'] = NULL;
		$row['VaginalEstrogen'] = NULL;
		$row['GCSF'] = NULL;
		$row['ActivatedPRP'] = NULL;
		$row['UCLcm'] = NULL;
		$row['DATOFEMBRYOTRANSFER'] = NULL;
		$row['DAYOFEMBRYOTRANSFER'] = NULL;
		$row['NOOFEMBRYOSTHAWED'] = NULL;
		$row['NOOFEMBRYOSTRANSFERRED'] = NULL;
		$row['DAYOFEMBRYOS'] = NULL;
		$row['CRYOPRESERVEDEMBRYOS'] = NULL;
		$row['ViaAdmin'] = NULL;
		$row['ViaStartDateTime'] = NULL;
		$row['ViaDose'] = NULL;
		$row['AllFreeze'] = NULL;
		$row['TreatmentCancel'] = NULL;
		$row['Reason'] = NULL;
		$row['ProgesteroneAdmin'] = NULL;
		$row['ProgesteroneStart'] = NULL;
		$row['ProgesteroneDose'] = NULL;
		$row['Projectron'] = NULL;
		$row['StChDate14'] = NULL;
		$row['StChDate15'] = NULL;
		$row['StChDate16'] = NULL;
		$row['StChDate17'] = NULL;
		$row['StChDate18'] = NULL;
		$row['StChDate19'] = NULL;
		$row['StChDate20'] = NULL;
		$row['StChDate21'] = NULL;
		$row['StChDate22'] = NULL;
		$row['StChDate23'] = NULL;
		$row['StChDate24'] = NULL;
		$row['StChDate25'] = NULL;
		$row['CycleDay14'] = NULL;
		$row['CycleDay15'] = NULL;
		$row['CycleDay16'] = NULL;
		$row['CycleDay17'] = NULL;
		$row['CycleDay18'] = NULL;
		$row['CycleDay19'] = NULL;
		$row['CycleDay20'] = NULL;
		$row['CycleDay21'] = NULL;
		$row['CycleDay22'] = NULL;
		$row['CycleDay23'] = NULL;
		$row['CycleDay24'] = NULL;
		$row['CycleDay25'] = NULL;
		$row['StimulationDay14'] = NULL;
		$row['StimulationDay15'] = NULL;
		$row['StimulationDay16'] = NULL;
		$row['StimulationDay17'] = NULL;
		$row['StimulationDay18'] = NULL;
		$row['StimulationDay19'] = NULL;
		$row['StimulationDay20'] = NULL;
		$row['StimulationDay21'] = NULL;
		$row['StimulationDay22'] = NULL;
		$row['StimulationDay23'] = NULL;
		$row['StimulationDay24'] = NULL;
		$row['StimulationDay25'] = NULL;
		$row['Tablet14'] = NULL;
		$row['Tablet15'] = NULL;
		$row['Tablet16'] = NULL;
		$row['Tablet17'] = NULL;
		$row['Tablet18'] = NULL;
		$row['Tablet19'] = NULL;
		$row['Tablet20'] = NULL;
		$row['Tablet21'] = NULL;
		$row['Tablet22'] = NULL;
		$row['Tablet23'] = NULL;
		$row['Tablet24'] = NULL;
		$row['Tablet25'] = NULL;
		$row['RFSH14'] = NULL;
		$row['RFSH15'] = NULL;
		$row['RFSH16'] = NULL;
		$row['RFSH17'] = NULL;
		$row['RFSH18'] = NULL;
		$row['RFSH19'] = NULL;
		$row['RFSH20'] = NULL;
		$row['RFSH21'] = NULL;
		$row['RFSH22'] = NULL;
		$row['RFSH23'] = NULL;
		$row['RFSH24'] = NULL;
		$row['RFSH25'] = NULL;
		$row['HMG14'] = NULL;
		$row['HMG15'] = NULL;
		$row['HMG16'] = NULL;
		$row['HMG17'] = NULL;
		$row['HMG18'] = NULL;
		$row['HMG19'] = NULL;
		$row['HMG20'] = NULL;
		$row['HMG21'] = NULL;
		$row['HMG22'] = NULL;
		$row['HMG23'] = NULL;
		$row['HMG24'] = NULL;
		$row['HMG25'] = NULL;
		$row['GnRH14'] = NULL;
		$row['GnRH15'] = NULL;
		$row['GnRH16'] = NULL;
		$row['GnRH17'] = NULL;
		$row['GnRH18'] = NULL;
		$row['GnRH19'] = NULL;
		$row['GnRH20'] = NULL;
		$row['GnRH21'] = NULL;
		$row['GnRH22'] = NULL;
		$row['GnRH23'] = NULL;
		$row['GnRH24'] = NULL;
		$row['GnRH25'] = NULL;
		$row['P414'] = NULL;
		$row['P415'] = NULL;
		$row['P416'] = NULL;
		$row['P417'] = NULL;
		$row['P418'] = NULL;
		$row['P419'] = NULL;
		$row['P420'] = NULL;
		$row['P421'] = NULL;
		$row['P422'] = NULL;
		$row['P423'] = NULL;
		$row['P424'] = NULL;
		$row['P425'] = NULL;
		$row['USGRt14'] = NULL;
		$row['USGRt15'] = NULL;
		$row['USGRt16'] = NULL;
		$row['USGRt17'] = NULL;
		$row['USGRt18'] = NULL;
		$row['USGRt19'] = NULL;
		$row['USGRt20'] = NULL;
		$row['USGRt21'] = NULL;
		$row['USGRt22'] = NULL;
		$row['USGRt23'] = NULL;
		$row['USGRt24'] = NULL;
		$row['USGRt25'] = NULL;
		$row['USGLt14'] = NULL;
		$row['USGLt15'] = NULL;
		$row['USGLt16'] = NULL;
		$row['USGLt17'] = NULL;
		$row['USGLt18'] = NULL;
		$row['USGLt19'] = NULL;
		$row['USGLt20'] = NULL;
		$row['USGLt21'] = NULL;
		$row['USGLt22'] = NULL;
		$row['USGLt23'] = NULL;
		$row['USGLt24'] = NULL;
		$row['USGLt25'] = NULL;
		$row['EM14'] = NULL;
		$row['EM15'] = NULL;
		$row['EM16'] = NULL;
		$row['EM17'] = NULL;
		$row['EM18'] = NULL;
		$row['EM19'] = NULL;
		$row['EM20'] = NULL;
		$row['EM21'] = NULL;
		$row['EM22'] = NULL;
		$row['EM23'] = NULL;
		$row['EM24'] = NULL;
		$row['EM25'] = NULL;
		$row['Others14'] = NULL;
		$row['Others15'] = NULL;
		$row['Others16'] = NULL;
		$row['Others17'] = NULL;
		$row['Others18'] = NULL;
		$row['Others19'] = NULL;
		$row['Others20'] = NULL;
		$row['Others21'] = NULL;
		$row['Others22'] = NULL;
		$row['Others23'] = NULL;
		$row['Others24'] = NULL;
		$row['Others25'] = NULL;
		$row['DR14'] = NULL;
		$row['DR15'] = NULL;
		$row['DR16'] = NULL;
		$row['DR17'] = NULL;
		$row['DR18'] = NULL;
		$row['DR19'] = NULL;
		$row['DR20'] = NULL;
		$row['DR21'] = NULL;
		$row['DR22'] = NULL;
		$row['DR23'] = NULL;
		$row['DR24'] = NULL;
		$row['DR25'] = NULL;
		$row['E214'] = NULL;
		$row['E215'] = NULL;
		$row['E216'] = NULL;
		$row['E217'] = NULL;
		$row['E218'] = NULL;
		$row['E219'] = NULL;
		$row['E220'] = NULL;
		$row['E221'] = NULL;
		$row['E222'] = NULL;
		$row['E223'] = NULL;
		$row['E224'] = NULL;
		$row['E225'] = NULL;
		$row['EEETTTDTE'] = NULL;
		$row['bhcgdate'] = NULL;
		$row['TUBAL_PATENCY'] = NULL;
		$row['HSG'] = NULL;
		$row['DHL'] = NULL;
		$row['UTERINE_PROBLEMS'] = NULL;
		$row['W_COMORBIDS'] = NULL;
		$row['H_COMORBIDS'] = NULL;
		$row['SEXUAL_DYSFUNCTION'] = NULL;
		$row['TABLETS'] = NULL;
		$row['FOLLICLE_STATUS'] = NULL;
		$row['NUMBER_OF_IUI'] = NULL;
		$row['PROCEDURE'] = NULL;
		$row['LUTEAL_SUPPORT'] = NULL;
		$row['SPECIFIC_MATERNAL_PROBLEMS'] = NULL;
		$row['ONGOING_PREG'] = NULL;
		$row['EDD_Date'] = NULL;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// RIDNo
		// Name
		// ARTCycle
		// FemaleFactor
		// MaleFactor
		// Protocol
		// SemenFrozen
		// A4ICSICycle
		// TotalICSICycle
		// TypeOfInfertility
		// Duration
		// LMP
		// RelevantHistory
		// IUICycles
		// AFC
		// AMH
		// FBMI
		// MBMI
		// OvarianVolumeRT
		// OvarianVolumeLT
		// DAYSOFSTIMULATION
		// DOSEOFGONADOTROPINS
		// INJTYPE
		// ANTAGONISTDAYS
		// ANTAGONISTSTARTDAY
		// GROWTHHORMONE
		// PRETREATMENT
		// SerumP4
		// FORT
		// MedicalFactors
		// SCDate
		// OvarianSurgery
		// PreProcedureOrder
		// TRIGGERR
		// TRIGGERDATE
		// ATHOMEorCLINIC
		// OPUDATE
		// ALLFREEZEINDICATION
		// ERA
		// PGTA
		// PGD
		// DATEOFET
		// ET
		// ESET
		// DOET
		// SEMENPREPARATION
		// REASONFORESET
		// Expectedoocytes
		// StChDate1
		// StChDate2
		// StChDate3
		// StChDate4
		// StChDate5
		// StChDate6
		// StChDate7
		// StChDate8
		// StChDate9
		// StChDate10
		// StChDate11
		// StChDate12
		// StChDate13
		// CycleDay1
		// CycleDay2
		// CycleDay3
		// CycleDay4
		// CycleDay5
		// CycleDay6
		// CycleDay7
		// CycleDay8
		// CycleDay9
		// CycleDay10
		// CycleDay11
		// CycleDay12
		// CycleDay13
		// StimulationDay1
		// StimulationDay2
		// StimulationDay3
		// StimulationDay4
		// StimulationDay5
		// StimulationDay6
		// StimulationDay7
		// StimulationDay8
		// StimulationDay9
		// StimulationDay10
		// StimulationDay11
		// StimulationDay12
		// StimulationDay13
		// Tablet1
		// Tablet2
		// Tablet3
		// Tablet4
		// Tablet5
		// Tablet6
		// Tablet7
		// Tablet8
		// Tablet9
		// Tablet10
		// Tablet11
		// Tablet12
		// Tablet13
		// RFSH1
		// RFSH2
		// RFSH3
		// RFSH4
		// RFSH5
		// RFSH6
		// RFSH7
		// RFSH8
		// RFSH9
		// RFSH10
		// RFSH11
		// RFSH12
		// RFSH13
		// HMG1
		// HMG2
		// HMG3
		// HMG4
		// HMG5
		// HMG6
		// HMG7
		// HMG8
		// HMG9
		// HMG10
		// HMG11
		// HMG12
		// HMG13
		// GnRH1
		// GnRH2
		// GnRH3
		// GnRH4
		// GnRH5
		// GnRH6
		// GnRH7
		// GnRH8
		// GnRH9
		// GnRH10
		// GnRH11
		// GnRH12
		// GnRH13
		// E21
		// E22
		// E23
		// E24
		// E25
		// E26
		// E27
		// E28
		// E29
		// E210
		// E211
		// E212
		// E213
		// P41
		// P42
		// P43
		// P44
		// P45
		// P46
		// P47
		// P48
		// P49
		// P410
		// P411
		// P412
		// P413
		// USGRt1
		// USGRt2
		// USGRt3
		// USGRt4
		// USGRt5
		// USGRt6
		// USGRt7
		// USGRt8
		// USGRt9
		// USGRt10
		// USGRt11
		// USGRt12
		// USGRt13
		// USGLt1
		// USGLt2
		// USGLt3
		// USGLt4
		// USGLt5
		// USGLt6
		// USGLt7
		// USGLt8
		// USGLt9
		// USGLt10
		// USGLt11
		// USGLt12
		// USGLt13
		// EM1
		// EM2
		// EM3
		// EM4
		// EM5
		// EM6
		// EM7
		// EM8
		// EM9
		// EM10
		// EM11
		// EM12
		// EM13
		// Others1
		// Others2
		// Others3
		// Others4
		// Others5
		// Others6
		// Others7
		// Others8
		// Others9
		// Others10
		// Others11
		// Others12
		// Others13
		// DR1
		// DR2
		// DR3
		// DR4
		// DR5
		// DR6
		// DR7
		// DR8
		// DR9
		// DR10
		// DR11
		// DR12
		// DR13
		// DOCTORRESPONSIBLE
		// TidNo
		// Convert
		// Consultant
		// InseminatinTechnique
		// IndicationForART
		// Hysteroscopy
		// EndometrialScratching
		// TrialCannulation
		// CYCLETYPE
		// HRTCYCLE
		// OralEstrogenDosage
		// VaginalEstrogen
		// GCSF
		// ActivatedPRP
		// UCLcm
		// DATOFEMBRYOTRANSFER
		// DAYOFEMBRYOTRANSFER
		// NOOFEMBRYOSTHAWED
		// NOOFEMBRYOSTRANSFERRED
		// DAYOFEMBRYOS
		// CRYOPRESERVEDEMBRYOS
		// ViaAdmin
		// ViaStartDateTime
		// ViaDose
		// AllFreeze
		// TreatmentCancel
		// Reason
		// ProgesteroneAdmin
		// ProgesteroneStart
		// ProgesteroneDose
		// Projectron
		// StChDate14
		// StChDate15
		// StChDate16
		// StChDate17
		// StChDate18
		// StChDate19
		// StChDate20
		// StChDate21
		// StChDate22
		// StChDate23
		// StChDate24
		// StChDate25
		// CycleDay14
		// CycleDay15
		// CycleDay16
		// CycleDay17
		// CycleDay18
		// CycleDay19
		// CycleDay20
		// CycleDay21
		// CycleDay22
		// CycleDay23
		// CycleDay24
		// CycleDay25
		// StimulationDay14
		// StimulationDay15
		// StimulationDay16
		// StimulationDay17
		// StimulationDay18
		// StimulationDay19
		// StimulationDay20
		// StimulationDay21
		// StimulationDay22
		// StimulationDay23
		// StimulationDay24
		// StimulationDay25
		// Tablet14
		// Tablet15
		// Tablet16
		// Tablet17
		// Tablet18
		// Tablet19
		// Tablet20
		// Tablet21
		// Tablet22
		// Tablet23
		// Tablet24
		// Tablet25
		// RFSH14
		// RFSH15
		// RFSH16
		// RFSH17
		// RFSH18
		// RFSH19
		// RFSH20
		// RFSH21
		// RFSH22
		// RFSH23
		// RFSH24
		// RFSH25
		// HMG14
		// HMG15
		// HMG16
		// HMG17
		// HMG18
		// HMG19
		// HMG20
		// HMG21
		// HMG22
		// HMG23
		// HMG24
		// HMG25
		// GnRH14
		// GnRH15
		// GnRH16
		// GnRH17
		// GnRH18
		// GnRH19
		// GnRH20
		// GnRH21
		// GnRH22
		// GnRH23
		// GnRH24
		// GnRH25
		// P414
		// P415
		// P416
		// P417
		// P418
		// P419
		// P420
		// P421
		// P422
		// P423
		// P424
		// P425
		// USGRt14
		// USGRt15
		// USGRt16
		// USGRt17
		// USGRt18
		// USGRt19
		// USGRt20
		// USGRt21
		// USGRt22
		// USGRt23
		// USGRt24
		// USGRt25
		// USGLt14
		// USGLt15
		// USGLt16
		// USGLt17
		// USGLt18
		// USGLt19
		// USGLt20
		// USGLt21
		// USGLt22
		// USGLt23
		// USGLt24
		// USGLt25
		// EM14
		// EM15
		// EM16
		// EM17
		// EM18
		// EM19
		// EM20
		// EM21
		// EM22
		// EM23
		// EM24
		// EM25
		// Others14
		// Others15
		// Others16
		// Others17
		// Others18
		// Others19
		// Others20
		// Others21
		// Others22
		// Others23
		// Others24
		// Others25
		// DR14
		// DR15
		// DR16
		// DR17
		// DR18
		// DR19
		// DR20
		// DR21
		// DR22
		// DR23
		// DR24
		// DR25
		// E214
		// E215
		// E216
		// E217
		// E218
		// E219
		// E220
		// E221
		// E222
		// E223
		// E224
		// E225
		// EEETTTDTE
		// bhcgdate
		// TUBAL_PATENCY
		// HSG
		// DHL
		// UTERINE_PROBLEMS
		// W_COMORBIDS
		// H_COMORBIDS
		// SEXUAL_DYSFUNCTION
		// TABLETS
		// FOLLICLE_STATUS
		// NUMBER_OF_IUI
		// PROCEDURE
		// LUTEAL_SUPPORT
		// SPECIFIC_MATERNAL_PROBLEMS
		// ONGOING_PREG
		// EDD_Date

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// ARTCycle
			if (strval($this->ARTCycle->CurrentValue) != "") {
				$this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
			} else {
				$this->ARTCycle->ViewValue = NULL;
			}
			$this->ARTCycle->ViewCustomAttributes = "";

			// FemaleFactor
			if (strval($this->FemaleFactor->CurrentValue) != "") {
				$this->FemaleFactor->ViewValue = $this->FemaleFactor->optionCaption($this->FemaleFactor->CurrentValue);
			} else {
				$this->FemaleFactor->ViewValue = NULL;
			}
			$this->FemaleFactor->ViewCustomAttributes = "";

			// MaleFactor
			if (strval($this->MaleFactor->CurrentValue) != "") {
				$this->MaleFactor->ViewValue = $this->MaleFactor->optionCaption($this->MaleFactor->CurrentValue);
			} else {
				$this->MaleFactor->ViewValue = NULL;
			}
			$this->MaleFactor->ViewCustomAttributes = "";

			// Protocol
			if (strval($this->Protocol->CurrentValue) != "") {
				$this->Protocol->ViewValue = $this->Protocol->optionCaption($this->Protocol->CurrentValue);
			} else {
				$this->Protocol->ViewValue = NULL;
			}
			$this->Protocol->ViewCustomAttributes = "";

			// SemenFrozen
			if (strval($this->SemenFrozen->CurrentValue) != "") {
				$this->SemenFrozen->ViewValue = $this->SemenFrozen->optionCaption($this->SemenFrozen->CurrentValue);
			} else {
				$this->SemenFrozen->ViewValue = NULL;
			}
			$this->SemenFrozen->ViewCustomAttributes = "";

			// A4ICSICycle
			if (strval($this->A4ICSICycle->CurrentValue) != "") {
				$this->A4ICSICycle->ViewValue = $this->A4ICSICycle->optionCaption($this->A4ICSICycle->CurrentValue);
			} else {
				$this->A4ICSICycle->ViewValue = NULL;
			}
			$this->A4ICSICycle->ViewCustomAttributes = "";

			// TotalICSICycle
			if (strval($this->TotalICSICycle->CurrentValue) != "") {
				$this->TotalICSICycle->ViewValue = $this->TotalICSICycle->optionCaption($this->TotalICSICycle->CurrentValue);
			} else {
				$this->TotalICSICycle->ViewValue = NULL;
			}
			$this->TotalICSICycle->ViewCustomAttributes = "";

			// TypeOfInfertility
			if (strval($this->TypeOfInfertility->CurrentValue) != "") {
				$this->TypeOfInfertility->ViewValue = $this->TypeOfInfertility->optionCaption($this->TypeOfInfertility->CurrentValue);
			} else {
				$this->TypeOfInfertility->ViewValue = NULL;
			}
			$this->TypeOfInfertility->ViewCustomAttributes = "";

			// Duration
			$this->Duration->ViewValue = $this->Duration->CurrentValue;
			$this->Duration->ViewCustomAttributes = "";

			// LMP
			$this->LMP->ViewValue = $this->LMP->CurrentValue;
			$this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 7);
			$this->LMP->ViewCustomAttributes = "";

			// RelevantHistory
			$this->RelevantHistory->ViewValue = $this->RelevantHistory->CurrentValue;
			$this->RelevantHistory->ViewCustomAttributes = "";

			// IUICycles
			$this->IUICycles->ViewValue = $this->IUICycles->CurrentValue;
			$this->IUICycles->ViewCustomAttributes = "";

			// AFC
			$this->AFC->ViewValue = $this->AFC->CurrentValue;
			$this->AFC->ViewCustomAttributes = "";

			// AMH
			$this->AMH->ViewValue = $this->AMH->CurrentValue;
			$this->AMH->ViewCustomAttributes = "";

			// FBMI
			$this->FBMI->ViewValue = $this->FBMI->CurrentValue;
			$this->FBMI->ViewCustomAttributes = "";

			// MBMI
			$this->MBMI->ViewValue = $this->MBMI->CurrentValue;
			$this->MBMI->ViewCustomAttributes = "";

			// OvarianVolumeRT
			$this->OvarianVolumeRT->ViewValue = $this->OvarianVolumeRT->CurrentValue;
			$this->OvarianVolumeRT->ViewCustomAttributes = "";

			// OvarianVolumeLT
			$this->OvarianVolumeLT->ViewValue = $this->OvarianVolumeLT->CurrentValue;
			$this->OvarianVolumeLT->ViewCustomAttributes = "";

			// DAYSOFSTIMULATION
			$this->DAYSOFSTIMULATION->ViewValue = $this->DAYSOFSTIMULATION->CurrentValue;
			$this->DAYSOFSTIMULATION->ViewCustomAttributes = "";

			// DOSEOFGONADOTROPINS
			$this->DOSEOFGONADOTROPINS->ViewValue = $this->DOSEOFGONADOTROPINS->CurrentValue;
			$this->DOSEOFGONADOTROPINS->ViewCustomAttributes = "";

			// INJTYPE
			$curVal = strval($this->INJTYPE->CurrentValue);
			if ($curVal != "") {
				$this->INJTYPE->ViewValue = $this->INJTYPE->lookupCacheOption($curVal);
				if ($this->INJTYPE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->INJTYPE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->INJTYPE->ViewValue = $this->INJTYPE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->INJTYPE->ViewValue = $this->INJTYPE->CurrentValue;
					}
				}
			} else {
				$this->INJTYPE->ViewValue = NULL;
			}
			$this->INJTYPE->ViewCustomAttributes = "";

			// ANTAGONISTDAYS
			$this->ANTAGONISTDAYS->ViewValue = $this->ANTAGONISTDAYS->CurrentValue;
			$this->ANTAGONISTDAYS->ViewCustomAttributes = "";

			// ANTAGONISTSTARTDAY
			if (strval($this->ANTAGONISTSTARTDAY->CurrentValue) != "") {
				$this->ANTAGONISTSTARTDAY->ViewValue = $this->ANTAGONISTSTARTDAY->optionCaption($this->ANTAGONISTSTARTDAY->CurrentValue);
			} else {
				$this->ANTAGONISTSTARTDAY->ViewValue = NULL;
			}
			$this->ANTAGONISTSTARTDAY->ViewCustomAttributes = "";

			// GROWTHHORMONE
			$this->GROWTHHORMONE->ViewValue = $this->GROWTHHORMONE->CurrentValue;
			$this->GROWTHHORMONE->ViewCustomAttributes = "";

			// PRETREATMENT
			if (strval($this->PRETREATMENT->CurrentValue) != "") {
				$this->PRETREATMENT->ViewValue = $this->PRETREATMENT->optionCaption($this->PRETREATMENT->CurrentValue);
			} else {
				$this->PRETREATMENT->ViewValue = NULL;
			}
			$this->PRETREATMENT->ViewCustomAttributes = "";

			// SerumP4
			$this->SerumP4->ViewValue = $this->SerumP4->CurrentValue;
			$this->SerumP4->ViewCustomAttributes = "";

			// FORT
			$this->FORT->ViewValue = $this->FORT->CurrentValue;
			$this->FORT->ViewCustomAttributes = "";

			// MedicalFactors
			if (strval($this->MedicalFactors->CurrentValue) != "") {
				$this->MedicalFactors->ViewValue = $this->MedicalFactors->optionCaption($this->MedicalFactors->CurrentValue);
			} else {
				$this->MedicalFactors->ViewValue = NULL;
			}
			$this->MedicalFactors->ViewCustomAttributes = "";

			// SCDate
			$this->SCDate->ViewValue = $this->SCDate->CurrentValue;
			$this->SCDate->ViewValue = FormatDateTime($this->SCDate->ViewValue, 7);
			$this->SCDate->ViewCustomAttributes = "";

			// OvarianSurgery
			$this->OvarianSurgery->ViewValue = $this->OvarianSurgery->CurrentValue;
			$this->OvarianSurgery->ViewCustomAttributes = "";

			// PreProcedureOrder
			$this->PreProcedureOrder->ViewValue = $this->PreProcedureOrder->CurrentValue;
			$this->PreProcedureOrder->ViewCustomAttributes = "";

			// TRIGGERR
			$curVal = strval($this->TRIGGERR->CurrentValue);
			if ($curVal != "") {
				$this->TRIGGERR->ViewValue = $this->TRIGGERR->lookupCacheOption($curVal);
				if ($this->TRIGGERR->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TRIGGERR->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TRIGGERR->ViewValue = $this->TRIGGERR->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
					}
				}
			} else {
				$this->TRIGGERR->ViewValue = NULL;
			}
			$this->TRIGGERR->ViewCustomAttributes = "";

			// TRIGGERDATE
			$this->TRIGGERDATE->ViewValue = $this->TRIGGERDATE->CurrentValue;
			$this->TRIGGERDATE->ViewValue = FormatDateTime($this->TRIGGERDATE->ViewValue, 11);
			$this->TRIGGERDATE->ViewCustomAttributes = "";

			// ATHOMEorCLINIC
			$this->ATHOMEorCLINIC->ViewValue = $this->ATHOMEorCLINIC->CurrentValue;
			$this->ATHOMEorCLINIC->ViewCustomAttributes = "";

			// OPUDATE
			$this->OPUDATE->ViewValue = $this->OPUDATE->CurrentValue;
			$this->OPUDATE->ViewValue = FormatDateTime($this->OPUDATE->ViewValue, 11);
			$this->OPUDATE->ViewCustomAttributes = "";

			// ALLFREEZEINDICATION
			if (strval($this->ALLFREEZEINDICATION->CurrentValue) != "") {
				$this->ALLFREEZEINDICATION->ViewValue = $this->ALLFREEZEINDICATION->optionCaption($this->ALLFREEZEINDICATION->CurrentValue);
			} else {
				$this->ALLFREEZEINDICATION->ViewValue = NULL;
			}
			$this->ALLFREEZEINDICATION->ViewCustomAttributes = "";

			// ERA
			if (strval($this->ERA->CurrentValue) != "") {
				$this->ERA->ViewValue = $this->ERA->optionCaption($this->ERA->CurrentValue);
			} else {
				$this->ERA->ViewValue = NULL;
			}
			$this->ERA->ViewCustomAttributes = "";

			// PGTA
			$this->PGTA->ViewValue = $this->PGTA->CurrentValue;
			$this->PGTA->ViewCustomAttributes = "";

			// PGD
			$this->PGD->ViewValue = $this->PGD->CurrentValue;
			$this->PGD->ViewCustomAttributes = "";

			// DATEOFET
			$this->DATEOFET->ViewValue = $this->DATEOFET->CurrentValue;
			$this->DATEOFET->ViewValue = FormatDateTime($this->DATEOFET->ViewValue, 11);
			$this->DATEOFET->ViewCustomAttributes = "";

			// ET
			if (strval($this->ET->CurrentValue) != "") {
				$this->ET->ViewValue = $this->ET->optionCaption($this->ET->CurrentValue);
			} else {
				$this->ET->ViewValue = NULL;
			}
			$this->ET->ViewCustomAttributes = "";

			// ESET
			$this->ESET->ViewValue = $this->ESET->CurrentValue;
			$this->ESET->ViewCustomAttributes = "";

			// DOET
			$this->DOET->ViewValue = $this->DOET->CurrentValue;
			$this->DOET->ViewCustomAttributes = "";

			// SEMENPREPARATION
			if (strval($this->SEMENPREPARATION->CurrentValue) != "") {
				$this->SEMENPREPARATION->ViewValue = $this->SEMENPREPARATION->optionCaption($this->SEMENPREPARATION->CurrentValue);
			} else {
				$this->SEMENPREPARATION->ViewValue = NULL;
			}
			$this->SEMENPREPARATION->ViewCustomAttributes = "";

			// REASONFORESET
			if (strval($this->REASONFORESET->CurrentValue) != "") {
				$this->REASONFORESET->ViewValue = $this->REASONFORESET->optionCaption($this->REASONFORESET->CurrentValue);
			} else {
				$this->REASONFORESET->ViewValue = NULL;
			}
			$this->REASONFORESET->ViewCustomAttributes = "";

			// Expectedoocytes
			$this->Expectedoocytes->ViewValue = $this->Expectedoocytes->CurrentValue;
			$this->Expectedoocytes->ViewCustomAttributes = "";

			// StChDate1
			$this->StChDate1->ViewValue = $this->StChDate1->CurrentValue;
			$this->StChDate1->ViewValue = FormatDateTime($this->StChDate1->ViewValue, 7);
			$this->StChDate1->ViewCustomAttributes = "";

			// StChDate2
			$this->StChDate2->ViewValue = $this->StChDate2->CurrentValue;
			$this->StChDate2->ViewValue = FormatDateTime($this->StChDate2->ViewValue, 7);
			$this->StChDate2->ViewCustomAttributes = "";

			// StChDate3
			$this->StChDate3->ViewValue = $this->StChDate3->CurrentValue;
			$this->StChDate3->ViewValue = FormatDateTime($this->StChDate3->ViewValue, 7);
			$this->StChDate3->ViewCustomAttributes = "";

			// StChDate4
			$this->StChDate4->ViewValue = $this->StChDate4->CurrentValue;
			$this->StChDate4->ViewValue = FormatDateTime($this->StChDate4->ViewValue, 7);
			$this->StChDate4->ViewCustomAttributes = "";

			// StChDate5
			$this->StChDate5->ViewValue = $this->StChDate5->CurrentValue;
			$this->StChDate5->ViewValue = FormatDateTime($this->StChDate5->ViewValue, 7);
			$this->StChDate5->ViewCustomAttributes = "";

			// StChDate6
			$this->StChDate6->ViewValue = $this->StChDate6->CurrentValue;
			$this->StChDate6->ViewValue = FormatDateTime($this->StChDate6->ViewValue, 7);
			$this->StChDate6->ViewCustomAttributes = "";

			// StChDate7
			$this->StChDate7->ViewValue = $this->StChDate7->CurrentValue;
			$this->StChDate7->ViewValue = FormatDateTime($this->StChDate7->ViewValue, 7);
			$this->StChDate7->ViewCustomAttributes = "";

			// StChDate8
			$this->StChDate8->ViewValue = $this->StChDate8->CurrentValue;
			$this->StChDate8->ViewValue = FormatDateTime($this->StChDate8->ViewValue, 7);
			$this->StChDate8->ViewCustomAttributes = "";

			// StChDate9
			$this->StChDate9->ViewValue = $this->StChDate9->CurrentValue;
			$this->StChDate9->ViewValue = FormatDateTime($this->StChDate9->ViewValue, 7);
			$this->StChDate9->ViewCustomAttributes = "";

			// StChDate10
			$this->StChDate10->ViewValue = $this->StChDate10->CurrentValue;
			$this->StChDate10->ViewValue = FormatDateTime($this->StChDate10->ViewValue, 7);
			$this->StChDate10->ViewCustomAttributes = "";

			// StChDate11
			$this->StChDate11->ViewValue = $this->StChDate11->CurrentValue;
			$this->StChDate11->ViewValue = FormatDateTime($this->StChDate11->ViewValue, 7);
			$this->StChDate11->ViewCustomAttributes = "";

			// StChDate12
			$this->StChDate12->ViewValue = $this->StChDate12->CurrentValue;
			$this->StChDate12->ViewValue = FormatDateTime($this->StChDate12->ViewValue, 7);
			$this->StChDate12->ViewCustomAttributes = "";

			// StChDate13
			$this->StChDate13->ViewValue = $this->StChDate13->CurrentValue;
			$this->StChDate13->ViewValue = FormatDateTime($this->StChDate13->ViewValue, 7);
			$this->StChDate13->ViewCustomAttributes = "";

			// CycleDay1
			$this->CycleDay1->ViewValue = $this->CycleDay1->CurrentValue;
			$this->CycleDay1->ViewCustomAttributes = "";

			// CycleDay2
			$this->CycleDay2->ViewValue = $this->CycleDay2->CurrentValue;
			$this->CycleDay2->ViewCustomAttributes = "";

			// CycleDay3
			$this->CycleDay3->ViewValue = $this->CycleDay3->CurrentValue;
			$this->CycleDay3->ViewCustomAttributes = "";

			// CycleDay4
			$this->CycleDay4->ViewValue = $this->CycleDay4->CurrentValue;
			$this->CycleDay4->ViewCustomAttributes = "";

			// CycleDay5
			$this->CycleDay5->ViewValue = $this->CycleDay5->CurrentValue;
			$this->CycleDay5->ViewCustomAttributes = "";

			// CycleDay6
			$this->CycleDay6->ViewValue = $this->CycleDay6->CurrentValue;
			$this->CycleDay6->ViewCustomAttributes = "";

			// CycleDay7
			$this->CycleDay7->ViewValue = $this->CycleDay7->CurrentValue;
			$this->CycleDay7->ViewCustomAttributes = "";

			// CycleDay8
			$this->CycleDay8->ViewValue = $this->CycleDay8->CurrentValue;
			$this->CycleDay8->ViewCustomAttributes = "";

			// CycleDay9
			$this->CycleDay9->ViewValue = $this->CycleDay9->CurrentValue;
			$this->CycleDay9->ViewCustomAttributes = "";

			// CycleDay10
			$this->CycleDay10->ViewValue = $this->CycleDay10->CurrentValue;
			$this->CycleDay10->ViewCustomAttributes = "";

			// CycleDay11
			$this->CycleDay11->ViewValue = $this->CycleDay11->CurrentValue;
			$this->CycleDay11->ViewCustomAttributes = "";

			// CycleDay12
			$this->CycleDay12->ViewValue = $this->CycleDay12->CurrentValue;
			$this->CycleDay12->ViewCustomAttributes = "";

			// CycleDay13
			$this->CycleDay13->ViewValue = $this->CycleDay13->CurrentValue;
			$this->CycleDay13->ViewCustomAttributes = "";

			// StimulationDay1
			$this->StimulationDay1->ViewValue = $this->StimulationDay1->CurrentValue;
			$this->StimulationDay1->ViewCustomAttributes = "";

			// StimulationDay2
			$this->StimulationDay2->ViewValue = $this->StimulationDay2->CurrentValue;
			$this->StimulationDay2->ViewCustomAttributes = "";

			// StimulationDay3
			$this->StimulationDay3->ViewValue = $this->StimulationDay3->CurrentValue;
			$this->StimulationDay3->ViewCustomAttributes = "";

			// StimulationDay4
			$this->StimulationDay4->ViewValue = $this->StimulationDay4->CurrentValue;
			$this->StimulationDay4->ViewCustomAttributes = "";

			// StimulationDay5
			$this->StimulationDay5->ViewValue = $this->StimulationDay5->CurrentValue;
			$this->StimulationDay5->ViewCustomAttributes = "";

			// StimulationDay6
			$this->StimulationDay6->ViewValue = $this->StimulationDay6->CurrentValue;
			$this->StimulationDay6->ViewCustomAttributes = "";

			// StimulationDay7
			$this->StimulationDay7->ViewValue = $this->StimulationDay7->CurrentValue;
			$this->StimulationDay7->ViewCustomAttributes = "";

			// StimulationDay8
			$this->StimulationDay8->ViewValue = $this->StimulationDay8->CurrentValue;
			$this->StimulationDay8->ViewCustomAttributes = "";

			// StimulationDay9
			$this->StimulationDay9->ViewValue = $this->StimulationDay9->CurrentValue;
			$this->StimulationDay9->ViewCustomAttributes = "";

			// StimulationDay10
			$this->StimulationDay10->ViewValue = $this->StimulationDay10->CurrentValue;
			$this->StimulationDay10->ViewCustomAttributes = "";

			// StimulationDay11
			$this->StimulationDay11->ViewValue = $this->StimulationDay11->CurrentValue;
			$this->StimulationDay11->ViewCustomAttributes = "";

			// StimulationDay12
			$this->StimulationDay12->ViewValue = $this->StimulationDay12->CurrentValue;
			$this->StimulationDay12->ViewCustomAttributes = "";

			// StimulationDay13
			$this->StimulationDay13->ViewValue = $this->StimulationDay13->CurrentValue;
			$this->StimulationDay13->ViewCustomAttributes = "";

			// Tablet1
			$curVal = strval($this->Tablet1->CurrentValue);
			if ($curVal != "") {
				$this->Tablet1->ViewValue = $this->Tablet1->lookupCacheOption($curVal);
				if ($this->Tablet1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet1->ViewValue = $this->Tablet1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet1->ViewValue = $this->Tablet1->CurrentValue;
					}
				}
			} else {
				$this->Tablet1->ViewValue = NULL;
			}
			$this->Tablet1->ViewCustomAttributes = "";

			// Tablet2
			$curVal = strval($this->Tablet2->CurrentValue);
			if ($curVal != "") {
				$this->Tablet2->ViewValue = $this->Tablet2->lookupCacheOption($curVal);
				if ($this->Tablet2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet2->ViewValue = $this->Tablet2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet2->ViewValue = $this->Tablet2->CurrentValue;
					}
				}
			} else {
				$this->Tablet2->ViewValue = NULL;
			}
			$this->Tablet2->ViewCustomAttributes = "";

			// Tablet3
			$curVal = strval($this->Tablet3->CurrentValue);
			if ($curVal != "") {
				$this->Tablet3->ViewValue = $this->Tablet3->lookupCacheOption($curVal);
				if ($this->Tablet3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet3->ViewValue = $this->Tablet3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet3->ViewValue = $this->Tablet3->CurrentValue;
					}
				}
			} else {
				$this->Tablet3->ViewValue = NULL;
			}
			$this->Tablet3->ViewCustomAttributes = "";

			// Tablet4
			$curVal = strval($this->Tablet4->CurrentValue);
			if ($curVal != "") {
				$this->Tablet4->ViewValue = $this->Tablet4->lookupCacheOption($curVal);
				if ($this->Tablet4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet4->ViewValue = $this->Tablet4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet4->ViewValue = $this->Tablet4->CurrentValue;
					}
				}
			} else {
				$this->Tablet4->ViewValue = NULL;
			}
			$this->Tablet4->ViewCustomAttributes = "";

			// Tablet5
			$curVal = strval($this->Tablet5->CurrentValue);
			if ($curVal != "") {
				$this->Tablet5->ViewValue = $this->Tablet5->lookupCacheOption($curVal);
				if ($this->Tablet5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet5->ViewValue = $this->Tablet5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet5->ViewValue = $this->Tablet5->CurrentValue;
					}
				}
			} else {
				$this->Tablet5->ViewValue = NULL;
			}
			$this->Tablet5->ViewCustomAttributes = "";

			// Tablet6
			$curVal = strval($this->Tablet6->CurrentValue);
			if ($curVal != "") {
				$this->Tablet6->ViewValue = $this->Tablet6->lookupCacheOption($curVal);
				if ($this->Tablet6->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet6->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet6->ViewValue = $this->Tablet6->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet6->ViewValue = $this->Tablet6->CurrentValue;
					}
				}
			} else {
				$this->Tablet6->ViewValue = NULL;
			}
			$this->Tablet6->ViewCustomAttributes = "";

			// Tablet7
			$curVal = strval($this->Tablet7->CurrentValue);
			if ($curVal != "") {
				$this->Tablet7->ViewValue = $this->Tablet7->lookupCacheOption($curVal);
				if ($this->Tablet7->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet7->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet7->ViewValue = $this->Tablet7->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet7->ViewValue = $this->Tablet7->CurrentValue;
					}
				}
			} else {
				$this->Tablet7->ViewValue = NULL;
			}
			$this->Tablet7->ViewCustomAttributes = "";

			// Tablet8
			$curVal = strval($this->Tablet8->CurrentValue);
			if ($curVal != "") {
				$this->Tablet8->ViewValue = $this->Tablet8->lookupCacheOption($curVal);
				if ($this->Tablet8->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet8->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet8->ViewValue = $this->Tablet8->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet8->ViewValue = $this->Tablet8->CurrentValue;
					}
				}
			} else {
				$this->Tablet8->ViewValue = NULL;
			}
			$this->Tablet8->ViewCustomAttributes = "";

			// Tablet9
			$curVal = strval($this->Tablet9->CurrentValue);
			if ($curVal != "") {
				$this->Tablet9->ViewValue = $this->Tablet9->lookupCacheOption($curVal);
				if ($this->Tablet9->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet9->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet9->ViewValue = $this->Tablet9->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet9->ViewValue = $this->Tablet9->CurrentValue;
					}
				}
			} else {
				$this->Tablet9->ViewValue = NULL;
			}
			$this->Tablet9->ViewCustomAttributes = "";

			// Tablet10
			$curVal = strval($this->Tablet10->CurrentValue);
			if ($curVal != "") {
				$this->Tablet10->ViewValue = $this->Tablet10->lookupCacheOption($curVal);
				if ($this->Tablet10->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet10->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet10->ViewValue = $this->Tablet10->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet10->ViewValue = $this->Tablet10->CurrentValue;
					}
				}
			} else {
				$this->Tablet10->ViewValue = NULL;
			}
			$this->Tablet10->ViewCustomAttributes = "";

			// Tablet11
			$curVal = strval($this->Tablet11->CurrentValue);
			if ($curVal != "") {
				$this->Tablet11->ViewValue = $this->Tablet11->lookupCacheOption($curVal);
				if ($this->Tablet11->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet11->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet11->ViewValue = $this->Tablet11->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet11->ViewValue = $this->Tablet11->CurrentValue;
					}
				}
			} else {
				$this->Tablet11->ViewValue = NULL;
			}
			$this->Tablet11->ViewCustomAttributes = "";

			// Tablet12
			$curVal = strval($this->Tablet12->CurrentValue);
			if ($curVal != "") {
				$this->Tablet12->ViewValue = $this->Tablet12->lookupCacheOption($curVal);
				if ($this->Tablet12->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet12->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet12->ViewValue = $this->Tablet12->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet12->ViewValue = $this->Tablet12->CurrentValue;
					}
				}
			} else {
				$this->Tablet12->ViewValue = NULL;
			}
			$this->Tablet12->ViewCustomAttributes = "";

			// Tablet13
			$curVal = strval($this->Tablet13->CurrentValue);
			if ($curVal != "") {
				$this->Tablet13->ViewValue = $this->Tablet13->lookupCacheOption($curVal);
				if ($this->Tablet13->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet13->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet13->ViewValue = $this->Tablet13->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet13->ViewValue = $this->Tablet13->CurrentValue;
					}
				}
			} else {
				$this->Tablet13->ViewValue = NULL;
			}
			$this->Tablet13->ViewCustomAttributes = "";

			// RFSH1
			$curVal = strval($this->RFSH1->CurrentValue);
			if ($curVal != "") {
				$this->RFSH1->ViewValue = $this->RFSH1->lookupCacheOption($curVal);
				if ($this->RFSH1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH1->ViewValue = $this->RFSH1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH1->ViewValue = $this->RFSH1->CurrentValue;
					}
				}
			} else {
				$this->RFSH1->ViewValue = NULL;
			}
			$this->RFSH1->ViewCustomAttributes = "";

			// RFSH2
			$curVal = strval($this->RFSH2->CurrentValue);
			if ($curVal != "") {
				$this->RFSH2->ViewValue = $this->RFSH2->lookupCacheOption($curVal);
				if ($this->RFSH2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH2->ViewValue = $this->RFSH2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH2->ViewValue = $this->RFSH2->CurrentValue;
					}
				}
			} else {
				$this->RFSH2->ViewValue = NULL;
			}
			$this->RFSH2->ViewCustomAttributes = "";

			// RFSH3
			$curVal = strval($this->RFSH3->CurrentValue);
			if ($curVal != "") {
				$this->RFSH3->ViewValue = $this->RFSH3->lookupCacheOption($curVal);
				if ($this->RFSH3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH3->ViewValue = $this->RFSH3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH3->ViewValue = $this->RFSH3->CurrentValue;
					}
				}
			} else {
				$this->RFSH3->ViewValue = NULL;
			}
			$this->RFSH3->ViewCustomAttributes = "";

			// RFSH4
			$curVal = strval($this->RFSH4->CurrentValue);
			if ($curVal != "") {
				$this->RFSH4->ViewValue = $this->RFSH4->lookupCacheOption($curVal);
				if ($this->RFSH4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH4->ViewValue = $this->RFSH4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH4->ViewValue = $this->RFSH4->CurrentValue;
					}
				}
			} else {
				$this->RFSH4->ViewValue = NULL;
			}
			$this->RFSH4->ViewCustomAttributes = "";

			// RFSH5
			$curVal = strval($this->RFSH5->CurrentValue);
			if ($curVal != "") {
				$this->RFSH5->ViewValue = $this->RFSH5->lookupCacheOption($curVal);
				if ($this->RFSH5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH5->ViewValue = $this->RFSH5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH5->ViewValue = $this->RFSH5->CurrentValue;
					}
				}
			} else {
				$this->RFSH5->ViewValue = NULL;
			}
			$this->RFSH5->ViewCustomAttributes = "";

			// RFSH6
			$curVal = strval($this->RFSH6->CurrentValue);
			if ($curVal != "") {
				$this->RFSH6->ViewValue = $this->RFSH6->lookupCacheOption($curVal);
				if ($this->RFSH6->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH6->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH6->ViewValue = $this->RFSH6->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH6->ViewValue = $this->RFSH6->CurrentValue;
					}
				}
			} else {
				$this->RFSH6->ViewValue = NULL;
			}
			$this->RFSH6->ViewCustomAttributes = "";

			// RFSH7
			$curVal = strval($this->RFSH7->CurrentValue);
			if ($curVal != "") {
				$this->RFSH7->ViewValue = $this->RFSH7->lookupCacheOption($curVal);
				if ($this->RFSH7->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH7->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH7->ViewValue = $this->RFSH7->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH7->ViewValue = $this->RFSH7->CurrentValue;
					}
				}
			} else {
				$this->RFSH7->ViewValue = NULL;
			}
			$this->RFSH7->ViewCustomAttributes = "";

			// RFSH8
			$curVal = strval($this->RFSH8->CurrentValue);
			if ($curVal != "") {
				$this->RFSH8->ViewValue = $this->RFSH8->lookupCacheOption($curVal);
				if ($this->RFSH8->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH8->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH8->ViewValue = $this->RFSH8->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH8->ViewValue = $this->RFSH8->CurrentValue;
					}
				}
			} else {
				$this->RFSH8->ViewValue = NULL;
			}
			$this->RFSH8->ViewCustomAttributes = "";

			// RFSH9
			$curVal = strval($this->RFSH9->CurrentValue);
			if ($curVal != "") {
				$this->RFSH9->ViewValue = $this->RFSH9->lookupCacheOption($curVal);
				if ($this->RFSH9->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH9->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH9->ViewValue = $this->RFSH9->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH9->ViewValue = $this->RFSH9->CurrentValue;
					}
				}
			} else {
				$this->RFSH9->ViewValue = NULL;
			}
			$this->RFSH9->ViewCustomAttributes = "";

			// RFSH10
			$curVal = strval($this->RFSH10->CurrentValue);
			if ($curVal != "") {
				$this->RFSH10->ViewValue = $this->RFSH10->lookupCacheOption($curVal);
				if ($this->RFSH10->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH10->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH10->ViewValue = $this->RFSH10->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH10->ViewValue = $this->RFSH10->CurrentValue;
					}
				}
			} else {
				$this->RFSH10->ViewValue = NULL;
			}
			$this->RFSH10->ViewCustomAttributes = "";

			// RFSH11
			$curVal = strval($this->RFSH11->CurrentValue);
			if ($curVal != "") {
				$this->RFSH11->ViewValue = $this->RFSH11->lookupCacheOption($curVal);
				if ($this->RFSH11->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH11->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH11->ViewValue = $this->RFSH11->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH11->ViewValue = $this->RFSH11->CurrentValue;
					}
				}
			} else {
				$this->RFSH11->ViewValue = NULL;
			}
			$this->RFSH11->ViewCustomAttributes = "";

			// RFSH12
			$curVal = strval($this->RFSH12->CurrentValue);
			if ($curVal != "") {
				$this->RFSH12->ViewValue = $this->RFSH12->lookupCacheOption($curVal);
				if ($this->RFSH12->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH12->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH12->ViewValue = $this->RFSH12->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH12->ViewValue = $this->RFSH12->CurrentValue;
					}
				}
			} else {
				$this->RFSH12->ViewValue = NULL;
			}
			$this->RFSH12->ViewCustomAttributes = "";

			// RFSH13
			$curVal = strval($this->RFSH13->CurrentValue);
			if ($curVal != "") {
				$this->RFSH13->ViewValue = $this->RFSH13->lookupCacheOption($curVal);
				if ($this->RFSH13->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH13->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH13->ViewValue = $this->RFSH13->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH13->ViewValue = $this->RFSH13->CurrentValue;
					}
				}
			} else {
				$this->RFSH13->ViewValue = NULL;
			}
			$this->RFSH13->ViewCustomAttributes = "";

			// HMG1
			$curVal = strval($this->HMG1->CurrentValue);
			if ($curVal != "") {
				$this->HMG1->ViewValue = $this->HMG1->lookupCacheOption($curVal);
				if ($this->HMG1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG1->ViewValue = $this->HMG1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG1->ViewValue = $this->HMG1->CurrentValue;
					}
				}
			} else {
				$this->HMG1->ViewValue = NULL;
			}
			$this->HMG1->ViewCustomAttributes = "";

			// HMG2
			$curVal = strval($this->HMG2->CurrentValue);
			if ($curVal != "") {
				$this->HMG2->ViewValue = $this->HMG2->lookupCacheOption($curVal);
				if ($this->HMG2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG2->ViewValue = $this->HMG2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG2->ViewValue = $this->HMG2->CurrentValue;
					}
				}
			} else {
				$this->HMG2->ViewValue = NULL;
			}
			$this->HMG2->ViewCustomAttributes = "";

			// HMG3
			$curVal = strval($this->HMG3->CurrentValue);
			if ($curVal != "") {
				$this->HMG3->ViewValue = $this->HMG3->lookupCacheOption($curVal);
				if ($this->HMG3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG3->ViewValue = $this->HMG3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG3->ViewValue = $this->HMG3->CurrentValue;
					}
				}
			} else {
				$this->HMG3->ViewValue = NULL;
			}
			$this->HMG3->ViewCustomAttributes = "";

			// HMG4
			$curVal = strval($this->HMG4->CurrentValue);
			if ($curVal != "") {
				$this->HMG4->ViewValue = $this->HMG4->lookupCacheOption($curVal);
				if ($this->HMG4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG4->ViewValue = $this->HMG4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG4->ViewValue = $this->HMG4->CurrentValue;
					}
				}
			} else {
				$this->HMG4->ViewValue = NULL;
			}
			$this->HMG4->ViewCustomAttributes = "";

			// HMG5
			$curVal = strval($this->HMG5->CurrentValue);
			if ($curVal != "") {
				$this->HMG5->ViewValue = $this->HMG5->lookupCacheOption($curVal);
				if ($this->HMG5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG5->ViewValue = $this->HMG5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG5->ViewValue = $this->HMG5->CurrentValue;
					}
				}
			} else {
				$this->HMG5->ViewValue = NULL;
			}
			$this->HMG5->ViewCustomAttributes = "";

			// HMG6
			$curVal = strval($this->HMG6->CurrentValue);
			if ($curVal != "") {
				$this->HMG6->ViewValue = $this->HMG6->lookupCacheOption($curVal);
				if ($this->HMG6->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG6->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG6->ViewValue = $this->HMG6->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG6->ViewValue = $this->HMG6->CurrentValue;
					}
				}
			} else {
				$this->HMG6->ViewValue = NULL;
			}
			$this->HMG6->ViewCustomAttributes = "";

			// HMG7
			$curVal = strval($this->HMG7->CurrentValue);
			if ($curVal != "") {
				$this->HMG7->ViewValue = $this->HMG7->lookupCacheOption($curVal);
				if ($this->HMG7->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG7->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG7->ViewValue = $this->HMG7->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG7->ViewValue = $this->HMG7->CurrentValue;
					}
				}
			} else {
				$this->HMG7->ViewValue = NULL;
			}
			$this->HMG7->ViewCustomAttributes = "";

			// HMG8
			$curVal = strval($this->HMG8->CurrentValue);
			if ($curVal != "") {
				$this->HMG8->ViewValue = $this->HMG8->lookupCacheOption($curVal);
				if ($this->HMG8->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG8->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG8->ViewValue = $this->HMG8->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG8->ViewValue = $this->HMG8->CurrentValue;
					}
				}
			} else {
				$this->HMG8->ViewValue = NULL;
			}
			$this->HMG8->ViewCustomAttributes = "";

			// HMG9
			$curVal = strval($this->HMG9->CurrentValue);
			if ($curVal != "") {
				$this->HMG9->ViewValue = $this->HMG9->lookupCacheOption($curVal);
				if ($this->HMG9->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG9->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG9->ViewValue = $this->HMG9->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG9->ViewValue = $this->HMG9->CurrentValue;
					}
				}
			} else {
				$this->HMG9->ViewValue = NULL;
			}
			$this->HMG9->ViewCustomAttributes = "";

			// HMG10
			$curVal = strval($this->HMG10->CurrentValue);
			if ($curVal != "") {
				$this->HMG10->ViewValue = $this->HMG10->lookupCacheOption($curVal);
				if ($this->HMG10->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG10->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG10->ViewValue = $this->HMG10->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG10->ViewValue = $this->HMG10->CurrentValue;
					}
				}
			} else {
				$this->HMG10->ViewValue = NULL;
			}
			$this->HMG10->ViewCustomAttributes = "";

			// HMG11
			$curVal = strval($this->HMG11->CurrentValue);
			if ($curVal != "") {
				$this->HMG11->ViewValue = $this->HMG11->lookupCacheOption($curVal);
				if ($this->HMG11->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG11->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG11->ViewValue = $this->HMG11->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG11->ViewValue = $this->HMG11->CurrentValue;
					}
				}
			} else {
				$this->HMG11->ViewValue = NULL;
			}
			$this->HMG11->ViewCustomAttributes = "";

			// HMG12
			$curVal = strval($this->HMG12->CurrentValue);
			if ($curVal != "") {
				$this->HMG12->ViewValue = $this->HMG12->lookupCacheOption($curVal);
				if ($this->HMG12->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG12->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG12->ViewValue = $this->HMG12->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG12->ViewValue = $this->HMG12->CurrentValue;
					}
				}
			} else {
				$this->HMG12->ViewValue = NULL;
			}
			$this->HMG12->ViewCustomAttributes = "";

			// HMG13
			$curVal = strval($this->HMG13->CurrentValue);
			if ($curVal != "") {
				$this->HMG13->ViewValue = $this->HMG13->lookupCacheOption($curVal);
				if ($this->HMG13->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG13->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG13->ViewValue = $this->HMG13->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG13->ViewValue = $this->HMG13->CurrentValue;
					}
				}
			} else {
				$this->HMG13->ViewValue = NULL;
			}
			$this->HMG13->ViewCustomAttributes = "";

			// GnRH1
			$curVal = strval($this->GnRH1->CurrentValue);
			if ($curVal != "") {
				$this->GnRH1->ViewValue = $this->GnRH1->lookupCacheOption($curVal);
				if ($this->GnRH1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH1->ViewValue = $this->GnRH1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH1->ViewValue = $this->GnRH1->CurrentValue;
					}
				}
			} else {
				$this->GnRH1->ViewValue = NULL;
			}
			$this->GnRH1->ViewCustomAttributes = "";

			// GnRH2
			$curVal = strval($this->GnRH2->CurrentValue);
			if ($curVal != "") {
				$this->GnRH2->ViewValue = $this->GnRH2->lookupCacheOption($curVal);
				if ($this->GnRH2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH2->ViewValue = $this->GnRH2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH2->ViewValue = $this->GnRH2->CurrentValue;
					}
				}
			} else {
				$this->GnRH2->ViewValue = NULL;
			}
			$this->GnRH2->ViewCustomAttributes = "";

			// GnRH3
			$curVal = strval($this->GnRH3->CurrentValue);
			if ($curVal != "") {
				$this->GnRH3->ViewValue = $this->GnRH3->lookupCacheOption($curVal);
				if ($this->GnRH3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH3->ViewValue = $this->GnRH3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH3->ViewValue = $this->GnRH3->CurrentValue;
					}
				}
			} else {
				$this->GnRH3->ViewValue = NULL;
			}
			$this->GnRH3->ViewCustomAttributes = "";

			// GnRH4
			$curVal = strval($this->GnRH4->CurrentValue);
			if ($curVal != "") {
				$this->GnRH4->ViewValue = $this->GnRH4->lookupCacheOption($curVal);
				if ($this->GnRH4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH4->ViewValue = $this->GnRH4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH4->ViewValue = $this->GnRH4->CurrentValue;
					}
				}
			} else {
				$this->GnRH4->ViewValue = NULL;
			}
			$this->GnRH4->ViewCustomAttributes = "";

			// GnRH5
			$curVal = strval($this->GnRH5->CurrentValue);
			if ($curVal != "") {
				$this->GnRH5->ViewValue = $this->GnRH5->lookupCacheOption($curVal);
				if ($this->GnRH5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH5->ViewValue = $this->GnRH5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH5->ViewValue = $this->GnRH5->CurrentValue;
					}
				}
			} else {
				$this->GnRH5->ViewValue = NULL;
			}
			$this->GnRH5->ViewCustomAttributes = "";

			// GnRH6
			$curVal = strval($this->GnRH6->CurrentValue);
			if ($curVal != "") {
				$this->GnRH6->ViewValue = $this->GnRH6->lookupCacheOption($curVal);
				if ($this->GnRH6->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH6->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH6->ViewValue = $this->GnRH6->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH6->ViewValue = $this->GnRH6->CurrentValue;
					}
				}
			} else {
				$this->GnRH6->ViewValue = NULL;
			}
			$this->GnRH6->ViewCustomAttributes = "";

			// GnRH7
			$curVal = strval($this->GnRH7->CurrentValue);
			if ($curVal != "") {
				$this->GnRH7->ViewValue = $this->GnRH7->lookupCacheOption($curVal);
				if ($this->GnRH7->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH7->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH7->ViewValue = $this->GnRH7->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH7->ViewValue = $this->GnRH7->CurrentValue;
					}
				}
			} else {
				$this->GnRH7->ViewValue = NULL;
			}
			$this->GnRH7->ViewCustomAttributes = "";

			// GnRH8
			$curVal = strval($this->GnRH8->CurrentValue);
			if ($curVal != "") {
				$this->GnRH8->ViewValue = $this->GnRH8->lookupCacheOption($curVal);
				if ($this->GnRH8->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH8->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH8->ViewValue = $this->GnRH8->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH8->ViewValue = $this->GnRH8->CurrentValue;
					}
				}
			} else {
				$this->GnRH8->ViewValue = NULL;
			}
			$this->GnRH8->ViewCustomAttributes = "";

			// GnRH9
			$curVal = strval($this->GnRH9->CurrentValue);
			if ($curVal != "") {
				$this->GnRH9->ViewValue = $this->GnRH9->lookupCacheOption($curVal);
				if ($this->GnRH9->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH9->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH9->ViewValue = $this->GnRH9->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH9->ViewValue = $this->GnRH9->CurrentValue;
					}
				}
			} else {
				$this->GnRH9->ViewValue = NULL;
			}
			$this->GnRH9->ViewCustomAttributes = "";

			// GnRH10
			$curVal = strval($this->GnRH10->CurrentValue);
			if ($curVal != "") {
				$this->GnRH10->ViewValue = $this->GnRH10->lookupCacheOption($curVal);
				if ($this->GnRH10->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH10->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH10->ViewValue = $this->GnRH10->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH10->ViewValue = $this->GnRH10->CurrentValue;
					}
				}
			} else {
				$this->GnRH10->ViewValue = NULL;
			}
			$this->GnRH10->ViewCustomAttributes = "";

			// GnRH11
			$curVal = strval($this->GnRH11->CurrentValue);
			if ($curVal != "") {
				$this->GnRH11->ViewValue = $this->GnRH11->lookupCacheOption($curVal);
				if ($this->GnRH11->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH11->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH11->ViewValue = $this->GnRH11->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH11->ViewValue = $this->GnRH11->CurrentValue;
					}
				}
			} else {
				$this->GnRH11->ViewValue = NULL;
			}
			$this->GnRH11->ViewCustomAttributes = "";

			// GnRH12
			$curVal = strval($this->GnRH12->CurrentValue);
			if ($curVal != "") {
				$this->GnRH12->ViewValue = $this->GnRH12->lookupCacheOption($curVal);
				if ($this->GnRH12->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH12->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH12->ViewValue = $this->GnRH12->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH12->ViewValue = $this->GnRH12->CurrentValue;
					}
				}
			} else {
				$this->GnRH12->ViewValue = NULL;
			}
			$this->GnRH12->ViewCustomAttributes = "";

			// GnRH13
			$curVal = strval($this->GnRH13->CurrentValue);
			if ($curVal != "") {
				$this->GnRH13->ViewValue = $this->GnRH13->lookupCacheOption($curVal);
				if ($this->GnRH13->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH13->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH13->ViewValue = $this->GnRH13->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH13->ViewValue = $this->GnRH13->CurrentValue;
					}
				}
			} else {
				$this->GnRH13->ViewValue = NULL;
			}
			$this->GnRH13->ViewCustomAttributes = "";

			// E21
			$this->E21->ViewValue = $this->E21->CurrentValue;
			$this->E21->ViewCustomAttributes = "";

			// E22
			$this->E22->ViewValue = $this->E22->CurrentValue;
			$this->E22->ViewCustomAttributes = "";

			// E23
			$this->E23->ViewValue = $this->E23->CurrentValue;
			$this->E23->ViewCustomAttributes = "";

			// E24
			$this->E24->ViewValue = $this->E24->CurrentValue;
			$this->E24->ViewCustomAttributes = "";

			// E25
			$this->E25->ViewValue = $this->E25->CurrentValue;
			$this->E25->ViewCustomAttributes = "";

			// E26
			$this->E26->ViewValue = $this->E26->CurrentValue;
			$this->E26->ViewCustomAttributes = "";

			// E27
			$this->E27->ViewValue = $this->E27->CurrentValue;
			$this->E27->ViewCustomAttributes = "";

			// E28
			$this->E28->ViewValue = $this->E28->CurrentValue;
			$this->E28->ViewCustomAttributes = "";

			// E29
			$this->E29->ViewValue = $this->E29->CurrentValue;
			$this->E29->ViewCustomAttributes = "";

			// E210
			$this->E210->ViewValue = $this->E210->CurrentValue;
			$this->E210->ViewCustomAttributes = "";

			// E211
			$this->E211->ViewValue = $this->E211->CurrentValue;
			$this->E211->ViewCustomAttributes = "";

			// E212
			$this->E212->ViewValue = $this->E212->CurrentValue;
			$this->E212->ViewCustomAttributes = "";

			// E213
			$this->E213->ViewValue = $this->E213->CurrentValue;
			$this->E213->ViewCustomAttributes = "";

			// P41
			$this->P41->ViewValue = $this->P41->CurrentValue;
			$this->P41->ViewCustomAttributes = "";

			// P42
			$this->P42->ViewValue = $this->P42->CurrentValue;
			$this->P42->ViewCustomAttributes = "";

			// P43
			$this->P43->ViewValue = $this->P43->CurrentValue;
			$this->P43->ViewCustomAttributes = "";

			// P44
			$this->P44->ViewValue = $this->P44->CurrentValue;
			$this->P44->ViewCustomAttributes = "";

			// P45
			$this->P45->ViewValue = $this->P45->CurrentValue;
			$this->P45->ViewCustomAttributes = "";

			// P46
			$this->P46->ViewValue = $this->P46->CurrentValue;
			$this->P46->ViewCustomAttributes = "";

			// P47
			$this->P47->ViewValue = $this->P47->CurrentValue;
			$this->P47->ViewCustomAttributes = "";

			// P48
			$this->P48->ViewValue = $this->P48->CurrentValue;
			$this->P48->ViewCustomAttributes = "";

			// P49
			$this->P49->ViewValue = $this->P49->CurrentValue;
			$this->P49->ViewCustomAttributes = "";

			// P410
			$this->P410->ViewValue = $this->P410->CurrentValue;
			$this->P410->ViewCustomAttributes = "";

			// P411
			$this->P411->ViewValue = $this->P411->CurrentValue;
			$this->P411->ViewCustomAttributes = "";

			// P412
			$this->P412->ViewValue = $this->P412->CurrentValue;
			$this->P412->ViewCustomAttributes = "";

			// P413
			$this->P413->ViewValue = $this->P413->CurrentValue;
			$this->P413->ViewCustomAttributes = "";

			// USGRt1
			$this->USGRt1->ViewValue = $this->USGRt1->CurrentValue;
			$this->USGRt1->ViewCustomAttributes = "";

			// USGRt2
			$this->USGRt2->ViewValue = $this->USGRt2->CurrentValue;
			$this->USGRt2->ViewCustomAttributes = "";

			// USGRt3
			$this->USGRt3->ViewValue = $this->USGRt3->CurrentValue;
			$this->USGRt3->ViewCustomAttributes = "";

			// USGRt4
			$this->USGRt4->ViewValue = $this->USGRt4->CurrentValue;
			$this->USGRt4->ViewCustomAttributes = "";

			// USGRt5
			$this->USGRt5->ViewValue = $this->USGRt5->CurrentValue;
			$this->USGRt5->ViewCustomAttributes = "";

			// USGRt6
			$this->USGRt6->ViewValue = $this->USGRt6->CurrentValue;
			$this->USGRt6->ViewCustomAttributes = "";

			// USGRt7
			$this->USGRt7->ViewValue = $this->USGRt7->CurrentValue;
			$this->USGRt7->ViewCustomAttributes = "";

			// USGRt8
			$this->USGRt8->ViewValue = $this->USGRt8->CurrentValue;
			$this->USGRt8->ViewCustomAttributes = "";

			// USGRt9
			$this->USGRt9->ViewValue = $this->USGRt9->CurrentValue;
			$this->USGRt9->ViewCustomAttributes = "";

			// USGRt10
			$this->USGRt10->ViewValue = $this->USGRt10->CurrentValue;
			$this->USGRt10->ViewCustomAttributes = "";

			// USGRt11
			$this->USGRt11->ViewValue = $this->USGRt11->CurrentValue;
			$this->USGRt11->ViewCustomAttributes = "";

			// USGRt12
			$this->USGRt12->ViewValue = $this->USGRt12->CurrentValue;
			$this->USGRt12->ViewCustomAttributes = "";

			// USGRt13
			$this->USGRt13->ViewValue = $this->USGRt13->CurrentValue;
			$this->USGRt13->ViewCustomAttributes = "";

			// USGLt1
			$this->USGLt1->ViewValue = $this->USGLt1->CurrentValue;
			$this->USGLt1->ViewCustomAttributes = "";

			// USGLt2
			$this->USGLt2->ViewValue = $this->USGLt2->CurrentValue;
			$this->USGLt2->ViewCustomAttributes = "";

			// USGLt3
			$this->USGLt3->ViewValue = $this->USGLt3->CurrentValue;
			$this->USGLt3->ViewCustomAttributes = "";

			// USGLt4
			$this->USGLt4->ViewValue = $this->USGLt4->CurrentValue;
			$this->USGLt4->ViewCustomAttributes = "";

			// USGLt5
			$this->USGLt5->ViewValue = $this->USGLt5->CurrentValue;
			$this->USGLt5->ViewCustomAttributes = "";

			// USGLt6
			$this->USGLt6->ViewValue = $this->USGLt6->CurrentValue;
			$this->USGLt6->ViewCustomAttributes = "";

			// USGLt7
			$this->USGLt7->ViewValue = $this->USGLt7->CurrentValue;
			$this->USGLt7->ViewCustomAttributes = "";

			// USGLt8
			$this->USGLt8->ViewValue = $this->USGLt8->CurrentValue;
			$this->USGLt8->ViewCustomAttributes = "";

			// USGLt9
			$this->USGLt9->ViewValue = $this->USGLt9->CurrentValue;
			$this->USGLt9->ViewCustomAttributes = "";

			// USGLt10
			$this->USGLt10->ViewValue = $this->USGLt10->CurrentValue;
			$this->USGLt10->ViewCustomAttributes = "";

			// USGLt11
			$this->USGLt11->ViewValue = $this->USGLt11->CurrentValue;
			$this->USGLt11->ViewCustomAttributes = "";

			// USGLt12
			$this->USGLt12->ViewValue = $this->USGLt12->CurrentValue;
			$this->USGLt12->ViewCustomAttributes = "";

			// USGLt13
			$this->USGLt13->ViewValue = $this->USGLt13->CurrentValue;
			$this->USGLt13->ViewCustomAttributes = "";

			// EM1
			$this->EM1->ViewValue = $this->EM1->CurrentValue;
			$this->EM1->ViewCustomAttributes = "";

			// EM2
			$this->EM2->ViewValue = $this->EM2->CurrentValue;
			$this->EM2->ViewCustomAttributes = "";

			// EM3
			$this->EM3->ViewValue = $this->EM3->CurrentValue;
			$this->EM3->ViewCustomAttributes = "";

			// EM4
			$this->EM4->ViewValue = $this->EM4->CurrentValue;
			$this->EM4->ViewCustomAttributes = "";

			// EM5
			$this->EM5->ViewValue = $this->EM5->CurrentValue;
			$this->EM5->ViewCustomAttributes = "";

			// EM6
			$this->EM6->ViewValue = $this->EM6->CurrentValue;
			$this->EM6->ViewCustomAttributes = "";

			// EM7
			$this->EM7->ViewValue = $this->EM7->CurrentValue;
			$this->EM7->ViewCustomAttributes = "";

			// EM8
			$this->EM8->ViewValue = $this->EM8->CurrentValue;
			$this->EM8->ViewCustomAttributes = "";

			// EM9
			$this->EM9->ViewValue = $this->EM9->CurrentValue;
			$this->EM9->ViewCustomAttributes = "";

			// EM10
			$this->EM10->ViewValue = $this->EM10->CurrentValue;
			$this->EM10->ViewCustomAttributes = "";

			// EM11
			$this->EM11->ViewValue = $this->EM11->CurrentValue;
			$this->EM11->ViewCustomAttributes = "";

			// EM12
			$this->EM12->ViewValue = $this->EM12->CurrentValue;
			$this->EM12->ViewCustomAttributes = "";

			// EM13
			$this->EM13->ViewValue = $this->EM13->CurrentValue;
			$this->EM13->ViewCustomAttributes = "";

			// Others1
			$this->Others1->ViewValue = $this->Others1->CurrentValue;
			$this->Others1->ViewCustomAttributes = "";

			// Others2
			$this->Others2->ViewValue = $this->Others2->CurrentValue;
			$this->Others2->ViewCustomAttributes = "";

			// Others3
			$this->Others3->ViewValue = $this->Others3->CurrentValue;
			$this->Others3->ViewCustomAttributes = "";

			// Others4
			$this->Others4->ViewValue = $this->Others4->CurrentValue;
			$this->Others4->ViewCustomAttributes = "";

			// Others5
			$this->Others5->ViewValue = $this->Others5->CurrentValue;
			$this->Others5->ViewCustomAttributes = "";

			// Others6
			$this->Others6->ViewValue = $this->Others6->CurrentValue;
			$this->Others6->ViewCustomAttributes = "";

			// Others7
			$this->Others7->ViewValue = $this->Others7->CurrentValue;
			$this->Others7->ViewCustomAttributes = "";

			// Others8
			$this->Others8->ViewValue = $this->Others8->CurrentValue;
			$this->Others8->ViewCustomAttributes = "";

			// Others9
			$this->Others9->ViewValue = $this->Others9->CurrentValue;
			$this->Others9->ViewCustomAttributes = "";

			// Others10
			$this->Others10->ViewValue = $this->Others10->CurrentValue;
			$this->Others10->ViewCustomAttributes = "";

			// Others11
			$this->Others11->ViewValue = $this->Others11->CurrentValue;
			$this->Others11->ViewCustomAttributes = "";

			// Others12
			$this->Others12->ViewValue = $this->Others12->CurrentValue;
			$this->Others12->ViewCustomAttributes = "";

			// Others13
			$this->Others13->ViewValue = $this->Others13->CurrentValue;
			$this->Others13->ViewCustomAttributes = "";

			// DR1
			$this->DR1->ViewValue = $this->DR1->CurrentValue;
			$this->DR1->ViewCustomAttributes = "";

			// DR2
			$this->DR2->ViewValue = $this->DR2->CurrentValue;
			$this->DR2->ViewCustomAttributes = "";

			// DR3
			$this->DR3->ViewValue = $this->DR3->CurrentValue;
			$this->DR3->ViewCustomAttributes = "";

			// DR4
			$this->DR4->ViewValue = $this->DR4->CurrentValue;
			$this->DR4->ViewCustomAttributes = "";

			// DR5
			$this->DR5->ViewValue = $this->DR5->CurrentValue;
			$this->DR5->ViewCustomAttributes = "";

			// DR6
			$this->DR6->ViewValue = $this->DR6->CurrentValue;
			$this->DR6->ViewCustomAttributes = "";

			// DR7
			$this->DR7->ViewValue = $this->DR7->CurrentValue;
			$this->DR7->ViewCustomAttributes = "";

			// DR8
			$this->DR8->ViewValue = $this->DR8->CurrentValue;
			$this->DR8->ViewCustomAttributes = "";

			// DR9
			$this->DR9->ViewValue = $this->DR9->CurrentValue;
			$this->DR9->ViewCustomAttributes = "";

			// DR10
			$this->DR10->ViewValue = $this->DR10->CurrentValue;
			$this->DR10->ViewCustomAttributes = "";

			// DR11
			$this->DR11->ViewValue = $this->DR11->CurrentValue;
			$this->DR11->ViewCustomAttributes = "";

			// DR12
			$this->DR12->ViewValue = $this->DR12->CurrentValue;
			$this->DR12->ViewCustomAttributes = "";

			// DR13
			$this->DR13->ViewValue = $this->DR13->CurrentValue;
			$this->DR13->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// Convert
			if (strval($this->Convert->CurrentValue) != "") {
				$this->Convert->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Convert->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Convert->ViewValue->add($this->Convert->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Convert->ViewValue = NULL;
			}
			$this->Convert->ViewCustomAttributes = "";

			// Consultant
			$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
			$this->Consultant->ViewCustomAttributes = "";

			// InseminatinTechnique
			if (strval($this->InseminatinTechnique->CurrentValue) != "") {
				$this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
			} else {
				$this->InseminatinTechnique->ViewValue = NULL;
			}
			$this->InseminatinTechnique->ViewCustomAttributes = "";

			// IndicationForART
			if (strval($this->IndicationForART->CurrentValue) != "") {
				$this->IndicationForART->ViewValue = $this->IndicationForART->optionCaption($this->IndicationForART->CurrentValue);
			} else {
				$this->IndicationForART->ViewValue = NULL;
			}
			$this->IndicationForART->ViewCustomAttributes = "";

			// Hysteroscopy
			if (strval($this->Hysteroscopy->CurrentValue) != "") {
				$this->Hysteroscopy->ViewValue = $this->Hysteroscopy->optionCaption($this->Hysteroscopy->CurrentValue);
			} else {
				$this->Hysteroscopy->ViewValue = NULL;
			}
			$this->Hysteroscopy->ViewCustomAttributes = "";

			// EndometrialScratching
			if (strval($this->EndometrialScratching->CurrentValue) != "") {
				$this->EndometrialScratching->ViewValue = $this->EndometrialScratching->optionCaption($this->EndometrialScratching->CurrentValue);
			} else {
				$this->EndometrialScratching->ViewValue = NULL;
			}
			$this->EndometrialScratching->ViewCustomAttributes = "";

			// TrialCannulation
			if (strval($this->TrialCannulation->CurrentValue) != "") {
				$this->TrialCannulation->ViewValue = $this->TrialCannulation->optionCaption($this->TrialCannulation->CurrentValue);
			} else {
				$this->TrialCannulation->ViewValue = NULL;
			}
			$this->TrialCannulation->ViewCustomAttributes = "";

			// CYCLETYPE
			if (strval($this->CYCLETYPE->CurrentValue) != "") {
				$this->CYCLETYPE->ViewValue = $this->CYCLETYPE->optionCaption($this->CYCLETYPE->CurrentValue);
			} else {
				$this->CYCLETYPE->ViewValue = NULL;
			}
			$this->CYCLETYPE->ViewCustomAttributes = "";

			// HRTCYCLE
			$this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
			$this->HRTCYCLE->ViewCustomAttributes = "";

			// OralEstrogenDosage
			if (strval($this->OralEstrogenDosage->CurrentValue) != "") {
				$this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->optionCaption($this->OralEstrogenDosage->CurrentValue);
			} else {
				$this->OralEstrogenDosage->ViewValue = NULL;
			}
			$this->OralEstrogenDosage->ViewCustomAttributes = "";

			// VaginalEstrogen
			$this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
			$this->VaginalEstrogen->ViewCustomAttributes = "";

			// GCSF
			if (strval($this->GCSF->CurrentValue) != "") {
				$this->GCSF->ViewValue = $this->GCSF->optionCaption($this->GCSF->CurrentValue);
			} else {
				$this->GCSF->ViewValue = NULL;
			}
			$this->GCSF->ViewCustomAttributes = "";

			// ActivatedPRP
			if (strval($this->ActivatedPRP->CurrentValue) != "") {
				$this->ActivatedPRP->ViewValue = $this->ActivatedPRP->optionCaption($this->ActivatedPRP->CurrentValue);
			} else {
				$this->ActivatedPRP->ViewValue = NULL;
			}
			$this->ActivatedPRP->ViewCustomAttributes = "";

			// UCLcm
			$this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
			$this->UCLcm->ViewCustomAttributes = "";

			// DATOFEMBRYOTRANSFER
			$this->DATOFEMBRYOTRANSFER->ViewValue = $this->DATOFEMBRYOTRANSFER->CurrentValue;
			$this->DATOFEMBRYOTRANSFER->ViewCustomAttributes = "";

			// DAYOFEMBRYOTRANSFER
			$this->DAYOFEMBRYOTRANSFER->ViewValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
			$this->DAYOFEMBRYOTRANSFER->ViewCustomAttributes = "";

			// NOOFEMBRYOSTHAWED
			$this->NOOFEMBRYOSTHAWED->ViewValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
			$this->NOOFEMBRYOSTHAWED->ViewCustomAttributes = "";

			// NOOFEMBRYOSTRANSFERRED
			$this->NOOFEMBRYOSTRANSFERRED->ViewValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
			$this->NOOFEMBRYOSTRANSFERRED->ViewCustomAttributes = "";

			// DAYOFEMBRYOS
			$this->DAYOFEMBRYOS->ViewValue = $this->DAYOFEMBRYOS->CurrentValue;
			$this->DAYOFEMBRYOS->ViewCustomAttributes = "";

			// CRYOPRESERVEDEMBRYOS
			$this->CRYOPRESERVEDEMBRYOS->ViewValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
			$this->CRYOPRESERVEDEMBRYOS->ViewCustomAttributes = "";

			// ViaAdmin
			$this->ViaAdmin->ViewValue = $this->ViaAdmin->CurrentValue;
			$this->ViaAdmin->ViewCustomAttributes = "";

			// ViaStartDateTime
			$this->ViaStartDateTime->ViewValue = $this->ViaStartDateTime->CurrentValue;
			$this->ViaStartDateTime->ViewValue = FormatDateTime($this->ViaStartDateTime->ViewValue, 0);
			$this->ViaStartDateTime->ViewCustomAttributes = "";

			// ViaDose
			$this->ViaDose->ViewValue = $this->ViaDose->CurrentValue;
			$this->ViaDose->ViewCustomAttributes = "";

			// AllFreeze
			if (strval($this->AllFreeze->CurrentValue) != "") {
				$this->AllFreeze->ViewValue = $this->AllFreeze->optionCaption($this->AllFreeze->CurrentValue);
			} else {
				$this->AllFreeze->ViewValue = NULL;
			}
			$this->AllFreeze->ViewCustomAttributes = "";

			// TreatmentCancel
			if (strval($this->TreatmentCancel->CurrentValue) != "") {
				$this->TreatmentCancel->ViewValue = $this->TreatmentCancel->optionCaption($this->TreatmentCancel->CurrentValue);
			} else {
				$this->TreatmentCancel->ViewValue = NULL;
			}
			$this->TreatmentCancel->ViewCustomAttributes = "";

			// ProgesteroneAdmin
			$this->ProgesteroneAdmin->ViewValue = $this->ProgesteroneAdmin->CurrentValue;
			$this->ProgesteroneAdmin->ViewCustomAttributes = "";

			// ProgesteroneStart
			$this->ProgesteroneStart->ViewValue = $this->ProgesteroneStart->CurrentValue;
			$this->ProgesteroneStart->ViewCustomAttributes = "";

			// ProgesteroneDose
			$this->ProgesteroneDose->ViewValue = $this->ProgesteroneDose->CurrentValue;
			$this->ProgesteroneDose->ViewCustomAttributes = "";

			// StChDate14
			$this->StChDate14->ViewValue = $this->StChDate14->CurrentValue;
			$this->StChDate14->ViewValue = FormatDateTime($this->StChDate14->ViewValue, 7);
			$this->StChDate14->ViewCustomAttributes = "";

			// StChDate15
			$this->StChDate15->ViewValue = $this->StChDate15->CurrentValue;
			$this->StChDate15->ViewValue = FormatDateTime($this->StChDate15->ViewValue, 7);
			$this->StChDate15->ViewCustomAttributes = "";

			// StChDate16
			$this->StChDate16->ViewValue = $this->StChDate16->CurrentValue;
			$this->StChDate16->ViewValue = FormatDateTime($this->StChDate16->ViewValue, 7);
			$this->StChDate16->ViewCustomAttributes = "";

			// StChDate17
			$this->StChDate17->ViewValue = $this->StChDate17->CurrentValue;
			$this->StChDate17->ViewValue = FormatDateTime($this->StChDate17->ViewValue, 7);
			$this->StChDate17->ViewCustomAttributes = "";

			// StChDate18
			$this->StChDate18->ViewValue = $this->StChDate18->CurrentValue;
			$this->StChDate18->ViewValue = FormatDateTime($this->StChDate18->ViewValue, 7);
			$this->StChDate18->ViewCustomAttributes = "";

			// StChDate19
			$this->StChDate19->ViewValue = $this->StChDate19->CurrentValue;
			$this->StChDate19->ViewValue = FormatDateTime($this->StChDate19->ViewValue, 7);
			$this->StChDate19->ViewCustomAttributes = "";

			// StChDate20
			$this->StChDate20->ViewValue = $this->StChDate20->CurrentValue;
			$this->StChDate20->ViewValue = FormatDateTime($this->StChDate20->ViewValue, 7);
			$this->StChDate20->ViewCustomAttributes = "";

			// StChDate21
			$this->StChDate21->ViewValue = $this->StChDate21->CurrentValue;
			$this->StChDate21->ViewValue = FormatDateTime($this->StChDate21->ViewValue, 7);
			$this->StChDate21->ViewCustomAttributes = "";

			// StChDate22
			$this->StChDate22->ViewValue = $this->StChDate22->CurrentValue;
			$this->StChDate22->ViewValue = FormatDateTime($this->StChDate22->ViewValue, 7);
			$this->StChDate22->ViewCustomAttributes = "";

			// StChDate23
			$this->StChDate23->ViewValue = $this->StChDate23->CurrentValue;
			$this->StChDate23->ViewValue = FormatDateTime($this->StChDate23->ViewValue, 7);
			$this->StChDate23->ViewCustomAttributes = "";

			// StChDate24
			$this->StChDate24->ViewValue = $this->StChDate24->CurrentValue;
			$this->StChDate24->ViewValue = FormatDateTime($this->StChDate24->ViewValue, 7);
			$this->StChDate24->ViewCustomAttributes = "";

			// StChDate25
			$this->StChDate25->ViewValue = $this->StChDate25->CurrentValue;
			$this->StChDate25->ViewValue = FormatDateTime($this->StChDate25->ViewValue, 7);
			$this->StChDate25->ViewCustomAttributes = "";

			// CycleDay14
			$this->CycleDay14->ViewValue = $this->CycleDay14->CurrentValue;
			$this->CycleDay14->ViewCustomAttributes = "";

			// CycleDay15
			$this->CycleDay15->ViewValue = $this->CycleDay15->CurrentValue;
			$this->CycleDay15->ViewCustomAttributes = "";

			// CycleDay16
			$this->CycleDay16->ViewValue = $this->CycleDay16->CurrentValue;
			$this->CycleDay16->ViewCustomAttributes = "";

			// CycleDay17
			$this->CycleDay17->ViewValue = $this->CycleDay17->CurrentValue;
			$this->CycleDay17->ViewCustomAttributes = "";

			// CycleDay18
			$this->CycleDay18->ViewValue = $this->CycleDay18->CurrentValue;
			$this->CycleDay18->ViewCustomAttributes = "";

			// CycleDay19
			$this->CycleDay19->ViewValue = $this->CycleDay19->CurrentValue;
			$this->CycleDay19->ViewCustomAttributes = "";

			// CycleDay20
			$this->CycleDay20->ViewValue = $this->CycleDay20->CurrentValue;
			$this->CycleDay20->ViewCustomAttributes = "";

			// CycleDay21
			$this->CycleDay21->ViewValue = $this->CycleDay21->CurrentValue;
			$this->CycleDay21->ViewCustomAttributes = "";

			// CycleDay22
			$this->CycleDay22->ViewValue = $this->CycleDay22->CurrentValue;
			$this->CycleDay22->ViewCustomAttributes = "";

			// CycleDay23
			$this->CycleDay23->ViewValue = $this->CycleDay23->CurrentValue;
			$this->CycleDay23->ViewCustomAttributes = "";

			// CycleDay24
			$this->CycleDay24->ViewValue = $this->CycleDay24->CurrentValue;
			$this->CycleDay24->ViewCustomAttributes = "";

			// CycleDay25
			$this->CycleDay25->ViewValue = $this->CycleDay25->CurrentValue;
			$this->CycleDay25->ViewCustomAttributes = "";

			// StimulationDay14
			$this->StimulationDay14->ViewValue = $this->StimulationDay14->CurrentValue;
			$this->StimulationDay14->ViewCustomAttributes = "";

			// StimulationDay15
			$this->StimulationDay15->ViewValue = $this->StimulationDay15->CurrentValue;
			$this->StimulationDay15->ViewCustomAttributes = "";

			// StimulationDay16
			$this->StimulationDay16->ViewValue = $this->StimulationDay16->CurrentValue;
			$this->StimulationDay16->ViewCustomAttributes = "";

			// StimulationDay17
			$this->StimulationDay17->ViewValue = $this->StimulationDay17->CurrentValue;
			$this->StimulationDay17->ViewCustomAttributes = "";

			// StimulationDay18
			$this->StimulationDay18->ViewValue = $this->StimulationDay18->CurrentValue;
			$this->StimulationDay18->ViewCustomAttributes = "";

			// StimulationDay19
			$this->StimulationDay19->ViewValue = $this->StimulationDay19->CurrentValue;
			$this->StimulationDay19->ViewCustomAttributes = "";

			// StimulationDay20
			$this->StimulationDay20->ViewValue = $this->StimulationDay20->CurrentValue;
			$this->StimulationDay20->ViewCustomAttributes = "";

			// StimulationDay21
			$this->StimulationDay21->ViewValue = $this->StimulationDay21->CurrentValue;
			$this->StimulationDay21->ViewCustomAttributes = "";

			// StimulationDay22
			$this->StimulationDay22->ViewValue = $this->StimulationDay22->CurrentValue;
			$this->StimulationDay22->ViewCustomAttributes = "";

			// StimulationDay23
			$this->StimulationDay23->ViewValue = $this->StimulationDay23->CurrentValue;
			$this->StimulationDay23->ViewCustomAttributes = "";

			// StimulationDay24
			$this->StimulationDay24->ViewValue = $this->StimulationDay24->CurrentValue;
			$this->StimulationDay24->ViewCustomAttributes = "";

			// StimulationDay25
			$this->StimulationDay25->ViewValue = $this->StimulationDay25->CurrentValue;
			$this->StimulationDay25->ViewCustomAttributes = "";

			// Tablet14
			$curVal = strval($this->Tablet14->CurrentValue);
			if ($curVal != "") {
				$this->Tablet14->ViewValue = $this->Tablet14->lookupCacheOption($curVal);
				if ($this->Tablet14->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet14->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet14->ViewValue = $this->Tablet14->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet14->ViewValue = $this->Tablet14->CurrentValue;
					}
				}
			} else {
				$this->Tablet14->ViewValue = NULL;
			}
			$this->Tablet14->ViewCustomAttributes = "";

			// Tablet15
			$curVal = strval($this->Tablet15->CurrentValue);
			if ($curVal != "") {
				$this->Tablet15->ViewValue = $this->Tablet15->lookupCacheOption($curVal);
				if ($this->Tablet15->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet15->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet15->ViewValue = $this->Tablet15->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet15->ViewValue = $this->Tablet15->CurrentValue;
					}
				}
			} else {
				$this->Tablet15->ViewValue = NULL;
			}
			$this->Tablet15->ViewCustomAttributes = "";

			// Tablet16
			$curVal = strval($this->Tablet16->CurrentValue);
			if ($curVal != "") {
				$this->Tablet16->ViewValue = $this->Tablet16->lookupCacheOption($curVal);
				if ($this->Tablet16->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet16->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet16->ViewValue = $this->Tablet16->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet16->ViewValue = $this->Tablet16->CurrentValue;
					}
				}
			} else {
				$this->Tablet16->ViewValue = NULL;
			}
			$this->Tablet16->ViewCustomAttributes = "";

			// Tablet17
			$curVal = strval($this->Tablet17->CurrentValue);
			if ($curVal != "") {
				$this->Tablet17->ViewValue = $this->Tablet17->lookupCacheOption($curVal);
				if ($this->Tablet17->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet17->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet17->ViewValue = $this->Tablet17->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet17->ViewValue = $this->Tablet17->CurrentValue;
					}
				}
			} else {
				$this->Tablet17->ViewValue = NULL;
			}
			$this->Tablet17->ViewCustomAttributes = "";

			// Tablet18
			$curVal = strval($this->Tablet18->CurrentValue);
			if ($curVal != "") {
				$this->Tablet18->ViewValue = $this->Tablet18->lookupCacheOption($curVal);
				if ($this->Tablet18->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet18->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet18->ViewValue = $this->Tablet18->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet18->ViewValue = $this->Tablet18->CurrentValue;
					}
				}
			} else {
				$this->Tablet18->ViewValue = NULL;
			}
			$this->Tablet18->ViewCustomAttributes = "";

			// Tablet19
			$curVal = strval($this->Tablet19->CurrentValue);
			if ($curVal != "") {
				$this->Tablet19->ViewValue = $this->Tablet19->lookupCacheOption($curVal);
				if ($this->Tablet19->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet19->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet19->ViewValue = $this->Tablet19->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet19->ViewValue = $this->Tablet19->CurrentValue;
					}
				}
			} else {
				$this->Tablet19->ViewValue = NULL;
			}
			$this->Tablet19->ViewCustomAttributes = "";

			// Tablet20
			$curVal = strval($this->Tablet20->CurrentValue);
			if ($curVal != "") {
				$this->Tablet20->ViewValue = $this->Tablet20->lookupCacheOption($curVal);
				if ($this->Tablet20->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet20->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet20->ViewValue = $this->Tablet20->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet20->ViewValue = $this->Tablet20->CurrentValue;
					}
				}
			} else {
				$this->Tablet20->ViewValue = NULL;
			}
			$this->Tablet20->ViewCustomAttributes = "";

			// Tablet21
			$curVal = strval($this->Tablet21->CurrentValue);
			if ($curVal != "") {
				$this->Tablet21->ViewValue = $this->Tablet21->lookupCacheOption($curVal);
				if ($this->Tablet21->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet21->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet21->ViewValue = $this->Tablet21->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet21->ViewValue = $this->Tablet21->CurrentValue;
					}
				}
			} else {
				$this->Tablet21->ViewValue = NULL;
			}
			$this->Tablet21->ViewCustomAttributes = "";

			// Tablet22
			$curVal = strval($this->Tablet22->CurrentValue);
			if ($curVal != "") {
				$this->Tablet22->ViewValue = $this->Tablet22->lookupCacheOption($curVal);
				if ($this->Tablet22->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet22->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet22->ViewValue = $this->Tablet22->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet22->ViewValue = $this->Tablet22->CurrentValue;
					}
				}
			} else {
				$this->Tablet22->ViewValue = NULL;
			}
			$this->Tablet22->ViewCustomAttributes = "";

			// Tablet23
			$curVal = strval($this->Tablet23->CurrentValue);
			if ($curVal != "") {
				$this->Tablet23->ViewValue = $this->Tablet23->lookupCacheOption($curVal);
				if ($this->Tablet23->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet23->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet23->ViewValue = $this->Tablet23->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet23->ViewValue = $this->Tablet23->CurrentValue;
					}
				}
			} else {
				$this->Tablet23->ViewValue = NULL;
			}
			$this->Tablet23->ViewCustomAttributes = "";

			// Tablet24
			$curVal = strval($this->Tablet24->CurrentValue);
			if ($curVal != "") {
				$this->Tablet24->ViewValue = $this->Tablet24->lookupCacheOption($curVal);
				if ($this->Tablet24->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet24->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet24->ViewValue = $this->Tablet24->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet24->ViewValue = $this->Tablet24->CurrentValue;
					}
				}
			} else {
				$this->Tablet24->ViewValue = NULL;
			}
			$this->Tablet24->ViewCustomAttributes = "";

			// Tablet25
			$curVal = strval($this->Tablet25->CurrentValue);
			if ($curVal != "") {
				$this->Tablet25->ViewValue = $this->Tablet25->lookupCacheOption($curVal);
				if ($this->Tablet25->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet25->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet25->ViewValue = $this->Tablet25->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet25->ViewValue = $this->Tablet25->CurrentValue;
					}
				}
			} else {
				$this->Tablet25->ViewValue = NULL;
			}
			$this->Tablet25->ViewCustomAttributes = "";

			// RFSH14
			$curVal = strval($this->RFSH14->CurrentValue);
			if ($curVal != "") {
				$this->RFSH14->ViewValue = $this->RFSH14->lookupCacheOption($curVal);
				if ($this->RFSH14->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH14->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH14->ViewValue = $this->RFSH14->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH14->ViewValue = $this->RFSH14->CurrentValue;
					}
				}
			} else {
				$this->RFSH14->ViewValue = NULL;
			}
			$this->RFSH14->ViewCustomAttributes = "";

			// RFSH15
			$curVal = strval($this->RFSH15->CurrentValue);
			if ($curVal != "") {
				$this->RFSH15->ViewValue = $this->RFSH15->lookupCacheOption($curVal);
				if ($this->RFSH15->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH15->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH15->ViewValue = $this->RFSH15->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH15->ViewValue = $this->RFSH15->CurrentValue;
					}
				}
			} else {
				$this->RFSH15->ViewValue = NULL;
			}
			$this->RFSH15->ViewCustomAttributes = "";

			// RFSH16
			$curVal = strval($this->RFSH16->CurrentValue);
			if ($curVal != "") {
				$this->RFSH16->ViewValue = $this->RFSH16->lookupCacheOption($curVal);
				if ($this->RFSH16->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH16->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH16->ViewValue = $this->RFSH16->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH16->ViewValue = $this->RFSH16->CurrentValue;
					}
				}
			} else {
				$this->RFSH16->ViewValue = NULL;
			}
			$this->RFSH16->ViewCustomAttributes = "";

			// RFSH17
			$curVal = strval($this->RFSH17->CurrentValue);
			if ($curVal != "") {
				$this->RFSH17->ViewValue = $this->RFSH17->lookupCacheOption($curVal);
				if ($this->RFSH17->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH17->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH17->ViewValue = $this->RFSH17->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH17->ViewValue = $this->RFSH17->CurrentValue;
					}
				}
			} else {
				$this->RFSH17->ViewValue = NULL;
			}
			$this->RFSH17->ViewCustomAttributes = "";

			// RFSH18
			$curVal = strval($this->RFSH18->CurrentValue);
			if ($curVal != "") {
				$this->RFSH18->ViewValue = $this->RFSH18->lookupCacheOption($curVal);
				if ($this->RFSH18->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH18->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH18->ViewValue = $this->RFSH18->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH18->ViewValue = $this->RFSH18->CurrentValue;
					}
				}
			} else {
				$this->RFSH18->ViewValue = NULL;
			}
			$this->RFSH18->ViewCustomAttributes = "";

			// RFSH19
			$curVal = strval($this->RFSH19->CurrentValue);
			if ($curVal != "") {
				$this->RFSH19->ViewValue = $this->RFSH19->lookupCacheOption($curVal);
				if ($this->RFSH19->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH19->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH19->ViewValue = $this->RFSH19->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH19->ViewValue = $this->RFSH19->CurrentValue;
					}
				}
			} else {
				$this->RFSH19->ViewValue = NULL;
			}
			$this->RFSH19->ViewCustomAttributes = "";

			// RFSH20
			$curVal = strval($this->RFSH20->CurrentValue);
			if ($curVal != "") {
				$this->RFSH20->ViewValue = $this->RFSH20->lookupCacheOption($curVal);
				if ($this->RFSH20->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH20->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH20->ViewValue = $this->RFSH20->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH20->ViewValue = $this->RFSH20->CurrentValue;
					}
				}
			} else {
				$this->RFSH20->ViewValue = NULL;
			}
			$this->RFSH20->ViewCustomAttributes = "";

			// RFSH21
			$curVal = strval($this->RFSH21->CurrentValue);
			if ($curVal != "") {
				$this->RFSH21->ViewValue = $this->RFSH21->lookupCacheOption($curVal);
				if ($this->RFSH21->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH21->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH21->ViewValue = $this->RFSH21->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH21->ViewValue = $this->RFSH21->CurrentValue;
					}
				}
			} else {
				$this->RFSH21->ViewValue = NULL;
			}
			$this->RFSH21->ViewCustomAttributes = "";

			// RFSH22
			$curVal = strval($this->RFSH22->CurrentValue);
			if ($curVal != "") {
				$this->RFSH22->ViewValue = $this->RFSH22->lookupCacheOption($curVal);
				if ($this->RFSH22->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH22->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH22->ViewValue = $this->RFSH22->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH22->ViewValue = $this->RFSH22->CurrentValue;
					}
				}
			} else {
				$this->RFSH22->ViewValue = NULL;
			}
			$this->RFSH22->ViewCustomAttributes = "";

			// RFSH23
			$curVal = strval($this->RFSH23->CurrentValue);
			if ($curVal != "") {
				$this->RFSH23->ViewValue = $this->RFSH23->lookupCacheOption($curVal);
				if ($this->RFSH23->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH23->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH23->ViewValue = $this->RFSH23->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH23->ViewValue = $this->RFSH23->CurrentValue;
					}
				}
			} else {
				$this->RFSH23->ViewValue = NULL;
			}
			$this->RFSH23->ViewCustomAttributes = "";

			// RFSH24
			$curVal = strval($this->RFSH24->CurrentValue);
			if ($curVal != "") {
				$this->RFSH24->ViewValue = $this->RFSH24->lookupCacheOption($curVal);
				if ($this->RFSH24->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH24->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH24->ViewValue = $this->RFSH24->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH24->ViewValue = $this->RFSH24->CurrentValue;
					}
				}
			} else {
				$this->RFSH24->ViewValue = NULL;
			}
			$this->RFSH24->ViewCustomAttributes = "";

			// RFSH25
			$curVal = strval($this->RFSH25->CurrentValue);
			if ($curVal != "") {
				$this->RFSH25->ViewValue = $this->RFSH25->lookupCacheOption($curVal);
				if ($this->RFSH25->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH25->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH25->ViewValue = $this->RFSH25->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH25->ViewValue = $this->RFSH25->CurrentValue;
					}
				}
			} else {
				$this->RFSH25->ViewValue = NULL;
			}
			$this->RFSH25->ViewCustomAttributes = "";

			// HMG14
			$curVal = strval($this->HMG14->CurrentValue);
			if ($curVal != "") {
				$this->HMG14->ViewValue = $this->HMG14->lookupCacheOption($curVal);
				if ($this->HMG14->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG14->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG14->ViewValue = $this->HMG14->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG14->ViewValue = $this->HMG14->CurrentValue;
					}
				}
			} else {
				$this->HMG14->ViewValue = NULL;
			}
			$this->HMG14->ViewCustomAttributes = "";

			// HMG15
			$curVal = strval($this->HMG15->CurrentValue);
			if ($curVal != "") {
				$this->HMG15->ViewValue = $this->HMG15->lookupCacheOption($curVal);
				if ($this->HMG15->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG15->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG15->ViewValue = $this->HMG15->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG15->ViewValue = $this->HMG15->CurrentValue;
					}
				}
			} else {
				$this->HMG15->ViewValue = NULL;
			}
			$this->HMG15->ViewCustomAttributes = "";

			// HMG16
			$curVal = strval($this->HMG16->CurrentValue);
			if ($curVal != "") {
				$this->HMG16->ViewValue = $this->HMG16->lookupCacheOption($curVal);
				if ($this->HMG16->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG16->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG16->ViewValue = $this->HMG16->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG16->ViewValue = $this->HMG16->CurrentValue;
					}
				}
			} else {
				$this->HMG16->ViewValue = NULL;
			}
			$this->HMG16->ViewCustomAttributes = "";

			// HMG17
			$curVal = strval($this->HMG17->CurrentValue);
			if ($curVal != "") {
				$this->HMG17->ViewValue = $this->HMG17->lookupCacheOption($curVal);
				if ($this->HMG17->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG17->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG17->ViewValue = $this->HMG17->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG17->ViewValue = $this->HMG17->CurrentValue;
					}
				}
			} else {
				$this->HMG17->ViewValue = NULL;
			}
			$this->HMG17->ViewCustomAttributes = "";

			// HMG18
			$curVal = strval($this->HMG18->CurrentValue);
			if ($curVal != "") {
				$this->HMG18->ViewValue = $this->HMG18->lookupCacheOption($curVal);
				if ($this->HMG18->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG18->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG18->ViewValue = $this->HMG18->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG18->ViewValue = $this->HMG18->CurrentValue;
					}
				}
			} else {
				$this->HMG18->ViewValue = NULL;
			}
			$this->HMG18->ViewCustomAttributes = "";

			// HMG19
			$curVal = strval($this->HMG19->CurrentValue);
			if ($curVal != "") {
				$this->HMG19->ViewValue = $this->HMG19->lookupCacheOption($curVal);
				if ($this->HMG19->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG19->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG19->ViewValue = $this->HMG19->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG19->ViewValue = $this->HMG19->CurrentValue;
					}
				}
			} else {
				$this->HMG19->ViewValue = NULL;
			}
			$this->HMG19->ViewCustomAttributes = "";

			// HMG20
			$curVal = strval($this->HMG20->CurrentValue);
			if ($curVal != "") {
				$this->HMG20->ViewValue = $this->HMG20->lookupCacheOption($curVal);
				if ($this->HMG20->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG20->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG20->ViewValue = $this->HMG20->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG20->ViewValue = $this->HMG20->CurrentValue;
					}
				}
			} else {
				$this->HMG20->ViewValue = NULL;
			}
			$this->HMG20->ViewCustomAttributes = "";

			// HMG21
			$curVal = strval($this->HMG21->CurrentValue);
			if ($curVal != "") {
				$this->HMG21->ViewValue = $this->HMG21->lookupCacheOption($curVal);
				if ($this->HMG21->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG21->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG21->ViewValue = $this->HMG21->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG21->ViewValue = $this->HMG21->CurrentValue;
					}
				}
			} else {
				$this->HMG21->ViewValue = NULL;
			}
			$this->HMG21->ViewCustomAttributes = "";

			// HMG22
			$curVal = strval($this->HMG22->CurrentValue);
			if ($curVal != "") {
				$this->HMG22->ViewValue = $this->HMG22->lookupCacheOption($curVal);
				if ($this->HMG22->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG22->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG22->ViewValue = $this->HMG22->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG22->ViewValue = $this->HMG22->CurrentValue;
					}
				}
			} else {
				$this->HMG22->ViewValue = NULL;
			}
			$this->HMG22->ViewCustomAttributes = "";

			// HMG23
			$curVal = strval($this->HMG23->CurrentValue);
			if ($curVal != "") {
				$this->HMG23->ViewValue = $this->HMG23->lookupCacheOption($curVal);
				if ($this->HMG23->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG23->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG23->ViewValue = $this->HMG23->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG23->ViewValue = $this->HMG23->CurrentValue;
					}
				}
			} else {
				$this->HMG23->ViewValue = NULL;
			}
			$this->HMG23->ViewCustomAttributes = "";

			// HMG24
			$curVal = strval($this->HMG24->CurrentValue);
			if ($curVal != "") {
				$this->HMG24->ViewValue = $this->HMG24->lookupCacheOption($curVal);
				if ($this->HMG24->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG24->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG24->ViewValue = $this->HMG24->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG24->ViewValue = $this->HMG24->CurrentValue;
					}
				}
			} else {
				$this->HMG24->ViewValue = NULL;
			}
			$this->HMG24->ViewCustomAttributes = "";

			// HMG25
			$curVal = strval($this->HMG25->CurrentValue);
			if ($curVal != "") {
				$this->HMG25->ViewValue = $this->HMG25->lookupCacheOption($curVal);
				if ($this->HMG25->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG25->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG25->ViewValue = $this->HMG25->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG25->ViewValue = $this->HMG25->CurrentValue;
					}
				}
			} else {
				$this->HMG25->ViewValue = NULL;
			}
			$this->HMG25->ViewCustomAttributes = "";

			// GnRH14
			$curVal = strval($this->GnRH14->CurrentValue);
			if ($curVal != "") {
				$this->GnRH14->ViewValue = $this->GnRH14->lookupCacheOption($curVal);
				if ($this->GnRH14->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH14->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH14->ViewValue = $this->GnRH14->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH14->ViewValue = $this->GnRH14->CurrentValue;
					}
				}
			} else {
				$this->GnRH14->ViewValue = NULL;
			}
			$this->GnRH14->ViewCustomAttributes = "";

			// GnRH15
			$curVal = strval($this->GnRH15->CurrentValue);
			if ($curVal != "") {
				$this->GnRH15->ViewValue = $this->GnRH15->lookupCacheOption($curVal);
				if ($this->GnRH15->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH15->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH15->ViewValue = $this->GnRH15->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH15->ViewValue = $this->GnRH15->CurrentValue;
					}
				}
			} else {
				$this->GnRH15->ViewValue = NULL;
			}
			$this->GnRH15->ViewCustomAttributes = "";

			// GnRH16
			$curVal = strval($this->GnRH16->CurrentValue);
			if ($curVal != "") {
				$this->GnRH16->ViewValue = $this->GnRH16->lookupCacheOption($curVal);
				if ($this->GnRH16->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH16->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH16->ViewValue = $this->GnRH16->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH16->ViewValue = $this->GnRH16->CurrentValue;
					}
				}
			} else {
				$this->GnRH16->ViewValue = NULL;
			}
			$this->GnRH16->ViewCustomAttributes = "";

			// GnRH17
			$curVal = strval($this->GnRH17->CurrentValue);
			if ($curVal != "") {
				$this->GnRH17->ViewValue = $this->GnRH17->lookupCacheOption($curVal);
				if ($this->GnRH17->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH17->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH17->ViewValue = $this->GnRH17->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH17->ViewValue = $this->GnRH17->CurrentValue;
					}
				}
			} else {
				$this->GnRH17->ViewValue = NULL;
			}
			$this->GnRH17->ViewCustomAttributes = "";

			// GnRH18
			$curVal = strval($this->GnRH18->CurrentValue);
			if ($curVal != "") {
				$this->GnRH18->ViewValue = $this->GnRH18->lookupCacheOption($curVal);
				if ($this->GnRH18->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH18->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH18->ViewValue = $this->GnRH18->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH18->ViewValue = $this->GnRH18->CurrentValue;
					}
				}
			} else {
				$this->GnRH18->ViewValue = NULL;
			}
			$this->GnRH18->ViewCustomAttributes = "";

			// GnRH19
			$curVal = strval($this->GnRH19->CurrentValue);
			if ($curVal != "") {
				$this->GnRH19->ViewValue = $this->GnRH19->lookupCacheOption($curVal);
				if ($this->GnRH19->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH19->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH19->ViewValue = $this->GnRH19->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH19->ViewValue = $this->GnRH19->CurrentValue;
					}
				}
			} else {
				$this->GnRH19->ViewValue = NULL;
			}
			$this->GnRH19->ViewCustomAttributes = "";

			// GnRH20
			$curVal = strval($this->GnRH20->CurrentValue);
			if ($curVal != "") {
				$this->GnRH20->ViewValue = $this->GnRH20->lookupCacheOption($curVal);
				if ($this->GnRH20->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH20->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH20->ViewValue = $this->GnRH20->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH20->ViewValue = $this->GnRH20->CurrentValue;
					}
				}
			} else {
				$this->GnRH20->ViewValue = NULL;
			}
			$this->GnRH20->ViewCustomAttributes = "";

			// GnRH21
			$curVal = strval($this->GnRH21->CurrentValue);
			if ($curVal != "") {
				$this->GnRH21->ViewValue = $this->GnRH21->lookupCacheOption($curVal);
				if ($this->GnRH21->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH21->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH21->ViewValue = $this->GnRH21->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH21->ViewValue = $this->GnRH21->CurrentValue;
					}
				}
			} else {
				$this->GnRH21->ViewValue = NULL;
			}
			$this->GnRH21->ViewCustomAttributes = "";

			// GnRH22
			$curVal = strval($this->GnRH22->CurrentValue);
			if ($curVal != "") {
				$this->GnRH22->ViewValue = $this->GnRH22->lookupCacheOption($curVal);
				if ($this->GnRH22->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH22->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH22->ViewValue = $this->GnRH22->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH22->ViewValue = $this->GnRH22->CurrentValue;
					}
				}
			} else {
				$this->GnRH22->ViewValue = NULL;
			}
			$this->GnRH22->ViewCustomAttributes = "";

			// GnRH23
			$curVal = strval($this->GnRH23->CurrentValue);
			if ($curVal != "") {
				$this->GnRH23->ViewValue = $this->GnRH23->lookupCacheOption($curVal);
				if ($this->GnRH23->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH23->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH23->ViewValue = $this->GnRH23->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH23->ViewValue = $this->GnRH23->CurrentValue;
					}
				}
			} else {
				$this->GnRH23->ViewValue = NULL;
			}
			$this->GnRH23->ViewCustomAttributes = "";

			// GnRH24
			$curVal = strval($this->GnRH24->CurrentValue);
			if ($curVal != "") {
				$this->GnRH24->ViewValue = $this->GnRH24->lookupCacheOption($curVal);
				if ($this->GnRH24->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH24->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH24->ViewValue = $this->GnRH24->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH24->ViewValue = $this->GnRH24->CurrentValue;
					}
				}
			} else {
				$this->GnRH24->ViewValue = NULL;
			}
			$this->GnRH24->ViewCustomAttributes = "";

			// GnRH25
			$curVal = strval($this->GnRH25->CurrentValue);
			if ($curVal != "") {
				$this->GnRH25->ViewValue = $this->GnRH25->lookupCacheOption($curVal);
				if ($this->GnRH25->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH25->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH25->ViewValue = $this->GnRH25->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH25->ViewValue = $this->GnRH25->CurrentValue;
					}
				}
			} else {
				$this->GnRH25->ViewValue = NULL;
			}
			$this->GnRH25->ViewCustomAttributes = "";

			// P414
			$this->P414->ViewValue = $this->P414->CurrentValue;
			$this->P414->ViewCustomAttributes = "";

			// P415
			$this->P415->ViewValue = $this->P415->CurrentValue;
			$this->P415->ViewCustomAttributes = "";

			// P416
			$this->P416->ViewValue = $this->P416->CurrentValue;
			$this->P416->ViewCustomAttributes = "";

			// P417
			$this->P417->ViewValue = $this->P417->CurrentValue;
			$this->P417->ViewCustomAttributes = "";

			// P418
			$this->P418->ViewValue = $this->P418->CurrentValue;
			$this->P418->ViewCustomAttributes = "";

			// P419
			$this->P419->ViewValue = $this->P419->CurrentValue;
			$this->P419->ViewCustomAttributes = "";

			// P420
			$this->P420->ViewValue = $this->P420->CurrentValue;
			$this->P420->ViewCustomAttributes = "";

			// P421
			$this->P421->ViewValue = $this->P421->CurrentValue;
			$this->P421->ViewCustomAttributes = "";

			// P422
			$this->P422->ViewValue = $this->P422->CurrentValue;
			$this->P422->ViewCustomAttributes = "";

			// P423
			$this->P423->ViewValue = $this->P423->CurrentValue;
			$this->P423->ViewCustomAttributes = "";

			// P424
			$this->P424->ViewValue = $this->P424->CurrentValue;
			$this->P424->ViewCustomAttributes = "";

			// P425
			$this->P425->ViewValue = $this->P425->CurrentValue;
			$this->P425->ViewCustomAttributes = "";

			// USGRt14
			$this->USGRt14->ViewValue = $this->USGRt14->CurrentValue;
			$this->USGRt14->ViewCustomAttributes = "";

			// USGRt15
			$this->USGRt15->ViewValue = $this->USGRt15->CurrentValue;
			$this->USGRt15->ViewCustomAttributes = "";

			// USGRt16
			$this->USGRt16->ViewValue = $this->USGRt16->CurrentValue;
			$this->USGRt16->ViewCustomAttributes = "";

			// USGRt17
			$this->USGRt17->ViewValue = $this->USGRt17->CurrentValue;
			$this->USGRt17->ViewCustomAttributes = "";

			// USGRt18
			$this->USGRt18->ViewValue = $this->USGRt18->CurrentValue;
			$this->USGRt18->ViewCustomAttributes = "";

			// USGRt19
			$this->USGRt19->ViewValue = $this->USGRt19->CurrentValue;
			$this->USGRt19->ViewCustomAttributes = "";

			// USGRt20
			$this->USGRt20->ViewValue = $this->USGRt20->CurrentValue;
			$this->USGRt20->ViewCustomAttributes = "";

			// USGRt21
			$this->USGRt21->ViewValue = $this->USGRt21->CurrentValue;
			$this->USGRt21->ViewCustomAttributes = "";

			// USGRt22
			$this->USGRt22->ViewValue = $this->USGRt22->CurrentValue;
			$this->USGRt22->ViewCustomAttributes = "";

			// USGRt23
			$this->USGRt23->ViewValue = $this->USGRt23->CurrentValue;
			$this->USGRt23->ViewCustomAttributes = "";

			// USGRt24
			$this->USGRt24->ViewValue = $this->USGRt24->CurrentValue;
			$this->USGRt24->ViewCustomAttributes = "";

			// USGRt25
			$this->USGRt25->ViewValue = $this->USGRt25->CurrentValue;
			$this->USGRt25->ViewCustomAttributes = "";

			// USGLt14
			$this->USGLt14->ViewValue = $this->USGLt14->CurrentValue;
			$this->USGLt14->ViewCustomAttributes = "";

			// USGLt15
			$this->USGLt15->ViewValue = $this->USGLt15->CurrentValue;
			$this->USGLt15->ViewCustomAttributes = "";

			// USGLt16
			$this->USGLt16->ViewValue = $this->USGLt16->CurrentValue;
			$this->USGLt16->ViewCustomAttributes = "";

			// USGLt17
			$this->USGLt17->ViewValue = $this->USGLt17->CurrentValue;
			$this->USGLt17->ViewCustomAttributes = "";

			// USGLt18
			$this->USGLt18->ViewValue = $this->USGLt18->CurrentValue;
			$this->USGLt18->ViewCustomAttributes = "";

			// USGLt19
			$this->USGLt19->ViewValue = $this->USGLt19->CurrentValue;
			$this->USGLt19->ViewCustomAttributes = "";

			// USGLt20
			$this->USGLt20->ViewValue = $this->USGLt20->CurrentValue;
			$this->USGLt20->ViewCustomAttributes = "";

			// USGLt21
			$this->USGLt21->ViewValue = $this->USGLt21->CurrentValue;
			$this->USGLt21->ViewCustomAttributes = "";

			// USGLt22
			$this->USGLt22->ViewValue = $this->USGLt22->CurrentValue;
			$this->USGLt22->ViewCustomAttributes = "";

			// USGLt23
			$this->USGLt23->ViewValue = $this->USGLt23->CurrentValue;
			$this->USGLt23->ViewCustomAttributes = "";

			// USGLt24
			$this->USGLt24->ViewValue = $this->USGLt24->CurrentValue;
			$this->USGLt24->ViewCustomAttributes = "";

			// USGLt25
			$this->USGLt25->ViewValue = $this->USGLt25->CurrentValue;
			$this->USGLt25->ViewCustomAttributes = "";

			// EM14
			$this->EM14->ViewValue = $this->EM14->CurrentValue;
			$this->EM14->ViewCustomAttributes = "";

			// EM15
			$this->EM15->ViewValue = $this->EM15->CurrentValue;
			$this->EM15->ViewCustomAttributes = "";

			// EM16
			$this->EM16->ViewValue = $this->EM16->CurrentValue;
			$this->EM16->ViewCustomAttributes = "";

			// EM17
			$this->EM17->ViewValue = $this->EM17->CurrentValue;
			$this->EM17->ViewCustomAttributes = "";

			// EM18
			$this->EM18->ViewValue = $this->EM18->CurrentValue;
			$this->EM18->ViewCustomAttributes = "";

			// EM19
			$this->EM19->ViewValue = $this->EM19->CurrentValue;
			$this->EM19->ViewCustomAttributes = "";

			// EM20
			$this->EM20->ViewValue = $this->EM20->CurrentValue;
			$this->EM20->ViewCustomAttributes = "";

			// EM21
			$this->EM21->ViewValue = $this->EM21->CurrentValue;
			$this->EM21->ViewCustomAttributes = "";

			// EM22
			$this->EM22->ViewValue = $this->EM22->CurrentValue;
			$this->EM22->ViewCustomAttributes = "";

			// EM23
			$this->EM23->ViewValue = $this->EM23->CurrentValue;
			$this->EM23->ViewCustomAttributes = "";

			// EM24
			$this->EM24->ViewValue = $this->EM24->CurrentValue;
			$this->EM24->ViewCustomAttributes = "";

			// EM25
			$this->EM25->ViewValue = $this->EM25->CurrentValue;
			$this->EM25->ViewCustomAttributes = "";

			// Others14
			$this->Others14->ViewValue = $this->Others14->CurrentValue;
			$this->Others14->ViewCustomAttributes = "";

			// Others15
			$this->Others15->ViewValue = $this->Others15->CurrentValue;
			$this->Others15->ViewCustomAttributes = "";

			// Others16
			$this->Others16->ViewValue = $this->Others16->CurrentValue;
			$this->Others16->ViewCustomAttributes = "";

			// Others17
			$this->Others17->ViewValue = $this->Others17->CurrentValue;
			$this->Others17->ViewCustomAttributes = "";

			// Others18
			$this->Others18->ViewValue = $this->Others18->CurrentValue;
			$this->Others18->ViewCustomAttributes = "";

			// Others19
			$this->Others19->ViewValue = $this->Others19->CurrentValue;
			$this->Others19->ViewCustomAttributes = "";

			// Others20
			$this->Others20->ViewValue = $this->Others20->CurrentValue;
			$this->Others20->ViewCustomAttributes = "";

			// Others21
			$this->Others21->ViewValue = $this->Others21->CurrentValue;
			$this->Others21->ViewCustomAttributes = "";

			// Others22
			$this->Others22->ViewValue = $this->Others22->CurrentValue;
			$this->Others22->ViewCustomAttributes = "";

			// Others23
			$this->Others23->ViewValue = $this->Others23->CurrentValue;
			$this->Others23->ViewCustomAttributes = "";

			// Others24
			$this->Others24->ViewValue = $this->Others24->CurrentValue;
			$this->Others24->ViewCustomAttributes = "";

			// Others25
			$this->Others25->ViewValue = $this->Others25->CurrentValue;
			$this->Others25->ViewCustomAttributes = "";

			// DR14
			$this->DR14->ViewValue = $this->DR14->CurrentValue;
			$this->DR14->ViewCustomAttributes = "";

			// DR15
			$this->DR15->ViewValue = $this->DR15->CurrentValue;
			$this->DR15->ViewCustomAttributes = "";

			// DR16
			$this->DR16->ViewValue = $this->DR16->CurrentValue;
			$this->DR16->ViewCustomAttributes = "";

			// DR17
			$this->DR17->ViewValue = $this->DR17->CurrentValue;
			$this->DR17->ViewCustomAttributes = "";

			// DR18
			$this->DR18->ViewValue = $this->DR18->CurrentValue;
			$this->DR18->ViewCustomAttributes = "";

			// DR19
			$this->DR19->ViewValue = $this->DR19->CurrentValue;
			$this->DR19->ViewCustomAttributes = "";

			// DR20
			$this->DR20->ViewValue = $this->DR20->CurrentValue;
			$this->DR20->ViewCustomAttributes = "";

			// DR21
			$this->DR21->ViewValue = $this->DR21->CurrentValue;
			$this->DR21->ViewCustomAttributes = "";

			// DR22
			$this->DR22->ViewValue = $this->DR22->CurrentValue;
			$this->DR22->ViewCustomAttributes = "";

			// DR23
			$this->DR23->ViewValue = $this->DR23->CurrentValue;
			$this->DR23->ViewCustomAttributes = "";

			// DR24
			$this->DR24->ViewValue = $this->DR24->CurrentValue;
			$this->DR24->ViewCustomAttributes = "";

			// DR25
			$this->DR25->ViewValue = $this->DR25->CurrentValue;
			$this->DR25->ViewCustomAttributes = "";

			// E214
			$this->E214->ViewValue = $this->E214->CurrentValue;
			$this->E214->ViewCustomAttributes = "";

			// E215
			$this->E215->ViewValue = $this->E215->CurrentValue;
			$this->E215->ViewCustomAttributes = "";

			// E216
			$this->E216->ViewValue = $this->E216->CurrentValue;
			$this->E216->ViewCustomAttributes = "";

			// E217
			$this->E217->ViewValue = $this->E217->CurrentValue;
			$this->E217->ViewCustomAttributes = "";

			// E218
			$this->E218->ViewValue = $this->E218->CurrentValue;
			$this->E218->ViewCustomAttributes = "";

			// E219
			$this->E219->ViewValue = $this->E219->CurrentValue;
			$this->E219->ViewCustomAttributes = "";

			// E220
			$this->E220->ViewValue = $this->E220->CurrentValue;
			$this->E220->ViewCustomAttributes = "";

			// E221
			$this->E221->ViewValue = $this->E221->CurrentValue;
			$this->E221->ViewCustomAttributes = "";

			// E222
			$this->E222->ViewValue = $this->E222->CurrentValue;
			$this->E222->ViewCustomAttributes = "";

			// E223
			$this->E223->ViewValue = $this->E223->CurrentValue;
			$this->E223->ViewCustomAttributes = "";

			// E224
			$this->E224->ViewValue = $this->E224->CurrentValue;
			$this->E224->ViewCustomAttributes = "";

			// E225
			$this->E225->ViewValue = $this->E225->CurrentValue;
			$this->E225->ViewCustomAttributes = "";

			// EEETTTDTE
			$this->EEETTTDTE->ViewValue = $this->EEETTTDTE->CurrentValue;
			$this->EEETTTDTE->ViewValue = FormatDateTime($this->EEETTTDTE->ViewValue, 7);
			$this->EEETTTDTE->ViewCustomAttributes = "";

			// bhcgdate
			$this->bhcgdate->ViewValue = $this->bhcgdate->CurrentValue;
			$this->bhcgdate->ViewValue = FormatDateTime($this->bhcgdate->ViewValue, 7);
			$this->bhcgdate->ViewCustomAttributes = "";

			// TUBAL_PATENCY
			if (strval($this->TUBAL_PATENCY->CurrentValue) != "") {
				$this->TUBAL_PATENCY->ViewValue = $this->TUBAL_PATENCY->optionCaption($this->TUBAL_PATENCY->CurrentValue);
			} else {
				$this->TUBAL_PATENCY->ViewValue = NULL;
			}
			$this->TUBAL_PATENCY->ViewCustomAttributes = "";

			// HSG
			if (strval($this->HSG->CurrentValue) != "") {
				$this->HSG->ViewValue = $this->HSG->optionCaption($this->HSG->CurrentValue);
			} else {
				$this->HSG->ViewValue = NULL;
			}
			$this->HSG->ViewCustomAttributes = "";

			// DHL
			if (strval($this->DHL->CurrentValue) != "") {
				$this->DHL->ViewValue = $this->DHL->optionCaption($this->DHL->CurrentValue);
			} else {
				$this->DHL->ViewValue = NULL;
			}
			$this->DHL->ViewCustomAttributes = "";

			// UTERINE_PROBLEMS
			if (strval($this->UTERINE_PROBLEMS->CurrentValue) != "") {
				$this->UTERINE_PROBLEMS->ViewValue = $this->UTERINE_PROBLEMS->optionCaption($this->UTERINE_PROBLEMS->CurrentValue);
			} else {
				$this->UTERINE_PROBLEMS->ViewValue = NULL;
			}
			$this->UTERINE_PROBLEMS->ViewCustomAttributes = "";

			// W_COMORBIDS
			if (strval($this->W_COMORBIDS->CurrentValue) != "") {
				$this->W_COMORBIDS->ViewValue = $this->W_COMORBIDS->optionCaption($this->W_COMORBIDS->CurrentValue);
			} else {
				$this->W_COMORBIDS->ViewValue = NULL;
			}
			$this->W_COMORBIDS->ViewCustomAttributes = "";

			// H_COMORBIDS
			if (strval($this->H_COMORBIDS->CurrentValue) != "") {
				$this->H_COMORBIDS->ViewValue = $this->H_COMORBIDS->optionCaption($this->H_COMORBIDS->CurrentValue);
			} else {
				$this->H_COMORBIDS->ViewValue = NULL;
			}
			$this->H_COMORBIDS->ViewCustomAttributes = "";

			// SEXUAL_DYSFUNCTION
			if (strval($this->SEXUAL_DYSFUNCTION->CurrentValue) != "") {
				$this->SEXUAL_DYSFUNCTION->ViewValue = $this->SEXUAL_DYSFUNCTION->optionCaption($this->SEXUAL_DYSFUNCTION->CurrentValue);
			} else {
				$this->SEXUAL_DYSFUNCTION->ViewValue = NULL;
			}
			$this->SEXUAL_DYSFUNCTION->ViewCustomAttributes = "";

			// TABLETS
			$this->TABLETS->ViewValue = $this->TABLETS->CurrentValue;
			$this->TABLETS->ViewCustomAttributes = "";

			// FOLLICLE_STATUS
			if (strval($this->FOLLICLE_STATUS->CurrentValue) != "") {
				$this->FOLLICLE_STATUS->ViewValue = $this->FOLLICLE_STATUS->optionCaption($this->FOLLICLE_STATUS->CurrentValue);
			} else {
				$this->FOLLICLE_STATUS->ViewValue = NULL;
			}
			$this->FOLLICLE_STATUS->ViewCustomAttributes = "";

			// NUMBER_OF_IUI
			if (strval($this->NUMBER_OF_IUI->CurrentValue) != "") {
				$this->NUMBER_OF_IUI->ViewValue = $this->NUMBER_OF_IUI->optionCaption($this->NUMBER_OF_IUI->CurrentValue);
			} else {
				$this->NUMBER_OF_IUI->ViewValue = NULL;
			}
			$this->NUMBER_OF_IUI->ViewCustomAttributes = "";

			// PROCEDURE
			if (strval($this->PROCEDURE->CurrentValue) != "") {
				$this->PROCEDURE->ViewValue = $this->PROCEDURE->optionCaption($this->PROCEDURE->CurrentValue);
			} else {
				$this->PROCEDURE->ViewValue = NULL;
			}
			$this->PROCEDURE->ViewCustomAttributes = "";

			// LUTEAL_SUPPORT
			if (strval($this->LUTEAL_SUPPORT->CurrentValue) != "") {
				$this->LUTEAL_SUPPORT->ViewValue = $this->LUTEAL_SUPPORT->optionCaption($this->LUTEAL_SUPPORT->CurrentValue);
			} else {
				$this->LUTEAL_SUPPORT->ViewValue = NULL;
			}
			$this->LUTEAL_SUPPORT->ViewCustomAttributes = "";

			// SPECIFIC_MATERNAL_PROBLEMS
			if (strval($this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue) != "") {
				$this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->SPECIFIC_MATERNAL_PROBLEMS->optionCaption($this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue);
			} else {
				$this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = NULL;
			}
			$this->SPECIFIC_MATERNAL_PROBLEMS->ViewCustomAttributes = "";

			// ONGOING_PREG
			$this->ONGOING_PREG->ViewValue = $this->ONGOING_PREG->CurrentValue;
			$this->ONGOING_PREG->ViewCustomAttributes = "";

			// EDD_Date
			$this->EDD_Date->ViewValue = $this->EDD_Date->CurrentValue;
			$this->EDD_Date->ViewValue = FormatDateTime($this->EDD_Date->ViewValue, 0);
			$this->EDD_Date->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// ARTCycle
			$this->ARTCycle->LinkCustomAttributes = "";
			$this->ARTCycle->HrefValue = "";
			$this->ARTCycle->TooltipValue = "";

			// FemaleFactor
			$this->FemaleFactor->LinkCustomAttributes = "";
			$this->FemaleFactor->HrefValue = "";
			$this->FemaleFactor->TooltipValue = "";

			// MaleFactor
			$this->MaleFactor->LinkCustomAttributes = "";
			$this->MaleFactor->HrefValue = "";
			$this->MaleFactor->TooltipValue = "";

			// Protocol
			$this->Protocol->LinkCustomAttributes = "";
			$this->Protocol->HrefValue = "";
			$this->Protocol->TooltipValue = "";

			// SemenFrozen
			$this->SemenFrozen->LinkCustomAttributes = "";
			$this->SemenFrozen->HrefValue = "";
			$this->SemenFrozen->TooltipValue = "";

			// A4ICSICycle
			$this->A4ICSICycle->LinkCustomAttributes = "";
			$this->A4ICSICycle->HrefValue = "";
			$this->A4ICSICycle->TooltipValue = "";

			// TotalICSICycle
			$this->TotalICSICycle->LinkCustomAttributes = "";
			$this->TotalICSICycle->HrefValue = "";
			$this->TotalICSICycle->TooltipValue = "";

			// TypeOfInfertility
			$this->TypeOfInfertility->LinkCustomAttributes = "";
			$this->TypeOfInfertility->HrefValue = "";
			$this->TypeOfInfertility->TooltipValue = "";

			// Duration
			$this->Duration->LinkCustomAttributes = "";
			$this->Duration->HrefValue = "";
			$this->Duration->TooltipValue = "";

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";
			$this->LMP->TooltipValue = "";

			// RelevantHistory
			$this->RelevantHistory->LinkCustomAttributes = "";
			$this->RelevantHistory->HrefValue = "";
			$this->RelevantHistory->TooltipValue = "";

			// IUICycles
			$this->IUICycles->LinkCustomAttributes = "";
			$this->IUICycles->HrefValue = "";
			$this->IUICycles->TooltipValue = "";

			// AFC
			$this->AFC->LinkCustomAttributes = "";
			$this->AFC->HrefValue = "";
			$this->AFC->TooltipValue = "";

			// AMH
			$this->AMH->LinkCustomAttributes = "";
			$this->AMH->HrefValue = "";
			$this->AMH->TooltipValue = "";

			// FBMI
			$this->FBMI->LinkCustomAttributes = "";
			$this->FBMI->HrefValue = "";
			$this->FBMI->TooltipValue = "";

			// MBMI
			$this->MBMI->LinkCustomAttributes = "";
			$this->MBMI->HrefValue = "";
			$this->MBMI->TooltipValue = "";

			// OvarianVolumeRT
			$this->OvarianVolumeRT->LinkCustomAttributes = "";
			$this->OvarianVolumeRT->HrefValue = "";
			$this->OvarianVolumeRT->TooltipValue = "";

			// OvarianVolumeLT
			$this->OvarianVolumeLT->LinkCustomAttributes = "";
			$this->OvarianVolumeLT->HrefValue = "";
			$this->OvarianVolumeLT->TooltipValue = "";

			// DAYSOFSTIMULATION
			$this->DAYSOFSTIMULATION->LinkCustomAttributes = "";
			$this->DAYSOFSTIMULATION->HrefValue = "";
			$this->DAYSOFSTIMULATION->TooltipValue = "";

			// DOSEOFGONADOTROPINS
			$this->DOSEOFGONADOTROPINS->LinkCustomAttributes = "";
			$this->DOSEOFGONADOTROPINS->HrefValue = "";
			$this->DOSEOFGONADOTROPINS->TooltipValue = "";

			// INJTYPE
			$this->INJTYPE->LinkCustomAttributes = "";
			$this->INJTYPE->HrefValue = "";
			$this->INJTYPE->TooltipValue = "";

			// ANTAGONISTDAYS
			$this->ANTAGONISTDAYS->LinkCustomAttributes = "";
			$this->ANTAGONISTDAYS->HrefValue = "";
			$this->ANTAGONISTDAYS->TooltipValue = "";

			// ANTAGONISTSTARTDAY
			$this->ANTAGONISTSTARTDAY->LinkCustomAttributes = "";
			$this->ANTAGONISTSTARTDAY->HrefValue = "";
			$this->ANTAGONISTSTARTDAY->TooltipValue = "";

			// GROWTHHORMONE
			$this->GROWTHHORMONE->LinkCustomAttributes = "";
			$this->GROWTHHORMONE->HrefValue = "";
			$this->GROWTHHORMONE->TooltipValue = "";

			// PRETREATMENT
			$this->PRETREATMENT->LinkCustomAttributes = "";
			$this->PRETREATMENT->HrefValue = "";
			$this->PRETREATMENT->TooltipValue = "";

			// SerumP4
			$this->SerumP4->LinkCustomAttributes = "";
			$this->SerumP4->HrefValue = "";
			$this->SerumP4->TooltipValue = "";

			// FORT
			$this->FORT->LinkCustomAttributes = "";
			$this->FORT->HrefValue = "";
			$this->FORT->TooltipValue = "";

			// MedicalFactors
			$this->MedicalFactors->LinkCustomAttributes = "";
			$this->MedicalFactors->HrefValue = "";
			$this->MedicalFactors->TooltipValue = "";

			// SCDate
			$this->SCDate->LinkCustomAttributes = "";
			$this->SCDate->HrefValue = "";
			$this->SCDate->TooltipValue = "";

			// OvarianSurgery
			$this->OvarianSurgery->LinkCustomAttributes = "";
			$this->OvarianSurgery->HrefValue = "";
			$this->OvarianSurgery->TooltipValue = "";

			// PreProcedureOrder
			$this->PreProcedureOrder->LinkCustomAttributes = "";
			$this->PreProcedureOrder->HrefValue = "";
			$this->PreProcedureOrder->TooltipValue = "";

			// TRIGGERR
			$this->TRIGGERR->LinkCustomAttributes = "";
			$this->TRIGGERR->HrefValue = "";
			$this->TRIGGERR->TooltipValue = "";

			// TRIGGERDATE
			$this->TRIGGERDATE->LinkCustomAttributes = "";
			$this->TRIGGERDATE->HrefValue = "";
			$this->TRIGGERDATE->TooltipValue = "";

			// ATHOMEorCLINIC
			$this->ATHOMEorCLINIC->LinkCustomAttributes = "";
			$this->ATHOMEorCLINIC->HrefValue = "";
			$this->ATHOMEorCLINIC->TooltipValue = "";

			// OPUDATE
			$this->OPUDATE->LinkCustomAttributes = "";
			$this->OPUDATE->HrefValue = "";
			$this->OPUDATE->TooltipValue = "";

			// ALLFREEZEINDICATION
			$this->ALLFREEZEINDICATION->LinkCustomAttributes = "";
			$this->ALLFREEZEINDICATION->HrefValue = "";
			$this->ALLFREEZEINDICATION->TooltipValue = "";

			// ERA
			$this->ERA->LinkCustomAttributes = "";
			$this->ERA->HrefValue = "";
			$this->ERA->TooltipValue = "";

			// PGTA
			$this->PGTA->LinkCustomAttributes = "";
			$this->PGTA->HrefValue = "";
			$this->PGTA->TooltipValue = "";

			// PGD
			$this->PGD->LinkCustomAttributes = "";
			$this->PGD->HrefValue = "";
			$this->PGD->TooltipValue = "";

			// DATEOFET
			$this->DATEOFET->LinkCustomAttributes = "";
			$this->DATEOFET->HrefValue = "";
			$this->DATEOFET->TooltipValue = "";

			// ET
			$this->ET->LinkCustomAttributes = "";
			$this->ET->HrefValue = "";
			$this->ET->TooltipValue = "";

			// ESET
			$this->ESET->LinkCustomAttributes = "";
			$this->ESET->HrefValue = "";
			$this->ESET->TooltipValue = "";

			// DOET
			$this->DOET->LinkCustomAttributes = "";
			$this->DOET->HrefValue = "";
			$this->DOET->TooltipValue = "";

			// SEMENPREPARATION
			$this->SEMENPREPARATION->LinkCustomAttributes = "";
			$this->SEMENPREPARATION->HrefValue = "";
			$this->SEMENPREPARATION->TooltipValue = "";

			// REASONFORESET
			$this->REASONFORESET->LinkCustomAttributes = "";
			$this->REASONFORESET->HrefValue = "";
			$this->REASONFORESET->TooltipValue = "";

			// Expectedoocytes
			$this->Expectedoocytes->LinkCustomAttributes = "";
			$this->Expectedoocytes->HrefValue = "";
			$this->Expectedoocytes->TooltipValue = "";

			// StChDate1
			$this->StChDate1->LinkCustomAttributes = "";
			$this->StChDate1->HrefValue = "";
			$this->StChDate1->TooltipValue = "";

			// StChDate2
			$this->StChDate2->LinkCustomAttributes = "";
			$this->StChDate2->HrefValue = "";
			$this->StChDate2->TooltipValue = "";

			// StChDate3
			$this->StChDate3->LinkCustomAttributes = "";
			$this->StChDate3->HrefValue = "";
			$this->StChDate3->TooltipValue = "";

			// StChDate4
			$this->StChDate4->LinkCustomAttributes = "";
			$this->StChDate4->HrefValue = "";
			$this->StChDate4->TooltipValue = "";

			// StChDate5
			$this->StChDate5->LinkCustomAttributes = "";
			$this->StChDate5->HrefValue = "";
			$this->StChDate5->TooltipValue = "";

			// StChDate6
			$this->StChDate6->LinkCustomAttributes = "";
			$this->StChDate6->HrefValue = "";
			$this->StChDate6->TooltipValue = "";

			// StChDate7
			$this->StChDate7->LinkCustomAttributes = "";
			$this->StChDate7->HrefValue = "";
			$this->StChDate7->TooltipValue = "";

			// StChDate8
			$this->StChDate8->LinkCustomAttributes = "";
			$this->StChDate8->HrefValue = "";
			$this->StChDate8->TooltipValue = "";

			// StChDate9
			$this->StChDate9->LinkCustomAttributes = "";
			$this->StChDate9->HrefValue = "";
			$this->StChDate9->TooltipValue = "";

			// StChDate10
			$this->StChDate10->LinkCustomAttributes = "";
			$this->StChDate10->HrefValue = "";
			$this->StChDate10->TooltipValue = "";

			// StChDate11
			$this->StChDate11->LinkCustomAttributes = "";
			$this->StChDate11->HrefValue = "";
			$this->StChDate11->TooltipValue = "";

			// StChDate12
			$this->StChDate12->LinkCustomAttributes = "";
			$this->StChDate12->HrefValue = "";
			$this->StChDate12->TooltipValue = "";

			// StChDate13
			$this->StChDate13->LinkCustomAttributes = "";
			$this->StChDate13->HrefValue = "";
			$this->StChDate13->TooltipValue = "";

			// CycleDay1
			$this->CycleDay1->LinkCustomAttributes = "";
			$this->CycleDay1->HrefValue = "";
			$this->CycleDay1->TooltipValue = "";

			// CycleDay2
			$this->CycleDay2->LinkCustomAttributes = "";
			$this->CycleDay2->HrefValue = "";
			$this->CycleDay2->TooltipValue = "";

			// CycleDay3
			$this->CycleDay3->LinkCustomAttributes = "";
			$this->CycleDay3->HrefValue = "";
			$this->CycleDay3->TooltipValue = "";

			// CycleDay4
			$this->CycleDay4->LinkCustomAttributes = "";
			$this->CycleDay4->HrefValue = "";
			$this->CycleDay4->TooltipValue = "";

			// CycleDay5
			$this->CycleDay5->LinkCustomAttributes = "";
			$this->CycleDay5->HrefValue = "";
			$this->CycleDay5->TooltipValue = "";

			// CycleDay6
			$this->CycleDay6->LinkCustomAttributes = "";
			$this->CycleDay6->HrefValue = "";
			$this->CycleDay6->TooltipValue = "";

			// CycleDay7
			$this->CycleDay7->LinkCustomAttributes = "";
			$this->CycleDay7->HrefValue = "";
			$this->CycleDay7->TooltipValue = "";

			// CycleDay8
			$this->CycleDay8->LinkCustomAttributes = "";
			$this->CycleDay8->HrefValue = "";
			$this->CycleDay8->TooltipValue = "";

			// CycleDay9
			$this->CycleDay9->LinkCustomAttributes = "";
			$this->CycleDay9->HrefValue = "";
			$this->CycleDay9->TooltipValue = "";

			// CycleDay10
			$this->CycleDay10->LinkCustomAttributes = "";
			$this->CycleDay10->HrefValue = "";
			$this->CycleDay10->TooltipValue = "";

			// CycleDay11
			$this->CycleDay11->LinkCustomAttributes = "";
			$this->CycleDay11->HrefValue = "";
			$this->CycleDay11->TooltipValue = "";

			// CycleDay12
			$this->CycleDay12->LinkCustomAttributes = "";
			$this->CycleDay12->HrefValue = "";
			$this->CycleDay12->TooltipValue = "";

			// CycleDay13
			$this->CycleDay13->LinkCustomAttributes = "";
			$this->CycleDay13->HrefValue = "";
			$this->CycleDay13->TooltipValue = "";

			// StimulationDay1
			$this->StimulationDay1->LinkCustomAttributes = "";
			$this->StimulationDay1->HrefValue = "";
			$this->StimulationDay1->TooltipValue = "";

			// StimulationDay2
			$this->StimulationDay2->LinkCustomAttributes = "";
			$this->StimulationDay2->HrefValue = "";
			$this->StimulationDay2->TooltipValue = "";

			// StimulationDay3
			$this->StimulationDay3->LinkCustomAttributes = "";
			$this->StimulationDay3->HrefValue = "";
			$this->StimulationDay3->TooltipValue = "";

			// StimulationDay4
			$this->StimulationDay4->LinkCustomAttributes = "";
			$this->StimulationDay4->HrefValue = "";
			$this->StimulationDay4->TooltipValue = "";

			// StimulationDay5
			$this->StimulationDay5->LinkCustomAttributes = "";
			$this->StimulationDay5->HrefValue = "";
			$this->StimulationDay5->TooltipValue = "";

			// StimulationDay6
			$this->StimulationDay6->LinkCustomAttributes = "";
			$this->StimulationDay6->HrefValue = "";
			$this->StimulationDay6->TooltipValue = "";

			// StimulationDay7
			$this->StimulationDay7->LinkCustomAttributes = "";
			$this->StimulationDay7->HrefValue = "";
			$this->StimulationDay7->TooltipValue = "";

			// StimulationDay8
			$this->StimulationDay8->LinkCustomAttributes = "";
			$this->StimulationDay8->HrefValue = "";
			$this->StimulationDay8->TooltipValue = "";

			// StimulationDay9
			$this->StimulationDay9->LinkCustomAttributes = "";
			$this->StimulationDay9->HrefValue = "";
			$this->StimulationDay9->TooltipValue = "";

			// StimulationDay10
			$this->StimulationDay10->LinkCustomAttributes = "";
			$this->StimulationDay10->HrefValue = "";
			$this->StimulationDay10->TooltipValue = "";

			// StimulationDay11
			$this->StimulationDay11->LinkCustomAttributes = "";
			$this->StimulationDay11->HrefValue = "";
			$this->StimulationDay11->TooltipValue = "";

			// StimulationDay12
			$this->StimulationDay12->LinkCustomAttributes = "";
			$this->StimulationDay12->HrefValue = "";
			$this->StimulationDay12->TooltipValue = "";

			// StimulationDay13
			$this->StimulationDay13->LinkCustomAttributes = "";
			$this->StimulationDay13->HrefValue = "";
			$this->StimulationDay13->TooltipValue = "";

			// Tablet1
			$this->Tablet1->LinkCustomAttributes = "";
			$this->Tablet1->HrefValue = "";
			$this->Tablet1->TooltipValue = "";

			// Tablet2
			$this->Tablet2->LinkCustomAttributes = "";
			$this->Tablet2->HrefValue = "";
			$this->Tablet2->TooltipValue = "";

			// Tablet3
			$this->Tablet3->LinkCustomAttributes = "";
			$this->Tablet3->HrefValue = "";
			$this->Tablet3->TooltipValue = "";

			// Tablet4
			$this->Tablet4->LinkCustomAttributes = "";
			$this->Tablet4->HrefValue = "";
			$this->Tablet4->TooltipValue = "";

			// Tablet5
			$this->Tablet5->LinkCustomAttributes = "";
			$this->Tablet5->HrefValue = "";
			$this->Tablet5->TooltipValue = "";

			// Tablet6
			$this->Tablet6->LinkCustomAttributes = "";
			$this->Tablet6->HrefValue = "";
			$this->Tablet6->TooltipValue = "";

			// Tablet7
			$this->Tablet7->LinkCustomAttributes = "";
			$this->Tablet7->HrefValue = "";
			$this->Tablet7->TooltipValue = "";

			// Tablet8
			$this->Tablet8->LinkCustomAttributes = "";
			$this->Tablet8->HrefValue = "";
			$this->Tablet8->TooltipValue = "";

			// Tablet9
			$this->Tablet9->LinkCustomAttributes = "";
			$this->Tablet9->HrefValue = "";
			$this->Tablet9->TooltipValue = "";

			// Tablet10
			$this->Tablet10->LinkCustomAttributes = "";
			$this->Tablet10->HrefValue = "";
			$this->Tablet10->TooltipValue = "";

			// Tablet11
			$this->Tablet11->LinkCustomAttributes = "";
			$this->Tablet11->HrefValue = "";
			$this->Tablet11->TooltipValue = "";

			// Tablet12
			$this->Tablet12->LinkCustomAttributes = "";
			$this->Tablet12->HrefValue = "";
			$this->Tablet12->TooltipValue = "";

			// Tablet13
			$this->Tablet13->LinkCustomAttributes = "";
			$this->Tablet13->HrefValue = "";
			$this->Tablet13->TooltipValue = "";

			// RFSH1
			$this->RFSH1->LinkCustomAttributes = "";
			$this->RFSH1->HrefValue = "";
			$this->RFSH1->TooltipValue = "";

			// RFSH2
			$this->RFSH2->LinkCustomAttributes = "";
			$this->RFSH2->HrefValue = "";
			$this->RFSH2->TooltipValue = "";

			// RFSH3
			$this->RFSH3->LinkCustomAttributes = "";
			$this->RFSH3->HrefValue = "";
			$this->RFSH3->TooltipValue = "";

			// RFSH4
			$this->RFSH4->LinkCustomAttributes = "";
			$this->RFSH4->HrefValue = "";
			$this->RFSH4->TooltipValue = "";

			// RFSH5
			$this->RFSH5->LinkCustomAttributes = "";
			$this->RFSH5->HrefValue = "";
			$this->RFSH5->TooltipValue = "";

			// RFSH6
			$this->RFSH6->LinkCustomAttributes = "";
			$this->RFSH6->HrefValue = "";
			$this->RFSH6->TooltipValue = "";

			// RFSH7
			$this->RFSH7->LinkCustomAttributes = "";
			$this->RFSH7->HrefValue = "";
			$this->RFSH7->TooltipValue = "";

			// RFSH8
			$this->RFSH8->LinkCustomAttributes = "";
			$this->RFSH8->HrefValue = "";
			$this->RFSH8->TooltipValue = "";

			// RFSH9
			$this->RFSH9->LinkCustomAttributes = "";
			$this->RFSH9->HrefValue = "";
			$this->RFSH9->TooltipValue = "";

			// RFSH10
			$this->RFSH10->LinkCustomAttributes = "";
			$this->RFSH10->HrefValue = "";
			$this->RFSH10->TooltipValue = "";

			// RFSH11
			$this->RFSH11->LinkCustomAttributes = "";
			$this->RFSH11->HrefValue = "";
			$this->RFSH11->TooltipValue = "";

			// RFSH12
			$this->RFSH12->LinkCustomAttributes = "";
			$this->RFSH12->HrefValue = "";
			$this->RFSH12->TooltipValue = "";

			// RFSH13
			$this->RFSH13->LinkCustomAttributes = "";
			$this->RFSH13->HrefValue = "";
			$this->RFSH13->TooltipValue = "";

			// HMG1
			$this->HMG1->LinkCustomAttributes = "";
			$this->HMG1->HrefValue = "";
			$this->HMG1->TooltipValue = "";

			// HMG2
			$this->HMG2->LinkCustomAttributes = "";
			$this->HMG2->HrefValue = "";
			$this->HMG2->TooltipValue = "";

			// HMG3
			$this->HMG3->LinkCustomAttributes = "";
			$this->HMG3->HrefValue = "";
			$this->HMG3->TooltipValue = "";

			// HMG4
			$this->HMG4->LinkCustomAttributes = "";
			$this->HMG4->HrefValue = "";
			$this->HMG4->TooltipValue = "";

			// HMG5
			$this->HMG5->LinkCustomAttributes = "";
			$this->HMG5->HrefValue = "";
			$this->HMG5->TooltipValue = "";

			// HMG6
			$this->HMG6->LinkCustomAttributes = "";
			$this->HMG6->HrefValue = "";
			$this->HMG6->TooltipValue = "";

			// HMG7
			$this->HMG7->LinkCustomAttributes = "";
			$this->HMG7->HrefValue = "";
			$this->HMG7->TooltipValue = "";

			// HMG8
			$this->HMG8->LinkCustomAttributes = "";
			$this->HMG8->HrefValue = "";
			$this->HMG8->TooltipValue = "";

			// HMG9
			$this->HMG9->LinkCustomAttributes = "";
			$this->HMG9->HrefValue = "";
			$this->HMG9->TooltipValue = "";

			// HMG10
			$this->HMG10->LinkCustomAttributes = "";
			$this->HMG10->HrefValue = "";
			$this->HMG10->TooltipValue = "";

			// HMG11
			$this->HMG11->LinkCustomAttributes = "";
			$this->HMG11->HrefValue = "";
			$this->HMG11->TooltipValue = "";

			// HMG12
			$this->HMG12->LinkCustomAttributes = "";
			$this->HMG12->HrefValue = "";
			$this->HMG12->TooltipValue = "";

			// HMG13
			$this->HMG13->LinkCustomAttributes = "";
			$this->HMG13->HrefValue = "";
			$this->HMG13->TooltipValue = "";

			// GnRH1
			$this->GnRH1->LinkCustomAttributes = "";
			$this->GnRH1->HrefValue = "";
			$this->GnRH1->TooltipValue = "";

			// GnRH2
			$this->GnRH2->LinkCustomAttributes = "";
			$this->GnRH2->HrefValue = "";
			$this->GnRH2->TooltipValue = "";

			// GnRH3
			$this->GnRH3->LinkCustomAttributes = "";
			$this->GnRH3->HrefValue = "";
			$this->GnRH3->TooltipValue = "";

			// GnRH4
			$this->GnRH4->LinkCustomAttributes = "";
			$this->GnRH4->HrefValue = "";
			$this->GnRH4->TooltipValue = "";

			// GnRH5
			$this->GnRH5->LinkCustomAttributes = "";
			$this->GnRH5->HrefValue = "";
			$this->GnRH5->TooltipValue = "";

			// GnRH6
			$this->GnRH6->LinkCustomAttributes = "";
			$this->GnRH6->HrefValue = "";
			$this->GnRH6->TooltipValue = "";

			// GnRH7
			$this->GnRH7->LinkCustomAttributes = "";
			$this->GnRH7->HrefValue = "";
			$this->GnRH7->TooltipValue = "";

			// GnRH8
			$this->GnRH8->LinkCustomAttributes = "";
			$this->GnRH8->HrefValue = "";
			$this->GnRH8->TooltipValue = "";

			// GnRH9
			$this->GnRH9->LinkCustomAttributes = "";
			$this->GnRH9->HrefValue = "";
			$this->GnRH9->TooltipValue = "";

			// GnRH10
			$this->GnRH10->LinkCustomAttributes = "";
			$this->GnRH10->HrefValue = "";
			$this->GnRH10->TooltipValue = "";

			// GnRH11
			$this->GnRH11->LinkCustomAttributes = "";
			$this->GnRH11->HrefValue = "";
			$this->GnRH11->TooltipValue = "";

			// GnRH12
			$this->GnRH12->LinkCustomAttributes = "";
			$this->GnRH12->HrefValue = "";
			$this->GnRH12->TooltipValue = "";

			// GnRH13
			$this->GnRH13->LinkCustomAttributes = "";
			$this->GnRH13->HrefValue = "";
			$this->GnRH13->TooltipValue = "";

			// E21
			$this->E21->LinkCustomAttributes = "";
			$this->E21->HrefValue = "";
			$this->E21->TooltipValue = "";

			// E22
			$this->E22->LinkCustomAttributes = "";
			$this->E22->HrefValue = "";
			$this->E22->TooltipValue = "";

			// E23
			$this->E23->LinkCustomAttributes = "";
			$this->E23->HrefValue = "";
			$this->E23->TooltipValue = "";

			// E24
			$this->E24->LinkCustomAttributes = "";
			$this->E24->HrefValue = "";
			$this->E24->TooltipValue = "";

			// E25
			$this->E25->LinkCustomAttributes = "";
			$this->E25->HrefValue = "";
			$this->E25->TooltipValue = "";

			// E26
			$this->E26->LinkCustomAttributes = "";
			$this->E26->HrefValue = "";
			$this->E26->TooltipValue = "";

			// E27
			$this->E27->LinkCustomAttributes = "";
			$this->E27->HrefValue = "";
			$this->E27->TooltipValue = "";

			// E28
			$this->E28->LinkCustomAttributes = "";
			$this->E28->HrefValue = "";
			$this->E28->TooltipValue = "";

			// E29
			$this->E29->LinkCustomAttributes = "";
			$this->E29->HrefValue = "";
			$this->E29->TooltipValue = "";

			// E210
			$this->E210->LinkCustomAttributes = "";
			$this->E210->HrefValue = "";
			$this->E210->TooltipValue = "";

			// E211
			$this->E211->LinkCustomAttributes = "";
			$this->E211->HrefValue = "";
			$this->E211->TooltipValue = "";

			// E212
			$this->E212->LinkCustomAttributes = "";
			$this->E212->HrefValue = "";
			$this->E212->TooltipValue = "";

			// E213
			$this->E213->LinkCustomAttributes = "";
			$this->E213->HrefValue = "";
			$this->E213->TooltipValue = "";

			// P41
			$this->P41->LinkCustomAttributes = "";
			$this->P41->HrefValue = "";
			$this->P41->TooltipValue = "";

			// P42
			$this->P42->LinkCustomAttributes = "";
			$this->P42->HrefValue = "";
			$this->P42->TooltipValue = "";

			// P43
			$this->P43->LinkCustomAttributes = "";
			$this->P43->HrefValue = "";
			$this->P43->TooltipValue = "";

			// P44
			$this->P44->LinkCustomAttributes = "";
			$this->P44->HrefValue = "";
			$this->P44->TooltipValue = "";

			// P45
			$this->P45->LinkCustomAttributes = "";
			$this->P45->HrefValue = "";
			$this->P45->TooltipValue = "";

			// P46
			$this->P46->LinkCustomAttributes = "";
			$this->P46->HrefValue = "";
			$this->P46->TooltipValue = "";

			// P47
			$this->P47->LinkCustomAttributes = "";
			$this->P47->HrefValue = "";
			$this->P47->TooltipValue = "";

			// P48
			$this->P48->LinkCustomAttributes = "";
			$this->P48->HrefValue = "";
			$this->P48->TooltipValue = "";

			// P49
			$this->P49->LinkCustomAttributes = "";
			$this->P49->HrefValue = "";
			$this->P49->TooltipValue = "";

			// P410
			$this->P410->LinkCustomAttributes = "";
			$this->P410->HrefValue = "";
			$this->P410->TooltipValue = "";

			// P411
			$this->P411->LinkCustomAttributes = "";
			$this->P411->HrefValue = "";
			$this->P411->TooltipValue = "";

			// P412
			$this->P412->LinkCustomAttributes = "";
			$this->P412->HrefValue = "";
			$this->P412->TooltipValue = "";

			// P413
			$this->P413->LinkCustomAttributes = "";
			$this->P413->HrefValue = "";
			$this->P413->TooltipValue = "";

			// USGRt1
			$this->USGRt1->LinkCustomAttributes = "";
			$this->USGRt1->HrefValue = "";
			$this->USGRt1->TooltipValue = "";

			// USGRt2
			$this->USGRt2->LinkCustomAttributes = "";
			$this->USGRt2->HrefValue = "";
			$this->USGRt2->TooltipValue = "";

			// USGRt3
			$this->USGRt3->LinkCustomAttributes = "";
			$this->USGRt3->HrefValue = "";
			$this->USGRt3->TooltipValue = "";

			// USGRt4
			$this->USGRt4->LinkCustomAttributes = "";
			$this->USGRt4->HrefValue = "";
			$this->USGRt4->TooltipValue = "";

			// USGRt5
			$this->USGRt5->LinkCustomAttributes = "";
			$this->USGRt5->HrefValue = "";
			$this->USGRt5->TooltipValue = "";

			// USGRt6
			$this->USGRt6->LinkCustomAttributes = "";
			$this->USGRt6->HrefValue = "";
			$this->USGRt6->TooltipValue = "";

			// USGRt7
			$this->USGRt7->LinkCustomAttributes = "";
			$this->USGRt7->HrefValue = "";
			$this->USGRt7->TooltipValue = "";

			// USGRt8
			$this->USGRt8->LinkCustomAttributes = "";
			$this->USGRt8->HrefValue = "";
			$this->USGRt8->TooltipValue = "";

			// USGRt9
			$this->USGRt9->LinkCustomAttributes = "";
			$this->USGRt9->HrefValue = "";
			$this->USGRt9->TooltipValue = "";

			// USGRt10
			$this->USGRt10->LinkCustomAttributes = "";
			$this->USGRt10->HrefValue = "";
			$this->USGRt10->TooltipValue = "";

			// USGRt11
			$this->USGRt11->LinkCustomAttributes = "";
			$this->USGRt11->HrefValue = "";
			$this->USGRt11->TooltipValue = "";

			// USGRt12
			$this->USGRt12->LinkCustomAttributes = "";
			$this->USGRt12->HrefValue = "";
			$this->USGRt12->TooltipValue = "";

			// USGRt13
			$this->USGRt13->LinkCustomAttributes = "";
			$this->USGRt13->HrefValue = "";
			$this->USGRt13->TooltipValue = "";

			// USGLt1
			$this->USGLt1->LinkCustomAttributes = "";
			$this->USGLt1->HrefValue = "";
			$this->USGLt1->TooltipValue = "";

			// USGLt2
			$this->USGLt2->LinkCustomAttributes = "";
			$this->USGLt2->HrefValue = "";
			$this->USGLt2->TooltipValue = "";

			// USGLt3
			$this->USGLt3->LinkCustomAttributes = "";
			$this->USGLt3->HrefValue = "";
			$this->USGLt3->TooltipValue = "";

			// USGLt4
			$this->USGLt4->LinkCustomAttributes = "";
			$this->USGLt4->HrefValue = "";
			$this->USGLt4->TooltipValue = "";

			// USGLt5
			$this->USGLt5->LinkCustomAttributes = "";
			$this->USGLt5->HrefValue = "";
			$this->USGLt5->TooltipValue = "";

			// USGLt6
			$this->USGLt6->LinkCustomAttributes = "";
			$this->USGLt6->HrefValue = "";
			$this->USGLt6->TooltipValue = "";

			// USGLt7
			$this->USGLt7->LinkCustomAttributes = "";
			$this->USGLt7->HrefValue = "";
			$this->USGLt7->TooltipValue = "";

			// USGLt8
			$this->USGLt8->LinkCustomAttributes = "";
			$this->USGLt8->HrefValue = "";
			$this->USGLt8->TooltipValue = "";

			// USGLt9
			$this->USGLt9->LinkCustomAttributes = "";
			$this->USGLt9->HrefValue = "";
			$this->USGLt9->TooltipValue = "";

			// USGLt10
			$this->USGLt10->LinkCustomAttributes = "";
			$this->USGLt10->HrefValue = "";
			$this->USGLt10->TooltipValue = "";

			// USGLt11
			$this->USGLt11->LinkCustomAttributes = "";
			$this->USGLt11->HrefValue = "";
			$this->USGLt11->TooltipValue = "";

			// USGLt12
			$this->USGLt12->LinkCustomAttributes = "";
			$this->USGLt12->HrefValue = "";
			$this->USGLt12->TooltipValue = "";

			// USGLt13
			$this->USGLt13->LinkCustomAttributes = "";
			$this->USGLt13->HrefValue = "";
			$this->USGLt13->TooltipValue = "";

			// EM1
			$this->EM1->LinkCustomAttributes = "";
			$this->EM1->HrefValue = "";
			$this->EM1->TooltipValue = "";

			// EM2
			$this->EM2->LinkCustomAttributes = "";
			$this->EM2->HrefValue = "";
			$this->EM2->TooltipValue = "";

			// EM3
			$this->EM3->LinkCustomAttributes = "";
			$this->EM3->HrefValue = "";
			$this->EM3->TooltipValue = "";

			// EM4
			$this->EM4->LinkCustomAttributes = "";
			$this->EM4->HrefValue = "";
			$this->EM4->TooltipValue = "";

			// EM5
			$this->EM5->LinkCustomAttributes = "";
			$this->EM5->HrefValue = "";
			$this->EM5->TooltipValue = "";

			// EM6
			$this->EM6->LinkCustomAttributes = "";
			$this->EM6->HrefValue = "";
			$this->EM6->TooltipValue = "";

			// EM7
			$this->EM7->LinkCustomAttributes = "";
			$this->EM7->HrefValue = "";
			$this->EM7->TooltipValue = "";

			// EM8
			$this->EM8->LinkCustomAttributes = "";
			$this->EM8->HrefValue = "";
			$this->EM8->TooltipValue = "";

			// EM9
			$this->EM9->LinkCustomAttributes = "";
			$this->EM9->HrefValue = "";
			$this->EM9->TooltipValue = "";

			// EM10
			$this->EM10->LinkCustomAttributes = "";
			$this->EM10->HrefValue = "";
			$this->EM10->TooltipValue = "";

			// EM11
			$this->EM11->LinkCustomAttributes = "";
			$this->EM11->HrefValue = "";
			$this->EM11->TooltipValue = "";

			// EM12
			$this->EM12->LinkCustomAttributes = "";
			$this->EM12->HrefValue = "";
			$this->EM12->TooltipValue = "";

			// EM13
			$this->EM13->LinkCustomAttributes = "";
			$this->EM13->HrefValue = "";
			$this->EM13->TooltipValue = "";

			// Others1
			$this->Others1->LinkCustomAttributes = "";
			$this->Others1->HrefValue = "";
			$this->Others1->TooltipValue = "";

			// Others2
			$this->Others2->LinkCustomAttributes = "";
			$this->Others2->HrefValue = "";
			$this->Others2->TooltipValue = "";

			// Others3
			$this->Others3->LinkCustomAttributes = "";
			$this->Others3->HrefValue = "";
			$this->Others3->TooltipValue = "";

			// Others4
			$this->Others4->LinkCustomAttributes = "";
			$this->Others4->HrefValue = "";
			$this->Others4->TooltipValue = "";

			// Others5
			$this->Others5->LinkCustomAttributes = "";
			$this->Others5->HrefValue = "";
			$this->Others5->TooltipValue = "";

			// Others6
			$this->Others6->LinkCustomAttributes = "";
			$this->Others6->HrefValue = "";
			$this->Others6->TooltipValue = "";

			// Others7
			$this->Others7->LinkCustomAttributes = "";
			$this->Others7->HrefValue = "";
			$this->Others7->TooltipValue = "";

			// Others8
			$this->Others8->LinkCustomAttributes = "";
			$this->Others8->HrefValue = "";
			$this->Others8->TooltipValue = "";

			// Others9
			$this->Others9->LinkCustomAttributes = "";
			$this->Others9->HrefValue = "";
			$this->Others9->TooltipValue = "";

			// Others10
			$this->Others10->LinkCustomAttributes = "";
			$this->Others10->HrefValue = "";
			$this->Others10->TooltipValue = "";

			// Others11
			$this->Others11->LinkCustomAttributes = "";
			$this->Others11->HrefValue = "";
			$this->Others11->TooltipValue = "";

			// Others12
			$this->Others12->LinkCustomAttributes = "";
			$this->Others12->HrefValue = "";
			$this->Others12->TooltipValue = "";

			// Others13
			$this->Others13->LinkCustomAttributes = "";
			$this->Others13->HrefValue = "";
			$this->Others13->TooltipValue = "";

			// DR1
			$this->DR1->LinkCustomAttributes = "";
			$this->DR1->HrefValue = "";
			$this->DR1->TooltipValue = "";

			// DR2
			$this->DR2->LinkCustomAttributes = "";
			$this->DR2->HrefValue = "";
			$this->DR2->TooltipValue = "";

			// DR3
			$this->DR3->LinkCustomAttributes = "";
			$this->DR3->HrefValue = "";
			$this->DR3->TooltipValue = "";

			// DR4
			$this->DR4->LinkCustomAttributes = "";
			$this->DR4->HrefValue = "";
			$this->DR4->TooltipValue = "";

			// DR5
			$this->DR5->LinkCustomAttributes = "";
			$this->DR5->HrefValue = "";
			$this->DR5->TooltipValue = "";

			// DR6
			$this->DR6->LinkCustomAttributes = "";
			$this->DR6->HrefValue = "";
			$this->DR6->TooltipValue = "";

			// DR7
			$this->DR7->LinkCustomAttributes = "";
			$this->DR7->HrefValue = "";
			$this->DR7->TooltipValue = "";

			// DR8
			$this->DR8->LinkCustomAttributes = "";
			$this->DR8->HrefValue = "";
			$this->DR8->TooltipValue = "";

			// DR9
			$this->DR9->LinkCustomAttributes = "";
			$this->DR9->HrefValue = "";
			$this->DR9->TooltipValue = "";

			// DR10
			$this->DR10->LinkCustomAttributes = "";
			$this->DR10->HrefValue = "";
			$this->DR10->TooltipValue = "";

			// DR11
			$this->DR11->LinkCustomAttributes = "";
			$this->DR11->HrefValue = "";
			$this->DR11->TooltipValue = "";

			// DR12
			$this->DR12->LinkCustomAttributes = "";
			$this->DR12->HrefValue = "";
			$this->DR12->TooltipValue = "";

			// DR13
			$this->DR13->LinkCustomAttributes = "";
			$this->DR13->HrefValue = "";
			$this->DR13->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// Convert
			$this->Convert->LinkCustomAttributes = "";
			$this->Convert->HrefValue = "";
			$this->Convert->TooltipValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";
			$this->Consultant->TooltipValue = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->LinkCustomAttributes = "";
			$this->InseminatinTechnique->HrefValue = "";
			$this->InseminatinTechnique->TooltipValue = "";

			// IndicationForART
			$this->IndicationForART->LinkCustomAttributes = "";
			$this->IndicationForART->HrefValue = "";
			$this->IndicationForART->TooltipValue = "";

			// Hysteroscopy
			$this->Hysteroscopy->LinkCustomAttributes = "";
			$this->Hysteroscopy->HrefValue = "";
			$this->Hysteroscopy->TooltipValue = "";

			// EndometrialScratching
			$this->EndometrialScratching->LinkCustomAttributes = "";
			$this->EndometrialScratching->HrefValue = "";
			$this->EndometrialScratching->TooltipValue = "";

			// TrialCannulation
			$this->TrialCannulation->LinkCustomAttributes = "";
			$this->TrialCannulation->HrefValue = "";
			$this->TrialCannulation->TooltipValue = "";

			// CYCLETYPE
			$this->CYCLETYPE->LinkCustomAttributes = "";
			$this->CYCLETYPE->HrefValue = "";
			$this->CYCLETYPE->TooltipValue = "";

			// HRTCYCLE
			$this->HRTCYCLE->LinkCustomAttributes = "";
			$this->HRTCYCLE->HrefValue = "";
			$this->HRTCYCLE->TooltipValue = "";

			// OralEstrogenDosage
			$this->OralEstrogenDosage->LinkCustomAttributes = "";
			$this->OralEstrogenDosage->HrefValue = "";
			$this->OralEstrogenDosage->TooltipValue = "";

			// VaginalEstrogen
			$this->VaginalEstrogen->LinkCustomAttributes = "";
			$this->VaginalEstrogen->HrefValue = "";
			$this->VaginalEstrogen->TooltipValue = "";

			// GCSF
			$this->GCSF->LinkCustomAttributes = "";
			$this->GCSF->HrefValue = "";
			$this->GCSF->TooltipValue = "";

			// ActivatedPRP
			$this->ActivatedPRP->LinkCustomAttributes = "";
			$this->ActivatedPRP->HrefValue = "";
			$this->ActivatedPRP->TooltipValue = "";

			// UCLcm
			$this->UCLcm->LinkCustomAttributes = "";
			$this->UCLcm->HrefValue = "";
			$this->UCLcm->TooltipValue = "";

			// DATOFEMBRYOTRANSFER
			$this->DATOFEMBRYOTRANSFER->LinkCustomAttributes = "";
			$this->DATOFEMBRYOTRANSFER->HrefValue = "";
			$this->DATOFEMBRYOTRANSFER->TooltipValue = "";

			// DAYOFEMBRYOTRANSFER
			$this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
			$this->DAYOFEMBRYOTRANSFER->HrefValue = "";
			$this->DAYOFEMBRYOTRANSFER->TooltipValue = "";

			// NOOFEMBRYOSTHAWED
			$this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
			$this->NOOFEMBRYOSTHAWED->HrefValue = "";
			$this->NOOFEMBRYOSTHAWED->TooltipValue = "";

			// NOOFEMBRYOSTRANSFERRED
			$this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
			$this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";
			$this->NOOFEMBRYOSTRANSFERRED->TooltipValue = "";

			// DAYOFEMBRYOS
			$this->DAYOFEMBRYOS->LinkCustomAttributes = "";
			$this->DAYOFEMBRYOS->HrefValue = "";
			$this->DAYOFEMBRYOS->TooltipValue = "";

			// CRYOPRESERVEDEMBRYOS
			$this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
			$this->CRYOPRESERVEDEMBRYOS->HrefValue = "";
			$this->CRYOPRESERVEDEMBRYOS->TooltipValue = "";

			// ViaAdmin
			$this->ViaAdmin->LinkCustomAttributes = "";
			$this->ViaAdmin->HrefValue = "";
			$this->ViaAdmin->TooltipValue = "";

			// ViaStartDateTime
			$this->ViaStartDateTime->LinkCustomAttributes = "";
			$this->ViaStartDateTime->HrefValue = "";
			$this->ViaStartDateTime->TooltipValue = "";

			// ViaDose
			$this->ViaDose->LinkCustomAttributes = "";
			$this->ViaDose->HrefValue = "";
			$this->ViaDose->TooltipValue = "";

			// AllFreeze
			$this->AllFreeze->LinkCustomAttributes = "";
			$this->AllFreeze->HrefValue = "";
			$this->AllFreeze->TooltipValue = "";

			// TreatmentCancel
			$this->TreatmentCancel->LinkCustomAttributes = "";
			$this->TreatmentCancel->HrefValue = "";
			$this->TreatmentCancel->TooltipValue = "";

			// ProgesteroneAdmin
			$this->ProgesteroneAdmin->LinkCustomAttributes = "";
			$this->ProgesteroneAdmin->HrefValue = "";
			$this->ProgesteroneAdmin->TooltipValue = "";

			// ProgesteroneStart
			$this->ProgesteroneStart->LinkCustomAttributes = "";
			$this->ProgesteroneStart->HrefValue = "";
			$this->ProgesteroneStart->TooltipValue = "";

			// ProgesteroneDose
			$this->ProgesteroneDose->LinkCustomAttributes = "";
			$this->ProgesteroneDose->HrefValue = "";
			$this->ProgesteroneDose->TooltipValue = "";

			// StChDate14
			$this->StChDate14->LinkCustomAttributes = "";
			$this->StChDate14->HrefValue = "";
			$this->StChDate14->TooltipValue = "";

			// StChDate15
			$this->StChDate15->LinkCustomAttributes = "";
			$this->StChDate15->HrefValue = "";
			$this->StChDate15->TooltipValue = "";

			// StChDate16
			$this->StChDate16->LinkCustomAttributes = "";
			$this->StChDate16->HrefValue = "";
			$this->StChDate16->TooltipValue = "";

			// StChDate17
			$this->StChDate17->LinkCustomAttributes = "";
			$this->StChDate17->HrefValue = "";
			$this->StChDate17->TooltipValue = "";

			// StChDate18
			$this->StChDate18->LinkCustomAttributes = "";
			$this->StChDate18->HrefValue = "";
			$this->StChDate18->TooltipValue = "";

			// StChDate19
			$this->StChDate19->LinkCustomAttributes = "";
			$this->StChDate19->HrefValue = "";
			$this->StChDate19->TooltipValue = "";

			// StChDate20
			$this->StChDate20->LinkCustomAttributes = "";
			$this->StChDate20->HrefValue = "";
			$this->StChDate20->TooltipValue = "";

			// StChDate21
			$this->StChDate21->LinkCustomAttributes = "";
			$this->StChDate21->HrefValue = "";
			$this->StChDate21->TooltipValue = "";

			// StChDate22
			$this->StChDate22->LinkCustomAttributes = "";
			$this->StChDate22->HrefValue = "";
			$this->StChDate22->TooltipValue = "";

			// StChDate23
			$this->StChDate23->LinkCustomAttributes = "";
			$this->StChDate23->HrefValue = "";
			$this->StChDate23->TooltipValue = "";

			// StChDate24
			$this->StChDate24->LinkCustomAttributes = "";
			$this->StChDate24->HrefValue = "";
			$this->StChDate24->TooltipValue = "";

			// StChDate25
			$this->StChDate25->LinkCustomAttributes = "";
			$this->StChDate25->HrefValue = "";
			$this->StChDate25->TooltipValue = "";

			// CycleDay14
			$this->CycleDay14->LinkCustomAttributes = "";
			$this->CycleDay14->HrefValue = "";
			$this->CycleDay14->TooltipValue = "";

			// CycleDay15
			$this->CycleDay15->LinkCustomAttributes = "";
			$this->CycleDay15->HrefValue = "";
			$this->CycleDay15->TooltipValue = "";

			// CycleDay16
			$this->CycleDay16->LinkCustomAttributes = "";
			$this->CycleDay16->HrefValue = "";
			$this->CycleDay16->TooltipValue = "";

			// CycleDay17
			$this->CycleDay17->LinkCustomAttributes = "";
			$this->CycleDay17->HrefValue = "";
			$this->CycleDay17->TooltipValue = "";

			// CycleDay18
			$this->CycleDay18->LinkCustomAttributes = "";
			$this->CycleDay18->HrefValue = "";
			$this->CycleDay18->TooltipValue = "";

			// CycleDay19
			$this->CycleDay19->LinkCustomAttributes = "";
			$this->CycleDay19->HrefValue = "";
			$this->CycleDay19->TooltipValue = "";

			// CycleDay20
			$this->CycleDay20->LinkCustomAttributes = "";
			$this->CycleDay20->HrefValue = "";
			$this->CycleDay20->TooltipValue = "";

			// CycleDay21
			$this->CycleDay21->LinkCustomAttributes = "";
			$this->CycleDay21->HrefValue = "";
			$this->CycleDay21->TooltipValue = "";

			// CycleDay22
			$this->CycleDay22->LinkCustomAttributes = "";
			$this->CycleDay22->HrefValue = "";
			$this->CycleDay22->TooltipValue = "";

			// CycleDay23
			$this->CycleDay23->LinkCustomAttributes = "";
			$this->CycleDay23->HrefValue = "";
			$this->CycleDay23->TooltipValue = "";

			// CycleDay24
			$this->CycleDay24->LinkCustomAttributes = "";
			$this->CycleDay24->HrefValue = "";
			$this->CycleDay24->TooltipValue = "";

			// CycleDay25
			$this->CycleDay25->LinkCustomAttributes = "";
			$this->CycleDay25->HrefValue = "";
			$this->CycleDay25->TooltipValue = "";

			// StimulationDay14
			$this->StimulationDay14->LinkCustomAttributes = "";
			$this->StimulationDay14->HrefValue = "";
			$this->StimulationDay14->TooltipValue = "";

			// StimulationDay15
			$this->StimulationDay15->LinkCustomAttributes = "";
			$this->StimulationDay15->HrefValue = "";
			$this->StimulationDay15->TooltipValue = "";

			// StimulationDay16
			$this->StimulationDay16->LinkCustomAttributes = "";
			$this->StimulationDay16->HrefValue = "";
			$this->StimulationDay16->TooltipValue = "";

			// StimulationDay17
			$this->StimulationDay17->LinkCustomAttributes = "";
			$this->StimulationDay17->HrefValue = "";
			$this->StimulationDay17->TooltipValue = "";

			// StimulationDay18
			$this->StimulationDay18->LinkCustomAttributes = "";
			$this->StimulationDay18->HrefValue = "";
			$this->StimulationDay18->TooltipValue = "";

			// StimulationDay19
			$this->StimulationDay19->LinkCustomAttributes = "";
			$this->StimulationDay19->HrefValue = "";
			$this->StimulationDay19->TooltipValue = "";

			// StimulationDay20
			$this->StimulationDay20->LinkCustomAttributes = "";
			$this->StimulationDay20->HrefValue = "";
			$this->StimulationDay20->TooltipValue = "";

			// StimulationDay21
			$this->StimulationDay21->LinkCustomAttributes = "";
			$this->StimulationDay21->HrefValue = "";
			$this->StimulationDay21->TooltipValue = "";

			// StimulationDay22
			$this->StimulationDay22->LinkCustomAttributes = "";
			$this->StimulationDay22->HrefValue = "";
			$this->StimulationDay22->TooltipValue = "";

			// StimulationDay23
			$this->StimulationDay23->LinkCustomAttributes = "";
			$this->StimulationDay23->HrefValue = "";
			$this->StimulationDay23->TooltipValue = "";

			// StimulationDay24
			$this->StimulationDay24->LinkCustomAttributes = "";
			$this->StimulationDay24->HrefValue = "";
			$this->StimulationDay24->TooltipValue = "";

			// StimulationDay25
			$this->StimulationDay25->LinkCustomAttributes = "";
			$this->StimulationDay25->HrefValue = "";
			$this->StimulationDay25->TooltipValue = "";

			// Tablet14
			$this->Tablet14->LinkCustomAttributes = "";
			$this->Tablet14->HrefValue = "";
			$this->Tablet14->TooltipValue = "";

			// Tablet15
			$this->Tablet15->LinkCustomAttributes = "";
			$this->Tablet15->HrefValue = "";
			$this->Tablet15->TooltipValue = "";

			// Tablet16
			$this->Tablet16->LinkCustomAttributes = "";
			$this->Tablet16->HrefValue = "";
			$this->Tablet16->TooltipValue = "";

			// Tablet17
			$this->Tablet17->LinkCustomAttributes = "";
			$this->Tablet17->HrefValue = "";
			$this->Tablet17->TooltipValue = "";

			// Tablet18
			$this->Tablet18->LinkCustomAttributes = "";
			$this->Tablet18->HrefValue = "";
			$this->Tablet18->TooltipValue = "";

			// Tablet19
			$this->Tablet19->LinkCustomAttributes = "";
			$this->Tablet19->HrefValue = "";
			$this->Tablet19->TooltipValue = "";

			// Tablet20
			$this->Tablet20->LinkCustomAttributes = "";
			$this->Tablet20->HrefValue = "";
			$this->Tablet20->TooltipValue = "";

			// Tablet21
			$this->Tablet21->LinkCustomAttributes = "";
			$this->Tablet21->HrefValue = "";
			$this->Tablet21->TooltipValue = "";

			// Tablet22
			$this->Tablet22->LinkCustomAttributes = "";
			$this->Tablet22->HrefValue = "";
			$this->Tablet22->TooltipValue = "";

			// Tablet23
			$this->Tablet23->LinkCustomAttributes = "";
			$this->Tablet23->HrefValue = "";
			$this->Tablet23->TooltipValue = "";

			// Tablet24
			$this->Tablet24->LinkCustomAttributes = "";
			$this->Tablet24->HrefValue = "";
			$this->Tablet24->TooltipValue = "";

			// Tablet25
			$this->Tablet25->LinkCustomAttributes = "";
			$this->Tablet25->HrefValue = "";
			$this->Tablet25->TooltipValue = "";

			// RFSH14
			$this->RFSH14->LinkCustomAttributes = "";
			$this->RFSH14->HrefValue = "";
			$this->RFSH14->TooltipValue = "";

			// RFSH15
			$this->RFSH15->LinkCustomAttributes = "";
			$this->RFSH15->HrefValue = "";
			$this->RFSH15->TooltipValue = "";

			// RFSH16
			$this->RFSH16->LinkCustomAttributes = "";
			$this->RFSH16->HrefValue = "";
			$this->RFSH16->TooltipValue = "";

			// RFSH17
			$this->RFSH17->LinkCustomAttributes = "";
			$this->RFSH17->HrefValue = "";
			$this->RFSH17->TooltipValue = "";

			// RFSH18
			$this->RFSH18->LinkCustomAttributes = "";
			$this->RFSH18->HrefValue = "";
			$this->RFSH18->TooltipValue = "";

			// RFSH19
			$this->RFSH19->LinkCustomAttributes = "";
			$this->RFSH19->HrefValue = "";
			$this->RFSH19->TooltipValue = "";

			// RFSH20
			$this->RFSH20->LinkCustomAttributes = "";
			$this->RFSH20->HrefValue = "";
			$this->RFSH20->TooltipValue = "";

			// RFSH21
			$this->RFSH21->LinkCustomAttributes = "";
			$this->RFSH21->HrefValue = "";
			$this->RFSH21->TooltipValue = "";

			// RFSH22
			$this->RFSH22->LinkCustomAttributes = "";
			$this->RFSH22->HrefValue = "";
			$this->RFSH22->TooltipValue = "";

			// RFSH23
			$this->RFSH23->LinkCustomAttributes = "";
			$this->RFSH23->HrefValue = "";
			$this->RFSH23->TooltipValue = "";

			// RFSH24
			$this->RFSH24->LinkCustomAttributes = "";
			$this->RFSH24->HrefValue = "";
			$this->RFSH24->TooltipValue = "";

			// RFSH25
			$this->RFSH25->LinkCustomAttributes = "";
			$this->RFSH25->HrefValue = "";
			$this->RFSH25->TooltipValue = "";

			// HMG14
			$this->HMG14->LinkCustomAttributes = "";
			$this->HMG14->HrefValue = "";
			$this->HMG14->TooltipValue = "";

			// HMG15
			$this->HMG15->LinkCustomAttributes = "";
			$this->HMG15->HrefValue = "";
			$this->HMG15->TooltipValue = "";

			// HMG16
			$this->HMG16->LinkCustomAttributes = "";
			$this->HMG16->HrefValue = "";
			$this->HMG16->TooltipValue = "";

			// HMG17
			$this->HMG17->LinkCustomAttributes = "";
			$this->HMG17->HrefValue = "";
			$this->HMG17->TooltipValue = "";

			// HMG18
			$this->HMG18->LinkCustomAttributes = "";
			$this->HMG18->HrefValue = "";
			$this->HMG18->TooltipValue = "";

			// HMG19
			$this->HMG19->LinkCustomAttributes = "";
			$this->HMG19->HrefValue = "";
			$this->HMG19->TooltipValue = "";

			// HMG20
			$this->HMG20->LinkCustomAttributes = "";
			$this->HMG20->HrefValue = "";
			$this->HMG20->TooltipValue = "";

			// HMG21
			$this->HMG21->LinkCustomAttributes = "";
			$this->HMG21->HrefValue = "";
			$this->HMG21->TooltipValue = "";

			// HMG22
			$this->HMG22->LinkCustomAttributes = "";
			$this->HMG22->HrefValue = "";
			$this->HMG22->TooltipValue = "";

			// HMG23
			$this->HMG23->LinkCustomAttributes = "";
			$this->HMG23->HrefValue = "";
			$this->HMG23->TooltipValue = "";

			// HMG24
			$this->HMG24->LinkCustomAttributes = "";
			$this->HMG24->HrefValue = "";
			$this->HMG24->TooltipValue = "";

			// HMG25
			$this->HMG25->LinkCustomAttributes = "";
			$this->HMG25->HrefValue = "";
			$this->HMG25->TooltipValue = "";

			// GnRH14
			$this->GnRH14->LinkCustomAttributes = "";
			$this->GnRH14->HrefValue = "";
			$this->GnRH14->TooltipValue = "";

			// GnRH15
			$this->GnRH15->LinkCustomAttributes = "";
			$this->GnRH15->HrefValue = "";
			$this->GnRH15->TooltipValue = "";

			// GnRH16
			$this->GnRH16->LinkCustomAttributes = "";
			$this->GnRH16->HrefValue = "";
			$this->GnRH16->TooltipValue = "";

			// GnRH17
			$this->GnRH17->LinkCustomAttributes = "";
			$this->GnRH17->HrefValue = "";
			$this->GnRH17->TooltipValue = "";

			// GnRH18
			$this->GnRH18->LinkCustomAttributes = "";
			$this->GnRH18->HrefValue = "";
			$this->GnRH18->TooltipValue = "";

			// GnRH19
			$this->GnRH19->LinkCustomAttributes = "";
			$this->GnRH19->HrefValue = "";
			$this->GnRH19->TooltipValue = "";

			// GnRH20
			$this->GnRH20->LinkCustomAttributes = "";
			$this->GnRH20->HrefValue = "";
			$this->GnRH20->TooltipValue = "";

			// GnRH21
			$this->GnRH21->LinkCustomAttributes = "";
			$this->GnRH21->HrefValue = "";
			$this->GnRH21->TooltipValue = "";

			// GnRH22
			$this->GnRH22->LinkCustomAttributes = "";
			$this->GnRH22->HrefValue = "";
			$this->GnRH22->TooltipValue = "";

			// GnRH23
			$this->GnRH23->LinkCustomAttributes = "";
			$this->GnRH23->HrefValue = "";
			$this->GnRH23->TooltipValue = "";

			// GnRH24
			$this->GnRH24->LinkCustomAttributes = "";
			$this->GnRH24->HrefValue = "";
			$this->GnRH24->TooltipValue = "";

			// GnRH25
			$this->GnRH25->LinkCustomAttributes = "";
			$this->GnRH25->HrefValue = "";
			$this->GnRH25->TooltipValue = "";

			// P414
			$this->P414->LinkCustomAttributes = "";
			$this->P414->HrefValue = "";
			$this->P414->TooltipValue = "";

			// P415
			$this->P415->LinkCustomAttributes = "";
			$this->P415->HrefValue = "";
			$this->P415->TooltipValue = "";

			// P416
			$this->P416->LinkCustomAttributes = "";
			$this->P416->HrefValue = "";
			$this->P416->TooltipValue = "";

			// P417
			$this->P417->LinkCustomAttributes = "";
			$this->P417->HrefValue = "";
			$this->P417->TooltipValue = "";

			// P418
			$this->P418->LinkCustomAttributes = "";
			$this->P418->HrefValue = "";
			$this->P418->TooltipValue = "";

			// P419
			$this->P419->LinkCustomAttributes = "";
			$this->P419->HrefValue = "";
			$this->P419->TooltipValue = "";

			// P420
			$this->P420->LinkCustomAttributes = "";
			$this->P420->HrefValue = "";
			$this->P420->TooltipValue = "";

			// P421
			$this->P421->LinkCustomAttributes = "";
			$this->P421->HrefValue = "";
			$this->P421->TooltipValue = "";

			// P422
			$this->P422->LinkCustomAttributes = "";
			$this->P422->HrefValue = "";
			$this->P422->TooltipValue = "";

			// P423
			$this->P423->LinkCustomAttributes = "";
			$this->P423->HrefValue = "";
			$this->P423->TooltipValue = "";

			// P424
			$this->P424->LinkCustomAttributes = "";
			$this->P424->HrefValue = "";
			$this->P424->TooltipValue = "";

			// P425
			$this->P425->LinkCustomAttributes = "";
			$this->P425->HrefValue = "";
			$this->P425->TooltipValue = "";

			// USGRt14
			$this->USGRt14->LinkCustomAttributes = "";
			$this->USGRt14->HrefValue = "";
			$this->USGRt14->TooltipValue = "";

			// USGRt15
			$this->USGRt15->LinkCustomAttributes = "";
			$this->USGRt15->HrefValue = "";
			$this->USGRt15->TooltipValue = "";

			// USGRt16
			$this->USGRt16->LinkCustomAttributes = "";
			$this->USGRt16->HrefValue = "";
			$this->USGRt16->TooltipValue = "";

			// USGRt17
			$this->USGRt17->LinkCustomAttributes = "";
			$this->USGRt17->HrefValue = "";
			$this->USGRt17->TooltipValue = "";

			// USGRt18
			$this->USGRt18->LinkCustomAttributes = "";
			$this->USGRt18->HrefValue = "";
			$this->USGRt18->TooltipValue = "";

			// USGRt19
			$this->USGRt19->LinkCustomAttributes = "";
			$this->USGRt19->HrefValue = "";
			$this->USGRt19->TooltipValue = "";

			// USGRt20
			$this->USGRt20->LinkCustomAttributes = "";
			$this->USGRt20->HrefValue = "";
			$this->USGRt20->TooltipValue = "";

			// USGRt21
			$this->USGRt21->LinkCustomAttributes = "";
			$this->USGRt21->HrefValue = "";
			$this->USGRt21->TooltipValue = "";

			// USGRt22
			$this->USGRt22->LinkCustomAttributes = "";
			$this->USGRt22->HrefValue = "";
			$this->USGRt22->TooltipValue = "";

			// USGRt23
			$this->USGRt23->LinkCustomAttributes = "";
			$this->USGRt23->HrefValue = "";
			$this->USGRt23->TooltipValue = "";

			// USGRt24
			$this->USGRt24->LinkCustomAttributes = "";
			$this->USGRt24->HrefValue = "";
			$this->USGRt24->TooltipValue = "";

			// USGRt25
			$this->USGRt25->LinkCustomAttributes = "";
			$this->USGRt25->HrefValue = "";
			$this->USGRt25->TooltipValue = "";

			// USGLt14
			$this->USGLt14->LinkCustomAttributes = "";
			$this->USGLt14->HrefValue = "";
			$this->USGLt14->TooltipValue = "";

			// USGLt15
			$this->USGLt15->LinkCustomAttributes = "";
			$this->USGLt15->HrefValue = "";
			$this->USGLt15->TooltipValue = "";

			// USGLt16
			$this->USGLt16->LinkCustomAttributes = "";
			$this->USGLt16->HrefValue = "";
			$this->USGLt16->TooltipValue = "";

			// USGLt17
			$this->USGLt17->LinkCustomAttributes = "";
			$this->USGLt17->HrefValue = "";
			$this->USGLt17->TooltipValue = "";

			// USGLt18
			$this->USGLt18->LinkCustomAttributes = "";
			$this->USGLt18->HrefValue = "";
			$this->USGLt18->TooltipValue = "";

			// USGLt19
			$this->USGLt19->LinkCustomAttributes = "";
			$this->USGLt19->HrefValue = "";
			$this->USGLt19->TooltipValue = "";

			// USGLt20
			$this->USGLt20->LinkCustomAttributes = "";
			$this->USGLt20->HrefValue = "";
			$this->USGLt20->TooltipValue = "";

			// USGLt21
			$this->USGLt21->LinkCustomAttributes = "";
			$this->USGLt21->HrefValue = "";
			$this->USGLt21->TooltipValue = "";

			// USGLt22
			$this->USGLt22->LinkCustomAttributes = "";
			$this->USGLt22->HrefValue = "";
			$this->USGLt22->TooltipValue = "";

			// USGLt23
			$this->USGLt23->LinkCustomAttributes = "";
			$this->USGLt23->HrefValue = "";
			$this->USGLt23->TooltipValue = "";

			// USGLt24
			$this->USGLt24->LinkCustomAttributes = "";
			$this->USGLt24->HrefValue = "";
			$this->USGLt24->TooltipValue = "";

			// USGLt25
			$this->USGLt25->LinkCustomAttributes = "";
			$this->USGLt25->HrefValue = "";
			$this->USGLt25->TooltipValue = "";

			// EM14
			$this->EM14->LinkCustomAttributes = "";
			$this->EM14->HrefValue = "";
			$this->EM14->TooltipValue = "";

			// EM15
			$this->EM15->LinkCustomAttributes = "";
			$this->EM15->HrefValue = "";
			$this->EM15->TooltipValue = "";

			// EM16
			$this->EM16->LinkCustomAttributes = "";
			$this->EM16->HrefValue = "";
			$this->EM16->TooltipValue = "";

			// EM17
			$this->EM17->LinkCustomAttributes = "";
			$this->EM17->HrefValue = "";
			$this->EM17->TooltipValue = "";

			// EM18
			$this->EM18->LinkCustomAttributes = "";
			$this->EM18->HrefValue = "";
			$this->EM18->TooltipValue = "";

			// EM19
			$this->EM19->LinkCustomAttributes = "";
			$this->EM19->HrefValue = "";
			$this->EM19->TooltipValue = "";

			// EM20
			$this->EM20->LinkCustomAttributes = "";
			$this->EM20->HrefValue = "";
			$this->EM20->TooltipValue = "";

			// EM21
			$this->EM21->LinkCustomAttributes = "";
			$this->EM21->HrefValue = "";
			$this->EM21->TooltipValue = "";

			// EM22
			$this->EM22->LinkCustomAttributes = "";
			$this->EM22->HrefValue = "";
			$this->EM22->TooltipValue = "";

			// EM23
			$this->EM23->LinkCustomAttributes = "";
			$this->EM23->HrefValue = "";
			$this->EM23->TooltipValue = "";

			// EM24
			$this->EM24->LinkCustomAttributes = "";
			$this->EM24->HrefValue = "";
			$this->EM24->TooltipValue = "";

			// EM25
			$this->EM25->LinkCustomAttributes = "";
			$this->EM25->HrefValue = "";
			$this->EM25->TooltipValue = "";

			// Others14
			$this->Others14->LinkCustomAttributes = "";
			$this->Others14->HrefValue = "";
			$this->Others14->TooltipValue = "";

			// Others15
			$this->Others15->LinkCustomAttributes = "";
			$this->Others15->HrefValue = "";
			$this->Others15->TooltipValue = "";

			// Others16
			$this->Others16->LinkCustomAttributes = "";
			$this->Others16->HrefValue = "";
			$this->Others16->TooltipValue = "";

			// Others17
			$this->Others17->LinkCustomAttributes = "";
			$this->Others17->HrefValue = "";
			$this->Others17->TooltipValue = "";

			// Others18
			$this->Others18->LinkCustomAttributes = "";
			$this->Others18->HrefValue = "";
			$this->Others18->TooltipValue = "";

			// Others19
			$this->Others19->LinkCustomAttributes = "";
			$this->Others19->HrefValue = "";
			$this->Others19->TooltipValue = "";

			// Others20
			$this->Others20->LinkCustomAttributes = "";
			$this->Others20->HrefValue = "";
			$this->Others20->TooltipValue = "";

			// Others21
			$this->Others21->LinkCustomAttributes = "";
			$this->Others21->HrefValue = "";
			$this->Others21->TooltipValue = "";

			// Others22
			$this->Others22->LinkCustomAttributes = "";
			$this->Others22->HrefValue = "";
			$this->Others22->TooltipValue = "";

			// Others23
			$this->Others23->LinkCustomAttributes = "";
			$this->Others23->HrefValue = "";
			$this->Others23->TooltipValue = "";

			// Others24
			$this->Others24->LinkCustomAttributes = "";
			$this->Others24->HrefValue = "";
			$this->Others24->TooltipValue = "";

			// Others25
			$this->Others25->LinkCustomAttributes = "";
			$this->Others25->HrefValue = "";
			$this->Others25->TooltipValue = "";

			// DR14
			$this->DR14->LinkCustomAttributes = "";
			$this->DR14->HrefValue = "";
			$this->DR14->TooltipValue = "";

			// DR15
			$this->DR15->LinkCustomAttributes = "";
			$this->DR15->HrefValue = "";
			$this->DR15->TooltipValue = "";

			// DR16
			$this->DR16->LinkCustomAttributes = "";
			$this->DR16->HrefValue = "";
			$this->DR16->TooltipValue = "";

			// DR17
			$this->DR17->LinkCustomAttributes = "";
			$this->DR17->HrefValue = "";
			$this->DR17->TooltipValue = "";

			// DR18
			$this->DR18->LinkCustomAttributes = "";
			$this->DR18->HrefValue = "";
			$this->DR18->TooltipValue = "";

			// DR19
			$this->DR19->LinkCustomAttributes = "";
			$this->DR19->HrefValue = "";
			$this->DR19->TooltipValue = "";

			// DR20
			$this->DR20->LinkCustomAttributes = "";
			$this->DR20->HrefValue = "";
			$this->DR20->TooltipValue = "";

			// DR21
			$this->DR21->LinkCustomAttributes = "";
			$this->DR21->HrefValue = "";
			$this->DR21->TooltipValue = "";

			// DR22
			$this->DR22->LinkCustomAttributes = "";
			$this->DR22->HrefValue = "";
			$this->DR22->TooltipValue = "";

			// DR23
			$this->DR23->LinkCustomAttributes = "";
			$this->DR23->HrefValue = "";
			$this->DR23->TooltipValue = "";

			// DR24
			$this->DR24->LinkCustomAttributes = "";
			$this->DR24->HrefValue = "";
			$this->DR24->TooltipValue = "";

			// DR25
			$this->DR25->LinkCustomAttributes = "";
			$this->DR25->HrefValue = "";
			$this->DR25->TooltipValue = "";

			// E214
			$this->E214->LinkCustomAttributes = "";
			$this->E214->HrefValue = "";
			$this->E214->TooltipValue = "";

			// E215
			$this->E215->LinkCustomAttributes = "";
			$this->E215->HrefValue = "";
			$this->E215->TooltipValue = "";

			// E216
			$this->E216->LinkCustomAttributes = "";
			$this->E216->HrefValue = "";
			$this->E216->TooltipValue = "";

			// E217
			$this->E217->LinkCustomAttributes = "";
			$this->E217->HrefValue = "";
			$this->E217->TooltipValue = "";

			// E218
			$this->E218->LinkCustomAttributes = "";
			$this->E218->HrefValue = "";
			$this->E218->TooltipValue = "";

			// E219
			$this->E219->LinkCustomAttributes = "";
			$this->E219->HrefValue = "";
			$this->E219->TooltipValue = "";

			// E220
			$this->E220->LinkCustomAttributes = "";
			$this->E220->HrefValue = "";
			$this->E220->TooltipValue = "";

			// E221
			$this->E221->LinkCustomAttributes = "";
			$this->E221->HrefValue = "";
			$this->E221->TooltipValue = "";

			// E222
			$this->E222->LinkCustomAttributes = "";
			$this->E222->HrefValue = "";
			$this->E222->TooltipValue = "";

			// E223
			$this->E223->LinkCustomAttributes = "";
			$this->E223->HrefValue = "";
			$this->E223->TooltipValue = "";

			// E224
			$this->E224->LinkCustomAttributes = "";
			$this->E224->HrefValue = "";
			$this->E224->TooltipValue = "";

			// E225
			$this->E225->LinkCustomAttributes = "";
			$this->E225->HrefValue = "";
			$this->E225->TooltipValue = "";

			// EEETTTDTE
			$this->EEETTTDTE->LinkCustomAttributes = "";
			$this->EEETTTDTE->HrefValue = "";
			$this->EEETTTDTE->TooltipValue = "";

			// bhcgdate
			$this->bhcgdate->LinkCustomAttributes = "";
			$this->bhcgdate->HrefValue = "";
			$this->bhcgdate->TooltipValue = "";

			// TUBAL_PATENCY
			$this->TUBAL_PATENCY->LinkCustomAttributes = "";
			$this->TUBAL_PATENCY->HrefValue = "";
			$this->TUBAL_PATENCY->TooltipValue = "";

			// HSG
			$this->HSG->LinkCustomAttributes = "";
			$this->HSG->HrefValue = "";
			$this->HSG->TooltipValue = "";

			// DHL
			$this->DHL->LinkCustomAttributes = "";
			$this->DHL->HrefValue = "";
			$this->DHL->TooltipValue = "";

			// UTERINE_PROBLEMS
			$this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
			$this->UTERINE_PROBLEMS->HrefValue = "";
			$this->UTERINE_PROBLEMS->TooltipValue = "";

			// W_COMORBIDS
			$this->W_COMORBIDS->LinkCustomAttributes = "";
			$this->W_COMORBIDS->HrefValue = "";
			$this->W_COMORBIDS->TooltipValue = "";

			// H_COMORBIDS
			$this->H_COMORBIDS->LinkCustomAttributes = "";
			$this->H_COMORBIDS->HrefValue = "";
			$this->H_COMORBIDS->TooltipValue = "";

			// SEXUAL_DYSFUNCTION
			$this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
			$this->SEXUAL_DYSFUNCTION->HrefValue = "";
			$this->SEXUAL_DYSFUNCTION->TooltipValue = "";

			// TABLETS
			$this->TABLETS->LinkCustomAttributes = "";
			$this->TABLETS->HrefValue = "";
			$this->TABLETS->TooltipValue = "";

			// FOLLICLE_STATUS
			$this->FOLLICLE_STATUS->LinkCustomAttributes = "";
			$this->FOLLICLE_STATUS->HrefValue = "";
			$this->FOLLICLE_STATUS->TooltipValue = "";

			// NUMBER_OF_IUI
			$this->NUMBER_OF_IUI->LinkCustomAttributes = "";
			$this->NUMBER_OF_IUI->HrefValue = "";
			$this->NUMBER_OF_IUI->TooltipValue = "";

			// PROCEDURE
			$this->PROCEDURE->LinkCustomAttributes = "";
			$this->PROCEDURE->HrefValue = "";
			$this->PROCEDURE->TooltipValue = "";

			// LUTEAL_SUPPORT
			$this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
			$this->LUTEAL_SUPPORT->HrefValue = "";
			$this->LUTEAL_SUPPORT->TooltipValue = "";

			// SPECIFIC_MATERNAL_PROBLEMS
			$this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
			$this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";
			$this->SPECIFIC_MATERNAL_PROBLEMS->TooltipValue = "";

			// ONGOING_PREG
			$this->ONGOING_PREG->LinkCustomAttributes = "";
			$this->ONGOING_PREG->HrefValue = "";
			$this->ONGOING_PREG->TooltipValue = "";

			// EDD_Date
			$this->EDD_Date->LinkCustomAttributes = "";
			$this->EDD_Date->HrefValue = "";
			$this->EDD_Date->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		if (!$Security->canDelete()) {
			$this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];
		$conn->beginTrans();

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey != "")
					$thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
				$thisKey .= $row['id'];
				if (Config("DELETE_UPLOADED_FILES")) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = "";
				if ($deleteRows === FALSE)
					break;
				if ($key != "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}
		if ($deleteRows) {
			$conn->commitTrans(); // Commit the changes
		} else {
			$conn->rollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->RIDNO->setQueryStringValue($parm);
					$this->RIDNo->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->RIDNO->QueryStringValue);
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Name", Get("Name"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->Name->setQueryStringValue($parm);
					$this->Name->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->Name->QueryStringValue);
					$this->Name->setSessionValue($this->Name->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_id", Get("TidNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->id->setQueryStringValue($parm);
					$this->TidNo->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->id->QueryStringValue);
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->RIDNO->setFormValue($parm);
					$this->RIDNo->setFormValue($GLOBALS["ivf_treatment_plan"]->RIDNO->FormValue);
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Name", Post("Name"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->Name->setFormValue($parm);
					$this->Name->setFormValue($GLOBALS["ivf_treatment_plan"]->Name->FormValue);
					$this->Name->setSessionValue($this->Name->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_id", Post("TidNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->id->setFormValue($parm);
					$this->TidNo->setFormValue($GLOBALS["ivf_treatment_plan"]->id->FormValue);
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "ivf_treatment_plan") {
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_stimulation_chartlist.php"), "", $this->TableVar, TRUE);
		$pageId = "delete";
		$Breadcrumb->add("delete", $pageId, $url);
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
} // End class
?>