<div class="row pt-4">

 <div class="container">
  @if(!empty($successMsg))
  <div class="alert alert-success">
   {{ $successMsg }}
  </div>
  @endif
  {{-- list start --}}
  <div class="step-list d-flex  ">
   <div class="step-item flex-sm-grow-1 {{ $currentStep != 1 ? '' : 'active' }}">


    <a href="#step-1" class=" btn {{ $currentStep != 1 ? 'text-default' : 'text-primary' }}">
     <span></span>
     <font>Search</font>
    </a>

   </div>

   <div class="step-item   flex-sm-grow-1 {{ $currentStep != 2 ? '' : 'active' }}">

    <a href="#step-2" class="btn {{ $currentStep != 2 ? 'text-default' : 'text-primary' }}">
     <span></span>
     <font>Reserve Booking</font>
    </a>

   </div>

   <div class="step-item   flex-sm-grow-1 {{ $currentStep != 3 ? '' : 'active' }}">

    <a href="#step-3" class="btn {{ $currentStep != 3 ? 'text-default' : 'text-primary' }}" disabled="disabled">
     <span></span>
     <font>Confirm</font>
    </a>

   </div>
  </div>
  {{-- list. end --}}
  <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
   <div class="col-md-12">
    <div class="d-flex justify-content-between mb-3">
     <h3 class=""> Resultes in Yangon</h3>
     <a href="/" class="btn btn-secondary ">Back to search</a>
    </div>

    @if($cars== null)

    <h4>There is no Result for this Search! Please Try again!</h4>

    @else

    <x-car-card-component :cars=$cars></x-car-card-component>
    @endif

   </div>
  </div>
  <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
   <div class="col-md-8 order-lg-1 order-sm-2">
    <h3> Reserving </h3>
    {{-- card start here --}}
    <section class="pt-2">

     @php

     $photos=json_decode($car_photo,true);
     
     

     $cover=$photos['cover'];
     
     @endphp

     <div class="container mb-3 ">
      <div class="row gx-4 gx-lg-5 align-items-center">
       <!-- <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div> -->
       <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{asset('storage/'.$cover)}}" alt="..." />
       </div>
       <div class="col-md-6">
        <div class="small mb-1">
         <p class="">{{$company_name}}</p>

        </div>
        <h1 class="display-5 fw-bolder">{{$car_name}}({{$car_model}})</h1>
        <div class="fs-5 mb-2">
         <span class="{{($car_discount ==0) ? 'text-danger':'text-danger text-decoration-line-through'}}">$
          {{$car_priceperday}}</span>
         <h3 class=" d-inline float-left text-danger {{($car_discount ==0) ? 'd-none':''}}">${{$car_discount}}</h3>

         <h4 class=" heading  {{($car_status==1) ? '  text-success':'text-danger'}}">{{($car_status==1) ? 'Avaliable':'Booked'}}</h4>
        </div>
        <div>
         <ul class="">
          <li>{{$type_name}}</li>
          <li>{{$car_doors}} doors</li>
          <li>{{$car_seats}} people</li>
          <li>Auto Gear </li>
          <li>Fuel info: full to full</li>
          <li>{{($car_aircon==1) ? 'Full Air Conditional':'Limited Air Conditional'}}</li>
          <li>{{($car_bags)}} air bags</li>

          <li>
           <span class="text-danger">Please Choose Pickup location </span>
           <ul class="list-inside list-unstyled ">

            @foreach($location as $k=>$l)

            <li>
             <div class="form-check">
              <input class="form-check-input" wire:model="loc" type="radio" value="{{$l['id']}}" id="flexCheckDefault-{{$k}}">
              <label class="form-check-label" for="flexCheckDefault-{{$k}}">
               {{$l['name']}},{{$l['city']}}
              </label>
             </div>
            </li>
            @endforeach


           </ul>
          </li>


         </ul>
        </div>

       </div>
      </div>
     </div>
    </section>



    {{-- card end here --}}



   </div>
   <div class="col-md-4 order-lg-2 order-sm-1">
    <div class="card">
     <div class="card-header rule">
      <p class="{{($car_discount ==0) ? 'text-danger':'text-decoration-line-through d-inline'}}">$
       {{$car_priceperday}}</p>
      <p class="{{($car_discount ==0) ? 'd-none':'d-inline float-left text-danger ' }}">$40.00</p>
      <ul class="list-unstyled">
       <li> <small class="ct-toc-link">No refunable</small></li>
       <li><small class="ct-lead">No Change and No Cancellation</small></li>
       <li><small class="ct-lead">Pay and Save</small></li>
       @error('loc') 
       <li class="text-danger">
        <h4 class="error text-danger">{{ $message }}</h4>
       </li>
        @enderror
      </ul>
     </div>
     <div class="card-body">
      <ul>
       <li>
        <p>From -> <span class="text-danger">{{$pickup->name}}</span></p>
        <p></p>Pickup Time -><span class="text-success">{{$sdate}}</span></p>
       </li>
       <li>
        <p>To -> <span class="text-danger">{{$drop->name}}</span></p>
        <p></p>Drop Time -><span class="text-success">{{$edate}}</span></p>
       </li>

      </ul>
      <hr class="my-3">
      <div class="table-responsive">
       <table class="table ">
        <tr>
         <td>Pirce</td>
         <td>{{$car_priceperday}}</td>

        </tr>
        <tr>
         <td>Discount</td>
         <td>{{$car_discount}}</td>
        </tr>
        <tr>
         <td>Days</td>
         <td> @php
          $sd = new Carbon\Carbon($sdate);
          $ed = new Carbon\Carbon($edate);
          Carbon\Carbon::setTestNow($ed);
          $ed=new Carbon\Carbon('tomorrow');

          $days=$sd->diffInDays($ed);

          echo $days
          @endphp</td>
        </tr>
        <tr>
         <td>Subtotal</td>
         <td>@php
          $discount=$car_discount;
          $price=$car_priceperday;
          $total=0;
          if($discount ==0){
          $total=$price * $days;
          }else{
          $total=$discount * $days;
          }
          echo $total;
          @endphp</td>
        </tr>
        <tr>
         <td>Tax(5%)</td>
         <td>@php

          $a = 5/100;
          $b = round($a*$total);
          $percent=0;
          if (($b != "") && ($a != "")){
          $percent = $b;
          } else {
          $percent = 0;
          }

          echo $percent;
          @endphp</td>
        </tr>
        <tfoot>
         <tr class="border-bottom-0">
          <td>Total Amount</td>
          <td>@php

           echo $total=$total+$percent;
           @endphp</td>
         </tr>
        </tfoot>
       </table>


       <div class="d-flex justify-content-between">

        <button class=" btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
        <button class=" btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
       </div>
      </div>

     </div>
    </div>
   </div>
  </div>
  <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
   <div class="">
    <h3> Booking Confirm</h3>
    <div class="row">
     <div class="col-md-8">
      <div class="card">
       <div class="card-body">
        <div class="d-flex justify-content-between mx-3">
         <div>
          <p class="">
           Rental Company:{{$company_name}}
          </p>
          <p> Vehicle Name: {{$car['name']}}({{$car['model']}})</p>
          <p>From -> <span class="text-danger">{{$pickup->name}}</span></p>
          <p>Pickup Time -><span class="text-success">{{$sdate}}</span></p>

         </div>
         <div>
          <p class="">
           Contact:{{$company_address}}/{{$company_phone}}
          </p>
          {{-- <p>Company:{{$company_name}}/{{$company_address}}-{{$company_phone}}</p> --}}
          <p>Rent for Day: @php
           $sd = new Carbon\Carbon($sdate);
           $ed = new Carbon\Carbon($edate);
           Carbon\Carbon::setTestNow($ed);
           $ed=new Carbon\Carbon('tomorrow');

             $diff = strtotime($sd) - strtotime($ed);
        
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds
          $days= ceil(abs($diff / 86400));
           

           echo $days
           @endphp</p>
          <p>To -> <span class="text-danger">{{$drop->name}}</span></p>
          <p></p>Drop Time -><span class="text-success">{{$edate}}</span></p>
         </div>

        </div>


        <hr class="my-3">
        <div class="table-responsive">
         <table class="table ">
          <tr>
           <td>Pirce</td>
           <td>{{$car['priceperday']}}</td>

          </tr>
          <tr>
           <td>Discount</td>
           <td>{{$car['discount']}}</td>
          </tr>
          <tr>
           <td>Days</td>
           <td> {{$days}}</td>
          </tr>
          <tr>
           <td>Subtotal</td>
           <td>@php
            $discount=$car['discount'];
            $price=$car['priceperday'];
            $total=0;
            if($discount ==0){
            $total=$price * $days;
            }else{
            $total=$discount * $days;
            }
            echo $total;
            @endphp</td>
          </tr>
          <tr>
           <td>Tax(5%)</td>
           <td>@php

            $a = 5/100;
            $b = round($a*$total);
            $percent=0;
            if (($b != "") && ($a != "")){
            $percent = $b;
            } else {
            $percent = 0;
            }

            echo $percent;
            @endphp</td>
          </tr>
          <tfoot>
           <tr class="border-bottom-0">
            <td>Total Amount</td>
            <td>@php

             echo $total=$total+$percent;
             @endphp</td>
           </tr>
          </tfoot>
         </table>
        </div>


       </div>

      </div>
     </div>
     <div class="col-md-4">
      <h3>Customer Infromation</h3>
      <span class="text-secondary">Please fill these information!</span>
      <div class="mb-3">
       <label for="exampleFormControlInput1" class="form-label">Name</label>
       <input type="text" class="form-control" value="{{Auth::user()->name}}" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
       <label for="exampleFormControlInput1" class="form-label">Email</label>
       <input type="email" class="form-control" value="{{Auth::user()->email}}" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
       <label for="exampleFormControlInput1" class="form-label">Pickup Location</label>
       <input type="text" readonly="readonly" value="{{$loc}}" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
       <label for="exampleFormControlTextarea1" class="form-label">Your Message</label>
       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="d-flex justify-content-between">

       <button class=" btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
       <button class=" btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Book Now!</button>
      </div>
     </div>

    </div>



   </div>
  </div>
 </div>


</div>

