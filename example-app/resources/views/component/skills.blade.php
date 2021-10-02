<!-------Start Skill Section------->
<section id="skill">
    <div class="container">
     <div class="section-title">
                <h2>My Skills</h2>
            </div>
    <div class="row">

    @foreach($skillData as $key => $skillData)

        @if($key % 2 != 0)
         <div class="col-lg-2"></div>
        @endif

       <div class="col-lg-5">
            <div class="skill_item">
               <div class="skill_info">
                <h6>{{$skillData->title}}</h6>
                <div class="parcent">{{$skillData->parcentance}}%</div> 
            </div>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" data-value="{{$skillData->progress}}%"></div>
            </div>
           </div>
         </div>

    @endforeach

      
    </div>
</div>
</section>
<!-------End Skill Section------->