<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$video->description?>">
    <meta name="author" content="<?=$video->canal?>">
    <title>Television abierta: <?=$video->title?></title>
    <!-- Bootstrap -->
    <link href="/myextras/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="/myextras/css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Font awesome - iconic font with IE7 support --> 
    <link href="/myextras/css/font-awesome.css" rel="stylesheet">
    <link href="/myextras/css/font-awesome-ie7.css" rel="stylesheet">
    <!-- Bootbusiness theme -->
    <link href="/myextras/css/boot-business.css" rel="stylesheet">
    
    <meta property="og:title" content="<?=$video->title?>"/> 
    <meta property="og:image" content="<?php echo $video->th_high; ?>"/> 
    <meta property="og:site_name" content="<?php echo MYURL ?>"/>
    
  </head>
  <body>
    
    <header>
      <!-- Start: Navigation wrapper -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a href="/" class="brand brand-bootbus">TV ABIERTA</a>
            <!-- Below button used for responsive navigation -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Start: Primary navigation -->
            <div class="nav-collapse collapse">        
              <ul class="nav pull-right">
                <li style='width: 150px;padding-top: 10px;'>
                    <div class="fb-like" data-href="https://television.data99.com.ar/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                  </li>
                  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Canales<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="nav-header">Canales</li>
                    <?php foreach ($canales as $canal) { ?>
                        <li><a href="/canal/<? echo urlencode(str_replace(' ', '-', $canal->nombre))?>"><?=$canal->nombre?></a></li>
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
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <div class="content">    
      <div class="container">
        <!-- Start: Product description -->
        <airticle class="article">
          <div class="row bottom-space">
            <div class="span12">
              <div class="page-header">
                <h1><?=$video->title?> <small><a href="/canal/<?=urlencode(str_replace(" ","-",$video->canal))?>"><?=$video->canal."</a> el ". $video->fecha?></small></h1>

<a href="https://twitter.com/share" class="twitter-share-button" 
    data-url="<?php echo MYhURL ?>/video/<?=$video->video_id;?>" 
    data-text="Mira! <?=$video->title;?>" data-via="cbamedios" 
    data-lang="es">Twittear</a>
<div class="fb-like" data-href="<?php echo MYhURL ?>/video/<?=$video->video_id;?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>                
              </div>
            </div>
<div class="span6 center-align">
    <iframe height="300" width="450" src="//www.youtube.com/embed/<?=$video->video_id?>?autoplay=1" frameborder="0" allowfullscreen></iframe>
    <p style="font-weight: bold">
        <?=$video->description;?>
    </p>
</div>
              
<div class="span3">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- TVdata99 largo parado -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-1451436001656992"
     data-ad-slot="2725143460"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
              
          </div>
          
        </airticle>
        <!-- End: Product description -->
      </div>
    </div>
    </div>
    <!-- End: Main content -->
    <!-- Start: FOOTER -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="span3">
            <h4><i class="icon-beaker icon-white"></i> About</h4>
            <nav>
              <ul class="quick-links">
                <li>Autor: <a href="http://andresvazquez.com.ar">Andrés Vázquez</a></li>
                <li><a href='https://data99.com.ar'>Data99</a></li>
                <li><a href="https://andresvazquez.com.ar/blog">Blog</a></li>
                <li><a href="/rss">RSS TV abierta</a></li>
              </ul>
            </nav>          
          </div>
          <div class="span4">
            <h4>Get in touch</h4>
            <div class="social-icons-row">
              <a target='_blank' href="https://twitter.com/data_99"><i class="icon-twitter"></i></a>
              <a target='_blank' href="https://ar.linkedin.com/pub/andres-vazquez/20/599/160/"><i class="icon-linkedin"></i></a>                                         
              <a target='_blank' href="https://plus.google.com/u/0/+AndresVazquezFlexes/"><i class="icon-google-plus"></i></a>
              <a target='_blank' href="https://github.com/avdata99/television.data99.com.ar"><i class="icon-github"></i></a>
              <a href="mailto:andres@data99.com.ar"><i class="icon-envelope"></i></a>        
            </div>
          </div>
        </div>
      </div>
      <hr class="footer-divider">
      <div class="container">
        <p>
          <?=date("Y")?> data 99.
        </p>
      </div>
    </footer>
    <!-- End: FOOTER -->
    <script type="text/javascript" src="/myextras/js/jquery.min.js"></script>
    <script type="text/javascript" src="/myextras/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/myextras/js/boot-business.js"></script>
    
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-36859038-2', '<?php echo MYURL ?>');
    ga('send', 'pageview');

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