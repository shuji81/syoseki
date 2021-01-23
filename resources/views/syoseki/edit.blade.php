@include('layout.head') 
<title>SyosekiSystem</title>
</head>
<body data-spy="scroll" data-target="#navbar">
  @include('layout.nav') 
  <div class="container">
    <form action="./edit/update" class="form-inline" method="post">
    @csrf
        <div class="container-fluid">
            <div class="row align-items-center" style="margin-bottom: 30px;">
                <label class="col-md-2 text-center">書籍名</label>
                <div class="col-md-10 text-center">
                    <div class="form-group">
                    @if (isset($id))
                        <input type="hidden" name="id" value="{{$id}}">   
                        <input type="text" name="name" class="form-control" value="{{$name}}">
                    @else
                        <input type="text" name="name" class="form-control">
                    @endif
                    </div>
                </div>
            </div>
            <div class="row align-items-center" style="margin-bottom: 30px;"> 
                <label class="col-md-2">カテゴリー</label>
                <div class="col-md-10" style="margin-bottom: 10px;">
                    <div class="form-group">
                    @if (isset($id))   
                        <input type="text" name="category" class="form-control" value="{{$category}}">
                    @else
                        <input type="text" name="category" class="form-control">
                    @endif
                    </div>
                </div>
            </div>
            <div class="row align-items-center" style="margin-bottom: 30px;"> 
                <label class="col-md-2">冊数</label>
                <div class="col-md-10" style="margin-bottom: 10px;">
                    <div class="form-group">
                    @if (isset($id))
                        <input type="text" name="num" class="form-control" value="{{$num}}">
                    @else
                        <input type="text" name="num" class="form-control">
                    @endif
                    </div>
                </div>
            </div>
            <div class="row align-items-center" style="margin-bottom: 30px;"> 
                <div class="col-md-6 text-center">
                    <input type="submit" value="更新" class="btn btn-primary">
                </div>
                <div class="col-md-6 text-center">
                    <button type="button" class="btn btn-secondary" onclick="history.back()">戻る</button>
                </div>
            </div>
        </div>
    </form>
  </div>
</body>
@include('layout.foot') 
</html>