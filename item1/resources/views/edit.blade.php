@extends('app')

@section('content')

    <div class="container">
        <div>
            <h3>Alterar Dados</h3>
        </div>
        <form action="{{ route('user.update', $users->id) }}" class="form-row needs-validation" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('form')

        </form>
    </div>
    </div>

@endsection