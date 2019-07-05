                                    @if($mobile)

                                    <form>
                                            <label>Filter Category by Schools</label> <span class='filter-load'></span>
                         <select name="sch" id='school' class="form-control form-group  sel selectpicker show-tick" data-live-search="true">
                                            <option>--Active Schools for This Category--</option>
                                            @foreach($mix as $mixx)      
                                        <option value='{{$mixx->school}}'>  {{$mixx->school}} ({{$mixx->ctotal}} post(s)) </option>
                                       @endforeach
                                    </select>
                                    {{csrf_field()}}
                                </form>

                                                <div class="category">
                                                    <div class="category-img">
                                                            <img src="/storage/post_images/{{$mobile->image_1}}" class=""
                                                             alt="{{$mobile->title}}" title="{{$mobile->description}}" />
                                                    </div>
                                                    <div class="category-info">
                                                        <h4>Mobile Phones &amp; Tablets</h4>
                                                        <span>{{$count1}} Post (s) Found</span>
                                                        <a href="{{route('center')}}">Find all Posts</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="sub-categories">
                                                    <ul>
                                                        @if(count($title)>0)
                                                        @foreach($title as $t)
                                                    <li><a href="/buy-product/{{$t->title}}">{{$t->title}}</a></li>
                                                        @endforeach
                                                        @else
                                                        <div class='alert alert-info'>
                                                            No Post for Mobile now
                                                        </div>
                                                        @endif
                                                        

                                                    </ul>
                                                </div>
                                                @else
                                                <div class='alert alert-info text-center'>
                                                    @if(Auth::check())
                                            <a href='/post'> No Post for Mobile now (Click to Post)</a>
                                                        @else
                                             <a href='{{route('goto_post')}}'> No Post for Mobile now (Click to Post)</a>
                                                        @endif
                                                    </div> 
                                                @endif

        <script>

   $('.sel').change(function(){
            var val = $(this).val();
            $.ajax({
                        url: "{{route('tab1')}}",
                        type: "GET",
                        data:  {
                            '_token': $('input[name=_token]').val(),
                            'sch': val,
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
                            
                            $('.tab1').html(data);
                           
        
                        }, //success end
                          
                         }); //ajax end
        });

            </script>