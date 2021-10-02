<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

<div class="container">
    <h1 class="mb-3 font-weight-bold text-center">内容確認</h1>
    <form method="post" action="{{ route('contact.process') }}" class="col-lg-12">
        @csrf
        <div class="row pt-5 mt-5 text-center">
            <label for="text3a" class="col-lg-6 col-md-6 col-sm-6 col-form-label font-weight-bold text-center">お名前</label>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center">
                {{ $inputs['fullname'] }}
            </div>
            <input type="hidden" value="{{ $inputs['fullname_A'] }}" name="fullname_A">
            <input type="hidden" value="{{ $inputs['fullname_B'] }}" name="fullname_B">
            <input class="form-control" type="hidden" name="fullname" value="{{ $inputs['fullname'] }}">
        </div>

        <div class="row mt-5 text-center">
                <label for="text3a" class="col-lg-6 col-md-6 col-sm-6 col-form-label text-left text-center font-weight-bold">性別</label>
                <div class="col-lg-2 col-md-6 col-sm-6 text-center">
                    {{ $inputs['gender'] }}
                </div>
                <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
        </div>

        <div class="row mt-5 text-center">
            <label for="text3a" class="col-lg-6 col-md-6 col-sm-6 col-form-label text-center font-weight-bold">メールアドレス</label>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center">
                {{ $inputs['email'] }}
            </div>
            <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        </div>

        <div class="row mt-5 text-center">
            <label for="text3a" class="col-lg-6 col-md-6 col-sm-6 col-form-label text-center font-weight-bold">郵便番号</label>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center">
                {{ $inputs['postcode'] }}
            </div>
            <input type="hidden" name="postcode" value="{{ $inputs['postcode'] }}">
        </div>

        <div class="row mt-5 text-center">
            <label for="text3a" class="col-lg-6 col-md-6 col-sm-6 col-form-label text-center font-weight-bold">住所</label>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center">
                {{ $inputs['address'] }}
            </div>
            <input type="hidden" name="address" value="{{ $inputs['address'] }}">
        </div>

        <div class="row mt-5 text-center">
            <label for="text3a" class="col-lg-6 col-md-6 col-sm-6 col-form-label text-center font-weight-bold">建物名</label>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center">
                {{ $inputs['building_name'] }}
            </div>
            <input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}">
        </div>

        <div class="row mt-5 text-center">
            <label for="text3a" class="col-lg-6 col-md-6 col-sm-6 col-form-label text-center font-weight-bold">ご意見</label>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center">
                {{ $inputs['opinion'] }}
            </div>
            <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}">
        </div>

        <div class="d-flex flex-column btn-div mt-5">
            <button name="submit" type="submit" value="submit" class="btn btn-dark">送信</button>
            <button name="back" type="submit" value="back" class="reset-btn mt-3">修正する</button>
        </div>
    </form>
</div>
</body>


<style>
    body {
        padding: 50px;

    }

    form {
        width: 100%;
        margin: 0 auto;
    }

    .btn-div {
        width: 10%;
        margin: 0 auto;
    }

    .reset-btn {
        text-decoration: underline;
        border: none;
        background: white;
    }

    @media screen and (max-width:1000px){
        .btn-div {
        width: 50%;
    }
    }
</style>

