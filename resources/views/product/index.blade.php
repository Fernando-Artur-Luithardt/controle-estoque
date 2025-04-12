<x-app-layout>
  <div class="my-3 my-md-5">
    <div class="container">
      <div class="row row-cards row-deck">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Produtos</h3>
              <div class="card-options">
                <a href="{{ route('product.edit') }}" class="btn btn-azure">Adicionar</a>
              </div>                    
            </div>
            <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap">
                <thead>
                  <tr>
                    <th class="w-1">#</th>
                    <th>Descrição</th>
                    <th>Valor unitário</th>
                    <th>Estoque</th>
                    <th>Data última venda</th>
                    <th>Total de vendas</th>                          
                    <th class="w-1"></th>
                    <th class="w-1"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $key => $product)
                    <tr>
                      <td><span class="text-muted">1</span></td>
                      <td>{{ $product->description }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->inventory_level }}</td>
                      <td> - </td>
                      <td> - </td>                         
                      <td>
                        <a class="icon" href="{{ route('product.edit', ['product' => $product->id]) }}">
                          <i class="fe fe-edit"></i>
                        </a>
                      </td>
                      <td>
                        <a class="icon" href="javascript:void(0)">
                          <i class="fe fe-trash"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div style="width: 100%; display: flex; justify-content: center;">
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>