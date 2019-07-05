@if(count($reqs)>0)
<div class="table-responsive">
 <table class="table table-bordered table-striped table-hover" >
     <tr  >
       <th>S/N</th>
         <th>REQUEST</th>
         <th>TIME REQUESTED</th>
          <th>DELETE</th>
         </tr>
@foreach($reqs as $indexKey => $req)
     <tr id="tr{{$req->id}}">
         <td class="col1">{{ $indexKey+1 }}</td>

         <td>{{$req->request}}</td>
         <td>{{$req->created_at->diffforhumans()}}</td>
         <td>
             <button type="submit" class="btn btn-danger delreq" data-id="{{$req->id}}"><i class='fa fa-trash-o'></i></button>                     
           
         </td>
         </tr>
@endforeach
 </table>
</div>
<h5 class="tex-center">{{$reqs->links()}}</h5>
@else

<div class="alert alert-info">
                <h5 class="text-center">No Requests Made <a href='{{route("reqqq")}}' class='text-danger'>Click To View Requests From The Public</a></h5>
          </div>

@endif





<script>
        //.........paginated result......................
        $(document).one('click','.pagination a', function(e){
        
        e.preventDefault();
        
        var page = $(this).attr('href').split('page=')[1];
        
        getproducts(page);
        
        function getproducts(page){
        
        $.ajax({
            url: '/request-ajax?page='+ page,
        
            beforeSend:function(){
                $(".div-data-req").hide('fade');
                    $(".ref-data-req").addClass("fa fa-refresh fa-spin");
                    },
        
                     complete:function(){
                    $(".ref-data-req").removeClass("fa fa-refresh fa-spin");
                    $(".div-data-req").show("fade");
                    },
        
        }).done(function(data){
            $('.div-data-req').html(data);
        
            location.hash = page;
        })
        
        }//func end
        });//doc end
        
        //.........paginated result......................
        </script>







 <!-- delete request -->
 <script>

        $(document).ready(function(){
       
       $('.delreq').click(function(e){
           e.preventDefault();
           $('.id').val($(this).data('id'));
           $('#delreqmodal').modal('show');
       })

       
$('.delreq-btn').one('click', function(e){
    e.preventDefault();

$('.delreq-btn').prop('disabled', true);

     $.ajax({
        	url: "{{route('close')}}",
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
                $('.delreq-btn').prop('disabled', false);
                    toastr.success('Request Deleted!', 'Success Alert', {timeOut: 5000});
                    $('#delreqmodal').modal('hide');
                  
//reload data
$.ajax({
        	url: "{{route('req-ajax')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-data-req").hide('fade');
            $(".ref-data-req").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
            $(".ref-data-req").removeClass("fa fa-refresh fa-spin");
            $(".div-data-req").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-data-req').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-data-req').html("Error! Try Again Later");
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
<!-- delete request -->