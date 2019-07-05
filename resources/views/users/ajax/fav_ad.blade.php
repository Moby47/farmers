@if(count($fav_ad)>0)
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
       <tr>
       <th>S/N</th>
     <th>IMAGE</th>
      <th>REMOVE</th>
 </tr>
 @foreach($fav_ad as $indexKey => $fav2)
 
 <tr id="tr{{$fav2->id}}">
         <td class="col1">{{ $indexKey+1 }}</td>
     <td>
        <p>Click the image below to goto Ad: </p> 
        <a href="/buy-ad/{{$fav2->pro_id}}"><img src="/storage/ads_images/{{$fav2->banner}}" class="img-responsive small_size" alt="{{$fav2->banner}}" title="{{$fav2->banner}}"/></a>
    </td>
     <!-- delete-->
<td>
     <button type="submit" class="btn btn-danger delfavad" data-id="{{$fav2->id}}"><i class='fa fa-trash-o'></i></button>                     
    </td>
     <!-- delete-->

     </tr>
 @endforeach
     </table>
</div>
 </table>
   <h5 class="center-block">{{$fav_ad->links()}}</h5>  
</div>
@else

 <div class="alert alert-info">
        <h5 class="text-center">No Advert Marked as Favourite, 
                <a href="/all-student-adverts" class='text-danger'> Click to Find one</a></h5>
  </div>


@endif




<!-- delete fav ad -->
<script>

        $(document).ready(function(){
       
       $('.delfavad').click(function(e){
           e.preventDefault();
           $('.id').val($(this).data('id'));
           $('#favadmodal').modal('show');
       })

       
$('.delfavad-btn').click(function(e){
    e.preventDefault();

//disable button after click
$(this).prop('disabled',true);

     $.ajax({
        	url: "{{route('remove_fav_ad')}}",
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
         
$('.delfavad-btn').prop('disabled',false);
                    toastr.success('Ad Deleted From Favourites', 'Success Alert', {timeOut: 10000});
        $('#favadmodal').modal('hide');     
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });

             //reload data
                             $.ajax({
        	url: "{{route('fav-ad')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-data-ad").hide('fade');
            $(".ref-data-ad").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
            $(".ref-data-ad").removeClass("fa fa-refresh fa-spin");
            $(".div-data-ad").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-data-ad').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-data-ad').html("Error! Try Again Later");
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
            url: '/fav-ad?page='+ page,
        
            beforeSend:function(){
                $(".div-data-ad").hide('fade');
               $(".ref-data-ad").addClass("fa fa-refresh fa-spin");
                    },
        
                     complete:function(){
                 $(".ref-data-ad").removeClass("fa fa-refresh fa-spin");
                    $(".div-data-ad").show("fade");
                    },
        
        }).done(function(data){
            $('.div-data-ad').html(data);
        
            location.hash = page;
        })
        
        }//func end
        });//doc end
        
        //.........paginated result......................
        </script>