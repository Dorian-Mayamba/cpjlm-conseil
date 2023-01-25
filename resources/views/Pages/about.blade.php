@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center">
        <h1 class="text-green"><small>A propos de Nous</small></h1>
        <picture>
            <source  media="(min-width:768px)" srcset="{{ asset('cpjlm-conseil-bureau_576px.jpg') }}">
            <source media="(min-width:230px)" srcset="{{ asset('cpjlm-conseil-bureau_230px.jpg') }}">
            <img src="{{ asset('cpjlm-conseil-bureau.jpg') }}" alt="bureau" title="bureau">
        </picture>
        
        <h2><span>Nous localiser</span></h2>
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10564.548629473944!2d2.6529708!3d48.5497653!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x331af9e67310382!2sCPJLM-Conseil!5e0!3m2!1sfr!2suk!4v1635439470849!5m2!1sfr!2suk" width="600" height="450" style="border:0;" allowfullscreen title="bureau CPJLM-CONSEIL" loading="lazy"></iframe>
        
    </div>
@endsection