@if (count($log)>0)
       <ul class="list-group">
       @foreach($log as $l)
        <li class="list-group-item"><b>{{$l->admin}}</b> <i>{{$l->message}}</i> <b>{{$l->created_at->diffforhumans()}}</b></li>
        @endforeach
       </ul>

       <h5 class="center-block">{{$log->links()}}</h5>  

       @else
        <div class="alert alert-info">
                               <h5 class="text-center">No Activity Found</h5>
                         </div>
              @endif








              <script>
                    //.........paginated result......................
                    $(document).one('click','.pagination a', function(e){
                    
                    e.preventDefault();
                    
                   var query = $('#steal').val();
                  
                    var page = $(this).attr('href').split('page=')[1];
                    
                    getproducts(page);
                    
                    function getproducts(page){
                    
                    $.ajax({
                        url: '/search-log?search='+query+'&page='+ page,
                    
                        beforeSend:function(){
                           $(".div-data-log").hide('fade');
                               $(".ref-data-log").addClass("fa fa-refresh fa-spin");
                                },
                    
                                 complete:function(){
                                $(".ref-data-log").removeClass("fa fa-refresh fa-spin");
                               $(".div-data-log").show("fade");
                                },
                    
                    }).done(function(data){
                        $('.div-data-log').html(data);
                    
                        location.hash = page;
                    })
                    
                    }//func end
                    });//doc end
                    
                    //.........paginated result......................
                    </script>
                  