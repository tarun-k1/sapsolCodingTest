@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update record') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('editprofile.update') }}">
                        @csrf
                        

                        <div class="row mb-3">
                            <label for="name"  class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{  $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{  $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" value = "{{ $user->address }}" type="text" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="address">
                                <div id="geobox" class="form-control @error('geobox') is-invalid @enderror" name="geobox"></div>
                                
                                 
                                <script>
                                mapboxgl.accessToken = 'pk.eyJ1IjoidGFydW5rLTEiLCJhIjoiY2t6eXExOGY4MDJwZDNibTk5cDVocTcydSJ9.aOCq2aZ5cmNbOcf17tkvKA';
                                const geocoder = new MapboxGeocoder({
                                accessToken: mapboxgl.accessToken,
                                types: 'country,region,place,address,postcode,locality,neighborhood'
                                });
                                 
                                geocoder.addTo('#geobox');
                                geocoder.on('result', (e) => {
                                results.innerText = JSON.stringify(e.result, null, 2);
                                });
                                 
                                // Clear results container when search is cleared.
                                
                                </script>
                               @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change details') }}
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