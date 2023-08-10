<x-layout>  
    @if ($products->isNotEmpty())
  <section class="container-fluid bg-white mt-5 py-5 min-vh-100">
    <div class="row justify-content-center">
        <div class="col-12">
            <h4 class="display-4 text-center loves-category text-bluscuro text-shadow-bluscuro"><strong class="loves-category2 text-salmon text-shadow-bluscuro">{{__('ui.revisioned1')}} </strong>{{__('ui.revisioned2')}}</h4>
        </div>
    @else
    <section class="container-fluid mt-5 py-5 min-vh-100">
      @endif
       

            <div class="col-12">
                @if (session('message'))
                <div class="alert alert-success" id="adv">
                    {{ session('message') }}
                </div>
                @endif
              
                  
                @if (session('access.denied'))
                <div class="alert alert-danger" id="adv">
                    {{ session('access.denied') }}
                </div>
                @endif
                
                
                @if ($errors->any())
                <div class="alert alert-danger" id="adv">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif 
            </div>
            
         
            
            @if ($products->isNotEmpty())
            
            <div class="container my-3 ">
                <div class="row justify-content-evenly align-items-center">
                
        
                @foreach($products as $product)
                <div class="col-12 mt-5 mb-2">
                    @if($product==$products[0])
                    <form action="{{route('revisor.cancelOperation', compact('product'))}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btncardcustom text-center">{{__('ui.cancelOperation')}}</button>
                        </div>  
                    </form>
                    @endif 
                </div>
                
                <div class="col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center">
                    <x-card :product="$product"/>
                </div>
                
                @endforeach
             
            @else
            <div class="container d-flex justify-content-center">
                <div class="row">     
                  <div class="col-12 justify-contet-center">
            
                    <h3 class="mt-5  text-center loves-category text-white text-shadow-bluscuro ">{{__('ui.notAnnouncement')}}</h3>
        
                    <div class="row mt-5">
        
                      <div class="col-12 mt-5">
        
                        <button class="btn-create-product bottom-go-home d-block mx-auto">
                          <a href="{{route('homePage')}}" class="text-decoration-none text-white text-shadow-bluscuro">{{__('ui.backToHome')}}</a>
                        </button>
        
                      </div>
        
                    </div>
                    
                    
                  </div>
                </div>
              </div>
                @endif   
                
            </div>
        </div>
        
        <script>
            
            timeout_id = setTimeout(function(){document.querySelector('#adv').style.display="none"},3000);
        </script>
    </section>    
</x-layout>
    