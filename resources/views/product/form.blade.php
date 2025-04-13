<x-app-layout>
  <div class="my-3 my-md-5">
    <div class="container">
      <div class="row">              
        <div class="col-lg-12">
          <form action="{{ $product->exists ? route('product.update', $product->id) : route('product.create') }}" method="POST" enctype="multipart/form-data" class="card">
            @csrf
            @if($product->exists)
              @method('PUT')
            @endif
            <div class="card-body">
              <h3 class="card-title">{{ $product->exists ? 'Editar' : 'Novo' }} produto</h3>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label">Descrição</label>
                    <input type="text" class="form-control" name="description" placeholder="Arroz.." value="{{ $product->exists ? $product->description : old('description') }}">
                    @error('description')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                    <label class="form-label">Estoque</label>
                    <input value="{{ $product->exists ? $product->inventory_level : old('inventory_level') }}" name="inventory_level" type="number" class="form-control" placeholder="10.." >
                    @error('inventory_level')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                    <label class="form-label">Código de barras</label>
                    <input value="{{ $product->exists ? $product->barcode : old('barcode') }}" name="barcode" type="number" class="form-control" placeholder="78978978978978">
                    @error('barcode')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                    <label class="form-label">Valor unitário</label>
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                      </span>
                      <input value="{{ $product->exists ? $product->price : old('price') }}" type="text" name="price" class="form-control text-right" aria-label="Valor">                         
                    </div>
                    @error('price')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>                    
              </div>
            </div>
            <div class="card-footer text-left" style="display: flex; justify-content: space-between">
              <div>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Voltar para produtos</a>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Confirmar</button>
              </div>                                    
            </div>                
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>