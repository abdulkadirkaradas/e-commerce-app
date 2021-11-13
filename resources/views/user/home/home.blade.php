@extends('layouts.customer')
@section('content')

    <div class="home-container" id="content-app">
        <main-page></main-page>
    </div>

@endsection

@section('scripts')
@parent

<script src="{{ mix('js/app.js') }}"></script>
<script>
  const app = new Vue({
    el: '#content-app',
  });
</script>

@endsection

@section('styles')
@parent

<link href="{{ asset("css/home.css") }}" rel="stylesheet">

@endsection
