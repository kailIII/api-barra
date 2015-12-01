<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Barra del Estado - Gobierno Digital</title>
        <!-- Bootstrap -->
        <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap3/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        $icons = isset($_GET['param5']) && $_GET['param5'] ? true : false;
        $gobabierto = isset($_GET['param0']) && $_GET['param0'] ? true : false;
        $buscadore = isset($_GET['param1']) && $_GET['param1'] ? true : false;
        $domain = $_GET['param2'];
        $inverse = isset($_GET['param6']) && $_GET['param6'] ? true : false;

        $aGob = array('www.gob.cl', 'gob.cl');
        $aChileAtiende = array('www.chileatiende.cl', 'www.chileatiende.gob.cl', 'www.chileatiende.gov.cl', 'desarrollo.chileatiende.cl');
        $aGobAbierto = array('www.gobiernoabierto.cl', 'www.gobiernoabierto.gob.cl', 'www.gobiernoabierto.gov.cl', 'alpha.gobiernoabierto.cl');
        ?>


        <div id="topbar"class="nav navbar-nav <?php echo ($inverse)?'navbar-inverse':'navbar-default'; ?> navbar-fixed-top" role="navigation">
                <div class="container-fluid">

                    <!-- Gobierno de Chile -->
                    <?php if (!in_array($domain, $aGob)) : ?>
                        <ul class="nav navbar-nav icon-fixed">
                                <li>
                                    <a class="label-icon <?php echo ($icons)?'sprite':'no-sprite'; ?> iframe_ico_chile" href="http://www.gob.cl/" target="_blank" onclick="_gaq.push(['_trackEvent', 'Banner', 'Gobierno de Chile', '<?= preg_replace('/[^\w\.]/','',$domain) ?>']);">
                                    Gobierno de Chile
                                    </a>
                                </li>
                                <li class="divider-vertical"></li>                      
                        </ul>
                    <?php endif ?>

                    <!-- Chile Atiende & Gobierno Abierto -->
                    <ul class="nav navbar-nav hidden-xs">
                        <?php if (!in_array($domain, $aChileAtiende)) : ?>
                            <li>
                                <a class="label-icon <?php echo ($icons)?'sprite':'no-sprite'; ?> iframe_ico_chileatiende" href="http://www.chileatiende.cl/" target="_blank" onclick="_gaq.push(['_trackEvent', 'Banner', 'ChileAtiende', '<?= preg_replace('/[^\w\.]/','',$domain) ?>']);">
                                Chile Atiende
                                </a>
                            </li>
                            <li class="divider-vertical"></li>
                        <?php endif ?>

                        <?php if (!in_array($domain, $aGobAbierto) && $gobabierto) : ?>
                            <li>
                                <a class="label-icon <?php echo ($icons)?'sprite':'no-sprite'; ?> iframe_ico_gobabierto" href="http://www.gobiernoabierto.cl/" target="_blank" onclick="_gaq.push(['_trackEvent', 'Banner', 'Gobierno Abierto', '<?= preg_replace('/[^\w\.]/','',$domain) ?>']);">
                                Gobierno Abierto
                                </a>
                            </li>
                        <?php endif ?>

                    </ul>

                    <!-- Buscador -->
                    <?php if ($buscadore): ?>
                        <ul class="nav navbar-nav pull-right">
                            <li class="buscador">
                                <form class="navbar-form navbar-left" role="search" action="//buscador.chileatiende.cl/buscador/consulta" method="get" target="_blank">
                                    <div class="input-group">
                                        <input id="query" type="text" class="form-control" name="q" placeholder="Buscar...">
                                        <span class="input-group-btn">
                                            <button id="submit" type="submit" class="btn" onclick="_gaq.push(['_trackEvent', 'Buscador', this.value, '<?= preg_replace('/[^\w\.]/','',$domain) ?>']);"><span class="icon-buscar"></span></button>
                                        </span>
                                    </div><!-- /input-group -->
                                </form>
                            </li>
                        </ul>
                    <?php endif ?>

                    <!-- Links -->
                    <ul class="mensajes nav navbar-nav hidden-xs hidden-sm pull-right">
                        <!--li class="divider-vertical"></li-->
                        <li class="item-2"><a class="label-text"  href="http://guiadeoportunidades.gob.cl/" id="" target="_blank" onclick="_gaq.push(['_trackEvent', 'Banner', 'GuíadeOportunidades', '<?= preg_replace('/[^\w\.]/','',$domain) ?>']);">Guía de <strong>Oportunidades</strong></a></li>
                    </ul>

                </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="bootstrap3/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-23675324-7']);
            _gaq.push(['_trackPageview']);
            _gaq.push(['_setCustomVar', 1, 'DominioBarra', '<?= preg_replace('/[^\w\.]/','',$domain) ?>', 1]);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>

    </body>
</html>