<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body style="padding: 100px 0;">
    {{-- <div class="conatiner">
        <form action="{{ route('contact.search') }}" method="get">
            {{-- <div class="form-inline"> --}}
                {{-- <div class="form-group row">
                    <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">お名前</label>
                    <div class="col-sm-10">
                    <input name="fullname" type="text" class="form-control" id="fullname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">性別</label>
                    <div class="form-check form-check-inline">
                        <input  class="form-check-input" type="radio" id="radio2a" name="gender" value="全て" checked id="gender">
                        <label class="form-check-label" for="radio2a">全て</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="radio2a" name="gender" value="男性" id="gender">
                        <label class="form-check-label" for="radio2a">男性</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="radio2a" name="gender" value="女性" id="gender">
                        <label class="form-check-label" for="radio2b">女性</label>
                      </div>
                </div> --}}
            {{-- </div> --}}
            {{-- <div class="form-inline">
                <div class="form-group row">
                    <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">登録日</label>
                    <div class="col-sm-10">
                    <input type="date" name="from" id="text3a" class="form-control" value="from">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">~</label>
                    <div class="col-sm-10">
                    <input type="date" name="until" id="text3a" class="form-control" value="until">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">メールアドレス</label>
                <div class="col-sm-10">
                <input name="email" type="text" class="form-control" id="email">
                </div>
            </div> --}}
            {{-- <button name="action" type="submit" value="submit" class="btn btn-dark">検索</button> --}}
            {{-- <button name="action" type="submit" value="submit" class="btn btn-dark">リセット</button> --}}
        {{-- </form> --}}
    {{-- </div> --}}

    <div class="container">
        <h1 class="text-center mb-5">管理システム</h1>

        <form class="row">

          <div class="col-md-6 mt-5">
            <label for="inputEmail4" class="col-form-label font-weight-bold col-sm-2">お名前</label>
            <div class="form-check-inline">
              <input name="fullname" type="text" class="form-control" id="fullname">
            </div>
          </div>

          <div class="col-md-6 mt-5">
            <label for="text3a" class="col-sm-2 col-form-label font-weight-bold">性別</label>
              <div class="form-check form-check-inline">
                <input  class="form-check-input" type="radio" id="radio2a" name="gender" value="全て" checked id="gender">
                <label class="form-check-label" for="radio2a">全て</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="radio2a" name="gender" value="男性" id="gender">
                <label class="form-check-label" for="radio2a">男性</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="radio2a" name="gender" value="女性" id="gender">
                <label class="form-check-label" for="radio2b">女性</label>
              </div>
          </div>

          <div class="col-md-6 mt-5">
            <label for="inputEmail4" class="col-form-label font-weight-bold col-sm-2">登録日</label>
            <div class="form-check-inline">
              <input type="date" name="from" id="text3a" class="form-control" value="from">
            </div>
          </div>
          <div class="col-md-6 mt-5">
            <label for="inputEmail4" class="col-form-label font-weight-bold col-sm-2">〜</label>
            <div class="form-check-inline">
              <input type="date" name="until" id="text3a" class="form-control" value="until">
            </div>
          </div>
          <div class="col-12 mt-5">
            <label for="inputAddress" class="col-form-label font-weight-bold col-sm-2">メールアドレス</label>
            <div class="form-check-inline">
              <input name="email" type="text" class="form-control" id="email">
            </div>
          </div>
          <div class="text-center mt-5 col-12">
           <button name="action" type="submit" value="submit" class="btn btn-dark">検索</button>
           <button name="action" type="reset" value="submit" class="btn btn-dark">リセット</button>
          </div>

        </form>
      </div>



    <div class=" mt-5">

        <div class="container">
            <!--検索ボタンが押された時に表示されます-->
            @if(!empty($data))
            {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
                <div class="my-2 p-0">
                    <div class="row  border-bottom text-center">
                        <div class="col-lg-1">
                            <p>ID</p>
                        </div>
                        <div class="col-lg-2">
                            <p>お名前</p>
                        </div>
                        <div class="col-lg-2">
                            <p>メールアドレス</p>
                        </div>
                        <div class="col-lg-3">
                            <p>ご意見</p>
                        </div>

                    </div>

                    @foreach($data as $item)
                            <div class="row py-2 border-bottom text-center">
                                <div class="col-lg-1">
                                   {{ $item->id }}
                                   {{-- {{$item->created_at}} --}}
                                </div>
                                <div class="col-lg-2">
                                    {{ $item->fullname }}
                                </div>
                                <div class="col-lg-3">
                                    {{ $item->email }}
                                </div>
                                <div class="col-lg-3">
                                    {{Str::limit($item->opinion, 50, '…' )}}
                                </div>
                                {{-- <form action="{{ route('contact.destroy') }}" method="post">
                                    <div class="col-lg-1">
                                        <button class="btn btn-dark">削除</button>
                                    </div>
                                </form> --}}
                            </div>
                    @endforeach
                </div>
                {{-- {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }} --}}
            @endif
        </div>
    </div>
</div>
</body>
</html>

<style>
    form {
      padding: 50px;
      padding-bottom: 100px;
      border: 1px solid black;
    }
  </style>
