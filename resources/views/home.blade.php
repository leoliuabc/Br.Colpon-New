@extends('layouts.base')
@section('title', 'Cupom de Desconto e Dinheiro de Volta')
@section('description', 'Cupom de desconto para economizar e ainda receber parte do dinheiro de volta é só no Colpon. Quer saber como? Acesse agora mesmo!')
@section('cssname','index')
@section('canonical',url('/'))
@section('content')
@include('layouts.homeheader')
	<div class="merchant-list">
		<div class="container">
			<div class="title">
      </div>
			<div class="row">
				<ul>
            @foreach ($top_stores as $key=>$top_store)
            @if ($key<=10)
            <li>
              <div>
                <a href="{{ url('/lojas/'.$top_store->titleslug.'/'.$top_store->id) }}" title="Cupom de desconto {{$top_store->name}}">
                  <img src="/images/Store-{{$top_store->id}}.png" alt="Cupom de desconto {{$top_store->name}}">
                </a>
              </div>
            </li>
            @endif
            @endforeach
          <li class="more-merchant">
            <div>
              <a href="{{ url('/lojas/') }}">
                <i class="glyphicon glyphicon-menu-right"></i>
                <span>Mais Lojas</span>
              </a>
            </div>
          </li>
				</ul>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.merchant-list -->

	<div class="offer-list">
		<div class="container">
			<div class="row">
				<div class="col-sm-20 col-xs-24">
					<h1 class="block-title">Os últimas cupons de descontos e ofertas online</h1>
				</div>
				<div class="more-sort-offer col-sm-4 col-xs-24">
					<a href="{{ url('/cupons/') }}">Mais cupons »</a>
				</div>
			</div>
			<div class="row">
				<ul>
          @foreach ($new_offers as $new_offer)
          <li class="offer-item stack-item col-md-6 col-sm-8 col-xs-12" data-link="{{$new_offer->link}}" data-title="{{$new_offer->name}}" data-code="{{$new_offer->code}}" data-type="$new_offer->type" data-img="/images/Store-{{$new_offer->store_id}}.png" data-name="{{$new_offer->store_name}}" data-id="{{$new_offer->id}}" data-rule="{{$new_offer->description}}" data-time-verify="{{$new_offer->confirm_at}}" data-time-expire="{{$new_offer->end}}">
            <div class="stack-item-con">
              <a class="pic" href="{{ url('/lojas/'.$new_offer->store_titleslug.'/'.$new_offer->store_id) }}" title="Cupom de Desconto {{$new_offer->store_name}}" target="_blank">
                <img src="/images/Store-{{$new_offer->store_id}}.png" alt="Cupom de Desconto {{$new_offer->store_name}}">
              </a>
              <p class="offer-title">
                <a class="offer-title-con offer-popup" href="#{{$new_offer->id}}" title="Cupom de Desconto {{$new_offer->store_name}}" target="_blank">{{$new_offer->name}}</a>
              </p>
              <p>
                @if ($new_offer->type == 'D')
                <a class="offer-nocode offer-popup btn btn-info" href="#{{$new_offer->id}}" title="Cupom de Desconto {{$new_offer->store_name}}" target="_blank">Compre agora</a>
                @else
                <a class="offer-popup btn btn-info" href="#{{$new_offer->id}}" title="Cupom de Desconto {{$new_offer->store_name}}" target="_blank">Pegar cupom</a>
                @endif
              </p>
              <a class="more-offer" href="{{ url('/lojas/'.$new_offer->store_titleslug.'/'.$new_offer->store_id) }}">Veja todos os cupons »</a>
            </div>
          </li>
          @endforeach
				</ul>
			</div><!-- /.row -->
      <div class="offer-list-more row">
        <div class="col-sm-8 col-sm-offset-8" monkey="more-recommend-offer2">
          <a class="btn btn-default" href="{{ url('/cupons/') }}">Mais cupons</a>
        </div>
      </div><!-- /.offer-list-more -->
		</div><!-- /.container -->
	</div><!-- /.offer-list -->
@endsection
