<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $user->registration_no }} - License </title>
    <style>
        
        * {
            margin: 0;
            padding: 0;
        }
        p {
            margin: 0;
            padding: 0;    
        }

        body {
            font-family: 'solaimanlipi', sans-serif;
        }

        .root_wrap {
            width: 550px;
            margin: 0px 50px 0px 50px;
            padding-bottom: 20px;
            background-image: url("{{ asset('assets/static_uploads/bahon-card-background.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
        }

        img.logo {
            width: 80px;
            height: 70px;
            margin-top: 5px;
            margin-left: 20px;
        }

        .clearfix {
            box-sizing: border-box;
        }

        .box {
            float: left;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        img.picture {
            width: 150px;
            height: 150px;
            margin-left: 15px;
            margin-top: 20px;
        }

        .text-danger {
            color: red;
        }
    </style>
</head>
<body>
    <div class="root_wrap">
        <div class="clearfix">
            <div class="box" style="width: 25%;">
                <img class="logo" src="{{ Storage::url($user->pourashavaAdmin->pourashavaInfomation->logo) }}" alt="Logo">
            </div>
            <div class="box" style="width: 35%;">
                <p style="color: white; font-size: 22px; padding-top: 15px;">{{ $user->pourashavaAdmin->pourashavaInfomation->name }}</p>
            </div>
            <div class="box" style="width: 40%;">
                <p style="color: white; padding-top: 20px;"> (ইজি বাইক মালিকের লাইসেন্স) </p>
            </div>
        </div>

        <div class="clearfix">
            <div class="box" style="width: 33%;">
                <img class="picture" src="{{ Storage::url($user->picture) }}" alt="Picture">
                <p class="text-danger" style="margin-left: 45px; margin-top: 15px; font-size: 17px;"> রেজিষ্ট্রেশন নং: </p>
                <div style="padding-left: 46px;">
                    <span style="background: white;"> {{ $user->registration_no }} </span>
                </div>
            </div>
    
            <div class="box" style="width: 33%;">
                <div style="margin-left: 10px;">
                    <p class="text-danger"> মালিকের নাম: </p>
                    <p> {{ $user->name }} </p>

                    <p class="text-danger"> পিতার নাম: </p>
                    <p> {{ $user->father_or_husband_name }} </p>

                    <p class="text-danger"> জন্ম তারিখ: </p>
                    <p> {{ $user->birth_day->format('d-m-Y') }} </p>

                    <p> <span class="text-danger"> জাতীয়তা: </span> বাংলাদেশী </p>

                    <p class="text-danger"> জাতীয় পরিচয়পত্র নং: </p>
                    <p> {{ $user->nid_no }} </p>

                    <p class="text-danger"> স্থায়ী ঠিকানা: </p>
                    <p> {{ $user->permanent_address }} </p>
                </div>
            </div>
    
            <div class="box" style="width: 34%;">
                <p class="text-danger"> গাড়ীর ধরণ/শ্রেণী: </p>
                <p> {{ $user->vehicleType->type }} </p>

                <p class="text-danger"> মোবাইল নং: </p>
                <p> {{ $user->mobile }} </p>

                <div style="margin-top: 10px;">
                    <img src="data:image/png;base64, {!! base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')->size(120)->generate(url('/'))) !!}" alt="">
                    {{-- {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(120)->generate('https://bahon.trishalpourashava.com', 'card_qr.svg') !!} --}}
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="120" height="120" viewBox="0 0 100 100"><rect x="0" y="0" width="100" height="100" fill="#ffffff"/><g transform="scale(4)"><g transform="translate(0,0)"><path fill-rule="evenodd" d="M9 0L9 1L8 1L8 2L9 2L9 3L8 3L8 4L10 4L10 7L11 7L11 4L12 4L12 5L13 5L13 4L15 4L15 3L13 3L13 4L12 4L12 2L14 2L14 1L11 1L11 2L10 2L10 0ZM16 0L16 1L15 1L15 2L16 2L16 3L17 3L17 0ZM10 3L10 4L11 4L11 3ZM8 5L8 7L9 7L9 5ZM15 5L15 6L14 6L14 8L13 8L13 6L12 6L12 9L13 9L13 10L11 10L11 11L10 11L10 9L11 9L11 8L6 8L6 9L5 9L5 8L0 8L0 9L2 9L2 12L1 12L1 10L0 10L0 17L1 17L1 13L2 13L2 14L3 14L3 15L4 15L4 16L2 16L2 17L4 17L4 16L6 16L6 17L7 17L7 16L11 16L11 13L12 13L12 14L13 14L13 15L12 15L12 17L13 17L13 18L11 18L11 17L10 17L10 18L9 18L9 17L8 17L8 19L10 19L10 20L8 20L8 25L9 25L9 24L10 24L10 23L9 23L9 22L10 22L10 21L12 21L12 22L13 22L13 23L12 23L12 25L13 25L13 24L14 24L14 25L15 25L15 24L18 24L18 25L25 25L25 20L22 20L22 19L25 19L25 18L23 18L23 16L22 16L22 13L23 13L23 15L24 15L24 16L25 16L25 14L24 14L24 13L25 13L25 10L24 10L24 8L23 8L23 11L24 11L24 12L22 12L22 13L21 13L21 11L22 11L22 10L20 10L20 8L19 8L19 10L18 10L18 11L17 11L17 9L18 9L18 8L17 8L17 6L16 6L16 5ZM15 6L15 7L16 7L16 6ZM21 8L21 9L22 9L22 8ZM3 9L3 10L4 10L4 9ZM6 9L6 10L7 10L7 11L4 11L4 12L2 12L2 13L4 13L4 14L7 14L7 15L6 15L6 16L7 16L7 15L9 15L9 14L10 14L10 13L11 13L11 12L10 12L10 13L4 13L4 12L9 12L9 10L7 10L7 9ZM14 9L14 10L13 10L13 11L12 11L12 13L13 13L13 12L17 12L17 11L15 11L15 10L16 10L16 9ZM18 11L18 12L19 12L19 13L17 13L17 15L18 15L18 14L19 14L19 15L21 15L21 13L20 13L20 12L19 12L19 11ZM14 13L14 14L16 14L16 13ZM19 13L19 14L20 14L20 13ZM13 15L13 16L14 16L14 15ZM15 15L15 17L14 17L14 18L15 18L15 19L12 19L12 21L14 21L14 22L15 22L15 20L16 20L16 18L15 18L15 17L16 17L16 15ZM21 16L21 17L22 17L22 16ZM17 17L17 20L20 20L20 17ZM10 18L10 19L11 19L11 18ZM18 18L18 19L19 19L19 18ZM16 21L16 22L17 22L17 23L18 23L18 24L19 24L19 22L20 22L20 23L22 23L22 24L24 24L24 22L23 22L23 23L22 23L22 21L21 21L21 22L20 22L20 21L19 21L19 22L17 22L17 21ZM14 23L14 24L15 24L15 23ZM0 0L0 7L7 7L7 0ZM1 1L1 6L6 6L6 1ZM2 2L2 5L5 5L5 2ZM18 0L18 7L25 7L25 0ZM19 1L19 6L24 6L24 1ZM20 2L20 5L23 5L23 2ZM0 18L0 25L7 25L7 18ZM1 19L1 24L6 24L6 19ZM2 20L2 23L5 23L5 20Z" fill="#000000"/></g></g></svg> --}}
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="120" height="120" viewBox="0 0 120 120"><rect x="0" y="0" width="120" height="120" fill="#ffffff"/><g transform="scale(4.138)"><g transform="translate(0,0)"><path fill-rule="evenodd" d="M8 0L8 1L10 1L10 0ZM15 0L15 1L14 1L14 2L11 2L11 4L10 4L10 3L9 3L9 2L8 2L8 5L9 5L9 6L8 6L8 7L9 7L9 8L8 8L8 9L9 9L9 10L8 10L8 12L5 12L5 13L8 13L8 16L6 16L6 17L5 17L5 15L4 15L4 17L5 17L5 18L4 18L4 19L3 19L3 17L2 17L2 15L3 15L3 14L2 14L2 11L3 11L3 12L4 12L4 11L3 11L3 10L5 10L5 11L7 11L7 10L5 10L5 9L4 9L4 8L0 8L0 10L1 10L1 13L0 13L0 14L2 14L2 15L0 15L0 16L1 16L1 18L0 18L0 19L1 19L1 18L2 18L2 19L3 19L3 20L1 20L1 21L5 21L5 20L6 20L6 21L8 21L8 22L9 22L9 24L10 24L10 25L8 25L8 29L9 29L9 26L10 26L10 25L11 25L11 28L10 28L10 29L11 29L11 28L12 28L12 29L13 29L13 28L12 28L12 26L13 26L13 27L14 27L14 29L15 29L15 27L14 27L14 26L16 26L16 29L17 29L17 26L18 26L18 24L17 24L17 23L18 23L18 22L19 22L19 23L20 23L20 25L19 25L19 27L20 27L20 28L18 28L18 29L21 29L21 28L22 28L22 29L24 29L24 28L22 28L22 25L23 25L23 27L24 27L24 26L26 26L26 27L25 27L25 28L26 28L26 27L27 27L27 29L28 29L28 27L29 27L29 25L28 25L28 22L29 22L29 21L27 21L27 18L28 18L28 15L29 15L29 13L27 13L27 12L25 12L25 9L27 9L27 8L24 8L24 9L22 9L22 8L21 8L21 9L19 9L19 6L20 6L20 7L21 7L21 6L20 6L20 4L21 4L21 3L20 3L20 2L21 2L21 0ZM16 1L16 3L12 3L12 5L10 5L10 6L9 6L9 7L10 7L10 8L9 8L9 9L10 9L10 10L9 10L9 12L10 12L10 13L9 13L9 15L11 15L11 16L12 16L12 17L10 17L10 16L9 16L9 17L6 17L6 18L7 18L7 19L6 19L6 20L7 20L7 19L8 19L8 20L9 20L9 21L10 21L10 18L12 18L12 17L14 17L14 18L13 18L13 20L14 20L14 21L15 21L15 22L14 22L14 23L11 23L11 25L12 25L12 24L13 24L13 26L14 26L14 24L16 24L16 25L17 25L17 24L16 24L16 22L17 22L17 21L15 21L15 17L16 17L16 19L17 19L17 18L18 18L18 16L21 16L21 14L22 14L22 15L23 15L23 16L22 16L22 18L21 18L21 20L23 20L23 16L26 16L26 17L27 17L27 15L26 15L26 13L25 13L25 12L23 12L23 11L24 11L24 10L23 10L23 11L21 11L21 10L19 10L19 9L17 9L17 11L16 11L16 9L13 9L13 7L14 7L14 5L15 5L15 8L16 8L16 6L17 6L17 7L18 7L18 5L17 5L17 3L18 3L18 4L20 4L20 3L18 3L18 1ZM19 1L19 2L20 2L20 1ZM13 4L13 5L12 5L12 7L11 7L11 6L10 6L10 7L11 7L11 8L12 8L12 7L13 7L13 5L14 5L14 4ZM6 8L6 9L7 9L7 8ZM28 8L28 10L26 10L26 11L28 11L28 12L29 12L29 11L28 11L28 10L29 10L29 8ZM2 9L2 10L3 10L3 9ZM14 10L14 11L11 11L11 13L10 13L10 14L12 14L12 16L14 16L14 15L15 15L15 14L18 14L18 12L17 12L17 13L15 13L15 14L14 14L14 13L13 13L13 14L12 14L12 12L16 12L16 11L15 11L15 10ZM19 11L19 12L20 12L20 11ZM21 12L21 13L22 13L22 14L23 14L23 13L22 13L22 12ZM19 13L19 15L20 15L20 13ZM6 14L6 15L7 15L7 14ZM13 14L13 15L14 15L14 14ZM9 17L9 18L10 18L10 17ZM19 17L19 19L20 19L20 17ZM24 17L24 18L25 18L25 19L24 19L24 20L26 20L26 18L25 18L25 17ZM4 19L4 20L5 20L5 19ZM11 19L11 20L12 20L12 19ZM11 21L11 22L12 22L12 21ZM21 21L21 24L24 24L24 21ZM22 22L22 23L23 23L23 22ZM26 22L26 24L25 24L25 25L26 25L26 26L27 26L27 27L28 27L28 25L26 25L26 24L27 24L27 22ZM0 0L0 7L7 7L7 0ZM1 1L1 6L6 6L6 1ZM2 2L2 5L5 5L5 2ZM22 0L22 7L29 7L29 0ZM23 1L23 6L28 6L28 1ZM24 2L24 5L27 5L27 2ZM0 22L0 29L7 29L7 22ZM1 23L1 28L6 28L6 23ZM2 24L2 27L5 27L5 24Z" fill="#000000"/></g></g></svg> --}}
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>