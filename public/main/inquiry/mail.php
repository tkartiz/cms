<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
    <?php
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");

        $to = "tooruppo@gmail.com";
        $title = $_POST['title'];
        $message = $_POST['message'];
        $headers = "From: ". $_POST['email'];
        $headers .= "\r\n";
        $headers .= "Cc: tooruppo@gmail.com";

        if(mb_send_mail($to, $title, $message, $headers))
        {
            echo "メール送信成功です";
        }
        else
        {
            echo "メール送信失敗です";
        }
    ?>
    </body>
</html>