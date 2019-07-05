@if(count($users) > 0)

<div class='table-responsive'>
<table class='table table-bordered table-striped table-hover'>

    <th>Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Number</th>
    <th>School</th>
    <th>Type</th>
    <th>Verified?</th>
    <th>State</th>
    <th>Joined</th>
    <th>Change School</th>
    <th>On/Off</th>
    <th>Verify</th>

@foreach($users as $user)

<tr> 
<td>{{$user->name}}</td>

<td>{{$user->last_name}}</td>

<td><a href='mailto:{{$user->email}}' class='proceed'> {{$user->email}} </a></td>

<td>{{$user->number}}</td>

<td>{{$user->school}}</td>

<td>
    @if($user->status == 1)
    Admin
    @else
    User
    @endif
</td>

<td>
        @if($user->verification == 1)
        Yes
        @else
        No
        @endif
    </td>

    <td>
            @if($user->state == 1)
            Active
            @else
            Deactivated
            @endif
    </td>

    <td>{{$user->created_at->diffforhumans()}}</td>

<td>  <button class='btn btn-primary update_modal' data-id='{{$user->id}}'><span class='fa fa-upload'></span></button>  </td>

{{csrf_field()}}
</form>

<td>  <button class='btn btn-danger toggle_modal' data-id='{{$user->id}}' data-mail='{{$user->email}}'><span class='fa fa-power-off'></span></button>  </td>

<td>
    
    @if($user->verification == 1)
    Verified
    @else
    <button class='btn btn-success verify' data-id='{{$user->id}}' data-mail='{{$user->email}}'><span class='fa fa-check'></span></button> 
    @endif
     
    </td>

</tr>

@endforeach

</table>
<h5 class="center-block">{{$users->links()}}</h5>  
</div>

@else

<div class="alert alert-info">
        <h5 class="text-center">No User Found</h5>
  </div>

@endif





<script>

$(document).ready(function(){

 $('.update_modal').click(function(e){
           e.preventDefault();
           $('.id').val($(this).data('id'));
           $('#updatemodal').modal();
       });

});



//update user school

  $('.update_user').click(function(e){
      e.preventDefault();

    //disable button after click
      $('.update_user').prop('disabled',true);

    $.ajax({
                  url: "{{route('update_user')}}",
                  type: "POST",
                  data: {
                         '_token': $('input[name=_token]').val(),
                         'id': $('.id').val(),
                         'School2':$('.School2').val(),
                     },
         
                    
                    beforeSend:function(){
                       //busy load before  
            $.busyLoadFull("show", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                    },
          
                     complete:function(){
                      //busy load after
            $.busyLoadFull("hide", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                    },
                    
          
                    success: function(data)
                    {
                        $('.update_user').prop('disabled',false);

                      $('#updatemodal').modal('hide');

                       if(data == 'Error! Verify Internet Connection And Try Again'){
                        toastr.error(data);
                      }else{
                        toastr.success(data);

                        //reload data
                      $.ajax({
            url: "{{route('users_data')}}",
        type: "GET",
              
                beforeSend:function(){
                  $(".load-user-spin").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-user-spin").removeClass("fa fa-refresh fa-spin");
                  },
              
  
        success: function(data)
          {
            $('.load-user-data').html(data);
          },
          error: function(e) 
          {
          $('.load-user-data').html("Error! Try Again Later");
          } 	        
       });//ajax2 end
                      }
                      
                      
  
                    },
                               
               });
  });//btn end

//update school


//................Toggle

$(document).ready(function(){

$('.toggle_modal').click(function(e){
          e.preventDefault();
          $('.idt').val($(this).data('id'));
          $('.mail').val($(this).data('mail'));
          $('#togglemodal').modal();
      });

});









//............on.....................

$('.on').click(function(e){
      e.preventDefault();

    //disable button after click
      $('.on').prop('disabled',true);

    $.ajax({
                  url: "{{route('state')}}",
                  type: "POST",
                  data: {
                         '_token': $('input[name=_token]').val(),
                         'id': $('.idt').val(),
                         'state': 'on',
                         'mail': $('.mail').val(),
                     },
         
                    
                    beforeSend:function(){
                       //busy load before  
            $.busyLoadFull("show", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                    },
          
                     complete:function(){
                      //busy load after
            $.busyLoadFull("hide", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                    },
                    
          
                    success: function(data)
                    {
                        $('.on').prop('disabled',false);

                      $('#togglemodal').modal('hide');

                       if(data == 'Error! Verify Internet Connection And Try Again'){
                        toastr.error(data);
                      }else{
                        toastr.success(data);

                        //reload data
                      $.ajax({
            url: "{{route('users_data')}}",
        type: "GET",
              
                beforeSend:function(){
                  $(".load-user-spin").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-user-spin").removeClass("fa fa-refresh fa-spin");
                  },
              
  
        success: function(data)
          {
            $('.load-user-data').html(data);
          },
          error: function(e) 
          {
          $('.load-user-data').html("Error! Try Again Later");
          } 	        
       });//ajax2 end
                      }
                      
                      
  
                    },
                               
               });
  });//btn end

//...........on...................




//............on.....................

$('.off').click(function(e){
      e.preventDefault();

    //disable button after click
      $('.off').prop('disabled',true);

    $.ajax({
                  url: "{{route('state')}}",
                  type: "POST",
                  data: {
                         '_token': $('input[name=_token]').val(),
                         'id': $('.idt').val(),
                         'state': 'off',
                         'mail': $('.mail').val(),
                     },
         
                    
                    beforeSend:function(){
                       //busy load before  
            $.busyLoadFull("show", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                    },
          
                     complete:function(){
                      //busy load after
            $.busyLoadFull("hide", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                    },
                    
          
                    success: function(data)
                    {
                        $('.off').prop('disabled',false);

                      $('#togglemodal').modal('hide');

                       if(data == 'Error! Verify Internet Connection And Try Again'){
                        toastr.error(data);
                      }else{
                        toastr.success(data);

                        //reload data
                      $.ajax({
            url: "{{route('users_data')}}",
        type: "GET",
              
                beforeSend:function(){
                  $(".load-user-spin").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-user-spin").removeClass("fa fa-refresh fa-spin");
                  },
              
  
        success: function(data)
          {
            $('.load-user-data').html(data);
          },
          error: function(e) 
          {
          $('.load-user-data').html("Error! Try Again Later");
          } 	        
       });//ajax2 end
                      }
                      
                      
  
                    },
                               
               });
  });//btn end

//...........off...................



//...................Toggle

    </script>






<script>
    
//............verify user.....................

$('.verify').click(function(e){
      e.preventDefault();

var id = $(this).data('id');
var mail = $(this).data('mail');

    //disable button after click
      $('.verify').prop('disabled',true);

    $.ajax({
                  url: "{{route('verify_user')}}",
                  type: "POST",
                  data: {
                         '_token': $('input[name=_token]').val(),
                         'id': id,
                         'mail': mail,
                     },
         
                    
                    beforeSend:function(){
                       //busy load before  
            $.busyLoadFull("show", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                    },
          
                     complete:function(){
                      //busy load after
            $.busyLoadFull("hide", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                    },
                    
          
                    success: function(data)
                    {
                        $('.verify').prop('disabled',false);

                    

                       if(data == 'Error! Verify Internet Connection And Try Again'){
                        toastr.error(data);
                      }else{
                        toastr.success(data);

                        //reload data
                      $.ajax({
            url: "{{route('users_data')}}",
        type: "GET",
              
                beforeSend:function(){
                  $(".load-user-spin").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-user-spin").removeClass("fa fa-refresh fa-spin");
                  },
              
  
        success: function(data)
          {
            $('.load-user-data').html(data);
          },
          error: function(e) 
          {
          $('.load-user-data').html("Error! Try Again Later");
          } 	        
       });//ajax2 end
                      }
                      
                      
  
                    },
                               
               });
  });//btn end

//...........verify user...................
</script>










<script>
        //.........paginated result......................
        $(document).one('click','.pagination a', function(e){
        
        e.preventDefault();
        
        var page = $(this).attr('href').split('page=')[1];
        
        getproducts(page);
        
        function getproducts(page){
        
        $.ajax({
            url: '/users-ajax?page='+ page,
        
            beforeSend:function(){
                $(".pagi-load").hide('fade');
                   $(".load-user-spin").addClass("fa fa-refresh fa-spin");
                    },
        
                     complete:function(){
                    $(".load-user-spin").removeClass("fa fa-refresh fa-spin");
                    $(".pagi-load").show("fade");
                    },
        
        }).done(function(data){
            $('.pagi-load').html(data);
        
            location.hash = page;
        })
        
        }//func end
        });//doc end
        
        //.........paginated result......................
        </script>



<!-- Modal for update user school-->

<div id="updatemodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Select School</h3>
                    
                    <div class="modal-footer ">
                        <div class='text-center'><!--center-->
      
                        
                            <form>
             <input name="id" type="hidden" class="id"/>
             <select name='School2' class='School2'>
                    <option value=" ABUBAKAR TAFAWA BALEWA UNIVERSITY  BAUCHI ">ABUBAKAR TAFAWA BALEWA UNIVERSITY  BAUCHI</option>
                
                    <option value=" ABDUL GUSAU POLYTECHNIC ">ABDUL GUSAU POLYTECHNIC</option>
                    
                    <option value=" ABIA STATE UNIVERSITY  UTURU  ">ABIA STATE UNIVERSITY  UTURU</option>
                    
                    <option value=" ABUBAKAR TAFARI ALI POLYTECHNIC ">ABUBAKAR TAFARI ALI POLYTECHNIC</option>
                    
                    <option value=" ADAMAWA STATE POLYTECHNIC ">ADAMAWA STATE POLYTECHNIC</option>
                    
                    <option value=" ADAMAWA STATE UNIVERSITY MUBI ">ADAMAWA STATE UNIVERSITY MUBI</option>
                    
                    <option value=" ADEKUNLE AJASIN UNIVERSITY  AKUNGBA ">ADEKUNLE AJASIN UNIVERSITY  AKUNGBA</option>
                    
                    <option value=" ADELEKE UNIVERSITY  EDE  OSUN STATE ">ADELEKE UNIVERSITY  EDE  OSUN STATE</option>
                    
                    <option value=" AFE BABALOLA UNIVERSITY  ADO  EKITI  EKITI STATE ">AFE BABALOLA UNIVERSITY  ADO  EKITI  EKITI STATE</option>
                    
                    <option value=" AFRICAN UNIVERSITY OF SCIENCE AND TECHNOLOGY  ABUJA ">AFRICAN UNIVERSITY OF SCIENCE AND TECHNOLOGY  ABUJA</option>
                    
                    <option value=" AHMADU BELLO UNIVERSITY  ZARIA ">AHMADU BELLO UNIVERSITY  ZARIA</option>
                    
                    <option value=" AJAYI CROWTHER UNIVERSITY  OYO">AJAYI CROWTHER UNIVERSITY  OYO</option>
                    
                    <option value=" AKANU IBIAM FEDERAL POLYTECHNIC ">AKANU IBIAM FEDERAL POLYTECHNIC</option>
                    
                    <option value=" AKPERAN ORSHI COLLEGE OF AGRICULTURE ">AKPERAN ORSHI COLLEGE OF AGRICULTURE</option>
                    
                    <option value=" AKWA IBOM STATE POLYTECHNIC ">AKWA IBOM STATE POLYTECHNIC</option>
                    
                    <option value=" AKWA IBOM STATE UNIVERSITY OF TECHNOLOGY  UYO ">AKWA IBOM STATE UNIVERSITY OF TECHNOLOGY  UYO</option>
                    
                    <option value=" AKWA  IBOM COLLEGE OF AGRICULTURE ">AKWA  IBOM COLLEGE OF AGRICULTURE</option>
                    
                    <option value=" AL  HIKMAH UNIVERSITY  ILORIN ">AL  HIKMAH UNIVERSITY  ILORIN</option>
                    
                    <option value=" ALLOVER CENTRAL POLYTECHNIC ">ALLOVER CENTRAL POLYTECHNIC</option>
                    
                    <option value=" AL  QALAM UNIVERSITY  KATSINA ">AL  QALAM UNIVERSITY  KATSINA</option>
                    
                    <option value=" AMBROSE ALLI UNIVERSITY  EKPOMA ">AMBROSE ALLI UNIVERSITY  EKPOMA</option>
                    
                    <option value=" AMERICAN UNIVERSITY OF NIGERIA  YOLA ">AMERICAN UNIVERSITY OF NIGERIA  YOLA</option>
                    
                    <option value=" ANAMBRA STATE UNIVERSITY OF SCIENCE AND TECHNOLOGY  ULI ">ANAMBRA STATE UNIVERSITY OF SCIENCE AND TECHNOLOGY  ULI</option>
                    
                    <option value=" AUCHI POLYTECHNIC ">AUCHI POLYTECHNIC</option>
                    
                    <option value=" AUDU BAKO SCHOOL OF AGRICULTURE ">AUDU BAKO SCHOOL OF AGRICULTURE</option>
                    
                    <option value=" AUGUSTINE UNIVERSITY  ILARA  LAGOS STATE ">AUGUSTINE UNIVERSITY  ILARA  LAGOS STATE</option>
                    
                    <option value=" BABCOCK UNIVERSITY  ILISHAN REMO ">BABCOCK UNIVERSITY  ILISHAN REMO</option>
                    
                    <option value=" BAUCHI STATE UNIVERSITY  GADAU ">BAUCHI STATE UNIVERSITY  GADAU</option>
                    
                    <option value=" BAYELSA STATE COLLEGE OF ARTS AND SCIENCE ">BAYELSA STATE COLLEGE OF ARTS AND SCIENCE</option>
                    
                    <option value=" BAYERO UNIVERSITY  KANO ">BAYERO UNIVERSITY  KANO</option>
                    
                    <option value=" BAZE UNIVERSITY  ABUJA ">BAZE UNIVERSITY  ABUJA</option>
                    
                    <option value=" BELLS UNIVERSITY OF TECHNOLOGY  OTA  OGUN STATE ">BELLS UNIVERSITY OF TECHNOLOGY  OTA  OGUN STATE</option>
                    
                    <option value=" BENSON IDAHOSA UNIVERSITY  BENIN CITY ">BENSON IDAHOSA UNIVERSITY  BENIN CITY</option>
                    
                    <option value=" BENUE STATE POLYTECHNIC ">BENUE STATE POLYTECHNIC</option>
                    
                    <option value=" BENUE STATE UNIVERSITY  MAKURDI ">BENUE STATE UNIVERSITY  MAKURDI</option>
                    
                    <option value=" BINGHAM UNIVERSITY  AUTA  BALEFI  KARU  NASARAWA STATE ">BINGHAM UNIVERSITY  AUTA  BALEFI  KARU  NASARAWA STATE</option>
                    
                    <option value=" BORNO COLLEGE OF AGRICULTURE ">BORNO COLLEGE OF AGRICULTURE</option>
                    
                    <option value=" BOWEN UNIVERSITY  IWO ">BOWEN UNIVERSITY  IWO</option>
                    
                    <option value=" BUKAR ABBA IBRAHIM UNIVERSITY  DAMATURU ">BUKAR ABBA IBRAHIM UNIVERSITY  DAMATURU</option>
                    
                    <option value=" CALEB UNIVERSITY  LAGOS ">CALEB UNIVERSITY  LAGOS</option>
                    
                    <option value=" CARITAS UNIVERSITY  AMORJI  NKE  ENUGU ">CARITAS UNIVERSITY  AMORJI  NKE  ENUGU</option>
                    
                    <option value=" CETEP CITY UNIVERSITY  LAGOS ">CETEP CITY UNIVERSITY  LAGOS</option>
                    
                    <option value=" CHRISLAND UNIVERSITY  OWODE  OGUN STATE ">CHRISLAND UNIVERSITY  OWODE  OGUN STATE</option>
                    
                    <option value=" CHRISTOPHER UNIVERSITY  MOWE  OGUN STATE ">CHRISTOPHER UNIVERSITY  MOWE  OGUN STATE</option>
                    
                    <option value=" COLLEGE OF AGRICULTURE AND ANIMAL SCIENCE ">COLLEGE OF AGRICULTURE AND ANIMAL SCIENCE</option>
                    
                    <option value=" COLLEGE OF AGRICULTURE  JALINGO ">COLLEGE OF AGRICULTURE  JALINGO</option>
                    
                    <option value=" COLLEGE OF AGRICULTURE  KABBA ">COLLEGE OF AGRICULTURE  KABBA</option>
                    
                    <option value=" COLLEGE OF AGRICULTURE  LAFIA ">COLLEGE OF AGRICULTURE  LAFIA</option>
                    
                    <option value=" COLLEGE OF AGRICULTURE  ZURU ">COLLEGE OF AGRICULTURE  ZURU</option>
                    
                    <option value=" CONVENANT UNIVERSITY  OTA ">CONVENANT UNIVERSITY  OTA</option>
                    
                    <option value=" CRAWFORD UNIVERSITY  IGBESA  OGUN STATE ">CRAWFORD UNIVERSITY  IGBESA  OGUN STATE</option>
                    
                    <option value=" CRESCENT UNIVERSITY  ABEOKUTA ">CRESCENT UNIVERSITY  ABEOKUTA</option>
                    
                    <option value=" CROSS RIVER STATE UNIVERSITY OF SCIENCE ANDTECHNOLOGY  CALABAR  " >CROSS RIVER STATE UNIVERSITY OF SCIENCE ANDTECHNOLOGY  CALABAR</option>
                    
                    <option value=" DELTA STATE COLLEGE OF AGRICULTURE ">DELTA STATE COLLEGE OF AGRICULTURE</option>
                    
                    <option value=" DELTA STATE POLYTECHNIC: (THREE INSTITUTIONS)  ">DELTA STATE POLYTECHNIC: (THREE INSTITUTIONS) </option>
                    
                    <option value=" DELTA STATE UNIVERSITY ABRAKA ">DELTA STATE UNIVERSITY ABRAKA</option>
                    
                    <option value=" DORBEN POLYTECHNIC ">DORBEN POLYTECHNIC</option>
                    
                    <option value=" EBONYI STATE UNIVERSITY  ABAKALIKI ">EBONYI STATE UNIVERSITY  ABAKALIKI</option>
                    
                    <option value=" EDWIN CLARK UNIVERSITY  KIAGBODO  DELTA STATE ">EDWIN CLARK UNIVERSITY  KIAGBODO  DELTA STATE</option>
                    
                    <option value=" EKITI STATE UNIVERSITY ">EKITI STATE UNIVERSITY</option>
                    
                    <option value=" EKWENUGO OKEKE POLYTECHNIC ">EKWENUGO OKEKE POLYTECHNIC</option>
                    
                    <option value=" ELIZADE UNIVERSITY  ILARA  MOKIN  ONDO STATE ">ELIZADE UNIVERSITY  ILARA  MOKIN  ONDO STATE</option>
                    
                    <option value=" ENUGU STATE UNIVERSITY OF SCIENCE AND TECHNOLOGY  ENUGU ">ENUGU STATE UNIVERSITY OF SCIENCE AND TECHNOLOGY  ENUGU</option>
                    
                    <option value=" EVANGEL UNIVERSITY  AKAEZE  EBONYI STATE ">EVANGEL UNIVERSITY  AKAEZE  EBONYI STATE</option>
                    
                    <option value=" FEDERAL COLLEGE OF AGRICULTURE  ISHIAGU ">FEDERAL COLLEGE OF AGRICULTURE  ISHIAGU</option>
                    
                    <option value=" FEDERAL COLLEGE OF ANIMAL HEALTH AND PRODUCTION TECHNOLOGY ">FEDERAL COLLEGE OF ANIMAL HEALTH AND PRODUCTION TECHNOLOGY</option>
                    
                    <option value=" FEDERAL COLLEGE OF ANIMAL HEALTH AND PRODUCTION TECHNOLOGY  IBADAN ">FEDERAL COLLEGE OF ANIMAL HEALTH AND PRODUCTION TECHNOLOGY  IBADAN</option>
                    
                    <option value=" FEDERAL COLLEGE OF ANIMAL HEALTH AND PRODUCTION TECHNOLOGY  VOM ">FEDERAL COLLEGE OF ANIMAL HEALTH AND PRODUCTION TECHNOLOGY  VOM</option>
                    
                    <option value=" FEDERAL COLLEGE OF CHEMICAL AND LEATHER AND TECHNOLOGY ">FEDERAL COLLEGE OF CHEMICAL AND LEATHER AND TECHNOLOGY</option>
                    
                    <option value=" FEDERAL COLLEGE OF EDUCATION  PANKSHIN ">FEDERAL COLLEGE OF EDUCATION  PANKSHIN</option>
                    
                    <option value=" FEDERAL COLLEGE OF FISHERIES AND MARINE ">FEDERAL COLLEGE OF FISHERIES AND MARINE TECHNOLOGY</option>
                    
                    <option value=" FEDERAL COLLEGE OF FORESTRY MECHANISATION ">FEDERAL COLLEGE OF FORESTRY MECHANISATION</option>
                    
                    <option value=" FEDERAL COLLEGE OF FORESTRY  IBADAN ">FEDERAL COLLEGE OF FORESTRY  IBADAN</option>
                    
                    <option value=" FEDERAL COLLEGE OF FORESTRY. JOS ">FEDERAL COLLEGE OF FORESTRY  JOS</option>
                    
                    <option value=" FEDERAL COLLEGE OF FRESH WATER FISHERIES TECHNOLOGY ">FEDERAL COLLEGE OF FRESH WATER FISHERIES TECHNOLOGY</option>
                    
                    <option value=" FEDERAL COLLEGE OF LAND RESOURCES TECHNOLOGY  KURU ">FEDERAL COLLEGE OF LAND RESOURCES TECHNOLOGY  KURU</option>
                    
                    <option value=" FEDERAL COLLEGE OF LAND RESOURCES TECHNOLOGY  OWERRI ">FEDERAL COLLEGE OF LAND RESOURCES TECHNOLOGY  OWERRI</option>
                    
                    <option value=" FEDERAL COLLEGE OF WILDLIFE MANAGEMENT ">FEDERAL COLLEGE OF WILDLIFE MANAGEMENT</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  ADO  EKITI ">FEDERAL POLYTECHNIC  ADO  EKITI</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  BAUCHI ">FEDERAL POLYTECHNIC  BAUCHI</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  BIDA ">FEDERAL POLYTECHNIC  BIDA</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  BIRNIN  KEBBI ">FEDERAL POLYTECHNIC  BIRNIN  KEBBI</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  DAMATURU ">FEDERAL POLYTECHNIC  DAMATURU</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  EDE  ">FEDERAL POLYTECHNIC  EDE</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  IDAH " > FEDERAL POLYTECHNIC  IDAH</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  ILARO ">FEDERAL POLYTECHNIC  ILARO</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  MUBI ">FEDERAL POLYTECHNIC  MUBI</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  NAMODA ">FEDERAL POLYTECHNIC  NAMODA</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  NASSARAWA ">FEDERAL POLYTECHNIC  NASSARAWA</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  NEKEDE ">FEDERAL POLYTECHNIC  NEKEDE</option>
                     
                    <option value=" FEDERAL POLYTECHNIC  OFFA ">FEDERAL POLYTECHNIC  OFFA</option>
                    
                    <option value=" FEDERAL POLYTECHNIC  OFFA ">FEDERAL POLYTECHNIC  OKO</option>
                    
                    <option value=" FEDERAL SCHOOL OF DENTAL TECHNOLOGY AND THERAPY ">FEDERAL SCHOOL OF DENTAL TECHNOLOGY AND THERAPY</option>
                    
                    <option value=" FEDERAL UNIVERSITY GASHUA ">FEDERAL UNIVERSITY GASHUA</option>
                    
                    <option value=" FEDERAL UNIVERSITY OF PETROLEUM RESOURCES  EFFURUN ">FEDERAL UNIVERSITY OF PETROLEUM RESOURCES  EFFURUN</option>
                    
                    <option value=" FEDERAL UNIVERSITY OF TECHNOLOGY  AKURE ">FEDERAL UNIVERSITY OF TECHNOLOGY  AKURE</option>
                    
                    <option value=" FEDERAL UNIVERSITY OF TECHNOLOGY  MINNA ">FEDERAL UNIVERSITY OF TECHNOLOGY  MINNA</option>
                    
                    <option value=" FEDERAL UNIVERSITY OF TECHNOLOGY  OWERRI ">FEDERAL UNIVERSITY OF TECHNOLOGY  OWERRI</option>
                    
                    <option value=" FEDERAL UNIVERSITY  BIRNIN KEBBI   ">FEDERAL UNIVERSITY  BIRNIN KEBBI  </option>
                    
                    <option value=" FEDERAL UNIVERSITY  DUTSE  JIGAWA STATE ">FEDERAL UNIVERSITY  DUTSE  JIGAWA STATE</option>
                    
                    <option value=" FEDERAL UNIVERSITY  DUTSIN  MA  KATSINA ">FEDERAL UNIVERSITY  DUTSIN  MA  KATSINA</option>
                    
                    <option value=" FEDERAL UNIVERSITY  GUSAU ">FEDERAL UNIVERSITY  GUSAU</option>
                    
                    <option value='FEDERAL UNIVERSITY OF AGRICULTURE ABEOKUTA'>FEDERAL UNIVERSITY OF AGRICULTURE ABEOKUTA</option>
                    
                    <option value=" FEDERAL UNIVERSITY  KASHERE  GOMBE STATE ">FEDERAL UNIVERSITY  KASHERE  GOMBE STATE</option>
                    
                    <option value=" FEDERAL UNIVERSITY  LAFIA  NASARAWA STATE ">FEDERAL UNIVERSITY  LAFIA  NASARAWA STATE</option>
                    
                    <option value=" FEDERAL UNIVERSITY  LOKOJA  KOGI STATE ">FEDERAL UNIVERSITY  LOKOJA  KOGI STATE</option>
                    
                    <option value=" FEDERAL UNIVERSITY  NDUFU  ALIKE  EBONYI STATE ">FEDERAL UNIVERSITY  NDUFU  ALIKE  EBONYI STATE</option>
                    
                    <option value=" FEDERAL UNIVERSITY  OTUOKE  BAYELSA ">FEDERAL UNIVERSITY  OTUOKE  BAYELSA</option>
                    
                    <option value=" FEDERAL UNIVERSITY  OYE  EKITI  EKITI STATE ">FEDERAL UNIVERSITY  OYE  EKITI  EKITI STATE</option>
                    
                    <option value=" FEDERAL UNIVERSITY  WUKARI  TARABA STATE ">FEDERAL UNIVERSITY  WUKARI  TARABA STATE</option>
                    
                    <option value=" FOUNDATION COLLEGE OF TECHNOLOGY ">FOUNDATION COLLEGE OF TECHNOLOGY</option>
                    
                    <option value=" FOUNTAIN UNIVERSITY  OSOGBO ">FOUNTAIN UNIVERSITY  OSOGBO</option>
                    
                    <option value=" GATEWAY POLYTECHNIC SAAPADE ">GATEWAY POLYTECHNIC SAAPADE</option>
                    
                    <option value=" GODFREY OKOYE UNIVERSITY  UGWUOMA  NIKE  ENUGU STATE ">GODFREY OKOYE UNIVERSITY  UGWUOMA  NIKE  ENUGU STATE</option>
                    
                    <option value=" GOMBE STATE UNIVERISTY  GOMBE PROFESSOR ABDULLAHI MAHADI ">GOMBE STATE UNIVERISTY  GOMBE PROFESSOR ABDULLAHI MAHADI</option>
                    
                    <option value=" GRACE POLYTECHNIC ">GRACE POLYTECHNIC</option>
                    
                    <option value=" GREGORY UNIVERSITY  UTURU  ABIA STATE ">GREGORY UNIVERSITY  UTURU  ABIA STATE</option>
                    
                    <option value=" HALLMARK UNIVERSITY  IJEBU  ITELE  OGUN STATE ">HALLMARK UNIVERSITY  IJEBU  ITELE  OGUN STATE</option>
                    
                    <option value=" HASSAN USMAN KATSINA POLYTECHNIC ">HASSAN USMAN KATSINA POLYTECHNIC</option>
                    
                    <option value=" HEZEKIAH UNIVERSITY  UMUDI   IMO STATE ">HEZEKIAH UNIVERSITY  UMUDI   IMO STATE</option>
                    
                    <option value=" HUSSAINI ADAMU FEDERAL POLYTECHNIC ">HUSSAINI ADAMU FEDERAL POLYTECHNIC</option>
                    
                    <option value=" HUSSANI ADAMU POLYTECHNIC ">HUSSANI ADAMU POLYTECHNIC</option>
                    
                    <option value=" IBRAHIM BABANGIDA COLLEGE OF AGRICULTURE ">IBRAHIM BABANGIDA COLLEGE OF AGRICULTURE</option>
                    
                    <option value=" IBRAHIM BADAMASI BABANGIDA UNIVERSITY  LAPAI ">IBRAHIM BADAMASI BABANGIDA UNIVERSITY  LAPAI</option>
                    
                    <option value=" IGBINEDION UNIVERSITY  OKADA ">IGBINEDION UNIVERSITY  OKADA</option>
                    
                    <option value="  ">IGNATIUS AJURU UNIVERSITY OF EDUCATION  RUMUOLUMENI</option>
                    
                    <option value=" IMO STATE POLYTECHNIC ">IMO STATE POLYTECHNIC</option>
                    
                    <option value=" IMO STATE TECHNOLOGICAL SKILLS ACQUISITION CENTER " >IMO STATE TECHNOLOGICAL SKILLS ACQUISITION CENTER</option>
                    
                    <option value=" IMO STATE UNIVERSITY  OWERRI ">IMO STATE UNIVERSITY  OWERRI</option>
                    
                    <option value=" INSTITUTE OF MANAGEMENT TECHNOLOGY  ENUGU ">INSTITUTE OF MANAGEMENT TECHNOLOGY  ENUGU</option>
                    
                    <option value=" JOSEPH AYO BABALOLA UNIVERSITY  IKEJA  ARAKEJI  OSUN STATE ">JOSEPH AYO BABALOLA UNIVERSITY  IKEJA  ARAKEJI  OSUN STATE</option>
                    
                    <option value=" KADUNA POLYTECHNIC ">KADUNA POLYTECHNIC</option>
                    
                    <option value=" KADUNA STATE UNIVERSITY  KADUNA ">KADUNA STATE UNIVERSITY  KADUNA</option>
                    
                    <option value=" KANO STATE POLYTECHNIC ">KANO STATE POLYTECHNIC</option>
                    
                    <option value=" KANO UNIVERSITY OF SCIENCE AND TECHNOLOGY  WUDIL ">KANO UNIVERSITY OF SCIENCE AND TECHNOLOGY  WUDIL</option>
                    
                    <option value=" KEBBI STATE POLYTECHNIC ">KEBBI STATE POLYTECHNIC</option>
                    
                    <option value=" KEBBI STATE UNIVERSITY  KEBBI ">KEBBI STATE UNIVERSITY  KEBBI</option>
                    
                    <option value=" KINGS POLYTECHNIC ">KINGS POLYTECHNIC</option>
                    
                    <option value=" KINGS UNIVERSITY  ODE OMU  OSUN STATE ">KINGS UNIVERSITY  ODE OMU  OSUN STATE</option>
                    
                    <option value=" KOGI STATE POLYTECHNIC ">KOGI STATE POLYTECHNIC</option>
                    
                    <option value=" KOGI STATE UNIVERSITY ANYIGBA ">KOGI STATE UNIVERSITY ANYIGBA</option>
                    
                    <option value=" KWARA STATE POLYTECHNIC ">KWARA STATE POLYTECHNIC</option>
                    <option value=" KWARA STATE UNIVERSITY  ILORIN ">KWARA STATE UNIVERSITY  ILORIN</option>
                    
                    <option value=" KWARARAFA UNIVERSITY  WUKARI (FORMERLY WUKARI JUBILEE UNIVERSITY)   " >KWARARAFA UNIVERSITY  WUKARI (FORMERLY WUKARI JUBILEE UNIVERSITY) </option>
                    
                    <option value=" LADOKE AKINTOLA UNIVERSITY OF TECHNOLOGY  OGBOMOSO  ">LADOKE AKINTOLA UNIVERSITY OF TECHNOLOGY  OGBOMOSO</option>
                    
                    <option value=" LAGOS CITY POLYTECHNIC ">LAGOS CITY POLYTECHNIC</option>
                    
                    <option value=" LAGOS STATE POLYTECHNIC ">LAGOS STATE POLYTECHNIC</option>
                    
                    <option value=" LAGOS STATE UNIVERSITY OJO  LAGOS ">LAGOS STATE UNIVERSITY OJO  LAGOS</option>
                    
                    <option value=" LANDMARK UNIVERSITY  OMU  ARAN  KWARA STATE ">LANDMARK UNIVERSITY  OMU  ARAN  KWARA STATE</option>
                    
                    <option value=" LEADS CITY UNIVERSITY  IBADAN  OYO STATE ">LEADS CITY UNIVERSITY  IBADAN  OYO STATE</option>
                    
                    <option value=" MADONNA UNIVERSITY  OKIJA ">MADONNA UNIVERSITY  OKIJA</option>
                    
                    <option value=" MAI IDRIS ALOOMA POLYTECHNIC ">MAI IDRIS ALOOMA POLYTECHNIC</option>
                    
                    <option value=" MARITIME ACADEMY OF NIGERIA ">MARITIME ACADEMY OF NIGERIA</option>
                    
                    <option value=" MARVIC POLYTECHNIC ">MARVIC POLYTECHNIC</option>
                    
                    <option value=" MAURID INSTITUTE OF MANAGEMENT AND TECHNOLOGY  NASARAWA ">MAURID INSTITUTE OF MANAGEMENT AND TECHNOLOGY  NASARAWA</option>
                    
                    <option value=" MCPHERSON UNIVERSITY  SERIKI SOTAYO  AJEBO  OGUN STATE ">MCPHERSON UNIVERSITY  SERIKI SOTAYO  AJEBO  OGUN STATE</option>
                    
                    <option value=" MICHAEL AND CECILIA IBRU UNIVERSITY  OWHRODE  DELTA STATE ">MICHAEL AND CECILIA IBRU UNIVERSITY  OWHRODE  DELTA STATE</option>
                    
                    <option value=" MICHAEL OKPARA UNIVERSITY OF AGRICULTURE  UMUDIKE ">MICHAEL OKPARA UNIVERSITY OF AGRICULTURE  UMUDIKE</option>
                    
                    <option value=" MODIBBO ADAMA UNIVERSITY OF TECHNOLOGY  YOLA ">MODIBBO ADAMA UNIVERSITY OF TECHNOLOGY  YOLA</option>
                    
                    <option value=" MOHAMMED ABDULLAHI WASE POLYTECHNIC ">MOHAMMED ABDULLAHI WASE POLYTECHNIC</option>
                    
                    <option value=" MOSHOOD ABIOLA POLYTECHNIC ">MOSHOOD ABIOLA POLYTECHNIC</option>
                    
                    <option value=" MOUNTAIN TOP UNIVERSITY  OGUN STATE ">MOUNTAIN TOP UNIVERSITY  OGUN STATE</option>
                    
                    <option value=" NASARAWA STATE POLYTECHNIC ">NASARAWA STATE POLYTECHNIC</option>
                    
                    <option value=" NASARAWA STATE UNIVERSITY  KEFFI ">NASARAWA STATE UNIVERSITY  KEFFI</option>
                    
                    <option value=" NATIONAL OPEN UNIVERSITY OF NIGERIA  LAGOS ">NATIONAL OPEN UNIVERSITY OF NIGERIA  LAGOS</option>
                    
                    <option value=" NIGER DELTA UNVERSITY  YENAGOA ">NIGER DELTA UNVERSITY  YENAGOA </option>
                    
                    <option value=" NIGER STATE COLLEGE OF AGRICULTURE ">NIGER STATE COLLEGE OF AGRICULTURE</option>
                    
                    <option value=" NIGER STATE POLYTECHNIC ">NIGER STATE POLYTECHNIC</option>
                    
                    <option value=" NIGERIAN COLLEGE OF AVIATION TECHNOLOGY ">NIGERIAN COLLEGE OF AVIATION TECHNOLOGY</option>
                    
                    <option value=" NIGERIAN COLLEGE OF AVIATION TECHNOLOGY ">NIGERIAN DEFENCE ACADEMY KADUNA</option>
                    
                    <option value=" NIGERIAN TURKISH NILE UNIVERSITY  ABUJA ">NIGERIAN TURKISH NILE UNIVERSITY  ABUJA</option>
                    
                    <option value=" NIGERIAN TURKISH NILE UNIVERSITY  ABUJA ">NNAMDI AZIKIWE UNIVERSITY  AWKA</option>
                    
                    <option value=" NORTHWEST UNIVERSITY  KANO ">NORTHWEST UNIVERSITY  KANO</option>
                    
                    <option value=" NOVENA UNIVERSITY  OGUME  DELTA STATE ">NOVENA UNIVERSITY  OGUME  DELTA STATE</option>
                    
                    <option value=" NUHU BAMALLI POLYTECHNIC ">NUHU BAMALLI POLYTECHNIC</option>
                    
                    <option value=" NUHU BAMALLI POLYTECHNIC ">OBAFEMI AWOLOWO UNIVERSITY ILE  IFE</option>
                    <option value=" OBONG UNIVERSITY  OBONG NTA ">OBONG UNIVERSITY  OBONG NTAK</option>
                    
                    <option value=" OBONG UNIVERSITY  OBONG NTA ">ODUDUWA UNIVERSITY  IPETUMODU  OSUN STATE</option>
                    
                    <option value=" OLABISI ONABANJO UNIVERSITY AGO  IWOYE   ">OLABISI ONABANJO UNIVERSITY AGO  IWOYE</option>
                    
                    <option value=" ONDO STATE UNIVERSITY OF SCIENCE AND TECHNOLOGY  OKITIPUPA ">ONDO STATE UNIVERSITY OF SCIENCE AND TECHNOLOGY  OKITIPUPA</option>
                    
                    <option value=" OSUN STATE COLLEGE OF TECHNOLOGY ">OSUN STATE COLLEGE OF TECHNOLOGY</option>
                    
                    <option value=" OSUN STATE POLYTECHNIC ">OSUN STATE POLYTECHNIC</option>
                    
                    <option value=" OSUN STATE UNIVERSITY  OSHOGBO ">OSUN STATE UNIVERSITY  OSHOGBO</option>
                    
                    <option value=" OUR SAVIOUR INSTITUTE OF SCIENCE AND TECHNOLOGY ">OUR SAVIOUR INSTITUTE OF SCIENCE AND TECHNOLOGY</option>
                    
                    <option value=" PAN  ATLANTIC UNIVERSITY  LAGOS ">PAN  ATLANTIC UNIVERSITY  LAGOS</option>
                    
                    <option value=" PAUL UNIVERSITY  AWKA  ANAMBRA STATE ">PAUL UNIVERSITY  AWKA  ANAMBRA STATE</option>
                    
                    <option value=" PETROLEUM TRAINING INSTITUTE ">PETROLEUM TRAINING INSTITUTE</option>
                    
                    <option value=" PLATEAU STATE COLLEGE OF AGRICULTURE ">PLATEAU STATE COLLEGE OF AGRICULTURE</option>
                    
                    <option value=" PLATEAU STATE POLYTECHNIC ">PLATEAU STATE POLYTECHNIC</option>
                    
                    <option value=" PLATEAU STATE UNIVERSITY  BOKKOS ">PLATEAU STATE UNIVERSITY  BOKKOS</option>
                    
                    <option value=" POLICE ACADEMY WUDIL ">POLICE ACADEMY WUDIL</option>
                    
                    <option value=" POLYTECHNIC ILE  IFE ">POLYTECHNIC ILE  IFE</option>
                    
                    <option value=" RAMAT POLYTECHNIC ">RAMAT POLYTECHNIC</option>
                    
                    <option value=" REDEEMERS UNIVERSITY  EDE  OSUN STATE  ">REDEEMERS UNIVERSITY  EDE  OSUN STATE</option>
                    
                    <option value=" RENAISANCE UNIVERSITY  ENUGU ">RENAISANCE UNIVERSITY  ENUGU</option>
                    
                    <option value=" RHEMA UNIVERSITY  OBEAMA  ASA  RIVER STATE ">RHEMA UNIVERSITY  OBEAMA  ASA  RIVER STATE</option>
                    
                    <option value=" RITMAN UNIVERSITY  IKOT EKPENE  AKWA IBOM STATE ">RITMAN UNIVERSITY  IKOT EKPENE  AKWA IBOM STATE</option>
                    
                    <option value=" RIVERS STATE COLLEGE OF ARTS AND SCIENCE ">RIVERS STATE COLLEGE OF ARTS AND SCIENCE</option>
                    
                    <option value=" RIVERS STATE POLYTECHNIC ">RIVERS STATE POLYTECHNIC</option>
                    
                    <option value=" RIVERS STATE UNIVERSITY OF SCIENCE AND TECHNOLOGY ">RIVERS STATE UNIVERSITY OF SCIENCE AND TECHNOLOGY</option>
                    
                    <option value=" RUFUS GIWA POLYTECHNIC ">RUFUS GIWA POLYTECHNIC</option>
                    
                    <option value=" SALEM UNIVERSITY  LOKOJA ">SALEM UNIVERSITY  LOKOJA</option>
                    
                    <option value=" SAMARU COLLEGE OF AGRICULTURE ">SAMARU COLLEGE OF AGRICULTURE</option>
                    
                    <option value=" SAMUEL ADEGBOYEGA UNIVERSITY  OGWA  EDO STATE ">SAMUEL ADEGBOYEGA UNIVERSITY  OGWA  EDO STATE</option>
                    
                    <option value=" SCHOOL OF AGRICULTURE  IKORODU ">SCHOOL OF AGRICULTURE  IKORODU</option>
                    
                    <option value=" SHAKA POLYTECHNIC ">SHAKA POLYTECHNIC</option>
                    
                    <option value=" SOKOTO STATE UNIVERSITY  SOKOTO ">SOKOTO STATE UNIVERSITY  SOKOTO</option>
                    
                    <option value=" SOUTHERN NIGERIA INSTITUTE OF INNOVATIVE TECHNOLOGY(SNIITPOLY)  ">SOUTHERN NIGERIA INSTITUTE OF INNOVATIVE TECHNOLOGY(SNIITPOLY) </option>
                    
                    <option value=" SOUTHWESTERN UNIVERSITY  OKUN OWA  OGUN STATE ">SOUTHWESTERN UNIVERSITY  OKUN OWA  OGUN STATE</option>
                    
                    <option value=" SUMMIT UNIVERSITY  OFFA  KWARA STATE ">SUMMIT UNIVERSITY  OFFA  KWARA STATE</option>
                    
                    <option value=" TAI SOLARIN UNIVERSITY OF EDUCATION  IJEBU  ODE ">TAI SOLARIN UNIVERSITY OF EDUCATION  IJEBU  ODE</option>
                    
                    <option value=" TANSIAN UNIVERSITY  UMUNYA  ANAMBRA STATE ">TANSIAN UNIVERSITY  UMUNYA  ANAMBRA STATE</option>
                    
                    <option value=" TARABA STATE UNIVERSITY  JALINGO ">TARABA STATE UNIVERSITY  JALINGO</option>
                    
                    <option value=" TECHNICAL UNIVERSITY IBADAN ">TECHNICAL UNIVERSITY IBADAN</option>
                    
                    <option value=" TEMPLEGATE POLYTECHNIC ABA ">TEMPLEGATE POLYTECHNIC ABA</option>
                    
                    <option value=" THE KINGS POLY  SAKI ">THE KINGS POLY  SAKI</option>
                    
                    <option value=" THE POLYTECHNIC  CALABAR ">THE POLYTECHNIC  CALABAR</option>
                    
                    <option value=" THE POLYTECHNIC  IBADAN ">THE POLYTECHNIC  IBADAN</option>
                    
                    <option value=" THE ACHIEVERS UNIVERSITY  OWO ">THE ACHIEVERS UNIVERSITY  OWO</option>
                    
                    <option value=" TOWER POLYTECHNIC  IBADAN ">TOWER POLYTECHNIC  IBADAN</option>
                    
                    <option value=" UMARU MUSA YAR’ADUA UNIVERSITY  KATSINA ">UMARU MUSA YAR’ADUA UNIVERSITY  KATSINA</option>
                    
                    <option value=" UNIVERSIITY OF MKAR  MKAR ">UNIVERSIITY OF MKAR  MKAR</option>
                    
                    <option value=" UNIVERSITY OF ABUJA  GWAGWALADA ">UNIVERSITY OF ABUJA  GWAGWALADA</option>
                    
                    <option value=" UNIVERSITY OF AGRICULTURE  ABEOKUTA "> UNIVERSITY OF AGRICULTURE  ABEOKUTA  </option>
                    
                    <option value=" UNIVERSITY OF AGRICULTURE  MAKURDI "> UNIVERSITY OF AGRICULTURE  MAKURDI  </option>
                    
                    <option value=" UNIVERSITY OF BENIN ">UNIVERSITY OF BENIN</option>
                    
                    <option value=" UNIVERSITY OF CALABAR ">UNIVERSITY OF CALABAR</option>
                    
                    <option value=" UNIVERSITY OF IBADAN ">UNIVERSITY OF IBADAN</option>
                    
                    <option value=" UNIVERSITY OF ILORIN ">UNIVERSITY OF ILORIN</option>
                    
                    <option value=" UNIVERSITY OF JOS ">UNIVERSITY OF JOS</option>
                    
                    <option value=" UNIVERSITY OF LAGOS ">UNIVERSITY OF LAGOS</option>
                    
                    <option value=" UNIVERSITY OF MAIDUGURI ">UNIVERSITY OF MAIDUGURI</option>
                    
                    <option value=" UNIVERSITY OF NIGERIA  NSUKKA ">UNIVERSITY OF NIGERIA  NSUKKA</option>
                    
                    <option value=" UNIVERSITY OF PORT  HARCOURT ">UNIVERSITY OF PORT  HARCOURT</option>
                    
                    <option value=" UNIVERSITY OF UYO ">UNIVERSITY OF UYO</option>
                    
                    <option value=" USUMANU DANFODIYO UNIVERSITY ">USUMANU DANFODIYO UNIVERSITY</option>
                    
                    <option value=" VERITAS UNIVERSITY  ABUJA ">VERITAS UNIVERSITY  ABUJA</option>
                    
                    <option value=" WAVECREST COLLE1GE OF HOSPITALITY ">WAVECREST COLLE1GE OF HOSPITALITY</option>
                    
                    <option value=" WELLSPRING UNIVERSITY  EVBUOBANOSA  EDO STATE ">WELLSPRING UNIVERSITY  EVBUOBANOSA  EDO STATE</option>
                    
                    <option value=" WESLEY UNIVERSITY OF SCIENCE  AND TECHNOLOGY  ONDO ">WESLEY UNIVERSITY OF SCIENCE  AND TECHNOLOGY  ONDO</option>
                    
                    <option value=" WESTERN DELTA UNIVERSITY  OGHARA  DELTA STATE ">WESTERN DELTA UNIVERSITY  OGHARA  DELTA STATE</option>
                    <option value="ABIA STATE UNIVERSITY UTURU CAMPUS"> ABIA STATE UNIVERSITY, UTURU CAMPUS </option>  
<option value="ABIA STATE UNIVERSITY UTURU CAMPUS"> ABIA STATE UNIVERSITY, UMUAHIA CAMPUS</option>
<option value="ANAMBRA STATE UNIVERSITY"> ANAMBRA STATE UNIVERSITY </option> 
<option value="DELTA STATE UNIVERSITY"> DELTA STATE UNIVERSITY </option>  
<option value='FCT COLLEDGE OF EDUCATION ZUBA ABUJA'>FCT COLLEDGE OF EDUCATION ZUBA ABUJA</option>
<option value='GODFREY OKOYE UNIVERSITY ENUGU'>GODFREY OKOYE UNIVERSITY ENUGU</option>
<option value="MADONNA UNIVERSITY ELELE CAMPUS"> MADONNA UNIVERSITY, ELELE CAMPUS </option>  
<option value="MADONNA UNIVERSITY OKIJA CAMPUS"> MADONNA UNIVERSITY, OKIJA CAMPUS </option> 
<option value="NNAMDI AZIKIWE UNIVERSITY"> NNAMDI AZIKIWE UNIVERSITY </option>  
<option value="UNIVERSITY OF NIGERIA NSUKKA CAMPUS"> UNIVERSITY OF NIGERIA, NSUKKA CAMPUS</option>  
<option value="UNIVERSITY OF NIGERIA ENUGU CAMPUS"> UNIVERSITY OF NIGERIA, ENUGU CAMPUS </option>  
 
 



                    <option value=" YABA COLLEGE OF TECHNOLOGY ">YABA COLLEGE OF TECHNOLOGY</option>
                    </select>
               <!--spoofing
           <input name="_method" type="hidden" value="DELETE"/>-->
            {{csrf_field()}}
      
            <button type="submit" data-dismiss="modal" class="btn btn-primary update_user" ><i class='glyphicon glyphicon-ok load load2'></i> </button>
       
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                 <span class='glyphicon glyphicon-remove'></span>
               </button>                                 
                                      </form>
                           
                    </div><!--center-->
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Modal for update user school-->







      <!-- Modal for activation/deactivate-->

<div id="togglemodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Toggle User Activation</h3>
                    
                    <div class="modal-footer ">
                        <div class='text-center'><!--center-->
      
                        
                            <form>
             <input name="idt" type="hidden" class="idt"/>
             <input name="mail" type="hidden" class="mail"/>
               <!--spoofing
           <input name="_method" type="hidden" value="DELETE"/>-->
            {{csrf_field()}}
      
            <button type="submit" data-dismiss="modal" class="btn btn-primary on" >
                <i class='fa fa-toggle-on load load2'></i> </button>
       
              <button type="button" class="btn btn-danger off" data-dismiss="modal">
                 <span class='fa fa-toggle-off'></span>
               </button>                                 
                                      </form>
                           
                    </div><!--center-->
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Modal for activation/deactivate-->