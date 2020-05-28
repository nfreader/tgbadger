<?php
require_once(__DIR__."/../config.php");
$icons = [];
$fileinfos = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator(OUTPUT_DIR."/mob/clothing/under"));
foreach($fileinfos as $pathname => $fileinfo) {
  if (strpos($pathname,'.json')) {
    $path = explode('/',$pathname);
    array_pop($path);
    $path = implode('/',$path);
    $path = str_replace(OUTPUT_DIR."/mob/clothing/under",'', $path);
    foreach (json_decode(file_get_contents($pathname)) as $icon){
      $icons[] = "$path/$icon";
    } 
  }
}
$file = fopen(OUTPUT_DIR."/mob/clothing/under/under.json", 'w');
fwrite($file, json_encode($icons));
fclose($file);

$icons = [];
$fileinfos = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator(OUTPUT_DIR."/mob/inhands"));
foreach($fileinfos as $pathname => $fileinfo) {
  if (strpos($pathname,'.json')) {
    $path = explode('/',$pathname);
    array_pop($path);
    $path = implode('/',$path);
    $path = str_replace(OUTPUT_DIR."/mob/inhands",'', $path);
    foreach (json_decode(file_get_contents($pathname)) as $icon){
      $icons[] = "$path/$icon";
    } 
  }
}
$file = fopen(OUTPUT_DIR."/mob/inhands/inhands.json", 'w');
fwrite($file, json_encode($icons));
fclose($file);