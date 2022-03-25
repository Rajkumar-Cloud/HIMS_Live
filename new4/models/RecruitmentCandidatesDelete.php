<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class RecruitmentCandidatesDelete extends RecruitmentCandidates
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'recruitment_candidates';

    // Page object name
    public $PageObjName = "RecruitmentCandidatesDelete";

    // Rendering View
    public $RenderingView = false;

    // Page headings
    public $Heading = "";
    public $Subheading = "";
    public $PageHeader;
    public $PageFooter;

    // Page terminated
    private $terminated = false;

    // Page heading
    public function pageHeading()
    {
        global $Language;
        if ($this->Heading != "") {
            return $this->Heading;
        }
        if (method_exists($this, "tableCaption")) {
            return $this->tableCaption();
        }
        return "";
    }

    // Page subheading
    public function pageSubheading()
    {
        global $Language;
        if ($this->Subheading != "") {
            return $this->Subheading;
        }
        if ($this->TableName) {
            return $Language->phrase($this->PageID);
        }
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
        $url = ScriptName() . "?";
        if ($this->UseTokenInUrl) {
            $url .= "t=" . $this->TableVar . "&"; // Add page token
        }
        return $url;
    }

    // Show Page Header
    public function showPageHeader()
    {
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        if ($header != "") { // Header exists, display
            echo '<p id="ew-page-header">' . $header . '</p>';
        }
    }

    // Show Page Footer
    public function showPageFooter()
    {
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        if ($footer != "") { // Footer exists, display
            echo '<p id="ew-page-footer">' . $footer . '</p>';
        }
    }

    // Validate page request
    protected function isPageRequest()
    {
        global $CurrentForm;
        if ($this->UseTokenInUrl) {
            if ($CurrentForm) {
                return ($this->TableVar == $CurrentForm->getValue("t"));
            }
            if (Get("t") !== null) {
                return ($this->TableVar == Get("t"));
            }
        }
        return true;
    }

    // Constructor
    public function __construct()
    {
        global $Language, $DashboardReport, $DebugTimer;
        global $UserTable;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (recruitment_candidates)
        if (!isset($GLOBALS["recruitment_candidates"]) || get_class($GLOBALS["recruitment_candidates"]) == PROJECT_NAMESPACE . "recruitment_candidates") {
            $GLOBALS["recruitment_candidates"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'recruitment_candidates');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");
    }

    // Get content from stream
    public function getContents($stream = null): string
    {
        global $Response;
        return is_object($Response) ? $Response->getBody() : ob_get_clean();
    }

    // Is lookup
    public function isLookup()
    {
        return SameText(Route(0), Config("API_LOOKUP_ACTION"));
    }

    // Is AutoFill
    public function isAutoFill()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autofill");
    }

    // Is AutoSuggest
    public function isAutoSuggest()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autosuggest");
    }

    // Is modal lookup
    public function isModalLookup()
    {
        return $this->isLookup() && SameText(Post("ajax"), "modal");
    }

    // Is terminated
    public function isTerminated()
    {
        return $this->terminated;
    }

    /**
     * Terminate page
     *
     * @param string $url URL for direction
     * @return void
     */
    public function terminate($url = "")
    {
        if ($this->terminated) {
            return;
        }
        global $ExportFileName, $TempImages, $DashboardReport, $Response;

        // Page is terminated
        $this->terminated = true;

         // Page Unload event
        if (method_exists($this, "pageUnload")) {
            $this->pageUnload();
        }

        // Global Page Unloaded event (in userfn*.php)
        Page_Unloaded();

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            $content = $this->getContents();
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("recruitment_candidates"));
                $doc->Text = @$content;
                if ($this->isExport("email")) {
                    echo $this->exportEmail($doc->Text);
                } else {
                    $doc->export();
                }
                DeleteTempImages(); // Delete temp images
                return;
            }
        }
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

        // Close connection
        CloseConnections();

        // Return for API
        if (IsApi()) {
            $res = $url === true;
            if (!$res) { // Show error
                WriteJson(array_merge(["success" => false], $this->getMessages()));
            }
            return;
        } else { // Check if response is JSON
            if (StartsString("application/json", $Response->getHeaderLine("Content-type")) && $Response->getBody()->getSize()) { // With JSON response
                $this->clearMessages();
                return;
            }
        }

        // Go to URL if specified
        if ($url != "") {
            if (!Config("DEBUG") && ob_get_length()) {
                ob_end_clean();
            }
            SaveDebugMessage();
            Redirect(GetUrl($url));
        }
        return; // Return to controller
    }

    // Get records from recordset
    protected function getRecordsFromRecordset($rs, $current = false)
    {
        $rows = [];
        if (is_object($rs)) { // Recordset
            while ($rs && !$rs->EOF) {
                $this->loadRowValues($rs); // Set up DbValue/CurrentValue
                $row = $this->getRecordFromArray($rs->fields);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
                $rs->moveNext();
            }
        } elseif (is_array($rs)) {
            foreach ($rs as $ar) {
                $row = $this->getRecordFromArray($ar);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
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
                if (array_key_exists($fldname, $this->Fields) && ($this->Fields[$fldname]->Visible || $this->Fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
                    $fld = &$this->Fields[$fldname];
                    if ($fld->HtmlTag == "FILE") { // Upload field
                        if (EmptyValue($val)) {
                            $row[$fldname] = null;
                        } else {
                            if ($fld->DataType == DATATYPE_BLOB) {
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))));
                                $row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
                            } elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $val)));
                                $row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
                            } else { // Multiple files
                                $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                                $ar = [];
                                foreach ($files as $file) {
                                    $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                        "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                                    if (!EmptyValue($file)) {
                                        $ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
                                    }
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
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id->Visible = false;
        }
    }
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $TotalRecords = 0;
    public $RecordCount;
    public $RecKeys = [];
    public $StartRowCount = 1;
    public $RowCount = 0;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id->setVisibility();
        $this->first_name->setVisibility();
        $this->last_name->setVisibility();
        $this->nationality->setVisibility();
        $this->birthday->setVisibility();
        $this->gender->setVisibility();
        $this->marital_status->setVisibility();
        $this->address1->setVisibility();
        $this->address2->setVisibility();
        $this->city->setVisibility();
        $this->country->setVisibility();
        $this->province->setVisibility();
        $this->postal_code->setVisibility();
        $this->_email->setVisibility();
        $this->home_phone->setVisibility();
        $this->mobile_phone->setVisibility();
        $this->cv_title->setVisibility();
        $this->cv->setVisibility();
        $this->cvtext->Visible = false;
        $this->industry->Visible = false;
        $this->profileImage->setVisibility();
        $this->head_line->Visible = false;
        $this->objective->Visible = false;
        $this->work_history->Visible = false;
        $this->education->Visible = false;
        $this->skills->Visible = false;
        $this->referees->Visible = false;
        $this->linkedInUrl->Visible = false;
        $this->linkedInData->Visible = false;
        $this->totalYearsOfExperience->setVisibility();
        $this->totalMonthsOfExperience->setVisibility();
        $this->htmlCVData->Visible = false;
        $this->generatedCVFile->setVisibility();
        $this->created->setVisibility();
        $this->updated->setVisibility();
        $this->expectedSalary->setVisibility();
        $this->preferedPositions->Visible = false;
        $this->preferedJobtype->setVisibility();
        $this->preferedCountries->Visible = false;
        $this->tags->Visible = false;
        $this->notes->Visible = false;
        $this->calls->Visible = false;
        $this->age->setVisibility();
        $this->hash->setVisibility();
        $this->linkedInProfileLink->setVisibility();
        $this->linkedInProfileId->setVisibility();
        $this->facebookProfileLink->setVisibility();
        $this->facebookProfileId->setVisibility();
        $this->twitterProfileLink->setVisibility();
        $this->twitterProfileId->setVisibility();
        $this->googleProfileLink->setVisibility();
        $this->googleProfileId->setVisibility();
        $this->hideFieldsForAddEdit();

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("RecruitmentCandidatesList"); // Prevent SQL injection, return to list
            return;
        }

        // Set up filter (WHERE Clause)
        $this->CurrentFilter = $filter;

        // Get action
        if (IsApi()) {
            $this->CurrentAction = "delete"; // Delete record directly
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action");
        } elseif (Get("action") == "1") {
            $this->CurrentAction = "delete"; // Delete record directly
        } else {
            $this->CurrentAction = "show"; // Display record
        }
        if ($this->isDelete()) {
            $this->SendEmail = true; // Send email on delete success
            if ($this->deleteRows()) { // Delete rows
                if ($this->getSuccessMessage() == "") {
                    $this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
                }
                if (IsApi()) {
                    $this->terminate(true);
                    return;
                } else {
                    $this->terminate($this->getReturnUrl()); // Return to caller
                    return;
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
            if ($this->Recordset = $this->loadRecordset()) {
                $this->TotalRecords = $this->Recordset->recordCount(); // Get record count
            }
            if ($this->TotalRecords <= 0) { // No record found, exit
                if ($this->Recordset) {
                    $this->Recordset->close();
                }
                $this->terminate("RecruitmentCandidatesList"); // Return to list
                return;
            }
        }

        // Set LoginStatus / Page_Rendering / Page_Render
        if (!IsApi() && !$this->isTerminated()) {
            // Pass table and field properties to client side
            $this->toClientVar(["tableCaption"], ["caption", "Visible", "Required", "IsInvalid", "Raw"]);

            // Setup login status
            SetupLoginStatus();

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            Page_Rendering();

            // Page Render event
            if (method_exists($this, "pageRender")) {
                $this->pageRender();
            }
        }
    }

    // Load recordset
    public function loadRecordset($offset = -1, $rowcnt = -1)
    {
        // Load List page SQL (QueryBuilder)
        $sql = $this->getListSql();

        // Load recordset
        if ($offset > -1) {
            $sql->setFirstResult($offset);
        }
        if ($rowcnt > 0) {
            $sql->setMaxResults($rowcnt);
        }
        $stmt = $sql->execute();
        $rs = new Recordset($stmt, $sql);

        // Call Recordset Selected event
        $this->recordsetSelected($rs);
        return $rs;
    }

    /**
     * Load row based on key values
     *
     * @return void
     */
    public function loadRow()
    {
        global $Security, $Language;
        $filter = $this->getRecordFilter();

        // Call Row Selecting event
        $this->rowSelecting($filter);

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $res = false;
        $row = $conn->fetchAssoc($sql);
        if ($row) {
            $res = true;
            $this->loadRowValues($row); // Load row values
        }
        return $res;
    }

    /**
     * Load row values from recordset or record
     *
     * @param Recordset|array $rs Record
     * @return void
     */
    public function loadRowValues($rs = null)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            $row = $this->newRow();
        }

        // Call Row Selected event
        $this->rowSelected($row);
        if (!$rs) {
            return;
        }
        $this->id->setDbValue($row['id']);
        $this->first_name->setDbValue($row['first_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->nationality->setDbValue($row['nationality']);
        $this->birthday->setDbValue($row['birthday']);
        $this->gender->setDbValue($row['gender']);
        $this->marital_status->setDbValue($row['marital_status']);
        $this->address1->setDbValue($row['address1']);
        $this->address2->setDbValue($row['address2']);
        $this->city->setDbValue($row['city']);
        $this->country->setDbValue($row['country']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->_email->setDbValue($row['email']);
        $this->home_phone->setDbValue($row['home_phone']);
        $this->mobile_phone->setDbValue($row['mobile_phone']);
        $this->cv_title->setDbValue($row['cv_title']);
        $this->cv->setDbValue($row['cv']);
        $this->cvtext->setDbValue($row['cvtext']);
        $this->industry->setDbValue($row['industry']);
        $this->profileImage->setDbValue($row['profileImage']);
        $this->head_line->setDbValue($row['head_line']);
        $this->objective->setDbValue($row['objective']);
        $this->work_history->setDbValue($row['work_history']);
        $this->education->setDbValue($row['education']);
        $this->skills->setDbValue($row['skills']);
        $this->referees->setDbValue($row['referees']);
        $this->linkedInUrl->setDbValue($row['linkedInUrl']);
        $this->linkedInData->setDbValue($row['linkedInData']);
        $this->totalYearsOfExperience->setDbValue($row['totalYearsOfExperience']);
        $this->totalMonthsOfExperience->setDbValue($row['totalMonthsOfExperience']);
        $this->htmlCVData->setDbValue($row['htmlCVData']);
        $this->generatedCVFile->setDbValue($row['generatedCVFile']);
        $this->created->setDbValue($row['created']);
        $this->updated->setDbValue($row['updated']);
        $this->expectedSalary->setDbValue($row['expectedSalary']);
        $this->preferedPositions->setDbValue($row['preferedPositions']);
        $this->preferedJobtype->setDbValue($row['preferedJobtype']);
        $this->preferedCountries->setDbValue($row['preferedCountries']);
        $this->tags->setDbValue($row['tags']);
        $this->notes->setDbValue($row['notes']);
        $this->calls->setDbValue($row['calls']);
        $this->age->setDbValue($row['age']);
        $this->hash->setDbValue($row['hash']);
        $this->linkedInProfileLink->setDbValue($row['linkedInProfileLink']);
        $this->linkedInProfileId->setDbValue($row['linkedInProfileId']);
        $this->facebookProfileLink->setDbValue($row['facebookProfileLink']);
        $this->facebookProfileId->setDbValue($row['facebookProfileId']);
        $this->twitterProfileLink->setDbValue($row['twitterProfileLink']);
        $this->twitterProfileId->setDbValue($row['twitterProfileId']);
        $this->googleProfileLink->setDbValue($row['googleProfileLink']);
        $this->googleProfileId->setDbValue($row['googleProfileId']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['first_name'] = null;
        $row['last_name'] = null;
        $row['nationality'] = null;
        $row['birthday'] = null;
        $row['gender'] = null;
        $row['marital_status'] = null;
        $row['address1'] = null;
        $row['address2'] = null;
        $row['city'] = null;
        $row['country'] = null;
        $row['province'] = null;
        $row['postal_code'] = null;
        $row['email'] = null;
        $row['home_phone'] = null;
        $row['mobile_phone'] = null;
        $row['cv_title'] = null;
        $row['cv'] = null;
        $row['cvtext'] = null;
        $row['industry'] = null;
        $row['profileImage'] = null;
        $row['head_line'] = null;
        $row['objective'] = null;
        $row['work_history'] = null;
        $row['education'] = null;
        $row['skills'] = null;
        $row['referees'] = null;
        $row['linkedInUrl'] = null;
        $row['linkedInData'] = null;
        $row['totalYearsOfExperience'] = null;
        $row['totalMonthsOfExperience'] = null;
        $row['htmlCVData'] = null;
        $row['generatedCVFile'] = null;
        $row['created'] = null;
        $row['updated'] = null;
        $row['expectedSalary'] = null;
        $row['preferedPositions'] = null;
        $row['preferedJobtype'] = null;
        $row['preferedCountries'] = null;
        $row['tags'] = null;
        $row['notes'] = null;
        $row['calls'] = null;
        $row['age'] = null;
        $row['hash'] = null;
        $row['linkedInProfileLink'] = null;
        $row['linkedInProfileId'] = null;
        $row['facebookProfileLink'] = null;
        $row['facebookProfileId'] = null;
        $row['twitterProfileLink'] = null;
        $row['twitterProfileId'] = null;
        $row['googleProfileLink'] = null;
        $row['googleProfileId'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // first_name

        // last_name

        // nationality

        // birthday

        // gender

        // marital_status

        // address1

        // address2

        // city

        // country

        // province

        // postal_code

        // email

        // home_phone

        // mobile_phone

        // cv_title

        // cv

        // cvtext

        // industry

        // profileImage

        // head_line

        // objective

        // work_history

        // education

        // skills

        // referees

        // linkedInUrl

        // linkedInData

        // totalYearsOfExperience

        // totalMonthsOfExperience

        // htmlCVData

        // generatedCVFile

        // created

        // updated

        // expectedSalary

        // preferedPositions

        // preferedJobtype

        // preferedCountries

        // tags

        // notes

        // calls

        // age

        // hash

        // linkedInProfileLink

        // linkedInProfileId

        // facebookProfileLink

        // facebookProfileId

        // twitterProfileLink

        // twitterProfileId

        // googleProfileLink

        // googleProfileId
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // nationality
            $this->nationality->ViewValue = $this->nationality->CurrentValue;
            $this->nationality->ViewValue = FormatNumber($this->nationality->ViewValue, 0, -2, -2, -2);
            $this->nationality->ViewCustomAttributes = "";

            // birthday
            $this->birthday->ViewValue = $this->birthday->CurrentValue;
            $this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
            $this->birthday->ViewCustomAttributes = "";

            // gender
            if (strval($this->gender->CurrentValue) != "") {
                $this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
            } else {
                $this->gender->ViewValue = null;
            }
            $this->gender->ViewCustomAttributes = "";

            // marital_status
            if (strval($this->marital_status->CurrentValue) != "") {
                $this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
            } else {
                $this->marital_status->ViewValue = null;
            }
            $this->marital_status->ViewCustomAttributes = "";

            // address1
            $this->address1->ViewValue = $this->address1->CurrentValue;
            $this->address1->ViewCustomAttributes = "";

            // address2
            $this->address2->ViewValue = $this->address2->CurrentValue;
            $this->address2->ViewCustomAttributes = "";

            // city
            $this->city->ViewValue = $this->city->CurrentValue;
            $this->city->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewValue = FormatNumber($this->province->ViewValue, 0, -2, -2, -2);
            $this->province->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // email
            $this->_email->ViewValue = $this->_email->CurrentValue;
            $this->_email->ViewCustomAttributes = "";

            // home_phone
            $this->home_phone->ViewValue = $this->home_phone->CurrentValue;
            $this->home_phone->ViewCustomAttributes = "";

            // mobile_phone
            $this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
            $this->mobile_phone->ViewCustomAttributes = "";

            // cv_title
            $this->cv_title->ViewValue = $this->cv_title->CurrentValue;
            $this->cv_title->ViewCustomAttributes = "";

            // cv
            $this->cv->ViewValue = $this->cv->CurrentValue;
            $this->cv->ViewCustomAttributes = "";

            // profileImage
            $this->profileImage->ViewValue = $this->profileImage->CurrentValue;
            $this->profileImage->ViewCustomAttributes = "";

            // totalYearsOfExperience
            $this->totalYearsOfExperience->ViewValue = $this->totalYearsOfExperience->CurrentValue;
            $this->totalYearsOfExperience->ViewValue = FormatNumber($this->totalYearsOfExperience->ViewValue, 0, -2, -2, -2);
            $this->totalYearsOfExperience->ViewCustomAttributes = "";

            // totalMonthsOfExperience
            $this->totalMonthsOfExperience->ViewValue = $this->totalMonthsOfExperience->CurrentValue;
            $this->totalMonthsOfExperience->ViewValue = FormatNumber($this->totalMonthsOfExperience->ViewValue, 0, -2, -2, -2);
            $this->totalMonthsOfExperience->ViewCustomAttributes = "";

            // generatedCVFile
            $this->generatedCVFile->ViewValue = $this->generatedCVFile->CurrentValue;
            $this->generatedCVFile->ViewCustomAttributes = "";

            // created
            $this->created->ViewValue = $this->created->CurrentValue;
            $this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
            $this->created->ViewCustomAttributes = "";

            // updated
            $this->updated->ViewValue = $this->updated->CurrentValue;
            $this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
            $this->updated->ViewCustomAttributes = "";

            // expectedSalary
            $this->expectedSalary->ViewValue = $this->expectedSalary->CurrentValue;
            $this->expectedSalary->ViewValue = FormatNumber($this->expectedSalary->ViewValue, 0, -2, -2, -2);
            $this->expectedSalary->ViewCustomAttributes = "";

            // preferedJobtype
            $this->preferedJobtype->ViewValue = $this->preferedJobtype->CurrentValue;
            $this->preferedJobtype->ViewCustomAttributes = "";

            // age
            $this->age->ViewValue = $this->age->CurrentValue;
            $this->age->ViewValue = FormatNumber($this->age->ViewValue, 0, -2, -2, -2);
            $this->age->ViewCustomAttributes = "";

            // hash
            $this->hash->ViewValue = $this->hash->CurrentValue;
            $this->hash->ViewCustomAttributes = "";

            // linkedInProfileLink
            $this->linkedInProfileLink->ViewValue = $this->linkedInProfileLink->CurrentValue;
            $this->linkedInProfileLink->ViewCustomAttributes = "";

            // linkedInProfileId
            $this->linkedInProfileId->ViewValue = $this->linkedInProfileId->CurrentValue;
            $this->linkedInProfileId->ViewCustomAttributes = "";

            // facebookProfileLink
            $this->facebookProfileLink->ViewValue = $this->facebookProfileLink->CurrentValue;
            $this->facebookProfileLink->ViewCustomAttributes = "";

            // facebookProfileId
            $this->facebookProfileId->ViewValue = $this->facebookProfileId->CurrentValue;
            $this->facebookProfileId->ViewCustomAttributes = "";

            // twitterProfileLink
            $this->twitterProfileLink->ViewValue = $this->twitterProfileLink->CurrentValue;
            $this->twitterProfileLink->ViewCustomAttributes = "";

            // twitterProfileId
            $this->twitterProfileId->ViewValue = $this->twitterProfileId->CurrentValue;
            $this->twitterProfileId->ViewCustomAttributes = "";

            // googleProfileLink
            $this->googleProfileLink->ViewValue = $this->googleProfileLink->CurrentValue;
            $this->googleProfileLink->ViewCustomAttributes = "";

            // googleProfileId
            $this->googleProfileId->ViewValue = $this->googleProfileId->CurrentValue;
            $this->googleProfileId->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // nationality
            $this->nationality->LinkCustomAttributes = "";
            $this->nationality->HrefValue = "";
            $this->nationality->TooltipValue = "";

            // birthday
            $this->birthday->LinkCustomAttributes = "";
            $this->birthday->HrefValue = "";
            $this->birthday->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // marital_status
            $this->marital_status->LinkCustomAttributes = "";
            $this->marital_status->HrefValue = "";
            $this->marital_status->TooltipValue = "";

            // address1
            $this->address1->LinkCustomAttributes = "";
            $this->address1->HrefValue = "";
            $this->address1->TooltipValue = "";

            // address2
            $this->address2->LinkCustomAttributes = "";
            $this->address2->HrefValue = "";
            $this->address2->TooltipValue = "";

            // city
            $this->city->LinkCustomAttributes = "";
            $this->city->HrefValue = "";
            $this->city->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";
            $this->_email->TooltipValue = "";

            // home_phone
            $this->home_phone->LinkCustomAttributes = "";
            $this->home_phone->HrefValue = "";
            $this->home_phone->TooltipValue = "";

            // mobile_phone
            $this->mobile_phone->LinkCustomAttributes = "";
            $this->mobile_phone->HrefValue = "";
            $this->mobile_phone->TooltipValue = "";

            // cv_title
            $this->cv_title->LinkCustomAttributes = "";
            $this->cv_title->HrefValue = "";
            $this->cv_title->TooltipValue = "";

            // cv
            $this->cv->LinkCustomAttributes = "";
            $this->cv->HrefValue = "";
            $this->cv->TooltipValue = "";

            // profileImage
            $this->profileImage->LinkCustomAttributes = "";
            $this->profileImage->HrefValue = "";
            $this->profileImage->TooltipValue = "";

            // totalYearsOfExperience
            $this->totalYearsOfExperience->LinkCustomAttributes = "";
            $this->totalYearsOfExperience->HrefValue = "";
            $this->totalYearsOfExperience->TooltipValue = "";

            // totalMonthsOfExperience
            $this->totalMonthsOfExperience->LinkCustomAttributes = "";
            $this->totalMonthsOfExperience->HrefValue = "";
            $this->totalMonthsOfExperience->TooltipValue = "";

            // generatedCVFile
            $this->generatedCVFile->LinkCustomAttributes = "";
            $this->generatedCVFile->HrefValue = "";
            $this->generatedCVFile->TooltipValue = "";

            // created
            $this->created->LinkCustomAttributes = "";
            $this->created->HrefValue = "";
            $this->created->TooltipValue = "";

            // updated
            $this->updated->LinkCustomAttributes = "";
            $this->updated->HrefValue = "";
            $this->updated->TooltipValue = "";

            // expectedSalary
            $this->expectedSalary->LinkCustomAttributes = "";
            $this->expectedSalary->HrefValue = "";
            $this->expectedSalary->TooltipValue = "";

            // preferedJobtype
            $this->preferedJobtype->LinkCustomAttributes = "";
            $this->preferedJobtype->HrefValue = "";
            $this->preferedJobtype->TooltipValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";
            $this->age->TooltipValue = "";

            // hash
            $this->hash->LinkCustomAttributes = "";
            $this->hash->HrefValue = "";
            $this->hash->TooltipValue = "";

            // linkedInProfileLink
            $this->linkedInProfileLink->LinkCustomAttributes = "";
            $this->linkedInProfileLink->HrefValue = "";
            $this->linkedInProfileLink->TooltipValue = "";

            // linkedInProfileId
            $this->linkedInProfileId->LinkCustomAttributes = "";
            $this->linkedInProfileId->HrefValue = "";
            $this->linkedInProfileId->TooltipValue = "";

            // facebookProfileLink
            $this->facebookProfileLink->LinkCustomAttributes = "";
            $this->facebookProfileLink->HrefValue = "";
            $this->facebookProfileLink->TooltipValue = "";

            // facebookProfileId
            $this->facebookProfileId->LinkCustomAttributes = "";
            $this->facebookProfileId->HrefValue = "";
            $this->facebookProfileId->TooltipValue = "";

            // twitterProfileLink
            $this->twitterProfileLink->LinkCustomAttributes = "";
            $this->twitterProfileLink->HrefValue = "";
            $this->twitterProfileLink->TooltipValue = "";

            // twitterProfileId
            $this->twitterProfileId->LinkCustomAttributes = "";
            $this->twitterProfileId->HrefValue = "";
            $this->twitterProfileId->TooltipValue = "";

            // googleProfileLink
            $this->googleProfileLink->LinkCustomAttributes = "";
            $this->googleProfileLink->HrefValue = "";
            $this->googleProfileLink->TooltipValue = "";

            // googleProfileId
            $this->googleProfileId->LinkCustomAttributes = "";
            $this->googleProfileId->HrefValue = "";
            $this->googleProfileId->TooltipValue = "";
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Delete records based on current filter
    protected function deleteRows()
    {
        global $Language, $Security;
        if (!$Security->canDelete()) {
            $this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
            return false;
        }
        $deleteRows = true;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $rows = $conn->fetchAll($sql);
        if (count($rows) == 0) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
            return false;
        }
        $conn->beginTransaction();

        // Clone old rows
        $rsold = $rows;

        // Call row deleting event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $deleteRows = $this->rowDeleting($row);
                if (!$deleteRows) {
                    break;
                }
            }
        }
        if ($deleteRows) {
            $key = "";
            foreach ($rsold as $row) {
                $thisKey = "";
                if ($thisKey != "") {
                    $thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
                }
                $thisKey .= $row['id'];
                if (Config("DELETE_UPLOADED_FILES")) { // Delete old files
                    $this->deleteUploadedFiles($row);
                }
                $deleteRows = $this->delete($row); // Delete
                if ($deleteRows === false) {
                    break;
                }
                if ($key != "") {
                    $key .= ", ";
                }
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
            $conn->commit(); // Commit the changes
        } else {
            $conn->rollback(); // Rollback changes
        }

        // Call Row Deleted event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $this->rowDeleted($row);
            }
        }

        // Write JSON for API request
        if (IsApi() && $deleteRows) {
            $row = $this->getRecordsFromRecordset($rsold);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $deleteRows;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("RecruitmentCandidatesList"), "", $this->TableVar, true);
        $pageId = "delete";
        $Breadcrumb->add("delete", $pageId, $url);
    }

    // Setup lookup options
    public function setupLookupOptions($fld)
    {
        if ($fld->Lookup !== null && $fld->Lookup->Options === null) {
            // Get default connection and filter
            $conn = $this->getConnection();
            $lookupFilter = "";

            // No need to check any more
            $fld->Lookup->Options = [];

            // Set up lookup SQL and connection
            switch ($fld->FieldVar) {
                case "x_gender":
                    break;
                case "x_marital_status":
                    break;
                default:
                    $lookupFilter = "";
                    break;
            }

            // Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
            $sql = $fld->Lookup->getSql(false, "", $lookupFilter, $this);

            // Set up lookup cache
            if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
                $totalCnt = $this->getRecordCount($sql, $conn);
                if ($totalCnt > $fld->LookupCacheCount) { // Total count > cache count, do not cache
                    return;
                }
                $rows = $conn->executeQuery($sql)->fetchAll(\PDO::FETCH_BOTH);
                $ar = [];
                foreach ($rows as $row) {
                    $row = $fld->Lookup->renderViewRow($row);
                    $ar[strval($row[0])] = $row;
                }
                $fld->Lookup->Options = $ar;
            }
        }
    }

    // Page Load event
    public function pageLoad()
    {
        //Log("Page Load");
    }

    // Page Unload event
    public function pageUnload()
    {
        //Log("Page Unload");
    }

    // Page Redirecting event
    public function pageRedirecting(&$url)
    {
        // Example:
        //$url = "your URL";
    }

    // Message Showing event
    // $type = ''|'success'|'failure'|'warning'
    public function messageShowing(&$msg, $type)
    {
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
    public function pageRender()
    {
        //Log("Page Render");
    }

    // Page Data Rendering event
    public function pageDataRendering(&$header)
    {
        // Example:
        //$header = "your header";
    }

    // Page Data Rendered event
    public function pageDataRendered(&$footer)
    {
        // Example:
        //$footer = "your footer";
    }
}
