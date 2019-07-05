
								<h4 class="text-center">{{$count}} Result(s) Found for {{$s}} 
										(Showing {{count($post)}} of {{$count}})</h4>

					<!--parent-->
	<div class="ads-grid">



		<!--post-->
		<div class="agileinfo-ads-display col-md-9">
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
								@guest
								<a href="/message-user/{{$pp->id}}" class="btn blue white up">Chat</a>
								@else
		
								@if(Auth::user()->id != $pp->user_id)
		
								@if(Auth::check())
								@if ( Auth::user()->status == 1)
		
								@else
								<button class='btn aqua white message_sch up'  data-userid="{{$pp->user_id}}" data-title="{{$pp->title}}" data-myid="{{Auth()->user()->id}}" data-name="{{Auth()->user()->name}}" >Chat</button>
								@endif
								@endif
								
								@else
								<label class="label label-primary up">Posted by you</label>
								@endif
								
								
								@endguest
								
											<button class="btn btn-info display blue up" data-num="{{$pp->number}}">Call</button>
							

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
									 <h5 class="text-center"> No Post For Your School Currently, 
								<!--admin if-->		 @if ( Auth()->user()->status == 1)
									
									 @else
							   <a href="{{route('post-page')}}"><span class='text-danger'> Click to Add</span></a></h5>
									<!--admin if-->		@endif
							   @else
									<h5 class="text-center"><a href="/goto-ad">No Post Currently,<span class='text-danger'> Click to Add</span></a></h5>
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





			<!--ads-->
				<div class="side-bar col-md-3">
					
				<div class="w3ls-featured-ads">
					<h2 class="sear-head fer">Premium Ads</h2>
					<div class="w3l-featured-ad">

							@if(count($advert)>0)

							@foreach($advert as $ad)
						<!--loop-->
						<a href="/buy-ad/{{$ad->id}}">
							<div class="w3-featured-ad-left">
									<img src="/storage/ads_images/{{$ad->banner}}" alt="{{$ad->banner}}" 
									title="{{$ad->title}}" class='img-responsive ad-size'>
								</div>
								<div class="w3-featured-ad-right">
									<h4 class='wrap'>{{substr($ad->title,0,11)}}..</h4></a>
						<p><a class='btn aqua white custom-btn' href='tel:{{$ad->phone}}'>Call</a></p>
						@if($ad->link)
								<p><a class='btn aqua white custom-btn' href='http://{{$ad->link}}' target='_blank'>Our Website</a></p>
							@else
							<p>No Website</p>
							@endif
						</div>
								<div class="clearfix"></div>
						
						<hr>
						<!--loop-->
						@endforeach
					
					@else
					
						 <div class="alert alert-info">
                               <h5 class="text-center">
						@if(Auth::check())
						No Advert For Your School Currently,
							@if ( Auth()->user()->status == 1)
							
							@else
							<a href="/ads"><span class='text-danger'>Click To Add </span></a></h5>
							@endif
							
						@else
						<a href="/goto-ad">No Advert Currently, <span class='text-danger'>Click To Add </span></a></h5>
						@endif
						 </div>
					@endif
					</div>
					
					
					<div class="clearfix"></div>
				</div>
				</div>
				<!--ads-->



				
				
				<div class="clearfix"></div>
			</div>
			<!--parent-->






			






<!-- ...........................message modal....................-->		
<div class="container">
        <!-- Modal -->
        <div class="modal fade" id="msg_school" role="dialog">
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
								
																	<input type='hidden' id='title' name="title" class="ttt"/>
																	<input type='hidden' id='myid' name="slave" class="slave"/>
																	<input type='hidden' id='userid'  name="master" class="master"/>
																	<input type='hidden' id='name' name="name" class="name"/>
								
											<textarea placeholder="Type Here" name="Message" class="Message" required="">{{old('Message')}}</textarea>
																						
                                      <hr>
                                    <button type="submit" class="btn btn-warning btn-warng1 mess_school"><span class="glyphicon glyphicon-send tag_02 loadmg"></span> Send </a>&nbsp;
                                  {{csrf_field()}}
                              </form>
                          </div>
              </div>
             <!-- <div class="modal-footer f">
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

						 var query = $('#school').val();

						
						var page = $(this).attr('href').split('page=')[1];
						
						getproducts(page);
						
						function getproducts(page){
						
						$.ajax({
							url: '/find-by-school?School='+query+'&page='+ page,
						
							beforeSend:function(){
								  $(".pload").addClass("fa fa-refresh fa-spin");
								  $(".load").html('Fetching Results...');
								  $('.change').hide('fade');
								 // $(document).scrollTop(0);
									},
						
									 complete:function(){
									$(".pload").removeClass("fa fa-refresh fa-spin");
									$(".load").html(' ');
									$('.change').show('fade');
									},
						
						}).done(function(data){
							$('.change').html(data);
						
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
        $('.message_sch').click(function(e){
          e.preventDefault();
    //send id to modal
    $('#id').val($(this).data('id'));
    $('#title').val($(this).data('title'));
    $('#userid').val($(this).data('userid'));
    $('#name').val($(this).data('name'));
    $('#myid').val($(this).data('myid'));
          //show modal
            $("#msg_school").modal();
        })
        });


$('.mess_school').on('click',function(e){
    e.preventDefault();


 $.ajax({
            type: 'POST',
            url: "{{route('message')}}",
            data: {
                '_token': $('input[name=_token]').val(),
               'Message': $('.Message').val(),
               'title': $('.ttt').val(),
               'slave': $('.slave').val(),
               'master': $('.master').val(),
               'name': $('.name').val(),
              
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
						toastr.success('Message Sent!', 'Success Alert',data, {timeOut: 10000});
                     //empty modal
                     $('.Message').val(' ');
                     //dismiss modal
                     $("#msg_school").modal('hide');
					}else{
						toastr.error(data);
                    
					}
                     
                }
            },//success data end
        }); //ajax end

}) //btn end



</script>

<!-- show message modal and send-->