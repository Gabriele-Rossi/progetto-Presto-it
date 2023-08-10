<x-layout>
 @if($products->isNotEmpty())
    <div class="container-fluid bg-white mt-5 pt-5 min-vh-100">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="display-1 text-center mt-5 pt-5 loves-category2">{{__('ui.allOur')}}</h2>
                <h2 class="display-4 text-center loves-category2">{{__('ui.ads')}}</h2>
                @else
    <div class="container-fluid mt-5 pt-5 vh-50">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="display-1 text-center text-white mt-5 pt-5 loves-category">{{__('ui.allOur')}}</h2>
            
                {{-- <p class="mx-auto my-auto border-h2"></p> --}}

                <h2 class="display-4 text-center loves-category">{{__('ui.ads')}}</h2>
              @endif  
            </div>
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

                <div class="container my-3 ">
                    <div class="row justify-content-evenly align-items-center">
                        
                    @if ($products->isNotEmpty())
            
                    @foreach($products as $product)
                    
                    <div class="col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center">
                        <x-card :product="$product"/>
                    </div>
                    
                    @endforeach
                    {{$products->links()}}
                @else
                @guest   
                <div class="col-12">           
                    <h3 class="text-center text-white text-shadow-bluscuro">{{__('ui.alertAnnouncements')}}</h1>  
                </div>
                <div class="col-8 d-flex justify-content-center my-5">
                        <a href="{{route('register')}}" class="btn btn-create-product text-white btn-create-text">{{__('ui.register')}}</a>
                </div>
                @else
                <div class="col-12">           
                    <h3 class="mt-5 my-5 text-center text-white text-shadow-bluscuro">{{__('ui.alertAnnouncements')}}</h1>  
                </div>
                <div class="col-8 d-flex justify-content-center my-5">
                        <a href="{{route('product.create')}}" class="btn btn-create-product text-white btn-create-text">{{__('ui.post')}}</a>   

                </div>
                
                @endguest
                @endif   
                    </div>
                </div>
        </div>
    </div>
</x-layout>