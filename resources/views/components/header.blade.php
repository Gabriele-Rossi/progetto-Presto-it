<header class="bgheader1 container-fluid">
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

  
    <div class="row bgtext text-center flex-column align-items-center justify-content-end ">
      <div class="col-12  mx-0 px-0">
        <h1 class="text-white display-1 text-center title-header">WE ARE <strong class="text-salmon text-shadow-bluscuro">P</strong>RESTO<strong class="text-salmon text-shadow-bluscuro">.</strong>IT</h1>
      </div>
      <div class="col-12 text-white btn-create-text ">
        <p>{{__('ui.header')}}</p>
        </div>
        <div class="col-12 searchFormat">
          <form action="{{route('product.search')}}" method="GET" class="d-flex" role="search">
            <input name="searched" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-search btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass i-search" style="color: #fff;"></i></button>
          </form>
        </div>
        <div class="col-12 text-white mt-5">
          <p class="btn-create-text">{{__('ui.createAnnouncements')}}....</p>
          <button class="btn-create-product" >
            <a class=" text-decoration-none text-white btn-create-text" href="{{route('product.create')}}">Right Now</a>
        </button>
        </div>
        
      </div>
    </header>