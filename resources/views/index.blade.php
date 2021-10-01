<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-ja.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">
        jQuery(document).ready(function(){
           jQuery("#form").validationEngine();
        });
        </script>

</head>

<body style="padding: 50px;">

<div class="container">
    <h1 class="mb-3 text-center">お問い合わせ</h1>
    <form method="post" action="{{ route('contact.confirm') }}" id="form">
        @csrf

        <div class="form-group row mt-5">
            <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">お名前 <span>※</span></label>
            <div class="col-sm-10">
              <input name="fullname" type="text" class="form-control validate[required]" value="{{ old('fullname') }}" id="fullname">
              <div class="form-text text-muted">例）山田 太朗</div>
              @if ($errors->has('fullname'))
                <p class="error-message">{{ $errors->first('fullname') }}</p>
              @endif
            </div>
        </div>

        <div class="form-group row mt-5">
            <label for="radio01" class="col-sm-2 col-form-label font-weight-bold">性別 <span>※</span></label>
            <div class="col-md-6  form-check form-check-inline">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="radio2a" name="gender" value="男性" {{ old('gender') === '男性' ? 'checked' : '' }} checked id="gender">
                    <label class="form-check-label" for="radio2a">男性</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="radio2b" name="gender" value="女性" {{ old('gender') === '女性' ? 'checked' : '' }} id="gender">
                    <label class="form-check-label" for="radio2b">女性</label>
                </div>
            </div>
            @if ($errors->has('gender'))
                <p class="error-message">{{ $errors->first('gender') }}</p>
            @endif
        </div>

        <div class="form-group row mt-5">
            <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">メールアドレス <span>※</span></label>
            <div class="col-sm-10">
              <input name="email" type="text" class="form-control validate[required,custom[email]]" value="{{ old('email') }}" id="email">
              <div class="form-text text-muted">例）test.example.com</div>
              @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
              @endif
            </div>
        </div>

        <div class="form-group row mt-5">
            <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">郵便番号 <span>※</span></label>
            <div class="col-sm-10">
                <div class="flex">
                    <span class="postcode">〒</span>
                    <input name="postcode" type="text" class="form-control validate[required]" value="{{ old('postcode') }}"  id="postcode" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" >
                </div>
              <div class="form-text text-muted">例）123-4567</div>
              @if ($errors->has('postcode'))
                <p class="error-message">{{ $errors->first('postcode') }}</p>
              @endif
            </div>
        </div>

        <div class="form-group row mt-5">
            <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">住所 <span>※</span></label>
            <div class="col-sm-10">
              <input name="address" type="text" class="form-control validate[required]" value="{{ old('address') }}" id="address" id="address">
              <div class="form-text text-muted">例）東京都渋谷区千駄ヶ谷1-2-3</div>
              @if ($errors->has('address'))
                <p class="error-message">{{ $errors->first('address') }}</p>
              @endif
            </div>
        </div>

        <div class="form-group row mt-5">
            <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">建物名</label>
            <div class="col-sm-10">
             <input name="building_name" type="text" class="form-control" value="{{ old('building_name') }}">
              <div class="form-text text-muted">例）千駄ヶ谷マンション101</div>
            </div>
        </div>

        <div class="form-group row mt-5">
            <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">ご意見 <span>※</span></label>
            <div class="col-sm-10">
              <textarea rows="5" name="opinion" type="text" class="form-control validate[required,maxSize[120]]" id="opinion"> {{ old('opinion') }}</textarea>
              @if ($errors->has('opinion'))
                <p class="error-message">{{ $errors->first('opinion') }}</p>
              @endif
            </div>
        </div>
        <div class="text-center">
            <button name="action" type="submit" value="submit" class="btn btn-dark btn-lg">確認</button>
        </div>
    </form>
</div>



</body>

<style>
    span {
        color: red;
    }

    .error-message {
        color: red;
    }

    .flex {
        display: flex;
    }

    .postcode {
        color: black;
        margin-top: 5px;
        margin-right: 10px;
        font-weight: bold;
    }

</style>


<script>

$(function() {
  $('#postcode').on('input', function() {

    let text = $(this).val();

    let normalizedText = text.replace(/[！-～]/g,function(s){
      return String.fromCharCode(s.charCodeAt(0)-0xFEE0);
    });
    normalizedText = jQuery.trim(normalizedText)
        .replace(/ /g,"")
        .replace(/　/g,"")
        .replace(/￥/g,"\\")
        .replace(/〜/g,"~")
        .replace(/’/g,"'")
        .replace(/”/g,"\"")
        .replace(/ー/g,"-");

    $(this).val(normalizedText);
  });
});


</script>
