@extends('templateown.layout')
@section('title_txt', 'Laravel - Personal Login')

@section('content')

    <div class="col-md-8 col-md-offset-2 col-sm-12 text-center">
        <div class="panel">
            <div class="page-header"><H2>ACESSO RESTRITO</H2></div>
            <div class="panel-body">
                <form action="{{ url('/login')  }}" method="POST" class="wow fadeInUp" id="contact-form" role="form" data-wow-delay="0.8s">
                    @csrf

                    <div class="col-md-5 col-sm-5">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Usu&aacute;rio">
                    </div>

                    <div class="col-md-5 col-sm-5">
                        <input type="password" class="form-control" id="userpass" name="userpass" placeholder="Senha">
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <button type="submit" class="section-btn btn btn-primary smoothScroll" id="btnSubmit" name="btnSubmit">
                            <i class="fa fa-key"></i>&nbsp;
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
