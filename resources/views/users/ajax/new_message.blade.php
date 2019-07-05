@if(count($new)>0)
<ul class="collection list-group">
  
   <table class="table table-hover table-striped">
@foreach($new as $indexKey =>  $n)
    <tr class="item{{$n->id}}">

        <td class="col1">{{ $indexKey+1 }}</td>
        
      <td>
        New Message From <b>{{$n->name}}</b> {{$n->updated_at->diffforhumans()}}
      <button class="btn btn-primary respond" data-id='{{$n->id}}' data-title='{{$n->title}}'
        data-time='{{$n->created_at->diffforhumans()}}' data-message='{{$n->message}}'> Respond </button>
      </td>
    </tr>
    @endforeach
    </table>
  <h5>{{$new->links()}}</h5>
 @else
 
 <div class="alert alert-info">
               <h5 class="text-center">No New Conversation</h5>
         </div>
        </ul>
 @endif









 <!--respond to msg-->

<script>

        $(document).ready(function(){
              
              $('.respond').click(function(e){
                  e.preventDefault();
       
                   $('.i').val($(this).data('id'));
                  $('.title').val($(this).data('title'));
                  $('.time').val($(this).data('time'));
                  $('.message').val($(this).data('message'));
                  $('#respondmodal').modal('show');
              })
})

//final msg click

$('#send_message').click(function(e){
    e.preventDefault();
        $(this).prop('disabled',true);
    $.ajax({
        	url: "{{route('reply')}}",
			type: "POST",
			data:  {
                '_token': $('input[name=_token]').val(),
                'id': $('.i').val(),
                'Message_Reply': $('.Reply').val(),
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

 $('#send_message').prop('disabled',false);

            //if validation errors occur
            if ((data.errors)) {
                 
                 //...........emit  validation errors................
                
                    if (data.errors.Message_Reply) {
                        toastr.info(data.errors.Message_Reply, 'warning Alert', {timeOut: 5000});
                    }
                 //.............................. 
            }else{
              toastr.success(data);
              //empty form
              $("#formx")[0].reset();

 //reload data
 $.ajax({
        	url: "{{route('new-message')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-data-msg").hide('fade');
          $(".ref-data-msg").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
           $(".ref-data-msg").removeClass("fa fa-refresh fa-spin");
            $(".div-data-msg").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-data-msg').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-data-msg').html("Error! Try Again Later");
	    	} 	        
	   });//ajax2 end

                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                //dismiss modal
            $("#respondmodal").modal('hide');

            }  //if data error end
		    }, //success end
		      
             }); //ajax end
            })
              </script>

         <!--respond to msg-->









         <script>
                //.........paginated result......................
                $(document).one('click','.pagination a', function(e){
                
                e.preventDefault();
                
                var page = $(this).attr('href').split('page=')[1];
                
                getproducts(page);
                
                function getproducts(page){
                
                $.ajax({
                    url: '/new-message-ajax?page='+ page,
                
                    beforeSend:function(){
                        $(".div-data-msg").hide('fade');
                           $(".ref-data-msg").addClass("fa fa-refresh fa-spin");
                            },
                
                             complete:function(){
                            $(".ref-data-msg").removeClass("fa fa-refresh fa-spin");
                            $(".div-data-msg").show("fade");
                            },
                
                }).done(function(data){
                    $('.div-data-msg').html(data);
                
                    location.hash = page;
                })
                
                }//func end
                });//doc end
                
                //.........paginated result......................
                </script>