<!-------Start Testimonial Section------->
<section id="testmonial" class="testmonial set-bg" data-setbg="img/portfolio/image_6.jpg">
       <div class="background_overlay"></div>
        <div class="container">
            <div class="section-title">
                <h2>client testimonial</h2>
            </div>
            <div class="testmonial-carousel owl-carousel">

            @foreach($testimonialData as $testimonialData)

                <div class="testmonial_item">
                    <p>{{$testimonialData->des}}</p>
                    <div class="testmonial_meta">
                        <div class="testmonial_meta_text">
                            <h4>{{$testimonialData->name}}</h4>
                            <h5>{{$testimonialData->owner}}</h5>
                        </div>
                        <div class="testmonial_meta_pic">
                            <img src="{{$testimonialData->img}}" alt="">
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </section>
<!-------End Testimonial Section------->