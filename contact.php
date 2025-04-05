

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ... (ໂຄດ PHP ຂອງທ່ານ) ...
?>

<?php
// var_dump($_POST);
// var_dump($_FILES);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['originalLanguage'])    &&
	isset($_POST['targetLanguage'])   &&
	isset($_POST['serviceType'])   &&
	isset($_FILES['form_fields']) && // ປ່ຽນເປັນ $_FILES
	isset($_POST['name'])   &&
	isset($_POST['email'])   &&
	isset($_POST['phoneNamber'])   &&
    isset($_POST['subject']) &&
    isset($_POST['text'])) {

   $originalLanguage = $_POST['originalLanguage'];
	$targetLanguage = $_POST['targetLanguage'];
	$serviceType = $_POST['serviceType'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phoneNamber = $_POST['phoneNamber'];
	$subject = $_POST['subject'];
	$text = $_POST['text'];
	$files = $_FILES['form_fields']; // ດຶງຂໍ້ມູນໄຟລ໌ຈາກ $_FILES
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = ['success' => false, 'message' => 'Invalid email format'];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    if (empty($originalLanguage) || empty($targetLanguage) || empty($name) || empty($subject) || empty($text)) {
        $response = ['success' => false, 'message' => 'ກະລຸນາຕື່ມຂໍ້ມູນໃຫ້ຄົບຖ້ວນ..'];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'techart.translation@gmail.com';
        $mail->Password = 'imex txlp ufeq mlsx';
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->setFrom($email, $name);
        $mail->addAddress('techart.translation@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->CharSet = 'UTF-8';
        $mail->Body = "
            <div style='font-family: \"Noto Sans Lao\", sans-serif;'>
                <h3 style='font-style: italic;color:green;' >ສະບາຍດີບໍລິສັດເທັກອາດ ຂ້າພະເຈົ້າສົນໃຈບໍລິການແປພາສາ (ຂ້າພະເຈົ້າຊື່: $name ) ລາຍລະອຽດດັ່ງນີ້: </h3>
                <p><strong> Original Language (ພາສາຕົ້ນສະບັບ)</strong>: $originalLanguage</p>
                <p><strong> Language Service (ພາສາທີຕ້ອງການແປ) </strong>: $targetLanguage</p>
                <p><strong>Service Type (ປະເພດການແປ)</strong>: $serviceType</p>
                <p><strong>My Name (ຊື່ຂອງຂ້ອຍ)</strong>: $name</p>
                <p><strong>Email (ທີ່ຢູ່ອີເມວ)</strong>: $email</p>
                <p><strong>Phone Number (ເບີໂທລະສັບ)</strong>: $phoneNamber</p>              
                <p><strong>Message (ລາຍລະອຽດເພີ່ມເຕີ່ມ) </strong>: $text</p>
                <h3 style='font-style: italic;color:green;'>ເມືອທ່ານເຫັນຂໍ້ຄວາມນີ້ລົບກວນຕອບກັບຂ້າພະເຈົ້າດ້ວຍ ຈາກ $name</h3>
            </div>
        ";

        $fileCount = count($files['name']);
        for ($i = 0; $i < $fileCount; $i++) {
            if ($files['error'][$i] === UPLOAD_ERR_OK) {
                $mail->addAttachment($files['tmp_name'][$i], $files['name'][$i]);
            }
        }

        $mail->send();
        $response = ['success' => true, 'message' => 'ສົ່ງຂໍ້ຄວາມສຳເລັດ (Message sent successfully.)'];
    } catch (Exception $e) {
        $response = ['success' => false, 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
