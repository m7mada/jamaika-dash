{{--
    <div class="">
        <!-- Navbar -->
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                @forelse($pakedge as $key => $item)
                                <div class="col-md-3 col-4">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                {{-- <i class="material-icons opacity-10">account_balance</i> --}}{{--
                                                <i class="fas {{$item->class_name}}"></i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">{{$item->title}}</h6>
                                            <span class="text-xs">{{$item->description}}
                                            </span>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">+${{$item->price}}</h5>
                                            <button type="button" class="btn btn-info mb-0 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">Add Order</button>
                                        </div>
                                        @include('livewire._model_order')
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">

                        <div class="card-body p-3 pb-0">
                            <ul class="list-group">
                                @foreach ($orders as $item )
                                <li
                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</h6>
                                    <span class="text-xs">{{$item->serial_number}}</span>
                                </div>

                                <div class="d-flex align-items-center text-sm">
                                    {{$item->pakedge->title}}
                                    @if($item->payment == 'pending')
                                    <span class="btn btn-link text-danger text-sm mb-0 px-0 ms-4">
                                        {{$item->payment}}
                                    </span>
                                    @else
                                    <span class="btn btn-link text-success text-sm mb-0 px-0 ms-4">
                                        {{$item->payment}}
                                    </span>
                                    @endif

                                </div>
                            </li>

                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

--}}













<div class="container-fluid px-5 my-8">
   <div class="card mt-n8">
      <div class="container">
         <div class="row mb-5">
            <div class="col-lg-4 col-md-6 col-7 mx-auto text-center">
               <div class="nav-wrapper mt-5 position-relative z-index-2">
                  <ul class="nav nav-pills nav-fill flex-row p-1" id="tabs-pricing" role="tablist">
                    @foreach ($pakedge->groupBy('type') as $packageCategory )
                        
                        <li class="nav-item">
                            <a class="nav-link mb-0" id="tabs-{{$packageCategory[0]['id']}}" data-bs-toggle="tab" href="#{{$packageCategory[0]['id']}}" role="tab" aria-controls="{{$packageCategory[0]['id']}}" aria-selected="@if ($loop->first) true @else false @endif">
                            {{$packageCategory[0]['type']}}
                            </a>
                     </li>
                    @endforeach

                    
                     <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 204px;"><a class="nav-link mb-0 active" id="tabs-Twin" data-bs-toggle="tab" href="#twin" role="tab" aria-controls="twin" aria-selected="false">-</a></div>
                  </ul>
               </div>
            </div>
         </div>
         <div class="tab-content tab-space">
            @foreach ($pakedge->groupBy('type') as $packageCategory )
                <div class="tab-pane @once active @endonce" id="tabs-{{$packageCategory[0]['id']}}">
                    <div class="row">
                            @foreach ( $packageCategory as $package )
                                <div class="col-lg-4 mb-lg-0 mb-4">
                                    <div class="card shadow-lg @if ( $loop->index == 1 ) bg-gradient-dark @endif">
                                        <span class="badge rounded-pill @if ( $loop->index == 1 ) bg-primary @else bg-light text-dark @endif  w-30 mt-n2 mx-auto">{{$package->title}}</span>
                                        <div class="card-header text-center pt-4 pb-3 bg-transparent">
                                            <h1 class="font-weight-bold mt-2 @if ( $loop->index == 1 )text-white @endif">
                                                <small class="text-lg align-top me-1">$</small>{{$package->price}}
                                            </h1>
                                        </div>
                                        <div class="card-body text-lg-start text-center pt-0">
                                            {!!$package->description!!}


                                            <a href="javascript:;" class="btn btn-icon @if ( $loop->index == 1 ) bg-gradient-primary @else bg-gradient-dark @endif d-lg-block mt-3 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{$package->id}}"> Try Now <i class="fas fa-arrow-right ms-1" aria-hidden="true"></i>
                                            </a>

                                            @include('livewire._model_order')
                            
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            @endforeach
         </div>
      </div>
      <div class="row mt-5">
         <div class="col-8 mx-auto text-center">
            <h6 class="opacity-5"> More than 50+ brands trust Material</h6>
         </div>
      </div>
      <div class="row mt-4 mx-5">
         <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-9" src="https://material-dashboard-pro-laravel-livewire.creative-tim.com/assets/img/logos/gray-logos/logo-coinbase.svg" alt="logo_coinbase">
         </div>
         <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-9" src="https://material-dashboard-pro-laravel-livewire.creative-tim.com/assets/img/logos/gray-logos/logo-nasa.svg" alt="logo_nasa">
         </div>
         <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-9" src="https://material-dashboard-pro-laravel-livewire.creative-tim.com/assets/img/logos/gray-logos/logo-netflix.svg" alt="logo_netflix">
         </div>
         <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-9" src="https://material-dashboard-pro-laravel-livewire.creative-tim.com/assets/img/logos/gray-logos/logo-pinterest.svg" alt="logo_pinterest">
         </div>
         <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-9" src="https://material-dashboard-pro-laravel-livewire.creative-tim.com/assets/img/logos/gray-logos/logo-spotify.svg" alt="logo_spotify">
         </div>
         <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-9" src="https://material-dashboard-pro-laravel-livewire.creative-tim.com/assets/img/logos/gray-logos/logo-vodafone.svg" alt="logo_vodafone">
         </div>
      </div>
      <div class="row mt-5">
         <div class="col-md-6 mx-auto text-center">
            <h2>Frequently Asked Questions</h2>
            <p>A lot of people don't appreciate the moment until it’s passed. I'm not trying my hardest,
               and I'm not trying to do 
            </p>
         </div>
      </div>
      <div class="row mb-5">
         <div class="col-md-8 mx-auto">
            <div class="accordion" id="accordionRental">
               <div class="accordion-item my-2">
                  <h5 class="accordion-header" id="headingOne">
                     <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     How do I order?
                     <i class="collapse-close material-icons text-sm font-weight-bold pt-1 position-absolute end-0 me-3">add</i>
                     <i class="collapse-open material-icons text-sm font-weight-bold pt-1 position-absolute end-0 me-3">remove</i>
                     </button>
                  </h5>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionRental">
                     <div class="accordion-body text-sm opacity-8">
                        We’re not always in the position that we want to be at. We’re constantly growing.
                        We’re constantly making mistakes. We’re constantly trying to express ourselves and
                        actualize our dreams. If you have the opportunity to play this game
                        of life you need to appreciate every moment. A lot of people don’t appreciate the
                        moment until it’s passed.
                     </div>
                  </div>
               </div>
               <div class="accordion-item my-2">
                  <h5 class="accordion-header" id="headingTwo">
                     <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     How can i make the payment?
                     <i class="collapse-close material-icons text-sm font-weight-bold pt-1 position-absolute end-0 me-3">add</i>
                     <i class="collapse-open material-icons text-sm font-weight-bold pt-1 position-absolute end-0 me-3">remove</i>
                     </button>
                  </h5>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
                     <div class="accordion-body text-sm opacity-8">
                        It really matters and then like it really doesn’t matter. What matters is the people
                        who are sparked by it. And the people who are like offended by it, it doesn’t
                        matter. Because it's about motivating the doers. Because I’m here to follow my
                        dreams and inspire other people to follow their dreams, too.
                        <br>
                        We’re not always in the position that we want to be at. We’re constantly growing.
                        We’re constantly making mistakes. We’re constantly trying to express ourselves and
                        actualize our dreams. If you have the opportunity to play this game of life you need
                        to appreciate every moment. A lot of people don’t appreciate the moment until it’s
                        passed.
                     </div>
                  </div>
               </div>
               <div class="accordion-item my-2">
                  <h5 class="accordion-header" id="headingThree">
                     <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                     How much time does it take to receive the order?
                     <i class="collapse-close material-icons text-sm font-weight-bold pt-1 position-absolute end-0 me-3">add</i>
                     <i class="collapse-open material-icons text-sm font-weight-bold pt-1 position-absolute end-0 me-3">remove</i>
                     </button>
                  </h5>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionRental">
                     <div class="accordion-body text-sm opacity-8">
                        The time is now for it to be okay to be great. People in this world shun people for
                        being great. For being a bright color. For standing out. But the time is now to be
                        okay to be the greatest you. Would you believe in what you believe in, if you were
                        the only one who believed it?
                        If everything I did failed - which it doesn't, it actually succeeds - just the
                        fact that I'm willing to fail is an inspiration. People are so scared to lose
                        that they don't even try. Like, one thing people can't say is that I'm
                        not trying, and I'm not trying my hardest, and I'm not trying to do the best
                        way I know how.
                     </div>
                  </div>
               </div>
               <div class="accordion-item my-2">
                  <h5 class="accordion-header" id="headingFour">
                     <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                     Can I resell the products?
                     <i class="collapse-close material-icons text-sm font-weight-bold pt-1 position-absolute end-0 me-3">add</i>
                     <i class="collapse-open material-icons text-sm font-weight-bold pt-1 position-absolute end-0 me-3">remove</i>
                     </button>
                  </h5>
                  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionRental">
                     <div class="accordion-body text-sm opacity-8">
                        I always felt like I could do anything. That’s the main thing people are controlled
                        by! Thoughts- their perception of themselves! They're slowed down by their
                        perception of themselves. If you're taught you can’t do anything, you won’t do
                        anything. I was taught I could do everything.
                        <br><br>
                        If everything I did failed - which it doesn't, it actually succeeds - just the
                        fact that I'm willing to fail is an inspiration. People are so scared to lose
                        that they don't even try. Like, one thing people can't say is that I'm
                        not trying, and I'm not trying my hardest, and I'm not trying to do the best
                        way I know how.
                     </div>
                  </div>
               </div>
               <div class="accordion-item my-2">
                  <h5 class="accordion-header" id="headingFifth">
                     <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifth" aria-expanded="false" aria-controls="collapseFifth">
                     Where do I find the shipping details?
                     <i class="collapse-close material-icons text-sm font-weight-bold pt-1 position-absolute end-0 me-3">add</i>
                     <i class="collapse-open material-icons text-sm font-weight-bold pt-1 position-absolute end-0 me-3">remove</i>
                     </button>
                  </h5>
                  <div id="collapseFifth" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionRental">
                     <div class="accordion-body text-sm opacity-8">
                        There’s nothing I really wanted to do in life that I wasn’t able to get good at.
                        That’s my skill. I’m not really specifically talented at anything except for the
                        ability to learn. That’s what I do. That’s what I’m here for. Don’t be afraid to be
                        wrong because you can’t learn anything from a compliment.
                        I always felt like I could do anything. That’s the main thing people are controlled
                        by! Thoughts- their perception of themselves! They're slowed down by their
                        perception of themselves. If you're taught you can’t do anything, you won’t do
                        anything. I was taught I could do everything.
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>