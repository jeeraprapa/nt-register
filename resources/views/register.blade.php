@extends('base')

@section('content')
    <div class="row">
        <div class="col-md-7 text-center col-left">
            <img src="{{ asset('images/register.png') }}"/>
        </div>
        <div class="col-md-5 p-4">
            <div class="row">
                <div class="col-md-12 pt-5 text-center">
                    <img src="{{ asset('images/logo3.png') }}" width="55%"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pt-5">
                    <form method="post" action="{{ route('store') }}">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                       name="department"
                                       placeholder="หน่วยงาน *"
                                       value="{{ old('department') }}">
                                @if($errors->has('department'))
                                    <span class="error">{{ $errors->first('department') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="title"
                                       placeholder="คำนำหน้า *"
                                       value="{{ old('title') }}">
                                @if($errors->has('title'))
                                    <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                       name="first_name" placeholder="ชื่อ *"
                                       value="{{ old('first_name') }}"/>
                                @if($errors->has('first_name'))
                                    <span class="error">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                       name="last_name" placeholder="นามสกุล *"
                                       value="{{ old('last_name') }}"/>
                                @if($errors->has('last_name'))
                                    <span class="error">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="age"
                                       placeholder="อายุ" value="{{ old('age') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                       name="position" placeholder="ตำแหน่ง"
                                       value="{{ old('position') }}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="input-icons col-md-12">
                                <i class="fas fa-phone-alt icon"></i>
                                <input type="text" class="form-control input-field"
                                       name="telephone"
                                       placeholder="เบอร์โทรศัพท์หน่วยงาน *"
                                       value="{{ old('telephone') }}" maxlength="10">
                                @if($errors->has('telephone'))
                                    <span class="error">{{ $errors->first('telephone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="input-icons col-md-12">
                                <i class="fas fa-phone-alt icon"></i>
                                <input type="text" class="form-control input-field"
                                       name="mobile_phone"
                                       value="{{ old('mobile_phone') }}"
                                       placeholder="เบอร์โทรศัพท์มือถือ *"
                                       maxlength="10">

                                @if($errors->has('mobile_phone'))
                                    <span class="error">{{ $errors->first('mobile_phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" name="email"
                                       placeholder="E-mail *"
                                       value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control"
                                       placeholder="ที่อยู่ *"
                                       value="{{ old('address') }}">
                                @if($errors->has('address'))
                                    <span class="error">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group font-weight-bold">
                            ลงทะเบียนรับเสื้อที่ระลึก กรุณาระบุขนาด *
                        </div>
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="radio-toolbar">
                                    <input type="radio" id="size_s"
                                           name="size"
                                           value="S" {{ old('size') == 'S' ? 'checked':'' }}>
                                    <label for="size_s">S (รอบอก 36-38")</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="radio-toolbar">
                                    <input type="radio" id="size_m"
                                           name="size"
                                           value="M" {{ old('size') == 'M' ? 'checked':'' }}>
                                    <label for="size_m">M (รอบอก 38-40")</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="radio-toolbar">
                                    <input type="radio" id="size_l"
                                           name="size"
                                           value="L" {{ old('size') == 'L' ? 'checked':'' }}>
                                    <label for="size_l">L (รอบอก 40-42")</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="radio-toolbar">
                                    <input type="radio" id="size_xl"
                                           name="size"
                                           value="XL" {{ old('size') == 'XL' ? 'checked':'' }}>
                                    <label for="size_xl">XL (รอบอก 42-44")</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="radio-toolbar">
                                    <input type="radio" id="size_xxl"
                                           name="size"
                                           value="XXL" {{ old('size') == 'XXL' ? 'checked':'' }}>
                                    <label for="size_xxl">XXL (รอบอก 44-46")</label>
                                </div>
                            </div>
                            @if($errors->has('size'))
                                <div class="form-group col-md-12">
                                    <span class="error">{{ $errors->first('size') }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-warning col-md-12">
                                ลงทะเบียน
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
