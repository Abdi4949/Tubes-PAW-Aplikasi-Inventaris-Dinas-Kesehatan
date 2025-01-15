@extends('layouts.main')

@section('header')
    <div >
        <div class="col-sm-12">
            <h1>Dashboard</h1>
            <div class="row">
                <div class="col-lg-6 ">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalAsset }}</h3>
                        <p>Jumlah Aset</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="/Assets" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>


                <div class="col-lg-6 ">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$totalUser}}</h3>

                      <p>User Registrations</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/User" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

              </div>
        </div>
    </div>
@endsection

@section('content')
    {{--  --}}
@endsection
