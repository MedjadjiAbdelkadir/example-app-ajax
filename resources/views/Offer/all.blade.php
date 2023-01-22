<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Offer | All</title>
      <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        
</head>
<body>
    


    {{----------------------------------------------------------------------------------------}}

    <div class="main-page"></div>
        <div class="container">
            <div class="row">


                <div class="col-12">
                    <div class="card">
                        <div class="alert alert-danger alert-dismissible col-12 text-center error-msg" style="display:none">
                            <button id="btn_close" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <ul></ul>
                        </div>
                        <div class="alert alert-success alert-dismissible col-12 text-center success-msg" style="display:none">
                            <button id="btn_close" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <div>

                            </div>
                        </div>
                    <div class="card-header">
                        <h3 class="card-title">All Offers</h3>
        
                        <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
        
                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        {{--  table-hover text-nowrap --}}
                        <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Desc</th>
                            <th>Prix</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $item => $offer)
                            <tr class="row-{{$offer->id}}">
                                <td>{{$item+1}}</td>
                                <td>{{$offer->name}}</td>
                                <td>{{$offer->desc}}</td>
                                <td>{{$offer->prix}}</td>
                                <td>
                                    
                                    <a href="{{route('offers.edit',$offer -> id)}}" class="edit_offer btn btn-primary mr-2">Edit</a>
                                    <a offer_id="{{$offer -> id}}" class="delete_btn btn btn-danger">Delete</a>  
                            

                                    
                                    {{-- <a href="" class="edit_offer btn btn-primary">Edit</a>
                                    <a type="button" offer_id="{{$offer->id}}" id="" class="delete_offer btn btn-danger">Delete</a>
                                 --}}
                                </td>
                                </tr> 
                            @endforeach
                           
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
              
                
            </div>
    
        </div>
    
    </div>




    {{----------------------------------------------------------------------------------------}}

<!-- AdminLTE App -->
{{-- <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script> --}}
{{-- <script src="{{asset('jquery.min.js')}}"></script> --}}

<script type="text/javascript">
    $(document).ready(function() {

        $(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();
            var offer_id =  $(this).attr('offer_id');
            $.ajax({
                type: 'post',
                url: "{{route('offers.delete')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id' :offer_id
                },
                success: function (data) {
                    if(data.status == true){
                        printSuccessMsg(data.msg)
                        $('.row-'+data.id).remove();
                    }else{
                        printErrorMsg(data.msg)
                    }

                    
                }, error: function (error) {
                    printErrorMsg(error.responseJSON.errors)
                }
            });

        });
        function printErrorMsg(msg) {
                $('.error-msg').find('ul').html('');
                $('.error-msg').css('display','block');
                $.each( msg, function( key, value ) {
                    $(".error-msg").find("ul").append('<li>'+value+'</li>');
                });
        }

        function printSuccessMsg(msg) {
            $('.success-msg div').html('');
            $('.success-msg').css('display','block');
            $(".success-msg div").append('<A5>'+msg+'</A5>');
     
        }

        
        $('body').on('click','#btn_close',function(e){
            $('.alert').css('display','none');

        });

    });
</script>
</body>
</html>