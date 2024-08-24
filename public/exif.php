<?php
echo "images/car.jpg:<br />\n";
$exif = exif_read_data('images/car.jpg', 'IFD0');
echo $exif===false ? "No header data found.<br />\n" : "Image contains headers<br />\n";

$exif = exif_read_data('images/car.jpg', 0, true);
echo "car.jpg:<br />\n";
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        echo "$key.$name: $val<br />\n";
    }
}
?>
