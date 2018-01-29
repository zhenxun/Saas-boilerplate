@extends('account.layouts.default')

@section('account.content')

    <div class="panel panel-default">

        <div class="panel-body">
            <form action="#" method="POST">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                Cancel;

              <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
        
    </div>
    
@endsection