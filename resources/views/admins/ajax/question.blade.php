

                         @if(count($question)>0)
                         
                         @foreach($question as $q)

       <div class='well'>
    {{$q->question}}  <i><span class='text-primary'>{{$q->created_at->diffforhumans()}} </span></i>
       </div>

        <div class='well'>
 <form  class='qform'>
     
    <textarea name='Answer' rows='3' class='form-control ans ans_border' placeholder='Type Message Here'></textarea>
    <br>
                    <button class='btn btn-primary qsend'>
                     <span class='glyphicon glyphicon-ok '></span> Send</button> 
                    <input type='hidden' name='id' value='{{$q->id}}' class='id'/>
                    <input type='hidden' name='q' value='{{$q->question}}' class='q'/>
     
                    {{csrf_field()}}
                     </form>
        </div>
       
                         @endforeach
    <h5>{{$question->links()}}</h5>
                         @else
                         <div class="alert alert-info">
                                    <h5 class="text-center">No Question(s)</h5>
                              </div>
                              @endif






    
<!-- reply question-->
<script>
        $(document).ready(function (e) {
            $(".qform").on('submit',(function(e) {
                e.preventDefault();
                
            
                $.ajax({
                    url: "{{route('ans')}}",
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
                       
                      //if validation errors occur
                      if ((data.errors)) {
                         
                         //...........emit  validation errors................
                            if (data.errors.Answer) {
                                toastr.info(data.errors.Answer, 'warning Alert', {timeOut: 5000});
                            }
                           
                         //.............................. 
        
                        } else {
                            toastr.success('Question Answered!', 'Success Alert', {timeOut: 5000});
                         
                         //reload data
        $.ajax({
                   url: "{{route('q')}}",
                   type: "GET",
                   
                   beforeSend:function(){
                     $(".div-data-q").hide('fade');
                   $(".ref-data-q").addClass("fa fa-refresh fa-spin");
                  
                   },
       
                    complete:function(){
                   $(".ref-data-q").removeClass("fa fa-refresh fa-spin");
                   $(".div-data-q").show("fade");
                   },
                   
       
                   success: function(data)
                   {
                       $('.div-data-q').html(data);
                   },
                     error: function(e) 
                   {
                       $('.div-data-q').html("Error! Try Again Later");
                   } 	        
              });//ajax2 end
                          
                        }
                    
                    },
                      
               }); //ajax end
             
                   
            })); //submit form end
        
        });//doc end
        
        </script>
        
        <!-- reply question-->










        
<script>
        //.........paginated result......................
        $(document).one('click','.pagination a', function(e){
        
        e.preventDefault();
        
        var page = $(this).attr('href').split('page=')[1];
        
        getproducts(page);
        
        function getproducts(page){
        
        $.ajax({
            url: '/question-ajax?page='+ page,
        
            beforeSend:function(){
                $(".div-data-q").hide('fade');
                   $(".ref-data-q").addClass("fa fa-refresh fa-spin");
                    },
        
                     complete:function(){
                    $(".ref-data-q").removeClass("fa fa-refresh fa-spin");
                    $(".div-data-q").show("fade");
                    },
        
        }).done(function(data){
            $('.div-data-q').html(data);
        
            location.hash = page;
        })
        
        }//func end
        });//doc end
        
        //.........paginated result......................
        </script>
      