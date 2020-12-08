<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body style="background:#ccc">
<div class="container">
<h2>Products Edit</h2>
    <div class="row">
        <div class="col-md-4" >
            <div class="card">
                <div class="card-header">
                    <h3> Create </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('product.update', $product->id)}}" method="post">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <label>ID</label>
                            <input type="number" name="id" class="form-control" value="{{$product->id}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="Book">Book</option>
                                <option value="CD">CD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{$product->title}}">
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control" value="{{$product->firstname}}">
                        </div>
                        <div class="form-group">
                            <label>Main Name</label>
                            <input type="text" name="mainname" class="form-control" value="{{$product->mainname}}">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label id="pages">Pages</label>
                            <input type="text" name="numpages" class="form-control" value="{{$product->numpages}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</body>
</html>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>