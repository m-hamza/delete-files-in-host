<?php
$upperDir = dirname(__DIR__); // یک سطح بالاتر را بررسی می‌کند

echo "<h2>پوشه‌های موجود در سطح بالاتر:</h2><ul>";
$dirs = scandir($upperDir);
foreach ($dirs as $dir) {
    if ($dir !== "." && $dir !== "..") {
        echo "<li>$dir</li>";
    }
}
echo "</ul>";

echo "<p>مسیر سطح بالاتر: <strong>$upperDir</strong></p>";
?>
