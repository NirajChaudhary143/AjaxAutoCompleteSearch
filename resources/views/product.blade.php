<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <title>Ajax Searching</title>
</head>
<body>
    <div class="col col-md-5 m-auto pt-3">
      <form action="" method="get">
        <label for="">Search</label>
        <div class="row">
          <div class="col col-md-5">
            <input type="search" class="form-control" name="search" id="search" value="{{$search}}">
            <div id="product_list">
  
            </div>
          </div>
  
          <div class="col col-md-2" ><input class="btn btn-primary" type="submit" value="Search"></div>
        </div>
        @if ($search)
        <a href="{{route('product')}}" class="btn btn-danger">Reset</a>
        @endif
       
        
      </form>
            
          

    </div>    
  <div class="col col-md-5 m-auto pt-3">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Product</th>
            <th scope="col">Description</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
              </tr>
            @endforeach
          
          
        </tbody>
      </table>
  </div>

    <script>
        $(document).ready(function(){
            $("#search").on('keyup',function(){
                var value = $(this).val();
                $.ajax({
                    url: "{{route('product')}}",
                    type:"GET",
                    data:{'name':value},
                    success:function(data){
                      $("#product_list").html(data);
                    }
                });
            });
            $(document).on('click','li',function(){
              var value = $(this).text();
              $("#search").val(value);
              $("#product_list").html("");
            }); 
        });
    </script>
</body>
</html>