@extends('app')

@section('content')

    <div class="container">
        <div>
            <h3>Cadastro</h3>
        </div>
        <form action=" {{ route('user.store') }} " class=" form-row needs-validation" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('POST') }}

            @include('form')
        </form>
    </div>
    </div>

@endsection