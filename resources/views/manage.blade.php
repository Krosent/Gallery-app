<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link href="/open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    
    <title>Managment Page</title>
  </head>
  <body>
      <div class="container text-center mt-1" id="family-div">
            <span id="family-code">Family Code: {{$family->id}}</span>
        <button type="button"class="btn btn-primary" data-toggle="modal" data-target="#editHeaderModal"><span class="oi oi-pencil"></span></button>
        <button type="button"class="btn btn-success" data-toggle="modal" data-target="#addMemberModal"><span class="oi oi-plus"></span></button>
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
            <form action="/manage/edit/member/removephoto" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="member_number" value="{{$member->number}}">
              <input type="hidden" name="member_id" value="{{$member->id}}">
              <input type="hidden" name="family_code" value="{{$family->id}}">
              <div class="container-fluid text-center mt-3">
                  <div class="card mx-auto" style="width: 16rem;">
                      <img class="card-img-top" src="{{url($_ENV['APP_URL'] . \App\image::find($member->image_id)->url)}}" alt="Card image cap">
                      <div class="card-body">
                      <span class="border rounded p-3">{{$member->number}}</span>
                      <span class="border rounded p-3">{{$member->nick}}</span>
                      <p class="border rounded p-3 mt-4">{{$member->name}}</p>
                      <button type="button"class="btn btn-primary" data-toggle="modal" data-target="#editMemberModal{{$member->id}}"><span class="oi oi-pencil"></span></button>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadPhotoModal{{$member->id}}"><span class="oi oi-image"></span></button>
                      <button type="submit" class="btn btn-danger"><span class="oi oi-image"></span></button>
                      <a href="/manage/edit/member/delete/{{$member->id}}" class="btn btn-danger"><span class="oi oi-circle-x"></span></a>
                      </div>
                  </div>     
              </div>
          </form>

        <div class="modal fade" id="editMemberModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Header</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="POST" action="/manage/edit/member">
                        {{ csrf_field() }}
                    <input type="hidden" name="member_id" value="{{$member->id}}">
                    <input type="hidden" name="family_code" value="{{$family->id}}">
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="family-code">Number</label>
                            <input type="text" class="form-control" id="number" name="number" value="{{$member->number}}" aria-describedby="Number Change" placeholder="Enter the number">
                            </div>
        
                            <div class="form-group">
                                    <label for="father-field">Nick</label>
                                    <input type="text" class="form-control" id="nick" name="nick" value="{{$member->nick}}" aria-describedby="Nick Change" placeholder="Enter nick">
                                </div>
        
                            <div class="form-group">
                                    <label for="mother-field">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$member->name}}"  aria-describedby="Name Change" placeholder="Enter name">
                                </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
                </div>
            </div>

            {{-- ---------------- --}}
            


        <!-- UPLOAD IMAGE MODAL -->
        <div class="modal fade" id="uploadPhotoModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Header</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="POST" action="/manage/edit/member/uploadphoto" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="modal-body">
                           
                                    <div class="form-group">
                                      <label for="exampleFormControlFile1">Select photo</label>
                                      <input type="hidden" id="member_id" name="member_id" value="{{$member->id}}">
                                      <input type="hidden" id="family_code" name="family_code" value="{{$family->id}}">
                                      <input type="file" name="image_url" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                 
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
                <!-- ------------------ -->


            @endforeach

          </div>

          <div class="col border rounded p-4 m-2">
              <div class="row text-center">
                <div class="col-12 border rounded p-1">
                        <span class="align-middle">{{\App\ancestor::where(['id' => $family->mother_id])->first()->family_name}}</span>
                </div>
  
              </div>

              @foreach ($mother_members as $member)
              <form action="/manage/edit/member/removephoto" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="member_id" value="{{$member->number}}">
                <input type="hidden" name="member_id" value="{{$member->id}}">
                <input type="hidden" name="family_code" value="{{$family->id}}">
                <div class="container-fluid text-center mt-3">
                    <div class="card mx-auto" style="width: 16rem;">
                        <img class="card-img-top" src="{{url($_ENV['APP_URL'] . \App\image::find($member->image_id)->url)}}" alt="Card image cap">
                        <div class="card-body">
                        <span class="border rounded p-3">{{$member->number}}</span>
                        <span class="border rounded p-3">{{$member->nick}}</span>
                        <p class="border rounded p-3 mt-4">{{$member->name}}</p>
                        <button type="button"class="btn btn-primary" data-toggle="modal" data-target="#editMemberModal{{$member->id}}"><span class="oi oi-pencil"></span></button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadPhotoModal{{$member->id}}"><span class="oi oi-image"></span></button>
                        <button type="submit" class="btn btn-danger"><span class="oi oi-image"></span></button>
                        <a href="/manage/edit/member/delete/{{$member->id}}" class="btn btn-danger"><span class="oi oi-circle-x"></span></a>
                        </div>
                    </div>     
                </div>
            </form>


            <div class="modal fade" id="editMemberModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Header</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form method="POST" action="/manage/edit/member">
                            {{ csrf_field() }}
                        <input type="hidden" name="member_id" value="{{$member->id}}">
                        <input type="hidden" name="family_code" value="{{$family->id}}">
                        <div class="modal-body">
                                    <div class="form-group">
                                        <label for="family-code">Number</label>
                                    <input type="text" class="form-control" id="number" value="{{$member->number}}" aria-describedby="Number Change" placeholder="Enter the number">
                                    </div>
                
                                    <div class="form-group">
                                            <label for="father-field">Nick</label>
                                            <input type="text" class="form-control" id="nick" value="{{$member->nick}}" aria-describedby="Nick Change" placeholder="Enter nick">
                                        </div>
                
                                    <div class="form-group">
                                            <label for="mother-field">Name</label>
                                            <input type="text" class="form-control" id="name" value="{{$member->name}}"  aria-describedby="Name Change" placeholder="Enter name">
                                        </div>
                               
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>

                    {{-- ------------ --}}

                    <!-- UPLOAD IMAGE MODAL -->
        <div class="modal fade" id="uploadPhotoModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Header</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="POST" action="/manage/edit/member/uploadphoto" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="modal-body">
                                    <div class="form-group">
                                      <label for="exampleFormControlFile1">Select photo</label>
                                      <input type="hidden" name="member_id" value="{{$member->id}}">
                                      <input type="hidden" name="family_code" value="{{$family->id}}">
                                      <input type="file" name="image_url" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                 
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
                <!-- ------------------ -->


              @endforeach
  
           
  
              
            </div>
        </div>
      </div>


      <!-- MODALS -->

      <!-- HEADER EDITOR MODAL-->
        <div class="modal fade" id="editHeaderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Header</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/manage/edit/header">
                            {{ csrf_field() }}

                        <input type="hidden" name="family_id" value="{{$family->id}}">

                        <div class="form-group">
                            <label for="family-code">Family Code</label>
                        <input type="text" class="form-control" id="family-code" aria-describedby="Family Code Change" name="family-code" value="{{$family->id}}" placeholder="Enter family code">
                        </div>

                        <div class="form-group">
                                <label for="father-field">Father</label>
                        <input type="text" class="form-control" id="father-name" aria-describedby="Father Family Name Change" name="father-name" value="{{App\ancestor::find($family->father_id)->family_name}}" placeholder="Enter father's name">
                            </div>

                        <div class="form-group">
                                <label for="mother-field">Mother</label>
                        <input type="text" class="form-control" id="mother-name" aria-describedby="Mother Family Name Change" name="mother-name" value="{{App\ancestor::find($family->mother_id)->family_name}}" placeholder="Enter mother's name">
                            </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <!-- ------------------ -->

         <!-- HEADER EDITOR MODAL-->
         <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/manage/add/member">
                                {{ csrf_field() }}
    
                            <input type="hidden" name="family_id" value="{{$family->id}}">
    
                            <div class="form-group">
                                <label for="number-code">Number</label>
                            <input type="text" class="form-control" id="number-code" aria-describedby="Number Code Change" name="number" placeholder="Enter Number Code">
                            </div>
    
                            <div class="form-group">
                                    <label for="nick">Nick</label>
                            <input type="text" class="form-control" id="nick" aria-describedby="Nick Change" name="nick" placeholder="Enter Nick">
                                </div>
    
                            <div class="form-group">
                                    <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="Name Change" name="name" placeholder="Enter Name">
                                </div>

                                <div class="form-group">
                                        <label for="parentSelect">Parent select</label>
                                        <select class="form-control" id="parentSelect" name="parentSelect">
                                            @foreach(\App\ancestor::all() as $ans)
                                        <option value="{{$ans->id}}">{{$ans->family_name}}</option>
                                            @endforeach
                                         
                                        </select>
                                      </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
    
            <!-- ------------------ -->
     
        

      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>