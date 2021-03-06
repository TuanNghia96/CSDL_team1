@extends('layouts.app')

@section('title', 'Thêm mới sản phẩm')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="page-header">
                        <h2><a href="{{ route('products.create') }}">Thêm mới sản phẩm</a></h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input name="url_back" type="hidden" class="form-control" value="{{ url()->previous() }}">
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="name" class="control-label">Name</label>
                            </div>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="inputName" value="{{ old('name') ?? null }}" placeholder="vd: Nguyễn Văn An">
                            </div>
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        
                        {{--image_font--}}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="avata" class="control-label @if($errors->has('image_font')) text-danger @endif">ảnh trước</label>
                            </div>
                            <div class="col-sm-10">
                                <input name="image_font" type="file" class="form-control @if($errors->has('image_font')) is-invalid @endif" id="inputPasswordConfirmation" placeholder="">
                            </div>
                        </div>
                        @error('image_font')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                        {{--image_back--}}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="avata" class="control-label @if($errors->has('image_back')) text-danger @endif">ảnh sau</label>
                            </div>
                            <div class="col-sm-10">
                                <input name="image_back" type="file" class="form-control @if($errors->has('image_back')) is-invalid @endif" id="inputPasswordConfirmation" placeholder="">
                            </div>
                        </div>
                        @error('image_back')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                        {{--image_up--}}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="avata" class="control-label @if($errors->has('image_up')) text-danger @endif">ảnh trên</label>
                            </div>
                            <div class="col-sm-10">
                                <input name="image_up" type="file" class="form-control @if($errors->has('image_up')) is-invalid @endif" id="inputPasswordConfirmation" placeholder="">
                            </div>
                        </div>
                        @error('image_up')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                        {{--sex--}}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="inputRole" class="control-label">Giới tính:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" name="sex" id="">
                                    <option value="">--Chọn giới tính--</option>
                                    @foreach($sex as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        {{--category_id--}}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="inputRole" class="control-label">Thể loại:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id" id="">
                                    <option value="">--Chọn thể loại--</option>
                                    @foreach($categorys as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        {{--size--}}
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="size" class="control-label @if($errors->has('size')) text-danger @endif">Kích cỡ: chiều rộng(10) x chiều cao</label>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend3"> 10 x </span>
                                    </div>
                                    <input type="number" class="form-control @if($errors->has('phone')) is-invalid @endif" name="size"  id="validationServerUsername" placeholder="cao">
                                </div>
                            </div>
                        </div>
                        @error('size')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        {{--price--}}
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="price" class="control-label @if($errors->has('price')) text-danger @endif">Giá tiền(đồng):</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" class="form-control @if($errors->has('phone')) is-invalid @endif" name="price"  id="validationServerUsername" placeholder="cao">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend3">đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                        
                        {{--status--}}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="inputStatus" class="control-label">Trạng thái.</label>
                            </div>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="0" @if(old('status') == 0) checked @endif>Ngừng bán</label>
                                <input type="radio" name="status" value="1" @if(old('status') == 1) checked @endif>Kinh doanh</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Lưu.</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection	('content')
