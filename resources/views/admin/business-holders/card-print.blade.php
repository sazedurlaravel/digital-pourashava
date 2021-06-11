<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>নাগরিক সেবা সনদ </title>
    
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('business/style.css')}}">


</head>
<body>
        <div class="container">
        <header>
            <div class="row">
                <div class="col-md-2">
                    <img src="https://bdembassybangkok.org/wp-content/uploads/2019/03/cropped-bd-govt-logo.png" alt="" width="130" height="130">
                </div><!--/col-->
                <div class="col-md-8 text-center middle_text">
                    <h1>{{$user->pourashava->name}}</h1>
                    <h2>{{$user->pourashava->name}},{{$user->pourashava->zila->name}} </h2>
                </div><!--/col-->
                <div class="col-md-2">
                    <img src="https://mujib100.gov.bd/assets/images/logo.png" alt="" width="215" height="140">
                </div><!--/col-->
            </div>
        </header><!--/header-->
    
        <div class="row">
            <div class="col-md-12 text-center mt-4">
                <h2 class="nagorik">নাগরিক সেবা কার্ড</h2>
            </div>
        </div><!--/row-->
        <br>
        <br>
 

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2>নাম &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;ঃ {{$user->name}}</h2> 
                    <h2>পিতার নামঃ{{$user->father_or_husband_name}} </h2>
    
                    <div >
                       <table>
                           <thead>
                               @php
                                   $number = $user->card_no;
                                   $array  = array_map('intval', str_split($number));
                               @endphp
                               <tr>
                                   <th><h2>কার্ড নং</h2></th>
                                   @foreach ($array as $num)
                                       <td><h2>{{$num}}</h2></td> 
                                   @endforeach
                                   
                                  
                               </tr>
                           </thead>
                       </table>
                    </div><!--/card no-->
                    <br>
                    <div >
                        <table>
                            <thead>
                                @php
                                $number = $user->pin_no;
                                $arraypin  = array_map('intval', str_split($number));
                            @endphp
                                <tr>
                                    <th><h2>পিন  নং</h2></th>
                                    @foreach ($arraypin as $pin)
                                       <td><h2>{{$pin}}</h2></td> 
                                   @endforeach
                                </tr>
                            </thead>
                        </table>
                     </div><!--/pin no-->
                     <br>
                     <div >
                         <table>
                             <thead>
                                @php
                                $number = $user->mobile;
                                $mobile  = array_map('intval', str_split($number));
                            @endphp
                                 <tr>
                                     <th><h2>মোবাঃ নং</h2></th>
                                     @foreach ($mobile as $mob)
                                       <td><h2>{{$mob}}</h2></td> 
                                    @endforeach
                                     
                                 </tr>
                             </thead>
                         </table>
                      </div><!--/mob no-->
                </div>
            </div><!--/row-->
        </div>

  
    



 

    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 
</body>
</html>