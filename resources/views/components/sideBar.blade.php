<div id="mySidebar" class="sidebar">
    <div class="subSidebar">
        <a href="{{route('product.index')}}" class="liNav"><span><i class="material-icons text-dropdown">info</i><span class="text-dropdown icon-text">{{__('ui.sidebarAnnouncements')}}</span></a><br>
        <div class="nav-item dropdown">       
            <div>
                <a class="py-2 pe-3 liNav active text-dropdown dropdown-toggle collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#categoriesDropDown" aria-expanded="false" href="#"><i class="text-dropdown material-icons">search</i><span class="text-dropdown icon-text">{{__('ui.sidebarCategory')}}</span></a><br>
                <ul class="p-0 collapse" id="categoriesDropDown">   
                    @foreach ($categories as $category)
                    <li><a class="dropdown-item text-white subSidebar-content text-center" href="{{route('product.category', compact('category'))}}">{{$category->name}}</a></li>
                    @endforeach        
                </ul>
            </div>          
        </div>
        @auth
        @if(Auth::user()->is_revisor)
        <div class="nav-item dropdown">       
          <div>
              <a class="py-2 pe-3 liNav active text-dropdown dropdown-toggle collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#categoriesDropDown1" aria-expanded="false" href="#"><i class="text-dropdown material-icons">work</i><span class="text-dropdown icon-text">{{__('ui.spaceRevisor')}}</span></a><br>
              <ul class="p-0 collapse" id="categoriesDropDown1">   
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-white subSidebar-content text-center" href="{{route('revisor.index')}}">{{__('ui.toCheck')}}
                    <span class="position-absolute top-0 ms-3 translate-middle badge rounded-pill bg-danger">
                      {{App\Models\Product::toBeRevisionedCount()}}
                        <span></span>
                    </span>
                  </a></li>
                  <li><a class="dropdown-item text-white subSidebar-content text-center" href="{{route('revisor.acceptIndex')}}">{{__('ui.lastCheck')}}
                  </a></li>
              </ul>
          </div>          
        </div>
        @endif
        @endauth
        {{-- <a href="#" class="liNav"><i class="material-icons text-dropdown">spa</i><span class="text-dropdown icon-text">services</span></a>
        </a><br>
        <a href="#" class="liNav"><i class="material-icons text-dropdown">monetization_on</i><span class="text-dropdown icon-text">clients</span></a><br>
        <a href="#" class="liNav"><i class="material-icons text-dropdown">email</i><span class="text-dropdown icon-text">contact<span></a> --}}
        
    </div>   
    </div>
</div>
