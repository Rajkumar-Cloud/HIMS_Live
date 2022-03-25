<?php

namespace PHPMaker2021\HIMS;

// Page object
$Camera = &$Page;
?>

<div id="screenshot" style="text-align:center;">
  <video class="videostream" autoplay></video>
  <img id="screenshot-img">
  <p><button class="capture-button">Capture video</button>
  <p><button id="screenshot-button" disabled>Take screenshot</button></p>
</div>

<form action="upload.php" method="post" enctype="multipart/form-data">

<device type="media" onchange="update(this.data)"></device>
<video autoplay></video>



<script>



	
function handleError(error) {
  console.error('navigator.getUserMedia error: ', error);
}
const constraints = {video: true};

(function() {
  const video = document.querySelector('#basic video');
  const captureVideoButton = document.querySelector('#basic .capture-button');
  let localMediaStream;

  function handleSuccess(stream) {
	localMediaStream = stream;
	video.srcObject = stream;
  }

  //captureVideoButton.onclick = function() {
  //  navigator.mediaDevices.getUserMedia(constraints).
  //    then(handleSuccess).catch(handleError);
  //};

  //document.querySelector('#stop-button').onclick = function() {
  //  video.pause();
  //  localMediaStream.stop();
  //};
})();

(function() {
  const captureVideoButton =
	document.querySelector('#screenshot .capture-button');
  const screenshotButton = document.querySelector('#screenshot-button');
  const img = document.querySelector('#screenshot img');
  const video = document.querySelector('#screenshot video');

  const canvas = document.createElement('canvas');

  captureVideoButton.onclick = function() {
	navigator.mediaDevices.getUserMedia(constraints).
	  then(handleSuccess).catch(handleError);
  };

  screenshotButton.onclick = video.onclick = function() {
	canvas.width = video.videoWidth;
	canvas.height = video.videoHeight;
	canvas.getContext('2d').drawImage(video, 0, 0);
	// Other browsers will fall back to image/png
	//img.src = canvas.toDataURL('image/webp');
	img.src = canvas.toDataURL('image/png');
  };

  function handleSuccess(stream) {
	screenshotButton.disabled = false;
	video.srcObject = stream;
  }
})();

(function() {
  const captureVideoButton =
	document.querySelector('#cssfilters .capture-button');
  const cssFiltersButton = document.querySelector('#cssfilters-apply');
  const video = document.querySelector('#cssfilters video');

  let filterIndex = 0;
  const filters = [
	'grayscale',
	'sepia',
	'blur',
	'brightness',
	'contrast',
	'hue-rotate',
	'hue-rotate2',
	'hue-rotate3',
	'saturate',
	'invert',
	''
  ];

  captureVideoButton.onclick = function() {
	navigator.mediaDevices.getUserMedia(constraints).
	  then(handleSuccess).catch(handleError);
  };

  cssFiltersButton.onclick = video.onclick = function() {
	video.className = filters[filterIndex++ % filters.length];
  };

  function handleSuccess(stream) {
	video.srcObject = stream;
  }
	})();







</script>






	Select image to upload:
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Upload Image" name="submit">
</form>





<?= GetDebugMessage() ?>
