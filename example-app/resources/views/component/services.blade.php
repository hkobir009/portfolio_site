<!-------Start Service Section------->
<section id="service" class="service">
        <div class="container">
            <div class="section-title">
                <h2>My Services</h2>
            </div>
            <div class="row">

            @foreach($servicesData as $servicesData)

                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="single_item">
                        <div class="icon icon6">
                            <i class="{{$servicesData->icon}}"></i>
                        </div>
                        <h4><a>{{$servicesData->title}}</a></h4>
                        <p>{{$servicesData->des}}</p>
                    </div>
                </div>

            @endforeach

            </div>
        </div>
    </section>
    <!-------End Service Section------->