@if($house)

<form>
        <label>Filter Category by Schools</label> <span class='filter-load'></span>
        <select name="sch9" id='school' class="form-control form-group  sel9 selectpicker show-tick" data-live-search="true">
        <option>--Active Schools for This Category--</option>
        @foreach($mix as $mixx)       
    <option value='{{$mixx->school}}'> {{$mixx->school}} ({{$mixx->ctotal}} post(s))  </option>
   @endforeach
</select>
{{csrf_field()}}
</form>


<div class="category">
    <div class="category-img">
            <img src="/storage/post_images/{{$house->image_1}}" class=""
            alt="{{$house->title}}" title="{{$house->description}}" />
   </div>
   <div class="category-info">
       <h4> Lodging &amp; Accomodations</h4>
       <span>{{$count9}} Post (s)</span>
       <a href="{{route('center')}}">Find all Posts</a>
   </div>
   <div class="clearfix"></div>
</div>
<div class="sub-categories">
   <ul>
       @if(count($title9)>0)
       @foreach($title9 as $t9)
   <li><a href="/buy-product/{{$t9->title}}">{{$t9->title}}</a></li>
       @endforeach
       @else
       <div class='alert alert-info text-center'>
           No Post for Lodging &amp; Accomodations now
       </div>
       @endif
       

   </ul>
</div>
@else
<div class='alert alert-info text-center'>
        @if(Auth::check())
        <a href='{{route('post-page')}}'> No Post for Lodging &amp; Accomodations now (Click to Post)</a>
                    @else
         <a href='{{route('goto_post')}}'> No Post for Lodging &amp; Accomodations now (Click to Post)</a>
                    @endif
    </div> 
@endif


<script>


$('.sel9').change(function(){
            var val = $(this).val();
            $.ajax({
                        url: "{{route('tab9')}}",
                        type: "GET",
                        data:  {
                            '_token': $('input[name=_token]').val(),
                            'sch9': val,
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
                            
                            $('.tab9').html(data);
                           
        
                        }, //success end
                          
                         }); //ajax end
        });



    </script>