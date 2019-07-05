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
									@if(Auth::check())
									Posts In Your School
									@else
									All Posts
									@endif
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
											<h5 class="title text-capitalize ">{{substr($pp->title,0,20)}}..</h5> 
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
										 <h5 class="text-center"> No Post For Your School Currently, 
									<!--admin if-->		 @if ( Auth()->user()->status == 1)
										
										 @else
								   <a href="{{route('post-page')}}"><span class='text-danger'> Click to Add</span></a></h5>
										<!--admin if-->		@endif
								   @else
										 <h5 class="text-center"><a href="{{route('goto_post')}}">No Post Currently,<span class='text-danger'> Click to Add</span></a></h5>
								<!--mother if-->		@endif
								</div>
									@endif	
									
							</ul>
							<h5 class="text-center">{{$post->links()}} </h5>
						</div>
						
							</div>
						</div>
						
					  </div>
					</div>
				</div>
				<button class='btn blue white fsearch'>Filter Search</button>
				
				</div>
				
				<div class="clearfix"></div>
			</div>
			<!--parent-->
			
			<script>
$('.fsearch').click(function(){
    $('#filterModal').modal();
});
				</script>
		












  <!-- ...........................message modal....................-->		
  <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="msg" role="dialog">
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
								
																	<input type='hidden' id='titlex' name="title" class="titlex"/>
																	<input type='hidden' id='myidx' name="slave" class="slavex"/>
																	<input type='hidden' id='useridx'  name="master" class="master_find"/>
																	<input type='hidden' id='namex' name="name" class="namex"/>
								
											<textarea placeholder="Type Here" name="Message" class="Message_main" required="">{{old('Message')}}</textarea>
																						
                                      <hr>
                                    <button type="submit" class="btn btn-warning btn-warng1 mess22"><span class="glyphicon glyphicon-send tag_02 load22"></span> Send </a>&nbsp;
                                  {{csrf_field()}}
                              </form>
                          </div>
              </div>
            <!--  <div class="modal-footer f">
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
						
						var page = $(this).attr('href').split('page=')[1];
						
						getproducts(page);
						
						function getproducts(page){
						
						$.ajax({
							url: '/ads-and-posts?page='+ page,
						
							beforeSend:function(){
								  $(".p2load").addClass("fa fa-refresh fa-spin");
								  $(".loadtxt").html('Fetching Results...');
								  $('.change').hide('fade');
									},
						
									 complete:function(){
									$(".p2load").removeClass("fa fa-refresh fa-spin");
									$(".loadtxt").html(' ');
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










 <!-- show message modal and send-->
 <script>
        $(document).ready(function(){
        $('.message_main').click(function(e){
          e.preventDefault();
    //send id to modal
    $('#idx').val($(this).data('idx'));
    $('#titlex').val($(this).data('titlex'));
    $('#useridx').val($(this).data('useridx'));
    $('#namex').val($(this).data('namex'));
    $('#myidx').val($(this).data('myidx'));
          //show modal
            $("#msg").modal();
        })
        });


$('.mess22').on('click',function(e){
    e.preventDefault();


 $.ajax({
            type: 'POST',
            url: "{{route('message')}}",
            data: {
                '_token': $('input[name=_token]').val(),
               'Message': $('.Message_main').val(),
               'title': $('.titlex').val(),
               'slave': $('.slavex').val(),
               'master': $('.master_find').val(),
               'name': $('.namex').val(),
              
            },
			beforeSend:function(){
				$('.mess22').prop('disabled', true);
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
						$('.mess22').prop('disabled', false);
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
                     $("#msg").modal('hide');
					}else{
						toastr.error(data);
                    
					}
                    
                }
            },//success data end
        }); //ajax end

}) //btn end



</script>

<!-- show message modal and send-->





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
		