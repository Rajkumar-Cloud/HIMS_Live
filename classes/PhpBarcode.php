<?php
namespace PHPMaker2019\HIMS;

/**
 * Barcode class
 */
class PhpBarcode {
	public $Path = ""; // Path of ewbarcode.php
	public $UsePhpExcel = FALSE;
	public $UsePhpWord = FALSE;
	public static $WidthFactor = 1; // Width of a single bar element in pixels

	/**
	 * Get barcode data
	 *
	 * @param string $barcode Barcode data
	 * @param string $encode Barcode type
	 * @param integer $height Barcode height
	 * @param string $color Barcode color
	 * @return string Barcode
	 */
	public function getData($barcode, $encode, $height = 0, $color= "#000000")
	{
		$c = ($color) ? array(hexdec(substr($color,1,2)), hexdec(substr($color,3,2)), hexdec(substr($color,5,2))) : array(0,0,0);
		if ($encode == "DATAMATRIX" || $encode == "QRCODE") {
			$dm = new \TCPDF2DBarcode($barcode, $encode);
			$ar = $dm->getBarcodeArray();
			if ($height == 0)
				$height = 60; // Default height
			$h = $height / $ar["num_rows"];
			return $dm->getBarcodePngData($h, $h, $c);
		} else {
			$encode = str_replace("-", "", $encode);
			if ($encode == "ISBN")
				$encode = "EAN13";
			elseif ($encode == "CODE128" || $encode == "CODE39" || $encode == "CODE93")
				$encode = str_replace("ODE", "", $encode);
			$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
			return $generator->getBarcode($barcode, $encode, self::$WidthFactor, $height, $c);
		}
	}

	/**
	 * Write barcode
	 *
	 * @param string $barcode Barcode data
	 * @param string $encode Barcode type
	 * @param integer $height Barcode height
	 * @param string $color Barcode color
	 * @return void
	 */
	public function write($barcode, $encode, $height = 0, $color= "#000000")
	{
		$data = $this->getData($barcode, $encode, $height, $color);
		AddHeader("Content-Type", "image/png");
		AddHeader("Cache-Control", "public, must-revalidate, max-age=0"); // HTTP/1.1
		AddHeader("Pragma", "public");
		AddHeader("Expires", "Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		AddHeader("Last-Modified", gmdate("D, d M Y H:i:s") . " GMT");
		Write($data);
	}

	/**
	 * Show barcode
	 *
	 * @param string $barcode Barcode data
	 * @param string $encode Barcode type
	 * @param integer $height Barcode height
	 * @param string $color Barcode color
	 * @return string HTML tag or href value
	 */
	public function show($barcode, $encode, $height = 0, $color = "#000000") {
		global $ExportType, $CustomExportType;
		if (EmptyString($barcode))
			return "";
		if (!$ExportType || $ExportType == "print" && (!$CustomExportType || $CustomExportType == "print")) {
			$url = "data=" . urlencode($barcode) . "&amp;encode=" . urlencode($encode);
			if ($height > 0)
				$url .= "&amp;height=" . urlencode($height);
			if ($color <> "")
				$url .= "&amp;color=" . urlencode($color);
			if (IsLazy())
				return "<img class=\"ew-lazy\" src=\"data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=\" data-src=\"" . $this->Path . "?" . $url . "\" alt=\"\">";
			else
				return "<img src=\"" . $this->Path . "?" . $url . "\" alt=\"\">";
		} elseif ($ExportType == "print" && ($CustomExportType == "pdf" || $CustomExportType == "email")) {
			return "<img src=\"" . $this->getHrefValue($barcode, $encode, $height, $color, $CustomExportType) . "\">";
		} elseif ($ExportType == "excel" && $this->UsePhpExcel || $ExportType == "word" && $this->UsePhpWord) {
			return $this->getHrefValue($barcode, $encode, $height, $color, $CustomExportType);
		}
		return $barcode;
	}

	/**
	 * Get barcode as href value
	 *
	 * @param string $barcode Barcode data
	 * @param string $encode Barcode type
	 * @param integer $height Barcode height
	 * @param string $color Barcode color
	 * @param string $export Export format
	 * @return string Href value
	 */
	public function getHrefValue($barcode, $encode, $height = 0, $color = "#000000", $export = "") {
		global $TempImages;
		if (EmptyString($barcode))
			return "";
		if (!$export)
			$export = Param("export") ?: Post("exporttype");
		$format = "png";
		$folder = UploadTempPath();
		$fn = tempnam($folder, "tmp");
		$oldfn = $fn;
		rename($fn, $fn .= "." . $format);
		$data = $this->getData($barcode, $encode, $height, $color);
		file_put_contents($oldfn . "." . $format, $data);
		$tmpimage = basename($fn);
		$TempImages[] = $tmpimage;
		return TempImageLink($tmpimage, $export);
	}
}
?>