<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
</head>
    <body>
        <h1>Create a Product</h1>
        <form method="post" action="{{ route('product.store') }}">
            @csrf
            @method('post')
            <div>
                <div>
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Name"/>
                </div>
                <div>
                    <label>Quantity</label>
                    <input type="text" name="qty" placeholder="Quantity"/>
                </div>
                <div>
                    <label>Price</label>
                    <input type="text" name="price" placeholder="price"/>
                </div>
                <div>
                    <label>Description</label>
                    <input type="text" name="description" placeholder="description"/>
                </div>
                <div>
                    <input type="submit" value="Save a new Product"/>
                </div>
            </div>
        </form>
    </body>
</html>