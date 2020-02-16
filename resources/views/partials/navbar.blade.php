<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><span style="font-size:15pt">&#9820;</span> Videoclub</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( Auth::check() )
            <div class="collapse navbar-collapse col-12" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100">
                    <li>
                        <div class="dropdown mt-3 w-100">
                          <button type="button" class="btn btn-info dropdown-toggle col-lg-12 col-md-12 col-sm-12" data-toggle="dropdown">
                            OPCIONS
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}} " href="{{url('/catalog')}}">
                                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                                Catálogo
                            </a>
                            <a class="dropdown-item {{  Request::is('catalog/create') ? 'active' : ''}}" href="{{url('/catalog/create')}}">
                                <span>&#10010</span> Nueva película
                            </a>
                            <a class="dropdown-item {{  Request::is('favs') ? 'active' : ''}}" href="{{url('/favs')}}">
                            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            Preferides</a>
                            <a class="dropdown-item {{  Request::is('best') ? 'active' : ''}}" href="{{url('/best')}}">
                            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                            Millor Puntuacio</a>
                            <a class="dropdown-item {{  Request::is('category') ? 'active' : ''}}" href="{{url('/category')}}">
                            <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
                            Categories</a>
                          </div>
                        </div>
                    </li>

                    <li>
                        <div class="mt-3 ml-lg-5 pl-lg-5 col-12">
                          <form action="{{action('CatalogController@searchDash')}}" method="GET">
                            <div class="row">
                              <div class="col-lg-8 col-md-8 col-sm-12">
                                <input class="form-control col-lg-12 col-md-10 col-sm-12" type="text" name="buscar" required/>
                              </div>
                              <div class="pl-0 align-top col-md-4">
                                <button type="submit" class="btn btn-info mt-2 mt-sm-2 col-lg-12 col-md-12 col-sm-12 align-top mt-lg-0 mt-md-0 mt-sm-0 mt-xs-0">Buscar</button>
                              </div>
                            </div>

                          </form>
                        </div>
                    </li>
                    <li class="nav-item col-lg-3 float-right">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit ml-lg-5" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
