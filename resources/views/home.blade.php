@if (session("success"))
    <div class="alert alert-success msg">{{ session("success") }}</div>
@endif

@extends('layouts.app')

@section('content')
    <div class="orderBox">
        <img src="{{url('img/top-image-form-index.png')}}" alt="Pizza" class="pizza">
        <h2>Faça seu pedido</h2>

        <form action="{{route('storePedido')}}" method="post">
            @csrf

            <label for="">Massa</label>
            <div class="select">
                <select name="massa" id="massa" required>
                    <option value="">Escolha a massa</option>

                    @foreach ($massas as $massa)
                        <option value="{{ $massa->tipo }}">{{ $massa->tipo }}</option>
                    @endforeach
                </select>
            </div>

            <label for="">Borda</label>
            <div class="select">
                <select name="borda" id="borda" required>
                    <option value="">Escolha a borda</option>

                    @foreach ($bordas as $borda)
                        <option value="{{ $borda->tipo }}">{{ $borda->tipo }}</option>
                    @endforeach

                </select>
            </div>

            <label>Sabores, máximo 3</label>
            <div id="flavor_label"></div>
            <div class="chk">
                @foreach ($sabores as $sabor)
                    <label>
                        <span><input class='limited' type="checkbox" name="sabor[]" id="flavor" value="<?= $sabor["nome"] ?>"></span><?= $sabor["nome"] ?>
                    </label>
                @endforeach
            </div>

            <input type="submit" value="Finalizar pedido">
        </form>
    </div>

    <div class="system-acess">
        <a href="{{ url('/login') }}">Acessar sistema</a>
    </div>

    <script>
        let $msgContainer = document.querySelector(".msg-container");
        let $msg = document.querySelector(".msg");
    
        if($msg){
            $($msg).fadeOut(10000);
            
            setTimeout(function () {
                $($msgContainer).fadeOut(1);
            }, 9999);
        }
    </script>


@endsection

<style>
    .alert{
        z-index: 99;
        margin-top: 1vh
    }
</style>