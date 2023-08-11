<x-layout>

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
  

  <section class="container-fluid mt-5 py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <h4 class="display-4 title-description text-white text-shadow-bluscuro">
          {{__('ui.showAnnouncements')}} {{$product->title}}
        </h4>
            <p class="border-title-description"></p>
        <h5 class="display-5 author-description">
          di {{$product->user->name}}
        </h5>
      </div>
    </div>
  </div>
  
  <div class="container-fluid">
    <div class="row displayRedux">
      
      <div class="col-6 show-box">
        
        <!-- Swiper -->
        
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
          @if($product->images)
          <div class="swiper-wrapper">
            @foreach ($product->images as $image)
            <div class="swiper-slide">
              <img class="bgTransparent" src="{{($image->getUrl(500, 450))}}" />
            </div>
            @endforeach
          </div>
          @else
          <div class="swiper-wrapper">
            
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
            </div>
          </div>
          @endif
          
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
        <div thumbsSlider="" class="swiper mySwiper">
          @if($product->images)
          <div class="swiper-wrapper">
            @foreach ($product->images as $image)
            <div class="swiper-slide pt-3 bg-transparent pb-0">
              <img class="bgTransparent" src="{{($image->getUrl(500, 450))}}" />
            </div>
            @endforeach
          </div>
          @else
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
            </div>
            <div class="swiper-slide">
              <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
            </div>
          </div>
          @endif
        </div>


        
        
      </div>
      
      <div class="col-6 card-right bg-white show-box2 custom-description">
        
        
        <div >

          <h2 class="card-title description-h2 my-"><strong>{{__('ui.title')}}:</strong></h2>
          <h3 class="border-h2">{{$product->title}}</h3>

        <div class="card-text body-title">{{__('ui.description')}}: </div>
        <div class="card-text description-body border-h2">{{$product->body}}</div>

         <div class="card-text body-title">{{__('ui.category')}}: </div>
        
          <button class="category-button">
            
          
            <span class="span button-description">

              <div></div>
              
              <p class="text1 button-description">{{$product->category->name}}</p>
          

            </span>

            <span class="span text1 text-white"><a class="text-decoration-none text-white" href="{{route('product.category' , $product->category)}}">Cerca simili</a></span>
          </button>
         
            <p class="border-h2"></p>
              <p class="body-title">{{__('ui.price')}}:</p>
                  <p class="price-description"> {{$product->price}}€</p>

      <div class="margin-priceEbuttom">
      
          <a href="{{route('product.index')}}" class="btn-come-back text-decoration-none">{{__('ui.backToAnnouncements')}}</a>
    
       
        
      </div>
        
      <span class="mt-2 publish-description">{{__('ui.datePost')}} : {{$product->formatData()}} - {{__('ui.author')}}: {{$product->user->name}}</span>


        </div>
        
        
        
        
      </div>
    </div>   
  </div>
</section>


</x-layout>


