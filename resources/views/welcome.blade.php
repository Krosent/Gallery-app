<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
      <div class="container mx-auto mt-5">
        <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Family Code</th>
                    <th scope="col">Father</th>
                    <th scope="col">Mother</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($families as $family)
                    <tr>
                    <th scope="row"></th>
                    <td>{{$family->id}}</td>
                    <td>{{\App\ancestor::where(['id' => $family->father_id])->first()->family_name}}</td>
                    <td>{{\App\ancestor::where(['id' => $family->mother_id])->first()->family_name}}</td>
                    <td><a href="/family/{{$family->id}}">Go to View</a></td>
                    <td><a href="/manage/{{$family->id}}">Go to Editor</a></td>
                  </tr>
                
                    @endforeach
                  
                </tbody>
              </table>

      </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>