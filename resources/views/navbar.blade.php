<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="{{route('principal')}}">
                @if(Auth::check())
                    {{Auth::user()->name}}
                    @else
                    FeiTube
                 @endif
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                <li class="active"><a href="{{ route('videos.propios', ['user_id' => Auth::id()]) }}">Tus videos <span class="sr-only"></span></a></li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route('videos.recientes')}}">Recientes</a>
                </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('importar.create')}}">Importar ususarios</a>
                    </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Criterio <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="valores()">Nombre</a></li>
                        <li><a href="#" onclick="valores()">Tag</a></li>
                    </ul>
                </li>
            </ul>
           <!-- <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>-->
            {!! Form::open(['route' => 'videos.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left']) !!}
            <div class="form-group">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar', 'aria-describedby' => 'search']) !!}
            </div>
                {!! Form::submit('Entrar', ['class'=>'btn btn-default']) !!}

            {!! Form::close() !!}
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="{{route('videos.create')}}">Subir video</a></li>
                    @else
                <li><a href="{{route('usuarios.create')}}">Registrate</a></li>
                @endif

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::check())
                            Salir
                        @else
                            Ingresa
                        @endif

                            <span class="caret"></span></a>
                    <ul class="dropdown-menu col-md-offset-6">
                        @if(Auth::check())
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('salir').submit()">Logout</a>
                            <form id="salir" action="{{ route('logout') }}" method="POST" style="display:none;">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </form>
                            @else

                        <li>
                        {!! Form::open(['route'=>'login', 'method'=>'POST']) !!}
                        <div class="container col-md-12">
                            <div class="form-group">
                                {!! Form::label('email', 'Correo electronico') !!}
                                {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'email', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Contraseña') !!}
                                {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'password', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Entrar', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                        </li>
                            @endif

                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>