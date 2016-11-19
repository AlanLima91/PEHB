@extends('layout.template')
@section('content')
<div class="panel-body">
    <div style="padding:50px 0 100px 0">
        <!-- CONTENT -->
        <div class="container">
           	<form action="{{url('actu/cree')}}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Titre</label>
                            <input required type="text" name="titre" class="form-control" id="titre" value="">
                        </div><!--/*.form-group-->
                    </div><!--/*.col-md-6-->
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="message">Description</label>
                            <textarea rows="15" required id="description" name="description" class="form-control"></textarea>
                        </div><!--/*.form-group-->
                    </div><!--/*.col-md-12-->
                    <div class="col-md-12">
                        <button type='submit' class='btn btn-primary'>Envoyer</button>
                    </div><!--/*.col-md-12-->
                </div><!--/*.row-->
            </form>
        </div><!--/*.container-->
        <!-- END CONTENT -->
    </div>
</div>


@endsection