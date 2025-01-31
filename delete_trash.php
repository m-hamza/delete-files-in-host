<?php
function deleteTrash($dir) {
    if (!is_dir($dir)) {
        echo "پوشه سطل آشغال یافت نشد: $dir";
        return;
    }

    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === "." || $file === "..") continue;
        $fullPath = $dir . DIRECTORY_SEPARATOR . $file;

        if (is_dir($fullPath)) {
            chmod($fullPath, 0755); // سطح دسترسی پوشه‌ها را تغییر می‌دهد
            deleteTrash($fullPath); // حذف محتویات داخل پوشه
            rmdir($fullPath); // حذف خود پوشه
        } else {
            chmod($fullPath, 0644); // سطح دسترسی فایل‌ها را تغییر می‌دهد
            unlink($fullPath); // حذف فایل
        }
    }
    echo "✅ تمام فایل‌های سطل آشغال حذف شدند.";
}

// مسیر دقیق `.trash` را از روش قبلی جایگزین کنید
$trashPath = dirname(__DIR__) . '/.trash'; // یک سطح بالاتر

deleteTrash($trashPath);
?>
