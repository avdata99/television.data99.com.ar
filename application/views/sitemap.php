<?php echo "<?xml version='1.0' encoding='UTF-8'?>"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo MYhURL ?></loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>

    <url>
        <loc><?php echo MYhURL ?>/rss</loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    
    <?php foreach ($paises as $pais) { ?> 
        <url>
            <loc><?php echo MYhURL ?>/pais/<? echo urlencode(str_replace(" ", "-", $pais->pais)) ?></loc>
            <changefreq>daily</changefreq>
            <lastmod><?php echo date("Y-m-d"); ?></lastmod>
            <priority>0.8</priority>
        </url>
    <?php } ?>
    
    <?php foreach ($canales as $canal) { ?> 
        <url>
            <loc><?php echo MYhURL ?>/canal/<? echo urlencode(str_replace(" ", "-", $canal->nombre)) ?></loc>
            <changefreq>daily</changefreq>
            <lastmod><?php echo date("Y-m-d"); ?></lastmod>
            <priority>0.8</priority>
        </url>
    <?php } ?>
    
    <?php foreach ($ciudades as $ciudad) { ?> 
        <url>
            <loc><?php echo MYhURL ?>/ciudad/<? echo urlencode(str_replace(" ", "-", $ciudad->ciudad)) ?></loc>
            <changefreq>daily</changefreq>
            <lastmod><?php echo date("Y-m-d"); ?></lastmod>
            <priority>0.8</priority>
        </url>
    <?php } ?>
    
    <?php foreach ($videos as $video) { ?> 
        <url>
            <loc><?php echo MYhURL ?>/video/<?=$video->video_id?></loc>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
        </url>
    <?php } ?>
    
    
</urlset>