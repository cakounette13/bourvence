(function() {
	var popup = {
		init: function() {
			var popupShowed = false;
			window.addEventListener('load', function(e) {
				if(!popupShowed) {
					setTimeout( () => {
      					document.getElementById('popup').style.display = 'block'
    				}, 1000 )
    				const popupShowed = true
				}
				document.getElementById('modal-close').addEventListener('click', function(e) {
					document.getElementById('popup').style.display = "none"
				});
			});
		}
	};
	popup.init();
})();