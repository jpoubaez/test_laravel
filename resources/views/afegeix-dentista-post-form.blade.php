<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Laravel 8 - Afegir Dentista Form Example
    </div>
    <div class="card-body">
      <form name="afegeix-dentista-post-form" id="afegeix-dentista-post-form" method="post" action="{{url('guarda-dentista-form')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Nom</label>
          <input type="text" id="nom" name="nom" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Adresa</label>
          <input type="text" id="adresa" name="adresa" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Codi Postal</label>
          <input type="text" id="codipostal" name="codipostal" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Ciutat</label>
          <input type="text" id="ciutat" name="ciutat" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">NIF</label>
          <input type="text" id="NIF" name="NIF" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Numero de colegiat</label>
          <input type="text" id="numcolegiat" name="numcolegiat" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="card-body">
      <form action="dentistes">
        <input type="submit" value="Mira tots els dentistes" />
      </form>
    </div>
  </div>
</div>  
</body>
</html>