@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">アカウントの削除</div>

        <div class="card-body">
          <form method="post" action="{{ route('user.remove') }}">
            @csrf
            <div>削除してよろしいですか？</div>
            <div class="form-group row mb-0">
                <div class="col-6 offset-md-5">
                    <button type="submit" class="btn btn-danger">
                        削除
                    </button>
                </div>
            </div>           
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection