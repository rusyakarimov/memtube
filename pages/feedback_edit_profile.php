<?php
require_once ROOT_DIR . '/inc/config.php';
require_once ROOT_DIR . '/inc/connect.php';

if ($_SESSION['auth'] or $_SESSION['status'] == 1) {

    $name = htmlspecialchars(stripslashes($_POST['name']));
    $email = htmlspecialchars(stripslashes($_POST['email']));
    $dir = ROOT_DIR . '/user_pic/';

    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (
            !isset($_FILES['userfile']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
            $error = 1;
        }

        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES['userfile']['error']) {
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
        if ($_FILES['userfile']['size'] > 2097152) { // 2MB
            throw new RuntimeException('Exceeded filesize limit.');
            $error = 1;
        }

        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES['userfile']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
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
            $_FILES['userfile']['tmp_name'],
            $dir . $_FILES['userfile']['name']
        )) {
            throw new RuntimeException('Failed to move uploaded file.');
            $error = 1;
        }
        $file1 = true;
    } catch (RuntimeException $e) {

        echo $e->getMessage();
        header("Location: error_page");
    }

    if ($error == 1) header("Location: error_page");
    if ($error !== 1) {
        $update = $db->query('UPDATE users SET `username` = ?, `email` = ?, `profile_pic` = ? WHERE `username` = ?', $name, $email, $_FILES['userfile']['name'], $_SESSION['name'])->affectedRows();
        header('Location: profile');
    } else {
        header('Location: error_page');
    }
} else {
    header('Location: error_page');
}
