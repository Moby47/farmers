@if(count($fav_post)>0)
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
       <tr >
             <th>S/N</th>
     <th>IMAGE</th>
      <th>DELETE</th>
 </tr>
 @foreach($fav_post as $indexKey => $fav1)
 
 <tr id="tr{{$fav1->id}}">
         <td class="col1">{{ $indexKey+1 }}</td>
     <td>
     <p>Click the image below to goto Post: </p>
    <a href="/buy-product/{{$fav1->pro_id}}"><img src="/storage/post_images/{{$fav1->image_1}}" class="img-responsive small_size" alt="{{$fav1->title}}" title="{{$fav1->title}}"/></a></td>
     <!-- delete-->
<td>
     <button type="submit" class="btn btn-danger delfavpost" data-id="{{$fav1->id}}"><i class='fa fa-trash-o'></i></button>                     
   
 
                   </td>
     <!-- delete-->
     </tr>
 @endforeach
     </table>
</div>
 </table>
   <h5 class="center-block">{{$fav_post->links()}}</h5>  
</div>
@else

 <div class="alert alert-info">
        <h5 class="text-center">No Post Marked as Favourite, 
                <a href="{{route('center')}}" class='text-danger'> Click to Find one</a></h5>
  </div>


@endif





<!-- delete fav post -->
<script>

        $(document).ready(function(){
       
       $('.delfavpost').click(function(e){
           e.preventDefault();
           $('.id').val($(this).data('id'));
           $('#favpostmodal').modal('show');
       })

       
$('.delfavpost-btn').click(function(e){
    e.preventDefault();

//disable button after click
$(this).prop('disabled',true);

     $.ajax({
        	url: "{{route('remove_fav')}}",
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
             
$('.delfavpost-btn').prop('disabled',false);
                    toastr.success('Post Deleted From Favourites', 'Success Alert', {timeOut: 10000});
         $('#favpostmodal').modal('hide');           
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });

            //reload data
                             $.ajax({
        	url: "{{route('fav_post')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-data-fp").hide('fade');
            $(".ref-data-fp").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
            $(".ref-data-fp").removeClass("fa fa-refresh fa-spin");
            $(".div-data-fp").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-data-fp').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-data-fp').html("Error! Try Again Later");
	    	} 	        
	   });//ajax2 end  
             
		    },
		      
       }); //ajax end
       
           

})//del btn end

        });//doc ready end

</script>       
<!-- delete fav post -->





<script>
        //.........paginated result......................
        $(document).one('click','.pagination a', function(e){
        
        e.preventDefault();
        
        var page = $(this).attr('href').split('page=')[1];
        
        getproducts(page);
        
        function getproducts(page){
        
        $.ajax({
            url: '/fav-post?page='+ page,
        
            beforeSend:function(){
                $(".div-data-fp").hide('fade');
               $(".ref-data-fp").addClass("fa fa-refresh fa-spin");
                    },
        
                     complete:function(){
                 $(".ref-data-fp").removeClass("fa fa-refresh fa-spin");
                    $(".div-data-fp").show("fade");
                    },
        
        }).done(function(data){
            $('.div-data-fp').html(data);
        
            location.hash = page;
        })
        
        }//func end
        });//doc end
        
        //.........paginated result......................
        </script>