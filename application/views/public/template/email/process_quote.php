<html>
    <head></head>
    <body>
        <p>campaign name: <?= $campaign_name ?></p>
        <p>creative name: <?= $creative_name ?></p>
        <p>template name: <?= $template_name ?></p>
        <p>dimension: <?= $width.'x'.$height ?></p>
        <p>impressions: <?= $impressions ?></p>
        <p>verify link: <?= base_url()."workspace/verifyquote/".$id ?></p>
    </body>
</html>