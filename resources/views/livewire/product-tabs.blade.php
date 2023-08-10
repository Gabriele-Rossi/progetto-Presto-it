<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <table class="table table-responsive table-custom">
        <thead>
          <tr>
            <th scope="col" class="text-center text-white h3 text-shadow-bluscuro">{{__('ui.title')}}</th>
            <th scope="col" class="text-center text-white h3 text-shadow-bluscuro">{{__('ui.state')}}</th>
            <th scope="col" class="text-center text-white h3 text-shadow-bluscuro">{{__('ui.actions')}}</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
        <tr>
            <td class="text-center text-white pt-3 h5">"{{$product->title}}"</td>
            <td>
                @if($product->is_accept==true)
                    <p class="text-center text-white mt-2 h6">{{__('ui.acceptedAnnouncement')}}  <i class="text-success fas fa-circle"></i></p>
                @elseif($product->is_accept===null)
                    <p class="text-center text-white mt-2 h6">{{__('ui.reviseAnnouncement')}}  <i class="text-warning fas fa-circle"></i></p>
                @else
                    <p class="text-center text-white mt-2 h6">{{__('ui.rejectedAnnouncement')}}  <i class="text-danger fas fa-circle"></i></p>
                @endif
            </td>          
            <td>
                @if($product->is_accept==true)
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-3">
                            <a class="btn btn-success mt-2 mt-md-0 text-center" style="border-radius: 50%; border: 1px solid white; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.729)" href="{{route('product.show' , compact('product') )}}">
                                <i class="fa-brands fa-searchengin fa-shake" style="color: #ffffff;"></i>
                            </a>
                        </div>
                        <div class="col-12 col-md-3">
                            <a class="btn btn-warning my-2 mx-0 mx-md-2 my-md-0 text-center" style="border-radius: 50%; border: 1px solid white; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.729)" href="{{route('product.edit' , compact('product') )}}">
                                <i class="fa-solid fa-pen-to-square fa-shake" style="color: #ffffff;"></i>
                            </a>
                        </div>
                        <div class="col-12 col-md-3">
                            <button class="btn btn-danger mb-2 mb-md-0 ms-md-2 ms-0 text-center" style="border-radius: 50%; border: 1px solid white; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.729)" wire:click="deleteProduct({{$product->id}})">
                                <i class="fa-solid fa-trash-can fa-shake" style="color: #ffffff;"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @else
                    <p class="text-white mt-2 h6 text-center">{{__('ui.notActions')}}</p>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>
</div>
