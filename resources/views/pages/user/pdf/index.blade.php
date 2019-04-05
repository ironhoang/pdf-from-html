<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laravel Rocket</title>
    <link  rel="stylesheet" href="{{ url('static/user/css/hsbc.css') }}">
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<div class="box__area">
    <form action="{{ action('User\IndexController@pdf1') }}" method="post">
    <div class="page-pdf">
        <div class="header">
            <div class="logo">
                <img style="width:40%" src="{{ url('images/hsbc-logo.png') }}">
            </div>

        </div>

        <div class="content">
            {{ csrf_field() }}
            <p>Mr <input name="person_name" value="H Simpson" required></p>
            <p>
                @if(isset($data['address_1']) )
                    {{$data['address_1'] }}
                @else
                <input name="address_1" value="39 The Road" required>
                @endif
            </p>
            <p>The Town</p>
            <p>The County</p>
            <p>AA11 1AA</p>

            <p class="text-right date-right">13 Decem ber 2018</p>

            <p>Dear Mr Simpson</p>
            <p>Thank you for your recent enquiry.</p>
            <p>Please find enclosed the Mortgage documents.</p>
            <p>Yours sincerely</p>
            <p>Your HSBC Banking Team</p>
        </div>
        <div class="bootom-content">
            <p>Your home may be repossessed if you do not ke ep up repayments on your mortgage .</p>
            <p>HSBC UK Bank plc, Customer Information Service, PO Box 757, Hemel Hempstead, Hertfordshire HP2 4SS.</p>
            <p class="text-italic">Registered in England number 9928412. Registered Office : 1 Centenary Square , Birmingham B1 1HQ</p>
            <p class="text-italic">Authorised by the Prudential Regulation Authority and regulated by the Financial Conduct Authority and the Prudential Regulation Authority. Our firm
            reference number is 765112</p>
        </div>
    </div>
    <div class="page-break"></div>
        <button type="submit"> Submit</button>
    </form>
</div>
</body>
</html>
