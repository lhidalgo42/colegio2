<div class="span12">
	<div>
		<div class="span2"><strong>Familia</strong></div>
		<div class="span4"><input type="text" id="familia" disabled class="span3"></div>
		<div class="span4"><strong>Apoderado Economico</strong></div>
		<div class="span2">
			<div class="btn-group" id="AEconomico" data-toggle="buttons-radio">
		    	<button type="button" class="btn" onClick="clickButton(0)">Papa</button>
		    	<button type="button" class="btn" onClick="clickButton(1)">Mama</button>
		    </div>
		</div>
	</div>
	<div>
		<div class="span2"><strong>Padre</strong></div>
		<div class="span4">
			<a id="modalPAPA" role="button" onClick="MostrarPadre(1)" class="btn" data-toggle="modal" rut="" nombre="" apellido1="" 
				apellido2="" fechaNac="" sexo="1" profesion="" direccion="" comuna="" email="" lugarTrabajo="" direccionTrabajo="" 
				telefonos="" aEconomico="" >
				Papa
			</a>
		</div>
		<div class="span4"><strong>Madre</strong></div>
		<div class="span2">
			<a id="modalMAMA" role="button" onClick="MostrarPadre(0)" class="btn" data-toggle="modal" rut="" nombre="" apellido1="" 
				apellido2="" fechaNac="" sexo="0" profesion="" direccion="" comuna="" email="" lugarTrabajo="" direccionTrabajo="" 
				telefonos="" aEconomico="">
				Mama
			</a>
		</div>
	</div>
</div>
