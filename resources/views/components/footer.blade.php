<footer class="bgfooter text-center text-lg-start" id="change1">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0 ">
        <h5 class="text-uppercase text-salmon pb-3 borderbreak ">Presto.it</h5>

        <ul class="text-white list-inline mt-3 ">
          <li class="my-4"><i class="bi fs-5 bi-geo-alt"></i>  123 Consectetur at ligula 10660</li>
          <li class="my-4"><i class="bi fs-5 bi-telephone"></i>  012.345.5678</li>
          <li class="my-4"><i class="bi fs-5 bi-envelope-at"></i>  presto@presto.it</li>
          <li class="my-4">P.IVA   86334519757</li>
        </ul>
      </div>
      <!--Grid column-->
      
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0  ">
        <h5 class="text-uppercase text-salmon pb-3 borderbreak  ">{{__('ui.work')}}</h5>
     
        <p class="text-white my-4">{{__('ui.workRevisor')}}</p>
        <p class="text-white my-4">{{__('ui.askRevisor')}}</p>
        <a href="{{route('become.revisor')}}" class="btn btn-candidati text-white">{{__('ui.application')}}</a>
      </div>

      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0 ">
        <h5 class="text-uppercase text-salmon pb-3 borderbreak ">{{__('ui.ourPartner')}}</h5>

        <ul class=" list-inline  mt-4 "> 

          <li class="" >
            <span class="d-flex justify-content-evenly   "> 
              <img  class="logoFooter" src="/media/upsLogo1.jpg" alt=""> 
              <img class="logoFooter " src="/media/sdalogo.png" alt="">
            </span>
          </li>

          <li class="mt-5 ">
            <span class="d-flex justify-content-evenly "> 
              <img  class="logoFooter" src="/media/dhlLogo.png" alt=""> 
              <img class="logoFooter " src="/media/Logo_Bartolini.png" alt="">
            </span>
          </li>

        </ul>
      </div>

     
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-salmon p-3 bgfootermiddle">
    © 2023 Copyright:  
    <a class="text-white text text-decoration-none" href="{{route("homePage")}}">Presto.it</a>
  </div>
  <!-- Copyright -->
</footer>