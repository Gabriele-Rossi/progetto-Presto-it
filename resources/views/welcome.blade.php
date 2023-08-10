<x-layout>

{{-- inizio header --}}

<x-header/>

{{-- fine header --}}

{{-- banner con riquadri per le migliori categorie  --}}

<x-bannerMainCategories/>

{{-- fine banner con riquadri per le migliori categorie --}}

@if($products->isNotEmpty())
<div class="container-fluid bg-white pt-5 min-vh-100">
    @else
    <div class="container-fluid mt-5 pt-5 min-vh-100">
        @endif
        <div class="row justify-content-start">
            <div class="col-12 align-items-inline pudding-title ">
                <h2 class="display-4 text-center pt-5 title-header"><strong class="text-salmon loves-category">NEW</strong></h2>
                <h2 class="text-center loves-category2">ENTRIES</h2>
            </div>

                <div class="container my-3 ">
                    <div class="row justify-content-evenly align-items-center">
                        
                    @if ($products->isNotEmpty())
                            {{-- @dd($product) --}}
            
                    @foreach($products as $product)
                    
                    <div class="col-12 col-md-6 col-lg-3 my-3 d-flex justify-content-center">
                        <x-card :product="$product"/>
                    </div>

                    @endforeach
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
