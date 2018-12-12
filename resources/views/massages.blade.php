@extends('layouts.app')

@section('content')
<massage-list :massages="{{ $massages }}"></massage-list>
@endsection
