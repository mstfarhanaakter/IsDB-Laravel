<form action="">
    <h1>Category</h1>
    <table>
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>Order Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->product->name }}</td>
                <td>{{ $category->product->order->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
        
    }
</form>