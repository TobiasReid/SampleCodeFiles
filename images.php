<?php

/**
 * Get all the contents of the image directory
 * @return array
 */
function listImageDirectory() {

    $dir = 'res/images/images/';
    $imageList = scandir($dir);

    foreach ($imageList as $key => $link) {
        if(is_dir($dir.$link)){
            unset($imageList[$key]);
        }
    }

    $imageListReset = array_values($imageList);
    return $imageListReset;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Image Generator</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">

</head>

<div class="header">

    <div class = "h1">Random Image Generator</div>
    <div class='clear'></div>

</div>

<body>
<div class="main-content">

    <div class="button">
        <button onclick="imagefunction()">
            Re-Generate
        </button>
    </div>

    <img id="currentimage" src="http://farm8.staticflickr.com/7028/6704919915_89d95d3727_o.jpg" style="height: 500px;">

    <script>

        //javascript can't read php arrays but can read JSON, so we need to json_encode our array in order for the js to read it.
        var imageList = <?= json_encode(listImageDirectory(), JSON_UNESCAPED_SLASHES) ?>;


        function imagefunction(){

            //need to get imageList.length

            var whichImage = imageList[Math.floor(Math.random() * imageList.length)];

            document.getElementById('currentimage').src='res/images/images/'+whichImage;

        }

    </script>

</div>

</body>


</html>