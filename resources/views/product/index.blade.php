<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
<h2>Products</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    List
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Type</td>
                            <td>Title</td>
                            <td>First Name</td>
                            <td>Main Name</td>
                            <td>Price</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($prod as $product){?>
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->type}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->firstname}}</td>
                            <td>{{$product->mainname}}</td>
                            <td>{{$product->price}}</td>
                            <td> 
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-xs btn-link">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-link" value="Delete">
                                </form>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12" style="margin-top:10px">
            <a href="{{route('product.create')}}" class="btn btn-success"> New Product </a>
        </div>
    </div>
</div>
</body>
</html>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
