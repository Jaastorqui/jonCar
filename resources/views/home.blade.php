
@extends('layouts.app')

@section('content')



        <section class="text-center">
            <img src="https://d1ovtcjitiy70m.cloudfront.net/vi-1/images/homepage/2016/homeblock_main_desktop_es_ES.jpg" alt="imagen" class="img-fluid">
            
        </section>

        <section class="m-5">
            <form class="form-horizontal" role="form" method="get" action="{{ route('search') }}">
                {{ csrf_field() }}
            
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="day" type="date" class="form-control" name="day" value="{{ old('day') }}" required autofocus>

                                @if ($errors->has('day'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('day') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="form-group{{ $errors->has('cityDeparture') ? ' has-error' : '' }}">
                            <label for="cityDeparture" class="col-md-4 control-label">Ciudad Salida</label>

                            <div class="col-md-6">
<!--                                <input id="cityDeparture" type="text" class="form-control" name="cityDeparture" value="{{ old('cityDeparture') }}" required autofocus placeholder="madrid" value="madrid"> -->
                                <select required="required" class="form-control" name="cityDeparture">
                                    <option disabled selected="selected">Seleccione un destino</option>
                                    @foreach ($data['city'] as $val)
                                        <option value="{{ $val['name'] }}">{{ $val['name']  }} ( {{ $val['provincia'] }} ) </option>
                                    @endforeach
                                </select>



                                @if ($errors->has('cityDeparture'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cityDeparture') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="form-group{{ $errors->has('cityArrived') ? ' has-error' : '' }}">
                            <label for="cityArrived" class="col-md-4 control-label">Ciudad llegada</label>

                            <div class="col-md-6">
                                

                                <select required="required" class="form-control" name="cityArrived">
                                    <option disabled selected="selected">Seleccione un destino</option>
                                    @foreach ($data['city'] as $val)
                                        <option value="{{ $val['name'] }}">{{ $val['name']  }} ( {{ $val['provincia'] }} ) </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('cityArrived'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cityArrived') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <section height="500px">
                </section>
            </form>
        </div>

<script>
    $(document).ready(function () {
        
        
        
    });
    
</script>
@endsection