<x-layout>
   @if ($product_to_check)
  <section class="container-fluid bg-white mt-5 py-5 min-vh-100">
    @else
    <section class="container-fluid mt-5 py-5 min-vh-100">
      @endif
    <div class="row justify-content-center">
      @if ($product_to_check)
      <div class="col-12 col-md-8">
        <h1 class="display-1 text-center loves-category2 pt-5">
          {{__('ui.showAnnouncements')}} {{$product_to_check->title}}
        </h1>
        <h3 class="display-5 text-center loves-category2">
          di {{$product_to_check->user->name}}
        </h3>
      </div>

      <div class="col-12 col-md-8 mt-3 wrapper-revisor">
        <div id="carouselExample" class="carousel slide">
          @if($product_to_check->images)
          <div class="carousel-inner">
            @foreach ($product_to_check->images as $index => $image)
            <div class="carousel-item @if($loop->first)active @endif">
              <div class="row">
                <div class="col-6">
                  <img src="{{($image->getUrl(500, 450))}}" class="w-100 d-block rounded pb-3" alt="...">
                </div>
                <div class="col-3">
                  <h5 class="tc-accent mt-3">Tags</h5>
                  @if ($image->labels)
                  @foreach ($image->labels as $label)
                  <div class="p-2">
                    <p class="d-inline">{{$label}}</p>
                  </div>
                  @endforeach
                  @endif
                </div>
                <div class="col-3">
                  <div class="card-body">
                    <h5 class="tc-accent">{{__('ui.imageRevisor')}}</h5>
                    <p>{{__('ui.adults')}}:<span class="{{$image->adult}}"></span></p>
                    <p>{{__('ui.satire')}}:<span class="{{$image->spoof}}"></span></p>
                    <p>{{__('ui.medical')}}:<span class="{{$image->medical}}"></span></p>
                    <p>{{__('ui.violence')}}:<span class="{{$image->violence}}"></span></p>
                    <p>{{__('ui.racy')}}:<span class="{{$image->racy}}"></span></p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @else
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://picsum.photos/300/100" class="w-100 d-block rounded pb-3" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://picsum.photos/301/100" class="w-100 d-block rounded pb-3" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://picsum.photos/302/100" class="w-100 d-block rounded pb-3" alt="...">
            </div>
          </div>
          @endif
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <div class="col-12 col-md-4 mt-3 card-right bg-white">
        <h5 class="card-title">{{__('ui.title')}}: {{$product_to_check->title}}</h5>
        <div class="card-text">{{__('ui.description')}}: {{$product_to_check->body}}</div>
        <p class="card-text">{{__('ui.price')}}: {{$product_to_check->price}}€</p>
        <a href="{{route('product.category' , $product_to_check->category)}}" class="btn btn-secondary">{{__('ui.category')}}: {{$product_to_check->category->name}}</a>
        <p class="card-footer mt-2">{{__('ui.datePost')}} : {{$product_to_check->formatData()}} - {{__('ui.author')}}: {{$product_to_check->user->name}}</p>
        <div class="d-flex justify-content-start">
          <form action="{{route('revisor.accept', compact('product_to_check'))}}" method="post">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn accept-button">
              <i class="fa-solid fa-check text-white accept-svgIcon">       
              </i>
              <p class="d-none">
                {{__('ui.accept')}}
              </p>
            </button>
          </form>
          <form action="{{route('revisor.reject', compact('product_to_check'))}}" method="post">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn delete-button   mx-4 ">
              <i class="fa-solid fa-x delete-svgIcon text-white"></i>
              <p class="d-none">
                {{__('ui.reject')}}
              </p>
            </button>
          </form>
        </div>
        <a href="{{route('product.index')}}" class="btn btn-light btn-outline-success my-4">{{__('ui.backToAnnouncements')}}</a>
      </div>
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
  </section>
</x-layout>
