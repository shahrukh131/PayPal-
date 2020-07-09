   <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">

   <div class="logo"><a href="{{route('admin.dashboard')}}" class="simple-text logo-normal">
          PayPal
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{Request::is('admin/dashboard')?'active':''}}   ">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>

          @if (!auth()->user()->isAdmin())

            <li class="{{Request::is('admin/paypal/create')?'active':''}}">
                <a class="nav-link" href="{{route('paypal.create')}}">
                    <i class="fas fa-plus"></i>
                    <p>New Entry</p>
                </a>
            </li>

          @endif

          @if (auth()->user()->isAdmin())
            <li class="{{Request::is('admin/pendingrequest')?'active':''}}">
            <a class="nav-link" href="{{route('pending.index')}}">
                <i class="fas fa-hourglass-start"></i>
                    <p>Pending Request</p>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin())
            <li class="{{Request::is('admin/users')?'active':''}}">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="fas fa-user"></i>
                    <p>User</p>
                </a>
            </li>
        @endif

          <li class="{{Request::is('admin/paypal')?'active':''}}">
            <a class="nav-link" href="{{route('paypal.index')}}">
              <i class="material-icons">content_paste</i>
              <p>Report</p>
            </a>
          </li>

          @if (auth()->user()->isAdmin())
            <li class="{{Request::is('admin/rateconvert/create')?'active':''}}">
            <a class="nav-link" href="{{route('convert.create')}}">
                <i class="fas fa-money-check-alt"></i>
                    <p>Rate Convertion</p>
                </a>
            </li>
        @endif

         @if (auth()->user()->isAdmin())

         <li class="{{Request::is('admin/rateconvert')?'active':''}}">
            <a class="nav-link" href="{{route('convert.index')}}">
              <i class="material-icons">monetization_on</i>
              <p>Currency List</p>
            </a>
          </li>

         @endif








        </ul>
      </div>
    </div>
