@extends('layout.app')
 @include('component.menu')
<section class="vh-100 gradient-custom ">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-2 md-5 mt-md-4 pb-5">
                  <form action="" class="loginForm">

                      <h2 class="text-white fw-bold text-uppercase">Login</h2>
                      <p class="text-white-50 mb-5">Please enter your Email and password!</p>

                      <div class="form-outline form-white mb-4">
                          <input required="" type="email" name="email" value="" class="form-control form-control-lg" />
                          <label class="form-label" for="typeEmailX">Email</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                            <input required="" type="password" name="password" value="" class="form-control form-control-lg" />
                            <label class="form-label" for="typePasswordX">Password</label>
                        </div>

                        <p class="small pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                        <button class="btn btn-outline-light btn-lg px-5" name="submit" type="submit">Login</button>

                    </form>
                    </div>

                    <div>
                        <p class="mb-0">Don't have an account? <a href="{{route('registration')}}" class="text-white-50 fw-bold">Sign Up</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
  </section>
