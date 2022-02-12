<div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label class="form-label" for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ @$users->name }}">
            @error('name')
                <div><small>{{ $message }}</small></div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label" for="userName">Login:</label>
            <input class="form-control" type="text" id="userName" name="userName" value="{{ @$users->login }}">
            @error('userName')
            <div>
                <div><small>{{ $message }}</small></div>
            </div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label" for="zipCode">CEP</label>
            <input class="form-control" type="text" id="zipCode" name="zipCode" value="{{ @$users->cep }}"
                  placeholder="00000-000" maxlength="9">
            @error('zipCode')
                <div><small>{{ $message }}</small></div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="text" id="email" name="email" value="{{ @$users->email }}">
            @error('email')
                <div><small>{{ $message }}</small></div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <label class="form-label" for="password">Senha</label>
            <input class="form-control" type="password" id="password" name="password" >
            <div>
                <small class="text-muted">(8 caracteres mínimo, contendo pelo menos 1 letra e 1 número):</small>
            </div>
            @error('password')
                <div><small>{{ $message }}</small></div>
            @enderror
        </div>
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Cadastrar</button>
        <a class="btn btn-secondary" href=" {{ route('user.index') }} ">Voltar</a>
    </div>
</div>