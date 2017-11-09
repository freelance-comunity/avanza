<!--MODAL-->
@php
$latePayments = $payment->latePayments;
@endphp
<div class="modal fade" id="unlock">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			@if ($bloqueado >= 1)
			<div class="modal-header">
				<h5 class="modal-title">Alerta de Renovación de Crédito</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h1>No puedes renovar el crédito por pagos atrasados</h1>
			</div>
			<div class="modal-footer">
				@elseif($bloqueado == 0)
				<div class="modal-header">
					<h5 class="modal-title">Alerta de Renovación de Crédito</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h1>Necesitas cubrir todos los pagos para renovar el crédito</h1>
				</div>
				<div class="modal-footer">
					@endif
					@if ($bloqueado >= 1)
					{!! Form::open(['url' => 'desbloquear','data-parsley-validate' => '']) !!}


					<!--{!! Form::submit('DESBLOQUEAR', ['class' => 'btn btn-lg btn-block btn-success']) !!}-->

					{!! Form::close() !!}										
					@elseif($bloqueado == 0)											
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					@endif
				</div>
			</div>
		</div>
	</div>
							<!--endmodal-->