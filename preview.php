<?php
$file = $_GET["file"];
$mime = mime_content_type($file);
header("Content-type: $mime");
readfile($file);
