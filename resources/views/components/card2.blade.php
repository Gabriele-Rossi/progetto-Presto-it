<div class="card1 my-4 mx-auto mx-lg-4 justify-content-center">
    <img src="{{!$product->images()->get()->isEmpty() ? $product->images()->first()->getUrl(500 , 450) : 'https://picsum.photos/300/250'}}"  class="img-fluid" alt="ciao">  
    <div class="d-flex flex-column justify-content-center">
      <h3 class="text-title-card">{{$product->title}}</h3>
      <p class="p-price ">{{$product->price}}€</p>
    </div>
    <div class="d-flex justify-content-center align-items-center">
      <a href="{{route('product.category' , $product->category)}}" class="card-footer1 text-body1 icon-box">{{$product->category->name}}</a>
      <a class=" save d-flex justify-content-center align-items-center" href="{{route('product.show' , compact('product') )}}"> 
        <div class="i-custom">
            <i class="fa fa-solid fa-info " style="color:#59ab6e"></i>
        </div>
      </a>
    </div>
    
</div>

