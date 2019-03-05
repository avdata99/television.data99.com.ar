<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="La television abierta de <?=$pais?>. Resumenes de noticias por ciudad y fecha.">
    <meta name="author" content="data 99">

    <meta name="c64" content="<?=$page64?>">
    <meta name="cu" content="<?=$cache_usado?>">
    <meta name="cnfo" content="<?=$cache_info?>">
    <meta name="CIV" content="<?=CI_VERSION?>">
    
    <title><?=$meta_title?></title>
    <!-- Bootstrap -->
    <link href="/myextras/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="/myextras/css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Font awesome - iconic font with IE7 support --> 
    <link href="/myextras/css/font-awesome.css" rel="stylesheet">
    <link href="/myextras/css/font-awesome-ie7.css" rel="stylesheet">
    <!-- Bootbusiness theme -->
    <link href="/myextras/css/boot-business.css" rel="stylesheet">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">     
    <!-- <link rel="stylesheet" type="text/css" href="/myextras/css/demo.css" /> -->
    <link rel="stylesheet" type="text/css" href="/myextras/css/style_common.css" />
    <link rel="stylesheet" type="text/css" href="/myextras/css/style2.css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="/myextras/js/modernizr.custom.69142.js"></script> 
    
    <meta property="og:title" content="La television de <?=$pais?>"/> 
    <meta property="og:image" content="<?php echo $videos_big[0]->th_high; ?>"/> 
    <meta property="og:site_name" content="<?php echo MYURL ?>"/>
    
  </head>
  <body>

      
    <header>
      <!-- Start: Navigation wrapper -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            
          <div class="container">
              
            <a href="/" class="brand brand-bootbus">TV <?=$pais?></a>
            
            
            <!-- Below button used for responsive navigation -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Start: Primary navigation -->
            <div class="nav-collapse collapse">        
              <ul class="nav pull-right">
                  <?php $ubic = ($ciudad != "") ? $ciudad : $pais;?>
                  
                  <li style='width: 150px;padding-top: 10px;'>
                    <div class="fb-like" data-href="https://television.data99.com.ar/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                  </li>
                    
                  
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Canales de <?=$ubic?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      
                      
                    <li class="nav-header">Canales</li>
                    <?php foreach ($canales as $canal) { ?>
                        <li><a style="padding: 1px 20px;" href="/canal/<? echo urlencode(str_replace(' ', '-', $canal->nombre))?>"><?=$canal->nombre?></a></li>
                    <?php } ?>
                  </ul>
                </li>  
                  
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ciudades<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="nav-header">Ciudades de <?=$pais?></li>
                    <?php foreach ($ciudades as $ciudad) { ?>
                    <li><a href="/ciudad/<? echo urlencode(str_replace(' ', '-', $ciudad->ciudad)) ?>"><?=$ciudad->ciudad?></a></li>
                    <?php } ?>
                  </ul>
                </li>
                
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Paises<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="nav-header">Cambiar país</li>
                    <?php foreach ($paises as $paissel) { ?>
                        <li><a href="/pais/<? echo urlencode(str_replace(' ', '-', $paissel->pais))?>"><?=$paissel->pais?></a></li>
                    <?php } ?>
                  </ul>
                </li>
                <li><a target='_blank' href="https://data99.com.ar">nosotros</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- End: Navigation wrapper -->   
    </header>
    <!-- End: HEADER -->
    <!-- Start: MAIN CONTENT -->
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <div class="content">
      <!-- Start: slider -->
      <div class="slider">
        <div class="container-fluid">
          <div id="heroSlider" class="carousel slide">
            <div class="carousel-inner">
                <?php $c=0; foreach ($videos_big as $video) { ?>
                    
                    <div class="<?php echo ($c == 0) ? "active " : "" ;?>item">
                        <div class="hero-unit">
                          <div class="row-fluid">
                            <div class="span7 marketting-info">
                              <h1><?=$video->title;?></h1>
                              <p>
                                <?=$video->description;?>
                              </p>
                              <small><a href="/canal/<?=urlencode(str_replace(" ","-",$video->canal))?>"><?=$video->canal;?></a> el <?=$video->fecha." ".$video->hora;?>.</small>
                              
<a href="https://twitter.com/share" class="twitter-share-button" 
    data-url="https://<?php echo MYURL ?>/video/<?=$video->video_id;?>" 
    data-text="Mira! <?=$video->title;?>" data-via="cbamedios" data-lang="es">Twittear</a>
<div class="fb-like" data-href="https://<?php echo MYURL ?>/video/<?=$video->video_id;?>" 
    data-layout="standard" 
    data-action="like" 
    data-show-faces="true" data-share="true"></div>
                                                    
                            </div>

                            <div class="span5 showvideo" id="<?=$video->video_id?>" data-vidtitle="Television abierta: <?=$video->title?>">
                              <img style="cursor: pointer;" src="<?=$video->th_high;?>" class="thumbnail">
                            </div>
                          </div>                  
                        </div>
                      </div>
                
                
                
                <?php $c++; } ?>
              
            </div>
            <a class="left carousel-control" href="#heroSlider" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#heroSlider" data-slide="next">›</a>
          </div>
        </div>
      </div>
      <!-- End: slider -->
      <!-- Start: PRODUCT LIST -->
        <div class="container">
          <div class="page-header">
            <h2>Mas noticias</h2>
          </div>
            
        
            
          <div class="row-fluid">
            <ul class="thumbnails">
                
                <?php $fila=0; $c=0; foreach ($videos as $video) { ?>
                
            <li class="span4">
                <div class="thumbnail">
                    <div id="<?=$video->video_id?>" class='showvideo grid' data-vidtitle="Television abierta: <?=$video->title?>">
                        
                        <div class="view">
                            <div class="view-back">
                                <span class='showvideo2' data-usediv="<?=$video->video_id?>" data-vidtitle="Television abierta: <?=$video->title?>" style="cursor: pointer;">VER</span>
                            </div>
                            <img src="<?=$video->th_med?>" title="<?=$video->title?> en la TV abierta" alt="<?=$video->title?>">
                        </div>
                        
                        
                    </div>
                  <div class="caption">
                    <h3><?=$video->title?></h3>
                    <p>
                      <?=$video->description?>
                    </p>
                    <small><b><a href="/canal/<?=urlencode(str_replace(" ","-",$video->canal))?>"><?=$video->canal;?></a></b> el <?=$video->fecha." ".$video->hora;?>.</small>
<a href="https://twitter.com/share" class="twitter-share-button" 
    data-url="https://<?php echo MYURL ?>/video/<?=$video->video_id;?>" 
    data-text="Mira! <?=$video->title;?>" 
    data-via="cbamedios" data-lang="es">Twittear</a>
<div class="fb-like" data-href="https://<?php echo MYURL ?>/video/<?=$video->video_id;?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
 - Tambien lo podes <a href="https://<?php echo MYURL ?>/video/<?=$video->video_id;?>">ampliar</a>



                  </div>
                </div>
              </li>
                
                
                <?php 
                $c ++;
                if ($c == 3)
                    {
                    $c = 0;
                    $fila++;
                    echo "</ul></div>";
 ?>
<div class='row-fluid'>
  <li class='span12'>
  <ul class='thumbnails' style='overflow: visible'>
    <div class='thumbnail'>
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- tvdata99 horiz largo -->
        <ins class="adsbygoogle"
           style="display:inline-block;width:728px;height:90px"
           data-ad-client="ca-pub-1451436001656992"
           data-ad-slot="5678609869"></ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>          
    </div>
  </ul>
  </li>
</div>
<div class='row-fluid'>
  <ul class='thumbnails'>

  <?php }  } ?>
              
            </ul>
          </div>
            
            <div class="row-fluid">
            <ul class="thumbnails">
                
                <?php $fila=0; $c=0; foreach ($videos_mini as $video) { ?>
                
            <li class="span6">
                <div class="thumbnail">
                    <div>
                        <a target="_blank" href="https://<?php echo MYURL ?>/video/<?=$video->video_id;?>">
                            <img style="padding: 4px;float: left; width: auto;" src="<?=$video->th_mini?>" title="<?=$video->title?> en la TV abierta" alt="<?=$video->title?>">
                        </a>
                    </div>
                  <div class="caption">
                      <a target="_blank" href="https://<?php echo MYURL ?>/video/<?=$video->video_id;?>">
                        <h3 style="font-size: 18px;line-height: 20px;"><?=$video->title?></h3>
                      </a>
                    <p>
                      <?=$video->description?>
                    </p>
<small><b><a href="/canal/<?=urlencode(str_replace(" ","-",$video->canal))?>"><?=$video->canal;?></a></b> el <?=$video->fecha." ".$video->hora;?>.</small>
<a href="https://twitter.com/share" 
    class="twitter-share-button" 
    data-url="https://<?php echo MYURL ?>/video/<?=$video->video_id;?>" 
    data-text="Mira! <?=$video->title;?>" 
    data-via="cbamedios" data-lang="es">Twittear</a>
<div class="fb-like" data-href="https://<?php echo MYURL ?>/video/<?=$video->video_id;?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                    
                  </div>
                </div>
              </li>
                
                
                <?php 
                $c ++;
                if ($c == 2)
                    {
                    $c = 0;
                    $fila++;
                    echo "</ul></div>";
                    echo "<div class='row-fluid'>";
                    //SIGUE
                    echo "<ul class='thumbnails'>";
                    }
                }
                ?>
              
            </ul>
          </div>
            
            
          <?php if ($prevButton !== "")  { ?>
            <a href="<?=$prevButton?>" class="btn btn-primary">Anterior</a>
          <?php } ?>
            
        <?php if ($nextButton !== "")  { ?>
            <a href="<?=$nextButton?>" class="btn btn-primary">Siguiente</a>
          <?php } ?>
            
        </div>
      <!-- End: PRODUCT LIST -->
    </div>
    <!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="span8">
            <h4><i class="icon-beaker icon-white"></i> About</h4>
            <nav>
            <div>Agregador de noticias automatizado como replica de cientos de sitios de 
                noticias y periodistas. Los contenidos aquí expuestos no son responsabilidad 
                directa de los autores.
                <?=date("Y")?> desarrollado como software libre por Data99.</div>
            </nav>          
            </nav>          
          </div>
          <div class="span4">
            <h4>Get in touch</h4>
            <div class="social-icons-row">
              <a target='_blank' href="https://twitter.com/avdata99"><i class="icon-twitter"></i></a>
              <a target='_blank' href="https://ar.linkedin.com/pub/andres-vazquez/20/599/160/"><i class="icon-linkedin"></i></a>                                         
              <a target='_blank' href="https://plus.google.com/+AndresVazquezFlexes"><i class="icon-google-plus"></i></a>
              <a target='_blank' href="https://github.com/avdata99/television.data99.com.ar"><i class="icon-github"></i></a>
              <a href="mailto:andres@data99.com.ar"><i class="icon-envelope"></i></a>        
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- LASTQ <?=$q?> -->
    <!-- End: FOOTER -->
    <script type="text/javascript" src="/myextras/js/jquery.min.js"></script>
    <script type="text/javascript" src="/myextras/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/myextras/js/boot-business.js"></script>
    
    <script>
        $(".showvideo").click(function()
            {
            var vidtitle = $(this).data("vidtitle");
            ga('send', 'pageview', {'page': '/video/' + $(this).attr("id"), 'title': vidtitle});
            var he = $(this).height();
            var wi = $(this).width();
            if (he < 320) he=320;
            $(this).html('<iframe height="'+he+'px" width="'+wi+'px" src="//www.youtube.com/embed/'+$(this).attr("id") +'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
            });
            
        $(".showvideo2").click(function()
            {
            var vidtitle = $(this).data("vidtitle");
            ga('send', 'pageview', {'page': '/video/' + $(this).attr("id"), 'title': vidtitle});
            var usediv = $(this).data("usediv");
            var he = $("#"+usediv).height();
            var wi = $("#"+usediv).width();
            if (he < 320) he=320;
            $("#"+usediv).html('<iframe height="'+he+'px" width="'+wi+'px" src="//www.youtube.com/embed/'+$(this).attr("id") +'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
            });
               
    </script>
    
    
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-36859038-2', '<?php echo MYURL ?>');
    ga('send', 'pageview');

  </script>
  
  <script type="text/javascript">	
			
        Modernizr.load({
                test: Modernizr.csstransforms3d && Modernizr.csstransitions,
                yep : ['https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js','/myextras/js/jquery.hoverfold.js'],
                nope: 'css/fallback.css',
                callback : function( url, result, key ) 
                    {
                    if( url === '/myextras/js/jquery.hoverfold.js' ) {$( '.grid' ).hoverfold();}
                    }
        });

</script>
  
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=231116133703080&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  </body>
</html>