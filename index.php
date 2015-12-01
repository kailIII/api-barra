<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Generador de Barra del Estado - Gobierno Digital</title>
        <link href="css/style_generador.css" rel="stylesheet" type="text/css" />
        <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    </head>

    <body class="generador">
        <div id="wrap">

            <div class="container">
                <h1>Barra Estado</h1>
                <form id="form2" name="form2" method="post" action="" class="formulario">
                    <h2><span class="numero">1</span> Personalice</h2>

                    <p class="enlaces">Seleccione Enlaces: </p>
                    <p>
                        <input name="checkbox" type="checkbox" id="checkbox" disabled="disabled" checked="checked"/>
                        <label for="checkbox"><span class="gobcl">Gobierno de Chile</span></label>
                    </p>
                    <p>
                        <input type="checkbox" name="chAtiende" id="chAtiende" disabled="disabled" checked="checked" />
                        <label for="chAtiende"><span class="chileatiende">ChileAtiende</span></label>
                    </p>
                    <p>
                        <input type="checkbox" name="gobAbierto" id="gobAbierto" value="1" checked="checked" />
                        <label for="gobAbierto"><span class="gobiabierto">Gobierno Abierto</span></label>
                    </p>
                    <p>
                        <input type="checkbox" name="Ebuscador" id="Ebuscador" value="1" checked="checked" />
                        <label for="Ebuscador"><span class="buscador">Buscador de Estado</span></label>
                    </p>
                    <p class="enlaces">Otros: </p>
                    <p>
                        <input type="checkbox" name="Icons" id="Icons" value="1" />
                        <label for="Icons"><span>Ocultar iconos</span></label>
                    </p>
                    <p>
                        <input type="checkbox" name="Inverse" id="Inverse" value="0" />
                        <label for="Inverse"><span>Estilo inverso</span></label>
                    </p>
                    <h2><span class="numero">2</span> Previsualice y genere el código</h2>
                    <p>
                        <input type="button" name="generar" id="generar" value="Previsualizar y Generar Código" />
                    </p>
                </form>
                <div class="code">

                    <h2 class="enlaces"><span class="numero">3</span> Copie código barra</h2>
                    <textarea name="generado" id="generado" rows="10" cols="50" onclick="this.focus();this.select()" readonly="readonly"></textarea>

                    <h2 class="enlaces"><span class="numero">4</span> Inserte el código en su sitio</h2>
                    <p>Pegue el contenido antes del tag &lt;/body&gt;</p>
                </div>

                <div class="clear"></div>
            </div>
            <div id="footer">
                <div class="container">
                    <div class="detalle"><a target="_blank" href="http://www.modernizacion.cl">Unidad de Modernización y Gobierno Digital</a> - Gobierno de Chile</div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.tools.min.js"></script>
        <script type="text/javascript" src="js/jquery.ez-pinned-footer.js"></script>

        <script type="text/javascript">
            
            $(window).resize(function() {
                $("#footer").pinFooter();
            });

            $(document).ready(function() {
                $("#footer").pinFooter();
                $('#generar').on('click', function(){

                    $('#generado').val('');

                    //volvemos a la normalidad este input
                    $('.msgError').html('');
                    $('#dominio').attr('style','border: 1px solid #D2D2D2');
						
                    var str = '';
						
                    var param1 = 0;
                    var param2 = 0;
                    var param5 = 1; //sin iconos
                    var param6 = 0; //Style inverse
						
                    if($('input:checked[name="gobAbierto"]').length) {
                        param1 = 1;
                        $('.gobabierto').parent().attr('style','');
                    } else {
                        $('.gobabierto').parent().attr('style','display:none');
                    }
                    if($('input:checked[name="Ebuscador"]').length) {
                        param2 = 1;
                        $('.buscadorCHA_btn').attr('style','');
                    } else {
                        $('.buscadorCHA_btn').attr('style','display:none');
                    }
                    $('.gobcl_noicon').attr('class','gobcl');
                    $('.chilecumple_noicon').attr('class','chilecumple');
                    $('.chileatiende_noicon').attr('class','chileatiende');
                    $('.gobabierto_noicon').attr('class','gobabierto');
                    if($('input:checked[name="Icons"]').length) {
                        param5 = 0; //con iconos
                        $('.gobcl').attr('class','gobcl_noicon');
                        $('.chilecumple').attr('class','chilecumple_noicon');
                        $('.chileatiende').attr('class','chileatiende_noicon');
                        $('.gobabierto').attr('class','gobabierto_noicon');
                    } /*else {
                                $('.buscadorCHA_btn').attr('style','display:none');
                            }*/
					
                    if($('input:checked[name="Inverse"]').length) {
                        param6 = 1; //estilo inverso
                    }

                    str = '';
                    
                    var options = [];

                    if(param1)
                        options.push('"gobabierto":"'+param1+'"');
                    if(param2)
                        options.push('"buscadore":"'+param2+'"');
                    if(param5)
                        options.push('"icons":"'+param5+'"');
                    if(param6)
                        options.push('"inverse":"'+param6+'"');
                    
                    str += 'window.____aParams = {';
                    
                    str += options.join(',');        
                            
                    str += '};'+"\n";
                            
                    str += '(function() {'+"\n";
                    str += 'var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;'+"\n";
                    str += "po.src = document.location.protocol + '//apis.modernizacion.cl/barra/js/barraEstado.js';"+"\n";
                    str += 'var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);'+"\n";
                    str += '})();'+"\n";
						
                    $('#generado').val('\x3Cscript type="text/javascript">'+"\n"+str+'\x3C/script>'+"\n");
                    eval(str);
                        
                    $("iframe").expose();
                    
                });
            });
        </script>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-23675324-7']);
            _gaq.push(['_trackPageview']);
        
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <script type="text/javascript">
            window.____aParams = {"gobabierto":"1","buscadore":"1","icons":"1"};
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = document.location.protocol + '//apis.modernizacion.cl/barra/js/barraEstado.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>

    </body>
</html>
