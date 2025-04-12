<div>
   <div class="form-group">
        <label class="form-label">Produto</label>
        <select name="product_id" class="form-control custom-select">
            <option value="">Selecione...</option>
            @foreach ($products as $product)
                <option {{ old('product_id') == $product->id ? 'selected' : ''}} value="{{ $product->id }}">{{ $product->description }}</option>
            @endforeach
        </select>
        @error('product_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>