@extends('templateown.layout')
@section('title_txt', 'Laravel - Personal Login')

@section('content')

    <div class="col-md-8 col-md-offset-2 col-sm-12 text-center">
        <div class="panel">
            <div class="page-header"><H2>ACESSO RESTRITO</H2></div>
            <hr/>

            @if(Session::has('info'))
                <?php $erro = request()->erro ?>
                <div class="alert alert-{{ $erro==1 ? 'danger' : 'success' }} col-md-12 col-sm-12 col-lg-12">
                    <h3><?php echo $erro==1 ? 'Ocorreu um Erro!' : 'Autenticado com Sucesso!'; ?></h3>
                    <?php echo utf8_encode(Session::get('info')) ?>
                </div>
            @endif

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
