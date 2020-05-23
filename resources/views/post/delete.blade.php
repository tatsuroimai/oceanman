@extends('layouts.app')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="header mt-4 mb-1 text-center"><h4>ポストの削除</h4></div>

        <div class="card-body">
          <form method="post" action="{{ route('post.remove') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $deletepost->id }}">
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