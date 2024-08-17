<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if ($email) {
        $to = 'ameenalalimi.dev@gmail.com';
        $subject = "رسالة من $name عبر نموذج الاتصال";
        $body = "الاسم: $name\nالبريد الإلكتروني: $email\n\nالرسالة:\n$message";

        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "تم إرسال الرسالة بنجاح.";
        } else {
            echo "حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة لاحقًا.";
        }
    } else {
        echo "البريد الإلكتروني غير صحيح.";
    }
} else {
    echo "طريقة الإرسال غير صحيحة.";
}
