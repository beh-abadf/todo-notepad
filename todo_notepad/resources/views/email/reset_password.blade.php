<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <title>
        ToDo Notepad
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="..\css\ui.css">
    <link rel="stylesheet" href="..\css\common_styles.css">
    <link rel="stylesheet" href="..\css\email_styles.css">

    <style>
        @font-face {
            font-family: "Vazir";
            src: url("../fonts/Vazir.TTF") format("truetype");
        }

        .wrapper {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-align: right;
            position: absolute;
            display: flex;
            width: 100%;
            height: 100%;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <p dir="rtl" style="font-size: 18px;text-align:right;">
            <span>
                این پیام با هدف بازیابی گذرواژه برای
            </span><br>
            <span>
                این ایمیل آدرس ارسال شده است.
            </span><br><br>
            <span>
                می توانید از طریق لینک:
            </span><br><br>
            <span>
                {{ $url }}
            </span><br><br>
            <span>
                برای بازیابی گذرواژه اقدام نمایید.
            </span>
        </p>
    </div>
</body>

</html>
