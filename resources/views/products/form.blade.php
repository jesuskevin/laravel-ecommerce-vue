<form action="{{ isset($product) ? '/productos/' . $product->id : '/productos'}}" method="POST">
    @if (isset($product->id))
        @method('PUT')
    @endif
    @csrf

    <div class="form-group">
        <label for="title">Titulo del producto</label>
        <input type="text" name="title" id="title" value="{{isset($product) ? $product->title : old('title') }}" class="form-control @error('title') is-invalid @enderror">

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Descripcion del producto</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror"> {{ isset($product) ? $product->description : old('description') }} </textarea>

        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

    <div class="form-group">
        <label for="price">Precio del producto</label>
        <input type="number" name="price" id="price" value="{{ isset($product) ? $product->price : old('price') }}" min="0" class="form-control @error('price') is-invalid @enderror">

        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>