@if(count($pay)>0)

<div class="table-responsive">

 <table class="table table-bordered table-striped table-hover">
     <tr>
              <th>PAYMENT PLAN</th>
              <th>AD TITLE</th>
              <th>BANNER</th>
               <th>CURRENT STATE</th>
               <th>TIME CREATED</th>
              <th>EXPIRATION DATE</th>
              <th>REMOVE</th>
               
      </tr>
  @foreach($pay as $p)

       <tr id="tr{{$p->id}}">
          <td>{{$p->package}}</td>
            <td>{{$p->title}}</td>

           
            <td>
                    @if($p->banner == 'Custom')
                    <span class='text-primary'>Your Banner is being Designed, Please Wait...</span>
                    @else
                <img src='/storage/ads_images/{{$p->banner}}' class='img-responsive small_size_ad' />
                @endif
            </td>
           

            <td class="text-center">
               
                 @if($p->verification==0)
                    <span class='text-danger'>Inactive</span>
                 @elseif($p->verification==1)
                    <span class='text-success'>Active</span>
                 @elseif($p->verification==2)
                    <span>Deactivated</span>
                    @elseif($p->verification==3)
                    <span class='text-danger'>Declined <a href="/">Contact Us</a></span>
                    @elseif($p->verification==47)
                    <span class='text-danger'>Inactive </span>
                    @endif
                 
               
            </td>
             <td>{{$p->created_at->diffforhumans()}}</td>
            <td>{{$p->expiration}}</td>
            <td> <button type="submit" class="btn btn-danger delad" data-id="{{$p->id}}"><i class='fa fa-trash-o'></i></button></td>
            </tr>
                           
                     @endforeach
                     
                </table>
                  <h5 class="center-block">{{$pay->links()}}</h5>  
          </div>
                 @else
                 <div class="alert alert-info">
                       <h5 class="text-center">No Transactions Found</h5>
                 </div>
                 @endif





       <!-- delete running ad -->
 <script>

        $(document).ready(function(){
       
       $('.delad').click(function(e){
           e.preventDefault();
           
           $('.id').val($(this).data('id'));
           $('#admodal').modal('show');
       })

       
$('.delad-btn').click(function(e){
    e.preventDefault();
$(this).prop('disabled', true);

     $.ajax({
        	url: "{{route('delete_ad')}}",
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
                $('.delad-btn').prop('disabled', false);
                    toastr.success('Ad Deleted!', 'Success Alert', {timeOut: 10000});
                    $('#admodal').modal('hide');  
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
               
             
//reload data
$.ajax({
        	url: "{{route('user-gen-ad')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-data-gen").hide('fade');
            $(".ref-data-gen").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
            $(".ref-data-gen").removeClass("fa fa-refresh fa-spin");
            $(".div-data-gen").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-data-gen').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-data-gen').html("Error! Try Again Later");
	    	} 	        
	   });//ajax2 end


		    },
		      
       }); //ajax end
       
           

})//del btn end

        });//doc ready end

</script>       
<!-- delete runnig ad -->

          




<script>
        //.........paginated result......................
        $(document).one('click','.pagination a', function(e){
        
        e.preventDefault();
        
        var page = $(this).attr('href').split('page=')[1];
        
        getproducts(page);
        
        function getproducts(page){
        
        $.ajax({
            url: '/general-ad?page='+ page,
        
            beforeSend:function(){
                $(".div-data-gen").hide('fade');
                   $(".ref-data-gen").addClass("fa fa-refresh fa-spin");
                    },
        
                     complete:function(){
                    $(".ref-data-gen").removeClass("fa fa-refresh fa-spin");
                    $(".div-data-gen").show("fade");
                    },
        
        }).done(function(data){
            $('.div-data-gen').html(data);
        
            location.hash = page;
        })
        
        }//func end
        });//doc end
        
        //.........paginated result......................
        </script>