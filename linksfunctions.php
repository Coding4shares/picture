<?php
$domainname='https://img65.herokuapp.com/'; 
?>
<script>
    var domainName = <?php echo json_encode($domainname);  ?>;

    function CopyToClipboard(datedate) {

        text = domainName + "?image=" + datedate;
        if (window.clipboardData && window.clipboardData.setData) {
            // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
            return window.clipboardData.setData("Text", text);

        } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
            var textarea = document.createElement("textarea");
            textarea.textContent = text;
            textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
            document.body.appendChild(textarea);
            textarea.select();
            try {
                return document.execCommand("copy"); // Security exception may be thrown by some browsers.
            } catch (ex) {
                console.warn("Copy to clipboard failed.", ex);
                return false;
            } finally {
                document.body.removeChild(textarea);
            }
        }
    }
</script>
<?php

use function PHPSTORM_META\type;

function getlinks()
{
    return json_decode(file_get_contents("links.json"), true);
}


function getlinkBydate($date)
{
    $links = getlinks();
    foreach ($links as $link) {
        if ($link['date'] == $date) {
            return $link;
        }
    }
    return null;
}


function deletelink($date)
{
    $links = getlinks();
    foreach ($links as $i => $link) {
        if ($link['date'] == $date) {
            $image=$link['image'];
            unlink($image);
            unset($links[$i]);
        };
    };
    $links = json_encode($links);
    file_put_contents('links.json', $links);
}







function createlink($newData)
{
    $notes = $newData['notes'];
    $date = date("Y-m-d H:i:s");
    $description = $newData['description'];
    $name=date("YmdHis");
    $filename=$_FILES["photo"]["name"];
    $extension=end(explode(".", $filename));
    $todir = 'images/';
    $image= $todir.$name .".".$extension;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $image); 

    $newData = ['date' => $date, 'image' => $image, 'notes' => $notes, 'description' => $description];
    $links = getlinks();
    $links[] = $newData;
    $links = json_encode($links);

    file_put_contents('links.json', $links);
    header("location: link.php");
}

function updatelink($data, $date)
{
    $links = getlinks();

    foreach ($links as $i => $link) {
        if ($link['date'] == $date) {
            $links[$i] = array_merge($link, $data);
            $links = json_encode($links);
            file_put_contents('links.json', $links);
        };
    };
}



?>