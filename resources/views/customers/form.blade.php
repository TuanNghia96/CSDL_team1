@csrf
<input name="id" type="hidden" class="form-control" value="{{ $user->id ?? null }}">
<input name="url_back" type="hidden" class="form-control" value="{{ url()->previous() }}">

<div class="form-group">
    <div class="col-sm-2">
        <label for="inputName" class="control-label">Name</label>
    </div>
    <div class="col-sm-10">
        <input name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="inputName" value="{{ old('name') ?? $user->name ?? null }}" placeholder="例：　クレアンス太郎">
    </div>
</div>
@error('name')
<div class="text-danger">{{ $message }}</div>
@enderror

{{--email--}}
<div class="form-group">
    <div class="col-sm-2">
        <label for="inputEmail" class="control-label @if($errors->has('email')) text-danger @endif">email</label>
    </div>
    <div class="col-sm-10">
        <input name="email" type="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="inputEmail" value="{{ old('email') ?? $user->email ?? null }}" placeholder="例：　creans.taro@creansmaerd.co.jp">
    </div>
</div>
@error('email')
<div class="text-danger">{{ $message }}</div>
@enderror

{{--password--}}
<div class="form-group">
    <div class="col-sm-2">
        <label for="inputPassword" class="control-label @if($errors->has('password')) text-danger @endif">password</label>
    </div>
    <div class="col-sm-10">
        <input name="password" type="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="inputPassword" placeholder="********">
    </div>
</div>
@error('password')
<div class="text-danger">{{ $message }}</div>
@enderror

{{--password_confirmation--}}
<div class="form-group">
    <div class="col-sm-2">
        <label for="inputPasswordConfirmation" class="control-label @if($errors->has('password_confirmation')) text-danger @endif">password confirm</label>
    </div>
    <div class="col-sm-10">
        <input name="password_confirmation" type="password" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" id="inputPasswordConfirmation" placeholder="********">
    </div>
</div>
@error('password_confirmation')
<div class="text-danger">{{ $message }}</div>
@enderror
{{--avata_url--}}
<div class="form-group">
    <div class="col-sm-2">
        <label for="inputPasswordConfirmation" class="control-label @if($errors->has('avata_url')) text-danger @endif">avata</label>
    </div>
    <div class="col-sm-10">
        <input name="password_confirmation" type="password" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" id="inputPasswordConfirmation" placeholder="********">
    </div>
</div>
@error('password_confirmation')
<div class="text-danger">{{ $message }}</div>
@enderror

{{--status--}}
<div class="form-group">
    <div class="col-sm-2">
        <label for="inputStatus" class="control-label">ステータス</label>
    </div>
    <div class="col-sm-10">
            <label class="radio-inline">
                <input type="radio" name="status" value="{{ 0 }}" {{ ((bool)$user->deleted_at == $key) ? 'checked' : null }}>Đang khóa</label>
                {{--<input type="radio" name="status" value="0" {{ (($user->status ?? null) == 1) ? 'checked' : null }}>Đang khóa</label>--}}
            <label class="radio-inline">
{{--                <input type="radio" name="status" value="1" {{ (($user->status ?? null) == 0) ? 'checked' : null }}>Kích hoạt</label>--}}
    </div>
</div>

{{--role--}}
<div class="form-group">
    <div class="col-sm-2">
        <label for="inputRole" class="control-label">役割</label>
    </div>
    <div class="col-sm-10">
        @foreach(\App\Models\Customer::$role as $key => $value)
            <label class="radio-inline">
                <input type="radio" name="role" value="{{ $key }}" {{ ((old('role') ?? $user->role ) == $key) ? 'checked' : null }}>{{ $value }}</label>
        @endforeach
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">保存</button>
    </div>
</div>
