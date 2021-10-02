<section id="contact" class="contact">

    @foreach($socialData as $socialData)
<div class="social">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Contact me</h2><br>
                    <h2 class="d-none" id="dateId">{{$date}}</h2>
                </div>
                <div class="market_link">
                    <a href="{{$socialData->freelancer}}" target="_blank" class="btn btn_market">Frelancer</a>
                    <a href="{{$socialData->fiverr}}" target="_blank" class="btn btn_market">Fiverr</a>
                    <a href="{{$socialData->upwork}}" target="_blank" class="btn btn_market">Upwork</a>
                </div>
            </div>
        </div>
        </div>
        <div class="company_wrapper set-bg" data-setbg="img/portfolio/image_6.jpg">
            <div class="background_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="company_pic">
                            <a href="{{$socialData->facebook}}" target="_blank"><i class="icofont-facebook"></i></a>
                        </div>
                        <div class="company_text">
                            <span>Facebook</span>
                            <h6>@example</h6>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="company_pic">
                            <a href="{{$socialData->upwork}}" target="_blank"><img src="img/icons8-upwork.svg" alt="Upwork"></a>
                        </div>
                        <div class="company_text">
                            <span>upwork</span>
                            <h6>@example</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="company_pic">
                            <a href="{{$socialData->fiverr}}" target="_blank"><img style="height: 30px;width: 30px" src="img/fiverr.svg" alt="Fiverr"></a>
                        </div>
                        <div class="company_text">
                            <span>fiverr</span>
                            <h6>@example</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="company_pic">
                            <a href="{{$socialData->freelancer}}" target="_blank"><img src="img/freelancer-1.svg" alt="Freelancer"></a>
                        </div>
                        <div class="company_text">
                            <span>freelancer</span>
                            <h6>@example</h6>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="company_pic">
                            <a href="{{$socialData->pph}}" target="_blank"><img src="img/pph.png" alt="People Per Hour"></a>
                        </div>
                        <div class="company_text">
                            <span>People Par Hour</span>
                            <h6>@example</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="company_pic">
                            <a href="{{$socialData->git}}" target="_blank"><img src="img/github.svg" alt="People Per Hour"></a>
                        </div>
                        <div class="company_text">
                            <span>Github</span>
                            <h6>@example</h6>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="contact_wrapper">
        <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact_info">
                    <div class="contact_info_item">
                        <i class="icofont-phone"></i>
                        <span>Call Me</span>
                        <h5>+880 191 338 4519</h5>
                    </div><br>
                     <div class="contact_info_item">
                        <i class="icofont-envelope"></i>
                        <span>Mail Me</span>
                        <h5>hkobir009@gmail.com</h5>
                    </div><br>
                     <div class="contact_info_item">
                        <i class="icofont-google-map"></i>
                        <span>My Location</span>
                        <h5>Mirpur-1,Dhaka,Bangladesh</h5>
                    </div><br>
                     <div class="contact_info_item">
                        <i class="icofont-stopwatch"></i>
                        <span>Time Zone</span>
                        <h5>UTC +6 Asia/Dhaka</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="section-title">
                    <h2>Describe your project</h2>
                </div>

                <div id="contactID" class="contact_form">
                        <div class="form-group">
                            <input id="contactAddNameID" type="text" class="form-control" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <input id="contactAddMailID" type="text" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input id="contactAddPnID" type="text" class="form-control" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <input id="contactAddWebID" type="text" class="form-control" placeholder="Enter Website (Optional)">
                        </div>
                        <div class="form-group">
                            <textarea id="contactAddMsgID" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
                        </div>
                        <button id="contactAddConfirmBtn" class="btn btn-send">Send Massege</button>
                    </div>
                    
            </div>
        </div>
        </div>
        </div>

</section>