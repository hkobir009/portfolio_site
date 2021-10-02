    <!-------About Section------->

<section id="about" class="about">
    <div class="container">

        @foreach($parsonalData as $parsonalData)

        <div class="section-title">
            <h2>About me</h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h3>Personal info</h3>
                <div class="about_info">
                    <div class="about_pic">
                    <img src="img/Humayun.jpg" alt="Humayun Image">
                </div>
                <div class="about_text">
                    <ul>
                        <li>Name :<span> {{$parsonalData->name}}</span></li>
                        <li>Date of Birth :<span> {{$parsonalData->birth_date}}</span></li>
                        <li>Nationality :<span> {{$parsonalData->nationality}}</span></li>
                        <li>Location :<span> {{$parsonalData->location}}</span></li>
                        <li>Phone :<span> {{$parsonalData->phone}}</span></li>
                        <li>Email :<span> {{$parsonalData->email}}</span></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                 <div class="single-video-area">
                 <img src="img/Humayun2.jpg" alt="Humayun Image">
                    </div>
            </div>
        </div>
        <div class="about_description">
            <h3>About Myself</h3>
            <p>{{$parsonalData->myself_des}}</p>
        </div>


        @endforeach

    </div>
</section>
<section id="myskill">
    <div class="container">
        <div class="section-title">
            <h2>My Skills</h2>
        </div>
        <div class="skill_wrapper">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <h4>Proffessional Skills</h4>
                    <ul>
                        <li><i class="icofont-check"></i>HTML - HTML5</li>
                        <li><i class="icofont-check"></i>CSS - CSS3</li>
                        <li><i class="icofont-check"></i>Bootstrap</li>
                        <li><i class="icofont-check"></i>MDB</li>
                        <li><i class="icofont-check"></i>Jquery</li>
                    </ul>
                     <ul>
                        <li><i class="icofont-check"></i>Javascript</li>
                        <li><i class="icofont-check"></i>PHP</li>
                        <li><i class="icofont-check"></i>ajax</li>
                        <li><i class="icofont-check"></i>Jquery</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-5 mt-4 mt-md-0">
                    <h4> Framework </h4>
                    <ul>
                    <li><i class="icofont-check"></i>Laravel</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
