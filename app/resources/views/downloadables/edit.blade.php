@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Downloadable
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($downloadable, ['route' => ['downloadables.update', $downloadable->id], 'method' => 'patch']) !!}

                        @include('downloadables.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection