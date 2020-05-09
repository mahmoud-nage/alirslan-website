<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                <a href="#" class="waves-effect">
                  <img src="{{ asset('public/admin/images/avatar.jpg') }}" alt="{{ auth()->user()->name }}" class="img-circle">
                  <span class="hide-menu">{{ auth()->user()->name }}<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.get.profile') }}"><i class="ti-user fa-fw"></i> {{ __('lang.profile') }} </a></li>
                <li><a href="{{ route('mails.index', 0) }}"><i class="ti-email fa-fw"></i>{{__('lang.mails')}}</a></li>
                <li><a href="{{ route('setting.index') }}"><i class="ti-settings fa-fw"></i>{{__('الاعدادات')}}</a></li>
                    <li>
                      <a href="javascript:void(0)"
                         onclick="event.preventDefault(); document.getElementById('side-bar-logout-form').submit();">
                         <i class="fa fa-power-off"></i>
                          {{ __('تسجيل خروج') }}
                          <form id="side-bar-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </a>
                    </li>
                </ul>
            </li>
          <li class="nav-small-cap m-t-10">{{__('التصنيفات الرئيسيه')}}</li>

            <li>
              <a href="{{ route('admins.index') }}" class="waves-effect">
                <i class="fa fa-users fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.admins') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('categories.index') }}" class="waves-effect">
                <i class="fa fa-folder fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.categories') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('banners.index') }}" class="waves-effect">
                <i class="fa fa-home fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.banners') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('news.index') }}" class="waves-effect">
                <i class="fa fa-book fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.news') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('video.index') }}" class="waves-effect">
                <i class="fab fa-youtube fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.video') }} </span>
              </a>
            </li>
            </li>

            <li>
              <a href="{{ route('audio.index') }}" class="waves-effect">
                <i class="fab fa-soundcloud fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.audio') }} </span>
              </a>
            </li>
            </li>

            <li>
              <a href="{{ route('articles.index') }}" class="waves-effect">
                <i class="fas fa-newspaper fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.articles') }} </span>
              </a>
            </li>
        </ul>
    </div>
</div>
