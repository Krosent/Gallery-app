<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <title>View Page</title>
  </head>
  <body>
      <div class="container text-center mt-1" id="family-div">
        <h3 id="test">Family Code: {{$family->id}}</h3>
      </div>

      <div class="container mt-3 mb-3">
        <div class="row text-center">

          <div class="col border rounded p-4 m-2">
            <div class="row text-center" style="background: none">
              <div class="col-12 border rounded p-1">
                <span class="align-middle">{{\App\ancestor::where(['id' => $family->father_id])->first()->family_name}}</span>
              </div>

            </div>

          @foreach ($father_members as $member)
          <form action="/family/{{$family->id}}/member/{{$member->id}}/increment" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="member_number" value="{{$member->number}}">
            <input type="hidden" name="member_id" value="{{$member->id}}">
            <div class="container-fluid text-center mt-3">
                <div class="card mx-auto" style="width: 16rem;">
                    <img class="card-img-top" src="{{url($_ENV['APP_URL'] . \App\image::find($member->image_id)->url)}}" alt="Card image cap">
                    <div class="card-body">
                    <span class="border rounded p-3">{{$member->number}}</span>
                    <span class="border rounded p-3">{{$member->nick}}</span>
                    <p class="border rounded p-3 mt-4">{{$member->name}}</p>
                        <button type="submit" class="btn btn-primary">+</button>
                    </div>
                </div>     
            </div>
        </form>
          @endforeach
          </div>

          <div class="col border rounded p-4 m-2">
              <div class="row text-center">
                <div class="col-12 border rounded p-1">
                        <span class="align-middle">{{\App\ancestor::where(['id' => $family->mother_id])->first()->family_name}}</span>
                </div>
  
              </div>
  
              @foreach ($mother_members as $member)
              <form action="/family/{{$family->id}}/member/{{$member->id}}/increment" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="member_number" value="{{$member->number}}">
                <input type="hidden" name="member_id" value="{{$member->id}}">
                <div class="container-fluid text-center mt-3">
                    <div class="card mx-auto" style="width: 16rem;">
                        <img class="card-img-top" src="{{url($_ENV['APP_URL'] . \App\image::find($member->image_id)->url)}}" alt="Card image cap">
                        <div class="card-body">
                        <span class="border rounded p-3">{{$member->number}}</span>
                        <span class="border rounded p-3">{{$member->nick}}</span>
                        <p class="border rounded p-3 mt-4">{{$member->name}}</p>
                            <button type="submit" class="btn btn-primary">+</button>
                        </div>
                    </div>     
                </div>
            </form>
              @endforeach
  
              
            </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>