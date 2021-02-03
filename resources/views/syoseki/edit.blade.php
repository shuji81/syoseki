@include('layout.head') 
<title>SyosekiSystem</title>
</head>
<body data-spy="scroll" data-target="#navbar">
  @include('layout.nav') 
  <div class="container">
    <form action="./edit/update" class="form-horizontal" method="post" onsubmit="return confirmPopup('更新')">
    @csrf
        <div class="container-fluid">
            <div class="form-group" style="margin-bottom: 30px;">
                <label class="col-md-3">書籍名</label>
                <div class="col-md-9">
                    @if (isset($id))
                        <input type="hidden" name="id" value="{{$id}}">   
                        <input type="text" name="name" class="form-control" value="{{$name}}">
                    @else
                        <input type="text" name="name" class="form-control">
                    @endif
                    @if($errors->has('name'))<span class="text-danger">{{ $errors->first('name') }}</span> @endif
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 30px;">
                <label class="col-md-3">カテゴリー</label>
                <div class="col-md-9" style="margin-bottom: 10px;">
                    @if (isset($id))   
                        <input type="text" name="category" class="form-control" value="{{$category}}">
                    @else
                        <input type="text" name="category" class="form-control">
                    @endif
                    @if($errors->has('category'))<span class="text-danger">{{ $errors->first('category') }}</span> @endif
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 30px;">
                <label class="col-md-3">冊数</label>
                <div class="col-md-9" style="margin-bottom: 10px;">
                    @if (isset($id))
                        <input type="text" name="num" class="form-control" value="{{$num}}">
                    @else
                        <input type="text" name="num" class="form-control">
                    @endif
                    @if($errors->has('num'))<span class="text-danger">{{ $errors->first('num') }}</span> @endif        
                </div>
            </div>
            <div class="row" style="margin-bottom: 30px;"> 
                <div class="col-md-4 text-center">
                    <input type="submit" value="更新" class="btn btn-primary">
                </div>
                <div class="col-md-8 text-center">
                    <button type="button" class="btn btn-secondary" onclick="history.back()">戻る</button>
                </div>
            </div>
        </div>
    </form>
  </div>
</body>
@include('layout.foot') 
</html>