@if(count($post)>0)

<div class="table-responsive">

 <table class="table table-bordered table-striped table-hover">
     <tr>
              <th>TITLE</th>
              <th>PRICE</th>
               
              <th>DESCRIPTION</th>
              
              <th>IMAGE (1)</th>
              <th>IMAGE (2)</th>
              <th>IMAGE (3)</th>
              <th>IMAGE (4)</th>
              <th>APPROVE</th>
              <th>DECLINE</th>
             
      </tr>
  @foreach($post as $p)

       <tr>
          <td>{{$p->title}}</td>

            <td>
                    @if($p->price == 0)
                    <p>*Swap</p>
                    @elseif($p->price == 47)
                    <p>*Contact, for price</p>
                    @else
                    <p><strike>N</strike>{{number_format($p->price)}}</p>
                    @endif
            </td>

            <td>{{ substr($p->description,0, 55) }}</td>
           
            <td><img src="/storage/post_images/{{$p->image_1}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>
            <td><img src="/storage/post_images/{{$p->image_2}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>
            <td><img src="/storage/post_images/{{$p->image_3}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>
            <td><img src="/storage/post_images/{{$p->image_4}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>

            <td>
             <form action="" method="POST">

             <button type="submit" class="btn btn-primary app" data-userid = '{{$p->user_id}}' data-number='{{$p->number}}' data-title='{{$p->title}}' data-id='{{$p->id}}'><i class="fa fa-thumbs-up" ></i></button>
                  
                           {{csrf_field()}}
                                                      
                     </form>
             
            </td>
            <!-- decline-->
              <td>
             <form action="" method="POST">

              <button type="submit" class="btn btn-danger dec" data-userid = '{{$p->user_id}}' data-number='{{$p->number}}' data-title='{{$p->title}}' data-id='{{$p->id}}'><i class="fa fa-thumbs-down" ></i></button>
                  
                           {{csrf_field()}}
                                                      
                     </form>
                 </td>
                    <!-- decline-->
                
            </tr>
                           
                     @endforeach
                     
                </table>
                  <h5 class="center-block">{{$post->links()}}</h5>  
          </div>
                 @else
                 <div class="alert alert-info">
                       <h5 class="text-center">No Post(s) Currently</h5>
                 </div>
                 @endif




<script>

//approve post
$(document).ready(function(){


$('.app').click(function(e){
    e.preventDefault();

     //disable button after click
     $(this).prop('disabled',true);
//load reqments
var id = $(this).data('id');
var tt = $(this).data('title');
var nn = $(this).data('number');
var uid = $(this).data('userid');

    $.ajax({
                  url: "{{route('approve')}}",
                  type: "POST",
                  data: {
                         '_token': $('input[name=_token]').val(),
                        'id': id,
                        'title': tt,
                        'number': nn,
                        'userid': uid,
                       
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
                    //busy load before  
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
                    $('.app').prop('disabled', false);

                    if(data == 'Error! Verify Internet Connection And Try Again'){
                        toastr.error(data);
                      }else{
                        toastr.success(data);
                         //reload data
                    $.ajax({
        	url: "{{route('man-post')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-data-mp").hide('fade');
            $(".ref-data-mp").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
            $(".ref-data-mp").removeClass("fa fa-refresh fa-spin");
            $(".div-data-mp").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-data-mp').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-data-mp').html("Error! Try Again Later");
	    	} 	        
	   });//ajax2 end

                      }
                   
                  },
                   	        
             });
})

});//end
    </script>







<script>

  $(document).ready(function(){
  
  
  $('.dec').click(function(e){
      e.preventDefault();

    //disable button after click
      $(this).prop('disabled',true);
  //load reqments
var id = $(this).data('id');
var tt = $(this).data('title');
var nn = $(this).data('number');
var uid = $(this).data('userid');

    $.ajax({
                  url: "{{route('decline')}}",
                  type: "POST",
                  data: {
                         '_token': $('input[name=_token]').val(),
                        'id': id,
                        'title': tt,
                        'number': nn,
                        'userid': uid,
                       
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
                       //busy load before  
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

                      $('.dec').prop('disabled', false);

                      if(data == 'Error! Verify Internet Connection And Try Again'){
                        toastr.error(data);
                      }else{
                        toastr.success(data);

                         //reload data
                      $.ajax({
            url: "{{route('man-post')}}",
        type: "GET",
              
              beforeSend:function(){
                $(".div-data-mp").hide('fade');
              $(".ref-data-mp").addClass("fa fa-refresh fa-spin");
             
              },
  
               complete:function(){
              $(".ref-data-mp").removeClass("fa fa-refresh fa-spin");
              $(".div-data-mp").show("fade");
              },
              
  
        success: function(data)
          {
          $('.div-data-mp').html(data);
          },
          error: function(e) 
          {
          $('.div-data-mp').html("Error! Try Again Later");
          } 	        
       });//ajax2 end
                      }
                     
  
                    },
                               
               });
  })
  
  });//end
      </script>







<script>
  //.........paginated result......................
  $(document).one('click','.pagination a', function(e){
  
  e.preventDefault();
  
  var page = $(this).attr('href').split('page=')[1];
  
  getproducts(page);
  
  function getproducts(page){
  
  $.ajax({
      url: '/manage-post-ajax?page='+ page,
  
      beforeSend:function(){
          $(".div-data-mp").hide('fade');
             $(".ref-data-mp").addClass("fa fa-refresh fa-spin");
              },
  
               complete:function(){
              $(".ref-data-mp").removeClass("fa fa-refresh fa-spin");
              $(".div-data-mp").show("fade");
              },
  
  }).done(function(data){
      $('.div-data-mp').html(data);
  
      location.hash = page;
  })
  
  }//func end
  });//doc end
  
  //.........paginated result......................
  </script>
