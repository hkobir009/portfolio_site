@extends('layout.app')
@include('component.menu')
<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                <div id="success_msg" class=" d-none alert alert-primary" role="alert">
                    Your account Registration successfully
                </div>
                <div id="wrong_msg" class=" d-none alert alert-danger" role="alert">
                    Registration unccessfully Please try again
                </div>

                <form action="" class="regFrom">

                  <div class="form-outline mb-4">
                        <input type="text" name="userNmame" value="" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1cg">Your User Name</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" name="name" value="" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example1cg">Your Full Name</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="email" name="email" value="" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" name="userPassword" value="" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example4cg">Password</label>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button name="submit" type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('login')}}" class="fw-bold text-body"><u>Login here</u></a></p>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
