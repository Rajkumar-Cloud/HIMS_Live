# lightWeightPopup.js
How to create a custom POPUP form with PHP &amp; Ajax

<h1>Add Files</h1>

```
<link rel="stylesheet" href="lightweightpopup.css" type="text/css">
```

```
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="lightWeightPopup.js"></script>
```

<h1>HTML</h1>

```
<button type="button" id="popup" class="btn btn-primary mb-3" data-overlay="true" data-href="contact-us.html" data-content="ajax"><i class="fa fa-fw fa-file-alt"></i> CLICK HERE AJAX</button>

<a href="javascript:;" id="ancher" data-href="contact-us.html" class="btn btn-primary mb-3" data-content="ajax"><i class="fa fa-fw fa-file-alt"></i> Ancher Tag AJAX</a>

<button type="button" id="iframe" data-href="https://www.youtube.com/embed/ZwKhufmMxko" class="btn btn-warning mb-3" data-content="iframe"><i class="fa fa-fw fa-file-alt"></i> Button Tag Iframe</button>

<a href="javascript:;" data-href="https://learncodeweb.com/web-development/how-to-create-a-custom-popup-form-with-php-and-ajax/" class="btn btn-dark mb-3 iframe" data-content="iframe"><i class="fa fa-fw fa-file-alt"></i> Ancher Tag Iframe</a>
```

<h1>Initialization</h1>

```javascript
$(document).ready(function(e) {
	$("#popup").lightWeightPopup({href:"contact-us.html", overlay:true, width:"90%", maxWidth:"600px", title:"Ajax Model"});
	$("#inline").lightWeightPopup({title:"Inline Model", top:'50', width:'800px' });
	$("#ancher").lightWeightPopup({width:"95%", maxWidth:"320px", title:"Ajax Model"});
	$("#iframe").lightWeightPopup({href:"https://www.youtube.com/embed/N59KnLf2pbY", maxWidth:"600px", height:"400px", title:"Iframe Model"});
	$(".iframe").lightWeightPopup({width:"100%", height:"100%", title:"Iframe Model"});
});
```

<h1>Complete Detail</h1>

For complete documentation <a href="https://learncodeweb.com/web-development/how-to-create-a-custom-popup-form-with-php-and-ajax/" target="_blank">click here</a>


For demo <a href="https://learncodeweb.com/demo/web-development/how-to-create-a-custom-popup-form-with-php-and-ajax/" target="_blank">click here</a>
