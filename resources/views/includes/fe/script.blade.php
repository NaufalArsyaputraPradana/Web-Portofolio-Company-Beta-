<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5e87e737ee7085b9ba02c101"
    type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
</script>
<script src="https://assets.website-files.com/5e87e737ee7085b9ba02c101/js/webflow.be692164d.js" type="module"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>

<!-- Custom Scripts -->
<script>
    $(".click-to-top").click(function() {
        var topZ = 0;
        $(".click-to-top").each(function() {
            var thisZ = parseInt($(this).css("z-index"), 10);
            if (thisZ > topZ) {
                topZ = thisZ;
            }
        });
        $(this).css("z-index", topZ + 1);
    });

    WebFont.load({
        google: {
            families: ["Baloo Thambi 2:regular,500,600,700,800"]
        },
    });

    !(function(o, c) {
        var n = c.documentElement,
            t = " w-mod-";
        (n.className += t + "js"),
        ("ontouchstart" in o ||
            (o.DocumentTouch && c instanceof DocumentTouch)) &&
        (n.className += t + "touch");
    })(window, document);
</script>
