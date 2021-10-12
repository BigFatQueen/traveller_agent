@extends('frontendnew')
@section('main-content')


<section class="py-0">
	<div class="container">
		<div style="background-image: url('{{asset('frontnew/assets/img/file/myanmar.jpeg')}}'); position: cover; background-repeat: no-repeat; height: 80px; transform: scale(1.15);" class="mt-5">
			<h2 class="text-center text-light mt-5 py-3">Information</h2>
		</div>
	</div>
</section>



<section class="py-0">
	<div class="container">
		<div class="row mt-5 tour_guide_row">
			<div class="mx-auto col-sm-12 col-lg-4">
				
				<div class="accordion" id="accordionExample">

				@foreach($cities as $key => $city)
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="heading{{$key}}">

				      <button class="accordion-button accordion_custom_color text-dark 


				      	@if($tour_guide->city_id != $city->id) collapsed @endif

				      	" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
				        {{$city->name}}
				      </button>

				    </h2>
				    <div id="collapse{{$key}}" class="accordion-collapse collapse @if($tour_guide->city_id  == $city->id) show @endif " aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        <ul>
				        	@if(count($city->tours) > 0)
				        	@foreach($city->tours as $tour)
				        	<li class="d-grid gap-2 ">
				        		
				        		<button class="btn @if($tour_guide->id == $tour->id) btn-secondary @endif btn_tour_guide" data-id = "{{$tour->id}}">
				        		
				        			{{$tour->title}}
				        		
				        		</button>
				        	</li>
				        	<div class="dropdown-divider"></div>
				        	@endforeach
				        	@else
				        		<li class="d-grid gap-2 ">
				        		
					        		<button class="btn">
					        		
					        			There is no places for the moment!Please visit again to see.
					        		
					        		</button>
					        	</li>
				        	@endif
				        </ul>
				      </div>
				    </div>
				  </div>
				@endforeach


				</div>


			</div>

			<div class="col-md-8 mx-auto col-sm-12 col-lg-8">
				<h2 class="text-center">{{$tour_guide->title}}</h2>

				@php
					
					$photo = json_decode($tour_guide->photo);
					
				@endphp



				<div id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
				  <div class="carousel-inner">

				  	@if($photo != null)
				  	@foreach($photo as $k => $cover)
				    <div class="carousel-item @if($k == 0) active @endif ">
				      <img src="{{asset('storage/'.$cover)}}" class="d-block w-100 " alt="Tour Gallery">
				    </div>
				    @endforeach
				    @else
				    	<img src="{{asset($tour_guide->photo)}}" class="d-block w-100 " alt="Tour Gallery">
				    @endif

				  </div>
				  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				  </button>
				  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				  </button>
				</div>

				<div class="mt-4">
					{!! $tour_guide->desc !!}
				</div>


			</div>
		</div>
	</div>
</section>


@include('layouts.foot')

@endsection

@push('script')
<script >
	$(document).ready(function(){

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.tour_guide_row').on('click','.btn_tour_guide',function() {
        	
        	var id = $(this).data('id');
        	getTourguide(id);
        })

		$('.btn_tour_guide').click(function(){
			
			var id = $(this).data('id');
			getTourguide(id);
		})


		function getTourguide(id){

			var html = "";
			$.ajax({
                url: '/ajax_tour_guide'
                , type: 'POST'
                , data: {id:id}
                
                , success: function(json) {

                	var cities = json['city'];
                	var tour_guide = json['tour_guide'];
                	var all_photo = [];

                   html += `<div class="row mt-5">
                    <div class="mx-auto col-sm-12 col-lg-4">
                    
                    <div class="accordion" id="accordionExample">
                    `;


                    $.each(cities ,function(i,v){

                    	
                    
                    	

               html += `<div class="accordion-item">
                        <h2 class="accordion-header" id="heading${i}">

                          <button class="accordion-button accordion_custom_color text-dark `;


                         	if(tour_guide.city_id != v.id) {
                         		html += `collapsed` ;
                         	}

                         html  += `" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${i}" aria-expanded="true" aria-controls="collapse${i}">
                            ${v.name}
                          </button>

                        </h2>
                        <div id="collapse${i}" class="accordion-collapse collapse`;
                        if(tour_guide.city_id  == v.id) { html+= `show` } 
                        html+= `" aria-labelledby="heading${i}" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <ul>`;
                            	if(v.tours.length > 0){
	                                $.each(v.tours ,function(a,b){
						        	html += `<li class="d-grid gap-2 ">
						        		
						        		<button class="btn `
						        		 if(tour_guide.id == b.id) { html += `btn-secondary ` }
						        		 	html += `btn_tour_guide" data-id = "${b.id}">
						        		${b.title}
						        		</button>
						        	</li>
						        	<div class="dropdown-divider"></div>`
						        	})
					        	}else{
					        		html += `<li class="d-grid gap-2 ">
				        		
								        		<button class="btn">
								        		
								        			Not Yet
								        		
								        		</button>
								        	</li>`
					        	}
                            html+=`</ul>
                          </div>
                        </div>
                      </div>`
                    })


                    html+=`</div>


                </div> 
	                <div class="col-md-8 mx-auto col-sm-12 col-lg-8">
					<h2 class="text-center">${tour_guide.title}</h2>

					



					<div id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
					  <div class="carousel-inner">`

					  	try {

					        var photo_type = !!$.parseJSON(tour_guide.photo.toLowerCase());

					    } catch (e) {
					    	
					    }

					  	if(photo_type == true)
					  	{
					  		var photo = JSON.parse(tour_guide.photo);
					  	}
					  	
					  	
					  	$.each(photo,function(c,d){
					  		var data_type = typeof d;
					  		if(data_type == 'object'){
					  			$.each(d,function(e,f){
					  				all_photo.push(f);
					  			})
					  		}else{
					  			all_photo.push(d);
					  		}
					  	})

					  	// alert(photo_type);
					  	if(photo_type == true){
						  	$.each(all_photo,function(n,m) {
						  		
						  	

						    html+=`<div class="carousel-item `; 

						    if(n == 0){ html += `active` } 

						    html += `"><img src="{{asset('storage/${m}')}}" class="d-block w-100 " alt="Tour Gallery">
						    </div>`

						    
						    })
					    

					  html += `
					  </div>
					  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Previous</span>
					  </button>
					  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Next</span>
					  </button>
					</div>`;

					}else if(photo_type == undefined){

				    	html += `<div class="active"><img src="${tour_guide.photo}" class="d-block w-100 " alt="Tour Gallery">
					    </div>`
				    }

					html += `<div class="mt-4">
						${tour_guide.desc}
					</div>


				</div>`;


                $('.tour_guide_row').html(html);

                
                }
            })

		}
	})
</script>
@endpush




