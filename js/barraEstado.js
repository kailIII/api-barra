;(function(document){
    var $ = document;
    var parameters = '';
    var dominio = document.location.protocol+'//apis.modernizacion.cl/barra/';

    var iframe;
    if (!(iframe=$.getElementById('iframeBarra')))
        iframe = $.createElement('iframe');

    iframe.id = 'iframeBarra';
    
    parameters = 'param2='+document.domain;
    if(____aParams.gobabierto != undefined)
        parameters += '&param0='+____aParams.gobabierto;
    if(____aParams.buscadore != undefined)
        parameters += '&param1='+____aParams.buscadore;
    if(____aParams.icons != undefined)
        parameters += '&param5='+____aParams.icons;
    if(____aParams.inverse != undefined)
        parameters += '&param6='+____aParams.inverse;

    iframe.src = dominio+'iframe.php?'+parameters;
    
    iframe.frameBorder = '0';
    iframe.scrolling = 'no';
    iframe.width = '100%';
    iframe.height = '32px';
    iframe.marginHeight = '0';
    iframe.marginWidth = '0';
	
    var elcuerpo = $.body;
    elcuerpo.insertBefore(iframe, elcuerpo.firstChild);	
})(document);
