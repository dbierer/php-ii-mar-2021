<?php
ob_start();
include 'header.html';
echo '<h1>TEST</h1>';
include 'footer.html';
$contents = ob_get_clean();
$contents= str_replace('%%COMPANY%%', 'Zend', $contents);
echo $contents;

