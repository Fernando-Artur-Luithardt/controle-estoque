<x-app-layout>
  <div class="my-3 my-md-5">
    <div class="container">
      <div class="row">              
        <div class="col-lg-12">
          <form action="{{ route('sale.create') }}" method="POST" enctype="multipart/form-data" class="card">
            @csrf

            <div class="card-body">
              <h3 class="card-title">Realizar venda de um produto</h3>
              <div class="row">
                <div class="col-md-12">
                  <x-product-select />
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                    <label class="form-label">Quantidade<span id="span_amount" style="margin-left: 4px;"></span></label>
                    <input name="amount" value="{{ old('amount') }}" type="number" class="form-control" placeholder="Digite aqui a quantidade">
                    @error('amount')
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
                      <input name="price" value="{{ old('price') }}" type="text" class="form-control text-right" aria-label="Valor">                          
                    </div>
                    @error('price')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                    <label class="form-label">Valor total</label>
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                      </span>
                      <input type="text" id="total_amount" class="form-control text-right" aria-label="Valor" disabled="disabled" title="Este campo não pode ser alterado">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-12">
                  <div class="form-group">                        
                    <div class="form-label">&nbsp;</div>
                    <div class="custom-controls-stacked">
                      <label class="custom-control custom-checkbox">
                        <input name="update_price" type="checkbox" class="custom-control-input" name="example-checkbox1" value="1" checked>
                        <span class="custom-control-label">Atualizar valor unitário do produto</span>
                      </label>
                    </div>
                  </div>
                </div>                    
              </div>
            </div>
            <div class="card-footer text-left" style="display: flex; justify-content: space-between">
            <div>
              <a href="./produtos.html" class="btn btn-secondary">Voltar para produtos</a>
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

  <div class="my-3 my-md-5">
    <div class="container">
      <div class="row row-cards row-deck">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Últimas vendas realizadas</h3>		                        
            </div>
            <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap">
                <thead>
                  <tr>
                    <th class="w-1">#</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor unitário</th>
                    <th>Valor total da venda</th>                          
                  </tr>
                </thead>
                <tbody>
                @foreach ($sales as $sale)
                  <tr>
                    <td><span class="text-muted">2</span></td>
                    <td>{{ $sale->product->description }}</td>
                    <td>{{ $sale->amount }}</td>
                    <td>R$: {{ $sale->price}}</td>
                    <td>R$: {{ $sale->total }}</td>                          
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script defer src="/assets/js/sales/index.js"></script>
</x-app-layout>