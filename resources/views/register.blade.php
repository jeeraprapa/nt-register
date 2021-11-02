<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NT</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'NT', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        @font-face {
            font-family: 'NT';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/NTRegular.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'NT';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('fonts/NTBold.ttf') }}") format('truetype');
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .form-group{
            margin-bottom: 0.65rem;
        }
        .btn-primary {
            background-color: purple;
            border-color: purple;
            border-radius: 25px;
        }
        #wrapper {
            overflow: hidden;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<div id="wrapper" class="flex-center position-ref full-height">
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-center">
                <img src="{{ asset('images/logo4.png') }}" width="639"/>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12"><h1>ลงทะเบียน</h1></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{ route('store') }}">
                        @csrf
                            <div class="form-group">
                                <label>หน่วยงาน</label>
                                <input type="text" class="form-control" name="department" placeholder="หน่วยงาน">
                            </div>
                            <div class="form-group mb-0 {{ $errors->has('title') || $errors->has('first_name') || $errors->has('last_name')?'error':'' }}"><label>ชื่อผู้เข้าร่วมสัมมนา *</label></div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <select name="title" class="form-control">
                                        <option value="">-- คำนำหน้า --</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                    @if($errors->has('title'))
                                        <span class="error">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 {{ $errors->has('first_name')?'error':'' }}">
                                    <input type="text" class="form-control"
                                           name="first_name" placeholder="ชื่อ"/>
                                    @if($errors->has('first_name'))
                                        <span class="error">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 {{ $errors->has('last_name')?'error':'' }}">
                                    <input type="text" class="form-control"
                                           name="last_name" placeholder="นามสกุล"/>
                                    @if($errors->has('last_name'))
                                        <span class="error">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>อายุ (ปี)</label>
                                    <input type="number" class="form-control" name="age" placeholder="อายุ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>ตำแหน่ง</label>
                                <input type="text" class="form-control" name="position" placeholder="ตำแหน่ง">
                            </div>
                            <div class="form-group">
                                <label>เบอร์โทรศัพท์หน่วยงาน</label>
                                <input type="number" class="form-control" name="telephone" placeholder="เบอร์โทรศัพท์หน่วยงาน">
                            </div>
                            <div class="form-group {{ $errors->has('mobile_phone')?'error':'' }}">
                                <label>เบอร์โทรศัพท์มือถือ *</label>
                                <input type="number" class="form-control" name="mobile_phone" placeholder="เบอร์โทรศัพท์มือถือ">
                                @if($errors->has('mobile_phone'))
                                    <span class="error">{{ $errors->first('mobile_phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group  {{ $errors->has('email')?'error':'' }}">
                                <label>อีเมล *</label>
                                <input type="email" class="form-control" name="email" placeholder="อีเมล">
                                @if($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>ที่อยู่ *</label>
                                <textarea name="address" class="form-control" rows="3" cols="2" placeholder="ที่อยู่"></textarea>
                            </div>
                            <div class="form-group mb-0"><label>ลงทะเบียนรับเสื้อที่ระลึก <small>(กรุณาระบุไซส์)</small></label></div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" id="size_s" value="S">
                                        <label class="form-check-label" for="size_s">
                                            S (รอบอก 36-38")
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" id="size_m" value="M">
                                        <label class="form-check-label" for="size_m">
                                            M (รอบอก 38-40")
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" id="size_l" value="L">
                                        <label class="form-check-label" for="size_l">
                                            L (รอบอก 40-42")
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" id="size_xl" value="XL">
                                        <label class="form-check-label" for="size_xl">
                                            XL (รอบอก 42-44")
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" id="size_xxl" value="XXL">
                                        <label class="form-check-label" for="size_xxl">
                                            XXL (รอบอก 42-44")
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="accept">
                                <label class="form-check-label" for="accept">ฉันยอมรับเงื่อนไข</label>
                            </div>

                            <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('_modals')
</body>
</html>
