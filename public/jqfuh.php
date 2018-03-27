<?php

/*
 * jQuery File Upload Plugin PHP Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */



//
//$folder = $_SESSION['jqfuh']['post-image-cache'];
//if (!$folder) {
//    $folder = uniqid();
//    $_SESSION['jqfuh']['post-image-cache'] = $folder;
//}

error_reporting(E_ALL | E_STRICT);
require('../app/Helpers/UploadHandler.php');
$upload_handler = new UploadHandler();
