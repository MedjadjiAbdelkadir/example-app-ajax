<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Offer | Create</title>
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
                <div class="col-md-8">
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
                    <h3 class="card-title">Add Offers</h3>

                    </div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <input name="desc" id="desc" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Prix</label>
                                <input type="text" id="prix" name="prix" class="form-control">
                            </div>
                            <div class="form-group">
                                <a type="button" id="cancel_save" class="btn btn-secondary">Cancel</a>
                                <button type="button" id="store_offer" class="btn btn-success float-right">Create new Offer</button>
                            </div>
                        </form>

                    </div>
                  

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
        $('body').on('click','#store_offer',function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'{{ route('offers.store') }}',
                data:{
                    _token:"{{csrf_token()}}",
                    name:$("input[name='name']").val(),
                    desc:$("input[name='desc']").val(),
                    prix:$("input[name='prix']").val(),

                },'success': function(data){
                    console.log("success ",data);

                    if(data.status == true){
                        printSuccessMsg(data.msg)
                    }else{
                        printErrorMsg(data.msg)
                    }
                },'error': function(error){

                    printErrorMsg(error.responseJSON.errors)
                   // console.log("error ",error.responseJSON.errors);
     
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