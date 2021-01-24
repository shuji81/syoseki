@include('layout.head') 
<title>SyosekiSystem</title>
</head>
<body data-spy="scroll" data-target="#navbar">
  @include('layout.nav') 
  <div class="container">
    <div class="row" style="margin-bottom: 30px;">
      <form action class="form-inline" method="get">
        <div class="col-sm-8" style="margin-bottom: 10px;">
          <div class="form-group">
            <input type="text" name="keyword" class="form-control" placeholder="検索キーワード">
          </div>
        </div>
        <div class="col-sm-2" style="margin-bottom: 10px;">
          <input type="submit" class="btn btn-primary" value="検索">
        </div>
      </form>
      <div class="col-sm-2">
        <a href="./edit" class="btn btn-secondary">新規登録</a>
      </div>
    </div>
    <div class="ml5">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>category</th>
            <th>num</th>
            <th>operation</th>
          </tr>
        </thead>
        @if (isset($items))
          @foreach($items as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->category}}</td>
              <td>{{$item->num}}</td>
              <td>
                <a href="./edit?id={{$item->id}}" class="btn btn-primary btn-md ">編集</a>
                <form action="./delete" method="post" onsubmit="return confirmPopup('削除')">
                @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <input type="submit" value="削除" class="btn btn-danger btn-md btn-dell">
                </form>
              </td>
            </tr>
          @endforeach
        @endif
      </table>
    </div>
  </div>
</body>
@include('layout.foot') 
</html>