 @if(count($post)>0)

        <div class="table-responsive">

         <table  class="table table-bordered table-striped table-hover ">
             <tr>
                 <th>S/N</th>
                      <th>TITLE</th>
                      <th>PRICE</th>
                       <th>CONDITION</th>
                       <th>CATEGORY</th>
                      <th>DESCRIPTION</th>
                       <th>STATE</th>
                      <th>IMAGE (1)</th>
                      <th>IMAGE (2)</th>
                      <th>IMAGE (3)</th>
                      <th>IMAGE (4)</th>
                      <th>EDIT</th>
                      <th>DELETE</th>
                      <th>SOLD</th>
              </tr>
          @foreach($post as $indexKey => $p)

               <tr  class="item{{$p->id}}">

                    <td class="col1">{{ $indexKey+1 }}</td>

                  <td class='new_title'>{{$p->title}}</td>

                    <td class='new_price'>
                        @if($p->price == 47)
                       <span class='text-primary'> *Contact Me For Price</span>
                       @elseif($p->price == 0)
                       <span class='text-primary'> *Swap</span>
                        @else
                        {{number_format($p->price)}}
                        @endif
                       
                    </td>

                    <td class="text-center new_status">
                        <?php
                         if($p->status=="very_ok"){
                            echo "Very Ok";
                         }elseif($p->status=="very_very_ok"){
                            echo "Very Very Ok";
                         }else{
                             echo "Ok";
                         }
                        ?>
                    </td>
                     <td>{{$p->category}}</td>
                    <td>{{ substr($p->description,0, 20) }}.....More</td>
                    <td><?php
                       if($p->verification == 0){
                           echo "<span class='text-info'>Unpublished</span>";
                       } elseif($p->verification ==1){
                           echo "<span class='text-success change'>Published</span>";
                       }elseif($p->verification == 2){
                           echo "<span class='text-primary'>Sold</span>";
                       }else{
                           echo "<span class='text-danger'>Declined! <a href='/'>Contact Us </a></span>";
                       }
                       ?>
                    </td>
                    <td><img src="/storage/post_images/{{$p->image_1}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>
                    <td><img src="/storage/post_images/{{$p->image_2}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>
                    <td><img src="/storage/post_images/{{$p->image_3}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>
                    <td><img src="/storage/post_images/{{$p->image_4}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>

                    <td>
                    <!-- 0 = unpublished
                        1 = published
                        2 = sold
                        3 = declined -->
                    @if($p->verification == 0)

                    <button class="btn btn-info edit-btn" data-id="{{$p->id}}" data-title="{{$p->title}}" 
                        data-price="{{$p->price}}"  data-description="{{$p->description}}"><i class='fa fa-pencil'></i></button>

                    @else
                    <button class="btn btn-info cant-edit"><i class='fa fa-pencil'></i></button>
                    @endif
                    </td>
                    <!-- delete-->
                      <td>
                        
                           <button type="submit" class="btn btn-danger del-btn" data-id="{{$p->id}}"><i class='fa fa-trash-o'></i></button>
                           
                                          </td>
                            <!-- delete-->
                          <td>
                              
                     
                       @if($p->verification ==1)
                        
                                   
                                <input name="id" type="hidden" value="{{$p->id}}"/>
                           <button  class="btn btn-primary sold-btn" data-id="{{$p->id}}"><i class='fa fa-handshake-o'></i></button>
                          
                       @else
                       <button type="submit"  class="btn btn-primary cant-sell"><i class='fa fa-handshake-o'></i></button>
                           
                       @endif
                       
                               
                          </td>
                    </tr>
                                   
                             @endforeach
                             
                        </table>
                          <h5 class="center-block">{{$post->links()}}</h5>  
                  </div>
                         @else
                         <div class="alert alert-info">
                               <h5 class="text-center">You Have No Posts Yet. <a href='{{route('post-page')}}' class='text-danger'>Post Now!</a></h5>
                         </div>
                         @endif




<!-- sold -->
<script>

    //cant sell
$(document).ready(function(){
    $('.cant-sell').click(function(){
        alert("Post is Currently Unpublished, Declined or Sold......");
    });
});
    //cant sell

     //cant edit
$(document).ready(function(){
    $('.cant-edit').click(function(){
        alert('Post is Currently Active, Declined or Sold...');
    });
});
    //cant edit

    //category select attitude when swap is chosen
$('.postcategory').change(function(){
   var choice = $(this).val();
   if(choice == 'Swap-Items'){
    $('.postprice').val(0);
       $('.postprice').hide();
   }else{
    $('.postprice').show();
    $('.postprice').val(' '); 
   }
});
//category select attitude when swap is chosen

        $(document).ready(function(){
       
       $('.sold-btn').click(function(e){
           e.preventDefault();

           $('.i').val($(this).data('id'));
           $('#soldmodal').modal('show');
       })
       
       
       $('.sold').click(function(e){
           e.preventDefault();
       
           $(this).prop('disabled',true);

            $.ajax({
                   url: "{{route("sold")}}",
                   type: "POST",
                   data:  {
                       '_token': $('input[name=_token]').val(),
                       'id': $('.i').val(),
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
                    $('#soldmodal').modal('hide');

                    $('.post').prop('disabled',false);

                    toastr.success('Post Marked as Sold...', 'Success Alert', {timeOut: 5000});
                   
                    $.ajax({
        	url: "{{route('manage-post')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-datam").hide('fade');
            $(".ref-data").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
            $(".ref-data").removeClass("fa fa-refresh fa-spin");
            $(".div-datam").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-datam').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-datam').html("Error! Try Again Later");
	    	} 	        
	   });//ajax2 end

                   },
                     
              }); //ajax end
                  
       
       })
        
       
        });
                 
             
           </script>
           <!--sold-->
       







            <!-- delete post -->
<script>

        $(document).ready(function(){
       
       $('.del-btn').click(function(e){
           e.preventDefault();
           $('.i').val($(this).data('id'));
           $('#delmodal').modal('show');
       })

       
$('.del').click(function(e){
    e.preventDefault();


                    $('.del').prop('disabled',true);

     $.ajax({
        	url: "{{route('remove')}}",
			type: "DELETE",
			data:  {
                '_token': $('input[name=_token]').val(),
                'id': $('.i').val(),
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
                $('.del').prop('disabled',false);

                $('#delmodal').modal('hide');
             toastr.success('Post Deleted!', 'Success Alert', {timeOut: 10000});
             
              //reload data
              $.ajax({
        	url: "{{route('manage-post')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-datam").hide('fade');
            $(".ref-data").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
            $(".ref-data").removeClass("fa fa-refresh fa-spin");
            $(".div-datam").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-datam').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-datam').html("Error! Try Again Later");
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
<!-- delete post -->








<!--edit post-->

<script>

        $(document).ready(function(){
              
              $('.edit-btn').click(function(e){
                  e.preventDefault();
       
                  $('.i').val($(this).data('id'));
                  $('.des').val($(this).data('description'));
                  $('.p').val($(this).data('price'));


                  $x =   $(this).data('price');
                  if($x == 47){
                    $('.p').val(47);
                      $('.postprice').hide();
                      $('.pri').html('Please');
                  }else if($x == 0){
                    $('.p').val(0);
                      $('.postprice').hide();
                      $('#rad1').hide();
                      $('#rad2').hide();
                  }

                  $('.t').val($(this).data('title'));
       
                  $('#editModal').modal('show');
              })
       
      
       
        });//doc end
       


       //determine if contact me for price
$('#rad1').click(function(){
    if($('#rad1').prop('checked',true)){
        $('.postprice').show();
    $('.postprice').val(' '); 
    $('.cn').html('Price');
    }
});
$('#rad2').click(function(){
    if($('#rad2').prop('checked',true)){
        $('.postprice').val(47);
       $('.postprice').hide();
       $('.cn').html('Please');
    }
});
//determine if contact me for price

           </script>


<script>

$(document).ready(function(){
 //submit edited post

 $("#formed").one('submit',(function(e) {
               e.preventDefault();

                $('.post-btn').prop('disabled',true);

               $.ajax({
                   url: "{{route('repair')}}",
                   type: "POST",
                   data:  new FormData(this),
                   contentType: false,
                   cache: false,
                   processData:false,
                   
                   
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
                    $('.post-btn').prop('disabled',false); 
                     //if validation errors occur
                     if ((data.errors)) {
                        
                        //...........emit  validation errors................
                           if (data.errors.Title) {
                               toastr.info(data.errors.Title, 'warning Alert', {timeOut: 5000});
                           }
                           if (data.errors.Status) {
                               toastr.info(data.errors.Status, 'warning Alert', {timeOut: 5000});
                           }
                           if (data.errors.Category) {
                               toastr.info(data.errors.Category, 'warning Alert', {timeOut: 5000});
                           }
                           if (data.errors.Price) {
                               toastr.info(data.errors.Price, 'warning Alert', {timeOut: 5000});
                           }
                           if (data.errors.Description) {
                               toastr.info(data.errors.Description, 'warning Alert', {timeOut: 5000});
                           }
                           if (data.errors.First_Image) {
                               toastr.info(data.errors.First_Image, 'warning Alert', {timeOut: 5000});
                           }
                           if (data.errors.Second_Image) {
                               toastr.info(data.errors.Second_Image, 'warning Alert', {timeOut: 5000});
                           }
                           if (data.errors.Third_Image) {
                               toastr.info(data.errors.Third_Image, 'warning Alert', {timeOut: 5000});
                           }
                           if (data.errors.Fourth_Image) {
                               toastr.info(data.errors.Fourth_Image, 'warning Alert', {timeOut: 5000});
                           }
                        //.............................. 
       
                       } else {

                        if(data == 'Post Edited!'){
                        toastr.success(data);
                          //empty form
                          $("#formed")[0].reset();
                             //dismiss modal
                             $("#editModal").modal('hide');
                             //reload data
                             $.ajax({
        	url: "{{route('manage-post')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-datam").hide('fade');
            $(".ref-data").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
            $(".ref-data").removeClass("fa fa-refresh fa-spin");
            $(".div-datam").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-datam').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-datam').html("Error! Try Again Later");
	    	} 	        
	   });//ajax2 end
                    }else{
                        toastr.error(data);
                    }
                   



                       }
                   
                   },
                     
              }); //ajax end
                  
           })); //submit form end
});
    </script>
       
       <!--edit post-->





       <script>
            //.........paginated result......................
            $(document).one('click','.pagination a', function(e){
            
            e.preventDefault();
            
            var page = $(this).attr('href').split('page=')[1];
            
            getproducts(page);
            
            function getproducts(page){
            
            $.ajax({
                url: '/manage-posts?page='+ page,
            
                beforeSend:function(){
                    $(".div-datam").hide('fade');
                    $(".ref-data").addClass("fa fa-refresh fa-spin");
                        },
            
                         complete:function(){
                      $(".ref-data").removeClass("fa fa-refresh fa-spin");
                        $(".div-datam").show("fade");
                        },
            
            }).done(function(data){
                $('.div-datam').html(data);
            
                location.hash = page;
            })
            
            }//func end
            });//doc end
            
            //.........paginated result......................
            </script>