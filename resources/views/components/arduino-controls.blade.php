<div class="mt-3">
	<x-forms.button id="turn-on" color="green" type="button" onClick="sendCommand('aan')">Auto aan</x-forms.button>
	<x-forms.button color="red" type="button" onClick="sendCommand('uit')">Auto uit</x-forms.button>

	<script>
		function sendCommand( action ) {
			let request = fetch( 'https://robofontys.duckdns.org/udp_forwarder.php', {
				method: 'POST',
				body: 'action=' + action,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				}
			} )
		}
	</script>
</div>