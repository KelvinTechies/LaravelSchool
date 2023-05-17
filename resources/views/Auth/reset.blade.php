<x-layout>
        <div class="card-body login-card-body">
                <p class="login-box-msg " style='color:black; font-size:30px; font-weight:800'>Reset Password</p>
          @include('_message')
        <form action="" method="post">
          {{ csrf_field() }}
                  <div class="input-group mb-3">
                    <input type="password" name='password' class="form-control" placeholder="password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" name='cpassword' class="form-control" placeholder=" Confirm password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Reset</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
          
               
                <p class="mb-1">
                    <br>
                <a href="{{url('/login')}}">Sign In</a>
                </p>
              </div>
              <!-- /.login-card-body -->
            </div>
</x-layout>