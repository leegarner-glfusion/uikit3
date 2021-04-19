/* Display a popup notification */
var glfusion_spinner = null;
var glFusion = (function() {
	return {
		notify: function(message, status='', timeout=1500) {
			if (status == 'success') {
				var icon = '<span class="uk-icon-check"></span>&nbsp;';
			} else if (status == 'warning') {
				var icon = '';
			} else if (status == 'error') {
				var icon = '';
				status = 'danger';
			} else {
				var icon = '';
			}
		    UIkit.notification({
				message: icon + message,
		        timeout: timeout,
				status: status,
		    });
		},
		showspinner: function(message) {
			// Actually just shows a notification with no timeout.
			UIkit.notification({
				message: '<span uk-spinner></span>&nbsp;&nbsp;' + message + '...',
				timeout: 0,
			});
		},
		hidespinner: function() {
			UIkit.notification.closeAll();
		}
	};
})();
