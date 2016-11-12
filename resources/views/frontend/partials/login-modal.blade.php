<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Login</h4>
            </div>
            <div class="modal-body">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['route' => 'auth.login','class'=>'nobottommargin']) !!}
                {!! Form::label('email','Email') !!}

                {!! Form::text('email',null,['class'=>'form-control']) !!}
                {!! Form::label('password','Password') !!}

                {!! Form::password('password',['class'=>'form-control']) !!}<br>
                <button class="button button-3d nomargin" id="sign-in" name="sign-in" value="sign-up">Sign-in</button>

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>