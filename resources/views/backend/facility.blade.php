@extends('backendTemplate')
@section('main-content')



    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="my-ct-page-title text-white">
          <h1 class="ct-title text-white d-inline-block" id="content">
            Facilites
          </h1>
          
          <a class="ct-example text-white float-right border-0" data-toggle="modal"
           href="#newexampleModal">
            <i class="fas fa-plus-square me-1"></i>
                <span class="">Add New Facility</span>
          </a>

          
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
                  <h3 class="mb-0">facility List</h3>
                </div>
                <div class="table-responsive  p-1">
                  <table class="table align-items-center table-flush" id="facility-table">
                    <thead class="thead-light">
                      <tr>
                       
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
          </div>

        </div>
      </div>
     {{-- footer start --}}
     <x-footer-component/>
     {{-- footer end --}}

     {{-- new adding model start --}}
     
      <div class="modal " id="newexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="description" id="exampleModalLabel">Adventurer Agency Webiste</h3>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class=" gx-3 gy-2 align-items-center" id="facility-newform">

                <h3 class="text-center">Adding New Facility</h3>

                  <div class="col-sm-12 mb-3">
                     <label for="type">Facility Type</label><br/>
                     <span class="error-type_id text-danger"></span>
                      <select class="form-select " name="type_id" aria-label=".form-select-sm example">
                        <option value="">Open this select menu</option>
                        @foreach($types as $t)
                        <option value="{{$t->id}}">{{$t->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-sm-12 mb-3">
                     <label for="name">Name</label><br/>
                     <span class="error-name text-danger"></span>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter New facility Name">
                  </div>
                  <div class="col-sm-12 mb-3 d-none">
                      <label for="price">Cost($)</label><br/>
                      <span class="error-price text-danger"></span>
                      <input type="number" class="form-control" name="price" id="price" value="0">
                  </div>
                  
                  
                  <div class="col-sm-12 ">
                    <button type="submit" class="btn btn-primary float-right ">Save changes</button>
                      <button type="button" class="btn btn-danger float-right mr-2 "  data-dismiss="modal">Close</button>
                    
                  </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
     {{-- model end  --}}

      {{-- updating model start --}}
     
      <div class="modal fade " id="updatingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="description" id="exampleModalLabel">Adventurer Agency Webiste</h3>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class=" gx-3 gy-2 align-items-center" id="facility-updateform">

                <h3 class="text-center">Updating New Facility</h3>

                  <div class="col-sm-12 mb-3">
                     <label for="type">Facility Type</label><br/>
                     <span class="error-type_id text-danger"></span>
                      <select class="form-select " name="etype_id" aria-label=".form-select-sm example">
                        <option value="">Open this select menu</option>
                        @foreach($types as $t)
                        <option value="{{$t->id}}">{{$t->name}}</option>
                        @endforeach
                        
                      </select>
                  </div>
                  <input type="hidden" name="oldid">
                  <div class="col-sm-12 mb-3">
                     <label for="name">Name</label><br/>
                     <span class="error-name text-danger"></span>
                      <input type="text" class="form-control" name="ename" id="name" placeholder="Enter New facility Name">
                  </div>
                  <div class="col-sm-12 mb-3 d-none">
                      <label for="price">Cost($)</label><br/>
                      <span class="error-price text-danger"></span>
                      <input type="number" class="form-control" name="eprice" id="price" placeholder="Enter Price ">
                  </div>
                  
                  
                  <div class="col-sm-12 ">
                    <button type="submit" class="btn btn-primary float-right ">Update changes</button>
                      <button type="button" class="btn btn-danger float-right mr-2 "  data-bs-dismiss="modal">Close</button>
                    
                  </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
     {{-- model end  --}}
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

   
    $('#facility-newform').submit(function(e){
           
      // 
      let formdata=$("#facility-newform").serialize();

      $.ajax({
        url:'facility',
        type:'POST',
        data:formdata,
        success:function(res){

            // $('.error-name').html('');
            // $('.error-type_id').html('');
            // $('.error-price').html('');
            $('#facility-newform').trigger("reset");
   
             
            // $('#newexampleModal').modal('hide');
           //  $('#newexampleModal').modal().hide();

      
             $('#facility-table').DataTable().ajax.reload();
          // new  swal('Good job','successfully added!',"success");

          
          
          
        },
        error:function(err){
          let errors=err.responseJSON.errors;
          $.each(errors,function(i,v){
            // $('label').hide();
            $(`.error-${i}`).html(v);
            

          })
        }
        
      })
       e.preventDefault();
    })

    



    table=$('#facility-table').DataTable({
           
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
            ajax: 'ajax/getFacilites',
            
            columns:[
              {data:'DT_RowIndex'},
              {data:'name'},
              {data:'fcategory.name'},
              {data:'action',searchable:false,orderable:false}
            ]
            
            
        });

    //updateing data start

    $('#facility-table').on('click','.btn-edit',function(){
      $('#updatingModal').modal('show');
        let id=$(this).data('id');
        let name=$(this).data('name');
        let price=$(this).data('price');
        let type=$(this).data('type');

        $('input[name="oldid"]').val(id);
        $('input[name="ename"]').val(name);
        $('input[name="eprice"]').val(price);
        $('select[name="etype_id"]').val(type);

        
       
    })
     

     $('#facility-updateform').submit(function(e){
     
      let id=$('input[name="oldid"]').val();
        let formdata=$(this).serialize();
        $.ajax({
          url:'facility/'+id,
          type:'PUT',
          data:formdata,
          success:function(res){
            // console.log(res);
                        $('#facility-updateform').trigger("reset");
             $('#updatingModal').modal('hide');
             $('#facility-table').DataTable().ajax.reload();
            new swal('Good job','successfully updated!',"success");
          },
          error:function(err){
            swa('Sorry!','Something went wrong!','error');
          }

        })
         e.preventDefault();
     })


     //deleting facility

     $('#facility-table').on('click','.btn-delete',function(){
        let id=$(this).data('id');
        swal({
          title:"Are you sure?",
          text:'you are going to delete this!',
          icon:'warning',
          buttons:[
          'Cancel it',
          'Yes'
          ],
          dangerMode:true
        }).then(function(isConfirmed){
          if(isConfirmed){
            $.ajax({
              url:'facility/'+id,
              type:'DELETE',
              success:function(res){
                swal("Good Job", "Data is Deleted!", "success");
              },
              error:function(error){
                swal("Failed!", "Something went wrong!Try again!", "error");
              }
            })
             $('#facility-table').DataTable().ajax.reload();
          }else {
            swal("Cancelled", "You Canceled it!", "error");
          }
        })
     })



































  })
</script>
@endsection