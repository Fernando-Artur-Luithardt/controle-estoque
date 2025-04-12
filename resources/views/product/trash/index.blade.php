<x-app-layout>
  <div class="my-3 my-md-5">
    <div class="container">
      <div class="row row-cards row-deck">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Produtos excluídos</h3>		      
            </div>
            <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap">
                <thead>
                  <tr>
                    <th class="w-1">#</th>
                    <th>Descrição</th>
                    <th>Valor unitário</th>
                    <th>Estoque</th>                                                    
                    <th class="w-1"></th>                          
                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)  
                  <tr>
                    <td><span class="text-muted">1</span></td>
                    <td>Batata rosa</td>
                    <td></td>
                    <td></td>                                                
                    <td>
                      <a class="icon active_product" id="{{ $product->id }}" href="#">
                        <i class="fe fe-refresh-ccw"></i>
                      </a>			    
                    </td>                          
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
  <script defer src="/assets/js/product/trash.js"></script>
</x-app-layout>