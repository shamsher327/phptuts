<?php


downloadfile();

function downloadfile() {
  $file_path = getcwd() . '/ar.po';
  header('Content-Type: application/octet-stream');
  header("Content-Transfer-Encoding: Binary");
  header("Content-disposition: attachment; filename=\"" . basename($file_path) . "\"");
  readfile($file_path);


}