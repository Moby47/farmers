@if($service)

<form>
        <label>Filter Category by Schools</label> <span class='filter-load'></span>
        <select name="sch10" id='school' class="form-control form-group  sel10 selectpicker show-tick" data-live-search="true">
        <option>--Active Schools for This Category--</option>
        @foreach($mix as $mixx)      
    <option value='{{$mixx->school}}'> {{$mixx->school}} ({{$mixx->ctotal}} post(s))  </option>
   @endforeach
</select>
{{csrf_field()}}
</form>


<div class="category">
    <div class="category-img">
            <img src="/storage/post_images/{{$service->image_1}}" class=""
            alt="{{$service->title}}" title="{{$service->description}}" />
   </div>
   <div class="category-info">
       <h4> Services</h4>
       <span>{{$count10}} Post (s)</span>
       <a href="{{route('center')}}">Find all Posts</a>
   </div>
   <div class="clearfix"></div>
</div>
<div class="sub-categories">
   <ul>
       @if(count($title10)>0)
       @foreach($title10 as $t10)
   <li><a href="/buy-product/{{$t10->title}}">{{$t10->title}}</a></li>
       @endforeach
       @else
       <div class='alert alert-info text-center'>
           No Post for Services now
       </div>
       @endif
       

   </ul>
</div>
@else
<div class='alert alert-info text-center'>
        @if(Auth::check())
        <a href='{{route('post-page')}}'> No Post for Services now (Click to Post)</a>
                    @else
         <a href='{{route('goto_post')}}'> No Post for Services now (Click to Post)</a>
                    @endif
    </div> 
@endif



<script>


$('.sel10').change(function(){
            var val = $(this).val();
            $.ajax({
                        url: "{{route('tab10')}}",
                        type: "GET",
                        data:  {
                            '_token': $('input[name=_token]').val(),
                            'sch10': val,
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
            });; 
                        },
                
                        success: function(data)
                        {
                            
                            $('.tab10').html(data);
                           
        
                        }, //success end
                          
                         }); //ajax end
        });



    </script>