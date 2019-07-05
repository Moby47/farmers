
								<h4 class="text-center">{{$count}} Result(s) Found 
										(Showing {{count($post)}} of {{$count}})</h4>

					<!--parent-->
	<div class="ads-grid">



		<!--post-->
		<div class="agileinfo-ads-display col-md-12">
				<div class="wrapper">					
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
					<li role="presentation" class="active">
					  <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
						
						<span class="text">
								Posts
							</span>
					  </a>
					</li>
					
				  </ul>
				  <div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
					   <div>
											<div id="container">
							
						
							<div class="clearfix"></div>
						<ul class="list">
						
								@if(count($post)>0)

							@foreach($post as $pp)
							<!--loop-->
							<a href="/buy-product/{{str_replace(' ','-',$pp->title)}}">
								<li>
								<img src="/storage/post_images/{{$pp->image_1}}"
								 class="img-responsive img-thumbnail height" title="{{$pp->description}}" alt="{{$pp->title}}">
								<section class="list-left">
										<h5 class="title text-capitalize">{{substr($pp->title,0,20)}}..</h5>
								<span class="adprice"><strike>N</strike>{{number_format($pp->price)}}</span>
								<p class="catpath">{{$pp->category}}</p>
							</a>
								
								
											<button class="btn btn-info display blue up" data-num="{{$pp->number}}">Call </button>
							

								</section>
								<section class="list-right">
								<span class="date">{{$pp->created_at->diffforhumans()}}</span>
								<span class="cityname">{{$pp->school}}</span>
								</section>
								<div class="clearfix"></div>
								</li> 
							
						<!--loop-->
						@endforeach

						<span class='p2load'></span>
						
								@else

								 <div class="alert alert-info">

								<!--mother if-->	 @if(Auth()->check())
									 <h5 class="text-center"> No Post Found Currently, Please Reselect School or Category
								<!--admin if-->		 @if ( Auth()->user()->status == 1)
									
									 @else
							   <a href="{{route('post-page')}}"><span class='text-danger'> Click to Add</span></a></h5>
									<!--admin if-->		@endif
							   @else
									<h5 class="text-center"><a href="{{route('goto_post')}}">No Post Found,<span class='text-danger'> Click to Add</span></a></h5>
							<!--mother if-->		@endif
							</div>
								@endif	
								
						</ul>
						<h5 class="text-center">{{$post->links()}} </h5>
					</div>
                    <button class='btn blue white fsearch'>Filter Search</button>
                    <script>
                            $('.fsearch').click(function(){
                                $('#filterModal').modal();
                            });
                                            </script>	
						</div>
					</div>
					
				  </div>
				</div>
			</div>
			</div>
			<!--post-->





		
				
				
				<div class="clearfix"></div>
			</div>
			<!--parent-->






			






<!-- ...........................message modal....................-->		
<div class="container">
        <!-- Modal -->
        <div class="modal fade" id="msgmess_search" role="dialog">
          <div class="modal-dialog modal-lg">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title h">Send Message</h4>
              </div>
              <div class="modal-body b">
                      <div class="wthree-help">
                              <form action="" method="">
								
																	<input type='hidden' id='titless' name="title" class="titles"/>
																	<input type='hidden' id='myidss' name="slave" class="slaves"/>
																	<input type='hidden' id='useridss'  name="master" class="masters"/>
																	<input type='hidden' id='namess' name="name" class="names"/>
								
											<textarea placeholder="Type Here" name="Message" class="Message_custom" required="">{{old('Message')}}</textarea>
																						
                                      <hr>
                                    <button type="submit" class="btn btn-warning btn-warng1 mess_search"><span class="glyphicon glyphicon-send tag_02 loadmg"></span> Send </a>&nbsp;
                                  {{csrf_field()}}
                              </form>
                          </div>
              </div>
              <!--<div class="modal-footer f">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>-->
            </div>
            
          </div>
        </div>
        
      </div>
  <!-- ...........................message modal....................-->	










				
	

				<script>
						//.........paginated result......................
						$(document).one('click','.pagination a', function(e){
						
						e.preventDefault();

						 var qx = $('#fsch').val();
						 var qxx = $('#fcat').val();
						 
						

						var page = $(this).attr('href').split('page=')[1];
						
						getproducts(page);
						
						function getproducts(page){
						
						$.ajax({
							url: '/search-campus-by-category?filsch='+qx+'&filcat='+qxx+'&page='+ page,
						
							beforeSend:function(){
                                //  $(".pload").addClass("fa fa-refresh fa-spin");
                                  $(".load").html('Fetching Results...');
                                  $('.change3').hide('fade');
                                 // $(document).scrollTop(0);
									},
						
									 complete:function(){
								//	$(".pload").removeClass("fa fa-refresh fa-spin");
									$(".load").html(' ');
									$('.change3').show('fade');
									},
						
						}).done(function(data){
							$('.change3').html(data);
						
							location.hash = page;
						})
						
						}//func end
						});//doc end
						
						//.........paginated result......................
						</script>







<!--show modal for number-->
<script>
		$('.display').click(function(){
		 $('#number').val($(this).data('num'));
		 var x = $('#number').val();
		   $('.callme').html('<a href="tel:'+x+'"> click to call '+x+' </a>');
			$('#showModal').modal('show');
		});
		
		</script>
		<!--show modal for number-->









		

 <!-- show message modal and send-->
 <script>
        $(document).ready(function(){
        $('.message3xx').click(function(e){
          e.preventDefault();
    //send id to modal
    $('#idss').val($(this).data('ids'));
    $('#titless').val($(this).data('titles'));
    $('#useridss').val($(this).data('userids'));
    $('#namess').val($(this).data('names'));
    $('#myidss').val($(this).data('myids'));
          //show modal
            $("#msgmess_search").modal();
        })
        });


$('.mess_search').on('click',function(e){
    e.preventDefault();


 $.ajax({
            type: 'POST',
            url: "{{route('message')}}",
            data: {
                '_token': $('input[name=_token]').val(),
               'Message': $('.Message_custom').val(),
               'title': $('.titles').val(),
               'slave': $('.slaves').val(),
               'master': $('.masters').val(),
               'name': $('.names').val(),
              
            },
			beforeSend:function(){
				$('.mess3').prop('disabled', true);
				 //busy load after
				 $.busyLoadFull("show", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                      },
            
                       complete:function(){
						$('.mess3').prop('disabled', false);
                       //busy load after
            $.busyLoadFull("hide", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                      },

            success: function(data) {
               //if validation errors occur
                if ((data.errors)) {
                 
                 //...........emit  validation errors................
                    if (data.errors.Message) {
                        toastr.info(data.errors.Message, 'warning Alert', {timeOut: 5000});
                    }
                 //.............................. 

                } else {
					if(data == 'Sent'){
						toastr.success('Message Sent!', 'Success Alert',data, {timeOut: 5000});
                     //empty modal
                     $('.Message').val(' ');
                     //dismiss modal
                     $("#msgmess_search").modal('hide');
					}else{
						toastr.error(data);
                    
					}
                     
                }
            },//success data end
        }); //ajax end

}) //btn end



</script>

<!-- show message modal and send-->