@if($comp)

<form>
        <label>Filter Category by Schools</label> <span class='filter-load'></span>
        <select name="sch4" id='school' class="form-control form-group  sel4 selectpicker show-tick" data-live-search="true">
        <option>--Active Schools for This Category--</option>
        @foreach($mix as $mixx)     
    <option value='{{$mixx->school}}'> {{$mixx->school}} ({{$mixx->ctotal}} post(s)) </option>
   @endforeach
</select>
{{csrf_field()}}
</form>

<div class="category">
    <div class="category-img">
            <img src="/storage/post_images/{{$comp->image_1}}" class=""
            alt="{{$comp->title}}" title="{{$comp->description}}" />
   </div>
   <div class="category-info">
       <h4>Computers &amp; Accessories </h4>
       <span>{{$count4}} Post (s)</span>
       <a href="{{route('center')}}">Find all Posts</a>
   </div>
   <div class="clearfix"></div>
</div>
<div class="sub-categories">
   <ul>
       @if(count($title4)>0)
       @foreach($title4 as $t4)
   <li><a href="/buy-product/{{$t4->title}}">{{$t4->title}}</a></li>
       @endforeach
       @else
       <div class='alert alert-info text-center'>
           No Post for Computers &amp; Accessories now
       </div>
       @endif
       

   </ul>
</div>
@else
<div class='alert alert-info text-center'>
        @if(Auth::check())
        <a href='{{route('post-page')}}'> No Post for Computers &amp; Accessories now (Click to Post)</a>
                    @else
         <a href='{{route('goto_post')}}'> No Post for Computers &amp; Accessories now (Click to Post)</a>
                    @endif
    </div> 
@endif

<script>


$('.sel4').change(function(){
            var val = $(this).val();
            $.ajax({
                        url: "{{route('tab4')}}",
                        type: "GET",
                        data:  {
                            '_token': $('input[name=_token]').val(),
                            'sch4': val,
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
                            
                            $('.tab4').html(data);
                           
        
                        }, //success end
                          
                         }); //ajax end
        });


    </script>