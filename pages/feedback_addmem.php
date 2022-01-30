<?php
/* based on script from official site PHP */
/* for each of the 2 files there are separate checks */

/* 
$name - string, name 
$desc - string, description
$cat = id from catalog
$dir - directory for download   
*/

require_once ROOT_DIR . '/inc/connect.php';

$name = htmlspecialchars(stripslashes($_POST['name']));
$desc = htmlspecialchars(stripslashes($_POST['desc']));
$cat = $_POST['cat'];

$dir = ROOT_DIR . '/loads/';
/* First File - Video mp4 or Gif */
try {

    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['userfile']['error'][0])
    ) {
        throw new RuntimeException('Invalid parameters.');
        $error = 1;
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES['userfile']['error'][0]) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
            $error = 1;
    }

    // You should also check filesize here.
    if ($_FILES['userfile']['size'][0] > 10485760) { // 10MB
        throw new RuntimeException('Exceeded filesize limit.');
        $error = 1;
    }

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['userfile']['tmp_name'][0]),
        array(
            'mp4' => 'video/mp4',
            'gif' => 'image/gif',
        ),
        true
    )) {
        throw new RuntimeException('Invalid file 0 format.');
        $error = 1;
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    if (!move_uploaded_file(
        $_FILES['userfile']['tmp_name'][0],
        $dir . $_FILES['userfile']['name'][0]
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
        $error = 1;
    }
    $file1 = true;
} catch (RuntimeException $e) {

    echo $e->getMessage();
    header("Location: error_page");
}


/* Second File - Preview image jpg or png*/

if (!$file1) { //file 1 download?
    header("Location: error_page");
} else {

    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (
            !isset($_FILES['userfile']['error'][1])
        ) {
            throw new RuntimeException('Invalid parameters.');
            $error = 1;
        }

        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES['userfile']['error'][1]) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
                $error = 1;
        }

        // You should also check filesize here.
        if ($_FILES['userfile']['size'][1] > 2097152) { // 2MB
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES['userfile']['tmp_name'][1]),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
            ),
            true
        )) {
            throw new RuntimeException('Invalid file 1 format.');
            $error = 1;
        }

        // You should name it uniquely.
        // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.
        if (!move_uploaded_file(
            $_FILES['userfile']['tmp_name'][1],
            $dir . $_FILES['userfile']['name'][1]
        )) {
            throw new RuntimeException('Failed to move uploaded file.');
            $error = 1;
        }

        if ($error == 1) header("Location: error_page");
        if ($error !== 1) {
            $insert = $db->query(
                'INSERT INTO `files` (`id_cat`,`file`,`name`, `desc`,`time`,`date`,`user`,`pic`)
                VALUES (?,?,?,?,?,?,?,?)',
                $cat,
                $_FILES['userfile']['name'][0],
                $name,
                $desc,
                time(),
                date("d.m.y"),
                $_SESSION['name'],
                $_FILES['userfile']['name'][1]
            )->affectedRows();
            header("Location: /main");
        } else {
            header("Location: error_page");
        }
    } catch (RuntimeException $e) {

        echo $e->getMessage();
        header("Location: error_page");
    }
}

require ROOT_DIR . '/inc/footer.php';
