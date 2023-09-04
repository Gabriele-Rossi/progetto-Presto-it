<div class="card rounded-4 border-0 border-white" style="width: 25rem;">
  <img src="{{!$product->images()->get()->isEmpty() ? $product->images()->first()->getUrl(500 , 450) : 'https://picsum.photos/300/250'}}" class="card-img-top rounded-4 rounded-bottom-0" alt="...">
  <div class="card-body border-0 pb-0">
    <h4 class="card-title card-title2 responsive-title text-bluscuro ms-3">{{$product->getDescriptionSubstring()}}</h4>
    <h5 class="card-title text-gray ms-3">{{$product->price}}€</h5>
  </div>
  <div class="container">
    <div class="row justify-content-between card-body mt-0 pt-0 pb-2 pb-lg-4">
      <div class="col-6 col-lg-7 ps-1 pe-1 ">
        <a href="{{route('product.category' , $product->category)}}" class="btn btncardcustom">Elettrodomestici</a>
      </div>
      <div class="col-6 col-lg-5 d-flex px-0 justify-content-end responsive-reposition">
        <a class="btn btncardcustom2" href="{{route('product.show' , compact('product') )}}">
          <i class="fa-brands fa-searchengin fa-shake fa-2x" style="color: #ffffff;"></i>
      </a>
      </div> 
    </div>
  </div>
</div>

{{-- {{$product->category->name}} --}}