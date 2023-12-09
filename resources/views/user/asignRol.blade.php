<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <select name="user" id="usuario" value="{{ $user->id }}" class="form-control">
                <option value="{{ $user->id }}" selected>{{ $user->name}}</option>
            </select>
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="roles">Roles</label>
            <select name="rol" id="roles" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
          
            
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-secondary m-2">{{ __('Asignar') }}</button>
    </div>
</div>