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

      <div class="container">
        <h1 class="text-center mb-5">管理システム</h1>

        <form class="contact row">

          <div class="col-md-6 mt-5 flex-item">
            <label for="inputEmail4" class="col-form-label font-weight-bold col-lg-2 col-md-4 col-sm-4">お名前</label>
            <div class="col-sm-8">
              <input name="fullname" type="text" class="form-control" id="fullname">
            </div>
          </div>

          <div class="col-md-6 mt-5 flex-item">
            <label for="text3a" class="col-sm-2 col-lg-2 col-md-4 col-form-label font-weight-bold">性別</label>

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

          <div class="col-md-6 mt-5 flex-item">
            <label for="inputEmail4" class="col-form-label font-weight-bold col-lg-2 col-md-4 col-sm-4">登録日</label>
            <div class="col-sm-8">
              <input type="date" name="from" id="text3a" class="form-control" value="from">
            </div>
          </div>
          <div class="col-md-6 mt-5 flex-item">
            <label for="inputEmail4" class="col-form-label font-weight-bold col-lg-2 col-md-4 col-sm-4">〜</label>
            <div class="col-sm-8">
              <input type="date" name="until" id="text3a" class="form-control" value="until">
            </div>
          </div>

          <div class="col-12 mt-5 flex-item">
            <label for="inputAddress" class="col-form-label font-weight-bold col-lg-2 col-md-4 col-sm-5">メールアドレス</label>
            <div class="col-sm-8">
              <input name="email" type="text" class="form-control" id="email">
            </div>
          </div>

         <div class="d-flex flex-column btn-div mt-5">
           <button name="action" type="submit" value="submit" class="btn btn-dark">検索</button>
           <button name="action" type="reset" value="submit" class="reset-btn mt-3">リセット</button>

        </form>
      </div>



    <div class=" mt-5">

        <div class="container">
            @if(!empty($data))
            <div class="flex">
                @if (count($data) >0)
                <p>全{{ $data->total() }}件中
                    {{  ($data->currentPage() -1) * $data->perPage() + 1}} ~
                    {{ (($data->currentPage() -1) * $data->perPage() + 1) + (count($data) -1)  }}件</p>
                @else
                <p>データが見つかりませんでした。</p>
                @endif
                {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
            </div>
                <div class="my-2 p-0">
                    <div class="row  border-bottom text-center">
                        <div class="col-lg-1 font-weight-bold">
                            <p class="title">ID</p>
                        </div>
                        <div class="col-lg-2 font-weight-bold">
                            <p class="title">お名前</p>
                        </div>
                        <div class="col-lg-1 font-weight-bold">
                            <p class="title">性別</p>
                        </div>
                        <div class="col-lg-3 font-weight-bold">
                            <p class="title">メールアドレス</p>
                        </div>
                        <div class="col-lg-3 font-weight-bold">
                            <p class="title">ご意見</p>
                        </div>

                    </div>

                    @foreach($data as $item)
                            <div class="row py-2 text-center">
                                <div class="col-lg-1">
                                   {{ $item->id }}
                                </div>
                                <div class="col-lg-2">
                                    {{ $item->fullname }}
                                </div>
                                <div class="col-lg-1">
                                    {{ $item->gender }}
                                </div>
                                <div class="col-lg-3">
                                    {{ $item->email }}
                                </div>
                                <div class="col-lg-3" data-toggle="tooltip" title="{{$item->opinion}}">
                                    {{Str::limit($item->opinion, 50, '…' )}}
                                </div>
                                <form action="{{ route('contact.destroy', $item->id) }}" method="post" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <div class="col-lg-12 delete-btn">
                                        <button type="submit" class="btn btn-dark btn-sm">削除</button>
                                    </div>
                                </form>
                            </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>

<style>
    .contact {
      padding: 50px;
      padding-bottom: 50px;
      border: 1px solid black;
    }

    .title {
        font-size: 14px;
    }

    div {
        font-size: 14px;
    }

    .flex {
        display: flex;
        justify-content: space-between;
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

    .delete-btn {
        margin-left: 50px;
    }

    .flex-item {
        display: flex;
    }



    @media screen and (max-width:1000px){
    .delete-form {
            width: 100%;
            margin: 0 auto;
    }

    .title {
        display: none;
    }

    .flex {
        display: block;
    }

    .btn-div {
        width: 50%;
    }

    .delete-btn {
        margin-left: 0px;
    }
    }
  </style>
