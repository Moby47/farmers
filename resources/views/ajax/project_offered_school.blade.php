@if(count($offered)>0)
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr>
<th>NAME</th>
<th>SCHOOL</th>
<th>COURSE</th>
<th>DEPARMENT</th>
<th>SUMMARY</th>
<th>TIME</th>
<th>CALL</th>
<th>SMS</th>
<th>WHATSAPP</th>
</tr>

@foreach($offered as $r)
<tr>
<td>{{$r->name}}</td>
<td>{{$r->school}}</td>
<td>{{$r->course}}</td>
<td>{{$r->dept}}</td>
<td>{{$r->summary}}</td>
<td>{{$r->created_at->diffforhumans()}}</td>
<td>
    <a href='tel:+234{{substr($r->number,1,11)}}' class='btn blue white'>
        <span class='fa fa-mobile-phone'>
        </a>
</td>
 <td>   <a href="sms:+234{{substr($r->number,1,11)}}?body=Hello" class="btn blue white">
            <span class='fa fa-comment'>
            </a>
 </td>
  <td> 
      @if(stripos($ua,'version/') !== false || stripos($ua,'wv') !== false)
        <!--webview-->
    @else
       <a href="intent://send/+234{{substr($r->number,1,11)}}#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end" class="btn blue white">
        <span class='fa fa-whatsapp'></span>
    </a>
    @endif

</td>
</tr>

@endforeach

</table>
</div>
<h5>{{$offered->links()}}</h5> 

@else
<div class="alert alert-info">
        <h5 class="text-center"><a data-toggle="tab" href="#offer">No Project Offers Currently. Click <span class='text-danger'>HERE</span> to Offer Help</a></h5>
    </div>
     @endif





     <script>
            //.........paginated result......................
            $(document).one('click','.pagination a', function(e){
            
            e.preventDefault();

             var query = $('#school2').val();

            
            var page = $(this).attr('href').split('page=')[1];
            
            getproducts(page);
            
            function getproducts(page){
            
            $.ajax({
                url: '/offered-final-year-project?School='+query+'&page='+ page,
            
                beforeSend:function(){
                      $(".load-spin2").addClass("fa fa-refresh fa-spin");
                      $(".load-text2").html('Fetching Results...');
                      $('.load-sch2').hide('fade');
                     // $(document).scrollTop(0);
                        },
            
                         complete:function(){
                      
                        $(".load-text2").html(' ');
                        $('.load-sch2').show('fade');
                        $(".load-spin2").removeClass("fa fa-refresh fa-spin");
                        },
            
            }).done(function(data){
                $('.load-sch2').html(data);
            
                location.hash = page;
            })
            
            }//func end
            });//doc end
            
            //.........paginated result......................
            </script>
