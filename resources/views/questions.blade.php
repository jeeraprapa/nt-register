@extends('base')

@section('content')

    <div class="row flex-center p-4">
        <div class="col-md-3 col-left">
            <img src="{{ asset('images/logo3.png') }}" width="295"/>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row flex-center">
        <div class="col-md-9 text-center">
           <h1>ส่งรหัสลงทะเบียน <br />เพื่อร่วมสนุก</h1>
        </div>
    </div>

    <div class="row flex-center">
        <div class="col-md-9 pt-2">
            <form method="post"
                  action="{{ route('question.store', $question->slug) }}">
                @csrf
                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="number" class="form-control"
                               name="register_id"
                               placeholder="รหัสลงทะเบียน *"
                               value="{{ old('register_id') }}">
                        @if($errors->has('register_id'))
                            <span class="error">{{ $errors->first('register_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group mt-4 flex-center">
                    <button type="submit"
                            class="btn btn-warning text-question col-md-3">
                        ส่งคำตอบ
                    </button>
                </div>
            </form>
        </div>
@stop