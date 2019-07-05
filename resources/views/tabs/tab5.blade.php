@if($furniture)

<form>
        <label>Filter Category by Schools</label> <span class='filter-load'></span>
        <select name="sch5" id='school' class="form-control form-group  sel5 selectpicker show-tick" data-live-search="true">
        <option>--Active Schools for This Category--</option>
        @foreach($mix as $mixx)       
    <option value='{{$mixx->school}}'> {{$mixx->school}} ({{$mixx->ctotal}} post(s)) </option>
   @endforeach
</select>
{{csrf_field()}}
</form>

<div class="category">
    <div class="category-img">
            <img src="/storage/post_images/{{$furniture->image_1}}" class=""
            alt="{{$furniture->title}}" title="{{$furniture->description}}" />
   </div>
   <div class="category-info">
       <h4> Furniture</h4>
       <span>{{$count5}} Post (s)</span>
       <a href="{{route('center')}}">Find all Posts</a>
   </div>
   <div class="clearfix"></div>
</div>
<div class="sub-categories">
   <ul>
       @if(count($title5)>0)
       @foreach($title5 as $t5)
   <li><a href="/buy-product/{{$t5->title}}">{{$t5->title}}</a></li>
       @endforeach
       @else
       <div class='alert alert-info text-center'>
           No Post for Furniture now
       </div>
       @endif
       

   </ul>
</div>
@else
<div class='alert alert-info text-center'>
        @if(Auth::check())
        <a href='{{route('post-page')}}'> No Post for Furniture now (Click to Post)</a>
                    @else
         <a href='{{route('goto_post')}}'> No Post for Furniture now (Click to Post)</a>
                    @endif
    </div> 
@endif


<script>

$('.sel5').change(function(){
            var val = $(this).val();
            $.ajax({
                        url: "{{route('tab5')}}",
                        type: "GET",
                        data:  {
                            '_token': $('input[name=_token]').val(),
                            'sch5': val,
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
                            
                            $('.tab5').html(data);
                           
        
                        }, //success end
                          
                         }); //ajax end
        });
    </script>