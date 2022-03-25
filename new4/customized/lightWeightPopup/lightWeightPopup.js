/**
** Author: ZAID BIN KHALID
** Website: https://learncodeweb.com
** Version: 0.1
**/
 
function closeDilog(action){
    if(action=="inline"){ 
        var inlineData  =   $('#lwpBody').html();
        setTimeout(function(){ $('body').find('.lwp-inline').html(inlineData);},100);
    }
    $('body').removeClass('lwp-hidden');
    $('.lwp').remove();
    $('.lwp-overlay').remove();
}
 
(function($){
    $.fn.lightWeightPopup = function(options) {
        var dset    =   {};
         
        $(this).on("click",function(){
             
            $("body").find('.lwp').remove();
             
            w   =   h   =   u   =   mw  =   mh  =   t   =   mf  =   pt  =   '';
            ol  =   true;
            var scrollVal   =   $(window).scrollTop();
             
            var dset    =   $(this).data();
             
            if(dset.width!="" && typeof dset.width !== "undefined"){    w   =   dset.width;}
            if(dset.height!="" && typeof dset.height !== "undefined"){  h   =   dset.height;}
            if(dset.href!="" && typeof dset.href !== "undefined"){u =   dset.href;}
            if(dset.maxWidth!="" && typeof dset.maxWidth !== "undefined"){mw    =   dset.maxWidth;}
            if(dset.maxHeight!="" && typeof dset.maxHeight !== "undefined"){mh  =   dset.maxHeight;}
            if(dset.title!="" && typeof dset.title !== "undefined"){t   =   dset.title;}else{t  =   'Model';}
            if(dset.overlay==true && typeof dset.overlay !== "undefined"){ol    =   dset.overlay;}
            if(dset.modelFixed==true && typeof dset.modelFixed!== "undefined"){mf   =   'fixed';}
            if(dset.top!="" && typeof dset.top!== "undefined"){pt   =   dset.top;}
             
            var wh  =   parseInt(window.innerHeight)-parseInt(160);
             
            var settings    =   $.extend({
                href            :   u, //Ajax url
                width           :   w, //Container width
                height          :   h, //Container height
                maxWidth        :   mw, //Container title
                maxHeight       :   mh, //Container close text/icon
                title           :   t, //Model Title
                overlay         :   ol, //Model close when click on overlay
                modelFixed      :   mf, //Model fix in dispaly
                top             :   pt, //Model top position set in pixels
            },options);
 
            var sw  =   sh  =   smw =   smh =   setOL   =   setMF   =   setIFH  =   spt =   '';
             
            if(settings.width!=""){
                var sw  =   'width:'+settings.width+';';
            }
            if(settings.height!=""){
                var sh  =   'height:'+settings.height+';';
            }
            if(settings.maxWidth!=""){
                var smw =   'max-width:'+settings.maxWidth+';';
            }
            if(settings.maxHeight!=""){
                var smh =   'max-height:'+settings.maxHeight+';';
            }
            if(settings.overlay==true){
                var setOL   =   'onclick="closeDilog(\''+dset.content+'\')"';
            }
            if(settings.modelFixed=='fixed'){
                var setMF       =   'style="height:'+wh+'px"';
            }
            if(dset.content=='iframe'){
                setIFH      =   'min-height:99%;';
            }
            if(settings.top!='' && settings.top!='0'){
                sumTop  =   (parseInt(settings.top)+parseInt(scrollVal));
                spt     =   'top:'+sumTop+'px;';
            }else{
                spt     =   'top:'+parseInt(scrollVal)+'px;';
            }
             
            $("body").append('<div class="lwp-overlay" '+setOL+'></div><div class="lwp" tabindex="-1" role="dialog" style="'+sw+' '+sh+' '+smw+' '+smh+' '+spt+'"><div id="lwp" style="'+setIFH+'"><div id="lwpHead"><div class="title">'+settings.title+'</div><div class="close" onclick="closeDilog(\''+dset.content+'\')"><span>×</span></div></div><div id="lwpBody" role="document" '+setMF+'><div class="loading"><img src="image/loader.gif"><p class="text">Please Wait..!</p></div></div></div></div>');
            if(settings.modelFixed){
                $('body').addClass('lwp-hidden');
            }
            if(dset.content=='ajax'){
                $.ajax({
                    method  :   "POST",
                    url     :   settings.href,
                    success :   function(data){
                        if(data!=""){
                            setTimeout(function(){$('#lwpBody').html(data);},1000);
                        }
                    }
                });
            }
             
            if(dset.content=='iframe'){
                var lwpHead =   parseInt($('#lwpHead').innerHeight());
                var lwp     =   parseInt($('#lwp').innerHeight());
                var bh      =   parseInt(lwp)-parseInt(lwpHead*1);
                setTimeout(function(){ $('#lwpBody').html('<iframe frameborder="0" style="height:'+bh+'px; width:100%;" src="'+settings.href+'"></iframe>');},1000);
            }
             
            if(dset.content=='inline'){
                var data    =   $('body').find('.lwp-inline').html();
                if(data!=""){
                    $('#lwpBody').html(data);
                }
                $('body').find('.lwp-inline').html('');
            }
        });
         
         
     
    };
}(jQuery));
