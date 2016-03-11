<!-- include jQuery + carouFredSel plugin -->
<script src="js/jquery-1.9.0.js"></script>
		
		<script type="text/javascript" language="javascript" src="js/jquery.carouFredSel-6.2.0-packed.js"></script>

		<!-- optionally include helper plugins -->
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.transit.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>

		<!-- fire plugin onDocumentReady -->
		<script type="text/javascript" language="javascript">
			$(function() {
				$('#asociados1').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 2,
					prev: '#prev',
					next: '#next',
					items: {
						width: 60,
					//	height: '30%',	//	optionally resize item-height
						visible: {
							min: 2,
							max: 13
						}
					}
				});
				
				$('#aEstrategicos').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 2,
					prev: '#prevE',
					next: '#nextE',
					items: {
						width: 60,
					//	height: '30%',	//	optionally resize item-height
						visible: {
							min: 2,
							max: 13
						}
					}
				});
			});
		</script>