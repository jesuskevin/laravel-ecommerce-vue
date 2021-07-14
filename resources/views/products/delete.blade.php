@auth
    <form action="/productos/{{$product->id}}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
        @method('DELETE')
        @csrf

        <input type="submit" value="Eliminar producto" class="btn btn-danger">

    </form>
@endauth