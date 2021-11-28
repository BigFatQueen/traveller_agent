@extends('backendTemplate')
@section('main-content')



    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="my-ct-page-title text-white">
          <h1 class="ct-title text-white" id="content">
            Type 
          </h1>
          <div class="avatar-group mt-3">
          </div>
        </div>
        <div class="card">
			{{-- start --}}
			
			
			{{-- end --}}
        </div>
       <div class="card mb-4" id="newtype_store">
            <div class="card-header pb-0">
                <i class="fas fa-plus-square me-1"></i>
                <span class="error-name">Create New Types</span>
                <span class="successmsg"></span>
                <div class="nav-wrapper pb-0">
				    <ul class="nav nav-tabs" id="tabs-icons-text" role="tablist">
				        <li class="nav-item">
				            <a class="nav-link mb-sm-3 mb-md-0 active hotel_nav" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-hotel mr-1"></i>Hotel Room Type</a>
				        </li>
				        <li class="nav-item">
				            <a class="nav-link mb-sm-3 mb-md-0 car_nav" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
				            	<i class="fas fa-car mr-1"></i>Vehicle Type</a>
				        </li>
				        
				    </ul>
				</div>
            </div>
            <div class="card shadow">
			    <div class="card-body">
			        <div class="tab-content" id="myTabContent">
			            <div class="tab-pane fade show active hotel_nav_tab" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
			                <form class="row gx-3 gy-2 align-items-center" id="sub-hotel-newform">
                          <input type="hidden" name="category" value="1" class="hotel_hidden_value">
			                    <div class="col-sm-8">
			                       
			                        <input type="text" class="form-control" name="name" id="specificSizeInputName" placeholder="Enter New type Name">
			                    </div>
			                    
			                    <div class="col-12 col-xl-3 col-lg-3 col-md-3 col-sm-12 ">
			                        <button type="submit" class="btn btn-primary form-control">Submit</button>
			                    </div>
			                </form>
			            </div>
			            <div class="tab-pane fade car_nav_tab" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
			                <form class="row gx-3 gy-2 align-items-center" id="sub-car-newform">
                          <input type="hidden" name="category" value="2" class="car_hidden_value">
			                    <div class="col-sm-8">
			                       
			                        <input type="text" class="form-control" name="name" id="specificSizeInputName" placeholder="Enter New City Name">
			                    </div>
			                    
			                    <div class="col-12 col-xl-3 col-lg-3 col-md-3 col-sm-12 ">
			                        <button type="submit" class="btn btn-primary form-control">Submit</button>
			                    </div>
			                </form>
			            </div>
			            
			        </div>
			    </div>
			</div>
            
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="my-card">
        <div class="card-body p-0">
          
          <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-header border-0">
                  <h3 class="mb-0">Type List</h3>
                </div>
                <div class="table-responsive  p-1">
                  <table class="table align-items-center table-flush" id="type-table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Yangon</td>
                        <td>
                          <button></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>      
        </div>
      </footer>
    </div>
@endsection
@section('script')
<script>
  var table;
  $(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      const createdCell = function(cell) {
          let original;
        cell.setAttribute('contenteditable', true)
        cell.setAttribute('spellcheck', false)
        cell.addEventListener("focus", function(e) {
              original = e.target.textContent;
              console.log(e.target.textContent);

          })
        cell.addEventListener("blur", function(e) {
              if (original !== e.target.textContent) {
               console.log(original);
              const row = table.row(e.target.parentElement);
              let newdata=e.target.textContent;
              let id=row.data().id;
              
              $.ajax({
                  url:'/type/'+id,
                  type:"PATCH",
                  data:{name:newdata},
                  success:function(res){
                      console.log(res);
                  },
                  error:function(error){
                      console.log(error);
                  }
              })
               
              }
        })
      }
        table=$('#type-table').DataTable({
           
            "serverSide": true,
            "processing": true,
            
            "sort":false,
            pagingType: 'full_numbers',
             pageLength: 10,
             language: {
               oPaginate: {
                 sNext: '<i class="fa fa-forward"></i>',
                 sPrevious: '<i class="fa fa-backward"></i>',
                 sFirst: '<i class="fa fa-step-backward"></i>',
                 sLast: '<i class="fa fa-step-forward"></i>'
                 }
               } ,
            ajax: {
                url: 'ajax/getChildType',
                method: 'POST',
                data: {
                "_token": "{{ csrf_token() }}"
                }
            },
            columns: [
                {data: 'rownum', name: 'rownum'},
                
                {data: 'name', name: 'name'},
                {data: 'category', name: 'category'},
                
                {data: 'action', name: 'action',searchable:false,orderable:false}
            ],
            columnDefs: [ 
               {targets: 1,
                createdCell: createdCell
                }
              ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val()).draw();
                    });
                });
            }
            
        });


    // hotel category create
    $('#sub-hotel-newform').submit(function(e){
      e.preventDefault();
      let name=$(`#sub-hotel-newform input[name="name"]`).val();
      let category=$(`#sub-hotel-newform input[name="category"]`).val();
      // console.log(name,category);
      $.ajax({
        url:'type',
        type:'POST',
        data:{name:name,id:category},
        error:function(data){
            var errors=data.responseJSON.errors;
            $.each(errors,function(i,v){
                console.log(i);
                $(`.error-${i}`).html(v);
                $(`.error-${i}`).addClass('text-danger');

            })
           },
           success:function(res){
               console.log(typeof res);
               console.log(res.success);
             $(`.error-name`).html('New Sub-category');
             $(`.error-name`).removeClass('text-danger');
             $('.successmsg').html(res.success);
             $('.successmsg').addClass('text-success');
             $('.successmsg').hide(2000);
             $(`#sub-hotel-newform input[name]`).val('');
             $('#type-table').DataTable().ajax.reload();
             // $('#newtype_store').reload();

             // $('.hotel_nav').addClass('active');
             // $('.car_nav').removeClass('active');

             // $('.hotel_nav_tab').addClass('show');
             // $('.hotel_nav_tab').addClass('active');

             // $('.car_nav_tab').removeClass('show');
             // $('.car_nav_tab').removeClass('active');
             $(`.hotel_hidden_value`).val(1);

             },
      })
    })

    //car category create
    $('#sub-car-newform').submit(function(e){
      e.preventDefault();
      let name=$(`#sub-car-newform input[name="name"]`).val();
      let category=$(`#sub-car-newform input[name="category"]`).val();
      // console.log(name,category);
      $.ajax({
        url:'type',
        type:'POST',
        data:{name:name,id:category},
        error:function(data){
            var errors=data.responseJSON.errors;
            $.each(errors,function(i,v){
                console.log(i);
                 $(`.error-${i}`).html(v);
                $(`.error-${i}`).addClass('text-danger');

            })
           },
           success:function(res){
               console.log(typeof res);
               console.log(res.success);
             $(`.error-name`).html('New Sub-category');
             $(`.error-name`).removeClass('text-danger');
             $('.successmsg').html(res.success);
             $('.successmsg').addClass('text-success');
             $('.successmsg').hide(2000);
             $(`#sub-car-newform input[name]`).val('');
             $('#type-table').DataTable().ajax.reload();
             // $('#newtype_store').reload();

             // $('.hotel_nav').removeClass('active');
             // $('.car_nav').addClass('active');

             // $('.hotel_nav_tab').removeClass('show');
             // $('.hotel_nav_tab').removeClass('active');

             // $('.car_nav_tab').addClass('show');
             // $('.car_nav_tab').addClass('active');
             $(`.car_hidden_value`).val(2);


             
             },
      })
    })

    // deleteing data
    $('#type-table').on('click','.btn-delete',function(){
        let ans=confirm("Are you sure to delete?");
        if(ans){
          let id=$(this).data('id');
          $.ajax({
            url:'/type/'+id,
            type:"DELETE",
            success:function(data){
               $('.successmsg').html(data.success);
               $('.successmsg').addClass('text-success');
               $('.successmsg').hide(2000);
               $('#type-table').DataTable().ajax.reload();
            },
            error:function(err){
              console.log(err);
            }
          })
        }
    })

    // end
  })
</script>
@endsection