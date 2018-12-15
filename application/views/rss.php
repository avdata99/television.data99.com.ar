<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<rss version="2.0"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:admin="http://webns.net/mvcb/"
     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:atom="http://www.w3.org/2005/Atom" >
 
    <channel>
        <title>El feed de la television abierta</title>
        <link><?php echo MYhURL ?>/rss</link>
        <atom:link href="https://<?php echo MYURL ?>/rss" rel="self" type="application/rss+xml" />
        <description>Resumenes de noticias de los mejores canalaes de TV</description>
        <dc:language>es</dc:language>
        <dc:creator>Andres Vazquez - data99</dc:creator>
        <dc:rights>Copyright propio de youtube y los canales de TV</dc:rights>
        <admin:generatorAgent rdf:resource="https://data99.com.ar" />
        <?php
        foreach ($videos as $video): ?>
            <item>
                <?php $url = MYhURL . "/video/$video->video_id"; ?>
                <title><? echo $video->title; ?></title>
                <link><?=$url  ?></link>
                <guid><?=$url?></guid>
                <description>
                    <![CDATA[
                        <? echo $video->description . "<br/> <a href='https://www.youtube.com/watch?v=" . $video->video_id."'>VER VIDEO</a>";?>
                    ]]>
                </description>
                <pubDate><? echo date("D, d M Y H:i:s O",  strtotime($video->fecha)); ?></pubDate>
            </item>
        <? endforeach; ?>
    </channel>
</rss>