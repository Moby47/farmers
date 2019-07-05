@if(count($new)>0)
<ul class="collection list-group">
  
@foreach($new as $indexKey => $n)


<div class="table-responsive">
<table class="table table-hover table-striped">
<tr   id="tr{{$n->id}}">
<td class="col1">{{ $indexKey+1 }}</td>

<td>
@if($n->seen == 1)
    <span class='fa fa-folder-open'></span>
 @elseif($n->seen == NULL)
 <span class='fa fa-folder'></span>
 @endif
</td>

<td> New Reply on <b>{{$n->title}}</b>, {{$n->updated_at->diffforhumans()}}</td>
<td>
<button class="btn btn-primary white respond2" data-id='{{$n->id}}' data-title='{{$n->title}}' 
    data-message='{{$n->reply}}' data-master='{{$n->master}}'
     data-name='{{Auth()->user()->name}}'data-myid='{{Auth()->user()->id}}'>Respond</button>
</td>
<td>
<button type="submit" class="btn btn-danger delmsg" data-id='{{$n->id}}'><i class='fa fa-trash-o'></i></button>
</td>
</tr>

</table>
</div>


    @endforeach
 
  <h5>{{$new->links()}}</h5>
 @else
 
 <div class="alert alert-info">
               <h5 class="text-center">No Running Conversations</h5>
         </div>
        </ul>
 @endif




   <!--re - respond to msg-->

<script>

        $(document).ready(function(){
              
              $('.respond2').click(function(e){
                  e.preventDefault();
       
                   $('.id').val($(this).data('id'));
                  $('.title').val($(this).data('title'));
                  $('.msg').val($(this).data('message'));
                  $('.master_id').val($(this).data('master'));
                  $('.name').val($(this).data('name'));
                  $('.slave_id').val($(this).data('myid'));
    
                  $('#respond2modal').modal('show');
              });
    });
    
    //final msg click
    
    $('.sendback').click( function(e){
    e.preventDefault();
  
    $(this).prop('disabled',true);

    $.ajax({
            url: "{{route('refeed')}}",
            type: "POST",
            data:  {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').val(),
                'title': $('.title').val(),
                'name': $('.name').val(),
                'slave': $('.slave_id').val(),
                'master': $('.master_id').val(),
                'Message': $('.msg2').val(),
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
    
                $('.sendback').prop('disabled',false);

            //if validation errors occur
            if ((data.errors)) {
                 
                 //...........emit  validation errors................
                
                    if (data.errors.Message) {
                        toastr.info(data.errors.Message, 'warning Alert', {timeOut: 5000});
                    }
                 //.............................. 
            }else{
              toastr.success('Message Sent!', 'Success Alert', {timeOut: 5000});
              //empty form
              $(".re_form")[0].reset();
    
    //reload
//reload data
$.ajax({
        	url: "{{route('feedback')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-data-feed").hide('fade');
          $(".ref-data-feed").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
           $(".ref-data-feed").removeClass("fa fa-refresh fa-spin");
            $(".div-data-feed").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-data-feed').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-data-feed').html("Error! Try Again Later");
	    	} 	        
	   });//ajax2 end


                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                //dismiss modal
            $("#respond2modal").modal('hide');


            }  //if data error end
            }, //success end
              
             }); //ajax end
            })
              </script>
    
         <!--respond to msg-->
    




          <!-- delete message -->
<script>

        $(document).ready(function(){
       
       $('.delmsg').click(function(e){
           e.preventDefault();
           $('.id').val($(this).data('id'));
           $('#delmsgmodal').modal('show');
       })

       
$('.delmessage').click(function(e){
    e.preventDefault();
    $(this).prop('disabled',true);
     $.ajax({
        	url: "{{route('remove-feed')}}",
			type: "DELETE",
			data:  {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').val(),
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
                $('.delmessage').prop('disabled',false);
                $('#delmsgmodal').modal('hide');
             toastr.success('Message Feed Deleted!', 'Success Alert', {timeOut: 10000});
             
             //reload data
  $.ajax({
        	url: "{{route('feedback')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-data-feed").hide('fade');
              
              $(".ref-data-feed").addClass("fa fa-refresh fa-spin");
            },

             complete:function(){
                $(".ref-data-feed").removeClass("fa fa-refresh fa-spin");
            $(".div-data-feed").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-data-feed').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-data-feed').html("Error! Try Again Later");
	    	} 	        
	   });//ajax2 end

                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
		    },
		      
       }); //ajax end
       
           

})//del btn end

        });//doc ready end

</script>       
<!-- delete message -->





<script>
        //.........paginated result......................
        $(document).one('click','.pagination a', function(e){
        
        e.preventDefault();
        
        var page = $(this).attr('href').split('page=')[1];
        
        getproducts(page);
        
        function getproducts(page){
        
        $.ajax({
            url: '/feedback-ajax?page='+ page,
        
            beforeSend:function(){
                $(".div-data-feed").hide('fade');
                    },
        
                     complete:function(){
                    $(".div-data-feed").show("fade");
                    },
        
        }).done(function(data){
            $('.div-data-feed').html(data);
        
            location.hash = page;
        })
        
        }//func end
        });//doc end
        
        //.........paginated result......................
        </script>