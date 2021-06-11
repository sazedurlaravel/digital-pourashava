<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>নাগরিক সেবা সনদ </title>
    
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('business/custom.css')}}">


</head>
<body>

    <div class="seb_card">
        
        <div class="container">
        <header>
            <div class="row">
                <div class="col-md-2">
                    <img src="https://bdembassybangkok.org/wp-content/uploads/2019/03/cropped-bd-govt-logo.png" alt="" width="45" height="45" style="margin-top: 13px;">
                </div><!--/col-->
                <div class="col-md-8 text-center middle_text">
                   
                    <h6>{{$user->pourashava->name}}</h6>
                    <h6>{{$user->pourashava->name}},{{$user->pourashava->zila->name}} </h6>
                </div><!--/col-->
                <div class="col-md-2">
                    <img src="https://mujib100.gov.bd/assets/images/logo.png" alt="" width="65" height="50" style="margin: 9px -30px;">
                </div><!--/col-->
            </div>
        </header><!--/header-->
    
        <div class="row">
            <div class="col-md-12 text-center  mb-2">
                <h6 class="nagorik">নাগরিক সেবা কার্ড</h6>
            </div>
        </div><!--/row-->
        
 
        <div class="content">
            <div class="text">
                 <p><strong>নাম &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;ঃ{{$user->name}}</strong></p> 
                 <p><strong>পিতার নামঃ {{$user->father_or_husband_name}}</strong></p> 
                
            </div>
           
            <table>
                <thead>
                    @php
                    $number = $user->card_no;
                    $array  = array_map('intval', str_split($number));
                @endphp
                    <tr>
                        <th>কার্ড নং</th>
                        @foreach ($array as $num)
                            <td>{{$num}}</td> 
                        @endforeach
                    </tr>
                </thead>
            </table>
           
            <table>
                <thead>
                    @php
                    $number = $user->pin_no;
                    $arraypin  = array_map('intval', str_split($number));
                @endphp
                    <tr>
                        <th>পিন  নং</th>
                        @foreach ($arraypin as $pin)
                            <td>{{$pin}}</td> 
                        @endforeach
                    </tr>
                </thead>
            </table>
        
            <table>
                <thead>
                    @php
                    $number = $user->mobile;
                    $mobile  = array_map('intval', str_split($number));
                @endphp
                     <tr>
                         <th>মোবাঃ নং</th>
                         @foreach ($mobile as $mob)
                           <td>{{$mob}}</td> 
                        @endforeach
                         
                     </tr>
                 </thead>
            </table>
        </div>
       

  
    </div>

  
    



 

    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
    // $(document).ready(function(){
    //   window.print();
    // });
    // setTimeout(function () {
    //   $(document).ready(function(){
    //     window.print();
    //   });
    // }, 3000);
  </script>
</body>
</html>