    <!-------Start Counter Section------->
    <section id="counter">
        <div class="counter_wrapper">
            <div class="container">
            <div class="section-title">
                <h2>Working Count</h2>
            </div>
            <div class="row">

            @foreach($countData as $countData)

                <div class="col-md-3 col-6 col-sm-6">
                    <span data-toggle="counter-up">{{$countData->count_no}}</span>
                    <p>{{$countData->title}}</p>
                </div>

            @endforeach
               
            </div>
        </div>
        </div>
    </section>
<!-------End Counter Section------->