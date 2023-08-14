<div class="card" style="width: 25rem;">
  <img src="{{!$product->images()->get()->isEmpty() ? $product->images()->first()->getUrl(500 , 450) : 'https://picsum.photos/300/250'}}" class="card-img-top" style="border-top-left-radius: 27px; border-top-right-radius: 27px; border-bottom: 2px solid black" alt="...">
  <div class="card-body pb-0">
    <h4 class="card-title card-title2 text-bluscuro ms-3">{{$product->getDescriptionSubstring()}}</h4>
    <h5 class="card-title text-gray ms-3">{{$product->price}}€</h5>
  </div>
  <div class="container">
    <div class="row justify-content-between card-body mt-0 pt-0 pb-2 pb-lg-4">
      <div class="col-12 col-lg-9 ps-2 ">
        <a href="{{route('product.category' , $product->category)}}" class="btn btncardcustom text-center">Cat.:  {{$product->category->name}}</a>
      </div>
      <div class="col-12 col-lg-3 d-flex justify-content-end responsive-reposition">
        <a class="btn btncardcustom2" href="{{route('product.show' , compact('product') )}}">
          <i class="fa-brands fa-searchengin fa-shake fa-2x" style="color: #ffffff;"></i>
      </a>
      </div> 
    </div>
  </div>
</div>

