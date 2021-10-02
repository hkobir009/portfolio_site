 <!------- Choose Section------->
 <section id="choose">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose me</h2>
            </div>
            <div class="row">

        @foreach($chooseData as $chooseData)

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="choose_item">
                    <p><i class="{{$chooseData->icon}}"></i><strong>{{$chooseData->des}}</strong></p>
                </div>
            </div>

        @endforeach

        </div>
        </div>
    </section>