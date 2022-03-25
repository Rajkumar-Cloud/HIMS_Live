<?php
namespace PHPMaker2019\HIMS___2019;
?>
<?php
namespace PHPMaker2019\HIMS___2019;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(244, "mi_ServiceCount", $ReportLanguage->phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->menuPhrase("244", "MenuText") . $ReportLanguage->phrase("DetailSummaryReportMenuItemSuffix"), "ServiceCountsmry.php", -1, "", AllowListMenu('{55283AC9-9E27-42B1-8A30-44C43BC7CEA5}ServiceCount'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(245, "mi_ServiceCount_Chart1", $ReportLanguage->phrase("ChartReportMenuItemPrefix") . $ReportLanguage->menuPhrase("245", "MenuText") . $ReportLanguage->phrase("ChartReportMenuItemSuffix"), "ServiceCountsmry.php#cht_ServiceCount_Chart1", 244, "", AllowListMenu('{55283AC9-9E27-42B1-8A30-44C43BC7CEA5}ServiceCount'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(246, "mi_ServiceCount_Chart2", $ReportLanguage->phrase("ChartReportMenuItemPrefix") . $ReportLanguage->menuPhrase("246", "MenuText") . $ReportLanguage->phrase("ChartReportMenuItemSuffix"), "ServiceCountsmry.php#cht_ServiceCount_Chart2", 244, "", AllowListMenu('{55283AC9-9E27-42B1-8A30-44C43BC7CEA5}ServiceCount'), FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>