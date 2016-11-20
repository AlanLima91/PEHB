@extends('layouts.app')


@section('content')
<link href="{{asset('calendar/css/responsive-calendar.css')}}" rel="stylesheet">
<link href="{{asset('calendar/css/fullcalendar.css')}}" rel='stylesheet' />
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="{{asset('calendar/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('calendar/js/lang-all.js')}}"></script>
<script src="{{asset('calendar/js/moment.min.js')}}"></script>
<script>
// Initilialisation de l'objet info 
var info =  {
	day: '',
	data:[],
	field:['debut','fin','description','lieu','type','debut_heure','debut_min','fin_heure','fin_min','categorie','sport'],
	action: '',
	lieu: '',
	id: '',
}
$(document).ready(function() {
  	// Initialisation du calendrier et de c'est méthode 
    $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		lang: 'fr',
		buttonIcons: false, // show the prev/next text
		weekNumbers: true,
		editable: true,
		displayEventEnd: true,
		eventLimit: true, // allow "more" link when too many events      
		timeFormat:  'H:mm', 
      	// Au click d'une date 
        dayClick: function(date, jsEvent, view) {
        	// Initialisation de la date au click
			info.day = date.format('YYYY-MM-DD');
			// Ouverture du modal
			document.getElementById('open_modal').click();
			// Remise à zero des champs et cache les autres
			$('#categories').css('display','none');
			$('#error').css('display','none');
			$('#supp').css('display','none');
			for(i in info.field){
				$('#'+info.field[i]).val('');
			}
			info.action = 'insert';
			$('#debut').val(date.format('DD/MM/YYYY'));
			$('#fin').val(date.format('DD/MM/YYYY'));
        },
        // Modification d'un plannification
        eventDrop: function(event,delta, revertFunc){
        	// Bloque la modification uniquement à celui qui la crée
			if(info.data[event.id].modif == 0){
				alert('Vous n\'avez pas le droit de modifier cette plannification car vous ne l\'avez pas crée ');
				revertFunc();
			}
			// Déplacement de la date
			else if (!confirm("Êtes vous sur de vouloir changer la date?")) {
				// Annulation de l'action
				if(!confirm("Voulez vous coller cette plannification?")){
				  	revertFunc();              
				}
				// Copier coller de la plannification
				else{
					data = {'id': event.id, 'action':'copy', 'debut':event.start.format('YYYY-MM-DD HH:mm:ss'), 'fin':event.end.format('YYYY-MM-DD HH:mm:ss')};
					$.ajax({
						type: "GET",
						url: 'calendars',
						data: data,
					});
					revertFunc();
					location.reload();
				}
			}
			else{
				//Modifcation en base de donnée de la plannification
				data = {'id': event.id, 'action':'drop', 'debut':event.start.format('YYYY-MM-DD HH:mm:ss'), 'fin':event.end.format('YYYY-MM-DD HH:mm:ss')};
				$.ajax({
					type: "GET",
					url: 'calendars',
					data: data,
				});
			}
        },
        // Redimensionnement de la date 
        eventResize: function(event, delta, revertFunc) {
        	// Si ce n'est pas le créateur de la plannif
			if(info.data[event.id].modif == 0){
				alert('Vous n\'avez pas le droit de modifier cette plannification car vous ne l\'avez pas crée ');
				revertFunc();
			}
			// Annulation de l'action
			else if (!confirm("Etes vous sur de vouloir changer l'heure?")) {
				revertFunc();
			}
			// Modification de la plannif
			else{
				data = {'id': event.id, 'action':'resize', 'fin':event.end.format('YYYY-MM-DD HH:mm:ss')};
				$.ajax({
					type: "GET",
					url: 'calendars',
					data: data,
				});
			}
        },
        // Click sur une plannif déjà crée 
        eventClick: function(event) {          
			$('#supp').css('display','block');
			$('#categories').css('display','none');
			$('#error').css('display','none')
			info.id = event.id;
			info.action = 'update';
			if(info.data[info.id].modif == 0){
				alert('Vous n\'avez pas le droit de modifier cette plannification car vous ne l\'avez pas crée ');
				return;
			}
			document.getElementById('open_modal').click();
			for(i in info.field){
				val = info.field[i];
				if(val == "categorie"){
					nom = info.data[event.id]['nom'].split(" ");
					if(typeof nom[1] != 'undefined'){
						$('#categories').css('display','block');
						$('#categorie').val(nom[1]);                
					}
				}
				else{
					$('#'+val).val(info.data[event.id][val]);
				}
			}
			// Autocomplete des terrains 
			autocomplete($('#sport').val());
			// Conversion de la date réçu pour remplir le modal
			date_debut = $('#debut').val();
			date_fin = $('#fin').val();
			date_debut = date_debut.split(" ");
			info.day = date_debut[0];
			date_fin = date_fin.split(" ");
			debut = date_debut[0].split("-");
			fin = date_fin[0].split("-");
			$('#debut').val(debut[2]+"/"+debut[1]+"/"+debut[0]);
			$('#fin').val(fin[2]+"/"+fin[1]+"/"+fin[0]);
			debut = date_debut[1].split(":");
			fin = date_fin[1].split(":");
			$('#debut_heure').val(debut[0]);
			$('#debut_min').val(debut[1]);
			$('#fin_heure').val(fin[0]);
			$('#fin_min').val(fin[1]);
        }
    });
	// Ajout des différents plannifications
	// Appel ajax pour récupérer les plannifs de l'utilisateur 
	$.ajax({
		type: "GET",
		url: 'add_event',
		success:function(data){
			// On parse le retour 
			data = JSON.parse(data);
			for(i in data){
				info.data[data[i].id] = data[i];
				// Modification de l'affichage de la plannif
				nom = data[i].nom.split(" ");
				if(nom[0] == 'Fête' || nom[0] == 'Reunion'){title = "\n"+nom[0]+"\n"+nom[1]+"\n";}
				else{title = "\n"+nom[0]+" "+nom[1]+"\n"+nom[2]+"\n";}
				title = title+data[i].lieu;
				// Donnée de la plannification
				var myEvent ={
					title: title,
					start: data[i].debut,
					end: data[i].fin,
					id: data[i].id,
				};
				$('#calendar').fullCalendar('renderEvent', myEvent, true);
			}
		}
  	});

  	// Changement de la liste déroulante du champs type
    $('#type').change(function(){
        if($('#type').val() == 'Entrainement' || $('#type').val() == 'Match' || $('#type').val() == 'Tournoi'){
          $('#categories').css('display','block');
        }
        else{
           $('#categorie').val('');
           $('#categories').css('display','none');
        }
   	});

    $('#sport').change(function(){
      autocomplete($('#sport').val());
    });
}); 
	// envoie le type pour lui retourner la liste de lieu qui lui correspond
	function autocomplete(type){
		data = {'type' :type,name:'sport', table:'lieux', 'action': 'autocomplete',nom:'nom'};
		$.ajax({
			type: "GET",
			url: 'lieu',
			data: data,
		success:function(data){
			data = JSON.parse(data);
			var lieu = new Array();
			for(i in data){
				lieu.push(data[i].nom);
			}
			info.lieu = lieu;
			$("#lieu").autocomplete({
				source: lieu
			});
		}
	});
} 
	// Suppression d'une plannif
	function supp_planif(){
		// Envoie des infos en ajax pour la supression 
		data = {'id': info.id, 'action':'delete'};
		$('#spinner').show();
		$.ajax({
			type: "GET",
			url: 'calendars',
			data: data,
			success:function(data){
				location.reload();
			}
		});
	}
	function find(data, search){
		for(i in data){
			if(search == data[i]){return true;}
		}
		return false;
	}
	function verif_lieu(debut, fin, lieu){
	    data = {'debut': debut, 'fin': fin, 'action': 'verif_lieu'};
	    $.ajax({
			type: "GET",
			url: 'lieu',
			data: data,
			success:function(data){
				data = JSON.parse(data);
				var i = 0;
				for(i in data){
				  	if(lieu == data[i].lieu){i++;}
				}
				if(i > 3){return false;}
				else{return true;}
			}
	    });
	}
    function create_planif(){
		data = {'nom':'','debut':'','fin':'','id':info.id,'action':info.action,'description':$('#description').val(),'user_id':'', 'categorie':$('#categorie').val(), 'sport':$('#sport').val()};
		tab = ['type','lieu','debut_heure','fin_heure'];
		var verif = 1;
		for (i in tab){
			if($('#'+tab[i]).val() == ""){
				verif = 0;
				err = "Le champ '"+tab[i]+"' est vide vous devez remplir ce champ pour crée la planification";
				break;
			}
			else{data[tab[i]] = $('#'+tab[i]).val();}
		}
		if(verif == 1 && $('#debut_heure').val() > $('#fin_heure').val()){verif = 0; err = "La valeur de début et supérieur à celle de fin";}
		else if(verif == 1 && $('#debut_heure').val() == $('#fin_heure').val()){
			if($('#debut_min').val() >= $('#fin_min').val()){verif = 0; err = "La valeur début et égale à celle de fin";}
		}
		else if(verif == 1 && find(info.lieu,$('#lieu').val()) == false){
			verif = 0; err = "Ce lieu n'appartient pas à la M2L";
		}
		else{
			data['debut'] = info.day+' '+$('#debut_heure').val()+':'+$('#debut_min').val()+':00';
			data['fin'] = info.day+' '+$('#fin_heure').val()+':'+$('#fin_min').val()+':00';


			// doublon = verif_lieu(data['debut'], data['fin'], $('#lieu').val());
			// console.log(doublon);
			// if(doublon == false){
			//   verif = 0; err = "Ce lieu est déjà utilisé pour ce créneau horaire ";
			// }
		}
		if(verif == 0){
		document.getElementById('error').className = 'alert alert-danger';
		document.getElementById('error').style.display = "";
		document.getElementById('error').innerHTML = '<strong>Attention!</strong> '+err;
		}
		else{
			$('#spinner').show();
			$.ajax({
				type: "GET",
				url: 'calendars',
				data: data,
				success:function(data){
					location.reload();
				}
			});
		}
    }

</script>
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 12px;
  }

  #calendar {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 10px;
  }
  .ui-autocomplete {
  z-index: 215000000 !important;
}
.spinner {
    position: fixed;
    top: 50%;
    left: 50%;
    margin-left: -50px; /* half width of the spinner gif */
    margin-top: -50px; /* half height of the spinner gif */
    text-align:center;
    z-index:1234;
    overflow: auto;
    width: 150px; /* width of the spinner gif */
    height: 150px; /*hight of the spinner gif +2px to fix IE8 issue */
}

</style>
</head>
<body>
	<!-- On cache le boutton pour ouvrir le modal -->
  	<button type="button" id="open_modal" style="display:none;"  data-toggle="modal" data-target="#myModal"></button>
  	<!-- Div qui affiche le calendrier -->
  	<div id='calendar'></div>
  	<!-- spinner -->
	<div id="spinner" class="spinner" style="display:none;">
	    <img src="{{asset('img/spin.gif')}}">
	</div>  	
	<!-- Modal -->
    <div id="myModal" class="modal modal-wide fade" role="form">
      	<div class="modal-dialog">
	        <!-- Modal content-->
	        <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Planification</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-6" >
					  	<div class="form-group">
						    <label class="col-md-2 control-label">Début</label>
						    <div class="col-md-6">
						      	<input id="debut" class="date"disabled>
						        <select id="debut_heure">
									<option></option>
									<option value="23">23</option>
									<option value="22">22</option>
									<option value="21">21</option>
									<option value="20">20</option>
									<option value="19">19</option>
									<option value="18">18</option>
									<option value="17">17</option>
									<option value="16">16</option>
									<option value="15">15</option>
									<option value="14">14</option>
									<option value="13">13</option>
									<option value="12">12</option>
									<option value="11">11</option>
									<option value="10">10</option>
									<option value="09">09</option>
									<option value="08">08</option>
									<option value="07">07</option>
									<option value="06">06</option>
									<option value="05">05</option>
									<option value="04">04</option>
									<option value="03">03</option>
									<option value="02">02</option>
									<option value="01">01</option>
									<option value="00">00</option>
						        </select>
						        <select id="debut_min">
									<option value="00" selected>00</option>
									<option value="15">15</option>
									<option value="30">30</option>
									<option value="45">45</option>
						        </select>
						    </div>
					  	</div></br>
					  	<div class="form-group">                
					    	<label class="col-md-2 control-label">Fin</label>
						    <div class="col-md-6">
						        <input id="fin" class="date"disabled> 
						        <select id="fin_heure">
									<option></option>
									<option value="23">23</option>
									<option value="22">22</option>
									<option value="21">21</option>
									<option value="20">20</option>
									<option value="19">19</option>
									<option value="18">18</option>
									<option value="17">17</option>
									<option value="16">16</option>
									<option value="15">15</option>
									<option value="14">14</option>
									<option value="13">13</option>
									<option value="12">12</option>
									<option value="11">11</option>
									<option value="10">10</option>
									<option value="09">09</option>
									<option value="08">08</option>
									<option value="07">07</option>
									<option value="06">06</option>
									<option value="05">05</option>
									<option value="04">04</option>
									<option value="03">03</option>
									<option value="02">02</option>
									<option value="01">01</option>
									<option value="00">00</option>
						        </select>
						        <select id="fin_min">
									<option value="00" selected>00</option>
									<option value="15">15</option>
									<option value="30">30</option>
									<option value="45">45</option>
						        </select>
						    </div>
					  	</div></br>
					  	<div class="form-group " id="contacts" style="display:none;">
					      	<label class='col-md-2 control-label' for='other-contact-list' data-item='#contact-list'>Contact</label>
					        <div class="col-lg-8">
					          	<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
									</span>
						            <select class="form-control" id="contact-list" >
										<option value=""></option>
						            </select>
					          	</div>
					        </div>
					        <div class="col-lg-2">
					          <button type="button" id="add-other-contact" class="btn btn-default">+</button>
					        </div>
					    </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-2 control-label">Sport</label>
							<div class="col-md-6">
								<select class="form-control" id="sport">
									<option></option>
									<option value="Football">Football</option>
									<option value="Basket">Basketball</option>
									<option value="Handball">Handball</option>
									<option value="Tennis">Tennis</option>
									<option value="Rugby">Rugby</option>
									<option value="Autre">Aucun</option>
								</select>
							</div>
						</div></br>
					  	<div class="form-group">
						    <label class="col-md-2 control-label">Type</label>
						    <div class="col-md-6">
								<select class="form-control" id="type">
									<option></option>
									<option value="Entrainement">Entrainement</option>
									<option value="Reunion">Réunion</option>
									<option value="Match">Match</option>
									<option value="Tournoi">Tournoi</option>
									<option value="Fête">Fête</option>
								</select>
						    </div>
					  	</div></br>
						<div class="form-group" id="categories" style="display:none">
							<label class="col-md-2 control-label">Catégorie</label>
							<div class="col-md-6" >
								<select class="form-control"  id="categorie">
									<option></option>
									<option value="Junior">Junior</option>
									<option value="U-11">U-11</option>
									<option value="U-13">U-13</option>
									<option value="U-15">U-15</option>
									<option value="U-17">U-17</option>
									<option value="U-20">U-20</option>
									<option value="Senior">Senior</option>
									<option value="Loisir">Loisir</option>
								</select>
							</div>
						</div></br>
						<div class="form-group">
							<label class="col-md-2 control-label">Lieu</label>
							<div class="col-md-6" >
								<input type="text" class="form-control" id="lieu">
							</div>
						</div>
					</div></br>
					<div class="col-md-12">
						<div class="form-group">
						    <label class="col-md-1 control-label">Description</label>
						    <div class="col-md-6" >
						        <textarea type="text" class="form-control" id="description"></textarea>
						    </div>
					  	</div>
					</div>
				</div>
				<div class="modal-footer">
					<div id="error" style="display:none;" align="left"></div>
					<div class="btn-group">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
					  <button type="button" class="btn btn-danger" id="supp" onclick="supp_planif()" style="display:none;">Supprimer</button>
					  <button type="button" class="btn btn-primary" onclick="create_planif()">Sauvegarde</button>
					</div>
				</div>
	        </div>
      	</div>
    </div>
</body>

@endsection